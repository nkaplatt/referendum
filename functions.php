<?php

	function redirect_to_page($new_location) {
		header("Location: " . $new_location);
		exit;
		
	}

	function confirm_sql_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

    function escape_string($string_to_be_escaped) {
        global $connection;
        
        $string_escaped = mysqli_real_escape_string($connection, $string_to_be_escaped);
        return $string_escaped;
        
    }

	function insert_new_user($new_session, $new_first_name, $new_last_name, $new_postcode, $new_email, $new_age) {
		global $connection;
		
        $new_session = escape_string($new_session);
		$new_first_name = escape_string($new_first_name);
		$new_last_name = escape_string($new_last_name);
		$new_postcode = escape_string($new_postcode);
		$new_email = escape_string($new_email);
        $new_age = escape_string($new_age);

	
		$query = "INSERT INTO User_tbl (Session_ID, Email, First_Name, Last_Name, Postcode, AGE) ";
		$query .= "VALUES ('$new_session', '$new_email', '$new_first_name', '$new_last_name', '$new_postcode', $new_age)";
		return $query;
	}

    function check_for_returned_user($session_id) {
        global $connection;
        
        $session_ID = escape_string($session_id);
        
        $stmt = "SELECT `First_Name`, `Last_Name` FROM `User_tbl` WHERE `Session_ID` = '$session_ID'"; 
        return $stmt;
    }

    function add_reaction($reaction) {
        global $connection;
        
        
    }

    function scoring() {
        global $connection;
        
        
    }

    // dont need this function just reminds me to add this feature in the site later on.
    function leave_script_in_form($script) {
        global $connection;
        
        echo $script;
    }

    function validate_name($name) {
        global $connection;
            
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameError = "Only letters and white space allowed";
            return $nameError;
        }
    }

    function validate_email($email) {
        global $connection;
            
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format"; 
            return $emailError;
        }
        
    }
?>