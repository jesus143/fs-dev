<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");

	$ri = new resizeImage ( );
	$mc = new myclass();
	$mc->auto_detect_path();  
	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );   
	if (!empty($_SESSION['adm_no'])) {
		#can edit
	}
	else if ($mno == 136 ) { 
		$mc->save_current_page_visited( 'post-look-upload' );
		$mc->go('login'); 
	}  

	

	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false;  

  


	// echo " this is is to be edited look = ".tobe_edite_look_id().'<br>';


	 
	if( is_edit_look( tobe_edite_look_id() ) ) {  
		// echo "edite look";
		$plno=tobe_edite_look_id();   
		$pl_info=$mc->posted_look_info($plno); 
		// print_r($pl_info); 
		// echo 'lnmae '.$pl_info['lookName'].' ldesc'.$pl_info['lookAbout'];   
		// echo " total tags = ".count($pl_info['pltags']); 
		// for ($i=0; $i < count($pl_info['pltags']) ; $i++) { 
		// 	$pl_info[$i][]
		// 	 echo " pltags = ";
		// } 

		$lookAbout                      = $pl_info['lookAbout'];
		$pltags                         = $pl_info['pltags'];
		$lookName                       = $pl_info['lookName'];
		$occasion                       = $pl_info['occasion'];
		$season                         = $pl_info['season'];
		$style                          = $pl_info['style']; 
		$article_link                   = $pl_info['article_link'];  
		$pltags                         = $pl_info['pltags'];  
		$Ttag                           = count($pl_info['pltags']);   
		$_SESSION['last_look_uploaded'] = $plno;
		$_SESSION['look_edit']          = true;
		// echo "plno = $plno";

		echo"<span id='type' style='display:none'>".$_GET['type']."</span>"; 
		echo"<span id='plno' style='display:none'>".$_GET['kooldi']."</span>"; 
		// echo "edit";

	}		 
	else { 
		// echo " new uploaded look ";

		$lookAbout =  "";
		$pltags =  "";
		$lookName =  "";
		$occasion =  ""; 
		$season = "";
		$style =  ""; 
		$article_link = ""; 
		// echo "from posted look";
		$plno = user_last_look_uploaded();
		$_SESSION['last_look_uploaded'] = $plno; 
		$_SESSION['look_edit'] = false; 


		// set notification 
			// $_SESSION['modal_posted'] = 1;
			// $mc->set_notification_info( 'postedlooks' , $plno , ' posted a new look' , 0 ,  0 );

 
		$type = ( !empty( $_GET['type']) ) ? $_GET['type'] : null ;  
 		switch ( $type ) {
 			case 'cropped': 
 				break; 
 			default:
 				#this is not being cropped  
 					$mc->resize_posted_look( $plno , $mc->look_folder );   
 				break;
 		} 
	} 





















































	// echo'LOOK ID '.$plno.'<BR>';
	 // print_r($pl_info['pltags']);
 	$h1 = 600;  # height of the look container
	$w1 = 889;  # width of the look container
	//$plno = '396';  
	$img              = "$mc->look_folder_lookdetails/$plno.jpg";
	$lookmodalssize = $mc->lookdetails_set_size_of_the_look( $img , $ri  ); 
	// $li               = $mc->posted_look_info($_GET['id']); 



	$mc->header_attribute( 
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , 
		"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
	); 
