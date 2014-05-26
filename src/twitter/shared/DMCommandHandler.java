package twitter.shared;

import java.io.IOException;
import java.net.SocketTimeoutException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonParseException;
import org.codehaus.jackson.map.JsonMappingException;
import org.quickserver.net.server.ClientCommandHandler;
import org.quickserver.net.server.ClientHandler;

import twitter.database.Command;
import twitter.database.CommandsMap;

public class DMCommandHandler implements ClientCommandHandler{
	private static final Logger LOGGER = Logger.getLogger(DMMain.class.getName());

	@Override
	public void handleCommand(ClientHandler handler, String msg)
			throws SocketTimeoutException, IOException {
		JsonMapper json = new JsonMapper(msg);
		HashMap<String, String> map = null;
		try {
			map = json.deserialize();
		} catch (JsonParseException e1) {
			LOGGER.log(Level.SEVERE, e1.getMessage(), e1);
		} catch (JsonMappingException e1) {
			LOGGER.log(Level.SEVERE, e1.getMessage(), e1);
		} catch (IOException e1) {
			LOGGER.log(Level.SEVERE, e1.getMessage(), e1);
		}
		if (map != null) {
			map.put("app", "dm");
			if (map.containsKey("method")) {
				map.put("correlation_id", "1");
				Class<?> cmdClass = CommandsMap.queryClass(map.get("method"));
				if (cmdClass == null) {
					LOGGER.log(Level.SEVERE,
							"Invalid Request. Class \"" + map.get("method")
									+ "\" Not Found");
				} else {
					try {
						Command c = (Command) cmdClass.newInstance();
						c.setMap(map);
						c.setCmdHandler(handler);
						DMMain.POOL.execute((Runnable) c);
					} catch (InstantiationException | IllegalAccessException e) {
						LOGGER.log(Level.SEVERE, e.getMessage(), e);
					}
				}
			}
		}
		
	}
}
