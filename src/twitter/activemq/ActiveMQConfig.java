package twitter.activemq;

import javax.jms.Connection;
import javax.jms.ConnectionFactory;
import javax.jms.JMSException;

import org.apache.activemq.ActiveMQConnection;
import org.apache.activemq.ActiveMQConnectionFactory;

public class ActiveMQConfig {
	private String url = ActiveMQConnection.DEFAULT_BROKER_URL;

	private String queueName;

	public ActiveMQConfig(String queueName) {
		this.queueName = queueName;
	}

	public Connection connect() throws JMSException {
		ConnectionFactory connectionFactory = new ActiveMQConnectionFactory(url);
		Connection connection = connectionFactory.createConnection();
		connection.start();
		return connection;
	}

	public void disconnect(Connection connection) throws JMSException {
		connection.close();
	}

	public String getQueueName() {
		return this.queueName;
	}
	// for session creation
	// Session session = connection.createSession(false,
	// Session.AUTO_ACKNOWLEDGE);
}
