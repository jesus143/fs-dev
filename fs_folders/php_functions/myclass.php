<?php



	/*
		Date Created: jan 20 2012. 
	*/
  
	/*  
		1.) php mailer: http://www.computersneaker.com/send-email-using-phpmailer/
		2.) generate fabicon: http://realfavicongenerator.net/ 
		3.) popup plugin: https://www.hellobar.com/  
		4.) http://www.techonthenet.com/sql/like.php like tutorials
		5.) http://demo.phpgang.com/ -> toturials more on mobile , uploads many more with demo
		6.) upload file with loading tut ajax query and it used it . src = http://hayageek.com/ajax-file-upload-jquery/
	*/ 

	/**  
	*  this are the variable being used 
	*  modal[]    => for modal info
	*  query[]    => for query info
	*  comment[]  => for comment info   
	*/ 
 
 	    
 	require("mysql_crud.php"); 
	$db = new Database();
	$db->connect();
	require('fs.console.source.php'); 
  
	class myclass extends myclassCode {


        public $date_time = "";
         
 

        public  $mno = 0, 
        		$gender = 'Male', 
        		$plus_blogger = 'Yes',
        		$lastname  = '',
				$firstname  = '',
				$identity_username  = '',
				$blog_name  = '',
				$fullname = '',  
				$blogdom  = '', 
			    $mppno  = 0, 
			    $mppno1 = 0,
			    $identity_email='',
                $tlog = 0;


        
		function __construct( ) {  
			// date_default_timezone_set('America/Los_Angeles');   // newyor or atlanta 
			date_default_timezone_set("America/New_York");
			 
			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );   
 			$mno 			 =  $this->get_cookie( 'mno' , 136 );   
			$this->auto_detect_path();
			$this->date_difference(); 
			$this->css();     
			$this->print_login_stat_id( $mno = ( !empty( $_SESSION['mno'] ) ) ?  $_SESSION['mno'] : 136  );
			$this->print_ajax_response_container( 'display:none;visibility:hidden' );  
			$this->clean_memcache( );  
			$this->set_login_cockie( ); 
			$this->init_path( ); 
			$this->header_show_when_account_not_verified( $mno );   
			$this->fs_notifiation( $mno );  
			$this->initialize( ); 
			$this->signInUser();
		}      

		public function signInUser() {     
			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );  
		 	$mno 			=   $this->get_cookie( 'mno' , 136 );
		 	$this->mno         =  $this->get_cookie( 'mno' , 136 );  
			// echo "<h1> mno =  $mno  </h1>";  
		    $signInUser = select_v3('fs_members', '*', 'mno = ' . $mno);  
		    // echo "<pre>"; 
		    // print_r($signInUser); 
		    // echo "</pre>"; 
			  $this->mno = $signInUser[0]['mno'];                                      //`` bigint(20) NOT NULL AUTO_INCREMENT,
			  $this->fullname = $signInUser[0]['fullname'];                                      //`` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  $this->lastname = $signInUser[0]['lastname'];                                      //`` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->middlename = $signInUser[0]['middlename'];                                      //`` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->firstname = $signInUser[0]['firstname'];                                      //`` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->nickname = $signInUser[0]['nickname'];                                      //`` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
			  $this->gender = $signInUser[0]['gender'];                                      //`` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->website = $signInUser[0]['website'];                                      //`` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->bdate = $signInUser[0]['bdate'];                                      //`` year(4) DEFAULT NULL,
			  $this->occupation = $signInUser[0]['occupation'];                                      //`` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->preffered_style = $signInUser[0]['preffered_style'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->post_look_agree = $signInUser[0]['post_look_agree'];                                      //`` tinyint(1) NOT NULL,
			  $this->plus_blogger = $signInUser[0]['plus_blogger'];                                      //`` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
			  $this->country = $signInUser[0]['country'];                                      //`` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->state_ = $signInUser[0]['state_'];                                      //`` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->city = $signInUser[0]['city'];                                      //`` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->zip = $signInUser[0]['zip'];                                      //`` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->blog_name = $signInUser[0]['blogdom'];                                      //`` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
              $this->blogdom = $signInUser[0]['blogurl'];
              $this->aboutme = $signInUser[0]['aboutme'];                              //`` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->ispicset = $signInUser[0]['ispicset'];                                      //`` int(11) DEFAULT '0',
			  $this->fbid = $signInUser[0]['fbid'];                                      //`` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->fb_all_freinds = $signInUser[0]['fb_all_freinds'];                                      //`` text COLLATE utf8_unicode_ci NOT NULL,
			  $this->fb_freinds_on_fb = $signInUser[0]['fb_freinds_on_fb'];                                      //`` text COLLATE utf8_unicode_ci NOT NULL,
			  $this->fb_freinds_on_fs = $signInUser[0]['fb_freinds_on_fs'];                                      //`` text COLLATE utf8_unicode_ci NOT NULL,
			  $this->twid = $signInUser[0]['twid'];                                      //`` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
			  $this->isVal = $signInUser[0]['isVal'];                                      //`` int(11) NOT NULL DEFAULT '0',
			  $this->tlog = $signInUser[0]['tlog'];                                      //`` bigint(25) NOT NULL,
			  $this->iral = $signInUser[0]['iral'];                                      //`` int(11) NOT NULL,
			  $this->idal = $signInUser[0]['idal'];                                      //`` int(11) NOT NULL,
			  $this->ifal = $signInUser[0]['ifal'];                                      //`` int(11) NOT NULL,
			  $this->ifam = $signInUser[0]['ifam'];                                      //`` int(11) NOT NULL,
			  $this->icoal = $signInUser[0]['icoal'];                                      //`` int(11) NOT NULL,
			  $this->icoa = $signInUser[0]['icoab'];                                      //`` int(11) NOT NULL,
			  $this->sf = $signInUser[0]['sf'];                                      //`` int(11) NOT NULL,
			  $this->coml = $signInUser[0]['coml'];                                      //`` int(11) NOT NULL,
			  $this->combp = $signInUser[0]['combp'];                                      //`` int(11) NOT NULL,
			  $this->rtmc = $signInUser[0]['rtmc'];                                      //`` int(11) NOT NULL,
			  $this->smnlpbpif = $signInUser[0]['smnlpbpif'];                                      //`` int(11) NOT NULL,
			  $this->tpercentage = $signInUser[0]['tpercentage'];                                      //`` int(25) NOT NULL,
			  $this->tlooks = $signInUser[0]['tlooks'];                                      //`` int(25) NOT NULL,
			  $this->tarticle = $signInUser[0]['tarticle'];                                      //`` int(25) NOT NULL,
			  $this->tmedia = $signInUser[0]['tmedia'];                                      //`` int(25) NOT NULL,
			  $this->tfollower = $signInUser[0]['tfollower'];                                      //`` int(25) NOT NULL,
			  $this->tfollowing = $signInUser[0]['tfollowing'];                             //`` int(25) NOT NULL,
			  $this->trating = $signInUser[0]['trating'];                                      //`` int(25) NOT NULL,
			  $this->tview = $signInUser[0]['tview'];                                      //`` int(25) NOT NULL,
			  $this->tpercentage_article = $signInUser[0]['tpercentage_article'];                                      //`` int(25) NOT NULL,
			  $this->tpercentage_look = $signInUser[0]['tpercentage_look'];                                      //`` int(25) NOT NULL,
			  $this->tpercentage_media = $signInUser[0]['tpercentage_media'];                                      //`` int(25) NOT NULL,
			  $this->trating_article = $signInUser[0]['trating_article'];                                      //`` int(25) NOT NULL,
			  $this->trating_look = $signInUser[0]['trating_look'];                                      //`` int(25) NOT NULL,
			  $this->trating_media = $signInUser[0]['trating_media'];                                      //`` int(25) NOT NULL,
			  $this->work_at = $signInUser[0]['work_at'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->skill = $signInUser[0]['skill'];                                      //`` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
			  $this->studied_at = $signInUser[0]['studied_at'];                                      //`` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  $this->studied_with = $signInUser[0]['studied_with'];                                      //`` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
			  $this->studied_graduate_date = $signInUser[0]['studied_graduate_date'];                                      //`` year(4) NOT NULL,
			  $this->url_facebook = $signInUser[0]['url_facebook'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_twitter = $signInUser[0]['url_twitter'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_pinterest = $signInUser[0]['url_pinterest'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_instagram = $signInUser[0]['url_instagram'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_tumblr = $signInUser[0]['url_tumblr'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_web = $signInUser[0]['url_web'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->url_google_plus = $signInUser[0]['url_google_plus'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->identity_login = $signInUser[0]['identity_login'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->identity_username = $signInUser[0]['identity_username'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->identity_email = $signInUser[0]['identity_email'];                                      //`` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			  $this->identity_generated_code = $signInUser[0]['identity_generated_code'];                                      //`` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
			  $this->status = $signInUser[0]['status'];                                      //`` int(1) NOT NULL,
			  $this->logtime = $signInUser[0]['logtime'];                                      //`` datetime NOT NULL,
			  $this->logstat = $signInUser[0]['logstat'];                                      //`` tinyint(4) NOT NULL,
			  $this->datejoined = $signInUser[0]['datejoined'];                                      //`` date NOT NULL,  
			  $this->mppno  = $this->member_profile_pic_query( array('mno'=>$this->mno , 'type'=>'get-latest-mppno' ) ); 
			  $this->mppno1  = $this->mppno;

		}



		public function getUserInfo($mno, $get) {
			 $uinfo = select_v3('fs_members', $get, 'mno = ' . $mno);   
			 return $uinfo[0][$get];  
		}
		public function notes( ) {

			/* 
			 	$_SESSION['profile_tab_query_member_orderby']  = > use in the profile tab in the admin area for the subtab when clicked the  < 1 2 3 4 5 6 > it must has the same order by 
			 	$_SESSION['profile_tab_query_member_like']     = > use in the profile tab in the admin area for the subtab when clicked the  < 1 2 3 4 5 6 > it must has the same order by 
			 	$_SESSION['profile_tab_query_member_sub']      = > use in the profile tab in the admin area for the subtab when clicked the  < 1 2 3 4 5 6 > it must has the same order by 
			*/ 

			 	

		}
		public function initialize (  ) {  
			$this->attribute['disable_dropdowns'] = 'visibility:hidden';
			$this->attribute['url_extention']     = 'test.';   

			/*  
			*	used for the profile and timeline upload which is to auto resize the image when the with 
			*	will exceed the max width allowed 
			*/ 
				$_SESSION['width_crop_size_limit']   = 1025;  



			// $_SESSION['show_page'] = array('header');
			// $_SESSION['hide_page'] = array('header','footer');
		}
		public function fs_notifiation( $mno ) { 
			if ( !empty( $_SESSION['modal_posted'] ) ) :   
 				$this->send_notification_to_follower( $mno ); 
 				unset($_SESSION['modal_posted']);
			endif; 
		}
		public function message( $msg1 ,  $status , $msg2 ) {  


			if ( $msg1 == null ) {
				$msg1 = 'Congrats';
			}
			if ( $status == true ) {
				$style = 'color:green;'; 
				$s = 'SUCCESSFULLY';
			} 
			else{ 
				$style = 'color:red;'; 
				$s = 'FAILED';
			}
			
			echo "<br>$msg1 <span style='$style' >$s</span> $msg2<br>"; 
		} 
		public function header_show_when_account_not_verified( $mno ) { 
		 

			// 			success colors green: 
			// 		background-color: #9dd29b; 
			//  		color: #3b7f37; 
			// error colors red: 
			// 		background-color: #fde7de; 
			//  		color: #b32727; 

			// echo " $mno ";

            //disable this because thei is updated to ne design but same function
            if(false) {
                if ( $mno != 136 ) {
                    $mi = $this->get_specific_member_info( $mno );
                    if ( $mi[0]['status'] == 0) {
                        echo "
                            <div style='border:1px solid none; width:100%;   background-color:#9dd29b; color: #b32727;padding:10px;font-family:arial;   '>
                                <center>  Please Verifiy your email to remove this message </center>
                            </div>
                        ";
                    }
                }
            }



		}  
		public function init_path( ) {  
			$this->login_path_page = 'fs_folders/login/pages';
            // $this->login_path_page_welcome = 'fs_folders/login/pages/welcome';

		} 
		public function jQuery_text_processing( $containerid='process-container' , $text='initializing...' ) {  
			?>	 
				<script type="text/javascript"> 
					var text = '<?php echo $text; ?>';
					var id = '<?php echo $containerid;  ?>'; 
					document.getElementById(id).innerHTML = text; 
				</script> 
			<?php  
		} 
		public function set_login_cockie( ) {  
			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 ); 
 			$this->mno       =  $this->get_cookie( 'mno' , 136 );   
		} 
		public function clean_memcache( ) {
			clearstatcache(); 
		}
		public function print_ajax_response_container( $style='display:none' ) {

			echo "   
				<center>
					<div  style='$style;position:absolute' onclick=\"$('#fs-general-ajax-response').text('')\" > 
						close 
					</div>
					<div id='fs-general-ajax-response' style='width: 90%; color: rgb(255, 255, 255); position: absolute; background-color: rgb(0, 0, 0); z-index: 200; visibility: visible; overflow-y: auto; $style' > 
		 				 dafdfsdf
		 			</div>
	 			</center> 
 			"; 
 			?> 
 				<script type="text/javascript">

	 				function close_response( ) {
						$('#fs-general-ajax-response').css('display','none');
	 				}

 				</script> 
 			<?php 
		}
		public function css( ) { ?> 
			<style type="text/css">
				#popUp-background{ 
					display: none;   
					position:fixed;   
					z-index: 106;   
					width:100%;   
					height: 100%; 
					background-color: rgba(000,000,000,0.8); 
				}
				.red{
					color: red;
				}
				.green{
					color: green;
				} 
			</style><?php 
		}
		public function date_difference()  {  
			$date_time = '';  
		        $this->today  = mktime(0,0,0,date("m"),date("d")-1,date("Y"));
			    $this->today  = date("Y-m-d", $this->today);  
			 $this->last_week = mktime(0,0,0,date("m"),date("d")-8,date("Y"));
			 $this->last_week = date("Y-m-d", $this->last_week); 
			$this->last_month = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
			$this->last_month = date("Y-m-d", $this->last_month);
			 $this->last_year = mktime(0,0,0,date("m"),date("d"),date("Y")-1);
			 $this->last_year = date("Y-m-d", $this->last_year); 
			$this->date_time  = date("Y-m-d H:i:s"); 

			$this->date_dif = array(  
			        'today' => $this->today,      
			        // 'today' => '2013-03-28',   
		        'last_week' => $this->last_week,    
			   'last_month' => $this->last_month, 
			    'last_year' => $this->last_year,
			    'date_time' => $date_time, 
			    'month_firstday'=>date("Y-m")."-0 00:00:00"
			);
			return $this->date_dif;
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
		public function test() { 

			echo "test";
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

		public function get_all_user( $limit=null ) {
			$mem = "";
			
			if ($limit==null) 
			{
				$limit = '*';
			}
			$mem=selectV1(
				'mno,firstname,lastname,middlename,occupation,country,city,aboutme,datejoined',
				'fs_members',
				'',
				' order by mno desc',
				"limit $limit"
			);
			return $mem;
		} 

		public function get_all_postedarticle( $limit=null ) {
			$res = "";
			 
			$res=selectV1(
				'*',
				'fs_postedarticles',
				'',
				' order by article_Id desc',
				"limit $limit"
			);
			return $res;
		}
		public function get_all_postedmedia( $limit=null ) {
			$res = "";
			 
			$res=selectV1(
				'*',
				'fs_postedmedia',
				'',
				' order by media_id desc',
				"limit $limit"
			);
			return $res;
		} 
		public function convert_date_format_profile ($date)  { 
			// echo "$date";
 
			$date = explode('-',$date);


			return $date[1].'-'.$date[2].'-'.substr($date[0],2,2);
		}
	
		
		public function auto_detect_path() {   



			#path (display)
				
				#profile pic image

					$this->brands                   = 'fs_folders/images/uploads/brands'; 
					$this->ppic_mem                 = 'fs_folders/images/uploads/members'; 
					$this->ppic_cropped             = 'fs_folders/images/uploads/mem_cropped'; 
					$this->ppic_orginal  		    = 'fs_folders/images/uploads/members/mem_original';
					$this->ppic_profile  		    = 'fs_folders/images/uploads/members/mem_profile';
					$this->ppic_thumbnail		    = 'fs_folders/images/uploads/members/mem_thumnails';  

 				#postedlooks image 

					$this->look_folder              = 'fs_folders/images/uploads/posted looks/original looks uploaded';
					$this->look_folder_cropped      = 'fs_folders/images/uploads/posted looks/cropped'; 
					$this->look_folder_home         = 'fs_folders/images/uploads/posted looks/home';
					$this->look_folder_lookdetails  = 'fs_folders/images/uploads/posted looks/lookdetails';
					$this->look_folder_socialShare  = 'fs_folders/images/uploads/posted looks/socialShare';
					$this->look_folder_thumbnail    = 'fs_folders/images/uploads/posted looks/thumbnail';  

 				#article image 

					$this->article_home             = 'fs_folders/images/uploads/posted articles/home'; 
					$this->article_thumbnail        = 'fs_folders/images/uploads/posted articles/thumbnail'; 
					$this->article_detail           = 'fs_folders/images/uploads/posted articles/detail'; 


				#others
 
					$this->path_icons               = 'fs_folders/images/icons';
					$this->genImgs                  = 'fs_folders/images/genImg/';
					$this->button                   = 'fs_folders/images/buttons'; 
					$this->brand                    = 'fs_folders/images/uploads/brands';  

					$this->profileTimeline_original = 'fs_folders/images/uploads/profiletimeline/profile_timeline_original';
					$this->profileTimeline_cropped  = 'fs_folders/images/uploads/profiletimeline/profile_timeline_cropped';

					$this->profile_timeline_thumbnail  = 'fs_folders/images/uploads/profiletimeline/profile_timeline_thumbnail';
	  
			#unlink (delete)
			 	$this->unlink_look              = "../../../../$this->look_folder";
			 	$this->unlink_look_home         = "../../../../$this->look_folder_home";
			 	$this->unlink_look_lookdetails  = "../../../../$this->look_folder_lookdetails";
			 	$this->unlink_look_thumbnail    = "../../../../$this->look_folder_thumbnail"; 
			 	$this->unlink_look_cropped      = "../../../../$this->look_folder_cropped"; 

			 








				$this->img_attr_source          = 'fs_folders/fs_lookdetails/look_comment_items/img'; 

			#twms contest
				$this->genImgs_twms             = 'fs_folders/images/genImg';


		} 
		public function next_prev_comments($res_len) { 
			$rl = $res_len;
			$i = 1;
			$loopEnd = true;
			echo "<span id='comment_prev'> < </span> ";
			echo "<span id='comment_number'>";
			while ($loopEnd) 
			{
				if ( $rl > 10 ) 
				{
					 $rl -= 10; 
					 $loopEnd = true;
					 echo " [$i] ";
				}
				else 
				{ 
					$loopEnd = false;
					 echo " [$i] ";
				} 
				$i++;
			} 
			echo "</span>";
			echo "<span id='comment_next' > next > </span>";
		}
		public function unflagged_design_auto_hide($infoArray) { 
			$mem=selectV1(
				'*',
				$infoArray['table'],
				array($infoArray['where']=>$infoArray['whereV'])
			);
			
 

			if (!empty($mem))  
			{ 
				#if na flagged na
				$this->flaggedStyle = 'display:block'; 
				$this->notflaggedStyle = 'display:none';  
			}
			else 
			{  
				#wala pa na flagged
				$this->flaggedStyle = 'display:none';  
				$this->notflaggedStyle = 'display:block'; 
			} 
		} 
		public function get_multiple_reply( $plcr_no ) { 	

			echo "delete_multiple_reply( $plcr_no ) ";

			$delr_array[0] = $plcr_no;
			$this->deleting_comment_reply( $plcr_no );
			for ($i=1; $i < 10000000 ; $i++) 
			{ 

				if ( !empty($plcr_no)) 
				{
					// echo "<hr>  plcr_no = $plcr_no <br>";
					$res = $this->get_reply_replied( 'plcr_no' , 'fs_plcm_reply' , $plcr_no );


					print_r($res);
					for ($i=0; $i < count($res) ; $i++) 
					{ 
						$plcr_no = $res[$i]['plcr_no'];	  
						$this->deleting_comment_reply( $plcr_no );
					}
					echo "total solod =".count($res).'<br>';

					if (!empty($plcr_no))
					{
						$delr_array[$i] = $plcr_no;
					}
					else 
					{ 
						$i=10000000;
					} 
				}
				else 
				{ 
					$i=10000000;
				} 
			} 
			return $delr_array;
		} 
		public function get_reply_replied( $select , $tableName , $plcr_no ) { 
			 $res = selectV1(
			 	$select,
			 	$tableName,
			 	array('replied_no'=>$plcr_no) 
			 );

			 return $res;
		}
		public function deleting_comment_reply( $plcrno ) { 
			echo " deleting_comment_reply( $plcrno ) "; 
			$rlike = delete('fs_plcm_rlike',array('plcrno',$plcrno));
			$rflag = delete('fs_plcm_rflag',array('plcrno',$plcrno));
			$reply = delete('fs_plcm_reply',array('plcr_no',$plcrno));
			$rdislike = delete('fs_plcm_rdislike',array('plcrno',$plcrno)); 
			if ($rlike) 
				echo "<br> 1. ) reply like successfully deleted <br> ";
			if ( $rflag ) 
			 	echo " 2. ) reply flagged successfully deleted <br> ";
			if ( $reply ) 
			 	echo " 3. ) replied comment successfully deleted  <br> ";
			if ( $rdislike )
			 	echo " 4. ) reply dislike successfully deleted  <br> "; 
		}
		public function get_total($select,$tableName,$w,$wV) {
			 $res = selectV1(
			 	$select,
			 	$tableName,
			 	array($w=>$wV) 
			 );

			 return count($res);
		}
		public function automatic_insert($tadd) {
			echo " total activty".count($this->get_activity());
			for ($i=0; $i < $tadd ; $i++)  
			{ 
				 
				// echo "lool";
				$all_user = $this->get_all_user();
				$action = array('Posted','Rated');
				$all_llok = $this->get_all_latest_look();
				// echo "Total activity = ".count($all_llok); 
				// print_r($all_llok);
				  insert(
				  		"activity", 
				  		array('mno','action','_table','_table_id','_date'), 
				  		array( $all_user[rand(0, count($all_user))]['mno'],$action[rand(0,1)],'postedlooks' , $all_llok[rand(0,count($all_llok))]['plno'],'2013-08-07 17:39:41'),
				  		'ano'
				  );
			}
		}
		public function insert_invited( $invited_fn=null , $invited_ln=null , $invited_email=null , $invited_wob=null , $invited_occu=null , $invited_style=null , $invited_offer=null){
			$invited_genCode = $this->get_Generated_code();
			$this->date_difference();
			// echo "gENERATED CODE = $invited_genCode";
			  
			$email = selectV1(
			 	'invited_email',
			 	'fs_invited',
			 	array('invited_email'=>$invited_email) 
			 );


			/*
		         echo " $invited_fn , 
						$invited_ln , 
						$invited_email , 
						$invited_wob , 
						$invited_occu , 
						$invited_style , 
						$invited_offer , 
						$invited_genCode , 
						$_SERVER[REMOTE_ADDR] ,  
						$this->date_time  
						";
		*/

			// print_r($email);
			// $checkEmailExist = $email[0]['invited_email'];



			// echo " email $checkEmailExist ";
			if (empty($email))
			{ 
				// echo " email not exist ";
				$scrape_version = 1;
				insert(
					"fs_invited", 
					array( 
						'invited_fn' , 
						'invited_ln' , 
						'invited_email' , 
						'invited_wob' , 
						'invited_occu' , 
						'invited_style', 
						'invited_offer' , 
						'invited_genCode' , 
						'invited_ip' , 
						'invited_date', 
						'scrape_version'
					), 
					array( 
						$invited_fn , 
						$invited_ln , 
						$invited_email , 
						$invited_wob , 
						$invited_occu , 
						$invited_style , 
						$invited_offer , 
						$invited_genCode , 
						$_SERVER["REMOTE_ADDR"] ,  
						$this->date_time,
						$scrape_version 
					),
					'invited_id'
				);
			}
			else 
			{ 
				// echo "email  exist";
			}	
		} 
		public function invite_popUp($response_text , $invited_fn , $page=null ) { 
			if ($response_text) {
				$this->auto_detect_path();	
				// $this->Tpeopl_in_front = count($mem);
				// $this->Tpeopl_in_front += 5034;
				// $this->people_behind_you = rand(50,100); 
				// $invited_fn = 'jesus Erwin Suarez';
                // $Tpeopl_in_front = 100;
                // $people_behind_you = 200;  
 
				$mem=selectV1(
					'invited_id',
					'fs_invited'
				);
				$tinvited = count($mem); 
				$this->Tpeopl_in_front = $tinvited + 700;	 
				$this->people_behind_you = $this->Tpeopl_in_front-700;    
					?> 
						<div id='invite_after_submit'> 
							<div id='invite-popup-response-wrapper' > 
		                        <div id='invite-popup-response-wrapper-body' > 
		                            <center>
		                                <div id='invite-popup-response-wrapper-content'>  
		                                    <div  id='invite-popup-response-wrapper-content-right' > 

		                                        <div id='invite-popup-response-wrapper-content-right-content' >  
		                                            <table border="0" cellspacing="0" cellpadding="0" > 
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title1' > 
		                                                        <!-- <center> -->
		                                                            <span> HELP SPREAD THE WORD  </span>
		                                                        <!-- </center>  -->
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-desc' >  
		                                                        <span>  
		                                                               If you know of anyone who would love to get their place in line next to you, send them an invite  now by clicking the share buttons below.
		                                                        </span>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title2' >  
		                                                        <center>
		                                                            <span> 
		                                                                SHARE  
		                                                            </span>
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-share' >  
		                                                        <center>
		                                                            <table border="0" cellpadding="0" cellspacing="0" > 
		                                                                <tr> 
		                                                                    <td>     
		                                                                        <img title="facebook"  src='<?php echo "$this->genImgs/white-facebook-icon.png"; ?>'    onclick="share_fb_specifi_page( 'http://fashionsponge.com/invite' )"    > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="twitter"  src='<?php echo "$this->genImgs/white-twitter-icon.png"; ?>'     onclick="share_twitter_specifi_page( 'http://fashionsponge.com/invite' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="tubmblr"  src='<?php echo "$this->genImgs/white-tumblr-icon.png"; ?>'      onclick="share_tumblr()" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <a href="https://plus.google.com/share?url={http://fashionsponge.com/invite}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		                                                                            <img title="good plus"  src='<?php echo "$this->genImgs/white-google-plus-icon.png"; ?>' > 
		                                                                        </a>
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="e-mail"  src='<?php echo "$this->genImgs/white-email-icon.png"; ?>'       onclick="share_gmail()" > 
		                                                                    </td>  
		                                                            </table> 
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td> 
		                                                        </center> 
		                                                        	<?php  
		                                                        		if ( $page == 'invite' ) {
		                                                        			echo "
		                                                        				<a href='/'>
		                                                        					<input id='invite-popup-done' type='submit' value='DONE'  />
		                                                        				</a>
		                                                        			";	
		                                                        		}else{
		                                                        			echo "<input id='invite-popup-done' type='submit' value='DONE'  />";	
		                                                        		} 
		                                                        	?> 
		                                                        <center>
		                                                    </td>
		                                            </table> 
		                                        </div> 
		                                    </div> 
		                                    <div id='invite-popup-response-wrapper-content-left' >
		                                        <br><br>
		                                        <p> 
		                                             Hi<span id='fn' > <?php echo ucfirst($invited_fn); ?></span>,  
		                                        </p>  
		                                        <p> 
		                                            Thank you for signing up for an invite. 
		                                        </p> 
		                                        <p> 
		                                            Please go and check your email for the welcome message I just sent you. If you don't see it in
		                                            your inbox check your spam folder.
		                                        </p>

		                                        <p> 
		                                            by the way There are <span id='bold_red'> <?php echo $_SESSION['Tpeopl_in_front']; ?> </span> 
		                                            people ahead of you and <span id='bold_red'> <?php echo $_SESSION['people_behind_you']; ?> </span> people behind you. Once we start sending out 
		                                            invitations to join, you will receive your invite in the order you signed up.
		                                        </p>  
		                                        <p>
		                                            Thanks, 
		                                        </p>  
		                                        <p>
		                                            <span>
		                                                Salvador - Founder & Creative Director <br>
		                                                "Don't Just Dress. Dress Well.&#153;" 
		                                            </span>
		                                        </p>
		                                        <div id='inviteFriendsC' > 
		                                            <div id='invite_ur_friends' >  
		                                                <span>
		                                                    <!-- INVITE YOUR FRIENDS -->
		                                                </span>
		                                            </div>  
		                                        </div> 
		                                    </div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                    <script type="text/javascript"> 
		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit').fadeOut('normal');
		                    		})
		                    	}) 
		                    </script>

		                    <style type="text/css"> 
		                        /* MisoRegular */
		                        /* MisoLight */
		                        /* MisoBold */  
		                        body { padding: 0px; margin:0px;  }
		                        #invite_after_submit {  position:fixed;   z-index: 106;   width:100%;  height: 1500px;  background-color: rgba(000,000,000,0.8);   }
		                        #invite-popup-response-wrapper{ /*margin-top: 200px;*/  /*border: 1px solid red;*/  text-transform:uppercase; font-family: 'arial'; font-size: 12px; font-weight: bold;  }
		                            #invite-popup-response-wrapper-body { margin: auto;  background-color: #fff; width: 980px; border: 8px solid #1a386a; padding-top:20px;padding-bottom:20px;   }
		                                #invite-popup-response-wrapper-content {  padding: 20px;  text-align: left; background-color: #f5f4f1; width: 900px; }
		                                    #invite-popup-response-wrapper-content img { cursor: pointer; } 
		                                    #invite-popup-response-wrapper-content-left { /*border: 1px solid #000;*/ width: 460px; height: 370px;  color: #1a386a; font-size: 13px;   }
		                                        #invite-popup-response-wrapper-content-left p { padding-bottom: 10px; }
		                                        #bold_red {  color: #b32727; }
		                                    #invite-popup-response-wrapper-content-right {  -moz-box-shadow:  5px 5px 0px #ccc; -webkit-box-shadow: 5px 5px 0px #ccc; box-shadow: 5px 5px 0px #ccc; /*border: 1px solid #000;*/ float: right; width:400px; /*height: 200px; */ padding-right: 20px; }
		                                   #invite-popup-response-wrapper-content-right span { color: #fff; } 
		                                    #invite-popup-response-wrapper-content-right-content { width:390px;padding-left: 15px;    padding-right: 15px;padding-top: 30px;padding-bottom: 30px; border: 1px solid #000; background-color: #1a386a; /* height: 200px; width: 200px;*/ }
		                                    #invite-popup-response-wrapper-content-right-content-title1 { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-title1 span { font-size: 48px; font-family: 'MisoRegular' }
		                                     #invite-popup-response-wrapper-content-right-content-desc { padding-bottom: 30px; }
		                                        #invite-popup-response-wrapper-content-right-content-desc span {  }
		                                    #invite-popup-response-wrapper-content-right-content-title2 { padding-bottom: 10px; }
		                                        #invite-popup-response-wrapper-content-right-content-title2 span { font-size: 30px; font-family: 'MisoRegular'   }
		                                    #invite-popup-response-wrapper-content-right-content-share { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-share td { padding-left: 15px;}
		                                        #invite-popup-response-wrapper-content-right-content-share  img { /*border: 1px solid #000;*/ } 
		                                        #invite-popup-done { border:none; cursor: pointer;  background: url("fs_folders/images/attr/submit.png") no-repeat scroll 0 0 transparent;   font-weight: bold; background-size: 100% auto; padding-bottom: 5px; position: relative;  z-index: 100;  width: 97.5%; height: 35px;     border-radius: 5px;  color: #ffffff;  font-weight: bold;  font-size: 11px;  font-family: 'arial';  letter-spacing: 2px;   margin-left: -2px; } 
		                    </style> 
						</div> 
					<?php
			}
		} 

		public function signup_popUp_responnsive($response_text , $invited_fn , $page=null ) { 
			if ($response_text) {
				$this->auto_detect_path();	
				// $this->Tpeopl_in_front = count($mem);
				// $this->Tpeopl_in_front += 5034;
				// $this->people_behind_you = rand(50,100); 
				// $invited_fn = 'jesus Erwin Suarez';
                // $Tpeopl_in_front = 100;
                // $people_behind_you = 200;   
				$mem=selectV1(
					'invited_id',
					'fs_invited'
				);
				$tinvited = count($mem); 
				$this->Tpeopl_in_front = $tinvited + 700;	 
				$this->people_behind_you = $this->Tpeopl_in_front-700;    
				$this->init_peoplebehindyou_peopleaheadofyou( );  
					?> 
					<div id="invite_after_submit" style="display:none">
							<div id="invite-popup-response-wrapper" > 
		                        <div id="invite-popup-response-wrapper-body" class="container"> 
		                            <center>
		                                <div id="invite-popup-response-wrapper-content">   
											<div class="row">
												<div id="sub-container">  
												 	<div class="col-md-6" id="col1">  
				                                       	<br><br><br><br><br><br><br>
				                                        <p> 
				                                             Hi<span id="fn"></span>,  
				                                        </p>   
				                                        <p> 
				                                            Thank you for signing up for an invite.
				                                        </p>

				                                        <p> 
				                                        	A email was just sent to you. If you don't see it in your inbox, check your spam folder.

				                                        </p>  
				                                        <p>
				                                            Thanks, 
				                                        </p>  
				                                        <p>
				                                            <span> 
				                                                Mauricio | Founder &amp; Creative Director
				                                            </span>
				                                        </p> 
				                                        <div id="inviteFriendsC"> 
				                                            <div id="invite_ur_friends">  
				                                                <span>
				                                                    <!-- INVITE YOUR FRIENDS -->
				                                                </span>
				                                            </div>  
				                                        </div>  
				                                        <br><br><br><br><br><br><br>
		    										</div>
		    										<div class="col-md-6" id="col2">   
				                                        <div>  
				                                            <table border="0" cellspacing="0" cellpadding="0"> 
				                                                <tbody><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-title1"> 
				                                                        <!-- <center> -->
				                                                            <span>HELP SPREAD THE WORD</span>
				                                                        <!-- </center>  -->
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-desc">  
				                                                        <span style="font-size:15px;">  
				                                                            If you know of any great fashion or lifestyle bloggers who would love to get their place in line next to you, send them an invite by clicking one of the share buttons below.
				                                                        </span>
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-title2">  
				                                                        <center>
				                                                            <span> 
				                                                                SHARE  
				                                                            </span>
				                                                        </center> 
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-share">   
				                                                    	
				                                                    	<?php   
					                                                    	$modal['table_name'] = "signup";
																			$modal['table_id']   = ""; 
																			$modal['about']      = "";
																			$modal['title']      = "";
																			$modal['name']       = "";
																			$modal['picture']    = "";
																			$modal['link']       = ""; 
																		    $modal['page']       = "";   
					                                                    ?>  
																	  	<div class="bs-example"> 
																  			<div class="btn-group" role="group" aria-label="First group">
																				<center>										       
										 											<button type="button" class="btn btn-lg btn-primary"><img title="facebook" src="fs_folders/images/genImg//white-facebook-icon.png" onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','facebook','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" /> </button> 																		        
																			        <button type="button" class="btn btn-lg btn-primary"><img title="twitter" src="fs_folders/images/genImg//white-twitter-icon.png"   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','twitter','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" />  </button> 																		        
																			        <button type="button" class="btn btn-lg btn-primary"><img title="tubmblr" src="fs_folders/images/genImg//white-tumblr-icon.png"    onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','tumblr','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" />  </button> 																	         
																			        <button type="button" class="btn btn-lg btn-primary"><a href="#" 																   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','google_plus','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ><img  style="width:20px" src="fs_folders/images/genImg//white-google-plus-icon.png"   title = "google+" /> </a> </button>   
																			        <button type="button" class="btn btn-lg btn-primary"><img title="e-mail" src="fs_folders/images/genImg//white-email-icon.png"      onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','gmail','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  > </button>
																		     		</a>
   																				</center>
  																			</div>
  																	
																	</a></div></td> 
				                                                </tr><tr> 
				                                                    <td id="signup-popup-done-button">  
				                                                        	<a href="/"> <!-- <input id="invite-popup-done" type="submit" value="DONE"> !--> <button type="button" class="btn btn-lg btn-danger" value="">DONE</button> </a>   
				                                               	 	</td>
				                                            	</tr>
				                                            	</tbody>
				                                        	</table> 
				                                        </div>  
													</div> 
												</div> 
										 	</div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                      <script type="text/javascript"> 
		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit').fadeOut('normal');
		                    		})
		                    	}) 
		                    </script> 
						</div>
					<?php
			}
		} 
		public function signup_popUp_responnsive1($response_text , $invited_fn , $page=null ) { 
			if ($response_text) {
				$this->auto_detect_path();	
				// $this->Tpeopl_in_front = count($mem);
				// $this->Tpeopl_in_front += 5034;
				// $this->people_behind_you = rand(50,100); 
				// $invited_fn = 'jesus Erwin Suarez';
                // $Tpeopl_in_front = 100;
                // $people_behind_you = 200;   
				$mem=selectV1(
					'invited_id',
					'fs_invited'
				);
				$tinvited = count($mem); 
				$this->Tpeopl_in_front = $tinvited + 700;	 
				$this->people_behind_you = $this->Tpeopl_in_front-700;    
				$this->init_peoplebehindyou_peopleaheadofyou( );  
					?> 
					<div id="invite_after_submit" style="display:none"> 
							<div id="invite-popup-response-wrapper" > 
		                        <div id="invite-popup-response-wrapper-body" class="container"> 
		                            <center>
		                                <div id="invite-popup-response-wrapper-content">   
											<div class="row">
												<div id="sub-container">  
												 	<div class="col-md-6" id="col1">  
				                                         
 

														<p> 
				                                             Hi<span><?php echo $invited_fn ; ?></span>,  
				                                        </p>  

				                                        <p>
															When it comes to online communities, I know you have a lot of choices, so I want to personally thank you for accepting your invite. 
														</p>

														<p>
															Were days away from launching our private beta. Our designers and developers are working hard to get you a board as soon as possible, ensuring that you have a great online experience. Once we start allowing people to use the site, you will receive your invite in the order you signed up.
														</p>
														<p style="color:#1a386a" >
															<b>HAVE ANY QUESTIONS OR SUGGESTIONS?</b>
														</p>
														<p>
															If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback, but most importantly I love connecting with people!
														</p>
														<p>
															<b>THANK YOU AGAIN FOR YOUR SUPPORT! </b>
														</p>
														<p>
															Mauricio | Founder & Creative Director<br>
															<span style="color:#696969;">Mauricio@fashionsponge.com </span>
														</p>

														

























				                                        <div id="inviteFriendsC"> 
				                                            <div id="invite_ur_friends">  
				                                                <span>
				                                                    <!-- INVITE YOUR FRIENDS -->
				                                                </span>
				                                            </div>  
				                                        </div>  
		    										</div>
		    										<div class="col-md-6" id="col2">   
				                                        <div>  
				                                            <table border="0" cellspacing="0" cellpadding="0"> 
				                                                <tbody><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-title1"> 
				                                                        <!-- <center> -->
				                                                            <span> HELP SPREAD THE WORD  </span>
				                                                        <!-- </center>  -->
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-desc">  
				                                                        <span style="font-size:15px;">  
				                                                               If you know of any great fashion or lifestyle bloggers who would love to get their place in line next to you, send them an invite by clicking one of the share buttons below.
				                                                        </span>
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-title2">  
				                                                        <center>
				                                                            <span> 
				                                                                SHARE  
				                                                            </span>
				                                                        </center> 
				                                                    </td>
				                                                </tr><tr> 
				                                                    <td id="invite-popup-response-wrapper-content-right-content-share">   
				                                                    	
				                                                    	<?php   
					                                                    	$modal['table_name'] = "signup";
																			$modal['table_id']   = ""; 
																			$modal['about']      = "";
																			$modal['title']      = "";
																			$modal['name']       = "";
																			$modal['picture']    = "";
																			$modal['link']       = ""; 
																		    $modal['page']       = "";   
					                                                    ?>  
																	  	<div class="bs-example"> 
																  			<div class="btn-group" role="group" aria-label="First group">
																				<center>										       
										 											<button type="button" class="btn btn-lg btn-primary"><img title="facebook" src="fs_folders/images/genImg//white-facebook-icon.png" onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','facebook','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" /> </button> 																		        
																			        <button type="button" class="btn btn-lg btn-primary"><img title="twitter" src="fs_folders/images/genImg//white-twitter-icon.png"   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','twitter','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" />  </button> 																		        
																			        <button type="button" class="btn btn-lg btn-primary"><img title="tubmblr" src="fs_folders/images/genImg//white-tumblr-icon.png"    onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','tumblr','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" />  </button> 																	         
																			        <button type="button" class="btn btn-lg btn-primary"><a href="#" 																   onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','google_plus','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )" ><img  style="width:20px" src="fs_folders/images/genImg//white-google-plus-icon.png"   title = "google+" /> </a> </button>   
																			        <button type="button" class="btn btn-lg btn-primary"><img title="e-mail" src="fs_folders/images/genImg//white-email-icon.png"      onclick="share( '<?php echo $modal['table_name']; ?>','<?php echo $modal['table_id']; ?>','gmail','<?php echo $modal['page']; ?>','<?php echo $modal['about']; ?>','<?php echo $modal['title']; ?>','<?php echo $modal['name']; ?>','<?php echo $modal['picture']; ?>','<?php echo $modal['link']; ?>' )"  > </button>
																		     		</a>
   																				</center>
  																			</div>
  																	
																	</a></div></td> 
				                                                </tr><tr> 
				                                                    <td id="signup-popup-done-button">  
				                                                        	<a href="/"> <!-- <input id="invite-popup-done" type="submit" value="DONE"> !--> <button type="button" class="btn btn-lg btn-danger" value="">DONE</button> </a>   
				                                               	 	</td>
				                                            	</tr>
				                                            	</tbody>
				                                        	</table> 
				                                        </div>  
													</div> 
												</div> 
										 	</div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                      <script type="text/javascript"> 
		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit').fadeOut('normal');
		                    		})
		                    	}) 
		                    </script> 
						</div>
					<?php
			}
		}  
		public function signup_popUp($response_text , $invited_fn , $page=null ) { 
			if ($response_text) {
				$this->auto_detect_path();	
				// $this->Tpeopl_in_front = count($mem);
				// $this->Tpeopl_in_front += 5034;
				// $this->people_behind_you = rand(50,100); 
				// $invited_fn = 'jesus Erwin Suarez';
                // $Tpeopl_in_front = 100;
                // $people_behind_you = 200;   
				$mem=selectV1(
					'invited_id',
					'fs_invited'
				);
				$tinvited = count($mem); 
				$this->Tpeopl_in_front = $tinvited + 700;	 
				$this->people_behind_you = $this->Tpeopl_in_front-700;    
				$this->init_peoplebehindyou_peopleaheadofyou( );  
					?> 
						<div id='invite_after_submit' style="display:none" > 
							<div id='invite-popup-response-wrapper' > 
		                        <div id='invite-popup-response-wrapper-body' > 
		                            <center>
		                                <div id='invite-popup-response-wrapper-content'>  
		                                    <div  id='invite-popup-response-wrapper-content-right' > 

		                                        <div id='invite-popup-response-wrapper-content-right-content' >  
		                                            <table border="0" cellspacing="0" cellpadding="0" > 
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title1' > 
		                                                        <!-- <center> -->
		                                                            <span> HELP SPREAD THE WORD  </span>
		                                                        <!-- </center>  -->
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-desc' >  
		                                                        <span style='font-size:14px;' >  
		                                                               If you know of anyone who would love to get their place in line next to you, send them an invite  now by clicking the share buttons below.
		                                                        </span>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title2' >  
		                                                        <center>
		                                                            <span> 
		                                                                SHARE  
		                                                            </span>
		                                                        </center> 
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-share' >  
		                                                        <center>
		                                                            <table border="0" cellpadding="0" cellspacing="0" > 
		                                                                <tr> 
		                                                                    <td>     
		                                                                        <img title="facebook"  src='<?php echo "$this->genImgs/white-facebook-icon.png"; ?>'    onclick="share_fb_specifi_page( 'http://fashionsponge.com/signup' )"    > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="twitter"  src='<?php echo "$this->genImgs/white-twitter-icon.png"; ?>'     onclick="share_twitter_specifi_page( 'http://fashionsponge.com/signup' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="tubmblr"  src='<?php echo "$this->genImgs/white-tumblr-icon.png"; ?>'      onclick="share_tumblr( 'www.fashionsponge.com/signup' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <a href="https://plus.google.com/share?url={http://fashionsponge.com/signup}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		                                                                            <img title="good plus"  src='<?php echo "$this->genImgs/white-google-plus-icon.png"; ?>' > 
		                                                                        </a>
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="e-mail"  src='<?php echo "$this->genImgs/white-email-icon.png"; ?>'       onclick="share_gmail('www.fashionsponge.com/signup')" > 
		                                                                    </td>  
		                                                            </table> 
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td> 
		                                                        </center> 
		                                                        	<?php  
		                                                        		if ( $page == 'invite' ) {
		                                                        			echo "
		                                                        				<a href='/'>
		                                                        					$page
		                                                        					<input id='invite-popup-done' type='submit' value='DONE'  />
		                                                        				</a>
		                                                        			";	
		                                                        		}else{ 
		                                                        				echo " <a href='/'> 
		                                                        					<input id='invite-popup-done' type='submit' value='DONE'  />
		                                                        				</a> ";	
		                                                        		} 
		                                                        	?> 
		                                                        <center>
		                                                    </td>
		                                            </table> 
		                                        </div> 
		                                    </div> 
		                                    <div id='invite-popup-response-wrapper-content-left' >
		                                        <br><br>
		                                        <p> 
		                                             Hi<span id='fn' > <?php echo ucfirst($invited_fn); ?></span>,  
		                                        </p>  
		                                        <p> 
		                                           THANK YOU FOR SIGNING UP FOR AN INVITE. 
		                                        </p> 
		                                        <p> 
		                                            I JUST SENT YOU AN EMAIL SO PLEASE CHECK FOR YOUR WELCOME MESSAGE. IF YOU DON'T SEE IT IN YOUR INBOX, CHECK YOUR SPAM FOLDER.
		                                        </p>

		                                        <p> 
		                                        	<!-- BY THE WAY <span id='bold_red'> <?php echo $_SESSION['Tpeopl_in_front']; ?> </span>  PEOPLE SIGNED UP BEFORE YOU AND 
		                                        	<span id='bold_red'> <?php echo $_SESSION['people_behind_you']; ?> </span>  PEOPLE SIGNED UP AFTER YOU.  -->
		                                        	ONCE WE START SENDING OUT INVITATIONS TO JOIN, YOU WILL RECEIVE YOUR INVITE IN THE ORDER YOU SIGNED UP.
 
		                                        </p>  
		                                        <p>
		                                            THANKS, 
		                                        </p>  
		                                        <p>
		                                            <span>
		                                                MAURICIO - FOUNDER & CREATIVE DIRECTOR  <br>
		                                                <!-- "DON'T JUST DRESS. DRESS WELL. &#153;"  -->
		                                            </span>
		                                        </p>
		                                        <div id='inviteFriendsC' > 
		                                            <div id='invite_ur_friends' >  
		                                                <span>
		                                                    <!-- INVITE YOUR FRIENDS -->
		                                                </span>
		                                            </div>  
		                                        </div> 
		                                    </div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                    <script type="text/javascript"> 
		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit').fadeOut('normal');
		                    		})
		                    	}) 
		                    </script> 
		                    <style type="text/css"> 
		                        /* MisoRegular */
		                        /* MisoLight */
		                        /* MisoBold */  
		                        body { padding: 0px; margin:0px;  }
		                        #invite_after_submit {  position:fixed;   z-index: 106;   width:100%;  height: 100%;  background-color: rgba(000,000,000,0.8);   }
		                        #invite-popup-response-wrapper{ /*margin-top: 200px;*/  /*border: 1px solid red;*/  text-transform:uppercase; font-family: 'arial'; font-size: 12px; font-weight: bold;  }
		                            #invite-popup-response-wrapper-body { margin: auto;  background-color: #fff; width: 980px; border: 8px solid #1a386a; padding-top:20px;padding-bottom:20px;   }
		                                #invite-popup-response-wrapper-content {  padding: 20px;  text-align: left; background-color: #f5f4f1; width: 900px; }
		                                    #invite-popup-response-wrapper-content img { cursor: pointer; } 
		                                    #invite-popup-response-wrapper-content-left { /*border: 1px solid #000;*/ width: 460px; height: 370px;  color: #1a386a; font-size: 13px;   }
		                                        #invite-popup-response-wrapper-content-left p { padding-bottom: 10px; }
		                                        #bold_red {  color: #b32727; }
		                                    #invite-popup-response-wrapper-content-right {  -moz-box-shadow:  5px 5px 0px #ccc; -webkit-box-shadow: 5px 5px 0px #ccc; box-shadow: 5px 5px 0px #ccc; /*border: 1px solid #000;*/ float: right; width:400px; /*height: 200px; */ padding-right: 20px; }
		                                   #invite-popup-response-wrapper-content-right span { color: #fff; } 
		                                    #invite-popup-response-wrapper-content-right-content { width:390px;padding-left: 15px;    padding-right: 15px;padding-top: 30px;padding-bottom: 30px; border: 1px solid #000; background-color: #1a386a; /* height: 200px; width: 200px;*/ }
		                                    #invite-popup-response-wrapper-content-right-content-title1 { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-title1 span { font-size: 48px; font-family: 'MisoLight'; font-weight: normal }
		                                     #invite-popup-response-wrapper-content-right-content-desc { padding-bottom: 30px; }
		                                        #invite-popup-response-wrapper-content-right-content-desc span {  }
		                                    #invite-popup-response-wrapper-content-right-content-title2 { padding-bottom: 10px; }
		                                        #invite-popup-response-wrapper-content-right-content-title2 span { font-size: 30px; font-family: 'MisoRegular'   }
		                                    #invite-popup-response-wrapper-content-right-content-share { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-share td { padding-left: 15px;}
		                                        #invite-popup-response-wrapper-content-right-content-share  img { /*border: 1px solid #000;*/ } 
		                                        #invite-popup-done { border:none; cursor: pointer;  background: url("fs_folders/images/attr/submit.png") no-repeat scroll 0 0 transparent;   font-weight: bold; background-size: 100% auto; padding-bottom: 5px; position: relative;  z-index: 100;  width: 97.5%; height: 35px;     border-radius: 5px;  color: #ffffff;  font-weight: bold;  font-size: 11px;  font-family: 'arial';  letter-spacing: 2px;   margin-left: -2px; } 
		                    </style> 
						</div> 
					<?php
			}
		}   
		public function invite_popUp_newsletter( ) {  
				$this->auto_detect_path();	 
					?> 
						<div id='invite_after_submit1' style="display:none" > 
							<div id='invite-popup-response-wrapper1' > 
		                        <div id='invite-popup-response-wrapper-body' > 
		                            <center>
		                                <div id='invite-popup-response-wrapper-content'>  
		                                    <div  id='invite-popup-response-wrapper-content-right' >  
		                                        <div id='invite-popup-response-wrapper-content-right-content' >  
		                                            <table border="0" cellspacing="0" cellpadding="0" > 
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title1' > 
		                                                        <!-- <center> -->
		                                                            <span> HELP SPREAD THE WORD  </span>
		                                                        <!-- </center>  -->
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-desc' >  
		                                                        <span>  
		                                                               If you know of anyone who would love to get their place in line next to you, send them an invite  now by clicking the share buttons below.
		                                                        </span>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title2' >  
		                                                        <center>
		                                                            <span> 
		                                                                SHARE 
		                                                            </span>
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-share' >  
		                                                        <center>
		                                                            <table border="0" cellpadding="0" cellspacing="0" > 
		                                                                <tr> 
		                                                                    <td>     
		                                                                        <img title="facebook"  src='<?php echo "$this->genImgs/white-facebook-icon.png"; ?>'    onclick="share_fb_specifi_page( 'http://fashionsponge.com/signup' )"    > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="twitter"  src='<?php echo "$this->genImgs/white-twitter-icon.png"; ?>'     onclick="share_twitter_specifi_page( 'http://fashionsponge.com/signup' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="tubmblr"  src='<?php echo "$this->genImgs/white-tumblr-icon.png"; ?>'      onclick="share_tumblr( 'signup' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <a href="https://plus.google.com/share?url={http://fashionsponge.com/signup}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		                                                                            <img title="good plus"  src='<?php echo "$this->genImgs/white-google-plus-icon.png"; ?>' > 
		                                                                        </a>
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="e-mail"  src='<?php echo "$this->genImgs/white-email-icon.png"; ?>'       onclick="share_gmail( 'signup' )" > 
		                                                                    </td>  
		                                                            </table> 
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td> 
		                                                        </center> 
		                                                        	<?php  echo "<input id='invite-popup-done1' type='submit' value='DONE'  />";	 ?> 
		                                                        <center>
		                                                    </td>
		                                            </table> 
		                                        </div> 
		                                    </div> 
		                                    <div id='invite-popup-response-wrapper-content-left' >
		                                        <br><br>
		                                        <p> 
		                                             THANKS FOR SIGNING UP TO GET EVEn MORE FROM FASHION SPONGE, INCLUDING: 
		                                        </p>  
			                                        <div id="including" >
				                                        <ul>
				                                        	<li> TOP LOOKS </li>
				                                        	<li> TRENDING STORIES</li>
				                                        	<li> MEMBERS SPOTLIGHTS </li>
				                                        	<li> EXCLUSIVE DEALS </li>
				                                        	<li> AND MORE...</li>  
				                                        </ul> 
				                                    </div> 
		                                        <p>
		                                            Thanks, 
		                                        </p>  
		                                        <p>
		                                            <span>
		                                                Salvador - Founder & Creative Director <br>
		                                                "Don't Just Dress. Dress Well.&#153;" 
		                                            </span>
		                                        </p>
		                                        <div id='inviteFriendsC' > 
		                                            <div id='invite_ur_friends' >  
		                                                <span>
		                                                    <!-- INVITE YOUR FRIENDS -->
		                                                </span>
		                                            </div>  
		                                        </div> 
		                                    </div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                    <script type="text/javascript"> 

		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done1").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit1').fadeOut('normal');
		                    		})
		                    	}) 

		                    </script> 
		                    <style type="text/css"> 
		                        /* MisoRegular */
		                        /* MisoLight */
		                        /* MisoBold */  
		                        body { padding: 0px; margin:0px;  }

		                        #invite_after_submit1 {  position:fixed;   z-index: 106;   width:100%;  height: 1500px;  background-color: rgba(000,000,000,0.8);   }
		                        #invite-popup-response-wrapper1{ /*margin-top: 200px;*/  /*border: 1px solid red;*/  text-transform:uppercase; font-family: 'arial'; font-size: 12px; font-weight: bold;  }
		                            #invite-popup-response-wrapper-body { margin: auto;  background-color: #fff; width: 980px; border: 8px solid #1a386a; padding-top:20px;padding-bottom:20px;   }
		                                #invite-popup-response-wrapper-content {  padding: 20px;  text-align: left; background-color: #f5f4f1; width: 900px; }
		                                    #invite-popup-response-wrapper-content img { cursor: pointer; } 
		                                    #invite-popup-response-wrapper-content-left { /*border: 1px solid #000;*/ width: 460px; height: 370px;  color: #1a386a; font-size: 13px;   }
		                                        #invite-popup-response-wrapper-content-left p { padding-bottom: 10px; }
		                                        #bold_red {  color: #b32727; }
		                                    #invite-popup-response-wrapper-content-right {  -moz-box-shadow:  5px 5px 0px #ccc; -webkit-box-shadow: 5px 5px 0px #ccc; box-shadow: 5px 5px 0px #ccc; /*border: 1px solid #000;*/ float: right; width:400px; /*height: 200px; */ padding-right: 20px; }
		                                   #invite-popup-response-wrapper-content-right span { color: #fff; } 
		                                    #invite-popup-response-wrapper-content-right-content { width:390px;padding-left: 15px;    padding-right: 15px;padding-top: 30px;padding-bottom: 30px; border: 1px solid #000; background-color: #1a386a; /* height: 200px; width: 200px;*/ }
		                                    #invite-popup-response-wrapper-content-right-content-title1 { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-title1 span { font-size: 48px; font-family: 'MisoLight'; font-weight: normal; }
		                                     #invite-popup-response-wrapper-content-right-content-desc { padding-bottom: 30px; }
		                                        #invite-popup-response-wrapper-content-right-content-desc span {  }
		                                    #invite-popup-response-wrapper-content-right-content-title2 { padding-bottom: 10px; }
		                                        #invite-popup-response-wrapper-content-right-content-title2 span { font-size: 30px; font-family: 'MisoRegular'   }
		                                    #invite-popup-response-wrapper-content-right-content-share { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-share td { padding-left: 15px;}
		                                        #invite-popup-response-wrapper-content-right-content-share  img { /*border: 1px solid #000;*/ } 
		                                        #invite-popup-done1 { border:none; cursor: pointer;  background: url("fs_folders/images/attr/submit.png") no-repeat scroll 0 0 transparent;   font-weight: bold; background-size: 100% auto; padding-bottom: 5px; position: relative;  z-index: 100;  width: 97.5%; height: 35px;     border-radius: 5px;  color: #ffffff;  font-weight: bold;  font-size: 11px;  font-family: 'arial';  letter-spacing: 2px;   margin-left: -2px; }  
		                            #including { }
		                            #including ul { padding: 0px; padding-left: 25px; margin: 0px; }
		                            #including ul li {  color: #ac1c22; font-family: 'MisoLight'; font-size: 30px; } 
		                    </style> 
						</div> 
					<?php 
		}   
		public function get_Generated_code( ) {
			 	
			$gendDate = date (time());
			$randNum1 = rand(100000,9000000);
			$randNum2 = rand(100000,9000000);
			$randNum3 = rand(100000,9000000);
			$randNum4 = rand(100000,9000000);
			$randNum5 = rand(100000,9000000);
			$randNum6 = rand(100000,9000000);


			$genCode = $gendDate.$randNum1.$randNum2.$randNum3.$randNum4.$randNum5.$randNum6;

			// echo " genCode = $genCode <br>";
			return $genCode;
		}
		public function send_email_to_admin( $invited_fn=null , $invited_ln=null , $invited_email=null , $invited_wob=null , $invited_occu=null , $invited_style=null , $invited_offer=null ){
			// $to = "info@fashionsponge.com";
			// $to = "mrjesuserwinsuarez@.gmail.com";
			$subject = "FashionSponge - Sign Up For Beta";
			$fullName = $invited_fn;
			$ipi = $_SERVER["REMOTE_ADDR"];
		

			$body = "\n\nFull Name: ".$fullName.
			"\nEmail: ".$invited_email.
			"\nWebsite: ".$invited_wob.
			"\nOccupation: ".$invited_occu.
			"\nStyle: ".$invited_style.
			"\nRequested Offer: ".$invited_offer.
			"\nIP Address: ".$ipi;

			$mauricio = mail('info@fashionsponge.com', $subject, $body, "From: $invited_email"); 
			$jesus  = mail('mrjesuserwinsuarez@gmail.com', $subject, $body, "From: $invited_email"); 
		}
		public function init_peoplebehindyou_peopleaheadofyou( ) {
			$mem=selectV1(
				'invited_id',
				'fs_invited'
			);
			$tinvited = count($mem); 
			$_SESSION['Tpeopl_in_front'] = $tinvited + rand(1000,2000);
			$_SESSION['people_behind_you'] = rand(10,50);   
			$_SESSION['twms_Tpeopl_in_front'] = $tinvited+400;
		}
		public function send_email_to_user( $invited_fn , $invited_email ) {    

			$to = $invited_email;
			$subject = " THANK YOU! ".ucfirst($invited_fn)." Here's Your Invitation."; 
			$senderMail = "FashionSponge@"; 

			// $name = $_REQUEST['name'] ;
			// $email = $_REQUEST['email'] ;
			// $website = $_REQUEST['website'] ; 
			 $res = selectV1(
			 	'invited_genCode',
			 	'fs_invited',
			 	array('invited_email'=>$invited_email) 
			 ); 
			$genCode = $res[0]['invited_genCode']; 
		    $from = $senderMail;   

            $body ="
              <html> 
                <head>
                <meta name='viewport' content='width=device-width, initial scale=1.0'/>
                <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

                <body style='background-color:#f4f3f2;padding:10px;'>   
                    <center>
                        <table border='0' cellspacing='0' cellpadding='0' style='width:150px;' > 
                        <tr> 
                            <td>  
                                <div style=\" 
                                    text-align:center; 
                                    background-color: #fff;  
                                    border-radius:3px;  
                                    text-align:left; 
                                    line-height:140%; 
                                    font-family:'arial'; 
                                    font-size:15px;  
                                    width:98%; 
                                    border:2px solid #f4f3f2; 
                                \">  
                                    <center> 
                                        <div> 
                                            <img style='cursor:pointer; width:100%; '  src='http://fashionsponge.com/fs_folders/images/email/Header-image.png' />  
                                        </div>
                                    </center>  
                                    <center>  
                                  		<div style=\"color:#1a386a;   text-align:left; width:560px; padding-top:30px; padding:20px; \"  > 
                                          	<center> <span style='font-size:190%;' > LETTER FROM THE <b> FOUNDER </b> </span> </center><br> 

                                          	Hi ".ucfirst($invited_fn).",

                                          	<div style='padding-top:15px'>  
                                  				My name is Mauricio, I am the Founder & Creative Director of Fashion Sponge. When it comes to online fashion communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up.  
                                          	</div>
                                          
                                          	<div style=\"padding-top:15px;\"  >    
                                         		We’re days away from launching our private BETA period. Our designers and developers are working hard 
                                         		to get you a board as soon as possible, ensuring that you have a great online experience. 
                                         		Once again, their are  <span  style=\"color:#ac1c22;font-weight:bold\"  >  $_SESSION[Tpeopl_in_front]  </span>
                                         		people ahead of you and  <span style=\"color:#ac1c22;font-weight:bold\"  > $_SESSION[people_behind_you]    </span>  
                                         		people behind you.  Once we start sending out invitations to join, you will receive your invite in the order you signed up. 
                                          	</div>  

                                           	<div style='padding-top:15px;font-weight:bold'>  
                                               WHILE WAITING ON YOUR INVITE WE SUGGEST YOU:
                                            </div>    

											<div style=\"padding-top:15px;\" >  
												Follow us on 
												<a style=\"text-decoration:none;color:#ac1c22;font-weight:bold\" target=\"_blank\" href=\"https://www.facebook.com/fashionsponge\">Facebook</a>and  
												<a style=\"text-decoration:none;color:#ac1c22;font-weight:bold\" target=\"_blank\" href=\"http://instagram.com/fashionsponge\">Instagram</a> to get the latest information on the sites development and to see if we 
												featured one of your latest looks. Also if you haven't already informed your stylish friends about Fashion 
												Sponge or the <span style='color:#ac1c22'> <b> \"Worlds Most Stylish\" </b>  </span> contest, please send them the links so they can also enjoy what's to come. 

											</div> 

                                            <div style='padding-top:15px;font-weight:bold' >    
                                            	HAVE ANY QUESTIONS OR SUGGESTIONS?
                                            </div>   
 
                                            <div style=\"padding-top:15px;\" >  
                                            	If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback but most importantly I love connecting with people!
                                            </div> 

                                    		<div style='padding-top:15px;font-weight:bold' >    
                                             	WE ARE CURRENTLY LOOKING FORAND JUDGES: 
                                            </div>  

                                        	<div style=\"padding-top:15px;\" > 
                                            	If you are looking for exposure and want to be acknowledged as an expert or if you have a product that falls into the category of Streetwear, Chic Menswear or Preppy and want to be seen by the masses email us now at info@fashionsponge for more details. 
                                          	</div>  

                                          	<div style=\"padding-top:20px;font-weight:bold\" >  
                                          		THANK YOU AGAIN FOR YOUR SUPPORT!
                                          	</div>   

                                          	<div style=\"padding-top:10px;padding-bottom:70px;text-decoration:none\"  > 
                                           		Mauricio | Founder & Creative Director<br>
                                                Mauricio@fashionsponge.com<br>
                                             	\"Don't Just Dress. Dress Well.\"™ 
                                   			</div>   
                                		</div> 
                                    </center>  
                                </div> 
                            </td>
                        </td>  
                    </center> 
                </body> 
              </html>";   

              echo " $body "; 


			$headers  = "From: $from\r\n"; 
		    $headers .= "Content-type: text/html\r\n"; 
   			 mail($to, $subject, $body, $headers); 
			// mail( $to, $subject,  $body, $senderMail); 
			// $jesus  = mail($to, $subject, $body, "From: info@fashionsponge.com"); 
			// mail('mrjesuserwinsuarez@gmail.com', $subject, $body, "From: $invited_email");  
			// Use this code for registration : $genCode
		}  
		public function send_email_signup_to_user($invited_fn , $invited_email , $type=null , $from1 = 'brainoffashion@gmail.com' , $subject1 = null , $version=NULL, $qid=0) {

			$url_extention  			   = $this->attribute['url_extention'];  
			$to 						   = $invited_email;


			$totalPeople = 20; 
			$_SESSION['Tpeopl_in_front']   = $totalPeople+rand(1,100);
			$_SESSION['people_behind_you'] = rand(1,100); 

			$senderMail = "FashionSponge@";  
			// $subject = " THANK YOU! ".ucfirst($invited_fn)." Here's Your Invitation.";  
			 $res = selectV1(
			 	'invited_genCode',
			 	'fs_invited',
			 	array('invited_email'=>$invited_email) 
			 ); 
			$genCode = $res[0]['invited_genCode']; 
		    $from = $senderMail;   
 
	   	 	switch ($type) {
	   	 		case 'contest': 
	   	 				$subject = "HEY ".strtoupper($invited_fn).". You chances of winning are near...";   
	   	 			    $body =" 
			              <html> 
			                <head>
			                <meta name='viewport' content='width=device-width, initial scale=1.0'/>
			                <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'> 
			                <body style='background-color:#f4f3f2;padding:10px;'>   
			                    <center>
			                        <table border='0' cellspacing='0' cellpadding='0' style='width:150px;' > 
			                        <tr> 
			                            <td>  
			                                <div style=\" 
			                                    text-align:center; 
			                                    background-color: #fff;  
			                                    border-radius:3px;  
			                                    text-align:left; 
			                                    line-height:140%; 
			                                    font-family:'arial'; 
			                                    font-size:15px;  
			                                    width:98%; 
			                                    border:2px solid #f4f3f2; 
			                                \">  
			                                    <center> 
			                                        <div> 
			                                            <img style='cursor:pointer; width:100%; '  src='http://fashionsponge.com/fs_folders/images/email/Header-image.png' />  
			                                        </div>
			                                    </center>  
			                                    <center>  
			                                      <div style=\"color:#1a386a;   text-align:left; width:560px; padding-top:30px; padding:20px; \"  > 
			                                          <center> <span style='font-size:190%;' > LETTER FROM THE <b> FOUNDER </b> </span> </center><br> 
			                                          Hi ".ucfirst($invited_fn).", 
			                                          <div style='padding-top:15px'>    


			                                               My name is Mauricio, the Founder & Creative Director of Fashion Sponge. I just wanted to personally say thanks again for signing 
			                                               up to compete in our “Worlds Most Stylish” contest. Once again, 


			                                               <span  style=\"color:#ac1c22;font-weight:bold\"  >  $_SESSION[Tpeopl_in_front]  </span> people signed up before you and 
			                                                <span style=\"color:#ac1c22;font-weight:bold\"  > $_SESSION[people_behind_you]    </span> people signed up after you. 
			                                               This contest will very inspirational, educational and competitive but most importantly it will fun! 
			                                          </div>   

			                                           <div style='padding-top:15px;font-weight:bold;color:#b01e23'>  
			                                               THE STORY BEHIND THE CONTEST…
			                                          </div>   

			                                          <div style=\"padding-top:15px;\" >  
			                                                Each month on fashionsponge.com bloggers that have the highest ranked look for the submitted category, will win the look of the month prize. At the end of the year, all winners will compete for the title of the “World's Most Stylish” So to jump-start the official launch of fashionsponge.com, we decided to give you a taste of whats to come from Fashion Sponge. This way you can expect this event annually, in addition to all the other, benefits of the site.
			                                          </div>

			                                          <div style='padding-top:15px;font-weight:bold;color:#b01e23'>  
			                                             ABOUT FASHION SPONGE
			                                          </div>   
			                                          <div style=\"padding-top:15px;\" >  
			                                                
			                                              If you don’t already know… FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO... Show your OOTD, see the latest trends, discover new blogs and people, get fashion inspiration and style advice, while having a chance at winning monthly prizes. 
			                                          </div> 

			                                          <div style='padding-top:15px;font-weight:bold;color:#b01e23'>  
			                                             WE ARE LOOKING FOR JUDGES
			                                          </div> 

			                                          <div style=\"padding-top:15px;\" >   
			                                              If you are a fashion expert (have great style and fashion knowledge) in either 
			                                              <b> streetwear, menswear, chic or preppy </b> styles? Email us at 
			                                              <a> info@fashionsponge.com </a>  if you would like to judge this contest.
			                                          </div>

			                                          <div style='padding-top:15px;font-weight:bold;color:#b01e23'>  
			                                            SPONSORSHIP OPPORTUNITIES
			                                          </div>

			                                          <div style=\"padding-top:15px;\" >  
			                                             If you or someone you know, have a fashion related brand that they want seen by people who live and breath fashion. Email us now at sponsors@fashionsponge.com
			                                          </div>  

			                                          <div style='padding-top:15px;font-weight:bold;color:#b01e23'>  
			                                            HAVE ANY QUESTIONS?     
			                                          </div>

			                                          <div style=\"padding-top:15px;\" >  
			                                               If you have any questions about the contest please feel free to email me.
			                                          </div>   

			                                          <div style=\"padding-top:10px;padding-bottom:70px;text-decoration:none\"  >  
			                                               Mauricio | Founder & Creative Director<br>
			                                              <a style='color:#b01e23' >Mauricio@fashionsponge.com</a><br>
			                                             \"Don't Just Dress. Dress Well.\"™ 
			                                          </div>   
			                                      </div> 
			                                    </center>  
			                                </div> 
			                            </td>
			                        </td>  
			                    </center> 
			                </body> 
			        	</html>";     
	   	 			break; 
	   	 		case 'signup': 


	   	 				$from 			= "Fashion Sponge <$from1>";
	   	 				$subject 		= $subject1;  
	   	 				// $subject = "HEY ".strtoupper($invited_fn).". Your Invitation is on its way.";      
	   	 				switch ($version) {
	   	 					case 1: 

	   	 						$body ="
		     						<html> 
						                <head>
						                <meta name='viewport' content='width=device-width, initial scale=1.0'/>
						                <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

						                <body style='background-color:#f4f3f2;padding:10px;'>   
						                    <center>
						                        <table border='0' cellspacing='0' cellpadding='0' style='width:150px;' > 
						                        <tr> 
						                            <td>  
						                                <div style=\" 
						                                    text-align:center; 
						                                    background-color: #fff;  
						                                    border-radius:3px;  
						                                    text-align:left; 
						                                    line-height:140%; 
						                                    font-family:'arial'; 
						                                    font-size:15px;  
						                                    width:98%; 
						                                    border:2px solid #f4f3f2; 
						                                \">  
						                                    <center> 
						                                        <div> 
						                                            <img style='cursor:pointer; width:100%; '  src='http://fashionsponge.com/fs_folders/images/email/Header-image.png' />  
						                                        </div>
						                                    </center>  
						                                    <center>  
						                                  		<div style=\"color:#1a386a;   text-align:left; width:560px; padding-top:30px; padding:20px; \"  > 
						                                          	<center> <span style='font-size:190%;' > LETTER FROM THE <b> FOUNDER </b> </span> </center><br> 

						                                          	Hi ".ucfirst($invited_fn).",

						                                          	<div style='padding-top:15px'>  
						                                  				My name is Mauricio, I'm the Founder & Creative Director at Fashion Sponge. When it comes to online communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up. 
						                                          	</div>
						                                          
						                                          	<div style=\"padding-top:15px;\"  >    

						                                          		We’re days away from launching our private BETA period. Our designers and developers are working hard to get you a board as 
						                                          		soon as possible, ensuring that you have a great online experience. Once again, 
						                                          		<span  style=\"color:#ac1c22;font-weight:bold\"  >  $_SESSION[Tpeopl_in_front]  </span>
						                                          		 people signed up before you and <span style=\"color:#ac1c22;font-weight:bold\"  > $_SESSION[people_behind_you] </span> people 
						                                          		signed up after you. Once we start sending out invitations to join, you will receive your invite in the order you signed up. 

						                                          	</div>   

						                                          	<div style='padding-top:15px;font-weight:bold;color:#b01e23'  ' >     
																		HAVE ANY QUESTIONS OR SUGGESTIONS?
						                                            </div>    

						                                    		<div style=\"padding-top:15px;\" >  
																		If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback, but most importantly I love connecting with people!
																	</div>  

																	<div style=\"padding-top:20px;font-weight:bold\" >   
																		THANK YOU AGAIN FOR YOUR SUPPORT! 
						                                          	</div>    
							                                            
						  											<div style=\"padding-top:10px;padding-bottom:70px;text-decoration:none\"  >    
				                                                      	<a style='color:#b01e23' >Mauricio@fashionsponge.com</a><br> 
						                                   			</div>    
						                                		</div> 
						                                    </center>  
						                                </div> 
						                            </td>
						                        </td>  
						                    </center> 
						                </body> 
					                </html>";    
					                echo "	$body ";  
				   	 				/*
					   	 			    $body =" 
					                      <html> 
					                        <head>
					                        <meta name='viewport' content='width=device-width, initial scale=1.0'/>
					                        <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'> 
					                        <body style='background-color:#f4f3f2;padding:10px;'>   
					                            <center>
					                                <table border='0' cellspacing='0' cellpadding='0' style='width:150px;' > 
					                                <tr> 
					                                    <td>  
					                                        <div style=\" 
					                                            text-align:center; 
					                                            background-color: #fff;  
					                                            border-radius:3px;  
					                                            text-align:left; 
					                                            line-height:140%; 
					                                            font-family:'arial'; 
					                                            font-size:15px;  
					                                            width:98%; 
					                                            border:2px solid #f4f3f2; 
					                                        \">  
					                                            <center> 
					                                                <div> 
					                                                    <img style='cursor:pointer; width:100%; '  src='http://fashionsponge.com/fs_folders/images/email/Header-image.png' />  
					                                                </div>
					                                            </center>  
					                                            <center>  
					                                              <div style=\"color:#1a386a;   text-align:left; width:560px; padding-top:30px; padding:20px; \"  > 
					                                                  <center> <span style='font-size:190%;' > LETTER FROM THE <b> FOUNDER </b> </span> </center><br> 
					                                                  Hi ".ucfirst($invited_fn).",
					                                                  <div style='padding-top:15px'>  

					                                                      My name is Mauricio, the Founder & Creative Director of Fashion Sponge. When it comes to online fashion communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up.  <br><br>
					       
					                                                      We’re days away from launching our private BETA period. Our designers and developers are working hard to get you a board as 
					                                                      soon as possible, ensuring that you have a great online experience. Once again,  
					                                                      <span style=\"color:#284372;font-weight:bold\"  >  $_SESSION[Tpeopl_in_front]  </span>  people signed up before you and 
					                                                      <span style=\"color:#284372;font-weight:bold\"  > $_SESSION[people_behind_you]    </span> people 
					                                                      signed up after you. Once we start sending out invitations to join, you will receive your invite in the order you signed up.
					                                                  </div>   
					                                                   <div style='padding-top:15px;font-weight:bold; color:#b01e23'>  
					                                                         WHILE WAITING ON YOUR INVITE WE SUGGEST YOU:
					                                                    </div>   
					                                                  <div style=\"padding-top:15px;\" >  
					                                                      Follow us on  
					                                                      <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"https://www.facebook.com/fashionsponge\">Facebook</a> , 
					                                                      <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"https://twitter.com/fashionsponge\">Google+</a> and  
					                                                      <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"http://instagram.com/fashionsponge\">Instagram</a>  
					                                                      to get the latest information on the sites development and to see if we featured one of your latest looks. Also if you 
					                                                      haven't already informed your stylish friends about Fashion Sponge or the \"<b>Worlds Most Stylish</b>\" contest, please send 
					                                                      them the links so they can also enjoy whats to come.   
					                                                  </div> 
					                                                    <div style='padding-top:15px;font-weight:bold; color:#ac1c22;' >   
					                                                       HAVE ANY QUESTIONS OR SUGGESTIONS?
					                                                  </div>    

					                                                  <div style=\"padding-top:15px;\" >  
					                                                    If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback but most importantly I love connecting with people!
					                                                  </div>  
					                                                  <div style=\"padding-top:15px;font-weight:bold; color:#b01e23\" >  
					                                                     TO LEARN MORE ABOUT FASHION SPONGE VISIT OUR  <a style=\" color:#284372;text-decoration:underline;font-weight:bold\" target=\"_blank\" href=\"http://fashionsponge.com/about-us\">ABOUT</a>  PAGE.    
					                                                  </div> 
					                                                  <div style=\"padding-top:15px;font-weight:bold\" >  
					                                                       THANK YOU AGAIN FOR YOUR SUPPORT! 
					                                                  </div> 
					                                                  <div style=\"padding-top:10px;padding-bottom:70px;text-decoration:none\"  >  
					                                                       Mauricio | Founder & Creative Director<br>
					                                                      <a style='color:#b01e23' >Mauricio@fashionsponge.com</a><br>
					                                                     \"Don't Just Dress. Dress Well.\"™ 
					                                                     </div>  
					                                                  </div> 
					                                              </div> 
					                                            </center>  
					                                        </div> 
					                                    </td>
					                                </td>  
					                            </center> 
					                        </body> 
					                	</html>";   
				                	*/ 
	   	 					break;
	   	 					case 2: 
 
	   	 						$content['signup'] = " 
	   	 							<div class='lead'> 
		                                <p class='text-3'> Hi$invited_fn,   </p>
		                                <p>My name is <b>Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. When it comes to online communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up.</p>
		                                <p>We would love to invite everyone but membership is restricted to bloggers who consistently create compelling high quality fashion and lifestyle content. Once someone from Fashion Sponge visits the link you provided, you will receive a response in the order you signed up.</p> 
		                            </div>   
		                            <div class='lead'> 
	                                    <p class='text-2' style='color: #b01e23; '> 
	                                    	<b style='font-size:13px;' >HAVE ANY QUESTIONS OR SUGGESTIONS?</b> 
	                                    </p>   
	                                    <p>  
	                                        If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback, but most importantly I love connecting with people!
	                                    </p>                                 
		                            </div> 
	                                <div class='lead' style='padding-top:20px;font-weight:bold'>   
	                                    <b style='font-size:13px;' >THANK YOU AGAIN FOR YOUR SUPPORT!</b>	
	                                </div> 
		                            <div class='lead'> 
		                                <p> 
		                                     <span style='color:#1a386a;'>  
		                                        Mauricio | Founder &amp; Creative Director  <br>
		                                        <a style='color:#696969;'>Mauricio@fashionsponge.com</a> 
		                                  	</span> 
		                                 </p>
		                            </div> 
	   	 						"; 
  
	   	 						$body = "  
								    <html xmlns='http://www.w3.org/1999/xhtml'>
								        <head>
								            <style type='text/css'>
								                #query-response{ 
								                    display: block; 
								                } 
								            </style> 
								            <style type='text/css'>
								                #popUp-background{ 
								                    display: none;   
								                    position:fixed;   
								                    z-index: 106;   
								                    width:100%;   
								                    height: 100%; 
								                    background-color: rgba(000,000,000,0.8); 
								                }
								                .red{
								                    color: red;
								                }
								                .green{
								                    color: green;
								                } 
								             </style>  
								        </head>
								        <body bgcolor='#FFFFFF'>
								            <!-- If you delete this tag, the sky will fall on your head -->
								            <meta name='viewport' content='width=device-width, initial scale=1.0'> 
								            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>    
								             
								            <!-- HEADER -->
								            <!-- /HEADER -->

								            <style type='text/css'> 
								                    /* ------------------------------------- 
								                            GLOBAL 
								                    ------------------------------------- */
								                    * { 
								                        margin:0;
								                        padding:0;
								                    }
								                    * { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

								                    img { 
								                        max-width: 100%; 
								                    }
								                    .collapse {
								                        margin:0;
								                        padding:0;
								                    }
								                    body {
								                        -webkit-font-smoothing:antialiased; 
								                        -webkit-text-size-adjust:none; 
								                        width: 100%!important; 
								                        height: 100%;
								                    }


								                    /* ------------------------------------- 
								                            ELEMENTS 
								                    ------------------------------------- */
								                    a { color: #2BA6CB;}

								                    .btn {
								                        text-decoration:none;
								                        color: #FFF;
								                        background-color: #666;
								                        padding:10px 16px;
								                        font-weight:bold;
								                        margin-right:10px;
								                        text-align:center;
								                        cursor:pointer;
								                        display: inline-block;
								                    }

								                    p.callout {
								                        padding:15px;
								                        background-color:#ECF8FF;
								                        margin-bottom: 15px;
								                    }
								                    .callout a {
								                        font-weight:bold;
								                        color: #2BA6CB;
								                    }

								                    table.social {
								                    /*  padding:15px; */
								                        background-color: #ebebeb;
								                        
								                    }
								                    .social .soc-btn {
								                        padding: 3px 7px;
								                        font-size:12px;
								                        margin-bottom:10px;
								                        text-decoration:none;
								                        color: #FFF;font-weight:bold;
								                        display:block;
								                        text-align:center;
								                    }
								                    a.fb { background-color: #3B5998!important; }
								                    a.tw { background-color: #1daced!important; }
								                    a.gp { background-color: #DB4A39!important; }
								                    a.ms { background-color: #000!important; }

								                    .sidebar .soc-btn { 
								                        display:block;
								                        width:100%;
								                    }

								                    /* ------------------------------------- 
								                            HEADER 
								                    ------------------------------------- */
								                    table.head-wrap { width: 100%;}

								                    .header.container table td.logo { padding: 15px; }
								                    .header.container table td.label { padding: 15px; padding-left:0px;}


								                    /* ------------------------------------- 
								                            BODY 
								                    ------------------------------------- */
								                    table.body-wrap { width: 100%;}


								                    /* ------------------------------------- 
								                            FOOTER 
								                    ------------------------------------- */
								                    table.footer-wrap { width: 100%;    clear:both!important;
								                    }
								                    .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
								                    .footer-wrap .container td.content p {
								                        font-size:10px;
								                        font-weight: bold;
								                        
								                    }


								                    /* ------------------------------------- 
								                            TYPOGRAPHY 
								                    ------------------------------------- */
								                    h1,h2,h3,h4,h5,h6 {
								                    font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
								                    }
								                    h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

								                    h1 { font-weight:200; font-size: 44px;}
								                    h2 { font-weight:200; font-size: 37px;}
								                    h3 { font-weight:500; font-size: 27px;}
								                    h4 { font-weight:500; font-size: 23px;}
								                    h5 { font-weight:900; font-size: 17px;}
								                    h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

								                    .collapse { margin:0!important;}

								                    p, ul { 
								                        margin-bottom: 10px; 
								                        font-weight: normal; 
								                        font-size:14px; 
								                        line-height:1.6;
								                    }
								                    p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
								                    p.last { margin-bottom:0px;}

								                    ul li {
								                        margin-left:5px;
								                        list-style-position: inside;
								                    }

								                    /* ------------------------------------- 
								                            SIDEBAR 
								                    ------------------------------------- */
								                    ul.sidebar {
								                        background:#ebebeb;
								                        display:block;
								                        list-style-type: none;
								                    }
								                    ul.sidebar li { display: block; margin:0;}
								                    ul.sidebar li a {
								                        text-decoration:none;
								                        color: #666;
								                        padding:10px 16px;
								                    /*  font-weight:bold; */
								                        margin-right:10px;
								                    /*  text-align:center; */
								                        cursor:pointer;
								                        border-bottom: 1px solid #777777;
								                        border-top: 1px solid #FFFFFF;
								                        display:block;
								                        margin:0;
								                    }
								                    ul.sidebar li a.last { border-bottom-width:0px;}
								                    ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



								                    /* --------------------------------------------------- 
								                            RESPONSIVENESS
								                            Nuke it from orbit. It's the only way to be sure. 
								                    ------------------------------------------------------ */

								                    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
								                    .container {
								                        display:block!important;
								                        max-width:600px!important;
								                        margin:0 auto!important; /* makes it centered */
								                        clear:both!important;
								                    }

								                    /* This should also be a block element, so that it will fill 100% of the .container */
								                    .content {
								                        padding:15px;
								                        max-width:600px;
								                        margin:0 auto;
								                        display:block; 
								                    }

								                    /* Let's make sure tables in the content area are 100% wide */
								                    .content table { width: 100%; }


								                    /* Odds and ends */
								                    .column {
								                        width: 300px;
								                        float:left;
								                    }
								                    .column tr td { padding: 15px; }
								                    .column-wrap { 
								                        padding:0!important; 
								                        margin:0 auto; 
								                        max-width:600px!important;
								                    }
								                    .column table { width:100%;}
								                    .social .column {
								                        width: 280px;
								                        min-width: 279px;
								                        float:left;
								                    }

								                    /* Be sure to place a .clear element after each set of columns, just to be safe */
								                    .clear { display: block; clear: both; }


								                    /* ------------------------------------------- 
								                            PHONE
								                            For clients that support media queries.
								                            Nothing fancy. 
								                    -------------------------------------------- */
								                    @media only screen and (max-width: 600px) {
								                        
								                        a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

								                        div[class='column'] { width: auto!important; float:none!important;}
								                        
								                        table.social div[class='column'] {
								                            width:auto!important;
								                        }
								                    }

								                    .header-1 { 
								                    /* border:1px solid red; */
								                        text-align:center;
								                    } 
								                    .header-1 div  { 
								                        margin:auto; 
								                    } 
								                    .text-1 { 
								                        color: 1a386a;
								                        font-size: 23px;  
								                        font-family:arial;   
								                        color:#c51d20;
								                        border-top:1px solid #ccc; 
								                        border-bottom:1px solid #ccc; 
								                        padding: 15px 0px 15px 0px; 
								                        line-height: 1;
								                        font-weight:bold;
								                    }
								                    .text-2{ 
								                        font-weight:bold;
								                    }
								                    .image{ 
								                        padding-bottom:20px;
								                        padding-top:20px;
								                    }
								                    .container-1{
								                        border: 1px solid #f4f3f2;  
								                        padding: 10px;
								                    }
								                    table.table-1 {
								                        width: 100%;
								                        padding-bottom: 10px;
								                    }
								                     

								                    td.logo {
								                        width: 50%;
								                    }

								                    td.logo img {
								                        float: right;
								                    }  
								            </style>
								            <!-- BODY -->  
  

								            <table class='body-wrap'>
								                <tbody><tr>
								                    <td> </td>
								                    <td class='container' bgcolor='#FFFFFF'> 
								                        <div class='content'>
								                        <table>
								                            <tbody><tr>
								                                <td class='container-1' style='border: 1px solid #f4f3f2; padding:10px;color:#1a386a;background-color: white;'> 
								                                <div class='header-1' style='padding: 0px 0px 20px 0px'; > 
								                                    <center>  
								                                        <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' > 
								                                            <tbody> 
								                                            <tr>                       
								                                                <td> 
								                                                    <div> 
								                                                        <img style='cursor:pointer; width:100%; ' src='http://fashionsponge.com/fs_folders/images/email/Header-image.png'>  
								                                                    </div> 
								                                                </td>                                                                                    
								                                                </tr>
								                                            </tbody>
								                                        </table> 
								                                    </center>
								                                </div> 
								                            <center> 
								                            <span style='font-size:190%;'> LETTER FROM THE <b> FOUNDER </b> </span>                         
								                            </center>  
								                            " . $content['signup'] . " 
								                        </td>
								                    </tr>
								                </tbody></table>
								                </div>          
								                    </td>
								                    <td></td>
								                    </tr>
								                </tbody>
								            </table><!-- /BODY -->    
								        </body>
								    </html>
							   	";	
	   	 					break; 
	   	 					default: 
	   	 					break;
	   	 				} 

	   	 				echo "$body"; 
	   	 			break; 
	   	 		case 'invitations': 

	   	 				// $from_email     = 'Fashion Sponge'; 
	   	 				$from 			= "Fashion Sponge <$from1>";
	   	 				$subject 		= $subject1; 
	   	 				$v              = 4;

	   	 				if ( $v == 1 ){ 
	   	 					$body = "  
							<html>	
								<head>
									<meta name='viewport' content='width=device-width, initial scale=1.0'>
								    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>  
								</head> 
								<body style='background-color:white;padding:3px;margin:0px;font-family: arial;'>  
									<center> 
										<h1> version $v ( option )</h1> 
									</center>
									<center>
										<table border='0' cellspacing='0' cellpadding='0' style='width:150px;'> 
										    <tbody><tr> 
										        <td style='border: 1px solid #f4f3f2;  padding: 10px;'>  
										            <div style='&nbsp;text-align:center; background-color: #fff;  border-radius:3px;  text-align:left; line-height:140%;   font-size:15px; width:98%;   /* padding: 10px; */ '>  
										                <center> 
										                    <div style='padding-bottom:10px;'> 
										                        <table border='0' cellspacing='0' cellpadding='0'> 
																   <tbody> <tr> 
																	    <td style='/* border-right:1px solid #ccc */'> 
																			<div style=' /* border: 1px solid red; */  padding-right: 10px; '> 	
																			 	<a href='fashionsponge.com'>
																	       			<img src='http://test.fashionsponge.com/fs_folders/images/genImg//blue-logo.png' style='height:30px;'>
																	      		</a> 
																			</div> 
																    	</td> 
																		<td> 
																			<div style=' border-left: 1px solid rgb(204, 204, 204); height: 20px; '> </div> 
							                                         </td> 
							                                         <td> 
															          	<div style='color:#1a386a; font-size: 12px;font-weight:bold;margin-top: 0px;padding-left: 10px;/* border-left: 1px solid red; */'> 
															          		FASHION AND ALL THE FIXINGS. 
															        	</div>
																       </td>  												             
																	</tr></tbody>
																</table>
															</div>
													  	</center> 
										            	<center> 
										          			<div style='color:#1a386a; text-align:left; width: 530px; ;/* border: 1px solid white; */'> 
										                      	<center> 
										                      		<div style='color: 1a386a;font-size: 23px;  font-family:arial;   color:#c51d20;border-top:1px solid #ccc; border-bottom:1px solid #ccc;/* color: #1a386a; */padding: 15px 0px 15px 0px; line-height: 1;'> 
										                          		<b>FINALLY, SOMETHING COOL FOR BLOGGERS. </b>  
										                          	</div> 
										                      	</center> 
										                  		<div style='padding-top: 11px;/* border: 1px solid red; */text-align: left;color: #000000;'> Hey,  </div>
										                      	<div style='padding-top:15px;/* border: 1px solid red; */text-align: left;color: #000000;'>My name is Mauricio, my reason for emailing you is really very straight forward. <br> I am a fan of your blog and it's unfortunate that great contents like yours is not being seen by the masses. I created Fashion Sponge so bloggers who create compelling content could get the exposure they deserve. Now that I am days from launching my private beta, I knew I wanted to personlly invite you to join.</div> 
										                      	<div style='/* padding-top:15px; *//* border: 1px solid red; */text-align: left;color: #000000;'>   
																  	<p> 
																  		<b> WHAT IS FASHION SPONGE? </b>  
																  		<br>Fashion Sponge is the best place to post or discover whats fashionable in Fashion, Beauty, Lifestyle and Entertainment by people who share your interest. click <a href='fashionsponge.com/signup'> here </a> to learn more.</p>  
																</div>   
																<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#c51d20 ;text-align: center;line-height: 1;'> 
																  <b>  'This is not a site. It's a discovery engine.  Discover and get descovered.' </b>  
																</div> 
																<div style='width: 531px; padding-top:20px; padding-bottom:20px;/* border: 1px solid red; */'>  
																  		<img style='width:100%' src='http://test.fashionsponge.com/fs_folders/images/genImg/email-screenshots.png'>  
																</div> 					                                            
																<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'> 
												                    <center> 
												                    <span style='font-family:arial; color:#c51d20'> 
												                        <b>SIGN UP NOW. SPACE IS LIMITED<br></b>
												                      <b style='font-size:12px;color:#000;font-family: arial;'>SIGNING UP</b>  
												                    </span><br> 
												                    <a href='fashionsponge.com/signup'>
												                    	<img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://test.fashionsponge.com/fs_folders/images/genImg/sign-up.png'> 
												                    </a>
												                    </center> 
												                </div>	
												           		<div style='padding-top: 40px;/* padding-bottom:70px; */text-decoration:none;/* border: 1px solid; */text-align: center;'><span style='color: black; '>  
							                                        Mauricio | Founder &amp; Creative Director  <br>
							                                        <a style='color:#b01e23'>Mauricio@fashionsponge.com</a> 
							                                  	</span></div>   
															</div> 
										                </center>  
										            </div> 
										        </td> 
										    </tr></tbody>
										</table>
									</center>  	
									<br>      
								</body>
							</html> 
							";   
	   	 				}
	   	 				else if ( $v == 2 ) {

	   	 					  
	   	 					$body = "   
							<html>
									<head>
										<meta name='viewport' content='width=device-width, initial scale=1.0'>
									    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>  
									</head> 
									<body style='background-color:white;padding:0px;margin:0px;font-family: arial;'>  
										<center> 
											<h1> version $v  ( option ) </h1> 
										</center>
										<center>
											<table border='0' cellspacing='0' cellpadding='0' style='width:150px;'> 
											    <tbody><tr> 
											        <td style='border: 1px solid white;padding: 10;padding-right: 20px;'>   
														<div style='border: 1px solid #f4f3f2;  padding: 10px;'>
											            <div style='&nbsp;text-align:center; background-color: #fff;  border-radius:3px;  text-align:left; line-height:140%;   font-size:15px; width:98%;   /* padding: 10px; */ '>  
											                <center> 
											                    <div style='padding-bottom:10px;'> 
											                        <table border='0' cellspacing='0' cellpadding='0'> 
																	   <tbody> <tr> 
																		    <td style='/* border-right:1px solid #ccc */'> 
																				<div style=' /* border: 1px solid red; */  padding-right: 10px; '> 	
																				 	<a href='fashionsponge.com'>
																		       			<img src='http://test.fashionsponge.com/fs_folders/images/genImg//blue-logo.png' style='height:30px;'>
																		      		</a> 
																				</div> 
																	    	</td> 
																			<td> 
																				<div style=' border-left: 1px solid rgb(204, 204, 204); height: 20px; '> </div> 
								                                         </td> 
								                                         <td> 
																          	<div style='color:#1a386a; font-size: 12px;font-weight:bold;margin-top: 0px;padding-left: 10px;/* border-left: 1px solid red; */'> 
																          		FASHION AND ALL THE FIXINGS. 
																        	</div>
																	       </td>  												             
																		</tr></tbody>
																	</table>
																</div>
														  	</center> 
											            	<center> 
											          			<div style='color:#1a386a; text-align:left; width: 530px; ;/* border: 1px solid white; */'> 
											                      	<center> 
											                      		<div style='color: 1a386a;font-size: 23px;  font-family:arial;   color:#c51d20;border-top:1px solid #ccc; border-bottom:1px solid #ccc;/* color: #1a386a; */padding: 15px 0px 15px 0px; line-height: 1;'> 
											                          		<b>FINALLY, SOMETHING COOL FOR BLOGGERS. </b>  
											                          	</div> 
											                      	</center> 
											                  		<div style='padding-top: 11px;/* border: 1px solid red; */text-align: left;color: #000000;'> Hey,  </div>
											                      	<div style='padding-top:15px;/* border: 1px solid red; */text-align: left;color: #000000;'>My name is Mauricio, my reason for emailing you is really very straight forward. <br> I am a fan of your blog and it's unfortunate that great contents like yours is not being seen by the masses. I created Fashion Sponge so bloggers who create compelling content could get the exposure they deserve. Now that I am days from launching my private beta, I knew I wanted to personlly invite you to join.</div> 
											                      	<div style='/* padding-top:15px; *//* border: 1px solid red; */text-align: left;color: #000000;'>   
																	  	<p> 
																	  		<b> WHAT IS FASHION SPONGE? </b>  
																	  		<br>Fashion Sponge is the best place to post or discover whats fashionable in Fashion, Beauty, Lifestyle and Entertainment by people who share your interest. click <a href='fashionsponge.com/signup'> here </a> to learn more.</p>  
																	</div>   
																	<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#c51d20 ;text-align: center;line-height: 1;'> 
																	  <b>  'This is not a site. It's a discovery engine.  Discover and get descovered.' </b>  
																	</div> 
																	<div style='width: 531px; padding-top:20px; padding-bottom:20px;/* border: 1px solid red; */'>  
																	  		<img style='width:100%' src='http://test.fashionsponge.com/fs_folders/images/genImg/email-screenshots.png'>  
																	</div> 					                                            
																	<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'> 
													                    <center> 
													                    <span style='font-family:arial; color:#c51d20'> 
													                        <b>SIGN UP NOW. SPACE IS LIMITED<br></b>
													                      <b style='font-size:12px;color:#000;font-family: arial;'>SIGNING UP</b>  
													                    </span><br> 
													                    <a href='fashionsponge.com/signup'>
													                    	<img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://test.fashionsponge.com/fs_folders/images/genImg/sign-up.png'> 
													                    </a>
													                    </center> 
													                </div>	
													           		<div style='padding-top: 40px;/* padding-bottom:70px; */text-decoration:none;/* border: 1px solid; */text-align: center;'><span style='color: black; '>  
								                                        Mauricio | Founder &amp; Creative Director  <br>
								                                        <a style='color:#b01e23'>Mauricio@fashionsponge.com</a> 
								                                  	</span></div>   
																</div> 
											                </center>  
											            </div> 
															</div>
											        </td> 
											    </tr></tbody>
											</table>
										</center>  	
										<br>     
								 	<br> </body> </html>
							";  	 
	   	 				} 
	   	 				else if ( $v == 3 ){

	   	 					$body = "  
							<html>	
								<head>
									<meta name='viewport' content='width=device-width, initial scale=1.0'>
								    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>  
								</head> 
								<body style='background-color:white;padding:3px;margin:0px;font-family: arial;'>  
									<center> 
										<h1> $v  ( option ) </h1> 
									</center>
									<center>
										<table border='0' cellspacing='0' cellpadding='0' style='width:150px;'> 
										    <tbody><tr> 
										        <td style='border: 1px solid #f4f3f2;  padding: 10px;'>  
										            <div style='&nbsp;text-align:center; background-color: #fff;  border-radius:3px;  text-align:left; line-height:140%;   font-size:15px; width:98%;   /* padding: 10px; */ '>  
										                <center> 
										                    <div style='padding-bottom:10px;'> 
										                        <table border='0' cellspacing='0' cellpadding='0'> 
																   <tbody> <tr> 
																	    <td style='/* border-right:1px solid #ccc */'> 
																			<div style=' /* border: 1px solid red; */  padding-right: 10px; '> 	
																			 	<a href='fashionsponge.com'>
																	       			<img src='http://test.fashionsponge.com/fs_folders/images/genImg//blue-logo.png' style='height:30px;'>
																	      		</a> 
																			</div> 
																    	</td> 
																		<td> 
																			<div style=' border-left: 1px solid rgb(204, 204, 204); height: 20px; '> </div> 
							                                         </td> 
							                                         <td> 
															          	<div style='color:#1a386a; font-size: 12px;font-weight:bold;margin-top: 0px;padding-left: 10px;/* border-left: 1px solid red; */'> 
															          		FASHION AND ALL THE FIXINGS. 
															        	</div>
																       </td>  												             
																	</tr></tbody>
																</table>
															</div>
													  	</center> 
										            	<center> 
										          			<div style='color:#1a386a; text-align:left; width: 530px; ;/* border: 1px solid white; */'> 
										                      	<center> 
										                      		<div style='color: 1a386a;font-size: 23px;  font-family:arial;   color:#c51d20;border-top:1px solid #ccc; border-bottom:1px solid #ccc;/* color: #1a386a; */padding: 15px 0px 15px 0px; line-height: 1;'> 
										                          		<b>FINALLY, SOMETHING COOL FOR BLOGGERS. </b>  
										                          	</div> 
										                      	</center> 
										                  		<div style='padding-top: 11px;/* border: 1px solid red; */text-align: left;color: #000000;'> Hey,  </div>
										                      	<div style='padding-top:15px;/* border: 1px solid red; */text-align: left;color: #000000;'>My name is Mauricio, my reason for emailing you is really very straight forward. <br> I am a fan of your blog and it's unfortunate that great contents like yours is not being seen by the masses. I created Fashion Sponge so bloggers who create compelling content could get the exposure they deserve. Now that I am days from launching my private beta, I knew I wanted to personlly invite you to join.</div> 
										                      	<div style='/* padding-top:15px; *//* border: 1px solid red; */text-align: left;color: #000000;'>   
																  	<p> 
																  		<b> WHAT IS FASHION SPONGE? </b>  
																  		<br>Fashion Sponge is the best place to post or discover whats fashionable in Fashion, Beauty, Lifestyle and Entertainment by people who share your interest. click <a href='fashionsponge.com/signup'> here </a> to learn more.</p>  
																</div>   
																<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#c51d20 ;text-align: center;line-height: 1;'> 
																  <b>  'This is not a site. It's a discovery engine.  Discover and get descovered.' </b>  
																</div> 
																<div style='width: 531px; padding-top:20px; padding-bottom:20px;/* border: 1px solid red; */'>  
																  		<img style='width:100%' src='http://test.fashionsponge.com/fs_folders/images/genImg/email-screenshots.png'>  
																</div> 					                                            
																<div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'> 
												                    <center> 
												                    <span style='font-family:arial; color:#c51d20'> 
												                        <b>SIGN UP NOW. SPACE IS LIMITED<br></b>
												                      <b style='font-size:12px;color:#000;font-family: arial;'>SIGNING UP</b>  
												                    </span><br> 
												                    <a href='fashionsponge.com/signup'>
												                    	<img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://test.fashionsponge.com/fs_folders/images/genImg/sign-up.png'> 
												                    </a>
												                    </center> 
												                </div>	
												           		<div style='padding-top: 40px;/* padding-bottom:70px; */text-decoration:none;/* border: 1px solid; */text-align: center;'><span style='color: black; '>  
							                                        Mauricio | Founder &amp; Creative Director  <br>
							                                        <a style='color:#b01e23'>Mauricio@fashionsponge.com</a> 
							                                  	</span></div>   
															</div> 
										                </center>  
										            </div> 
										        </td> 
										    </tr></tbody>
										</table>
									</center>  	
									<br>      
								</body>
							</html> 
							";     
	   	 				} 
	   	 				else{


	   	 						$link_private_beta      = "http://fashionsponge.com/email-redirect.php?email=$to&action=private-beta&qid=$qid&redirect=TRUE";
	   	 						$link_signup            = "http://fashionsponge.com/email-redirect.php?email=$to&action=signup&qid=$qid&redirect=TRUE";
	   	 						$link_remove            = "http://fashionsponge.com/email-redirect.php?email=$to&action=remove&qid=$qid&redirect=TRUE";
	   	 						$content['openTracker'] = "<img src='http://fashionsponge.com/email-redirect.php?email=$to&action=open&qid=$qid' style='height:0xp; width:0px;' alt='.' />";
  
		   	 					$content['invitation'] = "  ". $content['openTracker'] ."
			   	 					<p class='text-3'>Hi $invited_fn,   </p>
								    <p>    
								   		My name is <b> Mauricio</b>, I'm the Founder & Creative Director at Fashion Sponge. My reason for emailing 
								   		you is really very straight forward. I been a fan of your work and in my opinion your blog is amongst 
								   		the best blogs on the web.
								    </p>  
								    <p> 
								    	<b style='color:#c51d20' >Quick Question:</b> Are you finding it harder to get more page views, 
								    	likes or followers? If so, I aim to help you with your dilemma. 

								    </p> 
								    <p>   
										Being someone who loves fashion and lifestyle blogs I noticed a major issue... It's too many bloggers, 
										it's too many online communities and too many apps out there. It's becoming harder for myself and the masses 
										to see content by great bloggers like yourself. That's why I decided to create Fashion Sponge. Unlike most 
										communities Fashion Sponge is invite only. By limiting memberships to bloggers who create inspirational, 
										informative and entertaining content, Fashion Sponge will become a premiere destination for the best bloggers, 
										articles and inspiration.
								    </p> 
								    <p>  
								    	Now that we are days from launching the  
								    	<a style='color:#696969;text-decoration: underline;' href='$link_private_beta' target='_blank'>private beta</a>, 
								    	I knew I wanted to personally invite you to check out what 
								    	we been working on. It's no secret that everyone here at Fashion Sponge is proud of what we built, but we would 
								    	also be grateful for feedback to make this a community everyone will enjoy.
								    </p>
		   	 					";  
  
								$body =  " 
									<html xmlns='http://www.w3.org/1999/xhtml'>
									<head> 
									<!-- If you delete this tag, the sky will fall on your head -->
									<meta name='viewport' content='width=device-width, initial scale=1.0'> 
									<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>    
									</head>
									 
									<body bgcolor='#FFFFFF'>

									<!-- HEADER -->
									<!-- /HEADER -->

									<style type='text/css'> 
											/* ------------------------------------- 
													GLOBAL 
											------------------------------------- */
											* { 
												margin:0;
												padding:0;
											}
											* { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

											img { 
												max-width: 100%; 
											}
											.collapse {
												margin:0;
												padding:0;
											}
											body {
												-webkit-font-smoothing:antialiased; 
												-webkit-text-size-adjust:none; 
												width: 100%!important; 
												height: 100%;
											}


											/* ------------------------------------- 
													ELEMENTS 
											------------------------------------- */
											a { color: #2BA6CB;}

											.btn {
												text-decoration:none;
												color: #FFF;
												background-color: #666;
												padding:10px 16px;
												font-weight:bold;
												margin-right:10px;
												text-align:center;
												cursor:pointer;
												display: inline-block;
											}

											p.callout {
												padding:15px;
												background-color:#ECF8FF;
												margin-bottom: 15px;
											}
											.callout a {
												font-weight:bold;
												color: #2BA6CB;
											}

											table.social {
											/* 	padding:15px; */
												background-color: #ebebeb;
												
											}
											.social .soc-btn {
												padding: 3px 7px;
												font-size:12px;
												margin-bottom:10px;
												text-decoration:none;
												color: #FFF;font-weight:bold;
												display:block;
												text-align:center;
											}
											a.fb { background-color: #3B5998!important; }
											a.tw { background-color: #1daced!important; }
											a.gp { background-color: #DB4A39!important; }
											a.ms { background-color: #000!important; }

											.sidebar .soc-btn { 
												display:block;
												width:100%;
											}

											/* ------------------------------------- 
													HEADER 
											------------------------------------- */
											table.head-wrap { width: 100%;}

											.header.container table td.logo { padding: 15px; }
											.header.container table td.label { padding: 15px; padding-left:0px;}


											/* ------------------------------------- 
													BODY 
											------------------------------------- */
											table.body-wrap { width: 100%;}


											/* ------------------------------------- 
													FOOTER 
											------------------------------------- */
											table.footer-wrap { width: 100%;	clear:both!important;
											}
											.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
											.footer-wrap .container td.content p {
												font-size:10px;
												font-weight: bold;
												
											}


											/* ------------------------------------- 
													TYPOGRAPHY 
											------------------------------------- */
											h1,h2,h3,h4,h5,h6 {
											font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
											}
											h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

											h1 { font-weight:200; font-size: 44px;}
											h2 { font-weight:200; font-size: 37px;}
											h3 { font-weight:500; font-size: 27px;}
											h4 { font-weight:500; font-size: 23px;}
											h5 { font-weight:900; font-size: 17px;}
											h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

											.collapse { margin:0!important;}

											p, ul { 
												margin-bottom: 10px; 
												font-weight: normal; 
												font-size:14px; 
												line-height:1.6;
											}
											p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
											p.last { margin-bottom:0px;}

											ul li {
												margin-left:5px;
												list-style-position: inside;
											}

											/* ------------------------------------- 
													SIDEBAR 
											------------------------------------- */
											ul.sidebar {
												background:#ebebeb;
												display:block;
												list-style-type: none;
											}
											ul.sidebar li { display: block; margin:0;}
											ul.sidebar li a {
												text-decoration:none;
												color: #666;
												padding:10px 16px;
											/* 	font-weight:bold; */
												margin-right:10px;
											/* 	text-align:center; */
												cursor:pointer;
												border-bottom: 1px solid #777777;
												border-top: 1px solid #FFFFFF;
												display:block;
												margin:0;
											}
											ul.sidebar li a.last { border-bottom-width:0px;}
											ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



											/* --------------------------------------------------- 
													RESPONSIVENESS
													Nuke it from orbit. It's the only way to be sure. 
											------------------------------------------------------ */

											/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
											.container {
												display:block!important;
												max-width:600px!important;
												margin:0 auto!important; /* makes it centered */
												clear:both!important;
											}

											/* This should also be a block element, so that it will fill 100% of the .container */
											.content {
												padding:15px;
												max-width:600px;
												margin:0 auto;
												display:block; 
											}

											/* Let's make sure tables in the content area are 100% wide */
											.content table { width: 100%; }


											/* Odds and ends */
											.column {
												width: 300px;
												float:left;
											}
											.column tr td { padding: 15px; }
											.column-wrap { 
												padding:0!important; 
												margin:0 auto; 
												max-width:600px!important;
											}
											.column table { width:100%;}
											.social .column {
												width: 280px;
												min-width: 279px;
												float:left;
											}

											/* Be sure to place a .clear element after each set of columns, just to be safe */
											.clear { display: block; clear: both; }


											/* ------------------------------------------- 
													PHONE
													For clients that support media queries.
													Nothing fancy. 
											-------------------------------------------- */
											@media only screen and (max-width: 600px) {
												
												a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

												div[class='column'] { width: auto!important; float:none!important;}
												
												table.social div[class='column'] {
													width:auto!important;
												}
											}

											.header-1 { 
											/* border:1px solid red; */
												text-align:center;
											} 
											.header-1 div  { 
												margin:auto; 
											} 
											.text-1 { 
												color: 1a386a;
												font-size: 23px;  
												font-family:arial;   
												color:#c51d20;
												border-top:1px solid #ccc; 
												border-bottom:1px solid #ccc; 
												padding: 15px 0px 15px 0px; 
												line-height: 1;
												font-weight:bold;
											}
											.text-2{ 
												font-weight:bold;
											}
											.image{ 
												padding-bottom:20px;
												padding-top:20px;
											}
											.container-1{
												border: 1px solid #f4f3f2;  
												padding: 10px;
											}
											table.table-1 {
											    width: 100%;
											    padding-bottom: 10px;
											}
											 

											td.logo {
											    width: 50%;
											}

											td.logo img {
											    float: right;
											} 

										</style>
									<!-- BODY --> 
									<table class='body-wrap'>
										<tbody><tr>
											<td> </td>
											<td class='container' bgcolor='#FFFFFF'> 
												<div class='content'>
												<table>
													<tbody><tr> 
														<td class='container-1' style='border:1px solid #f4f3f2;padding:10px;color:#1a386a;font-size: 13px;' > 
																  <div class='header-1'> 
																  <center>  
												                       



												                       <table style='width: 100%;'  border='0' cellspacing='0' cellpadding='0' class='table-1' > 
								                                            <tbody> 
								                                            <tr>                       
								                                                <td> 
								                                                    <div> 
								                                                        <img style='cursor:pointer; width:100%; ' src='http://fashionsponge.com/fs_folders/images/email/Header-image.png'>  
								                                                    </div> 
								                                                </td>                                                                                    
								                                                </tr>
								                                            </tbody>
								                                        </table>  

															  	</center></div> 

													<center> 
														<h3 class='text-1' style='color:#1a386a;font-size:23px; border-bottom: 1px solid #f4f3f2;border-top: 1px solid #f4f3f2;padding: 15px 0px 15px 0px;line-height: 1;font-weight: bold;'> FINALLY, SOMETHING COOL FOR BLOGGERS. </h3>
													</center> 
													<div class='lead'>  
													    " . $content['invitation'] . "
													</div> 
													<div class='lead'> 
														<p class='text-2'><b>WHAT IS FASHION SPONGE?</b></p>   
													  	<p>  
															Fashion Sponge is where fashion and lifestyle bloggers can grow their audience and readers can 
															discover the latest in Fashion, Beauty and Lifestyle. 
													  	</p> 								 
													</div> 
													<div class='lead'> 
														<p>
					                                 		 <span style='color:#1a386a;'>  
						                                        Mauricio | Founder &amp; Creative Director  <br>
						                                        <a style='color:#696969;'>Mauricio@fashionsponge.com</a> 
						                                  	</span>
														 </p>
 													</div> 
													<div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#1a386a;text-align: center;line-height: 1;'> 
														<b>  \"This is not a site. It's a discovery engine.  Discover and get discovered.\"</b>  
													</div>
													 
													<!-- A Real Hero (and a real human being) -->
													<p class='image'>
														<a href='fashionsponge.com' target='_blank'>

															<table border='0' cellpadding='0' cellspacing='0' style='padding:  10px 0px 10px 0px;' >
										                    		<tr> 
										                    			<td> 	
										                    				<img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-discover.png'> 
										                    			</td>
										                    			<td> 
										                    				<img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-exposure.png'> 
										                    			</td> 
										                    		<tr> 
										                    			<td> 
										                    				<img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-inspiration.png'> 
										                    			</td>
										                    			<td>
										                    				<img style='width:100%; height:auto;cursor: pointer;' src='http://fashionsponge.com/fs_folders/genImg/email-feedback.png'> 
										                    			</td> 
										                    		<tr> 
										                    	</table>    
														</a>
							  						<!-- footer  !-->  
							  							<div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'> 
										                    <center> 
										                    <span style='font-family:arial; color:#c51d20;'>
										                        <b style='font-size: 23px;'>SIGN UP NOW. SPACE IS LIMITED.<br></b>
										                      <b style='font-size:12px;color:#1a386a;font-family: arial;'>
															  SIGNING UP TAKES ONLY TWO SECONDS.  
															</b>  
										                    </span><br> 
										                    <a href='$link_signup' target='_blank'>
										                    	<img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://test.fashionsponge.com/fs_folders/images/genImg/sign-up.png'> 
										                    </a>
										                    </center> 
										                </div> 
															<div style='padding-top: 10px; text-decoration:none; text-align: center;'>

														  <p>
																This invitation was sent to <a style='color:#696969;'>$to</a>  If you don't want to receive emails from Fashion Sponge in the future, click <a style='color:#696969;text-decoration: underline;' href='$link_remove' target='_blank'> here </a>  to remove your email.
														  </p>

														</div> 
													<!-- Callout Panel -->
													<!-- /Callout Panel --> 	 	 			
													<!-- social & contact -->
													<!-- /social & contact --> 
												</td>
											</tr>
										</tbody></table>
										</div> 			
									</td>
									<td></td>
									</tr>
									</tbody></table><!-- /BODY -->   
								 	</body>
								 </html> ";   
		   	 				}
						// echo " $body ";
	   	 			break;
	   	 		default: 
	   	 			break;
	   	 	}
            $headers = '';
  			$headers  .= "Content-type: text/html\r\n";  
			$headers  .= "From: $from\r\n";  
		    $headers  .= "Disposition-Notification-To: $from\n"; 
			$headers  .= "X-Confirm-Reading-To: $from\n"; 


            echo $body;

   			if (mail($to, $subject, $body, $headers)) {  
   				// echo " $type <span style='color:green'>successfully </span> sent to $invited_email from  $from <br> ";
   				return TRUE;
   			}  
   			else{
   				// echo " $type <span style='color:red'> successfully </span> sent to $invited_email from  $from <br> ";
   				return FALSE;
   			}
		}   
		public function print_twms_invite_popup( $page ) { ?>   

			<link rel="stylesheet" type="text/css" href="fs_folders/fs_popUp/popUp_style_file/twms_contest.css">  
			<script type="text/javascript"	        src="fs_folders/fs_popUp/popUp_js_file/twmspopup_ajax.js" ></script>  
			<?php 
				$this->init_peoplebehindyou_peopleaheadofyou( );   
				$this->twms_invite_popUp( TRUE ,  'CONTESTANT' );     
				$this->invite_popUp_newsletter( );  
			 ?>   
			<div id='gen-popup-wrapper'> 
				<div id="popUp-container-gen" >   
					<center>    
						<div id="popup-wrapper" > 
							<div id="popup-wrapper-body" > 
								<div id="popup-wrapper-body-close" > 
									<img src='<?php echo "$this->genImgs/popup-close-icon.png"; ?>' onclick='close_popup()' >
								</div>
						  		<table id="popup-wrapper-table" border="0" cellpadding="0" cellspacing="0" > 
						  			<tr> 
						  				<td id="popup-wrapper-table-left-content" >  
						  					<img src='<?php echo "$this->genImgs/pop-up-image.jpg"; ?>' id='left-image'  > 
						  				</td>   
						  				<td id="popup-wrapper-table-right-content"   >  
											<center> 
												<!-- <form name='gen_popup_form' name='form' onSubmit="return gen_popup_check_invited_info();" method="post" action="info"  > -->
													<table id="popup-wrapper-table-right-content-table" border="0" cellspacing="0" cellpadding="0"  >
														<tr>  	
															<td > 
																<span  style='letter-spacing:3px; font-family:MisoLight; font-size:35px' > SIGN UP NOW TO <br> STAY INFORMED  </span> <br>
										 						<span style='font-size:15px;' > You don't want to be fashionably late. </span> 
															</td>
														<tr> 
															<td id='gen-invite-popup-fields' >  
																<center>
																	<input  type='text' id="popup_invited_email" name="gen_popup_invited_fn_and_ln" value ="EMAIL(*)"  ><br> 

																	<input  type='text'  id="popuop_website_or_blog" name="gen_popup_invited_email"     value="WEBSITE OR BLOG"  >    
																</center>
															</td>
														<tr> 
															<td id="popup-wrapper-table-right-content-table-guarantee" >  
																<table id="popup-table-security"   border="0" cellpadding="0" cellspacing="0" width="94%"  > 
																	<tr> 
																		<td style=" text-align:left; width:270px;  text-align:center" >  
																			<span style='font-size:15px;' >We guarantee 100% privacy. <br> Your information will never be shared. </span> 
																		</td>   
																		<td width="40px;" id="privacy-lock" > 
																			<div style="float:left" > 
																				<img src='<?php echo "$this->genImgs/lock.png"; ?>' style='padding-left:5px;'  >
																			</div>
																		</td>
																</table> 
															</td>  
														<tr> 
															<td id="gen-invite-popup-signup" >   
																<input id="send_invited_info1"  type='button' name="gen_invite_submit" value='SIGN UP' onclick="gen_popup_check_invited_info( 'contest' )" style="margin-left:20px;" >
																 
															</td>  
													</table>
												</center> 
											<!-- </form> -->
						  		</table>
					  		</div>
						</div>  
					</center> 
				</div> 
			</div>
			<!--  
			<div id="original_content">
			<br><br><br><br>
				at the back 
			</div> 
			 --> 

			<?php 
		}  
		public function twms_invite_popUp($response_text , $invited_fn , $page=null ) { 
			if ($response_text) {
				$this->auto_detect_path();	
				// $this->Tpeopl_in_front = count($mem);
				// $this->Tpeopl_in_front += 5034;
				// $this->people_behind_you = rand(50,100); 
				// $invited_fn = 'jesus Erwin Suarez';
                // $Tpeopl_in_front = 100;
                // $people_behind_you = 200;  
 
				$mem=selectV1(
					'invited_id',
					'fs_invited'
				);
				$tinvited = count($mem); 
				$this->Tpeopl_in_front = $tinvited + 700;	 
				$this->people_behind_you = $this->Tpeopl_in_front-700;    
				$this->init_peoplebehindyou_peopleaheadofyou( ); 
					?>  
						<div id='invite_after_submit' style="display:none;" > 
							<div id='invite-popup-response-wrapper' > 
		                        <div id='invite-popup-response-wrapper-body' > 
		                            <center>
		                                <div id='invite-popup-response-wrapper-content'>  
		                                    <div  id='invite-popup-response-wrapper-content-right' > 

		                                        <div id='invite-popup-response-wrapper-content-right-content' >  
		                                            <table border="0" cellspacing="0" cellpadding="0" > 
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title1' > 
		                                                        <!-- <center> -->
		                                                            <span> HELP SPREAD THE WORD  </span>
		                                                        <!-- </center>  -->
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-desc' >  
		                                                        <span>  
		                                                               If you know of anyone who would love to get their place in line next to you, send them an invite  now by clicking the share buttons below.
		                                                        </span>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-title2' >  
		                                                        <center>
		                                                            <span> 
		                                                                SHARE  
		                                                            </span>
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td id='invite-popup-response-wrapper-content-right-content-share' >  
		                                                        <center>
		                                                            <table border="0" cellpadding="0" cellspacing="0" > 
		                                                                <tr> 
		                                                                    <td>     
		                                                                        <img title="facebook"  src='<?php echo "$this->genImgs/white-facebook-icon.png"; ?>'    onclick="share_fb_specifi_page( 'http://fashionsponge.com/contest' )"    > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="twitter"  src='<?php echo "$this->genImgs/white-twitter-icon.png"; ?>'     onclick="share_twitter_specifi_page( 'http://fashionsponge.com/contest' )" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="tubmblr"  src='<?php echo "$this->genImgs/white-tumblr-icon.png"; ?>'      onclick="share_tumblr()" > 
		                                                                    </td>
		                                                                    <td> 
		                                                                        <a href="https://plus.google.com/share?url={http://fashionsponge.com/contest}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		                                                                            <img title="good plus"  src='<?php echo "$this->genImgs/white-google-plus-icon.png"; ?>' > 
		                                                                        </a>
		                                                                    </td>
		                                                                    <td> 
		                                                                        <img title="e-mail"  src='<?php echo "$this->genImgs/white-email-icon.png"; ?>'       onclick="share_gmail()" > 
		                                                                    </td>  
		                                                            </table> 
		                                                        </center>
		                                                    </td>
		                                                <tr> 
		                                                    <td> 
		                                                        </center> 
		                                                        	<?php  
		                                                        		if ( $page == 'invite' ) {
		                                                        			echo "
		                                                        				<a href='/'>
		                                                        					<input id='invite-popup-done' type='submit' value='DONE'  />
		                                                        				</a>
		                                                        			";	
		                                                        		}else{
		                                                        			echo "<input id='invite-popup-done' type='submit' value='DONE'  />";	
		                                                        		} 
		                                                        	?> 
		                                                        <center>
		                                                    </td>
		                                            </table> 
		                                        </div> 
		                                    </div> 
		                                    <div id='invite-popup-response-wrapper-content-left' >
		                                        <br><br>
		                                        <p> 
		                                             Hi  <span id='fn' > <?php echo ucfirst($invited_fn); ?></span>,  
		                                        </p>  
		                                        <p> 
		                                            THANK YOU FOR SIGING UP. YOU WILL BE NOTIFIED WHEN WE START ACCEPTING ENTRIES. IF YOU PROVIDED YOUR WEB ADDRESS, WE MAY ALSO CONTACT YOU ON YOUR SOCIAL PROFILES TO ENSURE YOU DON’T MISS THE DEADLINE.
		                                        </p>
		                                        <p>
		                                        	ALSO, I JUST SENT YOU AN EMAIL. IF YOU DON’T SEE THE EMAIL CHECK YOUR SPAM FOLDER.
		                                        </p> 
		                                        <p>  
													BYE THE WAY  <span id='bold_red'> <?php echo $_SESSION['twms_Tpeopl_in_front']; ?> </span> PEOPLE SIGNED UP BEFORE YOU AND <span id='bold_red'> <?php echo rand(1,50) ?> </span>  PEOPLE SIGNED UP AFTER YOU. 
		                                        </p>  
		                                        <p>
		                                            THANKS,
		                                        </p>  
		                                        <p>
		                                            <span>  
		                                                MAURICIO - FOUNDER & CREATIVE DIRECTOR <br>
		                                                "DON'T JUST DRESS. DRESS WELL.&#153;" 
		                                            </span>
		                                        </p>
		                                        <div id='inviteFriendsC' > 
		                                            <div id='invite_ur_friends' >  
		                                                <span>
		                                                    <!-- INVITE YOUR FRIENDS -->
		                                                </span>
		                                            </div>  
		                                        </div> 
		                                    </div> 
		                                </div> 
		                            </center>
		                        </div>
		                    </div>   
		                    <script type="text/javascript"> 
		                    	$(document).ready(function ( ) {
		                    		$("#invite-popup-done").click(function ( ) {
		                    			 // alert("close the popup!");
		                    			 $('#invite_after_submit').fadeOut('normal');
		                    		})
		                    	}) 
		                    </script>

		                    <style type="text/css"> 
		                        /* MisoRegular */
		                        /* MisoLight */
		                        /* MisoBold */  
		                        body { padding: 0px; margin:0px;  }
		                        #invite_after_submit {  position:fixed;   z-index: 106;   width:100%;  height: 100%;  background-color: rgba(000,000,000,0.8);   }
		                        #invite-popup-response-wrapper{ /*margin-top: 200px;*/  /*border: 1px solid red;*/  text-transform:uppercase; font-family: 'arial'; font-size: 12px; font-weight: bold;  }
		                            #invite-popup-response-wrapper-body { margin: auto;  background-color: #fff; width: 980px; border: 8px solid #1a386a; padding-top:20px;padding-bottom:20px;   }
		                                #invite-popup-response-wrapper-content {  padding: 20px;  text-align: left; background-color: #f5f4f1; width: 900px; }
		                                    #invite-popup-response-wrapper-content img { cursor: pointer; } 
		                                    #invite-popup-response-wrapper-content-left { /*border: 1px solid #000;*/ width: 460px; height: 370px;  color: #1a386a; font-size: 13px;   }
		                                        #invite-popup-response-wrapper-content-left p { padding-bottom: 10px; }
		                                        #bold_red {  color: #b32727; }
		                                    #invite-popup-response-wrapper-content-right {  -moz-box-shadow:  5px 5px 0px #ccc; -webkit-box-shadow: 5px 5px 0px #ccc; box-shadow: 5px 5px 0px #ccc; /*border: 1px solid #000;*/ float: right; width:400px; /*height: 200px; */ padding-right: 20px; }
		                                   #invite-popup-response-wrapper-content-right span { color: #fff; } 
		                                    #invite-popup-response-wrapper-content-right-content { width:390px;padding-left: 15px;    padding-right: 15px;padding-top: 30px;padding-bottom: 30px; border: 1px solid #000; background-color: #1a386a; /* height: 200px; width: 200px;*/ }
		                                    #invite-popup-response-wrapper-content-right-content-title1 { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-title1 span { font-size: 48px; font-family: 'MisoRegular' }
		                                     #invite-popup-response-wrapper-content-right-content-desc { padding-bottom: 30px; }
		                                        #invite-popup-response-wrapper-content-right-content-desc span {  }
		                                    #invite-popup-response-wrapper-content-right-content-title2 { padding-bottom: 10px; }
		                                        #invite-popup-response-wrapper-content-right-content-title2 span { font-size: 30px; font-family: 'MisoRegular'   }
		                                    #invite-popup-response-wrapper-content-right-content-share { padding-bottom: 20px; }
		                                        #invite-popup-response-wrapper-content-right-content-share td { padding-left: 15px;}
		                                        #invite-popup-response-wrapper-content-right-content-share  img { /*border: 1px solid #000;*/ } 
		                                        #invite-popup-done { border:none; cursor: pointer;  background: url("fs_folders/images/attr/submit.png") no-repeat scroll 0 0 transparent;   font-weight: bold; background-size: 100% auto; padding-bottom: 5px; position: relative;  z-index: 100;  width: 97.5%; height: 35px;     border-radius: 5px;  color: #ffffff;  font-weight: bold;  font-size: 11px;  font-family: 'arial';  letter-spacing: 2px;   margin-left: -2px; } 
		                    </style> 
						</div> 
					<?php
			}
		}   
		public function insert_ads_to_posts($r) {
			print_r($r);
			 echo " insert_ads_to_posts() ";
		} 
		public function button_api_google( ) { ?>
            <!-- Place this tag where you want the +1 button to render. -->
			<div class="g-plusone" data-size="tall" data-annotation="none"></div>
			<!-- Place this tag after the last +1 button tag. -->
			<script type="text/javascript">
			  (function() {
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
			<?php    
            } 
        public function button_api_facebook( ) {  
            ?> 
            <!-- <div id="api_div_fb">  --> 
	            <a href="#" 
	              onclick="
	                window.open(
	                  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://fashionsponge.com/invite'), 
	                  'facebook-share-dialog', 
	                  'width=626,height=436',
	                  'name=facebookname',
					  'caption=caption'
	                  ); 
	                   return false;"
	                 >
	                <!-- <input id="api_fb_share_button" type="button" value="fb-shre" />	 -->
	                <img id="api_fb_share"   src="fs_folders/images/api/shareButtons/fb-share.png">
            	</a>	
            <!-- </div> --> 
            <!-- 
				fb share 
				Are u a blogger who wants more readers? Are you a reader who wants to discover more quality blogs? Do u seek fashion inspiration or u just love posting your outfit of the day? If yes, Click the link NOW to learn more about @fashionsponge.
			 --> 
            <!-- <img id="fbshare" src="fs_folders/images/api/shareButtons/google+.png"> -->
            <?php 
        }
        public function button_api_twitter( ) {
            ?>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://fashionsponge.com/invite" data-text="FashionSponge is that one fashion community you always wanted to join. Visit NOW to learn more and request an invite." data-count="none">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			

			<?php
        }   
        public function clean_input( $str ) {

        	$invalid_characters = array("$", "%", "#", "<", ">", "|");
			$str = str_replace($invalid_characters, "", $str);	 
			$str = stripslashes($str);  
	 		return $str;	 
	 	}	 
	 	public function fs_delete_data( $data , $type , $page=null ) {
	 			
	 		// $plno = 549; 

	 		if ( $type == "fs_look") { 

	 			$this->auto_detect_path();
	 			$table_name  = 'postedlooks';
			 	$plno        = $data; 
			 	$table_id    = $plno; 

			 	$lookowner_mno = $this->get_look_owner_mno( $plno );  

			 	$plcm=select( 'posted_looks_comments', 7, array('plno	',$plno) ); 
					$cids=convert_1d($plcm,0); 
					if (!empty($cids))  {
						for ($i=0; $i <count($cids) ; $i++)  { 
							 delete('plc_replies',array('plcno',intval($cids[$i])));
							 delete('posted_looks_comments_like_dislike',array('plcno',intval($cids[$i])));
							 delete('fs_plcm_reply',array('plcno',intval($cids[$i])));
							 delete('fs_plcm_dislike',array('plcno',intval($cids[$i])));
						}
					} 	
				delete('activity',array('_table_id',intval($plno)));
				delete('fs_pltag',array('plno',intval($plno)));
				delete('postedlooks',array('plno',intval($plno)));
				delete('ratings',array('plno',intval($plno)));
				delete('pl_drips',array('plno',intval($plno)));
				delete('pl_loves',array('plno',intval($plno)));
				delete('posted_looks_comments',array('plno',intval($plno))); 
				delete('fs_look_votes',array('plno',intval($plno))); 
				delete('fs_look_votes_details',array('plno',intval($plno)));  


				# delete notification 

						 		
			      $response =  $this->posted_modals_notification_Query ( 
			          array(      
			            'table_name'=>$table_name,
			            'table_id'=>$table_id, 
			            'notification_query'=>'delete'  
			          ) 
			      ); 


					$this->message(" table_name = $table_name and table_id = $table_id delete notification " , $response , "" );


	 			# fs drip 

	 				$response = $this->fs_drip_modals_Query( 
	 					array( 
	 						'table_name'=>$table_name, 
	 						'table_id'=>$table_id, 
	 						'query_drip'=>'delete' 
 						) 
 					); 

 					$this->message( 'drip delete ' , $response , '' );

	 				# fs favorite 

	 					$response =  $this->fs_favorite_modals_Query( 
	 						array( 
	 							'table_name'=>$table_name, 
	 							'table_id'=>$table_id, 
	 							'query_favorite'=>'delete' 
	 						) 
	 					);  
	 					$this->message( 'favorite delete ' , $response , '' );

					# fs view 

	 					$response = $this->fs_view(
	 					 	array(   
	 					 		'table_name'=>$table_name,
	 					 		'table_id'=>$table_id, 
	 					 		'type'=> 'delete'  
	 					 	)  
	 					);  

	 					$this->message( 'view delete ' , $response , '' );


 
 
				// delete ratings
					$this->posted_modals_rate_Query( array( 'table_id'=> $plno,  'table_name'=> 'postedlooks',  'rate_query'=>'rate-delete' ) );    
				// caculate new percentage and ratings
					$response = $this->RATING( array( 'type'=> 'calculate-percentage-user' , 'mno' => $lookowner_mno ) ); 	
		 		// update user perncentage    
					$this->update_fs_table_auto( $lookowner_mno , array( 'tpercentage'=>$response['tpercentage'] , 'tratings'=> $response['tratings'] , 'tlooks' ) , 'fs_members' ); 
 

				$this->look_folder              = 'fs_folders/images/uploads/posted looks/original looks uploaded';
				$this->look_folder_cropped    = 'fs_folders/images/uploads/posted looks/cropped'; 
				$this->look_folder_home         = 'fs_folders/images/uploads/posted looks/home';
				$this->look_folder_lookdetails  = 'fs_folders/images/uploads/posted looks/lookdetails';
				$this->look_folder_socialShare  = 'fs_folders/images/uploads/posted looks/socialShare';
				$this->look_folder_thumbnail    = 'fs_folders/images/uploads/posted looks/thumbnail'; 


  
				switch ( $page ) {
					case 'lookdetails': 
							echo "case look detials ";
							if ( @unlink("../../../$this->look_folder/$plno.jpg") ) { 
								echo "$this->look_folder/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->look_folder/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
						 	if ( @unlink("../../../$this->look_folder_home/$plno.jpg") ) { 
								echo "$this->look_folder_home/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->look_folder_home/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("../../../$this->look_folder_lookdetails/$plno.jpg") ) { 
								echo "$this->look_folder_lookdetails/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->look_folder_lookdetails/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("../../../$this->look_folder_thumbnail/$plno.jpg") ) {  
								echo "$this->look_folder_thumbnail/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->look_folder_thumbnail/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("../../../$this->look_folder_cropped/$plno.jpg") ) {  
								echo "$this->look_folder_cropped/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "../../../$this->look_folder_cropped/$plno.jpg <span class='red' > failled delete </span> <br>";
							} 
						break;
					
					default:
							echo "case look Default ";
							if ( @unlink("$this->unlink_look/$plno.jpg") ) { 
								echo "$this->unlink_look/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->unlink_look/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
						 	if ( @unlink("$this->unlink_look_home/$plno.jpg") ) { 
								echo "$this->unlink_look_home/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->unlink_look_home/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("$this->unlink_look_lookdetails/$plno.jpg") ) { 
								echo "$this->unlink_look_lookdetails/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->unlink_look_lookdetails/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("$this->unlink_look_thumbnail/$plno.jpg") ) {  
								echo "$this->unlink_look_thumbnail/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->unlink_look_thumbnail/$plno.jpg <span class='red' > failled delete </span> <br>";
							}
							if ( @unlink("$this->unlink_look_cropped/$plno.jpg") ) {  
								echo "$this->unlink_look_cropped/$plno.jpg <span class='green' > succesfully deleted </span> <br>";
							} 
							else{ 
								echo "$this->unlink_look_cropped/$plno.jpg <span class='red' > failled delete </span> <br>";
							} 
						break;
				} 
	 		}
	 		if ( $type == "fs_member") { }
	 		if ( $type == "fs_article")  {  
	 		}
	 		if ( $type == "fs_media")  { }
	 	} 
		public function split_string_single($string , $long_text_tobe_plit , $cut_every ){ 
		    // echo strlen($string);

		    // $cut_every = 5;
		    // $long_text_tobe_plit = 20;

		    $strlen = strlen($string);

		    if ($strlen >= $long_text_tobe_plit) 
		    {
		        // echo "<br>split<br>";

		        for ($i=0; $i < $strlen; $i++) 
		        { 
		             if ($i%$cut_every==0) 
		             {
		                  // echo "$i split <br>";
		                  $string1 = substr($string,$i,$cut_every);

		                  $string1 = $string1;
		                  // echo "$i = $string1 <br>";
		                  $new_string .= $string1.' ';


		                  // $new_string = substr_replace($string,'-', $i);
		             }
		        }
		        // echo "new string is = $new_string <br>";
		        return $new_string;
		    }
		    else  
		    {
		        // echo 'don\'t split <br>';
		    	return $string.' '; 
		    }
		}
	    function split_string_multiple($string , $long_text_tobe_plit , $cut_every){ 
	    	$new_string = "";
	    	$new_string1 = "";
	        $stringA = explode(' ', $string);
	        // print_r($stringA);
	        $str_A_len = count($stringA);

	        for ($i=0; $i < $str_A_len ; $i++) 
	        { 
	        	// echo " $i =".$stringA[$i] .'<br>';
	            $new_string = $this->split_string_single($stringA[$i] , $long_text_tobe_plit , $cut_every);
	            // echo $new_string.'<br>';
	            $new_string1.=$new_string;
	        }
	        // $new_string1.=$new_string;


	         // echo "new string = $new_string1 <br>"; 
	         return $new_string1;
	    }
	    public function dialog1( $type , $message  ) {
	    	if ( $type == "alert") 
	    	{
		    	echo " 
		    	<script> 
		    		alert('$message');
		    	</script> ";
	    	}
	    	else if ( $type == "confirm" ) 
	    	{ 
	    		 	echo " 
		    	<script> 
		    		confirm('$message');
		    	</script> ";
	    	}
	    }
	    public function plugins( $plugInName , $page=null ) {
	    	if ($plugInName == "google analytic") 
	    	{
	    		// $this->dialog( "alert" , "google analytic initialized"  );
	    		 // echo " this is plugin for the google analytic <br>";
	    		 include_once("fs_folders/google_analytics/analyticstracking.php");
	    	}
	    }
	    public function get_visitor_info( $ip=null , $page=null , $visited=null ){ 
	    	// echo "visitor detect ";
	    	/*
				  if ( empty( $ip )) 
				  {
				    $client  = @$_SERVER['HTTP_CLIENT_IP'];
				    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
				    $remote  = $_SERVER['REMOTE_ADDR'];

				    // echo " ip $client";
				    if(filter_var($client, FILTER_VALIDATE_IP))
				    {
				        $ip = $client;
				    }
				    elseif(filter_var($forward, FILTER_VALIDATE_IP))
				    {
				        $ip = $forward;
				    }
				    else
				    {
				        $ip = $remote;
				    }
				  }
				  // $ip = "216.115.69.144";
				$content = file_get_contents("http://www.speedguide.net/ip/$ip"); 
				$cty_start_pos = strpos($content, "City: </td><td>");
				$cty_start_pos+=5;
				$init_city = substr($content,$cty_start_pos , 100);
				$city_end_pos = strpos($init_city, "</td></tr>");
				$city = substr($init_city,0,$city_end_pos);
				$city  = str_replace("</td><td>","", $city); 
				$country_start_pos = strpos($content, "Country: </td><td>");
				$country_start_pos+=8;
				$init_country = substr($content,$country_start_pos , 100);
				$country_end_pos = strpos($init_country, "<img");
				$country = substr($init_country,0,$country_end_pos);
				$country  = str_replace("</td><td>","", $country);  
				$subject = " fs new visitor detected.";
				$to = "mrjesuserwinsuarez@gmail.com";
				$body = " new visitor info : \n
							visited page:  $page \n 
				   			ip: $ip \n 
				   			city: $city \n
				   			country : $country \n 
				    		";  
				if ( $visited == "home") 
				{ 
				 	mail($to, $subject, $body, "From:$country $page@page.com"); 
				}
				else 
				{  
				 	mail($to, $subject, $body, "From: $page@$country.com");  
				}  
			*/
	    }
	    public function header_attribute( $page_title=null , $page_description="Fashion Sponge is the best place to post or discover whats fashionable in Fashion, Beauty, Entertainment and Lifestyle by people who share your interest." , $keywords="current fashion trends, fall fashion trends, spring fashion trends, summer fashion trends, fashion trends and accessories, emerging fashion trends, street style fashion inspiration, chic fashion inspiration, menswear fashion inspiration, streetwear fashion inspiration, fashion inspiration, beauty tips, ootd, fashion blogs, fashion bloggers, menswear fashion bloggers, preppy fashion bloggers, streetwear fashion bloggers, latest fashion, fashion news, celebrity fashion, how to fashion tips, dyi fashion, beauty hauls, wardrobe stylist, fashion designers, fashion model, men fashion models, female fashion models" , $array=null  ){  ?> 

	    	<?php  
	    		$header['type'] = (!empty($array['type'])) ? $array['type'] : null ;  
	    	?> 
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>  <?php echo $page_title; ?>  </title>
			<!-- <meta name="description" content="<?php echo $page_description; ?>" />  -->
			<meta name="keywords" content="<?php echo $keywords; ?>" itemprop="keywords" /> 
			<meta name="author" content="Fashionsponge" > 

			<link rel="apple-touch-icon" sizes="57x57" href="fs_folders/images/fabicon/apple-touch-icon-57x57.png" />
			<link rel="apple-touch-icon" sizes="114x114" href="fs_folders/images/fabicon/apple-touch-icon-114x114.png" />
			<link rel="apple-touch-icon" sizes="72x72" href="fs_folders/images/fabicon/apple-touch-icon-72x72.png" />
			<link rel="apple-touch-icon" sizes="144x144" href="fs_folders/images/fabicon/apple-touch-icon-144x144.png" />
			<link rel="apple-touch-icon" sizes="60x60" href="fs_folders/images/fabicon/apple-touch-icon-60x60.png" />
			<link rel="apple-touch-icon" sizes="120x120" href="fs_folders/images/fabicon/apple-touch-icon-120x120.png" />
			<link rel="apple-touch-icon" sizes="76x76" href="fs_folders/images/fabicon/apple-touch-icon-76x76.png" />
			<link rel="apple-touch-icon" sizes="152x152" href="fs_folders/images/fabicon/apple-touch-icon-152x152.png" />
			<link rel="icon" type="image/png" href="fs_folders/images/fabicon/favicon-196x196.png" sizes="196x196" />
			<link rel="icon" type="image/png" href="fs_folders/images/fabicon/favicon-160x160.png" sizes="160x160" />
			<link rel="icon" type="image/png" href="fs_folders/images/fabicon/favicon-96x96.png" sizes="96x96" />
			<link rel="icon" type="image/png" href="fs_folders/images/fabicon/favicon-32x32.png" sizes="32x32" />
			<link rel="icon" type="image/png" href="fs_folders/images/fabicon/favicon-16x16.png" sizes="16x16" />
			<meta name="msapplication-TileColor" content="#da532c"> 
			<meta name="msapplication-TileImage" content="/mstile-144x144.png" />   

				<!-- font -->
					<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
				    <link rel="stylesheet" type="text/css" href="fs_fol
				    ders/style/fonts/miso_light_macroman/stylesheet.css">
					<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">  



						





			<?php switch ( $header['type'] ) {
				case 'responsive': ?>


							<!-- Latest compiled and minified CSS -->

				 				<link rel="stylesheet" type="text/css" href="fs_folders/js/bootstrap-3.3.1-dist/dist/css/bootstrap.min.css">

			 				<!-- Latest compiled and minified JavaScript -->

			 					<link rel="stylesheet" type="text/css" href="fs_folders/js/bootstrap-3.3.1-dist/dist/css/bootstrap-theme.min.css">

			 				<!-- Latest compiled and minified JavaScript -->

			 					<script src="fs_folders/js/bootstrap-3.3.1-dist/dist/js/bootstrap.min.js"></script>


						<?php
					break; 
				default: ?> 

							<!-- local css and js --> 
 
								<script type="text/javascript" src='fs_folders/js/jquery-1.9.1.js'> </script> 
								<script type="text/javascript" src='fs_folders/js/function_js.js'></script>  
								<script type="text/javascript" src='fs_folders/js/genQuery.js'></script>  
								<script type="text/javascript" src='fs_folders/js/popover.js'></script> 
								<link rel="stylesheet" type="text/css" href="fs_folders/js/jquery-ui/css/ui-lightness/jquery-ui-1.10.3.custom.css"> 
								<script type="text/javascript" src="fs_folders/js/jquery-ui/js/jquery-ui-1.10.3.custom.js" ></script>
                                <script type="text/javascript" src='fs_folders/js/modal.js'></script>
                                <script type="text/javascript" src='fs_folders/js/tour.js'></script>
                                <script type="text/javascript" src='fs_folders/js/dropDown.js'></script> 
                                <script type="text/javascript" src='fs_folders/js/dropDown.js'></script> 
                                <script type="text/javascript" src='fs_folders/login/pages/welcome/welcome-about-js.js'> </script>
                                <script type="text/javascript" src='fs_folders/js/get_started.js'></script>

                    <!--  new font  -->


						 	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
						 	<!-- <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'> -->
						 	<!-- <link href='http://fonts.googleapis.com/css?family=Playfair+Display:900' rel='stylesheet' type='text/css'> -->  
						 	<!-- <link href='http://fonts.googleapis.com/css?family=Playfair+Display:700italic' rel='stylesheet' type='text/css'> -->
						 	<!-- <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'> -->
						 	<!-- <link href='http://fonts.googleapis.com/css?family=Playfair+Display:700italic' rel='stylesheet' type='text/css'> -->
						 	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>


							<script type="text/javascript" src='' > </script> 
							<!-- this is for the mouse over title show effect -->
							<script>
								// $(function() {

								// 	$( document ).tooltip({
								// 		track: true,
								// 		effect: "slideDown",
								// 		delay: 250, 
								// 		hide: {
								// 			effect: "explode",
								// 			delay: 1
								// 		} 
								// 	});
								// });
							</script> 

							<!-- facebook sdk init -->
								<div id="fb-root"></div>
							    <script>
							      window.fbAsyncInit = function() {
							        FB.init({
							          appId      : '528594163842974',
							          status     : true,
							          xfbml      : true
							        });
							      };

							      (function(d, s, id){
							         var js, fjs = d.getElementsByTagName(s)[0];
							         if (d.getElementById(id)) {return;}
							         js = d.createElement(s); js.id = id;
							         js.src = "//connect.facebook.net/en_US/all.js";
							         fjs.parentNode.insertBefore(js, fjs);
							       }(document, 'script', 'facebook-jssdk'));
							    </script>
							<!-- end facebook sdk init -->  







					 <?php 
					break;
			} ?>

			
 
			<!-- new gen style  --> 
				<link rel="stylesheet" type="text/css" href="fs_folders/gen_css/gen_style.css" />  
			<!-- end gen style --> 

			<?php 	 
	    } 

	    public function new_footer() { 
		     $url = 'http://dev.fashionsponge.com';
         	// $url = 'http://localhost/fs/new_fs/alphatest'; 
           	require ("$url/fs_folders/page_footer/footer_php_file/footer.php");  
	    }

	    public function look_exist( $plno ) {
	    	$r = $this->selectV1("plno", "postedlooks",array("plno"=>$plno));
	    	if ( !empty($r)) {
	    	 	return true; 
	    	} else { 
	    	 	return false;
	    	}
	    }
		function shuffle_array( $looks , $plno , $random_limit ) { 
	        if ( $random_limit > 0 ) { 
		           
		       	//initialize random numbers
		            $tl = count($looks); 
		            $numbers = range(0, $tl-1); 
		            shuffle($numbers); 
		       	//only get random numbers that exist. 
		            $c=-1;
		            for ($i=0; $i < $tl-1; $i++) { 
		              if ( $c < $random_limit ) {
		                $c++;
		              } else {
		                $i = $tl;
		              }
		            }
		       	//transfer the random number to array
		            for ($i=0; $i < $c ; $i++) {  
		                $rlooks[$i] = $looks[$numbers[$i]][$plno];
		            }  
		            return $rlooks;
	        }
      	} 
     	public function get_html_colo_code($colorname) {  
	        if ($colorname == 'RustyRed'           ) return '660000';
	        if ($colorname == 'RedOrange'          ) return 'de6318';
	        if ($colorname == 'YellowGreen'        ) return 'd3d100';
	        if ($colorname == 'Peagreen'           ) return '8c8c00';
	        if ($colorname == 'DarkGreen'          ) return '293206';
	        if ($colorname == 'Lightblue'          ) return '34e3e5';
	        if ($colorname == 'LightSeaGreen'      ) return '205260';
	        if ($colorname == 'Darkblue'           ) return '07194d';
	        if ($colorname == 'Indigo'             ) return '46008c';
	        if ($colorname == 'BurgundyBrown'      ) return '33151a'; 
	        if ($colorname == 'Darkpink'           ) return 'e30e5c'; 
	        if ($colorname == 'Darkbrown'          ) return '3d1f00';
	        if ($colorname == 'Espresso'           ) return '5e1800';
	        if ($colorname == 'Black'              ) return '000000';

	        if ($colorname == 'Maroon') return '980000';
	        if ($colorname == 'DarkOrange') return 'ff7f00';
	        if ($colorname == 'Yellow') return 'ffff00';
	        if ($colorname == 'Green') return '88ba41';
	        if ($colorname == 'ForestGreen') return '006700';
	        if ($colorname == 'Aquablue') return '65f3c9';
	        if ($colorname == 'Teal') return '318c8c';
	        if ($colorname == 'Royalblue') return '0033ab';
	        if ($colorname == 'Purple') return '5e318c';
	        if ($colorname == 'DarkPurple') return '520f41'; 
	        if ($colorname == 'HotPink') return 'ff59ac';
	        if ($colorname == 'Brown') return '8c5e31';
	        if ($colorname == 'Mocha') return '8c4600';
	        if ($colorname == 'Charcoal') return '505050';

	        if ($colorname == 'Red') return 'ff0000';
	        if ($colorname == 'Orange') return 'ffa000';
	        if ($colorname == 'Gold') return 'eed54f';
	        if ($colorname == 'Armygreen') return '778c62';
	        if ($colorname == 'Green') return '00ae00';
	        if ($colorname == 'Turquoise') return '77f5a7';
	        if ($colorname == 'GreyGreen') return '628c8c';
	        if ($colorname == 'CelestialBlue') return '4a73bd';
	        if ($colorname == 'Lightpurple') return '77628c';
	        if ($colorname == 'Violet') return '840e47'; 
	        if ($colorname == 'Babypink') return 'ef8cae';
	        if ($colorname == 'RustGold') return '8e7032';
	        if ($colorname == 'Tan') return 'd1b45b';
	        if ($colorname == 'DarkGray') return '828283';
	            
	        if ($colorname == 'DarkRed') return 'e32636';
	        if ($colorname == 'LightOrange') return 'ffc549';
	        if ($colorname == 'LightYellow') return 'ffff6d';
	        if ($colorname == 'OliveGreen') return '8c8c62';
	        if ($colorname == 'NeonGreen') return '00ff00';
	        if ($colorname == 'LightBabyBlue') return 'b2ffff';
	        if ($colorname == 'BlueGrey') return '62778c';
	        if ($colorname == 'CaputMortuum') return '589ad5';
	        if ($colorname == 'Brightpurple') return 'ac59ff';
	        if ($colorname == 'PurpleGrey') return '8c6277'; 
	        if ($colorname == 'Offwhite') return 'ead0cd';
	        if ($colorname == 'Pewter') return '8c7762';
	        if ($colorname == 'Lighttan') return 'e2db9a';
	        if ($colorname == 'Grey') return 'b5b5b6';
	            
	        if ($colorname == 'OrangeRed') return 'fa624d';
	        if ($colorname == 'YellowOrange') return 'ffc898';
	        if ($colorname == 'LightPink') return 'fff2d3';
	        if ($colorname == 'Mintgreen') return '96d28a';
	        if ($colorname == 'LimeGreen') return 'a9ff00';
	        if ($colorname == 'Lightgreen Blue') return 'd8ffb2';
	        if ($colorname == 'JuneBud') return 'bdd6bd';
	        if ($colorname == 'BabyBlue') return 'a1c4e9';
	        if ($colorname == 'Softpurple') return 'a297e9';
	        if ($colorname == 'PurplePink') return 'c6a5b6'; 
	        if ($colorname == 'Lightpink') return 'ffdfef';
	        if ($colorname == 'Lightbrown') return 'c69c7b';
	        if ($colorname == 'White') return 'ffffff';
	        if ($colorname == 'Lightgrey') return 'e7e7e7';
	        if ($colorname == 'Lightgreen') return 'd8ffb2; ';    
	    } 
	    public function generate_url( $url ) {
			$www = strpos($url,"ww.");
		    if (empty($www))   { 
		            $url=str_replace("http://","",$url);
		            $url=str_replace("https://","",$url);
		            $url = "www.".$url;  
		    }
		    $http = strpos($url,"ttp");
		    if ( empty($http) ) { 
		        $url = "http://".$url;
		    }  
		    return $url;
	    } 



	   


	   	public function  image_mouseover_view( $img_path_current , $img_path_new )  { ?>  
			<!--  temporary here mouse over to the look or pictures   --> 
		        <script type="text/javascript">  
		        	path  = new Object(); 
		        	path.def= "<?php echo $img_path_current ?>";
		        	path.nw = "<?php echo $img_path_new ?>";

		        	// alert(path.def);
		        	// alert(path.nw);


	                jQuery(function($) {
	                    var currentMousePos = { x: -1, y: -1 };
	                    $(window).mousemove(function(event) { 
	                        var screen_width =  $(this).width();
	                        var x = event.pageX;
	                        var y = event.pageY;
	                        // x=x+10;
	                        y=y-110; 
	                        var screen_half = screen_width / 2; 
	                        var s = "";
	                        // $("#"). 
	                        var p = $("#follow_div");
	                        var position = p.position();
	                        // position.top
	                        // position.left 
	                        if (x < screen_half) {
	                            // alert("lessthan half");  
	                           // if( x < 200 )  {  
	                                x = x+30;    
	                                s = "less than 20 "; 
	                            // }else{ 
	                            //       x= x-225;
	                            //        s = "lessthan center"; 
	                            // } 
	                        }else { 
	                            // screen_half_revert_pos = screen_half+300; 
	                            // if( x < screen_half_revert_pos )  {  
	                            //     x = x+10;  
	                            //     s = "less than 20 "; 
	                            // }else{ 
	                                  x= x-170; 
	                                  s = "lessthan center"; 
	                            // } 
	                            // x= x+10;
	                            // s = "greeterthan center"; 
	                            // alert("greeterthan half");
	                        } 
	                        $("#x_and_y_axis").text("x = "+x+" y = "+y+" center = "+screen_half+" stat center = "+s+" follow_div x = "+position.left+" y = "+position.top);
	                        $("#follow_div").css({"margin-top":y,"margin-left":x}); 
	                    });    
	                }); 



	                function mouse_enter( follow_div , imgname  , imgsrc ) {   

	                	// alert ( imgsrc );

	                    $(follow_div).css({"display":"block"});
	                     
	                    
	                    $("#thumbnail_overview").attr('src',imgsrc);  
               	 		var screen_width =  $(this).width();
                        var x = event.pageX;
                        var y = event.pageY; 
                        y=y-110; 
                        var screen_half = screen_width / 2;  

                        // position where left or right
                        if (x < screen_half) { 
                            x = x+30;     
                        }else {  
                        	x= x-170;  
                        }    

                        $("#follow_div").css({"margin-top":y,"margin-left":x});  
	                }
	                function mouse_out ( follow_div ) {
	                    $(follow_div).css({"display":"none"}); 
	                }  
	            </script> 
	            <style type="text/css"> 
	                #follow_div { position: absolute; /*border: 2px solid #1a386a;*/  border-radius: 5px; width: 150px; /*height: 200px;*/ display: none; z-index: 100;  }    
	                #follow_div img { width: 150px; /*border: 2px solid #ccc;*/ /*height: 200px;*//* border-radius: 5px;*/ border-radius: 5px; /* border: 2px solid #1a386a; */}
	            </style>  
		            <div id='x_and_y_axis' style="display:none"> 
		                x and y axis.
		            </div>  
		            <div id="follow_div" >  
		                <img id="thumbnail_overview" src="<?php echo  "$img_path_current/22.jpg";  ?>"  > 
		            </div>

		            <!-- mouse will hover to this image and overview will work  -->
			         	<!-- <img  
					         onmousemove="mouse_enter('#follow_div','<?php echo $plno; ?>')" 
					         onmouseout="mouse_out('#follow_div')" 
					         onclick="thumbnail_clicked('<?php echo $plno; ?>' )"  
					         src="fs_folders/images/uploads/posted looks/thumbnail/<?php echo $plno;  ?>.jpg"
				     	/> --> 
	         <!--temporary here mouse over to the look or pictures   -->  
	   		<?php 
	   	} 
	   	

	   	public function db_result_next_prev( $table_name , $table_id , $res , $get=null ) {  
            $current_viewed_look = $table_id;  
            $response = $res;  
            $r['current'] = $table_id; 
             
            switch ( $table_name ): 
            	case 'postedlooks': 
            			$key = 'plno'; 	
            		break; 
            	case 'fs_postedarticles': 
            			$key = 'artno'; 
            		break; 
            	default:
            		 
            		break;
            endswitch;  






             

            /*
		    for ($i=0; $i < count($looks) ; $i++) { 
		       echo " ".$looks[$i]['plno']."<bR>";
		    }
		    */


            for ($i=0; $i < count($response) ; $i++) {  
                if ( $current_viewed_look == $response[$i][$key] ) {  
                	$r['cvindex'] = $i;  
                    if( $get == "index" ) { 
                    	$r['index'] = $i;
                    	return $r;
                    }
                    else{  
	                    $i++;
	                    if ( $i == count($response)) {  
	                        $r['next']  = $response[0][$key]; 
	                    } else {  
	                        $r['next']  = $response[$i][$key];  
	                    } 
	                    $i-=2; 
	                    if ( $i < 0 ) {
	                        $i = count($response)-1;
	                    } 
	                    $r['prev'] = $response[$i][$key];  

	                    /*
	                    echo " <br><BR><BR><BR> next = ".$r['next'].' prev '.$r['prev'].'<br>';
	                    print_r($r);
	                    */
	                    return $r; 
                 	}
                }
            } 
        }


        public function  arrow_left_right_pressed_for_next_prev( $plno ,  $looks )  {  
        	$current_look_index = $this->db_result_next_prev( $plno , $looks , "index");
            echo"<div id='plnos'  style='display:block'>";
            for ($i=0; $i < count($looks) ; $i++) { 
                $plno = $looks[$i]["plno"];
                 // echo " $i .) ".$r[$i]["plno"]."<br>"; 
                echo $plno."-";
            }
            echo "</div>";
            echo "<div id='current_look_viewed' style='display:block' >$current_look_index[cvindex]</div>";
            echo " <div id='res' style='display:block' >res here </div>"; 




        }   

        public function retreive_specific_user_all_activities( $mno , $orderby=null , $limit=null  ) { 
        	$r = $this->selectV1(
				'*', 
				'activity',
				 array('mno'=>$mno),
				"$orderby",
				$limit
			); 
			return $r;  
        } 
        public function retreive_specific_user_all_looks_by_style( $mno , $style, $orderby=null , $limit=null, $table_id) { 


        	echo "$mno , $style, $orderby=null , $limit=null <br> ";
			// $r = $this->selectV1(
			// 	'plno' , 
			// 	'postedlooks' ,
			// 	 array('mno'=>$mno,'operand1'=>'and','active'=>'1' ) , 
			// 	"$orderby",
			// 	$limit
			// );  

        	/*
			$r = select_v3( 
				'postedlooks', 
				'*',
				" mno = $mno and plno <> $table_id and style = '$style' order by $orderby limit $limit"
			);   
			*/
			$r = select_v3( 
				'postedlooks', 
				'*',
				" mno = $mno and plno <> $table_id order by $orderby limit $limit"
			);   
 
			// print_r($r);
			return $r; 
		}  
        public function retreive_specific_user_all_looks( $mno , $orderby=null , $limit=null ) { 

			$r = $this->selectV1(
				'plno' , 
				'postedlooks' ,
				 array('mno'=>$mno,'operand1'=>'and','active'=>'1' ) , 
				"$orderby",
				$limit
			); 
			return $r; 
		}
		public function retreive_specific_user_all_looks_voted_by_viewer(  ) { 
		}
		public function retreive_specific_user_all_looks_not_voted_by_viewer( ) {  
		} 
		public function retreive_specific_user_post_article( $mno , $orderby=null ) { 
		}
		public function retreive_specific_user_all_article_voted_by_viewer(   ) { 
		}
		public function retreive_specific_user_all_article_not_voted_by_viewer(  ) {  
		}  
		public function retreive_specific_user_post_media( $mno , $orderby=null ) { 
		}
		public function retreive_specific_user_all_media_voted_by_viewer(   ) { 
		}
		public function retreive_specific_user_all_media_not_voted_by_viewer(  ) {  
		}   
		// brand 
		public function retreive_all_brands( ) {
		}
		public function retreive_all_category( ) {
		}
		public function retreive_all_brand_under_category( ) {
		}
		public function retreive_all_selected_brand( ) {
		}
		public function retreive_specific_user_brand_selected( $mno , $orderby=null ) {
			$r = $this->selectV1(
				'*', 
				'fs_brand_member_selected',
				 array('mno'=>$mno),
				"$orderby"
			);
			return $r;  
		}
	 	public function retreive_specific_user_has_thesame_brand_selected_and_sort_by_total_brands( ) {
		}
		public function data_get_total_next_prev_numbers( $data , $limit_res_per_group ) {  
		   $tr = count($data); 
            $c = $tr/$limit_res_per_group; 
            $c = intval($c); 
            $mr = $c*$limit_res_per_group;  
            if ( $mr < $tr ) {
                 $c++;
            }   
            return $c; 
		}
		public function add_look_view( $plno ) {  

			$tv = selectV1(
				'*', 
				'postedlooks' , 
				array(
					'plno' => $plno 
				) 
			);  
			$tview = $tv[0]['tview']; 
			// echo "total view $tview <br> ";   
			$tview=$tview+=1; 
			// echo "new total view $tview <br>"; 
			update1(
				'postedlooks',
				'tview',
				$tview, 
				array('plno',$plno) 
			); 
		} 
		// function  
			# Date: june 7 2013 9:04 am
			# Created by: Jesus Erwin Suarez 
			# version 1.1.0 
				public function selectV1($select='*', $tableName=null, $where=null,$orderby=null,$limit=null) { 
					$c=0;
					$res = array( );
					if (!empty($select)) {
						$Q = "SELECT $select  FROM " ;
					}
					if (!empty($tableName)) {
						$Q.=" $tableName  ";
					}
					if (!empty($where)) {
						$Q.="WHERE ";
						foreach ($where as $key => $value) {
							if ($key == 'operand1' || $key == 'operand2' || $key == 'operand3' || $key == 'operand4' || $key == 'operand5' || $key == 'operand6'  ) {
								$Q.="$value ";	
							} else {   
								if (is_integer($value)) {
								$Q.="$key = $value ";				
								}else { 
									$Q.="$key = '$value' ";				
								}
							}
						}
					}
					if (!empty($orderby)) {
						$Q.="$orderby ";
					}
					if (!empty($limit)) {
						$Q.="$limit ";
					}
					$r = @mysql_query($Q);
					if (!empty($r)) {
						while ($db=mysql_fetch_array($r)) {
					 		
							$res[$c] = $db;
							$c++;
						}
						return $res;
					}else { 
						return 0;
					}
				}    
				public function print_name_looktitle_look_desc_for_share( $mno , $plno , $lookname , $lookAbout ) {
	             	echo "<span style='display:none' id='lookownername$plno'  >".ucfirst($this->get_full_name_by_id($mno) )."</span>"; // get the name of the look for share only
	            	echo "<span style='display:none' id='looktitle$plno' >$lookname</span> "; 
	            	echo "<span style='display:none' id='lookabout$plno' >$lookAbout</span> ";
	            }
			// new modals region 

				public function modals_look_init ( $ano ) {  

		       		$this->auto_detect_path();  	
		       		$ri = new resizeImage (); 

				    $activity = $this->get_activity_posted( $ano ); 
		            $whoAction = $activity[0]['mno']; 
		            $plno = $activity[0]['_table_id']; 
		            $action = $activity[0]['action'];
		            $_date = $activity[0]['_date'];

		            $li = $this->posted_look_info( $plno ); 
		            
		            $view = $li['tlview']; 
		            $redrip = 0;
		            $favorites = 0;  
		            $plno_link = $plno;   


		            $comment = $li['pltcomment']; 

		            if ( $action == 'Posted' ) { 
	            	 	$ownername = '';
	            	 	$br = '<br>';
	            	 	$action = 'Posted a new look';
		            }
		            elseif( strpos($action, 'Posted' ) ){  
		            	$ownername = '';
		            	$br = '';
		            	$ownername = "his look"; 
		            }
		            else{
		            	$ownername = '';
		            	$br = '';
		            	$ownername = " a look  by <b> <a href='profile?id=$li[mno]' > ".$this->get_full_name_by_id($li['mno'])." </a> </b>"; 
		            }     


		            $more = $this->get_more_friends_doing_the_action ( $whoAction , $plno , $action );    
		            $image = $this->get_my_action_image_equivalent ( $whoAction , $plno , $action );  
		            $doingactionname = "<b>".$this->get_full_name_by_id($whoAction)."</b>";    
		            $when = $this->get_time_ago( $_date ); 
		            $action = strtolower($action); 
 
		            $action = "
		            <div style='border:1px solid none;line-height:16px;  ' id='look-modals-action' > 
			            <a href='profile?id=".$whoAction."' >$doingactionname</a>
			            $br 
			            $more  
			            $action 
			            $ownername   
			            $br  
			            $when 
			            $image   
		            </div>";  
















		            $rating_percent = $li['pltpercentage'];
					$rating_total  = $li["pltvotes"]; 
					$ri->load($this->look_folder_home."/$plno.jpg"); 	
					if ($ri->getHeight() < 201) { $min_look_hight = 'height:230px;'; } else { $min_look_hight = 'height:auto;'; } 
		            $look_modals_height  = $ri->getHeight();
		            $auto_height         = "height:$look_modals_height"."px;";   
		            $lookname            =  $li['lookName'];  
		            $lookOwnerMno        = $li['lookOwnerMno'];    
		     		$bg_mouse_over_style =  'margin-top: 5px;';  
		     		$lookAbout           = $li['lookAbout']; 
		     		$article_link        = $li['article_link'];     

		     		if (  $look_modals_height < 250  ) {  	 
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





		     		// echo " look modals height $look_modals_height <br>";
		     		// $lookAbout_len  = strlen( $lookAbout );
		     		// $look_about_limitted_len  = strlen($look_about_limitted); 
		     		// echo " this is the about look  $lookAbout_len new len $look_about_limitted_len  <br>";    
		     	 	$more = $this->look_with_more( $plno , $article_link );   
		     	 	$this->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno , $lookname , $lookAbout);  
		     	 	$plno = $ano; 



		            ?>  
		           <!-- <a href="lookdetails?id=<?php echo $plno_link; ?>#a-b"> -->
						<table border="0" cellspacing="0" cellpadding="0" style="" >  
							<tr> 
								<td >   
									<ul style="padding:0px; margin:0px;  " >
									 	<li style="border:1px solid none;" >  
									 		<a href="profile?id=<?php echo $whoAction; ?>" >  
										 		<?php  if ( file_exists("$this->ppic_thumbnail/$whoAction.jpg") ) {?> 
													<img style="width:50px; height:50px; cursor:pointer;"  src="<?php echo  "$this->ppic_thumbnail/$whoAction.jpg"; ?>"> 	 
												<?php  
												} else { 
													?>  
														<img style="width:50px; height:50px; cursor:pointer;"  src="<?php echo  "$this->ppic_thumbnail/default_avatar.png"; ?>"> 	 
												<?php 
												}?>   
											</a>
									 	</li>
									 	
									 	<li  style="border:1px solid none; padding-left:10px; font-family:arial; font-size:12px; width:200px; word-wrap: break-word; text-decoration:none; list-style:none; color:#284372 " > 
									 		<?php echo $action; ?>  
									 	</li>
									</ul>
								</td>
							<tr>
								<td>  
									<div id="look_height_width" class="look_container_div"  >
										<table  id='look_t' class="look_t<?php echo $ano; ?>"  border="0" cellpadding="0" cellspacing="0"  onmouseout="img_mouseout('.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>' , '.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>')" > 
								 			<tr>
										 		<td>   
										 			<table border="0" id='rate' class='rate<?php echo $plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  ,  .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
										 				<tr> 
										 					<!-- <td>  <img src="fs_folders/images/body/Look/<?php echo $con->stars; ?> stars.png" > </td>  -->
										 			</table>
													 		 
					 								<div id='look_mouserOver_c' class='look_mouserOver_c<?php echo $plno; ?>' style="display:none" > 
					 									<table id='look_f_1row'   border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" > 
										 					<tr>
										 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >   </td> 
										 					 	<td> <span id='percentage_text' > <?php echo $rating_percent;?></span><span style='font-size:15px;' > %</span></td> 
										 					 	<td> <span id='mesage_text' > RATE ( <?php echo $rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png">  </td> 
										 				</table>
										 				<table id='title_desc_t' border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" > 
										 					<tr> 
										 						<td> 
										 							<div  id='tdpadding' > 
										 								paddding 
										 							</div>   
										 						</td> 
										 					<tr>
										 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
										 							<div id='look_title' style='font-size:20px;' >  
										 								<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
										 									<?php echo " <span style='color:#fff' >$look_name_limitted</span> "; ?> 
										 								</a>  
										 							</div> 
										 						</td>  
										 					<tr> 
										 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
										 							
										 							<div id='look_desc' style='font-size:12px;' >  
											 							 <!-- look desc  -->   
		  								 							 	<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
												 							<?php  echo " <span style='color:#fff' >$look_about_limitted  </span>  "; ?> 
											 							</a>   
									 								</div>   
										 						</td> 	 
										 				</table>
										 				<table id='look_f_2row1'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
												 			<tr>   
													 			<td> <img id='tmsg'  src="fs_folders/images/body/Look/comment icon.png"   title="comments (<?php echo $con->comment; ?>)"    > </td> <td> <span> <?php echo $comment; ?>   </span> </td>
													 			<td> <img id='teye'  src="fs_folders/images/body/Look/views icon.png"     title="views (<?php echo $view; ?>)"         > </td> <td> <span> <?php echo $view; ?>      </span> </td>
													 			<td> <img id='tarrw' src="fs_folders/images/body/Look/redrip.png"         title="drips (<?php echo $redrip; ?>)"         > </td> <td> <span> <?php echo $redrip; ?>    </span> </td>
													 			<td> <img id='thrt'  src="fs_folders/images/body/Look/favorites icon.png" title="favorites (<?php echo $favorites; ?>)" > </td> <td> <span> <?php echo $favorites; ?> </span> </td>
												 		</table>
					 								</div>
					 								<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
											 			<div id='look_mouserOver_bg' class='look_mouserOver_bg<?php echo $plno; ?>'  style="<?php echo $bg_mouse_over_style; ?>"   onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
											 			</div>
										 			</a>
											 			<!-- <img id='look_img' src="fs_folders/images/posted look/<?php echo $look_id; ?>.jpg"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > -->
										 			<!-- <div id='body_auto_background' class='body_auto_background<?php echo $plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" >  </div>  -->
										 			<table  border="0" cellpadding="0" cellspacing="0"  style="<?php echo $auto_height ?>" >  
											 			<tr> 
											 				<td  id="img_container_td" class="img_container_td<?php echo $plno; ?>" > 
											 					<img id='look_img'  class="look_t<?php echo $plno; ?>_img"  style="<?php echo $min_look_hight; ?> "   src="<?php  echo "fs_folders/images/uploads/posted looks/lookdetails/$plno_link.jpg"?>"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>','.img_container_td<?php echo $plno; ?>' , '.look_mouserOver_bg<?php echo $plno; ?>')"  >
											 				</td>
											 			<tr>  
											 				<td style="border:1px solid none " > 



											 				
											 					<div id='look_footer_bg_c'   style="margin-top:-87px;"  class='look_footer_bg_c<?php echo $plno; ?>' > 
													 				<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
													 					<tr>
													 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >  </td> 
													 					 	<td> <span id='percentage_text' > <?php echo $rating_percent;?></span><span style='font-size:15px;' > %</span></td> 
													 					 	<td> <span id='mesage_text' > RATE ( <?php echo $rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png" >  </td> 
													 				</table> 
													 				<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
															 			<div id='footer_bg' style="margin-top: 7px; " >  
															 			</div> 
																	</a> 
													 			</div> 
												 				<table id='look_f_2row'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
												 					<tr>   	 
												 					<td> <img id='tmsg'                             style="cursor:pointer"   src="fs_folders/images/body/Look/comment icon.png"   title="comments" > </td>      <td  style="width:25px;" > <span> <?php echo $comment; ?>    </span> </td>
												 					<td> <img id='teye'                             style="cursor:pointer"   src="fs_folders/images/body/Look/views icon.png"     title="views"    > </td>      <td  style="width:25px;" > <span> <?php echo $view; ?>        </span> </td>
												 					<td> <img id='tarrw'                            style="cursor:pointer"   src="fs_folders/images/body/Look/redrip.png"         title="drips"     > </td>     <td  style="width:25px;" > <span> <?php echo $redrip; ?>      </span> </td>   
												 					<td  > <img id='thrt'                           style="cursor:pointer"   src="fs_folders/images/body/Look/favorites icon.png" title="favorites"> </td>    <td  style="display:none" > <span> <?php echo $favorites; ?> </span> </td> 
												 					<td style="width:35px;" > <img  			    style="cursor:pointer"   src="fs_folders/images/body/Look/share-icon1.png"    id='share_look_modals<?php echo $plno; ?>' onmouseover="share_mouser_over('<?php echo $plno; ?>')" onmouseout="share_mouser_out('<?php echo $plno; ?>')" > </td>    
												 					
												 				</table> 
											 				</td> 
											 			<tr>
											 				<td> 
											 					<div style="position:absolute;border:1px solid none; margin-top:-18px; z-index:120; display:none; padding-top:5px; " id="dropdown_share<?php echo $plno; ?>"     onmouseover="share_mouser_over('<?php echo $plno; ?>')"  onmouseout="share_mouser_out('<?php echo $plno; ?>')"     >  
							 										<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals<?php echo $plno; ?>'  style='width:286px; height:55px; '  />   
								 									<table border="0" cellpadding="0" cellspacing="0" style="position:absolute;margin-top:-42px; margin-left:40px;"  onclick="return false" > 
											 							<tr> 
											 								<td  style="padding-left:0px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"     onclick="fbshare('<?php echo $plno; ?>','home');" ></td>  
																            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"      onclick="twitter_look('<?php echo $plno; ?>' , '<?php echo $lookname; ?>' ) "   ></td>  	
																            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"       onclick="share_tumblr_looks('<?php echo $plno; ?>')" >                      </td>  
																            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_q.png"    title = "pinterest"    onclick="share_pinterest( '<?php echo $plno; ?>'  )" ></td>  
																            <td  style="padding-left:7px;cursor:pointer" > <a href="https://plus.google.com/share?url={http://fashionsponge.com/lookdetails?id=<?php echo $plno; ?>}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> 
																            					  <img  style="width:20px" src="fs_folders/images/attr/ld_white_g+.png"   title = "google+"            				   > </a> 
																        	</td>   
																            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_line.png" title = "stumbleupon"  onclick="PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $plno; ?>&src=badge','Share to StumbleUpon +',800,540)" ></td> 
																            <td  style="padding-left:7px;cursor:pointer" ><img  style="width:20px"    src="fs_folders/images/attr/ld_white_mail.png" title = "email" onclick="share_gmail_looks( '<?php echo $plno; ?>' )"  ></td> 
										 							</table>   
										 						</div>
											 				</td>
										 			</table>
										 		</td>
										</table>
										<div id='padding'> </div>
									</div>
								</td>
						</table>  
					


					<!-- </a> -->

				 

		    			<!-- <img  id="look_init_modals"  src=" <?php echo "$this->look_folder_home/$plno.jpg" ?> "> <br>  <br>  --> 
		    			<style type="text/css">
		    				#look_init_modals { cursor: pointer; width: 280px; border-radius: 5px; } 
		    			</style> 





	    			<?php
	    		} 
				public function modals_look ( $ano , $pagenum=null , $page=null ) {  
				 	// echo "modals_look ( $ano , $pagenum  , $page  )";

		       		$this->auto_detect_path();  	
		       		$ri = new resizeImage (); 



				    $activity = $this->get_activity_posted( $ano );  

		            $whoAction = $activity[0]['mno']; 
		            $plno = $activity[0]['_table_id']; 
		            $action = $activity[0]['action'];
		            $_date = $activity[0]['_date'];

		            $li = $this->posted_look_info( $plno ); 
		            
		            $view = $li['tlview']; 
		            $redrip = 0;
		            $favorites = 0;  
		            $plno_link = $plno;   


		            $comment = $li['pltcomment']; 

		            if ( $action == 'Posted' ) { 
	            	 	$ownername = '';
	            	 	$br = '<br>';
	            	 	$action = 'Posted a new look';
		            }
		            elseif( strpos($action, 'Posted' ) ){  
		            	$ownername = '';
		            	$br = '';
		            	$ownername = "his look"; 
		            }
		            else{
		            	$ownername = '';
		            	$br = '';
		            	$ownername = " a look  by <b> <a href='profile?id=$li[mno]' > ".$this->get_full_name_by_id($li['mno'])." </a> </b>"; 
		            }     


		            $more = $this->get_more_friends_doing_the_action ( $whoAction , $plno , $action );    
		            $image = $this->get_my_action_image_equivalent ( $whoAction , $plno , $action );  
		            $doingactionname = "<b>".$this->get_full_name_by_id($whoAction)."</b>";    
		            $when = $this->get_time_ago( $_date ); 
		            $action = strtolower($action); 
 
		            $action = "
		            <div style='border:1px solid none;line-height:16px;  ' id='look-modals-action' > 
			            <a href='profile?id=".$whoAction."' >$doingactionname</a>
			            $br 
			            $more  
			            $action 
			            $ownername   
			            $br  
			            $when 
			            $image   
		            </div>";  








					$rating_percent = $li['pltpercentage'];
					$rating_total  = $li["pltvotes"]; 

					$ri->load("../../../".$this->look_folder_home."/$plno.jpg"); 	
					# if ($ri->getHeight() < 201) { $min_look_hight = 'height:230px;'; } else { $min_look_hight = 'height:auto;'; }  temporary disabled set enable to set min height of the look
		    		if ($ri->getHeight() < 201) { $min_look_hight = 'height:230px;'; } else { $min_look_hight = 'height:auto;'; } 
		            $look_modals_height = $ri->getHeight();
		            $auto_height = "height:$look_modals_height"."px;";  

		            $lookname =  $li['lookName'];  
		            $lookOwnerMno = $li['lookOwnerMno']; 



		     		$lookAbout = $li['lookAbout'];   

		     		if (  $look_modals_height < 250  ) { 
		     			 
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
		     		



		            if ( $page == 'home' ) {
		            	 $share_style = "position:absolute;margin-top:-42px; margin-left:40px";
		            	 $bg_mouse_over_style =  'margin-top: 5px;';
		            	 $footer_bg_style = 'position: absolute; margin-left:-1px; display: block; margin-top: 6px; z-index: 100; background-color: #000; opacity: 0.6; width: 284px; height: 81px; border-radius:  0 0 5px 5px  ;';
		            }else if ( $page == 'profile' ){ 
		            	$share_style = "position:absolute;margin-top:-37px; margin-left:40px";
		            	$bg_mouse_over_style =  'margin-top: 0px;';
		            	$footer_bg_style = 'position: absolute; margin-left:-1px; display: block; margin-top: 6px; z-index: 100; background-color: #000; opacity: 0.6; width: 285px; height: 80px; border-radius:  0 0 5px 5px  ;';
		            }else{  
		            }   

		            $this->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno , $lookname , $lookAbout ); 
		            // $bg_mouse_over_style = get_bg_mousver_style_by_page ( $page );   
		        	$profile_check_exist = $this->set_check_profile_exist( null , $whoAction );     






		        	$plno = $ano; 

		            ?> 
		             	<div id='imgs'> 
		                	<modals-item >   
			                	<!-- <a href="lookdetails?id=<?php echo $plno_link; ?>#a-b"> -->
					                	<?php  
											// $end = $pagenum*10;
											// $start = $end-10; 
											// echo " start  = $start end $end ";  
					                	?> 
										<div style="position:absolute;visibility:hidden;"> 
											<class>look_t<?php echo $plno; ?></class><class>look_t<?php echo $plno; ?></class>
										</div> 
										<div id="look_height_width" class="look_container_div"  style="<?php echo $con->look_height_width; ?> ;  "  >
											<table  id='look_t' class="look_t<?php echo $plno; ?>"  border="0" cellpadding="0" cellspacing="0"  onmouseout="img_mouseout('.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>' , '.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>')" >  
												<tr> 
													<td>   
														<ul style="padding:0px; margin:0px;  " >
														 	<li style="border:1px solid none;" >  
														 		<a href="profile?id=<?php echo $whoAction; ?>" >   
														 			<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $whoAction , "../../../$this->ppic_thumbnail"  ); ?> 
																</a>
														 	</li> 
														 	<li  style="border:1px solid none; padding-left:10px; font-family:arial; font-size:12px; width:200px; word-wrap: break-word; text-decoration:none; list-style:none; color:#284372 " > 
														 		<?php echo $action; ?>  
														 	</li>
														</ul> 
													</td>
												<tr>
												<td style="height:10px;" >   

												</td>
												<tr>
											 		<td>   
											 			<table border="0" id='rate' class='rate<?php echo $plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  ,  .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
											 				<tr> 
											 					<!-- <td>  <img src="fs_folders/images/body/Look/<?php echo $con->stars; ?> stars.png" > </td>  -->
											 			</table>
														 		 
						 								<div id='look_mouserOver_c' class='look_mouserOver_c<?php echo $plno; ?>' style="display:none" > 
						 									<table id='look_f_1row'   border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" > 
											 					<tr>
											 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >   </td> 
											 					 	<td> <span id='percentage_text' > <?php echo $rating_percent;?></span><span style='font-size:15px;' > %</span></td> 
											 					 	<td> <span id='mesage_text' > RATE ( <?php echo $rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png">  </td> 
											 				</table>
											 				<table id='title_desc_t' border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" > 
											 					<tr> 
											 						<td> 
											 							<div  id='tdpadding' > 
											 								paddding 
											 							</div>   
											 						</td> 
											 					<tr>
											 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
											 							<div id='look_title' style='font-size:20px;' >  
											 								<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
											 									<?php echo " <span style='color:#fff' >$look_name_limitted</span> "; ?> 
											 								</a>  
											 							</div> 
											 						</td>  
											 					<tr> 
											 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
											 							
											 							<div id='look_desc' style='font-size:12px;' >  
												 							 <!-- look desc  -->   
			  								 							 	<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
													 							<?php  echo " <span style='color:#fff' >$look_about_limitted</span> "; ?> 
												 							</a>   
										 								</div>   
											 						</td> 	 
											 				</table>  
											 				<table id='look_f_2row1'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
													 			<tr>   
														 			<td> <img id='tmsg'  src="fs_folders/images/body/Look/comment icon.png"   title="comments (<?php echo $con->comment; ?>)"    > </td> <td> <span> <?php echo $comment; ?>   </span> </td>
														 			<td> <img id='teye'  src="fs_folders/images/body/Look/views icon.png"     title="views (<?php echo $view; ?>)"         > </td> <td> <span> <?php echo $view; ?>      </span> </td>
														 			<td> <img id='tarrw' src="fs_folders/images/body/Look/redrip.png"         title="drips (<?php echo $redrip; ?>)"         > </td> <td> <span> <?php echo $redrip; ?>    </span> </td>
														 			<td> <img id='thrt'  src="fs_folders/images/body/Look/favorites icon.png" title="favorites (<?php echo $favorites; ?>)" > </td> <td> <span> <?php echo $favorites; ?> </span> </td>
													 		</table>
						 								</div> 
						 								<a href="lookdetails?id=<?php echo $plno_link; ?>#look_view_header">
												 			<div id='look_mouserOver_bg' class='look_mouserOver_bg<?php echo $plno; ?>'  style="<?php echo $bg_mouse_over_style; ?>"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
												 			</div>
											 			</a> 
				 							 			<!-- <img id='look_img' src="fs_folders/images/posted look/<?php echo $look_id; ?>.jpg"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > -->
											 			<!-- <div id='body_auto_background' class='body_auto_background<?php echo $plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')" >  </div>  -->
													<table border="0" cellpadding="0" cellspacing="0"  style="<?php echo $auto_height ?>" >  
											 			<tr> 
											 				<td  id="img_container_td" class="img_container_td<?php echo $plno; ?>" > 
											 				<img id='look_img'  class="look_t<?php echo $plno; ?>_img"  style="<?php echo $min_look_hight; ?> "   src="<?php  echo "fs_folders/images/uploads/posted looks/lookdetails/$plno_link.jpg"?>"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>','.img_container_td<?php echo $plno; ?>' , '.look_mouserOver_bg<?php echo $plno; ?>')"  >
											 					<!-- <img id='look_img'  class="look_t<?php echo $plno; ?>_img"  style="<?php echo $min_look_hight; ?> "   src="<?php  echo "fs_folders/images/uploads/posted looks/lookdetails/$plno.jpg"?>"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?> , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>','.img_container_td<?php echo $plno; ?>' , '.look_mouserOver_bg<?php echo $plno; ?>')"  > -->
											 				</td>
											 			<tr>  
											 				<td> 
											 					<div id='look_footer_bg_c'    style="margin-top:-87px;"  class='look_footer_bg_c<?php echo $plno; ?>' > 
													 				<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
													 					<tr>
													 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >  </td> 
													 					 	<td> <span id='percentage_text' > <?php echo $rating_percent;?></span><span style='font-size:15px;' > %</span></td> 
													 					 	<td> <span id='mesage_text' > RATE ( <?php echo $rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png" >  </td> 
													 				</table> 
													 				<a href="lookdetails?id=<?php echo $plno_link; ?>#a-b">
															 			<div id='footer_bg' style="margin-top: 7px; " >  
															 			</div> 
																	</a> 
													 			</div> 
												 				<table id='look_f_2row'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $plno; ?> , .body_auto_background<?php echo $plno; ?>  , .look_footer_bg_c<?php echo $plno; ?>','.look_mouserOver_bg<?php echo $plno; ?> , .look_mouserOver_c<?php echo $plno; ?>')"  > 
												 					<tr>   	 
												 					<td> <img id='tmsg'                             style="cursor:pointer"   src="fs_folders/images/body/Look/comment icon.png"   title="comments" > </td>      <td  style="width:25px;" > <span> <?php echo $comment; ?>    </span> </td>
												 					<td> <img id='teye'                             style="cursor:pointer"   src="fs_folders/images/body/Look/views icon.png"     title="views"    > </td>      <td  style="width:25px;" > <span> <?php echo $view; ?>        </span> </td>
												 					<td> <img id='tarrw'                            style="cursor:pointer"   src="fs_folders/images/body/Look/redrip.png"         title="drips"     > </td>     <td  style="width:25px;" > <span> <?php echo $redrip; ?>      </span> </td>   
												 					<td  > <img id='thrt'                           style="cursor:pointer"   src="fs_folders/images/body/Look/favorites icon.png" title="favorites"> </td>    <td  style="display:none" > <span> <?php echo $favorites; ?> </span> </td> 
												 					<td style="width:35px;" > <img   			    style="cursor:pointer"   src="fs_folders/images/body/Look/share-icon1.png"   id='share_look_modals<?php echo $plno; ?>' onmouseover="share_mouser_over('<?php echo $plno; ?>')" onmouseout="share_mouser_out('<?php echo $plno; ?>')" > </td>    
												 				</table>  
											 				</td>
											 			<tr>
											 				<td> 
											 					<div style="position:absolute;border:1px solid none; background-color: none; margin-top:-25px; z-index:120; display: none; padding-top:12px; " id="dropdown_share<?php echo $plno; ?>"     onmouseover="share_mouser_over('<?php echo $plno; ?>')"  onmouseout="share_mouser_out('<?php echo $plno; ?>')"     >  
							 										<img  src="fs_folders/images/body/Look/look-module-share-bar-container.png"   itle="share" id='share_look_modals<?php echo $plno; ?>'  style='width:286px; height:55px; '  />   
								 									<table border="0" cellpadding="0" cellspacing="0" style="<?php echo $share_style; ?>" onclick="return false" > 
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
											<div id='padding'> </div>
										</div>
								<!-- </a>   --> 
						</div> 
						  		<?php  
	    		}     
	    		public function modals_memeber( $ano , $type=null ) {  

	    			$this->auto_detect_path(); 


	    		 	$activity = $this->get_activity_posted( $ano ); 

		              
		            $_date  =  $activity[0]['_date']; 
		            $mno    =  intval($activity[0]['mno']);  
		            $mno1   =  intval($activity[0]['_table_id']); 
		            $action =  $activity[0]['action'];
		             

	    			$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );  
	    			$mno2 = $_SESSION['mno']; 




		            switch ( $action ) {  
		            	case 'Updated': 
		            			$profile_pic = $mno1;
		            			$mno1 = $mno;   
		            		break; 
		            	case 'Joined': 
		            			$profile_pic = $mno1;
		            			$mno1 = $mno;   
		            		break; 
		            	case 'Following':  
		            			// $profile_pic = $mno1; 
		            			// echo " Following $profile_pic"; 
		            			$profile_pic = $this ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
		            		break;  
		            	default:   
		            		break;
		            } 












		            
		            $mem_info1       = $this->get_user_full_fs_info( $mno , 'fullName' );   
		            $fullname1       = $mem_info1['fullName'];  

	    			$mem_info        = $this->get_user_info_by_id( $mno1 );    
	    		 	$memFsInfo       = $this->get_user_full_fs_info( $mno1 );  
	    		 	$fullname        = $memFsInfo['fullName']; 
					$opercentage     = $memFsInfo['opercentage'];  	
					$otrating        = $memFsInfo['otrating'];   
	    			$tlooks 	     = $memFsInfo['tlooks'];        //number_format($mem_info[0]['tlooks']);
	    			$gendertype      = strtolower($memFsInfo['gendertype']);
	    			$tmedia 		 = number_format($mem_info[0]['tmedia']);
	    			$tarticle 		 = number_format($mem_info[0]['tarticle']);
	    			$tratings 		 = number_format($otrating);   /*number_format($mem_info[0]['tratings']); */ 
	    			$tfollower 		 = number_format($mem_info[0]['tfollower']);
	    			$tfollowing 	 = number_format($mem_info[0]['tfollowing']);
	    			$tpercentage 	 = $mem_info[0]['tpercentage'];
	    			$tview 	         = number_format($mem_info[0]['tview']);  
	    			$aboutme 		 = $mem_info[0]['aboutme'];
	    			$firstname 		 = $mem_info[0]['firstname'];
	    			$middlename 	 = $mem_info[0]['middlename'];
	    			$lastname 		 = $mem_info[0]['lastname'];
	    			$nickname 		 = $mem_info[0]['nickname'];
	    			$country 		 = $mem_info[0]['country'];
	    			$state_ 		 = $mem_info[0]['state_'];
	    			$city 			 = $mem_info[0]['city'];
	    			$zip 			 = $mem_info[0]['zip'];
	    			$occupation      = $mem_info[0]['occupation'];
	    			$datejoined 	 = $mem_info[0]['datejoined'];   
  	    			$mem_total_look  = $tlooks;
					$mem_total_media = $tmedia;  
					$mem_total_article = $tarticle;
					$mem_total_views = $tview;
					$user_header_style = 0;
					$mem_rating_percatage = $tpercentage; 
					$mem_total_followers = $tfollower;
					$mem_total_following = $tfollowing;   


					$title = $this->set_member_title( $fullname , $occupation , $city , NULL ,  $country  , NULL ,  NULL );  
					// $title = "$fullname <br> $occupation<br> $country $state_ $city $zip  <br> JOINED $datejoined ";  
					$aboutme=$aboutme; 
					$member_img_directory=0;  
					$when = $this->get_time_ago( $_date );  


					$action_lower = strtolower($action);  

					$tfollowing1  = $this->get_total_follower( $mno1 );  

					$more = $this->get_more_friends_doing_the_action ( $mno  , $mno1 , 'Following' ); 
					// $more = '1 more';

 					switch ( $action ) {
 						case 'Following':  
 								if ( $tfollowing1  < 2 ) {
 									$action = "<b> <a href='profile?id=$mno'   > $fullname1 </a></b> is now  $action_lower to <b> <a href='profile?id=$mno1'  > $fullname </a> </b> $when ";  	 
 								}
 								else{ 
 									$action = "<b> <a href='profile?id=$mno'   > $fullname1 </a></b> $more are now  $action_lower to <b> <a href='profile?id=$mno1'  > $fullname </a> </b> $when ";  	 
 								} 
 							break;
 						case 'Joined': 
 							 	$action = "<b> <a href='profile?id=$mno1'  > $fullname </a> </b> $action_lower Fashion Sponge $when";  
 							break;
 						case 'Updated': 
 							 	$action = "<b> <a href='profile?id=$mno1' >  $fullname</a></b> $action_lower <span style='color:#1c3a69' > $gendertype profile picture </span> $when";  
 							break;
 						default: 
 							break;
 					} 
 					$action = "<div style='border:1px solid none;line-height:16px;' id='look-modals-action' >$action</div>";   





					 $profile_check_exist = $this->set_check_profile_exist( $type , $mno );  
					$profile_check_exist1 = $this->set_check_profile_exist( $type , $profile_pic );  


					$aboutme_limitted = $this->set_about_limit(  $fullname , $aboutme , 300 , 200 );  
					$b = $this->check_if_more( $aboutme  , $aboutme_limitted );    




				 
						$profileavatar = $this->get_male_female_avatar( $mno1 ); 
					 
					




					?> 
						 	<modals-item >  
						 		<!-- <a href="profile?id=<?php echo $mno; ?>">   -->
									<div style="position:absolute;visibility:hidden;"> 
										<class>member_t<?php echo $ano; ?></class><class>member_t<?php echo $ano; ?></class>
									</div>   
							 		<table id='user_table' class="member_t<?php echo $ano ?>"  border="0" cellpadding="0" cellspacing="0" onmouseout="img_mouseout('.user_mouserOver_c<?php echo  $ano; ?>','.user_contaner<?php echo  $ano; ?>')" > 
								 		<tr>  
								 			<td id='user_header_t' style='<?php echo $user_header_style; ?>' > 
												<div id='profilePic'> 

													<?php $this->member_thumbnail_display( $this->ppic_thumbnail , $mno , "../../../$this->ppic_thumbnail"  ); ?> 

												<!-- 	<?php  if ( file_exists("$profile_check_exist") ) {?>
														<a href="profile?id=<?php echo $mno; ?>"> 
															<img src="<?php echo  "$this->ppic_thumbnail/$mno.jpg"; ?>"> 
														</a>
													<?php  
													} else { 
														?> 
														<a href="profile?id=<?php echo $mno; ?>"> 
															<img src="<?php echo $this->ppic_thumbnail.'/default_avatar.png'; ?>" />
														</a>
													<?php }?>  -->
													<?php  
														// echo "$this->ppic_profile/$profile_pic.jpg";
													?>
												</div> 
												<useraction id='profileInfo' >   

												<?php 
													// echo "$profileavatar";
													echo "$action";
												?>
												</useraction>  
												<div id='hiden' class='mheader_tp'> </div> 
								 			</td>  
								 		<tr> 
							 				<td id='user_table_td2'   > 
							 					<div id='user_contaner' style="visibility:visible"   class='user_contaner<?php echo  $ano; ?>'> 
								 					<table style="display:none"  border="1"  id='mem_table_c' onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')" >  
								 						<tr> 
									 						<td> 
										 						<table border="0" cellpadding="0" cellspacing="0" id='user_table_r1' > 
										 							<tr> 
										 								<td>  <img id='imgman'  src="fs_folders/images/body/Member/member icon.png"></td>
										 								<td>  <span id='mprecentage' style='font-size:20px;' >  <?php echo $opercentage; ?></span><span style='font-size:15px;' > %</span> </td>
										 								<td>  <span id='mesage_text' > ( <?php echo $tratings; ?> ) RATINGS  </span> 
										 								<img id = "user_mesage_img" src="fs_folders/images/body/Member/transparent-bubble.png"></td>
									 							</table>
									 						</td>  
														<tr>   
									 						<td> 
									 							<table border="0"  cellpadding="0" cellspacing="0" id='user_table_r2'> 
										 							<tr> 

										 								<td id='utr2_td1'  > <img id='fcheck'  src="fs_folders/images/body/Member/check.png"></td>
										 								<td id='utr2_td2'  > <span id='ftext'>FOLLOWERS not in use</span><span id='tf1'  > <?php echo $mem_total_followers; ?> </span></td>   
										 								<td id='utr2_td3'  > <span id='bar'> / </span> </td>
										 								<td id='utr2_td4'  > <span id='ftext'>FOLLOWING not in use </span><span id='tf2'  > <?php echo $mem_total_following; ?> </span> </td> 
									 							</table>
									 						</td>
									 					<tr> 
								 					</table> 


							 						<div   style="margin-top:50px;position: absolute; background-color: #000; opacity: 0.6; width: 285px; height: 40px; border-radius:  0 0 5px 5px  ;"    >  
							 						</div>
							 					</div> 
							 					<div id='user_mouserOver_c' style="visibility:visible"  class='user_mouserOver_c<?php echo  $ano; ?>' onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')" > 
							 					  	<div id='mouserOver_content'> 
							 					  	 	<table style="display:block;padding-left:5px;" border="0" cellpadding="0" cellspacing="0" id='hover_user_t1' width="100%"  > 
										 					<tr> 
										 						<td  id='hup'   >  </td> <tr>
											 					<td>  <img id='imgman_hover' src="fs_folders/images/body/Member/member icon.png"></td>
											 					<td>  <span id='mprecentage_hover' style='font-size:20px;color:#fff' >  <?php echo $opercentage ; ?></span><span style='font-size:15px;color:#fff' > %</span> </td>
											 					<td>  <span id='mesage_text_hover' style='color:#fff' > ( <?php echo $tratings; ?> ) RATINGS  </span> <img id = "user_mesage_img_hover" src="fs_folders/images/body/Member/transparent-bubble.png"> </td>
									 					</table>
									 					<table style="display:block;padding-left:12px; font-size:12px; padding-top:5px;" border="0" cellpadding="0" cellspacing="0" id='user_table_r2' > 
										 					<tr> 
										 						<td> 
										 							<?php  $this-> print_user_modals_follow_or_unfollow_buttons( $mno2 , $mno1 ); ?>
										 							<!-- <img id="follow_img"   style="" src="" onclick=" follow(  '1' , '2' , 'follow' , 'follow_img' )" > -->
										 						</td> 
										 						<td style='padding-left:6px;font-weight:bold;color:#fff' >  
										 							 FOLLOWERS  
										 						</td>    
										 						<td style='padding-left:3px;font-weight:bold;color:#fff'  class='mem_total_follower<?php echo "$mno"; ?>' >  
										 							 <?php echo $mem_total_followers; ?> 
										 						</td>  
										 						<td  style='padding-left:7px;font-weight:bold;color:#fff' >  
										 							 /
										 						</td> 
										 						<td  style='padding-left:7px;font-weight:bold;color:#fff'>  
										 						 	FOLLOWING   
										 						</td>  
									 							<td  style='padding-left:3px;font-weight:bold;color:#fff' class='mem_total_following<?php echo "$mno"; ?>' >  
									 								<?php echo $mem_total_following; ?>  
									 							</td>
									 					</table> 
									 					<table border="0" id='td_title' > 
									 						<tr> 
									 							<td id='uptd'> </td> <tr> 
									 							<td> 
									 								<div  style="position:relative;border:1px solid none;margin-left:9px; text-align:left;   font-size:20px; font-family:MisoRegular;color:#fff; " >  
											 							<?php echo $title; ?> 
									 								</div>
									 							</td> 
									 						<tr> 
									 							<td>  
										 							<div  id='user_desc' style="font-size:12px;color:#fff;margin-left:10px;text-align:left;   "  >  
										 								<?php echo $aboutme_limitted;  ?>  
										 							</div> 
									 							</td>
									 					</table> 
							 						</div> 
							 						<a href="profile?id=<?php echo $mno1; ?>"> 
								 					 	<div id='user_mouserOver_bg'  > 	 
								 						</div>   
							 						</a>
							 					</div> 

							 					<table  style="visibility:visible"     border="0"     cellpadding="0" cellspacing="0" id='user_hover_footer'   onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')"  > 
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
							 					<!-- <img id='user_img' src="fs_folders/images/member/<?php echo $user_id; ?>.jpg"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')"  )  > -->
												<?php  
												   if ( file_exists("$profile_check_exist1") ) {?>
														<img id='user_img' class="member_t<?php echo $ano; ?>_img" src="<?php  echo "$this->ppic_profile/$profile_pic.jpg"; ?>"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')"  )  ><?php 
							 						} else {?> 
							 							<img id='user_img' src="<?php  echo $this->ppic_profile."/$profileavatar"; ?>"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $ano; ?>','.user_mouserOver_c<?php echo  $ano; ?>')"  )  > 
												<?php } ?>  
							 				</td>
							 		</table>  
							 		<div style="height:15px;"> </div>  
						   <?php 
	    		} 
	    		public function modals_member_init( $pano ) { 
	    		}
	    		public function modals_article( $pano  ) { 
	    		}
	    		public function modals_article_init( $pano  ) { 
	    		} 
	    		public function modals_midea  ( $pmno  ) { 
	    		} 
	    		public function modals_midea_init  ( $pmno  ) { 
	    		}  
			// end modals region




	    	//  new modals initialized 
	    		public function init_latest_modals_separation( $r ) {  

	    			// $r = $this->get_activity( 24 );
	    			/*
					print_r($r);    
					for ($i=0; $i < count($r); $i++) { 
						echo $r[$i]['_table_id']."<br>";
					}  
					echo " <br> total results = ".count($r)."<br>";  
					*/


					$left = 1; 
					$center = 2; 
					$right = 3;  
					$left_modals_array   = array( );
					$center_modals_array = array( );
					$right_modals_array  = array( ); 
					$a=0;
					$b=0;
					$c=0; 
					$d=0;  
					$modalsCounter = 0;
					$adsCounter = 0; 
					$adsNumber = 0;



					for ($i=0; $i < count($r) ; $i++) {    
						$d++; 
						if ( $left == $d) {  
							// echo " $left == $d <br>";
							// echo $r[$i]["ano"]."<br>";
						 	$left_modals_array[$a]['ano']   = $r[$modalsCounter]["ano"];
						 	$left_modals_array[$a]['_table']      = $r[$modalsCounter]["_table"];
						 	 
						 	$left+=3;
						 	$a++; 
						} else if ( $center == $d ) {  
							$adsCounter++;
							// echo " $center == $d <br>";
							// echo $r[$i]["ano"]."<br>";


								


								/*
									#advertisement separators
									if ( $adsCounter == 1 or $adsCounter == 4 or $adsCounter == 7):
										$adsNumber++;
										$center_modals_array[$b]['ano'] = "ads";
										$center_modals_array[$b]['_table'] = 'ads';
										$modalsCounter -=1;
										$center+=3;
										$b++; 
										$i--;
									else: 

								*/

								$center_modals_array[$b]['ano'] = $r[$modalsCounter]["ano"];
								$center_modals_array[$b]['_table']     = $r[$modalsCounter]["_table"];
								$center+=3;
								$b++;  

								/*
									endif;
								*/





						} else if ( $right == $d) {   
							// echo " $right == $d <br>";
							// echo $r[$i]["ano"]."<br>";
							if ( !empty($r[$i]["ano"]) ) {
								$right_modals_array[$c]['ano'] = $r[$modalsCounter]["ano"];
								$right_modals_array[$c]['_table']    = $r[$modalsCounter]["_table"];
								$right+=3; 
								$c++;	 
							}
						}   
						$modalsCounter++;
					}   


					$c=0;
					// echo "total left ".count($left_modals_array)." <br>";
					/*
					for ($i=0; $i < count($left_modals_array) ; $i++) { 
						$c++;
						echo "$c.)".$left_modals_array[$i]["_table_id"]."<br>";
					} 
					*/


					// print_r($left_modals_array); 
					// echo "total center ".count($center_modals_array)." <br>";
					
					/*
					for ($i=0; $i < count($center_modals_array) ; $i++) { 
						
						if ( $center_modals_array[$i]["_table_id"] == 'ads' ) {
							
						}else{
							$c++;	
						}
						
						// echo "$c.)".$center_modals_array[$i]["_table_id"]."<br>";
					} 

					*/
					 

					// print_r($center_modals_array);
					// 
					// echo "total right ".count($right_modals_array)."  <br>";
					/*
					for ($i=0; $i < count($right_modals_array) ; $i++) { 
						$c++;
						echo "$c.)".$right_modals_array[$i]["_table_id"]."<br>"; 

					}
					*/
 						
					

					$init_latest_separated_modals = array(
						'init_latest_separated_modals_left'   => $left_modals_array , 
						'init_latest_separated_modals_center' => $center_modals_array , 
						'init_latest_separated_modals_right'  => $right_modals_array 
					);  
					return $init_latest_separated_modals; 
					// print_r($right_modals_array);   
	    		}
	    		public function init_look_modals_separation( )  {
	    		}
	    		public function init_member_modals_separation( )  {
	    		}
	    		public function init_media_modals_separation( )  { 
	    		} 
	    		public function init_article_modals_separation( )  { 
	    		}  
	    		public function init_advertisement_modals( $num , $link , $desc=null , $clickable=null  )  {  
	    			$ads_loc = 'fs_folders/images/ads'; 
	    			$style = 'padding-top:9px;'
	    			 
	    			?> 
	    				<div id='padding_ads' style="<?php echo "$style" ?>" > </div> 
			 			<div id='ads_container' class="ads_c<?php echo $h; ?>" >   
			 				<?php // echo " <Span style='color:#000' >$num  link $link </span> ";  ?>
				 			<?php if (!empty($num) ) { ?> 

				 				<?php if ( $clickable == true ) { ?>
		 			 				<a href="r?loc=<?php echo  str_replace('.',' ', $link); ?>" target="_blank" >
		 			 			<?php } ?> 
		 			 				<img id='ads_img'  src='<?php echo "$ads_loc/$num.jpg";?>' > 
		 			 				 <div style="height:10px;" > 
		 			 				 </div>
		 			 			<?php if ( $clickable == true ) { ?>
		 			 				</a> 
		 			 			<?php } ?>  

		 			 			<div id='ads_desc'  >   
				 			 	<!-- instagram -->	
				 			 	<?php if ( $num == 1 ) { ?>

				 			 		<center> 
			 			 			 	<script>(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="http://instagramfollowbutton.com/components/instagram/v2/js/ig-follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));</script>
 										<span class="ig-follow" data-id="9b763ae9dc" data-count="true" data-size="medium" data-username="true"></span> 
									</center>

				 			 	<?php }else if ( $num == 2 ) { ?>   

									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=528594163842974";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script> 
									<div class="fb-like" style="position:relative;z-index:300" data-href="https://www.facebook.com/FASHIONSPONGE" data-width="200" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div> 
								
								<?php }else if ( $num == 3 ) { ?>
									 	<center> 
									   		<a href="https://twitter.com/FashionSponge" class="twitter-follow-button" data-show-count="false">Follow @FashionSponge</a>
		                 				 	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		                 				</center>  
		                 		<?php }else{    
			 			 			echo "  
			 			 				<div id='ads_desc'  > 
						 			 		<span> 
							 			 		 $desc
						 			 		</span>
					 			 		</div>  
			 			 			";  
			 			 		}?> 
			 			</div>  
			 			</div>
			 			<div style="padding-bottom:20px;" > </div> 
	    			 <?php
	    			}
	    		} 

	    	// end modals initialized 
	    public function lookdetails_set_size_of_the_look( $img , $ri  ) {
	    	 

			//  new set size of the look
				// echo " this is the look $img <br>" ;
				$ri->load($img); 	  
				// echo " look height = ".$ri->getHeight().'<br>';
				// echo " look width = ".$ri->getWidth().'<br>';   
				$lookmodalsstyle = '';  
 
				$h1 = 500;  # height of the look container
				$w1 = 889;  # width of the look container
				$h2 = $ri->getHeight(); # height of the look 
				$w2 = $ri->getWidth(); # width of the look 
				$hf = ''; # final height of the look.
				$wf = ''; # final width of the look. 
				// echo " height = $h2 and  width = $w2 <br> ";
 
				if ( $w2 > $h2  ) {
					// echo " image width greater than height <br> ";
					#do w2 
					if ( $w2 > $w1 ) {
						$wf = $w1."px"; 
						$hf = 'auto';
					}else{
						$wf = 'auto';
						$hf = 'auto';
					}  
				}else{
					#do h2 
					// echo " image width less than height <br> ";
					if ( $h2 > $h1 ) {
						$hf = $h1."px"; 
						$wf = "auto"; 
					}else{ 
						$hf = 'auto';
						$wf = "auto";  
					}
				}  
				// echo " height = $h2 and  width = $w2 <br> " ;
				$lookmodalsstyle = " height:$hf; width:$wf"; 
			 	// echo " look style is $lookmodalsstyle <br>";
		 	// end set size of the look

			 	return $lookmodalsstyle; 
	    }
	    public function insert_activity_wall_posted( $postedfromtable , $action , $mno , $active , $getlatestid_tablename , $getlatestidtable_id  ) { 
  
	    	/*
 			$plno = $mc->insert_activity_wall_posted( 
		 		"postedlooks" ,  #tablename
		 		"posted" ,  #action 
		 		133 ,  #mno 
		 		1 ,  #actove
		 		"postedlooks" ,  #from table
		 		"plno"  # from table id 
		 	);
		 	*/  
	     
			$id = $this->get_last_id( $getlatestid_tablename  ,  $getlatestidtable_id );    


			insert(
				'activity',
				array(
					'mno',
					'action',
					'_table',
					'_table_id',
					'_date',
					'active'
				),
				array(
					$mno,
					"$action",
					"$postedfromtable",
					$id,
					$this->date_time,
					$active
				),
				'ano' 
			); 
			return $id;
	    } 
	    public function get_last_id( $tablename , $tableid ) {

	    	  $id=selectV1('*', $tablename, null , "order by $tableid desc ", "limit 1" );
	    	  return $id[0][0];
	    }
	    public function update_table_to_active( $tablename , $rowname  , $rowval , $idname  , $idval) { 
    		/* 
		    	$mc->update_table_to_active( 
			        "postedlooks" ,  #table name 
			        "active"  ,  #active 
			        1 ,  #active val
			        "plno"  ,  #rowname id 
			        $plno  #row name val
			    );
			*/ 
    	    update1(
    	    	$tablename, 
    	    	$rowname, 
    	    	$rowval,
    	    	array(
    	    		$idname, 
    	    		$idval
    	    	)
    	    ); 
	    }  
		 


		public function member_thumbnail_display( $path , $mno , $checkpath=null , $title=null , $width='50px' , $type=null, $height = '50px', $style='' ) {
 
			$src = '' ;
			switch ( $type) {
				case 'ads':

					 	echo "  
							<a href=''>
								<img  style='height:$height; width:$width;border-radius:3px;border:1px solid  #e2e2df; $style; ' src='$path/$mno.jpg' title='$title'  /> 
							</a>
						";
					break;  
				default: 
					$username = $this->get_username_by_mno( $mno );
					$mppno = $this ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) ); 
					// echo " profile pic id = $mppno <br>";
					if ( !empty($checkpath )) {
						 $pathchecked = $checkpath;
					}else{
						 $pathchecked = $path;
					} 

					if ( file_exists( "$pathchecked/$mppno.jpg" ) ) {   
						echo " 
							<a href='$username'  target='_parent'  >
								<img  style='height:$height; width:$width; border-radius:3px;border:1px solid  #e2e2df; $style; ' src='$path/$mppno.jpg' title='$title'  > 
							</a>
						"; 
						$src  = "$path/$mppno.jpg";  

					}else{ 

						$avatar = $this->get_male_female_avatar( $mno );  
						echo " 
							<a href='$username' target='_parent' >
								<img  style='height:$height; width:$width;border-radius:3px;border:1px solid  #e2e2df; $style; ' src='$path/$avatar' title='$title'  > 
							</a>
						"; 
						$src =  "$path/$avatar";

					}
					break;
			} 
			return $src;  
		} 

		public function get_male_female_avatar( $mno ) {  

			$gender = selectV1('gender', 'fs_members', array('mno' => $mno ) );   

			if ( !empty($gender[0]['gender']) ) {
				$gender = ( $gender[0]['gender'] == 'Female' ) ? 'female-default-avatar.png' : 'male-default-avatar.png' ; 
			}
			else{
				$gender = 'female-default-avatar.png'; 
			} 
			return $gender; 
		} 
		
		


		// account settings  
			public function remove_array_duplicate_itself_1darray( $single_array ) { 
				if ( !empty( $single_array)) {
					 
					$c=0;
					$a = array('');
				 	for ($i=0; $i < count($single_array) ; $i++) { 
				 		$duplicate = false;
				 		for ($j=$i+1; $j < count($single_array) ; $j++) { 
							 if ( $single_array[$i] == $single_array[$j] ) {
							 	$duplicate = true;
							 }
				 		}
				 		if ( $duplicate == false ) {
				 			 // add new array
				 			$a[$c] = $single_array[$i];
				 			$c++;
				 		}else{
				 			// dont add new array
				 		}
				 	}
				 	// print_r($a);
				 	return $a;
				}
			}
			public function remove_array_duplicate_itself_2darray( ) {	 
			}
			public function remove_array_duplicate_itself_3darray( ) {	 
			}
				// brand 
					public function account_settings_brand_insert( $selectedBrand , $mno ) { 
						for ($i=0; $i < count($selectedBrand)-1 ; $i++) { 

							$bno = $selectedBrand[$i]; 
							// $exist = false; //check db if the brand for the user to be selected is already selected
							$exist = selectV1('*', 'fs_brand_member_selected', array('mno' => $mno , 'operand1' => 'and' , 'bno' => $bno) );
							// print_r($exist);
							if ( empty($exist) ) {
								insert(
									'fs_brand_member_selected',
									array(
										'bno',
										'mno',
										'bs_date' 
									),
									array(
										$bno,
										$mno,
										date("Y-m-d")
									),
									'bmsno' 
								); 
							}

						} 	
					}
					public function get_brand_style_as_selected_or_not( $brand_selected_ids , $brand_id ) { 
						$selected = false; 
						for ($i=0; $i < count($brand_selected_ids) ; $i++) {   
						 	if ($brand_selected_ids[$i]['bno'] == $brand_id) { 
						 	 	$selected = true;
						 	} 
						} 
						if ( $selected == true) { 
	 						$brand_style = "filter: alpha(opacity=20);-moz-opacity: 0.2;-khtml-opacity: 0.2;opacity: 0.2;";
	 					}else{
	 						$brand_style = "filter: alpha(opacity=100);-moz-opacity: 10;-khtml-opacity: 10; opacity: 10;";
	 					} 
	 					return $brand_style;
					}
				// brand 
		// account setttings   
		public function fileExists($path){
			
		    return (@fopen($path,"r")==true);
		}
		public function get_file_extention( $filename ) {
			$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1); 
			return $userfile_extn;
		} 
		public function get_all_brand_category( ) {
			$r = selectV1("*","fs_brand_category") ;
			return $r; 
		}
		public function get_brand_category_name( $bcno ) {
			$r = selectV1("bc_name","fs_brand_category",array('bcno'=>intval($bcno) ) );
			if ( !empty($r) ) {
				$categoryval  = $r[0]['bc_name'];
				return $categoryval;
			}else{
				return 's.. category';
			}
		}
		public function get_all_category( ) {
 			$r = selectV1('*', 'fs_brand_category' , null , "order by bcno asc" );
 			return $r;
		}
		public function get_all_brand( $limit=100 ) {

			$brands=selectV1(
		     	'*',
			 	"fs_brands", 
			 	 '',
		        'order by bno desc',
		        "limit $limit"
			); 
			return $brands;
		}
		public function get_all_brand_by_categoryid_and_gender( $bcno , $gender ) {
			$brands=selectV1(
		     	'*',
			 	"fs_brands", 
			 	 array('bcno'=>$bcno , 'operand1'=>'and' , 'gender' => $gender),
		        'order by bno desc',
		        'limit 100'
			); 
			return $brands;
		} 
		public function get_all_cagtegory_brand_by_categoryid_and_gender( $bcno , $gender  ) {
			$brands=selectV1(
		     	'*',
			 	"fs_brand_category_selected", 
			 	  array('bcno'=>$bcno , 'operand1'=>'and' , 'bcs_gender' => $gender),
		        'order by bcsno desc',
		        'limit 100'
			); 
			return $brands;
		}
		public function get_all_brand_by_categoryid( $visible ) {
			$brands=selectV1(
		     	'*',
			 	"fs_brands", 
			 	 array('visible'=>$visible),
		        'order by bno desc',
		        'limit 1000'
			); 
			return $brands;
		}  
		public function get_all_brand_category_selected( $bno ) {  
			


			$slbc=selectV1(
		     	'*',
			 	"fs_brand_category_selected", 
			 	 array('bno'=>$bno)  
			); 
			return $slbc;  




		}
		public function print_brands(  $brandcategories , $gender ) { 
			$this->auto_detect_path();
			for ($i=0; $i < count($brandcategories) ; $i++) {  
				$c=1;
				$bcno  					  = $brandcategories[$i]['bcno'];
				$bc_name 				  = $brandcategories[$i]['bc_name'];
				$bc_total_selected_people = $brandcategories[$i]['bc_total_selected_people'];
				$bc_total_brand   		  = $brandcategories[$i]['bc_total_brand']; 
				// echo "category name = $bcno $bc_name $bc_total_selected_people $bc_total_brand <br>";  
				// $category_brands = $this->get_all_brand_by_categoryid_and_gender( $bcno , $gender );
				$category_brands = $this->get_all_cagtegory_brand_by_categoryid_and_gender( $bcno , $gender );

				$allcategory = $this->get_all_category( ); 
				// print_r($category_brands); 
				echo "<div style='border:1px solid #000; width:100%; height:20px; background-color:blue; color:#fff;font-weight:bold; text-align:center'  > 
					$bc_name
				</div>"; 
				echo " <table  border='0' style='width:900px;' cellspacing='0' cellpadding='0' > ";
					$number = 0;
					for ($j=0; $j < count($category_brands) ; $j++) { 
							$number++; 
					 		$bcsno          = $category_brands[$j]['bcsno'];
					 		$bno          = $category_brands[$j]['bno'];
					 		$brandval     = 'brand name';
					 		$bcno         = $category_brands[$j]['bcno'];  
					 		$gender       = $category_brands[$j]['bcs_gender'];   

					 		$categoryval  = $this->get_brand_category_name( $bcno );  

					 		if ( $gender == 0) { $g = 'male';  }else{ $g = 'female'; }   

						 	echo "  
								<td id='brandcontainer-categories$bcsno' > 
									<span style='font-size:9px;color:red;font-weight:bold'> 
										$number<br>
									</span>
									
									";

									if ( file_exists("$this->brand/$bno.png") ) {
									 	echo "<img src='$this->brand/$bno.png' style='width:70px; height:70px' 	 /> <br>" ;
									}
									else{
										echo "<img src='$this->brand/default.jpg' style='width:70px; height:70px' 	 /> <br>";
									}



									echo "   
										

									";
									/*
									echo " 
									<input type='text' id='brandid$bcsno' value='$brandval' style='width:70px;'  placeholder='brand name'  > <br>
									<select id='categoryid$bcsno' name='brandcategory$bcsno' value='3' > 
										<option value='$bcno' >$categoryval</option>
									";  
									for ($k=0; $k < count($allcategory) ; $k++) { 
										$bcno1 = $allcategory[$k]['bcno'];
										$bc_name1 = $allcategory[$k]['bc_name'];  
									 	echo "<option value='$bcno1' >$bc_name1</option>";
									} 
									*/   
								echo " 
									</select>  <br> 
									";  


										 echo "
									 	 <table border='0' cellspacing='5' cellpadding='0' style='color:blue; font-size:12px;'>
										 	 <tr>	
										 	 	<td> <b> category </b>  </td> <td> $categoryval  </td>  
										 	 <tr> 
										 	 	<td>  <b>brand name  </b></td> <td> $brandval </td>  
										 	 <tr>
										 	 	<td>  <b>gender  </b></td> <td> $g </td>   
									 	 </table>

									 "; 

								/*

									 
								echo " 
									<select id='brandgenderid$bcsno' name='brandgender$bcsno' value='3' > 
										<option value='$gender' >$g</option> 
										<option value='0' >male</option> 
										<option value='1' >female</option> 
									</select> <br> 

								";

								echo " 
									<input type='button' id='brandsave$bcsno' value='save' onclick='update_brand( \"#brandid$bcsno\" , \"#categoryid$bcsno\" , \"#brandgenderid$bcsno\" , \"$bcsno\" , \"save\"  )' /> 
								"; 
						
						*/
								echo " 
								    <input type='button' value='delete' onclick='update_brand( \"#brandid$bcsno\" , \"#categoryid$bcsno\" , \"#brandgenderid$bcsno\" ,  \"$bcsno\" , \"0\" ,\"delete-brand-categories\"  )' />    
								</td>   
							";  
						
							if ( $c%8==0) {
								 echo "<tr>";
							}
							$c++;  
					}
				echo "</table>"; 
			} 
		}
		public function print_new_uploaded_brands($status=0) {

			$this->auto_detect_path();
			echo " 
			 	<table border='0' cellspacing='0' cellpadding='0' style='width:100%; '  >	
					<tr> "; 
					 	$d=0;
					 	$brandval= '';
					 	$categoryval ='';
					 	$allcategory = $this->get_all_category( );  
					 	$brands = $this->get_all_brand_by_categoryid( $status );  
					 	$number = 0;

					 	for ($i=0; $i < count($brands) ; $i++) {   
					 		$number++; 
					 		$bno          = $brands[$i]['bno'];
					 		$brandval     = $brands[$i]['bname'];
					 		$bcno         = $brands[$i]['bcno'];  
					 		$gender       = $brands[$i]['gender'];  
					 		$categoryval  = $this->get_brand_category_name( $bcno ); 
					 		if ( $gender == 0) { $g = 'male';  }else{ $g = 'female'; }  
						 	echo "  
								<td id='brandcontainer$bno' > 
									<span style='font-size:9px;color:red;font-weight:bold'> 
										$number<br>
									</span> 
									 ";  
									echo " <table border='0' style='width:50px;' >  
										<tr> 

											<td> "; 

												if ( file_exists("$this->brand/$bno.png") ) {
												 	echo "<img src='$this->brand/$bno.png' style='width:70px; height:70px' 	 /> <br>" ;
												}
												else{
													echo "<img src='$this->brand/default.jpg' style='width:70px; height:70px' 	 /> <br>";
												}
												?> 	 
										<tr>
											<td>  
												<form action="admindashboard?p=uploadbrands&updateb=<?php echo $bno; ?>" method="post"
													enctype="multipart/form-data">
													<label for="file">Select Brand</label>
													<input type="file" name="file" id="file" style="display:block" > 
													<input type="submit" name="submit" value="save new brand">
												</form>   
											<td> 
									</table>   
									<?php  
									echo "   
										Brand name: <input type='text' id='brandid$bno' value='$brandval' style='width:70px;'  placeholder='brand name'  > <br>
									";
									// echo "  
									// <select id='categoryid$bno' name='brandcategory$i' value='3' > 
									// 	<option value='$bcno' >$categoryval</option>
									// ";  
									$tcat = count($allcategory);
									// for ($j=0; $j < count($allcategory) ; $j++) { 
									// 	$bcno1 = $allcategory[$j]['bcno'];
									// 	$bc_name1 = $allcategory[$j]['bc_name'];  
									//  	echo "<option value='$bcno1' >$bc_name1</option>";
									// }     
									// <br>  
								        echo "<div style='overflow: auto;  height: 80px; border: 1px solid #336699; padding-left: 5px; font-size:10px;'>"; 
								     	$c=0;
								     	$tcat = count($allcategory);  
								     	// get brand selected category
									     	$bcs_a = array();
									     	$bcs = $this->get_all_brand_category_selected( $bno );
										     for ($j=0; $j < count($bcs) ; $j++) { 
										     	 // echo " ".$bcs[$j]['bcno']."<br>";
										     	 $bcs_a[$j] = $bcs[$j]['bcno'];
										     } 
								     	for ($j=0; $j < count($allcategory) ; $j++) {  
								     		$c++;
								     		$bcno1 = $allcategory[$j]['bcno'];
											$bc_name1 = $allcategory[$j]['bc_name'];  

											if ( in_array($bcno1, $bcs_a) ) {
												 echo " 
										            <br>  
										            <input type='checkbox' name='languages' value='$bcno1' id='categories_checked$bno$c' checked >$bc_name1  
										        "; 
											}else{
												echo " 
										            <br>  
										            <input type='checkbox' name='languages' value='$bcno1' id='categories_checked$bno$c' >$bc_name1  
										        ";  
											} 
								    	}   
								        echo " 
										        </select>  <br> 
												<select id='brandgenderid$bno' name='brandgender$i' value='3'  style='font-size:10px;' > 
													<option value='$gender' >$g</option> 
													<option value='0' >male</option> 
													<option value='1' >female</option> 
												</select> <br> 
												<input type='button' id='brandsave$i' value='save'   onclick='update_brand( \"#brandid$bno\" , \"#categoryid$bno\" , \"#brandgenderid$bno\" , \"$bno\" ,  \"$tcat\" , \"save\"  )'              style='font-size:10px;'        /> 
											    <input type='button' 				  value='delete' onclick='update_brand( \"#brandid$bno\" , \"#categoryid$bno\" , \"#brandgenderid$bno\" ,  \"$bno\" , \"$tcat\"  , \"delete-brand\"  )'     style='font-size:10px;'           />    
									        </div>  
									       </td>
								       	";  
							$d++; 
							if ( $d%3==0) {
								 echo "<tr>";
							} 
					 	} 
					 echo "  
				</table>
			";
		}
		public function check_if_already_followed( $follower , $followed ) { 
			// echo "check_if_already_followed( $follower , $followed )";
				// $followed = selectV1('*', 'fs_follow' , array('mno'=> intval($follwer),'operand1'=>'and','mno1'=> intval($follwed) )  );  
				$follower = intval($follower); 
				$followed = intval($followed);  
				// $followed = select_v3( 'fs_follow' , '*' , " mno = $follower and mno1 = $followed " );   
				$followed = select_v3( 'fs_follow' , '*' , "mno = $follower and mno1 = $followed"  );  
				// print_r($followed);
			return $followed;

		}
		public function getGender($g){

			 if ( $g == 0) { $g = 'male';  }else{ $g = 'female'; }  
			 return $g;
		}
		public function get_all_fs_fbusers_id( ) { 
			$fbusers = array('');
			$i=0;
			$result = mysql_query("SELECT * FROM fs_members WHERE fbid > 0  order by mno asc ");  
			while($row = mysql_fetch_array($result)) {
				 // echo $row['mno']."<br>";
				 // echo $row['fbid']."<br>";
				 // echo $row['firstname']." ".$row['lastname']." <br><hr>"; 
				 $fbusers[$i] = $row['fbid']; 
				 $i++;
			}   
			return $fbusers;
		}  
		
		public function get_fb_all_freinds( $mno , $delimiter ) {   

		    $fb_freinds = selectV1('fb_all_freinds','fs_members', array('mno'=> intval($mno) ) );   

		    $b = ( !empty($fb_freinds[0]['fb_all_freinds'])) ? true : false ;


		    if ( $b == true ) {
		    	  
			    $fbf=$fb_freinds[0]['fb_all_freinds'];  	
			    $fbf_array=explode($delimiter, $fbf); 
			    $tfbf1=count($fbf_array)-1; 
			    $c=0;
			    for ($i=0; $i < $tfbf1 ; $i++) {  
			    	if ( $i%2==0 ) {
			    		// echo " fbfid = ".$fbf_array[$i]." ";	
			    		$c++; 
			    	}else{
			    		// echo " fbfname = ".$fbf_array[$i]."<br>"; 	
			    	} 
			    } 
			    // echo " total friends on fb $c <br>"; 
			    return  $fbf_array; 
			}
			else{ 
				return 0;
			}


		}
		public function get_fb_freinds_on_fs( $mno , $delimiter ) {  

				$fb_freinds = selectV1('fb_freinds_on_fs','fs_members', array('mno'=> intval($mno) ) ); 

				$b = ( !empty($fb_freinds[0]['fb_freinds_on_fs']) ) ? true : false ;



				if  ( $b == true ) { 
					$fbf=$fb_freinds[0]['fb_freinds_on_fs'];   
				    $fbf_array=explode($delimiter, $fbf); 
				    $tfbf1=count($fbf_array)-1;   	
					// echo " <br> total friends fb friends on fs $tfbf1 <br>"; 
					/*
						for ($i=0; $i < $tfbf1; $i++) { 
					    	 echo " mno = ".$fbf_array[$i]."<br>"; 
					    } 
				    */ 
				    return  $fbf_array;
				}
				else{
					return 0;
				}

		}
		public function get_fb_freinds_on_fb( $mno , $delimiter , $start=null , $end=null ) {   
			$a = array('');
			$ab = array('');



			$fb_freinds = selectV1('fb_freinds_on_fb','fs_members', array('mno'=> intval($mno) ) );   



			

			$b  = (  !empty($fb_freinds[0]['fb_freinds_on_fb']) ) ? true : false ;

			if ( $b  == true ) {
				 
			 
			    $fbf=$fb_freinds[0]['fb_freinds_on_fb'];  
			    $fbf_array=explode($delimiter, $fbf); 
			    $tfbf1=count($fbf_array)-1;  
			    $c=0;

			    if ( $start==null) {
			    	$start == 0;
			    }
			    if ( $end== null ) {
			    	$end == $tfbf1;	 
			    }
			    for ($i=$start; $i < $end ; $i++) {   
			    	if (  !empty($fbf_array[$i]) ) {
			    		$ab[$c]['fbfid'] = $fbf_array[$i];  
		    			$c++; 
			    	} 
			    }   
			    $a['fb_freinds_on_fb_len'] = count($ab); 
			    $a['fb_freinds_on_fb'] = $ab; 
			    return $a;
			}
			else{
				return 0;
			}



		}    

		public function get_facebook_user_info_by_fbid( $facebook , $fbid ) { 

			$use = 2;

			switch ( $use ) {
				case '1':
						$answer = $facebook->api("/$fbid");
						$username = $answer['name'];
						return $username;
					break;
				case '2':
					 	$link =  json_decode(file_get_contents("http://graph.facebook.com/$fbid"));
						return $link->name;
					break;
				case '3': 
					break; 
				default: 
					break;
			}
			


		 
		}

		public function fb_init( $FbApPlugin ) {
			?> 
		   <div id="fb-root"></div> 
		  	<script src="http://connect.facebook.net/en_US/all.js"></script>  
			<script> 
			    FB.init({ 
			      appId: '528594163842974', 
			      cookie: true,
			      status: true, 
			      xfbml: true 
			    }); 
			</script><?php 
			require "$FbApPlugin"; 
	        $facebook = new Facebook(array(
	          'appId'  => '528594163842974',
	          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
	        ));  
	        return $facebook;
		}  
	 
		public function following_follower_add_subtract( $mno , $mno1 , $action ) {
           
            # if jesus follow rico 
            # rico follower added by 1 
            # jesus following added by 1 

            # if jesus un-follow rico 
            # rico follower subtracted by 1 
            # jesus following subtracted by 1 

            $mem_info1 = $this->get_user_info_by_id($mno);
            $mem_info2 = $this->get_user_info_by_id($mno1); 

            // $mem_info2[0]['']


            // if ( $action == 'follow') {

            // }else if ( $action == 'unfollow' ){

            // }
        }
        

        #NEW OLD RATING VERSION
	        public function my_look_rating_save( $mno , $plno , $rating ) {    
	        	$date_ = date("Y-m-d H:i:s");   
	        	insert(
			  		"ratings", 
			  		array( 'mno' , 'plno' , 'rating' , 'date_' ), 
			  		array( $mno , $plno , $rating , $date_  ),
			  		'rno'
			  	); 
	        }
	        public function get_my_rate_to_this_look( $mno , $plno ) { 
	    	  	$rated=selectV1(
			     	"*",
				 	"ratings", 
				 	array( 'mno'=>$mno, 'operand1'=>'and','plno'=>$plno ) 
				);  
				return $rated; 
	        }  
	        public function get_all_rating_to_this_look( $plno ) {
	        	$ratings=selectV1(
			     	"*",
				 	"ratings", 
				 	array( 'plno'=>$plno ) 
				);  
				return $ratings;  
	        }
	        public function is_look_i_rated( $rated )  { 
	        	 return $b =  ( !empty( $rated ) ) ? true : false ; 
	        }    
	    #END OLD RATING VERSION

	    #NEW NEW RATING VERSION
		    public function save_my_look_vote_or_update( $val=array( ) ) {    
			 
	            $mno     = intval($val['mno']);
	            $plno    = $val['plno'];   
			  	$myvotes = $this->get_my_look_vote( $mno , $plno );  
			  	$b       = $this->is_look_i_already_voted( $myvotes );   
		      	if ( $b  ) {     
		        	 				 $this->update_look_vote( $val , $mno , $plno ); 
		            $pltvotes      = $this->update_total_votes( $plno ); 
		        	$pltratings    = $this->update_look_rating( $plno );   
		        	$toplookrating = $this->update_new_top_look_rating( ); 
		        	  				 $this->update_pl_top_look_rating( $plno , $toplookrating ); 
		        	// $pltpercentage = $this->update_look_percentage( $plno , $pltratings , $toplookrating );    
		        	 $pltpercentage = $this->update_look_percentage_own( $plno , $pltratings , $pltvotes );   
		        	 				  // $this->update_overall_percentage( $mno );  //needs to be working  
		        	 				  $this->update_fs_table_auto( intval($this->get_look_owner_mno( $plno )) , array( 'tpercentage' , 'tratings' ) , 'fs_members' );
		        	 				  $this->update_or_add_vote_detail( $val ); 
		        					  // $this->update_last_action_activity_wall_post( $mno ,'all-action', 'postedlooks' ,  $plno  , $this->date_time , 1 , 2 ); 
		        					  $this->update_or_add_my_activity_wall_post( $mno , $plno , 'Rated' , 'postedlooks' ,   $this->date_time );   
		        	


		        	echo ' u just voted twice and conflict <br> ';
		        	echo "update rating $pltratings LOOK RATING $pltpercentage ";  
		        	echo"<pltpercentage>$pltpercentage<pltpercentage>";
		        	echo"<pltvotes>$pltvotes<pltvotes>"; 
		      	}		
		      	else{     


		      		echo ' u just voted once and not conflict <br> ';
			        $insert        = $this->insert_look_vote( $val );   
			        $pltvotes      = $this->update_total_votes( $plno ); 
			     	$pltratings    = $this->update_look_rating( $plno );   
		        	$toplookrating = $this->update_new_top_look_rating( );  
		        	  				 $this->update_pl_top_look_rating( $plno , $toplookrating );
		        	// $pltpercentage = $this->update_look_percentage( $plno , $pltratings , $toplookrating );   
		        	$pltpercentage = $this->update_look_percentage_own( $plno , $pltratings , $pltvotes );    
		        					 // $this->update_overall_percentage( $mno ); // needs to be working    
		        	 				 $this->update_fs_table_auto( intval($this->get_look_owner_mno( $plno )) , array( 'tpercentage' , 'tratings' ) , 'fs_members' );
		        					 $this->update_or_add_vote_detail( $val );  
		        					 $this->update_or_add_my_activity_wall_post( $mno , $plno , 'Rated' , 'postedlooks' ,   $this->date_time );   
		        					 // $this->update_or_add_my_activity_wall_post_more( $mno , 'Rated' , 'postedlooks' , $plno , $this->date_time );


 


		        	echo "update rating $pltratings LOOK RATING $pltpercentage ";  
		        	echo"<pltpercentage>$pltpercentage<pltpercentage>";
		        	echo"<pltvotes>$pltvotes<pltvotes>"; 
		      	}  
		    }    
	    #END NEW RATING VERSION   

		#NEW FLAG
			public function flag( $mno , $mno1  , $id , $action , $dateTime , $type ) {
	        	 switch ($type) {
	        	 	case 'look': 
	        	 		$this->flag_ratings(  $mno , $mno1  , $id , $action  , $dateTime ); 
	        	 		break; 
	        	 	default:
	        	 		 
	        	 		break;
	        	 }
	        } 
		#END FLAG   

		#NEW ANTI SQL INJECTION 
			public function text_cleaner( $str ) { 
				$str = $this->remove_sigle_qoutation( $str ); 
				// $str = $this->remove_sql_injections_codes( $str );	
				return $str;
			}
		#END ANTI SQL INJECTION   

		#NEW LOOK COMMENT 
			function add_look_comment_thumb_up_or_down( $plcno, $mno , $action , $date ) {  
				echo " add_look_comment_thumb_up_or_down( $mno , $plcno , $action , $date ); ";  
				$b = $this->get_your_look_comment_thumb_up_or_down( $mno , $plcno );   
				if ( !empty( $b ) ) { 
					echo " comment already thumb-up or down ";
					// return true;  
				}
				else{  
					// echo " insert new  thumb up or down ";   
					$this->add_thumb_up_or_down( $mno , $plcno , $action , $date );  
					$this->update_look_comment_thumbs_up_or_down( $plcno , $action ); 
					// return false;
				}   
			} 
			public function post_look_comment(  $mno , $plno , $comment , $post_comment , $dtime , $st , $nexprev ,  $sort_comment , $profilepath  ) {
				// echo " posted "; 
				$this->print_look_comment( $mno , $plno , $comment , $post_comment , $dtime , $st , $nexprev ,  $sort_comment , $profilepath ); 	  
			} 
		#END LOOK COMMENT   



		#NEW ACTIVITY 
			public function get_more_friends_doing_the_action( $mno  , $_table_id , $action ) { 

				$total = 0;  
				switch ( $action ) {
					case 'Rated': 
							// echo "the look action Rated"; 
							// $Rated = $this->get_look_all_ratings( $_table_id ); 
							$Rated = $this->get_all_according_to_activity_action( 'Rated' , $_table_id , 'postedlooks' ); 
							$total = count($Rated)-1;    
						break;
					case 'Posted': 
							// echo "the look action is Posted";
						break; 
					case 'Shared': 
							// echo "the look action is Shared ";
							//$shared = $this->get_look_all_shared( $_table_id ); 
							// $total = count($shared)-1;
						break;
					case 'Driped': 
							// echo "the look action is Driped ";
							// $driped = $this->get_look_all_driped( $_table_id ); 
							// $total = count($driped)-1;
						break;
					case 'Favorited': 
							// echo "the look action is Favorited ";
							//$favorite = $this->get_look_all_favorites( $_table_id ); 
							// $total = count($favorite)-1;
						break;
					case 'Commented': 
							// $comments = $this->get_look_all_comments( $_table_id );  
							$comments = $this->get_all_according_to_activity_action( 'Commented' , $_table_id , 'postedlooks' ); 
							$total = count($comments)-1;    
							// echo "the look action is Commented ";

						break;  
					case 'Following':  
							// echo "the fs member following ";
							$total = $this->get_total_follower( $_table_id )-1; 
							// echo " $total ";
						break;  

					default: 
							// echo "the look action is Default";
						break;
				}   
				if ( $total > 0 ) {
					return "and  <b> <span id='action-look-more-friends'   onclick='show_more_friends_doing_the_same_action(  \"$mno\" , \"$_table_id\" , \"$action\"   )'  > $total others  </span> </b> ";
				}
				else{
					return null;
				} 

			}  
		#END ACTIVITY  

		#NEW LOOK 
			public function update_look_row( $plno , $rowname , $rowval , $tablename ) {
				switch ( $tablename ) { 

					case 'postedlooks':
 
							update_v1( 
				        		array(
					        		'table_name' => 'postedlooks',  
					        		$rowname     => $rowval 
					        	) ,
				        		array(
				        			'plno'=>$plno
			        			)  
			        		);   
  
			        		// echo " update table posted look ";
						break; 
					default:
					 		// echo " update table default ";
						break;
				}
			}
		#END LOOK  

		#NEW FOLLOW   	
			public function follow_un_follow_activity_wall_post(  $mno , $mno1 , $action , $_table , $date_time , $type ) {  

				switch ( $type ) { 
					case 'follow':  
							$this->update_or_add_my_activity_wall_post( $mno , $mno1 , $action , $_table , $date_time );    
						 
						break;
					case 'un-follow':      
							$this->delete_my_activity_wall_member_follow(  $mno , $mno1 , $action , $_table , $date_time , $type );  
							echo " delete my follow post ";  

						break; 
					default: 
						break; 
				} 
			} 
		#END FOLLOW  

		#NEW NOTIFICATION 
			public function send_user_notification(  ) {
				 return true;
			}
		#END NOTIFICATION  




		#NEW GENERAL COMMENT 
			  public function delete_modals_comment( $mno , $mcid , $_table_id , $_table ) { 

			  	#posted look is fix but need some upgrade for other function in the future
			  	#postarticle and postmedia is not yet coded.
			  	#this code is used to delete the modal including the latest in homepage.  
			  	// $mno = $mc->get_modal_owner( );  
			  	$this->delete_modal_comment( $mcid , $_table_id , $_table ); 
		      	$my_total_comment_to_modal = $this->get_modal_my_total_comment( $mno , $_table_id , $_table  );  
		      	// $this->get_modal_total_comment( 136 , 404 , 'fs_postedmedia'  ); 
		      	// $this->get_modal_total_comment( 136 , 404 , 'fs_postedarticles'  );  
		      	// echo " total comment on a look $my_total_comment_to_modal "; 
		      	$latestmodal  = $this->get_modal_activity_latest( $_table_id , $_table );   
		      	// print_r($latestmodal); 
		      	$mno1 = intval($latestmodal[0]['mno']); 
		      	$action = $latestmodal[0]['action'];   
 				$owner=false; 
		      	if( $owner ){  
			   		# kulang ug if iayaha ang look then iyang gi delete and comment.
			      	# if owner comment is zero and he deleted the comment of the others and as total comment is zero then the latest comment in the feed.		 
		      	}
		      	elseif ( $mno == $mno1 ) {
			        # latest modal activity is urs 
			        echo "<br>the latest comment is urs "; 
			        if ( $my_total_comment_to_modal == 0 ) { 
			          #u have zero comment in your modals 
			          $pos = strpos($action,'Posted');
			          echo " position $pos";
			          if ( $pos ) {
			            #fixed
			            echo "<br> current action = $action ";
			            $action = str_replace( 'Commented and ', '' , $action); 
			            echo "<br> new action = $action<br> "; 
			            echo "<br>update action = $action the latest activty for specific modal<br>"; 

			            $tc       = $this->get_modal_total_comment( $_table_id , $_table );  
			                        $this->update_modal_total_comment( $tc , $_table_id , $_table );  
			            $activity = $this->get_modal_activity_latest( $_table_id , $_table );
			            $ano      = $activity[0]['ano'];    
			            $this->update_activity_action( $ano , $action ); 

			            /*
			              $this->delete_modal_comment( );  
			              $this->update_modal_activity( )
			              exist
			            */            
			        }
			        else{

			            #fixed
			            echo "modal is not urs <br>"; 
			            echo "modal comment delete <br> ";
			            echo "modals activty delete <br>"; 
			            echo "update the latest activty for specific modal just deleted to replace active set to 1<br>";   

			            // $this->delete_modal_comment( $mcid , $_table );  
			            $this->delete_modal_activity_posted( $mno , 'Commented' , $_table_id , $_table );
			            $tc = $this->get_modal_total_comment( $_table_id , $_table );  
			            $this->update_modal_total_comment( $tc , $_table_id , $_table );  
			            $activity = $this->get_modal_activity_latest( $_table_id , $_table );
			            $ano = $activity[0]['ano'];  
			            echo " ano = $ano <br> ";
			            $this->update_activity_active_status( $ano , 1 );  

			            /*
			              $this->delete_modal_comment( ); 
			              $this->delete_modal_activity_posted( ); 
			              $this->get_modal_activity_latest( $_table_id , $_table )
			              $this->update_modal_activity( )
			              exist
			            */       

			          } 
			        }else{
			          #fixed
			          echo " u still have a comment in the modal <br>";
			          echo " no latest modal activity deleted because total comment is not zero but $my_total_comment_to_modal<br>"; 
			          echo " delete comment modal<br> ";
			          echo " get total comment and update total comment in the modal<br>"; 

			          // $this->delete_modal_comment( $mcid , $_table );  
			          $tc = $this->get_modal_total_comment( $_table_id , $_table );  
			          $this->update_modal_total_comment( $tc , $_table_id , $_table );  

			          /*
			            $this->delete_modal_comment( ); 
			            $this->get_modal_total_comment( );  
			            exist
			          */
			        } 
		      	}
		      	else {


			        # fixed
			        echo "  <br>modal is not urs <br> ";
			        echo "  ur posted activity for this modal is already hidden and it will just show in you profile<br>";
			        echo "  delete comment modal<br> "; 
			        echo "  update total modal total comment<br>";  

			        if ( $my_total_comment_to_modal == 0 ) { 
			        	 echo "   ur comment posted activity in this modal is deleted <br>";
			        	 echo " ur total comment in this modal is zero $my_total_comment_to_modal <br>";  
			        	// $this->delete_modal_comment( $mcid , $_table );  
				        $this->delete_modal_activity_posted( $mno , 'Commented' , $_table_id , $_table );
				        $tc = $this->get_modal_total_comment( $_table_id , $_table );  
				        $this->update_modal_total_comment( $tc , $_table_id , $_table );  

		      		}
		      		else{
		      			echo " ur comment posted activity in this modal is not deleted because <br>";
		      			echo " ur total comment in this modal is not zero but $my_total_comment_to_modal <br>";  

		      			$tc = $this->get_modal_total_comment( $_table_id , $_table );  
				        $this->update_modal_total_comment( $tc , $_table_id , $_table );  
		      		} 
		      	} 
		    }
		#END GENERAL COMMENT 






		#NEW LOGIN

		    // not in used
	     	public function login_page( $type , $mno ) { 

	       		 switch ( $type ) {

	       		 	case 'login-and-signup': ?>  


	       		 			<style type="text/css"> 
						 		#login-container { 
						 			/*border: 1px solid red ; */
						 			padding: 0px;
						 			margin: 0px; 
						 			width: 1024px; 
						 			font-family: 'arial';
						 			/*border: 1px solid red;*/
						 			font-size: 12px;
						 			margin: auto;

						 		} 
						 		#login-signup-header-td { 
						 			border-bottom: 1px solid #ccc;
						 			padding-bottom: 20px;
						 		}
						 		#login-signup-social-site-td { 
						 			border-bottom: 1px solid #ccc;
						 			padding-bottom: 20px;
						 		} 
						 		#login-signup-fields-td { 
						 			border-bottom: 1px solid #ccc;
						 			padding-bottom: 20px; 
						 		}
						 		#login-signup-fields-td ul  {  
						 		}
						 		#login-signup-fields-td ul li { 
						 			/*border: 1px solid red;*/
						 			float: left;
						 			width: 500px;
						 		}
						 		#login-signup-fields-td ul li div { 
						 			float: left;
						 			/*border: 1px solid green;*/
						 			width: 100%; 
						 		}  
						 		#login-signup-fields-td ul li div table {  

						 		 	float: left;
						 		} 
						 		#login-signup-fields-td ul li div input[type='text'] , #login-signup-fields-td ul li div input[type='password'] { 
						 			 width: 50%;
						 			 padding: 10px;
						 		} 
						 		#login-signup-fields-td ul li div input[type='submit'] { 
						 			 width: 200px;
						 			 padding: 15px;
						 		} 
						 		#login-error-login-message { 
						 			border: 1px solid red;  
						 			color: red; 
						 			font-size: 12px;
						 			width: 80.6% !important;
						 			padding: 10px;
						 		} 
						 		#signup-field-fullname {  
						 		}
						 		#signup-field-fullname li{ 
						 			float: left;
						 			border:1px solid red;
						 			width: 180px !important;
						 		} 
						 		#signup-fullname-table {  
						 		}
						 		 
						 		#signup-fullname-table td input {  

						 			width: 90% !important;
						 		}
						 		#signup-area-container select {  
						 			
						 			padding: 10px;
						 		} 
	       		 			</style>

       		 			 	<table  border="0" cellpadding="10" cellspacing="0" style="width:1024px;margin: auto;" >
       		 			 		<tr> 
       		 			 			<td id="login-signup-header-td" >  
       		 			 			 	Sign In | Sign Up  
       		 			 			</td>
       		 			 		<tr>
       		 			 			<td id="login-signup-social-site-td" >    


       		 			 				<?php if (true): ?>
										<!-- fb login  -->
											<div id="fb-root"></div>  
										    <script src="http://connect.facebook.net/en_US/all.js"></script>  
										    <script> 
											    FB.init({ 
											      appId: '528594163842974', 
											      cookie: true,
											      status: true, 
											      xfbml: true 
											    }); 
										    </script> <?php  
									        if ( $mno != 136 ) { 
									        	$_SESSION['temp_mno'] = intval($mno);
									     	 	// $this->go( 'login-authentication' );  
									        }
									        else{  
										        require 'fs_folders/API/facebook-php-sdk-master/src/facebook.php'; 
										        $facebook = new Facebook(array(
										          'appId'  => '528594163842974',
										          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
										        ));   
										        $user = $facebook->getUser();   
										        if ( $user ) { 
										          	try {  
										          		// $user_profile = $facebook->api('/me');
										            	#echo "user logon!"; 
										          	} catch (FacebookApiException $e) {
										            	error_log($e);
										            	$user = null;
										            	#echo "user logout!";
										          	}
										        }  
										        if ($user) {
										        	#echo " logout user";
										          	$logoutUrl = $facebook->getLogoutUrl(); 
										          	$params = array(
											            'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
											            	user_games_activity, user_groups, user_hometown, user_interests, user_likes
											            	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
											            	user_questions, user_relationship_details, user_relationships, user_religion_politics
											            	user_status, user_subscriptions, user_videos, user_website, user_work_history
											            	', 
											            	'redirect_uri' => 'http://fashionsponge.com/social-fblogin-authenticate.php'
											        );   
										          	$statusUrl = $facebook->getLoginStatusUrl();
										          	$loginUrl = $facebook->getLoginUrl($params);  
										        } else {  
										        	#echo " set parametter to login "; 
													$params = array(
											            'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
											            	user_games_activity, user_groups, user_hometown, user_interests, user_likes
											            	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
											            	user_questions, user_relationship_details, user_relationships, user_religion_politics
											            	user_status, user_subscriptions, user_videos, user_website, user_work_history
											            	', 
											            	'redirect_uri' => 'http://fashionsponge.com/social-fblogin-authenticate.php'
											        );   
										          	$statusUrl = $facebook->getLoginStatusUrl();
										          	$loginUrl = $facebook->getLoginUrl($params);  
										        } 
									        }    
									        ?>   
										  	<?php echo "<a href='$loginUrl'><img src='$this->genImgs/social-login-fb.png' /></a>";  ?>    
									    <!-- twitter login  --> 
									    <!-- google login  -->  
									    <?php endif; ?>
       		 			 			</td> 
       		 			 		<tr>
       		 			 			<td id="login-signup-fields-td" >  
   		 			 					<?php 
       		 			 						$login_error = false;
       		 			 						$signup_error = false; 
									       		$this->email = '';
												$this->password = '';
												$this->fname = '';
												$this->nname = '';
												$this->lname = '';

   		 			 						 	if ( isset( $_POST['fs_login']) ) {  

												 	if ( $mno = $this->validate_fs_login_info( $_POST['mailusername'] , $_POST['password'] ) ) {  
											 			$_SESSION['temp_mno'] = intval($mno);
												 		$this->go("login-authentication");
												 	}  
												 	else{  
												 		$login_error = " (*) Invalid Username or Password ";
												 	}
												}   
												else if ( isset( $_POST['fs_signup']) ) {  
 
													// $signup_error = " sign up checking ..";    

													

													$signup_error = $this->sign_up_member(  
														$array = array(
															'email'        => $_POST['email'] , 
															'password'     => $_POST['password'] , 
															'first name'   => $_POST['fname'] , 
															'nick name'    => $_POST['nname'] , 
															'last name'    => $_POST['lname'] , 
															'birth year'   => $_POST['byear'] , 
															'gender'       => $_POST['gender'] , 
														)  
													);  
													
													if ( empty($signup_error)) {
														echo "<span class='green' > sign up data accepted</span>  <br>";
													}
												}  
												// echo " error here $signup_error <br>"; 
												$fb_friends_in_fs = $this->get_all_fs_fbusers_id();    
												#echo " last page visited = ".$_SESSION['lastpagevisited']." mno = $mno <br>";   

       		 			 					?>  
       		 			 				<center>
	       		 			 				<ul> 
	       		 			 					<li style="width:450px;">   
		       		 			 					<div id="login-area-container" >
		       		 			 						<form action="login" method="post" > 
		       		 			 							<table  cellpadding="5"  > 
		       		 			 								<?php if ( $login_error != false  ): ?>
		       		 			 								<tr> 
		       		 			 									<td style="padding-bottom:20px;" > 	
		       		 			 										<div id="login-error-login-message" >
		       		 			 											<?php  
		       		 			 												echo "$login_error";
		       		 			 											?>
		       		 			 										</div> 
		       		 			 									</td>
		       		 			 								<?php endif; ?>
			       		 			 							<tr> 
			       		 			 								<td>  Email or Username </td>
			       		 			 							<tr>
			       		 			 								<td> <input type="text"      placeholder='E-mail/Username' name="mailusername" />  </td>
			       		 			 							<tr>
			       		 			 								<td>  Password </td>
			       		 			 							<tr>
			       		 			 								<td> <input type="password"  placeholder='password' name="password" /> </td>
			       		 			 							<tr>
			       		 			 								<td> 
			       		 			 									<table> <tr>  <td> <input type="checkbox" value="temp" >  </td> <td> Remember me </td></table>  
			       		 			 								</td>
			       		 			 							<tr>
			       		 			 								<td>  
			       		 			 									<table border="0" cellpadding="0" cellspacing="0" style="  width:498px;" >
			       		 			 										<tr> 
			       		 			 											<td> <input type="submit"  name='fs_login' />    </td>
			       		 			 											<td>  
			       		 			 												<a href="#" >forgot password </a> <br> 
			       		 			 												<a href="#" >resend email</a>
			       		 			 											</td>
			       		 			 									</table> 
			       		 			 								</td> 
		       		 			 							</table> 
											    		</form> 	
		       		 			 					</div> 
	       		 			 					</li>  
	       		 			 					<li  style="border-left: 1px solid #ccc; width:540px;  " > 
	       		 			 						<div id="signup-area-container" style="border:1px solid none; width:100%; margin-left:10px;" > 
		       		 			 						<form action="login" method="post" > 
		       		 			 							<table  style="width:100%;" border="0" cellpadding="5" > 
		       		 			 								<?php if ( $signup_error!=false  ): ?>
		       		 			 								<tr> 
		       		 			 									<td style="padding-bottom:20px;" > 	
		       		 			 										<div id="login-error-login-message" > <?php echo "$signup_error"; ?> </div> 
		       		 			 									</td>
		       		 			 								<?php endif; ?>
			       		 			 							<tr> 
			       		 			 								<td>E-mail</td>
			       		 			 							<tr>
			       		 			 								<td> <input style="<?php echo $this->style_email; ?>" value="<?php echo "$this->email"; ?>"  type="text"      placeholder='E-mail' name="email"   />  </td>
			       		 			 							<tr>
			       		 			 								<td>Password</td>
			       		 			 							<tr>
			       		 			 								<td> <input style="<?php echo $this->style_password; ?>"  value="<?php echo "$this->password"; ?>"  type="password"  placeholder='password' name="password" /> </td> 
			       		 			 							<tr>
			       		 			 								<td>  
			       		 			 									<!-- fullname -->
			       		 			 									<table border="0" cellpadding="0" cellspacing="0" style='width:100% !important' id="signup-fullname-table" > 
			       		 			 										<tr> 
			       		 			 											<td>First Name</td> 
			       		 			 											<td>Nick Name</td> 
			       		 			 											<td>Last Name</td> 
			       		 			 										<tr> 
			       		 			 											<td> 
			       		 			 												<input style="<?php echo $this->style_fname; ?>"  value="<?php echo "$this->fname"; ?>"  type="text"      placeholder='First Name' name="fname" />  
			       		 			 											</td> 
			       		 			 											<td> 
			       		 			 												<input style="<?php echo $this->style_nname; ?>"  value="<?php echo "$this->nname"; ?>" type="text"      placeholder='Nick Name' name="nname" />  
			       		 			 											</td> 
			       		 			 											<td> 
			       		 			 												<input style="<?php echo $this->style_lname; ?>"  value="<?php echo "$this->lname"; ?>" type="text"      placeholder='Last Name' name="lname" />  
			       		 			 											</td>
			       		 			 									</table>  
			       		 			 								</td> 
			       		 			 							<tr>
			       		 			 								<td> 
			       		 			 									Birth Year  
			       		 			 								</td>
			       		 			 							<tr>
			       		 			 								<td> 
				       		 			 								<select name="byear" >
				       		 			 									<?php for ($i=1940; $i < 2005 ; $i++) {   
				       		 			 										echo "<option>$i</option>";
				       		 			 									} ?>
				       		 			 								</select>
			       		 			 								</td> 
			       		 			 							<tr> 
			       		 			 								<td> 
			       		 			 									Gender
			       		 			 								</td>
			       		 			 							<tr>
			       		 			 								<td> 
				       		 			 								<select name="gender" > 
				       		 			 									<option>Male</option> 
				       		 			 									<option>Female</option>  
				       		 			 								</select>
			       		 			 								</td>  
			       		 			 							<tr>
			       		 			 								<td> <input type="submit"  name='fs_signup' value="Sign Up" /> </td> 
		       		 			 							</table> 
											    		</form> 	
		       		 			 					</div>  
	       		 			 					</li>
	       		 			 				</ul>
       		 			 				</center> 
       		 			 			</td> 
       		 			 	</table>  
	       		 			<?php 
	       		 		break;
	       		 	case 'fogot-password': 
	       		 			echo " forgot password <br>";
	       		 		break;
	       		 	case 'resend-email-activation': 
	       		 			echo " this is the resend-email-activation <br>";
	       		 		break; 
	       		 	default:   
		       		 		break;
	       		 }
	       	}  
	       	public function login_page1( $page ) {   
		       	switch ( $page )  {  
		       	 		case 'login';
		       	 				require( "$this->login_path_page/login-view.php" );
		       	 			break;
		       	 		case 'signup-code':
		       	 			 	require( "$this->login_path_page/signup-code.php" ); 
		       	 			break;
		       	 		default:
                                // require( "$this->login_path_page/welcome.php" );
                                require("$this->login_path_page/welcome/welcome-about-user.php");
		       	 			break;
		       	} 
	       	}

	       	public function social_login( $type , $imgname=null , $link=null, $hoverImage=NULL, $id=NULL, $style='width:100%; height:auto;', $target=NULL) {
	       		switch ( $type ) {
	       			case 'facebook': ?>
	       				 	<!-- fb login  -->
								<div id="fb-root"></div>  
							    <script src="http://connect.facebook.net/en_US/all.js"></script>  
							    <script> 
								    // FB.init({ 
								    //   appId: '528594163842974', 
								    //   cookie: true,
								    //   status: true, 
								    //   xfbml: true 
								    // }); 
							    </script> 


							    <?php  
						        
							        require 'fs_folders/API/facebook-php-sdk-master/src/facebook.php';
							        $facebook = new Facebook(array(
							          'appId'  => '528594163842974',
							          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
							        ));   
							        $user = $facebook->getUser();   
							        if ( $user ) { 
							          	try {  
							          		// $user_profile = $facebook->api('/me');
							            	#echo "user logon!"; 
							          	} catch (FacebookApiException $e) {
							            	error_log($e);
							            	$user = null;
							            	#echo "user logout!";
							          	}
							        }  
							        if ($user) {
							        	#echo " logout user";
							          	$logoutUrl = $facebook->getLogoutUrl(); 

							         	// $params = array(
								        //     'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
								        //     	user_games_activity, user_groups, user_hometown, user_interests, user_likes
								        //     	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
								        //     	user_questions, user_relationship_details, user_relationships, user_religion_politics
								        //     	user_status, user_subscriptions, user_videos, user_website, user_work_history
								        //     	', 
								        //     	'redirect_uri' => 'http://fashionsponge.com/social-fblogin-authenticate.php'
								        // );   

								        $params = array(
								            'scope' =>
								           	 	'email',
								           	 	'user_likes',
								           	 	'user_about_me',
								           	 	'name',
												'first_name',
												'last_name',
												'age_range',
												'link',
												'gender',
												'locale',
												'timezone', 
												'user_education_history', 
												'user_hometown',
												'user_website',
												'user_work_history', 
												'user_birthday',
								          	'redirect_uri' => 'http://dev.fashionsponge.com/social-fblogin-authenticate.php'
								        );   



								        // $params = array(
								        //     'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
								        //     	user_games_activity, user_groups, user_hometown, user_interests, user_likes
								        //     	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
								        //     	user_questions, user_relationship_details, user_relationships, user_religion_politics
								        //     	user_status, user_subscriptions, user_videos, user_website, user_work_history
								        //     	', 
								        //     	'redirect_uri' => 'http://fashionsponge.com/social-fblogin-authenticate.php'
								        // );   



							          	$statusUrl = $facebook->getLoginStatusUrl();
							          	$loginUrl = $facebook->getLoginUrl($params);  
							        } else {  
							        	#echo " set parametter to login "; 
										  // $params = array(
										  //           'scope' =>' email,friends_about_me,user_about_me,user_birthday, user_education_history,
										  //           	user_games_activity, user_groups, user_hometown, user_interests, user_likes
										  //           	user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
										  //           	user_questions, user_relationship_details, user_relationships, user_religion_politics
										  //           	user_status, user_subscriptions, user_videos, user_website, user_work_history
										  //           	', 
										  //           	'redirect_uri' => 'http://fashionsponge.com/social-fblogin-authenticate.php'
										  //       );   
 

								         $params = array(
								            'scope' =>
								           	 	'email',
								           	 	'user_likes',
								           	 	'user_about_me',
								           	 	'name',
												'first_name',
												'last_name',
												'age_range',
												'link',
												'gender',
												'locale',
												'timezone', 
												'user_education_history', 
												'user_hometown',
												'user_website',
												'user_work_history', 
												'user_birthday',
								          	'redirect_uri' => 'http://dev.fashionsponge.com/social-fblogin-authenticate.php'
								        );   



							          	$statusUrl = $facebook->getLoginStatusUrl();
							          	$loginUrl  = $facebook->getLoginUrl($params);  
							        }   
	       				 	return $loginUrl;  
	       				break;  
	       					case 'print-image': 
	       						
	       						echo "<a href='$link' target='$target' >
	       							<img  
	       								id='$id' 
	       								src='$imgname' 
	       								style='$style' 
	       								onmouseover=\"mousein_change_button ( '#$id' , '$hoverImage' )\"   
	       								onmouseout=\"mousein_change_button ( '#$id' , '$imgname' )\"
	       							/>
	       						</a>";
	       					break;
	       			default:
	       				 
	       				break;
	       		}
	       	}





		#END LOGIN
	} #end myclass     

	/**
	*  feb 18 ,2014
	*/




 
