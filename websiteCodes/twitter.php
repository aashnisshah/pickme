<?php

if (!file_exists('db.php')) {
	echo 'Error. File does not exist.';
}

require_once('db.php');

$json_string = 'http://search.twitter.com/search.json?q=infect13&rpp=20&include_entities=true&result_type=mixed';

$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata, true);
//print_r($obj['results']);


//print_r($data['created_at']);

for ( $counter = 0; $counter < 1; $counter += 1) {
	//$obj[$counter];
	print_r($obj['results'][$counter]);
	
	echo "<br>";
}


for ( $counter = 0; $counter < 20; $counter += 1) {
	//$obj[$counter];
	
	$username = $obj['results'][$counter]['from_user'];

	$query = "SELECT * FROM user_profile";
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($result)){
		if($row['twitterId'] == $username){
			$uce = "SELECT * FROM user_contest_entry WHERE userId=".$row['id'];
			echo $uce;
			$uce_result = mysqli_query($link, $uce);
			while($uce_row = mysqli_fetch_array($uce_result)){
				if($uce_row['twitterTime'] != $obj['results'][$counter]['created_at']){
					/*echo 'uce row';
					echo $username.' posted at (stored) ';
					echo $uce_row['twitterTime'].' (twitter) ';
					echo $obj['results'][$counter]['created_at'].'<br>';
					break;*/
					echo 'add new entry for user';
					//$newCount = $uce_row['twitterCount'] + 1;
					mysqli_query($link, "INSERT INTO user_contest_entry SET
								userId = ".$row['id'].",
								businessId = 1,
								twitterTime = ".$obj."['results'][".$counter."]['created_at'].");
					
				} else {
					echo 'user entry already exists';
				}
				//print_r($uce_row);
			}
		} else {
			//echo $username.' does not exist<br>';
		}
	}
	
	
	//print_r($obj['results'][$counter]['from_user']);
	
	echo "<br>";
}

?>
























