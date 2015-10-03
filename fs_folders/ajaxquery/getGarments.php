<?php
	require("connect.php");
	$table=$_GET['tab'];
	$ex=mysql_query("select name from $table where name like '".$_GET['val']."%' group by name") or die(mysql_error());
	while($r=mysql_fetch_array($ex)){
		if($vals=="")
			$vals=$r[0];
		else
			$vals=$vals."#@#".$r[0];
	}
	echo $vals;
?>