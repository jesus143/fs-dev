<?php
/**
* 
*/ 
 
class LookBookExted  extends LookbookDataBase 
{

	private $totalEmailAvailbeToSend = 0;
	private $totalEmailSent = 0;
	private $invitedFn = 0;
    private $timeZone;
    private $timeZoneUrl;

    public function __construct()
	{ 
		
		// echo '<br> LookBookExted start'; 
	}





	public function testExtends()
	{
	 	// echo "<br> this is lookbookExtends test";
	}


	public function getTotalHypeEachLook($totalHype , $totalLook)
	{
	 	// calculate the total hype each look  
		return intval($this->totalHypeEachLook = $totalHype / $totalLook); 
	}
	public function validateOutput()
	{
		if ($this->totalDaysPassed >= 60) {   
			$this->bool  = TRUE;
		} else { 
			$this->error .= '<br> TOTAL DAY PASSED ' . '<span style=\'color:red\' >' . $this->totalDaysPassed . '</span>';
		}    
		if ($this->totalLook >= 5) {    
			$this->bool  = TRUE;
		} else {  
			$this->error .= '<br> TOTAL LOOK ' . '<span style=\'color:red\' >' . $this->totalLook . '</span>';
		} 
		if ($this->totalFan >= 10) { 
			$this->bool  = TRUE; 
		} else {    
			$this->error .= '<br> TOTAL FAN ' . '<span style=\'color:red\' >' . $this->totalFan . '</span>'; 
		}
		if ($this->totalHype >= 10) {    
			$this->bool  = TRUE;
		} else {  
			$this->error .= '<br> TOTAL HYPE ' . '<span style=\'color:red\' >' . $this->totalHype . '</span>'; 
		} 
		if ($this->bool == TRUE && $this->error == NULL ) { 
			echo " <h4 style='color:green' > this user passed the requirement of FS </h4><br>";	 
		} else { 
			echo " <h4  > this user <span style='color:red' > do not passed </span> the requirement of FS  $this->error </h4> <br>"; 
		} 
 
		return $this->error;  
	}
	public function getEmailExtraDomain()
	{
		/**
		* required: getEmail() 
		*/
	 	return $this->userDomainInfo;
	}
	public function getTotalPostedLookInTwoMonths($recentPostedLooksInTheMonthsArray)
	{ 
		/**
		* need to run this function first recentPostedLooksInTheMonthsArray() before this function getTotalPostedLookInTwoMonths()
		* because data is from recentPostedLooksInTheMonthsArray() function.
		**/    
		/*
			$yearMonthCurrent = date('Y-m'); 
			$monthCurrent = date('m');
			$yearCurrent = date('Y'); 
			$monthCurrent = intval($monthCurrent) - 1; 
			$yearMonthPrevious = $yearCurrent . '-' . $monthCurrent;  
			echo " Current Month Uploaded look <br>"; 
			print_r($recentPostedLooksInTheMonthsArray[$yearMonthCurrent]);  
			echo " Previous Month Uploaded look <br>"; 
			print_r($recentPostedLooksInTheMonthsArray[$yearMonthPrevious]);   
			echo "<br><br><br> here ";  
			// 
		*/   
		// echo "<pre>";
		// print_r($recentPostedLooksInTheMonthsArray);     
		return intval($recentPostedLooksInTheMonthsArray[0]['totalLookUploaded']) + intval($recentPostedLooksInTheMonthsArray[1]['totalLookUploaded']);
	}  
	public function getRecentMonthUserUploadLook()
	{
		/* data added and initialized from function getRecentPostedLooksInTheMonthsArray() */
	 	return $this->lastMonthUploadLook;
	} 
	public function getTotalDaysPassedAfterDateJoined()
	{ 
		/**
		* the function is initialized from setDateJoined() 
		*/
		return $this->totalDaysPassed;
	}



	public function setDateJoined()
	{ 

			
		$dateJoined = array(); 
		$dateJoined1 = '';

		// $dateJoinedQuery = $this->xpath->query("//*[@id='side_col']/div[5]");//get date joined
		$dateJoinedQuery = $this->xpath->query("//*[@class='ultra_spaced linespaced grey']");//get date joined

		
		 	echo "<br> get data ";
			foreach ($dateJoinedQuery as $dJQ) 
			{ 
				echo "<br> this is the data joined <b> $dJQ->nodeValue </b>";
				$dateJoined1 = $dJQ->nodeValue;  


				
				break;			 	 
			}      
			echo "<br> dateJoined1 =  $dateJoined1";
			if ($dateJoined1 != NULL) 
			{
 
				$dateJoined = explode('.' , $dateJoined1); 
				// echo "<br> date1 ".$dateJoined[0]; 
				$dateJoined    = str_replace(' ', '' , $dateJoined[0]); // replace all the white space in the string 
				$dateJoined    = str_replace('OGsince', '' , $dateJoined); // "OGsinceJanuary5,2009" replace the "OGsince" string result "January5,2009"
				// echo "<br> date2 $dateJoined "; 
				// echo "<br>".preg_replace("/[^0-9,.]/", "", $dateJoined); 
				$dayYearString  = preg_replace("/[^0-9,.]/", "" , $dateJoined); // remove all the letters both upper case and lower case
				$month   		= preg_replace("/[^a-z^A-Z.]/", "" , $dateJoined); // remove all numbers 
				$month   		= str_replace("Membersince", "" , $month);
				$dayYearSArray  = explode(',' , $dayYearString); // convert string day and year to array using comma separator
				$day 		    = $dayYearSArray[0]; // pass days array at index 0 to string 
				$year 		    = $dayYearSArray[1]; // pass year to string



				$this->year  			 = $year;
				$this->day   			 = $day;
				$this->monthNumeric      = date('m', strtotime($month));   
				$this->monthString 		 = $month; 
				$this->dateTextFormat    = $month . ' ' . $day . ', ' . $year; 
				$this->dateNumericFormat = $year . '-' . date('m' , strtotime($month)) . '-' . $day;    
				$this->totalDaysPassed   = Time::getTotalDaysPassed($year . '-' . date('m' , strtotime($month)) . '-' . $day);  
				$this->totalMonthPassed  = intval(intval(Time::getTotalDaysPassed($year . '-' . date('m' , strtotime($month)) . '-' . $day))/30);
				return TRUE;
			}
			else
			{
				echo "<br> date is empty";
				return FALSE;
			}
		
	}   
	public function getTotalMonthsPassedAfterDateJoined()
	{ 
		/**
		* the function return value is from setDateJoined()
		*/
		return $this->totalMonthPassed;
	}  



