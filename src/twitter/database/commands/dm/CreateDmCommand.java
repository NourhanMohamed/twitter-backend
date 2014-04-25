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

public class CreateDmCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(CreateDmCommand.class
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
			proc.setInt(1, Integer.parseInt(map.get("sender_id")));
			proc.setInt(2, Integer.parseInt(map.get("reciever_id")));
			proc.setString(3, map.get("dm_text"));
			proc.setString(4, map.get("image_url"));
			proc.execute();

		} catch (PSQLException e) {
			if (e.getMessage().contains("value too long")) {
				if (e.getMessage().contains("(dm_text)"))
					System.out.println("list name exceeds 50 characters");
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