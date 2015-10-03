<?php $page_viewer = "";  
   
   if (empty($page_viewer)){ 
        require ("fs_folders/php_functions/connect.php");
        require ("fs_folders/php_functions/function.php");
        require ("fs_folders/php_functions/library.php");
        require ("fs_folders/php_functions/source.php");
        require ("fs_folders/php_functions/myclass.php");   
        require ('fs_folders/php_functions/Database/post.php');
        $database = new Database();
        $post = new Post();
        $mc = new myclass();  
        $ri = new resizeImage ();           
        $database->connect(); 


    }  
//capture the id and to be change to slug
// @setcookie( 'plno' , (!empty($_GET['id'])) ? $_GET['id'] : $_SESSION['table_id']  ,  time()+3600*24 );
 
 echo "<div style='display:none' >";
if($_GET['id'] = helper::get_table_id((!empty($_GET['id'])) ? $_GET['id'] : null   ,$_SESSION['table_id'])){if(!$_GET['id']){$mc->go("/");}unset($_SESSION['table_id']);}
$mc = new myclass();
$ri = new resizeImage ();
$mc->save_current_page_visited();

# initialize 1
$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );
$mno             =  $mc->get_cookie( 'mno' , 136 );
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
//          $plno                = $plno;
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

$_SESSION['plno']    =  $_GET['id'];
$li                  = $mc->posted_look_info($_GET['id']);
$_SESSION['plno']    = $_GET['id'];
$date_               = $li['date_'];
$lookOwnerMno        = intval($li["lookOwnerMno"]);
$mno1                = intval($li["lookOwnerMno"]);
$memFsInfo           = $mc->get_user_full_fs_info( $mno1  );
$opercentage         = $memFsInfo['opercentage'];
$otrating            = $memFsInfo['otrating'];
$user['username']    = $memFsInfo['username']; 
$occupation          = $memFsInfo['memInfo'][0]['occupation'];

$tlooks              = $memFsInfo['memInfo'][0]['tlooks'];
$tfollower           = $memFsInfo['memInfo'][0]['tfollower'];
 


