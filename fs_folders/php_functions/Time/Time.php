<?php
/**
* 
*/ 
// echo "this is time class ";


class Time
{ 


    public static $hour24     = '';
    public static $hour12     = '';
    public static $dataTime12 = '';
    public static $Time12     = '';
    private static $timeZoneName       = '';
    private static $timezoneDate       = '';
    private static $timeZoneDatetime24 = '';
    private static $timeZoneDateTime12 = '';
    private static $timeZoneTime12     = '';
    private static $timeZoneTime24     = '';
    private static $totalMinutes       = 0;
    private static $totalHours         = 0;
    private static $totalHourMinutes   = 0;
    private static $hour               = '';
    private static $DateTimeAddDateTime = '';
    public static  $log =  '';


	public function __construct()
	{  

		// echo '<br> Time start';
	} 
	public static function getTotalDaysPassed($startDate , $currentDate=NULL)
	{   
		if ($currentDate=NULL) $currentDate = date('Y-m-d');  
		$datetime1 = date_create($startDate);
		$datetime2 = date_create($currentDate);
		$interval  = date_diff($datetime1 , $datetime2);
		$response  = $interval->format('%R%a days'); 
		$totalDaysPassed  = intval($response);   
		// echo "<br>  total days ago $response";  
		return $totalDaysPassed; 
	}
	public static function removeDashAndDay($date)
	{ 
		//date 2014-01-12
		//return 2014-01
		return  substr($date , 0 , strlen($date)-3); 
	}
	public static function removeLookBookTime($dateTime)
	{
		//2013-11-16T03:47:32-05:00  
		$dateTimeArray = explode('T', $dateTime); 
		// return 2013-11-16
		return $dateTimeArray[0]; 
	}  
	public static function getDateRemoveTime($dateTime)
	{ 	
	    //date time: 2013-11-16 32-05:00 
		// return 2013-11-16
		$date = explode(' ', $dateTime);
		return $date[0];
	} 
	public static function getTimeRemoveDate($dateTime)
	{
		//date time: 2013-11-16 32-05:00 
		// return 32-05:00
		$date = explode(' ', $dateTime);
		return $date[1];
	} 
	public static function getTimeDbFormatArray()
	{ 
		return array(
            '00:00:00'=> '12:00 AM',
            '01:00:00'=> '1:00 AM',
            '02:00:00'=> '2:00 AM',
            '03:00:00'=> '3:00 AM',
            '04:00:00'=> '4:00 AM',
            '05:00:00'=> '5:00 AM',
            '06:00:00'=> '6:00 AM',
            '07:00:00'=> '7:00 AM',
	 		'08:00:00'=> '8:00 AM',
		 	'09:00:00'=> '9:00 AM',
		 	'10:00:00'=> '10:00 AM',
		 	'11:00:00'=> '11:00 AM',
		 	'12:00:00'=> '12:00 PM',
		 	'13:00:00'=> '1:00 PM',
		 	'14:00:00'=> '2:00 PM',
		 	'15:00:00'=> '3:00 PM',
		 	'16:00:00'=> '4:00 PM',
		 	'17:00:00'=> '5:00 PM',
		 	'18:00:00'=> '6:00 PM',
		 	'19:00:00'=> '7:00 PM',
		 	'20:00:00'=> '8:00 PM',
		 	'21:00:00'=> '9:00 PM',
		 	'22:00:00'=> '10:00 PM',
		 	'23:00:00'=> '11:00 PM'
		 );
	}
    public static function concatDateAndTime($date, $time) {
        return $date . ' ' . $time;
    }
	public static function setTimeDifference($startTime='smaller' , $currentTime='bigger')
	{
		echo "  setTimeDifference($startTime='smaller' , $currentTime='bigger')";
		$totalPassedTime         = strtotime($currentTime) - strtotime($startTime);
		$minutes                 = $totalPassedTime/60; //minute 360 mins
		$hours                   = $minutes/60; //hour  2 hours
	 	$HourMinutes             = $minutes - (intval($hours)*60); //hour minute 20 mins 
	 	self::$totalMinutes      = $minutes;
		self::$totalHours        = intval($hours);
		self::$totalHourMinutes  = $HourMinutes; 
	}  
	public static function getTotalMinutes()
	{ 

		return self::$totalMinutes;
	}
	public static function getTotalHours()
	{ 

		return self::$totalHours;
	}
	public static function getTotalHourMinutes()
	{ 

		return self::$totalHourMinutes; 
	}

	public static function setFromTime12ToTime24($time)
	{ 
		// 12-hour time to 24-hour time 
		self::$hour12 = $time; 
		$time_in_24_hour_format  = date("H:i", strtotime($time));
		self::$hour = $time_in_24_hour_format;
		return $time_in_24_hour_format; 
	}
	public static function getFromTime12ToTime24()
	{ 
		// 12-hour time to 24-hour time 
		return self::$hour;
	}

