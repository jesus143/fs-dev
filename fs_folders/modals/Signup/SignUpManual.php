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
require_once ("../../../fs_folders/php_functions/Database/Database.php");
require_once ("../../../fs_folders/php_functions/Database/Invited.php");
require_once ("../../../fs_folders/php_functions/Database/InvitedQueue.php");
require_once ("../../../fs_folders/php_functions/Log/Log.php");
require_once ("../../../fs_folders/php_functions/Email/Email.php");

//class
$invited      = new Invitation\Invited();
$invitedQueue = new \Invitation\InvitedQueue();
$database     = new Database();
$database->connect();

//initialized
$email = (!empty($_GET['email']) ? str_replace("[dot]", ".", $_GET['email']) : 'mrjesuserwinsuarez@gmail.com');  //'jesus2@gmail.com';
$from  = 'info@fashionsponge.com';
$subject = "Signup";
$body = "";
$blog = (!empty($_GET['blog']) ? str_replace("[dot]", ".", $_GET['blog'])  : 'Fashionsponge.com');  //'jesus2@gmail.com'; ;
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
        Log::addExecutionLog("<response>info is already in the sited and its officially sign up<response>");
    } elseif ( $invited->getStatus() == 3) {
        Log::addExecutionLog("<response>info is already in the sited and its officially a member<response>");
    } elseif ($invited->getStatus() == 7) {
        Log::addExecutionLog("<response>info is already in the sited and its sign up pending<response>");
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
        Log::addExecutionLog("<response>success<response>");
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
    Log::addExecutionLog("<response>success<response>");
}

//echo "This is invited id = " . $invited->getInvitedId();
echo Log::printExecutionLog();
