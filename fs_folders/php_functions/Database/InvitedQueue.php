<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/24/2015
 * Time: 12:43 AM
 */

namespace Invitation;


class InvitedQueue {

    private static $invitedId = 0, $qId = 0;
    private static $invitedLocation = 0;
    private static $queueInvitedRes = array();

    public function __construct() {
    }

    //set
    public static function setInvitedQueueById($qid, $database) {
        $response = $database->selectV1('fs_invited_queue', '*', "fs_invited_queue_id_pk = $qid");
        // var_dump( $response );
        return self::_setDistributeData($response);
    }
    public static function setInvitedQueueByIid($iId, $database){
        $response = $database->selectV1('fs_invited_queue', '*', "fs_invited_id_fk = $iId");
        // var_dump( $response );

        return self::_setDistributeData($response);
    }


    //get
    public static function getQid() {
        return self::$qId;
    }
    public static function getInvitedId() {
        return self::$invitedId;
    }
    public static function getLocationId() {
        return self::$invitedLocation;
    }
    public static function getTotalLackingInTheQueue($limit, $database) {
        $invitedQueue = $database->selectV1('fs_invited_queue', 'count(fs_invited_queue_id_pk) as totalInvitedQueue', "fs_invited_queue_status = 0 limit $limit");
		$r = $limit - $invitedQueue[0]['totalInvitedQueue'];
        if($r < 0)
        {
			return 0; 
		}
		else
		{
			return $r;	
		} 
    }
    public static function getTotalQueueing($database) {
    	
    	
        $invitedQueue = $database->selectV1('fs_invited_queue', 'count(fs_invited_queue_id_pk) as totalInvitedQueue', "fs_invited_queue_status = 0");
        return $invitedQueue[0]['totalInvitedQueue'];
    }
    public static function getTotalQueued($database) {
        $invitedQueue = $database->selectV1('fs_invited_queue', 'count(fs_invited_queue_id_pk) as totalInvitedQueue', "fs_invited_queue_status = 1");
        return $invitedQueue[0]['totalInvitedQueue'];
    }


    //is
    public static function isInvitedIdExistToTheQueue($invitedId, $database) {
        // query if the id is exist to the invited table
        // echo "invitedId = $invitedId ";
        $response = $database->selectV1('fs_invited_queue', '*', "fs_invited_id_fk = $invitedId");
        return (!empty($response)? TRUE : FALSE);
    }

    //insert
    public static function addInvitedToTheQueue($invitedId, $locationId, $date1, $date2, $date3, $database) {
       return $database->insert(
           'fs_invited_queue',
           array(
               'fs_invited_id_fk'=>$invitedId,
               'fs_invited_location_id_fk'=>$locationId,
               'fs_invited_queue_date_send1'=>$date1,
               'fs_invited_queue_date_send2'=>$date2,
               'fs_invited_queue_date_send3'=>$date3,
           )
       );
    }

    //updated
    public static function updateLocationToTheQueue($invitedId, $location, $database) {
        return $database->update('fs_invited_queue', array('fs_invited_location_id_fk'=>$location, "fs_invited_id_fk = $invitedId"));
    }
    public static function updateDateSendToTheQueue($invitedId, $date1, $date2, $date3, $database) {
    }
    public static function updateQueueStatus($qId, $status, $database) {
        return $database->update('fs_invited_queue', array('fs_invited_queue_status'=>$status), "fs_invited_queue_id_pk = $qId");
    }
    public static function updateQueueStatusByIid($invitedId, $status, $database)
    {
        return $database->update('fs_invited_queue', array('fs_invited_queue_status'=>$status), "fs_invited_id_fk = $invitedId");
    }

    //set
    public static function _setAllInvitedInTheQueueWhoWillReceiveAnInviteEmail($queueStatus = 0, $orderBy = 'fs_invited_queue_id_pk desc', $limit = 1, $database='new Database') {
        self::$queueInvitedRes = $database->selectV1('fs_invited_queue', '*', "fs_invited_queue_status = $queueStatus order by $orderBy limit $limit");
    }

    //get
    public static function getAllInvitedInTheQueueWhoWillReceiveAnInviteEmail_() {
        return self::$queueInvitedRes;
    }


    // distribution
    public static function _setDistributeData($response) {

        //   var_dump($response);
        foreach($response as $key => $value) {
            self::$invitedId = $value['fs_invited_id_fk'];
            self::$invitedLocation = $value['fs_invited_location_id_fk'];
            self::$qId  = $value['fs_invited_queue_id_pk'];
        }
        return (!empty($response)) ? TRUE : FALSE;
    }
} 