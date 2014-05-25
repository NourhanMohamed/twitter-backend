package twitter.shared;

import java.io.IOException;
import java.net.InetSocketAddress;

import net.spy.memcached.MemcachedClient;

public class MemcachedInstance extends MemcachedClient{
	private static final String HOST = "localhost";
	private static final int PORT = 11211;
	
	public MemcachedInstance() throws IOException{
		super(new InetSocketAddress(HOST,PORT));
	}
}
