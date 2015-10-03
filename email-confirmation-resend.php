<?php
session_start();
require("fs_folders/php_functions/connect1.php");
require("fs_folders/php_functions/function.php");
require("fs_folders/php_functions/library.php");
require("fs_folders/php_functions/source.php");
require("fs_folders/php_functions/myclass.php");
require("fs_folders/dropdown/dropdown_php_file/dropdown.php");
$dd = new dropdown();
$mc = new myclass();
$ri = new resizeImage();
$mc->auto_detect_path();
$mno 			 = $mc->get_cookie( 'mno' , 136 );
$_SESSION["mno"] = $mc->get_cookie( 'mno' , 136 );
require ('fs_folders/php_functions/Class/User.php');
require ('fs_folders/php_functions/Class/Email.php');




use App\Email;


$user            = new User($mno, $db);
$email           = new Email($mno, $db);


//print_r($user->getInfo());

if($user->getInfo()[0]['status'] == 0) {
    $email->sendConfirmationEmail($user->getInfo()[0]['identity_email'], $mc->mno);
    print('New confirmation email sent to ' . $user->getInfo()[0]['identity_email']);
} else {
    print('User already confirmed.');
}?>



<a href="home">Back</a> to home page.




