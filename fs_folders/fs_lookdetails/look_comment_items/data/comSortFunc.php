<?php  

 

	class Sorting extends func
	{
		// new main comment
		 	public function set_newest( ) { 
		 		
		 	  	$res = $this->get_all_comments('order by plcno DESC' , 'posted_looks_comments' );
		 	  	$this->result_array = $res;
		 	}
		 	public function set_oldest( ) { 
		 		$res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
		 	  	$this->result_array = $res;
		 	}
		 	public function set_most_helpful( ) { 
				// new algorithm for the loading fast
			 		if ( $_SESSION['plno'] != $_SESSION['old_plno']) {
			 			$_SESSION['old_plno'] = $_SESSION['plno'];
			 			unset($_SESSION['topReply']);
			 			unset($_SESSION['topLiked']);
			 			#new look looaded.
			 			#reload all the comment and fetch the new top liked.
			 			#return newcomments.
			 			// echo "return newcomments. new look looaded ";
			 			$calculte_top_like = true;
			 			$res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 		}
			 		else {  
			 			#remain in current look.
			 			#check total comments.
			 			// echo "check total comments";
			 			$new_tcomment = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' ) ;
			 			// print_r($new_tcomment);
			 			$Tcomment = count($new_tcomment);

			 			// echo " new tComments [$Tcomment] == Old tComments [$_SESSION[old_tcomment_like]] ";

			 			if (empty($_SESSION['topLiked']) ) {
			 				#reload all the comment and fetch the new top liked.
			 				#return newcomments.
			 				// echo "return newcomments.  ti";
			 				$res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 				$calculte_top_like = true;
			 			}else { 
			 				# $new_tcomment = check and check and len sa comment in side the database.
			 				
			 				if ($Tcomment != $_SESSION['old_tcomment_like']) {
			 					 $_SESSION['old_tcomment_like'] = $Tcomment ;
			 					 #reload all the comment and fetch the new top liked.
			 					 #return newcomments.
			 					 // echo "return newcomments.";
			 					 $res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 					 $calculte_top_like = true;
			 				}else { 
			 					#walay na add nga new comment. return 0
			 					// echo "walay na add nga new comment. return 0";
			 					$calculte_top_like  = false;
			 				}
			 			}
		 			}
		 		// new algorithm for the loading fast

		 		if ( $calculte_top_like ) {
		 	  		for ($i=0; $i < count($res) ; $i++) { 
	  			 		$like=selectV1( 
		 	  				'plcldno' , 
		 	  				'posted_looks_comments_like_dislike',
		 	  				array('plcno'=>$res[$i]['plcno'])
		 	  			);
	 					$reply=selectV1( 
		 	  				'plcr_no' , 
		 	  				'fs_plcm_reply',
		 	  				array('plcno'=>$res[$i]['plcno'])
		 	  			);
	 					$topLiked[$i] = array('plcno'=>$res[$i]['plcno'],'Tlike'=>count($like),'TCreply'=>count($reply)); 
	 				}	

					$topLiked=$this->sort( $topLiked , 'Tlike' );
	 				$topLiked=$this->sort_for_equal_sort($topLiked , 'Tlike');
	 				$topLiked=$this->if_thes_ame_tLike_treply( $topLiked , 'plcno');

	 				$_SESSION['topLiked'] = $topLiked;
	 			}else { 
	 				#first time to load.
	 				// echo " walay na add nga new comment.";
	 				// print_r($_SESSION['topLiked']);
	 			}
	 				
		 	  		$this->result_array = $_SESSION['topLiked'];
		 	}
		 	public function set_discussed( ) { 
				// new algorithm for the loading fast
			 		if ( $_SESSION['plno'] != $_SESSION['old_plno']) {
			 			 $_SESSION['old_plno'] = $_SESSION['plno'];
			 			 unset($_SESSION['topReply']);
			 			 unset($_SESSION['topLiked']);


			 			#new look looaded.
			 			#reload all the comment and fetch the new top liked.
			 			#return newcomments.
			 			// echo "return newcomments. new look looaded ";
			 			$calculte_top_comment = true;
			 			$res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 		}
			 		else {  
			 			#remain in current look.
			 			#check total comments.
			 			// echo "check total comments";
			 			$new_tcomment = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' ) ;
			 			// print_r($new_tcomment);
			 			$Tcomment = count($new_tcomment);

			 			// echo " new tComments [$Tcomment] == Old tComments [$_SESSION[old_tcomment_reply]] ";

			 			if (empty($_SESSION['topReply']) ) {
			 				#reload all the comment and fetch the new top liked.
			 				#return newcomments.
			 				// echo "return newcomments.  top reply empty";
			 				$res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 				$calculte_top_comment = true;
			 			}else { 
			 				# $new_tcomment = check and check and len sa comment in side the database.
			 				
			 				if ($Tcomment != $_SESSION['old_tcomment_reply']) {
			 					 $_SESSION['old_tcomment_reply'] = $Tcomment ;
			 					 #reload all the comment and fetch the new top liked.
			 					 #return newcomments.
			 					 // echo "return newcomments.";
			 					 $res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );
			 					 $calculte_top_comment = true;
			 				}else { 
			 					#walay na add nga new comment. return 0
			 					// echo "walay na add nga new comment. return 0";
			 					$calculte_top_comment  = false;
			 				}
			 			}
		 			}
		 		// new algorithm for the loading fast

		 		 $calculte_top_comment = true;
		 		 $res = $this->get_all_comments('order by plcno ASC' , 'posted_looks_comments' );

		 		if ( $calculte_top_comment ) {
		 	  		for ($i=0; $i < count($res) ; $i++) { 
	 					$reply=selectV1( 
		 	  				'plcr_no' , 
		 	  				'fs_plcm_reply',
		 	  				array('plcno'=>$res[$i]['plcno'])
		 	  			);
		 	  			$like=selectV1( 
		 	  				'plcldno' , 
		 	  				'posted_looks_comments_like_dislike', 
		 	  				array('plcno'=>$res[$i]['plcno'])
		 	  			);
	 					$topReply[$i] = array(
	 						'plcno'=>$res[$i]['plcno'],
	 						'Tlike'=>count($like),
	 						'TCreply'=>count($reply)
	 					); 
	 				}	

					$topReply=$this->sort( $topReply , 'TCreply' );
	 				$topReply=$this->sort_for_equal_sort($topReply , 'TCreply');
	 				$topReply=$this->if_thes_ame_tLike_treply( $topReply , 'plcno');

	 				$_SESSION['topReply'] = $topReply;
	 			}else { 
	 				#first time to load.
	 				// echo " walay na add nga new comment.";
	 				// print_r($_SESSION['topLiked']);
	 			}
	 				
		 	  		$this->result_array = $_SESSION['topReply'];
		 	}
		// end main comment 

		//  new reply  
 		
 		 	public function set_reply_newest( $plcno ) { 
		 		
		 		$res = $this->get_all_reply_comments('order by plcr_no DESC' , 'fs_plcm_reply' , $plcno );
		 	  	$this->result_array = $res;
		 	}
		 	public function set_reply_oldest( $plcno ) { 
		 		
		 		$res = $this->get_all_reply_comments('order by plcr_no ASC' , 'fs_plcm_reply' , $plcno );
		 	  	$this->result_array = $res;
		 	}
		 	public function set_reply_most_helpful ( $plcno ) { 

		 		$res = $this->get_all_reply_comments('order by plcr_no ASC' , 'fs_plcm_reply' , $plcno );
		 		$this->result_array = $res;
		 		$calculte_top_comment = true;

		 		if ( $calculte_top_comment ) {
		 	  		for ($i=0; $i < count($res) ; $i++) { 
	 					// $reply=selectV1( 
		 	  	// 			'plcr_no' , 
		 	  	// 			'fs_plcm_reply',
		 	  	// 			array('plcno'=>$res[$i]['plcno'])
		 	  	// 		); 
		 	  			$like=selectV1( 
		 	  				'rlno,plcrno' , 
		 	  				'fs_plcm_rlike', 
		 	  				array('plcrno'=>$res[$i]['plcr_no'])
		 	  			);

	 					$top_liked_reply[$i] = array(
	 						'plcr_no'=>$res[$i]['plcr_no'],
	 						'Tlike'=>count($like),
	 					// 	'TCreply'=>count($reply)
	 					); 
	 				}	

					$top_liked_reply=$this->sort_reply( $top_liked_reply , 'Tlike' );
	 				$top_liked_reply=$this->sort_for_equal_sort_reply($top_liked_reply , 'Tlike' );
	 			// 	$topReply=$this->if_thes_ame_tLike_treply( $topReply , 'plcno');

	 			// 	$_SESSION['topReply'] = $topReply;
	 			}else { 
	 				#first time to load.
	 				// echo " walay na add nga new comment.";
	 				// print_r($_SESSION['topLiked']);
	 			}
	 				
		 	  		// $this->result_array = $_SESSION['topReply'];
	 			$this->result_array = $top_liked_reply;
		 	}
		 	// public function set_reply_most_rated() { }
		// end eply
	 	public function get_result( ) { 

	 	  	return $this->result_array;
	 	}
		public function unset_result( ) { 

	 	  	unset($this->result_array);
	 	}



	 }
 
