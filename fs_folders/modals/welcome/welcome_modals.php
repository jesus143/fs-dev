<?php 
	echo "<div style='display:none' >";
	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");   
	$mc = new myclass();   
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  
	$tab = $_GET['tab'];  
	$typed = $_GET['typed'];  
	// echo " mno =  $mno";


	echo 
		"
			tab = $tab <br>
			typed  = $typed <br>
		";

	/* 	
	*   this is set to zero in the actual page in login/welcome/perpage.php
		$csb_fs = 0;  # counter suggested brand in fs
		$csm_fb = 0;  # counter suggested member in fb
		$csm_fs = 0;  # counter suggested member in fs
		$cif_fb = 0;  # counter invite friends in fb 
	*/    
	echo "</div>"; 
	switch ( $tab ) {
		case 'checking-username' :
                $bool = select_V3('fs_members', '*', " identity_username = '$typed' AND NOT mno = $mc->mno ");
				if(!empty($bool)){
					echo "Username exist. error<br>";
			 	} 
			 	else {
			 		echo "<span style='color:green;font-size:9px;'>Username is valid.</span> ";
			 	}  
			break;  
		case 'checking-bname':  
				//blogurl
				// echo "checking blog name <br>";
                $bool = select_V3('fs_members', '*', " blogurl = '$typed' ");
				if(!empty($bool)){
					echo "Blog url exist. error<br>";
			 	} 
			 	else {
			 		echo "<span style='color:green;font-size:9px;'>Blog url is valid.</span> ";
			 	}  
			break;  
		case 'checking-burl': 
				//blogdom
				// echo "checking blog url <br>";
                $typed = str_replace('www.', '',$typed);
                // echo "domain url   $typed <br>";
                $bool = select_V3('fs_members', '*', " blogdom LIKE '%$typed' ");
				if(!empty($bool)){
					echo "Blog domain exist. error<br>";
			 	} 
			 	else {
			 		echo "<span style='color:green;font-size:9px;'>Blog domain is valid.</span> ";
			 	}  
			break; 
		case 'save-about':  
		 
				// $fname     =   'jesus';
				// 	$nname     = 'erwin';
				// 	$lname     = 'gwapo'; 
				// 	$uname     = 'jes';  
				// 	$byear     = 'Select your birth year'; 
				// 	$gender    = 'Select your gender'; 
				// 	$about     = 'i am handsome'; 
				// 	$avatar    = 'none'; 
				// 	$country   = 'Select Country'; 
				// 	$province  = 'Select State / providence'; 
			  	// 	$city      = ''; 	
				// 	$zipcode   = '9200';  
	 

				$fname     =   ucfirst($_GET['fname']);
			 	$nname     =   ucfirst($_GET['nname']);
			 	$lname     =   ucfirst($_GET['lname']);
			 	$uname     =   $_GET['uname'];
			 	$byear     =   $_GET['byear'];
			 	$gender    =   $_GET['gender'];
			 	$about     =   $_GET['about'];
			 	$country   =   $_GET['country'];
			 	$province  =   $_GET['state'];
			 	$city      =   $_GET['city'];
			 	$zipcode   =   $_GET['zipcode']; 

			 	echo " province 	$province  mno = $mno <br>"; 
			 	echo " update information "; 

			 	$acc = selectV1(
					'*', 
					'fs_member_accounts',
					array('username'=>"$uname" )  
				);     

					if ( !empty($acc) ) { 
					if ( $acc[0]['mno'] != $mno ) {
						echo '<error>username exist<error>';  
					} 
				} 
				if ( empty($fname) ) { 
			 		echo '<fname>first name required<fname>'; 
			 	}
			 	if ( empty($lname) ) { 
			 		echo '<lname>last name required<lname>'; 
			 	} 
			 	if ( $gender == 'Gender') { 
			 		echo '<gender>gender required<gender>'; 
			 	}
				else{  
					echo " update user information <br> ";

					// update user account 

			        	update_v1( 
			        		array(
				        		'table_name'=>'fs_member_accounts',
				        		'username'=>$uname 
				        	),
			        		array(
			        			'mno' => intval($mno) 
		        			)  
		        		);   

					// update user info 

						update_v1( 
			        		array(
				        		'table_name'=>'fs_members', 
				        		'lastname'=>$lname,
								'nickname'=>$nname,
								'firstname'=>$fname, 
								'gender'=>$gender,
								'bdate'=>$byear,
								'country'=>$country,
								'state_'=>$province,
								'city'=>$city,
								'zip'=>$zipcode,
								'aboutme'=>$about,
								'identity_username'=>$uname 
				        	),
			        		array(
			        			'mno'=>intval($mno)
		        			)  
		        		);     	 
				}

				/*
					this is to make that specific field as required

					 	if ( $byear == 'Birth year' ) { 
					 		echo '<byear>byear required<byear>'; 
					 	}
					 	if ( $country == 'Country' ) { 
					 		echo '<country>country required<country>'; 
					 	}
					 	if ( $province == 'State / providence' or $province == 'Select State / Providence' ) { 
					 		echo '<province>province required<province>'; 
					 	}
					 	if ( empty($city) ) { 
					 		echo '<city>city required<city>'; 
					 	}
					 	if ( empty($zipcode) ) { 
					 		echo '<zipcode>zipcode required<zipcode>'; 
					 	} 
			 	*/ 
				
			 	 
			 	// add or updated keyword 

	      			$mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_members' ,   'table_id'=>$mno )  );   
			break;
		case 'sb':    
				$wtres    = $_SESSION['wtres'];
				$pagenum = $_SESSION['csb_fs']++;   
			    $start   = $mc->get_loop_start( $pagenum , $wtres );   
				$all_brands = $mc->get_all_brand( "$start , $wtres " );  
				$brand_selected =   $mc->retreive_specific_user_brand_selected( $mno , 'order by bmsno desc' );  
				// echo " wtres $wtres , pagenum $pagenum , start $start <br><BR><BR><RB><BR>"; 

				if ( !empty($all_brands ) ) { 
					echo " 
					<table  border='0' cellspacing='0' cellpadding='0' style='margin-top:0px;'  > "; 							 
						$c=0;
						$tbrand = count($all_brands);
						for ($i=0; $i < $wtres ; $i++) {     
							if ( $i < $tbrand ) {  
								$c++;   
								$bno = $all_brands[$i]['bno']; 
								$bname = $retVal = ( !empty( $all_brands[$i]['bname']) ) ?  $all_brands[$i]['bname'] : 'Name not available not available' ;  
								// echo " $i bno = $bno <br> "; 
								$brand_style = $mc->get_brand_style_as_selected_or_not( $brand_selected , $bno );     
								if ( file_exists("../../../$mc->brand/$bno.png") ) {
								 	echo " 
										<td> 
											<div>
												<img id='brand$bno' class='brandDefault'   src='$mc->brand/$bno.png' onclick='select_brand(\"$bno\")' style='$brand_style; padding-top:5px;'  > 
											</div>

											<div  id='welcome-name-container' >
												$bname
											</div>
										</td> 
									"; 
								}
								else{
									echo " 
										<td  > 
										 	<div>  
												<img id='brand$bno' class='brandDefault'   src='$mc->brand/default.jpg' onclick='select_brand(\"$bno\")' style='$brand_style; padding-top:5px;'  >  
											</div> 

											<div style='height:25px;border:1px solid none; margin-top:5px;' >
												$bname
											</div>
										</td> 
									";  
								}  
								if ( $c%6==0) {
									echo "<tr>";
								}   
							} 
						} 
			 			echo "  
					</table>"; 
				} 
			break;
		case 'sf-fb':  
					$pagenum          = $_SESSION['csm_fb']++;
					$limit            = $_SESSION['csm_limit'];
					$fb_friends_on_fs = $_SESSION['fb_friends_on_fs'];   
					$fb_friends_on_fs_len = count($_SESSION['fb_friends_on_fs']);  
				    $start   = $mc->get_loop_start( $pagenum , $limit );  
					$end     = $mc->get_loop_end( $pagenum , $limit ); 
					if  ( $start < $fb_friends_on_fs_len-1 ): 
						echo "  
				 			<table>
								<tr>  ";    
								$c=0; 
								for ($i=$start; $i <  $end ; $i++):   
									$c++;     
									if ( $i < $fb_friends_on_fs_len-1 ): 

										$mno1 =  $fb_friends_on_fs[$i];    
										// $mno1 = $mem[0]['mno'];  
										// $mem = $mc->get_fb_user_fs_info( intval($fbid) );   
										
										$followed = $mc->check_if_already_followed( $mno , $mno1 );
										$fullname = $mc->get_full_name_by_id( $mno1 );     
										// echo " mno1 = $mno1  <br>"; 
										echo "
											<td style='padding-right:10px;' >  
												<table border='0' >  
													<tr> 
														<td>  
															<center> 
															";    
																$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
														  		if ( file_exists("../../../$mc->ppic_profile/$mppno.jpg")) { 
																	echo "<img src= '$mc->ppic_profile/$mppno.jpg' style='cursor:pointer; width:120px;height:120px;'"; 
																}else{   
																	$avatar = $mc->get_male_female_avatar( $mno1 );  
																	echo "<img src= '$mc->ppic_profile/$avatar' style='cursor:pointer; width:120px;height:120px;'  />";  
																}  
															echo "   
															</center> 
														</td>  
													<tr>
														<td> 
															<div  id='welcome-name-container' >
																$fullname
															</div>
														</td>
													<tr> 
														<td style='padding-bottom:5px;'   > 
															<center>  ";   
																if ( empty($followed)) {
																	echo "  
																		<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='$mc->genImgs/profile-follow.png' style='cursor:pointer;' onclick='suggested_member_follow ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" )' /> 
																	";
																}else{
																	echo " 
																		<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='$mc->genImgs/profile-unfollow.png' style='cursor:pointer;' onclick='suggested_member_follow ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" )' /> 
																	";
																}    
																echo " 
															</center> 
														</td> 
												</table>
											</td>  
										";  
										if ( $c%6 == 0 ):  
											echo "<tr>";
										endif;  
									endif;
								endfor;  
							 echo "  
						</table> ";
					endif; 
			break;
		case 'sf-fs':   
				$wtres = $_SESSION['wtres']; 
				$pagenum = $_SESSION['csm_fs']++;     
			    $start   = $mc->get_loop_start( $pagenum , $wtres );      
				$members_fs = $mc->get_all_user( "$start , $wtres" );  
				if ( !empty($members_fs) ):  	 
					echo "   
					<table >
						<tr>"; 
							$c=0;
							for ($i=0; $i < $wtres; $i++):   

								$c++;
								$mno1 = $members_fs[$i]['mno'];  
								$followed = $mc->check_if_already_followed( $mno , $mno1 );
								$fullname = $mc->get_full_name_by_id( $mno1 );    
								// echo " mno1 = $mno1  <br>"; 
								echo "
								<td style='padding-right:10px;' >  
									<table border='0' >  
										<tr> 
											<td>  
												<center> ";    
													$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
											  		if ( file_exists("../../../../$mc->ppic_profile/$mppno.jpg")) { 
														echo "<img src= '$mc->ppic_profile/$mppno.jpg' style='cursor:pointer; width:120px;height:120px;'"; 
													}else{   
														$avatar = $mc->get_male_female_avatar( $mno1 );  
														echo "<img src= '$mc->ppic_profile/$avatar' style='cursor:pointer; width:120px;height:120px;'  />";  
													}   
													echo " 
												</center>   
											</td>  
										<tr>
											<td> 
												<div id='welcome-name-container'  > 
													$fullname
												</div>
											</td>
										<tr> 
											<td style='padding-bottom:5px;' > 
												<center>";   
													if ( empty($followed)) {
														echo "  
															<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='$mc->genImgs/profile-follow.png' style='cursor:pointer;' onclick='suggested_member_follow ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" )' /> 
														";
													}else{
														echo " 
															<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='$mc->genImgs/profile-unfollow.png' style='cursor:pointer; m' onclick='suggested_member_follow ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" )' /> 
														";
													}    
													echo " 
												</center> 
											</td> 
									</table>
								</td>  
								";  
								if ( $c%6 == 0 ):  
									echo "<tr>";
								endif; 
							endfor; 
						 echo "  
					</table>"; 
				endif;  
			break;
		case 'if-fb':  

				$pagenum          = $_SESSION['cif_fb']++;
				$limit            = $_SESSION['cif_limit'];   
			    $start   = $mc->get_loop_start( $pagenum, $limit );  
				$end     = $mc->get_loop_end( $pagenum , $limit );    

				#get fb all friends on fb 

				 	$mc->get_fb_all_freinds($mno,"-+-");   
				    $freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-",$start,$end);   

				    if ( $freinds_on_fb != false ) { 	

					    $fb_freinds_on_fb_len = $freinds_on_fb['fb_freinds_on_fb_len']; 
					    $fb_freinds_on_fb     = $freinds_on_fb['fb_freinds_on_fb'];   

				    }    

				if ( count($fb_freinds_on_fb) != 1) {  

					echo "   
					<table border='0' >
						<tr> ";    
							$c=0;
							for ($i=$start; $i <  $end; $i++):   

								if  ( !empty($fb_freinds_on_fb[$i]['fbfid']) ):  
									$c++;  
									$fbid =  $fb_freinds_on_fb[$i]['fbfid'];     
									// echo " fbid [$fbid] <br>";
									$fbfid =  $fb_freinds_on_fb[$i]['fbfid'];   

									$fbfname =  $mc->get_facebook_user_info_by_fbid( null , $fbid );
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
								endif;
							endfor; 
						 echo "  
					</table> "; 
				} 
			break;
		default: 
			break;
	} 
?>