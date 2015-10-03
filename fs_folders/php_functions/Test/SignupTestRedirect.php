<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/27/2015
 * Time: 1:50 PM
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
$qId = '';
$email = 'jesus@gmail.com';
// 6 = is sign up pending



//validate and conditions


    if(!empty($qId) and !empty($email))
    {
        $invited->_setInvitedInformationByQid($qId, $database);

        if($invited->getEmail() == $email)
        {
            if ($invited->getStatus() == 2) {

                Log::addExecutionLog("Information officially sign up");
            }
            elseif ($invited->getStatus() == 3) {
                Log::addExecutionLog("Information already a member");
            }
            elseif ($invited->getStatus() == 7) {

                Log::addExecutionLog("Information sign up but still pending");
            }
            elseif($invited->updateInvitedStatus($invited->getInvitedId(), 7, $database)) {

                if($invitedQueue->updateQueueStatus($qId, 1, $database)) {

                    $signUp = true;


                }
                else {

                    Log::addExecutionLog("Failed to update the queue status = 1");
                }

            }
            else {

                Log::addExecutionLog("Failed to update the invited status to 6");
            }
        } else {
            Log::addExecutionLog("Email url is not match in the database using qId");
        }
    }
    else
    {
        Log::addExecutionLog("Email or qId is empty");
    }



if($signUp) {

    Log::addExecutionLog("Successfully sign up");

} else {

    Log::addExecutionLog("Failed sign up");

}


echo "Execution Log : " . Log::printExecutionLog();







