<?php   
	if ( isset( $_POST['brandSelectedSave'] )) {
		$bs = $_POST['brandSelected']; 	 
		$bs1 = explode(',', $bs);
		// print_r($bs1); 
		$selectedBrand  =   $mc->remove_array_duplicate_itself_1darray( $bs1 );
 						    $mc->account_settings_brand_insert( $selectedBrand , $mno );  
	}
	$brand_selected =   $mc->retreive_specific_user_brand_selected( $mno , 'order by bmsno desc' ); 
	$all_brands = $mc->get_all_brand( 1000 ); 
?>  
<!-- <div id='accountsetting-wrapper-container-table-body-right-profile' > -->
	<table id='accountsetting-wrapper-container-table-body-right-select_brands-table' border="0" cellspacing="0" cellpadding="0" > 
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-title'  >  
				<span> 
					Select the brands you like and wear. Selecting more <br> then one brand will pair you with members who have a lot in common with you.
				</span>
			</td>
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-numbers'  style="padding-left: 15px; " >  
				<table border="0" cellpadding="5"  cellspacing="0" > 
					<tr> 
						<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
						<td> <span id='select_brands-table-numbers-arrow-left' class='page1' onclick="next_prev(1 , 'account-select-brands')"  style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php  
						$c=1; 
						for ($i=0; $i < 25 ; $i++) {  
						 	$c++; 
							echo " 
								<td  class='page$c' onclick='next_prev(\"$c\" , \"account-select-brands\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table> 
			</td>
		<tr>
			<td>  
					 <img id='select_brand_loader1' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td>
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-thumnails'  >  
				<table border="0" cellspacing="0" cellpadding="0" >
					<tr>
						<td id='brandres'> 
							<table  border="0" cellspacing="0" cellpadding="0"  > 
								<?php  
									$c=0;
									for ($i=0; $i < 15 ; $i++) {    

										$c++;   
										$bno = $all_brands[$i]['bno']; 
										$bname = $retVal = ( !empty( $all_brands[$i]['bname']) ) ?  $all_brands[$i]['bname'] : 'Name not available' ; 



										$brand_style = $mc->get_brand_style_as_selected_or_not( $brand_selected , $bno );     
										if ( file_exists("$mc->brand/$bno.png") ) {
										 	echo " 
												<td> 
													<div>
														<img id='brand$bno' class='brandDefault'   src='$mc->brand/$bno.png' onclick='select_brand(\"$bno\")' style='$brand_style'  > 
													</div>

													<div style='padding-top:10px;' >
														$bname
													</div>
												</td> 
											"; 
										}
										else{
											echo " 
												<td> 
												 	<div>  
														<img id='brand$bno' class='brandDefault'   src='$mc->brand/default.jpg' onclick='select_brand(\"$bno\")' style='$brand_style'  >  
													</div> 

													<div style='padding-top:10px;' >
														$bname
													</div>
												</td> 
											";  
										} 

 
										if ( $c%5==0) {
											echo "<tr>";
										}   


									} 
								?>
							</table>
						</td> 
				</table>
			</td>
		<tr>
			<td>  
				<br>
				<img id='select_brand_loader2' src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:15px; margin-left:310px"  > 
			</td>
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-numbers'  style="padding-left: 15px; " >  
				<table border="0" cellpadding="5"  cellspacing="0" > 
					<tr> 
						<td> <span id='select_brands-table-numbers-arrow-left'> < </span>  </td>
						<td> <span id='select_brands-table-numbers-arrow-left' class='page1' onclick="next_prev(1 , 'account-select-brands')"  style='font-family:arial;font-size:12px;cursor:pointer'  > 1 </span>  </td>
						<?php  
						$c=1; 
						for ($i=0; $i < 25 ; $i++) { 
						 	$c++; 
							echo " 
								<td  class='page$c' onclick='next_prev(\"$c\" , \"account-select-brands\" )' style='font-family:arial;font-size:12px;cursor:pointer' > $c </td> 
							";
						 } ?>
						<td> 
							<span id='select_brands-table-numbers-arrow-right'> > </span> 
						</td>  
				</table> 
			</td>
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-select_brands-table-save'  >  
				<form _action='account?at=2' method='post' > 

					<input type="text" value="" id="brandField" name='brandSelected'  /><br>
					<input type="submit" value='save selected' name='brandSelectedSave' /> 

				 	<img id='avatar-right-delete' src='<?php echo "$mc->genImgs/account-save.png"; ?>' style='display:none' /> 
			 	</form>
			</td> 
	</table> 
<!-- </div> -->


