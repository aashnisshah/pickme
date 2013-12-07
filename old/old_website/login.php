<?php 
	require_once('db.php');

	if((isset($_SESSION['status'])) == 'active'){
		header('Location: admin.php');
		exit;
	}
	
	if(isset($_POST['lgn'])==true){
		//echo 'login';
		if($_POST['type']=='user'){
			$_SESSION['type']='user';
		} else {
			$_SESSION['type']='business';
		}
		header('Location: admin.php');
		exit;
	}
	
	$titleStart = '<section id="content">'.
	'<header id="homeheader">'.
	'<h2><span>Login To Your Account</span>'.

			'<form action="login.php?lgn=true" method="POST">'.
			'<table align="center">'.
				'<tr><td><span class="errMsg">'.$errMsg.'</span></td></tr>'.
				'<tr><td>Login Email: <input name="myName" type="text" /></td></tr>'.
				'<tr><td>Password: <input name="myPass" type="password" /></td></tr>'.
				'<tr><td><input name="lgn" value="true" type="hidden" /></td></tr>'.
				'<tr><td><input type="submit" value="Login"></td></tr>'.
			'</table>'.
			'</form>'.
	'</h2><img src="images/umbrella.gif" width="255" height="218" alt="header image" class="headerimg"> </header>';

		echo $header.$titleStart.$titleEnd.'<br><br>'.
			$footer;



?>