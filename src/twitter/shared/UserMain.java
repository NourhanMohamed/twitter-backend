package twitter.shared;

import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

import javax.jms.JMSException;

import twitter.activemq.ActiveMQConfig;
import twitter.activemq.Consumer;
import twitter.concurrent.WorkerPool;

public class UserMain {
	private static Logger lgr = Logger.getLogger(UserMain.class.getName());
	private static WorkerPool pool = new WorkerPool(10);
	
	public static void main(String[] args) {
		try {
			new Consumer(new ActiveMQConfig("USERIN.QUEUE"));
		} catch (JMSException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		}
	}
	
	public static void handleMap(Map<String, String> map) {
		pool.execute(new WorkerThread(map));
	}
	
}
