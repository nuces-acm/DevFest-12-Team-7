package nu.dev.fest.voting;

import android.app.Activity;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Bundle;
import android.view.WindowManager;

public class SplashActivity extends Activity {
	
	protected int _splashTime = 5000; 
	private Thread splashTread;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		 super.onCreate(savedInstanceState);
		    setContentView(R.layout.splash);
		    setRequestedOrientation (ActivityInfo.SCREEN_ORIENTATION_PORTRAIT); 
			getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
					WindowManager.LayoutParams.FLAG_FULLSCREEN);
		    
		    final SplashActivity sPlashScreen = this; 
		    
		    // thread for displaying the SplashScreen
		    splashTread = new Thread() {
		        @Override
		        public void run() {
		            try {	            	
		            	synchronized(this){
		            		wait(_splashTime);
		            	}
		            	
		            } catch(InterruptedException e) {} 
		            finally {
		                finish();
		                
		                Intent i = new Intent();
		                i.setClass(sPlashScreen, DocumentActivity.class);
		        		startActivity(i);
		                
		                
		            }
		        }
		    };
		    
		    splashTread.start();
	}

	
}
