<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/26/2015
 * Time: 12:01 PM
 */

namespace Message;


class Alert {

    public function __construct(){
    }
    public static function alert($startMessage='', $status=0, $endMessage='') {
        $status = (!empty($status)? 'Success' : "Failed");
        echo $startMessage . ' ' . $status . ' ' . $endMessage;
    }
} 