package nu.dev.fest.voting;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.graphics.drawable.BitmapDrawable;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.PopupWindow;
import android.widget.Toast;

public class ElectionsActivity extends Activity{
	
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
	
	private LinearLayout linearLayout;
	
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
    	
    	
    	/*HttpURLConnection connection = null;
    	DataOutputStream outputStream = null;
    	DataInputStream inputStream = null;

    	String pathToOurFile = selectedFile.getPath();
    	//String urlServer = "http://192.168.1.1/handle_upload.php";
    	String urlServer = "http://10.0.2.2/virtualAndroid/AppLogin.php";
    //	String urlServer = 
    //		"http://www.virtualbrandshop.com/virtualAndroid/handle_upload.php";
    	String lineEnd = "\r\n";
    	String twoHyphens = "--";
    	String boundary =  "*****";
    
    	
    	
    //	showDialog(DIALOG1_KEY);

    	int bytesRead, bytesAvailable, bufferSize;
    	byte[] buffer;
    	int maxBufferSize = 1*1024*1024;

    	try
    	{
    	FileInputStream fileInputStream = new FileInputStream(new File(pathToOurFile));
    	
    	URL url = new URL(urlServer);
    	
    	Log.d("Connection URL", url.openConnection().toString());
    	
    	connection = (HttpURLConnection) url.openConnection();

    	// Allow Inputs & Outputs
    	connection.setDoInput(true);
    	connection.setDoOutput(true);
    	connection.setUseCaches(false);

    	// Enable POST method
    	connection.setRequestMethod("POST");

    	connection.setRequestProperty("Connection", "Keep-Alive");
    	connection.setRequestProperty("Content-Type", "multipart/form-data;boundary="+boundary);
    	
    	Log.d("OutputStream", connection.getOutputStream().toString());
    	
    	outputStream = new DataOutputStream( connection.getOutputStream());
    	
    	outputStream.writeBytes(twoHyphens + boundary + lineEnd);
    	outputStream.writeBytes("Content-Disposition: form-data; name=\"uploadedfile\";filename=\"" + pathToOurFile +"\"" + lineEnd);
    	outputStream.writeBytes(lineEnd);

    	bytesAvailable = fileInputStream.available();
    	bufferSize = Math.min(bytesAvailable, maxBufferSize);
    	buffer = new byte[bufferSize];
    	 	

    	// Read file
    	bytesRead = fileInputStream.read(buffer, 0, bufferSize);

    	while (bytesRead > 0)
    	{
        	outputStream.write(buffer, 0, bufferSize);
        	bytesAvailable = fileInputStream.available();
        	bufferSize = Math.min(bytesAvailable, maxBufferSize);
        	bytesRead = fileInputStream.read(buffer, 0, bufferSize);
    	}

    	outputStream.writeBytes(lineEnd);
    	outputStream.writeBytes(twoHyphens + boundary + twoHyphens + lineEnd);

    	// Responses from the server (code and message)
    	int serverResponseCode = connection.getResponseCode();
    	String serverResponseMessage = connection.getResponseMessage();
    	
    	Toast.makeText(this, serverResponseCode, Toast.LENGTH_LONG).show();
    	
    	

    	fileInputStream.close();
    	outputStream.flush();
    	outputStream.close();
    	}
    	catch (Exception ex)
    	{
    	//Exception handling
    		int i=0;
    	Toast.makeText(this, ex.toString(), Toast.LENGTH_LONG).show();
    	}
    	*/
    	
    	tryLogin();
    	
    	
    	//////////////////////////////////////////////////////////////////////////////////
    	// move to new activity
    	Intent intentDay = null; // Reusable Intent for each tab
		intentDay = new Intent().setClass(this, ElectionsAppActivity.class);
		
		intentDay.putExtra("username", usernameStr);
		intentDay.putExtra("password", passwordStr);
		
		
		startActivity(intentDay);
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
                url = new URL("http://10.0.2.2/virtualAndroid/AppLogin.php");
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
                // You can perform UI operations here
                Toast.makeText(this,"Message from Server: \n"+ response,
                		Toast.LENGTH_LONG).show();        
                isr.close();
                reader.close();

            }
            catch(IOException e)
            {
                // Error
            }
    }

    
 
    private void initiatePopupWindow(int paddingFromParent,int x,int y) {
	    try {
	        //We need to get the instance of the LayoutInflater, use the context of this activity
	        LayoutInflater inflater = (LayoutInflater) ElectionsActivity.this
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
	   
	   if(username.equals("") || name.equals("") || password.equals("") || confirm_password.equals(""))
	   {
		   Toast.makeText(this, "Please Enter Complete Information", Toast.LENGTH_LONG).show();
	   }
	   
	   else if(!password.equals(confirm_password))
	   {
		   Toast.makeText(this, "Password Does Not Match", Toast.LENGTH_LONG).show();
	   }
	   else
	   {
		   Toast.makeText(this, "Information Collected Successfuly Name: "+name+" User: "+username+" password: "+password, Toast.LENGTH_LONG).show();
	   }
		   
   }

}
