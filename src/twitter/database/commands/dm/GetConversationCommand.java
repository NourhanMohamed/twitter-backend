package twitter.database.commands.dm;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.sql.Types;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.codehaus.jackson.node.POJONode;
import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.Conversation;
import twitter.database.DirectMessage;
import twitter.database.PostgresConnection;
import twitter.database.User;
import twitter.shared.MyObjectMapper;

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
		Connection dbConn = null;
		CallableStatement proc = null;
		ResultSet set = null;
		try {
			dbConn = PostgresConnection.getDataSource().getConnection();
			dbConn.setAutoCommit(false);
			proc = dbConn.prepareCall("{? = call get_conversation(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(2, Integer.parseInt(map.get("conv_id")));
			proc.execute();

			set = (ResultSet) proc.getObject(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");

			Conversation conv = new Conversation();
			ArrayList<DirectMessage> dms = new ArrayList<>();
			while (set.next()) {
				int sender_id = set.getInt(1);
				String sender_name = set.getString(2);
				int reciever_id = set.getInt(3);
				String reciever_name = set.getString(4);
				String dm_text = set.getString(5);
				String image_url = set.getString(6);
				Timestamp created_at = set.getTimestamp(7);

				User sender = new User();
				sender.setId(sender_id);
				sender.setName(sender_name);

				User reciever = new User();
				reciever.setId(reciever_id);
				reciever.setName(reciever_name);

				DirectMessage dm = new DirectMessage();
				dm.setDmText(dm_text);
				dm.setSender(sender);
				dm.setReciever(reciever);
				dm.setCreatedAt(created_at);
				dm.setImageUrl(image_url);
				dms.add(dm);
			}

			conv.setDms(dms);
			POJONode child = nf.POJONode(conv);
			root.put("conv", child);
			try {
				CommandsHelp.submit(map.get("app"),
						mapper.writeValueAsString(root),
						map.get("correlation_id"), LOGGER);
			} catch (JsonGenerationException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (JsonMappingException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			} catch (IOException e) {
				LOGGER.log(Level.SEVERE, e.getMessage(), e);
			}

			dbConn.commit();
		} catch (PSQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} catch (SQLException e) {
			CommandsHelp.handleError(map.get("app"), map.get("method"),
					e.getMessage(), map.get("correlation_id"), LOGGER);
			LOGGER.log(Level.SEVERE, e.getMessage(), e);
		} finally {
			PostgresConnection.disconnect(set, proc, dbConn);
		}
	}

	@Override
	public void run() {
		execute();
	}
}
