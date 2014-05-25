package twitter.database;

import java.io.Serializable;
import java.util.ArrayList;

@SuppressWarnings("unused")
public class Conversation implements Serializable{
	private static final long serialVersionUID = -1345693538512248332L;
	private ArrayList<DirectMessage> dms;
	private Integer id;
	private DirectMessage lastDM;

	public void setDms(ArrayList<DirectMessage> dms) {
		this.dms = dms;
	}

	public void setId(int id) {
		this.id = id;
	}

	public void setLastDM(DirectMessage lastDM) {
		this.lastDM = lastDM;
	}
}
