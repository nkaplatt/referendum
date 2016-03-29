<?php

	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
		
	}
	
	function check_existance_card($session_id, $category_id, $card_id) {
		global $connection;
			
		$session_id = mysqli_real_escape_string($connection, $session_id);
		$category_id = mysqli_real_escape_string($connection, $category_id);
        $card_id = mysqli_real_escape_string($connection, $card_id);

		$query = "SELECT User_tbl.Session_ID FROM User_tbl, Footprint_tbl, Categories_tbl, Card_tbl WHERE User_tbl.Session_ID = Footprint.Session_ID AND Footprint_tbl.Category_ID = Category_tbl.Category_ID AND Footprint_tbl.Card_ID = Card_tbl.Card_ID AND Session_ID = '$session_id'";	
		/*$query = "SELECT User_tbl.Session_ID ";
		$query .= "FROM User_tbl ";
        $query .= "INNER JOIN Footprint_tbl ON User_tbl.Session_ID = Footprint.Session_ID ";
        $query .= "INNER JOIN Categories_tbl ON Footprint_tbl.Category_ID = Category_tbl.Category_ID ";
        $query .= "INNER JOIN Card_tbl ON Footprint_tbl.Card_ID = Card_tbl.Card_ID ";*/
        /*$query .= "WHERE Session_ID = '$session_id'";*/

        $existance_card_set = mysqli_query($connection, $query);
        echo gettype($existance_card_set);
		/*confirm_query($existance_card_set);*/
		if($row = mysqli_fetch_object($existance_card_set)) {
			return true;
	    } else {
            return false;
		}
}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function add_user($new_user, $new_password, $phone, $email) {
		global $connection;
		
		$new_user = mysqli_real_escape_string($connection, $new_user);
		$new_password = mysqli_real_escape_string($connection, $new_password);
		$mobile = mysqli_real_escape_string($connection, $mobile);
		$email = mysqli_real_escape_string($connection, $email);

	
		$query = "INSERT INTO registered (username, password, mobile, email) ";
		$query .= "VALUES ('$new_user', '$new_password', '$mobile', '$email')";
		return $query;
	}

    function insert_row() {
        
    }

  /*  function return_store_value_sql($) {
        
    }*/
?>