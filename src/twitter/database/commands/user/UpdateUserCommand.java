package twitter.database.commands.user;

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

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.PostgresConnection;
import twitter.shared.MyObjectMapper;

public class UpdateUserCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(UpdateUserCommand.class
			.getName());
	private HashMap<String, String> map;

	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		String app = map.get("app");
		String method = map.get("method");
		try {
			Connection dbConn = PostgresConnection.getDataSource()
					.getConnection();
			dbConn.setAutoCommit(true);

			CallableStatement proc = dbConn
					.prepareCall("{call edit_user(?,?)}");

			proc.setPoolable(true);
			proc.setInt(1, Integer.parseInt(map.get("user_id")));

			map.remove("user_id");
			map.remove("app");
			map.remove("method");
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
				CommandsHelp.submit(app, mapper.writeValueAsString(root),
						LOGGER);
			} catch (JsonGenerationException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (JsonMappingException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (IOException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}

		} catch (PSQLException e) {
			if (e.getMessage().contains("unique constraint")) {
				if (e.getMessage().contains("(username)"))
					CommandsHelp.handleError(app, method,
							"Username already exists", LOGGER);
				if (e.getMessage().contains("(email)"))
					CommandsHelp.handleError(app, method,
							"Email already exists", LOGGER);
			} else {
				CommandsHelp.handleError(app, method, e.getMessage(), LOGGER);
			}

			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(app, method, e.getMessage(), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
