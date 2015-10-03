 <?php 
		 
	    $img_attr_source = 'fs_folders/fs_lookdetails/look_comment_items/img';

		$comment=selectV1(
			'*',
			'posted_looks_comments',
			array('plno'=>$plno , 'operand1'=> 'and' , 'mno'=>$mno),
			'order by plcno desc',
			'limit 1'
		);

		// echo " mno = $mno and plno = $plno ";
		// print_r($comment);

		$ppic_mem = '../../fs/fs/images/members';
		// $ppic_mem = '../betatest/images/members';
		$comment_len = count($comment);
	 	// echo " len $comment_len";

		for ($i=0; $i < 1 ; $i++) { 
			$cno = $comment[$i][0];
			$dformat=$mc->split_date('','','',$comment[$i][3]);	
			$my_rate_look=my_trate_for_look($comment[$i][2],$_SESSION['plno']);
			$ovarating = $mc->user_profile_percentage($comment[$i][2]);
			$get_def_user_profile_percentage = get_def_user_profile_percentage($ovarating);
			$get_def_mem_rating_look=get_def_mem_rating_look($my_rate_look);
 
 
			
			if ($comment[$i][2] == $_SESSION['mno']) {
				$shadow = 'box-shadow: inset 0px 0px 4px 0px #000;';
				// $borders = 'border: 2px solid #000;';
			}else {
				$shadow='';
				// $borders = 'border: 1px solid #000;';
			} 


			// I_liked_store_session($comment[$i][0],$_SESSION['mno']);
			/*
				$plcno = $comment[$i][0];
				echo  "session comment id  $plcno = ".$_SESSION["total_like_$plcno"].' I LIKED ? =   '.$_SESSION["I_liked_$plcno"].'<br>';
 			*/
			$c++;
		    $mem_info=$mc->user($comment[$i][2]);

		       // echo "$cno";


		 	if (strlen($comment[$i][4]) < 224) {  
				  ?><style type="text/css">
				   /*start css*/
				   /* new comment css */
 
						#comment_<?php echo $cno ?> {						 
							width: 540px;
							/*height: 40px;*/
							/*border: 1px solid #000;*/
							/*border-radius: 0px 0px 0px 20px;*/
							/*padding: 10px;*/
							/*<?php echo $borders ?>*/
							/*<?php echo $shadow ?>*/
							/*background-color: #fff;*/
						}
						.line_<?php echo $cno ?> { 
							/*margin-top:25px;*/
							/*width: 608px;*/
							/*float: left;*/
							/*color: #000;*/
							/*height: 200px;*/
							/*border-top: 1px solid #000;*/

						}
						
						#img_like_<?php echo $cno ?>{ 
							/*border:1px solid #000;*/
							height:13px;
							cursor: pointer;
						}
						#img_dislike_<?php echo $cno ?>{ 
							/*border:1px solid #000;*/
							height:13px;
							cursor: pointer;
						}
						#comment_list_<?php echo $cno ?>{ 
							list-style: none;
							/*border: 1px solid red;*/
						}
						.main_container li { 
							list-style: none;
						}




					/* end reply comment css*/
					/*end css*/
 
				</style><?php 	
			} else {  																														?>
				<style type="text/css">
					/* new comment css */
						#comment_<?php echo $cno ?> {
							width: 540px;
							/*height: auto;*/
						}
					/* end comment css*/



					/*new reply comment css */


					/* end reply comment css*/
				</style><?php 
			} ?>



	<div  id='comment_list_<?php echo $cno; ?>'  class='main_container'  style='margin-left:-40px' > 

		<li>  
			<!-- new main comment  -->
				<table border=0 id='comment_container' class='comment_container'> 
					<td> 
				 
						 
						<table border=0 id='img' class='img' border=1 > 
							<td>	
								<img class='profile_pic' src="<?php echo $ppic_mem; ?>/<?php echo $comment[$i][2]; ?>.jpg" title="<?php echo strtoupper($mem_info['firstname'].' '.$mem_info['lastname']); ?>"  onclick='look_comment_attr_clicked("<?php echo "profile_".$comment[$i][2]; ?>")' > 
								<!-- <img src="../images/members/133.jpg"> -->
							</td><tr>
							<td><span class='red_bold' id='percentage' title='<?php echo $get_def_user_profile_percentage ?>' ><?php echo "$ovarating% " ?></span></td>
						</table>
						<div id='comment_body_container' class='comment_body_container'> 
							<div id='comment_header_container' > 
							 
								<table  border=0 > 
									<td><span id='full_name_<?php echo $cno; ?>' class='blue_bold' title="<?php echo strtoupper($mem_info['firstname'].' '.$mem_info['lastname']); ?>"  ><?php echo strtoupper($mem_info['firstname'].' '.$mem_info['lastname']); ?>  </span> </td> <td></td><td></td>

									<td><span class='blue_bold' > ( </span> <span  id='gender' class='blue'  > <?php echo strtoupper($mem_info['sub_gen']); ?>  RATED </span> 
										<span class='rating_view' >

											<?php 
												echo "<img src='$img_attr_source/rate_$my_rate_look.jpg'  title='$get_def_mem_rating_look' class='rating' />"; 
											?>
											<!-- <img src="../images/look_comment/rate_1.jpg"  />  -->
										</span>  <span class='blue_bold'>)</span></span> 
										<!--new user name replied -->
										<!-- 	<span class='blue_bold'> ( </span>  
							 				<span  class='blue_bold' id='replied_name' onmouseover="replied_name_hover(<?php echo "$replied_no"; ?> )" onmouseout="replied_name_leaved(<?php echo "$replied_no"; ?> )"  > replied to  <?php echo comment_repplied_name( $replied_no , $rplcno  ); ?>  </span> 
							 			 	<span class='blue_bold'> ) </span> -->
						 				 <!-- end user name replied -->
									 
									</td>
									<td>
						 				<?php 
							 				$replies=selectV1(
											'*',
											'fs_plcm_reply',
											array('plcno'=>$cno),
											'order by plcr_no asc'
											);	
							 				if (empty($replies)) {
							 					$rLen = 0;
							 				}else { 
							 					$rLen = count($replies);
							 				}
							 			?>
							 			<span class='blue_bold'> ( </span>
						 				<span id='viewReplies' class='viewReplies_<?php echo $cno; ?>' onclick='viewReplies("<?php echo $cno; ?>") ' >View replies</span><span class='totalReplies'> ( <?php  echo $rLen; ?> ) </span> 
						 				 <span class='blue_bold'> ) </span>
									</td>
								</table> 

							</div>
					 		<div class='rcomment' id='comment_<?php echo $cno; ?>' >
					 			<?php 
						 		  	

						 		  	$you_liked=you_like_this_comment($comment[$i][0],$_SESSION['mno']);
						 		  	$you_disliked=you_dislike_this_comment($comment[$i][0],$_SESSION['mno']);

						 		  	// if (!empty($last_comment)) {
						 		  	// 	echo  $comment[$last_comment][4];
						 		  	// }else {  
						 		  		// echo  $comment[$i][4];
						 		  	// }
						 		  	?>
					 			
								<span id='comment_span_<?php echo $cno; ?>'><?php echo $comment[$i][4]; ?></span>
					 		</div>
					 		<div id='comment_footer_Container' > 
					 		 	 <table border=0> 
					 		 	 	<td>  
					 		 	 		<span id='comment_time'>  POSTED ON  <?php  echo $dformat['month'].' , '.$dformat['day'].' , '.$dformat['year'].' | '.$dformat['hour'].':'.$dformat['min'].' '.$dformat['stat'];   ?> </span> 
					 		 	 	</td>
					 		 	 	<td></td> <td></td>
					 		 	 	<td>
					 		 	 		<?php 


						 		 	 		// new can only like once --> remove this to relike redislike manny times
								 		  	if ( $you_disliked == true || $you_liked == true) {
								 		 	 	$cno_for_like_dislike = 0;

								 		 	}else { 

								 		 		$cno_for_like_dislike = $comment[$i][0];
								 		 	}
						 		 			//end can only like once


					 		 	 			if ($you_liked) {
					 		 	 			 
					 		 	 			 ?>
							 		 		<img src="<?php echo $img_attr_source; ?>/like_green.jpg"  class='img_like'  id="<?php echo "img_like_".$cno_for_like_dislike; ?>" title='helpful comment'  onclick='look_comment_attr_clicked("<?php echo "like_".$comment[$i][0]; ?>")' />
						 		 	 	<?php 
						 		 	 			 
						 		 	 	} else {  
						 		 	 		?>
						 		 	 		<img src="<?php echo $img_attr_source; ?>/like.jpg"  class='img_like'  id="<?php echo "img_like_".$cno_for_like_dislike; ?>" title='helpful comment'  onclick='look_comment_attr_clicked("<?php echo "like_".$comment[$i][0]; ?>")' />
						 		 	 	<?php } ?>

						 		 	 	<!-- <img src="../images/look_comment/like.jpg"  class='img_like'  />	  -->
					 		 	 	</td>
					 		 	 	<td></td> <td></td>
					 		 	 	<td> 
						 		 	 	<span class='red_bold' id="<?php echo "like_".$comment[$i][0]; ?>" >  
						 		 	 		 <?php  
						 		 	 		 if ($you_liked) {
						 		 	 		 	echo  count_like($cno) ; 
						 		 	 		 }else { 
						 		 	 		 	echo  count_like($cno) ;
						 		 	 		 }
						 		 	 		 ?> 
						 		 	 	</span>
						 		 	</td>

					 		 	 	<td></td> <td></td>
					 		 	 	<td> 
						 		 	 	<td>
							 		 	 		<?php
					 		 	 				if ($you_disliked) { 
					 		 	 					 
					 		 	 				?>
							 		 				<img src="<?php echo $img_attr_source; ?>/unlike_green.jpg"  class='img_like'   id="<?php echo "img_dislike_".$cno_for_like_dislike; ?>" title='not helpful comment'   onclick='look_comment_attr_clicked("<?php echo "dislike_".$comment[$i][0]; ?>")' />
						 		 	 			<?php
						 		 	 				 
						 		 	 			 } else {    ?>
						 		 	 				<img src="<?php echo $img_attr_source; ?>/unlike.jpg"  class='img_like'   id="<?php echo "img_dislike_".$cno_for_like_dislike; ?>" title='not helpful comment'   onclick='look_comment_attr_clicked("<?php echo "dislike_".$comment[$i][0]; ?>")' />
						 		 	 			<?php } ?>
						 		 	 	</td>
						 		 	 	<td></td> <td></td>
						 		 	 	<td> 
							 		 	 	<span class='red_bold' id="<?php echo "dislike_".$comment[$i][0]; ?>" >  
	 										<?php  
							 		 	 		 if ($you_liked) {
							 		 	 		 	echo  count_dislike($cno); 
							 		 	 		 }else { 
							 		 	 		 	echo  count_dislike($cno);
							 		 	 		 }
							 		 	 		 // echo "999999";
						 		 	 		 ?> 
							 		 	 	</span>
							 		 	</td>
					 		 	 	</td>
					 		 	 	<td></td>
					 		 	 	<td> 
					 		 	 		<td> 
					 		 	 			<img src="<?php echo $img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno."-0"; ?>")' />
					 		 	 		</td>
					 		 	 		<td>  
						 		 	 		<span class='red_bold' > 
						 		 	 			REPLY
						 		 	 		</span>
					 		 	 		</td>
					 		 	 	</td>	
					 		 	 	<td></td>
					 		 	 	<?php if ($_SESSION['mno'] == $comment[$i][2]  ) { ?>
								 		 <td></td>
								 		 <td> 
								 		 	<td> 
								 		 		<img src="<?php echo $img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "edit_$cno"; ?>")' />
								 		 	</td>
								 		 	<td>  
									 	 		<span class='red_bold' > 
									 	 			EDIT
									 	 		</span>
								 		 	</td>
								 		</td>	
								 	<?php } ?>
					 		 	 	<td></td>  
					 		 	 	<td> 
					 		 	 		<td>
					 		 	 			<img src="<?php echo $img_attr_source; ?>/flag.jpg"  class='img_like'  title='flag comment'  onclick='look_comment_attr_clicked("<?php echo "flag_$cno"; ?>")' />
					 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
					 		 	 			</div>
					 		 	 		</td>
					 		 	 		<td>
						 		 	 		<span class='red_bold' > 
						 		 	 			FLAG
						 		 	 		</span>
					 		 	 		</td>
					 		 	 	</td>

					 		 	 	<?php if ($_SESSION['mno'] == $comment[$i][2] or $_SESSION['mno'] == get_look_owner($_SESSION['plno']) ) { ?>
					 		 	 	<td></td> 
					 		 	 	<td> 
					 		 	 		<td>
					 		 	 			<img src="<?php echo $img_attr_source; ?>/delete.jpg"  class='img_like' title='delete comment'  onclick='delete_comment("<?php echo  intval($cno); ?>")'   />
					 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
					 		 	 			</div>
					 		 	 		</td>
					 		 	 		<td>
						 		 	 		<span class='red_bold' > 
						 		 	 			 DEL
						 		 	 		</span>
					 		 	 		</td>
					 		 	 	</td>
					 		 	 	<?php } ?>
					 		 	 </table>
					 		</div>
					 	</div>
					</td>
				</table>
				<hr class='line_<?php echo $cno; ?>' id='hr'  >
			<!-- end main comment  -->




			<br><br> 
			 <ul id='<?php echo "replyContainer_".$cno; ?>' class='replyContainer' style='display:none' >


			 </lu>

	</li>
</div>
<?php 
	} //end loop
?>