<?php    
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
    require('../../../fs_folders/php_functions/Class/Article.php');
    require('../../../fs_folders/php_functions/Class/Look.php');






    //Facebook Config
    require '../../../fs_folders/API/facebook-php-sdk-master/src/facebook.php'; 
	$config = array(
	  'appId' => '528594163842974',
	  'secret' => 'a411c8a3c4361556491b2c2ddf38bf21',
	); 
    $facebook = new Facebook($config);
  	$user_id = $facebook->getUser();
 
 







    use App\Article;









	$database = new Database();
	$invited1  = new \Invitation\Invited();
	$database->connect();




    $mc              =  new myclass();     
    $pa              =  new postarticle( ); 
    $ri              =  new resizeImage (); 
    $sc 			 =  new scrape();   
    $lookbook        =  new lookbook();
    $article1        =  new Article($db, $mc->mno);
    $look1           =  new Look($mc->mno, $db);

     

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
		$price    		 = ( !empty($_GET['price'])) 	? $_GET['price']	   		: null ;
		$purchased_at 	 = ( !empty($_GET['purchased_at'])) ? $_GET['purchased_at'] : null ;
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

	echo "<div style='display:block; color:none' >"; 
	 	switch ( $action ) {  
	 		case 'scrape':  
	 		
					// $sc->get_usernames_users(array('page_start'=>intval($page_start),'page_end'=>intval($page_end)),$mc);    
	 			break;
	 		case 'feed-modal-clicked-detail-view': 
	 					// echo " this is the view <br>this is the view <br>this is the view <br>this is the view <br>this is the view <br>this is the view <br> ";  
	 					if ( strpos($_SERVER['PHP_SELF'],  'new_fs' ) > 0 ) { 
	 					   // echo "local";
	 						$url= 'http://localhost/fs/new_fs/alphatest/';
	 					}
	 					else{
	 						 // echo "online";
	 						$url= 'http://dev.fashionsponge.com/';
	 					} 
		 				if ($table_name == 'postedlooks' ) {
		 					$page="lookdetails?id=$table_id"; 
		 				}
		 				else{
		 					$page="detail?id=$table_id";
		 				}  
		 				$_SESSION['hide_page'] = array('header','footer');  
		 				?>   
		 				<div id='details-popup-container' >  
		 					<div id='gen-popup-close' > 
	 							<input type="button" onclick="fs_popup('close','','','','','','','','')" value="close">
							</div>  
		 					<iframe src="<?php echo $url.$page; ?>"  >   
		 						<?php $mc->image( array( 'type'=>'loader' , 'id'=>"popup-details-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
		 					</iframe>  
		 				</div><?php
	 			break; 
	 		case 'invited-person':
	 			 	switch ($process) 
	 			 	{
	 			 		case 'function':   

	 			 			if (false) { 

	 			 				if(LookbookDatabase::isUserAlreadSignedUp($invited_id))
	 			 				{ 
	 			 					//invited_status = 2 
	 			 					echo "<br> this user is already signed up and approved then it should go to sign up";
	 			 					$response = mysql_query( " UPDATE fs_invited SET invited_status = 2 , invited_date = '$mc->date_time' WHERE invited_id = $invited_id ");  
 
	 			 				}
	 			 				else
	 			 				{ 
	 			 					echo "<br> this user not yet sign up and approved ";
	 			 					// update invited_status    
	 			 					$response = mysql_query( " UPDATE fs_invited SET invited_status = $status_val , invited_date = '$mc->date_time' WHERE invited_id = $invited_id ");  
	 			 					$mc->message( " update invited_status = $status_val " , $response , "" );    
	 			 					// from pending and approved then automaticaly send an invitation email 
	 			 					if ($status_val == 0) 
	 			 					{    
	 			 						if( mysql_query( " UPDATE fs_invited SET invited_status=0, temail_sent=0  WHERE invited_id = $invited_id ") )
	 			 						{
	 			 							echo " successfully updated to pending ";
	 			 						} 
	 			 						else
	 			 						{
	 			 							echo "failled to update  UPDATE fs_invited SET invited_status=0, temail_sent=0  WHERE invited_id = $invited_id  ";
	 			 						} 
	 			 					}
	 			 					else if ($status_val == 1) 
	 			 					{    
	 			 						/* 
	 			 						$response = $mc->fs_invited( array(  'type'=>'select',  'where'=>" invited_id = $invited_id  " ) ); 
										$subject = 'An Invitation to Share Your Blog Content on Fashion Sponge';
								      	$from    = 'mauricio@fashionsponge.com';
								      	$type    = 'invitations'; 
								      	$mc->send_email_signup_to_user( $response[0]['invited_fn'] , $response[0]['invited_email'] , $type , $from , $subject );  
	 			 					   	print_r($response);  
	 			 					   	*/
	 			 					   	echo "<h1>email approved </h11>";
	 			 						echo " <h1> sending email here </h1>";
	 			 					} 

	 			 					echo "  UPDATE fs_invited SET invited_status = $status_val , invited_date = '$mc->date_time' WHERE invited_id = $invited_id "; 
	 			 				}

	 			 			} else {
								$response = mysql_query( " UPDATE fs_invited SET invited_status = 2 , invited_date = '$mc->date_time' WHERE invited_id = $invited_id ");   	 
							}  
	 			 		break; 

	 			 		case 'insert':
	 			 				$status = 7;
	 			 				echo "  
	 			 				fullname = $fullname<br> 
								email = $email 		<br> 
								occupation = $occupation<br> 
								style = $style 		<br> 
								wob = $wob 			 <br> 
								tlook = $tlook 		<br> 
								city = $city 			<br> 
								state = $state 		<br> 
								country = $country <br> 
								description = $description<br> 
								status = $status 	<br>   
	 			 				"; 
	 			 				//$status=0; //set status to pending when added 
	 			 				// check if email exist  
	 			 					$response = $mc->fs_invited(   array(  'type'=>'select',  'where'=>" invited_email = '$email' " ) ); 
	 			 					if (!empty($response)) {  
	 			 						echo "<email>0<email>";  
	 			 					}
	 			 					else{  
	 			 						echo "<email>1<email>";  
	 			 						echo "email not exist and inserting now <br> ";   
	 			 						// insert new data   
	 			 							$response = $mc->fs_invited( 
	 			 								array(  
	 			 									'type'=>'insert', 
	 			 									'invited_fn'=>$fullname, 
													'invited_email'=>$email,
													'invited_wob'=>$wob,
													'invited_occu'=>$occupation,
													'invited_style'=>$style, 
													'description'=>$description,
													'city'=>$city,
													'state'=>$state,
													'country'=>$country, 
													'tlook'=>$tlook,
													'invited_status'=>$status,
													'scrape_version'=>1 
	 			 								) 
	 			 							);  
	 			 							
	 			 							mysql_query("UPDATE fs_invited SET timezone = 'EST', location = 'RANDOM' WHERE invited_id = $response ");

	 			 							// if(mysql_query("UPDATE fs_invited SET timezone = EST WHERE invited_id = response")) {    
	 			 							// 	echo "Updated invited <br>";
	 			 							// } 


	 			 						// 	$mc->message(" add new info invited id = $response ", $response , "" ); 
	 			 						// // select latest insert and print the design text 
	 			 						// 	$response = $mc->fs_invited(   array(  'type'=>'select',  'where'=>" invited_id = $response " ) ); 
	 			 						// 	if ( !empty( $response )) {  
	 			 						// 		echo "<design>";
	 			 						// 			$mc->print_invited_people( $response,null,true );  
	 			 						// 		echo "<design>";
	 			 						// 	} 
	 			 					}  
	 			 		break;
 
	 			 		case 'update':   

	 			 		    $lookbook->setTimeZone($location);
	 			 			$timeZone    = $lookbook->getTimeZone(); 
	 			 			$timeZoneUrl = $lookbook->getTimeZoneUrl(); 




 
	 			 		 		// update table invite
						 					
					 				// echo "  invited_fn = $fullname , invited_email = $email , invited_wob = $wob , invited_occu = $occupation , invited_style = $style , description = $description , city = $city , state = $state , country = $country , tlook = $tlook , invited_status = $status WHERE invited_id = $invited_id  ";

									$response = mysql_query(" UPDATE fs_invited SET timezone = '$timeZone', timezone_url = '$timeZoneUrl', location = '$location', invited_fn = '$fullname' , invited_email = '$email' , invited_wob = '$wob' , invited_occu = '$occupation' , invited_style = '$style' , description = '$description' , city = '$city' , state = '$state' , country = '$country' , tlook = $tlook WHERE invited_id = $invited_id ");
							
									$mc->message( " update " , $response , "" );

	 			 				// print design  

		 							$response = $mc->fs_invited( array( 'type'=>'select',  'where'=>" invited_id = $invited_id " ) );

		 							if ( !empty( $response )) {  
		 								echo "<design>";
		 									$mc->print_invited_people($response, $process, TRUE);  
		 								echo "<design>";
		 							}     
	 			 		break;

	 			 		case 'change-content':  

	 			 				$invited1->_setInvitedTotals($database);

 								// get total approved information 
	 			 				// to show the total person in every location it needs to be enable 
	 			 				// reason why desabled is because it can make the site move slow.

 			 				 	
 			 				 	//print nav menu
 			 					$invited = select_v3( 
			                      	'fs_invited' , 
			                      	'count(*)' , 
			                      	" invited_status = 1 "
			                    );   
			                    $totalApprovedEmail = $invited[0][0];   

				                echo "<invited-menu-bool>change invited menu<invited-menu-bool>";     
 			 					echo "<invited-menu>";
 			 						// $lookbook->printScrapperMenu($sc , $mc , $location , $status_val , $totalApprovedEmail, );
 			 					$lookbook->printScrapperMenu($sc, $mc, $location, $status_val, $totalApprovedEmail, $invited1, $database); 
 			 					echo "<invited-menu>";
			 					 
 			 					
 			 					


 			 					//set session  
						      	$_SESSION['start'] =  $_SESSION['initial_start'];
						      	$_SESSION['end']   =  $_SESSION['initial_end'];  
 			 					$start 			   = intval($_SESSION['start']);
 			 					$end   			   = intval($_SESSION['end']); 

 			 					//condition order rowname 
 			 					if ( $status_val == 0 ) {
 			 						//$ordername = 'invited_id';
 			 						$ordername = 'invited_date';
 			 					}else{
 			 						$ordername = 'invited_date';
 			 					} 
 			 			 		//query invited info  
 			 				 	$invited = select_v3( 
			                      	'fs_invited' , 
			                      	'*' , 
			                      	" invited_status = $status_val and location = '$location' order by $ordername desc limit $start , $end" 
			                    );   

			                    // echo  	" invited_status = $status_val and location = '$location' order by $ordername desc limit $start , $end";   
			                    //echo  " invited_status = $status_val order by $ordername desc limit $start , $end";






			                    echo "<invited-content>";
			                    $mc->print_invited_people($invited, null, true, $invited1, $database);   
			                    echo "<invited-content>"; 
	 			 		break;  

	 			 		case 'view-more':  
				 					//set session  
				 					$start = intval($_SESSION['start']);
				 					$end   = intval($_SESSION['end']);  
				 					$start+=$end;  
				 					$_SESSION['start'] = $start;
				 					$_SESSION['end']   = $end; 
				 					//condition order rowname 
				 					if ( $status_val == 0 ) {
				 						//$ordername = 'invited_id';
				 						$ordername = 'invited_date';
				 					}else{
				 						$ordername = 'invited_date';
				 					} 
				 			 		//query invited info  
				 				 	$invited = select_v3( 
				                      	'fs_invited' , 
				                      	'*' , 
				                      	" invited_status = $status_val and location = '$location' order by $ordername desc limit $start , $end" 
				                    );      
				                    //echo  " invited_status = $status_val order by $ordername desc limit $start , $end"; 
				               		$mc->print_invited_people($invited,null,true, $invited1, $database);   
	 			 		break;  

	 			 		case 'UpdateSendTime':
	 			 				echo " this is to update the sending time <br>   UPDATE fs_invited SET DateTimeSend = $DateTime  WHERE invited_id = $invited_id ";
 			 					$response = mysql_query( " UPDATE fs_invited SET DateTimeSend = '$DateTime'  WHERE invited_id = $invited_id ");  
 			 					$mc->message( " update invited_status = $status_val " , $response , "" );     
	 			 		break;

	 			 		case 'invitedSignup': 
 
	 			 			/**
	 			 			*initialized  
	 			 			*/ 
		 			 		$fullName       = '';
		 			 		$invited_status = 0;
		 			 		$invited_date   = $mc->date_time;  
		 			 		$location 	    = 'NEW YORK';
		 			 		$scrape_version = 1; 
		 			 		$signup_status  = 1;
		 			 		$timezone       = 'EST';
		 			 		$timezone_url   = 'http://www.timeanddate.com/worldclock/usa/new-york';  
		 			 		$type 		    = 'signup';
		 			 		$sender         = 'brainoffashion@gmail.com'; 
	 			 			echo "<h3> user singsup with fashionsponge.com </h3>";   
	 			 			$total = $sc->get_total_results_invitedstatus(); 
	 			 			print_r($total);
  
	 			 			$refferalLink = FALSE;
	 			 			//echo $lookbook->testExtends();    
 			 			 	//get information from db by email
 			 			 	LookbookDatabase::setInvitedInformationByEmailFromDb($email);  
   
 			 				echo "<pre>"; 
 			 			 	echo "<br>email: $email";
 			 			 	echo "<br>domain: $websiteOrBlog";  
 			 			 	// echo '<br> total result: ' . LookbookDatabase::getResultTotal() . ''; 
 			 			 	// echo "<br> this is the results from database query:<br> "; 
 			 			 	// print_r(LookbookDatabase::getResultArray());  
 			 			 	//check if email exist 
 			 			 	if(LookbookDatabase::isEmailExist(LookbookDatabase::getResultTotal()))
 			 			 	{    

 			 			 		echo '<br> <H3>This person is exist to db</H3>';
 			 			 		// UPDATE INVITED USER 
 			 			 		LookbookDatabase::updateInvitedUserSignsUp(LookbookDatabase::getResultArray() , $websiteOrBlog , $email , $mc->date_time); 

 			 			 	}
 			 			 	elseif($refferalLink == TRUE)
 			 			 	{

 			 			 		echo '<br> <H3>This person is signup based on refferal link</H3>';
 			 			 		//this person is reffered by onother person
 			 			 		//code here 
 			 			 	}
 			 			 	else
 			 			 	{     
 
 			 			 		//add new fs signup as invited user
 			 			 		LookbookDatabase::AddInvitedUserSignup($email , $websiteOrBlog , $fullName , $invited_status , $invited_date , $location , 
 			 			 			$scrape_version , $signup_status , $timezone , $timezone_url);
  
 			 			 		
 			 			 		// ADD NEW ANONYMOUS USER 
 			 			 		//email not exist  
 			 			 		//insert:
 			 			 		//get location by ip
 			 			 		// email,domain,invited_Status=8,date_time='current date' 
 			 			 		echo "<br>email not exist";
 			 			 		echo '<br> <H3>This person is not exist to db</H3>'; 
 			 			 	}   
 
 			 			 	// send sign up email   

								$mc->send_email_to_admin( 
									' ' . LookbookDatabase::getFirstNameByEmail($email),  
									null, 
									$email, 
									$websiteOrBlog
								); 	   
								if($mc->send_email_signup_to_user(
									' ' . LookbookDatabase::getFirstNameByEmail($email), 
									$email, 
									'signup', 
									$sender, 
									'Singup', 
									2 //version 2
								))
								{
									echo '<br>' . 'EMAIL SUCCESSFULLY SENT TO ' . $email;
								}
								else
								{	
									echo '<br>' . 'EMAIL FAILLED SENT TO ' . $email;
								} 
						break; 

						case 'updateGender': 
 
							   if(mysql_query( " UPDATE fs_invited SET gender = '$gender' WHERE invited_id = $invited_id "))
							   { 
									echo "<br>gender successfully updated mysql_query( ' UPDATE fs_invited SET gender = '$gender' WHERE invited_id = $invited_id '  )";
							   }  
							   else
							   {
							   		echo "<br>gender failled to update mysql_query( ' UPDATE fs_invited SET gender = '$gender' WHERE invited_id = $invited_id '  ) " ;
							   } 
							break;  

	 			 		default: 


	 			 				// init 
	 			 					// LookbookDatabase::setInvitedById($invited_id)
	 			 					$array = array();

	 			 				// if id is not empty means its from the edit button clicked

		 			 				if ( !empty( $table_id )) {

		 			 					$response = $mc->fs_invited(   array(  'type'=>'select',  'where'=>" invited_id = $table_id " ) );
 
		 			 					// print_r( $response );

		 			 					$array['invited_id']  = $response[0]['invited_id'];
		 			 					$array['fullname']    = $response[0]['invited_fn'];
										$array['email'] 	  = $response[0]['invited_email'];
										$array['occupation']  = $response[0]['invited_occu'];
										$array['style']       = $response[0]['invited_style'];
										$array['wob']         = $response[0]['invited_wob'];
										$array['tlook'] 	  = $response[0]['tlook'];
										$array['city'] 	  	  = $response[0]['city'];
										$array['state'] 	  = $response[0]['state'];
										$array['country'] 	  = $response[0]['country'];
										$array['description'] = $response[0]['description'];
										$array['status'] 	  = $response[0]['invited_status'];
										$array['location'] 	  = $response[0]['location'];
										// echo "  table id not empty <br> ";
		 			 				}     
		 			 				else{ 
		 			 					// echo "  table id is empty <br> ";
		 			 				}

		 			 			// display design form 

	 			 					$mc->invite_add_form($array, $array['location'], $lookbook->getTopCityArray());    
	 			 		break;
 
	 			 	} 
	 			break;
	 		case 'fs-modal-popup':
	 			 	

	 			 	// initlaized function 

	 					$isowner = false; 

		 				if ( $process == 'view-more' ):

		 					// add session for the view more

								$_SESSION['limit_start']+=$_SESSION['limit_end']; 
 			 					$limit_start 			 = $_SESSION['limit_start']; 
			 					$limit_end   			 = $_SESSION['limit_end']; 


		 				else:

		 					// design 
		 					// set session for limit 

			 					$limit_start = $_SESSION['limit_start'] = 0; 
			 					$limit_end   = $_SESSION['limit_end'] 	 = 10; 

		 				endif;
 
		 			// retrieve information 
		 			 
		 				$response = $mc->fs_modal_popup( 
		 					array( 
			 					'table_name'=>$table_name,
			 					'table_id' => $table_id,
			 					'type' =>$type,
			 					'limit_start'=>$limit_start,
			 					'limit_end'=>$limit_end,
			 					'orderby'=>$orderby
		 					)
		 				); 		 


		 			// set the settings if the user owned the modal or not 


		 				if ( $type == 'ratings') {

		 					// get modal owner mno 

			 					$mno1 = $mc->modal( 
			 						array( 
			 							'type'=>'get-modal-owner-mno', 
			 							'table_id'=>$table_id,
			 							'table_name'=>$table_name
			 						)
			 					);

			 				// set iether owner or not of the modal 

			 					if ( $mno == $mno1 ) {

			 					 	$isowner = true;  

			 					} else if ( $page == 'back-end' ) { 

			 						$isowner = true;  
			 						
			 					}

		 				}
		 				 

		 			// main function   

		 				switch ( $process ) { 
		 					case 'view-more': 
		 						 	// echo " <h2> view more now </h2> ";
		 						 	$mc->notification_design_rating( $response , '../../../' , $mno , $type , $isowner , $category );  
		 						break;  
		 					default:  
		 							// design  ?>  
		 								<center>
						 					<div id="modal-popup-container" class="notification-activity" >  
										 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:344px;"  >
										 				<tr> 
										 					<td id="notification-header"  style="padding-left:10px;" > 
										 						<div  onclick=" fs_popup( 'close' )" style="float:right;cursor:pointer;margin-right:5px;" title="close"  > ( x ) </div>
										 						<div> <b  class='share-title' ><?php echo $title; ?><b> </div> 
										 					</td>  
										 					 
										 			</table>

										 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
										 				<tr>  
										 					<td>	 
										 						<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
										 					</td> 
										 				<tr>  
										 					<td>  
										 						<div id="fs-modal-popup-content" style="height:340px; overflow-y:scroll;  overflow-x:hidden; "  > 
										 						 	<?php $mc->notification_design_rating( $response , '../../../' , $mno , $type , $isowner , $category ); ?>    
										 						</div>
										 					</td>
										 			</table> 	
										 		 
										 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
										 				<tr> 
										 					<td id="notification-footer" > 
										 						<div>
										 							<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"fs-modal-popup-view-more-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
										 						</div>
										 						<!-- <div > <b onclick="popup_rating ( 'rate-posted-modals-view' , 'view-more' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' )" style='cursor:pointer' > View All <b> </div> -->
										 						<div > <b onclick="fs_modal_popup( 'fs-modal-popup' , 'view-more' , '<?php echo $type; ?>' , '<?php echo $table_name; ?>' , '<?php echo $table_id; ?>' , 'This is the ratings' , 'fron-end' , '#fs-modal-popup-view-more-loader' , '<?php echo $category; ?>' )" style='cursor:pointer' > View More <b> </div>
										 						
										 					</td>  
										 			</table> 
									 		</div> 
									 	</center> 
									 <?php  
		 						break;
		 				} 
	 			break;
	 		case 'modal-attribute': 
	 			 	switch ( $process ) { 

	 			 		case 'insert': 
	 							// data print 


	 			 				 //   $input = array("a" => "green", "red", "b" => "green", "blue", "red");
								   // $result = array_unique($input);
								   // print_r($result);



	 			 					$occasion = revoveDuplicateSingleArray($occasion);  
								    $occasion = implode($occasion, ','); 
 
								    $season = revoveDuplicateSingleArray($season);  
								    $season = implode($season, ','); 

			 			 			echo "   
			 			 				color     = $color <br>
										brand     = $brand <br>
										garment   = $garment <br>
										material  = $material <br>
										pattern   = $pattern <br>
										price     = $price <br>
										purchased_at = $purchased_at <br>
										pos_x_y   = $pos_x_y <br>
										style     = $style <br>
										occasion  = $occasion <br>
										season    = $season <br>
										keyword   = $keyword <br> 
										title     = $title<br> 
										desc      = $desc<br> 
										article   = $article <br> 
										isAgreed  = $isAgreed <br>
									";  
 

									/**
									* set agreement cockie
									*/

									setcookie(
									  "isAgreed",
									  $isAgreed,
									  time() + (10 * 365 * 24 * 60 * 60)
									); 


 
								// return the dot of the article url  

									$article = str_replace(' ', '.', $article);
	 
								// initialize data and expload string via comma to array
	 									
	 								$color   	   = explode(',', $color ); 
	 								$brand   	   = explode(',', $brand ); 
	 								$garment 	   = explode(',', $garment ); 
	 								$material	   = explode(',', $material ); 
	 								$pattern 	   = explode(',', $pattern ); 
	 								$price 	  	   = explode(',', $price );  
	 								$purchased_at  = explode(',', $purchased_at );  
	 								$pos_x_y 	   = explode(',', $pos_x_y );  
	 								$x1 	 	   = 0; 
									$y1 	 	   = 0;
									$len     	   = count( $color )-1; 
									$tag['dcolor'] = 'Charcoal'; 
									$table_name    = 'postedlooks';
									$category 	   = $style;








 
								if ( $method == 'edit' ):



									//update user post_look_agree  
										$response = mysql_query( "UPDATE fs_members SET post_look_agree = 1 WHERE mno = $mno"); 
										if(	$response) {
											echo "post look agree updated <br>";
										} else { 
											echo "post look agree not updated <br>";
										}
 
									// update look 

										$response = mysql_query( "UPDATE postedlooks SET lookName = '$title' , lookAbout = '$desc' , article_link = '$article' , occasion = '$occasion' , season = '$season' , style = '$style' , keyword = '$keyword' WHERE plno = $table_id "); 
										$mc->message( 'update new look info ' , $response , '' );  

									// delete keyword search 

									 	$response = $mc->fs_search( array(  'type'=> 'delete' , 'table_name'=>'postedlooks' , 'table_id'=>$table_id ) );  
 
									 	$mc->message( " delete fs search table id $table_id "  , $response , '' );

									// delete tag 

									 	$response = $mc->fs_pltag( array(  'type'=> 'delete' , 'table_id'=>$table_id) );   
 
										$mc->message( " delete fs pltags table id $table_id "  , $response , '' );									 	 

								else:




									//update user post_look_agree  

									echo "mno  = $mno <br>";
										$response = mysql_query( "UPDATE fs_members SET post_look_agree = 1 WHERE mno = $mno"); 
										if(	$response) {
											echo "post look agree updated <br>";
										} else { 
											echo "post look agree not updated <br>";
										}

									// add new look  

										$table_id = $mc->posted_modals_postedlooks_Query( 
											array( 
												'postedlooks_query' => 'insert',
												'mno' => $mno,
												'lookName' => $title,
												'lookAbout' => $desc,
												'article_link' => $article,
												'occasion' => $occasion,
												'season' => $season,
												'style' => $style,
												'keyword' =>$keyword,
												'active' => 1,
												'gender' => $mc->gender,
												'plus_blogger' => $mc->plus_blogger
											) 
										);   



										echo " plus blogger " . $mc->plus_blogger . "<br>";
										$mc->message( "add new look look id = $table_id ", $table_id , '' );  
								endif;  

								// add new look tags 
 
									// $mc->print_r1( $color ); 
									// $mc->print_r1( $brand );
									// $mc->print_r1( $garment );
									// $mc->print_r1( $material );
									// $mc->print_r1( $pattern );
									// $mc->print_r1( $pos_x_y );
	  
								// insert tags 

									for ($i=0; $i < $len ; $i++) {  


										// get the x and y position 

											if ( $i == 0 ) {
												$x1 += 1;
												$y1 += 3;	 	 
										 	}
											else{
												$x1 += 4;
												$y1 += 4;	 	 
											}  
											$x = $pos_x_y[$x1];
											$y = $pos_x_y[$y1]; 

										// insert and initialize look attribute
		  
											// print values 

												#echo " color = $color[$i] brand = $brand[$i]  garment = $garment[$i]  material = $material[$i] pattern = $pattern[$i] x = $x  y = $y <br> "; 	


											// pass the value

												$color_         = ( !empty($color[$i]) ) ? $color[$i] : $tag['dcolor']; 
												$brand_ 	    = $brand[$i];
												$garment_ 	    = $garment[$i];
												$material_      = $material[$i];
												$pattern_ 	    = $pattern[$i];
												$price_ 	    = $price[$i];
												$purchased_at_ 	= $purchased_at[$i];
												$x_ 		    = $x;
												$y_ 		    = $y;
									 
	 
	 										// insert tag  
												$response = $mc->fs_pltag( 
													array( 
														'type'=>'insert',
														'plno'=>$table_id,
														'plt_color'=>$color_, 
														'plt_brand'=>$brand_,
														'plt_garment'=>$garment_,
														'plt_material'=>$material_,
														'plt_price'=>$price_,   
														'plt_purchased_at'=>$purchased_at_,  
														'plt_pattern'=>$pattern_,   
														'plt_x'=>$x_, 
														'plt_y'=>$y_,  
													)
												);

												$mc->message( 'add look tags ', $response , '' );  

											// get brand category number based on the style name 
 
											   $bcno = $mc->fs_brand_category(  
											        array(   
											          	'type'=>'get-bcno',
											          	'bc_name'=>$style 
											      	) 
											    );  

											    $mc->message( ' getting brand no via style name ', $bcno , " bcno = $bcno " );  

											// add brand if not exist

												$response = $mc->fs_brand(  
												 	array(   
												 		'type'=>'insert-if-not-exist',
												 		'bname'=>$brand_,
												 		'bcno'=>$bcno
												 	) 
												);  

												$mc->message( ' this is a new brand insert ? ', $response , ' ' );  

									}  

							  	// insert keyword for search  

									$response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'postedlooks' ,   'table_id'=>$table_id )  );   
	 								$mc->message( "keyword search " , $response , "" ); 

	 							// add keyword not yet exist

	 								$response = $mc->fs_keyword(   array(  'type'=>'insert-not-exist' , 'table_id'=>$table_id ,  'table_name'=>'postedlooks' , 'keyword' =>$keyword  ) ); 

	 							// calculate category percentage
 
									$mc->modal(  
										array(  
											'type'=>'add-or-update-user-category-percentage-and-rating',
											'table_name'=>$table_name,
											'table_id'=>$table_id,
											'category'=>$category  
										)
									);

	 							if ( $method == 'edit' ):

	 								// update edit feed 
								
								else:

									// post to activity wall   

										$mc->add_activity_wall_post ( $mno , $table_id , 'Posted' , 'postedlooks' , $mc->date_time  );   

								endif; 
	 			 			break;  
	 			 		case 'search': 

		 			 			// initialized 
		 			 				
		 			 				$multiple_select = false; 								        // to know if the option give the ability to multiple select
		 			 				$comma           = ''; 										    // add comman to multiple select
		 			 				$with_comma      = array( 'occasion' , 'season' , 'keyword' );  // initialize array with comma 
		 			 				$rowname         = '';											// row name for the modall attr name

		 			 			// check if the search must have a comma or don't have

		 			 				if ( in_array($type,$with_comma)) {   
		 			 					$comma           = ', '; 
		 			 					$multiple_select = true;
		 			 				} 

		 			 			// get the specific modal attr category id 

	 			 					$response1 = select_v3( 
										'fs_modal_attribute_cat', 
										'*',
										"name = '$type' "
									);    

		 			 				$matcno = (!empty($response1[0]['matcno'])) ? $response1[0]['matcno'] : 0;    
		 			 					// echo " 	 matcno  =	$matcno & keySearch = $keySearch , type = $type<br> ";

		 			 			// if empty retrieved hist latest upload tag or used 

		 			 					if ( empty($keySearch) ) {
		 			 						 // echo "retrieve his latest post or tag used <br>";
		 			 						 $keySearch = 's';
		 			 					}
		 			 					else{
		 			 						// echo " not empty";
		 			 					} 

		 			 			// detect if brand or keyword or else this is to change the table query



	 			 					if ( $type == 'keyword' ) { 
	 			 						$response = $mc->fs_keyword(  
	 			 							array(  
	 			 								'type'=>'select', 
	 			 								'where'=> "keyword LIKE '$keySearch%'", 
	 			 								'orderby'=> 'kno asc', 
	 			 								'limit_start'=>$limit_start, 
	 			 								'limit_end'=>$limit_end
	 			 							) 
	 			 						);  
	 			 						$rowname = 'keyword'; 
	 			 					}
	 			 					else if ( $type == 'brand' ) {  
										$response = selectV1(
											'*',
											"fs_brands",
											null,
											'order by bno desc',
											'limit 10',
											array(
												"rowName"=>"bname",
												"keySearch"=>$keySearch
											)
										);     
										$rowname = 'bname'; 
	 			 					}
	 			 					else{
	 			 						$response = $mc->fs_modal_attribute( array(  
											    'type'=>'select',
											    'where'=>"name LIKE '$keySearch%' and matcno = $matcno ",
											    'limit_start'=>$limit_start,
											    'limit_end'=>$limit_end
										    )
										); 	
										$rowname = 'name';
	 			 					} 

			 			 			$len = count($response);      
	  
			 			 		// print result of the query  

			 			 			if ( !empty($response) ) { ?>    
		 			 					<center><div id="autocomplete-dropdown-loader-cotainer" class="<?php echo $loader; ?>"  onclick="modal ( 'close' , '' , '' , '' , '<?php echo $response_c; ?>'  )"  ><?php $mc->image( array( 'type'=>'loader' , 'id'=>"$loader" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div> </center> 
								        <table border="0" cellpadding="0" cellspacing="0" >
								            <tr><?php 
								            	for ($i=0; $i < $len ; $i++) {   

						 			 					$name =  strtolower($response[$i][$rowname]);  

								            		?>
								              		<td onclick="modal( 'get-value-selected' , '' , '' , '' , '<?php echo $response_c; ?>' , <?php echo $textfieldid; ?> , '<?php echo "$name$comma"; ?>' , '<?php echo $multiple_select; ?>' )" ><?php echo "$name";   ?></td> 
								        			<tr> <?php 
								        		} 
								        		?>
								        </table> 
			 			 				<?php  
			 			 			}
			 			 			else{ ?>
			 			 					<center><div id="autocomplete-dropdown-loader-cotainer" class="<?php echo $loader; ?>" ><?php $mc->image( array( 'type'=>'loader' , 'id'=>"$loader" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div> </center> 
			 			 					<table border='0' cellpadding='0' cellspacing='0' >
			 			 						<tr> 
			 			 							<td style='padding:5px;' onclick="modal ( 'close' , '' , '' , '' , '<?php echo $response_c; ?>'  )" > No Result </td> 
			 			 					</table>   
			 			 				<?php 
			 			 			}     
	 			 			break; 
	 			 		case 'look-modal-design':
	 			 				# initialized
	 			 					$modal['src']  		= ''; 
	 			 					$modal['title']  	= ''; 
	 			 					$modal['desc']  	= ''; 
	 			 					$modal['url']  		= '';  
	 			 					$modal['style']  	= ''; 
	 			 					$modal['season']    = ''; 
	 			 					$modal['occasion']  = ''; 
	 			 					$modal['keyword']  	= '';   
	 			 					$modal['selected0'] = '';
	 			 					$modal['selected1'] = '';
	 			 					$modal['selected2'] = '';
	 			 					$modal['selected3'] = '';   
	 			 					$modal['selected4'] = '';  
									$modal['selected5'] = '';
	 			 					switch ( $method ) {
	 			 						case 'edit':

		 			 							$ri = new resizeImage (); 		
			 									// echo "edite look"; 
												$pl_info=$mc->posted_look_info($table_id); 
												// print_r($pl_info); 
												// echo 'lnmae '.$pl_info['lookName'].' ldesc'.$pl_info['lookAbout'];   
												// echo " total tags = ".count($pl_info['pltags']); 
												// for ($i=0; $i < count($pl_info['pltags']) ; $i++) { 
												// 	$pl_info[$i][]
												// 	 echo " pltags = ";
												// } 

												$modal['desc']                  = $pl_info['lookAbout']; 
												$modal['title']                 = $pl_info['lookName'];
												$modal['occasion']              = $pl_info['occasion'];
												$modal['season']                = $pl_info['season'];
												$modal['style']                 = $pl_info['style']; 
												$modal['url']                   = $pl_info['article_link'];  
												$modal['keyword']               = $pl_info['keyword'];  

												
												$pltags                         = $pl_info['pltags'];
												$pltags                         = $pl_info['pltags'];  
												$Ttag                           = count($pl_info['pltags']);   
												$_SESSION['last_look_uploaded'] = $table_id;
												$_SESSION['look_edit']          = true;
												// echo "plno = $plno"; 
												echo"<span id='type' style='display:none'>".$method."</span>"; 
												echo"<span id='plno' style='display:none'>".$table_id."</span>"; 
												// echo "edit";  
												$modal['src']  = "$mc->look_folder_lookdetails/$table_id.jpg"; 
												$lookmodalsstyle     = $mc->lookdetails_set_size_of_the_look( "../../../".$modal['src'] , $ri );

												// selected 

													$modal['selected0']  = ( $modal['style'] == 'Chic' )        ? 'selected' : null ;
													$modal['selected1']  = ( $modal['style'] == 'Menswear' )    ? 'selected' : null ;
													$modal['selected2']  = (
                                                        $modal['style'] == 'Preppy' )      ? 'selected' : null ;
													$modal['selected3']  = ( $modal['style'] == 'Streetwear' )  ? 'selected' : null ;   
													$modal['selected4']  = ( $modal['style'] == 'bohemian' )    ? 'selected' : null ;   
													$modal['selected5']  = ( $modal['style'] == 'casual' )      ? 'selected' : null ;   

	 			 							break; 
	 			 						default: 
	 			 							break;
	 			 					}
                                        ?>
									<html>
										<head>
											<link rel="stylesheet" type="text/css" href="fs_folders/labellok_items/css/style.css">
											<script src="../../../fs_folders/labellok_items/js/plugin.js"></script>
									 		<?php
									 		include('../../../fs_folders/labellok_items/js/js_function.php'); 
									 		include('../../../fs_folders/labellok_items/js/init.php'); 
									 		include('../../../fs_folders/labellok_items/js/ajax.php'); 
									 		include('../../../fs_folders/labellok_items/js/image_click.php'); 
									 		// require("fb-sdk.php");
									 		?>  
										</head>
										<body style="padding-bottom:0px; margin-bottom:0px;padding-top:0px; margin-top:0px;" id='label-look-body' >
											<center>
												<!-- <div id="new-postalook-label-container" >  -->
													<div id='' class='pl_tags_edit' style='display:none' >
													 	<?php 
													 		// $pltags = $pl_info;

													 		
													 		if (!empty($pltags)) {
													 			# code...
													 			// echo "not empty";
														 		for ($i=0; $i < count($pltags) ; $i++) { 
														 			for ($j=2; $j < 11; $j++) { 
														 				if ($i==0 and $j==2) {
														 					// first color
														 					$firstcolor = $pltags[$i][$j];
														 					echo "<div id='fcolor' id='fcolor' >$firstcolor</div>";
														 				}
																		echo  $pltags[$i][$j].','; 
														 			} 
														 			echo "-,";
														 		}
													 		}else { 
													 			// echo "empty";
													 		}
													 	?>	
													</div> 
													<div id='Ttag_edit' class='Ttag_edit' style='display:none' >
													  	<?php 
													  		if (!empty($pltags)) {
													  			echo count($pltags);
													  		}else { 
													  			echo 0;
													  		}
														?>
													</div> 
											 		<div id='divCoord' style='position:fixed;display:none; z-index:500 background-color :#000'>
											 				this is the position
											 			<!-- coordinate -->
											 		</div>    
													<div id='block_barrer' style=" visibility:hidden " > 
														<span id='ins_label' style='display:none;' >
															<b>LABEL YOUR ITEMS</b>
															</br>
															<span>click this photo to label what you're wearing</span>
														</span> 
														<span id='ins_del' >
															<b> DOUBLE CLICK </b>
															<br>
															<span> to remove </span>
															this is the best !
														</span>
													</div>
													<div id='del_tag_option'> 
													</div>
													<div style="background-color:white;width:910px;padding: 6px  3px 6px 3px; border-radius:5px;" id="post-look-container" >
														<div  style="border:1px solid none; padding-top:5px; position: relative; border-radius:5px; border: 1px solid #e2e2df; width: 900px; height:807px;  background-color: #e9eaed"  >  

															<!-- <div id="divCoord"> coordinates </div>   -->  
															<div id="new-postalook-label-wrapper" style="height:20px !important" >   

																<div id="new-postalook-header-div" style="display:none" >
																	<table border="0" cellpadding="0" cellspacing="0" > 
																		<tr>
																			<td style="width:280px;" > <div style="color:#b32727;font-size:60px;font-family:misoLight " > LABEL LOOK </div> </td>
																			<td> <div> mao ni ang look nga imong gi submit dap l sa look daun img label sa look daun look  a look daun look daun img label sa look daun i e   check if sakto ba or dili g label sa look daun imni sya sakto. daghang salamat sa inyong  pag supporta sa amoang cog label sa look daun img label sa look daun immpany. </div> </td>
																	</table>
																</div>     
																<div id='body' style="padding:0px; border:1px solid none" >
																	<center>  
																		<table border="0" cellpadding="0" cellspacing="0" >
																			<tr> 
																				<td style="position:absolute;" > 
																					<?php if ( $method != 'edit' ): ?>
																						<!-- <div style="position:absolute; border:1px solid none;" id="modal-upload-div" onmouseover ="$('#modal-upload-div').css('display','block')" >
																							<form  action="photo.resize.php?type=upload-look-and-resize" method="POST" enctype="multipart/form-data" id="upload-modal" >  
																							 	<input type='file' id="modal-image-file" name="file" runat="server" style="display:none;"  /> 
																							 	<input type="button" value="upload" onclick="$('#modal-image-file').click( );" />   
																					 		</form>
																					 	</div> -->
																					<?php endif; ?>
																				</td>
																			<tr> 
																				<td id="circle-tag"> 
																					<div id='block_circle_tags'  style="border:1px solid none; display:block;  "  >   </div>     
																				</td>
																			<tr>
																				<td id="dropdown-tags" >
																					<div id='tag1'> 
																						 	<?php  
																							 $c=0;
																							 for ($i=1; $i <16 ; $i++) {  
																							 	$c++; 
																							 	// if ( $c%2==0) {
																							 	// 	$background = 'background-color:#f6f7f8'; 
																							 	// }
																							 	// else{
																							 	// 	$background = 'background-color:none'; 	
																							 	// } 
																							 	$background  = '';



																							//echo " <table border='0'  id='table_container_$c' class='item' style='border-radius:5px;  height:0px;$background;z-index:100' onmousemove='show_dropdown( \"#table_container_$c\" , \"block\" )' onmouseout='show_dropdown( \"#table_container_$c\" , \"none\" )'   cellspacing='0' cellpadding='5'     >"  // this is for mouse over show
																							echo " <table border='0'  id='table_container_$c' class='item_$c' style='border-radius:5px;display:none; position:absolute;height:0px;$background;z-index:120' cellspacing='0' cellpadding='5'     >" 


																							?>	 
																								<style type="text/css">

																									#table_container_<?php echo $c ?>{
																										display: none;  
																										/*border:1px solid #fff; */ 
																									} 
																										#COLOR<?php echo $c ?> ,
																										#BRAND<?php echo $c ?> ,
																										#GARMENT<?php echo $c ?> ,
																										#MATERIAL<?php echo $c ?> ,
																										#PATTERN<?php echo $c ?> , 
																										#PRICE<?php echo $c ?> ,
																										#PURCHASED<?php echo $c ?>{   
																									}
																								</style><?php 
																								if ($c < 10 ) { 
																									echo " 
																										<style type='text/css'>
																											.item1_$c { 
																											 
																											 padding: 4px;
																										}
																									</style>
																									";  
																									$w = '60px';  
																								}
																								else{ 
																									$w = '68px'; 
																								}
																							?> 
																								<tr>   
																									<td style="height:20px;background:none !important"> 
																										<!-- <img src="<?php echo "$mc->genImgs/upper-bubble.png"; ?>" style='width:100%' />  -->
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px; border-radius:5px 5px 0px 0px;" >

																										<table border='0' cellpadding='0' cellspacing='0' style='width:100%'  > 
																											<tr> 
																												<td> 
																													<div style="padding-bottom:5px;padding-top:5px;" >Color</div> 
																												</td>
																												<td> 	
																													<!-- <center> <div id='close-taggin-dropdown' title='close' onclick="show_dropdown ( '<?php echo "#table_container_$c"; ?>' , 'none' )" > x </div>  </center>  -->
																													<center> <div id='delete-tag_<?php echo $c; ?>' class='delete-tag'  title='delete' style='cursor:pointer' > x </div>  </center> 
																												</td>
																										</table>  
																					 					<div id='COLOR<?php echo $c;  ?>' class='static_div_input'   onclick='retrieve_color(this.id)' >
																					 					</div> 
																					 					<div style="  position:absolute; width:100%; margin-left: 95px;" > 
																						 					<div class='ajax_color<?php echo $c;  ?>' id='ajax_color<?php echo $c;  ?>' style="border: 1px solid darkgrey;" >  
																						 					</div>  
																					 					</div>
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;border:1px solid none" >

																										<div style="padding-bottom:5px;padding-top:5px;" >Brand</div> 

																										<!-- old version --> 
																											<div style="display:none" >
																						 						<input style="width:157px;font-size:14px;"   type='text' id='BRAND<?php echo $c;  ?>' class='not_static_input' value='' onkeyup='retrieve_brands(this.id)' >  
																						 						<div style="position:absolute;z-index:102; margin-left:70px; margin-top:10px;" >
																						 							<img src="fs_folders/images/attr/loading 2.gif"  style="display:none;height:10px;" id="brand_loader_<?php echo $c; ?>"  > 
																						 						</div> 
																						 						<div class='ajax_BRAND<?php echo $c;  ?>' id='ajax_BRAND<?php echo $c;  ?>' style='display:none; background:#284372;border:1px solid none; border:1px solid none; height:30px;  width:157px; position:absolute;' >   
																						 						</div>    
																					 						</div>
																				 						<!-- new version --> 
																					 						<input style="width:157px;padding:5px;"  id="brand<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'brand' , 'autocomplete-dropdown-loader-brand<?php echo $c ?>' , 'autocomplete-dropdown-container-brand<?php echo $c; ?>' , 'brand<?php echo $c; ?>' )" />   
																						 					<div id="label-look-dropdown-container" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-brand<?php echo $c; ?>" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-brand<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-brand$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div> 
																									 </td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;" > 
																										<div style="padding-bottom:5px;padding-top:5px;" >Garment</div>
																										<!-- old version --> 
																											<div style="display:none" >
																							 					<div  id='GARMENT<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_garment(this.id)' > 
																							 					</div>   
																							 					<div class='ajax_GARMENT<?php echo $c;  ?>' id='ajax_GARMENT<?php echo $c;  ?>'   > </div> 
																							 				</div>   
																						 				<!-- new version --> 
																						 					<input style="width:157px;padding:5px;"  id="garment<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'garment' , 'autocomplete-dropdown-loader-garment<?php echo $c ?>' , 'autocomplete-dropdown-container-garment<?php echo $c; ?>' , 'garment<?php echo $c; ?>' )" />   
																						 					<div id="label-look-dropdown-container" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-garment<?php echo $c; ?>" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-garment<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-garment$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div>
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Material</div> 
																										<div style="display:none" > 
																						 					<div id='MATERIAL<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_material(this.id)' >
																						 					</div> 
																						 					<div class='ajax_MATERIAL<?php echo $c;  ?>' id='ajax_MATERIAL<?php echo $c;  ?>' > 
																						 					</div>
																					 					</div>

																					 					<input style="width:157px;padding:5px;"   id="material<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'material' , 'autocomplete-dropdown-loader-material<?php echo $c ?>' , 'autocomplete-dropdown-container-material<?php echo $c; ?>' , 'material<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-material<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-material<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-material$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									</td>
																								<tr>
																									<td style="padding-top:0px;padding-bottom:0px;padding-bottom:10px;border-radius:0px 0px 5px 5px;" >
																										<div style="padding-bottom:5px;padding-top:5px;" >Pattern</div>

																										<div style="display:none" >
																					 						<div id='PATTERN<?php echo $c;  ?>' class='static_div_input' onclick='retrieve_pattern(this.id)' >
																					 						</div>
																					 						<div class='ajax_PATTERN<?php echo $c;  ?>' id='ajax_PATTERN<?php echo $c;  ?>'  >
																					 						</div>
																				 						</div>

																				 						<input style="width:157px;padding:5px;"  id="pattern<?php echo $c; ?>"   type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'pattern' , 'autocomplete-dropdown-loader-pattern<?php echo $c ?>' , 'autocomplete-dropdown-container-pattern<?php echo $c; ?>' , 'pattern<?php echo $c; ?>' )" />   
																					 					<div id="label-look-dropdown-container" >  
																										    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-pattern<?php echo $c; ?>" >  
																										    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-pattern<?php echo $c;  ?>"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-pattern$c" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																										    </div> 
																										</div> 
																									 </td>
																								<tr>
																									<td style="display:none" >
																				 						<div  id='PRICE<?php echo $c;  ?>'class='static_div_input' onclick='retrieve_price(this.id)' >
																				 						</div>
																				 						<div class='ajax_PRICE<?php echo $c;  ?>' id='ajax_PRICE<?php echo $c;  ?>' > 
																				 						</div>
																									 </td>
																								<tr>
																									<td style="display:none" >
																				 						<input type='text' id='PURCHASED<?php echo $c;  ?>' class='not_static_input' value='PURCHASED AT' onkeyup='retrieve_purchased_at(this.id)'  >
																				 						<div class='ajax_PURCHASED'<?php echo $c;  ?> id='ajax_PURCHASED<?php echo $c;  ?>'>
																				 						</div>  
																									 </td> 
																								<tr>
																									 <td style='display:none'  >
																				 						<input type='text' id='pos_x_y<?php echo $c;  ?>' class=' ' value='' onkeyup=''  /> 
																									 </td>  
																							 </table >
																							<?php } ?>
																		 				</div>  
																				</td>
																			<tr>
																				<td id='left_side' style="border:1px solid none; height:500px;background-color:#FFFFFF;" onmouseover="$('#modal-upload-div').css('display','block')" onmouseout ="$('#modal-upload-div').css('display','none')" > 

																					<!-- upload image -->
																						 
																				 	<!--  images --> 
																						 

																					<?php if ( $method != 'edit' ): ?>

																						<div style="position:absolute; border:1px solid none;" id="modal-upload-div" onmouseover ="$('#modal-upload-div').css('display','block')" >
																							<form  action="photo.resize.php?type=upload-look-and-resize" method="POST" enctype="multipart/form-data" id="upload-modal" >  
																							 	<input type='file' id="modal-image-file" name="file" runat="server" style="display:none;"  /> 
																							 	<!-- <input type="button" value="upload" onclick="$('#modal-image-file').click( );" />    -->
																					 		</form>
																					 	</div> 

																						<div id="upload-image">   	
																						  	<!-- <img src="fs_folders/images/post/upload.png"  onclick="$('#modal-image-file').click( );"  >   -->
																						  	<img   
																								id="postarticle-upload-image"     
																								src="fs_folders/images/post/upload.png" 
																								onclick="$('#modal-image-file').click( );"
																								onmousemove=" mousein_change_button ( '#postarticle-upload-image' , 'fs_folders/images/post/upload-mouse-over.png' )" 
																								onmouseout="mouseout_change_button (  '#postarticle-upload-image' , 'fs_folders/images/post/upload.png' ) " 
																							/>


																							<img   
																								id="postarticle-browse"     
																								src="fs_folders/images/post/browse.png" 
																								onclick="$('#modal-image-file').click( );"
																								onmousemove=" mousein_change_button ( '#postarticle-browse' , 'fs_folders/images/post/browse-mouse-over.png' )" 
																								onmouseout="mouseout_change_button (  '#postarticle-browse' , 'fs_folders/images/post/browse.png' ) " 
																							/>
																								

																						</div>   

																					<?php endif; ?>

																 						<center> 
																	 						<!-- <img src="<?php echo "$mc->look_folder_home/6.jpg";  ?>"  style='<?php echo $lookmodalssize; ?>' id="modal-image"   />   	  -->
																	 						<img src="<?php echo $modal['src']; ?>"  style='<?php echo $lookmodalsstyle; ?>' id="modal-image"   />   	 
																	 						<div>  
																							    <table>
																							      	<tbody><tr>
																							          <td style="border-bottom: 1px solid rgb(227, 226, 226); padding-bottom:9px; padding-top:20;" > 
																							          		<input type="checkbox"><span>I want to crop or rotate my image</span>
																							          </td>
																							        </tr><tr>
																							          <td> 
																							          		<input type="checkbox"><span>I agree to the posting a look rules</span>
																							          </td>
																							  		</tr></tbody>
																							  	</table> 
																							  	<!-- <div style="position: absolute;float: left;margin: 20px 0px 0px 0px; ">    -->
                               																	<!-- <input type="checkbox" name="post-look-agreement" id="post-look-agreement" checked=""> Agree Term <a href="agreement" target="_blank"> read </a> </div> -->
																							</div>		 
																						</center>   
																					</td>
																			<tr>
																				<td> 

																					<!-- bottom colors -->

																						<div style="border-top:1px solid grey" > 
																							<?php  
																								if ( !empty($pltags) ) {

																									$c=0; 
																									echo "   
																										<div id='new-postalook-color-underimage-div' >
																											<table border='0' cellpadding='0' cellspacing='0' >  
																												<tr>";
																													for ($i=0; $i < 15 ; $i++) { 
																														$c++;  
																														$plt_color = (!empty($pltags[$i]["plt_color"])) ? $pltags[$i]["plt_color"] : null ; 
																														$tc = $mc->get_html_colo_code( str_replace(" ","",$plt_color));	   
														 
																														if ($c <= count($pltags)) {   
																															#  sa mga tag nga naay color
																															if ( $i==0 ) { 
																																#sugod td sa color pallete
																																$style = "display:block; background-color:#$tc; border-radius:0 0 0 5px;";	 
																															}
																															else if ( $i== count($pltags)-1 ) { 

																																#last print td sa color pallete
																																$style = "display:block; background-color:#$tc; border-radius:0 0 5px 0;";	 
																															}
																															else{
																																$style = "display:block; background-color:#$tc";	 
																															} 
																														}
																														else{ 
																															# kong ang td is walay sulod nga color
																															$style = 'display:none'; 
																														} 

																														echo " 
																															<td id='new-postalook-tagcolor-td$c'  class='new-postalook-tagcolor-td$c' style='$style'   > <div> </div></td> 
																														";  
																													}  
																													echo "  
																											</table>	
																										</div> 
																									";
																								}
																								else {   
																									echo " 
																										<div id='new-postalook-color-underimage-div' >
																											<table border='0' cellpadding='0' cellspacing='0' >  
																												<tr>  
																													<td id='new-postalook-tagcolor-td1'  class='new-postalook-tagcolor-td1'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td2'  class='new-postalook-tagcolor-td2'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td3'  class='new-postalook-tagcolor-td3'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td4'  class='new-postalook-tagcolor-td4'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td5'  class='new-postalook-tagcolor-td5'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td6'  class='new-postalook-tagcolor-td6'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td7'  class='new-postalook-tagcolor-td7'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td8'  class='new-postalook-tagcolor-td8'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td9'  class='new-postalook-tagcolor-td9'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td10' class='new-postalook-tagcolor-td10'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td11' class='new-postalook-tagcolor-td11'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td12' class='new-postalook-tagcolor-td12'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td13' class='new-postalook-tagcolor-td13'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td14' class='new-postalook-tagcolor-td14'   > <div></div></td> 
																													<td id='new-postalook-tagcolor-td15' class='new-postalook-tagcolor-td15'   > <div></div></td>   
																											</table>	
																										</div> 
																									";
																								}
																							?> 
																						</div>  
																				</td>
																		</table> 
																	</center>
																</div>
																<table border="0" cellpadding="0" cellspacing="0" style="width:100%;" > 
																	<tr> 
																		<td> 
																			<div id='right_side' style="display:block; z-index:100;height:250px" >    
																				<table border="0" cellpadding="0" cellspacing="0" style="width:100%; " > 	
																					<tr> 
																						<td> 
																						 	<div style="color:#b32727;font-size:30px;font-family:'misoRegular';display:none" >
																						 		DETAILS
																						 	</div>
																						</td>
																					<tr> 
																						<td style="padding-top:10px; " >  
																							<table id="post-title-url" >  
																							  	<tbody>
																								    <tr>
																								      <td><div>Title</div></td><td style="padding-left: 7px;" ><div>Article Url</div></td> </tr><tr>
																								    
																								     <td>
																								          <input placeholder="160 characters max" type="text" id="onetwo" class="look_name" maxlength="160" title="Name your look (160) character." style="width:100%;" value="">     
																								    </td>

																								    <td style="padding-left: 5px;"> 
																								      <input title="Add source url of the article (optional)." type="text" class="look-article-field" value="" placeholder="paste look url" style="width:100%; border:1px solid none; ">
																								    </td>
																							  
																									</tr>
																									</tbody>
																								</table>  
																						</td> 
																					<tr> 
																						<td style="padding-top:10px;" >   
																							<div style="padding-bottom:10px;" >
																								Description
																							</div> 
																							<textarea placeholder='320 characters  max' rows='10' cols='30' maxlength='320' id='onetwo' class='textarea' title="What’s the story behind your look?" style="height:50px;" ><?php echo $modal['desc']; ?></textarea>
																						</td>     
																					 <tr> 
																					 	<td style="padding-top:10px;" >    
																					 		<table border="0" cellpadding="0" cellspacing="0" width="100%;" > 
																					 			<tr> 
																					 				<td> <div style="padding-bottom:5px;" > Category</div> </td>
																					 				<td> <div style="padding-bottom:5px;margin-left:4px;" > Occasion </div> </td>
																					 				<td> <div style="padding-bottom:5px;margin-left:4px;" > Season </div> </td>
																					 				<td> <div style="padding-bottom:5px;margin-left:4px;" > Tags </div> </td>
																						 		<tr> 
																						 			<td style="background:white; border:1px solid white" >  
																						 				<div>  
																						 					<select  style="width:100%;padding:5px;border:none;color:#284372" id="style"   >
																						 						<option>Select</option>
																												<option <?php echo $modal['selected0']; ?>>Chic</option>
																												<option <?php echo $modal['selected1']; ?>>Menswear</option>
																												<option <?php echo $modal['selected2']; ?>>Preppy</option>
																												<option <?php echo $modal['selected3']; ?>>Streetwear</option> 
																												<option <?php echo $modal['selected4']; ?>>Bohemian</option> 
																												<option <?php echo $modal['selected5']; ?>>Casual</option> 
																											</select>  														 
																										</div>  
																						 			</td>  
																						 			<td style="background:white; border:1px solid white" >   

																										<input style="width:100%;display:none; visibility:hidden; border:1px solid none; "  type='text' value='<?php  echo $occasion; ?>' id='input345' class='occasion'    placeholder='Where can you wear this?'  onclick="hide_all_open_dropdown('none','res_occasion','none')"; >
																										<div class='res_occasion' id='res_occasion' style="visibility:hidden" > 
																											<?php 
																												$a = array('Amusement Park','Baby Shower','BBQ','Beach','Birthday Dinner','Blind Date','Bridal Shower','Brunch','Casual Party','Clubbing','Cocktail','College','Company Event','Conference','Dinner Date','Dinner Party','Everyday','Formal Event','High School','Internship','Interview','Lunch Date','Movie Night','Music Concert','Photo shoot','Picnic','Pool Party','Prom','Romantic Dinner','Theater / Play / Opera','Wedding','Wine Tasting','Work');
																												$c=0;	
																												echo "<span onclick='close_x()'   class='x_out'  title='(close)' >x</span>";
																												echo " <br> <center> <span>Occasion </span></center> <br>";
																												echo "<table border=0>" ;						 		 
																												for ($i=0; $i < count($a) ; $i++) { 
																													$c++;
																													$b=$a[$i];
																													echo "<td><p onclick='hide_x_beore_accasion_name(\"$i\");remove_Selected_taggs(\"$b\")'  id='remove_tags_$i' class='remove_tags_occasion'>x</p></td>
																													<td onclick='get_clicked_accation(\"$b\",\"$i\")' style=''   >   $b </td>
																													";
																													if ($c%5==0) {
																														echo "<tr>";
																													}
																												}
																												echo "</table>";
																											?>			 
																										</div>

																										<!--  new version -->
																											<input   value="<?php echo $modal['occasion']; ?>" style="width:100%; padding:5px;border:none"   id="occasion" class="occasion"   placeholder='Where can you wear this?'   title="put a comma after word to add tag." type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'occasion' , 'autocomplete-dropdown-loader-occasion' , 'autocomplete-dropdown-container-occasion' , 'occasion' , '' , true )" />   
																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-occasion" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-occasion"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-occasion" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div> 
																						 			</td> 
																						 			<td style="background:white; border:1px solid white" >  
																										<input  style="width:100%;display:none"  type='text' value='<?php  echo $season; ?>' id='input345' class='season'      placeholder='During what seasons can you wear this?'   style="width:248px; border:1px solid none;float:right"  onclick="hide_all_open_dropdown('none','res_season','none')";  >
																										<div style='' class='res_season' id='res_season'  style="display:none" > 
																											<?php 
																												$a =array('Winter','Spring','Summer','Fall');
																												$c=0;	
																												echo "<span onclick='close_x()' class='x_out'  title='(close)' >x</span>";
																												echo " <br> <center> <span>Session </span></center> <br>";
																												echo "<table border=0>" ;				 		 
																												for ($i=0; $i < count($a) ; $i++) { 
																													$c++;
																													$b=$a[$i];
																													echo "
																													<td><p onclick='remove_Selected_taggs(\"$b\");hide_x_beore_session_name(\"$i\")'  id='remove_tags_session_$i' class='remove_tags_session' >x</p></td>
																													<td onclick='get_clicked_session(\"$b\",\"$i\")' style=''   >   $b </td>
																													"; 
																													if ($c%5==0) {
																														echo "<tr>";
																													}
																												}
																												echo "</table>";
																											?>
																										</div> 

																										<!--  new version -->
																											<input value="<?php echo $modal['season']; ?>" style="width:100%; padding:5px;border:none"   id="season"    placeholder='During what seasons can you wear this?'  title="put a comma after word to add tag."  type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'season' , 'autocomplete-dropdown-loader-season' , 'autocomplete-dropdown-container-season' , 'season' , '' , true )" />   
																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:244px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-season" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-season"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-season" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div>  
																						 			</td>  
																						 			<td style="background:white; border:1px solid white" >  
																						 				<!--  new version --> 
																							 				<input type="texRt" placeholder='keyword' style="width:100%;display:none"   />  
																							 				<input value="<?php echo $modal['keyword']; ?>" style="width:100%; padding:5px;border:none"   id="keyword"   placeholder='Tags'  title="put a comma after word to add tag." type='text' onkeyup="modal( 'modal-attribute' , 'search' , 'keyword' , 'autocomplete-dropdown-loader-keyword' , 'autocomplete-dropdown-container-keyword' , 'keyword' , '' , true )" />
																						 					<div id="label-look-dropdown-container" style="margin-top:33px;width:243px;" >  
																											    <div class="autocomplete-dropdown-container" id="autocomplete-dropdown-container-keyword" >  
																											    	<center><div id="autocomplete-dropdown-loader-cotainer"  class="autocomplete-dropdown-loader-cotainer-keyword"   >  <?php $mc->image( array( 'type'=>'loader' , 'id'=>"autocomplete-dropdown-loader-keyword" ,'style'=>'visibility:visible;height:10px;'  ) ); ?></div></center>  
																											    </div> 
																											</div> 
																						 			</td>  
																						 			<td style='display:none' >  
																										<input  style="width:100%"   type='text' value='<?php  echo $style; ?>' id='input345' class='style'       onclick='retrieve_style_list()'  >
																										<div style='' class='res_style' id='res_style'> 
																										</div>
																						 			</td>
																					 		</table> 
																					 	</td> 
																					<!--  	
																					<tr> 
																				 		<td> 
																							<div style="position: absolute;float: left;margin: 20px 0px 0px 0px; ">  
																								 
                               																	<input type="checkbox" name="post-look-agreement" id="post-look-agreement" <?php echo (!empty($_COOKIE['isAgreed']))? 'checked' : ''; ?> > Agree Term <a href="agreement" target="_blank"> read </a>
																						 </div> 
																						</td> 
																					-->
																				</table>  
																			</div>   
																		</td>
											 						<tr> 
											 							<td style="border:1px solid none; " > 
											 								<!-- this is the reason of the free space of the bottom area -->
											 								<div id='footer' > 	  
																				<div id='tag_list' style='display:none; border:1px solid none; width:100%; '   >  
																					<ul style="display:block" >
																						<li><div style="color:#b32727;font-size:30px;font-family:'misoRegular';" > TAGS </div> </li>
																						<li><div style='margin-left:20px;padding-top:4px;' >  
																							When labeling all items in this photo only fill in the fields that relate to the item.
																						</div></li>
																					</ul> 
																 				</div>   
																 				<br>
																 				<style type="text/css">
																 					.tagged_occasion { 
																 						color: #fff;
																 					}
																 				</style>  
																 				<!-- the block box -->
																 					<div style="display:none" >
																		 				<div id='hastag_box_list' style='display:none; border: 1px solid none'> 
																		 					<table border=0> 
																			 					<?php
																			 					$c=0;
																			 					echo " 
																			 					<table>
																			 						<td>Accasion:</td> <td><a href='#'><span class='hashtag_occasion'></span></a></td><tr>
																			 						<td>Season:</td> <td><a href='#'><span class='hashtag_season'></span></a></td><tr>
																			 						<td>Style :</td> <td><a href='#'><span class='hashtag_style'></span></a></td><tr>
																			 					</table> "; 
																			 					for ($i=0; $i <15 ; $i++) { 
																			 						$c++;
																			 						?>
																			 						<style type="text/css">
																			 							#tagged_list_<?php echo $c ?>{
																											 display: none;
																										}
																			 						</style>
																			 						<?php 
																			 						echo " <table border=1 id='tagged_list_$c' class='tagged_list_'  > ";
																				 						echo "<td id='tagged_num_$c' style='cursor:pointer;width:61px'> Item# $c </td> ";
																				 						for ($j=0; $j <6 ; $j++) {  
																				 						echo "<td>";
																				 							 echo "<a href='#'><span style='display:block;color:white !important' id=hashtag_".$c."_".$j." ></span><span> hashtag_".$c."_".$j." </span></a>";
																				 						echo "</td>";
																				 						}
																				 					echo "<table>";
																			 					}
																			 					 ?>
																		 					</table>
																		 				</div>   

																	 				<!-- save buttons and shares -->  
																	 				
																		 				<!-- <br><br><br><br><br> -->
																		 				<div id='into_ready_to_be_saved_in_db' style='display:none' ></div>
																		 				<div id='db_res'  style='display:none' > result here</div> 
																		 				<!-- <br><br>   -->
																						<div id='post_on' style="display:none" > 
																							<table border="0" cellpadding="0" cellspacing="0" >
																								<tr>
																								 	<td  style="width:300px;"  >  
																								 		<span  style="color:#b32727;font-size:30px;font-family:'misoRegular';" >POST THIS LOOK ON:</span><br> 
																										<table border="0" cellpadding="0" cellspacing="0" style="width:220px;" > 
																											<tr> 
																												<td style="width:20px;" >  
																													<img src="fs_folders/images/genImg/postalook-grey-check.png" id="new-postalook-label-share-to-fb-check" onclick='new_postalook_label_share(  "#new-postalook-label-share-to-fb" )'   />   <br>
																													<input type="text" value="not share fb" id="new-postalook-label-share-to-fb"    />  
																												</td>
																												<td> 
																													<span onclick='new_postalook_label_share(  "#new-postalook-label-share-to-fb" )' style='cursor:pointer' >Facebook</span>  
																												</td>
																											<tr> 
																												<td style="width:20px;" > 
																													<img src="fs_folders/images/genImg/postalook-grey-check.png" id="new-postalook-label-share-to-tw-check"  onclick='new_postalook_label_share(  "#new-postalook-label-share-to-tw" )'  > 
																													<input type="text" value="not share tw" id="new-postalook-label-share-to-tw"    /> 
																												</td>
																												<td> 
																													<span onclick='new_postalook_label_share(  "#new-postalook-label-share-to-tw" )' style='cursor:pointer' > Twitter</span>  
																												</td>
																										</table>
																								 	</td>    
																								 	<td> 
																								 		<span style="color:#b32727;font-size:30px;font-family:'misoRegular';" > WANT FEEDBACK? </span><br>
																										<table border="0" cellpadding="0" cellspacing="0" > 
																											<tr> 
																												<td style="width:20px;" >  
																													<img src="fs_folders/images/genImg/postalook-grey-check.png"  id="new-postalook-label-constructive-feedback-check"  onclick='new_postalook_label_share(  "#new-postalook-label-constructive-feedback" )'  >  
																													<input type="text" value="no feedback" id="new-postalook-label-constructive-feedback" /> 
																												</td>
																												<td> 
																													<span style='cursor:pointer' onclick='new_postalook_label_share(  "#new-postalook-label-constructive-feedback" )' > 
																														Receive constructive feedback to help improve your styling ability.
																													</span>  
																												</td> 
																											<tr> 
																												<td style="visibility:hidden" > v </td><td style="visibility:hidden" > <span>hidden </span>  </td> 
																										</table>
																									</td>  
																							</table>   
																							<!-- <span id='fbtw' > <input type='checkbox' onclick="share_fb()" id='fb_' />Facebook <input type='checkbox' onclick='share_tw()' id='tw_' /> Twitter</span> -->  
																						</div> 	   
																						<div id='save' style="border:1px solid none;width:142px; margin-top:-100px;display:none" >  
																							<div id="new-postalook-post-cancel-submit" >
																								<!-- <div>  -->    
																								<!-- 	<table border="0" cellpadding="0" cellspacing="0" style="display:none"  > 
																										<tr> 
																											<td>  
																												<div style="margin-top:5px;" >  
																													<a href="\" onmousemove=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel-hover.png' )" onmouseout=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel.png' )"  >
																														<img src="fs_folders/images/genImg/new-postalook-post-cancel.png" id="new-postalook-upload-button-cancel" />   
																													</a>  
																												</div>  
																											<td>
																											<td>
																												<div > 
																													<input type="submit" name="uploadNow" value="" onclick='save_all_data_to_db()'  id ='submt' onmousemove="mousein_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look-mouse-over.png)'   )"  onmouseout="mouseout_change_background_image (  '#submt' , 'url(fs_folders/images/genImg/postalook-upload-look.png)'   )"   />  
																												</div>	
																											</td> 
																									</table>  -->
																								<!-- </div>   -->
																							</div> 
																							<!-- <img src="fs_folders/images/genImg/postalook-submit-look.png" style="cursor:pointer" id ='submt' onclick='save_all_data_to_db()'/>   --> 
																							<!-- <input type='submit' value = 'SAVE' onclick='save_all_data_to_db()'  id ='submt' />  -->
																						</div>		  
																					</div> 
																					<div style="border:1px solid none;width:200px; margin-left:-74px; margin-top: -20px;" > 
																						<table>
																							<tr> 
																								<td>  
																									<!-- <input type="button" value="cancel" onclick=" fs_popup( 'close' ) " />    --> 
																									<img
																										id="postarticle-cencel"     
																										src="<?php echo "$mc->genImgs/cancel.png"; ?>" 
																										onclick=" fs_popup( 'close' ) " 
																										onmousemove=" mousein_change_button ( '#postarticle-cencel' , '<?php echo "$mc->genImgs/cancel-mouse-over.png"; ?>' )" 
																										onmouseout="mouseout_change_button (  '#postarticle-cencel'  , '<?php echo "$mc->genImgs/cancel.png"; ?>' ) "  
																									/> 
																								</td>
																								<?php if ( $method == 'edit' ): ?> 
																									<td> 
																										<img   
																											id="postarticle-submit"     
																											src="<?php echo "$mc->genImgs/post.png"; ?>" 
																											onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' , '' , '' , '' , '<?php echo $method; ?>' , '<?php echo $table_id; ?>' ) " 
																											onmousemove=" mousein_change_button ( '#postarticle-submit' , '<?php echo "$mc->genImgs/post.png"; ?>' )" 
																											onmouseout="mouseout_change_button (  '#postarticle-submit'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) " 
																										/>
																										<!-- <input type="button" value="post modal" onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' , '' , '' , '' , '<?php echo $method; ?>' , '<?php echo $table_id; ?>' ) " /> -->
																									</td>
																								<?php else: ?> 
																									<td>
																										<img   
																											id="postarticle-submit"    
																											src="<?php echo "$mc->genImgs/post.png"; ?>" 
																											onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required', '', '', '', '', '', '', '#post-look-agreement') " 
																											onmousemove=" mousein_change_button ( '#postarticle-submit' , '<?php echo "$mc->genImgs/post-mouse-over.png"; ?>' )" 
																											onmouseout="mouseout_change_button (  '#postarticle-submit'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) "  />
																										<!-- <input type="button" value="post modal" onclick="modal ( 'modal-attribute' ,  'insert' , 'post-modal' , '.look_name' , 'Title Required' ) " /> -->
																									</td>
																								<?php endif;?> 
																								<td> 
																									<?php $mc->image( array( 'type'=>'loader' , 'id'=>"post-modal" ,'style'=>'visibility:hidden;height:10px;width:10px;'  ) ); ?>
																								</td>
																						</table>
																					</div>
																			</div> 
																		</td> 
																	<tr> 
																</table>  
															</div>
														</div>  
													</div> 
											</center> 
										</body> 
									<html> <?php  
	 			 			break;
	 			 		case 'hide-this-post':
 								switch ( $type ) {
 									case 'design':   ?> 
 												<center> 
			 			 							<div id="flag-modal-container" > 
			 			 								<table border="0" cellpadding="0" cellspacing="0" >	
			 			 									<tr> 
			 			 										<td   > <div style="padding-bottom:5px;" ><span>Are you sure you want to hide this post ? </span> </div></td>
			 			 									<tr> 
			 			 										<td>   
			 			 										</td>
			 			 									<tr> 
			 			 										<td> <textarea rows="4" cols="20" placeholder='Add your comment here. . .' id="flag-comment" ></textarea></td> 
			 			 									<tr>
			 			 										<td style="padding-top:5px;" >  
			 			 											<table style="width:auto;margin-left:-3px;" border="0" cellpadding="0" cellspacing="0"  >
			 			 												<tr> 
			 			 													<td> <input type="button" value="cancel" onclick="fs_popup( 'close' )" /> </td>
			 			 													<!-- <td> <input type="button" value="submit" onclick="send_flag('popup-response', '<?php echo  $table_name ?>', '<?php echo $table_id ?>', '<?php echo $comment ?>', 'hide-this-post', 'function')" /> </td> -->
			 			 											
			 			 													<td> 
			 			 														<input type="button" value="submit" onclick="send_flag( 'hide post' , '<?php echo $table_id ?>', '<?php echo $table_name ?>' , '', 'flag_post_hide_save')"  >    
									          		 
												 
			 			 													</td>
			 			 											</table>
			 			 										</td>
			 			 								</table> 
			 			 							</div>
		 			 							</center>  
 												<?php  
 										break;  
 										case 'function':
 											echo 'This is function function';
 										break;   
 									default:
 										echo "string";
 										break;
 								} 
	 			 			break;
	 			 		case 'flag':
	 			 				switch ( $type ):
	 			 					case 'design':  
	 			 						$options = array( 
		 			 						'Photo is not member.',
		 			 						'Photo contains nudity.',
											'Photo is an ad or spam.',
											'Photo has multiple outfits.',
											'Photo has multiple people.',
											'Not a full body photo. (head to toe)',
											'Photo infringes copyrighted material.',
											'Look was posted in the wrong category.',
											'Photo contains text, graphics or extreme editing.'
										); 

	 			 					?>
			 			 						<center> 
			 			 							<div id="flag-modal-container" > 
			 			 								<table border="0" cellpadding="0" cellspacing="0" >	
			 			 									<tr> 
			 			 										<td style="border-bottom:1px solid grey" > <div style="padding-bottom:5px;" ><span>If you think that this photo is not following the site rules please identify what is it and add some comments.</span> </div></td>
			 			 									<tr> 
			 			 										<td>  
				 			 										<table style="margin-left:-5px;" border="0" cellpadding="0" cellspacing="0" id="flag-option-table"  >
				 			 											<?php 
				 			 												for ($i=0; $i < count($options) ; $i++):
					 			 												$op = $options[$i];   
					 			 												echo "  
							 			 											<tr> 
							 			 												<td> <input type='checkbox' name='option-$i' id='option-$i' value='$op' /><span>$op</span></td>  
						 			 											";
				 			 											endfor;  
				 			 											?> 
				 			 										</table>
			 			 										</td>
			 			 									<tr> 
			 			 										<td> <textarea rows="4" cols="20" placeholder='Add your comment here. . .' id="flag-comment" ></textarea></td> 
			 			 									<tr>
			 			 										<td style="padding-top:5px;" >  
			 			 											<table style="width:auto;margin-left:-3px;" border="0" cellpadding="0" cellspacing="0"  >
			 			 												<tr> 
			 			 													<td> <input type="button" value="cancel" onclick="fs_popup( 'close' )" /> </td>
			 			 													<!-- <td> <input type="button" value="submit"  />  </td> -->
			 			 													 <td><input type="button" value="submit" onclick="send_flag( 'flag post' , '<?php echo $table_id ?>', '<?php echo $table_name ?>' , '', 'flag_post_save')"  >   </td> 
			 			 											</table> 
			 			 										</td>
			 			 								</table> 
			 			 							</div>
			 			 						</center> 
	 			 							<?php  
	 			 						break;
	 			 					case 'flag-add':
	 			 						 	echo " check if flag exist if not exist then add new flag ";  
	 			 						break;
                                    case 'function':
                                        echo "This is the function";
	 			 					default: 
	 			 						break;
	 			 				endswitch;  
	 			 			break;
	 			 		default: 
	 			 			break;
	 			 	} 
	 			break;
	 		case 'messaging': 

	 				 switch ( $type ) {
	 				 	case 'insert-message': 
	 				 			// echo " inserted <br> adsasd <br> ";
	 				 			// this is to be change to no more insert only the returned msgno from the chat.php need to be session here to save time loading 
	 				 				$msgno    =  $mc->fs_message(    array( 'type'=>'get-or-add-message-id',  'mno' => $mno,  'mno1' => $mno1  ) ); 
	 				 				$mc->message(  " get or add message no  " , $msgno , "  msgno =  $msgno " ); 
	 				 			// insert message 
	 				 				$response =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'comment-insert'  ,   'mno'=>$mno, 'comment'=>$message, 'table_name'=>'fs_message', 'table_id'=>$msgno )  );   
	 				 				$mc->message( " new comment  added to [$mno1] and comment id = [$response] " , $response , null ); 
	 				 			// update time and current user sent a message 
	 				 				$response = $mc->update_fs_table_auto( null ,  array( 'mno2'=> $mno1 , 'date'=>$mc->date_time , 'status' => 1 , 'idname'=>'msgno' , 'idval'=>$msgno ) , 'fs_message' );  
	 				 				$mc->message( "update mno1 = [$mno1] , time = [$mc->date_time]  and status = [1] " , $response , null ); 
	 				 				// echo "this is the insert message <br> "; 
	 				 		break; 
	 				 	case 'check-and-print-new-message': 
							
	 				 			# initialized 

		 	 					
	 				 				$print = false;


								//current_total_message : your current total message recieved 
		 				 		//new_total_message:  your new total message recieved 

	 				 			// set cockie name
		 				 	 		$sessionkeyword = "current_total_message_$mno1";  
		 				 	 	

	 				 	 		// assign variable to cockie

	 				 				$current_total_message =  $_COOKIE["$sessionkeyword"];    

	 				 			// mno interchange because programm checking if there is a new message for the current user login  

								// $new_total_message = $mc->fs_message(   array(  'type'=>'get-total-message',  'mno' => $mno1,  'mno1' => $mno  ) );

		 				 		// this is to be change to no more insert only the returned msgno from the chat.php need to be session here to save time loading 
									$msgno    =  $mc->fs_message(    array( 'type'=>'get-or-add-message-id',  'mno' => $mno,  'mno1' => $mno1  ) ); 


								// get new total messages from chatmate
									$new_total_message = $mc->posted_modals_comment_Query (   array( 'table_name'=>'fs_message',   'table_id'=>$msgno,  'mno1'=>$mno1, 'comment_query'=>'get-total-comment-by-chatmate'  )  );


									echo " $new_total_message != $current_total_message  <br><BR><BR><BR><BR> ";

								// set print new message when new messages found

									if ( $current_total_message  == 0 ){
										setcookie( $sessionkeyword  , $new_total_message , time()+3600);   
									}
									else if ( $new_total_message != $current_total_message ) {
										$print = true; 
		 								setcookie( $sessionkeyword  , $new_total_message , time()+3600); // store to cockie or session the new total message.  
									}
	 
								// print output
									echo " mno1 = $mno1 , mno = $mno current_total_message = $current_total_message  and new_total_message = $new_total_message <br> "; 
							 		// echo " total message $new_total_message <br>"; 
							 	 	


						 	 	// print new message
						 	 
									if ( $print == true ) {
										// get last message of your chatmate  
											$limit_start               = 0; 
											$limit_end                 = 1;  
											$variable['message']       = $mc->posted_modals_comment_Query (   array( 'comment_query'=>'get-all-comment-by-tbn_and_tbid' , 'table_name'=>'fs_message',   'table_id'=>intval($msgno),  'where'=>" mno = $mno1 "  ,  'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end  )  );  
											$variable['mno']   		   = $variable['message'][0]['mno']; 
	 										$variable['comment']       = $variable['message'][0]['comment']; 
	 										$variable['date']          = $variable['message'][0]['date']; 
	 										$fullname                  =  $mc->get_full_name_by_id( $variable['mno'] );
	 

											// $mc->print_r1( $response );  
											// echo " new message found <br> ";   
											// $fullname                  = 'jesus erwin suarez ';
											$content  = "<b>$fullname:</b>  $variable[comment] "; 

											?> 
										 	<modal>    
											 	<table border="0" cellpadding="5" cellspacing="0" id="chat-message-table"  >
													<tr> 
														<td id='chat-profilepic' > 
															<div >
																<?php 
																	$mc->member_thumbnail_display( $mc->ppic_thumbnail , $variable['mno']  , "../../../$mc->ppic_thumbnail" , null , '35px;'  );    
																?> 
																 
															</div> 

														</td>
														<td>
															<div id="chat-message" > 
																<?php echo " $content "; ?> 
															</div>   
															<div id="chat-date" >   
																<?php echo "new" ?>
															</div>  
														</td>
												</table> 
											</modal> 
										 <?php 
										// echo " new message not found <br> ";
									}   
									else{ 		
										echo " <modal>no new message<modal>  <br>";
									}   
	 				 		break; 
	 				 	case 'update-all-notification-to-oppend-counter': 

	 				 			# this is the code 
	 				 		break;
	 				 	case 'message-typing':

	 				 		 # update sensor = 1 to detect that the chatmate is typing 

	 				 			// sensor = 1  means not writing idle
	 				 			// sensor = 2  means writing  
	 				 				$msgno    =  1;
		 				 			$response = mysql_query( " UPDATE fs_message SET sensor  = 1 WHERE msgno = $msgno and mno  = $mno and sensor = 0  " );  // true found answer 1 or 2  
		 				 			$response = mysql_query( " UPDATE fs_message SET sensor1 = 1 WHERE msgno = $msgno and mno1 = $mno and sensor1 = 0 " ); // false not found 
	 				 		break;
	 				 	case 'view-more-message':
	 				 			$_SESSION['msg_limit_start'] += $_SESSION['msg_limit_end'] ; 
	 				 			$variables['response'] = $mc->fs_message(    
							    	array( 
							    		'type'       => 'get-all-message-id',     
							    		'mno'    	 => $mno , 
							    		'orderby'    => 'order by msgno desc' ,   
							    		'limit_start'=> $_SESSION['msg_limit_start'],   
							    		'limit_end'  => $_SESSION['msg_limit_end']  
							    	)  
							    );      
	 				 		 	$mc->notification_design_message( $variables['response'] , null , $mno ); 
	 				 		break;
	 				 	case 'view-messages-load':

	 				 		 	// $_SESSION['msg_limit_start'] += $_SESSION['msg_limit_end'] ; 


	 				 			/* 
	 				 			 * update mno2 = 133 and status = 1 to status = 0 
	 				 			 * to hide the messages notification 
	 				 			 */

					 				$response = mysql_query( " UPDATE fs_message SET status = 0 WHERE mno2 = $mno and status = 1 " ); 
					 				// $mc->message( " where  mno2 = $mno status = 1 set status = 0 update " , $response , null );  
	 				 			 

	 				 			/*
								 * print latest 10 messages modals
	 				 			 */ 

									$_SESSION['msg_limit_start'] = $_SESSION['msg_limit_start_init'];  
									$_SESSION['msg_limit_end']   = $_SESSION['msg_limit_end_init'];

		 				 			$variables['response'] = $mc->fs_message(    
								    	array( 
								    		'type'       => 'get-all-message-id',     
								    		'mno'    	 => $mno , 
								    		'orderby'    => 'order by date desc' ,   
								    		'limit_start'=> $_SESSION['msg_limit_start'],   
								    		'limit_end'  => $_SESSION['msg_limit_end']  
								    	)  
								    );    
							    /*
							    * print modals
							    */  
	 				 		 		$mc->notification_design_message( $variables['response'] , null , $mno ); 
	 				 		break;
	 				 	default:  
	 				 		break;
	 				 } 
	 			break;
	 		case 'header': 
	 			 	switch ( $type ) {
	 			 		case 'search-field': 

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
			 			 					'where'=> "keyword LIKE '%$keySearch%'  and table_name = 'fs_postedarticles' ",
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

	 			 			break; 
	 			 		case 'search-field-view-more': 

	 			 				# initialized 

									$view_more 		      = $_SESSION['view_more'];    
									// $keySearch         = $_SESSION['keySearch'];     

				 				# print retrieved and print modal 

				 					switch ( $table_name ):
	 			 						case 'fs_members': 

		 			 							# initialize sission 

		 			 								$_SESSION['counter_member'] = $_SESSION['counter_member'] + $view_more ;  
		 			 								$limit_start                = $_SESSION['counter_member'];   

	 			 								$member = $mc->fs_search( 
						 			 				array( 
						 			 					'type'=>'select',
						 			 					'where'=> "keyword LIKE '$keySearch%' and table_name = 'fs_members' ",
						 			 					'orderby'=> 'sno asc',
						 			 					'limit_start'=>$limit_start,
						 			 					'limit_end'=>$view_more
						 			 				)
						 			 			); 		 





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
								 			 							<div id='search-container-result-div' style='border:1px solid none;' >   
								 			 								<table  border='0' cellspadding='0' cellspacing='2' style='  style=' border-right:2px solid none;  '  > 
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
	 			 							break;
	 			 						case 'fs_postedarticles': 

	 			 								# initialize sission  

		 			 								$_SESSION['counter_article'] = $_SESSION['counter_article'] + $view_more;  
		 			 								$limit_start                = $_SESSION['counter_article'];   

					 							$article = $mc->fs_search( 
						 			 				array( 
						 			 					'type'=>'select',
						 			 					'where'=> "keyword LIKE '$keySearch%' and table_name = 'fs_postedarticles' ",
						 			 					'orderby'=> 'sno desc',
						 			 					'limit_start'=>$limit_start,
						 			 					'limit_end'=>$view_more
						 			 				)
						 			 			); 		 
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
									 			 				$articleinfo  = select_v4( array( 'type'=>'select',  'tablename'=>'fs_postedarticles', 'rows'=>'title,trating,tpercentage',    'where'=>" artno = $table_id " ) ); 
									 			 				 
									 			 			  	$title        = $articleinfo[0]['title'];
									 			 				$desc         = "percentage (".$articleinfo[0]['tpercentage']."%) ";    
									 			 				$desc        .= " rating (".$articleinfo[0]['trating'].")";   

									 			 				$content      = "<b>$title</b>  <br><span style='font-size:8px;font-family:arial' > $desc </span>";    
									 			 			# print modal info   
															echo "  
																 <a href='$link' >   
							 			 							<div id='search-container-result-div'  >   
							 			 								<table  border='0' cellspadding='0' cellspacing='2' style='  style=' border-right:2px solid none;  ' > 
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
	 			 							break;
	 			 						case 'postedlooks':

		 			 							# initialize sission 

				 									$_SESSION['counter_look'] = $_SESSION['counter_look'] + $view_more;  
					 								$limit_start                = $_SESSION['counter_look'];   
	  
	 			 								$look  = $mc->fs_search( 
						 			 				array( 
						 			 					'type'=>'select',
						 			 					'where'=> "keyword LIKE '$keySearch%' and table_name = 'postedlooks' ",
						 			 					'orderby'=> 'sno desc',
						 			 					'limit_start'=>$limit_start,
						 			 					'limit_end'=>$view_more
						 			 				)
						 			 			);   
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
	 			 							break; 
	 			 						default: 
	 			 							 	echo " this is the comment area "; 
	 			 							break;
	 			 					endswitch; 	  
	 			 			break;
	 			 		default: 
	 			 			break;
	 			 	}   
	 			break;
	 		case 'fs-flag': 
					$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $table_id and table_name= '$table_name' and mno = $mno "  )  );     
					if ( empty($response) ) {
						$response = $mc->fs_flag( array(  'type'=> 'insert', 'mno'=>$mno, 'table_name'=> $table_name, 'table_id'=> $table_id,  'comment'=> $comment ) );    
						$mc->message( 'flagged ', $response , '' ); 
					}
					else{
						echo " already flagged <br>"; 
					} 
	 			break;
	 		case 'fs-view': 

	 			 	#codes here
	 		  	break;
	 		case 'modal-detail':

	 				# INITIALIZE MODAL

		 				$modal['table_name']     = ( !empty($_GET['table_name']) )    ? $_GET['table_name']    : 'postedlooks' ;  			
		 				$modal['table_id']       = ( !empty($_GET['table_id']) )      ? $_GET['table_id']      : 0 ;  			 
		 				$modal['orderby']        = ( !empty($_GET['orderby']) )       ? $_GET['orderby']      : 'cno desc' ;  			 
		 				$modal['key']            = 'plno';
		 				$modal['imagetype']      = 'thumbnail';
		 				$modal['src']            = '';
		 				$modal['id']             = 0;   
		 				$modal['small']          = ''; 
		 				$modal['tres']           = 0;  
		 				$modal['imgpath']        = '../../../';
		 				$comment['pagenum']      = ( !empty($_GET['pagenum']) )      ? $_GET['pagenum']    : 1 ;   
		 				$comment['tshow']        = ( !empty($_GET['tshow']) )        ? $_GET['tshow']    : 10 ;   
		 				$modal['more_len']       = 0 ; 
		 				$modal['position']       = 0 ; 



		 			switch ( $process ): 
		 				case 'load-thumbnail': 
				 				# QUERY MODAL  
		 				
		 							// get session 

					 					$modal['mno'] = $_SESSION['modal'][0]['mno'];   
						 				switch ( $modal['table_name'] ): 
						 					case 'fs_postedarticles':

						 							
						 							// get specific modal  
							 						  	$modal['modal'] = $mc->fs_postedarticles( 
													    	array( 
														      	'aticle_type'=> 'select',
														      	'limit_start'=>0,
														      	'limit_end'=>30, 
														      	'orderby'=> 'artno desc',
														      	'where'=>"mno = $modal[mno] and not artno = " . $modal['table_id'] 
														    ) 
													    );      
							 						   $modal['key'] = 'artno';   
							 						   $modal['tres'] = count($modal['modal']); 

						 						break; 
						 					default: 
						 						break;
						 				endswitch;    
				 				# PRINT MODAL THUMBNAIL 
					 				for ($i=0; $i < $modal['tres']; $i++):  

					 				 	// INIT 
							 					$modal['table_id']  = $modal['modal'][$i][$modal['key']]; 

							 				    // $modal['src']       = $mc->modal(  
							 				    // 	array( 
						 				    	// 		'table_name' =>$modal['table_name'], 
						 				    	// 		'table_id' =>$modal['table_id'], 
						 				    	// 		'type' =>'get-modal-image' , 
						 				    	// 		'size'=>'small' 
							 				    // 	) 
						 			    		// );   
						 					# get image src 
						 						// thumbnail
												  	$modal['src']  = $mc->image( 
													    array(
													        'table_name'=>$modal['table_name'],
													        'table_id'=>$modal['table_id'],
													        'type'=>'get-default-image-src',
													        'size'=>'thumbnail', 
													        'path'=>$modal['imgpath']
												      	)
												 	);	
											  	// home 
												 	$modal['src_1']  = $mc->image( 
													    array(
													        'table_name'=>$modal['table_name'],
													        'table_id'=>$modal['table_id'],
													        'type'=>'get-default-image-src',
													        'size'=>'home', 
													        'path'=>$modal['imgpath']
												      	)
												 	);	


					 					//PRINT    
										    // echo "<li >    <img src='$modal[src]'  onmousemove='mouse_enter(\"#follow_div\",\"$modal[table_id]\" ,\"$modal[src_1]\" )'  onmouseout='mouse_out(\"#follow_div\")'   onclick='modal_thumbnail ( \"$modal[table_name]\" , \"$modal[table_id]\" , \"original\" , \"modal-thumbnail-loader\" , \"generate-specific-modal-detail\" , \"modal-detail\" )'   /> </li> "; 
					 				    	echo "<li > 
					 				    		<a href='articledetails-dev.php?id=$modal[table_id]' >
					 				    			<img src='$modal[src]'  onmousemove='mouse_enter(\"#follow_div\",\"$modal[table_id]\" ,\"$modal[src_1]\" )'  onmouseout='mouse_out(\"#follow_div\")'     /> 
					 				    		</a> 
					 				    	</li> "; 

					 				endfor;    
		 					break; 
		 				case 'generate-specific-modal-detail':   
		 						# RETRIEVE MODAL INFO 
		 							switch ( $modal['table_name'] ): 
					 					case 'fs_postedarticles': 
					 						# GET THE SPECIFIC MODAL INFO

					 						  	$modal['modal'] = $mc->fs_postedarticles( 
											    	array( 
												      	'aticle_type'=> 'select',
												      	'limit_start'=>0,
												      	'limit_end'=>1, 
												      	'orderby'=> 'artno desc',
												      	'where'=>"artno = $modal[table_id] " 
												    ) 
											    );       

											    $modal['mno'] = $modal['modal'][0]['mno']; 

											    // get specific modal  
						 						  	$modal['modal_more'] = $mc->fs_postedarticles( 
												    	array( 
													      	'aticle_type'=> 'select',
													      	'limit_start'=>0,
													      	'limit_end'=>30, 
													      	'orderby'=> 'artno desc',
													      	'where'=>"mno = $modal[mno] " 
													    ) 
												    );      

					 						   // $modal['key'] = 'artno';   
					 						   $modal['more_len'] = count($modal['modal_more']);
					 						   $modal['position'] = $mc->get_modal_position_detail( $modal['table_id'] , $modal['modal_more'] , 'artno' );  
					 						break;   
					 					default: 
					 						break;
					 				endswitch;     
					 			# GET SESSION  
		 						   	$modal['modal_more'] = $_SESSION['modal_more'];   
		 						   	$modal['nextprev']   = $_SESSION['nextprev']; 
					 			# INITIALIZED MODAL INFO


					 					# get next prev   
											$modal['nextprev'] = $mc->db_result_next_prev(  $modal['table_name']  , $modal['table_id'] , $modal['modal_more'] , 'all' );  
											// $mc->print_r1( $modal['nextprev']);  
										  	// echo " total comments are $modal[comments_len]     <br> "; 
										  	// $mc->print_r1($modal['modal'] );   
											// $mc->print_r1( $modal['modal_more'] ); 
	 
										# get image src 
										  	$modal['src']  = $mc->image( 
											    array(
											        'table_name'=>$modal['table_name'],
											        'table_id'=>$modal['table_id'],
											        'type'=>'get-default-image-src',
											        'size'=>'detail', 
											        'path'=>$modal['imgpath']
										      	)
										 	);	




					 					# MODAL DISPLAYED  
	 
											$modal['next']                              = $modal['nextprev']['next']; 
										    $modal['prev']                              = $modal['nextprev']['prev'];  
											$modal['artno']                             = $modal['modal'][0]['artno'];
											$modal['mno']                               = $modal['modal'][0]['mno'];	  		
										    $modal['type']                              = $modal['modal'][0]['type'];
										    $modal['source_item']                       = $modal['modal'][0]['source_item']; 
										    $modal['title']                             = $modal['modal'][0]['title']; 
										    $modal['description']                       = $modal['modal'][0]['description']; 
										    $modal['keyword']                           = $modal['modal'][0]['keyword']; 
										    $modal['category']                          = $modal['modal'][0]['category']; 
										    $modal['topic']                             = $modal['modal'][0]['topic']; 
										    $modal['source_url']                        = $modal['modal'][0]['source_url'];  
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
										    $modal['modal_style']                       = $mc->lookdetails_set_size_of_the_look( $modal['imgpath'].$modal['src'] , $ri ); 
										    $modal['modalowner']                        = $modal['modal'][0]['date'];     
										    $modal['current']                           = $modal['table_id'];  
										    $modal['mno']                               = $mc->get_modal_owner( $modal['table_name'] , $modal['table_id'] );  
										    $modal['modalownername']                    = $mc->get_full_name_by_id( $modal['mno'] );   
											$modal['kind'] 								= 'ARTICLE'; 
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
											$modal['src_img_flag']         			    = "modal-flag-dot.png";//"modal-flag.png";  


									  	#USER OWNER MODAL  
										    $user['user']                               = $mc->get_user_full_fs_info( $modal['mno'] );     
										    $user['trating']                            = $user['user']['otrating']; 
										    $user['tfollower']                          = $user['user']['tfollowers']; 
										    $user['following']                          = $user['user']['tfollowing'];  
										    $user['tlook']                              = $user['user']['tlooks']; 
										    $user['tpercentage']                        = $user['user']['opercentage']; 
										    $user['username']                           = $user['user']['username']; 
			    							$user['profile_tab']  						= 'articles';
		 								 
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
												$modal['src_img_favorite']  = "look-icon-favorite-detail-yellow.png";  
											}

											$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $modal[table_id] and table_name= 'fs_postedarticles' and mno = $mno "  )  );   
											if ( !empty($response) ) {
												  $modal['src_img_flag']   = "large-flag-red.png";
											} 



										# set status of owner or not for the user not allow to rate , drip and favorite the modal
							 
											if ( $modal['mno'] == $mno ): 				

												$modal['stat_rated']	 =  'modal owner'; 
												$modal['stat_dripted'] 	 =  'modal owner'; 
												$modal['stat_favorited'] =  'modal owner';   

											endif; 

										/* 
										*  set view more for the article link  
										*/ 
											$more     = $mc->look_with_more( $modal['table_id'] , $modal['source_url'] , 'fs_postedarticles' );   
										#  get title url of the page 
										$url=page::set_url_for_modal_details($modal['table_id'],'article',$modal['topic'],$modal['date'],$modal['title']);?>  
										<style type="text/css">
											#posted-look-response { list-style: none; }
										</style> 
										<ul id="posted-look-response" >  
											<pagetitle><?php echo "$modal[title]-$modal[modalownername]-Fashion Sponge"; ?><pagetitle>  
											<pageurl><?php echo $url; ?><pageurl>   
											<pagemodal>   
												<table id="banner_view_and_look_view_table_container" border="0"  cellpadding="0" cellspacing="0" > 
											 		<tr>   
											 			<td> 
											 				<?php
											 				// echo "test1";
												 				// echo " plno =  $plno <br>  looks <br>";
											 					// print_r($looks);
																// $mc->arrow_left_right_pressed_for_next_prev( $plno ,  $looks );  
												            ?> 
											 			</td>
											 	    <tr>
														<td id='lbc_ads_banner' >  
															<table id="lbc-body-header" border="0" cellpadding="0" cellspacing="0"> 	
																<tr>  
																	<td>
																		<span id='feed'>  
																			<!-- ADVERTISEMENT -->
																		</span> 
																	</td>
																<tr> 
																	<td id="ads-banner" >  
																		<center>
																			<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
																				<img id='a-b' src="fs_folders/images/banner/new-sos-banner1.png" >
																			</a>
																		</center> 
																	</td>
																<tr> 
																	<td id='next_prev_td'>   

																		<a href="feed"  style='text-decoration:none' target="_parent" >
																			<span id='return_to_feed' title='return to feed'  > < < RETURN TO FEED </span>
																		</a> 
																		<div id='lookdetails-next-prev' > 
																			<table>
																				<tr> 
																					<td> 
																						<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-content-loader-prev" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																					</td>
																					<td> 
																						<span id='prev'   onclick="modal_thumbnail ( '<?php echo $modal['table_name']; ?>'  , '<?php echo $modal['prev']; ?>'  ,  'original'  , 'modal-content-loader-prev' , 'generate-specific-modal-detail' , 'modal-detail' )"   > 
																							PREVIOUS  
																						</span> 
																					</td>
																					<td style="padding-left:15px; padding-right:15px;" > 
																						<!-- <div id='next-prev-separator' > 
																							| 
																						</div>     -->
																						<div id="look-details-profile-look-owner-header-gray-bar"  style="margin-top:10px;" > 		 
											 											</div> 
																					</td>
																					<td> 
																						<span id='next' onclick="modal_thumbnail ( '<?php echo $modal['table_name']; ?>'  , '<?php echo $modal['next']; ?>'  ,  'original'  , 'modal-content-loader-next' , 'generate-specific-modal-detail' , 'modal-detail' )"   > 
																							NEXT 
																						</span>
																					</td> 
																					<td> 
																					<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-content-loader-next" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																					</td>
																			</table> 
																		</div>
																	</td>
																<tr>
																	<td> 
																		<div id='next_hr'> 
																		</div>
																	</td>
																<tr>  
																	<td id='look_title' > 
																		<div id='look-title-div-container' > 
																			<span>   
																				<?php   
																					//  $modal['title'] =  wordwrap( $modal['title'], 50, "<br />", true);
																					echo  $modal['title'];  
																					?>
																			</span>
																		</div>  
																	</td>
															</table> 
														</td> 
													<!-- look view -->
													<tr>  
														<td id='lbc_look_view' >   
															<table id='lbc_look_view_tc' border="0" cellpadding="0" cellspacing="0" > 
																<tr>  
																	<td id='look_view_header' >   
																		<div style="margin-top:-40px;border:1px solid none; " >
																			<?php   
																			  	$mc->print_look_details_look_owner_header(  
																					array(
																						'table_name'	          => $modal['table_name'],           // table name
																						'mno'                     => $mno, 		                    // user logon 
																						'mno1'                    => $modal['mno'], 		        // user viewer
																						'table_id'                => $modal['current'], 	        // current modal id 
																						'table_id_1'              => $modal['next'], 		        // next modal id 
																						'inside_modals'           => true, 		                // boolean 
																						'lookOwnerMno'            => $modal['mno'], 	            // mno owner of the modal
																						'lookOwnerName'           => $modal['modalownername'], 	    // modal owner name
																						'opercentage'             => $modal['tpercentage'],         // over all percentage of one look
																						'date_'                   => $modal['date'], 		        // date modal uploaded
																						'user_total_rating'       => $modal['trating'], 		    // trating of the sepcific modal
																						'user_total_followers'    => $user['tfollower'], 		    // tfollower of the owner modal
																						'user_total_following'    => $user['following'], 		    // tfollowing of the owner modal
																						'user_total_lookuploaded' => $user['tlook'],   	    	    // tlook of the owner modal
																						'link_edit' 			  => "#" 							// link edit
																					) 
																				);    
																			?> 
																		</div> 
																	</td>
																<tr>  
															<td id='look_view_img_td' style="height:450px;  " >   
																<center> 
																	<div id="load_look_picture_and_tags"  >
																		<?php  if (  $modal['type'] == 'image'):  ?> 
																		<?php $article_modal_style = 'margin-top: -60px;width:889px'; ?>
					      													<img src="<?php echo "$modal[src]" ?>" id='look_view_img' style='position:relative;width:100%;<?php echo $modal['modal_style']; ?>' />  
					      												<?php  else: ?>  
					      													<iframe src= "<?php echo $modal['source_item']; ?>?autoplay=1&showinfo=0&rel=0"  style='width:100%; height:390px; margin-top:-60px;' frameborder='0'  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					      												<?php 
					      													$modal['view_footer_id']  = 'lf_div_container1';
					      												endif; 
					      												?>  
				      												</div>  
																</center>  
															</td> 
														<tr>  
															<td id='lf_img_view_td'    >  
															 	<div id= "<?php echo $modal['view_footer_id']; ?>"  style=' border-radius:0px 0px 5px 5px; <?php echo "$article_modal_style"; ?> ' >

																	<?php 
															 			if ( $modal['mno'] != $mno ) {
															 				// $mc->print_choose_votes_version2( $mno , $plno , $plstyle );  
															 			} 
															 		?> 

															 		<center>
																 		<table id="lfdc_t2" style="margin-top:20px;   " border="0" cellpadding="0" cellspacing="0"  > 
																 			<tr>   
																 				<td id='percentage'  > 
																 					<span title='(<?php echo $modal['tpercentage']; ?>%) Article Rating'  id='tpercentage'style='font-size:20px;color:#fff' ><?php echo $modal['tpercentage']; ?></span><span style='font-size:15px;color:#fff' > %</span>
																 				</td> 
																 				<td id="modal-likethis" >
																 					<div>LIKES THIS</div> 
																 				</td>
																 				<td style="padding-right:20px;" >   
																 					<table style=" width:40px;" border="0"  > 
							  										 	 				<tr>  
							  										 	 					<td> 
							  										 	 						<img src="<?php echo "  $mc->genImgs/$modal[thumbsUp]"; ?>" title='like'          style='height:18px;'      class='postedlooks-like<?php echo $modal['table_id']; ?>'      onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'like' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $modal['table_id']; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $modal['category']; ?>' )" > 
							  										 	 					</td> 
							  										 	 					<td> 
							  										 	 						<div style="margin-top:6px;" > 
							  										 	 							<img src="<?php echo " $mc->genImgs/$modal[thumbsDown]"; ?>" title='dislike'   style='height:18px;'     class='postedlooks-dislike<?php echo $modal['table_id']; ?>'   onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'dislike' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $modal['table_id']; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $modal['category']; ?>' )"  > 
							  										 	 						</div>
							  										 	 					</td>
						  										 	 				</table>  
 
																 				</td>
																 				<td id='ldmtd' title="(<?php echo $modal['trating'] ?>) Total Rates" >    
																 					<?php   
																 						$mc->print_specific_look_ratings(  
																	 						array(
																	 							'trating'=>$modal['trating'],
																								'table_name'=>$modal['table_name'],
																								'table_id'=>$modal['table_id'],
																								'category'=>$modal['category']
																	 						)
																	 					);   
																 					?>  
																 				</td> 
																 				<td id='ld_eyes' >  
																	 				<img src="<?php echo $mc->path_icons;?>/Views-Icon.png" title="views" > 
																 				</td>
																 				<td> 
																 					<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( <?php echo "$modal[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"  >  
																 						<?php echo $modal['tview']; ?> 
																 					</span>
																 				</td> 
																 				<td id='total_arrow' > 	 
																 					<!-- <img src="<?php echo $mc->path_icons;?>/Drip-Icon.png"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Article' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-drip-selected.png"; ?>' , '<?php echo $modal['table_id']; ?>' )" >  -->
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Article' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-drip-selected.png"; ?>' , '<?php echo $modal['table_id']; ?>' , '#stat-look-dripted<?php echo $modal['table_id']; ?>'  )" >  
																 				</td>																																																						  
																	 			<td > 																																  
																	 				<span id='ttext'  class="modal-tdriped<?php echo $modal['table_id']; ?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'DRIPPED ( <?php echo "$modal[tdrip]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >  
																	 					<?php echo  $modal['tdrip']; ?> 
																	 				</span> 
																 				</td>
																 				<!-- <td id='total_heart' > 
																					<img src="<?php echo $mc->path_icons;?>/favorite-icon.png" title="Favorite">	
																 					<span id='ttext' > 9999+</span>
																 				</td> -->
																 				<td id='ld_star_with_cross'  > 
																 					<!-- <img src="<?php echo $mc->path_icons;?>/favorite-icon.png" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-selected.png"; ?>'  )"  >  -->
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_favorite]"; ?>" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-detail-yellow.png"; ?>' , '<?php echo $modal['tfavorite']; ?>' ,'#stat-look-favorited<?php echo $modal['table_id']; ?>'   )"  >  
																 				</td>  
																 				<td style="padding-left:10px;" > 
																	 				<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'FAVORITES ( <?php echo "$modal[tfavorite]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" > 
																	 					<?php echo  $modal['tfavorite']; ?> 
																	 				</span>
																 				</td>   
																 				<td id='ld_square_with_arrow'  > 
																 					<img src="<?php echo $mc->path_icons;?>/share-icon.png" title="share"   onmouseover="share_mouser_over('<?php echo $modal['table_id']; ?>')" onmouseout="share_mouser_out('<?php echo $modal['table_id']; ?>')" >
																 					 
																 				</td>
															 					<td> 
																 					<span id='ttext' > <?php echo $modal['tshare']; ?> </span>
																 				</td> 
																 				
																 				<?php  $mc->print_look_footer_flag_or_edit( $mno , $modal['mno'] , $modal['table_id'] , $modal['table_name']   , $modal['src_img_flag'] , "#" ); ?> 


																 				<?php  if (  $modal['type'] == 'image'): ?> 
																	 				<td id='ld_scope' >
																	 					<a href="z?i=<?php echo $modal['table_id']; ?>&tn=<?php echo $modal['table_name']; ?>"  target="_blank" >
																	 						<img src="<?php echo $mc->path_icons;?>/zoom-icon.png" title="zoom" >
																	 					</a> 	
																	 				</td>  
																 				<?php endif; ?>     
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
												  										<div style="border:1px solid none;position:absolute" >
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
																			 							'page'=>'detail',  
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

																 		<!-- validator -->
										 								<div id="status-container" style='display:none'   >
								 											<input type="text" value="<?php echo "$modal[stat_rated]"; ?>"       id="stat-look-rated<?php echo $modal['table_id']; ?>"       /> <br>
								 											<input type="text" value="<?php echo "$modal[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $modal['table_id']; ?>"         /> <br>
								 											<input type="text" value="<?php echo "$modal[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $modal['table_id']; ?>"    /> <br>
								 										</div> 
															 		</center>    

															 	</div>   
															</td>  
															</table>  
														</td> 
											 	</table> 
											<pagemodal>   
											<modalmoreby>  
												<span  id='recomended_more_by_t' style='font-size:12px;' > <b> ABOUT THIS "<?php echo strtoupper($modal['category']); ?>" <?php echo $modal['kind']; ?> </b> </span> 
												<table  border="0" cellspacing="0" cellpadding="0" >
													 	<tr>  
												 			<td id="details-about"  > 
																<div>   
																	<?php echo ucfirst("$modal[description]")." $more";  ?> 
																</div>  
															</td> 
														<tr> 
															<td id ="more-by-link-header" >  
																<span  style='font-size: 12px; font-family:arial ' >  MORE BY  </span>  
																<span id='recomended_name_t' style='font-size: 12px; font-family:arial '> <a href="<?php echo $user['username']; ?>" target='_parent' style="color:#b32727;" > <?php echo  strtoupper($modal['modalownername']); ?> </a> </span> <span id='recomended_bar_t' >|</span>  
																<span style='font-size:12px;  font-family:arial' > <?php echo "  $modal[position] of $modal[more_len] "; ?>  </span> 
																<span id='recomended_all_t' style='padding-left:5px;font-size: 12px; font-family:arial' title='all article' > <a href="<?php echo "$user[username]-$user[profile_tab]"; ?>"  style='color:#b32727; ' target='_parent' > ALL ARTICLE >> </a>   </span></span> 
															</td> 
													</table> 
											<modalmoreby>   
										</ul>  
										 	<?php    
		 					break;   
		 				case 'load-next-comment-page':  
		 				 		# initialized

				 					$query['limit_start']  = $mc->get_loop_start( $comment['pagenum'] , $comment['tshow'] );  
									$query['limit_end']    =   $mc->get_loop_end( $comment['pagenum'] , $comment['tshow'] );  

			 						$modal['comments'] =  $mc->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$modal['table_name'],
										    'table_id'=>$modal['table_id'], 
										    'orderby'=>'cno desc',
										    'limit_start'=>$query['limit_start'],
										    'limit_end'=>$query['limit_end'], 
										    'comment_query'=>'get-comment-modal'   
									  	) 
								  	);    
							  	# print comment 
								 	// for ($i=0; $i < count($modal['comments']) ; $i++) { 
								 	// 	// $mc->modal_print_comment( $modal['comments'][$i] );    
								 	// 	echo "<modal-comment>"; 
										// 	$mc->modal_print_comment( $modal['comments'][$i] , '../../../' );   
										// echo "<modal-comment>"; 
								 	// }  


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
		 					break;  
		 				case 'load-comment-change-page-modal': 

								# GET SPECIFIC FIRST ALL COMMENTS ORDERED BY FROM ONE MODAL
			 						$modal['comments_all'] = $mc->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$modal['table_name'],
										    'table_id'=>$modal['table_id'], 
										    'orderby'=>$modal['orderby'],
										    'limit_start'=>0,
										    'limit_end'=> 1000, 
										    'comment_query'=>'get-comment-modal'   
									  	)   
								  	);   
								# GET SPECIFIC FIRST 10 COMMENTS ORDERED BY FROM ONE MODAL

									$modal['comments'] = $mc->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$modal['table_name'],
										    'table_id'=>$modal['table_id'], 
										    'orderby'=>$modal['orderby'],
										    'limit_start'=>0,
										    'limit_end'=> 10, 
										    'comment_query'=>'get-comment-modal'   
									  	)   
								  	);    
								# GET LEN OF THE ALL COMMENT  

								  	$modal['comments_len'] = count( $modal['comments_all'] );    
								# PRINT INTIRE COMMENT AREA  ?> 

								  		<div  style="border:1px solid none" id="lookdetails-comment-container" >
											<span id='feed'>  FEEDBACK </span> 
											<table id='look_comment_t1' border="0" cellpadding="0" cellspacing="0">  
												<tr>  
													<td id='header_comment_c_td'>
														<table id='comment_love_drip_t' border="0" cellspacing="0"  cellpadding="0" > 
															<tr> 
																<td  id='comment_tabs' > 
																	<span title='comments' >( <?php echo $modal['comments_len']; ?> ) COMMENTS</span> 
																	<hr id='comment_tabs_hr1' >
																</td>
																<td> 
																	<div style="margin-left:20px;margin-top:-17px;" >
																		<?php $mc->print_look_comment_sorting_option( $modal['table_name'] , $modal['table_id'] );  ?> 
																	</div>
																</td> 
														</table> 
													</td>
												<tr>  
													<td id='comment_header_line'> 
														<div> </div>
													</td> 
												<tr>  
													<td id='comment_content'>   
														<table border="0" >  
															<tr>  
																<td>  
																	<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test1" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																</td>
															<tr>
																<td>  
																	<?php   $np = $mc->generate_next_prev_numbers( $modal['comments_len'] , 10 ); ?>  
																	<ul id="look-comment-cotainer-ul" >
																		<li id="comment-top-next-prev" >  
																			<?php  
																				$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'] ,  'table_id'=> $modal['table_id'] ) ) ;   
																			?>   
																		</li>  
																		<li>
																			<div style="margin-left:36px; border:1px solid none;" >
																				<ul id='comments_result' class='comments_result' style="border:1px solid none" >  
																				 	<?php  
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

																					 			$mc->modal_print_comment( $modal['comments'][$i] , $modal['imgpath'] , $background_color );   

																					 		// counter 

																					 			$c++;  

																					 	}  
																				 	?>
																				</ul>
																			</div> 
																		</li> 
																	</ul>   
																</td> 
															<tr>
																<td> 
																	<?php 
																		$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'] ,  'table_id'=> $modal['table_id'] ) ) ;     
																	?>
																</td>
															<tr> 
																<td> 
																	<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test2" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																</td>
															<tr>
																<td>   
																	<div id="cmment" >
																		<?php  $mc->modal_comment_send_textarea( $mno , $modal['table_id'] , $modal['table_name'] , $modal['table_id']  ); ?> 
																	</div>
																	<ul id='comment_sending_result' > 	
																		<!-- look commnet res -->
																	</ul>  
																</td>  
														</table>    
													</td>
												<tr>  
													<td id='comment_post_area'> 
														<!-- comment post  -->
													</td>
											</table>  
							 			</div>
						 			

						 			 <?php  
		 					break; 
		 				case 'load-comment-sorting-page-modal': 

								# GET SPECIFIC FIRST ALL COMMENTS ORDERED BY FROM ONE MODAL
			 						$modal['comments_all'] = $mc->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$modal['table_name'],
										    'table_id'=>$modal['table_id'], 
										    'orderby'=>$modal['orderby'],
										    'limit_start'=>0,
										    'limit_end'=> 1000, 
										    'comment_query'=>'get-comment-modal'   
									  	)   
								  	);   
								# GET SPECIFIC FIRST 10 COMMENTS ORDERED BY FROM ONE MODAL

									$modal['comments'] = $mc->posted_modals_comment_Query (
								  		array(  
										    'table_name'=>$modal['table_name'],
										    'table_id'=>$modal['table_id'], 
										    'orderby'=>$modal['orderby'],
										    'limit_start'=>0,
										    'limit_end'=> 10, 
										    'comment_query'=>'get-comment-modal'   
									  	)   
								  	);    
								# GET LEN OF THE ALL COMMENT  

								  	$modal['comments_len'] = count( $modal['comments_all'] );    

								# PRINT INTIRE COMMENT AREA  ?> 
									<!-- <td id='comment_content'>    -->  

									<?php  
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


									<?php if(false): ?> 
										<table border="0" >  
											<tr>  
												<td>  
													<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test1" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
												</td>
											<tr>
												<td>  
													<?php   $np = $mc->generate_next_prev_numbers( $modal['comments_len'] , 10 ); ?>  
													<ul id="look-comment-cotainer-ul" >
														<li id="comment-top-next-prev" >  
															<?php  
																$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'] ,  'table_id'=> $modal['table_id'] ) ) ;   
															?>   
														</li>  
														<li>
															<div style="margin-left:36px; border:1px solid none;" >
																<ul id='comments_result' class='comments_result' style="border:1px solid none" >  
																 	<?php  

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

																	 			$mc->modal_print_comment( $modal['comments'][$i] , $modal['imgpath'] , $background_color );   

																	 		// counter 

																	 			$c++;  

																	 	}  

																 	?>
																</ul>
															</div> 
														</li> 
													</ul>   
												</td> 
											<tr>
												<td> 
													<?php 
														$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$modal['table_name'] ,  'table_id'=> $modal['table_id'] ) ) ;     
													?>
												</td>
											<tr> 
												<td> 
													<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test2" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
												</td>
											<tr>
												<td>   
													<div id="cmment" >
														<?php  $mc->modal_comment_send_textarea( $mno , $modal['table_id'] , $modal['table_name'] , $modal['table_id']  ); ?> 
													</div>
													<ul id='comment_sending_result' > 	
														<!-- look commnet res -->
													</ul>  
												</td>  
										</table>  

									<?php endif; ?> 

									<?php  
		 					break; 
		 				case 'view-more-look':
		 					 	
		 						// get the the url  


		 							switch ( $table_name ) {
		 								case 'postedlooks':
		 										$response = $mc->posted_modals_postedlooks_Query( array( 'postedlooks_query'=>'get-specific-look',  'plno'=>$table_id ) );
		 										$url = $response[0]['article_link'];  		 
		 									break;
		 								case 'fs_postedarticles':

										 										 
											   $response = $mc->fs_postedarticles( 
											    	array( 
												      	'aticle_type'=> 'select',
												      	'limit_start'=>0,
												      	'limit_end'=>1, 
												      	'orderby'=> 'artno desc', 
												      	'where'=>"artno = $table_id"  
												    ) 
											    );    

											   $url = $response[0]['source_url'];  

		 									break; 
		 								default:
		 									# code...
		 									break;
		 							} 

		 							/*
		 							* remove tag from the link url because tag added during the 
		 							* insert process for the comment only suppose to be its a mistake
		 							*/
		 								$url = strip_tags( $url );  
		 								
		 							// echo "artno = $table_id table = $table_name  get the url = $url "; 


								/**
								 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
								 * array containing the HTTP server response header fields and content.
								 */ 	
 
 
		 						 	// $content = file_get_contents( $url ); 

		 						// print the url data   ?>	
		 								<center>
			 								<div id="view-more-look-details-container" >  
				 								<table border="0" cellpadding="0" cellspacing="0" >
				 									<tr>
				 										<td style='height:20px;' > <input type="button" value="close" onclick="fs_popup('close')"  /> </td>
				 									<tr> 
				 										<td>   
				 											<iframe src='<?php echo "$url"; ?>'>   </iframe> 
				 										</td>
				 								</table> 
				 							</div> 
			 							</center>

		 								<style>
			 								#view-more-look-details-container{ 
			 									/*border:1px solid red;*/
			 									width: 100%;
			 								}
			 								#view-more-look-details-container table { 
			 									width: 100%;
			 									height: 99%;
			 								}
			 								#view-more-look-details-container iframe { 
			 									width: 100%;
			 									height: 100%;
			 									border:none;
			 								}
		 								</style> 
		 							<?php  
		 					break;
		 				default:   
		 					break;
		 			endswitch;   
	 			break;
	 		case 'postarticle':
					// $_SESSION['article_image'] = array('google.com','facebook.com','lookbook.com');
					// $_SESSION['article_Vedio'] = array('google.com','facebook.com','lookbook.com'); 
	 				$index = 0; 
	 				$data = '';
	 				$display = '';
	 				$current_index = 2; 
	 				$counter = 0;

	 				/*
	 				*   session: 
		 			*	article_image
					*	article_Vedio
					*   current_index
					*/ 
					// echo " <div style='display:none' > ";
		 			  	switch ( $process ): 
			 			  	case 'next-prev':    
			 			  			switch ( $type ):
			 			  				case 'image':   
			 			  						$data           = $_SESSION['article_image']; 
			 			  						$current_index  = $_SESSION['current_index_image'];
			 			  					break;
			 			  				case 'video':  
			 			  						$data           = $_SESSION['article_video'];  
			 			  						$current_index  = $_SESSION['current_index_video'];
			 			  					break; 
			 			  				default: 
			 			  					break;
			 			  			endswitch;   

			 			  			// retrieved new next and prev value
				 			  			// $mc->print_r1( $data );   
				 			  			$display = $mc->new_index_next_prev( $data , $current_index );    
				 			  			$index = $display[$stat];    
				 			  			// $mc->print_r1( $display );

				 			  			$print_me = $data[$index];    
				 			  			// $mc->print_r1( $display );    
				 			  			// echo " $print_me  "; 
				 			  			$counter = $index + 1;
				 			  		 	$total   = count($data); 

			 			  			// assign new current index 
				 			  			if ( $type == 'image' ):
				 			  				$_SESSION['current_index_image'] =  $index;  
				 			  				echo " <img src='$print_me' style='width:285px; height:250px;' />"; 
				 			  				echo " <div style='display:none' >"; 
					 			  				echo "<counter-image>$counter<counter-image>"; 
					 			  				echo "<counter-video>remain<counter-video>"; 
				 			  				echo "</div>"; 
				 			  			else: 
				 			  				$_SESSION['current_index_video'] =  $index; 	 
				 			  				// echo "$print_me";  
				 			  				echo " <iframe src=\"$print_me\" style='width:100%; height:100%;'  frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ";
				 			  				echo " <div style='display:none' >"; 
					 			  				echo "<counter-image>remain<counter-image>"; 
					 			  				echo "<counter-video>$counter<counter-video>"; 
				 			  				echo " </div>";  
				 			  				$video_id                 = $mc->get_video_id( $print_me ); 	
										    $_SESSION['video_id']     = $video_id;   
										    $_SESSION['source_item']  = $print_me;
										    // $src                  = $mc->get_video_src ( $print_me , $video_id );    
				 			  			endif;   
				 			  			// $_SESSION['source_url']  = $url;           // main url 
			 			  				// echo "  stat( $stat ) , current index ( $current_index ) ,  index ($index)  $total of $counter ";   
			 			  		break; 
			 			  	case 'retrieved-data': 


		 			  				echo " <div style='display:block'> ";

							 			  			//initialize 
							 			  				// clean session
															unset($_SESSION['article_image']); 
															unset($_SESSION['article_title']);
															unset($_SESSION['article_description']);
															unset($_SESSION['article_keyword']); 
															unset($_SESSION['article_video']);

															$version = 1;
									 			  			$url = '';  
									 			  			$url = $_GET['url']; 
									 			  			$url = str_replace('punctuation',':',$url);  
									 			  			$allowimageresponsenumber = 0;
						 		
								 			  		  
									 			  			if (  strpos( $url , 'youtube' )  ) {

									 			  				$video_id             = $mc->get_video_id( $url ); 
									 			  				$_SESSION['video_id'] = $video_id; 
							    								$src                  = $mc->get_video_src ( $url , $video_id );   


		 
							    							 	# GET YOUTUBE TITLE
																	// $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $video_id;  
																	// $entry = simplexml_load_file($feedURL); 
																	// $video = $mc->parseVideoEntry($entry); 
																	// echo " amazing titlte = ".$video->title;  
																	$_SESSION['article_title'] = $mc->get_youtube_title( $video_id );;   
							    									// $_SESSION['article_title'] = 'THIS IS THE TITLE OF THE  VIDEO ';  
							    									// echo " youtube link <br> ";
									 			  			}
									 			  			else {  	 
									 			  				echo " not youtube link <br> ";
									 			  				$mc->web_scraping(  
															      	array( 
															          	// 'get'  => array( 'image' , 'video' ),
															          	'get'  => array( 'video' ),
															          	'url'  => $url,  
															          	'accept_video'=>array( 'youtube' ),
															          	'accept_image'=>array( 'jpg' , 'png' ), 
															          	'size' => array( 'image'=> array( 'height'=>100 , 'width'=>150 )  , 'video'=> array( 'height'=>200 , 'width'=>1200 ) ), 
															          	'limit' => 20
															      	) 
															    );    
									 			  				echo " this is the title $_SESSION[article_title] <br> "; 
															    // $_SESSION['article_video']  embeded code url 
															    	$video_id             = $mc->get_video_id( $_SESSION['article_video'][0] ); 	 

															    # remove space
															    	$_SESSION['video_id'] = $mc->string( array('type' =>'remove-space' , 'string'=>$video_id ) ); 

															    $src                  = $mc->get_video_src ( $_SESSION['article_video'][0] , $video_id );    
															    $_SESSION['article_title']  = $pa->get_title_in_a_website( $url );  



									 			  			} 
									 			  			   // echo " video id = $video_id  <br> ";
								 			  				// echo " this is the title $_SESSION[article_title] "; 
								 			  			  	// echo " video_id =  $video_id  <br> "; 
							 			  			// print image 
							 			  				// image 
								 			  				$data_image     = $_SESSION['article_image'];   
									 			  			$data_image_len = count($_SESSION['article_image']);   
									 			  			 
									 			  		// video
									 			  			$data_video     = $_SESSION['article_video'];   
									 			  			$data_video_len = count($_SESSION['article_video']);   
									 			  			 
									 			  		//init attr
										 			  		$current_index  = $_SESSION['current_index_image'] = 0;
									 			  		 	$title          = $_SESSION['article_title'] ;
							 								$description    = $_SESSION['article_description'];
							 								$keyword        = $_SESSION['article_keyword'];   

							 								// print attr 
										 			  			echo "<titledisplay>".$title."<titledisplay>";
										 			  			echo "<description>$description<description>";  
										 			  			echo "<keyword>$keyword<keyword>"; 
										 			  			echo "<counter>1<counter>"; 
							 	
							 								//image and video print 

									 			  				// image print
											 			  			echo "<imgdisplay> <img src='$data_image[0]' style='width:285px; height:250px;' /> <imgdisplay>";
											 			  			echo "<imagetres>$data_image_len<imagetres>"; 
							 
											 			  			// print_r($data_video);
																// video print 

											 			  			echo "<videodisplay>
											 			  				<iframe src=\"$data_video[0]\" style='width:100%; height:100%;' frameborder='0'  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

											 			  				<videodisplay>";    
											 			  			echo " video id = $video_id ";
											 			  			echo "<videotres>$data_video_len<videotres>"; 
							 			  							echo " this is to retrieved image and video of the article url $url <br>";  

							 			  							$_SESSION['source_url']  = $url;           // main url
																	$_SESSION['source_item'] = $data_video[0]; // embeded



															// set allow 

																	echo "<allowimage>$allowimageresponsenumber<allowimage>";
									echo " </div>"; 
			 			  		break;   
			 			  	case 'insert':  

			 			  			// initialize 

			 			  				$category    = $_GET['category']; 
										$topic       =  (count(explode(',', $_GET['topic'])) > 0)? explode(',', $_GET['topic'])[0] : $_GET['topic']; 
										$title       = $_GET['title']; 
										$desc        = $_GET['desc']; 
										$keyword     = $_GET['keyword'];   







 	

 										/*
										if ( $selected == 'video') {

											$source_url  = ( !empty($_SESSION['source_url'])  ) ? $_SESSION['source_url'] : null ;  	 
										}
										else{
											*/
												$source_url = $url; 
											/*
										} 
										*/

										$source_item = ( !empty($_SESSION['source_item']) ) ? $_SESSION['source_item'] : $url ;  
										$type        = ( !empty($_GET['type']) ) ? $_GET['type'] : 'image' ;  
										$table_name  = 'fs_postedarticles';

 
 
									if ( $method == 'edit'):

										echo "<br>update table here here"; 
									    echo " keyword $keyword <br>"; 

									    # update article info 

											$response = mysql_query(" UPDATE fs_postedarticles SET title = '$title' , description = '$desc' , keyword = '$keyword' , category = '$category' , topic = '$topic', active = 1 WHERE artno = $table_id "); 

											$mc->message( "update article info artno = $table_id " , $response , "" );  

										# delete current searchable keyword 

											$response = $mc->fs_search( 
												array(
													'type'=>'delete',
													'table_id'=>$table_id,
													'table_name'=>$table_name
												)
											);  
											$mc->message( " delete fs_search table id = $table_id table name = $table_name " , $response , "" );   
									else:

										# insert article info 

											$table_id = $mc->fs_postedarticles( 
											 	array(  
											 		'aticle_type'=>'insert', 
											 		'mno'=>$mno, 
											 		'title'=>$title, 
											 		'description'=>$desc,  
											 		'topic'=>$topic, 
											 		'keyword'=>$keyword,  
											 		'category'=>$category, 
											 		'source_url'=>$source_url, 
											 		'source_item'=>$source_item,
											 		'active'=>1,
											 		'type'=>$type, 
											 		'plus_blogger'=>$mc->plus_blogger, 
											 		'gender'=>$mc->gender
											 	)  
											);   

											$mc->message( 'insert article ' , $table_id , ' ' ); 

											echo " $response ";   

										# insert activity info 

											$response = $mc->add_latest_user_activity_posted( $mno , 'Posted' , 'fs_postedarticles' , $table_id , $mc->date_time );
											$mc->message( 'insert article activity ' , $response , ' ' );  
			 			  					echo " insert new article <br> category = $category <br> topic = $topic <br>  title = $title  <br>  desc = $desc <br>  keyword = $keyword <br> source_url =  $_SESSION[source_url] <br> source_item = $_SESSION[source_item] <br>";    
			 			  			endif;



		 			  					# calculate category percentage

											$mc->modal(  
												array(  
													'type'=>'add-or-update-user-category-percentage-and-rating',
													'table_name'=>$table_name,
													'table_id'=>$table_id,
													'category'=>$category  
												)
											);

			 			  				# insert keyword for search 

			 			  						$response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'fs_postedarticles' ,   'table_id'=>intval($table_id) ) );  

			 			  						// 	$keyword = " $keyword , $title ";
		 			  							//  $response = $mc->fs_search(  
											 	//   array( 
											 	//     'type'=> 'add-or-updated-keyword' , 
											  	//     'table_name'=>$table_name, 
											  	//     'table_id'=>$table_id,
											 	//     'keyword'=>$keyword
											  	//   ) 
										  		// );    

										# add category 

		    								$response = $mc->fs_keyword(   array(  'type'=>'insert-not-exist' , 'table_id'=>$table_id ,  'table_name'=>'fs_postedarticles' , 'keyword' =>$keyword  ) ); 
 
			 			  				# set session 

			 			  					$_SESSION['type']     = $type; 
			 			  					$_SESSION['video_id'] = $_SESSION['video_id'];
			 			  					$_SESSION['url']      = 'youtube';

			 							# unset session 

			 								unset($_SESSION['source_url']); 
			 								unset($_SESSION['source_item']);   
			 			  		break;
			 			  	case 'suggested-keyword':

			 			  			// 	$response = select_v3( 
										// 	$tdb, 
										// 	'*',
										// 	" $where order by $orderby limit $limit_start , $limit_end"
										// );       

			 			  			$limit_end = 2; 
			 			  		 	$keyword = $mc->fs_keyword( 
			 			 				array( 
			 			 					'type'=>'select',
			 			 					'where'=> "keyword LIKE '$keySearch%'  ",
			 			 					'orderby'=> 'kno desc',
			 			 					'limit_start'=>0,
			 			 					'limit_end'=>$limit_end
			 			 				)
			 			 			);  
			 			 			echo "
			 			 				<center> 
			 			  		 		<div>
			 			  		 		";
										   $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-suggested-keyword-loader" ,'style'=>'visibility:hidden;height:10px;'  ) );  
									echo " 
										</div>
										</center>
									"; 
			 			 			echo "<ul>"; 
			 			 				if ( !empty( $keyword )) {
			 			 					# code...
			 			 				 
					 			 			for ($i=0; $i < count($keyword) ; $i++) {  
					 			 				$value = $keyword[$i]['keyword'];  
					 			 				echo "<li  onclick =\"article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , '$value' , 'postarticle-submit-loader' , event )\"   > $value  </li> ";  
					 			 			}
					 			 		}
				 			 			else{
				 			 				echo "<li> No result found </li> ";
				 			 			} 
			 			 			echo "</ul>"; 
			 			  		break;
			 			  	case 'design': 

 									$_SESSION['article_image'] = array(
										'http://cdn.sheknows.com/authors/profile/headshot_chrissy_callahan.jpg',
										'http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg',
										'http://cdn.sheknows.com/articles/2014/07/get-the-look-kate-hudson-collage.jpg',
										'http://cdn3-www.thefashionspot.com/assets/uploads/2014/08/kristin-k-wardrobe-p-230x338.jpg',
										'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11012461/l/VB-GETTY-MAIN_2996628a.jpg',
										'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11000372/v/AW14DetailP-344_2991437a.jpg'
									);

									$_SESSION['article_video'] = array(
										'//www.youtube.com/embed/Fi2R0IlCXlA',
										'//www.youtube.com/embed/Qtvrc1PE9vs',
										'//www.youtube.com/embed/XIiU9zh5hf8',
										'//www.youtube.com/embed/CdOOxuQii_s'
									); 
 								 
									$_SESSION['current_index_video'] = 0;
									$_SESSION['current_index_image'] = 0;  
									$_SESSION['source_url']          = null;
									$_SESSION['source_item']         = null;	 
 
									$modal['style'] = 'display:block;';

									// This isset(var)		 thefashionspot mailparse_determine_best_xfer_encoding(fp) walay off communication		 

									// echo " this is the best part of the article <br>";
 
									# intialized data  

										$modal['title']   		 = ''; 
										$modal['description']    = ''; 
										$modal['category'] 		 = ''; 
										$modal['topic']    		 = ''; 
										$modal['keyword']  		 = ''; 
										$modal['cstyle']         = 'height:auto;'; // container style  
										$modal['dstyle']         = 'padding-top:0px;';

										if( $method == 'edit' ):  

											$modal['style'] = 'display:none;';

											# get article info 

											$response = $mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"artno  = $table_id" )  );    
											$modal['title']   		 = $response[0]['title']; 
											$modal['description']    = $response[0]['description']; 
											$modal['category'] 		 = $response[0]['category']; 
											$modal['topic']    		 = $response[0]['topic']; 
											$modal['keyword']  		 = $response[0]['keyword'];   
											$modal['cstyle']         = 'height:auto';
											$modal['dstyle']         = 'padding-top:5%';

										endif;  

									?>    
										<!-- new plugin  -->
										   <script type="text/javascript"> 
									   			$(document).ready(function( ) {
										 			// mouse over to the video for next prev 
											 			mouseOver_elemShow_mouseOut_elemHide_v1( '#container-vid' , '#container-vid' , '#postarticle-next-prev-video' ); 
											 		 	mouseOver_elemShow_mouseOut_elemHide_v1( '#container-img' , '#container-img' , '#postarticle-next-prev-image' );  
										 		 	// select image for article
											 			function readImage1(file) { 
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
													               		if ( w >= 100 &&  h >= 100) { 
														               		var imagestyle = get_image_style( h , w , 300 , 250 );   
													               			document.getElementById('content-image').innerHTML = '<center><img src="'+ this.src +' " style="position:relative;cursor:pointer;'+imagestyle+';z-index:120; ";   onclick=\"$(\'#ariticle_image_file\').click( );\" title=\"click to change\" > </center>'; 
														               		$('#new-postalook-file-upload-stat-display').text(n);	 
														               		$('#article-upload-image').val(1);	 
														               		
														               		$('#content-nofound-image').css('display','none');    
														               		article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , 'event' );  
											 		               		} 
											 		               		else{
											 		               			document.getElementById('content-image').innerHTML = '';
											 		               			$('#content-nofound-image').css('display','block');  
											 		               			alert('Sorry We accept only size of 100 x 100 and above but you have '+w+' by '+h+' please try another look.' ); 
											 		               		}   
													            };
													            image.onerror= function() {
													                alert('Invalid file type: '+ file.type );
													            };      
													        };  
													    }
													    $("#ariticle_image_file").change(function (e) { 
													    	 


													        if(this.disabled) return alert('File upload not supported!');
													        var F = this.files; 


													        // alert( F.length ); 


													        if ( F.length > 0 ) { 
													        	if(F && F[0]){ 
													        		for(var i=0; i<F.length; i++){   
													        			readImage1( F[i] );
													        		}
													        	}
													    	}
													    	else{ 
													    		document.getElementById('content-image').innerHTML = '';
											 		        	$('#content-nofound-image').css('display','block');  
											 		        	$('#article-upload-image').val(0);	 
													    	}
													    }); 
										 		})  
										   </script>
										<!-- new plugin  --> 
										<center> 
											<div style="background-color:white;width:910px;padding: 6px  3px 6px 3px; border-radius:5px;" >
									 			<div id="postarticle-container" style="position:relative;padding:0px; border-radius:5px; margin:0px;width:890px;padding:7px;<?php echo $modal['cstyle']; ?> " > 
										 			<table  id="postarticle-main-table" border="0" cellpadding="0" cellspacing="0" style="width:890px;" >
                                                        <tr>
                                                            <td>
                                                                <div id="category-table" ></div>
                                                            </td>
                                                        </tr>
										 				<tr> 
										 					<td id="postarticle-header" >  </td>	
										 				<tr>

										 					<td id="postarticle-title-message" style="display:none"  > 
										 						<table border="0" cellpadding="0" cellspacing="0"  >
										 							<tr> 
										 								<td style="width:270px;" > 
										 									<span> 
										 										POST AN ARTICLE
										 									</span>
										 								</td>
										 								<td> 
										 									<div >
										 										Posting a look is easy... but if you need help click like to watch a video on posting an article. 
										 									</div>
										 								</td>
										 						</table>
										 					</td>	
										 				<tr>
										 					<td id="postarticle-url-field" style="padding-top:0px;<?php echo $modal['style']; ?>" >   
										 						<center>
																	<div style="padding-top:5px;" >   
																		 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-search-field-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
																	</div> 
																</center> 
										 					</td>	
										 				<tr>
										 					<td id="postarticle-select-image-or-video" style="<?php echo $modal['style']; ?>" >  
											 					<div id='container-img-vid-container'  >   
											 							<div style="padding-bottom:20px;" >
												 							<form action=""> 
													 						 	<ul id="postarticle-choices"  style="display:none" >
													 						 		<li> 
													 						 			<center>
													 						 				<input type="radio" name="select" value="image" title="select image"    id="postarticle-image-select"       onclick="article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , event )" checked> click to select ( image ) <br>
													 						 				<!-- <input type="radio" name="sex" value="male">Male<br> -->
													 						 			</center>
													 						 		</li>
													 						 		<li> 
													 						 			<center>
													 						 				<input type="radio" name="select" value="video"  title="select video"   id="postarticle-video-select"         onclick="article_nex_prev( 'select-article-modal' , 'video' , 'fs-general-ajax-response' , '' , event )" >click to select ( video )
													 						 				<!-- <input type="radio" name="sex" value="female">Female -->
													 						 			</center>
													 						 		</li>
													 						 	</ul> 
												 						 	</form> 
											 						 	</div>  
										 								<div id='container-vid' onclick="article_nex_prev( 'select-article-modal' , 'video' , 'fs-general-ajax-response' , '' , event )" >  
										 									<div style="height:20px;"  > 
											 									<ul id="postarticle-status" >
											 										<li><div id="stat-video"> </div></li> 
											 										<li><div id='counter-video'> </div></li>
											 										<li><div id="stat-video-1"> </div></li>  
											 										
											 									</ul>
										 									</div>	  
										 									<div id="content-nofound-video" > 
										 										<center>
										 										 	<ul>
										 										 		<li> <img src='<?php echo "$mc->genImgs/video-play-1.png"; ?>' />   </li>
										 										 		<li> <div class="fs-text-blue" > <!-- No Video found --> </div> </li> 
										 											</ul>  
										 										</center>
										 									</div> 
										 									<div id="content-video"  >
										 										<iframe src="asdd" style="display:none" ></iframe>
										 									</div>   
									 										<div id="postarticle-next-prev-video-div" style="display:none" >
											 									<table id="postarticle-next-prev-video" border="0" cellpadding="0" cellspacing="0"  >
											 										<tr> 
											 											<td> <div style="float:left; padding-left:20px;font-size:40px;color:white;cursor:pointer"  title="previous" onclick="article_nex_prev ( 'video' , 'prev' , 'content-video' , 'content-video-loader' , event )"  > < </div> </td>
											 											<td onclick="choose( 'video' )" > 
											 												<center>
											 													<div>   
											 														<?php $mc->image( array( 'type'=>'loader' , 'id'=>"content-video-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
											 													</div> 
											 												</center> 
											 											</td>
											 											<td><div style="float:right;padding-right:20px;font-size:40px;color:white;cursor:pointer"  title="next" onclick="article_nex_prev ( 'video' , 'next' , 'content-video' , 'content-video-loader' , event )" > > </div> </td>
											 									</table>  
										 									</div>
										 									<div id="article-url-field"> 	 
														 						<input type="text" placeholder="YOUTUBE VIDEO URL" id="article_url_field" onkeyup="article_nex_prev ( 'search' , '' , 'fs-general-ajax-response' , 'postarticle-search-field-loader' , event ) ">  
													 						</div>
										 								</div>   

										 								<div id='container-img' onclick="article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , event )"   >   
										 									<div style="height:20px;">
											 									<ul id="postarticle-status" >
											 										<li><div id="stat-image"></div></li>
											 										<li><div id='counter-image'></div></li>
											 										<li><div id="stat-image-1"></div></li> 
											 									</ul>
										 									</div>	 
										 									<div id="content-nofound-image" >  
										 									 	<center> 
										 									 		<form  action="photo.resize.php?type=upload-article-and-resize" method="POST" enctype="multipart/form-data" id="upload-article" >   
										 										 		<ul>
										 										 		    <li> <input type='file' id="ariticle_image_file" name="file" runat="server" style="display:none;"  />  </li>
                                                                                            <li> <input type="hidden" value="2-article-lover-this-is-my-title-300x400" id="file-name" name="fileName" > </li>
                                                                                            <li> <input type="hidden" value="this-is-the-url-fashion" id="file-url" name="fileUrl" > </li>
											 										 		<li> <img src='<?php echo "$mc->genImgs/postarticle-image-nofound.png"; ?>' />   </li>
											 										 		<li> <div class="fs-text-blue" > <!-- No images found  --></div> </li>
											 										 		<li> <img src='<?php echo "$mc->genImgs/postarticle-upload.jpg"; ?>' id="avatar-right-uploadprofile"  onclick="$('#ariticle_image_file').click( );"   />   </li> 
										 											 	</ul> 
									 											 	</form> 
										 										</center> 
										 									</div>  
										 									<div id="content-image" ></div>   
										 									<div id="postarticle-next-prev-image-div" style="display:none" >
											 									<table id="postarticle-next-prev-image"    border="0" cellpadding="0" cellspacing="0" >
											 										<tr> 
											 											<td> <div style="float:left; padding-left:20px;font-size:40px;color:white;cursor:pointer"  title="previous" onclick="article_nex_prev (  'image' , 'prev' , 'content-image' , 'content-image-loader' , event )"  > < </div> </td>
											 											<td onclick="choose( 'image' )" > 
											 												<center>
											 													<div>   
											 														 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"content-image-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
											 													</div> 
											 												</center> 
											 											</td>
											 											<td><div style="float:right;padding-right:20px;font-size:40px;color:white;cursor:pointer"  title="next" onclick="article_nex_prev (  'image' , 'next' , 'content-image' , 'content-image-loader' , event )" > > </div> </td>
											 									</table>   
										 									</div>
										 								</div>  
											 					</div>  
										 					</td>	
										 				<tr>
										 					<td style="display:none;" >
										 						<input type="text" value="image"  id="article-upload-selected"    >
										 						<input type="text" value="image content"  id="article-upload-image" >
										 						<input type="text" value="video content"  id="article-upload-video" >
										 					</td>
										 				<tr>
											 				<td style="padding-top:20px;"> 
											 				</td>  
											 			<tr>
											 				<td  class="postarticle-title-and-link-td" >   
											 					<table> 
											 						<tr> 
											 							<td> 
											 								<div id="article-title-container" > 
																				<div>  
																					<label>Article Title</label>  																			
																				</div>					
																			 	<table style="background-color: white; "> 
																			 		<tbody>
																			 			<tr> 
																					    <td> 
																					        <input type="text" name="article_title" id="article-title" onkeyup="article_seo(this)" max="70" min="0" value="">
																				        </td> 
																				        <td>  
																					        <div id="article-title-counter" class="counter">  
																					        	<counter style="color: rgb(0, 128, 0);">56</counter> / 70 characters 
																					        	<rating><b style="color:green">  </b></rating>
																					        </div> 
													    								</td>  
													    							</tbody>
													    						</table>  
													 						</div> 
											 							</td>
											 							<td> 
											 								 <div> <label> Link to article </label> </div>  
											 								 <input type="text" />
											 							</td>
											 					</table>  
										    				</td> 
										    			<tr> 
										    				<td class="postarticle-category-topic-and-tags-td" >  
							    								<table  border="0" cellpadding="0" cellspacing="0" >  
								 									<tr> 
								 										<td>  
								 											<div>
								 												Category
								 											</div>  
								 										</td>
								 										<td>
								 											<div>
								 												Topic
								 											</div>  
								 										</td>  
								 										<td> 
										 									<div>
										 										Keywords
										 									</div> 
										 								</td>  
										 							<tr> 
										 								<td class="postarticle-category-td" >
										 									<div>
									 											<select onchange="postarticle_select_category( ) " id="postarticle-change-category"  style="padding:5px; width:100%; "  > 
									 											 
										 											<option value="Select"        <?php if( $modal['category'] == 'Select'        ) { echo "selected"; }  ?> >Select</option>  
								 											 		<option value="Beauty"        <?php if( $modal['category'] == 'Beauty'        ) { echo "selected"; }  ?> >Beauty</option>
								 											 		<option value="Entertainment" <?php if( $modal['category'] == 'Entertainment' ) { echo "selected"; }  ?> >Entertainment</option>
								 											 		<option value="Fashion"       <?php if( $modal['category'] == 'Fashion'       ) { echo "selected"; }  ?> >Fashion</option> 
								 											 		<option value="Lifestyle"     <?php if( $modal['category'] == 'Lifestyle'     ) { echo "selected"; }  ?> >Lifestyle</option>  
								 											 		<option value="Technology"    <?php if( $modal['category'] == 'Technology'    ) { echo "selected"; }  ?> >Technology</option> 
								 											 		<option value="Other"         <?php if( $modal['category'] == 'Other'         ) { echo "selected"; }  ?> >Other</option> 
									 											</select> 
								 											</div>
										 								</td> 
										 								<td class="postarticle-topic-td" >
										 									<div>  
								 												<select id="postarticle-topic" >   
								 													<?php if ( $method == 'edit' ): ?>	
										 												<option value="<?php echo  $modal['category']; ?>" ><?php echo  $modal['topic']; ?></option>
										 											<?php else: ?>
										 												<option>None</option> 
										 											<?php endif; ?> 
								 												</select> 
								 											</div>  
										 								</td> 
										 								<td class="postarticle-tags-td">
										 									<div>	
										 										<table>
										 											<tr> 
										 												<td> 
										 													<?php if ( $method != 'edit' ): ?>
										 														<div type="text" title="put a comma after word to add tag."  placeholder='Example: winter , spring , summer' id="postarticle-keyword"  onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" /><?php echo $modal['keyword']; ?></div> 		
										 													<?php else: ?>
										 														<input style="font-size:12px;padding:0px;margin:0px;"  type="text" title="put a comma after word to add tag." placeholder='Example: winter , spring , summer' id="postarticle-keyword"  onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" value="<?php echo $modal['keyword']; ?>" /> 
										 													<?php endif;?>
										 												</td>
										 											<tr>  
										 												<td> 
											 												<div id='postarticle-keyword-dropdown' >  
											 													<center>
												 													<div>
												 														 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-suggested-keyword-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
												 													</div>
											 													</center>
											 													<!-- <ul>
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
											 													</ul> -->
											 												</div>
										 												</td>
										 										</table> 	
										 									</div>   

										 									<!-- this code is to make the div as editable -->
											 									<script> 
												 									$('#postarticle-keyword').each(function(){  
												 										this.contentEditable = true;   
												 									});   


											 									</script>  
										 								</td>
								 								</table>  
										    				</td>
							 							<tr> 
										 					<td id="postarticle-attributes" style="<?php  echo $modal['dstyle'];  ?>"   >

											 					<div style="font-size:20px;font-family:misoRegular; color:#b32727; padding-bottom:10px;display:none" >
											 						Details
											 					</div> 
										 						<table  border="0" cellpadding="0" cellspacing="0" >    
													 				<tr>
														 				<td>

														 					<div id="postarticle-description-preview">
														 						<table>
														 							<tr>
														 								<td>  
														 									<div id="postarticle-description-content" >
																		 						<content>
																								  	Description
																								</content>
																							</div>
														 								</td>  
														 								<td> 
														 									<div id="postarticle-description-counter" >
														 										<counter>
																						    		0 
																						  		</counter>	
														 									</div> 
														 								</td>  
														 								<td> 
														 									/ 
														 								</td> 
														 								<td>
														 									<div id="postarticle-description-counter" >
														 										<rating>empty</rating>
														 									</div>  	
														 								</td>   
														 								<td> 
																						  	<div id="postarticle-description-search-term"> 
																						      
																						       	<text> 
																					         		Search Term
																					         	</text>
																					      
																							      <found>
																							        0
																							      </found>
																							      
																							      <text>
																							        of
																							      </text>
																							      
																							      <total>
																							        12
																							      </total>
																							      
																							      <rating> 
																							      </rating> 
																							</div>  
																					    </td>
														 						</table>
																		</div> 
										 									<div> 
										 										<?php  ///require('http://localhost/fs/new_fs/alphatest/fs_folders/ckeditor/samples/replacebyclass.html');  ?>
										 										<textarea maxlength='2000' max="2000"  min="0" id="postarticle-description" onkeyup="article_seo(this)" ><?php echo $modal['description']; ?></textarea>  


										 									</div>
										 								</td>  
										 						</table> 
										 					</td>	
										 				<tr>
										 					<td style="height:20px;">   
										 					</td>
										 				<tr>
											 				<td id="SEO-preview-td"> 
															    <div id="SEO-preview"> 
																  	<ul> 
																  		<li> 
																		  <div>
																		    <title-1>
																		      	Search Engine Preview
																		  	</title-1>
																		 	<br> <br> 
																		    <title-link id="article-title-view"></title-link> 
																		    <br> 

																		    <label id="perma-link-view-url">www.fashionsponge.com/</label><url id="perma-link-view"></url> 

																		     <br> 
																			    <description id="meta-description-view"></description> 
																		  	<div>  
																		 	</div></div></li><li>  
																		    <title-1> 															         
																		    	Seo Keyword Checker											
																		    </title-1> 			
																			<br><br> 

																			<div id="permalink-status"> 
																		    	<description> Permalink :</description> <status> No </status> 
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in permalink " />
																		    </div> 
																		    <div id="content-status"> 
																		    	<description> Content: </description> <status id="content-status"> No </status>
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Content " />
																		    </div>
	 

																		    <div id="meta-desc-status">
																		    	<description> Meta Description: </description> <status> No </status>
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Meta Description " />
																		    </div>
	 

																		    <div id="image-file-status">
																		    	<description> Image File: </description> <status> No </status> 
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Image File " />
																		    </div> 
	 
																		</li>  
																  	</ul>
																</div>
															</td>   
										 				<tr>
										 					<td id="postarticle-attributes" style="padding-top:0px;"> 
											 					<table border="0" cellpadding="0" cellspacing="0" id="article-attribute-table">
											 						<tbody>
											 						<tr> 						 								
																		<td>
																			<div>																				            
																				<label>Perma Link</label>   
																			</div>    	 
																			<table border="0" cellpadding="0" cellspacing="0" id="perma-link-table" >
																				<tr>
																					<td style="width: 100;color: black;" >   
																						<label>http://www.ashionsponge.com/</label>
																					 </td>
																					 <td>
																					 	<input type="text" name="perma_link" id="perma-link" onkeyup="article_seo(this)" max="100" min="0" value="" />
																					 </td>
																				<tr>
																			</table>
																	<tr> 
																		<td>
																			<div> 
																				<label>Meta Description</label>  
																			</div> 
																          	<table class="postarticle-meta-description-table" >
																				<tr>
																		        	<td id="meta-desc-td" >    					          	
																		         		<input type="text" name="meta_description" id="meta-description" onkeyup="article_seo(this)" max="160" min="0" value="" />

																					</td> 
																				<td>


																				    <div id="meta-description-counter" class="counter" >
																				         <counter> 160 </counter>/ 160 characters
																				          <rating></rating>
																				    </div> 
																				   


																				</td>
																				<table>  
																    	</td>
																    <tr>
																    	<td>
                                                                          	<div>							
																            	<label>Image Title</label>  
                                                                          	</div> 
																	        <input type="text" name="image_title" id="image-title" class='image-title' onkeyup="article_seo(this)"> 
																    	</td>
																    <tr>  	
												 				</table> 
												 			</td> 
										 				<tr>
										 					<td id="postarticle-social-post" style="display:none" >  
										 						<div id="title" > 
										 							POST THIS ARTICLE ON:
										 						</div>

										 						<table  border="0" cellpadding="0" cellspacing="0" >
										 							<tr> 
										 								<td style="width:20px;" >  </td> <td> <div> Facebook </div> </td>
										 							<tr> 
										 								<td style="width:20px;" >  </td> <td> <div> Twitter </div> </td>
										 							<tr> 
										 								<td style="width:20px;" >  </td> <td> <div> Tumblr </div> </td>
										 							<tr> 
										 								<td style="width:20px;" >  </td> <td> <div> Pinterest </div> </td>
										 						</table>
										 					</td>	
										 				<tr>
										 					<td id="postarticle-post-or-cancel" >    

										 						<!-- This is the original code of cancel and post for the article -->

									 						 	<table border="0" cellpadding="0" cellspacing="0" style="margin-top:-40px;display:none"   >
									 						 		<tr> 
									 						 			<td style="width: 100;" > 
									 						 				<a  onclick=" fs_popup( 'close' ) " ><img src="fs_folders/images/genImg/cancel.png" id="new-postalook-upload-button-cancel" />    </a>
									 						 			</td> 
									 						 			<td>   						 				  
																			 <img  src="fs_folders/images/genImg/post.jpg"  id='postarticle-submit' onclick="article_nex_prev( 'submit' , '' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event , '<?php echo $method; ?>' , '<?php echo $table_id; ?>'  )" />
																	         <!-- <img  src="fs_folders/images/genImg/post.jpg"  id='postarticle-submit' onclick="save_post_data(this)" />     -->
									 						 			</td>  
									 						 			<td> 
									 						 				<center>
																				<div>   
																					 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-submit-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?>
																				</div> 
																			</center> 	
									 						 			</td>
									 						 	</table>    

									 						 	<!-- This code is from post a look page popup -->  

									 						 	<div style="border:1px solid none;width:200px; margin-left:0px; margin-top: -20px;" > 
																	<table>
																		<tr> 
																			<td>  
																				<!-- <input type="button" value="cancel" onclick=" fs_popup( 'close' ) " />    --> 
																				<img
																					id="postarticle-cencel"     
																					src="<?php echo "$mc->genImgs/cancel.png"; ?>" 
																					onclick=" fs_popup( 'close' ) " 
																					onmousemove=" mousein_change_button ( '#postarticle-cencel' , '<?php echo "$mc->genImgs/cancel-mouse-over.png"; ?>' )" 
																					onmouseout="mouseout_change_button (  '#postarticle-cencel'  , '<?php echo "$mc->genImgs/cancel.png"; ?>' ) "  
																				/> 
																			</td> 
																			<td>
																				<img  
																					id='postarticle-submit-1' 
																					src="<?php echo "$mc->genImgs/post.png"; ?>" 
																					onclick="article_nex_prev( 'submit' , '' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event , '<?php echo $method; ?>' , '<?php echo $table_id; ?>'  )" 
																					onmousemove=" mousein_change_button ( '#postarticle-submit-1' , '<?php echo "$mc->genImgs/post-mouse-over.png"; ?>' )" 
																					onmouseout="mouseout_change_button (  '#postarticle-submit-1'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) "  
																				/>  
																			</td> 
																			<td> 
																				<?php $mc->image( array( 'type'=>'loader' , 'id'=>"post-modal" ,'style'=>'visibility:hidden;height:10px;width:10px;'  ) ); ?>
																			</td>
																	</table>
																</div>


										 					</td>
                                                        <tr> 
                                                            <td id="results"> 
                                                            </td>
										 			</table>
									 			</div>  
								 			</div>
							 			</center>  
			 			  		<?php 
			 			  		break;
			 			  	default: 	 
			 			  		break;
		 			 	endswitch;
		 			// echo "</div>";
	 			break;
	 		case 'postalook':
	 				switch ( $process ) {
	 					case 'design':

	 						 	echo "   
	 						 		<center>
					                    <div onclick='gen_popup( \"hide\" )' style='margin-left:220px;cursor:pointer' > x </div>  
					                    <div id='post-look-category-and-keyword-popup' > 

					                        <form method='POST' action='post-contest' > 

					                            <div style='border:1px solid none;width: 150px;text-align:left;font-family:arial;font-size:12px;padding-bottom:10px;color:#fff;' > 
					                                <b>
					                                    Select Your Look Style and Keyword
					                                </b>
					                            </div>

					                            <div> 
					                                <select name='look_style' >  
					                                    <option>Chic</option> 
					                                    <option>Menswear</option> 
					                                    <option>Preppy</option>  
					                                    <option>Streetwear</option>  
					                                </select>  
					                            </div>    
					                            <div> 
					                                <input type='text' name='look_keyword'  placeholder='keyword' autocomplete='off'  /> 
					                            </div>  
					                            <div> 
					                                <input type='submit' name='look_style_keyword_submit' value='SAVE'/> 
					                            </div>  
					                        </form>  
					                    </div>  
					                </center>
				                "; 
	 						break; 
	 					default: 
	 						break;
	 				} 
	 			break;
	 		case 'notification':

	 			 	// echo " notification "; 
	 				$process           = ( $_GET['process'] != 'undefined' )     ? $_GET['process'] : 'add-notification-to-followers';    
	 				$limit_start       = ( !empty($_GET['limit_start']) ) ? $_GET['limit_start'] : 0;  
	 				$limit_end         = ( !empty($_GET['limit_end']) )   ? $_GET['limit_end']   : 5;   
	 			 	// echo "$process   mno = $mno  $limit_start $limit_end  ";
	 			 	// $mno = 1169;
	 			 	// $mno = 133;
	 				switch ( $process ) {
	 					case 'update-all-notification-to-oppend-counter':  
	 							$response =  mysql_query( "UPDATE fs_notification SET status = 1 WHERE status = 0 and mno1 = $mno " );		 
								$mc->message( 'all notification ' , $response , ' update viewed' );    
	 						break;
	 					case 'add-notification-to-followers':  

	 							$mc->send_notification_to_follower( $mno );   
	 						break;  
	 					case 'view-notification-load':
 					
	 				 			/* 
	 				 			 * update status = 1 where mno1 = 134
	 				 			 * to hide bubble notification 
	 				 			 */ 
						 			$response =  mysql_query( "UPDATE fs_notification SET status = 1 WHERE status = 0 and mno1 = $mno " );		 
									// $mc->message( 'all notification ' , $response , ' update viewed' );    
	 				 			/*
								 * print latest 10 messages modals
	 				 			 */ 
 
								$_SESSION['noti_limit_start']  = $_SESSION['noti_limit_start_init']; 
								$_SESSION['noti_limit_end']    = $_SESSION['noti_limit_end_init']; 


								//fb friends on fs
								$_SESSION['fb_freinds_on_fs_limit_start']=0;
                            	$_SESSION['fb_freinds_on_fs_limit_end']=$_SESSION['noti_limit_end_init'];


                            	//fb friends not on fs 
                            	$_SESSION['fb_friends_to_invite_on_fs_limit_start'] = 0;
                            	$_SESSION['fb_friends_to_invite_on_fs_limit_end'] = $_SESSION['noti_limit_end_init'];




                                    if($type == 'member-suggest') {   
                                    	$response  = $mc->getSuggestedMember();  
                                        $mc->notification_member_suggest( $response  , '../../../' );  
                                    } else if($type == 'fb-friends-on-fs') {  
                                    	echo "fb friends on fs"; 
                                    } else if($type == 'fb-friends-to-invite-on-fs') {  
                                    	echo "fb friends to invite on fs";  
                                    } else { 
                                    	// echo "load niti type " . $type; 
                                        /*
                                         * print latest 10 messages modals
                                         */
                                        $response =  $mc->posted_modals_notification_Query (
                                            array(
                                                'mno1'=>$mno,
                                                'limit_start'=> $_SESSION['noti_limit_start'],
                                                'limit_end'=> $_SESSION['noti_limit_end'],
                                                'orderby'=> 'nno desc',
                                                'notification_query'=>'get-notification-modal'
                                            )
                                        );
                                        /*
                                       * print modals
                                       */
                                        $mc-> notification_design( $response , '../../../' );
                                    }  
	 				 		break;
	 					case 'view-more-notification':   

                            if($type == 'member-suggest') {   
                            	$_SESSION['noti_limit_start'] += $_SESSION['noti_limit_end'] ;  
                            	//Lacking in brand and topic filter
                                $myInfo = select_v3( 'fs_members' , '*'  , 'mno = ' . $_SESSION['mno']);  


                                $city = (!empty($myInfo[0]['city'])) ? $myInfo[0]['city'] : null ;   
                                $state = (!empty($myInfo[0]['state_'])) ? $myInfo[0]['state_'] : null ;     
                                $w1 = (!empty($myInfo[0]['bdate'])) ? 'bdate = ' . intval($myInfo[0]['bdate']) : '' ; 
                                $w2  = (!empty($myInfo[0]['state_'])) ? " state_ LIKE '$state%' " :  " city LIKE '$city%' ";  







                                if (!empty($w1) and !empty($w2)) {
                                	$where = $w1 . ' and ' . $w2;
                                } elseif(!empty($w1) and empty($w2)) { 
                                	$where = $w1;
                                } elseif(empty($w1) and !empty($w2)) { 
                                	$where = $w2;
                                } else { 
                                } 
                                $where = 'mno <> ' . $_SESSION['mno'] . ' and ' . $where . ' LIMIT ' . $_SESSION['noti_limit_start']  . ', ' . $_SESSION['noti_limit_end'];  
                                $response = select_v3( 'fs_members' , '*'  , $where );   
                                if(count($response)>0) {
                                	$mc->notification_member_suggest( $response  , '../../../' );  	
                                }else{
                                	echo "No more member to suggest<br>";
                                }
                                
                            } else  if($type == 'fb-friends-on-fs') {  
                            	// echo "fb friends on fs" . $mno;  
                            	$mnos = $mc->get_fb_freinds_on_fs( $mno , '-+-' ); 


                            	if($mnos != FALSE) {
                                	// $mc->notification_member_suggest( $response  , '../../../' );  	 
	                            	// echo "<pre>"; 
	                              	
	                            	$mnos = array_slice($mnos, $_SESSION['fb_freinds_on_fs_limit_start'], $_SESSION['fb_freinds_on_fs_limit_end']);  
	                            	for ($i=0; $i <count($mnos); $i++) { 
	                            		// echo " mno = " . $mnos[$i] . '<br>';
	                            		$mc->notification_fb_friends_on_fs_print($mnos[$i], '../../../' );   	 
	                            	} 
	                            	// echo " limit " . $_SESSION['fb_freinds_on_fs_limit_start'] . ', ' . $_SESSION['fb_freinds_on_fs_limit_end']; 
								    $_SESSION['fb_freinds_on_fs_limit_start']+=$_SESSION['noti_limit_end_init'];  
 								}else{
                                	echo "No more fb friends on fs<br>";
                                	 echo $mnos;   
                                }
                            } else   if($type == 'fb-friends-to-invite-on-fs') {  
        						$freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-",$_SESSION['fb_friends_to_invite_on_fs_limit_start'],$_SESSION['fb_friends_to_invite_on_fs_limit_end']);    
        							if($freinds_on_fb != FALSE) { 
										// $freinds_on_fb = $mc->get_fb_freinds_on_fb($mno,"-+-",1,2);
										$fb_freinds_on_fb_len = $freinds_on_fb['fb_freinds_on_fb_len'];
										$fb_freinds_on_fb_len_limit = $_SESSION['noti_limit_end_init'];
										$fb_freinds_on_fb     = $freinds_on_fb['fb_freinds_on_fb']; 
										// print_r($freinds_on_fb); 
		        					  	// print_r($freinds_on_fb); 		      
										// change to fb profile pic  
										//require_once  '../../../fs_folders/API/facebook-php-sdk-v4-5.0-dev/src/Facebook/FacebookRequest.php'; 
										/* PHP SDK v5.0.0 */
										/* make the API call */
										// $request = new FacebookRequest(
										//   $session,
										//   'GET',
										//   //'/{user-id}'
										//   "/$fbfid"
										// );
										// $response = $request->execute();
										// $graphObject = $response->getGraphObject(); 
										// print_r($graphObject );
										/* handle the result */ 
									for ($i=0; $i < $fb_freinds_on_fb_len ; $i++) {  

										if(!empty($fb_freinds_on_fb[$i]['fbfid'])) {

											$fbfid = $fb_freinds_on_fb[$i]['fbfid'];  
										    // echo "fb id = " . $fbfid . ' '; 
											// $link = json_decode(file_get_contents('http://graph.facebook.com/1157251270'));
											// echo $link->name; 	 
											//Get fullname facebook user
										    $fql = 'SELECT name from user where uid = ' . $fbfid;
									        $ret_obj = $facebook->api(array(
									            'method' => 'fql.query',
									            'query' => $fql,
									        )); 
									        $fullName = $ret_obj[0]['name']; 
									        // $link = '#'; 
									        // FQL queries return the results in an array, so we have
									        //  to get the user's name from the first element in the array.
									        // echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>'; 
									        $mc->notification_facebook_user($fbfid, $ret_obj[0]['name']);  
									        
								    	}

									}  
	                            	$_SESSION['fb_friends_to_invite_on_fs_limit_start'] = $_SESSION['fb_friends_to_invite_on_fs_limit_end'];
	                            	$_SESSION['fb_friends_to_invite_on_fs_limit_end']=$_SESSION['fb_friends_to_invite_on_fs_limit_end']+$_SESSION['noti_limit_end_init'];


        						}else{
        							echo "No fb friends to invite<br>";
        						} 
                            } else { 
                            	$_SESSION['noti_limit_start'] += $_SESSION['noti_limit_end'] ; 
                                // echo " $_SESSION[noti_limit_start] $_SESSION[noti_limit_end] ";
                                $response =  $mc->posted_modals_notification_Query (
                                    array(
                                        'mno1'=>$mno,
                                        'limit_start'=> $_SESSION['noti_limit_start'],
                                        'limit_end'=> $_SESSION['noti_limit_end'],
                                        'orderby'=> 'nno desc',
                                        'notification_query'=>'get-notification-modal'
                                    )
                                );
                                // $mc->print_r1($response);
                                $mc-> notification_design( $response , '../../../' );
                            } 
                            break;
	 					case 'update-one-notification-to-oppend':   
	 						break;
	 					default: 
	 						break;
	 				}   
	 			break;
	 		case 'member-feed':
	 				// initialized

		 			 	$_SESSION['limit_start'] += $_SESSION['limit_end'];
		 			 	$_SESSION['end']         += $_SESSION['limit_end'];  
	 				// retrieved 

			 			$mc-> mysql_feed_query( array( 'type'=>'initialized' , 'mno'=>$mno , 'limit_start'=>$_SESSION['limit_start'] , 'limit_end'=>$_SESSION['end'] , 'limit_end_following'=>100 ) );  
						$response = $mc-> mysql_feed_query( array( 'type'=>'query-to-activity-wall' ) );  
						$len      = count($response);  

						for ($i=0; $i < $len ; $i++): 
							$_table   = $response[$i]['_table'];  
							$ano      = intval($response[$i]['ano']);   
							if ( $_table  == "postedlooks" ):
								// $mc->modals_look( $ano , $pagenum , 'profile' );	
								$mc->modal_version1_look ( $ano , '../../../' , '../../../' );				 
							elseif ( $_table  == "fs_members" ): 
								// member modals  
							 	// $mc->modals_memeber( $ano );
							 	$mc->modal_version1_member ( $ano ,  null  ,  '../../../' , '' , 'member-feed' ); 
							elseif ( $_table  == "postedarticle" ): 
								$mc->modal_version1_article ( $ano  , '../../../' , '../../../' , null , null , null , 'member-feed' );
							elseif ( $_table == "postedmedia" ):
								// midea modals
							endif; 
						endfor; 
	 			break;
	 		case 'modal-comment-like-dislike':


	 			

	 				// initialized
		 				$rate_type  = $_GET['rate_type'];
		 				$table_id   = $_GET['table_id'];
		 				$table_name = $_GET['table_name'];
		 				$mno        = $_GET['mno']; 
	 				// print data 
		 				echo " 
		 					rate_type = $rate_type  <br>
							table_id = $table_id   <br>
							table_name = $table_name <br>
							mno = $mno        <br>
							step = $step <br>
						";  
					// check and insert new comment rate 
		 				$response = $mc->posted_modals_rate_Query(  array(   'mno'=>$mno,   'table_name'=>$table_name ,   'table_id'=>$table_id ,   'rate_query'=>'get-user-rated-type')); 
		 				echo " response $response ";

		 				// $mc->message( 'rated' , $response , null  );
		 				if (  $response == false ) { 

			 				$response = $mc->posted_modals_rate_Query( 
			 					array( 'mno'=> $mno,   
			 						'table_name'=>$table_name, 
			 						'rate_type'=>$rate_type, 
			 						'table_id'=>$table_id, 
			 						'rate_query'=>'rate-insert' 
			 					) 
			 				);     
			 				$mc->message( 'rating successfull. ' , $response , null );  
			 				
		 				}
		 				else{  
		 					echo " u already rated this <br>";
		 				}





		 			// count total rate and update comment 
	 					$tlike    = $mc->posted_modals_rate_Query( array( 'table_name'=>$table_name , 'table_id'=>$table_id, 'rate_query'=>'get-rate-total-likes'    ));   
	 					$tdislike = $mc->posted_modals_rate_Query( array( 'table_name'=>$table_name , 'table_id'=>$table_id, 'rate_query'=>'get-rate-total-dislikes' ));    
	 					echo " tlikes $tlike tdislikes $tdislike <br> "; 
                        if($table_name == 'fs_comment') {
                            echo " comment ";
                            $mc->update_fs_table_auto($table_id , array('tlike'=>$tlike , 'tdislike'=>$tdislike ) ,  'fs_comment' );
                        } else {
                            echo "else posted looks ";
                            $mc->update_fs_table_auto($table_id , array('pltvotes'=>$tlike ) ,  $table_name);
                        }

       				// Post to activity wall 	
                        $mc->update_or_add_my_activity_wall_post( $mno , $table_id , 'Liked' , $table_name , $mc->date_time );   

					// Set notification	 	 
                    if($table_name == 'postedlooks' || $table_name == 'fs_postedarticles') { 

 						echo "add notification here";
                   		$mc->set_session_notification( $mno , $table_name , $table_id , 'likes' );    
                   		$mc->send_notification_to_follower($_SESSION['mno']); 
                	} else {  



				 			 // set and add notification session

										$response =  $mc->posted_modals_comment_Query ( 
									        array(  
									          'cno'=>$table_id, 
									          'comment_query'=>'get-comment-sepcific-by-cno'   
									        ) 
										);
				               


									    $mno2       = $response[0]['mno']; 
									    $comment    =  $response[0]['comment']; 
									    $table_name = $response[0]['table_name']; 
									    $table_id   = $response[0]['table_id'];   
			  							// $action     =  "<span class='fs-text-red'> rated </span> ";   
			  							//$comment    =  "this is the comment"; 
			   							//$mno2 = 958; // owner of the comment rated 

			 							$mc->set_notification_info( $table_name , $table_id , $rate_type , null , null , 0 , 'rate_comment' , $mno2 , $comment );  

				 						/*
						 				$comment            =   " this is the comment";
						 				$action             =   "<span class='fs-text-red'> $rate_type </span> ";    
						 				$modalownername     =   $mc->get_full_name_by_id ( $mc->get_modal_owner( $table_name , $table_id ) ); 
										$particaptedname    =   $mc->get_full_name_by_id ( $mno );
										$modaltype          =   $mc->get_modal_type( $table_name , $table_id );   

										$noti_participated  =  "<b>$particaptedname</b> $action on <b>$modalownername</b> $modaltype comment: $comment ";
										$noti_owner         =  "<b>$particaptedname</b> $action on your $modaltype comment: $comment ";    
										$mc->set_notification_info( $table_name , $table_id , $noti_participated , $noti_owner , 0 ,  null );  
										*/ 
				 				// $mc->set_notification_info( $table_name , $table_id , "<span class='fs-text-red'>$rate_type</span>" , $mno2 , 0 ); 
			        }





                    // Update user likes owner of the modal
                        $mno3 = $mc->get_modal_owner( $table_name , $table_id ) ;
                        if($table_name == 'fs_postedarticles') {
                            $tLikes = $article1->overAllRating($mno3);
                            echo  "total likes  $tLikes modal owner mno = $mno3 modal is article <br>";
                            $db->update('fs_members', array('trating_article'=>$tLikes), "mno = " . $mno3);
                        } else {
                            $tLikes = $look1->overAllRating($mno3);
                            echo  "total likes  $tLikes modal owner mno = $mno3 modal is look <br>";
                            $db->update('fs_members', array('trating_look'=>$tLikes), "mno = " . $mno3);
                        }






	 			break;
	 		case 'modal-comment-send':
    
		 				

		 			// print data
	 		
	 					echo " 
		 					this is the comment modal sent <br> send <br> sent <br> $mno        <br>
							comment = $comment     <br>
							table_id = $table_id    <br>
							table_name = $table_name  <br> 
							type = $type <br> 
						";  

 
	 				switch ( $type ) {
	 					case 'edite-save':  
	 						 	// echo " this is the edite saved ";  
								$response =  $mc->posted_modals_comment_Query ( 
									array(    
									    'cno'=>$table_id,
									    'comment'=>$comment, 
									    'comment_query'=>'comment-update'  
									)
								); 
								$mc->message( "update comment  $comment "  , $response , '' );
	 						break; 
	 					default: 
				 			// insert message

	 							if ( $table_name == 'postedlooks' ) { 

	 								// if posting comment is look 

		 								echo "insert with look comment"; 
		 								$response  = $mc->add_my_latest_look_comment( $mno , $table_id , $mc->clean_text_before_save_to_db( $comment ) , $mc->date_time ); 
		 								$mc->message( " insert new postedlooks_comments comment = $comment  table_id = $table_id table_name = $table_name   " , $response , "" );

	 							}
	 							else{

	 								$response =  $mc->posted_modals_comment_Query ( 
								 		array(     
										    'mno'=>$mno,
										    'comment'=>$comment,
										    'table_name'=>$table_name,
										    'table_id'=>$table_id,
										    'comment_query'=>'comment-insert'  
									  	) 
								 	); 
	 							}

							// $mc->message( 'comment was ', $response , ' posted ');    
							// get and update total comment of the modal   
							// echo " update total comment here modal "; 

							 	/*
							 	switch ( $table_name ) {
							 		case 'fs_member_profile_pic':  
							 		 		$tcomment = $mc->modal( 
							 		 			array( 
							 		 				'table_name' => $table_name,  
							 		 				'table_id' => $table_id ,  
							 		 				'type' => 'get-modal-tcomment' 
							 		 			) 
							 		 		);  
							 				$mc->update_fs_table_auto( $table_id , array( 'tcomment'=>$tcomment ) , 'fs_member_profile_pic' );  
							 				$mc->update_or_add_my_activity_wall_post( $mno , $table_id , 'Commented' , $table_name , $mc->date_time );  
							 			break; 
							 		case 'postedlooks':
							 			break; 
							 		case 'fs_postedmedia': 
							 			break;
							 		case 'fs_postedarticle': 
							 			break;
							 		default: 
							 			break;
							 	}     
							 	*/

					 		 		$tcomment = $mc->modal( 
					 		 			array( 
					 		 				'table_name' => $table_name,  
					 		 				'table_id' => $table_id ,  
					 		 				'type' => 'get-modal-tcomment' 
					 		 			) 
					 		 		);  

					 		 		if ( $table_name == 'postedlooks' ) {


					 		 			// if posting comment is look 


					 		 			echo " total comment =  $tcomment ";
						 		 			// $tcomment = 123;
						 		 			$respose = mysql_query("UPDATE $table_name set pltcomment = $tcomment WHERE plno = $table_id "); 
						 		 			$mc->message( "UPDATE $table_name set pltcomment = $tcomment WHERE plno = $table_id " , $respose , "" );
					 		 		}
					 		 		else{

					 		 			$mc->update_fs_table_auto( $table_id , array( 'tcomment'=>$tcomment ) , $table_name );   

					 		 		}


					 		 		$mc->update_or_add_my_activity_wall_post( $mno , $table_id , 'Commented' , $table_name , $mc->date_time );  






					 				 
							# print the response if actual modal or in the feed

				 				if ( $actual_modal == true ):  
									switch ( $table_name ):
								 		case 'fs_member_profile_pic':   
								 			break; 
								 		case 'postedlooks': 
								 			break; 
								 		case 'fs_postedmedia': 
								 			break;
								 		case 'fs_postedarticle': 
								 			break;
								 		default: 
								 			break;
							 		endswitch; 
				 				 else:  
				 				 	
									// retrieve lates and print design for the live apppend.  


				 				 	if ( $table_name == 'postedlooks' ) {
				 				 		  
				 				 	 	$response = select_v3( 'posted_looks_comments' , '*' , " plno =  $table_id order by plcno desc limit 1 " ); 

				 				 	}
				 				 	else{
				 				 		
				 				 		$response =  $mc->posted_modals_comment_Query ( 
										  	array(  

											    'table_name'=>$table_name,
											    'table_id'=> $table_id, 
											    'orderby'=> 'cno desc', 
											    'limit_start'=>0,
											    'limit_end'=> 1, 
											    'comment_query'=>'get-comment-modal'   
										  	)
										);    

				 				 	}

										if ( $page == 'feed' ){  
											echo "<modal-comment>";
												$mc->print_comment( $response , '../../../' ,'dynamic' , $mno , $table_name ); 
											echo "<modal-comment>"; 
										} 
										else if($page == 'detail' || $page == 'detail-keyup' ){    


											echo "<modal-comment>";  
												// $mc->modal_print_comment( $response[0] , '../../../' );   
												$mc->modal_print_comment_v1( $response[0] , '../../../' , null);   
												// $this->comment_details_design(
            //                                 array(
            //                                     'username' => $username,
            //                                     'psrc'=>$psrc,
            //                                     'fullname'=>$fullname,
            //                                     'dateTime'=>$date ,
            //                                     'message'=>$msg ,
            //                                     'cno'=>$cno , 
            //                                     'you_liked'=>$you_liked , 
            //                                     'you_disliked'=>$you_disliked,
            //                                     'plctlikes'=>$tlike,
            //                                     'plctdislike'=>$tdislike,
            //                                     'plno'=>$table_id, 
            //                                     'mno1'=>$mno,
            //                                     'src_img_flag'=>$modal['src_img_flag'], 
            //                                     'table_name'  => 'fs_comment'
            //                                 ) 
            //                             );   



											echo "<modal-comment>"; 


										}  

									// update to the activity wall       
				 				endif;   
			 				// set and add notification session     
								$action =   "<span class='fs-text-red'> commented </span> ";   
								$mc->set_session_notification( $mno , $table_name , $table_id , $action , $comment );     
	 					break;
	 				}
	 			break;
	 		case 'modal-comment-edit':
	 			 		
	 			 	switch ( $process ) {
	 			 		case 'modal-comment-edit-design':

	 			 				// get the rowname and rowid of the specific table for the article or the look 

	 			 			 		if ( $table_name == 'posted_looks_comments' ) { $rowid = 'plcno';  $rowcomment = 'msg'; $table_name_comment = 'posted_looks_comments';  } else{ $rowid  = 'cno';  $rowcomment = 'comment'; $table_name_comment = 'fs_comment'; } 	

	 			 			 	// get current comment 

	 			 			 		$response = select_v3( 
							   	   		 $table_name_comment, 
							   	   		'*' , 
							   	   		" $rowid = $table_id " 
							   	   	);    

	 			 			 	// get the current comment value  

	 			 			 		$comment = $response[0][$rowcomment];  
	 			 			 		// echo " rowid = $rowid  rowcomment = $rowcomment  comment = $comment  table_name = $table_name table id = $table_id <br> ";  

	 			 			 	// design  
	 			 			 		?> 
	 			 			 			<center> 
	 			 			 				<table  id='modal-comment-edit-container'  > 
	 			 			 					<tr>
	 			 			 						<td> 

	 			 			 						
		 			 			 			 
			 			 			 			<ul>
			 			 			 				<li> 
			 			 			 					<table style="width:100%;" border='1' >
			 			 			 						<tr>
			 			 			 							<td> 
			 			 			 								<textarea rows="5"  id="modal-comment-edit-textarea" ><?php echo $comment; ?></textarea>
			 			 			 							</td>
			 			 			 					</table> 
			 			 			 				</li>
			 			 			 				<li> 
				 			 			 				<table border="0" cellpadding="0" cellspacing="0" > 
				 			 			 					<tr> 
					 			 			 					<td> 
					 			 			 						<input type="button" value="cancel"  onclick="fs_popup( 'close')"  /> 
					 			 			 					</td> 
							 			 			 			<td> 
							 			 			 				<input type="button" value="update" onclick = "modal ( 'modal-comment-edit' , 'modal-comment-edit-update' , 'type' , 'update-comment-loader' , 'comment-container<?php echo $table_id; ?>' , '#modal-comment-edit-textarea' , 'value' , 'multivalue' , 'method' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' )" />  
							 			 			 			</td> 
					 			 			 			</table> 
			 			 			 				</li>
			 			 			 			</ul> 
			 			 			 			 <!-- modal ( action , process , type , loader , response , textfieldid , value , multivalue , method , table_id , table_name ) -->
		 			 			 		 </td>
	 			 			 				</table>
		 			 			 		</center>

	 			 			 			<style>

	 			 			 				#modal-comment-edit-container {  
	 			 			 					border:1px solid #B8B8B3;
	 			 			 					width: 50%;
	 			 			 					height: 130px;
	 			 			 					padding: 10px;
	 			 			 					background-color: #f6f7f8;
	 			 			 					border-radius: 5px;

	 			 			 				}
	 			 			 				#modal-comment-edit-container ul li { 
	 			 			 					/*border:1px solid yellow;*/
	 			 			 				}
	 			 			 				#modal-comment-edit-container textarea { 
	 			 			 					width: 100%;
	 			 			 					resize:none;
	 			 			 					border:1px solid grey;
	 			 			 					border-radius: 5px;
	 			 			 				}  
	 			 			 				#modal-comment-edit-container table {  
	 			 			 					position: relative; 
	 			 			 					float: left;
	 			 			 				}

	 			 			 			</style>
	 			 			 		<?php    
	 			 			break;
	 			 		case 'modal-comment-edit-update':  

	 			 				// get the rowname of the specific table for the article or the look 

									if ( $table_name == 'posted_looks_comments' ) { $rowid = 'plcno';  $rowcomment = 'msg'; $table_name_comment = 'posted_looks_comments';  } else{ $rowid  = 'cno';  $rowcomment = 'comment'; $table_name_comment = 'fs_comment'; } 	

										// echo " rowid = $rowid  rowcomment = $rowcomment  comment = $comment  table_name = $table_name table id = $table_id <br> ";  
 
								// update the table  

		 			 			 	$response = mysql_query( "UPDATE $table_name_comment SET $rowcomment = '$comment' WHERE $rowid = $table_id " ); 

		 			 			 	$mc->message ( " UPDATE $table_name SET $rowcomment = '$comment' WHERE $rowid = $table_id  " , $response , "" );  

	 			 			break;
	 			 		default:
	 			 			# code...
	 			 			break;
	 			 	}  
	 			break;
	 		case 'profile-tabs': 

	 				// get user information visited 

	 					$memFsInfo                     = $mc->get_user_full_fs_info( $mno1  );   




	 				// set category as session
	 				// this is used for the next prev nubers so that no need to select new category from the dropdown because its already in the session 

	 					if ( $category == 'empty' ) {
	 						 $category = $_SESSION['category']; 
	 					}
	 					else{
	 						$_SESSION['category'] = $category;
	 					} 

	 				// remove undefined 

						$orderby = str_replace('undefined', '', $orderby); 
						$like    = str_replace('undefined', '', $like); 
						$sub     = str_replace('undefined', '', $sub); 
						 
	 				// initialize data 

				 		$tab                  = $_GET['tab']; // tab in the profile page clicked 
				 		$mno1                 = $_GET['mno1'];  // the user who visited by the logon user
						$pagenumgroup         = ( !empty($_GET['pagenumgroup']) ) ? $_GET['pagenumgroup']             : 1;   // pagegroupnumber is the arrow left or right number default 1 if not provided
						$pagenumgroup_limit   = ( !empty($_GET['pagenumgroup_limit']) ) ? $_GET['pagenumgroup_limit'] : 816;    // 24 modals x 34 page numbers
				 		$modal_total_show     = ( !empty($_GET['modal_total_show']) ) ? $_GET['modal_total_show']     : 24;     //  total modals will show per pagenum
						$pagenum              = ( !empty($_GET['pagenum']) ) ? $_GET['pagenum']                       : 1;     // page number default by 1 if not supplied 
				 		$limit_start          = $mc->get_loop_start( $pagenum , $modal_total_show );  
						$limit_end            = $mc->get_loop_end( $pagenum , $modal_total_show ); 
						$start                = 0;  
						$page  				  = ( !empty( $_GET['page'] ) ) ? $_GET['page'] : 'profile-tabs' ; 
						$get_total_modal 	  = 1;    
						$like 				  = ( !empty( $like ) ) ? "fullname LIKE '$like%'" : null ; 
					 
						echo " this is the page $page   <br> ";
 
					// get the numbers for the pagenum 
						
	 					$limit_start_group    = $mc->get_loop_start( $pagenumgroup , $pagenumgroup_limit );  
						$limit_end_group      = $mc->get_loop_end( $pagenumgroup , $pagenumgroup_limit );    


						if ( $get_total_modal == 1 ) {
							 
							$response = $mc->profile_tab_query( 
			 					array( 
			 						'page'=>$page,
			 						'tab'=>$tab, 
			 						'mno'=> $mno1,  
			 						'limit_start'=>$limit_start_group,
									'limit_end'=>$limit_end_group,
									'orderby'=>$orderby,
									'like'=>$like,
									'sub'=>$sub, 
									'category'=>$category
			 					)
			 				);     
			 			 	$tmodal = count($response); 
			 			}
						else { 

							// this is the auto count but not in used because not yet coded properly


							$response = select_v4( array( 'type'=>'select',  'tablename'=>'fs_search', 'rows'=>'count(*) as sno',   'order'=>"sno desc limit $limit_start_group , $limit_end_group"      ) );	
							$tmodal = $response[0][0];
						}
 			 	
						/*
						* print result  
						*/ 
							echo " <h3> print result here </h3> ";
							// print_r($response); 



						// if ( $pagenum == 1 ) {  this condtion apply because this is need to used in the once only to avoid the taking long of loading. . .
							echo "  group_next_value_pagenum( $pagenumgroup ,  $pagenumgroup_limit , $modal_total_show , $limit_start_group , $tmodal ) ";
							$pageNext             = $mc->group_next_value_pagenum( $pagenumgroup ,  $pagenumgroup_limit , $modal_total_show , $limit_start_group , $tmodal ) ;      
							// print nex prev page  
							if ( $pageNext[0] ==  $pagenum ) {
								echo "<number-nextprev>"; 
								 $mc->print_next_prev_numbers( $pageNext , null , 'profile-tabs' , null ,  array( 'mno1'=>$mno1 , 'tab'=>$tab , 'page'=>$page ) ); 
								echo "<number-nextprev>";	 
							}
							else{
								echo "<number-nextprev>no-change<number-nextprev>";	 	
							}  
						// }
 
						/* 
							//this is use as visual in the site not in used for function 
								$limit_start_group    = $mc->get_loop_start( $pagenumgroup , $pagenumgroup_limit );  
								$limit_end_group      = $mc->get_loop_end( $pagenumgroup , $pagenumgroup_limit );    
								echo "  
									tab = $tab         <br>
									mno1 = $mno1        <br> 
									pagenumgroup = $pagenumgroup <br> 
								 
									pagenumgroup total modal  containt =  limit_start_group = $limit_start_group limit_end_group = $limit_end_group  <br>
									modal_total_show = $modal_total_show       <br>
									limit_start = $limit_start <br>
									limit_end = $limit_end   <br> 
								"; 	
		 				*/ 
						// $limit_start   = $_GET['limit_start'];
				 		// $limit_end     = $_GET['limit_end'];   
	 
					// retrieve data 
 
						 	echo " this is the profile tab here ";
							$response = $mc->profile_tab_query( 
			 					array( 
			 						'page'=>$page,
			 						'tab'=>$tab, 
			 						'mno'=> $mno1,   
			 						'limit_start'=>$limit_start,
									'limit_end'=>$limit_end,
									'orderby'=>$orderby,
									'like'=>$like,
									'sub'=>$sub,
									'category'=>$category
			 					)
			 				);  	 
						  
		 			// count total result 

						$response_len = count( $response );  
						// print_r( $response );  
						// echo " tab = $tab  total res $response_len <Br> ";

					// print result 

			 			switch ( $tab ) {
			 				case 'latest':   
									for ($i=$start; $i < $response_len ; $i++):     
		 
										$_table 	= $response[$i]['_table']; 
										$ano        = intval($response[$i]['ano']);   

										if ( $_table  == "postedlooks" ){ 
											$mc->modal_version1_look ( $ano , '../../../' , '../../../' );		
										}
										else if ( $_table  == "fs_members" || $_table == 'fs_member_profile_pic' ){
										 	$mc->modal_version1_member ( $ano ,  null  ,  '../../../' , '' , $page ); 
										}
										else if ( $_table  == "fs_postedarticles" ){ 
										 	// $mc->modal_version1_article ( $ano , '../../../' );   
										 	$mc->modal_version1_article ( $ano  , '../../../' , '../../../' , null , null , null , $page );
										}
										else if ( $_table == "postedmedia" ){ 
										}
		 
			 						endfor;  
			 					break;
			 				case 'looks':
			 					 	// echo " looks "; 
			 						for ($i=0; $i < $response_len ; $i++) { 
			 							$plno = $response[$i]['plno'];  
			 							// echo " plno  $plno ";
			 							$mc->modal_version1_look ( $plno , '../../../'  , '../../../' , 'display:none;' , null , 'profile-tab-look' );		
			 						} 
			 					break;
			 				case 'followers':
		 							#who follow me ? 
		 							for ($i=0; $i < $response_len ; $i++):
		 								$mno = $response[$i]['mno'];   
			 							$mc->modal_version1_member ( $mno ,  null  ,  '../../../'  , 'display:none;' ,  'profile-tab-followers' , 'display:none' ); 
		 							endfor; 
			 					 	// echo " followers ";
			 					break;
			 				case 'following': 
			 						#who i am following ?
			 						for ($i=0; $i < $response_len ; $i++):
		 								$mno1 = $response[$i]['mno1'];   
			 							$mc->modal_version1_member ( $mno1 ,  null  ,  '../../../'  , 'display:none;' ,  'profile-tab-followers' , 'display:none' ); 
		 							endfor; 
			 						// echo " following "; 
			 					break; 
			 				case 'blogs': 
		 					 		for ($i=0; $i < $response_len ; $i++):     
		 					 			$artno = $response[$i]['artno']; 
					 					// $mc->modal_version1_article ( $ano , '../../../');  	
					 					$mc->modal_version1_article ( $artno  , null , '../../../'  ,  'display:none' , null  , $page , $page );
					 				endfor; 
			 					break;
			 				case 'media':

			 					 	echo " media "; 
			 					break;
			 				case 'comments': 

			 					 	echo " comments"; 
			 					break;
			 				case 'member':

			 					 	echo " this is the member <br> ";
		 					 		for ($i=0; $i < $response_len ; $i++):
		 								$mno = $response[$i]['mno'];   
			 							$mc->modal_version1_member ( $mno ,  '../../../'  ,  '../../../'  , 'display:none;' ,  'profile-tab-followers' , 'display:none'  ); 
	 								endfor; 
			 					break;
			 				case 'flag':

	 								echo " flag   ";

	 								for ($i=$start; $i < $response_len ; $i++):     
		 								 
		 								$table_name 	= $response[$i]['table_name']; 
										$table_id        = intval($response[$i]['table_id']);   

										if ( $table_name  == "postedlooks" ){ 

											$mc->modal_version1_look ( $table_id , '../../../'  , '../../../' , 'display:none;' , null , 'profile-tab-look' );		

										}
										else if ( $table_name  == "fs_members" || $table_name == 'fs_member_profile_pic' ) {

										 	// $mc->modal_version1_member ( $table_id ,  '../../../'  ,  '../../../'  , 'display:block;' ,  'admin-flag' , 'display:none'  ); 
										}
										else if ( $table_name  == "fs_postedarticles" ) { 

										 	// $mc->modal_version1_article ( $ano , '../../../' );   
										 	$mc->modal_version1_article ( $table_id  , null , '../../../'  ,  'display:none' , null  , $page , $page );

										}
										else if ( $table_name == "postedmedia" ) { 

										}

			 						endfor;    
			 					break;
			 				case 'beloved':  
			 						echo " this is favorite <br> ";
			 						for ($i=0; $i < $response_len ; $i++):    
										$table_id   = $response[$i]['table_id'];   
										$table_name = str_replace(' ', '', $response[$i]['table_name']);


										// echo "table id = $table_id table name $table_name ";
										// $table_name = 'fs_postedarticles';
			 							switch ( $table_name ): 
			 								case 'postedlooks': 
						 							$mc->modal_version1_look ( $table_id , '../../../'  , '../../../' , 'display:none;' , null , 'profile-tab-look' );		
			 									break; 
			 								case 'fs_postedarticles':
			 										$mc->modal_version1_article ( $table_id  , null  , '../../../' ,  'display:none' , null  , $page , $page );
			 									break; 
			 								default: 
			 									break;
			 							endswitch;  
			 							// echo " this is the favorite tab";
			 						endfor; 
			 					break;
			 				case 'rating':
			 				 		echo " this is ratings <br> ";
			 						for ($i=0; $i < $response_len ; $i++):    
										$table_id   = $response[$i]['table_id'];   
										$table_name = str_replace(' ', '', $response[$i]['table_name']);


										// echo "table id = $table_id table name $table_name ";
										// $table_name = 'fs_postedarticles';
			 							switch ( $table_name ): 
			 								case 'postedlooks': 
						 							$mc->modal_version1_look ( $table_id , '../../../'  , '../../../' , 'display:none;' , null , 'profile-tab-look' );		
			 									break; 
			 								case 'fs_postedarticles':
			 										$mc->modal_version1_article ( $table_id  , null  , '../../../' ,  'display:none' , null  , $page , $page );
			 									break; 
			 								default: 
			 									break;
			 							endswitch;  
			 							// echo " this is the favorite tab";
			 						endfor; 
			 					break;
			 				default: 
			 					break;
			 			}  


					// print result   

							


			 			// get rating and percentage for look and article by category

	 						$response = $mc->fs_member_categories(  
							    array( 
							        'type'=>'select', 
							        'where'=>"mno = $mno1 and category = '$category'" 
							    )
						    ); 

						    // pass the value rating and category 

							    $tpercentage = ( !empty($response[0]['tpercentage'])) ? $response[0]['tpercentage'] : 0 ; 
							    $trating 	 = ( !empty($response[0]['trating'])) ? $response[0]['trating'] : 0 ; 
 
					    // print sub options in the profile tab 
							echo "<div style='display:none' >";
					 			echo "<profile-sub-categories>";  
	 
						 			switch ( $tab ) {
						 				case 'latest':    
						 					break;
						 				case 'looks':  
						 						
												// if no rating and percentage for spefic category then get user overall look rating and percentage  

												    if ( empty($response) ) {   

						  								$tpercentage  = $memFsInfo['tpercentage_look'];			
													    $trating 	  = $memFsInfo['trating_look'];

												    } 
												    
							 						echo " RATINGS ($trating) PERCENTAGE ($tpercentage%)";

						 					break;
						 				case 'followers': 
						 					break;
						 				case 'following':  
						 					break; 
						 				case 'blogs':  

												// if no rating and percentage for spefic category then get user overall look rating and percentage  

												    if ( empty($response) ) {   

						  								$tpercentage  = $memFsInfo['tpercentage_article'];			
													    $trating 	  = $memFsInfo['trating_article'];

												    }  
							 						echo " RATINGS ($trating) PERCENTAGE ($tpercentage%)";

						 					break;
						 				case 'media': 
						 					break;
						 				case 'comments':  
						 					break;
						 				case 'member': 
						 					break;
						 				case 'flag': 
						 					break;
						 				case 'beloved':   
						 					break;
						 				case 'rating': 
						 					break;
						 				default: 
						 					break;
						 			}   
					 			echo "<profile-sub-categories>"; 
					 		echo "</div>";  
	 			break; 
	 		case 'fs-drip-modals':

	 				$mno         = $_GET['mno'];
					$table_name  = $_GET['table_name'];
					$table_id    = $_GET['table_id'];
					$mno1        = $_GET['mno1'];
					$comment     = ( !empty( $_GET['comment'] )    ) ? $_GET['comment'] : null ; 
	 				$modal_type  = ( !empty( $_GET['modal_type'] ) ) ? $_GET['modal_type'] : 'Look' ; 
	 				$title       = ( !empty( $_GET['title'] )      ) ? $_GET['title'] : null ;   

	 				switch ( $_GET['steps'] ) {
	 					case 'design': 
	 
	 							// $image = $mc->modal( 
	 							//  	array(
	 							//  		'table_name' =>$table_name,
	 							//  		'table_id'   =>$table_id,
	 							//  		'type'       =>'get-modal-image',  
	 							//  		'size'       =>'normal'
	 							//  	) 
	 							// );
	 
	 							 $image = $mc->image(   
									array( 
										'table_name'=> $table_name , 
										'table_id'=> $table_id,
										'size'=>'home',
										'type'=>'get-default-image-src',
										'path'=>'../../../'
									 )
								); 

	 							echo " 
	 								<center>
			 							<div id='drip-modal-wrapper' >
											<div id='drip-modal-container' >    
											 	<table border='0' cellspacing='0' cellspadding='0' > 
											 		<tr> 
											 			<td id='drip-modal-container-header' > 
											 				<div>
											 					Share This $modal_type
											 				</div>
											 			</td> 
											 		<tr>
											 			<td id='drip-modal-container-image' > 
															<img src='$image' />
											 			</td> 
											 		<tr>
											 			<td id='drip-modal-container-comment' > 
											 				<textarea placeholder='Write Something:' id='dript-comment' ></textarea> 
											 			</td>  
											 		<tr>
											 			<td id='drip-modal-container-title' > 
											 				<div>$title</div> 
											 			</td> 
											 		<tr>
											 			<td id='drip-modal-container-buttons' > 
											 				<table>
											 					<tr> 
											 						<td style='width:20px;' > ";  

											 							// <img src='$mc->genImgs/drip-cancle-drip-button.png' title='cancel' onclick='gen_popup( \"hide\" );'  /> 

											 						?> 
												 						<img 
												 							class='share-cancel'
												 							id="postarticle-cencel" 
													 						src="fs_folders/images/genImg/cancel.png" 
													 						onclick=" fs_popup( 'close' ) " 
													 						onmousemove="mousein_change_button ( '#postarticle-cencel' , 'fs_folders/images/genImg/cancel-mouse-over.png' )" 
													 						onmouseout="mouseout_change_button (  '#postarticle-cencel'  , 'fs_folders/images/genImg/cancel.png' ) "
												 						> 
											 						<?php

											 							echo " 
											 						</td>  
											 						<td>  
											 						"; 

											 						?>

											 							<img 
											 								class='share-post'
												 							id="postarticle-submit" 
												 							src="fs_folders/images/genImg//post.png" 
												 							onclick="drip_posting( '<?php echo $mno; ?>' , '<?php echo $table_name; ?>' , '<?php echo $table_id; ?>' , '<?php echo $mno1; ?>' , '.modal-tdriped<?php echo $ano; ?>' )" 
												 							onmousemove=" mousein_change_button ( '#postarticle-submit' , 'fs_folders/images/genImg//post-mouse-over.png' )"
												 							onmouseout="mouseout_change_button (  '#postarticle-submit'  , 'fs_folders/images/genImg//post.png' ) "
											 							>


											 						<?php 
											 							// <img src='$mc->genImgs/drip-look-button.png' title='drip look'  onclick='drip_posting( \"$mno\" , \"$table_name\" , \"$table_id\" , \"$mno1\" , \".modal-tdriped$ano\" )'  />		 
											 							echo " 
											 						</td>  
											 				</table>
											 			</td>  
											 	</table> 
											</div>  
										</div>
									</center>
	 							"; 
	 						break;  
	 					case 'function':  
								// insert to fs drip table  

			  						$response =  $mc->fs_drip_modals_Query ( array( 'mno'=> $mno,   'table_id'=>$table_id,  'table_name'=>$table_name,  'comment'=> $comment,  'mno1'=>$mno1, 'query_drip'=>'drip-insert'  ) ); 

			  					// post to activity wall  
			  					
			  						$b = $mc->update_or_add_my_activity_wall_post( $mno , $table_id , 'Dripped' , $table_name , $mc->date_time );   
			  						//echo " <br><BR><BR>"; 	  
			  						//$mc->message (" dripped $modal_type ", $response , ''  ); 
			  						#$mc->message (" Dripped ", $b , '. '  ); 
			  						// echo "<img src='$mc->genImgs/drip-cancle-drip-button.png' title='cancel' onclick='close_category_popup ( )'  />";  

			  					//  get total modals dripped   

			  						$pltdrip = $mc->fs_drip_modals_Query( array( 'table_name'=>$table_name , 'table_id'=>$table_id , 'query_drip'=>'get-modal-total-dripped' ) ); 
			  						// $mc->message (" Total Dripped ",$pltdrip, '. '  ); 

			  					// update table total dripped  
			  						$mc->update_fs_table_auto( $table_id , array('tdrip'=>$pltdrip)  , $table_name );  
			  					// print the thank you message  
			  						$mc->dialog( array('type'=> 'alert' , 'headermssg'=> 'SUCCESSFUL POST' , 'contentmssg'=> 'This post was succesfully posted to your feed.' ) );    

			  					// set notification  
			  						// $mc->set_notification_info( $table_name , $table_id , "<span class='fs-text-red'> dripped </span> says: $comment "  , $mno2 , 0 );  
									// $mc->set_session_notification( $mno , $table_name , $table_id , $action , $comment );     
									

			  						if($table_name == 'postedlooks') { 
			  							$action = 'dripped';
			  						} elseif($table_name == 'fs_postedarticles') {
			  							$action = 'shared ( dripped )';
			  						} else { 
			  						}

									$mc->set_session_notification($mno, $table_name, $table_id, $action, $comment); 

	 						break; 
	 					default: 
	 						break;
	 				} 
	 			break;  
	 		case 'fs-favorite-modals':

	 				$mno         = $_GET['mno'];
					$table_name  = $_GET['table_name'];
					$table_id    = $_GET['table_id'];
					$mno1        = $_GET['mno1'];
					$comment     = ( !empty( $_GET['comment'] )    ) ? $_GET['comment'] : null ; 
	 				$modal_type  = ( !empty( $_GET['modal_type'] ) ) ? $_GET['modal_type'] : 'Look' ; 
	 				$title       = ( !empty( $_GET['title'] )      ) ? $_GET['title'] : null ;   
	 				$headermssg  = ( !empty( $_GET['headermssg'])  ) ? $_GET['headermssg'] : 'POST' ;   
	 				$contentmssg = ( !empty( $_GET['contentmssg']) ) ? $_GET['contentmssg'] : 'POST IS SUCCESSFUL!' ;   
	 				// echo "mno = $mno <br>  table_name = $table_name <br>  table_id = $table_id   <br>  mno1 = $mno1       <br>  comment = $comment    <br>  modal_type = $modal_type <br>  title = $title      <br>  headermssg = $headermssg <br>  contentmssg = $contentmssg <br>  "; 
	 				// 	echo " 
	 				// 	$mno          
					// $table_name   
					// $table_id     
					// $mno1        "; 
	 				switch ( $_GET['steps'] ) {
	 					case 'design':  

	 						break;  
	 					case 'function':    

	 							// check if already favorited  

									$response =  $mc->fs_favorite_modals_Query ( array( 'limit_start'=>0 , 'limit_end'=>1 , 'query_where'=>"mno = $mno and table_id = $table_id and table_name = '$table_name' " , 'query_order'=>'fmno asc' , 'query_favorite'=>'get-all-user-favorite'  ) ); 
									// $mc->print_r1( $response );  

	  							// if not yet favorited insert to table favorite 

									if ( empty($response)) { 

		 								$response =  $mc->fs_favorite_modals_Query ( array(    'mno'=> $mno,  'table_id'=>$table_id , 'table_name'=>$table_name, 'mno1'=> $mno1 ,'query_favorite'=>'favorite-insert' ) ); 
		 								// $mc->message( ' favorite ', $response , null );  
	 									
	 									# set notification  
	 											$mc->set_session_notification( $mno , $table_name , $table_id , 'favorited'  );
												// $mc->set_session_notification( $mno , $table_name , $table_id , 'favorited' );    
		  									// $mc->set_notification_info( $table_name , $table_id ,"<span class='fs-text-red' >favorited</span>"  , $mno2 , 0 );


					  					// post to activity wall  
					  					
					  						$b = $mc->update_or_add_my_activity_wall_post( $mno , $table_id , 'Favorited' , $table_name , $mc->date_time );    
					  						// $mc->message(" posting to feed ", $b , "" );

									} 
									else { 
										// else already favorited 
										$headermssg = "FAILLED TO ADD FAVORITE";
										$contentmssg = "You already added this  $modal_type to your list.</span>";

									}    

	 							//  get total modals favorite    

			  				 		$pltfavorite = $mc->fs_favorite_modals_Query( array( 'table_name'=>$table_name , 'table_id'=>$table_id , 'query_favorite'=>'get-modal-total-favorite' ) ); 
			  				 		// echo " total favorite $pltfavorite <br> "; 

			  					// update table total favorite  

			  						$mc->update_fs_table_auto( $table_id , array('tfavorite'=>$pltfavorite , 'idname'=>'fmno' , 'idval'=>$table_id )  , str_replace(' ','', $table_name) );  

			  					// print the thank you message favorite status  

			  						$mc->dialog( array('type'=> 'alert' , 'headermssg'=> $headermssg , 'contentmssg'=> $contentmssg ) );     

			  					// echo " about to have a favorite <br>"; 


	 						break; 
	 					default: 
	 						break;
	 				}  
	 			break;  
	 		case 'rate-posted-modals':
	 
	 				# initialized 

						$rmno     = ( !empty($_GET['rmno']) )       ? $_GET['rmno'] : 0 ; 
						// $tn       = ( !empty($_GET['table_name']) ) ? $_GET['table_name'] : 0 ;  
						$rt       = ( !empty($_GET['rate_type']) )  ? $_GET['rate_type'] : 0 ;  
						$tid      = ( !empty($_GET['table_id']) )   ? $_GET['table_id'] : 0 ;  
						$rq       = ( !empty($_GET['rate_query']) ) ? $_GET['rate_query'] : 0 ;    
						
					# check if already rated or not 

						$response = $mc->posted_modals_rate_Query(  array(   'mno'=>$mno,   'table_name'=>$table_name,   'table_id'=>$tid ,   'rate_query'=>'get-user-rated-type'   )  );     

					if (  empty( $response ) ) {    

						# insert new rating to the specific table modal 

							$response = $mc->posted_modals_rate_Query(  array(  'mno'=>$mno,     'table_name'=>$table_name,   'rate_type'=>$rt,   'table_id'=>$tid,   'rate_query'=>'rate-insert'  )   );      
							// $response= true;

						if ( $response == true ):   

								# get owner of the table   

				  					$owner = $mc->get_modal_owner( $table_name , $tid );  

								# update activity wall

									$mc->update_or_add_my_activity_wall_post( $mno , $tid , 'Rated' , $table_name , $mc->date_time );     

								# calculate category percentage
 
									$mc->modal(  
										array(  
											'type'=>'add-or-update-user-category-percentage-and-rating',
											'table_name'=>$table_name,
											'table_id'=>$table_id,
											'category'=>$category  
										)
									);

								# user modals upload eg: look , article and media 

									// get total likes 

										$tlikes  = $mc-> posted_modals_rate_Query(  array( 'table_name'=>$table_name, 'table_id'=>$tid, 'rate_query'=>'get-rate-total-likes' ) );     
										echo " total likes $tlikes <br> ";

									// get total rating 

										$trating = $mc-> posted_modals_rate_Query(  array( 'table_name'=>$table_name, 'table_id'=>$tid, 'rate_query'=>'get-rate-overall'     ) );        
										echo " total ratings $trating <br> "; 
 
									// get table percentage 

										$percentage = $mc->RATING(  array( 'type' => 'calculate-percentage-look',  'like' => $tlikes,   'trating' => $trating )  ); 
									  	echo " total percentage =  $percentage trating =  $trating  ";   

									// update  table rows  

				  						 $mc->update_fs_table_auto(  $tid ,  array(  'tpercentage' => intval($percentage),  'trating' =>  intval($trating ),   )  , $table_name );    

								# update user percentage , trating and so on. . 
	  										 
				  					$mc->fs_members_Query(    
				  						array( 
				  							'mno'=> $owner, 
				  							'table_name'=>$table_name,
				  							'type'=>'update-user-percentage-and-ratings'
				  						) 
				  					);
 			
				  				# set notification for participants or followers 

				  					// send notification  to owner. . .  

										$mc->set_session_notification( $mno , $table_name , $tid , 'rated' );    

				  						// $mc->set_notification_info( $table_name , $tid , "<span class='rated'>rated</span>" , $mno2 , 0 , 'rate-modal'  ); 
			 	  						// echo " this is the rating modals!"; 
				  						#only show for followers 
				  						#jesus rate a look by [image]  

									// $mc->message( 'Congrats ', true  , "to $rt" );

								echo "<h2> NOTIFICATION  </h2>";
						endif;  
					} 
					else {   
						// $mc->message( 'Something wrong' , false , "to $rt" );
					} 
	 			break;
	 		case 'rate-posted-modals-view':   

	 				// this case is not in used because its being replaced with the new one case: fs-modal-popup

					$limit_start = 0;
					$limit_end  = 10;
		 		

					// print_r($response); 



					switch ( $process  ) {
						case 'view-more':	

							// retrieve rate information 

								$response = select_v3( 
						   	   		'fs_rate_modals' , 
						   	   		'*' , 
						   	   		" table_name = '$table_name' and table_id = $table_id order by rmno desc limit $limit_start , $limit_end " 
						   	   	);    

							// print rate info 

								$mc->notification_design_rating( $response , '../../../' , $mno ); 
							 	
							break; 
						default:

							// retrieve rate information 

								$response = select_v3( 
						   	   		'fs_rate_modals' , 
						   	   		'*' , 
						   	   		" table_name = '$table_name' and table_id = $table_id order by rmno desc limit $limit_start , $limit_end " 
						   	   	);     

						   	   	?> 

					   	   	<!-- main design  -->

								<center>
				 					<div id="notification-container" class="notification-activity" style="display:block !important; margin-left:200px;" >  
								 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:344px;"  >
								 				<tr> 
								 					<td id="notification-header"  style="padding-left:10px;" > 
								 						<div> <b>Ratings<b> </div>
								 					</td>  
								 					<td>
								 						<a  onclick=" fs_popup( 'close' ) " > ( x ) </a>
								 					</td>
								 			</table>

								 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
								 				<tr>  
								 					<td>	 
								 						<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
								 					</td> 
								 				<tr>  
								 					<td>  
								 						<div id="rating-container-td" style="height:340px; overflow-y:scroll;  overflow-x:hidden; "  > 
								 						 	<?php  $mc->notification_design_rating( $response , '../../../' , $mno ); ?>    
								 						</div>
								 					</td>
								 			</table> 	
								 		 
								 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
								 				<tr> 
								 					<td id="notification-footer" > 
								 						<div>
								 							<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"rating-view-more-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
								 						</div>
								 						<div > <b onclick="popup_rating ( 'rate-posted-modals-view' , 'view-more' , '<?php echo $table_id; ?>' , '<?php echo $table_name; ?>' )" style='cursor:pointer' > View All <b> </div>
								 					</td>  
								 			</table> 
							 		</div> 
							 	</center>   
							 	<?php 
							break;
					}

			   	   	?>
				
 					<?php 
	 			break;
	 		case 'delete-comment-modals':
	 
		 			$table_name    = $_GET['table_name']; // table id 
				 	$table_id  = $_GET['table_id']; // table name
				 	$mcid      = $_GET['mcid'];  //modal comment id  

				 	echo " table_name = $table_name , table_id = $table_id , mcid = $mcid <br> ";

				 	# delete comment and update feed
	 					$mc->delete_modals_comment( $mno , $mcid , $table_id , $table_name );   


	 				# get total comment of the modal and update  

						$tcomment =  $mc->posted_modals_comment_Query ( array(  
							    'table_name'=>$table_name,
							    'table_id'=>$table_id , 
							    'orderby'=>'cno asc',
							    'limit_start'=>0,
							    'limit_end'=> 10000, 
							    'comment_query'=>'get-comment-modal-total'   
						  	) 
						); 
		 				$mc->update_fs_table_auto( $table_id , array('tcomment'=> $tcomment ) ,  $table_name );   





	 				// echo " delete_modals_comment( $mno , $mcid , $table_id , $_table , $action); "; 
	 			break;
	 		case 'delete-look-modals':
	 				// $table_id = $_GET['table_id'];
	 				// echo " delete modals $plno <br> ";    
	 			break; 
	 		case 'delete-modal':  

	 			 	switch ( $table_name ) {  
	 			 		case 'postedlooks': 
	 			 				$mc->fs_delete_data( intval($table_id) , "fs_look" , 'lookdetails' );
	 			 			break;    
	 			 		default: 

	 			 			# delete notification 

		 			 			$response =  $mc->posted_modals_notification_Query ( 
								    array(      
								      'table_name'=>$table_name,
								      'table_id'=>$table_id, 
								      'notification_query'=>'delete'  
								    ) 
								);  
								$mc->message(" table_name = $table_name and table_id = $table_id delete notification " , $response , "" ); 

								
				 			# activity delete  

				 				$response = $mc->fs_activity( 
				 					array(
				 						'type'=>'delete',
				 						'table_name'=>$table_name,
				 						'table_id'=>$table_id
				 					) 
				 				);     
				 				$mc->message( 'activity delete ' , $response , '' );

					 	 	# delete comment rates  
				 				$response = $mc->fs_comment(   
				 					array(   
										'where'       =>"table_name = '$table_name' and table_id = $table_id",
										'orderby'     => "cno desc",
										'limit_start' =>0,
				 						'limit_end'   =>1000,
				 						'type'        =>'select' 
				 					)  
				 				);    
			 					for ($i=0; $i < count($response) ; $i++) {   
			 					    $cno = $response[$i]['cno'];  
			 					    $response1 = $mc->posted_modals_rate_Query(  
			 					    	array( 
			 					    		'rate_query'=>'rate-delete', 
			 					    		'table_name'=>'fs_comment',
			 					    		'table_id'=>$cno
			 					    	)
			 					    );  
			 						$mc->message( " comments rate delete " , $response1 , " cno = $cno " );  
			 					}  

				 			# fs comment delete 

				 				$response = $mc->fs_comment(   
				 					array(  
				 						'type'=>'delete', 
				 						'table_name'=> $table_name, 
				 						'table_id'=> $table_id
				 					) 
				 				); 
				 				$mc->message( 'comment  delete ' , $response , '' ); 

				 			# fs drip 

				 				$response = $mc->fs_drip_modals_Query( 
				 					array( 
				 						'table_name'=>$table_name, 
				 						'table_id'=>$table_id, 
				 						'query_drip'=>'delete' 
			 						) 
			 					); 

			 					$mc->message( 'drip delete ' , $response , '' );

			 				# fs favorite 

			 					$response =  $mc->fs_favorite_modals_Query( 
			 						array( 
			 							'table_name'=>$table_name, 
			 							'table_id'=>$table_id , 
			 							'query_favorite'=>'delete' 
			 						) 
			 					);  
			 					$mc->message( 'favorite delete ' , $response , '' );

			 				# fs rate 

			 					$response = $mc->posted_modals_rate_Query(  
								 	array( 
								 		'table_id'=>$table_id,  
								 		'table_name'=> $table_name,  
								 		'rate_query'=>'rate-delete' 
								 	) 
								); 	 

			 					$mc->message( 'rate delete ' , $response , '' );

							# fs view 

				 					$response = $mc->fs_view(
				 					 	array(   
				 					 		'table_name'=>$table_name,
				 					 		'table_id'=>$table_id, 
				 					 		'type'=> 'delete'  
				 					 	)  
				 					);  

				 					$mc->message( 'view delete ' , $response , '' );

							# fs flag 

				 					$response = $mc->fs_flag(
				 					 	array(   
				 					 		'table_name'=>$table_name,
				 					 		'table_id'=>$table_id, 
				 					 		'type'=> 'delete'  
				 					 	)  
				 					);   
				 					$mc->message( 'flag delete ' , $response , '' );
		 					
		 					# fs keyword 

			 					$response = $mc->fs_keyword(   
			 						array( 
			 							'table_name'=>$table_name , 
			 							'table_id'=>$table_id,
			 							'type'=>'delete'
			 						)
			 					); 
			 					$mc->message( 'keyword delete ' , $response , '' ); 

				 			# fs search 
				 					
			 					$response = $mc->fs_search(  
			 						array( 
			 							'table_name' => $table_name, 
			 							'table_id'   => $table_id,
			 							'type'		 =>'delete'
			 						)
			 					);
			 					$mc->message( 'fs search delete ' , $response , '' );  

			 				# update table total modals uploaded update percentage not yet added

				 				// 	$mc->fs_members_Query( 
				 				// 		array( 
				 				// 			'type'=>'update-tmodals',
				 				// 			'mno'=>$mno 
				 				// 		) 
				 				// 	);

			 				# remove the images 

			 					$mc->image( 
			 						array( 
			 							'type'=>'unlink',
			 							'imagepath'=>array(
			 								"../../../$mc->article_home/$table_id.jpg",
											"../../../$mc->article_thumbnail/$table_id.jpg",
											"../../../$mc->article_detail/$table_id.jpg"
			 							) 
			 						) 
			 					);
			 					 
			 		 		# delete from modal table 
		 
				 				$response = $mc->modal(  
				 					array( 
				 						'type'=> 'delete-modal' ,  
				 						'table_name'=>$table_name,
				 						'table_id'=>$table_id
				 					)
				 				);

				 				$mc->message(" table_name = $table_name and table_id = $table_id delete " , $response , "" );
				 				



		 			 			break; 
 
		 			} 
	 			break; 
	 		case 'admin-modal':
	 			# this is just a temporary  
	 			# not in used it can be deleted or not its just connected to admin php file modal_1.php
				 	echo " this is the moeah <br> dal result here <br> thes is it <br> y";
			 		$modal_total_show     = ( !empty($_GET['modal_total_show']) ) ? $_GET['modal_total_show']     : 24;     //  total modals will show per pagenum
					$pagenum              = ( !empty($_GET['pagenum']) ) ? $_GET['pagenum']                       : 1;     // page number default by 1 if not supplied  
					$limit_start          = $mc->get_loop_start( $pagenum , $modal_total_show );  
					$limit_end            = $mc->get_loop_end( $pagenum , $modal_total_show ); 


				  	$response = $mc->fs_postedarticles( array( 
					      'aticle_type'=> 'select',
					      'limit_start'=>$limit_start ,
					      'limit_end'=> $limit_end, 
					      'orderby'=>'artno desc',
					      'where'=>"mno = 133"
					    ) 
					);    
					$response_len = count( $response ); 
				  
				  	for ($i=0; $i < $response_len ; $i++):     
			 			$artno = $response[$i]['artno'];  
						$mc->modal_version1_article ( $artno  , null , '../../../'  ,  'display:none' , null  , 'admin' );
					endfor;   
	 			break;
	 		default: 
	 			break; 
	 	}    
 	echo "</div>";
?>

