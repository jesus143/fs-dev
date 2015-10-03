 <?php  
    require ("fs_folders/php_functions/connect.php"); 
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php"); 

    require ("fs_folders/php_functions/Time/Time.php");
    require ("fs_folders/php_functions/Database/LookbookDatabase.php");  
    require ("fs_folders/php_functions/Extends/LookbookExtends.php");  
    require ("fs_folders/php_functions/Class/Lookbook.php");  


    $mc              =  new myclass();     
    $pa              =  new postarticle( ); 
    $ri              =  new resizeImage (); 
    $sc              =  new scrape();   
    $lookbook        =  new lookbook();   

    LookbookDatabase::$database = $db; 

 







    $mc->header_attribute( );    
    $mc->auto_detect_path(); 
    $mno  = 968;  
    $plno =  509;  
    $plcno = 14;    
    $mppno = 111;    
    $mptno = 1; 
    $comment = 'this is the test comment';
    $mno         = 135; 
    $mno1        = 134;
    $limit_start = 0;   
    $limit_end   = 2; 
    $message     = 'this is the message';
    $msgno       = 2;  
    $generated_code = '9.9851358453055E+22';
    $mno = 133; 
    // $category = 'streetwear';
    $category = 'entertainment';  
    $table_name = 'fs_postedarticles';
    // $table_name = 'postedlooks';
    $table_id   = 182;   
    $url='www.fashionsponge.com/index.php';
    $sc->get_site_last_update($url);



 if(mysql_query("DELETE FROM fs_test WHERE group_id NOT IN (SELECT max(id) FROM fs_test WHERE GROUP BY group_id); ")) {
     echo "deleted ";
 } else {
     echo "not deleted";
 }




 echo "<div style='display:none'>";
    Time::setTimeZoneDateTime('PHT');   
    echo 'Time' . Time::getTimeZoneDateTime12()  . '<br>';
    echo 'Time' . Time::getTimeZoneDateTime24() . '<br>';
    echo 'Time' . Time::getTimeZoneLocation() . '<br>';
    echo "date" . Time::getTimezoneDate() . '<br>';



        // break;
        // case 'MONTREAL':
        //     $url='http://www.timeanddate.com/worldclock/canada/montreal';
        //     $timezone='EST';
        // break; 
        //     $location =  'BANGKOK';
        //     $timezone='ICT';
        //     $url='http://www.timeanddate.com/worldclock/thailand/bangkok'; 
        // $b = $db->update(
        //         'fs_invited',
        //         array(
        //           'timezone' => $timezone,
        //           'timezone_url' => $url,
        //           'location' => $location
        //         ) ,
        //         "location = '$location'"
        //     );   
        // if ($b==TRUE) {
        //    echo "<br>successfully updated";
        // }
        // else { 
        //   echo "<br>failled updated";
        // } 
        // $lookbook->sendInvitationToInvitedEmail(LookbookDatabase::getAllApprovedInvitedEmail() , $sc , $mc); 
        // $id = Database::selectV1('fs_invited' , 'invited_id,invited_fn,invited_email' , "like 'Lexicon of Style Alexandr' limit 1");  





// delete from my_tab where id not in 
// (select min(id) from my_tab group by profile_id, visitor_id);


       if(mysql_query("DELETE FROM fs_test WHERE group_id NOT IN (SELECT max(id) FROM fs_test WHERE GROUP BY group_id); ")) {
        echo "deleted ";
       } else {
        echo "not deleted";
       }



//        DELETE FROM table_name
// WHERE some_column = some_value


// mysql_query(" DELETE FROM fs_test
// WHERE group_id NOT IN (
//     SELECT MIN(group_id)
//     FROM fs_test
//     GROUP BY name ) 
// ");

                      //delete from my_tab where id not in (select min(id) from my_tab group by profile_id, visitor_id);

      // $res = select_v3('fs_test' , 'max(id), name' , "group_id > 0 GROUP BY name"   ); 
      // echo "<pre>";
      // print_r($res);    

      // for ($i=0; $i < count($res) ; $i++) {   

      //   echo "<br>" . $res[$i]['max(id)'] . ' name ' . $res[$i]['name'] ;
      //   $id = $res[$i]['max(id)']; 
      //   $name = $res[$i]['name'];

      //   if(mysql_query("DELETE FROM fs_test WHERE name = '$name' and id <> $id ")) {

      //     echo "deleted ";

      //   } else {

      //     echo "not deleted";

      //   } 

      // }   


 echo "<hr>";










// echo "<pre>";
// $response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_invited', 'rows'=>'count(*) as total , location', 'where'=>"invited_status = 1 and scrape_version = 1 GROUP BY location" ) ); 
// print_r($response);























    echo " <br><br><br><br><br><br><br><br><br>"; 
    echo "Time = ".$sc->retrieve_time_from_timezone('UTC');

echo " <br><br><br><br><br><br><br><br><br>"; 
  echo " 
    <form METHOD='POST' ACTION='$_SERVER[PHP_SELF]' >  u
      <input type='text' name='url' /> 
      <input type='submit' />  
    </form>
  "; 
  if ( isset($_POST['url'])) {
    $sc->display_array_result_of_checking_blog();
    echo "looping end";
  }else{
    echo "not submitted <br>";
  }  
  $response = $mc->time(  array( 'type'=>'get-time-deffirence', 'date1'=>'2014-10-01' , 'date2' => '2014-10-09'   ) );   
  $date = '2014-10-01';   
  $newdate     = $mc->time(  array( 'type'=>'get-datetime-date' , 'date1'=>$mc->date_time ) );  // convert to date new date  
  $curdate     = $mc->time(  array( 'type'=>'get-datetime-date' , 'date1'=>$date) );   // convert to date current date  
  $days        = $mc->time(  array( 'type'=>'get-time-deffirence', 'date1'=>$curdate , 'date2' => $newdate ) );   // get time difference  
  echo "  answer $days ";  
  echo "days = $days , newdate = $newdate , curdate = $curdate  , date $date <br><br><br>";  
























    /* 
      update member login time ago
      // $db->connect(); 
      echo " date ".$mc->date_time;
      #update time 
        if ( $db->update('fs_members',array('logtime'=>"$mc->date_time"),"mno = $mno ") ) { 
          echo " success ";
          }else{
          echo "failled";
        }   
  
      // invitation email sending  
      $subject = 'An Invitation to Share Your Blog Content on Fashion Sponge';
      $from    = 'brainoffashion@gmail.com';
      $type    = 'invitations'; 
      $mc->send_email_signup_to_user( 'Jesus' , 'mrjesuserwinsuarez@gmail.com.btag.it' , $type , $from , $subject ); 
      // $mc->send_email_signup_to_user( 'smilingty' , 'smilingty@yahoo.com' , $type , $from , $subject );  
      // $mc->send_email_signup_to_user( 'Rico' , 'BrainOfFashion@gmail.com' , $type , $from , $subject );  
      /* 
      $response =  $mc->posted_modals_notification_Query ( 
          array(      
            'table_name'=>$table_name,
            'table_id'=>$table_id, 
            'notification_query'=>'delete'  
          ) 
      ); 
      */  
    //$table_name = 'postedlooks';  
      // $string ="@kayla aren't you suppose to be working.... what you doing on here. http://test.fashionsponge.com/ SMH! Yes he's is a friend... lol. His blog is http://wwww.themartinity.com check it out. Also look at his IG, he\\\'s very talented, creative and driven. Oh yeah he\\\'s a good photographer."; 
      // echo "this is the text->".make_links_clickable($string); '<br>';  
      // function make_links_clickable($text){
      //     $text = preg_replace(
      //       '!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', 
      //       "<a href='$1' target='_blank'>$1</a>", 
      //       $text
      //       );  
      //     $text = mysql_real_escape_string( $text );  
      //     return $text; 
      // }    


     ?>

<!-- 
      <div id="flag-dropdown-container" >
        <ul>
          <li>
            FLAG 
          </li>
          <li>
            HIDE THIS POST
          </li>
        </ul> 
      </div>
 -->

      <style> 
        #flag-dropdown-container { 
          float:right;
          border:1px solid red; 
          width:100px; 
          background-color:white;
          margin-right:7px;
        }
        #flag-dropdown-container ul { padding:0px;  }
        #flag-dropdown-container ul li { list-style: none; font-family: 'arial'; font-style: 12px;}
        #flag-dropdown-container ul li:hover { background-color: red;  cursor: pointer;  }
      </style> 

     <?php 





    // $mc-> emal_design( ); 
    // error in edit and adding in online function  
    // url . will pass in the javascript parameter
    // mochaccinolandblog@gmail.com  this is missing and look for this info 
    // invite a person with not yet registered and nothing else in the site yet.  and sign up person this is the status = 2 || 1
       
      // sending email to approved data
      /*
        $status_val = 1; 

        $invite_info = select_v3( 
          'fs_invited' , 
          '*' , 
          " invited_status = $status_val limit 1 " 
        );     
    


        for ($i=0; $i < count($invite_info) ; $i++) { 
          $date = $invite_info[$i]['invited_date'];
          $mc->invited_people_send_emails( 
            array( 
              'invited_email'=>$invite_info[$i]['invited_email'], 
              'status'=>1 
            ) 
          );  
        }
        */

        /*
      // just approved 
      $email = array('mrjesuserwinsuarez@gmail.com','rico@gmail.com','gerald@gmail.com');
        for ($i=0; $i < count($email) ; $i++) { 
          $mc->invited_people_send_emails( 
            array( 
              'invited_email'=>$email[$i], 
              'status'=>1,
              'temail_sent'=>0,
              'days'=>7
            ) 
          );  
        }


        $mc->invited_people_send_emails( 
          array( 
            'invited_email'=>'mrjesuserwinsuarez@gmail.com', 
            'status'=>1,
            'temail_sent'=>1
          ) 
        ); 
        $mc->invited_people_send_emails( 
          array( 
            'invited_email'=>'mrjesuserwinsuarez@gmail.com', 
            'status'=>1,
            'temail_sent'=>2
          ) 
        ); 
    */
      // get sign up code for status = 2
    
// person sign up  


        /*
  $invited_fn = 'jesus erwin suarez'; 
  $invited_email = 'mrjesuserwinsuarez@gmail.com';
  $invited_wob = 'fashionsponge.com';
   
   $mc->invited_people_send_emails( 
        array( 
          'invited_email'=>$invited_email, 
          'invited_fn'=>$invited_fn, 
          'invited_wob'=>$invited_wob,
          'status'=>'signup' 
        ) 
    );
     */
// person officially sign up 

   
    // $mc->invited_people_send_emails( 
    //   array( 
    //     'invited_email'=>'mrjesuserwinsuarez@gmail.com', 
    //     'status'=>'officailly-member' 
    //   ) 
    // );
    







  # $mc->auto_create_user( array(  'loop_start'=>0,  'loop_end'=>101  ) );  
  # $response = $mc->fs_signup_code(   array( 'type' =>'generate-new-code-and-return' )  );   
  # $response = $mc->RATING( array('type'=>'calculte-category-tratings-and-tpercentage','table_name'=>$table_name,'category'=>$category,'mno'=>$mno )); 
  # $response = $mc->fs_member_categories(    array(   'type'=>'insert-or-update-trating-and-tpercetange', 'trating'=> $response['trating'], 'tpercentage'=>$response['tpercentage'], 'mno'=>$mno, 'table_name'=>$table_name, 'category'=>$category )  );    
  # $mc->modal(   array(   'type'=>'add-or-update-user-category-percentage-and-rating', 'table_name'=>$table_name, 'table_id'=>$table_id, 'category'=>$category   ) );  
  # $response = $mc->fs_member_categories(  array(  'type'=>'select',  'where'=>" mno = $mno and category = '$category'" ) ); 
  # $response = $mc->fs_member_categories(  array( 'type'=>'insert','category'=>'chic','mno'=>133,'table_name'=>'postedlooks','trating'=>20,'tpercentage'=>90));
  # $date = mktime('2014-10-06 23:24:27') - mktime('2014-10-01 06:46:15'); 
  # $response = $mc->time(  array( 'type'=>'get-time-deffirence', 'date1'=>'2014-10-01' , 'date2' => '2014-10-09'   ) );
  # $response = $mc->time(  array( 'type'=>'get-datetime-date', 'date1'=>'2014-10-20 06:46:15' ) ); 
  # $response = $mc->fs_brand_category(  array(   'type'=>'get-bcno','bc_name'=>'preppy' ) );  
  # $response = $mc->fs_brand(   array(    'type'=>'insert-if-not-exist', 'bname'=>'ok3', 'bcno'=>1,   'gender'=>1 )  ); 
  # $response = $mc->image(  array( 'table_name'=>'postedlooks', 'table_id'=>540, 'type'=>'get-default-image-src', 'size'=>'small',  ) );
  # article $response = $mc->image( array('table_name'=>'fs_postedarticles','table_id'=>77,'type'=>'get-default-image-src','size'=>'detail', ));   
  # $response = $mc->url( array('type'=>'get-question-mark-value' , 'url'=> $mc->url( array('type'=>'get-full-url') ) ) );  
  # src url : http://jsfiddle.net/XNkDx/3701/ coding.
  # $mc->send_email_signup_to_user(  '' , 'mrjesu@gmail.com' , 'signup' ); 
  # echo " this is title = ".$mc->get_youtube_title( 'W-MTApHDbew' );  
  # $array = array( 'table_name'=>'postedlooks' , 'table_id'=>3 , 'rate_query'=>'get-user-rated-type' );   
  # $array = array(     'table_name'=>'postedlooks' , 'table_id'=>3, 'rate_query'=>'get-rate-total-likes' );
  # $array = array(     'table_name'=>'postedlooks' , 'table_id'=>924, 'rate_query'=>'get-rate-total-dislikes' );  
  # $id = $mc-> posted_modals_rate_Query( $array );    
  # $mc->update_fs_table_auto( 489 , array( 'pltpercentage' => 101, 'pltratings' => 102 , 'tview'=>103  )  , 'postedlooks' ); 
  # $mc->RATING( array( 'type'=> 'calculate-percentage-user' , 'mno'=> $mno ) ); 
  # $response =  $mc->update_fs_table_auto( $mno , array( 'tpercentage'=>100 ) , 'fs_members' ); 
  # $response = $mc->RATING( array( 'type'=> 'calculate-percentage-user' , 'mno' => $mno ) ); 
  # $mc->print_r1($response); 
  # $id = $mc->posted_modals_rate_Query( array( 'table_id'=> 487,  'table_name'=> 'postedlooks',  'rate_query'=>'rate-delete' ) ); 
  # $array = array(    'mno'=> 133,  'table_id'=>3 , 'table_name'=>'postedlooks', 'comment'=>'this is a comment' , 'mno1'=> 134 ,'query_drip'=>'drip-insert' );    
  # $response =  $mc->fs_drip_modals_Query ( $array ); 
  # $response =  $mc->posted_modals_comment_Query ( array(   'table_name'=> 'postedlooks', 'table_id'=> 1001,  'orderby'=> 'cno asc', 'limit_start'=> 1, 'limit_end'=> 1,  'comment_query'=>'get-comment-modal'   ) );
  # $response = $mc ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) );   
  # if ( empty( $response ) )  {  echo "insert new profile pic <br>"; $mc->message( ' new profile pic added ', $mc->member_profile_pic_query( array('mno'=>$mno , 'action'=> 'Joined' , 'type'=>'insert-new-profile-pic-db' ) ) , '' );   }  else{ echo "nothing "; } 
  # $mc->add_profile_number_to_all_member( ); 
  # $response =  $mc->posted_modals_notification_Query (  array(       'mno1'=>12,  'limit_start'=> 0, 'limit_end'=> 2,  'orderby'=> 'nno desc', 'notification_query'=>'get-notification-modal'   )  );
  # $response = $mc->posted_modals_postedlooks_Query(  array( 'plno'=> 515 , 'postedlooks_query' => 'get-look-owner' )  );
  # $response =  $mc->posted_modals_notification_Query (  array(       'table_name'=>'fs_member_profile_pic',   'table_id'=>621,   'orderby'=> 'nno desc', 'notification_query'=>'get-people-participated'   )  );   $dbval = $response;  $rowname = 'mno';  $response = $mc->remove_duplicate( $dbval , $rowname );    
  # $response = select_v3(  'activity',  '*',  "mno = 906 or mno = 966 or mno = 954 or mno = 968 or mno = 133 or mno = 134 or mno =  135 order by _date desc"  );  
  # $response =  $mc->posted_modals_comment_Query (  array(   'cno'=>7,  'comment_query'=>'get-comment-sepcific-by-cno'    )  );
  # $response =  $mc->fs_drip_modals_Query ( array( 'limit_start'=>0, 'limit_end'=>5,'query_where'=>"table_id = $plno and table_name = 'postedlooks' ", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function'query_order'=>'dmno desc', 'query_drip'=>'get-all-user-dripped'   ) );  
  # $array = array(       'limit_start'=>0,  'limit_end'=>100, 'query_where'=>"table_id = $plno and table_name = 'postedlooks' ", // mno = 133 and table_name = 'postedlooks' // you can write anything here for where function 'query_order'=>'fmno asc',  'query_favorite'=>'get-all-user-favorite'  );      $response =  $mc->fs_favorite_modals_Query ( $array );  
  # $array = array(  'table_name'=>'postedlooks' , 'table_id'=>$plno, 'limit_start'=>0 ,  'limit_end'=>3  , 'rate_query'=>'get-modal-rates' );   $response = $mc->posted_modals_rate_Query( $array ); $string = $mc->set_more_participants ( $response , 'rated' );       echo " $string <br> "; 
  # echo " total res ".count($response).'<br>'; 
  # $response = $mc->remove_duplicate( $response , 'mno' );
  # $response = array('one','two','three','four' );  $current_index = 3;   echo  "total = ".count($response);   $response1 = $mc->new_index_next_prev( $response , $current_index );   $prev = $response1['prev']; $next = $response1['next'];  echo " current index =  $current_index ,  prev = $prev val = $response[$prev] ,  next = $next val = $response[$next] <br>";
  # left_right_slide_jquery ( ); 
  # $response = $mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>2,  'orderby'=> 'artno desc', 'where'=>'mno = 968'  )  );    
  # $response = $mc->fs_flag( array(  'type'=> 'insert', 'mno'=>1331, 'table_name'=> 'postedlooks1', 'table_id'=> 123,  'comment'=> 'this is the commeasdasdnt' ));  
  # $response = $mc->fs_view( array(  'type'=> 'insert', 'mno'=>133, 'table_name'=> 'postedlooks', 'table_id'=>123 ) );   
  # $response = $mc->fs_view( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = 123 and table_name= 'postedlooks' "  )  );      
  # $mc->fs_members_Query( array('type'=>'update-fullname-all' , "where" =>"mno = 966" )  );
  # $response = $mc->fs_search(  array(   'type'=> 'insert',  'keyword'=>'this is the keyword',  'table_name'=>'postedlooks',  'table_id'=>123     ) );   
  # $response = $mc->fs_search(   array(  'type'=> 'add-keyword-all-table'    )   );   
  # $response = $mc->fs_search(   array(  'type'=> 'add-keyword-all-table' )  ); 
  # $response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'postedlooks',  'table_id'=>533 , 'keyword'=>$keyword )    );   
  # $response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'postedlooks'       ,  'table_id'=>533 , 'keyword'=>'keyword for postedlooks' )   );   
  # $response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_members'        ,  'table_id'=>133 , 'keyword'=>'keyword for fs_members' )   );   
  # $response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_postedarticles' ,  'table_id'=>78  , 'keyword'=>'keyword for fs_postedarticles' )   );    
  # $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_members' ,   'table_id'=>133 )  );   
  # $response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_members', 'rows'=>'AVG(mno)',   'order'=>'mno desc'    ) ); $response = select_v4(  array( 'type'=>'count',  'countas'=>'sno', 'tablename'=>'fs_search', 'rows'=>'*',     ) ); 
  # $response = $mc->fs_message(   array(  'type'=>'insert',  'mno' => $mno,  'mno1' => $mno1, 'message' => $message   ) ); 
  # $response = $mc->fs_message(   array(  'type'=>'get-last-message',  'mno' => $mno,  'mno1' => $mno1  ) ); 
  # $response = $mc->fs_message(   array(  'type'=>'get-total-message',  'mno' => $mno,  'mno1' => $mno1  ) ); 
  # $response = $mc->fs_message(   array(  'type'=>'insert',  'mno' => $mno,  'mno1' => $mno1 ) );  
  # $msgno    =  $mc->fs_message(    array( 'type'=>'get-or-add-message-id',  'mno' => $mno,  'mno1' => $mno1  ) ); 
  # $response =  $mc->fs_message(    array( 'type'=>'get-all-message-id',     'mno' => $mno , 'orderby'=>'order by date asc' ,   'limit_start'=>$limit_start,   'limit_end'=>$limit_end  )  );    
  # $response =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'comment-insert' ,    'mno'=>$mno1, 'comment'=>$message, 'table_name'=>'fs_message', 'table_id'=>$msgno  )  );
  # $response =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'comment-insert'  ,   'mno'=>$mno1, 'comment'=>$message, 'table_name'=>'fs_message', 'table_id'=>$msgno )  );  
  # $response =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'get-all-comment-by-tbn_and_tbid' , 'table_name'=>'fs_message',   'table_id'=>intval($msgno),    'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end  )  ); 
  # $response = $mc->fs_keyword(   array(  'type'=>'insert' , 'table_id'=>1 ,  'table_name'=>'fs_postedarticles' , 'keyword' => 'hey youw'  ) );  
  # $keyword  = 'green,girl,pretty,';  $response = $mc->fs_keyword(   array(  'type'=>'insert-not-exist' , 'table_id'=>1 ,  'table_name'=>'fs_postedarticles' , 'keyword' =>$keyword  ) ); 
  # $response = $mc->fs_signup_code(   array( 'type' =>'insert','generated_code'=>'abcdefg123456'  ) );  
  # $response = $mc->fs_signup_code(   array(  'type' =>'update-mno', 'generated_code'=>$generated_code,  'mno'=>123   )  ); 
  # $response = $mc->fs_signup_code(   array(  'type' =>'select-specific-code', 'generated_code'=>$generated_code  )  ); 
  # $response = $mc->fs_signup_code(   array( 'type' =>'select-specific-mno','mno'=>$mno  ) ); 
  # $response = $mc->fs_signup_code(   array( 'type' =>'insert','generated_code'=>$mc->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) )  ) );   
  # $response = $mc->fs_signup_code(   array( 'type' =>'select', 'where'=>"mno > -1 ",'orderby'=>'scno desc','limit_start'=>0,'limit_end'=>1000  ) );   
  # $Accessories = array('Bag','Belt','Bra','Bracelet','Cufflink','Earring','Eyewear','Glove','Hat','Leggings','Pocket Square','Purse','Ring','Scarf','Sock','Stockings','Sunglasses','Suspenders','Ties','Tie Clips','Umbrellas','Wallet','Watch');
  # $Clothing = array('Blazer','Blouse','Bodysuit','Cardigan','Coat','Dress','Dress Pant','Fleece','Hoodie','Jeans','Jacket','Jumper','Leggings','One-Piece','Outerwear','Pants','Romper','Shirt','Shorts','Skirts','Sport Coat','Sweater','Sweatshirt','Bathing Suit','Top','T-Shirt','Vest');
  # $shoes = array('Boots','Clogs','Dress Shoes','Flats','Heels','Loafers','Pumps','Sandals','Sneakers','Special Occasion','Wedges'); 
  # $material = array('Cotton','Linen','Silk','Wool','Fur','Polyester','Rayon','Nylon','Acrylic','Chambray','Chino','Corduroy','Denim','Khaki','Leather','Lace','Latex','Spandex');
  # $pattern = array('Argyle','Camo','Checkered','Houndstooth','Floral','Leopard','Paisley','Pied','Pinstripe','Plaid','Polka-dotted','Stripe','Symmetry','Tiger Stripe','Zebra Print','Zigzag');
  # $Occasion = array('Amusement Park','Baby Shower','BBQ','Beach','Birthday Dinner','Blind Date','Bridal Shower','Brunch','Casual Party','Clubbing','Cocktail','College','Company Event','Conference','Dinner Date','Dinner Party','Everyday','Formal Event','High School','Internship','Interview','Lunch Date','Movie Night','Music Concert','Photo shoot','Picnic','Pool Party','Prom','Romantic Dinner','Theater / Play / Opera','Wedding','Wine Tasting','Work');
  # $season =array('Winter','Spring','Summer','Fall');
  # foreach ($season as $key => $value ) { $response = $mc->fs_modal_attribute(  array(   'type'=>'insert', 'matcno'=>8, 'name'=>$value, 'total'=>0, 'mno'=>133, 'status'=>1 ) ); }
  # $keySearch = 'er';  $response = $mc->fs_modal_attribute( array(   'type'=>'select', 'where'=>"name LIKE '$keySearch%' and matcno = 1 ", 'limit_start'=>0, 'limit_end'=>10 ) );


 

        
      

  if ( !empty( $response ) ) {  
    if ( is_array($response) ) {
     $mc->print_r1(  $response );
    }
    else { 
       if (  $response ) {
         echo " success   $response <br> ";
       }
       else{
        echo " failed   $response <br> ";
       }
    }   
  } 
  else{
    echo "response is empty please check if you return or assigned the response variable from the result <br> ";
  } 

  // echo " id $id <br> "; 
  // if(   $mc->update_all_member( 'tlog' , 0 ) )  {
  //   echo " tlog successfully updated <br> "; 
  // }  
  // $mc->verify( 'user' , 'all' ); 
  // public function FunctionName( $type , $option ) { 
  //   switch ($type) {
  //     case 'user': 
  //         if ( $option == 'all' ) {       
  //         }
  //         else{ 
  //         } 
  //       break; 
  //     default:
  //       # code...
  //       break;
  //   } 
  // } 

     // $mc->print_r1( joined_table ( ) ); 



  // echo " <div id='textid' > </div>"; 
  // $mc->jQuery_text_processing( 'textid' , 'hi1' ); 
  // $mc->jQuery_text_processing( 'textid' , 'hi2' ); 
  // $mc->jQuery_text_processing( 'textid' , 'h3i' ); 
  // $mc->jQuery_text_processing( 'textid' , 'hi4' );   
  // $mc->send_verification_code_to_email( 'mrjesuserwinsuarez@gmail.com' ); 
  // mysql_query(" UPDATE fs_member_accounts set email = 'mrjesuserwinsuarez@gmail.com' where email = 'mrjesuserwinsuarez123@gmail.com'  ");  
  // $mc->update_all_password_to_md5_save_to_fs_member( ); 
  // $mc->member_profile_pic_change( $mno ); 
  // @mysql_query("DELETE FROM activity where action='Updated' "); 
  // $mc->member_profile_timeline_query( $value=array() );  
  // $mptno = $mc->member_profile_timeline_query( array('mno'=>$mno , 'mptno'=>$mptno , 'action'=> 'Update Timeline' , 'type'=>'insert-new-profile-pic-db' ) );
  // echo " mptno $mptno <br> "; 
  // @mysql_query("UPDATE activity set action = 'Updated' WHERE action ='Change' ");  
  // get_check_box_checked_or_not( );  
  // $mc->web_scraping(  array(  'get'  => array(  'image' , 'video' ), 'url'  => 'http://www.vogue.co.uk/fashion/trends/2014-15-autumn-winter/eighties-revival',   'size' => array( 'image'=> array( 'height'=>100 , 'width'=>260 )  , 'video'=> array( 'height'=>200 , 'width'=>1200 ) ),  'limit' => 5, ) );  
  //$url = 'https://www.youtube.com/watch?v=1oju14nG5vo';   $url = 'https://vimeo.com/channels/staffpicks/102399221';  $url = 'http://vube.com/trending/Andrea+Kaden/oFzAdU9Dqe'; $url = 'http://vube.com/trending/Aj+Silva+Music/0dPsIWYjoj?t=s'; $url = 'http://vube.com/trending/RobertMendozaMusic/T5kvxMGKpN?t=s';  $video_id = $mc->get_video_id( $url );  $src      = $mc->get_video_src ( $url , $video_id );  echo " video id =  ".print_r($_SESSION['article_video'])." <br>";   $data_video  = $_SESSION['article_video'];   echo "<videodisplay><iframe src=\"$data_video[0]\" style='width:100%; height:100%;' frameborder='0'  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><videodisplay>";   
 
  // $mc->resize_image( 
  //   array( 
  //     'id' =>12,
  //     'source' => "$mc->article_detail/12.jpg",
  //     'destination1' => "$mc->article_home/12.jpg",
  //     'destination2' => "$mc->article_thumbnail/12.jpg",
  //     'width1' => 270,
  //     'width2' => 50 
  //   )  
  // );   
 





 

