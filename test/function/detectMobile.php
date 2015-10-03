<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 16/02/2015
 * Time: 4:03 PM
 */

    include ("../../fs_folders/php_functions/Class/DetectMobile.php");
    $md = new Mobile_Detect();

    if($md->isMobile())
    {
        echo "mobile";
    }
    else
    {
        echo "not mobile";
    }

