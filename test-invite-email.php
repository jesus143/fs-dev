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





// send_email_signup_to_user($invited_fn , $invited_email , $type=null , $from1 = 'brainoffashion@gmail.com' , $subject1 = null , $version=NULL, $qid=0) {
    if($mc->send_email_signup_to_user('Rico', 'mrjesuserwinsuarez@gmail.com', 'invitations', 'maricio@gmail.com' , 'this is a test for dev', '', 1)) {
        echo "<br>succesfully sent send";
    } else {  
        echo "<br>failled to send";
    }  
