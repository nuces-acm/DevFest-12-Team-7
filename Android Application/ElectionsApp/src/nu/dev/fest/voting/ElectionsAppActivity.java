package nu.dev.fest.voting;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;






import android.app.Activity;
import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.BitmapDrawable;
import android.os.Bundle;
import android.util.Log;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.View.OnClickListener;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.PopupWindow;
import android.widget.TextView;
import android.widget.Toast;

public class ElectionsAppActivity extends Activity {
	
	private final String CORRECT="correct";
    private final String INCORRECT_USERLOGIN="incorrect";
	private EditText username;
	private EditText password;
	
	private String usernameStr;
	private String passwordStr;
	
	private File selectedFile;
	
	private PopupWindow form_data;
	private View popup_layout;
	private Button create_doc;
	
	private EditText newuser_name;
	private EditText newuser_username;
	private EditText newuser_password;
	private EditText newuser_confirm_password;
	private EditText nic;
	private EditText area_code;
	private EditText family_code;
	
	private LinearLayout linearLayout;
	private Dialog info;
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
    	super.onCreate(savedInstanceState);
        setContentView(R.layout.askuser);
    	this.linearLayout=(LinearLayout) this.findViewById(R.id.askuser_linear_layout);
        username = (EditText) findViewById(R.id.phoneField);
        password = (EditText) findViewById(R.id.nameField);
   

		
		
        
        Button register = (Button) this.findViewById(R.id.btnRegister);
        
        register.setOnClickListener(new OnClickListener(){

			@Override
			public void onClick(View arg0) {
				initiatePopupWindow(20,0,5);
				
			}
        	
        });
	    
		Button done  = (Button) findViewById(R.id.btnDone);
		//done.setBackgroundColor(Color.parseColor("#FFFFFF"));
		//done.setTextColor(Color.parseColor("#00cccc"));
	    
