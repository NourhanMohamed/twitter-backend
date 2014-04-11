package twitter.database;

import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

public class RegisterCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(RegisterCommand.class
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
					.prepareCall("{call create_user(?,?,?,?,now()::timestamp)}");
			proc.setPoolable(true);

			proc.setString(1, map.get("username"));
			proc.setString(2, map.get("email"));
			proc.setString(3, map.get("password"));
			proc.setString(4, map.get("name"));
			proc.execute();

		} catch (PSQLException e) {
			// TODO generate JSON error messages instead of console logs
			if (e.getMessage().contains("unique constraint")) {
				if (e.getMessage().contains("(username)"))
					System.out.println("Username already exists");
				if (e.getMessage().contains("(email)"))
					System.out.println("Email already exists");
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

