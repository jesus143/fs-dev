<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/24/2015
 * Time: 1:04 AM
 */

namespace Invitation;


class Invited
{

    private static
        $response = array(),
        $response1 = array();

    private static
        $activityDate = '2015-01-01 00:00:00';

    private static
        $fullName = '',
        $location = '',
        $timezone= 'EST',
        $email = 'mrjesuserwinsuarez@gmail.com',
        $activityAction = '';

    private static
        $invitedId = 0,
        $totalEmailSent = 0,
        $status = 0,
        $tPending = 0,
        $tOfficialSignUp = 0,
        $tOfficialMember = 0,
        $tPendingSignUp = 0,
        $tSendSent =0,
        $tDeleted = 0,
        $activityId = 0,
        $queueId = 0;




    private static $invitedForTheQueue;
    private $distictResult;
    private $distictTotalResult;
    private $totalReceiverPeople;



    public function __construct() {
    }




    public static function _setInvitedInformationByEmail($email, $database)
    {
        $response = $database->selectV1('fs_invited', '*', "invited_email = '$email'");
        return self::_setDistributeData($response);
    }
    public static function _setInvitedInformationByQid($qId, $database) {
         $response1 = $database->selectV1('fs_invited_queue', 'fs_invited_id_fk', "fs_invited_queue_id_pk = $qId limit 1");
         $inviteId  = $response1[0]['fs_invited_id_fk'];
         $response2 = $database->selectV1('fs_invited', '*', "invited_id =  $inviteId");
         return self::_setDistributeData($response2);
    }
    public static function _setInvitedTotals($database) {


        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 0");
        self::$tPending = $invited[0]['total'];

        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 2");
        self::$tOfficialSignUp = $invited[0]['total'];

        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 3");
        self::$tOfficialMember = $invited[0]['total'];

        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 7");
        self::$tPendingSignUp = $invited[0]['total'];

        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 12");
        self::$tSendSent = $invited[0]['total'];

        $invited = $database->selectV1('fs_invited', 'count(*) as total', "invited_status = 4");
        self::$tDeleted = $invited[0]['total'];




    }
    public static function setInvitedInfoById($invitedId, $database)
    {
        $response = $database->selectV1('fs_invited', '*', "invited_id = $invitedId");
        return self::_setDistributeData($response);
    }
    public static function setInvitedForTheQueue($totalInvitedQueue, $database, $invited) {

        $result = array();

        $invited->setDistinctInvited('location', $database , $totalInvitedQueue);
        echo "\n getTotalDistinct " . $invited->getTotalDistinct();
        echo "\n getLimitPerQuery " . $invited->getLimitPerQuery();
        echo "\n getTotalPeopleReceivedInvite " . $invited->getTotalPeopleReceivedInvite();

        $limit  = $invited->getLimitPerQuery();
        $limit1 = $invited->getLimitPerQuery();
        $reminder = 0;
        $i = 0;
        echo "\n\n\n";

        foreach($invited->getDistinctInvited() as $il) {
            echo "\nlocation " . $il['location'] . "";
            $location = $il['location'];

            $database->select('fs_invited', "*", '', "location = '$location' and invited_status = 0 and invited_email != ' '" , '' , "0, $limit1");
            // print_r($database->getResult());
            echo " | Total Result = " . $database->getTotalRes();
            $totalResult    = $database->getTotalRes();
            // echo "\n -----------------------------------------------------------\n" ;
            $reminder = $invited->addNewLimitBasedOnTheResults($limit, $reminder, $totalResult);
            $limit1 = $reminder;
            $result[$i] = $database->getResult();
            $i++;
        }
        echo "limit per query $limit  reminder $reminder ";
        self::$invitedForTheQueue = $result;
    }
    public static function _setInvitedForTheQueueRandom($totalInvitedQueue, $database) {
    	
		$timezone_exept = "'AEDT','WIB', 'A', 'ACDT', 'AEST', 'WITA', 'AWST'";  
        self::$invitedForTheQueue = $database->selectV1('fs_invited', '*', "invited_status not in(2,3,7,12,4) and timezone not in($timezone_exept) ORDER BY invited_id desc limit $totalInvitedQueue");

    }
    public static function _setActivity($iId, $database) {

        //echo "this is _setActivity($iId )";
        $response1 = array();

        $response = $database->selectV1('fs_invited_queue', '*', "fs_invited_id_fk = $iId");
        foreach($response as $key => $activity) {
            $qId = $activity['fs_invited_queue_id_pk'];
            self::$response1 = $database->selectV1('fs_invited_activity', '*', "fs_invited_queue_id_fk = $qId");
        }
    }
    public static function getActivity_() {
        return self::$response1;
    }



