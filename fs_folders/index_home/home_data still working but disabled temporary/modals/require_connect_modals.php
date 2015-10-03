<?php

	 
 
	class connections
	{
		
		public function local_connect()
		{
			
			require ("../../../../../fs/fs/connect.php");
			require ("../../../../../fs/fs/function.php");
			require ("../../../../../fs/fs/library.php");
			require ("../../../../../fs/fs/source.php");
			require ("../../../../../fs/fs/myclass.php");

			// echo " connected local ";
			$this->look_img_directory   = '../../fs/fs/images/members/posted looks/home/';
			$this->member_img_directory = '../../fs/fs/images/members/';
			$this->memExist             = '../../../../../fs/fs/images/members/';
		}
		public function online_connect()
		{
			
			// echo " connected online ";
			require ("../betatest/connect.php");
			require ("../betatest/function.php");
			require ("../betatest/library.php");
			require ("../betatest/source.php");
			require ("../betatest/myclass.php");


			$this->look_img_directory = '../betatest/images/members/posted looks/home/';
			$this->member_img_directory = '../betatest/images/members/';
			$this->memExist = '../../../betatest/images/members/';
		}
		public function calculate_show($limit , $tres , $usr)
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

				

		 	if ( $tres == 1  ) 
			{
				$this->ads_position = 'two';
				$this->c = 0; 
				echo " tres one ";
			}
			else 
			{ 
				echo " tres greater than one ";
				$ads_counter = $_SESSION['ads_counter'];
				$this->c = $_SESSION['c'];
				$this->ads_position  = '10 and so on..';
			}
		}
		# outsite the loopings and it could be initialize
		public function home_tabs_selected($home_tab , $usr)
		{
			

			$look       = false; 
			$blog       = false; 
			$photo      = false;
		    $user       = false;
			$ads        = false;

			$look_open  = false;
			$blog_open  = false;
			$photo_open = false;
			$user_open  = false;
			$ads_open   = false;

			if ( !empty( $home_tab ) ) 
			{
				 $_SESSION['home_tab'] = $home_tab;
			}
			else 
			{ 
				 $home_tab = $_SESSION['home_tab'];
			}
			if ( $home_tab == 'lates' ) 
			{ 

				$user_header_style = 'display:block'; 

				// $this->look_open  = true;
				// $this->blog_open  = true;
				// $this->photo_open = true;
				// $this->ads_open   = true;

				$user_open  = true;
				$user = true;
				$look = true;
				$look_open = true;
				$ads_open = true;

				$this->activity = $usr->get_activity(); 

				$this->Tresults =  count($this->activity);

			}
			else if (  $home_tab == 'pblog'  ) 
			{ 

				$user_header_style = 'display:block'; 
				$blog = false;
				$blog_open = false;
				$ads_open = false;

			}
			else if (  $home_tab == 'pmember'  ) 
			{ 

				$user_header_style = 'display:none'; 

				$user = true;
				$user_open = true;
				$ads_open = true;

				$this->all_users    = $usr->get_all_user();
				$this->Tresults =  count($this->all_users);

			}
			else if (  $home_tab == 'plook'  ) 
			{ 

				$user_header_style = 'display:none'; 

				$look = true;
				$look_open = true;
				$ads_open = true;

				$this->latest_look  = $usr->get_all_latest_look(); 
				$this->Tresults =  count($this->latest_look);

			}
			else if (  $home_tab == 'pphoto'  ) 
			{ 
				$user_header_style = 'display:block'; 
				$photo = false;
				$photo_open = false;
				$ads_open = false;
			}

			$this->look       = $look;   
			$this->blog       = $blog;   
			$this->photo      = $photo;  
		    $this->user       = $user;   
			$this->ads        = $ads;    

			$this->look_open  = $look_open;
			$this->blog_open  = $blog_open;
			$this->photo_open = $photo_open;
			$this->user_open  = $user_open;
			$this->ads_open   = $ads_open ;

			$this->home_tab   = $home_tab;

			$this->user_header_style = $user_header_style;
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
		public function latest_activity_sorting($usr)
		{
			
			if ( $this->home_tab == 'lates') 
			{
				$type = 'look';

				if ( $type == 'look') 
				{
				
					if ($this->activity[$this->i]['_table'] == 'postedlooks') 
					{
						// echo " c = ".$this->i."  posted look ";

						$this->user_open = false;
						$this->user = false;
						$this->look_open = true; 
						$this->look = true; 

						$this->look_owner = $this->activity[$this->i]['mno'];

						$this->plno = $this->activity[$this->i]['ano']; #for look hover 
						$this->plno_pic = $this->activity[$this->i]['_table_id']; #for look pictures  and info

						$this->lingfo =  $usr->posted_look_info($this->plno_pic);
				  		$this->lookName   = $this->lingfo['lookName']; 
				  		$this->lookAbout  = $this->lingfo['lookAbout']; 
				  		 
						if ($this->activity[$this->i]['action'] == 'Rated') 
						{
							 $this->user_act = "<b>".$usr->get_full_name_by_id($this->activity[$this->i]['mno']).'</b>  <br> '.$this->activity[$this->i]['action'].' a look by <b>  <br> '.$usr->get_full_name_by_look_id($this->activity[$this->i]['_table_id']).'</b>';
						}
						if ($this->activity[$this->i]['action'] == 'Posted') 
						{
							 $this->user_act = "<b>".$usr->get_full_name_by_id($this->activity[$this->i]['mno']).'</b>  <br> '.$this->activity[$this->i]['action'].' a look';
						}

					}
					else if ($this->activity[$this->i]['_table'] == 'fs_members') 
					{ 
					 	#echo " c = ".$this->i." member joined mno = ".$this->activity[$this->i]['mno'];

					 	$this->user_open = true;
						$this->user = true;

						$this->look_open = false; 
						$this->look = false; 

						$this->mno = $this->activity[$this->i]['mno'];
						$this->user_act = "<b>".$usr->get_full_name_by_id($this->activity[$this->i]['mno']).'</b> <br>'.strtolower($this->activity[$this->i]['action']).' Fashionsponge';
						 
						$one_user = $usr->get_user_info_by_id(intval($this->mno));
						$this->concat_member_info($usr , $one_user , 0); 

					}
				}
				else if ( $type == 'member') 
				{ 
				}
				else if ( $type == 'look') 
				{ 
				}
				else if ( $type == 'blog') 
				{ 
				}
				else if ( $type == 'photo') 
				{ 
				}			 
			}
			else if ( $this->home_tab == 'pblog') 
			{ 
			}
			else if ( $this->home_tab == 'pmember') 
			{ 
				$this->mno = $this->all_users[$this->i]['mno'];
				


				$this->usermodals_init($usr);
 	


				// $this->user_open = true;
				// $this->user = true;

				// $this->look_open = false; 
				// $this->look = false; 

				// $this->mno = $this->activity[$this->i]['mno'];
				// $this->user_act = "<b>".$usr->get_full_name_by_id($this->activity[$this->i]['mno']).'</b> <br>'.strtolower($this->activity[$this->i]['action']).' Fashionsponge';

			}
	 		else if ( $this->home_tab == 'plook') 
			{ 
				

				 
				$this->plno = $this->latest_look[$this->i]['plno']; # 1 and 2 the same 
				$this->plno_pic = $this->latest_look[$this->i]['plno']; # 2 and 1 the same

				$this->lingfo =  $usr->posted_look_info($this->plno_pic);
				$this->lookName   = $this->lingfo['lookName']; 
				$this->lookAbout  = $this->lingfo['lookAbout']; 

			}
			else if ( $this->home_tab == 'pphoto') 
			{ 
			}
		}
		public function usermodals_init($usr)
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
			$this->dj  =  $usr->convert_date_format_profile($this->datejoined);

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
		public function concat_member_info($usr , $one_user , $i) 
		{ 
			
			$firstname  =  $one_user[$i]['firstname'];
			$lastname   =  $one_user[$i]['lastname'];
			$middlename =  $one_user[$i]['middlename'];
			$occupation =  $one_user[$i]['occupation'];
			$country    =  $one_user[$i]['country'];
			$city       =  $one_user[$i]['city'];
			$aboutme    =  $one_user[$i]['aboutme'];
			$datejoined =  $one_user[$i]['datejoined'];


			$fn  = $firstname.' '.$lastname.' '.$middlename;
			$occ = $occupation;
			$dj  =  $usr->convert_date_format_profile($datejoined);

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
	}	
?>