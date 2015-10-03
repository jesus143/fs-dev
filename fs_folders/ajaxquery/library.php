<?php 




	function most_discussed_i_have_rated($sortBy=null){

		$myrlookcm = myratedlookcm($_SESSION['mno']);
		$plno_tcomments=most_discussed_look($myrlookcm);
		$sorted_mdihr = newest_or_oldest2d($sortBy,$plno_tcomments,1);
		return $sorted_mdihr;	
	}  
	function most_discussed_i_have_not_rated($sortBy=null){

		$mynrlookcm = mynotratedlookcm($_SESSION['mno']);
		$plno_tcomments=most_discussed_look($mynrlookcm);
		$sorted_mdihr = newest_or_oldest2d($sortBy,$plno_tcomments,1);
		return $sorted_mdihr;	
	}
	function most_viewed_i_have_rated($sortBy=null){
		$myrlookcm = myratedlookcm($_SESSION['mno']);
		$plnoviews = get_plno_views($myrlookcm);
		$sorted_plnoviews = newest_or_oldest2d($sortBy,$plnoviews,1);
		return $sorted_plnoviews;	
	}
	function most_viewed_i_have_not_rated($sortBy=null){
		$myrnlookcm = mynotratedlookcm($_SESSION['mno']);
		$plnoviews = get_plno_views($myrnlookcm);
		$sorted_plnoviews = newest_or_oldest2d($sortBy,$plnoviews,1);
		return $sorted_plnoviews;
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
	 	    $toplook = calc_top_look($myrlookcm,$hrating);
	 		$sorted_trlihr = newest_or_oldest2d($sortBy,$toplook,1);
	 		return $sorted_trlihr;
		}
		else{ 
			return 0;
		}	 	
	} 
	function topratedlook_i_have_not_rated($sortBy=null){
 		$mynrlookcm = mynotratedlookcm($_SESSION['mno']);
 		if (!empty($mynrlookcm[0])) {
		    $hrating = get_max_rate($mynrlookcm);
	 	    $toplook = calc_top_look($mynrlookcm,$hrating);
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
		 	$toplook = calc_top_look($myrlookcm,$hrating);
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
		$TLpercentage = calc_perccentage_1look($look,$hrating);;
		return $TLpercentage;
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
		 	$toplook = calc_top_look($mynrlookcm,$hrating);
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
	 	$toplook=calc_top_look($plnos,$hrating);
	 	$flookTopRates=descending2d($toplook,1);
		return $flookTopRates;
	}
	function most_viewed_look($date,$sortBy=null){
		echo " date is $date";
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
		 	$info=select(
		 		'ratings',
		 		4,
		 		array('mno',$mno)
		 	);
		}
		else if( !empty($date) and !empty($year)){ 
			$days=set_month_days($date,$year);
			$fday_month = "$year-$date-$days[day_start]";
			$lday_month = "$year-$date-$days[day_end]";			
			$info=select2_wop(
				'ratings',
				4,
				array('mno',$mno,'date_',$fday_month),
				array('=','and','>')
			);
		}
		else if(strlen($date) == 10)
		{
			$info=select2_wop(
				'ratings',
				4,
				array('mno',$mno,'date_',$date),
				array('=','and','>')
			);
 		}else{ 
 			#invlid input
 		}	 	
	 	for ($i=0; $i < count($info) ; $i++) { 
	 		$look_rate[$i] = $info[$i][1];
	 	}
 		return $look_rate;
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
		for ($i=0; $i < count($plnos) ; $i++) { 
			$Ttalk = count_lcomment_reply($plnos[$i]);
			$plTcomment[$i][0] = $plnos[$i];
			$plTcomment[$i][1] = $Ttalk;
		}
		return $plTcomment;
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
?>