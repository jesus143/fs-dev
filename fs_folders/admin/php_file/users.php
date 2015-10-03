<?php   


	$members = $mc-> get_user_limit( array('start'=>0, 'end'=>100 , 'orderby'=>'order by mno asc', 'where'=>null ) );  
	// $mc->print_r1($members);  
	// echo " total res ".count($members);



	echo "<div id='admin-user-container' >
		<table>
			<tr> 

	";
		$c=0;
		for ($i=0; $i < count($members)  ; $i++) {  

			$c++;
			$mno = $members[$i]['mno'];   
			$fullname = $mc->get_full_name_by_id ( $mno );; 
			$username = $mc->get_username_by_mno( $mno );  


			echo "  
				<td>  
					<table border='0' > 
						<tr>
							<td> 
								<ul id='admin-user-container-ul'  > 
									<li>";  	
										$mc->member_thumbnail_display( $mc->ppic_thumbnail , $mno , null ,  null ,  '50px' , $type=null );    
									echo " 
									</li>  
									<li>   
									 	<div id='admin-user-tab-option' >
									 		<table border='0' style='width:230px;' > 
									 			<tr>  
									 				<td> 
									 					<span class='red' > 
									 					$c.)
														</span>
									 					<a href='$username'> 
														 	$fullname 
														</a> 
									 				</td> 
									 			<tr>

									 				<td> 
														1.) view member info   <br>	
									 				</td> 
									 			<tr> 
									 				<td> 
														2.) view look uploads ( <span class='green'>200</span> )<br> 	
									 				</td> 
									 			<tr>
									 				<td> 
														3.) view media uploads ( <span class='green'>200</span>  ) <br> 	
									 				</td> 
									 			<tr>
									 				<td> 
														4.) view blog uploads ( <span class='green'>13</span>  ) <br> 	
									 				</td>  
									 			<tr> 
									 				<td> 
														5.) view comment ( <span class='green'>30</span>  )<br>  	
									 				</td> 
									 			<tr> 
									 				<td> 
														6.) view ratings  ( <span class='green'>30</span>  ) <br>  	
									 				</td> 
									 			<tr> 
									 				<td> 
														7.) delete this member <br>	
									 				</td> 
									 			<tr>  
									 		</table>
										</div> 
									</li>
								</ul> 
							<td>  
						<tr>
					</table>
				<td>  
			"; 



			if ( $c%3==0 )  
				echo "<tr>";
				 


		} 
	echo "
		</table>
	</div>"; 

?>