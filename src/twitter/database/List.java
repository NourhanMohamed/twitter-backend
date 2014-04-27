package twitter.database;

import java.sql.Timestamp;

@SuppressWarnings("unused")
public class List {
	private Integer id;
	private String name;
	private String description;
	private User creator;
	private Boolean is_private;
	private String created_at;

	public void setId(int id) {
		this.id = id;
	}

	public void setName(String name) {
		this.name = name;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public void setCreator(User creator) {
		this.creator = creator;
	}

	public void setIs_private(boolean is_private) {
		this.is_private = is_private;
	}

	public void setCreatedAt(Timestamp created_at) {
		this.created_at = created_at.toString();
	}
}
