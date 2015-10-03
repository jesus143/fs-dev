<?php   
	require("../../../../fs_folders/php_functions/connect.php");    
	require("../../../../fs_folders/php_functions/function.php");
	require("../../../../fs_folders/php_functions/myclass.php");
	require("../../../../fs_folders/php_functions/library.php");
	require("../../../../fs_folders/php_functions/source.php"); 
 	$mc = new myclass();   
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );     

	$wtres = $_SESSION['wtres'] = 12;   #  welcome tres use for the welcome total result everytime user clicked show more.
	$_SESSION['csb_fs'] = 2;            # suggested brand counter set to 2 because when hit more second page needs to show 
     


 	$brand_selected =   $mc->retreive_specific_user_brand_selected( $mno , 'order by bmsno desc' ); 
	$all_brands = $mc->get_all_brand( $wtres );     
 ?>
 
<div id="welcome-content-container" >  	 
	<center>  
		<div id="welcome-about-container" >    

				<div>
					<table id='accountsetting-wrapper-container-table-body-right-select_brands-table' border="0" cellspacing="0" cellpadding="0" > 
						<tr> 
							<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-title' style=" padding-bottom:20px;text-align:center; "  >  
								<span style='font-size:13px;' >  
									Select the brands you  wear and like. Selecting more Selecting more then one the required <b>(5)</b> brands will pair you with members who have a lot in common with you.
								</span>
							</td>  
						<tr> 
							<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-thumnails' style="padding-bottom:0px; "  >  
								<center>
									<table border="0" cellspacing="0" cellpadding="0" style="margin-left:50px;" >
										<tr>
											<td id='brandres'> 
												<table  border="0" cellspacing="0" cellpadding="0"   > 
													<?php  
														$c=0;
														$tbrand = count($all_brands);
														for ($i=0; $i < 12 ; $i++) {     
															if ( $i < $tbrand ) {  
																$c++;   
																$bno = $all_brands[$i]['bno']; 
																$bname = $retVal = ( !empty( $all_brands[$i]['bname']) ) ?  $all_brands[$i]['bname'] : 'Name not available not available' ;  
																// echo " $i bno = $bno <br> "; 
																$brand_style = $mc->get_brand_style_as_selected_or_not( $brand_selected , $bno );     
																if ( file_exists("../../../../$mc->brand/$bno.png") ) {
																 	echo " 
																		<td> 
																			<div>
																				<img id='brand$bno' class='brandDefault'   src='$mc->brand/$bno.png' onclick='select_brand(\"$bno\")' style='$brand_style; padding-top:5px;'  > 
																			</div>

																			<div  id='welcome-name-container' >
																				$bname
																			</div>
																		</td> 
																	"; 
																}
																else{
																	echo " 
																		<td  > 
																		 	<div>  
																				<img id='brand$bno' class='brandDefault'   src='$mc->brand/default.jpg' onclick='select_brand(\"$bno\")' style='$brand_style; padding-top:5px;'  >  
																			</div> 

																			<div id='welcome-name-container' >
																				$bname
																			</div>
																		</td> 
																	";  
																}  
																if ( $c%6==0) {
																	echo "<tr>";
																}   
															} 
														} 
													?>
												</table>
											</td> 
									</table>
								</center>
							</td> 
						<tr> 
							<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-save' style="display:block;border:1px solid red; display:none"  >  
								<form _action='account?at=2' method='post' >  
									<input type="text" value="" id="brandField" name='brandSelected' style="width:100%;"  /><br>
									<input type="submit" value='save selected' name='brandSelectedSave' />  
								 	<img id='avatar-right-delete' src='<?php echo "$mc->genImgs/account-save.png"; ?>' style='display:none' /> 
							 	</form>
							</td> 
					</table>  
				</div>    
		 		<div style="background-color:#e9eaed; padding:20px;margin-left:-20px; width:100%; border-radius: 0px 0px 5px 5px;" >  
					<center> 
						 	<table>	
						 		<tr>  
						 			 <td> 
						 			 	<div id='more_brand' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
						 			 </td>
						 			 <td> </td>
						 		<tr>
						 			<td> 
						 				<img src="<?php echo "$mc->genImgs/brand-more.png";  ?>" onclick="welcome_more( 'brandres' , 'more_brand img' , 'sb' )"    >   			  
						 			</td>
						 			<td> 
						 				<a href="#">
						 					<img src="<?php echo "$mc->genImgs/login-welcome-continue.png";  ?>" onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$mc->login_path_page/welcome/welcome-suggested-member.php"; ?>' , '#more_loading3 img' , '3' )"  >   			  
						 				</a>
						 			</td>
						 	</table>
							
						 
					</center> 
				</div>
				
	 	</div>
	</center>
 </div>    
