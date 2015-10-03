<?php  
    session_start();
    require ("fs_folders/php_functions/connect.php");
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php");
    $mc = new myclass();
    $ri = new resizeImage ();




    $table_name = ( !empty($_GET['table_name'])) ? $_GET['table_name'] : '';
    $table_id   = ( !empty($_GET['table_id'])) ? $_GET['table_id'] : '';

    // echo "table name = $table_name, table id = $table_id <br>";
 
    if(!empty($table_name)) 
    { 
        if($table_name == 'postedlooks') {   
            // echo "postedlooks <br>";   
            $li                  = $mc->posted_look_info($table_id); 
            $mno                 = $_SESSION["mno"];
            $lookOwnerName       = $li["lookOwnerName"];
            $pltags              = $li['pltags'];
            $plstyle             = $li['style'];
            $Ttag                = count($li['pltags']);
            $lookName            = $li["lookName"];
            $lookAbout           = $li["lookAbout"];
            $pltvotes            = $li["pltvotes"];
            $trating             = $li["trating"];
            $pltcomment          = $li["pltcomment"];  
            $link                = $li["article_link"];   
            $modal['table_id']   = $table_id; 
            $modal['table_name'] = $table_name;

        } else if ($table_name == 'fs_postedarticles') {  

            $response = select_v3( 
                'fs_postedarticles' , 
                '*' , 
                " plcno = $plcno and plcld_action = '$action' " 
            );    
            echo "postedarticles<br>";  

            echo "<pre>";
            print_r($response);
            echo "</pre>";
        } else { 
            echo "else " . $table_name . ' <br>'; 
        } 
    } 
    // $_SESSION['posted_link'] = 'http://stylecaster.com/best-free-blog-sites/';
    // $link = $_SESSION['posted_link'];
?>
<!--slider source http://www.elated.com/articles/elegant-sliding-image-gallery-with-jquery/-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Details Page Development</title>
    <link rel="stylesheet" href="fs_folders/js/bootstrap-3.3.1-dist/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
    <script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_ajax.js'></script>
    <script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_query.js'></script>
    <link rel="stylesheet" type="text/css" href='fs_folders/fs_lookdetails/lookdetails_style/lookdetails.css'>
    <link rel="stylesheet" type="text/css" href="fs_folders/gen_css/gen_style.css" />
    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">  
    <link rel="stylesheet" type="text/css" href="fs_folders/gen_css/details-popup.css">  

     

</head>
<body>
    <div id="details-popup-container">
        <!-- <div id="details-popup-header">

            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td>
                        <a href="\">
                            <img src="fs_folders/images/genImg/blue-logo.png" id="details-logo" >
                        </a>
                    </td>
                    <td>
                        <div id="details-popup-circle">
                            &lt;
                        </div>
                    </td>
                    <td>
                        <div id="details-popup-circle">
                            &gt;
                        </div>
                    </td>
                    <td>
                        <div>
                            Ipsum has been the industry's  
                            <div>
                    </td>
                    <td>
                        <img class="heart-icon" src="fs_folders/images/details/white-red-heart.png">
                    </td>
                    <td>
                        <h2 class="bold green" id="details-status"> 3.4K  </h2>
                    </td>
                    <td>
                        <h3 class="bold forward-slash" id="details-forward-slash"> / </h3>
                    </td>
                    <td>
                        <img class="social-rectangle-icon" src="fs_folders/images/details/facebook-button.png">
                    </td>
                    <td>
                        <img class="social-rectangle-icon" src="fs_folders/images/details/pinterest-button.png">
                    </td>
                    <td>
                    </td>
                    <td onclick="fs_popup( 'close-details-popup' )">
                        x
                    </td>
                </tr>
                </tbody>
            </table>
        </div> -->



