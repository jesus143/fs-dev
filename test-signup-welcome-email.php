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
    require_once("fs_folders/php_functions/Email/Email.php");




    $mc              =  new myclass();     
    $pa              =  new postarticle( ); 
    $ri              =  new resizeImage (); 
    $sc              =  new scrape();   
    $lookbook        =  new lookbook();
    $email           =  new Email();



    $from    = "info@fashionsponge.com";
    $to      = "pecotrain1@gmail.com";
    $subject    = "Invitation";
    $invited_fn = "";



 $qId = 800;
 $to = "mrjesuserwinsuarez@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(0), $qId, 0, $invited_fn);
 $to = "mrjesuserwinsuarez@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(1), $qId, 1, $invited_fn);
 $to = "mrjesuserwinsuarez@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(2), $qId, 2, $invited_fn);



 $qId = 799;
 $to = "pecotrain1@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(0), $qId, 0, $invited_fn);
 $to = "pecotrain1@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(1), $qId, 1, $invited_fn);
 $to = "pecotrain1@gmail.com";
 $email->sendInviteEmail3($from, $to, $email->inviteSubject1(2), $qId, 2, $invited_fn);

    // LookbookDatabase::$database = $db;
    // if($mc->send_email_signup_to_user('Rico', 'pecotrain1@gmail.com', 'signup', 'maricio@gmail.com' , 'this is a test for dev' , 2)) { 
    //     echo "<br>succesfully sent send";
    // } else {  
    //     echo "<br>failled to send";
    // }
 
    // $reciever = 'mrjesuserwinsuarez@gmail.com';




    // $reciever = 'pecotrain1@gmail.com.btag.it';
 
    // if($mc->send_email_signup_to_user( ' ' . LookbookDatabase::getFirstNameByEmail($reciever) , $reciever , 'signup' , 'brainoffashion@gmail.com' , 'Singup', 2))
    // { 
    //     echo "<br>succesfully sent send";
    // }  
    // else 
    // {  
    //     echo "<br>failled to send";
    // } 

    // if($mc->send_email_signup_to_user(' ' . LookbookDatabase::getFirstNameByEmail($reciever) , $reciever , 'invitations' , 'brainoffashion@gmail.com' , 'Invitation')) 
    // { 
    //     echo "<br>succesfully sent send";
    // } 
    // else 
    // {  
    //     echo "<br>failled to send";
    // }  

 
//
//    $reciever = 'roberthcanoy15@gmail.com';
//    $sender   = 'mrjesuserwinsuarez@gmail.com';
//
//
//    if($mc->send_email_signup_to_user(' ' , $reciever , 'signup' , $sender , 'Singup', 2))
//    {
//        echo "<br>succesfully sent send";
//    }
//    else
//    {
//        echo "<br>failled to send";
//    }
//    if($mc->send_email_signup_to_user(' ' , $reciever , 'invitations' , $sender , 'Invitation'))
//    {
//        echo "<br>succesfully sent send";
//    }
//    else
//    {
//        echo "<br>failled to send";
//    }