package twitter.database;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;

import twitter.shared.MyObjectMapper;

public class CommandsHelp {
	public static String handleError(String app, String method, String errorMsg,
			String correlationID, Logger logger) {
		JsonNodeFactory nf = JsonNodeFactory.instance;
		MyObjectMapper mapper = new MyObjectMapper();
		ObjectNode node = nf.objectNode();
		node.put("app", app);
		node.put("method", method);
		node.put("status", "Bad Request");
		node.put("code", "400");
		node.put("message", errorMsg);
		node.put("correlation-id", correlationID);
		try {
			return submit(app, mapper.writeValueAsString(node), correlationID, logger);
		} catch (JsonGenerationException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (JsonMappingException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (IOException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		}
		return null;
	}

	public static String submit(String app, String json, String correlationID,
			Logger logger) {
		return json;
	}
}
