<?php 
	require ("../../php_functions/connect.php");
	require ("../../php_functions/function.php");
	require ("../../php_functions/library.php");
	require ("../../php_functions/source.php");
	require ("../../php_functions/myclass.php");
	require ("data/sortingTest.php");
	require ( "data/comSortFunc.php" );
	

	
	$st = new Sorting ( );

	

	require ( "test_reply.php");

	$plcno = $_GET['plcno'];
	$tableName = 'fs_plcm_reply';
	$select = 'plcr_no';
	$replied_no = 0;
	
	$r = get_first_main_reply(  $select , $tableName , $plcno , $replied_no );
 	
 
	// print_r($r);


	for ($i=0; $i < count($r) ; $i++) { 
		 $plcr_no = $r[$i]['plcr_no'];

		 reply_print( $plcno , $plcr_no  , true , null , null , 'yes' );
		 // $r1 = get_more_replies( $select , $tableName , $plcr_no );
		 // print_sub1_reply( $plcno , $r1 , $select , $tableName);  
	}
	/*
	function print_sub1_reply( $plcno , $r1  , $select , $tableName  )  
	{ 
		echo"<ul>";
		 	for ($j=0; $j < count($r1) ; $j++) { 
		 		$plcr_no = $r1[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print( $plcno , $plcr_no  , true , null , null , 'yes' );
		 		 // $plcno , $plcr_no , $allow_reply , $isMainReply = null , $mno = null , $isReplyIndented = null 
		 		$r2 = get_more_replies( $select , $tableName , $plcr_no );
		 		// print_sub2_reply($plcno , $r2 , $select , $tableName);
		 	}
		echo "	</ul> ";
	}
	
	function print_sub2_reply($plcno , $r2  , $select , $tableName)  
	{ 
		echo"<ul>";
		 	for ($j=0; $j < count($r2) ; $j++) { 
		 		$plcr_no = $r2[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print( $plcno , $plcr_no  , true , null , null , 'yes' );
		 		$r3 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub3_reply($plcno , $r3 , $select , $tableName);

		 	}
		echo "	</ul> ";
	}
	function print_sub3_reply($plcno , $r3  , $select , $tableName)  
	{ 
		echo"<ul>";
		 	for ($j=0; $j < count($r3) ; $j++) { 
		 		$plcr_no = $r3[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print( $plcno , $plcr_no  , true );
		 		$r4 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub4_reply($plcno , $r4 , $select , $tableName);
		 	}
		echo "	</ul> ";
	}
	function print_sub4_reply($plcno , $r4  , $select , $tableName)  
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r4) ; $j++) { 
		 		$plcr_no = $r4[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r5 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub5_reply($plcno , $r5 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub5_reply($plcno , $r5  , $select , $tableName)  
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r5) ; $j++) { 
		 		$plcr_no = $r5[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r6 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub6_reply($plcno , $r6 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub6_reply($plcno , $r6  , $select , $tableName)  
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub7_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub7_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub8_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
 	function print_sub8_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub9_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub9_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub10_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}

	#reply indent right until here


	function print_sub10_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub11_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub11_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub12_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub12_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub13_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}
	function print_sub13_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub14_reply($plcno , $r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}			
	function print_sub14_reply($plcno , $r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub15_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub15_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub16_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub16_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub17_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub17_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub18_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub18_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub19_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub19_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub20_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}		
	function print_sub20_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub21_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}			
	function print_sub21_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , true );
		 		$r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		print_sub22_reply($plcno ,$r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}			
	function print_sub22_reply($plcno ,$r6 , $select , $tableName) 
	{ 
		// echo"<ul>";
		 	for ($j=0; $j < count($r6) ; $j++) { 
		 		$plcr_no = $r6[$j]['plcr_no'];
		 		// echo " <li> $plcr_no </li>";
		 		reply_print($plcno , $plcr_no  , false );
		 		// $r7 = get_more_replies( $select , $tableName , $plcr_no );
		 		// print_sub22_reply($r7 , $select , $tableName);
		 	}
		// echo "	</ul> ";
	}			
	*/
	function get_first_main_reply(  $select , $tableName , $plcno , $replied_no ) 
	{
		// echo " $select $tableName";
		$res = selectV1(
		 	$select,
		 	$tableName,
		 	array('plcno'=>$plcno,'operand1'=>'and','replied_no'=>$replied_no),
		 	'order by plcr_no desc'
		 );
		// print_r($res);
		 return $res;
	}

	function get_more_replies( $select , $tableName , $plcr_no ) 
	{ 
		 $res = selectV1(
		 	$select,
		 	$tableName,
		 	array('replied_no'=>$plcr_no),
		 	'order by plcr_no desc'
		 );

		 return $res;
	}
 	
 	

?>
