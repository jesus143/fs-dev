<?php  $members = $mc->get_all_user( 5 ); ?>  
<table border="0" cellpadding="0" cellspacing="0" id="suggested-member-table-container" > 
	<tr>  
		<td style="padding-bottom:20px" >
			 we recomend you to follow the members who share similar interest  
			 <div id="suggested-member-res" >
				result here 	
			</div>
		</td>
	<tr> 
		<td style=" padding-left: 15px; font-weight: bold; " >  

		<div id='brandres'>  
		</div>	

			<table border="0" cellpadding="5"  cellspacing="0" > 
				<tr> 
					<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
					<td> <span id='select_brands-table-numbers-arrow-left' class='page1' onclick="next_prev( 1 , 'account-suggested-member' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
					<?php 
					$c=1;
					for ($i=0; $i < 25 ; $i++) {  
					 	$c++; 
						echo " 
							<td  class='page$c' onclick='next_prev(\"$c\" , \"account-suggested-member\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
						";
					 } ?>
					<td> 
						<span id='select_brands-table-numbers-arrow-right'> > </span> 
					</td>  
			</table>  
		</td>
	<tr> 
		<td>  
			<img id='select_suggested_member_loader1' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
		</td> 
	<tr>  
		<td  id="suggested-member-nexprev-container" > 
			<table border="0" cellpadding="0" cellspacing="0" >
					<tr><?php 
						for ($i=0; $i < count($members)  ; $i++) {  
							$mno1 = $members[$i]['mno']; 
							$followed = $mc->check_if_already_followed( $mno , $mno1 );
							$fullname = $mc->get_full_name_by_id( $mno1 );   
							?>




							<td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
									<tr> 
										<td style="width:80px" >  
											<?php 
												if ( file_exists("$mc->ppic_thumbnail/$mno1.jpg")) { 
													echo " 
														<a href='profile?id=$mno1' > 
															<img src= '$mc->ppic_thumbnail/$mno1.jpg' style='cursor:pointer; width:120px;height:120px;'  
														</a>
													"; 
												}else{  
													$avatar = $mc->get_male_female_avatar( $mno1 );  
													echo " 
													<a href='profile?id=$mno1' >
														<img src= '$mc->ppic_thumbnail/$avatar' style='cursor:pointer; width:120px;height:120px;'  />  
													</a>
													"; 

												} 
												
				 							?> 
										</td>
										<td style="width:500px; padding-left:20px;"> 
											<span style='font-size:29px; font-family:MisoRegular;' >
								 				 <?php echo $fullname; ?>
								 			</span> 
										</td>
										<td> 
											<table  border="0" cellpadding="2"  cellspacing="0" >
												<?php  
													echo " 
														<tr>
															<td> 
																<img id='suggested_member_follow_loading$mno1' class='suggested_member_follow_loading' src='fs_folders/images/attr/loading 2.gif'  style='visibility:hidden;height:10px; border:1px solid none;'  > 
															</td>
															<td> 

													";
												
													if ( empty($followed)) {
														echo "  
															<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='$mc->genImgs/profile-follow.png' style='cursor:pointer; float:right' onclick='suggested_member_follow ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" )' /> 
														";
													}else{
														echo " 
															<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='$mc->genImgs/profile-unfollow.png' style='cursor:pointer; float:right' onclick='suggested_member_follow ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" )' /> 
														";
													}   
												?>  
												</td>	 
											</table>
										</td> 
								</table>  
							</td> <tr> 
							<?php 
						} ?> 
			</table>
		</td>
	<tr>
		<td>  <br>
			<img id='select_suggested_member_loader2' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
		</td> 
	<tr>
		<td> 
			<table border="0" cellpadding="5"  cellspacing="0" > 
				<tr> 
					<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
					<td> <span id='select_brands-table-numbers-arrow-left' class='page1' onclick="next_prev( 1 , 'account-suggested-member' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
					<?php 
					$c=1;
					for ($i=0; $i < 25 ; $i++) { 
					 	$c++; 
						echo " 
							<td  class='page$c' onclick='next_prev(\"$c\" , \"account-suggested-member\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
						";
					 } ?>
					<td> 
						<span id='select_brands-table-numbers-arrow-right'> > </span> 
					</td>  
			</table>  

		</td>
</table>