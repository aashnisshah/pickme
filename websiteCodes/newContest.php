<?php 
	require_once('db.php');

	if((isset($_SESSION['status'])) == 'active'){
		header('Location: admin.php');
		exit;
	}
	
	if(isset($_GET['new'])){
		mysqli_query($link, "INSERT INTO business_contest SET
								name = '".$_POST['contestName']."',
								track = '".$_POST['contestTrack']."',
								active = '1'");
								
								
		$query = "SELECT * FROM business_contest";
		$result = mysqli_query($link, $query);

		$output .= '<h1>All Contests</h1>';
		
		while($row = mysqli_fetch_array($result)){
			$output .= '<a href="/contest.php?c='.$row['id'].'">'.$row['name'].'</a>';
			$output .= '<br>';
		}
	} else {
		$output .= '<h1>Set Up a New Contest</h1>'.

			'<form action="newContest.php?new=true" method="POST">'.
			'<table align="center">'.
				'<tr><td><span class="errMsg">'.$errMsg.'</span></td></tr>'.
				'<tr><td>Name: <input name="contestName" type="text" /></td></tr>'.
				'<tr><td>Hashtag to track: <input name="contestTrack" type="text" /></td></tr>'.
				'<tr><td><input name="lgn" value="true" type="hidden" /></td></tr>'.
				'<tr><td><input type="submit" value="Create"></td></tr>'.
			'</table>'.
			'</form>';
	}
	
	/*if(isset($_SESSION['type'])!=business){
		header('Location: admin.php');
		exit;
	}*/

	$output .= '</span></h2>';
		
		$titleStart = '<section id="content">'.
		'<header id="homeheader">'.
		'<h2><span>';
		
		$titleEnd = '<img src="images/umbrella.gif" width="255" height="218" alt="header image" class="headerimg"> </header>';
	
			echo $header.$titleStart.$output.$titleEnd.'<br><br>'.
				$footer;
		
		
		


?>