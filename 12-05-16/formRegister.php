<?php
        function check_user_exists($Session_ID, $connection) {                          //N.b. not check_fbuser_
exists()
          $query = "SELECT * ";
          $query .= "FROM User_tbl ";
          $query .= "WHERE MUser_ID = '$Session_ID'";
          $query .= "LIMIT 1";
          $email_set = mysqli_query($connection, $query);
          confirm_query($email_set);
          if($Session_ID = mysqli_fetch_assoc($email_set)) {
            return true;
          }
          return false;
        }
        function redirect_to($new_location) {
          header("Location: " . $new_location);
          exit;
        }
        function confirm_query($result) {
                if (!$result) {
        }
                        die("Database query failed");
                }
        }



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

                echo '<script type="text/javascript">'
                        ,       'alert('This is Called!');'
                        , '</script>';

                $email = mysqli_real_escape_string($connection,$_POST['email']);
        $pass1 = mysqli_real_escape_string($connection,$_POST['password']);
        $pass2 = mysqli_real_escape_string($connection,$_POST['password2']);

                // Test if connection occured
                if (mysqli_connect_errno()) {
                  die("Database connection failed: " .
                      mysqli_connect_error() .
                      " (" . mysqli_connect_errno() . ")"
                  );
                }
                $email = mysqli_real_escape_string($connection, $email);
                $email_noSalt = $email;
                $email = $email . 'EU';
                $Session_ID = hash('sha256', $email);
                if (check_user_exists($Session_ID, $connection)) {                            //Check email is not already registered
                  $error = 'This email is already registered';
                }
                else {

                  if ( strcmp($pass1, $pass2) == 0 ) {                                     $
                    $pass_h = $pass1 . 'EU2';
                    $pass_h = hash('sha256', $pass_h);
                    $query  = "INSERT INTO User_tbl (MUser_ID, Email_Address, UPassword) ";
                    $query .= "VALUES ( '{$Session_ID}', '{$email_noSalt}', '{$pass_h}');";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                      $_SESSION['login_user'] = $Session_ID;
                      header("location: welcome.php");
                      //redirect_to("another_page.php");                                   $
                    }
                    else {
                      //$message = "Subject creation failed";
                      die("Database query failed" . mysqli_error($connection));
                    }
                  }
                  else {
                    $error = 'Registeration Error: Passwords don\'t match';
                  }
                }
        }
?>
