<?php $page_viewer = "";
if (empty($page_viewer)) {
    require ("fs_folders/php_functions/connect.php");
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php");
    $mc = new myclass();
    $ri = new resizeImage ();
}


//capture the id and to be change to slug

@setcookie( 'plno' , (!empty($_GET['id'])) ? $_GET['id'] : $_SESSION['table_id']  ,  time()+3600*24 );
echo " <div style='display:none' > ";
if($_GET['id'] = helper::get_table_id((!empty($_GET['id'])) ? $_GET['id'] : null   ,$_SESSION['table_id'])){if(!$_GET['id']){$mc->go("/");}unset($_SESSION['table_id']);}
$mc = new myclass();
$ri = new resizeImage ();
$mc->save_current_page_visited();


# initialize 1
$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );
$mno 			 =  $mc->get_cookie( 'mno' , 136 );
// echo " <bR><br><bR><Br>mno ".$_SESSION['mno'];
// echo " $mno ";
/*
if ( empty($_GET['id'])) {
   $mc->go("/");
   $looks        = $mc-> retreive_specific_user_all_looks( $mno  , "order by plno desc " );
   $_GET['id']   = $looks[0]["plno"];
}else{
}
*/
echo " get ".$_GET['id'].'<br>';
$plno             = $_GET['id'];
$plno             = $mc->clean_input( $plno );
if ( $mc->look_exist( $plno )  ) {
}
else{
    // $mc->go("/");
}
$mc->auto_detect_path();


$_SESSION['plno']    = $plno;
//			$plno                = $plno;
$img                 = "$mc->look_folder_lookdetails/$plno.jpg";
$modal['table_name'] = 'postedlooks';
$modal['table_id']   =  $plno;
$mc->get_visitor_info(
    "" ,
    "lookdetails page lookid = $plno " ,
    "home"
);
$nno   = ( !empty($_GET['nno']) ) ? intval($_GET['nno']) : 0 ;

# UPDATE NOTIFICATION AS VIEWED

if ( $nno  != 0 ) {
    $response =  $mc->posted_modals_notification_Query (
        array(
            'nno'=>$nno,
            'notification_query'=>'set-notification-viewed'
        )
    );
}

# get image src

$modal['src']  = $mc->image(
    array(
        'table_name'=>$modal['table_name'],
        'table_id'=>$modal['table_id'],
        'type'=>'get-default-image-src',
        'size'=>'detail'
    )
);
// echo " this is the src $modal[src] <br> ";

# initialized 2

$li                  = $mc->posted_look_info($_GET['id']);
$_SESSION['plno']    = $_GET['id'];
$date_               = $li['date_'];
$lookOwnerMno        = intval($li["lookOwnerMno"]);
$mno1                = intval($li["lookOwnerMno"]);
$memFsInfo           = $mc->get_user_full_fs_info( $mno1  );
$opercentage         = $memFsInfo['opercentage'];
$otrating            = $memFsInfo['otrating'];
$user['username']    = $memFsInfo['username'];
$user['profile_tab'] = 'looks';
$mno 			     = $_SESSION["mno"];
$lookOwnerName       = $li["lookOwnerName"];
$pltags              = $li['pltags'];
$plstyle             = $li['style'];
$Ttag                = count($li['pltags']);
$lookName            = $li["lookName"];
$lookAbout           = $li["lookAbout"];
$pltvotes            = $li["pltvotes"];
$trating             = $li["trating"];
$style               = $li["style"];

$pltratings          = number_format( $li["trating"]);
$webDesc             = "Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.";
$looks               = $mc-> retreive_specific_user_all_looks( $lookOwnerMno , "order by plno desc " );
$next_prev           = $mc->db_result_next_prev( 'postedlooks' , $plno , $looks , 'all' );
$total_looks 	     = $mc->get_res_len( $looks );
$total_show_looks    = $mc->get_total_limit_show( intval( $total_looks ) , 30 );
$mem_info            = $mc->get_user_info_by_id( $mno1  );
$tlooks 		     = number_format($mem_info[0]['tlooks']);
$tratings 		     = number_format($otrating);   /*number_format($mem_info[0]['tratings']); */
$tfollower 		     = number_format($mem_info[0]['tfollower']);
$tfollowing 	     = number_format($mem_info[0]['tfollowing']);
$tpercentage 	     = number_format($mem_info[0]['tpercentage']);
$lookmodalsstyle     = $mc->lookdetails_set_size_of_the_look( $img , $ri );
// $mc->add_look_view( $plno );
$look_countingPos    = $mc->get_modal_position_detail( $plno , $looks , 'plno' );
$article_link        = $li['article_link'];
$more                = $mc->look_with_more( $plno , $article_link );
$tlc                 = $mc->get_total('plcno','posted_looks_comments','plno',$_SESSION['plno']);

