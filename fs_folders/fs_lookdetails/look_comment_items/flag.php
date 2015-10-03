<style type="text/css">
	.flag_main_container { 
		position: fixed;
		z-index: 1;
		width: 100%;
		height: 2000px;
		display: none;
		z-index: 102;
	}	
	.bgcolor { 
		position: fixed;
   		top: 0;
   		right: 0;
   		bottom: 0;
   		left: 0;  
   		height: 100%;
   		width: 100%;
   		margin: 0;
   		padding: 0;
	    opacity: .5;
   		z-index: 101;
    	background-color: #000;
    	display: none;
	}
	.flag_container{  

		margin-left: 150px;
		margin-top: 25px;
		background-color: #ccc;
		width: 600px;
		border: 3px solid #000;
		padding: 20px;
		
	}
	.not_yet_flagged_table , reply_not_yet_flagged_table { 
		width: 600px;
	}
	.text_area_notes, .replyTextArea , .reply_text_area_notes , .reply_edit_textarea ,.comment_edit_textarea  { 
		width: 580px;
		height: 100px;
		resize:none;
		border: 1px solid #000;
	}
	.span_title , .reply_span_title{ 
		font-size: 20px;
		font-weight: bold;	

	}
	.opt { 
		font-size: 15px;
		font-weight: bold;			
	}  

	.flag_send , .flag_cancel , .flag_send , .flag_cancel ,.reply_flag_send , .reply_flag_cancel ,
	.reply_edit_save ,.reply_edit_cancel , .comment_edit_save ,.comment_cancel { 
	background-color: #000;
		border:none;
		color: #ffffff;
		font-size: 15px;
		font-weight: bold;			
		width: 100px; 
		height: 20px;	
	}
