<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/10/2015
 * Time: 12:23 PM
 */

require("../../fs_folders/php_functions/function.php");
require("../../fs_folders/php_functions/Database/Database.php");
require("../../fs_folders/php_functions/Class/Brand.php");

$db = new Database();
$db->connect();
$mno = 133;
$bno = 23;

$brand = new Brand($db, $mno);
// $brand1 = $brand->brand(0,$brand->category('','','','topic'),2);
// $brand2 = $brand->category(0, 0, 0, 'brand', 'bcno desc', '1,2');
// print_r($brand1);
//$brand->save('-123-2343-1234-');
//if(!select_v3('fs_brand_member_selected', '*', "mno = $mno and bno = $bno")){
//    if($db->insert('fs_brand_member_selected', array('mno'=>$mno, 'bno'=> $bno))){
//        echo "inserted<br>";
//    } else {
//        echo "failed to insert<br>";
//    }
//} else {
//    echo "exist<br>";
//};








