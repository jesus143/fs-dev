<!--date-->
<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/9/2015
 * Time: 7:12 PM
 */
?>

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




<form action="uploadBrandPhotoSave.php" method="post" enctype="multipart/form-data">

    <!--print file upload for image of the brand or category -->
    <?php
        for($i=0; $i<count($res); $i++){
            //get brand
            $bno     = $res[$i]['bno'];
            $bcno    = $res[$i]['bcno'];
            $bname   = $res[$i]['bname'];
            $page    = $res[$i]['page'];
            //echo "$i $bno $bcno<br>";

            //get brand category
            $db->select('fs_brand_category', '*', null, 'bcno = ' . $bcno);
            $res1    = $db->getResult();
            //print_r($res1);
            $type    = $res1[0]['type'];
            $bc_name = $res1[0]['bc_name'];
            $gender  = $res1[0]['gender'];
            ?>

            <!--  print info -->
            <?php echo" Select image to upload for brand name: $bname category: $bc_name gender: $gender type: $type page: $page "; ?>

            <!--print used to upload image -->
            <input type="file" name="myFile_<?php echo $bno ?>" id="fileToUpload">

            <?php
        }
    ?>
    <input type="submit" value="Upload Image" name="submit">
</form>


