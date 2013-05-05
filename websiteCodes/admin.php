<?php 
	if (!file_exists('db.php')) {
		echo 'Error. File does not exist.';
	}

	require_once('db.php');

	if((isset($_POST['type'])) == 'user'){
		$account = 'user';
	} else if(isset($_POST['type'])=='business'){
		$account = 'business';
	} else {
		$account = 'user';	
	}
			
			
	if($account != 'user'){	
	
		/*$query = "SELECT * FROM user_profile";
		$result = mysqli_query($link, $query);
	
		while($row = mysqli_fetch_array($result))
		  {
		  $titleStart .= $row['name'] . " " . $row['email'];
		  echo "<br>";
		  }
		*/
		
		
		$output = '<h2><span>Admin Page: User<br><br>'.
				'<a href="contest.php">Join a Contest</a></span>';
		
		/*$query = "SELECT * FROM user_contest_entry WHERE userId=1";
		$result = mysqli_query($link, $query);
	
		while($row = mysqli_fetch_array($result)){
		  $output .= '<a href="/contest.php?c='.$row['contestId'] . '">"'.$row['contestId'] . '</a>';
		  $output .= "<br>";
		}*/
		

				// user info
				// account integration stuff
				// contests - current/past
	} else {
		$output .= '<h2><span>Admin Page: Business<br><br>'.
			'<a href="/contest.php?c=6">View Contests</a><br>'.
			'<a href="/newContest.php">Create New Contest</a></span>';
	} 
	
	$output .= '</span></h2>';
	
	
	$titleStart = '<section id="content">'.
	'<header id="homeheader">'.
	'';
	
	$titleEnd = ''.
	'<img src="images/umbrella.gif" width="1" height="1" alt="header image" class="headerimg"> </header>';

		echo $header.$titleStart.$output.$titleEnd.'<br><br>'.
			$footer;
	
	

?>