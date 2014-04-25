package twitter.activemq;

import java.util.logging.Logger;

import javax.jms.Connection;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.MessageConsumer;
import javax.jms.Session;

public class Consumer {
	Logger lgr = Logger.getLogger(Consumer.class.getName());
	ActiveMQConfig config;
	Connection conn;

	public Consumer(ActiveMQConfig config) throws JMSException {
		this.config = config;
	}

	public MessageConsumer connect() throws JMSException {
		Connection conn = config.connect();
		this.conn = conn;
		Session session = conn.createSession(false, Session.AUTO_ACKNOWLEDGE);

		Destination destination = session.createQueue(config.getQueueName());
		MessageConsumer consumer = session.createConsumer(destination);
		return consumer;
	}

	public void disconnect() throws JMSException {
		config.disconnect(conn);
	}
}