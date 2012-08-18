package nu.dev.fest.voting;


import android.app.Activity;
import android.app.AlertDialog;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.drawable.BitmapDrawable;
import android.os.Bundle;
import android.util.Log;
import android.view.Gravity;
import android.view.KeyEvent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ExpandableListView;
import android.widget.LinearLayout;
import android.widget.PopupWindow;
import android.widget.Toast;


public class DocumentActivity extends Activity implements OnClickListener{

	
	private Button sms;
	private Button online;
	private Button language;
	private Dialog alertLanguage;
	
	
	
	//private int[] keyword_id={R.id.edit_text_keyword1,R.id.edit_text_keyword2,R.id.edit_text_keyword3,R.id.edit_text_keyword4,R.id.edit_text_keyword4,R.id.edit_text_keyword5};
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		this.setContentView(R.layout.open_doc);
		
		this.sms=(Button) this.findViewById(R.id.button_sms);
		this.online=(Button) this.findViewById(R.id.button_online);
		this.language=(Button) this.findViewById(R.id.button_language);
		//this.help_button=(Button) this.findViewById(R.id.button_documentactivity_help);
		//this.linearLayout=(LinearLayout) this.findViewById(R.id.open_doc_linear_layout);
		
		
		this.sms.setOnClickListener(this);
		this.online.setOnClickListener(this);
		this.language.setOnClickListener(this);
		//this.help_button.setOnClickListener(this);
		this.createLanguageMenu();
	}

	@Override
	public void onClick(View v) {
		
		Intent intent=new Intent();
		if(v.getId()==R.id.button_language)
		{
			
			this.alertLanguage.show();
		}
		else if(v.getId()== R.id.button_sms)
		{
			intent.setClass(this, SMSActivity.class);
			startActivity(intent);
			
		}
		else if(v.getId()== R.id.button_online)
		{
			intent.setClass(this,ElectionsAppActivity.class);
			startActivity(intent);
		}
		
	}
	
	
	
	 final CharSequence[] itemLanguage = { "Urdu", "Sindhi","Punjabi","Balochi","Saraiki","Kashmiri","Hindi","English"};// ,"Dark Gray","Gray","Green","L Gray","Magenta","Red","White"};

	// final int[] itemsS = { 1,-1};

	public void createLanguageMenu() {
		AlertDialog.Builder builder = new AlertDialog.Builder(this);
		builder.setTitle("Pick a Language");
		builder.setSingleChoiceItems(itemLanguage, -1,
				new DialogInterface.OnClickListener() {
					public void onClick(DialogInterface dialog, int item) {

						alertLanguage.dismiss();
					}
				});
		alertLanguage = builder.create();
		alertLanguage.setCancelable(true);
	}

	
	
	
	
}
