package twitter.database.commands.list;

import java.io.IOException;
import java.sql.Array;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map.Entry;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.postgresql.util.PSQLException;
import org.quickserver.net.server.ClientHandler;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.shared.MyObjectMapper;

public class UpdateListCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(UpdateListCommand.class
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
		String app = map.get("app");
		String method = map.get("method");
		String correlationID = map.get("correlation_id");
		Connection dbConn = null;
		CallableStatement proc = null;
		String response = null;
		try {
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(true);
			proc = dbConn.prepareCall("{call update_list(?,?)}");
			proc.setPoolable(true);

			proc.setInt(1, Integer.parseInt(map.get("list_id")));
			map.remove("list_id");
			map.remove("app");
			map.remove("method");
			map.remove("correlation_id");
			Set<Entry<String, String>> set = map.entrySet();
			Iterator<Entry<String, String>> iterator = set.iterator();
			String[][] arraySet = new String[set.size()][2];
			int i = 0;

			while (iterator.hasNext()) {
				Entry<String, String> entry = iterator.next();
				String[] temp = { entry.getKey(), entry.getValue() };
				arraySet[i] = temp;
				i++;
			}
			Array array = dbConn.createArrayOf("text", arraySet);
			proc.setArray(2, array);
			proc.execute();

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", app);
			root.put("method", method);
			root.put("status", "ok");
			root.put("code", "200");
			try {
				response = CommandsHelp.submit(app, mapper.writeValueAsString(root),
						correlationID, LOGGER);
			} catch (JsonGenerationException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (JsonMappingException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (IOException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}

		} catch (PSQLException e) {
			if (e.getMessage().contains("unique constraint")) {
				if (e.getMessage().contains("(name)")) {
					response = CommandsHelp.handleError(app, method,
							"List name already exists", correlationID, LOGGER);
				}
			}
			if (e.getMessage().contains("value too long")) {
				response = CommandsHelp.handleError(app, method, "Too long input",
						correlationID, LOGGER);
			}
			response = CommandsHelp.handleError(app, method, "List name already exists",
					correlationID, LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(app, method, e.getMessage(),
					correlationID, LOGGER);
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
