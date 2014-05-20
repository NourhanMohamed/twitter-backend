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
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.codehaus.jackson.node.POJONode;
import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.database.User;
import twitter.shared.MyObjectMapper;

public class GetUserCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(GetUserCommand.class
			.getName());
	private HashMap<String, String> map;

	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		Connection dbConn = null;
		CallableStatement proc = null;
		ResultSet set = null;
		try {
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(false);
			proc = dbConn.prepareCall("{? = call get_user(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(2, Integer.parseInt(map.get("user_id")));
			proc.execute();

			set = (ResultSet) proc.getObject(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");

			User user = new User();
			if (set.next()) {
				Integer id = set.getInt(1);
				String username = set.getString(2);
				String email = set.getString(3);
				String name = set.getString(5);
				String language = set.getString(6);
				String country = set.getString(7);
				String bio = set.getString(8);
				String website = set.getString(9);
				Timestamp created_at = set.getTimestamp(10);
				String avatar_url = set.getString(11);
				Boolean overlay = set.getBoolean(12);
				String link_color = set.getString(13);
				String background_color = set.getString(14);
				Boolean protected_tweets = set.getBoolean(15);
				String session_id = set.getString(16);
				user.setId(id);
				user.setUsername(username);
				user.setEmail(email);
				user.setName(name);
				user.setLanguage(language);
				user.setCountry(country);
				user.setBio(bio);
				user.setWebsite(website);
				user.setCreatedAt(created_at);
				user.setAvatarUrl(avatar_url);
				user.setOverlay(overlay);
				user.setLinkColor(link_color);
				user.setBackgroundColor(background_color);
				user.setProtectedTweets(protected_tweets);
				user.setSessionID(session_id);
			}

			POJONode child = nf.POJONode(user);
			root.put("user", child);
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
		} finally {
			PostgresConnection.disconnect(set, proc, dbConn);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
