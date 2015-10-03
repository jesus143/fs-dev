<?php  


	// add new generated code 

		if ( isset( $_POST['generate']) ) {
			 echo " code generated ";

			$response = $mc->fs_signup_code(   array( 'type' =>'insert','generated_code'=>$mc->fs_signup_code(   array( 'type' =>'get-new-gen-time' ) )  ) );  
		}




 	//  get all the generated code order by latest 

		$response = $mc->fs_signup_code(   
	        array( 
	          'type' =>'select', 
	          'where'=>"mno > -1 ",
	          'orderby'=>'date desc',
	          'limit_start'=>0,
	          'limit_end'=>1000  
	        ) 
	    );  

	// $mc->print_r1( $response );
	$len = count($response);  
?>
<div id="container-signup-code" >
	 <ul> 
	 	<li> 
	 		<?php for ($i=0; $i < $len ; $i++): 

				$gscode['scno']		      = $response[$i]['scno'];
				$gscode['generated_code'] = $response[$i]['generated_code'];
				$gscode['mno'] 			  = $response[$i]['mno'];
				$gscode['date'] 		  = $response[$i]['date']; 
				$gscode['fullname']       = $mc->get_full_name_by_id( $gscode['mno'] );  
				$gscode['status']         = (  $gscode['mno'] > 0 ) ? "<b><span class='fs-text-blue' > in used</span></b> " : "<span class='fs-text-red' >not in used</span>"  ;

			?>
			<table border="1" cellpadding="5"  cellspacing="0" >
				<tr> 
					<td> CODE </td> <td> <?php echo $gscode['generated_code']; ?> </td> <td> <?php echo $gscode['status']; ?> </td> <td> <?php echo $gscode['fullname']; ?> </td>
			</table>
			<?php endfor; ?>  
	 	</li>
	 	<li> 
	 			<form method="post" action="admindashboard?p=gc-signup" >
	 				<table> 
		 				<td> create new code </td> <td> <input type="submit" name="generate" value="generate new sign up code " /> </td>
		 			</table>	
	 			</form>
	 			

	 	</li>

	 </ul>
		 
	

</div>
