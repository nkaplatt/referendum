
<?php


function email_pass($email_hashed, $email_noSalt) {

  
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

	$mail->Subject = 'Leaveorstay forgot password';
	$mail->Body    = '
    
	
	<body background-color: lightblue">

	<font color="black">To change your password to a new one please follow the link below.</font>
	
  
    
  localhost/finalbeta/jamesfiles/createnewpassword.php?hash='.$email_hashed.'
	
	</div>
	</body>';
	
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer.";

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else { ?>
    <h4 style='align:center; color:white; background-color:#e31064;'>Check your inbox for a reset password link.</h4>
	<?php }
}
?>