// For the video >>> youtube.com/watch?v=37l11UzbvvA 
// Video id = 37l11UzbvvA; 
// $vid="mVEvD30e5yc"; 
// set video data feed URL 
// $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $vid; 
// read feed into SimpleXML object 
// $entry = simplexml_load_file($feedURL); 
// $video = parseVideoEntry($entry); 
// echo " amazing titlte = ".$video->title; 
// function to parse a video <entry> 
// youtube get link and attribute jason api  
  /**
   * get youtube video ID from URL
   *
   * @param string $url
   * @return string Youtube video id or FALSE if none found. 
   */
  // function youtube_id_from_url($url) {
  //     $pattern = 
  //         '%^# Match any youtube URL
  //         (?:https?://)?  # Optional scheme. Either http or https
  //         (?:www\.)?      # Optional www subdomain
  //         (?:             # Group host alternatives
  //           youtu\.be/    # Either youtu.be,
  //         | youtube\.com  # or youtube.com
  //           (?:           # Group path alternatives
  //             /embed/     # Either /embed/
  //           | /v/         # or /v/
  //           | /watch\?v=  # or /watch\?v=
  //           )             # End path alternatives.
  //         )               # End host alternatives.
  //         ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
  //         $%x'
  //         ;
  //     $result = preg_match($pattern, $url, $matches);
  //     if (false !== $result) {
  //         return $matches[1];
  //     }
  //     return false;
  // }

  // echo " this is id from api ".youtube_id_from_url('www.youtube.com/embed/bFZ3HY0XIoE')."<br><br>"; # NLqAF9hrVbYs 


  // echo "<pre> ";

  // $url = 'http://youtu.be/xaxccgvItCU';
  // $var =  json_decode(file_get_contents(sprintf('http://www.youtube.com/oembed?url=%s&format=json', urlencode($url))))  ;

  //  foreach(get_object_vars($var) as $key => $value){
  //     echo $key.':'.$value.PHP_EOL;
  //   }
?>


<?php 
  general_dropdown_autocomplete( );
  function general_dropdown_autocomplete( ) { 
    ?>

    <div id="autocomplete-dropdown-container" > 
        <table>
            <tr> 
              <td> 1 </td>
            <tr> 
              <td> 2 </td>
            <tr> 
              <td> 3 </td>
            <tr> 
              <td> 4 </td>
            <tr> 
        </table> 
    </div> 

    <?php 
  }  

?>
 

 

<?php   
  function jquery_post( ) { ?> 


<!-- upload image post jquery -->
 <!doctype html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<style>
form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
#progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
#percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>
</head>
<body>
<h1>Ajax File Upload Demo</h1>
 
<form id="myForm" action="testPage2.php" method="post" enctype="multipart/form-data">
     <input type="file" size="60" name="myfile">
     <input type="submit" value="Ajax File Upload">
 </form>
 
 <div id="progress">
        <div id="bar"></div>
        <div id="percent">0%</div >
</div>
<br/>
 
<div id="message"></div>
 
<script>
$(document).ready(function()
{
 
    var options = { 
      beforeSend: function() 
      {
          $("#progress").show();
          //clear everything
          $("#bar").width('0%');
          $("#message").html("");
          $("#percent").html("0%");
      },
      uploadProgress: function(event, position, total, percentComplete) 
      {
          $("#bar").width(percentComplete+'%');
          $("#percent").html(percentComplete+'%');
   
      },
      success: function() 
      {
          $("#bar").width('100%');
          $("#percent").html('100%');
   
      },
      complete: function(response) 
      {
          $("#message").html("<font color='green'>"+response.responseText+"</font>");
      },
      error: function()
      {
          $("#message").html("<font color='red'> ERROR: unable to upload files</font>"); 
      } 
    }; 
 
     $("#myForm").ajaxForm(options);
 
});
 
</script>
</body>
 
</html>
  <?php
     
  }

?>





 

