 
<?php 

	$i = $_GET['i']; 
	$tn = $_GET['tn']; 
 	

 	switch ( $tn ) {
 		case 'fs_postedarticles':
 			 	$src = "fs_folders/images/uploads/posted articles/detail/$i.jpg";
 			break; 
 		default:
 				$src = "fs_folders/images/uploads/posted%20looks/lookdetails/$i.jpg";
 			break;
 	}
?>
<center>
	<img src='<?php echo $src;  ?>' />
</center>