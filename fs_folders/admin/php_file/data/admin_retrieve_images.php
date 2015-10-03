<?php 
	require("../../../php_functions/connect.php");
	require("../../../php_functions/function.php");
	require("../../../php_functions/myclass.php");
	require("../../../php_functions/library.php");
	require("../../../php_functions/source.php");

	$mc = new myclass();
	$am = new admin();


	$mc-> auto_detect_path();
	
	$am-> look_views(12);

 	// echo " start = $am->start stop = $am->stop ssd <br>"; 



		 


		
		// selectV1($select='*',$tableName=null, $where=null,$orderby=null,$limit=null) 

		$all_looks = selectV1(
			'*',
			'postedlooks',
			array( "active"=>1 ) ,
			'order by plno desc'
		); 
	 	// echo "total look = ".count($all_looks);






 	





									

																																 
		 																														 
				$c=0;
				echo " 
				<table border='0' cellspadding='5' cellspacing='5'  id='ad_look_table' >";

					for ($i=$am->start; $i < $am->stop ; $i++) 
					{ 
						if ( count($all_looks) > $i) 
						{
						 
						
							$c++;
							$plno = $all_looks[$i]['plno'];
							echo 
							" 
								<td id='ad_look_container_td$plno'   >
									<a href='lookdetails?id=$plno' target='_blank' > 
										<img  src='$mc->look_folder_home/$plno.jpg' /> 
									</a> 
									<br> 
										<table border='0' cellspadding='5' cellspacing='5' id='look_image_settings' >
											<tr>
												<td> 
													<span onclick='deleteNow(\"$plno\",\"looks\")' >
														delete
													</span>
												</td>
												<td> 
													<span id='update' >
														<a href='post-look-label?kooldi=$plno&type=admin' > update </a> 
													</span>
												</td>
										</table>
								</td>
							"; 
							if ( $c%4 == 0 ) 
							{
								echo "</tr>";
							}	
						}
					}	 																															 
					echo"</table> 
						</center> ";
	?>