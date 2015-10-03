<?php 
    require ("fs_folders/php_functions/String/String.php"); 
    require ("fs_folders/php_functions/Database/Database.php"); 	
    require ("fs_folders/php_functions/Database/LookbookDatabase.php");  
    require ("fs_folders/php_functions/Extends/LookbookExtends.php");  
    require ("fs_folders/php_functions/Class/Lookbook.php");  
    require ("fs_folders/php_functions/Email/Email.php");  
    require ("fs_folders/php_functions/JS/JS.php");  
    require ("fs_folders/php_functions/Program.php"); 

    $database = new Database();  // initialize class
    $database->connect(); // connect to db 
    LookbookDatabase::$database = $database; // pass database accessor

    //email-redirect.php?email=mrjesuserwinsuarez@gmail.com&action=private-beta&redirect=TRUE
    //email-redirect.php?&email=mrjesuserwinsuarez@gmail.com&action=signup&redirect=TRUE
    //email-redirect.php?&email=mrjesuserwinsuarez@gmail.com&action=remove&redirect=TRUE
    //email-redirect.php?&email=mrjesuserwinsuarez@gmail.com&action=open&redirect
    //email-redirect.php?&email=mrjesuserwinsuarez@gmail.com&action=Recieved Invitation&redirect
    // $action      = 'signup'; 
    // $id          = 1; 
    // $email       = 'mrjesuserwinsuarez@gmail.com';
   
    //other initialized
    $defaultLink    = 'http://fashionsponge.com/';  
 	$action         = String::isEmpty($_GET['action'], ''); 
 	$email          = String::isEmpty($_GET['email'], '');
    $redirect       = String::isEmpty($_GET['redirect'], FALSE);
    $qid            = (!empty($_GET['qid']))? $_GET['qid'] : 0 ;

 	$fname          = LookbookDatabase::getFullNameByEmail($email);

 	//notification send to admin when email clicked action
 	$to      = Program::$adminEmail;  //'mrjesuserwinsuarez@gmail.com,pecotrain1@gmail.com'; 
 	$subject = 'invited person clicked the email content ' .  $action;
 	$body    = 'Email: ' . $email . "\n" . 'First Name: ' . $fname  . "\n" . ' Action: ' . $action ;   
 	$from    = $email; 
 	$title   = 'FS '.$action;

 	echo "<div style='display:none' >";
    	Program::emailInvitationClickedSaveActivityAndRedirectLocation($defaultLink, $action, $redirect, $to, $subject, $body, $from, $title, $qid, $email);
 	echo "</div>";