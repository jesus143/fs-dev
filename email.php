<?php
    require_once ("fs_folders/php_functions/Database/Database.php");
    require_once ("fs_folders/php_functions/Database/Invited.php");
    require_once ("fs_folders/php_functions/Database/InvitedQueue.php");
    require_once ("fs_folders/php_functions/Log/Log.php");


    //call class
    $invited      = new Invitation\Invited();
    $invitedQueue = new \Invitation\InvitedQueue();
    $database     = new Database();
    $database->connect();

    //initialized
    $qId = ( !empty($_GET['qId'])) ? $_GET['qId'] : 0 ;
    $email = ( !empty($_GET['email'])) ?  $_GET['email'] : 'mrjesuserwinsuarez@gmail.com' ;

    // condition
    if(!empty($qId) and !empty($email))
    {
        $invited->_setInvitedInformationByQid($qId, $database);

        if($invited->getEmail() == $email)
        {
            if ($invited->getStatus() == 4) {

                Log::addExecutionLog("Information already deleted");

            } else {

                if($invitedQueue->updateQueueStatus($qId, 1, $database)) {

                    if($invited->updateInvitedStatus($invited->getInvitedId(), 4, $database)) {

                        Log::addExecutionLog("Information successfully deleted");

                    } else {

                        Log::addExecutionLog("Information Failed update invited status");
                    }
                } else {

                    Log::addExecutionLog("Information Failed update queue status");
                }
            }

        } else {

            Log::addExecutionLog("Email url is not match in the database using qId");
        }
    }
    else
    {
        Log::addExecutionLog("Email or qId is empty email $email and qId $qId");
    }



    //echo  " " . $invited->getEmail() . " = " . $email;

















































//
//	// echo "id =  $id  email =  $email  type =  $type  <br> ";
//	if ( @mysql_query(" UPDATE fs_invited SET invited_status = 4 WHERE invited_email = '$email' ") ) {
//		echo " <h3>  <em> $email </em> <span style='color:green' > successfully </span> removed from the quee  </h3>   ";
//	}
//	else{
//		echo "  <h3>  <span style='color:red' >something went wrong </span> </h3>   ";
//	}









?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">



<div class="alert alert-warning" role="alert" style="text-align: center">
     <?php

     echo  Log::printExecutionLog();
     ?>
    click <a href='http://fashionsponge.com' > here </a> to visit fashionsponge homepage.
</div>


