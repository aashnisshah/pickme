<?php 
	require_once('db.php');
	
	$query = "SELECT * FROM business_contest";
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($result)){
		if($row['active'] == '1'){
			$json_string = 'http://search.twitter.com/search.json?q=%23'.$row['track'].'&rpp=50&include_entities=true&result_type=mixed';
			
			$jsondata = file_get_contents($json_string);
			$obj = json_decode($jsondata, true);
		
			//print_r($obj);
			
			for ( $counter = 0; $counter < 20; $counter += 1) {
				//echo $obj['results'][$counter]['from_user'].' '.$obj['results'][$counter]['id_str'];
				//echo 'break 1';
				$upquery = "SELECT * FROM user_profile WHERE twitterId='".$obj['results'][$counter]['from_user']."'";
				$upresult = mysqli_query($link, $upquery);
				//echo 'break 2';
				//echo $upquery;
				while($uprow = mysqli_fetch_array($upresult)){
				//echo 'break 3';
					mysqli_query($link, "INSERT INTO user_contest_entry SET
												contestId = '".$row[id]."',
												userId = '".$uprow[id]."',
												twitterId = '".$obj['results'][$counter]['from_user']."'");
					//echo 'added '.$obj['results'][$counter]['from_user_name'].' into db';
					
				}
			
			//echo "<br>";
			}
		}
		
	}

?>