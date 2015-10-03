<?php  
	require("../../../php_functions/connect.php");
	require("../../../php_functions/function.php");
	require("../../../php_functions/myclass.php");
	require("../../../php_functions/library.php");
	require("../../../php_functions/source.php");
	$mc = new myclass(); 

	$plno = intval($_GET['plno']); 
	
	// $mc->test();
	$mc->fs_delete_data( $plno , "fs_look" );

	$filepath = 'fs_folders/admin/php_file/data/admin_delete.php';

	echo "  
		[ list of tables needs to delete  ] <br> 
		1.)  file path: $filepath<br>
		2.)  activity = _table_id <br>
		3.)  fs_pltag = plno  <br>
		4.)  postedlooks = plno <br>
		5.)  posted_looks_comments = plno <br>
	 	6.)  fs_plcm_reply = plcno <br>
	 	7.)  fs_plcm_dislike = plcno <br>
	 	8.)  fs_plcm_rdislike = plcrno <br>
	 	9.)  fs_plcm_rflag = plcrno <br>
	 	10.) fs_plcm_rlike = plcrno <br> 
		11.) fs_look_votes
		12.) fs_look_votes_details
	 	11.) udpdate total percentage of the look owner <br> 
	 	12.) update total rating owner of the look <br> 
			 where plno = ".$_GET['plno'].'<br>'; 	 

?>