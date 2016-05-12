<?php
function redirect_to($new_location) {
                header("Location: " . $new_location);
                exit;
}
function sessionUniqueID () {
  //This function creates a new unique ID and returns it as a string
    return uniqid("", true);
}

function cookieID(){//$connection)
  //This function will set a unique ID cookie on a new computer if it's not already there
  //This function also submits the ID to the database
  if (!isset($_COOKIE["LoS"]))  {
    //If the cookie is not set, set cookie
    $name = "LoS";
    $currentSession = sessionUniqueID();      //SESSION ID
    $expire = time() + (60*60*24*365);
    setcookie($name, $currentSession, $expire);
    //Adds the session ID to the database, this uses the function below

    //addSessionIDtoDatabase($connection, $currentSession);

    return $currentSession;
  } else{
    //Return the Cookie's ID
    return ($_COOKIE["LoS"]);
  }
}

function addSessionIDtoDatabase($connection, $currentSession){
  //This function will add a unique ID to the database,
  //in to the database /content/ in the /user_id/ column, and /content/.
    $content = "test";
    $query = "INSERT INTO content(user_id, content) ";
    $query .= "VALUES ('{$currentSession}', '{$content}')";       //NEED TO PROTECT AGAINST SQL INJECTION
    $result = mysqli_query($connection, $query);
    if ($result) {
      echo("success!!");
    }else {
      die("Database query failed" . mysqli_error($connection));
    }
  }

function deleteCookie(){
  $name = "LoS";
  $currentSession = sessionUniqueID();      //SESSION ID
  $expire = time() - (60*60*24*365);
  setcookie($name, $currentSession, $expire);
}

function connectQuery() {
 if (mysqli_connect_errno()) {
    die("Database connection failed: " .
      mysqli_connect_error() .
      " (" . mysqli_connect_errno() . ")"    //dont show them errors in final product
    );
  }
}

function escape_string($string_to_be_escaped) {
  global $connection;

  $string_escaped = mysqli_real_escape_string($connection, $string_to_be_escaped);
  return $string_escaped;
  }

function insert_new_user($connection, $userid, $new_password, $new_email) {
                $new_password = escape_string($new_password);
                $new_email = escape_string($new_email);

                $query = "INSERT INTO User_tbl(MUser_ID, Email_Address, Upassword) ";
                $query .= "VALUES ('{$userid}', '{$new_email}', '{$new_password}')";

    $result = mysqli_query($connection, $query);        //delete if works
    if ($result) {
      echo("success!!, USER INSERTED");
    }else {
      die("Database query failed" . mysqli_error($connection));
    }
                return $query;
        }

function checkIfInDatabase($connection, $email) {

    $query = "SELECT Email_Address FROM User_tbl ";
    $query .= "WHERE Email_Address = '{$email}'";
    $result = mysqli_query($connection, $query);
    if ($result) {
      return (mysqli_num_rows($result));
    }else {
      die("Database query failed" . mysqli_error($connection));
    }
    mysqli_free_result($result);
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

        function emoticon($connection, $MUser_ID, $Emoticon_Number,$Emoticon_String, $Category_ID) {

                $Emoticon_Type = 0;
                switch($Emoticon_String) {
                                        case "anger":
                                        $Emoticon_Type = 1;
                                        break;
                                        case "shock";
                                        $Emoticon_Type = 2;
                                        break;
                                        case "indifferent";
                                        $Emoticon_Type = 3;
                                        break;
                                        case "happy";
                                        $Emoticon_Type = 4;
                                        break;
                                        case "delighted";
                                        $Emoticon_Type = 5;
                                        break;
                }
                $query = "INSERT INTO Card_tbl(MUser_ID, Emoticon_Number, Emoticon_Type, Category_ID) ";
                $query .= "VALUES ('$MUser_ID', '$Emoticon_Number', '$Emoticon_Type', '$Category_ID')";

            $result = mysqli_query($connection, $query);        //delete if works
            if ($result) {
              echo("EMOTICON INSERTED ;) ");
            }else {
              die("Database query failed" . mysqli_error($connection));
            }
                        return $query;
                }


/* UNKNOWN FUNCTIONS, NOT SURE WHAT THEY DO */
 ?>
