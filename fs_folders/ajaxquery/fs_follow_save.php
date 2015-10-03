<?php 
	session_start();
	require("../connect.php");
	require ("../function.php");
	require ("../source.php");

	// echo "you connect to this !! <br>";
	// print_r($_GET['followed']);
	// print_r(br_convert_array($_GET['followed']));
	// echo "Total = ". count(br_convert_array($_GET['followed']));
	// print_r(my_list_followed());
	$flist_follow=remove_fexist(remove_emptyarry(br_convert_array($_GET['followed'])),my_list_followed());
	insert_my_followed($flist_follow);
	// echo "clean array!<br>";
	// echo "total = ".count(remove_emptyarry(br_convert_array($_GET['followed'])));
	// print_r(remove_emptyarry(br_convert_array($_GET['followed'])));


 

?>