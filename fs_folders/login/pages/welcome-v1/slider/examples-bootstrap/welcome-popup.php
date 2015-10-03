<?php  
    session_start();
    $path = ''; 
    $path1 = 'fs_folders/login/pages/welcome-v1/slider';
//    include( $path . 'fs_folders/php_functions/Database/Database.php');
//    $database = new Database();
//    $database->connect();
//    $mno = $_SESSION['mno'];
//    $user_account = $database->selectV1('fs_member_accounts', '*', "mno = $mno");
//    $user_profile = $database->selectV1('fs_members', '*', "mno = $mno");
//    $lastname     = (!empty($user_profile[0]['lastname']) ? $user_profile[0]['lastname']  : '');
//    $firstname    = (!empty($user_profile[0]['firstname'])? $user_profile[0]['firstname'] : '');
//    $username     = (!empty($user_account[0]['username']) ? $user_account[0]['username']  : '');
    $blogName     = ''; 
    $blogUrl      = '';  
    $firstname    = '';
    $lastname     = '';
    $username     = '';
   
?>


<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap Slider Component Carousel/Slideshow/Gallery/Banner</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $path1; ?>/examples-bootstrap/bootstrap.min.css" rel="stylesheet" />
 
    <link href="<?php echo $path; ?>fs_folders/gen_css/gen_style.css" rel="stylesheet" /> 
    <script type="text/javascript" src="<?php echo $path; ?>fs_folders/js/function_js.js"></script>
    <link rel="stylesheet" href="<?php echo $path; ?>fs_folders/login/pages/welcome/welcome-about-user-style.css" >


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="overflow-x:hidden">

    <!-- Use a container to wrap the slider, the purpose is to enable slider to always fit width of the wrapper while window resize -->
    <div class="container">
        <!-- Jssor Slider Begin -->
        <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
        <!-- ================================================== -->
        <div id="slider1_container" style="display: none; position: relative; margin: 0 auto; width: 1140px; height: 770px; overflow:hidden">

            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

                background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;

                top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>

            <!-- Slides Container -->
            <div u="slides" style=" position: absolute; left: 0px; top: 0px; width: 1140px; height: 800px; overflow: hidden;"> 
                <div>
                    <div  class="container-slide-2"  >    
                       <div> 
                            <h3>
                                Select the topics your interested in
                            </h3>
                        </div> 
                        <div>
                            <p>
                             simply dummy text of the printing  
                             </p>
                        </div>    
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <!-- <label  for="fname" > First Name </label> -->
                                        <table class="welcome-input-table-double"   border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td> 
                                                    <input type="text" class="form-control" id="fname" placeholder="First Name"  value="<?php echo $lastname; ?>"  style=" margin-top: 6; "  />
                                                    <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="fname-error" >first name required</div>
                                                </td>
                                                <td> 
                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $firstname; ?>" />
                                                    <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                                </td>
                                        </table> 
                                    </li>
                                    <!-- <li class="list-group-item"> -->
                                        <!--<labe for="lname" > Last Name </labe><br>--> 
                                    <!-- </li> -->
                                    <li class="list-group-item">
                                        <table   border="0" cellpadding="0" cellspacing="0" >
                                            <tr>  
                                            <!-- </tr> -->
                                            <!-- <td> </td> -->
                                            <!-- <td  > <label for="lname" >Username</label> </td> -->
                                            <!-- <tr> </tr> -->
                                            <td style="width: 15%; " >
                                                <span  style="margin: 5px; border:none" >Fashionsponge.com/</span>
                                            </td>
                                            <td>
                                                <input type="text" id="uname" placeholder="Username"   value="<?php echo $username; ?>" style="width: 100%; padding:1%;border-radius: 5px;border: 1px solid #CACACA;" />
                                            </td>
                                            <tr></tr>
                                            <td></td>
                                            <td> <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="uname-error" >user exist</div> </td>
                                        </table>
                                    </li> 
                                    <li class="list-group-item"> 
                                        <input type="text" class="form-control" id="lname" placeholder="Blog name" value="<?php echo $blogName; ?>" />
                                        <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                    </li>

                                    <li class="list-group-item"> 
                                        <input type="text" class="form-control" id="lname" placeholder="Blog URL" value="<?php echo $blogUrl; ?>" />
                                        <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                    </li> 
                                    <li class="list-group-item">  
                                        <table class="welcome-input-table-double" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td> 
                                                   <select class="gender" id="gender" style="border: 1px solid rgb(180, 180, 180) !important;" >
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </td>
                                                <td> 
                                                    <input type="text" class="form-control" id="lname" placeholder="Are you a plus size blogger?" value="" />
                                                    <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                                </td>
                                        </table>  
                                    </li>
                                    <li class="list-group-item"> 
                                        <table border="0" style="margin: 0px auto">
                                            <tr> 
                                                <td>  
                                                    <div style="text-align:center; margin-top: -80px;" >
                                                        <h4> Profile Image</h4>
                                                    </div>
                                                </td> 
                                                <td> 
                                                   <div style="padding: 10px; " >
                                                        <!--<img src="http://fashionsponge.com/fs_folders/images/uploads/members/mem_profile/male-default-avatar.png"  class="img-responsive"  alt="Cinque Terre" width="100%" height="100%">-->
                                                        <center>
                                                            <!-- 
                                                                <img 
                                                                    id="img_prev" 
                                                                    class="profile-pic-default" 
                                                                    src="<?php echo $path; ?>fs_folders/images/genImg/new-postalook-post-arrow-up.png" 
                                                                    onclick="$('#f_image_profile_pic').click( )" 
                                                            >  -->

                                                            <img  
                                                                id="img_prev" 
                                                                class="profile-pic-default" 
                                                                src="<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article.png" 
                                                                onclick="$('#f_image_profile_pic').click( )" 
                                                                onmousemove=" mousein_change_button ( '#img_prev' , '<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article-mouse-over.png' )" 
                                                                onmouseout="mouseout_change_button (  '#img_prev' , '<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article.png' ) "
                                                            /> 



                                                        </center>  
                                                        </span>
                                                        <form action="<?php echo $path; ?>profile_crop_display.php" method="POST" enctype="multipart/form-data" id="upload-profile-pic">
                                                            <input type="file" id="f_image_profile_pic" name="file" runat="server" style="display:none;">
                                                            <!--<img id="avatar-right-uploadprofile" src="<?php echo $path; ?>fs_folders/images/genImg/change-profile.png" onclick="$('#f_image_profile_pic').click( );">-->
                                                        </form>
                                                    </div>         
                                                </td> 
                                            <tr>  
                                                <td> 

                                                </td>

                                                <td style="text-align: center;" >   
                                                    <img  
                                                        class="welcome-profile-browse" 
                                                        src="<?php echo $path; ?>fs_folders/images/post/browse.png" 
                                                        onclick="$('#f_image_profile_pic').click( )"
                                                        onmousemove=" mousein_change_button ( '.welcome-profile-browse' , '<?php echo $path; ?>fs_folders/images/post/browse-mouse-over.png' )" 
                                                        onmouseout="mouseout_change_button (  '.welcome-profile-browse' , '<?php echo $path; ?>fs_folders/images/post/browse.png' ) "
                                                    /> 
                                                </td>
                                        </table> 
                                    </li>
                                   
                                </ul> </div>
                            <div class="col-md-1"></div>
                        </div> 
                    </div> 
                </div> 
                <div>  
                    <div class="container-slide-1" >     
                        <div> 
                            <h3>
                                Select the topics your interested in
                            </h3>
                        </div> 
                        <div>
                            <p>
                             simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was pop
                             </p>
                        </div>   
                        <div class="welcome-brand-container" > 
                            <ul>
                            <?php for ($i=0; $i < 12; $i++): ?>
                                <li>  
                                    <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row1-', '<?php echo $i ?>', 'selected_1')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row1-', '<?php echo $i ?>')" id='img-thumbnail-hover-row1-<?php echo $i ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-1" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" style="width: 140px; height: 140px;">
                                    <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row1-', '<?php echo $i ?>')" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"  >  
                                </li>  
                            <?php endfor; ?> 
                            </ul> 
                        </div>  
                        <div style="clear:both">   
                        </div>

                         <div class="container">
                            <center>
                                <div style="margin:0px; auto" class="welcome-popup-more">
                                    
                                    <img src="<?php echo $path; ?>fs_folders/images/welcome-popup/button-1.png"  />
                                </div>
                            </center>
                        </div> 
                    </div> 
                </div>  
                <div>
                    <div class="container-slide-1" >     
                        <div> 
                            <h3>
                                What you enjoy reading
                            </h3>
                        </div> 
                        <div>
                            <p>
                                Select the topic you are interested in reading from each category.
                            </p>
                        </div>   

                        <div class="welcome-menu"  >
                            <ul>
                                <li> Fashion </li>         
                                <li> Beauty </li>         
                                <li> Lifestyle </li>         
                                <li> Entertainment </li>         
                            </ul>
                        </div>

                        <div style="clear:both">
                            
                        </div>

                        <div class="welcome-brand-container" > 
                            <ul>
                            <?php for ($i=0; $i < 12; $i++): ?>
                                <li>  
                                    <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row2-', '<?php echo $i ?>', 'selected_2')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row2-', '<?php echo $i ?>')" id='img-thumbnail-hover-row2-<?php echo $i ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-2" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" style="width: 140px; height: 140px;">
                                    <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row2-', '<?php echo $i ?>')" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true"  >  
                                </li>   
                            <?php endfor; ?> 
                            </ul> 
                        </div>  
                        <div style="clear:both">   
                        </div> 
                        <div class="container">
                            <center>
                                <div style="margin:0px; auto" class="welcome-popup-more">            
                                    <img src="<?php echo $path; ?>fs_folders/images/welcome-popup/button-1.png"  />
                                </div>
                            </center>
                        </div>
                    </div> 
                </div> 
            </div>  


            <!-- bullet navigator container --> 
            <div u="navigator" class="jssorb05" style="bottom: 40px; right: 6px; ">
                <!-- bullet navigator item prototype -->
                <div u="prototype"></div> 
            </div> 
            <div u="navigator" class="jssorb05" style="bottom: 16px;  width: 100%;">   
                <img    
                 
                     id="welcome-back"   
                    src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png' 
                    onclick="more_click ( '3' )" 
                    onmousemove=" mousein_change_button ( '#welcome-back' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back-mouse.png'  )" 
                    onmouseout="mouseout_change_button (  '#welcome-back'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png' ) "
                />  
                <img  
                    id="welcome-continue"  
                    style="margin-left:3px;" 
                    src="<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png"  
                    onmousemove=" mousein_change_button ( '#welcome-continue' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue-mouse.png'  )" 
                    onmouseout="mouseout_change_button (  '#welcome-continue'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png' ) "
                />  
            </div>
 
            <!-- Arrow Left -->
            <!-- <span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;">
            </span> -->
            <!-- Arrow Right -->
            <!-- <span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;">
            </span> -->
            <!--#endregion Arrow Navigator Skin End -->
            <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
        </div>
        <!-- Jssor Slider End -->
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $path1; ?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $path1; ?>/examples-bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $path1; ?>/examples-bootstrap/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $path1; ?>/ie10-viewport-bug-workaround.js"></script>

    <!-- jssor slider scripts-->
    <!-- use jssor.js + jssor.slider.js instead for development -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="<?php echo $path1; ?>/js/jssor.slider.mini.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 12,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                }
            };

            //Make the element 'slider1_container' visible before initialize jssor slider.
            $("#slider1_container").css("display", "block");
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);





                console.log('this is log');
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);





            //responsive code end
        });
    </script>

      <!--#endregion Bullet Navigator Skin End -->
            
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
            <style>
                /* jssor slider arrow navigator skin 11 css */
                /*
                .jssora11l                  (normal)
                .jssora11r                  (normal)
                .jssora11l:hover            (normal mouseover)
                .jssora11r:hover            (normal mouseover)
                .jssora11l.jssora11ldn      (mousedown)
                .jssora11r.jssora11rdn      (mousedown)
                */
                .jssora11l, .jssora11r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 37px;
                    height: 37px;
                    cursor: pointer;
                    background: url(../img/a11.png) no-repeat;
                    overflow: hidden;
                }
                .jssora11l { background-position: -11px -41px; }
                .jssora11r { background-position: -71px -41px; }
                .jssora11l:hover { background-position: -131px -41px; }
                .jssora11r:hover { background-position: -191px -41px; }
                .jssora11l.jssora11ldn { background-position: -251px -41px; }
                .jssora11r.jssora11rdn { background-position: -311px -41px; }
            </style>

              <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
            <style>
                /* jssor slider bullet navigator skin 05 css */
                /*
                .jssorb05 div           (normal)
                .jssorb05 div:hover     (normal mouseover)
                .jssorb05 .av           (active)
                .jssorb05 .av:hover     (active mouseover)
                .jssorb05 .dn           (mousedown)
                */
                .jssorb05 {
                    position: absolute;
                }
                .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                    position: absolute;
                    /* size of bullet elment */
                    width: 16px;
                    height: 16px;
                    background: url(<?php echo $path1; ?>/img/b05.png) no-repeat;
                    overflow: hidden;
                    cursor: pointer;
                }
                .jssorb05 div { background-position: -7px -7px; }
                .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
                .jssorb05 .av { background-position: -67px -7px; }
                .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
            </style>
</body>
</html>