 <?php 
 	ob_start();
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false ;
 	$mc = new myclass();  
 	$mc->auto_detect_path();    
 	$mc->save_current_page_visited( );   
 
 	// $is_cookie_set   =  $mc->set_cookie( 'mno' , 130 , time()+3600*24 ); 
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  

 	// initialized 
 		$variable = array(); 
  


 	echo "<div style='display:none;color:#000' >"; 





 	// $_GET['u'] = username 
 	// $_GET['mn'] = message num 


 	 

 	// get id via username 
	 	$msgno = ( !empty($_GET['mn']) ) ? $_GET['mn'] : 0 ; 
	 	if ( !empty($_GET['u']) ) {   
			$mno1 = intval($mc->get_mnobyusername( $_GET['u'] )); 
	 	} 
	 	else{ 
	 		$mno1 = intval($_GET['id']);     
	 	}  


 	// get full name of the chat mate
 		$fullname1 = $mc->get_full_name_by_id($mno1); 

	// get  message id or msgno 
 		 $msgno = $mc->fs_message(    array(   'type'=>'get-msgno',   'mno' => $mno , 'mno1' => $mno1 )  );  
 		 
 	// get latest 10 comments 
 		  	$limit_start = 0;
			$limit_end = 20; 
 		 	$variable['message'] =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'get-all-comment-by-tbn_and_tbid' , 'table_name'=>'fs_message',   'table_id'=>intval($msgno),    'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end  )  );

 
 	// initlaized len of the total messages 
 		 	$variable['len'] = count($variable['message']);


 	// initialized the profile image for the real time comment  display owner  
	 	$thumbnail_src        =  $mc->member_thumbnail_display( $mc->ppic_thumbnail , $mno , "$mc->ppic_thumbnail" , null , '35px;'  );  ;  


	// get current total message of the user 
	 	$new_total_message    =  $mc->posted_modals_comment_Query (   array( 'table_name'=>'fs_message',   'table_id'=>$msgno,  'mno1'=>$mno1, 'comment_query'=>'get-total-comment-by-chatmate'  )  );
 		 
	 	 
	// initialized name of the cockie
	 	
 		$sessionkeyword = "current_total_message_$mno1";   

 	
	// assign total message to cockie
		setcookie( $sessionkeyword  , 0 , time()+3600); 




 
	 	$fs_home_tab = basename($_SERVER["PHP_SELF"]); 
	 	$fs_home_tab = str_replace(".php","",$fs_home_tab);  
	 	if ($fs_home_tab == "index") { $fs_home_tab = "latest"; } 
	 	$mc->get_visitor_info( "" , "home tab: $fs_home_tab " , "home" );  
		if ( $fs_home_tab == "index" )   { $clock_style = "display:none" ;   } else  { $clock_style = "display:none" ;  }   


 
	echo "</div>";
 
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		  
 			<?php     
 			$mc->header_attribute( 
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , 
 				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 			);    
 			if ( $mno != 136) { 
 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
 			}
 			else{
 				$mc->login_popup( $mno ,  'login' ) ;  
 			}  
 			?>   
 		<!-- new home -->
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script> 
		  
		<!-- new look -->
			<script type="text/javascript" src='fs_folders/look/look_js/lookajax.js' ></script> 
			<script type="text/javascript" src='fs_folders/look/look_js/lookjquery.js' ></script>
		 
		<!-- new innir script  auto scroll down page when oppen--> 
			<script type="text/javascript"> $(document).ready(function( ){  $("#chat-message-container").animate({ scrollTop: $('#chat-message-container')[0].scrollHeight}, 1000);  $('#chat-box-message').focus();	 });  </script>

		<!-- new inner css -->
			<style type="text/css"> body  {  position: fixed;  overflow-y: scroll; width: 100%; }  </style>
  
	</head>  
	<body onload="chat ( 'messaging' , 'check-and-print-new-message' , '<?php echo $mno1; ?>' ) "   >  

	<div id='audio-alert'  style="position:absolute; visibility:hidden" >
			audio alert 
	</div>
 		<div id="chat-wrapper" >
 			<div id="chat-container" >
	 			<ul id="chat-ul-rows-main-container" >
	 				<li style="width:100%; height:0px; " > 1 </li> 
	 				<li style="width:100%; height:100%; " >  
	 					<table style="width:200px;" border="0" cellpadding="0" cellspacing="0" > 
	 						<tr> 
	 							<td id="chat-settings-message-container"  > 
	 								<table>
	 									<tr>
	 										<td> <div> <?php $mc->online_or_not_color( $mno , true ); ?></div> </td>
	 										<td> <div><?php echo "<b>TALK TO :</b> $fullname1 "; ?> </div></td>
	 								</table> 
	 							</td>

	 						<tr> 
	 							<td style="height:200px;" id="chat-main-messages-container" > 
	 								<div id="chat-message-container" > 
	 									<?php for ($i=$variable['len']-1; $i >= 0; $i--):  
	 										$variable[$i]['mno']       = $variable['message'][$i]['mno']; 
	 										$variable[$i]['comment']   = $variable['message'][$i]['comment']; 
	 										$variable[$i]['date']      = $variable['message'][$i]['date']; 
	 										$fullname                  = ( $mno != $variable[$i]['mno'] ) ? $mc->get_full_name_by_id( $variable[$i]['mno']): ' You ' ;   
	 									?>
		 									<table border="0" cellpadding="5" cellspacing="0" id="chat-message-table"  >
		 										<tr> 
		 											<td id='chat-profilepic' > 
			 											<div > 
			 												<?php  $mc->member_thumbnail_display( $mc->ppic_thumbnail , $variable[$i]['mno'] , "$mc->ppic_thumbnail" , null , '35px;'  );   ?> 
			 											</div> 
		 											</td> 
		 											<td>  
		 												<div id="chat-message" > 
		 													<?php echo " <b> $fullname :</b> ".$variable[$i]['comment']; ?> 
		 												</div>   
		 												<div id="chat-date" > 
		 													<?php echo $mc->get_time_ago( $variable[$i]['date'] ); ?>
		 												</div>  
		 											</td>
		 									</table> 
	 									<?php endfor; ?> 
	 								</div>
	 							</td>
	 						<tr> 
	 							<td style="height:10px;" id="chat-icon-option-container" > 
	 								<!-- <img src="fs_folders/images/genImg/loadinfo.gif" />  -->
	 							</td>
	 						<tr>
	 							<td id="chat-box-message-container" >   
	 								<textarea id="chat-box-message" placeholder='type your message here . . .' ) onkeyup ="chat ( 'messaging' , 'insert-message' , '<?php echo $mno1 ?>' , '<?php echo "$thumbnail_src"; ?>' , '' , event ,  'you' )"  ></textarea>   
	 							</td>
	 					</table> 
	 				</li> 
	 				<li style="width:100%;   " > 3 </li>
	 			</ul>
 			</div>
 		</div>  
	</body>
</html> 