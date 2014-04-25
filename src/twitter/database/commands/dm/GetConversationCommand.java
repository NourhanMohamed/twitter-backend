package twitter.database.commands.dm;


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

public class GetConversationCommand implements Command, Runnable {
	private final Logger LOGGER = Logger.getLogger(GetConversationCommand.class
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
					.prepareCall("{? = call get_conversation(?,?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(1, Integer.parseInt(map.get("user_id")));
			proc.setInt(2, Integer.parseInt(map.get("partner_id")));
			proc.execute();

			ResultSet set = (ResultSet) proc.getObject(1);
			while (set.next()) {
				String sender_id = set.getString(1);
				String reciever_id = set.getString(2);
				String dm_text = set.getString(3);
				String avatar_url = set.getString(4);
				System.out.println("sender = " + sender_id + ", reciever = "
						+ reciever_id + ", message = " + dm_text+", AvatarUrl = " + avatar_url);
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
