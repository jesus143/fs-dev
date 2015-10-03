<?php   
	// require_once __DIR__ . '/fs_folders/API/facebook-php-sdk-v4-5.0-dev/src/Facebook/autoload.php';
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

 	//redirect
    /*
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if ($actual_link == 'http://fashionsponge.com/' || $actual_link == 'http://www.fashionsponge.com/' || $actual_link == 'http://fashionsponge.com/?login=1' || $actual_link == 'http://www.fashionsponge.com/?login=1') {
            echo "redirecting to.... $actual_link <br>";
            $mc->go('http://fashionsponge.com/signup');
        }
    */
 	# initlaized mno
 	// $is_cookie_set   =  $mc->set_cookie( 'mno' , 130 , time()+3600*24 ); 
	 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
	 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );
	 	$mc->mno         =  $mc->get_cookie( 'mno' , 136 ); 
	 	$fulleName        = $mc->get_full_name_by_id   ( $mc->mno ); 








 	# initialized the next viewed more modals
 	// $_SESSION['counter'] = 3;
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

 	$fs_home_tab = basename($_SERVER["PHP_SELF"]); 
 	$fs_home_tab = str_replace(".php","",$fs_home_tab);  
 	if ($fs_home_tab == "index") { $fs_home_tab = "latest"; }
 	// echo " fs tab = $fs_home_tab <br>"; 
 	$mc->get_visitor_info( "" , "home tab: $fs_home_tab " , "home" );  
	if ( $fs_home_tab == "index" )   { $clock_style = "display:none" ;   } else  { $clock_style = "display:none" ;  }

    // Init welcome
    $welcome = (!empty($_GET['welcome']))? $_GET['welcome']: false;
  
	  // $mc->go('signup'); 

	if ( !empty($_GET['gcode']) )
    {
		// to logout the user
        $mno             = 136;
        $_SESSION['mno'] = 136;
		// to pass the code in the get url
		$_SESSION['gcode'] = $_GET['gcode'];
	}
	else if ( !empty($_GET['login']) )
    {
		// to logout the user
        $mno             = 136;
        $_SESSION['mno'] = 136;
		// to pass the code in the get url
	    $_SESSION['login'] = $_GET['login'];
	}
	else
    {
		// unset gcode after used
        unset($_SESSION['gcode']);
        unset($_SESSION['login']);
	}


	$_SESSION['confirmed'] = TRUE;



	// echo "<h2> 
	// 	mno = $mc->mno <br>
	// 	fullname = $mc->fullname <br>
	// 	gender = $mc->gender   <br>
	// 	plus_blogger = $mc->plus_blogger <br>
	// 	lastname = $mc->lastname <br>
	// 	firstname = $mc->firstname <br>
	// 	identity_username = $mc->identity_username <br>
	// 	blog_name = $mc->blog_name <br> 
	// 	$mc->blogdom <br>
	// </h2>";


    //echo "$mc->mno <br>";
?> 

<?php

// print_r($fulleName);
 //echo " mno = " . $mc->mno . '<br>';
  //echo " tlog = " . $mc->tlog . '<br>';
 // echo "mppno  = $mc->mppno <br>";
