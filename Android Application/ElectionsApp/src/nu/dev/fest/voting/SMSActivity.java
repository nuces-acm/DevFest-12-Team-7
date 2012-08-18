package nu.dev.fest.voting;



import android.app.Activity;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class SMSActivity extends Activity{
	
	private Notification notification;
	private NotificationManager mNM;
	private int i=0;
	String[] messages={"Login Successful: Reply 1 for Candidate 1","Are You Sure?","Vote Casted Successfuly"};
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		this.setContentView(R.layout.sms_demo);
		mNM = (NotificationManager)getSystemService(NOTIFICATION_SERVICE);
		
		Button button=(Button) this.findViewById(R.id.sms_send_message);
		
		button.setOnClickListener(new OnClickListener(){

			@Override
			public void onClick(View arg0) {
				if(i>=3)
					return;
				setNotification();
				mNM.notify(R.string.notify_sms,notification);
				i++;
				
			}
			
		});

	}
	
	public void setNotification(){
		notification=new Notification(R.drawable.stat_sample_icon,messages[i],System.currentTimeMillis());
		   PendingIntent contentIntent = PendingIntent.getActivity(this, 0,
	               new Intent(this, SMSActivity.class), 0);
		   this.notification.setLatestEventInfo(this, "Voting Step "+i+1, messages[i], contentIntent);
	}

	}
