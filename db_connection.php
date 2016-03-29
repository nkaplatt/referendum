<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "Nick");
	define("DB_PASS", "mac133");
	define("DB_NAME", "referendum");

    // 1. Create a database connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //Test if connection occured.
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
           mysqli_connect_error() .
           " (" . mysqli_connect_errno() . ")"
        );
    } else {
        echo 'connection success';
    }
?>