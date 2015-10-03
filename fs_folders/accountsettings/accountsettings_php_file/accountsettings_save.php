<?php
    session_start();
	require("../../../fs_folders/php_functions/connect.php");
	require("../../../fs_folders/php_functions/function.php");
	require("../../../fs_folders/php_functions/myclass.php");
	require("../../../fs_folders/php_functions/library.php");
	require("../../../fs_folders/php_functions/source.php"); 
	$mc  = new myclass (); 

	$account_setting_tab  = $_GET['account_setting_tab'];
	$profile_row_name     = $_GET['profile_row_name'];
	$profile_row_name_val = $_GET['profile_row_name_val']; 
	$mno                  = $_SESSION['mno'];



	echo " mno = $mno <br>";

	/**
	* date created: jan 20 ,2014 / 7:49pm
	* by jesus erwin suarez
	*/

	class account_settings extends account_settings_codes { 
		public function __construct( ) {  
		}
		public function account_save_profile( $profile_row_name , $profile_row_name_val , $mno ){



 			$mc  = new myclass ();
            $fullName = '';
            $isName = FALSE;

			echo "   profile_row_name_val =  $profile_row_name_val";
			$prn = explode(',', $profile_row_name);
			$prnv = explode('_new_', $profile_row_name_val);  


			echo " rowname <br> ";
			print_r($prn);

			echo " values <br>";
			print_r($prnv); 

  
 			for ($i=0; $i < count($prn) ; $i++) {

 				#check if exist if its exist then return faild.    
 				$rn = $prn[$i];
 				$rv = $prnv[$i];

 				// $rv = str_replace('Your Firstname','',$rv);
				$rv = str_replace('Your Nickname / Alias','',$rv);
				$rv = str_replace('Your Lastname','',$rv);

                // if update the full name
 				if ( $rn == 'lastname' || $rn == 'firstname' || $rn == 'nickname' || $rn == 'middlename' ) {
                    $rv = ucwords($rv);
                    $isName = TRUE;
                    $fullName .= $rv . ' ';
                }

                //if update the username
 				if ( $rn ==  'username' || $rn == 'email' ) {
 					update1('fs_member_accounts',$rn, $rv,array('mno',$mno) );
 				}else{
 					update1('fs_members',$rn, $rv,array('mno',$mno) );
 				} 
 			}

            // If name is being updated then notify all the followers
            if($isName == TRUE){
                $_SESSION['noti_table_name']   = TRUE;
                $_SESSION['noti_type'] = 'change-name';
                $_SESSION['fullName'] = $fullName;
                $mc->send_notification_to_follower($mno);
                print('send notification to follwers change name');
            } else {
                print('failed to send notification maybe this is not changing name');
            }
 			
            // add or updated keyword
                $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_members' ,   'table_id'=>$mno )  );

		}
	}
	class account_settings_codes { 
		public function __construct( ) { 
		}
	} 
	$ac  = new account_settings(); 
	if ($account_setting_tab == 'profile') { 
 		$ac->account_save_profile( $profile_row_name , $profile_row_name_val , $mno ); 
	}














?>