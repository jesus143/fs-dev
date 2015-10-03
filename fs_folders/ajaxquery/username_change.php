<?php 
	session_start();
	require("connect.php");
	include("../function.php");
	include("../source.php");













	 
	echo "you id is = $_SESSION[mno]<br>";

	echo "last username = ".get_my_username($_SESSION["mno"])."<br>";


	echo "new username requested is =  $_GET[newun] <br>";
	change_username(); 







?>