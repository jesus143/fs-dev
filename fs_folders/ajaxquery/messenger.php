<?php
	require("connect.php");
	$subj=$_GET["subj"];
	$msg=$_GET["msg"];
	$from=$_GET["from"];
	$to=$_GET["to"];
	
	$headers = 'From: '.$from.'' . "\r\n" .
    'Reply-To: '.$from.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subj, $msg, $headers) or die(2);
	echo "1";
?>