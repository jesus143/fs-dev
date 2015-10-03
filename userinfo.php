<?php  
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");  
 	$mc = new myclass();  
 	$mc->auto_detect_path(); 





mysql_query("UPDATE fs_members UPDATE ");
  
   
$memaccounts=selectV1(
				     	"*",
					 	"fs_members"  
					);  

 	// print_r($memaccounts );
	$c=0;
 	for ($i=0; $i < count($memaccounts) ; $i++) {  
 		$c++;
 		$fullname = $memaccounts[$i]['fullname']; 
 		$identity_email = $memaccounts[$i]['identity_email']; 
 		echo " $c.) <span style='color:red' > name:</span> $fullname  <span style='color:green' > email: </span> $identity_email  <br>"; 
 	}
?> 

