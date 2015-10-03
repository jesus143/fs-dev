<?php 
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php"); 

    $mc = new myclass();  



    $_GET['content'] = 'this is the modals response and just a test';

    // $mc->modal_version1_look( 19 );  


    // echo " <li> this is the output </li>";


    $string  = $mc->clean_text_before_save_to_db( $_GET['content'] );

   echo $string."<br><br><br>";   
   echo  $mc->cleant_text_print_from_db( $string );   






?>