/*	

	
	print_rating_message
	print_rating_bubble
	posted_look_modals_share_icons 
	menu 
	look_with_more
	print_edit_and_flag_user
	print_look_footer_flag_or_edit
	get_look_counting_position
	print_follow_unfollow
	print_my_social_sites
	set_about_limit
	get_total_limit_show
	set_member_title  
	check_if_more
	set_text_limit_show
	get_res_len
	get_loop_start 
	get_loop_end 
	set_loop_counter
	date_difference
	split_date
	posted_look_info
	user
	top_member
	getTmaxrating
	calc_topmember
	test
	coarates_top
	highest_rate
	asceding_order1
	asceding_order2
	descending_order2
	decending_order1
	delete
	coarates
	calculate_rate
	cout_array 
	go
	url_redirect_to_no_www 
	whobyid
	user_profile_percentage
	whobyusername
	whobyfirstname
	whobylastname
	whobyemail
	convert_date_format_profile
	auto_detect_path
	next_prev_comments
	unflagged_design_auto_hide 
	deleting_comment_reply 
	automatic_insert
	insert_invited
	invite_popUp
	send_email_to_admin
	send_email_to_user
	insert_ads_to_posts
	button_api_google
	button_api_facebook
	button_api_twitter
	set_Login
	secure_login_sql
	clean_input
	fs_delete_data
	split_string_single
	split_string_multiple
	dialog
	plugins 
	header_attribute
	look_exist
	shuffle_array 
	generate_url
	selectV1 
	dateTime_convert
	image_mouseover_view
	retreive_specific_user_all_looks
	retreive_specific_user_all_looks_voted_by_viewer
	retreive_specific_user_all_looks_not_voted_by_viewer
	retreive_specific_user_all_looks_not_voted_by_viewer
	retreive_specific_user_post_article
	retreive_specific_user_all_article_voted_by_viewer
	retreive_specific_user_all_article_not_voted_by_viewer
	retreive_specific_user_post_media
	retreive_specific_user_all_media_voted_by_viewer
	retreive_specific_user_all_media_not_voted_by_viewer
	retreive_all_brands
	retreive_all_category
	retreive_all_brand_under_category
	retreive_all_selected_brand
	retreive_specific_user_brand_selected
	retreive_specific_user_has_thesame_brand_selected_and_sort_by_total_brands
	data_get_total_next_prev_numbers
	get_all_user
	get_all_postedarticle
	get_all_postedmedia 
	get_activity
	get_full_name_by_id
	get_full_name_by_look_id
	get_all_latest_look
	get_user_info_by_id
	get_user_account_by_id
	get_multiple_reply
	get_reply_replied
	get_total
	get_Generated_code  
	get_visitor_info
	get_fullname_by_mno
	get_html_colo_code
	get_mnobyusername
	get_mno_by_mail
	init_latest_modals_separation
	init_look_modals_separation
	init_member_modals_separation
	init_media_modals_separation
	init_article_modals_separation
	lookdetails_set_size_of_the_look 
	insert_activity_wall_posted
	get_last_id 
	update_table_to_active
	upload_profile_pic
	member_thumbnail_display
	remove_array_duplicate_itself_1darray
	remove_array_duplicate_itself_2darray
	remove_array_duplicate_itself_3darray
	fileExists
	get_file_extention
	get_all_brand_category
	get_brand_category_name
	get_all_category
	get_all_brand
	get_all_brand_by_categoryid_and_gender
	get_all_cagtegory_brand_by_categoryid_and_gender
	get_all_brand_by_categoryid
	print_brands
	print_new_uploaded_brands
	check_if_already_followed
	getGender 
	get_all_fs_fbusers_id() 
   ?>  
 	
 	/**
 	*  article
 	*  date : october 10 , 2013 
 	*/

 	class postarticle  
 	{
 		#rigion test.php
 		public function get_image_article( $url , $ri , $limit )
 		{	
 			$fcontent = file($url);
 			$fcontent_len = count($fcontent);
 			$article = array( );
 			$c = 0;
 			for ($i=0; $i < $fcontent_len ; $i++) 
 			{ 
 				$img = $fcontent[$i];

 				if (  strpos($img, '.jpg') > 0 /*  and  strpos($img, 'src=')  > 0 */  ) 
 				{ 	
 				 	if ( $this->is_not_ads( $img ) ) 
 				 	{ 
 				 		if ( strpos($img, 'src=')  > 0  ) 
 				 		{
 				 			# with source
 				 			$img_source = $this->get_image_source( $img );
						}
						else 
	 					{ 
	 						# no source only href 
	 						// echo " <br> $img <br>";

	 						$img_source = $this->get_image_link( $img );
	 					}

	 					$img_source = $this->add_img_url_if_dont_have( $img_source , $url ); 
	 					$img_source = $this->get_only_correct_size( $img_source , $ri , 100 , 150 );
	 					if ( !empty( $img_source) ) 
						{
							if ( $c <  $limit ) 
							{
								$article[$c]['img_source'] = $img_source;
							}
							else 
							{
								$i = $fcontent_len;
							}
							$c++;
						}
 				 	}
 				} 
 			}
 			return $article;
 		}
 		public function get_article_local_title_desc( $fcontent , $i ) #not in used
 		{
 			$c2=0;
 			$td = array( );
			for ($j=1; $j <20 ; $j++) 
			{
				$title_description = $fcontent[$i+$j];
				if (!empty($title_description)) 
				{
					if ( $c2==0) 
					{	
						$td[$this->c1]['title'] = $title_description;
					}
					else  
					{
						$td[$this->c1]['desc'] = $title_description;
						$j=20;
						$this->c1++;
					}
				}
				$this->c1++;
			}
			return $td;
		}
		public function get_image_source( $img )
		{
		 
		 	$img = str_replace('<div>','',$img);
			$img = str_replace('</div>','',$img);
			
			$img = str_replace('<li>','',$img);
			$img = str_replace('</li>','',$img);

		    $html = $img;
			$doc = new DOMDocument();
			$doc->loadHTML($html);
			$xpath = new DOMXPath($doc);
			$image_source = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
			return $image_source;
		}
		public function get_image_link(  $img )
		{
		 

		 echo " <hr> $img  <hr> ";
		}

 		public function get_title_in_a_website( $url )
 		{
			$html = $this->file_get_contents_curl( $url );
			$doc = new DOMDocument();
			@$doc->loadHTML($html);

			$nodes = $doc->getElementsByTagName('title');
			$title = $nodes->item(0)->nodeValue;
			$title = strip_tags($title);
			return $title ;
 		}
 		public function file_get_contents_curl($url) # used by get title
		{
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		    $data = curl_exec($ch);
		    curl_close($ch);
		    return $data;
		}
 		public function get_meta_data($url, $searchkey='') 
		{
			$str = '';   
		    $data = get_meta_tags($url);    // get the meta data in an array
		    foreach($data as $key => $value)
		    {
		        if(mb_detect_encoding($value, 'UTF-8, ISO-8859-1', true) != 'ISO-8859-1') {    // check whether the content is UTF-8 or ISO-8859-1
		            $value = utf8_decode($value);    // if UTF-8 decode it
		        }
		        $value = strtr($value, get_html_translation_table(HTML_ENTITIES));    // mask the content
		        if($searchkey != '') {    // if only one meta tag is in demand e.g. 'description'
		            if($key == $searchkey) {
		                $str = $value;    // just return the value
		            }
		        } else {    // all meta tags
		            $pattern = '/ |,/i';    // ' ' or ','
		            $array = preg_split($pattern, $value, -1, PREG_SPLIT_NO_EMPTY);    // split it in an array, so we have the count of words           
		            $str .= '<p><span style="display:block;color:#000000;font-weight:bold;">' . $key . ' <span style="font-weight:normal;">(' . count($array) . ' words | ' . strlen($value) . ' chars)</span></span>' . $value . '</p>';    // format data with count of words and chars
		        }
		    }
		    $str = strip_tags($str);
		    return $str;
		}
		public function retrieve_images_from_url( $content , $mc , $pa , $ri ) # not in used
		{
			$limitBlog = 20;
			$c = 0; 
			$n = 0; 
			$imagesArray = array();
			$content = str_replace('</','la',$content);
			$content = str_replace('<','l',$content);
			for ($i=0; $i < strlen($content) ; $i++) 
			{ 
				if ( $content[$i] == 'l' and $content[$i+1] == 'i' and $content[$i+2] == 'm' and  $content[$i+3] == 'g'  and  $content[$i+4] == ' '  ) 
				{
					$c++;
					if ($c <= $limitBlog ) 
					{

						$glc = 0; #get line counter
				 		$code_line = substr($content,$i+1,1000); # get the line as the image belongs
						$code_line = substr($content,$i+1,strpos($code_line,'/>')+2); #cut until image only
						$jpg_post = strpos($code_line, '.jpg');
					}	
					else 
					{ 
						$i = strlen($content);
					}

					if ($jpg_post) # IF image is jpg 
					{ 
						$c2=0;
						for ($l=$jpg_post; $l > 0 ; $l-- )  #get main source of image <img src =img /> 
						{ 
						 	if ( $code_line[$l] == 's' and $code_line[$l+1] == 'r' and $code_line[$l+2] == 'c' and  $code_line[$l+3] == '=' ) 
						 	{			 		
						 		$image_souce = substr($code_line,$l+5,$c2-1); # get image source
						 		$l = 0;
							}
							$c2++;

						}
 						// echo "$image_souce <br>";
						if ( $this->with_http($image_souce))  # if image found .
				 		{  
					 		$ri->load($image_souce); 
					 		if ($ri->getWidth() > 50 ) # width is greater than 250
							{
						 		$imagesArray[$n]['source'] = $image_souce;
						 		$n++;	 	
							}	
						}	
						else 
						{ 
							#image not exist
						}
					}
				}						
			}	
			// print_r($imagesArray);
			return $imagesArray;
		}
		public function get_article_desciription_and_tite( $url , $img , $img_name ) #not in used 
	 	{
			$content = file_get_contents( $url );
			$content = str_replace('<','-ldn-',$content);
			$imgpos = strpos( $content , $img_name );
			$desc = substr($content,$imgpos,1000);
			$descStopPos = strpos( $desc , '-ldn-/p>' );
			$descStartPos = strpos( $desc , '-ldn-p' );
			 $c=0;
			 for ($i=0; $i < $descStartPos; $i++) 
			 { 
			 	$c++;
			  	if ( $desc[$i] == '-' and $desc[$i+1] ==  'l' and $desc[$i+2] == 'd' and $desc[$i+3] =='n'  ) 
			  	{
			  		$i=$descStartPos;	 
			  	}	
			 }
			 $desc = substr($desc, $descStartPos , $c+26);
		}
		public function url_exists($url) 
		{
		    $mylinks=$url;
			$handlerr = curl_init($mylinks);
			curl_setopt($handlerr,  CURLOPT_RETURNTRANSFER, TRUE);
			$resp = curl_exec($handlerr);
			$ht = curl_getinfo($handlerr, CURLINFO_HTTP_CODE);
			if ($ht == '404' or empty($ht) )
			{ 
				return false;
			}
			else 
			{ 
				return true;
			}
		}
		public function  with_http ( $link ) 
		{ 
			$link =  'assadasd'.$link;
			if ( strpos($link, 'ttp') >  0 ) 
			{
				return true; 
			}
			else 
			{ 
				return false;
			}
		}
		public function get_only_correct_size( $img_source , $ri , $require_width , $require_height )
		{

			// $ri->load($img_source);
			// $width = $ri->getWidth();
			// $height = $ri->getHeight(); 


			list($width, $height, $type, $attr) = getimagesize($img_source);

			// echo "Image width " .$width;
			// echo "<BR>";
			// echo "Image height " .$height;
			// echo "<BR>";
			// echo "Image type " .$type;
			// echo "<BR>";
			// echo "Attribute " .$attr;

			if ( $width > $require_width and $height > $require_height   ) 
			{


				return $img_source; 
			}
			else 
			{ 
				return false;
			}
			return $article2; 
		}
		public function add_img_url_if_dont_have( $img_source , $url )
		{
			// echo "$img_source <br>";
	   		$www_pos = strpos($img_source, 'ttp');
		   	if ( $www_pos > 0 or !empty($www_pos) ) 
		   	{
				return $img_source;
		   	}
		   	else 
		   	{
		   		$url = $this->get_url_only( $url );
		   		/*
			   		$url = rtrim($url, "/");
			   		$url = dirname($url);
				*/
		   		$img_source = ltrim($img_source, "/");
		   		$curl = $url.'/'.$img_source;
		   		return $curl;
		   	}
		}
		public function get_descriptions( $url )
		{ 
 			$desc_array = array( );
			// echo " <h3> all paragraph as desc  </h3> ";
			$fcontent = file_get_contents( $url ); 

			$doc = new DOMDocument();
			$doc->loadHTML($fcontent); 
			$tags = $doc->getElementsByTagName('p'); 
			$i=0;
			foreach ($tags as $tag) 
			{ 
				if (  !empty($tag->nodeValue) ) 
				{ 
				       // echo $tag->getAttribute('href').' | '.$tag->nodeValue."<br>";
					// echo "$i .)   $tag->nodeValue<hr>";
					$desc_array[$i] = $tag->nodeValue;
					$i++;
				} 
			}
			// echo " <hr>";
			return $desc_array; 
		}
		public function change_description_if_lessthan50( $desc , $desc_content , $start , $end ) 
		{
		 	
		 	// echo " get descriptin";

			// if ( empty($desc) ) 
			// {
		  
				$total_cdesc = count($desc_content);
				count($total_cdesc);
				for ($i=0; $i < $total_cdesc ; $i++) 
		 		{
		 			$dc = $desc_content[$i];
		 			$dc_len = strlen($dc);
 
		 			// echo " $dc <hr>";

		 			if ( $dc_len  >  $start and  $dc_len  < $end  ) 
		 			{
		 				$desc = $dc;
		 				// echo "len is acceptable $dc_len <br>";
		 				$i = $total_cdesc;
		 			} 
		 			else 
		 			{
		 				 // echo " not acceptable $dc_len <br>";
		 			}
		 		} 

			// }
			// else if (  strlen($desc) < 50 )  
		 // 	{
		 // 		for ($i=0; $i < count($desc_content) ; $i++) 
		 // 		{
		 // 			$dc = $desc_content[$i];
		 // 			$dc_len = strlen($dc);




		 // 			// echo " content desc $dc <br>";

		 // 			if ( $dc_len > $start and $dc_len  < $end  ) 
		 // 			{
		 // 				$desc = $dc;
		 // 				// echo "len is acceptable $dc_len <br>";
		 // 				$i = $dc_len;
		 // 			} 
		 // 			else 
		 // 			{
		 // 				 // echo " not acceptable $dc_len <br>";
		 // 			}
		 // 		} 
		 // 	}

		 	return $desc;
		}
		public function test_get_images_from_url( $url ) // for testing only and not working 
		{
 	
 			
			$doc = new DOMDocument();
		    $doc->loadHTML($url);
		    $imagepaths=array();
		    $imageTags = $doc->getElementsByTagName('img');
		    // $folder=file_directory_path();
		    // foreach($imageTags as $tag) {

		    //     $imagepaths[]=$tag->getAttribute('src');

		    // }
		    $i=0;
		    foreach($imageTags as $tag) {
			   	$i++;
			    $imagepaths[$i]=urldecode($tag->getAttribute('src'));
			}

		    // if(!empty($imagepaths)){
		    	echo "images  ";
		      	print_r($imagepaths);
		      	// return urldecode($imagepaths);
		    // }else{

		    //     echo "walay image ";
		    // } 
		}
		public function is_not_ads( $img )
		{

			$banner = strpos($img,'banner');
			$header = strpos($img,'header');
			// $ads = strpos($img,'ads');
			// $profile = strpos($img,'profile');
			// $button = strpos($img,'button');

			
		 

			
			// echo " header pos is $b <br>";


			if (   $banner > 0 || $header >  0 ) 	 
			{
				
				// echo "image is a header , ads  or profile  <br> ";
				// return $img; 
				return false; 
			}
			else 
			{ 

				// echo "image is a good image <br>";
				return $img;
			}
		}
		public function get_video_embeded_code( $url )
		{

			if ( strpos($url,"youtube") ) 
			{
				$v = stristr($url,'v=');
				$v = substr($v,2,strlen($v));
				$this->vedio_type = "youtube";
			}
			else 
			{ 
				$this->vedio_type = "vimeo";
				$v = "30574825";
			}
			

			return $v;  
		}
		public function video( $url )
		{
			$video_array = array( );

			echo "url $url <br><br><br><br>";
			$v = stristr($url,'v=');
			$v = substr($v,2,strlen($v));
			echo "vid = $v <br>";
	
			echo '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$v.'" frameborder="0" allowfullscreen></iframe>';
		
			$vidID=$v;
			//http://www.youtube.com/watch?v=voNEBqRZmBc
			$url = "http://gdata.youtube.com/feeds/api/videos/". $vidID;
			$doc = new DOMDocument;
			$doc->load($url);
			$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
			$description = $doc->getElementsByTagName("description")->item(0)->nodeValue;
			$duration = $doc->getElementsByTagName('duration')->item(0)->getAttribute('seconds');

			

			// print "<b>TITLE:</b> ".$title."<hr>";
			// print "<b>Duration: </b>".$duration ."<hr>";
			// print "<b>description</b>: ".$description ."<hr>";



			$video_array[0]['vid'] = $v;
			$video_array[0]['vtitle'] = $title; 
			$video_array[0]['vdescription'] = $description; 
	 

			return $video_array;


			# kulang ang pag kuha sa tanang video nga available.
		}
		public function get_url_only( $url )
		{
			$com_pos = strpos($url,'.com');
			return substr($url,0,$com_pos+4);
		}
		public function remove_duplicate( $article , $url ) 
		{ 
			if ( strpos($url,'lookbook') > 0 )
			{
				$new_article = array();
	 			$artlen = count($article); 
	 			$c = 0; 
				for ($i=0; $i < $artlen ; $i++) 
				{ 
					$duplicate = false; 
					$article1 = $this->remove_from_questionmark( basename($article[$i]['img_source']) );
					for ($j=$i+1; $j < $artlen ; $j++) 
					{ 
						$article2 = $this->remove_from_questionmark( basename($article[$j]['img_source']) );
					 	if ( $article1 == $article2 ) 
					 	{
					 		$duplicate = true; 	
					 	}
					}
					if ($duplicate == true) 
					{
						// echo "false base name ".$article1.' == '.$article2.'<br>';
						// echo " true ";
						$duplicate == false;
					}
					else 
					{ 
						// echo "false base name ".$article1.' == '.$article2.'<br>';
						 $new_article[$c]['img_source'] = $article[$i]['img_source'];
						 $c++;
					}
				}
				// echo "new article is <br> ";
				// print_r( $new_article );
				return $new_article;
			}
			else 
			{
				return  $article;
			}
		}
		public function remove_from_questionmark( $article1 )
		{
			$art1pos = strpos($article1,'?');
			$article1 = substr($article1,0,$art1pos);
			return $article1;
		}
		#rigion postarticle.php
		public function post_article( $mc )
 		{	
			if ( isset($_POST["submit"]) ) 
			{	
				if ( !empty(  $_SESSION["article"] )) 
				{  
					$article = $_SESSION["article"];
					$num = $_POST["img_source_num"];
					$img_source = $article[$num]['img_source'];
				}

				if ( !empty( $img_source )) 
				{
					 
					echo " <h1> article succesfully posted </h1> ";
					$mc->date_difference();

					
				 	$article_title = str_replace("'","quattasd",$_POST["article_title"]);
				 	$article_description = str_replace("'","quattasd",$_POST["article_description"]);

				 	 

				 	$article_tags = $_POST["article_tags"];
					$article_category = $_POST["article_category"];
					
					
					$url = $_POST["articleLink"];
					
					$res = insert(
						"fs_postedarticles",
						array(
							"mno",
							"article_title",
							"article_description",
							"article_tags",
							"article_topic",
							"article_source_url",
							"article_source_item",
							"article_dateuploaded"
						),
						array(
					 		686,
					 		$article_title,
					 		$article_description, 
					 		$article_tags, 
					 		$article_category, 
					 		$url,
					 		$img_source,
					 		$mc->date_time
						),
						"article_Id"
					); 

					$last_inserted_id = $_SESSION["last_inserted_id"];
		 			$this->download_image_from_other_site( $last_inserted_id , $img_source , 'fs_folders/images/posted articles/' );


					echo "
						<br> 
						submitted num = $num <br> 
						article_tags = $article_tags <br> 
						article_category = $article_category <br> 
						article_title = $article_title <br> 
						article_description = $article_description <br> 
						image to be posted  = <img src='$img_source' />   <br>
						url = $url<br>
						last id = $last_inserted_id <br>
						 ";
	  

					$mc->go("home?fs_home_tab=fs_articles_tabs");
				}
				else
				{
				  	$mc->dialog( "alert" , " failed to post , please add link and select article from the results .. "); 
				}
			}
			else
			{ 
				// $mc->dialog(" posting article failed!.. "); 
			}
 		}
 		public function download_image_from_other_site( $imgNewName , $imgSource , $savedto )
		{

			echo " download_image_from_other_site( $imgNewName , $imgSource , $savedto ) ";
			 
			$ch = curl_init($imgSource);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
			$rawdata=curl_exec($ch);
			curl_close ($ch);

			$fp = fopen("$savedto"."$imgNewName.jpg",'w');
			fwrite($fp, $rawdata); 
			fclose($fp);

 
		}
		public function access_other_website_post( $ch , $nvp )
		{

			$ch = curl_init($ch);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvp);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, $nvp);
			curl_exec($ch);
		}
 	}	
 
   
