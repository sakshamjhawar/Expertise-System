<?php
function mail_to($to, $subject, $body)
{
	require 'class.phpmailer.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = 'smtp';
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't work
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	// or try these settings (worked on XAMPP and WAMP):
	// $mail->Port = 587;
	// $mail->SMTPSecure = 'tls';


	$mail->Username = "kpushpinder28@gmail.com";
	$mail->Password = "maipagalhu1";

	$mail->IsHTML(true); // if you are going to send HTML formatted emails
	$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

	$mail->From = "kpushpinder28@gmail.com";
	$mail->FromName = "Pushpinder";

	$mail->addAddress($to,"User 1");
	//$mail->addAddress("kpushpinder28@gmail.com","User 2");

	//$mail->addCC("user.3@ymail.com","User 3");
	//$mail->addBCC("user.4@in.com","User 4");

	$mail->Subject = $subject;
	$mail->Body = $body;

	if(!$mail->Send())
	{
		echo '<script type="text/javascript">alert("Please check your internet connection.");</script>';
		return false;
	}
	else
	{
		return true;
	}
}
?>