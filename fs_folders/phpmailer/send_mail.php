<?php
require_once('class.phpmailer.php');
if(isset($_POST['btnsend']))
{	
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	
	$body             = file_get_contents('contents.html');
	
	$mail->SetFrom('root@fashionsponge', 'fashionsponge.com');
	
	$address = $_POST['email'];
	$mail->AddAddress($address, "Guest");
	
	$mail->Subject    = "PHPMailer Demo Test From ComputerSneaker";
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // Alt Body
	
	$mail->MsgHTML($body);
	
	$mail->AddAttachment("images/logo1.png");      // attachment
	$mail->AddAttachment("images/engr mudasir.jpg"); // attachment
	
	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "A test email sent to your email address '".$_POST['email']."' Please Check Email and Spam too.";
	  echo '<meta http-equiv="refresh" content="5;url=http://www.computersneaker.com">';
	}
}
?>