<?php  
  function delete_old_user( ){ 
    if ( mysql_query("DELETE FROM fs_member_profile_pic WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_member_profile_pic WHERE mno < 1053  <br>";
    } 
    if ( mysql_query("DELETE FROM fs_members WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_members WHERE mno < 1053  <br>";
    }  
    if ( mysql_query("DELETE FROM fs_member_timeline WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_member_timeline WHERE mno < 1053  <br>";
    }  
    if ( mysql_query("DELETE FROM fs_member_accounts WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_member_accounts WHERE mno < 1053  <br>";
    }   
    if ( mysql_query("DELETE FROM fs_signup_code WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_signup_code WHERE mno < 1053  <br>";
    }     
    if ( mysql_query("DELETE FROM fs_favorite_modals WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_favorite_modals WHERE mno < 1053  <br>";
    }   
    if ( mysql_query("DELETE FROM fs_drip_modals WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_drip_modals WHERE mno < 1053  <br>";
    }   
    if ( mysql_query("DELETE FROM fs_notification WHERE mno < 1053 ") ) { 
      echo "  DELETE FROM fs_notification WHERE mno < 1053  <br>";
    }     
  }




?>























  <!-- <meta property="og:image" content="http://i4.ytimg.com/vi/DAJYk1jOhzk/hqdefault.jpg"> 
  <img src="http://i4.ytimg.com/vi/DAJYk1jOhzk/hqdefault.jpg" /> 
 -->

<?php 
  // echo " basename = ".basename( '//www.youtube.com/embed/-oBFLdvtzlY'); 
 // $pa->download_image_from_other_site( 200 , 'http://i4.ytimg.com/vi/BVzwkn_ilwA/hqdefault.jpg' , 'fs_folders/images/uploads/posted articles/detail/' );  



  
  

  // node_js_practice( );

  function node_js_practice( ) {
     ?>

     this is node js tutorials


     <script type="text/javascript">
        var http = require('http');
        http.createServer(function(request, response) {
        response.writeHead(200);
        response.write("Hello, this is dog.");
        response.end();


          alert( 'asdasd' ); 
        }).listen(8080);
        console.log('Listening on port 8080...');
        var http = require('http');
        http.createServer(function(request, response) {
          
        }).listen(8080);
        console.log('Listening on port 8080...');
     </script>


     <?php 
  }



















 

   function adding_div_into_textbox( ) {
    ?>

    <div class="editable"> <span id='keyword-tag' >hello </span>  </div>

      <script>
         $('.editable').each(function(){
            this.contentEditable = true;
        });
      </script>

    <style type="text/css">
      div.editable {
          width: 300px;
          height: 200px;
          border: 1px solid #ccc;
          padding: 5px; 
      }
      #keyword-tag{   
        border-radius: 5px; 
        padding: 3px;  
        -webkit-box-shadow: inset 3px -4px 136px 37px rgba(123,173,160,1);
        -moz-box-shadow: inset 3px -4px 136px 37px rgba(123,173,160,1);
        box-shadow: inset 3px -4px 136px 37px rgba(123,173,160,1);
      } 
    </style>

    <?php
 }

function autocomplete( ) {
    ?>  
      <!doctype html>
      <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>jQuery UI Autocomplete - Default functionality</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
        $(function() {

          var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
          ]; 
          $( "#tags" ).autocomplete({
            source: availableTags
          });  
        });
        </script>
      </head>
      <body>
       
      <div class="ui-widget">
        <label for="tags" style="font-size:12px;" >Tags: </label>
        <input id="tags" >
      </div>
       
       
      </body>
      </html>
  <?php
}



function real_time_js_and_php( ) {
   ?> 
<!-- tut 1 -->
   <script type="text/javascript">
      setInterval(function(){
          // inside here, set any data that you need to send to the server
          var some_serialized_data = jQuery('form.my_form').serialize();

          // then fire off an ajax call
          jQuery.ajax({
              url: '/yourPhpScriptForUpdatingData.php',
              success: function(response){
                  // put some javascript here to do something with the 
                  // data that is returned with a successful ajax response,
                  // as available in the 'response' param available, 
                  // inside this function, for example:
                  $('#my_html_element').html(response);
              },
              data: some_serialized_data
          });
      }, 1000); 
      // the '1000' above is the number of milliseconds to wait before running 
      // the callback again: thus this script will call your server and update 
      // the page every second.

   </script>  
<!-- tut 2 -->

  <script type="text/javascript">
    jQuery(function($){
      setInterval(function(){
        $.get( '/getrows.php', function(newRowCount){
          $('#rowcounter').html( newRowCount );
        });
      },5000); // 5000ms == 5 seconds
    });
  </script> 
<!-- tut 3 js.node-->

  <!-- src: http://coenraets.org/blog/2012/10/real-time-web-analytics-with-node-js-and-socket-io/ --> 
<!-- 
    HELPFUL
      src: http://www.dreamincode.net/forums/topic/319049-creating-real-time-web-updates-with-ajax-php-sql-etc/
      AJAX PUSH
      Socket connections 
      sockets. 
      node.js
      database check 
      sockets push
      -->

        <?php

            // Assume this SocketServer is dealing with incomming
            // Socket connections and making them available as
            // "Client" objects through: getClients().
            $server = new SocketServer();

            while ($server->isRunning()) {
              // Go through each of the clients currently connected
              // to the server.
              foreach ($server->getClients() as $client) {
                // If the client has sent a new message to the server
                // receive it and push it down to all the other clients.
                // Then save it in the database.
                if ($client->hasNewData()) {
                  $message = $client->receive();
                  foreach ($server->getClients() as $recipient) {
                    $recipient->send($message);
                  }
                  DB::get()->saveMessage($message);
                }
              } 
              // Sleep for a few milliseconds, just so the process doesn't
              // freeze up the server or eat all it's resources.
              usleep(150000);
            } 
       ?> 
<!-- 
    NOT HELPFUL
      tut 4  
      http://www.webdesignerforum.co.uk/topic/65897-php-mysql-real-time-chat-application-without-javascript/ 
      usleep(250000);

    isset 
--> 
<!-- 
  tut 5   sockets push 
  http://learning-0mq-with-pyzmq.readthedocs.org/en/latest/pyzmq/patterns/pushpull.html
  http://socketo.me/docs/push
--> 
   <?php
}

 
 function real_time_js_firebase(  ) { ?>


  <div style="display:none" >
   <!--  first tut -->
        <html>
          <head>
            <script src='https://cdn.firebase.com/js/client/1.0.15/firebase.js'></script>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
          </head>
          <body>
            <div id='messagesDiv'></div>
            <input type='text' id='nameInput' placeholder='Name'>
            <input type='text' id='messageInput' placeholder='Message'>
            <script>
              var myDataRef = new Firebase('https://iwsbe04nw0l.firebaseio-demo.com/');
              $('#messageInput').keypress(function (e) {
                if (e.keyCode == 13) {
                  var name = $('#nameInput').val();
                  var text = $('#messageInput').val();
                  myDataRef.push({name: name, text: text});
                  $('#messageInput').val('');
                }
              });
              myDataRef.on('child_added', function(snapshot) {
                var message = snapshot.val();
                displayChatMessage(message.name, message.text);
              });
              function displayChatMessage(name, text) {
                $('<div/>').text(text).prepend($('<em/>').text(name+': ')).appendTo($('#messagesDiv'));
                $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
              };
            </script>
          </body>
        </html>
  </div>
<!-- second tut  -->
  
  <!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Firebase Chat Application</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
     
        <style>
            .container {
                max-width: 700px;
            }
     
            #comments-container {
                border: 1px solid #d0d0d0;
                height: 400px;
                overflow-y: scroll;
            }
     
            .comment-container {
                padding: 10px;
                margin:6px;
                background: #f5f5f5;
                font-size: 13px;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 5px;
            }
     
            .comment-container .label {
                margin-right: 20px;
            }
     
            .comment-container:last-of-type {
                border-bottom: none;
            }
        </style>
    </head>
    <body> 
      <div class="container">
   
          <h1>Firebase Chat Application</h1>
   
          <div class="panel panel-default">
   
              <div class="panel-body">
                  <div id="comments-container"></div>
              </div>
   
              <div class="panel-footer">
   
                  <form role="form">
                      <div class="form-group">
                          <label for="comments">Please enter your comments here</label>
                          <input class="form-control" id="comments" name="comments">
                      </div>
   
                      <button type="submit" id="submit-btn" name="submit-btn"
                          class="btn btn-success">Send Comments</button>
   
                      <button type="reset" class="btn btn-danger">Clear Comments</button>
                  </form>
   
              </div>
          </div>
      </div>
   
      <script src="http://cdn.firebase.com/js/client/1.0.6/firebase.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script>
   
          var fireBaseRef = new Firebase("https://iwsbe04nw0l.firebaseio-demo.com/");
   
          $("#submit-btn").bind("click", function() {
              var comment = $("#comments");
              var commentValue = $.trim(comment.val());
   
              if (commentValue.length === 0) {
                  alert('Comments are required to continue!');
              } else {
                  fireBaseRef.push({comment: commentValue}, function(error) {
                      if (error !== null) {
                          alert('Unable to push comments to Firebase!');
                      }
                  });
   
                  comment.val("");
              }
   
              return false;
          });
   
          fireBaseRef.on('child_added', function(snapshot) {
              var uniqName = snapshot.name();
              var comment = snapshot.val().comment;
              var commentsContainer = $('#comments-container');
   
              $('<div/>', {class: 'comment-container'})
                  .html('<span class="label label-default">Comment ' 
                      + uniqName + '</span>' + comment).appendTo(commentsContainer);
   
              commentsContainer.scrollTop(commentsContainer.prop('scrollHeight'));
          });
   
      </script>
    </body>
  </html>

  <?php
 }



   

 function play_mp3( ) { ?> 
 <<!DOCTYPE html>
 <html>
 <head>
   <title></title>

    
<script language="JavaScript" type="text/javascript"> and a
</script>.
    <script type="text/javascript">
        
        function play( ) {  
          document.getElementById("res-audio").innerHTML = "<embed id='sample' src='fs_folders/images/audio/beeping-sound.mp3' type='application/x-mplayer2'></embed>";   
        }
    </script>
 </head>

    
<body >
 

<span onclick="play( )" > play </span> 
       <!-- <embed id='sample' src="fs_folders/images/audio/beeping-sound.mp3" type="application/x-mplayer2"></embed> -->
   <div id='res-audio'> </div>


 </body>
 </html>


 <?php
    
 }



    function joined_table ( ) {  
      $Q1 = "SELECT mno , lastname  FROM fs_members WHERE mno = 133 UNION SELECT mno , title FROM fs_postedarticles   WHERE mno = 133 UNION SELECT mno , lookName FROM postedlooks  WHERE mno = 133"; 
      $Q = @mysql_query( $Q1 ); 
      $c = 0; 
      while ($db=@mysql_fetch_array($Q)) {     
        $res[$c] = $db;
        $c++;
      }  
      return $res;  
    }





    function left_right_slide_jquery ( ) {   ?> 

        <html>
        <head> 
            <title>Adding a slide effect to an image using jQuery UI</title> 
            <style>
                body{
                    text-align: center;
                } 
                input{
                    padding:5px 10px;
                    margin:20px;
                    font-size:16px;
                    font-weight: bold;
                    padding:5px 10px;           
                }
                
                .image-wrap{
                    position: relative;
                    margin:0 auto;
                    width:900px;
                }

                .image{ 
                    width: 200px;
                } 
                .postarticle-container-image { 
                    border:1px solid green;
                    width: 200px; 
                    height: 200px; 
                    background-color: #000;
                } 
            </style>

        </head>
        <body>

            <input type="button" class="slide-left" value="&laquo; Slide Left" /> 
            <input type="button" class="slide-center" value="Center"> 
            <input type="button" class="slide-right" value="Slide Right &raquo;">  
            <!-- we create a wrapper for the image so it can move in left and right --> 
            <center>
              <div class='postarticle-container-image' >
                  <div class="image-wrap"> 
                      <table border="1" cellpadding="0" cellspacing="0" >
                        <tr> 
                          <td> 
                            <img src="http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg" alt="photo1" class="image" />
                          </td>
                          <td> 
                            <img src="http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg" alt="photo1" class="image" />
                          </td>
                          <td> 
                            <img src="http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg" alt="photo1" class="image" />
                          </td> 
                           <td> 
                            <img src="http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg" alt="photo1" class="image" />
                          </td> 
                      </table>  
                  </div>    
              </div>
            </center> 
            <!-- 
                We use Google's CDN to serve the jQuery js libs. 
                To speed up the page load we put these scripts at the bottom of the page 
            -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
            <script> 
                //DOM loaded 
                $(document).ready(function() { 
                      var move   = 0;
                      var slidedistance = 200; 
                      var speed   = 400;  
                    $('.slide-left').click(function(){
                        move -= slidedistance; 
                        $('.image-wrap').animate({
                            left: move
                        }, speed);  
                        // alert( move )
                    });  
                    $('.slide-right').click(function(){
                        move += slidedistance; 
                        $('.image-wrap').animate({
                            left: move
                        },speed ); 
                        // alert( move )
                    }); 
                }); 
            </script> 
        </body>
        </html> <?php 
    }


    function get_check_box_checked_or_not( ) {
      echo " 
        <br>  
        <input type='checkbox' name='languages' value='1' id='categories_checked123' checked> test categories_checked  <br> 
        <input type='button' id='brandsave1' value='save'   onclick='test1_checkbox( )'              style='font-size:10px;'        /> 
      "; 

      ?>

      <script type="text/javascript">

          function test1_checkbox( ) { 
            

            if($('#categories_checked123').prop('checked')) {
                // something when checked
                alert('checked'); 
            } else {
                // something else when not
                alert('not checked'); 
            }
          }

      </script>

      <?php 


    }

















    // $mc->update_profile_pic( $mno ); 
    function cleanmemort_cache( ) {  
        //check filesize
        echo filesize("test.txt");
        echo "<br />"; 
        $file = fopen("test.txt", "a+");
        // truncate file
        ftruncate($file,100);
        fclose($file); 
        //Clear cache and check filesize again
        clearstatcache();
        echo filesize("test.txt"); 
    } 

    // get_source_of_image_when_selected_to_upload( ); 
      function get_source_of_image_when_selected_to_upload( )  { ?>
      <script type="text/javascript">
        function readURL(input) {

          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#blah').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#imgInp").change(function(){
          readURL(this);
      });
      </script>

      <form id="form1" runat="server">
        <input type='file' id="imgInp" />
        <img id="blah" src="#" alt="your image" />
    </form>
    <?php 
       
    }



    // $mc->update_fs_table_auto( $mno , array( 'tpercentage' ,'tlooks' ,'tarticle' ,'tmedia' ,'tfollower' ,'tfollowing' ,'tratings' ,'tview' ,'fb_all_freinds' ,'fb_freinds_on_fb' ,'fb_freinds_on_fs' ) , 'fs_members' );
    // $mc->update_fs_table_auto( $mno , array( 'tpercentage' ,'tlooks' , 'tratings' ) , 'fs_members' );
 
    // $mc->update_fs_table_auto( $mno , array( 'tpercentage' , 'tratings' ) , 'fs_members' );

    /*
     $mc->delete_modals_comment( $mno , $plcno , $plno , 'postedlooks' ); 
    */





    // public function delete_modals_comment( $mno , $plno , $_table ) { 
    //     $my_total_comment_to_modal = $mc->get_modal_total_comment( $mno , $plno , 'postedlooks'  ); 
    //     // $mc->get_modal_total_comment( 136 , 404 , 'fs_postedmedia'  ); 
    //     // $mc->get_modal_total_comment( 136 , 404 , 'fs_postedarticles'  ); 
         
    //     echo " total comment on a look $my_total_comment_to_modal "; 
    //     $latestmodal  = $mc->get_modal_activity_latest( $plno , 'postedlooks' );   
    //     print_r($latestmodal);


    //     $mno1 = intval($latestmodal[0]['mno']); 
    //     $action = $latestmodal[0]['action']; 


     
    //     if ( $mno == $mno1) {
    //       # latest modal activity is urs 
    //       echo "<br>the latest comment is urs "; 
    //       if ( $my_total_comment_to_modal == 0 ) { 
    //         #u have zero comment in your modals 
    //         $pos = strpos($action,'Posted');
    //         echo " position $pos";
    //         if ( $pos ) {
    //           #fixed
    //           echo "<br> current action = $action ";
    //           $action = str_replace( 'Commented and ', '' , $action); 
    //           echo "<br> new action = $action<br> "; 
    //           echo "<br>update action = $action the latest activty for specific modal<br>"; 

    //           $tc = $mc->get_modal_total_comment(  $mno , $plno , 'postedlooks' );  
    //           $mc->update_modal_total_comment( $tc , $plno , 'postedlooks' );  
    //           $activity = $mc->get_modal_activity_latest( $plno , 'postedlooks' );
    //           $ano = $activity[0]['ano'];    
    //           $mc->update_activity_action( $ano , $action ); 

    //           /*
    //             $mc->delete_modal_comment( );  
    //             $mc->update_modal_activity( )
    //             exist
    //           */           

    //         }
    //         else{
    //           #fixed
    //           echo "modal is not urs <br>"; 
    //           echo "modal comment delete <br> ";
    //           echo "modals activty delete <br>"; 
    //           echo "update the latest activty for specific modal just delete to replace active set to 1<br>";   

    //           $mc->delete_modal_comment( $plcno , 'postedlooks' );  
    //           $mc->delete_modal_activity_posted( $mno , 'Commented' , $plno , 'postedlooks' );
    //           $tc = $mc->get_modal_total_comment(  $mno , $plno , 'postedlooks' );  
    //           $mc->update_modal_total_comment( $tc , $plno , 'postedlooks' );  
    //           $activity = $mc->get_modal_activity_latest( $plno , 'postedlooks' );
    //           $ano = $activity[0]['ano'];  
    //           echo " ano = $ano <br> ";
    //           $mc->update_activity_active_status( $ano , 1 );  

    //           /*
    //             $mc->delete_modal_comment( ); 
    //             $mc->delete_modal_activity_posted( ); 
    //             $mc->get_modal_activity_latest( $plno , 'postedlooks' )
    //             $mc->update_modal_activity( )
    //             exist
    //           */       

    //         } 
    //       }else{
    //         #fixed
    //         echo " u still have a comment in the modal <br>";
    //         echo " no latest modal activity deleted because total comment is not zero but $my_total_comment_to_modal<br>"; 
    //         echo " delete comment modal<br> ";
    //         echo " get total comment and update total comment in the modal<br>"; 

    //         $mc->delete_modal_comment( $plcno , 'postedlooks' );  
    //         $tc = $mc->get_modal_total_comment(  $mno , $plno , 'postedlooks' );  
    //         $mc->update_modal_total_comment( $tc , $plno , 'postedlooks' );  

    //         /*
    //           $mc->delete_modal_comment( ); 
    //           $mc->get_modal_total_comment( );  
    //           exist
    //         */
    //       } 
    //     }
    //     else {
    //       # fixed
    //       echo "  <br>modal is not urs <br> ";
    //       echo "  ur posted activity for this modal is already hidden and it will just show in you profile<br>";
    //       echo "  delete comment modal<br> ";
    //       echo "  delete ur comment posted activity in this modal<br>";
    //       echo "  update total modal total comment<br>";  

    //       $mc->delete_modal_comment( $plcno , 'postedlooks' );  
    //       $mc->delete_modal_activity_posted( $mno , 'Commented' , $plno , 'postedlooks' );
    //       $tc = $mc->get_modal_total_comment(  $mno , $plno , 'postedlooks' );  
    //       $mc->update_modal_total_comment( $tc , $plno , 'postedlooks' );  
    //     } 
    // }
     
 





/*




    switch ( $my_total_comment_to_modal ) {
      case 0:
          # u dont have a comment to a look
        echo " zero comment"; 




        break;
      
      default:
         echo " more than zero comment";
        break;
    }
    */






















  // require("fs_folders/page_footer/footer_php_file/footer1.php"); 
/*
  $plno = 128; 
  $mno = 133;

  echo strlen('Share your blog post, ootd and lifestyle photos. See the latest trends, get fashion inspiration and style advice.' ); 
  echo " <br><br><Br>";
  echo strlen('FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO... Show your ootd, see the latest trends, get fashion inspiration and style advise.' ); echo " <br><br><Br>";
  echo " <br><br><Br>";
  echo strlen('Show your ootd, see the latest trends, get fashion inspiration and style advise.' ); 
 
  */
 
/*
    $string = 'I’ve used this blog title before but &because I seem to have left my brain in the 
    Philippines, I can’t think of anything else. I’ve been staring at my laptop for a good 30 minutes 
    and nothing is coming to me. All I see is that& diamond-shaped peek-a-boo at the middle & of my top. 
    It’s not […]'; 
    


    // before saved to the database
     
    echo $mc->clean_text_before_save_to_db( $string );

 
    echo "<br><BR><BR><BR>";
    $li = $mc->posted_look_info($plno);  
    $string = $li["lookAbout"];   
      
    echo $mc->cleant_text_print_from_db( $string );   




    echo " 
    <input type='text' id='content' value='none' />
    <div onClick='show_content( ) ' >
        click me to to show the content
      </div> 


      <div id='restest' > test </div>
    ";




  */









    /*

    $looks = $mc-> retreive_specific_user_all_looks( $mno  , "order by plno desc limit 10" ); 
   



    for ($i=0; $i < count($looks) ; $i++) { 
       echo " ".$looks[$i]['plno']."<bR>";
    }

  */


    // $res = $mc->arrow_left_right_pressed_for_next_prev( $plno ,  $looks ); 

     // print_r($looks );

    /*

      $next_prev        = $mc->db_result_next_prev( $plno , $looks , 'all' );  

      print_r($next_prev );
  */




    // $mc->fs_header( 136 );    
    // require("fs_folders/page_footer/footer_php_file/footer1.php"); 
      /* 
      echo " 
        <div id='test_res' > 
          res
        </div> 
        <div id='more_loading' >
            <img src='fs_folders/images/attr/loading 2.gif'  style='visibility:hidden;height:10px;'  > 
         </div>
      <div onClick='show_modals_test( ) '> click to load modals  </div> 
      "; 
      echo "<br>  look modals initialize <br> ";
      */
      // $mc->modal_version1_look( 19 ); 
      // $mc->modal_version1_member ( 1 );  
      // echo "strasdasding";  

    // $mc->set_cookie( 'mno' , 131 , time()+3600*24 );
    // $_SESSION['mno'] = $mc->get_cookie( 'mno' , 144 );
    // $mc->set_user_Id_logon( 133 );  
    // $_SESSION['mno'] = $mc->get_user_Id_logon( 133 );
    // echo " mno ".$_SESSION['mno']; 
    // $mc->posted_look_modals_share_icons( 122 ); 

    // $_SESSION['mno'] = 1;  

    // echo " cookie = ".$_COOKIE['TestCookie'].' session = '.$_SESSION['mno'];





    /*
    echo " total len ".strlen("Anthropocentricities Transformationalists Paleoanthropological")."<br>";
    echo " total len ".strlen("Transformatisdd Paleoanthro Transformati")."<br>"; 
    echo "label looks desc len ".strlen("asasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasas")."<br>";
    echo "label looks title len ".strlen("asasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasasas")."<br>";
    $url = 'http://beautyininsanity.blogspot.com/'; 
    echo " current url $url <br> ";
    $url = str_replace(":", "",  $url );
    echo " new url $url <br> ";
    */

    // echo $mc->get_html_colo_code("RustyRed");
    // arrange_picture_thumbnail( );
     // detect_height_of_screen_and_resize_windows( );
      // lookdetails_dropdown_share_icons( );  
    // detect_key_pressed_in_page();
     // multiple_form( );
    // knobjquery ();
     // next_numbers()
     // $r = $mc->retreive_specific_user_all_looks( 133 ,  "order by plno desc"  );
     // echo $mc->data_get_total_next_prev_numbers(  $r  , 12 ); 
     // popupinvite( $mc ); 
     // echo " <h1> general popUp </h1>";
     // inviteresponsepopup( $mc );
     // echo "<h1> invite popUp </h1>";
      // popupinvite( $mc );
      // echo "<br><br><br>";
     // getBrowser();
     // uploadfilebutton( );
      // autoupload( ) ;
      // popup_continues_counter();
     // email_body_test();  
      /*
        $fb_friends_in_fs = $mc->get_all_fs_fbusers_id();
        fblogin(  $fb_friends_in_fs );
        fb_send_request();
      */
      // $fsfbusersids = $mc->get_all_fs_fbusers_id(); 
    // $mc->invite_popUp( true , "jesus erwin suarez" );
     // $mc->add_look_view( 228 );
    // $mc->get_last_id( 'postedlooks' , 'plno' );
     // $mc->update_table_to_active(  "postedlooks" ,  "active"  ,  0 ,  "plno"  ,  0  );  
     // $mc->insert_activity_wall_posted( "postedlooks" , "posted" , 133 , 1 , "postedlooks" , "plno"  );
    // uppercase_each_word( );
    // get_city( );    
     // upload_image()
     // dropdown_checkbox(); 
    // fs_footer();
    // $mc->modals_memeber( 133 );

   

    // $mc->invite_popUp_newsletter( );  
    // require( "fs_folders/fs_popUp/popUp_php_file/twmspopUp.php" );
    // $mc->print_twms_invite_popup( ); 
    // fb_send_request( );
    // $mc->print_rating_bubble( null );  
        
      /*
        $rated = $mc->get_my_rate_to_this_look( 133 , 122 );  
        if( $mc->is_look_i_rated( $rated ) == false )  { 
          $mc->my_look_rating_save( 132 , 122 , 3 ); 
        }  
        print_r($rated);
        echo " all rating to this look <br> ";
        $lr = $mc->get_all_rating_to_this_look( 122 );
        print_r($lr);
      */

    
      #rating design
      /*
        $mno = 131;
        $plno = 122;
        $mc->print_rating_bubble( $mno , $plno ); 
        echo " <br><br><br><br>";
        $mc->print_rating_message( $mno , $plno ); 
      */  
        // $plno = 130; 
        // $mno = 934;  
        // $currentDate = date("Y-m-d H:i:s");  
        /*
        echo "<br><br><br><br><br><br><br><br>"; 
        // $mc->print_specific_look_ratings( 86 );
        
        echo "<div id='popUp-background' >  
          <div id='popup-response' style='color:white' >
                this is the response
            </div> 
        "; 

          $mc->fs_popup ( $plno );
        echo " </div> ";  
        $mc->print_choose_votes_version2( $mno , $plno );  
      
      */







      /*
      $myvote = $mc->get_my_look_vote( 133 , 95 );   
      $lvoption1 = $myvote[0]['lvoption1']; 
      $lvoption2 = $myvote[0]['lvoption2']; 
      $lvoption3 = $myvote[0]['lvoption3']; 
      $lvoption4 = $myvote[0]['lvoption4']; 
      $lvoption5 = $myvote[0]['lvoption5']; 
      $lvoption6 = $myvote[0]['lvoption6'];  
          echo " 
        $lvoption1 <br>
        $lvoption2 <br>
        $lvoption3 <br>
        $lvoption4 <br>
        $lvoption5 <br>
        $lvoption6 ";
      */  

      /*
        // $mc->get_specific_look_overall_ratings( $plno ); 
        echo " my look rating = ".$mc->get_look_percentage( $plno , $mc->get_specific_look_overall_ratings( $plno ) , $mc->get_max_look_rating( null ) ); 
        // $mc->update_top_data( 'top_look_rate' , 100 );
        echo "<br><br><br> top rate = ".$mc->get_top_data( 'top_look_rating' )."<br>";
        echo " top percentage = ".$mc->get_top_data( 'top_look_percentage' )."<br>";
        echo " top vote =  ".$mc->get_top_data( 'top_look_vote' )."<br>"; 
        $max_look_rating = $mc->get_max_look_rating( ); 
        $top_look_rating = $mc->get_top_data( 'top_look_rating' );   
    */



      // if (  $max_look_rating > $top_look_rating  ) { 
      //   $nv = $mc->update_top_data( 'top_look_rating' , $max_look_rating  );
      //   echo " new top look rate $nv ";
      // } 
      // echo " lookmax rating $max_look_rating and top look rating $top_look_rating "; 
      


      
        // $mc->update_or_get_look_precentage( $plno ); 
        // $mc->update_total_votes( $plno );   
        
        
        
         // if ( $mc->reset_ratings( true ) ) { 
         //  echo " successfully reset ";
         // }else{
         //  echo " failled to reset ";
         // }
         
        
         
       
      // echo " ".$mc-> get_overall_percentage_of_user ( $mno ,  null ).' % ';  
         /*
         $val = array(
            'mno'         =>  $mno, 
            'plno'        =>  122, 
            'lvoption1'   =>  0, 
            'lvoption2'   =>  123, 
            'lvoption3'   =>  0, 
            'lvoption4'   =>  4, 
            'lvoption5'   =>  5, 
            'lvoption6'   =>  6, 
            'lvoption7'   =>  7,   
            'lvdate'      =>  date("Y-m-d H:i:s"),
            'table_name'  =>  'fs_look_votes',
            'row_id_name' =>  'lvno'
        ); 
        $mc->update_or_add_vote_detail( $val );  
        */   
        
        // $mc->update_or_add_my_activity_wall_post( 133 , 132 , 'Favorited' , 'postedlooks' ,  date("Y-m-d H:i:s") );  
        // insert_v1( 
        //   array(  
        //           'mno'          => $mno,  
        //           'action'       => 'rated a look',
        //           '_table'       => 'postedlooks', 
        //           '_table_id'    => $plno,
        //           '_date'        => $currentDate, 
        //           'active'       => 1, 
        //           'table_name'   => 'activity',
        //           'row_id_name'  => 'ano' 
        //       ) 
        // );      

        // $mc->date_difference();  
        // $mc->update_or_add_my_activity_wall_post_more( 133 , 'Rated' , 'postedlooks' , 146 ,  $mc->date_time );    
        // echo " this is image ".$mc->get_my_action_image_equivalent( 184  , 165 , 'Rated' ); 
        
        // echo $mc->print_more_friends_doing_the_same_action( 133 , 170 , 'Rated');

       // $mc->get_time_ago( '2014-04-17 22:31:01' ); 
        // echo " date  $mc->date_time ";

      // $mc->update_last_action_activity_wall_post( 133 , 'Posted' , 'postedlooks' , 169 , $mc->date_time , 2 , 1 ); 

        // $mc->update_last_action_activity_wall_post( 133 , 'all action' , 'postedlooks' ,  169  , $mc->date_time , 1 , 2 );  
       // print_r($mc->get_my_profile_feed_activity( 138 ) );   
        // $mc->reset_user_data( 133 , array('following','a') );  
        // $mc->add_user_profile_view( 125 , 133 ,  $mc->date_time );  
        // $activity = $mc->get_activity_posted( 203 );  
        // print_r($activity);  
        // echo " date ".$activity[0]['_date']; 
        // $mc->flag_ratings ( 134 , 131  , 193 , 'Rated' , $mc->date_time );
        // $mc->flag(  136 , 131  , 193 , 'Dripped' , $mc->date_time , 'look' ); 
        

        /*
        $mc->add_look_comment_thumb_up_or_down( 118 , 133 ,'Thumb-Up' , $mc->date_time ); 
        // $mc->add_look_comment_thumb_up_or_down( 133 , 118 , 'Thumb-Down' , $mc->date_time ); 


        $cno = 118;

        echo "<img src='$mc->path_icons/Thumbs-up.png'  class='img_like'  id='img_like_'.$cno'    onclick='look_comment_thump_up_or_down( \"$cno\" , \"Thumb-Up\" )' />";


        echo "<br><br><br><br><br>";
        $r = select_v3( 
          'posted_looks_comments_like_dislike' , 
          '*' , 
          "plcno = 1 and plcld_action = 'Thumb-Down' " 
        );
        echo " total like ".count($r); 
        print_r($r);
        */ 
         // print_r( $mc->get_my_profile_feed_activity( 133 )); 
         // print_r($mc-> get_activity_posted_profile_feeds( 1 ) ); 

        // $mc->follow_un_follow_activity_wall_post(  134 , 133 , 'Following' , 'fs_members' , $mc->date_time , 'un-follow' ); 
        // mysql_query("DELETE FROM activity WHERE action = 'Rated' ");      



        // echo " date time $mc->date_time ";
        // 2014-05-02 06:42:40


        /*
          for ($i=1; $i < 32 ; $i++) { 
            echo $mc->dateTime_convert( "2014-05-0$i 06:42:40" ).'<br>'; 
          }
        */ 
      // auto_get_image_file_upload( );  
      // timer(  );

  // htmlentities(string)



  // if ( get_magic_quotes_gpc( ) ) { 
  //   echo " magic qoutes are enable <br> "; 
  // }
  // else{ 
  //   echo " magic qoutes are enable <br> ";
  // }

  // // stripslashes(str)
  // echo "stripslashes: ".stripslashes($_POST['question']).'<br>';
  // echo "htmlentities: ".htmlentities($_POST['question']).'<br>';

  // echo "<form actio='testPage.php' method='POST' > 
  //   <input type='text' name='question' /> 
  //   <input type='submit'  />  
  // </form> "; 
  // xammp_and_php_version( );

 
  // $des = " great options HERE & HERE ~  ZARA MULES similar HERE ~ ASOS FLAT SANDALS ~ DANIEL WELLINGTON WATCH I have been stuck in this easy dressing mode lately.  Since it was finally hot enough I couldn't wait to toss on my favorite pair of of old Levis....totally the typical LA chick ;-). Oh and only a few more days left to (until May 31st) receive 15% off any purchase online at Daniel Wellington's official site here!  Be sure to use the code  bambisarmoire! - See more at: http://fashionsponge.com/look-details-view-more?url=http//www%20bambisarmoire%20com/2014/05/levis-linen%20html&id=436#sthash.lWrUs6Nl.dpuf"; 
  // echo "$des";

// $textbody = "This book is *very* difficult to find.' ";

// $word = "Hero Ambassadors Spreading the Good Word!Every family affected by childhood cancer has a story to tell. Each time a family tells their story, it opens people’s eyes and hearts to the importance of curing childhood cancer. This is the impetus behind Alex's Lemonade Stand Foundation's Hero Ambassador Program. Hero ambassadors are often family members of childhood cancer heroes, but our brave heroes also take on the role of ambassadors.  Meet Hero Ambassador Jonathan Nagrant. Jonathan was diagnosed with ependymoma (a type of brain cancer) at the age of 7. He is now a confident 11-year-old and a proud ambassador for ALSF telling his inspiring story of hope at "; 
// echo " before $word  after <br><BR><BR> ";
// echo "asdasd ".$mc->clean_text_before_save_to_db( $word ).'uea';
// $textbody = preg_replace ("/" . preg_quote($word) . "/", "<i>" . $word . "</i>", $textbody);

// echo preg_quote( $word ); 
  // html_clean( $des );


  /*

    search_menu(  'width:150px;height:30px;' , 'width:150px;background-color:yellow'  ); 
  */
    // onclick( );
  // $mc->send_email_to_user( "Jesus Erwin Suarez" ,  "mrjesuserwinsuarez@gmail.com" );


  function search_menu( $button_style, $dropdown_style ) { ?>

    <input style='<?php echo $button_style; ?>'  id="menu-search" name='members' type="text" placeholder="search member reservation" onkeyup ="search_typed( 'user' );" name="search" autocomplete="off" >
   

    <div  id="menu-search-result-dropdown" style="<?php echo  $dropdown_style; ?>"  >    
    </div>    
    <div id="menu-search-container-loading" >  
      <center>
        <img id='menu-search-container-loading-img' src="fs_folders/images/attr/loading 2.gif"  >
      </center>
    </div> 
 
    <script type="text/javascript"> 
      search = new Object();
      search.counter_add = 0; 
      search.result_id = "";
      search.search_word = "";   

      function search_typed( type  ) {
        // alert(type);
        search.total_res = $("#total_room").text();  

        // search.total_res = parseInt(search.total_res);
        // alert(search.total_res);
        // kailangan ma detect kong pila ka li sa ul nga result sa search.
        search.updownkey = false;  
        if(event.keyCode == 40) { // down key
          // event.preventDefault()
          // alert("keydown");  
          if ( search.counter_add < search.total_res ) { // if there is still to move down result
            search.counter_minus = search.counter_add;
            search.counter_add++;
            search.updownkey = true; 
            // alert("add < total res")
          } else {  // if no more to move down result back to beggining result.
            // alert("add > total res") 
            search.counter_add=1;
            search.counter_minus = search.total_res;
            search.updownkey = true; 
            // alert(" minus "+search.counter_minus+" add = "+search.counter_add); 
          } 
          // alert(" minus "+search.counter_minus+" add = "+search.counter_add); 
        }else if (event.keyCode == 38) {  // up key  
          if ( search.counter_add > 1  ) { // if there is still to move up result
            search.counter_minus = search.counter_add; 
            search.counter_add--; 
            search.updownkey = true;
            // alert(" minus "+search.counter_minus+" add = "+search.counter_add); 
          } else { // if no more to move up result back to end result
            search.counter_add = search.total_res;
            search.counter_minus = 1;
            search.updownkey = true;  
          }
        }else if ( event.keyCode == 13 ) { 
          // alert("enter pressed and search is starting now!");
        } 
        else{
          // key pressed 
          $('#menu-search-result-dropdown').text("");
          search.typed = document.getElementById('menu-search').value;   
          if ( search.typed == '' ) {
            // no text entered in text field
          }else{
            search.counter_add = 0;

            // alert("key pressed "+search.typed+" user type = "+type); 
            // alert(search.typed);

            if (type == 'admin') {
              // alert("find users ");
              ajax_send_data("menu-search-result-dropdown","hr_folders/hr_menu/menu_php_file/retrieve-data.php?menu_search="+search.typed+"&page=admin","menu-search-container-loading") 
            }else if ( type=='user'){
              // alert("find rooms"); 
              ajax_send_data("menu-search-result-dropdown","fs_folders/ajaxquery/label/label_brand.php?brands_type_in=="+search.typed,"menu-search-container-loading" );    
            } 
          } 
        } 
        if ( search.updownkey == true) { 
          $("#menu-search").val($("#menu-search-result-id-"+search.counter_add).text())
          $("#menu-search-result-id-"+search.counter_minus).css({"background-color":"yellow"});
          $("#menu-search-result-id-"+search.counter_add).css({"background-color":"#eb6830"}); 
        }   
      }
      function  search_result_mouseover( rid ) { 
        
        search.total_res = $("#total_room").text();   
        search.result_id_number = rid;  
        for (var i = 1; i <= search.total_res; i++) {
          // alert(" name white "+$("#menu-search-result-id-"+search.result_id_number).text());
          $("#menu-search-result-id-"+i).css({"background-color":"yellow"});   
        };
        $("#menu-search").val($("#menu-search-result-id-"+search.result_id_number).text()) 
        $("#menu-search-result-id-"+search.result_id_number).css({"background-color":"#eb6830"});  
        // alert("mouse hover search result id"+search.result_id_number);  
      }
      function search_send( path ) {
        // search.search_word = sw; 
        // alert(search.search_word);
        Go(path);
      } 
      $(document).ready(function ( ) { 
         $(this).click(function ( ) {
          // alert("clicked");
          $("#menu-search-result-dropdown ul").css({"display":"none"});
        })
      })
    </script> 
    <style type="text/css"> 
      #menu_container { background-color:#415e9b; height: 60px; width: 100%; position: fixed;z-index: 200; }
        #menu_content { /*border: 1px solid #000;*/ width: 1009px; margin: auto; }
          #menu_table1{ position: relative; z-index: 201; float: right;  color: #415e9b; padding-top: 10px; padding-right: 20px; } 
          #menu_table1 a { font-family: "cabin";  /*text-decoration: underline; */color: #fff; padding-left:20px;  font-size: 15px;  }
          #menu_table1 a:hover { font-family: "cabin";  text-decoration: none; color: #fff; } 
          #menu-search {  width: 240px; height: 30px; margin-top: 15px; margin-left: 20px; border: 1px solid red; padding-left: 20px;padding-right: 20px; border-radius: 2px; font-size: 15px; }
          
          #menu-search-result-dropdown { position: absolute; z-index: 100; display: block; margin-left: 20px; background-color:#fff; width: 280px;   /*border:1px solid #ccc;*/  }
          #menu-search-result-dropdown ul {padding: 0px; margin: 0px; }
          #menu-search-result-dropdown ul li {/* background-color: white; */ border:1px solid red; padding: 10px; list-style: none; cursor: pointer;   }
          #menu-search-result-dropdown ul li:hover {/* background-color:#415e9b;*/ color: white; }
          #menu-search-result-dropdown ul li a { text-decoration: none; color: #000; }
       
          #menu-search-container-loading {  visibility: hidden;  border: 1px solid green; background-color: #fff; padding-top: 7px; padding-bottom: 7px; width:148px; margin-left: 20px;  }
          #menu-search-container-loading-img {position:relative;  /*border: 1px solid red;*/ height:15px; margin-left:20px;z-index:102; } 
    </style> 



    <?php          
  }  
  function html_clean( $des ) {

     // Strip HTML Tags
      $clear = strip_tags($des);
      // Clean up things like &amp;
      $clear = html_entity_decode($clear);
      // Strip out any url-encoded stuff
      $clear = urldecode($clear);
      // Replace non-AlNum characters with space
      // $clear = preg_replace('/[^A-Za-z0-9-!-\']/', ' ', $clear);
      // Replace Multiple spaces with single space
      $clear = preg_replace('/ +/', ' ', $clear);
      // Trim the string of leading/trailing space
      $clear = trim($clear);
      echo " $clear";
  }  
  ?>
  <?php  function onclick( ) { ?>

    <!DOCTYPE html>
    <html>
    <head>
    <script>
    function myFunction()
    {
    document.getElementById("demo").innerHTML="Hello World";
    }
    </script>
    </head>
    <body>

    <p>Click the button to trigger a function.</p>

    <button onclick="myFunction()">Click me</button>

    <p id="demo"></p>

    </body>
    </html>



      
    <!DOCTYPE html>
    <html>
    <head>
    <script>
    function bigImg(x)
    {
    x.style.height="64px";
    x.style.width="64px";
    }

    function normalImg(x)
    {
    x.style.height="32px";
    x.style.width="32px";
    }
    </script>
    </head>
    <body>

    <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" src="smiley.gif" alt="Smiley" width="32" height="32">

    <p>The function bigImg() is triggered when the user moves the mouse pointer over the image.</p>
    <p>The function normalImg() is triggered when the mouse pointer is moved out of the image.</p>

    </body>
    </html> 
  <?php } ?> 
  <?php  
    function xammp_and_php_version( ) {
       echo 'Current PHP version: ' . phpversion() .' <br> ' ;
       echo 'Current PHP info: ' . phpinfo() . ' <br> ' ;
    }
  ?> 
  <?php 

  function timer(  ) { ?> 
    <style type="text/css">

      .timer-container{  
      height: 100px; 
      width: 100px;
      background-color: #000;
      color: #fff;
      border-top: 1px solid grey;
      font-size: 50px;
      font-family: 'arial';
      text-align:center;
    }
    .timer { 
      height: 100px; 
      width: 100px;
      background-color: #000;
      color: #fff;
      border-bottom: 2px solid grey;
      font-size: 50px;
      font-family: 'arial';
      text-align:center;
     } 



    </style>
    <?php 
      date_default_timezone_set('America/Los_Angeles');
      // echo  date("Y-m-d H:i:s");
      // echo "max day of the month = ".date("t").'<br>';
      $Current_days = date("d");
      $hour = date("H");
      $min = date("i");
      $sec = date("s");
      $maxDays = date("t"); 
      $min  = 60-$min;
      $sec  = 60-$sec;
      $hour = 24-$hour;
      $remainingDays = $maxDays - $Current_days; 

      echo " 
      <div class='timer-container' > 
        <div id='fs-timer-days'    class='timer' >
          $remainingDays
        </div>
      </div>

      </div> 
      <div id='fs-timer-hours'   class='timer' >
        $hour
      </div>
      <div id='fs-timer-minutes' class='timer' >
        $min
      </div>
      <div class='timer-container' > 
        <div id='fs-timer-seconds' class='timer' >
          $sec
        </div>
      </div>
     ";



    echo "<div id='time' > </div>";
    $des = "Hello world)<b> (*&^%$#@! it's me: and; love you.<p>";


    ?>


    
 
    <script type="text/javascript">


      var sec = '<?php echo $sec; ?>';
      var min =  '<?php echo $min; ?>'; 
      var hour =  '<?php echo $hour; ?>';
      var Current_days =  '<?php echo $Current_days; ?>';
      var maxDays =   '<?php echo $maxDays; ?>';  


      var remainingDays = maxDays - Current_days;
      start();  
      function start(){  
        setTimeout('next()',0);
      }
      function next(){ 
        // alert('next');
          sec--;
          $('#fs-timer-seconds').css('display','none'); 
          document.getElementById('fs-timer-seconds').innerHTML = sec;  
          $('#fs-timer-seconds').slideDown(1000); 
        if (sec == 0) {
          sec=59;
          min--;
          document.getElementById('fs-timer-minutes').innerHTML = min; 
        }
        if (min == 0) { 
          min=59
          hour--;
          document.getElementById('fs-timer-hours').innerHTML = hour;
        }
        if (hour == 0) {
          remainingDays--;
          document.getElementById('fs-timer-days').innerHTML = remainingDays;

        };


        document.getElementById('time').innerHTML = "<b>"+remainingDays+"</b> days | <b>"+hour+"</b> hrs | <b>"+min+"</b> mins | <b>"+sec+"</b> secs ";
        setTimeout('start()',1000);


      }
    </script>




    <?php 
  } ?>

  <?php 
  function auto_get_image_file_upload( ) {   ?>
    <input type="file" id="choose" multiple="multiple" />
    <br>
    <div id="uploadPreview"></div>  

    <script type="text/javascript">
      // var url = window.URL || window.webkitURL; // alternate use

    function readImage(file) {

        var reader = new FileReader();
        var image  = new Image();

        reader.readAsDataURL(file);  
        reader.onload = function(_file) {
            image.src    = _file.target.result;              // url.createObjectURL(file);
            image.onload = function() {
                var w = this.width,
                    h = this.height,
                    t = file.type,                           // ext only: // file.type.split('/')[1],
                    n = file.name,
                    s = ~~(file.size/1024) +'KB';

                $('#uploadPreview').append('<img src="'+ this.src +'"> '+w+'x'+h+' '+s+' '+t+' '+n+'<br>');
                
            };
            image.onerror= function() {
                alert('Invalid file type: '+ file.type);
            };      
        };

    }
    $("#choose").change(function (e) {
        if(this.disabled) return alert('File upload not supported!');
        var F = this.files;
        if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );
    });

    </script> 
  <?php } ?>




  <?php 
    function fs_footer()  {  
      echo  "<link rel='stylesheet' type='text/css' href='fs_folders/page_footer/css/invite_footer.css' >"; 
      require("fs_folders/page_footer/footer_php_file/footer1.php");  
    } 
  ?>
  <?php 

  function fb_send_request( ) { ?>


   <div id="fb-root"></div>  
    <script src="http://connect.facebook.net/en_US/all.js"></script> 
    <script>
     
    
    FB.init({
      // appId: '375477082499399', 
      appId: '528594163842974', 
      cookie: true,
      status: true, 
      xfbml: true 
    });

    function invite(to) {
      FB.ui({
        method: 'send',
        name: "please vote for me",
        link: 'http://fashionsponge.com/fs',
        picture:"http://fashionsponge.com/fs/images/FSlogo.jpeg",
        to:to,
        description:'A designers closeth...'
      });
    }  


    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
    }
    function fbs_click(width, height) {
        var leftPosition, topPosition;
        //Allow for borders.
        leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
        //Allow for title and status bars.
        topPosition = (window.screen.height / 2) - ((height / 2) + 50);
        var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
        u=location.href;
        t=document.title;
        window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
        return false;
    }
 

    </script> 
     

    <?php
      $title=urlencode('Title of Your iFrame Tab');
      $url=urlencode('http://fashionsponge.com/lookdetails?id=271');
      $summary=urlencode('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
      $image=urlencode('http://fashionsponge.com/fs_folders/images/uploads/posted looks/original looks uploaded/271.jpg');
    ?> 
    <a onClick="window.open('http://www.facebook.com/sharer.php?s=50&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=800,height=325');" href="javascript: void(0)">Insert text or an image here.</a>





      <!-- Please change the width and height to suit your needs -->
      <a href="http://www.facebook.com/share.php?u=<full page url to share" onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook"><img src="images/facebookimage.jpg" alt="facebook share"></a>
         
       
          <input type="button" value="send invite and message " onclick="invite('657368516')" /> 
          <input type="button" value="share" onclick="fbShare('fashionsponge.com', 'title', 'descr', 'http://fashionsponge.com/fs_folders/images/uploads/posted looks/original looks uploaded/272.jpg' , 900, 500)" />
       
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://fashionsponge.com/lookdetails?id=276#a-b" 
           class="new-social-share-button facebook"
           data-object="look" 
           data-object-id="276" 
           data-network="facebook" 
           data-action="share" 
           data-target="http://fashionsponge.com/fs_folders/images/uploads/posted looks/socialShare/276.jpg"> 
             <i class="fa fa-facebook"></i> 
             asd
           </a> <?php 
   }   
   ?> 

<?php   function dropdown_checkbox(){ ?>   

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Check box list</title>
</head>

<script type="text/javascript" language="javascript">
    function selectCheckBox()
    {
        var total="";
        for(var i=0; i < document.form.languages.length; i++)
        {
            if(document.form.languages[i].checked)
            {
                total +=document.form.languages[i].value + "\n";
            }
        }
        if(total=="")
        {
            alert("select checkboxes");
        }
        else
        {
            alert("Selected Values are : \n"+total);
        }
    }
</script> 
      <body>
          <form id="form" name="form" method="post" action="CheckBox.jsp">
              <div style="overflow: auto; width: 100px; height: 80px; border: 1px solid #336699; padding-left: 5px">
                  <input type="checkbox" name="languages" value="English"> English<br>
                  <input type="checkbox" name="languages" value="Hindi"> Hindi<br>
                  <input type="checkbox" name="languages" value="Italian"> Italian<br>
                  <input type="checkbox" name="languages" value="Chinese"> Chinese<br>
                  <input type="checkbox" name="languages" value="Japanese"> Japanese<br>
                  <input type="checkbox" name="languages" value="German"> German<br>
              </div>

              <br/><input type="button" name="goto" onClick="selectCheckBox()"value="Check">
          </form>
      </body>  
        <?php
        } 
        function upload_image( ) {








      if ( isset($_POST['save_profile_pic']) ) {
        if ($_FILES["file"]["error"] > 0) {
          echo "Error: " . $_FILES["file"]["error"] . "<br>"; 
          }else{  
              // add new room 
              echo " add new room  <br>";
              echo "Upload: " . $_FILES["file"]["name"] . "<br>";
              echo "Type: " . $_FILES["file"]["type"] . "<br>";
              echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
              echo "Stored in: " . $_FILES["file"]["tmp_name"];    
              move_uploaded_file($_FILES["file"]["tmp_name"], "fs_folders/images/uploads/members/mem_original/test.jpg");   
          }
      }




        ?>
          <form action="testPage.php" method="POST" enctype="multipart/form-data" >
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file"><br>
            <input type="submit" name="save_profile_pic" value="Submit" >
          </form> 
      <?php 
      }
    ?>





<?php 

    function get_city( ) { ?>
          
        <!DOCTYPE html> 
        <html> 
        <head> 
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
        <title>Reverse Geocoding</title> 

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script> 
        <script type="text/javascript"> 
          var geocoder;

          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
        } 
        //Get the latitude and the longitude;
        function successFunction(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            codeLatLng(lat, lng)
        }
 
        function errorFunction(){
            alert("Geocoder failed");
        }

          function initialize() {
            geocoder = new google.maps.Geocoder();



          }

          function codeLatLng(lat, lng) {

            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
              //console.log(results);
                if (results[1]) {
                var indice=0;
                for (var j=0; j<results.length; j++)
                {
                    if (results[j].types[0]=='locality')
                        {
                            indice=j;
                            break;
                        }
                    }
                alert('The good number is: '+j);
                console.log(results[j]);
                for (var i=0; i<results[j].address_components.length; i++)
                    {
                        if (results[j].address_components[i].types[0] == "locality") {
                                //this is the object you are looking for
                                city = results[j].address_components[i];
                            }
                        if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
                                //this is the object you are looking for
                                region = results[j].address_components[i];
                            }
                        if (results[j].address_components[i].types[0] == "country") {
                                //this is the object you are looking for
                                country = results[j].address_components[i];
                            }
                    }

                    //city data
                    alert(city.long_name + " || " + region.long_name + " || " + country.short_name)


                    } else {
                      alert("No results found");
                    }
                //}
              } else {
                alert("Geocoder failed due to: " + status);
              }
            });
          }
        </script> 
        </head> 
        <body onload="initialize()"> 

        </body> 
        </html> 



