<?php 
	session_start();
	require("../connect.php");
	require ("../function.php");
	require ("../source.php");

	echo "Password has been succesfully change.";
	change_pass();
	// echo " new pass is ".$_GET['Npass']."<br>";
	// update1($tableName,$rowname,$valuename,$whereArray=null);
	// echo "Password succesfully change.";
	// changable to confirmation of password
	// $dbmail= get_mail($_SESSION['mno']);
	// $_GET['dbmail']="mrjesuserwinsuarez@gmail.com";
	// $dbmail="mrjesuserwinsuarez@gmail.com";
	// echo "dbemail = $dbmail<br>";


	?>


<?php 
	function change_pass(){ 
		mail(get_mail($_SESSION['mno']),"Password Succesfully Change - from FashionSponge.com",
		"Your previous Password $_GET[lastPass] and Succesfully change to $_GET[Npass] ","Dear ".firstname($_SESSION['mno']).",");
		update1('fs_member_accounts','pass',$_GET['Npass'],array('mno',$_SESSION['mno']));
	}
?>