?>
<html>
	<head>
		<title> Label a Look </title>
		<link rel="stylesheet" type="text/css" href="fs_folders/labellok_items/css/style.css">
		<script src="fs_folders/labellok_items/js/plugin.js"></script>
 		<?php
 		include('fs_folders/labellok_items/js/js_function.php'); 
 		include('fs_folders/labellok_items/js/init.php'); 
 		include('fs_folders/labellok_items/js/ajax.php'); 
 		include('fs_folders/labellok_items/js/image_click.php'); 
 		// require("fb-sdk.php");
 		?>



		<script type="text/javascript">
			var lName;
			var tAbt;
			function share_fb(){  
				if(getID("fb_").checked){
					lName = $('.look_name').val();
					tAbt = $('.textarea').val();
					PopupCenter("http://www.facebook.com/sharer.php?s=100&p[title]="+lName+"&p[summary]="+tAbt+"&p[url]=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&p[images][0]=http://fashionsponge.com/fs/images/members/posted looks/<?php echo $r[0]; ?>.jpg&p[via]=FashionSponge",tAbt,660,330);
				}
			}
			function share_tw(){  
				if(getID("tw_").checked){
					lName = $('.look_name').val();
					PopupCenter("http://twitter.com/share?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $rs[0]; ?>&text="+lName+"\n","",660,330);
				}
			}		
		</script>



	 
	</head>
	<body style="padding-bottom:0px; margin-bottom:0px;padding-top:0px; margin-top:0px;" >

		<center>
			<!-- <div id="new-postalook-label-container" >  -->
				<input type='text' class='about' style='display:none' value='<?php echo $lookAbout; ?> '/>  

				<div id='' class='pl_tags_edit' style='display:none' >
				 	<?php 
				 		// $pltags = $pl_info;

				 		
				 		if (!empty($pltags)) {
				 			# code...
				 			// echo "not empty";
					 		for ($i=0; $i < count($pltags) ; $i++) { 
					 			for ($j=2; $j < 11; $j++) { 
					 				if ($i==0 and $j==2) {
					 					// first color
					 					$firstcolor = $pltags[$i][$j];
					 					echo "<div id='fcolor' id='fcolor' >$firstcolor</div>";
					 				}
									echo  $pltags[$i][$j].','; 
					 			} 
					 			echo "-,";
					 		}
				 		}else { 
				 			// echo "empty";
				 		}
				 	?>	
				</div> 
				<div id='Ttag_edit' class='Ttag_edit' style='display:none' >
				  	<?php 
				  		if (!empty($pltags)) {
				  			echo count($pltags);
				  		}else { 
				  			echo 0;
				  		}
					?>
				</div>

		 		<div id='divCoord' style='position:fixed'>

		 			<!-- coordinate -->
		 		</div>  

				<div id='block_barrer' > 
					<span id='ins_label' style='display:none' >
						<b>LABEL YOUR ITEMS</b>
						</br>
						<span>click this photo to label what you're wearing</span>
					</span>

					<span id='ins_del' style='display:none'>
					<b> DOUBLE CLICK </b>
					<br>
					<span> to remove </span>
					</span>
				</div>	  

				<div id='del_tag_option'> 
				</div> 

				<div id='container' style="border:1px solid none;"  > 

					<!-- <div id="divCoord"> coordinates </div>   --> 
					<div id="new-postalook-label-wrapper" > 

						<div id="new-postalook-header-div" >
							<table border="0" cellpadding="0" cellspacing="0" > 
								<tr>
									<td style="width:280px;" > <div style="color:#b32727;font-size:60px;font-family:misoLight " > LABEL LOOK </div> </td>
									<td> <div> mao ni ang look nga imong gi submit dap l sa look daun img label sa look daun look  a look daun look daun img label sa look daun i e   check if sakto ba or dili g label sa look daun imni sya sakto. daghang salamat sa inyong  pag supporta sa amoang cog label sa look daun img label sa look daun immpany. </div> </td>
							</table>
						</div> 

						<div id='body' >
							<center>
								<div id='left_side'  > 
									<div id='block_circle_tags'> 
				 					</div>   
				 					<center>
										<img src="<?php echo "$mc->look_folder_lookdetails/$plno"; ?>.jpg"  style='<?php echo $lookmodalssize; ?>' /> 
									</center>   
									<?php  
										if ( !empty($pltags) ) {

											$c=0; 
											echo "   
												<div id='new-postalook-color-underimage-div' >
													<table border='0' cellpadding='0' cellspacing='0' >  
														<tr>";
															for ($i=0; $i < 15 ; $i++) { 
																$c++;  
																$plt_color = (!empty($pltags[$i]["plt_color"])) ? $pltags[$i]["plt_color"] : null ; 
																$tc = $mc->get_html_colo_code( str_replace(" ","",$plt_color));	   
 
																if ($c <= count($pltags)) {   
																	#  sa mga tag nga naay color
																	if ( $i==0 ) { 
																		#sugod td sa color pallete
																		$style = "display:block; background-color:#$tc; border-radius:0 0 0 5px;";	 
																	}
																	else if ( $i== count($pltags)-1 ) { 

																		#last print td sa color pallete
																		$style = "display:block; background-color:#$tc; border-radius:0 0 5px 0;";	 
																	}
																	else{
																		$style = "display:block; background-color:#$tc";	 
																	}

																}
																else{ 
																	# kong ang td is walay sulod nga color
																	$style = 'display:none'; 
																} 
																echo " 
																	<td id='new-postalook-tagcolor-td$c'  class='new-postalook-tagcolor-td$c' style='$style'   > <div> </div></td> 
																";  
															}  
															echo "  
													</table>	
												</div> 
											";
										}
										else {  
											 

											echo " 
												<div id='new-postalook-color-underimage-div' >
													<table border='0' cellpadding='0' cellspacing='0' >  
														<tr>  
															<td id='new-postalook-tagcolor-td1'  class='new-postalook-tagcolor-td1'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td2'  class='new-postalook-tagcolor-td2'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td3'  class='new-postalook-tagcolor-td3'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td4'  class='new-postalook-tagcolor-td4'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td5'  class='new-postalook-tagcolor-td5'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td6'  class='new-postalook-tagcolor-td6'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td7'  class='new-postalook-tagcolor-td7'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td8'  class='new-postalook-tagcolor-td8'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td9'  class='new-postalook-tagcolor-td9'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td10' class='new-postalook-tagcolor-td10'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td11' class='new-postalook-tagcolor-td11'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td12' class='new-postalook-tagcolor-td12'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td13' class='new-postalook-tagcolor-td13'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td14' class='new-postalook-tagcolor-td14'   > <div></div></td> 
															<td id='new-postalook-tagcolor-td15' class='new-postalook-tagcolor-td15'   > <div></div></td>   
													</table>	
												</div> 
											";
										}
									?>
								 
								</div> 

							</center>
						</div>   
						<table border="0" cellpadding="0" cellspacing="0" style="width:100%;" > 
							<tr> 
								<td> 
									<div id='right_side' style="display:block; z-index:100;" >    
										<table border="0" cellpadding="0" cellspacing="0" style="width:100%;margin-top:60px;" > 	
											<tr> 
												<td> 
												 	<div style="color:#b32727;font-size:30px;font-family:'misoRegular';" >
												 		DETAILS
												 	</div>
												</td>
											<tr> 
												<td style="padding-top:20px;" >  
													<div style="padding-bottom:5px;" >
														Title (160 characters max)
													</div> 
													<div>
														<input placeholder='160 characters max' type='text'  id='onetwo' class='look_name' maxlength='160' title="Name your look(160) character " style="width:100%;"   value='<?php echo $lookName; ?>' /><br><br> 
													</div>
												</td>
											<tr> 
												<td style="padding-top:20px;" >   
													<div style="padding-bottom:5px;" >
														Description (700 characters  max)
													</div> 
													<textarea placeholder='700 characters  max' rows='10' cols='54' maxlength='700' id='onetwo' class='textarea' title="What’s the story behind your look?" >
													</textarea>
												</td>
											 <tr> 
											 	<td style="padding-top:20px;" >    
											 		<table border="0" cellpadding="0" cellspacing="0" width="100%;" > 
											 			<tr> 
											 				<td> <div style="padding-bottom:5px;" > Article link (URL) </div> </td>
											 				<td> <div style="padding-bottom:5px;margin-left:4px;" >Occasion   </div> </td>
											 				<td> <div style="padding-bottom:5px;margin-left:4px;" >Season   </div> </td>
												 		<tr> 
												 			<td> 
												 				<div>  
																	<input type="text" class="look-article-field" value="<?php echo $article_link; ?>" placeholder='URL' style="width:380px; border:1px solid none; "   /> 
																</div>  
												 			</td>  
												 			<td>  
																<input type='text' value='<?php  echo $occasion; ?>' id='input345' class='occasion'    placeholder='Where can you wear this?' style="width:248px; border:1px solid none;margin-left:3px; " onclick="hide_all_open_dropdown('none','res_occasion','none')"; >
																<div style='' class='res_occasion' id='res_occasion' > 
																	<?php 
																	$a = array('Amusement Park','Baby Shower','BBQ','Beach','Birthday Dinner','Blind Date','Bridal Shower','Brunch','Casual Party','Clubbing','Cocktail','College','Company Event','Conference','Dinner Date','Dinner Party','Everyday','Formal Event','High School','Internship','Interview','Lunch Date','Movie Night','Music Concert','Photo shoot','Picnic','Pool Party','Prom','Romantic Dinner','Theater / Play / Opera','Wedding','Wine Tasting','Work');
																		$c=0;	
																		echo "<span onclick='close_x()'   class='x_out'  title='(close)' >x</span>";
																		echo " <br> <center> <span>Occasion </span></center> <br>";
																		echo "<table border=0>" ;						 		 
																		for ($i=0; $i < count($a) ; $i++) { 
																			$c++;
																			$b=$a[$i];
																			echo "<td><p onclick='hide_x_beore_accasion_name(\"$i\");remove_Selected_taggs(\"$b\")'  id='remove_tags_$i' class='remove_tags_occasion'>x</p></td>
																			<td onclick='get_clicked_accation(\"$b\",\"$i\")' style=''   >   $b </td>
																			";
																			if ($c%5==0) {
																				echo "<tr>";
																			}
																		}
																		echo "</table>";
																	?>
																</div>
												 			</td> 
												 			<td>  
																<input type='text' value='<?php  echo $season; ?>' id='input345' class='season'      placeholder='During what seasons can you wear this?'   style="width:248px; border:1px solid none;float:right"  onclick="hide_all_open_dropdown('none','res_season','none')";  >
																<div style='' class='res_season' id='res_season'> 
																	<?php 
																		$a =array('Winter','Spring','Summer','Fall');
																		$c=0;	
																		echo "<span onclick='close_x()' class='x_out'  title='(close)' >x</span>";
																		echo " <br> <center> <span>Session </span></center> <br>";
																		echo "<table border=0>" ;				 		 
																		for ($i=0; $i < count($a) ; $i++) { 
																			$c++;
																			$b=$a[$i];
																			echo "
																			<td><p onclick='remove_Selected_taggs(\"$b\");hide_x_beore_session_name(\"$i\")'  id='remove_tags_session_$i' class='remove_tags_session' >x</p></td>
																			<td onclick='get_clicked_session(\"$b\",\"$i\")' style=''   >   $b </td>
																			"; 
																			if ($c%5==0) {
																				echo "<tr>";
																			}
																		}
																		echo "</table>";
																	?>
																</div>
												 			</td> 

												 			<td    style='display:none' >  
																<input type='text' value='<?php  echo $style; ?>' id='input345' class='style'       onclick='retrieve_style_list()' >
																<div style='' class='res_style' id='res_style'> 
																</div>
												 			</td>
											 		</table> 
										</table>  
									</div>  
								</td>
	 						<tr> 
	 							<td> 
	 								<div id='footer' > 	  
										<div id='tag_list' style='display:block; border:1px solid none; width:100%; '   >  
											<ul>
												<li><div style="color:#b32727;font-size:30px;font-family:'misoRegular';" > TAGS </div> </li>
												<li><div style='margin-left:20px;padding-top:4px;' >  
													When labeling all items in this photo only fill in the fields that relate to the item.
												</div></li>
											</ul>
											<br><br><br> 
											<div id='tag1'> 
												 <?php  
												 $c=0;
												 for ($i=1; $i <16 ; $i++) {  
												 	$c++;
												 	if ( $c%2==0) {
												 		$background = 'background-color:#f6f7f8'; 
												 	}
												 	else{
												 		$background = 'background-color:none'; 	
												 	}

												echo "
												<table border='0'  id='table_container_$c' class='item' style='height:20px;$background; '  cellspacing='0' cellpadding='0'     >" ?>	
												<style type="text/css">

													#table_container_<?php echo $c ?>{
														display: none;  
														border:1px solid #fff; 
													} 
														#COLOR<?php echo $c ?> ,
														#BRAND<?php echo $c ?> ,
														#GARMENT<?php echo $c ?> ,
														#MATERIAL<?php echo $c ?> ,
														#PATTERN<?php echo $c ?> , 
														#PRICE<?php echo $c ?> ,
														#PURCHASED<?php echo $c ?>{   
													}
												</style><?php 
													if ($c < 10 ) { 
														echo " 
															<style type='text/css'>
																.item1_$c { 
																 border: 1px solid none;	
																 padding: 4px;
															}
														</style>
														";  
														$w = '60px';  
													}
													else{ 
														$w = '68px'; 
													}
												?> 
													<tr>  
													 	<td id='item1' class='item1_<?php echo $c ?>' style="padding-top:20px;padding-bottom:40px;width:<?php echo $w; ?>;" >  

								 							<div id="new-postalook-label-tag-circle" > 
								 								<div  >
								 									<?php echo "$i"?>
								 								</div>
								 							</div>    
														</td>
														<td style="padding-top:20px;padding-bottom:40px;" >
															<div style="padding-bottom:5px;" >Color</div>
										 					<div id='COLOR<?php echo $c;  ?>' class='static_div_input'   onclick='retrieve_color(this.id)' >
										 					</div> 
										 					<div class='ajax_color<?php echo $c;  ?>' id='ajax_color<?php echo $c;  ?>'>  
										 					</div>   
														</td>
														<td style="padding-top:20px;padding-bottom:40px;" >
															<div style="padding-bottom:5px;" >Brand</div> 
									 						<input type='text' id='BRAND<?php echo $c;  ?>' class='not_static_input' value='' onkeyup='retrieve_brands(this.id)' > 
									 						
									 						<div style="position:absolute;z-index:102; margin-left:70px; margin-top:10px;" >
									 							<img src="fs_folders/images/attr/loading 2.gif"  style="display:none;height:10px;" id="brand_loader_<?php echo $c; ?>"  > 
									 						</div> 
									 						<div class='ajax_BRAND<?php echo $c;  ?>' id='ajax_BRAND<?php echo $c;  ?>' style='display:none; background:#284372;border:1px solid none; border:1px solid none; height:30px;  width:147px; position:absolute;' >   
									 						</div>   
									 						
														 </td>
														<td style="padding-top:20px;padding-bottom:40px;" > 
															<div style="padding-bottom:5px;" >Garment</div>
										 					<div  id='GARMENT<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_garment(this.id)' > 
										 					</div>   
										 					<div class='ajax_GARMENT<?php echo $c;  ?>' id='ajax_GARMENT<?php echo $c;  ?>'   > </div> 
														</td>
														<td style="padding-top:20px;padding-bottom:40px;" >
															<div style="padding-bottom:5px;" >Material</div>
										 					<div id='MATERIAL<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_material(this.id)' >
										 					</div>

										 					<div class='ajax_MATERIAL<?php echo $c;  ?>' id='ajax_MATERIAL<?php echo $c;  ?>' >
										 					</div>
														</td>
														<td style="padding-top:20px;padding-bottom:40px;" >
															<div style="padding-bottom:5px;" >Pattern</div>
									 						<div id='PATTERN<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_pattern(this.id)' >
									 						</div>
									 						<div class='ajax_PATTERN<?php echo $c;  ?>' id='ajax_PATTERN<?php echo $c;  ?>'  >
									 						</div>
														 </td>
														<td style="display:none" >
									 						<div  id='PRICE<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_price(this.id)' >
									 						</div>
									 						<div class='ajax_PRICE<?php echo $c;  ?>' id='ajax_PRICE<?php echo $c;  ?>' > 
									 						</div>
														 </td>
														<td style="display:none" >
									 						<input type='text' id='PURCHASED<?php echo $c;  ?>' class='not_static_input' value='PURCHASED AT' onkeyup='retrieve_purchased_at(this.id)'  >
									 						<div class='ajax_PURCHASED'<?php echo $c;  ?> id='ajax_PURCHASED<?php echo $c;  ?>'>
									 						</div>  
														 </td> 
														 <td style='display:none'  >
									 						<input type='text' id='pos_x_y<?php echo $c;  ?>' class=' ' value='' onkeyup=''  /> 
														 </td>  
												 </table >
												<?php } ?>
							 				</div> 
						 				</div>  
						 				<br>
						 				<style type="text/css">
						 					.tagged_occasion { 
						 						color: #fff;
						 					}
						 				</style>  
						 				<!-- the block box -->
							 				<div id='hastag_box_list' style='display:none; border: 1px solid none'> 
							 					<table border=0> 
								 					<?php
								 					$c=0;
								 					echo " 
								 					<table>
								 						<td>Accasion:</td> <td><a href='#'><span class='hashtag_occasion'></span></a></td><tr>
								 						<td>Season:</td> <td><a href='#'><span class='hashtag_season'></span></a></td><tr>
								 						<td>Style :</td> <td><a href='#'><span class='hashtag_style'></span></a></td><tr>
								 					</table> "; 
								 					for ($i=0; $i <15 ; $i++) { 
								 						$c++;
								 						?>
								 						<style type="text/css">
								 							#tagged_list_<?php echo $c ?>{
																 /*display: none;*/
															}
								 						</style>
								 						<?php 
								 						echo " <table border=0 id='tagged_list_$c' class='tagged_list_'  > ";
									 						echo "<td id='tagged_num_$c' style='cursor:pointer;width:61px'> Item# $c </td> ";
									 						for ($j=0; $j <6 ; $j++) {  
									 						echo "<td>";
									 							 echo "<a href='#'><span style='display:block;color:white' id=hashtag_".$c."_".$j." ></span></a>";
									 						echo "</td>";
									 						}
									 					echo "<table>";
								 					}
								 					 ?>
							 					</table>
							 				</div>   

							 			<!-- save buttons and shares -->   
							 				<div id='into_ready_to_be_saved_in_db' style='display:none' ></div>
							 				<div id='db_res'  style='display:none' > result here</div> 
							 				<br><br>  
											<div id='post_on'> 
												<table border="0" cellpadding="0" cellspacing="0" >
													<tr>
													 	<td  style="width:300px;"  >  
													 		<span  style="color:#b32727;font-size:30px;font-family:'misoRegular';" >POST THIS LOOK ON:</span><br> 
															<table border="0" cellpadding="0" cellspacing="0" style="width:220px;" > 
																<tr> 
																	<td style="width:20px;" >  
																		<img src="fs_folders/images/genImg/postalook-grey-check.png" id="new-postalook-label-share-to-fb-check" onclick='new_postalook_label_share(  "#new-postalook-label-share-to-fb" )'   />   <br>
																		<input type="text" value="not share fb" id="new-postalook-label-share-to-fb"    />  
																	</td>
																	<td> 
																		<span onclick='new_postalook_label_share(  "#new-postalook-label-share-to-fb" )' style='cursor:pointer' >Facebook</span>  
																	</td>
																<tr> 
																	<td style="width:20px;" > 
																		<img src="fs_folders/images/genImg/postalook-grey-check.png" id="new-postalook-label-share-to-tw-check"  onclick='new_postalook_label_share(  "#new-postalook-label-share-to-tw" )'  > 
																		<input type="text" value="not share tw" id="new-postalook-label-share-to-tw"    /> 
																	</td>
																	<td> 
																		<span onclick='new_postalook_label_share(  "#new-postalook-label-share-to-tw" )' style='cursor:pointer' > Twitter</span>  
																	</td>
															</table>
													 	</td>    
													 	<td> 
													 		<span style="color:#b32727;font-size:30px;font-family:'misoRegular';" > WANT FEEDBACK? </span><br>
															<table border="0" cellpadding="0" cellspacing="0" > 
																<tr> 
																	<td style="width:20px;" >  
																		<img src="fs_folders/images/genImg/postalook-grey-check.png"  id="new-postalook-label-constructive-feedback-check"  onclick='new_postalook_label_share(  "#new-postalook-label-constructive-feedback" )'  >  
																		<input type="text" value="no feedback" id="new-postalook-label-constructive-feedback" /> 
																	</td>
																	<td> 
																		<span style='cursor:pointer' onclick='new_postalook_label_share(  "#new-postalook-label-constructive-feedback" )' > 
																			Receive constructive feedback to help improve your styling ability.
																		</span>  
																	</td> 
																<tr> 
																	<td style="visibility:hidden" > v </td><td style="visibility:hidden" > <span>hidden </span>  </td> 
															</table>
														</td>  
												</table>   
												<!-- <span id='fbtw' > <input type='checkbox' onclick="share_fb()" id='fb_' />Facebook <input type='checkbox' onclick='share_tw()' id='tw_' /> Twitter</span> -->  
											</div> 	 
											<br><br>
											<div id='save' style="border:1px solid none;width:142px; margin-top:-20px;" >  

												<div id="new-postalook-post-cancel-submit" >
													<!-- <div>  -->  
														<div style='border:1px solid none;margin-left:-5px;'>  
															<a href="\" onmousemove=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel-hover.png' )" onmouseout=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel.png' )"  >
																<img src="fs_folders/images/genImg/new-postalook-post-cancel.png" id="new-postalook-upload-button-cancel" />   
															</a>  
														</div>  
														<div style='border:1px solid none;margin-top:20px;' > 
															<input type="submit" name="uploadNow" value="" onclick='save_all_data_to_db()'  id ='submt' onmousemove="mousein_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look-mouse-over.png)'   )"  onmouseout="mouseout_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look.png)'   )"   />  
														</div>
													<!-- </div>   -->
												</div> 
												<!-- <img src="fs_folders/images/genImg/postalook-submit-look.png" style="cursor:pointer" id ='submt' onclick='save_all_data_to_db()'/>   --> 
												<!-- <input type='submit' value = 'SAVE' onclick='save_all_data_to_db()'  id ='submt' />  -->
											</div>		  
									</div> 
								</td> 
							<tr> 
						</table> 
					</div> 
				</div>  
		</center>
	 
	</body> 
<html> 
<?php 
	function loading_image(){ 
		echo "<div style='background-color:#000; text-align:center; width:121px;height:25;position:absolute'>";
		echo "<img src='labellok_items/images/loading 2.gif' style='height:25px'> ";
		echo "</div>";
	}


?>
<style type="text/css">
 .static_div_input,.not_static_input , #input345 , #onetwo{ 
	background-color:#fff;
	/*border: 1px solid #000;*/
 }
</style>
 




 