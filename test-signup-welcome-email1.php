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
    if($mc->send_email_signup_to_user('Rico', 'mrjesuserwinsuarez@gmail.com', 'signup', 'maricio@gmail.com' , 'this is a test for dev')) { 
    	// echo "<br>succesfully sent send";
    } else {  
    	// echo "<br>failled to send";
    }
 