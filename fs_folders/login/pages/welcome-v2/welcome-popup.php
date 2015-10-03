<?php

    $mc = new myclass();


//    session_start();
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

    $blogName     =  $mc->blog_name;
    $blogUrl      =  $mc->blogdom;
    $firstname    =  $mc->firstname;
    $lastname     =  $mc->lastname;
    $username     =  $mc->identity_username ;
    $gender       =  $mc->gender;
    $plus_blogger =  $mc->plus_blogger ;



    //     echo "<h2>
    //     mno = $mc->mno <br>
    //     fullname = $mc->fullname <br>
    //     gender = $mc->gender   <br>
    //     plus_blogger = $mc->plus_blogger <br>
    //     lastname = $mc->lastname <br>
    //     firstname = $mc->firstname <br>
    //     identity_username = $mc->identity_username <br>
    //     blog_name = $mc->blog_name <br>
    //     $mc->blogdom <br>
    // </h2>";


  use app\Brand;
 $db = new Database();
 $db->connect();

$brand             = new Brand($db, $mc->mno);
$brandContent      = $brand->brand(0,$brand->category('','','','brand'),2,'welcome','','bno desc', 12);
$brandContent1     = $brand->brand(0,$brand->category('','','','topic'),2,'welcome','','bno desc', 12);

$brandContent_len  = (count($brandContent) < 12) ? count($brandContent) : 12;
$brandContent1_len = (count($brandContent1) < 12) ? count($brandContent1)  : 12;



//$brand2 = $brand->category(0, 0, 0, 'brand', 'bcno desc', '1,2');
//print_r($brandContent);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $path = ''; ?>
    <?php $path1 = 'fs_folders/login/pages/welcome-v2'; ?>
<!--    <!-- title and meta -->
<!--    <meta charset="utf-8" />-->
<!--    <meta name="viewport" content="width=device-width,initial-scale=1.0" />-->
<!--    <meta name="description" content="In this lab, we make a responsive content slider jQuery plugin" />-->
<!--    <title>A Responsive Content Slider jQuery Plugin</title>-->
<!---->


    <!-- Bootstrap core CSS -->
<!--    <link href="--><?php //echo $path1; ?><!--/css/bootstrap.min.css" rel="stylesheet" />-->

    <link href="<?php echo $path; ?>fs_folders/gen_css/gen_style.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo $path; ?>fs_folders/js/function_js.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>fs_folders/js/welcome.js" >  </script>

    <link rel="stylesheet" href="<?php echo $path; ?>fs_folders/login/pages/welcome/welcome-about-user-style.css" >


    <!-- css -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo $path1; ?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo $path1; ?>/css/style.css" />

    <!-- js -->
    <script src="<?php echo $path1; ?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $path1; ?>/js/jquery.cslide.js" type="text/javascript"></script>




    <script>
        loadSelectedBrand();
    </script>



    <?php

        $open = ( !empty($_GET['change']) ) ? $_GET['change'] : '';

        if($open == 'style') { ?>
                <script>
                    $(document).ready(function(){
                        console.log('test style');
                        //if 0 hide 0 and 2 show 1
                        $('#welcome-slide-container-0').css({'display':'none'});
                        $('#welcome-slide-container-1').css({'display':'block'});
                        $('#welcome-slide-container-2').css({'display':'none'});
                    });
                </script>
            <?php
        } else if ($open == 'topic') {
            ?>
                <script>
                    $(document).ready(function(){
                        console.log('test topic');
                        //if 0 hide 0 and 2 show 1
                        $('#welcome-slide-container-0').css({'display':'none'});
                        $('#welcome-slide-container-1').css({'display':'none'});
                        $('#welcome-slide-container-2').css({'display':'block'});
                    });
                </script>
            <?php

        } else {
            ?>
                <script>
                    $(document).ready(function(){
                            $('#welcome-slide-container-0').css({'display':'block'});
                            $('#welcome-slide-container-1').css({'display':'block'});
                            $('#welcome-slide-container-2').css({'display':'block'});
                    });
                </script>
            <?php
        }




    ?>

    <script>
        $(document).ready(function(){
            $("#cslide-slides").cslide();

        });
    </script>


