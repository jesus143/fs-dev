<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/16/2015
 * Time: 11:00 AM
 */
require("../../fs_folders/php_functions/function.php");
require("../../fs_folders/php_functions/Database/Database.php");
require("../../fs_folders/php_functions/Class/User.php");
require("../../fs_folders/php_functions/Class/Brand.php");

$db = new Database();
$db->connect();
$mno         = 133;
$bno         = 23;
$table       = 'fs_members';
$gender      = 'male2';
$plusBlogger = 'yes2';
$userName    = 'rico2';
$firstName   = 'Jesus Erwin2';
$lastName    = 'Suarez2';
$blogName    = 'jesus blog name2';
$blogUrl     = 'google.com2';
$user = new User($mno, $db);



print_r($user->brand());



/*
if($db->update('fs_members', array('plus_blogger'=>''), 'mno > 0 ')){
    echo "successfully updated<br>";
} else {
    echo "not successfully updated<br>";
}

*/



/*
 $user->updateInfo(
     array(
         'fullname'=>$firstName . ' ' . $lastName,
         'firstname'=>$firstName,
         'lastname'=>$lastName,
         'identity_username'=>$userName,
         'blogdom'=>$blogName,
         'blogurl'=>$blogUrl,
         'gender'=>$gender,
         'plus_blogger'=>$plusBlogger
    ),
     "mno = $mno"
 );
*/
/*
$db->update(
    $table,
    array(
        'fullname'=>$firstName . ' ' . $lastName,
        'firstname'=>$firstName,
        'lastname'=>$lastName,
        'identity_username'=>$userName,
        'blogdom'=>$blogName,
        'blogurl'=>$blogUrl,
        'gender'=>$gender,
        'plus_blogger'=>$plusBlogger
    ),
    "mno = $mno"
);
*/






