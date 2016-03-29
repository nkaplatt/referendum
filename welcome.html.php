<?php require_once("db_connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php include("header.php"); ?>

<?php

 if (isset($_POST['submiti'])) {
	 
	 $input = $_POST['submiti'];
     $category_id = 1;
     $card_id = 1;
     $session_id = 1;
     
	 $result = check_existance_card($session_id, $category_id, $card_id);
     if ($result == true) {
         echo "it worked";
     } else {
         echo "It doesnt exist";
     }
 }
?>

<html>
	<head>
		<title>PHP Output</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
	</head>
	<div id="main">
		<body>
			<div id="navigation">
			</div>
			<div id="page">
				<div id="box">
					<div id="textbox">
						<p>
							<form action="welcome.html.php" method="post">
                            Immagration: <input type="text" name="submiti" value="" /><br />
                            <br />
                            <input type="submit" name="submiti" value="Submit" />
                            </form>
                        </p>
                    </div>
                    <div id="textbox">
                        <p>
                            <form action="welcome.html.php" method="post">
                            Economy: <input type="text" name="submite" value="" /><br />
                            <br />
                            <input type="submit" name="submite" value="Submit" />
                        </form>
                        </p>
                    </div>
                    <div id="textbox">
                        <p>
                            <form action="welcome.html.php" method="post">
                            Law: <input type="text" name="submitl" value="" /><br />
                            <br />
                            <input type="submit" name="submitl" value="Submit" />
                            </form>
                        </p>
                    </div>
				</div>
			</div>
		</body>
	</div>
</html>

<?php include("footer.php"); ?>
