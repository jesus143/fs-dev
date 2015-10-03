<?php
require("fs_folders/php_functions/connect.php");
require("fs_folders/php_functions/function.php");
require("fs_folders/php_functions/myclass.php");
require("fs_folders/php_functions/library.php");
require("fs_folders/php_functions/source.php");
$_SESSION['post_a_look_is_look_upload_once_in_db'] = false ;
$mc = new myclass();


require ('fs_folders/php_functions/Database/post.php');
$mc->post = new Post();


$mc->auto_detect_path();
$mc->save_current_page_visited( );

//redirect
/*
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ($actual_link == 'http://fashionsponge.com/' || $actual_link == 'http://www.fashionsponge.com/' || $actual_link == 'http://fashionsponge.com/?login=1' || $actual_link == 'http://www.fashionsponge.com/?login=1') {
        echo "redirecting to.... $actual_link <br>";
        $mc->go('http://fashionsponge.com/signup');
    }
*/
# initlaized mno
// $is_cookie_set   =  $mc->set_cookie( 'mno' , 130 , time()+3600*24 );
$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );
$mno 			 =  $mc->get_cookie( 'mno' , 136 );
# initialized the next viewed more modals
// $_SESSION['counter'] = 3;
// echo " <bR><br><bR><Br>mno ".$_SESSION['mno'];
// $mc->automatic_insert(5);
// echo " id = ".$_GET["id"];
// popularlatest
// popularlooks
// popularmembers
// populararticles
// popularmedia
// $_SESSION["mno"] = 134;
// echo " full url =  ".basename($_SERVER["PHP_SELF"]);

$fs_home_tab = basename($_SERVER["PHP_SELF"]);
$fs_home_tab = str_replace(".php","",$fs_home_tab);
if ($fs_home_tab == "index") { $fs_home_tab = "latest"; }
// echo " fs tab = $fs_home_tab <br>";
$mc->get_visitor_info( "" , "home tab: $fs_home_tab " , "home" );
if ( $fs_home_tab == "index" )   { $clock_style = "display:none" ;   } else  { $clock_style = "display:none" ;  }

// $mc->go('signup');

if ( !empty($_GET['gcode']) )
{
    // to logout the user
    $mno             = 136;
    $_SESSION['mno'] = 136;
    // to pass the code in the get url
    $_SESSION['gcode'] = $_GET['gcode'];
}
else if ( !empty($_GET['login']) )
{
    // to logout the user
    $mno             = 136;
    $_SESSION['mno'] = 136;
    // to pass the code in the get url
    $_SESSION['login'] = $_GET['login'];
}
else
{
    // unset gcode after used
    unset($_SESSION['gcode']);
    unset($_SESSION['login']);
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- inner script -->
    <script type="text/javascript"> //document.location ='signup'; </script>
    <?php

    /**
     * header print title, description and keyword
     */

    $mc->header_attribute(
        "The Best Fashion Inspiration By The Best Bloggers",
        "Fashion Sponge is where fashion and lifestyle bloggers can grow their audience and readers can discover the latest in                      Fashion, Beauty, Technology and Entertainment. Sign up now."
    );

    /**
     * is to show the login area or the welcome popup
     */

    if ( $mno != 136)
    {
        $mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );
    }
    else
    {
        $mc->login_popup( $mno ,  'login' ) ;
    }

    ?>
    <!-- new home -->
    <link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
    <link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
    <script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
    <script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script>
    <!-- end home -->


    <!-- new look -->
    <script type="text/javascript" src='fs_folders/look/look_js/lookajax.js' ></script>
    <script type="text/javascript" src='fs_folders/look/look_js/lookjquery.js' ></script>
    <!-- end look  -->
</head>
<body onload="init('<?php echo $fs_home_tab; ?>')" >
<?php
/**
 * to display the popup container
 */
$mc->fs_popup_container_and_response( 'display:none' );

/**
 * add the plugin for google analytic
 */

$mc->plugins( "google analytic" , " home " );

