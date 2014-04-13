package twitter.database.commands.user;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class UnFollowCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(UnFollowCommand.class
			.getName());
	private HashMap<String, String> map;

	public void setMap(HashMap<String, String> map) {
		this.map = map;
	}

	@Override
	public void execute() {
		try {
			Connection dbConn = PostgresConnection.getDataSource()
					.getConnection();
			dbConn.setAutoCommit(true);
			CallableStatement proc = dbConn.prepareCall("{call unfollow(?,?)}");
			proc.setPoolable(true);

			proc.setInt(1, Integer.parseInt(map.get("user_id")));
			proc.setInt(2, Integer.parseInt(map.get("follower_id")));
			proc.execute();

		} catch (SQLException e) {
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
