<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 02/02/2015
 * Time: 5:17 PM
 */

    require_once ("../Database/Database.php");
    require_once ("../Database/Invited.php");
    $invited = new Invitation\Invited();
    $database = new Database();
    $database->connect();

     if($invited->resetData($database)){
         echo "Reset execution successfully \n <br>";
     }