package twitter.shared;

import org.codehaus.jackson.annotate.JsonMethod;
import org.codehaus.jackson.annotate.JsonAutoDetect.Visibility;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.map.annotate.JsonSerialize.Inclusion;

public class MyObjectMapper extends ObjectMapper {
	public MyObjectMapper() {
		super();
		this.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		this.setSerializationInclusion(Inclusion.NON_NULL);
	}
}
