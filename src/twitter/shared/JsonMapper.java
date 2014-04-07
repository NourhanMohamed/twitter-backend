package twitter.shared;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.codehaus.jackson.JsonParseException;
import org.codehaus.jackson.map.JsonMappingException;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.type.TypeReference;

public class JsonMapper {
	private Logger lgr = Logger.getLogger(JsonMapper.class.getName());
	private String json;

	public JsonMapper(String json) {
		this.json = json;
	}

	public Map<String, String> deserialize() {
		ObjectMapper mapper = new ObjectMapper();
		try {
			return mapper.readValue(json,
					new TypeReference<HashMap<String, String>>() {
			});
		} catch (JsonParseException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} catch (JsonMappingException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		} catch (IOException e) {
			lgr.log(Level.SEVERE, e.getMessage(), e);
		}
		return null;
	}
}
