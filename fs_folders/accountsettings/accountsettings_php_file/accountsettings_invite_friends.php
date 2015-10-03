 <?php   
 	$facebook = $mc->fb_init('fs_folders/API/facebook-php-sdk-master/src/facebook.php');  
 	// echo " all friends <br>"; 
    $mc->get_fb_all_freinds($mno,"-+-"); 
    // echo " all fb friends on fs <br>";
    $fb_friends_on_fs = $mc->get_fb_freinds_on_fs($mno,"-+-");
    // print_r($fb_friends_on_fs);
    $fb_friends_on_fs_len = count($fb_friends_on_fs)-1;
    $fb_friends_on_fs_len = 5;
 
    $freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-",0,5); 
    $fb_freinds_on_fb_len = $freinds_on_fb['fb_freinds_on_fb_len'];
    $fb_freinds_on_fb_len_limit = 5;
    $fb_freinds_on_fb     = $freinds_on_fb['fb_freinds_on_fb']; 
 
	?> 

<!-- my friends from facebook on fs -->
	<table border="0" cellpadding="0" cellspacing="0" id="suggested-member-table-container" style="padding-bottom:50px;" > 
		<tr>  
			<td style="padding-bottom:20px" >
				<div style='font-family:MisoRegular;font-size:25px; padding-bottom:10px' >
					FAMILIAR FACES 
				</div>
				<div style='font-family:arial;font-size:12px; ' >
					Follow your Facebook friends who's on FashionSponge	
				</div> 
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
						<td> <span id='select_brands-table-numbers-arrow-left' class='fb-freinds-on-fs-page1' onclick="next_prev( 1 , 'account-invitefriends-fb-friends-on-fs' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php 
						$c=1;
						for ($i=0; $i < 25 ; $i++) { 
						 	$c++; 
							echo " 
								<td  class='fb-freinds-on-fs-page$c' onclick='next_prev(\"$c\" , \"account-invitefriends-fb-friends-on-fs\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table>  
			</td>
		<tr> 
			<td>  
				<img id='invitefriends-fb-friends-on-fs-loader1' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td> 
		<tr>  
			<td  id="invitefreinds-fbfriends-on-fs-nexprev-container" > 
				<table border="0" cellpadding="0" cellspacing="0" >
						<tr><?php 
							for ($i=0; $i < $fb_friends_on_fs_len ; $i++) {  

								$mno1 = $fb_friends_on_fs[$i]; 
								$followed = $mc->check_if_already_followed( $mno , $mno1 );
								$fullname = $mc->get_full_name_by_id( $mno1 ); ?>
								<td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
									<table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
										<tr> 
											<td style="width:80px" >  
												<?php 
													if ( file_exists("$mc->ppic_thumbnail/$mno1.jpg")) {
														echo " 
															<a href='profile?id=$mno1' >
																<img src= '$mc->ppic_thumbnail/$mno1.jpg' style='cursor:pointer; width:60px;height:60px;'  
															</a>
														";

													}else{
														echo " 
														<a href='profile?id=$mno1' >
															<img src= '$mc->ppic_thumbnail/default_avatar.png' style='cursor:pointer; width:60px;height:60px;'  />  
														</a>
														";
													} 
													
					 							?> 
											</td>
											<td style="width:500px"> 
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
				<img id='invitefriends-fb-friends-on-fs-loader2' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td> 
		<tr>
			<td> 
				<table border="0" cellpadding="5"  cellspacing="0" > 
					<tr> 
						<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
						<td> <span id='select_brands-table-numbers-arrow-left' class='fb-freinds-on-fs-page1' onclick="next_prev( 1 , 'account-invitefriends-fb-friends-on-fs' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php 
						$c=1;
						for ($i=0; $i < 25 ; $i++) { 
						 	$c++; 
							echo " 
								<td  class='fb-freinds-on-fs-page$c' onclick='next_prev(\"$c\" , \"account-invitefriends-fb-friends-on-fs\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table>  

			</td>
	</table> 
<!-- my friends from facebook on not on fs -->
	<table border="0" cellpadding="0" cellspacing="0" id="suggested-member-table-container" > 
		<tr>  
			<td style="padding-bottom:20px" > 
				<div style='font-family:MisoRegular;font-size:25px; padding-bottom:10px' >
					INVITE YOUR FRIENDS
				</div>
				<div style='font-family:arial;font-size:12px; ' >
					Invite friends from facebook
				</div> 
			</td>
		<tr> 
			<td style=" padding-left: 15px; font-weight: bold; " >  

			<div id='brandres'> 
	 
			</div>	

				<table border="0" cellpadding="5"  cellspacing="0" > 
					<tr> 
						<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
						<td> <span id='select_brands-table-numbers-arrow-left' class='fb-freinds-on-fb-page1' onclick="next_prev( 1 , 'account-invitefriends-fb-friends-on-fb' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php 
						$c=1;
						for ($i=0; $i < 25 ; $i++) { 
						 	$c++; 
							echo " 
								<td  class='fb-freinds-on-fb-page$c' onclick='next_prev(\"$c\" , \"account-invitefriends-fb-friends-on-fb\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table>  
			</td>
		<tr> 
			<td>  
				<img id='invitefriends-fb-friends-on-fb-loader1' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td> 
		<tr>  
			<td  id="invitefreinds-fbfriends-on-fb-nexprev-container" > 
				<table border="0" cellpadding="0" cellspacing="0" >
						<tr><?php 
							for ($i=0; $i < $fb_freinds_on_fb_len_limit ; $i++) { 
									$fbfid =  $fb_freinds_on_fb[$i]['fbfid'];   
									$fbfname =  $mc->get_facebook_user_info_by_fbid( $facebook , $fbfid );
									
								?>
								<td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
									<table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
										<tr> 
											<td style="width:80px"  >  
												<?php 
													// change to fb profile pic 
  													echo "
  														<a href='https://www.facebook.com/$fbfid' target='_blank' >
  															<img src='https://graph.facebook.com/$fbfid/picture' style='cursor:pointer; width:60px;height:60px;' />
  														</a>
  													";   
					 							?> 
											</td>
											<td style="width:500px"> 
												<span style='font-size:29px; font-family:MisoRegular;' >
									 				 <?php echo $fbfname; ?>
									 			</span> 
											</td>
											<td> 
												<table  border="0" cellpadding="2"  cellspacing="0" >
													<?php  

														// change to invite button
														echo " 
															<tr>
																<td> 
																	<img id='suggested_member_follow_loading$mno1' class='suggested_member_follow_loading' src='fs_folders/images/attr/loading 2.gif'  style='visibility:hidden;height:10px; border:1px solid none;'  > 
																</td>
																<td>  
														";  
															echo "  
																<img id='suggested-member-follow-image$mno1'  class='suggested-member-invite'  src='$mc->genImgs/fb-invite.png'  onclick='invite(\"$fbfid\")'  style='cursor:pointer; float:right' /> 
															"; 
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
				<img id='invitefriends-fb-friends-on-fb-loader2' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td> 
		<tr>
			<td> 
				<table border="0" cellpadding="5"  cellspacing="0" > 
					<tr> 
						<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
						<td> <span id='select_brands-table-numbers-arrow-left' class='fb-freinds-on-fb-page1' onclick="next_prev( 1 , 'account-invitefriends-fb-friends-on-fb' )"   style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php 
						$c=1;
						for ($i=0; $i < 25 ; $i++) { 
						 	$c++; 
							echo " 
								<td  class='fb-freinds-on-fb-page$c' onclick='next_prev(\"$c\" , \"account-invitefriends-fb-friends-on-fb\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table>  

			</td>
	</table>




   <div id="fb-root"></div>
     

  <script src="http://connect.facebook.net/en_US/all.js"></script>


  <script>
     
    
    FB.init({ 
      appId: '528594163842974', 
      cookie: true,
      status: true, 
      xfbml: true 
    });

    function invite(to) {
      FB.ui({
        method: 'send',
        name: "please vote for me",
        link: 'http://fashionsponge.com/fs',
        picture:"http://fashionsponge.com/fs/images/FSlogo.jpeg",
        to:to,
        description:'A designers closeth...'
      });
    }  
  </script>  

 



























































	<?php 
	#calculation of saving friends

    function get_all_fb_freinds( ) {  
	    $fb_freinds = selectV1('fb_all_freinds','fs_members', array('mno'=>133) );  
	    $fb_freinds_on_fb = '';
	    $fb_freinds_on_fs = ''; 
	    if ( !empty($fb_freinds)) { 
		    $fbf = $fb_freinds[0]['fb_all_freinds'];  
		    $fbf_array = explode("-+-", $fbf);
		    // print_r($fbf_array);
		    $tfbf1 = count($fbf_array)-1;
		    $tfb2= $tfbf1/2;
		    echo "total friends = $tfb2 <br>"; 
		    $c=0;
		    $d=0;
		    for ($i=0; $i < $tfbf1 ; $i++) {   
		    	
		    	$fbf_id = $fbf_array[$i];
		    	$i++;
		    	$fbf_name= $fbf_array[$i];  

		    	$fbf_user_on_fb = selectV1( 'mno','fs_members', array('fbid'=>$fbf_id) );  
		    	if ( !empty($fbf_user_on_fb )) { 

		    		echo " <h4> frind on fb on fs id = $fbf_id name = $fbf_name </h4> <br> "; 
		    		$fbf_on_fs[$c]['mno'] = $fbf_user_on_fb[0]['mno']; 
		    		$fbf_on_fs[$c]['fbid'] = $fbf_id; 
		    		$fb_freinds_on_fs .= $fbf_user_on_fb[0]['mno']."-+-"; 
		    		$c++;  
		    	}else{ 
		    		$fbf_on_fb[$d]['fbid'] = $fbf_id;
		    		$fbf_on_fb[$d]['fbname'] = $fbf_name;
		    		$d++; 
		    		$fb_freinds_on_fb .= $fbf_id."-+-".$fbf_name;  
		    	} 
		    }  
		    echo "<h3>fb friends on fs</h3>";
		     
		    // echo " $fb_freinds_on_fs <br> conver to array <br>"; 
		     #save to   fb_freinds_on_fs
		    convert_array_fb_freinds_on_fs( $fb_freinds_on_fs ); 
		    echo "<h3> fb friends  </h3>";
		    // print_r($fbf_on_fb); 
		    // echo " $fb_freinds_on_fb <br>";
		    convert_array_fb_freinds_on_fb(  $fb_freinds_on_fb  );
		    #save to   fb_freinds_on_fb
	    }else{
	    	echo " you don't have friends on fb <br> ";
	    }  
	}
 
	function convert_array_fb_freinds_on_fs( $fb_freinds_on_fs ) {
		$fbf_on_fs = explode("-+-", $fb_freinds_on_fs);
		$fbfonfs_len = count($fbf_on_fs)-1; 
		print_r($fbf_on_fs); 
	}
	function convert_array_fb_freinds_on_fb(  $fb_freinds_on_fb  ) { 
		$fbf_on_fb_array = explode("-+-", $fb_freinds_on_fb); 
	    $tfbf1 = count($fbf_on_fb_array)-1;
	    $tfb2= $tfbf1/2;
	    print_r($fbf_on_fb_array);
	} 
?>  