<?php } ?>























    <?php 

        function uppercase_each_word( ) { ?>
            <script type="text/javascript"> 
                alert (capitalizeEachWord("the the group of words ")); 
                function capitalizeEachWord(str) {
                       var words = str.split(" ");
                       var arr = Array();
                       for (i in words)
                       {
                          temp = words[i].toLowerCase();
                          temp = temp.charAt(0).toUpperCase() + temp.substring(1);
                          arr.push(temp);
                       }
                       return arr.join(" ");
                }
            </script>
            <?php
        } 
    ?> 

    <?php 
        function auto_show_modals( $mc ){  


        $r = $mc->get_activity( 10 );

        print_r($r); 
    ?> 
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body style="background-color:#000;padding:0px; margin:0px;" >
            <center> 
                <table border="1" cellpadding="0" cellspacing="0" style="background-color:#f5f4f1; " > 
                    <tr>
                        <td> header</td>
                    <tr>
                        <td> 
                            <!-- body   --> 
                            <div id='body_content'>  
                            <!-- <div id='imgres' style='visibility: visible;'  >  res </div>  --> 
                                <?php 
                                    $modalsc = false; 
                                    $c=0;
                                    for ($i=0; $i < 10 ; $i++) { 
                                            
                                           echo " 
                                            <div id='res_container'>         
                                                <li id='li_res1'>  
                                                    <div id='home_res1' >  ";
                                      
                                                     echo "img$c";
                                        
                                                echo " 
                                                </div> 
                                            </li>
                                            <li  id='li_res2' >

                                                <div id='home_res2' >  "; 
                                                $c++;
                                                 echo "img$c";
                                         
                                                echo " 
                                                </div> 
                                            </li>
                                            <li id='li_res3'>
                                                <div id='home_res3' >  ";
                                                    $c++;
                                                    echo "img$c";
                                       
                                                    echo " 
                                                    </div> 
                                                </li>                                                
                                            </div>
                                            ";
                                        
                                    }
                                ?>
                             </div>  <!-- end body content --> 
                        </td>
                    <tr>
                        <td> footer </td>
                </table>
            </center> 
        </body>
        </html>


  

        <style type="text/css">
            #body_content {  z-index: 99; width: 100%; border: 1px solid #000; margin-left: 5px; /* height: 500px; */position:relative; /* left:-40px*/  /* margin:0 auto;*/}      
                #res_container {  /*border: 1px solid red;*/ /*height: 200px;*/ /*margin-left: 10px;*/}
                    #res_container li { float: left; /*margin-left: 5px;*/  /*padding: 7px;*/  list-style: none; /*border: 2px solid yellow;*/  /*height: 200px; */  }  
                        
                        #li_res1 { /*border: 1px solid green;*/ }
                        #li_res2 { /*border: 1px solid yellow;*/ }
                        #li_res3 { /*border: 1px solid red;*/ } 

                        /* original width of modals container : 285px */


                        #home_res1 { border: 1px solid green;   width:285px;  padding-right: 20px;  }
                            #home_res1 img { cursor: pointer;  /*padding-bottom: 40px;*/ } 
                        #home_res2 { border: 1px solid yellow;  width:285px;  padding-right:  20px;  }
                            #home_res2 img { cursor: pointer;  /*padding-bottom: 40px;*/}
                        #home_res3 { border: 1px solid red;     width:285px;}  
                            #home_res3 img { cursor: pointer;  /*padding-bottom: 40px;*/ }
        </style> 
    <?php } ?>

    





