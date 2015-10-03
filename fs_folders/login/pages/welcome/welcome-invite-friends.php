<?php   
	require("../../../../fs_folders/php_functions/connect.php");    
	require("../../../../fs_folders/php_functions/function.php");
	require("../../../../fs_folders/php_functions/myclass.php");
	require("../../../../fs_folders/php_functions/library.php");
	require("../../../../fs_folders/php_functions/source.php");  
 	$mc = new myclass();   

 	# get mno logon
	 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
	 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );     

 	# update total login so that this popup will not show again when closed.

  		$mc->update_total_login( $mno , 3 , true );    

  	# initialize invite friends 

		$from = 0;    
		$_SESSION['cif_fb'] = 2; // page of the invite friends in fb
		$to = $limit = $_SESSION['cif_limit'] = 12;   // this is the total result every show more button clicked 

	# initialize facebook sdk

		$facebook = $mc->fb_init('../../../../fs_folders/API/facebook-php-sdk-master/src/facebook.php');    

	#get fb all friends on fb
	 	$mc->get_fb_all_freinds($mno,"-+-");   
	    $freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-",$from,$to);   
	    if ( $freinds_on_fb != false ) { 	
		    $fb_freinds_on_fb_len = $freinds_on_fb['fb_freinds_on_fb_len'];
		   
		    $fb_freinds_on_fb     = $freinds_on_fb['fb_freinds_on_fb'];  
		    $_SESSION['fb_freinds_on_fb'] = $freinds_on_fb['fb_freinds_on_fb'];   
	    }    

	# posting profile pin in the wall

		$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) );  
		$mc->add_activity_wall_post ( $mno , $mppno , 'Joined' , 'fs_member_profile_pic' , $mc->date_time );   






?>
 
<div id="welcome-content-container" >  	 
	<center>  
		<div id="welcome-about-container" >     
					 <div id="suggested-member-res" style="display:none" >
						result here 	
					</div>
				<div>  
					<!-- from facebook friends -->
						<div>
							<div>
								<b> Familliar Faces: </b> <br>
								Follow your Facebook friends who are already enjoying Fashion Sponge.
							</div>	 


							<?php  if ( $freinds_on_fb != false ) {   ?>


							<!-- profile pic -->
								<div style="margin-top:10px;" id="c-sinvite-friends-fb" >
									<table border="0" >
										<tr>  
											<?php   
												$c=0;
												for ($i=0; $i <   $limit ; $i++):   
													$c++; 
													$fbid =  $fb_freinds_on_fb[$i]['fbfid'];    
													// $mem = $mc->get_fb_user_fs_info( intval($fbid) );   
													// $mno1 = $mem[0]['mno'];  
													// $followed = $mc->check_if_already_followed( $mno , $mno1 );
													// $fullname = $mc->get_full_name_by_id( $mno1 );     
													// echo " mno1 = $mno1  <br>"; 

													$fbfid =  $fb_freinds_on_fb[$i]['fbfid'];   
													$fbfname =  $mc->get_facebook_user_info_by_fbid( $facebook , $fbid );
													echo "
													<td style='padding-right:10px; padding-bottom:5px;' >  
														<table border='0' cellspacing='0' cellpadding='0' >  
															<tr> 
																<td>  
																	";    
					  													echo "
					  														<a href='https://www.facebook.com/$fbid' target='_blank' >
					  															<img src='https://graph.facebook.com/$fbid/picture?type=large' style='cursor:pointer;  width:120px;height:120px;' />
					  														</a>
					  													";   
					 							 
																	echo "   
																</td>  
															<tr>
																<td> 
																	<div id='welcome-name-container'  >
																		$fbfname
																	</div>
																</td>
															<tr> 
																<td style='padding-bottom:5px;'    >	
																	<center>
																		<img id='suggested-member-follow-image$fbid'  class='suggested-member-invite'  src='$mc->genImgs/fb-invite.png'  onclick='invite(\"$fbid\")'  style='cursor:pointer;  width:100%;  ' />  
																	</center>
																</td> 
														</table>
													</td>  
													";  
													if ( $c%6 == 0 ):  
														echo "<tr>";
													endif; 
												endfor; 
											?> 
									</table> 
								</div>

								<div>
									<table border="0" > 
										<tr> 
											<td> 
								 			 	<div id='more-sinvite-ffb' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
								 			</td>   
								 		<tr>
								 			<td> 
								 				<img src="<?php echo "$mc->genImgs/brand-more.png";  ?>" onclick="welcome_more( 'c-sinvite-friends-fb' , 'more-sinvite-ffb img' , 'if-fb' )"    >   			  
								 			</td>
							 		</table>
							 	</div>

							<?php } else  {   ?> 
								<h1> You are not connected with facebook </h1>
							<?php } ?> 
						</div>    
					<div> 
					</div>   
				</div>    
				<!--  skip or continue button -->
			 		<div style="background-color:#e9eaed; padding:20px;margin-left:-20px; width:100%; border-radius: 0px 0px 5px 5px;" > 
						<center>  
							<table>
								<tr>	
									<td> 
										<a href="/">
											<img src="<?php echo "$mc->genImgs/login-welcome-skip.png";  ?>"  >  
										</a>
									</td>
									<td> 
										<a href="/">
											<img src="<?php echo "$mc->genImgs/login-welcome-continue.png";  ?>"  >  
										<a/>
									</td>
							</table>
						</center>
					</div> 
	 	</div>
	</center>
 </div>    
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

 






