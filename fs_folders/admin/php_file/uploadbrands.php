
<?php 
	if ( isset( $_POST['submit'] )) { 
		if ($_FILES["file"]["error"] > 0) {
	 		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	  	} else  {   
	  		// for ($i=0; $i < 1000 ; $i++) { 
		  	// 	insert(
			  // 		"fs_brands", 
			  // 		array('b_added_date'), 
			  // 		array(date("Y-m-d")),
			  // 		'bno'
			  // 	);
	  		// }

	  		if ( !empty($_GET['updateb']) ) {  
		  		$brandid = $_GET['updateb'];
			}
			else{  
				insert(
			  		"fs_brands", 
			  		array('b_added_date'), 
			  		array(date("Y-m-d")),
			  		'bno'
			  	);  
	  			$brandid = mysql_insert_id(); 
	  		} 
	  		echo " brand id = $brandid ";
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		  	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		  	echo "Stored in: " . $_FILES["file"]["tmp_name"]; 
		  	move_uploaded_file($_FILES["file"]["tmp_name"], "fs_folders/images/uploads/brands/$brandid.png");  
	  	}  
  	}



   	//
  	$brandcategories = $mc-> get_all_brand_category( ); 
  	// print_r($brandcategories);
?> 
<html>  
	<head>  
	</head>
	<body>   
		
		<div  style="margin-left:50px;" id="admin-brand-container" >

            <?php echo $_SESSION['error']; ?>
            <div onclick="viewNow('uploadBrandList','upload-brand-list-view')" style="border:1px solid red; padding:5px;
            background-color: blue; color:white" >
                Upload brand List
            </div>

            <div id="upload-brand-list-view" >
                view here to upload
            </div>


			<div id='brandres'>
				status
			</div>



			<form action="admindashboard?p=uploadbrands" method="post"
			enctype="multipart/form-data">
			<label for="file">Choose brand:</label><br>
			<input type="file" name="file" id="file"><br> 
			<input type="submit" name="submit" value="save new brand">
			</form> 
			<table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #fff;" >
				<tr> 
					<td   > 
						<div style='border:1px solid #000; width:100%;   background-color:green; color:#fff;font-weight:bold; font-size:30px; text-align:center'  > 
							Latest	 
						</div>  
						<?php 
							$mc->print_new_uploaded_brands( 0 );
						?>
					</td>	 
				<tr> 
					<td>  
						<div style='border:1px solid #000; width:100%;  background-color:green; color:#fff;font-weight:bold; font-size:30px; text-align:center'  > 
							male
						</div>
 
						<?php 
							 $mc->print_brands(  $brandcategories , 0); //male 
						?> 
					</td>
				<tr> 
					<td>  	
						<div style='border:1px solid #000; width:100%; background-color:green; color:#fff;font-weight:bold; font-size:30px; text-align:center'  > 
							female
						</div>
						<?php 
							 $mc->print_brands(  $brandcategories , 1); // female
						?>
					</td> 
			</table> 
		</div>
	</body> 
</html>