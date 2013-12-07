package hack.group.pickme;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONObject;

import android.os.AsyncTask;

public class TweetAsync extends AsyncTask<String, Void, Void> {

	Tweet[] tweets = null;
	
	@Override
	public Void doInBackground(String... params){
		
		try {
			URL url = new URL("http://search.twitter.com/search.json?q=%23" + params[0] +"&rpp=25&include_entities=true&result_type=mixed");
	        BufferedReader in = new BufferedReader(new InputStreamReader(url.openStream()));
	        String inputLine;
	        while ((inputLine = in.readLine()) != null){
	        }
	        in.close();
	        
	        JSONObject jobj = new JSONObject(inputLine);
	        JSONArray tweetarrayJ = jobj.getJSONArray("results");
	        int i;
	        for (i=0; i < tweetarrayJ.length(); i++){
	        	Tweet t = new Tweet(tweetarrayJ.getJSONObject(i).getString("from_user_name"), tweetarrayJ.getJSONObject(i).getString("text"), 
	        			tweetarrayJ.getJSONObject(i).getString("profile_image_url"), tweetarrayJ.getJSONObject(i).getString("created_at"), 
	        			tweetarrayJ.getJSONObject(i).getString("from_user"));
	        	tweets[i] = t;
	        }
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return null;
	}
}
