<?php 

// all_look_i_have_rated
// get_ownlook_total_ratings
 
 // get_1look_percentage
 	// topratedlook_i_have_rated
// echo "string";
// print_r(expression)
// convert_1d
// count_lcomment_reply


	function insert_adds($looks_arraay,$ads){ 
		$look_w_ads=inser_ads($looks_arraay,$ads);
		return $look_w_ads;
	}

	function inser_ads ($looks_arraay,$ads){ 
		$ads_location=4;
		$insertat=0;
		$c=0;
		for ($i=0; $i < count($looks_arraay); $i++) { 
			if ($ads_location == $i) {
				$array2d[$i][0] = $ads[$c];
				$array2d[$i][1] = 'ads';	
				$c++;			
				if ($ads_location == 4) {
					$ads_location+=11;
				}else { 
					$ads_location+=12;
				}
				$looks_arraay = move_forward($looks_arraay,$i);
			}
			else { 
				$array2d[$i][0] = $looks_arraay[$i][0];
				$array2d[$i][1] = $looks_arraay[$i][1];					
			}
		}
		return $array2d;
		// print_r($looks_arraay);
		// echo "<br>final looks with ads <br>";
		// for ($i=0; $i < count($array2d); $i++) { 
			// echo " ads located at idex = $ads_location <br>";
			// $ads_location+=12;
			// echo "plno = ".$array2d[$i][0]."value = ".$array2d[$i][1]."<br>";
		// }
	}
	function move_forward($looks_arraay,$i){ 
		$sub1 = $looks_arraay[$i][0];
		$sub2 = $looks_arraay[$i][1];
		$len=count($looks_arraay)+1;
		#movea and transfer
		for ($j=$i+1; $j<$len; $j++) { 
			$sub3 = $looks_arraay[$j][0];
			$sub4 = $looks_arraay[$j][1];
			$looks_arraay[$j][0] = $sub1;
			$looks_arraay[$j][1] = $sub2;
			$sub1 = $sub3;
			$sub2 = $sub4;
		}
		return $looks_arraay;
	}
	function get_all_look_latest(){ 
		$alllook=select(
			'postedlooks',
			7,
			'',
			'order by plno desc'
			);
		// print_r($alllook);
		
		$converted_looks=convert_2d_more($alllook,array(0,2));
		// print_r($converted_looks);
		return $converted_looks;
	}
   // select($tableName,$tablen,$where=null,$orderby=null,$limit=null)
	function get_all_ads(){
		$ADS_INFO=select('ads',7);
		return $ADS_INFO;
	}
	function get_all_ads_id(){ 
		$all_ads=get_all_ads();
		return convert_1d($all_ads,0);
	}
	function ads($i){ 
		$link = 'https://www.google.com.ph/';
		$desc ="Denmark based fashion photographer Henrik Adamsen notched up several careers before his career in photography. Starting out as a retoucher in the early 90s, before moving on to graphic design andnnn.";


		// $ADS_INFO=select(
		// 	'ads',
		// 	7,
		// 	array('ano',$i)
		// 	);
		// $file = $ADS_INFO[0][0].".".strtoupper($ADS_INFO[0][5]);
		// $link=$ADS_INFO[0][4];


		// if (empty($ADS_INFO)) {
		// 	echo  "
		// 		<li style='height:460px;border:none'> 
		// 			<div id='ads_img'> 
		// 				<img src='images/ads/$file' width='100%' height='250' />  
		// 			</div>
		// 				<br>
		// 			<div id='ads_desc' > 
		// 			<center> 
		// 				<div id='link'>
		// 					<a style='text-decoration:none;color:white' href='$link'> ".strtoupper($link)."</a>
		// 				</div> 
		// 			</center>
		// 			<div id='message'> 
		// 				$desc
		// 			</div> 
		// 			<div id='logo'> 
		// 				<img src='images/ads/logo.jpg' width='50px' height='50px'  /> 
		// 			</div>
		// 		<div>		
		// 	</li>";
		// }		
		// else {  
			// echo "file is $file  ";
			echo  "
				<li style='height:460px;border:none'> 
					<div id='ads_img'> 
						<img src='images/ads/12.gif' width='100%' height='250' />  
					</div>
						<br>
					<div id='ads_desc' > 
					<center> 
						<div id='link'>
							<a style='text-decoration:none;color:white' target ='_blank' href='$link'> ".strtoupper($link)."</a>
						</div> 
					</center>
					<div id='message'> 
						$desc
					</div> 

					<div id='logo'> 
						<img src='images/ads/logo.jpg' width='50px' height='50px'  /> 
					</div>
				<div>		
			</li>";
		// }		
	}
	function most_discussed_i_have_rated($sortBy=null){

		$myrlookcm = myratedlookcm($_SESSION['mno']);
		if (!empty($myrlookcm[0])) {
			$plno_tcomments=most_discussed_look($myrlookcm);
			$plno_tcomments = add_sortingshow_date($plno_tcomments);
			$sorted_mdihr = newest_or_oldest2d($sortBy,$plno_tcomments,1);
			return $sorted_mdihr;	
		}
		else{ 
			return 0;
		}
	}  
	function most_discussed_i_have_not_rated($sortBy=null){
		$mynrlookcm = mynotratedlookcm($_SESSION['mno']);
		if (!empty($mynrlookcm[0])) {
			$plno_tcomments=most_discussed_look($mynrlookcm);
			$plno_tcomments = add_sortingshow_date($plno_tcomments);
			$sorted_mdihr = newest_or_oldest2d($sortBy,$plno_tcomments,1);
			return $sorted_mdihr;
		}
		else{ 
			return 0;
		}		
	}
	function most_viewed_i_have_rated($sortBy=null){
		$myrlookcm = myratedlookcm($_SESSION['mno']);
		if (!empty($myrlookcm[0])) {
			$plnoviews = get_plno_views($myrlookcm);
			$plnoviews = add_sortingshow_date($plnoviews);
			$sorted_plnoviews = newest_or_oldest2d($sortBy,$plnoviews,1);
			return $sorted_plnoviews;
		}
		else{ 
			return 0;
		}		
	}
	function most_viewed_i_have_not_rated($sortBy=null){
		$myrnlookcm = mynotratedlookcm($_SESSION['mno']);
		if (!empty($myrnlookcm[0])) {
			$plnoviews = get_plno_views($myrnlookcm);
			$plnoviews = add_sortingshow_date($plnoviews);
			$sorted_plnoviews = newest_or_oldest2d($sortBy,$plnoviews,1);
			return $sorted_plnoviews;
		}
		else{ 
			return 0;
		}		
	}	
	function get_plno_views($plnos){
		for ($i=0; $i < count($plnos); $i++) { 
			$looks=select1_wop('
				postedlooks',
				7,
				array('plno',$plnos[$i]),
				'='
			);
			$index_ar = array('0','6');
			 $plno_vies[$i]=convert_2d_more($looks,$index_ar);
		}
		for ($i=0; $i < count($plno_vies) ; $i++) { 
			for ($j=0; $j <  2 ; $j++) { 
				 $plnov[$i][$j] = $plno_vies[$i][0][$j];
				 $plnov[$i][$j] = $plno_vies[$i][0][$j];
			}
		}
		return $plnov;
	}
	function convert_2d_more($twod_Array,$index_ar){ 
		for ($i=0; $i < count($twod_Array); $i++) { 
			for ($j=0; $j < count($index_ar) ; $j++) { 
				$two_mored[$i][$j]=$twod_Array[$i][$index_ar[$j]];
			}
		}
		return $two_mored;
	}
	function topratedlook_i_have_rated($sortBy=null){
 		$myrlookcm = myratedlookcm($_SESSION['mno']);
 		if (!empty($myrlookcm[0])) {
		    $hrating = get_max_rate($myrlookcm);
	 	    $toplook = get_ownT_ratings_plnos($myrlookcm);
	 	    $toplook = add_sortingshow_date($toplook);
	 		$sorted_trlihr = newest_or_oldest2d($sortBy,$toplook,1);
 			echo "after add days = ";
 			// print_r($sorted_trlihr);
	 		return $sorted_trlihr;
		}
		else{ 
			return 0;
		}	 	
	} 
	function add_sortingshow_date($sorted_plnos){ 
		// print_r($sorted_plnos);
		for ($i=0; $i < count($sorted_plnos); $i++) { 
			$date=get_specific_data('postedlooks',$sorted_plnos[$i][0],2);
			// echo "<br>plno = ".$sorted_plnos[$i][0]." date uploaded = $date <br>";
			$day=substr($date,strlen($date)-2,2);
			// echo "day = $day <br>";
			$sorted_plnos[$i][1]+=$day;
		}	
		return $sorted_plnos;
	}
	function get_specific_data($tablename,$plno,$index){ 
		// echo "$plno <br>";
		$linfo=select1_wop("
			$tablename",
			7,
			array("plno",$plno),
			"="
		);
		// print_r($linfo);
		// echo '<br>'.$linfo[0][$index].'<br>';
		return $linfo[0][$index];
	}
	function topratedlook_i_have_not_rated($sortBy=null){
 		$mynrlookcm = mynotratedlookcm($_SESSION['mno']);
 		if (!empty($mynrlookcm[0])) {
		    $hrating = get_max_rate($mynrlookcm);
	 	    $toplook = get_ownT_ratings_plnos($mynrlookcm);
	 	    $toplook = add_sortingshow_date($toplook);
	 		$sorted_trlihnr = newest_or_oldest2d($sortBy,$toplook,1);
	 		return $sorted_trlihnr;
		}
		else{ 
			return 0;
		}		 	
	}
	function all_look_i_have_rated($sortBy=null){  
 		$myrlookcm = myratedlookcm($_SESSION['mno']);
		if (!empty($myrlookcm[0])) {
			$hrating = get_max_rate($myrlookcm);
		 	$toplook = get_ownT_ratings_plnos($myrlookcm);
		 	 $toplook = add_sortingshow_date($toplook);
		 	$sorted_arl = newest_or_oldest2d($sortBy,$toplook,0);
			return $sorted_arl;
		}
		else{ 
			return 0;
		}	
	}	
	function get_1look_percentage($look,$rated_or_nrated){
		if ($rated_or_nrated == 'rated') {
			$plnos = myratedlookcm($_SESSION['mno']);
		}
		else if($rated_or_nrated == 'not rated'){ 
			$plnos = mynotratedlookcm($_SESSION['mno']);
		}
		
		$hrating = get_max_rate($plnos);
		// $TLpercentage = calc_perccentage_1look($look,$hrating);
		// $TLpercentage = calc_own_look_perccentage($plno);
		return $TLpercentage;
	}
	function get_ownlook_total_ratings($plno){ 
		// echo " plno  = $plno";
		$Trate = 0;
		$sum=0;
		$ratings=select1_wop('
			ratings',
			4,
			array('plno',$plno),
			'='
		);
		// print_r($ratings);
		if (!empty($ratings)) {
			// echo "not empty";
			for ($i=0; $i < count($ratings); $i++) { 
				 $Trate++;
				$sum += $ratings[$i][3];
				 // echo " sum = $sum <br>";
			}
			$Trate*=5;
 			// echo "total sum  = $sum and total rates = $Trate <br>";
			$ltrate = ($sum / $Trate) * 100;
			$Tpecentage = intval($ltrate); 	
			// echo "Rate is = $Tpecentage% <br>";
			return 	$Tpecentage;	
		}else { 
			// echo "empty";
			return 0;
		}
		// return 0;
	}
	function get_ownT_ratings_plnos($plnos){
			if (!empty($plnos)) {

				for ($i=0; $i <count($plnos) ; $i++) { 
					$c=0;
					$sum=0;					
					$plratings=select('ratings',4,array('plno',$plnos[$i]));

					if (empty($plratings)) {
						$rated[$i][0] = $plnos[$i];
						$rated[$i][1] = 0;
					}else {  
						for ($j=0; $j < count($plratings) ; $j++) { 
							$sum+=$plratings[$j][3];
							$c++;
						}	
						$ovallrating=$c*5;
						$ltrate = ($sum / $ovallrating) * 100;
						$rated[$i][0] = $plnos[$i];
						$rated[$i][1] = intval($ltrate);
					}
				}
				return $rated;
			}else{
				return "0";
			}		
	}	
	function calc_perccentage_1look($plno,$hrating){ 
		
		$hrating*=5;
		if (!empty($plno)) {
			$c=0;
			$sum=0;
				 $plratings=select('ratings',4,array('plno',$plno));
				 for ($j=0; $j < count($plratings) ; $j++) { 
					$sum+=$plratings[$j][3];
				 }	
				$ltrate = ($sum / $hrating) * 100;
				$sum=0;
				$Tpecentage = intval($ltrate);
			return $Tpecentage;
		}else{
			return "0";
		}
	}
	function all_look_i_have_not_rated($sortBy=null){ 
		$mynrlookcm=mynotratedlookcm($_SESSION['mno']);
		if (!empty($mynrlookcm)) {
			$hrating = get_max_rate($mynrlookcm);
		 	$toplook = get_ownT_ratings_plnos($mynrlookcm);
		 	 $toplook = add_sortingshow_date($toplook);
		 	$sorted_anrl = newest_or_oldest2d($sortBy,$toplook,0);
			return $sorted_anrl;
		}
		else{ 
			return 0;
		}
	} 
	function myratedlookcm($mno){
		$date_attr = get_date_attr();
		$cyr_mnth = "$date_attr[yr]-$date_attr[mnth]";		
		$myrlookcm=get_rated_look($mno,$date_attr['mnth'],$date_attr['yr']);
		return $myrlookcm;
	}
	function mynotratedlookcm($mno){
		$date_attr = get_date_attr();
		$cyr_mnth = "$date_attr[yr]-$date_attr[mnth]-0";
		$mynrlookcm=get_not_rated_look($mno,$date_attr['mnth'],$date_attr['yr']);
		return $mynrlookcm;
	}
	function get_cmyrthday_0(){ 
		$date_attr = get_date_attr();
		$cyr_mnth = "$date_attr[yr]-$date_attr[mnth]-0";
		return $cyr_mnth;
	}	
	function newest_or_oldest1d($sortBy,$arry1d){
		if ($sortBy == 'newest') {
			$sorted= descending1d($arry1d);
		}
		else if($sortBy == 'oldest'){ 
			$sorted= ascending1d($arry1d);		
		}
		return $sorted;
	}
	function newest_or_oldest2d($sortBy,$arry2d,$index){
		if ($sortBy == 'newest') {
			$sorted= descending2d($arry2d,$index);
		}
		else if($sortBy == 'oldest'){ 
			$sorted= ascending2d($arry2d,$index);		
		}
		return $sorted;
	}
	function descending1d($int_array){ 	
		for ($i=0; $i < count($int_array) ; $i++) { 
			for ($j=$i+1; $j < count($int_array) ; $j++) { 
				
				 if ($int_array[$i] < $int_array[$j]) {
				 	           $sub = $int_array[$i];
				 	 $int_array[$i] = $int_array[$j];
				 	 $int_array[$j] = $sub;
				 }
			}
		}
		return $int_array;
	}	
	function ascending1d($int_array){ 		
		for ($i=0; $i < count($int_array) ; $i++) { 
			for ($j=$i+1; $j < count($int_array) ; $j++) { 
				 if ($int_array[$i] > $int_array[$j]) {
				 	           $sub = $int_array[$i];
				 	 $int_array[$i] = $int_array[$j];
				 	 $int_array[$j] = $sub;
				 }
			}
		}
		return $int_array;
	}	
	function descending2d($int_array,$index){ 		
		for ($i=0; $i < count($int_array) ; $i++) { 
			for ($j=$i+1; $j < count($int_array) ; $j++) { 
				 if ($int_array[$i][$index] < $int_array[$j][$index] ) {
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
	function ascending2d($int_array,$index){ 		
		for ($i=0; $i < count($int_array) ; $i++) { 
			for ($j=$i+1; $j < count($int_array) ; $j++) { 
				 if ($int_array[$i][$index] > $int_array[$j][$index] ) {
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
	function all_look_upl_current_month($date){ 
		$date="$date-0";
		$looks=select1_wop('
			postedlooks',
			7,
			array('date_',$date),
			'>'
		);
		$looks=convert_1d($looks,0);
		return $looks;
	}
	function top_rated_look($date){ 
		$date="$date-0";
		$looks=select1_wop('
			postedlooks',
			7,
			array('date_',$date),
			'>'
		);
		$plnos=convert_1d($looks,0);
		$hrating=get_max_rate($plnos);
	 	$toplook=get_ownT_ratings_plnos($plnos);
	 	$flookTopRates=descending2d($toplook,1);
		return $flookTopRates;
	}
	function most_viewed_look($date,$sortBy=null){
		// echo " date is $date";
		if ($sortBy == 'newest') {
			$sort='desc';
		}
		else if($sortBy == 'newest') { 
			$sort='asc';
		}
		else {
			$sort='asc';
		}
		$toplook = select1_wop(
				"postedlooks",
				7,
				array('date_',$date),
				">",
				"order by tview $sort"
		);
		$mvlooks = convert_1d($toplook,0);
		return $mvlooks;
	}
	function newest_look($date){ 
		$date="$date-0";  
		$looks = select1_wop(
				'postedlooks',
				7,
				array('date_',$date),
				'>',
				'order by plno desc'
		);
		$newetlook = convert_1d($looks,0);
		return $newetlook;
	}
	function oldest_look($date){ 
		$date="$date-0";  
		$looks = select1_wop(
				'postedlooks',
				7,
				array('date_',$date),
				'>',
				'order by plno asc'
		);
		$oldestlook = convert_1d($looks,0);
		return $oldestlook;
	}	
	function get_date_attr(){ 
		date_default_timezone_set('America/Los_Angeles');
		$date_attr = array(
			'yr' => date("Y"), 
			'mnth' => date("m"), 
			'dy' => date("d"), 
			'hr' => date("h"),  
			'min' => date("m"), 
			'sec' => date("s"),  
			);
		return $date_attr;
	}
	function get_max_rate($plnos){ 
		for ($i=0; $i <count($plnos) ; $i++) { 
			$looks=select1_wop('
				ratings',
				5,
				array('plno',$plnos[$i]),
				'='
			);
			if (empty($looks)) {
			}else{ 
				$max[$i] = count($looks);
			}
		}
		if (empty($max)) {
			#if no ratings happens yet
			$max=array('1');
		}
		
		return max($max);
	}
	function calc_top_look($plnos,$hrating){
			$hrating*=5;
			if (!empty($plnos)) {
				$c=0;
				$sum=0;
				for ($i=0; $i <count($plnos) ; $i++) { 
					 $plratings=select('ratings',4,array('plno',$plnos[$i]));
					 for ($j=0; $j < count($plratings) ; $j++) { 
						$sum+=$plratings[$j][3];
					 }	
					$ltrate = ($sum / $hrating) * 100;
					$sum=0;

					$rated[$i][0] = $plnos[$i];
					$rated[$i][1] = intval($ltrate);
				}
				return $rated;
			}else{
				return "0";
			}
	} 


	function set_month_days($month,$year=null){ 
		$month_days_set=array(
				'01'=>array('month'=>'January','day_start'=>0,'day_end'=>31),
				'02'=>array('month'=>'Febuary','day_start'=>0,'day_end'=>28),
				'03'=>array('month'=>'March','day_start'=>0,'day_end'=>31),
				'04'=>array('month'=>'April','day_start'=>0,'day_end'=>30),
				'05'=>array('month'=>'May','day_start'=>0,'day_end'=>31),
				'06'=>array('month'=>'June','day_start'=>0,'day_end'=>30),
				'07'=>array('month'=>'July','day_start'=>0,'day_end'=>31),
				'08'=>array('month'=>'August','day_start'=>0,'day_end'=>31),
				'09'=>array('month'=>'September','day_start'=>0,'day_end'=>30),
				'10'=>array('month'=>'October','day_start'=>0,'day_end'=>31),
			    '11'=>array('month'=>'November','day_start'=>0,'day_end'=>30),
			    '12'=>array('month'=>'December','day_start'=>0,'day_end'=>31)
			);
		return $month_days_set[$month];
	}
	function get_rated_look($mno,$date=null,$year=null){ 
		if (empty($date) and empty($year)) {
		 	$looks=select(
		 		'ratings',
		 		4,
		 		array('mno',$mno)
		 	);
		}
		else if( !empty($date) and !empty($year)){ 
			$days=set_month_days($date,$year);
			$fday_month = "$year-$date-$days[day_start]";
			$lday_month = "$year-$date-$days[day_end]";			
			$looks=select2_wop(
				'ratings',
				4,
				array('mno',$mno,'date_',$fday_month),
				array('=','and','>')
			);
		}
		else if(strlen($date) == 10)
		{
			$looks=select2_wop(
				'ratings',
				4,
				array('mno',$mno,'date_',$date),
				array('=','and','>')
			);
 		}else{ 
 			#invlid input
 		}	 	
 		if (!empty($looks)) { 
	 		
		 	for ($i=0; $i < count($looks) ; $i++) { 
		 		$look_rate[$i] = $looks[$i][1];
		 	}
		 	$rl_cm = get_look_in_cm($look_rate);
			return $rl_cm;
	 	}
	 	else{ 
	 		return 0;
	 	}
	}
 	function get_look_in_cm($plnos){ 
 		$c=0;
 		for ($i=0; $i < count($plnos) ; $i++) { 
		 	$postedlooks=select(
		 		'postedlooks',
		 		7,
		 		array('plno',$plnos[$i])
		 	);
		 	if ($postedlooks[0][2] > get_cmyrthday_0() ) {
		 		$look_cm[$c] = $postedlooks[0][0];
		 		$c++;
		 	}
 		}
 		return $look_cm;
 	}	
	function get_not_rated_look($mno,$date=null,$year=null){ 
		if (empty($date) and empty($year)) {
		#get all look
			$rated_look = get_rated_look($mno);
			$all_looks=select('postedlooks',7);				
		}
		else if( !empty($date) and !empty($year)){ 
		#get look uploaded in current month
			$rated_look = get_rated_look($mno,$date,$year);
			$days=set_month_days($date);
			$fday_month = "$year-$date-$days[day_start]";
			$all_looks=select1_wop('
				postedlooks',
				7,
				array('date_',$fday_month),
				'>'
			);	
		}
		else if(strlen($date) == 10  ) { 
		#get look by date	
			 $rated_look = get_rated_look($mno,$date);
			$all_looks=select1_wop('
				postedlooks',
				7,
				array('date_',$date),
				'>'
			);	
		}
		else{ 
		#invalid input
		}
		if (!empty($all_looks)) {
			$all_lookcm=convert_1d($all_looks,0);
			// $all_lookcm=get_look_in_cm($all_lookcm);
			$look_not_ratedcm=romove1dTF($rated_look,$all_lookcm);
			return $look_not_ratedcm;
		}else{ 
			return 0;
		}
	} 
	function romove1dTF($removeThis,$remomveFrom){
		$c=0;
		for ($i=0; $i < count($remomveFrom) ; $i++) { 
			$remove = false;
			for ($j=0; $j < count($removeThis) ; $j++) { 
				if ($remomveFrom[$i] == $removeThis[$j]  ) {
					 $remove=true;
				}
			}
			if ($remove==true) {
				$remove = false;
			}else{ 
				$remaining[$c] = $remomveFrom[$i];
				$c++;
			}
		}		
		return $remaining;
	}
	function get_look_uploaded($date=null){ 
		if (empty($date)) {
			$look=select('ratings',4,array('mno',$mno));		
		}else{ 
		  $look = select1_wop('postedlooks',7,array('date_',$date),'>');
		}
		if (!empty($look)) {
			$look=convert_1d($look,0);
			return $look;
		}else{ 
			return 0;
		}
	}
	function convert_1d($twod_Array,$index){ 
		for ($i=0; $i < count($twod_Array) ; $i++) { 
			$oned[$i]=$twod_Array[$i][$index];
		}
		return $oned;
	}
	function remove_exist1d($greater_OneD,$lesthan_OneD){
		if (count($greater_OneD)  < count($lesthan_OneD) ) {
			for ($i=0; $i < count($greater_OneD) ; $i++) { 
			    $sub[$i] = $greater_OneD[$i];
			}
			unset($greater_OneD);
			for ($i=0; $i < count($lesthan_OneD) ; $i++) { 
			    $greater_OneD[$i] = $lesthan_OneD[$i];
			}	
			unset($lesthan_OneD);	 	  
			for ($i=0; $i < count($sub) ; $i++) { 
			    $lesthan_OneD[$i] = $sub[$i];
			}		 	  
		}else{
		} 
		$c=0;
		for ($i=0; $i < count($greater_OneD) ; $i++) { 
			$remove = false;
			for ($j=0; $j < count($lesthan_OneD) ; $j++) { 
				if ($greater_OneD[$i] == $lesthan_OneD[$j]  ) {
					 $remove=true;
				}
			}
			if ($remove==true) {
				$remove = false;
			}else{ 
				$c++;
				$exist_removed[$c] = $greater_OneD[$i];
			}
		}
		return $exist_removed;
	}
	function most_discussed_look($plnos){
		if (empty($plnos)) {
			return 0;
		}
		else {  
			for ($i=0; $i < count($plnos) ; $i++) { 
				$Ttalk = count_lcomment_reply($plnos[$i]);
				$plTcomment[$i][0] = $plnos[$i];
				$plTcomment[$i][1] = $Ttalk;
			}
			return $plTcomment;
		}	
	}
	function count_lcomment_reply($plno){ 
		$replyCounter = 0;
		$comment=select(
			'posted_looks_comments',
			7,
			array('plno',$plno)
		);
		if (empty($comment)) {
			return 0;
		}
		else{ 
			
			$commentCounter = count($comment);
			for ($i=0; $i <count($comment) ; $i++) { 
				$plreply=select(
					'plc_replies',
					7,
					array('plcno',$comment[$i][0])
				);
				if (empty($plreply)) {
				}
				else{ 
					$replyCounter+=count($plreply);
				}
			}
			$commentCounter+=$replyCounter;
		}
		return $commentCounter;
	}	
	function available($info){ 
		if(empty($info)) { 
			return 'not available';
		}
		else { 
			return $info;
		}
	}
	function arrangedate($date){ 
		// $date='2013-02-07';
		$year =  substr($date,0,4);
		$month = substr($date,5,2);
		$days = substr($date,8,2);
		$formated_date = $month.'-'.$days.'-'.$year;
		return $formated_date;
	}
	function unfollowed($followed_mno){ 
		if (!empty($followed_mno)) {
			$r=delete('friends',array('mno1',$_SESSION['mno'],'mno2',$followed_mno));
		 	return $r;
		}else { 
			return 0;
		}	
	}
	function get_comment_ids($plno){ 
		// echo " plno = $plno";
		$plcm=select(
			'posted_looks_comments',
			7,
			array('plno	',$plno)
		);
		$comment_ids=convert_1d($plcm,0);
		return $comment_ids;
	}
	function delete_comment_replies_and_comment_like($cids){  
		if (!empty($cids)) {
			for ($i=0; $i <count($cids) ; $i++) { 
				// echo $cids[$i].'<br>';
				 delete('plc_replies',array('plcno',intval($cids[$i])));
				 delete('posted_looks_comments_like_dislike',array('plcno',intval($cids[$i])));
			}
		}
	}
	function get_my_look_uploaded(){ 
		$mylook_uploded=select(
			'postedlooks',
			7,
			array('mno',$_SESSION['mno'])
		);
			return convert_1d($mylook_uploded,0);
	}
	function look_is_mine($plno) {
		$mylookup=false;
		$mylook_uploded=get_my_look_uploaded();
		if (!empty($mylook_uploded)) {
			for ($i=0; $i < count($mylook_uploded) ; $i++) { 
				 if ($plno == $mylook_uploded[$i]) {
				 	$mylookup=true;
				 }
			}
		}
		return $mylookup;
	}
	function  get_full_name( $mno ){

		$r=selectV1(
			'lastname,firstname',
			'fs_members',
			array('mno'=>$mno) 
		);
		// print_r($r);
		// return 'JESUS ERWIN SUAREZ';
		$fullName =  $r[0]['firstname'].' '.$r[0]['lastname'];
		return $fullName;
	} 
	// function get_first_name(){}
 	function count_like($plcno){
 
 		$likes=select1_wop(
		 	'posted_looks_comments_like_dislike',
		 	5,
		 	array('plcno',$plcno),
		 	'='
		 );

 		echo "29";
 		// echo $likes;
 		// if (!empty($likes)) {
 		// 	return intval(count($likes));
 		// }else { 
 		// 	return 0;
 		// }
 
 	}
 	function count_dislike($plcno){
 
 		$dislikes=select1_wop(
		 	'fs_plcm_dislike', 
		 	3,
		 	array('plcno',$plcno),
		 	'='
		 );
 		if (!empty($dislikes)) {
 			return intval(count($dislikes));
 		}else { 
 			return 0;
 		}
 	}
 	function tcleaner( $str ){ 
 		$str=str_replace('\'',"\"", $str );
 		return $str;
 	}
 	function get_month_name($m){ 
 		// echo " m = $m";

 		if (!empty($m)) {
	 			 
	 		$m=intval($m);
	 		// echo " month = $m <br>";
	 		$month_name = array( 
	 			'1'=>'Jan',
	 			'2'=>'Feb',
	 			'3'=>'Mar',
	 			'4'=>'Apr',
	 			'5'=>'May',
	 			'6'=>'June',
	 			'7'=>'Jully',
	 			'8'=>'Aug',
	 			'9'=>'Sept',
	 			'10'=>'Oct',
	 			'11'=>'Nov',
	 			'12'=>'Dec'); 
	 		// echo ' month name here = > '.$month_name[$m].'<br>';
	 		return $month_name[$m];
	 	}
 	}
 	function get_time_stat($h){ 
 		// echo " <br> time $h <br>";
 		$h = intval($h);
 		if ($h > 11 )
 			$stat='PM';
 		else 
 			$stat='AM';
 		
 		return $stat;
 	}
 	function conver_time24_to12($t24){
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
 	function get_def_mem_rating_look($mrl){ 
 		if ($mrl==1) return 'Fair Styling';
 		if ($mrl==2) return 'Good Styling';
 		if ($mrl==3) return 'Very Good Styling';
 		if ($mrl==4) return 'Excellent Styling'; 
 		if ($mrl==5) return 'Extraordinary Styling';		 
 	}
 	function get_def_user_profile_percentage($ovr){ 

 		if ($ovr <= 59 ) return 'Fair Overall Styling';
 		if ($ovr >= 60 and $ovr <=69  ) return 'Good Overall Styling';
 		if ($ovr >= 70 and $ovr <=79  ) return 'Very Good Overall Styling';
 		if ($ovr >= 80 and $ovr <=89  ) return 'Excellent Overall Styling'; 
 		if ($ovr >= 90 and $ovr <=100  ) return 'Extraordinary Overall Styling';		 	
 	}
	function cleant_int($id){
		$numstr = array('0','1','2','3','4','5','6','7','8','9');
		$c=0;
		for ($i=0; $i < strlen($id) ; $i++) { 
		 	for ($j=0; $j < count($numstr); $j++) { 
			 	if ($id[$i] == $numstr[$j] ) {
			 		$c++;
			 	}else{ 
			 	}			 	
		 	}
		}  
		 if ($c==strlen($id))
		 	return true;
	}
	function get_look_owner($plno){ 
		$look_info=select(
					'postedlooks',
					2,
					array('plno',$plno)
				);
		return intval($look_info[0][1]);
	}
	function comment_repplied_name( $replied_no , $rplcno ) { 

		$mno = get_fs_plcm_reply_mno( $replied_no , $rplcno );

		return get_full_name( $mno );
	}


	function get_fs_plcm_reply_mno( $replied_no , $rplcno ) { 
		if ( $replied_no == 0) {

			 
			$r=selectV1(
				'mno',
				'posted_looks_comments',
				array('plcno'=>$rplcno) 
			); 

		}
		else {  
			// get mno from  fs_plcm_reply
			$r=selectV1(
				'mno',
				'fs_plcm_reply',
				array('plcr_no'=>$replied_no) 
			);
		}

		return $r[0]['mno'];

		}

 
 	function set_latest_look( ) { 
 		$session_latest_look = $_SESSION['latest_look']; 
 		if ( empty($session_latest_look) )  {

 			// echo " session latest look is empty";
 			// echo " get all looks";
 			// echo " get the len of all look and store to sesson";

 			$session_latest_look = get_all_look_latest();
 			$session_latest_look=insert_adds($session_latest_look,get_all_ads_id());
 			 $_SESSION['old_look_len'] = get_table_len( 'postedlooks' );
 			 
 		}   	
 		else { 
 			 

 			// echo " get new len and compare to last checked len";
 			// echo " session latest look is not empty";
 			// echo " check the total lenof";

 			$new_look_len = get_table_len( 'postedlooks' );
 			if ( $_SESSION['old_look_len'] != $new_look_len ) { 
 				$_SESSION['old_look_len'] = $new_look_len;
 				$session_latest_look = get_all_look_latest();
 				$session_latest_look=insert_adds($session_latest_look,get_all_ads_id());

 				// echo " ";
 				// echo " and len is not equal ";
 			}
 		}

 		// $len = get_table_len( 'postedlooks' );
 		// echo " look len = $len <br>";
 		$_SESSION['latest_look'] = $session_latest_look;
 		return $session_latest_look ;
 	} 
 	function get_table_len( $table_len ) { 
		$look_uploaded_Tlen = selectv1(
 			'*',
 			$table_len 
 		);
 		$len = count($look_uploaded_Tlen);
 		return $len;
 	} 
?> 