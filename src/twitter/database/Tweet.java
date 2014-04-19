package twitter.database;

import java.sql.Timestamp;

@SuppressWarnings("unused")
public class Tweet {
	private Integer id;
	private String tweet_text;
	private String image_url;
	private String created_at;
	private User creator;
	private User retweeter;
	private User favoriter;
	private Integer retweets;
	private Integer favorites;
	
	public void setId(Integer id) {
		this.id = id;
	}
	public void setTweetText(String tweet_text) {
		this.tweet_text = tweet_text;
	}
	public void setImageUrl(String image_url) {
		this.image_url = image_url;
	}
	public void setCreatedAt(Timestamp timestamp) {
		this.created_at = timestamp.toString();
	}
	public void setCreator(User creator) {
		this.creator = creator;
	}
	public void setRetweeter(User retweeter) {
		this.retweeter = retweeter;
	}
	public void setFavoriter(User favoriter) {
		this.favoriter = favoriter;
	}
	public void setRetweets(Integer retweets) {
		this.retweets = retweets;
	}
	public void setFavorites(Integer favorites) {
		this.favorites = favorites;
	}
}
