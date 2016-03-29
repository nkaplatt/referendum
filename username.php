<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php include("header.php"); ?>

<?php require_once("cookies.php"); ?>

<?php
$message = "Please log in.";

 if (isset($_POST['submit'])) {
	 
		$username = $_POST["username"];

		$query = "SELECT * FROM User_tbl WHERE First_Name = '$username'";
	 	$result = mysqli_query($connection, $query);
	  if(mysqli_fetch_assoc($result) != null) {
          $output1 = $username;
          redirect_to("welcome.html.php");
		} else {
		  echo "Either the username is incorrect";
		}
 }

	if (isset($_POST['register'])) {
		redirect_to("newuser.php");
	}


?>

	
<html lang="en">
	<head>
		<title>Form</title>
	</head>
	<body>
		<div id="main">
			<div id="navigation">
				<a href="username.php.php">Login</a>
			</div>
			<div id="page">
				<?php echo $message; ?><br />

				<form action="username.php" method="post">
					Usernumber: <input type="text" name="username" value="" /><br />
					<br />
					<input type="submit" name="submit" value="Submit" />
					<input type="submit" name="register" value="Register" />
				</form>
			</div>
		</div>
	</body>
</html>

<?php require_once("close_connection.php"); ?>
<?php include("footer.php"); ?>
