<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/24/2015
 * Time: 12:07 AM
 */

namespace Invitation;

class InvitedActivity {

    private static $response;

    private
        $addToQueue = "Added to queue",
        $open = "Open",
        $signUp = "SignUp",
        $receivedInvite = "Received new invitation",
        $remove = "Remove";










    public function __construct(){
    }
    public static function setInvitedActivity($where, $database) {
       self::$response = $database->selectV1('fs_invited_activity', '*', "$where");
    }
    public static function getInvitedActivity() {
        return self::$response;
    }
    public static function setActivityInvitedInfo($qid) {
        return 'Information';
    }
    public static function addActivityLog($qId=1, $action='sign up', $database='new database()') {
        return $database->insert('fs_invited_activity',
            array('fs_invited_queue_id_fk'=>$qId,
                'fs_invited_activity_action'=>$action
            )
        );
    }


    function getMessageAddToQueue() {
        return $this->addToQueue;
    }
    function getMessageOpen() {
        return $this->open;
    }
    function getMessageSignUp() {
        return $this->signUp;
    }
    function getMessageReceivedInvite() {
        return $this->receivedInvite;
    }
    function getMessageRemove() {
        return $this->remove;
    }






}