?>
<div id='main_wrapper' >
<div id='wrapper_head'>
</div>
<div id='main_container' >
<!--  new header  -->
<?php
/*
 fs_header(
        $mno ,
        $style_bottom='width:1010px;' ,
        $style_up='width:1009px;' ,
        $style_main_table='width:100%' ,
        $header_signout_search_field_style = 'margin-left:73px;margin-top:3px;' ,
        $header_signout_login_signup_button_style = 'margin-left:52px; width:290px;'
    );
*/
$mc->fs_header(
    $mno,
    'width:1012px;margin-left:-1px;',
    'width:1009px;',
    'width:99.8%;border-left:1px solid #e2e2df;border-right:1px solid #e2e2df;',
    'margin-left:72px;margin-top:3px;',
    'margin-left:35px;',
    'home'
);
?>
<!-- end header -->
<div id='body_wrapper'>
<div id='body_container'>
<table border="0" id='bct1' >
<tr>
    <td id='bct1_td1' >
        <div id='body_menu'>



            <style>
                .rate-modal-main-table {
                    /*border:1px solid red;*/
                    width: 100%;
                }

                .rate-modal-main-table td {
                    /*border:1px solid green;*/
                    padding:0;
                    margin:0;
                }

                .rate-modal-main-table td:nth-child(1) img {
                    width: 100%;
                    border: 1px solid black;
                }

                .rate-modal-sort-menu {
                    /*border:1px solid red;*/
                }

                .rate-modal-sort-menu .active{
                    color:red;
                    border-bottom:5px solid red;
                }

                .rate-modal-sort-menu div  {
                    color:grey;
                    font-family: 'Avenir LT Std 35 Light Oblique' !important;
                    padding-bottom: 3px;
                    border-bottom: 5px solid white;
                    cursor: pointer;
                    font-size: 15px;
                }

                .rate-modal-sort-menu div:hover  {
                    color:red;
                    border-bottom:5px solid red;
                }

                .rate-modal-sort-menu-division {
                    border:1px solid grey;
                    position: absolute;
                    width: 470px;
                    margin-top: -10px;
                }

                .rate-modal-search-field-main-table {
                    width: 100%;
                }

                .rate-modal-search-field-main-table input {
                    width: 97%;
                    padding:10px;
                }

                .rate-modal-search-field-main-table img {
                }

                .rate-modal-page-number-main-table {
                }

                .rate-modal-page-number-main-table div {
                    font-family: arial, sans-serif;
                    color:black;
                }

                .rate-modal-page-number-main-table div:hover {
                    color:red;
                    cursor: pointer;
                }

                .rate-modal-page-number-main-table .active {
                    color:red;
                }

                .rate-modal-page-number-main-table .prev {
                    color:red;
                }

                .rate-modal-page-number-main-table .next {
                    color:green;
                }
            </style>

            <table class="rate-modal-main-table" >
                <tr>
                    <td>
                        <img src="http://localhost/fs/new_fs/alphatest/fs_folders/images/rate/article-featured-image.png"  >
                    </td>
                <tr>
                    <td>
                        <table class="rate-modal-sort-menu" >
                            <tr>
                                <td>
                                    <div class="active">STYLE</div>
                                </td>
                                <td>
                                    <div>ALL LOOKS</div>
                                </td>
                                <td>
                                    <div>UNRATED(59)</div>
                                </td>
                                <td>
                                    <div>NEWEST</div>
                                </td>
                                <td>
                                    <div>NEEDS</div>
                                </td>
                                <td>
                                    <div>FEEDBACK</div>
                                </td>
                        </table>
                        <div class="rate-modal-sort-menu-division" >
                        </div>
                    </td>
                <tr>
                    <td>
                        <table class="rate-modal-search-field-main-table" >
                            <tr>
                                <td>
                                    0\
                                </td>
                                <td>
                                    <input  type="text" placeholder="SEARCH KEYWORDS"  >
                                </td>
                        </table>
                    </td>
                <tr>
                    <td>
                        <table class="rate-modal-page-number-main-table">
                            <tr>
                                <td>  <div  class="prev active" > < </div> </td>
                                <td>  <div  class="active"  > 1 </div> </td>
                                <td>  <div> 2 </div> </td>
                                <td>  <div> 3 </div> </td>
                                <td>  <div> 4 </div> </td>
                                <td>  <div> 5 </div> </td>
                                <td>  <div> 6 </div> </td>
                                <td>  <div> 7 </div> </td>
                                <td>  <div> 8 </div> </td>
                                <td>  <div> 9 </div> </td>
                                <td>  <div> 10 </div> </td>
                                <td>  <div> 11 </div> </td>
                                <td>  <div> 12 </div> </td>
                                <td>  <div> 13 </div> </td>
                                <td>  <div> 14 </div> </td>
                                <td>  <div> 15 </div> </td>
                                <td>  <div> 16 </div> </td>
                                <td>  <div> 17 </div> </td>
                                <td>  <div> 18 </div> </td>
                                <td>  <div> 19 </div> </td>
                                <td>  <div> 20 </div> </td>
                                <td>  <div> 21 </div> </td>
                                <td>  <div> 22 </div> </td>
                                <td>  <div  class="next active"> > </div> </td>
                        </table>
                    </td>
            </table>

            <table id='bmt1'  border="0" style="display:none" >
                <tr>
                    <td>
                        <span  id='feed'> FEED </span>
                        <table border="0" id='bmt11' cellpadding="0" cellspacing="0" >
                            <tr>
                                <td>
                                    <span id='bm1' class='latest' > LATEST </span>
                                    <div id='home_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
                                </td>
                                <td>
                                    <span id='bm4' class='plook' > POPULAR LOOKS </span>
                                    <div id='look_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
                                </td>
                                <td>
                                    <span id='bm3' class='pmember' > POPULAR MEMBERS </span>
                                    <div id='member_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
                                </td>
                                <td>
                                    <span id='bm2' class='pblog'  > POPULAR ARTICLE </span>
                                    <div id='blog_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
                                </td>
                                <td>
                                    <span id='bm5' class='pphoto' > POPULAR MEDIA </span>
                                    <div id='photo_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
                                </td>
                            <tr>
                                <td> <hr id='bmhr1'> <hr id='bmhr1_selected'> </td>
                                <td> <hr id='bmhr4'> <hr id='bmhr4_selected'> </td>
                                <td> <hr id='bmhr3'> <hr id='bmhr3_selected'> </td>
                                <td> <hr id='bmhr2'> <hr id='bmhr2_selected'> </td>
                                <td> <hr id='bmhr5'> <hr id='bmhr5_selected'> </td>
                        </table>
                        <hr id='bmhr6'>
                    </td>
                <tr>
            </table>
        </div> 	<!-- end body menu  -->
    </td>
