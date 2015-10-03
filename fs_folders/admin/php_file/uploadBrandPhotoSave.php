<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/9/2015
 * Time: 7:37 PM
 * src: http://www.sitepoint.com/file-uploads-with-php/
 */ ?>

<!--initialized data-->
<?php
require("../../../fs_folders/php_functions/connect.php");
require("../../../fs_folders/php_functions/function.php");
require("../../../fs_folders/php_functions/myclass.php");
require("../../../fs_folders/php_functions/library.php");
require("../../../fs_folders/php_functions/source.php");
?>

    <!--get brands and category that has no image yet-->
<?php
echo "<pre>";
$db->select('fs_brands', '*', null, 'visible = 1', ' bno desc ');
$res = $db->getResult();
//print_r($res);
echo "this is to upload the picture of the brand or topic <br>";
?>


    <!--print file upload for image of the brand or category -->
<?php

$path = '../../../fs_folders/images/uploads/brands';

for($i=0; $i<count($res); $i++) {

    $bno     = $res[$i]['bno'];
    $bcno    = $res[$i]['bcno'];
    $myFile = $_FILES["myFile_$bno"];

    //get brand category
//    $res1 = $db->select('fs_brand_category', '*', null, 'bcno = ' . $bcno);
    $res1 = select_v3('fs_brand_category', '*', 'bcno = ' . $bcno);
//    $res1    = $db->getResult();
    //print_r($res1);
    $type    = $res1[0]['type'];





    $imgPath = $path . "/$bno" . "_$type.jpg";
    $success = move_uploaded_file($myFile["tmp_name"], $imgPath);


    if (!$success) {
        echo "<p>Unable to save file. type $type </p>";

    } else {

        echo "photo saved tyype $type <br>";
        /** Resize image */
        $ri = new resizeImage();
        $ri->load($imgPath);
        #profile pic
        $ri->set_all_for_location(
            $imgPath,  // source image
            $imgPath,  // save distination
            157,  //width
            '',  //height
            $ri // class object
        );
        echo "<img src='$imgPath' />";

        /** Update brand */

        if($db->update('fs_brands', array('visible'=>2), 'bno = ' . $bno )){
            echo "updated to visible<br>";
        };
    }

}