// $_SESSION['details_user_mno'] = $mno;
    


            //ARTICLE DATA

 


 
            if($_GET['id'] = helper::get_table_id($_GET['id'],$_SESSION['table_id'])){if(!$_GET['id']){$mc->go("/");}unset($_SESSION['table_id']);}
            $_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
            $mno             =  $mc->get_cookie( 'mno' , 136 );    
            header_remove(); 
  
            # INITIALIZE 
                echo "<br><BR><BR><BR><BR>";  
                $nno                  = ( !empty($_GET['nno']) ) ? intval($_GET['nno']) : 0 ;   
                $table_id             = ( !empty($_GET['id'] ) ) ? intval($_GET['id']) : 0 ;  
                $table_name           = 'fs_postedarticles';   
                $modal['table_id']    = $_GET['id'];
                $modal['table_name']  = $table_name;



                echo " id " .  $table_id;     
            # UPDATE NOTIFICATION AS VIEWED   
 
            # GET THE SPECIFIC MODAL INFO
                $modal['modal'] = $mc->fs_postedarticles( 
                    array( 
                        'aticle_type'=> 'select',
                        'limit_start'=>0,
                        'limit_end'=>1, 
                        'orderby'=> 'artno desc', 
                        'where'=>"artno = $table_id"  
                    ) 
                );    
                $modal['mno']  = $modal['modal'][0]['mno']; 

            # GET MORE MODALS
            $modal['modal_more'] = $mc->fs_postedarticles( 
                array( 
                    'aticle_type'=> 'select',
                    'limit_start'=>0, 
                    'limit_end'=>30, 
                    'orderby'=> 'artno desc',
                    'where'=>"mno = $modal[mno]" 
                ) 
            );
            // print_r($modal['modal_more']); 
        
            # GET SPECIFIC MODAL COMMENT


            # get first latest comment by cno
                $modal['comments'] =  $mc->posted_modals_comment_Query (
                    array(  
                        'table_name'=>$table_name,
                        'table_id'=>$table_id, 
                        'orderby'=>'cno asc',
                        'limit_start'=>0,
                        'limit_end'=> 10, 
                        'comment_query'=>'get-comment-modal'   
                    ) 
                );  

            # get total comment
                $modal['comments_all'] = $mc->posted_modals_comment_Query (
                    array(  
                        'table_name'=>$table_name,
                        'table_id'=>$table_id, 
                        'orderby'=>'cno asc',
                        'limit_start'=>0,
                        'limit_end'=> 1000, 
                        'comment_query'=>'get-comment-modal'   
                    )   
                );   
                $modal['comments_len'] = count( $modal['comments_all'] );  

            # get next prev  
        
                $modal['nextprev'] = $mc->db_result_next_prev(  $modal['table_name']    , $modal['table_id'] , $modal['modal_more'] , 'all' ); 

                // $mc->print_r1( $modal['modal_more']);  
                // $modal['next'] 
                // $modal['prev'] 
                // $mc->print_r1( $modal['nextprev']);  
                // echo " total comments are $modal[comments_len]     <br> "; 
                // $mc->print_r1($modal['modal'] );   
                // $mc->print_r1( $modal['modal_more'] ); 

            # SET SESSION  

                $_SESSION['modal_more']  = $modal['modal_more']; 
                $_SESSION['nextprev']    = $modal['nextprev']; 
                $_SESSION['modal']       = $modal['modal']; 
               
            # get image src 
                $modal['src']  = $mc->image( 
                    array(
                        'table_name'=>$modal['table_name'],
                        'table_id'=>$modal['table_id'],
                        'type'=>'get-default-image-src',
                        'size'=>'detail' 
                    )
                );


                echo " this is the main image src $modal[src]  <br> ";   

            # MODAL DISPLAYED  



                $modal['prev']                              = $modal['nextprev']['prev']; 
                $modal['next']                              = $modal['nextprev']['next']; 
                $modal['next']                              = $modal['nextprev']['next']; 
                $modal['prev']                              = $modal['nextprev']['prev']; 


              
                $modal['type']                              = $modal['modal'][0]['type'];
                $modal['source_item']                       = $modal['modal'][0]['source_item']; 
                $modal['title']                             = $modal['modal'][0]['title']; 
                $modal['description']                       = $modal['modal'][0]['description']; 
                $modal['keyword']                           = $modal['modal'][0]['keyword']; 
                $modal['category']                          = $modal['modal'][0]['category']; 
                $modal['topic']                             = $modal['modal'][0]['topic']; 
                $modal['source_url']                        = $modal['modal'][0]['source_url']; 
                $modal['source_item']                       = $modal['modal'][0]['source_item']; 
                $modal['extention']                         = $modal['modal'][0]['extention']; 
                $modal['tshare']                            = $modal['modal'][0]['tshare']; 
                $modal['tdrip']                             = $modal['modal'][0]['tdrip']; 
                $modal['tfavorite']                         = $modal['modal'][0]['tfavorite'];  
                $modal['tcomment']                          = $modal['modal'][0]['tcomment'];  
                $modal['trating']                           = $modal['modal'][0]['trating']; 
                $modal['tpercentage']                       = $modal['modal'][0]['tpercentage']; 
                $modal['tview']                             = $modal['modal'][0]['tview']; 
                $modal['active']                            = $modal['modal'][0]['active']; 
                $modal['date']                              = $modal['modal'][0]['date'];  
                $modal['pltvotes']                          = $modal['modal'][0]['pltvotes'];  
                
                $modal['modal_style']                       = $mc->lookdetails_set_size_of_the_look( $modal['src'] , $ri ); 
                $modal['modalowner']                        = $modal['modal'][0]['date'];      
                $modal['current']                           = $table_id;  
                $modal['mno']                               = $mc->get_modal_owner( $table_name , $table_id );  
                $modal['modalownername']                    = $mc->get_full_name_by_id( $modal['mno'] );  
                $modal['kind']                              = 'ARTICLE';
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
                $modal['src_img_favorite']                  = "look-icon-favorite.png"; 
                $modal['src_img_share']                     = "look-icon-share.png";  
                $modal['src_img_flag']                      = "modal-flag-dot.png";//"modal-flag.png";  
                $modal['src_img_main']                      = "";  

            #USER OWNER MODAL 
     
                $user['user']                               = $mc->get_user_full_fs_info( $modal['mno'] );     
                $user['trating']                            = $user['user']['otrating']; 
                $user['tfollower']                          = $user['user']['tfollowers']; 
                $user['following']                          = $user['user']['tfollowing'];  
                $user['tlook']                              = $user['user']['tlooks']; 
                $user['tpercentage']                        = $user['user']['opercentage']; 
                $user['username']                           = $user['user']['username']; 
                $user['tarticle']                           = $user['user']['tarticle'];  
                $user['profile_tab']                        = 'articles';
          
                

                // echo " username ".$user['username'] ;
                  //   $next = $modal['nextprev']['next']; 
                  //     $prev = $modal['nextprev']['prev'];   
                // $mc->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno ,  $modal['title'] , $modal['description'] );   
                // echo  'image src = '.$modal['src']." style modal image ". $modal['modal_style'].'<br>';  
                // $mc->print_look_details_look_owner_header( $mno , $mno1 , $plno , $plno1  , false ,  $lookOwnerMno , $lookOwnerName , $opercentage , $date_ , $user_total_rating , $user_total_followers , $user_total_following , $user_total_lookuploaded );   
     
            # set view and add
                $mc->view(  
                    array(
                        'table_name'=>$modal['table_name'], 
                        'table_id'=>$modal['table_id'],
                        'mno'=> $mno,
                        'type'=> 'add-view'
                    )
                ); 

            #check if already thumbs up or down
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
            #set points color   
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
                    $modal['src_img_drip'] = "look-icon-drip-selected.png";  
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
                    $modal['src_img_favorite'] = "look-icon-favorite-selected.png";  
                } 
                $response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $modal[table_id] and table_name= 'fs_postedarticles' and mno = $mno "  )  );   
                if ( !empty($response) ) {
                      $modal['src_img_flag']   = "large-flag-red.png";
                }  
            # set status of owner or not for the user not allow to rate , drip and favorite the modal
 
                if ( $modal['mno'] == $mno ):                

                    $modal['stat_rated']     =  'modal owner'; 
                    $modal['stat_dripted']   =  'modal owner'; 
                    $modal['stat_favorited'] =  'modal owner';  
                endif;  
            /* 
            *  set view more for the article link  
            */ 
            $more = $mc->look_with_more( $modal['table_id'] , $modal['source_url'] , 'fs_postedarticles' ); // set more..
            page::set_url_for_modal_details($modal['table_id'],'article',$modal['topic'],$modal['date'],$modal['title']); // set url of the page 
            // $modal['source_url'] = strip_tags($modal['source_url']);
            // echo " <br><br><br>this is the me  url ".$modal['source_url'].'<br>' ; 
            // echo " click $more  to show popup <br> ";



            /** get article attribute */  

                    $post_attr = $post->get_post("table_id = $table_id and table_name = 'fs_postedarticles'");   
                    $alt =  (!empty($post_attr[0]['alt'])) ? $post_attr[0]['alt'] : "";  
        

            //modal like status
            $look_attr['response'] = $mc->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>$modal['table_name'], 'table_id'=>$modal['table_id'], 'rate_query'=>'get-user-rated-type'  )  );
            if ( $look_attr['response'] == true ) {
                $look_attr['stat_rated'] =  'look already rated';
                if ( $look_attr['response'] == 'like') {
                    $look_attr['thumbsUp'] = 'look-red-thumbs.png'; 
                }
                if ( $look_attr['response'] == 'dislike') {
                    $look_attr['thumbsDown'] = 'look-red-thumb-down.png'; 
                }
                 $look_rated = true;
                 $_SESSION['look_rated'] = true;
            } else {
                $look_rated = false;
                $_SESSION['look_rated'] = false;
            } 






 

















