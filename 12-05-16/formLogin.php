<?php
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
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

                // Test if connection occured
                if (mysqli_connect_errno()) {
                die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"  );
                }
                echo "Working...";

                $email = mysqli_real_escape_string($connection,$_POST['email']);
        $mypassword = mysqli_real_escape_string($connection,$_POST['password']) . 'EU2';

        $sql = "SELECT MUser_ID FROM User_tbl ";
        $sql .= "WHERE Email_Address = '$email' and ";
        $sql .= "UPassword = '$mypassword';";
        $result = mysqli_query($connection, $sql);

        if(mysqli_fetch_assoc($result) != null) {
                //session_register("myemail");
                        $email_noSalt = $email;
                        $email = $email . 'EU';
                        $Session_ID = hash('sha256', $email);
            $_SESSION['login_user'] = $Session_ID;
            header("location: welcome.php");
        } else {
                $error = "Your login name/password is invalid";
        }
        /*
        $email_address = $email . 'EU';
        $Session_ID = hash('sha256', $email_address);
        echo $Session_ID;
                */
        }
?>
