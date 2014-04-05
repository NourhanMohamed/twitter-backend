package twitter.database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.apache.commons.dbcp2.ConnectionFactory;
import org.apache.commons.dbcp2.DriverManagerConnectionFactory;
import org.apache.commons.dbcp2.PoolableConnection;
import org.apache.commons.dbcp2.PoolableConnectionFactory;
import org.apache.commons.dbcp2.PoolingDataSource;
import org.apache.commons.dbcp2.PoolingDriver;
import org.apache.commons.pool2.ObjectPool;
import org.apache.commons.pool2.impl.GenericObjectPool;

public class PostgresConnection {
	Logger lgr = Logger.getLogger(PostgresConnection.class.getName());
	String dbUsername = "nour";
	String dbPassword = "";
	String dbName = "twitter";
	String dbInitialConnections = "5";
	String dbMaxConnections = "10";
	String connUri;
	PoolingDriver dbDriver;
	PoolingDataSource<PoolableConnection> dataSource;

	public PostgresConnection() {
		connUri = "jdbc:postgresql://localhost:5432/" + dbName;
		dataSource = initSource();
	}

	public void shutdownDriver() throws SQLException {
		dbDriver.closePool(dbName);
		shutdownConnection();
	}
	
	private void shutdownConnection() throws SQLException {
		dataSource.getConnection().close();
	}

	public void printDriverStats() throws SQLException {
		ObjectPool<? extends Connection> connectionPool = dbDriver
				.getConnectionPool(dbName);

		System.out.println("DB Active Connections: " + connectionPool.getNumActive());
		System.out.println("DB Idle Connections: " + connectionPool.getNumIdle());
	}

	private PoolingDataSource<PoolableConnection> initSource() {
		try {
			try {
				Class.forName("org.postgresql.Driver");
			} catch (ClassNotFoundException ex) {
				lgr.log(Level.SEVERE,
						"Error loading Postgres driver: " + ex.getMessage(), ex);
			}

			Properties props = new Properties();
			props.setProperty("user", dbUsername);
			props.setProperty("password", dbPassword);
			props.setProperty("initialSize", dbInitialConnections);
			props.setProperty("maxActive", dbMaxConnections);

			ConnectionFactory connectionFactory = new DriverManagerConnectionFactory(
					connUri, props);
			PoolableConnectionFactory poolableConnectionFactory = new PoolableConnectionFactory(
					connectionFactory, null);
			ObjectPool<PoolableConnection> connectionPool = new GenericObjectPool<>(
					poolableConnectionFactory);
			PoolingDataSource<PoolableConnection> datasource = new PoolingDataSource<>(
					connectionPool);
			Class.forName("org.apache.commons.dbcp2.PoolingDriver");
			dbDriver = (PoolingDriver) DriverManager
					.getDriver("jdbc:apache:commons:dbcp:");
			dbDriver.registerPool(dbName, connectionPool);

			return datasource;

		} catch (Exception ex) {
			lgr.log(Level.SEVERE,
					"Got error initializing data source: " + ex.getMessage(),
					ex);
			return null;
		}
	}
}
