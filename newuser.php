<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php include("header.php"); ?>

<?php session_start();
$session_id = session_ID(); ?>

<?php
$message = "Please sign up top acces the referendum.";


 if (isset($_POST['register'])) {
	 $firstname = $_POST['username'];
     $lastname = $_POST['lastname'];
     $email = $_POST['email'];
     $postcode = $_POST['postcode'];
     if (isset($_POST['18-32'])) {
         $AGE = 1;
     } else if (isset($_POST['33-55'])) {
         $AGE = 2;
     } else if (isset($_POST['56+'])) {
         $AGE = 3;
     } else $AGE = null;
     
     
     mysqli_select_db($connection, "referendum");
	 $query = "INSERT INTO `User_tbl`(`Session_ID`, `Email_Address`, `First_Name`, `Last_Name`, `Post_Code`, `AGE`) VALUES ('$session_id', '$email', '$firstname', '$lastname', '$postcode', $AGE)";
     echo $query;
	 $result = mysqli_query($connection, $query);
     echo $result;
     if ($result != null) {echo $result;} else {echo "its null";}
 }
?>

<html lang="en">
	<head>
		<title>Register Form</title>
	</head>
	<body>
		<div id="main">
			<div id="navigation">
				<a href="username.php">Login</a>
			</div>
			<div id="page">
				<h2>Please enter your details to sign up for the referendum.</h2>

				<form action="newuser.php" method="post">
					Firstname: <input type="text" name="username" value="" /><br />
                    Lastname: <input type="text" name="lastname" value="" /><br />
                    Email: <input type="email" name="email" value="" /><br />
                    Postcode: <input type="text" name="postcode" value="" /><br />
					<br />
                    Age: <input type="checkbox" name="18-32" value="" />18-32 &nbsp;<input type="checkbox" name="33-55" value="" />33-55 &nbsp;<input type="checkbox" name="56+" value="" />56+<br /> 
					<input type="submit" name="register" value="Register" />
				</form>
			</div>
		</div>
	</body>
</html>


<?php require_once("close_connection.php"); ?>
<?php include("footer.php"); ?>