<?php 
    function fblogin( $fb_friends_in_fs ) {?>
      
                 





        <?php
        /** 
         * Copyright 2011 Facebook, Inc.
         *
         * Licensed under the Apache License, Version 2.0 (the "License"); you may
         * not use this file except in compliance with the License. You may obtain
         * a copy of the License at
         *
         *     http://www.apache.org/licenses/LICENSE-2.0
         *
         * Unless required by applicable law or agreed to in writing, software
         * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
         * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
         * License for the specific language governing permissions and limitations
         * under the License.
         * get friend list: https://developers.facebook.com/docs/graph-api/reference/user/friendlists/
         */

          require 'fs_folders/API/facebook-php-sdk-master/src/facebook.php';

        // Create our Application instance (replace this with your appId and secret).
        $facebook = new Facebook(array(
          'appId'  => '528594163842974',
          'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
        )); 

        // Get User ID
        $user = $facebook->getUser(); 
        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.

        if ($user) {
          try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $facebook->api('/me');
            echo "user logon!";
          } catch (FacebookApiException $e) {
            error_log($e);
            $user = null;
            echo "user logout!";
          }
        }

        // Login or logout url will be needed depending on current user state.
        if ($user) {
          $logoutUrl = $facebook->getLogoutUrl(); 
        } else {


          $params = array(
            'scope' =>'ads_management,create_event,create_note,email,export_stream,friends_about_me, 
              friends_activities, friends_birthday, friends_checkins, friends_education_history, friends_events, 
              friends_games_activity, friends_groups, friends_hometown, friends_interests, 
              friends_likes, friends_location, friends_notes, friends_online_presence, 
              friends_photo_video_tags, friends_photos, friends_questions, friends_relationship_details
              friends_relationships, friends_religion_politics, friends_status, friends_subscriptions
              friends_videos, friends_website, friends_work_history, manage_friendlists
              manage_notifications, manage_pages, offline_access, photo_upload, publish_actions
              publish_checkins, publish_stream, read_friendlists, read_insights, read_mailbox
              read_requests, read_stream, rsvp_event, share_item, sms, status_update, user_about_me
              user_activities, user_birthday, user_checkins, user_education_history, user_events
              user_games_activity, user_groups, user_hometown, user_interests, user_likes
              user_location, user_notes, user_online_presence, user_photo_video_tags, user_photos
              user_questions, user_relationship_details, user_relationships, user_religion_politics
              user_status, user_subscriptions, user_videos, user_website, user_work_history
              video_upload xmpp_login', 
            'redirect_uri' => 'http://fashionsponge.com/testPage.php'
          );




          $statusUrl = $facebook->getLoginStatusUrl();
          $loginUrl = $facebook->getLoginUrl($params);
            /* make the API call */
         echo " not login";
        /* handle the result */
        } 
        // This call will always work since we are fetching public data.
        $naitik = $facebook->api('/naitik');

        ?>
        <!doctype html>
        <html xmlns:fb="http://www.facebook.com/2008/fbml">
          <head>
            <title>php-sdk</title>
            <style>
              body {
                font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
              }
              h1 a {
                text-decoration: none;
                color: #3b5998;
              }
              h1 a:hover {
                text-decoration: underline;
              }
            </style>
          </head>
          <body>
            <h1>php-sdk</h1> 
            <?php if ($user): ?>
              <a href="<?php echo $logoutUrl; ?>">Logout</a>
              <a href="logout.php">Logout</a>
            <?php else: ?>
              <div>
                Check the login status using OAuth 2.0 handled by the PHP SDK:
                <a href="<?php echo $statusUrl; ?>">Check the login status</a>
              </div>
              <div>
                Login using OAuth 2.0 handled by the PHP SDK:
                <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
              </div>
            <?php endif ?>

            <h3>PHP Session</h3>
            <pre><?php print_r($_SESSION); ?></pre> 
            <?php if ($user): 
            ?>
              <h3>You</h3>
              <img src="https://graph.facebook.com/<?php echo $user; ?>/picture"> 
              <h3>Your User Object (/me)</h3>
              <pre><?php 
                    

                    print_r($user_profile); 

                ?></pre>
              

                <h1> scope  </h1>

                <?php 

                    echo 'email = '.$user_profile['email']."<br>";
                     
                ?>
         <?php 
              // $friendlistsGroup = $facebook->api('/me/friends');
            
            echo "<h1> friend list group </h1>";
            // print_r( $friendlistsGroup);

             // $user_profile = $facebook->api('/me');
              $friends = $facebook->api('/me/friends');
 

                // $fb_friends_in_fs = array(505457421,549151146 ,549294216 ,553913643 ); 
                // echo "<br> fb friends on fs <br>";
                // print_r($fb_friends_in_fs)
                // echo "<br> fb friends on facebook not yet on fs  <br>";
                // print_r($fb_friends_in_fs); 
              /*

                echo "<br><br> array <br>";
                  print_r($friends['data']);


*/

                  echo " <br><br> not array text";


                $frnds = $friends['data'];
                for ($i=0; $i < count($friends['data']) ; $i++) { 
                    $fb_all_freinds .=$frnds[$i]["id"]."kjl".$frnds[$i]["name"]."kjl";
                } 




                // echo "  $fb_all_freinds <br><br><br><br>";
                $mno = 133;   

             $b = mysql_query(" UPDATE fs_members SET fb_all_freinds = 'jesus erwin suarez gwapo kaau.'  WHERE mno = $mno ");
              if ($b) {
                echo " updated ";
              }else{
                echo " not updated ";
              } 



                echo " total friends are = ".count($friends['data'])."<br>";
                  echo '<ul>';
                  $c=0;
                  foreach ($friends["data"] as $value) {
                    $c++; 
                    if ( $c < 10 ) {
                        $fbfid = $value["id"];
                        if ( in_array($fbfid, $fb_friends_in_fs)) { 


                              echo '<li>';
                                echo " <h4> friend is on fashionsponge </h4>";
                                echo '<div class="pic">';
                                echo '<img src="https://graph.facebook.com/' . $value["id"] . '/picture"/>';
                                echo '</div>';
                                echo '<div class="picName">'.$value["name"].'</div>'; 
                                echo '<div class="picName">'.print_r($value).'</div>'; 
                                echo '</li>';   
                                 echo "<hr>";
                        }else{
                              echo '<li>';
                               echo " <h4> friend is on facebook </h4>";
                              echo '<div class="pic">';
                              echo  "<img src='https://graph.facebook.com/$fbfid/picture'/>";
 
                              
                                #big profile pic. 
                                $size = 'large';
                                $url = "http://graph.facebook.com/$fbfid/picture?type=$size"; 
                                $headers = get_headers($url, 1); 
                                if( isset($headers['Location']) ){  
                                    $bigpicurl = $headers['Location']; // string
                                }else{
                                    echo "ERROR";
                                } 
                                echo "<img src=\"$bigpicurl\"  />"; 

                                


                              echo '</div>';
                              echo '<div class="picName">'.$value["name"].'</div>'; 
                              echo '<div class="picName">'.print_r($value).'</div>'; 
                             
                                echo " 
                                  <input type='button' value='invite friend'  style='background-color:blue;padding:5px;border:none;color:#fff;cursor:pointer'   onclick=\"invite_fb_friend( '$fbfid' )\"  />  
                                 "; 
                            echo '</li>';  
                               echo "<hr>"; 

                        } 
                    }


                  }
                  echo '</ul>'; 



            ?>























            <?php else: ?>
              <strong><em>You are not Connected.</em></strong>
            <?php endif ?>
 















 

        <script type="text/javascript"> 
            function invite_fb_friend ( fbid ) {
                 alert(fbid);
                 FB.ui({method: 'apprequests',
                    title: 'Friend Smash Challenge!',
                    to: fbid,
                    message: 'I just smashed   friends! Can you beat it?',
                }, fbCallback);
            } 


              function invite(to) {
                FB.ui({
                  method: 'send',
                  name: "please vote for me",
                  link: 'http://fashionsponge.com/fs',
                  picture:"http://fashionsponge.com/fs/images/FSlogo.jpeg",
                  to:to,
                  description:'A designers closeth...'
                });
              }
              function invites(){
                FB.ui({
                  method: 'apprequests',
                  name: "please vote for me",
                  link: 'http://fashionsponge.com/fs',
                  picture:"http://fashionsponge.com/fs/images/FSlogo.jpeg",
                  description:'A designers closeth...'
                });
              }



        </script> 

        <input type="button" value="invite friends" onclick="invite('123123')" /> 

          </body>
        </html> 



    <?php
    }
    
?>  




    


    <?php 
        function popup_continues_counter( ) { 
    ?>

        <script type="text/javascript"> 
            // sessionStorage.popupcounter=1;   
            
            // var c = sessionStorage.popupcounter  
            // alert("c = "+c);  




            $(document).ready(function( ) {
            var a = sessionStorage.popupcounter;
            $("#resss").text(a);


            if (a == "NaN") {
                alert("sesssion is initialize")
            }else{
                alert("sessionStorage is not initialize !")
            }


                // autopopupcounter( );
                // function autopopupcounter( ) {
                //     setTimeout(function() { 
                //         popupcounter( );
                //     },1000);
                // }
                // function popupcounter( ) {
                //     var a = sessionStorage.popupcounter;
                //     if ( a < 0 ) {
                //         sessionStorage.popupcounter = 0;
                //     } 
                //     sessionStorage.popupcounter++; 
                //     var c = sessionStorage.popupcounter; 
                //     if ( c < 5 ) {
                //         autopopupcounter( );
                //     }else{
                //         alert("counter is 5 = "+c)
                //     }
                // }
            })
        </script> 



        <div id='resss' > 
            res
        </div>



    <?php     
    }

?>




<?php 

    function FunctionName( ) {
?>
    
    
    <a name="fb_share"> share to fb </a>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"
    type="text/javascript">
    </script>


    <a href="https://twitter.com/share"
    class="twitter-share-button" data-count="vertical"
    data-via="YOUR TWITTER USERNAME">Tweet</a>
    <script type="text/javascript"
    src="//platform.twitter.com/widgets.js">
    </script>










<?php 

    // $headers  = "From: $from\r\n"; 
    // $headers .= "Content-type: text/html\r\n"; 
    // mail($to, $subject, $body, $headers); 

    } 