    public static function getTotalPending_()
    {
        return self::$tPending;
    }
    public static function getTotalOfficialSignUp_()
    {
        return self::$tOfficialSignUp;
    }
    public static function getTotalOfficialMember_()
    {
        return self::$tOfficialMember;
    }
    public static function getTotalPendingSignUp_()
    {
        return self::$tPendingSignUp;
    }
    public static function getTotalSendSent_()
    {
        return self::$tSendSent;
    }
    public static function getTotalDeleted_()
    {
        return   self::$tDeleted;
    }

    public static function getInvitedId()
    {
        return self::$invitedId;
    }
    public static function getFullName()
    {
        return self::$fullName;
    }
    public static function getTotalEmailSent_()
    {
        return self::$totalEmailSent;
    }

    public static function getInvitedForTheQueue() {
        return self::$invitedForTheQueue;
    }
    public static function getInvitedLocation() {
        return self::$location;
    }
    public static function getTimeZone() {
        return self::$timezone;
    }
    public static function getEmail() {
        return self::$email;
    }
    public static function getFirstName() {
        $firstName =explode(' ', self::$fullName);
        return $firstName[0];
    }
    public static function getStatus()
    {
        return self::$status;
    }

    public function setDistinctInvited($row, $database, $totalPeopleReceivedInvited) {
        $this->totalReceiverPeople = $totalPeopleReceivedInvited;
        $database->select('fs_invited', "DISTINCT $row ", '', '' );
        $this->distictResult = $database->getResult();
        $this->distictTotalResult = $database->numRows();
    }
    public function getDistinctInvited() {
        return $this->distictResult;
    }
    public function getTotalDistinct() {
        return $this->distictTotalResult;
    }
    public function getLimitPerQuery() {
        $quotient = $this->getTotalPeopleReceivedInvite() / $this->getTotalDistinct();
        return intval($quotient);
    }
    public function getTotalPeopleReceivedInvite() {
        return $this->totalReceiverPeople;
    }
    public function addNewLimitBasedOnTheResults($limit, $reminder, $query) {
        if($query < $limit) {
            return $limit + $reminder - $query;
        } else {
            return $limit;
        }
    }

    //update
    public function updateAllDataToPending($database) {
    return $database->update('fs_invited', array('invited_status'=>0), "invited_status > 1" );
    }
    public static function updateTotalEmailSent($iId, $totalEmailSent=0, $database="new Database()") {
       return $database->update('fs_invited',array('temail_sent'=>$totalEmailSent), "invited_id = $iId");
    }
    public static function updateInvitedStatus($invitedId, $status=0, $database="new Database()") {
        return $database->update('fs_invited',array('invited_status'=>$status), "invited_id = $invitedId");
    }
    public static function updateLocationAndTimeZone($location='NEW YORK', $timezone='EST',  $invitedId, $database) {
        return $database->update('fs_invited', array('location'=>$location, 'timezone'=>$timezone), "invited_id = $invitedId");
    }




    public static function resetData($database) {
        echo "Reset <br> \n";
        // update invited status = 0;
        // total invited total sent = 0;
        if($database->update('fs_invited', array('invited_status'=>0, 'temail_sent'=>0), "invited_id > 0")) {
            echo "\n<br> fs invited table successfully restored status = 0, tsent = 0";
        } else {
            echo "\n<br> fs invited table failed restored status = 0, tsent = 0";
        }
        // delete all queue
        if($database->delete('fs_invited_queue', "fs_invited_queue_id_pk > 0")) {
            echo "\n<br> fs invited  queue table successfully deleted data";
        } else {
            echo "\n<br> fs invited  queue table failed deleted data";
        }
        // delete all activity
        if($database->delete('fs_invited_activity', "fs_invited_activity_id_pk > 0")) {
            echo "\n<br> fs invited  activity table successfully deleted data";
        } else {
            echo "\n<br> fs invited  activity table failed deleted data";
        }

        return true;
    }




    // distribution
    public static function _setDistributeData($response) {

    //   var_dump($response);
        foreach ($response as $key => $value) {
            self::$invitedId = $value['invited_id'];
            self::$fullName = $value['invited_fn'];
            self::$totalEmailSent = $value['temail_sent'];
            self::$location = $value['location'];
            self::$timezone = $value['timezone'];
            self::$email = $value['invited_email'];
            self::$status = $value['invited_status'];
        }
        return (!empty($response)) ? TRUE : FALSE;
    }

    //add
    public static function addNewInvitedFromManualSignUp($email, $blog, $timeZone, $location, $status, $dateTime, $database) {
        return $database->insert('fs_invited',
            array('invited_email'=>$email,
                'invited_wob'=>$blog,
                'timezone'=>$timeZone,
                'location'=>$location,
                'invited_status'=>$status,
                'invited_date'=>$dateTime
            )
        );
    }

    //delete

    public function deleteDuplicateDb() {

        echo "invited \n";
    }





}