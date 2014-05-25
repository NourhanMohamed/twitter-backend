package twitter.database;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Types;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.JMSException;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.postgresql.util.PSQLException;

import twitter.activemq.ActiveMQConfig;
import twitter.activemq.Producer;
import twitter.shared.MemcachedInstance;
import twitter.shared.MyObjectMapper;

public class CommandsHelp {
	private static final Logger LOGGER = Logger.getLogger(CommandsHelp.class.getName());
	public static void handleError(String app, String method, String errorMsg,
			String correlationID, Logger logger) {
		JsonNodeFactory nf = JsonNodeFactory.instance;
		MyObjectMapper mapper = new MyObjectMapper();
		ObjectNode node = nf.objectNode();
		node.put("app", app);
		node.put("method", method);
		node.put("status", "Bad Request");
		node.put("code", "400");
		node.put("message", errorMsg);
		try {
			submit(app, mapper.writeValueAsString(node), correlationID, logger);
		} catch (JsonGenerationException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (JsonMappingException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (IOException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	public static void submit(String app, String json, String correlationID,
			Logger logger) {
		Producer p = new Producer(new ActiveMQConfig(app.toUpperCase()
				+ ".OUTQUEUE"));
		try {
			p.send(json, correlationID);
		} catch (JMSException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		}
	}
	
	public static boolean isLoggedIn(int user_id, Logger lgr) {
		if(lgr == null) {
			lgr = LOGGER;
		}
		Connection dbConn = null;
		CallableStatement proc = null;
		boolean loggedIn = false;
		try {
			User user = null;
			user = (User) MemcachedInstance.search(user_id+"");

			if (user == null) {
				dbConn = PostgresConnection.getDataSource().getConnection();
				dbConn.setAutoCommit(true);
				proc = dbConn.prepareCall("{? = call is_logged_in(?)}");
				proc.setPoolable(true);

				proc.registerOutParameter(1, Types.VARCHAR);
				proc.setInt(2, user_id);
				proc.execute();

				String sessionID = proc.getString(1);
				loggedIn = sessionID == null ? false : true;
				user = new User();
				user.setId(user_id);
				user.setSessionID(sessionID);
			} else {
				loggedIn = user.sessionID() == null ? false : true;
			}
		} catch (PSQLException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} finally {
			PostgresConnection.disconnect(null, proc, dbConn);
		}
		
		if (loggedIn) {
			return true;
		} else {
			return false;
		}
	}
}
