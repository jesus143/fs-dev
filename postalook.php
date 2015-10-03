<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
    require ('fs_folders/php_functions/Class/User.php');
    require('fs_folders/php_functions/Helper/helper.php');
    // $base_url = 'http://localhost/fs/new_fs/alphatest';
	$base_url = 'http://dev.fashionsponge.com/'; 
 	// $db	= new Database();
    $ri = new resizeImage ( );
	$mc = new myclass();
	$mc->auto_detect_path();  
	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );
    is_allow_redirect('home', $mc->mno);

echo "<div style='display:none' >";

//echo "<pre>";
    $user              = new User($mno, $db);
  //print_r( $user->getMyInfo() );
    $user->getMyInfo();

//  echo "</pre>";
//echo  " post agree " . $user->post_look_agree;

if (!empty($_SESSION['adm_no'])) {
		#can edit
	}
	else if ($mno == 136 ) { 
		$mc->save_current_page_visited( 'post-look-upload' );
		//$mc->go('login'); 
	}   
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false;  
 
	  echo " this is is to be edited look = ".tobe_edite_look_id().'<br>';
  
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

echo " </div>";


	$method  = 'not edit'; 
?>

<html>
	<head>

        <title> Label a Look </title>
		<link rel="stylesheet" type="text/css" href="fs_folders/labellok_items/css/style.css">
		<script src="fs_folders/labellok_items/js/plugin.js"></script>
        <script type="text/javascript" src="fs_folders/js/postalook.js" ></script>


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

	<?php 
	# initialized
	 			 					$modal['src']  		= ''; 
	 			 					$modal['title']  	= ''; 
	 			 					$modal['desc']  	= ''; 
	 			 					$modal['url']  		= '';  
	 			 					$modal['style']  	= ''; 
	 			 					$modal['season']    = ''; 
	 			 					$modal['occasion']  = ''; 
	 			 					$modal['keyword']  	= '';   
	 			 					$modal['selected0'] = '';
	 			 					$modal['selected1'] = '';
	 			 					$modal['selected2'] = '';
	 			 					$modal['selected3'] = '';   
	 			 					$modal['selected4'] = '';  
									$modal['selected5'] = '';
									$modal['selected6'] = ''; 
									$modal['selected7'] = ''; 

	 			 					switch ( $method ) {
	 			 						case 'edit':

		 			 							$ri = new resizeImage (); 		
			 									// echo "edite look"; 
												$pl_info=$mc->posted_look_info($table_id); 
												// print_r($pl_info); 
												// echo 'lnmae '.$pl_info['lookName'].' ldesc'.$pl_info['lookAbout'];   
												// echo " total tags = ".count($pl_info['pltags']); 
												// for ($i=0; $i < count($pl_info['pltags']) ; $i++) { 
												// 	$pl_info[$i][]
												// 	 echo " pltags = ";
												// } 

												$modal['desc']                  = $pl_info['lookAbout']; 
												$modal['title']                 = $pl_info['lookName'];
												$modal['occasion']              = $pl_info['occasion'];
												$modal['season']                = $pl_info['season'];
												$modal['style']                 = $pl_info['style']; 
												$modal['url']                   = $pl_info['article_link'];  
												$modal['keyword']               = $pl_info['keyword'];  

												
												$pltags                         = $pl_info['pltags'];
												$pltags                         = $pl_info['pltags'];  
												$Ttag                           = count($pl_info['pltags']);   
												$_SESSION['last_look_uploaded'] = $table_id;
												$_SESSION['look_edit']          = true;
												// echo "plno = $plno"; 
												echo"<span id='type' style='display:none'>".$method."</span>"; 
												echo"<span id='plno' style='display:none'>".$table_id."</span>"; 
												// echo "edit";  
												$modal['src']  = "$mc->look_folder_lookdetails/$table_id.jpg"; 
												$lookmodalsstyle     = $mc->lookdetails_set_size_of_the_look( "../../../".$modal['src'] , $ri );

												// selected 
												    $modal['select']     = ( $modal['style'] == ''           ) ? 'selected' : null ;
													$modal['selected0']  = ( $modal['style'] == 'Chic'       ) ? 'selected' : null ;
													$modal['selected1']  = ( $modal['style'] == 'Menswear'   ) ? 'selected' : null ;
													$modal['selected2']  = ( $modal['style'] == 'Preppy'     ) ? 'selected' : null ; 
													$modal['selected3']  = ( $modal['style'] == 'Streetwear' ) ? 'selected' : null ;   
													$modal['selected4']  = ( $modal['style'] == 'bohemian'   ) ? 'selected' : null ;   
													$modal['selected5']  = ( $modal['style'] == 'casual'     ) ? 'selected' : null ;   
													$modal['selected6']  = ( $modal['style'] == 'Formal'     ) ? 'selected' : null ;   
													$modal['selected7']  = ( $modal['style'] == 'Grunge'     ) ? 'selected' : null ;   
 
	 			 							break; 
	 			 						default: 
	 			 							break;
	 			 					}
                                        ?>  

									<html>
										<head>
											<link rel="stylesheet" type="text/css" href="fs_folders/labellok_items/css/style.css">
											<script src="fs_folders/labellok_items/js/plugin.js"></script>
									 		<?php
 
									 		// include('fs_folders/labellok_items/js/js_function.php'); 
									 		// include('fs_folders/labellok_items/js/init.php'); 
									 		// include('fs_folders/labellok_items/js/ajax.php'); 
									 		// include('fs_folders/labellok_items/js/image_click.php'); 
									 		// require("fb-sdk.php");
 
									 		?>  
										</head>
										<body style="padding-bottom:0px; margin-bottom:0px;padding-top:0px; margin-top:0px;" id='label-look-body' >
											<center>

												<!-- <div id="new-postalook-label-container" >  -->
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

											 		<div id='divCoord' style='position:fixed;display:none; z-index:500 background-color :#000'>
											 				this is the position
											 			<!-- coordinate -->
											 		</div>    

													<div id='block_barrer' style=" visibility:hidden " > 
														<span id='ins_label' style='display:none;' >
															<b>LABEL YOUR ITEMS</b>
															</br>
															<span>click this photo to label what you're wearing</span>
														</span> 
														<span id='ins_del' >
															<b> DOUBLE CLICK </b>
															<br>
															<span> to remove </span>
															this is the best !
														</span>
													</div>

													<div id='del_tag_option'> 
													</div>
													<div style="background-color:white;width:910px;  border-radius:5px;" id="post-look-container" >
															<!-- <div id="divCoord"> coordinates </div>   -->  
															<div id="new-postalook-label-wrapper"  >   

																<div id="new-postalook-header-div" style="display:none" >
																	<table border="0" cellpadding="0" cellspacing="0" > 
																		<tr>
																			<td style="width:280px;" > <div style="color:#b32727;font-size:60px;font-family:misoLight " > LABEL LOOK </div> </td>
																			<td> <div> mao ni ang look nga imong gi submit dap l sa look daun img label sa look daun look  a look daun look daun img label sa look daun i e   check if sakto ba or dili g label sa look daun imni sya sakto. daghang salamat sa inyong  pag supporta sa amoang cog label sa look daun img label sa look daun immpany. </div> </td>
																	</table>
																</div>     
																<div id='body' style="padding:0px; border: 1px solid #f6f7f8;" >
																	<center>  
																		<table border="0" cellpadding="0" cellspacing="0" >
																			<tr> 
																				<td style="position:absolute;" > 
																					<?php if ( $method != 'edit' ): ?>
																						<!-- <div style="position:absolute; border:1px solid none;" id="modal-upload-div" onmouseover ="$('#modal-upload-div').css('display','block')" >
																							<form  action="photo.resize.php?type=upload-look-and-resize" method="POST" enctype="multipart/form-data" id="upload-modal" >  
																							 	<input type='file' id="modal-image-file" name="file" runat="server" style="display:none;"  /> 
																							 	<input type="button" value="upload" onclick="$('#modal-image-file').click( );" />   
																					 		</form>
																					 	</div> -->
																					<?php endif; ?>
																				</td>
																			<tr> 
																				<td id="circle-tag"> 
																					<div id='block_circle_tags'  style="border:1px solid none; display:block;  "  >   </div>     
																				</td>
																			<tr>
																				<td id="dropdown-tags" >
																					<div id='tag1'> 
																						 	<?php  
																							 $c=0;
																							 for ($i=1; $i <16 ; $i++) {  
																							 	$c++; 
																							 	// if ( $c%2==0) {
																							 	// 	$background = 'background-color:#f6f7f8'; 
																							 	// }
																							 	// else{
																							 	// 	$background = 'background-color:none'; 	
																							 	// } 
																							 	$background  = '';



																							//echo " <table border='0'  id='table_container_$c' class='item' style='border-radius:5px;  height:0px;$background;z-index:100' onmousemove='show_dropdown( \"#table_container_$c\" , \"block\" )' onmouseout='show_dropdown( \"#table_container_$c\" , \"none\" )'   cellspacing='0' cellpadding='5'     >"  // this is for mouse over show
																							echo " <table border='0'  id='table_container_$c' class='item_$c' style='border-radius:5px;display:none; position:absolute;height:0px;$background;z-index:120' cellspacing='0' cellpadding='5'     >" 


																							?>	 
																								<style type="text/css">

																									#table_container_<?php echo $c ?>{
																										display: none;  
																										/*border:1px solid #fff; */ 
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
																									<td style="height:20px;background:none !important"> 
																										<!-- <img src="<?php echo "$mc->genImgs/upper-bubble.png"; ?>" style='width:100%' />  -->
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px; border-radius:5px 5px 0px 0px;" >

																										<table border='0' cellpadding='0' cellspacing='0' style='width:100%'  > 
																											<tr> 
																												<td> 
																													<div style="padding-bottom:5px;padding-top:5px;" >Color</div> 
																												</td>
																												<td> 	
																													<!-- <center> <div id='close-taggin-dropdown' title='close' onclick="show_dropdown ( '<?php echo "#table_container_$c"; ?>' , 'none' )" > x </div>  </center>  -->
																													<center> <div id='delete-tag_<?php echo $c; ?>' class='delete-tag'  title='delete' style='cursor:pointer' > x </div>  </center> 
																												</td>
																										</table>  
																					 					<div id='COLOR<?php echo $c;  ?>' class='static_div_input'   onclick='retrieve_color(this.id)' >
																					 					</div> 
																					 					<div style="  position:absolute; width:100%; margin-left: 95px;" > 
																						 					<div class='ajax_color<?php echo $c;  ?>' id='ajax_color<?php echo $c;  ?>' style="border: 1px solid darkgrey;" >  
																						 					</div>  
																					 					</div>
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;border:1px solid none" >

																										<div style="padding-bottom:5px;padding-top:5px;" >Brand</div> 

																										<!-- old version --> 
																											<div style="display:none" >
																						 						<input style="width:157px;font-size:14px;"   type='text' id='BRAND<?php echo $c;  ?>' class='not_static_input' value='' onkeyup='retrieve_brands(this.id)' >  
																						 						<div style="position:absolute;z-index:102; margin-left:70px; margin-top:10px;" >
																						 							<img src="fs_folders/images/attr/loading 2.gif"  style="display:none;height:10px;" id="brand_loader_<?php echo $c; ?>"  > 
																						 						</div> 
																						 						<div class='ajax_BRAND<?php echo $c;  ?>' id='ajax_BRAND<?php echo $c;  ?>' style='display:none; background:#284372;border:1px solid none; border:1px solid none; height:30px;  width:157px; position:absolute;' >   
																						 						</div>    
																					 						</div>
																				 						<!-- new version --> 
																					 						<input style="width:157px;padding:5px;"  id="brand<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'brand' , 'autocomplete-dropdown-loader-brand<?php echo $c ?>' , 'autocomplete-dropdown-container-brand<?php echo $c; ?>' , 'brand<?php echo $c; ?>' )" />   
																						 					<div id="label-look-dropdown-container" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-brand<?php echo $c; ?>" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-brand<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-brand$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div> 
																									 </td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;" > 
																										<div style="padding-bottom:5px;padding-top:5px;" >Garment</div>
																										<!-- old version --> 
																											<div style="display:none" >
																							 					<div  id='GARMENT<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_garment(this.id)' > 
																							 					</div>   
																							 					<div class='ajax_GARMENT<?php echo $c;  ?>' id='ajax_GARMENT<?php echo $c;  ?>'   > </div> 
																							 				</div>   
																						 				<!-- new version --> 
																						 					<input style="width:157px;padding:5px;"  id="garment<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'garment' , 'autocomplete-dropdown-loader-garment<?php echo $c ?>' , 'autocomplete-dropdown-container-garment<?php echo $c; ?>' , 'garment<?php echo $c; ?>' )" />   
																						 					<div id="label-look-dropdown-container" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-garment<?php echo $c; ?>" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-garment<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-garment$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div>
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Material</div> 
																										<div style="display:none" > 
																						 					<div id='MATERIAL<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_material(this.id)' >
																						 					</div> 
																						 					<div class='ajax_MATERIAL<?php echo $c;  ?>' id='ajax_MATERIAL<?php echo $c;  ?>' > 
																						 					</div>
																					 					</div>

																					 					<input style="width:157px;padding:5px;"   id="material<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'material' , 'autocomplete-dropdown-loader-material<?php echo $c ?>' , 'autocomplete-dropdown-container-material<?php echo $c; ?>' , 'material<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-material<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-material<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-material$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;padding-bottom:10px;border-radius:0px 0px 5px 5px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Pattern</div>

																										<div style="display:none" >
																					 						<div id='PATTERN<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_pattern(this.id)' >
																					 						</div>
																					 						<div class='ajax_PATTERN<?php echo $c;  ?>' id='ajax_PATTERN<?php echo $c;  ?>'  >
																					 						</div>
																				 						</div>

																				 						<input style="width:157px;padding:5px;"  id="pattern<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'pattern' , 'autocomplete-dropdown-loader-pattern<?php echo $c ?>' , 'autocomplete-dropdown-container-pattern<?php echo $c; ?>' , 'pattern<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-pattern<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-pattern<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-pattern$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									 </td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;padding-bottom:10px;border-radius:0px 0px 5px 5px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Price</div>

																										<div style="display:none" >
																					 						<div id='PRICE<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_price(this.id)' >
																					 						</div>
																					 						<div class='ajax_PRICE<?php echo $c;  ?>' id='ajax_PRICE<?php echo $c;  ?>'  >
																					 						</div>
																				 						</div>

																				 						<input style="width:157px;padding:5px;"  id="
																				 						<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'price' , 'autocomplete-dropdown-loader-price<?php echo $c ?>' , 'autocomplete-dropdown-container-price<?php echo $c; ?>' , 'price<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-price<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-price<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-price$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									 </td>
																								<tr>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;padding-bottom:10px;border-radius:0px 0px 5px 5px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Purchased at</div>

																										<div style="display:none" >
																					 						<div id='PURCHASED<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_purchased_at(this.id)' >
																					 						</div>
																					 						<div class='ajax_PURCHASED<?php echo $c;  ?>' id='ajax_PURCHASED<?php echo $c;  ?>'  >
																					 						</div>
																				 						</div>

																				 						<input style="width:157px;padding:5px;"  id="purchased_at<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'purchased_at' , 'autocomplete-dropdown-loader-purchased_at<?php echo $c ?>' , 'autocomplete-dropdown-container-purchased_at<?php echo $c; ?>' , 'purchased_at<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-purchased_at<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-purchased_at<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-purchased_at$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									 </td>
																								<!-- <tr>
																									<td style="display:none" >
																				 						<div  id='PRICE<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_price(this.id)' >
																				 						</div>
																				 						<div class='ajax_PRICE<?php echo $c;  ?>' id='ajax_PRICE<?php echo $c;  ?>' > 
																				 						</div>
																									 </td>
																								<tr>
																									<td style="display:none" >
																				 						<input type='text' id='PURCHASED<?php echo $c;  ?>' class='not_static_input' value='PURCHASED AT' onkeyup='retrieve_purchased_at(this.id)'  >
																				 						<div class='ajax_PURCHASED'<?php echo $c;  ?> id='ajax_PURCHASED<?php echo $c;  ?>'>
																				 						</div>  
																									 </td>  -->
																								<tr>
																									 <td style='display:none'  >
																				 						<input type='text' id='pos_x_y<?php echo $c;  ?>' class=' ' value='' onkeyup=''  /> 
																									 </td>  
																							 </table >
																							<?php } ?>
																		 				</div>  
																				</td>
																			<tr>
																				<td id='left_side' onmouseover="$('#modal-upload-div').css('display','block')" onmouseout ="$('#modal-upload-div').css('display','none')" > 

																					<!-- upload image -->
																						 
																				 	<!--  images --> 
																						 

																					<?php if ( $method != 'edit' ): ?>

																						<div style="position:absolute; border:1px solid none;" id="modal-upload-div" onmouseover ="$('#modal-upload-div').css('display','block')" >
																							<form  action="photo.resize.php?type=upload-look-and-resize" method="POST" enctype="multipart/form-data" id="upload-modal" >  
																							 	<input type='file' id="modal-image-file" name="file" runat="server" style="display:none;"  /> 
																							 	<!-- <input type="button" value="upload" onclick="$('#modal-image-file').click( );" />    -->
																					 		</form>
																					 	</div>  
																						<div id="upload-image">   	
																						  	<!-- <img src="fs_folders/images/post/upload.png"  onclick="$('#modal-image-file').click( );"  >   -->
																						  	<img   
																								id="postarticle-upload-image"     
																								src="fs_folders/images/post/upload-article.png" 
																								onclick="$('#modal-image-file').click( );"
																								onmousemove=" mousein_change_button ( '#postarticle-upload-image' , 'fs_folders/images/post/upload-article-mouse-over.png' )" 
																								onmouseout="mouseout_change_button (  '#postarticle-upload-image' , 'fs_folders/images/post/upload-article.png' ) " 
																							/> 
																						</div>    
																					<?php endif; ?> 
																 						<center>  
																	 						<!-- <img src="<?php echo "$mc->look_folder_home/6.jpg";  ?>"  style='<?php echo $lookmodalssize; ?>' id="modal-image"   />   	  -->
																	 						<img src="<?php echo $modal['src']; ?>"  style='<?php echo $lookmodalsstyle; ?>' id="modal-image"   />   	 
																	 						<div id="postalook-agreement-and-rotate" >  
																		 						<div id="upload-image1">   		
																		 							<img   
																										id="postarticle-browse"     
																										src="fs_folders/images/post/browse.png" 
																										onclick="$('#modal-image-file').click( );"
																										onmousemove=" mousein_change_button ( '#postarticle-browse' , 'fs_folders/images/post/browse-mouse-over.png' )" 
																										onmouseout="mouseout_change_button (  '#postarticle-browse' , 'fs_folders/images/post/browse.png' ) " 
																									/>
																								</div>
																							    <table>
																							      	<tbody><tr>
																							          <td class="postarticle-want-crop-agreement" > 
																							          		<input type="checkbox"><span>I want to crop or rotate my image</span>
																							          </td>
																							        </tr><tr>
																							          <td>
                                                                                                          <?php if( $user->post_look_agree == 0) { ?>
																							          		<input type="checkbox" id="post-look-agreement" ><span>I agree to the posting a look rules</span>
                                                                                                          <?php } else { ?>
                                                                                                              <input type="checkbox" id="post-look-agreement"  checked><span>I agree to the posting a look rules</span>
                                                                                                          <?php } ?>
																							          </td>
																							  		</tr></tbody>
																							  	</table> 
																							  	<!-- <div style="position: absolute;float: left;margin: 20px 0px 0px 0px; ">    -->
                               																	<!-- <input type="checkbox" name="post-look-agreement" id="post-look-agreement" checked=""> Agree Term <a href="agreement" target="_blank"> read </a> </div> -->
																							</div>		 
																						</center>   
																					</td>
																			<tr>
																				<td> 

																					<!-- bottom colors -->

																						<div style="border-top:1px solid grey" > 
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
																				</td>
																		</table> 
																	</center>
																</div>
																<table border="0" cellpadding="0" cellspacing="0" style="width:100%;" > 
																	<tr> 
																		<td> 
																			<div id='right_side' style="display:block; z-index:100;height:250px" >    
																				<table border="0" cellpadding="0" cellspacing="0" style="width:100%; " > 	
																					<tr> 
																						<td> 
																						 	<div style="color:#b32727;font-size:30px;font-family:'misoRegular';display:none" >
																						 		DETAILS
																						 	</div>
																						</td>
																					<tr> 
																						<td style="padding-top:10px; " >  
																							<table id="post-title-url" >  
																							  	<tbody>
																								    <tr>
																								      <td><div>Title</div></td><td style="padding-left: 7px;" ><div>Article Url</div></td> </tr><tr>
																								    
																								     <td>
																								          <input placeholder="160 characters max" type="text" id="onetwo" class="look_name"   title="Name your look (160) character." style="width:100%;" value="">     
																								    </td>

																								    <td style="padding-left: 5px;"> 
																								      <input title="Add source url of the article (optional)." type="text" class="look-article-field" value="" placeholder="paste look url" style="width:100%; border:1px solid none; ">
																								    </td> 
																									</tr>
																									</tbody>
																								</table>  
																						</td> 
																				    <tr> 
																					 	<td style="padding-top:10px;" >    
																					 		<table border="0" cellpadding="0" cellspacing="0" width="100%;" > 
																					 			<tr> 
																					 				<td> <div style="padding-bottom:10px;" >Style</div> </td>
																					 				<td> <div style="padding-bottom:10px;margin-left:4px;" > Occasion </div> </td>
																					 				<td> <div style="padding-bottom:10px;margin-left:4px;" > Season </div> </td>
																					 				<td> <div style="padding-bottom:10px;margin-left:4px; display:none" > Tags </div> </td>
																						 		<tr> 
																						 			<td style="background:white; border:1px solid white" >  
																						 				<div>  
																						 					<select  style="width:100%;padding:5px;border:none;" id="style"   >
																						 						<option>Select</option> 
													                                                            <option <?php echo $modal['selected4']; ?>>Bohemian</option> 
													                                                            <option <?php echo $modal['selected5']; ?>>Casual</option> 
													                                                            <option <?php echo $modal['selected0']; ?>>Chic</option>
													                                                            <option <?php echo $modal['selected6']; ?>>Formal</option>
													                                                            <option <?php echo $modal['selected7']; ?>>Grunge</option>
													                                                            <option <?php echo $modal['selected1']; ?>>Menswear</option>
													                                                            <option <?php echo $modal['selected2']; ?>>Preppy</option>
													                                                            <option <?php echo $modal['selected3']; ?>>Streetwear</option> 	 
																											</select>  			 
																										</div>  
																						 			</td>  
																						 			<td style="background:white; border:1px solid white" >   

																										<input style="width:100%;display:none; visibility:hidden; border:1px solid none; "  type='text' value='<?php  echo $occasion; ?>' id='input345' class='occasion'    placeholder='Where can you wear this?'  onclick="hide_all_open_dropdown('none','res_occasion','none')"; >
																										
																										 

																										<div class='res_occasion' id='res_occasion' style="visibility:hidden" > 
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

																										<!--  new version -->
																											<input   
																												value="<?php echo $modal['occasion']; ?>" 
																												style="width:100%; padding:5px;border:none"   
																												id="occasion" 
																												class="occasion"   
																												placeholder='Where can you wear this?'   
																												title="put a comma after word to add tag." 
																												type='text'  
																												onkeyup="modal( 'modal-attribute' , 'search' , 'occasion' , 'autocomplete-dropdown-loader-occasion' , 'autocomplete-dropdown-container-occasion' , 'occasion' , '' , true )" 
																												onClick="show('#autocomplete-dropdown-container-occasion-1')" 
																											/>   

																											 
																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-occasion"  >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-occasion"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-occasion" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div> 


																											<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-occasion-1" style="display:none" >  
																											    	
																											    	 <center>
																												    	 <div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-occasion"   >  
																												    	 	<div style="display:block; width: 244px;color:none;margin-left: -5px;">    
																								 			 					 

																														        <table border="0" cellpadding="0" cellspacing="0">
																														            <tbody>
																														            	<tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'conference, ' , '1' )">conference</td> 
																													        			</tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'company event, ' , '1' )">company event</td> 
																													        			</tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'college, ' , '1' )">college</td> 
																													        			</tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'cocktail, ' , '1' )">cocktail</td> 
																													        			</tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'clubbing, ' , '1' )">clubbing</td> 
																													        			</tr><tr> <td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-occasion' , occasion , 'casual party, ' , '1' )">casual party</td> 
																													        			</tr><tr> 								        
																													        			</tr>
																												        			</tbody>
																												        		</table> 
																								 			 				</div>
																												    	 </div>  
																											    	 </center>  
																											    </div> 
																											</div> 
																						 			</td> 
																						 			<td style="background:white; border:1px solid white" >  
																										<input  style="width:100%;display:none"  type='text' value='<?php  echo $season; ?>' id='input345' class='season'      placeholder='During what seasons can you wear this?'   style="width:248px; border:1px solid none;float:right"  onclick="hide_all_open_dropdown('none','res_season','none')";  >
																										<div style='' class='res_season' id='res_season'  style="display:none" > 
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

																										<!--  new version -->
																											<input 
																												value="<?php echo $modal['season']; ?>" 
																												style="width:100%; padding:5px;border:none"   
																												id="season"    
																												placeholder='During what seasons can you wear this?'  
																												title="put a comma after word to add tag."  
																												type='text' 
																												onkeyup="modal( 'modal-attribute' , 'search' , 'season' , 'autocomplete-dropdown-loader-season' , 'autocomplete-dropdown-container-season' , 'season' , '' , true )" 
																												onCLick="show('#autocomplete-dropdown-container-season-1')"
																											/>   
																						 					

																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:244px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-season" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-season"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-season" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div>  

																											<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-season-1" style="display:none" >  
																											    	
																											    	 <center>
																												    	 <div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-occasion"   >  
																												    	 	<div style="display:block; width: 244px;color:none;margin-left: -5px;">    
																								 			 					 <div style="display:block; color:none; ">    
																											 			 					 
																																	        <table border="0" cellpadding="0" cellspacing="0">
																																	            <tbody><tr>								              		<td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-season' , season , 'summer, ' , '1' )">summer</td> 
																																	        			</tr><tr> 								              		<td onclick="modal( 'get-value-selected' , '' , '' , '' , 'autocomplete-dropdown-container-season' , season , 'spring, ' , '1' )">spring</td> 
																																	        			</tr><tr> 								        </tr></tbody></table> 
																												 			 				</div>
 
																								 			 				</div>
																												    	 </div>  
																											    	 </center>  
																											    </div> 
																											</div>

																						 			</td>  
																						 			<td style="background:white; border:1px solid white; display:none" >  
																						 				<!--  new version --> 
														<!-- 									 				<input type="texRt" placeholder='keyword' style="width:100%;display:none"   />  
																							 				<input 
																								 				value="<?php echo $modal['keyword']; ?>" 
																								 				style="width:100%; padding:5px;border:none"   
																								 				id="keyword"   
																								 				placeholder='Tags'  
																								 				title="put a comma after word to add tag." 
																								 				type='text' 
																								 				onkeyup="modal( 'modal-attribute' , 'search' , 'keyword' , 'autocomplete-dropdown-loader-keyword' , 'autocomplete-dropdown-container-keyword' , 'keyword' , '' , true )" 
																								 				onClick="show('#autocomplete-dropdown-container-keyword-1')"
																							 				/>
																						 					


																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-keyword" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-keyword"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-keyword" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div>  -->


																										<!-- 	<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-keyword-1" style="display:block" >  
																											    	<center>
																												    	<div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-keyword"   >    
																												    		Results
																												    	</div>
																											    	</center>  
																											    </div> 
																											</div>   -->

																						 			</td>  
																						 			<td style='display:none' >  
																										<input  style="width:100%"   type='text' value='<?php  echo $style; ?>' id='input345' class='style'       onclick='retrieve_style_list()'  >
																										<div style='' class='res_style' id='res_style'> 
																										</div>
																						 			</td>
																					 		</table> 
																					 	</td> 
																					<tr> 
																						<td style="padding-top:10px;  " >   
																							<div style="padding-bottom:10px;" >
																								Description
																							</div> 
																							<?php   require("$base_url/fs_folders/ckeditor/samples/replacebyclass.html");  ?>
																							<!-- <textarea placeholder='320 characters  max' rows='10' cols='30' maxlength='320' id='onetwo' class='textarea' title="What’s the story behind your look?" style="height:50px;" ><?php echo $modal['desc']; ?></textarea> -->
																						</td>      
																					<!--  	
																					<tr> 
																				 		<td> 
																							<div style="position: absolute;float: left;margin: 20px 0px 0px 0px; ">  
																								 
                               																	<input type="checkbox" name="post-look-agreement" id="post-look-agreement" <?php echo (!empty($_COOKIE['isAgreed']))? 'checked' : ''; ?> > Agree Term <a href="agreement" target="_blank"> read </a>
																						 </div> 
																						</td> 
																					-->
																				</table>  
																			</div>   
																		</td>
											 						<tr> 
											 							<td style="border:1px solid none; " > 
											 								<!-- this is the reason of the free space of the bottom area -->
											 								<div id='footer' > 	  
																				<div id='tag_list' style='display:none; border:1px solid none; width:100%; '   >  
																					<ul style="display:block" >
																						<li><div style="color:#b32727;font-size:30px;font-family:'misoRegular';" > TAGS </div> </li>
																						<li><div style='margin-left:20px;padding-top:4px;' >  
																							When labeling all items in this photo only fill in the fields that relate to the item.
																						</div></li>
																					</ul> 
																 				</div>   
																 				<br>
																 				<style type="text/css">
																 					.tagged_occasion { 
																 						color: #fff;
																 					}
																 				</style>  
																 				<!-- the block box -->
																 					<div style="display:none" >
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
																											 display: none;
																										}
																			 						</style>
																			 						<?php 
																			 						echo " <table border=1 id='tagged_list_$c' class='tagged_list_'  > ";
																				 						echo "<td id='tagged_num_$c' style='cursor:pointer;width:61px'> Item# $c </td> ";
																				 						for ($j=0; $j <6 ; $j++) {  
																				 						echo "<td>";
																				 							 echo "<a href='#'><span style='display:block;color:white !important' id=hashtag_".$c."_".$j." ></span><span> hashtag_".$c."_".$j." </span></a>";
																				 						echo "</td>";
																				 						}
																				 					echo "<table>";
																			 					}
																			 					 ?>
																		 					</table>
																		 				</div>   

																	 				<!-- save buttons and shares -->  
																	 				
																		 				<!-- <br><br><br><br><br> -->
																		 				<div id='into_ready_to_be_saved_in_db' style='display:none' ></div>
																		 				<div id='db_res'  style='display:none' > result here</div> 
																		 				<!-- <br><br>   -->
																						<div id='post_on' style="display:none" > 
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
																						<div id='save' style="border:1px solid none;width:142px; margin-top:-100px;display:none" >  
																							<div id="new-postalook-post-cancel-submit" >
																								<!-- <div>  -->    
																								<!-- 	<table border="0" cellpadding="0" cellspacing="0" style="display:none"  > 
																										<tr> 
																											<td>  
																												<div style="margin-top:5px;" >  
																													<a href="\" onmousemove=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel-hover.png' )" onmouseout=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel.png' )"  >
																														<img src="fs_folders/images/genImg/new-postalook-post-cancel.png" id="new-postalook-upload-button-cancel" />   
																													</a>  
																												</div>  
																											<td>
																											<td>
																												<div > 
																													<input type="submit" name="uploadNow" value="" onclick='save_all_data_to_db()'  id ='submt' onmousemove="mousein_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look-mouse-over.png)'   )"  onmouseout="mouseout_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look.png)'   )"   />  
																												</div>	
																											</td> 
																									</table>  -->
																								<!-- </div>   -->
																							</div> 
																							<!-- <img src="fs_folders/images/genImg/postalook-submit-look.png" style="cursor:pointer" id ='submt' onclick='save_all_data_to_db()'/>   --> 
																							<!-- <input type='submit' value = 'SAVE' onclick='save_all_data_to_db()'  id ='submt' />  -->
																						</div>		  
																					</div> 
																					<div style="border:1px solid none;width:200px; margin-left: 0px; margin-top: 245px;" > 
																						<table>
																							<tr> 
																								<td>  
																									<a href="\" > 
																										<!-- <input type="button" value="cancel" onclick=" fs_popup( 'close' ) " />    --> 
																										<img
																											id="postarticle-cencel"     
																											src="<?php echo "$mc->genImgs/cancel.png"; ?>" 
																											onclick=" fs_popup( 'close' ) " 
																											onmousemove=" mousein_change_button ( '#postarticle-cencel' , '<?php echo "$mc->genImgs/cancel-mouse-over.png"; ?>' )" 
																											onmouseout="mouseout_change_button (  '#postarticle-cencel'  , '<?php echo "$mc->genImgs/cancel.png"; ?>' ) "  
																										/> 
																									</a>
																								</td>
																								<?php if ( $method == 'edit' ): ?> 
																									<td> 
																										<img   
																											id="postarticle-submit"     
																											src="<?php echo "$mc->genImgs/post.png"; ?>" 
																											onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' , '' , '' , '' , '<?php echo $method; ?>' , '<?php echo $table_id; ?>' ) " 
																											onmousemove=" mousein_change_button ( '#postarticle-submit' , '<?php echo "$mc->genImgs/post.png"; ?>' )" 
																											onmouseout="mouseout_change_button (  '#postarticle-submit'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) " 
																										/>
																										<!-- <input type="button" value="post modal" onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' , '' , '' , '' , '<?php echo $method; ?>' , '<?php echo $table_id; ?>' ) " /> -->
																									</td>
																								<?php else: ?> 
																									<td>
																										<img   
																											id="postarticle-submit"    
																											src="<?php echo "$mc->genImgs/post.png"; ?>" 
																											onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required', '', '', '', '', '', '', '#post-look-agreement') " 
																											onmousemove=" mousein_change_button ( '#postarticle-submit' , '<?php echo "$mc->genImgs/post-mouse-over.png"; ?>' )" 
																											onmouseout="mouseout_change_button (  '#postarticle-submit'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) "  />
																										<!-- <input type="button" value="post modal" onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' ) " /> -->

                                                                                                        <img id="postarticle-submit-1-fake"  style="display:none"   src="<?php echo "$mc->genImgs/post-mouse-over.png"; ?>"  />

																									</td>
																								<?php endif;?> 
																								<td> 
																									<?php $mc->image( array( 'type'=>'loader' , 'id'=>"post-modal" ,'style'=>'visibility:hidden;height:10px;width:10px;'  ) ); ?>
																								</td>
																						</table>
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
<html> 


 


 