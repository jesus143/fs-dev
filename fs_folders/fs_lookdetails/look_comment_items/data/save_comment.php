<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");

	$mc = new myclass();
	$date_time=$mc->date_difference();

	$comment=str_replace('\'',"\"", $_GET["comment"]);
	// $plno=$_GET["plno"];
	$dtime = $date_time['date_time'];
	$mno = $_SESSION['mno'];
	$plno = $_SESSION['plno'];


	// echo "comment was $comment ";

	save_comment( $plno , $mno , $comment , $dtime );




 	 

	function save_comment( $plno , $mno , $comment , $dtime ) {   	 
		if (strlen($comment)>0) {
			insert(
				'posted_looks_comments',
				array('plno','mno','date_','msg'),
				array($plno,$mno,$dtime ,tcleaner($comment)),
				'plcno'
			);
 
			// echo "<span style='color:green'> succesfully post comment </span>";
		}else  { 
			// echo " <span  style='color:red' > failled to post comment </span>" ;
		}
	}

	$posted_comment = true ;
	require ( 'commentDesign.php' );
	// echo " <li> comment design <li> ";
?>	
 

  