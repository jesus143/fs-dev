<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	$mc = new myclass();







	delete_comment($_GET['plcno']);

 

	function delete_comment( $plcno ) {  
		$deleted=delete(
	  		'posted_looks_comments',
			array('plcno',$plcno)
	    );
	    $deleted=delete(
	  		'posted_looks_comments_like_dislike',
			array('plcno',$plcno)
	    );
	    $deleted=delete(
	  		'fs_plcm_dislike',
			array('plcno',$plcno)
	    );
	     $deleted=delete(
	  		'fs_cflag',
			array('plcno',$plcno) 
	    );


	    $creplies=selectV1(
			'*',
			'fs_plcm_reply',
			array('plcno'=>$plcno) 
		); 

	    // print_r($creplies);
	    if (!empty($creplies) ){  

		    for ($i=0; $i < count($creplies) ; $i++) { 

		    	$plcrno = $creplies[$i]['plcr_no'];
			    $rlike = delete(
			    	'fs_plcm_rlike',
			    	array('plcrno',$plcrno)
			    );
				$rflag = delete(
					'fs_plcm_rflag',
					array('plcrno',$plcrno)
				);
				$reply = delete(
					'fs_plcm_reply',
					array('plcr_no',$plcrno)
				);
				$rdislike = delete(
					'fs_plcm_rdislike',
					array('plcrno',$plcrno)
				);
		    }
		    echo "main comment successfully deleted and ( ".count($creplies)." ) total reply deleted with their specific like , dislike , flagged <br>";
		}

	} 



	$_SESSION['cTblens']=get_total_len_comment($_SESSION['plno']);
?>