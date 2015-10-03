<?php  

	# set up if show header of hide 

			$show = true;
			if (!empty($_SESSION['hide_page'])) { 
				if ( in_array('header' , $_SESSION['hide_page'] )  ) {
				 	$show = false;
				} 
			} 
if ( $show == true ):


	$page = 'home';
	switch ( $page ) {
		case 'home':
				$home = 'color:#b01d23'; 	
			break; 
		case 'participate':
				$participate = 'color:#b01d23'; 	
			break; 
		case 'community':
				$community = 'color:#b01d23'; 	 
			break; 
		case 'info':
				$info = 'color:#b01d23'; 	
			break;
		default:  
			break;  
	}   
 	
 
 	// echo " page = $header_page";

	switch ( $header_page ) {
		case 'details':
				$style_main_table = "width:auto; "; 
				// $style_bottom =  "width: 1011px; margin-left: -1px; position: relative; margin-top: 0px; width:1010px; border-bottom:1px solid white;";
				$style_bottom = "position: fixed; margin-top: -57px; width: 1009px;";
                $style_up     = "width:1010px; border:none;border:none;";
                $login_signup = "padding-left:33px"; 
			break; 
		case 'lookdetails':
				$style_main_table = "width:1011px; "; 
				$style_bottom =  "width: 1011px; margin-left: -1px; position: relative; margin-top: 0px; border-bottom:1px solid white;";
                $login_signup = "";
                $login_signup = "padding-left:33px"; 
			break;
		default: 
				$style_main_table = "width:1011px; "; 
			    // $style_bottom =  "width: 1011px; margin-left: -1px; position: relative; margin-top: 0px; border-bottom:1px solid white;";
                $style_bottom = "";
                $login_signup = "";  
			break;
	}
 

	// echo " $style_main_table ";



?>	  
<div id="new-header-signout-wrapper" > 
	<table border="0" cellpadding="0" cellspacing="0" style="<?php echo $style_main_table; ?>"  > 	
		<tr>
			<td  id="new-top-header" style="<?php echo $style_up; ?>"  >
                    <table>
                        <tr>
                            <td id="new-header-signout-upper-td1" >
                                <table style="margin-top:2px;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div>
                                                    <a href="\">
                                                        <img src="fs_folders/images/genImg//blue-logo.png" style="height:30px;">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <!-- <td id="new-header-signout-upper-td2" >
                                 <table>
                                     <tr>
                                        <td>
                                            <div id="new-header-signout-link"  > <a href="\" >         HOME        </a>  </div>
                                        </td>
                                        <td>
                                            <div id="new-header-signout-link"  > <a href="\" >         LOOKS       </a>  </div>
                                        </td>
                                        <td>
                                            <div id="new-header-signout-link"  > <a href="\"  > FASHION  </a>  </div>
                                        </td>
                                         <td>
                                             <div id="new-header-signout-link"  > <a href="\" >   BEAUTY   </a>  </div>
                                         </td>
                                         <td>
                                             <div id="new-header-signout-link"  > <a href="#">        LIFESTYLE        </a>  </div>
                                         </td>
                                         <td>
                                             <div id="new-header-signout-link"  #new-header-signout-upper-td2 {> <a href="#">        ENTERTAINMENT        </a>  </div>
                                         </td>
                                 </table>
                            </td> -->

                            <td id="new-header-signin-upper-td2" class="header-signout-me" >
                                                                 <table>
                                     <tbody><tr>
                                        <td>
                                            <div id="new-header-signin-link"> <a href="\">         HOME        </a>  </div>
                                        </td>
                                        <td>
                                            <div id="new-header-signin-link"> <a href="\">         LOOKS       </a>  </div>
                                        </td>
                                        <td>
                                            <div id="new-header-signin-link"> <a href="\"> FASHION  </a>  </div>
                                        </td>
                                         <td>
                                             <div id="new-header-signin-link"> <a href="\">   BEAUTY   </a>  </div>
                                         </td>
                                         <td>
                                             <div id="new-header-signin-link"> <a href="#">        LIFESTYLE        </a>  </div>
                                         </td>
                                         <td>
                                             <div id="new-header-signin-link" #new-header-signout-upper-td2="" {=""> <a href="#">        ENTERTAINMENT        </a>  </div>
                                         </td>
                                 </tr></tbody></table>
                            </td>


                            <td id="new-header-signout-upper-td3" >
                                <div>
                                    <table border="0" id="header_search_field">
                                        <tbody><tr>
                                            <td>
                                                <input id="new-header-signout-search" type="text" placeholder="SEARCH">
                                            </td>
                                            <td>
                                                <input id="new-header-signout-scope" type="image" src="fs_folders/images/genImg/header-search-icon.png">
                                            </td>
                                        </tr></tbody></table>
                                </div>
                            </td>
                    </table>
			</td>
		<tr>
                                <!--			<td id="new-bottom-header-disabled" style="display:none; --><?php //echo $style_bottom; ?>
                                <!--			 	<ul>-->
                                <!--                    <li id="new-bottom-header-icons">-->
                                <!--                        <table>-->
                                <!--                            <tbody><tr>-->
                                <!--                                <td style="width: 70px;"><span>Follow Us</span></td>-->
                                <!--                                <td style="width: 10px;"><img src="fs_folders/images/icons/social sites/facebook-white.png"></td>-->
                                <!--                                <td><img src="fs_folders/images/icons/social sites/tumblr-white.png"></td>-->
                                <!--                                <td><img src="fs_folders/images/icons/social sites/instagram-white.png"></td>-->
                                <!--                                <td><img src="fs_folders/images/icons/social sites/pinterest-white.png"></td>-->
                                <!--                            </tr></tbody></table>-->
                                <!--                    </li>-->
                                <!--				 	<li id='new-bottom-header-text' >-->
                                <!--				 		<div style="margin-left:58px;color:white; border:1px solid none; width:650px;margin-top:3px; " >-->
				 			<?php
				 				// $title1 = 'Use Fashion Sponge to discover the Who, What, When and Where in fashion. <a href=\'signup\' > <span style=\'color:#43cf51; text-decoration:underline\' > Sign up now it\'s free. </span> </a> ';
				 				// $title  = '<b>  Use fashion sponge to discover whats fashionable <br>  arround the world.	</b> ';
				 				// $title1 = 'DISCOVER THE WHO, WHAT, WHEN AND WHERE IN BEAUTY, ENTERTAINMENT, FASHION AND LIFESTYLE. <a href=\'signup\' > <span style=\'color:#43cf51; text-decoration:underline\' > Sign up now it\'s free. </span> </a> ';
				 				//$title1 = 'DISCOVER THE WHO, WHAT, WHEN AND WHERE IN FASHION, BEAUTY AND LIFESTYLE. <br><a href=\'signup\' > <span style=\'color:#43cf51; text-decoration:underline\' > Sign up now it\'s free. </span> </a> ';
