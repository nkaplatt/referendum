<?php

function get_values($answerset,$summ){
	$happy = 0;
	$angry = 0 ;
	$shocked = 0;
	$indiffererent =0;
	$delighted = 0;
	for (z = 0 ,(z > count($answerset)), z++){
		$temp = $answerset[z];
		if $temp = 1 {
			$angry += 1;
		}
		elseif $temp = 2 {
			$shocked += 1;
			
		}
		elseif $temp = 3 {
			indifferent += 1;
		}
		elseif $temp = 4 {
			happy += 1;
			
		}
		else ${
			delighted += 1;
		}
	}
	if $summ =true{
		$leave = $angry +$shocked;
		$stay = $delighted + $happy
		return $leave,$stay,$angry,$shocked,$indifferent,$happy,$delighted ; 
	}
	else{
		$leave = 0 
		$stay = 0
		return ($leave,$stay,$angry,$shocked,$indifferent,$happy,$delighted);
	}
}


function get_results($Cat_ID,$Connection, $Session_ID){
	if ( $Cat_ID != "Sumy")
	{
	$query = "SELECT Emoticon_Type FROM Card_tbl";
	$query .= "WHERE MUser_ID = '$Session_ID' AND Category_ID = '$Cat_ID'";
	$query .= "AND Card_ID = i;";
	$answers_set= "";
	for (i = 0, i=100,i++){
		if(mysqli_query($connection, $query)){
		$tempanswers_set = mysqli_query($connection, query);	
		confirm_query($tempanswers_set);
		$answers_set+=$temmpanswers_set;
		}
	return $answer_set;
		
	}
	}

	
	else{
	
	$query = "SELECT Emoticon_Type FROM Card_tbl";
	$query .= "WHERE MUser_ID = '$Session_ID';"
	}
	$answers_set = mysqli_query($connection, $query);
	confirm_query($answers_set);
	return $answers_set;
	
}
$answer_set = get_results($Cat_ID,$Connection, $Session_ID);
echo $answer_set; 

?>

