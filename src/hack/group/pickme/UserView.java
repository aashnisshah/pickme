package hack.group.pickme;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

public class UserView extends Activity{

	@Override
	public void onCreate(Bundle savedInstanceState){
		super.onCreate(savedInstanceState);
		this.setContentView(R.layout.user_view);
		
		Intent intent = getIntent();
		
	}

}
