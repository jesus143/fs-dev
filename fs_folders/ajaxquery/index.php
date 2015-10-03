<?php
	session_start();
	include("connect.php");
	require ("function.php");
	// $_SESSION['mno']=133;



?>
<?php
	$ex=mysql_query("select * from activity a where action='posted' order by ano desc")or die(mysql_error());
		while($rs=mysql_fetch_array($ex)){
			$f1="images/members/posted looks/".$rs["_table_id"].".jpg";
			$f2="../fs/images/members/posted looks/".$rs["_table_id"].".jpg";
			if(!file_exists($f1) && file_exists($f2)){
				copy($f2,$f1);
			}
			if(!file_exists($f2) && file_exists($f1)){
				copy($f1,$f2);
			}
		}	
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	
	<?php
		require("fb-sdk.php");
	?>	
	
</head>

<body bgcolor="white">
	
	
	<style>
		.body table{
			width:100%;border-collapse:collapse;
		}
	</style>
	
	
<div style="text-align:center;width:100%;" >
	<?php
		require_once("topMenu.php");
	?>
<div onmousemove="getID('accMenu').style.display='none';" class="body" style="text-align:left;width:974px;margin:0 auto; border:1px solid #000;padding:10px;" >
		<br><br><br>
		<?php
			
			require("newHeader.php"); 
		?>
		<div class="border" ></div><br>
		<?php require("banner.php"); 
		?>
		<div style="padding:15px" ></div>

		<style>
			.topLinks td{
				border:2px solid #747474;
				padding:5px;font:15px helveticaBold;
				TEXT-align:center;width:24.8%;cursor:pointer;
			}
			.topLinks a{
				text-decoration:none;
				color:#000;
			}
			.topLinks a:visited{
				color:#000;
			}
		</style>

		<?php
			require("indexNavigations.php");
		?>
		<br>
		
		<?php
			$page="activity";
			// $page="latest";
			if(is_string($_GET["sort"])=="latest" || is_string($_GET["sort"])=="topmembers" || is_string($_GET["sort"])=="toplooks" ){ 
				$page=$_GET["sort"];
				require("$page.php");
			}else{
				require("$page.php");
			}
		?>
		
  <?php require("footer.php"); ?>
  </div>
 </div>
</body>
</html>

		<script>
			getID("a_<?php echo $page; ?>").style.color="red";
			getID("td_<?php echo $page; ?>").style.borderColor="red";
		</script>








