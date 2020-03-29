<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "kpushpinder28@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://email-smtp.us-east.amazonaws.com"; // SMTP host
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "Amazon SMTP Username";  // SMTP  username
$mail->Password   = "Amazon SMTP Password";  // SMTP password
$mail->SetFrom($from, 'From Name');
$mail->AddReplyTo($from,'From Name');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
if($mail->Send())
	return true;
else
	return false;
}
?>