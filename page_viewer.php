<?php 
	require ("fs_folders/php_functions/connect.php");
	require ("fs_folders/php_functions/function.php");
	require ("fs_folders/php_functions/library.php");
	require ("fs_folders/php_functions/source.php");
	require ("fs_folders/php_functions/myclass.php");   
	$mc = new myclass();  
    $ri = new resizeImage ();
// $_GET['id']=1; 
  echo "<div style='display:none' >";   
  	$page_viewer=true;
		$user_namel = explode('-',$_GET['user_name']); 
		$_SESSION['url'] = $user_namel;
		print_r($user_namel );
		// print_r($url); 
		// set up this part if the algorithm of the url changes
		//$_SESSION['table_id']=$url[0];//the first value in the url
		$data['type']=$url[1]; // type=article,look in the second link in the sub url 
		// helper::load_page_profile_detail_lookdetails($url); 
		// $_SESSION['url']=$url;  
	echo "</div>";

	if ($data['type']=='article'){  
		// require('detail.php');
	}
	elseif($data['type']=='look'){ 
		// require('lookdetails.php');
	}else{ 
		require('profile.php');
	} 

?>


