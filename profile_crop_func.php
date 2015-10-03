<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
# allow crop image size is 210 by 210;
$type = $_POST['type'];
$mno = $_POST['mno'];
#$nw = 237;
#$nh = 237;
$img_src = $_POST['imgsrc']; // this is the image src for cropping';
$img_dst = $_POST['imgdist']; // this is the image distiniation after cropped;
$cx      =  $_POST['x'];
$cy      =  $_POST['y'];
$cw      =  $_POST['w'];
$ch      =  $_POST['h'];
$nw      =  $_POST['w'];
$nh      =  $_POST['h'];
jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch , $type );
}
function jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch , $type=null) {
header('Content-type: image/jpeg');
$jpeg_quality = 100;
$img_r = imagecreatefromjpeg($img_src);
$dst_r = ImageCreateTrueColor( $nw , $nh );
imagecopyresampled( $dst_r , $img_r , 0 , 0 , $cx , $cy , $nw , $nh , $cw , $ch );
imagejpeg( $dst_r , $img_dst , $jpeg_quality );
// imagejpeg( $dst_r , null , $jpeg_quality );
if ( !empty($type) ) {
header("location:photo.resize.php?type=$type");
}
else{
header("location:photo.resize.php?type=profile-pic");
}
}?>



