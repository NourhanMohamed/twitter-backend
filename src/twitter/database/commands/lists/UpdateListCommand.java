package twitter.database.commands.lists;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class UpdateListCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(UpdateListCommand.class
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
					.prepareCall("{call update_list(?,?,?,?)}");
			proc.setPoolable(true);

			proc.setInt(1, Integer.parseInt(map.get("user_id")));
			proc.setString(2, map.get("name"));
			proc.setString(3, map.get("description"));
			proc.setBoolean(4, Boolean.getBoolean(map.get("private")));		
			proc.execute();

		} catch (PSQLException e) {
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