// echo "full name = " . $fulleName . '<br>';
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		  
			<!-- inner script -->
				<script type="text/javascript"> //document.location ='signup'; </script>  
 			<?php 
	            /**
	             * header print title, description and keyword
	             */

	 			$mc->header_attribute( 
	 				"The Best Fashion Inspiration By The Best Bloggers",
	 				"Fashion Sponge is where fashion and lifestyle bloggers can grow their audience and readers can discover the latest in                      Fashion, Beauty, Technology and Entertainment. Sign up now."
	 			);

	            /**
	             * is to show the login area or the welcome popup
	             */

	 			if ( $welcome == 1)
	 			{

	 				require("$mc->login_path_page/welcome/welcome-about-user.php");   
	 				exit;
	 			} 
	 			else if ($welcome == 2 || $mc->tlog < 3 and $mc->mno != 136)
	 			{   
					// require("http://localhost/fs/new_fs/alphatest/fs_folders/login/pages/welcome-v1/slider/examples-bootstrap/welcome-popup.php");
					// echo "This is the welcome == 2";

                    echo " <div id='login-wrapper' > "; 
 					echo "<div id='login-container' >   ";  
					echo "</div>";     
					echo "<div id= 'login-container1' >";     
						//$this->login_page1( $page );  
                		require('welcome.php');  
					echo "</div>"; 	 
					echo "</div>";    

	 				 // fs_folders\login\pages\welcome-v1\slider\examples-bootstrap
	 			}
                else if($welcome == 'tour' || $mc->tlog == 3) {
                    echo " <div id='login-wrapper' > ";
                    echo "<div id='login-container' >   ";
                    echo "</div>";
                    echo "<div id= 'login-container1' >";
                        require('fs_folders/login/pages/tour1/tour.php');
                    echo "</div>";
                    echo "</div>";
                }
                else if ($welcome == 'get-started' || $mc->tlog >= 4 ) {
                    $_SESSION['confirmed'] = FALSE;
                } 
	 			else if ( $mno != 136) 
	 			{
	 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
	 			} 
	 			else 
	 			{
	 				$mc->login_popup( $mno ,  'login' ) ;  
	 			}
	 			//echo "id = $mc->mno <br>";
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

		<?php 

				// echo "total char " . strlen("jacket c/o without walls we could poke around outside forever. we're both big fans of exploring and never seem to get enough. soak, soak, soak. vasquez rocks"); 
		?>
	</head>  
	<body onload="init('<?php echo $fs_home_tab; ?>')" > 
		<?php
		
        /**
         * to display the popup container
         */
        $mc->fs_popup_container_and_response( 'display:none' );

        /**
         * add the plugin for google analytic
         */ 
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
							// 'width:99.8%;border-left:1px solid #e2e2df;border-right:1px solid #e2e2df;',
							'width:99.8%',
							'margin-left:72px;margin-top:3px;',
							'margin-left:35px;',
							'home'
						 );
					?>
	 			<!-- end header --> 
	 			 <?php  
	 			 	//This is get started design so enable this when the member is new to the site.
	 			 if (!$_SESSION['confirmed']) {
	 			 	require('fs_folders/new-member/get-started.php');  
	 			 }
	 			     
	 			 ?>	
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
							 				<?php     
							 					// $res = $mc->get_activity( 100 );  
							 					// print_r($res);
							 					 
							 					// for ($i=0; $i < count($res) ; $i++) { 
							 					// 	$action = $res[$i]['action'];
							 					// 	$ano = $res[$i]['ano'];
							 					// 	 echo " action = $action  table id = $ano <br>";
							 					// } 
							 					  
							 					$r = $mc->get_activity( 25 ); 
							 					$r = $mc->init_latest_modals_separation( $r  );  
							 					$modals_left   = $r['init_latest_separated_modals_left'];
							 					$modals_center = $r['init_latest_separated_modals_center'];
							 					$modals_right  = $r['init_latest_separated_modals_right'];   

							 					// echo " <span style='color:black' > ";
							 					// $mc->print_r1($r);
							 					// echo "</span> ";


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
							 							 			if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' ) { 
							 							 				echo " <td> ";
							 							 				// $mc-> modals_memeber( $ano , 'init' );
							 							 				$mc-> modal_version1_member( $ano , 'init' );
							 							 				echo " </td><tr>"; 
							 							 			}else if ( $_table  == 'postedlooks' ) {  
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
						 							 			if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' )  { 
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
							 							 			if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' ) { 
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
							 		</div>	<!-- end body content --> 
							 		 
					 			</td>
					 		<tr>
					 			<td id='moretd'>   
					 				<center>
						 				<div id='more_loading' > 
							 				<img 
							 					src="fs_folders/images/attr/loading 2.gif"  
							 					style="visibility:hidden;height:10px;"  
							 				/>  
						 				</div> 
					 				</center>     
									<img 
					 					id="more"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/genImg/home-more-button.png" 
						 				onclick="more_click ( '3' )" 
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