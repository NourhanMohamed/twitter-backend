package twitter.database;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.JMSException;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;

import twitter.activemq.ActiveMQConfig;
import twitter.activemq.Producer;
import twitter.shared.MyObjectMapper;

public class CommandsHelp {
	public static void handleError(String app, String method, String errorMsg,
			Logger logger) {
		JsonNodeFactory nf = JsonNodeFactory.instance;
		MyObjectMapper mapper = new MyObjectMapper();
		ObjectNode node = nf.objectNode();
		node.put("app", app);
		node.put("method", method);
		node.put("status", "Bad Request");
		node.put("code", "400");
		node.put("message", errorMsg);
		try {
			submit(app, mapper.writeValueAsString(node), logger);
		} catch (JsonGenerationException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (JsonMappingException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		} catch (IOException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	public static void submit(String app, String json, Logger logger) {
		Producer p = new Producer(new ActiveMQConfig(app.toUpperCase()
				+ ".OUTQUEUE"));
		try {
			p.send(json);
		} catch (JMSException e) {
			logger.log(Level.SEVERE, e.getMessage(), e);
		}
	}
}
