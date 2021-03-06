package twitter.activemq;

import javax.jms.Connection;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.MessageProducer;
import javax.jms.Session;

public class Producer {
	ActiveMQConfig config;

	public Producer(ActiveMQConfig config) {
		this.config = config;
	}

	public void send(String msg, String correlationID) throws JMSException {
		Connection conn = config.connect();
		Session session = conn.createSession(false, Session.AUTO_ACKNOWLEDGE);
		Destination destination = session.createQueue(config.getQueueName());
		MessageProducer producer = session.createProducer(destination);
		Message message = session.createTextMessage(msg);
		message.setJMSCorrelationID(correlationID);
		producer.send(message);
		config.disconnect(conn);
	}
}