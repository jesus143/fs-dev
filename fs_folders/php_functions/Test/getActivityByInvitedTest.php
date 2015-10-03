<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/29/2015
 * Time: 7:57 PM
 */


require_once ("../Database/Database.php");
require_once ("../Database/Invited.php");
echo "this is the get activity by invited ";




$invited = new Invitation\Invited();
$database = new Database();
$database->connect();

$iId = 1;

$invited->_setActivity(1, $database);
print_r($invited->getActivity_());






