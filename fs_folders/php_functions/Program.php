<?php
/**
*
*/ 
class Program 
{
	private $database = '';
	public static $adminEmail = 'mrjesuserwinsuarez@gmail.com,invite@fashionsponge.com';
	// pecotrain1@gmail.com

	public function __construct($database)
	{ 
		echo '<br> Program start';  
		$this->database = $database;
		$this->ConnectToDatabase(); 
		LookbookDataBase::$database = $database; 
	}
	public function ConnectToDatabase()
	{  
	 	if ($this->database->connect() === TRUE)
	 	{
	 		echo '<br> connected to databse ';
	 	} 
	 	else
	 	{
	 		echo '<br> not connected to databse';
	 	}
	}
	public function scrapeStarts($location , $lookbook)
	{  
		$minimumLookInTwoMonths = 4;
		$minimumHypedInTwoMonths = 10;
		$minimumCommentMadeInTwoMonths = 10;  
		$minimumFan = 10;
		$minimumKarma = 10; 
		$totalScore = 0; 
		$overallScore = 0; 
		$passingScore = -2;   
		$counter = 0;
		LookbookDatabase::setLastPageScrapped($location);
 
		while (true) 
		{ 
			echo "<pre>";
			echo "<h3> class Lookbook : initialized </h3>"; 
			echo "<h3> Scrape Location : $location </h3> ";  
			echo "<h3> page : " . LookbookDatabase::getLastPageScrapped();   
			$lookbook->setSourceUrlLocation($location , LookbookDatabase::getLastPageScrapped()+$counter); 
		  	$lookbook->setUsernamesAndDescription($lookbook->getSourceUrlLocation());  
			$lookbook->usernames    = $lookbook->getUsernames();
			$lookbook->descriptions = $lookbook->getDescriptions();  
			$lookbook->setPreviousMonth(date('Y-m-d')); 
			echo "<br>getPreviousMonth = " .$lookbook->getPreviousMonth();  
			$lookbook->setLocation($location); 
			echo "<h3> Total People found: " .count($lookbook->username). " </h3>";   
			for ($i=0; $i < count($lookbook->usernames); $i++) 
			{   
				//set log execution
			    Log::unsetExecutionLog();   

			    //set user url
				$lookbook->setUserProfileUrl($lookbook->usernames[$i]);     

			    // set comment made tab
				$lookbook->initPhpCurl($lookbook->getUserProfileUrlCommentTab());   	
				$lookbook->setPostedCommentMadeInTwoMonthsTotal($lookbook->getPreviousMonth());
					  
				// set look tab 
			    $lookbook->initPhpCurl($lookbook->getUserProfileUrlLookTab());    
				$lookbook->setPostedLookInTwoMonthsTotal($lookbook->getPreviousMonth());

				// set comment hyped tab
				$lookbook->initPhpCurl($lookbook->getUserProfileUrlLookTabHyped());   
				$lookbook->setPostedHypedInTwoMonthsTotal($lookbook->getPreviousMonth());

				// sepecific username and desc
				$lookbook->setSpecificDescription($i);
	 			$lookbook->setSpecificUsername($i);

	 			// set user attributes 
	 			
	 			$lookbook->setTotalLook(); 
	 			$lookbook->setTotalKarma();
	 			$lookbook->setTotalHyped();
	 			$lookbook->setTotalCommentMade($lookbook->getUserProfileUrlCommentTab()); 
	 			$lookbook->setFullName();
	 			$lookbook->setEmail();
	 			$lookbook->setTimeZone($location); 
	 			$lookbook->setUserDomainInfo();
	 			$lookbook->setInvitedStatus(); 
	 			$lookbook->setUserInformation();
	 			

 
				echo "  $i .)";   
				echo '<br> Full Name:  ' . $lookbook->getFullName();
				echo '<br> Invited Status:  ' . $lookbook->getInvitedStatus();
				echo "<h3> ready to save information bellow </h3>";  
				print_r($lookbook->getUserInformation());    

			 	//start the validation 
				$isPassed = $lookbook->setValidateUserInformation($lookbook->usernames[$i] , $lookbook->descriptions[$i] , $totalScore , $overallScore , $passingScore , $minimumLookInTwoMonths , $minimumHypedInTwoMonths , $minimumCommentMadeInTwoMonths  , $minimumFan , $minimumKarma);   

	 			// check if user passed
				if ($isPassed == TRUE) 
				{ 
					echo "<br><b> user passed </b>";  


					if ($lookbook->isUserWithEmailOrBlog() === TRUE) 
					{  
						echo "<br><b>user has email or blog</b>";	
						if (LookbookDatabase::isUserExistToFs($lookbook->getEmail() , $lookbook->getFullName()) === TRUE)
					   	{     
					   		echo "<br><b style='color:green' > user exist  id = </b>" . LookbookDatabase::getInvitedId();

						 	if (LookbookDatabase::updateInvitedUser($lookbook->getUserInformation() , 'invited_id = ' . LookbookDatabase::getInvitedId())) 
						 	{
						 		echo "<br><b>user updated</b>";
						 	}
						 	else
						 	{
						 		echo "<br><b>user not updated</b>";
						 	} 
					   		#Log::setExecutionLog('Info exist and invited_id = ' . LookbookDatabase::getInvitedId());  
					   	}   
					   	else
					   	{      
					  		echo "<br><b style='color:yellow' > user didnt exist</b>";
					   		#Log::setExecutionLog('Info exist and  validate new info');    
		  
						 	if (LookbookDatabase::addInvitedUser($lookbook->getUserInformation())) 
						 	{
						 		echo "<br><b>user Inserted</b>";
						 	}
						 	else
						 	{
						 		echo "<br><b>user not Inserted</b>";
						 	}   
					   	}
					}
					else
					{
						echo "<br><b>user do not have email or blog</b>";
					}
		   		}
				else
				{ 
					echo "<br><b> user didn't passed </b>";
					#Log::setExecutionLog('User dosnt passed the qualification');     						
				} 
				echo '<br> EXUCUTION LOG: ' . Log::getExecutionLog();
	 			echo '<br> Passing Score:  ' . $lookbook->getPassingScore(); 
				echo '<br> Total Score: ' . $lookbook->getTotalScore(); 
				echo '<br> pass or not: ' . $lookbook->isUserPassedQualification(); 
				echo '<br> Over all Score:  ' . $lookbook->getOverAll();
				echo '<br> Profile url Look tab:  ' . $lookbook->getUserProfileUrlLookTab();
				echo '<br> Email:  ' . $lookbook->getEmail();
				echo '<br> Full Name:  ' . $lookbook->getFullName();
				echo '<br> Time Zone:  ' . $lookbook->getTimeZone();
				echo '<br> User Domain:  ' . $lookbook->getUserDomainInfo(); 
				echo '<br> description:  ' . $lookbook->description[$i]; 
				echo "<hr><hr><hr><hr><hr><hr><hr><hr><hr>";  
			} 
			$counter++;
		} 
	} 
	public function updateScrapedTimeSend($dateTime , $invitedIds)
	{ 
	 
	 	return LookbookDataBase::updateScrapedTimeSendDb($dateTime , $invitedIds);
	}  
	public static function emailInvitationClickedSaveActivityAndRedirectLocation($defaultLink, $action, $redirect, $to, $subject, $body, $from, $title, $qid, $email)
	{

        echo "emailInvitationClickedSaveActivityAndRedirectLocation($defaultLink, $action, $redirect, $to, $subject, $body, $from, $title, $qid)";
        // $bool = FALSE;
		if(Email::setLink($action, $email, $defaultLink, $qid))
		{
            if(LookbookDatabase::emailSaveAction($action,  $qid))
			{ 
				echo "<br>successfully added activity";

				if (Email::sendToEmail($to, $subject, $body, $from, $title)) 
				{ 
					echo "<br>Notification Email Success to send to admin";
					$bool = TRUE;
				}
				else
				{ 
					echo "<br>Notification Email failled to send to admin";
				}
			}
			else
			{  
				echo "<br>failled added activity";
			} 
		}  
		else
		{ 
			echo "<br>failled set link ";
		}
		echo 'Redired = ' . Email::getLink();    

		if ($redirect == TRUE) 
		{  
            JS::redirect(Email::getLink());
            echo "\nRedirect";
		}
		else
		{  
			return $bool;
			echo '<br>Redirect disabled';
		}    
	} 
}