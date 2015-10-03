<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	$mc = new myclass();

	$commentEdited = $_GET['commentEdited'];
	$plcno = $_GET['plcno'];
	$commentType = $_GET['commentType'];






	echo " plcno = $plcno and comment Edited = $commentEdited  <BR> ";

	if ($commentType == 'mainComment') 
	{
		echo "this is main comment ";
		comment_edit_update( $plcno , $commentEdited );	 
	}
	else if ($commentType == 'repliedComment') 
	{
		echo "replied comment";
	}
	 

	






	function comment_edit_update( $plcno , $commentEdited ) { 
		echo "comment_edit_update( $plcno , $commentEdited ) ";

		if ( !empty($commentEdited)) {
			$comUp=update1(
				'posted_looks_comments',
				'msg',
				tcleaner($commentEdited),
				array('plcno',$plcno)
			);

			if ( $comUp ) {
				 echo "main comment successfully updated <br>";
			} 
			else { 
				echo "main comment failledd to update <br>";
			}
			

		}
		


	}
?>