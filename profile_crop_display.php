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
  $width           = $_SESSION['width_crop_size_limit']; 
  $type            =  ( !empty($_SESSION['type']) ) ? $_SESSION['type'] : null ; ;
  $type1           =  ( !empty($_GET['type']) ) ? $_GET['type'] : null ;
                    if ( !empty($type1) )$type = $type1;              
                     
                    // $type = 'profile-timeline';


//$mno = 1016;

//echo "mno - " . $mno;



    echo " <div id='fs-general-ajax-response' style='color:#fff;position:fixed;background-color:#000;z-index:200;display:none' >  ";
      // $mc->unlink_profile_pics( $mno );
      echo "Type = " .  $type . '<br>';
      switch ( $type ) {
        case 'new-member-fb-login':  
                echo " new member fb login <br> ";
                $mppno = $mc ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) ); 
                unset($_SESSION['type']);
            break;  
        case 'profile-timeline': 
                echo " time lime <br>"; 
                move_uploaded_file($_FILES["file"]["tmp_name"], "$mc->profileTimeline_original/$mno.jpg");   
  
                #get width and height of the image 

                    # load image and get height and width
                        $ri->load("$mc->profileTimeline_original/$mno.jpg");   
                        $img_height = $ri->getHeight();  
                        $img_width  = $ri->getWidth();      
                        echo " height $img_height width $img_width ";





                      if ( $img_width > $width ) {
                        $mc->image( 
                          array( 
                            'type'=>"resize",
                            'osrc'=>"$mc->profileTimeline_original/$mno.jpg",
                            'nsrc'=>"$mc->profileTimeline_original/$mno.jpg",
                            'nw'=>$width   
                          ) 
                        ); 
                      }
                       


                    # if height >= 1050 return 1050 
                    # else return height
                    
                        if ( $img_height > 260) {
                            $img_height = 260;
                        }  

                    # if width >= 1024 return 1024 
                    # else return width

                        if (  $img_width > 1024 ) {
                              $img_width = 1024;
                        } 



                       
            break;
        default:
            echo "this is the default page <br>";
            # default the change profile and crop in account page.
            if(!empty($_FILES["file"]["tmp_name"])) {
                echo " account page change profile and crop <br> "; 
                move_uploaded_file($_FILES["file"]["tmp_name"], "$mc->ppic_orginal/$mno.jpg");
                # load image and get height and width
                $ri->load("$mc->ppic_orginal/$mno.jpg");
                $img_height = $ri->getHeight();
                $img_width  = $ri->getWidth();
                echo " height $img_height width $img_width ";


                if ( $img_width > $width ) {
                   $mc->image(
                      array(
                          'type'=>"resize",
                          'osrc'=>"$mc->ppic_orginal/$mno.jpg",
                          'nsrc'=>"$mc->ppic_orginal/$mno.jpg",
                          'nw'=>$width
                       )
                   );
                }

                if($_GET['type'] == 'welcome') {
                    echo "welcome <br>";
                     $mc->go("photo.resize.php?type=profile-pic-welcome");
                    ///header("location:photo.resize.php?type=profile-pic-welcome" );
                    //$mc->go('home');
                } else {
                    echo "not welcome <br>";
                }
            } else {
                echo "profile pic is empty <br>";
                 //header("location:" . $mc->get_username_by_mno($mno) );
                $mc->go('home');
            }
          break;
      } 

      // $mc->update_profile_pic( $mno );    
    echo " </div> ";   
?>


<!DOCTYPE html> 
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
      <script type="text/javascript" src="fs_folders/js/function_js.js" ></script>
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/main.css" type="text/css" />
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/demos.css" type="text/css" />
      <link rel="stylesheet" href="fs_folders/gen_css/cropping/jquery.Jcrop.css" type="text/css" />  
      <link rel="stylesheet" href="fs_folders/gen_css/gen_style.css" type="text/css" />


    <?php 
    #js 

        switch ( $type ) {
            case 'profile-timeline':
                    #this is for the timeline crop.
                        ?>
                     <script type="text/javascript">  
                        var width = "<?php echo $img_width; ?>";
                        var height = "<?php echo $img_height; ?>"; 
                        $(function(){ 
                            $('#cropbox').Jcrop({ 
                              onSelect: updateCoords, 
                              bgFade: true,
                              bgOpacity: .7,  
                              setSelect: [ width , height , 0 , 0] ,
                              minSize:   [ width , height ],
                              maxSize:   [ width , height ],
                            }); 
                        });  
                    </script>   
                        <?php 
                break;
            
            default: 
                #this is for the fb and profile pic crop.

            ?> 

                <script type="text/javascript"> 
                    $(function(){ 
                        $('#cropbox').Jcrop({
                          aspectRatio: 1,
                          onSelect: updateCoords, 
                          bgFade: true,
                          bgOpacity: .7,  
                          setSelect: [0,20,0,0],
                          minSize: [ 237 , 237 ] 
                          // maxSize: [ 300 , 300 ]  
                        }); 
                    });  
                </script>  
            <?php 
                    
                break;
        }



    ?>
 
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

