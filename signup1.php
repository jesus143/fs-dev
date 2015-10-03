<?php 
  require("fs_folders/php_functions/connect.php");
  require("fs_folders/php_functions/function.php");
  require("fs_folders/php_functions/myclass.php");
  require("fs_folders/php_functions/library.php");
  require("fs_folders/php_functions/source.php");  
  require 'fs_folders/php_functions/Database/LookbookDatabase.php';
  require_once ("fs_folders/php_functions/Database/Invited.php");
  require_once ("fs_folders/php_functions/Database/InvitedQueue.php");
  require_once ("fs_folders/php_functions/Log/Log.php");





 $invited      = new Invitation\Invited();
 $invitedQueue = new \Invitation\InvitedQueue();
 $mc           = new myclass();



$invited      = new Invitation\Invited();
$invitedQueue = new \Invitation\InvitedQueue();
$database     = new Database();
$database->connect();


//    $invited->setInvitedInfoByEmail($email,$database);
//    if($invited->isEmailExist($email))
//        $invitedQueue->setInvitedQueueById($qId,$database);
//        $invited->updateInvitedStatus($invitedQueue->getInvitedId(), 6);
//    }


//initialized
$signUp = false;
$qId    = (!empty($_GET['qId']) ? $_GET['qId'] : 0 ); //107;
$email  = (!empty($_GET['email']) ? $_GET['email'] : 'mrjesuserwinsuarez@gmail.com' ); //'jesus@gmail.com';
// 6 = is sign up pending


Log::addExecutionLog("Email = $email qId = $qId  ");


//validate and conditions


if(!empty($qId) and !empty($email))
{
    $invited->_setInvitedInformationByQid($qId, $database);

    if($invited->getEmail() == $email)
    {
        if ($invited->getStatus() == 2) {

            Log::addExecutionLog("Information officially sign up");
        }
        elseif ($invited->getStatus() == 3) {
            Log::addExecutionLog("Information already a member");
        }
        elseif ($invited->getStatus() == 7) {

            Log::addExecutionLog("Information sign up but still pending");
        }





        elseif($invited->updateInvitedStatus($invited->getInvitedId(), 7, $database)) {

            if($invitedQueue->updateQueueStatus($qId, 1, $database)) {

                $signUp = true;


            }
            else {

                Log::addExecutionLog("Failed to update the queue status = 1");
            }

        }
        else {

            Log::addExecutionLog("Failed to update the invited status to 6");
        }
    } else {
        Log::addExecutionLog("Email url is not match in the database using qId");
    }
}
else
{
    Log::addExecutionLog("Email or qId is empty");
}


if($signUp) {

    Log::addExecutionLog("Successfully sign up");

} else {

    Log::addExecutionLog("Failed sign up");

}


