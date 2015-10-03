<?php 
	@session_start();   
	require("fs_folders/php_functions/connect1.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
 	$mc      = new myclass();   
 	$article = new postarticle ( ); 
 	$image   = new resizeImage( );  
 	$mc->auto_detect_path();       
 

?>      

	<div id="fb-root"></div>  
    <script src="http://connect.facebook.net/en_US/all.js"></script>  
    <script> 
	    FB.init({ 
	      appId: '528594163842974', 
	      cookie: true,
	      status: true, 
	      xfbml: true 
	    });  
    </script><?php   
        require 'fs_folders/API/facebook-php-sdk-master/src/facebook.php'; 
        $facebook = new Facebook(array(
          'appId'  => '528594163842974',
          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
        ));   
        $user = $facebook->getUser();    
        if ( empty($user) ) {
        	$mc->go( 'login' );   
        }  
        if ( $user ) {  
          	try {    
          	} catch (FacebookApiException $e) {	
          		$mc->go( 'login' ); 
            	error_log($e);
            	$user = null;  
          	}
        }  
        if ($user) { 
          	$logoutUrl = $facebook->getLogoutUrl();   
        } else {   
        	$_SESSION['fb-login-status'] = 'failled';
        	$mc->go( 'login' );   
        }    
    ?>  
	<!doctype html> 
	<html xmlns:fb="http://www.facebook.com/2008/fbml">
	  <head> 
	    <title>php-sdk FS-LogIN</title> 
	  	</head>
	  	<body>
	      	<?php   
				    #saving to account info and user info.  
			  		  	$user_profile = $facebook->api('/me');
			     		$friends = $facebook->api('/me/friends');  
						$fs_user = selectV1('*','fs_members', array('fbid'=> intval($user_profile['id']) ) );   
						$mno1 = $fs_user[0]['mno'];   

						if ( !empty($mno1) ) {   
							#allready a members 
								$fb_friends = $mc->get_logging_in_fb_friends_and_filter( $friends['data'] );
								$mc->update_logging_in_fb_friends( $mno1 , $fb_friends['fb_all_freinds'] , $fb_friends['fb_freinds_on_fs'] , $fb_friends['fb_freinds_on_fb'] ); 
								$_SESSION['temp_mno'] = $mno1;    
								echo " 1.) fb user is already a member <br>";
								echo " 2.) update all friends , friends in fs and friends in fb <br> ";     
								echo " 3.) your total fb friends = ".$fb_friends['total_friends']."<br>";  
								$mc->go( 'login-authentication' );   
						}
						else{ 
							#new member   
								echo " 1.) fb user is a new member <br> ";  
								echo " 2.) add new info member to fashionsponge database [done] <br> "; 
								echo " 2.) add new account member to fashionsponge database [done] <br> "; 
								echo " 3.) update all friends , friends in fs and friends in fb [done] <br> ";  
								echo " 4.) get new profile pic from fb and save to fs [done]  <br> "; 
								echo " 5.) add activity action that new fs member joind and post it on the feed with the profile pic [done] <br> "; 
								echo " 6.) show profile information fields to fill up <br> ";
								echo " 7.) show suggested brand  <br> ";
								echo " 8.) show suggested member according to its style generated through the brands selected  <br> ";
								echo " 9.) a welcome fashionsponge message sent to email <br> ";   
								// fb info
									$fbid          = $user_profile['id'];   
									$firstname     = $user_profile['first_name'];
									$lastname      = $user_profile['last_name']; 
									$gender        = $user_profile['gender']; 
									$birthday      = substr($user_profile['birthday'], strlen($user_profile['birthday'] )-4 , strlen($user_profile['birthday'] ) );  
									$bio           = $user_profile['bio'];  
									$workwith      = $user_profile['work'][0]['position']['name'];  
									$workat        = $user_profile['work'][0]['location']['name'];    
									$email         = $user_profile['email']; 
									$username      = str_replace('.','', $user_profile['username']);   
									$username      = str_replace('and','', $username);   
								echo " <br><BR> FB INFO <br><BR><BR><BR>"; 
								// education
									$school_ex_len = count($user_profile['education'])-1;
									echo " total school expeience $school_ex_len <br> ";   
										# college 
										$studied_with           = $user_profile['education'][$school_ex_len]['concentration'][0]['name'];  
										$studied_at             = $user_profile['education'][$school_ex_len]['school']['name'];  
										$studied_graduate_date  = $user_profile['education'][$school_ex_len]['year']['name']; 
									 
									if ( empty($studied_at) ) {
										# high school 
										$studied_at             = $user_profile['education'][$school_ex_len-1]['school']['name']; 
										$studied_graduate_date  = $user_profile['education'][$school_ex_len-1]['year']['name']; 
									} 
								echo " 										

									fbid = $fbid      <br> 
									firstname = $firstname  <br>
									lastname = $lastname   <br>
									gender = $gender    <br>
									birthday = $birthday  <br>
									bio = $bio       <br>
									work = $work          <br>
									workat = $workat        <br>
									studied_with = $studied_with   <br>
									studied_at = $studied_at     <br>
									studied_graduate_date = $studied_graduate_date <br>
									email = $email    <br>
									username = $username   <br><br><br><br><br><br> "; 

								// insert new user info .  
									$b = insert( 
										'fs_members',
									array( 
										'firstname' , 
										'nickname' ,
										'lastname' , 
										'fbid',
										'aboutme',
										'bdate', 
										'gender', 
										'work_at',
										'occupation',  
										'studied_at', 
										'studied_with',
										'studied_graduate_date', 
										'datejoined'
									),array( 
										$firstname, 
										$nickname, 
										$lastname, 
										$fbid, 
										$bio,
										$birthday,
										$gender, 
										$workat,
										$workwith,
										$studied_at,
										$studied_with,
										$studied_graduate_date,
										date("Y-m-d H:i:s")
									) ,  
									'mno' 
									); 
								// get new user info inserted 
									$userinfo  = $mc->get_latest_user_info( ); 
									$mno       = intval($userinfo[0]['mno']);   
								// insert new user account 
									$b = insert(
										'fs_member_accounts',
										array( 
											'mno', 
											'email' ,
											'username', 
											'pass' 
										),
										array( 
											$mno, 
											$email, 
											$username, 
											'' 
										), 
										'mano' 
									);  
								// retrieved new user inserted 
									$fs_user =selectV1( '*', 'fs_members' ,null,'order by mno desc','limit 1' );  
									$mno1 = intval($fs_user[0]['mno']);     
									$fb_friends = $mc->get_logging_in_fb_friends_and_filter( $friends['data'] );
									$mc->update_logging_in_fb_friends( $mno1 , $fb_friends['fb_all_freinds'] , $fb_friends['fb_freinds_on_fs'] , $fb_friends['fb_freinds_on_fb'] ); 
								
								// retrieve big profile pic of the new user
									echo " big profile pic <br> ";
								  	$size = 'large';
	                                $url = "http://graph.facebook.com/$fbid/picture?type=$size"; 
	                                $headers = get_headers($url, 1); 
	                                if( isset($headers['Location']) ){  
	                                    $bigpicurl = $headers['Location']; // string
	                                }else{
	                                    echo "ERROR";
	                                }   
	                                echo "profile pic path src. $bigpicurl <br>";
	                                echo "<img src=\"$bigpicurl\"  />";    
	                            // add new profile pic for the new user
	                            	$mppno = $mc->member_profile_pic_query( array('mno'=>$mno1 , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) );   
	                            // download from fb photo server 
										$article->download_image_from_other_site( $mno1 , $bigpicurl , 'fs_folders/images/uploads/members/mem_original/' );   
	                            // resize the profile pic downloaded  
	                            	$mc->resize_profile_pic_thumbnail_and_profile( $mno1 , $mppno );    
	                            // add activity post feed  
	                            	#$mc->add_activity_wall_post ( $mno1 , $mppno , 'Joined' , 'fs_members' , $mc->date_time );    
	                            // send confirmation code 
	                            	if ( !empty($email) ) {
	                            		if ( $mc->send_verification_code_to_email( $email , $mc->generate_vefirification_code( $email ) , $firstname )  ) { 
	                            			echo " email confirmation successfully sent. . .";
	                            		} 
	                            	}   
	                            // set notification 
	                            		//$mc->set_notification_info( 'fs_members' , $mno1 , "your facebook friend Just <span class='fs-text-red'> joined </span>"  , $mno1 , 0 , 'join-fb' ); 
	                            		$mc->set_notification_info( 'fs_members' ,  $mno1 , 'joined' , null , null , 0 , 'join-fb' ); 
	                            // add or updated keyword 
	                            		$mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_members' ,   'table_id'=>$mno1 )  );  
								// redirect to the main page   
	                                $_SESSION['type'] = 'new-member-fb-login';
	                                $_SESSION['temp_mno'] = $mno1;  
	                                $_SESSION['lastpagevisited'] = 'profile_crop_display.php'; 
									$mc->go( 'login-authentication' );   

						}    
		   	 
	    	?> 
	  	</body>
	</html>  
 






 
 


