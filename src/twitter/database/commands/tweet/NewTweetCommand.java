package twitter.database.commands.tweet;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.shared.MyObjectMapper;

public class NewTweetCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(NewTweetCommand.class
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
			dbConn.setAutoCommit(true);
			CallableStatement proc;
			if (map.containsKey("image_url")) {
				proc = dbConn
						.prepareCall("{call create_tweet(?,?,now()::timestamp,?)}");

			} else {
				proc = dbConn
						.prepareCall("{call create_tweet(?,?,now()::timestamp)}");
			}

			proc.setPoolable(true);
			proc.setString(1, map.get("tweet_text"));
			proc.setInt(2, Integer.parseInt(map.get("creator_id")));

			if (map.containsKey("image_url")) {
				proc.setString(3, map.get("image_url"));
			}

			proc.execute();

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");
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

		} catch (PSQLException e) {
			// TODO generate JSON error messages instead of console logs
			if (e.getMessage().contains("value too long")) {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"Tweet exceeds 140 characters",
						map.get("correlation_id"), LOGGER);
			} else {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						e.getMessage(), map.get("correlation_id"), LOGGER);
			}
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
