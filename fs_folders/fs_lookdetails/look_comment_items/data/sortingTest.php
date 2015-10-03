<?php 
	function comments_sorted( $st , $sort_as ) {  
  
		if ($sort_as == 'newest') { 
			echo " 
	 		<li style='list-style:none'> " ;
	 		
	 			       $st->set_newest( );
	 			$res = $st->get_result( );
	 				   $st->unset_result( );
				// echo "<br>";
	 		// 	for ($i=0; $i < count($res) ; $i++) { 
	 		// 	 	echo "$i) ".$res[$i]['plcno'].'<br>';
	 		// 	}

	 		echo "   
	 		</li> ";
	 		return $res;
		}
		else if ($sort_as == 'oldest') { 
			echo " 
	 		<li style='list-style:none'> " ;
	 			 
	 				   $st->set_oldest( );
		 		$res = $st->get_result( );
		 			   $st->unset_result( );
				// echo "<br>";
	 		// 	for ($i=0; $i < count($res) ; $i++) { 
	 		// 	 	echo "$i) ".$res[$i]['plcno'].'<br>';
	 		// 	}
	 
	 		echo "  
	 			 
	 		</li> ";
	 		return $res;
		}
	 	else if ($sort_as == 'most helpful') { 
	 		echo " 
	 		<li style='list-style:none'> " ;
	 			 
	 			       $st->set_most_helpful( );
	 			$res = $st->get_result( );
	 			       $st->unset_result( );
	 			// echo "<br>";
	 			// for ($i=0; $i < count($res) ; $i++) { 
	 			//  	echo "$i) plcno = ".$res[$i]['plcno'].' tlike = '.$res[$i]['Tlike'].' TCreply = '.$res[$i]['TCreply'].'<br>';
	 			// }


	 		echo "  
	 			 
	 		</li> ";
	 		return $res;
	 	}
	 	else if ($sort_as == 'most discussed'){ 
	 		echo " 
	 		<li  style='list-style:none'> " ;
	 					$st->set_discussed( );
	 			$res =  $st->get_result( );
	 					$st->unset_result( );
				 // echo "<br>";
	 			// for ($i=0; $i < count($res) ; $i++) { 
	 			//  	echo "$i) plcno = ".$res[$i]['plcno'].' tlike = '.$res[$i]['Tlike'].' TCreply = '.$res[$i]['TCreply'].'<br>';
	 			// }

	 		echo "  
	 		 
	 		</li> ";
	 		return $res;
	 	} 
    
	 	echo " <li style='list-style:none'> 
		";


			// print_r($res);



	 	echo "
	 	</li>";
	}



	function comments_reply_sorted( $st , $sort ,  $plcno )  { 

		if ( $sort == 'newest' ||  $sort == 'most discussed' ) {
			$st->set_reply_newest( $plcno );
			$res = $st->get_result( ); 
			$st->unset_result( );
			// $res = $sort;
		}
		else if ( $sort == 'oldest'  ) { 
			$st->set_reply_oldest( $plcno  );
			$res = $st->get_result( );
			$st->unset_result( );
			// $res = $sort;
		}
		else if ( $sort == 'most helpful'   ) { 
			$st->set_reply_most_helpful( $plcno );
			$res = $st->get_result( );
			$st->unset_result( );
			// $res = $sort;

			// print_r($res);
			$rlen = count($res);

		 	// echo "  rlen = $rlen <br>";

			for ($i=0; $i < $rlen  ; $i++) { 
				$res[$i] = select_one_result( 
			 	  	"*", 
			 	  	"fs_plcm_reply",
			 	  	array("plcr_no"=>$res[$i]["plcr_no"]) 
			 	);
			}
	 
		} 
		// echo "<br> after individual <hr>";
		// print_r($res);
		return $res;
	}
?>
   