		done.setOnClickListener(new OnClickListener() {

			@Override
			public void onClick(View v) {
				
				String empty = "";
				
				usernameStr = username.getText().toString();
				passwordStr = password.getText().toString();

				if(usernameStr.equals(empty) && passwordStr.equals(empty))
					emptyFields();
				else if(usernameStr.equals(empty))
					emptyNameField();
				else if( passwordStr.equals(empty))
					emptyPasswordField();
				else
					moveToDayPage();
				
			}
		});
    
    }
    
    public void emptyFields()
    {
    	Toast.makeText(this, "Fields are required", Toast.LENGTH_LONG).show();
    }
    
    public void emptyNameField()
    {
    	Toast.makeText(this, "Please enter username", Toast.LENGTH_LONG).show();
    }
    
    public void emptyPasswordField()
    {
    	Toast.makeText(this, "Please enter password", Toast.LENGTH_LONG).show();
    }
    
    public void moveToDayPage()
    {
    	
    	tryLogin();
    	
    }
    
    protected void tryLogin()
    {           
        HttpURLConnection connection;
        OutputStreamWriter request = null;

            URL url = null;   
            String response = null;         
            String parameters = "username="+usernameStr+"&password="+passwordStr;   

            try
            {
                url = new URL("http://10.0.2.2/ElectionSystem/AppLogin.php");
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
                
                
            Log.e("Response text", response);
                if(response.compareTo("-1\n") == 0)
                {
                	Toast.makeText(this,"You have already casted your vote",
                    		Toast.LENGTH_LONG).show();
                }
                
                else if(response.compareTo("1\n")==0)
                {
//////////////////////////////////////////////////////////////////////////////////
                	// move to new activity
                	Intent intentDay = null; // Reusable Intent for each tab
            		intentDay = new Intent().setClass(this, CastVoteActivity.class);
            		
            		intentDay.putExtra("username", usernameStr);
            		intentDay.putExtra("password", passwordStr);
            		//intentDay.putExtra("nic", nic);
            		
            		startActivity(intentDay);
            		
                }
                else
                {
                	this.info=this.createDialog("Invalid username and/or password");
                	this.info.show();
                }
                isr.close();
                reader.close();

            }
            catch(IOException e)
            {
               Log.e("TryLogin Exception", e.toString());
            }
    }

   
    private void tryRegister(String username,String name,String password,String nic,String area_code,String family_code)
    {           
        HttpURLConnection connection;
        OutputStreamWriter request = null;

            URL url = null;   
            String response = null;         
            
          /*  
            String username=this.newuser_username.getText().toString();
     	   String name=this.newuser_name.getText().toString();
     	   String password=this.newuser_password.getText().toString();*/
     	   
     	   
            String parameters = "username="+username+"&password="+password+"&name="+name+"&nic="+nic+"&area="+area_code+"&family="+family_code;
            Log.e("Parameter List for Registration",parameters);
            
            try
            {
                url = new URL("http://10.0.2.2/ElectionSystem/AppRegister.php");
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
                	Toast.makeText(this,"User already exists with this email id.",
                    		Toast.LENGTH_LONG).show();
                }
                
                else
                {
//////////////////////////////////////////////////////////////////////////////////
                	// move to new activity
                	/*Intent intentDay = null; // Reusable Intent for each tab
            		intentDay = new Intent().setClass(this, VirtualActivity.class);
            		
            		intentDay.putExtra("username", usernameStr);
            		intentDay.putExtra("password", passwordStr);
            		
            		
            		startActivity(intentDay);*/
                	                	
                	Toast.makeText(this,"You have been registered succesfully.",
                    		Toast.LENGTH_LONG).show();
                	
                	form_data.dismiss();
            		
                }
                isr.close();
                reader.close();

            }
            catch(IOException e)
            {
                Log.e("TryRegister Exception",e.toString());
            }
    }

 
    private void initiatePopupWindow(int paddingFromParent,int x,int y) {
	    try {
	        //We need to get the instance of the LayoutInflater, use the context of this activity
	        LayoutInflater inflater = (LayoutInflater) ElectionsAppActivity.this
	                .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
	        //Inflate the view from a predefined XML layout
	        this.popup_layout = inflater.inflate(R.layout.new_doc_data_form,
	                (ViewGroup) findViewById(R.id.popup_linear_layout));
	        
	        
	        // create a 300px width and 470px height PopupWindow
	        this.form_data = new PopupWindow(this.popup_layout, this.linearLayout.getWidth()-paddingFromParent, this.linearLayout.getHeight()-paddingFromParent, true);
	        // display the popup in the center
	    
	        this.form_data.setBackgroundDrawable(new BitmapDrawable());
	        this.form_data.setOutsideTouchable(true);
	        this.form_data.showAtLocation(this.popup_layout, Gravity.CENTER, x, y);
	 
	        this.create_doc=(Button) this.popup_layout.findViewById(R.id.button_popup_create);
	      //  this.create_doc.setOnClickListener(this);
	        
	        this.newuser_name=(EditText) this.popup_layout.findViewById(R.id.edit_text_name);
	        this.newuser_username= (EditText) this.popup_layout.findViewById(R.id.edit_text_username);
	        this.newuser_password= (EditText) this.popup_layout.findViewById(R.id.edit_text_password);
	        
	        
	        this.newuser_confirm_password= (EditText) this.popup_layout.findViewById(R.id.edit_text_confirm_password);
	        
	        
	        this.nic=(EditText) this.popup_layout.findViewById(R.id.edit_text_nic);
	 	    this.family_code=(EditText) this.popup_layout.findViewById(R.id.edit_text_family_num);
	 	    this.area_code=(EditText) this.popup_layout.findViewById(R.id.edit_text_area_code);
	        
	        
	       
	 
	    } catch (Exception e) {
	        e.printStackTrace();
	    }
	}
    
    
   public void create_user_eventHandler(View v)
   {
	  // Toast.makeText(this, "Registration Clicked", Toast.LENGTH_LONG).show();
	   
	   String username=this.newuser_username.getText().toString();
	   String name=this.newuser_name.getText().toString();
	   String password=this.newuser_password.getText().toString();
	   String confirm_password=this.newuser_confirm_password.getText().toString();
	   String nic=this.nic.getText().toString();
	   String area_code=this.area_code.getText().toString();
	   String family_code=this.family_code.getText().toString();
	   
	   
	   if(username.equals("") || name.equals("") || password.equals("") || confirm_password.equals("") || nic.equals("") || area_code.equals("") || family_code.equals(""))
	   {
		   Toast.makeText(this, "Please Enter Complete Information", Toast.LENGTH_LONG).show();
	   }
	   
	   else if(!password.equals(confirm_password))
	   {
		   Toast.makeText(this, "Passwords Does Not Match", Toast.LENGTH_LONG).show();
	   }
	   else
	   {
		   tryRegister(username,name,password,nic,area_code,family_code);
	   }
		   
   }
   
   
   
   
  
   protected Dialog createDialog(String message) {
       
           AlertDialog.Builder builder = new AlertDialog.Builder(this);
           builder.setTitle(R.string.dialog_title);
           builder.setMessage(message);
           builder.setIcon(android.R.drawable.btn_star);
   builder.setPositiveButton(android.R.string.ok, new
   DialogInterface.OnClickListener() {
                     public void onClick(DialogInterface dialog, int which) {
                          // Toast.makeText(getApplicationContext(),
   //"Clicked OK!", Toast.LENGTH_SHORT).show();
                    	 dialog.dismiss();
                         return;
                   } });
           return builder.create();
 
   }
   
   
   
}