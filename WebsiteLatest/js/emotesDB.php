<?php
require_once("functions.php");

if(isset($_GET['q']) && isset($_GET['p'])) {
  $emoteName = $_GET['q'];
  $emoteNum  = $_GET["p"];
}

  //Open Database connection
  $dbhost = "10.132.0.2";
  $dbuser = "root";
  $dbpass = "NickJames15markgareth";
  $dbname = "neweudb";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  //Test success
  connectQuery();

  //Perform database query
  $category = "Immigration";
  $emoticon = $emoteName;
  $number   = $emoteNum ;
  $userID = 0;
  $Email_Address = "Hello@hotmail.co.uk";
  $password = "Secret";

  //Checks if the user is in the database
  if (checkIfInDatabase($connection, $Email_Address) > 0){
    echo("Email Found");
  } else{
    insert_new_user($connection, $userID, $password, $Email_Address);
  }

  //
?>


<html lang="en">
  <head>
    <title> Testing users </title>
  </head>
  <body>

    <?php echo("Working!")?>

  </body>
</html>

  <?php
    //closes the MYSQL connection freeing up data
    mysqli_close($connection);
  ?>
