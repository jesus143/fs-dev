<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/24/2015
 * Time: 3:11 PM
 */
echo "<pre>";
require("../../fs_folders/php_functions/function.php");
require("../../fs_folders/php_functions/Database/Database.php");
require("../../fs_folders/php_functions/Class/Article.php");

use App\Article;
$db = new Database();
$db->connect();
$mno = 1013;
$article = new Article( $db, $mno);

//echo "artno = "  . $article->latestSharedArticle() . '<br>';
//echo $article->overAllRating($mno);
//$r = $article->recentUploaded('Fashion');  print_r($r);  foreach($r as $art) {  echo $art['artno'] . ' = ' . $article->sourceCategoryDropDown($art['artno']) .  "\n"; }
//echo "position = " . $article->position(216, 'Fashion', $mno) . "\n";
//echo "total uploaded " . $article->totalUploaded('Fashion', $mno) . "\n";



$tableNameArray = array(
    'activity'=>'_table_id',
    'fs_brands'=>'bno',
    'fs_cflag'=>'flagno',
    'fs_comment'=>'cno',
    'fs_drip_modals'=>'dmno',
    'fs_favorite_modals'=>'fmno',
    'fs_flag'=>'flno',
    'fs_follow'=>'flno',
    'fs_info_advertise'=> 'advertise_id',
    'fs_keyword'=>'kno',
    'fs_look_flag'=>'flr_no', 
    'postedlooks'=>'plno',
    'posted_looks_comments'=>'plcno',
    'posted_looks_comments_like_dislike'=>'plcldno',
    'fs_postedarticles'=>'artno',
    'fs_post_attribute'=>'id',
    'fs_pltag'=>'pltgno',
    'fs_notification'=>'nno',
    'fs_member_accounts'=>'mano',
    'fs_members'=>'mno',
    'fs_member_timeline'=>'mptno',
    'fs_message'=>'msgno',
    'fs_search'=>'sno'

);
foreach($tableNameArray as $key=>$value) {

    if(mysql_query("delete from $key where $value > 0")){
        echo "$key deleted where $key > 0 \n <br>";
    } else {
        echo "failed to delete table $key where $value > 0 \n <br>";
    }
}