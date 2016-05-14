<?php
	require_once('js/functions.php');

	//Creates unique ID
	if (isset($_COOKIE["LoS"]))  {
		$userID = ($_COOKIE["LoS"]);
		$_SESSION['login_user'] = $userID;
	} else if (isset($_SESSION["login_user"])) {
		$userID = $_SESSION['login_user'];
		if (!isset($_COOKIE["LoS"])){
			$name = "LoS";
			$currentSession = $userID;
			$expire = time() + (60*60*24*365);
			setcookie($name, $currentSession, $expire);
		}
	} else{
		$uniqueID = md5(uniqid(rand(), true));
		$name = "LoS";
		$currentSession = $uniqueID;
		$expire = time() + (60*60*24*365);
		setcookie($name, $currentSession, $expire);
		$_SESSION['login_user'] = $currentSession;
	}
	$userID = $_SESSION['login_user'];

	//Create user otherwise they wont be able to smbmit data, this is fine,
	//because the different lenghts of the ID can tell if they're anonamonousmous.

	/*
	//Open Database connection
	$myfile = fopen( "../lemons.txt", "r") or die("Unable to open file!");
	$myIP   = fopen( "../IP.txt", "r") or die("Unable to open file!");
	$dbpass = fread($myfile,filesize("../lemons.txt"));
	$dbhost = fread($myIP,filesize("../IP.txt"));
	fclose($myfile);
	fclose($myIP);
	$dbuser = "remoterootuser";
	$dbpass = trim($dbpass);
	$dbhost = trim($dbhost);
	*/
	$dbname = "test";
	$dbuser = "remoteonlineuser";
	$dbpass = "NickJames15markgareth";
	$dbhost = '173.194.245.76';
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$found = find_in_database($connection, $userID);
	if($found==0){
		insert_anon_user($connection, $userID);
	}
	mysqli_close($connection);
	return $userID;
?>