	public function setTimeZone($location)
	{
		$url='';
  		$timezone='';
  		$location = preg_replace("/[^A-Z^a-z]/", "", $location); // remove white spaces
		switch ($location) 
		{ 
		    case 'NEWYORK': 
		     	$url='http://www.timeanddate.com/worldclock/usa/new-york';
		        $timezone='EST'; 
		    break;
		    case 'LONDON':  
		      	$url='http://www.timeanddate.com/worldclock/uk/london';
		      	$timezone='GMT';
		    break;
		    case 'CALIFORNIA':  
			 	$url='http://www.timeanddate.com/worldclock/usa/los-angeles';
			 	$timezone='PST';
		  	break;
		    case 'MANILA':  
		        $url='http://www.timeanddate.com/worldclock/philippines/manila';
		        $timezone='PHT';
		   	break;
		    case 'LOSANGELES': 
		        $url='http://www.timeanddate.com/worldclock/usa/los-angeles';
		        $timezone='PST';
		    break;
		    case 'SOPAULO': 
		        $url='http://www.timeanddate.com/worldclock/brazil/sao-paulo';
		        $timezone='BRST';
		    break;
		    case 'BANGKOK':
		        $timezone='ICT';
		        $url='http://www.timeanddate.com/worldclock/thailand/bangkok';
		  	break;
		    case 'TAIPEI':
		        $timezone='CST';
		        $url='http://www.timeanddate.com/worldclock/taiwan/taipei';
		    break;
		    case 'PARIS':
		        $url='http://www.timeanddate.com/worldclock/france/paris';
		        $timezone='CET';
		    break;
		    case 'TORONTO':
		        $url='http://www.timeanddate.com/worldclock/canada/toronto';
		        $timezone='EST';
		      break;
		    case 'SINGAPORE':
		        $url='http://www.timeanddate.com/worldclock/singapore/singapore';
		        $timezone='SGT';
		    break;
		    case 'RIODEJANEIRO':
		        $url='http://www.timeanddate.com/worldclock/brazil/rio-de-janeiro';
		        $timezone='BRST';
		    break;
		    case 'JAKARTA':
		        $url='https://www.timeanddate.com/worldclock/indonesia/jakarta';
		        $timezone='WIB';
		    break;
		    case 'FLORIDA':
		        $url='https://www.timeanddate.com/worldclock/usa/miami';
		        $timezone='EST';
		    break;
		    case 'SYDNEY':
		        $url='http://www.timeanddate.com/worldclock/australia/sydney';
		        $timezone='AEDT';
		    break;
		    case 'TEXAS':
		        $url='http://www.timeanddate.com/worldclock/usa/houston';
		        $timezone='CST';
		    break;
		    case 'MELBOURNE':
		        $url='http://www.timeanddate.com/worldclock/australia/melbourne';
		        $timezone='EDT';
		    break;
		    case 'MOSCOW':
		        $url='http://www.timeanddate.com/worldclock/russia/moscow';
		        $timezone='MSK';
		    break;
		    case 'HONGKONG':
		        $url='http://www.timeanddate.com/worldclock/hong-kong/hong-kong';
		        $timezone='HKT';
		    break;
		    case 'SANFRANCISCO':
		        $url='https://www.timeanddate.com/worldclock/usa/san-francisco';
		        $timezone='PST';
		    break;
		    case 'MEXICOCITY':
		        $url='http://www.timeanddate.com/worldclock/mexico/mexico-city';
		        $timezone='CST';
		    break;
		    case 'VANCOUVER':
		        $url='http://www.timeanddate.com/worldclock/canada/vancouver';
		        $timezone='PST';
		    break;
		    case 'HANOI':
		        $url='http://www.timeanddate.com/worldclock/vietnam/hanoi';
		        $timezone='ICT';
		    break;
		    case 'MONTREAL':
		        $url='http://www.timeanddate.com/worldclock/canada/montreal';
		        $timezone='EST';
		    break;
		    case 'SEOUL':
		        $url='http://www.timeanddate.com/worldclock/south-korea/seoul';
		        $timezone='KST';
		    break;
		    case 'LIMA':
		        $url='http://www.timeanddate.com/worldclock/peru/lima';
		        $timezone='PET';
		    break;
		    case 'BERLIN':
		        $url='http://www.timeanddate.com/worldclock/germany/berlin';
		        $timezone='CET';
		    break;
		    case 'ISTANBUL':
		        $url='http://www.timeanddate.com/worldclock/turkey/istanbul';
		        $timezone='EET';
		    break;
		    case 'WASHINGTONDC':
		        $url='https://www.timeanddate.com/worldclock/usa/seattle';
		        $timezone='PST';
		    break;
		    case 'CHICAGO':
		        $url='http://www.timeanddate.com/worldclock/usa/chicago';
		        $timezone='CST';
		    break;
		    case 'AMSTERDAM':
		        $url='http://www.timeanddate.com/worldclock/netherlands/amsterdam';
		        $timezone='CET';
		    break;
		    case 'WARSAW':
		        $url='http://www.timeanddate.com/worldclock/poland/warsaw';
		        $timezone='CET';
		    break;
		    case 'BUENOSAIRES':
		        $url='http://www.timeanddate.com/worldclock/argentina/buenos-aires';
		        $timezone='ART';
		    break;
		    case 'NEWJERSEY':
		        $url='http://www.timeanddate.com/worldclock/usa/newark';
		        $timezone='EST';
		    break;
		    case 'ATLANTA':
		        $url='http://www.timeanddate.com/worldclock/usa/atlanta';
		        $timezone='EST';
		    break;
		    case 'MADRID':
		        $url='http://www.timeanddate.com/worldclock/spain/madrid';
		        $timezone='CET';
		    break;
		    case 'BUCHAREST':
		        $url='http://www.timeanddate.com/worldclock/romania/bucharest';
		        $timezone='EET';
		    break;
		    case 'ILLINOIS':
		        $url='http://www.timeanddate.com/worldclock/usa/chicago';
		        $timezone='CST';
		    break;
		    case 'BOGOT':
		        $url='http://www.timeanddate.com/worldclock/colombia/bogota';
		        $timezone='COT';
		    break;
		    case 'STOCKHOLM':
		        $url='http://www.timeanddate.com/worldclock/sweden/stockholm';
		        $timezone='CET';
		    break;
		    case 'TOKYO':
		        $url='http://www.timeanddate.com/worldclock/japan/tokyo';
		        $timezone='JST';
		    break;
		    case 'SANTIAGO':
		        $url='http://www.timeanddate.com/worldclock/chile/santiago';
		        $timezone='CLST';
		    break;
		    case 'VIRGINIA':
		        $url='http://www.timeanddate.com/worldclock/usa/richmond';
		        $timezone='EST';
		    break;
		    case 'BEIJING':
		        $url='http://www.timeanddate.com/worldclock/china/beijing';
		        $timezone='CST';
		    break;
		    case 'GEORGIA':
		        $url='http://www.timeanddate.com/worldclock/usa/atlanta';
		        $timezone='EST';
		    break;
		    case 'PHILADELPHIA':
		        $url='http://www.timeanddate.com/worldclock/usa/philadelphia';
		        $timezone='EST';
		    break;
		    case 'SHANGHAI':
		        $url='https://www.timeanddate.com/worldclock/china/shanghai';
		        $timezone='CST';
		    break;
		    case 'BOSTON':
		        $url='https://www.timeanddate.com/worldclock/usa/boston';
		        $timezone='EST';
		    break;
		    case 'MICHIGAN':
		        $url='http://www.timeanddate.com/worldclock/usa/detroit';
		        $timezone='EST';
		    break;
		    case 'MILAN':
		        $url='https://www.timeanddate.com/worldclock/italy/milan';
		        $timezone='CET';
		    break;
		    case 'HOUSTON':
		        $url='http://www.timeanddate.com/worldclock/usa/houston';
		        $timezone='CST';
		    break;
		    case 'OHIO':
		        $url='http://www.timeanddate.com/worldclock/usa/cleveland';
		        $timezone='EST';
		    break;
		    case 'SEATTLE':
		        $url='https://www.timeanddate.com/worldclock/usa/seattle';
		        $timezone='PST';
		    break;
		    case 'NORTHCAROLINA':
		        $url='http://www.timeanddate.com/worldclock/usa/raleigh';
		        $timezone='EST';
		    break;
		    case 'SANDIEGO':
		        $url='https://www.timeanddate.com/worldclock/usa/san-diego';
		        $timezone='PST';
		    break;
		    case 'KRAKOW':
		        $url='http://www.timeanddate.com/worldclock/poland/krakow';
		        $timezone='CET';
		    break;
		    case 'MASSACHUSETTS':
		        $url='http://www.timeanddate.com/worldclock/usa/boston';
		        $timezone='EST';
		    break;
		    case 'MUNICH':
		        $url='https://www.timeanddate.com/worldclock/germany/munich';
		        $timezone='CET';
		    break;
		    case 'PRAGUE':
		        $url='http://www.timeanddate.com/worldclock/czech-republic/prague';
		        $timezone='CET';
		    break;
		    case 'PENNSYLVANIA':
		        $url='http://www.timeanddate.com/worldclock/usa/pittsburgh';
		        $timezone='EST';
		    break;
		    case 'ATHENS':
		        $url='http://www.timeanddate.com/worldclock/greece/athens';
		        $timezone='EET';
		    break;
		    case 'BRISBANE':
		        $url='http://www.timeanddate.com/worldclock/australia/brisbane';
		        $timezone='AEST';
		    break;
		    case 'MARYLAND':
		        $url='http://www.timeanddate.com/worldclock/usa/baltimore';
		        $timezone='EST';
		    break;
		    case 'ARIZONA':
		        $url='http://www.timeanddate.com/worldclock/usa/phoenix';
		        $timezone='MST';
		    break;
		    case 'LAS VEGAS':
		        $url='http://www.timeanddate.com/worldclock/usa/las-vegas';
		        $timezone='PST';
		    break;
		    case 'SALVADOR':
		        $url='http://www.timeanddate.com/worldclock/brazil/salvador';
		        $timezone='BRT';
		    break;
		    case 'DALLAS':
		        $url='http://www.timeanddate.com/worldclock/usa/dallas';
		        $timezone='CST';
		    break;
		    case 'PORTLAND':
		        $url='https://www.timeanddate.com/worldclock/usa/portland-or';
		        $timezone='PST';
		    break;
		    case 'AUSTIN':
		        $url='http://www.timeanddate.com/worldclock/usa/austin';
		        $timezone='CST';
		    break;
		    case 'DELHI':
		        $url='http://www.timeanddate.com/worldclock/india/new-delhi';
		        $timezone='IST';
		    break;
		    case 'MINNESOTA':
		        $url='https://www.timeanddate.com/worldclock/usa/minneapolis';
		        $timezone='CST';
		    break;
		    case 'SAINTPETERSBURG':
		        $url='https://www.timeanddate.com/worldclock/russia/saint-peterburg';
		        $timezone='MSK';
		    break;
		    case 'BROOKLYN':
		        $url='https://www.timeanddate.com/time/zone/usa/new-york';
		        $timezone='EST';
		    break;
		    case 'DUBAI':
		        $url='http://www.timeanddate.com/worldclock/united-arab-emirates/dubai';
		        $timezone='GST';
		    break;
		    case 'COLORADO':
		        $url='http://www.timeanddate.com/worldclock/usa/denver';
		        $timezone='MST';
		    break;
		    case 'COPENHAGEN':
		        $url='http://www.timeanddate.com/worldclock/denmark/copenhagen';
		        $timezone='CET';
		    break;
		    case 'TENNESSEE':
		        $url='https://www.timeanddate.com/worldclock/usa/nashville';
		        $timezone='CST';
		    break;
		    case 'WISCONSIN':
		        $url='https://www.timeanddate.com/worldclock/usa/milwaukee';
		        $timezone='CST';
		    break;
		    case 'BRUSSELS':
		        $url='http://www.timeanddate.com/worldclock/belgium/brussels';
		        $timezone='CET';
		    break;
		    case 'ALABAMA':
		        $url='https://www.timeanddate.com/worldclock/usa/montgomery';
		        $timezone='CST';
		    break;
		    case 'FRANKFURT':
		        $url='http://www.timeanddate.com/worldclock/germany/frankfurt';
		        $timezone='CET';
		    break;
		    case 'JOHANNESBURG':
		        $url='http://www.timeanddate.com/worldclock/south-africa/johannesburg';
		        $timezone='SAST';
		    break;
		    case 'INDIANA':
		        $url='http://www.timeanddate.com/worldclock/usa/indianapolis';
		        $timezone='EST';
		    break;
		    case 'MISSOURI':
		        $url='http://www.timeanddate.com/worldclock/usa/st-louis';
		        $timezone='CST';
		    break;
		    case 'OREGON':
		        $url='https://www.timeanddate.com/worldclock/usa/portland-or';
		        $timezone='PST';
		    break;
		    case 'CONNECTICUT':
		        $url='http://www.timeanddate.com/worldclock/usa/hartford';
		        $timezone='EST';
		    break; 
		    case 'ORANGECOUNTY':
		        $url='https://www.timeanddate.com/worldclock/usa/orange';
		        $timezone='PST';
		    break;
		    case 'BALTIMORE':
		        $url='http://www.timeanddate.com/worldclock/usa/baltimore';
		        $timezone='EST';
		    break;
		    case 'WASHINGTON, D.C.':
		        $url='http://www.timeanddate.com/worldclock/usa/washington-dc';
		        $timezone='EST';
		    break;
		    case 'CAIRO':
		        $url='http://www.timeanddate.com/worldclock/egypt/cairo';
		        $timezone='EET';
		    break;
		    case 'HAWAII':
		        $url='http://www.timeanddate.com/worldclock/usa/honolulu';
		        $timezone='HAST';
		    break;
		    case 'SAN JOSE':
		        $url='http://www.timeanddate.com/worldclock/usa/san-jose';
		        $timezone='PST';
		    break;
		    case 'UTAH':
		        $url='http://www.timeanddate.com/worldclock/usa/salt-lake-city';
		        $timezone='MST';
		    break;
		    case 'LOUISIANA':
		        $url='http://www.timeanddate.com/worldclock/usa/new-orleans';
		        $timezone='CST';
		    break;
		    case 'KANSAS':
		        $url='https://www.timeanddate.com/worldclock/usa/wichita';
		        $timezone='CST';
		    break;
		    case 'OKLAHOMA':
		        $url='https://www.timeanddate.com/worldclock/usa/oklahoma-city';
		        $timezone='CST';
		    break;
		    case 'ANTWERP':
		        $url='http://www.timeanddate.com/worldclock/belgium/antwerp';
		        $timezone='CET';
		    break;
		    case 'SOUTHCAROLINA':
		        $url='https://www.timeanddate.com/worldclock/usa/columbia';
		        $timezone='EST';
		    break;
		    case 'GUANGZHOU':
		        $url='http://www.timeanddate.com/worldclock/china/guangzhou';
		        $timezone='CST';
		    break;
		    case 'CARACAS':
		        $url='http://www.timeanddate.com/worldclock/venezuela/caracas';
		        $timezone='VET';
		    break;
		    default:
			    $url='http://www.timeanddate.com/worldclock/usa/new-york';
		        $timezone='EST'; 
			break;    
		}      

		$this->timeZone = $timezone;  
		$this->timeZoneUrl = $url;    

		return $timezone;  

	}
	public function getTimeZone() 
	{  
		/**
		* initialized from setTimeZone($location)
		*/ 
		return $this->timeZone; 
	}
	public function getTimeZoneUrl() 
	{  
		/**
		* initialized from getTimeZone($location)
		*/ 
		return $this->timeZoneUrl; 
	}

 









