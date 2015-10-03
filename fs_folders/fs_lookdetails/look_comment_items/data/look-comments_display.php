<?php 
	session_start();
	require ("../connect.php");
	require ("../function.php");
	require ("../library.php");
	require ("../source.php");
	require ("../myclass.php");
	require ("data/sortingTest.php");
	require ( "data/comSortFunc.php" );
	$mc = new myclass();
	$st = new Sorting ( );


?>
 

 


<link rel="stylesheet" type="text/css" href="style.css">
<div class='main_comment_container'> 
<?php 

	if($_GET['post_comment']=='posted_a_comment'){ 

	}else if($_GET['post_comment']=='live_check_new_message'){ 

		$Tblen=get_total_len_comment($_SESSION['plno']);

		if (!empty($Tblen) and $Tblen != 0 ) { 
			#look have a comment
			if  ($_SESSION['cTblens'] > $Tblen) { 
 		 
 			}
 			else if ($_SESSION['cTblens'] < $Tblen) {
				$total_new_comment =  $Tblen - $_SESSION['cTblens'];
				$_SESSION['cTblens'] = $Tblen;
				$comment=get_new_comments($_SESSION['plno'],$total_new_comment);			
				$comment_len = count($comment);
 			}
		}else { 
			# look is empty
		}

	}
	else if ( $_GET['post_comment']== 'sort' ) { 

		if ( !empty($_GET['sort_as']) )  {
				
				unset($_SESSION['plcnos_sortings']);
				unset($_SESSION['showMoreCounter']);
				$_SESSION['plcnos_sortings'] = comments_sorted( $st , $_GET['sort_as'] );
				$showMore_start = 0;
				$showMore_stop = 10;
			}else { 
				#view more clicked.
				$showMore_start =  $_SESSION['showMoreCounter'];
				$showMore_stop =  $_SESSION['showMoreCounter']+10;
			}

			$res = $_SESSION['plcnos_sortings'];
			$res_len = count($res);
			$comment = $st->set_and_show_more_comments( $res , $showMore_start ,  $showMore_stop );
			$comment_len = count($comment);
	}
	else{ 	 
 
	 	unset($_SESSION['plcnos_sortings']);
		unset($_SESSION['showMoreCounter']);
		$showMore_start = 0;
		$showMore_stop = 10;
		$_SESSION['plcnos_sortings'] = comments_sorted( $st , 'newest' );
		$res_len = count($_SESSION['plcnos_sortings']);
		$comment = $st->set_and_show_more_comments( $_SESSION['plcnos_sortings'] ,  $showMore_start , $showMore_stop );
 
		 if ($comment == 0) 
		 {
		 	$_SESSION['cTblens']=0;
		 } else  { 
		 	$_SESSION['cTblens']=intval(count($comment));
		 }

		$comment_len = count($comment);

	}

	if ($comment == 0) {
	
	} else {  

		$c=0;
		for ($i=0; $i < $comment_len ; $i++) { 
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



	<div  id='comment_list_<?php echo $cno; ?>'  class='main_container' > 

		<li>  
			<!-- new main comment  -->
				<table border=0 id='comment_container' class='comment_container'> 
					<td> 
				 
						 
						<table border=0 id='img' class='img' border=1 > 
							<td>	
								<img class='profile_pic' src="images/members/<?php echo $comment[$i][2]; ?>.jpg" title="<?php echo strtoupper($mem_info['firstname'].' '.$mem_info['lastname']); ?>"  onclick='look_comment_attr_clicked("<?php echo "profile_".$comment[$i][2]; ?>")' > 
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
												echo "<img src='images/look_comment/rate_$my_rate_look.jpg'  title='$get_def_mem_rating_look' class='rating' />"; 
											?>



											<!-- <img src="../images/look_comment/rate_1.jpg"  />  -->
										</span>  <span class='blue_bold'>)</span> </span> 
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
							 		 		<img src="images/look_comment/like_green.jpg"  class='img_like'  id="<?php echo "img_like_".$cno_for_like_dislike; ?>" title='helpful comment'  onclick='look_comment_attr_clicked("<?php echo "like_".$comment[$i][0]; ?>")' />
						 		 	 	<?php 
						 		 	 			 
						 		 	 	} else {  
						 		 	 		?>
						 		 	 		<img src="images/look_comment/like.jpg"  class='img_like'  id="<?php echo "img_like_".$cno_for_like_dislike; ?>" title='helpful comment'  onclick='look_comment_attr_clicked("<?php echo "like_".$comment[$i][0]; ?>")' />
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
							 		 				<img src="images/look_comment/unlike_green.jpg"  class='img_like'   id="<?php echo "img_dislike_".$cno_for_like_dislike; ?>" title='not helpful comment'   onclick='look_comment_attr_clicked("<?php echo "dislike_".$comment[$i][0]; ?>")' />
						 		 	 			<?php
						 		 	 				 
						 		 	 			 } else {    ?>
						 		 	 				<img src="images/look_comment/unlike.jpg"  class='img_like'   id="<?php echo "img_dislike_".$cno_for_like_dislike; ?>" title='not helpful comment'   onclick='look_comment_attr_clicked("<?php echo "dislike_".$comment[$i][0]; ?>")' />
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
					 		 	 			<img src="images/look_comment/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno; ?>")' />
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
								 		 		<img src="images/look_comment/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "edit_$cno"; ?>")' />
								 		 	</td>
								 		 	<td>  
									 	 		<span class='red_bold' > 
									 	 			EDIT
									 	 		</span>
								 		 	</td>
								 		</td>	
								 	<?php } ?>
								 	<?php   if ($_SESSION['mno'] !=  $comment[$i][2] ) { ?>
					 		 	 	<td></td>  
					 		 	 	<td> 
					 		 	 		<td>
					 		 	 			<img src="images/look_comment/flag.jpg"  class='img_like'  title='flag comment'  onclick='look_comment_attr_clicked("<?php echo "flag_$cno"; ?>")' />
					 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
					 		 	 			</div>
					 		 	 		</td>
					 		 	 		<td>
						 		 	 		<span class='red_bold' > 
						 		 	 			FLAG
						 		 	 		</span>
					 		 	 		</td>
					 		 	 	</td>
					 		 	 	<?php } ?>
					 		 	 	<?php if ($_SESSION['mno'] == $comment[$i][2] or $_SESSION['mno'] == get_look_owner($_SESSION['plno']) ) { ?>
					 		 	 	<td></td> 
					 		 	 	<td> 
					 		 	 		<td>
					 		 	 			<img src="images/look_comment/delete.jpg"  class='img_like' title='delete comment'  onclick='delete_comment("<?php echo  intval($cno); ?>")'   />
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

 
		    <!-- new reply comment -->

 				

		  	 	
 				<br><br><br>
		    	  
		    		 <ul id='<?php echo "replyContainer_".$cno; ?>' class='replyContainer' style='display:block' >  
 
<?php 
				 $access = false;
				if ( $access == true ) {
					 
				    $replies=selectV1(
						'*',
						'fs_plcm_reply',
						array('plcno'=>$cno),
						'order by plcr_no asc'
					);
					$repliesLen=0;
					if (!empty($replies)) {
					     $repliesLen=count($replies);
					}
					for ($j=0; $j <$repliesLen; $j++) { 
					    $rplcr_no = $replies[$j]['plcr_no'];
					    $plcrno = $rplcr_no;
					    $rplcno = $replies[$j]['plcno'];
					    $rmno = $replies[$j]['mno'];
					    $rplcr_message = $replies[$j]['plcr_message'];
					    $rclen = strlen( $rplcr_message );
					    $rplcr_date  = $replies[$j]['plcr_date'];
					    $rmem_info=$mc->user($rmno);
					    $rdformat=$mc->split_date('','','',$rplcr_date);	
					    $rmy_rate_look=my_trate_for_look($rmno,$_SESSION['plno']);

					    $ryou_liked = check_if_user_liked (  $plcrno , $rmno );
					    $ryou_disliked = check_if_user_disliked (  $plcrno , $rmno );
					    $likeDislike_style = 'height:13px;cursor: pointer;';

					    if ( $rclen< 224) { 
							// echo "if comment len lessthan $rclen ";
							$style = 'height: 30px; border: 1px solid none; width:500px';
						} 
						else { 
							// echo "else comment len greater than $rclen ";
							$style = 'height: auto; border: 1px solid  none; width:500px';
						}
										
						// echo " i like =  $ryou_liked  | i disliked  $ryou_disliked <br>";

					    // $you_liked =replyYouLikeThis($rplcno,$rmno);
					     // echo "rno = $rplcr_no ";
						$ovarating = $mc->user_profile_percentage($comment[$i][2]);
					?>


				  		<li>
							<table border=0   id='replied_comment_table_<?php echo $plcrno; ?>' class='rcomment_container' style='display:block'> 
								<td  > 
									<table border=0   id='img' class='img' > 
										<td>	
											<img id='rprofile_pic_<?php echo $cno; ?>'  src="images/members/<?php echo $rmno; ?>.jpg" title="<?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>"  onclick='look_comment_attr_clicked("<?php echo "profile_".$comment[$i][2]; ?>")' > 
										</td><tr>
										<td><span class='red_bold' id='percentage' title='<?php echo $get_def_user_profile_percentage ?>' ><?php echo "$ovarating% " ?></span></td>
									</table>
									<div id='rcomment_body_container' class='rcomment_body_container'> 
										<div id='comment_header_container' > 
										  
											<table  border=0   > 
												<td><span id='full_name_<?php echo $rplcr_no; ?>' class='blue_bold' title="<?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>"  ><?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>  </span> </td> <td></td><td></td>

												<td><span class='blue_bold' > ( </span> <span  id='gender' class='blue'  > <?php echo strtoupper($rmem_info['sub_gen']); ?>  RATED </span> 
													<span class='rating_view' >

														<?php 
															echo "<img src='images/look_comment/rate_$rmy_rate_look.jpg'  title='$get_def_mem_rating_look' class='rating' />"; 
														?>
													</span>  <span class='blue_bold'>)</span></span> 
												</td>
											</table> 
										</div>
										 
										<div class='rcomment' id='rcomment_<?php echo $rplcr_no; ?>' style="<?php echo $style; ?>"  >
											<span id='rcomment_span_<?php echo $rplcr_no; ?>'><?php echo"$rplcr_message";?></span>
										</div>
								 		<div id='comment_footer_Container' > 
								 		 	 <table border=0 > 
								 		 	 	<td>  
								 		 	 		<span id='comment_time'>  POSTED ON  <?php  echo $rdformat['month'].' , '.$rdformat['day'].' , '.$rdformat['year'].' | '.$rdformat['hour'].':'.$rdformat['min'].' '.$rdformat['stat'];   ?> </span> 
								 		 	 	</td>
								 		 	 	<td></td> <td></td>
								 		 	 	<td>
								 		 	 		<?php 

								 		 	 		// $you_liked = false;
								 		 	 		// $ryou_disliked = false;
									 		 	 		// new can only like once --> remove this to relike redislike manny times
											 		  	if ( $ryou_disliked == true || $ryou_liked == true) {
											 		 	 	$cno_for_like_dislike = 0;

											 		 	}else { 

											 		 		$cno_for_like_dislike = $rplcr_no;
											 		 	}
									 		 			//end can only like once


								 		 	 			if ($ryou_liked) {
								 		 	 			 ?>
										 		 		<img src="images/look_comment/like_green.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment'  />
									 		 	 	<?php  
									 		 	 		} else {  
									 		 	 			if( !$ryou_disliked ) { ?>
									 		 	 				<img src="images/look_comment/like.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyLike_$rplcr_no"; ?>")'  style='<?php echo  $likeDislike_style ; ?>'   /> <?php 
									 		 	 			}
									 		 	 			else { ?>
																<img src="images/look_comment/like.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment' /> <?php 
									 		 	 			}
									 		 	 		}
									 		 	 		 ?>

									 		 	  
								 		 	 	</td>
								 		 	    
								 		 	 	<td> 
									 		 	 	<span class='red_bold' id="<?php echo "like_".$comment[$i][0]; ?>" >  
									 		 	 		 <?php  
									 		 	 		 // if ($ryou_liked) {
									 		 	 		 // 	echo  0 ; 
									 		 	 		 // }else { 
									 		 	 		 // 	echo   0 ;
									 		 	 		 // }

									 		 	 		 echo countReplyLike ( $plcrno );
									 		 	 		 // echo " 99999 ";
									 		 	 		 ?> 
									 		 	 	</span>
									 		 	</td>

								 		 	 	<td></td> 
								 		 	 	<td> 
									 		 	 	<td>
										 		 	 		<?php

								 		 	 				if ($ryou_disliked) { ?>
										 		 				<img src="images/look_comment/unlike_green.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment'   /> <?php
									 		 	 			} else {   
									 		 	 			 	if (!$ryou_liked) { ?>
									 		 	 			 		<img src="images/look_comment/unlike.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyDisLike_$rplcr_no"; ?>")' style='<?php echo $likeDislike_style ; ?>' />
									 		 	 	  <?php 	} 
									 		 	 	  			else {  ?>
										 		 	 	  			<img src="images/look_comment/unlike.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment' />
									 		 	 	  			<?php 
									 		 	 	  			}
									 		 	 			}  


									 		 	 	  ?>
									 		 	 	</td>
									 		 	 	 
									 		 	 	<td> 
										 		 	 	<span class='red_bold' id="<?php echo "dislike_".$comment[$i][0]; ?>" >  
				 										<?php  
										 		 	 		 // if ($you_liked) {
										 		 	 		 // 	echo  count_rdislike($rplcr_no); 
										 		 	 		 // }else { 
										 		 	 		 // 	echo  count_rdislike($rplcr_no);
										 		 	 		 // }
										 		 	 		 echo countReplyDislike ( $plcrno );
				 										 // echo " 99999 ";
									 		 	 		 ?> 
										 		 	 	</span>
										 		 	</td>
								 		 	 	</td>
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td> 
								 		 	 			<img src="images/look_comment/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno; ?>")' />
								 		 	 		</td>
								 		 	 		<td>  
									 		 	 		<span class='red_bold' > 
									 		 	 			REPLY
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>	
								 		 	 	<?php if ($_SESSION['mno'] !=   $rmno ) { ?>
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td> 
								 		 	 			<img src="images/look_comment/reply.jpg"  class='img_like'  title='reply comment' onclick='comment_Reply_Attr_Clicked("<?php echo "replyEdit_".$rplcr_no; ?>")' />
								 		 	 		</td>
								 		 	 		<td>  
									 		 	 		<span class='red_bold' > 
									 		 	 			EDIT
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>	
								 		 	 	<?php } ?>


								 		 	 	<?php   if ($_SESSION['mno'] ==  $rmno ) { ?>
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td>
								 		 	 			<img src="images/look_comment/flag.jpg"  class='img_like'  title='flag comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyFlag_$rplcr_no"; ?>")'/>
								 		 	 			<div id='<?php echo "flag_$rplcr_no"; ?>'>  
								 		 	 			</div>
								 		 	 		</td>
								 		 	 		<td>
									 		 	 		<span class='red_bold' > 
									 		 	 			FLAG
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>
								 		 	 	<?php  } ?>


								 		 	 	<?php if ($_SESSION['mno'] ==  $rmno or $_SESSION['mno'] == get_look_owner($_SESSION['plno']) ) { ?>
								 		 	 	
								 		 	 	<td></td> 
								 		 	 	<td> 
								 		 	 		<td>
								 		 	 			<img src="images/look_comment/delete.jpg"  class='img_like' title='delete comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyDelete_".$rplcr_no; ?>")'   />
								 		 	 			<div id='<?php echo "flag_$rplcr_no"; ?>'>  
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
							<hr class='rline_<?php echo $rplcr_no; ?>' id='rhr'  >
				  		</li>
				  		<?php 
				  	} #end loop
				 } #end if 
				  		?>

				  
			  	</ul>
			  	<ul>
			  		<li> 
			  			<div id='reply_loader_<?php echo $cno ?>' id='replyLoader' class='replyLoader' > </div>
			  		</li>
			  	</ul>
		  	<!-- end new reply comment -->


		</li>
	</div>
	 
	
	<?php 
		} //end loop
	} //end if

	if ( $_SESSION['showMoreCounter']  < $res_len ) {
		echo "<input type='button' value='view more' onclick='mainCommentShowMore(\"$_SESSION[showMoreCounter]\")' id='viewmore_$_SESSION[showMoreCounter]'>";	 
	}	

?>

<div style='width:500px; height: auto ; background-color:#000;color:#fff;margin-top:20px; margin-left:46px;text-align:center;display:none'> 
		<div id='res'> 
			action status , This is temporarily visible because of currently coding..
		</div>
	</div>
