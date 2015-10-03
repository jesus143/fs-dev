<?php
/**
* 
*/
class LookbookDataBase
{ 
	public static $database = '';
	public static $invited_id = 0;
	public static $page = 0;
	public static $resultArray = array(); // array results
	public static $resultTotal = 0; // total results

	private static $invitedLocation = '';

	function __construct()
	{    	
		
		// echo '<br> LB:DB starts '; 
	}


    public static function getSpecificData1($tableName, $row, $condition) {
        $response = Database::selectV1($tableName, "$row", "$condition");
        return (!empty($response[0][$row])) ? $response[0][$row]: false;
    }
    public static function getSpecificData($tableName, $row, $idName, $idVal) {
        $response = Database::selectV1($tableName, "$row", "$idName = $idVal");
        return (!empty($response[0][$row])) ? $response[0][$row]: false;
    }
    public static function getDateTimeSendBasedOnTemailSent($invited_id)
    {
        $response = Database::selectV1('fs_invited', '*', "invited_id = $invited_id ");
        // return $response[0]['temail_sent'];
        if (!empty($response)) {
            if ($response[0]['temail_sent'] == 0) {
                return $response[0]['DateTimeSend'];
            } elseif ($response[0]['temail_sent'] == 1) {
                return $response[0]['DateTimeSend1'];
            } elseif ($response[0]['temail_sent'] == 2) {
                return $response[0]['DateTimeSend2'];
            } elseif ($response[0]['temail_sent'] == 3) {
                return $response[0]['DateTimeSend3'];
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    public static function getTotalEmailSent($invited_id) {
        $response = Database::selectV1('fs_invited' , '*' , "invited_id = $invited_id ");
        return $response[0]['temail_sent'];
    }
    public static function getUserTimeZone($invited_id) {
        $res = Database::selectV1('fs_invited' , '*' , "invited_id = $invited_id");
        $timezone = ($res[0]['timezone']) ? $res[0]['timezone']: '';
        return $timezone;
    }

	public static function getFullNameByEmail($email) 
	{ 
  		$web = Database::selectV1('fs_invited' , '*' , "invited_email = '$email' order by invited_id desc limit 1");
  		$fullName = ($web[0]['invited_fn']) ? $web[0]['invited_fn']: '';   
  		// print_r($web);

  		// echo "<br><br><br><br>  " . $blog1[0];
  		return $fullName; 
	} 
	public static function getFirstNameByEmail($email) 
	{ 
  		$web = Database::selectV1('fs_invited' , '*' , "invited_email = '$email' order by invited_id desc limit 1");
  		$blog1 = ($web[0]['invited_fn']) ? explode(' ' , $web[0]['invited_fn'])  : array('')  ;   
  		// print_r($web);

  		// echo "<br><br><br><br>  " . $blog1[0];
  		return $blog1[0]; 
	} 
 
	public static function getBlogByEmail($email) 
	{ 
  		$web = Database::selectV1('fs_invited' , '*' , "invited_email = '$email' order by invited_id desc limit 1");
  		$blog1 = ($web[0]['invited_wob']) ? explode(',' , $web[0]['invited_wob'])  : array('http://www.fashionsponge.com')  ;   
  		return $blog1[0]; 
	} 
 	public static function updateEmailToOfficiallySignup($email)
 	{  


 		echo "<br> email = $email <br>";

 		return self::$database->update('fs_invited' , array('invited_status' => 2) , "invited_email = '$email'"); 
 		echo "update signup"; 
 	}
 
	public static function updateTimeSendAndTotalEmailSent($totalEmailSent , $locationDateTime , $where)
	{ 
	       
	  	return self::$database->update(
	  		'fs_invited' , 
	  		array('temail_sent'=>$totalEmailSent , 'DateTimeSend'=>$locationDateTime) , 
	  		$where
	  	);   
 
	}
	public function ifExceedTotalSendEmailThenMovedToPersonalInvite($totalEmailSent , $totalEmailSentMLimit = 3 , $where)
	{
		 if ($totalEmailSent >= $totalEmailSentMLimit) 
		 { 

		 	return self::$database->update('fs_invited' , array('invited_status' => 5) , $where);  
		 }
		 else
		 {
		 	return FALSE;
		 }

	}
	public static function getAllApprovedInvitedEmail()
	{  
		return Database::selectV1('fs_invited' , '*' , "invited_status = 1 and signup_status = 0 and scrape_version = 1 and DateTimeSend != '0000-00-00 00:00:00' order by invited_date asc limit 200"); 
		//return Database::selectV1('fs_invited' , '*' , "invited_email = 'mrjesuserwinsuarez@gmail.com' limit 1"); 
	}
	public static function isUserAlreadSignedUp($invited_id) 
	{

	 	$result = Database::selectV1('fs_invited' , '*' , "invited_id = $invited_id limit 1"); 
	 	$invited_status = $result[0]['invited_status'];
	 	$signup_status  = $result[0]['signup_status'];   

		// if (($invited_status == 7 || $invited_status == 8 || $invited_status == 9 || $invited_status == 10 || $invited_status == 11) && $signup_status == 1)
		if ($signup_status == 1)
		{ 
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	} 
 	public static function AddInvitedUserSignup($email , $websiteOrBlog , $fullName , $invited_status , $invited_date , $location , $scrape_version , 
 		$signup_status , $timezone , $timezone_url)
 	{
 
 		echo "<br>($email , $websiteOrBlog , $fullName , $invited_status , $invited_date , $location , $scrape_version , 
 		$signup_status , $timezone , $timezone_url)"; 

 		$b = self::$database->insert(
 			'fs_invited' ,
 			array( 
 				'invited_email' => $email ,
 				'invited_wob' => $websiteOrBlog ,
 				'invited_fn' => $fullName , 
 				'invited_status' => 8 , 
 				'invited_date' => $invited_date ,
 				'location' => 'NEW YORK' ,
 				'scrape_version'=> 1 , 
 				'signup_status' => 1 , 
 				'timezone' => 'EST' ,
 				'timezone_url' => 'http://www.timeanddate.com/worldclock/usa/new-york'
 			) 
 		);


 		if ($b === TRUE)	
		{

			echo "<br> user info successfully added";
		}
		else 
		{
			echo "<br> user info failled to add";
		}  

		
 		 echo "<br>AddInvitedUserSignup($email , $websiteOrBlog)";
 	}
	public static function updateInvitedUserSignsUp($invitedUser , $websiteOrBlog , $email , $invited_date)
	{  
	 	// init
	 	$invited_id         = $invitedUser[0]['invited_id']; 
	 	$invited_wob        = $invitedUser[0]['invited_wob'];
	 	$invited_status     = $invitedUser[0]['invited_status'];
	 	$signup_status      = $invitedUser[0]['signup_status'];
	 	
	 	// remove exist
	 	$invited_wob = str_replace($websiteOrBlog . ',' , '' , $invited_wob);
	 	$invited_wob = str_replace($websiteOrBlog, '' , $invited_wob); 
	 	$invited_wob .= ',' . $websiteOrBlog; 
	 	echo "<br>invited web or blog " . $invited_wob;
    
   		// start condtions 
 		if (($invited_status == 0) && ($signup_status == 0)) // pending (sign up)
 		{
 			echo '<br> <H2>member is pending and not yet signup to the site</H2>';

 			//if member is pending and not yet signup to the site 
 			//update signup_status = 1;
 			//invited_status = 7;  
 			//weborblog

 
			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 7 ,
		    		'invited_wob' => $invited_wob ,  
		    	) ,
		    	"invited_id = $invited_id"
			);
 			
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else 
			{
				echo "<br> user info failled to update";
			}  
 		}
 		elseif (($invited_status == 1) && ($signup_status == 0)) // approved  
 		{ 
 			echo '<br> <H2>user is approved and not yet signup</H2>';
 			//if user is approved and not yet signup
 			//update signup_status = 1;
 			//invited_status = 2;   

 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 2 ,
		    		'invited_wob' => $invited_wob , 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}   
 		} 
 		elseif (($invited_status == 2) && ($signup_status == 0)) // signup 
 		{



 			echo '<br> <H2>user is officially signup already but there is errorr the signup status not update to 1 and now updating: signup_status = 1 and this person is now officially signedup </H2>';
 			//if user is signup already but there is errorr the signup status not update to 1
 		
 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 2 ,
		    		'invited_wob' => $invited_wob , 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}    
 		} 
 		elseif (($invited_status == 3) && ($signup_status == 0)) // officially a member 
 		{
 			echo '<br> <H2>user is officially a member but the signup status not updated to 1 and now updating: signup_status = 1 and this person is now officially a member </H2>';
 			//if user is officially a member but the signup status not updated to 1 


 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 3 ,
		    		'invited_wob' => $invited_wob , 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}     
 		} 
 		elseif (($invited_status == 4) && ($signup_status == 0)) // deleted 
 		{

 			echo '<br> <H2>user is added to the deleted group dropdown and not sign up yet</H2>';
 			//if user is deleted and not sign up yet

 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 10 ,
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}
 		} 
 		elseif (($invited_status == 5) && ($signup_status == 0)) // personal invite  
 		{

 			echo '<br> <H2>user is added to need personal invite did not sign up yet</H2>';
 			//if user need personal invite didnot sign up yet
 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 11 ,
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{ 
				echo "<br> user info successfully updated";
			}
			else 
			{
				echo "<br> user info failled to update";
			} 
 		} 
 		elseif (($invited_status == 6) && ($signup_status == 0)) // dont have email pending 
 		{

 			echo '<br> <H2>user is added to dont have email pending and still not sign up yet</H2>';
 			//if user dont have email and still pending not sign up yet 
 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 ,
		    		'invited_status' => 7 ,
		    		'invited_wob' => $invited_wob , 
		    		'invited_email' => $email  
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}      
 		} 
 		elseif (($invited_status == 7) && ($signup_status == 0)) // user pending and already sign up not yet approved (sign up)
 		{
 			echo '<br> <H2>user is from pending invited with no email and already signup but still not approved yet</H2>';
 			//if user dont have email and still pending not sign up yet
 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 , 
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}    
 		} 
 		elseif (($invited_status == 8) && ($signup_status == 0)) // sign up the site anonymous (sign up)
 		{
 			echo '<br> <H2>user is signup the site anonymously also not a refferal but still not approved yet</H2>';
 			//if user dont have email and still pending not sign up yet
 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 , 
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}    
 		} 
 		elseif (($invited_status == 9) && ($signup_status == 0)) // refferal link sign up (sign up)
 		{
 			echo '<br> <H2>user signup via refferal and link not approved yet</H2>';
 			//if user dont have email and still pending not sign up yet

 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 , 
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}   
 		} 
 		elseif (($invited_status == 10) && ($signup_status == 0)) // user under deleted dropdown signed up (sign up)
 		{
 			echo '<br> <H2>user signup under deleted dropdown it is under deleted sign up</H2>';
 			//if user dont have email and still pending not sign up yet

 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 , 
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}   
 		}  
 		elseif (($invited_status == 11) && ($signup_status == 0)) // user under personal invite sign up (sign up)
 		{
 			echo '<br> <H2>user signup under personal invite dropdown at it will be stored at persnal invited signup</H2>';
 			//if user dont have email and still pending not sign up yet

 			$b = self::$database->update(
		    	'fs_invited' ,
		    	array(
		    		'signup_status' => 1 , 
		    		'invited_wob' => $invited_wob 
		    	) ,
		    	"invited_id = $invited_id"
			); 
			if ($b === TRUE)	
			{

				echo "<br> user info successfully updated";
			}
			else

			{
				echo "<br> user info failled to update";
			}   
 		}  
 		else{ 

 			echo '<br> <H2>not listed in the current algorithm or this person is already signup or officially a member on the site</H2>';
 			//not listed in the current algorithm
 		}  

		echo "<br>this is invited user";
		print_r($invitedUser);  
 
		// uodate invited_date to current date
		$b = self::$database->update(
	    	'fs_invited' ,
	    	array(
	    		'invited_date' => $invited_date ,
	    		'scrape_version' => 1
	    	) ,
	    	"invited_id = $invited_id"
		); 
	} 
	public static function setInvitedInformationByEmailFromDb($email)
	{

		$result = Database::selectV1('fs_invited' , '*' , "invited_id > 0 and invited_email = '$email' order by invited_id desc limit 1 "); 
		self::$resultArray = $result; 
		self::$resultTotal = count($result);  
	}
 	public static function isEmailExist($totalResult)
	{
		if ($totalResult > 0) 
		{
			return TRUE;
		}	 
		else
		{
			return FALSE;
		}
	} 
	public static function getResultArray()
	{
		
		return self::$resultArray; 
	}
	public static function getResultTotal()
	{

		 return self::$resultTotal;
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
 
		print_r($values);

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



		$page = Database::selectV1('fs_invited' , 'max(page), page' , "location = '$location' && scrape_version = 1 order by invited_date desc limit 1");



        // echo "<pre>";
        // print_r($page);
 

		self::$page = (!empty($page[0]['max(page)'])) ? $page[0]['max(page)'] : 1 ;
	}
	public static function getLastPageScrapped()
	{

		return self::$page;
	}  


	public static function setInvitedById($invited_id)
	{
		$invited = $database->selectV1('fs_invited', '*', "invited_id = $invited_id limit 1"); 
		self::$invitedLocation = $invited[0]['location'];
	} 
 
 

	public static function emailSaveAction($action, $qid)
	{  
		return self::$database->insert('fs_invited_activity' , array('fs_invited_activity_action'=>$action, 'fs_invited_queue_id_fk'=>$qid));
	}  
	
	// id_pk
	// invited_id_fr
	// action
	// date

}  