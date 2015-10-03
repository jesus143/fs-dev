<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/26/2015
 * Time: 10:12 AM
 */
echo "counter = " . $_GET['counter'] . "<br>";
// requires
$db = '../../../fs_folders/php_functions/Database';
$time = '../../../fs_folders/php_functions/Time';
$Message = '../../../fs_folders/php_functions/Message';
$Admin  = '../../../fs_folders/php_functions/Admin';
$Email = '../../../fs_folders/php_functions/Email';

require_once "$db/Database.php";
require_once "$db/Invited.php";
require_once "$db/InvitedActivity.php";
require_once "$db/InvitedLocation.php";
require_once "$db/InvitedQueue.php";
require_once "$time/Time.php";
require_once "$Message/Alert.php";
require_once "$Admin/Admin.php";
require_once "$Email/Email.php";

//initialized
$database        = new Database();
$invited         = new Invitation\Invited();
$invitedActivity = new Invitation\InvitedActivity();
$invitedQueue    = new Invitation\InvitedQueue();
$invitedLocation = new FashionSponge\InvitedLocation();
$alert           = new Message\Alert();
$admin           = new \Administrator\Admin();
$email           = new Email();


//connect
$database->connect();

//set
$invitedQueue->_setAllInvitedInTheQueueWhoWillReceiveAnInviteEmail(0, 'fs_invited_queue_id_pk desc', 200, $database);
//var_dump($invitedQueue->getAllInvitedInTheQueueWhoWillReceiveAnInviteEmail_());
$admin->_setAdminEmail('info@fashionsponge.com');

//init
$dateTime = '';
$counter = 1;
$sendOne = 0;




/**
 * distribute the value
 */

foreach ($invitedQueue->getAllInvitedInTheQueueWhoWillReceiveAnInviteEmail_() as $queueInvited)
{

    if($counter <= $sendOne)
    {

        $qId = $queueInvited['fs_invited_queue_id_pk'];
        $iId = $queueInvited['fs_invited_id_fk'];
        $locationId = $queueInvited['fs_invited_location_id_fk'];
        $date1 = $queueInvited['fs_invited_queue_date_send1'];
        $date2 = $queueInvited['fs_invited_queue_date_send2'];
        $date3 = $queueInvited['fs_invited_queue_date_send3'];
        $date = $queueInvited['fs_invited_queue_date'];
        $status = $queueInvited['fs_invited_queue_status'];
        $action = $invitedActivity->getMessageReceivedInvite();
        $invited->setInvitedInfoById($iId, $database);
        // echo  $qId . "\n";
        //set queue location info

        echo "Name: <span style='color:green'  >" . $invited->getFullName() . "</span></span> <br>\n";


        //update total sent to zero
        /*
            $alert->alert("Location Info ",
                $database->update('fs_invited', array('temail_sent' => 0), "invited_id = $iId"),
                " set  qid = $qId \n"
            );
        */
 			if($invited->getTotalEmailSent_() == 1)
            {
            	//send email version1
            	echo("email send v1 \n<br>");
			}
            elseif ($invited->getTotalEmailSent_() == 2)
            {
				//send email version2
				echo("email send v2 \n<br>");
			}
            elseif($invited->getTotalEmailSent_() == 3)
            {
				//send email version3
				echo("email send v3 \n<br>");
			}
            else
            {
				echo("Error\n<br>");
			}
        echo "$counter.) \n";

        $alert->alert("Location Info ",
            $invitedLocation->setInvitedLocationInfo($locationId, $database),
            " set  qid = $qId  <br>\n"
        );

        //set invited info
        $alert->alert("invited ",
            $invited->setInvitedInfoById($iId, $database),
            " set  iId = $iId <br>\n"
        );

        //set time zone
        $alert->alert("Time ",
            Time::setTimeZoneDateTime($invited->getTimeZone()),
            " set  timezone  = " . $invited->getTimeZone() . "  <br>\n"
        );

        //if the total sent email is greater than 3 then it should invited email should not received an invited
        if ($invited->getTotalEmailSent_() <= 2)
        {
            //condition combine queue date and specific location time
            if ($invited->getTotalEmailSent_() == 0)
            {
                $dateTime = $date1 . ' ' . $invitedLocation->getLocationTime1();
                echo "send new email v1 set date <br>\n"; 
            }
            elseif ($invited->getTotalEmailSent_() == 1)
            {
                $dateTime = $date2 . ' ' . $invitedLocation->getLocationTime2();
                echo "send new email v2 set date <br>\n";
            }
            elseif ($invited->getTotalEmailSent_() == 2)
            {
                $dateTime = $date3 . ' ' . $invitedLocation->getLocationTime3();
                echo "send new email v3 set date <br>\n";
            }
            else
            {
                echo "\n else no send new email total sent is greater than 2 and value i" . $invited->getTotalEmailSent_(); 
            } 
            
            $alert->alert("Date Time Send", $dateTime, " set = " . $dateTime . "  <br>\n" ); 
            echo "set time zone = " . Time::getTimeZoneDateTime24(); 
            //send email
             
            //email version of sending
            if (Time::getTimeZoneDateTime24() >= $dateTime)
            {
            	$alert->alert("\nAdd activity log", $invitedActivity->addActivityLog($qId, $action, $database), "set qId = $qId , action = $action"); 
                echo "\n send email to invited <br>\n";

                if (Email::sendInviteEmail3($admin->getAdminEmail_(), $invited->getEmail(), $email->inviteSubject1($invited->getTotalEmailSent_()), $qId, $invited->getTotalEmailSent_(), $invited->getFirstName()))
                {
                    echo " email " . $invited->getEmail();
                    echo "\n send email to admin"; 
                    $newTotalSent = $invited->getTotalEmailSent_() + 1;
                    $alert->alert("\nUpdate total send email ", $invited->updateTotalEmailSent($iId, $invited->getTotalEmailSent_() + 1, $database), "set iId = $iId and last total email sent  " . $invited->getTotalEmailSent_() . " new total email sent " . $newTotalSent);
                }
                else
                {
                    echo "failed to send email<br>\n";
                }
            }
            else
            {
                echo  "<br> \n " .  __LINE__ . ". ) time zone = " . Time::getTimeZoneDateTime24() .  "  < " . $dateTime;
                echo "<br>\n Email = " .  $invited->getEmail();
            }
        }
        else
        {

            echo "\n email will not received an invite because the totasent email is greater than 2 but " . $invited->getTotalEmailSent_();
            echo "\n update queue status to 1";

            if ($invitedQueue->updateQueueStatus($qId, 1, $database) == TRUE)
            {
                echo "Email successfully update to queue.satatus = 1<br>";
            }
            else
            {
                echo "Email Failed update to queue.satatus = 1 <br>";
            }

        } 
        //    $database->update() 
        echo "<br>\n---------------------------------------------------------------------------------------------------\n<br>";
        $counter++;
    }
}








