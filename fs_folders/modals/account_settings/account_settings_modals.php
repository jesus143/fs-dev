<?php 
  	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php"); 
    require ("../../../fs_folders/php_functions/myclass.php");

	$mc = new myclass();  
    $mc->auto_detect_path();
    $facebook = $mc->fb_init('../../API/facebook-php-sdk-master/src/facebook.php');

    $_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
    $mno    = $_SESSION['mno'];     
    $mno1   = ( !empty($_GET['mno1']) ) ? intval($_GET['mno1']) : "" ;    
    $spnp   = ( !empty($_GET['select_page_next_prev']) ) ? intval($_GET['select_page_next_prev']) : "" ;  
    $action = (!empty($_GET['action']) ) ?  $_GET['action'] : "" ;  
    $account_seettings_tab = $_GET['account_seettings_tab'];  
    echo " mno = $mno and mno1 = $mno1 <br>";
 
    /**
    * created: jan 22 , 2014
    * by jesus erwin suarezs
    */ 
    class account_settings extends account_settings_codes {
    	function __construct( ) { 
    	}
    	public function account_settings_brand_next_page( $spnp , $mc , $brand_selected , $all_brands ) {
    		// $mc->auto_detect_path();  
    		$c=0; 
    		$x = $spnp; 
    		$tres = 15;     
    		if ( $x == 1 ) {
				$end = $x*$tres; 
				$start = $end - $tres;
    		}else{
    			$end = $x*$tres;
				$start = $end - $tres; 
    		}  
    		echo "<table border='0' cellspacing='0' cellspadding='0'> 
    			<tr>
    		";  
				for ($i=$start; $i < $end ; $i++) {   

                    if ($i  < count($all_brands) ) {
                             
                        $bno = $all_brands[$i]['bno'];
                        $bname = $retVal = ( !empty( $all_brands[$i]['bname']) ) ?  $all_brands[$i]['bname'] : 'Name not available' ; 
    					$c++;  
    				    $brand_style = $mc->get_brand_style_as_selected_or_not( $brand_selected , $bno );   
                         

                        if ( file_exists("../../../$mc->brand/$bno.png") ) {
                            echo " 
                                <td> 

                                    <div>
                                        <img id='brand$bno' class='brandDefault'   src='$mc->brand/$bno.png' onclick='select_brand(\"$bno\")' style='$brand_style'  > 
                                    </div>
                                    <div style='padding-top:10px;' >
                                        $bname
                                    </div>
                                </td> 
                            "; 
                        }
                        else{
                            echo " 
                                <td>
                                    <div> 
                                        <img id='brand$bno' class='brandDefault'   src='$mc->brand/default.jpg' onclick='select_brand(\"$bno\")' style='$brand_style'  > 
                                    </div>
                                    <div style='padding-top:10px;' >
                                        $bname
                                    </div>
                                </td> 
                            ";  
                        }




    					if ( $c%5==0) {
    						echo "<tr>";
    					}   
                    }


				} 
			echo " </table>";
    	}
        public function account_settings_suggested_member_next_prev( $spnp , $mno , $members , $mc ) {  
            $x = $spnp; 
            $tres = 5;  
            if ( $x == 1 ) {
                $end = $x*$tres; 
                $start = $end - $tres;
            }else{
                $end = $x*$tres;
                $start = $end - $tres; 
            }     ?> 
            <table border="0" cellpadding="0" cellspacing="0" >
                <tr><?php 
                    for ($i=$start; $i < $end ; $i++) { 
                        if ($i  < count($members) ) {  
                            $mno1 = $members[$i]['mno']; 
                            $followed = $mc->check_if_already_followed( $mno , $mno1 );
                            $fullname = $mc->get_full_name_by_id( $mno1 ); ?>
                            <td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
                                    <tr>  
                                        <td style="width:80px" >  
                                            <?php 
                                                if ( file_exists("../../../$mc->ppic_thumbnail/$mno1.jpg")) {
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
                                        <td style="width:500px;  padding-left:20px;"> 
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
                            </td> <tr><?php 
                        } //if 
                    } //loop 
                    ?> 
            </table>  
                <?php
        } 
        public function account_settings_suggested_member_follow( $mno , $mno1 , $action , $mc ) {   


           

            $mc->date_difference();     
            if ( $action == 'follow' ){   
                $followed = selectV1($select='*', 'fs_follow' , array('mno'=>$mno,'operand1'=>'and','mno1'=>$mno1)  );
                if ( empty($followed ) ) {
                        
                        insert(
                            "fs_follow", 
                            array( 
                                'mno' , 
                                'mno1',
                                'followtime'
                            ), 
                            array( 
                                $mno , 
                                $mno1 ,    
                                $mc->date_time 
                            ),
                            'flno'
                        );   

                    
                        // POST THE FOLLOWING MODAL TO THE ACTIVITY WALL 
                        $mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
                        $mc->follow_un_follow_activity_wall_post(  $mno , $mppno , 'Following' , 'fs_member_profile_pic' , $mc->date_time , 'follow' );   
                        // wala pa ni nahuman . mao ni ang tiwasonon nga code.
                        $mc->following_follower_add_subtract( $mno , $mno1 , $action ); 
                        $tfollowing = $this->get_total_following( $mno );
                        $new_tfollowing = $this->add_following( $tfollowing );  
                        $tfollower = $this->get_total_follower( $mno1 ); 
                        $new_tfollower = $this->add_follower( $tfollower );  
                        $this->update_following( $new_tfollowing , $mno  );
                        $this->update_follower( $new_tfollower , $mno1 );  
                      
 
                        $mc->update_user_follower_and_following( $mno , $mno1 );    
 
                        // $mc->set_notification_info( 'fs_members' , $mno1 , "started following you" , $mno1 , 0 ,  'following' );   
 
                        $mc->set_notification_info( 'fs_members' , $mno1 , "started following you" , null , null , 0 , 'following' );  
 
                }else{
                    echo "already followed";
                }
            }else if( $action == 'unfollow' ){  

                $q=mysql_query("DELETE FROM fs_follow WHERE mno=$mno and mno1=$mno1" ); 

                if ( $q ) { 

                     
                        // POST THE FOLLOWING MODAL TO THE ACTIVITY WALL

                        $mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
                        $mc->follow_un_follow_activity_wall_post(  $mno , $mppno , 'Following' , 'fs_member_profile_pic' , $mc->date_time , 'un-follow' );
                  
                    

                    echo " succesfully unfollowed ";   

                    /*
                        $tfollowing = $this->get_total_following( $mno );
                        $new_tfollowing = $this->subtract_following( $tfollowing ); 


                        $tfollower = $this->get_total_follower( $mno1 ); 
                        $new_tfollower = $this->subtract_follower( $tfollower );


                        $this->update_following( $new_tfollowing , $mno  );
                        $this->update_follower( $new_tfollower , $mno1 );
                    */

                        $mc->update_user_follower_and_following( $mno , $mno1 );  



                    // echo " total follower $tfollower new $new_tfollower following $tfollowing new $new_tfollowing <br>";
                }else{ 
                    echo " failled unfollowed "; 
                } 
            }
        }
        public function print_fb_freinds_on_fs( $spnp , $mc , $mno )  { ?> 
            <table border="0" cellpadding="0" cellspacing="0" >
                <tr>
                <?php 
                    $mc->auto_detect_path();
                    $c=0; 
                    $x = $spnp; 
                    $tres = 5;   
                    if ( $x == 1 ) {
                        $end = $x*$tres;
                        $start = $end - $tres;
                    }else{
                        $end = $x*$tres;
                        $start = $end - $tres; 
                    }   

                    $fb_friends_on_fs = $mc->get_fb_freinds_on_fs($mno,"-+-"); 
                    $fb_friends_on_fs_len = count($fb_friends_on_fs)-1;  

                    for ($i=$start; $i < $end ; $i++) { 
                        if ($i  < $fb_friends_on_fs_len ) {  
                            $mno1 = $fb_friends_on_fs[$i]; 
                            $followed = $mc->check_if_already_followed( $mno , $mno1 );
                            $fullname = $mc->get_full_name_by_id( $mno1 ); 
                            ?>
                            <td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
                                    <tr> 
                                        <td style="width:80px" >  
                                            <?php 
                                                if ( file_exists("../../../$mc->ppic_thumbnail/$mno1.jpg")) {
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
                            </td> <tr><?php 
                        }
                    } ?> 
            </table>





            <?php 
        }
        public function print_fb_freinds_on_fb( $spnp , $mc , $mno , $facebook )  {  ?>
            <table border="0" cellpadding="0" cellspacing="0" >
                <tr><?php  

                    $mc->auto_detect_path();
                    $c=0; 
                    $x = $spnp; 
                    $tres = 5;   
                    if ( $x == 1 ) {
                        $end = $x*$tres;
                        $start = $end - $tres;
                    }else{
                        $end = $x*$tres;
                        $start = $end - $tres; 
                    }    
                    $freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-", $start , $end ); 
                    $fb_freinds_on_fb_len = $freinds_on_fb['fb_freinds_on_fb_len'];  ; 



                    echo " total res  $fb_freinds_on_fb_len <br>";
                    $fb_freinds_on_fb     = $freinds_on_fb['fb_freinds_on_fb'];  




                    // for ($i=0; $i < $fb_freinds_on_fb_len_limit ; $i++) {   
                        for ($i=$start; $i < $end ; $i++) { 
                            if ($i  < $fb_freinds_on_fb_len ) {  
                                $fbfid =  $fb_freinds_on_fb[$i]['fbfid'];   
                                $fbfname =  $mc->get_facebook_user_info_by_fbid( $facebook , $fbfid );
                            ?>
                            <td style="padding-top:20px; padding-bottom:10px;border:none; border-bottom:1px solid #ccc;" >  
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
                                    <tr> 
                                        <td style="width:80px"  >  
                                            <?php 
                                                // change to fb profile pic 
                                                echo "<a href='https://www.facebook.com/$fbfid' target='_blank' >
                                                    <img src='https://graph.facebook.com/$fbfid/picture' style='cursor:pointer; width:60px;height:60px;' />
                                                </a>";   
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
                                                        <img id='suggested-member-follow-image$fbfid'  class='suggested-member-invite'  src='$mc->genImgs/fb-invite.png'  onclick='invite(\"$fbfid\")'  style='cursor:pointer; float:right' /> 
                                                    "; 
                                                ?>  
                                                </td>    
                                            </table>
                                        </td> 
                                </table>  
                            </td> <tr> 
                            <?php 
                        }
                    } ?> 
            </table> 
            <?php 
        } 
    } 
    class account_settings_codes  {  
 
        public function get_total_follower( $mno  ) { 
            $userinfo = selectV1('*', 'fs_members' , array('mno'=>$mno)  ); 
            return $userinfo[0]['tfollower'];  
        }  
        public function get_total_following( $mno  ) { 


            $userinfo = selectV1('*', 'fs_members' , array('mno'=>$mno)  ); 
            return $userinfo[0]['tfollowing'];   
        }    
        public function add_follower( $tfollower ) {
            $tfollower++;
            return $tfollower;
        }
        public function add_following( $tfollowing ) {
            $tfollowing++;
            return $tfollowing;
        }  
        public function subtract_follower( $tfollower ) {
            $tfollower--;
            return $tfollower;
        }
        public function subtract_following( $tfollowing ) {
            $tfollowing--;
            return $tfollowing;
        }  
        public function update_following( $tfollowing , $mno) { 
            update1('fs_members','tfollowing',$tfollowing,array('mno',$mno)); 
        }
        public function update_follower( $tfollower , $mno) {
            update1('fs_members','tfollower',$tfollower,array('mno',$mno)); 
        } 
    }


      







 
   	$ac = new account_settings(); 
    if ( $account_seettings_tab == 'account-settings-brand' ) { 
        $brand_selected =   $mc->retreive_specific_user_brand_selected( $mno , 'order by bmsno desc' ); 
        $all_brands     =   $mc->get_all_brand( 1000 ); 
        $ac->account_settings_brand_next_page( $spnp , $mc , $brand_selected , $all_brands );
    }else if( $account_seettings_tab == 'account-settings-suggested-member-follow' ){  

        $ac->account_settings_suggested_member_follow( $mno , $mno1 , $action , new myclass());
    }else if( $account_seettings_tab == 'account-settings-suggested-member' ){  
        $members = $mc->get_all_user( 900 ); 
        $ac->account_settings_suggested_member_next_prev( $spnp , $mno , $members , $mc ); 
    }else if( $account_seettings_tab == 'account-invitefriends-fb-friends-on-fs' ) {  

        $ac->print_fb_freinds_on_fs( $spnp , $mc , $mno ); 
        
    }else if( $account_seettings_tab == 'account-invitefriends-fb-friends-on-fb' ) { 

        $ac->print_fb_freinds_on_fb( $spnp , $mc , $mno , $facebook );
    }else{ 

        echo "this is not a account settings tab";
    }
   	


    



















?>