	$(document).ready(function(){ 
		// alert('query is working');
		comment_loaded();
		flag();
		sorting_options ( );
		comment_box_hit_enter( );
		init(); 

		function comment_loaded() {	 
			// alert('comment loaded'); 
			setEmpty();  
		}
		function flag(){ 
			 close_flag_box();  
			 saveCommentReply();
		} 
		function replyComment() { 
			alert('working');
			$('.img_like').click(function () { 
				alert('img_like');
			})
		}  
		function init() {  
			 $('#post_comment').click(function(){ 
			 	$('#comment_box').val('');
			 })

			 $('.container').click(function(){ 
			 	alert('comment list clicked ');
			 })
			 $('.img_like').click(function(){ 
			 	alert('like clicked');
			 });
			 $('TA_main_comment_reply').val('this in function init file name query line 34'); 
		}
		function close_flag_box() {    
			$('.flag_send , .flag_cancel , .reply_flag_cancel').click(function() { 
				$('.flag_main_container').fadeOut('normal');
				$('body').css({'overflow':'visible'}); 
				$('.bgcolor').css({'display':'none'});

			})
		}    
		function saveCommentReply() { 


			$('.flag_send').click(function(){ 
				// alert( $('.replyTextArea').val() );
				var rcomment=$('.replyTextArea').val();
				var plcno=$('.cid').text();
				var replied_no=$('.replied_no').text();

				// alert('plcno = '+plcno);
				// ajax_send_data('res','look_comment_items/data/reply_save_comment.php?rcomment='+rcomment+'&plcno='+plcno);
				// alert(' replied_no = '+replied_no+' plcno = '+plcno);

				
				// alert('#replyContainer_'+plcno);

				if ( replied_no == 0 ) 
				{ 	
					// alert('slide down');
					$('#replyContainer_'+plcno).slideDown('fast');
					prepend(
						'replyContainer_'+plcno,
						'look_comment_items/data/reply.php?&status=replySave&rcomment='+rcomment+'&plcno='+plcno+'&replied_no='+replied_no
					);
 				}
 				else 
 				{ 
 					prepend(
				 	 	'autopost_'+replied_no,
				 		'look_comment_items/data/reply.php?&status=replySave&rcomment='+rcomment+'&plcno='+plcno+'&replied_no='+replied_no
			 	 	)

 				}
			 	
			// ajax_insert_and_append_reply(
			//  		'autopost_'+replied_no,
			//  		'look_comment_items/data/reply.php?&status=replySave&rcomment='+rcomment+'&plcno='+plcno+'&replied_no='+replied_no
			//  	);


			});
		}
		function sorting_options ( ) { 

			$('#sortings').change(function() { 

				document.getElementById('comment_loader').innerHTML = "<img src='images/loading 2.gif' >";
			 	$('#comments_result').text('');
			  
				var optionSelected = $(this).val(); 
				// alert(optionSelected);



	 			ajax_insert_and_append_result(
					'comments_result',
					'look_comment_items/look-comments_display.php?post_comment=sort&sort_as='+optionSelected,
					'#comment_loader'
				);
	 		// 	ajax_send_data(
	 		// 		'comments_result',
				// 	'look_comment_items/look-comments_display.php?post_comment=sort&sort_as='+optionSelected
				// );



			});
		}



		/*
		function comment_box_hit_enter( plno ) { 
			
			alert('plno');
			$('#comment_box').keydown(function (e) { 
				
				var plno = $('#plno_post_comment').text();
				var isLog = $('#isLog').text();
				var logInpage = 'login'; 
			    var code = (e.keyCode ? e.keyCode : e.which);
		  	 	alert('typing.. plno = '+plno); 
		  		if ( isLog == 'logIn') 
		  		{
		  			// alert(' login')
		  		    if (code == 13)  {  

				  	  	var comment = $(this).val( );
				  	   	// var plno = 137;   
				  	   	// alert('enter hit'+' comment = '+comment+' plno = '+plno );
				  	   	$('#comment_post_loader img').css('display','block'); 

				  	   	if ( comment != ' ' || comment != '  ' || comment != '   ' ) 
				  	   	{ 
					  	   	// document.getElementById('comment_loader').innerHTML = "<img src='images/loading 2.gif' >";
			
					  	    // ajax_insert_and_append_result(
					  	    // 	'comments_result',
					  	    // 	'fs_folders/fs_lookdetails/look_comment_items/data/save_comment.php?comment='+comment+'&plno='+plno,
					  	    // 	'#comment_post_loader'
					  	    // );

							// $('#comment_post_loader img').css('display','block'); 
							alert('plno ='+plno)
					  	    ajax_insert_and_append_result('comments_result','fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=posted_a_comment&comment='+comment+'&plno='+plno,'#comment_post_loader1 img');
			 				$(this).val('');
			 				var p = $("#viewmore_comments");
			 				var offset = p.offset();
			 			}
			  		}
			  		else{ 
			  		}
			  	}
			  	else {
			  		alert('Please Login First');
			  		Go(logInpage);
			  	}
			});
		}
		*/
	})
	function load_show_reply_comment_box() {  
		// hide_reply_comment_not_yet_flagged ( ); 
		alert('hellow')
		$('.flag_main_container').fadeIn('fast');
		$('body').css({'overflow':'hidden'});
		$('.bgcolor').css({'display':'block'});
		$('.replybox').css({'display':'block'});
		$('.already_flagged_div').css({'display':'none'});
		$('.not_yet_flagged_table').css({'display':'none'});		   
		$('.replybox').css({'display':'block'});
		$('.bgcolor').css({'display':'block'});
		$('.flag_main_container').css({'display':'block'});
	}


 