?>


<?php 

	class func  {


		public function get_all_comments( $sort , $tableName ) { 
			$res=selectV1( 
	 	  		"plcno", 
	 	  		$tableName,
	 	  		array("plno"=>$_SESSION["plno"]),
	 	  		"$sort"
	 	  	);
	 	  	return $res;
		}
		public function get_all_reply_comments( $sort , $tableName , $plcno ) { 
			$res=selectV1( 
	 	  		"*", 
	 	  		$tableName,
	 	  		array("plcno"=>$plcno, 'operand1'=>'and','replied_no'=>0),
	 	  		"$sort"
	 	  	);
	 	  	return $res;
		}
  		public function sort_for_equal_sort($array , $sort_base) { 

 			$array_len = count($array);
 			// print_r($array);
 			// if ( !empty($array) and !empty($sort_base)) {
 			 
 				$array_len_inner = count($array[0]);
 			  
 				for ($i=0; $i < $array_len ; $i++) { 

					for ($j=$i+1; $j < $array_len ; $j++) { 

						if ($array[$i][$sort_base] == $array[$j][$sort_base]) {
							 
							$LR_sum_I = $array[$i]['Tlike']+$array[$i]['TCreply'];
						 	$LR_sum_J = $array[$j]['Tlike']+$array[$j]['TCreply'];

						 	if ($LR_sum_I < $LR_sum_J  ) {

						 	 	 $plcno = $array[$i]['plcno'];
		 						               $Tlike = $array[$i]['Tlike'];
		 					  	             $TCreply = $array[$i]['TCreply'];

		 					      $array[$i]['plcno'] = $array[$j]['plcno'];
		 						  $array[$i]['Tlike'] = $array[$j]['Tlike'];
		 						$array[$i]['TCreply'] = $array[$j]['TCreply'];

		 					      $array[$j]['plcno'] = $plcno;
		 						  $array[$j]['Tlike'] = $Tlike;
		 					    $array[$j]['TCreply'] = $TCreply;

						 	}
						 	else  { 
						 	}
						}
					}
				}
			// }
 		 	return $array;
 		}
	 	public function sort( $array , $sort_base ) { 
 			$array_len = count($array);
 			$array_len_inner = count($array[0]);
 
			for ($i=0; $i < $array_len ; $i++) { 
				for ($j=$i; $j < $array_len ; $j++) { 
					if ($array[$i][$sort_base ] < $array[$j][$sort_base]) {
		 						
		 						       $plcno = $array[$i]['plcno'];
		 						       $Tlike = $array[$i]['Tlike'];
		 					  	     $TCreply = $array[$i]['TCreply'];

		 			      $array[$i]['plcno'] = $array[$j]['plcno'];
		 			      $array[$i]['Tlike'] = $array[$j]['Tlike'];
		 			    $array[$i]['TCreply'] = $array[$j]['TCreply'];

		 			      $array[$j]['plcno'] = $plcno;
		 				  $array[$j]['Tlike'] = $Tlike;
		 			    $array[$j]['TCreply'] = $TCreply;
		 		 	  			 
		 			}
			    }
	 		}
	 		return $array;
 		}
 		public function if_thes_ame_tLike_treply( $array , $sort_base) { 

 			$array_len = count($array);
 			$array_len_inner = count($array[0]);

			for ($i=0; $i < $array_len ; $i++) { 
				for ($j=$i; $j < $array_len ; $j++) { 
					
					if ( $array[$i]['Tlike'] == $array[$j]['Tlike'] and $array[$i]['TCreply'] == $array[$j]['TCreply']) {
							 						
		 				if ($array[$i][$sort_base]  < $array[$j][$sort_base]) {

			 							  $plcno = $array[$i]['plcno'];
			 						       $Tlike = $array[$i]['Tlike'];
			 					  	     $TCreply = $array[$i]['TCreply'];

			 			      $array[$i]['plcno'] = $array[$j]['plcno'];
			 			      $array[$i]['Tlike'] = $array[$j]['Tlike'];
			 			    $array[$i]['TCreply'] = $array[$j]['TCreply'];

			 			      $array[$j]['plcno'] = $plcno;
			 				  $array[$j]['Tlike'] = $Tlike;
			 			    $array[$j]['TCreply'] = $TCreply;
		 				}
		 			}
			    }
	 		}
	 		return $array;
 		}  
 		public function set_and_show_more_comments( $res , $showMore_start ,  $showMore_stop ) {  

 			$_SESSION['showMoreCounter'] = 0; #temporary set as zero for errror

			if (!empty($res)) {
				$res_len = count($res);
				$c = 0;

 			 	for ($i = $showMore_start; $i < $showMore_stop ; $i++) { 

			 		if ( $i < $res_len ) {
					 	$comment[$c] = select_one_result( 
					 	  	"*", 
					 	  	"posted_looks_comments",
					 	  	array("plcno"=>$res[$i]["plcno"]) 
					 	);
					}
					$_SESSION['showMoreCounter']++;
					$c++;
			 	}
		 	}

		 	if ( !empty( $comment) ) {
		 	 	return $comment;
		 	} else { 
		 		return 0;
		 	}	
		 	
		}	 		
 		//new reply sorting
		 	public function sort_reply( $array , $sort_base ) { 
	 			$array_len = count($array);
	 			$array_len_inner = count($array[0]);
	 
				for ($i=0; $i < $array_len ; $i++) { 
					for ($j=$i; $j < $array_len ; $j++) { 
						if ($array[$i][$sort_base ] < $array[$j][$sort_base]) {
			 						
			 						       $plcr_no = $array[$i]['plcr_no'];
			 						       $Tlike = $array[$i]['Tlike'];
			 					  	    
			 			      $array[$i]['plcr_no'] = $array[$j]['plcr_no'];
			 			      $array[$i]['Tlike'] = $array[$j]['Tlike'];
			 			 
			 			      $array[$j]['plcr_no'] = $plcr_no;
			 				  $array[$j]['Tlike'] = $Tlike;
			 			   
			 			} 

				    }
		 		}
		 		return $array;
	 		}
	 		public function sort_for_equal_sort_reply($array , $sort_base) { 

	 			$array_len = count($array);
	 			$array_len_inner = count($array[0]);
	 			  
 				for ($i=0; $i < $array_len ; $i++) { 

					for ($j=$i+1; $j < $array_len ; $j++) { 

						if ($array[$i][$sort_base] == $array[$j][$sort_base]) {
							 
						 
						 	if ($array[$i]['plcr_no'] < $array[$j]['plcr_no']  ) {

						 	 	 			   $plcr_no = $array[$i]['plcr_no'];
		 						               $Tlike = $array[$i]['Tlike'];

		 					      $array[$i]['plcr_no'] = $array[$j]['plcr_no'];
		 						  $array[$i]['Tlike'] = $array[$j]['Tlike'];
		 						
		 					      $array[$j]['plcr_no'] = $plcr_no;
		 						  $array[$j]['Tlike'] = $Tlike;
		 					   
						 	}
						 	else  { 
						 	}
						}
					}
				}
 		 		return $array;
 			}
			public function reply_limit( $replies ) { 
	 			$rlen  = count($replies);

	 			$access = false ;
	 			if ( $ccess ) {
	 			 
	 			 
		 			if ($rlen  > 50 and $rlen< 100) {
		 			$limit =  50;
		 			}
			 		if ($rlen  > 100 and $rlen< 500) {
			 			$limit =  100;
			 		}
			 		if ($rlen  > 300 and $rlen < 1000) {
			 			$limit =  400;
			 		}
			 		if ($rlen  > 1000 and $rlen < 10000) {
			 			$limit =  1000;
			 		}
			 		else { 
			 			$limit =  25;
			 		}
		 		}
		 		$limit = $rlen ;
	 			return $limit;
 			}
 			public function  get_reply_of_reply( $rplcr_no ) { 

 				// echo " plcrno = $rplcr_no  <br>";


 				

 				// initialize the reply/
 				$res=selectV1( 
		 	  		"*", 
		 	  		'fs_plcm_reply',
		 	  		array("replied_no"=>$rplcr_no),
		 	  		"ORDER BY plcr_no ASC"
	 	  		);









	 	  		// $reply[0] = $res;
	 	  		// $reply[0][2]['ul_li'] = 1; 

	 	  // 		for ($i=0; $i < count($res) ; $i++) { 
	 	  // 			// echo " $i reply <br>";	
					// $plcr_no = $res[$i]['plcr_no']; // first reply id distribute.

					// foreach ($res[$i] as $key => $value) {
					// 	 echo $key." => ".$value.'<br>';
					// }



	 	  // 		} 

 				// print_r($res);
 				// echo "total reply for plcrno = $rplcr_no is ".count($res).'<br>';





 				//  $rplcr_no == 1 ;
 				//  $_SESSION['old_plcr_no'] == 0; 


 				// if ( $rplcr_no == $_SESSION['old_plcr_no']) {
 					 
 				// 	 // add ++ li and ul

 				// }else { 

  			// 		// pass the rplcr_no to session of old_plcr_no
 				// 	// return the 1 li and ul
 				// }
 			 	
 				


 				// // echo 'total reply is = '.count($res);
 				return  $res;
 			}
 		//end reply sorting

		



	}
  



?>