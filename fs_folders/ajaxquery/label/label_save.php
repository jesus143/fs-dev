<?php 
	session_start();
	require("../../php_functions/connect.php");
	require("../../php_functions/function.php");
	require("../../php_functions/myclass.php");
	require("../../php_functions/library.php");
	require("../../php_functions/source.php");

	// require('../../connect.php');
	// require('../../function.php'); 

	$mc = new myclass(); 
 
	# $_SESSION['look_keyword']  , $_SESSION['look_style'] => this are generated from post-look-read and selected through the popup posting.






 

 



 
 









	echo " last look uploaded ".$_SESSION['last_look_uploaded'].'<br>';

	$plno=$_SESSION['last_look_uploaded'];

	if ($_SESSION['look_edit']) { 

			// delete previous
		delete('fs_pltag',array('plno',$plno)); 

	}
	else {

		$plno = $mc->insert_activity_wall_posted( 
	 		"postedlooks" ,  #tablename
	 		"Posted" ,  #action 
	 		$_SESSION['mno'] ,  #mno 
	 		1 ,  #actove
	 		"postedlooks" ,  #from table
	 		"plno"  # from table id 
	 	); 
 		// new save no deletes happens
 		$mc->update_table_to_active( 
	        "postedlooks" ,  #table name 
	        "active"  ,  #active 
	        1 ,  #active val
	        "plno"  ,  #rowname id 
	        $plno  #row name val
	    );  
 		update1('postedlooks','plkeyword',$_SESSION['look_keyword'] ,array('plno',$_SESSION['last_look_uploaded'])); 
	} 
	// echo "save all labels HERE ";

	// echo "not converte = ".$_GET['data'].'<br>';



	// $data=str_replace("'", '',$_GET['data']);
	// echo " data ".$_GET['data'];
	$ar_data = explode('-next-',$_GET['data']);
	// print_r($ar_data);
	$Ttagged=get_total_tagged($ar_data);
	echo "Total tagged = ".get_total_tagged($ar_data);

	// echo "total array = "+count($ar_data).'<br>'; 

	$c=0;
	$cTtag=0;
	$new=0;
	for ($i=0; $i < count($ar_data) ; $i++) { 
		$c++;
		$j++;
		
		if ( $Ttagged > $cTtag ) {
			 if ($c%8==0){  
			 	echo '['.$ar_data[$i].']'; 
			 	echo "----------------------<br>";
			    $cTtag++; 	
			    $Tlist[$new][$j]=$ar_data[$i];
			    $new++;
			    $j=0;

			}
			else{  
			   echo '['.$ar_data[$i].']'; 
			   $Tlist[$new][$j]=$ar_data[$i];
			}
			 
		}else { 
			echo " additional <br>"; 

			 $c1++;
			 echo "$c1";
			 if ($c1 == 1) {
			 	#look name
			 	// update
			 	 echo '['.$ar_data[$i].']';
			 	 update1('postedlooks','lookName', $mc->clean_text_before_save_to_db( $ar_data[$i] ) ,array('plno',$_SESSION['last_look_uploaded']));  
				$lookName = $ar_data[$i]; 
			 }
			 else if($c1==2){ 
				 #look desc
			 	 echo '['.$ar_data[$i].']';
			 	 update1('postedlooks','lookAbout', $mc->clean_text_before_save_to_db( $ar_data[$i] ) ,array('plno',$_SESSION['last_look_uploaded']));
			 	
			 }
			 else if($c1==3){ 
				#look occasion
			 	echo '['.$ar_data[$i].']'; 
			 	$link = $ar_data[$i];   
			 	update1('postedlooks','article_link',"$link",array('plno',$_SESSION['last_look_uploaded']));
			 }
			 else if($c1==4){ 
				#look occasion
			 	 echo '['.$ar_data[$i].']';
			 	 update1('postedlooks','occasion',$ar_data[$i],array('plno',$_SESSION['last_look_uploaded']));
			 }
			 else if($c1==5){ 
				 #look season
			 	 echo '['.$ar_data[$i].']';
			 	 update1('postedlooks','season',$ar_data[$i],array('plno',$_SESSION['last_look_uploaded']));
			 }
			 else if($c1==6){ 
			 	#look style 

			 		# this is the update for the style row from the label field.
				 		/*
					 	 echo '['.$ar_data[$i].']';
					 	 update1('postedlooks','style',$ar_data[$i],array('plno',$_SESSION['last_look_uploaded']));
	 			 	 	*/ 
			 		update1('postedlooks','style',$_SESSION['look_style'],array('plno',$_SESSION['last_look_uploaded']));
			}
		}
	}
 
 	  
 	  // print_r($Tlist);
 	 // pltg	plno	plt_color	plt_brand	plt_garment	plt_material	plt_pattern	plt_price	plt_purchased_at	plt_x	plt_y	plt_date

  	for ($i=0; $i < count($Tlist) ; $i++) { 
	  	$Tpos=location($Tlist[$i][8]);
	  	// print_r($Tpos); 
	  	echo "x ".$Tpos[1].' y = '.$Tpos[3].'<br>';
	  	insert(
	  		'fs_pltag',
	  		array('plno','plt_color','plt_brand','plt_garment','plt_material','plt_pattern','plt_price','plt_purchased_at','plt_x','plt_y','plt_date'),
	  		array($plno,$Tlist[$i][1],$Tlist[$i][2],$Tlist[$i][3],$Tlist[$i][4],$Tlist[$i][5],$Tlist[$i][6],$Tlist[$i][7],$Tpos[1],$Tpos[3],date("Y-m-d")),'pltgno'
  		); 

	    $keyword  .= $lookName.' , ';
	  	$keyword  .= $Tlist[$i][1].' , '.$Tlist[$i][2].' , '.$Tlist[$i][3].' , '.$Tlist[$i][4].' , '.$Tlist[$i][5].' , '.$Tlist[$i][6] ;


	  	// insert keyword for search 
			$response = $mc->fs_search(   array(  'type'=> 'add-or-updated-keyword' ,  'table_name'=>'postedlooks'       ,  'table_id'=>$plno , 'keyword'=>	$keyword )   );  
 

	  	$newbrandname = $Tlist[$i][2];  
	  	// check if this brand is exist or not   
	  		if ( !selectV1( '*','fs_brands',array('bname'=>$newbrandname) ) ) { 
	  		// if ( !select_v3( "fs_brands" , "*"  , "bname <=> $newbrandname"  ) ) {  
	  			// if not exist insert to new brands 
	  			insert(
			  		'fs_brands',
			  		array('bname'),
			  		array($newbrandname),'pltgno'
		  		);  
		  	}
		  	else{
		  		// nothing happends
		  	}
















  	}
 	function location($Tpos){ 

	 	 return explode(',',$Tpos);
	}
	// update1('postedlooks','date_','2013-04-26',array('plno',$_SESSION['last_look_uploaded']));
	// echo " total tagged = ".$Ttag;
	function get_total_tagged($ar_data) { 

		$c=0;
		for ($i=0; $i < count($ar_data) ; $i++) { 
			 $c++;
			
			 if ($c%8==0){  
			 	
			 	// echo '['.$ar_data[$i].']'; 
			 	// echo "----------------------<br>";
				$Ttag++; 	
			 }
			 else{  
			  // echo '['.$ar_data[$i].']'; 
			 }
		}
		return $Ttag;
	}	 
?>
 