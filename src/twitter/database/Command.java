package twitter.database;

import java.util.HashMap;

import org.quickserver.net.server.ClientHandler;

public interface Command {
	public abstract void execute();

	public abstract void setMap(HashMap<String, String> map);
	
	public abstract void setCmdHandler(ClientHandler cmdHandler);
}
