package twitter.shared;

@SuppressWarnings("serial")
public class InvalidAppException extends Exception {
	public InvalidAppException(String message){
		super(message);
	}
}
