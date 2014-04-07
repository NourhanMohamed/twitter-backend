package twitter.concurrent;

import java.util.concurrent.Executors;
import java.util.concurrent.ThreadFactory;
import java.util.concurrent.ThreadPoolExecutor;

public class WorkerPool {
	ThreadPoolExecutor executor;

	public WorkerPool(int poolSize) {
		ThreadFactory threadFactory = Executors.defaultThreadFactory();
		executor = (ThreadPoolExecutor) Executors.newFixedThreadPool(poolSize,
				threadFactory);
		RejectedExecutionHandlerImpl rejectionHandler = new RejectedExecutionHandlerImpl();
		executor.setRejectedExecutionHandler(rejectionHandler);
	}

	public void shutdown() {
		executor.shutdown();
	}

	public void execute(Runnable r) {
		executor.execute(r);
	}

	public void submit(Runnable r) {
		executor.submit(r);
	}
}
