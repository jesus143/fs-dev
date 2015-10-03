<?php  
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	require ("replyFunc.php");

	main();

	 
	function main() {  
		
		             $mc = new myclass();
			   			$mc->date_difference();
			
		          $plcno = (!empty($_GET['plcno'])) ?  intval($_GET["plcno"]) : "" ; 
			   $rcomment = (!empty($_GET['rcomment'])) ?  $_GET['rcomment'] : "" ;  
			    $plcrno  = (!empty($_GET['plcrno'])) ? intval($_GET['plcrno']) : 0 ;  
			        $mno = intval($_SESSION['mno']);  
			     $status = $_GET['status'];
			  $date_time = $mc->date_time; 
			  $flag_note = (!empty($_GET['flag_note'])) ?  $_GET['flag_note'] : 0 ;  
		         $cboxes = (!empty($_GET['cboxes'])) ?  $_GET['cboxes'] : 0 ;  
		    $replyEdited = (!empty($_GET['replyEdited'])) ?  $_GET['replyEdited'] : 0 ;  
		     $replied_no = (!empty($_GET['replied_no'])) ?  $_GET['replied_no'] : 0 ;  
		$isReplyIndented = (!empty($_GET['isReplyIndented'])) ?  $_GET['isReplyIndented'] : 0 ;  

		$mc->auto_detect_path();
		

		// echo " status = [$status]  replied_no = $replied_no <br> ";
		if ( $status == 'replySave' )
		{ 

			save_reply_comment( $status , $plcno , $replied_no , $mno , $rcomment , $date_time);
			$posted_comment = false;
			// require ('replyDesign.php');  
			require ('../test_reply.php');  
			// echo "result of the output";
			reply_print( $plcno , 0 , true ,  'YES' , $mno , $isReplyIndented , '../../../../' );
			// echo "reply design print here !";
		}
		else if ( $status == 'replyLike' ) 
		{ 

			replyLike ( $mno , $plcrno );
		}
		else if ( $status == 'replyDisLike' ) 
		{ 

			replyDisLike ( $mno , $plcrno );
		}
		else if( $status == 'check_flag' ) 
		{ 
			// echo "chekcing flagged ";
			// echo "$flag_note $cboxes";
			check_flagged( $plcrno );
			// echo "1";
		} 
		else if( $status == 'replySaveFlag' ) 
		{ 

			// echo " 	save flag reply  note = $flag_note  check box options = $cboxes <br>";
			save_reply_flagged( $plcrno , $mno , tcleaner($flag_note) , $cboxes , $date_time ) ;
		} 
		else if( $status == 'replyDelete' ) 
		{ 
			// echo "delete reply   plcrno = $plcrno ";

			$del_array = $mc->get_multiple_reply( $plcrno );	


			// for ($i=0; $i < count($del_array) ; $i++) 
			// { 
			// 	 // replyDelete  ($del_array[$i]);
			// 	echo " plcrno to del =  ".$del_array[$i].'<br>';
			// }
		}
		else if ( $status == 'replyEdit' ) 
		{ 
			// echo " edit reply plcrno = $plcrno edited reply = $replyEdited <br> "; 
			replyEdit( $plcrno , $replyEdited );
		}
		
	}
?>