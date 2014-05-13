package twitter.database.commands.user;

import java.io.IOException;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonGenerationException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.node.ArrayNode;
import org.codehaus.jackson.node.JsonNodeFactory;
import org.codehaus.jackson.node.ObjectNode;
import org.postgresql.util.PSQLException;

import twitter.database.Command;
import twitter.database.CommandsHelp;
import twitter.database.List;
import twitter.database.PostgresConnection;
import twitter.database.User;
import twitter.shared.MyObjectMapper;

public class GetListMembershipsCommand implements Command, Runnable {
	private final Logger LOGGER = Logger
			.getLogger(GetListMembershipsCommand.class.getName());
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
					.prepareCall("{? = call get_list_memberships(?)}");
			proc.setPoolable(true);
			proc.registerOutParameter(1, Types.OTHER);
			proc.setInt(2, Integer.parseInt(map.get("user_id")));
			proc.execute();

			ResultSet set = (ResultSet) proc.getObject(1);

			MyObjectMapper mapper = new MyObjectMapper();
			JsonNodeFactory nf = JsonNodeFactory.instance;
			ObjectNode root = nf.objectNode();
			ArrayNode lists = nf.arrayNode();
			root.put("app", map.get("app"));
			root.put("method", map.get("method"));
			root.put("status", "ok");
			root.put("code", "200");

			while (set.next()) {
				Integer id = set.getInt(1);
				String name = set.getString(2);
				String description = set.getString(3);
				String creator_name = set.getString(4);
				String creator_username = set.getString(5);
				String creator_avatar = set.getString(6);

				List list = new List();
				list.setId(id);
				list.setName(name);
				list.setDescription(description);
				User creator = new User();
				creator.setName(creator_name);
				creator.setAvatarUrl(creator_avatar);
				creator.setUsername(creator_username);
				list.setCreator(creator);

				lists.addPOJO(list);
			}

			root.put("memberships", lists);
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
		}
	}

	@Override
	public void run() {
		execute();
	}
}
