<?php 
	// basic function here
	function replyLike ( $mno , $plcrno ) { 

		 insert_reply_like( $mno , $plcrno );

	}

	function replyDisLike ( $mno , $plcrno ) { 

		 insert_reply_dislike ( $mno , $plcrno );
  
	}  
 
	function check_flagged( $plcrno ) { 

		$bool=check_flagged_reply( $plcrno ); 
		echo "$bool";

	}

	function save_reply_flagged($plcrno , $mno , $flag_note , $cboxes , $date_time) { 

		insert_reply_flagged( $plcrno , $mno , $flag_note , $cboxes , $date_time );

	}

	function replyDelete  ( $plcrno ) { 

		// echo "REPLY  DELETE";

		// deleting_comment_reply( $plcrno );


	}

	function replyEdit( $plcrno , $replyEdited ) { 

		reply_edit_update( $plcrno , $replyEdited );

	}

	function save_reply_comment( $status , $plcno , $replied_no ,$mno , $rcomment , $date_time ) { 

		if (strlen($rcomment)>0) {
			insert(
				'fs_plcm_reply',
				array('plcno','replied_no','mno','plcr_message','plcr_date'),
				array($plcno,$replied_no,$mno,tcleaner($rcomment),$date_time),
				'plcr_no'
			);
		}else  { 

		}

		$r=selectV1(
			'*',
			'fs_plcm_reply',
			array('mno'=>682,'operand1'=>'or','plcr_message'=>'sd'),
			'order by plcr_no asc',
			'limit 1'
		);

	} 

 	function insert_reply_like( $mno , $plcrno ) { 

		 if (!selectV1('*','fs_plcm_rlike',array('plcrno'=>$plcrno,'operand1'=>'and','mno'=>$mno)) ) {
		 		if (!selectV1('*','fs_plcm_rdislike',array('plcrno'=>$plcrno,'operand1'=>'and','mno'=>$mno)) ) {
			 		insert('fs_plcm_rlike',array('plcrno','mno'),array($plcrno,$mno),'rlno');						
					echo "successfully disliked";
		 		}else { 
		 			echo "already liked";
		 		}
		}else { 	
			echo "exist like ";
		}

	}

	function insert_reply_dislike ( $mno , $plcrno ) { 

		 if (!selectV1('*','fs_plcm_rdislike',array('plcrno'=>$plcrno,'operand1'=>'and','mno'=>$mno)) ) {
		 		if (!selectV1('*','fs_plcm_rlike',array('plcrno'=>$plcrno,'operand1'=>'and','mno'=>$mno)) ) {
					insert('fs_plcm_rdislike',array('plcrno','mno'),array($plcrno,$mno),'rdno');	
					echo " successfully disliked ";
				}else { 
					echo "already liked";
				}					
		}else { 	
			echo "exist dislike ";
		}

	}

	function check_flagged_reply( $plcrno ) 
	{ 
 
		$flaged=selectV1(
			'*',
			'fs_plcm_rflag',
			array('plcrno'=>$plcrno) 
		); 
		if (empty($flaged)) {
			return 'false';
		}
		else { 
			return 'true';
		} 
	}

	function insert_reply_flagged( $plcrno , $mno , $flag_note , $cboxes , $date_time  ) {  
 
		$res=insert(
			'fs_plcm_rflag',
			array('plcrno' , 'mno' , 'rflag_option' , 'rflag_note' , 'rflag_date'),
			array($plcrno , $mno , $flag_note , $cboxes , $date_time),
			'rflagno'
		);	

		 if($res) { 
		 	echo "reply comment flag successfully added!";
		 }

	}
	
	function reply_edit_update( $plcrno , $replyEdited ) { 
		echo "reply_edit_update( $plcrno , $replyEdited ) ";

		if ( !empty($replyEdited) ) {
			$replyUp=update1(
				'fs_plcm_reply',
				'plcr_message',
				tcleaner($replyEdited),
				array('plcr_no',$plcrno)
			);

			if ( $replyUp ) {
				 echo " replied comment successfully updated <br>";
			} 
			else { 
				echo " replied comment failledd to update <br>";
			}
			

		}
		


	}
?>