<tr>
    <td  style='display:none' id="ads-banner" >
        <center>
            <div style="margin-top:5px;margin-bottom:5px; margin-left:14px;" >
                <a href="r?loc=http://theschoolofstyle com/" target="_blank" >
                    <img src="fs_folders/images/banner/new-sos-banner1.png" style="cursor:pointer;border:1px solid none;" />
                </a>
            </div>
        </center>
    </td>
<tr>
    <td>
        <div id='body_content'>
            <div id="res" style="display:none" > home_res </div>
            <div id='imgres' style='visibility: visible;display:none'  >  res </div>
            <?php
            // $res = $mc->get_activity( 100 );
            // print_r($res);

            // for ($i=0; $i < count($res) ; $i++) {
            // 	$action = $res[$i]['action'];
            // 	$ano = $res[$i]['ano'];
            // 	 echo " action = $action  table id = $ano <br>";
            // }

            $r = $mc->get_activity( 25 );
            $r = $mc->init_latest_modals_separation( $r  );
            $modals_left   = $r['init_latest_separated_modals_left'];
            $modals_center = $r['init_latest_separated_modals_center'];
            $modals_right  = $r['init_latest_separated_modals_right'];

            // echo " <span style='color:black' > ";
            // $mc->print_r1($r);
            // echo "</span> ";


            echo "
									 			<div id='res_container'>  
									 				<li id='li_res1'>";
            echo " <table border='0' cellspacing='0'cellpadding='0' > ";
            $modalc=0;
            for ($i=0; $i < count($modals_left) ; $i++) {
                // for ($i=0; $i < 0 ; $i++) {

                $modalc++;
                $_table = $modals_left[$i]['_table'];

                $ano = intval($modals_left[$i]['ano']);
                if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' ) {
                    echo " <td> ";
                    // $mc-> modals_memeber( $ano , 'init' );
                    $mc-> modal_version1_member( $ano , 'init' );
                    echo " </td><tr>";
                }else if ( $_table  == 'postedlooks' ) {
                    echo " <td>";
                    // $mc->modals_look_init( $ano );
                    $mc->modal_version1_look ( $ano );
                    echo "</td><tr>";
                }
                else if ( $_table  == 'fs_postedarticles' ) {
                    echo " <td>";
                    $mc->modal_version1_article ( $ano  );
                    echo "</td><tr>";
                }
            }
            echo " </table> ";
            echo "
						 								<div id='home_res1' >  
						 								</div>
						 							</li> 
						 							<li  id='li_res2' >   
						 							";
            echo " <table border='0' cellspacing='0'cellpadding='0'   > ";
            $c=0;
            $totalads =0;
            for ($i=0; $i < count($modals_center) ; $i++):
                // for ($i=0; $i < 0 ; $i++) {
                // $modalc++;
                $c++;
                $modalc++;
                $_table = $modals_center[$i]['_table'];
                $ano = intval($modals_center[$i]['ano']);
                if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' )  {
                    echo " <td> ";
                    // $mc-> modals_memeber( $ano , 'init' );
                    $mc-> modal_version1_member( $ano , 'init' );
                    echo " </td><tr>";
                }else if ( $_table  == 'postedlooks') {
                    echo " <td>";
                    // $mc->modals_look_init( $ano );
                    $mc->modal_version1_look ( $ano );
                    echo "</td><tr>";
                }
                else if ( $_table  == 'fs_postedarticles' ) {
                    echo " <td>";
                    $mc->modal_version1_article ( $ano  );
                    echo "</td><tr>";
                }

            endfor;
            echo " </table> ";
            echo "
						 								<div id='home_res2' >    
						 								</div>
						 							</li>
						 							<li id='li_res3'>";
            echo " <table border='0' cellspacing='0'cellpadding='0' > ";
            for ($i=0; $i < count($modals_right) ; $i++) {
                // for ($i=0; $i < 0 ; $i++) {
                $modalc++;
                $_table = $modals_right[$i]['_table'];
                $ano = intval($modals_right[$i]['ano']);
                if ( $_table  == 'fs_members' or $_table == 'fs_member_profile_pic' ) {
                    echo " <td> ";
                    // $mc-> modals_memeber( $ano , 'init' );
                    $mc-> modal_version1_member( $ano , 'init' );
                    echo " </td><tr>";
                }else if ( $_table  == 'postedlooks') {
                    echo " <td>";
                    // $mc->modals_look_init( $ano );
                    $mc->modal_version1_look ( $ano );

                    echo "</td><tr>";
                }
                else if ( $_table  == 'fs_postedarticles' ) {
                    echo " <td>";
                    $mc->modal_version1_article ( $ano  );
                    echo "</td><tr>";
                }
            }
            echo " </table> ";
            echo "
						 							 	<div id='home_res3' >  
						 							 	 
						 								</div>
						 							</li>				 			 					 
					 							</div> 
					 								";
            ?>
        </div>	<!-- end body content -->

    </td>
<tr>
    <td id='moretd'>
        <center><div id='more_loading' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </center>
        <img id='more' style="margin-left:3px;"  src="fs_folders/images/genImg/home-more-button.png" onclick="more_click ( '3' )" />
    </td>
</table>
</div>
</div> <!-- end body wrapper -->
<div id="footer">

    <div id="footer_res" style="display:none" > footer res  </div>

    <!-- <link rel="stylesheet" type="text/css" href="fs_folders/page_footer/css/footer1.css" >  -->

    <?php

    // $mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );
    $url = 'http://dev.fashionsponge.com';

    //$url = 'http://localhost/fs/new_fs/alphatest';
    require ("$url/fs_folders/page_footer/footer_php_file/footer.php"); ?>

</div>
</div> <!-- end main container -->
</div>  <!-- end main wrapper -->
<?php
$mc->invite_hellobar( $mno );
?>
</body>
</html> 