<?php
/**
* 
*/
class LookbookDataBase
{ 
	public static $database = '';
	public static $invited_id = 0;
	public static $page = 0;

	function __construct()
	{    	
		
		// echo '<br> LB:DB starts '; 
	} 
	public static function updateScrapedTimeSendDb($dateTime , $invitedIds)
	{   
		$bool = true;
	    $dateTime = (!empty($dateTime)) ? $dateTime : '0000-00-00 00-00-00' ; 
	    $invitedIds = (!empty($invitedIds)) ? $invitedIds : 0 ;  
	    $invitedIdsArray = explode(',',  $invitedIds); 
	    foreach ($invitedIdsArray as $key => $invitedId) 
	    { 
	    	if (self::$database->update(
			    	'fs_invited',
			    	array('DateTimeSend'=>$dateTime),
			    	"invited_id = $invitedId"
			))
	    	{
	    		echo "<br> sucessfully updated "; 
	    		$bool = true;
	    	}
	    	else
	    	{
	    		echo "<br> failled to updated";
	    		$bool = false;
	    	} 
	    }   
	    return $bool;
	}
 
	public static function deleteAllScrapedVersion($scrapedVersion)
	{ 
	   	if ( self::$database->delete('fs_invited' , "scrape_version = $scrapedVersion")) 
	   	{
		    echo "<br> all deleted scrape version = 1";
	   	}
	   	else
	   	{
	    	echo "<br> failled to delete scrape version 1";
	  	}   
	  	// echo " this is the method";
	}
 

	public static function isUserExistToFs($email , $name)
	{ 
		self::$invited_id = 0; 
		
		$exist = FALSE;
		echo " <b> checkIfLookBookUserExistToFs($email , $name)</b> <br>";   

		$id = Database::selectV1('fs_invited' , 'invited_id,invited_fn,invited_email' , "invited_fn = '$name' limit 1");
		// print_r($id);

		self::$invited_id = (!empty($id[0]['invited_id'])) ? $id[0]['invited_id'] : NULL ;  
		
		if (self::$invited_id != NULL) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;	
		}	 
	} 
	public static function getInvitedId()
	{
 
		return self::$invited_id;
	}
	public static function saveLookBookUser($userEmail , $userName , $userDomainInfo , $userDescription , $dateJoinedLookBook , 
		$urlSource , $urlPage ,  $urlLocation  , $timeZone , $totalHyped , $totalKarma , $totalCommentMade , $totalFan , 
		$totalLookUploadedIntwoMonths , $totalHypePerMonth , $totalCommentMadePerMonths)
	{   
		return;
	}  

	public static function updateInvitedUser($values = array() , $where)
	{   

		// echo "<h2> updating the information here </h3>";
		// echo "<pre>";
 
		// print_r($values);

		// echo "<br>invited_id = $where";
		return self::$database->update('fs_invited' , $values , $where);  
	}   
	public static function addInvitedUser($values = array())
	{   

		// echo "<h2> updating the information here </h3>";
		// echo "<pre>";
 
		// print_r($values);
 
		return self::$database->insert('fs_invited' , $values);  
	}   


	public static function setLastPageScrapped($location)
	{	
		// $page = array();



		$page = Database::selectV1('fs_invited' , '*' , "location = '$location' && scrape_version = 1 order by invited_date desc limit 1"); 



		echo "<pre>";
		
		

		print_r($page);  
 

		self::$page = (!empty($page[0]['page'])) ? $page[0]['page'] : 1 ; 
	}
	public static function getLastPageScrapped()
	{

		return self::$page;
	} 
}  