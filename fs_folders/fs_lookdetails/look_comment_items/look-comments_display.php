<?php 
	// session_start();
 
	require ("../../php_functions/connect.php");
	require ("../../php_functions/function.php");
	require ("../../php_functions/library.php");
	require ("../../php_functions/source.php");
	require ("../../php_functions/myclass.php");

	require ("data/sortingTest.php");
	require ("data/comSortFunc.php" ); 
	$mc = new myclass();
	$st = new Sorting ( );
	$mc->auto_detect_path(); 
	$_SESSION['mno']           =  $mc->get_cookie( 'mno'  , 136 );  
 	$mno 			           =  $mc->get_cookie( 'mno'  , 136 ); 
 	$mno2                      =  134;

	$plno 					   =  ( !empty($_GET['plno']) ) ? $_GET['plno'] : 0 ;
	$post_comment              =  ( !empty($_GET["post_comment"]) ) ? $_GET["post_comment"] : '' ;  
	$comment                   =  ( !empty($_GET["comment"]) ) ? $_GET["comment"] : '' ;   
	$nexprev                   =  ( !empty($_GET['nexprev']) ) ? $_GET['nexprev'] : '' ;  
	$plcld_action              =  ( !empty($_GET['thum_up_or_down']) ) ? $_GET['thum_up_or_down'] : '' ;  
	$plcno                     =  ( !empty($_GET['plcno']) ) ? $_GET['plcno'] : '' ; 
    $type                      =  ( !empty($_GET['type']) ) ? $_GET['type'] : '' ;   
   	$_SESSION['sort_comment']  = ( !empty($_SESSION['sort_comment'] ) ) ? $_SESSION['sort_comment']  : 'order by plcno desc' ;
    $_SESSION['sort_comment']  =  ( !empty($_GET['sort_comment']) ) ? $_GET['sort_comment'] :  $_SESSION['sort_comment']   ; 
	$comment   = str_replace('\'',"\"", $comment); 
	$dtime     = $mc->date_time;  
	$comment = $mc->text_cleaner( $comment );      
	// echo " <li>  htis is adfasdf </li> "; 
  
	$comment = str_replace('[-double-dot-]', ':' , $comment ); // domain url 


	if ( $plcld_action == 'Thumb-Up' ) {
		 $rate = 'like'; 
	}
	else {
		$rate = 'dislike';
	}

	switch ( $type ) {
		case 'thumbs-up-or-down': 


				$mc->add_look_comment_thumb_up_or_down( $plcno, $mno , $plcld_action , $dtime );   


				// $action =   "<span class='fs-text-red'> commented </span> ";   
				// $mc->set_session_notification( $mno , $table_name , $table_id , $action , $comment );  
				// $mc->set_notification_info( 'postedlooks' , $plno , "<span class='fs-text-red'>$rate</span> a comment" , $mno2 , 0 );  


 
				$response = select_v3( 
					'posted_looks_comments', 
					'*', 
					"plcno = $plcno" 
				); 
				$mno2       = $response[0]['mno']; 
			    $comment    = $response[0]['msg'];   
				$mc->set_notification_info( 'postedlooks' , $plno , $rate , null , null , 0 , 'rate_comment' , $mno2 , $comment );   
			break; 
		default:
				// echo " default";
					

				//this is the new version comment  
				// lookdetails-dev.php is using this one
				$mc->print_look_comment_v1(  $mno , $plno , $comment , $post_comment , $dtime , $st , $nexprev ,  $_SESSION['sort_comment'] , '../../../'  ); 	 

				/*
					//this is the old version comment 
					//lookdetails.php is using this one
					$mc->post_look_comment(  $mno , $plno , $comment , $post_comment , $dtime , $st , $nexprev ,  $_SESSION['sort_comment'] , '../../../'  ); 	 
				*/ 
					
				// $mc->set_notification_info( 'postedlooks' , $plno , "  <span class='fs-text-red'>commented</span> says: $comment " , $mno2 , 0 );  
				$action =   "<span class='fs-text-red'> commented </span> ";   
				$mc->set_session_notification( $mno , 'postedlooks' , $plno , $action , $comment );   
 
			break;
	} 



?>  