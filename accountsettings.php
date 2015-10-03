<?php  
	session_start();   
	require("fs_folders/php_functions/connect1.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	require("fs_folders/php_functions/myclass.php");
    require("fs_folders/php_functions/Class/User.php");
    require("fs_folders/php_functions/Class/Brand.php");
    require("fs_folders/php_functions/Class/Article.php");
    require("fs_folders/php_functions/Class/Look.php");
    require("fs_folders/php_functions/Class/UserProfilePic.php");
    require ('fs_folders/php_functions/Database/post.php');
	require("fs_folders/dropdown/dropdown_php_file/dropdown.php");



    use App\UserProfilePic;
    use App\Article;
    $mc             = new myclass();
    $article        = new  Article($mc->mno, $db);
    $look           = new Look($mc->mno, $db);
    $userProfilePic = new UserProfilePic($mc->mno, $db);
    $mc->post = new Post();
    $dd = new dropdown();
	$ri = new resizeImage();  
	$mc->auto_detect_path();     
 	$mno 			 = $mc->get_cookie( 'mno' , 136 );  
	$_SESSION["mno"] = $mc->get_cookie( 'mno' , 136 );




	$account_tab =  $retVal = ( !empty($_GET['at']) ) ? intval($_GET['at']) : 1 ;


    $profile_bar_red_color 		   =  (  $account_tab ==  1 ) ? 'color:#0060c1' : null ;
    $profile_bar_red_color1 	   =  (  $account_tab ==  1 ) ? 'color:#d31a16' : 'display:none' ;

    $general_bar_red_color         =  (  $account_tab ==  7 ) ? 'color:#0060c1' : null ;
	$general_bar_red_color1        =  (  $account_tab ==  7 ) ? 'color:#d31a16' : 'display:none' ;

	$select_brand_bar_red_color    =  (  $account_tab ==  2 ) ? 'color:#0060c1' : null ;
    $select_brand_bar_red_color1   =  (  $account_tab ==  2 ) ? 'color:#d31a16' : 'display:none' ;

	$suggested_member_red_color    =  (  $account_tab ==  3 ) ? 'color:#0060c1' : null ;
    $suggested_member_red_color1   =  (  $account_tab ==  3 ) ? 'color:#d31a16' : 'display:none' ;

	$invite_friends_bar_red_color  =  (  $account_tab ==  4 ) ? 'color:#0060c1' : null ;
    $invite_friends_bar_red_color1 =  (  $account_tab ==  4 ) ? 'color:#d31a16' : 'display:none' ;

	$notification_bar_red_color    =  (  $account_tab ==  5 ) ? 'color:#0060c1' : null ;
    $notification_bar_red_color1   =  (  $account_tab ==  5 ) ? 'color:#d31a16' : 'display:none' ;

	$preferences_bar_red_color     =  (  $account_tab ==  6 ) ? 'color:#0060c1' : null ;
    $preferences_bar_red_color1    =  (  $account_tab ==  6 ) ? 'color:#d31a16' : 'display:none' ;
	  
    $change                        = (!empty($_GET['change'])) ? $_GET['change'] : NULL;




	if ( !empty($_GET['mno']) ) {
		$_SESSION['mno'] = intval($_GET['mno']); 
	}else if (  isset($_POST['save_profile_pic']) ) {
		#mno session not change
		// echo " uploaded new profile pic ";
	}else{
		// $_SESSION['mno'] = 133;
	}   
	$mno = $_SESSION['mno']; 
	// echo " mno = $mno ";






?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php  
			$mc->header_attribute( 
				"Fashion Sponge | Account Settings" , 
				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration " 
			);
        ?>

		<link rel="stylesheet" type="text/css" href="fs_folders/accountsettings/accountsettings_style_file/accountsettings.css" >
		<script type="text/javascript" src="fs_folders/accountsettings/accountsettings_js_file/accountsettings_ajax.js" ></script>
		<script type="text/javascript" src="fs_folders/accountsettings/accountsettings_js_file/accountsettings_jquery.js" ></script>
		</script>

		<?php
		    /**
             * This is requiring to display dropdown the country and state.
             */
			require( "fs_folders/js/country_state.php" );
			$dd->dropdown_v1();   
			$mc->fs_popup_container_and_response( );
		?>

        <?php
       /** popup for the update accounsettings_general
         * update preffered style
         * update preffered topic
         **/
        if($account_tab == 7) {
            if($change == 'style' || $change == 'topic' ) {
                    echo "<div id='login-wrapper' > ";
                        echo "<div id='login-container' >   ";
                        echo "</div>";
                        echo "<div id= 'login-container1' >";
                            require('welcome.php');
                        echo "</div>";
                    echo "</div>";
                }
            }
        ?>

	</head>


	<body onload="init_account_settings('<?php echo $account_tab; ?>')" > 
		<div id="accountsetting-wrapper" >  
			<center> 
				<div id="accountsetting-wrapper-container" >  
					<table id="accountsetting-wrapper-container-table"  border="0" cellspacing="0" cellpadding="0" > 
						<tr> 
							<td id="accountsetting-wrapper-container-table-header" > 
							 	<?php

							 	$mc->fs_header(
							 		$mno, 
							 		null, 
							 		null,
							 		null,
							 		null,
							 		null, 
							 		'account'
							 	);



							 	?>
							</td>
						<tr> 
							<td id="accountsetting-wrapper-container-table-body" >    
								<!-- content right  -->
								<div class="accountsetting-wrapper-container-table-body-right" > 

									<div id="accountsetting-wrapper-container-table-body-right" >

									 	<table border="0" cellpadding="0"  cellspacing="0" >
									 		<tr>  
									 			<td id="accountsetting-wrapper-container-table-body-right-profile" > 
									 				<?php   
									 					// profile
									 					if ( $account_tab == 1 ) {
									 						require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_profile.php");
									 					}
									 					
									 				?>
									 			</td>
									 		<tr>
									 			<td id="accountsetting-wrapper-container-table-body-right-select_brands" >  
									 				<?php  
									 					if ( $account_tab == 2 ) {
									 						require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_select_brand.php");
									 					}
									 					
									 				?> 
									 			</td>
									 		<tr>
									 			<td id="accountsetting-wrapper-container-table-body-right-suggested_members" > 
									 				<?php  
									 					//  suggested member 
									 					if ( $account_tab == 3 ) {
									 						require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_suggested_member.php");
									 					}
									 					
									 				?> 
									 			</td>
									 		<tr>
									 			 <td id="accountsetting-wrapper-container-table-body-right-invite_friends" > 
									 				<?php  
									 					// invite friends
										 				if ( $account_tab == 4 ) {
										 					require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_invite_friends.php");
										 				}
										 					
									 				?>
									 			</td>
									 		<tr>
									 			<td id="accountsetting-wrapper-container-table-body-right-notification" > 
									 				<?php  
									 					// notification
										 				if ( $account_tab == 5 ) {
											 				require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_notifications.php");
											 			}
									 					
									 				?>  
									 			</td>
									 		<tr>
									 			 <td id="accountsetting-wrapper-container-table-body-right-preferences" > 
									 				<?php  
									 					// preferences
									 					if ( $account_tab == 6 ) {
											 				require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_preferences.php");
											 			}
									 					
									 				?>
									 			</td>  
									 		<tr>
									 			 <td id="accountsetting-wrapper-container-table-body-right-preferences" > 
									 				<?php  
									 					// preferences
									 					if ( $account_tab == 7 ) {
											 				require("fs_folders/accountsettings/accountsettings_php_file/accountsettings_general.php");
											 			}
									 					
									 				?>
									 			</td>   
									 	</table>
									</div>    
								</div>
								<!-- menu left  -->
								<div id="accountsetting-wrapper-container-table-body-left" style="border:1px solid none;"    >   
								 	<table id="accountsetting-wrapper-container-table-body-left-tablecontainer" border="0" cellpadding="0" cellspacing="0" style="float:right" > 
								 		<tr> 
								 			<td style="display:none" id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutitle" > 
								 				<div style="color:#d2d0d0;float:right !important; border:1px solid none; width:auto;text-align:right; font-family:misoLight " >
                                                     
								 				</div>
								 			</td> 
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" > 
								 				<a href="account?at=7" >
								 					<span id='accountsetting-general'   style="<?php echo "$general_bar_red_color"; ?>"> General Details </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" > 
								 				<div style="<?php echo "$general_bar_red_color1"; ?>" > | </div>
								 			</td>
								 		<tr>
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" > 
								 				<a href="account?at=1" >
								 					<span id='accountsetting-profile'   style="<?php echo "$profile_bar_red_color"; ?>"  >	Profile </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" > 
								 				<div style="<?php echo "$profile_bar_red_color1"; ?>" > | </div>
								 			</td>
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" style="display:none" > 
									 			<a href="account?at=2" >
									 				<span id='accountsetting-select_brands'  style="<?php echo "$select_brand_bar_red_color"; ?>" > SELECT BRANDS  </span>
									 			</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" style="display:none" > 
								 				<div style="<?php echo "$select_brand_bar_red_color1"; ?>" >  |  </div>
								 			</td>
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" style="display:none" > 
								 				<a href="account?at=3" >
								 					<span id='accountsetting-suggested_members'  style="<?php echo "$suggested_member_red_color"; ?>" > SUGGESTED MEMBERS  </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" style="display:none" > 
								 				<div style="<?php echo "$suggested_member_red_color1"; ?>" >  | </div>
								 			</td>
								 		<tr>		
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" style="display:none" > 
								 				<a href="account?at=4" >
								 					<span id='accountsetting-invite_friends'  style="<?php echo "$invite_friends_bar_red_color"; ?>" > INVITE FRIENDS  </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar"  style="display:none" > 
								 				<div style="<?php echo "$invite_friends_bar_red_color1"; ?>" > |   </div>
								 			</td>
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" > 
								 				<a href="account?at=5" >
								 					<span id='accountsetting-notification' style="<?php echo "$notification_bar_red_color"; ?>"> Notifications  </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" > 
								 				<div style="<?php echo "$notification_bar_red_color1"; ?>" > |  </div>
								 			</td>
								 		<tr>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-menutab" style="display:none" > 
								 				<a href="account?at=6" >
								 					<span id='accountsetting-preferences' onmouseover="alert('PREFERENCES COMING SOON!')"   style="<?php echo "$preferences_bar_red_color"; ?>" > PREFERENCES  </span>
								 				</a>
								 			</td>
								 			<td id="accountsetting-wrapper-container-table-body-left-tablecontainer-bar" style="display:none" > 
								 				<div style="<?php echo "$preferences_bar_red_color1"; ?>" >  |  </div>
								 			</td>
								 		<tr>
								 	</table>
								</div>   
							</td>
						<tr> 
							<td id="accountsetting-wrapper-container-table-footer" >	  
								<?php $mc->new_footer();   ?>
							</td>
					</table>
				</div>
			</center> 
		</div> 

	</body>
</html>

	