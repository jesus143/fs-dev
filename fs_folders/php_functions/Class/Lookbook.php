<?php  
/**
* created dec 20, 2014
*/
 
class Lookbook extends LookBookExted
{  
	
	public $bool = FALSE;
	public $errorLog = NULL;
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
	public $totalHyped = 0; 
	public $totalKarma = 0;
	public $recentLookPostedStatus = array();
	public $userDomainInfo = '';
	public $email = '';
	public $lastMonthUploadLook = ''; 
	public $totalDaysPassed = 0;   
	public $timeZoneUrl = ''; 
	public $timeZone = ''; 
	public $totalMonthPassed = 0;  
	public $descriptions = array(); 
	public $description = '';  
	public $usernames = array();
	public $username = ''; 
	public $profileUrlLookTab = '';
	public $profileUrlCommentTab = ''; 
	public $profileUrlLookTabHyped = '';
	public $topCityList = array();
	public $totalHypeEachLook = 0; 
	public $previousDate = '';
	public $counter = 0; 
	public $validationUserTotalScore = 0;
	public $overallScore = 0;
	public $passingScore = 0;
	public $statusIfUserInfoPassOrNot = 0;
	public $executionMessage = '';
	public $validationPassingScore = 0;  
	public $postedLooksInTwoMonths = array();
	public $postedHypedInTwoMonths = array();
	public $postedCommentMadeInTwoMonths = array();
	public $fullName = ''; 
	public $userInformation = array();
	public $location = '';
	public $invitedStatus = 0;


 
	public function __construct()
	{    

		// echo '<br> Lookbook start';
	}    
	public function setValidateUserInformation($userName , $userDescription , $totalScore , $overallScore , $passingScore ,
		$minimumLookInTwoMonths , $minimumHypedInTwoMonths , $minimumCommentMadeInTwoMonths  , $minimumFan , $minimumKarma)
	{ 
	   	/**
	   	* ALGORITHM: 
	   	* member that leaves in the top cities 
	   	* member who has posted 4 or more looks in (2) moths or (2) looks in 1 month (total look each month = total look / total month)
	   	* member has atleast 10 fans 
	   	* member has atleast 10 karma each look (each look karma = total karma / total look)
	   	* member has more than 100 hyped in t months ( total hyped per month (16.6 or 16) = total hyped / total months after joined)
	   	* member has more than 100 comment made in 6 months ( total comment made per month (16.6 or 16) = total comment made / total months after joined) 
	   	*/
			  
	
		// set date joined 
		if ($this->setDateJoined() == TRUE)
		{     
			if (($this->getEmail() !== NULL) || ($this->getUserDomainInfo() !== NULL))
			{ 	
 
				// initialized data
			   	$totalPostedLookInTwoMonths  = $this->getPostedLookInTwoMonthsTotal();  //$this->getTotalLookEachMonth($this->getTotalLook() , $this->getTotalMonthsPassedAfterDateJoined());  
			   	$totalFan 				     = $this->getTotalFan();
			   	$totalKarmaEachMonth         = $this->getTotalKarmaEachMonth($this->getTotalKarma() , $this->getTotalMonthsPassedAfterDateJoined()); 
			   	$totalHypedInTwoMonths 	     = $this->getPostedHypedInTwoMonthsTotal();
			   	$totalCommentMadeInTwoMonths = $this->getPostedCommentMadeInTwoMonthsTotal();  

			   	// execute validation of the user information 
			   	return $this->executeValidationUserInformation( 
			   		$totalPostedLookInTwoMonths , $minimumLookInTwoMonths ,
			   		$totalFan , $minimumFan	,
			   		$totalKarmaEachMonth , $minimumKarma ,
					$totalHypedInTwoMonths , $minimumHypedInTwoMonths ,
					$totalCommentMadeInTwoMonths , $minimumCommentMadeInTwoMonths , 
					$overallScore , $passingScore , $totalScore 
			   	);   
			}
			else
			{ 
				#Log::setExecutionLog('User don\'t have email or domain: email = ' . $this->getEmail() . ' domain = ' .  $this->getUserDomainInfo());   
			}  
		}
	}  
	public function serverSaveTime($dateTime , $invitedIds , $database)
	{  

		$bool = true;
	    $dateTime = (!empty($dateTime)) ? $dateTime : 0 ; 
	    $invitedIds = (!empty($invitedIds)) ? $invitedIds : 0 ;  
	    $invitedIdsArray = explode(',',  $invitedIds); 
	    foreach ($invitedIdsArray as $key => $invitedId) 
	    { 
	    	if ($database->update(
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
	public function printScrapperMenu($sc , $mc , $location , $invited_status , $totalApprovedEmail, $invited1,  $database)
	{

        $invited1->_setInvitedTotals($database);
        /*
        echo
            'total pending ' . $invited1->getTotalPending_() . "\n" .
            'official signup ' . $invited1->getTotalOfficialSignUp_() . "\n" .
            'official member' . $invited1->getTotalOfficialMember_() . "\n" .
            'pending signup' . $invited1->getTotalPendingSignUp_() . "\n" .
            'send sent' . $invited1->getTotalSendSent_() . "\n"
        ;
        */

        // $total = $sc->get_total_results_invitedstatus();//get total results of the invited_status
		$topCity = $this->getTopCityArray();// get top city 	
		// $location = 'NEW YORK'; // sorting of the location
		// $invited_status = '0'; // pending

        $invited  = Database::selectV1('fs_invited' , '*' , "location = '$location' and invited_Status = 1 ORDER BY invited_id DESC limit 1");

        // print_r($invited);


        $DateTimeSend  = (!empty($invited[0]['DateTimeSend']))? $invited[0]['DateTimeSend'] : '';
        $DateTimeSend1 = (!empty($invited[0]['DateTimeSend1']))? $invited[0]['DateTimeSend1'] : '';
        $DateTimeSend2 = (!empty($invited[0]['DateTimeSend2']))? $invited[0]['DateTimeSend2'] : '';

        $this->setTimeZone($location);
		Time::setTimeZoneDateTime($this->getTimeZone()); // initialized timezone
		$totalEmailAllowed = 200; 
		$totalAvailable = $totalEmailAllowed - $totalApprovedEmail;

        ?>
		<tr> 
	      	<td>

                <!--
                    0 - pending
                    12 - Send / Sent
                    7 - Pending Sign Up
                    2 - Official Sign Up
                    3 - Official Member
                -->

		        <select onchange="invited_person ( 'invited-person' , 'change-content' , '' , '#invited-people-sort' )" id='invited-people-sort' style='padding:10px;' >

                    <!-- 0 - pending -->
                    <?php if ($invited_status == 0):?>
                        <option value='0'  selected="selected" > pending (<?php echo $invited1->getTotalPending_(); ?>)</option>
                    <?php else: ?>
                        <option value='0' > pending (<?php echo  $invited1->getTotalPending_(); ?>)</option>
                    <?php endif;?>

                    <!-- 12 - Send / Sent -->
                    <?php if ($invited_status == 12):?>
                        <option value='12'  selected="selected" > Send / Sent (<?php echo $invited1->getTotalSendSent_(); ?>)</option>
                    <?php else: ?>
                        <option value='12' >  Send / Sent (<?php echo $invited1->getTotalSendSent_(); ?>)</option>
                    <?php endif;?>

                    <!-- 7 - Pending Sign Up -->
                    <?php if ($invited_status == 7):?>
                        <option value='7'  selected="selected" > Pending Sign Up (<?php echo  $invited1->getTotalPendingSignUp_(); ?>)</option>
                    <?php else: ?>
                        <option value='7' > Pending Sign Up (<?php echo  $invited1->getTotalPendingSignUp_(); ?>)</option>
                    <?php endif;?>

                    <!-- 2 - Official Sign Up -->
                    <?php if ($invited_status == 2):?>
                        <option value='2'  selected="selected" > Official Sign Up (<?php echo  $invited1->getTotalOfficialSignUp_(); ?>)</option>
                    <?php else: ?>
                        <option value='2' > Official Sign Up (<?php echo  $invited1->getTotalOfficialSignUp_(); ?>)</option>
                    <?php endif;?>

                    <!-- 3 - Official Member -->
                    <?php if ($invited_status == 3):?>
                        <option value='3'  selected="selected" > Official Member (<?php echo $invited1->getTotalOfficialMember_(); ?>)</option>
                    <?php else: ?>
                        <option value='3' > Official Member (<?php echo $invited1->getTotalOfficialMember_(); ?>)</option>
                    <?php endif;?>


                    <!-- 4 deleted !-->
                    <?php if ($invited_status == 4):?>
                        <option value='4'  selected="selected" >Deleted (<?php echo $invited1->getTotalDeleted_(); ?>)</option>
                    <?php else: ?>
                        <option value='4' > Deleted (<?php echo $invited1->getTotalDeleted_(); ?>)</option>
                    <?php endif;?>





















                    <!--
                        <?php if ($invited_status == 0):?>
                            <option value='0'  selected="selected" > pending (<?php echo $total['tPending'] ?>)</option>
                        <?php else: ?>
                            <option value='0' > pending (<?php echo $total['tPending'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 1):?>
                            <option value='1'  selected="selected" >approved (<?php echo $total['tApproved'] ?>)</option>
                        <?php else: ?>
                            <option value='1' > approved (<?php echo $total['tApproved'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 5):?>
                            <option value='5'  selected="selected" >need personal invite(<?php echo $total['tNeedPersonalInvite'] ?>)</option>
                        <?php else: ?>
                            <option value='5' > need personal invite(<?php echo $total['tNeedPersonalInvite'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 2):?>
                            <option value='2'  selected="selected" >sign-up (<?php echo $total['tSignup'] ?>)</option>
                        <?php else: ?>
                            <option value='2' > sign-up (<?php echo $total['tSignup'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 3):?>
                            <option value='3'  selected="selected" >officially (<?php echo $total['tOfficiallyMember'] ?>)</option>
                        <?php else: ?>
                            <option value='3' > officially (<?php echo $total['tOfficiallyMember'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 4):?>
                            <option value='4'  selected="selected" > deleted (<?php echo $total['tDeleted'] ?>)</option>
                        <?php else: ?>
                            <option value='4' > deleted (<?php echo $total['tDeleted'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 6):?>
                            <option value='6'  selected="selected" > pending but no email (<?php echo $total['tPendingButNoEmail'] ?>)</option>
                        <?php else: ?>
                            <option value='6' > pending but no email (<?php echo $total['tPendingButNoEmail'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 7):?>
                            <option value='7'  selected="selected" > signup from pending (<?php echo $total['tSignUpPending'] ?>)</option>
                        <?php else: ?>
                            <option value='7' > signup from pending (<?php echo $total['tSignUpPending'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 8):?>
                            <option value='8'  selected="selected" > signup anonymous people(<?php echo $total['tSignUpAnonymous'] ?>)</option>
                        <?php else: ?>
                            <option value='8' > signup anonymous people (<?php echo $total['tSignUpAnonymous'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 9):?>
                            <option value='9'  selected="selected" > signup refferal (<?php echo $total['tSignUpReferral'] ?>)</option>
                        <?php else: ?>
                            <option value='9' > signup refferal (<?php echo $total['tSignUpReferral'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 10):?>
                            <option value='10'  selected="selected" > signup from deleted (<?php echo $total['tSignUpDeleted'] ?>)</option>
                        <?php else: ?>
                            <option value='10' > signup from deleted (<?php echo $total['tSignUpDeleted'] ?>)</option>
                        <?php endif;?>

                        <?php if ($invited_status == 11):?>
                            <option value='11'  selected="selected" > signup from personal invited(<?php echo $total['tSignUpPersonalInvite'] ?>)</option>
                        <?php else: ?>
                            <option value='11' > signup from personal invited(<?php echo $total['tSignUpPersonalInvite'] ?>)</option>
                        <?php endif;?>
                        -->
		        </select>  
	      	</td>  
	     	<td style="width:10" >  
	        	<?php $mc->image( array( 'type'=>'loader' , 'id'=>'invited-people-sort-loader' ,'style'=>'visibility:hidden;height:10px;' ) ); ?>    
	      	</td>




	      	<td> 
		        <select onchange="invited_person ( 'invited-person' , 'change-content' , '' , '#invited-people-sort' )" id='invited-people-sort-location' >  
		        	<option value="LOCATION" >LOCATION</option>  
		   			<?php  
  						$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as total , location', 'where'=>"invited_status = $invited_status GROUP BY location" ) );
 
  						for ($i=0; $i <count($response) ; $i++) 
  						{ 
  							$locationDb = $response[$i]['location'];
  							$totalDb    = $response[$i]['total'];
  							if ($location == $locationDb) 
			                {
			                 	 echo "<option value= '$locationDb' selected=\"selected\">$locationDb($totalDb)</option>";  
			                }
			                else
			                {
			                	echo "<option value= '$locationDb' >$locationDb($totalDb)</option>";  
			                } 	 
  						}  
		   			?> 
		        </select>
	      	</td>
        <!--
	      	<td>  
	        	<div>
	        	<?php 
	        		 echo " " . Time::getTimeZoneDateTime12() . '  ' . $this->getTimeZone();
		        	?>
	        	</div> 
	   		</td>
        <td>
            <select onchange="setTimeInviteTime('<?php echo date('Y-m-d'); ?>' , this, 'dateTime', '', '<?php echo $location; ?>', '<?php echo $this->getTimeZone(); ?>' )" >
                <option value="Time"  >TIME</option>
                <?php foreach (Time::getTimeDbFormatArray() as $key => $value) { echo  '<option value=' . $key . '>' . $value . '</option>'; } ?>
            </select>
            <?php echo "<br>" . Time::convertTimeToReadableDate($DateTimeSend); ?>
        </td>
        <td>
            <select onchange="setTimeInviteTime('<?php echo date('Y-m-d'); ?>' , this, 'time', 'DateTimeSend1','<?php echo $location; ?>', '<?php echo $this->getTimeZone(); ?>')" >
                <option value="Time"  >TIME</option>
                <?php foreach (Time::getTimeDbFormatArray() as $key => $value) { echo  '<option value=' . $key . '>' . $value . '</option>'; } ?>
            </select>
            <?php echo "<br>" . Time::convertTimeToReadableDate($DateTimeSend1); ?>
        </td>
        <td>
            <select onchange="setTimeInviteTime('<?php echo date('Y-m-d'); ?>' , this, 'time', 'DateTimeSend2', '<?php echo $location; ?>', '<?php echo $this->getTimeZone(); ?>')" >
                <option value="Time"  >TIME</option>
                <?php foreach (Time::getTimeDbFormatArray() as $key => $value) { echo  '<option value=' . $key . '>' . $value . '</option>'; } ?>
            </select>
            <?php  echo "<br>" . Time::convertTimeToReadableDate($DateTimeSend2); ?>
        </td>
        <td>
	           	<div><?php echo $totalAvailable; ?> emails available</div>  
	      	</td>



        -->
	      	<td>
	        	<input class="btn btn-lg btn-danger" type="button" onclick="fs_popup( 'popup-small' , 'invited-person' , '' , 'method' , 'table_id' , 'table_name' )" value="add new" >               
	      </td>  
	  <?php 
	} 
	public function printContainerAndViewMore($mc)
	{ ?>
		      <tr>  
		        <td>   
		          <div id="invited-people-menu" > 
		          </div>
		          <div class="table-responsive">       
		            <table class="table table-striped table-bordered"  id="invited-container-response"  >    
		            </table>  
		          </div>
		          <table>
		            <tr> 
		              <td> 
		                <input id="view-more-invited" type="button" value="view more"  onclick="invited_person ( 'invited-person' , 'view-more' , '' , '#invited-people-sort' )"  />
		              </td>
		              <td> 
		                <?php $mc->image( array( 'type'=>'loader' , 'id'=>'view-more-invited-loader' ,'style'=>'visibility:hidden;height:10px;' ) ); ?>
		              </td>
		          </table> 
		        </td> <?php 
	} 
	public function printDisplayResultFromServer($style)
	{?> 
	  <div id="response-here" style='<?php echo $style; ?>' >
	    respons here
	  </div>    <?php 
		# code...
	}

	function sendInvitationToInvitedEmail($invitedInformation , $sc , $mc)
	{   
 
		$totalDaysAllowedMax  = 3;  // when the days passed by 3 days then the system will send an invite to the specific emails  
 		$totalTimeAllowedMax  = 0;  // when hours come and it should send if the hours remaining is between 2 - 0. 
		$totalTimeAllowedMin  = 0;  // when hours come and it should send if the hours remaining is between 2 - 0. 
		$subject              = 'An Invitation to Share Your Blog Content on Fashion Sponge'; // title of the invite email
      	$from    			  = 'mauricio@fashionsponge.com'; //sender of the invite email
      	$type    			  = 'invitations';  //email type dont change it
      	$totalEmailSentMLimit = 3; //after 3 then the invited person should go to personal invite
      	$counter              = 0;

  		$firstSentEmailTotalEmailSent = 0; // set zero because if total email sent is zero then that is first time of sending the invitation
		$firstSentEmailTotalDays = 1; // set 1 because if the days passed is 1 day then the invitation email sent for the first time
		$firstSentEmailTotalTime = 0; // set zero because if the time is zero like 8:00 = 8:00 the and day is 1 then email will be sent for the first time.

		for ($i=0; $i <count($invitedInformation); $i++) 
		{  
			//initialized data
			$counter++;
			$invited_id     = $invitedInformation[$i]['invited_id'];   
			$invited_email  = $invitedInformation[$i]['invited_email'];    
			$invited_fn     = $invitedInformation[$i]['invited_fn']; 
			$DateTimeSend   = $invitedInformation[$i]['DateTimeSend'];   
			$timezoneUrl    = $invitedInformation[$i]['timezone_url'];  
			$temail_sent    = $invitedInformation[$i]['temail_sent'];  
			$invited_status = $invitedInformation[$i]['invited_status'];   
			$location       = $invitedInformation[$i]['location'];  
			$timezone       = $invitedInformation[$i]['timezone'];  
 			
 			//notification send to admin when email clicked action
		 	$action       = 'Recieved Notification';
		 	$to           = 'mrjesuserwinsuarez@gmail.com,pecotrain1@gmail.com'; 
		 	$subject1      = 'Invited person recieved email'; // 'invited person clicked the email content ' .  $action;
		 	$body         = 'Full Name: ' . $invited_fn . "\n" . 'Email: ' . $invited_email . "\n" . 'Action: ' . $action . "\n" . 'Total Email Sent ' . $temail_sent; 
		 	$from1        = $invited_email; 
		 	$title        = 'Fs Recieved Invitation'; 
		 	$defaultLink  = 'http://fashionsponge.com/';  
	 

			//get timezone date time
			//$locationDateTime  = $sc->get_time_zone_time($timezoneUrl,$mc);  
			echo " timezone = $timezone ";
			Time::setTimeZoneDateTime($timezone);   
  			
			//server time send 
			$serverDate        = Time::getDateRemoveTime($DateTimeSend);
			$serverTime        = Time::getTimeRemoveDate($DateTimeSend);

			//timezone time
			$locationDate      = Time::getTimezoneDate();//Time::getDateRemoveTime($locationDateTime);
			$locationTime      = Time::getTimeZoneTime24(); //Time::getFromTime12ToTime24(); // the set of the time is in the get_time_zone_time();
			$locationTime1     = Time::getTimeZoneTime24(); //Time::getTimeRemoveDate($locationDateTime);
 		
 			// echo " time location $locationTime <br> ";
 			// get total passed days
			$totalPassedDays   = Time::getTotalDaysPassed($serverDate , $locationDate);
	  
			//get time difference 
 			Time::setTimeDifference($serverTime , $locationTime);
 			 
 			//variables declare   
 			$this->setFirstName($invited_fn); 
 			$this->setNewTotalEmailSent($temail_sent); 

  			//validate information
			$dateTimeValidadted = $this->validateDateAndTimeToSendInvitation($totalPassedDays , $totalDaysAllowedMax , Time::getTotalHours() , $totalTimeAllowedMax , $totalTimeAllowedMin , 
				$firstSentEmailTotalEmailSent , $firstSentEmailTotalDays , $firstSentEmailTotalTime , $temail_sent);

			if ($dateTimeValidadted === TRUE) 
			{ 	 
					if($mc->send_email_signup_to_user(' '.$this->getFirstName() , $invited_email , $type , $from , $subject))
					{ 
						echo "<b><h3> SUCCESSFULLY SENT EMAIL INVITE</H3>"; 

						if(Program::emailInvitationClickedSaveActivityAndRedirectLocation($defaultLink, $action, $invited_email, FALSE, Program::$adminEmail, $subject1, $body, $from1, $title))
						{ 
							echo '<br>' . 'notification sent to Email sent to admins = ' . Program::$adminEmail . ' that new invitation sent to ' . $invited_email;
						} 
						else
						{
							echo '<br>' . '<b> failled to send notifacation to the admins  ' . Program::$adminEmail . ' that new invitation is sent to ' . $invited_email;
						}
					}  
					else
					{
						echo "<b><h3> FAILLED SENT EMAIL INVITE</H3>";
					}    
					if(LookbookDataBase::updateTimeSendAndTotalEmailSent($this->getNewTotalEmailSent() , Time::getTimeZoneDateTime24() , "invited_id = $invited_id"))
					{ 
						echo "<b><h3> LOCATION TIME AND TOTAL EMAIL SENT SUCCESSFULLY UPDATED </H3>";
					} 
					else
					{
						echo "<b><h3> LOCATION TIME AND TOTAL EMAIL SENT FAILLED SENT EMAIL INVITE</H3>";
					}    
			      	if (LookbookDataBase::ifExceedTotalSendEmailThenMovedToPersonalInvite($this->getNewTotalEmailSent() , $totalEmailSentMLimit, "invited_id = $invited_id"))
			      	{ 
						echo "<b><h3> USER SUCCESSFULLY TO MOVED PERSONAL INVITED </H3>";
					} 
					else
					{
						echo "<b><h3> USER FAILLED TO MOVED PERSONAL INVITED </H3>";
					}  
			}
			else
			{
				echo "<br> dont send invitation to email because validation of days and time is false";
				//refuse semd invitation email
			} 

			// echo " hourMinutes $hourMinutes  minutes  $minutes hours $hours"; 
			echo "<br>  	  
				number: $counter .) <br>
				ecmail with: btag $invited_email <br>
				location: $location <br>
				email: $invited_email<br>
				<b>database time </b><br>
				date: $serverDate <br>
				time: $serverTime <br>  
				<b>location</b><br>
				date: $locationDate <br>
				time: $locationTime  or  " . Time::$hour12 . "   <br>   
				<b>calculation</b><br> 
				total passed days: $totalPassedDays <br>
				total passed time: " . Time::getTotalHours()  . " <br>
			";   


			echo "<hr>";
		} 
	} 
} 