<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/26/2015
 * Time: 10:12 AM
 */
//echo "counter = " . $_GET['counter'] . "<br>";
// requires
$db = '../Database';
$time = '../Time';
$Message = '../Message';
$Admin  = '../Admin';
$Email = '../Email';

require_once "$db/Database.php";
require_once "$db/Invited.php";
require_once "$db/InvitedActivity.php";
require_once "$db/InvitedLocation.php";
require_once "$db/InvitedQueue.php";
require_once "$time/Time.php";
require_once "$Message/Alert.php";
require_once "$Admin/Admin.php";
require_once "../Email/Email.php";

//initialized
$database        = new Database();
$invited         = new Invitation\Invited();
$invitedActivity = new Invitation\InvitedActivity();
$invitedQueue    = new Invitation\InvitedQueue();
$invitedLocation = new FashionSponge\InvitedLocation();
$alert           = new Message\Alert();
$admin           = new \Administrator\Admin();

//connect
$database->connect();

//set
$invitedQueue->_setAllInvitedInTheQueueWhoWillReceiveAnInviteEmail(0, 'fs_invited_queue_id_pk desc', 200, $database);
//var_dump($invitedQueue->getAllInvitedInTheQueueWhoWillReceiveAnInviteEmail_());
$admin->_setAdminEmail('info@fashionsponge.com');

//init
$dateTime = '';
$counter = 1;

/**
 * distribute the value
 */

foreach ($invitedQueue->getAllInvitedInTheQueueWhoWillReceiveAnInviteEmail_() as $queueInvited)
{

    $qId        = $queueInvited['fs_invited_queue_id_pk'];
    $iId        = $queueInvited['fs_invited_id_fk'];
    $locationId = $queueInvited['fs_invited_location_id_fk'];
    $date1      = $queueInvited['fs_invited_queue_date_send1'];
    $date2      = $queueInvited['fs_invited_queue_date_send2'];
    $date3      = $queueInvited['fs_invited_queue_date_send3'];
    $date       = $queueInvited['fs_invited_queue_date'];
    $status     = $queueInvited['fs_invited_queue_status'];
    $action     = 'Received new invited';
    // echo  $qId . "\n";
    //set queue location info


 
    //update total sent to zero
    $alert->alert("Location Info ",
        $database->update('fs_invited', array('temail_sent'=>0), "invited_id = $iId"),
        " set  qid = $qId \n"
    ); 
    echo "$counter.) \n"; 
    $alert->alert("Location Info ",
        $invitedLocation->setInvitedLocationInfo($locationId,$database),
        " set  qid = $qId \n"
    ); 
    //set invited info
    $alert->alert("invited ",
        $invited->setInvitedInfoById($iId, $database),
        " set  iId = $iId \n"
    ); 
    echo "Name: <span style='color:green'  >" . $invited->getFullName() . "</span></span> <br>\n"; 
    echo "First name " . $invited->getFirstName();
    //set time zone
    $alert->alert("Time ",
        Time::setTimeZoneDateTime($invited->getTimeZone()),
        " set  timezone  = " . $invited->getTimeZone() . "  \n"
    ); 
    //if the total sent email is greater than 3 then it should invited email should not received an invited
    if($invited->getTotalEmailSent_() <= 2)
    { 
        //condition combine queue date and specific location time
        if($invited->getTotalEmailSent_() == 0)
        {
             $dateTime =  $date1 .' '. $invitedLocation->getLocationTime1();
             echo "send new email v1 set date\n";
        }
        elseif ($invited->getTotalEmailSent_() == 1)
        {
            $dateTime =  $date2 .' '. $invitedLocation->getLocationTime2();
            echo "send new email v2 set date\n";
        }
        elseif ($invited->getTotalEmailSent_() == 2)
        {
            $dateTime =  $date3 .' '. $invitedLocation->getLocationTime3();
            echo "send new email v3 set date\n";
        }
        else
        {
          echo "\n else no send new email total sent is greater than 2 and value i" . $invited->getTotalEmailSent_();
        } 
        $alert->alert("Date Time Send",
            $dateTime,
            " set = " . $dateTime . "  \n"
        );
        echo "set time zone = " . Time::getTimeZoneDateTime24(); 
        //send email
        if (Time::getTimeZoneDateTime24() >= $dateTime)
        { 
            $alert->alert("\nAdd activity log",
                $invitedActivity->addActivityLog($qId, $action, $database),
                "set qId = $qId , action = $action"
            );  
            echo "\n send email to invited "; 

            if(Email::sendInviteEmail($admin->getAdminEmail_(),  'mrjesuserwinsuarez@gmail.com', "Invited", $qId, $invited->getFirstName()) ) {  
                echo " email " . $invited->getEmail();
                echo "\n send email to admin";  
                $newTotalSent = $invited->getTotalEmailSent_() + 1; 
                $alert->alert("\nUpdate total send email ", $invited->updateTotalEmailSent($iId, $invited->getTotalEmailSent_() + 1, $database), "set iId = $iId and last total email sent  " . $invited->getTotalEmailSent_() . " new total email sent " . $newTotalSent
                );                 
            }
            else
            {
                echo "failed to send email " . __LINE__ ;
            }
        }
        else
        {
            echo  "<br> \n " .  __LINE__ . ". ) time zone = " . Time::getTimeZoneDateTime24() .  "  is less than with date time db " . $dateTime;
        }
    }
    else
    {
        echo "\n email will not received an invite because the totasent email is greater than 2 but " . $invited->getTotalEmailSent_();
        echo "\n update queue status to 1";
    } 
    // $database->update()
    echo "\n---------------------------------------------------------------------------------------------------\n<br>";
    $counter++;
}








