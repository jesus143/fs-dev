 <?php 
	 require("fs_folders/php_functions/connect.php");
	 require("fs_folders/php_functions/function.php");
	 require("fs_folders/php_functions/myclass.php");
	 require("fs_folders/php_functions/library.php");
	 require("fs_folders/php_functions/source.php");
     require("fs_folders/php_functions/Class/User.php");
     require("fs_folders/php_functions/Class/Brand.php");
     require("fs_folders/php_functions/Class/Article.php");
     require("fs_folders/php_functions/Class/Look.php");
     require("fs_folders/php_functions/Class/UserProfilePic.php");
     require ('fs_folders/php_functions/Database/post.php');
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false ;


     use App\UserProfilePic;
     use App\Article;
     $mc             = new myclass();
     $article        = new  Article($mc->mno, $db);
     $look           = new Look($mc->mno, $db);
     $userProfilePic = new UserProfilePic($mc->mno, $db);
     $mc->post = new Post();



 	$mc->auto_detect_path();    
 	$mc->save_current_page_visited( );   



 	# initlaized mno 

	 	// $is_cookie_set   =  $mc->set_cookie( 'mno' , 130 , time()+3600*24 ); 
	 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
	 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  
	 	
 	# initialized the next viewed more modals  

 		$_SESSION['counter'] = 3;

    // echo " <bR><br><bR><Br>mno ".$_SESSION['mno']; 

  	// $mc->automatic_insert(5);  
 	// echo " id = ".$_GET["id"];     
	// popularlatest   
	// popularlooks    
	// popularmembers         
	// populararticles      
	// popularmedia        
	// $_SESSION["mno"] = 134;   
 	// echo " full url =  ".basename($_SERVER["PHP_SELF"]);  

 	// redirect when not login 

 		if ( $mno == 136 ) {
 			$mc->go('signup'); 
 		}
 		 

 	$fs_home_tab = basename($_SERVER["PHP_SELF"]); 
 	$fs_home_tab = str_replace(".php","",$fs_home_tab);  
 	if ($fs_home_tab == "index") { $fs_home_tab = "latest"; }
 	// echo " fs tab = $fs_home_tab <br>"; 
 	$mc->get_visitor_info( "" , "home tab: $fs_home_tab " , "home" );  
	if ( $fs_home_tab == "index" )   { $clock_style = "display:none" ;   } else  { $clock_style = "display:none" ;  }   




 
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		  
 			<?php    
 				// echo strlen("FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO...  Show your OOTD, see the latest fashion trends, discover new fashion blogs, get beauty and style tips");
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
		<!-- end home -->


		<!-- new look -->
			<script type="text/javascript" src='fs_folders/look/look_js/lookajax.js' ></script>
			<script type="text/javascript" src='fs_folders/look/look_js/lookjquery.js' ></script>
		<!-- end look  -->
  
	</head>  
	<body onload="view_more ( 'member-feed' )" > 
		<?php    
			$mc->fs_popup_container_and_response( 'display:none' );  
			if ( $mno == 136 ) {  
			 	// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');  
	 		} 
	     ?> 
		<?php   //require ("fs_folders/fs_popUp/popUp_php_file/popUp.php "); ?>

		<?php 
			$mc->plugins( "google analytic" , " home " );
		?>
 		<div id='main_wrapper' > 
 			<div id='wrapper_head'> 
 			</div>
	 		<div id='main_container' > 
	 			<!--  new header  --> 
					<?php  
						/*
						 fs_header( 
								$mno , 
								$style_bottom='width:1010px;' , 
								$style_up='width:1009px;' , 
								$style_main_table='width:100%' ,  
								$header_signout_search_field_style = 'margin-left:73px;margin-top:3px;' , 
								$header_signout_login_signup_button_style = 'margin-left:52px; width:290px;' 
							);
						*/ 
						$mc->fs_header( 
							$mno, 
							'width:1012px;margin-left:-1px;',
							'width:1009px;',
							'width:100%',
							'margin-left:72px;margin-top:3px;',
							'margin-left:35px;',
							'feed'
						 );   
					?>
	 			<!-- end header -->  
		 		<div id='body_wrapper'>  
		 			<div id='body_container'> 
	 					<table border="0" id='bct1' >   
				 			<tr> 
				 				<td id='bct1_td1' >   
					 				<div id='body_menu'> 
					 					<div id='clock_sh'> 
					 					</div>   
					 					<table id='clock' border="0"  style="<?php echo "$clock_style"; ?>"  >   
					 						<tr>  
					 							<td id='clock_img_td'> 
					 							<!-- 	<center>  --><img id='clockimg' src="fs_folders/images/body/feed/clock.png" > <!-- </center>  -->
					 							</td>
					 						<tr>  
					 							<td id='clock_drop_td' style="display:none" >
					 								<div id='bmccb' > 
					 								</div>
					 								<div id='bmcc' > 
						 								<center>
						 									<!-- <img id='arrow_upb1' src="fs_folders/index_home/home_img/arrow_up.png">	 -->
						 								</center>
						 								<table id='bmct1' border="0" cellpadding="0" cellspacing="0" > 
						 									<tr> 
						 										<td id='bmcttd1_0'> <img src="fs_folders/images/body/feed/check.png" >  </td> <td id='bmcttd1_1' > <span id="bmct1"> TODAY </span> </td> 
						 									<tr>
						 										<td id='bmcttd2_0'> <img src="fs_folders/images/body/feed/check.png" >  </td> <td id='bmcttd2_1' > <span id="bmct2"> THIS WEEK </span> </td> 
						 									<tr>
						 										<td id='bmcttd3_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd3_1' >  <span id="bmct3"> THIS MONTH </span> </td> 
						 									<tr> 
						 										<td id='bmcttd4_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd4_1' >  <span id="bmct4"> THIS YEAR </span> </td> 
						 									<tr> 
						 										<td id='bmcttd5_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd5_1' >  <span id="bmct5"> ALL TIMES</span> </td> 
						 								</table>
					 								</div>
					 							</td>
					 					</table>  
					 					<table id='bmt1'  border="0" style="display:none" >  
						 					<tr>
						 						<td>
						 							 <span  id='feed'> FEED </span> 
						 							<table border="0" id='bmt11' cellpadding="0" cellspacing="0" >   
						 								<tr>			
						 									<td> 
						 										<span id='bm1' class='latest' > LATEST </span> 
						 										 <div id='home_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div> 
						 									</td>
															<td> 
						 										<span id='bm4' class='plook' > POPULAR LOOKS </span> 
																<div id='look_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm3' class='pmember' > POPULAR MEMBERS </span> 
																<div id='member_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm2' class='pblog'  > POPULAR ARTICLE </span> 
																 <div id='blog_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div> 
						 									</td>
						 									<td> 
						 										<span id='bm5' class='pphoto' > POPULAR MEDIA </span> 
																<div id='photo_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 								<tr>
							 								<td> <hr id='bmhr1'> <hr id='bmhr1_selected'> </td>
							 								<td> <hr id='bmhr4'> <hr id='bmhr4_selected'> </td>
							 								<td> <hr id='bmhr3'> <hr id='bmhr3_selected'> </td>
							 								<td> <hr id='bmhr2'> <hr id='bmhr2_selected'> </td>
							 								<td> <hr id='bmhr5'> <hr id='bmhr5_selected'> </td>
						 							</table>
						 							<hr id='bmhr6'>
						 						</td>
						 					<tr>
					 					</table>
					 				</div> 	<!-- end body menu  -->
								</td>
							<tr> 
								<td  style='display:none' id="ads-banner" >
									<center>   
										<div style="margin-top:5px;margin-bottom:5px; margin-left:14px;" >
									 		<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
									 			<img src="fs_folders/images/banner/new-sos-banner1.png" style="cursor:pointer;border:1px solid none;" />  
									 		</a> 
										</div> 
						 			</center>  
					 			</td>
				 			<tr>
								<td>   
							 		<div id='body_content'>   
							 			<div id="res" style="display:none" > home_res </div>
							 			<div id='imgres' style='visibility: visible;display:none'  >  res </div>   

							 			<div style="color:black !important;" >
							 				<?php     
										 					$mc-> mysql_feed_query( array( 'type'=>'initialized' , 'mno'=>$mno , 'limit_start'=>0 , 'limit_end'=>24 , 'limit_end_following'=>100 ) ); 
										 					$mc-> mysql_feed_query( array( 'type'=>'get-following' ) ); 
										 					$mc-> mysql_feed_query( array( 'type'=>'remove_duplicate' ) );  
										 					$mc-> mysql_feed_query( array( 'type'=>'set-query' ) ); 
							 					$response = $mc-> mysql_feed_query( array( 'type'=>'query-to-activity-wall' ) ); 

 										
							 					// echo " this is the result of the query ".count($response)." <br> ";
							 					// echo "<pre>";
							 					  // $mc->print_r1($response);


							 					





							 					$r = $mc->init_latest_modals_separation( $response  );  
							 					$modals_left   = $r['init_latest_separated_modals_left'];
							 					$modals_center = $r['init_latest_separated_modals_center'];
							 					$modals_right  = $r['init_latest_separated_modals_right'];   
							 					echo " 
									 			<div id='res_container'>   
									 				<li id='li_res1'>";
									 					echo " <table border='0' cellspacing='0'cellpadding='0' > ";
									 							$modalc=0;
								 							 	for ($i=0; $i < count($modals_left) ; $i++) {  
								 							 	// for ($i=0; $i < 0 ; $i++) {  

							 							 			$modalc++; 
							 							 			$_table = $modals_left[$i]['_table'];   

							 							 			$ano = intval($modals_left[$i]['ano']); 
							 							 			if ( $_table  == 'fs_members' || $_table == 'fs_member_profile_pic' ) { 
							 							 				echo " <td> ";
							 							 				// $mc-> modals_memeber( $ano , 'init' );
							 							 				$mc-> modal_version1_member( $ano , 'init' );
							 							 				echo " </td><tr>"; 
							 							 			}else if ( $_table  == 'postedlooks') {  
							 							 				echo " <td>";
							 							 				// $mc->modals_look_init( $ano );
							 							 					$mc->modal_version1_look ( $ano ); 
							 							 				echo "</td><tr>"; 
							 							 			}
							 							 			else if ( $_table  == 'fs_postedarticles' ) { 
							 							 				echo " <td>";
							 							 					$mc->modal_version1_article ( $ano  );   
							 							 				echo "</td><tr>"; 
							 							 			}    
								 							 	} 
								 						echo " </table> ";
									 				echo "  
						 								<div id='home_res1' >  
						 								</div>
						 							</li> 
						 							<li  id='li_res2' >   
						 							";	
						 								echo " <table border='0' cellspacing='0'cellpadding='0'   > ";
						 									$c=0;
						 									$totalads =0;
							 							 	for ($i=0; $i < count($modals_center) ; $i++):
						 										// for ($i=0; $i < 0 ; $i++) {  
							 							 		// $modalc++;
							 							 		$c++;  
						 							 			$modalc++; 
						 							 			$_table = $modals_center[$i]['_table']; 
						 							 			$ano = intval($modals_center[$i]['ano']); 
						 							 			if ( $_table  == 'fs_members' || $_table == 'fs_member_profile_pic' ) { 
						 							 				echo " <td> ";
						 							 					// $mc-> modals_memeber( $ano , 'init' );
						 							 				$mc-> modal_version1_member( $ano , 'init' );
						 							 				echo " </td><tr>"; 
						 							 			}else if ( $_table  == 'postedlooks') {  
						 							 				echo " <td>";
						 							 				// $mc->modals_look_init( $ano );
						 							 					$mc->modal_version1_look ( $ano ); 
						 							 				echo "</td><tr>"; 
						 							 			}      
						 							 			else if ( $_table  == 'fs_postedarticles' ) { 
						 							 				echo " <td>";
						 							 					$mc->modal_version1_article ( $ano  );   
						 							 				echo "</td><tr>"; 
						 							 			} 
						 							 	 
								 							endfor;   
								 						echo " </table> ";
								 					echo " 	
						 								<div id='home_res2' >    
						 								</div>
						 							</li>
						 							<li id='li_res3'>";
						 								echo " <table border='0' cellspacing='0'cellpadding='0' > ";
							 							 	for ($i=0; $i < count($modals_right) ; $i++) {  
						 									// for ($i=0; $i < 0 ; $i++) {  
							 							 			$modalc++; 
							 							 			$_table = $modals_right[$i]['_table']; 
							 							 			$ano = intval($modals_right[$i]['ano']); 
							 							 			if ( $_table  == 'fs_members' || $_table == 'fs_member_profile_pic' ) { 
							 							 				echo " <td> ";
							 							 					// $mc-> modals_memeber( $ano , 'init' );
							 							 				$mc-> modal_version1_member( $ano , 'init' );
							 							 				echo " </td><tr>"; 
							 							 			}else if ( $_table  == 'postedlooks') {  
							 							 				echo " <td>";
							 							 				// $mc->modals_look_init( $ano );
							 							 					$mc->modal_version1_look ( $ano ); 

							 							 				echo "</td><tr>"; 
							 							 			}
							 							 			else if ( $_table  == 'fs_postedarticles' ) { 
							 							 				echo " <td>";
							 							 					$mc->modal_version1_article ( $ano  );   
							 							 				echo "</td><tr>"; 
							 							 			}     
								 							}   
								 						echo " </table> ";
								 						echo " 
						 							 	<div id='home_res3' >  
						 							 	 
						 								</div>
						 							</li>				 			 					 
					 							</div>
					 								";



				 							?>
				 						</div>
							 		</div>	<!-- end body content --> 
							 		 
					 			</td>
					 		<tr>
					 			<td id='moretd'> 
					 				<!-- <input  id='more' type='button' value='more' />  -->
					 				<center> 
					 				<div id='more_loading' >
					 				 	<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
					 				 </div>
					 				 </center>   
					 				<img id='more' style="margin-left:3px;"  src="fs_folders/images/genImg/home-more-button.png" onclick="view_more ( 'member-feed' )"  
					 					onmousemove=" mousein_change_button ( '#more' , 'fs_folders/images/genImg/home-red-mouse-over.png' )" 
					 					onmouseout="mouseout_change_button (  '#more'  , 'fs_folders/images/genImg/home-more-button.png' ) "  
					 				/>  
					 			</td> 
			 			</table>
		 			</div>
		 		</div> <!-- end body wrapper --> 
		 		<div id="footer"> 
		 			   <div id="footer_res" style="display:none" > footer res  </div> 
					<!-- <link rel="stylesheet" type="text/css" href="fs_folders/page_footer/css/footer1.css" >  --> 
		 			<?php 
		 				//$mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );  

							// $mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );  
	                         $mc->new_footer(); 
                         
		 			?>
		 		</div>
	 		</div> <!-- end main container -->
	 	</div>  <!-- end main wrapper -->
	 	<?php 
	 		$mc->invite_hellobar( $mno );  
	 	?> 
	</body>
</html> 