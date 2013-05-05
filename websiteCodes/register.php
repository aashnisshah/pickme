<?php 
	require_once('db.php');

	if((isset($_SESSION['status'])) == 'active'){
		header('Location: admin.php');
		exit;
	}
	
	if(isset($_GET['reg'])){
		mysqli_query($link, "INSERT INTO user_profile SET
								name = '".$_POST['contestName']."',
								email = '".$_POST['contestTrack']."',
								password = '1',
								twitterId = ''");
								
								
		$query = "SELECT * FROM user_profile";
		$output .= 'You have been registered!';
	} else {
		$output .= '<h1>Set Up a New Account</h1>'.

			'<form action="register.php?reg=true" method="POST">'.
			'<table align="center">'.
				'<tr><td><span class="errMsg">'.$errMsg.'</span></td></tr>'.
				'<tr><td>Name: <input name="contestName" type="text" /></td></tr>'.
				'<tr><td>Email: <input name="contestTrack" type="text" /></td></tr>'.
				'<tr><td>Password: <input name="contestTrack" type="password" /></td></tr>'.
				'<tr><td>Twitter Handle: <input name="contestTrack" type="text" /></td></tr>'.
				'<tr><td><input name="reg" value="true" type="hidden" /></td></tr>'.
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