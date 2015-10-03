<?php  
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
 	require("fs_folders/php_functions/source.php"); 
 	
 	$mc = new myclass();   
	$mc->auto_detect_path(); 
 	$mc->get_visitor_info( "" , "postalook" );  

 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 ); 
 	$mno             =  $mc->get_cookie( 'mno' , 136 );   

	$dateTime = $mc->date_time;  
	$rotate = $_POST['rotate']; 
	$agree = $_POST['agree'];    
	$err="";
	$errors=0;   

	if ( isset($_POST['uploadNow']) ) {  
		$userfile_name = $_FILES['image']['name'];
		list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);  
		$fext = get_file_extension($userfile_name);  
		if ($fext == 'jpg' or $fext == 'jpeg' or $fext == 'png' or $fext == 'PNG'  ) { 
			if($width >= 140 && $height >= 140 ) { 
				if ( $_SESSION['post_a_look_is_look_upload_once_in_db'] == false )  { 
					// $mc->jQuery_text_processing( 'process-container' , 'New image inserted to database..' );
					$_SESSION['post_a_look_is_look_upload_once_in_db'] = true;  
					insert(
						'postedlooks',
						array(
							'mno',
							'date_'
						),
						array( 
							$_SESSION['mno'],
							$dateTime
						),
						'plno'  
					);    
					$lplno = $mc->get_last_id( 'postedlooks' , 'plno' );   
					move_uploaded_file($_FILES["image"]["tmp_name"], "$mc->look_folder/$lplno.jpg");    

				}  
				switch ($rotate) {
					case 'rotate': 
							echo "Please wait ... while redirect crop and rotate a look.."; 
							$mc->go("post-look-crop-rotate"); 
							
						break;  
					default: 
							echo "Please wait ... while redirect to look labelling.."; 
							$mc->go("post-look-label");
						break;
				} 
			}
			else{  
				$err="<br>Look image size must be at least 140 x 140<br><br>";
			}
		}
		else { 
			$err="<br>(Image should be jpeg or jpg extention only )<br><br>";
		} 
	}


?>