<?php 

    switch ( $type ) {
        case 'profile-timeline': ?>
                <div style="border:1px solid none; height:auto; display:block" > 
                    <center>
                        <div> 
                            <img src="<?php echo "$mc->profileTimeline_original/$mno.jpg"; ?>" id="cropbox" style='border:1px solid #000 !important; ' />   
                        </div>
                        <div> 
                            <form action="profile_crop_func.php" method="post" onsubmit="return checkCoords();">

                                <input type="hidden" id="x"       name="x" />
                                <input type="hidden" id="y"       name="y" />
                                <input type="hidden" id="w"       name="w" />
                                <input type="hidden" id="h"       name="h" />
                                <input type="hidden" id="type"    name="type"    value="profile-timeline" />
                                <input type="hidden" id="imgsrc"  name="imgsrc"  value="<?php echo "$mc->profileTimeline_original/$mno.jpg"; ?>" /> 
                                <input type="hidden" id="imgdist" name="imgdist" value="<?php echo "$mc->profileTimeline_original/$mno.jpg"; ?>" /> 
                                <input type="hidden" id="mno"     name="mno"     value="<?php echo "$mno"; ?>" /> 

                                <table>
                                    <tr> 
                                      <td style="padding-right:20px;"> 
                                        <a href='account' >

                                          <!-- <input type="button" value="Cancel" class="btn btn-large btn-inverse"  />  -->

                                           <img 
                                               id="change-profile-image-cancel" 
                                              src="fs_folders/images/accountsettings/cancel-2.png"  
                                              onmousemove=" mousein_change_button ( '#change-profile-image-cancel' , 'fs_folders/images/accountsettings/mouse-over-cancel-2.png' )" 
                                              onmouseout="mouseout_change_button (  '#change-profile-image-cancel'  , 'fs_folders/images/accountsettings/cancel-2.png' ) "
                                            /> 

                                        </a>  
                                      </td>
                                      <td> 
                                         <!-- <input type="submit" value="Crop Timeline" class="btn btn-large btn-inverse" />  -->
                                         <input type="submit" value=""  id="change-profile-image-crop" />   

                                      </td> 
                                </table>  
                            </form>  
                        </div>
                    </center>
                </div> 
            <?php 
            break;
        
        default: ?> 
                <div style="border:1px solid none; height:auto; display:block" > 
                    <center>
                        <div> 
                            <img src="<?php echo "$mc->ppic_orginal/$mno.jpg"; ?>" id="cropbox" style='border:1px solid #000 !important; ' />   
                        </div>
                        <div> 
                          <form action="profile_crop_func.php" method="post" onsubmit="return checkCoords();">
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                            <input type="hidden" id="imgsrc"  name="imgsrc"  value="<?php echo "$mc->ppic_orginal/$mno.jpg"; ?>" /> 
                            <input type="hidden" id="imgdist" name="imgdist" value="<?php echo "$mc->ppic_orginal/$mno.jpg"; ?>" /> 
                            <input type="hidden" id="mno" name="mno" value="<?php echo "$mno"; ?>" /> 
                            <table>
                                <tr> 
                                  <td style="padding-right:20px;"> 
                                    <a href='account' >
                                      <!-- <input type="button" value="Cancel" class="btn btn-large btn-inverse"  />  -->
                                       <img 
                                         id="change-profile-image-cancel" 
                                        src="fs_folders/images/accountsettings/cancel-2.png"  
                                        onmousemove=" mousein_change_button ( '#change-profile-image-cancel' , 'fs_folders/images/accountsettings/mouse-over-cancel-2.png' )" 
                                        onmouseout="mouseout_change_button (  '#change-profile-image-cancel'  , 'fs_folders/images/accountsettings/cancel-2.png' ) "
                                      /> 
                                    </a> 
                                  </td>
                                  <td>  
                                     <input type="submit" value=""  id="change-profile-image-crop" />   
                                    <!--  <img 
                                        id="avatar-right-uploadprofile2"  
                                        src="fs_folders/images/accountsettings/update.png"  
                                        onmousemove=" mousein_change_button ( '#avatar-right-uploadprofile2' , 'fs_folders/images/accountsettings/update-mouse-over.png' )" 
                                        onmouseout="mouseout_change_button (  '#avatar-right-uploadprofile2'  , 'fs_folders/images/accountsettings/update.png' ) "
                                      />  -->
                                  </td> 
                            </table> 
                          </form>  
                        </div>
                    </center>
                </div><?php 
            break;
    }

?>



  </div>
  </div>
  </div>
  </div>
  </body> 
</html>