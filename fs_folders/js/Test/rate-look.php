 <?php 
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
	$url['category']=(!empty($_GET['category']))?$_GET['category']:'alllooks';  
 	//set category when loaded it will auto change the category dropdown and detect the result set also the title,keyword and desc
	$select['value1']='';$select['value2']='';$select['value3']='';$select['value4']='';$select['value5']='';$select['value6']='';$select['value7']='';$header['title']='';$header['category']=''; 
	if ($url['category']=='alllooks'){
		$header['title']='Bohemian | Casual | Chic | Preppy | Menswear | Streetwear | Fashion Inspiration | Fashion Sponge';
		$header['category']='bohemian fashion, bohemian fashion bloggers, bohemian fashion inspiration, bohemian ootd, casual fashion, casual  fashion bloggers, casual clothing, casual fashion inspiration, casual ootd, casual fashion looks, chic fashion, chic fashion bloggers, chic clothing, chic fashion accessories, chic fashion inspiration, chic ootd, chic fashion looks, preppy fashion, preppy fashion bloggers, preppy clothing, preppy fashion accessories, preppy fashion inspiration, preppy ootd, preppy fashion looks, menswear fashion, menswear fashion bloggers, menswear clothing, menswear fashion accessories, menswear fashion inspiration, menswear ootd, menswear fashion looks, street style fashion, streetwear fashion, streetwear fashion bloggers, streetwear clothing, streetwear fashion accessories, streetwear fashion inspiration, streetwear ootd, streetwear fashion looks';
		$select['value1']="selected='selected'";
	}elseif($url['category']=='chic'){
		$header['title']='chic';
		$header['category']='chic fashion, chic fashion bloggers, chic  clothing, chic fashion accessories, chic fashion inspiration, chic ootd, chic fashion looks, celebrity chic fashion inspiration, chic fashion designers, chic style, chic shoes, chic pants, chic hats, chic shirts, chic skirts, chic dress, chic tops, chic accessories, chic jewelry, cheap chic clothing, cheap chic fashion, chic jeans, chic purses, chic fashion brands, chic fashion sites, chic fashion sites, female chic bloggers, men chic bloggers, best chic bloggers, new chic bloggers, new fashion bloggers, new fashion blogs';
		$select['value2']="selected='selected'";
	}elseif($url['category']=='menswear'){
		$header['title']='menswear';
		$header['category']='menswear fashion, menswear fashion bloggers, menswear clothing, menswear fashion accessories, menswear fashion inspiration, menswear ootd, menswear fashion looks, celebrity menswear fashion inspiration, menswear fashion designers, menswear style, menswear shoes, menswear pants, menswear hats, menswear shirts, menswear dress shirts, menswear  accessories, menswear jewelry, cheap menswear clothing, cheap menswear fashion, menswear jeans, menswear fashion sites, female menswear bloggers, men menswear bloggers, best menswear bloggers, new menswear bloggers, new fashion bloggers, new fashion blogs';
		$select['value3']="selected='selected'";
	}elseif($url['category']=='preppy'){
		$header['title']='preppy';
		$header['category']='preppy fashion, preppy fashion bloggers, preppy clothing, preppy fashion accessories, preppy fashion inspiration, preppy ootd, preppy fashion looks, celebrity preppy fashion inspiration, preppy fashion designers, preppy style, preppy shoes, preppy pants, preppy hats, preppy shirts, preppy skirts, preppy dress, preppy tops, preppy accessories, preppy jewelry, cheap preppy clothing, cheap preppy fashion, preppy bowties, preppy ties, preppy fashion brands, preppy fashion sites, female preppy bloggers, men preppy bloggers, best preppy bloggers, new preppy bloggers, new fashion bloggers, new fashion blogs';
		$select['value4']="selected='selected'";
	}elseif($url['category']=='streetwear'){
		$header['title']='streetwear';
		$header['category']='street style fashion, streetwear fashion, streetwear fashion bloggers, streetwear clothing, streetwear fashion accessories, streetwear fashion inspiration, streetwear ootd, streetwear fashion looks, celebrity streetwear fashion inspiration, streetwear fashion designers, streetwear style, streetwear shoes, streetwear pants, streetwear hats, streetwear shirts, streetwear tops, streetwear accessories, streetwear jewelry, cheap streetwear clothing, cheap streetwear fashion, streetwear jeans, streetwear fashion sites, female streetwear bloggers, men streetwear bloggers, best streetwear bloggers, new streetwear bloggers, new fashion bloggers, new fashion blogs';
		$select['value5']="selected='selected'";
	}elseif($url['category']=='bohemian'){
		$header['title']='bohemian';
		$header['category']='bohemian fashion, bohemian fashion bloggers, bohemian clothing, bohemian fashion accessories, bohemian fashion inspiration, bohemian ootd, bohemian fashion looks, celebrity bohemian fashion inspiration, bohemian fashion designers ';
		$select['value6']="selected='selected'";
	}elseif($url['category']=='casual'){
		$header['title']='casual';
		$header['category']='casual fashion, casual  fashion bloggers, casual clothing, casual fashion accessories, casual fashion inspiration, casual ootd, casual fashion looks, celebrity casual fashion inspiration, casual fashion designers, casual style, casual shoes, casual pants, casual hats, casual shirts, casual skirts, casual dress, casual tops, casual accessories, casual jewelry, cheap casual clothing, cheap casual fashion, casual jeans, casual purses, casual fashion brands, causal fashion sites';
		$select['value7']="selected='selected'";
	} 
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		  
 			<?php    
 				// echo strlen("FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO...  Show your OOTD, see the latest fashion trends, discover new fashion blogs, get beauty and style tips");
 			$mc->header_attribute( 
 				$header['title'],  
 				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				$header['category']
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

		<script type="text/javascript"> 
			$(window).ready(function() {  
				rate_article_retrieve_nextprev_and_article_modals ( ); 
			});
		</script>
  
	</head>  
	<body onload="rate_look_loaded( )"   > 
		<?php   
			$mc->timer_contest_countdown_plugin( ); 
			// $mc->more_friends_doing_the_same_action_popup( ); 
			echo "
 				<div style='position:absolute' >
	 				<div id='popUp-background'>   
	 					<div id='popUp-background-container' > 
		 					<center>
		 						<div id='popup-more-doing-the-action-loader' >
									<img src='fs_folders/images/attr/loading 2.gif' > 
								</div>  
				 				<div id='popup-response' style='color:white' >    
		 						</div>  
	 						</canter> 
	 					</div>
					</div> 
				</div>
			";      
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
							'margin-left:35px;'
						 );  

					?>

	 			<!-- end header -->  

		 		<div id='body_wrapper'>  
		 			<div id='body_container' > 
	 					<table border="0" id='bct1' style="width:910px !important;" >   
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
								<td  style='display:none' > 
									<center>   
										<div style="margin-top:5px;margin-bottom:5px; margin-left:14px;" >
									 		<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
									 			<img src="fs_folders/images/banner/new-sos-banner1.png" style="cursor:pointer;border:1px solid none;" />  
									 		</a> 
										</div> 
						 			</center>  
					 			</td>
					 		<tr> 
					 			<td id="new-postalook-timer" style="display:none" >    
									<center>
										<div style="padding-bottom:20px; font-family:arial; font-size:12px; color: #b32727;font-weight:normal;display:none" >
											ACCEPTING ENTRIES 
										</div>
									</center>

									<div id="new-postalook-timer-container-div" >
										<ul>
									 		<li>
									 			<div id="new-postalook-timer-bg-div"  >  
									 				<div id="new-postalook-timer-name" style="margin-left: 42px;" >
									 					DAYS
									 				</div>  
									 				<div class="new-postalook-timer-number" id="fs-timer-days" >
									 					<?php echo $mc->remainingDays; ?>
									 				</div>  
									 			</div>
									 		</li>
									 		<li> 
									 			<div id="new-postalook-timer-bg-div" > 
									 				<div id="new-postalook-timer-name" style="margin-left: 36px;"  >
									 					HOURS
									 				</div> 
									 				<div class="new-postalook-timer-number" id="fs-timer-hours" >
									 					<?php echo $mc->hour; ?>
									 				</div>  
									 			</div>
									 		</li>
									 		<li>  
									 			<div id="new-postalook-timer-bg-div" > 
									 				<div id="new-postalook-timer-name"  style="margin-left: 30px;"  >
									 					MINUTES
									 				</div>  
									 				<div class="new-postalook-timer-number" id="fs-timer-minutes" >
									 					<?php echo $mc->min; ?>
									 				</div>  
									 			</div>	
									 		</li> 
									 		<li> 
									 			<div id="new-postalook-timer-bg-div" >   
									 				<div id="new-postalook-timer-name"  style="margin-left: 30px;"  >
									 					SECONDS
									 				</div>    
									 				<div class="new-postalook-timer-number" id="fs-timer-seconds-container" style="position:absolute;z-index:99; background:#a21a21;width:100%;border-radius:5px;  " >
									 					<?php echo $mc->sec; ?>
									 				</div>    
									 				<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br> -->
									 				<div class="new-postalook-timer-number" id="fs-timer-seconds" style="position:relative;z-index:100;background:#a21a21; border-radius:5px; border:1px solid none;  " >
									 					<?php echo $mc->sec; ?>
									 				</div>     
									 			</div> 
									 		</li>
									 	</ul>  
									</div> 
								</td> 
							<tr>
							  	<td id="article-page-featured-image-td"> 
							      <div> 
							      		<div class="rate-page-text-over-featured-image" >
											<h3>This is the text over the featured image</h3>
										</div>
							        	<img src="fs_folders/images/modal/article/look-featured-image.png"> 
							      </div>  
							  	</td>  
							</tr>
							<tr> 
								<td> 	 
								 	<div id="rate-look-dropdown" >  
								 		<center>
									 		<table border="0" cellpadding="0" cellspacing="0" >
									 			<tr>  
									 				<td>   
										 				<select  id="rate-look-style" onchange="rate_look_retrieve_nextprev_and_look_modals( )" >  
										 				 	<option <?php echo $select['value1']; ?>>All Style</option> 
										 				 	<option <?php echo $select['value6']; ?>>Bohemian</option>  
										 				 	<option <?php echo $select['value7']; ?>>Casual</option>  
						                                    <option <?php echo $select['value2']; ?>>Chic</option> 
						                                    <option <?php echo $select['value7']; ?>>Formal</option>
						                                    <option <?php echo $select['value7']; ?>>Grunge</option>   
						                                    <option <?php echo $select['value3']; ?>>Menswear</option> 
						                                    <option <?php echo $select['value4']; ?>>Preppy</option>  
						                                    <option <?php echo $select['value5']; ?>>Streetwear</option>   
						                                </select>  
									 				</td>
									 				<td> 
									 					<select id="rate-look-looks" onchange="rate_look_retrieve_nextprev_and_look_modals( )"  > 
										 					<option title="Show the total looks that has been uploaded that month" value="All Looks" > 
										 						All Looks
										 					</option>	 
										 					<option title="Show the looks with the highest rating" value="Top Rated" >                 
										 						Top Rated         
										 					</option>	  
										 				</select>
										 			</td>
									 				<td> 
									 					<select  id="rate-look-status" onchange="rate_look_retrieve_nextprev_and_look_modals( )" > 
										 					<option title="Show all the looks that a member has not rated" value="Unrated" > 
										 						Unrated
										 					</option>	
										 					<option title="Show all the looks that a member has rated" value="Rated" > 
										 						Rated
										 					</option>	
										 					<option>
										 						Favorited
										 					</option>
										 				</select> 
									 				</td> 
									 				<td> 
									 					<select>
									 						<option>men + women</option>
									 						<option>men</option>
									 						<option>women</option>
									 					</select>
									 				</td> 
									 				<td>
									 					<select>
									 						<option>all bloggers</option>
                                                            <option>plus size</option>
									 					</select>
									 				</td>   
									 		</table>
								 		</center>
								 	</div>
								</td>
				 			<tr>
								<td>    
									<?php    
										$looks = select_v3( 
									   		'postedlooks' , 
									   		'*' , 
									   		"active = 1 limit 10" 
									   	);     
										$np = $mc->generate_next_prev_numbers( count($looks) , 25 );   
									?>   
									<table border="0" cellpadding="0" cellspacing="0" style="margin-top:-10px;" >
 										<tr> 
											<td id="rate-next-prev-up" > 
												<?php $mc->print_next_prev_numbers(  $np , null , 'rate-look', 'loader-down' ); ?>  
											</td>
										<tr> 
											<td> 
									 			<div id="rate-look-res" >
									 				<!-- rate-look-res -->
									 			</div> 
											</td>
										<tr> 
											<td>  
										 		<div id='body_content' style="margin-top: -12px !important;">   
										 			<div id="res" style="display:none" > home_res </div>
										 			<div id='imgres' style='visibility: visible;display:none; padding:5px;'  >  res </div>   
										 				<?php   
										 					echo " 
												 			<div id='res_container'>  
												 				<li id='li_res1'>  
									 								<div id='home_res1' >  
									 								</div>
									 							</li> 
									 							<li  id='li_res2' >    
											 					 	
									 								<div id='home_res2' >    
									 								</div>
									 							</li>
									 							<li id='li_res3'> 
									 							 	<div id='home_res3' >  
									 							 	 
									 								</div>
									 							</li>				 			 					 
								 							</div>
								 								";
							 							?>
										 		</div>	<!-- end body content -->  
											</td>
										<tr> 
											<td id="rate-next-prev-down"   > 
												<?php $mc->print_next_prev_numbers(  $np , null , 'rate-look' , 'loader-up' ); ?>  
											</td> 
							 		</table> 
					 			</td>
					 		<tr>
					 			<td id="rate-footer1" > 
					 			 
					 			</td> 
			 			</table>
		 			</div>
		 		</div> <!-- end body wrapper --> 
		 		<div id="footer"> 
		 			   <div id="footer_res" style="display:none" > footer res  </div> 
					<!-- <link rel="stylesheet" type="text/css" href="fs_folders/page_footer/css/footer1.css" >  --> 
		 			<?php 
		 				    // $mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );   
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