<?php 
  // require("fs_folders/php_functions/connect.php");    
  // require("fs_folders/php_functions/function.php");
  // require("fs_folders/php_functions/myclass.php");
  // require("fs_folders/php_functions/library.php");
  // require("fs_folders/php_functions/source.php");
  // $mc = new myclass();   
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
      # allow crop image size is 210 by 210; 
      // $img_src = 'fs_folders/images/uploads/member/pp.jpg'; 
      $img_src = 'pool.jpg'; 
      $img_dst = 'jesus.jpg';  
      $nw = 237;
      $nh = 237;
      $cx =  $_POST['x'];
      $cy =  $_POST['y'];
      $cw =  $_POST['w'];
      $ch =  $_POST['h'];
      // echo " jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch ) ";
      jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch );  
  }    
  function jcrop( $img_src , $img_dst , $nw , $nh , $cx , $cy , $cw , $ch ) {   
    header('Content-type: image/jpeg');  
    $jpeg_quality = 100;  
    $img_r = imagecreatefromjpeg($img_src);
    $dst_r = ImageCreateTrueColor( $nw , $nh ); 
    imagecopyresampled( $dst_r , $img_r , 0 , 0 , $cx , $cy , $nw , $nh , $cw , $ch );  
    // imagejpeg( $dst_r , $img_dst , $jpeg_quality );    
    imagejpeg( $dst_r , null , $jpeg_quality );   
    // header("location:account");
  }     

 // If not a POST request, display page below:  
?><!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    // $mc->header_attribute( 
    //     "OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , 
    //     "Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
    //     "OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
    //   );   
  ?> 

  <script src="fs_folders/js/jquery-1.9.1.js"></script>
  <script src="fs_folders/js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="fs_folders/gen_css/cropping/main.css" type="text/css" />
  <link rel="stylesheet" href="fs_folders/gen_css/cropping/demos.css" type="text/css" />
  <link rel="stylesheet" href="fs_folders/gen_css/cropping/jquery.Jcrop.css" type="text/css" /> 
<script type="text/javascript">

  $(function(){ 
    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords,
      bgFade: true,
      bgOpacity: .7,  
      minSize: [ 210 , 210 ] 
    }); 
  }); 
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords ( ) {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script> 
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }
</style> 
</head>
<body> 
<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box"> 
<div class="page-header">
<ul class="breadcrumb first">
  <li><a href="../index.html">Jcrop</a> <span class="divider">/</span></li>
  <li><a href="../index.html">Demos</a> <span class="divider">/</span></li>
  <li class="active">Live Demo (Requires PHP)</li>
</ul>
<h1>Server-based Cropping Behavior</h1>
</div> 
    <!-- This is the image we're attaching Jcrop to -->
    <!-- <img src="fs_folders/images/uploads/member/pp.jpg" id="cropbox" /> -->
    <img src="pool.jpg" id="cropbox" /> 
    <!-- This is the form that our event handler fills -->
    <form action="crop.php" method="post" onsubmit="return checkCoords();">
      <input type="hidden" id="x" name="x" />
      <input type="hidden" id="y" name="y" />
      <input type="hidden" id="w" name="w" />
      <input type="hidden" id="h" name="h" />
      <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
    </form> 
    <p>
      <b>An example server-side crop script.</b> Hidden form values
      are set when a selection is made. If you press the <i>Crop Image</i>
      button, the form will be submitted and a 150x150 thumbnail will be
      dumped to the browser. Try it!asdasd
    </p> 
  </div>
  </div>
  </div>
  </div>
  </body>

</html>
