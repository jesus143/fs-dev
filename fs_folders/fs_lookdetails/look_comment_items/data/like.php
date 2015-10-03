<?php 
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	// require ("../../connect.php");
	// require ("../../function.php");
	// require ("../../library.php");
	// require ("../../source.php");
	// require ("../../myclass.php");
	$mc = new myclass();
 


 

 
	init($_SESSION['mno'],$_GET['plcno']);

	
	function init($mno,$plcno) {
		$ldeleted = delete_my_dislike($mno,$plcno);
		if ($ldeleted) {
			insert_my_like($mno,$plcno);	 
		}
	}


	function delete_my_dislike($mno,$plcno){ 
		 $deleted=delete(
		  		'fs_plcm_dislike',
		  		array('plcno',$plcno,'mno',$mno)
		  );
		  return $deleted;
	}
	function insert_my_like($mno,$plcno){ 
		if (!select_w_2('posted_looks_comments_like_dislike',1,array('plcno',$plcno,'mno',$mno),'and') ) { 
			insert('posted_looks_comments_like_dislike',array('plcno','mno'),array($plcno,$mno),'plcldno');						
		}
	}














// insert_new_like($_GET['comment_id']);
	



	// function add_new_like(){  

	// $plcno=intval($_GET['comment_id']);

 // 	// echo " plcno = $plcno ";
	 

	// if ($_GET['click_like'] == 1) {

	// 	 if ($_SESSION["I_liked_$plcno"]=='not_liked') {
	// 	 	$tlike=$_SESSION["total_like_$plcno"];
	// 	 	$add_your_like = $tlike+1;
		  
	// 	 // 	$_SESSION["total_like_$plcno"]+=1;	 
	// 	 // 	$_SESSION["I_liked_$plcno"]=='liked';

	// 	 	// echo "if I liked = ".$_SESSION["I_liked_$plcno"].'<br>';
	// 	 }else { 
	// 	 	// echo "else liked ".$_SESSION["I_liked_$plcno"].'<br>';
	// 	 	$add_your_like=$_SESSION["total_like_$plcno"];
	// 	 	// echo "total like ".$_SESSION["total_like_$plcno"].'<br>';
	// 	 	// echo "total like ";
	// 	 }

	// }
	// else  { 
	// 	if ($_SESSION["I_liked_$plcno"]=='not_liked') {
	// 		$add_your_like=$_SESSION["total_like_$plcno"]+1;
	// 	}else { 
	// 		$add_your_like=$_SESSION["total_like_$plcno"];
	// 	}
	// }


	// echo "you liked ( $add_your_like )";
	// $add_your_like=0;
	// // echo "you like this comment";
	//  // like_dislikess();



	// // echo "comment id = ".$_GET['comment_id'].'<br>';
	// }
	

	// function delete_dislike($plcno){ 
	// 	// echo " post look comment number = ".$plcno.'<br>';
	// }

	// // delete dislike
	// // update dislike result ajax

	// function insert_new_like($plcno){ 
	// 	// echo "plc id = $plcno <br>";
	// 	if (!select_w_2('posted_looks_comments_like_dislike',1,array('plcno',$plcno,'mno',$_SESSION['mno']),'and') ) { 
	// 		insert('posted_looks_comments_like_dislike',array('plcno','mno'),array($plcno,$_SESSION['mno']),'plcldno');						
	// 		// $total_like=select('posted_looks_comments_like_dislike',3,array('plcno',$plcno));
	// 		/* count_total_like($total_like); */
	// 		// echo "Sucesfully like the comment ";
	// 	}else{
	// 		// $total_like=select('posted_looks_comments_like_dislike',3,array('plcno',$plcno));
	// 		/* count_total_like($total_like); */
	// 	}

	// }

	// // insert new like
	// // update like result ajax






















?>