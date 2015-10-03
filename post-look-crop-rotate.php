<?php 
    require("fs_folders/php_functions/connect.php");    
    require("fs_folders/php_functions/function.php");
    require("fs_folders/php_functions/myclass.php");
    require("fs_folders/php_functions/library.php");
    require("fs_folders/php_functions/source.php"); 
    $mc = new myclass();
    $ri = new resizeImage();  
    $_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
    $mno             =  $mc->get_cookie( 'mno' , 136 );  



 
    $type = 'profile-timeline';  
    echo " <div id='fs-general-ajax-response' style='color:#fff;position:fixed;background-color:#000;z-index:200;display:block' >  ";  
    echo " </div> ";    




echo " mno = $mno "; 

    $plno = $mc->postedlook_query( array('mno' =>$mno , 'type'=>'get-latest-plno' ) );
     
    // $plno = 222278;


    // $img_width = 300;
    // $img_height = 450;  


     echo " plno  $plno  <br>";


        $mh = 300;
        $mw = 500; 
        $ri->load("$mc->look_folder/$plno.jpg");    
        $mc->auto_adjust_cropping_width_height_area ( 300 , 500 , $ri->getHeight() , $ri->getWidth() );

        $img_height = $mc->img_height; 
        $img_width  = $mc->img_width; 
      



 

// look_folder
// look_folder_home
// look_folder_lookdetails
// look_folder_socialShare
// look_folder_thumbnail


?>


<!DOCTYPE html> 
<html lang="en">
<head> 

      <script src="fs_folders/js/jquery-1.9.1.js"></script>
      <script src="fs_folders/js/jquery.Jcrop.js"></script>
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/main.css" type="text/css" />
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/demos.css" type="text/css" />
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/jquery.Jcrop.css" type="text/css" /> 

     <script type="text/javascript">  
        var width = "<?php echo $img_width; ?>";
        var height = "<?php echo $img_height; ?>"; 

        $(function(){ 
            $('#cropbox').Jcrop({  
                onSelect: updateCoords, 
                bgFade: true, 
                bgOpacity: .7,    
                setSelect: [ width , height , 0 , 0] ,
                minSize:   [ width , height ] 
            });  
        }); 
 
    </script>     
    <script type="text/javascript"> 
        function updateCoords(c) {
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
    <div style="border:1px solid none; height:auto; display:block" > 
        <center>
            <div> 
                <img src="<?php echo "$mc->look_folder/$plno.jpg"; ?>" id="cropbox" style='border:1px solid #000 !important; ' />   
            </div>
            <div> 
              <form action="profile_crop_func.php" method="post" onsubmit="return checkCoords();">
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" id="imgsrc"  name="imgsrc"  value="<?php echo "$mc->look_folder/$plno.jpg"; ?>" /> 
                <input type="hidden" id="imgdist" name="imgdist" value="<?php echo "$mc->look_folder_cropped/$plno.jpg"; ?>" /> 
                <input type="hidden" id="plno" name="plno" value="<?php echo "$plno"; ?>" /> 
                <input type="hidden" id="plno" name="type" value="posted-look" />  
                <table>
                    <tr> 
                      <td style="padding-right:20px;"> <a href='post-look-label' ><input type="button" value="Cancel" class="btn btn-large btn-inverse"  /> </a> </td>
                      <td> <input type="submit" value="Crop Look" class="btn btn-large btn-inverse" /> </td> 
                </table> 
              </form>  
            </div>
        </center>
    </div>  
  </div>
  </div>
  </div>
  </div>
  </body> 
</html>