?>




    <?php 
        function autoupload( ) { 
    ?>  


        <input type=file id="f_image" name="f_image" runat="server" style="display:none;"  />
        <img id='img_prev' src="images/blank.jpg" style="height:300px" /> 
        <button onclick="$('#f_image').click();">Browse</button>
        <script type="text/javascript"> 





        
            var img_prev = "#img_prev";
            var uploadFile = "f_image"; 
            $("#"+uploadFile).change(function () {
                var fileObj = this,
                    file; 
                if (fileObj.files) {
                    file = fileObj.files[0];
                    var fr = new FileReader;
                    fr.onloadend = changeimg;
                    fr.readAsDataURL(file)
                } else {
                    file = fileObj.value;
                    changeimg(file);
                }
            }); 
            function changeimg(str) {
                if(typeof str === "object") {
                    str = str.target.result; // file reader
                }
                $(img_prev).attr("src",str); 
            }
 
        </script> 
         
    <?php 
        } 

    ?>
















<?php 
    function uploadfilebutton( ) { ?>
    <input id="myFile" name="file" type="file" style="position:absolute;left:-10000px;top:-10000px;"> 
    <button onclick="$('#myFile').click();">Browse</button>


 


    <?php
    }

?>
    



        <?php 
    function getBrowser() { 
        $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        } 
        elseif(preg_match('/Chrome/i',$u_agent)) 
        { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        } 
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 
        elseif(preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        } 
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    //     // now try it
    // $ua=getBrowser();
    // $yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
    // print_r($yourbrowser);
    } 
   
        ?>


    <?php 
        function inviteresponsepopup( $mc ) {
                $invited_fn = 'jesus Erwin Suarez';
                $Tpeopl_in_front = 100;
                $people_behind_you = 200; 
                ?> 
                    <div id='invite-popup-response-wrapper' > 
                        <div id='invite-popup-response-wrapper-body' > 
                            <center>
                                <div id='invite-popup-response-wrapper-content'>  
                                    <div  id='invite-popup-response-wrapper-content-right' > 

                                        <div id='invite-popup-response-wrapper-content-right-content' >  
                                            <table border="0" cellspacing="0" cellpadding="0" > 
                                                <tr> 
                                                    <td id='invite-popup-response-wrapper-content-right-content-title1' > 
                                                        <!-- <center> -->
                                                            <span> HELP SPREAD THE WORD  </span>
                                                        <!-- </center>  -->
                                                    </td>
                                                <tr> 
                                                    <td id='invite-popup-response-wrapper-content-right-content-desc' >  
                                                        <span>  
                                                               If you know of anyone who would love to get their place in line next to you, send them an invite  now by clicking the share buttons below.
                                                        </span>
                                                    </td>
                                                <tr> 
                                                    <td id='invite-popup-response-wrapper-content-right-content-title2' >  
                                                        <center>
                                                            <span> 
                                                                SHARE  
                                                            </span>
                                                        </center>
                                                    </td>
                                                <tr> 
                                                    <td id='invite-popup-response-wrapper-content-right-content-share' >  
                                                        <center>
                                                            <table border="0" cellpadding="0" cellspacing="0" > 
                                                                <tr> 
                                                                    <td>     
                                                                        <img title=""  src='<?php echo "$mc->genImgs/white-facebook-icon.png"; ?>'    onclick="share_fb_specifi_page( 'http://fashionsponge.com/invite' )"    > 
                                                                    </td>
                                                                    <td> 
                                                                        <img title=""  src='<?php echo "$mc->genImgs/white-twitter-icon.png"; ?>'     onclick="share_twitter_specifi_page( 'http://fashionsponge.com/invite' )" > 
                                                                    </td>
                                                                    <td> 
                                                                        <img title=""  src='<?php echo "$mc->genImgs/white-tumblr-icon.png"; ?>'      onclick="share_tumblr_specifi_page( 'http://fashionsponge.com/invite' )" > 
                                                                    </td>
                                                                    <td> 
                                                                        <a href="https://plus.google.com/share?url={http://fashionsponge.com/invite}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                                                            <img title=""  src='<?php echo "$mc->genImgs/white-google-plus-icon.png"; ?>' > 
                                                                        </a>
                                                                    </td>
                                                                    <td> 
                                                                        <img title=""  src='<?php echo "$mc->genImgs/white-email-icon.png"; ?>'       onclick="share_email_specifi_page( 'http://fashionsponge.com/invite' )" > 
                                                                    </td> 
                                                            </table>
                                                        </center>
                                                    </td>
                                                <tr> 
                                                    <td> 
                                                        </center>
                                                            <a href="/">
                                                                <input id='invite-popup-done' type="submit" value="DONE"  />
                                                            </a>
                                                        <center>
                                                    </td>
                                            </table> 
                                        </div> 
                                    </div> 
                                    <div id='invite-popup-response-wrapper-content-left' >
                                        <br><br>
                                        <p> 
                                             Hi  <span> <?php echo ucfirst($invited_fn); ?></span>,  
                                        </p>  
                                        <p> 
                                            Thank you for signing up for an invite. 
                                        </p> 
                                        <p> 
                                            Please go and check your email for the welcome message I just sent you. If you don't see it in
                                            your inbox check your spam folder.
                                        </p>

                                        <p> 
                                            by the way There are <span id='bold_red'> <?php echo $Tpeopl_in_front; ?> </span> people ahead of you and <span id='bold_red'> <?php echo $people_behind_you ; ?> </span> people behind you. Once we start sending out 
                                            invitations to join, you will receive your invite in the order you signed up.
                                        </p>  
                                        <p>
                                            Thanks, 
                                        </p>  
                                        <p>
                                            <span>
                                                Maurico - Founder & Creative Director <br>
                                                "Don't Just Dress. Dress Well.&#153;" 
                                            </span>
                                        </p>
                                        <div id='inviteFriendsC' > 
                                            <div id='invite_ur_friends' >  
                                                <span>
                                                    <!-- INVITE YOUR FRIENDS -->
                                                </span>
                                            </div>  
                                        </div> 
                                    </div> 
                                </div> 
                            </center>
                        </div>
                    </div>  
                    <style type="text/css"> 
                         /* MisoRegular */
                         /* MisoLight */
                         /* MisoBold */  
                        body { padding: 0px; margin:0px;  }
                        #invite-popup-response-wrapper{   /*border: 1px solid red;*/  text-transform:uppercase; font-family: 'arial'; font-size: 12px; font-weight: bold;  }
                            #invite-popup-response-wrapper-body { margin: auto;  background-color: #fff; width: 980px; border: 8px solid #1a386a; padding-top:20px;padding-bottom:20px;   }
                                #invite-popup-response-wrapper-content {  padding: 20px;  text-align: left; background-color: #f5f4f1; width: 900px; }
                                    #invite-popup-response-wrapper-content img { cursor: pointer; } 
                                    #invite-popup-response-wrapper-content-left { /*border: 1px solid #000;*/ width: 460px; height: 370px;  color: #1a386a; font-size: 13px;   }
                                        #invite-popup-response-wrapper-content-left p { padding-bottom: 10px; }
                                        #bold_red {  color: #ac1c22; }
                                    #invite-popup-response-wrapper-content-right {  -moz-box-shadow:  5px 5px 0px #ccc; -webkit-box-shadow: 5px 5px 0px #ccc; box-shadow: 5px 5px 0px #ccc; /*border: 1px solid #000;*/ float: right; width:400px; /*height: 200px; */ padding-right: 20px; }
                                   #invite-popup-response-wrapper-content-right span { color: #fff; } 
                                    #invite-popup-response-wrapper-content-right-content { width:390px;padding-left: 15px;    padding-right: 15px;padding-top: 30px;padding-bottom: 30px; border: 1px solid #000; background-color: #1a386a; /* height: 200px; width: 200px;*/ }
                                    #invite-popup-response-wrapper-content-right-content-title1 { padding-bottom: 20px; }
                                        #invite-popup-response-wrapper-content-right-content-title1 span { font-size: 48px; font-family: 'MisoRegular' }
                                     #invite-popup-response-wrapper-content-right-content-desc { padding-bottom: 30px; }
                                        #invite-popup-response-wrapper-content-right-content-desc span {  }
                                    #invite-popup-response-wrapper-content-right-content-title2 { padding-bottom: 10px; }
                                        #invite-popup-response-wrapper-content-right-content-title2 span { font-size: 30px; font-family: 'MisoRegular'   }
                                    #invite-popup-response-wrapper-content-right-content-share { padding-bottom: 20px; }
                                        #invite-popup-response-wrapper-content-right-content-share td { padding-left: 15px;}
                                        #invite-popup-response-wrapper-content-right-content-share  img { /*border: 1px solid #000;*/ } 
                                        #invite-popup-done { border:none; cursor: pointer;  background: url("fs_folders/images/attr/submit.png") no-repeat scroll 0 0 transparent;   font-weight: bold; background-size: 100% auto; padding-bottom: 5px; position: relative;  z-index: 100;  width: 97.5%; height: 35px;     border-radius: 5px;  color: #ffffff;  font-weight: bold;  font-size: 11px;  font-family: 'arial';  letter-spacing: 2px;   margin-left: -2px; } 
                    </style> 
                <?php 
        } 
    ?>

         


        <?php 
        function popupinvite( $mc  ) {
             require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');
        } ?>



    <?php 
        function modoulo_result( $r ) {
           
            // print_r($r);

            $tr = count($r);
            echo " tr $tr ";
            // $c = 0; 
            // $i=0;
            // while ($i <= $tr) {
                    
            //     $i+=12;
            //     $c++;
            // } 
            $c = $tr/12; 
            $c = intval($c);
            echo "c = $c "; 
            $mr = $c*12;
            echo " $mr"; 
            if ( $mr < $tr ) {
                 $c++;
            } 
            echo " final c = $c "; 

        } 
    ?>
 


<?php 
    function modals  ( $mc , $plno  ) {    ?>

     <link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modals_general.css" >
                    <script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
                    <script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script>
      
      <?php


        $mc->modals_look  ( $plno );       
    }
?> 

<?php 
    function  next_numbers() {
        
        echo " <span> < </span> ";

            $page_total = 10; 
            $c=0;
            for ($i=0; $i < 10 ; $i++) { 
                $c++;
                 echo "<span id='page' class='page$c' title='page $c' onclick=\"activity_next_page('$c','$page_total')\" > $c </span>";
            } 
        echo " <span> > </span> "; 

     ?>


    <style type="text/css">
        #page { color: #cccbc9; cursor: pointer; }
        #page:hover { color: #ac1c22; cursor: pointer; } 
    </style> 


    
    <script type="text/javascript">
         function activity_next_page(pagenum , pt ) {    
                // alert("next page.. "+pagenum)  
                for (var i = 1; i <= pt; i++) {
                     $(".page"+i).css({"color":"#cccbc9"});    
                }; 
                $(".page"+pagenum).css({"color":"#ac1c22"});   
         }
     </script>



    <?php 

    }
?> 



<?php 
    function knobjquery () {   ?>

        <script type="text/javascript" src='fs_folders/js/knob.js' ></script>  
        <input type="text" value="75" class="dial" data-fgColor="#ac1c22" > 
        <span> % </span> 
        <script>
            $(function() {
                $(".dial").knob({
                    'min':0,
                    'max':100,
                    'readOnly': true,
                    'width': 100,
                    'height':100,
                    'fgColor': '#ac1c22',
                    'dynamicDraw': true,
                    'thickness': 0.2,
                    'tickColorizeValues': true,
                    'data-skin':'tron',
                    'bgColor':'#c8c4c1',

                })         
            });
        </script> 

 


<?php 
    }
?>



    <?php 
        function multiple_form( )
        { 



           
            for ($i=0; $i < 3 ; $i++) {  
                echo " <form method='GET' action='$_SERVER[PHP_SELF]' >  
                    <input type='text' name='field1$i' /><br>
                    <input type='text' name='field2$i' /><br>
                    <input type='text' name='field3$i' /><br>
                    <input type='text' name='field4$i' /><br>   
                    <input type='submit' name='submit1$i' /><br>   
                </form> ";
                 
            }
        }

    ?>





    <?php 


        function detect_key_pressed_in_page( ) { 
           



            $r = array(
                0=>array("plno"=>00),
                1=>array("plno"=>11),
                2=>array("plno"=>22),
                3=>array("plno"=>33),
                4=>array("plno"=>44),
                5=>array("plno"=>55),
                6=>array("plno"=>66),
                7=>array("plno"=>77),
                8=>array("plno"=>88),
                9=>array("plno"=>99),
                10=>array("plno"=>1010),
                11=>array("plno"=>1111),
            );
            print_r($r); 
            echo "<br>"; 
            echo"<div id='plnos'>";
            for ($i=0; $i < count($r) ; $i++) { 
                $plno = $r[$i]["plno"];
                 // echo " $i .) ".$r[$i]["plno"]."<br>";

                echo $plno."-";
            }
            echo "</div>";
            echo "<div id='current_look_viewed'>2</div>";
            echo " <div id='res' >0</div>";

            ?>
        
            <script type="text/javascript">



                $(document).ready(function ( ) {

                    var plnos= $("#plnos").text();
                    // alert(plnos);
                    var a = plnos.split("-");
                    var tlook = a.length-1;  
                    var c = 0;
                    
                    // var c = 0;
                    // alert(c);
                    for (var i = 0; i < tlook; i++) {
                        // alert(" c ="+i+" "+a[i]+"total look "+tlook);
                    }; 
                    $(window).keyup(function( ) { 
                          //current key of look  
                        if(event.keyCode == 39) { // down key 
                            c = $("#current_look_viewed").text();
                            alert("from index = "+c)
                            c++;    
                            if ( c >  tlook-1 ) {
                                c = 0;
                            }


                            $("#res").text(" arrow right 39 c = "+c+" tlook = "+tlook+" plno = "+a[c]); 
                            $("#current_look_viewed").text(c);
                        }else if ( event.keyCode == 37 ) {  

                            c = $("#current_look_viewed").text();
                            alert("from index = "+c)
                            c--;

                            if ( c < 0 ) {
                                c = tlook-1;
                            } 
                            $("#res").text("arrow left 37  c = "+c+" tlook = "+tlook+" plno = "+a[c]); 
                            $("#current_look_viewed").text(c); 
                        } 
                         // alert( "Handler for .keydown() called." );
                    });                 
                })

            </script>
            <style type="text/css"></style>















            <?php 
        }


        function db_result_next_prev( $id , $res=null   ) { 
            $limit = 10;
            $looks = $mc->get_all_latest_look( 
                $limit 
            );  
            $current_viewed_look = $id;  
            $looks = $res;  
            $r['current'] = $id;
            for ($i=0; $i < count($looks) ; $i++) {  
                echo "$i. ) ".$looks[$i]["plno"]."<br>";  
            }
            // $current_viewed_look = 193;
            echo "current look  $current_viewed_look <br>";
            for ($i=0; $i < count($looks) ; $i++) { 

                // echo $looks[$i]["plno"]."<br>";
                if ( $current_viewed_look == $looks[$i]["plno"] ) {
                    echo " $i <br>";
                    $i++;
                    if ( $i == count($looks)) { 
                        echo " next "; 
                        echo " next look = ".$looks[0]["plno"]."<br>"; 
                        $r['next']  = $looks[0]["plno"]; 
                    } else { 
                        echo " next look = ".$looks[$i]["plno"]."<br>";  
                        $r['next']  = $looks[$i]["plno"]; 
                        // $r['current'] = 
                        // $r['next']  = 
                        // $r['prev'] =  
                    } 
                    $i-=2; 
                    if ( $i < 0 ) {
                        $i = count($looks)-1;
                    } 
                    echo " prev look = ".$looks[$i]["plno"]."<br>"; 
                    $r['prev'] = $looks[$i]["plno"]; 
                     return $r; 
                }
            } 
        }
    ?>

    <?php function image_mouse_over_image_zoom( $mc ) {
       ?>


        <!DOCTYPE html>
        <html>
        <head>
           <title> zoom when mouser over to image  </title> 

          <script type="text/javascript">
                jQuery(function($) {
                    var currentMousePos = { x: -1, y: -1 };
                    $(document).mousemove(function(event) {


                        var screen_width =  $(this).width();
                        var x = event.pageX;
                        var y = event.pageY;
                        // x=x+10;
                        y=y-230; 
                        var screen_half = screen_width / 2; 
                        var s = "";
                        // $("#").

                        var p = $("#follow_div");
                        var position = p.position();
                        // position.top
                        // position.left 
                        if (x < screen_half) {
                            // alert("lessthan half");  
                           // if( x < 200 )  {  
                                x = x+10;    
                                s = "less than 20 "; 
                            // }else{ 
                            //       x= x-225;
                            //        s = "lessthan center"; 
                            // } 
                        }else { 
                            // screen_half_revert_pos = screen_half+300; 
                            // if( x < screen_half_revert_pos )  {  
                            //     x = x+10;  
                            //     s = "less than 20 "; 
                            // }else{ 
                                  x= x-246; 
                                  s = "lessthan center"; 
                            // } 
                            // x= x+10;
                            // s = "greeterthan center"; 
                            // alert("greeterthan half");
                        }
                        $("#x_and_y_axis").text("x = "+x+" y = "+y+" center = "+screen_half+" stat center = "+s+" follow_div x = "+position.left+" y = "+position.top);
                        $("#follow_div").css({"margin-top":y,"margin-left":x}); 
                    });   

                }); 
                function mouse_enter( follow_div , plno ) {   
                    $(follow_div).css({"display":"block"});
                    // $(follow_div).fadeIn("fast");
                    $("#thumbnail_overview").attr('src','fs_folders/images/uploads/posted looks/home/'+plno+'.jpg'); 
                }
                function mouse_out ( follow_div ) {
                    $(follow_div).css({"display":"none"}); 
                } 

            </script> 
            <style type="text/css"> 
                #follow_div { position: absolute; /*border: 2px solid #1a386a; border-radius: 5px;*/ width: 200px; /*height: 200px;*/ /*display: none; */z-index: 100;  }    
                #follow_div img { width: 220px; /*height: 200px;*//* border-radius: 5px;*/ border-radius: 5px;  border: 2px solid #1a386a; }
            </style> 



        </head>
        <body>   
            <div id='x_and_y_axis'> 
                x and y axis.
            </div>   
            <div id="follow_div" >  
                <img id="thumbnail_overview" src="<?php echo  "$mc->look_folder_thumbnail/22.jpg";   ?>"  > 
            </div>  
            <br><br><br><br><br><br><br><br><br><br> 
            <div id="body_content" > 
                <img id="thumbnail204" src="<?php echo  "$mc->look_folder_thumbnail/204.jpg";   ?>" onmousemove="mouse_enter('#follow_div','204')" onmouseout="mouse_out('#follow_div')"  >
                <img id="thumbnail197" src="<?php echo  "$mc->look_folder_thumbnail/197.jpg";   ?>" onmousemove="mouse_enter('#follow_div','197')" onmouseout="mouse_out('#follow_div')">
                <img id="thumbnail175" src="<?php echo  "$mc->look_folder_thumbnail/175.jpg";   ?>" onmousemove="mouse_enter('#follow_div','175')" onmouseout="mouse_out('#follow_div')" >
            </div>
 
        <?php 
    } ?>






    <?php function mouse_move_get_x_and_y_axis( )  {  ?> 
            <div id='x_and_y_axis'> 
                x and y axis.
            </div> 
             <script type="text/javascript"> 
                jQuery(function($) {
                    var currentMousePos = { x: -1, y: -1 };
                    $(document).mousemove(function(event) {
                        var x = event.pageX;
                        var y = event.pageY;
                         $("#x_and_y_axis").text("x = "+x+" y = "+y);
                    }); 
                }); 
             </script>

    <?php }  ?>


























    <?php 
          function tumblr_share( ) {
          

    ?>  



        <a href="http://tumblr.com/share?s=&v=3&t=[Share Name Title/PHP ECHO Share Name Title]&u=[URL/PHP ECHO URL]"> share tumblr </a>
        

    <?php } ?>




<?php 
    
    function google_plus_share() { ?>

   

        <a href="https://plus.google.com/share?url={http://fashionsponge.com/lookdetails?id=204}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> share google+</a> 

         <?php
    }
?>



