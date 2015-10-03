<?php
/**
* 
*/
class Time
{ 
	public function __construct()
	{   
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

		return  substr($date , 0 , strlen($date)-3); 
	}
}