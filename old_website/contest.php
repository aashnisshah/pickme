<?php 
	require_once('db.php');
	include 'update.php';


	if((isset($_SESSION['status'])) == 'active'){
		header('Location: admin.php');
		exit;
	}
	
	$output;
	
	if(!isset($_GET['c'])){
		$query = "SELECT * FROM business_contest";
		$result = mysqli_query($link, $query);
		
		$output .= 'All Contests<br>';
		
		while($row = mysqli_fetch_array($result)){
			$output .= '<a href="/contest.php?c='.$row['id'].'">'.$row['name'].'</a>';
			$output .= '<br>';
		}
		$titleStart = '<section id="content">'.
		'<header id="homeheader">'.
		'<h2><span>';
		
		$titleEnd = '</span></h2>'.
		'<img src="images/umbrella.gif" width="255" height="218" alt="header image" class="headerimg"> </header>';

		echo $header.$titleStart.$output.$titleEnd.'<br><br>'.
			$footer;
		
	} else {
	
	/*if(isset($_SESSION['type'])!=business){
		header('Location: admin.php');
		exit;
	}*/

		
			
		$query = "SELECT * FROM business_contest";
		$result = mysqli_query($link, $query);
		
		$output;
		
		while($row = mysqli_fetch_array($result)){
			if($row['id'] == $_GET['c']){
				$output .= '<h2>'.$row['name'].'</h2>';
				$output .= '<h3>#'.$row['track'].'</h3>';
			}
		}
		
		$query2 = "SELECT * FROM user_contest_entry WHERE contestId=".$_GET['c']."";
		$result2 = mysqli_query($link, $query2);

		$output .= '</span><h4>Entrants</h4>';
		$count = 1;

		while($row2 = mysqli_fetch_array($result2)){
		
				
				$query3 = "SELECT * FROM user_profile WHERE id=".$row2['userId']."";
				$result3 = mysqli_query($link, $query3);
				while($row3 = mysqli_fetch_array($result3)){
					$output .= $count." ".$row3['name'];
					$output .= '  |  ';
					$count = $count + 1;
				}
		}
		
		$output .= '<br><a href="/contest.php?c='.$_GET['c'].'&w=y">Pick a Winner?</a><br>';
		
		if(isset($_GET['w']) AND $_GET['w']==y){
			$winner = rand(1, $count-1);
			$output .= 'The winner is entry number '.$winner.'!';
			$output .= '<br>';
			
		}
		
		$output .= '</span>';

		$titleStart = '<section id="content">'.
	'<header id="homeheader">'.
	'<h2><span>';
	
	$titleEnd = 	'<img src="images/umbrella.gif" width="1" height="1" alt="header image" class="headerimg"> </header>';

		echo $header.$titleStart.$output.$titleEnd.'<br><br>'.
			$footer;

	}
?>