    public static function convertTime24ToTime12($time) {
        // 24-hour time to 12-hour time
        return date("g:i a", strtotime($time));
    }
    public static function convertTime12ToTime24($time) {
        // 12-hour time to 24-hour time
        return  date("H:i", strtotime($time));
    }
    public static function convertDateTimeToAgo($date) {
        if(empty($date)) {
            return "No date provided";
        }
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");
        $now = time();
        $unix_date = strtotime($date);
        // check validity of date
        if(empty($unix_date)) {
            return "Bad date";
        }
        // is it future date or past date
        if($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ago";
        } else {
            $difference = $unix_date - $now;
            $tense = "from now";}
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if($difference != 1) {
            $periods[$j].= "s";
        }
        return "$difference $periods[$j] {$tense}";
    }
	// public static function setFromTime24ToTime12($time)
	// { 
	// 	// 12-hour time to 24-hour time 
	// 	self::$hour12 = $time; 
	// 	$time_in_24_hour_format  = date("H:i", strtotime($time));
	// 	self::$hour = $time_in_24_hour_format;
	// 	return $time_in_24_hour_format; 
	// }
	// public static function getFromTime24ToTime12()
	// { 
	// 	// 12-ho
	// 	return self::$hour;
	// }

	// new timezone region 
		public static function setTimeZoneDateTime($timeZoneShortCut = 'EST') 
		{  
			$utc = new DateTimeZone($timeZoneShortCut);
			date_default_timezone_set($utc->getName());  
	 		$timeZoneName               = $utc->getName(); 
	 		$timeZoneDatetime24         = date("Y-m-d H:i:s");  
	  		$timeZoneDateTime12         = date("Y-m-d h:i:s A");
	  		$timeZoneTime12             = date("h:i:s a"); 
	  		$timeZoneTime24             = date("H:i:s"); 


	  		self::$timezoneDate         = date("Y-m-d"); 
		  	self::$timeZoneTime12 		= $timeZoneTime12;
			self::$timeZoneTime24 		= $timeZoneTime24; 
		  	self::$timeZoneName         = $timeZoneName; 
			self::$timeZoneDatetime24   = $timeZoneDatetime24; 
			self::$timeZoneDateTime12   = $timeZoneDateTime12;  

			/*
			echo " date time " .date("Y-m-d H:i:s");  
			echo "  
		  		<br>
			  		timeZoneName = $timeZoneName <br>
					timeZoneDatetime24 = $timeZoneDatetime24 <br>
					timeZoneDateTime12 = $timeZoneDateTime12 <br> 
		  	";
		  	*/
            return (!empty($utc)) ? TRUE : FALSE;
		}
		public static function getTimezoneDate() 
		{  

			return self::$timezoneDate; 
		}
		public static function getTimeZoneDateTime12() 
		{  

			return self::$timeZoneDateTime12; 
		}
		public static function getTimeZoneDateTime24() 
		{  

			return self::$timeZoneDatetime24; 
		}
		public static function getTimeZoneLocation() 
		{  

			return self::$timeZoneName; 
		}
		public static function getTimeZoneTime12() 
		{  

			return self::$timeZoneTime12; 
		}
		public static function getTimeZoneTime24() 
		{  

			return self::$timeZoneTime24; 
		} 
	// end timezone region



    /**
     * @param $dateTime
     * @param $monthDaysMinSecs
     */
    public static function setDateTimeAddDateTime($dateTime, $monthDaysMinSecs)
    {
        //ex: $time->setDateTimeAddDateTime($Row['DateTimeSend'], '+ 1 month');
        //ex: $time->setDateTimeAddDateTime($Row['DateTimeSend'], '+ 1 day');

        echo "date today = " . $dateTime . "\n";


        $dateTime = strtotime(date($dateTime) .' '. $monthDaysMinSecs);
        self::$DateTimeAddDateTime = date('Y-m-d H:i:s', $dateTime);

    }
    public static function __setDateAddDays($dateTime, $monthDays) {
        $dateTime = strtotime(date($dateTime) .' '. $monthDays);
        self::$DateTimeAddDateTime = date('Y-m-d', $dateTime);
    }

    public static function getDateTimeAddDateTime()
    {
        return  self::$DateTimeAddDateTime;
    }
    public static function getDateAddDays__() {
        return  self::$DateTimeAddDateTime;
    }






















    // time add and update