// echo "Execution Log : " . Log::printExecutionLog();






    if ($signUp == true) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <script src="http://connect.facebook.net/en_US/all.js"></script>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <?php
                $mc->header_attribute(
                    "A better way to discover Fashionable People, Places and Things.",
                    "So if you need exposure, enjoy discovering, like being inspired and would love feedback… Sign up now! Space is limited. ",
                    "best fashion community on the web, new fashion community, fashion social network, current fashion trends, fall fashion trends, spring fashion trends, summer fashion trends, fashion trends and accessories, real fashion, emerging fashion trends, street style fashion inspiration, chic fashion inspiration, menswear fashion inspiration, streetwear fashion inspiration, fashion inspiration, beauty tips, ootd, fashion blogs, best fashion bloggers, menswear fashion bloggers, preppy fashion bloggers, streetwear fashion bloggers, latest fashion, fashion news, celebrity fashion, how to fashion tips, dyi fashion, beauty hauls, men fashion models, female fashion models",
                    array('type' => 'responsive')
                );
            ?>

            <script type="text/javascript" src='fs_folders/js/jQv1.8.2.js'></script>
            <script type="text/javascript" src='fs_folders/js/function_js.js'></script>
            <script type="text/javascript" src="fs_folders/invite/reg_js/cycle.js"></script>
            <script type="text/javascript" src='fs_folders/signup/signup.js'></script>
            <link rel="stylesheet" type="text/css" href="fs_folders/signup/signup.css">
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#fn').text(name);
                    set_center('#invite-popup-response-wrapper');
                    $('#invite_after_submit').fadeIn("slow");
                    $('#signup-container-responsive').css('display', 'none');
                    $('body').css('background-color', 'rgba(000,000,000,0.8)');
                });
            </script>
        </head>

        <body>
        <?php
        echo "<div style='display:none' >";
        LookbookDataBase::$database = $db;
        LookbookDataBase::$database->connect();
        $email = (!empty($_GET['email'])) ? $_GET['email'] : '';
        // LookbookDataBase::updateEmailToOfficiallySignup($email);
        // $blog =  LookbookDataBase::getBlogByEmail($email);
        echo "</div>";
        $fname = LookbookDataBase::getFirstNameByEmail($email);
        $mc->signup_popUp_responnsive1(true, ' ' . $fname);
        ?>
        </body>
        </html>


    <?php
    } else {

        $email = '';
        $blog = '';  ?>
        <!-- <br /><b>Notice</b>:  Undefined variable: blog in <b>E:\xampp\htdocs\fs\new_fs\alphatest\signup.php</b> on line <b>107</b><br /> -->
        <!DOCTYPE html>
        <html lang="en">
        <head>

            <script src="http://connect.facebook.net/en_US/all.js"></script>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php
            $mc->header_attribute(
                "A better way to discover Fashionable People, Places and Things.",
                "So if you need exposure, enjoy discovering, like being inspired and would love feedback… Sign up now! Space is limited. ",
                "best fashion community on the web, new fashion community, fashion social network, current fashion trends, fall fashion trends, spring fashion trends, summer fashion trends, fashion trends and accessories, real fashion, emerging fashion trends, street style fashion inspiration, chic fashion inspiration, menswear fashion inspiration, streetwear fashion inspiration, fashion inspiration, beauty tips, ootd, fashion blogs, best fashion bloggers, menswear fashion bloggers, preppy fashion bloggers, streetwear fashion bloggers, latest fashion, fashion news, celebrity fashion, how to fashion tips, dyi fashion, beauty hauls, men fashion models, female fashion models",
                array('type' => 'responsive')
            );
            ?>
            <script type="text/javascript" src='fs_folders/js/jQv1.8.2.js'></script>
            <script type="text/javascript" src='fs_folders/js/function_js.js'></script>
            <script type="text/javascript" src="fs_folders/invite/reg_js/cycle.js"></script>
            <script type="text/javascript" src='fs_folders/signup/signup.js'></script>
            <link rel="stylesheet" type="text/css" href="fs_folders/signup/signup.css">
            <?php $mc->signup_popUp_responnsive(true, ''); ?>
            <?php $mc->login_popup(136, 'login'); ?>

            <script type="text/javascript">
                var bool = detectmob();
                if (bool == true) {
                    alert('You are viewing using mobile device, please rotate your mobile to get the best experience of viewing..')
                }
            </script>
        </head>
        <body itemscope itemtype="http://schema.org/Product">
        <?php
        $mc->share_modal_dropdown(
            array(
                'type' => 'pageinfo-to-retrieved-social-share',
                'table_name' => 'signup',
                'title' => 'Instantly sign up and be one of the first to experience Fashion Sponge.',
                'description' => "OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration",
            )
        );
        ?>
        <div class="container" id="signup-container-responsive">
        <!-- rows  -->
        <!-- src: http://getbootstrap.com/examples/grid/ -->
        <!-- header menu for logo and login  -->
        <div id="signup-header-menu">
            <div>
                <a href="\">
                    <img src="fs_folders/images/genImg/logo-fashionsponge1.png" style="height:30px;">
                </a>
                <a href="\?login=1" id="signup-header-login">
                    <img src="fs_folders/images/genImg/log-in-mouse-over-signup.png">
                </a>
            </div>
        </div>


        <div id="signup-footer-image-signup-fields-header1">
            <center>
                <div class="jumbotron" id="signup-header-banners">
                    <div id="signup-row-title-1">
                        A BETTER WAY TO DISCOVER
                    </div>

                    <div id="signup-row-title-1">
                        FASHIONABLE
                    </div>
                    <div id="signup-row-title-2" style="margin-top: 18;"  >
                        PEOPLE, PLACES AND THINGS
                    </div>
                    <div id="signup-row-title" style="padding-bottom: 26;" >
                        Sign up now! Space is limited.
                    </div>
                    <div id="signup-row-content">
                        Enter your email address to recieved an invite to our private beta. Space is limited so sign up
                        now.
                    </div>
                    <div id="signup-field-for-email-website-container" style="padding-bottom: 8;" >
                        <div class="row">
                            <div class="col-md-1" id="col1">
                            </div>
                            <div class="col-md-5" id="col2">

                                <input value="<?php echo $email; ?>" placeholder="E-MAIL" type="text"
                                       class="form-control" id="email2_11"
                                       onkeyup="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-not' , event )"
                                       required="" autofocus="">
                            </div>
                            <div class="col-md-5" id="col3">
                                <div class="input-group">
                                    <input value="<?php echo $blog; ?>" placeholder="WEBSITE / BLOG" type="text"
                                           class="form-control" id="web_blog_11"
                                           onkeyup="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-not' , event )"
                                           style="color: rgb(161, 25, 33);">
                                      <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                                onclick="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-yes' , event )"
                                                id="signup-button-submit"> Submit
                                        </button>
                                      </span>
                                </div>
                            </div>
                            <div class="col-md-1" id="col4">
                            </div>
                        </div>
                    </div>
                    <div id="signup-row-content" style=" border:1px solid none;width:520px; margin-top:10px;">
                        *Quality supersedes quantity. Membership is restricted to people who's website / blog proves they
                        create content that's both high quality and compelling.
                    </div>
                </div>
            </center>
        </div>
        <!-- body -->
        <div id="signup-body-four-purpose">
            <div class="row">
                <div class="col-md-3" id="col1">
                    <div id="container">
                        <center>
                            <img src="fs_folders/images/genImg/signup-exposure-icon-red.png" style="height:70px">
                        </center>
                        <div id="private-signup-title-2" class="fs-text-blue"
                             style="margin-top:10px; text-align:center; border:1px solid none;">
                            EXPOSURE
                        </div>
                        <div id="private-signup-title-1" class="fs-text-blue"
                             style=" margin:auto;  margin-top:20px;  width:90%; border:1px solid none;;   ">
                            Get exposure by continuously posting content and engaging with members.
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="col2">
                    <div id="container">
                        <center>
                            <img src="fs_folders/images/genImg/signup-discover-icon-red.png" style="height:70px">
                        </center>
                        <div id="private-signup-title-2" class="fs-text-blue"
                             style="margin-top:10px; text-align:center;border:1px solid none;  ">
                            DISCOVER
                        </div>
                        <div id="private-signup-title-1" class="fs-text-blue"
                             style="margin:auto;  margin-top:20px;  width:90%;  border:1px solid none;  ">
                            Discovering fashionable people, places and things couldn't be easier.
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="col3">
                    <div id="container">
                        <center>
                            <img src="fs_folders/images/genImg/signup-learn-icon-red.png" style="height:70px">
                        </center>
                        <div id="private-signup-title-2" class="fs-text-blue"
                             style="margin-top:10px; text-align:center;border:1px solid none; ">
                            INSPIRATION
                        </div>
                        <div id="private-signup-title-1" class="fs-text-blue"
                             style=" margin:auto; margin-top:20px;  width:90%;  border:1px solid none;   ">
                            <!-- Be inspired by some of the best content creators and most stylish people on the web.   -->
                            Be inspired by some of the best bloggers and most stylish people on the web.
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="col4">
                    <div id="container">
                        <center>
                            <img src="fs_folders/images/genImg/sigmup-feedback-icon-red.png" style="height:70px">
                        </center>
                        <div id="private-signup-title-2" class="fs-text-blue"
                             style="margin-top:10px; text-align:center;border:1px solid none; ">
                            FEEDBACK
                        </div>
                        <div id="private-signup-title-1" class="fs-text-blue"
                             style=" margin:auto;  margin-top:20px;  width:90%; border:1px solid none;   ">
                            Become a better blogger and dresser by seeing how the community rates your content.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="signup-body-reasons">
            <center>
                <div class="jumbotron">
                    <div id="private-signup-title-2" class="fs-text-red">
                        WHAT IS FASHIONSPONGE.COM?
                    </div>
                    <div id="private-signup-title-1" class="fs-text-blue" style="margin-top:2px;">
                        <div id="private-signup-title-1" class="fs-text-blue" style="margin-top:2px;">
                            Fashion Sponge is where fashion and lifestyle bloggers can grow their audience and readers
                            can discover the latest in Fashion, Beauty, Lifestyle and Entertainment.
                            <p></p>

                            <div id="private-signup-title-2" class="fs-text-red" style="margin-top:2px;">
                                WHAT IS A "FASHION SPONGE"?
                            </div>
                            <p id="private-signup-title-1" class="fs-text-blue">
                                A Fashion Sponge is someone who enjoys sharing or reading about fashionable things. E.g.
                                exclusive, stylish, trendy or topical things.
                            </p>

                            <div id="private-signup-title-2" class="fs-text-red" style="margin-top:2px;display:none">
                                HOW WILL MY CONTENT BE SEEN MORE?
                            </div>
                            <p id="private-signup-title-1" class="fs-text-blue" style="display:none">
                                There are over 10 ways a member can see a single post. We also created an <br>algorithm
                                that only shows content that members haven't interacted with.
                            </p>

                            <div id="private-signup-title-2" class="fs-text-red" style="margin-top:2px;">
                                WHY IS MEMBERSHIP RESTRICTED?
                            </div>
                            <p id="private-signup-title-1" class="fs-text-blue">
                                At Fashion Sponge quality will always supersedes quantity. Limiting membership to only <br>
                                bloggers who create good content will ensure that all content meets the standard.
                            </p>
                        </div>
                        <div id="private-signup-title-2" class="fs-text-red" style="margin-top:2px;display:none">
                            HOW WILL MY CONTENT BE SEEN MORE?
                        </div>
                        <p id="private-signup-title-1" class="fs-text-blue" style="display:none">
                            There are over 10 ways a member can see a single post. We also created an <br>algorithm that
                            only shows content that members haven't interacted with.
                        </p>
                    </div>
                </div>
            </center>
        </div>

        <!-- footer image and content -->

        <div id="signup-footer-image-signup-fields">
            <center>
                <div class="jumbotron">
                    <br>

                    <div id="signup-row-title-2" style="font-family:arial;font-size:35px;padding-top: 20px;">
                        "THIS IS NOT A SITE. IT'S A <br>DISCOVERY ENGINE. DISCOVER AND <br>GET DISCOVERED."
                        <span id="signup-rico-name" style="font-weight:normal" > -Mauricio</span>
                    </div>
                    <div id="signup-row-title-footer-1">
                        Sign up for the private beta.
                    </div>
                    <div id="signup-row-content">
                        Enter your email address to recieved an invite to our private beta. Space is limited so sign up
                        now.
                    </div>
                    <div id="signup-field-for-email-website-container"  style="padding-bottom: 8;"  >
                        <div class="row">
                            <div class="col-md-1" id="col1">
                            </div>
                            <div class="col-md-5" id="col2">
                                <input placeholder="E-MAIL" type="text" class="form-control" id="email2_12"
                                       onkeyup="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-not' , event )">
                            </div>
                            <div class="col-md-5" id="col3">
                                <div class="input-group">
                                    <input placeholder="WEBSITE / BLOG" type="text" class="form-control"
                                           id="web_blog_12"
                                           onkeyup="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-not' , event )"
                                           style="color: rgb(161, 25, 33);">
                                      <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button"
                                                onclick="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-yes' , event )"
                                                id="signup-button-submit"> Submit
                                        </button>
                                      </span>
                                </div>
                            </div>
                            <div class="col-md-1" id="col4">
                            </div>
                        </div>
                    </div>
                    <div id="signup-row-content" style=" border:1px solid none;width:520px; margin-top:10px;">
                        *Quality supersedes quantity. Membership is restricted to people who's website / blog proves they
                        create content that's both high quality and compelling.
                    </div>
                </div>
            </center>
        </div>
        </div>
        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        </html>

    <?php
}

?>