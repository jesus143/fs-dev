<?php 
	session_start();
	require ("../../connect.php");
	require ("../../function.php");
	require ("../../library.php");
	require ("../../source.php");
	require ("../../myclass.php");
	$mc = new myclass();




	// echo "you like this comment";
	 like_dislike();



	// function like_dislikes(){
	// 	if (!empty($_SESSION['mno'])) {
	// 		if (empty($_GET['unlike'])) {
	// 			$total_like=select('posted_looks_comments_like_dislike',3,array('plcno',$_GET['id']));
	// 			if (!select_w_2('posted_looks_comments_like_dislike',1,array('plcno',$_GET['id'],'mno',$_SESSION['mno']),'and') ) { 
	// 				insert('posted_looks_comments_like_dislike',array('plcno','mno'),array($_GET['id'],$_SESSION['mno']),'plcldno');						
	// 				count_total_like($total_like);
	// 				// echo "Sucesfully like the comment ";
	// 			}else{
	// 				count_total_like($total_like);
	// 			}
	// 		}else{
	// 			delete_w_2('posted_looks_comments_like_dislike',array('plcno',$_GET['unlike'],'mno',$_SESSION['mno']),'and');
	// 			 // echo "Sucesfully unlike the comment";
	// 			$total_like=select('posted_looks_comments_like_dislike',3,array('plcno',$_GET['unlike']));
	// 			count_total_like($total_like);
	// 		}
	// 	}
	// }
?>