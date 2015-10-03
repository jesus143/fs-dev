<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/26/2015
 * Time: 2:07 PM
 */

namespace Administrator;


class Admin {

    private static $email = 'mrjesuserwinsuarez@gmail.com';
    function __construct(){
    }
    public static function _setAdminEmail($email){
        self::$email = $email;
    }
    public static function getAdminEmail_(){
        return self::$email;
    }
} 