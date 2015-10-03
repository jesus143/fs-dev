<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");

	$mc = new myclass();
	$date_time=$mc->date_difference();

	$comment=str_replace('\'',"\"", $_GET["rcomment"]);
	$plcno=$_GET["plcno"];
	$mno=$_SESSION["mno"];

	if (strlen($comment)>0) {
		insert(
			'fs_plcm_reply',
			array('plcno','mno','plcr_date','plcr_message'),
			array($plcno,$_SESSION['mno'],$date_time['date_time'],tcleaner($comment)),
			'plcr_no'
		);
		echo "<span style='color:green'> reply succesfully post comment </span>";
	}else  { 
		echo " <span  style='color:red' > reply failled to post comment </span>" ;
	}
	require ("replyDesign.php");
?>	
 


<li> 
	<?php 
	echo "$comment";
	?>

</li>
