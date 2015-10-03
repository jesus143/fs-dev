  
	<link rel="stylesheet" type="text/css" href="style.css">
<?php
	 
 
 
	function reply_print( $plcno , $plcr_no , $allow_reply , $isMainReply = null , $mno = null , $isReplyIndented = null , $userprofilepicpath='../../../'  ) {  

	 		 	$mc = new myclass();
			 	// echo "plcr_no = $plcr_no <br>";
 				$c=0;
				$mc->auto_detect_path(); 
 				
 				if ( $isMainReply == 'YES' ) 
 				{
 					$replies=selectV1(
						'*',
						'fs_plcm_reply',
						array('plcno'=>$plcno , 'operand1'=> 'and' , 'mno'=>$mno),
						'order by plcr_no desc',
						'limit 1'
					); 
 				}		
 				else 
 				{ 
 					$replies = selectV1(
			 			'*',
					 	'fs_plcm_reply',
					 	array('plcr_no'=>$plcr_no)
					 );
 				}
			    
			
 				

 				 // print_r($replies);



				$rplcr_no = $replies[$c]['plcr_no'];


				 
				$plcrno = $rplcr_no;
				$rplcno = $replies[$c]['plcno'];
				$replied_no = $replies[$c]['replied_no'];
				 

				$rmno = $replies[$c]['mno'];
				$rplcr_message = $replies[$c]['plcr_message'];
				$rclen = strlen( $rplcr_message );
				$rplcr_date  = $replies[$c]['plcr_date'];
				$rmem_info=$mc->user($rmno);
				$rdformat=$mc->split_date('','','',$rplcr_date);	
				$rmy_rate_look=my_trate_for_look($rmno,$_SESSION['plno']);

				$ryou_liked = check_if_user_liked (  $plcrno , $_SESSION['mno']);
				$ryou_disliked = check_if_user_disliked (  $plcrno , $_SESSION['mno'] );
				$likeDislike_style = 'height:13px;cursor: pointer;';


				// if ( $rclen< 224) { 
					// echo "if comment len lessthan $rclen ";
					$style = 'height: auto; border: 1px solid none;'; 
					// $cpadding = 'border: 1px solid red; height:20px;';
				// } 
				// else { 
					// echo "else comment len greater than $rclen ";
					// $style = 'height: auto; border: 1px solid  none; width:500px';
				// }
											
				// echo " i like =  $ryou_liked  | i disliked  $ryou_disliked <br>";

				// $you_liked =replyYouLikeThis($rplcno,$rmno);
				// echo "rno = $rplcr_no ";
				$ovarating = $mc->user_profile_percentage($rmno);  
				 $member_avatar = $mc->ppic_thumbnail."/".$rmno.".jpg";
				 // echo " member avatar $member_avatar";

				?>

 

							<table border=0   id='replied_comment_table_<?php echo $plcrno; ?>' class='rcomment_container' style='display:block'> 
								<td  > 
									<table border=0   id='img' class='img' > 
										<td>	
										<?php $mc->member_thumbnail_display( $mc->ppic_thumbnail , $rmno , "$userprofilepicpath".$mc->ppic_thumbnail  ); ?>
											<!-- <img id='rprofile_pic_<?php echo $cno; ?>'  src=" <?php echo "$member_avatar"; ?>" title="<?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>"  onclick='look_comment_attr_clicked("<?php echo "profile_".$comment[$i][2]; ?>")' >  -->
										
										</td><tr>
										<td><span class='red_bold' id='percentage' title='<?php echo $get_def_user_profile_percentage ?>' ><?php echo "$ovarating% " ?></span></td>
									</table>
									<div id='rcomment_body_container' class='rcomment_body_container'> 
										<div id='comment_header_container' > 
											<table  border=0   > 
												<td><span id='rfull_name_<?php echo $rplcr_no; ?>' class='blue_bold' title="<?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>"  ><?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>  </span> </td> <td></td><td></td>

												<td><span class='blue_bold' > ( </span> <span  id='gender' class='blue'  > <?php echo strtoupper($rmem_info['sub_gen']); ?>  RATED </span> 
													<span class='rating_view' >

														<?php 
															$rmy_rate_look = 1;
															$get_def_mem_rating_look  = "weee";
															echo "<img src='$mc->img_attr_source/rate_$rmy_rate_look.jpg'  title='$get_def_mem_rating_look' class='rating' />"; 
														?>
													</span>  <span class='blue_bold'>)</span></span> 
													<!--new user name replied --> 
														 
														<span class='blue_bold'> ( </span>  
									 					<span class='blue_bold' onmouseover="replied_name_hover(<?php echo "$replied_no"; ?>,<?php echo "$rplcno"; ?> )" onmouseout="replied_name_leaved(<?php echo "$replied_no"; ?>,<?php echo "$rplcno"; ?>  )"  style='cursor: pointer;' >@<?php echo comment_repplied_name( $replied_no , $rplcno  ); ?>  </span> 
									 				 	<span class='blue_bold'> ) </span>

								 				 	<!-- end user name replied -->
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
												 		 		<img src="<?php echo $mc->img_attr_source; ?>/like_green.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment'  />
											 		 	 	<?php  
											 		 	 		} else {  
											 		 	 			if( !$ryou_disliked ) { ?>
											 		 	 				<img src="<?php echo $mc->img_attr_source; ?>/like.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyLike_$rplcr_no"; ?>")'  style='<?php echo  $likeDislike_style ; ?>'   /> <?php 
											 		 	 			}
											 		 	 			else { ?>
																		<img src="<?php echo $mc->img_attr_source; ?>/like.jpg"  class='img_like'  id="<?php echo "rimg_like_".$rplcr_no; ?>" title='helpful comment' /> <?php 
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
												 		 				<img src="<?php echo $mc->img_attr_source; ?>/unlike_green.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment'   /> <?php
											 		 	 			} else {   
											 		 	 			 	if (!$ryou_liked) { ?>
											 		 	 			 		<img src="<?php echo $mc->img_attr_source; ?>/unlike.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyDisLike_$rplcr_no"; ?>")' style='<?php echo $likeDislike_style ; ?>' />
											 		 	 	  <?php 	} 
									 		 	 	  			else {  ?>
										 		 	 	  			<img src="<?php echo $mc->img_attr_source; ?>/unlike.jpg"  class='img_like'   id="<?php echo "rimg_dislike_".$rplcr_no; ?>" title='not helpful comment' />
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
								 		 	 	<?php if ($_SESSION['mno'] == $rmno ) { ?>
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td> 
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='comment_Reply_Attr_Clicked("<?php echo "replyEdit_".$rplcr_no; ?>")' />
								 		 	 		</td>
								 		 	 		<td>  
									 		 	 		<span class='red_bold' > 
									 		 	 			EDIT
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>	
										 		   
								 		 	 	<?php  }   //if ( $_SESSION['mno'] !=  $rmno /* and  $allow_reply == true */ ) { ?> 
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td> 
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='comment_Reply_Attr_Clicked("<?php echo "replyReply_$rplcr_no"; ?>","no")'/>
								 		 	 		</td>
								 		 	 		<td>  
									 		 	 		<span class='red_bold' > 
									 		 	 			REPLY
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>
								 		 	 	<?php // } ?>
								 		 	 	<?php if ( $_SESSION['mno'] !=  $rmno ) { ?> 
										 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td>
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/flag.jpg"  class='img_like'  title='flag comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyFlag_$rplcr_no"; ?>")'/>
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
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/delete.jpg"  class='img_like' title='delete comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyDelete_".$rplcr_no; ?>")'   />
								 		 	 			<div id='<?php echo "flag_$rplcr_no"; ?>'>  
								 		 	 			</div>
								 		 	 		</td>
								 		 	 		<td>
									 		 	 		<span class='red_bold' > 
								 		 	 			 DELETE
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>
								 		 	 	<?php } ?>
								 		 	 </table>
								 		</div>
								 	</div>
								</td>
							<tr> 
								<td id='TA_main_comment_reply_td'> 
									<div          id ='TA_main_comment_reply_div_reply'   class='TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>'>
										<textarea id='TA_main_comment_reply_reply'        class='TA_main_comment_reply_reply<?php echo $rplcr_no;?>' placeholder='type your reply here..' ></textarea> 
										<input    id='TA_main_comment_reply_button_reply' class='TA_main_comment_reply_button_reply<?php echo $rplcr_no;?>'  onclick="send_data('cancel reply reply','.TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>')"  type='button' value='CANCEL' >
										<input    id='TA_main_comment_reply_button_reply' class='TA_main_comment_reply_button_reply<?php echo $rplcr_no;?>'  onclick="send_data('save reply reply','.TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>','.TA_main_comment_reply_reply<?php echo $rplcr_no;?>',<?php echo $rplcr_no;?>,'reply of a reply', <?php echo $plcno;?>, '<?php echo $isReplyIndented; ?>' )"   type='button' value='POST A COMMENT' >
									</div>

									<div          id ='TA_main_comment_edit_div_reply'   class='TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>'>
										<textarea id='TA_main_comment_edit_reply'        class='TA_main_comment_edit_reply<?php echo $rplcr_no;?>'  ></textarea> 
										<input    id='TA_main_comment_edit_button_reply' class='TA_main_comment_edit_button_reply<?php echo $rplcr_no;?>' onclick="send_data('cancel edit reply','.TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>')"  type='button' value='CANCEL'  >
										<input    id='TA_main_comment_edit_button_reply' class='TA_main_comment_edit_button_reply<?php echo $rplcr_no;?>' onclick="send_data('save edit reply','.TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>','.TA_main_comment_edit_reply<?php echo $rplcr_no;?>',<?php echo $rplcr_no;?>,'edit of a reply')"   type='button' value='SAVE COMMENT'  >
										
									</div>








									<div          id ='TA_main_comment_flag_div_reply'   class='TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>'>
									 
  											<?php $mc->unflagged_design_auto_hide( array('table'=> 'fs_plcm_rflag' , 'where'=> 'plcrno' , 'whereV'=> $rplcr_no  ) );   ?>

										<!-- new  not yet flag  -->
										 	<table id='flagTable1' class='notflaggedReply<?php echo $rplcr_no; ?>' style="<?php echo $mc->notflaggedStyle; ?>"  border="0" cellpadding="0" cellspacing="0" > 
										 		<tr>  
										 		 	<td id='flagTitle1Td' > 
										 		 		<span id='flagTitle1'> If you want to flag this comment fill up bellow.</span>
										 		 	</td>
										 		 <tr> 
										 		 	<td> 
										 		 		<table id='flagTable2' border="0" cellpadding="0" cellspacing="0"  > 
										 		 			<tr>   
										 		 				<td> 
										 		 			 		<input type="checkbox" class='check_box1Reply<?php echo $rplcr_no; ?>'  >
										 		 			 	</td>
										 		 			 	<td > 
										 		 			 		 <span id='flagTitle2'>NO SPAM or Unsolicited Advertising</span>
										 		 			 	</td>
										 		 			<tr>   
										 		 			 	<td> 
										 		 			 		<input type="checkbox" class='check_box2Reply<?php echo $rplcr_no; ?>' >
										 		 			 	</td>
										 		 			 	<td> 
										 		 			 		 <span id='flagTitle2'>NO Offensive or Harmful Content</span>
										 		 			 	</td>
										 		 			<tr>   
										 		 			 	<td> 
										 		 			 		<input type="checkbox" class='check_box3Reply<?php echo $rplcr_no; ?>'>
										 		 			 	</td>
										 		 			 	<td id='flagTitle2Td3'> 
										 		 			 		 <span id='flagTitle2'>NO Stolen or Copyright Infriging Content</span>
										 		 			 	</td>
										 		 		</table>
										 		 		
										 		 	</td>
										 		 <tr>  
										 		 	<td> 
										 		 		<textarea id='TA_main_comment_flag_reply'        class='TA_main_comment_flag_reply<?php echo $rplcr_no;?>'  ></textarea> 
										 		 		<input    id='TA_main_comment_flag_button_reply' class='TA_main_comment_flag_button_reply<?php echo $rplcr_no;?>' onclick="send_data('cancel flag reply','.TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>')"  type='button' value='CANCEL'  >
														<input    id='TA_main_comment_flag_button_reply' class='TA_main_comment_flag_button_reply<?php echo $rplcr_no;?>' onclick="send_data('save edit reply','.TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>','.TA_main_comment_flag_reply<?php echo $rplcr_no;?>',<?php echo $rplcr_no;?>,'flag of a reply')"  type='button' value='SEND FLAG'  >
														
										
										 		 	</td>
										 	</table>
								 		<!-- new  not yet flag  -->

								 		<!--  new already flagged -->
									 		<div id='flagged' class='flaggedReply<?php echo $rplcr_no; ?>' style="<?php echo $mc->flaggedStyle; ?>" > 
									 			
										 			<table > 
										 				<tr>  
										 					<td> <span id='flagTitle2' > This comment is already flagged.  </span> </td>
										 				<tr>  
										 					<td> <input    id='TA_main_comment_flag_button_reply' class='TA_main_comment_flag_button_reply<?php echo $rplcr_no;?>' onclick="send_data('cancel flag reply','.TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>')"  type='button' value='OK'  ></td>
										 			</table>
									 		</div>
								 		<!--  new already flagged -->
									</div>
								</td>
							<tr> 
								<td id='padding' style="padding-top:25px"> 
								</td>
 
							</table>

							<hr class='rline_<?php echo $rplcr_no; ?>' id='rhr'  >
					 	
							<!-- <hr> -->
					







					<?php 
					// echo " isReplyIndented = $isReplyIndented";
						if ( $isReplyIndented == 'yes' ) 
						{ ?>
							<ul  onclick="autopost_reply(<?php echo $rplcr_no; ?>)" id='autopost_<?php echo $rplcr_no; ?>' > 
					 			 	<!-- auto post here please click me <?php   //echo$rplcr_no; ?> -->
					 		</ul> 
					 	<?php 
							 
						}
						else 
						{ 
						?>
							<div  onclick="autopost_reply(<?php echo $rplcr_no; ?>)" id='autopost_<?php echo $rplcr_no; ?>' > 
					 			 	<!-- auto post here please click me <?php  //echo  $rplcr_no; ?> -->
					 		</div> 
					 	<?php
						}
						?>
			 		
 
<?php 			 
	  
	} #end func. 

?>
 

