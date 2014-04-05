package twitter.activemq;
import javax.jms.Connection;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.MessageProducer;
import javax.jms.Session;
import javax.jms.TextMessage;

public class Producer {
    public static void main(String[] args) throws JMSException {
    	ActiveMQConfig config1 = new ActiveMQConfig("TEST.QUEUE");
        Connection conn = config1.connect();
        Session session = conn.createSession(false,
            Session.AUTO_ACKNOWLEDGE);

        Destination destination = session.createQueue(config1.getQueueName());
        MessageProducer producer = session.createProducer(destination);

        TextMessage message = session.createTextMessage("Can't remember to forget you :P");
        producer.send(message);
        config1.disconnect(conn);
    }
}