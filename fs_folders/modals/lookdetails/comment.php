<?php  
	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php"); 
    $mc              =  new myclass();     
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 	 		 =  $mc->get_cookie( 'mno' , 136 );   
 	$plno            =  ( !empty( $_GET['plno'] ) ) ? $_GET['plno'] : 0;  
 	$tlc = $mc->get_total('plcno','posted_looks_comments','plno', $plno );  
?>
 

 










   
	<span id='feed'>  FEEDBACK </span> 
	<table id='look_comment_t1' border="0" cellpadding="0" cellspacing="0">  
		<tr>  
			<td id='header_comment_c_td'>
				<table id='comment_love_drip_t' border="0" cellspacing="0"  cellpadding="0" > 
					<tr> 
						<td  id='comment_tabs' > 
							<span title='comments' >( <?php echo $tlc; ?> ) COMMENTS</span> 
							<hr id='comment_tabs_hr1' >
						</td>
						<td> 
							<div style="margin-left:20px;margin-top:-17px;" >
								<?php $mc->print_look_comment_sorting_option( 'postedlooks' , $plno );  ?> 
							</div>
						</td>
					 
				</table>
				<!-- 
				<table id='comment_love_drip_t' border="0" cellspacing="0"  cellpadding="0" > 
					<tr> 
						<td  id='comment_tabs' > 
							<span title='comments' >( 0 ) COMMENTS</span> 
							<hr id='comment_tabs_hr1' >
						</td>
						<td  id='love_tabs' >
							<span title='loves' >( 23 ) LOVES</span> 
							<hr id='love_tabs_hr1' >
						</td>
						<td  id='drip_tabs' >
							<span title='drips' >( 0 ) DRIPS</span>	
							<hr id='drip_tabs_hr1' >
						</td>
				</table>
				<span id='higest_rate'> 
					<span id='red_bold' title='prev comment' ><</span>  -->
					<?php 
						/*
						$c=0;
						$tcomment_page = 6; 
						for ($i=0; $i < $tcomment_page; $i++) 
						{ 
							$c++;
							echo " <span id='c_pages'> $c </span>";	
						}
						*/
					?>
					<!-- <span id='red_bold' title='next comment' >></span> 
					| HIGHEST RATED  
				</span> -->
			</td>
		<tr>  
			<td id='comment_header_line'> 
				<div> </div> 
			</td> 
		<tr>  
			<td id='comment_content'>  

				<table border="0" >
					<tr>   
						<td> 
							<?php  
								
								$np = $mc->generate_next_prev_numbers( $tlc , 10 );  
							?>  
							<ul id="look-comment-cotainer-ul" >
								<li id="comment-top-next-prev" >   
									<?php $mc->print_next_prev_numbers( $np , $plno , null , 'loader-down' ); ?> 
								</li>
								<li> 
									<div style="margin-left:35px;" > 
										<ul id='comments_result' class='comments_result' >
											<?php  
												// require( 'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=init&sort_comment=order by plcno desc' ); 
												$mc->print_look_comment( $mno , $plno , null , 'init' ,  $mc->date_time , null , 1 , 'order by plcno desc' , '../../../'  ); 	
											?>
										</ul> 
									</div>
								</li> 
							</ul>   
						</td> 
					<tr>
						<td> 
							 
							<?php $mc->print_next_prev_numbers( $np , $plno , null , 'loader-up' ); ?>
						</td>
					<tr> 
						<td> 
							<?php //$mc->next_prev_comments($tlc); ?>	
								  
								<?php 
										$mc->print_look_comment_textarea( $plno ); 
									// require("fs_folders/fs_lookdetails/look_comment_items/comment_field.php");  
								?> 
								<ul id='comment_sending_result' > 	
									<!-- look commnet res -->
								</ul>  
						</td>  
				</table>  
			</td>
		<tr>  
			<td id='comment_post_area' > 
				<!-- comment post  -->
			</td>
	</table>  
	<div id="footer_res" style="display:nonee" >
		<!-- footer_res -->
	</div> 