package twitter.database.commands.user;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class FollowersCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(FollowersCommand.class
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
			dbConn.setAutoCommit(false);
			CallableStatement proc = dbConn
					.prepareCall("{? = call get_followers(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(2, Integer.parseInt(map.get("user_id")));
			proc.execute();

			ResultSet set = (ResultSet) proc.getObject(1);
			while (set.next()) {
				String username = set.getString(1);
				String name = set.getString(2);
				String avatar_url = set.getString(3);
				System.out.println("Username = " + username + ", Name = "
						+ name + ", AvatarUrl = " + avatar_url);
			}

			dbConn.commit();
		} catch (PSQLException e) {
			// TODO generate JSON error messages instead of console logs
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
