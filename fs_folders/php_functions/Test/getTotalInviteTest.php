<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/28/2015
 * Time: 1:30 PM
 */



require_once ("../Database/Invited.php");
require_once ("../Database/Database.php");


$database = new Database();
$invited  = new \Invitation\Invited();
$database->connect();
$invited->_setInvitedTotals($database);
echo
    'total pending ' . $invited->getTotalPending_() . "\n" .
    'official signup ' . $invited->getTotalOfficialSignUp_() . "\n" .
    'official member' . $invited->getTotalOfficialMember_() . "\n" .
    'pending signup' . $invited->getTotalPendingSignUp_() . "\n" .
    'send sent' . $invited->getTotalSendSent_() . "\n"
;


