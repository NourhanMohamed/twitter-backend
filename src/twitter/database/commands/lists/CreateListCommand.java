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

public class CreateListCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(CreateListCommand.class
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
					.prepareCall("{call create_list(?,?,?,?,now()::timestamp)}");
			proc.setPoolable(true);

			proc.setString(1, map.get("name"));
			proc.setString(2, map.get("description"));
			proc.setInt(3, Integer.parseInt(map.get("creator_id")));
			proc.setBoolean(4, Boolean.getBoolean(map.get("private")));
			proc.execute();

		} catch (PSQLException e) {
			if (e.getMessage().contains("unique constraint")) {
				if (e.getMessage().contains("(name)"))
					System.out.println("list name already exists");
			}
			if (e.getMessage().contains("value too long")) {
				if (e.getMessage().contains("(name)"))
					System.out.println("list name exceeds 50 characters");
				if (e.getMessage().contains("(description)"))
					System.out.println("description exceeds 140 characters");
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