	public function getUsernames()
	{ 
		/**
		* required: setUsernamesAndDescription($url)
		*/
		return $this->usernames;
	} 
	public function getDescriptions()
	{
		/**
		* required: setUsernamesAndDescription($url)
		*/
		 return $this->descriptions; 
	} 
	public function setSpecificDescription($index)
	{

		$this->description = $this->descriptions[$index];
	}
	public function getSpecificDescription()
	{ 

		return $this->description;
	} 
	public function setSpecificUsername($index)
	{

		$this->username = $this->usernames[$index];
	} 
	public function getSpecificUsername()
	{ 

		return $this->username;
	}


 

	public function setUserProfileUrl($username)
	{ 
		$lookBookDomain = 'http://lookbook.nu';
		$profileTabComment = 'comments';
		$profileTabLook = 'looks'; 
		$profileLookTabHyped = 'looks/hyped';

		$this->profileUrlLookTab = $lookBookDomain .''. $username . '/' .$profileTabLook; 
		$this->profileUrlLookTabHyped = $lookBookDomain .''. $username . '/' . $profileLookTabHyped; 
		$this->profileUrlCommentTab = $lookBookDomain .''. $username . '/' . $profileTabComment;  
	} 
	public function getUserProfileUrlLookTab()
	{
		/**
		* required: setUserProfileUrl($lookBookDomain = 'http://lookbook.nu' , $username , $profileTab)
		*/
		return $this->profileUrlLookTab;	
	}
	public function getUserProfileUrlLookTabHyped()
	{
		/**
		* required: setUserProfileUrl($lookBookDomain = 'http://lookbook.nu' , $username , $profileTab)
		*/
		return $this->profileUrlLookTabHyped ;	
	} 
	public function getUserProfileUrlCommentTab()
	{
		/**
		* required: setUserProfileUrl($lookBookDomain = 'http://lookbook.nu' , $username , $profileTab)
		*/
		return $this->profileUrlCommentTab;	
	}   
  
