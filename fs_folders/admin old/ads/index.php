<?php session_start() ?>
<?php require ("../connect.php"); ?>
<?php require ('../../function.php'); ?>

<?php  
	if (!empty($_GET['logoasdasdawerqv24545rtweradwerqwegq25gw435dwut'])) 
	{
		logout('adm_no');
	}
	if (empty($_SESSION['adm_no'])) 
	{
		jumps('../index.php');
    }
    if (isset($_POST["submit1"])) 
    {
    	require("img_save.php");
    	if( insert_ads_info($_POST['client_name'],$_POST['company_name'],$_POST['link'], img_get_file_ext( $_FILES["file"]["name"]))) 
    	{ 
			$lastid_as_img_name=get_ads_last_id('ads','order by ano desc');
			move_img_to_folder( "../../images/ads/",$lastid_as_img_name );
    	}
    }
    if (!empty($_POST["del_img"])) 
    {
      	if ( delete('ads',array('ano',img_get_file_name($_POST["del_img"]))) )
      	{
     		 unlink("../../images/ads/$_POST[del_img]");
     	} 
    }
?>
<html>
	<head><title>AD's Panel</title></head>
	<link rel="stylesheet" type="text/css" href="style.css">
</html>
<!doctype html>
<html class="no-js" lang="en">
<?php require("../style.php") ?>
<head>
	<script type="text/javascript">
		function deletes(){
			var b =confirm('are you sure to delete this ad\'s');
			if (b) {
				return true;
			}else{
				return false;
			}
		}
	</script>
</head>
	<body>
		<center>
			<div class="cotainer"  > 
					<?php include("menu.php");   ?>
				 
				<div class="wrapper"  >
					<div class="upload_area">

						<div class="title_upload">
							 <a >Upload adds here </a>
						</div>
						<div class="form">
						    <form action="index.php"  method="POST" enctype="multipart/form-data">
							   <table>
							   	    <!-- <td><input class="a"type="text" name="client_name" placeholder="Client Name "></td><tr>  -->
							   		<td><input type="text" name="company_name" placeholder="Company Name"></td><tr>  
									<td><input type="text" name="link" placeholder="URL"></td><tr>  
								    <td><b><a color="#000" >Image:<a></b><input type="file" name="file" ></td><tr> 
									<td><input type="submit" name = "submit1" value="Save" /></td><tr>
							    </table>
							</form>
						</div>
					</div>
					<div class="uploaded_area_view">
						<table border=0   >
						<?php
						$tr=0;
						$dir = "../../images/ads/";
						 $ads = selectV1($select='*','ads',null,'order by ano desc');
						 
						 		if (!empty($ads)) 
						 		{
						  			for ($i=0; $i < count($ads) ; $i++) 
						  			{ 
								 		$tr++;
								         echo " 
							            		<td>
							            			<a href='www.google.com'><img title='$dir$file' src='../../images/ads/".$ads[$i][0].".".$ads[$i][5]."' width='100px' height='100px'/></a>
							            		</td>

									            <td> 
										            <span id='a'>company:</span>     <span id='a1'>".$ads[$i][3]."</span><br>
										            <span id='a'>website:</span>     <span id='a1'><a href='".$ads[$i][4]." ' target= '_blank'>".$ads[$i][4]." </a> </span><br>
										            <span id='a'>uploaded on:</span> <span id='a1'>".$ads[$i][6]."</span><br>
										            <span id='a'>uploaded on:</span> <span id='a1'><a href='settings.php?id=".$ads[$i][0]."&ext=".$ads[$i][5]."'>settings</a></span><br>
											        <form onsubmit=\"return deletes()\" method='POST' >
														<input  type='hidden' name='del_img' value='".$ads[$i][0].".".$ads[$i][5]."'>
														<input class='delete' title='Do you want to delete this Ads?' type = 'submit' value='delete' />
													</form> 
												</td> 
							                  ";
							       			if ($tr%2==0)
							       			{
							       				  echo"<tr>";
							       			}
									}	
								}
						?>	
						</table>
					</div>
				</div>
			  </div>
		 	<?php //require("../../footer.php"); ?>
	 	</center>
	</body>
</html>





