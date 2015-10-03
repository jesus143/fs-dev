<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 12/02/2015
 * Time: 2:56 PM
 */



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





$response = $database->selectV1('fs_invited', 'distinct city', 'invited_id > 0');

echo "<pre>";
    print_r($response);
echo "<pre>";

















