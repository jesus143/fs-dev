<?php  
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");  
 	$mc = new myclass();  
 	$mc->auto_detect_path(); 

 	$memaccounts = $mc->get_all_user_accounts( ); 


 	// print_r($memaccounts );

 	for ($i=0; $i < count($memaccounts) ; $i++) {  
 		 $username = $memaccounts[$i]['username'];
 		 $pass     = $memaccounts[$i]['pass'];
 		 $mno      = $memaccounts[$i]['mno']; 
 		 $email    = $memaccounts[$i]['email']; 
 		 echo " [username]<span style='color:red' >$username</span>[pass]<span style='color:blue' >$pass</span>[] mno $mno [email]<span style='green' > $email</span> <hr>";

 	}
?> 