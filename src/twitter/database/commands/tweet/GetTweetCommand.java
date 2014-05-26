package twitter.database.commands.tweet;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.sql.Types;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.codehaus.jackson.node.POJONode;
import org.postgresql.util.PSQLException;
import org.quickserver.net.server.ClientHandler;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.database.Tweet;
import twitter.database.User;
import twitter.shared.MyObjectMapper;

public class GetTweetCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(GetTweetCommand.class
			.getName());
	private HashMap<String, String> map;
	private ClientHandler cmdHandler;

	@Override
	public void setCmdHandler(ClientHandler cmdHandler) {
		this.cmdHandler = cmdHandler;
	}

	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		Connection dbConn = null;
		CallableStatement proc = null;
		ResultSet set = null;
		String response = null;
		try {
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(false);
			proc = dbConn.prepareCall("{? = call get_tweet(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(2, Integer.parseInt(map.get("tweet_id")));
			proc.execute();

			set = (ResultSet) proc.getObject(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");

			Tweet t = new Tweet();
			if (set.next()) {
				Integer id = set.getInt(1);
				String tweet = set.getString(2);
				String image_url = set.getString(5);
				Timestamp created_at = set.getTimestamp(4);
				String creator_username = set.getString(6);
				String creator_name = set.getString(7);
				String creator_avatar = set.getString(8);
				int retweets = set.getInt(9);
				int favorites = set.getInt(10);

				t.setId(id);
				t.setTweetText(tweet);
				t.setImageUrl(image_url);
				t.setCreatedAt(created_at);
				t.setRetweets(retweets);
				t.setFavorites(favorites);
				User creator = new User();
				creator.setName(creator_name);
				creator.setAvatarUrl(creator_avatar);
				creator.setUsername(creator_username);
				t.setCreator(creator);
			}

			POJONode child = nf.POJONode(t);
			root.put("tweet", child);
			try {
				response = CommandsHelp.submit(map.get("app"),
						mapper.writeValueAsString(root),
						map.get("correlation_id"), LOGGER);
			} catch (JsonGenerationException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (JsonMappingException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (IOException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}

			dbConn.commit();
		} catch (PSQLException e) {
			response = CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			response = CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} finally {
			PostgresConnection.disconnect(set, proc, dbConn);
		}
		try {
			cmdHandler.sendClientMsg(response);
		} catch (IOException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
