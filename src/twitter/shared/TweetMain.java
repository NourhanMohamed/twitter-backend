package twitter.shared;

import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.JMSException;

import twitter.activemq.ActiveMQConfig;
import twitter.activemq.Consumer;

public class TweetMain {
	private static Logger lgr = Logger.getLogger(UserMain.class.getName());
	
	public static void main(String[] args) {
		try {
			new Consumer(new ActiveMQConfig("TWEETIN.QUEUE"));
		} catch (JMSException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		}
	}
	
	public static void handleMap(Map<String, String> map) {
		
	}
}