?>








<?php 
	
	/**
	* admin 
	*/



	class admin extends admincodes
	{
		
		public function initialize_when_reload()
		{
			$_SESSION['admin_start_view_look'] = 0;
		}
		public function look_views($limit)
		{

			#if refresh let be start is 0.
			// if (empty($this->start)) 
			// {
				
				
			// }
			// if (   ) {
			// 	# code...
			// }
			$this->start = $_SESSION['admin_start_view_look'];
			$this->stop = $this->start+$limit;
			$_SESSION['admin_start_view_look'] = $this->stop;
			

			
			
		}
	}
 
	class admincodes
	{ 
		#
	}








 















 
	

?>
 






















<?php

/*
* File: SimpleImage.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 08/11/06
* Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details:
* http://www.gnu.org/licenses/gpl.html
*
*
/*	
* $resizeImage->set_all_for_location( 
*    "images/members/posted looks/$plno.jpg" ,  // source image 
*    "images/members/posted looks/home/$plno.jpg",  // save distination 
*    258,  //width
*    '',  //height
*    $ri // class object 
* );
*/

	class resizeImage 
	{

		var  $image;
		var $image_type;

		function load($filename) 
		{	
			// if ("../../fs/fs/images/members/posted looks/108.jpg" == $filename ) 
			// {
			//  	echo "image is equal";
			// }
			// else 
			// { 
			// 	echo "image is not equal";
			// }
			// echo " this is image <img src='$filename' /> ";
			// echo "<br>$filename";
			$image_info = getimagesize($filename);
			$this->image_type = $image_info[2];

			if( $this->image_type == IMAGETYPE_JPEG ) 
			{
				$this->image = imagecreatefromjpeg($filename);
			} 
			elseif( $this->image_type == IMAGETYPE_GIF ) 
			{
				$this->image = imagecreatefromgif($filename);
			} 
			elseif( $this->image_type == IMAGETYPE_PNG ) 
			{
				$this->image = imagecreatefrompng($filename);
			}
		}
		function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) 
		{
			if( $image_type == IMAGETYPE_JPEG ) 
			{
				imagejpeg($this->image,$filename,$compression);
			} 
			elseif( $image_type == IMAGETYPE_GIF ) 
			{
				imagegif($this->image,$filename);
			} 
			elseif( $image_type == IMAGETYPE_PNG ) 
			{
				imagepng($this->image,$filename);
			}
			if( $permissions != null) 
			{
				chmod($filename,$permissions);
			}
		}
		function output($image_type=IMAGETYPE_JPEG) 
		{
			if( $image_type == IMAGETYPE_JPEG ) 
			{
				imagejpeg($this->image);
			} 
			elseif( $image_type == IMAGETYPE_GIF ) 
			{
				imagegif($this->image);
			} 
			elseif( $image_type == IMAGETYPE_PNG ) 
			{
				imagepng($this->image);
			}
		}
		function getWidth() 
		{
			return imagesx($this->image);
		}
		function getHeight() 
		{
			return imagesy($this->image);
		}
		function resizeToHeight($height) 
		{
			$ratio = $height / $this->getHeight();
			$width = $this->getWidth() * $ratio;
			$this->resize($width,$height);
			// $this->resize($this->getWidth(),$height);
		}
		function resizeToWidth($width) 
		{
			$ratio = $width / $this->getWidth();
			$height = $this->getheight() * $ratio;
			$this->resize($width,$height);
			// $this->resize($width,$this->getheight());
		}
		function scale($scale) 
		{
			$width = $this->getWidth() * $scale/100;
			$height = $this->getheight() * $scale/100;
			$this->resize($width,$height);
		}
		function resize($width,$height) 
		{
			$new_image = imagecreatetruecolor($width, $height);
			imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
			$this->image = $new_image;
		}      
		function set_all_for_location( $loadImg , $saveImg , $width = null , $height = null , $classObject ) 
		{  
			$classObject->load($loadImg);
	 		
	 		// echo " $loadImg <br>";
	 		if ( !empty($width) ) 
			{
				$classObject->resizeToWidth($width);
			}
			if ( !empty($height) ) 
			{
				$classObject->resizeToHeight($height);
			}
			$classObject->save($saveImg);
		} 
	}
?>




 