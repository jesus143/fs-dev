<?php 
	session_start();
	require ("../../connect.php");
	require ("../../function.php");
	require ("../../library.php");
	require ("../../source.php");
	require ("../../myclass.php");
	$mc = new myclass();
	insert_flagged_info();
	

	function insert_flagged_info() {  
		
		$plcno = $_GET['plcno'];
		$cboxes = $_GET['cboxes'];
		$mno = $_SESSION['mno'];
		$flag_date = date("Y-m-d h:m:s");
		$flag_option = $_GET['cbox'];
		$flag_note = $_GET['flag_note'];

		insert(
			'fs_cflag',
			array('mno','plcno','flag_option','flag_note','flag_date'),
			array($mno,$plcno,$flag_option,tcleaner($flag_note),$flag_date),
			'flagno'
		);	
	}
	








?>