</style>
 
	<div class='flag_main_container' >
		 <div class='flag_container' >
		 	<div id='loader'>
		 	</div>

		 	<!-- new main comment flag -->

				<table border=0 class='not_yet_flagged_table' > 
					<tr>
					<td> 
						 <span class='span_title'>  Whats the problem with this comment? 	</span>
						 <br>  <br> 
					</td>  <tr> 
					<td> 
						  
						 <table>
						 	<tr> 
						 	<td><input type='checkbox' name='1' class='check_box1' >   </td> <td> <span class='opt'  > Comment is Offensive or Inappropriate  </span></td> <tr>
						 	<td><input type='checkbox' name='1' class='check_box2' >   </td> <td> <span class='opt'  > You feel the member underrated the look  </span></td> <tr>
						 	<td><input type='checkbox' name='1' class='check_box3' >   </td> <td> <span class='opt'  > Comment contains Unsolicited Advertisement or SPAM </span> </td> <tr>
						 </table>
					</td> <tr>
					<td> 
						<table>
							<tr>
								<td> <br>
									<span class='span_title'>Notes(optional)</span> </td><tr>
								<td> 
									 <br>
									<textarea class='text_area_notes' placeholder='notes here' > 
									</textarea>
								</td><tr>

						</table>

					</td> <tr>
					<td>
						<table>
							<tr>
							<td>
								<br> 
								<input type='button' value='send'   class='flag_send'  onclick='look_comment_attr_clicked("flag_send_from_box")' /> 
								<input type='button' value='cancel' class='flag_cancel' /> 

							</td><tr>
						</table>
					</td>
					 
				</table>

				<table class='already_flagged_div'  >
					<tr>
						<td>
							<span class='warning_message'> This comment has already been placed under review and will be addressed in the order it was received.</span>
						</td>
						<tr>

						<td><br>
							<input type='button' value='ok' class='flag_cancel' /> 
						</td>
				</table>
 			<!-- end main comment  flag  -->

			<!-- new  main comment edit  -->
				<table border=0 class='comment_edit'> 
						<tr>
							<td> 

								<span class='comment_edit_cid' style='display:block'> 
									<!-- id here -->
								</span>
							</td>
							<tr>
					 	
						<td> 
						 
						</td><tr>  <td><span class='invisible'> sd </span></td> <tr>
						 <td> 
						 	 
						 </td>	<tr>
						<td> 
							<table>
								<tr>
									<textarea class='comment_edit_textarea' > 
									 	main comment here..
									</textarea>
								</td><tr>
							</table>

						</td> <tr>


						<td>
							<table>
								<tr>
								<td>
									<br> 
									<input type='button' value='save'   class='comment_edit_save' onclick='look_comment_attr_clicked ("comment_edit_save")'  /> 
									<input type='button' value='cancel' class='reply_flag_cancel' /> 
								</td><tr>
							</table>
						</td>
					</table>
			<!-- end main comment edit  -->

 			<!-- new reply comment flag -->

				<table border=0 class='reply_not_yet_flagged_table' > 
					<tr>
					<td> 
						 <span class='span_title'>  Whats the problem with this comment? 	</span>
						 <br>  <br> 
					</td>  <tr> 
					<td> 
						  
						 <table>
						 	<tr> 
						 	<td><input type='checkbox' name='1' class='check_box1' >   </td> <td> <span class='opt'  > Comment is Offensive or Inappropriate  </span></td> <tr>
						 	<td><input type='checkbox' name='1' class='check_box2' >   </td> <td> <span class='opt'  > You feel the member underrated the look  </span></td> <tr>
						 	<td><input type='checkbox' name='1' class='check_box3' >   </td> <td> <span class='opt'  > Comment contains Unsolicited Advertisement or SPAM </span> </td> <tr>
						 </table>
					</td> <tr>
					<td> 
						<table>
							<tr>
								<td> <br>
									<span class='reply_span_title'>Notes(optional)</span> </td><tr>
								<td> 
									 <br>
									<textarea class='reply_text_area_notes' placeholder='notes here' > 
									</textarea>
								</td><tr>

						</table>

					</td> <tr>
					<td>
						<table>
							<tr>
							<td>
								<br> 
								<input type='button' value='send'   class='reply_flag_send'  onclick='comment_Reply_Attr_Clicked("reply_flag_send_from_box")' /> 
								<input type='button' value='cancel' class='reply_flag_cancel' /> 

							</td><tr>
						</table>
					</td>
					 
				</table>
 			<!-- end reply comment flag -->

			<!-- reply -->
				<table border=0 class='replybox' > 
					<tr>
						<td> 


							<!-- main comment number <br> -->
							<span class='cid' style='display:none'> 
								<!-- id here -->
							</span>
							<!-- replied number <br> -->
							<span class='replied_no' style='display:none'> 
								<!-- replied id here here -->
								<!-- 1 -->
							</span> 
							


						</td>
						<tr>
				 	
					<td> 
					 
						<span class='blue_bold' id='commentor_name' > 
						  	  
						</span>
						<span class='comment' id='ccomment' > 
							 
							 
						</span> 

					</td><tr>  <td><span class='invisible'> sd </span></td> <tr>
					 <td> 
					 	 
					 </td>	<tr>
					<td> 
						<table>
							<tr>
								<textarea class='replyTextArea' placeholder='type your reply here..' > 
									txt area
								</textarea>
							</td><tr>
						</table>

					</td> <tr>


					<td>
						<table>
							<tr>
							<td>
								<br> 
								<input type='button' value='reply'   class='flag_send' id='replySend' /> 
								<input type='button' value='cancel' class='flag_cancel' /> 

							</td><tr>
						</table>
					</td>
				</table>
			<!-- end reply -->

			<!-- new edit reply -->
				<table border=0 class='reply_edit' > 
						<tr>
							<td> 

								<span class='reply_edit_cid' style='display:block'> 
									<!-- id here -->
								</span>
							</td>
							<tr>
					 	
						<td> 
						 
						</td><tr>  <td><span class='invisible'> sd </span></td> <tr>
						 <td> 
						 	 
						 </td>	<tr>
						<td> 
							<table>
								<tr>
									<textarea class='reply_edit_textarea' > 
									 	hello there
									</textarea>
								</td><tr>
							</table>

						</td> <tr>


						<td>
							<table>
								<tr>
								<td>
									<br> 
									<input type='button' value='save'   class='reply_edit_save' onclick='comment_Reply_Attr_Clicked("reply_edit_save")'  /> 
									<input type='button' value='cancel' class='flag_cancel' /> 

								</td><tr>
							</table>
						</td>
				</table>
			<!-- end edit reply -->

	 	</div>
	</div>
	<div class='bgcolor'> 

		sfs	
	</div>
	 
 