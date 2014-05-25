package twitter.shared;

import java.io.IOException;
import java.net.InetSocketAddress;

import net.spy.memcached.MemcachedClient;

public class MemcachedInstance extends MemcachedClient {
	private static final String HOST = "localhost";
	private static final int PORT = 11211;
	private static MemcachedClient cache;

	public MemcachedInstance() throws IOException {
		super(new InetSocketAddress(HOST, PORT));
		cache = this;
	}

	public static Object search(String key) {
		return cache.get(key);
	}

	public static void setOrReplace(String key, Object o) {
		Object check = cache.get(key);
		if (check == null) {
			cache.set(key, 0, o);
		} else {
			cache.replace(key, 0, o);
		}
	}

	public static void remove(String key) {
		cache.delete(key);
	}

	public static void shutdownCache() {
		cache.shutdown();
	}
}
