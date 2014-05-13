package twitter.database.commands.user;

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
import org.codehaus.jackson.node.ArrayNode;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.database.Tweet;
import twitter.database.User;
import twitter.shared.MyObjectMapper;

public class GetMentionsCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(GetUserCommand.class
			.getName());
	private HashMap<String, String> map;

	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		try {
			Connection dbConn = PostgresConnection.getDataSource()
					.getConnection();
			dbConn.setAutoCommit(false);
			CallableStatement proc = dbConn
					.prepareCall("{? = call get_mentions(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setString(2, map.get("username"));
			proc.execute();

			ResultSet set = (ResultSet) proc.getObject(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			ArrayNode mentions = nf.arrayNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");

			while (set.next()) {
				Integer id = set.getInt(1);
				String tweet = set.getString(2);
				String image_url = set.getString(3);
				Timestamp created_at = set.getTimestamp(4);
				String creator_name = set.getString(5);
				String creator_username = set.getString(6);
				String creator_avatar = set.getString(7);

				Tweet t = new Tweet();
				t.setId(id);
				t.setTweetText(tweet);
				t.setImageUrl(image_url);
				t.setCreatedAt(created_at);
				User creator = new User();
				creator.setName(creator_name);
				creator.setAvatarUrl(creator_avatar);
				creator.setUsername(creator_username);
				t.setCreator(creator);

				mentions.addPOJO(t);
			}

			root.put("mentions", mentions);
			try {
				CommandsHelp.submit(map.get("app"),
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
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
