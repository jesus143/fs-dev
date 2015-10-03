<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/27/2015
 * Time: 3:30 PM
 */


    require_once ("../Database/Database.php");
    require_once ("../Database/Invited.php");
    require_once ("../Database/InvitedQueue.php");
    require_once ("../Log/Log.php");

    $invited      = new Invitation\Invited();
    $invitedQueue = new \Invitation\InvitedQueue();
    $database     = new Database();
    $database->connect();

    //    $invited->setInvitedInfoByEmail($email,$database);
    //    if($invited->isEmailExist($email))
    //        $invitedQueue->setInvitedQueueById($qId,$database);
    //        $invited->updateInvitedStatus($invitedQueue->getInvitedId(), 6);
    //    }

    //initialized
    $signUp = false;
    $qId = 107;
    $email = 'jesus@gmail.com';
    // 6 = is sign up pending



    echo "\n test remove the email ";



//validate and conditions

//validate and conditions


// condition
if(!empty($qId) and !empty($email))
{
    $invited->_setInvitedInformationByQid($qId, $database);

    if($invited->getEmail() == $email)
    {
        if ($invited->getStatus() == 4) {

            Log::addExecutionLog("Information already deleted");

        } else {

            if($invitedQueue->updateQueueStatus($qId, 1, $database)) {

                if($invited->updateInvitedStatus($invited->getInvitedId(), 4, $database)) {

                    Log::addExecutionLog("Information successfully deleted");

                } else {

                    Log::addExecutionLog("Information Failed update invited status");
                }
            } else {

                Log::addExecutionLog("Information Failed update queue status");
            }
        }

    } else {

        Log::addExecutionLog("Email url is not match in the database using qId");
    }
}
else
{
    Log::addExecutionLog("Email or qId is empty");
}

echo "message " .Log::printExecutionLog();

//echo  " " . $invited->getEmail() . " = " . $email;







