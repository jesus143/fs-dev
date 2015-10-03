<?php
	require("connect.php");
	$ex=mysql_query("select brand from pltags where brand like '".$_GET['val']."%' group by brand") or die(mysql_error());
	while($r=mysql_fetch_array($ex)){
		if($vals=="")
			$vals=$r[0];
		else
			$vals=$vals."#@#".$r[0];
	}
	echo $vals;
?>