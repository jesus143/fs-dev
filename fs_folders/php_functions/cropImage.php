<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 9/18/2015
 * Time: 12:14 PM
 */

function jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch , $type=null) {

    $jpeg_quality = 100;
    $img_r = imagecreatefromjpeg($img_src);
    $dst_r = ImageCreateTrueColor( $nw , $nh );
    imagecopyresampled( $dst_r , $img_r , 0 , 0 , $cx , $cy , $nw , $nh , $cw , $ch );
    imagejpeg( $dst_r , $img_dst , $jpeg_quality );
    // imagejpeg( $dst_r , null , $jpeg_quality );
    if ( !empty($type) ) {
        //header("location:photo.resize.php?type=$type");
        $link = "location:photo.resize.php?type=$type";
        echo "<script type='text/javascript'>document.location='$link'</script>";
    }
    else{
        $link = "location:photo.resize.php?type=profile-pic";
        echo "<script type='text/javascript'>document.location='$link'</script>";
    }
}