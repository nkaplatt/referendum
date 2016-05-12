<?php
  session_start();
  if(!isset($_SESSION["login_user"])){
    $userID = 1001;
  } else {
    $userID = $_SESSION["login_user"];
  }
  require_once("functions.php");
  if(isset($_POST['q']) && isset($_POST['p'])){ //&& isset($_POST["k"])) {
    $emoteName = $_POST['q'];    //String
    $emoteNum  = $_POST["p"];    //Int
    //$emoteCat = $_POST["k"];
  }
    //Open Database connection
    $dbuser = "remoterootuser";
    //Contains IP + Password
    $myfile = fopen( "../../lemons.txt", "r") or die("Unable to open file!");
    $myIP   = fopen( "../../IP.txt", "r") or die("Unable to open file!");
    $dbpass = fread($myfile,filesize("../../lemons.txt"));
    $dbhost = fread($myIP,filesize("../../IP.txt"));

    fclose($myfile);
    fclose($myIP);

    $dbpass = trim($dbpass);
    $dbhost = trim($dbhost);

    $dbname = "test";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //Test success
    connectQuery();

    //Perform database query
    //$category = $emoteCat;
    $emoticon = $emoteName;
    $number   = $emoteNum ;
    $category = 1;

    //Insert appropriate emoticon for user ;)
    emoticon($connection, $userID, $number, $emoticon, $category);

    //Close SQL connection
    mysqli_close($connection);
?>
