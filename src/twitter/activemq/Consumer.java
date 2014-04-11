package twitter.activemq;

import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.Connection;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.MessageConsumer;
import javax.jms.MessageListener;
import javax.jms.Session;
import javax.jms.TextMessage;

import twitter.shared.InvalidAppException;
import twitter.shared.JsonMapper;
import twitter.shared.TweetMain;
import twitter.shared.UserMain;

public class Consumer implements MessageListener {
	Logger lgr = Logger.getLogger(Consumer.class.getName());
	ActiveMQConfig config;
	Connection conn;

	public Consumer(ActiveMQConfig config) throws JMSException {
		this.config = config;
	}
	
	public void connect() throws JMSException {
		Connection conn = config.connect();
		this.conn = conn;
		Session session = conn.createSession(false, Session.AUTO_ACKNOWLEDGE);

		Destination destination = session.createQueue(config.getQueueName());
		MessageConsumer consumer = session.createConsumer(destination);
		consumer.setMessageListener(this);
	}
	
	public void disconnect() throws JMSException {
		config.disconnect(conn);
	}

	@Override
	public void onMessage(Message message) {
		// TODO Auto-generated method stub
		String messageText = null;
		try {
			if (message instanceof TextMessage) {
				TextMessage textMessage = (TextMessage) message;
				messageText = textMessage.getText();
				System.out.println("Recieved Message: " + messageText);
				handleMessage(messageText);
			}
		} catch (JMSException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} catch (InvalidAppException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} catch (Exception e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		}
	}
	
	private void handleMessage(String msg) throws InvalidAppException{
		JsonMapper json = new JsonMapper(msg);
		Map<String,String> map = json.deserialize();
		String app = map.get("app");
		switch (app) {
		case "user": UserMain.handleMap(map); break;
		case "tweet": TweetMain.handleMap(map); break;
		default:
			throw new InvalidAppException("Application "+ app + " is not available.");
		}
	}
}