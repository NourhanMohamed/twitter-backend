package twitter.database;

import java.sql.Timestamp;

@SuppressWarnings("unused")
public class DirectMessage {
	private Integer id;
	private User sender;
	private User reciever;
	private String dm_text;
	private String image_url;
	private Boolean read;
	private String created_at;

	public void setId(int id) {
		this.id = id;
	}

	public void setSender(User sender) {
		this.sender = sender;
	}

	public void setReciever(User reciever) {
		this.reciever = reciever;
	}

	public void setDmText(String dm_text) {
		this.dm_text = dm_text;
	}

	public void setImageUrl(String image_url) {
		this.image_url = image_url;
	}

	public void setRead(boolean read) {
		this.read = read;
	}

	public void setCreatedAt(Timestamp created_at) {
		this.created_at = created_at.toString();
	}
}
