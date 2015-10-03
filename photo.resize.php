<?php  
	session_start();
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php"); 
	require("fs_folders/php_functions/source.php");  

	// include 'fs_folders/php_functions/Database/Database.php'; 


    $database = new database();
	$database->connect();


	$mc = new myclass();    
	$pa = new postarticle ( );  

	$imagResize = new  resizeImage();
	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  

    echo " <div id='fs-general-ajax-response' style='color:#fff;position:fixed;background-color:#000;z-index:200;display:none; height:700px; overflow:auto' >  ";


    $lastpagevisited =   ( !empty($_SESSION['lastpagevisited']) ) ? $_SESSION['lastpagevisited'] : '/' ;  

	$type = ( !empty($_GET['type']) ) ? $_GET['type'] : null ;




	switch ( $type ) {
		case 'profile-pic':
				echo " profile pic <br>";  
				$mppno = $mc ->member_profile_pic_change( $mno ); 

				// $mc->resize_profile_pic_thumbnail_and_profile( $mno , $mppno );     

				$response = $mc->resize_image( 
				  	array( 
					    'id' =>$table_id,
					    'source' => "$mc->ppic_orginal/$mno.jpg",
					    'destination1' => "$mc->ppic_profile/$mppno.jpg",
					    'destination2' => "$mc->ppic_thumbnail/$mppno.jpg",
					    'width1' => 420,
					    'width2' => 170 
				  	)  
				);    

				// $mc->set_notification_info( 'fs_members' , $mno , null  ,  null , 0 , 'change-profile' );     
				// $mc->set_session_notification( $mno , 'fs_member_profile_pic' , $mppno , 'updated' , null , null , 'change-profile' , 0 );   
				$mc->set_notification_info( 'fs_member_profile_pic' ,  $mppno , null , null , null , 0 ,  'change-profile' );  
				//$mc->go( $mc->get_username_by_mno( $mno ) );
            $mc->go( 'home' );

			break;
        case 'profile-pic-welcome':
                echo " profile pic <br>";
                $mppno = $mc ->member_profile_pic_change( $mno );

                // $mc->resize_profile_pic_thumbnail_and_profile( $mno , $mppno );

                $response = $mc->resize_image(
                    array(
                        'id' =>$table_id,
                        'source' => "$mc->ppic_orginal/$mno.jpg",
                        'destination1' => "$mc->ppic_profile/$mppno.jpg",
                        'destination2' => "$mc->ppic_thumbnail/$mppno.jpg",
                        'width1' => 420,
                        'width2' => 170
                    )
                );

                // $mc->set_notification_info( 'fs_members' , $mno , null  ,  null , 0 , 'change-profile' );
                // $mc->set_session_notification( $mno , 'fs_member_profile_pic' , $mppno , 'updated' , null , null , 'change-profile' , 0 );
                $mc->set_notification_info( 'fs_member_profile_pic' ,  $mppno , null , null , null , 0 ,  'change-profile' );
                 //$mc->go( 'home' );
                 $mc->go( $mc->get_username_by_mno( $mno ) );
                // $mc->go( $mc->get_username_by_mno( $mno ) );
            break;
		case 'profile-timeline':  
			    $mptno = $mc->member_profile_timeline_query( array('mno'=>$mno , 'action'=> 'Update Timeline' , 'type'=>'insert-new-profile-pic-db' ) );
			    $mc->resize_profile_timeline( $mno , $mptno );    
			    $username =$mc->get_username_by_mno( $mno );
			    echo " profile time line cropped <br>"; 	 
				// $mc->set_notification_info( 'fs_member_timeline' , $mptno , null  ,  null , 0 , 'change-profile-cover-photo' ); 
				// $mc->set_session_notification( $mno , 'fs_member_timeline' , $mptno , 'updated' , null , null , 'change-profile-cover-photo' , 0 );    
				$mc->set_notification_info( 'fs_member_timeline' ,  $mptno , null , null , null , 0 ,  'change-profile-cover-photo' );  
				// $this->set_notification_info( $table_name , $table_id , $action , $action1 , $action2 , $status , $noti_type=null  ) 
				$mc->go("$username"); 
			break;
		case 'posted-look': 
				$plno = $mc->postedlook_query( array('mno' =>$mno , 'type'=>'get-latest-plno' ) ); 
				$mc->resize_posted_look( $plno , $mc->look_folder_cropped  );    

				$mc->go("post-look-label?type=cropped"); 
				echo " posted looks <br> ";  

			break;   
		case 'upload-article-and-resize':
			 
            echo " This is the file name " . $_POST['file_name'];

            $fileName = ( !empty($_POST['fileName']) ) ? $_POST['fileName'] : null ;
            $fileUrl  = ( !empty($_POST['fileUrl']) )  ? $_POST['fileUrl'] : null ; 

		  		// echo " upload new article image and resize to thumbnail , home and so on. . .";  

		  		/** get latest article uploaded  */

		  		$response = $mc->fs_postedarticles( 
		  		 	array(  
		  			 	'aticle_type'=> 'select', 
		  		 		"where mno = $mno"
		  		 	)  
		  		);  

 				$mc->print_r1( $response ); 
 				$artno = $response[0]['artno'];  
 				$type = $response[0]['type'];  
 				/*
 				$id = $artno;  

 				/** get post attribute */
				/*
 				$dataDb = $database->selectV1('fs_post_attribute', '*', "table_id = $id"); 
 				print_r($dataDb); 
 				$file_name = $dataDb[0]['file_name'];
 				$slug = $dataDb[0]['slug'];
 				$id = $dataDb[0]['id'];

 				/** compose the file name */
				/*
				$file_name = $id . '-' . $file_name; 

				echo " file name $file_name <br> "; 

				/** update filename */ 
 					/*
				$database->update('fs_post_attribute', array('file_name'=>$file_name), "$id = $id" );
			 
				*/

	 			/** upload new image for article  */


	 				echo " video id " . $_SESSION['video_id'] . '<br>';


 					// if ( $_SESSION['type'] == 'video' ):   
	 					if ($type == 'video'): 

	 						echo "type is empty <br>";

 							$video_id = str_replace(' ','', $_SESSION['video_id']);  
 							if ( $_SESSION['url'] == 'youtube' ): 

 								#remove the last space of the id 
 									# online 
 										// $video_id = substr($video_id,0,strlen($video_id)-1); 
 									#local
 										// $video_id = substr($video_id,0,strlen($video_id)-2);  

 									echo " before basename $video_id <br>";
 									 // $video_id = basename($video_id).PHP_EOL;
 									 // echo "after basename ".$video_id.'<br>';


 									// $video_id = explode('?', $video_id );

 									// echo " after exploaded = ".$video_id[0].'<br>';

 								 
 								# remove space 
 									$video_id = $mc->string( array('type' =>'remove-space' , 'string'=>$video_id ) ); 

 								# assign to the source of the image

 									$src = str_replace(' ','', "http://i4.ytimg.com/vi/$video_id/hqdefault.jpg");

 									 // $src = 'http://i4.ytimg.com/vi/jV67jvvurCg/hqdefault.jpg';


 							endif;

 							echo "<img src='$src' /> ";

 							echo "  $src  <br><BR><Br><br>"; 
 
	 						$pa->download_image_from_other_site( $artno , $src , 'fs_folders/images/uploads/posted articles/detail/' );    
 					else:  				 	
	 					$response = $mc->upload_image(    
	 						array(
	 							"tmp_name" =>$_FILES["file"]["tmp_name"] , 
	 							"destination" =>"$mc->article_detail/$artno.jpg"
	 						)
	 					);	 	 
	 					$mc-> message ( 'image upload ', $response , ' ' ); 
 					endif;
 					echo " video id = $video_id  <br>";

 				/** resize image */

	 				$response = $mc->resize_image( 
					  	array( 
						    'id' =>$artno,
						    'source' => "$mc->article_detail/$artno.jpg",
						    'destination1' => "$mc->article_home/$artno.jpg",
						    'destination2' => "$mc->article_thumbnail/$artno.jpg",
						    'width1' => 300,
						    'width2' => 50 
					  	)  
					);   
	 				$mc-> message ( 'image resize ', $response , ' ' );  

	 			/** update the the file name sulug */ 

	 			// $database->update($table,$params=array(),$where);  
		  		// $mc->article_home
				// $mc->article_thumbnail
				// $mc->article_detail
                //$mc->go( 'article/' . $artno );


                $lastpagevisited = 'http://dev.fashionsponge.com/';
	 		     $mc->go( $lastpagevisited );  	  

		 	break; 
		case 'upload-look-and-resize': 

				// get my new look uploaded 

					$table_id = $mc->posted_modals_postedlooks_Query( 
						array( 
							'postedlooks_query'=>'get-latest-look-uploaded-plno',
							'mno'=>$mno
						)
					);
					 
					echo " table_id $table_id <br> ";








				// upload image 

					$response = $mc->upload_image(    
						array(
							"tmp_name" =>$_FILES["file"]["tmp_name"] , 
							"destination" =>"$mc->look_folder_lookdetails/$table_id.jpg"  
						)
					);	 	 
					$mc-> message ( 'image upload ', $response , ' ' );  

				// resize image 

					$response = $mc->resize_image( 
					  	array( 
						    'id' =>$table_id,
						    'source' => "$mc->look_folder_lookdetails/$table_id.jpg",
						    'destination1' => "$mc->look_folder_home/$table_id.jpg",
						    'destination2' => "$mc->look_folder_thumbnail/$table_id.jpg",
						    'width1' => 400,
						    'width2' => 50 
					  	)  
					);   
					$mc-> message ( 'image resize ', $response , ' ' ); 
					$mc->go( "lookdetails-dev.php?id=$table_id" );  
			break;
		case 'upload-look-modal-original-for-cropping':
				//this is redirect to crop

					// get my new look uploaded  
					$table_id = $mc->posted_modals_postedlooks_Query( 
						array( 
							'postedlooks_query'=>'get-latest-look-uploaded-plno',
							'mno'=>$mno
						)
					);  
					echo " table_id $table_id <br> ";

					// upload image  
					$response = $mc->upload_image(    
						array(
							"tmp_name" =>$_FILES["file"]["tmp_name"] , 
							"destination" =>"$mc->look_folder/$table_id.jpg"  
						)
					);	 	 
					$mc-> message ( 'image upload ', $response , ' ' );   
 
					// $mc->go( "post-look-crop-rotate?id=$table_id" ); 
					$mc->go("post-look-crop-rotate"); 

			break; 
		default:
			echo " default <br> ";
			break;
	} 
    echo " </div> "; 
	// $this->set_session_notification( $mno , 'fs_member_profile_pic' , $mppno , 'updated' , null , null , 'change-profile' , 0 );   	

    ?>


