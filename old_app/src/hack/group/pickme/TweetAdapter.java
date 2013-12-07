package hack.group.pickme;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class TweetAdapter extends ArrayAdapter<Tweet>{
	
	Context context; 
	int layoutResourceId;
	Tweet[] tweetArray = null;
		    
	public TweetAdapter(Context context, int layoutResourceId, Tweet[] tweets) {
		super(context, layoutResourceId, tweets);
		this.layoutResourceId = layoutResourceId;
		this.context = context;
		this.tweetArray = tweets;
	}
	
	@Override
	public View getView(int position, View convertView, ViewGroup parent){
		if (convertView == null){
            LayoutInflater inflater = ((Activity)context).getLayoutInflater();
            View viewCpy = inflater.inflate(layoutResourceId, parent, false);	
		} else {
			View viewCpy = convertView;
		}
        
		Tweet tweet = tweetArray[position];
		
        if(tweet == null)
        {            
            ImageView profPic = (ImageView) convertView.findViewById(R.id.profPic);
            TextView tweetMessage = (TextView) convertView.findViewById(R.id.tweetMessage);
            TextView tweetTime = (TextView)  convertView.findViewById(R.id.time);
            TextView tweetUser = (TextView) convertView.findViewById(R.id.user);
            TextView tweetHandle = (TextView) convertView.findViewById(R.id.handle);
            
            tweetMessage.setText(tweet.getTweet());
            tweetTime.setText(tweet.getTimeStamp());
            tweetUser.setText(tweet.getUserName());
            tweetHandle.setText(tweet.getHandle());
            
        }
		
		return convertView;
		
	}
}
