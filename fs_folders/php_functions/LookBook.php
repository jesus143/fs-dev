<?php 
/**
* this is the scrape class
*/
class lookbook extends LookBookExted
{  
	
	public $bool = FALSE;
	public $error = NULL;
	public $url = 'http://www.lookbook.nu';
	public $year = '1991';
	public $monthNumeric = 'february';
	public $monthString = 'february';
	public $day = '01';
	public $dateNumericFormat = '2010-12-24'; 
	public $dateTextFormat = 'December 12 2010'; 
	public $xpath = '';
	public $totalLook = 0; 
	public $totalFan = 0;
	public $totalHype = 0; 
	public $totalDaysPassed = 0;  
	public $recentLookPostedStatus = array();
 
	public function __construct($url)
	{ 
		$this->url = $url;
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
		$cl=curl_exec($ch); 
		@$dom = new DOMDocument();
		@$res=$dom->loadHTML($cl);   
		$xpath= new DomXPath($dom);  
		$this->xpath = $xpath;
	}  
	public function getDateJoined()
	{ 
		$dateJoinedQuery = $this->xpath->query("//*[@id='side_col']/div[5]");//get date joined
		foreach ($dateJoinedQuery as $dJQ) 
		{
			echo "<br> this is the data joined <b> $dJQ->nodeValue </b>";
			$dateJoined = explode('.' , $dJQ->nodeValue); 
			// echo "<br> date1 ".$dateJoined[0]; 
			$dateJoined    = str_replace(' ', '' , $dateJoined[0]); // replace all the white space in the string 
			$dateJoined    = str_replace('OGsince', '' , $dateJoined); // "OGsinceJanuary5,2009" replace the "OGsince" string result "January5,2009"
			// echo "<br> date2 $dateJoined "; 
			// echo "<br>".preg_replace("/[^0-9,.]/", "", $dateJoined); 
			$dayYearString = preg_replace("/[^0-9,.]/", "" , $dateJoined); // remove all the letters both upper case and lower case
			$month   		= preg_replace("/[^a-z^A-Z.]/", "" , $dateJoined); // remove all numbers 
			$month   		= str_replace("Membersince", "" , $month);
			$dayYearSArray  = explode(',' , $dayYearString); // convert string day and year to array using comma separator
			$day 		    = $dayYearSArray[0]; // pass days array at index 0 to string 
			$year 		    = $dayYearSArray[1]; // pass year to string
			break;
		}      
		$this->year  			 = $year;
		$this->day   			 = $day;
		$this->monthNumeric      = date('m', strtotime($month));   
		$this->monthString 		 = $month; 
		$this->dateTextFormat    = $month . ' ' . $day . ', ' . $year; 
		$this->dateNumericFormat = $year . '-' . date('m' , strtotime($month)) . '-' . $day;    
		$this->totalDaysPassed   = Time::getTotalDaysPassed($year . '-' . date('m' , strtotime($month)) . '-' . $day);  
	}
	public function getTotalLook()
	{ 
		$totalLookQuery  = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[2]/span[1]");//get total look uploaded
		foreach ($totalLookQuery as $tLQ) 
		{
			$tLQ->nodeValue = str_replace(',' , '' , $tLQ->nodeValue);
			echo "<br>this is the total look <b>$tLQ->nodeValue</b>"; 
			$totalLook = $tLQ->nodeValue;
			break; 
		}
		$this->totalLook = $totalLook; 
		return $totalLook;
	}
	public function getTotalFan()
	{ 
		$totalFanQuery   = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[1]/span[1]");//get total fans  
		foreach ($totalFanQuery as $tFQ) 
		{
			$tFQ->nodeValue = str_replace(',' , '' , $tFQ->nodeValue);
			echo "<br> this is the total fans of the user <b>$tFQ->nodeValue</b> "; 
			$totalFan = $tFQ->nodeValue;
			break;
		}  
		$this->totalFan = $totalFan;
		return $totalFan;
	}
	public function getTotalHype()
	{ 
		$totalHypeQuery  = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[4]/span[1]");//get total hype 
		foreach ($totalHypeQuery as $tHQ) 
		{ 
			echo " total hype $tHQ->nodeValue <br>";
			// $totalHype = $tHQ->nodeValue;
			$totalHype = preg_replace("/[^0-9]/", "" , $tHQ->nodeValue); 
			break;
		} 	
		$this->totalHype = $totalHype;
		return $totalHype;
	}   
	public function getRecentLookPostedStatus()
	{

		$dateMonthUpload = ''; 
		$totalLookUploaded = 0; 
		$resultArray = array(); 
		$nodeArray = array(); 
		$dateValues = array();
		$counter = 0;
		$counter1 = 0; 

		$recentLookPostedQuery  = $this->xpath->query("//*[@class='look_meta_container']/p[2]/meta[3]");//get total hype  
		foreach ($recentLookPostedQuery as $query) 
		{  	 	 
			// echo " <br> the latest look posted ".$query->getAttribute('content');
 			$nodeArray[$counter] = $query->getAttribute('content');
 			$counter++;
			// echo " <br> the latest look posted ".$query->nodeValue;
			// $totalHype = $tHQ->nodeValue;  
			// $totalHype = preg_replace("/[^0-9]/", "" , $q->nodeValue);   
		} 	
		// $this->totalHype = $totalHype;
		// return $totalHype;  
		echo " <br> this is the array from foreach  <pre>"; 
		// print_r($nodeArray);  

		$counter = 0; 

		if ( !empty($nodeArray)) 
		{
			$totalLookUploaded++; // set 1 because first date at $nodeArray[0] is counted as 1 so thats why it is directly $totalLookUpload++ that is the counter
			$dateMonthUpload = Time::removeDashAndDay($nodeArray[0]);  // add dateMonth in index 0 
			$dateValues[$counter1] = $nodeArray[0]; // add dateValue in index 0  
		}  
		for ($i=1; $i <= count($nodeArray) ; $i++) 
		{  
			// echo " totalLookUploaded = $totalLookUploaded if ( dateMonthUpload  $dateMonthUpload  == nodeValue " . Time::removeDashAndDay($nodeArray[$i]) . ") <br> ";

			if (empty($nodeArray[$i])) 
			{  
				 
				/************************************************************************************************************************/
		 		/* this condition will work when the nodeArray is empty and its happens when the array index or i is in the last value 
		 		/************************************************************************************************************************/																														   													 

		 	  	$resultArray[$dateMonthUpload]['dateMonthUpload'] = $dateMonthUpload; /* store the manth look uploaded ex: 2014-12 */
		 	  	$resultArray[$dateMonthUpload]['totalLookUploaded'] = $totalLookUploaded; /* store the total look uploaded in a month ex: 1 or 2 */ 
		 	  	$resultArray[$dateMonthUpload]['dateValues'] = $dateValues; /* this is the array month that is under the dateUploaded stored to array */  
		 	} 
		 	else if ($dateMonthUpload == Time::removeDashAndDay($nodeArray[$i])) 
		 	{
		 		/************************************************************************************************************************/
		 		/* if date Month Upload value is equal to node Array then the nodeArray added to the list of current month uploaded  
		 		/************************************************************************************************************************/
 
		 		$dateMonthUpload = Time::removeDashAndDay($nodeArray[$i]);   
		 		// echo " $i if $dateMonthUpload <br>";
		 		$totalLookUploaded++;
		 		$counter1++;
		 		$dateValues[$counter1] = $nodeArray[$i]; // add dateValue in index 0  
		 	} 
		 	else 
		 	{ 
	 			/************************************************************************************************************************/
		 		/* if date Month Upload value is not equal to node Array then the nodeArray to main array to display in the screen 
		 		/************************************************************************************************************************/

		 	  	$resultArray[$dateMonthUpload]['dateMonthUpload'] = $dateMonthUpload;// store the manth look uploaded ex: 2014-12 
		 	  	$resultArray[$dateMonthUpload]['totalLookUploaded'] = $totalLookUploaded; // store the total look uploaded in a month ex: 1 or 2  
		 	  	$resultArray[$dateMonthUpload]['dateValues'] = $dateValues;  // this is the array month that is under the dateUploaded stored to array  
		 	  	$totalLookUploaded = 1;// initialized the look uploaded to 1 when dateMonthUploaded not equal to new one 
				$dateMonthUpload = Time::removeDashAndDay($nodeArray[$i]);  // trim dateMonthUpload and add to use if for compare  
				unset($dateValues); // unset array where the dateValue stored 
		 	  	$counter++; // this is used to replace the date counter
		 	  	$counter1=0; // counter initialized to zero again  
		 	  	$dateValues[$counter1] = $nodeArray[$i];  // add dateValue in index 0    
		 	  	// echo " <h2> $i else </h1> ";
		 	} 
		}   
		// echo " 
		// 	<h3>this is the posted look with the user and the dates posted</h3> <br>
		// <pre>  
		// ";
		// print_r($resultArray);    
		$this->recentLookPostedStatus = $resultArray; 
		echo " 
				<h3>this is the posted look with the user and the dates posted</h3> <br>
			<pre>  
		";  
		// echo " date ".date('Y-m');
		// $yearMonth = date('Y-m');
		// print_r($this->recentLookPostedStatus[$yearMonth]);  
		echo "<br><br><br> here ";
		print_r($this->recentLookPostedStatus);  
		return $resultArray;  
	} 

} 