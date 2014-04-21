package twitter.shared;

import java.io.IOException;
import java.util.HashMap;

import org.codehaus.jackson.JsonParseException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.type.TypeReference;

public class JsonMapper {
	private String json;

	public JsonMapper(String json) {
		this.json = json;
	}

	public HashMap<String, String> deserialize() throws JsonParseException,
			JsonMappingException, IOException {
		ObjectMapper mapper = new ObjectMapper();
		return mapper.readValue(json,
				new TypeReference<HashMap<String, String>>() {
				});
	}
}
