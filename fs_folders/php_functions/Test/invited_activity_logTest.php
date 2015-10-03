<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/23/2015
 * Time: 11:52 PM
 */




//echo " counter = " . $_GET['counter'] . "<br>\n";



require_once "../Database/Database.php";
require_once "../Time/Time.php";
require_once "../Database/InvitedActivity.php";
require_once "../Database/InvitedQueue.php";
require_once "../Database/Invited.php";
require_once "../Database/InvitedLocation.php";
require_once "../Color/Color.php";



//InvitedLocation


$database = new Database();
$database->connect();

$invitedActivity = new \Invitation\InvitedActivity();
$invitedQueue    = new \Invitation\InvitedQueue();
$invited         = new \Invitation\Invited();
$invitedLocation = new \FashionSponge\InvitedLocation();
$color           = new \Design\Color();

$invitedActivity->setInvitedActivity("fs_invited_activity_id_pk > 0 order by fs_invited_activity_id_pk desc limit 20", $database);
$invitedUsers = $invitedActivity->getInvitedActivity();
?>





<!DOCTYPE html>
<html>
<head lang="en">

    <!--header meta for responsive mobile-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--css -->

    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap-theme.css" >
    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../../../fs_folders/Assets/css/bootstrap.css" >
    <script src="../../../fs_folders/Assets/js/jquery-1.11.2.js" ></script>
    <script src="../../../fs_folders/Assets/js/bootstrap.min.js" ></script>
    <script src="../../../fs_folders/Assets/js/javascript.js" ></script>
    <script src="../../../fs_folders/Assets/js/jquery.js" ></script>
    <link rel="stylesheet" href="../../../fs_folders/Assets/css/style.css" >
    <script src="../../../fs_folders/js/function_js.js" ></script>
    <script src="../../../fs_folders/js/Scrape.js" ></script>

    <title> Location </title>
</head>
<body>
<!--<div class="container">-->
    <ul class="list-group">
        <?php
        foreach($invitedUsers as $key => $value ):
            $id     = $value['fs_invited_activity_id_pk'];
            $qid    = $value['fs_invited_queue_id_fk'];
            $action = $value['fs_invited_activity_action'];
            $date   = $value['fs_invited_activity_date'];
            $invitedQueue->setInvitedQueueById($qid, $database);
            $invitedLocation->setInvitedLocationInfo($invitedQueue->getLocationId(), $database);
            $invited->setInvitedInfoById($invitedQueue->getInvitedId(),$database);  ?>

            <li style="width:100%" class="list-group-item <?php echo $color->shuffleClass( array('list-group-item-success', 'list-group-item-info','list-group-item-warning')); ?>" >
                <strong><?php echo $invited->getFullName();  ?></strong> From <strong><?php echo $invitedLocation->getLocationName(); ?></strong> <em><?php echo $action; ?></em> at <strong><?php echo Time::convertDateTimeToAgo($date); ?></strong>
            </li>

        <?php endforeach; ?>
    </ul>
<!--</div>-->
</body>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</html>