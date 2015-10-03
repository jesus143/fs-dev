<?php   
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");   
	require ('../../../fs_folders/php_functions/Database/post.php'); 

	$mc = new myclass();   
   	$mc->post = new Post(); 

    // $profile_tab = $_GET["profile_tab"];
    // $mno = $_GET['mno']; 
    // $pagenum = $_GET["pagenum"];
    // $_GET['tres'] = 1; 

    #  pass the current assign modal who will show next     

    $counter_tres=intval($_GET['tres']);//this is next value passed from javascript counter
 
    	 
 	echo "<Br>  <div  onclick=\"$('#fs-general-ajax-response').text('')\" >(x)</div>";

 

    $r       = $mc->get_activity( 200 );   
    $act_len = $mc->get_res_len( $r ); 
    $start   = $mc->get_loop_start( $counter_tres , 25 );  
	$end     = $mc->get_loop_end( $counter_tres , 25 );  
	$counter = $mc->set_loop_counter( 1 );    
	echo " start $start end $end <br>";
	$counter_tres++;//increment the counter

   # add 1 so that when click view more another different modals will show 

    	// $_SESSION['counter']++;
     
  

	for ($i=$start; $i < $end ; $i++) {     
		if ( $i < $act_len  ) {  
 
			$ano 	    = intval($r[$i]['ano']); 
			$mno 	    = intval($r[$i]['mno']);  
			$action 	= $r[$i]['action']; 
			$_table 	= $r[$i]['_table'];  
			$_table_id  = intval($r[$i]['_table_id']); 
			$_date 		= intval($r[$i]['_date']); 
			$active	 	= intval($r[$i]['active']);    
			// echo " tres = $tres ano = $ano mno= $mno  action = $action    _table = $_table   _table_id = $_table_id     _date = $_date    active = $active <br>";     
			
			if ( $_table  == 'fs_members' ) {  
				// $mc->modals_memeber( $ano );
				$mc->modal_version1_member ( $ano , null , '../../../' ); 
			}else if ( $_table  == 'postedlooks' ) {  
				// $mc->modals_look( $_table_id , null , 'home' );   
				// $mc->modals_look( $ano , null , 'home' );	
				$mc->modal_version1_look ( $ano , '../../../' , '../../../' );	
			}else if ( $_table  == 'fs_postedarticles' ){  
				$mc->modal_version1_article ( $ano  , '../../../' , '../../../'  );  
			}else if ( $_table  == 'postedmedia' ){  
			}else if ( $_table  == 'postedads' ){  

			}  
			$counter++; 
		}
	}    




















			// for ($i=$start; $i < $end ; $i++) {   
			// 	if ( $i < $act_len ) { 
					
			// 		$_table 	= $r[$i]['_table']; 
			// 		// $_table_id  = intval($r[$i]['_table_id']);   
			// 		$ano  = intval($r[$i]['ano']);  
				
			// 		if ( $_table  == "postedlooks" ) {
			// 			$mc->modals_look( $ano , $pagenum , 'profile' );			
			// 		}
			// 		if ( $_table  == "fs_members" ) { 
			// 			// member modals  
			// 		 	$mc->modals_memeber( $ano );
			// 		}
			// 		if ( $_table  == "postedarticle" ) {
			// 		 	// article modals
			// 		}
			// 		if ( $_table == "postedmedia" ) {
			// 			// midea modals
			// 		} 	  
			// 	}  
			// }   
	?> 
<div style="display:none" >
	<showmore> 
		<center><div id='more_loading' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </center>   
<!--		<img id='more' style="margin-left:3px;"  src="fs_folders/images/genImg/home-more-button.png" onclick="more_click ( '--><?php //echo $counter_tres; ?>//' )" />

        <img
            id="more"
            style="margin-left:3px;"
            src="fs_folders/images/genImg/home-more-button.png"
            onclick="more_click ( '<?php echo $counter_tres; ?>' )"
            onmousemove=" mousein_change_button ( '#more' , 'fs_folders/images/genImg/home-red-mouse-over.png' )"
            onmouseout="mouseout_change_button (  '#more'  , 'fs_folders/images/genImg/home-more-button.png' ) "
        />


	<showmore> 
</div>