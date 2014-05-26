package twitter.database.commands.user;

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
import org.quickserver.net.server.ClientHandler;

import twitter.database.BCrypt;
import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.shared.MyObjectMapper;

public class RegisterCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(RegisterCommand.class
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
		String response = null;
		try {
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(true);
			String password = BCrypt.hashpw(map.get("password"), BCrypt.gensalt());
			if (map.containsKey("avatar_url")) {
				proc = dbConn
						.prepareCall("{call create_user(?,?,?,?,now()::timestamp,?)}");

			} else {
				proc = dbConn
						.prepareCall("{call create_user(?,?,?,?,now()::timestamp)}");
			}

			proc.setPoolable(true);
			proc.setString(1, map.get("username"));
			proc.setString(2, map.get("email"));
			proc.setString(3, password);
			proc.setString(4, map.get("name"));

			if (map.containsKey("avatar_url")) {
				proc.setString(5, map.get("avatar_url"));
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

		} catch (PSQLException e) {
			if (e.getMessage().contains("unique constraint")) {
				if (e.getMessage().contains("(username)")) {
					response = CommandsHelp.handleError(map.get("app"), map.get("method"),
							"Username already exists",
							map.get("correlation_id"), LOGGER);
				}
				if (e.getMessage().contains("(email)")) {
					response = CommandsHelp.handleError(map.get("app"), map.get("method"),
							"Email already exists", map.get("correlation_id"),
							LOGGER);
				}
			} else {
				response = CommandsHelp.handleError(map.get("app"), map.get("method"),
						e.getMessage(), map.get("correlation_id"), LOGGER);
			}

			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			response = CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} finally {
			PostgresConnection.disconnect(null, proc, dbConn);
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
