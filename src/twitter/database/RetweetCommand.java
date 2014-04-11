package twitter.database;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Types;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

public class RetweetCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(RetweetCommand.class
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
					.prepareCall("{? = call retweet(?,?,now()::timestamp)}");
			proc.setPoolable(true);
			
			proc.registerOutParameter(1, Types.INTEGER);
			proc.setInt(2, Integer.parseInt(map.get("tweet_id")));
			proc.setInt(3, Integer.parseInt(map.get("user_id")));
			proc.execute();
			System.out.println("RETWEETS = " + proc.getInt(1));

		} catch (PSQLException e) {
			// TODO generate JSON error messages instead of console logs
			if (e.getMessage().contains("unique constraint")) {
				System.out.println("You already retweeted this tweet");
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
