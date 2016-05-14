<?php
require_once("js/functions.php") ;
require_once("anonymous.php");

if(isset($_POST['q'])) {
  $type = $_POST['q'];
  $type = assign_num_to_column($type);
}
  //1. Create database connection
  $dbhost = "173.194.245.76";
  $dbuser = "remoteonlineuser";
  $dbpass = "NickJames15markgareth";
  $dbname = "test";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection occured
  connectQuery();

  edit_option($userID, $type, check_change($userID, $type, $connection), $connection);
  mysqli_close($connection);

function assign_num_to_column($class) {
  $value = 0;
  switch($class) {
    case "icon-button":
    $value = "Econ";
    break;
    case "icon-button-2":
    $value = "Imo";
    break;
    case "icon-button-3":
    $value = "SovandLaw";
    break;
    case "icon-button-4":
    $value = "Jobs";
    break;
    case "icon-button-5":
    $value = "DefenceandSecurity";
    break;
    default:
    $value = "Nochosen";
  }
  return $value;
}

function check_change($username, $type, $connection){
  $query = "SELECT {$type} FROM User_tbl ";
  $query .= "WHERE MUser_ID = '{$username}';";

  $result = mysqli_query($connection, $query);
  while ($value = mysqli_fetch_array($result)) {
    $aord = $value[$type];
    mysqli_free_result($result);
    if ($aord == 0) {
      return "add";
    }
    return "delete";
  }
}
function edit_option($username,$option,$typeofchange, $connection){
  /*
  * option - type of button e.g. econ
  *
  *
  */
  if (strcmp($typeofchange, "add") == 0){
    $query = "Update User_tbl ";
    $query .= "SET {$option} = 1 ";
    $query .= "WHERE MUser_ID = '$username';";
  }
  else if (strcmp($typeofchange, "delete") == 0){

    $query = "Update User_tbl ";
    $query .= "SET $option = 0 ";
    $query .= "WHERE MUser_ID = '$username';";
  }
  $result = mysqli_query($connection, $query);
}

?>
