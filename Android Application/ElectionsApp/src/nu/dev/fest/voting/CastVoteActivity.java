package nu.dev.fest.voting;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.StatusLine;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.app.Dialog;
import android.app.ListActivity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class CastVoteActivity extends ListActivity {
	
	private static String URI_CANDIDATES_LIST="http://twitter.com/statuses/user_timeline/vogella.json";
	
	private String username;
	private String password;
	//private String nic;
	String[] can_names;
	String[] can_id;
	String[] can_area;
	private Dialog alertSure;
	ArrayAdapter<String> adapter;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		//this.setContentView(R.layout.castvote);
		
		username=this.getIntent().getExtras().getString("username");
		password=this.getIntent().getExtras().getString("password");
	
		readCandidateList();
		
				adapter = new ArrayAdapter<String>(this,
				android.R.layout.simple_list_item_1, can_names);
				this.getListView().setAdapter(adapter);
			
	}
	

	
	public void readCandidateList() {           
        HttpURLConnection connection;
        OutputStreamWriter request = null;

            URL url = null;   
            String response = null;         
            
        
            String parameters = "username="+username;//+"&password="+password;//+"&can_name="+can_name+"&can_id="+can_id;//+"&area="+area_code+"&family="+family_code;
            Log.e("Parameter List for Registration",parameters);
            
            try
            {
                url = new URL("http://10.0.2.2/ElectionSystem/getcandies.php");
                connection = (HttpURLConnection) url.openConnection();
             // Allow Inputs & Outputs
            	connection.setDoInput(true);
            	connection.setDoOutput(true);
            	connection.setUseCaches(false);
            	
                connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
                connection.setRequestMethod("POST");    

                request = new OutputStreamWriter(connection.getOutputStream());
                request.write(parameters);
                request.flush();
                request.close();            
                String line = "";               
                InputStreamReader isr = new InputStreamReader(connection.getInputStream());
                BufferedReader reader = new BufferedReader(isr);
                StringBuilder sb = new StringBuilder();
                while ((line = reader.readLine()) != null)
                {
                	
                    sb.append(line + "\n");
                   
                }
                // Response from server after login process will be stored in response variable.                
                response = sb.toString();
                
                String minusOne = "-1";
              
                
                
                
                if(response.compareTo("-1\n") == 0)
                {
                	Toast.makeText(this,"candidate list not available",
                    		Toast.LENGTH_LONG).show();
                }
                
                else
                {
                	
                	Log.e("DATA OBTAINED", response);
                	fillDataArrays(response);
                }
                isr.close();
                reader.close();

            }
            catch(IOException e)
            {
                Log.e("vote cast exception",e.toString());
            }
    }
	
	
	public void fillDataArrays(String response)
	{
		String newresponse=(String) response.subSequence(0, response.length()-1);
		Log.e("NEW RESP", newresponse);
		//String.copyValueOf(response,0,response.length()-1);
		java.util.StringTokenizer tokenizer = new java.util.StringTokenizer(newresponse, "*");

		int num= tokenizer.countTokens()/3;
		this.can_id=new String[num];
		this.can_names=new String[num];
		this.can_area=new String[num];
		
		int i=0;
		while(tokenizer.hasMoreTokens()) {
		  
		   this.can_id[i]=tokenizer.nextToken();
		  
		   this.can_names[i]=tokenizer.nextToken();
		   this.can_area[i]=tokenizer.nextToken();
		   
		   Log.e("Touple "+i,can_id[i]+","+can_names[i]+","+can_area[i]);
		   i++;
		}


	}

	@Override
	protected void onListItemClick(ListView l, View v, int position, long id) {
		// TODO Auto-generated method stub
		super.onListItemClick(l, v, position, id);
		Log.e("SELECTED CANDIDATE", can_names[position]);
		sendCandidateInfo(can_names[position],can_id[position]);
	}
	
	
	public void sendCandidateInfo(String can_name,String can_id){           
        HttpURLConnection connection;
        OutputStreamWriter request = null;

            URL url = null;   
            String response = null;         
            
          /*  
            String username=this.newuser_username.getText().toString();
     	   String name=this.newuser_name.getText().toString();
     	   String password=this.newuser_password.getText().toString();*/
     	   
     	   
            String parameters = "username="+username+"&can_id="+can_id;//+"&area="+area_code+"&family="+family_code;
            Log.e("Parameter List for Registration",parameters);
            
            try
            {
                url = new URL("http://10.0.2.2/ElectionSystem/BusinessLayer/vote.php");
                connection = (HttpURLConnection) url.openConnection();
             // Allow Inputs & Outputs
            	connection.setDoInput(true);
            	connection.setDoOutput(true);
            	connection.setUseCaches(false);
            	
                connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
                connection.setRequestMethod("POST");    

                request = new OutputStreamWriter(connection.getOutputStream());
                request.write(parameters);
                request.flush();
                request.close();            
                String line = "";               
                InputStreamReader isr = new InputStreamReader(connection.getInputStream());
                BufferedReader reader = new BufferedReader(isr);
                StringBuilder sb = new StringBuilder();
                while ((line = reader.readLine()) != null)
                {
                    sb.append(line + "\n");
                }
                // Response from server after login process will be stored in response variable.                
                response = sb.toString();
                
                String minusOne = "-1";
                // You can perform UI operations here
                
                
                
                if(response.compareTo("-1\n") == 0)
                {
                	Toast.makeText(this,"Your vote cannot be casted, Try again",
                    		Toast.LENGTH_LONG).show();
                }
                
                else
                {
                	Toast.makeText(this,"You vote is casted.",
                    		Toast.LENGTH_LONG).show();
                	Intent intentDay = new Intent().setClass(this, DocumentActivity.class);
            		startActivity(intentDay);
            		this.finish();
                }
                isr.close();
                reader.close();

            }
            catch(IOException e)
            {
                Log.e("vote cast exception",e.toString());
            }
    }
}
