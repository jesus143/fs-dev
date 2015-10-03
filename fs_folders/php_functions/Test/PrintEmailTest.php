<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 1/30/2015
 * Time: 5:05 PM
 */

    require_once ("../Email/Email.php");
    $Email = new Email();
    $Email->sendInviteEmail1('info@fashionsponge.com','brainoffashion@gmail.com', 'Invite', 1, 'Rico');
    //sendInviteEmail1($from, $to, $subject, $qid, $invited_fn=null)

