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
	else if (empty($_SESSION['mno'])) { 
		$mc->go('home');
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
 

		$lookAbout = $pl_info['lookAbout'];
		$pltags = $pl_info['pltags'];
		$lookName = $pl_info['lookName'];
		$occasion = $pl_info['occasion'];
		$season = $pl_info['season'];
		$style = $pl_info['style']; 
		$article_link = $pl_info['article_link'];  

		$_SESSION['last_look_uploaded'] = $plno;
		$_SESSION['look_edit'] = true;
		// echo "plno = $plno";
		echo"<span id='type' style='display:none'>".$_GET['type']."</span>"; 
		echo"<span id='plno' style='display:none'>".$_GET['kooldi']."</span>"; 
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
		// echo " rize image "; 
		$ri->load("$mc->look_folder/$plno.jpg"); 
		$source = "$mc->look_folder/$plno.jpg";  
		// $this->look_folder             = '../betatest/images/members/posted looks';
		// $this->look_folder_home        = '../betatest/images/members/posted looks/home';
		// $this->look_folder_lookdetails = '../betatest/images/images/members/posted looks/lookdetails';
		// $this->look_folder_thumbnail   = '../betatest/images/images/members/posted looks/thumbnail'; 
  		// echo " width ".$ri->getWidth()."<br>";


	 	if ( $ri->getWidth() > 300 ) { 
			#home
	 		$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_home/$plno.jpg",  // save distination 
				270,  //width
				'',  //height
				$ri // class object 
			);  
		  	#lookdetails
			$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_lookdetails/$plno.jpg",  // save distination 
				'',  //width
				'',  //height
				$ri // class object 
			); 
			# thumbnail
			$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_thumbnail/$plno.jpg",  // save distination 
				50,  //width
				'',  //height
				$ri // class object 
			);   
		 }
		 else {  
		 	#home
	 		$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_home/$plno.jpg",  // save distination 
				'',  //width
				'',  //height
				$ri // class object 
			); 
		  	#lookdetails
			$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_lookdetails/$plno.jpg",  // save distination 
				'',  //width
				'',  //height
				$ri // class object 
			); 
			# thumbnail
			$ri->set_all_for_location( 
				"$source" ,  // source image 
				"$mc->look_folder_thumbnail/$plno.jpg",  // save distination 
				50,  //width
				'',  //height
				$ri // class object 
			);
		 } 
	} 
	// echo'LOOK ID '.$plno.'<BR>';
	 // print_r($pl_info['pltags']);

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
	<body>
		<input type='text' class='about' style='display:none' value='<?php echo $lookAbout; ?> '/>  
		 <div id='' class='pl_tags_edit' style='display:none' >
		 	<?php 
		 		// $pltags = $pl_info;

		 		// print_r($pltags);
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
		<script type="text/javascript">

			// $('.textarea').val('');

		</script>
			<div id='container'> 
				<!-- <div id="divCoord"> coordinates </div> -->
				<div id='body'>
					<div id='left_side' > 
						<div id='block_circle_tags'> 
	 					</div>
						<center>

							<img src=" <?php echo "$mc->look_folder_lookdetails/$plno"; ?>.jpg   ">
						</center>		 
					</div> 
					<div id='right_side'>  
						<span>1.) Name your look: </span> <br>
						<input type='text'  id='onetwo' class='look_name' maxlength='70' title="Name your look(70) character "  value='<?php echo $lookName; ?>' /><br><br>
						<span>2.) what's the story or impretur for look</span> <br>
						<textarea rows='10' cols='54' maxlength='400' id='onetwo' class='textarea' title="what's the story or impretur for look(200) character " >
						</textarea> 
						<div style="margin-left:35px;"  > 
							<span  id='span345'> paste the blog article link here..</span> <br> 
							<input type="text" class="look-article-field" value="<?php echo $article_link; ?>" style="width:410px; border:1px solid #000; "   /> 
						</div> 

						<!-- <span>3.) </span><span  id='span345'> For what occasion(s) can you wear this look?  </span>  <input   type='text'  id='input345' class='occasion' onclick='retrieve_occations_list()' >
						<div style='' class='res_occasion' id='res_occasion' > </div> -->
						<span>3.) </span><span  id='span345'> For what occasion(s) can you wear this look?  </span>  <input   type='text'  value='<?php  echo $occasion; ?>' id='input345' class='occasion'  onclick="hide_all_open_dropdown('none','res_occasion','none')"; >
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
						<br> 
						<!-- <span>4.) </span><span  id='span345'> in what season(s) can you wear this look? </span>  <input type='text'  id='input345' class='season' onclick='retrieve_season_list()'  >
							<div style='' class='res_season' id='res_season'> 
							</div> -->
							<span>4.) </span><span  id='span345'> in what season(s) can you wear this look? </span>  <input type='text' value='<?php  echo $season; ?>' id='input345' class='season' onclick="hide_all_open_dropdown('none','res_occasion','none')";  >
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
						<br> 
						<span>5.) </span><span  id='span345' > what style is this look? </span>  <input type='text' value='<?php  echo $style; ?>' id='input345' class='style' onclick='retrieve_style_list()' >
							<div style='' class='res_style' id='res_style'> 
							</div>
						<br><br>
					</div>
				</div>
				<div id='footer' style='display:block; border:1px solid none'> 
					<div id='tag_list'  style='display:block; border:none'  >
						<span>6.) Tag all item in photo. Only select choice that relate to the item</span> <br>
						<div id='tag1'> 
							 <?php  
							 $c=0;
							 for ($i=1; $i <16 ; $i++) {  
							 	$c++;
							echo "<table border=0  id='table_container_$c' class='item' style='height:20px'  cellspacing='0' cellpadding='0'>"
							?>	
							<style type="text/css">
								#table_container_<?php echo $c ?>{
									 display: none;
								}
									#COLOR<?php echo $c ?> ,
									#BRAND<?php echo $c ?> ,
									#GARMENT<?php echo $c ?> ,
									#MATERIAL<?php echo $c ?> ,
									#PATTERN<?php echo $c ?> , 
									#PRICE<?php echo $c ?> ,
									#PURCHASED<?php echo $c ?>{ 
								}
							</style>
							<?php 
								if ($c < 10 ) { 
									echo " 
										<style type='text/css'>
											.item1_$c { 
											 border: 1px solid none;	
											 padding: 4px;
										}
									</style>
									"; 
								}
							?>
							 	<td id='item1' class='item1_<?php echo $c ?>'> 
		 							 Item# <?php echo "$i"?>. 
								</td>
								<td>
				 					<div id='COLOR<?php echo $c;  ?>' class='static_div_input'   onclick='retrieve_color(this.id)' ></div><div class='ajax_color<?php echo $c;  ?>' id='ajax_color<?php echo $c;  ?>'>  </div>
								</td>
								<td>
			 						<input type='text' id='BRAND<?php echo $c;  ?>' class='not_static_input' value='BRAND' onkeyup='retrieve_brands(this.id)' ><div class='ajax_BRAND<?php echo $c;  ?>' id='ajax_BRAND<?php echo $c;  ?>'>  </div>
								 </td>
								<td> 
				 					<div  id='GARMENT<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_garment(this.id)' ></div> <div class='ajax_GARMENT<?php echo $c;  ?>' id='ajax_GARMENT<?php echo $c;  ?>'  style="" > </div>
								</td>
								<td>
				 					<div id='MATERIAL<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_material(this.id)' ></div><div class='ajax_MATERIAL<?php echo $c;  ?>' id='ajax_MATERIAL<?php echo $c;  ?>' > </div>
								</td>
								<td>
			 						<div id='PATTERN<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_pattern(this.id)' ></div><div class='ajax_PATTERN<?php echo $c;  ?>' id='ajax_PATTERN<?php echo $c;  ?>'  ></div>
								 </td>
								<td>
			 						<div  id='PRICE<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_price(this.id)' ></div><div class='ajax_PRICE<?php echo $c;  ?>' id='ajax_PRICE<?php echo $c;  ?>' > </div>
								 </td>
								<td>
			 						<input type='text' id='PURCHASED<?php echo $c;  ?>' class='not_static_input' value='PURCHASED AT' onkeyup='retrieve_purchased_at(this.id)'  ><div class='ajax_PURCHASED'<?php echo $c;  ?> id='ajax_PURCHASED<?php echo $c;  ?>'></div>  
								 </td> 
								 <td>
			 						<input type='text' id='pos_x_y<?php echo $c;  ?>' class=' ' value='' onkeyup=''  style='display:none' /> 
								 </td> 
							</table>
							<?php } ?>
		 				</div> 
	 				</div>  
	 				<br>
	 				<style type="text/css">
	 					.tagged_occasion { 
	 						color: #fff;
	 					}
	 				</style>
	 				<div id='hastag_box_list' style='display:block; border: 1px solid none'> 
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
	 				<div id='into_ready_to_be_saved_in_db' style='display:none' ></div>
	 				<div id='db_res'  style='display:none' > result here</div> 
	 				<br><br>
					<div id='post_on'>
						<span>7.)  Post this look on:</span><br>
						<span id='fbtw' > <input type='checkbox' onclick="share_fb()" id='fb_' />Facebook <input type='checkbox' onclick='share_tw()' id='tw_' /> Twitter</span>
					</div> 	


					<br><br>
					<div id='save'> 
						<input type='submit' value = 'SAVE' onclick='save_all_data_to_db()'  id ='submt' /> 
					</div>		
				</div>
			</div>
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
	border: 1px solid #000;
 }
</style>
 