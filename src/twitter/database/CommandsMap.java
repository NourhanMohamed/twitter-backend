package twitter.database;

import java.util.HashMap;
import java.util.Map;

public class CommandsMap {
	private static Map<String,Class<?>> cmdMap;
	
	public static void instantiate(){
		cmdMap = new HashMap<String,Class<?>>();
		cmdMap.put("register", RegisterCommand.class);
		cmdMap.put("follow", FollowCommand.class);
		cmdMap.put("unfollow", UnFollowCommand.class);
		cmdMap.put("confirm_follow", ConfirmFollowCommand.class);
		cmdMap.put("report_user", ReportUserCommand.class);
		cmdMap.put("tweet", NewTweetCommand.class);
		cmdMap.put("delete_tweet", DeleteTweetCommand.class);
		cmdMap.put("report_tweet", ReportTweetCommand.class);
		cmdMap.put("favorite", FavoriteCommand.class);
		cmdMap.put("unfavorite", UnFavoriteCommand.class);
		cmdMap.put("retweet", RetweetCommand.class);
		cmdMap.put("unretweet", UnRetweetCommand.class);
	}
	
	public static Class<?> queryClass(String cmd){
		return cmdMap.get(cmd);
	}
}
