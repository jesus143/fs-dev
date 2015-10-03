<?php
	/*
	* Date Created : April 07, 2012
	* Created by  : Jesus Erwin Suarez
	* 
	*/        

	interface myInterface  { 
		public function	 set_check_profile_exist( $type , $mno ); 
		public function	 get_loop_start( $tres1 , $tres2 );
		public function	 get_loop_end( $tres1 , $tres2 );
		public function	 set_loop_counter( $counter ); 
		public function	 get_res_len( $data );   
		public function	 set_text_limit_show( $text , $limit );
		public function	 check_if_more( $current_text , $new_limitted_text ); 
		public function	 set_member_title( $fullname , $occupation , $country , $state_ , $city , $zip , $datejoined );
		public function	 get_total_limit_show( $total_looks , $limit );
		public function	 set_about_limit( $fullname , $aboutme , $limit1 , $limit2 );
		public function	 print_my_social_sites( $mno , $mno1  ); 
		public function	 get_modal_position_detail( $table_id , $response , $key );
		public function	 print_look_footer_flag_or_edit( $mno , $mno1 , $table_id , $table_name , $src_img_flag , $link ); 
		public function	 print_edit_and_flag_user( $mno , $mno1 ); 
		public function	 look_with_more( $plno , $look_more_url ); 
		public function	 menu( );
		public function	 posted_look_modals_share_icons ( $plno );    
		public function	 print_rating_bubble( $mno , $plno ); 
		public function	 print_rating_message( $mno , $plno );    
		// public function  url( $array );  
	}       

	class myclassCode implements myInterface {   
		public $post = '';
		// A 
			#NEW ACCOUNT PROFILE   
				public function unlink_profile_pics ( $mno ) { 
					if( @unlink("$this->ppic_orginal/$mno.jpg") ){
						echo "$this->ppic_orginal/$mno.jpg  <span class='green' >succesfully deleted</span>  from the folder <br>";
					} 
					else{ 
						echo "$this->ppic_orginal/$mno.jpg <span class='red' >failled deleted</span> from the folder <br>"; 
					} 
					if( @unlink("$this->ppic_profile/$mno.jpg")) { 
						echo "$this->ppic_profile/$mno.jpg <span class='green' > succesfully deleted</span> from the folder <br>"; 
					}
					else{ 
						echo "$this->ppic_profile/$mno.jpg <span class='red' >failled deleted</span> from the folder <br>"; 
					}
					if( @unlink("$this->ppic_thumbnail/$mno.jpg")) {
						echo "$this->ppic_thumbnail/$mno.jpg <span class='green' > succesfully deleted</span> from the folder <br>";  
					} 
					else{ 
						echo "$this->ppic_thumbnail/$mno.jpg<span class='red' > failled deleted</span> from the folder <br>"; 
					}  			}
				public function upload_profile_pic( $mno , $mppno ) {
				 	echo " form is submitted <br>";
					$ri = new resizeImage(); 
					// upload profile photo  
					if ( isset($_POST['save_profile_pic']) ) {  
						$userfile_name = $_FILES['file']['name'];
						$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);  
						echo " file name $userfile_name file extention $userfile_extn <br>";
						if ($_FILES["file"]["error"] > 0) {
				      		// echo "Error: " . $_FILES["file"]["error"] . "<br>";
				      		echo " upload failled file size is zero <br> ";
				      		return 0;
				      	} 
				      	else if ( $userfile_extn == 'jpg' || $userfile_extn == 'jpeg' || $userfile_extn == 'png' || $userfile_extn == 'PNG'  ) {
				     		// add new room 
				            // echo " add new room  <br>";
				            // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				            // echo "Type: " . $_FILES["file"]["type"] . "<br>";
				            // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				            // echo "Stored in: " . $_FILES["file"]["tmp_name"];   

				            if ( move_uploaded_file($_FILES["file"]["tmp_name"], "$this->ppic_orginal/$mppno.jpg") ) { 
				            	echo " original image $this->ppic_orginal/$mppno.jpg <span class='green' > succesfully uploaded </span> <br>";
				            	 $this->resize_profile_pic_thumbnail_and_profile( $mno , $mppno );  
				            	return true;
				            }    
				            else{
				            	echo " original image $this->ppic_orginal/$mppno.jpg <span class='red' > failled to uploaded </span> <br>";
				            	return false;
				            }  
			      		}   
			      		else{
			      			echo " form failled to save the content <br>";
			      		}
					}   
					else{
						echo " form is not submitted <br>";
					}
				}    
				public function resize_profile_pic_thumbnail_and_profile( $mno , $mppno ) {

					$ri = new resizeImage();
				    $ri->load("$this->ppic_orginal/$mno.jpg");  
			              #profile pic
					$ri->set_all_for_location( 
			          "$this->ppic_orginal/$mno.jpg",  // source image 
			          "$this->ppic_profile/$mppno.jpg",  // save distination 
			          300,  //width
			          '',  //height
			          $ri // class object 
			        );    
			        echo " resize $this->ppic_profile/$mppno <br> "; 
			        #profile thumnails
			         $ri->set_all_for_location( 
			          "$this->ppic_orginal/$mno.jpg",  // source image 
			          "$this->ppic_thumbnail/$mppno.jpg",  // save distination 
			          150,  //width
			          '',  //height
			          $ri // class object 
			        );   
			        echo " resize $this->ppic_thumbnail/$mppno <br> ";
				}

			#NEW ACCOUNT PROFILE 


			#NEW ANTI SQL INJECTION 
				public function remove_sigle_qoutation( $str ) { 
			 		$str=str_replace('\'',"\"", $str );
			 		return $str;
			 	}
			 	public function remove_sql_injections_codes( $str ) {
			 		// $input = stripslashes( $str );
					$input = mysql_real_escape_string( $str );
			 	}  
			#END ANTI SQL INJECTION 

			#NEW ACTIVITY WALL   
			 	public function add_activity_wall_post ( $mno , $_table_id , $newaction , $table , $currentDate ) {   
					$b = insert_v1( 
						array(  
				            'mno'          => $mno,  
				            'action'       => $newaction,
				            '_table'       => $table, 
				            '_table_id'    => $_table_id,
				            '_date'        => $currentDate, 
				            'active'       => 1, 
				            'table_name'   => 'activity',
				            'row_id_name'  => 'ano' 
				        ) 
					);  

					return $b;
				}  
				public function add_latest_user_activity_posted( $mno , $action , $_table , $_table_id , $_date ) {   
					$response = insert_v1(
						array(  
				            'mno'          => $mno,  
				            'action'       => $action,
				            '_table'       => $_table, 
				            '_table_id'    => $_table_id,
				            '_date'        => $_date, 
				            'active'       => 1, 
				            'table_name'   => 'activity',
				            'row_id_name'  => 'ano'
				        )
					);
					return $response; 
				}  
			 	public function get_all_according_to_activity_action( $action , $_table_id , $_table ) { 

			 		/*
			 		*  action is Rated or Commented , Dripted , Shared and so on. 
			 		*  this to retrieved action in the activity wall
			 		*/

					$activity_action  = select_v3( 'activity' , '*' , "action = '$action' and _table_id = $_table_id and _table = '$_table' " );  
					return $activity_action;  
			 	}
				public function get_activity_posted( $ano ) { 

					$act = select_v3( 
					 	'activity' , 
					 	'*' , 
					 	"ano = $ano " 
					);  
					return $act;  
				} 
				public function get_activity( $limit=200 ) { 


					 // echo "<pre style='color:black !important' >";

					if ($limit == null) 
					{
						$limit = null;
					}  

					//Get activity
					$act=selectV1(
						'*',
						'activity',
						array('active'=>1),
						'order by _date desc',
						"limit $limit" 
					);  
					// print_r($act); 

					//Get flagged
				    $myFlag = select_v3( 
						'fs_flag', 
						'distinct table_id, table_name, action', 
						"mno = $this->mno"
					);  

				    // print_r($myFlag);  
					//remove if flagged 
				    $activity = $this->remove_activity_by_flagged($act, $myFlag);  
 					// echo "<H3>mno = $this->mno</H3>";  
 					// print_r($activity);
					return $activity;   
				} 

			    function remove_activity_by_flagged($act, $myFlag) 
			    {

					// $array[$c]['ano'] 	  = $r[$modalsCounter]["ano"];
				  // $array[$c]['_table']  = $r[$modalsCounter]["_table"];

			    	$c=0;
			    	for ($i=0; $i < count($act) ; $i++) 
				    {   
						$_table    = $act[$i]['_table'];
						$_table_id = $act[$i]['_table_id']; 
						$remove = false;

				    	for ($j=0; $j < count($myFlag) ; $j++) 
				    	{   
							$table_name = $myFlag[$j]['table_name'];
							$table_id   = $myFlag[$j]['table_id'];      
							$action     = $myFlag[$j]['action'];        

				    		if ($table_name == $_table  and $_table_id == $table_id and $action == 'hide post') { 
				    			 //This post is flagged and don't show in the feed
				    		 	// echo "table name = $table_name and id = $table_id <br>"; 
				    		 	$remove = true;
				    	 		// unset($act[$i]);

				    	 		  // [0] => Array
							       //  (
							       //      [0] => 59
							       //      [ano] => 59
							       //      [1] => 137
							       //      [mno] => 137
							       //      [2] => Dripped
							       //      [action] => Dripped
							       //      [3] => postedlooks
							       //      [_table] => postedlooks
							       //      [4] => 8
							       //      [_table_id] => 8
							       //      [5] => 2015-06-26 01:36:35
							       //      [_date] => 2015-06-26 01:36:35
							       //      [6] => 1
							       //      [active] => 1
							       //  ) 
				    		}     
				    	} 


				    	if($remove == false) {  
				    		// echo "false<br><br>";
				    		// $array[$c]['ano'] 	    = $act[$i]['ano'] ;
					     //    $array[$c]['mno']       = $act[$i]['mno'];
					     //    $array[$c]['action']    = $act[$i]['action'];
					     //    $array[$c]['_table']    = $act[$i]['_table'];
					     //    $array[$c]['_table_id'] = $act[$i]['_table_id'];
					     //    $array[$c]['_date']     = $act[$i]['_date'];
					     //    $array[$c]['active']    = $act[$i]['active']; 

				    		foreach ($act[$i] as $key => $value) {
								$array[$c][$key] = $value; 				    			 
				    		}
					        $c++; 
				    	}
				    	else 
				    	{
				    		// echo "true<br><br>";
				    	}
				    } 	  

				    return $array;
			    } 

				public function get_my_post_in_activty_wall( $mno , $_table_id , $_table ) {
					$mypost=selectV1(
				     	"*",
					 	"activity", 
					 	array( 'mno'=>$mno, 'operand1'=> 'and' , '_table_id'=>$_table_id, 'operand2'=> 'and' , '_table'=>$_table, ) 
					);  
					return $mypost; 
				} 
				public function get_my_action_image_equivalent( $mno  , $_table_id , $action ) { 
					$image = ''; 
					$title = '';
					// echo "get_my_action_image_equivalent( $mno  , $_table_id , $action )";
					switch ($action) {
						case 'Rated':    
								$lookvote = $this->get_my_look_vote ( $mno , $_table_id );   
								$lvtotal =   ( !empty($lookvote[0]['lvtotal']) ) ? $lookvote[0]['lvtotal'] : 0 ;   
								#stars  
									if (  $lvtotal > 0  and $lvtotal < 29 ) {   
										// $image = "<img src='fs_folders/images/genImg/1-star.png' title='Terrible Styling' /><br>"; 
									} 
									else if (  $lvtotal > 28 and  $lvtotal < 57 ) {  
										// $image = "<img src='fs_folders/images/genImg/2-star.png' title='Poor Styling' /><br>"; 
									} 
									else if ( $lvtotal > 56 and  $lvtotal < 71 ) {  
										// $image = "<img src='fs_folders/images/genImg/3-star.png' title='Good Styling' /><br>"; 
									} 
									else if ( $lvtotal > 70 and  $lvtotal < 86 ) {  
										// $image = "<img src='fs_folders/images/genImg/4-star.png' title='Very Good Styling' /><br>"; 
									} 
									else if ( $lvtotal > 85 and  $lvtotal < 101 ) {  
										// $image = "<img src='fs_folders/images/genImg/5-star.png' title='Excellent Styling' /><br>"; 
									}
									else{ 
										// $image = "<img src='fs_folders/images/genImg/0-star.png' title='did not voted' /><br>"; 
									}
							break;
						case 'Posted': 
							break; 
						case 'Shared': 
							break;
						case 'Driped': 
							break;
						case 'Favorited': 
							break;
						case 'Commented': 
							break;  
						case 'Following':
							 
							break;
						default: 
							break;
					}     
					// echo "the image $image ";
					return ( !empty($image) ) ? $image : false ; 
				}   
				public function get_activity_wall_posted( $action , $_table , $_table_id  ) { 
					$mypost=selectV1(
				     	"*",
					 	"activity", 
					 	array( 'action'=>$action , 'operand1'=> 'and' , '_table'=>$_table , 'operand2'=> 'and' , '_table_id'=>$_table_id ) 
					);  
					return $mypost; 
				} 
				public function get_modal_activity_latest( $_table_id , $_table ) {  
					$modal=selectV1(
				     	"*",
					 	"activity", 
					 	array(   '_table_id'=>$_table_id, 'operand1'=> 'and' , '_table'=>$_table ),
					 	'order by _date desc',
					 	'limit 1'
					);  
					return $modal;  
				} 
				public function set_action_sperator( $action ) {
					if (  strpos($action, 'and') < 1 ) {
						$and = 'and';
					}else{
						$and = ',';
					}  
					return $and;
				}  
				public function update_hide_all_showing_specific_modals( $_table_id , $_table ) {  
					$b = mysql_query("UPDATE activity SET active = 2 WHERE _table = '$_table' and _table_id = $_table_id and active = 1 ");  
					return $b;  
				}
				public function update_activity_wall_post ( $mno , $_table_id , $newaction , $table , $currentDate ) { 
					// echo " update "; 
					$response = update_v1( 
		        		array(
			        		'table_name'=>'activity',
			        		'_date'=>$currentDate,
			        		'action'=>$newaction 
			        	) ,
		        		array(
		        			'mno'      => intval($mno),
		        			'_table_id'=> intval($_table_id)  
	        			)  
	        		);   
	        		return $response;
				} 
				public function update_latest_user_activity_posted( $mno , $action , $_table , $_table_id , $_date  ) {  
					echo " update $mno , $action , $_table , $_table_id , $_date  <br>";
					update_v1( 
		        		array(
			        		'table_name'=>'activity',
			        		'mno'=>$mno,
			        		'_date'=>$_date  
			        	) ,
		        		array(
		        			'_table'    => $_table,
		        			'action'    => $action,
		        			'_table_id' => intval($_table_id) 
	        			)  
	        		);    
				}   
				public function update_activity_active_status( $ano , $active ) {
					
					update_v1( 
		        		array(
			        		'table_name'=>'activity',
			        		'active'=>$active, 
			        	) ,
		        		array(
		        			'ano' => intval( $ano ) 
	        			)  
	        		);  
				}
				public function update_activity_action( $ano , $action ) {
					
					update_v1( 
		        		array(
			        		'table_name'=>'activity',
			        		'action'=>$action, 
			        	) ,
		        		array(
		        			'ano' => intval( $ano ) 
	        			)  
	        		);  
				}
				public function update_or_add_my_activity_wall_post( $mno , $_table_id , $action , $_table , $currentDate ) {  

					# ex: jesus rated , commented , dripted and favorited a look by rico
					// echo "update_or_add_my_activity_wall_post( $mno , $_table_id , $action , $_table , $currentDate )"; 
					$newaction = '';  
					// $li = $this->posted_look_info( $_table_id );
					// $lookOwnerName = $li['lookOwnerName'];    
					// print_r($mypost);
					// echo " mno $mno and plno $_table_id lookowner <b>$lookOwnerName <b>   <br> "; 
					$activity = array(); 

 					


					switch ( $_table ) {
						case 'postedlooks' || 'fs_postedarticles':  

							    // update and hide the specific modal shows in the feed while the user doing the new action 

									$b = $this->update_hide_all_showing_specific_modals( $_table_id , $_table );    
								
								// get the user current post in the feed 

									$mypost = $this->get_my_post_in_activty_wall( $mno , $_table_id , $_table );  

								if ( !empty($mypost)) {  

									// echo "If Its my post <br>";

									$dbaction = $mypost[0]['action'];  
									$dbaction = $mypost[0]['action'];  

									 // $this->print_r1($dbaction);
									 // echo " pos ". strpos($dbaction, 'asdsa');						 
									  // echo " db action $dbaction, new action $action "; 




								 	// this is the current coding for the activity problem
 											
 										// get the date only from the date in the database

									  		$old_date = $this->time(  array( 'type'=>'get-datetime-date', 'date1'=>$mypost[0]['_date'] ) ); 

									  	// get the total days ago compare from the old date in the database and the new provided date from the users

									  		$total_days = $this->time(  array( 'type'=>'get-time-deffirence', 'date1'=>$old_date , 'date2' => $currentDate   ) );

									  	// condition

									  		if ( $total_days > 0 ) {  
									  			  echo " current activity more than 1 day the action last action will replaced with the new one <br>";
									  			// replace the action 
									  			// update time   
												$newaction = $action;  
									  		}
									  		else{  

									  			// just doing the action in the same day

										  			if ( strpos( $dbaction, $action ) > -1  ) {


														// echo "replace the action <br>";
									  					// update time   
												 		$newaction = $action;  

													} else{ 

														 // echo " update time and add action ";
														// update action and time
														$and = $this->set_action_sperator( $dbaction  );  
														$newaction = $dbaction . " $and " . $action;  // rated , driped a look by jesus 

													}   

									  		} 
										    /* 
												// old version  
													if ( strpos( $dbaction, $action ) > -1  ) {

													 	// update time  
													 	$newaction = $dbaction; 
													 	// echo " update time only ";

													} else{ 

														#echo " update time and add action ";
														// update action and time
														$and = $this->set_action_sperator( $dbaction  );  
														$newaction = $action." $and ".$dbaction ;  // rated , driped a look by jesus 

													} 
											*/ 
									// 967 jesus
									// 968 francis 
									// echo "  $mno , $_table_id , $newaction , $_table , $currentDate "; 

									// hide current latest show 

										// $response = $this->hide_current_latest_action_activity_wall_post( $_table_id , $_table );
										#$this->message( ' activity current latest hide' ,  $response , null );  

									// show new latest your activity

				 						$response = $this->show_new_latest_action_activity_wall_post( $mno , $_table_id , $_table );
				 						#$this->message( ' activity show my hidden action ' ,  $response , null ); 

									// update time and action 

										$response = $this->update_activity_wall_post( $mno , $_table_id , $newaction , $_table , $currentDate );
										#$this->message( ' activity update time and action ' ,  $response , null );  

									// echo " update";   
									#update   
									return $response; 
								}
								else{  
									#echo "insert";
									// echo "Else This modal is not my post <br>";
									$newaction = "$action";  
									$this->update_last_action_activity_wall_post( $mno ,'all-action', 'postedlooks' ,  $_table_id  , $currentDate , 1 , 2 ); 
									$b = $this->add_activity_wall_post( $mno , $_table_id , $newaction , $_table , $currentDate );
									#insert 
									return $b; 
								}    
							break;  
						case 'fs_members':   
								// echo "this is it!";  
								$mempost = $this->get_my_followed_member_activity_post( null , $_table , $_table_id  );  
								// print_r($mempost);

								if ( !empty($mempost) ) {  

									#update current post set active = 2,  

									// echo "update_last_action_activity_wall_post( $mno , $action , $_table , $_table_id , $_date , $active_curent , $active_new ) "; 

									$this->update_last_action_activity_wall_post( $mno ,'all-action', 'fs_members' ,  $_table_id  , $currentDate , 1 , 2 ); 
									#insert new member activity
										$this->add_activity_wall_post( $mno , $_table_id , $action , $_table , $currentDate ); 
								}
								else{
									#insert new member activity	
										$this->add_activity_wall_post( $mno , $_table_id , $action , $_table , $currentDate );
								} 
							break; 
						case 'fs_member_profile_pic':    
								echo " this is the profile pic "; 
								$mypost = $this->get_my_post_in_activty_wall( $mno , $_table_id , $_table );   
								// print_r($mypost);

									
									// get owner of the modal
										$mno1 = $this->member_profile_pic_query(  array( 'mppno' => $_table_id , 'type'=>'get-specific-mno-by-mppno' ) );   
									// get all profile pic
	  									$response = $this->member_profile_pic_query( array( 'type'=>'get-all-profile-pic' , 'mno'=>$mno1 ) ); 
 	 									// print_r($response); 
			 						// hide all displayed in the wall
			 				 			for ($i=0; $i < count($response) ; $i++) { 
			 				 			 	$mppno = $response[$i]['mppno']; 
			 				 			 	echo " mppno = $mppno <br> ";
			 				 				$b = $this->update_hide_all_showing_specific_modals( $mppno , $_table );    
			 				 			} 

			 				 		// update one modal only with the action scattered in the wall
			 				 			$b = $this->update_hide_all_showing_specific_modals( $_table_id , $_table );  



									 

								$this->message( ' hide all open activity for this modal ', $b , null );
								if ( empty( $mypost ) ):   
 									$b = $this->add_activity_wall_post( $mno , $_table_id , $action , $_table , $currentDate ); 
 									$this->message( 'insert activity', $b , null );
 									echo "empty";
								else:     
									$b = mysql_query("UPDATE activity SET action = '$action' , active = 1 , _date = '$currentDate' WHERE _table = '$_table' and _table_id = $_table_id and mno = $mno "); 
									$this->message( ' update activity ', $b , null ); 
									echo " not empty and update ";
								endif;     
							break;
						case 'fs_member_timeline': 
							break;
						case 'fs_postedmedia': 
							break;
						case 'fs_postedarticles': 
							break;
						default: 
							break;
					}  
				}  
				public function update_or_add_my_activity_wall_post_more( $mno , $action , $_table , $_table_id , $_date ) { 
					#ex: jesus rated a look and 50 friends  

					echo " $mno , $action , $_table , $_table_id , $_date <br>  ";
					$posted = $this->get_activity_wall_posted( $action , $_table , $_table_id );  
					if ( $posted ) { 
						// echo "update <br>";
						$this->update_latest_user_activity_posted( $mno , $action , $_table , $_table_id , $_date ); 
						#update   
					}
					else{ 
						// echo "insert <br>";
						$this->add_latest_user_activity_posted( $mno , $action , $_table , $_table_id , $_date ); 
						#insert 
					}				 
				}     
				public function update_last_action_activity_wall_post( $mno , $action , $_table , $_table_id , $_date , $active_curent , $active_new )  { 
					/*
					* warning :suppose to be added before new or insert action action made 
					* this function is use to move the active from 1 - 2.
					*/  
					// echo "update_last_action_activity_wall_post( $mno , $action , $_table , $_table_id , $_date , $active_curent , $active_new )"; 


					update_v1( 
						array(
							'table_name'=> 'activity',
							'active'     => $active_new
						) ,  
						array( 
							'_table_id'  => $_table_id , 
							'active'     => $active_curent, 
							'_table'     => $_table
						)
					); 
				}    
				public function update_modal_total_comment( $tc , $_table_id , $_table ) {  

					switch ( $_table ) {

						case 'postedlooks':
								$plno = $_table_id;
								updateArray(
									'postedlooks',
									array('pltcomment'),
									array($tc),
									'plno',
									$plno
								); 
							  	echo "update look  update_modal_total_comment( $tc , $_table ) ";

							break;
						case 'fs_postedarticles': 
							break;
						case 'fs_postedmedia': 
							break; 
						default: 
							break;
					}  
				}
				public function update_profile_pic( $mno ) { 
					update_v1( 
		        		array( 
		        			'table_name'=>'activity',
			        		'active'=>2

			        	),
		        		array(
		        			'mno'      => intval($mno),
		        			'_table_id'=> intval($mno)  
	        			)   
	        		);    
					$this->add_activity_wall_post ( $mno , $mno , 'Updated' , 'fs_members' , $this->date_time ); 
				}
				public function delete_modal_comment( $cno , $_table_id , $_table ) {    
					switch ( $_table ) {
						case 'postedlooks':
							echo " delete posted look comment in fs.console.source <br>";

								$plcno = $cno; 
								$deleted=delete(
							  		'posted_looks_comments',
									array('plcno',$plcno)
							    );
							    $deleted=delete(
							  		'posted_looks_comments_like_dislike',
									array('plcno',$plcno)
							    ); 
							    $deleted=delete(
							  		'fs_cflag',
									array('plcno',$plcno) 
							    );

							break; 
						default:  
								echo " default <br> ";
								$response =  $this->posted_modals_comment_Query (
								  	array(    
									    'cno'=> $cno, 
									    'comment_query'=>'comment-delete'  
									) 
								);  
								$this->message( 'comment message ' , $response  , '' );  
								# delete rate  
									$response = $this->posted_modals_rate_Query(  
										array(  'table_id'=> $cno,  'table_name'=>'fs_comment',  'rate_query'=>'rate-delete' )   
									);   
									$this->message( 'comment rate ' , $response , " table_name =  $_table and table_id =  $_table_id  console nu# 556 "  );
								#delete comment modals      
							break;
					} 
				}  
				public function delete_modal_activity_posted( $mno,  $action , $_table_id , $_table ) {   

					echo "delete_modal_activity_posted( $mno,  $action , $_table_id , $_table )";
 					mysql_query("DELETE FROM activity WHERE mno = $mno and action = '$action' and _table_id = $_table_id  and _table = '$_table' ");  
				} 
				public function hide_current_latest_action_activity_wall_post( $_table_id , $_table ) { 

					$response = mysql_query( " UPDATE activity  SET active = 2  WHERE _table_id = $_table_id and _table = '$_table' and active = 1 "); 
					return $response;
				} 
				public function show_new_latest_action_activity_wall_post( $mno , $_table_id , $_table ) {  

					$response = mysql_query( " UPDATE activity  SET active = 1 WHERE mno = $mno and _table_id = $_table_id and _table = '$_table' and active = 2  "); 
					return $response;
				} 
			#END ACTIVITY WALL    

			#NEW ADS
				public function retrieved_ads_based_on_categories( $category ) {
					 

					switch ( $category ) {
					 	case 'Chic':
					 		  	$ads = array( 1 , 2 , 3 , 4 );
					 		break;
				 		case 'Menswear':
				 				$ads = array( 5 , 6 , 7 , 8 );
					 		break;
				 		case 'Preppy':
				 				$ads = array( 9 , 10 , 11 , 12 );
					 		break;
				 		case 'Streetwear':
				 				$ads = array( 13 , 14 , 15 , 16 );
					 		break;  
					 	default:
					 		# code...
					 		break;
					}  
					return $ads;
				}
			#END ADS
		// B 
		// C
			#NEW COMMENT 



				public function print_comment( $response , $profilepath=null ,  $type , $mno2 , $table_name=null ) {
					 	





				 	
					#comment print testing
				 	// $this->print_r1($response);
					// 2014-07-22 12:41:25
					// 2014-07-22 00:23:16 


						if ( $table_name == 'postedlooks' ) {

							$b             = false; 
							$cno           = $response[0]['plcno'];  
							$table_id      = $response[0]['plno']; 
							$mno_commentor = $response[0]['mno']; 
							$date          = $this->get_time_ago( $response[0]['date_'] ); 
							$comment       = $response[0]['msg']; 
							$tlikes        = $response[0]['plctlikes']; 
							$tdislike      = $response[0]['plctdislike']; 
							$fullname      = $this->get_full_name_by_id ( $mno_commentor );  				  
											
											 

 						}
						else{ 

					 		$b             = false;
							$cno           = $response[0]['cno'];
							$table_id      = $response[0]['table_id'];
							$table_name    = $response[0]['table_name']; 
							$mno_commentor = $response[0]['mno']; 
							$date          = $this->get_time_ago( $response[0]['date'] ); 
							$comment       = $response[0]['comment'];  
							$tlikes        = $response[0]['tlike'];
							$tdislike      = $response[0]['tdislike'];  
							$fullname      = $this->get_full_name_by_id ( $mno_commentor );  

						}


						if ( $type == 'static' ) { 
							$b = $this->get_your_look_comment_thumb_up_or_down( $mno , $cno );     	 
						}
						 

						
						$validate_comment  =  'not rated comment' ;
 

						$you_liked    = ( $b == 'Thumb-Up' ) ? 'comment-like-liked.png' : 'commen-like-unlike.png' ;
						$you_disliked = ( $b == 'Thumb-Down' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;     



 									 ?>  
						<div style="clear:both; height:6px;border:1px solid none;" > 
						</div>		   	
						<ul style="padding:none; margin:none; border:1px solid none;" >
						 	<li> 
						 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno_commentor ,"$profilepath"."$this->ppic_thumbnail" , null , '35px;', '' ,'35px;'  );  ?>
						 	</li>   
						 	<li style="width:228px;font-family:arial; font-size:12px;  " >
						 		<div style="margin-top:-2px;" >
							 		<div style="margin-left:7px;"  >
							 		 	<a href='<?php echo $username; ?>'> <b style='color:#284372' > <?php echo $fullname; ?> </b></a> <span style='color:black !important;' > <?php echo $this->cleant_text_print_from_db ( $comment ); ?></span>
							 		</div> 
							 		<div style="margin-left:7px; color:#d6051d"  >  

							 			<table border="0" cellpadding="0" cellspacing="0" style="width:auto;padding:none;margin:0px; " name='table8' > 
							 				<tr>  
							 					<td > 
							 						<span style='color:#ccc;font-size:12px' > <?php echo "$date"; ?>   </span> 
							 					</td>
							 					<td style="padding-left:5px;" >  	
							 						<div style="margin-top:-1px;" >
								 						<img src="<?php echo "$this->genImgs/$you_liked"; ?>" style='height:12px;'  id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' )" />  
							 						</div>
							 					</td>
							 					<td style=" color:#d6051d;font-size:12px;padding-left:5px;" >  <?php echo "$tlikes";  ?> </td>
							 					<td style="padding-left:5px;" > 
							 						<div style="margin-top:2px;" >
							 							<img src="<?php echo "$this->genImgs/$you_disliked"; ?>" style='height:12px;' id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' )"   />
							 						</div> 
							 					</td>
							 					<td style="color:#d6051d;font-size:12px;padding-left:5px;" > <?php echo "$tdislike"; ?>  </td>
							 			</table>  
							 		</div>
							 	</div>
						 	</li> 
						</ul>   
						<div style="clear:both;" >
						<div style="display:none" >
							<input type="text" value="<?php echo $validate_comment; ?>" id="rate-comment-stat<?php echo $cno; ?>"  /> 
						</div>
						<!-- <div style="clear:both; height:6px;border:1px solid none;" > 
						</div> -->
							 
				<?php  	   
			 	}
			#END COMMENT
			#NEW CROPPING  
				public function jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch ) {   
				    header('Content-type: image/jpeg');  
				    $jpeg_quality = 100;  
				    $img_r = imagecreatefromjpeg($img_src);
				    $dst_r = ImageCreateTrueColor( $nw , $nh ); 
				    imagecopyresampled( $dst_r , $img_r , 0 , 0 , $cx , $cy , $nw , $nh , $cw , $ch );  
				    imagejpeg( $dst_r , $img_dst , $jpeg_quality );    
				    // imagejpeg( $dst_r , null , $jpeg_quality );   
				    // header("location:account");
				}    
			#END CROPPING 
			#NEW COOKIE
				public function  set_cookie( $cname , $value , $time ) { 
					$b = setcookie( $cname , $value , $time );  
					if ( $b ) 
						return true; 
					else 
						return false; 
				}
				public function get_cookie( $cname , $value=null ) {    
					if ( isset( $_COOKIE[$cname] ) ) 
						 return intval($_COOKIE[$cname]);
					else  
						return intval($value); 
				} 
			#END COOKIE 




			 public function getSuggestedMember(){
            	//Lacking in brand and topic filter
                $myInfo = select_v3( 'fs_members' , '*'  , 'mno = ' . $_SESSION['mno']);  
                $city = (!empty($myInfo[0]['city'])) ? $myInfo[0]['city'] : null ;   
                $state = (!empty($myInfo[0]['state_'])) ? $myInfo[0]['state_'] : null ;     
                $w1 = (!empty($myInfo[0]['bdate'])) ? 'bdate = ' . intval($myInfo[0]['bdate']) : '' ; 
                $w2  = (!empty($myInfo[0]['state_'])) ? " state_ LIKE '$state%' " :  " city LIKE '$city%' ";  
                if (!empty($w1) and !empty($w2)) {
                	$where = $w1 . ' and ' . $w2;
                } elseif(!empty($w1) and empty($w2)) { 
                	$where = $w1;
                } elseif(empty($w1) and !empty($w2)) { 
                	$where = $w2;
                } else { 
                } 
                $where  = 'mno <> ' . $_SESSION['mno'] . ' and ' . $where . ' LIMIT ' . $_SESSION['noti_limit_start']  . ', ' . $_SESSION['noti_limit_end'];  
                $response = select_v3( 'fs_members' , '*'  , $where );    

                return $response;
            }
				










			#NEW COLLECT EMAIL
				
				public function invited_people_send_emails($array=null) 
				{ 	 
					// $sc = new scrape();  
					// $TimeZone = $sc->get_TimeZones(); 
  					$this->print_r1( $array);  
					echo "<hr>";  
					$TimeZone = ( !empty($array['TimeZone'])) ? $array['TimeZone'] : $this->date_time ; 
					$invited_email  = ( !empty($array['invited_email'])) ? $array['invited_email'] : 0 ;  // email of the person who signuped 
					// get date based on email  
  						$response = $this->fs_invited( array(  'type'=>'select',  'where'=>" invited_email = '$invited_email' " ) );  
  						// print_r($response ); 
  						$bool = (!empty($response)) ? true : false ; 
  						$status         =  ( !empty($array['status'])) ? $array['status'] : 0 ; // status if approved , sign up , officailly a member  
						$invited_id      = ( !empty($response[0]['invited_id']) ) ? intval($response[0]['invited_id']) : 0 ;   // id of the person invited   
	 					$days           = ( !empty($array['days']) ) ? $array['days'] : ''; // if empty generate the days difference between current date and fs_invited date 
	 					$wob            = ( !empty($array['wob'])) ? $array['wob'] : '' ;
	 					$invited_fn       = ( !empty($array['invited_fn'])) ? $array['invited_fn'] : '' ; 
	 					$interval_time_send  = ( !empty($array['interval_time_send'])) ? intval($array['interval_time_send']) :  $_SESSION['days'] ; // interval day of sending the email if null then the interval day automatically set to 7 means if 7 day come and user didnt able to sign fs then the email automatically send next email 
	 				echo " days before setted up $days  <br> "; 
	 				// print_r($response );
  					if ( $bool  == true ) 
  					{ 
						$temail_sent    = ( !empty($array['temail_sent'])) ? $array['temail_sent'] : $response[0]['temail_sent'] ;  
	 					// if the email not exist then add the email as invited    
 						// get the total past days through the dateTime 
  						if ( empty( $days ) ) 
  						{

  						    $invited_id = $response [0]['invited_id'];
  							echo " days is empty <br>";
  							// convert time 
  								$date 		 = $response[0]['DateTimeSend']; 

	  							$newdate     = $this->time(  array( 'type'=>'get-datetime-date' , 'date1'=>$TimeZone ) );  // convert to date new date  
		 						$curdate 	 = $this->time(  array( 'type'=>'get-datetime-date' , 'date1'=>$date) );   // convert to date current date  
		 						$days        = $this->time(  array( 'type'=>'get-time-deffirence', 'date1'=>$curdate , 'date2' => $newdate ) );   // get time difference  
		 						echo "days = $days , newdate = $newdate , curdate = $curdate  , date $date invited_id =  $invited_id <br><br><br>";  
  						} 
 					}  
 					/*	 
 						status: 
 							0 = pending
							1 = approved 
							2 = signup
							3 = member

 					*/ 
 					if ( $status == 1 || $status == 2 ) 
 					{ 

 						echo " if ( $days >= $interval_time_send  and $temail_sent == 0 ) ";
 						if ( $days >= $interval_time_send  and $temail_sent == 0 ) 
 						{
 							// if 1 week passed and total sent email is none then this is the paarameter 
 							$temail_sent = 1;
 							$email_send  = true; 

 						}  
 						else if ( $days >= $interval_time_send  and $temail_sent == 1 ) 
 						{ 

 							// if 1 week passed and total sent email is 1 but no sign up happen yet set send again new invitation email  

 							$temail_sent = 2;
 							$email_send  = true; 

 						} 
 						else if ( $days >= $interval_time_send  and $temail_sent == 2 ) 
 						{ 

 							// if 1 week passed and total sent email is 2 but no sign up happen yet set send again new invitation email

 							$temail_sent = 3;
 							$email_send  = true; 

 						}
 						else if ( $days >= $interval_time_send  and $temail_sent == 3 ) 
 						{  
 							// if 1 week passed and total sent email is 3 but no sign up happen yet set send again new invitation email  
 							$temail_sent = 3;
 							$email_send  = true;  
 							// update the user info to become a processed as under manual invite  
 							if ( mysql_query("UPDATE fs_invited SET invited_status = 5 WHERE invited_id = $invited_id ")){
 								echo "user info  successfully moved to personal invitation";
 							}
 							else{
 								echo "user info  not successfully moved to personal invitation";	
 							}

 							echo   "UPDATE fs_invited SET invited_status = 5 WHERE invited_id = $invited_id "  ;
 						}
 						else
 						{  
 							// echo " email sent is 3 ";
 							// dont send email and update fs_invite 
 							$temail_sent = false;
 							$email_send  = false; 

 						} 

 						// if allow to send emails 

 						if ( $email_send == true ) 
 						{

 							if ( $status == 1 ) 
 							{  // approved and invited  

 								// send invitation email  
 								// $response = $this->email( array('type'=>'send_invitation_email' , 'email'=>$invited_email ) );    
 								// $response = $this->message(" sending email status = $status and temail_sent = $temail_sent , days = $days and sending send_invitation_email() , email = $invited_email ",$response,"" ); 
 								$subject = 'An Invitation to Share Your Blog Content on Fashion Sponge';
						      	$from    = 'mauricio@fashionsponge.com';
						      	$type    = 'invitations'; 
						      	$this->send_email_signup_to_user( $invited_fn , $invited_email , $type , $from , $subject );    
 							}
 							else if ( $status == 2 ) 
 							{  // already sign up  



 								// get generated code from invited table   

 									$response = $this->fs_invited( array(  'type'=>'select',  'where'=>" invited_email = '$invited_email' " ) );
 									
 								 	$gcode    = $response[0]['invited_genCode']; // gcode from database fs_invited already generated by first send of email same as first day of sending email 

 								 	$this->message( "retrieved fs_invited info for gcode = $gcode to be sent to member " , $response , "" ); 
 
 								// send signup email
 
 									$response = $this->email( array('type'=>'send_signup_email' , 'email'=>$invited_email ) );    
 									$response = $this->message("sending email status = $status and temail_sent = $temail_sent , days = $days and sending send_signup_email() , email = $invited_email ",$response,"" );

 								// send access code email
 
 									$response = $this->email( array('type'=>'send_accesscode_email' , 'email'=>$invited_email , 'gcode'=>$gcode ) );  
 									$response = $this->message("sending email  status = $status and temail_sent = $temail_sent , days = $days and sending send_accesscode_email() , email = $invited_email ",$response,"" ); 
 							}  
 							// update fs_invited info with the new info

 								$response = mysql_query( "UPDATE fs_invited SET temail_sent = $temail_sent , DateTimeSend = '$TimeZone' WHERE invited_email = '$invited_email' " );	 

 								$this->message("  update fs_invited SET temail_sent = $temail_sent , invited_date = '$TimeZone' WHERE invited_email = $invited_email ",$response,"" );
 						} 
 						else
 						{

 							// nothings happend update here  
 							$this->message( "total days passed = $days , email = $invited_email because total days is not $interval_time_send  or temail_sent 0 - 2 but  3  ", false , '' );
 
 						}
 					} 
 					else if ( $status == 'signup' ) 
 					{  

 						$invited_status = 2;
 						$temail_sent    = 1; 
 						$response       = false; 
 						$gcode_exist    = true; // bool if gcode exist 
 						$update_gcode   = ''; // update gcode 
 				

 						// add new invited if email not exist 

 							if ( $bool == false ) 
 							{  
	  							$response = $this->fs_invited( array(  'type'=>'insert', 'invited_fn'=>$invited_fn, 'invited_email'=>$invited_email , 'invited_wob'=>$wob  ) ); 

		 					}  

		 					$this->message(" invited email exist ",$bool,"" );	
		 					$this->message(" adding info invited_fn=>$invited_fn, invited_email=>$invited_email , invited_wob=>$wob ",$response,"" );	

		 				// check if gcode already exist 
		 					 
		 					$response = $this->fs_invited( array(  'type'=>'select',  'where'=>" invited_email = '$invited_email' " ) ); 
					
								if ( empty($response[0]['invited_genCode']) ) 
								{

									echo " invited code is empty <br>";

			 						// generate new code for the member for register 
			 
			 							$gcode = $this->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) );

			 							$this->message(" generate new gcode = $gcode ",$gcode,"" );

			 						// insert  to admin area the generated code list for members

			 							$response = $this->fs_signup_code(   array( 'type' =>'insert','generated_code'=>$gcode ) );  

			 							$this->message("  insert new code to admin  gcode = $gcode ",$response,"" );

 									// set value conditions for updates

										$gcode_exist = true; 
										$update_gcode = "invited_genCode = '$gcode', ";	 

								}
								else
								{ 

									echo " invited code is not empty <br>"; 

									$gcode = $response[0]['invited_genCode']; 

								} 

								echo " generated code $gcode <br> ";
 
 						// update fs_invited info with the new info 

 								$response = mysql_query( "UPDATE fs_invited SET $update_gcode invited_status = $invited_status , temail_sent = $temail_sent , invited_date = '$this->date_time' WHERE invited_email = '$invited_email' " );	  

 								$this->message(" update fs_invited SET invited_genCode = $gcode , invited_status = $invited_status temail_sent = $temail_sent , invited_date = '$this->date_time' WHERE invited_email = $invited_email ",$response,"" );

						// send signup email

 							$response = $this->email( array('type'=>'send_signup_email' , 'email'=>$invited_email ) );    

 							$response = $this->message("sending email invited_status = $invited_status and temail_sent = $temail_sent , days = $days and sending send_signup_email() , email = $invited_email ",$response,"" );

 						// get gcode if already exist 

						// send access code email 

 							echo "this is the function sending email <br> ";

							$response =  $this->email( array('type'=>'send_accesscode_email' , 'email'=>$invited_email , 'gcode'=>$gcode ) );  

							$response = $this->message("sending email invited_status = $invited_status and temail_sent = $temail_sent , days = $days and sending send_accesscode_email() , email = $invited_email ",$response,"" );  
 					}
 					else if ( $status == 'officailly-member') 
 					{

 						$invited_status = 3; 
 						$temail_sent    = 1;

 						// update fs_invited info with the new info

 							$response = mysql_query( "UPDATE fs_invited SET invited_status = $invited_status , temail_sent = $temail_sent , invited_date = '$this->date_time' WHERE invited_email = '$invited_email' " );	 
 							
 							$this->message("  update fs_invited SET invited_status = $invited_status temail_sent = $temail_sent , invited_date = '$this->date_time' WHERE invited_email = $invited_email  ",$response,"" );

						// send signup email

 							$response = $this->email( array('type'=>'send_welcome_email' , 'email'=>$invited_email ) );  

 							$response = $this->message("sending email invited_status = $invited_status and temail_sent = $temail_sent , days = $days and sending send_welcome_email() , email = $invited_email ",$response,"" );

						// send access code email 

							$response = $this->email( array('type'=>'send_refferal_email' , 'email'=>$invited_email ) );    

							$response = $this->message("sending email invited_status = $invited_status and temail_sent = $temail_sent , days = $days and sending send_refferal_email() , email = $invited_email ",$response,"" ); 
 					}    
				} 
				public function print_invited_people( $invited , $status=null , $header, $invited1=null, $database=null) 
				{
					$sc=new scrape();
		        	$c=0;  

					/*
					* set timezone retrieved  
					* it needs to be used just once the site is loaded because maybe it can cause time 
					* consuming when loading iniitialized value is to set that the code will be executed only of the tab is approved and pending with email
					*/ 

	            	// if($invited[0]['invited_status']==0||$invited[0]['invited_status']==1):   
	            	// 	$Time['EST']= $sc->retrieve_time_from_timezone('EST');   
	            	// 	$Time['UTC']= $sc->retrieve_time_from_timezone('UTC');   
	            	// 	$Time['BRST']= $sc->retrieve_time_from_timezone('BRST');    
		            // endif;  

 					
 
		            /*
		            * loop starts here for the executing the entire code
		            * of the results 
		            */ 

	        		for ($i=0; $i < count($invited) ; $i++):   



			            $invited_id     = $invited[$i]['invited_id'];  
			            $fullname       = $invited[$i]['invited_fn']; 
			            $invited_email  = $invited[$i]['invited_email']; 	
			            $description    = $invited[$i]['description'];
			            $invited_date   = $invited[$i]['invited_date']; 
			            $invited_status = $invited[$i]['invited_status'];   
			            $city		    = $invited[$i]['city'];  
			            $state		    = $invited[$i]['state'];  
			            $country	    = $invited[$i]['country'];   
			            $tlook	        = $invited[$i]['tlook'];   
			            $temail_sent    = $invited[$i]['temail_sent'];      
			            $page           = $invited[$i]['page'];  
			         	$timezone 	    = $invited[$i]['timezone'];  
			         	$timezone_url   = $invited[$i]['timezone_url'];  
			         	$location 	    = $invited[$i]['location'];  
			         	$domain_source  = $invited[$i]['domain_source'];  
			         	$gender         = $invited[$i]['gender'];     
			            $invited_wob    	 = $invited[$i]['invited_wob'];  
			            $timezoneName        = $invited[$i]['timezone'];  
			            $invited_update_date = $invited[$i]['invited_update_date'];  
			            $DateTimeSend 		 = $invited[$i]['DateTimeSend'];   
			            
			             
			            /**
			            * set activity action 
						**/


						  $invited1->_setActivity($invited_id, $database); 
						





			            /*
			            * get the scrape page
			            */
			            
			            $scrape_src     = str_replace('http://lookbook.nu/search/users?page=', '', $invited[$i]['scrape_src']);  
		            	$interval_time_send  = ( !empty($invited['interval_time_send'])) ? intval($invited['interval_time_send']) : $_SESSION['days'] ; // interval day of sending the email if null then the interval day automatically set to 7 means if 7 day come and user didnt able to sign fs then the email automatically send next email   
		            	 
						/*
						* This is to set only show the timezone in the pending with email
						* and approved tab 
						*/

					    //         	if($invited[0]['invited_status']==0||$invited[0]['invited_status']==1): 
									// if ( $timezoneName == 'EST' ) {  
					    //         		$Time['TimeZone']=$Time['EST'];
					    //         	}else if ( $timezoneName == 'UTC' ) {  
					    //         		$Time['TimeZone']=$Time['UTC'];
					    //         	}else if ( $timezoneName == 'BRST' ) {  
					    //         	 	$Time['TimeZone']=$Time['BRST'];
					    //         	}else{ 
					    //          		$Time['TimeZone']=null;
					    //         	}
					    //        		endif;  

		           		/*
		           		* set the border of the column
		           		*/ 


		           		// $Time['BRST']= $sc->retrieve_time_from_timezone('BRST');  



		           		// preg_replace("/[^A-Z^a-z]/", "", $location)
		           		// setTimeZone($location);

		           		//$sc->get_time_zone_time($timezone_url,$this); 
		           		//$Time['TimeZone'] = Time::$dataTime12; 



		           		 Time::setTimeZoneDateTime($timezone);   
		           		 $Time['TimeZone'] = Time::getTimeZoneTime12();









						// Time::$Time12     = $hour;

		            	$c++;   
		           	 	// condition for the border colors 
		           	 	$style = '';   
		             	if( $invited_status == 0 ) {   
			                // person info pending  
			                // $(container_id).css('border','1px solid red'); 
			                $style = 'border:0px solid red';  
			                $date =  $invited_status; 
		              	}else if ( $invited_status == 1 ) {  
		                	// person info is approved 
		                  	$style = 'border:0px solid green';   
		              	}else if ( $invited_status == 2 ) {   
		                	// show popup for edit because edit is selected 
		                  	// alert( 'show popup edit' );  
		              	}else if ( $invited_status == 3 ) {   
			                // deleted 
			              	$style = 'border:0px solid yellow';   
		              	}else if ( $invited_status == 4 ) {   
			                // deleted 
			              	$style = 'border:0px solid blue';   
		              	}else{  
			                // hide the container because it is set as delete 
			                // $style = 'display:none';  
			              	$style = 'border:0px solid pink';   
		              	}  

		              	/*
		              	* set the background color of the columnt
		              	*/

		              	$color=($i%2==0)?'white':'rgb(243, 243, 243)'; 
 
		              	// set value default 
		                $selected0 = ( $invited_status == 0 ) ? 'selected="selected"' : '' ; 
		                $selected1 = ( $invited_status == 1 ) ? 'selected="selected"' : '' ; 
		                $selected2 = ( $invited_status == 2 ) ? 'selected="selected"' : '' ; 
		                $selected3 = ( $invited_status == 3 ) ? 'selected="selected"' : '' ;   
		                $selected4 = ( $invited_status == 4 ) ? 'selected="selected"' : '' ;   
		                $selected5 = ( $invited_status == 5 ) ? 'selected="selected"' : '' ;   
		                // echo " 
		                //   selected0 = $selected0 <br>
		                //   selected1 = $selected1 <br>
		                //   selected2 = $selected2 <br>
		                //   selected3 = $selected3 <br>
		                // ";  
		                // $description = explode('|', $description);  
		                $invited_wob = explode(',', $invited_wob); 
		                // echo "invited-table-container $invited_id"; 

		                // echo "date $invited_date <br> ";

		                // $pos = strpos( $invited_date , '000-');

		                // echo " pos = $pos <br> ";
		                // if ( $pos > 0 ) {
		                // 	 echo "date is not empty ";
		                // }
		                // else{
		                // 	 echo "date is empty ";	
		                // } 
		           	 	// design   
		                // if condition used to print the container if the function is not edit 
			      		// because edit is will replace the current value    
		                /*
						* get how many days passed after the first email sent out
		                */   

						if($invited_status==1) : 
		       	        	 
							$newdate     = Time::getDateRemoveTime($this->date_time); // convert to date new date  
	 						$curdate 	 = Time::getDateRemoveTime($DateTimeSend);   // convert to date current date   
	 						$days        = $this->time(  array( 'type'=>'get-time-deffirence', 'date1'=>$curdate , 'date2' => $newdate ) );   // get time difference   
 
	 					endif;  
		           	 	if ( $status != 'update' ): ?> <div class="invited-people-menu" id="invited-people-menu<?php echo $invited_id; ?>" style ='<?php echo $style; ?>'   > <?php endif; ?>  
		                	<tr  style='background-color:<?php echo$color;?>' > 
		                		<?php if( $i == 0 and $header == true ){ ?>
		                			<!-- <td ><b>Id#</b></td> -->



									<!-- <td></td>-->
	                				<td ></td>
	                				<th id="invited-people-date" > Date   
	                				</th>
	                				<th id="invited-people-name" > Name  </th>
	                				<th id="invited-people-email" > Email  </th> 
				                  	<th id="invited-people-domain" > Website  </th> 

				                  	<?php if ($invited_status == 7):?>
				                  		<th id="invited-people-status" > Status  </th>   
				                  	<?php endif; ?>
									<?php if(false): ?>
				                  		<th id="invited-people-status" title="this is the page from look scrapp" > Location(Address) </th>    
				                  	<?php endif; ?>
				                  	<th id="invited-people-status" title="gender"> Gender </th>   
				                  	<?php if ($invited_status == 12):?> 
				                  		<th id="invited-people-status" title="gender"> Activity </th>    
				                  	 <?php endif; ?>



									<?php if($invited_status==0||$invited_status==1||$invited_status==12): ?> 
			                  			<th id="invited-people-status" > Timezone Current Time </th>   
			                  		<?php endif; ?>  
									<?php if($invited_status==1): ?> 
                                    <!-- <th id="invited-people-status" > Timezone send Time</th>   -->
				                  	<th id="invited-people-status" > Email Sent  </th>   <tr>
                                      <!--  <th id="invited-people-status" > Time Interval  </th>  <tr>  -->
				                  	<?php else: ?> 
				                  	<tr>
				                  	<?php endif; ?>
				                 <?php } ?>  
				                <!-- <td><?php echo number_format($invited_id); ?></td> -->



							    <!-- <td>  <input type="checkbox" name="vehicle" value="--><?php //echo $invited_id; ?><!--" class='checkbox-time' > </td>-->
		                		<td style='width:30px;'  ><input type="button" onclick="fs_popup( 'popup-small' , 'invited-person' , '' , 'method' , '<?php echo $invited_id; ?>' , 'fs_invited' )" value="edit" > </td>
		                  		<td  id="invited-people-date" title="<?php echo $invited_date; ?>" > <?php echo   $invited_date." or ".$this->get_time_ago( $invited_date ); ?> </td>
		                  		<td  id="invited-people-name" ><?php echo $fullname; ?> </td>
								<td  id="invited-people-email" ><?php echo $invited_email; ?> </td> 
								<td  id="invited-people-domain" > <div style="width:100%;" > 
								<?php 
									$blogDomain = '';
									$c=0; 	
									$blogDomain .= " <a href='$domain_source' target='_blank' title='$domain_source' >domain$c</a>,"; 	

									for ($j=0; $j < count($invited_wob)-1; $j++)
									{  
										$url = $invited_wob[$j];    

										$pos = strpos($url,'ttp');

										if (strpos($url,'ttp') > 0)
										{

											//prevent username
											$c++;  
											$url = str_replace('[dot]', '.' , $url); 
									 	    $blogDomain .= " <a href='$url' target='_blank' title='$url' >domain$c</a>"; 

										}  
								 	}  

								 	echo '' . $blogDomain . '';
 
								 ?> </div>  </td>    

								 <?php if ($invited_status == 7):?>
			                  		<td  id="invited-people-status" >
			                  			<select class='scraped-status-select-parent' id="invited-status-dropdown<?php echo $invited_id; ?>" onchange="invited_person ( 'invited-person' , 'function' , '<?php echo "$invited_id" ?>' ,  '#invited-status-dropdown<?php echo $invited_id; ?>' , '#invited-table-container<?php echo $invited_id; ?>' ) " >
				                  			<option class='scraped-status-select-pending'   value="0" <?php echo $selected0; ?> > pending </option>
				                  			<option class='scraped-status-select-approved'  value="1" <?php echo $selected1; ?> > approved </option> 
				                  			<option class='scraped-status-select-delete'    value="4" <?php echo $selected4; ?> > delete </option>
				                  			<option class='scraped-status-select-delete'    value="5" <?php echo $selected5; ?> > need personal invite </option> 
			                  			</select>
			                  		</td>  
			                  	<?php endif; ?>  

			                  	<?php if(false): ?>
		                  			<td id="invited-people-status" ><?php echo $location; ?></td>   
		                  		<?php endif; ?>

		                  		<td id="invited-people-status" >   
		                  			<select onchange="updateGender(<?php echo "$invited_id"; ?>,this)" >  
		                  				<option value=""      >Gender</option>
		                  				<option value="Female">Female</option>
		                  				<option value="Male"  >Male</option> 
		                  			</select> 
		                  	 		<br>
		                  	 		<?php echo $gender; ?>
		                  		</td>  
		                  		<?php if ($invited_status == 12):?>
			                  		<td id="invited-people-status" >   
			                  			<?php  
			                  				$c = 1;
			                  				$res = $invited1->getActivity_();
			                  				if (!empty($res)) {
			                  					foreach ($res as $key => $activity) {
				                  				 	// echo " $key =>  <br>"; 
				                  				 	$action = $activity['fs_invited_activity_action'];  
				                  				 	$date = $activity['fs_invited_activity_date'];   
				                  				 	echo "$c.) ";
				                  				 	echo "$action  "; 
				                  				 	echo $this->get_time_ago($date); 
				                  				 	echo "</span><hr>";
				                  				 	$c++;  
				                  				}  	 
			                  				} 
			                  			?> 
			                  		</td>  
		                  		<?php endif; ?> 
 									<?php if($invited_status==0||$invited_status==1||$invited_status==12): ?>  
		                  			<td id="invited-people-email" > <?php echo " <b>$timezoneName</b>  <span style='font-size:9px;' > ($location) </span> <br>" . $Time['TimeZone']; ?> </td>  
		                  		<?php endif;  ?>
		                  		<?php if($invited_status==1) : ?>
		                  			<?php $date = substr($Time['TimeZone'],0,11); ?>
		                  			<td id="invited-people-email" >    
		                  				<select id='DateTimeSendId<?php echo $invited_id; ?>' >
		                  					 <!-- 2014-12-23 04:37:49 -->
		                  				 	<option value="<?php echo $newdate; ?> 08:00:00" >8:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 09:00:00" >9:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 10:00:00" >10:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 11:00:00" >11:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 12:00:00" >12:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 13:00:00" >1:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 14:00:00" >2:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 15:00:00" >3:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 16:00:00" >4:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 17:00:00" >5:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 18:00:00" >6:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 19:00:00" >7:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 20:00:00" >8:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 21:00:00" >9:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 22:00:00" >10:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 23:00:00" >11:00 PM</option>
		                  				 	<option value="<?php echo $newdate; ?> 00:00:00" >12:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 01:00:00" >1:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 02:00:00" >2:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 03:00:00" >3:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 04:00:00" >4:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 05:00:00" >5:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 06:00:00" >6:00 AM</option>
		                  				 	<option value="<?php echo $newdate; ?> 07:00:00" >7:00 AM</option>   
		                  				 </select> 
		                  				 <!-- <input type="datetime-local" value="2014-01-20T08:00:00" id='DateTimeSendId<?php echo $invited_id; ?>' />  --> 
		                  				 <input type="button" value="save" onclick="invited_person ('invited-person','UpdateSendTime','<?php echo $invited_id; ?>','#DateTimeSendId<?php echo $invited_id; ?>')"  />
		                  				<?php  
			                  				 //2014-01-20 08:00:00
			                  				$DateTimeSend1 = explode(' ',$DateTimeSend);
			                  				$time= explode(':',$DateTimeSend1[1]);
			                  				$hours=$time[0];
		                  				  	if ($hours > 11 ){
									 			$stat='PM';
									 			$s = 'color:blue';
								 		    }
									 		else{
									 			$stat='AM';
									 			$s = 'color:green';
									 		}  
									 		$hours = $this->conver_time24_to12($hours);   
									 		echo "<br><b><span style='$s'> $hours $stat </span></b>"; 
		                  				?>
		                  			</td> 
			                  		<td id="invited-people-email" > <?php echo $temail_sent; ?> </td> 
<!--			                  		<td id="invited-people-email" > --><?php //$remainingDays = $interval_time_send-$days; $dayname='Days'; if ($remainingDays==1) {  $dayname="<span style='color:red'>Day</span>"; }  echo $remainingDays." $dayname Remaining";  ?><!-- </td> -->
		                  		<?php endif; ?> 
		                  	<tr>
			      		<?php  
			      		// if condition used to print the container if the function is not edit 
			      		// because edit is will replace the current value  
				      	if ( $status != 'update' ):  ?></div> <?php   
		        		endif;
        			endfor;  
		   		} 
		   		public function invite_add_form($array=null, $currentLocation, $location=NULL) {   

		   				// echo " asdasdas".$array['invited_id'];
		   				$invited_id	 = ( !empty($array['invited_id']))  ? $array['invited_id']   : null ;
		   				$fullname	 = ( !empty($array['fullname']))    ? $array['fullname']     : null ;
		   				$email	 	 = ( !empty($array['email'])) 	    ? $array['email'] 	     : null ;
		   				$occupation	 = ( !empty($array['occupation']))  ? $array['occupation']   : null ;
		   				$style	 	 = ( !empty($array['style']))       ? $array['style']        : null ;
		   				$wob	 	 = ( !empty($array['wob']))         ? $array['wob'] 	     : null ;
		   				$tlook	     = ( !empty($array['tlook']))       ? $array['tlook'] 	     : null ;
		   				$city	 	 = ( !empty($array['city']))        ? $array['city'] 	     : null ;
		   				$state	 	 = ( !empty($array['state']))       ? $array['state'] 	     : null ;
		   				$country	 = ( !empty($array['country']))     ? $array['country']      : null ;
		   				$description = ( !empty($array['description'])) ? $array['description']  : null ;
		   				$status	 	 = ( !empty($array['status']))      ? $array['status'] 	     : null ;  
		   				$process  	 = ( !empty($array['invited_id']))  ? 'update' 	     	     : 'insert' ;  

		   				?> 
				        <div id="invited-add-container" > 
				          <center> 
				              <table border="0" cellpadding="0" cellspacing="0" id="invited-add-container-table" >
				                  <tr> 
				                    <td> 
				                      <table border="0" cellpadding="0" cellspacing="0"  style="width:100%" >
				                        <tr> 
				                          <td> <input type="text" placeholder='fullname'  name="fullname"      id="fullname"         value="<?php echo $fullname; ?>"      required /> </td> 
				                          <td> <input type="text" placeholder='email'           name="email"      id="email"            value="<?php echo $email; ?>"   required  /> </td>
				                      </table> 
				                    </td>
				                  <tr> 
				                    <td> 
				                      <table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
				                        <tr> 
				                          <td> <input type="text" placeholder='occupation'      name="occupation"      id="occupation"       value="<?php echo $occupation; ?>" /> </td> 
				                          <td> <input type="text" placeholder='style'           name="style"      id="style"            value="<?php echo $style; ?>" /> </td>
				                      </table> 
				                    </td>
				                  <tr>  
				                    <td> 
				                      <table border="0" cellpadding="0" cellspacing="0" style="width:100%"  >
				                        <tr> 
				                          <td  style="width:66.8%" > <input type="text" placeholder='website / blog'  name="wob"      id="wob"   value="<?php echo $wob; ?>"     />  </td> 
				                          <td> <input type="text" placeholder='tlook'  		name="tlook"      id="tlook"              value="<?php echo $tlook; ?>" /> </td>
				                      </table> 
				                    </td>
				                  <tr> 
				                    <td> 
				                      <table border="0" cellpadding="0" cellspacing="0" >
				                        <tr> 
				                          <td>  <input type="text" placeholder='city'     	 name="city"      id="city" value="<?php echo $city; ?>" /> </td> 
				                          <td>  <input type="text" placeholder='state'     	 name="state"      id="state" value="<?php echo $state; ?>" /> </td>  
				                          <td>  <input type="text" placeholder='country'     name="country"   id="country"    value="<?php echo $country; ?>" /> </td>
				                      </table> 
				                    </td>
				                  <tr> 
				                    <td> 
				                        <textarea placeholder='description'     name="description"   id="description" ><?php echo $description; ?></textarea>   
				                    </td>
				                    <tr>
	                                    <td> 
	                                      <select name="location" id="location">
	                                        <option>LOCATION</option>
	                                        <?php  
 												foreach ($location as $key => $value) 
 												{ 
 													$value = strtoupper($value);

 													if ($currentLocation == $value) 
 													{
 														 echo "<option value='$value' selected>$value</option>";  
 													}
 													else 
 													{
 														echo "<option value='$value' >$value</option>";  
 													}  
  												} 
 	                                        ?> 
	                                      </select>
					                    </td>
				                  </tr>
				                  <tr> 
				                    <td style="display:none" > 
				                      <input type="text" placeholder='status'          name="status"     id="status"       value="1" />   
				                      <input type="text" placeholder='status'          name="table_id"    id="table_id"       value="<?php echo $invited_id; ?>" />   
				                    </td>
				                  <tr> 
				                    <td>  
				                      <table border="0" cellpadding="0" cellspacing="0" style="width:AUTO"  >
				                        <tr>  
				                          <td>   
				                          	<input type="button" value="SAVE"   title="save" onclick=" invited_person ( 'invited-person' , '<?php echo $process; ?>' , '<?php echo $invited_id; ?>' , 'status_id' , 'container_id' )" /> 
				                          	<?php $this->image( array( 'type'=>'loader' , 'id'=>'collect-email-add-edit-popup-loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>
				                          </td> 
				                          <td> <input type="button" value="CANCEL" title="cancel"  style="BACKGROUND:#b01e23" onclick=" fs_popup( 'close' ) "  /> </td>
				                      </table> 
				                    </td> 
				              </table>  
				          </center> 
				        </div>  <?php 
		      	}     
			#END COLLECT EMAIL 
		// D
		// E
		    // NEW EMAIL 

		      	public function email( $array=null ) { 



		      		$email    = $array['email'];  // email of the person will recieved the information
		      		$gcode    = ( !empty($array['gcode']) ) ? $array['gcode'] : '' ; // generated code for the specific use
		      		$type     = $array['type'];   // kind of email to be sent
		      		$from     = "invite@fashionsponge.com"; // name where the email from 
		      		$subject  = 'Fashion Sponge'; // header of the email and display when its not oppend yet
		      		$body     = ''; // content of the email to be sent
		      		$header   = 'Your invitation is on its way 1'; // header of the email and it shows who sent the email and set the standard of the email if it will accept html or plain text

		      		switch ( $type ) {
		      			case 'send_invitation_email':   
		 						$name    = 'Jesus Erwin Suarez'; 
		 						$email   = 'mrjesuserwinsuarez@gmail.com';   
		 						$subject = 'An Invitation to Share Your Blog Content on Fashion Sponge';
							    $from    = 'mauricio@fashionsponge.com';
							    $type    = 'invitations';  
		 				 		$this->send_email_signup_to_user( $name , $email , $type , $from , $subject ); 
		 						echo "<h1 style='color:green'> email sent in  email( ):send_invitation_email </h1>";
		      				break;  
		      			case 'send_signup_email':  
		      					$header  = "From: $from\r\n"; 
							    $header .= "Content-type: text/html\r\n";  
		      					$subject = "send_signup_email"; 
		      					$body = "\n\nHi , \n ";  
		      					echo "<h1 style='color:red'> email sent in  email( ):send_signup_email </h1>";
		      				break; 
		      			case 'send_accesscode_email': 

		      					echo " sending now send_accesscode_email email <br>";
		      					$header  = "From: $from\r\n"; 
							    $header .= "Content-type: text/html\r\n";  
		      					$subject = "send_accesscode_email"; 
		      					$body = "\n\nHi 1  , click this link to register <a href='http://test.fashionsponge.com?gcode=$gcode'>http://test.fashionsponge.com?gcode=$gcode </a> \n ";   
		      					echo "<h1 style='color:yellow'> email sent in  email( ):send_accesscode_email </h1>";
		      				break; 
		      			case 'send_welcome_email': 
		      					$header  = "From: $from\r\n"; 
							    $header .= "Content-type: text/html\r\n";  
		      					$subject = "send_welcome_email"; 
		      					$body = "\n\nHi , \n ";  
		      					echo "<h1 style='color:blue'> email sent in  email( ):send_welcome_email </h1>";
		      				break; 
		      			case 'send_refferal_email': 
		      					$header  = "From: $from\r\n"; 
							    $header .= "Content-type: text/html\r\n";  
		      					$subject = "send_refferal_email"; 
		      					$body = "\n\nHi , \n ";   
		      					echo "<h1 style='color:pink'> email sent in  email( ):send_refferal_email </h1>";
		      				break; 
		      			default: 
		      				break;
		      		} 

					return mail("$email", $subject, $body, $header );   
		      	}
		      	public function emal_design( ) { ?>
		      		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html>
						    <head>
						        <!-- This is a simple example template that you can edit to create your own custom templates -->
						        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
						        <!-- Facebook sharing information tags -->
						        <meta property="og:title" content="*|MC:SUBJECT|*">
						        
						        <title>*|MC:SUBJECT|*</title>
								
							<style type="text/css">
								#outlook a{
									padding:0;
								}
								body{
									width:100% !important;
								}
								body{
									-webkit-text-size-adjust:none;
								}
								body{
									margin:0;
									padding:0;
								}
								img{
									border:none;
									font-size:14px;
									font-weight:bold;
									height:auto;
									line-height:100%;
									outline:none;
									text-decoration:none;
									text-transform:capitalize;
								}
								#backgroundTable{
									height:100% !important;
									margin:0;
									padding:0;
									width:100% !important;
								}
							/*
							@tab Page
							@section background color
							@tip Set the background color for your email. You may want to choose one that matches your company's branding.
							@theme page
							*/
								body,.backgroundTable{
									/*@editable*/background-color:#FAFAFA;
								}
							/*
							@tab Page
							@section email border
							@tip Set the border for your email.
							*/
								#templateContainer{
									/*@editable*/border:1px solid #DDDDDD;
								}
							/*
							@tab Page
							@section heading 1
							@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
							@theme heading1
							*/
								h1,.h1{
									/*@editable*/color:#202020;
									display:block;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:34px;
									/*@editable*/font-weight:bold;
									/*@editable*/line-height:100%;
									margin-bottom:10px;
									/*@editable*/text-align:left;
								}
							/*
							@tab Page
							@section heading 2
							@tip Set the styling for all second-level headings in your emails.
							@theme heading2
							*/
								h2,.h2{
									/*@editable*/color:#202020;
									display:block;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:30px;
									/*@editable*/font-weight:bold;
									/*@editable*/line-height:100%;
									margin-bottom:10px;
									/*@editable*/text-align:left;
								}
							/*
							@tab Page
							@section heading 3
							@tip Set the styling for all third-level headings in your emails.
							@theme heading3
							*/
								h3,.h3{
									/*@editable*/color:#202020;
									display:block;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:26px;
									/*@editable*/font-weight:bold;
									/*@editable*/line-height:100%;
									margin-bottom:10px;
									/*@editable*/text-align:left;
								}
							/*
							@tab Page
							@section heading 4
							@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
							@theme heading4
							*/
								h4,.h4{
									/*@editable*/color:#202020;
									display:block;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:22px;
									/*@editable*/font-weight:bold;
									/*@editable*/line-height:100%;
									margin-bottom:10px;
									/*@editable*/text-align:left;
								}
							/*
							@tab Header
							@section preheader style
							@tip Set the background color for your email's preheader area.
							@theme page
							*/
								#templatePreheader{
									/*@editable*/background-color:#FAFAFA;
								}
							/*
							@tab Header
							@section preheader text
							@tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
							*/
								.preheaderContent div{
									/*@editable*/color:#505050;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:10px;
									/*@editable*/line-height:100%;
									/*@editable*/text-align:left;
								}
							/*
							@tab Header
							@section preheader link
							@tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
							*/
								.preheaderContent div a:link,.preheaderContent div a:visited{
									/*@editable*/color:#336699;
									/*@editable*/font-weight:normal;
									/*@editable*/text-decoration:underline;
								}
								.preheaderContent div img{
									height:auto;
									max-width:600px;
								}
							/*
							@tab Header
							@section header style
							@tip Set the background color and border for your email's header area.
							@theme header
							*/
								#templateHeader{
									/*@editable*/background-color:#FFFFFF;
									/*@editable*/border-bottom:0;
								}
							/*
							@tab Header
							@section header text
							@tip Set the styling for your email's header text. Choose a size and color that is easy to read.
							*/
								.headerContent{
									/*@editable*/color:#202020;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:34px;
									/*@editable*/font-weight:bold;
									/*@editable*/line-height:100%;
									/*@editable*/padding:0;
									/*@editable*/text-align:center;
									/*@editable*/vertical-align:middle;
								}
							/*
							@tab Header
							@section header link
							@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
							*/
								.headerContent a:link,.headerContent a:visited{
									/*@editable*/color:#336699;
									/*@editable*/font-weight:normal;
									/*@editable*/text-decoration:underline;
								}
								#headerImage{
									height:auto;
									max-width:600px !important;
								}
							/*
							@tab Body
							@section body style
							@tip Set the background color for your email's body area.
							*/
								#templateContainer,.bodyContent{
									/*@editable*/background-color:#FDFDFD;
								}
							/*
							@tab Body
							@section body text
							@tip Set the styling for your email's main content text. Choose a size and color that is easy to read.
							@theme main
							*/
								.bodyContent div{
									/*@editable*/color:#505050;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:14px;
									/*@editable*/line-height:150%;
									/*@editable*/text-align:left;
								}
							/*
							@tab Body
							@section body link
							@tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
							*/
								.bodyContent div a:link,.bodyContent div a:visited{
									/*@editable*/color:#336699;
									/*@editable*/font-weight:normal;
									/*@editable*/text-decoration:underline;
								}
								.bodyContent img{
									display:inline;
									margin-bottom:10px;
								}
							/*
							@tab Footer
							@section footer style
							@tip Set the background color and top border for your email's footer area.
							@theme footer
							*/
								#templateFooter{
									/*@editable*/background-color:#FDFDFD;
									/*@editable*/border-top:0;
								}
							/*
							@tab Footer
							@section footer text
							@tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
							@theme footer
							*/
								.footerContent div{
									/*@editable*/color:#707070;
									/*@editable*/font-family:Arial;
									/*@editable*/font-size:12px;
									/*@editable*/line-height:125%;
									/*@editable*/text-align:left;
								}
							/*
							@tab Footer
							@section footer link
							@tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
							*/
								.footerContent div a:link,.footerContent div a:visited{
									/*@editable*/color:#336699;
									/*@editable*/font-weight:normal;
									/*@editable*/text-decoration:underline;
								}
								.footerContent img{
									display:inline;
								}
							/*
							@tab Footer
							@section social bar style
							@tip Set the background color and border for your email's footer social bar.
							*/
								#social{
									/*@editable*/background-color:#FAFAFA;
									/*@editable*/border:1px solid #F5F5F5;
								}
							/*
							@tab Footer
							@section social bar style
							@tip Set the background color and border for your email's footer social bar.
							*/
								#social div{
									/*@editable*/text-align:center;
								}
							/*
							@tab Footer
							@section utility bar style
							@tip Set the background color and border for your email's footer utility bar.
							*/
								#utility{
									/*@editable*/background-color:#FDFDFD;
									/*@editable*/border-top:1px solid #F5F5F5;
								}
							/*
							@tab Footer
							@section utility bar style
							@tip Set the background color and border for your email's footer utility bar.
							*/
								#utility div{
									/*@editable*/text-align:center;
								}
								#monkeyRewards img{
									max-width:160px;
								}
						</style></head>
						    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
						    	<center>
						        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
						            	<tr>
						                	<td align="center" valign="top">
						                        <!-- // Begin Template Preheader \\ -->
						                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">
						                            <tr>
						                                <td valign="top" class="preheaderContent">
						                                
						                                	<!-- // Begin Module: Standard Preheader \\ -->
						                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
						                                    	<tr>
						                                        	<td valign="top">
						                                            	<div mc:edit="std_preheader_content">
						                                                	Use one or two sentences in this area to offer a teaser of your email's content. Text here will show in a preview area in some email clients.
						                                                </div>
						                                            </td>
						                                            <td valign="top" width="180">
						                                            	<div mc:edit="std_preheader_links">
						                                                	<!-- *|IFNOT:ARCHIVE_PAGE|* -->Is this email not displaying correctly?<br><a href="*|ARCHIVE|*" target="_blank">View it in your browser</a>.<!-- *|END:IF|* -->
						                                                </div>
						                                            </td>
						                                        </tr>
						                                    </table>
						                                	<!-- // End Module: Standard Preheader \\ -->
						                                
						                                </td>
						                            </tr>
						                        </table>
						                        <!-- // End Template Preheader \\ -->
						                    	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
						                        	<tr>
						                            	<td align="center" valign="top">
						                                    <!-- // Begin Template Header \\ -->
						                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
						                                        <tr>
						                                            <td class="headerContent">
						                                            
						                                            	<!-- // Begin Module: Standard Header Image \\ -->
						                                            	<img src="http://gallery.mailchimp.com/653153ae841fd11de66ad181a/images/placeholder_600.gif" style="max-width:600px;" id="headerImage campaign-icon" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext>
						                                            	<!-- // End Module: Standard Header Image \\ -->
						                                            
						                                            </td>
						                                        </tr>
						                                    </table>
						                                    <!-- // End Template Header \\ -->
						                                </td>
						                            </tr>
						                        	<tr>
						                            	<td align="center" valign="top">
						                                    <!-- // Begin Template Body \\ -->
						                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateBody">
						                                    	<tr>
						                                            <td valign="top" class="bodyContent">
						                                
						                                                <!-- // Begin Module: Standard Content \\ -->
						                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
						                                                    <tr>
						                                                        <td valign="top">
						                                                            <div mc:edit="std_content00">
						                                                                <span class="h1">Heading 1</span>
						                                                                <span class="h2">Heading 2</span>
						                                                                <span class="h3">Heading 3</span>
						                                                                <span class="h4">Heading 4</span>
						                                                                <strong>Getting started:</strong> Customize your template by clicking on the style editor tabs up above. Set your fonts, colors, and styles. After setting your styling is all done you can click here in this area, delete the text, and start adding your own awesome content!
						                                                                <br>
						                                                                <br>
						                                                                After you enter your content, highlight the text you want to style and select the options you set in the style editor in the "styles" drop down box. Want to <a href="http://www.mailchimp.com/kb/article/im-using-the-style-designer-and-i-cant-get-my-formatting-to-change" target="_blank">get rid of styling on a bit of text</a>, but having trouble doing it? Just use the "clear styles" button to strip the text of any formatting and reset your style.
						                                                            </div>
																				</td>
						                                                    </tr>
						                                                </table>
						                                                <!-- // End Module: Standard Content \\ -->
						                                                
						                                            </td>
						                                        </tr>
						                                    </table>
						                                    <!-- // End Template Body \\ -->
						                                </td>
						                            </tr>
						                        	<tr>
						                            	<td align="center" valign="top">
						                                    <!-- // Begin Template Footer \\ -->
						                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
						                                    	<tr>
						                                        	<td valign="top" class="footerContent">
						                                            
						                                                <!-- // Begin Module: Standard Footer \\ -->
						                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
						                                                    <tr>
						                                                        <td colspan="2" valign="middle" id="social">
						                                                            <div mc:edit="std_social">
						                                                                &nbsp;<a href="*|TWITTER:PROFILEURL|*">follow on Twitter</a> | <a href="*|FACEBOOK:PROFILEURL|*">friend on Facebook</a> | <a href="*|FORWARD|*">forward to a friend</a>&nbsp;
						                                                            </div>
						                                                        </td>
						                                                    </tr>
						                                                    <tr>
						                                                        <td valign="top" width="370">
						                                                            <br>
						                                                            <div mc:edit="std_footer">
						                                                                *|IF:LIST|*
						                                                                <em>Copyright &copy; *|CURRENT_YEAR|* *|LIST:COMPANY|*, All rights reserved.</em>
						                                                                <br>
						                                                                <!-- *|IFNOT:ARCHIVE_PAGE|* -->
						                                                                *|LIST:DESCRIPTION|*
						                                                                <br>
						                                                                <strong>Our mailing address is:</strong>
						                                                                <br>
						                                                                *|HTML:LIST_ADDRESS_HTML|*
						                                                                <br>
						                                                                <!-- *|END:IF|* -->
						                                                                *|ELSE:|*
						                                                                <!-- *|IFNOT:ARCHIVE_PAGE|* -->
						                                                                <em>Copyright &copy; *|CURRENT_YEAR|* *|USER:COMPANY|*, All rights reserved.</em>
						                                                                <br>
						                                                                <strong>Our mailing address is:</strong>
						                                                                <br>
						                                                                *|USER:ADDRESS_HTML|*
						                                                                <!-- *|END:IF|* -->
						                                                                *|END:IF|*
						                                                            </div>
						                                                            <br>
						                                                        </td>
						                                                        <td valign="top" width="170" id="monkeyRewards">
						                                                            <br>
						                                                            <div mc:edit="monkeyrewards">
						                                                                *|IF:REWARDS|* *|HTML:REWARDS|* *|END:IF|*
						                                                            </div>
						                                                            <br>
						                                                        </td>
						                                                    </tr>
						                                                    <tr>
						                                                        <td colspan="2" valign="middle" id="utility">
						                                                            <div mc:edit="std_utility">
						                                                                &nbsp;<a href="*|UNSUB|*">unsubscribe from this list</a> | <a href="*|UPDATE_PROFILE|*">update subscription preferences</a><!-- *|IFNOT:ARCHIVE_PAGE|* --> | <a href="*|ARCHIVE|*">view email in browser</a><!-- *|END:IF|* -->&nbsp;
						                                                            </div>
						                                                        </td>
						                                                    </tr>
						                                                </table>
						                                                <!-- // End Module: Standard Footer \\ -->
						                                            
						                                            </td>
						                                        </tr>
						                                    </table>
						                                    <!-- // End Template Footer \\ -->
						                                </td>
						                            </tr>
						                        </table>
						                        <br>
						                    </td>
						                </tr>
						            </table>
						        </center>
						    </body>
						</html>
 
		      		<?php 
		      	}



		    // END EMAIL 
		// F


			#NEW FOOTER
				public function fs_footer( $footer_container_style , $footer_container_table_style ) { 
					require("fs_folders/page_footer/footer_php_file/footer1.php");
				}
			#END FOOTER




		    #NEW FLAG  


		        public function flag_ratings ( $flr_flagger , $flr_flagged  , $plno , $action , $flr_date  ) {  

		        	echo " flag_ratings ( $flr_flagger , $flr_flagged  , $plno , $action , $flr_date  )";
		        	$f = $this->get_my_rating_flag( $flr_flagger , $flr_flagged  , $plno ,  $action );   

		        	if ( $flr_flagger !=  $flr_flagged ) { 
			        	if ( !empty($f)) {
			        		echo " sorry , you already flag this ratings "; 
			        	}
			        	else{
			        		echo " insert new flag ";
			        		$this->add_new_rating_flag( $flr_flagger , $flr_flagged  , $plno , $action , $flr_date ) ;  
			        	}
		        	}
		        	else{
		        		echo "you are not allowed to flag to your self";
		        	}  
		        	// flr_no
		        } 
		        public function get_my_rating_flag( $flr_flagger , $flr_flagged , $plno ,  $action  ) {  
					
					return select_v3( 'fs_look_flag' , '*' , "flr_flagger = $flr_flagger and flr_flagged = $flr_flagged and plno = $plno and action = '$action'  " );
		        }
		        public function add_new_rating_flag( $flr_flagger , $flr_flagged  , $plno , $action , $flr_date ) {   
		        	echo "add_new_rating_flag( $flr_flagger , $flr_flagged  , $plno , $action , $flr_date  )"; 
		        	insert_v1( 
						array( 
				            'flr_flagger'   =>  $flr_flagger,  
				            'flr_flagged'   =>  $flr_flagged, 
				            'plno'          =>  $plno, 
				            'action'        =>  $action, 
				            'flr_date'      =>  $flr_date,   
				            'table_name'    =>  'fs_look_flag',
				            'row_id_name'   =>  'flr_no'
				        ) 
					);    
		        } 
		    #END FLAG 
			#NEW FOLLOWING AND FOLLOW  

		        public function delete_my_activity_wall_member_follow (  $mno , $_table_id , $action , $_table , $date_time , $type ) { 
		        	switch ( $type ) {
		        		case 'un-follow':
		        			echo "delete_my_activity_wall_member_follow(  $mno , $_table_id , $action , $_table , $date_time , $type )"; 
		        			mysql_query("DELETE FROM activity WHERE mno = $mno and _table_id = $_table_id and _table = '$_table' "); 
		        			break; 
		        		default:
		        			# code...
		        			break;
		        	}  
		        }
		        public function print_follow_unfollow (  $mno , $mno1  ) {   
					$followed = $this->check_if_already_followed( $mno , $mno1 );   
					// $mno1 = 133;
					if ( $mno != $mno1 ) {

						if ( empty($followed)) {

							echo "   
								<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='fs_folders/images/genImg/profile-follow.png' style='cursor:pointer;margin-top:1px;' onclick='follow_unfollow_fs_member ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" , \"profile\" )' /> 
							"; 
						}
						else{

							echo "  
								<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='fs_folders/images/genImg/profile-following.png' style='cursor:pointer;margin-top:1px;' onclick='follow_unfollow_fs_member ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" , \"profile\" )' /> 
							";

						} 
					} 
				}
		        public function get_my_followed_member_activity_post (  $action , $_table , $_table_id  ) {
		        	$r = select_v3( 
		        	 	'activity' , 
		        	 	'*' , 
		        	 	"_table = '$_table' and _table_id = $_table_id "
		        	);  
		        	return $r;
		        } 
				public function get_total_following ( $mno ) { 

					$res=selectV1(
						'*',
						'fs_follow',
						array(
							'mno'=>$mno 
						)  
					);
					// print_r($res);
					// echo " total ".count($res);
					return count($res);  
				}  
				public function get_total_follower ( $mno1 )  { 

					$res=selectV1(
						'*',
						'fs_follow',
						array(
							'mno1'=>$mno1 
						)  
					);
					return count($res); 
				}
				public function get_all_follower ( $mno1 )  { 

					$res=selectV1(
						'*',
						'fs_follow',
						array(
							'mno1'=>$mno1 
						)  
					);
					return $res; 
				}  
				public function update_following ( $tfollowing , $mno ) { 

	            	update1('fs_members','tfollowing',$tfollowing,array('mno',$mno)); 
		        }
		        public function update_follower ( $tfollower , $mno ) {
		        	
		            update1('fs_members','tfollower',$tfollower,array('mno',$mno)); 
		        }   
		        public function update_user_follower_and_following ( $mno , $mno1 ) {
		        	$new_tfollowing = $this->get_total_following( $mno ); 
	                $new_tfollower = $this->get_total_follower( $mno1 ); 
	                // echo "$mno = following $new_tfollowing , $mno1 = follower $new_tfollower ";
	                $this->update_following( $new_tfollowing , $mno  );
	                $this->update_follower( $new_tfollower , $mno1 );  
	                 // echo " total follower $tfollower new $new_tfollower following $tfollowing new $new_tfollowing <br>";
	                echo "succesfully followed";  
	                echo "<tfollowing>$new_tfollowing<tfollowing>";
	                echo "<tfollower>$new_tfollower<tfollower>";
		        }
			#END FOLLOWING AND FOLLOW     
		// G
		// H
		    #NEW HEADER
		    	public function fs_header( $mno , $style_bottom='width:1010px;' , $style_up='width:1009px;' , $style_main_table='width:100%' ,  $header_signout_search_field_style = 'margin-left:73px;margin-top:3px;' , $header_signout_login_signup_button_style = 'margin-left:52px; width:290px;' , $header_page=null ) {  
	    			/*
	    			$this->fs_header( 
						$mno, 
						'width:1012px;margin-left:-1px;',
						'width:1009px;',
						'width:100%',
						'margin-left:72px;margin-top:3px;',
						'margin-left:35px;'
					 );  
					*/


					if ( $mno == 136 ) { 
						require("fs_folders/page_header/header_php_file/header4_signOut.php");  
					}
	 				else if ( !empty($mno)  ) {   
						require("fs_folders/page_header/header_php_file/header3_signIn.php");   
						// require("fs_folders/page_header/header_php_file/header4_signIn.php");   
					}
					else {  
						// require ("fs_folders/page_header/header_php_file/header4_info.php"); 
						require("fs_folders/page_header/header_php_file/header3_signOut.php");  
						// require("fs_folders/page_header/header_php_file/header3_signIn.php");  
						// require("fs_folders/page_header/header_php_file/header1_signIn.php"); 
						// require("fs_folders/page_header/header_php_file/header1_signOut.php"); 
					}      
  
				}      

				public function header( $array ) {




					# initialized 

						$keySearch                      = $_SESSION['keySearch'];    
	 					$view_more 					    = $_SESSION['view_more'];  

 					# initialized built ine 

						$type                           = ( !empty($array['type']) ) ? $array['type'] : null ;   
 

					switch ( $type ) {
						case 'search-response': 

								#initialized  

									$text_more_member  = null;
									$text_more_article = null;
									$text_more_look    = null; 

								# retrieved response display limit 7 modals

			 			 			$member = $this->fs_search( 
			 			 				array( 
			 			 					'type'=>'select',
			 			 					'where'=> "keyword LIKE '%$keySearch%' and table_name = 'fs_members' ",
			 			 					'orderby'=> 'sno asc',
			 			 					'limit_start'=>0,
			 			 					'limit_end'=>$view_more
			 			 				)
			 			 			); 

			 			 			$article = $this->fs_search( 
			 			 				array( 
			 			 					'type'=>'select',
			 			 					'where'=> "keyword LIKE '%$keySearch%' and table_name = 'fs_postedarticles' ",
			 			 					'orderby'=> 'sno desc',
			 			 					'limit_start'=>0,
			 			 					'limit_end'=>$view_more
			 			 				)
			 			 			); 

			 			 			$look  = $this->fs_search( 
			 			 				array( 
			 			 					'type'=>'select',
			 			 					'where'=> "keyword LIKE '%$keySearch%' and table_name = 'postedlooks' ",
			 			 					'orderby'=> 'sno desc',
			 			 					'limit_start'=>0,
			 			 					'limit_end'=>$view_more
			 			 				)
			 			 			); 

			 			 		# retrieve total modal speifici search result

			 			 			$tmember = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',    'where'=>" keyword LIKE '%$keySearch%' and table_name = 'fs_members'  ", ) );
			 			 			$tmember = $tmember[0]['sno']; 
		 
			 			 			$tarticle = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',    'where'=>" keyword LIKE '%$keySearch%' and table_name = 'fs_postedarticles'  " ) );
			 			 			$tarticle = $tarticle[0]['sno']; 
		 
			 			 			$tlook = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',      'where'=>" keyword LIKE '%$keySearch%' and table_name = 'postedlooks'  " ) );
			 			 			$tlook   = $tlook[0]['sno']; 
		 
		 			 			# subtract the result and total count of the search

		 	 			 			$tmember  =  $tmember;   - count( $member ); 
			 			 			$tarticle =  $tarticle;  - count( $article ); 
			 			 			$tlook    =  $tlook;     - count( $look ); 

			 			 		# calculate result for view more text  

			 			 			if ( $tmember  > $_SESSION['view_more'] ) { 
			 			 				$text_more_member  = $_SESSION['view_more_text'];
 									} 
 									if ( $tarticle > $_SESSION['view_more'] ) { 
 										$text_more_article = $_SESSION['view_more_text'];
 									} 
 									if ( $tlook    > $_SESSION['view_more'] ) { 
 										$text_more_look   = $_SESSION['view_more_text'];
 									}   

 								# print dmain esign  

									echo "  	
										<div id='search-response-container' > 
											<table border='0' style='border:1px solid none' > 
												<tr>
													<td> 
														<center> 
															<div>";  
														 		$this->image( array( 'type'=>'loader' , 'id'=>'search-response-loader' , 'style'=>'visibility:hidden;height:10px;' ) ); echo "  
															<div>
														</center> 
													</td> 
												<tr> 
													<td> 
														<table id='search-response-display' border='0' cellspadding='0' cellspacing='0'  > 
															<tr>  
								 								<td> 	 
																	<div style='margin-left:10px;' > 
																		<ul>  
																			<li style='width:283px; border: 1px solid none; '  id='search-result-container-li' >  
																				<div id='search-response-title-1' style='padding-bottom:20px;margin-left:4px;'  >MEMBER</div> 
																				<div style='' id='search-content-result-cotainer-member' > ";  
																					if ( !empty( $member )) {	
																						for ($i=0; $i < count($member) ; $i++) {  
																							if ( $member[$i]['table_name'] == 'fs_members' ) { 
																								# initialized
																									$location = ''; 
																									$sno          = $member[$i]['sno'];  
																		 			 				$keyword      = $member[$i]['keyword']; 
																		 			 				$table_name   = $member[$i]['table_name']; 
																		 			 				$table_id     = intval($member[$i]['table_id']); 
																		 			 				$date         = $member[$i]['date'];      
																		 			 				$modal        = 'modal';     
																		 			 				$src 		  = $this->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );    
																		 			 				$link         = $this->set_link( $table_name , $table_id );    
																		 			 				$image        = " <img src='$src' style='$_SESSION[modal_style]' />";     
																	 			 				# get  member info
																		 			 				$minfo        = select_v4( array( 'type'=>'select',  'tablename'=>'fs_members', 'rows'=>'fullname , city , state_ , zip , country , tpercentage',    'where'=>" mno = $table_id " ) );   
																		 			 					$desc = ' percentage ( '.$minfo[0]['tpercentage'].'% ) ';  
																										if ( !empty($minfo[0]['country']) ) { 
																											$desc.=  ' <b>from:</b> <em>'.$minfo[0]['country'].'</em>'; 
																										}   
																			 			 				$title       = $minfo[0]['fullname'];  
																			 			 				$content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";    
																		 			 			# print modal info  
																									echo "  
																										 <a href='$link' >   
																	 			 							<div id='search-container-result-div'  >   
																	 			 								<table  border='0' cellspadding='0' cellspacing='2' style=' border-right:2px solid none;  '  > 
																	 			 									<tr> 
																	 			 										<td style='width:50px; border: 1px solid none;' >  
																	 			 											<div> $image  </div> 
																	 			 										</td>   
																	 			 										<td style='width:100%; border: 1px solid none; padding-right:5px;'  > 
																	 			 											<div style='font-family:arial' > $content </div>
																	 			 										</td> 
																	 			 										
																	 			 								</table>";  
																	 			 								echo " 
																	 			 							</div> 
																	 			 						</a>  
																									"; 
																							}
																						} 
																					}
																					else{
																						// echo " <div style='height:381px;' > </div> ";
																					} 

																					echo "   
																				</div>
																				<center>  
																					<table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' > 
											 			 								<tr> 
											 			 									<td>"; $this->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-member" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td> 
											 			 								<tr> 
											 			 									<td> <div id='search-response-title-2'  onclick=' header( \"view-more-search-result\" , event , \"header\" , \"fs_members\" , \"0\" , \"search-content-result-cotainer-member\" , \"#search-result-view-more-loader-member\" ) '   >  			  $text_more_member </div>  </td> 
											 			 							</table>  
																				<center> 
																			</li> 
																			<li style='width:283px; border: 1px solid none; '  id='search-result-container-li' > 
																				<div id='search-response-title-1'  style='padding-bottom:20px;margin-left:2px;'  >ARTICLE</div> 	
																				<div style='' id='search-content-result-cotainer-article' > ";  
								 													if ( !empty( $article )) {
																						for ($i=0; $i < count($article) ; $i++) {  
																							if ( $article[$i]['table_name'] == 'fs_postedarticles' ) { 
																								# initialized
																									$sno          = $article[$i]['sno'];  
																		 			 				$keyword      = $article[$i]['keyword']; 
																		 			 				$table_name   = $article[$i]['table_name']; 
																		 			 				$table_id     = intval($article[$i]['table_id']); 
																		 			 				$date         = $article[$i]['date'];  
																		 			 				$fullname     = 'content';
																		 			 				$modal        = 'modal'; 
																		 			 				$username     = 'username';   
																		 			 				$src 		  = $this->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );    
																		 			 				$link         = $this->set_link( $table_name , $table_id );    
																		 			 				$image        = " <img src='$src' style='$_SESSION[modal_style]' />";      
																	 			 				# get  article info
																		 			 				$articleinfo  = select_v4( array( 'type'=>'select',  'tablename'=>'fs_postedarticles', 'rows'=>'title,trating,tpercentage',    'where'=>" artno = $table_id " ) ); 
																		 			 				 
																		 			 			  	$title        = $articleinfo[0]['title'];
																		 			 				$desc         = "percentage (".$articleinfo[0]['tpercentage']."%) ";    
																		 			 				$desc        .= " rating (".$articleinfo[0]['trating'].")";   

																		 			 				$content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";    
																		 			 			# print modal info   
																								echo "  
																									 <a href='$link' >   
																 			 							<div id='search-container-result-div'  >   
																 			 								<table  border='0' cellspadding='0' cellspacing='2' style=' border:none;  '  > 
																 			 									<tr> 	
																 			 										<td style='width:50px; border: 1px solid none;' >  
																 			 											<div> $image  </div> 
																 			 										</td>
																 			 										<td style='width:100%; border: 1px solid none; padding-right:5px;'  > 
																 			 											<div style='font-family:arial' > $content </div>
																 			 										</td> 
																 			 									   
																 			 								</table>";  
																 			 								echo " 
																 			 							</div> 
																 			 						</a>  
																								"; 
																							}
																						} 
																					}
																					else{
																						// echo " <div style='height:381px;' > </div> ";
																					}  
											 			 							echo "  
											 			 						</div>
											 			 						<center> 
											 			 							<table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' > 
											 			 								<tr> 
											 			 									<td>"; $this->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-article" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td> 
											 			 								<tr> 
											 			 									<td> <div id='search-response-title-2'   onclick=' header( \"view-more-search-result\" , event , \"header\" , \"fs_postedarticles\" , \"0\" , \"search-content-result-cotainer-article\" , \"#search-result-view-more-loader-article\" ) '    > $text_more_article  </div>  </td> 
											 			 							</table>  
											 			 						<center> 
																			</li>
																			<li style='width:283px; border-left: 1px solid none; '  id='search-result-container-li' > 
																			 	<div id='search-response-title-1'  style='padding-bottom:20px;margin-left:0px;'  >LOOKS</div>  
																				<div style='' id='search-content-result-cotainer-look' > ";  
																					if ( !empty( $look )) {
																						for ($i=0; $i < count($look) ; $i++) {  
																							if ( $look[$i]['table_name'] == 'postedlooks' ) { 
																								# initialized
																									$sno          = $look[$i]['sno'];  
																		 			 				$keyword      = $look[$i]['keyword']; 
																		 			 				$table_name   = $look[$i]['table_name']; 
																		 			 				$table_id     = intval($look[$i]['table_id']); 
																		 			 				$date         = $look[$i]['date'];  
																		 			 				$fullname     = 'content';
																		 			 				$modal        = 'modal'; 
																		 			 				$username     = 'username';   
																		 			 				$src 		  = $this->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );    
																		 			 				$link         = $this->set_link( $table_name , $table_id );    
																		 			 				$image        = " <img src='$src' style='$_SESSION[modal_style]' />";    

																								# get  article info
																		 			 				$lookinfo     = select_v4( array( 'type'=>'select',  'tablename'=>'postedlooks', 'rows'=>'lookName,trating,tpercentage',    'where'=>" plno = $table_id " ) ); 
																		 			 		 
																		 			 			  	$title        = $lookinfo[0]['lookName'];
																		 			 				$desc         = "percentage (".$lookinfo[0]['tpercentage']."%) ";    
																		 			 				$desc        .= " rating (".$lookinfo[0]['trating'].")";   
																		 			 				$content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";     

																		 			 			# print modal info    

																								echo "  
																									 <a href='$link' >   
																 			 							<div id='search-container-result-div'  >   
																 			 								<table  border='0' cellspadding='0' cellspacing='2'    > 
																 			 									<tr> 
																 			 										<td style='width:50px; border: 1px solid none;' >  
																 			 											<div> $image  </div> 
																 			 										</td>   
																 			 										<td style='width:220px; padding-right:5px; border: 1px solid none;'  > 
																 			 											<div style='font-family:arial' > $content </div>
																 			 										</td> 
																 			 										
																 			 								</table>";  
																 			 								echo " 
																 			 							</div> 
																 			 						</a>  
																								";  
																							}
																						}    
																					}
																					else{

																						// echo " <div style='height:381px;' > </div> "; 
																						
																					} 
											 			 							echo"  
											 			 						</div> 
											 			 						<center>
											 			 							<table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' > 
											 			 								<tr> 
											 			 									<td>"; $this->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-look" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td> 
											 			 								<tr> 
											 			 									<td> <div id='search-response-title-2'   onclick=' header( \"view-more-search-result\" , event , \"header\" , \"postedlooks\" , \"0\" , \"search-content-result-cotainer-look\" , \"#search-result-view-more-loader-look\" ) '               >   $text_more_look          </div>    </td>     
											 			 							</table> 
											 			 						<center> 
																			</li> 
																		</ul> 
																	</div>
																</td>    
														</table>  
													</td> 
												<tr> 
													<td> 	
														<center>
															<div style='cursor:pointer' >
																  
															<div> 
														</center>
													</td>  
											</table> 
										</div>  
									";
							break; 
						default: 
								echo " header  ";
							break;
					}


				}


		    #END HEADER 
		// I


			#NEW IMAGE  

				public function image( $array ) {  

					$type  	 	=  (!empty($array['type']) )		? $array['type'] 	    : null;   
					$style  	=  (!empty($array['style']) )		? $array['style']  		: null;  
					$id     	=  (!empty($array['id']) ) 			? $array['id'] 			: null;  
					$class      =  (!empty($array['class']) ) 	    ? $array['class'] 	    : null;  
					$path       =  (!empty($array['path']) ) 	    ? $array['path'] 		: null;     
					$table_id   =  (!empty($array['table_id']) ) 	? $array['table_id'] 	: null;     
					$table_name =  (!empty($array['table_name']) )  ? $array['table_name']  : null;    
					$size       =  (!empty($array['size']) ) 	    ? $array['size'] 		: null;
					$imagepath  = (!empty($array['imagepath']) )    ? $array['imagepath'] 		: null;
					$response   = ''; 
 

					$image     =  (!empty($array['image']) )    ? $array['image'] 		: null;
					$overall   =  (!empty($array['overall']) )  ? $array['overall']     : null;
					$dpi       =  (!empty($array['dpi']) ) 	    ? $array['dpi'] 		: 300;


					// resize iamge 
					
						$nh    = (!empty($array['nh']) )    ? $array['nh'] 		: null; // 'new heiht';
						$nw    = (!empty($array['nw']) )    ? $array['nw'] 		: null; // 'new width';
						$nsrc  = (!empty($array['nsrc']) )  ? $array['nsrc'] 		: null; // 'new distination';
						$osrc  = (!empty($array['osrc']) )  ? $array['osrc'] 		: null; // 'old destination';     
  
					// $this->print_r1( $array ); 

					switch ( $type ) {
						case 'loader': 
								#$this->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test$ano" ,'style'=>'visibility:hidden;height:10px;'  ) );
								echo "<img src='fs_folders/images/attr/loading 2.gif' id='$id' class='$class' style='$style' >";  	
							break; 
						case 'get-default-image-src':  


								// $thisimage(   
								// 	array( 
								// 		'table_name'=> $table_name , 
								// 		'table_id'=> $table_id,
								// 		'size'=>'home' 
								// 	 )
								// );
								switch ( $table_name ):
									case 'fs_postedarticles':   
											if ( $size == 'thumbnail' || $size == 'small' ): 
												$response = ( file_exists( "$path"."$this->article_thumbnail/$table_id.jpg" )  ) ? "$this->article_thumbnail/$table_id.jpg" : "$this->article_thumbnail/default-article.jpg" ;    
											elseif ( $size == 'home' || $size == 'normal'): 
												$response = ( file_exists( "$path"."$this->article_home/$table_id.jpg" )  ) ? "$this->article_home/$table_id.jpg" : "$this->article_home/default-article.jpg" ;    
											elseif ( $size == 'detail' || $size == 'large'):  
												$response = ( file_exists( "$path"."$this->article_detail/$table_id.jpg" )  ) ? "$this->article_detail/$table_id.jpg" : "$this->article_detail/default-article.jpg" ;      
											else:  
											endif; 
										break;
									case 'postedlooks':  
 											if ( $size == 'thumbnail' || $size == 'small' ): 
												$response = ( file_exists( "$path"."$this->look_folder_thumbnail/$table_id.jpg" )  ) ? "$this->look_folder_thumbnail/$table_id.jpg" : "$this->look_folder_thumbnail/default-look.jpg" ;    
											elseif ( $size == 'home' || $size == 'normal'): 
												$response = ( file_exists( "$path"."$this->look_folder_home/$table_id.jpg" )  ) ? "$this->look_folder_home/$table_id.jpg" : "$this->look_folder_home/default-look.jpg" ;    
											elseif ( $size == 'detail' || $size == 'large'):  
												$response = ( file_exists( "$path"."$this->look_folder_lookdetails/$table_id.jpg" )  ) ? "$this->look_folder_lookdetails/$table_id.jpg" : "$this->look_folder_lookdetails/default-look.jpg" ;     
											elseif ( $size == 'original' || $size == 'verry large' ):  
												$response = ( file_exists( "$path"."$this->look_folder/$table_id.jpg" )  ) ? "$this->look_folder/$table_id.jpg" : "$this->look_folder/default-look.jpg" ;    												
											else:  
											endif;
										break;
									case 'fs_member_profile_pic': 
										break;
									case 'fs_member_timeline': 
										break;
									case 'fs_postedmedia': 
										break; 
									default: 
										break;
								endswitch;



								return $response; 
							break;
						case 'unlink':
							 	foreach ($imagepath as $key => $value ) {
							 			echo $value."<br>";
							 		    $response = @unlink($value); 
 										$this->message( " delete from folder $value " , $response , " " );
							 	}
							break; 
						case 'get-image-width-and-height-percentage-and-pexil': 

								#THIS CODE CAN FOUND ALSO IN THE BEEZTALK FUNCTION MYCLASS.PHP
								#$imagem - source of image
								#$dpi - resolution to convert E.g.: 72dpi or 300dpi 

								// function get_image_attribute( $image,  $overall  , $dpi ) { 

									# guide 
										/*
									    * image => this is the src of the image 
										*	$dpi => idk 
										*	$overall = > this is the total of the limit to calulate the percentage   
										* 
										*	sample query:: 
										*
										*    	$attr = get_image_attribute( "beeztalk_folders/media/image/3.jpg" , 700 , null );  
										*
										*		$height = $attr['percentage']['height']; 
										*		$width  = $attr['percentage']['width'];   
										*			# or 
										*		$height = $attr['pixel']['height']; 
										*		$width  = $attr['pixel']['width']; 
										*/ 
									# initialized  

										$dpi = 300;

								    #Create a new image from file or URL
								    $img = ImageCreateFromJpeg($image); 
								    #Get image width / height
								    $x = ImageSX($img);
								    $y = ImageSY($img); 
								    #Convert to centimeter
								    $h = $x * 2.54 / $dpi;
								    $l = $y * 2.54 / $dpi; 
								    #Format a number with grouped thousands
								    $h = number_format($h, 2, ',', ' ');
								    $l = number_format($l, 2, ',', ' '); 
								    #add size unit 

								    $px2cm['pixel']['height'] =  $y."px";
								    $px2cm['pixel']['width']  = $x."px";  

								    $py = $y/$overall*100;  
								    $px = $x/$overall*100;   
								    $px2cm['percentage']['height'] =  $py."%";
								    $px2cm['percentage']['width'] =  $px."%"; 
								    #return array w values
								    #$px2cm[0] = X
								    #$px2cm[1] = Y    
								    $response = $px2cm; 
								// }   
							break;
						case 'resize':   

							 	$image = new resizeImage(); 
							 	$image->load($osrc);    

			               		$response = $image->set_all_for_location( 
									$osrc,  // source image 
									$nsrc,  // save distination 
									$nw,  //width
									$nh,  //height
									$image // class object 
								);     

								return $response; 
							break;
						default: 
							break;
					}  
					return  $response;
				} 
				public function resize_image( $array ) { 



				   	/*

						$mc->resize_image( 
						  array( 
						    'id' =>12,
						    'source' => "$mc->article_detail/12.jpg",
						    'destination1' => "$mc->article_home/12.jpg",
						    'destination2' => "$mc->article_thumbnail/12.jpg",
						    'width1' => 270,
						    'width2' => 50 
						  )  
						);   
					*/	 


				    # home 
				    # thumbnail 
				    # detail   

				    $id           = $array['id']; 
				    $source       = $array['source']; 
				    $destination1 = $array['destination1']; 
				    $destination2 = $array['destination2'];  
				    $width1       = ( !empty($array['width1'])) ? $array['width1'] : 350 ;  
				    $width2       = ( !empty($array['width2'])) ? $array['width2'] : 50 ;  

				    $ri = new resizeImage(); 
				    $ri->load("$source");     

			    	// detail  

			              # original size   

			     	// feed 

			            $ri->set_all_for_location( 
			              	"$source",  // source image 
			              	"$destination1",  // save distination 
			              	$width1,  //width
			              	'',  //height
			              	$ri // class object 
			            );      

			      	// thumbnail

			            $response = $ri->set_all_for_location( 
			              	"$source",  // source image 
			              	"$destination2",  // save distination 
			              	$width2,  //width
			              	'',  //height
			              	$ri // class object 
			            );     
 
			        return $response; 
			    } 
			    public function upload_image( $array ) {   

			    	$tmp_name    = $array['tmp_name']; 
			    	$destination = $array['destination'];  


			    	echo " temp name = $tmp_name <br> destination = $destination <br> ";
			    	// if ( move_uploaded_file($_FILES["file"]["tmp_name"], "$this->ppic_orginal/$mppno.jpg") ): 
			    	if ( move_uploaded_file( $tmp_name , "$destination") ): 
		            	 return true;
		            else:
		            	return false; 
		            endif; 
			    }
			#END IMAGE 
			#NEW INIT 

				private $decimal = '0f'; 
			#END INIT  

			#NEW INVITE 
				public function invite_popup_general( $mno ) { 
					// if ( $mno == 136 ) {
						// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');  
					// } 


					 if ( $mno == 136 ) { 
					 	echo " logon";
					 } else{
					 	echo "not logon";
					 }


				}
				public function invite_hellobar( $mno , $use=false ) { 

					if ( $mno == 136 and $use == true ) { ?>   

						<script type="text/javascript" src="//s3.amazonaws.com/scripts.hellobar.com/f577f8a72ff54a4820a1e8b4aaca15eaea39cd2c.js"></script> <?php  
					} 
				} 
			#END INVITE  
		// J
		// K
		// L

			#NEW LOOK MODALS

				public function resize_posted_look( $plno , $source ) {   

					$ri = new resizeImage ();  
					$ri->load("$source/$plno.jpg");   



					
					if ( $ri->getWidth() > 300 ) { 
						#home
				 		$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_home/$plno.jpg",  // save distination 
							270,  //width
							'',  //height
							$ri // class object 
						);  
					  	#lookdetails
						$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_lookdetails/$plno.jpg",  // save distination 
							300,  //width
							'',  //height
							$ri // class object 
						); 
						# thumbnail
						$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_thumbnail/$plno.jpg",  // save distination 
							50,  //width
							'',  //height
							$ri // class object 
						);   
					}
					else {  
					 	#home
				 		$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_home/$plno.jpg",  // save distination 
							'',  //width
							'',  //height
							$ri // class object 
						); 
					  	#lookdetails
						$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_lookdetails/$plno.jpg",  // save distination 
							'',  //width
							'',  //height
							$ri // class object 
						); 
						# thumbnail
						$ri->set_all_for_location( 
							"$source/$plno.jpg" ,  // source image 
							"$this->look_folder_thumbnail/$plno.jpg",  // save distination 
							50,  //width
							'',  //height
							$ri // class object 
						);
					 } 
				} 
				public function postedlook_query( $value=array() ) {
			 		# sample query : 
			 		#  $this->member_profile_pic( array('mno'=>$mno , 'mppno'=>$mppno , 'action'=> 'Test' , 'type'=>'insert-new-profile-pic-db' ) );

			 		#initialized
				 		$mno     = ( !empty($value['mno'])   ) ? intval($value['mno'])    : 0;
				 		$plno    = ( !empty($value['plno'])  ) ? intval($value['plno'])   : 0;   
				 		$mppno   = ( !empty($value['mppno']) ) ? intval($value['mppno'])  : 0;  
				 		$type    = ( !empty($value['type'])  ) ? $value['type']           : null;  
				 		

 
			 		switch ( $type ) {
			 			case 'get-latest-all': 
			 					echo "get-latest-all<br>"; 
			 					$r = select_v3( 'postedlooks' , '*' , "mno = $mno order by plno desc limit 1" ); 
			 					// $this->print_r1($r);
			 					return $r;
			 				break;  
			 			case 'get-latest-plno': 
			 					// echo "get-latest-mppno<br>"; 
			 					$r = select_v3( 'postedlooks' , '*' , "mno = $mno order by plno desc limit 1" ); 
			 					// echo "plno = ".$r[0]['plno'].'<br>';
			 					return  (!empty($r[0]['plno'])) ? $r[0]['plno'] : 0; 
			 				break; 
			 			case 'get-all-postedlooks': 
			 			
			 					echo "get-all-profile-pic<br>"; 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno" ); 
			 					// $this->print_r1($r);
			 					return $r; 
			 				break;  
			 			case 'insert-new-look':  

			 					echo " insert new look ";
			 				break;  
			 			case 'delete-specific-look': 

			 					echo "delete-specific-profile-pic<br>"; 
			 				break;  
			 			default:   

			 					echo " no action happend for member profile pic <br>"; 
			 				break; 
			 		}  
			 	} 
			 	public function auto_adjust_cropping_width_height_area ( $min_height , $min_width , $img_height , $img_width )  {
			 		  
			       # load image and get height and width
			               
			        # if height >= 1050 return 1050 
			        # else return height 
			            if ( $img_height > $min_height ) { 
			                $dh = $img_height - $min_height;  
			                $qh = $dh/3;
			                $this->img_height = $min_height+$qh; 
			            }   
			            else{
			            	 $this->img_height = $img_height; 
			            }
			        # if width >= 1024 return 1024 
			        # else return width  
			            if (  $img_width > $min_width ) { 
			                $dh = $img_width - $min_width;  
			                $qw = $dh/4;
			                $this->img_width = $min_width+$qw; 
			            }
			            else{
			            	$this->img_width = $img_width;  
			            } 
			 	} 
			 	public function LOOK( $array ) { 

			 		$mno  		= $array['mno']; 
			 		$plno 		= $array['mno'];   
			 		$type 		= $array['type'];   
			 		$table_name = ( !empty($array['table_name']) ) ? $array['table_name'] : 'postedlooks' ;   
  
			 		
			 		switch ($type) {
			 			case 'get-all-looks-by-user':

			 					// $mc->LOOK( // array( 'type'=>'get-all-looks-by-user' , 'mno'=>$mno1 ) // )

			 					$mem=selectV1(
									'*',	
									$table_name,
									array('mno'=>$mno )
								);    
								return ( !empty($mem) ) ? $mem : null ;   

			 				break; 
			 			default: 
			 				break;
			 		}



			 	}

			#END LOOK MODALS

		    #NEW LOOK DETAILS COMMENT
		        // public function print_comment( ) { 
		        // } 
		    #END LOOK DETAILS COMMENT 

		    #NEW LOGIN AND SIGN UP 



			 	public function login_welcome_tab( $page ) { 

						switch ( $page ) {
							case 'about':     
									$wabout      = 'color:#d6051d; font-weight:bold;';
									$wabout1     = 'visibility:visible; !important;';
								break;  
							case 'select-brand':     
									$sbrand      = 'color:#d6051d; font-weight:bold;';
									$sbrand1     = 'visibility:visible; !important;';
								break;  
							case 'suggested-member':    
									$smem        = 'color:#d6051d; font-weight:bold;';
									$smem1       = 'visibility:visible; !important;';
								break;  
							case 'invite-friends':    
									$sifriends   = 'color:#d6051d; font-weight:bold;';
									$sifriends1  = 'visibility:visible; !important;';
								break;   
						}     ?>
						<table id="welcome-tabs-table" border="0" cellpadding="0" cellspacing="0" >
						<tr> 
							<td>  
								<table  border="0" cellpadding="0" cellspacing="0"  >
									<tr> 
									 	<!-- <td> <div id="wt"   onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$this->login_path_page/welcome/welcome-about.php"; ?>' , '#more_loading1 img'  , '1'  )" > <span  style="<?php echo $wabout; ?>" class='wt1' > ABOUT </span></div></a> </td> -->
									 	<td> <div id="wt" > <span  style="<?php echo $wabout; ?>" class='wt1' > ABOUT </span></div></a> </td>
									<tr> 
										<td> <div id="welcome-tab-underline" class="welcome-tab-underline1"      style="<?php echo $wabout1; ?>" >  </div> </td>
									<tr> 
										<td> <div id='more_loading1' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </td>
								</table> 
							</td>  
							<td style="display:none" >  
							 	
								<table  border="0" cellpadding="0" cellspacing="0"  >
									<tr> 
										<!-- <td>  <div id="wt"  style="<?php echo $sbrand; ?>"  onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$this->login_path_page/welcome/welcome-select-brands.php"; ?>' , '#more_loading2 img' , '2'  )" > <span  style="<?php echo $sbrand; ?>"  class='wt2' >SELECT BRAND </span></div></a>  </td> -->
										<td>  <div id="wt"  style="<?php echo $sbrand; ?>" > <span  style="<?php echo $sbrand; ?>"  class='wt2' >SELECT BRAND </span></div></a>  </td> 
									<tr> 
										<td> <div id="welcome-tab-underline" class="welcome-tab-underline2"     style="<?php echo $sbrand1; ?>" >  </div> </td>
									<tr> 
										<td> <div id='more_loading2' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </td>
								</table> 
							</td> 
							<td>  
								
								<table  border="0" cellpadding="0" cellspacing="0"  >
									<tr> 
										<!-- <td>   <div id="wt"   style="<?php echo $smem; ?>"     onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$this->login_path_page/welcome/welcome-suggested-member.php"; ?>' , '#more_loading3 img' , '3' )" > <span   style="<?php echo $smem; ?>" class='wt3' >SUGGESTED MEMBER </span></div></a>  </td> -->
										<td>   <div id="wt"   style="<?php echo $smem; ?>" > <span   style="<?php echo $smem; ?>" class='wt3' >SUGGESTED MEMBER </span></div></a>  </td>
									<tr> 
										<td> <div id="welcome-tab-underline" class="welcome-tab-underline3"     style="<?php echo $smem1; ?>" >  </div> </td>
									<tr> 
										<td> <div id='more_loading3' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </td>
								</table> 
							</td> 
							<td>   
								<table  border="0" cellpadding="0" cellspacing="0"  >
									<tr> 
										<!-- <td>  <div id="wt"  style="<?php echo $sifriends; ?>"  onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$this->login_path_page/welcome/welcome-invite-friends.php"; ?>' , '#more_loading4 img' , '4'  )"  > <span    style="<?php echo $sifriends; ?>" class='wt4' >INVITE FRIENDS </span></div></a>   </td> -->
										<td>  <div id="wt"  style="<?php echo $sifriends; ?>"   > <span    style="<?php echo $sifriends; ?>" class='wt4' >INVITE FRIENDS </span></div></a>   </td>
									<tr> 
										<td> <div id="welcome-tab-underline" class="welcome-tab-underline4"      style="<?php echo $sifriends1; ?>" >  </div> </td>
									<tr> 
										<td> <div id='more_loading4' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </td>
								</table> 
							</td> 
						</table> 
					<?php  
			 	} 
			 	public function login_popup( $mno , $page ) {

			 		if ( $mno == 136 )
                    {
			 			// if the person clicked the link sent to email for registration with code in the url fashionsponge.com?gcode=12e13123123 login area will auto show and already field with code
			 			if ( !empty($_SESSION['gcode']) || !empty($_SESSION['login']) )
                        {
			 				// set login form display when page loaded
                            $style = 'display:block';
                            unset($_SESSION['gcode']);
                            unset($_SESSION['login']);
			 			}
			 			else
                        {
			 				// default no code shows
			 				$style = 'display:none';
			 			}
			 			echo " <div id='login-wrapper'  style='$style'   > "; 
		 					echo "<div id='login-container' >   ";  
							echo "</div>";     
							echo "<div id= 'login-container1' >"; 
								$this->login_page1( $page );
							echo "</div>"; 	 
						echo "</div>"; 
						?><script type="text/javascript"> set_center( "#login-body-container" );</script><?php 
					}
					else
                    {

						$mem=selectV1(
							'*',	
							'fs_members',
							array('mno'=>$mno)
						);      
						$totalLogin = $mem[0]['tlog'];   

						// echo " tlogin $totalLogin<br> ";

 						// $totalLogin = 2 ;
 
						if ( $totalLogin == 2 or $totalLogin == 1 or $totalLogin == 0   ) {   
 
							//  check if the user has a code or dont then if don't then show the sign up code popup if has then show the popup welcome  	

								$response = $this->fs_signup_code(   array( 'type' =>'select-specific-mno','mno'=>$mno ) );  

								if ( empty($response) ) {   

									// update tlogin = 1 popuse is when it refresh again it still check the popup welcome because the login is still 1
										$this->update_total_login( $mno , 0 , true );   		 
										$page 		 = 'signup-code';  
 								}   

 							// print design

								echo " <div id='login-wrapper' > "; 
			 					echo "<div id='login-container' >   ";  
								echo "</div>";     
								echo "<div id= 'login-container1' >";     
									//$this->login_page1( $page );  
                            		require('welcome.php');  
								echo "</div>"; 	 
								echo "</div>";    

						}
					}
 				}
			 	public function send_verification_code_to_email( $email , $code , $fname ) {   
			 		// echo " $email , $code , $fname <br> "; 
					$subject = "Welcome to FashionSponge Verification";   
					$body = "\n\nHi , ".$fname.
					"\nPlease click this link to verify your account http://fashionsponge.com/verify?code=$code 
					 \n\n If you have any questions please contact us @: BrainOfFashion@gmail.com
					 \n\n\n From: Fashion Sponge Team";      
					return mail("$email", $subject, $body, "From: fashionsponge@fashionsponge.COM");   
			 	} 
			 	public function generate_vefirification_code( $text ) {  
			 		return  $this->encrypt_password( $text , 1000 ); 
			 	} 
			 	public function check_signup_fields ( $fname , $mail , $pass  , $uanswer ,  $ranswer , $signupcode , $login_error  ) {
			 			  
				 	// check if they are empty  
				 	
					 	if ( empty( $fname ) ) {
					 		$login_error .=  ' (*) first name ( required )<br>';  
					 		$this->error_red_field( 'fname' );
					 	}
					 	if ( empty( $mail ) ) {
					 		$login_error .= ( empty( $mail )) ? ' (*) email ( required )<br>' : null;  
					 		$this->error_red_field( 'mail' );
					 	}
					 	if ( empty( $pass ) ) {
					 		$login_error .= ( empty( $pass )) ? ' (*) password ( required )<br>' : null; 
					 		$this->error_red_field( 'pass' );
					 	}   
		 
					// check user name space 

					 	if ( $login_error == false ) {  
					 		if ( strpos($fname, ' ' ) )  { 
					 			$login_error .= '(*) username must not have space <br>';
					 			$this->error_red_field( 'fname' ); 
					 		} 
					 	} 

					// check user name  

					 	/*
						 	if ( $login_error == false ) { 
						 		$acc = selectV1(
									'*', 
									'fs_member_accounts',
									array('username'=>"$fname" )  
								);   
								if ( !empty($acc) ) {
									 $login_error .= '(*) username already used. <br>';
									 $this->error_red_field( 'fname' );
								}
							} 
						*/ 

				 	// check email if its correct or not

					 	if ( $login_error == false ) { 
					 		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
								$login_error .= '(*) email is not valid <br>';
								$this->error_red_field( 'mail' );
						  	}  
					 	}

					// check email if exist or not

					 	if ( $login_error == false ) { 
						 	$acc = selectV1(
								'*', 
								'fs_member_accounts',
								array('email'=>"$mail" )  
							);   
							if ( !empty($acc) ) {
								 $login_error .= '(*) email already used. <br>';
								 $this->error_red_field( 'mail' );
							}
	 					}

				 	// check password 

					 	if ( $login_error == false ) {  
					 		if ( strlen($pass) < 6 ) { 
								$login_error .= 'password must have 6 minimum characters <br>';
								$this->error_red_field( 'pass' );
					 		} 
					 	}  

					// check question  

					 	if ( $login_error == false ) {  
						 	if ( $uanswer != $ranswer ) { 
						 		$login_error .= '(*) please type the correct answer of the question <br>';
								$this->error_red_field( 'question' ); 		 
						 	}
						}  

					// validate the sign up code

 

						if ( empty( $signupcode ) ) { 
					 		$login_error .=  '(*) Please provide a virification code from fs administrator<br>';   
					 		$this->error_red_field( 'signupcode' );
					 	}  
					 	else{  
							$response = $this->fs_signup_code(   array(  'type' =>'select-specific-code', 'generated_code'=>$signupcode  )  ); 

							if( !empty($response))  {  
								if ( empty($response[0]['mno']) ) { 
								}
								else{ 

									$login_error .=  ' (*) Code allready in used <br>';  
									$this->error_red_field( 'signupcode' );
									// $smessage = "<span class='fs-text-red' > Code allready in used </span> "; 	 
								} 
						 	}
						 	else{ 
						 		$this->error_red_field( 'signupcode' );
						 		$login_error .=  ' (*) Code not exist. <br>';  
						 		// $smessage = "<span class='fs-text-red' > Code not exist </span> "; 	
						 	}   
						}

	 				return $login_error;
			 	}
		    	public function error_red_field( $field ) { 
					echo "<span style='display:none' >";
					 switch ( $field ) {
					 	case 'fname':
								echo "<fname>fname-error<fname>";
					 		break;
					 	case 'pass':
					 			echo "<pass>pass-error<pass>"; 
					 		break;
					 	case 'mail':
								echo "<email>email-error<email>";
					 		break;  
					 	case 'question':
					 		 	echo "<question>question-error<question>";
					 		break;
					 	case 'signupcode':
					 			echo "<signupcode>signupcode-error<signupcode>"; 
					 		break;
					 	default: 
					 		break;
					 }
					echo "</span>";
				}
		    	public function validate_fs_login_info ( $username , $password ) {
		    		// echo " validate fs login form $username , $password " ; 
		    		return $this->set_Login( $username , $password ,  array('tableName'=>'fs_member_accounts' , 'userRow'=>'username' , 'passRow'=>'pass' ) ); 
		    	}
		    	public function redirect_fs_login_info ( ) { 
		    		 // echo "redirect fs login form"; 
		    		 $this->go("home");
		    	} 
		        public function set_Login( $myusername , $mypassword , $array_db ) {	

		        	$tableName  = $array_db['tableName']; 
		        	$userRow  = $array_db['userRow']; 
		        	$passRow  = $array_db['passRow'];   
		        	$myusername = $this->secure_login_sql($myusername);
		        	$mypassword = $this->secure_login_sql($mypassword);  

		        	$logIn = selectV1(
					 	'*',
					 	$tableName ,
					 	array($userRow=>$myusername , 'operand1'=>'and' , $passRow => $mypassword ) 
					);  
		        	if (!empty($logIn) ) {
		        		return $logIn[0]['mno'];
		        	}
		        	else { 
		        		return false;
		        	}        	 
		        } 
		        public function print_login_stat_id ( $mno ) {  

		        	echo "<div style='display:none' id='print_login_stat_id' >$mno</div>";  
		        } 
		        public function set_Login_admin( $myusername , $mypassword , $array_db ) {	

		        	$tableName  = $array_db['tableName']; 
		        	$userRow  = $array_db['userRow']; 
		        	$passRow  = $array_db['passRow'];  

		        	$myusername = $this->secure_login_sql($myusername);
		        	$mypassword = $this->secure_login_sql($mypassword); 

		        	$logIn = selectV1(
					 	'*',
					 	$tableName ,
					 	array($userRow=>$myusername , 'operand1'=>'and' , $passRow => $mypassword ) 
					);  
		        	if (!empty($logIn) ) {
		        		return $logIn[0]['adm_no'];
		        	}
		        	else { 
		        		return false;
		        	}        	 
		        }
		        public function secure_login_sql ( $input ) {
		        	if ($_SERVER['HTTP_HOST'] == 'localhost')  { 
		        		# code
					}
					else { 
						$input = stripslashes($input);
						$input = mysql_real_escape_string($input);
					}

					return $input;
		        } 
		       	function redirect_to_login_or_Signup_if_user_is_not_login( $mno ,  $lastpagevisited='/' ) {    
		       		$_SESSION['lastpagevisited']  = $lastpagevisited; 
		       		if ( $mno == 136 ) { 
		       			$this->go('login'); 
		       		}	
		       		else if ( $mno < 1 ){ 
		       			$this->go('login'); 
		       		}else{
		       			return true;
		       		} 
		       	} 
		       	function save_current_page_visited( $pagesrc=null ) { 

		       		// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]  ";	 
		       		
		       		// echo "$actual_link "; 


		       		if ( !empty( $pagesrc )) {
		       			$actual_link = $pagesrc; 
		       		}
		       		else{
		       			$actual_link = $_SERVER['REQUEST_URI']; 	
		       		}




					switch ($actual_link) {
						case '/fs/new_fs/alphatest/login-authentication': 
								#excep this url
							break; 
						case '/login-authentication': 
								#excep this url
							break; 
						case '/fs/new_fs/alphatest/login':
								#excep this url
							break;
						case '/login':
								#excep this url
							break; 
						default:
								$_SESSION['lastpagevisited'] = $actual_link;
							break;
					} 
		       	}   
		       	public function social_site_login( $type ) {

		       		$article = new postarticle ( ); 
 					$image  = new resizeImage( );  

		       		switch ( $type ) {
						case 'facebook': ?>


						<div id="fb-root"></div> 

						    <script src="http://connect.facebook.net/en_US/all.js"></script>  
						    <script> 
							    FB.init({ 
							      appId: '528594163842974', 
							      cookie: true,
							      status: true, 
							      xfbml: true 
							    }); 
						    </script>    

					        <?php
					        /** 
					         * Copyright 2011 Facebook, Inc.
					         *
					         * Licensed under the Apache License, Version 2.0 (the "License"); you may
					         * not use this file except in compliance with the License. You may obtain
					         * a copy of the License at
					         *
					         *     http://www.apache.org/licenses/LICENSE-2.0
					         *
					         * Unless required by applicable law or agreed to in writing, software
					         * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
					         * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
					         * License for the specific language governing permissions and limitations
					         * under the License.
					         * get friend list: https://developers.facebook.com/docs/graph-api/reference/user/friendlists/
					         */




					        if ( $mno != 136 ) {
					        	// already logged in and redirecting to authenticate the account.

					        	// echo " mno $mno <br>";
					        	// $_SESSION['temp_mno'] = intval($mno);
					     	 	// $this->go( 'login-authentication' );  
					        }
					        else{ 

						        require '../../../fs_folders/API/facebook-php-sdk-master/src/facebook.php'; 
						        $facebook = new Facebook(array(
						          'appId'  => '528594163842974',
						          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
						        ));   
						        $user = $facebook->getUser();   
						        if ( $user ) { 
						          	try {  
						          		// $user_profile = $facebook->api('/me');
						            	echo "user logon!"; 
						          	} catch (FacebookApiException $e) {
						            	error_log($e);
						            	$user = null;
						            	echo "user logout!";
						          	}
						        }  
						        if ($user) {
						        	// echo " logout user";
						          	$logoutUrl = $facebook->getLogoutUrl(); 
						        } else { 

						        	echo " set parametter to login ";

						        	/*
								        $params = array(
								            'scope' =>'ads_management,create_event,create_note,email,export_stream,friends_about_me, 
								            	friends_activities, friends_birthday, friends_checkins, friends_education_history, friends_events, 
								            	friends_games_activity, friends_groups, friends_hometown, friends_interests, 
								            	friends_likes, friends_location, friends_notes, friends_online_presence, 
								            	friends_photo_video_tags, friends_photos, friends_questions, friends_relationship_details
								            	friends_relationships, friends_religion_politics, friends_status, friends_subscriptions
								            	friends_videos, friends_website, friends_work_history, manage_friendlists
								            	manage_notifications, manage_pages, offline_access, photo_upload, publish_actions
								            	publish_checkins, publish_stream, read_friendlists, read_insights, read_mailbox
								            	read_requests, read_stream, rsvp_event, share_item, sms, status_update, user_about_me
								            	user_activities, user_birthday, user_checkins, user_education_history, user_events
								            	user_games_activity, user_groups, user_hometown, user_interests, user_likes
								            	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
								            	user_questions, user_relationship_details, user_relationships, user_religion_politics
								            	user_status, user_subscriptions, user_videos, user_website, user_work_history
								            	video_upload xmpp_login', 
								            	'redirect_uri' => 'http://fashionsponge.com/login'
								        );
							        */  
						 
									$params = array(
							            'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
							            	user_games_activity, user_groups, user_hometown, user_interests, user_likes
							            	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
							            	user_questions, user_relationship_details, user_relationships, user_religion_politics
							            	user_status, user_subscriptions, user_videos, user_website, user_work_history
							            	', 
							            	'redirect_uri' => 'http://fashionsponge.com/login'
							        );  

						          	$statusUrl = $facebook->getLoginStatusUrl();
						          	$loginUrl = $facebook->getLoginUrl($params);  
						        }
					        }    
					        ?> 

					        <!doctype html>
					        <html xmlns:fb="http://www.facebook.com/2008/fbml">
					          <head> 
					            <title>php-sdk FS-LogIN</title> 
					          	</head>
					          	<body>
						          	<?php 
						          		echo " <br> user =  $user <br> ";
						          		// echo " <br> user= ".print_r( $user ).' <br> '; 
								     	if ( $user ){    

								     		$user_profile = $facebook->api('/me');
								     		$friends = $facebook->api('/me/friends');
								     		echo " facebook user logon."; 
								     		echo " 
												<a href='$logoutUrl'; >facebook Logout</a>
										        <a href='logout.php'>fs Logout</a> <br> 
										    ";  


										    echo " <h4> user facebook user logon info. </h4>";
										      echo '<pre>'; print_r($user_profile); echo '</pre>';
										    #saving to account info and user info.
										    // echo "<hr>";  



										    // freinds

										    	/*
													echo " <h4> user facebook user logon friends. </h4>";
											   		print_r($friends);   
											   	*/ 
												// sign up of get mno  
										   		

													$fs_user = selectV1('*','fs_members', array('fbid'=> intval($user_profile['id']) ) );   
													$mno1 = $fs_user[0]['mno'];  
												
					 
					 
													if ( !empty($mno1) ) { 

														#allready a members
															echo " 1.) fb user is already a member <br>";
															echo " 2.) update all friends , friends in fs and friends in fb <br> ";     
															$fb_friends = $this->get_logging_in_fb_friends_and_filter( $friends['data'] );
															$this->update_logging_in_fb_friends( $mno1 , $fb_friends['fb_all_freinds'] , $fb_friends['fb_freinds_on_fs'] , $fb_friends['fb_freinds_on_fb'] ); 
															$_SESSION['temp_mno'] = $mno1;  
															$this->go( 'login-authentication' );  
													}
													else{

														#new member   
															echo " 1.) fb user is a new member <br> ";  
															echo " 2.) add new info member to fashionsponge database [done] <br> "; 
															echo " 2.) add new account member to fashionsponge database [done] <br> "; 
															echo " 3.) update all friends , friends in fs and friends in fb [done] <br> ";  
															echo " 4.) get new profile pic from fb and save to fs [done]  <br> "; 
															echo " 5.) add activity action that new fs member joind and post it on the feed with the profile pic [done] <br> "; 
															echo " 6.) show profile information fields to fill up <br> ";
															echo " 7.) show suggested brand  <br> ";
															echo " 8.) show suggested member according to its style generated through the brands selected  <br> ";
															echo " 9.) a welcome fashionsponge message sent to email <br> "; 



															// fb info
																$fbid          = $user_profile['id'];   
																$firstname     = $user_profile['first_name'];
																$lastname      = $user_profile['last_name']; 
																$gender        = $user_profile['gender']; 
																$birthday      = substr($user_profile['birthday'], strlen($user_profile['birthday'] )-4 , strlen($user_profile['birthday'] ) );  
																$bio           = $user_profile['bio'];  
																$workwith      = $user_profile['work'][0]['position']['name'];  
																$workat        = $user_profile['work'][0]['location']['name'];    
																$email         = $user_profile['email']; 

																$username      = str_replace('.','', $user_profile['username']);   
																$username      = str_replace('and','', $username);  


															echo " <br><BR> FB INFO <br><BR><BR><BR>"; 
															// education
																$school_ex_len = count($user_profile['education'])-1;
																echo " total school expeience $school_ex_len <br> ";   
																	# college 
																	$studied_with           = $user_profile['education'][$school_ex_len]['concentration'][0]['name'];  
																	$studied_at             = $user_profile['education'][$school_ex_len]['school']['name'];  
																	$studied_graduate_date  = $user_profile['education'][$school_ex_len]['year']['name']; 
																 
																if ( empty($studied_at) ) {
																	# high school 
																	$studied_at             = $user_profile['education'][$school_ex_len-1]['school']['name']; 
																	$studied_graduate_date  = $user_profile['education'][$school_ex_len-1]['year']['name']; 
																}
					 										 



															echo " 										

																fbid = $fbid      <br> 
																firstname = $firstname  <br>
																lastname = $lastname   <br>
																gender = $gender    <br>
																birthday = $birthday  <br>
																bio = $bio       <br>
																work = $work          <br>
																workat = $workat        <br>
																studied_with = $studied_with   <br>
																studied_at = $studied_at     <br>
																studied_graduate_date = $studied_graduate_date <br>
																email = $email    <br>
																username = $username   <br><br><br><br><br><br> ";
					 
															/*
																$fbid = 100000954625049; 
																$firstname = 'Mary';
																$nickname  = 'Jean'; 
																$lastname = 'Suarez';   
															*/ 
															// insert new user info . 

																$b = insert( 
																	'fs_members',
																array( 
																	'firstname' , 
																	'nickname' ,
																	'lastname' , 
																	'fbid',
																	'aboutme',
																	'bdate', 
																	'gender', 
																	'work_at',
																	'occupation',  
																	'studied_at', 
																	'studied_with',
																	'studied_graduate_date', 
																	'datejoined'
																),array( 
																	$firstname, 
																	$nickname, 
																	$lastname, 
																	$fbid, 
																	$bio,
																	$birthday,
																	$gender, 
																	$workat,
																	$workwith,
																	$studied_at,
																	$studied_with,
																	$studied_graduate_date,
																	date("Y-m-d H:i:s")
																) ,  
																'mno' 
																); 
															// get new user info inserted 
																$userinfo  = $this->get_latest_user_info( ); 
																$mno       = intval($userinfo[0]['mno']); 


																// $email     = 'email@fashionsponge.com'; 
																// $username  = 'username.fashionsponge'; 
																// $pass      = '';  
															// insert new user account

																$b = insert(
																	'fs_member_accounts',
																	array( 
																		'mno', 
																		'email' ,
																		'username', 
																		'pass' 
																	),
																	array( 
																		$mno, 
																		$email, 
																		$username, 
																		'' 
																	), 
																	'mano' 
																); 
															// echo " new member <br>";  
															// $fs_user = selectV1('*','fs_members', array('fbid'=> intval($fbid) ) );    
															$fs_user =selectV1( '*', 'fs_members' ,null,'order by mno desc','limit 1' );  
															$mno1 = intval($fs_user[0]['mno']);     
															$fb_friends = $this->get_logging_in_fb_friends_and_filter( $friends['data'] );
															$this->update_logging_in_fb_friends( $mno1 , $fb_friends['fb_all_freinds'] , $fb_friends['fb_freinds_on_fs'] , $fb_friends['fb_freinds_on_fb'] ); 
															
																echo " big profile pic <br> ";
															  	$size = 'large';
								                                $url = "http://graph.facebook.com/$fbid/picture?type=$size"; 
								                                $headers = get_headers($url, 1); 
								                                if( isset($headers['Location']) ){  
								                                    $bigpicurl = $headers['Location']; // string
								                                }else{
								                                    echo "ERROR";
								                                }  
								                                echo "profile pic path src. $bigpicurl <br>";
								                                echo "<img src=\"$bigpicurl\"  />";  

								                                // download from fb photo server 
								                                	$mppno = $this->member_profile_pic_query( array('mno'=>$mno1 , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) );  
								                                	echo " your new profile pic in $mppno <br>";
					 												$article->download_image_from_other_site( $mppno , $bigpicurl , 'fs_folders/images/uploads/members/mem_original/' );  
					 												/*
									                                	$profile_fs_src_original   = 'fs_folders/images/uploads/members/mem_original';
									                                	$profile_fs_src_thumbnail  = 'fs_folders/images/uploads/members/mem_thumnails'; 
									                                	$profile_fs_src_profilepic = 'fs_folders/images/uploads/members/mem_profile';  
								                                	*/ 
								                                // resize the profile pic downloaded  
								                                	$this->resize_profile_pic_thumbnail_and_profile( $mppno );   
								                                	// $this->resize_fb_profile_pic( $mno1 , $image , $profile_fs_src_original , $profile_fs_src_thumbnail , $profile_fs_src_profilepic ); 
								                                // add activity post feed  
								                                	$this->add_activity_wall_post ( $mno1 , $mppno , 'Joined' , 'fs_members' , $this->date_time );  
																// redirect to the main page   
								                                $_SESSION['type'] = 'new-member-fb-login';
								                                $_SESSION['temp_mno'] = $mno1;  
								                                $_SESSION['lastpagevisited'] = 'profile_crop_display.php'; 
																$this->go( 'login-authentication' );   
													}   
													echo " ur mno $mno1 <br> ";  
													// add update friends on fb and on fs  
												    // updated 
												    #saving to fb_all_friends , fb_friends_on_fs , fb_friends on fb at [ user account info ]
												    // echo "<hr>";   
									  	}else{    
									  		// $b = updateArray('fs_members',array('fb_all_freinds'), array('505457421-+-549151146-+-'),'mno',$mno);
									  		// if ($b) {
									  		// 	echo " succesfully updated <br> ";
									  		// }else{
									  		// 	echo " failled to update ";
									  		// } 
								            echo "  
								                <a href='$loginUrl'>Login with Facebook</a> 
								            ";  
								            // $name = $this->get_facebook_user_info_by_fbid( $facebook , '100004690904448' ); 
								            // echo " fbid = 100004690904448 and name = $name <br>"; 
								   		}   
							    	?> 
					          	</body>
					        </html>  
							<?php 
							break;
						case 'twitter':
							# code...
							break;
						case 'google':
							# code...
							break;
						case 'tumblr':
							# code...
							break; 
						default:
							# code...
							break;
					} 
		       	}   
		       	public function sign_up_member( $array ) { 
 					$signup_error = false;
					foreach ( $array as $key => $value ) {
						// echo " $key => $value <br>";  

						

						switch ( $key ) {
							case 'email':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
										$this->style_email = 'border:1px solid red;';  
									}  
									$this->email = $value;
									// echo " email this $value<br>";  
								break;
							case 'password':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
										$this->style_password = 'border:1px solid red;';  
									}  

									$this->password = $value;
									// echo " password this $value<br>"; 
								break;
							case 'first name':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
										$this->style_fname = 'border:1px solid red;';  
									}  
									$this->fname = $value;
									// echo " first name this $value<br>";
									 
								break;
							case 'nick name':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
										$this->style_nname = 'border:1px solid red;';  
									}  
									$this->nname = $value;
									// echo " nickname  this $value<br>";
									 
								break;
							case 'last name':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
										$this->style_lname = 'border:1px solid red;';  
									}  
									$this->lname = $value;
									// echo " lastname this $value<br>";	 
								break;
							case 'birth year':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
									}  
									// echo " byear this $value<br>";	 
								break;
							case 'gender':
									if ( empty($value) ) {
										$signup_error .=  "(*) $key <br>";  
									}  
									// echo "gender this $value<br>";
								break; 
							default: 
								break;
						} 
					} 

					return $signup_error;
				}
				public function encrypt_password( $pass , $x ) {  
					for ($i=0; $i < $x ; $i++) { 
						$pass = md5($pass);
					} 
					return $pass;
				} 
				public function update_all_password_to_md5_save_to_fs_member( ) { 
					$accounts = selectV1(
					 	'*',
					 	'fs_member_accounts' 
					);     
					for ($i=0; $i < count($accounts) ; $i++) { 
						$p = $accounts[$i]['pass'];
						$m = $accounts[$i]['mno']; 
						$e = $accounts[$i]['email']; 
						$u = $accounts[$i]['username'];  
						echo " mno = $m pass $p <br>";  
						$b =  update1('fs_members','identity_login',$p,array('mno',$m)); 
						$b =  update1('fs_members','identity_username',$u,array('mno',$m)); 
						$b =  update1('fs_members','identity_email',$e,array('mno',$m)); 
						$p = $this->encrypt_password( $p , 1000 );  
						$b =  update1('fs_member_accounts','pass',$p,array('mno',$m)); 
						 
					} 
				}
		    #END LOGIN AND SIGN UP

			#NEW LOOK  



		       	function get_look_style_and_save_look_keyword ( ) {  
		       		if ( isset($_POST['look_style_keyword_submit']) ) { 
						$_SESSION['look_style']    = $_POST['look_style'];
						$look_style                = $_POST['look_style']; 
						$_SESSION['look_keyword']  = $_POST['look_keyword'];   

						// echo "  
						// 	look_keyword  = $_SESSION[look_style] <br>
						// 	look_style = $_SESSION[look_keyword] <br>
						// ";     

					} 
					else if ( !empty($_SESSION['look_style']) ) {  
						$look_style = $_SESSION['look_style']; 

					} 
					else{
						$style = array( 'Chic' , 'Menswear' , 'Preppy' , 'Streetwear' ); 
						$look_style = $style[rand(0,3)]; 						
					}

					return $look_style;
		       	}
				public function get_user_all_look ( $mno , $bytime ) { 
					$look=selectV1(
				     	"*",
					 	"postedlooks", 
					 	array( 'mno'=>$mno ) 
					);   
					return $look;
				}
				public function posted_look_info( $plno ) {  

					// echo "$plno"; 
					// $this->postedlooks = array();	
					// echo "plno here in class  = $plno ";			
				     // $plook  = select('postedlooks',10,array('plno',$plno));

					// $this->update_or_get_look_precentage( $plno ); 
					// $pltoplookrating = $this->get_one_look_info( $plno , 'pltoplookrating' ); 
					$plook = selectV1(
				     	'*',
					 	"postedlooks", 
					 	array('plno'=>$plno) 
					); 
				     // echo "<br><br><br><br>";
				     // print_r(  $plook);

				     // $pltags  = select('fs_pltag',11,array('plno',$plno),);
				     $pltags=selectV1(
				     	'*',
					 	"fs_pltag", 
					 	array('plno'=>$plno),
				        'order by pltgno asc'
					); 

					 //      $res = selectV1(
					 // 	'invited_genCode',
					 // 	'fs_invited',
					 // 	array('invited_email'=>$invited_email) 
					 // ); 
				    // $prates    = select('ratings',4,array('plno',$plno));
				    // $ploves    = select('pl_loves',3,array('plno',$plno));
				    // $pdrips    = select('pl_drips',3,array('plno',$plno));
				    // $pcomments = select('posted_looks_comments',5,array('plno',$plno));
				    $powner    = selectV1(
									'firstname,lastname,nickname',
									'fs_members',
									array('mno' =>intval($plook[0][1]))
								);

					   $lookOwnerName = $powner[0]['firstname'].' '.$powner[0]['nickname'].' '.$powner[0]['lastname']; 
					     // $lookOwnerName = 'jesus';
					  // print_r($pltags);
					   // print_r($powner);
					   // echo "full name = ". $lookOwnerName;  
					   
					   $activity = selectV1( 
					   		'*',
					   		'activity',
					   		array('_table_id' => $plno )
					   	);
					   // print_r($activity);

		          


					$this->postedlooks = array(
					   'lookOwnerName' =>  $lookOwnerName,
							    'plno' =>  $plook[0]['plno'], 
						         'mno' =>  $plook[0]['mno'], 
					    'lookOwnerMno' =>  intval($plook[0]['mno']),
						       'date_' =>  $plook[0]['date_'], 
						    'lookName' =>  $this->cleant_text_print_from_db( $plook[0]['lookName'] ), 
						   'lookAbout' =>  $this->cleant_text_print_from_db( $plook[0]['lookAbout'] ),
					    'article_link' =>  $plook[0]['article_link'], 
						    'occasion' =>  $plook[0]['occasion'], 
						    'season'   =>  $plook[0]['season'], 
						      'style'  =>  $plook[0]['style'],
						      'tlview' =>  number_format($plook[0]['tview']), 
					         'tdrip'   =>  number_format($plook[0]['tdrip']),  
						   'tfavorite' =>  number_format($plook[0]['tfavorite']),
						      'tshare' =>  number_format($plook[0]['tshare']), 
						  'pltcomment' =>  number_format($plook[0]['pltcomment']), 
						    'pltvotes' =>  number_format($plook[0]['pltvotes']),
					      'trating'    =>  number_format($plook[0]['trating']),
					      'keyword'    =>  $plook[0]['keyword'], 
					   'tpercentage'   =>  $plook[0]['tpercentage'],

						      'pltags' =>  $pltags,
						      'action' =>  ( !empty($activity[0]['action']) ) ? $activity[0]['action'] : 0    
					 );
					return $this->postedlooks;
				}
				public function delete_my_posted_look( $plno ) {   
				}   
				public function get_look_owner_mno( $plno ) {
					$look=selectV1(
				     	"*",
					 	"postedlooks", 
					 	array( 'plno'=> intval($plno) ) 
					);   
					return intval($look[0]['mno']); 
				}
			#END LOOK 

			#NEW LOOK COMMENT

				public function look_comment_css( $cno , $comment  ) {
					if ( strlen($comment) < 224) { 
						?><style type="text/css">
					   /*start css*/
					   /* new comment css */ 
							#comment_<?php echo $cno ?> {						 
								/*width: 540px;*/
								/*height: 40px;*/
								/*border: 1px solid #000;*/
								/*border-radius: 0px 0px 0px 20px;*/
								/*padding: 10px;*/
								/*<?php echo $borders ?>*/
								/*<?php echo $shadow ?>*/
								/*background-color: #fff;*/
							}
							.line_<?php echo $cno ?> { 
								/*margin-top:25px;*/
								/*width: 608px;*/
								/*float: left;*/
								/*color: #000;*/
								/*height: 200px;*/
								/*border-top: 1px solid #000; */
							}
							
							#img_like_<?php echo $cno ?>{ 
								/*border:1px solid #000;*/
								height:13px;
								cursor: pointer;
							}
							#img_dislike_<?php echo $cno ?>{ 
								/*border:1px solid #000;*/
								height:13px;
								cursor: pointer;
							}
							#comment_list_<?php echo $cno ?>{ 
								list-style: none;
								/*border: 1px solid red; */
							}
							.main_container li { 
								list-style: none;
							} 
						/* end reply comment css*/
						/*end css*/ 
						</style><?php 
					} else {  																															?>
						<style type="text/css">
							/* new comment css */
								#comment_<?php echo $cno ?> {
									/*width: 540px;*/
									/*height: auto;*/
								}
							/* end comment css*/ 
							/*new reply comment css */ 
							/* end reply comment css*/
						</style><?php 
					} 
				} 


				public function total_modal_comment($table_id, $table_name) {

					if('postedlooks') { 

						$comment = selectV1(
							'*',
							'posted_looks_comments',
							array('plno'=>$table_id ),
							'order by plcno desc' 
						);    

						$comment_len = count($comment); 

						return $comment_len; 

					} else {

						return 0;

					}
				 	
					
				}

				public function print_look_comment_v1( $mno , $plno , $comment1 , $post_comment , $dtime , $st , $nexprev=null , $sort='order by plcno asc' , $profilepath=null ) { ?> 
					<!--original file: look-comment-display old --> 
					<link rel="stylesheet" type="text/css" href="style.css">
					<div class='main_comment_container' style="border:1px solid none" >   
						<?php    
							echo "<li style='list-style:none'>";  

								// echo " print_look_comment( $mno , $plno , $comment1 , $post_comment , $dtime  , $nexprev=null )"; 

								if ( $post_comment=='init' ) {  

									// echo " comment initialized "; 
									$comment=selectV1(
										'*',
										'posted_looks_comments',
										array('plno'=>$plno ),
										$sort, 
										'limit 10'
									);  
									$_SESSION['plcnos_sortings'] = selectV1(
										'*',
										'posted_looks_comments',
										array('plno'=>$plno ),
										'order by plcno desc' 
									);   
									$comment_len = count($comment);   				 
								}
								else if ( $post_comment=='reply_a_comment' ) { 
									// if (strlen($comment)>0) {
									// 	insert(
									// 		'fs_plcm_reply',
									// 		array('plcno','mno','plcr_date','plcr_message'),
									// 		array($plcno,$_SESSION['mno'],$date_time['date_time'],tcleaner($comment)),
									// 		'plcr_no'
									// 	);
									// }
									// echo "reply comment";
								}
								else if($post_comment=='posted_a_comment') {  

									if ( !empty($comment1) ) {   

										$cadded  = $this->add_my_latest_look_comment( $mno , $plno , $this->clean_text_before_save_to_db( $comment1 ) , $dtime ); 
										$comment = $this->get_my_latest_look_comment( $mno , $plno );  
										$comment_len = 1;   
										// echo " comment posted $cadded now "; 
										$this->update_or_add_my_activity_wall_post( $mno , $plno , 'Commented' , 'postedlooks' , $dtime );  
										$this->update_look_row( $plno , 'pltcomment' , count($this->get_look_all_comments( $plno )) , 'postedlooks' );  
									}
									else{
										exit(); 
									}  
								}
								else if($post_comment =='live_check_new_message') {  
									$Tblen=get_total_len_comment($_SESSION['plno']);

									if (!empty($Tblen) and $Tblen != 0 ) 
									{ 
										#look have a comment
										if  ($_SESSION['cTblens'] > $Tblen) 
										{ 
							 		 
							 			}
							 			else if ($_SESSION['cTblens'] < $Tblen) 
							 			{
											$total_new_comment =  $Tblen - $_SESSION['cTblens'];
											$_SESSION['cTblens'] = $Tblen;
											// $comment=get_new_comments($_SESSION['plno'],$total_new_comment);			
											$comment_len = count($comment);
							 			}
									}else 
									{ 
										# look is empty
									}
								}
								else if ( $post_comment == 'sort' ) {  

									if ( !empty($_GET['sort_as']) ) { 
										unset($_SESSION['plcnos_sortings']);
										unset($_SESSION['showMoreCounter']);
										$_SESSION['plcnos_sortings'] = comments_sorted( $st , $_GET['sort_as'] );
										$showMore_start = 0;
										$showMore_stop = 10;
									}
									else 
									{ 
										#view more clicked.
										$showMore_start =  $_SESSION['showMoreCounter'];
										$showMore_stop =  $_SESSION['showMoreCounter']+10;
									} 
									$res = $_SESSION['plcnos_sortings'];
									$res_len = count($res);
									#$comment = $st->set_and_show_more_comments( $res , $showMore_start ,  $showMore_stop );
									$comment = $st->set_and_show_more_comments( $res , 0 ,  100 );
									$comment_len = count($comment);
								}
								else if ( $post_comment == 'next_prev' ) {  
									 // echo "  sort as $sort" ;  
										$comment = $this->get_look_all_comments( $plno , $sort );  
										if (!empty($comment)) {
											$start   = $this->get_loop_start( $nexprev , 10 );  
											$end     = $this->get_loop_end( $nexprev , 10 );  
										    $comment = $st->set_and_show_more_comments( $comment  ,  $start , $end ); 
											$comment_len = count($comment);
											// echo " <li> jesus start $start end $end </li>  ";  	 
										}else{
											$comment_len = 0; 
										} 
								}
								else { 
							 		# page loaded 
								 	unset($_SESSION['plcnos_sortings']);
									unset($_SESSION['showMoreCounter']);
									$showMore_start = 0;
									$showMore_stop = 10; // temporary set as 100 original is 10
									$_SESSION['plcnos_sortings'] = comments_sorted( $st , 'oldest' );
									$res_len = count($_SESSION['plcnos_sortings']); 
									// print_r($_SESSION['plcnos_sortings']); 
									#$comment = $st->set_and_show_more_comments( $_SESSION['plcnos_sortings'] ,  $showMore_start , $showMore_stop );
									$comment = $st->set_and_show_more_comments( $_SESSION['plcnos_sortings'] ,  0 , 100 );
							 
									 if ($comment == 0) 
									 {
									 	$_SESSION['cTblens']=0;
									 } else  { 
									 	$_SESSION['cTblens']=intval(count($comment));
									 } 
									$comment_len = count($comment); 
								}    


								// echo " next prev $nexprev  ssssssssssssssssss <br> ";
								// echo " plno $plno ";  
								// echo " $comment1 ";  
								// print_r($comment);

							echo "</li>";  
								$c=0;  
								$table_name = 'posted_looks_comments'; 	

								for ($i=0; $i < $comment_len  ; $i++ )  {  
								// for ($i=$comment_len-1; $i >= 0  ; $i--)  {    

									$c++;  
									$plcno       = $comment[$i]['plcno'];
									$cno         = $comment[$i]['plcno'];
									$plno        = $comment[$i]['plno'];
									$mno         = $comment[$i]['mno'];
									$date_       = $comment[$i]['date_'];
									$msg         = $comment[$i]['msg'];
									$plctlikes   = $comment[$i]['plctlikes'];
									$plctdislike = $comment[$i]['plctdislike']; 

									$meminfo = $this->get_user_full_fs_info ( $mno , null );  
									$dateTime =  $date_;

									$rating_img = $this->get_my_action_image_equivalent( $mno  , $plno , 'Rated' );   
									$this->look_comment_css( $cno , $mno );    
									$ovarating        = $meminfo['opercentage'];  
							 	    $fullname         = $meminfo['fullName']; 
							 	    $gender           = $meminfo['gender']; 
							 	    $tpercentage_look = $meminfo['tpercentage_look']; 

 									$member_avatar = $this->ppic_thumbnail."/".$comment[$i][2].".jpg";   
								    $shadow = ( $mno == $_SESSION['mno'] ) ?  'box-shadow: inset 0px 0px 4px 0px #000;' : '' ;  
								    $b = $this->get_your_look_comment_thumb_up_or_down( $_SESSION['mno'] , $plcno );   
								    // echo " $b "; 
 									$you_liked = ( $b == 'Thumb-Up' ) ? true : false ;
 									$you_disliked = ( $b == 'Thumb-Down' ) ? true : false ;  

 									$pt = $this->get_equivalent_user_percentage( $tpercentage_look , null );
 									$username = $this->get_username_by_mno( $mno );
									
 									
 									// set background image container white or grey  

	 									if ( $c%2==0 ) {
	 										$background_color  = 'background-color:white;';
	 									}
	 									else {
	 										$background_color  = '';
	 									}

 									// set flag icons 

	 									$modal['src_img_flag'] = "modal-flag.png";
										$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $cno and table_name= 'posted_looks_comments' and mno = $_SESSION[mno] "  )  );   
										if ( !empty($response) ) {
											$modal['src_img_flag'] = "large-flag-red.png";
										} 

										$edit_flag_id = " #edit-image-$cno,#edit-text-$cno, #flag-image-$cno, #flag-text-$cno, #delete-image-$cno, #delete-text-$cno";



										$message =   $this->cleant_text_print_from_db( $comment[$i][4] ); 
										echo "<span  style='display:none'>";
										$psrc =  $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath".$this->ppic_thumbnail  );  
										echo "</span>";
									?>  


 
		                        <?php 
			                        $this->comment_details_design(
			                        	array(
			                        		'username' => $username,
			                        		'psrc'=>$psrc,
			                        		'fullname'=>$fullname,
			                        		'dateTime'=>$dateTime,
			                        		'message'=>$message,
			                        		'cno'=>$cno , 
			                        		'you_liked'=>$you_liked , 
			                        		'you_disliked'=>$you_disliked,
			                        		'plctlikes'=>$plctlikes,
			                        		'plctdislike'=>$plctdislike,
			                        		'plno'=>$plno, 
			                        		'mno1'=>$comment[$i][2],
			                        		'src_img_flag'=>$modal['src_img_flag'], 
			                        		'table_name'  => 'posted_looks_comments'
			                        	) 
			                        );  


 
		                    	} 
		                    }

				public function print_look_comment( $mno , $plno , $comment1 , $post_comment , $dtime , $st , $nexprev=null , $sort='order by plcno asc' , $profilepath=null ) { ?>

					<!--original file: look-comment-display old --> 
					<link rel="stylesheet" type="text/css" href="style.css">
					<div class='main_comment_container' style="border:1px solid none" >  
						<?php    
							echo "<li style='list-style:none'>";  

								// echo " print_look_comment( $mno , $plno , $comment1 , $post_comment , $dtime  , $nexprev=null )"; 

								if ( $post_comment=='init' ) {  

									// echo " comment initialized "; 
									$comment=selectV1(
										'*',
										'posted_looks_comments',
										array('plno'=>$plno ),
										$sort, 
										'limit 10'
									);  
									$_SESSION['plcnos_sortings'] = selectV1(
										'*',
										'posted_looks_comments',
										array('plno'=>$plno ),
										'order by plcno desc' 
									);   
									$comment_len = count($comment);   				 
								}
								else if ( $post_comment=='reply_a_comment' ) { 
									// if (strlen($comment)>0) {
									// 	insert(
									// 		'fs_plcm_reply',
									// 		array('plcno','mno','plcr_date','plcr_message'),
									// 		array($plcno,$_SESSION['mno'],$date_time['date_time'],tcleaner($comment)),
									// 		'plcr_no'
									// 	);
									// }
									// echo "reply comment";
								}
								else if($post_comment=='posted_a_comment') {  

									if ( !empty($comment1) ) {   

										$cadded  = $this->add_my_latest_look_comment( $mno , $plno , $this->clean_text_before_save_to_db( $comment1 ) , $dtime ); 
										$comment = $this->get_my_latest_look_comment( $mno , $plno );  
										$comment_len = 1;   
										// echo " comment posted $cadded now "; 
										$this->update_or_add_my_activity_wall_post( $mno , $plno , 'Commented' , 'postedlooks' , $dtime );  
										$this->update_look_row( $plno , 'pltcomment' , count($this->get_look_all_comments( $plno )) , 'postedlooks' );  
									}
									else{
										exit(); 
									}  
								}
								else if($post_comment =='live_check_new_message') {  
									$Tblen=get_total_len_comment($_SESSION['plno']);

									if (!empty($Tblen) and $Tblen != 0 ) 
									{ 
										#look have a comment
										if  ($_SESSION['cTblens'] > $Tblen) 
										{ 
							 		 
							 			}
							 			else if ($_SESSION['cTblens'] < $Tblen) 
							 			{
											$total_new_comment =  $Tblen - $_SESSION['cTblens'];
											$_SESSION['cTblens'] = $Tblen;
											// $comment=get_new_comments($_SESSION['plno'],$total_new_comment);			
											$comment_len = count($comment);
							 			}
									}else 
									{ 
										# look is empty
									}
								}
								else if ( $post_comment == 'sort' ) {  

									if ( !empty($_GET['sort_as']) ) { 
										unset($_SESSION['plcnos_sortings']);
										unset($_SESSION['showMoreCounter']);
										$_SESSION['plcnos_sortings'] = comments_sorted( $st , $_GET['sort_as'] );
										$showMore_start = 0;
										$showMore_stop = 10;
									}
									else 
									{ 
										#view more clicked.
										$showMore_start =  $_SESSION['showMoreCounter'];
										$showMore_stop =  $_SESSION['showMoreCounter']+10;
									} 
									$res = $_SESSION['plcnos_sortings'];
									$res_len = count($res);
									#$comment = $st->set_and_show_more_comments( $res , $showMore_start ,  $showMore_stop );
									$comment = $st->set_and_show_more_comments( $res , 0 ,  100 );
									$comment_len = count($comment);
								}
								else if ( $post_comment == 'next_prev' ) {  
									 // echo "  sort as $sort" ;  
										$comment = $this->get_look_all_comments( $plno , $sort );  
										if (!empty($comment)) {
											$start   = $this->get_loop_start( $nexprev , 10 );  
											$end     = $this->get_loop_end( $nexprev , 10 );  
										    $comment = $st->set_and_show_more_comments( $comment  ,  $start , $end ); 
											$comment_len = count($comment);
											// echo " <li> jesus start $start end $end </li>  ";  	 
										}else{
											$comment_len = 0; 
										} 
								}
								else { 
							 		# page loaded 
								 	unset($_SESSION['plcnos_sortings']);
									unset($_SESSION['showMoreCounter']);
									$showMore_start = 0;
									$showMore_stop = 10; // temporary set as 100 original is 10
									$_SESSION['plcnos_sortings'] = comments_sorted( $st , 'oldest' );
									$res_len = count($_SESSION['plcnos_sortings']); 
									// print_r($_SESSION['plcnos_sortings']); 
									#$comment = $st->set_and_show_more_comments( $_SESSION['plcnos_sortings'] ,  $showMore_start , $showMore_stop );
									$comment = $st->set_and_show_more_comments( $_SESSION['plcnos_sortings'] ,  0 , 100 );
							 
									 if ($comment == 0) 
									 {
									 	$_SESSION['cTblens']=0;
									 } else  { 
									 	$_SESSION['cTblens']=intval(count($comment));
									 } 
									$comment_len = count($comment); 
								}    


								// echo " next prev $nexprev  ssssssssssssssssss <br> ";
								// echo " plno $plno ";  
								// echo " $comment1 ";  
								// print_r($comment);

							echo "</li>";  
								$c=0;  
								$table_name = 'posted_looks_comments'; 	

								for ($i=0; $i < $comment_len  ; $i++ )  {  
								// for ($i=$comment_len-1; $i >= 0  ; $i--)  {    

									$c++;  
									$plcno       = $comment[$i]['plcno'];
									$cno         = $comment[$i]['plcno'];
									$plno        = $comment[$i]['plno'];
									$mno         = $comment[$i]['mno'];
									$date_       = $comment[$i]['date_'];
									$msg         = $comment[$i]['msg'];
									$plctlikes   = $comment[$i]['plctlikes'];
									$plctdislike = $comment[$i]['plctdislike']; 

									$meminfo = $this->get_user_full_fs_info ( $mno , null );  
									$dateTime = $this->dateTime_convert( $date_ );   

									$rating_img = $this->get_my_action_image_equivalent( $mno  , $plno , 'Rated' );   
									$this->look_comment_css( $cno , $mno );    
									$ovarating        = $meminfo['opercentage'];  
							 	    $fullname         = $meminfo['fullName']; 
							 	    $gender           = $meminfo['gender']; 
							 	    $tpercentage_look = $meminfo['tpercentage_look']; 

 									$member_avatar = $this->ppic_thumbnail."/".$comment[$i][2].".jpg";   
								    $shadow = ( $mno == $_SESSION['mno'] ) ?  'box-shadow: inset 0px 0px 4px 0px #000;' : '' ;  
								    $b = $this->get_your_look_comment_thumb_up_or_down( $_SESSION['mno'] , $plcno );   
								    // echo " $b "; 
 									$you_liked = ( $b == 'Thumb-Up' ) ? true : false ;
 									$you_disliked = ( $b == 'Thumb-Down' ) ? true : false ;  

 									$pt = $this->get_equivalent_user_percentage( $tpercentage_look , null );
 									$username = $this->get_username_by_mno( $mno );
									
 									
 									// set background image container white or grey  

	 									if ( $c%2==0 ) {
	 										$background_color  = 'background-color:white;';
	 									}
	 									else {
	 										$background_color  = '';
	 									}

 									// set flag icons 

	 									$modal['src_img_flag'] = "modal-flag.png";
										$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $cno and table_name= 'posted_looks_comments' and mno = $_SESSION[mno] "  )  );   
										if ( !empty($response) ) {
											$modal['src_img_flag'] = "large-flag-red.png";
										} 

										$edit_flag_id = " #edit-image-$cno,#edit-text-$cno, #flag-image-$cno, #flag-text-$cno, #delete-image-$cno, #delete-text-$cno";



										$message =   $this->cleant_text_print_from_db( $comment[$i][4] ); 
										echo "<span  style='display:none'>";
										$psrc =  $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath".$this->ppic_thumbnail  );  
										echo "</span>";
									?>  
 

								<div  id='comment_list_<?php echo $cno; ?>'  class='main_container' style=' border:1px solid none; ' > 
									<li>  
										<!-- new main comment  --> 
										<div style="margin-top:15px;" > 
											<table border="0" id='comment_container' class='comment_container' style='border:1px solid none;<?php echo $background_color; ?>' onmouseover="modal ( 'mouse-enter-to-comment' , '<?php echo $edit_flag_id; ?>' )" onmouseout="modal ( 'mouse-out-to-comment' , '<?php echo $edit_flag_id; ?>' )"  >  
												<tr>
												<td>  
													<table border="0" id='img' class='img'  > 
														<td>
															<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath".$this->ppic_thumbnail  ); ?> 
														</td><tr>
														<td><span class='red_bold' id='percentage' title='<?php echo $pt ?>' ><?php echo "$tpercentage_look% " ?></span></td>
													</table> 
													<div id='comment_body_container' class='comment_body_container'   > 
														<div id='comment_header_container' >  
															<table  border="0" > 
																<td>
																	<a href="<?php echo "$username"; ?>" style='text-decoration:none' target='_parent' >
																		<span id='full_name_<?php echo $cno; ?>' class='blue_bold' >
																			<?php echo $fullname; ?>  
																		</span> 
																	</a>
																</td> <td></td> 

																<td>
																<table border="0" cellpadding="0" cellspacing="0" id="comment-modal-gender" >
																	<tr>
																		<td> <div class='blue_bold' style="font-size:11px;" > ( </div>  </td>
																		<td> <div  id='gender' class='blue' style="font-size:12px; margin-left:5px" > <?php echo $gender; ?>  RATED  </div>   </td>
																		<td> <div class='rating_view' style="margin-left:5px"  > <?php echo "$rating_img"; ?> </div>    </td>
																		<td> <div class='blue_bold' style="margin-left:5px;font-size:12px;" > ) </div>   </td>
																</table>  
																</td>
																<td>
													 				<?php 
														 			// 	$replies=selectV1(
																		// '*',
																		// 'fs_plcm_reply',
																		// array('plcno'=>$cno)
																		// );	
														 			// 	if (empty($replies)) {
														 			// 		$rLen = 0;
														 			// 	}else { 
														 			// 		$rLen = count($replies);
														 			// 	} 
														 			?> 
														 			<?php if (false) { ?>
														 			<span class='blue_bold'> (  </span>
													 				<span id='viewReplies' class='viewReplies_<?php echo $cno; ?>' onclick='viewReplies("<?php echo $cno; ?>") ' >View replies</span><span class='totalReplies'> ( <?php  echo $rLen; ?> ) </span> 
													 				 <span class='blue_bold'> ) </span>
												 					<?php } ?> 
																</td>
															</table>  
														</div>
												 		<div class='rcomment' id='comment_<?php echo $cno; ?>' >

												 			<?php  
													 		  	// $you_liked=you_like_this_comment($comment[$i][0],$_SESSION['mno']);
													 		  	// $you_disliked=you_dislike_this_comment($comment[$i][0],$_SESSION['mno']); 
													 		  
													 		  	// if (!empty($last_comment)) {
													 		  	// 	echo  $comment[$last_comment][4];
													 		  	// }else {  
													 		  		// echo  $comment[$i][4];
													 		  	// } 
												 		  	?>  

															<div class="comment_span_content_container"  id='comment_span_<?php echo $cno; ?>' >
																<div>
																	<?php echo  $this->cleant_text_print_from_db( $comment[$i][4] ); ?>
																</div>
															</div>
												 		</div>
												 		<div id='comment_footer_Container' > 
												 		 	 <table border="0" >  
												 		 	 	<td>  
												 		 	 		<span id='comment_time'>   
												 		 	 			<!-- POSTED ON  <?php  echo $dformat['month'].' , '.$dformat['day'].' , '.$dformat['year'].' | '.$dformat['hour'].':'.$dformat['min'].' '.$dformat['stat'];   ?>  -->
												 		 	 			POSTED ON  <?php  echo $dateTime;   ?> 
												 		 	 		</span> 
												 		 	 	</td>
												 		 	 	<td></td> <td></td>
												 		 	 	<td>
												 		 	 		<div style='margin-top:-2px;' >
												 		 	 				<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'Thumbs-Up' , $plno ); ?> 
												 		 	 		</div>
												 		 	 	</td>
												 		 	 	<td></td> <td></td>
												 		 	 	<td> 
													 		 	 	<span class='red_bold' id="<?php echo "like_".$cno; ?>" >  
													 		 	 		 <?php  echo " $plctlikes  ";  ?> 
													 		 	 	</span>
													 		 	</td>

												 		 	 	<td></td> <td></td>
												 		 	 	<td> 
													 		 	 	<td>
													 		 	 		<div style='margin-top:-2px;' >
														 		 	 		<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'Thumbs-Down' , $plno );   ?>
													 		 	 		</div>
													 		 	 	</td>
													 		 	 	<td></td> <td></td>
													 		 	 	<td> 
														 		 	 	<span class='red_bold' id="<?php echo "dislike_".$cno; ?>" >  
								 										<?php echo " $plctdislike"; ?> 
														 		 	 	</span>
														 		 	</td>
												 		 	 	</td>
												 		 	 	<td></td>
												 		 	 	<?php 
												 		 	 		//if ($_SESSION['mno'] != $comment[$i][2]  ) { 
												 		 	 	 	if (false) { 
												 		 	 		?>
												 		 	 	<td> 
												 		 	 		<td> 
												 		 	 			<img src="<?php echo $this->img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno."-0"; ?>")' />
												 		 	 		</td>
												 		 	 		<td>  
													 		 	 		<span class='red_bold' > 
													 		 	 			REPLY 
													 		 	 		</span>
												 		 	 		</td>
												 		 	 	</td>	
												 		 	 	<td></td>
												 		 	 	<?php  } ?>
												 		 	 	<?php if ($_SESSION['mno'] == $comment[$i][2]  ) { ?>
															 		 <td></td>
															 		 <td> 
															 		 	<td id='edit-image-<?php echo $cno; ?>' style='display:none' >  
															 		 		<img src="<?php echo $this->path_icons; ?>/comment-edit.png"  class='img_like'  title='reply comment'  onclick="fs_popup( 'popup-small' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )"  />
															 		 	</td>
															 		 	<td id='edit-text-<?php echo $cno; ?>'  style='display:none' >  
																 	 		<span class='red_bold' onclick="fs_popup( 'popup-function' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )" style='cursor:pointer'  > 
																 	 			EDIT
																 	 		</span>
															 		 	</td>
															 		</td>	
															 	<?php } ?>
															 	<?php  
															 		if ($_SESSION['mno'] !=  $comment[$i][2] ) {  ?>
												 		 	 	<td></td>  
												 		 	 	<td> 
												 		 	 		<td id='flag-image-<?php echo $cno; ?>' style='display:none'  >  
												 		 	 			<!-- <img src="<?php echo $this->path_icons; ?>/comment-flag.png"  class='img_like'  title='flag comment'  onclick='look_comment_attr_clicked("<?php echo "flag_$cno"; ?>")' />
												 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
												 		 	 			</div> --> 
												 		 	 			<img src="<?php echo "$this->genImgs/$modal[src_img_flag]"; ?>"  class='img_like' id='comment-flag-icon<?php echo  $cno ?>'  title='flag comment'   onclick="flag ( 'fs-flag' , '<?php echo 'posted_looks_comments'; ?>' , '<?php echo $cno ?>' , '#comment-flag-icon<?php echo $cno ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " /> 
												 		 	 		</td>
												 		 	 		<td id='flag-text-<?php echo $cno; ?>'  style='display:none'  >  
													 		 	 		<span class='red_bold' > 
													 		 	 			FLAG
													 		 	 		</span>
												 		 	 		</td>
												 		 	 	</td>
												 		 	 	<?php } ?>
												 		 	 	<?php if ($_SESSION['mno'] == $comment[$i][2] or $_SESSION['mno'] == get_look_owner($_SESSION['plno']) ) { ?>
												 		 	 	<td></td> 
												 		 	 	<td> 
												 		 	 		<td id='delete-image-<?php echo $cno; ?>' style='display:none'  >  
												 		 	 			<img src="<?php echo $this->path_icons; ?>/coment-delete.png"  class='img_like' title='delete comment'  onclick='delete_look_comment("<?php echo  intval($cno); ?>" , "<?php echo "$plno"; ?>" , "postedlooks" )'   />
												 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
												 		 	 			</div>
												 		 	 		</td>
												 		 	 		<td id='delete-text-<?php echo $cno; ?>'  style='display:none'  >  
													 		 	 		<span class='red_bold' onclick='delete_look_comment("<?php echo  intval($cno); ?>" , "<?php echo "$plno"; ?>" , "postedlooks" )'  style='cursor:pointer'  > 
													 		 	 			 DELETE
													 		 	 		</span>
												 		 	 		</td>
												 		 	 	</td>
												 		 	 	<?php } ?>
												 		 	 </table>
												 		</div>
												 	</div> 
												</td>
												<tr>
												<td id='TA_main_comment_reply_td'> 


													<div          id ='TA_main_comment_reply_div'   class='TA_main_comment_reply_div<?php echo $cno; ?>'>
														<textarea id='TA_main_comment_reply'        class='TA_main_comment_reply<?php echo $cno; ?>' placeholder='type your reply here..' ></textarea> 								
														<input    id='TA_main_comment_reply_button' class='TA_main_comment_reply_button<?php echo $cno; ?>'  onclick="send_data('cancel reply','.TA_main_comment_reply_div<?php echo $cno; ?>')"  type='button' value='CANCEL' >
														<input    id='TA_main_comment_reply_button' class='TA_main_comment_reply_button<?php echo $cno; ?>'  onclick="send_data('save reply','.TA_main_comment_reply_div<?php echo $cno; ?>','.TA_main_comment_reply<?php echo $cno; ?>',<?php echo $cno; ?>,'reply')"   type='button' value='POST A COMMENT'  >
													</div>

													<div          id ='TA_main_comment_edit_div'   class='TA_main_comment_edit_div<?php echo $cno; ?>'>
														<textarea id='TA_main_comment_edit'        class='TA_main_comment_edit<?php echo $cno; ?>'  ></textarea> 
														<input    id='TA_main_comment_edit_button' class='TA_main_comment_edit_button<?php echo $cno; ?>' onclick="send_data('cancel edit','.TA_main_comment_edit_div<?php echo $cno; ?>')"  type='button' value='CANCEL'  >
														<input    id='TA_main_comment_edit_button' class='TA_main_comment_edit_button<?php echo $cno; ?>' onclick="send_data('save edit','.TA_main_comment_edit_div<?php echo $cno; ?>','.TA_main_comment_edit<?php echo $cno; ?>',<?php echo $cno; ?>,'edit')"   type='button' value='SAVE COMMENT'  >
														
													</div>
						 
													<div          id ='TA_main_comment_flag_div'   class='TA_main_comment_flag_div<?php echo $cno; ?>'>


														<?php $this->unflagged_design_auto_hide( array('table'=> 'fs_cflag' , 'where'=> 'plcno' , 'whereV'=> $cno  ) );   ?>
														
														<!-- new  not yet flag  -->
												 			<table id='flagTable1' class='notflagged<?php echo $cno; ?>' style="<?php echo $this->notflaggedStyle; ?>" border="0" cellpadding="0" cellspacing="0" > 
														 		<tr>  
														 		 	<td id='flagTitle1Td' > 
														 		 		<span id='flagTitle1'> If you want to flag this comment fill up bellow.</span>
														 		 	</td>		
														 		 <tr> 
														 		 	<td> 
														 		 		<table id='flagTable2' border="0" cellpadding="0" cellspacing="0"  > 
														 		 			<tr>   
														 		 				<td> 
														 		 			 		<input type="checkbox" class='check_box1<?php echo $cno; ?>'  >
														 		 			 	</td>
														 		 			 	<td > 
														 		 			 		 <span id='flagTitle2'>NO SPAM or Unsolicited Advertising</span>
														 		 			 	</td>
														 		 			<tr>   
														 		 			 	<td> 
														 		 			 		<input type="checkbox" class='check_box2<?php echo $cno; ?>' >
														 		 			 	</td>
														 		 			 	<td> 
														 		 			 		 <span id='flagTitle2'>NO Offensive or Harmful Content</span>
														 		 			 	</td>
														 		 			<tr>   
														 		 			 	<td> 
														 		 			 		<input type="checkbox" class='check_box3<?php echo $cno; ?>'>
														 		 			 	</td>
														 		 			 	<td id='flagTitle2Td3'> 
														 		 			 		 <span id='flagTitle2'>NO Stolen or Copyright Infriging Content</span>
														 		 			 	</td>
														 		 		</table>
														 		 		
														 		 	</td>
														 		 <tr>  
														 		 	<td> 
														 		 		<textarea id='TA_main_comment_flag'        class='TA_main_comment_flag<?php echo $cno; ?>' placeholder='( Aditional Information )'  ></textarea> 
																		<input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('cancel flag','.TA_main_comment_flag_div<?php echo $cno; ?>')"  type='button' value='CANCEL'  >
																		<input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('save flag','.TA_main_comment_flag_div<?php echo $cno; ?>','.TA_main_comment_flag<?php echo $cno; ?>','<?php echo $cno; ?>','flag','')"  type='button' value='SEND FLAG'  >
														 		 	</td>
														 	</table>
													 	<!-- new  not yet flag  -->

													 	<!--  new already flagged -->
													 		<div id='flagged' class='flagged<?php echo $cno; ?>' style="<?php echo $this->flaggedStyle; ?>"  > 
													 			
														 			<table > 
														 				<tr>  
														 					<td> <span id='flagTitle2' > This comment is already flagged.  </span> </td>
														 				<tr>  
														 					<td> <input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('cancel flag','.TA_main_comment_flag_div<?php echo $cno; ?>')"  type='button' value='OK'  > </td>
														 			</table>
														 		 
													 		</div>
													 	<!--  new already flagged --> 
													</div>
												</td> 
											</table>  
									 		<!-- <hr class='line_<?php echo $cno; ?>' id='hr'  > -->
									 	</div>
							 		</li> 
								</div>


 

								<?php  
								}  //end for loop
							?> 
					<div style='width:500px; height: auto ; background-color:#000;color:#fff;margin-top:20px; margin-left:46px;text-align:center;display:none'> 
						<div id='res'> 
							action status , This is temporarily visible because of currently coding..
						</div>
					</div> 
				<?php  
				} 

				public function comment_details_design($param=array()) { ?>  
					<?php  
						// array(

					     //            		'username' => $username,
					     //            		'psrc'=>$psrc,
					     //            		'fullname'=>$fullname,
					     //            		'dateTime'=>$dateTime,
					     //            		'message'=>$message,
					     //            		'cno'=>$cno , 
					     //            		'you_liked'=>$you_liked , 
					     //            		'you_disliked'=>$you_disliked,
					     //            		'plctlikes'=>$plctlikes,
					     //            		'plctdislike'=>$plctdislike,
					     //            		'plno'=>$plno 
					     //            	)    
 
						$psrc         = $param['psrc'];
						$fullname     = $param['fullname'];
						$dateTime 	  =  $this->dateTime_convert($param['dateTime']);  
						$message 	  = $this->cleant_text_print_from_db($param['message']);
						$cno 		  = $param['cno'];
						$you_liked    = $param['you_liked'];
						$you_disliked = $param['you_disliked'];
						$plctlikes    = $param['plctlikes'];
						$plctdislike  = $param['plctdislike'];
						$plno         = $param['plno'];
						$mno1         = $param['mno1'];
						$src_img_flag = $param['src_img_flag'];
						$table_name   = $param['table_name']; 
						$mid          = $_SESSION['plno'];
						$mno          = $_SESSION['mno']; 
				 		$table_name_modal = ($param['table_name'] == 'posted_looks_comments') ? 'postedlooks' : 'fs_postedarticles'; 

					  
						// echo " date = " . $dateTime . '<br>'; 
						// echo " table_name = " . $table_name  . '<br>';
						// echo " plno = " . $plno  . '<br>';
								 
					?> 
				             	<li class="media border-top padding-top-comment details-comment" id="comment_list_<?php echo $cno; ?>"   > 
		                            <div class="media-left"> 
		                                <a  href="<?php echo "$username"; ?>" style='text-decoration:none' target='_parent'>
		                                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="<?php echo $psrc ?>" data-holder-rendered="true" style="width: 64px; height: 64px;"> 
		                                </a>
		                            </div>
		                            <div class="media-body">
		                                <h4 class="media-heading" id="media-heading">
		                                    <span class="profile-name black"> 
		                                    	<a  href="<?php echo "$username"; ?>" style='text-decoration:none' target='_parent'>
		                                    		<?php echo $fullname; ?>
		                                    	</a> 
		                                   	</span>&nbsp;
		                                    <a class="anchorjs-link" href="#media-heading"> 
		                                        <img src="fs_folders/images/details/grey-clock.png">&nbsp; 
		                                        <span class="anchorjs-icon">
		                                            <!-- <em class="grey">june 11,2014 9:26pm</em> -->
		                                            <em class="grey"><?php  echo $dateTime;   ?> </em> 
		                                        </span>
		                                    </a>
		                                </h4> 

		                                <div class="black" id='comment_span_<?php echo $cno; ?>'  >
		                                   <?php echo $message; ?>
		                                </div>  

		                                <!--Reply Text-->  
		                                <table>
		                                <tr> 
				                            <td>  
					                           	<div id='comment_footer_Container' > 	 
					                            	<table>

					                            	<td > 
					                            		<img src="fs_folders/images/details/grey-comment-icon.png" >
					                            	</td> 
					                            	<td class="padding-left-10" > 
					                            		<a href="#"> <span class="red font-arial comment-reply">REPLY</span> </a>   
					                            	</td>
   	



                            						<!-- <td>    
									 		 	 	 	<img  title="Like" src="<?php echo "$this->genImgs/$look_attr[thumbsUp]"; ?>" id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer;margin-top:-2px;' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' )" />    
									 		 	 	</td>
									 		 	 	<td></td> <td></td>
									 		 	 	<td> 
										 		 	 	<span class='red_bold' id="<?php echo "like_".$cno; ?>" >  
										 		 	 		 <?php  echo " $tlike  ";   ?> 
										 		 	 	</span>
										 		 	</td> 
									 		 	 	<td></td> <td></td>
									 		 	 	<td> 
										 		 	 	<td>
											 		 	 	<img title="Dislike"  src="<?php echo "$this->genImgs/$look_attr[thumbsDown]"; ?>" id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer;margin-top:-2px;' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' )"   />
										 		 	 	</td>
										 		 	 	<td></td> <td></td>
										 		 	 	<td> 
											 		 	 	<span class='red_bold' id="<?php echo "dislike_".$cno; ?>" >  
					 										<?php   echo " $tdislike";  ?> 
											 		 	 	</span>
											 		 	</td>
									 		 	 	</td>
  
 --> 
					                            	<td class="padding-left-20" > 
					                            		<?php if ($table_name  == 'posted_looks_comments'): ?>
					                            			<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'like' , $plno ); ?>    
					                            		<?php else: ?>
					                            			<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'like' , $plno, 'fs_comment' ); ?>   
					                            		<?php endif; ?>
					                            	</td> 


					                            	<td class="padding-left-10" >
					                            		<span class='red_bold like-dislike-rating ' id="<?php echo "like_".$cno; ?>" >  
									 		 	 		 	<?php  echo " $plctlikes  ";  ?> 
									 		 	 		</span>  
					                            	</td>
 
					                            	<td class="padding-left-20" > 

					                            		<?php  //echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'Thumbs-Down' , $plno );   ?>




					                            		<?php if ($table_name  == 'posted_looks_comments'): ?>
					                            			<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'dislike' , $plno );   ?>
					                            			<?php // echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'like' , $plno ); ?>    
					                            		<?php else: ?>
					                            			<?php  echo $this->get_look_comment_thumbs_up_or_down_image ( $cno , $you_liked , $you_disliked , 'dislike' , $plno, 'fs_comment' ); ?>   
					                            		<?php endif; ?>


					                            	</td>   
					                            	<td class="padding-left-10" > 
					                            		<span class='red_bold like-dislike-rating ' id="<?php echo "dislike_".$cno; ?>" >  
				 											<?php echo " $plctdislike"; ?> 
										 		 	 	</span> 
					                            	</td> 

					                            		<div id="comment_list_<?php echo $cno; ?>-settings"   > 
										 		 	 		<?php if ($mno == $mno1  ) { ?>
														 		 <td></td>
														 		 <td> 
														 		 	<td id='edit-image-<?php echo $cno; ?>' style='visibility:hidden' class="padding-left-20 comment_list_<?php echo $cno; ?>-edit" >  
														 		 		<img src="<?php echo $this->path_icons; ?>/comment-edit.png"  class='img_like'  title='reply comment'  onclick="fs_popup( 'popup-small' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )"  />
														 		 	</td>
														 		 	<td id='edit-text-<?php echo $cno; ?>'  style='visibility:hidden' class="padding-left-10 comment_list_<?php echo $cno; ?>-edit" >  
															 	 		<span class='red_bold' onclick="fs_popup( 'popup-function' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )" style='cursor:pointer'  > 
															 	 			EDIT
															 	 		</span>
														 		 	</td>
														 		</td>	
														 	<?php   } ?>
														 	<?php  if ($mno !=  $mno1 ) {  ?>
												 		 	 	<td></td>  
												 		 	 	<td> 
												 		 	 		<td id='flag-image-<?php echo $cno; ?>' style='visibility:hidden' class="padding-left-20 comment_list_<?php echo $cno; ?>-flag" >  
												 		 	 			<!-- <img src="<?php echo $this->path_icons; ?>/comment-flag.png"  class='img_like'  title='flag comment'  onclick='look_comment_attr_clicked("<?php echo "flag_$cno"; ?>")' />
												 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
												 		 	 			</div> --> 
												 		 	 			<img src="<?php echo "$this->genImgs/$src_img_flag"; ?>"  class='img_like' id='comment-flag-icon<?php echo  $cno ?>'  title='flag comment'   onclick="flag ( 'fs-flag' , '<?php echo 'posted_looks_comments'; ?>' , '<?php echo $cno ?>' , '#comment-flag-icon<?php echo $cno ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " /> 
												 		 	 		</td>
												 		 	 		<td id='flag-text-<?php echo $cno; ?>'  style='visibility:hidden' class="padding-left-10 comment_list_<?php echo $cno; ?>-flag"  >  
													 		 	 		<span class='red_bold' > 
													 		 	 			FLAG
													 		 	 		</span>
												 		 	 		</td>
												 		 	 	</td>
											 		 	 	<?php } ?>
											 		 	 	<?php  if ($mno == $mno1 or $_SESSION['mno'] == get_look_owner($mid) ) { ?>
												 		 	 	<td></td> 
												 		 	 	<td> 
												 		 	 		<td id='delete-image-<?php echo $cno; ?>' style='visibility:hidden' class="padding-left-20 comment_list_<?php echo $cno; ?>-delete"  >  
												 		 	 			<img src="<?php echo $this->path_icons; ?>/coment-delete.png"  class='img_like' title='delete comment'  onclick='delete_look_comment("<?php echo  intval($cno); ?>" , "<?php echo "$plno"; ?>" , "<?php echo $table_name_modal; ?>")'   />
												 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
												 		 	 			</div>
												 		 	 		</td>
												 		 	 		<td id='delete-text-<?php echo $cno; ?>'  style='visibility:hidden'  class="padding-left-10 comment_list_<?php echo $cno; ?>-delete" >  
													 		 	 		<span class='red_bold' onclick='delete_look_comment("<?php echo  intval($cno); ?>" , "<?php echo "$plno"; ?>" , "<?php echo $table_name_modal; ?>")'  style='cursor:pointer'  > 
													 		 	 			 DELETE 1
													 		 	 		</span>
												 		 	 		</td>
												 		 	 	</td>
											 		 	 	<?php  } ?> 
											 		 	</div> 	 
					                            	</table> 
									 			</div>  
								 			<td>
								 		</table> 
		                            </div>  
		                        </li>  
		                        <div style="clear:both" >  
		                        </div>




 
				<?php 
				}

				public function print_next_prev_numbers( $array=null , $plno = null , $type = null , $loaderpos=null , $value_array=null )  {   


					 	// 'action=profile-tabs&modal_total_show=24&pagenum=1&pagenumgroup=1&pagenumgroup_limit=400&tab='+tab+'&mno1=+'+mno1;   
						// style 
						$style  = ''; 
						switch ( $type ):
							case 'profile-tabs':
									if ( $loaderpos == 'loader-up' ) {
										$style = 'padding-top:10px; ';	 
									}
									else{
										$style = 'padding-bottom:10px; ';
									}
									
								break; 
							default:
								# code...
								break;
						endswitch;

					echo " <span style='color:black' > ";
 					// $this->print_r1($value_array);
					echo " </span > ";
					// $value_array['mno1']; 
					// $value_array['pagenum']; 


					if ( !empty($array)) { 

						if ( $loaderpos == 'loader-up' ) {
							echo "<center> <div  id='comment_post_loader1' style='border:1px solid none' ><img src='fs_folders/images/attr/loading 2.gif' style='height:15px; visibility:hidden' > </div></center> ";	 
						} 
						echo "

						<div style='border:1px solid none;$style' > 	
							<span id='look_comment_next_prev_arrow' >  < &nbsp;  </span> ";
								for ($i=0; $i < count($array) ; $i++) {  

									$n = $array[$i];  
									$style  = ( $n == 1 ) ? 'color:#d6051d' : 'color:grey' ;  

									switch ( $type ) {
										case 'rate-look':
											 	echo "  <span id='look_comment_next_prev_number' class='look_comment_next_prev_number$n' onclick='look_comment_number_clicked(\"$n\", \"$plno\" , \"rate-look\" )' style='$style' > $n </span> &nbsp; ";
											break;    
										case 'profile-tabs':  
												$mno1         = $value_array['mno1']; //1;  
												$tab          = $value_array['tab']; //1;    
												$page         = $value_array['page']; //1;    
												echo "   
													<span id='look_comment_next_prev_number' class='look_comment_next_prev_number$n' onclick='look_comment_number_clicked(\"$n\", \"$plno\" , \"profile-tabs\" ,  \"$mno1\" , \"$tab\" , \"\" , \"\" , \"\" , \"$page\" )' style='$style' > $n </span> &nbsp;  
												";  
											break; 
										case 'detail':
												$table_name       = $value_array['table_name']; //1;  
												$table_id         = $value_array['table_id']; //1;   
											 	// echo "  <span id='look_comment_next_prev_number' class='look_comment_next_prev_number$n'        
											 	// onclick='modal_detail( \"$table_name\" , \"$table_id\" , \"$n\" , \"modal-detail\" , \"load-next-comment-page\" , \"type\" )'   
											 	// style='$style' > $n </span> &nbsp; ";  
											 	echo "  <span id='look_comment_next_prev_number' class='look_comment_next_prev_number$n'  onclick='look_comment_number_clicked( \"$n\" , \"$table_id\" , \"detail\" , \"\" , \"\" , \"$table_name\" , \"modal-detail\" , \"load-next-comment-page\" )'  style='$style' > $n </span> &nbsp; ";  
											break; 
										default: 
											// default is for the comment 
												echo "  <span id='look_comment_next_prev_number' class='look_comment_next_prev_number$n' onclick='look_comment_number_clicked(\"$n\", \"$plno\" )' style='$style' > $n </span> &nbsp; "; 
											break;
									} 
								}
							echo " 
							<span id=\"look_comment_next_prev_arrow\"> > </span> 
						</div>";  

						if ( $loaderpos == 'loader-down' ) {
							echo " <center><div  id='comment_post_loader1' ><img src='fs_folders/images/attr/loading 2.gif' style='height:15px; visibility:hidden' > </div> </center>";	 
						}
					}
					else{
						echo "<div> 
						</div>";  
					} 
				}
				public function look_comment_sort( $sort_as ) {  

					return true;
				}  
				public function get_your_look_comment_thumb_up_or_down ( $mno , $plcno ) {    

					// echo " get_your_look_comment_thumb_up_or_down ( $mno , $plcno )  "; 

					if ( $r = select_v3( 'posted_looks_comments_like_dislike' , '*' , "mno = $mno and plcno = $plcno" ) ) {  
						return $r[0]['plcld_action'];
					}else{
						return false; 
					}    

				} 
				public function add_thumb_up_or_down ( $mno , $plcno , $action , $date ) { 
					insert(
					    'posted_looks_comments_like_dislike',
					    array('plcno','mno' , 'plcld_action' , 'plcld_date' ),
					    array( $plcno , $mno , $action , $date ),
					    'plcldno'
				  	);  
				}
				public function get_look_comment_thumbs_up_or_down_image  ( $cno , $you_liked , $you_disliked , $action , $plno, $table_name='posted_looks_comments', $rate_type='like' ) {
					$created = 0; 
					switch ( $action ) {
						case 'like':
								if ( $you_liked == false and $you_disliked  == false  ) { 	 													 		 	 				


									// if($table_name == 'posted_looks_comments') { 
										// return "<img src='$this->path_icons/Thumbs-up.png'  class='img_like'  id='img_like_$cno'  title='helpful comment'   onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Up\" , \"#img_like_$cno\"  , \"Thumbs-up-blue.png\" )' />"; 
			 	 						return "<img src='$this->genImgs/commen-like-unlike.png'  class='img_like'  id='img_like_$cno'  title='Like'   onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Up\" , \"#img_like_$cno\"  , \"comment-like-liked.png\" , \"$plno\" , \"#like_$cno\" , \"$created\",  \"$table_name\", \"$action\", \"$this->mno\" )' />";  
									// } else { 
										?>

											<!-- <img  title="Like"  src='<?php echo "$this->genImgs/commen-like-unlike.png" ?> ' id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer;margin-top:-2px;' onclick="modal_comment_like_dislike( '<?php echo $this->mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' )" />     -->
										<?php 
									// }

			 	 					



				 	 			}
				 	 			else if ( $you_liked == false and $you_disliked  == true  ) {
				 	 				// return "<img src='$this->path_icons/Thumbs-up.png'  class='img_like'  id='img_like_$cno'  title='helpful comment'    />"; 	
				 	 				return "<img src='$this->genImgs/commen-like-unlike.png'  class='img_like'  id='img_like_$cno'  title='Like'    />"; 	 
				 	 			}
				 	 			else{  
			 	 					// return "<img src='$this->path_icons/Thumbs-up-green.png'  class='img_like'   />"; 
			 	 					return "<img src='$this->genImgs/comment-like-liked.png'  class='img_like'  title='Like' />";  
				 	 			}   
							break;
						
						default:
							 	if ( $you_disliked == false and $you_liked == false  ) { 	 													 		 	 				
		 		 	 				// echo "<img src='$this->path_icons/Thumbs-down.png'  class='img_like'  id='img_dislike_$cno'  title='helpful comment'   onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Down\" , \"#img_dislike_$cno\" , \"Thumbs-down-blue.png\"  )'  />"; 	  
		 		 	 				  // echo "<img src='$this->genImgs/comment-dislike-un-disliked.png'  class='img_like'  id='img_dislike_$cno'  title='Dislike'   onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Down\" , \"#img_dislike_$cno\" , \"comment-dislike-disliked.png\" , \"$plno\" , \"#dislike_$cno\" , \"$created\"  )'  />"; 	  
		 		 	 				return "<img src='$this->genImgs/comment-dislike-un-disliked.png'  class='img_like'  id='img_dislike_$cno'  title='Dislike'   onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Down\" , \"#img_dislike_$cno\"  , \"comment-dislike-disliked.png\" , \"$plno\" , \"#dislike_$cno\" , \"$created\",  \"$table_name\", \"$action\", \"$this->mno\" )' />";  


		 		 	 			}
		 		 	 			else if ( $you_disliked == false and $you_liked == true  ) {
		 		 	 				// echo "<img src='$this->path_icons/Thumbs-down.png'  class='img_like'  id='img_dislike_$cno'  title='helpful comment' />"; 	
		 		 	 				echo "<img src='$this->genImgs/comment-dislike-un-disliked.png'  class='img_like'  id='img_dislike_$cno'  title='Dislike' />"; 	
		 		 	 			}
		 		 	 			else{ 
				 	 					// echo "<img src='$this->path_icons/Thumbs-down-green.png'  class='img_like'   />"; 
				 	 					echo "<img src='$this->genImgs/comment-dislike-disliked.png'  class='img_like'  title='Dislike'   />"; 
		 		 	 			}    
							break;
					} 
				}
				public function update_look_comment_thumbs_up_or_down( $plcno , $action ) {   
					$r = select_v3( 
			   	   		'posted_looks_comments_like_dislike' , 
			   	   		'*' , 
			   	   		" plcno = $plcno and plcld_action = '$action' " 
			   	   	);   
					if ($action == 'Thumb-Up') {   

						$rowval = count($r);   
						$rowanme ='plctlikes';  
						echo "  plctlikes  $rowval  "; 
					}
					else if ($action == 'Thumb-Down') { 

						$rowval = count($r);   
						$rowanme ='plctdislike'; 
						echo " plctdislike  $rowval ";    
					}    
					update_v1( 
		        		array(
			        		'table_name'=> 'posted_looks_comments',  
			        		 "$rowanme" => $rowval 
			        	) ,
		        		array(
		        			'plcno'=>$plcno
	        			)  
	        		);  
				}  
				public function get_my_latest_look_comment( $mno , $plno ) { 
					$comment=selectV1(
						'*',
						'posted_looks_comments',
						array('plno'=>$plno , 'operand1'=> 'and' , 'mno'=>$mno),
						'order by plcno desc',
						'limit 1'
					);
					return $comment;
				}
				public function add_my_latest_look_comment( $mno , $plno , $comment1 , $dtime ) {
					$b = insert(
						'posted_looks_comments',
						array('plno','mno','date_','msg'),
						array($plno,$mno,$dtime , $comment1 ),
						'plcno'
					);  						  
					return $b; 
				}
				public function print_look_comment_sorting_option ( $table_name , $table_id ) { 


					switch ( $table_name ) {
						case 'postedlooks': 



								?> 

								<select onchange="sort_look_comment( <?php echo $table_id; ?> )" id="sort_look_comment" >
									<option value="order by plcno desc"        > NEWEST COMMENT </option>
									<option value="order by plcno asc"         > OLDEST COMMENT </option>
									<option value="order by plctlikes desc"    > MOST HELPFUL COMMENT</option>
									<option value="order by plctdislike desc"  > MOST NOT HELPFUL COMMENT</option>
								</select>   

								<?php  
							break; 
						default:  ?>

							<select onchange="modal_detail( '<?php echo "$table_name"; ?>' , '<?php echo "$table_id"; ?>' , 1 , 'modal-detail' , 'load-comment-sorting-page-modal' )" id="sortcomment" class="sorting border-grey" >
								<option value="cno desc" > NEWEST COMMENT </option>
								<option value="cno asc" > OLDEST COMMENT </option>
								<option value="tlike desc"    > MOST HELPFUL COMMENT</option>
								<option value="tdislike desc"  > MOST NOT HELPFUL COMMENT</option>
							</select> 



						<?php
							 
							break;
					}

					?>
				
					
					<?php  
				}
				public function get_look_all_comments( $plno , $sort=null ) {
					$comments = selectV1(
						'*',
						'posted_looks_comments',
						array('plno'=>$plno ),
						$sort 
					);
					return $comments; 
				} 	
				public function print_look_comment_textarea( $plno )  { ?> 
					<div style="display:none" id="plno_post_comment" ><?php echo $plno ?></div> 
					<div  id='tb_comment_field1' style="border:1px solid none;">  
						<div id='add_your_commet' class='blue_bold' style='font-family:arial; padding-bottom:10px;color:#284372' >  
							ADD YOUR COMMENT 
						</div>  
						 <div style="padding-bottom:10px;"  > 
							<textarea id='comment_box' class='comment_box'  title= 'Write Comment here '  style="font-family:arial"  onkeyup="comment_box_hit_enter_js('<?php echo $plno; ?>' , event , 'post-enter' )"  ></textarea>
						 </div> 
				 		<!-- <a href="invite#body-contetent-container"> -->
				 		<div >
							<input title='Post Comment' type='image' src='fs_folders/fs_lookdetails/look_comment_items/img/post_comment.jpg' id='post_comment' class='post_comment' onclick="comment_box_hit_enter_js( <?php echo $plno; ?> , event , 'post-botton' )" />
						</div>	
							<!-- <input title='Post Comment' type='image' src='fs_folders/fs_lookdetails/look_comment_items/img/post_comment.jpg' id='post_comment' class='post_comment' onclick="post_comment ( '123' )"  /> -->
							<!-- <input title='Post Comment' type='image' src='../images/look_comment/post_comment.jpg' /> -->
						<!-- </a>  -->
					</div> <?php 	 
				} 
			#END LOOK COMMENT    


			#NEW FB LOGING IN

				public function resize_fb_profile_pic( $mno , $image , $profile_fs_src_original , $profile_fs_src_thumbnail , $profile_fs_src_profilepic ) {
					 
					 echo " resize_fb_profile_pic( $mno ,  $profile_fs_src_original , $profile_fs_src_thumbnail , $profile_fs_src_profilepic ) ";
                    $image->load("$profile_fs_src_original/$mno.jpg");   

		            #profile pic 
		            
                     $image->set_all_for_location( 
						"$profile_fs_src_original/$mno.jpg",  // source image 
						"$profile_fs_src_thumbnail/$mno.jpg",  // save distination 
						50,  //width
						'',  //height
						$image // class object 
					);   

		            $image->set_all_for_location( 
						"$profile_fs_src_original/$mno.jpg",  // source image 
						"$profile_fs_src_profilepic/$mno.jpg",  // save distination 
						300,  //width
						'',  //height
						$image // class object 
					);   
		            #profile thumnails

					
				}
				public function get_logging_in_fb_friends_and_filter( $data ) {  
					$fb_friends = array(); 
					// echo " total freinds  ".count($data)."<br>";
				    $freinds_a = $data;
				    $fb_all_freinds = '';
				    $fb_freinds_on_fs = '';
				    $fb_freinds_on_fb = ''; 

				    for ($i=0; $i < count($data) ; $i++) { 
				    	$fbfid = $freinds_a[$i]['id']; 
				    	// all fr
				   		$fb_all_freinds.=$fbfid.'-+-';  
				   		
				   		$mno = $this->is_fb_friends_on_fs( $fbfid );
				   		if ( !empty($mno) ) {
				   			// freinds on fs
				   			$fb_freinds_on_fs.=$mno."-+-";
				   		}else{
				   			// friends not on fs
				   			$fb_freinds_on_fb.=$fbfid."-+-";
				   		} 
				    } 

				    /*
					    echo " <br>all friends <br>";
					    echo "$fb_all_freinds<hr> <br>";
					    echo " <br>all friends on fs  <br>";
					    echo "$fb_freinds_on_fs <hr> <br>";
					    echo " <br>all friends not on fs  <br>";
					    echo "$fb_freinds_on_fb<hr> <br>";      
				    */

				    $fb_friends['fb_all_freinds']   = $fb_all_freinds;
				    $fb_friends['fb_freinds_on_fs'] = $fb_freinds_on_fs;
				    $fb_friends['fb_freinds_on_fb'] = $fb_freinds_on_fb;   
				    $fb_friends['total_friends']    = count($data);   

				  	return $fb_friends; 
				} 
				public function update_logging_in_fb_friends( $mno , $fb_all_freinds , $fb_freinds_on_fs , $fb_freinds_on_fb ) { 
					// echo "update_logging_in_fb_friends( $mno , $fb_all_freinds , $fb_freinds_on_fs , $fb_freinds_on_fb )"; 
					$b = updateArray('fs_members',array('fb_all_freinds','fb_freinds_on_fb','fb_freinds_on_fs'), array($fb_all_freinds,$fb_freinds_on_fb,$fb_freinds_on_fs),'mno',intval($mno) );  
				} 
				public function is_fb_friends_on_fs( $fbid ) { 
					$user = selectV1('*', 'fs_members' , array('fbid'=>$fbid)  );  
					if ( !empty( $user )) {
						 return $user[0]['mno'];
					}else{
						return false;
					}  
				}  

			#END FB LOGING IN
		// M
			#NEW MODALS     

				public function fs_modal_popup( $array ) {
 
					// init 

						$table_id 	 = ( !empty($array['table_id']))    ? intval($array['table_id'])    : 0 ;
						$table_name  = ( !empty($array['table_name']))  ? $array['table_name']  	    : 'postedlooks' ;
						$type 		 = ( !empty($array['type']))        ? $array['type']       		 	: 'ratings' ;  
						$limit_start = ( !empty($array['limit_start'])) ? $array['limit_start']  		: 0 ;
						$limit_end   = ( !empty($array['limit_end']))   ? $array['limit_end']    		: 10 ;
						$orderby     = ( !empty($array['orderby']))     ? $array['orderby']      		: '' ;

					// print 

						// echo "<h1> this is the modal popup query </h1> ";
						$response = '';
						// $this->print_r1( $array );

					// query information  

						switch ( $type ) { 

							case 'ratings': 
									$response = select_v3( 
							   	   		'fs_rate_modals' , 
							   	   		'*' , 
							   	   		" table_name = '$table_name' and table_id = $table_id order by rmno desc limit $limit_start , $limit_end " 
							   	   	);    
 								break; 
							case 'views':
								 	$response = select_v3( 
							   	   		'fs_view' , 
							   	   		'*' , 
							   	   		" table_name = '$table_name' and table_id = $table_id order by date desc limit $limit_start , $limit_end " 
							   	   	);  
								break;
							case 'dripped':
								 	$response = select_v3( 
							   	   		'fs_drip_modals' , 
							   	   		'*' , 
							   	   		" table_name = '$table_name' and table_id = $table_id order by date desc limit $limit_start , $limit_end " 
							   	   	);  
								break;
							case 'favorites':
								 	$response = select_v3( 
							   	   		'fs_favorite_modals' , 
							   	   		'*' , 
							   	   		" table_name = '$table_name' and table_id = $table_id order by date desc limit $limit_start , $limit_end " 
							   	   	);  
								break;
							case 'flags': 
									$response = select_v3( 
							   	   		'fs_flag', 
							   	   		'*' , 
							   	   		" table_name = '$table_name' and table_id = $table_id order by date desc limit $limit_start , $limit_end " 
							   	   	);   
								break;  
							case 'share':  
								break;  
							default: 
								break;
						} 


						


					// return  

						return $response;  
				}
				public function modal_comment_send_textarea( $mno , $table_id , $table_name , $id ) { ?> 
					<div style="display:none" id="plno_post_comment" ><?php echo $plno ?></div> 
					<div  id='tb_comment_field1' style="border:1px solid none;">  
						<div id='add_your_commet' class='blue_bold' style='font-family:arial; padding-bottom:10px;color:#284372' > 
							ADD YOUR COMMENT 
						</div> 
						 <div style="padding-bottom:10px;"  > 
							<textarea  class='comment_box'  title= 'Write Comment here '  style="font-family:arial" id='modal-comment-field<?php echo "$table_id"; ?>'   onkeyup="modal_comment_send ( '<?php echo "$mno"; ?>' , '<?php echo "$table_id"; ?>' , '<?php echo "$table_name"; ?>' , '<?php echo "$id" ?>' , event , 'detail-keyup' ,'comments_result' ,  '#modal-comment-loader-test1 , #modal-comment-loader-test2' )" ></textarea>
						 </div>  
				 		<div >
							<input title='Post Comment' type='image' src='fs_folders/fs_lookdetails/look_comment_items/img/post_comment.jpg' class='post_comment'        onclick="modal_comment_send ( '<?php echo "$mno"; ?>' , '<?php echo "$table_id"; ?>' , '<?php echo "$table_name"; ?>' , '<?php echo "$id" ?>' , event , 'detail' ,'comments_result' ,  '#modal-comment-loader-test1 , #modal-comment-loader-test2' )" />
						</div>	 
					</div> <?php 	 
				} 


				public function modal_print_comment_v1( $comment=null , $profilepath=null , $background_color=null ) { ?>
 
					<link rel="stylesheet" type="text/css" href="style.css">  
			      <?php      
				   



								// $this->print_r1($comment); 
									$cno                         = $comment['cno']; // cno
									$table_id                    = $comment['table_id']; // table id
									$mno                         = $comment['mno']; // commenter 
									$date                        = $comment['date']; // date 
									$msg                         = $this->cleant_text_print_from_db( $comment['comment'] );   // comment
									$tlike                       = $comment['tlike']; // tlike 
									$tdislike                    = $comment['tdislike'];   // tdislike 
									$table_name                  = $comment['table_name'];   // table_name 
									$tflag                       = $comment['tflag'];   // table_id 
								 	$validate_comment            = 'not rated';     
									$look_attr['thumbsUp']       = 'commen-like-unlike.png';
									$look_attr['thumbsDown']     = 'comment-dislike-un-disliked.png';  
									$response                    = $this->posted_modals_rate_Query(  array(   'mno'=>$mno,   'table_name'=>'fs_comment' ,   'table_id'=>$cno,   'rate_query'=>'get-user-rated-type') );  
									$validate_comment            = ( !empty($response ) ) ? 'rated comment' : 'not rated comment' ;   
 									$look_attr['response']       = $this->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>'fs_comment' , 'table_id'=>$cno,  'rate_query'=>'get-user-rated-type'  )  );    

									if ( $look_attr['response'] == true ): 
										$look_attr['stat_rated'] =  'look already rated'; 
										if ( $look_attr['response'] == 'like') {
											$look_attr['thumbsUp'] = 'comment-like-liked.png';
										} 
										if ( $look_attr['response'] == 'dislike') { 
										   $look_attr['thumbsDown'] = 'comment-dislike-disliked.png';
										}
									endif;      
 
 


									// echo "  
									// 	you_liked = $you_liked     <Br>
									// 	you_disliked = $you_disliked  $this->genImgs$you_liked <Br>
									// ";

									// echo "  
									// 	cno = $cno       <br> 
									// 	table_id = $table_id  <br> 
									// 	mno = $mno       <br> 
									// 	date = $date      <br> 
									// 	comment = $msg    <br> 
									// 	tlike = $tlike      <br> 
									// 	tdislike = $tdislike   <br> 
									// 	table_name = $table_name  <br> 
									// 	tflag = $tflag      <br> 
									// "; 

									$meminfo 	 		   = $this->get_user_full_fs_info ( $mno , null ); 
									$dateTime 			   = $this->dateTime_convert( $date );    
									$rating_img 		   = $this->get_my_action_image_equivalent( $mno  , $table_id , 'Rated' );    
									$ovarating             = $meminfo['opercentage'];  
							 	    $fullname              = $meminfo['fullName']; 
							 	    $gender                = $meminfo['gender'];  
							 	    $tpercentage_article   = $meminfo['tpercentage_article'];  
							 	    $this->look_comment_css( $cno , $mno );     

							 	    
 									$member_avatar = $this->ppic_thumbnail."/".$mno.".jpg";   
								    $shadow = ( $mno == $_SESSION['mno'] ) ?  'box-shadow: inset 0px 0px 4px 0px #000;' : '' ;   

								     $b = $this->get_your_look_comment_thumb_up_or_down( $_SESSION['mno'] , $cno );  

								     $response = select_v3( 
										'fs_rate_modals', 
										'*', 
										"table_id = $cno and table_name = 'fs_comment' and mno = " .  $_SESSION['mno']
									);     



								    if(!empty($response )) {  
							    	 	$b  = $response[0]['rate_type'];
							    	} else {
							    		$b = false;
							    	}
								     // print_r( $response );

								     


								     // echo "table_id = $cno and table_name = 'fs_comment' and mno = " .  $_SESSION['mno'];



								     // $b = 'Thumb-Up'; 
								     // echo " rate status - $b <br>"; 
 									 $you_liked = ( $b == 'like' ) ? true : false ;
 									 $you_disliked = ( $b == 'dislike' ) ? true : false ;  






 									$pt = $this->get_equivalent_user_percentage( $tpercentage_article , 'fs_postedarticles' ); //asdasdasdasdasdassdasdasdasdasdasdasdasdasdasdasdasdasd

 									$username = $this->get_username_by_mno( $mno );


 									// set flag icons 

	 									$modal['src_img_flag'] = "modal-flag.png";
										$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $cno and table_name= 'fs_comment' and mno = $_SESSION[mno] "  )  );   
										if ( !empty($response) ) {
											$modal['src_img_flag'] = "large-flag-red.png";
										}  


									$edit_flag_id = " #edit-image-$cno,#edit-text-$cno, #flag-image-$cno, #flag-text-$cno, #delete-image-$cno, #delete-text-$cno"; 


									  
										echo "<span  style='display:none'>";
										$psrc =  $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath".$this->ppic_thumbnail  );  
										echo "</span>";


									   $this->comment_details_design(
                                            array(
                                                'username' => $username,
                                                'psrc'=>$psrc,
                                                'fullname'=>$fullname,
                                                'dateTime'=>$date ,
                                                'message'=>$msg ,
                                                'cno'=>$cno , 
                                                'you_liked'=>$you_liked , 
                                                'you_disliked'=>$you_disliked,
                                                'plctlikes'=>$tlike,
                                                'plctdislike'=>$tdislike,
                                                'plno'=>$table_id, 
                                                'mno1'=>$mno,
                                                'src_img_flag'=>$modal['src_img_flag'], 
                                                'table_name'  => 'fs_comment'
                                            ) 
                                        );   
									?>   



								<?php   	    
				}
				public function modal_print_comment( $comment=null , $profilepath=null , $background_color=null ) { ?> 
					<link rel="stylesheet" type="text/css" href="style.css"> 
					<div class='main_comment_container' style="border:1px solid none" >   
					<?php      
					echo "<li style='list-style:none; ' >";     



								// $this->print_r1($comment); 
									$cno                         = $comment['cno']; // cno
									$table_id                    = $comment['table_id']; // table id
									$mno                         = $comment['mno']; // commenter 
									$date                        = $comment['date']; // date 
									$msg                         = $this->cleant_text_print_from_db( $comment['comment'] );   // comment
									$tlike                       = $comment['tlike']; // tlike 
									$tdislike                    = $comment['tdislike'];   // tdislike 
									$table_name                  = $comment['table_name'];   // table_name 
									$tflag                       = $comment['tflag'];   // table_id 
								 	$validate_comment            = 'not rated';     
									$look_attr['thumbsUp']       = 'commen-like-unlike.png';
									$look_attr['thumbsDown']     = 'comment-dislike-un-disliked.png';  
									$response                    = $this->posted_modals_rate_Query(  array(   'mno'=>$mno,   'table_name'=>'fs_comment' ,   'table_id'=>$cno,   'rate_query'=>'get-user-rated-type') );  
									$validate_comment            = ( !empty($response ) ) ? 'rated comment' : 'not rated comment' ;   
 									$look_attr['response']       = $this->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>'fs_comment' , 'table_id'=>$cno,  'rate_query'=>'get-user-rated-type'  )  );    

									if ( $look_attr['response'] == true ): 
										$look_attr['stat_rated'] =  'look already rated'; 
										if ( $look_attr['response'] == 'like') {
											$look_attr['thumbsUp'] = 'comment-like-liked.png';
										} 
										if ( $look_attr['response'] == 'dislike') { 
										   $look_attr['thumbsDown'] = 'comment-dislike-disliked.png';
										}
									endif;      
 
 


									// echo "  
									// 	you_liked = $you_liked     <Br>
									// 	you_disliked = $you_disliked  $this->genImgs$you_liked <Br>
									// ";

									// echo "  
									// 	cno = $cno       <br> 
									// 	table_id = $table_id  <br> 
									// 	mno = $mno       <br> 
									// 	date = $date      <br> 
									// 	comment = $msg    <br> 
									// 	tlike = $tlike      <br> 
									// 	tdislike = $tdislike   <br> 
									// 	table_name = $table_name  <br> 
									// 	tflag = $tflag      <br> 
									// "; 

									$meminfo 	 		   = $this->get_user_full_fs_info ( $mno , null ); 
									$dateTime 			   = $this->dateTime_convert( $date );    
									$rating_img 		   = $this->get_my_action_image_equivalent( $mno  , $table_id , 'Rated' );    
									$ovarating             = $meminfo['opercentage'];  
							 	    $fullname              = $meminfo['fullName']; 
							 	    $gender                = $meminfo['gender'];  
							 	    $tpercentage_article   = $meminfo['tpercentage_article'];  
							 	    $this->look_comment_css( $cno , $mno );     

							 	    
 									$member_avatar = $this->ppic_thumbnail."/".$mno.".jpg";   
								    $shadow = ( $mno == $_SESSION['mno'] ) ?  'box-shadow: inset 0px 0px 4px 0px #000;' : '' ;   

								     $b = $this->get_your_look_comment_thumb_up_or_down( $_SESSION['mno'] , $cno );    
								    // $b = 'Thumb-Up'; 
								    // echo " $b "; 
 								    $you_liked = ( $b == 'Thumb-Up' ) ? true : false ;
 								    $you_disliked = ( $b == 'Thumb-Down' ) ? true : false ;  

 									$pt = $this->get_equivalent_user_percentage( $tpercentage_article , 'fs_postedarticles' ); //asdasdasdasdasdassdasdasdasdasdasdasdasdasdasdasdasdasd

 									$username = $this->get_username_by_mno( $mno );


 									// set flag icons 

	 									$modal['src_img_flag'] = "modal-flag.png";
										$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $cno and table_name= 'fs_comment' and mno = $_SESSION[mno] "  )  );   
										if ( !empty($response) ) {
											$modal['src_img_flag'] = "large-flag-red.png";
										}  


									$edit_flag_id = " #edit-image-$cno,#edit-text-$cno, #flag-image-$cno, #flag-text-$cno, #delete-image-$cno, #delete-text-$cno"; 

 
									?> 


									<?php if(true): ?> 
										<div  id='comment_list_<?php echo $cno; ?>'  class='main_container' style='border:1px solid none;   ' > 
											<li>  
												<!-- new main comment  --> 
												<div style="margin-top:15px; "  id='comment_list_1<?php echo $cno; ?>'  >

													<table border="0" id='comment_container' class='comment_container' style="<?php echo $background_color; ?>;border:1px solid none " onmouseover="modal ( 'mouse-enter-to-comment' , '<?php echo $edit_flag_id; ?>' )" onmouseout="modal ( 'mouse-out-to-comment' , '<?php echo $edit_flag_id; ?>' )"  >  
														<tr>
														<td>
															<table border="0" id='img' class='img'  > 
																<td>
																	<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath".$this->ppic_thumbnail  ); ?> 
																</td><tr>
																<td><span class='red_bold' id='percentage' title='<?php echo $pt ?>' ><?php echo "$tpercentage_article% " ?></span></td>
															</table>
															<div id='comment_body_container' class='comment_body_container' > 
																<div id='comment_header_container' >  
																	<table  border="0" > 
																		<td>
																			<a href="<?php echo "$username"; ?>" style='text-decoration:none' target='_parent' >
																				<span id='full_name_<?php echo $cno; ?>' class='blue_bold' >
																					<?php echo $fullname; ?>  
																				</span> 
																			</a>
																		</td> <td></td> 

																		<td>
																		<table border="0" cellpadding="0" cellspacing="0"  id="comment-modal-gender" >
																			<tr>
																				<td> <div class='blue_bold' style="font-size:11px;" > ( </div>  </td>
																				<td> <div  id='gender' class='blue' style="font-size:12px; margin-left:5px" > <?php echo $gender; ?>  RATED  </div>   </td>
																				<td> <div class='rating_view' style="margin-left:5px"  > <?php echo "$rating_img"; ?> </div>    </td>
																				<td> <div class='blue_bold' style="margin-left:5px;font-size:12px;" > ) </div>   </td>
																		</table>  
																		</td>
																		<td> 
																 			<?php if (false) { ?>
																 			<span class='blue_bold'> (  </span>
															 				<span id='viewReplies' class='viewReplies_<?php echo $cno; ?>' onclick='viewReplies("<?php echo $cno; ?>") ' >View replies</span><span class='totalReplies'> ( <?php  echo $rLen; ?> ) </span> 
															 				 <span class='blue_bold'> ) </span>
														 					<?php } ?> 
																		</td>
																	</table>  
																</div>
														 		<!-- <div class='rcomment' id='comment_<?php echo $cno; ?>' >  -->
														 		<div class='rcomment' id='comment_<?php echo $cno; ?>' >  
																	<div id='comment_span_<?php echo $cno; ?>' class='comment_span_content_container' >
																		<div><?php echo  $this->cleant_text_print_from_db( $msg ); ?></div>
																	</div>
														 		</div>
														 		<div id='comment_footer_Container' > 
														 		 	 <table border="0" >  
														 		 	 	<td>  
														 		 	 		<span id='comment_time'>   
														 		 	 			<!-- POSTED ON  <?php  echo $dformat['month'].' , '.$dformat['day'].' , '.$dformat['year'].' | '.$dformat['hour'].':'.$dformat['min'].' '.$dformat['stat'];   ?>  -->
														 		 	 			POSTED ON  <?php  echo $dateTime;   ?> 
														 		 	 		</span> 
														 		 	 	</td>
														 		 	 	<td></td> <td></td>
														 		 	 	<td>   
														 		 	 	 	<!-- rate comment detail -->  
														 		 	 	 	<img  title="Like" src="<?php echo "$this->genImgs/$look_attr[thumbsUp]"; ?>" id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer;margin-top:-2px;' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' )" />    
														 		 	 	</td>
														 		 	 	<td></td> <td></td>
														 		 	 	<td> 
															 		 	 	<span class='red_bold' id="<?php echo "like_".$cno; ?>" >  
															 		 	 		 <?php  echo " $tlike  ";   ?> 
															 		 	 	</span>
															 		 	</td> 
														 		 	 	<td></td> <td></td>
														 		 	 	<td> 
															 		 	 	<td>
																 		 	 	<img title="Dislike"  src="<?php echo "$this->genImgs/$look_attr[thumbsDown]"; ?>" id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer;margin-top:-2px;' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' )"   />
															 		 	 	</td>
															 		 	 	<td></td> <td></td>
															 		 	 	<td> 
																 		 	 	<span class='red_bold' id="<?php echo "dislike_".$cno; ?>" >  
										 										<?php   echo " $tdislike";  ?> 
																 		 	 	</span>
																 		 	</td>
														 		 	 	</td>
														 		 	 	<td>
														 		 	 		<input  type="text"  id="rate-comment-stat<?php echo $cno; ?>" value="<?php echo $validate_comment; ?>" style='display:none' /> 
														 		 	 	</td> 
														 		 	 	<?php if (false) {  ?>
														 		 	 	<td> 
														 		 	 		<td> 
														 		 	 			<img src="<?php echo $this->img_attr_source; ?>/reply.jpg"  class='img_like'  title='reply comment' onclick='look_comment_attr_clicked("<?php echo "reply_".$cno."-0"; ?>")' />
														 		 	 		</td>
														 		 	 		<td>  
															 		 	 		<span class='red_bold' > 
															 		 	 			REPLY 
															 		 	 		</span>
														 		 	 		</td>
														 		 	 	</td>	
														 		 	 	<td></td>
														 		 	 	<?php  } ?>
														 		 	 	<?php if ($_SESSION['mno'] == $mno  ) { ?>
																	 		 <td></td>
																	 		 <td> 
																	 		 	<td id='edit-image-<?php echo $cno; ?>' style='display:none' > 
																	 		 		<img src="<?php echo $this->path_icons; ?>/comment-edit.png"  class='img_like'  title='reply comment'  onclick="fs_popup( 'popup-small' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )" />
																	 		 	</td>
																	 		 	<td id='edit-text-<?php echo $cno; ?>'  style='display:none' >   
																		 	 		<span class='red_bold' style='cursor:pointer' onclick="fs_popup( 'popup-small' , 'modal-comment-edit' , 'modal-comment-edit-design' , 'method' , '<?php echo $cno; ?>' , '<?php echo $table_name; ?>' )" > 
																		 	 			EDIT
																		 	 		</span>
																	 		 	</td>
																	 		</td>	
																	 	<?php } ?>
																	 	<?php  
																	 		if ($_SESSION['mno'] !=  $mno ) {  ?>
														 		 	 	<td></td>  
														 		 	 	<td>  
														 		 	 		<td id='flag-image-<?php echo $cno; ?>' style='display:none'  >  
														 		 	 			<img src="<?php echo "$this->genImgs/$modal[src_img_flag]"; ?>"  class='img_like' id='comment-flag-icon<?php echo  $cno ?>'  title='flag comment'   onclick="flag ( 'fs-flag' , '<?php echo 'fs_comment'; ?>' , '<?php echo $cno ?>' , '#comment-flag-icon<?php echo $cno ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " /> 
														 		 	 		</td>
														 		 	 		<td id='flag-text-<?php echo $cno; ?>'  style='display:none'  >
															 		 	 		<span class='red_bold' > 
															 		 	 			FLAG
															 		 	 		</span>
														 		 	 		</td> 
														 		 	 	</td>
														 		 	 	<?php } ?>
														 		 	 	<?php if ($_SESSION['mno'] == $mno or $_SESSION['mno'] == $this->get_modal_owner( $table_name , $table_id )   ) { ?>
														 		 	 	<td></td> 
														 		 	 	<td> 
														 		 	 		<td id='delete-image-<?php echo $cno; ?>' style='display:none'  >
														 		 	 			<img src="<?php echo $this->path_icons; ?>/coment-delete.png"  class='img_like' title='delete comment'  onclick='delete_look_comment("<?php echo  intval($cno); ?>" , "<?php echo "$table_id"; ?>" , "<?php echo  $table_name; ?>" )'   />
														 		 	 			<div id='<?php echo "flag_$cno"; ?>'>  
														 		 	 			</div>
														 		 	 		</td>
														 		 	 		<td  id='delete-text-<?php echo $cno; ?>'  style='display:none'  >
															 		 	 		<span class='red_bold' onclick='delete_look_comment("<?php echo  intval($cno); ?>" )'  style='cursor:pointer'  > 
															 		 	 			 DELETE
															 		 	 		</span>
														 		 	 		</td>
														 		 	 	</td>
														 		 	 	<?php } ?>
														 		 	 </table>
														 		</div>
														 	</div>
														</td>
														<tr>
														<td id='TA_main_comment_reply_td'>  
															<div          id ='TA_main_comment_reply_div'   class='TA_main_comment_reply_div<?php echo $cno; ?>'>
																<textarea id='TA_main_comment_reply'        class='TA_main_comment_reply<?php echo $cno; ?>' placeholder='type your reply here..' ></textarea> 								
																<input    id='TA_main_comment_reply_button' class='TA_main_comment_reply_button<?php echo $cno; ?>'  onclick="send_data('cancel reply','.TA_main_comment_reply_div<?php echo $cno; ?>')"  type='button' value='CANCEL' >
																<input    id='TA_main_comment_reply_button' class='TA_main_comment_reply_button<?php echo $cno; ?>'  onclick="send_data('save reply','.TA_main_comment_reply_div<?php echo $cno; ?>','.TA_main_comment_reply<?php echo $cno; ?>',<?php echo $cno; ?>,'reply')"   type='button' value='POST A COMMENT'  >
															</div>

															<div          id ='TA_main_comment_edit_div'   class='TA_main_comment_edit_div<?php echo $cno; ?>'>
																<textarea id='TA_main_comment_edit'        class='TA_main_comment_edit<?php echo $cno; ?>'  ></textarea> 
																<input    id='TA_main_comment_edit_button' class='TA_main_comment_edit_button<?php echo $cno; ?>' onclick="send_data('cancel edit','.TA_main_comment_edit_div<?php echo $cno; ?>')"  type='button' value='CANCEL'  >
																<input    id='TA_main_comment_edit_button' class='TA_main_comment_edit_button<?php echo $cno; ?>' onclick="send_data('save edit','.TA_main_comment_edit_div<?php echo $cno; ?>','.TA_main_comment_edit<?php echo $cno; ?>',<?php echo $cno; ?> , 'edit', '' , '' , 'detail' , '<?php echo "$cno"; ?>' , '<?php echo "fs_comment"; ?>' )"   type='button' value='SAVE COMMENT'  >
															</div> 
															<div          id ='TA_main_comment_flag_div'   class='TA_main_comment_flag_div<?php echo $cno; ?>'> 
																<?php $this->unflagged_design_auto_hide( array('table'=> 'fs_cflag' , 'where'=> 'cno' , 'whereV'=> $cno  ) );   ?>
																<!-- new  not yet flag  -->
														 			<table id='flagTable1' class='notflagged<?php echo $cno; ?>' style="<?php echo $this->notflaggedStyle; ?>" border="0" cellpadding="0" cellspacing="0" > 
																 		<tr>  
																 		 	<td id='flagTitle1Td' > 
																 		 		<span id='flagTitle1'> If you want to flag this comment fill up bellow.</span>
																 		 	</td>		
																 		 <tr> 
																 		 	<td> 
																 		 		<table id='flagTable2' border="0" cellpadding="0" cellspacing="0"  > 
																 		 			<tr>   
																 		 				<td> 
																 		 			 		<input type="checkbox" class='check_box1<?php echo $cno; ?>'  >
																 		 			 	</td>
																 		 			 	<td > 
																 		 			 		 <span id='flagTitle2'>NO SPAM or Unsolicited Advertising</span>
																 		 			 	</td>
																 		 			<tr>   
																 		 			 	<td> 
																 		 			 		<input type="checkbox" class='check_box2<?php echo $cno; ?>' >
																 		 			 	</td>
																 		 			 	<td> 
																 		 			 		 <span id='flagTitle2'>NO Offensive or Harmful Content</span>
																 		 			 	</td>
																 		 			<tr>   
																 		 			 	<td> 
																 		 			 		<input type="checkbox" class='check_box3<?php echo $cno; ?>'>
																 		 			 	</td>
																 		 			 	<td id='flagTitle2Td3'> 
																 		 			 		 <span id='flagTitle2'>NO Stolen or Copyright Infriging Content</span>
																 		 			 	</td>
																 		 		</table>
																 		 		
																 		 	</td>
																 		 <tr>  
																 		 	<td> 
																 		 		<textarea id='TA_main_comment_flag'        class='TA_main_comment_flag<?php echo $cno; ?>' placeholder='( Aditional Information )'  ></textarea> 
																				<input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('cancel flag','.TA_main_comment_flag_div<?php echo $cno; ?>')"  type='button' value='CANCEL'  >
																				<input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('save flag','.TA_main_comment_flag_div<?php echo $cno; ?>','.TA_main_comment_flag<?php echo $cno; ?>','<?php echo $cno; ?>','flag','')"  type='button' value='SEND FLAG'  >
																 		 	</td>
																 	</table>
															 	<!-- new  not yet flag  --> 
															 	<!--  new already flagged -->
															 		<div id='flagged' class='flagged<?php echo $cno; ?>' style="<?php echo $this->flaggedStyle; ?>"  > 
															 			
																 			<table > 
																 				<tr>  
																 					<td> <span id='flagTitle2' > This comment is already flagged.  </span> </td>
																 				<tr>  
																 					<td> <input    id='TA_main_comment_flag_button' class='TA_main_comment_flag_button<?php echo $cno; ?>' onclick="send_data('cancel flag','.TA_main_comment_flag_div<?php echo $cno; ?>')"  type='button' value='OK'  > </td>
																 			</table> 
															 		</div>
															 	<!--  new already flagged --> 
															</div>
														</td> 
													</table>  
											 		<!-- <hr class='line_<?php echo $cno; ?>' id='hr'  > -->
											 	</div>
									 		</li> 
										</div>
									<?php endif; ?>


								<?php   	    
				}
				public function get_modal_owner( $table_name , $table_id ) { 

					// echo " get_modal_owner( $table_name , $table_id ) ";
					$owner = 0; 
					$table_name = str_replace(' ', '', $table_name ); 

					switch ( $table_name ){   
						case 'fs_members': 
								# no code yet
								 $owner = $table_id;
								// echo " $mno ";
							break; 
						case 'fs_comment': 

							 #like , dislike comment  
									$response = select_v3( 
										'fs_comment', 
										'*', 
										"cno = $table_id" 
									);     
									$commentor    = $response[0]['mno']; 	
									$table_id     = $response[0]['table_id']; 
									$table_name1  = $response[0]['table_name']; 
									$comment      = $response[0]['comment'];     
								echo " from commented table: commentor = $commentor table_id = $table_id  table_name = $table_name  comment = $comment <br> ";
								// $noti_link = $this->set_link( $table_name , $commentor );  
								switch ( $table_name1 ) {
									case 'fs_member_profile_pic': 
											// echo " fs_member_profile_pic ";
											$mno             = $this->member_profile_pic_query(  array( 'mppno' => $table_id , 'type'=>'get-specific-mno-by-mppno' ) );  
											// $noti_link       = $this->set_link( $table_name , $mno2 ); 
											$noti_table_name = $table_name; 
											$noti_table_id   = $table_id;  
											$owner           = $mno;  
										break;
									case 'postedlooks':
										# code...
										break;
									case 'fs_postedmedia':
										# code...
										break;
									case 'fs_postedarticles':
										 	echo " this is the posted article get owner of the modal <br>";
										 	$response = $this->fs_postedarticles( 
									  		 	array(  
									  			 	'aticle_type'=> 'select', 
									  		 		'where'=>"artno = $table_id"
									  		 	)  
									  		);    
										 	$owner = $response[0]['mno']; 
										break;
									case 'fs_member_profile_pic':
										# code...
										break; 
									default:
											// echo " this is the posted article get owner of the modal <br>";
										 // 	$response = $this->fs_postedarticles( 
									  // 		 	array(  
									  // 			 	'aticle_type'=> 'select', 
									  // 		 		'where'=>"artno = $table_id"
									  // 		 	)  
									  // 		);    
										 // 	$owner = $response[0]['mno']; 
										break;
								}  
							break;
						case 'fs_member_profile_pic':  
								$mno = $this->member_profile_pic_query(  array( 'mppno' => $table_id , 'type'=>'get-specific-mno-by-mppno' ) );  
								$owner = $mno;
 							break;    
						case 'postedlooks':  
								$mno = $this->posted_modals_postedlooks_Query(  array( 'plno'=> $table_id , 'postedlooks_query' => 'get-look-owner' )  ); 
								$owner = $mno;
							break; 
						case 'fs_postedmedia': 

								#no code yet
							break; 
						case 'fs_postedarticles': 
								# get modal owner
								# no code yet 
								// echo "this the article to get the name of the owner of the modals "; 
						 		$response = $this->fs_postedarticles( 
						  		 	array(  
						  			 	'aticle_type'=> 'select', 
						  		 		'where'=>"artno = $table_id"
						  		 	)  
						  		);     
						  		// print_r($response ); 
						  		$owner = $response[0]['mno']; 
							break;  
						default: 
							  
							break;
					} 
					return $owner;
				}
				public function get_modal_type( $table_name , $table_id ) {
					$owner = 0;
					switch ( $table_name ):
						case 'fs_members': 
								$type = 'profile picture';
							break; 
						case 'fs_member_profile_pic':  
								$type = 'profile picture';
 							break;    
 						case 'fs_member_timeline':
 							 	$type = 'time lime';
 							break;
						case 'postedlooks':  
								 $type = 'look';
							break; 
						case 'fs_postedmedia':  
								$type = 'media';
							break; 
						case 'fs_postedarticles':  
								$type = 'article';
							break;  
						case 'fs_comment': 

							 	#like , dislike comment  
								$response = select_v3( 
									'fs_comment', 
									'*', 
									"cno = $table_id" 
								);     
								$commentor    = $response[0]['mno']; 	
								$table_id     = $response[0]['table_id']; 
								$table_name1  = $response[0]['table_name']; 
								$comment      = $response[0]['comment'];     
								echo " from commented table: commentor = $commentor table_id = $table_id  table_name = $table_name  comment = $comment <br> ";
								// $noti_link = $this->set_link( $table_name , $commentor );  
								switch ( $table_name1 ) {
									case 'fs_member_profile_pic': 
											 $type = 'profile pic';
										break;
									case 'postedlooks':
											$type = 'look';
										break;
									case 'fs_postedmedia':
											$type = 'media';
										break;
									case 'fs_postedarticles':
											$type = 'article';
										break; 
									default:
											$type = '';
										break;
								}  
							break;
						default: 
								$type = '';
							break;
					endswitch; 
					return $type;
				}
				public function modal( $array ) { 

					$table_name  = ( !empty( $array['table_name'])) ? $array['table_name'] : 0 ;  
					$table_id    = ( !empty( $array['table_id'])) ? $array['table_id'] : 0 ;   
					$category    = ( !empty( $array['category'])) ? $array['category'] : 0 ;  
					$mno  		 = ( !empty( $array['mno'])) ? $array['mno'] : 0 ;   
				 	$type        = ( !empty( $array['type'])) ? $array['type'] : 0 ;  
				 	$size        = ( !empty( $array['size'])) ? $array['size'] : 0 ;   // small , normal , large , orginal
				 	$pathchecked = '../../../'.$this->ppic_thumbnail; //$array['pathchecked'];
				 	$id          = ( !empty( $array['id'])) 		? $array['id'] : 0 ;   // small , normal , large , orginal





				 	// echo " table name = $table_name table id = $table_id ";



				 	$response    = null;

				 	// echo "$table_name <br> $table_id  <br> $id   <br> ";
 					// echo " size is $size <br> ";

				 	switch ( $type  ) {
				 		case 'get-modal-image': 
				 				#$image = $mc->modal(  array( 'table_name' =>$table_name, 'table_id' =>$table_id, 'type' =>'get-modal-image' , 'size'=>'small' )  );   
				 			 	switch ( $table_name ) {
				 			 		case 'fs_members':
 											

 											// echo " this is ";
				 			 				$mppno = $this ->member_profile_pic_query( array('mno'=>$table_id  , 'type'=>'get-latest-mppno' ) ); 

				 			 				if ( file_exists( "$pathchecked/$mppno.jpg" ) ) { 
												// echo " 
												// 	<a href='$username'>
												// 		<img  style='height:$size; width:$size; border-radius:3px;border:1px solid  #e2e2df;' src='$path/$mppno.jpg' title='$title'  > 
												// 	</a>
												// "; 
												$avatar = "$mppno.jpg";
												// echo " profile exist <br>";
											}else{ 

												// echo " profile not exist <br>";
												$avatar = $this->get_male_female_avatar( $table_id ); 
												// echo " 
												// 	<a href='$username'>
												// 		<img  style='height:$size; width:$size;border-radius:3px;border:1px solid  #e2e2df;' src='$path/$avatar' title='$title'  > 
												// 	</a>
												// ";
												// $avatar = $mppno ;
											}



											// echo " $this->ppic_thumbnail/$avatar.jpg ";

				 			 				if ( $size == 'small' ) { 
												$response = "$this->ppic_thumbnail/$avatar"; 
				 			 				}
				 			 				else{
				 			 					$response = "$this->ppic_profile/$avatar";
				 			 				}   
				 			 			break;
				 			 		case 'postedlooks':  
				 			 				if ( $size == 'small' ) {
				 			 					$response = "$this->look_folder_thumbnail/$table_id.jpg";
				 			 				}
				 			 				else{
				 			 					$response = "$this->look_folder_home/$table_id.jpg";
				 			 				} 
				 			 			break;
				 			 		case 'fs_postedarticles':  
				 			 				if ( $size == 'small' ) {
				 			 					$response = "$this->article_thumbnail/$table_id.jpg"; 
				 			 				}
				 			 				else{
				 			 					$response = "$this->article_home/$table_id.jpg"; 
				 			 				} 
				 			 			break;
				 			 		case 'fs_postedmedia':   
				 			 			break;  
				 			 		default: 
				 			 			break;
				 			 	} 
				 			break; 
				 		case 'get-modal-tcomment':
				 				switch ( $table_name ) { 
				 					case 'fs_member_profile_pic': 
				 							$response = $this->member_profile_pic_query(  
							 		 		 array( 
							 		 		 	'mppno'=>$table_id,
							 		 		 	'type'=>'count-total-profile-comment'
							 		 		 	) 
							 		 		);  
				 						break; 
				 					case 'postedlooks':  
				 							$response = select_v4( array( 'type'=>'select',  'tablename'=>'posted_looks_comments', 'rows'=>'count(*) as plno', 'where'=>" plno = $table_id "  ) ); 
				 							$response =  $response[0]['plno'];  
				 						break;
				 					default: 
				 							$response =  $this->posted_modals_comment_Query ( 
												array(  
												    'table_name'=>$table_name,
												    'table_id'=> $table_id , 
												    'orderby'=> 'cno asc',
												    'limit_start'=>0,
												    'limit_end'=> 1000, 
												    'comment_query'=>'get-comment-modal'   
												 )     
											);
											$response = count($response); 
				 						break;
				 				}
				 			break; 
				 	 	case 'delete-modal': 
				 	 			switch ( $table_name ) {
				 	 				case 'postedlooks': 
				 	 						$row = 'plno'; 
				 	 					break;
				 	 				case 'fs_postedarticles': 
				 	 						$row = 'artno';
				 	 					break; 
				 	 				case 'fs_postedmedia':
				 	 						$row = 'mdno';
				 	 					break;
				 	 				case 'fs_members': 
				 	 						$row = 'mno';
				 	 					break;
				 	 				default: 

				 	 					break;
				 	 			} 
				 	 			$response = mysql_query( " DELETE FROM $table_name WHERE $row = $table_id " );   
				 	 		break;
				 	 	case 'print-settings':   
				 	 			/* this is used just inside the modal */  ?> 
				 	 				<div id="look-details-profile-look-owner-header-delete" title="delete"  onclick="lookdetails_delete_look( '<?php echo $table_id; ?>' , 'dont-redirect' , '<?php echo $table_name; ?>' , '<?php echo $id; ?>' )" > </div>  
				 	 			<?php  
				 	 		break;
				 	 	case 'get-modal-owner-mno': 
				 	 			switch ( $table_name ) {
		 	 				 		case 'postedlooks':  

	 	 				 					$response    = select_v3(  'postedlooks' ,   '*' , "plno  = $table_id");  
	 	 				 					$response 	 = $response[0]['mno'];

		 	 				 			break;
		 	 				 		case 'fs_postedarticles': 
	 	 				 					$response    = select_v3(  'fs_postedarticles' ,   '*' , "artno  = $table_id");  
	 	 				 					$response 	 = $response[0]['mno'];

		 	 				 			break; 
		 	 				 		default: 
		 	 				 			break;
		 	 				 	}	 	 
				 	 		break; 
				 	 	case 'add-or-update-user-category-percentage-and-rating':
				 	 		 	
				 	 			//  get modal owner mno 

				 	 				$mno = $this->get_modal_owner( $table_name , $table_id );  

				 	 			// calculate the specific category percentage of the modal

									$response = $this->RATING( 
									  	array(
									  		'type'=>'calculte-category-tratings-and-tpercentage',
									  		'table_name'=>$table_name,
									  		'category'=>$category,
									  		'mno'=>$mno 
									  	)
									); 

									$this->message( " calculate category strating and percetage ", $response , "");

								// update user specific category tpercentage and trating 

									$response = $this->fs_member_categories (    
									    array(  
										    'type'=>'insert-or-update-trating-and-tpercetange',
										    'trating'=> $response['trating'],
										    'tpercentage'=>$response['tpercentage'],
										    'mno'=>$mno,
										    'table_name'=>$table_name,
										    'category'=>$category
									    ) 
									);   

									$this->message( " add or update trating and tpercentage  user category ", $response , "");


				 	 		break;
				 		default: 
				 			break;
				 	} 
				 	return $response;
				}  


				public function getOwnerStatus($owner, $whoAction, $modal_type=null, $on=null, $username, $_table) {


					if($_table == 'postedlooks') { 
						$aOrAn = 'a';
					} elseif($_table == 'fs_postedarticles') {  
						$aOrAn = 'an';
					} else { 

					}


					//If poster and who made the recent action same then it should go to if and if not then go to else.
					if($owner == $whoAction) {
						//return gender of the owner
						// return 'his';  
						$ownername = "   <b> <span style='color:#225B99' > on </span>  <a href='$username' > " . $this->get_gender( $owner ) . " </a> <span style='color:#225B99' > $modal_type </span> </b>";   
					} else { 	
					 	$ownername = " <span style='color:#225B99' > $on $aOrAn $modal_type by </span>  <b> <a href='$username' > ".$this->get_full_name_by_id($owner)." </a> </b>";   
					}

					return $ownername;
					
				}


				private function changeGrammerAction($action) { 
					//Change action grammer 
				    // If and text exist 
				    $action = str_replace(' ', '', $action); 
				    // echo "action = $action";  
				    if($action != 'Posted' and $action != 'Commented' and $action != 'Favorited' and $action != 'Dripped' and $action != 'Liked' and $action != 'Followed' and $action != 'Following' and $action != 'Shared') {  
						if( strpos($action, 'and') > -1) {  
						  	$action = str_replace('and', ',', $action); 
						  	$action = str_replace(' ', '', $action);  
	 					    $actionArr = explode(',', $action);  
	 					    $actionArrLen = count($actionArr);
	 					    $comma = ',';
	 					    $actionNew = ''; 
	 					    for ($i=0; $i <$actionArrLen  ; $i++) {   
	 					    	//remove comma when loop arrived to else which is to add the and text in the action
	 					    	if($i >= $actionArrLen-2) {  
	 					    		$comma = ''; 
	 					    	} 
	 							//construct the action from array to string
	 					    	if($i < $actionArrLen-1) {
	 					    		$actionNew .= $actionArr[$i] .  $comma . ' '; 
	 					    	} else { 
	 					    		$actionNew .= ' and ' . $actionArr[$i]; 
	 					    	} 
	 					    } 
						}
 					} else {  
						$actionNew = $action; 						
 					} 
 					// echo "New action $actionNew <br> "; 
 					return $actionNew; 
				}

				private function isActionCommentedIsLast($action) { 
 					$action = strtolower($action);  
					// echo "adding on <br>";  
					// echo $action . '<br>'; 
					$isCommentedIsLast = false;  
	                $actionArr = explode(',', $action); 
	                $actionArrLen = count($actionArr);    
	                for ($i=0; $i < $actionArrLen; $i++) {  
	                	$content =  $actionArr[$i]; 
	                	$actionArrLen2 = $actionArrLen-1;  
	                	// echo "$content <br>";
	                	if(strpos($content, 'commented')> -1) {    
	                		// echo "comment found <br>";  
							 // echo "$i==$actionArrLen2 content $content <br>";   
	                		// If the action is only to ex: commented and favorited
							if($actionArrLen2 == 0) {  
								// echo "total result is only 1 <br>";
								$contentArr = explode('and', $content);  
								$content1 = (!empty($contentArr[1])) ? $contentArr[1] : null;
								$content0 = (!empty($contentArr[0])) ? $contentArr[0] : null;  
								// $content1 = strip_tags($content1, '<span>'); 
 								// echo " $content0 || $content1  <br>"; 
								// echo $content1 . ' pos ' . strpos($content1, 'commented');   
								if(strpos($content1, 'commented') > -1) {  
									// echo "commeted1<br>";
									$isCommentedIsLast = true; 
								} 
								elseif( strpos($content0, 'commented') > -1 and empty($content1) ) { 
									// echo "commeted2<br>";
									$isCommentedIsLast = true; 
								} 
								// echo "c1 $content1 c0 $content0 <br>";   
							} else if($i==$actionArrLen2) { 
								// else this will handle mutiple actions
								//ex: commented, shared, liked and favorited
	                			$isCommentedIsLast = true; 
	                		} 
	                	} 			                	 
	                }  
	                return $isCommentedIsLast; 
				}
				public function get_activity_action(  $owner , $whoAction , $action , $_table_id  , $_date , $_table ) {  

 					// wording changes here
					$action = str_replace('Dripped', 'Shared',  $action); 

					     // echo "get_activity_action(  $owner , $whoAction , $action , $_table_id  , $_date , $_table ) <br>"; 
  
					  $action = $this->changeGrammerAction($action);
 
					// get gender  

						$gender = $this->get_gender( $owner );  


					// echo "Table name " .  $_table . '<br>'; 







 					$on = '';
					$modal_type  = "<em>".$this->get_modal_type( $_table , $_table_id )."</em>"; 

 
					// echo " action is $action  "; 
		      		$image = $this->get_my_action_image_equivalent ( $whoAction , $_table_id , $action );   

		      		$action = str_replace('and',"<span style='color:#225B99'>and</span>", $action ); 

		            if ( $action == 'Posted' ) {  
	            	 	$ownername = '';
	            	 	$br = '<br>';
	            	 	$action = "<span style='color:#d6051d' >Posted</span> <span style='color:#225B99' > a new $modal_type </span>";
	            	 	// echo "posted ";

		            }
		            elseif( strpos($action, 'Posted' ) ){   
		            	$action = "<span style='color:#d6051d' > ".strtolower($action)." </span>" ;  
		            	$ownername = '';
		            	$br = '';
		            	$ownername = " <span style='color:#225B99' >$gender $modal_type</span>"; 
		            	// echo " not posted ";
		            }
		            else{ 

		            	$username = $this->get_username_by_mno( $owner );
		            	$action = "<span style='color:#d6051d' > ".strtolower($action)." </span>" ;  
		            	// echo "else";
		            	$ownername = '';
		            	$br = '';
  
		            	// $actionArr = explode(',', $action); 
		            	// echo "<pre>";
		            	// print_r($actionArr); 
		            	
 
		                if($this->isActionCommentedIsLast($action)) {  
		                	$on = 'on'; 
		                } 

		            	//if (  strpos($action, 'commented' )  > 29 and  strpos($action , 'commented' )  < 35   ) { $on = 'on';   } else{  } // this is to show when first action comment happend  first comment action located at 30 index because its already has a span and styles colors. 
 						$ownername = $this->getOwnerStatus($owner,  $whoAction, $modal_type, $on, $username, $_table);
		            	// $ownername = " <span style='color:#225B99' > on a look by </span>  <b> <a href='profile?id=$owner' > ".$this->get_full_name_by_id($owner)." </a> </b>";   


 						// echo $ownername;


		            }    
		            $more = $this->get_more_friends_doing_the_action ( $whoAction , $_table_id , $action );     
		            $doingactionname = "<b>".$this->get_full_name_by_id($whoAction)."</b>";    
		            $when = $this->get_time_ago( $_date ); 
		            $action = strtolower($action);  
		            $username = $this->get_username_by_mno( $whoAction );

		            // echo " this is the image   $image ";
		            $action = "
		            <div style='border:1px solid none;line-height:16px;    ' id='look-modals-action' > 
			            <a href='$username' >$doingactionname</a> 
			            $more  
			            $action 
			            $ownername   
			            $br  
			            $when 
			            $image   
		            </div>";   
		            return $action;  
		            // Warning: Missing argument 3 for myclassCode::new_modals_header(), called in E:\xampp\htdocs\fs\new_fs\alphatest\fs_folders\php_functions\fs.console.source.php on line 1955 and defined in
				}
				public function new_modals_header( $mno , $action ,  $profilepath=null , $type=null ) {   

					?>
					<div id="new-look-profile-container" >
						<ul>
							<li>
								<div style="width:60px;" >   
									<?php 
									switch ( $type ) {
										case 'ads':
												 $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , null ,  'Fashion Sponge' , null , $type  ); 
											break; 
										case 'rate-page':
												$this->member_thumbnail_display( $this->ppic_thumbnail , $mno ,"$profilepath".$this->ppic_thumbnail );   
											break;
										default:
												$this->member_thumbnail_display( $this->ppic_thumbnail , $mno ,"$profilepath".$this->ppic_thumbnail );   
											break; 
											// member_thumbnail_display( $path , $mno , $checkpath=null , $title=null , $width ='50px' , $type=null, $height = '50px', $style='' ) {
									} 
									?>
								</div> 
							</li> 
							<li>
								<div style="width:210px;font-family:arial;font-size:12px; margin-left:2px;" >  
									<?php echo "$action"; ?>
								</div> 
							</li>
						</ul>	
					</div>  
					<?php   
				}
      			public function modal_version2_look ( $_table_id , $lookpath=null , $profilepath=null , $headersyle=null , $commentstyle=null  , $page=null  ) {  
      				
      				$ri                  = new resizeImage ();  
      				$_SESSION['mno'] 	 = $this->get_cookie( 'mno' , 136 );  
			 		$mno 			     = $this->get_cookie( 'mno' , 136 );   
 
      				switch ( $page ) {
      					case 'rate-look': 
      							#page here
      							$plno = $_table_id;  
      						    $ano  = $_table_id;
      						break;
      					default:
      							$ano = $_table_id; 
      							
					       		 
							    $activity            = $this->get_activity_posted( $ano );   
					            $whoAction           = $activity[0]['mno']; 
					            $plno                = $activity[0]['_table_id']; 
					            $_table              = $activity[0]['_table'];  
					            $action              = $activity[0]['action'];
					            $_date               = $activity[0]['_date'];   

      						break;
      				}
		       	


		     		$li                  = $this->posted_look_info( $plno );
		     		$lookname            = $li['lookName'];  
		            $lookOwnerMno        = $li['lookOwnerMno']; 
		     		$lookAbout           = $li['lookAbout']; 
		     		$pltcomment          = /*'9,999+';*/ $li['pltcomment']; 
		     		$tlview              = /*'9,999+';*/ $li['tlview'];     
		     		$tdrip               = /*'9,999+';*/ $li['tdrip'];     
		     		$tfavorite           = /*'9,999+';*/ $li['tfavorite'];     
		     		$tshare              = $li['tshare'];     
		     		$pltvotes            = $li['pltvotes'];     
		     		$trating             = $li['trating'];     
		     		$tpercentage         = $li['tpercentage'];     
		     	    $rating_percent      = intval($li['tpercentage']);
					$rating_total        = $li["pltvotes"]; 

		     		$comments = $this->get_look_all_comments( $plno , 'order by plcno desc limit 2 ' ); 
		     		$tcomments_len = count($comments);      
		     		//$radius = ( $pltcomment > 0 ) ? 'border-radius: 5px 5px 0px 0px;'  : 'border-radius: 5px; '  ;  
		     		$radius =  'border-radius: 5px 5px 0px 0px;';  


 					switch ( $page ) {
      					case 'rate-look': 
      						break; 
      					default:
      							$action = $this->get_activity_action( $li['mno'] , $whoAction , $action , $plno , $_date ,  $_table  );    
      						break;
      				}
		     	



		            // new to be transfer 

			            $ri->load("$lookpath".$this->look_folder_home."/$plno.jpg");  

			            $look_height = $ri->getHeight();  
			       		if (  $look_height < 250  ) {   
			     			$look_name_limitted = $this->set_text_limit_show( $lookname , 50 );   
			     			$look_about_limitted = $this->set_text_limit_show( $lookAbout , 120 );   
			     			// echo " between 200 and 230 ";
			     		}else{  
			     			$look_name_limitted = $this->set_text_limit_show( $lookname , 300 );  
			     			$look_about_limitted = $this->set_text_limit_show( $lookAbout , 300 );    
			     			// echo " exceed 200 and 230 ";
			     		}     
			     		$b1 = $this->check_if_more( $lookname  , $look_name_limitted );     
			     		$b2 = $this->check_if_more( $lookAbout  , $look_about_limitted );     
			     	// end to be transfer



      				?>     
      				<modals-item >    
      					<div class="<?php echo "$_table-$plno"; ?>" >
	      					<div style="display:none"> 
								<class>look_t<?php echo $ano; ?></class><class>look_t<?php echo $ano; ?></class>
							</div> 
		      				<div id="modals_version1_look_main_wrapper"  class="look_t<?php echo $ano; ?>"  >  
		      					<table border="0" style="border:1px solid none; width:100%;" cellspacing="0" cellpadding="0"  name='table1' > 
		      						<tr> 
		      							<td style="<?php echo "$headersyle"; ?>" >   
		      								<?php $this->new_modals_header( $whoAction , $action , $profilepath ); ?> 
		      							</td>
		      						<tr>  
		      							<td style="padding-top:9px;" >  
		      							</td>
		      						<tr> 
		      							<td style="padding-bottom:5px; padding-top:1px; border:1px solid #e2e2df; <?php echo $radius; ?> background:white "  >  

		      								<div id="new-look-body-container" style="margin-left:7px;background:white;" > 
		      									<ul> 
				      								<li style="display:none;" >      
				      									<div style=" padding:0px; margin:0px; width:270px; border:1px solid none; " >
					      									<div style="font-family:misoRegular; font-size:20px;" > 
					      										<?php echo "$lookname";  ?>
					      									</div>
					      									<div style="font-family:arial; font-size:12px;  " > 
					      										<?php echo "$lookAbout";  ?>
					      									</div>
				      									</div>  
				      								</li> 
				      								<li>  	 
				      									<table border="0" cellspacing="0" cellpadding="0" name='table2'  > 
															<tr>			      											
					      										<td style="height:150px; border:1px solid none;">     

					      											<!-- new display when mouse hover -->
						      											<a href="lookdetails?id=<?php echo $plno; ?>">
							      											<div id="new-look-mousover-desc-title-container" class="new-look-mousover-desc-title-container<?php echo $ano; ?>" onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-look-mousover-desc-title-container<?php echo $ano; ?>' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?>' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?>' ) "   >   
							      											 	<!-- header ratings  -->
																					<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;color:white;z-index:99;margin-top:5px; margin-left:-5px;width:100%;" name='table3' > 
																	 					<tr>
																	 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >   </td> 
																	 					 	<td> <span id='percentage_text' > <?php  echo $rating_percent; ?> </span><span style='font-size:15px;' > %</span></td> 
																	 					 	<td style="padding-left:10px;" >    
																		 						<div  id="new-look-modals-rating"  >
											      													<div style='margin-top:5px; margin-left:20px;position:absolute;font-size:11px;font-family:arial;font-weight:bold'   >
											      														RATE ( <?php echo $rating_total; ?> )
											      													</div> 
											      												</div> 
																		 					</td> 
																	 					 	<!-- <td> <span id='new-look-rating-text' > RATE ( <?php  echo $rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png" />  </td>  -->
																	 				</table> 
																 				<!-- desc and title -->
																	 				<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;color:white;z-index:99;margin-top:50px;width:100%;" name='table4' > 
																	 					<tr>  
																	 						<td id='new-look-title-desc-container' > 
																	 							<div id='new-look-details-title' style='font-size:20px;' >   
																		 							<?php    echo " <span style='color:#fff;font-family:misoLight' >"; echo $this->cleant_text_print_from_db ( $look_name_limitted ); echo "</span> "; ?>  
																	 							</div> 
																	 						</td>  
																	 					<tr> 
																	 						<td id='new-look-title-desc-container' style="padding-top:10px;" >  
																	 							<div id='new-look-details-desc' style='font-size:12px;' >     
																			 						<?php  echo " <span style='color:#fff' >";  echo $this->cleant_text_print_from_db ( $look_about_limitted );  echo "</span>  "; ?>  
																 								</div>   
																	 						</td> 	 
																	 				</table> 
	 																			<!-- invisible image to fit the height -->
								      												<div style="border:1px solid none; background-color:#000; " class="transparent" >
								      													<img src="<?php echo "$this->look_folder_home/$plno.jpg" ?>" style='position:relative;width:100%;  visibility:hidden ' />   	
								      												</div>  
							      												<!-- footer icons -->  
		 
						      														<ul style="position:relative;margin-top:-24px; margin-left:10px;z-index:102;color:white"   id="new-look-modals-footer-icons"   >
								      													<li style="padding-top:2px;" > 
								      														<div id="new-look-modals-comment-icon" > 	 
								      														</div> 
								      													</li>
								      													<li style="width:35px;"  >
								      														<div>
								      															<?php echo "$pltcomment"; ?>
								      														</div>
								      													</li>
								      													<li style="padding-top:3px;" > 
								      														<div id="new-look-modals-views-icon" > 	
								      														</div>  
								      													</li>
								      													<li   style="width:35px;"  >
								      														<div>
								      															<?php echo "$tlview"; ?> 
								      														</div>
								      													</li>
								      													<li> 
								      														<div id="new-look-modals-drip-icon" > 	
								      														</div>  
								      													</li>
								      													<li  style="width:35px;"  >
								      														<div>
								      															<?php echo "$tdrip"; ?> 
								      														</div>
								      													</li>
								      													<li  > 
								      														<div id="new-look-modals-favorite-icon" > 	
								      														</div>  
								      													</li> 
								      													<li  style="width:35px;"  >
								      														<div>
								      															<?php echo "$tfavorite"; ?> 
								      														</div>
								      													</li>
								      													<li style="padding-left:5px;" > 
								      														<div   id="new-look-modals-share-icon" class='share_look_modals<?php echo $ano; ?>' onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.share_look_modals<?php echo $ano; ?>' ,   '.share_look_modals<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ) "  > 	
								      														</div>   
								      													</li>  
								      												</ul> 
								      												<!-- <table id='new-look-modals-footer-icons' style="margin-left:-1px;margin-top:-30px; text-align:left"   border="1" cellpadding="0" cellspacing="0"  > 
																	 					<tr>   	 
																	 					<td> <img id='tmsg'                             style="cursor:pointer"   src="fs_folders/images/body/Look/comment icon.png"   title="comments" > </td>      
																	 					<td  style="width:25px;" > <span> <?php echo $comment; ?>    </span> </td>
																	 					<td> <img id='teye'                             style="cursor:pointer"   src="fs_folders/images/body/Look/views icon.png"     title="views"    > </td>      
																	 					<td  style="width:25px;" > <span> <?php echo $view; ?>        </span> </td>
																	 					<td> <img id='tarrw'                            style="cursor:pointer"   src="fs_folders/images/body/Look/redrip.png"         title="drips"     > </td>     
																	 					<td  style="width:25px;" > <span> <?php echo $redrip; ?>      </span> </td>   
																	 					<td  > <img id='thrt'                           style="cursor:pointer"   src="fs_folders/images/body/Look/favorites icon.png" title="favorites"> </td>    
																	 					<td  style="display:none" > <span> <?php echo $favorites; ?> </span> </td>  
																	 					<td style="width:20px;" > <img  			    style="cursor:pointer"   src="fs_folders/images/body/Look/share-icon1.png"    id='share_look_modals<?php echo $ano; ?>'  onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '#share_look_modals<?php echo $ano; ?>' ,   '#share_look_modals<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ) " > </td>    
																	 				</table>  --> 
									      									</div>     
									      								 </a> 

							      									<!--  display image before mouse over -->
								      									<!-- <div id="new-look-image-container" class="new-look-image-container<?php echo $ano; ?>" style="border: 1px solid non"  onmouseover="new_look_image_mouse_hovered( '<?php echo $ano; ?>' )" > -->
								      									<div id="new-look-image-container" class="new-look-image-container<?php echo $ano; ?>" style="border: 1px solid non"  onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-look-image-container<?php echo $ano; ?> ' ,   '.new-look-image-container<?php echo $ano; ?>  ' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?>' )"  >  
								      										 
							      											<!-- show hide the footer stat <img src="<?php echo "$this->look_folder_home/$plno.jpg" ?>" style='position:relative;width:100%;  '  id="new_look_image_div<?php echo $ano; ?>" onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '#new_look_image_div<?php echo $ano; ?> ' ,   '#new_look_image_div<?php echo $ano; ?>  ' ,   '#new_look_stat_container<?php echo $ano; ?>' )" />    --> 
							      											 <img src="<?php echo "$this->look_folder_home/$plno.jpg" ?>" style='position:relative;width:100%;    ' />  
								      										 
								      									</div>      
					      										</td>   
					      									<tr>
					      										<td >  
												 					<!-- for default and showing footer <div style="position:absolute;border:1px solid none; margin-top:-10px; z-index:120; display:none; padding-top:5px; " id="dropdown_share<?php echo $ano; ?>"     onmouseover="share_mouser_over('<?php echo $ano; ?>')"  onmouseout="share_mouser_out('<?php echo $ano; ?>')"     >    -->
												 					 <div style="position:absolute;border:1px solid none; margin-top:-10px; z-index:120; display:none; padding-top:5px; " id="dropdown_share<?php echo $ano; ?>"     onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '#dropdown_share<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?> , #dropdown_share<?php echo $ano; ?>' )"     >    
								 										
								 										<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals<?php echo $ano; ?>'  style='width:269px; height:55px; '  name='table6' />    
									 									<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;margin-top:-36px; margin-left:40px;"  onclick="return false" > 
												 							<tr> 
												 								<td  style="padding-left:0px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"     onclick="fbshare('<?php echo $plno; ?>','home');" ></td>  
																	            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"      onclick="twitter_look('<?php echo $plno; ?>' , '<?php echo $lookname; ?>' ) "   ></td>  	
																	            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"       onclick="share_tumblr_looks('<?php echo $plno; ?>')" >                      </td>  
																	            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_q.png"    title = "pinterest"    onclick="share_pinterest( '<?php echo $plno; ?>'  )" ></td>  
																	            <td  style="padding-left:7px;cursor:pointer" > <a href="https://plus.google.com/share?url={http://fashionsponge.com/lookdetails?id=<?php echo $plno; ?>}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> 
																	            					  <img  style="width:20px" src="fs_folders/images/attr/ld_white_g+.png"   title = "google+"            				   > </a> </td>   
																	            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_line.png" title = "stumbleupon"  onclick="PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $plno; ?>&src=badge','Share to StumbleUpon +',800,540)" ></td> 
																	            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_mail.png" title = "email" onclick="share_gmail_looks( '<?php echo $plno; ?>' )"  ></td> 
											 							</table>   
											 						</div>
												 				</td>
				      									</table> 
				      								</li>   
				      							</ul> 	
		      								</div> 
		      							</td>  
		      						<tr>
		      							<?php if ( $pltcomment > 0 ) { ?>
			      							<td style="  background-color:#f6f7f8; border:1px solid #e2e2df;border-top:none; border-radius: 0px 0px 5px 5px; padding-top:0px; padding-left:7px; <?php echo "$commentstyle"; ?>"   > 
		      									<div id="new-look-body-comment-container" >  
		      										<table border="0" cellpadding="0" cellspacing="0"  name='table7'> 
		      											<tr> 
		      												<td style="padding-bottom:5px;padding-left:2px;"> 
		      													<a href="lookdetails?id=<?php echo $plno; ?>#lbc_comments" style='text-decoration:none' > 
			      													<div style="cursor:pointer;color:#284372" > 
				      													View all <b><?php echo "$pltcomment"; ?></b> comments	
				      												</div>
			      												</a>
		      												</td>
		      											<tr> 
		  													<?php   

		  													#from database lookcomment 
		  														// $len  = ($pltcomment < 3 ) ? $pltcomment : 2;    
		  													#from real comment count
		  														$len  = (count($comments)  < 3 ) ? count($comments)  : 2;    

		  													for ($i=0; $i < $len ; $i++) {      
																$plcno        = $comments[$i]['plcno'];
																$plno         = $comments[$i]['plno'];
																$mno_commentor= $comments[$i]['mno']; 
																$date_        = $this->get_time_ago( $comments[$i]['date_'] ); 
																$msg          = $comments[$i]['msg']; 
																$plctlikes    = $comments[$i]['plctlikes'];
																$plctdislike  = $comments[$i]['plctdislike'];  
																$fullname     = $this->get_full_name_by_id ( $mno_commentor ); 
																$b            = $this->get_your_look_comment_thumb_up_or_down( $mno , $plcno );     
							 									$you_liked    = ( $b == 'Thumb-Up' ) ? 'comment-like-liked.png' : 'commen-like-unlike.png' ;
							 									$you_disliked = ( $b == 'Thumb-Down' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;    
							 									// $profile_pic = $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   

							 									// $plctlikes = '12,332'; 
							 									// $plctdislike = '1,000'; 
		  													?>  
		      												<td style="padding-bottom:0px;" id="comment-container<?php echo $ano; ?>"  >  
					      										<ul style="padding:none; margin:none; border:1px solid none;" >
					      										 	<li> 
					      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno_commentor ,"$profilepath"."$this->ppic_thumbnail" , null , '35px;', '',  '35px;'  );  ?>
					      										 	</li>   
					      										 	<li style="width:228px;font-family:arial; font-size:12px;  " >
					      										 		<div style="margin-top:-2px;" >
						      										 		<div style="margin-left:7px;"  >
						      										 		 	<b style='color:#284372' > <?php echo $fullname; ?> </b> <?php echo $this->cleant_text_print_from_db ( $msg ); ?>
						      										 		</div> 
						      										 		<div style="margin-left:7px; color:#d6051d"  >  

						      										 			<table border="0" cellpadding="0" cellspacing="0" style="width:auto;padding:none;margin:0px; " name='table8' > 
						      										 				<tr>  
						      										 					<td style='width:70px' > 
						      										 						<span style='color:#ccc;font-size:12px' > <?php echo "$date_"; ?>   </span> 
						      										 					</td>
						      										 					<td style="padding-left:10px;" >  	
						      										 						<div style="margin-top:-1px;" >
							      										 						<img src="<?php echo "$this->genImgs/$you_liked"; ?>" style='height:12px;' />  
						      										 						</div>
						      										 					</td>
						      										 					<td style=" color:#d6051d;font-size:12px;padding-left:5px;" >  <?php echo "$plctlikes";  ?> </td>
						      										 					<td style="padding-left:5px;" > 
						      										 						<div style="margin-top:2px;" >
						      										 							<img src="<?php echo "$this->genImgs/$you_disliked"; ?>" style='height:12px;' />
						      										 						</div> 
						      										 					</td>
						      										 					<td style="color:#d6051d;font-size:12px;padding-left:5px;" > <?php echo "$plctdislike"; ?>  </td>
						      										 			</table>  
						      										 		</div>
						      										 	</div>
					      										 	</li>   
					      										</ul>   
					      									</td>
				      									<tr>
				      										<?php  
				      											}   
				      										?> 
				      									<td style="padding-bottom:8px;" >  
				      										<ul style="border:1px solid none;" >
				      										 	<li> 
				      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno ,$this->ppic_thumbnail , null , '35px;', '', '35px;'  );   ?>
				      										 	</li>   
				      										 	<li style="width:225px;font-family:arial; font-size:12px;" >
				      										 		<a href="lookdetails?id=<?php echo $plno; ?>#cmment" style='text-decoration:none' >
					      										 		<div style="margin-left:5px;"  > 
					      										 			<input type="text" placeholder='Leave a comment' style=" border:1px solid #e2e2df; height:35px; width:230px; padding-left:5px; " >      										 		 	 
					      											 	</div>  
				      											 	</a>
				      										 	</li>  
				      										</ul>   
				      									</td>
		      										 </table>
		      									</div> 
			      							</td>
		      							<?php } ?>
		      					</table>  
		      				</div>    
	      					<?php if($feed == TRUE): ?>	
								<div style="height:6px;" > </div>  
							<?php else: ?>
								<div style="height:15px;" > </div>  
							<?php endif; ?>
	      				</div>
	      		 	<?php
      			}  
      			public function modal_version1_look ( $_table_id , $lookpath=null , $profilepath=null , $headersyle=null , $commentstyle=null  , $page=null  ) {  
      				
      				$ri                  = new resizeImage ();  
      				$_SESSION['mno'] 	 = $this->get_cookie( 'mno' , 136 );  
			 		$mno 			     = $this->get_cookie( 'mno' , 136 );    

      				switch ( $page ) {
      					case 'rate-look':   
      							$plno = $_table_id;  
      						    $ano  = $_table_id;  
      						break;  
      					case 'profile-tab-look':  
      							$plno = $_table_id;  
      						    $ano  = $_table_id;  
      						break;  
      					default:
      							$ano = $_table_id;  
							    $activity            = $this->get_activity_posted( $ano );   
					            $whoAction           = $activity[0]['mno']; 
					            $plno                = $activity[0]['_table_id']; 
					         	$_table              = $activity[0]['_table'];  
					            $action              = $activity[0]['action'];
					            $_date               = $activity[0]['_date'];    
      						break;
      				}
		       	 
		     		$li                           = $this->posted_look_info( $plno );
		     		$lookname                     = '<b>'.strtoupper($li['lookName']).'</b>';
		            $lookOwnerMno                 = $li['lookOwnerMno']; 
		     		$lookAbout                    = $li['lookAbout']; 
		     		$look_attr['lookAbout']       = $li['lookAbout']; 
		     		$pltcomment                   = /*'9,999+';*/ $li['pltcomment']; 
		     		$tlview                       = /*'9,999+';*/ $li['tlview'];     
		     		$tdrip                        = /*'9,999+';*/ $li['tdrip'];     
		     		$tfavorite                    = /*'9,999+';*/ $li['tfavorite'];     
		     		$tshare                       = $li['tshare'];     
		     		$pltvotes                     = $li['pltvotes'];     
		     		$trating                      = $li['trating'];     
		     		$tpercentage                  = $li['tpercentage'];     
		     		$rating_percent               = intval($li['tpercentage']);
					$rating_total                 = $li["pltvotes"]; 
					$date_                        = $li["date_"]; 

					$look_attr['owner']           =  $lookOwnerMno;
					$look_attr['thumbsUp']        = 'look-white-thumb.png';
					$look_attr['thumbsDown']      = 'look-white-down-thumb.png';
					$look_attr['stat_rated']      = 'look not rated';
					$look_attr['stat_dripted']    = 'look not dripted';
					$look_attr['stat_favorited']  = 'look not favorited';
					$look_attr['response']        = '';    
					$look_attr['title']           = strtoupper($li['lookName']);
					$look_attr['tview']           = $li['tlview']; 
					$look_attr['trating']         = $li['trating'];   
					$look_attr['tdrip']           = $li['tdrip'];    
					$look_attr['tfavorite']       = $li['tfavorite'];
					$look_attr['percentage']      = $li['tpercentage'];  
					$look_attr['category']        = $li['style'];    
					$look_attr['share']           = 0;   
					$look_attr['dripped_name']    = '';
					$look_attr['dripped_message'] = '';
					$look_attr['table_name']      = 'postedlooks';  
					$look_attr['headermssg']      = 'SUCCESSFULLY FAVORITED'; # this is for success message popup
					$look_attr['contentmssg']     = 'This Look is now on your favorite list.'; # this is for success message popup  

					#user  
					$user['username']                  = $this->get_username_by_mno( $look_attr['owner'] ); 
					$look_attr['src_img_drip']         = "look-icon-drip-modal.png";   
					$look_attr['src_img_drip_dynamic'] = "look-icon-drip-modal.png"; // change this to "look-icon-drip-selected.png" if u want to have a color when drip clicked
					$look_attr['src_img_favorite']     = "look-icon-favorite-modal.png"; 
					$look_attr['src_img_share']        = "look-icon-share.png";  
					$look_attr['src_img_flag']         = "modal-flag-dot.png";//"modal-flag.png";  
					$look_attr['response_drip']        = array();
					$look_attr['response_favorite']    = array();
					$look_attr['response_share']       = array(); 
					$look_attr['path'] 			       = $profilepath; 
					$look_attr['style']                = strtoupper($li['style']); 


		     		$comments = $this->get_look_all_comments( $plno , 'order by plcno desc limit 2' ); 
		     		$tcomments_len = count($comments);      
		     		//$radius = ( $pltcomment > 0 ) ? 'border-radius: 5px 5px 0px 0px;'  : 'border-radius: 5px; '  ;  
		     		$radius =  'border-radius: 5px 5px 0px 0px;';   
		     		//$blogName =   $this->getUserInfo($look_attr['owner'], 'blogdom'); 
		     	    $blogUrl   						   =   ($this->getUserInfo($look_attr['owner'], 'blogurl') != "") ? $this->getUserInfo($look_attr['owner'], 'blogurl') : '#';  
		     	    $blogName 						   =   $this->getUserInfo($look_attr['owner'], 'blogdom'); 
		     	    $blogNameLink                      =   (!empty($blogName)) ? "of <a href=\"$blogUrl\" target=\"_blank\" class='user-blogname' ><b> $blogName </b> </a>  " : "";


 	



		     		$latestLikerName = ''; 

 					switch ( $page ) {
      					case 'rate-look': 
      						break; 
      					case 'profile-tab-look':  
      						break; 
      					default:   

	      					 	$len_dripped  = strpos($action,'Dripped'); 
	      					 	// echo " Dripped post $len_dripped <br> "; 
	      					 	// latest action is dripped so dripped comment will show in the modals
	      					 	if ( $len_dripped >= 0  ):  
									$array = array(      
									    'limit_start'=>0, 
									    'limit_end'=>1,
									    'query_where'=>"table_id = $plno", // mno = 133 and table_name = 'postedlooks'
									    'query_order'=>'dmno desc', 
									    'query_drip'=>'get-all-user-dripped' 
									);     
									$response =  $this->fs_drip_modals_Query ( $array );  
									// $look_attr['dripped_username']    =  "@".$this->get_username_by_mno( $response[0]['mno'] ).' said'; 
									$look_attr['dripped_username']    = $this->get_full_name_by_id ( $response[0]['mno']  ).' said'; 
		      						
									$look_attr['dripped_message'] = $response[0]['comment'];  
	      					 	endif;   

	      					 	// echo "WHO ACTION FUNCTION";

      							$action = $this->get_activity_action( $li['mno'] , $whoAction , $action , $plno , $_date , $_table  );    

      						break;
      				}
		     	

		            // new to be transfer for the desc of the look

				       //   $ri->load("$lookpath".$this->look_folder_home."/$plno.jpg");   
				       //   $look_height = $ri->getHeight();  
				       // 	if (  $look_height < 250  ) {   
			     		// 	$look_name_limitted = $this->set_text_limit_show( $lookname , 50 );   
			     		// 	$look_about_limitted = $this->set_text_limit_show( $lookAbout , 120 );   
			     		// 	// echo " between 200 and 230 ";
			     		// }else{  
			     		// 	$look_name_limitted = $this->set_text_limit_show( $lookname , 300 );  
			     		// 	$look_about_limitted = $this->set_text_limit_show( $lookAbout , 300 );    
			     		// 	// echo " exceed 200 and 230 ";
			     		// }      
			     		// $b1 = $this->check_if_more( $lookname  , $look_name_limitted );     
			     		// $b2 = $this->check_if_more( $lookAbout  , $look_about_limitted );     

			     	// end to be transfer 
						$look_attr['response'] = $this->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>'postedlooks' ,  'table_id'=>$plno,  'rate_query'=>'get-user-rated-type'  )  );    
						if ( $look_attr['response'] == true ) {  
							$look_attr['stat_rated'] =  'look already rated'; 
							if ( $look_attr['response'] == 'like') {
								$look_attr['thumbsUp'] = 'look-red-thumbs.png';
								
							}   
							if ( $look_attr['response'] == 'dislike') { 
							   $look_attr['thumbsDown'] = 'look-red-thumb-down.png'; 
							  
							}
							$look_rated = true;
						} else { 
							$look_rated = false;
						}


					#set points color  

						$look_attr['response_drip'] =  $this->fs_drip_modals_Query (  
							array(      		     
							    'limit_start'=>0, 
							    'limit_end'=>1,
							    'query_where'=>"table_id = $plno and mno = $mno",  
							    'query_order'=>'dmno asc', 
							    'query_drip'=>'get-all-user-dripped' 
							)
						);   
						if (!empty( $look_attr['response_drip'] ) ) {
							 
							// $look_attr['src_img_drip'] = "look-icon-drip-selected.png";   // the colored driped   
						 	//$look_attr['src_img_drip_dynamic'] = "look-icon-drip-selected.png";  // update the main initialized when u want to have a color when the dripped clicked
						 	$look_attr['src_img_drip'] = "look-icon-drip-modal.png";
							
						} 


						 

						$look_attr['response_favorite'] =  $this->fs_favorite_modals_Query (   
							array(      		     
							    'limit_start'=>0, 
							    'limit_end'=>1,
							    'query_where'=>"table_id = $plno and mno = $mno", 
							    'query_order'=>'fmno asc', 
							    'query_favorite'=>'get-all-user-favorite' 
							)
						); 
						if (!empty( $look_attr['response_favorite'] ) ) { 
							$look_attr['src_img_favorite'] = "look-icon-favorite-selected.png";  
						} 

						$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $plno and table_name= 'postedlooks' and mno = $mno "  )  );   
						if ( !empty($response) ) {
							  $look_attr['src_img_flag']        = "large-flag-red.png";
						}

					# get image src

						$look_attr['src']  = $this->image( 
						    array( 
						        'table_name'=>$look_attr['table_name'],
						        'table_id'=>$plno,
						        'type'=>'get-default-image-src',
						        'size'=>'home',
						        'path'=>$look_attr['path']
					      	)
					 	); 
 					# set status of owner or not for the user not allow to rate , drip and favorite the modal
 
						if ( $look_attr['owner'] == $mno ): 				

							$look_attr['stat_rated']	 =  'modal owner'; 
							$look_attr['stat_dripted'] 	 =  'modal owner'; 
							$look_attr['stat_favorited'] =  'modal owner';    

						endif;    
					     $title=page::set_url_for_modal_details($plno,'look',strtolower($look_attr['style']), $date_,strtolower($look_attr['title']));

   					 if($page == 'rate-look')  {$feed = TRUE; }else{   $feed = FALSE;  }

  
   					//Get user look uploaded order by the heighst likes
 
						// print('mno = ' .  $look_attr['owner'] );

						$featuredLooks = select_v3( 
					   		'postedlooks' , 
					   		'*' , 
					   		"mno = '"  . $look_attr['owner'] .  "'  and plno <> $plno and style = '" . $look_attr['style'] . "' order by trating desc limit 3"
					   	);    

					   	// print('<pre>');
					   	// print_r($featuredLooks);
					   	// print('</pre>'); 

					   	// for ($i=0; $i < count($featuredLooks); $i++) { 
					   	// 	echo $featuredLooks[$i]['mno'] . ' plno ' . $featuredLooks[$i]['plno']. '<br>'; 
					   	// } 

						/** on the blue box show latest member to like post and the total number of likes by others */
						$latestUserRated = select_v3( 
					   		'fs_rate_modals' , 
					   		'mno' , 
					   		"table_id = $plno and table_name = 'postedlooks' ORDER BY rmno desc limit 1" 
					   	);     
					   	if(!empty($latestUserRated[0]['mno'])){
					   		$latestLikerName = $this->get_full_name_by_id ( $latestUserRated[0]['mno'] ); 	
					   	} 
					   	// echo "Latest Liker Name = $latestLikerName"; 

      				?>     
      				<modals-item >    
      					<div class="<?php echo "$_table-$plno"; ?>" >
	      					<div style="display:none"> 
								<class>look_t<?php echo $ano; ?></class><class>look_t<?php echo $ano; ?></class>
							</div> 
		      				<div id="modals_version1_look_main_wrapper"  class="look_t<?php echo $ano; ?>"  >  
		      					<table border="0" cellspacing="0" cellpadding="0"  name='table1' class="modal-container-image-table" > 
		      						<tr>  

		      							<!-- this will print except the rate page area -->
		      							<td style="<?php echo "$headersyle"; ?>" >    
		      								<?php $this->new_modals_header( $whoAction , $action , $profilepath ); ?> 
		      							</td>

		      							<!-- This will only print in the rate page area --> 
		      							<?php if($feed == TRUE): ?>
			      							<td>  
			      								<?php  
											        $owner_fullname = $this->get_full_name_by_id($look_attr['owner']); 
											        $ago            = $this->get_time_ago($date_); 
											        $uname          = $this->get_username_by_mno($look_attr['owner']);  
			      								?>
 			      								 <div style="border:1px solid none;line-height:16px;    " id="look-modals-action"> 
			      									<?php $this->new_modals_header( $look_attr['owner'] ,  "  <a href='$uname'> $owner_fullname </a>    <span style=' color:#225B99' > $blogNameLink <span style='color:#d6051d'>  posted </span>   a new look </span> $ago " , $profilepath );  ?> </span>
				      							</div>   
			      							</td>
		      							<?php endif; ?> 
		      						<tr>  
		      							<td style="padding-top:9px;" >  
		      							</td>
		      						<tr> 
		      							<td  id="modal-image-container-td"  style="<?php echo $radius; ?>"  >  

		      								<div id="new-look-body-container" style="margin-left:7px;background:white; border:1px solid none;" > 
		      									<ul> 
				      								<li style="display:none;" >      
				      									<div style=" padding:0px; margin:0px; width:270px; border:1px solid none; " >
					      									<div style="font-family:misoRegular; font-size:20px;" > 
					      										<?php echo "$lookname";  ?>
					      									</div>
					      									<div style="font-family:arial; font-size:12px;  " > 
					      										<?php echo "$lookAbout";  ?>
					      									</div>
				      									</div>  
				      								</li>  
				      								<li>  	 
				      									<table border="0" cellspacing="0" cellpadding="0" name='table2' style="padding-top:5px;"  > 
															<tr>			      											
					      										<td style="height:150px; border:1px solid none;">     
									      							<!-- main image -->
								      									<div id="new-look-image-container" class="new-look-image-container<?php echo $ano; ?>" style="border: 1px solid none"  onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-look-image-container<?php echo $ano; ?> ' ,   '.new-look-image-container<?php echo $ano; ?>  ' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?>' )"  >   
							      											<!-- <a href="lookdetails?id=<?php echo $plno; ?>"> -->

							      											<!-- <div onclick="fs_popup( 'modal-details' , 'feed-modal-clicked-detail-view' , 'process' , 'method' , '<?php  echo $plno; ?>' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $title; ?>' )" >   -->

																			<a href="lookdetails-dev.php?id=<?php echo $plno; ?>">    
	                                                                        	<img src="<?php echo $look_attr['src']; ?>" style='position:relative;width:100%;    ' />
																			</a> 
																			<!-- </div> -->
							      											<!-- <a href="lookdetails?id=<?php echo $plno; ?>"> -->
								      									</div>     
					      										</td>    
				      									</table> 
				      								</li>   
				      							</ul> 	
		      								</div> 
		      							</td>  
		      						<tr> 
		      							<td class="modal-footer-container" style="<?php echo "$commentstyle"; ?>"   > 
	 

		      								<!-- status used for the validation of the ratings and so on -->

		 										<div id="status-container"  >
		 											<input type="text" value="<?php echo "$look_attr[stat_rated]"; ?>"       id="stat-look-rated<?php echo $ano; ?>"       /> <br>
		 											<input type="text" value="<?php echo "$look_attr[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $ano; ?>"         /> <br>
		 											<input type="text" value="<?php echo "$look_attr[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $ano; ?>"    /> <br>
		 										</div>

		 									<!-- first footer grey line top  -->

		      									<div class='modal-comment-grey-line' > 
		      									</div>  

	 										<!-- dripped message  -->

		 										<?php if( !empty($look_attr['dripped_message']) ):  ?>
			      									<div id="new-look-modals-dripped-message-container" >  
			      										<b><?php echo "$look_attr[dripped_username]:"; ?></b>
			      										<span><?php echo  ucfirst("$look_attr[dripped_message]"); ?></span>
			  										</div>  
		  										<?php endif; ?> 	   

	  										<!-- category message  -->

		  										<?php if( !empty($look_attr['style']) ):  ?> 
		  												<a href="look?category=<?php echo strtolower($look_attr["style"]); ?>">
															<div class="modal-footer-category"  >
																 <?php echo "$look_attr[style]"; ?> 
															</div>     
														</a>
													</a>
												<?php endif; ?> 	   

											<!-- title message -->


		 										<?php if( !empty($look_attr['title']) ):  ?> 
		 											<a href="lookdetails-dev.php?id=<?php echo $plno; ?>">
				      									<div id="new-look-modals-title1-container" > 
				      										<?php echo "$look_attr[title]"; ?>    
			      											<?php if($feed == TRUE): ?>	 
			      												<span class="dot" > 
			      													<img src="fs_folders/images/rate/red-dot.png" />
			      												</span>  
			      												&nbsp; 
			      												<span class="posted-hour" > 
			      													34 mins
			      												</span>

			      											<?php endif; ?>
				  										</div>    
			  										</a>
		  										<?php endif; ?>  
											<!-- description -->  
												<div class="wrapper-modal-description" >
			  										<div id="new-look-modals-description-container">
			  											<span>  
			  												<?php     

			  													//look
			  													print($this->string_limit($lookAbout, 160, 'look', $plno));  
			  												?>
															<!-- 1123123Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry...  --> 
														</span>  
			  											<!-- <span  class="modal-description-more-text" >MORE...</span> 
			  											<span> <img class="modal-description-more-icon" src="fs_folders/images/modal/look/more-detail-icon.png" > </span>  -->
			  										</div>  
		  										</div>
		  									<!-- grey line --> 
		  										<!-- <div class='modal-comment-grey-line' style="margin-top:3px;" > 
		      									</div> 	 --> 
	      									<!-- blue rectangle --> 
		  										<div id="new-look-modals-stat-container" style="display:none" >
		  											<center>
			  										 	 <table border="0" cellspacing="0" cellpadding="0" style="padding:0px; margin:0px; width:97%; "  > 
			  										 	 	<tr> 
			  										 	 		<td style="width:35px;" > 
			  										 	 			<span style="font-size:12px !important" > <b><?php echo "$look_attr[percentage]"; ?>%</b>  </span> 
			  										 	 		</td> 
			  										 	 		<td style="width:70px;" > 
			  										 	 			<span style="font-size:12px;!important" >LIKES THIS </span>
			  										 	 		</td>  
			  										 	 		<td style="width:45px;" >   
			  										 	 			<table style="margin-top:-9px; width:40px;float:right" border="0" cellspacing="0" cellpadding="0"  > 
			  										 	 				<tr>  
			  										 	 					<td> 
			  										 	 							<img src="<?php echo "  $this->genImgs/$look_attr[thumbsUp]"; ?>" title='like'            style='height:18px;' class='postedlooks-like<?php echo $ano; ?>'      onclick="posted_modals_rate_Query ( '0' , '133' , 'postedlooks' , 'like' , '<?php echo "$plno"; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $ano; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $ano; ?>' , '<?php echo $look_attr['category']; ?>' , '<?php echo $ano; ?>'  )" > 
			  										 	 					</td> 
			  										 	 					<td> 
			  										 	 						<div style="margin-top:6px;" > 
			  										 	 							<img src="<?php echo "  $this->genImgs/$look_attr[thumbsDown]"; ?>" title='dislike'   style='height:18px;' class='postedlooks-dislike<?php echo $ano; ?>'       onclick="posted_modals_rate_Query ( '0' , '133' , 'postedlooks' , 'dislike' , '<?php echo "$plno"; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $ano; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $ano; ?>' , '<?php echo $look_attr['category']; ?>' , '<?php echo $ano; ?>' )"  > 
			  										 	 						</div>
			  										 	 					</td>
			  										 	 			</table> 
			  										 	 		</td> 
			  										 	 		<td>
			  										 	 			<div  id="new-look-modals-rating" style="width:100px; background-size: 100px 19px; border:1px solid none; float:right; margin-top:5px;   " >
				      													<!-- <div style='cursor:pointer; border:1px solid none; margin-top:2px; margin-left:15px;  position:absolute;font-size:11px !important;font-family:arial; ' onclick="fs_popup( 'postarticle' , 'rate-posted-modals-view' , 'look-modal-design'  , 'method' , '<?php echo $plno; ?>' , '<?php echo $look_attr['table_name']; ?>' )" > -->

				      													<div style='cursor:pointer; border:1px solid none; margin-top:2px; margin-left:15px;  position:absolute;font-size:11px !important;font-family:arial; ' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'RATINGS ( <?php echo "$look_attr[trating]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' , '<?php echo $look_attr['category']; ?>' )" >  
				      														RATE ( <span id='modal-tratings<?php echo $ano; ?>' ><?php echo "$look_attr[trating]"; ?></span> )
				      													</div> 
				      												</div> 
				      											</td>  
			  										 	 </table>
		  										 	 </center>
		  										</div>     
		  									<?php if($feed == FALSE): ?> 
			  									<!-- new blue rectangle -->
			  										 <!-- look --> 
												  	<div id="new-look-modals-stat-container-1"> 
													  	<table cellspacing="0" cellpadding="0"> 
													  		<tbody>
													  			<tr> 
															      	<td>  
																        <?php if($look_rated == false) { ?> 
																          	<img 
															 					src="fs_folders/images/modal/look/modals-like.png"   
																	          	id="look-like-<?php  echo $ano;  ?>"   
																	      		onclick="look_like_click( '<?php echo $mno ?>' , '<?php echo $plno ?>' , 'postedlooks' , 'like' , 'liked.png' , '#look-like-<?php  echo $ano;  ?>' , '<?php echo $ano ?>' , '#look-total-like-<?php  echo $ano;  ?>', '<?php echo $this->get_full_name_by_id ( $this->mno ); ?>')"   
																 			    onmousemove=" mousein_change_button ( '#look-like-<?php  echo $ano;  ?>' , 'fs_folders/images/modal/look/liked.png' )" 
																 				onmouseout="mouseout_change_button (  '#look-like-<?php  echo $ano;  ?>'  , 'fs_folders/images/modal/look/modals-like.png' ) " 
															 				/>   
																			<input onclick=" test_modal () "  type="text" value="not rated comment" id="rate-comment-stat<?php echo $ano ?>" class='hide'  />
															 			<?php } else { ?> 
															 				<img src="fs_folders/images/modal/look/liked.png"   id="look-like-<?php  echo $ano;  ?>"    /> 
															 			<?php } ?>  
															      	</td> 
															        <td>

															        <?php 
															        	if($pltvotes == 0) {?>
																	 		<a id="look-total-like-<?php  echo $ano;  ?>" style="font-family: 'Avenir LT Std 85 Heavy' !important; color:white; cursor:pointer" ><?php print($pltvotes); ?></a> like this <span> 
																		<?php  } elseif($pltvotes == 1) { ?>											 		
																			<span> <?php echo $latestLikerName; ?> like this <span> 
																		<?php } else { ?> 
																			<span> <?php echo $latestLikerName; ?> and 
																			<a 
																				id="look-total-like-<?php  echo $ano;  ?>" 
																				style="font-family: 'Avenir LT Std 85 Heavy' !important; color:white; cursor:pointer" 
																				onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'VIEWS ( <?php echo "$look_attr[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"
																			>
																			<?php print($pltvotes-1); ?>
																			</a> others like this <span> 
																		<?php } ?>  
																	</div>  
															      	</span></span></td> 
													  			</tr>
													  		</tbody>
													  	</table> 
		  											</div>
		  								 
		  										<!-- grey line -->
			  										<div class='modal-comment-grey-line' style="margin-top:6px;" > 
			      									</div>

			  									<!-- grey rectangle  -->

			  										<div id="new-look-modals-score-container" >  

				  											<ul id="new-look-modals-footer-icons"   > 
																<li style="padding-top:2px;" > 
																	<div  title='views (<?php echo "$look_attr[tview]"; ?>)'  id="new-look-modals-views-icon" > 	
																	</div>  
																</li>
																<li   style="width: 27px;padding-left: 6px;"  class='look-modal-attr-numbers'  >
																	<div id='look-score-text' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'VIEWS ( <?php echo "$look_attr[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >
																		<span > <?php echo "$look_attr[tview]"; ?> </span>
																	</div>
																</li>
																<li> 
																	<div  title='Share (<?php echo "$look_attr[tdrip]"; ?>)'  id="new-look-modals-drip-icon-1"      onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , '<?php echo $look_attr['title']; ?>' , 'Look' , <?php echo $look_attr['owner']; ?>  , '<?php echo ".modal-drip-img$ano"; ?>' , '<?php echo "$this->genImgs/$look_attr[src_img_drip_dynamic]"; ?>' , '<?php echo $ano; ?>' , '<?php echo "#stat-look-dripted$ano"; ?>' )" > 	
																		1 	
																		<img 
																			src="<?php echo "$this->genImgs/$look_attr[src_img_drip]"; ?>"   
																			id="look-modal-drip-icon" 
																			class='modal-drip-img<?php echo $ano; ?>'  
																			onmouseenter=" mousein_change_button ( '.modal-drip-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/drip-dark.png' )" 
																			onmouseleave="mouseout_change_button (  '.modal-drip-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/drip.png' ) "	 
																		/>   

																	</div>  
																</li>
																<li  style="padding-left: 4px;width: 27px;"  class='look-modal-attr-numbers' > 
																	<div class="modal-tdriped<?php echo $ano;?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'SHARED ( <?php echo "$look_attr[tdrip]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"  >
																		<span > <?php echo "$look_attr[tdrip]"; ?> </span>
																	</div>
																</li>
																<li  > 
																	<div title='favorites (<?php echo "$look_attr[tfavorite]"; ?>)' id="new-look-modals-favorite-icon-1"  onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno;  ?>' , '<?php  echo $look_attr['headermssg' ] ?>' ,'<?php echo $look_attr['contentmssg'] ?>'  , 'Look' , '<?php echo $look_attr['owner'];  ?>' , '<?php echo ".modal-favorite-img$ano"; ?>' , '<?php echo "$this->genImgs/look-icon-favorite-selected.png"; ?>' , '.modal-comment-tfavorite<?php echo $ano;?>' , '#stat-look-favorited<?php echo $ano; ?>' )"     > 	 
																		<!-- <img src="<?php echo "$this->genImgs/$look_attr[src_img_favorite]"; ?>" id="modal-favorite-icon"  class='modal-favorite-img<?php echo $ano; ?>'  />   --> 
																		

 

																		<?php if ( empty($look_attr['response_favorite']) ): ?>
																		 	<img 
																				src="<?php echo "$this->genImgs/$look_attr[src_img_favorite]"; ?>"    
																				 id="modal-favorite-icon"
																				class='modal-favorite-img<?php echo $ano; ?>'  
																				onmouseenter=" mousein_change_button ( '.modal-favorite-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/favorite-dark.png' )" 
																				onmouseleave="mouseout_change_button ( '.modal-favorite-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/favorite.png' ) "	 
																			/>    
																		<?php else: ?> 
																		    <img 
																			 	id='modal-favorite-icon' 
																		 		class='modal-favorite-img<?php echo $ano; ?>' 
																			 	src="fs_folders/images/modal/look/favorite-dark.png" 
																			/>   
																		<?php endif; ?>



																	</div>  
																</li>  		 
																<li  style="padding-left: 4px;width: 27px;"  class='look-modal-attr-numbers' >
																	<div class="modal-comment-tfavorite<?php echo $ano;?>"  onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'FAVORITES ( <?php echo "$look_attr[tfavorite]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >
																		<span  > <?php echo "$look_attr[tfavorite]"; ?></span>
																	</div>
																</li>
																<li > 
																	<div title='share (<?php echo "$look_attr[share]"; ?>)'   class='share_look_modals<?php echo $ano; ?>' onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.share_look_modals<?php echo $ano; ?>' ,   '.share_look_modals<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ) "  > 	 
																		<!-- <img src="<?php echo "$this->genImgs/$look_attr[src_img_share]"; ?>"  id="look-modal-share-icon" />  -->

																		<img 
																			src="<?php echo "$this->genImgs/$look_attr[src_img_share]"; ?>"    
																			id="look-modal-share-icon"
																			class='look-modal-share-icon<?php echo $ano; ?>'
																			onmouseenter=" mousein_change_button ( '.look-modal-share-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/share-dark.png' )" 
																			onmouseleave="mouseout_change_button ( '.look-modal-share-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/share.png' ) "	 
																		/>    




																	</div>   
																</li>  
																<li id='modal-tshare-number' style="width: 15px;padding-left: 2px;" >


																	<div style="color:grey" > <?php echo "$look_attr[share]"; ?> </div>



																</li>


																<li id='modal-flag-li'  >  
																	<!-- <div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'fs-flag' , 'fs_postedarticles' , '<?php echo $artno; ?>' , '#modal-flag-icon<?php echo $ano; ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " > 	 -->
																	<div   id="modal-flag-icon-look" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'action' , '<?php echo $look_attr['table_name']; ?>'  , '<?php echo $ano; ?>' , 'imgid' , 'imgsrc' , 'modal-flag-dropdown' ) "  > 	 


																		<!-- <img src="<?php echo "$this->genImgs/$look_attr[src_img_flag]"; ?>" class="modal-flag-icon"  id='modal-flag-icon<?php echo $ano; ?>'  title='more' />  -->

																		<img 
																			src="<?php echo "$this->genImgs/$look_attr[src_img_flag]"; ?>"    
																			 id='modal-flag-icon<?php echo $ano; ?>'  
																			class='modal-flag-icon<?php echo $ano; ?>'
																			onmouseenter=" mousein_change_button ( '.modal-flag-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/more-icon-dark.png' )" 
																			onmouseleave="mouseout_change_button ( '.modal-flag-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/more-icon.png' ) "	 
																		/>    


																	</div>   
																</li>   
															</ul>   											 
			  										</div>   

			  									<!-- dropdown flag design  -->

			  										<?php  
			  											$this->fs_flag( 
			  												array(
			  													'type'=>'flag-modal-dropdown',
			  													'table_name'=>$look_attr['table_name'],
			  													'table_id'=>$plno,
			  													'id'=>$ano,
			  													'mno'=>$look_attr['owner']
			  												)
			  											);  
			  										?> 

			  									<!-- dropdowns share -->

			  										<div style="border:1px solid none" >
			  											<?php   
										 					$this->share_modal_dropdown( 
										 						array(	
										 							'table_name'=>$look_attr['table_name'],
										 							'table_id'=>$plno,
										 							'id'=>$ano, 
										 							'about'=>$look_attr['lookAbout'],
										 							'name'=>$user['username'],
										 							'title'=>$look_attr['title'],
										 							'page'=>'feed',  
										 							'link'=>'',
										 							'picture'=>''
										 						)
										 					);   
									 					?>
			  										</div> 

			  										<!--  <div style="height:5px;border-top:1px solid #e2e2df;width: 269px;" > 
			  										</div> -->
		 										
		 										<!-- grey line -->

			  										<div class='modal-comment-grey-line' style="margin-top:5px;" > 
			      									</div> 	

		 										<!-- comment content -->

			      									<div id="new-look-body-comment-container" >    
		      											<?php if( $pltcomment > 2 ): ?>
				      												<div style="padding-top:5px; padding-left:2px;"> 
			      													<a href="lookdetails?id=<?php echo $plno; ?>#comment_content" style='text-decoration:none' > 
				      													<div style="cursor:pointer;color:#284372" >  
				      														<!-- <a href="lookdetails?id=<?php echo $plno; ?>#comment_content">  -->
				      															 <a href="lookdetails?id=<?php echo $plno; ?>#comment_content" > View all <span><?php echo "$pltcomment"; ?></span> comments</a>	
				      														<!-- </a>  -->
					      													<!--
					      														# this is to redirect profile page  
					      														<a href="<?php echo $user['username']; ?>-comments-look-123123" >
						      													View all <b><?php echo "$pltcomment"; ?></b> comments	
						      												</a> --> 
					      												</div>
				      												</a>
			      												</div> 
			      												<div class='next-line' > </div>
		      											<?php endif; ?> 
															<?php   
															if ( $pltcomment > 0 ):
		  													#from database lookcomment 
		  														// $len  = ($pltcomment < 3 ) ? $pltcomment : 2;    
		  													#from real comment count
		  														$len  = (count($comments)  < 3 ) ? count($comments)  : 2;     
		  													for ($i=0; $i < $len ; $i++):     
																$plcno        = $comments[$i]['plcno'];
																$plno         = $comments[$i]['plno'];
																$mno_commentor= $comments[$i]['mno']; 
																$date_        = $this->get_time_ago( $comments[$i]['date_'] ); 
																$msg          = $comments[$i]['msg']; 
																$plctlikes    = $comments[$i]['plctlikes'];
																$plctdislike  = $comments[$i]['plctdislike'];  
																$fullname     = $this->get_full_name_by_id ( $mno_commentor ); 
																$b            = $this->get_your_look_comment_thumb_up_or_down( $mno , $plcno );    

							 									$you_liked    = ( $b == 'Thumb-Up' ) ? 'comment-like-liked.png' : 'commen-like-unlike.png' ;
							 									$you_disliked = ( $b == 'Thumb-Down' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;     

							 									$crated = 0;
							 									if ( $b  == 'Thumb-Up' or $b == 'Thumb-Down') { $crated = 1; }




							 									$username     = $this->get_username_by_mno( $mno_commentor );
							 									// $profile_pic = $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   

							 									// $plctlikes = '12,332'; 
							 									// $plctdislike = '1,000';  
							 									// $msg = 'this is the comment of a member so it must be good at all ! hahaha well of that its everything fine now ! . . .';
							 									// $msg = 'this is the..';


							 									// grey separotors of the two comments 

							 										if ( $i == 1 ) { echo " <div id='modal-comment-grey-separator-look' >  </div> "; }

							 									?>  

							 									

			      												<div>  
						      										<ul style="padding:none; margin:none; border:1px solid none;" >
						      										 	<li style="padding-top:5px;" > 
						      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno_commentor ,"$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px;'  );  ?>
						      										 	</li>   
						      										 	<li style="width:228px;font-family:arial; font-size:12px; border:1px solid none; padding-top:5px;  " >
						      										 		<div style="margin-top:-2px;" >
							      										 		<div style="margin-left:7px;font-family: 'Avenir LT Std 35 Light' !important;color: #000000 !important;"  >
							      										 		 	 <a href='<?php echo $username; ?>'> <b style="color:#284372;font-family: 'Avenir LT Std 35 Light' !important; color:#225b99" > <?php echo $fullname; ?> </b></a> <?php echo $this->cleant_text_print_from_db ( $msg ); ?>
							      										 		</div> 
							      										 		<div style="margin-left:7px; color:#d6051d"  >   
							      										 			<table border="0" cellpadding="0" cellspacing="0" style="width:auto; padding-top:2px !important; margin:0px !important;  " name='table8' > 
							      										 				<tr>  
							      										 					<td style='width:auto' > 
							      										 						<span style='color:#ccc;font-size:12px' > <?php echo "$date_"; ?>   </span> 
							      										 					</td>
							      										 					<td style="padding-left:5px;" >  	
							      										 						<div style="margin-top:-1px;" >   

								      										 						<?php if($you_liked == 'commen-like-unlike.png') { ?>
								      										 							<!-- not liked -->
								      										 							<img 
																						 					 id='<?php echo "img_like_$plcno"; ?>'   
																						 					style='height:12px;'
																							 				src="<?php echo "$this->genImgs/$you_liked"; ?>"
																							 				 onclick="look_comment_thump_up_or_down( '<?php echo $plcno ?>' , '<?php echo "Thumb-Up" ?>' , '<?php echo "#img_like_$plcno" ?>'  , '<?php echo "comment-like-liked.png" ?>'  , '<?php echo $plno ?>' , '#modal-comment-tlike<?php echo $plcno; ?>' , '<?php echo $crated; ?>' )"
																							 				onmousemove=" mousein_change_button ( '<?php echo "#img_like_$plcno"; ?>' , '<?php echo "$this->genImgs/comment-like-liked.png"; ?>')"  
																							 				onmouseout="mouseout_change_button (  '<?php echo "#img_like_$plcno"; ?>'  , '<?php echo "$this->genImgs/commen-like-unlike.png"; ?>' ) "
																						 				/> 
									      										 						<!-- 'comment-like-liked.png' : 'commen-like-unlike.png'  --> 
									      										 					<?php  } else { ?>  
									      										 						<img id='<?php echo "img_like_$plcno"; ?>'  src="<?php echo "$this->genImgs/$you_liked"; ?>" style='height:12px;' onclick="look_comment_thump_up_or_down( '<?php echo $plcno ?>' , '<?php echo "Thumb-Up" ?>' , '<?php echo "#img_like_$plcno" ?>'  , '<?php echo "comment-like-liked.png" ?>'  , '<?php echo $plno ?>' , '#modal-comment-tlike<?php echo $plcno; ?>' , '<?php echo $crated; ?>' )" />   

																						 			<?php } ?> 
							      										 						</div>
							      										 					</td>
							      										 					<td style=" color:#d2d0d0;font-size:12px;padding-left:5px; font-family: 'Avenir LT Std 35 Light' !important; color: #d2d0d0;" id="modal-comment-tlike<?php echo $plcno; ?>" ><?php echo "$plctlikes";  ?></td>
							      										 					<td style="padding-left:5px;" > 
							      										 						<div style="margin-top:2px;" >   

																									<?php if($you_liked == 'commen-like-unlike.png') { ?> 
								      										 							<img 
																						 				    id='<?php echo "img_dislike_$plcno"; ?>'  
																						 					style='height:12px;'
																							 				src="<?php echo "$this->genImgs/$you_disliked"; ?>"
																											onclick="look_comment_thump_up_or_down( '<?php echo $plcno ?>' , '<?php echo "Thumb-Down" ?>' , '<?php echo "#img_dislike_$plcno" ?>'  , '<?php echo "comment-dislike-disliked.png" ?>'  , '<?php echo $plno ?>' , '#modal-comment-tdislike<?php echo $plcno; ?>' , '<?php echo $crated; ?>' )"
																							 				onmousemove=" mousein_change_button ( '<?php echo "#img_dislike_$plcno"; ?>' , '<?php echo "$this->genImgs/comment-dislike-disliked.png"; ?>')"  
																							 				onmouseout="mouseout_change_button (  '<?php echo "#img_dislike_$plcno"; ?>'  , '<?php echo "$this->genImgs/comment-dislike-un-disliked.png"; ?>' ) "
																						 				/>  
									      										 					<?php  } else { ?>  
									      										 						<img id='<?php echo "img_dislike_$plcno"; ?>'  src="<?php echo "$this->genImgs/$you_disliked"; ?>" style='height:12px;' onclick="look_comment_thump_up_or_down( '<?php echo $plcno ?>' , '<?php echo "Thumb-Down" ?>' , '<?php echo "#img_dislike_$plcno" ?>'  , '<?php echo "comment-dislike-disliked.png" ?>'  , '<?php echo $plno ?>' , '#modal-comment-tdislike<?php echo $plcno; ?>' , '<?php echo $crated; ?>' )" />   
																						 			<?php } ?>    
																						 			 <!-- $you_disliked = ( $b == 'Thumb-Down' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;      -->


							      										 						</div> 
							      										 					</td>
							      										 					<td style=" color:#d2d0d0;font-size:12px;padding-left:5px; font-family: 'Avenir LT Std 35 Light' !important; color: #d2d0d0;" id="modal-comment-tdislike<?php echo $plcno; ?>" ><?php echo "$plctdislike"; ?></td> 
							      										 			</table>  
							      										 		</div>
							      										 	</div>  
						      										 	</li>   
						      										</ul>   
						      									</div>  
						      									<div class='next-line' > </div> 
						      									<?php 
					      									endfor;   
					      						 		endif; ?>   
					      						 		<div id="comment-container<?php echo $ano; ?>" > 
					      						 		</div> 
					      						 		<div class='next-line' > </div>  
				      									<div class="modal-comment-textfield" style="padding-top:7px;" >  
				      										<ul>
				      										 	<li> 
				      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno ,"$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px' );   ?>
				      										 	</li>   
				      										 	<li style="width:225px;font-family:arial; font-size:12px;" >

				      										 		<!-- <a href="lookdetails?id=<?php echo $plno; ?>#cmment" style='texft-decoration:none' > -->
					      										 		<!-- <div style="margin-left:5px;"  > 
					      										 			<input type="text" placeholder='Leave a comment' style=" border:1px solid #e2e2df; height:35px; width:227px; padding-left:5px; "  onkeyup="modal_comment_send ( '<?php echo $mno; ?>' , '<?php echo $plno ; ?>' , 'postedlooks' , '<?php echo $ano; ?>' , event , 'feed' , 'comment-container<?php echo $ano; ?>' , '#modal-comment-loader-test<?php echo $ano; ?>' )"   >      										 		 	 
					      											 	</div>   -->

					      											 	<div style="margin-left:5px;"  > 
						      										 		<input id="modal-comment-field<?php echo $ano; ?>" type="text" placeholder='Leave a comment' style=" border:1px solid #e2e2df; height:35px; width:228px; padding-left:5px; font-family: 'Avenir LT Std 35 Light' !important; color: #d2d0d0 !important;"     onkeyup="modal_comment_send ( '<?php echo $mno; ?>' , '<?php echo $plno ; ?>' , 'postedlooks' , '<?php echo $ano; ?>' , event , 'feed' , 'comment-container<?php echo $ano; ?>' , '#modal-comment-loader-test<?php echo $ano; ?>' )"        >      										 		 	 
					      											 	</div>   
				      											 	<!-- </a> -->
				      										 	</li>  
				      										</ul>   
				      									</div> 
			      									</div>   

			      							<?php else: ?>  

			      								<?php   
			      									// $this->feedSuggestions( array( 
				      								// 		'member' => 'fs_folders/images/uploads/members/mem_thumnails/720.jpg',
				      								// 		'post_botton' => 'fs_folders/images/header/header_post.png',
				      								// 		'post_botton_hover' => 'fs_folders/images/header/post-mouse-over-button.png', 
				      								// 		'sggested_1' => 'fs_folders/images/uploads/members/mem_thumnails/720.jpg',
				      								// 		'sggested_2' => 'fs_folders/images/uploads/members/mem_thumnails/720.jpg',
				      								// 		'sggested_3' => 'fs_folders/images/uploads/members/mem_thumnails/720.jpg',
				      								// 		'id' => 'modal-feed-post-button', 
				      								// 		'likes' => '3k',
				      								// 		'followers' => '2k',
				      								// 		'articles' => '2k',
				      								// 		'looks' => '1k'
			      									// 	)
			      									// );

			      								?> 


			      								<?php  
			      						         $style       = $look_attr['style'];
				      							 $memFsInfo   = $this->get_user_full_fs_info( $look_attr['owner'] );   
				      							 $tlikes      = $memFsInfo['tlikes'];  
				      							 $tfollowers  = $memFsInfo['tfollowers']; 
				      							 $tarticle    = select_v3('postedlooks', 'count(plno) as tarticle', " style  =  '$style' and mno =  " . $look_attr['owner'] )[0]['tarticle'];   // $memFsInfo ['tarticle'];   // get the total article that member posted in the specific category  

			      							 // 	$category    = $look_attr['category'];
				      							// $memFsInfo   = $this->get_user_full_fs_info( $look_attr['owner'] );   
				      							// $tlikes      = $memFsInfo['tlikes'];  
				      							// $tfollowers  = $memFsInfo['tfollowers']; 
				      							// $tarticle    =  select_v3('fs_postedarticles', 'count(artno) as tarticle', " category =  '$category' and mno =  " . $look_attr['owner'] )[0]['tarticle'];   // $memFsInfo ['tarticle'];   // get the total article that member posted in the specific category  








				      							?> 



		      									<!-- grey line --> 
													<div class='modal-comment-grey-line' style="margin-top:6px;" > 
													</div> 	

												<!-- line height controller -->
													<div style="height: 7px;"></div>

												<!-- like blue --> 
														<div id="new-look-modals-stat-container-2"> 
													  	<table cellspacing="0" cellpadding="0"> 
													  		<tbody>
													  			<tr> 
															      	<!-- <td>  -->
															          	<?php   
														      				// $this->member_thumbnail_display( $this->ppic_thumbnail , $look_attr['owner']  , "$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px'  );   
														      			   // $this->member_thumbnail_display( $this->ppic_thumbnail , $look_attr['owner'], $this->ppic_thumbnail,  $this->get_full_name_by_id($look_attr['owner']) , '35px', '', '35px', 'border-radius:3px;' );   
														      			?>  
															      	<!-- </td>   -->
															      	<td class='modal-attr-rate-page-td1' >
															        	<text>Likes </text>  <stat><?php echo $pltvotes;  ?></stat>
															        </td> 
															        <td class='modal-attr-rate-page-td2' > 
															        	<text>Followers</text>  <stat><?php echo $tfollowers; ?></stat>
															        </td> 
															        <td class='modal-attr-rate-page-td3' > 
															        	<text>Looks</text>  <stat><?php echo $tarticle;  ?></stat>
															        </td> 
															        <td style="display:none" > 
															         	 <img id = "modal-feed-post-button"  src="fs_folders/images/header/header_post.png" style='height:30px;' onmouseover="change_image_src ( '#modal-feed-post-button' , 'fs_folders/images/header/post-mouse-over-button.png' )" onmouseout="change_image_src ( '#modal-feed-post-button' , 'fs_folders/images/header/header_post.png' )"   >  
															        </td>  
													  			</tr>
													  		</tbody>
													  	</table> 
														</div>   
												<?php if( !empty($featuredLooks)) {  ?>
												<!-- grey line --> 
													<div class='modal-comment-grey-line' style="margin-top:5px;" > 
													</div> 	  


												
												<!-- Suggestions modals depends on the type of the modals iether article or look -->
													<table id="modal-feed-suggestions">
														<tbody>
															<tr>
																<?php   
																	// echo $plno. '';
																 	for ($i=0; $i < count($featuredLooks); $i++) {   ?> 
																   		<td> 
																			<div>    
																				<a href="lookdetails-dev.php?id=<?php echo  $featuredLooks[$i]['plno']; ?>#details-title" > 
																					<div style="
																					    background-image: url(fs_folders/images/uploads/posted%20looks/home/<?php echo $featuredLooks[$i]['plno']; ?>.jpg);
																					    background-repeat: no-repeat;
																					    background-size: 127px;
																					    cursor:pointer;"> 
																					</div> 
																				</a> 
																				<!-- <img    src="fs_folders/images/uploads/posted looks/home/<?php echo $featuredLooks[$i]['plno']; ?>.jpg" /> -->
																			</div>
																		</td>
																   		<?php  
																   	}  															
																?> 
															</tr>
														</tbody>
													</table>  
												<?php } ?>

												<!-- line height controller -->
														<div style="height: 7px;"> </div>  
				      						<?php endif; ?>   




		      							</td> 
		      					</table>  
		      				</div>    
		      				<?php if($feed == TRUE): ?>	
								<div style="height:6px;"> </div>  
							<?php else: ?>
								<div style="height:15px;"> </div>  
							<?php endif; ?>
				 		</div> 
	      		 	<?php
      			}   
      			public function modal_version1_article ( $_table_id , $lookpath=null , $profilepath=null , $headersyle=null , $commentstyle=null  , $page=null, $status=null ) {  

      			 


	      			# explaination 

      					/*
	      				$_table_id     => table id
	      				$lookpath      => modas path 
	      				$profilepath   => profile pic path
	      				$headersyle    => header style iether show or hide
	      				$commentstyle  => comment style ither show or hide
	      				$page          => page where the data retrieved
	      				$status        => status to show the settings ither admin or client
	      				*/

	      			#print 
  
	      			# initialize

	      				$ri                  = new resizeImage ();  
	      				$_SESSION['mno'] 	 = $this->get_cookie( 'mno' , 136 );  
				 		$mno 			     = $this->get_cookie( 'mno' , 136 );    
				 		$hide                = '';
				  
 				    # get activitywall info   
			    		 
			    		if ($page == 'profile-tabs' || $page == 'admin'){  
			    			$plno                = $_table_id;  
			    			$ano                 = $_table_id;   
						} else if ($page == 'rate-page' ) {  
							$plno                = $_table_id;  
			    			$ano                 = $_table_id;    
			    			$hide = 'display:none;'; 
			    		} else {  
			    			$ano                 = $_table_id;  
				    		$activity            = $this->get_activity_posted( $ano );   
				            $whoAction           = $activity[0]['mno'];  
				            $plno                = $activity[0]['_table_id']; 
				            $_table              = $activity[0]['_table']; 
				            $action              = $activity[0]['action'];
				            $_date               = $activity[0]['_date'];    

			    		}

 
			            // echo " artno =   $plno  <br> ";
 
				    # get postarticle info 

			            $response = $this->fs_postedarticles( 
				  		 	array(  
				  			 	'aticle_type'=> 'select', 
				  		 		'where'=>"artno = $plno"
				  		 	)  
				  		);     

 						$radius                       = 'border-radius: 5px 5px 0px 0px;'  ;  
 						$artno                        = $response[0]['artno'];
 						$lookOwnerMno                 = $response[0]['mno']; 
		 				$look_attr['title']           = strtoupper($response[0]['title']);
		 				$lookAbout                    = $response[0]['description'];
		 				$look_attr['lookAbout']       = $response[0]['description']; 
		 				$keyword                      = $response[0]['keyword'];
		 				$look_attr['category']        = $response[0]['category'];
		 				$look_attr['topic']           = $response[0]['topic'];
						$look_attr['source_url']      = $response[0]['source_url'];
		 				$look_attr['source_item']     = $response[0]['source_item'];
		 				$look_attr['type']            = $response[0]['type'];
		 				$extention                    = $response[0]['extention'];
						$date                         = $response[0]['date'];  
						$look_attr['tfavorite']       = $response[0]['tfavorite']; 
						$look_attr['tdrip']           = $response[0]['tdrip']; 
						$look_attr['tshare']          = $response[0]['tshare'];  
						$look_attr['tflag']           = 0;//$response[0]['tflag'];  
						$look_attr['tcomment']        = $response[0]['tcomment']; 
						$look_attr['trating']         = $response[0]['trating']; 
						$look_attr['tpercentage']     = $response[0]['tpercentage']; 
						$look_attr['active']          = $response[0]['active'];   
						$look_attr['tview']           = $response[0]['tview'];  
						$pltvotes                     = $response[0]['pltvotes'];    

 						$look_attr['video_id']        = ( $look_attr['type'] == 'video' ) ? basename($response[0]['source_item']) : null ;   
 						$look_attr['page']            = $page;
			     		$tlview                       = '9,999+';  
			     		$tfavorite                    = '9,999+';    
			     		  
			     		$trating                      = 0;     
			     		$tpercentage                  = 0;     
			     		$rating_percent               = 1;
						$rating_total                 = 0;   
						$look_attr['owner']           = $lookOwnerMno ;
						$look_attr['thumbsUp']        = 'look-white-thumb.png';
						$look_attr['thumbsDown']      = 'look-white-down-thumb.png';
						$look_attr['stat_rated']      = 'look not rated';
						$look_attr['stat_dripted']    = 'look not dripted';
						$look_attr['stat_favorited']  = 'look not favorited';
						$look_attr['response']        = '';    
						$look_attr['dripped_name']    = '';
						$look_attr['dripped_message'] = '';
						$look_attr['table_name']      = 'fs_postedarticles';  
						$look_attr['headermssg']      = 'SUCCESSFULLY FAVORITED'; # this is for success message popup
						$look_attr['contentmssg']     = 'This Article is now on your favorite list.'; # this is for success message popup   
						$look_attr['default_image']   = 'default-article.jpg';  
						// $look_attr['src'] 		   = ( file_exists("$profilepath"."$this->article_home/$plno.jpg")) ? "$this->article_home/$plno.jpg" : "$this->article_home/$look_attr[default_image]" ; 
						$look_attr['src'] 			   = ''; 
						$user['username']                  = $this->get_username_by_mno( $look_attr['owner']  );  
						$look_attr['src_img_drip']         = "look-icon-drip-modal.png";   
						$look_attr['src_img_drip_dynamic'] = "look-icon-drip-modal.png"; // change this to "look-icon-drip-selected.png" if u want to have a color when drip clicked
						$look_attr['src_img_favorite']     = "look-icon-favorite-modal.png"; 
						$look_attr['src_img_share']        = "look-icon-share.png"; 
						$look_attr['src_img_flag']         = "modal-flag-dot.png";//"modal-flag.png";  
						$look_attr['response_drip']        = array();
						$look_attr['response_favorite']    = array();
						$look_attr['response_share']       = array();  
						$look_attr['path'] 			       = $profilepath;
						$look_attr['status']		       = $status;
 						$latestLikerName = '';

 						$blogUrl   						   =   ($this->getUserInfo($look_attr['owner'], 'blogurl') != "") ? $this->getUserInfo($look_attr['owner'], 'blogurl') : '#'; 
 					    $blogName 						   =   $this->getUserInfo($look_attr['owner'], 'blogdom'); 
 					    $blogNameLink                      =   (!empty($blogName)) ? "of <a href=\"$blogUrl\" target=\"_blank\" class='user-blogname' ><b> $blogName </b> </a>  " : "";


 					    


						switch ( $page ) {
      					case 'rate-look': 
      						break; 
      					case 'profile-tab-look':  
      						break; 
      					case 'profile-tabs' or 'admin':   
      						break; 
      					default:    

	      					 	$len_dripped  = strpos($action,'Dripped');  
	      					 	if ( $len_dripped >= 0  ):  
									$array = array(      
									    'limit_start'=>0, 
									    'limit_end'=>1,
									    'query_where'=>"table_id = $plno", // mno = 133 and table_name = 'postedlooks'
									    'query_order'=>'dmno desc', 
									    'query_drip'=>'get-all-user-dripped' 
									);      
									$response =  $this->fs_drip_modals_Query ( $array );  
		      						// $look_attr['dripped_username']    =  "@".$this->get_username_by_mno( $response[0]['mno'] ).' said'; 
		      						$look_attr['dripped_username']    = $this->get_full_name_by_id ( $response[0]['mno'] ).' said'; 
									$look_attr['dripped_message']     = $response[0]['comment'];  

	      					 	endif;      
      							$action = $this->get_activity_action( $lookOwnerMno , $whoAction , $action , $plno , $_date , $_table   );    
      						break;
      				}
 
      				#check if already thumbs up or down 
	     				// $look_attr['response'] = $this->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>$look_attr['table_name'] , 'table_id'=>$plno,  'rate_query'=>'get-user-rated-type'  )  );    
						// if ( $look_attr['response'] == true ): 

						// 	$look_attr['stat_rated'] =  'look already rated'; 
						// 	if ( $look_attr['response'] == 'like') {
						// 		$look_attr['thumbsUp'] = 'look-red-thumbs.png';
						// 	} 
						// 	if ( $look_attr['response'] == 'dislike') { 
						// 	   $look_attr['thumbsDown'] = 'look-red-thumb-down.png';
						// 	}   
						// endif;  

						$look_attr['response'] = $this->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>$look_attr['table_name'],  'table_id'=>$plno,  'rate_query'=>'get-user-rated-type'  )  );    
						if ( $look_attr['response'] == true ) {  
							$look_attr['stat_rated'] =  'look already rated'; 
							if ( $look_attr['response'] == 'like') {
								$look_attr['thumbsUp'] = 'look-red-thumbs.png';
								
							}   
							if ( $look_attr['response'] == 'dislike') { 
							   $look_attr['thumbsDown'] = 'look-red-thumb-down.png'; 
							  
							}
							$look_rated = true;
						} else { 
							$look_rated = false;
						}
 
					// echo " video id ".$look_attr['video_id'];
 
					#set points color  

						$look_attr['response_drip'] =  $this->fs_drip_modals_Query (  
							array(      		     
							    'limit_start'=>0, 
							    'limit_end'=>1,
							    'query_where'=>"table_id = $plno and mno = $mno",  
							    'query_order'=>'dmno asc', 
							    'query_drip'=>'get-all-user-dripped' 
							)
						);   
 
						if (!empty( $look_attr['response_drip'] ) ) { 
							// $look_attr['src_img_drip'] = "look-icon-drip-selected.png";   // the colored driped   
						 	//$look_attr['src_img_drip_dynamic'] = "look-icon-drip-selected.png";  // update the main initialized when u want to have a color when the dripped clicked
						 	$look_attr['src_img_drip'] = "look-icon-drip.png";
							
						}  

						$look_attr['response_favorite'] =  $this->fs_favorite_modals_Query (   
							array(      		     
							    'limit_start'=>0, 
							    'limit_end'=>1,
							    'query_where'=>"table_id = $plno and mno = $mno", 
							    'query_order'=>'fmno asc', 
							    'query_favorite'=>'get-all-user-favorite' 
							)
						);  
						if (!empty( $look_attr['response_favorite'] ) ) { 
							$look_attr['src_img_favorite'] = "look-icon-favorite-selected.png";  
						} 
						$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $plno and table_name= 'fs_postedarticles' and mno = $mno "  )  );   
						if ( !empty($response) ) {
							  $look_attr['src_img_flag']        = "large-flag-red.png";
						} 
						# get image src 
							$look_attr['src']  = $this->image( 
							    array(
							        'table_name'=>$look_attr['table_name'],
							        'table_id'=>$plno,
							        'type'=>'get-default-image-src',
							        'size'=>'home',
							        'path'=>$look_attr['path']
						      	)
						 	); 
 					# set status of owner or not for the user not allow to rate , drip and favorite the modal 
 						// echo " $look_attr[owner] == $mno  ";
						if ( $look_attr['owner'] == $mno ): 	 
							$look_attr['stat_rated']	 =  'modal owner'; 
							$look_attr['stat_dripted'] 	 =  'modal owner'; 
							$look_attr['stat_favorited'] =  'modal owner';   

						endif;  
						//set url of the article page detail
 
						$title=page::set_url_for_modal_details($plno,'article',strtolower($look_attr['topic']),$date,strtolower($look_attr['title']));   
 
					/** get article attribute */  

      			    // $post_attr = $this->post->get_post("table_id = $artno and table_name = 'fs_postedarticles'");   
      			    // $alt =  (!empty($post_attr[0]['alt'])) ? $post_attr[0]['alt'] : "";  


      			    $alt = "this is the alt"; 

      			    		 
					 if($page == 'rate-article' || $page == 'rate-page')  {$feed = TRUE; } else{   $feed = FALSE; }


					 /** on the blue box show latest member to like post and the total number of likes by others */
					    $table_name = $look_attr['table_name']; 
						$latestUserRated = select_v3( 
					   		'fs_rate_modals' , 
					   		'mno' , 
					   		"table_id = $plno and table_name = '$table_name' ORDER BY rmno desc limit 1" 
					   	);     
					   	if(!empty($latestUserRated[0]['mno'])){
					   		$latestLikerName = $this->get_full_name_by_id ( $latestUserRated[0]['mno'] ); 	
					   	} 
					   	// echo "Latest Liker Name = $latestLikerName";  

					    $featuredLooks = select_v3( 
					   		'fs_postedarticles' , 
					   		'*' , 
					   		"mno = '"  . $look_attr['owner'] .  "'  and artno <> $plno and category = '" . $look_attr['category'] . "' order by pltvotes desc limit 3"
					   	);     			


 
				

						?>     


      				<modals-item >   
      				 	<div class="<?php echo "$_table-$plno"; ?>" >
	      					<div style="display:none"> 
								<class>look_t<?php echo $ano; ?></class><class>look_t<?php echo $ano; ?></class>
							</div> 


		      				<div id="modals_version1_look_main_wrapper"  class="look_t<?php echo $ano; ?>"  >  
		      					<table border="0" style="border:1px solid none; width:100%;" cellspacing="0" cellpadding="0"  name='table1' > 
		      						<tr> 

		      							<!-- this will print except the rate page area -->
		      							<td style="<?php echo "$headersyle; $hide"; ?> " >    
		      								<?php $this->new_modals_header( $whoAction , $action , $profilepath );  ?> 
		      							</td>  

		      							<!-- This will only print in the rate page area --> 
		      							<?php if($feed == TRUE): ?>
			      							<td>  
			      								<?php  
											        $owner_fullname = $this->get_full_name_by_id($look_attr['owner']); 
											        $ago            = $this->get_time_ago($date ); 
											        $uname          = $this->get_username_by_mno($look_attr['owner']);  
			      								?>
 			      								 <div style="border:1px solid none;line-height:16px;    " id="look-modals-action"> 
			      									<?php $this->new_modals_header( $look_attr['owner'] ,  "  <a href='$uname'> $owner_fullname </a>    <span style=' color:#225B99' > $blogNameLink <span style='color:#d6051d'>  posted </span>   a new article </span> $ago " , $profilepath );  ?> </span>
				      							</div>   
			      							</td>
		      							<?php endif; ?> 
		      						<tr>  
		      							<td style="padding-top:9px;" >  
		      							</td>
		      						<tr> 
		      							<td id="modal-image-container-td" style="<?php echo $radius; ?>"  >  

		      								<div id="new-look-body-container" style="margin-left:7px;background:white !important; border:1px solid none;" > 
		      									<ul> 
				      								<li style="display:none;" >      
				      									<div style=" padding:0px; margin:0px; width:270px; border:1px solid none; " >
					      									<div style="font-family:misoRegular; font-size:20px;" > 
					      										<?php echo "$lookname";  ?>
					      									</div>
					      									<div style="font-family:arial; font-size:12px;  " > 
					      										<?php echo "$lookAbout ";  ?>
					      									</div>
				      									</div>  
				      								</li> 
				      								<li>  	 
				      									<table border="0" cellspacing="0" cellpadding="0" name='table2' style="padding-top:5px;background-color:none"  > 
															<tr>			      											
					      										<td style="height:150px; border:1px solid none;">     
										      						<!-- main image -->
							      									<div id="new-look-image-container" class="new-look-image-container<?php echo $ano; ?>" style="border: 1px solid none;"  onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-look-image-container<?php echo $ano; ?> ' ,   '.new-look-image-container<?php echo $ano; ?>  ' ,   '.new-look-mousover-desc-title-container<?php echo $ano; ?>' )"  >       
					      												<!-- <a href='detail?id=<?php echo $artno ?>' >   --> 
																			<!-- <div onclick="fs_popup( 'modal-details' , 'feed-modal-clicked-detail-view' , 'process' , 'method' , '<?php echo $plno; ?>' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $title; ?>' )" >  -->
								      											<?php   
								      												if (  $look_attr['type'] == 'video'): 

								      													 echo "<div id='mouserover-video-play' class='mouserover-video-play$artno' onmouseover='article_nex_prev ( \"video-mouseover\" , \"$artno\" , \"response\" , \"loader\" ,  \"e\"  )'   onmouseout='article_nex_prev ( \"video-mouseout\" , \"$artno\" , \"response\" , \"loader\" ,  \"e\"  )'     > 
 
								      														<a href='articledetails-dev.php?id=$artno' >  
								      															<center> <img alt='$alt' src='$this->genImgs/video-play-3.png' id='video-play' class='video-play$artno' /> </center>
								      														</a>
								      													</div>";  
								      													echo "  
									      													<a href='articledetails-dev.php?id=$artno' >  
									      														<img  alt='$alt' src='$look_attr[src]' style='position:relative;width:100%;height:220px;' />  
									      													</a>
								      													";    
								      												else:
								      													echo "  
								      														<a href='articledetails-dev.php?id=$artno' >  
								      															<img  alt='$alt' src='$look_attr[src]' style='position:relative;width:100%;height:auto;' />  
								      														</a>
							      														";    
								      											  	endif;   
							      											  	?> 
						      												</div>   	
					      											  	<!-- </a>    -->
							      									</div> 
					      										</td>    
				      									</table> 
				      								</li>   
				      							</ul> 	
		      								</div> 
		      							</td>  
		      						<tr> 
		      							<td class="modal-footer-container" style="<?php echo "$commentstyle"; ?>"     > 
	      										 
	 										<!-- status used for the validation of the ratings and so on -->

												<div id="status-container"  >
													<input type="text" value="<?php echo "$look_attr[stat_rated]"; ?>"       id="stat-look-rated<?php echo $ano; ?>"       /> <br>
													<input type="text" value="<?php echo "$look_attr[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $ano; ?>"         /> <br>
													<input type="text" value="<?php echo "$look_attr[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $ano; ?>"    /> <br>
												</div>

											<!-- first footer grey line top  -->

												<div class='modal-comment-grey-line' > 
												</div>   

											<!-- print settings for delete , hide and so on accessed by the admin for now -->

	 											<?php 
		 											if ( $look_attr['status'] == 'admin' ):    
		 												$this->modal( 
		 													array(  
		 														'type'=>'print-settings',
		 														'table_id'=>$plno,
		 														'table_name'=>$look_attr['table_name'],
		 														'id'=>".look_t$ano" 
		 													) 
		 												);  
		 											endif; 
	 											?> 
	 
											<!-- dripped message  -->
												
		 										<?php if( !empty($look_attr['dripped_message']) ):  ?>
			      									<div id="new-look-modals-dripped-message-container" >  
			      										<b><?php echo "$look_attr[dripped_username]:"; ?></b>
			      										<span><?php echo  ucfirst("$look_attr[dripped_message]"); ?></span>
			  										</div>  
		  										<?php endif; ?> 

		  									<!-- category message  -->

		  										<?php if ( !empty($look_attr['topic']) ): ?>  
		  											<a href="article?topic=<?php echo strtolower($look_attr['topic']) ?>">
			  											<div class="modal-footer-category" >
			  											 	<?php echo  strtoupper($look_attr['topic']); ?> 
			  											</div>   
		  											</a>
												<?php endif; ?>

											<!-- title message -->	

		 										<?php if( !empty($look_attr['title']) ):  ?>
		 											<a href="articledetails-dev.php?id=<?php echo $plno; ?>" > 
				      									<div id="new-look-modals-title1-container" > 
				      										<?php echo "$look_attr[title]"; ?>
				  										</div>  
			  										</a>
		  										<?php endif; ?> 	
	 
		  									<!-- grey line --> 
											<!--  <div class='modal-comment-grey-line' style="margin-top:3px;" > -->
											<!-- blue rectangle   -->	
	 
		  										<div id="new-look-modals-stat-container" style="display:none" >
		  											<center>
			  										 	 <table border="0" cellspacing="0" cellpadding="0" style="padding:0px; margin:0px; width:97%; "  > 
			  										 	 	<tr> 
			  										 	 		<td style="width:35px;" > 
			  										 	 			<span style="font-size:12px !important" > <b><?php echo "$look_attr[tpercentage]"; ?>%</b>  </span> 
			  										 	 		</td> 
			  										 	 		<td style="width:70px;" > 
			  										 	 			<span style="font-size:12px;!important" >LIKES THIS </span>
			  										 	 		</td>  
			  										 	 		<td style="width:45px;" >   
			  										 	 			<table style="margin-top:-9px; width:40px;float:right" border="0" cellspacing="0" cellpadding="0"  > 
			  										 	 				<tr>  
			  										 	 					<td> 
			  										 	 							<img src="<?php echo "  $this->genImgs/$look_attr[thumbsUp]"; ?>" title='like'            style='height:18px;' class='postedlooks-like<?php echo $ano; ?>'      onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $look_attr['table_name']; ?>' , 'like' , '<?php echo "$plno"; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $ano; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $ano; ?>'  , '<?php echo $look_attr['category']; ?>' , '<?php echo $ano; ?>' )" > 
			  										 	 					</td> 
			  										 	 					<td> 
			  										 	 						<div style="margin-top:6px;" > 
			  										 	 							<img src="<?php echo "  $this->genImgs/$look_attr[thumbsDown]"; ?>" title='dislike'       style='height:18px;' class='postedlooks-dislike<?php echo $ano; ?>'       onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $look_attr['table_name']; ?>' , 'dislike' , '<?php echo "$plno"; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $ano; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $ano; ?>'  , '<?php echo $look_attr['category']; ?>' , '<?php echo $ano; ?>' )"  > 
			  										 	 						</div>
			  										 	 					</td>
			  										 	 			</table> 
			  										 	 		</td> 
			  										 	 		<td>
			  										 	 			<div  id="new-look-modals-rating" style="width:100px; background-size: 100px 19px; border:1px solid none; float:right; margin-top:5px;   " >
				      													<!-- <div style='cursor:pointer; border:1px solid none; margin-top:2px; margin-left:15px;  position:absolute;font-size:11px !important;font-family:arial; ' onclick="fs_popup( 'postarticle' , 'rate-posted-modals-view' , 'look-modal-design'  , 'method' , '<?php echo $plno; ?>' , '<?php echo $look_attr['table_name']; ?>' )" > -->

				      													<div style='cursor:pointer; border:1px solid none; margin-top:2px; margin-left:15px;  position:absolute;font-size:11px !important;font-family:arial; ' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'RATINGS ( <?php echo "$look_attr[trating]"; ?> )' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' , '<?php echo $look_attr['category']; ?>' )"  >
				      														RATE ( <span id='modal-tratings<?php echo $ano; ?>' ><?php echo "$look_attr[trating]"; ?></span> )
				      													</div> 
				      												</div> 
				      											</td>  
			  										 	 </table>
		  										 	 </center>
		  										</div>   

												<!-- description -->
												<div class="wrapper-modal-description" >
												<div id="new-look-modals-description-container"> 
														<?php     	
															//article 
		  													print($this->string_limit($lookAbout, 100, 'article', $plno));   
		  												?>
		  										<!-- 	<span>
														Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry... <span  class="modal-description-more-text" >see more</span> 
													</span>  -->
		  										</div> 
		  										</div>
	  										 
		  									<?php if($feed == FALSE): ?>

		  										<!-- like blue --> 
		  										<!-- article -->
			  									<!-- 	<div id="new-look-modals-stat-container-1"> 
													  	<table cellspacing="0" cellpadding="0"> 
													  		<tbody>
													  			<tr> 
															      	<td>  
															      		<img 
														 					src="fs_folders/images/modal/look/modals-like.png"   
																          	id="look-like-<?php  echo $ano;  ?>"  
																          	onclick="look_like_click('<?php echo $ano; ?>')"
															 				onmousemove=" mousein_change_button ( '#look-like-<?php  echo $ano;  ?>' , 'fs_folders/images/modal/look/liked.png' )" 
															 				onmouseout="mouseout_change_button (  '#look-like-<?php  echo $ano;  ?>'  , 'fs_folders/images/modal/look/modals-like.png' ) "
														 				/> 
	 														      	</td> 
															        <td>
																			<span> Maurico Moore and <a style="font-family: 'Avenir LT Std 85 Heavy' !important; color:white;cursor:pointer">127</a> others like this <span>
															      	</span></span></td> 
													  			</tr>
													  		</tbody>
													  	</table> 
		  											</div>  -->

		  											<div id="new-look-modals-stat-container-1"> 
														  	<table cellspacing="0" cellpadding="0"> 
														  		<tbody>
														  			<tr> 
																      	<td>  
																	        <?php if($look_rated == false) { ?> 
																	          	<img 
																 					src="fs_folders/images/modal/look/modals-like.png"   
																		          	id="look-like-<?php  echo $ano;  ?>"   
																		      		onclick="look_like_click( '<?php echo $mno ?>' , '<?php echo $plno ?>' , '<?php echo  $look_attr['table_name'] ?>' , 'like' , 'liked.png' , '#look-like-<?php  echo $ano;  ?>' , '<?php echo $ano ?>' , '#look-total-like-<?php  echo $ano;  ?>', '<?php echo $this->get_full_name_by_id ( $this->mno ); ?>')"   
																	 			    onmousemove=" mousein_change_button ( '#look-like-<?php  echo $ano;  ?>' , 'fs_folders/images/modal/look/liked.png' )" 
																	 				onmouseout="mouseout_change_button (  '#look-like-<?php  echo $ano;  ?>'  , 'fs_folders/images/modal/look/modals-like.png' ) " 
																 				/>   
																				<input onclick=" test_modal () "  type="text" value="not rated comment" id="rate-comment-stat<?php echo $ano ?>" class='hide'  />
																 			<?php } else { ?> 
																 				<img src="fs_folders/images/modal/look/liked.png"   id="look-like-<?php  echo $ano;  ?>"    /> 
																 			<?php } ?>  
																      	</td> 
																        <td>
	 
																        <?php 
																        	if($pltvotes == 0 ) {?>
																        		<span id='look-total-like-<?php  echo $ano;  ?>-name' ></span>  
																		 		<a id="look-total-like-<?php  echo $ano;  ?>" style="font-family: 'Avenir LT Std 85 Heavy' !important; color:white; cursor:pointer" ><?php //print($pltvotes); ?></a>  
																		 		<span>like this </span>
																			<?php  
																			} elseif($pltvotes == 1) { ?>											 		 
																				<span id='look-total-like-<?php  echo $ano;  ?>-name' > <?php echo $latestLikerName; ?>  <span>   
																				<span>like this </span>
																				<span id="look-total-like-<?php  echo $ano;  ?>-stat" style='display:none' >1</span>
																			<?php } else { ?> 
																				<span id='look-total-like-<?php  echo $ano;  ?>-name' > <?php echo $latestLikerName; ?> </span> 

																				<span> and </span>
																				<a 
																					id="look-total-like-<?php  echo $ano;  ?>" 
																					style="font-family: 'Avenir LT Std 85 Heavy' !important; color:white; cursor:pointer" 
																					onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'VIEWS ( <?php echo "$look_attr[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"
																				>
																				<?php print($pltvotes-1); ?>
																				</a>

																				<span> others like this <span> 
																			<?php } ?>  
																		</div>  
																      	</span></span></td> 
														  			</tr>
														  		</tbody>
														  	</table> 
			  											</div>
 
			  									<!-- grey line --> 
													<div class='modal-comment-grey-line' style="margin-top:6px;" > 
													</div> 	 
												<!-- grey rectangle  -->	 
			  										<div id="new-look-modals-score-container" >  
			  											<ul style="position:relative;  z-index:102; margin-top: 0px;  margin-left:3px;"   id="new-look-modals-footer-icons"   > 
															<li style="padding-top:2px;" >  
																<!-- <div title='views (<?php echo "$look_attr[tview]"; ?>)'   id="new-look-modals-views-icon" > 	
																</div>   -->  
																<!-- <img src="fs_folders/images/modal/look/views.png" id="modal-view-icon" >  --> 
																<img 
																	src="fs_folders/images/modal/look/views.png"   
																	id="modal-view-icon" 
																	class='modal-view-icon<?php echo $ano; ?>'  
																	onmouseenter=" mousein_change_button ( '.modal-view-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/views-dark.png' )" 
																	onmouseleave="mouseout_change_button (  '.modal-view-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/views.png' ) "	 
																/>  
															</li>
															<li   style="width: 27px;padding-left: 6px;"  class='look-modal-attr-numbers'  >
																<div id='look-score-text' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'VIEWS ( <?php echo "$look_attr[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >
																	<span> <?php echo "$look_attr[tview]"; ?></span>
																</div>
															</li>
															<li> 
																<div title='Share (<?php echo "$look_attr[tdrip]"; ?>)'  id="new-look-modals-drip-icon-1"      onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo "$look_attr[table_name]" ?>' , '<?php echo $plno; ?>' , '<?php echo $look_attr['title']; ?>' , 'Article' , '<?php echo $look_attr['owner']; ?>' , '<?php echo ".modal-drip-img$ano"; ?>' , '<?php echo "$this->genImgs/$look_attr[src_img_drip_dynamic]"; ?>' , '<?php echo $ano; ?>' , '<?php echo "#stat-look-dripted$ano"; ?>'  )" > 	
																	<!-- <img src="<?php echo "$this->genImgs/$look_attr[src_img_drip]"; ?>"  id='modal-drip-icon'   class='modal-drip-img<?php echo $ano; ?>'  />  --> 
																	<img 
																		src="<?php echo "$this->genImgs/$look_attr[src_img_drip]"; ?>"  
																	    id='modal-drip-icon'
																		class='modal-drip-img<?php echo $ano; ?>'
																		onmouseenter=" mousein_change_button ( '.modal-drip-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/drip-dark.png' )" 
																		onmouseleave="mouseout_change_button (  '.modal-drip-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/drip.png' ) "	 
																	/>  
																</div>   
															</li>
															<li  style="padding-left: 4px;width: 27px;"   class='look-modal-attr-numbers'  >
																<div  class="modal-tdriped<?php echo $ano;?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'SHARED ( <?php echo "$look_attr[tdrip]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >
																	<span> <?php echo "$look_attr[tdrip]"; ?></span>
																</div>
															</li>
															<li> 

																<?php if ( empty($look_attr['response_favorite']) ): // can favorite for the first time only ?>
																	<div  title='favorites (<?php echo "$look_attr[tfavorite]"; ?>)'  id="new-look-modals-favorite-icon-1"  onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$look_attr[table_name]" ?>' , '<?php echo $plno;  ?>' , '<?php  echo $look_attr['headermssg' ] ?>' ,'<?php echo $look_attr['contentmssg'] ?>'  , 'Article' , '<?php echo $look_attr['owner'];  ?>' , '<?php echo ".modal-favorite-img$ano"; ?>' , '<?php echo "$this->genImgs/look-icon-favorite-selected.png"; ?>' , '.modal-comment-tfavorite<?php echo $ano;?>' , '#stat-look-favorited<?php echo $ano; ?>' )"   > 	
																<?php else: ?>							
																	<div  title='favorites (<?php echo "$look_attr[tfavorite]"; ?>)'  id="new-look-modals-favorite-icon-1" >
																<?php endif; ?>							

																	<!-- <img 
																		src="<?php echo "$this->genImgs/$look_attr[src_img_favorite]"; ?>"  
																		id='modal-favorite-icon'  
																		class='modal-favorite-img<?php echo $ano; ?>'  
																	/>  --> 


																	<?php if ( empty($look_attr['response_favorite']) ): ?>
																	<img 
																		src="<?php echo "$this->genImgs/$look_attr[src_img_favorite]"; ?>" 
																	   	id='modal-favorite-icon' 
																	 	class='modal-favorite-img<?php echo $ano; ?>'  
																		onmouseenter=" mousein_change_button ( '.modal-favorite-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/favorite-dark.png' )" 
																		onmouseleave="mouseout_change_button (  '.modal-favorite-img<?php echo $ano; ?>' , 'fs_folders/images/modal/look/favorite.png' ) "	 
																	/>    
																	<?php else: ?> 
																		<img 
																		 	id='modal-favorite-icon' 
																	 		class='modal-favorite-img<?php echo $ano; ?>' 
																		 	src="fs_folders/images/modal/look/favorite-dark.png" 
																		/> 
																	<?php endif; ?>
																</div>  
															</li>  		  
															<li  style="padding-left: 4px;width: 27px;"  class='look-modal-attr-numbers'   >
																<div class="modal-comment-tfavorite<?php echo $ano;?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $plno; ?>' , 'FAVORITES ( <?php echo "$look_attr[tfavorite]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )">
																	<span> <?php echo "$look_attr[tfavorite]"; ?> </span>
																</div>
															</li>
															<li style="padding-left:5px;" > 
																<div  title='share (<?php echo "$look_attr[tshare]"; ?>)' id="new-look-modals-share-icon" class='share_look_modals<?php echo $ano; ?>' onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.share_look_modals<?php echo $ano; ?>' ,   '.share_look_modals<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ) "  > 	
																	 
																</div>   
															</li>  
															<li id='modal-tshare-number'  style="width: 15px;padding-left: 2px;" >
																<div style="color:grey" >
																	<?php echo "$look_attr[tshare]"; ?>
																</div>
															</li> 
															<li id='modal-flag-li' >  
																<!-- <div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'fs-flag' , 'fs_postedarticles' , '<?php echo $artno; ?>' , '#modal-flag-icon<?php echo $ano; ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " > 	 -->
																<div   id="modal-flag-icon-article" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'action' , '<?php echo $look_attr['table_name']; ?>'  , '<?php echo $ano; ?>' , 'imgid' , 'imgsrc' , 'modal-flag-dropdown' ) "  > 	 
																	
																	<!-- <img 
																		src="<?php echo "$this->genImgs/$look_attr[src_img_flag]"; ?>"    
																		id='modal-flag-icon<?php echo $ano; ?>'  
																		title='more' 
																	/>  --> 
																	<img 
																		src="<?php echo "$this->genImgs/$look_attr[src_img_flag]"; ?>"  
																	   	id='modal-flag-icon<?php echo $ano; ?>'  
																	 	class='modal-flag-icon'  
																		onmouseenter=" mousein_change_button ( '#modal-flag-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/more-icon-dark.png' )" 
																		onmouseleave="mouseout_change_button ( '#modal-flag-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/more-icon.png' ) "	 
																	/>   

																</div>   
															</li>     
														</ul>   											
			  										</div>     

													<!-- dropdown flag design article  --> 
														
				  										<?php  
				  											$this->fs_flag( 
				  												array(
				  													'type'=>'flag-modal-dropdown',
				  													'table_name'=>$look_attr['table_name'],
				  													'table_id'=>$plno,
				  													'id'=>$ano,
				  													'mno'=>$look_attr['owner'] 
				  												)
				  											);  
				  										?> 

			  									<!-- dropdowns share -->
		 
			  										<div style="border:1px solid none" >
			  											<?php  
										 					$this->share_modal_dropdown( 
										 						array(	
										 							'table_name'=>$look_attr['table_name'],
										 							'table_id'=>$plno,
										 							'id'=>$ano, 
										 							'about'=>$look_attr['lookAbout'],
										 							'name'=>$user['username'],
										 							'title'=>$look_attr['title'],
										 							'page'=>'feed',  
										 							'link'=>'',
										 							'picture'=>'' 
										 						)
										 					);    
									 					?>
			  										</div>

			  									<!-- grey line -->

													<div class='modal-comment-grey-line' style="margin-top:5px;" > 
													</div> 	
		 
												<!-- comment content-->

		  											<!-- 	<div style="height:5px;border-top:1px solid #e2e2df;width: 269px;" > 
		  											</div> --> 
		      								 				<?php      

															  	$comments =  $this->posted_modals_comment_Query ( 
															  		array(  

																	    'table_name'=> 'fs_postedarticles',
																	    'table_id'=> $artno, 
																	    'orderby'=> 'cno desc', 
																	    'limit_start'=> 0,
																	    'limit_end'=> 2, 
																	    'comment_query'=>'get-comment-modal'   
																  	)    
																);   
															  	$pltcomment = count($comments);  
																$tcomment = $look_attr['tcomment'];  

																if (  $status == 'profile-tabs' ) { 
																	$comment_style_1 = 'padding-top:7px;';
																}
																else{ 
																}  
															?>


													<!-- <div style="<?php echo "$comment_style_1"; ?>" > </div> -->
												      		<div id="new-look-body-comment-container" style="<?php echo $comment_style_1; ?>" >   
					      										<table border="0" cellpadding="0" cellspacing="0"  name='table7' > 
					      											<?php if( $tcomment > 2): ?>
					      											<tr> 
					      												<td style="padding-bottom:5px;padding-top:0px;padding-left:2px;"> 
					      													<a href="detail?id=<?php echo $plno; ?>#comment_content" style='text-decoration:none' > 
						      													<div style="cursor:pointer;color:#284372;font-family:arial; font-size:12px;" > 
						      														<!-- <a href="<?php echo $user['username']; ?>-comments-article-123123" > -->
							      														View all <span style="font-family: 'Avenir LT Std 85 Heavy ' !impotant" ><?php echo "$tcomment"; ?></span> comments	
							      													<!-- </a> -->
							      												</div>
						      												<!-- </a> -->
					      												</td>
					      											<?php endif; ?>
					      											<tr> 
					      												<td style="padding-bottom:5px;padding-top:0px;" id="comment-container<?php echo $ano; ?>" >  
						  													<?php   

		 
						  													// 2014-07-22 12:41:25
						  													// 2014-07-22 00:23:16 

						  													if ( $pltcomment > 0 ):
							  													#from database lookcomment 
							  														// $len  = ($pltcomment < 3 ) ? $pltcomment : 2;    
							  													#from real comment count 
							  													$len  = (count($comments)  < 3 ) ? count($comments)  : 2;     
							  													for ($i=0; $i < $len ; $i++):     

																					$cno               = $comments[$i]['cno'];
																					$table_id          = $comments[$i]['table_id'];
																					$table_name        = $comments[$i]['table_name']; 
																					$mno_commentor     = $comments[$i]['mno']; 
																					$date              = $this->get_time_ago( $comments[$i]['date'] ); 
																					$comment           = $comments[$i]['comment'];  
																					$tlike             = $comments[$i]['tlike'];
																					$tdislike          = $comments[$i]['tdislike'];   
																					$fullname          = $this->get_full_name_by_id ( $mno_commentor );  
												 									$response          = $this->posted_modals_rate_Query(  array(   'mno'=>$mno,   'table_name'=>'fs_comment' ,   'table_id'=>$cno,   'rate_query'=>'get-user-rated-type') ); 
												 									 
												 									// echo " tdislike $tdislike tlike $tlike cno = $cno "; 
												 									$validate_comment  = ( !empty($response ) ) ? 'rated comment' : 'not rated comment' ;  
												 									// echo " this is the $response <br> 'mno'=>$mno2 <br> 'table_name'=>$table_name <br> 'table_id'=>$table_id <br> "; 
												 									// $b              = $this->get_your_look_comment_thumb_up_or_down( $mno , $cno );     
												 									$you_liked         = ( $response == 'like' ) ? 'comment-like-liked.png' : 'commen-like-unlike.png' ;
												 									$you_disliked      = ( $response == 'dislike' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;   
												 									// this is the comment area  
												 									// $profile_pic = $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
												 									#comment print testing
												 									// $tlikes = '12,332'; 
												 									// $tdislike = '1,000';   

												 									// grey separotors of the two comments 

							 															if ( $i == 1 ) { echo " <div id='modal-comment-grey-separator-article' >  </div> "; }

												 									?>  
												 									<div> 
											      										<ul style="padding:none; margin:none; border:1px solid none;" >
											      										 	<li> 
											      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno_commentor ,"$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px;'  );  ?>
											      										 	</li>   
											      										 	<li style="width:228px;font-family:arial; font-size:12px;  " >
											      										 		<div style="margin-top:-2px;" >
												      										 		<div style="margin-left:7px;"  >
												      										 		 	<a href='<?php echo $username; ?>'> <b style='color:#284372;font-family: 'Avenir LT Std 35 Light' !important; color:#225b99' > <?php echo $fullname; ?> </b></a> <span id='modal-comment-color' > <?php echo $this->cleant_text_print_from_db ( $comment ); ?></span>
												      										 		</div>  
												      										 		<div style="margin-left:7px; color:#d6051d"  >   
												      										 			<table border="0" cellpadding="0" cellspacing="0" style="width:auto;padding:none;margin:0px; " name='table8' > 
												      										 				<tr>  
												      										 					<td style='auto' > 
												      										 						<span style='color:#ccc;font-size:12px' > <?php echo "$date"; ?>   </span> 
												      										 					</td>
												      										 					<td  style="padding-left:5px;" >  	
												      										 						<div  style="margin-top:-1px;" > 
												      										 							<?php if($you_liked == 'commen-like-unlike.png') { ?> 
												      										 								<!-- unliked -->
													      										 							<img 
																											 					 id='<?php echo "modal-comment-like$cno"; ?>'   
																											 					style='height:12px;'
																												 				src="<?php echo "$this->genImgs/$you_liked"; ?>"
																												 				onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' , '#modal-comment-tlike<?php echo $cno; ?>' )"
																												 				onmousemove=" mousein_change_button ( '<?php echo "#modal-comment-like$cno"; ?>' , '<?php echo "$this->genImgs/comment-like-liked.png"; ?>')"  
																												 				onmouseout="mouseout_change_button (  '<?php echo "#modal-comment-like$cno"; ?>'  , '<?php echo "$this->genImgs/commen-like-unlike.png"; ?>' ) "
																											 				/> 
														      										 						<!-- 'comment-like-liked.png' : 'commen-like-unlike.png'  --> 
														      										 					<?php  } else { ?>  
														      										 						<!-- liked -->
														      										 						<img src="<?php echo "$this->genImgs/$you_liked"; ?>" id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' , '#modal-comment-tlike<?php echo $cno; ?>' )" />  
																											 			<?php } ?>  
												      										 						</div>
												      										 					</td>
												      										 					<td style=" color:#d2d0d0;font-size:12px;padding-left:5px;" id="modal-comment-tlike<?php echo $cno; ?>" ><?php echo "$tlike";  ?></td>
												      										 					<td style="padding-left:5px;" > 
												      										 						<div style="margin-top:2px;" >
												      										 							<?php if($you_disliked == 'comment-dislike-un-disliked.png') { ?> 
												      										 								<!-- unlike unliked -->
													      										 							<img 
																											 				    id='<?php echo "modal-comment-dislike$cno"; ?>'  
																											 					style='height:12px;'
																												 				src="<?php echo "$this->genImgs/$you_disliked"; ?>"
																																onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' , '#modal-comment-tdislike<?php echo $cno; ?>'  )" 
																												 				onmousemove=" mousein_change_button ( '<?php echo "#modal-comment-dislike$cno"; ?>' , '<?php echo "$this->genImgs/comment-dislike-disliked.png"; ?>')"  
																												 				onmouseout="mouseout_change_button (  '<?php echo "#modal-comment-dislike$cno"; ?>'  , '<?php echo "$this->genImgs/comment-dislike-un-disliked.png"; ?>' ) "
																											 				/>  
														      										 					<?php  } else { ?>  
														      										 						<!-- unlike liked -->
														      										 						<img src="<?php echo "$this->genImgs/$you_disliked"; ?>" id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' , '#modal-comment-tdislike<?php echo $cno; ?>'  )"   />
																							 							<?php } ?>      
												      										 						</div> 
												      										 					</td>
												      										 					<td style="color:#d2d0d0;font-size:12px;padding-left:5px;" id="modal-comment-tdislike<?php echo $cno; ?>" > <?php echo "$tdislike"; ?>  </td>
												      										 			</table>   
												      										 		</div> 
												      										 	</div> 
											      										 	</li>   
											      										</ul>    
											      										<div style="display:none" >
											      											<input type="text" value="<?php echo $validate_comment; ?>" id="rate-comment-stat<?php echo $cno; ?>"  /> 
											      										</div>
											      										<?php if ( $i < $len-1 ) { ?>
													 										<div style="clear:both; height:7px;border:1px solid none;" > 
																							</div> 
																						<?php } ?> 
											      									<?php 
										      									endfor;   
										      						 		endif;   
										      						 		?>  
									      						 		</td> 
									      						 	<tr>
									      						 		<td style="display:none" >
									      						 			<center><?php $this->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test$ano" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
									      						 		</td> 
							      						 			<tr>
								      									<td style="padding-bottom:5px;padding-top:0px;" >  
								      										<ul style="border:1px solid none;" >
								      										 	<li>  
								      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px'  );   ?>
								      										 	</li>   
								      										 	<li style="width:225px;font-family:arial; font-size:12px;" > 	 
								      										 		<div style="margin-left:5px;"  > 
								      										 			<input id="modal-comment-field<?php echo $ano; ?>" type="text" placeholder='Leave a comment' style=" border:1px solid #e2e2df; height:35px; width:228px; padding-left:5px; "     onkeyup="modal_comment_send ( '<?php echo $mno; ?>' , '<?php echo $artno ; ?>' , 'fs_postedarticles' , '<?php echo $ano; ?>' , event , 'feed' , 'comment-container<?php echo $ano; ?>' , '#modal-comment-loader-test<?php echo $ano; ?>' )"        >      										 		 	 
								      											 	</div>   
								      										 	</li>  
								      										</ul>   
								      									</td>
					      										 </table>
					      									</div>     
				      						<?php else: ?>     
				      							<?php   
					      							$category    = $look_attr['category'];
					      							$memFsInfo   = $this->get_user_full_fs_info( $look_attr['owner'] );   
					      							$tlikes      = $memFsInfo['tlikes'];  
					      							$tfollowers  = $memFsInfo['tfollowers']; 
					      							$tarticle    =  select_v3('fs_postedarticles', 'count(artno) as tarticle', " category =  '$category' and mno =  " . $look_attr['owner'] )[0]['tarticle'];   // $memFsInfo ['tarticle'];   // get the total article that member posted in the specific category  
				      							?>  
				      							<!-- grey line --> 
													<div class='modal-comment-grey-line' style="margin-top:6px;" > 
													</div> 	 
												<!-- line height controller -->
													<div style="height: 7px;"></div> 
												<!-- like blue --> 
			  										<div id="new-look-modals-stat-container-2"> 
													  	<table cellspacing="0" cellpadding="0"> 
													  		<tbody>
													  			<tr> 
															      	<!-- <td>  -->
															      		<?php   
															      			// $this->member_thumbnail_display( $this->ppic_thumbnail , $look_attr['owner']  , "$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px'  );   
															      		    //$this->member_thumbnail_display( $this->ppic_thumbnail , $look_attr['owner'], $this->ppic_thumbnail,  $this->get_full_name_by_id($look_attr['owner']) , '35px', '', '35px', 'border-radius:3px;' );   
															      			?>  
															      	<!-- </td>  -->
															        <td class='modal-attr-rate-page-td1' >
															        	<text>Likes </text>  <stat><?php echo $pltvotes;  ?></stat>
															        </td> 
															        <td class='modal-attr-rate-page-td2' > 
															        	<text>Followers</text>  <stat><?php echo $tfollowers; ?></stat>
															        </td> 
															        <td class='modal-attr-rate-page-td3' > 
															        	<text>Articles</text>  <stat><?php echo $tarticle;  ?></stat>
															        </td> 
															        <td style="display:none" > 
															         	 <img id = "modal-feed-post-button"  src="fs_folders/images/header/header_post.png" style='height:30px;' onmouseover="change_image_src ( '#modal-feed-post-button' , 'fs_folders/images/header/post-mouse-over-button.png' )" onmouseout="change_image_src ( '#modal-feed-post-button' , 'fs_folders/images/header/header_post.png' )"   >  
															        </td>  
													  			</tr>
													  		</tbody>
													  	</table> 
		  											</div>   

												<!-- ARTICLE SUGGEST --> 
												<?php if( !empty($featuredLooks)) {  ?>
												<!-- grey line --> 
													<div class='modal-comment-grey-line' style="margin-top:5px;" > 
													</div> 	    
												<!-- Suggestions modals depends on the type of the modals iether article or look -->
													<table id="modal-feed-suggestions">
														<tbody>
															<tr>
																<?php   
																	// echo $plno. '';
																 	for ($i=0; $i < count($featuredLooks); $i++) {   ?> 
																   		<td> 
																			<div>   
																				<a href="articledetails-dev.php?id=<?php echo  $featuredLooks[$i]['artno']; ?>#details-title" > 
																					<div style="
																					    background-image: url(fs_folders/images/uploads/posted%20articles/home/<?php echo $featuredLooks[$i]['artno']; ?>.jpg);
																					    background-repeat: no-repeat;
																					    background-size: 127px;
																					    cursor:pointer;"> 
																					</div>  
																				</a> 
																				<!-- <img    src="fs_folders/images/uploads/posted looks/home/<?php echo $featuredLooks[$i]['plno']; ?>.jpg" /> -->
																			</div>
																		</td>
																   		<?php  
																   	}  															
																?> 
															</tr>
														</tbody>
													</table>  
												<?php } ?>

												<!-- line height controller -->
			      								<div style="height: 7px;"> </div>  
				      						<?php endif; ?>   


		      							</td> 
		      					</table>  
		      				</div>    

		      				<?php if($feed == TRUE): ?>	
								<div style="height:6px;"> </div>  
							<?php else: ?>
								<div style="height:15px;"> </div>  
							<?php endif; ?>
						</div>



	      				
	      		 	<?php
      			}
      			public function modal_version1_media ( ) { 
      			}  
      			public function modal_version1_member ( $ano , $type=null  , $profilepath=null , $headerstyle=null ,  $page=null , $comment_style = null ) {  
 			
 
	      			switch ( $page ):
	      				case 'profile-tab-followers': 
	      						$mno = $ano; 
	      				   	    $mno1 = $ano; 
	      				   	    $profile_pic    = $this->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
	      				   	  	$memFsInfo      = $this->get_user_full_fs_info( $mno ); 
					         	$username1      = $this->get_username_by_mno( $mno1 ); 
	      				   	    // echo " profile tab ";
	      					break; 
	      				case 'admin-flag':

	      						// flag page in the member moda
 								$mppno 	     = $ano;  
	      						$response    = select_v3(  'fs_member_profile_pic' ,   '*' , "mppno  = $mppno"   ); 
 								$mno 		 = $response[0]['mno']; 

 								// echo "admin ";
	      					break;
	      				default:
	      						// echo " activity wall retrieve ";
		      				 	$activity    = $this->get_activity_posted( $ano );   
					            $_date       =  $activity[0]['_date']; 
					            $mno         =  intval($activity[0]['mno']); 
					            $mno1        =  intval($activity[0]['_table_id']); 
					            $action      =  $activity[0]['action'];   

					            // print_r($activity);

					            // echo " $action ";
					            switch ( $action ) {  
					            	case 'Updated': 
					            			$profile_pic = $mno1;
					            			$mno1        = $mno;   
					            		 	$username    = $this->get_username_by_mno( $mno );
											$username1   = $this->get_username_by_mno( $mno1 );
											$memFsInfo   = $this->get_user_full_fs_info( $mno1 );
											$owner_fullname =  $memFsInfo['fullName1'];   
					            		break; 
					            	case 'Joined': 
					            			$profile_pic = $mno1;
					            			$mno1        = $mno;   
					            		 	$username    = $this->get_username_by_mno( $mno );
											$username1   = $this->get_username_by_mno( $mno1 );
											$memFsInfo   = $this->get_user_full_fs_info( $mno1 );
											$owner_fullname =  $memFsInfo['fullName1'];   
					            		break; 
					            	case 'Following':  
					            			// $profile_pic = $mno1; 
					            			// echo " Following $profile_pic"; 

					            			//$mno1          //= $this->member_profile_pic_query( array('mppno'=>$mno1  , 'type'=>'get-specific-mno-by-mppno' ) );  // owner of the modal
					            			$profile_pic    = $mno1;   // $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );    
					            			$mno1           = $this->member_profile_pic_query( array('mppno'=>$mno1  , 'type'=>'get-specific-mno-by-mppno' ) );  // owner of the modal
					            			$username       = $this->get_username_by_mno( $mno );
											$username1      = $this->get_username_by_mno( $mno1 );
											$memFsInfo      = $this->get_user_full_fs_info( $mno1 );   
 											$owner_fullname =  $memFsInfo['fullName1'];   
					            		break;  
					            	case 'Commented':   
					            			// $profile_pic = $mno1;
					            			// $mno1 = $mno;  
					            	 		// $profile_pic  = $mno1;   
					            	 		// $mno1 = $this->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
					            	 		// $mno1 = $mno;  
					            	 		// echo "asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd"; 
					            		  	// $mno1  = $this->member_profile_pic_query( array('mppno'=>$mno1  , 'type'=>'get-specific-mno-by-mppno' ) );  
					            		    // $mno1 = $this->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
					            		    
					            		    $profile_pic    = $mno1;
					            		    $mno1           = $this->member_profile_pic_query( array('mppno'=>$mno1  , 'type'=>'get-specific-mno-by-mppno' ) );  // owner of the modal
					            		    $username1      = $this->get_username_by_mno( $mno1 ); 
					            		  	// $username       = $this->get_username_by_mno( $mno ); 
											// $owner_username = $this->get_username_by_mno( $mno1 );  

					            		    $memFsInfo      = $this->get_user_full_fs_info( $mno );
												$participant_username = $this->get_username_by_mno( $mno ); 
												$participant_fullname =  $memFsInfo['fullName'];   

					            		    $memFsInfo      = $this->get_user_full_fs_info( $mno1 );
 												$owner_fullname       =  $memFsInfo['fullName1'];   
												$owner_username       =  $this->get_username_by_mno( $mno1 );

					            		 

					            		break;
					            	default:  
					            			$profile_pic    = $mno1;
					            		    $mno1           = $this->member_profile_pic_query( array('mppno'=>$mno1  , 'type'=>'get-specific-mno-by-mppno' ) );  // owner of the modal 
					            		    $memFsInfo      = $this->get_user_full_fs_info( $mno1 );
					            		    $username1      = $this->get_username_by_mno( $mno1 );
 												$owner_fullname       =  $memFsInfo['fullName1'];   
												$owner_username       =  $this->get_username_by_mno( $mno1 ); 
					            			$memFsInfo      = $this->get_user_full_fs_info( $mno );
												$participant_username = $this->get_username_by_mno( $mno ); 
												$participant_fullname =  $memFsInfo['fullName'];   
 
					            		break;
					            }   
	      					break;
	      			endswitch;
 
      				// echo  " owner of the modal $mno1 <br> "; 
	      			// echo " profile pic mppno  $profile_pic <br>"; 

	    			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );  
	    			$mno2            = $_SESSION['mno'];     
		            $mem_info1       = $this->get_user_full_fs_info( $mno , 'fullName' );   
		            $fullname1       = $mem_info1['fullName1'];    
	            	$mem_info        = $this->get_user_info_by_id( intval($mno1) );     

    		 		// $this->print_r1($mem_info);  
    		 		// this is the profile modal name 
	            	// $this->print_r1($memFsInfo);

	    		 	$fullname        =  $memFsInfo['fullName2']; //$fullname1; //$mem_info[0]['fullname']; //$memFsInfo['fullName'];   

					$opercentage     = $memFsInfo['opercentage'];  	
					$otrating        = $memFsInfo['otrating'];   
	    			$tlooks 	     = $memFsInfo['tlooks'];    
	    			$tarticle 	     = $memFsInfo['tarticle'];     
	    			$gendertype      = strtolower($memFsInfo['gendertype']); 


	    			$tmedia 		 = number_format( ( !empty($mem_info[0]['tmedia']      ) )? $mem_info[0]['tmedia'] : 0 );
	    			$tlooks 		 = number_format( ( !empty($mem_info[0]['tlooks']      ) )? $mem_info[0]['tlooks'] : 0 );
	    			$tarticle 		 = number_format( ( !empty($mem_info[0]['tarticle']      ) )? $mem_info[0]['tarticle'] : 0 );
	    			// $tarticle 		 = number_format( ( !empty($mem_info[0]['tarticle']    ) )? $mem_info[0]['tarticle'] : 0 );
	    			$trating 		 = number_format( ( !empty($otrating                   ) )? $otrating : 0 );   /*number_format($mem_info[0]['trating']); */ 
	    			$tfollower 		 = number_format( ( !empty($mem_info[0]['tfollower']   ) )? $mem_info[0]['tfollower'] : 0 );
	    			$tfollowing 	 = number_format( ( !empty($mem_info[0]['tfollowing']  ) )? $mem_info[0]['tfollowing'] : 0 );
	    			$tpercentage 	 = number_format( ( !empty($mem_info[0]['tpercentage'] ) )? $mem_info[0]['tpercentage'] : 0 );
	    			$tview 	         = number_format( ( !empty($mem_info[0]['tview']       ) )? $mem_info[0]['tview'] : 0 );  
	    			$aboutme 		 = ( !empty(  $mem_info[0]['aboutme']       ) ) ? $mem_info[0]['aboutme'] : null ;
	    			$firstname 		 = ( !empty(  $mem_info[0]['firstname']     ) ) ? ucfirst($mem_info[0]['firstname']) : null ;
	    			$fullname     	 = ( !empty(  $mem_info[0]['fullname']      ) ) ? ucfirst($mem_info[0]['fullname']) : null ;
	    			$middlename 	 = ( !empty(  $mem_info[0]['middlename']    ) ) ? ucfirst($mem_info[0]['middlename']) : null ;
	    			$lastname 		 = ( !empty(  $mem_info[0]['lastname']      ) ) ? ucfirst($mem_info[0]['lastname']) : null ;
	    			$gender 		 = ( !empty(  $mem_info[0]['gender']        ) ) ? $mem_info[0]['gender'] : null ;
	    			$nickname 		 = ( !empty(  $mem_info[0]['nickname']      ) ) ? $mem_info[0]['nickname'] : null ;
	    			$country 		 = ( !empty(  $mem_info[0]['country']       ) ) ? $mem_info[0]['country'] : null ;
	    			$state_ 		 = ( !empty(  $mem_info[0]['state_']        ) ) ? $mem_info[0]['state_'] : null ;
	    			$city 			 = ( !empty(  $mem_info[0]['city']          ) ) ? $mem_info[0]['city'] : null ;
	    			$zip 			 = ( !empty(  $mem_info[0]['zip']           ) ) ? $mem_info[0]['zip'] : null ;
	    			$occupation      = ( !empty(  $mem_info[0]['occupation']    ) ) ? $mem_info[0]['occupation'] : null ;
	    			$datejoined 	 = ( !empty(  $mem_info[0]['datejoined']    ) ) ? $this->date_format( $mem_info[0]['datejoined'] , '.' )   : null ;
	    			$logtime 	     = ( $mem_info[0]['logtime'] != '0000-00-00 00:00:00' ) ? $this->get_time_ago($mem_info[0]['logtime']) : '22 HOURS' ;
	    			$logstat 		 = $mem_info[0]['logstat'];
				 	$logtime 	     = $mem_info[0]['logtime']; 
 
  	    			$mem_total_look  = $tlooks;
					$mem_total_media = $tmedia;  
					$mem_total_article = $tarticle;
					$mem_total_views = $tview;
					$user_header_style = 0;
					$mem_rating_percatage = $tpercentage; 
					$mem_total_followers = $tfollower;
					$mem_total_following = $tfollowing;    


					// set up date joined member
					$title = $this->set_member_title( strtoupper($fullname), strtoupper($occupation) , strtoupper($city) , strtoupper($state_) , strtoupper( $country )  , NULL ,  "  <b>JOINED:</b> $datejoined <b>ONLINE:</b> <span style='color:yellow;opacity:0.7'>". strtoupper(strip_tags( $logtime ))."</span>" );  
					// $title = "$fullname <br> $occupation<br> $country $state_ $city $zip  <br> JOINED $datejoined ";  
					$aboutme=$aboutme; 


					$look_attr['src_img_flag']           = "modal-flag-dot.png";//"modal-flag.png";  
					// $look_attr['src_img_flag']        = "large-flag-red.png"; 
			

					# user 
						$user['username'] = $this->get_username_by_mno( $mno1 ); 

					switch ( $page ):
	      				case 'profile-tab-followers': 
	      					 
	      					break; 
	      				default:
	      						$member_img_directory=0;  
								$when = $this->get_time_ago( $_date );   
								$action_lower = "<span style='color:#d6051d' > ".strtolower($action)." </span>" ;   
								$tfollowing1  = $this->get_total_follower( $mno1 );   

								$more = $this->get_more_friends_doing_the_action ( $mno  , $mno1 , 'Following' );  
								// $more = '1 more'; 
	      					break;
      				endswitch; 
					switch ( $page ):
	      				case 'profile-tab-followers':  
	      					break; 
	      				default: 
		 					switch ( $action ) { 

		 						case 'Following':  
		 								/*
			 								if ( $tfollowing1  < 2 ) {
			 									$action = "<b> <a href='$username'   > $fullname1 </a> </b> <span style='color:#225B99' > is now </span>  $action_lower <b> <a href='$username1'  > $fullname </a> </b> $when ";  	 
			 								}
			 								else{ 
			 									$action = "<b> <a href='$username'   > $fullname1 </a> </b> $more <span style='color:#225B99' >are now</span>   $action_lower <b> <a href='$username1'  > $fullname </a> </b> $when ";  	 
			 								} 
		 								*/ 

		 								// $action = "<b> <a href='$username'   > $fullname1 </a>   <span style='color:#225B99' >is now</span>   $action_lower <b> <a href='$username1'  > $fullname </a> </b> $when ";  	 
			 								$action = "<b> <a href='$username'   > $fullname1 </a>   <span style='color:#225B99' >is now</span>   $action_lower <b> <a href='$username1'  > $fullname </a> </b> $when ";  	 

			 								
		 							 
		 							break;
		 						case 'Joined': 

		 							 	$action = "<b> <a href='$username1' >  $owner_fullname</a></b> $action_lower <span style='color:#225B99' >Fashion Sponge </span> $when";  
		 							break;
		 						case 'Updated':  
		 							 	$action = "<b> <a href='$username1' >  $owner_fullname</a></b> $action_lower <span style='color:#225B99' > $gendertype profile picture </span> $when";  
		 							break;
		 						case 'Commented': 

			 							if ( $mno != $mno1 ): 
			 								$action = "<b> <a href='$participant_username' >  $participant_fullname</a>  </b> $action_lower <span style='color:#225B99' > on <a href='$owner_fullname' >  <b>$owner_fullname</b></a> profile picture </span> $when";  
			 							else:
			 								$action = "<b> <a href='$participant_username' >  $participant_fullname</a>  </b> $action_lower <span style='color:#225B99' > on $gendertype profile picture </span> $when";  
			 							endif; 
			 								
		 							break;
		 						default: 
			 							if ( $mno != $mno1 ): 
			 								$action = "<b> <a href='$participant_username' >  $participant_fullname</a>  </b> $action_lower <span style='color:#225B99' > on <a href='$owner_fullname' >  <b>$owner_fullname</b></a> profile picture </span> $when";  
			 							else:
			 								$action = "<b> <a href='$participant_username' >  $participant_fullname</a>  </b> $action_lower <span style='color:#225B99' > on $gendertype profile picture </span> $when";  
			 							endif; 
		 							break;
		 					} 
		 					$action = str_replace(' and ',"<span style='color:#225B99'>and</span>", $action ); 
		 					$action = "<div style='border:1px solid none;line-height:16px;color:#000;' id='look-modals-action' >$action</div>";    
							
						break; 
					endswitch;


					$profile_check_exist = $this->set_check_profile_exist( $type , $mno );  
					$profile_check_exist1 = $this->set_check_profile_exist( $type , $profile_pic );  

					$aboutme_limitted = $this->set_about_limit(  $fullname , $aboutme , 170 , 50 );  
					$b = $this->check_if_more( $aboutme , $aboutme_limitted);   
					$avatar = ( $gender == 'female' ) ? 'female-default-avatar.png' : 'male-default-avatar.png' ;



					# set icons 
						// this is the flag query for the member modal
						$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>" table_id = $profile_pic and table_name= 'fs_member_profile_pic' and mno = $mno "  )  );   
					
						if ( !empty($response) ) {
							  $look_attr['src_img_flag']        = "large-flag-red.png";
						} 
 

					if ( file_exists("$profile_check_exist1") ) {  
						$mempic = "$this->ppic_profile/$profile_pic.jpg";  
					} 
					else{
						$avatar = $this->get_male_female_avatar( $mno );  
						$mempic = "$this->ppic_profile/$avatar";  
					}    

						$table_name = 'fs_members';
						$table_id   =  $mno;
					
					/** Login status online not online */
					if($logstat == 0) { 

			    		//show the how may hours they logged in\
			    		$onlineStat = "<span class='red'>Online " . $this->get_time_ago($logtime, 'new') . '</span>'; 

			    	} else {  

			    		//show  online
			    		$onlineStat = "<span class='green'>Online Now </span>";  

			    	}  
	            	?>      
      				<modals-item >  

      					<div class="<?php echo "$table_name-$table_id"; ?>" > 
	      					<div style="position:absolute;visibility:hidden;"> 
								<class>member_t<?php echo $ano; ?></class><class>member_t<?php echo $ano; ?></class>
							</div>  
		      				<div id="modals_version1_member_main_wrapper" class="member_t<?php echo $ano; ?>" >  
			      				<table border="0" cellpadding="0" cellspacing="0" >
			      					<tr> 
			      						<td style="padding-bottom:9px; <?php echo $headerstyle; ?>" > 
			      							<?php  
						         				// echo " mno = $mno1 and profile pic $profile_pic ";
			      								// echo " $page asdasdasd";
			      								$this->new_modals_header( $mno , $action , $profilepath );  
			      							?>  
			      						</td>
			      					<tr> 
		      						<td style="border:1px solid #e2e2df; border-radius:5px;background:white;" > 
		      							<div style="margin-top:0px; margin-bottom:0px; " >
			      							<table border="0" cellpadding="0" cellspacing="0"  style=" padding-top:5px;  " >
			      								<tr> 
			      									<td style="height:200px;">   
			      										<!-- new member modals mouse over -->  
						      									<div style="position:absolute;background-color:none;width:270px; display:none; border:1px solid none" class="new-member-modals-content-div<?php echo $ano; ?>" onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-member-modals-content-div<?php echo $ano; ?> ' ,   '.new-member-modals-content-div<?php echo $ano; ?>  ' ,   '.new-member-modals-content-div<?php echo $ano; ?>' )" >  
						      										<!-- new member desc and header content -->
															 			<div id='mouserOver_content' style="display:none">  
												 					  	 	<table style="display:block;margin-left:6px;margin-top:5px;width:265px; " border="0" cellpadding="0" cellspacing="0" id='hover_user_t1'   > 
															 					<tr>
															 						<td id='hup' >  </td> <tr>
																 					<td>  
																 						<div style="margin-left:7px;" > 
																 							<?php  $this->print_user_modals_follow_or_unfollow_buttons( $mno2 , $mno1 , 'width:40px;' ); ?>
																 						</div>
																 						<!-- <img id='imgman_hover' src="<?php ?>">  -->
																 					</td>
																 					<td style="width:90px;" >  	
																 						&nbsp;&nbsp; <span   style='font-size:25px;color:#fff;font-family:arial !important; display:none ' >  <?php echo $opercentage ; ?></span><span style='font-size:15px;color:#fff' > </span> 
																 					</td> 
																 					<td>     
																 						<div  id="new-look-modals-rating" style="border:1px solid none;width:118px; float:right"  >
									      													<div style='margin-top:5px; margin-left:20px;position:absolute;font-size:11px;font-family:arial !important;font-weight:bold'   >
									      														RATE ( <?php echo $trating ; ?> )
									      													</div> 
									      												</div> 
																 					</td> 
														 					</table>   
														 					<table style=" display:block;padding-left:0px; font-size:12px; padding-top:2px;width:255px;font-family:arial; margin-top:5px;margin-left:13px;" border="0" cellpadding="0" cellspacing="0" id='user_table_r2' > 
															 					<tr>  
															 						<td  style="padding-left:0px; visibility:hidden " > 
															 							<?php  //$this-> print_user_modals_follow_or_unfollow_buttons( $mno2 , $mno1 ); ?>
															 							<!-- <img id="follow_img"   style="" src="" onclick=" follow(  '1' , '2' , 'follow' , 'follow_img' )" > -->
															 						</td>  
															 						<td style=' font-weight:bold;color:#fff; ' >  
															 							 FOLLOWERS <?php echo $mem_total_followers; ?> 
															 						</td>     
															 						<td  style='padding-left:2px; padding-right:2px;font-weight:bold;color:#fff' >  
															 							 /
															 						</td> 
															 						<td  style='font-weight:bold;color:#fff; text-align:right'> 
															 						 	FOLLOWING <?php echo $mem_total_following; ?> 
															 						</td>   
														 					</table>   
														 					<a href="<?php echo $username1; ?>"> 
															 					<table border="0" id='td_title ' style="margin-left:10px; margin-top:2px; border:1px solid none; width:240px; "  > 
															 						<tr> 
															 							<td id='uptd'> </td> <tr> 
															 							<td> 
															 								<div  style="position:relative; text-align:left; font-size: 18px !important; width: 109%; font-family:MisoLight;color:#fff;  " >  
																	 							<?php echo $this->cleant_text_print_from_db ( $title ); ?> 
															 								</div>
															 							</td> 
															 						<tr> 
															 							<td>  
																 							<div  id='user_desc' style="font-size:12px;color:#fff; text-align:left;border:1px solid none;width:100%;margin-top:2px;font-weight:normal "  >  
																 								<?php echo  ucfirst( $this->cleant_text_print_from_db ( $aboutme_limitted ) );  ?>  
																 							</div> 
															 							</td>
															 					</table> 
														 					</a> 
												 						</div> 
												 						<a href="<?php echo $username1; ?>" style="color:white"> 	


												 						<div id="mouserOver_content" class="member-modal-content-container">   
		  	
																		  	<div class="member-post-status"> 

																		 	<text>Followers</text> <stat><?php echo $mem_total_followers; ?></stat>  |   
																		  	<text>Following</text> <stat> <?php echo $mem_total_following; ?> </stat> <br> 
													      	             	<text>Looks:</text>    <text>Likes</text> <stat>0</stat> |  
													      	             	<text>Articles:</text> <text>Likes</text> <stat>0</stat> <br>

																			<text>Rank:</text>  <text>Looks</text> <stat>0</stat>|  
																			<text>Articles</text>  <stat>0 </stat> <br>
																		  	</div>
																		  
																		  	<div class="member-info">
																			<!--    	Mussolini Moor  Of Fashion Sponge <br>
																			    Fashion Designer <br>
																			    Atlanta, Ga <br>
																			    Joined 2.2.13 | Online: 7 Mins Ago <br> -->

																			    <?php   
																			    	echo " 
																			    		$fullname Of Fashion Sponge
																			    		$occupation 
																			    		$state_, $city <br>
																			    		Joined $datejoined | $onlineStat  <br>
																			    	";
																			    ?>
																		 	</div>


																		    <div class="member-description">  
																				<?php echo $this->string_limit($aboutme, 100, 'member', $username1); ?>
																		      </div>
																			  
																		    <div class="member-follow">  
																		    	<!-- <img src="fs_folders/images/modal/member/follow.png">   -->
																		    <?php $this->print_user_modals_follow_or_unfollow_buttons( $mno2 , $mno1 , 'width:110px' ); ?> 
																			  </div> 
																		    </div> 






		  															<!-- 		<div id="mouserOver_content" class="member-modal-content-container">   
		  	
																			  <div class="member-post-status"> 
																			       <text>FOLLOWERS<text> <stat>2K</stat> |  <text>FOLLOWING</text> 25 <br>
																			        <text>LOOKS:</text> <stat>7K</stat>  <text>LIKES</text> |  <text>ARTICLES:</text> <stat>840 </stat><text>LIKES</text> <br>
																			        <text>RATING:</text>  <text>LOOKS</text> <stat>#9 </stat>|  <text>ARTICLES</text><stat> #41</stat> <br>
																			  </div>
																			  
																			  <div class="member-info">
																			    MUSSOLINI MOORE OF FASHION SPONGE <br>
																			    FASHION DESIGNER <br>
																			    ATLANTA, GA <br>
																			    JOINED 2.2.13 | Online: 7 Mins Ago <br>
																			  </div>
																			  
																			  
																			  <div class="member-description">
																			    has been the industry's standard 
																			    dummy text ever since the 1500s, 
																			    when an unknown printer took  n 
																			    printer took  ook  n printer took  
																			  </div>
																			  
																			  <div class="member-follow"> 
																			  	

																			  	 <img src="fs_folders/images/modal/member/follow.png"> 
	 					



																			  </div> 
																		    </div>   -->
	                                                                    </a> 
												 						<a href="<?php echo $username1; ?>"> 
											 								<!-- new member invisible modals for height -->
							      												<div style="width:270px;background-color:#000; margin-left:6px;" class="transparent" > 
							      													<img src="<?php echo $mempic; ?>" style='visibility:hidden;width:100%; height:250px; ' />		
							      												</div>  
							      											<!-- new member footer icons -->
							      											<table  style="margin-top:-25px;margin-left:7px; display:none"     border="0"     cellpadding="0" cellspacing="0" id='user_hover_footer'   onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')"  > 
																 				<tr> 
																 					<td> <img  id = 'percentage'   src="fs_folders/images/body/Member/small look icon.png"     title="look" > </td>
																 					<td> <span> <?php echo $mem_total_look ; ?>   </span>  </td>
																 					<td> <img id='text_blog'       src="fs_folders/images/body/Member/small media icon.png"    title="media"  > </td>
																 					<td> <span> <?php echo $mem_total_media; ?>   </span>  </td>
																 					<td> <img id='text_blog'       src="fs_folders/images/body/Member/small article icon.png"  title="article"  > </td>
																 					<td> <span> <?php echo $mem_total_article; ?> </span>  </td>
																 					<td> <img id='user_eye'        src="fs_folders/images/body/Member/views icon.png"          title="views"  > </td>
																 					<td> <span> <?php echo $mem_total_views ; ?>   </span> </td>
																 			</table>  
																	 	</a> 
					      										</div>  
			      										<!-- new member modals before mouse over -->
								      						<div id="new-member-modals-image-div"  class="new-member-modals-image-div<?php echo $ano; ?>"   style="border:1px solid none; padding-bottom:0px; width:270px;padding-left:6px;"  onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.new-member-modals-image-div<?php echo $ano; ?> ' ,   '.new-member-modals-image-div<?php echo $ano; ?>  ' ,   '.new-member-modals-content-div<?php echo $ano; ?>' )" > 
									      						<a href="<?php echo $username1; ?>">
								      								 <img src="<?php echo $mempic; ?>" style='width:100%;height:250px;' >
																</a>
								      						</div>    
			      									</td> 
			      								<tr> 
			      									<td style=" padding-left:6px; border-radius: 0px 0px 5px 5px ;"  style="<?php echo "$commentstyle"; ?>"    >  
			      										<?php  
							      							$member['tlooks']   = $mem_total_look;
							      							$member['tmedia']   = $mem_total_media;
							      							$member['tarticle'] = $mem_total_article;
							      							$member['tview']    = $mem_total_views;
							      							$member['mppno']    = $profile_pic;   





													    // 			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );  
													    // 			$mno2            = $_SESSION['mno'];     
														   //          $mem_info1       = $this->get_user_full_fs_info( $mno , 'fullName' );   
														   //          $fullname1       = $mem_info1['fullName1'];    
													    //         	$mem_info        = $this->get_user_info_by_id( intval($mno1) );     

												    	// 	 		// $this->print_r1($mem_info);  
												    	// 	 		// this is the profile modal name 
													    //         	// $this->print_r1($memFsInfo);

													    // 		 	$fullname        =  $memFsInfo['fullName2']; //$fullname1; //$mem_info[0]['fullname']; //$memFsInfo['fullName'];   

																	// $opercentage     = $memFsInfo['opercentage'];  	
																	// $otrating        = $memFsInfo['otrating'];   
													    // 			$tlooks 	     = $memFsInfo['tlooks'];    
													    // 			$tarticle 	     = $memFsInfo['tarticle'];     
													    // 			$gendertype      = strtolower($memFsInfo['gendertype']); 


													    // 			$tmedia 		 = number_format( ( !empty($mem_info[0]['tmedia']      ) )? $mem_info[0]['tmedia'] : 0 );
													    // 			// $tarticle 		 = number_format( ( !empty($mem_info[0]['tarticle']    ) )? $mem_info[0]['tarticle'] : 0 );
													    // 			$trating 		 = number_format( ( !empty($otrating                   ) )? $otrating : 0 );   /*number_format($mem_info[0]['trating']); */ 
													    // 			$tfollower 		 = number_format( ( !empty($mem_info[0]['tfollower']   ) )? $mem_info[0]['tfollower'] : 0 );
													    // 			$tfollowing 	 = number_format( ( !empty($mem_info[0]['tfollowing']  ) )? $mem_info[0]['tfollowing'] : 0 );
													    // 			$tpercentage 	 = number_format( ( !empty($mem_info[0]['tpercentage'] ) )? $mem_info[0]['tpercentage'] : 0 );
													    // 			$tview 	         = number_format( ( !empty($mem_info[0]['tview']       ) )? $mem_info[0]['tview'] : 0 );  
													    // 			$aboutme 		 = ( !empty(  $mem_info[0]['aboutme']       ) ) ? $mem_info[0]['aboutme'] : null ;
													    // 			$firstname 		 = ( !empty(  $mem_info[0]['firstname']     ) ) ? ucfirst($mem_info[0]['firstname']) : null ;
													    // 			$fullname     	 = ( !empty(  $mem_info[0]['fullname']      ) ) ? ucfirst($mem_info[0]['fullname']) : null ;
													    // 			$middlename 	 = ( !empty(  $mem_info[0]['middlename']    ) ) ? ucfirst($mem_info[0]['middlename']) : null ;
													    // 			$lastname 		 = ( !empty(  $mem_info[0]['lastname']      ) ) ? ucfirst($mem_info[0]['lastname']) : null ;
													    // 			$gender 		 = ( !empty(  $mem_info[0]['gender']        ) ) ? $mem_info[0]['gender'] : null ;
													    // 			$nickname 		 = ( !empty(  $mem_info[0]['nickname']      ) ) ? $mem_info[0]['nickname'] : null ;
													    // 			$country 		 = ( !empty(  $mem_info[0]['country']       ) ) ? $mem_info[0]['country'] : null ;
													    // 			$state_ 		 = ( !empty(  $mem_info[0]['state_']        ) ) ? $mem_info[0]['state_'] : null ;
													    // 			$city 			 = ( !empty(  $mem_info[0]['city']          ) ) ? $mem_info[0]['city'] : null ;
													    // 			$zip 			 = ( !empty(  $mem_info[0]['zip']           ) ) ? $mem_info[0]['zip'] : null ;
													    // 			$occupation      = ( !empty(  $mem_info[0]['occupation']    ) ) ? $mem_info[0]['occupation'] : null ;
													    // 			$datejoined 	 = ( !empty(  $mem_info[0]['datejoined']    ) ) ? $this->date_format( $mem_info[0]['datejoined'] , '.' )   : null ;
													    // 			$logtime 	     = ( $mem_info[0]['logtime'] != '0000-00-00 00:00:00' ) ? $this->get_time_ago($mem_info[0]['logtime']) : '22 HOURS' ;




							      						?> 


							      						<!-- grey line -->
							      							


															<div class='modal-comment-grey-line' style="margin-top:5px;" > 
															</div> 	
	 
														<!-- grey rectangle  -->	

											      			<div id="new-look-modals-score-container"   >  
					  											<ul id="new-look-modals-footer-icons">	
					  											 	<li style="padding-left:2px;margin-top:3px;"> 	  
					  											 		<div   title="views (<?php echo "$member[tview]"; ?>) "   id="new-look-modals-views-icon" class='share_look_modals<?php echo $ano; ?>' onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '.share_look_modals<?php echo $ano; ?>' ,   '.share_look_modals<?php echo $ano; ?>' ,   '#dropdown_share<?php echo $ano; ?>' ) "  > 	
																		</div>    
																	</li>
																	<li style="width: 30px;padding-left:4px; font-family:'Avenir LT Std 35 Light' !important; color:#d2d0d0" >
																		<div onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , 'fs_member_profile_pic' , '<?php echo $member['mppno']; ?>' , 'VIEWS ( <?php echo "$member[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >  
																			<span><?php echo "$member[tview]"; ?></span>
																		</div> 
																	</li>
																	<li>  
																		<div title="looks (<?php echo $tlooks; ?>)" > 

																			<!-- <img src="<?php echo "$this->genImgs/member-icon-member-look.png"; ?>" class="member-modal-look-icon" >  --> 

																			<img 
																				src="fs_folders/images/modal/member/look-icon.png"   
																				id="member-modal-look-icon<?php echo $ano; ?>" 
																				class="member-modal-look-icon"
																				onmouseenter=" mousein_change_button ( '#member-modal-look-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/look-icon-mouse-over.png' )" 
																				onmouseleave="mouseout_change_button ( '#member-modal-look-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/look-icon.png' )"	 
																			/>    

																		</div> 
																	</li>
																	<li style="width: 28px;padding-left:6px; font-family:'Avenir LT Std 35 Light' !important; color:#d2d0d0"> 
																		<div id='look-score-text'  >
																			<?php echo  $tlooks; ?>
																		</div> 
																	</li>
																	<li>  
																		<div title="articles (<?php echo $tarticle; ?>) " >

																			<!-- <img src="<?php echo "$this->genImgs/member-icon-article.png"; ?>"  class="member-modal-article-icon" > -->
																			<img 
																				src="fs_folders/images/modal/member/article.png"   
																				id="member-modal-article-icon<?php echo $ano; ?>" 
																				class="member-modal-article-icon"
																				onmouseenter=" mousein_change_button ( '#member-modal-article-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/article-mouse-over.png' )" 
																				onmouseleave="mouseout_change_button ( '#member-modal-article-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/article.png' )"	 
																			/>    


																		</div>
																	</li>  		 
																	<li style="width: 30px;padding-left:6px; font-family:'Avenir LT Std 35 Light' !important; color:#d2d0d0" >
																		<div>
																			<?php echo $tarticle; ?>
																		</div>
																	</li>  
																	<li>  
																		<div title="media (<?php echo "$member[tmedia]"; ?>)" >

																			<!-- <img src="<?php echo "$this->genImgs/member-icon-media.png"; ?>" class="member-modal-media-icon" > -->

																			<img 
																				src="fs_folders/images/modal/member/media-icon.png"   
																				id="member-modal-media-icon<?php echo $ano; ?>" 
																				class="member-modal-media-icon"
																				onmouseenter=" mousein_change_button ( '#member-modal-media-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/media-icon-mouse-over.png' )" 
																				onmouseleave="mouseout_change_button ( '#member-modal-media-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/member/media-icon.png' )"	 
																			/>    

																		</div> 
																	</li>  
																	<li style="padding-left:6px; font-family:'Avenir LT Std 35 Light' !important; color:#d2d0d0"  id='modal-tshare-number' >
																		<div>
																			<?php echo "$member[tmedia]"; ?>
																		</div> 
																	</li>  



																	<li id='modal-flag-li' style="margin-top: -3px;margin-left: 13px;  " >    




																		<div id='ld_pencil'  >  
														 					<!-- <div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo  $table_id; ?>' onclick="flag ( 'fs-flag' , '<?php echo $table_name; ?>' , '<?php echo  $table_id ?>' , '#modal-flag-icon<?php echo  $table_id ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " > 	
																				<img src="<?php echo "$this->genImgs/$src_img_flag "; ?>"  style=' height:17px;  ' id='modal-flag-icon<?php echo   $table_id ?>'  title='flag' /> 
																			</div> --> 


																			<!-- <div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'action' , '<?php echo $table_name; ?>'  , '<?php echo $table_id; ?>' , 'imgid' , 'imgsrc' , 'modal-flag-dropdown' ) "  > 	 
																				<img src="<?php echo "$this->genImgs/$src_img_flag"; ?>"  style=' height:17px;  ' id='modal-flag-icon<?php echo $table_id; ?>'  title='more' /> 
																			</div>  
											 -->

																		 	<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'action' , '<?php echo $table_name; ?>'  , '<?php echo $table_id; ?>' , 'imgid' , 'imgsrc' , 'modal-flag-dropdown' ) "  > 	 
																				<img style='height: 17px;width: 17px;' src="fs_folders/images/modal/look/more-icon.png" id="modal-flag-icon<?php echo $ano; ?>" class="modal-flag-icon<?php echo $ano; ?>" onmouseenter=" mousein_change_button ( '.modal-flag-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/more-icon-dark.png' )" onmouseleave="mouseout_change_button ( '.modal-flag-icon<?php echo $ano; ?>', 'fs_folders/images/modal/look/more-icon.png' ) ">
																			</div>    

																			<!-- dropdown flag design  --> 
																				<div style="margin-left: -238px; margin-top: 9px; background-color:white" > 
											  										<?php  
											  											$this->fs_flag( 
											  												array(
											  													'type'=>'flag-modal-dropdown',
											  													'table_name'=>$table_name,
											  													'table_id'=>$table_id,
											  													'id'=>$table_id
											  												)
											  											);  
											  										?> 
										  										</div> 
														 				</div>   


														 				<!-- Not in used because updated to dropdown and update is in the top -->
																		<div class='hide' id="modal-flag-icon-member" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'fs-flag' , 'fs_member_profile_pic' , '<?php echo $profile_pic; ?>' , '#modal-flag-icon<?php echo $ano; ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " > 	
																			
																			<!-- <img src="<?php echo "$this->genImgs/$look_attr[src_img_flag]"; ?>" class="member-modal-flag-icon"  id='modal-flag-icon<?php echo $ano; ?>' title='more' />  -->
																		    <img 
																				src="fs_folders/images/modal/look/more-icon.png" 
																				id="modal-flag-icon<?php echo $ano; ?>" 
																				class="member-modal-flag-icon"
																				onmouseenter=" mousein_change_button ( '#modal-flag-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/more-icon-dark.png' )" 
																				onmouseleave="mouseout_change_button ( '#modal-flag-icon<?php echo $ano; ?>' , 'fs_folders/images/modal/look/more-icon.png' )"	 
																			    title='more' 
																			/>     


																		</div>   

																	</li>    
																	



																</ul>    
				  											</div>   

			  											<!-- grey line --> 
															<div class='modal-comment-grey-line<?php if($page == 'profile-tab-followers') { print('-1'); } else {  print(''); } ?>' style="margin-top:5px;" > 
															</div> 	

														<!-- comment  -->

								      						<?php      
															  	$comments =  $this->posted_modals_comment_Query ( 
															  		array(  

																	    'table_name'=> 'fs_member_profile_pic',
																	    'table_id'=> $member['mppno'], 
																	    'orderby'=> 'cno desc', 
																	    'limit_start'=> 0,
																	    'limit_end'=> 2, 
																	    'comment_query'=>'get-comment-modal'   
																  	)    
																); 

															  	$pltcomment = count($comments);  
																$tcomment = $this->member_profile_pic_query(  
												 		 		 	array( 
													 		 		 	'mppno'=> $member['mppno'],
													 		 		 	'type'=>'get-total-profile-comment'
												 		 		 	) 
												 		 		);  


																if (  $page == 'profile-tabs' ) { 
																	// echo " $page this is a page ";
																	$comment_style_1 = 'padding-top:3px;';
																}
																else if( $page == 'profile-tab-followers' ){  
																	$comment_style_2 = 'padding-top:3px;';
																}
																else{ 
																	// echo " not profile ";
																}  


																// echo " $comment_style_1  ";
																// echo " modal_version1_member ( $ano , $type=null  , $profilepath=null , $headerstyle=null ,  $page=null , $comment_style = null )";


								      						?>

												      		<div id="new-look-body-comment-container" style="<?php echo "$comment_style $comment_style_1"; ?>" >   
					      										<table border="0" cellpadding="0" cellspacing="0"  name='table7' > 
					      											<?php 
					      												if( $tcomment > 2 ):  
					      											?>
					      											<tr> 
					      												<td style="padding-bottom:5px;<?php echo "$comment_style_2"; ?>padding-left:2px;"> 
					      													<!-- <a href="lookdetails?id=<?php echo $plno; ?>#lbc_comments" style='text-decoration:none' >  -->
						      													<div style="cursor:pointer;color:#284372;font-family:arial; font-size:12px;  " > 
						      														<a href="<?php echo $user['username']; ?>-comments-member-123123" >
							      														<span style="font-family:'Avenir LT Std 35 Light' !important; color:#000000 " >View all <span style="font-family:'Avenir LT Std 85 Heavy' !important; color:#000000 "><?php echo "$tcomment  "; ?><span> comments	</span>
							      													</a>
							      												</div>
						      												<!-- </a> -->
					      												</td>
					      											<?php 

					      												$comment_style_2 = '';
					      											else:

					      												// this is style used when padding top when there is no view all comment

					      													$comment_style_container = 'padding-top:3px;';

					      											endif; ?>
					      											<tr> 


					      												<!-- comment container member -->
					      												<td style="padding-bottom:0px;<?php echo "$comment_style_2"; ?>" id="comment-container<?php echo $ano; ?>" style='' >  
						  													<?php   



						  													// 2014-07-22 12:41:25
						  													// 2014-07-22 00:23:16
						  													

						  													if ( $pltcomment > 0 ):  
						  														$textfield_style = 'padding-top:6px;'; 
							  													#from database lookcomment 
							  														// $len  = ($pltcomment < 3 ) ? $pltcomment : 2;    
							  													#from real comment count 
							  													$len  = (count($comments)  < 3 ) ? count($comments)  : 2;     
							  													for ($i=0; $i < $len ; $i++):     

																					$cno               = $comments[$i]['cno'];
																					$table_id          = $comments[$i]['table_id'];
																					$table_name        = $comments[$i]['table_name']; 
																					$mno_commentor     = $comments[$i]['mno']; 
																					$date              = $this->get_time_ago( $comments[$i]['date'] ); 
																					$comment           = $comments[$i]['comment']; 

																					$tlike             = $comments[$i]['tlike'];
																					$tdislike          = $comments[$i]['tdislike'];   
																					$fullname          = $this->get_full_name_by_id ( $mno_commentor ); 
																					   


												 									$response          = $this->posted_modals_rate_Query(  array(   'mno'=>$mno2,   'table_name'=>'fs_comment' ,   'table_id'=>$cno,   'rate_query'=>'get-user-rated-type') ); 
												 									




												 									// echo " tdislike $tdislike tlike $tlike cno = $cno ";



												 									$validate_comment  = ( !empty($response ) ) ? 'rated comment' : 'not rated comment' ;  
												 									// echo " this is the $response <br> 'mno'=>$mno2 <br> 'table_name'=>$table_name <br> 'table_id'=>$table_id <br> "; 
												 									// $b              = $this->get_your_look_comment_thumb_up_or_down( $mno , $cno );     
												 									$you_liked         = ( $response == 'like' ) ? 'comment-like-liked.png' : 'commen-like-unlike.png' ;
												 									$you_disliked      = ( $response == 'dislike' ) ? 'comment-dislike-disliked.png' : 'comment-dislike-un-disliked.png' ;  





												 									// $profile_pic = $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
												 									#comment print testing
												 									// $tlikes = '12,332'; 
												 									// $tdislike = '1,000';  

													 									// grey separotors of the two comments 

							 																if ( $i == 1 ) { echo " <div id='modal-comment-grey-separator-member' >  </div> "; }

												 									?>  
												 								 
											      										<ul style=" <?php echo $comment_style_container; ?> margin:none; border:1px solid none; " >
											      										 	<li> 
											      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno_commentor ,"$profilepath"."$this->ppic_thumbnail", null, '35px', '', '35px');  ?>
											      										 	</li>   
											      										 	<li style="width:228px;font-family:arial; font-size:12px;  " >
											      										 		<div style="margin-top:-2px;" >
												      										 		<div style="margin-left:7px;"  >
												      										 		 	<a href='<?php echo $username; ?>'> <b style="font-family:'Avenir LT Std 35 Light' !important; color:#225b99" > <?php echo $fullname; ?> </b></a> <span id='modal-comment-color' > <?php echo $this->cleant_text_print_from_db ( $comment ); ?></span>
												      										 		</div> 
												      										 		<div style="margin-left:7px; color:#d6051d"  >  

												      										 			<table border="0" cellpadding="0" cellspacing="0" style="width:auto;padding:none;margin:0px; " name='table8' > 
												      										 				<tr>  
												      										 					<td style='auto' > 
												      										 						<span style='color:#ccc;font-size:12px' > <?php echo "$date"; ?>   </span> 
												      										 					</td>
												      										 					<td style="padding-left:5px;" >  	
												      										 						<div style="margin-top:-1px;" >
													      										 						<!-- <img src="<?php echo "$this->genImgs/$you_liked"; ?>" id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' , '#modal-comment-tlike<?php echo $cno; ?>' )" />   -->

													      										 						<?php if($you_liked == 'commen-like-unlike.png') { ?> 
																															<!-- unliked --> 
																															<img 
																															    id='modal-comment-like<?php echo $cno; ?>'   
																																style='height:12px;cursor:pointer'
																																src="<?php echo "$this->genImgs/$you_liked"; ?>"
																																onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'like' ,  'comment-like-liked.png',   '#modal-comment-like<?php echo $cno; ?>'  ,'<?php echo $cno; ?>' , '#modal-comment-tlike<?php echo $cno; ?>' )"
																																onmousemove=" mousein_change_button ( '<?php echo "#modal-comment-like$cno"; ?>' , '<?php echo "$this->genImgs/comment-like-liked.png"; ?>')"  
																																onmouseout="mouseout_change_button (  '<?php echo "#modal-comment-like$cno"; ?>'  , '<?php echo "$this->genImgs/commen-like-unlike.png"; ?>' ) "
																															/>  
																															<!-- 'comment-like-liked.png' : 'commen-like-unlike.png'  --> 
																														<?php  } else { ?>  
																															<!-- liked -->
																															<img src="<?php echo "$this->genImgs/$you_liked"; ?>" id='modal-comment-like<?php echo $cno; ?>' style='height:12px;cursor:pointer'/>  
																														<?php } ?>   
												      										 						</div>
												      										 					</td>
												      										 					<td style=" color: #d2d0d0;font-size:12px;padding-left:5px; font-family: 'Avenir LT Std 35 Light' !important;" id="modal-comment-tlike<?php echo $cno; ?>" >  <?php echo "$tlike";  ?> </td>
												      										 					<td style="padding-left:5px;" > 
												      										 						<div style="margin-top:2px;" >
												      										 							<!-- <img src="<?php echo "$this->genImgs/$you_disliked"; ?>" id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer' onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' , '#modal-comment-tdislike<?php echo $cno; ?>' )"   /> --> 
												      										 							<?php if($you_disliked == 'comment-dislike-un-disliked.png') { ?> 
																														<!-- unlike unliked -->
																																<img 
																																    id='modal-comment-dislike<?php echo $cno; ?>' 
																																 	style='height:12px;cursor:pointer'
																																	src="<?php echo "$this->genImgs/$you_disliked"; ?>" 
																																	onclick="modal_comment_like_dislike( '<?php echo $mno2; ?>' , '<?php echo $cno; ?>' , 'fs_comment' , 'dislike' ,  'comment-dislike-disliked.png' , '#modal-comment-dislike<?php echo $cno; ?>' ,  '<?php echo $cno; ?>' , '#modal-comment-tdislike<?php echo $cno; ?>' )" 
																																	onmousemove=" mousein_change_button ( '<?php echo "#modal-comment-dislike$cno"; ?>' , '<?php echo "$this->genImgs/comment-dislike-disliked.png"; ?>')"  
																																	onmouseout="mouseout_change_button (  '<?php echo "#modal-comment-dislike$cno"; ?>'  , '<?php echo "$this->genImgs/comment-dislike-un-disliked.png"; ?>' ) "
																																/>  
																															<?php  } else { ?>  
																																<!-- unlike liked -->
																																<img src="<?php echo "$this->genImgs/$you_disliked"; ?>" id='modal-comment-dislike<?php echo $cno; ?>'  style='height:12px;cursor:pointer' />
																														<?php } ?>   



												      										 						</div> 
												      										 					</td>
												      										 					<td style="color:#d2d0d0;font-size:12px;padding-left:5px;" id="modal-comment-tdislike<?php echo $cno; ?>" > <?php echo "$tdislike"; ?>  </td>
												      										 			</table>   
												      										 		</div>
												      										 	</div> 
											      										 	</li>   
											      										</ul>    
											      										<div style="display:none" >
											      											<input type="text" value="<?php echo $validate_comment; ?>" id="rate-comment-stat<?php echo $cno; ?>"  /> 
											      										</div>
											      										<?php if ( $i < $len-1 ) { ?>
													 										<div style="clear:both; height:6px;border:1px solid none;" > 
																							</div> 
																						<?php } ?>
											      									<?php 
										      									endfor;    
										      								else:

										      									// this style used when there is no comment

										      										$textfield_style = 'padding-top:2px;'; 

										      						 		endif;   
										      						 		?>   
									      						 		</td> 
									      							<tr> 
									      						 		<td style="display:none" >
									      						 			<center><?php $this->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test$ano" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
									      						 		</td>
							      						 			<tr> 
								      									<td style="padding-bottom:5px; <?php echo $textfield_style; ?> " >  
								      										<ul style="border:1px solid none;" >
								      										 	<li> 
								      										 		<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno2 , "$profilepath"."$this->ppic_thumbnail" , null , '35px;', '', '35px;'  );   ?>
								      										 	</li>   
								      										 	<li style="width:225px;font-family:arial; font-size:12px;" > 	 
								      										 		<div style="margin-left:5px;"  > 
								      										 			<input id="modal-comment-field<?php echo $ano; ?>" type="text" placeholder='Leave a comment' style=" border:1px solid #e2e2df; height:35px; width:228px; padding-left:5px; font-family: 'Avenir LT Std 35 Light' !important; color: #d2d0d0 !important;"     onkeyup="modal_comment_send ( '<?php echo $mno2; ?>' , '<?php echo $member["mppno"]; ?>' , 'fs_member_profile_pic' , '<?php echo $ano; ?>' , event , 'feed' , 'comment-container<?php echo $ano; ?>' , '#modal-comment-loader-test<?php echo $ano; ?>' )"  >
								      											 	</div>     
								      										 	</li>  
								      										</ul>   
								      									</td>
					      										 </table>
					      									</div>   


			      									</td>
			      							</table>     
			      						</div>
			      					</td>  
			      				</table>
			      			</div>
			      			<div style="height:15px;" > 
			      			</div> 
		      			</div>
      				<?php 
      			}
      			public function modal_version1_ads( $admno , $adsno , $link , $desc , $action , $type=null ) { 

      				$ads_loc = 'fs_folders/images/ads'; ?> 
      				<li >  
	      				<div id="modals_version1_member_main_wrapper" >  
		      				<table border="0" cellpadding="0" cellspacing="0" >
		      					<tr> 
		      						<td style="padding-bottom:9px;" > 

		      							<?php  
 											$this->new_modals_header( $admno , $action ,  null , $type );   
		      							?>  
		      						</td>
		      					<tr> 
	      						<td style="border:1px solid #e2e2df; border-radius:5px; background:white;" >  
	      							<div style="margin-top:0px;  " >   

		      							<table border="0" cellpadding="0" cellspacing="0" style=" height:200px;" >
		      								<?php if ( empty($type)) { ?>
		      								<tr> 
		      									<td style="display:none" > 
		      										<div style="margin-left:6px;margin-top:0px;width:269px;color:#d2d0d1;text-align:left;font-size:12px;font-family:arial;border:1px solid none; padding-bottom:5px;  " >
	      												<?php //echo  $desc; ?>
	      											</div> 
		      									</td>
		      								<?php } ?>
		      								<?php if ( !empty($adsno)) { ?>
		      								<tr>
		      									<td>
						      						<div style="margin-left:6px;border:1px solid none; padding-bottom:0px; width:270px;"  > 
							      						<a href="<?php echo "$link"; ?>" target='_blank' >  
															<img  src='<?php echo "$ads_loc/$adsno.jpg";?>' style='width:100%' /> 
														</a>

						      						</div>
		      									</td>
		      								<?php } ?>
		      								<tr> 	
		      									<td style="padding-left:6px;background-color:#f6f7f8; margin-bottom:4px; border-radius:0px 0px 5px 5px; " >   
	      											<div style="margin-top:5px;padding-bottom:4px;  "  >  
	      												<?php 
	      												switch ( $type ) {
	      													case 'instagram': ?>
	      															<center> 
											 			 			 	<script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="http://instagramfollowbutton.com/components/instagram/v2/js/ig-follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
								 										<span class="ig-follow" data-id="9b763ae9dc" data-count="true" data-size="medium" data-username="true"></span> 
																	</center><?php 
	      														break;
	      													case 'facebook':  ?> 
																	<script>(function(d, s, id) {
																	  var js, fjs = d.getElementsByTagName(s)[0];
																	  if (d.getElementById(id)) return;
																	  js = d.createElement(s); js.id = id;
																	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=528594163842974";
																	  fjs.parentNode.insertBefore(js, fjs);
																	}(document, 'script', 'facebook-jssdk'));</script> 
																	<div class="fb-like" style="position:relative;z-index:300" data-href="https://www.facebook.com/FASHIONSPONGE" data-width="200" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>  
	      													<?php 
	      														break;
	      													case 'twitter': ?> 
		      													<center> 
															   		<a href="https://twitter.com/FashionSponge" class="twitter-follow-button" data-show-count="false">Follow @FashionSponge</a>
								                 				 	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								                 				</center> 
								                 				<?php 
	      														break;
	      													case 'contest': ?> 
	      															<div  style="margin-top:-4px;">
	 														 
	      															  	<iframe src="https://cdns.snacktools.net/bannersnack/embed_https.html?hash=bzu9eukp&userId=12633936&wmode=transparent&clickTag=http%3A%2F%2Fwww.fashionsponge.com%2Fpost-contest&t=1402830339" width="270" height="250" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
	 															 		<!-- <iframe src="https://cdns.snacktools.net/bannersnack/embed_https.html?hash=bzpiglsa&userId=12633936&bgcolor=%23FFFFFF&wmode=opaque&clickTag=http%3A%2F%2Fwww.fashionsponge.com%2Fpost-contest&t=1402593918" width="270" height="250" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe> -->
 																	</div>
								                 				<?php 
	      														break;   
	      													default:  ?> 
	      															<div style="display:none" > 
							      										<center>  
								      											<a href="<?php echo "$link"; ?>" target='_blank'  >
								      												<img src="<?php echo "$this->genImgs/ads-signup-button.png"; ?>" />
								      											</a> 
							      										</center>
						      										</div>
						      										<?php 
							      										if ( !empty($desc) ) {
							      											echo "<div style='margin-left:6px;margin-top:0px;width:269px;color:#284372;text-align:left;font-size:12px;font-family:arial;border:1px solid none; padding-bottom:5px;' >$desc;</div>";
							      										}  
	      														break;
	      												}  ?>
	      											</div>	
		      									</td> 
		      							</table>     
		      						</div>
		      					</td>  
		      				</table>
		      			</div>
		      			<div style="height:15px;" > 
		      			</div>
		      		</li> 
      				 <?php 
      			}   
				public function share_modal_dropdown( $array ) {   

					$modal['table_name']  = ( !empty($array['table_name']))  ? $array['table_name'] : 0 ;  
					$modal['table_id']    = ( !empty($array['table_id']))    ? $array['table_id'] : 0 ;  
					$modal['id']          = ( !empty($array['id']))  		 ? $array['id'] : 0 ;   
					$modal['type']        = ( !empty($array['type']))  		 ? $array['type'] : '' ;   
					$modal['page']        = ( !empty($array['page']))  		 ? $array['page'] : '' ;   
					$modal['about']       = ( !empty($array['about']))  	 ? $array['about'] : '' ;   
					$modal['title']       = ( !empty($array['title']))       ? $array['title'] : '' ;   
					$modal['name']        = ( !empty($array['name']))  	     ? $array['name'] : '' ;   
					$modal['picture']     = ( !empty($array['picture']))     ? $array['picture'] : '' ;   
					$modal['link']        = ( !empty($array['link']))  	  	 ? $array['link'] : '' ;   
					$modal['description'] = ( !empty($array['description'])) ? $array['description'] : '' ;   

						switch ( $modal['type'] ) {
							case 'details': ?>
									<div style="position: absolute; margin-top: -4px; margin-left: -306px; z-index: 120; display: none; padding-top: 5px;"  id="dropdown_share<?php echo $modal['id']; ?>"     onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '#dropdown_share<?php echo $modal['id']; ?>' ,   '#dropdown_share<?php echo $modal['id']; ?>' ,   '.new-look-mousover-desc-title-container<?php echo $modal['id']; ?> , #dropdown_share<?php echo $modal['id']; ?>' )" >
										<!-- <div style="position: absolute; margin-top: -15px; margin-left: -168px; z-index: 120; display: block;" id="dropdown_share<?php echo $modal['id']; ?>" > -->
										<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals<?php echo $modal['id']; ?>'  style='width:269px; height:55px; '  name='table6' />    
										<table border="0" cellpadding="5" cellspacing="0" style="position:absolute;margin-top:20px;margin-left:30px;"  onclick="return false" > 
											<tr> 
												<td  style="padding-left:0px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"                         onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','facebook','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"                          onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','twitter','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"                           onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','tumblr','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_q.png"    title = "pinterest"                        onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','pinterest','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" > <a href="#"  																										    onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','google_plus','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  ><img  style="width:20px" src="fs_folders/images/attr/ld_white_g+.png"   title = "google+" > </a> </td>   
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_line.png" title = "stumbleupon"  					    onclick=" stuble_upon( <?php echo $modal['table_id']; ?> )"  ></td> 
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_mail.png" title = "email"							    onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','gmail','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  >
										</table>   
									</div>  <?php  
								break;  
							case 'pageinfo-to-retrieved-social-share': 
									echo "<div style='display:none'>";
										if ( $modal['table_name'] == 'postedlooks' ): ?>  

											<h1 itemprop="name"><?php echo $modal['title']; ?></h1> 
										  	<img itemprop="image" src="<?php echo "http://".$this->attribute['url_extention']."fashionsponge.com/fs_folders/images/uploads/posted%20looks/lookdetails/$modal[table_id].jpg"; ?>"></img>
										  	<p itemprop="description"><?php echo $modal['description']; ?></p> 

										<?php elseif ( $modal['table_name'] == 'signup'  ): ?>

											<h1 itemprop="name"><?php echo $modal['title']; ?></h1> 
										  	<img itemprop="image" src="<?php echo "http://".$this->attribute['url_extention']."fashionsponge.com/fs_folders/images/genImg/collage.jpg"; ?>"></img>
										  	<p itemprop="description"><?php echo $modal['description']; ?></p>

										<?php else:  ?>  

										  	<h1 itemprop="name"><?php echo $modal['title']; ?></h1> 
										  	<img itemprop="image" src="<?php echo "http://".$this->attribute['url_extention']."fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/$modal[table_id].jpg"; ?>"></img>
										  	<p itemprop="description"><?php echo $modal['description']; ?></p>

										<?php 
										endif;

									echo "</div>"; 
								break; 
							default: ?>
									<div style="position:absolute;border:1px solid none; margin-top:-10px; z-index:120; display:none; padding-top:5px; " id="dropdown_share<?php echo $modal['id']; ?>"     onmouseover="mouseOver_elemShow_mouseOut_elemHide(  '#dropdown_share<?php echo $modal['id']; ?>' ,   '#dropdown_share<?php echo $modal['id']; ?>' ,   '.new-look-mousover-desc-title-container<?php echo $modal['id']; ?> , #dropdown_share<?php echo $modal['id']; ?>' )" >
										<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals<?php echo $modal['id']; ?>'  style='width:269px; height:55px; '  name='table6' />    
										<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;margin-top:-36px; margin-left:40px;"  onclick="return false" > 
											<tr> 
												<td  style="padding-left:0px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"    onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','facebook','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"     onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','twitter','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"      onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','tumblr','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    	  src="fs_folders/images/attr/ld_white_q.png"    title = "pinterest"   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','pinterest','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ></td>  
								            <td  style="padding-left:7px;cursor:pointer" > <a hre="#" 																					 	   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','google_plus','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  ><img  style="width:20px" src="fs_folders/images/attr/ld_white_g+.png"   title = "google+" > </a> </td>   
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_line.png" title = "stumbleupon"     onclick=" stuble_upon( <?php echo $modal['table_id']; ?> )"  ></td> 
								            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_mail.png" title = "email" 		   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','gmail','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  >
										</table>   
									</div><?php 
								break;
						}   

				}    

			#END MODALS 
		// N
      		#NEW NOTIFICATION   
      			public function get_user_participated( $action , $table_name , $table_id ) {
      				$response = '';
      				switch ( $action ):

						case 'dripped':  
	  							$response =  $this->fs_drip_modals_Query ( 
	  								array(                 
							          	'limit_start'=>0, 
							          	'limit_end'=>100,
							          	'query_where'=>"table_id = $table_id and table_name = '$table_name' ", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function
							          	'query_order'=>'dmno desc', 
							          	'query_drip'=>'get-all-user-dripped' 
							      	) 
							    );   
							break;
						case 'rated':   
							$response = $this->posted_modals_rate_Query(
								array( 
									'table_name'=>"$table_name" , 
									'table_id'=>$table_id, 
									'orderby'=>'rmno desc',
									'limit_start'=>0,  
									'limit_end'=>100, 
									'rate_query'=>'get-modal-rates' 
								)
							); 
							break;
						case 'favorited':    
								      
						        $response =  $this->fs_favorite_modals_Query ( 
						        	array(      
							            'limit_start'=>0, 
							            'limit_end'=>100,
							            'query_where'=>"table_id = $table_id and table_name = '$table_name' ", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function
							            'query_order'=>'fmno asc', 
							            'query_favorite'=>'get-all-user-favorite' 
							        )
						        ); 
 
							break; 
						default:  
							break;   
					endswitch;  
					return $response; 
      			}
      			public function set_more_participants ( $data , $action ) { 
      				$response = '';
      				$len      = count($data);
      			 	// $tp      = $total_participants; //$total_participants  


      				// echo " total len $len <br>";

      				if ( $len < 3 ):   
      					for ( $i=0; $i < $len ; $i++ ):
	      					$mno = $data[$i]['mno'];  
	      					$participant = $this->get_full_name_by_id ( $mno );    
		      				if ( $i < 1 ):
	      						$response .= " <b>$participant</b> and "; 
	      					else:
	      						$response .= " <b>$participant</b>";
	      						$i = $len;
	      					endif; 
	      				endfor;   
	      				$response .= " <span class='fs-text-red' >$action</span> "; 
      				else:
	      				for ( $i=0; $i < $len ; $i++ ):
	      					$mno = $data[$i]['mno'];  
	      					$participant = $this->get_full_name_by_id ( $mno );    
		      				if ( $i < 1 ):
	      						$response .= " <b>$participant</b> , ";
	      					else:
	      						$response .= " <b>$participant</b>";
	      						$i = $len;
	      					endif; 
	      				endfor;  
	      				$len -= 2;
	      				$response .= " and <b>$len</b> other people <span class='fs-text-red' >$action</span> "; 
	      			endif; 
	      			return $response;
      			}  
	      		public function generate_image_subject_notification( $table_name , $table_id , $path ) {

	      			$noti_subject_img  = ''; 
	      			// echo " $table_name ";
	  		 		switch ( $table_name ) { 
						case 'fs_members':   
								$mno = $this ->member_profile_pic_query( array('mno'=>968 , 'type'=>'get-mppno-by-mno' ) );  
								// echo " $mno ";
								$this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $table_id , $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;' );
							break;
						case 'postedlooks': 
							 	echo "<img src='fs_folders/images/uploads/posted looks/thumbnail/$table_id.jpg' style='width:40px;height:auto'  />"; 
							break;
						case 'fs_postedmedia': 
								echo "<img src='fs_folders/images/uploads/posted media/thumbnail/$table_id.jpg' style='width:40px;height:auto'  />";  
							break;
						case 'fs_postedarticles': 
								echo "<img src='fs_folders/images/uploads/posted articles/thumbnail/$table_id.jpg' style='width:40px;height:auto'  />";  
							break; 
						case 'fs_member_profile_pic':  
								$mno = $this->member_profile_pic_query(  array( 'mppno' => $table_id , 'type'=>'get-specific-mno-by-mppno' ) ); 
								// echo " mno = $mno";
							 	$noti_subject_img = $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $mno , $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;' );
							break;
						case 'fs_member_timeline': 
								echo "<img src='fs_folders/images/uploads/profiletimeline/profile_timeline_thumbnail/$table_id.jpg' style='height:20px; width:40px;'  />";   
							break;
						default: 
								  $noti_subject_img = null;	
							break;  		
					}   
					// return $noti_subject_img;   
				}
				public function set_notification_info( $table_name , $table_id , $action , $action1 , $action2 , $status , $noti_type=null , $mno2=null , $comment=null )  {    
						$_SESSION['noti_table_name']  = $table_name;  # table name
						$_SESSION['noti_table_id']    = $table_id;    # table id
						$_SESSION['noti_action']      = $action;      # action who particiapte 
						$_SESSION['noti_action1']     = $action1;     # action who particiapte from owner
						$_SESSION['noti_action2']     = $action2;     # action who particiapte from your modal
						$_SESSION['noti_mno2']        = $mno2;        # owner of the modal
				 		$_SESSION['noti_status']      = $status;      # status 1 or 0 viewed or not
				 		// $_SESSION['noti_link']     = $noti_link;    
				 		$_SESSION['noti_type']        = $noti_type;   # kind of participation like: rating , commenting and so on.
				 		$_SESSION['noti_comment']     = $comment;     # comment 
				} 	 
				public function set_session_notification( $mno , $table_name , $table_id , $action , $comment='', $type='' , $status=0 ) {     
				  // echo "  set_session_notification( $mno , $table_name , $table_id , $action , $comment='', $type=null , $status=0 )  "; 
					// $data = $this->get_user_participated( $action , $table_name , $table_id ); 

					$len = ( !empty($data) ) ? count($data) : 0;  


					// echo " len $len <br> ";

					if ( $len > 1 ):   
						// jesus , rico and 1 other   
						$people = $this->set_more_participants ( $data , $action );  
						#echo " tablename $table_name tableid = $table_id <br>"; echo " owner of the modal mno =  ".$this->get_modal_owner( $table_name , $table_id ); 
						$modalownername           =   $this->get_full_name_by_id ( $this->get_modal_owner( $table_name , $table_id ) );  
						$particaptedname          =   $this->get_full_name_by_id ( $mno );
						$modaltype                =   $this->get_modal_type( $table_name , $table_id );   
						$gender                   =   $this->get_gender( $this->get_modal_owner( $table_name , $table_id ) );   
						$noti_participated        =  "$people on <b>$modalownername</b> $modaltype "; 
						$noti_participated_owner  =  "<b>$particaptedname</b> <span class='fs-text-red' >$action</span> on $gender own $modaltype $comment ";
						$noti_owner               =  "$people on your $modaltype";     
						$this->set_notification_info( $table_name , $table_id , $noti_participated , $noti_participated_owner , $noti_owner , $status ,  $type );  
					else: 
						// echo "  owner = ".$this->get_modal_owner( $table_name , $table_id );
						$modalownername           =   $this->get_full_name_by_id ( $this->get_modal_owner( $table_name , $table_id ) ); 
						$particaptedname          =   $this->get_full_name_by_id ( $mno );
						$modaltype                =   $this->get_modal_type( $table_name , $table_id );   
						$gender                   =   $this->get_gender( $this->get_modal_owner( $table_name , $table_id ) );  
						$comment                  =   ( !empty($comment)) ? " \"<span style='color:black' >$comment</span>\" ": null ;  
						$noti_participated        =  "<b>$particaptedname</b> <span class='fs-text-red' >$action</span> on <b>$modalownername</b> $modaltype $comment ";

						if ( $type == 'change-profile' ):
							$noti_participated_owner  =  "<b>$particaptedname</b> <span class='fs-text-red' >$action</span> $gender $modaltype"; 
						else:
							$noti_participated_owner  =  "<b>$particaptedname</b> <span class='fs-text-red' >$action</span> on $gender own $modaltype $comment ";
						endif;   

						$noti_owner                   =  "<b>$particaptedname</b> <span class='fs-text-red' >$action</span> on your $modaltype $comment ";     
						$this->set_notification_info( $table_name , $table_id , $noti_participated , $noti_participated_owner , $noti_owner , $status ,  $type );  
					endif;  
				} 
				public function send_notification_to_follower($mno) {    
				 

					echo "send_notification_to_follower($mno)";
					$noti_table_name   = ( !empty($_SESSION['noti_table_name']))    ? $_SESSION['noti_table_name'] : null ;  // = 'postedlooks'; // table name of the modal 
	 				$noti_table_id     = ( !empty($_SESSION['noti_table_id']))      ? $_SESSION['noti_table_id'] :   null ;   // =  12; // id of the modal
	 				$noti_action       = ( !empty($_SESSION['noti_action']))        ? $_SESSION['noti_action'] :     null ;   // = 'Just rated a look';  // action 
	 				$noti_action1      = ( !empty($_SESSION['noti_action1']))       ? $_SESSION['noti_action1'] :    null ;   // = 'Just rated a look';  // action 
	 				$noti_action2      = ( !empty($_SESSION['noti_action2']))       ? $_SESSION['noti_action2'] :    null ;   // = 'Just rated a look';  // action  
	 				$noti_mno2         = ( !empty($_SESSION['noti_mno2']))          ? $_SESSION['noti_mno2'] :       null ;  // = 134; // owner of the modal
	 				$noti_link         = ( !empty($_SESSION['noti_link']))          ? $_SESSION['noti_link'] :       null ;   // = 0; // link to redirect when notification clicked
	 				$noti_status       = ( !empty($_SESSION['noti_status']))        ? $_SESSION['noti_status'] :     null ;   // = 0; // status of noti 
	 				$noti_type         = ( !empty($_SESSION['noti_type']))          ? $_SESSION['noti_type'] :       null ;   // = 0; // status of noti 
	 				$noti_comment      = ( !empty($_SESSION['noti_comment']))       ? $_SESSION['noti_comment'] :    null ;   // = 0; // status of noti  
	 				$noti_manual       = ( !empty($_SESSION['manual']))             ? $_SESSION['manual'] :          false ;   // = 0; // status of noti  
	 				$noti_fullName     = ( !empty($_SESSION['fullName']))           ? $_SESSION['fullName'] :        false ;   // = 0; // set this for only change name

	 				echo "inside public function $noti_type     <br>";
	 				$noti_multiple     = false;

	 				# send notification test 
					if ( !empty( $noti_table_name ) ) {  

						$mno2              = $this->get_modal_owner( $noti_table_name , $noti_table_id ); 
						$noti_mno2         = $mno2;
						$doing_action_name = ( !empty($mno) ) ? $this->get_full_name_by_id ( $mno ) :  null ;  
						$ownername         = ( !empty($noti_mno2) ) ? $this->get_full_name_by_id ( $noti_mno2 ) :  null ;     
   						$noti_link         = $this->set_link( $noti_table_name , $noti_table_id ); 


   						echo " <br> [current login user]: $doing_action_name id = $mno <br>";
   						echo " [modal owner]:  $ownername id = $mno2 <br>";
   						echo " [notification type ]: $noti_type  <br>";
   						echo " noti action = $noti_action <br>"; 


   						//check here person already recieved a multiple notification

   							if($noti_multiple == TRUE) { 
   								// delete specific notification of a modal for a specific user
   								// change notification to jeesus rated, liked and more .. a loook by jesus   
							} else { 
								// no action executed
							} 

   						//send notification to owner, participants and followers.


							switch ( $noti_type ) {
								case 'join-fb':   
										#notification join-fb 
											$friends = $this->get_fb_freinds_on_fs( $mno , '-+-' ); // get fb friend list 
											// print_r($friends);
											echo " get all friends on fs <br>"; 
											echo " set look to send notification <br>";  
											$action = "your facebook friend <b>$doing_action_name</b> just <span class='fs-text-red'> joined </span>";  

											for ($i=0; $i < count($friends)-1 ; $i++):
												$mno1 = $friends[$i];   

												echo " friend id = $mno1 <br>";

												$response =  $this->posted_modals_notification_Query ( 
												    array(     
												      'mno'=>$noti_table_id,          // made the action 
												      'table_name'=>$noti_table_name, // table name 
												      'table_id'=>$noti_table_id,     // subject displayed in the right side 
												      'action'=>$action,              // action of the comment with colors
												      'mno1'=>$mno1,                  // the receiver of the notification 
												      'mno2'=>$noti_mno2,             // owner of the modal 
												      'link'=>$noti_link,             // link of the comment
												      'type'=>'join-fb',              // type of the notifaction
												      'status'=>$noti_status,         // status of the notification always set = 0
												      'notification_query'=>'notification-insert'  
												    ) 
												);   
											endfor;
										# first notification either welcome message or etc sent to new member. . . 
										# get all fb frriends in mno 
										# set loop to send the notification
									break;
								case 'join-fs': 

										# first notification either welcome message or etc sent to member. . .  
									break;
								case 'change-profile':    
										$action = "<b>$doing_action_name</b> <span class='fs-text-red'> updated </span> his profile picture.";  
										$followers = $this->get_all_follower( $mno );  




										for ($i=0; $i < count($followers) ; $i++):
											$mno1 = $followers[$i]['mno'];  
											 $response =  $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno,                    // made the action 
											      'table_name'=>$noti_table_name, // table name 
											      'table_id'=>$noti_table_id,     // subject displayed in the right side 
											      'action'=>$action,              // action of the comment with colors
											      'mno1'=>$mno1,                  // the receiver of the notification 
											      'mno2'=>$noti_mno2,             //owner of the modal 
											      'link'=>$noti_link,             // link of the comment
											      'type'=>'change-profile', 
											      'status'=>$noti_status,         // status of the notification always set = 0
											      'notification_query'=>'notification-insert'  
											    ) 
											  );  
											$this->message( "notification succesfully"  , $response , " added to $mno1 " );  

										endfor;     
									break; 
								case 'change-profile-cover-photo':  

 
										$noti_link   = $this->set_link( 'fs_members' , $mno );    
										$action = "<b>$doing_action_name</b> <span class='fs-text-red'> updated </span> his cover picture.";  	
										 

										$followers = $this->get_all_follower( $mno );  
										for ($i=0; $i < count($followers) ; $i++):
											$mno1 = $followers[$i]['mno'];  
											 $response =  $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno,                    // made the action 
											      'table_name'=>$noti_table_name, // table name 
											      'table_id'=>$noti_table_id,     // subject displayed in the right side 
											      'action'=>$action,              // action of the comment with colors
											      'mno1'=>$mno1,                  // the receiver of the notification 
											      'mno2'=>$noti_mno2,             //owner of the modal 
											      'link'=>$noti_link,             // link of the comment
											      'type'=>'change-profile-cover-photo', 
											      'status'=>$noti_status,         // status of the notification always set = 0
											      'notification_query'=>'notification-insert'  
											    ) 
											  );  
											$this->message( "notification succesfully"  , $response , " added to $mno1 " );  
										endfor;  
									break;  
								case 'change-name':


										echo " Im in the notification page ready to send the notification now";
										$noti_link   = $this->set_link( 'fs_members' , $mno );   
									 
											$action = "<b>$doing_action_name</b> <span class='fs-text-red'> Change </span> " . $this->get_gender( $mno ) . " name to $noti_fullName";
										 
										$followers = $this->get_all_follower( $mno );  
										for ($i=0; $i < count($followers) ; $i++):

											$mno1 = $followers[$i]['mno'];    
											echo "mno = $mno1 <br>";

											$response =  $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno,                    // made the action 
											      'table_name'=>$noti_table_name, // table name 
											      'table_id'=>$noti_table_id,     // subject displayed in the right side 
											      'action'=>$action,              // action of the comment with colors
											      'mno1'=>$mno1,                  // the receiver of the notification 
											      'mno2'=>$noti_mno2,             //owner of the modal 
											      'link'=>$noti_link,             // link of the comment
											      'type'=>'change-profile-cover-photo', 
											      'status'=>$noti_status,         // status of the notification always set = 0
											      'notification_query'=>'notification-insert'  
											    ) 
											  );  
											$this->message( "notification succesfully"  , $response , " added to $mno1 " );  
										endfor;   
									break;
								case 'following': 
										# sent following notification to whome he/she followed.
										# initialized  
			 								$noti_action = " <b>$doing_action_name</b> started <span class='fs-text-red'  > following </span> you";   
			 								$noti_link = $this->get_username_by_mno( $mno );  
		 								# insert notification 
			 								$response =  $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno, 
											      'table_name'=>$noti_table_name,
											      'table_id'=>$noti_table_id,
											      'action'=>$noti_action, // for action first
											      'mno1'=>$noti_mno2,  // 
											      'mno2'=>$noti_mno2,
											      'link'=>$noti_link,
											      'type'=>'following',
											      'status'=>$noti_status,
											      'notification_query'=>'notification-insert'  
											    ) 
											);    
									break; 			
								case 'rate_comment':    
									echo " rate comment in   $noti_table_name , $noti_table_id ";
										$noti_mno2   = ( !empty($_SESSION['noti_mno2']))          ? $_SESSION['noti_mno2'] :       null ;  // = 134; // owner of the modal 
										if ( $mno != $noti_mno2 ): // not your comment
											# $noti_mno2  => owner of the comment
											# $mn0 =>  participant  
											$participant = $this->get_full_name_by_id ( $mno );  
											$action    = " <b>$participant</b> <span class='fs-text-red'>$noti_action</span> your comment. \"<span style='color:black' >$noti_comment</span>\" ";  // action
										 

											$response = $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno, 
											      'table_name'=>$noti_table_name,
											      'table_id'=>$noti_table_id,
											      'action'=>$action, // for action first
											      'mno1'=>$noti_mno2, // reciever 
											      'mno2'=>$noti_mno2, // owner
											      'link'=>$noti_link,
											      'status'=>$noti_status,
											      'notification_query'=>'notification-insert'  
											    ) 
											);     
										endif; 
										// $this->message( ' comment rating ', $response , ' ' );
									break;	 

								case 'rate-modal':


										echo " rate mpdal in $noti_table_name , $noti_table_id ";
										$noti_mno2   = ( !empty($_SESSION['noti_mno2']))          ? $_SESSION['noti_mno2'] :       null ;  // = 134; // owner of the modal 
										if ( $mno != $noti_mno2 ): // not your comment
											# $noti_mno2  => owner of the comment
											# $mn0 =>  participant  
											$participant = $this->get_full_name_by_id ( $mno );  
											$action    = " <b>$participant</b> <span class='fs-text-red'>$noti_action</span> your $noti_table_name";  // action
										 

											$response = $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno, 
											      'table_name'=>$noti_table_name,
											      'table_id'=>$noti_table_id,
											      'action'=>$action, // for action first
											      'mno1'=>$noti_mno2, // reciever 
											      'mno2'=>$noti_mno2, // owner
											      'link'=>$noti_link,
											      'status'=>$noti_status,
											      'notification_query'=>'notification-insert'  
											    ) 
											);     
										endif; 
										// $this->message( ' comment rating ', $response , ' ' ); 
									break;	 
								case 'flagged':



										echo "post is being flagged <br>";
										$participant = $this->get_full_name_by_id ( $mno );  
										$action    = " <b>$participant</b> <span class='fs-text-red'>$noti_action</span> Now";  // action
										 

										$response = $this->posted_modals_notification_Query ( 
											    array(     
											      'mno'=>$mno, 
											      'table_name'=>$noti_table_name,
											      'table_id'=>$noti_table_id,
											      'action'=>$action, // for action first
											      'mno1'=>$noti_mno2, // reciever 
											      'mno2'=>$noti_mno2, // owner
											      'link'=>$noti_link,
											      'status'=>$noti_status,
											      'notification_query'=>'notification-insert'  
											    ) 
											);      
									break;
								default: 
										#get owner of the modal  
								
			 								# initialize    

				 								$noti_link   = $this->set_link( $noti_table_name , $noti_table_id );     
			 								# filter with tables  action 
				 								// 	switch ( $noti_table_name ):
													// 	case 'fs_members':        
													// 			#comment
													// 			$action =  "<b>$doing_action_name</b>  $noti_action  profile of <owner><b>$ownername</b></owner>";
													// 			$modaltype = 'profile pic'; 
													// 		break;
													// 	case 'postedlooks':    
													// 			#rate , dripped , favorite , #comment
													// 			$action =  "<b>$doing_action_name</b>  $noti_action a look by <owner><b>$ownername</b></owner>"; 
													// 			$modaltype = 'look'; 
													// 		break;
													// 	case 'fs_postedmedia':  
													// 			#dripped , favorite, #comment
													// 			 $action =  "<b>$doing_action_name</b>  $noti_action a media by <owner><b>$ownername</b></owner>";
													// 			 $modaltype = 'media'; 
													// 		break;
													// 	case 'fs_postedarticles':  
													// 			#dripped , favorite , #comment
													// 			$action =  "<b>$doing_action_name</b>  $noti_action article by <owner><b>$ownername</b></owner>";
													// 			$modaltype = 'article'; 
													// 		break; 
													// 	case 'fs_member_profile_pic':    
													// 			$action    =  "<b>$doing_action_name</b>  $noti_action a profile pic of <owner><b>$ownername</b></owner>";
													// 			$noti_link =   $this->get_username_by_mno(  $noti_mno2 );  
													// 			$modaltype = 'profile pic'; 
													// 		break;
													// 	case 'fs_comment':    
													// 			$modaltype = 'profile pic';

													// 			echo " this is the fs comment rated mno = $mno table_name = $noti_table_name table_id $noti_table_id  "; 
													// 			#like , dislike comment  
													// 					$response = select_v3( 
													// 						'fs_comment', 
													// 						'*', 
													// 						"cno = $noti_table_id" 
													// 					);     
													// 					$commentor  = $response[0]['mno']; 	
													// 					$table_id   = $response[0]['table_id']; 
													// 					$table_name = $response[0]['table_name']; 
													// 					$comment    = $response[0]['comment'];     
													// 				echo " from commented table: commentor = $commentor table_id = $table_id  table_name = $table_name  comment = $comment <br> ";
													// 				// $noti_link = $this->set_link( $table_name , $commentor );  
													// 				switch ( $table_name ) {
													// 					case 'fs_member_profile_pic': 
													// 							// echo " fs_member_profile_pic ";
													// 							$mno2     = $this->member_profile_pic_query(  array( 'mppno' => $table_id , 'type'=>'get-specific-mno-by-mppno' ) );  
													// 							$noti_link = $this->set_link( $table_name , $mno2 ); 
													// 							$noti_table_name = $table_name; 
													// 							$noti_table_id = $table_id;  
													// 						break;
													// 					case 'postedlooks':
													// 						# code...
													// 						break;
													// 					case 'fs_postedmedia':
													// 						# code...
													// 						break;
													// 					case 'fs_postedarticles':
													// 						# code...
													// 						break;
													// 					case 'fs_member_profile_pic':
													// 						# code...
													// 						break; 
													// 					default:
													// 						# code...
													// 						break;
													// 				} 
													// 				$comment = "said: $comment";  
													// 				$action =  "<b>$doing_action_name</b> $noti_action a comment of $ownername $comment "; 
													// 		break;
													// 	default:  
													// 		break;  	 
													// endswitch;     
											# get people participated on this look   

			 								# send to follower participated and owner  

												# send to whome doing action  and participated the modal 
													//  get all people participated in the modal.
														$response =  $this->posted_modals_notification_Query (  array( 'table_name'=>$noti_table_name, 'table_id'=>$noti_table_id, 'orderby'=> 'nno desc', 'notification_query'=>'get-people-participated' ) ); 
												 
												 	// remove duplicate
												 		$response = $this->remove_duplicate( $response , 'mno' );    
												 		echo "[participants recieved notification]:<br> ";
												 		// print_r($response);  








													// for ($i=0; $i < count($response) ; $i++):
													// 	$mno1 = $response[$i]['mno'];   
													// 	echo "<br> asdasdasd asd asd asd $mno1  <Br>";
													// endfor;														




												 	// loop to send the notification 
													 	for ($i=0; $i < count($response) ; $i++):

															$mno1    = $response[$i]['mno'];     
															 

																// echo "<bR>  mno = $mno1  <br>"; 
															  	// echo " $mno1 != $mno "; 
																if( $mno1 != $mno ): # who doing the action can't recieved notification of his own....  
																	if ( $noti_mno2 != $mno1 ): # dont sent notification to owner of the modal    
																		if( $noti_mno2 ==  $mno ):   # if commentor is the owner so notification says commented on his look.
 																			$noti_action = $noti_action1; 
 																			// echo "[$mno]: participated on his own modal ";
																		endif;  
																		    $this->posted_modals_notification_Query ( 
																			    array(     
																			      'mno'=>$mno,                    // made the action 
																			      'table_name'=>$noti_table_name, // table name 
																			      'table_id'=>$noti_table_id,     // subject displayed in the right side 
																			      'action'=>$noti_action,         // action of the comment with colors
																			      'mno1'=>$mno1,                  // the receiver of the notification 
																			      'mno2'=>$noti_mno2,             //owner of the modal 
																			      'link'=>$noti_link,             // link of the comment
																			      'status'=>$noti_status,         // status of the notification always set = 0
																			      'notification_query'=>'notification-insert'  
																			    ) 
																			);     
																			echo " <span style='color:green' > [".$this->get_full_name_by_id ( $mno1 )."</span> <br>";
																			// echo " notification sent to  $mno1 <br>";  
																	endif;    
																else: 
																		echo " <span style='color:red' > [".$this->get_full_name_by_id($mno1)."]</span> <br>";
																	// echo " not sent because he made the action $mno1 <br>";
																endif;	 
																// $this->message( "notification succesfully"  , $response , " added to $mno1 " );  
															endfor;    





												# send to owner    
													if ( $noti_mno2 != $mno  ): // if dili ang tagiya ga comment sent notification to owner   
														// echo " this is to send notification the owner ! "; 
														//$action = "<b>$doing_action_name</b> $noti_action your $modaltype";  // generate owner notification message  
														$response =  $this->posted_modals_notification_Query ( 
														    array(     
														      'mno'=>$mno,                    // made the action 
														      'table_name'=>$noti_table_name, // table name 
														      'table_id'=>$noti_table_id,     // subject displayed in the right side 
														      'action'=>$noti_action2,        // action of the comment with colors
														      'mno1'=>$noti_mno2,             // the receiver of the notification 
														      'mno2'=>$noti_mno2,             //owner of the modal 
														      'link'=>$noti_link,             // link of the comment
														      'status'=>$noti_status,         // status of the notification always set = 0
														      'notification_query'=>'notification-insert'  
														    ) 
														);      
														echo "<br> owner recieved <span  style='color:green'  >[".$this->get_full_name_by_id($noti_mno2)." ] </span> ";
													endif; 

													// echo " owner of the modal  $noti_mno2 <br>";
												# send to follower 
													/*
													$followers = $this->get_all_follower( $mno );  
													for ($i=0; $i < count($followers) ; $i++):
														$mno1 = $followers[$i]['mno'];  
														 $response =  $this->posted_modals_notification_Query ( 
														    array(     
														      'mno'=>$mno,                    // made the action 
														      'table_name'=>$noti_table_name, // table name 
														      'table_id'=>$noti_table_id,     // subject displayed in the right side 
														      'action'=>$action,              // action of the comment with colors
														      'mno1'=>$mno1,                  // the receiver of the notification 
														      'mno2'=>$noti_mno2,             //owner of the modal 
														      'link'=>$noti_link,             // link of the comment
														      'status'=>$noti_status,         // status of the notification always set = 0
														      'notification_query'=>'notification-insert'  
														    ) 
														  );  
														$this->message( "notification succesfully"  , $response , " added to $mno1 " );  
													endfor;    
													*/
											# send to modal owner  

									 		// echo " participate not owner of the modal : notification sent <br>"; 
									break;
							}     
						# unset session
							unset($_SESSION['noti_table_name']); 
							unset($_SESSION['noti_table_id']);
							unset($_SESSION['noti_action']);
							unset($_SESSION['noti_mno2']);
							unset($_SESSION['noti_link']);
							unset($_SESSION['noti_status']);  
							unset($_SESSION['noti_type']); 
							unset($_SESSION['noti_comment']); 
 
					} else { 

						print('table name is empty');

					}
					// $this->message( 'adding notification ', $noti_table_name , null  );   
				}    
	  			public function set_link( $table_name , $table_id ) {
	  				$link = '';  
	  				switch ( $table_name ):
						case 'fs_members':    
								$link =  $this->get_username_by_mno( $table_id );
							break;
						case 'postedlooks':   
								$link = "lookdetails?id=$table_id";  
							break;
						case 'fs_postedmedia':  
								$link = "media?id=$table_id";
							break;
						case 'fs_postedarticles':  
								$link = "detail?id=$table_id";
							break; 
						case 'fs_member_profile_pic':    
								$mno2 = $this->member_profile_pic_query(  array( 'mppno' => $table_id , 'type'=>'get-specific-mno-by-mppno' ) ); 
								$link = $this->get_username_by_mno( $mno2 );
							break; 
						default:  
							break;  	 
					endswitch;
	  				 return $link;  
	  			}
	  			public function set_modal_owner( $mno , $action ) {
	  				if ( !empty( $mno )): 
						 $action .= ' a look by';
					endif;    
					return $action;
	  			}
  				public function get_notification_cricle_design( $tnotification=0 ) {

  					/*
  						circle design
	  				 	if ( $tnotification < 10 ) {
		 					$notification_buble_Style = '	padding-left:8px;  padding-right:8px;   padding-top:5px;   padding-bottom:5px;      ';
		 				}
		 				else if ( $tnotification < 100 ) {  
		 					$notification_buble_Style = '	padding-left:6px;  padding-right:6px;   padding-top:5px;   padding-bottom:5px;      ';
		 				}
		 				else if ( $tnotification < 1000 ) {  
		 					$notification_buble_Style = '	padding-left:4px;  padding-right:4px;   padding-top:5px;   padding-bottom:5px;      ';
		 				}	
		 				else{
		 					$notification_buble_Style = '	padding-left:3px;  padding-right:3px;   padding-top:5px;   padding-bottom:5px;      ';
		 				} 
	 				*/ 
		 				$notification_buble_Style = 'padding-left:5px;  padding-right:5px;   padding-top:2px;   padding-bottom:2px; ';



	 				return $notification_buble_Style;
	  			}  
	  			public function notification_design( $response  , $path=null ) {
							 							 
					# 0 = nothing happends yet
					# 1 = notifacation warning viewed
					# 2 = specific notifacation viewed  
					// for ($i=0; $i < 1 ; $i++):  
						for ($i=0; $i < count($response) ; $i++):  
						// initialized

 						$nno                 = $response[$i]['nno']; //made the action
 						$noti_mno            = $response[$i]['mno']; //made the action
 					    $noti_mno1           = $response[$i]['mno1']; //recieved the action
 					    $noti_mno2           = $response[$i]['mno2']; //modals owner
 					    $action              = $response[$i]['action']; // actual action
 						$table_name          = $response[$i]['table_name']; // table name of the modal
 						$table_id            = $response[$i]['table_id']; //table id of the modal
 						$link                = $response[$i]['link']; // either viewed or not
 						$type                = $response[$i]['type']; 
 						$status              = $response[$i]['status']; // either viewed or not
						$date                = $response[$i]['date'];  // action date  
 						$modal_type          = '';  
 						$noti_fullname2      = '';
 						$noti_fullname1      = '';  
 						$pos 				 = 0; 

						// generate subject modals 

							$noti_fullname1 = ''; //$this->get_full_name_by_id ( $noti_mno );
							$noti_fullname2 = ''; //( !empty($noti_mno2) ) ? $this->get_full_name_by_id ( $noti_mno2 ) :  null ; 
							$notif_date     = $this->get_time_ago( $date );    
							// echo " mno $noti_mno "; 

						// style

							$variables['style'] = ( $status == 0  or $status == 1 )  ? 'background-color:#f4f3f2;'  : 'background-color:none;' ; // get the background color of the message container to identify if its already oppened or not. 

 						// add the notification id to used that if the notification was clicked and it must show a ilhanan that it was already opend and it must show white
 								
							$pos = strpos( $action , 'following' );
 							if ( $pos < 1  ) { 
 								$link .= "&nno=$nno";  
 							} 

 							 

						// set comment location when the notification is about commenting 

							$pos = strpos( $action , 'commented' );
							if ( $pos > 0  ) { 
								$link .= '#comment_content';  
 							} 
 							
 						// Check if has multiple notification specific notification 
							$notification_total = select_v3( 
								'fs_notification', 
								'count(nno), nno', 
								"table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $noti_mno1 
							);
							$notification_total = $notification_total[0]['count(nno)']; 
 




							?>	  
		 					<!-- <table border="1" cellpadding="0" cellspacing="0" >  -->
		 						<!-- <tr>  --> 
		 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer" style="width:100%;" class='<?php echo $table_name.'-'.$table_id; ?>-notification' >
		 								<tr> 
		 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
							 					<div id="notification-subcontainer" >
								 						<ul style='border:1px solid none' >
								 							<li style="width:50px; "> 
								 								<?php  $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $noti_mno ,  $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;' );  ?>
								 							</li>
								 							<li style="width:210px;" ><a href="<?php echo $link; ?>"> <div> <?php  echo "<b> $noti_fullname1  </b> $action <b> $noti_fullname2 </b> <br> <span style='font-size:10px;color:grey' > $notif_date </span>"; ?></div></a></li>
								 							<li style="width:50px;padding-left:5px;" > 
								 								<?php 

								 								$style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left:303px;margin-top: -10px;';

								 								switch ( $type ) {
								 									case 'join-fb':  
								 										break; 
								 									case 'change-profile': 
								 										break; 
								 									case 'following': 
								 										break;
								 									default:
								 										 $this->generate_image_subject_notification( $table_name , $table_id , $path );  
								 										 $style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left: 303px; margin-top: -10px;';
								 										break;
								 								} 
								 								?>
								 							</li> 
								 						</ul>  
							 					</div> 
								 					<div title='click to stop notification.' style="<?php echo $style; ?>" onclick="send_flag( 'stop notification' , '<?php echo $table_id; ?>', '<?php echo $table_name; ?>' , '', 'flag_notification_save')" >.</div>  
								 					<?php if($notification_total > 1 ) { ?> 
								 						<a><div style="color: red !important;margin-top: 47px;position: relative;text-align: right;padding-right: 12px; "><?php echo $notification_total-1; ?> more.. </div></a>
								 					<?php } ?> 
							 				</td>
							 		</table> 
				 					<!-- <div style="clear:both;  height:5px; " ></div>
				 					<div style="clear:both; border:1px solid green; width:100%;height:1px; " ></div>
				 					<div style="clear:both;  height:5px; "  ></div> -->

			 				<!-- </table>   -->
	 					 <?php 
 					endfor;  
				}
				public function notification_design_message( $response  ,  $path=null , $mno ) {








					$variables['len']      =  count($response); 

					$limit_start = 0; 
					$limit_end   = 1; 

					for ($i=0; $i < $variables['len'] ; $i++):  

				 	  	//  each msgno   

							$variables['msgno']      =  intval($response[$i]['msgno']);     
							$variables['mno']        =  intval($response[$i]['mno']);    
							$variables['mno1']       =  intval($response[$i]['mno1']);    
							$variables['mno2']       =  intval($response[$i]['mno2']);  

						// get chat mate 

			 				$variables['mno1']  = ( $variables['mno']  == $mno ) ? $variables['mno1'] : $variables['mno']; // get the id of the mno of the chatmate
			 				$variables['style'] = ( $variables['mno2'] == $mno ) ? 'background-color:#f4f3f2;'  : 'background-color:none;' ; // get the background color of the message container to identify if its already oppened or not.

			 			// get username chat mate  

			 				$username 				 = $this->get_username_by_mno( $variables['mno1'] ); 

						// get from fs_comment table via table id and table name from fs_message 

					 	 	$variables['comment_r']  =  $this->posted_modals_comment_Query (   array( 'comment_query'=>'get-all-comment-by-tbn_and_tbid' , 'table_name'=>'fs_message',   'table_id'=>intval($variables['msgno']),    'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end  )  );  
					 	 	$variables['comment']    =  $variables['comment_r'][0]['comment']; 
					 	 	$variables['mno']        =  intval( $variables['comment_r'][0]['mno']);   
					 	 	$variables['date']       =  $this->get_time_ago( $variables['comment_r'][0]['date'] );  
					 	 	$fullname                =  $this->get_full_name_by_id( $variables['mno1'] );

						 	 	
 
 						// initalize content  

							$content  = " <b> $fullname : </b> <br> <span> $variables[comment]  </span> <br> $variables[date]  ";   

						// print notification message design  



							?>	   	
 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer"  style="width:100%; " >
 								<tr> 
 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
					 					<div id="notification-subcontainer" >
					 						<ul style='border:1px solid none' >
						 							<li style="width:50px; border:1px solid none "> 
					 								<?php  $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $variables['mno1'] ,  $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;' );  ?>
					 							</li>
						 							<li style="width:250px;border:1px solid none" >
					 								<a onclick="chat( 'chat?u=<?php  echo "$username"; ?>' , 'open-new-chat' ) " style="cursor:pointer;" > 
					 									<div> 	
					 										 <?php echo "$content"; ?>
					 									</div>
					 								</a>
					 							</li> 
					 						</ul>  
					 					</div> 
					 				</td>
					 		</table>  
	 					 <?php  
 					endfor;  
				}
				public function notification_design_rating( $response  ,  $path=null , $mno=null , $type=null , $isowner=false , $category=null ) {
 
					// initialize 

						$percentage  = '';
						$daterowname = ''; 
						$rate_stat   = '';
						$len      =  count($response);  
						$limit_start = 0; 
						$limit_end   = 1; 
 
 					// conditions
 
						if ($type == 'ratings') {

							// set date rowname 

								$daterowname = 'rate_date';  

						}
						else{

							// set date rowname 

							$daterowname = 'date';   

						}
 
					// for loop to print the member modals thumbnails 

						for ($i=0; $i < $len ; $i++):  

							// get the ratings status of the participant user

								if (  $isowner == true ) {
									if ($type == 'ratings') { 
										$rate_stat = $response[$i]['rate_type']; 
										if ( $rate_stat == 'dislike' ) {
											$rate_stat   = "( <span class='fs-text-red' >$rate_stat</span> )"; 
										}
										else{
											$rate_stat   = "( <span style='color:green' >$rate_stat</span> )"; 	
										} 
									} 
								}  

					 	  	//  each msgno   
	   
								$variables['mno']        =  intval($response[$i]['mno']);    
								$variables['date']       =  $response[$i][$daterowname]; 
		  	


		  					// echo " mno = ".$variables['mno'];
				 			// get username chat mate  

				 				$username 				 = $this->get_username_by_mno( $variables['mno'] ); 

							// get from fs_comment table via table id and table name from fs_message 
 
						 	 	$variables['date']       =  $this->get_time_ago( $variables['date']  );  
						 	 	$fullname                =  $this->get_full_name_by_id( $variables['mno'] );

						 	// get specific trating and tpercentage

						 	 	$mno1 		 = $response[$i]['mno'];  
								$response1   = $this->fs_member_categories(  array(  'type'=>'select',  'where'=>" mno = $mno1 and category = '$category'" ) );  
								$trating  	 = ( !empty($response1[0]['trating']) ) ? $response1[0]['trating'] : 0 ;  
								$tpercentage = ( !empty($response1[0]['tpercentage']) ) ? $response1[0]['tpercentage'] : 0 ;  
								 

 								// $tpercentage             =  $this->get_tpercentage_by_id ( $variables['mno'] );


 								// echo " this is percentage from $fullName $tpercentage% ";

 							// get percentage of the user 

								$percentage  = " ( $tpercentage% ) ";  
								
	 						// initalize content  

								//$content  = " <b> $fullname $percentage $rate_stat</b>  <br> $variables[date]  ";
								$content  = " <b> $fullname $rate_stat</b>  <br> $variables[date]  ";   
 
							// print notification message design  
	 
								$variables['style'] = ''; 
	 
								?>	   	
	 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer"  style="width:100%; " >
	 								<tr> 
	 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
						 					<div id="notification-subcontainer" >
						 						<ul style='border:1px solid none' >
							 						<li style="width:50px; border:1px solid none "> 
						 								<?php  $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $variables['mno'] ,  $path."fs_folders/images/uploads/members/mem_thumnails/", $fullname , '40px;', '', '40px;' );  ?>
						 							</li>   
							 						<li style="width:200px;border:1px solid none" > 
					 									<div> 	
					 										 <?php echo "$content"; ?>
					 									</div> 
						 							</li> 
						 							<li style="width:60px;border:1px solid none" >
						 								<div style="float:right" >
						 									<?php $this->print_user_modals_follow_or_unfollow_buttons( $mno , $variables['mno'] , 'width:109px; height:40px;'); ?>
						 								</div>
						 							</li> 
						 						</ul>  
						 					</div> 
						 				</td>
						 		</table>  
		 					 <?php  
	 					endfor;   
				} 
			 	

			 	public function notification_fb_friends_on_fs_print($mno  , $path=null) {   
		 			if(!empty($mno)) { 
			 			// echo " $mno  "; 
 						$response = select_v3( 'fs_members' , '*' , 'mno = ' . $mno ); 
 						$state_      = (!empty($response[0]['state_'])) ? '<br>State: '. $response[0]['state_'] : null ;
 						$city        = (!empty($response[0]['city'])) ? '<br>City: '. $response[0]['city'] : null ;  
						if (!empty($response[0]['bdate'])) {
							$age 		 = 2015-$response[0]['bdate'];
							$bdate       = '<br>Age: ' . $age; 		 
						}  
					    $info = "$state_   $city  $bdate ";  
						$noti_fullname1 =  $this->get_full_name_by_id ( $mno ); 

							?>	  
		 					<!-- <table border="1" cellpadding="0" cellspacing="0" >  -->
		 						<!-- <tr>  --> 
		 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer" style="width:100%;" class='<?php echo $table_name.'-'.$table_id; ?>-notification' >
		 								<tr> 
		 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
							 					<div id="notification-subcontainer" >
								 						<ul style='border:1px solid none' >
								 							<li style="width:50px; "> 
								 								<?php  $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $mno ,  $path."fs_folders/images/uploads/members/mem_thumnails/", null, '40px;', null, '40px' );  ?>
								 							</li>
								 							<li style="width:210px;" >
								 								<a href="<?php echo $link; ?>"> <div> <?php  echo "<b> $noti_fullname1   $info "; ?> </div></a>
								 							</li>
								 							<li style="width:50px;padding-left:5px;" > 
								 								 <?php $this->print_user_modals_follow_or_unfollow_buttons( $this->mno , $mno , 'width:40px; height:40px;'); ?> 
								 							</li> 
								 						</ul>  
							 					</div>   							 				
							 				</td>
							 		</table> 
				 					 
	 					 <?php  
	 				} 
			 	}
				public function notification_member_suggest( $response  , $path=null ) {
							 							 
					# 0 = nothing happends yet
					# 1 = notifacation warning viewed
					# 2 = specific notifacation viewed  
					// for ($i=0; $i < 1 ; $i++):  



						// echo "this is a test";

						for ($i=0; $i < count($response) ; $i++):  
						// initialized

						$bdate  = '';  		
 						$noti_mno    = $response[$i]['mno']; 
 						$state_      = (!empty($response[$i]['state_'])) ? '<br>State: '. $response[$i]['state_'] : null ;
 						$city        = (!empty($response[$i]['city'])) ? '<br>City: '. $response[$i]['city'] : null ;  
							
						if($response[$i]['bdate'] == 0000) {
							$bdate       = '';
						} 
						else if (!empty($response[$i]['bdate'])) {

							$age   = 2015 - intval($response[$i]['bdate']); 

							$bdate       = '<br>Age: ' . $age; 		 
						} else {
							$bdate  = '';  
						}
 					 	




 					    $info = "$state_   $city  $bdate ";
 						 

						// generate subject modals 

							$noti_fullname1 =  $this->get_full_name_by_id ( $noti_mno );
							//$noti_fullname2 = 'Erwin'; //( !empty($noti_mno2) ) ? $this->get_full_name_by_id ( $noti_mno2 ) :  null ; 
							// $notif_date     = $this->get_time_ago( $date );    
							// echo " mno $noti_mno "; 

						// style

							// $variables['style'] = ( $status == 0  or $status == 1 )  ? 'background-color:#f4f3f2;'  : 'background-color:none;' ; // get the background color of the message container to identify if its already oppened or not. 

 						// add the notification id to used that if the notification was clicked and it must show a ilhanan that it was already opend and it must show white
 								
							// $pos = strpos( $action , 'following' );
 						// 	if ( $pos < 1  ) { 
 						// 		$link .= "&nno=$nno";  
 						// 	} 

 							 

						// set comment location when the notification is about commenting 

							// $pos = strpos( $action , 'commented' );
							// if ( $pos > 0  ) { 
							// 	$link .= '#comment_content';  
 						// 	} 
 							
 						// Check if has multiple notification specific notification 
							// $notification_total = select_v3( 
							// 	'fs_notification', 
							// 	'count(nno), nno', 
							// 	"table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $noti_mno1 
							// );
							// $notification_total = $notification_total[0]['count(nno)']; 
  
							?>	  
		 					<!-- <table border="1" cellpadding="0" cellspacing="0" >  -->
		 						<!-- <tr>  --> 
		 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer" style="width:100%;" class='<?php echo $table_name.'-'.$table_id; ?>-notification' >
		 								<tr> 
		 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
							 					<div id="notification-subcontainer" >
								 						<ul style='border:1px solid none' >
								 							<li style="width:50px; "> 
								 								<?php  $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $noti_mno ,  $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;', null, '40px' );  ?>
								 							</li>
								 							<li style="width:210px;" >
								 								<a href="<?php echo $link; ?>"> <div> <?php  echo "<b> $noti_fullname1   $info "; ?> </div></a>  
								 							</li>
								 							<li style="width:50px;padding-left:5px;" > 
								 								<?php $this->print_user_modals_follow_or_unfollow_buttons( $this->mno , $noti_mno , 'width:40px; height:40px;'); ?>


								 								<?php 


								 								// $style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left:303px;margin-top: -10px;';

								 								// switch ( $type ) {
								 								// 	case 'join-fb':  
								 								// 		break; 
								 								// 	case 'change-profile': 
								 								// 		break; 
								 								// 	case 'following': 
								 								// 		break;
								 								// 	default:
								 								// 		 $this->generate_image_subject_notification( $table_name , $table_id , $path );  
								 								// 		 $style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left: 303px; margin-top: -10px;';
								 								// 		break;
								 								// } 
								 								?>
								 							</li> 
								 						</ul>  
							 					</div> 
								 					<div title='click to stop notification.' style="<?php echo $style; ?>" onclick="send_flag( 'stop notification' , '<?php echo $table_id; ?>', '<?php echo $table_name; ?>' , '', 'flag_notification_save')" >.</div>  
								 					<?php //if($notification_total > 1 ) { ?> 
								 						<!-- <a><div style="color: red !important;margin-top: 47px;position: relative;text-align: right;padding-right: 12px; "><?php echo $notification_total-1; ?> more.. </div></a> -->
								 					<?php //} ?>  
							 				</td>
							 		</table> 
				 					<!-- <div style="clear:both;  height:5px; " ></div>
				 					<div style="clear:both; border:1px solid green; width:100%;height:1px; " ></div>
				 					<div style="clear:both;  height:5px; "  ></div> -->

			 				<!-- </table>   -->
	 					 <?php 
 					endfor;  
				}

				//create function for notification  
				public function notification_facebook_user($fb_id, $fullname) {
							 		

					// echo "  notification_facebook_user($fb_id, $fullname, $link)  <br>";						 

					// $link = '';
					// $fullname = '';
					// $fb_id = '';



					# 0 = nothing happends yet
					# 1 = notifacation warning viewed
					# 2 = specific notifacation viewed  
					// for ($i=0; $i < 1 ; $i++):  
						// for ($i=0; $i < count($response) ; $i++):  
						// initialized

 					// 	$noti_mno    = $response[$i]['mno']; 
 					// 	$state_      = (!empty($response[$i]['state_'])) ? '<br>State: '. $response[$i]['state_'] : null ;
 					// 	$city        = (!empty($response[$i]['city'])) ? '<br>City: '. $response[$i]['city'] : null ;  
						// if (!empty($response[$i]['bdate'])) {
						// 	$age 		 = 2015-$response[$i]['bdate'];
						// 	$bdate       = '<br>Age: ' . $age; 		 
						// }
 					 	




 					    // $info = "$state_   $city  $bdate ";
 						 

						// generate subject modals 

							// $noti_fullname1 =  $this->get_full_name_by_id ( $noti_mno );
							//$noti_fullname2 = 'Erwin'; //( !empty($noti_mno2) ) ? $this->get_full_name_by_id ( $noti_mno2 ) :  null ; 
							// $notif_date     = $this->get_time_ago( $date );    
							// echo " mno $noti_mno "; 

						// style

							// $variables['style'] = ( $status == 0  or $status == 1 )  ? 'background-color:#f4f3f2;'  : 'background-color:none;' ; // get the background color of the message container to identify if its already oppened or not. 

 						// add the notification id to used that if the notification was clicked and it must show a ilhanan that it was already opend and it must show white
 								
							// $pos = strpos( $action , 'following' );
 						// 	if ( $pos < 1  ) { 
 						// 		$link .= "&nno=$nno";  
 						// 	} 

 							 

						// set comment location when the notification is about commenting 

							// $pos = strpos( $action , 'commented' );
							// if ( $pos > 0  ) { 
							// 	$link .= '#comment_content';  
 						// 	} 
 							
 						// Check if has multiple notification specific notification 
							// $notification_total = select_v3( 
							// 	'fs_notification', 
							// 	'count(nno), nno', 
							// 	"table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $noti_mno1 
							// );
							// $notification_total = $notification_total[0]['count(nno)']; 
  
							?>	  
		 					<!-- <table border="1" cellpadding="0" cellspacing="0" >  -->
		 						<!-- <tr>  --> 
		 							<table border="0" cellspacing="0" cellpadding="0" id="notification-table-subcontainer" style="width:100%;" class='<?php echo $table_name.'-'.$table_id; ?>-notification' >
		 								<tr> 
		 									<td style="padding-bottom:5px; padding-top:5px; padding-left:10px;<?php echo $variables['style']; ?>" > 
							 					<div id="notification-subcontainer" >
								 						<ul style='border:1px solid none' >
								 							<li style="width:50px; "> 
								 								<?php  
								 								//$fbfname = 'Jesus Erwin Suarez'; //$mc->get_facebook_user_info_by_fbid($facebook , $fbfid);
																echo "
																	<a href='https://www.facebook.com/$fb_id' target='_blank' >
																		<img src='https://graph.facebook.com/$fb_id/picture' style='cursor:pointer; width:40px;height:40px;' />
																	</a> 
																";    
								 									// $this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $noti_mno ,  $path."fs_folders/images/uploads/members/mem_thumnails/", null , '40px;' );  
								 									// image here

								 								?>
								 							</li>
								 							<li style="width:210px;" >
								 								&nbsp;&nbsp; <a href='https://www.facebook.com/<?php echo $fb_id; ?>' target='_blank' > <div> <?php  echo "<b> $fullname"; ?> </div></a>
								 							</li>
								 							<li style="width:50px;padding-left:5px;" > 
								 								<?php 

								 								// echo "$fullname 2";

								 								// $style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left:303px;margin-top: -10px;';

								 								// switch ( $type ) {
								 								// 	case 'join-fb':  
								 								// 		break; 
								 								// 	case 'change-profile': 
								 								// 		break; 
								 								// 	case 'following': 
								 								// 		break;
								 								// 	default:
								 								// 		 $this->generate_image_subject_notification( $table_name , $table_id , $path );  
								 								// 		 $style = 'cursor:pointer;color:red !important;font-size: 50px;margin: 0px;padding: 0px;line-height: 0px; margin-left: 303px; margin-top: -10px;';
								 								// 		break;
								 								// } 
								 								?>
								 							</li> 
								 						</ul>  
							 					</div> 
								 					<div title='click to stop notification.' style="<?php echo $style; ?>" onclick="send_flag( 'stop notification' , '<?php echo $table_id; ?>', '<?php echo $table_name; ?>' , '', 'flag_notification_save')" >.</div>  
								 					<?php //if($notification_total > 1 ) { ?> 
								 						<!-- <a><div style="color: red !important;margin-top: 47px;position: relative;text-align: right;padding-right: 12px; "><?php echo $notification_total-1; ?> more.. </div></a> -->
								 					<?php //} ?> 
							 				</td>
							 		</table> 
				 					<!-- <div style="clear:both;  height:5px; " ></div>
				 					<div style="clear:both; border:1px solid green; width:100%;height:1px; " ></div>
				 					<div style="clear:both;  height:5px; "  ></div> -->

			 				<!-- </table>   -->
	 					 <?php 
 					// endfor;  
				}
 


      		#NEW PRINTING
      			public function print_r1( $array ) {
      				echo "<pre>"; print_r( $array ); echo "</pre>";
      			} 
      		#END PRINTING


			#NEW NEXT PREV


			 	public function generate_next_prev_numbers( $tres , $dimintion ) {  

					// $tres = total result from database ; 
					// dimintion = total display in every pages.

					$array = array(); 
					$c=0;
					// $d=0;   
					for ($i=0; $i <$tres ; $i++) { 
						if ( $i%$dimintion == 0) {  
							$c++; 
							$array[$c-1] = $c;  
						}
					}   
					return $array;
			 	}


		 		public function group_next_value_pagenum( $pagenumgroup ,  $pagenumgroup_limit , $modal_total_show , $limit_start_group , $limit_end_group ) {   

		 			/* 
		 	 			$pagenumgroup_limit  => this is the total of the one tab show ex: 100 , 200 , 300 
		 	 			$modal_total_show    => total modal show in every page like 10 or 24 modals and so on.
		 	 			$pagenumgroup        => this is the page of the arrow like 1 or 2 or 3 and so on. . .  
		 	 			$pagenext            => this is the page next like < 1 2 3 4 5 6 7 8 9 10 >
		 	 		*/




		 	 		echo "  mc->group_next_value_pagenum ( $pagenumgroup ,  $pagenumgroup_limit , $modal_total_show , $limit_start_group , $limit_end_group )  ";

	 				// echo " < ";
			 		// $c=0;
			 		$counter1 = 0;
			 		$counter2 = 0; 
			 		for ($i=0; $i < $limit_end_group ; $i++) {   

			 			if ( $i % $modal_total_show == 0 ) {
			 				$counter1++; 
			 				
			 				if ( $i >= $limit_start_group ) { 
			 					
			 				 	echo "  $counter1  "; 
			 				 	$pageNext[$counter2] = $counter1;
			 				 	$counter2++;
			 				}
			 			} 
			 		} 
			 		// echo " > "; 
			 		$this->print_r1( $pageNext );    

			 		echo " pagenumgroup total modal  containt =  limit_start_group = $limit_start_group limit_end_group = $limit_end_group  <br> ";
	 				return $pageNext; 
	 			}



			#END NEXT PREV 
		// O
		// P




	 		public function get_tab_load_init( $array ) {

	 			/* 
				*  first load in the profile no type generated because if i will add the type maybe the admin type also will be added 
				*  so profile and admin has the same type and error of the admin not showing the modal still exist because type=profile-tabs then it will 
				*  generate the subcetegory which is it can cause error in function.js 
	 			*/


	 			$type 		 = (!empty($array['type']) )         ? $array['type'] 		: null ; 
				$mno1        = (!empty($array['mno1']) )         ? $array['mno1'] 		: null ;    
				$tab         = (!empty($array['tab'])) 			 ? $array['tab']        : null ;  
				$page        = (!empty($array['page']))          ? $array['page']    : null ;  




 

				switch (  $type  ) {
			 		case 'articles':
			 				$tab_load = "profile_change_tab ( 'blogs'     , '#profile-body-content-activities-table-menu-blogs span'     , '#profile-tab-underline-blogs div'     , 'profile-tab-loader-blogs div img'        , '$mno1' , '$page' , event , '#blog-sub-categories' )"; 
			 			break;
			 		case 'looks':
			 				$tab_load = "profile_change_tab ( 'looks'     , '#profile-body-content-activities-table-menu-looks span'     , '#profile-tab-underline-looks div'     , 'profile-tab-loader-looks div img'        , '$mno1' , '$page' , event , '#look-sub-categories' )"; 
			 			break; 
			 		case 'media':
			 				$tab_load = "profile_change_tab ( 'media'     , '#profile-body-content-activities-table-menu-media span'     , '#profile-tab-underline-media div'     , 'profile-tab-loader-media div img'        , '$mno1' , '$page' )";
			 			break;
			 		case 'comments':
			 				$tab_load = "profile_change_tab ( 'comments'  , '#profile-body-content-activities-table-menu-comments span'  , '#profile-tab-underline-comments div'  , 'profile-tab-loader-comments div img'     , '$mno1' , '$page' )";
			 			break;
			 		case 'favorites':
			 				$tab_load = "profile_change_tab ( 'favorites' , '#profile-body-content-activities-table-menu-favorites span' , '#profile-tab-underline-favorites div' , 'profile-tab-loader-favorites div img'    , '$mno1' , '$page' )";
			 			break;
			 		case 'followers':
			 				$tab_load = "profile_change_tab ( 'followers' , '#profile-body-content-activities-table-menu-followers span' , '#profile-tab-underline-followers div' , 'profile-tab-loader-followers div img'    , '$mno1' , '$page' )";
			 		break;
			 		case 'following':
			 				$tab_load = "profile_change_tab ( 'following' , '#profile-body-content-activities-table-menu-following span' , '#profile-tab-underline-following div' , 'profile-tab-loader-following div img'    , '$mno1' , '$page' )";
			 		break; 
			 		default: 
			 				$tab_load = "profile_change_tab ( 'latest'    , '#profile-body-content-activities-table-menu-activity span'  , '#profile-tab-underline-activity div'  , 'profile-tab-loader-activity div img'     , '$mno1' , '$page' )"; 
			 			break;
			 	}

			 	return $tab_load;
	 		}
			public function profile_tab_query( $array ) { 

				// initialized 

                    $type         =  $array['type'];
                    $page         =  $array['page'];
					$tab          =  $array['tab'];
					$mno          =  intval($array['mno']);
					$limit_start  =  $array['limit_start'];
					$limit_end    =  $array['limit_end']; 
					$orderby      =  ( !empty($array['orderby'])) ? $array['orderby'] : null ; 
					$like         =  ( !empty($array['like'])) 	 ? $array['like'] 	 : null ; 
					$sub          =  ( !empty($array['sub'])) 	 ? $array['sub'] 	 : null ;  
					$category     =  ( !empty($array['category'])) 	 ? $array['category'] 	 : null ;  
					$whereCompose =  ( !empty($array['whereCompose'])) ? $array['whereCompose'] : null ;  


					/*
					* print the array value
					*/
						echo  "<h3> THIS IS THE order $orderby  and print the array avalue to retrieve the data </h3> "; 
						// $this->print_r1( $array ); 
					



					echo " $tab   $mno  $limit_start $limit_end   $orderby     $page      <br> "; 
				 	// $this->print_r1( $array ); 

 				// check page and change mno condition 


 					if ( $page ==  'admin' ):       // admin page
 						$w1 = " mno > 0 ";
 					elseif ( $tab == 'followers' ): // following tab selected
 						$w1 = "mno1 = $mno";
 					elseif ( $tab == 'followers' ): // followers tab selected
 						$w1 = "mno = $mno"; 
 					else:   
 						$w1 = " mno = $mno ";
 					endif; 


 					echo "<h3> where $w1  </h3>";
 
 				// retrieve data 

					switch ( $tab ) {
		 				case 'latest':  
		 				 
		 						$response = select_v3( 
						   	   		'activity' , 
						   	   		'*' , 
						   	   		"$w1 and active > 0 and active  < 3 order by _date desc limit $limit_start , $limit_end " 
						   	   	);     
		 						return $response;   
		 					break;
		 				case 'looks': 
 
		 						// set where condition default  
		 							$where = (!empty($whereCompose)) ?  $whereCompose   : " $w1"; 
		 							$where = $where . " and active = 1 ";
 
 		 						if ( $page ==  'admin' ): 
		 							   	$response = select_v3( 
								   	   		'postedlooks' , 
								   	   		'*' , 
								   	   		"$where order by plno desc limit $limit_start , $limit_end  " 
								   	   	);  

		 						else: 
				 						



			 						// add category when the user selected category to show

									if($type == 'details-feed') { 		 							

				 						$where = "mno  <> $mno and active = 1 and style = '$category' ";  

				 					} else { 

			 							if ($category != 'all looks' ) {
				 							$where .= " and style = '$category' ";  
				 						}	

				 					}


  
				 						// query data from the database
				 					 	$response = select_v3( 
								   	   		'postedlooks' , 
								   	   		'*' , 
								   	   		"$where order by plno desc limit $limit_start , $limit_end  " 
								   	   	);
								   		// return data to the main page 
				 			 
			 				     endif;


















		 							return $response;    
		 					break;
		 				case 'followers':
		 					 	// echo " followers ";
		 					 	$response = select_v3( 
						   	   		'fs_follow' , 
						   	   		'*' , 
						   	   		"$w1 order by followtime desc limit $limit_start , $limit_end  " 
						   	   	);     
		 						return $response;  
		 					break;
		 				case 'following': 
		 						echo " following "; 
		 						$response = select_v3( 
						   	   		'fs_follow' , 
						   	   		'*' , 
						   	   		"$w1 order by followtime desc limit $limit_start , $limit_end  " 
						   	   	);     
		 						return $response;  
		 					break; 
		 				case 'beloved': 
		 						 	// echo "favorites "; 
				 					 	// echo " following "; 
 
				 						echo " this is favorites ";
					 			 
				 						$mno = intval( $mno );
				 						$response = select_v3( 
								   	   		'fs_favorite_modals', 
								   	   		'*', 
								   	   		"$w1 order by date desc limit $limit_start , $limit_end"  
								   	   	);     

								   	   	// print_r($response);
				 						return $response;   		 
		 					break; 
		 				case 'blogs': 
		 				
	 							// set where condition default 

		 							$where =  (!empty($whereCompose)) ?  $whereCompose   : " $w1";




		 						if ( $page ==  'admin' ): 
		 							   $response = $this->fs_postedarticles( array( 
										      'aticle_type'=> 'select',
										      'limit_start'=>$limit_start ,
										      'limit_end'=> $limit_end, 
										      'orderby'=>'artno desc',
										      'where'=>"$where"
										    ) 
										);     
		 						else: 
			 						// add category when the user selected category to show

				 						if ($category != 'all articles' ) {
				 							$where .= " and category = '$category' ";  
				 						}	
										 
				 					// query data from the database 

				 				        $response = $this->fs_postedarticles( array( 
										      'aticle_type'=> 'select',
										      'limit_start'=>$limit_start ,
										      'limit_end'=> $limit_end, 
										      'orderby'=>'artno desc',
										      'where'=>"$where"
										    ) 
										);    
			 				     endif;

									


		 				 		// return data to the main page  

		 							return $response;    
		 					break; 
		 				case 'media':

		 					 	echo " media "; 
		 					break;
		 				case 'comments':

		 					 	echo " comments";  
		 					break;  
		 				case 'member': 


		 						// save sub type

		 							if ( !empty($sub)) {  
		 								$_SESSION['profile_tab_query_member_sub'] = $sub; 
		 							}
		 							else{
		 								$sub = $_SESSION['profile_tab_query_member_sub']; 	
		 							}


		 						// condition for search field = like and dropdown = order by

		 							switch ( $sub  ) {
		 								case 'dropdown': 
					 						if (!empty($orderby)) {  
					 							// store the orderby to session if like is not empty 
					 							$_SESSION['profile_tab_query_member_orderby'] = $orderby;  
					 						}
					 						else{  
					 							// pass the orderby  to session if like is not empty

					 							$orderby  = $_SESSION['profile_tab_query_member_orderby']; 	 
					 						}    
		 									break;
		 								case 'search':
		 									  
						 					 	if ( !empty( $like ) ) {

						 							$like = "and "." $like ";

						 							// store the like to session if like is not empty

						 								$_SESSION['profile_tab_query_member_like'] = $like;  
						 						}
						 						else{ 
						 							// pass the like to session if like is not empty
						 							
						 								$like = $_SESSION['profile_tab_query_member_like'];	 
						 						}   
		 									break;
		 								default:
		 									# code...
		 									break;
		 							}  
			 					// echo " this is the member <br> ";  
		 						$response = select_v3( 
						   	   		'fs_members', 
						   	   		'*', 
						   	   		"mno > 0 $like $orderby limit $limit_start , $limit_end  "  
						   	   	);     

		 						return $response;   
		 					break;
		 				case 'flag':  

								$response = select_v3( 'fs_flag' ,   '*' , 'flno > 0 order by flno desc');
								return $response;  
		 					break;  
		 				case 'rating': 

		 						$w1 = " table_name = 'postedlooks' || table_name = 'fs_postedarticles' "; 
		 						echo "  $w1 order by rate_date desc limit $limit_start , $limit_end <br> "; 
		 						$response = select_v3( 
						   	   		'fs_rate_modals' , 
						   	   		'*' , 
						   	   		" $w1 order by rate_date desc limit $limit_start , $limit_end " 
						   	   	);     
						   	   	// print_r($response);
		 						return $response;    
		 					break;
		 				default:   
		 					break;
		 			}  
 
			} 
			#NEW PROFILE PIC   


			 	public function member_profile_pic_change( $mno ) {   

				    $mppno = $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) ); 
				 			 $this ->member_profile_pic_query( array('mno'=>$mno  , 'mppno'=>$mppno , 'type'=>'update-and-hide-activity-current-profile-posted' ) ); 
				             $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'insert-new-profile-pic-db' , 'action'=> 'Updated' ) );  
				    $mppno = $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) );  
				 		// $this ->member_profile_pic_query( array('mno'=>$mno  , 'mppno'=>$mppno , 'action'=> 'Updated' , 'type'=>'insert-new-profile-pic-activity-wall' ) ); 
				    	$this->update_or_add_my_activity_wall_post( $mno , $mppno , 'Updated' , 'fs_member_profile_pic' , $this->date_time );  
				    return $mppno;
			 	} 
			 	public function member_profile_pic_query( $value=array() ) {
			 		# sample query : 
			 		#  $this->member_profile_pic( array('mno'=>$mno , 'mppno'=>$mppno , 'action'=> 'Test' , 'type'=>'insert-new-profile-pic-db' ) );

			 		#initialized
				 		$mno    = ( !empty($value['mno'])    ) ? intval($value['mno'])   : 0;
				 		$mppno  = ( !empty($value['mppno'])  ) ? intval($value['mppno']) : 0;  
				 		$action = ( !empty($value['action']) ) ? $value['action']        : null;  
				 		$type   = ( !empty($value['type'])   ) ? $value['type']          : null;  



				 		// $this->print_r1($value);
			 		// echo " member_profile_pic( $mno , $mppno , $action , $type ) ";
			 		switch ( $type ) {
			 			case 'get-mppno-by-mno':

			 					// $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-mppno-by-mno' ) ); 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno" );  


			 					// print_r($r);
			 					return intval($r[0]['mppno']);


			 				break;
			 			case 'get-specific-mno-by-mppno':
			 				 	$r = select_v3( 'fs_member_profile_pic' , '*' , "mppno = $mppno order by mppno desc limit 1" );  
			 					return intval($r[0]['mno']);
			 				break;
			 			case 'get-latest-all': 
			 					echo "get-latest-all<br>"; 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno order by mppno desc limit 1" ); 
			 					// $this->print_r1($r);
			 					return $r;
			 				break; 
			 			case 'get-latest-mno': 
								// echo "get-latest-mno<br>"; 			 			
								$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno order by mppno desc limit 1" ); 
			 					echo "mno = ".$r[0]['mno'].'<br>';
			 					return intval($r[0]['mno']);
			 				break; 
			 			case 'get-latest-mppno': 
			 					// echo "get-latest-mppno<br>"; 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno order by mppno desc limit 1" ); 
			 					// echo "mno = ".$r[0]['mppno'].'<br>';
			 					return  (!empty($r[0]['mppno'])) ? $r[0]['mppno'] : 0; 
			 				break; 
			 			case 'get-all-profile-pic': 
			 			
			 					// echo "get-all-profile-pic<br>"; 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , "mno = $mno" ); 
			 					// $this->print_r1($r);
			 					return $r; 
			 				break;    
					 	case 'count-total-profile-comment':  
					 			// echo " mppno $mppno tablename fs_member_profile_pic ";
								// echo "get-all-profile-pic<br>"; 
			 					$r = select_v3( 'fs_comment' , '*' , " table_id = $mppno and table_name = 'fs_member_profile_pic' " ); 
			 					// $this->print_r1($r);  
			 					// echo " this is the function ";
			 					return count($r); 
			 				break; 
			 			case 'get-total-profile-comment':  
					 		 
								// echo "get-all-profile-pic<br>"; 
			 					$r = select_v3( 'fs_member_profile_pic' , '*' , " mppno = $mppno " ); 
			 					// $this->print_r1($r);  
			 					// echo " this is the function ";
			 					return  $retVal = ( !empty($r[0]['tcomment'])) ? $r[0]['tcomment'] : null ; ; 
			 				break; 
			 			case 'insert-new-profile-pic-db': 

			 					# ex: $$mppno = $this->member_profile_pic_query( array('mno'=>$mno1 , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) );

			 					// echo "insert-new-profile-pic-db<br>";     
			 			
		 						$mppno = insert_v1( 
									array( 
							            'mno'          =>  $mno,   
							            'action'       =>  $action,   
							            'dateupdated'  =>  date("Y-m-d H:i:s"), 
							            'table_name'   =>  'fs_member_profile_pic',
							            'row_id_name'  =>  'mppno'
							        ) 
								);    
								return $mppno;	  
			 				break; 
						case 'insert-new-profile-pic-activity-wall':     
								echo "insert-new-profile-pic-activity-wall<br>"; 
								$this->add_activity_wall_post ( $mno , $mppno , $action , 'fs_member_profile_pic' , $this->date_time );
			 				break;  
			 			case 'update-and-hide-activity-current-profile-posted':
				 				update_v1( 
					        		array( 
					        			'table_name'=>'activity',
						        		'active'=>2

						        	),
					        		array(
					        			'mno'      => intval($mno),
					        			'_table_id'=> intval($mppno)  
				        			)   
				        		);    
			 				break;
			 			case 'delete-specific-profile-pic': 

			 					echo "delete-specific-profile-pic<br>"; 
			 				break; 
			 			default:   

			 					echo " no action happend for member profile pic <br>"; 
			 				break; 
			 		}  
			 	}   
			 	public function add_new_member_profile_pic( $mno ) {
			 		$response = $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) );   
				    if ( empty( $response ) )  {
				       // echo "insert new profile pic <br>";
				    	$response = $this->member_profile_pic_query( array('mno'=>$mno , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) );
				         // $this->message( ' new profile pic added ', $response , '' );  
				         // $this->update_profile_pic_member ( );
				    }
				    else{
				      // echo " already have a profile pic <br>";
				    }	 
			 	}  
			 	public function add_profile_number_to_all_member( ) { 
			 		 $mno = $this->get_latest_user_info( 20000 );  
			 		 for ($i=0; $i < count($mno); $i++) {  
			 		 	// echo " mno ".$mno[$i]['mno'].'<br>';
			 		 	$this->add_new_member_profile_pic( intval($mno[$i]['mno']) );
			 		 } 
			 	} 
			#END PROFILE PIC

			#NEW PROFILE TIMELINE
			 	public function member_profile_timeline_query( $value=array() ) {

			 		# sample query : 
			 		#  $this->member_profile_timeline_query( array('mno'=>$mno , 'mptno'=>$mptno , 'action'=> 'Test' , 'type'=>'insert-new-profile-pic-db' ) );

			 		#initialized
				 		$mno    = ( !empty($value['mno'])    ) ? intval($value['mno'])   : 0;
				 		$mptno  = ( !empty($value['mptno'])  ) ? intval($value['mptno']) : 0;  
				 		$action = ( !empty($value['action']) ) ? $value['action']        : null;  
				 		$type   = ( !empty($value['type'])   ) ? $value['type']          : null;  





				 		





			 		// echo " member_profile_timeline_query( $mno , $mptno , $action , $type ) ";
			 		switch ( $type ) {
			 			case 'get-latest-all': 
			 					echo "get-latest-all<br>"; 
			 					$r = select_v3( 'fs_member_timeline' , '*' , "mno = $mno order by mptno desc limit 1" ); 
			 					// $this->print_r1($r);
			 					return $r;
			 				break; 
			 			case 'get-latest-mno': 
								echo "get-latest-mno<br>"; 			 			
								$r = select_v3( 'fs_member_timeline' , '*' , "mno = $mno order by mptno desc limit 1" ); 
			 					echo "mno = ".$r[0]['mno'].'<br>';
			 					return $r[0]['mno'];
			 				break; 
			 			case 'get-latest-mptno': 
			 					// echo "get-latest-mptno<br>"; 
			 					$r = select_v3( 'fs_member_timeline' , '*' , "mno = $mno order by mptno desc limit 1" ); 
			 					// echo "mno = ".$r[0]['mptno'].'<br>';
			 					return  (!empty($r[0]['mptno'])) ? $r[0]['mptno'] : 0; 
			 				break; 
			 			case 'get-all-profile-timeline': 
			 			
			 					echo "get-all-profile-pic<br>"; 
			 					$r = select_v3( 'fs_member_timeline' , '*' , "mno = $mno" ); 
			 					// $this->print_r1($r);
			 					return $r; 
			 				break;  
			 			case 'insert-new-profile-pic-db': 

			 					# ex: $$mptno = $this->member_profile_pic_query( array('mno'=>$mno1 , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) );

			 					// echo "insert-new-profile-pic-db<br>";     
		 						$mptno = insert_v1( 
									array( 
							            'mno'          =>  $mno,   
							            'action'       =>  $action,   
							            'dateupdated'  =>  date("Y-m-d H:i:s"), 
							            'table_name'   =>  'fs_member_timeline',
							            'row_id_name'  =>  'mptno'
							        ) 
								);    
								return $mptno;	  
			 				break; 
						case 'insert-new-profile-pic-activity-wall':     
								echo "insert-new-profile-pic-activity-wall<br>"; 
								$this->add_activity_wall_post ( $mno , $mptno , $action , 'fs_members' , $this->date_time );
			 				break;  
			 			case 'update-and-hide-activity-current-profile-posted':
				 				update_v1( 
					        		array( 
					        			'table_name'=>'activity',
						        		'active'=>2

						        	),
					        		array(
					        			'mno'      => intval($mno),
					        			'_table_id'=> intval($mptno)  
				        			)   
				        		);    
			 				break;
			 			case 'get-active-timeline-or-default':
			 				 	$r = select_v3( 'fs_member_timeline' , '*' , "mno = $mno order by mptno desc limit 1" ); 
			 				 	return  (!empty($r[0]['mptno'])) ? $r[0]['mptno'].".jpg" : 'default-profile-timeline.jpg' ; 
			 				break;
			 			case 'delete-specific-profile-pic': 

			 					echo "delete-specific-profile-pic<br>"; 
			 				break; 
			 			default:   

			 					echo " no action happend for member profile pic <br>"; 
			 				break; 
			 		}  
			 	}    
			 	public function resize_profile_timeline( $mno , $mptno ) {

					$ri = new resizeImage();
				    $ri->load("$this->ppic_orginal/$mno.jpg");  
			              #profile pic
					$ri->set_all_for_location( 
			          "$this->profileTimeline_original/$mno.jpg",  // source image 
			          "$this->profileTimeline_cropped/$mptno.jpg",  // save distination 
			          '',  //width
			          '',  //height
			          $ri // class object 
			        );    
			        #profile thumnails
			         $ri->set_all_for_location( 
			          "$this->profileTimeline_original/$mno.jpg",  // source image 
			          "$this->profile_timeline_thumbnail/$mptno.jpg",  // save distination 
			          50,  //width
			          '',  //height
			          $ri // class object 
			        );     
			        echo " resize $this->ppic_profile/$mptno <br> "; 
				}
			#END PROFILE TIMELINE 

			#NEW POPUP 
				public function dialog( $array ) { 
 
				 	$type                    = ( !empty($array['type']) ) ? $array['type'] : null ;  
				 	$headermssg              = ( !empty($array['headermssg']) ) ? $array['headermssg'] : null ;  
				 	$contentmssg             = ( !empty($array['contentmssg']) ) ? $array['contentmssg'] : null ;  
					$var['style']            = ( !empty($array['style'])) ? $array['style'] : null ;
					$var['title']            = ( !empty($array['title'])) ? $array['title'] : null ;
					$var['description']      = ( !empty($array['description'])) ? $array['description'] : null ;
					$var['id_present']       = ( !empty($array['id_present'])) ? $array['id_present'] : null ;
					$var['id_next']          = ( !empty($array['id_next'])) ? $array['id_next'] : null ;
					$var['action']           = ( !empty($array['action'])) ? $array['action'] : null ;   


					switch ( $type ) {
						case 'alert': 
								echo "   
									<center>

					 					<div id='thankyou-popup-container'  onclick='gen_popup( \"hide\" ) ' > 
					 						<div id='thankyou-popup-close' title='close' > <div style='margin-right:5px;' > ( x ) </div> </div>
					 						<table border='0' cellspacing='0' cellspadding='0' >   
					 							<tr>
					 								<td id='thankyou-popup-header' > 
					 									<div style='color:white;' > 
					 										$headermssg
					 									</div>
					 								</td>  
					 							<tr>
					 								<td id='thankyou-popup-content' > 
					 									<div> 
					 										$contentmssg
					 									</div>
					 								</td>    
					 						</table> 
					 					</div> 
				 					</center>
		  						";   
							break; 
						case 'popover':  

							 $php = '{"group_id":307378872724184,"cir_id":221}'; 

						?>
							<div class="popover fade bottom in" role="tooltip" id="<?php echo $var['id_present'] ;  ?>" style="<?php echo $var['style']; ?>" > 
								<div class="arrow" style="left: 50%;"> 
								</div> 
									<div class="popover-title"><?php echo $var['title']; ?>
									  <span style=" float: right; cursor: pointer; " title="close" onclick="dialog( '<?php echo $type; ?>' , '<?php echo "#$var[id_present]" ?>' , '<?php echo "#$var[id_next]" ?>' )"  > ( close ) </span> 
									  <!-- <span style=" float: right; cursor: pointer; " title="close" onclick="dialog( '<?php echo $php; ?>'  )"   > ( 0 ) </span>  -->
									</div> 
								<div class="popover-content">
									<?php echo $var['description']; ?> 
								</div>
							</div> 
						<?php 
						default: 
							break;
					} 
				} 
				public function fs_popup ( $plno ) {    
					// echo " <span style='color:#fff'> plno $plno <span> <br>"; 
					$vd = $this->get_vote_details( $plno );   
					?>     
					<div id="rating-popup-container" >  
						<div style="float:right; cursor:pointer; margin-right:-20px; margin-top:-20px; "  > 
							<img src='<?php echo "$this->genImgs/popup-close-icon.png"; ?>' onclick="pop_Up_close('#popUp-background' , 'rating-popup-container' )" style='height:23px;   ' >
						</div>
						<div id="rating-popup-bg" >
							
							<ul>
								<li id="rating-popup-title" > 
									VOTING RESULTS 	 
								</li>  
								<li> 
									Do the clothes compliment their body? <b> <?php echo  ( !empty($vd[0]['tlvoption1'])) ? $vd[0]['tlvoption1'] : 0 ;  ?> Votes </b>
								</li> 
								<li>
									Did they use complimenting colors? <b> <?php echo  ( !empty($vd[0]['tlvoption2'])) ? $vd[0]['tlvoption2'] : 0 ; ?> Votes </b>		
								</li>
								<li>
									Did they appropriately accessorize this look? <b> <?php echo ( !empty($vd[0]['tlvoption3'])) ? $vd[0]['tlvoption3'] : 0 ;  ?> Votes </b>	 
								</li>
								<li>
									Do all the garments coordinate together? <b> <?php echo  ( !empty($vd[0]['tlvoption4'])) ? $vd[0]['tlvoption4'] : 0 ;  ?> Votes </b> 		
								</li>
								<li>
									Would you categorize this look as street wear? <b> <?php echo ( !empty($vd[0]['tlvoption5'])) ? $vd[0]['tlvoption5'] : 0 ;  ?> Votes </b>		
								</li>
								<li>
									Is the styling in this look memorable, inspirational or mind-blowing? <b> <?php echo   ( !empty($vd[0]['tlvoption6'])) ? $vd[0]['tlvoption6'] : 0 ;  ?> Votes </b>
								</li>
								<li>
									Did they apply details that made a major impact on the overall look? <b> <?php echo  ( !empty($vd[0]['tlvoption7'])) ? $vd[0]['tlvoption7'] : 0 ;  ?> Votes </b>
								</li>
								<li> 
									<center>
										<b>
											Total Votes: <?php echo  ( !empty($vd[0]['tlvsum'])) ? $vd[0]['tlvsum'] : 0 ;   ?>
										</b>
									</center>
								</li>
							</ul> 
						</div>
					</div>  <?php  
				}
				public function print_more_friends_doing_the_same_action( $mno , $_table_id  , $action ) {   

					#css gen_style
					switch ( $action ) {
						case 'Rated':  

							echo "this is more rated ";
							$all_look_ratings = $this->get_look_all_ratings( $_table_id );  
							$all_look_ratings_len = count( $all_look_ratings );  
							$li = $this->posted_look_info( $_table_id ); 
							$who_look_owner =  $li['lookOwnerMno'];   
							?>
								<div id="popup-view-more-others-doing-the-action" >  
									<div id='popup-res-ni' style="color:#000; display:none" >  popup res </div> 
									<div style="float:right; cursor:pointer; margin-right:-20px; margin-top:-20px; "  >  
										<img src='<?php echo "$this->genImgs/popup-close-icon.png"; ?>' onclick="pop_Up_close('#popUp-background' , 'popup-response' )" style='height:23px;   ' >
									</div>
									<div id="popup-view-more-others-doing-the-action-bg" > 		
										<ul id="ul1" >
											<li id="popup-view-more-others-doing-the-action-bg-title" > 
												<?php echo $all_look_ratings_len; ?> OTHERS RATED THIS LOOK
											</li>   
										</ul> 
									</div>  
									<div style="position:relative;   border:1px solid none; overflow-y:scroll; height:290px;  " >
										<?php    
										// echo "look owner $who_look_owner";
										// echo " total looks rates $all_look_ratings_len  <br> ";
										// print_r($all_look_ratings );

										for ($i=0; $i < $all_look_ratings_len; $i++) {    



											$who_look_rated = $all_look_ratings[$i]['mno'];   
											// if ($mno != $who_look_rated) { 
											$lvdate         = $this->dateTime_convert($all_look_ratings[$i]['lvdate']);  
											$star           = $this->get_my_action_image_equivalent( $who_look_rated , $_table_id , 'Rated' );    				
											$memFsInfo      = $this->get_user_full_fs_info ( $who_look_rated );   
											$opercentage    = $memFsInfo['opercentage'];
											$fullName       = strtoupper($memFsInfo['fullName']);    


											$username = $this->get_username_by_mno( $who_look_rated );




											?>
										 	<ul style="  margin:auto;" > 
										 		<li>   
										 			<ul> 
										 				<li> 
										 				 	<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $who_look_rated , '../../../'.$this->ppic_thumbnail  );   ?> 
										 				</li> 
										 				<li style="margin-left:10px;" >  
										 					<ul>
										 						<li>
											 						<div style="color:#d2d0d0; font-size:11px; font-family:arial; border:1px solid none; text-align:left;" >
											 							RATED BY <b> <a href='<?php echo "$username";?>'  style='text-decoration:none; color:#d6051d'> <?php echo $fullName; ?> </a> </b>  ON <b> <?php echo $lvdate; ?></b>
											 						</div>  
										 						</li>
										 						<li style="margin-top:8px;" >
										 							<ul>
										 							 	<li>
										 							 		<div style="color:#d2d0d0; font-size:28px; font-family:arial; font-weight:bold" >
										 							 			<?php echo $opercentage; ?>%
										 							 		</div> 
										 							 	</li>
										 							 	<li>
										 							 		<div style="margin-top:4px; margin-left:25px;" >
												 							 	<?php 
												 							 		// $mno  = 133;
												 							 		// $_table_id = 129; 
												 							 		// $action = 'Rated'; 
												 							 		// $image = $this->get_my_action_image_equivalent ( $mno , $_table_id , $action ); 

												 							 		echo "$star"; 
												 							 	?> 
												 							 </div>
										 							 	</li>
										 							 	<li>
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;"  > 
										 							 		</div>
										 							 	</li> 
										 							 	<li>
										 							 		<div style="margin-top:7px;margin-left:15px;" >
										 							 			<img src='<?php echo "$this->genImgs/flag.png"; ?>' style='height:18px; cursor:pointer' onclick='flag_rate( "<?php echo $mno;  ?>" , "<?php echo $who_look_rated; ?>" , "<?php echo $_table_id; ?>"  )' /> 
										 							 		</div>
										 							 	</li>
										 							 	<li  >
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;" > 
										 							 		</div>
										 							 	</li>
										 							 	<li> 
											 							 	<div style="margin-top:2px;margin-left:20px;" >
											 							 		<?php
											 							 			if ($mno != $who_look_rated) {
											 							 				$this->print_follow_unfollow( $mno , $who_look_rated );   
											 							 			}
											 							 			else{
											 							 				echo " <div style='color:#d2d0d0; font-size:23px;margin-top:4px;'> YOU </div>";
											 							 			}

											 							 		?>
											 							 	</div>
										 							 	</li> 
										 							</ul>
										 						</li>
										 					</ul> 
										 				</li>
										 			</ul>
										 		</li> 
										 		<br>
										 	</ul>   
										 	<br><?php
									 	 	// }
									 	} 

									 	 ?>
								 	</div>
								</div>    
							<?php 
							break;  
						case 'Shared': 

								echo " more shared popup ";
							break;
						case 'Driped': 

								echo " more Driped popup ";
							break;
						case 'Favorited': 

								echo " more Favorited popup ";
							break;
						case 'Commented': 
								echo "this is more Commented ";  
								// $comments = $this->get_look_all_comments( $_table_id );  
								$comments = $this->get_all_according_to_activity_action( 'Commented' , $_table_id , 'postedlooks' );  
								$all_look_ratings_len = count( $comments );   
								$li = $this->posted_look_info( $_table_id ); 
								$who_look_owner =  $li['lookOwnerMno'];  ?>
								<div id="popup-view-more-others-doing-the-action" >  
									<div id='popup-res-ni' style="color:#000; display:none" >  popup res </div> 
									<div style="float:right; cursor:pointer; margin-right:-20px; margin-top:-20px; "  >  
										<img src='<?php echo "$this->genImgs/popup-close-icon.png"; ?>' onclick="pop_Up_close('#popUp-background' , 'popup-response' )" style='height:23px;   ' >
									</div>
									<div id="popup-view-more-others-doing-the-action-bg" > 		
										<ul id="ul1" >
											<li id="popup-view-more-others-doing-the-action-bg-title" > 
												<?php echo $all_look_ratings_len; ?> OTHERS COMMENTED THIS LOOK
											</li>   
										</ul> 
									</div>  
									<div style="position:relative;   border:1px solid none; overflow-y:scroll; height:290px;  " >
										<?php    
										// echo "look owner $who_look_owner";
										// echo " total looks rates $all_look_ratings_len  <br> ";
										// print_r($comments );

										for ($i=0; $i < $all_look_ratings_len; $i++) {    
											$who_look_rated = $comments[$i]['mno'];   
											// if ($mno != $who_look_rated) { 

											$lvdate         = $this->dateTime_convert($comments[$i]['_date']);  
											$star           = $this->get_my_action_image_equivalent( $who_look_rated , $_table_id , 'Commented' );    				
											$memFsInfo      = $this->get_user_full_fs_info ( $who_look_rated );   
											$opercentage    = $memFsInfo['opercentage'];
											$fullName       = strtoupper($memFsInfo['fullName']);    
											$username = $this->get_username_by_mno( $who_look_rated );
											?>
										 	<ul style="  margin:auto;" > 
										 		<li>   
										 			<ul> 
										 				<li> 
										 				 	<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $who_look_rated , '../../../'.$this->ppic_thumbnail  );   ?> 
										 				</li> 
										 				<li style="margin-left:10px;" >  
										 					<ul>
										 						<li>
											 						<div style="color:#d2d0d0; font-size:11px; font-family:arial; border:1px solid none; text-align:left;" >
											 							RATED BY <b> <a href='<?php echo $username;  ?>'  style='text-decoration:none; color:#d6051d'> <?php echo $fullName; ?> </a> </b>  ON <b> <?php echo $lvdate; ?></b>
											 						</div>  
										 						</li>
										 						<li style="margin-top:8px;" >
										 							<ul>
										 							 	<li>
										 							 		<div style="color:#d2d0d0; font-size:28px; font-family:arial; font-weight:bold" >
										 							 			<?php echo $opercentage; ?>%
										 							 		</div> 
										 							 	</li>
										 							 	<li>
										 							 		<div style="margin-top:4px; margin-left:25px;" >
												 							 	<?php 
												 							 		// $mno  = 133;
												 							 		// $_table_id = 129; 
												 							 		// $action = 'Rated'; 
												 							 		// $image = $this->get_my_action_image_equivalent ( $mno , $_table_id , $action ); 

												 							 		echo "$star"; 
												 							 	?> 
												 							 </div>
										 							 	</li>
										 							 	<li>
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;"  > 
										 							 		</div>
										 							 	</li> 
										 							 	<li>
										 							 		<div style="margin-top:7px;margin-left:15px;" >
										 							 			<img src='<?php echo "$this->genImgs/flag.png"; ?>' style='height:18px; cursor:pointer' onclick='flag_rate( "<?php echo $mno;  ?>" , "<?php echo $who_look_rated; ?>" , "<?php echo $_table_id; ?>"  )' /> 
										 							 		</div>
										 							 	</li>
										 							 	<li  >
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;" > 
										 							 		</div>
										 							 	</li>
										 							 	<li> 
											 							 	<div style="margin-top:2px;margin-left:20px;" >
											 							 		<?php
											 							 			if ($mno != $who_look_rated) {
											 							 				$this->print_follow_unfollow( $mno , $who_look_rated );   
											 							 			}
											 							 			else{
											 							 				echo " <div style='color:#d2d0d0; font-size:23px;margin-top:4px;'> YOU </div>";
											 							 			}

											 							 		?>
											 							 	</div>
										 							 	</li> 
										 							</ul>
										 						</li>
										 					</ul> 
										 				</li>
										 			</ul>
										 		</li> 
										 		<br>
										 	</ul>   
										 	<br><?php
									 	 	// }
									 	} 

									 	 ?>
								 	</div>
								</div>    
								<?php 
								echo " more Commented popup ";
							break;
						case 'Following': 
								echo "this is more mno = $mno , _table_id = $_table_id  , action = $action  ";   

								 
								// $comments = $this->get_look_all_comments( $_table_id );   
								
								

								$followers = $this->get_all_follower( $_table_id ); 
								$followers_len = count( $followers );    
								// $li = $this->posted_look_info( $_table_id ); 
								// $who_look_owner =  $li['lookOwnerMno'];  

								// $meminfo       = $this->get_user_full_fs_info( $_table_id );   
								// $followedname = $meminfo['fullName']; 

								?>
								<div id="popup-view-more-others-doing-the-action" >  
									<div id='popup-res-ni' style="color:#000; display:none" >  popup res </div> 
									<div style="float:right; cursor:pointer; margin-right:-20px; margin-top:-20px; "  >  
										<img src='<?php echo "$this->genImgs/popup-close-icon.png"; ?>' onclick="pop_Up_close('#popUp-background' , 'popup-response' )" style='height:23px;   ' >
									</div>
									<div id="popup-view-more-others-doing-the-action-bg" > 		
										<ul id="ul1" >
											<li id="popup-view-more-others-doing-the-action-bg-title" > 
												<?php echo $followers_len; ?> OTHERS FOLLOWER
											</li>   
										</ul> 
									</div>  
									<div style="position:relative;   border:1px solid none; overflow-y:scroll; height:290px;  " >
										<?php    
										// echo "look owner $who_look_owner";
										// echo " total looks rates $followers_len  <br> ";
										// print_r($comments ); 
										for ($i=0; $i < $followers_len; $i++) {   
											$follower_mno = $followers[$i]['mno'];   
											// if ($mno != $follower_mno) {  
											$lvdate         = $this->dateTime_convert($followers[$i]['followtime']);  
											$star           = $this->get_my_action_image_equivalent( $follower_mno , $_table_id , 'Following' );    				
											$memFsInfo      = $this->get_user_full_fs_info ( $follower_mno );   
											$opercentage    = $memFsInfo['opercentage'];
											$fullName       = strtoupper($memFsInfo['fullName']);    
											$username = $this->get_username_by_mno( $follower_mno );
											?>
										 	<ul style="  margin:auto;" > 
										 		<li>   
										 			<ul> 
										 				<li> 
										 				 	<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $follower_mno , '../../../'.$this->ppic_thumbnail  );   ?> 
										 				</li> 
										 				<li style="margin-left:10px;" >  
										 					<ul>
										 						<li>
											 						<div style="color:#d2d0d0; font-size:11px; font-family:arial; border:1px solid none; text-align:left;" >
											 							RATED BY <b> <a href='<?php echo "$username";  ?>'  style='text-decoration:none; color:#d6051d'> <?php echo $fullName; ?> </a> </b>  ON <b> <?php echo $lvdate; ?></b>
											 						</div>  
										 						</li>
										 						<li style="margin-top:8px;" >
										 							<ul>
										 							 	<li>
										 							 		<div style="color:#d2d0d0; font-size:28px; font-family:arial; font-weight:bold" >
										 							 			<?php echo $opercentage; ?>%
										 							 		</div> 
										 							 	</li>
										 							 	<li>
										 							 		<div style="margin-top:4px; margin-left:25px;" >
												 							 	<?php 
												 							 		// $mno  = 133;
												 							 		// $_table_id = 129; 
												 							 		// $action = 'Rated'; 
												 							 		// $image = $this->get_my_action_image_equivalent ( $mno , $_table_id , $action ); 

												 							 		// echo "$star"; 
												 							 	?> 
												 							 </div>
										 							 	</li>
										 							 	<li>
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;"  > 
										 							 		</div>
										 							 	</li> 
										 							 	<li>
										 							 		<div style="margin-top:7px;margin-left:15px;" >
										 							 			<img src='<?php echo "$this->genImgs/flag.png"; ?>' style='height:18px; cursor:pointer' onclick='flag_rate( "<?php echo $mno;  ?>" , "<?php echo $follower_mno; ?>" , "<?php echo $_table_id; ?>"  )' /> 
										 							 		</div>
										 							 	</li>
										 							 	<li  >
										 							 		<div id="look-details-profile-look-owner-header-gray-bar" style="margin-left:15px;" > 
										 							 		</div>
										 							 	</li>
										 							 	<li> 
											 							 	<div style="margin-top:2px;margin-left:20px;" >
											 							 		<?php
											 							 			if ($mno != $follower_mno) {
											 							 				$this->print_follow_unfollow( $mno , $follower_mno );   
											 							 			}
											 							 			else{
											 							 				echo " <div style='color:#d6051d; font-size:23px;margin-top:4px;'> YOU </div>";
											 							 			}

											 							 		?>
											 							 	</div>
										 							 	</li> 
										 							</ul>
										 						</li>
										 					</ul> 
										 				</li>
										 			</ul>
										 		</li> 
										 		<br>
										 	</ul>   
										 	<br><?php
									 	 	// }
									 	} 

									 	 ?>
								 	</div>
								</div>    					
								<?php  
							break;   
						default:   
								echo " more Default popup ";
							break;
					}
				}
				public function fs_popup_container_and_response( $s='display:none;' ) {

					# this popup container and response must in placed inside the header tag
					# this is used to container the result of the popup 

					echo "
		 				<div style='position:absolute;z-index:125' > 
			 				<div id='popUp-background' style='$s' >   
			 					<div id='popUp-background-container' class='popUp-background-container' > 
				 					<center>
				 						<div id='popup-more-doing-the-action-loader' style='display:block' >
											<img src='fs_folders/images/attr/loading 2.gif' > 
										</div>   
						 				<div id='popup-response' style='color:white' >    
						 					response 
				 						</div>  
			 						</canter> 
			 					</div>
							</div> 
						</div>
					";  
				}
			#END POPUP 

			#NEW POST A LOOK UPLOAD 

				function postalook_upload_popup_rules_print ( )  {

					echo "
		 				<div style='position:absolute' >
			 				<div id='popUp-background' style='display:none'>   
			 					<div id='popUp-background-container' > 
				 					<center>
				 						<div id='popup-more-doing-the-action-loader'  >
											<img src='fs_folders/images/attr/loading 2.gif' style='display:none' > 
										</div>  

						 				<div id='popup-response'  class='new-postalook-post-popup-container'  >   

							 				<div style='font-family:misoLight;font-size:37px; color:#d6051d;padding-bottom:10px;' > 
							 					POSTING RULES
							 				</div>  

						 					<table border='0' cellspacing='0' cellspadding='0' > 
						 						<tr>
						 							<td style='width:20px;'> 
						 								1.  
						 							</td>  
						 							<td> 
						 								Must be 16 years of age.
						 							</td>
						 						<tr> 
						 							<td> 
						 								2.  
						 							</td>  
						 							<td> 
						 								No nudity.
						 							</td>
						 						<tr> 
						 							<td> 
						 								3.  
						 							</td>  
						 							<td> 
						 								Full body photos are only. Any look that fails to display at least head-to-toe will be subject to disqualification.
						 							</td>
						 						<tr> 
						 							<td> 
						 								4.  
						 							</td>  
						 							<td> 
						 								Original image only. Stretching, colorizing, or adding text and graphics is prohibited.
						 							</td>
						 						<tr> 
						 							<td> 
						 								5.  
						 							</td>  
						 							<td> 
						 								Photo must be free from major distractions.
						 							</td>
						 						<tr> 
						 							<td> 
						 								6. 
						 							</td>  
						 							<td> 
						 								Looks must only display member. Looks with more than one person will be disqualified.
						 							</td>
						 						<tr> 
						 							<td> 
						 								7.  
						 							</td>  
						 							<td> 
						 								Never post photos that you don't own the rights to you. Even if the person in the look is you.
						 							</td>
						 						<tr> 
						 							<td> 
						 								8.  
						 							</td>  
						 							<td> 
						 								Do not post the same image twice. Doing so will result to one being deleted.
						 							</td>
						 						<tr> 
						 							<td> 
						 								9.  
						 							</td>  
						 							<td> 
						 								Tag and label look correctly.
						 							</td>
						 						<tr> 
						 							<td> 
						 								10.  
						 							</td>  
						 							<td> 
					 									Read the OFFICIAL RULES. 
						 							</td>
						 					</table>

						 					<center> 
							 					<div style='padding-top:20px;' >  
							 						<input type='button' value='ok'  onclick='close_posting_rules ( )' />
							 					</div>
							 				</center>
				 						</div>   
			 						</canter> 
			 					</div>
							</div> 
						</div>
					";    
				} 
			#END POST A LOOK UPLOAD 

			#NEW POST ARCTICLE
				public function new_index_next_prev( $data , $current_index ) { 
					$len = count($data)-1; 
					$next = $len;
					$prev = 0;

					if ( $current_index  == $len || $current_index > $len ):  
						$next = 0;
						$prev = $len - 1;
					elseif ( $current_index  == 0 || $current_index < 0 ):   
						$next = 1;
						$prev = $len; 
					else:  
						$next = $current_index + 1;
						$prev = $current_index - 1; 
					endif;    
					$response = array( 'next'=> $next , 'prev'=> $prev ); 

					return $response;  
				}
			#NEW POST ARCTICLE


			#NEW PROFILE PAGE ACTIVITY 
			   public function get_my_profile_feed_activity( $mno ) {  

			   		// $myprofilefeeds = select_v3( 'activity' , '*' , "mno = $mno" ); 
			   		// $myprofilefeeds = selectV1(
			   		// 	'*', 
			   		// 	'activity', 
			   		// 	array('mno'=>133 , 'operand1'=> 'and' , 'active'=>2 ,'operand2'=> 'or' , 'active'=>1   )
			   		// );
			   	   	$myprofilefeeds = select_v3( 
			   	   		'activity' , 
			   	   		'*' , 
			   	   		"mno = $mno and active > 0 and active  < 3 order by _date desc " 
			   	   	);   

					return $myprofilefeeds; 
			   } 
			   public function get_activity_posted_profile_feeds( $ano ) {
		   		 	$myprofilefeeds = select_v3( 
			   	   		'activity' , 
			   	   		'*' , 
			   	   		"ano = $ano" 
			   	   	);   
			   	   	return $myprofilefeeds;
			   } 
			#END PROFILE PAGE ACTIVITY	  
		// Q 
		// R
					

		 





			#NEW REMOVE  

			public function string( $array ) {

				$type   = $array['type'];
				$string = $array['string'];

				switch ( $type ):
					case 'remove-space':
							$string = preg_replace( '/\s\s+/', ' ', $string ); 
							$string = preg_replace('/\s+/', '', $string); 
						break; 
					default:
						 
						break;
				endswitch;

				return $string;
				 
			}
			public function remove_duplicate( $dbval , $rowname ) {  
			    $remove=false;
			    $c=0; 
			    $var_r = array(); 
			    // print_r($var);
			    for ($i=0; $i < count($dbval) ; $i++) { 
			      for ($j=$i+1; $j < count($dbval); $j++) {
			        // echo  $var[$i]."==".$var[$j]."<br>";
			        if ($dbval[$i]["$rowname"]==$dbval[$j]["$rowname"]) {
			          $remove=true;
			          // echo "true";
			        }
			      }
			      if (!$remove) {
			        $var_r[$c]["$rowname"]=$dbval[$i]["$rowname"];
			        $c++;
			      }else{
			        $remove=false;
			      }
			    }
			    return $var_r;
			  }
			#END REMOVE 


			#NEW RESET
			    public function reset_ratings ( $resetNow ) {
			    	if ( $resetNow == true ) { 
			        	$b1 = mysql_query("UPDATE postedlooks , fs_top_data 
			        		set pltvotes = 0 , trating = 0 , pltoplookrating = 0 , tpercentage = 0 , 
			        		top_look_rating = 0 , top_look_percentage = 0 , top_look_vote = 0 "
			        	);  
			        	$b2 = mysql_query("UPDATE  activity SET active = 1 WHERE active = 2 ");  
			        	$b3 = mysql_query("DELETE FROM fs_look_votes ");  
			        	$b4 = mysql_query("DELETE FROM fs_look_votes_details ");    
			        	$b5 = mysql_query("DELETE FROM activity WHERE action = 'Rated' ");     
			        	
			        }else{
			        	 echo " please make make it true to reset the rating";
			        }


		        	if ( $b1 == true && $b2 == true && $b3 == true ) {
		        		 return true;
		        	}
		        	else{
		        		return false;
		        	}
			    } 
			    public function reset_following( $resetNow ) { 
			    }
			    public function reset_follow( $resetNow ) { 
			    }
			    public function reset_user_data( $mno=null , $data=array() ) {  
			    	if ( in_array('following' , $data  ) ) { 
			    		$b1 = mysql_query("DELETE FROM fs_follow ");  
			    		if ($b1) { 
	 						mysql_query("UPDATE fs_members SET tfollowing = 0 , tfollower = 0 "); 
			    			echo "following succesfully reseted";  
			    		}
			    		else{ 
			    			echo "following failled to reset";
			    		}  
			    	}else{
			    		echo " no table to be reset";
			    	} 
			    }
			#END RESET 
	 
			#NEW RATING
 
			    public function RATING( $array ) {  

			    	$t   			= ( !empty($array['type'])) ? $array['type'] : 0 ;   
			    	$l   			= ( !empty($array['like'])) ? $array['like'] : 0 ;   
			    	$dl  			= ( !empty($array['dislike'])) ? $array['dislike'] : 0 ;   
			    	$tr  			= ( !empty($array['trating'])) ? $array['trating'] : 0 ;    
			    	$mno 			= ( !empty($array['mno'])) ? $array['mno'] : 0 ;
			    	$category       = ( !empty($array['category'])) ? $array['category'] : 0 ; 
			    	$table_name     = ( !empty($array['table_name'])) ? $array['table_name'] : 'postedlooks' ; // table name of the table
			     
					 
					 switch ( $table_name ) {
					 	 	case 'postedlooks':
									$table_id_name = 'plno';
					 	 		break;
					 	 	case 'fs_postedarticles': 
					 	 			$table_id_name = 'artno';
					 	 		break;
					 	 	default: 
					 	 			$table_id_name = 'media_id';
					 	 		break;
					 	 }	 


					echo " table name = 	$table_name  <br> 
					table id name = $table_id_name <br> 
					";
			    	$this->print_r1( $array  );   
 
			    	switch ( $t ) {
			    		case 'calculate-percentage-look':   
		    				 	if ( $tr != 0 ) {
		    				 		return $tpercentage = $l/$tr*100; 
		    				 	}
		    				 	else {
		    				 		return 0;
		    				 	} 
			    			break; 
			    		case 'calculate-rating-and-percentage-overall-modals': 

					    		$sum1 = 0; 
								$sum2 = 0; 

				    		 	#ex: array( 'type'=> 'calculate-percentage-user' , 'mno' => $mno ); 
				    			// get all looks  




								$response = $this->LOOK( array('type' => 'get-all-looks-by-user' , 'mno' => $mno , 'table_name'=>$table_name  )  ); 

								# get look
								# get media
								# get article  

								// $this->print_r1($response);   

				    			// add all looks rating

	 								for ($i=0; $i < count($response) ; $i++) {   

	 									// get id of the result modal 

		 									// echo $response[$i]['plno'].'<br>'; 
		 									$table_id = $response[$i][$table_id_name];  
		 									// echo" TABLE ID IN $plno <BR>"; 

		 								// get total likes  

	 										$tlikes  =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-total-likes') );  

	 									// get total ratings 

											$trating =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-overall') );   

	 									// sum up all 

											$sum1 +=  $tlikes;
											$sum2 +=  $trating;

	 								}  

	 								// echo " total sum1 	$sum1  ; total sum2 $sum2 ";  

	 								// this is the function rating and this is the calculation of the user overall look article and media
	 								
	 								$rating['tlikes']   = $sum1; 
	 								$rating['trating']  = $sum2; 

	 								if ( $sum2 != 0 )  { 
	 									$rating['tpercentage'] = $sum1/$sum2*100;   	  

	 									$this->print_r1($rating);
	 									return $rating; 
	 								}
	 								else {
	 									$rating['tpercentage'] = 0;	 
	 									$this->print_r1($rating);
	 									return $rating; 
	 								}

				    			// add all looks likes    
			    			break; 
			    		case 'calculate-member-overall-rating-and-percentage': 



				    			$sum1 = 0; 
								$sum2 = 0; 
	 							
	 							$table_names    = array('postedlooks','fs_postedarticles','fs_postedmedia');
	 							$table_id_names = array('plno','artno','media_id');  

								


								$ttable = count($table_names );


								echo " total table $ttable <br> ";
							 	




				    			// add all looks rating


	 							echo "<h3> calculate percentage and trating for overall user starts here  </h3>";
									for ($h=0; $h < count($table_names) ; $h++) {  

										$table_name    = $table_names[$h];
										$table_id_name = $table_id_names[$h];

										$response = $this->LOOK( array('type' => 'get-all-looks-by-user' , 'mno' => $mno , 'table_name'=>$table_name  )  ); 


										echo " table_name = $table_name    table_id_name = $table_id_name <br> <h3> tratings </h3> ";
		 								for ($i=0; $i < count($response) ; $i++) {   

		 									// get id of the result modal 

			 									// echo $response[$i]['plno'].'<br>'; 
			 									$table_id = $response[$i][$table_id_name];  
			 									// echo" TABLE ID IN $plno <BR>"; 

			 								// get total likes  

		 										$tlikes  =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-total-likes') );  

		 									// get total ratings 

												$trating =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-overall') );   

		 									// sum up all 

												$sum1 +=  $tlikes;
												$sum2 +=  $trating;
	 
												echo "tlikes = $tlikes   trating = $trating <br> ";
	 
		 								}  
	 
		 								echo " <h3>  total sum1 and sum2 </h3>sum1 = $sum1 sum2 = $sum2 <br> ";
		 							}
	  

	 							// this is the function rating and this is the calculation of the user overall look article and media
	 								
	 								$rating['tlikes_user']   = $sum1; 
	 								$rating['trating_user']  = $sum2; 

	 								if ( $sum2 != 0 )  { 
	 									$rating['tpercentage_user'] = $sum1/$sum2*100;   	  

	 									$this->print_r1($rating);
	 									return $rating; 
	 								}
	 								else {
	 									$rating['tpercentage_user'] = 0;	 
	 									$this->print_r1($rating);
	 									return $rating; 
	 								}
			    			break;
			    		case 'calculte-category-tratings-and-tpercentage':
			    			 	
				    			$sum1 = 0; 
								$sum2 = 0; 
	 							
	 						 
								// this is the case for calculating of the tpercentage and trating of the category 
 



				    			// set up all the column names
 
										echo " table_name = $table_name    table_id_name = $table_id_name <br> <h3> tratings </h3> "; 
										$table_names    = array('postedlooks','fs_postedarticles','fs_postedmedia');
	 									$table_id_names = array('plno','artno','media_id');   

	 									if ( $table_name == 'postedlooks' ) { 
 											$table_name    = $table_names[0];
											$table_id_name = $table_id_names[0];
											$category_name = 'style';

	 									}else if ( $table_name == 'fs_postedarticles' ) {
	 										$table_name    = $table_names[1];
											$table_id_name = $table_id_names[1];
											$category_name = 'category';
	 									}
	 									else{
	 										$table_name    = $table_names[2];
											$table_id_name = $table_id_names[2];
											$category_name = 'category';
	 									}


	 								// select table

										$response =select_v3( $table_name , '*' , " mno = $mno and $category_name = '$category' " );


									// add all ratings

		 								for ($i=0; $i < count($response) ; $i++) {   

		 									// set table name and table id 

										
		 									// get id of the result modal 

			 									// echo $response[$i]['plno'].'<br>'; 
			 									$table_id = $response[$i][$table_id_name];  
			 									$category = $response[$i][$category_name];  


			 									// echo" TABLE ID IN $plno <BR>"; 

			 								// get total likes  

		 										$tlikes  =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-total-likes') );  

		 									// get total ratings 

												$trating =  $this->posted_modals_rate_Query(  array( 'table_name'=>$table_name  , 'table_id'=>$table_id, 'rate_query'=>'get-rate-overall') );   

		 									// sum up all 

												$sum1 +=  $tlikes;
												$sum2 +=  $trating;
	 
												echo " $table_id_name = $table_id , tlikes = $tlikes , trating = $trating , category = $category   <br> ";
	 
		 								}  
		  
		  

		 							// this is the function rating and this is the calculation of the user overall look article and media
		 								
		 								$rating['tlikes']   = $sum1; 
		 								$rating['trating']  = $sum2; 

		 								if ( $sum2 != 0 )  { 
		 									$rating['tpercentage'] = $sum1/$sum2*100;   	  

		 									$this->print_r1($rating);
		 									return $rating; 
		 								}
		 								else {
		 									$rating['tpercentage'] = 0;	 
		 									$this->print_r1($rating);
		 									return $rating; 
		 								}
			    			break;
			    		default: 
			    			break;
			    	}
			    } 
				public function update_overall_percentage( $mno ) {   

		        	return 'needs to be coded check save and update every vote action happend';
		        } 	
				public function get_vote_details( $plno ) {
					$vd=selectV1(
				     	"*",
					 	"fs_look_votes_details", 
					 	array( 'plno'=>$plno ) 
					);  
					return $vd; 
				}
				public function get_all_my_rated_looks_by_month($mno, $monthstart, $rate_status='Unrated', $table_name='postedlooks') {
					



					/** 
					 * Suppose to add a date but now no need
					 * to add just copy the comment code below and also the the getting the looks with date also
					 */ 
					/*
						$lookrates = select_v3( 
					   		'fs_look_votes' , 
					   		'*' , 
					   		"mno = $mno and lvdate > '$monthstart'" 
					   	);     
					*/
					// echo "  get_all_my_rated_looks_by_month( $mno , $monthstart ) "; 
	                	//echo "date $monthstart";
							// $lookrates = select_v3( 
						 //   		'fs_rate_modals', 
						 //   		'*' , 
						 //   		"mno = $mno and rate_date > '$monthstart'" 
						 //   	);   

						if($rate_status == 'Unrated' || $rate_status == 'Rated') {  
							$lookrates = select_v3( 
						   		'fs_rate_modals', 
						   		'*' , 
						   		"mno = $mno and table_name = '$table_name'" 
						   	);    
						   	echo "rating ";
						   	return $lookrates;    
						} elseif ($rate_status == 'Favorited') {  

							echo "Favorite";
							$lookrates = select_v3( 
						   		'fs_favorite_modals', 
						   		'*' , 
						   		"mno = $mno and table_name = '$table_name'" 
						   	); 
						   	return $lookrates;  

						} else {  

							echo "else";

						} 


						echo "response after retrieved $rate_status "; 
					    return $lookrates; 

	         

				}
				public function get_my_look_vote ( $mno , $plno ) {  
		    		$myvote=selectV1(
				     	"*",
					 	"fs_look_votes", 
					 	array( 'mno'=>$mno, 'operand1'=>'and','plno'=>$plno ) 
					);  
					return $myvote;  
			    } 
			    public function get_specific_look_overall_ratings ( $plno ) {  
			    	$sum   = 0; 
					$tvotes=selectV1(
				     	"lvtotal",
					 	"fs_look_votes", 
					 	array( 'plno'=>$plno ) 
					);  
						for ($i=0; $i < count($tvotes) ; $i++) {  
							$sum = $sum +  $tvotes[$i]['lvtotal']; 
						} 
						return $sum; 
			    }  
			    public function get_look_percentage ( $plno , $trating , $toplookrating ) {   
			    	 
			    	// $trating = $this->get_specific_look_overall_ratings( $plno );      
			    	$ratings = 0;  
			    	// echo " max rate =  $toplookrating  <br> look rate $trating <br>  "; 
			    	// $ = $this->get_total_votes( $plno  );  
			    	// $tvotes = 3; 
			    	if ( $toplookrating == 0 and $trating == 0 ) {
			    		return 0;
	 				}else {  

				    	if ( $toplookrating == 0 and $trating != 0 ) {
				    		$toplookrating = $trating;
		 				} 
				    	$ratings = $trating/$toplookrating*100;  
				    	return  sprintf("%0.$this->decimal", $ratings); 
				    }
			    	// return $ratings; 
			    }  
			    public function get_look_all_ratings( $plno ) { 
			    	$all_look_ratings=selectV1(
				     	"*",
					 	"fs_look_votes", 
					 	array( 'plno'=>$plno )  
					);   
					return $all_look_ratings;
			    }
			    public function get_one_look_info ( $plno , $rowname ) { 
			    	$lookInfo=selectV1(
				     	"$rowname",
					 	"postedlooks", 
					 	array( 'plno'=>$plno ) 
					);   
					return $lookInfo[0]["$rowname"];
			    }  
			    public function get_max_look_rating ( ) { 
		    		$lookRatings=selectV1(
				     	"*",
					 	"postedlooks", 
					 	'',
					 	'order by trating desc'
					);   
					return $lookRatings[0]['trating'];  
			    } 
			    public function get_look_percentage_own ( $plno , $trating , $tvotes ) {
			    		$v = $tvotes*100;
			    	  	$r = $trating/$v; 
			    	  	$ratings = $r*100; 
				    	return  sprintf('%0.1f', $ratings); 
			    }
			    public function get_overall_percentage_of_user ( $mno , $bytime ) {  
			    	$ovote = 0;
			    	$orate = 0;
			    	$ual =  $this->get_user_all_look ( $mno , $bytime );    
	    			for ($i=0; $i < count($ual) ; $i++) {  
	    				// echo "".$ual[$i]['plno']."<br>";    
	    				$vote   = $ual[$i]['pltvotes'];  					
						$rate   = $ual[$i]['trating'];   	   
						$ovote += $vote; 
						$orate += $rate;     
						// echo " vote [$vote] rate [$rate] <br>";  
	    			}   
	    			$deffrate  = $ovote * 100;    
	    			if (  $deffrate > 0 ) { 
		    			$uoar      = $orate / $deffrate * 100;     
		    			// echo " overall vote [$ovote] overall rate [$orate] rate [$deffrate] <br>  ";     
		    			return  sprintf("%0.$this->decimal", $uoar); 
	    			}
	    			else{
	    				return 0;
	    			}  
			    }   
			    public function update_or_add_vote_detail( $val ) { 
					$lvoption1 = 0;
					$lvoption2 = 0;
					$lvoption3 = 0;
					$lvoption4 = 0;
					$lvoption5 = 0;
					$lvoption6 = 0;
					$lvoption7 = 0;
					$plno = $val['plno'];
					$vd = $this->get_vote_details( $plno ); 


					


					print_r($vd);  
					if ( !empty($vd) ) { 
						echo " $plno exist ";

						if (  $val['lvoption1'] > 0 ) {
							 $vd[0]['tlvoption1']++;
							 echo "opt 1";
						}
						if ( $val['lvoption2'] > 0  ) { 
							$vd[0]['tlvoption2']++;
							echo "opt 2";
						}
						if ( $val['lvoption3'] > 0  ) { 
							$vd[0]['tlvoption3']++; 
							echo "opt 3";
						}
						if ( $val['lvoption4'] > 0  ) {   
							$vd[0]['tlvoption4']++;
							echo "opt 4";
						}
						if ( $val['lvoption5'] > 0  ) { 
							$vd[0]['tlvoption5']++;
							echo "opt 5";
						}
						if ( $val['lvoption6'] > 0  ) { 
							$vd[0]['tlvoption6']++;
							echo "opt 6";
						}
						if ( $val['lvoption7'] > 0  ) { 
							$vd[0]['tlvoption7']++;
							echo "opt 7";
						}
						echo "opt 4 is = ".$vd[0]['tlvoption4'];  
						$sum = $vd[0]['tlvoption1']+ $vd[0]['tlvoption2']+ $vd[0]['tlvoption3']+$vd[0]['tlvoption4']+ $vd[0]['tlvoption5']+ $vd[0]['tlvoption6']+ $vd[0]['tlvoption7']; 
						update_v1( 
			        		array(
				        		'table_name'=>'fs_look_votes_details',
				        		'tlvoption1'=>$vd[0]['tlvoption1'],
				        		'tlvoption2'=>$vd[0]['tlvoption2'],
				        		'tlvoption3'=>$vd[0]['tlvoption3'],
				        		'tlvoption4'=>$vd[0]['tlvoption4'],
				        		'tlvoption5'=>$vd[0]['tlvoption5'],
				        		'tlvoption6'=>$vd[0]['tlvoption6'],
				        		'tlvoption7'=>$vd[0]['tlvoption7'],
				        		'tlvsum'    => $sum
				        	) ,
			        		array(
			        			'plno'=>$plno
		        			)  
		        		); 
					}
					else{
						echo " $plno 	not exist "; 
						if (  $val['lvoption1'] > 0 ) { 
							$lvoption1 = 1; 
						}
						if ( $val['lvoption2'] > 0  ) {  
							$lvoption2 = 1; 
						}
						if ( $val['lvoption3'] > 0  ) {  
							$lvoption3 = 1; 
						}
						if ( $val['lvoption4'] > 0  ) {  
							$lvoption4 = 1;  
						}
						if ( $val['lvoption5'] > 0  ) {  
							$lvoption5 = 1; 
						}
						if ( $val['lvoption6'] > 0  ) {  
							$lvoption6 = 1; 
						}
						if ( $val['lvoption7'] > 0  ) {  
							$lvoption7 = 1; 
						}  
	 					$sum = $lvoption1 + $lvoption2 + $lvoption3 + $lvoption4 + $lvoption5 + $lvoption6 + $lvoption7; 
						insert_v1( 
							array( 
					            'plno'         =>  $plno,  
					            'tlvoption1'   =>  $lvoption1, 
					            'tlvoption2'   =>  $lvoption2, 
					            'tlvoption3'   =>  $lvoption3, 
					            'tlvoption4'   =>  $lvoption4, 
					            'tlvoption5'   =>  $lvoption5, 
					            'tlvoption6'   =>  $lvoption6, 
					            'tlvoption7'   =>  $lvoption7,
					            'tlvsum'       =>  $sum,
					            'tlvadate'     =>  date("Y-m-d H:i:s"),
					            'table_name'   =>  'fs_look_votes_details',
					            'row_id_name'  =>  'lvdno'
					        ) 
						);   
					} 
				}   
			    public function update_look_rating ( $plno ) { 

			    	$trating = $this->get_specific_look_overall_ratings( $plno );  


			    	#UPDATE RATING  
		        	update_v1( 
		        		array(
			        		'table_name'=>'postedlooks',
			        		'trating'=>$trating 
			        	) ,
		        		array(
		        			'plno'=>$plno
		        		)  
		        	);
		        	return $trating;
			    } 
			    public function update_look_percentage ( $plno , $trating , $toplookrating ) {  
			        $tpercentage  = $this->get_look_percentage( $plno , $trating , $toplookrating );   
			      	update_v1( 
		        		array(
			        		'table_name'=>'postedlooks',
			        		'tpercentage'=>$tpercentage
			        	) ,
		        		array(
		        			'plno'=>$plno
		        		)  
		        	); 
		        	return $tpercentage;
			    } 
				public function update_look_percentage_own (  $plno , $trating , $pltvotes ) {  
			        $tpercentage = $this->get_look_percentage_own( $plno , $trating , $pltvotes );  
			      	update_v1( 
		        		array(
			        		'table_name'=>'postedlooks',
			        		'tpercentage'=>$tpercentage
			        	) ,
		        		array(
		        			'plno'=>$plno
		        		)  
		        	); 
		        	return $tpercentage;
			    } 
			    public function update_look_vote ( $val , $mno , $plno ) { 

			    	update_v1( $val , array('mno'=>$mno,'plno'=>$plno) );  
			    }  
			    public function update_new_top_look_rating ( ) { 

			    	$max_look_rating = $this->get_max_look_rating( ); 
			    	$top_look_rating = $this->get_top_data( 'top_look_rating' );  


			   		if (  $max_look_rating > $top_look_rating  ) { 
				      	$this->update_top_data( 'top_look_rating' , $max_look_rating  ); 
				      	// echo "  $max_look_rating > $top_look_rating >  ";
				        return $max_look_rating;  
					}
					else if (  $max_look_rating < $top_look_rating  ) { 
						// echo " $max_look_rating < $top_look_rating ";
						return $top_look_rating; 
					}
					else{
						// echo " $max_look_rating < $top_look_rating ";
						return $max_look_rating; 
					}   
			    }
			    public function update_pl_top_look_rating ( $plno , $trating ) {  
			    	update_v1( 
		        		array(
			        		'table_name'=>'postedlooks',
			        		'pltoplookrating'=>$trating
			        	) ,
		        		array(
		        			'plno'=>$plno
		        		)  
		        	);
			    } 
			    public function update_or_get_look_precentage ( $plno ) { 

			    	$top_look_rating = $this->get_top_data( 'top_look_rating' ); 
			    	$pltoplookrating = $this->get_one_look_info( $plno , 'pltoplookrating' ); 
			    	$tpercentage   = $this->get_one_look_info( $plno , 'tpercentage' ); 


			    	if ( $pltoplookrating < $top_look_rating ) {   
			    		$trating    = $this->update_look_rating( $plno );   
			        	$toplookrating = $this->update_new_top_look_rating( ); 
			        	  				 $this->update_pl_top_look_rating( $plno , $toplookrating );
			        	$tpercentage = $this->update_look_percentage( $plno , $trating , $toplookrating );    
			        	return $tpercentage;
			    	}
			    	else if ( $pltoplookrating == $top_look_rating ) {  
			    		return $tpercentage;
			    	}
			    	else{ 
			    		return $tpercentage;	
			    	}  
			    }
			    public function update_total_votes ( $plno ) { 
					$loookvotes=selectV1(
				     	"*",
					 	"fs_look_votes",  
					 	 array('plno'=>$plno)
					);   
					$tlookvotes = count($loookvotes); 
			    	 update_v1( 
		        		array(
			        		'table_name'=>'postedlooks',
			        		'pltvotes'=>$tlookvotes
			        	) ,
		        		array(
		        			'plno'=>$plno
		        		)  
		        	);
			    	// echo " total look votes $tlookvotes "; 
			    	return $tlookvotes;
			    } 
			    public function insert_look_vote ( $val ) {

			    	insert_v1( $val );  
			    }  
			    public function is_look_i_already_voted ( $myvotes ) {

			    	return ( !empty($myvotes)) ? true : false ;
			    }  
		    #END RATING

		    #NEW REDIRECT PAGE
			    public function go( $link ) {  
					echo "<script type='text/javascript'>document.location='$link'</script>"; 
					exit; 
				}
				public function url_redirect_to_no_www( $actual_link ) { 
					if(strpos($actual_link,'www')){ 
						#with www 
						$this->go(str_replace('www.','',$actual_link));	
					}else{ 
						# no www
					}
				} 
		    #END REDIRECT PAGE


			#NEW RATE LOOK 
				public function get_rate_looks_order_by( $rate_looks ) {
					if ( $rate_looks  == 'All Looks' ) {
						$orderby = 'ORDER BY plno DESC'; 	 
					}
					else if ( $rate_looks  == 'Top Rated' ) { 
						$orderby = 'ORDER BY trating DESC'; 
					}
					else if ( $rate_looks  == 'Latest Articles' ) {  
						$orderby = 'ORDER BY artno DESC'; 	 
					}	
					else if ( $rate_looks  == 'Most Likes' ) { 
						$orderby = 'ORDER BY pltvotes DESC'; 
					} 
					return $orderby;
				} 

				public function remove_rated_looks( $looks , $mylookrated , $rate_status )  {  

					echo "looks <br><br<br<br";
					 print_r($looks); 
					echo "rated <br<br<br<br>";
					 print_r($mylookrated);  
					echo "  <br<br<br<br>";
					echo "rating stat = $rate_status ";  

					echo "My look rated total ". count($mylookrated) . '<br>';
					$plnos = array('');

				    if ( !empty( $looks )) { 
 
				    	$table_id = 'table_id'; // previous is plno new version is table_id
 
					 	$c=0; 
						for ($i=0; $i < count($looks) ; $i++) {    
							switch ($rate_status) { 
							 	case 'Rated': 
							 			#Rated  
										$rated = false;
										for ($j=0; $j < count($mylookrated) ; $j++) {   
											if ( $looks[$i]['plno']  == $mylookrated[$j]['table_id'] ) {   
												#if found then this look is rated
												$rated = true; 
												$j = count($mylookrated);  
											} 
										}

										echo "Rated here..";

										if($rated == true) {
											$plnos[$c]['plno'] = $looks[$i]['plno']; 	
										}
										$c++; 
							 		break; 
							 	default: 
							 		#Unrated 

							 			echo "Unrated here..";
										$rated = false;
										for ($j=0; $j < count($mylookrated) ; $j++) {    
											if ( $looks[$i]['plno']  == $mylookrated[$j]['table_id'] ) {   
												#if found then this look is rated
												$rated = true; 
												$j = count($mylookrated); 
											}
										} 

										if($rated == false) {
											$plnos[$c]['plno'] = $looks[$i]['plno']; 	
										}
										$c++; 

							 		break;
							}    

							#print modals 
							
							 
							# visible for text  results
							// echo "  $c.)  ".$looks[$i]['plno'].' style = '.$looks[$i]['style'].' trating =  '.$looks[$i]['trating'].'<br>';  
							// $this->modal_version1_look ( $looks[$i]['plno'] , '../../../' , null , 'display:none' , 'display:none;' , 'rate-look' ); 

						 
						}     
						return $plnos;
					}
					else{
						echo "<h7>no look results </h7>";	
					}
				}

				    /**
			     * @param $looks
			     * @param $ratings
			     * @param $get
			     * @return array
			     * Finalize both response of the other table like fs_favorite_modals, fs_rate_modals, ..... and postedlooks.
			     * So here we fetch if the favorited or rated or unrated
			     */
			    public  function ratedUnrated($looks, $ratings, $get, $table_name='postedlooks') { 

		    		$response = array();
			        $c  = 0;
			        $c1 = 0;
			        $rated = false; 

			     	echo "<br><BR><BR>ModalsModalsModalsModalsModalsModals<br><br><BR>";
			       print_r($looks);

			       echo "<br><BR><BR>ratings or favorited here .......... below <br><br><BR>";
			        print_r($ratings);

			       echo "get $get and start
			        <br>"; 

			      	/** Basic conditions */  
				   $row_id_name = $this->getModalIdName($table_name);

                   echo " row id nname =  $row_id_name table name = $table_name <br>";




					/** Start cleaning data */ 
			        if($get == 'Rated' || $get == 'Favorited') {
			            for($i=0; $i < count($looks); $i++ ) {
			                $plno = $looks[$i][$row_id_name]; 
	                		for ($j=0; $j < count($ratings) ; $j++) {   
								if ( $looks[$i][$row_id_name]  == $ratings[$j]['table_id'] ) {   
									#if found then this look is rated
									$response[$c][$row_id_name] = $plno;
		                            $response[$c]['stat'] = $get;
		                            $c++; 
		                            echo "PLNO FOUD PLNO FOUD PLNO FOUD PLNO FOUD PLNO FOUD PLNO FOUD $plno <BR>";  
									$rated = true; 
									$j = count($ratings);  
								} 
							}  
			            }
			            return $response;
			        }
			        else if ($get == 'Unrated') {
			            for($i=0; $i < count($looks); $i++ ) {
			                $plno = $looks[$i][$row_id_name];  
	                		for ($j=0; $j < count($ratings) ; $j++) {   
								if ( $looks[$i][$row_id_name]  == $ratings[$j]['table_id'] ) {   
								    $rated = true; 
									$j = count($ratings);  
								} 
							} 

			                if($rated == false) { 
		                        $response[$c][$row_id_name] = $plno;
		                        $response[$c]['stat'] = $get;
		                        $c++; 
			                } else {
			                    $rated = false;
			                }
			            }
			            return $response;
			        } else {
			        }  
			    }



				public function print_look_modals($modals, $table_name) {  
					echo "new total modals = " . count($modals); 
					print_r($modals);    
					for ($i=0; $i < count($modals) ; $i++) {   
						if($table_name == 'postedlooks') {  
							$plno = $modals[$i]['plno'];
						    // echo " This is the plno of the look $plno "; 
							$this->modal_version1_look (  $plno  , '../../../' , '../../../' , 'display:none' , 'display:block;' , 'rate-look' );   
						} else {   
							$artno = $modals[$i]['artno']; 
							echo "	before enter = $artno <br><Br> ";
							$this->modal_version1_article ( $artno  , '../../../' , '../../../' , null , null , 'rate-page' );  
						} 

					}   
				} 


				public function getModalIdName($table_name) {
					/** Basic conditions */
					if($table_name == 'postedlooks')  { 
 
						$row_id_name = 'plno';

					} elseif($table_name == 'fs_postedarticles') { 
 
						$row_id_name = 'artno';

					} else {  

					} 

					return $row_id_name; 
				}

				public function get_looks_filtered($mno, $rate_style,  $rate_gender,  $rate_plus_blogger,  $orderby, $start, $rate_limit, $table_name='postedlooks', $topic=NULL) { 

					/** Init */
					$where = '';  
					$and = false; 
					$topic = strtolower($topic);  
					echo " table name $table_name topic $topic <br>";
 
					/** Basic conditions */
					if($table_name == 'postedlooks')  {  
						$styleCat = 'style';   
					} elseif($table_name == 'fs_postedarticles') {  
						$styleCat = 'category';  

					} else {  
					} 

					/** Gender */
				 	if($rate_gender != 'Male Plus Female') { 
			            $where .= " $table_name.gender = '$rate_gender' "; 
			            $and = true;
			        }

			        /**Blogger type */
			        if($rate_plus_blogger != 'All Blogger') { 
			            if($and == true) {
			            	$where .= ' and ';
			            }   
			            $and = true; 
			            $where .= " $table_name.plus_blogger = '$rate_plus_blogger' ";   
			        }

			        /** style */
			        if($rate_style != 'All Style' and $rate_style != 'All Categories') {   
			        	if($and == true) {
			            	$where .= ' and ';   
			            } 
			            $and = true;    
			           	$where .= " $table_name.$styleCat = '$rate_style' ";	
			        }  

			        /** 
			        * Add topic for article 
			        * 
			        */  
			        if($table_name == 'fs_postedarticles') { 
			        	if(!empty($topic)) {  
				        	if(!empty($where)) { 
				        		$where .=  " and topic = '$topic' "; 
				        		$and = true; 
				        		echo " if topic added <br>"; 
				        	} 
				        	else { 
				        		$where .=  " topic =  '$topic' "; 
				        		$and = true; 
				        		echo " else topic added <br>"; 
				        	} 
			        	} 
			        	else { 
			        		echo " topic is empty <br>";
			        	}
			        } 
			        else { 
			        	echo " can't add topic because its not article <br>";
			        }
 

 					/** Else*/
		        	if($and == true) {
		            	$where .= ' and ';
		            }     



		            $and = true;
			        $where .= " active = 1 and mno <> $mno ";  
 					echo " where = $where  <br>"; 
 					echo " order by = $orderby <br>";  
		        	/** Retrieve look now*/

    				$modals = select_v3( 
				   		$table_name , 
				   		'*' , 
				   		"$where $orderby LIMIT $start , $rate_limit" 
				   	);  	  


    				echo "response";  
    				print_r($modals); 
				   	return $modals;  
				} 
			#END RATE LOOK	
		// S
			#NEW SAGUL
				public function set_check_profile_exist( $type , $mno ) {
					if ( $type == 'init' ) {
						 $profile_check_exist  = "$this->ppic_thumbnail/$mno.jpg";
					}else{
						$profile_check_exist  = "../../../$this->ppic_thumbnail/$mno.jpg";
					}				 	 
					return $profile_check_exist; 
			 	} 
			 	public function get_loop_start( $tres1 , $tres2 ) {
		        	$start = $tres1 * $tres2;
		        	$start = $start-$tres2;
		        	return $start; 
		        }
		        public function get_loop_end( $tres1 , $tres2 ) {
		        	$end = $tres1 * $tres2; 
		        	return $end;  
		        }
		        public function set_loop_counter( $counter ) {

		        	return $counter;
		        }   
		        public function get_res_len( $data ) {

		        	 return count($data);
		        } 
		        public function set_text_limit_show( $text , $limit ) { 

		 
		        	if ( strlen( $text ) > $limit ) {
		        		return substr($text, 0 , $limit )."..."; 
		        	}else{
		        		return $text;
		        	} 
		        } 
		        public function check_if_more( $current_text , $new_limitted_text ) {
		        	 if (  strlen($current_text) > strlen($new_limitted_text) ) {
		        	 	 return true;
		        	 	// echo " return true ";
		        	 }else{
		        	 	return false;
		        	 	// echo " return false";
		        	 }
		        }
		        public function set_member_title( $fullname , $occupation , $city , $state_ , $country  , $zip , $datejoined ) {  

		        	$fullname   = ( $fullname  == ""   or $fullname == "NULL"   ) ? "" : $fullname ; 
		        	$occupation = ( $occupation == "" or $occupation == "NULL" ) ? "" : $occupation  ; 


		        	/*
					* set new line
		        	*/
		        	 

			       	/*
					* check if the place is filled
			       	*/
			        	$country    = ( $country == "NULL"  or  strpos($country, 'COUNTRY') > -1 ) ? "" : " $country" ; 
			        	$state_     = ( $state_ == "NULL"   or  strpos($state_, 'STATE') > -1   ) ? "" : " $state_, " ; 
			        	$city       = ( $city == "NULL"     or  strpos($city, 'CITY') < 5   ) ? "" :  " $city,"   ; 
			        	$zip        = ( strpos($zip, 'ZIP') == null ) ? "" :  " $zip" ; 


		        	$datejoined = ( !empty($datejoined) and $datejoined != "NULL" ) ?  $datejoined."" :  "";  
 
		        	// echo " zip pos = ".strpos($zip, 'ZIP').' city '.strpos($city, 'CITY');

		        	$f =  " <div> $fullname</div> <div>  $occupation</div> <div> $city $state_ $country $zip </div> <div> $datejoined </div> "; 
		        	return $f;  
		        }
		        public function get_total_limit_show( $total_looks , $limit ) { 
		        	if (  $total_looks  > $limit ) { 
		        		// echo " $limit >  $total_looks <br><br><br><br><br><br> ";
		        		return $limit; 
		        	}
		        	else{ 
		        		// echo " $limit < $total_looks <br><br><br><br><br><br><br>";
		        		return $total_looks;
		        	}  
		        } 
				public function set_about_limit( $fullname , $aboutme , $limit1 , $limit2 ) {  
					if ( strlen($fullname) < 40 ) {
						$aboutme_limitted = $this->set_text_limit_show( $aboutme , $limit1 );  	 
					}
					else{
						$aboutme_limitted = $this->set_text_limit_show( $aboutme , $limit2 );  	 	
					}
					return $aboutme_limitted; 
				}  
				public function print_my_social_sites( $mno , $mno1  ) {   


					$meminfo = $this->get_specific_member_info( $mno1 );  
					 
					$url_facebook    = $meminfo[0]['url_facebook'];
					$url_twitter	 = $meminfo[0]['url_twitter'];
					$url_pinterest	 = $meminfo[0]['url_pinterest'];
					$url_instagram	 = $meminfo[0]['url_instagram'];
					$url_tumblr		 = $meminfo[0]['url_tumblr'];
					$url_web 		 = $meminfo[0]['url_web'];
					$url_google_plus = $meminfo[0]['url_google_plus']; 
					$mysocial        = false; 



					if ( !empty($url_facebook) || !empty($url_twitter) || !empty($url_pinterest) || !empty($url_instagram) || !empty($url_tumblr) ||  !empty($url_web) || !empty($url_google_plus)  ) {  
						$mysocial = true; 
					}




					if ( $mno != $mno1 ) { ?>
						<?php if ( $mysocial == true ) { ?>
							<td style="margin-top:0px;"     style='display:none'  >
								<div id="look-details-profile-look-owner-header-gray-bar" > 		 
		 						</div>  
		 					</td> 
							<td style='color:#d6051d; font-weight:bold;font-size:12px;' > VISIT MY </td> 
						<?php } ?>
							<!-- <td id=''> <img src="<?php echo $this->genImgs."/flag.png"; ?>"      title='flag'            /> </td>  -->
						<?php
					}
					else{ ?>
					 	<!-- <td id=''> <img src="<?php echo $this->genImgs."/edit.png"; ?>"      title='edit profile'    /> </td>  -->
						<?php 
					} 


					if ( !empty($url_facebook) ) { 
						echo "<td id='' > <a href='$url_facebook'      target='_blank'    >   <img src='$this->genImgs/facebook-red.png'        title='facebook'    /> </a> </td>";	
					}
					if ( !empty($url_twitter) ) { 
						echo "<td id='' > <a href='$url_twitter'       target='_blank'    >  <img src='$this->genImgs/twitter-red.png'         title='twitter'      /> </a></td>";
					}
					if ( !empty($url_pinterest) ) { 
						echo "<td id='' > <a href='$url_pinterest'     target='_blank'    >  <img src='$this->genImgs/tumblr-red.png'          title='tumblr'       /> </a></td>";
					}
					if ( !empty($url_instagram) ) { 
						echo "<td id='' > <a href='$url_instagram'     target='_blank'    >  <img src='$this->genImgs/Pinterest-red.png'       title='pinterest'    /> </a></td>";
					}
					if ( !empty($url_tumblr) ) { 
						echo "<td id='' > <a href='$url_tumblr'        target='_blank'    >  <img src='$this->genImgs/instagram-icon-red.png'  title='instagram'    /> </a></td>";
					}
					if ( !empty($url_web) ) { 
						echo "<td id='' > <a href='$url_web'           target='_blank'    >  <img src='$this->genImgs/google-icon-red.png'     title='google'       /> </a></td>";
					}
					if ( !empty($url_google_plus) ) { 
						echo "<td id='' > <a href='$url_google_plus'   target='_blank'    >  <img src='$this->genImgs/web-red.png'             title='web'           /> </a></td>";
					}
  
				}
				public function print_my_social_sites_v2( $mno , $mno1  ) {  
					
					$meminfo = $this->get_specific_member_info( $mno1 );  
					 
					$url_facebook    = $meminfo[0]['url_facebook'];
					$url_twitter	 = $meminfo[0]['url_twitter'];
					$url_pinterest	 = $meminfo[0]['url_pinterest'];
					$url_instagram	 = $meminfo[0]['url_instagram'];
					$url_tumblr		 = $meminfo[0]['url_tumblr'];
					$url_web 		 = $meminfo[0]['url_web'];
					$url_google_plus = $meminfo[0]['url_google_plus']; 
					$mysocial        = false;




					if ( !empty($url_facebook) || !empty($url_twitter) || !empty($url_pinterest) || !empty($url_instagram) || !empty($url_tumblr) ||  !empty($url_web) || !empty($url_google_plus)  ) {  
						$mysocial = true; 
					}





					if ( $mno != $mno1 ) { 
						if ( $mysocial == true ) {
							echo " 
							<li style='margin-left:5px;'  > 
						 		<div id='look-details-profile-look-owner-header-gray-bar'  > 		 
						 		</div> 
					 		</li>	
					 		"; 
					 	}
					 } 

					// $this->print_r1($meminfo); 
					echo " <table border='0' cellpadding='6' cellspacing='0'  style=' padding-top:2px;'  > 
						<tr> 
					";
	 
						if ( $mno != $mno1 ) { 
							if ( $mysocial == true ) { ?>

								<td style='color:#d6051d; font-weight:bold;font-size:12px;' >  VISIT MY  </td> 
								<!-- <td id=''> <img src="<?php echo $this->genImgs."/flag.png"; ?>"      title='flag'            /> </td>  --><?php
							}
						}
						else{ ?>
						 	<!-- <td id=''> <img src="<?php echo $this->genImgs."/edit.png"; ?>"      title='edit profile'    /> </td>  -->
							<?php 
						}





						if ( !empty($url_facebook) ) { 
							echo "<td id='' > <a href='$url_facebook'      target='_blank'    >   <img src='$this->genImgs/facebook-red.png'        title='facebook'    /> </a> </td>";	
						}
						if ( !empty($url_twitter) ) { 
							echo "<td id='' > <a href='$url_twitter'       target='_blank'    >  <img src='$this->genImgs/twitter-red.png'         title='twitter'      /> </a></td>";
						}
						if ( !empty($url_pinterest) ) { 
							echo "<td id='' > <a href='$url_pinterest'     target='_blank'    >  <img src='$this->genImgs/tumblr-red.png'          title='tumblr'       /> </a></td>";
						}
						if ( !empty($url_instagram) ) { 
							echo "<td id='' > <a href='$url_instagram'     target='_blank'    >  <img src='$this->genImgs/Pinterest-red.png'       title='pinterest'    /> </a></td>";
						}
						if ( !empty($url_tumblr) ) { 
							echo "<td id='' > <a href='$url_tumblr'        target='_blank'    >  <img src='$this->genImgs/instagram-icon-red.png'  title='instagram'    /> </a></td>";
						}
						if ( !empty($url_web) ) { 
							echo "<td id='' > <a href='$url_web'           target='_blank'    >  <img src='$this->genImgs/google-icon-red.png'     title='google'       /> </a></td>";
						}
						if ( !empty($url_google_plus) ) { 
							echo "<td id='' > <a href='$url_google_plus'   target='_blank'    >  <img src='$this->genImgs/web-red.png'             title='web'           /> </a></td>";
						}
					echo " </table>";
				}  
			 



				public function get_modal_position_detail( $table_id , $response , $key ) { 
					$c=count( $response );
					for ($i=0; $i < count( $response )  ; $i++) { 
						
						if ( $response[$i][$key] == $table_id ) {
							 return $c; 
						}  
						$c--; 
					}
				}
				public function print_look_footer_flag_or_edit( $mno , $mno1 , $table_id , $table_name , $src_img_flag , $link ) {  
						$src_img_flag = "modal-flag-dot-white.png";


					 	if ( $mno != $mno1 ) { 
					 		?>
					 			<td id='ld_pencil'  >  
				 					<!-- <div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo  $table_id; ?>' onclick="flag ( 'fs-flag' , '<?php echo $table_name; ?>' , '<?php echo  $table_id ?>' , '#modal-flag-icon<?php echo  $table_id ?>'  , '<?php echo "$this->genImgs/large-flag-red.png"; ?>' ) " > 	
										<img src="<?php echo "$this->genImgs/$src_img_flag "; ?>"  style=' height:17px;  ' id='modal-flag-icon<?php echo   $table_id ?>'  title='flag' /> 
									</div> --> 
									<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $ano; ?>' onclick="flag ( 'action' , '<?php echo $table_name; ?>'  , '<?php echo $table_id; ?>' , 'imgid' , 'imgsrc' , 'modal-flag-dropdown' ) "  > 	 
										<img src="<?php echo "$this->genImgs/$src_img_flag"; ?>"  style=' height:17px;  ' id='modal-flag-icon<?php echo $table_id; ?>'  title='more' /> 
									</div>    
									<!-- dropdown flag design  --> 
										<div style="margin-left:-250px; margin-top:20px; background-color:white" > 
	  										<?php  
	  											$this->fs_flag( 
	  												array(
	  													'type'=>'flag-modal-dropdown',
	  													'table_name'=>$table_name,
	  													'table_id'=>$table_id,
	  													'id'=>$table_id
	  												)
	  											);  
	  										?> 
  										</div> 
				 				</td>     
					 		<?php
 					 	} else {
					 		 ?>
						 		<td id='ld_pencil'  >  
						 		<?php if ( $table_name == 'postedlooks' ): ?>
						 			<a href='#' onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>') "    > 
						 		<?php else: ?>
						 			<a href="#"  onclick="fs_popup( 'postarticle' , 'postarticle' , 'design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' ) " >  
						 		<?php endif; ?> 
										<img src='fs_folders/images/attr/ld_pencil.png'  title='Edit' >
									</a>
								</td>
							 <?php 
					 	}
					 echo "</td> "; 
				}
				public function print_edit_and_flag_user( $mno , $mno1 ) { 

						# set icons 
						$response = $this->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $mno1 and table_name= 'fs_members' and mno = $mno "  )  );   
						if ( !empty($response) ) {
							  $look_attr['src_img_flag']        = "large-flag-red.png";
						}
						else { 
							$look_attr['src_img_flag']          = "look-grey-flag.png"; 
						} 
						if ( $mno != $mno1 ) {  
							/*
						 	echo " 
						 		<td id='ld_pencil'  > 
									<img id='modal-flag-icon' src=' $this->genImgs/$look_attr[src_img_flag]'  title='flag' style='cursor:pointer' onclick=\"flag ( 'fs-flag' , 'fs_members' , '$mno1 ' , '#modal-flag-icon'  , '$this->genImgs/large-flag-red.png' )\"  > 
								</td>
							";	  
							*/
					 	} else {
					 		echo " 
						 		<td id='ld_pencil'  > 
						 			<a href='account' >  
										<img src='$this->genImgs/large-edit-red.png'   title='Edit' >
									</a>  
								</td>
							";	  
					 	}
					 echo "</td> "; 
				}
				public function look_with_more( $table_id , $look_more_url , $table_name='postedlooks' )  {

					  if ( !empty( $look_more_url ) ) {
					  		$look_more_url = str_replace("."," ",$look_more_url ); 

					  	  	// return " <a  href='look-details-view-more?url=$look_more_url&id=$table_id' style='color:#d6051d' > view more </a>  ";
					  	  	return " <b><a  style='cursor:pointer;color:#d6051d' onclick=\"fs_popup( 'postarticle' , 'modal-detail' , 'view-more-look' , 'method' , '$table_id' , '$table_name' , 'type' )\"  style='color:#d6051d' > view more </a></b>  ";


					  }  
				}
				public function menu( ) {
					$this->auto_detect_path();
				 ?>   
					<div style="position:absolute;z-index:101"  id="fs-menu"  >  
						<table border="0" cellspacing="0" cellpadding="0"   >
							<tr> 
								<td onclick="Go('\')" style="cursor:pointer" >  <a href="\"> <img src="<?php echo "$this->genImgs/logo-fashionsponge1.png"; ?>"  /> </a> </td>
								<td onclick="Go('\')" style="padding-left:20px; cursor:pointer" >  <a href="\" style="font-family:misoLight" > (BETA)  </a> </td>
								<td style="padding-left:100px;" > <a href="\"> HOME </a> </td>
								<td style="padding-left:30px;"> <a href="#" > ABOUT FASHION SPONGE </a></td>
								<td style="padding-left:30px;"> <a href="post-look-read"> ABOUT CONTEST </a></td>
								<td style="padding-left:30px;"> <a href="" style="color:#d6051d" >  | | | |  </a></td>
						</table>
					</div>  


					<style type="text/css">  

						#fs-menu         {  color: #fff; border: 1px solid none; margin-top:30px; margin-left: 90px;   }
						#fs-menu table   { text-align: left; width:800px } 
						#fs-menu td      { } 
						#fs-menu a       {  color: #fff; text-decoration: none; font-family: 'arial'; font-size: 12px; }
						#fs-menu a:hover {  color: #b32727;    } 
					</style> 
					<?php  
				}
				public function posted_look_modals_share_icons ( $plno ) { ?>   
					<div  style="position:absolute;border:1px solid none; margin-top:-18px; z-index:120; display:none; padding-top:5px; " id="lookdetails_dropdown_share"   >   
						<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals'  style='width:286px; height:55px; '  />   
						<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;margin-top:-32px; margin-left:40px;"  onclick="return false" > 
								<tr> 
									<td  style="padding-left:0px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"     onclick="fbshare('<?php echo $plno; ?>','home');" ></td>  
					            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"      onclick="twitter_look('<?php echo $plno; ?>' , '<?php echo $lookname; ?>' ) "   ></td>  	
					            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"       onclick="share_tumblr_looks('<?php echo $plno; ?>')" >                      </td>  
					            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_q.png"    title = "pinterest"    onclick="share_pinterest( '<?php echo $plno; ?>'  )" ></td>  
					            <td  style="padding-left:7px;cursor:pointer" > <a href="https://plus.google.com/share?url={http://fashionsponge.com/lookdetails?id=<?php echo $plno; ?>}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> 
					            					  <img  style="width:20px" src="fs_folders/images/attr/ld_white_g+.png"   title = "google+"            				   > </a> </td>  
					            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_line.png" title = "stumbleupon"  onclick="PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $plno; ?>&src=badge','Share to StumbleUpon +',800,540)" ></td> 
					            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_mail.png" title = "email" onclick="share_gmail_looks( '<?php echo $plno; ?>' )"  ></td> 
							</table>   
					</div><?php 
				} 
				public function print_rating_bubble( $mno , $plno ) {   
					$this->auto_detect_path();   
				    $rating = $this->get_my_rate_to_this_look( $mno , $plno );   
				    $user_voted = ( !empty( $rating[0]['rating'] ) ) ? $rating[0]['rating'] : 0 ;  

					?>   
					<div  id="rating-stars-wrapper"  >   
						<img src="<?php echo $this->genImgs;?>/Rate-Bubble.png" id='rating-stars-bubble'  />     
							<?php if ( empty($user_voted) ) { ?> 
								<ul id="rating-ul"   >  
									<li onmouseover="rating_change( '1' )"  onclick="rating_vote_now( '1' , '<?php echo $plno; ?>' , '<?php echo $mno; ?>' )"  >  </li>
									<li onmouseover="rating_change( '2' )"  onclick="rating_vote_now( '2' , '<?php echo $plno; ?>' , '<?php echo $mno; ?>' )" >  </li>
									<li onmouseover="rating_change( '3' )"  onclick="rating_vote_now( '3' , '<?php echo $plno; ?>' , '<?php echo $mno; ?>' )" >  </li>
									<li onmouseover="rating_change( '4' )"  onclick="rating_vote_now( '4' , '<?php echo $plno; ?>' , '<?php echo $mno; ?>' )" >  </li>
									<li onmouseover="rating_change( '5' )"  onclick="rating_vote_now( '5' , '<?php echo $plno; ?>' , '<?php echo $mno; ?>' )" >  </li>
								</ul> 
								<div  id="rating-star-image-container" > 
									<img src="<?php echo $this->genImgs;?>/0-star.png" class='rating-stars' id='rating_image0' style=' '   >     
									<img src="<?php echo $this->genImgs;?>/1-star.png" class='rating-stars' id='rating_image1' style=' display:none; '   >     
									<img src="<?php echo $this->genImgs;?>/2-star.png" class='rating-stars' id='rating_image2' style=' display:none; '   >     
									<img src="<?php echo $this->genImgs;?>/3-star.png" class='rating-stars' id='rating_image3' style=' display:none; '   >     
									<img src="<?php echo $this->genImgs;?>/4-star.png" class='rating-stars' id='rating_image4' style=' display:none; '   >     
									<img src="<?php echo $this->genImgs;?>/5-star.png" class='rating-stars' id='rating_image5' style=' display:none; '   >     
								</div>
							<?php  
							} 
							else { ?>
								<div  id="rating-star-image-container" > 
									<img src="<?php echo $this->genImgs;?>/<?php echo "$user_voted"; ?>-star.png" id='rating_image_voted'  style='margin-left:20px; margin-top:5px; height:30px;  '   onmouseover="rating_change( '<?php echo "$user_voted"; ?>' )"   >     
								</div>
								 <?php 
							} ?>   
					</div>     
					<style type="text/css">

						#rating-stars-wrapper { 
							border:1px solid none; 
							background: none; 
							height:50px; 
							width:200px;
						}
						#rating-stars-bubble { 
							opacity: 0.5; 
							float: left;  

						}
						#rating-star-image-container { 
							position: absolute;
						}
						.rating-stars { 
							margin-left:20px; 
							margin-top:5px; 
							height:auto; 
							z-index: 100;
							height: 30px; 
						}
						#rating-ul { 
							position: absolute;
							/*border: 1px solid red;*/
							padding: 0px; 
							margin: 0px;
							padding-left: 20px; 
							z-index: 101;
						}
						#rating-ul li { 
							/*border: 1px solid #000;*/
							list-style: none; 
							float: left;
							width: 30px;
							height: 25px;
							margin-top: 5px;
							cursor: pointer;
						} 
					</style>
					<?php
				}  
				public function print_rating_message( $mno , $plno ) { 
					$rating = $this->get_my_rate_to_this_look( $mno , $plno );   
					 
					$r = ( !empty($rating[0]['rating'])) ? $rating[0]['rating'] : 0 ;
				    $rating_comment_style = ( !empty( $rating[0]['rating'] ) ) ? 'display:block' : 'display:none' ;  
					?>   
					<style type="text/css">
						#rating_message1 , #rating_message2 , #rating_message3 , #rating_message4 , #rating_message5 { display: none  }
						#rating_message<?php echo $r ?> { display: block }
					</style>

						<div id="ratings-star-comments-table" style="<?php echo "$rating_comment_style"; ?>" > 
							<!-- <div id='ressss' > res here  </div> -->
							<center>
								<div class="rating_message" id="rating_message1" > 
									<div> <b>1 STARS</b> (Terrible Styling) [ 0% ]  </div>
							 		<div style="font-size:12px; " > 
										Look is not a Streetwear look.
										Garments don't compliment the body. <br>
										Bad combination of colors. 
										A lack or misuse of accessories.
										Garments don't work well together. 
							 		</div> 
								</div> 
								<div class="rating_message" id="rating_message2" > 
									<div> <b>2 STARS</b> (Poor Styling) [ 25% ] </div>
							 		<div style="font-size:12px;" >
							 			Look is "STREET STYLE" [ 10% ]
										Garments coordinate well together. [ 15% ] <br>
										Garments don't compliment the body.
										Bad color combination.
										A lack or misuse of accessories.
							 		</div> 
								</div> 
								<div class="rating_message" id="rating_message3"> 
									<div> <b> 3 STARS</b> (Good Styling) [ 45% ] </div>
							 		<div style="font-size:12px;" >
							 			Look is not a Streetwear look. [ 10% ]
										Garments compliment the body. [ 15% ] <br>
										Good combination of colors. [ 20% ]  
										A lack or misuse of accessories.
										Garments don't work well together. 
							 		</div> 
								</div> 
								<div class="rating_message" id="rating_message4" > 
									<div> <b> 4 STARS</b>  (Very Good Styling) [ 70% ] </div>
							 		<div style="font-size:12px;" >
							 			Look is not a Streetwear look. [ 10% ]
										Garments compliment the body. [ 15% ] <br>
										Good combination of colors. [ 20% ]
										Appropriate use of accessories. [ 25% ]
										Garments don't work well together. 
							 		</div> 
								</div> 
								<div class="rating_message" id="rating_message5" > 
									<div> <b>5 STARS </b> (Excellent Styling) [ 100% ] </div>
							 		<div style="font-size:12px;" >  
										Look is a Streetwear look. [ 10% ]
										Garments compliment the body. [ 15% ] <br>
										Good combination of colors. [ 20% ]
										Appropriate use of accessories. [ 25% ]
										Garments coordinates well together. [ 30% ]
							 		</div> 
								</div> 
							</center> 
						</div>     
						<style type="text/css">
							#ratings-star-comments-table {
								border-bottom: 1px solid #ffffff; 
								position: absolute; 
								margin-top: -66px;
								background-color: #000;
								width:100%;
								height: 65px;
								color:  #ffffff; 
							}	 
							#ratings-star-comments-table div { 
								font-size: 12px; 
								font-family: 'arial';
							}	
							.rating_message { 
								margin-top: 10px;
							}	
						</style>

					<?php  
				}  
				public function print_choose_votes_version2( $mno , $plno , $plstyle ) {   

			    	$myvote = $this->get_my_look_vote( $mno , $plno );     



			      	$lvoption1  = ( !empty($myvote[0]['lvoption1'])) ? $myvote[0]['lvoption1'] : 0 ;   
			      	$lvoption2  = ( !empty($myvote[0]['lvoption2'])) ? $myvote[0]['lvoption2'] : 0 ;   
			      	$lvoption3  = ( !empty($myvote[0]['lvoption3'])) ? $myvote[0]['lvoption3'] : 0 ;   
			      	$lvoption4  = ( !empty($myvote[0]['lvoption4'])) ? $myvote[0]['lvoption4'] : 0 ;   
			      	$lvoption5  = ( !empty($myvote[0]['lvoption5'])) ? $myvote[0]['lvoption5'] : 0 ;   
			      	$lvoption6  = ( !empty($myvote[0]['lvoption6'])) ? $myvote[0]['lvoption6'] : 0 ; 
			      	$lvoption7  = ( !empty($myvote[0]['lvoption7'])) ? $myvote[0]['lvoption7'] : 0 ;   
			  		if ( !empty( $myvote ) ) {   $dasable = 'disabled'; }else{ $dasable = ''; }  
			  		$ratings_version2_blocker = ( !empty( $myvote ) ) ? 'display:block' : 'display:none' ; 

			  		$choices1 = 14;
			  		$choices2 = 14;
			  		$choices3 = 14;
			  		$choices4 = 14;
			  		$choices5 = 14;
			  		$choices6 = 15;
			  		$choices7 = 15;  
			  		?> 

			  		<div id='ratings-version2-blocker' title=" view rating details"  style="<?php echo $ratings_version2_blocker; ?>"  onclick="show_look_rating_detail( '<?php echo $plno; ?>' )" > 
			  		</div> 
					<div id="ratings-version2-table"  >    
						<!-- 
							<div id="resss" >
								res
							</div>  
						-->

						<div style="text-align:center; font-size:20px; font-weight:bold;font-family:arial; padding-top:8px; padding-bottom:8px;" >
							Rate by selecting the choices that you believe are true about this look
						</div>
						<div id="rating-c-m-container"  > 
						 	<ul> 
						 		<li id="rating-checbox" > 
						 		 	<?php  
						 		 		if ( empty($lvoption1) ) {
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices1' id='rating-options1' class='rating-options' $dasable>";	 
						 		 		}
						 		 		else{
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices1' id='rating-options1' class='rating-options' checked  $dasable>";
						 		 		} 
						 			?> 
						 		</li>
						 		<li id="rating-message" > Do the clothes <br> compliment their body?    		  </li> 
								<li id="rating-checbox" > 
									<?php  
						 		 		if ( empty($lvoption2) ) {
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices2' id='rating-options2' class='rating-options' $dasable> ";	 
						 		 		}
						 		 		else{
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices2' id='rating-options2' class='rating-options' checked $dasable> ";	 
						 		 		} 
						 			?> 
								</li> 
								<li id="rating-message" > Did they use <br> complimenting colors?              </li>
								<li id="rating-checbox" > 
									<?php  
						 		 		if ( empty($lvoption3) ) {
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices3' id='rating-options3' class='rating-options' $dasable> ";	 
						 		 		}
						 		 		else{
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices3' id='rating-options3' class='rating-options' checked $dasable> ";	 
						 		 		} 
						 			?>   
								</li> 
								<li id="rating-message" > Did they appropriately accessorize this look?   </li>
								<li id="rating-checbox" > 
									<?php  
						 		 		if ( empty($lvoption4) ) { 
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices4' id='rating-options4' class='rating-options' $dasable> ";	 
						 		 		}
						 		 		else{
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices4' id='rating-options4' class='rating-options' checked $dasable> ";	 
						 		 		} 
						 			?>   
								</li> 
								<li id="rating-message" > Do all the garments coordinate together?  	  </li>
								<li id="rating-checbox" > 
									<?php  
						 		 		if ( empty($lvoption5) ) {
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices5' id='rating-options5' class='rating-options' $dasable> ";	 
						 		 		}
						 		 		else{
						 		 			echo "<input type='checkbox' name='vehicle' value='$choices5' id='rating-options5' class='rating-options' checked $dasable> ";	 
						 		 		} 
						 			?>  
								</li> 
								<li id="rating-message" > Would you categorize this look as <?php echo $plstyle; ?>   </li>
						 	</ul> 
					 	</div> 
					 	<div id="vote-button-container" >  
					 		<div style="position:absolute" >
					 			<ul> 
							 		<li style="width:20px;"  >
							 			<?php  
							 		 		if ( empty($lvoption6) ) {
							 		 			echo "<input type='checkbox' name='vehicle' value='$choices6' id='rating-options6' class='rating-options'   $dasable>";	 
							 		 		}
							 		 		else{
							 		 			echo "<input type='checkbox' name='vehicle' value='$choices6' id='rating-options6' class='rating-options' checked  $dasable> ";	 
							 		 		} 
						 				?>    
							 		</li>
							 		<li style="width:320px;" > Is the styling in this look<br> memorable, inspirational or mind-blowing? </li>  
							 		<li style="width:20px;"  > 
							 			<?php  
							 		 		if ( empty($lvoption7) ) {
							 		 			echo "<input type='checkbox' name='vehicle' value='$choices7' id='rating-options7' class='rating-options'   $dasable>";	 
							 		 		}
							 		 		else{
							 		 			echo "<input type='checkbox' name='vehicle' value='$choices7' id='rating-options7' class='rating-options' checked  $dasable> ";	 
							 		 		} 
						 				?>    
							 		</li>	
							 		<li style="width:315px;" > Did they apply details that<br> made a major impact on the overall look? </li>  
						 		</ul>  	
					 		</div>
					 		<div id="vote-button">  

					 				<img id='vote-loader' src="fs_folders/images/attr/loading 2.gif"  style=""  >
					 				<input type="button" id="vote-button-rating" value="vote" onclick="rating_version2_vote_clicked( '<?php echo $mno; ?>' , '<?php echo $plno; ?>' )"   >	 	   
					 				
					 			<div id="vote-button-detail" onclick="show_look_rating_detail( '<?php echo $plno; ?>' )" >
					 			 	view more
					 			</div>  
					 		</div>  
					 	</div>
					</div>     
					<style type="text/css">

						#ratings-version2-blocker { 
								border-bottom: 1px solid #ffffff; 
								position: absolute; 
								margin-top: -130px;
								background-color: #ccc;
								width:890px;
								height: 130px;
								color:  #ffffff; 
								z-index: 101;
								filter: alpha(opacity=30);
								filter: progid:DXImageTransform.Microsoft.Alpha(opacity=30);
								opacity:0.3;
								-moz-opacity: 0.30; 
								zoom: 1; 
								cursor: pointer;
						}
						#ratings-version2-table { 
							border-bottom: 1px solid #ffffff; 
							position: absolute; 
							margin-top: -130px;
							background-color: #000;
							width:890px;
							height: 130px;
							color:  #ffffff; 
							z-index: 100;
						}	 
						#rating-c-m-container{ 
							/*border:1px solid #000; */
							height:35px; 
						}
						#vote-button-container { 
							/*border:1px solid green;*/
							height: auto;
						} 
						#vote-button-container ul {  
						} 
						#vote-button-container ul li { 
						 	list-style: none;
						 	/*border: 1px solid red;*/
						}  
						#vote-button { 
							/*border: 1px solid green; */
							float:right; 
							margin-right: 1px;
							margin-right: 30px; 
							padding:0px; 
							width: 155px; 
							height: 20px;  
						} 
						#vote-button-detail {
							border:1px solid #000; 
							font-family:arial;
							font-size:12px; 
							float:left; 
							margin-left:5px; 
							cursor:pointer; 
							margin-top:1px; 
						}
						#vote-loader { 
							display:none;
							height:12px; 
							width:26px;
							float:left; 
							position:absolute; 
							z-index:100; 
							margin-top:5px;  
							margin-left:20px;
						}
						#vote-button-rating { 
							background:url('fs_folders/images/genImg/lookdetails-vote-button.png'); 
							background-repeat:no-repeat;
							position:relative; 
							z-index:99; 
							height:22px;
							width:70px;
							padding:0px; 
							background-size:70px 22px; 
							float:left; 
							color:#fff; 
							border:none; 
							cursor:pointer; 
						} 
						#ratings-version2-table ul { 
							padding: 0px; 
							padding-left: 20px;
							margin-top: 0px; 
						}
						#ratings-version2-table ul li { 
							/*border: 1px solid white;*/
							float: left; 
							font-size: 12px;
							font-family: arial;
						}
						#ratings-version2-table ul li input { 
							position: relative;
							z-index: 101;
						}   
						#ratings-version2-table ul li input:hover { 

							 cursor: pointer;
						}    
						#rating-checbox { 
							width: 20px; 
							list-style: none;
						} 
						#rating-message { 
							list-style: none;
							width: 150px; 
						} 
					</style><?php 
				} 
				public function print_specific_look_ratings( $array=null  ) { 

					$look_attr['trating']	 = $array['trating']; 
					$look_attr['table_name'] = $array['table_name'];       
					$look_attr['table_id']   = $array['table_id']; 
					$look_attr['category']   = $array['category'];  
					?>
						<div id='specific-look-rating-container-wrapper' > 
							<div id="specific-look-rating-text" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $look_attr['table_name']; ?>' , '<?php echo $look_attr['table_id']; ?>' , 'RATINGS ( <?php echo "$look_attr[trating]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' , '<?php echo $look_attr['category']; ?>' )" > 
								RATES ( <span id='pltvotes' ><?php echo $look_attr['trating']; ?></span> )	
							</div> 
							<div id="specific-look-rating-container"  >  
							</div>    
						</div>
						<style type="text/css">

							#specific-look-rating-container-wrapper{ 
								/*border: 1px solid red;*/
								width: 179px;
								height:25px; 
							}
							#specific-look-rating-container { 
								background:url('fs_folders/images/genImg/Rate-Bubble.png'); 
								background-repeat:no-repeat; 
								background-size: 130px 25px;  
								height:25px; 
								width:177px; 
								/*border:1px solid #000;*/
								text-align:center 
								filter: alpha(opacity=30);
								filter: progid:DXImageTransform.Microsoft.Alpha(opacity=30);
								opacity:0.3;
								-moz-opacity: 0.30; 
								zoom: 1;
							} 
							#specific-look-rating-text{
								/*border: 1px solid green;*/
								position: absolute;
								color:white;
								font-family:arial; 
								margin-top:5px;
								opacity: 0px;
								z-index: 101;
								width: 150px; 
								text-align: left; 
								margin-left: 20px; 
								font-size: 12px; 
								font-weight: bold;
							}   
						</style> <?php  
				} 
				public function print_look_details_look_owner_header(  $array=array() ) { 
					

					$table_name              = ( !empty($array['table_name']) ) ? $array['table_name'] : 'postedlooks' ;   			  // table name
					$mno                     = $array['mno'];                                                                         // user logon 
					$mno1                    = $array['mno1'];                                                                        // modal owner
					$table_id                = $array['table_id'];                                                                    // current modal id 
					$table_id_1              = $array['table_id_1'];                                                                  // next modal id 
					$inside_modals           = $array['inside_modals'];                                                               // boolean 
					$lookOwnerMno            = $array['lookOwnerMno'];                                                                // mno owner of the modal
					$lookOwnerName           = $array['lookOwnerName'];                                                               // modal owner name
					$opercentage             = $array['opercentage'];                                                                 // over all percentage of the modal owner 
					$date_                   = $array['date_'];                                                                       // date modal uploaded
					$user_total_rating       = $array['user_total_rating'];                                                           // trating of the modal
					$user_total_followers    = $array['user_total_followers'];                                                        // tfollower of the owner modal
					$user_total_following    = $array['user_total_following'];                                                        // tfollowing of the owner modal
					$user_total_lookuploaded = $array['user_total_lookuploaded'];                                                     // tlook of the owner modal
					$link_edit 			     = $array['link_edit']; 			                                                      // table name 

					$username = $this->get_username_by_mno( $lookOwnerMno );
					$is_mine = ( $mno != $mno1 ) ? false : true;  


					if ( $table_name == 'postedlooks' ) {
						$t1 = 'Total Look';
					}
					else{
						$t1 = 'Total Article';
					}


					?>   
					<div id="look-details-profile-look-owner-header" > 
						<ul style="width:930px; border:1px solid none;" >
							<li>
								<a href="<?php echo "$username"; ?>"> 
									<?php 
									if ( $inside_modals ) {
										$this->member_thumbnail_display( $this->ppic_thumbnail , $lookOwnerMno , "../../../".$this->ppic_thumbnail  );  
									}
									else{ 
										// echo "this is the popup";
										$this->member_thumbnail_display( $this->ppic_thumbnail , $lookOwnerMno ); 
									}?> 
								</a>
							</li> 
							<li style="margin-left:10px; position:absolute; width:890px; margin-left:60px; margin-top:-2px; " > 
								<ul> 
									<li> 
										<div style="font-size:12px; font-family:arial" >
											<div> POSTED BY <span > <b>  <?php echo "<a href='$username' target='_parent' style='text-decoration:none; color: #b32727' >  ".strtoupper($lookOwnerName)."  </a>"; ?> </b> ON <b> <?php  echo $this->dateTime_convert($date_); ?> </b> </span>   </div>   
										</div> 
									</li>
									<li style="margin-top:7px;" > 
									 	<ul>
									 		<li>   
									 			<div id='look-details-profile-look-owner-header-percentage' >
									 				<?php echo $opercentage; ?><span style='font-size:20px;' > % </span>
									 			</div>
									 		</li>
									 		<li> 
										 		<div id='look-details-profile-look-owner-header-tratings' >
										 			<div id="look-details-profile-look-owner-header-text" >
										 				<?php echo $user_total_rating; ?> RATINGS	
										 			</div> 
										 		</div>
									 		</li> 
									 		<li> 
									 			<table border="0" cellpadding="3" cellspacing="0" style="margin-top:8px; margin-left:10px;"  title="(<?php echo $user_total_lookuploaded; ?>) <?php echo $t1; ?>" >
									 				<tr> 
									 					<td> 
									 						<div id='look-details-profile-look-owner-header-lookuploaded' > 
										 					</div> 
									 					</td>
									 					<td> 
									 						<div id="look-details-profile-look-owner-header-text"  ><b> <?php echo $user_total_lookuploaded; ?> </b> </div> 
									 					</td>
									 			</table> 
									 		</li>  
									 			<?php  
								 				if ( $is_mine == false ) {  
								 					echo " 
								 						<li> 
									 						<div style='margin-top:4px; margin-left:5px; '  >
									 				";
										 				  $this->print_follow_unfollow( $mno , $mno1 );   

										 			echo " 
											 				</div>
											 			</li>
										 			"; 
								 				}  
									 			?> 
									 		<li  style="margin-left:3px;" > 
										 		<div id="look-details-profile-look-owner-header-gray-bar"  > 		 
										 		</div>
									 		</li>
									 		<li> 
									 			<table border="0" cellpadding="3" cellspacing="0" style="margin-top:8px; margin-left:6px;"  >
									 				<tr> 
									 					<td>  
									 						<div id="look-details-profile-look-owner-header-text"  >
									 							<a href="<?php echo "$username-followers"; ?>" target='_parent' style="font-weight:bold" >  FOLLOWERS  </a>				 
									 						</div> 
									 					</td>
									 					<td>  
										 					<div id="look-details-profile-look-owner-header-text"  > 
										 						<a href="<?php echo "$username-followers"; ?>" style="font-weight:bold" target='_parent' ><?php echo $user_total_followers;  ?>   </a>				 
										 					</div> 
									 					</td>
									 			</table> 
									 		</li>
								 			<li> 
								 				<div style="margin-top:8px; margin-left:10px; color:#284372; font-weight:bold" > / </div> 
								 			</li>
								 			<li>   
									 			<table border="0" cellpadding="3" cellspacing="0" style="margin-top:8px; margin-left:6px;"  >
									 				<tr> 
									 					<td>  
									 						<div id="look-details-profile-look-owner-header-text"  >
									 							<a href="<?php echo "$username-following"; ?>" style="font-weight:bold" target='_parent' >  FOLLOWING  </a>				 
									 						</div> 
									 					</td>
									 					<td>  
										 					<div id="look-details-profile-look-owner-header-text"  > 
										 						<a href="<?php echo "$username-following"; ?>" style="font-weight:bold" target='_parent' ><?php echo $user_total_following;  ?>   </a>				 
										 					</div> 
									 					</td>
									 			</table>   
									 		</li> 

									 		<?php if ( $is_mine == false ) {
									 			echo " <li> ";
									 				echo " <div style='margin-top:4px; margin-left:5px;' > ";
									 				$this->print_my_social_sites_v2( $mno , $mno1  );  
									 				echo " </div>";
									 			echo "</li>";
									 		}
									 		else {   
									 			?> 
										 		<li>
										 			<table border="0" cellpadding="3" cellspacing="0" style="margin-top:8px; margin-left:5px;" >
										 				<tr> 
										 					<td>  
																<?php if ( $table_name == 'postedlooks'): ?> 
																	<a href="#"  onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>') "   >   
																<?php else: ?>
																	<!-- <a href='<?php echo $link_edit; ?>' >  -->


																	<a href="#"  onclick="fs_popup( 'postarticle' , 'postarticle' , 'design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' ) " > 
																<?php endif; ?> 
										 							<div id="look-details-profile-look-owner-header-edit" > </div>  
										 						</a> 
										 					</td>
										 					<td>  
											 					<?php if ( $table_name == 'postedlooks'): ?> 
																	<a href="#"  onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' ) "   >  
																<?php else: ?>
																	<!-- <a href='<?php echo $link_edit; ?>' >  -->
																	<a href="#"  onclick="fs_popup( 'postarticle' , 'postarticle' , 'design' , 'edit' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' ) " >  
																<?php endif; ?> 
										 							<div id="look-details-profile-look-owner-header-text" > EDIT</div>  
										 						</a>	 
										 					</td>
										 			</table>
										 		</li>
										 		<li>
										 			<table border="0" cellpadding="3" cellspacing="0" style="margin-top:8px; margin-left:10px;" >
										 				<tr>  
										 					<td> <div id="look-details-profile-look-owner-header-delete" onclick="lookdetails_delete_look( '<?php echo "$table_id" ?>' , '<?php echo "$table_id_1" ?>', '<?php echo $table_name; ?>' )" > </div> </td>
										 					<td> <div id="look-details-profile-look-owner-header-text"   onclick="lookdetails_delete_look( '<?php echo "$table_id" ?>' , '<?php echo "$table_id_1" ?>' , '<?php echo $table_name; ?>' )" >  DELETE  </div></td>
										 			</table>
										 		</li>   
									 		<?php 
									 			// echo "<li> ";
									 				// $this->print_my_social_sites_v2( $mno , $mno  );  
									 			// echo "</li>";
									 		} ?> 
									 	</ul> 
									</li> 
								</ul>  
							</li> 
						</ul>
					</div>    
				<?php 
				}   
			#END SAGUL
		// T
			function string_limit($string, $limit, $type, $id) 
			{    
				if ($type == 'look') { 
					// echo "total char " . strlen($string); 
					
					if(strlen($string) <= $limit) { 
						 return $string;
					} 
					else {  
					 	$string = substr($string,0,$limit);
					    $string .= "... <a href='lookdetails-dev.php?id=$id'><span  class='modal-description-more-text' >see more</span></a>";	
					    return $string;
					}  
					//$string .= "<a href='lookdetails-dev.php?id=$id'><span  class='modal-description-more-text' >view more</span></a>";	 
				} 
				elseif ($type == 'article') { 
					// echo "total char " . strlen($string); 
					if(strlen($string) <= $limit) { 
					     return $string;
					} 
					else {  
					 	$string = substr($string,0,$limit);
					 	$string .= "... <a href='articledetails-dev.php?id=$id'><span  class='modal-description-more-text' >view more</span></a>";	
						  return $string;
					}  
					//$string .= "<a href='articledetails-dev.php?id=$id'><span  class='modal-description-more-text' >view more</span></a>";	
				} 
				else {  
					  // echo "limit $limit total char " . strlen($string); 
					if(strlen($string) <= $limit) {  
						// echo "no cut ";
					    return $string;
					} 
					else {  
						// echo "with cut ";
					 	$string = substr($string,0,$limit);
					 	return $string . '...'; 	
					} 
				}  


				return $string;
			} 

			#NEW TABLE QUERY 

				public function update_fs_table_auto( $mno , $arrayrows , $table ) {   

					#this function will auto update the data in the table when its  being called as function  
						$mno = intval($mno);  // table id 
						$reponse = false;     // response 
						$table   = $table;    // table name 
						// echo " mno = $mno <br> "; 
					switch ( $table ) {
						case 'fs_comment': 
								foreach ($arrayrows as $key => $value) { 
							 		// echo " $key => $value) "; 
									update_v1( 
						        		array(
							        		"table_name"=>'fs_comment',
							        		"$key"=>$value
							        	) ,
						        		array(
						        			'cno'=>$mno
						        		)  
						    		);   
							 	}
							break; 
						case 'fs_member_profile_pic':  
								foreach ($arrayrows as $key => $value) { 
							 		// echo " $key => $value) "; 
									update_v1( 
						        		array(
							        		"table_name"=>'fs_member_profile_pic',
							        		"$key"=>$value
							        	) ,
						        		array(
						        			'mppno'=>$mno
						        		)  
						    		);   
							 	}
							break; 
						case 'fs_members':  
								// echo " this is the member updates <br>";  
								foreach ($arrayrows as $key => $value) { 
							 		// echo " $key => $value) "; 
									$response = update_v1( 
						        		array(
							        		"table_name"=>'fs_members',
							        		"$key"=>$value
							        	) ,
						        		array(
						        			'mno'=>$mno
						        		)  
						    		);   


							 	}    
						 		// echo " to be update fs member ";
								// $this->print_r1( $arrayrows );  
								if ( in_array('tpercentage', $arrayrows) ) {  
									// $tpercentage = $this->get_overall_percentage_of_user ( $mno  , null );   
									update_v1( 
						        		array(
							        		"table_name"=>'fs_members',
							        		"tpercentage"=>$tpercentage
							        	) ,
						        		array(
						        			'mno'=>$mno
						        		)  
						    		);   
									// echo " user total percentage is $tpercentage and  update  <br>";
								}  
								if ( in_array('tlooks', $arrayrows) ) {
									$tlooks = count( $this->retreive_specific_user_all_looks( $mno ) ); 
									update_v1( 
						        		array(
							        		"table_name"=>'fs_members',
							        		"tlooks"=>$tlooks
							        	) ,
						        		array(
						        			'mno'=>$mno
						        		)  
						    		);   
						    		// echo " user total looks is $tlooks and  update  <br>"; 
								} 
								if ( in_array('tarticle', $arrayrows) ) {
									// echo " update tarticle <br>";
								} 
								if ( in_array('tmedia', $arrayrows) ) {
									// echo " update tmedia <br>";
								} 
								if ( in_array('tfollower', $arrayrows) ) {
									// echo " update tfollower <br>";
								} 
								if ( in_array('tfollowing', $arrayrows) ) {
									// echo " update tfollowing <br>";
								} 
								if ( in_array('trating', $arrayrows) ) { 
									$trating = $this->get_overall_total_rating_of_user ( $mno  , null ); 
									update_v1( 
						        		array(
							        		"table_name"=>'fs_members',
							        		"trating"=>$trating
							        	) ,
						        		array(
						        			'mno'=>$mno
						        		)  
						    		);   
									// echo " user total ratings is $trating and  update  <br>";
								} 
								if ( in_array('tview', $arrayrows) ) {
									// echo " update tview <br>";
								}  
								if ( in_array('fb_all_freinds', $arrayrows) ) {
									// echo " update fb_all_freinds <br>";
								} 
								if ( in_array('fb_freinds_on_fb', $arrayrows) ) {
									// echo " update fb_freinds_on_fb <br>";
								} 
								if ( in_array('fb_freinds_on_fs', $arrayrows) ) {
									// echo " update fb_freinds_on_fs <br>";
								}  
								else{
									// echo " nothing";
								}   
							break; 
						case 'postedlooks': 
								$plno = $mno;  
								// $this->print_r1( $arrayrows );  
							 	foreach ($arrayrows as $key => $value) { 
							 		// echo " $key => $value) "; 
									$response = update_v1( 
						        		array(
							        		"table_name"=>'postedlooks',
							        		"$key"=>$value
							        	) ,
						        		array(
						        			'plno'=>$plno
						        		)  
						    		);   
							 	}     
							break; 
						case 'fs_postedmedia':
								// echo " posted media update <br>";
								// $this->print_r1( $arrayrows ); 
							break;
						case 'fs_postedarticles':
								$artno = $mno;  
								// $this->print_r1( $arrayrows );  
							 	foreach ($arrayrows as $key => $value) { 
							 		// echo " $key SET $value) "; 
									$response = update_v1( 
						        		array(
							        		"table_name"=>"$table",
							        		"$key"=>$value
							        	) ,
						        		array(
						        			'artno'=>$artno
						        		)  
						    		);   
							 	}    

							 	// echo " where artno = $artno <br>";
								// echo " posted articles update <br>";
								// $this->print_r1( $arrayrows ); 
							break;
						default: 
							


							$this->print_r1 ( $arrayrows );

							$idname = $arrayrows['idname'];  
							$idval  = $arrayrows['idval'];  
							foreach ($arrayrows as $key => $value) { 
							 		// echo " $key set $value) "; 

									if ( $key != 'idname' or $key != 'idval'  ) {
										 
										$reponse= update_v1( 
							        		array(
								        		"table_name"=>$table,
								        		"$key"=>$value
								        	) ,
							        		array(
							        			$idname=>$idval
							        		)  
							    		);   

							    		$this->message( "update $key => $value  " , $response , " "); 
							    	}
							 	}
							 	// echo " default and updating the where $idname = $idval and ";
							break; 
					} 


					return $reponse;
				} 
				/*
				* tabelname: fs_meber  
				* created: march 1  , 2012 
				*/    
				public function fs_members_Query( $array ) {   
					 
					# initialized 

						$mno          = ( !empty($array['mno']) )        ? $array['mno'] : "" ;
						$fullname     = ( !empty($array['fullname']) )   ? $array['fullname'] : "" ;
						$lastname     = ( !empty($array['lastname']) )   ? $array['lastname'] : "" ;
						$middlename   = ( !empty($array['middlename']) ) ? $array['middlename'] : "" ;
						$firstname    = ( !empty($array['firstname']) )  ? $array['firstname'] : "" ;
						$nickname     = ( !empty($array['nickname']) )   ? $array['nickname'] : "" ;


				 

						$total  	  = array();
						#select

							$table_name  = ( !empty($array['table_name']) )  ? $array['table_name']  : 'mno > 0' ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'mno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'mno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ; 
 
 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'mno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;  

						# response 

							$response    = '';
							$tdb         = 'fs_members';     

						switch ( $type ) {
							case 'update-fullname-all':    
									#$mc->fs_members_Query( array('type'=>'update-fullname-all'  ,  'limit_start'=>0 , 'limit_end'=>100000)  ); 

									// get fname , lastname and nickname
										$response = select_v3( 
											$tdb, 
											'mno , lastname , middlename , firstname , nickname',
											"$where order by $orderby limit $limit_start , $limit_end"
										);    
									// update row fullname  
										for ($i=0; $i < count($response) ; $i++) {  
											$lastname   = $response[$i]['lastname']; 
											$middlename = $response[$i]['middlename']; 
											$firstname  = $response[$i]['firstname']; 
											$nickname   = $response[$i]['nickname'];    
											$mno        = $response[$i]['mno'];     
											$fullname = ucfirst($lastname).' '.ucfirst($nickname).' '.ucfirst($firstname); 
											echo " full name $fullname  <br>";     
											$this->update_fs_table_auto( $mno , array( 'fullname'=>$fullname ) , 'fs_members' );   
										}   
								break; 
							case 'update-fullname-specific':    
										# $mc->fs_members_Query( array('type'=>'update-fullname-specific' , "where" =>"mno = 966" )  );
										// get fname , lastname and nickname
											$response = select_v3( 
												$tdb, 
												'mno , lastname , middlename , firstname , nickname',
												"$where order by $orderby limit $limit_start , $limit_end"
											);     

										// update row fullname 
											$lastname   = $response[0]['lastname']; 
											$middlename = $response[0]['middlename']; 
											$firstname  = $response[0]['firstname']; 
											$nickname   = $response[0]['nickname'];    
											$mno        = $response[0]['mno'];       

											$fullname = ucfirst($lastname).' '.ucfirst($nickname).' '.ucfirst($firstname); 
											$this->update_fs_table_auto( $mno , array( 'fullname'=>$fullname ) , 'fs_members' );    
								break;  
							case 'update-tmodals':
								 		

								 	// get tlook 
										$total['look'] = $this->posted_modals_postedlooks_Query(  
									 		array(  
									 			'postedlooks_query'=>'get-tlook',
									 			'mno'=>$mno 
									 		) 
									 	); 
									 	$this->message(  " tlook is $total[look]  and its " , $total['look'] , ' ' );

									// get tarticle 

									 	$total['article'] = $this->fs_postedarticles( 
									 		array( 
									 			'aticle_type'=>'get-tarticle',
									 			'mno'=>$mno 
									 		)
									 	);
										$this->message(  " tlook is $total[article]  and its " , $total['article'] , ' ' );	

									// get tmedia 

									// get rating 

								    // get tpercentage 

								    // get trank

								    // get tfollowing 

								    // get tfollower 
 
								 	// update member  

										$response = mysql_query("UPDATE fs_members SET tlooks = $total[look] , tarticle = $total[article] WHERE mno = $mno "); 
										$this->message( " fs_member modal look , article update ", $response , " " );   
								break; 
							case 'update-user-percentage-and-ratings':


										# get user rows to be update for rating and percentage

											echo " this the table name $table_name <br> ";
											switch ( $table_name ) {
												case 'postedlooks': 
												 		$tpercentage_rowname = 'tpercentage_look';  
												 		$trating_rowname     = 'trating_look'; 
													break;
												case 'fs_postedarticles':
												 		$tpercentage_rowname = 'tpercentage_article'; 
												 		$trating_rowname     = 'trating_article'; 
													break; 
												default:
														$tpercentage_rowname = 'tpercentage_media'; 
														$trating_rowname     = 'trating_media'; 

													break;
											} 
								 		
								 		// get rating and percentage of the overall modal  

											// echo "<h2> this the user percentage and rating overall </h2>";  

											$response = $this->RATING( array( 'type'=> 'calculate-rating-and-percentage-overall-modals' , 'mno' => $mno , 'table_name'=>$table_name ) );
										  
										 // get the rating  and percentage of the overall user 

										 	$response1 = $this->RATING( array( 'type'=> 'calculate-member-overall-rating-and-percentage' , 'mno' => $mno ) );

										// update user perncentage     
 											
					  						$stat = mysql_query( "UPDATE fs_members SET $tpercentage_rowname = $response[tpercentage] , $trating_rowname = $response[trating] , trating = $response1[trating_user] , tpercentage = $response1[tpercentage_user] WHERE mno = $mno " ); 

					  						$this->message( "Updating the $tpercentage_rowname = $response[tpercentage] , $trating_rowname = $response[trating] ,  trating = $response1[trating_user] , tpercentage = $response1[tpercentage_user]  "  , $stat , '' );
 

								break;
							default: 
								break;
						}    
				} 
				/*
				* tabelname: fs_rate_modals  
				* created: july 14 , 2014 
				*/  
				public function posted_modals_rate_Query( $array ) {   
					/*
					* table: fs_rate_modals
					* rmno
					* mno ( int ) ( 25 )
					* table_id ( int ) ( 25 )
					* table_name ( 20 ) ( 25 )
					* rate_type ( varchar ) ( 10 )  ex: like , dislike
					* rate_date  ( datetime ) 
					*/ 
 

					// $this->print_r1( $array );  

					$rmno           = ( !empty($array['rmno']) )        ? $array['rmno'] : 0 ;
					$mno            = ( !empty($array['mno']) )         ? $array['mno'] : 0 ;  
					$tn             = ( !empty($array['table_name']) )  ? $array['table_name'] : 0 ;  
					$rt             = ( !empty($array['rate_type']) )   ? $array['rate_type'] : 0 ;  
					$tid            = ( !empty($array['table_id']) )    ? $array['table_id'] : 0 ;  
					$rq             = ( !empty($array['rate_query']) )  ? $array['rate_query'] : 0 ; 
					$orderby        = ( !empty($array['orderby']) )     ? $array['orderby']  : 'rmno desc' ;   
					$limit_start    = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0;
					$limit_end      = ( !empty($array['limit_end']) )   ? $array['limit_end'] : 100;   


					$tdb      = 'fs_rate_modals'; 
					$response = false;  
					// case 'postedlooks':  
					// case 'fs_postedmedia': 
					// case 'fs_postedarticles':   

					switch ( $rq ) {  
						case 'rate-insert':
								# ex:    $array = array(    'mno'=> 133,   'table_name'=>'postedlooks', 'rate_type'=>'like', 'table_id'=>3, 'rate_query'=>'rate-insert' );   
								$response = insert(
									$tdb,  
									array( 
										'mno',  
										'table_id',
										'rate_type',
										'table_name',
										'rate_date',  
									)
									,
									array( 
										$mno,  
										$tid,
										$rt,
										$tn,
										$this->date_time,
									),  
									'rmno'
								);     
								return $response; 
							break;
						case 'rate-update':
								# ex: $array = array(   'rmno'=> 5,   'rate_type'=>'like',  'rate_query'=>'rate-update' );   
								// echo " update "; 
								$response = update1( 
									'fs_rate_modals',
									'rate_type',
									"$rt",
									array( 'rmno' , $rmno )
								);  
								return $response;  
							break; 
						case 'rate-delete': 

								# ex: $array = array(    'table_id'=> 5,  'table_name'=> 'postedlooks',  'rate_query'=>'rate-delete' );   
								// $response = delete(
								// 		$tdb, 
								// 		array( 'table_id' , $tid ) 
								// );  



								// echo " delete ";
								$response = mysql_query("DELETE FROM $tdb WHERE table_id = $tid and table_name = '$tn' "); 
								return $response;

							break;   
						case 'get-rate-total-dislikes':  
     							# ex: $array = array(     'table_name'=>'postedlooks' , 'table_id'=>3, 'rate_query'=>'get-rate-total-dislikes' );   
								// echo " get total dislikes ";  
								$response = select_v3( 
									$tdb , 
									'*' , 
									"table_id = $tid and table_name = '$tn' and rate_type = 'dislike' " 
								);   
								return count($response);
							break;
						case 'get-rate-total-likes':   

								# ex: $array = array(     'table_name'=>'postedlooks' , 'table_id'=>3, 'rate_query'=>'get-rate-total-likes' );    
								// echo " get total dislikes ";  
								$response = select_v3( 
									$tdb , 
									'*' , 
									"table_id = $tid and table_name = '$tn' and rate_type = 'like' " 
								);   
								return count($response);
							break;  
						case 'get-rate-overall': 
								# ex: $array = array(     'table_name'=>'postedlooks' , 'table_id'=>3 , 'rate_query'=>'get-rate-overall'  );   
								$response = select_v3( 
									$tdb , 
									'*' , 
									"table_id = $tid and table_name = '$tn' " 
								);   
								return count($response);
							break;      
						case 'get-user-rated-type': 
								// echo " get-user-rated-type";
								# ex: $array = array(   'mno'=>$mno , 'table_name'=>'postedlooks' , 'table_id'=>3 , 'rate_query'=>'get-user-rated-type' );   
								$response = select_v3( 
									$tdb , 
									'*' , 
									"mno = $mno and table_id = $tid and table_name = '$tn' limit $limit_start , $limit_end" 
								);    
								// print_r($response);
								return  ( !empty($response[0]['rate_type']) ) ? $response[0]['rate_type'] : false ;  
							break;   
						case 'get-modal-rates': 
								// echo " get-user-rated-type";
								# ex: $array = array(   'mno'=>$mno , 'table_name'=>'postedlooks' , 'table_id'=>3 , 'rate_query'=>'get-user-rated-type' );   
								$response = select_v3( 
									$tdb , 
									'*' , 
									"table_id = $tid and table_name = '$tn' order by $orderby limit $limit_start , $limit_end " 
								);     
								return $response;   
							break; 
						default: 
							break;
					}  
				}  
				/*
				* tabelname: fs_drip_modals  
				* created: july 16 , 2014 
				*/   
				public function fs_drip_modals_Query( $array ) {   

					/*
					* table: fs_drip_modals
					* dmno
					* mno ( int ) ( 25 )
					* table_id ( int ) ( 25 )
					* table_name ( 20 ) ( 25 )
					* comment ( varchar ) ( 200)  
					* mno1  ( int ) ( 25 )
					* date ( timestamp )
					*/ 
 
		 
	  	 
	  	 
	  	 
	  	
					// $this->print_r1( $array );  

					$dmno           = ( !empty($array['dmno']) )        ? $array['dmno'] : 0 ;
					$mno            = ( !empty($array['mno']) )         ? $array['mno'] : 0 ;  
					$table_name     = ( !empty($array['table_name']) )  ? $array['table_name'] : 0 ;  
					$comment        = ( !empty($array['comment']) )     ? $array['comment'] : null ;  
					$table_id       = ( !empty($array['table_id']) )    ? $array['table_id'] : 0 ;  
					$mno1           = ( !empty($array['mno1']) )        ? $array['mno1'] : 0 ;   
					$query_drip     = ( !empty($array['query_drip']) )  ? $array['query_drip'] : 0 ;
					$query_order    = ( !empty($array['query_order']) ) ? $array['query_order'] : 'order by dmno desc';
					$query_where    = ( !empty($array['query_where']) ) ? $array['query_where'] : null; 
					$limit_start    = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0;
					$limit_end      = ( !empty($array['limit_end']) )   ? $array['limit_end'] : 100; 
					$tdb            = 'fs_drip_modals';


 
					$response = false;  
					// case 'postedlooks':  
					// case 'fs_postedmedia': 
					// case 'fs_postedarticles':   

					switch ( $query_drip ) {  
						case 'drip-insert':  
								#ex:
							   	#  $array = array(    'mno'=> 133,  'table_id'=>3 , 'table_name'=>'postedlooks', 'comment'=>'this is a comment' , 'mno1'=> 134 ,'query_drip'=>'drip-insert' );    
 								#  $response =  $mc->fs_drip_modals_Query ( $array ); 

								$response = insert(
									$tdb,  
									array( 
										'mno',  
										'table_id', 
										'table_name', 
										'comment',
										'mno1'
									)
									,
									array( 
										$mno,  
										$table_id, 
										$table_name, 
										$comment,
										$mno1
									),  
									'dmno'
								);     
 

								return $response; 
							break;
						case 'drip-update':
								# ex: $array = array(   'rmno'=> 5,   'rate_type'=>'like',  'rate_query'=>'rate-update' );   
								

								// echo " update "; 
								// $response = update1( 
								// 	'fs_rate_modals',
								// 	'rate_type',
								// 	"$rt",
								// 	array( 'rmno' , $rmno )
								// );  
								// return $response;   
							break;
						case 'delete': 

								# ex: $array = array(    'table_id'=> 5,  'table_name'=> 'postedlooks',  'rate_query'=>'rate-delete' );   
								// $response = delete(
								// 		$tdb, 
								// 		array( 'table_id' , $tid ) 
								// );    
								// echo " delete ";
								// $response = mysql_query("DELETE FROM $tdb WHERE table_id = $tid and table_name = '$tn' "); 
								// return $response; 

								$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  


								return $response; 
							break;   
						case 'get-modal-total-dripped':  
								// $mc->fs_drip_modals_Query( array( 'table_name'=>'postedlooks' , 'table_id'=>900 , 'query_drip'=>'get-modal-total-dripped' ) ); 


								$response = select_v3( 
									$tdb , 
									'*' , 
									" table_name = '$table_name' and table_id = $table_id " 
								);     
								return count( $response ); 
							break;    
						case 'get-all-user-dripped':    
							 
								// $array = array(     
											     
								//     'limit_start'=>0, 
								//     'limit_end'=>1,
								//     'query_where'=>"table_id = $plno", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function
								//     'query_order'=>'dmno asc', 
								//     'query_drip'=>'get-all-user-dripped' 
								// );     
								// $response =  $this->fs_drip_modals_Query ( $array ); 
 
								$response = select_v3( 
									$tdb , 
									'*' , 
									"$query_where order by $query_order limit $limit_start , $limit_end" 
								);    
								return  ( !empty($response) ) ? $response : false ;  
							break;   
						default: 
							break;
					}  
				} 
				/*
				* tabelname: fs_favorite_modals  
				* created: july 16 , 2014 
				*/   
				public function fs_favorite_modals_Query( $array ) {   

					/*
					* table: fs_drip_modals
					* dmno
					* mno ( int ) ( 25 )
					* table_id ( int ) ( 25 )
					* table_name ( 20 ) ( 25 )
					* comment ( varchar ) ( 200)  
					* mno1  ( int ) ( 25 )
					* date ( timestamp )
					*/ 
 
		 
	  	 
	  	 
	  	 
	  	
					// $this->print_r1( $array );  

					$dmno           = ( !empty($array['dmno']) )        ? $array['dmno'] : 0 ;
					$mno            = ( !empty($array['mno']) )         ? $array['mno'] : 0 ;  
					$table_name     = ( !empty($array['table_name']) )  ? $array['table_name'] : 0 ;  
					$comment        = ( !empty($array['comment']) )     ? $array['comment'] : null ;  
					$table_id       = ( !empty($array['table_id']) )    ? $array['table_id'] : 0 ;  
					$mno1           = ( !empty($array['mno1']) )        ? $array['mno1'] : 0 ;   
					$query_favorite = ( !empty($array['query_favorite']) )  ? $array['query_favorite'] : 0 ;
					$query_order    = ( !empty($array['query_order']) ) ? $array['query_order'] : 'order by fmno desc';
					$query_where    = ( !empty($array['query_where']) ) ? $array['query_where'] : null; 
					$limit_start    = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0;
					$limit_end      = ( !empty($array['limit_end']) )   ? $array['limit_end'] : 100; 
					$tdb            = 'fs_favorite_modals';


 
					$response = false;  
					// case 'postedlooks':  
					// case 'fs_postedmedia': 
					// case 'fs_postedarticles':   

					switch ( $query_favorite ) {  
						case 'favorite-insert':  
								#ex:
							   	#  	 $array = array(    'mno'=> $mno,  'table_id'=>$table_id , 'table_name'=>$table_name, 'mno1'=> $mno1 ,'query_favorite'=>'favorite-insert' );    
	 							#    $response =  $mc->fs_favorite_modals_Query ( $array ); 
 
								$response = insert(
									$tdb,  
									array( 
										'mno',  
										'table_id', 
										'table_name',  
										'mno1'
									)
									,
									array( 
										$mno,  
										$table_id, 
										$table_name,  
										$mno1
									),  
									'fmno'
								);     
 

								return $response; 
							break;
						case 'favorite-update':
								# ex: $array = array(   'rmno'=> 5,   'rate_type'=>'like',  'rate_query'=>'rate-update' );   
								

								// echo " update "; 
								// $response = update1( 
								// 	'fs_rate_modals',
								// 	'rate_type',
								// 	"$rt",
								// 	array( 'rmno' , $rmno )
								// );  
								// return $response;   
							break;
						case 'delete': 

								# ex: $array = array(    'table_id'=> 5,  'table_name'=> 'postedlooks',  'rate_query'=>'rate-delete' );   
								// $response = delete(
								// 		$tdb, 
								// 		array( 'table_id' , $tid ) 
								// );  



								// echo " delete ";
								// $response = mysql_query("DELETE FROM $tdb WHERE table_id = $tid and table_name = '$tn' "); 
								// return $response; 
								$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								return $response;
							break;   
						case 'get-modal-total-favorite':  
								// $mc->fs_favorite_modals_Query( array( 'table_name'=>'postedlooks' , 'table_id'=>900 , 'query_favorite'=>'get-modal-total-favorite' ) ); 


								$response = select_v3( 
									$tdb , 
									'*' , 
									" table_name = '$table_name' and table_id = $table_id " 
								);     
								return count( $response ); 
							break;    
						case 'get-all-user-favorite':    
							 	// echo " get all user favorite <br> ";
								// $array = array(     
											     
								//     'limit_start'=>0, 
								//     'limit_end'=>1,
								//     'query_where'=>"table_id = $plno", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function
								//     'query_order'=>'dmno asc', 
								//     'query_favorite'=>'get-all-user-favorite' 
								// );     
								// $response =  $this->fs_favorite_modals_Query ( $array ); 
 
								$response = select_v3( 
									$tdb , 
									'*' , 
									"$query_where order by $query_order limit $limit_start , $limit_end" 
								);    
								return  ( !empty($response) ) ? $response : false ;  
							break;   
						default: 
							break;
					}  
				}  
				/*
				* tabelname: fs_members  
				* created: july 21 , 2014 
				*/    
				public function posted_modals_comment_Query( $array ) {   

					/*
					* table: fs_comment 
					 1  cno	int(25)			
					 2	mno	int(25)			
					 3	comment	varchar(250)	
					 4	table_name	varchar(25)	
					 5	table_id	int(25)		
					 6	tlike	int(25)			
					 7	tdislike	int(25)			 
					 8  tflag	int(25)	
					 9	mno1	int(25)		
					 10	date	timestamp	 
					*/ 
 		 
					/*
						table_name : fs_members , postedlooks , fs_postedmedia , fs_postedarticles
					*/ 

					// $this->print_r1( $array );  

					// initialize data
						$cno              = ( !empty($array['cno']) )           ? $array['cno']           : 0 ;
						$mno              = ( !empty($array['mno']) )           ? intval($array['mno'])   : 0 ;     
						$comment          = ( !empty($array['comment']) )       ? $array['comment']       : '';  
						$table_name       = ( !empty($array['table_name']) )    ? $array['table_name']    : 0 ;  
						$table_id         = ( !empty($array['table_id']) )      ? $array['table_id']      : 0 ;   
						$like             = ( !empty($array['tlike']) )         ? $array['tlike']         : 0 ;  
						$dislike          = ( !empty($array['tdislike']) )      ? $array['tdislike']      : 0 ;   
						$tflag            = ( !empty($array['tflag']) )         ? $array['tflag']         : 0 ;  
						$mno1             = ( !empty($array['mno1']) )          ? intval($array['mno1'])  : 0 ;   
						$comment_type     = ( !empty($array['comment_type']) )  ? $array['comment_type']  : 0 ;   
						$comment_query    = ( !empty($array['comment_query']) ) ? $array['comment_query'] : 0 ;   
						$orderby          = ( !empty($array['orderby']) )       ? $array['orderby']       : 'cno' ;   
						$limit_start      = ( !empty($array['limit_start']) )   ? $array['limit_start']   : 0  ;    
						$limit_end        = ( !empty($array['limit_end']) )     ? $array['limit_end']     : 100 ;    

						$tdb              = 'fs_comment'; 
						$response         = false;   

						// echo " mno1 = $mno1 <br>";

						// $this->print_r1( $array ); 

						 // echo " mno1 = $mno1 <br>";

					switch ( $comment_query ) {  
						case 'comment-insert':
							 // echo " mno1 = $mno1 <br>";
								# ex:     
								/*
									  $array = array(     
									    'mno'=>133,
									    'comment'=>' this is the comment test ',
									    'table_name'=>'postedlooks',
									    'table_id'=>1001,
									    'tlike'=>10,
									    'tdislike'=>12, 
									    'tflag'=>13,
									    'mno1'=>134,
									    'comment_query'=>'comment-insert'  
									  );    
									  $response =  $mc->posted_modals_comment_Query ( $array );
								*/ 

								$response = insert(
									$tdb,  
									array( 
										'mno',  
										'comment',
										'table_name',
										'table_id',
										'tlike',  
										'tdislike', 
										'tflag',
										'mno1',
										'date'
									)
									,
									array(  
										$mno,
										$comment,
										$table_name,
										$table_id,
										$like,
										$dislike,
										$tflag,  
										$mno1,
										$this->date_time
									),  
									'cno'
								);     
								return $response; 
							break;
						case 'comment-update':
								# ex: 
								/*
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-update'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								*/								 
	
								$response = update1( 
									$tdb,
									'comment',
									"$comment",
									array( 'cno' , $cno )
								);  
								return $response;  
							break; 
						case 'comment-delete':  
								/*
								ex:
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-delete'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								 */
								 
								$response = mysql_query("DELETE FROM $tdb WHERE cno = $cno "); 
								return $response;  
							break;   
						case 'get-comment-modal':   
								/*
								  $array = array(  
								    'table_name'=> 'postedlooks',
								    'table_id'=> 1001, 
								    'orderby'=> 'cno asc',
								    'limit_start'=> 1,
								    'limit_end'=> 1, 
								    'comment_query'=>'get-comment-modal'   
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								*/ 
								// echo " get comment modals "; 
									$response = select_v3( 
										$tdb, 
										'*', 
										" table_id = $table_id and table_name = '$table_name' order by $orderby limit $limit_start , $limit_end " 
									); 
									return $response;   
							break;  
						case 'get-comment-modal-total':
								 	$response = count ( select_v3( 
											$tdb, 
											'*', 
											" table_id = $table_id and table_name = '$table_name' order by $orderby limit $limit_start , $limit_end " 
										)
								 	); 
									return $response;   
							 	break;	 
						case 'get-total-comment': 

								#$response =  $mc->posted_modals_comment_Query (  array( 'table_name'=>'fs_message',  'table_id'=>$msgno,   'comment_query'=>'get-total-comment'    )   );
								$response = select_v4( array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'count(*) as cno',  'where'=>" table_name = '$table_name' and table_id =  $table_id  " ) );  
						 	 	$response = $response[0]['cno']; 
							 	return $response; 
							break;
						case 'get-total-comment-by-chatmate': 
								# $response =  $mc->posted_modals_comment_Query (   array( 'table_name'=>'fs_message',   'table_id'=>$msgno,  'mno1'=>$mno1, 'comment_query'=>'get-total-comment-by-chatmate'  )  ); 
								echo " mno1 = $mno1 <br>";
								$response = select_v4(  array(  'type'=>'select',   'tablename'=>$tdb,  'rows'=>'count(*) as cno',   'where'=>"table_name = '$table_name' and table_id = $table_id and mno = $mno1"  )  );   
							 	$response = $response[0]['cno']; 
							break;
						case 'get-all-comment-by-tbn_and_tbid':  
								# $response =  $mc->posted_modals_comment_Query (   array(  'table_name'=>'fs_message',   'table_id'=>intval($msgno),    'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end, 'comment_query'=>'get-all-comment-by-tbn_and_tbid'  )  ); 
							 	$response = select_v4(  array(  'type'=>'select',   'tablename'=>$tdb,  'rows'=>'*' , 'where'=>"table_name = '$table_name' and table_id = $table_id  $orderby limit $limit_start , $limit_end" ));     
							break;
						case 'get-comment-sepcific-by-cno': 

								$response = select_v3( 
									$tdb, 
									'*', 
									"cno = $cno" 
								); 
								return $response ;   	 
							break;	
						default: 
							break;
					}  


					return $response; 
				}   
				/*
				* tabelname: fs_members  
				* created: july 21 , 2014 
				*/    
				public function posted_modals_notification_Query( $array ) {   


				    $db = new Database(); 
					/*
					*   table: fs_notification 
						nno	int(25)			 
						mno	int(25)	          
						table_name	varchar(25)
						table_id int(25)			 
						action	varchar(100)	 
						mno1 int(25)			 
						mno2 int(25)			 
						status smallint(1)		 
						date timestamp	
					*/ 
 		 
					/*
						table_name : fs_members , postedlooks , fs_postedmedia , fs_postedarticles
					*/
 
					// initialize data
						$nno                 = ( !empty($array['nno']) )          ? $array['nno']           : 0 ;
						$mno                 = ( !empty($array['mno']) )          ? $array['mno']           : 0 ;    
						$table_name          = ( !empty($array['table_name']) )   ? $array['table_name']    : '';  
						$table_id            = ( !empty($array['table_id']) )     ? $array['table_id']      : 0 ;  
						$action              = ( !empty($array['action']) )       ? $array['action']        : 0 ;   
						$mno1                = ( !empty($array['mno1']) )         ? $array['mno1']          : 0 ;  
						$mno2                = ( !empty($array['mno2']) )         ? $array['mno2']          : 0 ;   
						$link                = ( !empty($array['link']) )         ? $array['link']          :'#';   
						$type                = ( !empty($array['type']) )         ? $array['type']          : '';  
						$status              = ( !empty($array['status']) )       ? $array['status']        : 0 ;   
						$date                = ( !empty($array['date']) )         ? $array['date']          : $this->date_time ;  
						$notification_type   = ( !empty($array['notification_type']) )  ? $array['notification_type']  : 0 ;   
						$notification_query  = ( !empty($array['notification_query']) ) ? $array['notification_query'] : 0 ;   
						$orderby             = ( !empty($array['orderby']) )       ? $array['orderby']       : 'nno desc' ;   
						$limit_start         = ( !empty($array['limit_start']) )   ? $array['limit_start']   : 0  ;    
						$limit_end           = ( !empty($array['limit_end']) )     ? $array['limit_end']     : 100 ;   
						$tdb                 = 'fs_notification'; 
						$response            = false;    
 

						// $this->print_r1( $array );
 

					switch ( $notification_query ) {  
						case 'notification-insert':
								# ex:     
								/* 								  
									  $response =  $mc->posted_modals_notification_Query ( 
									    array(     
									      'mno'=>133, 
									      'table_name'=>'postedlooks',
									      'table_id'=>1001,
									      'action'=>'jesus rated and posted a look',
									      'mno1'=>12, 
									      'mno2'=>13,
									      'status'=>1,
									      'notification_query'=>'notification-insert'  
									    ) 
									  );  
								*/ 
								
								/**
								* Select and count total notification of the modal for the specific user 
								* If notification for the specific modal for user its being bundled in into 1 status = 2. 
								*/

								$notification_total = select_v3( 
									'fs_notification', 
									'count(nno), nno', 
									"table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $mno1 
								); 
								 
								echo "<pre>";
								print_r($response); 
								echo "total " . $notification_total[0]['count(nno)'] . '<br>';

								$nt = $notification_total[0]['count(nno)']; 
								 
								if($nt >= 1) { 
									//update all notification to status = 2 where status = 1;
									echo "update all notification to status = 2 where status in(0,1);"; 

									// if($db->update('fs_notification', array('status'=>2), ' status < 2')) {
									// 	echo "updated successfully<br>";
								 	// 	} else {
								 	// 		echo "failed to updated<br>";
								 	// 	} 
								 	// update()

								 	if(mysql_query("UPDATE fs_notification SET status =  2 WHERE  table_name = '" . $table_name."' and table_id = ". $table_id." and mno1 = " . $mno1   )) { 
							 			echo "updated successfully<br>";
							 		} else {
							 			echo "failed to updated<br>";
							 		} 


								} else { 
								   // dont update
									echo "dont update";
								}
 


								/** 
								* Check if this mno already flagged this modal. 
								* If already flagged then follower or the user will not recieved a notification
								*/ 
								$notification_stop = select_v3( 
									'fs_flag', 
									'*', 
									" table_name = '$table_name' and table_id = $table_id and mno = $mno1 and action = 'stop notification'" 
								);    
								 	   


								/**
								* Start the insert and validation
								*/  
								if(!empty($notification_stop)) { 
 
								} else {  

									/** Check and correct grammars */ 

									// Likes  
									if(strpos($action, 'likes')) {
										echo "likes";
										$action = str_replace('on your', 'your', $action);
								    } else {
								    	echo "not likes";
								    }
	 								
	 								// Dripped
								    if(strpos($action, 'dripped')) {
										echo "dripped";
										$action = str_replace('on your', 'your', $action);
								    } else {
								    	echo "not dripped";
								    }

								    // Favorited
								    if(strpos($action, 'favorited')) {
										echo "dripped";
										$action = str_replace('on your', 'your', $action);
								    } else {
								    	echo "not dripped";
								    } 


								    //user name commented on his/her look 
								    if((strpos($action, 'commented') and strpos($action, 'her')) || (strpos($action, 'commented') and strpos($action, 'his'))) {
										echo "dripped";
										$action = str_replace('own', '', $action);
								    } else {
								    	echo "not dripped";
								    } 

								    //user name likes your comment on this look  
								    if(strpos($action, 'like') and strpos($action, 'your comment') ) {
										echo "dripped";
										$action = str_replace('like', 'likes', $action);
										$action = str_replace('your comment.', 'your comment', $action); 
										$action .= ' on this'; //modal to be added in notfication fetch.
								    } else {
								    	echo "not dripped";
								    } 
 
								    /** Insert */
									$response = insert(
										$tdb,  
										array( 
											'nno',  
											'mno',
											'table_name',
											'table_id',
											'action',  
											'mno1', 
											'mno2',
											'link',
											'type',
											'status',
											'date'
										)
										,
										array(  
											$nno,
											$mno,
											$table_name,
											$table_id,
											$action,
											$mno1,
											$mno2,  
											$link,
											$type,
											$status, 
											$date
										),  
										'nno'
									);     
									return $response;  
								}
							break;
						case 'notification-update':
								# ex: 
								/*
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-update'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								*/								 
	
								// $response = update1( 
								// 	$tdb,
								// 	'comment',
								// 	"$comment",
								// 	array( 'cno' , $cno )
								// );  
								// return $response;  

								return 'no code for updated notification ';
							break;
						case 'notification-delete':  
								/*
								ex:
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-delete'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								 */
								 
								// $response = mysql_query("DELETE FROM $tdb WHERE cno = $cno "); 
								// return $response;  
								return 'no code for delete notification ';
							break;   
						case 'get-notification-modal':   
								/* 
								$response =  $mc->posted_modals_notification_Query ( 
								array(      
								  'mno1'=>12, 
								  'limit_start'=> 0,
								  'limit_end'=> 2, 
								  'orderby'=> 'nno desc',
								  'notification_query'=>'get-notification-modal'  
								) 
								); 
							  $response =  $mc->posted_modals_comment_Query ( $array );
								*/ 
								// echo " get notification modals "; 
 
								$response = select_v3( 
									$tdb, 
									'*', 
									" mno1 = $mno1 and status = 1 order by $orderby limit $limit_start , $limit_end " 
								); 
								return $response ;    
							break;  		
						case 'get-total-notification-not-oppend':
							 	$response = select_v3( 
									$tdb, 
									'*', 
									" mno1 = $mno1 and status = 0" 
								); 
								return count($response);   
							break; 
						case 'get-people-participated': 
								#get pariticpated  
									$response = select_v3( 
										$tdb, 
										'*', 
										" table_name = '$table_name' and table_id = $table_id " 
									);    
									return $response;   
							break;
						case 'set-notification-viewed': 
								// $response =  $mc->posted_modals_notification_Query ( 
								// 	array(      
								// 	  'nno'=>$nno,  
								// 	  'notification_query'=>'set-notification-viewed'  
								// 	) 
								// ); 
							 	$response = mysql_query( "UPDATE $tdb SET status = 2 WHERE nno = $nno" );
							break; 
						case 'delete':  
								echo  "DELETE $tdb WHERE table_name = '$table_name' and table_id = $table_id ";
								$response = mysql_query( " DELETE FROM $tdb WHERE table_name = '$table_name' and table_id = $table_id ");    
							break;  
						default:  
							break; 
					}   
					return $response;
				}    
				/*
				* tabelname: postedlooks  
				* created: dec  25 , 2012
				*/    
				public function posted_modals_postedlooks_Query( $array ) {    

  
	 
					// initialize data
						$plno               = ( !empty($array['plno'] ) )             ? $array['plno']              : 0 ;
						$mno                = ( !empty($array['mno'] ) )              ? $array['mno']               : 0 ;  
						$date_              = ( !empty($array['date_'] ) )            ? $array['date_']             :$this->date_time;    
						$lookName           = ( !empty($array['lookName'] ) )         ? $array['lookName']          :null;  
						$lookAbout          = ( !empty($array['lookAbout']) )         ? $array['lookAbout']         :null;  
						$article_link       = ( !empty($array['article_link']) )      ? $array['article_link']      :null;   
						$occasion           = ( !empty($array['occasion' ]) )         ? $array['occasion']          :null;  
						$season             = ( !empty($array['season' ]) )           ? $array['season']            :null;   
						$style              = ( !empty($array['style' ]) )            ? $array['style']             :null;   
						$keyword            = ( !empty($array['keyword' ]) )          ? $array['keyword']           :null; 
						$plkeyword          = ( !empty($array['plkeyword']) )         ? $array['plkeyword']         : 0 ;  
						$tview              = ( !empty($array['tview']) )             ? $array['tview']             : 0 ;  
						$pltcomment         = ( !empty($array['pltcomment']) )        ? $array['pltcomment']        : 0 ;  
						$pltvotes           = ( !empty($array['pltvotes']) )          ? $array['pltvotes']          : 0 ;  
						$trating            = ( !empty($array['trating']) )           ? $array['trating']              : 0 ;  
						$pltoplookrating    = ( !empty($array['pltoplookrating']) )   ? $array['pltoplookrating']   : 0 ;  
						$tpercentage        = ( !empty($array['tpercentage']) )       ? $array['tpercentage']         : 0 ;  
						$tdrip              = ( !empty($array['tdrip']) )             ? $array['tdrip']             : 0 ;  
						$tfavorite          = ( !empty($array['tfavorite']) )         ? $array['tfavorite']         : 0 ;  
						$tshare             = ( !empty($array['tshare']) )            ? $array['tshare']            : 0 ;  
						$active             = ( !empty($array['active']) )            ? $array['active']            : 0 ;  
						$plus_blogger  	    = ( !empty($array['plus_blogger']) )      ? $array['plus_blogger']      : 'Yes' ;  
						$gender 	        = ( !empty($array['gender']) )            ? $array['gender']            : 'Male' ;   
						$pludate            = ( !empty($array['pludate']) )           ? $array['pludate']           : $this->date_time ;   
						$postedlooks_type   = ( !empty($array['postedlooks_type']) )  ? $array['postedlooks_type']  : 0 ;   
						$postedlooks_query  = ( !empty($array['postedlooks_query']) ) ? $array['postedlooks_query'] : 0 ;   
						$orderby            = ( !empty($array['orderby']) )           ? $array['orderby']           : 'nno desc' ;   

						$limit_start        = ( !empty($array['limit_start']) )       ? $array['limit_start']       : 0  ;    
						$limit_end          = ( !empty($array['limit_end']) )         ? $array['limit_end']         : 100 ;   





						$tdb                = 'postedlooks'; 
						$response           = false;    


						// $this->print_r1($array); 

					switch ( $postedlooks_query ) {  
						case 'insert':
								# ex:     
								/*
																		  
									 
								*/ 

								$response = insert(
									$tdb,  
									array(  
										'mno',
										'date_',
										'lookName',
										'lookAbout',
										'article_link',
										'occasion',
										'season',
										'style',
										'keyword',
										'plkeyword',
										'tview',
										'pltcomment',
										'pltvotes',
										'trating',
										'pltoplookrating',
										'tpercentage',
										'tdrip',
										'tfavorite',
										'tshare',
										'active',
										'pludate', 
										'plus_blogger',
										'gender'
									)
									,
									array(   
										$mno,
										$date_,
										$lookName,
										$lookAbout,
										$article_link,
										$occasion,
										$season,
										$style,
										$keyword,
										$plkeyword,
										$tview,
										$pltcomment,
										$pltvotes,
										$trating,
										$pltoplookrating,
										$tpercentage,
										$tdrip,
										$tfavorite,
										$tshare,
										$active,
										$pludate, 
										$plus_blogger,
										$gender
									),  
									'plno'
								);       
								return $response; 
							break;
						case 'postedlooks-update':
								# ex: 
								/*
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-update'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								*/								 
	
								// $response = update1( 
								// 	$tdb,
								// 	'comment',
								// 	"$comment",
								// 	array( 'cno' , $cno )
								// );  
								// return $response;  

								return 'no code for updated notification ';
							break;
						case 'postedlooks-delete':  
								/*
								ex:
								  $array = array(    
								    'cno'=>8,
								    'comment'=>' this is the comment test updated ', 
								    'comment_query'=>'comment-delete'  
								  );    
								  $response =  $mc->posted_modals_comment_Query ( $array );
								 */
								 
								// $response = mysql_query("DELETE FROM $tdb WHERE cno = $cno "); 
								// return $response;  
								return 'no code for delete notification ';
							break;     		
						case 'get-look-owner': 
							 	$response = select_v3( 
									$tdb, 
									'*', 
									" plno = $plno" 
								); 
								return $response[0]['mno'];   
							break;
						case 'get-tlook': 
							 	$response = select_v4( 
							 	 	array( 
							 	 		'type'=>'select',
							 	 		'tablename'=>$tdb,
							 	 		'rows'=>'count(*) as plno', 
							 	 		'where'=>" mno = $mno and active > 0", 
							 	 		'order'=>'plno desc' 
							 	 	) 
							 	); 
							 	// $this->print_r1( $response );
							 	$response = $response[0]['plno'];  
							break;
						case 'get-all-tlook': 	
								$response = select_v4( array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'count(*) as plno',   'order'=>'plno desc' , 'where'=>'active > 0' ) );
								$response = $response[0]['plno'];
							break;
						case 'get-latest-look-uploaded-plno': 
			 					$r = select_v3( 'postedlooks' , '*' , "mno = $mno order by plno desc limit 1" );  
			 					$response = (!empty($r[0]['plno'])) ? $r[0]['plno'] : 0; 
							break;
						case 'get-specific-look': 
							 	$r = select_v3( 'postedlooks' , '*' , "plno = $plno" );   
							 	return $r;
							break;
						default:  
							break;
					}  



					return  $response;
				}     
				/*
				* table name fs_members , fs_follow and activity
				* created july 29 , 2014
				*/
				public function mysql_feed_query( $array ) { 

					$type                   = ( !empty($array['type'] ))                  ? $array['type'] : 'initialized' ;  
					$mno                    = ( !empty($array['mno'] ))                   ? $array['mno'] : 0 ; 
					$limit_start            = ( !empty($array['limit_start'] ))           ? $array['limit_start'] : 0 ;  
					$limit_end              = ( !empty($array['limit_end'] ))             ? $array['limit_end'] : 24 ;  
					$limit_end_following    = ( !empty($array['limit_end_following'] ))   ? $array['limit_end_following'] : 100 ;  
					$orderby                = ( !empty($array['orderby'] ))               ? $array['orderby'] : 'by _date' ; 
					$response               = ( !empty($array['response'] ))              ? $array['response'] : '' ;   
					 

					// $this->print_r1( $array ); 
					switch ( $type ) {
						case 'initialized': 
								# nitialized
								$_SESSION['end'] = 0;
			 					$_SESSION['limit_end_following'] = $limit_end_following;
			 					$_SESSION['limit_start'] = $limit_start;
			 					$_SESSION['limit_end']   = $limit_end; 
			 					// $_SESSION['Query']       = '';   
			 					$_SESSION['mno']         = $mno;   
			 					// $_SESSION['response']    =  '';    
			 					//  $_SESSION['following']  = 
			 					// echo " mno = $mno <br>";  
							break;
						case 'get-following': 
								# get following    
								$_SESSION['following'] = '';
			 					$_SESSION['following'] = select_v3( 
						   	   		'fs_follow', 
						   	   		'*' , 
						   	   		"mno = $_SESSION[mno] order by followtime desc limit 0 , $_SESSION[limit_end_following]" 
						   	   	);       
			 					 // print_r($_SESSION['following']);  
							break;  
						case 'remove_duplicate':
							 $_SESSION['following'] = $this->remove_duplicate( $_SESSION['following'] , 'mno1' ); 
							 // print_r( $_SESSION['response'] ); 
							break;
						case 'set-query': 
								# set query where  
								 $_SESSION['Query']       = '';   
			 					// echo " total res ".count($_SESSION['following']).'<br>'; 
			 					$len = count($_SESSION['following']); 
			 					$response = $_SESSION['following']; 
			 					$active  = intval(2); 
			 					$_SESSION['Query'] .= " active < $active and mno in (";
			 					for ($i=0; $i < $len ; $i++) {  
			 						$mno = $response[$i]['mno1'];  
			 					 	if ( $i == $len-1 ) {
			 					 		$_SESSION['Query'] .= "$mno)";   
			 					 	}
			 					 	else{
			 					 		$_SESSION['Query'] .= "$mno,";  
			 					 	}	 
			 					}    
			 					 // $_SESSION['Query'] .= " mno in (133) "; 
			 					// echo " $_SESSION[Query] ";  
							break; 
						case 'query-to-activity-wall': 
								# query to activity wall  
								// echo " followers "; 
			 					$response = select_v3( 
						   	   		'activity' , 
						   	   		'*', 
						   	   		"$_SESSION[Query]  order by _date desc limit $_SESSION[limit_start] , $_SESSION[limit_end]" 
						   	   	);     
						    	// echo " where $_SESSION[Query]  order by _date desc limit $_SESSION[limit_start] , $_SESSION[limit_end]<br> " ;  
			 					// $this->print_r1( $response ); 
							break;  
						default: 
							break;  
					} 
					return $response;
				}  
				/*
				* table name fs_postedarticle 
				* created jan 30 2013
				*
				*/ 
				public function fs_postedarticles( $array ){ 



						# initialized
						  	$artno       = ( !empty($array['artno']) )        ? $array['artno']        : null ; 
							$mno         = ( !empty($array['mno']) )          ? $array['mno']          : null ; 
							$title       = ( !empty($array['title']) )        ? $array['title']        : null ; 
							$description = ( !empty($array['description']) )  ? $array['description']  : null ; 
							$keyword     = ( !empty($array['keyword']) )      ? $array['keyword']      : null ; 
							$category    = ( !empty($array['category']) )     ? $array['category']     : null ; 
							$topic       = ( !empty($array['topic']) )        ? $array['topic']        : null ;  
							$source_url  = ( !empty($array['source_url']) )   ? $array['source_url']   : null ; 
							$source_item = ( !empty($array['source_item']) )  ? $array['source_item']  : null ; 
							$extention   = ( !empty($array['extention']) )    ? $array['extention']    : null ; 
							$date        = ( !empty($array['date']) )         ? $array['date']         : $this->date_time ;  
							$type        = ( !empty($array['type']) )         ? $array['type']         : null ; 
							$active      = ( !empty($array['active']) )       ? $array['active']       : 1 ; 
							$aticle_type = ( !empty($array['aticle_type']) )  ? $array['aticle_type']  : null ; 
							$plus_blogger= ( !empty($array['plus_blogger']) ) ? $array['plus_blogger'] : null ; 
							$gender      = ( !empty($array['gender']) )       ? $array['gender']       : null ; 

						#select
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'artno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'artno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
 
 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'artno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ; 
 
						# response
	 
							$response    = '';
							$tdb         = 'fs_postedarticles'; 
 

						switch ( $aticle_type ) {
							case 'insert':
									// $response = $mc->fs_postedarticles( array(  'aticle_type'=> 'insert', 'mno'=>133, 'title'=> 'this is the asdasdasdasdtitle1', 'description'=> 'this is theasdasdasd description1',  'topic'=> 'this is asdasdasd topic1', 'keyword'=> 'this isasdasdasdasd the keyword1',  'category' => 'category here ', 'source_url' => 'www.google.com',  'source_item' => 'facebook.com source item', 'type' =>  'type here',  'extention' => 'jpg' )  ); 
									// echo " insert here <br> "; 
									$response = insert(
										$tdb,  
										array(  
											'mno',
											'title',
											'description',
											'keyword',
											'category',
											'topic',
											'source_url',
											'source_item',
											'extention',
											'type', 
										    'active', 
											'date',
										    'plus_blogger',
										    'gender'
										)
										,
										array(   
											$mno, 
			 								$title,
											$description,
											$keyword,
											$category,
											$topic,
											$source_url,
											$source_item,
											$extention,
											$type,
											$active,
											$date, 
											$plus_blogger,
											$gender  
										),  
										'artno'
									);    
								break;
							case 'select': 
  									#$response = $mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>4,  'where'=>'artno  = 9' )  );  
						 			// echo " select here <br> "; 
						 			$response = select_v3( 
										$tdb, 
										'*', 
										" $where order by $orderby limit $limit_start , $limit_end "
									);     
								break;
							case 'update': 

								break;
							case 'delete':  
									// echo " delete here <br> ";  
								break;  
							case 'get-tarticle':

									$response = select_v4( 
								 	 	array( 
								 	 		'type'=>'select',
								 	 		'tablename'=>$tdb,
								 	 		'rows'=>'count(*) as artno', 
								 	 		'where'=>" mno = $mno", 
								 	 		'order'=>'artno desc' 
								 	 	) 
							 		); 

							 	// $this->print_r1( $response );
							 	$response = $response[0]['artno'];  
								break;
							default:  
									// echo " postarticle no action <br> ";
								break;  
						}
						return $response;  
				}  
				/*
				* table name fs_flag 
				* created august 22 , 2014
				*
				*/ 
				public function fs_flag( $array ) { 
 
						# initialized
						  	$flno       = ( !empty($array['flno']) )         ? $array['flno']        : null ; 
							$mno        = ( !empty($array['mno']) )          ? $array['mno']         : null ; 
							$table_name = ( !empty($array['table_name']) )   ? $array['table_name']  : null ; 
							$table_id   = ( !empty($array['table_id']) )     ? $array['table_id']    : null ; 
							$comment    = ( !empty($array['comment']) )      ? $array['comment']     : null ;  
							$date       = ( !empty($array['date']) )         ? $array['date']        :  $this->date_time ;   ;  
					  
						#select
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'flno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'flno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'artno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;  

						# response
	 
							$response    = '';
							$tdb         = 'fs_flag'; 

						# others

								$id         = ( !empty($array['id']) )       ? $array['id'] :0 ;  // this is the id of the modal like ex: ano
 	 
						#modal id 

							$modal_class = ".look_t$id";


							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert':
									#$response = $mc->fs_flag( array(  'type'=> 'insert', 'mno'=>1331, 'table_name'=> 'postedlooks1', 'table_id'=> 123,  'comment'=> 'this is the commeasdasdnt' )); 

									// echo " insert here <br> "; 
									$response = insert(
										$tdb,  
										array(  
											'mno',
											'table_name',
											'table_id',
											'comment', 
											'date' 
										)
										,
										array(   
											$mno, 
			 								$table_name,
											$table_id,
											$comment, 
											$date
										),  
										'flno'
									);    
								break;
							case 'select': 
  									#$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>2,  'where'=>"table_id  = 123 and table_name= 'postedlooks1' "  )  );   
						 			// echo " select here <br> "; 
						 			$response = select_v3( 
										$tdb, 
										'*', 
										" $where order by $orderby limit $limit_start , $limit_end "
									);     
								break;
							case 'update': 
								break;
							case 'delete':  
									$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );
									// echo " delete here <br> ";  
								break;  
							case 'flag-modal-dropdown':   

								if($table_name == 'postedlooks') {
									$posting_link = 'postalook?kooldi='.$table_id; 
								} else  { 
									$posting_link = 'postarticle?id='.$table_id;
								}  
								// echo " $table_name and $id " . $_SESSION['mno'] ; 
							 ?>
									<div class="flag-dropdown-container"  id="flag-dropdown-container<?php echo $id; ?>" name='close' >
								        <ul>

								        	<?php if($id == $_SESSION['mno'] and $table_name == 'fs_members'):?> 
 
									          	<li> 
									          		<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>' >    
									          		 	UPDATE PICTURE
													</div> 
									          	</li>   


								        	<!-- if not owner of the post -->  
								          	<?php elseif ( $mno != $_SESSION['mno'] ): ?>
									          	<li style="border-bottom:1px solid #e2e2df" >
									          		<div id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>' onclick="fs_popup( 'popup-small' , 'modal-attribute' , 'flag' , 'method' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' , 'design' )" > 
									          			FLAG 
									          		</div>
									          	</li>
									          	<li>
									          		<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>' onclick="fs_popup( 'popup-small' , 'modal-attribute' , 'hide-this-post' , 'method' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' , 'design' )" >    
									          			HIDE THIS POST
													</div> 
									          	</li>   
									          	<li> 
									          		<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>' >    
									          		 	FOLLOW
													</div> 
									          	</li>   
									    	<?php elseif ( $table_name == 'postedlooks' ): ?> 

									    		 
											        	<!-- if owner of the post --> 
											        	<li style="border-bottom:1px solid #e2e2df" >
											          		<!-- <div id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>'  onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' , 'edit' , '<?php echo $table_id; ?>' , 'postedlooks' ) " >  -->
											          			<!-- EDIT -->
											          		<!-- </div> -->
											          		<a href="<?php echo $posting_link ; ?>"  >
												          		<div id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>'  >
												          			EDIT
												          		</div>
											          		</a>
											          	</li>
											          	<li>
											          		<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>'  onclick="lookdetails_delete_look(  '<?php echo $table_id; ?>' , 'dont-redirect' , 'postedlooks'  , '<?php echo $modal_class; ?>' )" >   
											          			DELETE 
															</div> 
											          	</li>   
										    <?php elseif ( $table_name == 'fs_postedarticles' ): ?>

										    	<!-- if owner of the post --> 
										        	<li style="border-bottom:1px solid #e2e2df" >
										          		<a href="<?php echo $posting_link; ?>" >  
											          		<div id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>' > 
											          			EDIT
											          		</div>
										          		</a>
										          	</li>
										          	<li>
										          		<div   id="new-look-modals-share-icon-1" class='share_look_modals<?php echo $id; ?>'  onclick="lookdetails_delete_look(  '<?php echo $table_id; ?>' , 'dont-redirect' , 'fs_postedarticles'  , '<?php echo $modal_class; ?>' )" >    
										          			DELETE 
														</div> 
										          	</li>     
									   		<?php endif; ?>
								        </ul> 

							      	</div><?php   
								break;
							default:  

									// echo " postarticle no action <br> ";
								break;  
						}
						return $response;  
				}  
				/*
				* table name fs_view
				* created august 22 , 2014
				*
				*/ 
				public function fs_view( $array ) { 

	 

						# initialized
						  	$vno        = ( !empty($array['vno']) )          ? $array['vno']         : null ; 
							$mno        = ( !empty($array['mno']) )          ? $array['mno']         : null ; 
							$table_name = ( !empty($array['table_name']) )   ? $array['table_name']  : null ; 
							$table_id   = ( !empty($array['table_id']) )     ? $array['table_id']    : null ; 
							$date       = ( !empty($array['date']) )         ? $array['date']        : $this->date_time ;   ;  

						 
						#select
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'vno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'vno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ; 
 
 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'artno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;  

						# response
	 
							$response    = '';
							$tdb         = 'fs_view'; 
 
							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert':
									#$response = $mc->fs_flag( array(  'type'=> 'insert', 'mno'=>1331, 'table_name'=> 'postedlooks1', 'table_id'=> 123,  'comment'=> 'this is the commeasdasdnt' ));  
									// echo " insert here <br> "; 

									$response = insert(
										$tdb,  
										array(  
											'mno',
											'table_name',
											'table_id',
											'date',  
										)
										,
										array(   
											$mno, 
			 								$table_name,
											$table_id,
											$date 
										),
										'vno'
									);    
								break;
							case 'select': 
  									#$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>2,  'where'=>"table_id  = 123 and table_name= 'postedlooks1' "  )  );   
						 			// echo " select here <br> "; 
						 			$response = select_v3( 
										$tdb, 
										'*', 
										" $where order by $orderby limit $limit_start , $limit_end "
									);     
								break;
							case 'update': 
								break;
							case 'delete':  
									$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
									// echo " delete here <br> ";  
								break;  
							case 'get-tview':
								 	$response = select_v4( 
								 		array( 
								 			'type'=>'select',  
								 			'tablename'=>$tdb, 
								 			'where'=>"table_name = '$table_name' and table_id = $table_id",
								 			'rows'=>'count(*) as vno',   
								 			'order'=>'vno desc'
								 		) 
								 	); 
								 	$response = $response[0]['vno'];
								break;
							default:  

									// echo " postarticle no action <br> ";
								break;  
						}
						return $response;  
				} 
				/*
				* table name fs_view
				* created august 22 , 2014
				*
				*/ 
				public function fs_search( $array ) { 

	  

						# initialized
						  	$sno         = ( !empty($array['sno']) )          ? $array['sno']         : null ; 
							$keyword     = ( !empty($array['keyword']) )      ? $array['keyword']     : null ; 
							$table_name  = ( !empty($array['table_name']) )   ? $array['table_name']  : null ; 
							$table_id    = ( !empty($array['table_id']) )     ? $array['table_id']    : null ; 
							$date        = ( !empty($array['date']) )         ? $array['date']        : $this->date_time ;   
						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']       : 'vno > 0' ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'vno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'vno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  
 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'artno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
						# response 
							$response    = '';
							$tdb         = 'fs_search';  
							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert':
									#$response = $mc->fs_flag( array(  'type'=> 'insert', 'mno'=>1331, 'table_name'=> 'postedlooks1', 'table_id'=> 123,  'comment'=> 'this is the commeasdasdnt' ));  
									// echo " insert here <br> "; 

									$response = insert(
										$tdb,  
										array(  
											'keyword',
											'table_name',
											'table_id',
											'date',  
										)
										,
										array(   
											$keyword, 
			 								$table_name,
											$table_id,
											$date 
										),
										'sno'
									);    
								break;
							case 'select': 
			 			 			#$response = $mc->fs_search(  array(  'type'=>'select', 'where'=> "keyword LIKE '%$keySearch%'", 'orderby'=> 'sno asc', 'limit_start'=>0, 'limit_end'=>10 ) );  
									// echo " this is to select ";
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);       	

 									return ( !empty($response) ) ? $response : null ; 
								break; 
							case 'add-keyword-all-table': 


									// update member fullname , username and email 
										
										$this->fs_members_Query( array('type'=>'update-fullname-all'  ,  'limit_start'=>0 , 'limit_end'=>100000)  ); 
										
										$response = select_v3( 
											'fs_members', 
											'*', 
											'mno!=0'
										);
	 									echo "<h4> total member ".count($response).'</h4>';
	 									for ($i=0; $i < count($response) ; $i++) { 
	 										$keyword = '';
											$mno               = $response[$i]['mno'];
											$fullname          = $response[$i]['fullname'];
											$identity_username = $response[$i]['identity_username'];
											$identity_email    = $response[$i]['identity_email']; 
											$keyword       =  "$fullname , $identity_username , $identity_email"; 
 
											// check if exist 
												$exist = select_v3( 
													'fs_search', 
													'*', 
													"table_id = $mno and table_name = 'fs_members' " 
												);

												if ( empty( $exist ) ) { 
												 	echo " userkeyword not exist ";
													$r = $this->fs_search( 
													    array(  
													      'type'=> 'insert', 
													      'keyword'=>$keyword, 
													      'table_name'=>'fs_members', 
													      'table_id'=>$mno
													    )
													);      
												}
												else{

													echo " userkeyword exist <br> ";

												}
										}  
 									// update article keyword 

										echo "<h4> update article keyword </h4>";
										
											$response = $this->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>100000,  'where'=>'artno > 0 ' )  );   
											for ($i=0; $i < count($response); $i++) {  
												$keyword = '';
											    $artno              = $response[$i]['artno'];  
												$keyword            .=$response[$i]['title'].' , ';
												$keyword            .=$response[$i]['category'].' , ';
												$keyword            .=$response[$i]['topic'].' , ';
												$keyword            .=$response[$i]['keyword'];  



												 // check if exist  	 
													$exist = select_v3( 
														'fs_search', 
														'*', 
														"table_id = $artno and table_name = 'fs_postedarticles' " 
													); 
													if ( empty( $exist ) ) { 
													 	echo " articlekeyword not exist ";
														$r = $this->fs_search( 
														    array(  
														      'type'=> 'insert', 
														      'keyword'=>$keyword, 
														      'table_name'=>'fs_postedarticles', 
														      'table_id'=>$artno
														    )
														);      
													}
													else{
														echo " articlekeyword exist <br> ";
													} 
											}  
									// update look keyword   
										echo "<h4> add look keyword </h4>";
											$response = select_v3( 
												'postedlooks', 
												'*', 
												'plno > 0'
											); 


											for ($i=0; $i < count($response) ; $i++) { 

												$lookName   = '';
												$keyword    = ''; 
												$plno       = intval($response[$i]['plno']); 
												$lookName   = $response[$i]['lookName']; 

												$exist = select_v3( 
													'fs_search', 
													'*', 
													"table_id = $plno and table_name = 'postedlooks' " 
												); 

												 	
												$keyword .= $lookName.' , ';

												if ( empty($exist ) ) {

													echo " postedlooks keyword not exist <br> ";
												

													$tag = select_v3(  'fs_pltag',  '*',  " plno = $plno "   );	 	 

													for ($j=0; $j < count($tag) ; $j++) { 
														$plt_color     = $tag[$j]['plt_color']; 
														$plt_brand     = $tag[$j]['plt_brand']; 
														$plt_garment   = $tag[$j]['plt_garment']; 
													 	$plt_material  = $tag[$j]['plt_material']; 
														$plt_pattern   = $tag[$j]['plt_pattern'];  
														$keyword  .= "$plt_color , $plt_brand , $plt_garment , $plt_material , $plt_pattern , ";   
													}    
													 
													// echo " keyword $keyword  <br>"; 
													$r = $this->fs_search( 
													    array(  
													      'type'=> 'insert', 
													      'keyword'=>$keyword, 
													      'table_name'=>'postedlooks', 
													      'table_id'=>$plno
													    )
													);      
												}
												else{ 
													echo " postedlooks keyword exist <br>";
												} 
											}   
								break;
							case 'add-or-updated-keyword': 
									# $response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_postedarticles' ,   'table_id'=>46, 'keyword'=>'amazing !' )  );    
									 
									# get keyword from table
 										
										if ( empty($keyword ) ): 
	 										switch ( $table_name ):  
	 											case 'fs_members':  
		 												// get user info   
										 				$this->fs_members_Query( array('type'=>'update-fullname-specific' , "where" =>"mno = $table_id" )  ); 

														$response = select_v3( 
															$table_name, 
															'*',
															"mno = $table_id"
														);       

														$fullname   = $response[0]['fullname'];       
														$username   = $response[0]['identity_username'];     
														$email      = $response[0]['identity_email'];    
														$keyword .= "$fullname , $username , $email";   

														// insert or update keyword for search 
															// $response = $this->fs_search(  
															//     array( 
															//       'type'=> 'add-or-updated-keyword' , 
															//       'table_name'=>'fs_members', 
															//       'table_id'=>$table_id,
															//       'keyword'=>$keyword
															//     ) 
															 //  	);       
	 												break; 
	 											case 'fs_postedarticles':  


	 													$response = $this->fs_postedarticles( 
	 														array(  'aticle_type'=> 'select', 
	 															'limit_start'=>0, 
	 															'limit_end'=>1,  
	 															'where'=>"artno = $table_id "  
	 														)  
	 													);   

	 													$keyword .=$response[0]['title'].' , ';
	 													$keyword .=$response[0]['category'].' , ';
	 													$keyword .=$response[0]['topic'].' , ';
	 													$keyword .=$response[0]['keyword'];  
	 												break;
	 											case 'postedlooks':  
			 											$response = select_v3( 
															'postedlooks', 
															'*', 
															"plno =  $table_id "
														); 
														for ($i=0; $i < count($response) ; $i++) { 

															$lookName   = '';
															$keyword    = ''; 
															$plno       = intval($response[$i]['plno']); 
															$lookName   = $response[$i]['lookName'];  


															$keyword .= $lookName.' , ';
															$exist = select_v3( 
																'fs_search', 
																'*', 
																"table_id = $plno and table_name = 'postedlooks' " 
															);  

														 	// echo "look name  $lookName <br> "; 
															// echo " postedlooks keyword not exist <br> "; 
															$tag = select_v3(  'fs_pltag',  '*',  " plno = $plno "   );	 	  

															for ($j=0; $j < count($tag) ; $j++) { 
																$plt_color     = $tag[$j]['plt_color']; 
																$plt_brand     = $tag[$j]['plt_brand']; 
																$plt_garment   = $tag[$j]['plt_garment']; 
															 	$plt_material  = $tag[$j]['plt_material']; 
																$plt_pattern   = $tag[$j]['plt_pattern'];  
																$keyword .= "$plt_color , $plt_brand , $plt_garment , $plt_material , $plt_pattern ,  ";   
															}    
															
														}   





	 												break;
	 											default: 
	 												break;
	 										endswitch; 
	 									endif; 
									# update or insert 

	 									// get info from search to check if exist 
											$exist = select_v3( 
												'fs_search', 
												'*', 
												"table_id = $table_id and table_name = '$table_name' " 
											); 
										if ( empty($exist) ) { 
											// info not exist
												$response = $this->fs_search( array(   'type'=> 'insert',  'keyword'=>$keyword,  'table_name'=>"$table_name",  'table_id'=>$table_id ) );  
												$this->message( 'insert keyword ' , $response , '' );   
										}
										else{ 
											// info already exist
												// echo "update <br>";
												$response = @mysql_query("UPDATE fs_search set keyword = '$keyword' where table_id = $table_id and table_name = '$table_name' ");  
												$this->message( 'update keyword ' , $response , '' ); 
										}  
										// echo " keyword is : $keyword <br>";  
								break;
							case 'delete':    
									// echo " delete here <br> ";  
									$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;  
							default:   
									// echo " postarticle no action <br> ";
								break;  
						}
						return $response;  
				}  
				/*
				* table name fs_view
				* created august 22 , 2014
				*
				*/ 
				public function fs_message( $array ) {  

						# initialized
						  	$msgno       = ( !empty($array['msgno']) )       ? $array['msgno']       : null ; 
							$mno         = ( !empty($array['mno']) )         ? intval($array['mno']) : null ; 
							$mno1        = ( !empty($array['mno1']) )        ? intval($array['mno1']): null ; 
							$message     = ( !empty($array['message']) )     ? $array['message']     : null ; 
							$date        = ( !empty($array['date']) )        ? $array['date']        : $this->date_time ;   

							
							
							
						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'msgno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  
 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
						# response 

							$response    = '';
							$tdb         = 'fs_message';  

							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert':
									#   $response = $mc->fs_message(   array(  'type'=>'insert',  'mno' => $mno,  'mno1' => $mno1, 'message' => $message   ) );
									// echo " insert here <br> ";   
									$response = insert(
										$tdb,  
										array(  
											'mno',
											'mno1', 
											'date',  
										)
										,
										array(   
											$mno, 
			 								$mno1, 
											$date 
										),
										'msgno'
									);    
								break;  
							case 'get-msgno':
								 	# $response = $mc->fs_message(    array(   'type'=>'get-msgno',   'mno' => $mno , 'mno1' => $mno1 )  );    
								 	$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'msgno', 'where'=>"(mno = $mno and mno1 = $mno1) or (mno = $mno1 and mno1 = $mno)" ) );  
								 	$response = $response[0]['msgno']; 
								break;
							case 'get-or-add-message-id':
							  		#$response = $mc->fs_message(   array(  'type'=>'get-or-add-message-id',  'mno' => $mno,  'mno1' => $mno1  ) );
									if ( $mno1  != $mno ) {  
										$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'msgno', 'where'=>"(mno = $mno and mno1 = $mno1) or (mno = $mno1 and mno1 = $mno)" ) );  
										if ( !empty( $response )) { 
											$response = $response[0]['msgno']; 
										}
										else {
											$response = $this->fs_message(   array(  'type'=>'insert',  'mno' => $mno,  'mno1' => $mno1   ) ); 
										}  
									} 
								break;  
							case 'get-all-message-id':
									// echo " weee $orderby  ";
									# $response = $mc->fs_message(    array(   'type'=>'get-all-message-id',   'mno' => $mno , 'orderby'=>'order by date asc' ,   'limit_start'=>$limit_start,   'limit_end'=>$limit_end  )  );    
								 	$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'*', 'where'=>" mno = $mno or mno1 = $mno  $orderby limit $limit_start , $limit_end " ) );   	 
								break;
						 	case 'get-total-message': 
						 			#   $response = $mc->fs_message(   array(  'type'=>'get-total-message',  'mno' => $mno,  'mno1' => $mno1  ) );
						 			$response = select_v4( array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'count(*) as msgno',  'where'=>" mno = $mno and mno1 = $mno1" ) );  
						 			$response = $response[0]['msgno'];  
						 		break;
						 	case 'get-last-message': 
						 			#   $response = $mc->fs_message(   array(  'type'=>'get-last-message',  'mno' => $mno,  'mno1' => $mno1  ) );
						 			$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'*', 'where'=>" mno = $mno and mno1 = $mno1" , 'order'=>'msgno desc limit 1'  ) );
						 		break;
						 	case 'get-message-by-msgno': 
						 			# $response = $mc->fs_message(   array(  'type'=>'get-message-by-msgno',  'msgno' =>$msgno ) );
						 			$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'*', 'where'=>"msgno = $msgno" ) );
						 		break;
						 	case 'get-total-message-notification':
						 			// echo " get otal ";
						 			# $response = $mc->fs_message(   array(  'type'=>'get-total-message-notification',  'mno' => $mno ) );
						 		 	$response = select_v4( array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'count(*) as msgno',  'where'=>" mno2 = $mno and status = 1 " ) );  
						 		 	// $this->print_r1( $response ); 
						 			$response = $response[0]['msgno'];  
						 		break;
						 
							default:    
								break;  
						}
						return $response;  
				}  
				/*
				* table name fs_view
				* created august 22 , 2014
				*
				*/ 
				public function fs_keyword( $array ) { 


 


						# initialized
						  	$kno         = ( !empty($array['kno']) )         ? $array['kno']         : null ; 
							$keyword     = ( !empty($array['keyword']) )     ? $array['keyword']     : null ; 
							$table_name  = ( !empty($array['table_name']) )  ? $array['table_name']  : null ; 
							$table_id    = ( !empty($array['table_id']) )    ? $array['table_id']    : null ; 
							$date        = ( !empty($array['date']) )        ? $array['date']        : $this->date_time ;   


						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'msgno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  


 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   


						# response  
							$response    = '';
							$tdb         = 'fs_keyword';  

							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert':
									#   $response = $mc->fs_message(   array(  'type'=>'insert',  'mno' => $mno,  'mno1' => $mno1, 'message' => $message   ) );
									// echo " insert here <br> ";   
									$response = insert(
										$tdb,  
										array(  
											'keyword',
											'table_name', 
											'table_id',  
											'date' 
										)
										,
										array(   
											$keyword, 
											$table_name,
											$table_id,  
											$date 
										),
										'kno'
									);    
								break;  
							case 'insert-not-exist':  



								    // $keyword = 'jesus , erwin , suarez , gwapo , ko , wee1 , haha1 , well1 , again1 , youw1 , many1 '; 
								    // $response = $mc->fs_keyword(   array(  'type'=>'insert-not-exist' , 'table_id'=>1 ,  'table_name'=>'fs_postedarticles' , 'keyword' =>$keyword  ) );
								    
								 

								    $keywords = explode(',', $keyword );    
								    foreach ($keywords as $key => $keyword) {   

									 	$response = select_v4(  array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'*', 'where'=>" keyword = '$keyword' " ) );    
									 	$this->message( " keyword = $keyword exist "  , $response  , ' ' );
									 	if ( empty($response) ) { 

									 		$response = $this->fs_keyword(   array(  'type'=>'insert' , 'table_id'=>$table_id ,  'table_name'=>$table_name , 'keyword' => $keyword  ) );
									 		$this->message( " keyword = $keyword "  , $response  , ' added to keyword list  ' );
									 	} 
									} 
								break; 
							case 'select': 
			 			 			#$response = $mc->fs_keyword(  array(  'type'=>'select', 'where'=> "keyword LIKE '%$keySearch%'", 'orderby'=> 'sno asc', 'limit_start'=>0, 'limit_end'=>10 ) );  
									// echo " this is to select ";
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);       	

 									return ( !empty($response) ) ? $response : null ; 
								break; 
							case 'delete':

								 	$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );   
								break;
							default:    
								break;  
						}
						return $response;  
				}  
				/*
				* table name fs_view
				* created august 22 , 2014
				*
				*/ 
				public function fs_signup_code( $array ) { 


  

						# initialized
						  	$scno        	 = ( !empty($array['scno']) )         	    ? $array['scno']            : null ; 
							$generated_code  = ( !empty($array['generated_code']) )     ? $array['generated_code']  : null ; 
							$mno  			 = ( !empty($array['mno']) )    			? $array['mno']  			: null ; 
							$date            = ( !empty($array['date']) )    			? $array['date']    		: $this->date_time ;    ; 
							 

						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'msgno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  


 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   


						# response  
							$response    = '';
							$tdb         = 'fs_signup_code';  

							// $this->print_r1( $array );
						switch ( $type ) {
							case 'insert': 
									# $response = $mc->fs_signup_code(   array( 'type' =>'insert','generated_code'=>$mc->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) )  ) );  
									$response = insert(
										$tdb,  
										array(  
											'generated_code',
											'mno', 
											'date' 
										)
										,
										array(   
											$generated_code, 
											$mno,
											$date 
										),
										'scno'
									);     
								break;  
							case 'update-mno':   
									// echo "this is the update code ";
									# $response = $mc->fs_signup_code(    array( 'type' =>'update-mno','generated_code'=>'abcdefg123456','mno'=>133  ) );
									return $this->update_fs_table_auto( null , array( 'mno'=> $mno , 'date'=>$date , 'idname'=>'generated_code' , 'idval'=>$generated_code ) , $tdb ); 
								break; 
							case 'select-specific-code':
									# $response = $mc->fs_signup_code(   array( 'type' =>'select-specific-code','generated_code'=>$generated_code ) ); 
								  	$response = $this->fs_signup_code(   
								      	array(	 
									        'type' =>'select', 
									        'where'=>"generated_code = '$generated_code' ",
									        'orderby'=>'scno desc',
									        'limit_start'=>0,
									        'limit_end'=>1  
								      	) 
								    );
								break;
							case 'select-specific-mno':
									# $response = $mc->fs_signup_code(   array( 'type' =>'select-specific-mno','mno'=>$mno ) );
									  $response = $this->fs_signup_code(   
									      array( 
									        'type' =>'select', 
									        'where'=>"mno = $mno ",
									        'orderby'=>'scno desc',
									        'limit_start'=>0,
									        'limit_end'=>1  
									      ) 
									    );
								break; 
							case 'select':      
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);    
 									return ( !empty($response) ) ? $response : null ;  
								break; 
							case 'get-new-gen-time':
									#$response = $mc->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) );
									$response = strtotime( $date ); 
								   	$response = ($response + 11644477200) * 10000000*rand(10000,1000000);  
								   	$response = str_replace('+','', $response );
								   	$response = str_replace('.','', $response ); 
								   	$response = str_replace('E','', $response );
								break;
							case 'generate-new-code-and-return':

								// generate and add new code 

								 	$scno = $this->fs_signup_code(   array( 'type' =>'insert','generated_code'=>$this->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) )  ) );  
								
								// retrieve new added code 

									$response = $this->fs_signup_code(   
								        array( 
								          'type' =>'select', 
								          'where'=>"scno  = $scno ",
								          'orderby'=>'date desc',
								          'limit_start'=>0,
								          'limit_end'=>1  
								        ) 
								    );   

								// get the code only

									$response = $response[0]['generated_code']; 

								break;
							default:    
								break;  
						}
						return $response;  
				}   
				/*
				* table name activity
				* created august 22 , 2014 
				*/  

				public function fs_activity( $array ) { 


  

						# initialized
						  	$scno        	 = ( !empty($array['scno']) )         	    ? $array['scno']            : null ; 
							$table_name  	 = ( !empty($array['table_name']) )     	? $array['table_name']	  : null ; 
							$table_id  		 = ( !empty($array['table_id']) )    	    ? $array['table_id']  			: null ; 
							$date            = ( !empty($array['date']) )    			? $array['date']    		: $this->date_time ;  





						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'msgno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  
							$response    = '';
							$tdb         = 'activity';  
 	


 						$this->print_r1(  $array );
						switch ( $type ) { 
							case 'delete': 
								 	$response = mysql_query( " DELETE FROM activity WHERE _table = '$table_name' and _table_id = $table_id " );  
								break; 
							case 'get-tactivity': 	
 									$response = select_v4( array( 'type'=>'select',  'tablename'=>$tdb, 'rows'=>'count(*) as ano',   'order'=>'ano desc' , 'where'=>'active = 1' ) );
 									$response = $response[0]['ano'];
								break;
							default: 
								break;
						} 

						return $response;  
				}    
				/*
				* table name fs_comment
				* created august 22 , 2014 
				*/   
				public function fs_comment( $array ) { 


  

						# initialized
						  	$cno        	 = ( !empty($array['cno']) )         	    ? $array['cno']            : null ; 
							$table_name  	 = ( !empty($array['table_name']) )     	? $array['table_name']	  : null ; 
							$table_id  		 = ( !empty($array['table_id']) )    	    ? $array['table_id']  			: null ; 
							$date            = ( !empty($array['date']) )    			? $array['date']    		: $this->date_time ;  





						#select
							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'msgno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  
							$response    = '';
							$tdb         = 'fs_comment';   

 						// $this->print_r1(  $array );
						switch ( $type ) { 
							case 'delete': 
								 	$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;
							case 'select': 
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);  

								break;
							default: 
								break;
						}  
						return $response;   
				}   
				/*
				* table name fs_modal_attribute
				* created august 22 , 2014 
				*/   
				
				public function fs_modal_attribute( $array )
                {
						# initialized
						  	$matno 	     = ( !empty($array['matno']) )         	    ? $array['matno']           : null ;  			  // primary key 
							$matcno  	 = ( !empty($array['matcno']) )     	    ? $array['matcno']	        : null ;  			  // foriegn key
							$name		 = ( !empty($array['name']) )    	        ? $array['name']  			: null ; 		 	  // name of the attribute
							$total       = ( !empty($array['total']) )    			? $array['total']    		: 0 ;     			  // total of the attribute people used 
							$mno         = ( !empty($array['mno']) )    			? $array['mno']    		    : 133;         	      // total of the attribute people used
							$status      = ( !empty($array['status']) )    			? $array['status']    		: 0 ;     			  // total of the attribute people used 
							$date        = ( !empty($array['date']) )    			? $array['date']    		: $this->date_time ;  // date attribute created


	 

 
						#select

							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'matno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 
							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  
							$response    = '';
							$tdb         = 'fs_modal_attribute';    

 						// $this->print_r1(  $array );
						switch ( $type ) { 
							case 'insert':

								 	#    $response = $mc->fs_modal_attribute(  array(   'type'=>'insert', 'matcno'=>1, 'name'=>'jesus erwin suarez', 'total'=>200, 'mno'=>133, 'status'=>0 ) );
									$response = insert(
										$tdb,  
										array(  
											'matcno',
											'name', 
											'total',
											'mno',
											'status',
											'date'  
										)
										,
										array(   
											$matcno,
											$name,
											$total,
											$mno,
											$status,
											$date 
										),
										'matno'
									);       
								break;
							case 'delete':  
								 	$response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;
							case 'select':      
							 		# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"name LIKE '$keySearch%' and matcno = 1 ",'limit_start'=>0,'limit_end'=>10)); 
  									# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"keyword LIKE '%$keySearch%' and matcno = 1 or 2 or 3",'limit_start'=>0,'limit_end'=>10)); 
									
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);   
									
								break;
							default: 
								break;
						}  
						return $response;   
				}   

				/*
				* table name fs_modal_attribute
				* created august 22 , 2014 
				*/   
				
				public function fs_pltag( $array ) { 

 
						# initialized
 

							$pltgno           = ( !empty($array['pltgno'])) 			? $array['pltgno'] : null ;
							$plno 		      = ( !empty($array['plno']))			    ? $array['plno'] : null ;
							$plt_color        = ( !empty($array['plt_color'])) 		    ? $array['plt_color'] : null ;
							$plt_brand        = ( !empty($array['plt_brand'])) 	        ? $array['plt_brand'] : null ;
							$plt_garment      = ( !empty($array['plt_garment'])) 		? $array['plt_garment'] : null ;
							$plt_material     = ( !empty($array['plt_material']))       ? $array['plt_material'] : null ;
							$plt_pattern      = ( !empty($array['plt_pattern'])) 	    ? $array['plt_pattern'] : null ;
							$plt_price        = ( !empty($array['plt_price'])) 		    ? $array['plt_price'] : null ;
							$plt_purchased_at = ( !empty($array['plt_purchased_at']))   ? $array['plt_purchased_at'] : null ;
							$plt_x 			  = ( !empty($array['plt_x'])) 				? $array['plt_x'] : null ;
							$plt_y 			  = ( !empty($array['plt_y'])) 			    ? $array['plt_y'] : null ;
							$plt_date 	      = ( !empty($array['date'])) 				? $array['date'] : $this->date_time ;
							$table_id 	      = ( !empty($array['table_id'])) 		    ? $array['table_id'] : 0;
							
 
 
						#select

							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'matno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  

							$response    = '';
							$tdb         = 'fs_pltag';    

 						// $this->print_r1(  $array );
						switch ( $type ) { 

							case 'insert': 

								 	# $response = $mc->fs_modal_attribute(  array(   'type'=>'insert', 'matcno'=>1, 'name'=>'jesus erwin suarez', 'total'=>200, 'mno'=>133, 'status'=>0 ) ); 

									$response = insert(
										$tdb,  
										array(  
											'plno',
											'plt_color', 
											'plt_brand',
											'plt_garment',
											'plt_material',
											'plt_pattern',   
											'plt_price',
											'plt_purchased_at',
											'plt_x' ,
											'plt_y',
											'plt_date'  
										)
										,
										array(   
											$plno,
											$plt_color,
											$plt_brand,
											$plt_garment,
											$plt_material,
											$plt_pattern,
											$plt_price,
											$plt_purchased_at,
											$plt_x, 
											$plt_y,
											$plt_date 
										),
										'pltgno'
									);        
								break;
							case 'delete':  

								 	$response = mysql_query( " DELETE FROM $tdb  WHERE plno = $table_id " );  

								break;
							case 'select': 
							 		# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"name LIKE '$keySearch%' and matcno = 1 ",'limit_start'=>0,'limit_end'=>10)); 
  									# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"keyword LIKE '%$keySearch%' and matcno = 1 or 2 or 3",'limit_start'=>0,'limit_end'=>10)); 
									
									// $response = select_v3( 
									// 	$tdb, 
									// 	'*',
									// 	" $where order by $orderby limit $limit_start , $limit_end"
									// );    
								break;
							default: 
								break;
						}  
						return $response;   
				}   

				/*
				* table name fs_brand
				* created august 22 , 2014 
				*/   
				
				public function fs_brand( $array ) { 

 
						# initialized
 
 

 			 
 
							$bno 				     = ( !empty($array['bno'])) 				     ? $array['bno'] 					 : null ;
							$bcno 				     = ( !empty($array['bcno'])) 					 ? $array['bcno'] 					 : null ;
							$bname 				     = ( !empty($array['bname'])) 					 ? $array['bname'] 					 : null ;
							$b_total_selected_people = ( !empty($array['b_total_selected_people']))  ? $array['b_total_selected_people'] : null ;
							$gender 			     = ( !empty($array['gender'])) 					 ? $array['gender'] 			     : null ;
							$visible 			     = ( !empty($array['visible'])) 			     ? $array['visible'] 				 : null ;
							$date 				     = ( !empty($array['b_added_date'])) 		     ? $array['b_added_date'] 			 : $this->date_time ;








 
						#select

							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'matno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  

							$response    = '';
							$tdb         = 'fs_brands';    

 						// $this->print_r1(  $array );
						switch ( $type ) { 
							case 'insert':


									echo " insert";
								 	# $response = $mc->fs_brand(  array(   'type'=>'insert', 'matcno'=>1, 'name'=>'jesus erwin suarez', 'total'=>200, 'mno'=>133, 'status'=>0 ) ); 

									$response = insert(
										$tdb,  
										array(  
											'bcno',
											'bname', 
											'b_total_selected_people',
											'gender',
											'visible',
											'b_added_date' 
										)
										,
										array(   
											$bcno,
											$bname,
											$b_total_selected_people,
											$gender,
											$visible,
											$date 
										),
										'bno'
									);       

								break;
							case 'insert-if-not-exist': 

   									# $response = $mc->fs_brand(  array(   'type'=>'insert-if-not-exist','bname'=>'ok3','bcno'=>1,  'gender'=>1) ); 
							  		if ( !selectV1( '*','fs_brands',array('bname'=>$bname) ) ) {  
							  			$response = $this->fs_brand(  
									        array(   
									          	'type'=>'insert',
									          	'bname'=>$bname,
									          	'bcno'=>$bcno,  
									          	'gender'=>$gender,
									      	)
									    );  	  
								  	}else{ 
								  		// updated counter of total used by the people
								  	}
								break;
							case 'delete':  
								 	// $response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;
							case 'select':      
							 		# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"name LIKE '$keySearch%' and matcno = 1 ",'limit_start'=>0,'limit_end'=>10)); 
  									# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"keyword LIKE '%$keySearch%' and matcno = 1 or 2 or 3",'limit_start'=>0,'limit_end'=>10)); 
									
									// $response = select_v3( 
									// 	$tdb, 
									// 	'*',
									// 	" $where order by $orderby limit $limit_start , $limit_end"
									// );   
									
								break;
							default: 
								break;
						}  
						return $response;   
				}   

				/*
				* table name fs_brand
				* created august 22 , 2014 
				*/   
				public function fs_brand_category( $array ) { 

 
						# initialized
 
 

 			 
 
							$bcno 				         = ( !empty($array['bcno'])) 				        ? $array['bcno'] 					     : null ;
							$bc_name 				     = ( !empty($array['bc_name'])) 				    ? ucfirst($array['bc_name'])   			 : null ;
							$bc_total_selected_people    = ( !empty($array['bc_total_selected_people']))    ? $array['bc_total_selected_people']     : null ;
							$bc_total_brand 			 = ( !empty($array['bc_total_brand']))  			? $array['b_total_selected_people'] 	 : null ;
							$bc_added_date 			     = ( !empty($array['bc_added_date'])) 			    ? $array['bc_total_brand'] 			     : null ;
							$date 			    		 = ( !empty($array['visible'])) 			        ? $array['bc_added_date'] 				 : $this->date_time ;
							 



 


 
						#select

							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'msgno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'matno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  

							$response    = '';
							$tdb         = 'fs_brand_category';    

 						// $this->print_r1(  $array );
						switch ( $type ) { 
							case 'insert':


									echo " insert";
								 	# $response = $mc->fs_brand(  array(   'type'=>'insert', 'matcno'=>1, 'name'=>'jesus erwin suarez', 'total'=>200, 'mno'=>133, 'status'=>0 ) ); 

									$response = insert(
										$tdb,  
										array(  
											'bcno',
											'bc_name', 
											'bc_total_selected_people',
											'bc_total_brand',
											'bc_added_date',
											'bc_added_date' 
										)
										,
										array(   
											$bcno,
											$bc_name,
											$bc_total_selected_people,
											$bc_total_brand,
											$bc_added_date,
											$date 
										),
										'bno'
									);        
								break;
							case 'insert-if-not-exist':  


								break;
							case 'delete':  

								 	// $response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;
							case 'select': 

							 		# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"name LIKE '$keySearch%' and matcno = 1 ",'limit_start'=>0,'limit_end'=>10)); 
  									# $response = $mc->fs_modal_attribute( array(  'type'=>'select','where'=>"keyword LIKE '%$keySearch%' and matcno = 1 or 2 or 3",'limit_start'=>0,'limit_end'=>10)); 
									
									// $response = select_v3( 
									// 	$tdb, 
									// 	'*',
									// 	" $where order by $orderby limit $limit_start , $limit_end"
									// );    
								break;
							case 'get-bcno': 

									// select if not exist then add new brand category 
							
									// return the new id of the new brand category  

										echo " get bcno ";
										$response = select_v3( 
											$tdb, 
											'*',
											"bc_name = '$bc_name'"
										);    
										$response = $response[0]['bcno'];  
								break;
							default: 
								break;
						}  
						return $response;   
				}    

 
				/*
				* table name fs_member_categories
				* created august 22 , 2014 
				*/   
				public function fs_member_categories( $array ) { 

 
						# initialized
  
							$mcno 	       = ( !empty($array['mcno'])) 		   ? $array['mcno'] 	     : null ;
							$mno 		   = ( !empty($array['mno']))          ? $array['mno']           : null ;
							$category 	   = ( !empty($array['category'])) 	   ? $array['category']  : null ;
							$trating 	   = ( !empty($array['trating']))  	   ? $array['trating'] 	 	 : null ;
							$tpercentage   = ( !empty($array['tpercentage']))  ? $array['tpercentage'] 	 : null ;
							$table_name    = ( !empty($array['table_name']))   ? $array['table_name']     : null ; 
							$date 		   = ( !empty($array['date'])) 		   ? $array['date'] 	     : $this->date_time ;
							   
						#select

							$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'mcno > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'mcno desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  

							$response    = '';
							$tdb         = 'fs_member_categories';    

 							// $this->print_r1(  $array );
 
							switch ( $type ) { 
								case 'insert':


										# echo " insert";
									 	# $response = $mc->fs_member_categories(   array(  'type'=>'insert', 'category'=>'chic', 'mno'=>133, 'table_name'=>'postedlooks', 'trating'=>20, 'tpercentage'=>90 ) );

										$response = insert(
											$tdb,  
											array(  
												'mno',
												'category', 
												'trating',
												'tpercentage',
												'table_name',
												'date' 
											)
											,
											array(   
												$mno,
												$category,
												$trating,
												$tpercentage,
												$table_name,
												$date 
											),
											'mcno'
										);  
									break;
								case 'delete':  

									 	// $response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
									break;
								case 'select':   

										# $response = $mc->fs_member_categories(   array(  'type'=>'select',  'where'=>" mno = $mno and category = '$category'" ) );
										$response = select_v3( 
											$tdb, 
											'*',
											" $where order by $orderby limit $limit_start , $limit_end"
										);    
									break;  
								case 'update': 

									break;
								case 'insert-or-update-trating-and-tpercetange':
										#  $response = $mc->fs_member_categories(   array(  'type'=>'insert-or-update-trating-and-tpercetange','trating'   =>20,'tpercentage'=>93,'mno'=>1332,'table_name'=>'postedlooks','category'=>'preppy') );  
										
										$response = $this->fs_member_categories(  
										    array( 
										        'type'=>'select', 
										        'where'=>" mno = $mno and category = '$category'"
										    )
									    );
	 
										if ( !empty($response) ) { 

											// update user category percentage and ratings

												$response = mysql_query(" UPDATE $tdb SET trating = $trating , tpercentage = $tpercentage WHERE  mno = $mno and category = '$category' "); 

											// print message output 

												$this->message( " update user category = $category , trating = $trating , tpercentage = $tpercentage " , $response , "" ); 

										}
										else{

											// echo " insert new category for sepcific user <br>";
											
											// insert new user category percentage and ratings

												$response = $this->fs_member_categories(   array(  'type'=>'insert', 'category'=>$category, 'mno'=>$mno, 'table_name'=>$table_name, 'trating'=>$trating, 'tpercentage'=>$tpercentage ) );
											
											// print message output 

												$this->message( " insert user category = $category , trating = $trating , tpercentage = $tpercentage " , $response , "" ); 

										} 
									break;

								default: 
									break;
							}  

						return $response;   
				}    


				/*
				* table name fs_invited
				* created august 22 , 2014 
				*/   
				public function fs_invited( $array ) { 
 
						# initialized 

							$invited_id 	       = ( !empty($array['invited_id'])) 		? $array['invited_id'] 	     : null ;
							$invited_fn 	       = ( !empty($array['invited_fn'])) 		? $array['invited_fn'] 	     : null ;
							$invited_ln 	       = ( !empty($array['invited_ln'])) 		? $array['invited_ln'] 	     : null ;
							$invited_email 	       = ( !empty($array['invited_email']))     ? $array['invited_email'] 	 : null ;
							$invited_wob 	       = ( !empty($array['invited_wob'])) 		? $array['invited_wob'] 	 : null ;
							$invited_occu 	       = ( !empty($array['invited_occu'])) 		? $array['invited_occu'] 	 : null ;
							$invited_style 	       = ( !empty($array['invited_style']))     ? $array['invited_style'] 	 : null ; 
							$description 	       = ( !empty($array['description'])) 	    ? $array['description']      : null;
							$invited_offer 	       = ( !empty($array['invited_offer']))     ? $array['invited_offer'] 	 : null ;
							$invited_genCode 	   = ( !empty($array['invited_genCode']))   ? $array['invited_genCode']  : null ;
							$invited_ip 	       = ( !empty($array['invited_ip'])) 	    ? $array['invited_ip'] 	     : null ;
							$invited_status 	   = ( !empty($array['invited_status']))    ? $array['invited_status']   : null ;
							$invited_date 	       = ( !empty($array['invited_date'])) 	    ? $array['invited_date']     : $this->date_time ;  
							$city            	   = ( !empty($array['city']))   		    ? $array['city']  			 : null ;
							$state             	   = ( !empty($array['state'])) 	    	? $array['state'] 	     	 : null ;
							$country           	   = ( !empty($array['country']))    		? $array['country']   		 : null ;
							$tlook           	   = ( !empty($array['tlook']))    			? $array['tlook']   		 : null ;
 

						#select

    						$keySearch   = ( !empty($array['keySearch']) )   ? $array['keySearch']   : null ; 
							$where       = ( !empty($array['where']) )       ? $array['where']       : 'invited_id > 0' ; 
							$orderby     = ( !empty($array['orderby']) )     ? $array['orderby']     : 'invited_id desc' ; 
							$limit_start = ( !empty($array['limit_start']) ) ? $array['limit_start'] : 0 ; 
							$limit_end   = ( !empty($array['limit_end']) )   ? $array['limit_end']   : 1 ; 
							$type        = ( !empty($array['type']) )        ? $array['type']        : 1 ;  

 						# uodate 

							$idname      = ( !empty($array['idname']) )      ? $array['idname']      : 'msgno' ; 
							$idval       = ( !empty($array['idval']) )       ? $array['idval']       : 0 ;   
 
						# response  

							$response    = '';
							$tdb         = 'fs_invited';    

 						// $this->print_r1(  $array );



						switch ( $type ) { 
							case 'insert':


									# echo " insert";
								 	# $response = $mc->fs_invited( array(  'type'=>'insert', 'invited_fn'=>'jesus  erwin suarez', 'invited_email'=>'jesuserwin@gmail.com' ) );


									$response = insert(
										$tdb,  
										array(   
											'invited_fn',
											'invited_ln',
											'invited_email',
											'invited_wob',
											'invited_occu',
											'invited_style',
											'invited_offer',
											'description',
											'city',
											'state',
											'country',
											'tlook',
											'invited_genCode',
											'invited_ip',
											'invited_status',
											'invited_date' 
										)
										,
										array(    
											$invited_fn,
											$invited_ln,
											$invited_email,
											$invited_wob,
											$invited_occu,
											$invited_style,
											$invited_offer,
											$description,
											$city,
											$state,
											$country,
											$tlook,
											$invited_genCode,
											$invited_ip,
											$invited_status,
											$invited_date 
										),
										'invited_id'
									);  
								break;
							case 'delete':  

								 	// $response = mysql_query( " DELETE FROM $tdb  WHERE table_name = '$table_name' and table_id = $table_id " );  
								break;
							case 'select':   

									# $response = $mc->fs_invited(   array(  'type'=>'select',  'where'=>" mno = $mno and category = '$category'" ) );
									$response = select_v3( 
										$tdb, 
										'*',
										" $where order by $orderby limit $limit_start , $limit_end"
									);    
								break;  
							case 'update': 

									// this is the best ever
								break;
							case 'insert-or-update-trating-and-tpercetange':
									#  $response = $mc->fs_member_categories(   array(  'type'=>'insert-or-update-trating-and-tpercetange','trating'   =>20,'tpercentage'=>93,'mno'=>1332,'table_name'=>'postedlooks','category'=>'preppy') );  
									
									$response = $this->fs_member_categories(  
									    array( 
									        'type'=>'select', 
									        'where'=>" mno = $mno and category = '$category'"
									    )
								    );
 
									if ( !empty($response) ) { 

										// update user category percentage and ratings

											$response = mysql_query(" UPDATE $tdb SET trating = $trating , tpercentage = $tpercentage WHERE  mno = $mno and category = '$category' "); 

										// print message output 

											$this->message( " update user category = $category , trating = $trating , tpercentage = $tpercentage " , $response , "" ); 

									}
									else{

										// echo " insert new category for sepcific user <br>";
										
										// insert new user category percentage and ratings

											$response = $this->fs_member_categories(   array(  'type'=>'insert', 'category'=>$category, 'mno'=>$mno, 'table_name'=>$table_name, 'trating'=>$trating, 'tpercentage'=>$tpercentage ) );
										
										// print message output 

											$this->message( " insert user category = $category , trating = $trating , tpercentage = $tpercentage " , $response , "" ); 

									} 
								break;

							default: 
								break;
						}  
						return $response;   
				}      
			#END TABLE QUERY
			#NEW TIME 
				public function time( $array ) {
					 		
					$date['date1'] = ( !empty($array['date1'])) ? str_replace(' ', '', $array['date1']) : null ;  // current date  
					$date['date2'] = ( !empty($array['date2'])) ? str_replace(' ', '', $array['date2']) : null ;  // new date 
					$date['type']  = ( !empty($array['type']))  ? $array['type']  : null ;  // type of what kind of function 
 
					switch ( $date['type'] ) {
						case 'get-time-deffirence': 


								// echo '<br>date1 = ' . $date['date1'] . ' date1 = ' .$date['date2'];
								# $response = $mc->time(  array( 'type'=>'get-time-deffirence', 'date1'=>'current date 2014-10-01' , 'date2' => 'new date 2014-10-09 '   ) ); return 8 
								$datetime1 = date_create($date['date1']);
								$datetime2 = date_create($date['date2']);
								$interval = date_diff($datetime1 , $datetime2);
								$response = $interval->format('%R%a days'); 
								$response = intval($response);  
								 						 
							break; 
						case 'get-datetime-date':
								#   $response = $mc->time(  array( 'type'=>'get-datetime-date', 'date1'=>'2014-10-20 06:46:15' ) ); 
							  	$response = substr($date['date1'],0,10); 
							break;
						default:
							# code...
							break;
					} 
					return $response; 
				}
				public function date_format( $date, $separator='/' ) { 

					// this is time converstion 
					// $date='2013-02-07';
					if( empty($separator) ){
						$separator = '/';
					}
					$year =  substr($date,0,4);
					$month = substr($date,5,2);
					$days = substr($date,8,2);
					$formated_date = $month."$separator".$days."$separator".$year;
					return $formated_date;

				}
			   	public function convert_datetime($str) {  
			   		//str not equal to null because when the str is null it shows and error and it make the page design not good and it could be a hall.
			   		if ( $str!=null) {
			   			list($date, $time) = explode(' ', $str);
				    	list($year, $month, $day) = explode('-', $date);
				    	list($hour, $minute, $second) = explode(':', $time);
				    	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
				    	return $timestamp;	 
			   		} 
			    } 
			   	public function makeAgo($timestamp){   
			   		// I added the condition  timestamp not null because there is a time that the zero is not divisible.
			   		if ( $timestamp!=null) { 
				   		$difference = time() - $timestamp;
				   		$periods = array("sec", "min", "hr", "day", "week", "month", "year", "decade");
				   		$lengths = array("60","60","24","7","4.35","12","10");
				   		for($j = 0; $difference >= $lengths[$j]; $j++) 
				   			$difference /= $lengths[$j];
				   			$difference = round($difference);
				   		if($difference != 1) $periods[$j].= "s";
				   			$text = "$difference $periods[$j] ago";
				   			return $text; 
				 	} 
			    }
			    public function get_time_ago($dateTime, $type=null) { 
			    	$pos = strpos( $dateTime , '000-');  
			    	// echo " pos $pos <br> ";
			    	if ( $pos != 1 ) {
			    		// echo "date is not empty ";
				    	$ts = $dateTime; 
						$convertedTime = $this->convert_datetime($ts) ; // Convert Date Time
						// echo " converted $convertedTime ";
						$when = $this->makeAgo($convertedTime); // Then convert to ago time 
						// echo " <span style='font-size:5px;'> $when </span>";  
						if($type != null) {
							return "$when";	
						} else { 
							return "<span class='time-ago' >$when</span><br>";	
						}
						
					}
					else{  
						 // echo "date is  empty ";	
						return false;
					}
			    } 
				public function dateTime_convert( $dateTime ) {
			   		// POSTED BY Fashion Sponge ||| ON DECEMBER 30TH, 2013 | 10:41 AM 2013-12-20 05:11:00

			   		// echo " date time convertion. $dateTime ";

			   		$month_name = array( 
			 			'01'=>'JANUARY',
			 			'02'=>'FEBRUARY',
			 			'03'=>'MARCH',
			 			'04'=>'APRIL',
			 			'05'=>'MAY',
			 			'06'=>'JUNE',
			 			'07'=>'JULY',
			 			'08'=>'AUGUST',
			 			'09'=>'SEPTEMBER',
			 			'10'=>'OCTOBER',
			 			'11'=>'NOVEMBER',
			 			'12'=>'DECEMBER'
			 		);  
					$date = explode('-',$dateTime);  
		 			$year = $date[0];
		 			$month = $date[1];
		 		 	$month = $month_name[$month];
		 			$dayTime = explode(":",$date[2]); 
		 			// $days = $date[2];
		 			// print_r($dayTime);
		 			$mins = $dayTime[1];
		 			$secs = $dayTime[2];
		 		    $dayTime1 = explode(" ",$dayTime[0]);
		 		    // print_r($dayTime1);
		 		    $days = intval($dayTime1[0]);
		 		    if ( $days == 1 ) {
		 		    	 $days = $days."ST";
		 		    }elseif ( $days == 2 ) {
		 		    	$days = $days."ND";
		 		    }elseif ( $days == 3 ) {
		 		    	$days = $days."RD";
		 		    }else{
		 		    	$days = $days."TH";
		 		    } 
		 		    $hours = $dayTime1[1];  

		 		    if ($hours > 11 ){
			 			$stat='PM';
		 		    }
			 		else{
			 			$stat='AM';
			 		}  
			 		$hours = $this->conver_time24_to12($hours); 
		 		    $converted = strtolower("$month $days, $year $hours:$mins$stat"); 
		 		    return  ucfirst($converted);
			   	}  
			   	public function split_date($year=null,$month=null,$day=null,$date_time=null,$date=null) { 
					if (!empty($date_time)) {
						// echo $date_time;	
						$year  = substr($date_time,0,4);
						$month = substr($date_time,5,2);
						$day   = substr($date_time,8,2);
						$hour  = substr($date_time,11,2);
						$min   = substr($date_time,14,2);
						$sec   = substr($date_time,17,2);

						$date_format = array(
						 	'year'=>$year,
						 	'month'=>strtoupper(get_month_name($month)),
						 	'day'=>$day,
						 	'hour'=>$this->conver_time24_to12($hour),
						 	'min'=>$min,
						 	'sec'=>$sec,
						 	'stat'=>strtoupper(get_time_stat($hour))
						);
						return $date_format;
					}
				}  
				public function conver_time24_to12($t24){
			 		$time = array(
			 			'13' => '1', 
			 			'14' => '2', 
			 			'15' => '3', 
			 			'16' => '4', 
			 			'17' => '5', 
			 			'18' => '6', 
			 			'19' => '7', 
			 			'20' => '8', 
			 			'21' => '9', 
			 			'22' => '10', 
			 			'23' => '11', 
			 			'00' => '12',
			 		);
			 		 if (empty($time[$t24]))
			 		 	return $t24;
			 		else 
			 			return $time[$t24];
			 	}
				public function get_month_name( $m ){ 
		 			// echo " m = $m";

		 			if (!empty($m)) {
				 			 
				 		$m=intval($m);
				 		// echo " month = $m <br>";
				 		$month_name = array( 
				 			'1'=>'January',
				 			'2'=>'February',
				 			'3'=>'March',
				 			'4'=>'April',
				 			'5'=>'May',
				 			'6'=>'June',
				 			'7'=>'July',
				 			'8'=>'August',
				 			'9'=>'September',
				 			'10'=>'October',
				 			'11'=>'November',
				 			'12'=>'December'); 
				 		// echo ' month name here = > '.$month_name[$m].'<br>';
				 		return $month_name[$m];
			 		}
		 		}
			#END TIME    
		    #NEW TOP DATA
		    	public function get_top_data ( $rowname ) { 
		    		$tr=selectV1(
				     	"$rowname",
					 	"fs_top_data" 
					); 
				 	return $tr[0]["$rowname"]; 	
		    	}
		    	public function update_top_data ( $rowname , $rowval ) {
		    		$tdno=selectV1(
				     	"tdno",
					 	"fs_top_data" 
					);  
					$tdno1 = intval( $tdno[0]['tdno'] ); 
		    		update_v1( 
		        		array(
			        		"table_name"=>'fs_top_data',
			        		"$rowname"=>$rowval 
			        	) ,
		        		array(
		        			'tdno'=>$tdno1 
		        		)  
		    		); 
		    		return $rowval;
		    	} 
		    #END TOP DATA   
		    #NEW TEXT 
		    	public function ucname( $string ) {
				    $string =ucwords(strtolower($string));

				    foreach (array('-', '\'') as $delimiter) {
				      if (strpos($string, $delimiter)!==false) {
				        $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
				      }
				    }
				    return $string;
				} 
		    #END TEXT 
		    #NEW TEXT CLEANER 
				public function make_links_clickable($text){
				    $text = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a id="text-domain" target="_blank" href="$1">$1</a>' , $text);
				    // $text = str_replace('.', ' ', $text); 
				    return $text;
				}
		    	public function clean_text_before_save_to_db( $string ) {

		    		$clear  = str_replace('&','[ampersand]', $string ); // ampersand 
				    $clear  = str_replace("’","[sigle-qutation-mark]",  $clear  );    // comma   
				    $clear  = mysql_real_escape_string($clear); 

 

				    
				    // $clear  = preg_replace('/[^(\x20-\x7F)]*/','', $string);  // remove the text not utf8
				     // Strip HTML Tags
			        // $clear = strip_tags($clear);
			        // Clean up things like &amp;
			        // $clear = html_entity_decode($clear);
			        // Strip out any url-encoded stuff
			        // $clear = urldecode($clear);
			        // Replace non-AlNum characters with space
			        // $clear = preg_replace('/[^A-Za-z0-9-!]/', ' ', $clear);
			        // Replace Multiple spaces with single space  
			        // $clear = preg_replace('/ +/', ' ', $clear);
			        // Trim the string of leading/trailing space
			        // $clear = trim($clear); 



				    // make the url as a clickable 

				    	// $clear = $this->make_links_clickable($clear); 
				    	




				    return $clear;   

		    	}
		    	public function cleant_text_print_from_db( $string ) {  

		    		$string  = str_replace('[ampersand]',"&",  $string );    
		    		$string  = str_replace('[sigle-qutation-mark]',"'",  $string  );  
		    		// $string  = htmlspecialchars (
		    		$string = str_replace('\"', '"', $string);

		    		return $string;  
		    	}
		    #END TEXT CLEANER 
		    #NEW TIMER PLUGIN
		    	public function timer_contest_countdown_plugin ( $type='stop' ) {    

		    			switch ( $type ) {
		    				case 'start': 
								    $this->Current_days = date("d");
								    $this->hour = date("H");
								    $this->min = date("i");
								    $this->sec = date("s");
								    $this->maxDays = date("t"); 
								    $this->min  = 60-$this->min;
								    $this->sec  = 60-$this->sec;
								    $this->hour = 24-$this->hour;
								    $this->remainingDays = $this->maxDays - $this->Current_days;    
								    $this->remainingDays += 6;  
		    					break;
		    				case 'stop':
			    					$this->min  = '--';
								    $this->sec  = '--';
								    $this->hour = '--'; 
								    $this->remainingDays='--';
		    					break;
		    				default:
		    					
		    					break;
		    			}  
					    	 
				    ?>  

				    <script type="text/javascript">  
				      var sec = '<?php echo $this->sec; ?>'; 
				      var min =  '<?php echo $this->min; ?>'; 
				      var hour =  '<?php echo $this->hour; ?>'; 
				      var Current_days =  '<?php echo $this->Current_days; ?>';
				      var maxDays =   '<?php echo $this->maxDays; ?>';   
				      var remainingDays = maxDays - Current_days;

				      start();  
				      function start(){  
				        // setTimeout('next()',0);
				      }
				      function next(){ 

				          	sec--; 
				          	$('#fs-timer-seconds').css('display','none'); 

				          	if (sec == 0) { 
				          		document.getElementById('fs-timer-seconds').innerHTML = 59;  
				          	}else{
				          		document.getElementById('fs-timer-seconds').innerHTML = sec;  
				          	}   
				          	// $('#fs-timer-seconds').slideDown(1000);  
				        	$( "#fs-timer-seconds" ).slideDown( 900, function() { 
							    document.getElementById('fs-timer-seconds-container').innerHTML = sec;  
							});

				        if (sec == 0) {
				          	sec=59;
				          	min--;

				          	$('#fs-timer-minutes').css('display','none');  
				          	if (min == 0) { 
				          		document.getElementById('fs-timer-minutes').innerHTML = 59;  
				          	}else{
				          		document.getElementById('fs-timer-minutes').innerHTML = min;  
				          	}   
				          	$('#fs-timer-minutes').slideDown(1000);   
				        }
				        if (min == 0) { 
				          	min=59
				          	hour--; 

				          	$('#fs-timer-hours').css('display','none');  
				          	if (min == 0) { 
				          		document.getElementById('fs-timer-hours').innerHTML = 59;  
				          	}else{
				          		document.getElementById('fs-timer-hours').innerHTML = sec;  
				          	}   
				          	$('#fs-timer-hours').slideDown(1000);

				        }
				        if (hour == 0) {   
				        	hour = 24;
				          	remainingDays--;   

				          	$('#fs-timer-days').css('display','none');   
				          		document.getElementById('fs-timer-days').innerHTML = remainingDays;   
				          	$('#fs-timer-days').slideDown(1000); 

				        };  
				        // document.getElementById('time').innerHTML = "<b>"+remainingDays+"</b> days | <b>"+hour+"</b> hrs | <b>"+min+"</b> mins | <b>"+sec+"</b> secs ";
				        setTimeout('start()',1000); 
				      }
				    </script>

		    		 <?php
		    	}
		    #END TIMER PLUGIN 

		// U
			#NEW USER   
		    	public function auto_create_user( $array=null ) {


		    		/*

						paste this code to auto create user

					     $mc->auto_create_user(   
					        array( 
					          'loop_start'=>0, 
					          'loop_end'=>100 
					        )
					      ); 

		    		*/



		    		// loop start and end 

		    			$loop_start = ( !empty( $array['loop_start'] ) ) ? $array['loop_start'] : 0 ;
						$loop_end   = ( !empty( $array['loop_end']   ) ) ? $array['loop_end'] : 1 ;

					// user info 

						$fname_text   = ( !empty( $array['fname_text']   ) ) ?$array['fname_text'] : 'tester' ;
						$mail_text    = ( !empty( $array['mail_text']    ) ) ? $array['mail_text'] : 'fstester' ;
						$pass_text    = ( !empty( $array['pass_text']    ) ) ? $array['pass_text'] : '123456' ; 


					// question and answer 

						$uanswer   = ( !empty( $array['uanswer']   ) ) ? $array['uanswer'] : 1 ;
						$ranswer   = ( !empty( $array['ranswer']   ) ) ? $array['ranswer'] : 1 ;

					// others 

						$login_error = true ;



					for ($i=$loop_start; $i < $loop_end ; $i++): 

						 	// initialize data 

								$fname    	  = "$fname_text$i";   
							 	$mail      	  = "$mail_text$i@gmail.com";   
							 	$pass     	  = "$pass_text";    
							 	$signupcode   = $this->fs_signup_code(   array( 'type' =>'generate-new-code-and-return' )  );    					  
						     	 	 
					 	 	// check if the email already exist 

							 	$acc = selectV1( '*', 'fs_member_accounts', array('email'=>"$mail" )   );   



								// if not exist add new user info 

								if ( empty($acc) ) { 

									// insert new account info 

										$mno = $this->add_new_user( array('firstname'=>$fname , 'email'=>$mail , 'pass'=>$pass ) );

							 		// insert update the code 

										$response = mysql_query( "UPDATE fs_signup_code SET mno = $mno , date = '$this->date_time' WHERE generated_code = '$signupcode' " ); 	

										// $login_error .=  " code ($signupcode) <br>";  


										$this->message( " 'firstname'=>$fname , 'email'=>$mail , 'pass'=>$pass " , $response , "" ); 

										if  ($response) { 
				 
												// $login_error .= "sign up code successfully validate"; 	   

											//  add 1 with the total login

												$this->update_total_login( $mno , 1 , true );   	 
				 
										}
										else{

											$login_error .=  ' (*) failled update new user code. <br>';  
											$this->error_red_field( 'signupcode' );
											// $smessage = "<span class='fs-text-red' > failled update new user code. . . . </span> $sc and mno = $mno "; 	  
										}    
								}
								else{ 

									// if exist show message that email exist

										echo "  'firstname'=>$fname , 'email'=>$mail , 'pass'=>$pass  info <span style='color:red' >  exist </span> <br> ";  
								}
			 					 
					 		
					  

					endfor;




		    	}
		    	public function online_or_not_color( $mno , $status = 1  ) {
		    		 	
		    		// $mno = $mno; 

		    		

		    		if ( $status ) {
		    			echo "<div style='background-color:green; border-radius:100%; padding:5px;' > </div>";
		    		}
		    		else{
		    			echo "<div style='background-color:brown; border-radius:100%; padding:5px;' > </div>";	
		    		} 
		    	} 
				public function get_gender( $mno ) {  
					$gender   =   $gender = selectV1('gender', 'fs_members', array('mno' => $mno ) ); 
					return   ( $gender[0]['gender'] == 'Female' ) ? 'her' : 'his' ;  
				} 
		    	public function update_all_member( $row , $value ) {
		    		

		    		$m = select_v3( 'fs_members' , '*' ,  "mno > 0" );	 
		    		for ($i=0; $i < count($m) ; $i++) { 
		    			$mno = intval( $m[$i]['mno'] );  

			    		$b = update_v1( 
			        		array(
				        		'table_name'=>'fs_members',
				        		$row =>$value
				        	),
			        		array(
			        			'mno'  =>intval($mno) 
		        			)  
		        		);  
		    		} 

		    		return $b;
		    	} 
		    	public function confirm_mem_account( $mno ) {
	        			$b = update_v1( 
			        		array(
				        		'table_name'=>'fs_members',
				        		'status'=>1 
				        	),
			        		array(
			        			'mno'  => $mno 
		        			)  
		        		);   	 
	        		}
		    	public function get_fb_user_fs_info( $fbid ) { 
		    		// echo  "fbid = $fbid"  ; 
					return select_v3( 'fs_members' , '*' ,  "fbid = $fbid" );
		    	} 



		    	public function send_password_to_email( $email , $pass , $username , $fullname ) { 
		    		// echo " $email , $pass , $fullname  ";  

					$subject = "FashionSponge - Password Recovery";  
					$body = "\n\nHi , ".$fullname.
					"\n\nYour Fashion Sponge Email: $email
					 \nYour Fashion Sponge Username: $username
					 \nYour Fashion Password:  $pass   
					 \n\n If you have any questions please contact us @: BrainOfFashion@gmail.com
					 \n\n\n From: Fashion Sponge Team";  
					  

					$this->e = $email;
					return mail("$email", $subject, $body, "From: fs-password-recovery@fashionsponge.COM");  
		    	} 
		    	public function get_password_by( $t , $val ) {  
		    		$mno = 0;
		    		switch ( $t ) {
		    			case 'username':
		    					$mi = selectV1(
									'*', 
									'fs_members',
									array('identity_username'=>"$val" ), 
									'order by mno desc'
								);     
						  		if ( !empty($mi) ) {

						  			$this->p   = $mi[0]['identity_login'];  
						  			$this->un  = $mi[0]['identity_username'];  
						  			$this->e   = $mi[0]['identity_email'];  
						  			$this->ln  = $mi[0]['lastname'];  
						  			$this->fn  = $mi[0]['firstname'];  
						  			$this->nn  = $mi[0]['nickname'];   
						  			$mno       = $mi[0]['mno']; 
						  		} 
		    				break;
		    			case 'email':
		    					$mi = selectV1(
									'*', 
									'fs_members',
									array('identity_email'=>"$val" ),
									'order by mno desc' 
								);     
								if ( !empty($mi) ) { 
						  			$this->p   = $mi[0]['identity_login'];  
						  			$this->un  = $mi[0]['identity_username'];  
						  			$this->e   = $mi[0]['identity_email'];  
						  			$this->ln  = $mi[0]['lastname'];  
						  			$this->fn  = $mi[0]['firstname'];  
						  			$this->nn  = $mi[0]['nickname'];   
						  			$mno       = $mi[0]['mno']; 
						  		} 
		    				break;
		    			default: 
		    				break;  
		    			
		    		}  
 
		    		return $mno;
		    	} 
		    	public function update_total_login( $mno , $tlog=NULL , $bool=false ) {  
		    		// echo " update_total_login( $mno , $tlog=NULL , $bool=false ) ";
		    		if ( $bool == false  ) {  
			    		$mi = $this->get_specific_member_info( $mno ); 
			    		$tlog = intval($mi[0]['tlog']);  

			    		// echo " before added $tlog <br> ";
			    		$tlog = $tlog+1;   

			    		// echo " after added $tlog <br>";
		    		} 
		    		// echo "tlog $tlog  <br> ";
		    		update1('fs_members','tlog',$tlog,array('mno',$mno));   
		    	}  
		    	function add_new_user( $mi ) {  

		    		$firstname = $mi['firstname'];
		    		$email     = $mi['email'];
		    		$pass      = $mi['pass'];  
		    		$igcode    = $this->generate_vefirification_code( $email );

		    		// $email     = $mi['identity_login'];
		    		// $pass      = $mi['identity_username'];
		    		// $pass      = $mi['identity_email']; 
					
					// member info
						

			    		$mno = insert( 
							'fs_members',
							array( 
								'firstname',  
								'identity_login',
								'identity_username',
								'identity_email', 
								'identity_generated_code',
								'status',
								'datejoined'
							),array( 
								$firstname,   
								$pass,
								$firstname, 
								$email,
								$igcode,
								0,
								date("Y-m-d H:i:s")
							) ,  
							'mno' 
						);  

						$npass = $this->encrypt_password( $pass , 1000 );   

		    		// account page
		    			$mano = insert(
							'fs_member_accounts',
							array( 
								'mno', 
								'email' ,
								'username', 
								'pass' 
							),
							array( 
								$mno, 
								$email, 
								$firstname, 
								$npass
							), 
							'mano' 
						);    



		    		// add new unserinfo
		    		/*
		    		$b = insert( 
						'fs_members',
						array( 
							'firstname' , 
							'nickname' ,
							'lastname' , 
							'fbid',
							'aboutme',
							'bdate', 
							'gender', 
							'work_at',
							'occupation',  
							'studied_at', 
							'studied_with',
							'studied_graduate_date', 
							'datejoined'
						),array( 
							$firstname, 
							$nickname, 
							$lastname, 
							$fbid, 
							$bio,
							$birthday,
							$gender, 
							$workat,
							$workwith,
							$studied_at,
							$studied_with,
							$studied_graduate_date,
							date("Y-m-d H:i:s")
						) ,  
						'mno' 
					); 
			 		$userinfo  = $mc->get_latest_user_info( ); 
					$mno       = intval($userinfo[0]['mno']); 
					*/

					// insert new user account 
					/*
						$b = insert(
							'fs_member_accounts',
							array( 
								'mno', 
								'email' ,
								'username', 
								'pass' 
							),
							array( 
								$mno, 
								$email, 
								$username, 
								'' 
							), 
							'mano' 
						);   
					*/  
					if ( !empty($mano) and !empty($mno) ) {
						return $mno;
					}
					else{
						false;
					} 
		    	} 
		    	public function get_user_limit( $array ) { 
		    		$s = $array['start'];
		    		$e = $array['end'];
		    		$o = $array['orderby'];
		    		$w = $array['where'];  
		    		$meminfo = selectV1(
						'*', 
						'fs_members',
						$w, 
						$o,
						"limit $s, $e"
					);   
		    		return $meminfo; 
		    	} 
		    	public function get_all_user_accounts ( ) { 
					$memaccounts=selectV1(
				     	"*",
					 	"fs_member_accounts"  
					);  
					return $memaccounts;  
				} 
				public function get_specific_member_info( $mno ) { 
					$meminfo = selectV1(
						'*', 
						'fs_members',
						array('mno'=>intval($mno) ) 
					);  
					return $meminfo; 
				}
				public function get_specific_member_account( $mno ) { 
					$memacc = selectV1(
						'*', 
						'fs_member_accounts',
						array('mno'=>intval($mno) ) 
					);  
					return $memacc; 
				}
				public function get_all_latest_look ( $limit=50 ) {
					   
					$all_look=selectV1(
						'*',
						'postedlooks',
						'',
						' order by plno desc',
						"limit $limit"

					);
					return $all_look;
				} 
		    	public function get_equivalent_user_percentage( $ovarating , $modal=null ) {  

				    // Looks:
					// Excellent Styling = 90-100%
					// Very Good Styling = 80-89%
					// Good Styling = 70-79%
					// Poor Styling = 60-69%
					// Terrible Styling = 59% and below 
					// Articles:
					// Post Excellant Content = 90-100%
					// Post Very Good Content = 80-89%
					// Post Good Content = 70-79%
					// Post Poor Content = 60-69%
					// Post Terrible Content = 59% and below




		    		switch ( $modal ) {
		    			case 'fs_postedarticles':  
		    					$type = 'Content';
		    				break; 
		    			default:  
								$type = 'Styling';
		    				break;
		    		}
 
		    		if ( $ovarating < 60 ) {   // 59% and below
						$percentage_title = "Post Terrible $type";
					}
					else if (  $ovarating > 59 and $ovarating < 70   ) {   // 60-69%
						$percentage_title = "Post Poor $type";
					}  
					else if ( $ovarating > 69 and  $ovarating < 80 ) {  // 70-79%
						$percentage_title = "Post Good $type";
					} 
					else if ( $ovarating > 79 and  $ovarating < 90 ) {  // 80-89%
						$percentage_title = "Post Very Good $type";
					} 
					else if ( $ovarating > 89 and $ovarating < 101 ) {  // 90-100%
						$percentage_title = "Post Excellent $type";
					}
					else{ 
						$percentage_title = "undefined";
					}  
					return $percentage_title; 

		    	}
				public function get_mno_by_mail( $mail ){ 
					$this->mno = select('fs_member_accounts',5,array('email',$mail));
					$this->mno1 = $this->mno[0][1];
		 			return  $this->mno1;
				}  
				public function get_mnobyusername( $username ){ 
					$username = preg_replace('/\s\s+/', ' ', $username); 

					  echo " this is the username after preg $username <br> ";


					$result =  select_v3( 'fs_members' , '*', " identity_username = '$username'"  );
 
					  /*
					$username=selectV1(
						'*', 
						'fs_members',
						array('identity_username'=>  $username )
					);  */

					 // echo " print username result mno ";
					 // $this->print_r1($result);
					return ( !empty($result[0]['mno']) ) ? $result[0]['mno'] : 136 ;
				} 
				public function get_username_by_mno( $mno ) {



					$username=selectV1(
						'*', 
						'fs_members',
						array('mno'=>intval($mno)) 
					);  


					//echo "from  get_username_by_mno($mno) "  .$username[0]['identity_username'] . '<br>';



					//$this->print_r1($username);
					if ( !empty($username[0]['identity_username'] )) {
						return $username[0]['identity_username']; 
					}
					else{
						return 'FashionSponge'; 	
					} 
				}
				public function get_user_full_fs_info ( $mno , $get=null ) { 

					// select from member 

						$meminfo1=selectV1(
							'*', 
							'fs_members',
							array('mno'=>intval($mno) )
						); 

					// select from account 

						$memaccount=selectV1(
							'*', 
							'fs_member_accounts',
							array('mno'=>intval($mno) )
						);   

					// count total article 

						$tarticle = select_v4( array( 'type'=>'select',  'tablename'=>'fs_postedarticles', 'rows'=>'count(*) as artno',   'order'=>'artno desc'  , 'where'=>" mno = $mno "  ) );
 	
					// trim full name with middle initial



						$fullName = ucfirst($meminfo1[0]['firstname']).' '; 
						if ( !empty($meminfo1[0]['nickname']) ) {
							$fullName .= ucfirst( substr($meminfo1[0]['nickname'],0,1) ).'. '; 
						}
						$fullName .= ucfirst($meminfo1[0]['lastname']); 


					// set codes 

						$meminfo = array(
							'memInfo'             => $meminfo1,
							'memAccount'          => $memaccount,  	 
							'fullName2'           => ucfirst($meminfo1[0]['firstname']).' '.ucfirst($meminfo1[0]['lastname']),
							'fullName1'           => ucfirst($meminfo1[0]['firstname']).' '.ucfirst($meminfo1[0]['nickname']).' '.ucfirst($meminfo1[0]['lastname']),
							'fullName'            => $fullName,
							'username'            => ( !empty($memaccount[0]['username'])) ? $memaccount[0]['username'] : 'FashionSponge' , 
							'opercentage'         => number_format($meminfo1[0]['tpercentage']), //$this->get_overall_percentage_of_user ( $mno  , null ),
							'otrating'            => number_format($meminfo1[0]['trating']), //$this->get_overall_total_rating_of_user ( $mno  , null ),  
							'tlooks'              =>  $this->posted_modals_postedlooks_Query(  array(  'postedlooks_query'=>'get-tlook', 'mno'=>$mno )  ), //number_format($meminfo1[0]['tlooks']),  //count( $this->retreive_specific_user_all_looks( $mno ) ), 
							'tarticle'            => count($this->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>10000,  'where'=>"mno =  $mno" )) ),   //$tarticle[0]['artno'], 
							'tpercentage_article' => number_format($meminfo1[0]['tpercentage_look']),  
							'tpercentage_look'    => number_format($meminfo1[0]['tpercentage_look']),  
							'gender'              => ( $meminfo1[0]['gender'] == 'Male' ) ? 'HE'  : 'SHE', 
							'gendertype'          => ( $meminfo1[0]['gender'] == 'Male' ) ? 'His' : 'Her',  
							'tfollowers'          =>  number_format($meminfo1[0]['tfollower']),
							'tfollowing'          =>  number_format($meminfo1[0]['tfollowing']),
							'tlikes'              => '0', 
							'tdrips'              => '0',
							'trating'             => number_format($meminfo1[0]['trating']),
							'tpercentage_article' =>$meminfo1[0]['tpercentage_article'],
							'tpercentage_look'	  =>$meminfo1[0]['tpercentage_look'],
							'tpercentage_media'	  =>$meminfo1[0]['tpercentage_media'],
							'trating_article'	  =>$meminfo1[0]['trating_article'],
							'trating_look'		  =>$meminfo1[0]['trating_look'],
							'trating_media'		  =>$meminfo1[0]['trating_media']   
						);   

					// print_r($meminfo);  
					// echo  $meminfo['memaccount'][0]['username'];
					return $meminfo;
				}  
				public function get_user_info_by_id ( $mno ) {  
					$mem=selectV1(
						'*',
						'fs_members',
						array('mno'=> intval($mno) )
					); 
					return $mem;  
				} 
				public function get_latest_user_info( $limit=1 ) {
					$userinfo=selectV1(
				     	"*",
					 	"fs_members",
					 	null, 
					 	"order by mno desc",
					 	"limit $limit"
					);  
					return $userinfo;  
				}
				public function get_full_name_by_id ( $mno ) { 
					$mem=selectV1(
						'firstname,nickname,lastname',
						'fs_members',
						 array('mno'=>$mno)
					);
					$mem = ( !empty($mem) ) ? $mem : null ;
					return ucfirst( $mem[0]['firstname'] ).' '.ucfirst( $mem[0]['nickname'] ).' '.ucfirst( $mem[0]['lastname'] );
				}  
				public function get_tpercentage_by_id ( $mno ) { 
					$response=selectV1(
						'tpercentage',
						'fs_members',
						 array('mno'=>$mno)
					); 
					return $response[0]['tpercentage'];
				}   
				public function get_full_name_by_look_id ( $plno ) { 
					$mno=selectV1(
						'mno',
						'postedlooks',
						 array('plno'=>$plno)
					);
					// echo " mno= $mno ";
					return $this->get_full_name_by_id($mno[0]['mno']);
				}  
				public function get_user_account_by_id ( $mno ) {
					if ( is_int($mno)) {
						$mem=selectV1(
							'*', 
							'fs_member_accounts',
							array('mno'=>$mno),
							'', 
							' order by mno desc'
						); 
						return $mem;  
					}
					else 
					{  
						return "sorry , mno is not intiger $mno <br>";
					} 	
				}  
				public function get_my_user_view_info( $mpv_viewer , $mpv_viewed ) {
					$r=selectV1(
				     	"*",
					 	"fs_member_profile_view", 
					 	array( 'mpv_viewer'=>$mpv_viewer , 'operand1'=>'and' , 'mpv_viewed'=>$mpv_viewed  ) 
					);   
					return $r;
				}  
				public function get_overall_total_rating_of_user( $mno , $bytime ) {  
					$ovote = 0; 
			    	$ual =  $this->get_user_all_look ( $mno , $bytime );    
	    			for ($i=0; $i < count($ual) ; $i++) {   
	    				$vote   = $ual[$i]['pltvotes'];  	 
						$ovote += $vote;  
	    			} 
	    			if (  $ovote > 0 ) {  
		    			return   $ovote; 
	    			}
	    			else{
	    				return 0;
	    			}   
				}   
				public function get_modal_my_total_comment( $mno ,$table_id , $table_name  ) { 

					/*
					* ex:    
					* $this->get_modal_total_comment( 136 , 404 , 'postedlooks'  ); 
					* $this->get_modal_total_comment( 136 , 404 , 'fs_postedmedia'  ); 
					* $this->get_modal_total_comment( 136 , 404 , 'fs_postedarticles'  );   
					* return the specific user total comment of the modals
					*/



					switch ( $table_name ) {
					 	case 'postedlooks': 
					 		$rowname = 'plno';
					 		$tablename = 'posted_looks_comments';
						 		$mtc=selectV1(
							     	"*",
								 	"$tablename", 
								 	array( "$rowname"=>$table_id , 'operand1'=>'and' ,'mno'=>$mno ) 
								);      
								return count($mtc);
					 		break;  
					 	default:    
 
						 	 	$response = count ( select_v3( 
										'fs_comment', 
										'*', 
										"mno = $mno and table_id = $table_id and table_name = '$table_name'  " 
									)  
						 	 	);  
							  	$this->message( 'getting total comment ' , $response , " and total is $response _table_id = $table_id , _table = $table_name   " ); 
							  	return $response; 
 
					 		break;
					}  
					
					// echo " total comment = ".count( $mtc );   
				} 
				public function get_modal_total_comment( $_table_id , $table_name  ) { 

					/*
					* ex:    
					* $this->get_modal_total_comment( 136 , 404 , 'postedlooks'  ); 
					* $this->get_modal_total_comment( 136 , 404 , 'fs_postedmedia'  ); 
					* $this->get_modal_total_comment( 136 , 404 , 'fs_postedarticles'  );   
					* return the specific user total comment of the modals
					*/ 
					switch ( $table_name ) {
					 	case 'postedlooks': 
					 		$rowname = 'plno'; 
					 		$tablename = 'posted_looks_comments';
						 		$mtc=selectV1(
							     	"*",
								 	"$tablename", 
								 	array( "$rowname"=>$_table_id ) 
								);      
								return count($mtc);

					 		break;
					  
					 	default: 

					 			$response =  count( $this->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$table_name,
										    'table_id'=>$_table_id, 
										    'orderby'=>'cno asc',
										    'limit_start'=>0,
										    'limit_end'=> 1000, 
										    'comment_query'=>'get-comment-modal'   
									  	) 
								  	) 
							  	);   

					 			return $response;

					 		break;
					}  
					
					// echo " total comment = ".count( $mtc );   
				} 
				public function add_user_profile_view( $mpv_viewer , $mpv_viewed , $mpv_dateviewed ) {  
					// echo " add_user_profile_view( $mpv_viewer , $mpv_viewed , $mpv_dateviewed ) <br> ";  
				 	if ( $mpv_viewer != $mpv_viewed ) { 
						$alreadyviewed = $this->get_my_user_view_info( $mpv_viewer , $mpv_viewed ); 
						// print_r($alreadyviewed);  
		 				if ( $alreadyviewed ) {
		 					// echo " update date ";  
		 				 	$this->update_user_profile_view_date( $mpv_viewer , $mpv_viewed , $mpv_dateviewed ); 
		 				}
		 				else{   
		 					$this->add_new_user_profile_view ( $mpv_viewer , $mpv_viewed , $mpv_dateviewed );  
		 					$tview  = $this->count_user_profile_view( $mpv_viewed );  
		 					// echo " total view $tview  <br> "; 
		 					$this->update_user_profile_views( $mpv_viewed , $tview );   
		 					// echo " add new view ";
		 				} 			
		 			}
		 			else{
		 				// echo " viewing own profile is not allowed";
		 			} 
	 			}
	 			public function add_new_user_profile_view ( $mpv_viewer , $mpv_viewed , $mpv_dateviewed ) {

					insert_v1( 
			          	array(  
		                  	'mpv_viewer'       =>  $mpv_viewer,  
		                  	'mpv_viewed'       =>  $mpv_viewed,
		                  	'mpv_dateviewed'   =>  $mpv_dateviewed,
		                  	'table_name'       => 'fs_member_profile_view',
		                  	'row_id_name'      => 'mpvno' 
		              	) 
		       	 	);       
	 			}
	 			public function update_user_profile_views( $mpv_viewed , $tview  ) {  
					update_v1( 
		        		array(
			        		'table_name'=>'fs_members',
			        		'tview'=>$tview 
			        	),
		        		array(
		        			'mno'  => intval($mpv_viewed) 
	        			)  
	        		);   
				}
				public function update_user_profile_view_date( $mpv_viewer , $mpv_viewed , $mpv_dateviewed ) {  

					mysql_query(" UPDATE fs_member_profile_view SET mpv_dateviewed = '$mpv_dateviewed' WHERE mpv_viewer = $mpv_viewer AND mpv_viewed = $mpv_viewed "); 
				} 
				/*
				public function update_user_total_percentage( ){ 
					$this->get_overall_percentage_of_user ( $mno  , null );
				}
				public function update_user_total_ratings( ) { 
					$this->get_overall_total_rating_of_user ( $mno  , null );
				} 
				*/ 
				public function user ( $mno ) {

						$dates = $this->date_difference(); 
						$this->mem_acc = select('fs_member_accounts',5,array('mno',$mno));
						$this->mem_pinfo = select('fs_members',32,array('mno',$mno));
						$this->followme = select('friends',4,array('mno2',$mno));
						$this->Ifollow = select('friends',4,array('mno1',$mno));
						$this->tplook = select('postedlooks',7,array('mno',$mno));
						$this->oarating = select('postedlooks',7,array('mno',$mno));
					 	$date_attr = get_date_attr();
					 	$cyr_mnth = "$date_attr[yr]-$date_attr[mnth]";
					 	  
				 	
				 	 	if ($this->mem_pinfo[0][4]=='male') {
				 	  		$sub_gen='he';
				 	  	}
				 	  	if ($this->mem_pinfo[0][4]=='female') {
				 	  		$sub_gen='she';
				 	  	}
				 	  	else{
				 	  		$sub_gen='confused';	
				 	  	}

						$this->mem_info = array(
									 'mano' => $this->mem_acc[0][0], 
									  'mno' => $this->mem_acc[0][1], 
									'email' => $this->mem_acc[0][2], 
							     'username' => $this->mem_acc[0][3], 
									 'pass' => $this->mem_acc[0][4],
							    'firstname' => $this->mem_pinfo[0][3],
							   'middlename' => $this->mem_pinfo[0][2],
								 'lastname' => $this->mem_pinfo[0][1],
								   'gender' => $this->mem_pinfo[0][4],
								  'sub_gen' => $sub_gen,
								  'website' => $this->mem_pinfo[0][5],
								    'bdate' => $this->mem_pinfo[0][6],
							   'occupation' => $this->mem_pinfo[0][7],
						  'preffered_style' => $this->mem_pinfo[0][8],
								  'country' => $this->mem_pinfo[0][9],
								   'state_' => $this->mem_pinfo[0][10],
									 'city' => $this->mem_pinfo[0][11],
									  'zip' => $this->mem_pinfo[0][12],
								  'blogdom' => $this->mem_pinfo[0][13],
								    'about' => $this->mem_pinfo[0][14],
								 'ispicset' => $this->mem_pinfo[0][15],
									 'fbid' => $this->mem_pinfo[0][16],
								   'tplook' => $this->cout_array($this->tplook), 
								'tfollowers'=> $this->cout_array($this->followme),
								'tfollowed' => $this->cout_array($this->Ifollow),
								   'tlogin' => 'unavailable',
								 'oarating' => $this->coarates($this->oarating),
								'tcomments' => 'unavailable',
									'tlike' => 'unavailable',
									'tlove' => '1',
									'tdrip' => '1',
							  'tlookviewed' => 'unavailable',
						 		'tcomments' => 'unavailable',
						    'oarating_week' => 'unavailable',
						   'oarating_month' => 'unavailable',
						   'oalratng_all_times' => 'unavailable',
						    'rated_look_cmonth' => get_rated_look($mno,$date_attr['mnth'],$date_attr['yr']),
					    'not_rated_look_cmonth' => get_not_rated_look($mno,$date_attr['mnth'],$date_attr['yr']),
							   'have_rated_look'=> get_rated_look($mno),
					          'all_look_cmonth' => all_look_upl_current_month(date($cyr_mnth)),
				 		'top_rated_look_cmonth' => top_rated_look($cyr_mnth),
						      'newest_look' => newest_look($cyr_mnth), 
						      'oldest_look' => oldest_look($cyr_mnth), 
					           'datemember' => $this->mem_pinfo[0][31]
						);
						return $this->mem_info;
				} 
				public function top_member (  ) {

				    $dates = $this->date_difference();
	 			 	if (empty($_SESSION['show'])) {
	 			 		$_SESSION['show']='today';
	 			 	}
				    if($_SESSION['show']=='today'){ 
				  		$luptoday = select1_wop(
				  			'postedlooks',
				  			7,
				  			array('date_',$dates['today']),
				  			'>'
				  		);
				  	    $tmtoday = $this->calc_topmember($luptoday,'today');
				  	    $this->top_members = $tmtoday;
				    }
				    if($_SESSION['show']=='week'){ 
				  	 	$lupweek = select1_wop('postedlooks',7,array('date_',$dates['last_week']),'>');
				  		$tmweek = $this->calc_topmember($lupweek,'last_week');
				  		$this->top_members = $tmweek;
				    }
				    if($_SESSION['show']=='month'){ 
				  		$lupmonth = select1_wop('postedlooks',7,array('date_',$dates['last_month']),'>');
				  		$tmmonth = $this->calc_topmember($lupmonth,'last_month');
				  		$this->top_members = $tmmonth;
				    }
				    if($_SESSION['show']=='year'){ 	
				    	$lupyear = select1_wop('postedlooks',7,array('date_',$dates['last_year']),'>');
				  		$tmyear = $this->calc_topmember($lupyear,'last_year');
				  		$this->top_members = $tmyear;
				    }
				    if ($_SESSION['show']=='all') {
				    	$lupall = select('postedlooks',7);
				    	$tmall = $this->calc_topmember($lupall,'all');
				    	$this->top_members = $tmall;
				    }
			   		return $this->top_members;
				}  
				public function count_user_profile_view( $mpv_viewed ) {  
					$r=selectV1(
				     	"*",
					 	"fs_member_profile_view", 
					 	array( 'mpv_viewed'=>$mpv_viewed  ) 
					);   
					return count($r); 
				} 
				public function print_user_modals_follow_or_unfollow_buttons( $mno , $mno1 , $style=null, $follow_img='fs_folders/images/profile/follow.png', $unfollow_img='fs_folders/images/profile/following.png', $page='feed', $counterId='') { 




					if ( empty($style)) {
						 $style = 'width:40px !important';
					}

					if ( $mno != $mno1 ) {   
						$followed  = $this->check_if_already_followed( $mno , $mno1  );    
						if ( empty($followed)) {
 
							echo "   
							    <img status='follow'  style='$style'  title='follow' id='suggested-member-follow-image1$mno1'  class='suggested-member-follow'  src='$follow_img'  onclick='follow_unfollow_fs_member ( \"#suggested-member-follow-image1$mno1\" , \"$mno1\", \"$page\", \"$counterId\")' />  
							";
								// <  
								?>  
									<!-- init -->


									<!-- <center>
										<img 
										 	title='follow' 
						 					id='suggested-member-follow-image1<?php echo $mno1 ?>' 
						 					class='suggested-member-follow-<?php echo $mno1 ?>'  
						 					style="margin-left:3px;display:block" 
							 				src="<?php echo  $follow_img; ?>" 
							 				onclick="follow_unfollow_fs_member ( '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo $mno1 ?>')"
							 				onmousemove="mousein_change_button ( '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo  $unfollow_img; ?>' )" 
							 				onmouseout="mouseout_change_button ( '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo  $follow_img; ?>' ) " 
						 				/>     
					 				</center> -->



								<?php  
						}else{
							
							echo " 
								 <img status='following' style='$style' title='un-follow' id='suggested-member-unfollow-image1$mno1'  class='suggested-member-unfollow'  src='$unfollow_img' onclick='follow_unfollow_fs_member ( \"#suggested-member-unfollow-image1$mno1\" , \"$mno1\", \"$page\", \"$counterId\")' /> 
							"; 
 							?>
							<!-- 	<img 
								 	title='follow' 
				 					id='suggested-member-unfollow-image1<?php echo $mno1 ?>' 
				 					class='suggested-member-unfollow'  
				 					style="margin-left:3px;" 
					 				src="<?php echo  $unfollow_img; ?>" 
					 				onclick="follow_unfollow_fs_member (  '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo $mno1 ?>' )"
					 				onmousemove="mousein_change_button ( '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo  $follow_img; ?>' )" 
					 				onmouseout="mouseout_change_button (  '#suggested-member-follow-image1<?php echo $mno1 ?>'  , '<?php echo  $unfollow_img; ?>' ) "
				 				/>    -->
							<?php 
						}  
					}    
				} 
				public function whobyid($mno){
					$minfo=select('fs_members',5,array('mno',$mno));
					$fullname=$minfo[0][1]." ".$minfo[0][3];
					if (!empty($minfo[0][1])) {
						return $fullname;
					}else{ 
						return 0;
					}
				}	 
			#END USER 

			# NEW URL 
				public function url( $array ) {
					$url['type']  = ( !empty($array['type']) ) ? $array['type'] : null ;  
					$url['url']   = ( !empty($array['url']) )  ? $array['url'] : null ; 


					 switch ( $url['type'] ) {
					 	case 'get-full-url': 
					 			return $_SERVER['REQUEST_URI']; 	
					 		break; 
					 	case 'get-dash-value':  
					 			echo " url $url[url] ";
					 			return explode( '-' , $url['url'] ); 
					 		break;
					 	default: 
					 		break;
					 }
				} 
			# END URL 
		// V


				#NEW VIEW 

					public function view( $array ) {   

				    	$table_name = $array['table_name'];   // table name 
				    	$table_id   = $array['table_id'];     // table id 
				    	$mno        = $array['mno'];          // the current active user mno   
				    	$type       = $array['type'];         //  action 
				    	$response   = ''; 			          // response  
				    	// $this->print_r1($array); 

				    	switch ( $type ):

				    		case 'add-view-original':

				    		/*
								if this part is anable then the view ( 1 ) popup for the modals must 
								be enable that is in the new modals and also the details and lookdetails page.
				    		*/

				    			 	$response = $this->fs_view( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $table_id and table_name = '$table_name' and mno = $mno "  )  );   
								    if ( empty($response) ) {
								    	// insert new view 
								      		$response = $this->fs_view( array(  'type'=> 'insert', 'mno'=>$mno, 'table_name'=> "$table_name", 'table_id'=>$table_id ) );   
								      	// get total view
								      		$response = $this->fs_view( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>10000,  'where'=>"table_id  = $table_id and table_name = '$table_name' "  ) );    
											$tview = count ( $response );   
											// echo " total view $tview <br>";

								      	// update table tview  
											if ( $table_name == 'fs_member_profile_pic' ) {   
												$table_id = $this->member_profile_pic_query( array( 'mppno'=>$table_id  , 'type'=>'get-specific-mno-by-mppno' ) );  
												$table_name = 'fs_members';
											} 
											$this->update_fs_table_auto( $table_id , array('tview'=>$tview) , $table_name );  

											echo " $table_id , array('tview'=>$tview) , $table_name "; 
								    } 
				    			break; 
				    		case 'add-view':
 
				    					// set row_id name and id value of membe

					    					switch ( $table_name ) {
					    						case 'fs_postedarticles':
					    							 	$rowname_id = 'artno'; 
					    							break;
					    						case 'postedlooks':
					    							 	$rowname_id = 'plno'; 
					    							break;
					    						case 'fs_member_profile_pic':
					    							 	$rowname_id = 'mno'; 
														$table_id = $this->member_profile_pic_query( array( 'mppno'=>$table_id  , 'type'=>'get-specific-mno-by-mppno' ) );  
														$table_name = 'fs_members'; 
					    							break; 
					    						default:
					    							# code...
					    							break;
					    					}


							    		// select tview  

									    	$response = select_v3( 
											 	"$table_name" , 
											 	'*' , 
											 	"$rowname_id = $table_id " 
											);    


								    	// add views 

											$tview = intval($response[0]['tview']);  
											$tview++;

											// update views 

											$this->update_fs_table_auto( $table_id , array('tview'=>$tview) , $table_name );   
											echo " $table_id , array('tview'=>$tview) , $table_name ";  

				    			break;
				    		default: 
				    			break;
				    	endswitch;  
				    }	 
				#END VIEW 
				#NEW VIDEO 
					public function parseVideoEntry($entry) { 
					    $obj= new stdClass;

					    // get author name and feed URL
					    $obj->author = $entry->author->name;
					    $obj->authorURL = $entry->author->uri;

					    // get nodes in media: namespace for media information
					    $media = $entry->children('http://search.yahoo.com/mrss/');
					    $obj->title = $media->group->title;
					    $obj->description = $media->group->description;

					    // get video player URL
					    $attrs = $media->group->player->attributes();
					    $obj->watchURL = $attrs['url']; 

					    // get video thumbnail
					    $attrs = $media->group->thumbnail[0]->attributes();
					    $obj->thumbnailURL = $attrs['url']; 

					    // get <yt:duration> node for video length
					    $yt = $media->children('http://gdata.youtube.com/schemas/2007');
					    $attrs = $yt->duration->attributes();
					    $obj->length = $attrs['seconds']; 

					    // get <yt:stats> node for viewer statistics
					    $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
					    $attrs = $yt->statistics->attributes();
					    $obj->viewCount = $attrs['viewCount']; 

					    // get <gd:rating> node for video ratings
					    $gd = $entry->children('http://schemas.google.com/g/2005'); 
					    if ($gd->rating) { 
					      $attrs = $gd->rating->attributes();
					      $obj->rating = $attrs['average']; 
					    } else {
					      $obj->rating = 0;         
					    }

					    // get <gd:comments> node for video comments
					    $gd = $entry->children('http://schemas.google.com/g/2005');
					    if ($gd->comments->feedLink) { 
					      $attrs = $gd->comments->feedLink->attributes();
					      $obj->commentsURL = $attrs['href']; 
					      $obj->commentsCount = $attrs['countHint']; 
					    }

					    // get feed URL for video responses
					    $entry->registerXPathNamespace('feed', 'http://www.w3.org/2005/Atom');
					    $nodeset = $entry->xpath("feed:link[@rel='http://gdata.youtube.com/
					    schemas/2007#video.responses']"); 
					    if (count($nodeset) > 0) {
					      $obj->responsesURL = $nodeset[0]['href'];      
					    }

					    // get feed URL for related videos
					    $entry->registerXPathNamespace('feed', 'http://www.w3.org/2005/Atom');
					    $nodeset = $entry->xpath("feed:link[@rel='http://gdata.youtube.com/
					    schemas/2007#video.related']"); 
					    if (count($nodeset) > 0) {
					      $obj->relatedURL = $nodeset[0]['href'];      
					    }

					    // return object to caller  
					    return $obj;      
					} 
					public function get_youtube_title( $video_id ) {
						// $ch = curl_init();
						// curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/'.$video_id);
						// curl_setopt($ch, CURLOPT_HEADER, 0);
						// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

						// $response = curl_exec($ch);
						// curl_close($ch);

						// if ($response) {
						//     $xml   = new SimpleXMLElement($response);
						//     $title = (string) $xml->title;
						//     return $title;
						// } else {
						//     // Error handling.
						// }

						return '';
					}

				#END VIDEO  
		// W

				#NEW SCRAPPING 

					public function web_scraping( $array ) {    

						$ri =new resizeImage();
						$pa =new postarticle();



						 



				        // $get = $array['get']; 
				        // $url = $array['url'];  
						// $this->print_r1( $array );   

						// init arrays
							$get      = array();  
							$response = array(); 
							$img      = array(); 
							$video    = array(); 
						// init size  
							$size['image']['width']   = 'auto';
							$size['image']['height']  = 'auto';
							$size['video']['height']  = 'auto';
							$size['video']['width']   = 'auto'; 
						// init attr 

					        $title       = ''; 
							$description = ''; 
							$keyword     = '';   
						// clean session
							unset($_SESSION['article_image']); 
							unset($_SESSION['article_title']);
							unset($_SESSION['article_description']);
							unset($_SESSION['article_keyword']); 
							unset($_SESSION['article_video']);
						// initialized get
							if ( !empty( $array['get'] ) ) {
								foreach ( $array['get'] as  $value ) {
									// $data[$value] = $value;   
									// echo " $value  <br> ";	  
									$get[$value] = $value; 
								} 
							}
							// print_r($response); 
 						// initialize size

							if ( !empty( $array['size'] ) ) {
								 
								foreach ( $array['size'] as $key => $value ) {
									// $data[$value] = $value;  
									$height =  ( !empty($value['height'])) ? $value['height'] : 'auto' ;  
									$width  =  ( !empty($value['width'])) ? $value['width'] : 'auto' ;   
									// echo " $key width $width , height $height <br> ";	 
									$size[$key]['height'] = $height; 
									$size[$key]['width']  = $width;   
								}
							}
						// initialize url  
 							$url = ( !empty($array['url'])) ? $array['url'] : '' ;  
							echo " url $url <br>";   
						// initialized limit 
							$limit = ( !empty($array['limit'])) ? $array['limit'] : 10 ;  
							echo " limit $limit <br>";   
						// initialized general data
							if ( !empty($get['image']) ):  
								// echo $get['image'].' height = '.$size['image']['height'].' width = '.$size['image']['width'].'<br>';
							endif;  
							if ( !empty($get['video']) ): 
								// echo $get['video'].' height = '.$size['video']['height'].' width = '.$size['video']['width'].'<br>';
								unset($_SESSION['article_video']); 
							endif;  
						// initialize curl   
					        $counter = 0;
					        $images  = array() ;
					        // echo " scraping <br>"; 
					        $ch = curl_init("$url");  
					        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
					        $cl = curl_exec( $ch );   
					        $dom = new DOMDocument( );
					        @$dom->loadHTML( $cl );   
					        $images = $dom->getElementsByTagName( 'img' );   
					        $videos = $dom->getElementsByTagName( 'iframe' );   
					        $paharagraph = $dom->getElementsByTagName( 'p' );   
					        $embededs = $dom->getElementsByTagName( 'embed' );   
					        

					    // modal image  
					        if ( !empty($get['image']) ):  
					        	// init
						        	$height = $size['image']['height'];
						        	$width  = $size['image']['width'];  
						        	$c=0; 
						        	$ph = ''; 
						        	$t[0]['title'] = ''; 
						        	$t[1]['title'] = ''; 
						        	$t[2]['title'] = ''; 
						        	$t[3]['title'] = '';  
					        	// retrieve keyword 

						        	#code to retrieve keyword here
					        	// retrieve title 
						        	
						        	$title = $pa->get_title_in_a_website( $url ); 

						        	if (empty($title)): 
							      	 	$title1 = $dom->getElementsByTagName( 'h1' ); 
								        $title2 = $dom->getElementsByTagName( 'h2' );
								        $title3 = $dom->getElementsByTagName( 'h3' );
								        $title4 = $dom->getElementsByTagName( 'h4' );    
							        	$c=0;
										// echo "<h1> title1 </h1>";
							        	foreach ($title1 as $text ) {
							        		if ( $c == 0 ) {
							        			$t[0]['title'] = $text->nodeValue.' <br> '; 
							        		}  
							        		break;
							        		$c++;
							        	}
							        	$c=0;
							        	// echo "<h1> title2 </h1>";
							        	foreach ($title2 as $text ) {
							        		if ( $c == 0 ) {
							        			$t[1]['title'] = $text->nodeValue.' <br> '; 
							        		}  
							        		break;
							        		$c++; 
							        	}
							        	// $c=0; print_r(expression)
							        	// echo "<h1> title3 </h1>";
							        	foreach ($title3 as $text ) {
							        		if ( $c == 0 ) {
							        			$t[2]['title'] = $text->nodeValue.' <br> '; 
							        		}  
							        		break;
							        		$c++; 
							        	}
							        	$c=0;
							        	// echo "<h1> title4 </h1>";
							        	foreach ($title4 as $text ) {
							        		if ( $c == 0 ) {
							        			$t[3]['title'] = $text->nodeValue.' <br> '; 
							        		}  
							        		break; 
							        		$c++; 
							        	}  
							        

							        	$x[0]= strlen( $t[0]['title'] ); 
							        	$x[1]= strlen( $t[1]['title'] ); 
							        	$x[2]= strlen( $t[2]['title'] ); 
							        	$x[3]= strlen( $t[3]['title'] ); 
							        	$s = $x[0]; 
							        	for ($i=1; $i < count($x) ; $i++) { 
							        	 	if ( $s < $x[$i] ) {
							        	 		$s = $x[$i]; 
							        	 		$title =  $t[$i]['title']; 
							        	 	}
							        	}     
						        	endif;   
								// retrieve description
						        	#code to retrieved description here in the main site meta
						        	$c=0;
						        	// echo "<h1> paharagraph </h1>"; 
						        	foreach ($paharagraph as $p ) {  
					        			$ph[$c]['description'] = $p->nodeValue.' <br> ';  
						        		$c++; 
						        	} 
						        	// print_r($ph); 
				        		// get greatest value desc  
						        	$s = (  !empty( $ph[0]['description'] ) ) ? strlen($ph[0]['description']) : 0 ;
						        	// $description = '';
						        	for ($i=1; $i < count($ph) ; $i++) {  
						        			$len = (  !empty( $ph[$i]['description'] )) ? strlen($ph[$i]['description']) : 0 ;
						        	 	if ( $s < $len ) {
						        	 		$s = $len; 
						        	 		$description =  $ph[$i]['description'] ; 
						        	 	}
						        	}   
						        // print description 
						        	// echo " description : $description <br> ";   
								    $_SESSION['article_title']       = $title; 
								    $_SESSION['article_description'] = $description; 
								    $_SESSION['article_keyword']     = $keyword;  
 								// assign image

								    $c=0;
							        foreach ( $images as $image ) { 
								        $imgSrc  = $image->getAttribute('src');    
								        // echo " $imgSrc <br> ";
								       	// echo " <img src='$imgSrc' style='width:$width; height:$height' /> ";      
										#get image  
										 
							        		foreach ($array['accept_image'] as $url) {                               # foreach for the allowed extention
			        							if ( strpos( $imgSrc , $url ) ) {                                    # check if the extention allowed is exist
			        							 	if (   $c < $limit ) {                                           # set limit how many modals show		 
										        		$imgSrc = $pa->add_img_url_if_dont_have( $imgSrc , $url );   # add url link is only direct to the folder
												     	if ( $pa->url_exists($imgSrc)  ) {    					     # check if the image exist
												        	// $ri->load( $imgSrc );    
												            // $img_width  = $ri->getWidth();  
															// if ( $img_width > $width  ) {    
									        					// $jpg = intval( strpos($imgSrc, '.jpg') );     
									        					// if ( $jpg > 0 ) {    #only allows if jpg
									        						$img[$c] = $imgSrc; 
											           				$c++; 
											           				// echo " pos $jpg $imgSrc <br>";
									        					// } 
									        					// else  { 
									        						// echo " not jpg pos $jpg";
									        					// } 
											           	 	// }   
												       	}   
												    } 
			        							}
			        						} 
							        } 	 


							        $_SESSION['article_image'] = $img;

							        echo " after foreach "; 
						        // print_r($_SESSION['article_image']); 
							endif;  
						// modal video
							if ( !empty($get['video']) ):  
					 			$height = $size['video']['height'];
					        	$width  = $size['video']['width'];   




					        	/*
					        		vimeo 
										url 

											http://vube.com/trending/Aj+Silva+Music/0dPsIWYjoj?t=s
											http://vube.com/trending/Andrea+Kaden/W8nM24DqUw?t=s
											http://vube.com/trending/Andrea+Kaden/oFzAdU9Dqe    								 
 

									youtube 
										embeded: 
											//www.youtube.com/embed/1oju14nG5vo
										url: 
											https://www.youtube.com/watch?v=1oju14nG5vo
											https://www.youtube.com/watch?v=zC617kE1maU
											https://www.youtube.com/watch?v=sR8rlTIU8_Y 

										video_id = 	1oju14nG5vo	 
	 								vimeo 
		
		 								https://vimeo.com/channels/staffpicks/102550866
		 								https://vimeo.com/channels/staffpicks/102399221
		 								https://vimeo.com/22506211
								*/












					        	$c = 0;
					        	// iframe 
						        	foreach ( $embededs as $video ) { 
								        $vidSrc  = $video->getAttribute('src');    
								        foreach ($array['accept_video'] as $url) { 
								        	if ( strpos( $vidSrc , $url ) ) {
							        		   	echo " video src = ".$vidSrc.'<br>'; 
										        $vid[$c]= $vidSrc; 
										        // $vid[$c]['id']  =  '123123'; 
										        $c++; 
								        	}
								        }  
								    } 	  
								// embeded
								    foreach ( $videos as $video ) { 
								        $vidSrc  = $video->getAttribute('src');    
								        foreach ($array['accept_video'] as $url) { 
								        	if ( strpos( $vidSrc , $url ) ) {
							        		   	echo " video src = ".$vidSrc.'<br>'; 
										        $vid[$c]= $vidSrc; 
										        // $vid[$c]['id']  =  '123123'; 
										        $c++; 
								        	}
								        }  
								    } 	  


							    

						 		$_SESSION['article_video'] = $vid;  
							endif;  
				    }
				#END SCRAPPING 



				public function get_video_id( $url ) { 
				     // echo " url $url <br>"; 
				      // echo "1) ".basename($url, ".d").PHP_EOL;
				      // exit();  
				    if ( strpos( $url , 'vube.com' ) > 1 ): 
				        // echo " vube .com here ";
				        $video_id = basename($url, ".d").PHP_EOL;
				    elseif( strpos( $url , 'youtube.com' ) > 1  ):
				        // echo " youtube .com here "; 



				        $video_id = basename($url, ".d").PHP_EOL;  



				        $video_id = str_replace('watch?v=','',$video_id );  

				        if ( strpos( $video_id , '?' ) > 1  ):
				        	$vid = explode( '?' , $video_id ); 
				        	$video_id = $vid[0];
				        endif;

				        // echo " before basename $video_id <br>";
						// $video_id = basename($video_id).PHP_EOL;
						// echo "after basename ".$video_id.'<br>'; 
						
						// echo " after exploaded = ".$video_id[0].'<br>'; 


					        		


				    elseif ( strpos( $url , 'vimeo.com' ) > 1  ): 
				        // echo " vimeo .com here ";
				        $video_id = basename($url, ".d").PHP_EOL;
				    endif; 
				      // echo " video id = $video_id <br>";  
				    return  str_replace(' ','',$video_id); 
			    } 
			    public function get_video_src ( $url , $video_id ) { 
			    	if ( strpos( $url , 'vube.com' ) > 1 ):  
			    		 $_SESSION['article_video'][0] = "http://vube.com/embed/video/$video_id?autoplay=false&fit=true";
				    elseif( strpos( $url , 'youtube.com' ) > 1  ): 
				    	 $_SESSION['article_video'][0] = "//www.youtube.com/embed/$video_id"; 
				    elseif ( strpos( $url , 'vimeo.com' ) > 1  ):  
				         $_SESSION['article_video'][0] = "//player.vimeo.com/video/$video_id" ;   
				    else:   
				    endif;   
			    } 
		// X
		// Y
		// Z   
	}     

/**
*  look class controller
*/
class modal extends myclassCode { 
 	function __construct(){  
 	}
 	public static function conver_cetegory_to_keyword($pltags){ 
 		// print_r($pltags); 
		$keyword='';
		for ($i=0; $i < count($pltags) ; $i++) {  
			$keyword.=(!empty($pltags[$i]['plt_garment']))?$pltags[$i]['plt_garment'].',':null ;
			$keyword.=(!empty($pltags[$i]['plt_material']))?$pltags[$i]['plt_material'].',':null ;
			$keyword.=(!empty($pltags[$i]['plt_pattern']))?$pltags[$i]['plt_pattern'].',':null ;
			$keyword.=(!empty($pltags[$i]['plt_brand']))?$pltags[$i]['plt_brand'].',':null;
			$keyword.=(!empty($pltags[$i]['plt_color']))?$pltags[$i]['plt_color']:null; 
			if ( count($pltags)-1 != $i ) {
				$keyword.=',';				 
			} 
		} 
		return $keyword;
 	} 
}   
/**
* 
*/
class helper extends myclassCode{ 
 	function __construct(){ 
 	} 
 	public static function get_table_id($get,$session){  
		echo " session ".$session.'<br>';
		echo " get ".$get.'<br>';
		if (intval($get)!=null) {  
			echo "get id null";  
		}else if( intval($session) != null ){    
			$get = $session;
			echo "session id null";  
		}    
		else{ 
			echo " else ";
		}  
		echo " id ".$get; 
		return $get; //return id
 	}
 	public static function load_page_profile_detail_lookdetails($url){ 
		echo "total string ".count($url); 
		foreach ($url as $key => $line) {
			$c++;   
			if ( $c < 4 ) {
				echo " $c $line - ";
				$date.=$line; 
			}else{
				echo " $c $line ";
				$title.=$line;
			}   
			if (  $c < count($url)   ) {
				$title.=' ' ;
			}
		}  
		echo " this is the title $title <br> ";
		echo " this is the date $date <br>"; 
		#check if the link is details page or lookdetails page or profile  
		$len_username = strlen($member['username']);
		$len_tab1     = strlen($member['tab1']);
		$len_tab2     = strlen($member['tab2']); 
		$date = $member['username'].'-'.$member['tab1'].'-'.$member['tab2']; 
		$page = 'lookdetails';
		echo "$len_username $len_tab1 $len_tab2"; 
		if ($len_username == 4 and $len_tab1 == 2 and $len_tab2 == 2){  // the url checked if it is the modal and modal format is 4 2 2
			if ( $page == 'lookdetails' ) { 
				//lookdetails page 
				echo " lookdetails ";   
				$_SESSION['connect']=true;
				$_SESSION['table_id']=667;
				require('lookdetails.php');
			}
			else{ 
				//details page
				echo " details ";   
				require('details.php?id=123&connect=true');
			} 
			exit();
		}
		else{
			echo "profile ";
		}  
 	}
 	public static function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens. 
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
} 
/**
* 
*/
class page extends myclassCode{  
	public function __construct(){ 
	}
	public static function set_url_for_modal_details($table_id,$type,$category,$date,$title){   
		$date=substr($date,0,10);    
		$title=str_replace(' ','-',$title);//remove single space 
		$$title=preg_replace('/\s+/', ' ',$title);// remove double space
		$table_id=helper::clean($table_id);
		$type=helper::clean($type);
		$date=helper::clean($date);
		$title=helper::clean($title);

		$category=str_replace(' ','-',$category);//remove single space 
		$category=preg_replace('/\s+/', ' ',$category);// remove double space  
		$category=helper::clean($category); 
		// echo " $table_id-$type-$date-$title"; 
		return "$table_id-$type-$category-$date-$title";
	} 
}  
/**
*  scrapping with website content
*  Dec 16,2014
*/ 
class scrape{   

	public  $log='asdasd';
	public  $scrape_src='';
	public  $TimeZone="";
	public  $ServerTime="";

	public function __construct() {  

		$_SESSION['scrape_src']='';
		$this->log='this is from struct';
	}
	public function get_usernames_users($array=array(),$mc){    
		$pa = new postarticle();  
		// page_end total = 38751
		// page_start = 1 
		$color = array('red','green','blue','yellow'); 
		$query['page_start']=(!empty($array['page_start']))?intval($array['page_start']):'';
		$query['page_end']=(!empty($array['page_end'])) ? intval($array['page_end']):''; 
		$query['url1']=$query['url']='http://lookbook.nu/search/users?page=';
		$c=0;   
		// for ($i=$query['page_start']; $i <=$query['page_start']+1; $i++) {   
		for ($i=$query['page_start']; $i <=$query['page_end'] ; $i++) {
			$_SESSION['scrape_src']=$query['url']=$query['url1'].$i;//concat url and page  and pass to session that is used to saved the main url to fs database and query[url]
			echo "<h3> url = ".$query['url'].'</h3><br>';
			$ch = curl_init("$query[url]");  
            curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
            $cl = curl_exec( $ch );   
            @$dom = new DOMDocument(); 
            @$res=$dom->loadHTML($cl); 
            $xpath = new DomXPath($dom);   
       		// query the username all of the usernames using xpath
           	$anchors = $xpath->query("//*[@data-label='search - users']/a");  
         	$description = $xpath->query("//*[@class='grey less_linespaced least_topspaced force_wrap']");   
         	//convert Eldom to array
         	$c=0; 
			foreach ($description as $d) {
				$desc[$c]=$d->nodeValue; 
			 	$c++;
		 	}   
   			$c=0; 
			foreach($anchors as $a) {   
				$d=$desc[$c];//pass the value of desc in array form
			    $username1=$a->getAttribute("href"); 
			    $username1=str_replace('/fan','',$username1); 
			    echo "<span id='query-response' >$c.) $username1 <br></span> "; 
 			    $username[$c]['username']=$username1; 
 				$url="http://lookbook.nu$username1"; 
 				echo "src page: <b>$query[url]</b><br>";
 				echo "profile url: <b>$url</b> ";  
 				$name = $pa->get_title_in_a_website($url);//get name of the user via title 
          		$name = str_replace('| LOOKBOOK','',$name);// get user name
 				if ( !select_v3( 'fs_invited' , '*' , "invited_fn='$name'"  ) )   { 
 					$this->email_mining($url,$mc,$d); 
 				}
 				else{
 					echo "<span style='color:red' >name exist</span><br>";
 				}  
			    $color1=$color[rand(0,count($color))];echo "<hr style='border-top:1px solid $color1' />  ";//set hr color
			    $c++;
			}    
		} 
	}  
	public function get_usernames_followings($url){  
		//initialized curl and add url with page 
		echo "<span id='query-response' > old url $url <br></span> "; 
		$ch = curl_init("$url");  
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
        $cl = curl_exec( $ch );   
        @$dom = new DOMDocument(); 
        @$res=$dom->loadHTML($cl); 
        $xpath = new DomXPath($dom);  
        //get total people following 
			echo "<span id='query-response' ><br>  total following : </span> "; $divs = $xpath->query("//*[@id='fanned_subtab']/a"); 
   			foreach($divs as $div) {   
   			 	$tfollowing =  str_replace("People", '', $div->nodeValue);  
   			 	$tfollowing =  str_replace("(", '', $tfollowing);  
   			 	$tfollowing =  str_replace(")", '', $tfollowing);  
   			 	$tfollowing =  str_replace(",", '', $tfollowing);  
			}    
           	$c=0;
           	echo "<span id='query-response' > =  $tfollowing <br></span> ";
           	echo "<span id='query-response' ><br> usernames: <br></span> "; 
           	$ttab = intval($tfollowing/47); 
           	echo "<span id='query-response' > ttab = $ttab <br></span> ";  
           	if ($ttab==0 and $tfollowing > 0) {
           		$ttab=1;
           	}
        // add the username list in the array form 
       	$c=0;
       	for ($i=0; $i <$ttab ; $i++):   
       		//set the url of the second page of the users lookbook.nu/username/following?page=2 or lookbook.nu/username/following?page=$i
       		if ($i>0):
       			$url1 = $url."/following?page=".$i;
   		 	 	$ch = curl_init("$url1");  
	            curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
	            $cl = curl_exec( $ch );   
	            @$dom = new DOMDocument(); 
	            @$res=$dom->loadHTML($cl); 
	            $xpath = new DomXPath($dom);     
       		endif;
       		// query the username all of the usernames using xpath
           	$anchors = $xpath->query("//*[@data-label='user profile - fanned.users']/a");
			foreach($anchors as $a) {  
			    // print $a->nodeValue." - ".$a->getAttribute("href")."<br/>"; 
			    //following usernames
			    $username1=$a->getAttribute("href"); 
			    $username1=str_replace('/fan','',$username1); 
			    echo "<span id='query-response' >$c.) $username1 <br></span> "; 
 			    $username[$c]['username']=$username1;
 				$c++; 
 				// echo "$username1 <br>";
			}    
		endfor;   
		return $username; 
	}
	public function get_blog_tlook_location( $url , $mc ) { 


        // initiazed

          $ch = curl_init("$url");  
          curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
          $cl = curl_exec( $ch );   
          @$dom = new DOMDocument( ); 
          @$res=$dom->loadHTML($cl); 
          $xpath = new DomXPath($dom);  
          // get total look  


          $class1 = 'profile_stats';
          $class2 = 'right force_wrap';
          $class3 = 'subheader linespaced uppercase force_wrap';

          $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class1 ')]");   

        // total look

          // $divs = get_value_by_class_phpcurl( $_POST['url1'] , $mc , 'profile_stats' );  
          foreach($divs as $div) {   $response = explode(" ", $div->nodeValue );    }     
          $tlook = str_replace('Looks', '' , $response[36] ).'|';  
         
        // get lb domain , website and blog link
   
            $blogname = array('lb','blog','site');
            $domain   = '';
            $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class2 ')]");  
            // $divs = get_value_by_class_phpcurl( $_POST['url1'] , $mc , 'right force_wrap' );     
            $c=0;
            foreach($divs as $div) {    
              	echo "<span id='query-response' >".$blogname[$c].".) ".$div->nodeValue." <br></span> ";   
              	if ( $blogname[$c] == 'blog' || $blogname[$c] == 'site' ) { 
              	} 
              	if ( strpos($div->nodeValue,'ookbook')<5){//perevent lookbook url 
					if ( strpos($div->nodeValue,'ttp')>0){//prevent username 
				 		$domain.="$div->nodeValue , ";
					}
				}  
              $c++;
            }        
        // location 
          
            $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class3 ')]");  
            // $divs = get_value_by_class_phpcurl( $_POST['url1'] , $mc , 'subheader linespaced uppercase force_wrap' );     
            $c=0;
            foreach($divs as $div) {   
              // echo "location = ".$div->nodeValue." <br>";  
              $c++;
              if ( $p=strpos($div->nodeValue, 'from' ) ){  
                // echo "location ".substr($div->nodeValue,$p,strlen($div->nodeValue));
                $location =  substr($div->nodeValue,$p+4,strlen($div->nodeValue));
              } 
              else{
                $location = "$div->nodeValue";
              }
            }     

           $data['domain']   = $domain; 
           $data['tlook']    = $tlook; 
           $data['location'] = $location;  

        return $data;  
  	} 
    public function get_value_by_class_phpcurl( $url , $mc , $class ) {

      $ch = curl_init("$url");  
      curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
      $cl = curl_exec( $ch );   
      @$dom = new DOMDocument( ); 
      @$res=$dom->loadHTML($cl); 
      $xpath = new DomXPath($dom);  
      // get total look  
        $divs = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");   
        return $divs; 
    }   
    public function get_lookbook_user_profile_link( $url , $mc ) {

        echo " <span id='query-response' >this is to get the look book user profile link </span> ";
        $ch = curl_init("$url");  
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
        $cl = curl_exec( $ch );   
        $dom = new DOMDocument( );
        @$dom->loadHTML( $cl );   
        $links = $dom->getElementsByTagName( 'a' );      


        // get all the links of the users 

          $c=0; 
          foreach ( $links as $link  ) {   
            
            echo "<span id='query-response' > this is the 1st retrived <br> </span> ";
            $src = $link->getAttribute('href');    
            

            // fetch if the link has forward slash in the beggining

              if ( strpos( $src , '/' ) == 0 ) {   

                // get only the profile link  
               
                  $len = count ( explode('/', $src ) ); 

                // 2 means that is the profile link 

                  if ( $len == 2 )  {  
                      $c++; 
                    //  set up the link for searching the profile information 

                        echo "<span id='query-response' > <a href='http://lookbook.nu$src' >$src</a> <br></span> "; 
                        $url = "http://lookbook.nu$src"; 

                    // get the profile inforamtion

                      $this->email_mining( $url , $mc , $desc );  
                  }  
              }  

          }      
        echo " <span id='query-response' >total email found :  $c <br></span>  ";
    }   
    public function email_mining( $url , $mc , $desc=null ) { 
     	echo "  <span style='yellow'  id='query-response'> this is the url in email_mining($url) </span>  <br> ";
        $email = '';
        $ch = curl_init("$url");  
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
        $cl = curl_exec( $ch );   
        $dom = new DOMDocument( );
        @$dom->loadHTML( $cl );   
        $links = $dom->getElementsByTagName( 'a' );     
        $spans = $dom->getElementsByTagName( 'span' );
        $phs   = $dom->getElementsByTagName( 'p' );
        $divs  = $dom->getElementsByTagName( 'div' ); 
        // link  
          // only allow add info when email exist  
            $c=0; 
            foreach ( $links as $link  ) {   
              $imgSrc  = $link->getAttribute('href');    
              if ( strpos( $imgSrc  , '@' ) ) { 
                $c++;
                $modal['page']['email'][$c] = "<a href='$imgSrc' target='_blank'  > $imgSrc </a>"; 
                if ( strpos( $imgSrc  , 'ilto:' ) ) {    
                    $email = str_replace('mailto:', '' , $imgSrc );   
                    $this->add_new_email( $email , $mc  , $url , $desc );  
                  break;
                } 
              } 
              else if ( strpos( $imgSrc  , 'ttp' ) ) { 
                $c++;
                $modal['page']['link'][$c] = "<a href='$imgSrc' target='_blank'  > $imgSrc </a>"; 
              } 
              else{
                 $modal['page']['otherlink'][$c] = "$imgSrc"; 
              }
            }   
        // span  
          foreach ($spans as $text ) { 
            if ( strpos( $text->nodeValue  , '@' ) ) {
              $c++; 
              $modal['page']['email'][$c] = $mc->string(  array('type'=>'remove-space' , 'string'=>$text->nodeValue ) );
              if ( strpos( $text->nodeValue  , 'ilto:' ) ) {    
              	  echo "<h1> spans found EMAIL </h1>";
                  $email = str_replace('mailto:', '' , $imgSrc );   
                  $this->add_new_email( $email , $mc  , $url , $desc ); 
                break;
              } 
            }     
          } 
        // p  
          foreach ($phs as $text ) { 
            if ( strpos( $text->nodeValue  , '@' ) ) {
              $c++; 
              $modal['page']['email'][$c]  = $mc->string(  array('type'=>'remove-space' , 'string'=>$text->nodeValue ) );
              if ( strpos( $text->nodeValue  , 'ilto:' ) ) {   
              	  echo "<h1> phs found EMAIL </h1>";
                  $email = str_replace('mailto:', '' , $imgSrc );   
                  $this->add_new_email( $email , $mc  , $url , $desc ); 
                break;
              }
            }     
          } 
    	// div  
          foreach ($divs as $text ) { 
            if ( strpos( $text->nodeValue , '@' ) ) {
              $c++; 
              $modal['page']['email'][$c] = $mc->string(  array('type'=>'remove-space' , 'string'=>$text->nodeValue ) );
              if ( strpos( $text->nodeValue  , 'ilto:' ) ) {   
              	 	echo "<h1> divs found EMAIL </h1>";
                  	$email = str_replace('mailto:', '' , $imgSrc );   
                  	$this->add_new_email( $email , $mc  , $url , $desc ); 
                break;
              }
            }     
          }  
          if (empty($email)) {
          	$this->add_new_info_no_email($url,$mc,$desc);
            echo "  <span style='color:red' id='query-response'> no email found </span> ";
          }  
          return $modal['page']; 
  	}   
    public function add_new_email( $email , $mc , $url , $desc=null ) {  
    	$mc = new myclass(); 
        if ( !select_v3( 'fs_invited' , '*' , " invited_email = '$email' "  ) )   {   
          	$pa = new postarticle();  
          	$name        = $pa->get_title_in_a_website($url);//get name of the user via title 
          	$name        = str_replace('| LOOKBOOK','',$name);// get user name
          	$data        = $this->get_blog_tlook_location($url,$mc);// get the location blog website  
          	$domain   = mysql_escape_string($data['domain']);//domains of the user
          	$tlook    = intval($data['tlook']);//total look uploaded

          	// $location = mysql_escape_string($desc);//address of the user
          	
          	$location = ( $desc==null ) ? mysql_escape_string($data['location']) : mysql_escape_string($desc) ;

           	$scrape_src=mysql_escape_string($_SESSION['scrape_src']);//url of the page lookbook/user?page=1
           	echo "INSERT INTO fs_invited (invited_wob,tlook,description,invited_fn,invited_email,invited_date,scrape_src) values( '$domain' , $tlook , '$location' , '$name' , '$email' , '$mc->date_time','$scrape_src') ";
            $response = mysql_query("INSERT INTO fs_invited (invited_wob,tlook,description,invited_fn,invited_email,invited_date,scrape_src) values( '$domain' , $tlook , '$location' , '$name' , '$email' , '$mc->date_time','$scrape_src') ");//insert new data to database  
            $mc->message( "add new email  = $email " , $response , '' ); //show if insert data success of not
        } 
        else{
          echo " <span id='query-response' > email $email <span style='color:red'> exist </span>  </span> <br>";
        }  
  	}    
  	public function add_new_info_no_email($url,$mc,$desc=null){  
        $pa       = new postarticle();  
        $name     = $pa->get_title_in_a_website($url);//get name of the user via title
        $name     = str_replace('| LOOKBOOK','',$name);//get user name
        $data     = $this->get_blog_tlook_location($url,$mc);//get the location blog website  
        $invited_status=6;//set as pending but no email
    	$domain   = mysql_escape_string($data['domain']);//domains of the user
        $tlook    = intval($data['tlook']);//total look uploaded


        $location = ( $desc==null ) ? mysql_escape_string($data['location']) : mysql_escape_string($desc) ; //address of the user



        $scrape_src=mysql_escape_string($_SESSION['scrape_src']);//url of the page lookbook/user?page=1
        if ( !empty($domain) ) {   
        	echo "<span style='color:green' > domain found </span><b> $domain</b><br>";
	        if ( !select_v3( 'fs_invited' , '*' , "invited_fn='$name'"  ) )   {     
	        	echo "INSERT INTO fs_invited (invited_wob,tlook,description,invited_fn,invited_email,invited_date,invited_status,scrape_src) values( '$domain' , $tlook , '$location' , '$name' , '$email' , '$mc->date_time',$invited_status,'$scrape_src') ";
	            $response = mysql_query("INSERT INTO fs_invited (invited_wob,tlook,description,invited_fn,invited_email,invited_date,invited_status,scrape_src) values( '$domain' , $tlook , '$location' , '$name' , '$email' , '$mc->date_time',$invited_status,'$scrape_src') ");//insert information to fs database
	            $mc->message( " no email but  " , $response , ' adding information ' );//print message status of the data from lookbook scrapped successfully inserted or not
        	}else{
        		echo "user <span style='color:red' >  already </span> in the database <b> $name </b>";
        	} 
    	}else{
    		echo "<span style='color:red'>no domain and email found</span>";
    	}
  	}
    public function add_new_invited_info( $array=null , $mc ) {



        $fullname    =  ( !empty($array['fullname']) )    ? $array['fullname'] : null ;
        $email       =  ( !empty($array['email']) )       ? $array['email'] : null ;
        $wob         =  ( !empty($array['wob']) )         ? str_replace(',','|', $array['wob'] )  : null ;
        $occupation  =  ( !empty($array['occupation']) )  ? $array['occupation'] : null ;
        $style       =  ( !empty($array['style']) )       ? $array['style'] : null ;
        $description =  ( !empty($array['description']) ) ? $array['description'] : null ;
        $status      =  ( !empty($array['status']) )      ? $array['status'] : null ; 





        // echo " invited_email = '$email' ";

        $response = $mc->fs_invited(   
          array(  
            'type'=>'select',  
            'where'=>" invited_email = '$email' " 
          ) 
        );  
        $mc->message( " email check exist " , $response , "" );  
        if ( empty( $response )) {  
          $response = $mc->fs_invited( 
            array( 
              'type'=>'insert',
              'invited_fn'=>$fullname,
              'invited_email'=> $email, 
              'invited_wob'=>$wob,
              'invited_occu'=>$occupation,
              'invited_style'=>$style,
              'description'=>$description,
              'invited_status'=>$status,
              'invited_date'=>$mc->date_time 
            )
          );   
           parent::message( " add new invited info $mc->date_time " , $response , "" );  
        }  
  	}    
  	public function retrieve_multiple_username_and_Add($url,$mc){  
  		/*
  		* url format will be: lookbook/user/username/following
  		*/
  		$url_sub1 = '';
  		$url_sub2 = '';
  		$url_sub4 = '';  
  		$username1_sub='';
  		$username2_sub='';
  		$username3_sub='';
  		$username1=array();
  		$username2=array();
  		$username3=array(); 
  		$username1_len=0;
  		$username2_len=0;
  		$username3_len=0; 
  		$username1=$this->get_usernames_followings($url); 
  		// $username1_len=1;
  		$username1_len=count($username1);  
  		//set url src: 
  		$_SESSION['scrape_src']='http://lookbook.nu/search/users?page='.get_latest_src_page_number_from_fs();

  		//first loop of the username results 
  		for ($i=0;$i<$username1_len;$i++) {  
  			$_SESSION['loop_i']=$i;
  			$username1_sub=$username1[$i]['username'];//pass retrieved username
  			$url_sub1=$url="http://lookbook.nu$username1_sub/following?page=1"; 
  		 
  			$username2=$this->get_usernames_followings($url);  
  			// $username2_len=1;
  			$username2_len=count($username2);
  			echo "
				<h3>  
					[i] = <span style='color:red' >$i</span> len:$username1_len url:$url_sub1  <br> 
				</h3>
				<hr>
				"; 
				//second loop of the username
  			for ($j=0;$j<$username2_len;$j++) {  
  				$_SESSION['loop_j']=$j;
  				$username2_sub=$username2[$j]['username']; 
  				$url_sub2=$url="http://lookbook.nu$username2_sub/following";  
  				$username3=$this->get_usernames_followings($url);
  			    // $username3_len=1; 
  			    $username3_len=count($username3);
  				echo "
						<h3> 
  						[i] = <span style='color:red' >$i</span>   len:$username1_len url:$url_sub1 <br>
  						[j] = <span style='color:green' >$j</span> len:$username2_len url: $url_sub2 <br> 
						</h3>
						<hr>
					"; 
					//third look of the username
  				for ($k=0;$k<$username3_len;$k++) {   
  					$_SESSION['loop_k']=$k;
  					$username3_sub=$username3[$k]['username']; 
      				$url="http://lookbook.nu$username3_sub/following";  
  					echo "
  						<h3> 
      						[i] = <span style='color:red' >$i</span>   len:$username1_len  url: $username1_sub <br>
      						[j] = <span style='color:green' >$j</span> len:$username2_len  url: $username2_sub <br>
      						[k] = <span style='color:blue' >$k</span>  len:$username3_len  url: $username3_sub <br>  
  						</h3>
  						<hr>
  					"; 
      				$this->email_mining($url,$mc);//add user info including email
  				}    
  			} 
  		}  
  	}     
  	public function get_total_results_invitedstatus($scrapeVersion = 1){ 
      	//pending
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 0 && scrape_version = $scrapeVersion" ) );
      	$total['tPending']=$response[0]['invited_id'];
      	//approved
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 1 && scrape_version = $scrapeVersion" ) );
      	$total['tApproved']=$response[0]['invited_id'];
       	//sign-up
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 2 && scrape_version = $scrapeVersion" ) );
      	$total['tSignup']=$response[0]['invited_id'];
       	//officially
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 3 && scrape_version = $scrapeVersion" ) );
      	$total['tOfficiallyMember']=$response[0]['invited_id'];
       	//deleted
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 4 && scrape_version = $scrapeVersion" ) );
      	$total['tDeleted']=$response[0]['invited_id']; 
      	//need personal invite
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 5 && scrape_version = $scrapeVersion" ) );
      	$total['tNeedPersonalInvite']=$response[0]['invited_id'];  
      	//Pending but no email
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 6 && scrape_version = $scrapeVersion" ) );
      	$total['tPendingButNoEmail']=$response[0]['invited_id'];   
   		//sign up from pending
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 7 && scrape_version = $scrapeVersion" ) );
      	$total['tSignUpPending']=$response[0]['invited_id'];  
      	//sign up from unknown 
   	 	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 8 && scrape_version = $scrapeVersion" ) );
      	$total['tSignUpAnonymous']=$response[0]['invited_id']; 
      	//sign up from refferal
   	 	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 9 && scrape_version = $scrapeVersion" ) );
      	$total['tSignUpReferral']=$response[0]['invited_id']; 
      	//sign up from deleted
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 10 && scrape_version = $scrapeVersion" ) );
      	$total['tSignUpDeleted']=$response[0]['invited_id']; 
      	//sign up from personal invite
      	$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as invited_id', 'where'=>"invited_status = 11 && scrape_version = $scrapeVersion" ) );
      	$total['tSignUpPersonalInvite']=$response[0]['invited_id'];  
   		return $total; 
  	}  
  	public function get_latest_src_page_number_from_fs(){
		$response = select_v4(  
			array( 
				'type'=>'select',  
				'tablename'=>'fs_invited', 
				'rows'=>'*',  
				'where'=>"invited_id>0", 
				'order'=>'invited_id desc',  
				'limit'=>'0,1' 
			) 
		); 
		// $mc->print_r1($response); 
		// echo " page = ". str_replace('http://lookbook.nu/search/users?page=', '', $response[0]['scrape_src']) ;  
		$current_page=str_replace('http://lookbook.nu/search/users?page=', '', $response[0]['scrape_src']);//from the database current page retrived
		$this->scrape_src=$response[0]['scrape_src'];//pass the source url for the external access
		return intval($current_page);//return the number
  	}
  	public function file_write(){   
		$myFile = "log.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = "New Stuff 1 $this->log \n";
		fwrite($fh, $stringData);
		$stringData = "New Stuff 2\n";
		fwrite($fh, $stringData);
		fclose($fh);  
  	}
  	public function file_read()
  	{
  		$file = new SplFileObject("log.txt");
		while (!$file->eof()) 
		{
		    echo $file->current().'<BR>';
		    $file->next();
		} 
  	} 
  	public function send_email_fortimesup($mc)
  	{ 
      /*
      * send email to the user with the timesup time 
      *
      */ 
      $status_val = 1;  
      $invite_info = select_v3( 
        'fs_invited' , 
        '*' , 
        " invited_status = $status_val " 
      );    
      for ($i=0; $i < count($invite_info) ; $i++) 
      {  
        $date = $invite_info[$i]['DateTimeSend'];
        $invited_id = $invite_info[$i]['invited_id'];
        $timezone = $this->retrieve_time_from_timezone($invite_info[$i]['timezone']);    
        //echo " time zone"; 

        if ($date == '0000-00-00 00:00:00') 
        {

        	echo "date is empty update <br>";

        	if ( mysql_query("UPDATE fs_invited set DateTimeSend = '$timezone' WHERE invited_id = $invited_id ") )
        	{
        		echo " DateTimeSend successfully added date $timezone ";
        	} 
        	else
        	{
        		echo " failled to add date <br>";
        	} 

        }
        else
        { 

        	//echo "date is not empty check if send the invitation  <br>";

    	    $mc->invited_people_send_emails( 
	          	array( 
		          	'TimeZone'=>$timezone,
		            'invited_email'=>$invite_info[$i]['invited_email'], 
		            'status'=>$status_val 
	          	) 
	        );

        } 

        echo " id = $invited_id <br>"; 
      } 

    } 
    public function get_emails_from_the_page($url){  
        $email = array();
        $ch = curl_init("$url");  
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
        $cl = curl_exec( $ch );   
        $dom = new DOMDocument( );
        @$dom->loadHTML( $cl );   
        $links = $dom->getElementsByTagName( 'a' );     
        $spans = $dom->getElementsByTagName( 'span' );
        $phs   = $dom->getElementsByTagName( 'p' );
        $divs  = $dom->getElementsByTagName( 'div' ); 
        //link  
        //only allow add info when email exist  
     	$c=0; 
       	foreach ( $links as $link  ) {   
          	$imgSrc  = $link->getAttribute('href');    
          	if ( strpos( $imgSrc,'@')) {   
                $email[$c]['email']['a']=$imgSrc;  
                $c++;
            } 
    	}   
        //span  
        foreach ($spans as $text ) { 
            if ( strpos( $text->nodeValue  , '@' ) ) { 
             	if ( strpos( $imgSrc,'@')) {   
                   	$email[$c]['email']['span']=$imgSrc;  
                    $c++;
                } 
            }     
        } 
        //p  
        foreach ($phs as $text ) { 
            if ( strpos( $text->nodeValue  , '@' ) ) {
               	if ( strpos( $imgSrc,'@')) {   
                   	$email[$c]['email']['p']=$imgSrc;  
                    $c++;
                }
            }     
        } 
    	//div  
      	foreach ($divs as $text ) { 
            if ( strpos( $text->nodeValue , '@' ) ) {
             	if ( strpos( $imgSrc,'@')) {   
                   	$email[$c]['email']['div']=$imgSrc;  
                    $c++;
                }
            }     
      	}   
        return $email; 
    }
    public function get_url_of_the_scrapped_users($start,$end){ 
    	$url=array();
	    $invited = select_v3( 
	        'fs_invited' , 
	        '*' , 
	        "invited_status=6 limit $start,$end" 
	    );         
		for ($i=0;$i<count($invited)-1;$i++):    
			$c=0; 		  
			$invited_wob = explode(',', $invited[$i]['invited_wob']);   
			for ($j=0; $j < count($invited_wob)-1; $j++):  
				$url1 = $invited_wob[$j];   
				if ( strpos($url1,'ookbook')<5){//perevent lookbook url 
					if ( strpos($url1,'ttp')>0){//prevent username 
				 		// echo  " <a href='$url' target='_blank' title='$url' >domain$c</a>,"; 	  
				 		$url[$i][$c]['url']=$url1;
						$c++; 
					}
				}  
		 	endfor;   
		endfor;   
		return $url;
    }
    /*
    * retrive and get the email specifically in everyblogged that is saved without email under construction
    */
    public function display_array_result_of_checking_blog() { 
    	$mc = new myclass(); 
	 	$start=0;
	    $end=100; 
	    $url=$this->get_url_of_the_scrapped_users($start,$end);  
	    $mc->print_r1($url);
	    for ($i=0; $i<count($url);$i++){  
	      $url1=$url[$i];
	      for ($j=0;$j<count($url1);$j++) { 
	        $url2=$url1[$j]['url'];
	        echo " <br>url:$url2";
	        $response = $this->get_emails_from_the_page($url2);      
	        $mc->print_r1($response); 
	      }  
	      echo "<br>next----------------------------------------";
	    }  
    }
    public function get_site_last_update($url){
    	 
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		// Only header
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_HEADER, true);
		// Do not print anything to output
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		// get last modified date
		curl_setopt($curl, CURLOPT_FILETIME, true);

		$result = curl_exec($curl);
		// Get info
		$info = curl_getinfo($curl);

		echo "Last modified time : " . date ("d-m-Y H:i:s", $info['filetime']) ; 
	}  
	public function update_timezone($country,$tz){   
		$response = select_v3( 'fs_invited' , '*' , " description LIKE '%$country%' order by invited_id " ); 
		echo "total $ky scrapped".count($response).'<br>';
		// print_r($response);  

		for ($i=0; $i < count($response); $i++) {  
			$id=$response[$i]['invited_id'];
			echo " $id .) ";
			if(mysql_query("UPDATE fs_invited SET timezone='$tz' WHERE invited_id=$id ")){ 
				echo "<br><span style='color:green'>success</span> COUNTRY: $country ";
			}else{
				echo "<br><span style='color:red'>failled</span> COUNTRY: $country ";
			} 
		}    
	}  
	public function get_time_zone_time($url,$mc)
	{ 
		$this->TimeZone ="";
		$this->ServerTime="";
	 	//initialized curl and add url with page  
	  
		$ch = curl_init("$url");  
        curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true ); 
        $cl = curl_exec( $ch );   
        @$dom = new DOMDocument(); 
        @$res=$dom->loadHTML($cl); 
        $xpath = new DomXPath($dom);     
       	$hr   = $xpath->query("//*[@id='ct']");
       	// $sec  = $xpath->query("//*[@id='sec']");
       	$date1 = $xpath->query("//*[@id='ctdat']");  
		foreach($hr as $h) { $hour = $h->nodeValue; break; }      
		foreach($date1 as $d) { $date = $d->nodeValue; break; }    
		echo " hr: $hour date: $date ";  
		// return $username;  
		// 2014-10-26 21:56:49 
 
 	




		$DateTime=$this->set_format_to_date_time($date,$hour,$_SERVER['HTTP_HOST']);    
		Time::$dataTime12 = $DateTime; 
		Time::$Time12     = $hour; 
		Time::setFromTime12ToTime24($hour);  
		echo " this is the date and time $DateTime hour $hour <br> ";  
		echo " <br> server = ".$mc->date_time; 
		$this->TimeZone   = $DateTime; 
		$this->ServerTime = $mc->date_time;  
		$dateTime = ( $this->TimeZone[0] == ' ' ) ?  substr($this->TimeZone,1,strlen($this->TimeZone))  : $this->TimeZone ;   
		return preg_replace('/[^0-9^ -: ]/', '' , $dateTime );
	} 
	public function set_format_to_date_time($date_array,$hour){ 

		echo " set_format_to_date_time($date_array,$hour)<br>";

		if (!empty($hour)) 
		{ 
			 
			// echo "<pre>";
			// echo " set_format_to_date_time(,$hour) "; 
			// print_r($date_array); 
			// echo " date_array = " . $date_array;  

			// $date_array="Monday, December 22, 2014";
			// echo "<br> online date: $date_array <br>";
			$date_array=explode(',' , $date_array);
			$date=$date_array[1];   
			if ($_SERVER['HTTP_HOST'] == 'localhost') {  
				$day=substr($date,1,3);
				$month=substr($date,3, strlen($date)-7);
				$year=substr($date,strlen($date)-5,strlen($date)); 
				$month=str_replace(' ', '', $month); 
			}else{  
				$month=substr($date,0, strlen($date)-2);
				$day=substr($date,strlen($month),2);
				$year =$date_array[2];  
				$month=str_replace(' ', '', $month); 
			} 
			// echo " <br> year = $year / month = $month / day = $day <br> ";  
			// get month 
			$month_eng = array( 
				'01'=>'January',
				'02'=>'February',
				'03'=>'March',
				'04'=>'April',
				'05'=>'May',
				'06'=>'June',
				'07'=>'Jully',
				'08'=>'August',
				'09'=>'September',
				'10'=>'October',
				'11'=>'November',
				'12'=>'December' 
			);   
			$month_tag = array( 
				'01'=>'Enero',
				'02'=>'Pebrero',
				'03'=>'Hulyo',
				'04'=>'Agosto',
				'05'=>'Marso',
				'06'=>'Setyembre',
				'07'=>'Abril',
				'08'=>'Oktubre',
				'09'=>'Mayo',
				'10'=>'Nobyembre',
				'11'=>'Hunyo',
				'12'=>'Disyembre'
			);   
			$month_num = array_search($month, $month_eng); 
			// echo " kye = $month_num <br>";
			if ( empty($month_num)){
				$month_num = array_search($month, $month_tag);
			}
			// echo " kye = $month_num <br>"; 


			$date = "$year-$month_num-$day";  
			$date = preg_replace('/[^a-z^A-Z^0-9^-]/', '', $date);
			$dateTime = "$date $hour";




		}
		else
		{
			$dateTime = $this->date_time; 
		} 


		echo " date $date";
 		return $dateTime; 
 		
		// 2014-10-26 21:56:49
	}
	public function retrieve_time_from_timezone($timezone){
		$mc = new myclass(); 
	  	$timezone_array = array( 
	  		'EST'=>'http://www.timeanddate.com/worldclock/usa/new-york',
	  		'BRST'=>'http://www.timeanddate.com/worldclock/brazil/sao-paulo',
	 	   	'UTC'=>'http://www.timeanddate.com/worldclock/philippines/manila',
	  		'GMT'=>'http://www.timeanddate.com/worldclock/uk/london',  
	  		'CET'=>'http://www.timeanddate.com/worldclock/germany/berlin',
	  	);  
	  	$url=$timezone_array[$timezone]; 
	 	return $this->get_time_zone_time($url,$mc);    
	}
}
?> 
<style type="text/css">
	#query-response{ 
		display: block; 
	}
</style>




<?php  





function revoveDuplicateSingleArray($occasion) { 
	$occasion = str_replace(' ', '', $occasion);
	$occasion1  =  explode(',', $occasion);  
	$o  = array_unique(  $occasion1 ); 
    $occasion = implode($occasion, ','); 

	return $o;
}
