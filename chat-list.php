<?php   
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
 	$mc = new myclass();  
 	$mc->auto_detect_path();    
 	$mc->save_current_page_visited( );   
 
 	// $is_cookie_set   =  $mc->set_cookie( 'mno' , 130 , time()+3600*24 ); 
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  

    $variables = array();

    // $mno = 133;
    $limit_start = 0; 
    $limit_end   = 10;


    // response from table fs_message and lits of your all messages
	    $variables['response'] = $mc->fs_message(    
	    	array( 
	    		'type'       => 'get-all-message-id',     
	    		'mno'    	 => $mno , 
	    		'orderby'    => 'order by date asc' ,   
	    		'limit_start'=> $limit_start,   
	    		'limit_end'  => $limit_end  
	    	)  
	    );     
    // $mc->print_r1( $variables['response'] );  
    //  your all messages len 
	    $variables['len']      =  count($variables['response']);  
?>

<table border="1" cellpadding="0" cellspacing="0" >
	<?php  

    $limit_start = 0; 
	$limit_end   = 1; 

	for ($i=0; $i < $variables['len'] ; $i++):  

 	  //  each msgno  

			$variables['msgno']      =  intval($variables['response'][$i]['msgno']);    

			$variables['mno']        =  intval($variables['response'][$i]['mno']);    
			$variables['mno1']       =  intval($variables['response'][$i]['mno1']);    

		// get chat mate

 			$variables['mno1'] = ( $variables['mno'] == $mno ) ? $variables['mno1'] : $variables['mno'];

 		// get username chat mate

 			$username 				 = $mc->get_username_by_mno( $variables['mno1'] );



		// get from fs_comment table via table id and table name from fs_message

	 	 	$variables['comment_r']  =  $mc->posted_modals_comment_Query (   array( 'comment_query'=>'get-all-comment-by-tbn_and_tbid' , 'table_name'=>'fs_message',   'table_id'=>intval($variables['msgno']),    'orderby' => 'order by date desc',  'limit_start'=>$limit_start, 'limit_end'=>$limit_end  )  );  
	 	 	$variables['comment']    =  $variables['comment_r'][0]['comment']; 
	 	 	$variables['mno']        =  intval( $variables['comment_r'][0]['mno']);  
	 	 	 
	 	 	$variables['date']       =  $variables['comment_r'][0]['date'];  
	 	 	$fullname                =  $mc->get_full_name_by_id( $variables['mno1'] );

	 	 	


	 	// header title desc 
	 	 	$mc->header_attribute( 
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , 
 				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 			);    
	?>
		<tr> 
			<td>  
				<?php  $mc->member_thumbnail_display( $mc->ppic_thumbnail , $variables['mno1'] , "$mc->ppic_thumbnail" , null , '35px;'  );    ?> 
			</td> 
			<td onclick="chat( 'chat?u=<?php  echo "$username"; ?>' , 'open-new-chat' ) " style="cursor:pointer;" > 
				<!-- <a href="chat?u=<?php  echo "$username"; ?>" target="_blank">   -->
					<?php  echo "<b> $fullname :</b>  <br>  $variables[comment] <br> <b>  $variables[date] </b> "; ?>
				<!-- </a> -->
			</td> 
	<?php endfor; ?>
</table>













