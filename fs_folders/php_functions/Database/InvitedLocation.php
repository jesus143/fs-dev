<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/23/2015
 * Time: 3:07 PM
 */

namespace FashionSponge;


class InvitedLocation
{
    private static $locationName = '' , $locationTime1 = '', $locationTime2 = '', $locationTime3 = '';
    private static $locationId = '';
    function  __construct()
    {
    }
    public static function setInvitedLocationInfo($locationId, $database)
    {
        $response = $database->selectV1('fs_invited_location', '*', "fs_invited_location_id_pk = $locationId");
        foreach ($response as $key => $value) {
            self::$locationId    = $value['fs_invited_location_id_pk'];
            self::$locationName  = $value['fs_invited_location_name'];
            self::$locationTime1 = $value['fs_invited_location_send_tim1'];
            self::$locationTime2 = $value['fs_invited_location_send_tim2'];
            self::$locationTime3 = $value['fs_invited_location_send_tim3'];
        }
        return (!empty($response)) ? TRUE : FALSE;
    }
    public static function getLocationId()
    {
        return self::$locationId;
    }
    public static function getLocationName()
    {
        return self::$locationName;
    }
    public static function getLocationTime1()
    {
        return self::$locationTime1;
    }
    public static function getLocationTime2()
    {
        return self::$locationTime2;
    }
    public static function getLocationTime3()
    {
        return self::$locationTime3;
    }
    public static function getLocationTimeZone()
    {
    }
    public static function getLocationTimeDate()
    {
    }
    public static function __setLocationByName($location, $database){
        $response = $database->selectV1('fs_invited_location', '*', "fs_invited_location_name = '$location'");
        foreach ($response as $key => $value) {
            self::$locationName = $value['fs_invited_location_name'];
            self::$locationId = $value['fs_invited_location_id_pk'];
        }
    }



    public static function updateInvitedLocation()
    {
    }
    public static function getAllLocation($database)
    {

        return $database->selectV1('fs_invited_location', "*", "fs_invited_location_id_pk > 0 and fs_invited_location_name != ' '");
    }
    public static function addIfThereIsNewLocationInInvitedPeople($database)
    {
        // get all the distinct location name
        $boolean = $database->select('fs_invited', "DISTINCT (location), timezone", "", "invited_id > 0");
        $locations = $database->getResult();
        $totalRes = $database->numRows();
        // echo "total result $totalRes <br>";

        // insert new location to fs_invited_location
        foreach ($locations as $location) {
            $tz = $location['timezone'];
            $l = $location['location'];
            $res = $database->selectV1('fs_invited_location', "*", "fs_invited_location_name = '$l'");
            if (empty($res)) {
                //insert new location

                $b = $database->insert(
                    'fs_invited_location',
                    array(
                        'fs_invited_location_name' => $l,
                        'fs_invited_location_timezone' => $tz
                    )
                );
                if ($b) {
                    // echo "succesfully inserted location $l <br>";
                } else {
                    // echo "failed inserted location $l <br>";
                }
            } else {
                // echo "failed to insert because  location $l is exist <br>";

            }
        }

    }
    public static function getDistinctLocation()
    {
    }
}
