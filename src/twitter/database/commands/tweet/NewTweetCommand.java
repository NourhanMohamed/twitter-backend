package twitter.database.commands.tweet;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class NewTweetCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(NewTweetCommand.class
			.getName());
	private HashMap<String, String> map;
	
	@Override
	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		try {
			Connection dbConn = PostgresConnection.getDataSource()
					.getConnection();
			dbConn.setAutoCommit(true);
			CallableStatement proc = dbConn
					.prepareCall("{call create_tweet(?,?,now()::timestamp)}");
			proc.setPoolable(true);

			proc.setString(1, map.get("tweet_text"));
			proc.setInt(2, Integer.parseInt(map.get("creator_id")));
			proc.execute();

		} catch (PSQLException e) {
			// TODO generate JSON error messages instead of console logs
			if (e.getMessage().contains("value too long")) {
				System.out.println("Tweet exceeds 140 characters");
			}
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}
	
	@Override
	public void run() {
		execute();
	}

}
