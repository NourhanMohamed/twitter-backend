package twitter.shared;

import java.io.IOException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.MessageConsumer;
import javax.jms.TextMessage;

import org.codehaus.jackson.JsonParseException;
import org.codehaus.jackson.map.JsonMappingException;

import twitter.activemq.ActiveMQConfig;
import twitter.activemq.Consumer;
import twitter.concurrent.WorkerPool;
import twitter.database.Command;
import twitter.database.CommandsMap;
import twitter.database.PostgresConnection;

public class DMMain {
	private static final Logger LOGGER = Logger.getLogger(DMMain.class
			.getName());
	private static WorkerPool pool = new WorkerPool(10);
	private static boolean run = true;

	public static void main(String[] args) {
		PostgresConnection.initSource();
		CommandsMap.instantiate();
		try {
			new MemcachedInstance();
		} catch (IOException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
		try {
			Consumer c = new Consumer(new ActiveMQConfig("DM.INQUEUE"));
			MessageConsumer consumer = c.connect();

			while (run) {
				Message msg = consumer.receive();
				if (msg instanceof TextMessage) {
					String msgTxt = ((TextMessage) msg).getText();
					handleMsg(msgTxt, msg.getJMSCorrelationID());
				}
			}

			c.disconnect();
			MemcachedInstance.shutdownCache();
		} catch (JMSException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	public static void shutdown() {
		run = false;
	}

	private static void handleMsg(String msg, String correlationID) {
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
				map.put("correlation_id", correlationID);
				Class<?> cmdClass = CommandsMap.queryClass(map.get("method"));
				if (cmdClass == null) {
					LOGGER.log(Level.SEVERE,
							"Invalid Request. Class \"" + map.get("method")
									+ "\" Not Found");
				} else {
					try {
						Command c = (Command) cmdClass.newInstance();
						c.setMap(map);
						pool.execute((Runnable) c);
					} catch (InstantiationException | IllegalAccessException e) {
						LOGGER.log(Level.SEVERE, e.getMessage(), e);
					}
				}
			}
		}
	}
}
