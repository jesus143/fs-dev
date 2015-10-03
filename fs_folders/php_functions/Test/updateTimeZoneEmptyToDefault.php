<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/28/2015
 * Time: 6:08 PM
 */

require_once ("../Database/Invited.php");
require_once ("../Database/Database.php");


$database = new Database();
$invited  = new \Invitation\Invited();
$database->connect();




if($database->update('fs_invited', array('timezone'=>'EST'), "timezone = ''")){
    echo "successfully updated timezone \n";
} else {
    echo "failed updated timezone \n";
}


echo "Update empty location to new york";

if($database->update('fs_invited', array('location'=>'NEW YORK'), "location = ''")){
    echo "successfully updated location \n";
} else {
    echo "failed updated location \n";
}



echo "set invited people to pending if not 2 3 4 7 12";

$database->update('fs_invited', array('invited_status'=>0),
    "invited_status not in(2,3,4,7,12)"
);



