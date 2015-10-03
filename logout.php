<?php 
	session_start();
    session_destroy();
    setcookie( 'mno' , 136  ,   time() - (10 * 365 * 24 * 60 * 60) );

    require("fs_folders/php_functions/connect1.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	$db->update('fs_members',array('logstat'=>0),"mno=$_SESSION[mno]"); //update logtime everylogin  

	if ( $_GET['go']=='login'){
		echo " fs logout! <br>";   
	}else{ ?>
        <script>
            document.location = '/';
        </script> <?php
	} 
?> 