    /**
     * @param $dateTimeSend
     * @param $serverTime
     * @return bool
     */
    public function validateDateTimeSend($dateTimeSend, $serverTime)
    {
        // check if the greater and equal work with date and time
        if ($dateTimeSend == $serverTime) {
            echo "DSTS1 equal to SDST <br>";
            self::$log = "Date Time send is equal to Server date time";
            return FALSE;
        } elseif ($dateTimeSend > $serverTime) {
            echo "DSTS1 greater than to SDST <br>";
            self::$log = "Date Time send is greater than to Server date time";
            return TRUE;
        } else {
            echo "DSTS1 less than to SDST <br>";
            self::$log = "Date Time send is less than to Server date time";
            return FALSE;
        }
    }

    /**
     * @param $dateTimeSend
     * @param $serverTime
     * @param $invited_id
     * @param $database
     */
    public function addDateTmeSend ($dateTimeSend, $serverTime, $invited_id, $database, $location, $invited_status=0)
    {
        echo "addDateTmeSend ($dateTimeSend, $serverTime, $invited_id  )";
        if ($this->validateDateTimeSend ($dateTimeSend, $serverTime)) {

            echo "<br> Validated";

            if(empty($invited_id)) {
                echo "<h3>invited_id is not empty $invited_id </h3>";
                if ($database->update('fs_invited', array('DateTimeSend' => $dateTimeSend), "location = '$location'")) {
                    echo "\n successfully updated 1 ";
                } else {
                    echo "\n failed updated 1 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 2 days');
                if ($database->update('fs_invited', array('DateTimeSend1' => $this->getDateTimeAddDateTime()), "location = '$location'")) {
                    echo "\n successfully updated 2 ";
                } else {
                    echo "\n failed updated 2 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 4 days');
                if ($database->update('fs_invited', array('DateTimeSend2' => $this->getDateTimeAddDateTime()), "location = '$location'")) {
                    echo "\n successfully updated 3 ";
                } else {
                    echo "\n failed updated 3 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 6 days');
                if ($database->update('fs_invited', array('DateTimeSend3' => $this->getDateTimeAddDateTime(), 'invited_status' => 1), "location = '$location'")) {
                    echo "\n successfully updated 4 with update of invited_status = 1 ";
                } else {
                    echo "\n failed updated 4 ";
                }
            } else {
                echo "<h3>invited_id is empty $invited_id </h3>";
                if ($database->update('fs_invited', array('DateTimeSend' => $dateTimeSend), "invited_id = $invited_id")) {
                    echo "\n successfully updated 1 ";
                } else {
                    echo "\n failed updated 1 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 2 days');
                if ($database->update('fs_invited', array('DateTimeSend1' => $this->getDateTimeAddDateTime()), "invited_id = $invited_id")) {
                    echo "\n successfully updated 2 ";
                } else {
                    echo "\n failed updated 2 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 4 days');
                if ($database->update('fs_invited', array('DateTimeSend2' => $this->getDateTimeAddDateTime()), "invited_id = $invited_id")) {
                    echo "\n successfully updated 3 ";
                } else {
                    echo "\n failed updated 3 ";
                }
                $this->setDateTimeAddDateTime($dateTimeSend, '+ 6 days');
                if ($database->update('fs_invited', array('DateTimeSend3' => $this->getDateTimeAddDateTime(), 'invited_status' => 1), "invited_id = $invited_id")) {
                    echo "\n successfully updated 4 with update of invited_status = 1 ";
                } else {
                    echo "\n failed updated 4 ";
                }
            }
            return TRUE;
        } else {
            echo "<br> Not Validated";
            return FALSE;
        }
    }

    /**
     * @param $row
     * @param $currentDateTimeDb
     * @param $newTime
     * @param $invited_id
     * @param $database
     */
    public function updateTimeSend($row, $currentDateTimeDb, $newTime, $invited_id, $database, $location)
    {
        // DateTimeSend1 and DateTimeSend2 change only when only approved
        $date = self::getDateRemoveTime($currentDateTimeDb);
        $dateTime = $date .' '. $newTime;


        if(!empty($invited_id)) {
            echo "if update time by id <br>";
            if($database->update('fs_invited',array($row=>$dateTime), "invited_id = $invited_id"))
            {
                echo "\n successfully updated $row=>$dateTime ";
                return TRUE;
            } else {
                echo "\n failed updated $row=>$dateTime ";
                return FALSE;
            }
        } else {
            echo "else update time by location and invited_status <br>";
            if($database->update('fs_invited',array($row=>$dateTime), "invited_status = 1 and location = '$location'"))
            {
                echo "\n successfully updated $row=>$dateTime ";
                return TRUE;
            } else {
                echo "\n failed updated $row=>$dateTime ";
                return FALSE;
            }
        }

    }

    /**
     * @param $dateTime
     * @return bool|string
     */
    public static function  convertTimeToReadableDate($dateTime) {
        $time = strtotime($dateTime);
        return date("r",$time);
        // return $dateTime;
    }
}






 