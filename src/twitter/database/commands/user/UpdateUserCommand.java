package twitter.database.commands.user;

import java.sql.Array;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map.Entry;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.PostgresConnection;

public class UpdateUserCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(UpdateUserCommand.class
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
			
			CallableStatement proc = dbConn.prepareCall("{call edit_user(?,?)}");

			proc.setPoolable(true);
			proc.setInt(1, Integer.parseInt(map.get("user_id")));
			map.remove("user_id");
			map.remove("app");
			map.remove("method");
			Set<Entry<String,String>> set = map.entrySet();
			System.out.println(Arrays.toString(set.toArray()));
			Iterator<Entry<String,String>> iterator = set.iterator();
			String[][] arraySet = new String[set.size()][2];
			int i = 0;
			
			while(iterator.hasNext()) {
				Entry<String,String> entry = iterator.next();
				String[] temp = {entry.getKey(), entry.getValue()};
				arraySet[i] = temp;
				i++;
			}
			Array array = dbConn.createArrayOf("text", arraySet);
			proc.setArray(2, array);
			
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
