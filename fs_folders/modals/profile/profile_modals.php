<?php 
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php"); 

    $mc = new myclass();  
    $profile_tab = $_GET["profile_tab"];
    $mno = $_GET['mno']; 
    $pagenum = $_GET["pagenum"];

	class profile_modals extends profile_modals_codes { 
		public function profile_activity( $mc , $mno , $pagenum ) {   
		    echo"profile_activity mno = $mno pagenum = $pagenum "; 
			// $r = $mc->retreive_specific_user_all_looks(  $mno , "order by plno desc" ); 

			// $r = $mc->retreive_specific_user_all_activities( $mno ,  "order by ano desc"  );

			$r = $mc->get_my_profile_feed_activity( $mno );   
			// print_r($r);
		    // $modals->look( $plno );  
			//    $rlen = count($r); 
			// $end = $pagenum*24;
			// $start = $end-24; 

		    $act_len = $mc->get_res_len( $r ); 
		    $start   = $mc->get_loop_start( $pagenum , 22 );  
			$end     = $mc->get_loop_end( $pagenum , 22 );  
			$counter = $mc->set_loop_counter( 1 );   




 

			for ($i=$start; $i < $end ; $i++) {   
				if ( $i < $act_len ) { 
					
					$_table 	= $r[$i]['_table']; 
					// $_table_id  = intval($r[$i]['_table_id']);  
					$ano  = intval($r[$i]['ano']);  
				
					if ( $_table  == "postedlooks" ) {
						// $mc->modals_look( $ano , $pagenum , 'profile' );	
						$mc->modal_version1_look ( $ano , '../../../');			
					}
					if ( $_table  == "fs_members" || $_table == 'fs_member_profile_pic' ) { 
						// member modals  
					 	// $mc->modals_memeber( $ano );
					 	$mc->modal_version1_member ( $ano ,  null  ,  '../../../' );  
					}
					if ( $_table  == "fs_postedarticles" ) {
					 	$mc->modal_version1_article ( $ano , '../../../');   
					}

					if ( $_table == "postedmedia" ) {
						// midea modals
					} 	  
				}  
			}    
		}
		public function profile_looks( $mc , $mno , $pagenum ) {

		 	echo"profile_looks  mno = $mno"; 	
		}
		public function profile_followers( $mc ,  $mno , $pagenum ) {

		  	echo"profile_followers mno = $mno"; 	
		}
		public function profile_following( $mc , $mno , $pagenum ) {

		  	echo"profile_following mno = $mno"; 	
		}
		public function profile_favorite( $mc , $mno , $pagenum ) {

		  	echo"profile_favorite mno = $mno"; 	
		}
		public function profile_blogs( $mc , $mno , $pagenum ) {

		  	echo"profile_blogs mno = $mno"; 	
		}
		public function profile_media( $mc , $mno , $pagenum ) {

		  	echo"profile_media mno = $mno"; 	
		}
		public function profile_comments( $mc , $mno , $pagenum ) { 

			echo"profile_comments mno = $mno"; 	
		}  
	} 
	class  profile_modals_codes {
	}  
	$pm = new profile_modals (); 
	if ( $profile_tab ==  "profile_activity") {

		$pm->profile_activity(  $mc , $mno , $pagenum ); 
	}else if ( $profile_tab ==  "profile_looks") { 

		$pm->profile_looks( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_followers") { 

		$pm->profile_followers( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_following") { 

		$pm->profile_following( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_favorite") { 

		$pm->profile_favorite( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_blogs") { 

		$pm->profile_blogs( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_media") { 

		$pm->profile_media( $mc , $mno , $pagenum); 
	}else if ( $profile_tab ==  "profile_comments") { 

		$pm->profile_comments( $mc , $mno , $pagenum); 
	} 
?>