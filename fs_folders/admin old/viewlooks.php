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
	<head><title>View Uploaded Looks</title></head>
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
				 
				 <?php 

					if (!empty($_POST['img']) and $_SESSION['plno']!=$_POST['img'] ) {
						echo "
						<div class='succesfully_Deleted' >
							 <p>Posted look by ".getname($_POST[img])." successfully  deleted. </p>
						</div>";
						$_SESSION['plno']=$_POST['img'];
					} 
				?>
				 
					<!-- images -->
					<center>
						<div class="img_res" id="img_res">
							<table class=t border=1>

<?php 
								// echo "This is the images = ".$_POST['img'];
								// echo "<h3>tobe deleted post from activity </h3>";
								
								if (empty($_GET["txen"])) {
									$_GET["txen"]=1;
								}

								// echo "NEXT = $_GET[txen]";
								$_GET['txen']=$_GET['txen']-1;
								$start=$_GET['txen']*20;
								$limit=$start-$start+20;
								
								// echo "<br>limit $start , $limit ";
								// echo"<BR>";



								#execute delete
								   delete_from_postedlooks(634);
								  delete_from_postedlooks(393);
								  delete_from_postedlooks(752);
								 //delete_from_postedlooks(791);

								if (!empty($_POST['img'])) {
										$activity_posted_info=select_w_2('activity',6,array('action','Posted','_table_id',$_POST['img']),'and');
	 									//delete_from_activity_action_posted($activity_posted_info[0][1]); //mno
	 									delete_from_activity_action_posted($activity_posted_info[0][4]); //plno
										delete_from_postedlooks($activity_posted_info[0][4]); //plno
										delete_from_postlook_a_look_folder($_POST['img']); //delete in image folder
									}
										$activity_posted=select('activity',6,array('action','Posted'),'order by _table_id desc',array($start,$limit));
										// for ($i=0; $i < count($activity_posted); $i++) { 
										// 	echo $activity_posted[$i][4]."<br>";
										// }
								// echo "total result is = ".count($activity_posted)."<br>";

 								 for ($i=0; $i < count($activity_posted); $i++) { 
 								 	$i1=$i+1;
										echo "
										<td>
											<img title='Owner: ".getname($activity_posted[$i][4])." , Posted on: ".$activity_posted[$i][5]."' class='img' src='../images/members/posted looks/".$activity_posted[$i][4].".jpg'>
										 
											<table border=0>
												<td>													
													<form onsubmit=\"return deletes('".getname($activity_posted[$i][4])."')\" method='POST' >
														<input style='display:none' type='text' name='img' value='".$activity_posted[$i][4]."'>
														<input class='delete' title='Do you want to delete this look?' type = 'submit' value='delete' />
													</form>
												</td><td><p class=desc>Owner: ".getname($activity_posted[$i][4])." <br>Posted on: ".$activity_posted[$i][5]."</p></td>
												";


											echo "
											</table>
										</td>											
									 ";
									if($i1%5==0){
										echo "<tr>";
									}
								}	

/*
										function getname($plno){ 
								 
											$activity_posted_info=select_w_2('activity',6,array('action','Posted','_table_id',$plno),'and');
											// print_r($activity_posted_info);
											// return $fullname;
											$fs_members_info =select('fs_members',5,array('mno',$activity_posted_info[0][1]));
											// print_r($fs_members_info);
											return $fs_members_info[0][3].' '.$fs_members_info[0][1];
											
										}
									*/
											function delete_from_activity_action_posted($plno) { 
												 if( delete_w_2('activity',array('_table_id',$plno,'action','Posted'),'and') ){
												 	// echo " <br>from activity action posted succesfully deleted! <br>";
												 	
												 }else{
												 	// echo "<br>failled to delete from activity action posted!";
												 }
											 }
											 function delete_from_postedlooks($plno) { 
												 if( delete('postedlooks',array('plno',$plno)) ) {
												 	// echo "<br>postedlooks succesfully deleted!<br>";
												 }else{
												 	// echo "<br>postedlooks failled to delete!<br>";
												 }
											 }
											 function delete_from_postlook_a_look_folder($imagename){
												 if (!empty($imagename)) {
										  			 // echo "$_GET[img] image deleted";
										  		 	  $r=@unlink("../images/members/posted looks/$imagename.jpg"); //delete image
										  		 	 if ($r) {
										  		 	 	// echo "<br>image succesfully deleted from posted look folder!<br>";
										  		 	 }else{
										  		 	 	// echo "<br>failled to delete from posted look folder<br>";
										  		 	 }
												 }
											 }
								?>
							</table>
						</div>
					
					</center>

					<div class="pages" style="padding:20px;border:1px solid #000;">
						<?php 

							get_all_posted_look();




						function get_all_posted_look(){
							$activity_posted=select('activity',6,array('action','Posted') );
							// echo "total posted looks ".count($activity_posted).'<br>';
							return $activity_posted;
						}


						$c=0;
						for ($i=0; $i < count(get_all_posted_look()); $i++) { 
							
							if ($i%20==0) {
								$c++;
								echo " <a href=viewlooks.php?txen=$c>$c</a>";
							}
							
						}



						?>
					</div>
					<br>
			  		<?php require("../footer.php"); ?>
			  	</div>
		 	</div>
	 	</center>



	</body>
</html>





