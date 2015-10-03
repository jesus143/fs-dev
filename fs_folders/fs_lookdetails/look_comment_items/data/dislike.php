<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	$mc = new myclass();



	init($_SESSION['mno'],$_GET['plcno']);

	
	function init($mno,$plcno) {
		$ldeleted = delete_my_like($mno,$plcno);
		if ($ldeleted) {
			insert_my_dislike($mno,$plcno);	 
		}
	}



	



	function delete_my_like($mno,$plcno){ 
		 $deleted=delete(
		  		'posted_looks_comments_like_dislike',
		  		array('plcno',$plcno,'mno',$mno)
		  );
		  return $deleted;
	}
	function insert_my_dislike($mno,$plcno){ 
		if (!select_w_2('fs_plcm_dislike',1,array('plcno',$plcno,'mno',$mno),'and') ) { 
			insert('fs_plcm_dislike',array('plcno','mno'),array($plcno,$mno),'plcmdno');						
		}
	}

?>