<?php 
    function tumblr( ) {?>
         <script type="text/javascript" 
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
            <script> 
                $(document).ready(function() { 
                // 
                $('a.poplight[href^=#]').click(function() { 
                var popID = $(this).attr('rel'); //Get Popup Name 
                var popURL = $(this).attr('href'); //Get Popup href to define size 
                var query= popURL.split('?'); 
                var dim= query[1].split('&'); 
                var popWidth = dim[0].split('=')[1]; //Gets the first query string value 
                $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="http://png.findicons.com/files/icons/1714/dropline_neu/24/dialog_close.png" class="btn_close" title="Close" alt="Close" /></a>'); 
                var popMargTop = ($('#' + popID).height() + 80) / 2; 
                var popMargLeft = ($('#' + popID).width() + 80) / 2; 
                //Apply Margin to Popup 
                $('#' + popID).css({ 
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft 
                }); 
                $('body').append('<div id="fade"></div>');
                $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) 
                return false; 
                }); 
                $('a.close, #fade').live('click', function() { 
                $('#fade , .popup_block').fadeOut(function() { 
                $('#fade, a.close').remove(); //fade them both out 
                }); 
                return false; 
                }); 
                }); 
            </script> 
         <?php
    }

?>



<?php 
      function detect_height_of_screen_and_resize_windows( )
    { ?>

        <div id='res' > res  </div>
        <script type="text/javascript">
            win = new Object();   



            // window height = 353 width = 731
            // window height = 412 width = 853
            // window height = 494 width = 1024 standard window size.
            // window height = 562 width = 1164
            // window height = 618 width = 1280
            // window height = 687 width = 1422
            // window height = 824 width = 1707
            // window height = 928 width = 1922
            // window height = 1236 width = 2560



            $(window).ready(function ( ) {
                 win.gitason  = $(window).height(); 
                 win.gilapdon = $(window).width();
                $("#res").text(  " window height = "+win.gitason+" width = "+win.gilapdon); 
            })   
            $(window).resize(function() { 
                 win.gitason  = $(window).height(); 
                 win.gilapdon = $(window).width();
                $("#res").text(  " window height = "+win.gitason+" width = "+win.gilapdon); 
            }); 
        </script>
        <style type="text/css"></style>




        <?php 
    }
    
?>


<?php 
    function scrollTop_detect( ) { ?>
        
        <div id='scrollDetect'> 

        1 <br>22<br> 3 4 <br>5 6<br>67 <br>fsdf<br>ww ww<br>wad<br><br>fsdf<br>ww<br>wad<br><br>67 <br>fsdf<br>ww<br>wad<br><br>fsdf<br>ww<br>wad<br><br>67 <br>fsdf<br>ww<br>wad<br>

        </div>
        <div id='res' > res </div>
         
         <script type="text/javascript">
                var some_number = 60;
                $("#scrollDetect").scroll(function() {
                var height = $(this).scrollTop();
               
                $("#res").text("scrolled"+height);

                if(height  == some_number) {
                    
                }


                jQuery( function($) {
                    $('#scrollDetect').bind('scroll', function() {

                        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                         $("#res").text(" end readched please wait, reload new images.......");
                       
                        }else { 
                            $("#res").text(" not reached in the buttom.. ");

                        }
                    }) 
                }
            );



        });
         </script>   

         <style type="text/css">
            #scrollDetect { border: 1px solid #000; width: 200px; height: 100px; overflow-y: scroll  }
         </style>

         


        <?php 
    }

?>

    <?php 
        function wordwrap_string( ) {
          
        

            $myString = "hahahahahahahahahahahahahahahahahahaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
            $myString = wordwrap($myString, 24, "<br />", true);
            echo $myString;
             ?> 

                <div id="container" >  
                    1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
                </div>


                <script type="text/javascript"></script>
                <style type="text/css">
                    #container {  

                        width: 200px; background: gold; word-wrap: break-word; 
                    }

                </style>


             <?php  
             
        }

    ?>
 
<?php 
function arrange_picture_thumbnail(  )
{  
   

    ?>  
                <table border="1" > 
                    <tr> 
                        <td>  
                            <div id='body_content'>   
                                <div id='res_container'>   
                                    <?php 
                                        $c=0;
                                        for ($i=0; $i < 10 ; $i++) { 
                                            $c++;
                                            echo "  
                                                <li id='li_res$c'>  
                                                    <div id='home_res$c' >  
                                                        $c
                                                    </div>
                                                </li>
                                            ";
                                        }
                                    ?>                                      
                                </div>
                            </div>   
                        </td> 
                </table>  
    <style type="text/css">  
    #body_content {  z-index: 99; width: 100%; position:relative; }      
        #res_container {  }
            #res_container li {float: left; list-style: none; }  
                #res_container li { width:55px; }
                #res_container li div { border: 3px solid green; width:80px;   }
                #res_container li div  img { cursor: pointer;    } 
    </style> 



    <script type="text/javascript">  
        lookdetails_thumbnail( "lookdetails_thumbnail" , "fs_folders/modals/lookdetails/lookdetails_modals.php" , "load" ); 
    </script> 







    <?php 
}
?> 

<?php   
  function lookdetails_dropdown_share_icons( ) { 
       $r["lookName"] = "jesus erwin suarez ";
       $r[0] = 1;

 
    ?>



                <script type="text/javascript">




                alert("js")
                // function shareFB(){
                //  FB.ui(
                //    {
                //      method: 'feed',
                //      name: '<?php echo $r["lookName"]; ?>',
                //      link: 'http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>',
                //      picture: 'http://fashionsponge.com/fs/images/members/posted looks/<?php echo $r[0]; ?>_large.jpg',
                //      caption: 'fashionsponge.com',
                //      description: '<?php echo $r["lookAbout"]; ?>'
                //    },
                //    function(response) {
                //      if (response && response.post_id) {
                //          //posted
                //      } else {
                //        //not posted
                //      }
                //    }
                //  );
                // }
                 // alert("fb share clicked ")

                // function shareFB(){
                    // alert("fb share clicked ")
                    // FB.ui({
                    //    method: 'feed',
                    //    link: 'https://developers.facebook.com/docs/dialogs/',
                    //    caption: 'An example caption',
                    //  }, function(response){});
                // }
            </script>

             <!-- fb share -->

                <?php 
                    $plno = 1;
                ?>
                <div id="fb-root"></div> 
                <script src="http://connect.facebook.net/en_US/all.js"></script>
                <script> 


                    function fbshare( ) {
                        // var plno = "<?php echo $plno ?>";
                        // alert(plno);
                         FB.init({ 
                            appId:'528594163842974', cookie:true, 
                            status:true, xfbml:true 
                         });  
                         FB.ui({ method: 'feed', 
                            message: 'Facebook for Websites is super-cool',
                            name: 'Facebook Dialogs',
                            link: 'http://fashionsponge.com/lookdetails?id=191',
                            picture: 'http://fashionsponge.com/fs_folders/images/uploads/posted looks/home/191.jpg',
                            caption: 'This is a look Name',
                            description: 'Fashionsponge allways make you happy...' 
                        }); 
                    }
                    function twshare ( ) {
                        alert("share twiter");
                        PopupCenter('http://twitter.com/share?text=<?php echo str_replace($t,$v,$r["lookName"]); ?>\n','',660,330);
                    } 
                </script>  
                <script type="text/javascript" src="http://platform.tumblr.com/v1/share.js"></script> 
                <table width=100% class="share">
                    <td>
                        <script>
                            function shareAnywhere(){
                                alert("This feature is under construction");
                            }
                        </script>
                        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
                        
                        <br><br>
                        <?php
                            
                            $tweet_results = file_get_contents("http://urls.api.twitter.com/1/urls/count.json?url=http://fashionsponge.com/fs/lookdetails.php?id=".$r[0]);
                            $tweet_array = json_decode($tweet_results, true);
                            $tweet_count =  $tweet_array['count'];
                            
                            $url = urlencode($url);
                            $twitterEndpoint = "http://urls.api.twitter.com/1/urls/count.json?url=http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
                            $fileData = file_get_contents(sprintf($twitterEndpoint, $url));
                            $json = json_decode($fileData, true);
                            unset($fileData);
                            
                            
                            $source_url = "http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
                            $url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
                            $xml = file_get_contents($url);
                            $xml = simplexml_load_string($xml);
                            /*
                                echo "Share --- ".$shares = $xml->link_stat->share_count;
                                echo "<br/>";
                                echo "Like --- ".$likes = $xml->link_stat->like_count;
                                echo "<br/>";
                                echo "Comments ---".$comments = $xml->link_stat->comment_count; 
                                echo "<br/>";
                                echo "Total --- ".$total = $xml->link_stat->total_count;
                                echo "<br/>";
                                echo $max = max($shares,$likes,$comments);
                            */
                            
                            $url = "http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
                            $ch = curl_init();  
                            curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));    
                            $curl_results = curl_exec ($ch);
                            curl_close ($ch);
                            $parsed_results = json_decode($curl_results, true);  
                            //echo $parsed_results[0]['result']['metadata']['globalCounts']['count'];
                            
                            $t=array("'", "\"");
                            $v=array("\'", "\\\"");
                            
                        ?>
                        <div>
                            <span><div><p><?php echo $shares = $xml->link_stat->share_count; ?></p></div></span>
                            <input type=image value='FB Share' src="images/buttons/fb-share.png" onclick="PopupCenter('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo str_replace($t,$v,$r["lookName"]); ?>&p[summary]=test&p[url]=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&p[images][0]=http://fashionsponge.com/fs-contest/images/members/posted looks/<?php echo $r[0]; ?>.jpg&p[via]=FashionSponge','',660,330);" />
                        </div>
                        <br><br><br>
                        <div>
                            <span ><div><p><?php echo $tweet_count; //$json["count"]; ?></p></div></span>
                            <input onclick="PopupCenter('http://twitter.com/share?text=<?php echo str_replace($t,$v,$r["lookName"]); ?>\n','',660,330)" type=image value='Tweet' src="images/buttons/tweet.png" />
                        </div>
                        <br><br><br>
                        <div>
                            <span ><div><p>0</p></div></span>
                            <input onclick="PopupCenter('http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ffashionsponge.com%2Ffs%2Flookdetails.php?id=<?php echo $r[0]; ?>&media=http%3A%2F%2Ffashionsponge.com%2Ffs%2Fimages%2Fmembers%2Fposted%20looks%2F<?php echo $r[0]; ?>.jpg&description=<?php echo str_replace($t,$v,$r["lookName"]); ?>','Pinit',660,330)" type=image value='Pinit' src="images/buttons/pinit.png" />
                        </div>
                        <br><br><br>
                        
                        <div>
                            <span ><div><p>0</p></div></span>
                            <div id="footer"></div>
                        </div>
                        
                        <a href="http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $_GET["id"]; ?>" id="click_thru" target="_blank"></a>
                        <script type="text/javascript">
                            var tumblr_photo_source = document.getElementById("imgTag").src;
                            var tumblr_photo_caption = document.getElementById("td_lookName").innerHTML;
                            var tumblr_photo_click_thru = document.getElementById("click_thru").href;
                            
                            var tumblr_button = document.createElement("a");
                            tumblr_button.setAttribute("href", "http://www.tumblr.com/share/photo?source=" + encodeURIComponent(tumblr_photo_source) + "&caption=" + encodeURIComponent(tumblr_photo_caption) + "&click_thru=" + encodeURIComponent(tumblr_photo_click_thru));
                            tumblr_button.setAttribute("title", "Share on Tumblr");
                            tumblr_button.setAttribute("style", "display:inline-block; text-indent:-9999px; overflow:hidden; width:65px; height:20px; background:url('images/buttons/thumbler.png') top left no-repeat transparent;");
                            tumblr_button.innerHTML = "";
                            document.getElementById("footer").appendChild(tumblr_button);
                        </script>
                        
                        <br><br><br>
                        <div>
                            GOOGLE PLUS..
                            <span ><div><p><?php echo $parsed_results[0]['result']['metadata']['globalCounts']['count']; ?></p></div></span>
                            <input onclick="PopupCenter('https://plus.google.com/share?&url=http://fashionsponge.com/lookdetails.php?id=<?php echo $plno; ?>.jpg&title=<?php echo "hello"; ?>','Share to Google +',460,450)" type=image value='Google+' src="images/buttons/google+.png" />
                            
                        </div>
                        <br><br><br>
                        <div>
                            <span ><div><p>111</p></div></span>
                            <input onclick="PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&src=badge','Share to StumbleUpon +',800,540)" type=image value='Stumble' src="images/buttons/stumble.png" />
                            
                        </div>
                        <br><br><br>
                        <div>
                            <span ><div><p>0</p></div></span>
                            <input onclick="getID('t_subj').value='<?php echo str_replace($t,$v,$r["lookName"]); ?>';getID('t_msg').value='<?php echo str_replace($t,$v,$r["lookName"])." http://fashionsponge.com/fs/lookdetails.php?id=".$_GET["id"]; ?>';msgBox('visible')" type=image value='Email' src="images/buttons/email.png" />
                        </div>
                        
                    </td>
                </table><br><br> 
                 <!-- Please change the width and height to suit your needs -->
                <a href="http://www.facebook.com/share.php?u=<full page url to share" onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook"><img src="images/facebookimage.jpg" alt="facebook share"></a>
            </script>
                <div id='square_with_arrow_clicked_cotainer' > 
                  <center>
                    <img id='ld_arrow_up' src="fs_folders/images/attr/ld_arrow_up.png" title="temp heat">
                  </center>
                  <div>   
                    <table border="0" cellpadding="0" cellspacing="0"  > 
                      <tr>  
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_fb.png"   title = "facebook"  onclick="fbshare();" ></td> <td> 12,334 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter"   onclick="PopupCenter('http://twitter.com/share?text=fashionsponge.com/lookdetaiks?id=<?php echo $plno; ?>\n','',660,330)" ></td> <td> 643 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_t.png"    title = "tumblr"                             ></td> <td> 743 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_q.png"    title = "q"                                  ></td> <td> 138 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_g+.png"   title = "google"                             ></td> <td> 103 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_line.png" title = "line"                               ></td> <td> 18 </td> <tr>
                        <td id="share-icons" ><img src="fs_folders/images/attr/ld_white_mail.png" title = "mail"                               ></td> <td> 73 </td> <tr>
                    </table>
                  </div>
                </div>
              <style type="text/css"> 
                    #square_with_arrow_clicked_cotainer  { display: block; z-index: 103; position:absolute; /*margin-top: -43px;*/ margin-left: 450px;  border: 1px solid #000; border-radius: 5px; height: 50px; width: 176px; padding-top: 15px;  /*background-color: green; */ } 
                      /*#ld_arrow_up { }*/
                      #ld_arrow_up{ position: absolute;  z-index: 102; width: 7px;  }  
                      #square_with_arrow_clicked_cotainer div{ position: absolute;  z-index: 101; margin-left: 52px; margin-top: 5px; background-color: #b21325; /*background-color: yellow;*/ border-radius: 5px;   height: 160px; width: 80px; /*border: 1px solid red;*/ } 
                      #square_with_arrow_clicked_cotainer div table { width: 100px; margin-top: 11px; margin-left: 10px; font-family: "arial"; font-size: 12px; color: #fff; font-weight: bold; }
                      #square_with_arrow_clicked_cotainer div table td#share-icons  { width: 25px; padding-bottom: 4px; }
                      #square_with_arrow_clicked_cotainer div table img { /*border:1px solid #000;*/ height: 16px; cursor: pointer;  }
                    /*#ld_square_with_arrow_clicked_container { position:absolute; margin-top: 20px; margin-left: 560px;  border: 1px solid #000; border-radius: 5px; height: 50px; width: 200px; /*background-color: #b21325;  }*/ 
                      #ttext  { font-family: 'arial'; font-size: 9px; font-weight: bold; } 
              </style>  
<?php }  ?> 
  
<?php 
    function recheck_url( )
    {
         


      $url = "http://google.com";
      // $url ="https://www.google.com";
      // $url ="http://www.google.com";

      // $url ="www.google.com";
        // $url ="google.com";


    // $url = "www.google.com";
    // $url = "https://www.google.com";
    // $url = "http://www.facebook.com"; # working link 

 


    // echo  " www = ".strpos($url,"ww.")." add www = $url <br>";  
      // no http 
    $www = strpos($url,"ww.");
    if (empty($www))   { 
            $url=str_replace("http://","",$url);
            $url=str_replace("https://","",$url);
            $url = "www.".$url;  
    }
    $http = strpos($url,"ttp");
    if ( empty($http) ) { 
        $url = "http://".$url;
    } 
    
    // echo  " www = ".strpos($url,"http")." add http = $url <br>";
    echo " new url = $url <br>";

       







 
    } 
?> 
<?php 

  function tag_buble() {  

      // );  
                $mc = new myclass();
                  $mc->auto_detect_path(); 
              
            ?>
            <!-- <div id='tag-circle-tag-div' >  -->
            <body>
            <center> 
                <div id='tag-bubble-body' >  
                    <img id='tag-bubble-arrow-left-img' src="<?php  echo "$mc->genImgs/tag-bubble-arrow-left.png";  ?>"> 
                   <center> <span id='tag-bubble-title' >ABOUT ITEM NUMBER ONE</span>  </center>
                    <table id='tag-bubble-table' border='0' cellpadding='0' cellspacing='0' > 
                        <tr> 
                          <td >  <span  id='tag-name' >  COLOR:    </span> <span  id='tag-desc' > #BLACK   </span>  </td> <tr> 
                          <td > <span id='tag-name' >  BRAND:    </span> <span  id='tag-desc' > #YSL     </span>  </td> <tr>
                          <td > <span id='tag-name' >  GARMENT:  </span> <span  id='tag-desc' > #PAYCOAT </span>  </td> <tr>
                          <td > <span id='tag-name' >  MATERIAL: </span> <span  id='tag-desc' > #WALL    </span>  </td> <tr>
                          <td > <span id='tag-name' >  PATTERN:  </span> <span  id='tag-desc' > #PAIN    </span> 
                                <span id='tag-name' >  PRICE:    </span> <span  id='tag-desc' > #1400    </span>  </td>  <tr>
                          <td > <span id='tag-url' > <a href='www.google.com' target="_blank"> www.google.com </a> </span> </td>  
                    </table> 
                    <hr id='tag-bubble-body-hr' >  
                     <a href='www.google.com' target="_blank" id='visit-store' > <img src="<?php echo "$mc->button/visit-store.png"; ?>">  </a> 
                </div>
            </center>
            <br>
            <center> 
                <div id='tag-bubble-body' >  
                    <img id='tag-bubble-arrow-right-img' src="<?php  echo "$mc->genImgs/tag-bubble-arrow-right.png";  ?>"> 
                   <center> <span id='tag-bubble-title' >ABOUT ITEM NUMBER ONE</span>  </center>
                    <table id='tag-bubble-table' border='0' cellpadding='0' cellspacing='0' > 
                        <tr> 
                          <td >  <span  id='tag-name' >  COLOR:    </span> <span  id='tag-desc' > #BLACK   </span>  </td> <tr> 
                          <td > <span id='tag-name' >  BRAND:    </span> <span  id='tag-desc' > #YSL     </span>  </td> <tr>
                          <td > <span id='tag-name' >  GARMENT:  </span> <span  id='tag-desc' > #PAYCOAT </span>  </td> <tr>
                          <td > <span id='tag-name' >  MATERIAL: </span> <span  id='tag-desc' > #WALL    </span>  </td> <tr>
                          <td > <span id='tag-name' >  PATTERN:  </span> <span  id='tag-desc' > #PAIN    </span> 
                                <span id='tag-name' >  PRICE:    </span> <span  id='tag-desc' > #1400    </span>  </td>  <tr>
                          <td > <span id='tag-url' > <a href='www.google.com' target="_blank"> www.google.com </a> </span> </td>  
                    </table> 
                    <hr id='tag-bubble-body-hr' >  
                     <a href='www.google.com' target="_blank" id='visit-store' > <img src="<?php echo "$mc->button/visit-store.png"; ?>">  </a> 
                </div>
            </center>
            <!-- </div> --> 
            <style type="text/css">  
                body { 
                    background-color: #Ccc;
                }
                #tag-bubble-body { box-shadow: 0 4px 10px #000;  background-color: #fff;  padding-top: 10px; padding-left:15px; padding-bottom: 10px; padding-right: 15px; height: 170px; width: 280px; border: 1px solid #ccc; border-radius: 5px;  }
                    #tag-bubble-body img { cursor: pointer;  }
                    #tag-bubble-title {  font-weight: bold;font-size: 14px;text-decoration: underline;font-family: "arial"; color: #ac1c22; }
                    #tag-bubble-table { position: absolute;  margin-top: 10px; float: left; font-size: 12px;  }
                    #tag-name {  color: #ccc; font-family: "arial";font-weight: bold; }
                    #tag-desc { color: #ac1c22; font-family: "arial"; font-weight: bold;  }  
                    #tag-url a  { text-decoration: none; color: #1a386a;  }
                    #tag-bubble-body-hr{  border: 1x solid red;   width: 99%; float: left; margin-top: 105px; /*position: absolute;*/ } 
                    #visit-store img { margin-top: 7px; width: 100%;   }
                    #tag-bubble-arrow-left-img { position: absolute; margin-left: -185px; margin-top: 10px;   }
                    #tag-bubble-arrow-right-img { position: absolute;  margin-top: 10px; margin-left: 150px;   }

            </style>



            </body> 
<?php } ?> 

