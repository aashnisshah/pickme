<?php 
	if (!file_exists('db.php')) {
		echo 'Error. File does not exist.';
	}

	require_once('db.php');

	if((isset($_SESSION['status'])) == 'user'){
		header('Location: admin.php');
		exit;
	} else if(isset($_SESSION['status'])=='business'){
		header('Location: admin.php');
		exit;
	} else {
		//header('Location: login.php');
		//exit;
	}
	
	$titleStart = '<section id="content">'.
	'<header id="homeheader">'.
	'<h2>';
	
	$titleEnd = '<span>About this sexy website of ours...</span>'.
	'As a business, this unique little tool simplifies your contest experience across multiple platforms. As a user, this tool allows you to find out about more contests.<br>'.
	'<br><span>Please <a href="login.php">login</a> to continue.</h2></span>'.
	'<img src="images/umbrella.gif" width="255" height="218" alt="header image" class="headerimg"> </header>';

		echo $header.$titleStart.$titleEnd.'<br><br>'.
			$footer;

?>