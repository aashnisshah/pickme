package hack.group.pickme;

import android.app.ListActivity;
import android.os.Bundle;

public class TweetView extends ListActivity {

	@Override
	public void onCreate(Bundle savedInstanceState){
		super.onCreate(savedInstanceState);
		this.setContentView(R.layout.tweet_view);
	}
}
