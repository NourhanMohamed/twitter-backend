package twitter.database.commands.dm;

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

public class CreateDmCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(CreateDmCommand.class
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
						.prepareCall("{? = call create_dm(?,?,?,now()::timestamp,?))}");

			} else {
				proc = dbConn
						.prepareCall("{? = call create_dm(?,?,?,now()::timestamp)}");
			}

			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.BOOLEAN);
			proc.setInt(2, Integer.parseInt(map.get("sender_id")));
			proc.setInt(3, Integer.parseInt(map.get("reciever_id")));
			proc.setString(4, map.get("dm_text"));
			if (map.containsKey("image_url")) {
				proc.setString(5, map.get("image_url"));
			}
			proc.execute();

			boolean sent = proc.getBoolean(1);

			if (sent) {
				MyObjectMapper mapper = new MyObjectMapper();
				JsonNodeFactory nf = JsonNodeFactory.instance;
				ObjectNode root = nf.objectNode();
				root.put("app", map.get("app"));
				root.put("method", map.get("method"));
				root.put("status", "ok");
				root.put("code", "200");
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
			} else {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"You can not dm a user who is not following you",
						LOGGER);
			}

		} catch (PSQLException e) {
			if (e.getMessage().contains("value too long")) {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"DM length cannot exceed 140 character", LOGGER);
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