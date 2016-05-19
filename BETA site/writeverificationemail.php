<?php
function send_email($email_hashed, $email_noSalt) {
	include('PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'leaveorstayemails@gmail.com';                 // SMTP username
	$mail->Password = 'leavestay';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	$mail->setFrom('noreply@leaveorstay.co.uk');
	$mail->addAddress($email_noSalt);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('');
	//$mail->addBCC('');
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Leaveorstay verify signup';
	$mail->Body    = '
	<body background-color: lightblue">
	<font color="black">Thanks for signing up to LeaveorStay!</font>
    We\'ve created your account, you can login using the following credentials once you have activated your account by following the URL below. <br><br><br>
    ----------------------- <br>
    Email: '.$email_noSalt.' <br>
    ----------------------- <br><br><br>
    Please click this link in order to activate your account: <br>
    localhost/finalbeta/jamesfiles/verifiedemail.php?hash='.$email_hashed.'
	</div>
	</body>';
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer.";
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else { ?>
    <h2 style='align:center; color:white; background-color:#e31064;'>Check your inbox for our verification link</h2>
	<?php }
}
?>