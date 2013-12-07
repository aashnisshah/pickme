package hack.group.pickme;

public class Tweet {
	
	private String userName;
	private String tweet;
	private String imageURL;
	private String timeStamp;
	private String handle;
	
	public Tweet(String username, String twt, String imgurl, String time, String handl){
		this.userName = username;
		this.tweet = twt;
		this.imageURL = imgurl;
		this.timeStamp = time;
		this.handle = handl;
	}
	
	public String getUserName() {
		return userName;
	}
	public void setUserName(String userName) {
		this.userName = userName;
	}
	public String getTweet() {
		return tweet;
	}
	public void setTweet(String tweet) {
		this.tweet = tweet;
	}
	public String getImageURL() {
		return imageURL;
	}
	public void setImageURL(String imageURL) {
		this.imageURL = imageURL;
	}
	public String getTimeStamp() {
		return timeStamp;
	}
	public void setTimeStamp(String timeStamp) {
		this.timeStamp = timeStamp;
	}

	public String getHandle() {
		return handle;
	}

	public void setHandle(String handle) {
		this.handle = handle;
	}

}