<?php 
 
    function next_and_rev_res( $mc  ) {  




      $rlimit = 20;
      $looks = $mc->get_all_latest_look( 10 );  
      $tl = count($looks);
      $c=0;
      for ($i=0; $i < $tl; $i++) { 
        $c++;
         echo "$i .) ".$looks[$i]["plno"]."<br>"; 
      } 
      $numbers = range(0, $tl-1); 
      shuffle($numbers); 
      $c=-1;
      for ($i=0; $i < $tl-1; $i++) { 
        if ( $c < $rlimit ) {
          $c++;
        } else {
          $i = $tl;
        }
      } 
      for ($i=0; $i < $c ; $i++) {  
          $rlooks[$i] = $looks[$numbers[$i]]["plno"];
      }  
      echo "random numbers <br>";
      print_r($rlooks); 
    }
?>  

<?php function hide_visibility( ) { 

        ?> 

                <style type="text/css">
                  #footer_rectagle { 
                    position: absolute;
                    height: 100px; 
                    width: 200px; 
                    background-color: green;
                    opacity: 0.5;
                    z-index: 101;
                  }
                  #tag { 
                    position: relative;
                    height: 200px; 
                    width: 200px; 
                    background-color: yellow;
                    opacity: 0.7; 
                    z-index: 100;
                  } 
                </style>

                <script type="text/javascript">
                function hide( ) {
                   alert("asd");
                   $("#footer_rectagle").css({"visibility":"hidden"});
                }


                </script> 

                <div id="footer_rectagle" >  
                <br><br><br>
                 footer [share] , [drip] , [flag] 
                </div> 
                <div id="tag" >  
                  (1)
                </div> 

                    <input type="button" value="click to hide" onclick="hide()" />
<?php } ?> 

<?php function hote_reservation_ladingpage_popUp( ) { 
    ?>
   
             
          <!doctype html>
          <html lang="en">
          <head>
              <meta charset="utf-8">
              
              <script>
              $(function() {
                  $( "#from" ).datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1, 
                      onClose: function( selectedDate ) {
                          $( "#to" ).datepicker( "option", "minDate", selectedDate );
                      }
                   
                  });
                  $( "#to" ).datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1,
                      onClose: function( selectedDate ) {
                          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                      }
                  });
              });
              </script>
          </head>
          <body>

          <center>
              <div id="reservation-form-wrrapper" >  
                  <div id="reservation-form-container" >   

                      <table id="reservation-form-main-table" border="0" cellpadding="0" cellspacing="0" >
                          <tr> 
                              <td id="popUp-form-header"  >
                                  <h1> 
                                      Welcome to smc hotel reservation system! <br>
                                      [LOGO] 
                                  </h1>
                                  <hr>
                              </td>
                          <tr> 
                              <td id="popUp-form-body1"  > 
                                  <table border="0"  cellpadding="0" cellspacing="0"  > 
                                      <tr> 
                                          <td> Check-In </td> <td> Check-Out</td> 
                                      <tr> 
                                          <td  > <input type="text" id="from" name="from"/> </td>
                                          <td> <input type="text" id="to" name="to"/> </td> 
                                  </table> 
                              </td>
                          <tr> 
                              <td id="popUp-form-body2"  > 
                                  <table border="0" cellpadding="0" cellspacing="0"   > 
                                      <tr> 
                                          <td> Rooms </td>  
                                      <tr> 
                                          <td  width="165"  >  
                                              <select> 
                                                  <option> Sweet Room </option>
                                                  <option> Delux 1 </option>
                                                  <option> Delux 2 </option>
                                                  <option> Presidential </option>
                                                  <option> Standard/Dormitory</option>
                                              </select>
                                          </td> 
                                  </table>  
                              </td>
                          <tr> 
                              <td id="popUp-form-footer" > 
                                  <input id="popUp-form-search" type="submit" value="Seach" >
                              </td>
                          <tr> 
                      </table> 
                  </div>  
              </div>
          </center>

          <style type="text/css"> 
              #reservation-form-container  {  border: 1px solid #000;  background-color: #7f7c74; padding: 20px; font-family: "arial"; }
              #reservation-form-container {  border: 1px solid #000; }
                  #reservation-form-main-table { background-color: #fff; padding: 20px; border-radius: 10px;  border: 3px solid #eb6830; box-shadow: 0px 5px 10px #000;  } 
              #popUp-form-header { padding-bottom: 20px; }
              #popUp-form-body1  { padding-bottom: 20px;  } 
                  #popUp-form-body1 table  { width: 100%; }  
                  #popUp-form-body1 input[type='text']  { height: 50px;  font-size: 25px;}  
              #popUp-form-body2  { padding-bottom: 20px; }
                  #popUp-form-body2 select  { height: 50px; width: 279px;  font-size: 25px;}  
              #popUp-form-footer { padding-bottom: 20px; }
                  #popUp-form-footer table { width: 100%; }
                  #popUp-form-footer input[type='submit'] { border-radius: 10px; width: 100%; height: 50px;  background-color: #eb6830    ; color: #fff; cursor: pointer; }



          /*general style */
              *:focus {
                  outline: none;
              }
          </style> 
<?php } ?> 


<?php function get_x_and_y_axis($value='') { ?>
        <script type="text/javascript">
          

          $("#overme").mousemove(function(e){
          
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                
                alert("X: " + x + " Y: " + y); 

                // $(lookdetails.tagdivcontainer).css({"margin-top":y,"margin-left":x});


            });



        </script>
<?php } ?> 


<?php 
   function tag_circle_design( $mc ) {  

     // echo ;
        echo "<img src='$mc->genImgs/tag-red-circle.jpg' />";


          /* sing number */
        
            /* double number*/

            
            $db_Ttagged = 4; 
            if ( $db_Ttagged < 10)   {  
                $number_single  = "  margin-left: 10px;  "; 
                $style =  $number_single; 
            } else {  
                $number_double  = " margin-left: 6px; ";
                $style =  $number_double; 
             } 
     
      echo " <div id='tag-circle' ><img id='tag-circle-img' src='$mc->genImgs/tag-red-circle.jpg' /> <span id='tag-circle-value' style='$style'  > $db_Ttagged </span>  </div>"; 




        ?> 


          <style type="text/css"> 
          #tag-circle { 
            /*text-align: center;*/
            font-size: 12px;
            font-family: "arial";
            font-weight: bold;
            /*border: 1px solid #ac1c22; */
            height: 29px;
            color: #fff;  
            width: 29px;
            background-color: #ac1c22; 
            border-radius: 20px;
            -moz-box-shadow: 0 4px 4px #000;
            -webkit-box-shadow: 0 4px 4px #000;
            box-shadow: 0 4px 9px #000;
            cursor: pointer;
          }  
          #tag-circle-img{ 
            position: absolute;
            z-index: 100;
            margin-left: -2px;
            margin-top: -1px;
          }
          #tag-circle-value { 
            position: absolute;
            z-index: 101;
            
            margin-top: 8px;

          }
          </style> 
<?php } ?> 
<?php function Jquery_cropImage( ) { ?>

   <script src="js/jquery.min.js"></script>
    <script src="js/jquery.Jcrop.min.js"></script>
    <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
        <script language="Javascript">
    $(document).ready(function ( ) {
    
       jQuery(function($) {
            $('#target').Jcrop();


        });

    


    })
       
  </script>

    <img id="target"   src="fs_folders/images/uploads/posted looks/home/24.jpg" />  
<?php } ?> 
<?php function jquery_study( ) { ?>
      <script type="text/javascript">
        var x = [ 1, 2, 3 ];
        jQuery.each( x, function( index, value ) {

          document.write( "<br>index", index, "value", value ); 
        }); 

        var myArray = [ "hello", "world", "!" , "waka gawi chio!" ];
        for ( var i in myArray ) {
         
           document.write( myArray[ i ],"<br>");
         
        }
          </script> 
        <?php  
          echo "<h1> Jquery array: </h1> 
            <a href='http://learn.jquery.com/javascript-101/arrays/' target='_blank'>Array tutorials</a>
          "; 
} ?>  
<?php function load_pasue( ) { ?>      

      <script type="text/javascript">
      // alert('asd');


      // var modals = ["modal1","modal2","modal3","modal4","modal5"];

      // for (var i = 0; i < 5; i++) {
            // document.write(" i = "+i+" modals = "+modals[i]+"<br>");

            // setTimeout(function () {    
                    // code here 

           // }, 3000);
           // myLoop (i);

      // };

        append_home();
        function append_home ( )  {
             
            var i = 0; 
             
            var modals = ["modal1","modal2"];              
            var resLeght = modals.length;


            function myLoop () {        
               setTimeout(function () {     
                    document.write(" i = "+i+" modals = "+modals[i]+" modal len = "+resLeght+"<br>");   
                    


                  i++;  
                  if (i < resLeght) {            
                     myLoop();            
                  }                         
               }, 1000)
            } 
            myLoop();                   
        }     
          </script>
<?php } ?> 
<?php function javascript_get_min( ) {  ?> 
    

    <script>
     
        var points = [40,100,1,5,25,10,0,-1];
        document.write("min = "+minjs(points))
      

        function minjs (points) { 
            points.sort(function(a,b){return a-b}); 
            return points[0];
        }
        function maxjs (points) {
            points.sort(function(a,b){return b-a});
            return points[0];
        }


    </script> 
<?php 
} ?>  
<?php 
 function header_login( )
 {?>
 
    <script type="text/javascript" src='fs_folders/js/jquery-1.7.1.min.js'> </script>
    <script type="text/javascript" src='fs_folders/js/function_js.js'></script>

    <?php require("fs_folders/page_header/header_php_file/header3_signIn.php");   ?>  
    <?php 
 }
?>
<?php 
    function api_buttons( ) {  
        // for ($i=0; $i < 100 ; $i++)  {

            ?>

            facebook
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-follow" data-href="http://www.facebook.com/tarunsh" data-width="100" data-colorscheme="light" data-layout="standard" data-show-faces="true"></div>



         twitter

                <a href="https://twitter.com/FashionSponge" class="twitter-follow-button" data-show-count="false">Follow @FashionSponge</a>
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


            instagram 
     
        <style>.ig-b- { display: inline-block; }
        .ig-b- img { visibility: hidden; }
        .ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
        .ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
        .ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
        <a href="http://instagram.com/fsdevteam?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>             
    <?php
}
function email_body_test( )
{   


   if ( !empty(  $_POST['email'] )  ) {
       echo  " <span style='color:red' > test reponse mail sent to ".$_POST['email']."</span>";
       $to = $_POST['email'];
    } else{
        $to = 'fashionsponge78@gmail.com';
    }

    /*
    echo "
        <form action='testPage.php' method='POST' > 
            send test response to email: <input type='text'  name='email' />
            <input type='submit' value='send'> 
        </form> 

        ";
    */

          $_SESSION['Tpeopl_in_front'] = 1;
          $_SESSION['people_behind_you'] = 1;


            $from = "Fashion Sponge@";
            // $to = "fashionsponge78@gmail.com"; 
            // $to = "mrjesuserwinsuarez@gmail.com";
            // $subject = "Fashion Sponge - Sign Up For Beta";  
            // $headers  = "From: $from\r\n"; 
            // $headers .= "Content-type: text/html\r\n";  
            $invited_fn = "Test Name ";
           
            $Tpeopl_in_front = 2;
            $people_behind_you = 4;  

        
             
  
            $_SESSION['people_behind_you']  = 2;
            $_SESSION['Tpeopl_in_front'] = 3; 







             $body =" 
                        <html> 
                          <head>
                          <meta name='viewport' content='width=device-width, initial scale=1.0'/>
                          <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'> 
                          <body style='background-color:#f4f3f2;padding:10px;'>   
                              <center>
                                  <table border='0' cellspacing='0' cellpadding='0' style='width:150px;' > 
                                  <tr> 
                                      <td>  
                                          <div style=\" 
                                              text-align:center; 
                                              background-color: #fff;  
                                              border-radius:3px;  
                                              text-align:left; 
                                              line-height:140%; 
                                              font-family:'arial'; 
                                              font-size:15px;  
                                              width:98%; 
                                              border:2px solid #f4f3f2; 
                                          \">  
                                              <center> 
                                                  <div> 
                                                      <img style='cursor:pointer; width:100%; '  src='http://fashionsponge.com/fs_folders/images/email/Header-image.png' />  
                                                  </div>
                                              </center>  
                                              <center>  
                                                <div style=\"color:#1a386a;   text-align:left; width:560px; padding-top:30px; padding:20px; \"  > 
                                                    <center> <span style='font-size:190%;' > LETTER FROM THE <b> FOUNDER </b> </span> </center><br> 
                                                    Hi ".ucfirst($invited_fn).",
                                                    <div style='padding-top:15px'>  

                                                        My name is Mauricio, the Founder & Creative Director of Fashion Sponge. When it comes to online fashion communities, I know you have a lot of choices, so I want to personally thank you for visiting and signing up.  <br><br>
         
                                                        We’re days away from launching our private BETA period. Our designers and developers are working hard to get you a board as 
                                                        soon as possible, ensuring that you have a great online experience. Once again,  
                                                        <span style=\"color:#284372;font-weight:bold\"  >  $_SESSION[Tpeopl_in_front]  </span>  people signed up before you and 
                                                        <span style=\"color:#284372;font-weight:bold\"  > $_SESSION[people_behind_you]    </span> people 
                                                        signed up after you. Once we start sending out invitations to join, you will receive your invite in the order you signed up.
                                                    </div>   
                                                     <div style='padding-top:15px;font-weight:bold; color:#b01e23'>  
                                                           WHILE WAITING ON YOUR INVITE WE SUGGEST YOU:
                                                      </div>   
                                                    <div style=\"padding-top:15px;\" >  
                                                        Follow us on  
                                                        <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"https://www.facebook.com/fashionsponge\">Facebook</a> , 
                                                        <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"https://twitter.com/fashionsponge\">Google+</a> and  
                                                        <a style=\" color:#284372;text-decoration:none;font-weight:bold\" target=\"_blank\" href=\"http://instagram.com/fashionsponge\">Instagram</a>  
                                                        to get the latest information on the sites development and to see if we featured one of your latest looks. Also if you 
                                                        haven't already informed your stylish friends about Fashion Sponge or the \"<b>Worlds Most Stylish</b>\" contest, please send 
                                                        them the links so they can also enjoy whats to come.   
                                                    </div> 
                                                      <div style='padding-top:15px;font-weight:bold; color:#ac1c22;' >   
                                                         HAVE ANY QUESTIONS OR SUGGESTIONS?
                                                    </div>    

                                                    <div style=\"padding-top:15px;\" >  
                                                      If you have any questions or suggestions please feel free to email me. I'm always happy to receive feedback but most importantly I love connecting with people!
                                                    </div>  
                                                    <div style=\"padding-top:15px;font-weight:bold; color:#b01e23\" >  
                                                       TO LEARN MORE ABOUT FASHION SPONGE VISIT OUR  <a style=\" color:#284372;text-decoration:underline;font-weight:bold\" target=\"_blank\" href=\"http://fashionsponge.com/about-us\">ABOUT</a>  PAGE.    
                                                    </div> 
                                                    <div style=\"padding-top:15px;font-weight:bold\" >  
                                                         THANK YOU AGAIN FOR YOUR SUPPORT! 
                                                    </div> 
                                                    <div style=\"padding-top:10px;padding-bottom:70px;text-decoration:none\"  >  
                                                         Mauricio | Founder & Creative Director<br>
                                                        <a style=\"color:#b01e23\" >Mauricio@fashionsponge.com1</a><br>
                                                       \"Don't Just Dress. Dress Well.\"™ 
                                                       </div>  
                                                    </div> 
                                                </div> 
                                              </center>  
                                          </div> 
                                      </td>
                                  </td>  
                              </center> 
                          </body> 
                    </html>";  
            echo $body;
            
            $headers  = "From: $from\r\n"; 
            $headers .= "Content-type: text/html\r\n";   
            $subject = 'test'; 
            mail($to, $subject, $body, $headers);  











           ?>
             <!-- <img src="fs_folders/images/attr/ld_white_tw.png"   title = "twitter" onclick="PopupCenter('http://twitter.com/share?=invite\n','',660,330)" ></td>        -->
                    
           <?php 

}

?>











































































<?php  function slideshow( ) { ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>JQuery Cycle Plugin - Pager Demo with Prev/Next Controls</title>
<link rel="stylesheet" type="text/css" media="screen" href="../jq.css" />
<link rel="stylesheet" type="text/css" media="screen" href="cycle.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<style type="text/css">
#main { margin: 20px }
#nav { margin: 10px; position: relative }
#nav li { float: left; list-style: none}
#nav a { margin: 5px; padding: 3px 5px; border: 1px solid #ccc; background: #fc0; text-decoration: none }
#nav li.activeSlide a { background: #faa; color: black }
#nav a:focus { outline: none; }
</style>
<script type="text/javascript">
$(function() {

    $('#slideshow').cycle({
        fx:      'scrollHorz',
        timeout:  0,
        prev:    '#prev',
        next:    '#next',
        pager:   '#nav',
        pagerAnchorBuilder: pagerFactory
    });

    function pagerFactory(idx, slide) {
        var s = idx > 2 ? ' style="display:none"' : '';
        return '<li'+s+'><a href="#">'+(idx+1)+'</a></li>';
    };
    
});
</script>
</head>
<body>
<div><a id="logo" href="http://jquery.com" title="Powered By jQuery"></a></div>
<h1 id="banner"><a id="backnav" href="./">&lsaquo;&lsaquo; cycle home</a>jQuery Cycle Plugin - Pager Demo with Prev/Next Controls</h1>
<h2 id="header">Quick Hack demo</h2>
<div id="main">

<div id="demos">
    <div style="text-align:center;margin:auto;width:300px">
        <a href="#"><span id="prev">Prev</span></a> 
        <a href="#"><span id="next">Next</span></a>
        <ul id="nav"></ul>
    </div>
    <div id="slideshow" class="pics" style="margin:auto;clear:left;margin-top:40px">
        <img src="http://malsup.github.com/images/beach1.jpg" />
        <img src="http://malsup.github.com/images/beach2.jpg" />
        <img src="http://malsup.github.com/images/beach3.jpg" />
        <img src="http://malsup.github.com/images/beach4.jpg" />
        <img src="http://malsup.github.com/images/beach5.jpg" />
        <img src="http://malsup.github.com/images/beach6.jpg" />
        <img src="http://malsup.github.com/images/beach7.jpg" />
        <img src="http://malsup.github.com/images/beach8.jpg" />
    </div>
</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-850242-2";
urchinTracker();
</script>
</body>
</html>
<?php } ?>

 