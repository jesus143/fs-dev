<?php   
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");   
	require ('../../../fs_folders/php_functions/Database/post.php'); 

	$mc = new myclass();   
   	$mc->post = new Post();     

    $counter_tres=intval($_GET['tres']);//this is next value passed from javascript counter 

    /**
    * Receiving the data
    */


    echo $_GET['category'];

    $page        = (!empty($_GET['page']))         ? $_GET['page'] : 'profile-tabs';  
 	$tab         =  (!empty($_GET['tab']))         ? $_GET['tab'] : 'looks';  
 	$category    = (!empty($_GET['category']))     ? $_GET['category'] : 'all looks';   
 	$limit_start = (!empty($_GET['limit_start']))  ? $_GET['limit_start'] : 0;   
 	$limit_end   = (!empty($_GET['limit_end']))    ? $_GET['limit_end'] : 20;  
 	$mno1 		 = (!empty($_GET['mno1'])) 		   ? $_GET['mno1'] : 137;   
 	$orderby     = (!empty($_GET['orderby']))      ? $_GET['orderby'] : '';   
 	$like  		 = (!empty($_GET['like'])) 		   ? $_GET['like'] : '';   
 	$sub 		 = (!empty($_GET['sub']))          ? $_GET['sub'] : '';  
 	



 	echo "category $category <br> "; 
 	/**
 	* retrieveing the data
 	*/ 
	$response = $mc->profile_tab_query( 
		array( 
			'type'=>'details-feed',
			'page'=>$page,
			'tab'=>$tab, 
			'mno'=> $mno1,   
			'limit_start'=>$limit_start,
			'limit_end'=>$limit_end,
			'orderby'=>$orderby,
			'like'=>$like,
			'sub'=>$sub,
			'category'=>$category,
			'whereCompose'=>" mno <> $mno1"
		)
	);   
	$response_len = count( $response );   


	echo "<pre>";
	print_r($response); 

	/**
	* printing the data
	*/

	for ($i=0; $i < $response_len ; $i++) {   
		if($tab == 'blogs') {  
			$artno = $response[$i]['artno']; 
		    $mc->modal_version1_article ( $artno  , '../../../' , '../../../' , 'display:none' , 'display:block;' , 'rate-page' );  
		} else {  
			$plno = $response[$i]['plno'];   
			// $mc->modal_version1_look ( $plno , '../../../'  , '../../../' , 'display:none;' , null , 'profile-tab-look' );		
			$mc->modal_version1_look (  $plno  , '../../../' , '../../../' , 'display:none' , 'display:block;' , 'rate-look' );    
		}	

	}	
	
  
	/**
	* View more button print
	*/
	?> 
<div style="display:none" >
	<showmore> 
		<center><div id='more_loading' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  >  </div> </center>  
        <img
            id="more"
            style="margin-left:3px;"
            src="fs_folders/images/genImg/home-more-button.png"
            onclick="more_click ( '<?php echo $counter_tres; ?>' )"
            onmousemove=" mousein_change_button ( '#more' , 'fs_folders/images/genImg/home-red-mouse-over.png' )"
            onmouseout="mouseout_change_button (  '#more'  , 'fs_folders/images/genImg/home-more-button.png' ) "
        /> 
	<showmore> 
</div>