$modal['table_name']				        = 'postedlooks';
$modal['table_id']  				        = $plno;
$modal['mno']                               = $mno1;
$modal['kind'] 								= 'ARTICLE';
$modal['position']                          = 1;
$modal['total']                             = 30;
$modal['view_footer_id']                    = 'lf_div_container';
$modal['thumbsUp']                          = 'look-white-thumb.png';
$modal['thumbsDown']                        = 'look-white-down-thumb.png';
$modal['stat_rated']                        = 'look not rated';
$modal['stat_dripted']                      = 'look not dripted';
$modal['stat_favorited']                    = 'look not favorited';
$modal['headermssg']                        = 'SUCCESSFULLY FAVORITED'; # this is for success message popup
$modal['contentmssg']                       = 'This Look is now on your favorite list.'; # this is for success message popup
$modal['src_img_drip']                      = "look-icon-drip.png";
$modal['src_img_favorite']                  = "look-icon-favorite-detail-yellow.png";
$modal['src_img_share']                     = "look-icon-share.png";
$modal['src_img_flag']         			    = "modal-flag-dot-white.png";//"modal-flag.png";
$modal['tdrip']                             =  $li["tdrip"];
$modal["title"]  							=  $li["lookName"];
$modal['tfavorite']                         =  $li["tfavorite"];

# set view and add

$mc->view(
    array(
        'table_name'=>$modal['table_name'],
        'table_id'=>$modal['table_id'],
        'mno'=> $mno,
        'type'=> 'add-view'
    )
);

# check if already thumbs up or down

$modal['response'] = $mc->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>$modal['table_name'] , 'table_id'=>$modal['table_id'],  'rate_query'=>'get-user-rated-type'  )  );
if ( $modal['response'] == true ):
    $modal['stat_rated'] =  'look already rated';
    if ( $modal['response'] == 'like') {
        $modal['thumbsUp'] = 'look-red-thumbs.png';
    }
    if ( $modal['response'] == 'dislike') {
        $modal['thumbsDown'] = 'look-red-thumb-down.png';
    }
endif;

# set points color

$modal['response_drip'] =  $mc->fs_drip_modals_Query (
    array(
        'limit_start'=>0,
        'limit_end'=>1,
        'query_where'=>"table_id = $modal[table_id] and mno = $mno",
        'query_order'=>'dmno asc',
        'query_drip'=>'get-all-user-dripped'
    )
);
if (!empty( $modal['response_drip'] ) ) {
    // $modal['src_img_drip'] = "look-icon-drip-selected.png";
    $modal['src_img_drip'] = "look-icon-drip.png";

}
$modal['response_favorite'] =  $mc->fs_favorite_modals_Query (
    array(
        'limit_start'=>0,
        'limit_end'=>1,
        'query_where'=>"table_id = $modal[table_id] and mno = $mno",
        'query_order'=>'fmno asc',
        'query_favorite'=>'get-all-user-favorite'
    )
);
if (!empty( $modal['response_favorite'] ) ) {
    $modal['src_img_favorite'] = "look-icon-favorite-detail-yellow.png";
}
$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $plno and table_name= 'postedlooks' and mno = $mno "  )  );
if ( !empty($response) ) {
    $modal['src_img_flag']        = "large-flag-red.png";
}
# set status of owner or not for the user not allow to rate , drip and favorite the modal
if ( $modal['mno'] == $mno ):
    $modal['stat_rated']	 =  'modal owner';
    $modal['stat_dripted'] 	 =  'modal owner';
    $modal['stat_favorited'] =  'modal owner';
endif;
$keyword = modal::conver_cetegory_to_keyword($pltags);
$title=page::set_url_for_modal_details($modal['table_id'],'look',$style,$date_,$lookName); // set url of the page
echo "</div>";







// echo " $keyword ";
// $lookName = 'Mauricio (member) has 7 people who signed up using the referral link.There are currently1000 people on the waiting list who has no association to any member on the';
// echo " this is the len of the string ".strlen($lookName);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Details Page Development</title>
    <link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
    <script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_ajax.js'></script>
    <script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_query.js'></script>
    <link rel="stylesheet" type="text/css" href="fs_folders/gen_css/gen_style.css" />



    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <?php
    $mc->header_attribute(
        "$lookName-$lookOwnerName" ,
        $lookAbout,
        $keyword
    );
    ?>
    <div style="display:none" >
        <div id="plno"      ><?php echo $plno; ?></div>
        <div id="lookName"  ><?php echo $lookName; ?></div>
        <div id="webDesc"   ><?php echo $webDesc; ?></div>
        <div id='lookOwnerName'><?php echo $lookOwnerName; ?></div>
    </div>

    <script src="//load.sumome.com/" data-sumo-site-id="fa7e9f07ee92651429290ee93a0e6696ecc87bef3ff77ee5ff9c21d62ff1885b" async="async"></script>

    <script type="text/javascript">
        //        $(window).ready(function() {
        //            rate_article_retrieve_nextprev_and_article_modals ( );
        //        });
    </script>

</head>
    <body>

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

    </body>
</html>