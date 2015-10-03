<?php session_start() ?>
<?php require ("connect.php"); ?>
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
	<head><title>View ADD's</title></head>
</html>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<style type="text/css">

		body  { background-color:  #ffffff; }
		.head {
			background-color: #000;
			height: 50px;
		}	
		.head a { 
			color: white;
			float: right;
			padding: 20px;

		}
		.body table{
				width:100%;border-collapse:collapse;
				border:1px solid #000;

		}
		a{
			text-decoration: none;
		}
		.border , .img_res {
			border: 1px solid #000;
		}
		.pages{
			/*float: left;*/
		}
		.img{
			width: 180px;
			height: 180px;
		}
		.delete{
			/*text-align: center;*/
			background-color: red;
			border: 2px solid #ccc;
			border-radius: 5px;

		}
		.delete:hover { 
			background-color: red;
			border: 2px solid #ffffff;
			border-radius: 5px;
 
			cursor: pointer;
		}
		.t td{
			background-color: #000;
			/*border: 1px solid #ccc;*/
		}
		.t td p{ 
			color: #ccc;
			font-size: 12px;
		}
		.succesfully_Deleted{
			background-color: #ccc;
			color: green;
			height: 20px;
			font-style: italic;
			/*padding: 1px;*/
			padding-top: 5px;
			padding-bottom: 25px;
		}
	</style>
</head>
	<body>
	<script type="text/javascript">
		function name(jesus){
			alert(jesus);
		}
		function deletes(name){
			var b =confirm('Are you sure to delete the posted look of '+name+'?');
			if (b) {
				return true;
			}else{
				return false;
			}
		}
	</script>
		<center>
			<div style="text-align:center;width:1009px; border:1px solid #000" >
				<?php include("menu.php");   ?>

					</center>

					<div class="pages" style="padding:20px;border:1px solid #000;">
					</div>


					<br>
			  		<?php require("../../footer.php"); ?>
			  	</div>
		 	</div>
	 	</center>



	</body>
</html>





