<?php
require ("fs_folders/php_functions/connect.php");
require ("fs_folders/php_functions/function.php");
require ("fs_folders/php_functions/library.php");
require ("fs_folders/php_functions/source.php");
require ("fs_folders/php_functions/myclass.php");

require ("fs_folders/php_functions/Time/Time.php");
require ("fs_folders/php_functions/Database/LookbookDatabase.php");
require ("fs_folders/php_functions/Extends/LookbookExtends.php");
require ("fs_folders/php_functions/Class/Lookbook.php");


$mc              =  new myclass();
$pa              =  new postarticle( );
$ri              =  new resizeImage ();
$sc              =  new scrape();
$lookbook        =  new lookbook();

LookbookDatabase::$database = $db;









$mc->header_attribute( );
$mc->auto_detect_path();
$mno  = 968;
$plno =  509;
$plcno = 14;
$mppno = 111;
$mptno = 1;
$comment = 'this is the test comment';
$mno         = 135;
$mno1        = 134;
$limit_start = 0;
$limit_end   = 2;
$message     = 'this is the message';
$msgno       = 2;
$generated_code = '9.9851358453055E+22';


$mno = 137;
// $category = 'streetwear';
$category = 'entertainment';
$table_name = 'fs_postedarticles';
// $table_name = 'postedlooks';
$table_id   = 44;
$url='www.fashionsponge.com/index.php';
$sc->get_site_last_update($url);


//$db->delete('fs_notification', "table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $mno );
$response = select_v3( 
	'fs_notification', 
	'count(nno), nno', 
	"table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $mno 
);

 
echo "<pre>";
print_r($response);


echo "total " . $response[0]['count(nno)'] . '<br>';

$notification_total = $response[0]['count(nno)']; 


if($notification_total > 1) { 
	//update all notification to status = 2 where status = 1;
	echo "update all notification to status = 2 where status in(0,1);";

	$db->update('fs_notification', array('status'=>2), ' status in(0,1)');
} else { 
   // dont update
	echo "dont update";
}