</head>
<body style="overflow-x:hidden"  >
    <div id="wrapper" class="welcome-container">
        <div id="main"> 
        <div class="welcome-left-cover hide" >
        </div> 
        <div class="welcome-right-cover hide" >
        </div> 
            <div class="container"> 
                <section id="cslide-slides" class="cslide-slides-master clearfix">
                    <div class="cslide-slides-container clearfix"> 
                        <div id="welcome-slide-container-0" class="cslide-slide">
                            <div  class="container-slide-2"  > 
                                <div class="welcome-slide-title">
                                    <h2>
                                        About you..
                                    </h2>
                                    <span>
                                         Fill out the required fields to create your account.
                                    </span>
                                </div> 
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="width: 775px; margin-left: -39px;">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <!-- <label  for="fname" > First Name </label> -->
                                                <table class="welcome-input-table-double"   border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <input onkeydown="welcome_about()" type="text" class="form-control" id="fname" placeholder="First Name"  value="<?php echo $firstname; ?>"  style=" margin-top: 6; "  />
                                                            <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="fname-error" >first name required</div>
                                                        </td>
                                                        <td>
                                                            <input onkeydown="welcome_about()" type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $lastname; ?>" />
                                                            <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                                        </td>
                                                </table>
                                            </li>
                                            <li class="list-group-item">
                                                <table   border="0" cellpadding="0" cellspacing="0" >
                                                    <tr>
                                                        <td style="width: 15%; " >
                                                            <span  style="margin: 5px; border:none" >Fashionsponge.com/</span>
                                                        </td>
                                                        <td>
                                                            <input autocomplete=off onkeyUp="welcome_about('username-error', 'uname', 'checking-username')" type="text" id="uname" placeholder="Username"   value="<?php echo $username; ?>" style="width: 100%; padding:1%;border-radius: 5px;border: 1px solid #CACACA;" />

                                                            <div id="username-error" class='error-container' >
                                                            </div> 
                                                            <input type="text" value=""  id="username-error-validate" style="display:none"  />
                                                        </td>
                                                    <tr></tr>
                                                    <td></td>
                                                    <td> <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="uname-error" >user exist</div> </td>
                                                </table>
                                            </li>
                                            <li class="list-group-item">
                                                <input  autocomplete=off onkeyUp="welcome_about('bname-error', 'bname', 'checking-bname')" type="text" class="form-control" id="bname" placeholder="Blog name" value="<?php echo $blogName; ?>" />
                                                <!-- <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div> -->
                                                <div id="bname-error" class='error-container' ></div>
                                                <input type="text" value=""  id="bname-error-validate" style="display:none"  />
                                                
                                            </li>
                                            <li class="list-group-item">
                                                <input  autocomplete=off onkeyUp="welcome_about('burl-error', 'burl', 'checking-burl')" type="text" class="form-control" id="burl" placeholder="Blog URL" value="<?php echo $blogUrl; ?>" />
                                                <!-- <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div> --> 
                                                <div id="burl-error" class='error-container' ></div> 
                                                <input type="text" value=""  id="burl-error-validate" style="display:none" />
                                                
                                            </li>
                                            <li class="list-group-item">
                                                <table class="welcome-input-table-double" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <select onchange="welcome_about()" class="gender" id="gender" >
                                                                <?php
                                                                    if($gender == 'Female') {
                                                                        echo "
                                                                          <option>Gender</option>
                                                                          <option>Male</option>
                                                                          <option selected>Female</option>
                                                                       ";
                                                                    }
                                                                    elseif($gender == 'Male') {
                                                                        echo "
                                                                            <option>Gender</option>
                                                                            <option selected>Male</option>
                                                                            <option>Female</option>
                                                                        ";
                                                                    }
                                                                    else {
                                                                        echo "
                                                                            <option selected>Gender</option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select onchange="welcome_about()" id="plus-blogger" class="form-control"  > 
                                                            <?php

                                                                 if($plus_blogger == 'Yes') {
                                                                        echo "
                                                                            <option >Are you a plus size blogger?</option>
                                                                            <option selected>Yes</option>
                                                                            <option >No</option>
                                                                       ";
                                                                    }
                                                                    elseif($plus_blogger == 'No') {
                                                                        echo "
                                                                             <option>Are you a plus size blogger?</option>
                                                                             <option>Yes</option>
                                                                             <option selected>No</option>
                                                                        ";
                                                                    }
                                                                    else {
                                                                        echo "
                                                                            <option selected>Are you a plus size blogger?</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        ";
                                                                    }
                                                            ?>  
                                                            </select>
                                                            <div style="border:1px solid none; text-align: left; font-size: 11px; color:red; display:none" id="lname-error" >last name required</div>
                                                        </td>
                                                </table>
                                            </li>
                                            <li class="list-group-item">
                                                <table border="1" style="margin: 0px auto;">
                                                    <tr>
                                                        <td>
                                                            <div class='profile-image-text' >
                                                                <h5> Profile Image</h5>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div style="padding: 10px; " class='welcome-profile-upload-container'  >
                                                                    image

                                                                <!--
                                                                    <img
                                                                        id="img_prev"
                                                                        class="profile-pic-default"
                                                                        src="<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article.png"
                                                                        onclick="$('#f_image_profile_pic1').click( )"
                                                                        onmousemove=" mousein_change_button ( '#img_prev' , '<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article-mouse-over.png' )"
                                                                        onmouseout="mouseout_change_button (  '#img_prev' , '<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article.png' ) "
                                                                    />
                                                                 -->



                                                                <img
                                                                    id="img_prev"
                                                                    class="profile-pic-default"
                                                                    src="<?php echo $path; ?>fs_folders/images/welcome-popup/upload-article.png"
                                                                    onclick="$('#f_image_profile_pic1').click( )"
                                                                />

                                                                </span>
                                                                <form action="<?php echo $path; ?>profile_crop_display.php" method="POST" enctype="multipart/form-data" id="upload-profile-pic" >
                                                                    <input type="file" id="f_image_profile_pic1" name="file" runat="server" style="display:none;" value="" >
                                                                </form>
                                                            </div>
                                                        </td>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td style="text-align: left;  " >


                                                            <img
                                                                class="welcome-profile-browse"
                                                                src="<?php echo $path; ?>fs_folders/images/post/browse.png"
                                                                onclick="$('#f_image_profile_pic1').click( )"
                                                                onmousemove=" mousein_change_button ( '.welcome-profile-browse' , '<?php echo $path; ?>fs_folders/images/post/browse-mouse-over.png' )"
                                                                onmouseout="mouseout_change_button (  '.welcome-profile-browse' , '<?php echo $path; ?>fs_folders/images/post/browse.png' ) "
                                                            />
                                                            <div class="welcome-about-avatar-crop"    style="display:block">
                                                                <input type="checkbox"  id="welcome-about-avatar-crop-input" checked> <span> I want to crop </span>
                                                            </div>
                                                        </td>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="cslide-prev-next clearfix welcome-next-prev-about">
                                <div class="welcome-bullet bullet-about" >
                                    <ul style="margin-left:30px" >
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/dark-grey-dot.png" />
                                        </li>
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                        </li>
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <img
                                        class="cslide-next next-about "
                                        id="welcome-continue"
                                        style="margin-left:3px;"
                                        src="<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png"
                                        onmousemove=" mousein_change_button ( '#welcome-continue' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue-mouse.png'  )"
                                        onmouseout="mouseout_change_button (  '#welcome-continue'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png' ) "
                                        onclick="welcome_select_brand_tab('All Style', '1')"
                                    />
                                </a>
                            </div>
                        </div>

                        <div id="welcome-slide-container-1" class="cslide-slide">

                        <div class="container-slide-1" >
                            <div class="welcome-slide-title-brand">
                                <h2>
                                    Select brands
                                </h2>
                                <div>
                                    <p>
                                        Select all the brands you wear and like.
                                        <!-- Select all the brands you wear and like. Select all the topics you enjoy reading about. 5 brands will ensure you are paired with and people who share your interest.-->
                                    </p>
                                </div>
                            </div>

                            <div>
                                <input type="text" value="" placeholder="" id="welcome-brand-field" class="welcome-popup-select-field" />
                            </div>

                            <div class="welcome-menu welcome-menu-style"  >
                                <ul>
                                    <li id='brand-tab-1' class='active'  >
                                        <div onclick="welcome_select_brand_tab('All Style', '1')"  >All Style</div>
                                    </li>
                                    <li id='brand-tab-2' > <div onclick="welcome_select_brand_tab('Bohemian', '2', 'brand')"                 >Bohemian</div></li>
                                    <li id='brand-tab-3' > <div onclick="welcome_select_brand_tab('Casual', '3', 'brand')"                   >Casual</div></li>
                                    <li id='brand-tab-4' > <div onclick="welcome_select_brand_tab('Chic', '4', 'brand')"                     >Chic</div></li>
                                    <li id='brand-tab-5' > <div onclick="welcome_select_brand_tab('Grunge', '5', 'brand')"                   >Grunge</div></li>
                                    <li id='brand-tab-6' > <div onclick="welcome_select_brand_tab('Menswear', '6', 'brand')"                 >Menswear</div></li>
                                    <li id='brand-tab-8' > <div onclick="welcome_select_brand_tab('Preppy', '8', 'brand')"                   >Preppy</div></li>
                                    <li id='brand-tab-7' > <div onclick="welcome_select_brand_tab('Streetwear', '7', 'brand')"               >Streetwear</div></li>
                                    <li>
                                        <select id="welcome-gender-brand" style="display:none" >
                                            <option value="all gender" >All gender</option>
                                            <option value="male" >Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="welcome-loader-container" >
                                <?php $mc->image( array('type'=>'loader', 'id'=>'welcome-loader-brand' ) ); ?>
                            </div>
                            <div style="clear:both"> </div>
                            <center>
                                <div class="welcome-brand-container" >
                                    <div style="clear:both"> </div>
                                    <ul id="welcome-container-ul-row1" >
                                        <?php for ($i=0; $i < $brandContent_len; $i++): ?>
                                            <?php
                                                $bno  = $brandContent[$i]['bno'];
                                                $bcno = $brandContent[$i]['bcno'];
                                                $branCategoryContent = $brand->category($bcno);
                                                $type = $branCategoryContent[0]['type'];
                                                $path1 = 'fs_folders/images/uploads/brands/' . $bno . '_' . $type . '.jpg';
                                            ?>
                                            <li>
                                                <table>
                                                    <tr></tr>
                                                    <td>
                                                        <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row1-', '<?php echo $bno ?>', 'selected_1', '#welcome-show-more-row1')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row1-', '<?php echo $bno ?>')" id='img-thumbnail-hover-row1-<?php echo $bno ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-1" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" >
                                                        <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row1-', '<?php echo $bno ?>')" class="img-thumbnail" alt="140x140" src="<?php echo $path1; ?>" data-holder-rendered="true"  >
                                                    </td>
                                                </table>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                    <div style="clear:both"> </div>
                                </div>
                            </center>
                            <div style="clear:both">
                            </div>
                            <div class="container">
                                <center>
                                    <div style="margin:0px; auto" class="welcome-popup-more" id="welcome-popup-brand1">
                                        <img src="<?php echo $path; ?>fs_folders/images/welcome-popup/button-1.png"  />
                                        <input type="button" value="more brands..." id="welcome-show-more-row1" onclick="welcome_select_brand_more('All style', '2')" >
                                        <!-- <input type="button" value="more topics" id="welcome-show-more-row2" onclick="welcome_select_brand_more('#welcome-container-ul-row2', 'brand')" > -->
                                    </div>
                                </center>
                            </div>
                            <div class="container">
                                <center>
                                    welcome_select_brand_tab
                                </center>
                            </div>
                        </div>
                        <div class="cslide-prev-next clearfix welcome-next-prev-style"> 
                            <?php if($open == 'style'){ ?>
                                <a href="#">
                                    <input type="button"   id="welcome-style-save" value="Save" onclick="saveAjax('style', '#login-wrapper', 'account')" >
                                </a>
                            <?php } else {   ?>
                                <div class="welcome-bullet bullet-style" >
                                    <ul style="margin-top: -20px;position: absolute; margin-left:30px">
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                        </li>
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/dark-grey-dot.png" />
                                        </li>
                                        <li>
                                            <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                        </li>
                                    </ul>
                                </div> 
                                <a href="#">
                                    <img
                                        class="cslide-prev prev-style"
                                        id="welcome-back"
                                        src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png'
                                        onclick="more_click ( '3' )"
                                        onmousemove="mousein_change_button ( '#welcome-back' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back-mouse.png'  )"
                                        onmouseout="mouseout_change_button ( '#welcome-back'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png' ) "
                                        />
                                </a>
                                <a href="#">
                                    <img
                                        class="cslide-next next-style"
                                        id="welcome-continue"
                                        style="margin-left:3px;"
                                        src="<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png"
                                        onmousemove=" mousein_change_button ( '#welcome-continue' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue-mouse.png'  )"
                                        onmouseout="mouseout_change_button (  '#welcome-continue'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png' ) "
                                        onclick="welcome_select_brand_tab('All Topics', '1', 'topic')"
                                        />
                                </a>
                            <?php  } ?>
                        </div>
                    </div> 
                        <div id="welcome-slide-container-2" class="cslide-slide">
                            <div class="container-slide-1" >
                                <div class="welcome-slide-title-brand">
                                    <div>
                                        <h3>
                                            What do you enjoy reading?
                                        </h3>
                                    </div>
                                    <div>
                                        <p>
                                            <!-- Selecting more then the required 5 topics will ensure you are shown articles on topics you love reading about.-->
                                            Select all the topics you enjoy reading about.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <input type="text" value="" placeholder="" id="welcome-topic-field" class="welcome-popup-select-field" />
                                </div>
                                <div class="welcome-menu welcome-menu-style welcome-menu-topic"  >
                                    <ul>
                                        <li id='topic-tab-1' class='active'><div   onclick="welcome_select_brand_tab('All Topics', '1', 'topic')"   >All Topics</div></li>
                                        <li id='topic-tab-2' > <div onclick="welcome_select_brand_tab('Fashion', '2', 'topic')"                    >Fashion</div> </li>
                                        <li id='topic-tab-3' > <div onclick="welcome_select_brand_tab('Beauty', '3', 'topic')"                     >Beauty</div> </li>
                                        <li id='topic-tab-4' > <div onclick="welcome_select_brand_tab('Lifestyle', '4', 'topic')"                  >Lifestyle</div> </li>
                                        <li id='topic-tab-5' > <div onclick="welcome_select_brand_tab('Entertainment', '5', 'topic')"              >Entertainment</div> </li>
                                        <!--
                                            <li>
                                                <select id="welcome-gender-topic"  >
                                                    <option value="all gender" >All gender</option>
                                                    <option value="male" >Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </li>
                                        !-->
                                    </ul>
                                </div>
                                <div class="welcome-loader-container" >
                                    <?php $mc->image( array('type'=>'loader', 'id'=>'welcome-loader-topic' ) ); ?>
                                </div>
                                <div style="clear:both">
                                </div>
                                <div class="welcome-brand-container" >
                                    <ul id="welcome-container-ul-row2" >
                                        <?php for ($i=0; $i < $brandContent1_len; $i++): ?>
                                            <?php
                                            $bno  = $brandContent1[$i]['bno'];
                                            $bcno = $brandContent1[$i]['bcno'];
                                            $branCategoryContent = $brand->category($bcno);
                                            $type = $branCategoryContent[0]['type'];
                                            $path1 = 'fs_folders/images/uploads/brands/' . $bno . '_' . $type . '.jpg';
                                            ?>
                                            <li>
                                                <img onclick=" welcome_thumbnail_select('#img-thumbnail-hover-row2-', '<?php echo $bno ?>', 'selected_2', '#welcome-show-more-row2')" onmouseout="welcome_thumbnail_out('#img-thumbnail-hover-row2-', '<?php echo $bno ?>')" id='img-thumbnail-hover-row2-<?php echo $bno ?>' class="img-thumbnail  img-thumbnail-hover img-thumbnail-row-2 img-thumnail-row-2-<?php echo $bno ?>" alt="140x140" src="fs_folders/images/welcome-popup/select-check.png" data-holder-rendered="true" style="width: 140px; height: 140px;">
                                                <img onmouseover="welcome_thumbnail_hover('#img-thumbnail-hover-row2-', '<?php echo $bno ?>')" class="img-thumbnail" alt="140x140" src="<?php echo $path1; ?>" data-holder-rendered="true"  >
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                                <div style="clear:both">
                                </div>
                                <div class="container">
                                    <center>
                                        <div style="margin:0px; auto" class="welcome-popup-more" id="welcome-popup-brand2">

                                            <img src="<?php echo $path; ?>fs_folders/images/welcome-popup/button-1.png"  />
                                            <input type="button" value="more topics..." id="welcome-show-more-row1" onclick="welcome_select_brand_more('All topics', '2', 'topic')" >
                                            <!-- <input type="button" value="more topics" id="welcome-show-more-row2" onclick="welcome_select_brand_more('#welcome-container-ul-row2', 'brand')" > -->
                                        </div>
                                    </center>
                                </div>
                            </div>

                                <div class="cslide-prev-next clearfix welcome-next-prev-topic">
                                    <?php if($open == 'topic'){ ?>
                                        <a href="#">
                                            <input type="button"   id="welcome-topic-save" value="Save" onclick="saveAjax('topic', '#login-wrapper', 'account')" >
                                        </a>
                                    <?php } else { ?>
                                        <div class="welcome-bullet bullet-topic" >
                                            <ul style="margin-top: -20px;position: absolute; margin-left:30px" >
                                                <li>
                                                    <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                                </li>
                                                <li>
                                                    <img src="fs_folders/images/welcome-popup/grey-dot.png" />
                                                </li>
                                                <li>
                                                    <img src="fs_folders/images/welcome-popup/dark-grey-dot.png" />
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img
                                                class="cslide-prev prev-topic"
                                                id="welcome-back"
                                                src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png'
                                                onclick="more_click ( '3' )"
                                                onmousemove=" mousein_change_button ( '#welcome-back' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back-mouse.png'  )"
                                                onmouseout="mouseout_change_button (  '#welcome-back'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/back.png' ) "
                                                />
                                        </a>
                                        <a href="#">
                                            <img
                                                class="cslide-next next-topic cslide-disabled"
                                                id="welcome-continue"
                                                src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue-mouse.png'
                                                onclick="save()"
                                                onmousemove=" mousein_change_button ( '#welcome-back' , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue-mouse.png'  )"
                                                onmouseout="mouseout_change_button (  '#welcome-back'  , src='<?php echo $path; ?>fs_folders/images/welcome-popup/continue.png' ) "
                                            />
                                        </a>
                                    <?php } ?>
                                </div>
                        </div>

                    </div>
                </section><!-- /sliding content section -->



            </div>
        </div><!-- #main -->

        <footer>
        </footer><!-- /footer -->

    </div><!-- /#wrapper -->
</body>
</html>