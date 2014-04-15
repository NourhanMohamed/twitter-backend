package twitter.database;

import java.util.HashMap;
import java.util.Map;

import twitter.database.commands.tweet.DeleteTweetCommand;
import twitter.database.commands.tweet.FavoriteCommand;
import twitter.database.commands.tweet.GetTweetCommand;
import twitter.database.commands.tweet.NewTweetCommand;
import twitter.database.commands.tweet.ReportTweetCommand;
import twitter.database.commands.tweet.RetweetCommand;
import twitter.database.commands.tweet.UnFavoriteCommand;
import twitter.database.commands.tweet.UnRetweetCommand;
import twitter.database.commands.user.ConfirmFollowCommand;
import twitter.database.commands.user.FollowCommand;
import twitter.database.commands.user.FollowersCommand;
import twitter.database.commands.user.FollowingCommand;
import twitter.database.commands.user.GetFavoritesCommand;
import twitter.database.commands.user.GetMentionsCommand;
import twitter.database.commands.user.GetTimelineCommand;
import twitter.database.commands.user.GetUserCommand;
import twitter.database.commands.user.GetUsersCommand;
import twitter.database.commands.user.RegisterCommand;
import twitter.database.commands.user.ReportUserCommand;
import twitter.database.commands.user.UnFollowCommand;
import twitter.database.commands.user.UnconfirmedFollowersCommand;
import twitter.database.commands.user.UpdateUserCommand;

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
		cmdMap.put("get_users", GetUsersCommand.class);
		cmdMap.put("followers", FollowersCommand.class);
		cmdMap.put("following", FollowingCommand.class);
		cmdMap.put("unconfirmed_followers", UnconfirmedFollowersCommand.class);
		cmdMap.put("update_user", UpdateUserCommand.class);
		cmdMap.put("get_user", GetUserCommand.class);
		cmdMap.put("get_mentions", GetMentionsCommand.class);
		cmdMap.put("get_tweet", GetTweetCommand.class);
		cmdMap.put("timeline", GetTimelineCommand.class);
		cmdMap.put("get_favorites", GetFavoritesCommand.class);
	}
	
	public static Class<?> queryClass(String cmd){
		return cmdMap.get(cmd);
	}
}
