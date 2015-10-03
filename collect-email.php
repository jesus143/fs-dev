<?php   
    require ("fs_folders/php_functions/connect.php");  
    include ("fs_folders/php_functions/Time/Time.php");
    include ("fs_folders/php_functions/Database/LookbookDatabase.php");
    include ("fs_folders/php_functions/Extends/LookbookExtends.php");  
    include ("fs_folders/php_functions/Class/Lookbook.php");  

    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php");  


    require_once ("fs_folders/php_functions/Database/Invited.php");




$database = new Database();
$invited1  = new \Invitation\Invited();
$database->connect();
$invited1->_setInvitedTotals($database);











echo "<div style='display:none' >";
      $mc = new myclass();  
      $pa = new postarticle ( );
      $sc = new scrape(); 
      $lookbook = new lookbook();  
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
      // limit of how many days to send again for the next email 
      $_SESSION['days'] = 3; 
      // start and end for limit show 
      $_SESSION['initial_start'] =  0;
      $_SESSION['initial_end']   =  100; 
      $_SESSION['start'] =  $_SESSION['initial_start'];
      $_SESSION['end']   =  $_SESSION['initial_end']; 
      $_SESSION['status_val'] = NULL;
      // popup open    
      set_time_limit(0); 
      ignore_user_abort(true);
      ini_set('max_execution_time', 0);
      // $username = scrape::get_usernames_followings( 'http://lookbook.nu/user/3107104-Phen-H/following?page=1' );
        // $username = $sc->get_usernames_followings( 'http://lookbook.nu/user/2718663-Leticia-N/following?page=1' );
      // print_r($username);    
      echo " this is it man ! <br>"; 
      // $sc->send_email_fortimesup($mc);   
     
        // search fields 
      echo " 
        <table style='display:block'> 
          <tr> 
            <th> any link in lookbook </th> <th> user profile link in lookbook </th> <tr>
            <td>
              <form METHOD='POST' ACTION='$_SERVER[PHP_SELF]' >  
                <input type='text' name='url' /> 
                <input type='submit' />  
              </form>
            </td> 

            <td>
              <form METHOD='POST' ACTION='$_SERVER[PHP_SELF]' >  u
                <input type='text' name='url1' /> 
                <input type='submit' />  
              </form>
            </td>
        </table>    
      ";    

      #init
      if ( !empty( $_POST['url'] ) ) {    
        $sc->retrieve_multiple_username_and_Add($_POST['url'].'?page=1',$mc);   
      }
      else if ( !empty($_POST['url1']) ){ 
        $sc->email_mining( $_POST['url1']  , $mc );   
      }
      else{ 
      }   
      # add new  info invited person 
      $sc->add_new_invited_info(  
        array( 
          'fullname'    =>( !empty($_POST['fullname']) ) ? $_POST['fullname'] : null ,
          'email'       =>( !empty($_POST['email']) ) ? $_POST['email'] : null ,
          'wob'         =>( !empty($_POST['wob']) ) ? $_POST['wob'] : null ,
          'occupation'  =>( !empty($_POST['occupation']) ) ? $_POST['occupation'] : null ,
          'style'       =>( !empty($_POST['style']) ) ? $_POST['style'] : null ,
          'description' =>( !empty($_POST['description']) ) ? $_POST['description'] : null ,
          'status'      =>( !empty($_POST['status']) ) ? $_POST['status'] : null  
        )
        ,$mc 
      );     
    /**
    * get total approved
    */ 
      $invited = select_v3( 
          'fs_invited' , 
          'count(*)' , 
          " invited_status = 1 and scrape_version = 1"
      );   
      $totalApprovedEmail = $invited[0][0];  

      // print_r( $invited );
    echo "</div>";  
    $mc->fs_popup_container_and_response('display:none'); 


?> 
  <!DOCTYPE html>
  <html>
  <head>
    <title></title> 
    <!-- new innir script  auto scroll down page when oppen-->   
  <script type="text/javascript" src='fs_folders/js/Scrape.js' ></script>
  </head>
  <body style="padding:0px; margin:0px;" onload="invited_person ( 'invited-person' , 'change-content' , '' , '#invited-people-sort' )" id='ThisIsTheBody' >  

    <?php //$lookbook->printDisplayResultFromServer('display:block'); ?>   

    <table id="invite_menu" > 
      <?php $lookbook->printScrapperMenu($sc , $mc , 'NEW YORK' , 0 , $totalApprovedEmail, $invited1, $database); ?>
    </table>     

    <table border="1" cellpadding="0" cellspacing="0" id="invite-container-left"  >
      <?php $lookbook->printContainerAndViewMore($mc); ?>   
    </table>    

  </body>        
  </html>   

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css"> 
 

