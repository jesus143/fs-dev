<?php 
	// require ('library.php');
	// get_not_rated_look($_SESSION['mno']);
	// get_not_rated_look($_SESSION['mno'],0);

	// $md = set_month_days();	
	// print_r($md);
	// echo $md['January']['day_start'].' end '.$md['January']['day_end'].'<br>';
	// print_r(get_date_attr());
	// $date_attr = get_date_attr();
	// print_r(get_rated_look($_SESSION['mno'],$date_attr['mnth'],$date_attr['yr']));
    // print_r(get_not_rated_look($_SESSION['mno'],'03',$date_attr['yr']));
	 // most_viewed_look('2013-03');
	// echo "<hr> Most discussed look<br>";
	// print_r(most_discussed_look('2013-04'));
	// echo "<hr>";
	// echo "<hr>top rated look<br>";
	// print_r(top_rated_look('2013-03'));
	// echo "<hr>";	


	// all_look_i_have_rated(1);

	
	class myclass
	{
		public function date_difference(){
 				date_default_timezone_set('America/Los_Angeles');
		         $this->today = mktime(0,0,0,date("m"),date("d")-1,date("Y"));
			     $this->today = date("Y-m-d", $this->today);
			 $this->last_week = mktime(0,0,0,date("m"),date("d")-8,date("Y"));
			 $this->last_week = date("Y-m-d", $this->last_week);
			$this->last_month = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
			$this->last_month = date("Y-m-d", $this->last_month);
			 $this->last_year = mktime(0,0,0,date("m"),date("d"),date("Y")-1);
			 $this->last_year = date("Y-m-d", $this->last_year);
			
			$this->date_dif = array(
			        'today' => $this->today, 
			        // 'today' => '2013-03-28', 
		        'last_week' => $this->last_week, 
			   'last_month' => $this->last_month, 
			    'last_year' => $this->last_year
			);
			return $this->date_dif;
		}
		public function posted_look_info($plno){
			// $this->postedlooks = array();	
			// echo "plno here in class  = $plno ";			
			     $plook  = select('postedlooks',7,array('plno',$plno));
			     $prates = select('ratings',4,array('plno',$plno));
			     $ploves = select('pl_loves',3,array('plno',$plno));
			     $pdrips = select('pl_drips',3,array('plno',$plno));
			  $pcomments = select('posted_looks_comments',5,array('plno',$plno));

			$this->postedlooks = array(
					    'plno' =>  $plook[0][0], 
				         'mno' =>  $plook[0][1], 
				       'date_' =>  $plook[0][2], 
				    'lookName' =>  $plook[0][3], 
				   'lookColor' =>  $plook[0][4], 
				   'lookAbout' =>  $plook[0][5], 
				      'tlview' =>  $plook[0][6],
				     'tlrates' =>  $this->cout_array($prates),
				  'tlrpercent' =>  $this->calculate_rate($plno),
			   	     'tldrips' =>  $this->cout_array($pdrips),
				 	  'tllove' =>  $this->cout_array($ploves),				    
			      'tlcomments' =>  $this->cout_array($pcomments)
				);
			return $this->postedlooks;
		}
		public function user($mno){

					  $dates = $this->date_difference();

			  $this->mem_acc = select('fs_member_accounts',5,array('mno',$mno));
			$this->mem_pinfo = select('fs_members',32,array('mno',$mno));
			 $this->followme = select('friends',4,array('mno2',$mno));
			  $this->Ifollow = select('friends',4,array('mno1',$mno));
			   $this->tplook = select('postedlooks',7,array('mno',$mno));
			 $this->oarating = select('postedlooks',7,array('mno',$mno));
			 	  $date_attr = get_date_attr();
			 	  $cyr_mnth = "$date_attr[yr]-$date_attr[mnth]";

			// $month = substr($dates['today'],6,1);
			  // $month = substr($dates['today'],6,1);
			  // $setdate = get_rated_look($mno,$date_attr['mnth'],$date_attr['yr']);

			 // echo "<br> rated looks <br>";
			 // echo "today = $dates[today]<br>";

			 // echo "today is $dates[today]  <br>";


			//  echo "set date $setdate today $dates[today] ";
			//  if ($setdate > $dates[today]) {
			//  	echo "set date is greater today ";
			//  }else{ 
			//  	echo "set date is lessthan today";
			//  }
			// print_r($setdate);
			 // echo "<br> not rated looks <br>";

			 // $look_not_rated=get_not_rated_look($_SESSION['mno']);
			 // print_r($look_not_rated);
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
			   // 'have_not_rated_look_by_date'=>  array(
			   // 								 'today' => get_not_rated_look($mno,$dates['today']), 
			   // 							     'week'  => get_not_rated_look($mno,$dates['last_week']),
			   // 								 'month' => get_not_rated_look($mno,$dates['last_month']),
						// 					 'year'  => get_not_rated_look($mno,$dates['last_year'])
						// 				),
	   // 'all_uploaded_current_month' => all_look_upl_this_month();
		          'all_look_cmonth' => all_look_upl_current_month(date($cyr_mnth)),
	 		'top_rated_look_cmonth' => top_rated_look($cyr_mnth),
	 		     // 'most_viewed_look' => most_viewed_look($cyr_mnth), 
				      'newest_look' => newest_look($cyr_mnth), 
				      'oldest_look' => oldest_look($cyr_mnth), 
			  // 'most_discussed_look' => most_discussed_i_have_rated('newest'),
			  			 // 'top_rated'=> top_rated_look($cyr_mnth),
			           'datemember' => $this->mem_pinfo[0][31]
			);
			return $this->mem_info;
		}
		public function top_member(){

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
		public function getTmaxrating($luploaded,$date){ 
			$dates = $this->date_difference();
			$c=0;
			// echo "date is  $dates[today] and $date <br>";
			if (!empty($luploaded)) {
				for ($i=0; $i < count($luploaded) ; $i++) { 
				 	$user_lup[$i]=$luploaded[$i][1];
				}

				$mnos=remove_duplicate($user_lup);
				for ($i=0; $i < count($mnos); $i++) { 
					if ($date == 'all') {
						// echo "i	nside all ";
						$ovarating = select('postedlooks',7,array('mno',$mnos[$i]));
					}else{ 
						// echo "el	se  not all ";
						$ovarating=select2_wop(
							'postedlooks',
							7,
							array('mno',$mnos[$i],'date_',$dates[$date]),
							array('=','and','>')
						);
					}			
					if (!empty($ovarating)) {
						 $rate=$this->highest_rate($ovarating);
						 $c++;
						 $trate[$c] = $rate;
					 }else{ 
					 	// echo "no uploaded look..";
					 }
			    }
			  return max($trate);
			}
		}
		public function calc_topmember($luploaded,$date){
			$dates = $this->date_difference();
			$c=0;
			$tmaxrate=$this->getTmaxrating($luploaded,$date); # get overall max rate
			// echo "<br>max total  rate is <br>".$tmaxrate."<br>";
			if (!empty($luploaded)) {
				for ($i=0; $i < count($luploaded) ; $i++) { 
				 	$user_lup[$i]=$luploaded[$i][1];
				}
				$mnos=remove_duplicate($user_lup);
				for ($i=0; $i < count($mnos); $i++) { 

					if ($date == 'all') {
						$userLookUploaded = select('postedlooks',7,array('mno',$mnos[$i]));
					}else{ 
						$userLookUploaded=select2_wop(
							'postedlooks',
							7,
							array('mno',intval($mnos[$i]),'date_',$dates[$date]),
							array('=','and','>')
						);
					}			
					if (!empty($userLookUploaded)) {
						 // $rate=$this->highest_rate($userLookUploaded);
						 $c++;
						 $trate[$c] = $rate;
						 $tminfo[$i][0] = $mnos[$i]; 

						 $ovrates = $this->coarates_top($userLookUploaded,$tmaxrate);
						 for ($j=0; $j < count($ovrates); $j++) { 
						 	$tminfo[$i][$j+1] = $ovrates[$j];
						 	# mno , rpercent , tpoints , trating.
						 }
					 }else{ 
					 	#  no uploaded look.
					 }
			    }
			    $tmfinfo = $this->descending_order2($tminfo);
			    // echo "after descending <br>";
			    // print_r($tmfinfo);
			    return $tmfinfo;
		   	}

		}		
		public function coarates_top($userLookUploaded,$hrate){
			if (!empty($userLookUploaded)) {
				$sum=0;
				$hrate*=5;
				$trate=0;
				// echo "highest rate in top is $hrate <br>";
				for ($i=0; $i <count($userLookUploaded) ; $i++) { 
					 $plratings=select('ratings',4,array('plno',$userLookUploaded[$i][0]));
					 for ($j=0; $j < count($plratings) ; $j++) { 
						$sum+=$plratings[$j][3];
						// echo "string";
						$trate++;
					 }	
				}
				if ($sum != 0 and $hrate != 0 ) {
					    $rating = ($sum / $hrate) * 100;
					$ovrates[0] = intval($rating); 
					$ovrates[1] = $sum; 
					$ovrates[2] = $trate; 
					return $ovrates;
				}else{ 
					$ovrates[0] = 0;
					$ovrates[1] = 0;
					$ovrates[2] = 0;
					return $ovrates; # no rating happen.
				}
			}else{
				return "0";
			}
		} 
		public function highest_rate($oarating){ 
			$c=0;
			for ($i=0; $i <count($oarating) ; $i++) { 
				$plratings=select('ratings',4,array('plno',$oarating[$i][0]));
				for ($j=0; $j < count($plratings) ; $j++) { 
					if (!empty($plratings[$j][3])) {
						$c++;
						$this->sum+=$plratings[$j][3];
					} 
				}	
			}
			// echo "<br> sum = $sum total =  $c <br>";
			return $c;
		}
		public function asceding_order1($int_array){ 
		}
		public function asceding_order2($int_array){ 
		}
		public function descending_order2($int_array){ 		
			for ($i=0; $i < count($int_array) ; $i++) { 
				for ($j=$i+1; $j < count($int_array) ; $j++) { 
					 if ($int_array[$i][1] < $int_array[$j][1] ) {
					 	for ($h=0; $h < count($int_array[0]); $h++) { 
					 	               $sub = $int_array[$i][$h];
					 	 $int_array[$i][$h] = $int_array[$j][$h];
					 	 $int_array[$j][$h] = $sub;
					 	}
					 }
				}
			}
			return $int_array;
		}
		public function decending_order1($int_array){ 
		}
		function delete(){ 
			if (!empty($this->del_rate)) {
				delete('ratings',array('plno',$this->del_rate));
			}else{ 
				// echo "can't delete plno $this->del_rate <br>";
			}
		}
		public function coarates($oarating){
			if (!empty($oarating)) {
				$c=0;
				$sum=0;
				for ($i=0; $i <count($oarating) ; $i++) { 
					 $this->plratings=select('ratings',4,array('plno',$oarating[$i][0]));
					 for ($j=0; $j < count($this->plratings) ; $j++) { 
						$c++;
						$sum+=$this->plratings[$j][3];
					 }	
				}
				$c*=5;
				$ovrates = ($sum / $c) * 100;
				return intval($ovrates);
			}else{
				return "0";
			}
		} 
		public function calculate_rate($plno){ 
			$prates=select('ratings',4,array('plno',$plno));
			if (!empty($prates)) {
				$trate=count($prates);
				for ($i=0; $i < count($prates) ; $i++) { 
				     	$r= $prates[$i][3];
				 	$tsum+= $r;
				} 
				$overall=$trate*5;
				$res = ($tsum / $overall) * 100;
				return intval($res);
			}
			else{ 
				return 0;
			}
		}
		public function cout_array($str_array){
			if (empty($str_array)) {
				return 0;
			}else{
				 return count($str_array);
			}
		}
		public function get_mno_by_mail($mail){
			 $this->mno = select('fs_member_accounts',5,array('email',$mail));
			$this->mno1 = $this->mno[0][1];
 			return  $this->mno1;
		} 
		public function go($link){ 

			echo "<script type='text/javascript'>document.location='$link'</script>";
		}
		public function url_redirect_to_no_www($actual_link){ 
			if(strpos($actual_link,'www')){ 
				#with www 
				$this->go(str_replace('www.','',$actual_link));	
			}else{ 
				# no www
			}
		}
		public function get_mnobyusername($username){
			$id=select('fs_member_accounts',5,array('username',$username));		
			return $id[0][1];
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
		public function user_profile_percentage($mno){ 
			// $mno=$this->get_mnobyusername($username);
			$lupall = select('postedlooks',7);
			$mnoLup = select('postedlooks',7,array('mno',$mno));
			$max_rating=$this->getTmaxrating($lupall,'all');
			$ovarating=$this->coarates_top($mnoLup,$max_rating);
			return $ovarating[0];
		}
		public function whobyusername(){}
		public function whobyfirstname(){}
		public function whobylastname(){}
		public function whobyemail(){}

	}
?>
