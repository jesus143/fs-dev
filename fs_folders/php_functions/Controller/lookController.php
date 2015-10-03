<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 6/19/2015
 * Time: 6:00 PM
 */

session_start();

require ('../Database/Database.php');
require ('../Class/User.php');
require ('../Class/Look.php');


$db = new Database();
$db->connect();


// Initialized error session
$_SESSION['error'] = '';

// Initialized mno
$mno 			 =  1015;//$_COOKIE['mno'];
$_SESSION['mno'] =  1015;//$_COOKIE['mno'];
$plno            =  1;

$user = new User($mno, $db);
$look = new Look($mno, $db);

$response = $look->ratingSort(
    'Male',
    'Yes',
    'Streetwear',
    array(
        'row'=>'plno',
        'orderBy'=>'asc'
    ),
    'Unrated',
    array(
        'start'=>1,
        'end'=>3,
        'base'=>200
    )
);

echo "<pre> over all response <br>
";
print_r($response);
