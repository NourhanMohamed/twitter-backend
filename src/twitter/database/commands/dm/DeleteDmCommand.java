package twitter.database.commands.dm;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class DeleteDmCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(DeleteDmCommand.class
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
					.prepareCall("{call delete_dm(?)}");
			proc.setPoolable(true);

			proc.setInt(1, Integer.parseInt(map.get("dm_id")));
			proc.execute();

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
