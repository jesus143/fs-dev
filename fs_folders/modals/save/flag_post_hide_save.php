 <?php
 /**
  * This is to save the flagged of the users.
  * for look modal, look modal, media modal and member modal.
  */

 /**
  * Issue of selecting the current info in the database where mno and table_name and table_id
  * So while i got that issue i will let user only insert no validation for now
  */


 require ("../../../fs_folders/php_functions/connect.php");
 require ("../../../fs_folders/php_functions/function.php");
 require ("../../../fs_folders/php_functions/library.php");
 require ("../../../fs_folders/php_functions/source.php");
 require ("../../../fs_folders/php_functions/myclass.php");


 /** Initialize flag */
 $mc = new myclass();
 $mc = new myclass();
 $db->connect();
 $_SESSION['mno'] = $mc->get_cookie( 'mno' , 136 );
 $mno = $mc->get_cookie( 'mno' , 136 );
 $comment    = $_GET['comment'];
 $table_id   = $_GET['table_id'];
 $table_name = $_GET['table_name'];
 $action     = $_GET['action'];

/** Insert flag */
 if($db->insert(
     'fs_flag',
     array(
         'mno'=> $mno,
         'table_id'=>$table_id,
         'table_name'=>$table_name,
         'comment'=>$comment,
         'action'=>$action
     )
 )) {
     echo "<div style='color:green' >This post is now hidden from all of your feeds.</div>";
 } else {
     echo "<div style='color:red' >Ohps, Something wrong. Failed to hide.</div>";
 }
