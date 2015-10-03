<?php 
  	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");  
	$mc = new myclass( );   
	$mc-> auto_detect_path( );

	$categoryid    = $_GET['categoryid'];
	$brandname     = $_GET['brandname'];
	$brand_id      = intval($_GET['brand_id']); 
	$bcsno         = $_GET['brand_id']; 
	$gender        = $_GET['gender'];
	$genderName    = $retVal = ( $_GET['gender'] != 0 )  ? 'Male' : 'Female' ;  
	$catSelected   = $_GET['catSelected'];  
	$action        = $_GET['action'];  
	$bcname = ''; 

	echo " 
		<br>
		brand category Selected: $catSelected <br>
		action: $action  <br> 
		brand number ( bno ): $brand_id  <br>
		gender: $genderName <br>
	";  
	$catSelected  = explode(',', $catSelected);   
	// print_r($catSelected);  
	if( $action == 'save' ) {   
		if ( update1('fs_brands','bname', $brandname , array('bno',$brand_id) )  ) 
			echo " and brand name  $brandname <br> <span class='green' > successfully updated </span> <br>"; 
		else 
			echo " brand name  $brandname <span class='red' > failled to update </span> <br>";  

		if ( delete('fs_brand_category_selected',array('bno',$brand_id) ) ) 
			echo "<br> previous brand assign to brand category <span class='green' > successfully deleted </span> <br>"; 
		else 
			echo "<br> previous brand assign to brand category <span class='red' > failled to delete </span> <br>"; 
			
	

		for ($i=0; $i < count($catSelected) ; $i+=2) {    
			  $bcnoSelcted = ( !empty($catSelected[$i+1]) ) ? $catSelected[$i+1]  : 0 ;   
			if ($bcnoSelcted != 0) {   
				$bcno = ( !empty($catSelected[$i]) ) ? $catSelected[$i] : "" ; 
				$exist   = selectV1('*', 'fs_brand_category_selected', array('bno'=> $brand_id, 'operand1'=>'and' , 'bcno'=> $bcno, 'operand2'=>'and' , 'bcs_gender'=>$gender ) );
				// print_r($exist); 
				// $exist = mysql_query(" SELECT * FROM fs_brand_category_selected WHERE bno = $brand_id and  bcno = $bcno and bcs_gender = $gender  ") 
				// print_r($exist);  
				if ( !$exist ) { 
					$bcname.=$mc->get_brand_category_name( $bcno )." , ";
					$b = insert(
						'fs_brand_category_selected',
						array('bno','bcno','bcs_gender','bcsdate'),
						array($brand_id,$bcno,$gender,date("Y-m-d")), 
						'bcsno'
					);
				} 
			}
			else{ 
				$b=false;
			}  
		}  
	} 
	else if( $action == 'delete-brand-categories'  ) { 
		echo " delete bcsno";

		$b = delete('fs_brand_category_selected',array('bcsno',$bcsno) ); 

		if ( $b ) {
			echo "<span style='color:green'> brand successfully deleted </span>"; 
		}else{
			echo "<span style='color:red'> brand failled to deleted</span>";
		} 
	}else if( $action == 'delete-brand' ) { 

		if ( delete('fs_brands',array('bno',$brand_id) ) )	
			echo "<br> table fs_brands <span class='green' > successfully deleted </span> <br>"; 
		else 
			echo "<br> table fs_brands <span class='red' > failled to delete </span> <br>";   

		if ( delete('fs_brand_category_selected',array('bno',$brand_id) ) ) 
			echo " table fs_brand_category_selected <span class='green' > successfully deleted </span> <br>"; 
		else 
			echo " table fs_brand_category_selected  <span class='red' > failled to delete </span> <br>";    

		if ( delete('fs_brand_member_selected',array('bno',$brand_id) ) ) 
			echo " table fs_brand_member_selected <span class='green' > successfully deleted </span> <br>"; 
		else 
			echo " table fs_brand_member_selected <span class='red' > failled to delete </span> <br>";   

		if ( @unlink("../../../$mc->brands/$brand_id.png") ) 
			echo " brand image <span class='green' >   successfully removed where path: ../../../$mc->brands/$brand_id.png </span>";
		else 
			echo " brand image  <span class='red' >  failled to removed where  path: ../../../$mc->brands/$brand_id.png </span>"; 
	}

?> 