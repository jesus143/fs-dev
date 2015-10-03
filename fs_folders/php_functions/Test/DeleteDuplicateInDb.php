<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/28/2015
 * Time: 5:12 PM
 */

require_once ("../Database/Invited.php");
require_once ("../Database/Database.php");


$database = new Database();
$invited  = new \Invitation\Invited();
$database->connect();
$invited->_setInvitedTotals($database);


echo "delete duplicate in db";



echo "delete = " . $invited->deleteDuplicateDb();





echo "<h1> delete duplicate by name </h1>";
$response = $database->selectV1(
    'fs_invited',
    "count(*) as total , max(invited_id), invited_id, invited_fn, invited_email",
    " invited_status > 0 GROUP BY invited_fn"
);
echo "<pre>";

for($i=0; $i < count($response); $i++) {
    if($response[$i]['total'] > 1){
        print_r($response[$i]);
        $name = $response[$i]['invited_fn'];
        $id = $response[$i]['invited_id'];
        $email = $response[$i]['invited_email'];

        if($database->delete('fs_invited', "invited_id <> $id and invited_fn =
        '$name'")) {
            echo " deleted \n";
        } else {
            echo "failed deleted \n";
        }
    }
}



echo "<h1> delete duplicate by email </h1>";
//delete duplicate by email
$response = $database->selectV1(
    'fs_invited',
    "count(*) as total , max(invited_id), invited_id, invited_fn, invited_email",
    " invited_status > 0 GROUP BY invited_email"
);
echo "<pre>";

for($i=0; $i < count($response); $i++) {
    if($response[$i]['total'] > 1){
        print_r($response[$i]);
        $name = $response[$i]['invited_fn'];
        $id = $response[$i]['invited_id'];
        $email = $response[$i]['invited_email'];

        if($database->delete('fs_invited', "invited_id <> $id and invited_email =
        '$email'")) {
            echo "deleted \n";
        } else {
            echo "failed deleted \n";
        }
    }
}








echo "<br><br>";