<div id="details-popup-header">

            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td style="  width: 20px; ">
                        <a href="\">
                            <img src="fs_folders/images/genImg/blue-logo.png" id="details-logo">
                        </a>
                    </td>
                    <td style="padding-left: 21px;width: 60px;">
                        <div id="details-popup-circle" class="details-popup-circle-left">
                            &lt;
                        </div>
                    </td>
                    <td style="padding-left: 21px;width: 60px;">
                        <div id="details-popup-circle" class="details-popup-circle-right">
                            &gt;
                        </div>
                    </td>
                    <td style="width: 329px;">
                        <div class="details-popup-title">
                            <p> 
                                <?php echo $lookName; ?>
                            </p>
                            <div>
                    </div></div></td>
                    <td style="padding-right: 9px;"> 

                        <!-- <img class="heart-icon" src="fs_folders/images/details/white-red-heart.png"> -->  

                        <?php if($_SESSION['look_rated'] == false) { ?>
                            <img
                                style="height: 20px;margin-top: 9px;" 
                                src="fs_folders/images/details/white-red-heart.png"
                                id="look-like-<?php  echo  $modal['table_id'];  ?>", 
                                class="details-like-image"
                                onclick="look_like_click( '<?php echo $mno ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['table_name'] ?>' , 'like' , 'liked.png' , '#look-like-<?php  echo $modal['table_id'];  ?>' , '<?php echo $modal['table_id'] ?>' , '#details-status-1')"
                                onmousemove="mousein_change_button ( '#look-like-<?php  echo $modal['table_id'];  ?>' , 'fs_folders/images/modal/look/liked.png' )"
                                onmouseout="mouseout_change_button ( '#look-like-<?php  echo $modal['table_id'];  ?>'  , 'fs_folders/images/details/white-red-heart.png' ) "
                                />
                            <input onclick=" test_modal () "  type="text" value="not rated comment" id="rate-comment-stat<?php echo  $modal['table_id']; ?>" class='hide'  />
                        <?php } else { ?>
                            <img src="fs_folders/images/modal/look/liked.png"   id="look-like-<?php echo $modal['table_id'];  ?>"  style="height: 20px;margin-top: 9px;"   />
                        <?php } ?>






                    </td>
                    <td style="padding-right: 11px;">
                        <h2 class="bold green" id="details-status" style="padding: 0px;"> 3.4K  </h2>
                    </td>
                    <td style="padding-right: 9px !important;/* padding-right: 23px; */">
                        <h2 class="bold forward-slash" id="details-forward-slash" style=" padding: 0px; "> / </h2>
                    </td>
                    <td style=" x;  padding-left: 10px; padding-right: -3px;  width: 118px; ">
                        <img class="social-rectangle-icon" src="fs_folders/images/details/facebook-button.png" onclick="share_fb_specifi_page (  '<?php $_SERVER['PHP_SELF'] ?>' )" >
                    </td>
                    <td style="padding-right: 17px;">
                        <img class="social-rectangle-icon" src="fs_folders/images/details/pinterest-button.png"   onclick="share_pinterest ( '<?php  echo $modal['table_id']; ?>' ) "  >
                    </td>
                    <td>
                    </td>
                    <td onclick="fs_popup( 'close-details-popup' )">
                        x
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
 
        <div id="details-popup-header" class="details-popup-header-bottom">

            <table border="0" cellpadding="0" cellspacing="0" id="details-popup-thumbnails" >
                <tbody>
                <tr>
                    <td id="details-popup-thumbnail-arrow-right" title="Left" >
                      <
                    </td>
                    <td id="details-popup-thumbnails-td-2" >

                        <ul>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/1.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/2.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/3.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/4.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/5.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/6.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/7.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/8.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/9.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/10.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/11.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/12.jpg" /> </li>
                            <li> <img src="fs_folders/images/uploads/posted looks/thumbnail/13.jpg" /> </li>
                        </ul>
                    </td>
                    <td id="details-popup-thumbnail-arrow-left" title="right" >
                       >
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        


        <div>
            <?php  $link = 'http://stylecaster.com/best-free-blog-sites/'; ?>
  			<iframe src="<?php echo $link; ?>"  >
  			</iframe> 
 		</div>
  	</div>
</body>
</html>