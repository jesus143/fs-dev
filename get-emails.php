<?php
require_once ("fs_folders/php_functions/Database/Database.php");
//require_once ("fs_folders/php_functions/Database/Invited.php");
//require_once ("fs_folders/php_functions/Database/InvitedQueue.php");
//require_once ("fs_folders/php_functions/Log/Log.php");
//
//
////call class
//$invited      = new Invitation\Invited();
//$invitedQueue = new \Invitation\InvitedQueue();
$database     = new Database();
$database->connect();


//echo "<pre>";

$database->select('fs_invited', 'DISTINCT invited_email, invited_ln, invited_fn', NULL, NULL, NULL, NULL);
//print_r($database->getResult());
$emails = $database->getResult();

$c=965;
for($i=0; $i < count($emails); $i++) {
        //    echo $c . ' - ' .
        //        'First Name - ' . $emails[$i]['invited_fn'] .
        //        'Last Name - ' . $emails[$i]['invited_ln'] .
        //        'Email - ' . $emails[$i]['invited_email'] . ' |<br>';
        //        $c++;
    ?>
        <div id="people-<?php echo $c; ?>" class="people" >
            <fname><?php echo $emails[$i]['invited_fn']; ?></fname>
            <lname><?php echo $emails[$i]['invited_ln']; ?></lname>
            <email><?php echo $emails[$i]['invited_email']; ?></email>
        </div>
    <?php
    $c++;
}

?>

<style>
    .people fname {
        color:red;
    }

    .people lname {
        color:yellow ;
    }

    .people email {

    }
</style>

