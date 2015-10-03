<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/16/2015
 * Time: 3:13 PM
 */


require("../../fs_folders/php_functions/function.php");
require("../../fs_folders/php_functions/Database/Database.php");
require("../../fs_folders/php_functions/Class/Brand.php");

$db = new Database();
$mbp = new memberProfilePic();
$db->connect();
$mno = 133;
$bno = 23;

$mbp->uploadPic($_FILES['test']);




