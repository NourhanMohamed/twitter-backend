package twitter.database;

import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Main {
	private final static Logger LOGGER = Logger.getLogger(Main.class.getName());

	public static void main(String[] args) {
		PostgresConnection.initSource();
		CommandsMap.instantiate();
		HashMap<String, String> map = new HashMap<>();
		map.put("app", "user");
		map.put("method", "get_users");
		map.put("user_substring", "a");

		Class<?> cmdClass = CommandsMap.queryClass(map.get("method"));
		if (cmdClass == null) {
			LOGGER.log(Level.SEVERE,
					"Invalid Request. Class \"" + map.get("method")
							+ "\" Not Found");
		} else {
			try {
				Command c = (Command) cmdClass.newInstance();
				c.setMap(map);
				c.execute();
			} catch (InstantiationException | IllegalAccessException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}
		}
	}
}
