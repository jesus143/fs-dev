 <?php
	require("connect.php");
	$q="update postedlooks set 
		brand='".$_GET['bra']."',
		garment='".$_GET['gar']."',
		pattern='".$_GET['pat']."',
		colors='".$_GET['col']."',
		style='".$_GET['sty']."',
		occasion='".$_GET['occ']."',
		material='".$_GET['mat']."',
		season='".$_GET['sea']."' where plno=".$_GET['id']."
		";
	$ex=mysql_query($q) or die(mysql_error());
	echo"1";
 ?>
 
 
 
 