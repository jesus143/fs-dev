<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/23/2015
 * Time: 4:40 PM
 */

echo "<div style='display:block' >";
require ("../../../fs_folders/php_functions/connect.php");
require ("../../../fs_folders/php_functions/function.php");
require ("../../../fs_folders/php_functions/library.php");
require ("../../../fs_folders/php_functions/source.php");
require ("../../../fs_folders/php_functions/myclass.php");
require ("../../../fs_folders/php_functions/Class/Brand.php");
require ("../../../fs_folders/php_functions/Class/User.php");

$mc = new myclass();
$db = new Database();
$db->connect();

$userObject  = new User($mc->mno, $db);

echo "</div>";
?>

<?php

/**
 * Update the user information
 */
if($userObject->updateInfo(
    array(
        'tlog'=>4
    ),
    "mno = $mc->mno"
)){
    print('about updated  <br>');
} else {
    print('about not added <br>');
}
?>