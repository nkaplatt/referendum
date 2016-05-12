<?php
        //include('session.php');
        function confirm_query($result) {
                if (!$result) {
                        die("Database query failed");
                }
        }
        session_start();
        echo $_SESSION['login_user'];
        //Open Database connection
        $dbuser = "remoterootuser";
        //Contains IP + Password
        $myfile = fopen( "../lemons.txt", "r") or die("Unable to open file!");
        $myIP   = fopen( "../IP.txt", "r") or die("Unable to open file!");
        $dbpass = fread($myfile,filesize("../lemons.txt"));
        $dbhost = fread($myIP,filesize("../IP.txt"));

        fclose($myfile);
        fclose($myIP);

        $dbpass = trim($dbpass);
        $dbhost = trim($dbhost);

        $dbname = "test";
        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        $user_check = $_SESSION['login_user'];
        echo 'user check:';
        echo $user_check;


        $ses_sql = mysqli_query($connection,"SELECT MUser_ID from User_tbl where MUser_ID = '{$user_check}';");
        confirm_query($ses_sql);


        if(mysqli_fetch_assoc($ses_sql) != null) {
                echo 'session found!';
        } else {
                header("location:formLogin.php");
        }

        //      <h2><a href = "logout.php">Sign Out</a></h2>


?>
<html">

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome, <?php
      if (isset($_SESSION['login_user'])) {echo $_SESSION['login_user'];}
      else {echo 'login session not set';} ?></h1>
   </body>
</html>
