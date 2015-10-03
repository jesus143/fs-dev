<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/27/2015
 * Time: 9:02 PM
 */


/**
 * official sign up = 2
 * official member = 3
 * sign up pending = 7
 * send sent = 12
 */

//requires
require_once ("../Database/Database.php");
require_once ("../Database/Invited.php");
require_once ("../Database/InvitedQueue.php");
require_once ("../Log/Log.php");
require_once ("../Email/Email.php");

//class
$invited      = new Invitation\Invited();
$invitedQueue = new \Invitation\InvitedQueue();
$database     = new Database();
$database->connect();

//initialized
//$email = 'jesus2@gmail.com';
//$from  = 'mauricio@gmail.com';
//$subject = "Fs Signup";
//$body = "";
//$blog = 'fashionsponge.com';
$email = (!empty($_GET['email']) ? $_GET['email'] : 'mrjesuserwinsuarez2@gmail.com');  //'jesus2@gmail.com';
$from  = 'info@fashionsponge.com';
$subject = "Fs Signup";
$body = "";
$blog = (!empty($_GET['email']) ? $_GET['email'] : 'Fashionsponge.com');  //'jesus2@gmail.com'; ;
$timeZone = "EST";
$location = "RANDOM";


//set print
Log::addExecutionLog("from = $from");
Log::addExecutionLog("to = $email");
Log::addExecutionLog("subject = $subject");
Log::addExecutionLog("blog = $blog");


//conditions and validations
$invited->_setInvitedInformationByEmail($email, $database);
if($invited->getInvitedId() > 0)
{
    if ($invited->getStatus() == 2)
    {
        Log::addExecutionLog("info is officially sign up");
    } elseif ( $invited->getStatus() == 3) {
        Log::addExecutionLog("info is officially a member");
    } elseif ($invited->getStatus() == 7) {
        Log::addExecutionLog("info is sign up pending");
    }
    else
    {

        if($invited->updateInvitedStatus($invited->getInvitedId(), 7, $database)){
            Log::addExecutionLog("Invited status updated to 7");
        }
        if($invitedQueue->updateQueueStatusByIid($invited->getInvitedId(), 1, $database)){
            Log::addExecutionLog("Queue status updated to 1");
        }
        if(Email::sendSignUpWelcomeEmail($from, $email, $subject, $invited->getFirstName())){
            Log::addExecutionLog("Sign up welcome email sent");
        }
    }
}
else
{
    if($invited->addNewInvitedFromManualSignUp($email, $blog, $timeZone, $location, 7, date("Y-m-d H:i:s"), $database)) {
        Log::addExecutionLog("Added new invited signup using manual");
        if(Email::sendSignUpWelcomeEmail($from, $email, $subject, $body)) {
            Log::addExecutionLog("Welcome email sent");
        }
    }
}

//echo "This is invited id = " . $invited->getInvitedId();
echo Log::printExecutionLog();
