<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 3/12/2015
 * Time: 11:54 PM
 */


    /**
     * add folder
     * detect if folder exist
     * create sub folder
     * add image from folder
     * remove the entire folder
     * update the folder name
     */


    $mno = 133;
    $firstName = "Jesus Erwin";
    $lastName = "Suarez";

    $folderName = $mno . ' ' . $firstName . ' ' . $lastName;

    if( file_exists(mkdir($folderName) ))
    {
        echo "file exist";
    }
    else
    {
        echo "file not exist";
    }











?>