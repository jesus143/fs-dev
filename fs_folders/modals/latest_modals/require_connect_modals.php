 <?php
 
	class connections extends functions
	{
		public function modal_connect ()
		{
			
			 

			date_default_timezone_set('America/Los_Angeles');
	
			if ($_SERVER['HTTP_HOST'] == 'localhost') 
		 	{
		 		// mysql_connect("localhost","root","replacement") or die(mysql_error()); Nnetbook
		 		$con = mysql_connect("localhost","root","") or die(mysql_error()); //laptop
		 	 	$dbName = "fs_records";
		 		if ( $con  ) 
		 		{
		 		 	// echo " connected to localhost <br>";
		 		}
		 		else 
		 		{ 
		 			// echo " not connected to localhost <br>";
		 		} 
		 	}
		 	else
		 	{
				echo "online connect <br>";
		 		// mysql_connect("localhost","ricopeco_fsgjaro","d7)pIG=#%{oy") or die(mysql_error()); // fs
		 



		 	 
		 		// $dbName = "recopeco_fs_records_v1"; #ss
		 		$dbName = "ricopeco_fs_records_v1"; #fs
		  


		 
		 		$con  = mysql_connect("localhost","ricopeco_jesus7","Q?l-tpVNV)v+") or die(mysql_error()); // swag  
		 		
		 		if ( $con  ) 
		 		{
		 		 	echo " connected to online <br>";
		 		}
		 		else 
		 		{ 
		 			echo " not connected to online <br>";
		 		}
		 	}

			$dbConn = mysql_select_db($dbName) or die("dili ka-connect sa database"); //fs

			require("../../php_functions/function.php");
			require("../../php_functions/myclass.php");
			require("../../php_functions/library.php");
			require("../../php_functions/source.php");
			


			if ($_SERVER['HTTP_HOST'] == 'localhost') 
		 	{
		 		// mysql_connect("localhost","root","replacement") or die(mysql_error());	



		 		echo " local directory connect <br>";

		 		 
				 	$this->look_img_directory    = 'fs_folders/images/uploads/posted looks/home/';
				 	$this->lookExist             = '../../../fs_folders/images/uploads/posted looks/home/';




					$this->member_img_directory  = 'fs_folders/images/uploads/members/';
					// $this->memExist              = '../../../fs_folders/images/uploads/members/';

					$this->ppic_mem                 = 'fs_folders/images/uploads/members'; 
					$this->ppic_orginal  		    = 'fs_folders/images/uploads/members/mem_original';
					$this->ppic_profile  		    = 'fs_folders/images/uploads/members/mem_profile';
					$this->ppic_thumbnail		    = 'fs_folders/images/uploads/members/mem_thumnails';  

					// $this->memExist                 = '../../../fs_folders/images/uploads/members/';




					$this->article_img_directory = "fs_folders/images/uploads/posted articles/";
					$this->articleExist          = "fs_folders/images/uploads/posted articles/";

 					$this->media_img_directory = "fs_folders/images/uploads/posted media/";
					$this->mediaExist          = "fs_folders/images/uploads/posted media/";					


		 	}
		 	else
		 	{ 
		 		echo " online directory connect <br>";
		 		// fs new betatest
		 			/*
				 		$this->look_img_directory   = '../betatest/images/members/posted looks/home/';
				 		$this->lookExist            = '../../../../betatest/images/members/posted looks/home/';
						$this->member_img_directory = '../betatest/images/members/';
						$this->memExist             = '../../../../betatest/images/members/';
					
				// fs end betatest
				*/
				/*		
				// swag new alpha 
						$this->look_img_directory   = '../ss/images/members/posted looks/home/';
				 		$this->lookExist            = '../../../../ss/images/members/posted looks/home/';
						$this->member_img_directory = '../ss/images/members/';
						$this->memExist             = '../../../../ss/images/members/';

 						$this->article_img_directory = "fs_folders/images/uploads/posted articles/";
						$this->articleExist          = "fs_folders/images/uploads/posted articles/";

	 					$this->media_img_directory 	 = "fs_folders/images/uploads/posted media/";
						$this->mediaExist            = "fs_folders/images/uploads/posted media/";		
				// swag end alpha
				*/
				 	$this->look_img_directory    = 'fs_folders/images/uploads/posted looks/home/';
				 	$this->lookExist             = '../../../fs_folders/images/uploads/posted looks/home/';




					$this->member_img_directory  = 'fs_folders/images/uploads/members/';
					// $this->memExist              = '../../../fs_folders/images/uploads/members/';

					$this->ppic_mem                 = 'fs_folders/images/uploads/members'; 
					$this->ppic_orginal  		    = 'fs_folders/images/uploads/members/mem_original';
					$this->ppic_profile  		    = 'fs_folders/images/uploads/members/mem_profile';
					$this->ppic_thumbnail		    = 'fs_folders/images/uploads/members/mem_thumnails';  




					$this->member_img_directory  = 'fs_folders/images/uploads/members/';
					$this->memExist              = '../../../fs_folders/images/uploads/members/';

					$this->article_img_directory = "fs_folders/images/uploads/posted articles/";
					$this->articleExist          = "fs_folders/images/uploads/posted articles/";

 					$this->media_img_directory = "fs_folders/images/uploads/posted media/";
					$this->mediaExist          = "fs_folders/images/uploads/posted media/";		







		 		// mysql_connect("localhost","ricopeco_fsgjaro","d7)pIG=#%{oy") or die(mysql_error());
		 	}
		 	// mysql_select_db("ricopeco_fs_records") or die("dili ka-connect sa database");
		}
		public function online_connect ()
		{
			
			// echo " connected online ";
			// require ("../../../../betatest/connect.php");
			// require ("../../../../betatest/function.php");	
			// require ("../../../../betatest/library.php");
			// require ("../../../../betatest/source.php");
			// require ("../../../../betatest/myclass.php");
		}
		public function calculate_show($limit , $tres , $mc)
		{
			 
			// echo "lim = $limit trs = $tres <br>";

			if ( $tres == 1) 
			{
				$this->show_end = $tres + $limit;
				$this->show_start = $this->show_end - $limit;
				$this->i = 0;
				// echo "tres is one";
			}
			else 
			{ 
				$this->show_end = $tres * $limit;
				$this->show_start = $this->show_end - $limit;
				$this->i = $this->show_start;
				// echo "tres is more than one";
			} 











			echo " i = $this->i   <br> [loop] start = $this->show_start end = $this->show_end   <br>";



			/*
		 	if ( $tres == 1  ) 
			{
				$this->ads_position = 'two';
				$this->c = 0; 
				// echo " tres one ";
			}
			else 
			{ 
				// echo " tres greater than one ";
				$ads_counter = $_SESSION['ads_counter'];
				$this->c = $_SESSION['c'];
				$this->ads_position  = '10 and so on..';
			}
			*/ 

		}
		# outsite the loopings and the initialize
		public function home_tabs_selected( $home_tab , $mc , $limit_res )
		{

		 	
 
			$this->home_tab = $home_tab;

			if ( $this->home_tab == 'lates' ) 
			{ 

				echo " this tab is lates <br>";
				$this->user_header_style = 'display:block'; 
				$this->activity = $mc->get_activity( $limit_res ); 
				$this->activity = $this->insert_advertisements( $this->activity , 'tab_latests' );
				$this->Tresults =  count($this->activity);
			}
			else if (  $this->home_tab == 'plook'  ) 
			{ 

				echo " this tab is plook ";
				$this->user_header_style = 'display:none'; 
				$this->padding_ads_top = 'height: 10px;';
				$this->padding_ads_bottom = 'height: 20px;';
				$this->latest_look  = $mc->get_all_latest_look( $limit_res ); 
				$this->activity = $this->insert_advertisements( $this->latest_look , 'tab_looks' );
				$this->Tresults =  count($this->activity);


				// print_r($this->activity);
			}
			else if (  $this->home_tab == 'pmember'  ) 
			{ 

				echo " this tab is pmember ";

				$this->user_header_style = 'display:none'; 

				$this->padding_ads_top = 'height: 10px;';
				$this->padding_ads_bottom = 'height: 12px;';

				$this->all_users    = $mc->get_all_user( $limit_res );
				$this->activity = $this->insert_advertisements( $this->all_users , 'tab_members' );

				$this->Tresults =  count($this->activity);
			}
			else if (  $this->home_tab == 'particle'  ) 
			{ 

				// echo " this tab is particle ";
				$this->padding_ads_top = 'height: 10px;';
				$this->padding_ads_bottom = 'height: 15px;';
		 

				$this->postedarticle = $mc->get_all_postedarticle( $limit_res );
				$this->activity = $this->insert_advertisements( $this->postedarticle, 'tab_article' );

				$this->Tresults =  count($this->activity);
			}
			else if (  $this->home_tab == 'pmedia'  ) 
			{ 

				$this->padding_ads_top = 'height: 10px;';
				$this->padding_ads_bottom = 'height: 15px;';
		 
			 
				$this->postedmedia = $mc->get_all_postedmedia( $limit_res );
				$this->activity = $this->insert_advertisements( $this->postedmedia, 'tab_media' );
				$this->Tresults =  count($this->activity);
			}
		}
		#inside loop
		public function latest_activity_sorting( $mc , $ri , $i , $activity )
		{

			$this->activity = $activity; 

			// print_r($this->activity);
			if ( $this->home_tab == 'lates') 
			{

				// plook
				// pmember
				// particle
				// pmedia 
				// $fs_table = 'look'; 
				// echo " ano = > ".$this->activity[$this->i]['ano']." | ";
				// echo " action = > ".$this->activity[$this->i]['action']." | ";
				// echo " table = > ".$this->activity[$this->i]['_table']." | ";
				// echo " _table_id = > ".$this->activity[$this->i]['_table_id']." | ";	
				// echo " mno = > ".$this->activity[$this->i]['mno']."<br>";	 

				$ano  	   = $this->activity[$this->i]['ano'];
				$mno 	   = $this->activity[$this->i]['mno']; 
				$action    = $this->activity[$this->i]['action']; 
				$_table    = $this->activity[$this->i]['_table'];
				$_table_id = $this->activity[$this->i]['_table_id'];
				$_date     = $this->activity[$this->i]['_date'];

				if ( $_table == 'postedlooks') 
				{
					$this->latest_item = "plook";
					// echo " posted looks <br> ";
					// if ($this->activity[$this->i]['_table'] == 'postedlooks') 
					// {
						$this->total_attribute_look( );
						$this->look_owner = $this->activity[$this->i]['mno'];
						// $this->look_owner = 682;
						$this->plno = $this->activity[$this->i]['ano']; #for look hover 
						$this->plno_pic = $this->activity[$this->i]['_table_id']; #for look pictures  and info
						$this->lingfo =  $mc->posted_look_info($this->plno_pic);
						#needs to transfer during saving the info time 
					  		$this->lookName   = $this->lingfo['lookName']; 
					  		$this->lookAbout  = $this->lingfo['lookAbout'];
				  		#needs to transfer during saving the info time 
						if ($this->activity[$this->i]['action'] == 'Rated') 
						{
							 $this->user_act = "<b>". strtoupper( $mc->get_full_name_by_id($this->activity[$this->i]['mno']) ).'</b>  <br> '.$this->activity[$this->i]['action'].' a look by <b>  <br> '.$mc->get_full_name_by_look_id($this->activity[$this->i]['_table_id']).'</b>';
						}
						if ($this->activity[$this->i]['action'] == 'Posted') 
						{
							 $this->user_act = "<b>".strtoupper( $mc->get_full_name_by_id($this->activity[$this->i]['mno']) ).'</b>  <br> '.$this->activity[$this->i]['action'].' a look';
						}
					// }
				}
				else if ( $_table == 'fs_members') 
				{ 
					$this->latest_item = "pmember";
					// echo " posted member <br> ";

					$this->mno = $this->activity[$this->i]['mno'];
					$this->user_act = "<b>".$mc->get_full_name_by_id($this->activity[$this->i]['mno']).'</b> <br>'.strtolower($this->activity[$this->i]['action']).' Fashionsponge';
					 
					$one_user = $mc->get_user_info_by_id(intval($this->mno));
					$this->concat_member_info($mc , $one_user , 0); 
					$this->total_attribute_member( );
				}
				else if ( $_table == 'fs_postedarticles') 
				{ 
					$this->latest_item = "particle";
					$this->article_Id = $_table_id;
					$this->mno = $mno;
					// echo " posted articles <br> ";
					$this->user_act = "<b>".$mc->get_full_name_by_id($this->mno).'</b> <br>'.strtolower($action).' an article ';
				}
				else if ( $_table == 'fs_postedmedia') 
				{ 
					$this->latest_item = "pmedia";
					$this->media_Id = $_table_id;
					$this->mno = $mno;
					$this->user_act = "<b>".$mc->get_full_name_by_id($this->mno).'</b> <br>'.strtolower($action).' a media ';
				}	 

				// if i is one needs to be the height fit
				if ($this->i == 1) 
				{
				 	$this->padding_ads_top = 'height: 5px';
				 	$this->padding_ads_bottom = 'height: 20px;';
				}
				else 
				{ 
					$this->padding_ads_top = 'height: 10px;';
					$this->padding_ads_bottom = 'height: 20px;';
				}	
			}
	 		else if ( $this->home_tab == 'plook') 
			{ 
			 	$this->user_header_style = 'display:none'; 
				$this->look_owner = $this->activity[$this->i]['mno'];
				//  	echo "string";
				// 	echo " mno = $this->look_owner";
				$this->user_act  = " posted ".$mc->get_full_name_by_id($this->look_owner)." <br> 5 hours ago i = $i Tres = $this->Tresults ";

				$this->total_attribute_look( );
				$this->plno = $this->activity[$this->i]['plno']; # 1 and 2 the same 
				$this->plno_pic = $this->activity[$this->i]['plno']; # 2 and 1 the same

				$this->lingfo =  $mc->posted_look_info($this->plno_pic);
				$this->lookName   = $this->lingfo['lookName']; 
				$this->lookAbout  = $this->lingfo['lookAbout']; 




			}
			else if ( $this->home_tab == 'pmember') 
			{ 
				$this->user_header_style = 'display:none'; 
				$this->mno = $this->activity[$this->i]['mno'];
				
				// $this->user_act = " members ";

				$this->usermodals_init( $mc );
 				$this->total_attribute_member( );


				// $this->user_open = true;
				// $this->user = true;

				// $this->look_open = false; 
				// $this->look = false; 

				// $this->mno = $this->activity[$this->i]['mno'];
				// $this->user_act = "<b>".$mc->get_full_name_by_id($this->activity[$this->i]['mno']).'</b> <br>'.strtolower($this->activity[$this->i]['action']).' Fashionsponge';
			

				$this->mno = $this->activity[$this->i]['mno'];
				$this->user_act = "<b>".$mc->get_full_name_by_id($this->activity[$this->i]['mno'])."</b> <br> Joined Fashionsponge i = $i mno = ".$this->activity[$this->i]['mno'];
			}
			else if ( $this->home_tab == 'particle') 
			{ 
				$this->user_header_style = 'display:none'; 
				// echo " posted article functions inside loops ";


				// $this->mno = $this->activity[$this->i]['mno'];
				// $this->usermodals_init( $mc );
 				// 	$this->total_attribute_member( );
				// $this->mno = $this->activity[$this->i]['mno'];
				// $this->user_act = "<b>".$mc->get_full_name_by_id($this->activity[$this->i]['mno'])."</b> <br> Joined Fashionsponge i = $i mno = ".$this->activity[$this->i]['mno'];
			}
			else if ( $this->home_tab == 'pmedia') 
			{ 
				$this->user_header_style = 'display:none'; 
				// echo "pmedia inside loop ";
			}
		}
		public function usermodals_init($mc)
		{
			
 
			$this->firstname  =  $this->all_users[$this->i]['firstname'];
			$this->lastname   =  $this->all_users[$this->i]['lastname'];
			$this->middlename =  $this->all_users[$this->i]['middlename'];
			$this->occupation =  $this->all_users[$this->i]['occupation'];
			$this->country    =  $this->all_users[$this->i]['country'];
			$this->city       =  $this->all_users[$this->i]['city'];
			$this->aboutme    =  $this->all_users[$this->i]['aboutme'];
			$this->datejoined =  $this->all_users[$this->i]['datejoined'];
 
			$this->fn  = $this->firstname.' '.$this->lastname.' '.$this->middlename;
			$this->occ = $this->occupation;
			$this->dj  =  $mc->convert_date_format_profile($this->datejoined);

	 		if ( !empty($this->country) ) 
	 		{
	 			$this->cc = $this->country."<br>";
	 			if (!empty($this->city)){
	 				$this->cc = $this->country.' , '.$this->city."<br>";	 
	 			}
	 		}
	 		else if (!empty($this->city))
	 		{ 
	 			$this->cc = $this->city."<br>";;
	 		}

	 		if (!empty($this->fn)) 
			{
				$this->minfo .= $this->fn."<br>";
			}
			if( !empty($this->occ)) 
			{ 
				$this->minfo .= $this->occ."<br>";
			} 
			if( !empty($this->cc)) 
			{ 
				$this->minfo .= $this->cc;
				unset($this->cc);
			} 
			if( !empty($this->dj)) 
			{ 
				$this->minfo .= $this->dj."<br>";
			} 
		}
		public function concat_member_info($mc , $one_user , $i) 
		{ 
			
			$firstname  =  $one_user[$i]['firstname'];
			$lastname   =  $one_user[$i]['lastname'];
			$middlename =  $one_user[$i]['middlename'];
			$occupation =  $one_user[$i]['occupation'];
			$country    =  $one_user[$i]['country'];
			$city       =  $one_user[$i]['city'];
			$aboutme    =  $one_user[$i]['aboutme'];
			$datejoined =  $one_user[$i]['datejoined'];
			$minfo 		= "";
			$fn    		= $firstname.' '.$lastname.' '.$middlename;
			$occ   		= $occupation;
			$dj   		= $mc->convert_date_format_profile($datejoined);

	 		if ( !empty($this->country) ) 
	 		{
	 		 	$cc = $country."<br>";
	 			if (!empty($city)){
	 			 	$cc = $country.' , '.$city."<br>";	 
	 			}
	 		}
	 		else if (!empty($city))
	 		{ 
	 			$cc = $city."<br>";;
	 		}
	 		if (!empty($fn)) 
			{
				$minfo .= $fn."<br>";
			}
			if( !empty($occ)) 
			{ 
				$minfo .= $occ."<br>";
			} 
			if( !empty($cc)) 
			{ 
				$minfo .= $cc;
				unset($cc);
			} 
			if( !empty($dj)) 
			{ 
				$minfo .= $dj."<br>";
			} 

			$this->minfo   = $minfo;
			$this->aboutme = $aboutme;
		}
		public function concat_look_info($one_look)  
		{ 
		}
		public function concat_blog_info($one_blog) 
		{ 
		}
		public function concat_photo_info($one_photo) 
		{
		}
	    # inside the loopings
		public function ads_counter($h) 
		{ 
			
	  		if ($this->ads_position == 'two' ) 
	  		{	

	  			$this->c++; 

	  			 if ( $h ==  2) 
	  			 {   
		  			$this->ads_position = '10 and so on..';

					$this->c=1;

				    $this->look  = false;   
					$this->blog  = false;   
					$this->photo = false;    
				    $this->user  = false;    
					$this->ads   = true;       
	  			 }
	  		}
	  		else if  ( $this->ads_position == '10 and so on..' ) 
	  		{
	  			$this->c++; 
	  			if ( $this->c == 9 ) 
	  			{ 
					$this->c = 1;
				    $this->look  = false;   
					$this->blog  = false;   
					$this->photo = false;    
				    $this->user  = false;    
					$this->ads   = true;    
	  			}
	  		}

	  		$_SESSION['c'] = $this->c; 
	  		$_SESSION['ads_counter'] = $this->ads_counter; 
		}
		# inside the loopings
	}	
 
	class functions
	{

		#new insert advertisements 
			public function insert_advertisements( $images , $insert_ads_at ) 
			{

			 	// $insert_ads_at = "tab_latests";

			 	if ( $insert_ads_at == "tab_latests" ) 
			 	{
				 	$c = 0;
				 	$next_inserts_ads = 1;
				 	$next_insert_image =  0;
				 	$temp_ads = array( "1.png" , "2.jpg" , "3.jpg" , "4.jpg" );
				 	$rn = rand(0,2);

				  	for ($i=0; $i < count($images) ; $i++) 
				  	{ 
				  		if ( $c == 1 or $next_inserts_ads == $c  ) 
				  		{
				  			$next_inserts_ads = $c;
				  			$new_set_of_images[$c]['type'] = "ads";
				  			$new_set_of_images[$c]['ads_id'] = $temp_ads[$rn];
				  			$next_inserts_ads = $c+9;
				  			$i--;
				  		} 
				  		else 
				  		{ 
				  			$new_set_of_images[$c]['type'] = "latest";
				  			$new_set_of_images[$c]['ano']       =  $images[$next_insert_image]['ano'];
				  			$new_set_of_images[$c]['mno']       =  $images[$next_insert_image]['mno'];
				  			$new_set_of_images[$c]['action']    =  $images[$next_insert_image]['action'];
				  			$new_set_of_images[$c]['_table']    =  $images[$next_insert_image]['_table'];
				  			$new_set_of_images[$c]['_table_id'] =  $images[$next_insert_image]['_table_id'];
				  			$new_set_of_images[$c]['_date']     =  $images[$next_insert_image]['_date'];
				  			$next_insert_image++;
				  		}		  		  
				  		$c++;
				  	}
				  	return $new_set_of_images;
				}
				else if ( $insert_ads_at == "tab_looks" )   
				{ 


					echo "<br>";
					for ($i=0; $i < count( $images ) ; $i++) 
					{ 
						echo " $i ) ". $images[$i]["plno"]."<br>";	 
					}





					$c = 0;
				 	$next_inserts_ads = 1;
				 	$next_insert_image =  0;
				 	$temp_ads = array( "1.png" , "2.jpg" , "3.jpg" , "4.jpg" );
				 	$rn = rand(0,2);

				  	for ($i=0; $i < count($images) ; $i++) 
				  	{ 
				  		
				  		if ( $c == 1 or $next_inserts_ads == $c  ) 
				  		{
				  			$next_inserts_ads = $c;
				  			$new_set_of_images[$c]['type']    = "ads";
				  			$new_set_of_images[$c]['ads_id']  = $temp_ads[$rn];
				  			$new_set_of_images[$c]['mno']     =  0;
				  			$next_inserts_ads = $c+9;
				  			$i--;

				  		} 
				  		else 
				  		{ 

				  			$new_set_of_images[$c]['type']     =  "plook";
				  			$new_set_of_images[$c]['plno']     =  $images[$next_insert_image]['plno'];
				  			$new_set_of_images[$c]['mno']      =  $images[$next_insert_image]['mno'];
				  			$new_set_of_images[$c]['date_']    =  $images[$next_insert_image]['date_'];
				  			$new_set_of_images[$c]['lookName'] =  $images[$next_insert_image]['lookName'];
				  			$new_set_of_images[$c]['occasion'] =  $images[$next_insert_image]['occasion'];
				  			$new_set_of_images[$c]['season']   =  $images[$next_insert_image]['season'];
				  			$next_insert_image++;
				  		 
				  		}	
				  		

				  	 
				  		$c++;

				  	}

				  	// for ($i=0; $i < count($new_set_of_images) ; $i++) 
				  	// { 
				  	// 	echo " $i ) ".$new_set_of_images[$i]['type']."<br>";	  
				  	// }
				  	return $new_set_of_images;
				}
				else if ( $insert_ads_at == "tab_members" ) 
				{ 


					// print_r($images)


				 	$c = 0;
				 	$next_inserts_ads = 1;
				 	$next_insert_image =  0;
				 	$temp_ads = array( "1.png" , "2.jpg" , "3.jpg" , "4.jpg" );
				 	$rn = rand(0,2);

				  	for ($i=0; $i < count($images) ; $i++) 
				  	{ 
				  		if ( $c == 1 or $next_inserts_ads == $c  ) 
				  		{
				  			$next_inserts_ads = $c;
				  			$new_set_of_images[$c]['type']    = "ads";
				  			$new_set_of_images[$c]['ads_id']  = $temp_ads[$rn];
				  			$next_inserts_ads = $c+9;
				  			$i--;
				  		} 
				  		else 
				  		{ 

				  			$new_set_of_images[$c]['type']        = "pmember";
				  			$new_set_of_images[$c]['mno']         =  $images[$next_insert_image]['mno'];
				  			$new_set_of_images[$c]['firstname']   =  $images[$next_insert_image]['firstname'];
				  			$new_set_of_images[$c]['lastname']    =  $images[$next_insert_image]['lastname'];
				  			$new_set_of_images[$c]['middlename']  =  $images[$next_insert_image]['middlename'];
				  			$new_set_of_images[$c]['country']     =  $images[$next_insert_image]['country'];
				  			$new_set_of_images[$c]['city']        =  $images[$next_insert_image]['city'];
				  			$new_set_of_images[$c]['aboutme']     =  $images[$next_insert_image]['aboutme'];
				  			$new_set_of_images[$c]['datejoined']  =  $images[$next_insert_image]['datejoined'];

				  			$next_insert_image++;
				  		}		
				  		$c++;  		  
				  	}

				  	// for ($i=0; $i < count($new_set_of_images) ; $i++) 
				  	// { 
				  	// 	echo " $i ) ".$new_set_of_images[$i]['type']."<br>";	  
				  	// }
				  	return $new_set_of_images;
				}
				else if ( $insert_ads_at == "tab_article" ) 
				{ 

					#article

 
				 	$c = 0;
				 	$next_inserts_ads = 1;
				 	$next_insert_image =  0;
				 	$temp_ads = array( "1.png" , "2.jpg" , "3.jpg" , "4.jpg" );
				 	$rn = rand(0,2);

				  	for ($i=0; $i < count($images) ; $i++) 
				  	{ 
				  		if ( $c == 1 or $next_inserts_ads == $c  ) 
				  		{
				  			$next_inserts_ads = $c;
				  			$new_set_of_images[$c]['type']    = "ads";
				  			$new_set_of_images[$c]['ads_id']  = $temp_ads[$rn];
				  			$next_inserts_ads = $c+9;
				  			$i--;
				  		} 
				  		else 
				  		{ 

				  			$new_set_of_images[$c]['type']      		     = "particle";
				  			$new_set_of_images[$c]['article_Id']       	     =  $images[$next_insert_image]['article_Id'];
				  			$new_set_of_images[$c]['mno']        			 =  $images[$next_insert_image]['mno'];
				  			$new_set_of_images[$c]['article_title'] 	     =  $images[$next_insert_image]['article_title'];
				  			$new_set_of_images[$c]['article_description']    =  $images[$next_insert_image]['article_description'];
				  			$new_set_of_images[$c]['article_tags']  		 =  $images[$next_insert_image]['article_tags'];
				  			$new_set_of_images[$c]['article_topic']    	     =  $images[$next_insert_image]['article_topic'];
				  			$new_set_of_images[$c]['article_source_url'] 	 =  $images[$next_insert_image]['article_source_url'];
				  			$new_set_of_images[$c]['article_source_item']	 =  $images[$next_insert_image]['article_source_item'];
				  			$new_set_of_images[$c]['article_type']			 =  $images[$next_insert_image]['article_type'];
				  			$new_set_of_images[$c]['article_extension']   	 =  $images[$next_insert_image]['article_extension'];
				  			$new_set_of_images[$c]['article_dateuploaded']   =  $images[$next_insert_image]['article_dateuploaded'];

				  			$next_insert_image++;
				  		}		
				  		$c++;  		  
				  	}

				  	// for ($i=0; $i < count($new_set_of_images) ; $i++) 
				  	// { 
				  	// 	echo " $i ) ".$new_set_of_images[$i]['type']."<br>";	  
				  	// }
				  	return $new_set_of_images;
				}
				else if ( $insert_ads_at == "tab_media" )   
				{ 

					#media 

 
				 	$c = 0;
				 	$next_inserts_ads = 1;
				 	$next_insert_image =  0;
				 	$temp_ads = array( "1.png" , "2.jpg" , "3.jpg" , "4.jpg" );
				 	$rn = rand(0,2);

				  	for ($i=0; $i < count($images) ; $i++) 
				  	{ 
				  		if ( $c == 1 or $next_inserts_ads == $c  ) 
				  		{
				  			$next_inserts_ads = $c;
				  			$new_set_of_images[$c]['type']    = "ads";
				  			$new_set_of_images[$c]['ads_id']  = $temp_ads[$rn];
				  			$next_inserts_ads = $c+9;
				  			$i--;
				  		} 
				  		else 
				  		{ 

				  			$new_set_of_images[$c]['type']      	     = "pmedia";
				  			$new_set_of_images[$c]['media_id']           =  $images[$next_insert_image]['media_id'];
				  			$new_set_of_images[$c]['mno']        	     =  $images[$next_insert_image]['mno'];
				  			$new_set_of_images[$c]['media_title'] 	     =  $images[$next_insert_image]['media_title'];
				  			$new_set_of_images[$c]['media_description']  =  $images[$next_insert_image]['media_description'];
				  			$new_set_of_images[$c]['media_tags']  		 =  $images[$next_insert_image]['media_tags'];
				  			$new_set_of_images[$c]['media_topic']        =  $images[$next_insert_image]['media_topic'];
				  			$new_set_of_images[$c]['media_source_url'] 	 =  $images[$next_insert_image]['media_source_url'];
				  			$new_set_of_images[$c]['media_source_item']	 =  $images[$next_insert_image]['media_source_item'];
				  			$new_set_of_images[$c]['media_type']	     =  $images[$next_insert_image]['media_type'];
				  			$new_set_of_images[$c]['media_type']		 =  $images[$next_insert_image]['media_type'];
				  			$new_set_of_images[$c]['media_extension']    =  $images[$next_insert_image]['media_extension'];
				  			$next_insert_image++;
				  		}		
				  		$c++;  		  
				  	}

				  	// for ($i=0; $i < count($new_set_of_images) ; $i++) 
				  	// { 
				  	// 	echo " $i ) ".$new_set_of_images[$i]['type']."<br>";	  
				  	// }
				  	return $new_set_of_images;
				
				}
			}	
		#end insert advertisements 
		#new image attr
			public function total_attribute_member( ) 
			{
				$this->mem_rating_percatage = rand(83 , 96);
				$this->mem_rating_total     = rand(100,2000); 
				$this->mem_total_followers  = rand(0,1000); 
	            $this->mem_total_following  = rand(0,500); 
				$this->mem_total_look     	= rand(0,10); 
				$this->mem_total_media 	    = rand(0,0); 
				$this->mem_total_article    = rand(0,0); 
				$this->mem_total_views 		= rand(500,1000); 
			}
			public function total_attribute_look( ) 
			{
				$this->rating_percent = rand(83,96);
				$this->rating_total   = rand(100,2000);
				$this->comment        = rand(0,100);
				$this->view           = rand(100,2000);
				$this->redrip         = rand(0,500);
				$this->favorites      = rand(0,200);
				$this->stars          = rand(1,5);
			}
			public function total_attribute_blog( ) 
			{
			}
			public function total_attribute_photo( ) 
			{
			}
		#end images attr
	}
?>