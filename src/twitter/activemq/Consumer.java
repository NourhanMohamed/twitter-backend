package twitter.activemq;

import javax.jms.Connection;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.Message;
import javax.jms.MessageConsumer;
import javax.jms.MessageListener;
import javax.jms.Session;
import javax.jms.TextMessage;

public class Consumer implements MessageListener {
	ActiveMQConfig config;
	Connection conn;

	public Consumer(ActiveMQConfig config) throws JMSException {
		this.config = config;
	}
	
	public void connect() throws JMSException {
		conn = config.connect();
		Session session = conn.createSession(false, Session.AUTO_ACKNOWLEDGE);

		Destination destination = session.createQueue(config.getQueueName());
		MessageConsumer consumer = session.createConsumer(destination);
		consumer.setMessageListener(this);
	}
	
	public void disconnect() throws JMSException {
		conn.close();
	}

	public static void main(String[] args) throws JMSException {
		new Consumer(new ActiveMQConfig("TEST.QUEUE"));
	}

	@Override
	public void onMessage(Message message) {
		// TODO Auto-generated method stub
		String messageText = null;
		try {
			if (message instanceof TextMessage) {
				TextMessage textMessage = (TextMessage) message;
				messageText = textMessage.getText();
				System.out.println("messageText = " + messageText);
			}
		} catch (JMSException e) {
			// Handle the exception appropriately
		}
	}
}