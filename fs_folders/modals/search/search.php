<?php
/**
 * Created by PhpStorm.
 * User: Jesus
 * Date: 7/13/2015
 * Time: 12:50 PM
 */

	ob_start();
	require ("../../../fs_folders/php_functions/connect.php");
	include ("../../../fs_folders/php_functions/Time/Time.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");

    require ("../../../fs_folders/php_functions/Database/LookbookDatabase.php");
    require ("../../../fs_folders/php_functions/Extends/LookbookExtends.php");
    require ("../../../fs_folders/php_functions/Class/Lookbook.php");

    require_once ("../../../fs_folders/php_functions/Database/Invited.php");




	$database = new Database();
	$invited1  = new \Invitation\Invited();
	$database->connect();
    $mc              =  new myclass();
    $pa              =  new postarticle( );
    $ri              =  new resizeImage ();
    $sc 			 =  new scrape();
    $lookbook        =  new lookbook();
    LookbookDatabase::$database = $db;

    // initialized
	 	$_SESSION['mno'] = $mc->get_cookie( 'mno' , 136 );
	 	$mno 	 		 = $mc->get_cookie( 'mno' , 136 );
		$mno2            = 134; // owner of the modal

		$action          = ( !empty($_GET['action']) )      ? $_GET['action']      	: null ;
		$process         = ( !empty($_GET['process']) )     ? $_GET['process']     	: null ;
		$step            = ( !empty($_GET['step']) )        ? $_GET['step']        	: null ;
		$type            = ( !empty($_GET['type']) )        ? $_GET['type']        	: null ;
		$stat            = ( !empty($_GET['stat']) )        ? $_GET['stat']        	: null ;
		$table_name      = ( !empty($_GET['table_name']) )  ? $_GET['table_name']  	: 'postedlooks' ;
		$table_id        = ( !empty($_GET['table_id']) )    ? $_GET['table_id']    	:  0 ;
		$comment         = ( !empty($_GET['comment']) )     ? $_GET['comment'] : '' ;
		$msg             = ( !empty($_GET['msg']) )         ? $_GET['msg']         	: null ;
		$keySearch       = ( !empty($_GET['keySearch']) )   ? $_GET['keySearch']   	: null ;
		$mno1            = ( !empty($_GET['mno1']) )        ? $_GET['mno1']        	: 0 ;
		$message         = ( !empty($_GET['message']) )     ? $_GET['message']     	: 0 ;
		$msgno           = ( !empty($_GET['msgno']) )       ? $_GET['msgno']       	: 0 ;
		$ano             = ( !empty($_GET['ano']) )         ? $_GET['ano']         	: 0 ;
		$textfieldid     = ( !empty($_GET['textfieldid']) ) ? $_GET['textfieldid'] 	: 0 ;
		$response_c      = ( !empty($_GET['response']) ) 	? $_GET['response']    	: 0 ;  // response container
		$loader 		 = ( !empty($_GET['loader']) ) 		? $_GET['loader'] 	   	: 0 ;
		$limit_start     = ( !empty($_GET['limit_start']) ) ? $_GET['limit_start'] 	: 0 ;
		$limit_end 		 = ( !empty($_GET['limit_end']) )   ? $_GET['limit_end']   	: 1 ;
		$color 			 = ( !empty($_GET['color'])) 		? $_GET['color'] 	   	: null ;
		$brand 			 = ( !empty($_GET['brand'])) 		? $_GET['brand'] 	   	: null ;
		$garment		 = ( !empty($_GET['garment'])) 	? $_GET['garment']	   		: null ;
		$material		 = ( !empty($_GET['material'])) 	? $_GET['material']     : null ;
		$pattern 		 = ( !empty($_GET['pattern'])) 	? $_GET['pattern']	   		: null ;
		$pos_x_y		 = ( !empty($_GET['pos_x_y'])) 	? $_GET['pos_x_y'] 	   		: null ;
		$style 		     = ( !empty($_GET['style'])) 		? $_GET['style'] 	    : null ;
		$occasion 		 = ( !empty($_GET['occasion'])) 	? $_GET['occasion']     : null ;
		$season 		 = ( !empty($_GET['season'])) 		? $_GET['season']       : null ;
		$keyword 		 = ( !empty($_GET['keyword'])) 	? $_GET['keyword']     		: null ;
		$desc 		  	 = ( !empty($_GET['desc'])) 		? $_GET['desc']         : null ;
		$article 		 = ( !empty($_GET['article'])) 	? $_GET['article']     	  	: null ;
		$method			 = ( !empty($_GET['method'])) 		? $_GET['method']     	: null ;
		$orderby	     = ( !empty($_GET['orderby']))     ? $_GET['orderby']     	: null ;
		$like	     	 = ( !empty($_GET['like']))        ? $_GET['like']        	: null ;
		$sub	      	 = ( !empty($_GET['sub']))         ? $_GET['sub']         	: null ;
		$title	      	 = ( !empty($_GET['title']))       ? $_GET['title']       	: 'title not set' ;
		$page	      	 = ( !empty($_GET['page']))        ? $_GET['page']        	: 'back-end';
		$category	     = ( !empty($_GET['category']))    ? $_GET['category']    	: 'empty';
		$invited_id	     = ( !empty($_GET['invited_id']))  ? $_GET['invited_id']  	: 0;
		$status_val	     = ( !empty($_GET['status_val']))  ? intval($_GET['status_val'])  : 0;
		$fullname		 = ( !empty($_GET['fullname']))  	? $_GET['fullname'] 	: '' ;
		$email 			 = ( !empty($_GET['email'])) 		? $_GET['email'] 		: '' ;
		$websiteOrBlog   = ( !empty($_GET['websiteOrBlog']))? $_GET['websiteOrBlog'] : '' ;
		$occupation 	 = ( !empty($_GET['occupation']))   ? $_GET['occupation'] 	: '' ;
		$style 		     = ( !empty($_GET['style']))        ? $_GET['style'] 		: '' ;
		$wob 			 = ( !empty($_GET['wob']))          ? $_GET['wob'] 			: null ;
		$tlook 		     = ( !empty($_GET['tlook'])) 		? $_GET['tlook'] 		: 0 ;
		$city 			 = ( !empty($_GET['city'])) 		? $_GET['city'] 		: '' ;
		$state 			 = ( !empty($_GET['state'])) 		? $_GET['state'] 		: '' ;
		$country 		 = ( !empty($_GET['country'])) 		? $_GET['country'] 		: '' ;
		$description 	 = ( !empty($_GET['description'])) 	? $_GET['description'] 	: '' ;
		$status 		 = ( !empty($_GET['status'])) 		? $_GET['status'] 		: 0 ;
		$actual_modal    = ( !empty($_GET['actual_modal']) )? $_GET['actual_modal'] : false ;
		$url             = ( !empty($_GET['url']) )         ? $_GET['url']          : '' ;
		$page_start      = ( !empty($_GET['page_start']) )  ? intval($_GET['page_start']) : '' ;
		$page_end        = ( !empty($_GET['page_end']) )    ? intval($_GET['page_end']) : '' ;
		$DateTime        = ( !empty($_GET['DateTime']) )    ? str_replace('T', ' ', $_GET['DateTime'])  : '' ;
		$location        = ( !empty($_GET['location']) )    ? $_GET['location']      : '' ;
		$gender        	 = ( !empty($_GET['gender']) )      ? $_GET['gender']        : '' ;
		$isAgreed        = ( !empty($_GET['isAgreed']) )    ? $_GET['isAgreed']      : '' ;




			// echo " <br> <br> <br> <br> dateTime $DateTime    <br>";

	// functions
		$wob     		   = str_replace(' ', '.' , $wob ); // domain url
		$wob     		   = str_replace('[dot]', '.' , $wob ); // domain url
		$websiteOrBlog     = str_replace('[dot]', '.' , $websiteOrBlog ); // domain url
		$comment 		   = str_replace('[-double-dot-]', ':' , $comment ); // domain url
		$url     		   = str_replace(' ', '.' , $url ); // domain url
		$url     		   = str_replace('[-double-dot-]', ':' , $url ); // domain url




  		if ( !empty($_GET['mno']) ) {  $mno = ( $_GET['mno'] != 'undefined' and !empty($_GET['mno']) )  ? $_GET['mno'] : $mno ;   }