	public function isExistDomainThenNoAddToList($search , $subject)
	{ 

		// echo "  isExistDomainThenNoAddToList($search , $subject) len ".strpos($subject, $search);
		if (empty($subject)) 
		{
			return $search;
		}
		elseif (strpos($subject, $search) >= 0)  
		{  
			return NULL; 
		}
		else
		{
			return $search; 
		}
	}
	public function isUserWithEmailOrBlog()
	{
		// set for email and domain info is required before this function 
		if(($this->getEmail() != NULL) || ($this->getUserDomainInfo() != NULL)) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		} 
	}

	public function setPreviousMonth($date , $totalPreviousMonth=2)
	{

		$year  = '';
		$month = '';
		$day   = ''; 

		$date  = explode('-', $date);

 

	    $year  = $date[0];
	    $month = $date[1];
	    $day   = $date[2];
 

	    $month = intval($month) - intval($totalPreviousMonth);

	    if ($month <= 0) 
	    {
	    	$month = 12; 
	    	$month -= $totalPreviousMonth;
	     	$year--; 
	    } 



	    $this->previousDate = $year . '-' . $month . '-' . $day;  
	}
	public function getPreviousMonth()
	{
		
		return $this->previousDate;	 
	}

	public function getRecentPostedLooksInTheMonthsArray()
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
		// echo " <br> this is the array from foreach  <pre>"; 
		// print_r($nodeArray);  

		$counter = 0; 

		if ( !empty($nodeArray)) 
		{
			$totalLookUploaded++; // set 1 because first date at $nodeArray[0] is counted as 1 so thats why it is directly $totalLookUpload++ that is the counter
			$dateMonthUpload = Time::removeDashAndDay($nodeArray[0]);  // add dateMonth in index 0 
			$dateValues[$counter1] = $nodeArray[0]; // add dateValue in index 0  
		}  
		for ($i=1; $i <= count($nodeArray) ; $i++) {  
			// echo " totalLookUploaded = $totalLookUploaded if ( dateMonthUpload  $dateMonthUpload  == nodeValue " . Time::removeDashAndDay($nodeArray[$i]) . ") <br> ";

			if (empty($nodeArray[$i])) 
			{  
				 
				/************************************************************************************************************************/
		 		/* this condition will work when the nodeArray is empty and its happens when the array index or i is in the last value 
		 		/************************************************************************************************************************/																														   													 
		 		//numiric index
		 	  	$resultArray[$counter]['dateMonthUpload'] = $dateMonthUpload; /* store the manth look uploaded ex: 2014-12 */
		 	  	$resultArray[$counter]['totalLookUploaded'] = $totalLookUploaded; /* store the total look uploaded in a month ex: 1 or 2 */ 
		 	  	$resultArray[$counter]['dateValues'] = $dateValues; /* this is the array month that is under the dateUploaded stored to array */  
		 	  	//month index
		 	  	$resultArray[$dateMonthUpload]['dateMonthUpload'] = $dateMonthUpload; /* store the manth look uploaded ex: 2014-12 */
		 	  	$resultArray[$dateMonthUpload]['totalLookUploaded'] = $totalLookUploaded; /* store the total look uploaded in a month ex: 1 or 2 */ 
		 	  	$resultArray[$dateMonthUpload]['dateValues'] = $dateValues; /* this is the array month that is under the dateUploaded stored to array */  

		 	} 
		 	elseif ($dateMonthUpload == Time::removeDashAndDay($nodeArray[$i])) 
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
		 		//numiric index
		 	  	$resultArray[$counter]['dateMonthUpload'] = $dateMonthUpload;// store the manth look uploaded ex: 2014-12 
		 	  	$resultArray[$counter]['totalLookUploaded'] = $totalLookUploaded; // store the total look uploaded in a month ex: 1 or 2  
		 	  	$resultArray[$counter]['dateValues'] = $dateValues;  // this is the array month that is under the dateUploaded stored to array  
		 	  	//month index
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
		// $this->recentLookPostedStatus = 

		$this->lastMonthUploadLook = $resultArray[0]['dateMonthUpload'];  
		return $resultArray;  
	}   
	public function setPostedLookInTwoMonthsTotal($previousMonth)
	{

		$counter = 0; 
		$array   = array(); 

		$allMonthsPostedLooks  = $this->xpath->query("//*[@class='look_meta_container']/p[2]/meta[3]");//get total hype  
		foreach ($allMonthsPostedLooks as $aMPL) 
		{  	  
			// echo "<br> if (" .$aMPL->getAttribute('content'). " >= $previousMonth)  ";
			if ($aMPL->getAttribute('content') >= $previousMonth) 
			{
				// echo "<br> if ";
				$array[$counter] = $aMPL->getAttribute('content');
 				$counter++;	  
			} 
			else
			{
				// echo "<br> else ";
			}
		} 	 
		$this->postedLooksInTwoMonths['total'] = $counter;
		$this->postedLooksInTwoMonths['dates'] = $array; 
	}
	public function getPostedLookInTwoMonthsTotal()
	{
		
		return $this->postedLooksInTwoMonths['total']; 
	}
	public function getPostedLookInTwoMonthsDate()
	{

		return $this->postedLooksInTwoMonths['dates'];  
	}
	

	public function setPostedHypedInTwoMonthsTotal($previousMonth)
	{

		$counter = 0; 
		$array   = array();

		$allMonthsPostedHyped  = $this->xpath->query("//*[@class='look_meta_container']/p[2]/meta[3]");//get total hype  
		foreach ($allMonthsPostedHyped as $aMPLH) 
		{  	 	   
			
			// echo "<br> if (" .$aMPLH->getAttribute('content'). " >= $previousMonth)  ";
			if ($aMPLH->getAttribute('content') >= $previousMonth) 
			{
				// echo "<br> if ";
				$array[$counter] = $aMPLH->getAttribute('content');
 				$counter++;	  
			} 
			else
			{
				// echo "<br> else ";
			}
		} 	 
		$this->postedHypedInTwoMonths['total'] = $counter;
		$this->postedHypedInTwoMonths['dates'] = $array; 
	}
	public function getPostedHypedInTwoMonthsTotal()
	{
		
		return $this->postedHypedInTwoMonths['total']; 
	}
	public function getPostedHypedInTwoMonthsDate()
	{

		return $this->postedHypedInTwoMonths['dates'];  
	}


	public function setPostedCommentMadeInTwoMonthsTotal($previousMonth)
	{

		$counter = 0; 
		$array   = array();
		//*[@id="comment_45769893"]/table/tbody/tr/td[2]/div[3]
		$allMonthsPostedCommentMade  = $this->xpath->query("//*[@class='topspaced grey standard']/time");//get total hype  
		foreach ($allMonthsPostedCommentMade as $aMPCNM) 
		{  	 	   
			
			// echo "<br> if (" .Time::removeLookBookTime($aMPCNM->getAttribute('datetime')). " >= $previousMonth)  ";
			if (Time::removeLookBookTime($aMPCNM->getAttribute('datetime')) >= $previousMonth) 
			{
				// echo "<br> if ";
				$array[$counter] = Time::removeLookBookTime($aMPCNM->getAttribute('datetime'));
 				$counter++;	  
			} 
			else
			{
				// echo "<br> else ";
			}
		} 	 
		$this->postedCommentMadeInTwoMonths['total'] = $counter;
		$this->postedCommentMadeInTwoMonths['dates'] = $array; 
	}
	public function getPostedCommentMadeInTwoMonthsTotal()
	{
		
		return $this->postedCommentMadeInTwoMonths['total']; 
	}
	public function getPostedCommentMadeInTwoMonthsDate()
	{

		return $this->postedCommentMadeInTwoMonths['dates'];  
	}

	public function initPhpCurl($url)
	{  
		// echo "<hr> <h3> initialized: initPhpCurl($url) </h3>";
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
		$cl=curl_exec($ch); 
		@$dom = new DOMDocument();
		@$this->res=$dom->loadHTML($cl);   
		$xpath= new DomXPath($dom);  
		$this->xpath = $xpath;
	}



	public function setTotalLook()
	{
		$totalLookQuery  = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[2]/span[1]");//get total look uploaded
		foreach ($totalLookQuery as $tLQ) {
			$tLQ->nodeValue = str_replace(',' , '' , $tLQ->nodeValue);
			echo "<br>this is the total look <b>$tLQ->nodeValue</b>"; 
			$totalLook = $tLQ->nodeValue;
			break; 
		}
		$this->totalLook = $totalLook; 
		return $totalLook;
	}
	public function getTotalLook()
	{ 

		return $this->totalLook; 
	} 

	public function getTotalLookEachMonth($totalLook , $totalMonthPassed)
	{
		// echo " total look each month " . intval($totalLook / $totalMonthPassed);
	 	return intval($totalLook / $totalMonthPassed);
	}
	public function getTotalFan()
	{ 
		$totalFanQuery   = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[1]/span[1]");//get total fans  
		foreach ($totalFanQuery as $tFQ) 
		{
			$tFQ->nodeValue = str_replace(',' , '' , $tFQ->nodeValue);
			// echo "<br> this is the total fans of the user <b>$tFQ->nodeValue</b> "; 
			$totalFan = $tFQ->nodeValue;
			break;
		}  
		$this->totalFan = $totalFan;
		return $totalFan;
	}
	public function getTotalFanEachMonth($totalFan , $totalMonthPassed)
	{ 

	 	return intval($totalFan / $totalMonthPassed);
	}  

	public function setTotalKarma()
	{ 
		$totalKarmaQuery  = $this->xpath->query("//*[@id='side_col']/div[2]/ul/li[4]/span[1]");//get total hype 
		foreach ($totalKarmaQuery as $tK) { 
			// echo " total hype $tK->nodeValue <br>";
			// $totalKarma = $tK->nodeValue;
			$totalKarma = preg_replace("/[^0-9]/", "" , $tK->nodeValue); 
			break;
		} 	
		$this->totalKarma = $totalKarma;
		return $totalKarma;
	}   
	public function getTotalKarma()
	{ 

		return $this->totalKarma;
	}    
	public function getTotalKarmaEachMonth($totalKarma , $totalMonthPassed)
	{
		
	 	return intval($totalKarma / $totalMonthPassed);
	}

	public function setTotalHyped()
	{ 
		/**
		* get the total hyped of the user under the look tab in the profile
		**/
		$totalHypedQuery  = $this->xpath->query("//*[@id='looks_subtab']/a[2]");//get total hype 
		foreach ($totalHypedQuery as $tHQ) { 
			// echo " total hype $tHQ->nodeValue <br>";
			// $totalHype = $tHQ->nodeValue;
			$totalHyped = preg_replace("/[^0-9]/", "" , $tHQ->nodeValue); 
			break;
		} 	
		$this->totalHyped = $totalHyped;
		return $totalHyped; 
	}
	public function getTotalHyped()
	{  

		return $this->totalHyped; 
	}
	public function getTotalHypedEachMonth($totalHyped , $totalMonthPassed)
	{
		
	 	return intval($totalHyped / $totalMonthPassed);
	}  

	public function setFullName()
	{   
		$fullName = $this->xpath->query("//*[@id='userheader']/div/div[1]/h1/a");
		foreach ($fullName as $fn) 
		{   
			$this->fullName = String::removeLeadingAndTrailingSpaces($fn->nodeValue);  
			return  $this->fullName;
		} 
	} 
	public function getFullName()
	{
		
		return $this->fullName;
	} 

	public function setEmail()
	{ 
		/**
		* email can also retrieved a domain because email container in lookbook 
		* has domain of the user placed also so the userDomainInfo contain some 
		* of domain from the lookbook user
		**/ 

		$this->userDomainInfo = '';
		$email = '';
		$userabout1   = $this->xpath->query("//*[@id='userabout']/a");  

		//1st position of the email query
		foreach ($userabout1 as $ua)
		{ 
			// echo ' <br> this is the email found ' . $ua->nodeValue . '';   
			if (strpos($ua->nodeValue, '@') > 0 )
			{
				// echo '<br>This node is email ' . $ua->nodeValue . '';
				$email = $ua->nodeValue;
			}
			elseif ($ua->nodeValue !== NULL and stripos($ua->nodeValue, '.com') > 0) 
			{
				$this->userDomainInfo .= $ua->getAttribute('href') . ','; //$this->isExistDomainThenNoAddToList($ua->nodeValue . ',' , $this->userDomainInfo);   
			} 
		} 

 		//2nd position of the email query
		if ($email === NULL) {
			$userabout2   = $this->xpath->query("//*[@id='userabout']/b/a"); 
			foreach ($userabout2 as $ua)
			{ 
				// echo ' <br> this is the email found ' . $ua->nodeValue . '';   
				if (strpos($ua->nodeValue, '@') > 0 )
				{
					// echo '<br>This node is email ' . $ua->nodeValue . '';
					$email = $ua->nodeValue;
				} 
			}  
		}  

		// echo "<br><br><Br>";
		// echo "<br> thid is the domains: $this->userDomainInfo ";
		// echo "<br> thid is the domains: $this->email ";    

		return $this->email = String::removeLeadingAndTrailingSpaces($email);
	} 
	public function getEmail()
	{ 

		return $this->email;
	}

	public function setSourceUrlLocation($location , $page)
	{  

	   $this->setSourceUrlLocation = 'http://lookbook.nu/search/users?locations%5B%5D=' .str_replace(' ', '-' , $location). '&page=' .$page. '&r=1';  
	   $this->sourcePage = $page; 
	}  
	public function getSourcePage()
	{ 

		return $this->sourcePage;
	}	 
	public function getSourceUrlLocation() 
	{  
		/**
		* required: setSourceUrlLocation($location , $page)
		**/
	  	return $this->setSourceUrlLocation;
	}

	public function setUsernamesAndDescription($url)
	{ 

		echo " url $url";
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
		$cl=curl_exec($ch); 
		@$dom = new DOMDocument();
		@$res=$dom->loadHTML($cl);   
		$xpath= new DomXPath($dom);    

		$usernames = $xpath->query("//*[@data-label='search - users']/a");  
     	$descriptions = $xpath->query("//*[@class='grey less_linespaced least_topspaced force_wrap']");  

      	$c = 0; 
		foreach ($descriptions as $d) { 
			$description[$c] = $d->nodeValue; 
		 	$c++;
	 	} 
	 	$c = 0;   
		foreach($usernames as $u) 
		{    
		    $username1 = $u->getAttribute("href"); 
		    $username[$c] = str_replace('/fan','',$username1);  
		    $c++;   
		}   

		$this->descriptions = $description; 
		$this->usernames = $username;  
	}   
	public function setTotalCommentMade($url)
	{
		$ch=curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
		$cl=curl_exec($ch); 
		@$dom = new DOMDocument();
		@$res=$dom->loadHTML($cl);   
		$xpath= new DomXPath($dom);   

	 	$totalCommentMade1 = $xpath->query("//*[@id='comments_subtab']/a[1]");//get total hype  
		foreach ($totalCommentMade1 as $tCM) 
		{   
 			$totalCommentMade = $tCM->nodeValue;
		} 	 
		return $this->totalCommentMade = $totalHype = preg_replace("/[^0-9]/", "" , $totalCommentMade);
	} 
	public function getTotalCommentMade()
	{
	 
		return $this->totalCommentMade; 
	} 
	public function getTotalCommentMadeEachMonth($totalHyped , $totalMonthPassed)
	{
		
	 	return intval($totalHyped / $totalMonthPassed);
	}
	public function getSourceUrlPage($url)
	{     
	}

	public function setUserDomainInfo()
	{   

		$domainInfo = $this->xpath->query("//*[@class='linespaced']/div/a");  
		foreach ($domainInfo as $d)   
		{
			if ( $d->getAttribute('href') !== NULL and stripos( $d->getAttribute('href'), '.com') > 0) 
			{
				$this->userDomainInfo .= $d->getAttribute('href') . ',';  //$this->isExistDomainThenNoAddToList($d->getAttribute('href') . ',' , $this->userDomainInfo);   
			}  
		}  



		echo "<br> <h3>this is the domain: </h3> " . $this->userDomainInfo;
		return $this->userDomainInfo;
	}
	public function getUserDomainInfo()
	{ 

		return $this->userDomainInfo;
	}

	public function printAlgorthm()
	{
	 echo " 
		* ALGORITHM: <hr>
		1.) member that lives in the top cities <hr>
		2.) member who has posted <span class='red' >4</span>  or more looks in (2) moths or <span class='red' >2</span>  looks in (1) month (total look each month = total look / total month)<hr>
		3.) member has atleast <span class='red' >10</span>  fans <hr>
		4.) member has atleast <span class='red' >10</span>  karma each look (each look karma = total karma / total look)<hr>
		5.) member has more than <span class='red' >50</span>  hyped in t months ( total hyped per month (<span class='red' >10</span>) = total hyped / total months after joined)<hr>
		6.) member has more than <span class='red' >50</span>  comment made in 6 months ( total comment made per month (<span class='red' >10</span>) = total comment made / total months after joined)   <hr>
		7.) fs total requirements is <span class='red' >6</span>.
		8.) fs total passing rate is <span class='red' >3</span> if member will get a score 3/6 then member accepted as a member of the site then if member score is less than 3 then user is not qualified to the site.
	 ";
	}
	public function getTopCityList()
	{
		$this->initPhpCurl('http://lookbook.nu/users#more');   
		$topCityListQuery = $this->xpath->query("//*[@id='locations_container']/ul/li/a");
		$c = 0;
		foreach ($topCityListQuery as $tCL) 
		{
			// echo " <br> top city: " . $tCL->nodeValue; 
			// $tCL->nodeValue = mysql_escape_string($tCL->nodeValue);
			$topCityList[$c] = preg_replace('/[^a-z^A-Z ]/', '' , $tCL->nodeValue);
			$c++;
		} 
		// foreach ($topCityList as $city) 
		// { 
		// 	  echo String::removeLeadingAndTrailingSpaces($city) . ',';
		// } 
		$this->topCityList = $topCityList;
		return $topCityList;
	}

    public function getTopCityTotalPages()
    {
        $this->initPhpCurl('http://lookbook.nu/users#more');
        $topCityListQuery = $this->xpath->query("//*[@id='locations_container']/ul/li/a");
        $c = 0;
        foreach ($topCityListQuery as $tCL)
        {
            // echo " <br> top city: " . $tCL->nodeValue;
            // $tCL->nodeValue = mysql_escape_string($tCL->nodeValue);
            $topCityList[$c]['city'] = preg_replace('/[^a-z^A-Z ]/', '' , $tCL->nodeValue);
            $topCityList[$c]['totalMember'] = preg_replace('/[^0-9]/', '' , $tCL->nodeValue);
            $topCityList[$c]['totalPages']  = intval($topCityList[$c]['totalMember']/48);
            //$topCityList[$c]['total'] = preg_replace('/[^0-9]/', '' , $tCL->nodeValue);
            $c++;
        }
        // foreach ($topCityList as $city)
        // {
        // 	  echo String::removeLeadingAndTrailingSpaces($city) . ',';
        // }
        $this->topCityList = $topCityList;
        return $topCityList;
    }







	public function getTopCityArray()
	{
		$topCity = 'New York,London,California,Manila,Los Angeles,So Paulo,Bangkok,Taipei,Paris,Toronto,Singapore,Rio de Janeiro,Jakarta,Florida,Sydney,Texas,Melbourne,Hong Kong,Moscow,San Francisco,Mexico City,Vancouver,Hanoi,Montreal,Seoul,Lima,Istanbul,Berlin,Washington,Chicago,Amsterdam,Warsaw,Buenos Aires,New Jersey,Atlanta,Bucharest,Madrid,Illinois,Bogot,Stockholm,Tokyo,Santiago,Virginia,Beijing,Georgia,Philadelphia,Shanghai,Boston,Michigan,Milan,Ohio,Houston,Seattle,North Carolina,San Diego,Krakow,Massachusetts,Munich,Prague,Pennsylvania,Athens,Brisbane,Maryland,Arizona,Las Vegas,Salvador,Dallas,Portland,Austin,Delhi,Minnesota,Saint Petersburg,Brooklyn,Dubai,Colorado,Copenhagen,Tennessee,Wisconsin,Brussels,Frankfurt,Alabama,Johannesburg,Indiana,Missouri,Oregon,Connecticut,Orange County,Baltimore,Washington DC,Cairo,Hawaii,San Jose,Utah,Louisiana,Kansas,Oklahoma,Antwerp,South Carolina,Guangzhou,Caracas'; 
		return explode(',', $topCity); 
	} 
	public function executeValidationUserInformation(
		$totalPostedLookInTwoMonths , $minimumLookInTwoMonths ,
   		$totalFan , $minimumFan	,
   		$totalKarmaEachMonth , $minimumKarma ,
		$totalHypedInTwoMonths , $minimumHypedInTwoMonths ,
		$totalCommentMadeInTwoMonths , $minimumCommentMadeInTwoMonths ,
		$overallScore , $passingScore , $totalScore)
	{ 
	   	// start validation condition
	   	$lookPassed = FALSE;
		if ($totalPostedLookInTwoMonths >= $minimumLookInTwoMonths)  
   	 	{  
   	 		$totalScore++;
			$overallScore++; 
			$lookPassed = TRUE;
   	 		echo "<br><span class='green' >Total Look posted in 2 months = $totalPostedLookInTwoMonths is >= than $minimumLookInTwoMonths</span>";  
   	 	} 
   	 	else
   	 	{
   	 		$overallScore++; 
   	 		echo "<br><span class='red' >Total Look posted in 2 months = $totalPostedLookInTwoMonths is <= than $minimumLookInTwoMonths</span>"; 
   	 	} 
 		if ($totalFan >= $minimumFan) 
 		{ 
 			$totalScore++;
			$overallScore++; 
 			echo "<br><span class='green' >totalFan = $totalFan is >= than $minimumFan</span>";  
 		}
 		else
 		{
 			$overallScore++; 
 			echo "<br><span class='red' >totalFan = $totalFan is <= than $minimumFan</span>"; 
 		}
 		if ($totalKarmaEachMonth >= $minimumKarma) 
		{  
			$totalScore++;
			$overallScore++; 
			echo "<br><span class='green' >total Karma EachMonth = $totalKarmaEachMonth is >= than $minimumKarma</span>";  
		}
		else
		{ 
			$overallScore++; 
			echo "<br><span class='red' >total Karma EachMonth = $totalKarmaEachMonth is <= than $minimumKarma</span>"; 
		}
		if ($totalHypedInTwoMonths >= $minimumHypedInTwoMonths) 
		{
			$totalScore++;
			$overallScore++; 
		 	echo "<br><span class='green' >total Hyped In 2 Months = $totalHypedInTwoMonths is >= than $minimumHypedInTwoMonths</span>";  
		}
		else
		{
			$overallScore++; 
			echo "<br><span class='red' >total Hyped In 2 Months = $totalHypedInTwoMonths is <= than $minimumHypedInTwoMonths</span>"; 
		} 
		if ($totalCommentMadeInTwoMonths >= $minimumCommentMadeInTwoMonths)
	 	{
	 		$totalScore++;
			$overallScore++; 
	 		echo "<br><span class='green' >total Comment Made In 2 months = $totalCommentMadeInTwoMonths is >= than $minimumCommentMadeInTwoMonths</span>"; 
	 	} 
	 	else
	 	{
	 		$overallScore++; 
	 		echo "<br><span class='red' >total Comment Made In 2 months = $totalCommentMadeInTwoMonths is <= than $minimumCommentMadeInTwoMonths</span>"; 
	 	}    

		$passingScore = $overallScore + $passingScore; 
		// pass the value
		$this->passingScore = $passingScore;  
		$this->overallScore = $overallScore;
		$this->totalScore   = $totalScore;  

  		// echo "<br><h3> totalScore = $totalScore | overallScore = $overallScore | passing score $passingScore </h3>"; 
	 	if ($totalScore >= $passingScore) 
	 	{ 
	 		
	 		// echo "<br><span class='green' >this lookbook user passed the qualification of fs INSERT NEW INFO </span>";  
	 		return $lookPassed;
	 	}
	 	else
	 	{ 
	 		// echo "<br><span class='red' >this lookbook user do not passed the qualification of fs DONT INSERT NEW INFO </span>";  
	 		return FALSE;
	 	}   
 	}
		
	public function getPassingScore() 
	{

		return $this->passingScore;
	}
	public function getTotalScore() 
	{
 
		return $this->totalScore;
	}
	public function isUserPassedQualification()
	{

		return ($this->totalScore >= $this->passingScore) ? TRUE : FALSE;
	} 
	public function getOverAll()
	{


 		return $this->overallScore;
	} 


	public function setUserInformation()
	{ 

 		


 		echo  '</h3>Invited status ' . $this->getInvitedStatus() . '</h3>';





	 	$this->userInformation = array( 
			'invited_fn'=>$this->getFullName(),
			'invited_ln'=>NULL,
			'invited_email'=>$this->getEmail(),
			'invited_wob'=>$this->getUserDomainInfo(),
			'invited_occu'=>NULL,
			'invited_style'=>NULL,
			'description'=>$this->getSpecificDescription(),
			'city'=>NULL,
			'state'=>NULL,
			'country'=>NULL,
			'scrape_src'=>$this->getSourceUrlLocation(),
			'domain_source'=>$this->getUserProfileUrlLookTabHyped(),
			'tlook'=>$this->getTotalLook(),
			'total_karma'=>$this->getTotalKarma(),
			'total_hype'=>$this->getTotalHyped(),
			'total_comment'=>$this->getTotalCommentMade(),
			'location'=>$this->getLocation(),
			'page'=>$this->getSourcePage(),
			'temail_sent'=>NULL,
			'invited_offer'=>NULL,
			'invited_genCode'=>NULL,
			'invited_ip'=>NULL,
			'invited_status'=>$this->getInvitedStatus(),
			'timezone'=>$this->getTimeZone(), 
			'timezone_url'=>$this->getTimeZoneUrl(),
			'scrape_version'=>1,
			'signup_status'=>0,
			'invited_date'=>date('Y-m-d H:i:s'),
			'DateTimeSend'=>NULL,
			'invited_update_date'=>NULL


		);
	}
	public function getUserInformation()
	{ 

		return $this->userInformation;
	}
 
	public function setLocation($location)
	{  

		$this->location = $location;
	}
	public function getLocation()
	{

		return $this->location;
	} 


	public function setInvitedStatus()
	{ 	
		$email = $this->getEmail();
		echo "<h1> THIS IS TO SET INVITED STATUS email: $email </h1>";
		
		echo "<br> email = $email";
	 	if (empty($email)) 
	 	{
	 		echo "<br>email is empty ";
	 		$this->invitedStatus = 6;		 
	 	}
	 	else 
	 	{
	 		$this->invitedStatus = 0;
	 		echo "<br>email not is empty ";
	 	}
	}
	public function getInvitedStatus()
	{

	 	return $this->invitedStatus;
	} 

	public function setTotalAvailableEmailToSent($totalApproved , $totalAllowed)
	{

		$this->totalEmailAvailbeToSend = $totalApproved - $totalAllowed;
	}
	public function getTotalAvailableEmailToSent()
	{
		
		return $this->totalEmailAvailbeToSend;
	} 
 

	function validateDateAndTimeToSendInvitation($totalDays , $totalDaysAllowedMax , $totalTime , $totalTimeAllowedMax , $totalTimeAllowedMin , 
		$firstSentEmailTotalEmailSent , $firstSentEmailTotalDays , $firstSentEmailTotalTime , $totalEmailSent)
	{
		 //validate day time if ready to recieve invitation 
		





			if (($totalEmailSent == $firstSentEmailTotalEmailSent) && ($totalDays == $firstSentEmailTotalDays) && ($totalTime == $firstSentEmailTotalTime)) 
			{

				echo "<br> total email sent is zero totalEmailSent = $totalEmailSent still not yet sent invitation for first day";

				if ($totalDays == $firstSentEmailTotalDays)
				{
					if($totalTime == $firstSentEmailTotalTime)
					{
						return TRUE;
						 echo "<br> send email for first 1 day of the invitation ";
					}
				}
				else
				{
					echo "<br> this invitation not one days passed yet ";
				}
			}
			else
			{ 
				echo "<br> total email sent is not zero totalEmailSent = $totalEmailSent";

				if ($totalDays == $totalDaysAllowedMax) 
				{   
					if ($totalTime <= $totalTimeAllowedMax && $totalTime >= $totalTimeAllowedMin) 
					{
					 	//alow this email will recieved an invitation	
					 	return TRUE;
					} 	
					else{
						echo "<br> didnt send email invite because (totalDays = $totalDays == totalDaysAllowedMax $totalDaysAllowedMax) but  else (totalTimeAllowedMax = $totalTime > totalTimeAllowedMax = $totalTimeAllowedMax && totalTime = $totalTime < totalTimeAllowedMin = $totalTimeAllowedMin)  ";
					}
				}
				else{  
					echo "<br> didnt send email invite because else (totalDays = $totalDays > totalDaysAllowedMax $totalDaysAllowedMax)  ";
					return FALSE;
					// this is not a time for this email yet to recieved an invitation
				} 				
			}


	}
	
 		

 	public function setNewTotalEmailSent($totalEmailSent)
 	{

 		$this->totalEmailSent = $totalEmailSent + 1;
 	}
	public function getNewTotalEmailSent()
 	{ 

 		return $this->totalEmailSent;
 	}
 		 
 	public function setFirstName($invitedFn)
 	{
 		$invitedFn1 = explode(' ', $invitedFn);


 	 	$this->invitedFn = (!empty($invitedFn1[0])) ? $invitedFn1[0] : $invitedFn ;
 	}		
	public function getFirstName()
 	{ 

	 	return $this->invitedFn;
 	}		
 

	public function updateInvitedStatusIfExceedLimitInvite($invitedStatus , $personalInviteAtInvitedStatus)
	{
		if ($invitedStatus == $personalInviteAtInvitedStatus)
		{
			return TRUE; 
		}
		else{
			return FALSE;
		}
	}


	public function increment($number)
	{
		return $number++;
	}
}  