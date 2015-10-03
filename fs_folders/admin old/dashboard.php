<?php session_start() ?>
<?php require ('../function.php'); ?>


<?php  
	if (!empty($_GET['logoasdasdawerqv24545rtweradwerqwegq25gw435dwut'])) {
		logout('adm_no');
	}
	if (empty($_SESSION['adm_no'])) {
		// echo "sessiont is empty";
	 // jumps('adminlogin');
		jumps('index.php');
}
?>

<html>
	<head><title>Admin Dashboard</title></head>


	</script>

	<?php?>
	<body>
		<!-- <a href="dashboard.php?logoasdasdawerqv24545rtweradwerqwegq25gw435dwut=ewrqw2fq345fdwsera">LogOut</a><br> -->
		<?php //echo "dashboard!".$_SESSION['adm_no']." here<br>";?>
	</body>

</html>





<!doctype html>
<html class="no-js" lang="en">
<head>
	<style type="text/css">
		.head {
			background-color: #000;
			height: 50px;

		}	
		.head a { 
			color: white;
			float: right;
			padding: 20px;
		}
	</style>
</head>

<body bgcolor="white">
	
	
	<style>
		.body table{
			width:100%;border-collapse:collapse;
			border:1px solid #000;
		}
		a{
			text-decoration: none;
		}
	</style>
	
	<center>
		<div style="text-align:center;width:1009px; border:1px solid #000" >
		
			<?php include("menu.php"); ?>
			<h1>Welcome to the admin dashboard</h1><h4><font color="red">("under construction")<font></h4>
			<div>
			<?php// require_once("../topMenu.php");?>
			<?php//require("../newHeader.php"); ?>
			<div class="border" ></div><br>
			<?php //require("../banner.php"); ?>
			<div style="padding:20px;border:1px solid #000;" ></div>
			<?php //require("../indexNavigations.php"); ?>
			<br>
			
	  		<?php require("../footer.php"); ?>
		  	</div>
	 	</div>
 	</center>
</body>
</html>



