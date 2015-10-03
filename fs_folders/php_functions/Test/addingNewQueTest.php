<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/24/2015
 * Time: 9:16 PM
 */

/**
 * function
 * Detect how many lacking to the queue
 * auto get the people in the invited table
 * add new invited to the queue
 * only get invited when pending and with email
 * generate the 3 date sends the date1, date2, date3 in for the queue
 * detect if the invited_id is already exist in the invited_qeueu
 * only get new invited if the queue is lacking and needed new invited
 */

/**
 * issue:
 * problem of the distribution of the query because its possible that the last query will be less in value
 * so the result will be not enough
 */

//echo "counter = " . $_GET['counter']  . "<br>";

// requires
$db = '../Database';
$time = '../Time';
require_once "$db/Database.php";
require_once "$db/Invited.php";
require_once "$db/InvitedActivity.php";
require_once "$db/InvitedLocation.php";
require_once "$db/InvitedQueue.php";
require_once "$time/Time.php";

//initialized
$database        = new Database();
$invited         = new Invitation\Invited();
$invitedActivity = new Invitation\InvitedActivity();
$invitedQueue    = new Invitation\InvitedQueue();
$invitedLocation = new FashionSponge\InvitedLocation();

//connect
$database->connect();




//get total lacking invited to in queue
$totalLackingInTheQueue = $invitedQueue->getTotalLackingInTheQueue(200, $database);

echo " Total invited needs to be in the queue is =  " . $totalLackingInTheQueue . "<br> \n <hr>" ;
echo " Total waiting queueing are " . $invitedQueue->getTotalQueueing($database) . "<br> \n";
echo " Total waiting queued are " . $invitedQueue->getTotalQueued($database) . "<br> \n";







//set and get the new invited in the queue
// $invited->setInvitedForTheQueue($totalLackingInTheQueue, $database, $invited);
$invited->_setInvitedForTheQueueRandom($totalLackingInTheQueue, $database);

/**
 * print the status of getting the location invited
 * print_r($invited->getInvitedForTheQueue());
 */
echo "\n\n\nPlaces query status to get the different location \n";
foreach ($invited->getInvitedForTheQueue() as $invite=> $value)
{
    $iId       = $value['invited_id'];
    $tz        = $value['timezone'];
    $location  = $value['location'];
    echo "tz = $tz iId = $iId location = $location \n";
}
/**
 * inserting the new invited into the queue
 */
// 3dimensional array
echo "\n\n\ninvited_id is exist to the invited_queue\n";
foreach ($invited->getInvitedForTheQueue() as $invite=> $value)
{

    $iId       = $value['invited_id'];
    $tz        = $value['timezone'];
    $location  = $value['location'];

    if($invitedQueue->isInvitedIdExistToTheQueue($iId, $database) == FALSE)
    {
        echo " = not exist <br>\n";
        if(!empty($tz))
        {
            //set and get the time plus days
            $invitedLocation->__setLocationByName($location, $database);
            Time::setTimeZoneDateTime($tz);
            Time::__setDateAddDays(Time::getTimezoneDate(), "+ 1 day");
            $date1 = Time:: getDateAddDays__();
            Time::__setDateAddDays(Time::getTimezoneDate(), "+ 3 days");
            $date2 = Time:: getDateAddDays__();
            Time::__setDateAddDays(Time::getTimezoneDate(), "+ 5 days");
            $date3 = Time:: getDateAddDays__();

            echo "\n date1  $date1 , date2  $date2, date3 $date3 <br>\n";

            //insert new queue invited_id, location_id, date1, date2 and date3
            if ($invitedQueue->addInvitedToTheQueue($iId, $invitedLocation->getLocationId(), $date1, $date2, $date3, $database))
            {
                echo "fs_invited_id_fk = $iId updated <br>\n";
                if($database->update('fs_invited', array('invited_status'=>12), "invited_id = $iId"))
                {
                    //set value to get the qid
                    $invitedQueue->setInvitedQueueByIid($iId, $database);
                    echo "Successfully updated invited_status = 12 <br>\n";
                    if($invitedActivity->addActivityLog($invitedQueue->getQid(), "Added to queue", $database))
                    {
                        echo "successfully added new activity log <br>\n";
                    }
                }
            }
            else
            {
                echo "fs_invited_id_fk = $iId failed to add <br>\n";
            }
        }
        else
        {

            // UPDATE LOCATION TO DEFAILT New York
            // UPDATE TIMEZONE EST

            echo "\n timezone is empty not added <br>\n";


            $response = $invited->updateLocationAndTimeZone('NEW YORK', 'EST', $iId, $database);

            if($response) {
                echo " location = NEW YORK and timezone = EST updated iId = $iId <br>\n";
            } else {
                echo " location = NEW YORK and timezone = EST failed  iId = $iId <br>\n";
            }

            //update($table,$params=array(),$where)
        }
    }
    else
    {
        echo " = exist <br>\n";
    }
}