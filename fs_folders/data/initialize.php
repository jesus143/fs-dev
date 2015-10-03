<?php 
	require("data.php");

	$dc = new data_class ();



	$type = $_GET['type'];

		
	if ($type == "occupation") 
	{
		$dc->invite_occupation();	 
	}
	else if ($type == "style") 
	{ 
		$dc->invite_style();
	}


	
	
	
	

?>