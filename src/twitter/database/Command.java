package twitter.database;

import java.util.HashMap;

public interface Command {
	public abstract void execute();
	public abstract void setMap(HashMap<String,String> map);
}
