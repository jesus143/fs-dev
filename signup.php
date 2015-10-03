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
        if ($invited->getStatus() == 2)
        {

            Log::addExecutionLog("Information officially sign up");
        }
        elseif ($invited->getStatus() == 3)
        {
            Log::addExecutionLog("Information already a member");
        }
        elseif ($invited->getStatus() == 7)
        {

            Log::addExecutionLog("Information sign up but still pending");
        }

        elseif($invited->updateInvitedStatus($invited->getInvitedId(), 7, $database))
        {

            if($invitedQueue->updateQueueStatus($qId, 1, $database))
            {
                $signUp = true;
            }
            else
            {

                Log::addExecutionLog("Failed to update the queue status = 1");
            }

        }
        else
        {

            Log::addExecutionLog("Failed to update the invited status to 6");
        }
    }
    else
    {
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


//  echo "Execution Log : " . Log::printExecutionLog();






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

            <title>A better way to discover Fashionable People, Places and Things.</title>

            <!--font-->
            <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
            <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
            <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">


            <?php
//                $mc->header_attribute(
//                    "A better way to discover Fashionable People, Places and Things.",
//                    "So if you need exposure, enjoy discovering, like being inspired and would love feedback… Sign up now! Space is limited. ",
//                    "best fashion community on the web, new fashion community, fashion social network, current fashion trends, fall fashion trends, spring fashion trends, summer fashion trends, fashion trends and accessories, real fashion, emerging fashion trends, street style fashion inspiration, chic fashion inspiration, menswear fashion inspiration, streetwear fashion inspiration, fashion inspiration, beauty tips, ootd, fashion blogs, best fashion bloggers, menswear fashion bloggers, preppy fashion bloggers, streetwear fashion bloggers, latest fashion, fashion news, celebrity fashion, how to fashion tips, dyi fashion, beauty hauls, men fashion models, female fashion models",
//                    array('type' => 'responsive')
//                );
            ?>


            <link rel="stylesheet" type="text/css" href="fs_folders/gen_css/gen_style.css">
            <script type="text/javascript" src='fs_folders/js/jQv1.8.2.js'></script>
            <script type="text/javascript" src='fs_folders/js/function_js.js'></script>
            <script type="text/javascript" src="fs_folders/invite/reg_js/cycle.js"></script>
            <script type="text/javascript" src='fs_folders/signup/signup.js'></script>
            <link rel="stylesheet" type="text/css" href="fs_folders/signup/signup.css">
            <link rel="stylesheet" type="text/css" href="fs_folders/gen_css/gen_style.css">



            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">




            <?php $mc->signup_popUp_responnsive(true, ''); ?>
            <?php $mc->login_popup(136, 'login'); ?>





            <?php //$mc->signup_popUp_responnsive(true, ''); ?>
            <?php //$mc->login_popup(136, 'login'); ?>


            <?php
            include ("fs_folders/php_functions/Class/DetectMobile.php");
            include ("fs_folders/signup1/func.php");

            $md = new Mobile_Detect();

            if($md->isTablet())
            {
                $style = 'signup-tablet.css';
                $header = 'desktop';
            }
            elseif($md->isMobile())
            {
                $style = 'signup-mobile.css';
                $header = 'mobile';
            }
            else
            {
                $style = 'signup-desktop.css';
                $header = 'desktop';
            }
            // echo "$style $header <br><br><br><br><br>";
            ?>



            <!-- Style desktop view-->
            <link href="fs_folders/signup1/<?php echo $style; ?>" rel="stylesheet" id="style" >
            <link href="fs_folders/signup1/media.css" rel="stylesheet" >

            <!-- js -->









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

            <div id="signup-container-responsive" class="container" style="margin: 0px auto"  >

                <div id="body-header" >
                    <?php
                    /**
                     * select header if mobile, tablet or desktop
                     * @ String $header
                     * #return none
                     */
                    switch($header):
                        case 'mobile':
                            mobileHeader();
                            break;
                        case 'desktop':
                            desktopHeader();
                            break;
                        default:
                            desktopHeader();
                            break;
                    endswitch;
                    ?>
                </div>

                <div id="body-content" >
                    <div class="row" style="border: 1px solid noen; display: block  ">
                        <!-- carousel -->
                        <div class="col-md-8"  id="carousel-container"  style="border:1px solid none;   "   >

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"   >
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img style="height:auto" src="fs_folders/images/signup/1-intro.jpg" data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="1st slide">
                                    </div>

                                    <div class="item">
                                        <img style="height:auto" src="fs_folders/images/signup/2 women fashion.jpg" data-src="holder.js/1140x500/auto/#666:#444/text:Second slide" alt="2nd slide">
                                    </div>

                                    <div class="item">
                                        <img style="height:auto" src="fs_folders/images/signup/3 mens fashion.jpg" data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="3rd slide">
                                    </div>

                                    <div class="item">
                                        <img style="height:auto" src="fs_folders/images/signup/4-beauty.jpg" data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="4rth slide">
                                    </div>

                                    <div class="item">
                                        <img style="height:auto" src="fs_folders/images/signup/5 lifestyle.jpg" data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="5th slide">
                                    </div>

                                    <div class="item">
                                        <img style="height:auto" src="fs_folders/images/signup/6 entertainment.jpg" data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="6th slide">
                                    </div>

                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- right sign up fields -->
                        <div class="col-md-4"  id="top-signup-field-container" style="display: block; border:1px solid none;    "   >
                            <div id="next-line" ></div>
                            <div id="sign-up-field-container"   >

                                <div id="title-1" style="border:1px solid none; margin:0px auto;"   >
                                    Request an invite to our private beta
                                </div>

                                <div id="next-line" style="height: 15px;" > </div>

                                <p id="desc" class="desc-signup"  >
                                    Fashion Sponge is currently an invite only community. Membership is restricted to people who's website / blog proves they create content that's both high quality and compelling.
                                </p>

                                <div id="next-line" style="height: 15px;" > </div>

                                <div id="header-right-form" >
                                    <div class="input-group" id="top-signup-fields"  >

                                        <input  style="margin-bottom:4px;"  id="email2_11"  type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1"
                                                onkeyup="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-not' , event )"
                                                value="<?php echo $email; ?>"
                                                required="" autofocus=""
                                            >

                                        <input style="margin-bottom:3px;" id="web_blog_11" type="text" class="form-control" placeholder="Website / Blog" aria-describedby="basic-addon2"
                                               onkeyup="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-not' , event )"
                                               value="<?php echo $blog; ?>"
                                            >




                                        <button id="signup-button-submit"  type="button" class="btn btn-sm btn-danger"
                                                onclick="gen_popup_check_invited_info( '#email2_11' , '#web_blog_11' , '' , 'submit-yes' , event )"
                                            >Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="next-line"> </div>
                    <!-- devices laptop, tablet and mobile img -->
                    <img style="width:97.6%; margin: 0px auto;" src="fs_folders/images/signup/devices.jpg" class="img-responsive" alt="Responsive view in laptop, tablet and mobile">

                    <!-- four reasons -->
                    <div id="signup-body-four-purpose">

                        <div id="blue-container-1"  >
                            <b>FOUR</b> REASONS YOU SHOULD <br> REQUEST AN <b>INVITE</b>.
                        </div>

                        <div id="next-line" >
                        </div>

                        <div class="row">

                            <!-- exposure -->
                            <div class="col-md-3" id="col1" >
                                <div id="container" class="exposure-container"  >
                                    <img src="fs_folders/images/genImg/signup-exposure-icon-red.png" style="height:70px">
                                    <div id="private-signup-title-2" class="fs-text-blue" style="margin-top:10px; text-align:center; border:1px solid none;">
                                        EXPOSURE
                                    </div>
                                    <div id="desc"  style=" margin:auto;  margin-top:20px;  width:90%; border:1px solid none;;   ">
                                        <p>  Get exposure by continuously posting content and engaging with members.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- discover -->
                            <div class="col-md-3" id="col2">
                                <div id="container" class="discover-container"  >
                                    <img src="fs_folders/images/genImg/signup-discover-icon-red.png" style="height:70px">
                                    <div id="private-signup-title-2" class="fs-text-blue" style="margin-top:10px; text-align:center;border:1px solid none;  ">
                                        DISCOVER
                                    </div>
                                    <div  id="desc" class="fs-text-blue" style="margin:auto;  margin-top:20px;  width:90%;  border:1px solid none;  ">
                                        <p> Discovering fashionable people, places and things couldn't be easier.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- inspiration -->
                            <div class="col-md-3" id="col3">
                                <div id="container" class="inspiration-container" >
                                    <img src="fs_folders/images/genImg/signup-learn-icon-red.png" style="height:70px">
                                    <div id="private-signup-title-2" class="fs-text-blue" style="margin-top:10px; text-align:center;border:1px solid none; ">
                                        INSPIRATION
                                    </div>
                                    <div id="desc" class="fs-text-blue" style=" margin:auto; margin-top:20px;  width:90%;  border:1px solid none;   ">
                                        <!-- Be inspired by some of the best content creators and most stylish people on the web.   -->
                                        <p>  Be inspired by some of the best bloggers and most stylish people on the web.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- feedback -->
                            <div class="col-md-3" id="col4">
                                <div id="container" class="inspiration-container" >
                                    <img src="fs_folders/images/genImg/sigmup-feedback-icon-red.png" style="height:70px">
                                    <div id="private-signup-title-2" class="fs-text-blue" style="margin-top:10px; text-align:center;border:1px solid none; ">
                                        FEEDBACK
                                    </div>
                                    <div id="desc" class="fs-text-blue" style=" margin:auto;  margin-top:20px;  width:90%; border:1px solid none;   ">
                                        <p> Become a better blogger and dresser by seeing how the community rates your content.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div id="next-line"></div>

                    <!-- footer sign up fields -->
                    <div class="jumbotron" id="footer-signup-field"  >
                        <div class="row">
                            <!-- fields -->
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="input-group" style="margin: 0px auto; border:1px solid auto; width: 99%"  >

                                        <input id="email2_12"  style="margin: 0px 0px 3px 0px;  "  type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1"
                                               onkeyup="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-not' , event )">

                                        <input id="web_blog_12" style="margin: 0px 0px 3px 0px; "  type="text" class="form-control" placeholder="Website / Blog" aria-describedby="basic-addon2"
                                               onkeyup="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-not' , event )"
                                            >

                                        <button id="signup-button-submit" type="button" class="btn btn-sm btn-danger"
                                                onclick="gen_popup_check_invited_info( '#email2_12' , '#web_blog_12' , '' , 'submit-yes' , event )"
                                            >Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="body-popup" >

            <!--feature list-->
            <div class="modal fade bs-example-modal-lg feature-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 20px">
                        <div class="modal-header" style="padding: 10px 0px 10px 0px;margin:  0px 0px 20px 0px;"  >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title-1-feature-list" ><b>FEATURES LIST</b> </h4>
                        </div>
                        <div id="container-popup-future-list" >


                            <p>Fashion Sponge is in beta.</p>

                            <p>This list was created to show some of the built and upcoming features. Features that are coming soon are in red. Visit this page to see whats new.</p>

                            <div id="title-1-feature-list" >
                                Contact us
                            </div>

                            <p>We love questions or and suggestions for feature request.</p>
                            <div id="title-1-feature-list" >
                                BUILT & COMING SOON FEATURES
                            </div>

                            <div id="title-1-feature-list" >
                                General
                            </div>

                            <ul>
                                <li>Facebook Log In</li>
                                <li>Welcome Brief Tutorial</li>
                                <li>Enhanced Post Discovery</li>
                                <li>Enhanced User Discovery</li>
                                <li>Image Compression</li>
                                <li>Invite Facebook Friends</li>
                                <li>Hashtag Integration</li>
                                <li>Simple Private Messaging</li>
                                <li>Auto-Push Posts to other networks</li>
                                <li>Email Notifications ( Following / Invite Accepted / Mentions )</li>
                                <li>Invitation System & Ability to Invite Friends</li>
                                <li>Network-wide in-Stream Announcement System</li>
                                <li id="important-red" >Option To Toggle Endless Scroll on / off</li>
                                <li id="important-red" >Members @mentions w/ Suggestions / Auto Completer</li>
                                <li>Notification Center ( Facebook Friend Joined / Rated / Liked / Commented / Favorited )</li>
                            </ul>


                            <div id="title-1-feature-list" >
                                Feed
                            </div>

                            <ul>
                                <li>Grid Display</li>
                                <li id="important-red" >Single Display</li>
                                <li>Time Stamp Display</li>
                                <li>In-Stream Notifications (Joined / Following / Posted / Rated / Favorited / Commented)</li>
                            </ul>

                            <div id="title-1-feature-list" >
                                Post Look
                            </div>

                            <ul>
                                <li>Select Image</li>
                                <li>Tag Items</li>
                                <li> Tag Post</li>
                                <li>Categorize Look</li>
                                <li>Link URL</li>
                            </ul>


                            <div id="title-1-feature-list" >
                                Post Article
                            </div>

                            <ul>
                                <li>Select Image</li>
                                <li>Integration URL</li>
                                <li>Categorize Article</li>
                                <li>Permalink to Article</li>
                                <li>Embed Youtube Video <span id="important-red" >( Vimeo & Dailymotion )<span></li>
                            </ul>

                            <div id="title-1-feature-list" >
                                Post Media
                            </div>

                            <ul>
                                <li>Post Image</li>
                                <li id="important-red" >Post Animated GIFs</li>
                                <li>Categorize Media</li>
                                <li>Tag Media</li>
                                <li>Embed Youtube Video ( Vimeo & Dailymotion )</li>
                            </ul>

                            <div id="title-1-feature-list" >
                                Look / Article Module
                            </div>
                            <ul>
                                <li>Total Rating</li>
                                <li>Like / Dislike</li>
                                <li>Favorite Post</li>
                                <li>Total Rates</li>
                                <li>Total Views</li>
                                <li>Total Drips</li>
                                <li>Total Favorites</li>
                                <li>Total Comments</li>
                                <li>Total Likes per post</li>
                                <li>View Who Rated</li>
                                <li>View Who Dripped</li>
                                <li>View Who Favorited</li>
                                <li>Edit Post</li>
                                <li>Post Date / Time Stamp Display</li>
                                <li>Delete Post</li>
                                <li>Follow Member</li>
                                <li>Flag Post</li>
                                <li>Simple Commenting</li>
                                <li>Repost w/ Author Attribution</li>
                                <li>Like & Dislike Comment</li>
                                <li>Share To
                                    ( Facebook, Twitter, Tumblr, Pinterest, Google+, Stumble Upon, Email )</li>
                                <li id="important-red" >Hide Post</li>
                            </ul>

                            <div id="title-1-feature-list" >
                                Member Profile Module
                            </div>

                            <ul>
                                <li>Flag</li>
                                <li>Total Profile Views</li>
                                <li>Total Looks Posted</li>
                                <li>Total Articles Posted</li>
                                <li>Simple Commenting</li>
                                <li>Like & Dislike Comment</li>
                                <li>Mouse Over View ( About Member, Follow Member, Online Status, Stats )</li>
                                <li id="important-red" >Total Media Posted</li>
                            </ul>
                            <div id="title-1-feature-list" >
                                Profile Page
                            </div>

                            <ul>
                                <li>Members Overall Rating ( percentage for looks and article )</li>
                                <li>Total Rates ( total rates for looks and articles )</li>
                                <li>Follow / Unfollow Member</li>
                                <li>Quick Edit Account</li>
                                <li>Quick Profile Image Change</li>
                                <li>Quick Header Image Change</li>
                                <li>About Member</li>
                                <li>Member Online Status</li>
                                <li>View Members Recent Activity</li>
                                <li>View Members Articles</li>
                                <li>View Members Looks</li>
                                <li>View Members Favorites</li>
                                <li>View Members Followers & Following List</li>
                                <li id="important-red" >View Members Media</li>
                                <li id="important-red" >View Members Comments</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--about-->
            <div class="modal fade bs-example-modal-lg about" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content" style="padding: 20px">
                        <div class="modal-header" style="padding: 10px 0px 10px 0px;margin:  0px 0px 10px 0px;"  >
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title-1-about" ><b>ABOUT PAGE</b> </h4>
                        </div>

                        <div id="container-popup-about" >

                            <div id="title-1-about" >What is Fashion Sponge?</div>

                            <p> Fashion Sponge is a social network where the best content creators in Fashion, Beauty, Lifestyle and Entertainment can showcase their content to people who's looking to discover the latest about people, places and things.</p>

                            <div id="title-1-about" >Our Birth</div>

                            <p>Fashion Sponge was created as an alternative to the popular communities that allows anyone to post anything, as much as they want and anytime they want.</p>

                            <p> <span id="title-1-about" >Fact:</span> Every minute, Facebook users are posting nearly 2.5 million pieces of content, Instagram user post nearly 220,000 new photos and WordPress users post over 61,000 articles in an hour. At this rate it's become harder for people to discover your great content. Out of all the contents tha's being posted online, only a small percentage is high quality, compelling, inspirational, informative or entertaining.</p>

                            <p>
                                Fashion Sponge aims to become a go-to destination for seeing the latest and best content in <span id="title-1-about" >Fashion</span>,
                                <span id="title-1-about" >Beauty</span>, <span id="title-1-about" >Lifestyle</span> and <span id="title-1-about" >Entertainment</span>
                                by the best content creators.
                            </p>

                            <div id="title-1-about" >Joining</div>
                            <p>
                                Fashion Sponge is currently <span id="title-1-about" >invitation-only</span>. To join Fashion Sponge, you need to request an invite by submitting your email and website / blog.
                            </p>
                            <div id="title-1-about" >Frequently Asked Questions</div>

                            <p>What is a "Fashion Sponge"</p>

                            <p> A Fashion Sponge is someone who enjoys buying or hearing about fashionable things. E.g. exclusive, stylish, trendy or topical things... </p>

                            <p>Why is membership invite only?</p>

                            <p>At Fashion Sponge quality will always supersedes quantity. Invites are given to people who's website / blog proves they create content that's either compelling, inspirational, informative or entertaining. Limiting membership to only bloggers who create good content will ensure that all content meets the standard.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--login-->
            <div class="modal fade bs-example-modal-sm login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="padding: 20px">
                        <div id="container-popup-about" >
                            <div class="modal-header" style="padding: 10px 0px 10px 0px;margin:  0px 0px 10px 0px;"  >
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="title-1-about" ><b>Login</b> </h4>
                            </div>
                            <p>Prohibited, System is on invitation mode.</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </bod>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://www.fashionsponge.com/fs_folders/Assets/js/bootstrap.min.js" ></script>
        </html>







    <?php
}

?>