package twitter.database.commands.tweet;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Types;
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

public class FavoriteCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(FavoriteCommand.class
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
			CallableStatement proc = dbConn
					.prepareCall("{? = call favorite(?,?,now()::timestamp)}");
			proc.setPoolable(true);

			proc.registerOutParameter(1, Types.INTEGER);
			proc.setInt(2, Integer.parseInt(map.get("tweet_id")));
			proc.setInt(3, Integer.parseInt(map.get("user_id")));
			proc.execute();

			int favorites = proc.getInt(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");
			root.put("favorites", favorites);
			try {
				CommandsHelp.submit(map.get("app"),
						mapper.writeValueAsString(root), LOGGER);
			} catch (JsonGenerationException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (JsonMappingException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (IOException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}

		} catch (PSQLException e) {
			if (e.getMessage().contains("unique constraint")) {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"You already favorited this tweet", LOGGER);
			} else {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						e.getMessage(), LOGGER);
			}

			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
