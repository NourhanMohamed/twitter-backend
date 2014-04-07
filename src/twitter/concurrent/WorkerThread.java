package twitter.concurrent;

import java.util.logging.Level;
import java.util.logging.Logger;

public abstract class WorkerThread implements Runnable { 
    Logger lgr = Logger.getLogger(WorkerThread.class.getName());
     
    public WorkerThread(){
        
    }
 
    @Override
    public void run() {
    	lgr.log(Level.INFO, Thread.currentThread().getName()+" Starting...");
        processCommand();
        lgr.log(Level.INFO, Thread.currentThread().getName()+" Terminating...");
    }
 
    protected abstract void processCommand();
}