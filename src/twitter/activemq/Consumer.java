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

	public Consumer() throws JMSException {
		ActiveMQConfig config1 = new ActiveMQConfig("TEST.QUEUE");
		Connection conn = config1.connect();
		Session session = conn.createSession(false, Session.AUTO_ACKNOWLEDGE);

		Destination destination = session.createQueue(config1.getQueueName());
		MessageConsumer consumer = session.createConsumer(destination);
		consumer.setMessageListener(this);
	}

	public static void main(String[] args) throws JMSException {
		new Consumer();
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