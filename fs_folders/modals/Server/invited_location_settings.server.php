<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/23/2015
 * Time: 2:21 PM
 */

    require_once "../../../fs_folders/php_functions/Database/Database.php";
    require_once "../../../fs_folders/php_functions/Database/InvitedLocation.php";
    $database = new Database();
    $database->connect();
    $invitePeopleDb = new FashionSponge\InvitedLocation();

    $fs_invited_location_id            = $_GET['fs_invited_location_id'];
    $fs_invited_location_time_row_name = $_GET['fs_invited_location_time_row_name'];
    $fs_invited_location_time_val      = $_GET['fs_invited_location_time_val'];






    //update time
    $res = $database->update(
        'fs_invited_location',
        array($fs_invited_location_time_row_name=>$fs_invited_location_time_val),
        "fs_invited_location_id_pk = $fs_invited_location_id"
    );
    if($res == TRUE) {
        echo "updated ";
    } else {
        echo "failled to update ";
    }