//                                $title1 = 'DISCOVER THE LATEST IN FASHION, BEAUTY, LIFESTYLE AND ENTERTAINMENT';

				 			?>
				 			<!--
					 			<div style="font-family:misoRegular;color: white;font-size:20px;" > FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO...</div>
					 			Show your ootd, see the latest trends, get fashion inspiration and style advise.
				 			 -->
				 			<!-- <div style="font-family:misoLight;color: white; font-size:15px !important;" >SOMETHING NEW IS COMING TO FASHION LOVERS!</div>  -->
				 			<!-- Share your ootd and lifestyle photos. Get fashion inspiration and style advice. -->
<!--				 			<span  style="font-family:arial; font-size:14px;" > --><?php //echo strtoupper($title1) ; ?><!--</span>-->
<!-- 				 		</div>-->
<!--				 	</li>-->
<!--				 	<li id='new-bottom-header-button' >-->
<!--				 		<div>-->
<!--				 				<table border="0" >-->
<!--				 					<tr>-->
<!--				 						<td style="padding-right:5px; ">-->
<!--				 							<a href="signup">-->
<!--				 								<img src="--><?php //echo "$this->genImgs/header-sign-out-sign-up.png"; ?><!--"  style='height:35px;' id='new-header-button-signup' onmousemove=" mousein_change_button ( '#new-header-button-signup' , 'fs_folders/images/genImg/header-sign-out-sign-up-mouse-over.png' )" onmouseout="mouseout_change_button (  '#new-header-button-signup'  , 'fs_folders/images/genImg/header-sign-out-sign-up.png' ) "  >-->
<!--				 							</a>-->
<!--				 						</td>-->
<!--				 						<td style="padding-top:0px;" >-->
<!--				 							<a href="#">-->
<!--				 								<img src="--><?php //echo "$this->genImgs/login-button.png"; ?><!--"  style='height:35px;'  onmouseover='header_login_button_mouseover( )' onmouseout='header_login_button_mouseout( )' onclick="show('#login-wrapper')"  id='new-header-button-login'  >-->
<!--				 							</a>-->
<!--				 						</td>-->
<!--				 				</table>-->
<!--				 		</div>-->
<!--				 	</li>-->
<!--			 	</ul>-->
<!--			</td>-->

 

            <td id="new-bottom-header"   style="<?php echo $style_bottom; ?>" >
                <table>
                    <tbody>
                    <tr>
                        <td id="new-bottom-header-td1">
                            <table>
                                <tbody><tr>
                                    <td><span class="follow-us-text" >Follow Us</span></td>
                                    <td> 
                                        <?php 
                                            $this->social_login( 
                                                'print-image', 
                                                'fs_folders/images/icons/social sites/facebook.png', 
                                                '#',
                                                'fs_folders/images/icons/social sites/mouse-over-facebook.png',
                                                'header-sign-out-facebook-icon',
                                                '',
                                                '_blank'
                                            ); 
                                        ?>
                                    </td>
                                    <td> 
                                        <?php 
                                            $this->social_login( 
                                                'print-image', 
                                                'fs_folders/images/icons/social sites/tumblr.png', 
                                                '#',
                                                'fs_folders/images/icons/social sites/tumblr-mouse-over.png',
                                                'header-sign-out-tumblr-icon',
                                                '',
                                                '_blank'
                                            ); 
                                        ?>
                                    </td>
                                    <td> 
                                        <!-- <img src="fs_folders/images/icons/social sites/instagram.png"> -->
                                        <?php 
                                             $this->social_login( 
                                                'print-image', 
                                                'fs_folders/images/icons/social sites/instagram.png', 
                                                '#',
                                                'fs_folders/images/icons/social sites/instagram-mouse-over.png',
                                                'header-sign-out-instagram-icon',
                                                '',
                                                '_blank'
                                            ); 
                                        ?>  
                                    </td>
                                    <td>

                                        <!-- <img src="fs_folders/images/icons/social sites/pinterest.png"> -->
                                         <?php 
                                             $this->social_login( 
                                                'print-image', 
                                                'fs_folders/images/icons/social sites/pinterest.png', 
                                                '#',
                                                'fs_folders/images/icons/social sites/pinterest-mouse-over.png',
                                                'header-sign-out-pinterest-icon',
                                                '',
                                                '_blank'
                                            ); 
                                        ?>  
                                    </td>
                                </tr></tbody></table>
                        </td>
                        <td id="new-bottom-header-td2">
                            <!-- <div> <span>DISCOVER THE LATEST IN FASHION, BEAUTY, LIFESTYLE AND ENTERTAINMENT</span> </div> -->
                            <div> <span>DISCOVER AND SHARE THE LATEST IN FASHION, BEAUTY, LIFESTYLE AND ENTERTAINMENT</span> </div>
                        </td>
                        <td id="new-bottom-header-td3" style="<?php echo $login_signup; ?>" >
                            <div>
                                <table border="0">
                                    <tbody><tr>
                                        <td style="padding-right:14px">
                                            <a href="signup">
                                                <img src="fs_folders/images/genImg/header-sign-out-sign-up.png" style="height:35px;" id="new-header-button-signup" onmousemove=" mousein_change_button ( '#new-header-button-signup' , 'fs_folders/images/genImg/header-sign-out-sign-up-mouse-over.png' )" onmouseout="mouseout_change_button (  '#new-header-button-signup'  , 'fs_folders/images/genImg/header-sign-out-sign-up.png' ) ">
                                            </a>
                                        </td>
                                        <td style="padding-top:0px;">
                                            <a href="#">
                                                <img src="fs_folders/images/genImg/login-button.png" style="height:35px;" onmouseover="header_login_button_mouseover( )" onmouseout="header_login_button_mouseout( )" onclick="show('#login-wrapper')" id="new-header-button-login">
                                            </a>
                                        </td>
                                    </tr></tbody></table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
  
		<tr> 
			<td id="new-header-bar" style="height:80px;border:1px solid none;display:none" >       
			</td> 
	</table> 
</div>  


<div  id="res-fixed" style="position:fixed; margin-top:100px;color:#000; display:none" >  
	res here
</div>   


			 		 
<!-- arrow up when mouse is over the footer -->

	<div id="fs-arrow-up-container" >
		 <div  id="fs-arrow-up" >
            <!-- <img src="--><?php //echo "$this->genImgs/arrow up.png" ?><!--" title='move up' onclick="fs( 'arrow-up' )"  />-->
             <img
                 onclick="fs( 'arrow-up' )"
                 id="scroll-top-button"
                 class="scroll-top-button"
                 src="fs_folders/images/details/top-button.png"
                 onmousemove=" mousein_change_button ( '#scroll-top-button' , 'fs_folders/images/details/top-button_mouse_over.png' )"
                 onmouseout="mouseout_change_button (  '#scroll-top-button'  , 'fs_folders/images/details/top-button.png' )"
                 />

         </div>
	</div>


<?php endif; ?>


<link rel="stylesheet" type="text/css" href="fs_folders/gen_css/signout.css" >