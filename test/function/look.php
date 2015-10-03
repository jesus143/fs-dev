<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/29/2015
 * Time: 12:03 PM
 */


require("../../fs_folders/php_functions/function.php");
require("../../fs_folders/php_functions/Database/Database.php");
require("../../fs_folders/php_functions/Class/Look.php");

$db = new Database();
$db->connect();
$mno = 1013;
$look = new Look($mno, $db);
$plno = 222375;

//echo "artno = "  . $article->latestSharedArticle() . '<br>';
//echo $look->overAllRating($mno);
 echo "position = " . $look->position($plno, 'Bohemian', $mno) . "\n";
 echo "total uploaded " . $look->totalUploaded('Bohemian', $mno) . "\n";