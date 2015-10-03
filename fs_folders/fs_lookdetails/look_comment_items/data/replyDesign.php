						
	<?php 

				    $replies=selectV1(
						'*',
						'fs_plcm_reply',
						array('plcno'=>$plcno , 'operand1'=> 'and' , 'mno'=>$mno),
						'order by plcr_no desc',
						'limit 1'
					);
					// print_r($replies);
					$repliesLen = count($replies); 
					 
					if (!empty($replies)) {
					     $repliesLen=count($replies);
					}
					for ($j=0; $j <$repliesLen; $j++)  {  


						$reply_allow = true;
						 
					    $rplcr_no = $replies[$j]['plcr_no'];
					    $plcrno = $rplcr_no;
					    $rplcno = $replies[$j]['plcno'];
					    $cno =  $rplcno;
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
						$ovarating = $mc->user_profile_percentage($rmno);
					}
					?>
 

						<li>
							<table border=0   id='replied_comment_table_<?php echo $plcrno; ?>' class='rcomment_container' style='display:block'> 
								<td  > 
									<table border=0   id='img' class='img' > 
										<td>	
											<img id='rprofile_pic_<?php echo $cno; ?>'  src="<?php echo $mc->ppic_mem; ?>/<?php echo $rmno; ?>.jpg" title="<?php echo strtoupper($rmem_info['firstname'].' '.$rmem_info['lastname']); ?>"  onclick='look_comment_attr_clicked("<?php echo "profile_".$comment[$i][2]; ?>")' > 
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
															echo "<img src='$mc->img_attr_source/rate_$rmy_rate_look.jpg'  title='$get_def_mem_rating_look' class='rating' />"; 
														?>
													</span>  <span class='blue_bold'>)</span></span> 

													<?php if ( !$posted_comment ) { ?> 
													<!--new user name replied -->
														<span class='blue_bold'> ( </span>  
															<span class='blue_bold' id='replied_name' onmouseover="replied_name_hover(<?php echo "$replied_no"; ?>,<?php echo "$plcno"; ?> )" onmouseout="replied_name_leaved(<?php echo "$replied_no"; ?>,<?php echo "$plcno"; ?>  )"  style='cursor: pointer;' > replied to  <?php echo comment_repplied_name( $replied_no , $rplcno  ); ?>  </span> 									 				 
									 				 	<span class='blue_bold'> ) </span>
						 				 			<!-- end user name replied -->
						 				 			<?php } ?>
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
								 		 	 	<?php if ($_SESSION['mno'] ==   $rmno ) { ?>
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
								 		 	 	<?php } //else { ?>
								 		 	 	<?php if ($reply_allow) { ?>
								 		 	 	<td></td>
								 		 	 	<td> 
								 		 	 		<td> 
								 		 	 			 
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno."-".$rplcr_no; ?>")'/>
								 		 	 		</td>
								 		 	 		<td>  
									 		 	 		<span class='red_bold' > 
									 		 	 			REPLY
									 		 	 		</span>
								 		 	 		</td>
								 		 	 	</td>	
								 		 	 	<?php } ?>
								 		 	 	<?php if ($_SESSION['mno'] !=  $rmno) { ?>
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
								 		 	 	<?php } ?>
								 		 	 	<?php /* } */ if ($_SESSION['mno'] ==  $rmno or $_SESSION['mno'] == get_look_owner($_SESSION['plno']) ) { ?>
								 		 	 	
								 		 	 	<td></td> 
								 		 	 	<td> 
								 		 	 		<td>
								 		 	 			<img src="<?php echo $mc->img_attr_source; ?>/delete.jpg"  class='img_like' title='delete comment'  onclick='comment_Reply_Attr_Clicked("<?php echo "replyDelete_".$rplcr_no; ?>")'   />
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
								<tr>
									<td id='TA_main_comment_reply_td'> 
									<div          id ='TA_main_comment_reply_div_reply'   class='TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>'>
										<textarea id='TA_main_comment_reply_reply'        class='TA_main_comment_reply_reply<?php echo $rplcr_no;?>' placeholder='type your reply here..' ></textarea> 
										<input    id='TA_main_comment_reply_button_reply' class='TA_main_comment_reply_button_reply<?php echo $rplcr_no;?>'  onclick="send_data('save reply reply','.TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>','.TA_main_comment_reply<?php echo $rplcr_no;?>',<?php echo $rplcr_no;?>,'reply')"   type='button' value='reply'  >
										<input    id='TA_main_comment_reply_button_reply' class='TA_main_comment_reply_button_reply<?php echo $rplcr_no;?>'  onclick="send_data('cancel reply reply','.TA_main_comment_reply_div_reply<?php echo $rplcr_no;?>')"  type='button' value='cancel' >
									</div>

									<div          id ='TA_main_comment_edit_div_reply'   class='TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>'>
										<textarea id='TA_main_comment_edit_reply'        class='TA_main_comment_edit_reply<?php echo $rplcr_no;?>'  ></textarea> 
										<input    id='TA_main_comment_edit_button_reply' class='TA_main_comment_edit_button_reply<?php echo $rplcr_no;?>' onclick="send_data('save edit reply','.TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>','.TA_main_comment_edit<?php echo $rplcr_no;?>',<?php echo $rplcr_no;?>,'edit')"   type='button' value='save'  >
										<input    id='TA_main_comment_edit_button_reply' class='TA_main_comment_edit_button_reply<?php echo $rplcr_no;?>' onclick="send_data('cancel edit reply','.TA_main_comment_edit_div_reply<?php echo $rplcr_no;?>')"  type='button' value='cancel'  >
									</div>


									<div          id ='TA_main_comment_flag_div_reply'   class='TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>'>
										<textarea id='TA_main_comment_flag_reply'        class='TA_main_comment_flag_reply<?php echo $rplcr_no;?>'  ></textarea> 
										<input    id='TA_main_comment_flag_button_reply' class='TA_main_comment_flag_button_reply<?php echo $rplcr_no;?>' onclick="send_data('save flag reply ','.TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>')"  type='button' value='save'  >
										<input    id='TA_main_comment_flag_button_reply' class='TA_main_comment_flag_button_reply<?php echo $rplcr_no;?>' onclick="send_data('cancel flag reply','.TA_main_comment_flag_div_reply<?php echo $rplcr_no;?>')"  type='button' value='cancel'  >
									</div>
								</td>
							</table>
							<hr class='rline_<?php echo $rplcr_no; ?>' id='rhr'  >
				  		</li>
				  		<ul  onclick="autopost_reply(<?php echo $rplcr_no; ?>)" id='autopost_<?php echo $rplcr_no; ?>'> 
			 			 	<!-- auto post here please click me <?php //echo $rplcr_no; ?> -->
			 		</ul> 