echo "</div>";

 
// echo " $keyword ";
// $lookName = 'Mauricio (member) has 7 people who signed up using the referral link.There are currently1000 people on the waiting list who has no association to any member on the';
// echo " this is the len of the string ".strlen($lookName);
?>

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
    <script type="text/javascript" src='fs_folders/js/modal.js'></script>

  
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <?php
    $mc->header_attribute(
        "$modal[title]-$modal[modalownername]" ,
        $modal['description'],
        $modal['category']
    );
    if ( $mno != 136) {
        $mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );
    }
    else{
        $mc->login_popup( $mno ,  'login' ) ;
    }
    $mc->fs_popup_container_and_response( );
    ?>
    <div style="display:none" >
        <div id="plno"      ><?php echo $modal['table_id']; ?></div>
        <div id="lookName"  ><?php echo $modal['title']; ?></div>
        <div id="webDesc"   ><?php echo $modal['description'] ; ?></div>
        <div id='lookOwnerName'><?php echo  $modal['modalownername']; ?></div>
    </div>

    <script src="//load.sumome.com/" data-sumo-site-id="fa7e9f07ee92651429290ee93a0e6696ecc87bef3ff77ee5ff9c21d62ff1885b" async="async"></script> 

     <script>
          //iniitlaized mouse over for the modal because id will be duplicated if no id added and may cause not functioning correctly. 
            //look_show_hide_tags('<?php echo $mno; ?>'); 
    </script> 
</head> 

