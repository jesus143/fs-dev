<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/23/2015
 * Time: 11:52 PM
 */


    require_once "../../../fs_folders/php_functions/Database/Database.php";
    require_once "../../../fs_folders/php_functions/Time/Time.php";
    require_once "../../../fs_folders/php_functions/Database/InvitedActivity.php";
    require_once "../../../fs_folders/php_functions/Database/InvitedQueue.php";
    require_once "../../../fs_folders/php_functions/Database/Invited.php";
    require_once "../../../fs_folders/php_functions/Database/InvitedLocation.php";
    require_once "../../../fs_folders/php_functions/Color/Color.php";



//InvitedLocation


    $database = new Database();
    $database->connect();

    $invitedActivity = new \Invitation\InvitedActivity();
    $invitedQueue    = new \Invitation\InvitedQueue();
    $invited         = new \Invitation\Invited();
    $invitedLocation = new \FashionSponge\InvitedLocation();
    $color           = new \Design\Color();

    $invitedActivity->setInvitedActivity(20, $database);
    $invitedUsers = $invitedActivity->getInvitedActivity();


    foreach($invitedUsers as $key => $value ):
       $id     = $value['fs_invited_activity_id_pk'];
       $qid    = $value['fs_invited_queue_id_fk'];
       $action = $value['fs_invited_activity_action'];
       $date   = $value['fs_invited_activity_date'];
       $invitedQueue->setInvitedQueueById($qid, $database);
       $invitedLocation->setInvitedLocationInfo($invitedQueue->getLocationId(), $database);
       $invited->setInvitedInfoById($invitedQueue->getInvitedId(),$database);
       echo "\n this is the invited id " . $invitedQueue->getInvitedId();
       echo "aid = $id qid = $qid action $action date $date\n";
       echo "\n This is the full name = " . $invited->getFullName();
       echo "\nlocation name - " . $invitedLocation->getLocationName();
       echo "\ncolor " . $color->ColorShuffle();
       echo "\n class " . $color->shuffleClass( array('.class1','.class2','.class3'));
       echo "Time ago " . Time::convertDateTimeToAgo($date);
    endforeach;