<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 04/02/2015
 * Time: 5:04 PM
 */



require_once "../../../fs_folders/php_functions/Database/Database.php";
require_once "../../../fs_folders/php_functions/Time/Time.php";
require_once "../../../fs_folders/php_functions/Database/InvitedActivity.php";
require_once "../../../fs_folders/php_functions/Database/InvitedQueue.php";
require_once "../../../fs_folders/php_functions/Database/Invited.php";
require_once "../../../fs_folders/php_functions/Database/InvitedLocation.php";
require_once "../../../fs_folders/php_functions/Color/Color.php";
require_once "../../../fs_folders/php_functions/Calculation/Calculation.php";


// initialized
$action = $_GET['action'];
$showMore = $_GET['showMore'];
$showMore1 = $showMore + 1;
$limit = 10;

//InvitedLocation
$database = new Database();
$database->connect();

$invitedActivity = new \Invitation\InvitedActivity();
$invitedQueue    = new \Invitation\InvitedQueue();
$invited         = new \Invitation\Invited();
$invitedLocation = new \FashionSponge\InvitedLocation();
$color           = new \Design\Color();
$calculation     = new \Helper\Calculation();



$calculation->__setLimitStartEnd($showMore, $limit);
$invitedActivity->setInvitedActivity("fs_invited_activity_action LIKE '%$action%' order by fs_invited_activity_id_pk desc limit " . $calculation->getLimitStart__() . ", " .  $calculation->getLimitEnd__(), $database);
$invitedUsers = $invitedActivity->getInvitedActivity();


?>

<content>
    <ul class="list-group">
        <?php


          //  echo " start " . $calculation->getLimitStart__();
           // echo " end " . $calculation->getLimitEnd__();


            $classColor = '';
            foreach($invitedUsers as $key => $value ):
                $id     = $value['fs_invited_activity_id_pk'];
                $qid    = $value['fs_invited_queue_id_fk'];
                $action = $value['fs_invited_activity_action'];
                $date   = $value['fs_invited_activity_date'];
                $invitedQueue->setInvitedQueueById($qid, $database);
                $invitedLocation->setInvitedLocationInfo($invitedQueue->getLocationId(), $database);
                $invited->setInvitedInfoById($invitedQueue->getInvitedId(),$database);
                $color->_setClassColor($action); ?>

                <li style="width:100%" class="list-group-item <?php echo $color->getClassColor_($action); ?>" >
                    <strong><?php echo $invited->getFullName();  ?></strong> From <strong><?php echo $invitedLocation->getLocationName(); ?></strong> <em><?php echo $action; ?></em> at <strong><?php echo Time::convertDateTimeToAgo($date); ?></strong>
                </li>
        <?php endforeach; ?>
    </ul>
<content>

<showmore>
    <button type="button" onclick="changeContent('<?php echo $action ?>', '<?php echo $showMore1; ?>' , '#view-log-activity-popup', 'append')" class="btn btn-primary" >View More</button>
</showmore>