<body  onload="modal_thumbnail( 'fs_postedarticles' , '<?php echo $modal['table_id']; ?>' , 'small' , 'modal-thumbnail-loader' , 'load-thumbnail' , 'modal-detail' )"  itemscope itemtype="http://schema.org/Product"   > 

    <!-- This is the details feed basis -->
    <div style="display:none" >   
        <div id="modal-style"><?php echo strtolower($modal['category']); ?></div>
        <div id="modal-owner"><?php echo $modal['mno'] ; ?></div>
        <div id="modal-tab">looks</div> 
    </div>  
    <?php

    $mc->share_modal_dropdown(
        array(
            'type'=>'pageinfo-to-retrieved-social-share',
            'table_name'=>$modal['table_name'],
            'table_id'=>$modal['table_id'],
            'title'=> $modal['title'],
            'description'=>$modal['description'] 
        )
    );
    if ( $mno == 136 ) {
        // require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');
    }
    $mc->image_mouseover_view(
        'fs_folders/images/uploads/posted looks/thumbnail',
        'fs_folders/images/uploads/posted looks/home'
    );
    $mc->plugins(
        "google analytic",
        "lookdetails"
    );
    include_once("fs_folders/google_analytics/analyticstracking.php");
    ?>

    <div id='lookdetails-res' style="position:fixed; display:none; margin-left:790px;    font-size:11px;  font-wieght:bold; height:auto; width:200px; background-color:#000; color:white">
        res ult here
    </div> 

    <div id='lookdetails_wrapper'  class="container bs-docs-container" >
        <div id='lookdetails_body_container' >
            <!-- container of the response here.. -->
            <div id="details-container-<?php echo $mno; ?>" > 
                <div id='main_container' >
                <!--  new header  -->
                </div>
                <div  style="display:block" class="details-page-header" >
                <table class="details-page-header-table-1" border="0" cellpadding="0" cellspacing="0" >
                    <tr>
                        <td class="padding-bottom padding-top border-bottom header-category">
                            <div class="center">
                                <a href="article?category=<?php  echo strtolower($modal['category']);  ?>">
                                   <span class="center bold border active-border radius-5 tags"    >
                                       <?php echo strtolower($modal['category']); ?>
                                   </span>
                               </a>
                            </div>
                        </td>
                    <tr>
                        <td>
                            <h2 class="left black bold" id="details-title" >
                                <!-- The Soul Of Siberia Hidden Beneath The Water-->
                                <?php echo $modal['title'] ; ?>
                            </h2>
                        </td>
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" style="margin:0px auto" >
                                <tr>
                                    <td>
                                        <?php if($look_rated == false) { ?>
                                            <img
                                                src="fs_folders/images/details/white-red-heart.png"
                                                id="look-like-<?php  echo  $modal['table_id'];  ?>", 
                                                class="details-like-image"
                                                onclick="look_like_click( '<?php echo $mno ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['table_name'] ?>' , 'like' , 'liked.png' , '#look-like-<?php  echo $modal['table_id'];  ?>' , '<?php echo $modal['table_id'] ?>' , '#details-status-1')"
                                                onmousemove="mousein_change_button ( '#look-like-<?php  echo $modal['table_id'];  ?>' , 'fs_folders/images/modal/look/liked.png' )"
                                                onmouseout="mouseout_change_button ( '#look-like-<?php  echo $modal['table_id'];  ?>'  , 'fs_folders/images/details/white-red-heart.png' ) "
                                                />
                                            <input onclick=" test_modal () "  type="text" value="not rated comment" id="rate-comment-stat<?php echo  $modal['table_id']; ?>" class='hide'  />
                                        <?php } else { ?>
                                            <img src="fs_folders/images/modal/look/liked.png"   id="look-like-<?php echo $modal['table_id'];  ?>"    />
                                        <?php } ?>
                                    </td>
                                    <td class="padding-left-icons details-rate-attribute" >
                                        <h2 class="green" id="details-status-1" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( 36 ) ' , 'fron-end' , '#popup-more-doing-the-action-loader img' )">
                                            <?php echo number_format($modal['pltvotes']); ?>
                                        </h2>
                                    </td>
                                    <td class="padding-left-icons-small forward-slash details-rate-attribute" id="details-forward-slash"  >
                                        <h2> / </h2>
                                    </td>
                                    <td class="padding-left-icons" >
                                        <img src="fs_folders/images/details/grey-clock.png">
                                    </td>
                                    <td class="padding-left-icons-small black"  >
                                        <em>
                                            <?php echo $mc->dateTime_convert(   $modal['date']  ); //$mc->date_format( $date_, '/' ); ?> 
                                        </em>
                                    </td>
                                    <td class="padding-left-icons"  >
                                        <img src="fs_folders/images/details/grey-comment-icon.png">
                                    </td>
                                    <td class="padding-left-icons-small black"  >
                                        <!-- <span>143</span> --> 
                                        <span><?php echo $modal['comments_len']; ?></span>
                                    </td>
                                    <td  class="padding-left-icons" >
                                        <img class="social-rectangle-icon" src="fs_folders/images/details/facebook-button.png"
                                            onclick="share_fb_specifi_page (  '<?php $_SERVER['PHP_SELF'] ?>' )"
                                        >
                                    </td>
                                    <td  class="social-right"  >
                                        <img  class="social-rectangle-icon" src="fs_folders/images/details/pinterest-button.png" 
                                            onclick="share_pinterest ( '<?php  echo $modal['table_id']; ?>' ) " 
                                        >
                                    </td>
                                <tr>
                            </table>
                        </td>
                </table>
                </div>
                <!-- Content pic -->
                <div style="clear: both"></div>
                <div class="padding-top-comment details-page-content1 margin-auto " >
                    <div class="details-modal-container center" >

                        <table id='lbc_main_table' >
                            <tr>
                                <td id="banner_view_and_look_view"  >
                                    <table id="banner_view_and_look_view_table_container" border="0"  cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <td id='lbc_look_view' >
                                        <?php
                                        $user_total_followers    = $user['tfollower'];
                                        $user_total_following    = $user['following'] ;
                                        $user_total_percentage   = $user['tpercentage'];
                                        $user_total_rating       = $user['trating'];
                                        $user_total_lookuploaded = count($mc->retreive_specific_user_all_looks( $modal['mno']  ));
                                        $user_total_look_percentage  = $user['tpercentage'];
                                        $user_total_look_star  = 0;
                                        $user_total_look_views  = $modal['tview'];
                                        $user_total_look_drip   = 0;
                                        $user_total_look_share  = array(
                                            'overallsharetotal' => rand(100,200) ,
                                            'facebook' => rand(100,200) ,
                                            'twitter' => rand(100,200) ,
                                            'tumblr' => rand(10,200) ,
                                            'pinterest' => rand(100,200) ,
                                            'google+' => rand(100,200) ,
                                            'stumbleupon' => rand(100,200) ,
                                            'email' => rand(100,200)
                                        );
                                        // $mc->print_name_looktitle_look_desc_for_share( $modal['mno']  ,$modal['table_id']  , $modal['title']  , $modal['description']  );
                                        ?>
                                        <table id='lbc_look_view_tc' border="0" cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <!-- video -->
                                            <?php $imgVidioContaier = ($modal['type'] == 'image') ? 'height: 500px;  padding-bottom: 3px;' : 'height: 500px;  padding-bottom: 17px; background-color: #000000' ?>
                                            <td id='look_view_img_td'  >

                                            <!-- image -->
                                            <td id='look_view_img_td' style="<?php echo $imgVidioContaier; ?>">

                                                <center>
                                                    <div id="load_look_picture_and_tags"  >
                                                        <?php
                                                        echo " <div class='pos' style='display:block'> "; 
                                                        echo "
                                                       </div>"; 

                                                       // if( $modal['type']  == 'video') { 
                                                       //      echo "video";
                                                       // } else { 
                                                       //      echo "image";
                                                       //      echo " <img id='look_view_img' style='$modal[modal_style] '  src='$modal[src]' >";
                                                       // }

                                                       ?>

                                                        <?php if (  $modal['type'] == 'image'):  ?>  
                                                        <?php $article_modal_style = 'margin-top: -60px;width:889px'; ?>
                                                            <img alt="<?php echo $alt; ?>"  src="<?php echo "$modal[src]" ?>" id='look_view_img' style='position:relative;width:100%;<?php echo $modal['modal_style']; ?>' />  
                                                        <?php  else: ?>  
                                                            <iframe alt="<?php echo $alt; ?>" src= "<?php echo $modal['source_item']; ?>?autoplay=1&showinfo=0&rel=0"  style='width:100%; height:390px; margin-top:-20px; border-radius:5px 5px 0px 0px' frameborder='0'  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
                                                        <?php 
                                                            $modal['view_footer_id']  = 'lf_div_container1';
                                                        endif;   
                                                        // }
                                                        ?>
                                                    </div>
                                                </center>
                                            </td>
                                        <tr>
                                            <td id='lf_img_view_td' >
                                                <div id='<?php echo $modal['view_footer_id']; ?>' style="margin-left:2px;border:1px solid none" >
                                                    <?php
                                                    if ( false ) {
                                                        $mc->print_choose_votes_version2( $mno , $modal['table_id'] , $modal['category'] );
                                                    }
                                                    ?>
                                                    <center>
                                                        <table id='lfdc_t1' border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td id='percentage'  style="display:none" >
                                                                    <span title='(<?php echo $user_total_look_percentage; ?>%) Looks Rating' id='tpercentage'style='font-size:20px;' ><?php echo $user_total_look_percentage; ?></span><span style='font-size:15px;' > %</span>
                                                                </td>
                                                                <td id="modal-likethis" style="display:none" >
                                                                    <div>LIKES THIS</div>
                                                                </td>
                                                                <td style="padding-right:20px;display:none" >
                                                                    <table style=" width:40px;" border="0"  >
                                                                        <tr>
                                                                            <td>
                                                                                <img src="<?php echo "  $mc->genImgs/$modal[thumbsUp]"; ?>" title='like'          style='height:18px;'      class='postedlooks-like<?php echo $modal['table_id']; ?>'      onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'like' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $modal['table_id']; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>'  , '<?php echo $modal['category']; ?>'   )" >
                                                                            </td>
                                                                            <td>
                                                                                <div style="margin-top:6px;" >
                                                                                    <img src="<?php echo " $mc->genImgs/$modal[thumbsDown]"; ?>" title='dislike'   style='height:18px;'  class='postedlooks-dislike<?php echo $modal['table_id']; ?>'     onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'dislike' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $modal['table_id']; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $modal['category']; ?>' )"  >
                                                                                </div>
                                                                            </td>
                                                                    </table>
                                                                </td>
                                                                <td id='ldmtd' title="(<?php echo $trating; ?>) Total Rates" style="display:none" >
                                                                    <?php
                                                                    $mc->print_specific_look_ratings(
                                                                        array(
                                                                            'trating'=> $modal['trating']  ,
                                                                            'table_name'=>'postedlooks',
                                                                            'table_id'=>$modal['category'],
                                                                            'category'=>$modal['category']
                                                                        )
                                                                    );
                                                                    ?>
                                                                </td>










                                                                <td id='ld_eyes' >
                                                                    <img src="<?php echo $mc->path_icons;?>/Views-Icon.png" title="views" >
                                                                </td>
                                                                <td>
                                                                    <span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( <?php echo "$user_total_look_views"; ?> ) ' , 'fron-end' , '#popup-more-doing-the-action-loader img' )"  >
                                                                        <?php echo $user_total_look_views; ?>
                                                                    </span>
                                                                </td>
                                                                <td id='total_arrow' >
                                                                    <img src="<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Look' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>' , '<?php echo $modal['table_id']; ?>' , '#stat-look-dripted<?php echo $modal['table_id']; ?>'  )" >
                                                                </td>
                                                                <td >
                                                                    <span id='ttext' class="modal-tdriped<?php echo $modal['table_id']; ?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'DRIPPED ( <?php echo "$modal[tdrip]"; ?> ) ' , 'fron-end' ,   '#popup-more-doing-the-action-loader img' )" >
                                                                        <?php echo $modal['tdrip'];  ?>
                                                                    </span>
                                                                </td>
                                                                <td id='ld_star_with_cross'  >
                                                                    <!-- <img src="<?php echo $mc->path_icons;?>/favorite-icon.png" title="favorite">  -->
                                                                    <img src="<?php echo "$mc->genImgs/$modal[src_img_favorite]"; ?>" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-detail-yellow.png"; ?>' , '<?php echo $modal['tfavorite']; ?>' ,'#stat-look-favorited<?php echo $modal['table_id']; ?>'   )"  >
                                                                </td>
                                                                <td style="padding-left:10px;" >
                                                                    <span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'FAVORITES ( <?php echo "$modal[tfavorite]"; ?> ) ' , 'fron-end' ,  '#popup-more-doing-the-action-loader img' )" >
                                                                        <?php echo  $modal['tfavorite']; ?>
                                                                    </span>
                                                                </td>
                                                                <td id='ld_square_with_arrow'  >
                                                                    <img src="<?php echo $mc->path_icons;?>/share-icon.png" title="share"  onmouseover="share_mouser_over('<?php echo $plno; ?>')" onmouseout="share_mouser_out('<?php echo $plno; ?>')" >
                                                                </td>
                                                                <td>
                                                                    <span id='ttext' > <?php echo $user_total_look_share["overallsharetotal"]; ?> </span>
                                                                </td>

                                                                <?php  $mc->print_look_footer_flag_or_edit( $mno , $mno1 , $modal['table_id']  , $modal['table_name']  , $modal['src_img_flag'] , "post-look-label?kooldi=$modal[table_id]&type=u" ); ?>
                                                                <td id='ld_scope' >
                                                                    <a href="z?i=<?php echo $plno; ?>"  target="_blank" >
                                                                        <img src="<?php echo $mc->path_icons;?>/zoom-icon.png" title="zoom" >
                                                                    </a>
                                                                </td>

                                                                    <!-- <td id='ld_scope'  >
                                                                        <img src="<?php echo $mc->path_icons;?>/flag-icon.png"  title="flag" style='display:none' >
                                                                    </td>   --> 
                                                                <td id="ld_padding" >
                                                                </td>

                                                                <td id="ld_hide_show" >
                                                                    <img style="display:none"  id="rectangle-image-footer-hide" title="hide" onclick="hide_look_foooter_rectangle()"   src="<?php  echo  "$mc->path_icons/hide-icon.png"; ?>" />
                                                                </td>
                                                            <tr>
                                                                <td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                    <!-- dropdowns share -->
                                                                    <div style="border:1px solid none;positio:absolute" >
                                                                        <?php
                                                                        $mc->share_modal_dropdown(
                                                                            array(
                                                                                'type'=>'details',
                                                                                'table_name'=>$modal['table_name'],
                                                                                'table_id'=>$modal['table_id'],
                                                                                'id'=>$modal['table_id'],
                                                                                'about'=>$modal['description'],
                                                                                'name'=>$modal['modalownername'],
                                                                                'title'=>$modal['title'],
                                                                                'page'=>'articledetails',
                                                                                'link'=>'',
                                                                                'picture'=>''
                                                                            )
                                                                        );
                                                                        ?>
                                                                    </div>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                                </td><td>
                                                        </table>
                                                    </center>
                                                </div>
                                                <!-- validator -->
                                                <div id="status-container"    >
                                                    <input type="text" value="<?php echo "$modal[stat_rated]"; ?>"       id="stat-look-rated<?php echo $modal['table_id']; ?>"       /> <br>
                                                    <input type="text" value="<?php echo "$modal[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $modal['table_id']; ?>"         /> <br>
                                                    <input type="text" value="<?php echo "$modal[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $modal['table_id']; ?>"    /> <br>
                                                </div> 
                                            </td>
                                        </table>
                                        </td>
                                    </table>
                                </td>   <!--  end banner_view_and_look_view -->

                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Header Profile -->
                <div style="display:block" class="details-page-header-1 padding-left padding-right "  > 
                    <ul class="ul-container-cols-2" >
                        <li class="ul-container-cols-2-li-left  " >
                            <div class="profile-container-left padding-profile-top" >
                                <table border="0" cellpadding="0" cellspacing="0" style="margin: 0px auto; width: 100%" >
                                    <tr>
                                        <td>
                                            <div class="profile-container" >
                                                <img src="fs_folders/images/details/profile.jpg" class="profile" />
                                            </div>
                                        </td>
                                    <tr>
                                        <td>
                                            <div class="center padding-profile-top paddin-profile-content " >
                                                <a href="<?php echo $user['username']; ?>"> 
                                                    <span class="profile-name blue" >  
                                                        <?php echo $modal['modalownername']; ?> 
                                                    </span> 
                                                    </a>
                                            </div>
                                        </td>
                                    <tr>
                                        <td>
                                            <div class="center padding-profile-top paddin-profile-content"  >
                                                <span class="text black" >  <?php echo $occupation;  ?></span>
                                            </div>
                                        </td>
                                    <tr>
                                        <td>
                                            <div class="center padding-profile-top padding-profile-bottom  paddin-profile-content" > 
                                                    <span class="black">
                                                        Looks
                                                        <span class="bold"  > <bold> <a href="<?php echo $user['username'] . '-looks'; ?>" ><?php echo number_format($tlooks); ?> </a> </bold> </span>
                                                        Likes
                                                        <span class="bold" > <bold>  <a href="#"> <?php echo number_format($modal['trating']); ?></a>   </bold> </span>
                                                        Followers
                                                        <span class="bold" > <bold> <a href="<?php echo $user['username'] . '-followers'; ?>" id="details-follow-counter" >  <?php echo number_format($user['tfollower']); ?> </a> </bold> </span> 
                                                    </span>
                                            </div>
                                        </td>
                                    <tr>
                                        <td class="hide" >
                                            <div class="padding-profile-top" >
                                                <table border="0" cellspacing="0" cellpadding="0" class="social-profile-icons-table" >
                                                    <tr>
                                                        <td class="td-left" >
                                                            <img
                                                                id="member-social-facebook"
                                                                class="member-social-icons"
                                                                src="fs_folders/images/details/facebook.png"
                                                                onmousemove=" mousein_change_button ( '#member-social-facebook' , 'fs_folders/images/details/facebook-grey.png' )"
                                                                onmouseout="mouseout_change_button (  '#member-social-facebook'  , 'fs_folders/images/details/facebook.png' )"

                                                                />
                                                        </td>

                                                        <td  class="td-center" >

                                                            <!--<img class="member-social-icons" src="fs_folders/images/details/twitter.png" />-->

                                                            <img
                                                                id="member-social-twitter"
                                                                class="member-social-icons"
                                                                src="fs_folders/images/details/twitter.png"
                                                                onmousemove=" mousein_change_button ( '#member-social-twitter' , 'fs_folders/images/details/twitter-grey.png' )"
                                                                onmouseout="mouseout_change_button (  '#member-social-twitter'  , 'fs_folders/images/details/twitter.png' )"

                                                                />
                                                        </td>

                                                        <td class="td-center" >

                                                            <!--<img class="member-social-icons" src="fs_folders/images/details/instagram.png" />-->

                                                            <img
                                                                id="member-social-instagram"
                                                                class="member-social-icons"
                                                                src="fs_folders/images/details/instagram.png"
                                                                onmousemove=" mousein_change_button ( '#member-social-instagram' , 'fs_folders/images/details/instagram-grey.png' )"
                                                                onmouseout="mouseout_change_button (  '#member-social-instagram'  , 'fs_folders/images/details/instagram.png' )"

                                                                />


                                                        </td>

                                                        <td class="td-center" >
                                                            <!--<img class="member-social-icons" src="fs_folders/images/details/twitter.png" />-->

                                                            <img
                                                                id="member-social-pinterest"
                                                                class="member-social-icons"
                                                                src="fs_folders/images/details/pinterest.png"
                                                                onmousemove=" mousein_change_button ( '#member-social-pinterest' , 'fs_folders/images/details/pinterest-grey.png' )"
                                                                onmouseout="mouseout_change_button (  '#member-social-pinterest'  , 'fs_folders/images/details/pinterest.png' )"

                                                                />



                                                        </td>

                                                        <td  class="td-right">
                                                            <!--<img class="member-social-icons" src="fs_folders/images/details/instagram.png" />-->
                                                            <img
                                                                id="member-social-tumblr"
                                                                class="member-social-icons"
                                                                src="fs_folders/images/details/tumblr.png"
                                                                onmousemove=" mousein_change_button ( '#member-social-tumblr' , 'fs_folders/images/details/tumblr-grey.png' )"
                                                                onmouseout="mouseout_change_button (  '#member-social-tumblr'  , 'fs_folders/images/details/tumblr.png' )"

                                                                />

                                                        </td>

                                                </table>
                                            </div>
                                        </td>


                                        <?php if($mno != $mno1): ?>
                                            <tr>
                                                <td>  


                                                    <div class="profile-follow center padding-profile-top blue border-top" > 
                                                        <?php  
                                                        // echo "mno = $mno1 and mno1 = $mno1 <br>";
                                                             $mc->print_user_modals_follow_or_unfollow_buttons($mno,  $mno1, 'width:103px !important', 'fs_folders/images/profile/follow.png', 'fs_folders/images/profile/following.png', 'details', '#details-follow-counter'); 
                                                        ?>
                                                       <!--  
                                                            <img 
                                                                class='details-member-follow'
                                                                style="margin-left:3px;" 
                                                                src="fs_folders/images/profile/follow.png" 
                                                                onmousemove=" mousein_change_button ( '.details-member-follow' , 'fs_folders/images/profile/following.png' )" 
                                                                onmouseout="mouseout_change_button (  '.details-member-follow'  , 'fs_folders/images/profile/follow.png' ) "
                                                            >
                                                        --> 
                                                    </div>   
                                                </td>

                                        <?php endif; ?>


                                </table>
                            </div>
                        </li>
                        <li class="ul-container-cols-2-li-right" >


                            <?php if(!empty($modal['description'])): ?>
                                <div class="profile-container-right profile-container-padding-left profile-container-padding-right black  padding-profile-top "  >  
                                         <?php echo $modal['description']; ?>   
                                        <?php 
                                            if(!empty($modal['source_url'])){ ?>
                                                <a href="#" onclick="fs_popup( 'details-popup-continue-reading')" >
                                                    <span class="more green" > continue reading.. </span> 
                                                </a>   
                                            <?php  
                                            } 
                                        ?>
                                    </p>
                                </div>  
                            <?php endif; ?>

                            <div style="display:block; padding-left:42px; padding-top: 24px;padding-bottom: 0px;" class="details-page-content2 bg-white padding-top" > 
                                <div>  
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                <a href="look?category=<?php  echo $category; ?>">
                                                    <span class="center bold border-gey tags radius-5">
                                                        <?php  echo $modal['category'];  ?>
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="social-right">
                                                <a href="#"><span class="center bold border-gey tags radius-5"> BAIKAL </span> </a>
                                            </td>
                                            <td class="social-right">
                                                <a href="#"><span class="center bold border-gey tags radius-5"> LAKE </span> </a>
                                            </td>
                                    </tr></tbody></table>  
                                </div> 
                                <div class="center padding-top-comment details-rating-stat" style="margin-top: -22px;"  >
                                    <table border="0" cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <td >
                                                <!-- <img class="heart-icon" src="fs_folders/images/details/white-red-heart.png" >-->
                                                <?php if($look_rated == false) { ?>
                                                    <img
                                                        src="fs_folders/images/details/white-red-heart.png"
                                                        id="look-like-1-<?php  echo  $modal['table_id'];  ?>"
                                                        class="details-like-image"
                                                        onclick="look_like_click( '<?php echo $mno ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['table_name'] ?>' , 'like' , 'liked.png' , '#look-like-1-<?php  echo $modal['table_id'];  ?>' , '<?php echo $modal['table_id'] ?>' , '#details-status-2')"
                                                        onmousemove="mousein_change_button ( '#look-like-1-<?php  echo $modal['table_id'];  ?>' , 'fs_folders/images/modal/look/liked.png' )"
                                                        onmouseout="mouseout_change_button ( '#look-like-1-<?php  echo $modal['table_id'];  ?>'  , 'fs_folders/images/details/white-red-heart.png' ) "
                                                        />
                                                    <input onclick=" test_modal () "  type="text" value="not rated comment" id="rate-comment-stat<?php echo  $modal['table_id']; ?>" class='hide'  />
                                                <?php } else { ?>
                                                    <img src="fs_folders/images/modal/look/liked.png"   id="look-like-1-<?php  echo $modal['table_id']; ?>"    />
                                                <?php } ?> 
                                             </td>
                                            <td class="padding-left-icons details-rate-attribute" style="padding-top: 28px;" >
                                                <h2 class="green" id="details-status-2" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'ratings' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( 36 ) ' , 'fron-end' , '#popup-more-doing-the-action-loader img' )">
                                                    <?php echo number_format($modal['pltvotes']); ?>
                                                </h2>
                                            </td>
                                            <!--  <h2 class="bold green" id="details-status" > 3.4K  </h2>-->
                                            <!--   </td>-->
                                            <!-- <td>
                                                <h2 class="bold forward-slash" id="details-forward-slash" > / </h2> 
                                            </td> -->
                                            <td class="padding-left-icons-small forward-slash details-rate-attribute" id="details-forward-slash" style="padding-top: 28px;" >
                                                <h2> / </h2>
                                            </td>

                                            
                                            <td  class="padding-left-icons" >
                                                <!-- <img class="social-rectangle-icon" src="fs_folders/images/details/facebook-button.png" > -->
                                                <img class="social-rectangle-icon" src="fs_folders/images/details/facebook-button.png"
                                                    onclick="share_fb_specifi_page (  '<?php $_SERVER['PHP_SELF'] ?>' )"
                                                >
                                                    
                                            </td>
                                            <td  class="social-right"  >
                                                <!-- <img  class="social-rectangle-icon" src="fs_folders/images/details/pinterest-button.png" > -->
                                                <img  class="social-rectangle-icon" src="fs_folders/images/details/pinterest-button.png" 
                                                    onclick="share_pinterest ( '<?php  echo $modal['table_id']; ?>' ) " 
                                                >
                                            </td>
                                    </table>
                                </div> 
                            </div>
                        </li>
                    </ul>
                </div> 

                <!-- Content Comments -->
                <div style="clear: both"></div>
            
                <div class="comment-container">
                    <div class="auto padding-top-comment">
                        <table border="0" class="margin-auto" style="width:33%;">
                            <tbody><tr>
                                <td style="width:45%">
                                    <div class="float-right center bold pointer" style="border-bottom: 3px solid  rgb(221, 24, 41); ">
                                        <table border="0" cellpadding="0" cellspacing="0"> 
                                            <tbody>
                                                <tr>
                                                    <td style="padding-left: 2;"> 
                                                        <span>Comments</span> 
                                                    </td>
                                                    <td style="padding-left: 10px;" id="details-total-comment"> 
                                                        <?php echo $modal['comments_len']; ?>   
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td style="width: 27%"> 
                                    <!-- <select class="sorting border-grey" onchange="sort_look_comment('<?php echo $modal['table_id']; ?>')" id="sort_look_comment" > 
                                        <option value="order by plcno desc"> NEWEST COMMENT </option>
                                        <option value="order by plcno asc"> OLDEST COMMENT </option>
                                        <option value="order by plctlikes desc"> MOST HELPFUL COMMENT</option>
                                        <option value="order by plctdislike desc"> MOST NOT HELPFUL COMMENT</option>
                                    </select>  -->

                                        <?php $mc->print_look_comment_sorting_option( $modal['table_name'] , $modal['table_id'] );  ?> 
                                </td>
                                <td class="hide">
                                    <div class="details-edit "><img id="comment-message" src="fs_folders/images/details/comment-icon.png" onmousemove=" mousein_change_button ( '#comment-message' , 'fs_folders/images/details/comment-icon-mouse.png' )" onmouseout="mouseout_change_button (  '#comment-message'  , 'fs_folders/images/details/comment-icon.png' ) "> </div>
                                </td> 
                        </tr></tbody></table>
                    </div>
                    <div class="bs-example " data-example-id="media-list" style="padding:0px; margin:0px; width: 740px; border:1px solid none; margin: 0 auto; padding-bottom: 40px;padding-top: 20px; ">
                        <?php $np = $mc->generate_next_prev_numbers( $modal['comments_len'] , 10 ); ?>          
                        <ul id="look-comment-cotainer-ul" >
                            <li id="comment-top-next-prev" >  
                                <div style="margin-left: -39px;" > 
                                    <?php $mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'] ,  'table_id'=> $modal['table_id'] ) ) ;    ?>
                                </div>
                            </li>
                            
                        </ul>  
                        
                        <div style="clear:both"> </div>

                        <ul class="media-list" id="comments_result" style="margin-left:-38px" >

                            <li class="media border-top padding-top-comment " style="display:none" >
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="http://dev.fashionsponge.com/fs_folders/images/uploads/members/mem_thumnails/927.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading" id="media-heading">
                                        <span class="profile-name black"><a href="#"> ANNA OSTYANKO </a> </span>&nbsp;
                                        <a class="anchorjs-link" href="#media-heading"> 
                                            <img src="fs_folders/images/details/grey-clock.png">&nbsp; 
                                            <span class="anchorjs-icon">
                                                <em class="grey">june 11,2014 9:26pm</em>
                                            </span>
                                        </a>
                                    </h4>

                                    <p class="black">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                    </p>

                                    <!--Reply Text-->
                                    <div>
                                        <img src="fs_folders/images/details/grey-comment-icon.png"> <a href="#"><span class="red font-arial comment-reply">REPLY</span> </a>
                                        <img class="like" src="http://localhost/fs/new_fs/alphatest/fs_folders/images/genImg/commen-like-unlike.png"> <span class="like-dislike-rating">2</span> 
                                        <img class="dislike" src="http://localhost/fs/new_fs/alphatest/fs_folders/images/genImg/comment-dislike-un-disliked.png"> <span class="like-dislike-rating">32</span> 
                                    </div>
                                </div>
                            </li>

                            <li class="media border-top padding-top-comment" style="display:none">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="http://dev.fashionsponge.com/fs_folders/images/uploads/members/mem_thumnails/927.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading" id="media-heading">
                                        <span class="profile-name black"> <a href="#"> ANNA OSTYANKO</a> </span>&nbsp;
                                        <a class="anchorjs-link" href="#media-heading"> 
                                            <img src="fs_folders/images/details/grey-clock.png">&nbsp; 
                                            <span class="anchorjs-icon">
                                                <em class="grey">june 11,2014 9:26pm</em>
                                            </span>
                                        </a>
                                    </h4>

                                    <p class="black">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                    </p>

                                    <!--Reply Text-->
                                    <div>
                                        <img src="fs_folders/images/details/grey-comment-icon.png"><a href="#"> <span class="red font-arial comment-reply">REPLY</span> </a>
                                        <img class="like" src="http://localhost/fs/new_fs/alphatest/fs_folders/images/genImg/commen-like-unlike.png"> <span class="like-dislike-rating">32</span> 
                                        <img class="dislike" src="http://localhost/fs/new_fs/alphatest/fs_folders/images/genImg/comment-dislike-un-disliked.png"> <span class="like-dislike-rating">100</span> 
                                    </div>
                                </div>
                            </li>
                            <?php
                                // $plno = 10;
                                $st = null;
                                $dtime  = null; 
                                $comment1  = null;
                                $profilepath = null;
                               
                               // $mc->print_look_comment_v1( $mno , $modal['table_id'] , $comment1 , 'init' , $dtime , $st , $nexprev=null , $sort='order by artno desc' , $profilepath=null )
 
                                $c = 0;
                                for ($i=0; $i < count($modal['comments']) ; $i++) { 

                                    // set background image container white or grey   

                                     
                                        if ( $c%2==0 ) {
                                            $background_color  = 'background-color:white;';
                                        }
                                        else {
                                            $background_color  = '';
                                        } 

                                    // function comment 

                                        $mc->modal_print_comment_v1( $modal['comments'][$i] , null , $background_color );  

 

                                        $c++;
                                } 
                             

                            ?> 
                        </ul>


                        <div style="clear:both"> </div>

                        <ul id="look-comment-cotainer-ul"  style="width: 783px;margin-left: -38px;margin-top: 19px;" >
                            <li class="media border-top "  > 
                                <div style="margin-top: 17px;">

                                    <?php    $mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'],  'table_id'=>$modal['table_id'] ) ) ;      ?>
                               </div>
                            </li>
                        </ul>

                        <div style="clear:both"> </div>

                        <ul class="media-list" id="comments_result" style="margin-left: -38px;width: 781px;" >  


                        <?php // $mc->modal_comment_send_textarea( $mno , $modal['table_id'] , $modal['table_name'] , $modal['table_id']); ?> 

                            <li class="media  padding-top-comment ">  
                                <div class="comment-textarea">
                                    <div class="center border-bottom margin-bottom text" id="details-comment-text"> <span> Comment </span> </div>
                                    <table border="0">
                                        <tbody><tr>
                                            <td style="width:100px; text-align:center">
                                                <a href="#">
                                                    <img class="media-object margin-auto" id="details-comment-avatar" data-src="holder.js/64x64" alt="64x64" src="http://dev.fashionsponge.com/fs_folders/images/uploads/members/mem_thumnails/927.jpg" data-holder-rendered="true" style="width: 64px; height: 64px;">
                                                </a>
                                            </td>
                                            <td style="padding-right: 20px;">
                                                <textarea  onkeyup="modal_comment_send ( '<?php echo "$mno"; ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id'] ?>' , event , 'detail-keyup' ,'comments_result' ,  '#modal-comment-loader-test1 , #modal-comment-loader-test2' )" class="comment_box"  id='modal-comment-field<?php echo "$table_id"; ?>' ></textarea>
                                            </td>
                                        </tr><tr>
                                            <td style="width:100px">
                                            </td>
                                            <td style="padding-top:10px;padding-bottom:10px; padding-right: 20px; padding-bottom: 15px; ">
                                                <table border="0" style="width:200px; float:right;">
                                                    <tbody><tr>
                                                        <td style="display:none" >
                                                            <img id="comment-button-cancel" class="comment-button-cancel" src="fs_folders/images/details/comment-cancel.png" onmousemove=" mousein_change_button ( '#comment-button-cancel' , 'fs_folders/images/details/cancel-mouse-over.png' )" onmouseout="mouseout_change_button (  '#comment-button-cancel'  , 'fs_folders/images/details/comment-cancel.png' )" onclick="clear_input('#comment_box')" >
                                                        </td>
                                                        <td class="social-right"> 
                                                            <img id="comment-button-add" class="comment-button-add" src="fs_folders/images/details/add-comment.png" onmousemove=" mousein_change_button ( '#comment-button-add' , 'fs_folders/images/details/add-comment-mouse.png' )" onmouseout="mouseout_change_button (  '#comment-button-add'  , 'fs_folders/images/details/add-comment.png' )" onclick="modal_comment_send ( '<?php echo "$mno"; ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id'] ?>'  , event , 'detail' ,'comments_result' ,  '#modal-comment-loader-test1 , #modal-comment-loader-test2' )" >
                                                        </td>
                                                </tr></tbody></table>
                                            </td>
                                    </tr></tbody></table>
                                </div>   
                            </li>   
                        </ul>

                        <div style="clear:both"> </div>

                    </div>
                </div>
            </div>