// echo " 	status_val	  = 	$status_val	  ";
// echo "<br><div  onclick=\"$('#fs-general-ajax-response').text('')\" >(x)</div>";
// echo " <BR><BR><BR> action = $action process = $process <br> ";
// echo "  this is the gen.modals.func.php <br><BR><BR> <H1> EDSAN GWAPA!</H1>";
// echo "adsasdas da<br> dasdada<b>";
// echo "table name = $table_name and table_id $table_id <br> ";
// echo " method $method <br>";




	# initlaized

    $text_more_member               = null;
    $text_more_article              = null;
    $text_more_look                 = null;

    $_SESSION['counter_member']     = 0;
    $_SESSION['counter_article']    = 0;
    $_SESSION['counter_look']       = 0;
    $limit_end 					    = $_SESSION['view_more'];
    // $_SESSION['keySearch']          = $keySearch;

    # retrieved response display limit 7 modals

        $member = $mc->fs_search(
            array(
                'type'=>'select',
                'where'=> "keyword LIKE '$keySearch%' and table_name = 'fs_members' ",
                'orderby'=> 'sno asc',
                'limit_start'=>0,
                'limit_end'=>$limit_end
            )
        );

        $article = $mc->fs_search(
            array(
                'type'=>'select',
                'where'=> "keyword LIKE '$keySearch%' and table_name = 'fs_postedarticles' ",
                'orderby'=> 'sno desc',
                'limit_start'=>0,
                'limit_end'=>$limit_end
            )
        );

        $look  = $mc->fs_search(
            array(
                'type'=>'select',
                'where'=> "keyword LIKE '$keySearch%' and table_name = 'postedlooks' ",
                'orderby'=> 'sno desc',
                'limit_start'=>0,
                'limit_end'=>$limit_end
            )
        );

    # retrieve total modal speifici search result

        $tmember = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',    'where'=>" keyword LIKE '$keySearch%' and table_name = 'fs_members'  ", ) );
        $tmember = $tmember[0]['sno'];

        $tarticle = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',    'where'=>" keyword LIKE '$keySearch%' and table_name = 'fs_postedarticles'  " ) );
        $tarticle = $tarticle[0]['sno'];

        $tlook    = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',      'where'=>" keyword LIKE '$keySearch%' and table_name = 'postedlooks'  " ) );
        $tlook    = $tlook[0]['sno'];

    # subtract the result and total count of the search

        // 	$tmember  =  $tmember;   - count( $member );
        // $tarticle =  $tarticle;  - count( $article );
        // $tlook    =  $tlook;     - count( $look );

    # calculate result for view more text

        if ( $tmember  > $_SESSION['view_more'] ) {
            $text_more_member  = $_SESSION['view_more_text'];
        }
        if ( $tarticle > $_SESSION['view_more'] ) {
            $text_more_article = $_SESSION['view_more_text'];
        }
        if ( $tlook    > $_SESSION['view_more'] ) {
            $text_more_look   = $_SESSION['view_more_text'];
        }

    # print the result into rows

        echo "
                <td>
                    <div style='margin-left:10px;' >
                        <ul>
                            <li style='width:283px; border: 1px solid none; '  id='search-result-container-li' >
                                <div id='search-response-title-1' style='padding-bottom:20px;margin-left:4px;'  >MEMBER</div>
                                <div style='' id='search-content-result-cotainer-member' > ";
                                    if ( !empty( $member )) {
                                        for ($i=0; $i < count($member) ; $i++) {
                                            if ( $member[$i]['table_name'] == 'fs_members' ) {
                                                # initialized
                                                $location = '';
                                                $sno          = $member[$i]['sno'];
                                                $keyword      = $member[$i]['keyword'];
                                                $table_name   = $member[$i]['table_name'];
                                                $table_id     = intval($member[$i]['table_id']);
                                                $date         = $member[$i]['date'];
                                                $modal        = 'modal';
                                                $src 		  = $mc->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );
                                                $link         = $mc->set_link( $table_name , $table_id );
                                                $image        = " <img src='$src' style='$_SESSION[modal_style]' />";
                                                # get  member info
                                                $minfo        = select_v4( array( 'type'=>'select',  'tablename'=>'fs_members', 'rows'=>'fullname , city , state_ , zip , country , tpercentage',    'where'=>" mno = $table_id " ) );
                                                $desc = ' percentage ( '.$minfo[0]['tpercentage'].'% ) ';
                                                if ( !empty($minfo[0]['country']) ) {
                                                    $desc.=  ' <b>from:</b> <em>'.$minfo[0]['country'].'</em>';
                                                }
                                                $title       = $minfo[0]['fullname'];
                                                $content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";
                                                # print modal info
                                                echo "
                                                         <a href='$link' >
                                                            <div id='search-container-result-div'  >
                                                                <table  border='0' cellspadding='0' cellspacing='2' style=' border-right:2px solid none;  '  >
                                                                    <tr>
                                                                        <td style='width:50px; border: 1px solid none;' >
                                                                            <div> $image  </div>
                                                                        </td>
                                                                        <td style='width:100%; border: 1px solid none; padding-right:5px;'  >
                                                                            <div style='font-family:arial' > $content </div>
                                                                        </td>

                                                                </table>";
                                                echo "
                                                            </div>
                                                        </a>
                                                    ";
                                            }
                                        }
                                    }
                                    else{
                                        // echo " <div style='height:381px;' > </div> ";
                                    }

                                    echo "
                                </div>
                                <center>
                                    <table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' >
                                        <tr>
                                            <td>"; $mc->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-member" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td>
                                        <tr>
                                            <td> <div id='search-response-title-2'  onclick=' header( \"view-more-search-result\" , event , \"header\" , \"fs_members\" , \"0\" , \"search-content-result-cotainer-member\" , \"#search-result-view-more-loader-member\" ) '   >  			  $text_more_member </div>  </td>
                                    </table>
                                <center>
                            </li>
                            <li style='width:283px; border: 1px solid none; '  id='search-result-container-li' >
                                <div id='search-response-title-1'  style='padding-bottom:20px;margin-left:2px;'  >ARTICLE</div>
                                <div style='' id='search-content-result-cotainer-article' > ";
                                    if ( !empty( $article )) {
                                        for ($i=0; $i < count($article) ; $i++) {
                                            if ( $article[$i]['table_name'] == 'fs_postedarticles' ) {
                                                # initialized
                                                $sno          = $article[$i]['sno'];
                                                $keyword      = $article[$i]['keyword'];
                                                $table_name   = $article[$i]['table_name'];
                                                $table_id     = intval($article[$i]['table_id']);
                                                $date         = $article[$i]['date'];
                                                $fullname     = 'content';
                                                $modal        = 'modal';
                                                $username     = 'username';
                                                $src 		  = $mc->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );
                                                $link         = $mc->set_link( $table_name , $table_id );
                                                $image        = " <img src='$src' style='$_SESSION[modal_style]' />";
                                                # get  article info
                                                $articleinfo  = select_v4( array( 'type'=>'select',  'tablename'=>'fs_postedarticles', 'rows'=>'mno,title,trating,tpercentage',    'where'=>" artno = $table_id " ) );
                                                $title        = $articleinfo[0]['title'];
                                                $desc         = "percentage (".$articleinfo[0]['tpercentage']."%) ";
                                                $desc        .= " rating (".$articleinfo[0]['trating'].") ";

                                                $content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";
                                                # print modal info
                                                echo "
                                                     <a href='$link' >
                                                        <div id='search-container-result-div'  >
                                                            <table  border='0' cellspadding='0' cellspacing='2' style=' border:none;  '  >
                                                                <tr>
                                                                    <td style='width:50px; border: 1px solid none;' >
                                                                        <div> $image  </div>
                                                                    </td>
                                                                    <td style='width:100%; border: 1px solid none; padding-right:5px;'  >
                                                                        <div style='font-family:arial' > $content </div>
                                                                    </td>

                                                            </table>";
                                                echo "
                                                        </div>
                                                    </a>
                                                ";
                                            }
                                        }
                                    }
                                    else{
                                        // echo " <div style='height:381px;' > </div> ";
                                    }
                                    echo "
                                </div>
                                <center>
                                    <table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' >
                                        <tr>
                                            <td>"; $mc->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-article" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td>
                                        <tr>
                                            <td> <div id='search-response-title-2'   onclick=' header( \"view-more-search-result\" , event , \"header\" , \"fs_postedarticles\" , \"0\" , \"search-content-result-cotainer-article\" , \"#search-result-view-more-loader-article\" ) '    > $text_more_article  </div>  </td>
                                    </table>
                                <center>
                            </li>
                            <li style='width:283px; border-left: 1px solid none; '  id='search-result-container-li' >
                                <div id='search-response-title-1'  style='padding-bottom:20px;margin-left:0px;'  >LOOKS</div>
                                <div style='' id='search-content-result-cotainer-look' > ";
                                    if ( !empty( $look )) {
                                        for ($i=0; $i < count($look) ; $i++) {
                                            if ( $look[$i]['table_name'] == 'postedlooks' ) {
                                                # initialized
                                                $sno          = $look[$i]['sno'];
                                                $keyword      = $look[$i]['keyword'];
                                                $table_name   = $look[$i]['table_name'];
                                                $table_id     = intval($look[$i]['table_id']);
                                                $date         = $look[$i]['date'];
                                                $fullname     = 'content';
                                                $modal        = 'modal';
                                                $username     = 'username';
                                                $src 		  = $mc->modal(   array(  'table_name' =>$table_name,  'table_id' =>$table_id,  'type' =>'get-modal-image' ,  'size'=>'small'  )   );
                                                $link         = $mc->set_link( $table_name , $table_id );
                                                $image        = " <img src='$src' style='$_SESSION[modal_style]' />";

                                                # get  article info
                                                $lookinfo     = select_v4( array( 'type'=>'select',  'tablename'=>'postedlooks', 'rows'=>'lookName,trating,tpercentage',    'where'=>" plno = $table_id " ) );

                                                $title        = $lookinfo[0]['lookName'];
                                                $desc         = "percentage (".$lookinfo[0]['tpercentage']."%) ";
                                                $desc        .= " rating (".$lookinfo[0]['trating'].")";
                                                $content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";

                                                # print modal info

                                                echo "
                                                     <a href='$link' >
                                                        <div id='search-container-result-div'  >
                                                            <table  border='0' cellspadding='0' cellspacing='2'    >
                                                                <tr>
                                                                    <td style='width:50px; border: 1px solid none;' >
                                                                        <div> $image  </div>
                                                                    </td>
                                                                    <td style='width:220px; padding-right:5px; border: 1px solid none;'  >
                                                                        <div style='font-family:arial' > $content </div>
                                                                    </td>

                                                            </table>";
                                                echo "
                                                        </div>
                                                    </a>
                                                ";
                                            }
                                        }
                                    }
                                    else{
                                        // echo " <div style='height:381px;' > </div> ";
                                    }
                                    echo"
                                </div>
                                <center>
                                    <table border='0' cellspacing='0' cellspadding='0' id='search-result-table-loader-and-viewmore' >
                                        <tr>
                                            <td>"; $mc->image( array( 'type'=>'loader' , 'id'=>"search-result-view-more-loader-look" ,'style'=>'visibility:hidden;height:10px;'  ) ); echo "</td>
                                        <tr>
                                            <td> <div id='search-response-title-2'   onclick=' header( \"view-more-search-result\" , event , \"header\" , \"postedlooks\" , \"0\" , \"search-content-result-cotainer-look\" , \"#search-result-view-more-loader-look\" ) '               >   $text_more_look          </div>    </td>
                                    </table>
                                <center>
                            </li>
                        </ul>
                    </div>
                </td>
            <tr>
        ";


