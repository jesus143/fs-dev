<?php
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");
    require ("../../../fs_folders/php_functions/Class/User.php");
    require ("../../../fs_folders/php_functions/Class/Look.php");



    $mc = new myclass();
    $_SESSION['mno'] = $mc->get_cookie( 'mno' , 136 );
    $mno = $mc->get_cookie( 'mno' , 136 );

//    $pagenum 	  = intval($_GET['pagenum']);
//    $rate_style   = mysql_real_escape_string($_GET['rate_style']);
    //    $rate_looks   = $_GET['rate_looks'];
//    $rate_status  = $_GET['rate_status'];
//    $rate_limit   = intval($_GET['rate_limit']);
//    $retrievedas  = !empty( $_GET['retrievedas'] ) ? $_GET['retrievedas'] : null ;

    $db->connect();
    $user = new User($mno, $db);
    $look = new Look($mno, $db);

   $rate_style        = $_GET['rate_style'];
   $rate_gender       = $_GET['rate_gender'];
   $rate_plus_blogger = $_GET['rate_plus_blogger'];
   $rate_latest       = $_GET['rate_latest'];
   $rate_status       = $_GET['rate_status'];

    echo "
       $rate_style         = rate_style <br>
       $rate_gender        = rate_gender <br>
       $rate_plus_blogger  = rate_plus_blogger <br>
       $rate_latest        = rate_latest <br>
       $rate_status        = rate_status <br>
    ";


$response = $look->ratingSort(
    $rate_gender,
    $rate_plus_blogger,
    $rate_style,
    array(
        'row'=>$rate_latest,
        'orderBy'=>'desc'
    ),
    $rate_status,
    array(
        'start'=>1,
        'end'=>3,
        'base'=>200
    )
);


print_r($response );
// echo "above is the response";
  $mc->print_look_modals($response);

 



