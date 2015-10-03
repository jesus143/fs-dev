<?php     
	echo "<div style='display:none' >";
	require 'fs_folders/php_functions/Database/Database.php';
    require 'fs_folders/php_functions/Database/LookbookDatabase.php';   
    LookbookDataBase::$database = new Database(); 
    LookbookDataBase::$database->connect();  
	$email = (!empty($_GET['email'])) ? $_GET['email'] : '' ;  
	if (LookbookDataBase::updateEmailToOfficiallySignup($email)) 
	{   
		$message = "Congratulation $email Succesfully signup click <a href='http://fashionsponge.com/' >here</a> to visit home page."; 
	}
	else
	{  
		$message = "Failled to signup click <a href='http://fashionsponge.com/' >here</a> to visit home page."; 
	}  
	echo "</div>";

	echo "$message";   

