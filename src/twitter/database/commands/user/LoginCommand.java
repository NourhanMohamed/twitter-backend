package twitter.database.commands.user;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.rmi.server.UID;
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

import twitter.database.BCrypt;
import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.database.User;
import twitter.shared.MemcachedInstance;
import twitter.shared.MyObjectMapper;

public class LoginCommand implements Command, Runnable {
	private final Logger LOGGER = Logger
			.getLogger(LoginCommand.class.getName());
	private HashMap<String, String> map;

	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		Connection dbConn = null;
		CallableStatement proc = null;
		try {
			String sessionID = URLEncoder.encode(new UID().toString(), "UTF-8");
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(false);
			proc = dbConn.prepareCall("{? = call get_password_info(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.VARCHAR);
			proc.setString(2, map.get("username"));
			proc.execute();

			String enc_password = proc.getString(1);

			if (enc_password == null) {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"Invalid username", map.get("correlation_id"), LOGGER);
				return;
			}
			dbConn.commit();
			proc.close();

			boolean authenticated = BCrypt.checkpw(map.get("password"),
					enc_password);
			if (authenticated) {
				proc = dbConn.prepareCall("{? = call login(?,?)}");
				proc.setPoolable(true);

				proc.registerOutParameter(1, Types.INTEGER);
				proc.setString(2, map.get("username"));
				proc.setString(3, sessionID);
				proc.execute();

				int userID = proc.getInt(1);

				dbConn.commit();

				MyObjectMapper mapper = new MyObjectMapper();
				JsonNodeFactory nf = JsonNodeFactory.instance;
				ObjectNode root = nf.objectNode();
				root.put("app", map.get("app"));
				root.put("method", map.get("method"));
				root.put("status", "ok");
				root.put("code", "200");
				root.put("user_id", userID);
				root.put("session_id", sessionID);

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
				
				User u = new User();
				u.setSessionID(sessionID);
				u.setId(userID);
				u.setUsername(map.get("username"));
				MemcachedInstance.setOrReplace(userID + "", u);
			} else {
				CommandsHelp.handleError(map.get("app"), map.get("method"),
						"Invalid Password", map.get("correlation_id"), LOGGER);
			}

		} catch (PSQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (UnsupportedEncodingException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} finally {
			PostgresConnection.disconnect(null, proc, dbConn);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
