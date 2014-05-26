package twitter.shared;

import org.quickserver.net.AppException;
import org.quickserver.net.server.QuickServer;

import twitter.concurrent.WorkerPool;
import twitter.database.CommandsMap;
import twitter.database.PostgresConnection;

public class ListMain {
	protected static final WorkerPool POOL = new WorkerPool(10);

	public static void main(String[] args) {
		PostgresConnection.initSource();
		CommandsMap.instantiate();
		QuickServer myServer = new QuickServer("twitter.shared.ListCommandHandler",5050);
		myServer.setName("ListServer");
		try {
			myServer.startServer();
		} catch (AppException e) {
			System.err.println("Error in server : " + e);
		}
	}
}
