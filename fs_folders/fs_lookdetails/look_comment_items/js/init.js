  
// new init 
	var click_like=0;
	var last_cid = 0;
	var like_id = 'like_';
	var ntac = '.text_area_notes';
	var rntc = '.reply_text_area_notes';
	var checkbox_1=0,checkbox_2=0,checkbox_3=0;
	var fc = 'res'; 
	var plcno1 = 0;
 
// end init 
function post_comment ( plno ) {   

	// alert(' plno =  '+plno);  
	var isLog = $('#isLog').text(); 
	var logInpage = 'login';

	// alert(plno)
	if ( isLog == 'logIn') {  

	 	var comment = $('#comment_box').val(); 
	 	var clen = comment.length;

	 	// alert(' len = '+clen+'post a comments plno = '+plno);  
	 	var comment = comment.replace("&", "[ampersand]"); 

	 	
	 	if ( clen > 0 ) { 
		 	// alert('post a comment');
		 	// $('#comment_post_loader img').css('display','block'); 
		 	// document.getElementById('comment_loader').innerHTML = "<img src='fs_folders/images/attr/loading 2.gif' >";
		 	// ajax_insert_and_append_result('comments_result','look_comment_items/data/save_comment.php?comment='+comment+'&plno='+plno,'comment_loader');
		 	// ajax_send_data ( 'comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/save_comment.php?comment='+comment+'&plno='+plno ); 
		 	// ajax_insert_and_append_result('comments_result','fs_folders/fs_lookdetails/look_comment_items/data/save_comment.php?comment='+comment+'&plno='+plno,'#comment_post_loader');
		 	ajax_insert_and_append_result('comments_result','fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=posted_a_comment&comment='+comment+'&plno='+plno,'#comment_post_loader1 img');
		}
		else{ 
		}
	}
	else { 
		alert('Please Login First');
		Go(logInpage);
	} 
 	// alert('done insert!'); 
 	// ajax_insert_and_append_reply 
 	$('#comment_box').val('');
	if (clen > 0 ) { 
		setTimeout(function(){
	 		ajax_insert_and_append_result('comments_result','look_comment_items/look-comments_display.php?post_comment=posted_a_comment','comment_loader');
 	 	},
	 	2000);
	}else { 
		document.getElementById('comment_loader').innerHTML = "";
	}  
}  
function look_comment_attr_clicked( value ) { 

	// alert('comment attr clicked');
	var isLog = $('#isLog').text();
	var logInpage = '../betatest/login.php';
 



 	if (isLog =='logIn') 
 	{
 
	 	
		// alert(value);




	    // alert('comment attr value =  ['+value+'] indexOf _ = '+value.indexOf("_")+' len = '+value.length);
		var id = value.substring(value.indexOf("_")+1,value.length);
		var action_type = value.substring(0,value.indexOf("_"));
		// alert(' comment id = '+id+' comment action = '+action_type);
		var img_like_id = '#img_like_'+id;
		var img_dislike_id = '#img_dislike_'+id;


		// alert(action_type);
		if (action_type == 'reply')
		{
		 	// separate two Id's
		 	var replied_no = id.substring(id.indexOf("-")+1,id.length);
		 	var id1 = id.substring(0,id.indexOf("-"));
		 	// alert('plcno = '+id1+'replied_no = '+replied_no);


		 	id = id1;
		}
		if (action_type == 'profile')
		{ 
			 	
			document.location='profile?id='+id;
		}
		else if (action_type == 'like') 
		{ 
			// alert('you like me!');
			if (id!=0) { 
				if ($(img_like_id).attr('class') == 'disabled_like') { 
				}
				else {
				 	$(img_like_id).attr('src','fs_folders/images/icons/Thumbs-up-green.png');
					$(img_dislike_id).attr('src','fs_folders/images/icons/Thumbs-down.png'); // change image
					ajax_send_data('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/like.php?plcno='+id); //saving the like
				}
				$(img_dislike_id).attr('class','disabled_dislike');
			}
		}else if (action_type == 'dislike')
		{
			// alert('you dislike me!');
			if (id!=0) {
				if ($(img_dislike_id).attr('class') == 'disabled_dislike') { 
				}
				else {  
					$(img_dislike_id).attr('src','fs_folders/images/icons/Thumbs-down-green.png');
					$(img_like_id).attr('src','fs_folders/images/icons/Thumbs-up.png'); // change image
					ajax_send_data('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/dislike.php?plcno='+id); //saving the dislike 
				}
				$(img_like_id).attr('class','disabled_like');
			}
		}else if (action_type == 'reply')
		{ 

			$('#res').text('replied_no = '+replied_no+' comment id =  '+id+' open text area main comment');
			$('.TA_main_comment_reply_div'+id).slideDown('fast');
			$('.TA_main_comment_edit_div'+id).slideUp('fast');
			$('.TA_main_comment_flag_div'+id).slideUp('fast');
			$(".TA_main_comment_reply"+id).val('');
			// $(".TA_main_comment_reply"+id).val('replied_no = '+replied_no+' comment id =  '+id+' input you reply here');
 
			/*
				hide_comment_edit ( );
			    show_reply_box();
			    send_data_to_Comment_box(id , replied_no);
			*/
		}else if (action_type == 'edit' || value == 'comment_edit_save' )
		{ 


			//  clean textarea first 
				$(".TA_main_comment_edit"+id).val(''); 
		    //new hide and show container 

		     	var current_comment = $('#comment_span_'+id).text()
		    	$(".TA_main_comment_edit"+id).val(current_comment);
			    $('#res').text('main comment number = '+id+' close text area main comment');
			    $('.TA_main_comment_edit_div'+id).slideDown('fast');
			   	$('.TA_main_comment_reply_div'+id).slideUp('fast');
			   	$('.TA_main_comment_flag_div'+id).slideUp('fast');
			//end hide and show container 

			 





		   /*
		    if ( value == 'comment_edit_save') {
		    	var id = sessionStorage.id1;
		    	// show_comment_edit (id);
		    	// alert  ( ' saving comment edit ');

		    	hide_reply_not_yet_flagged_box ( ) ; 

		    	var commentEdited = get_new_edit_comment( );
		    	// alert(commentEdited);
		    	ajax_send_data('res','look_comment_items/data/edit_save.php?plcno='+id+'&commentEdited='+commentEdited);
		    	set_new_edit_comment( commentEdited , id );
	 
		    } 
		    else { 
		    	show_comment_edit (id);
		    	sessionStorage.id1 = id;
		    }

			*/
		}
		else if (action_type == 'flag')
		{ 

			// alert('flag cno = '+id+' value id = '+value);

			$('#res').text('flagged comment = '+id);



			$(".TA_main_comment_reply_div"+id).css('display','block');


			$('.TA_main_comment_flag_div'+id).slideDown('fast');
			$('.TA_main_comment_reply_div'+id).slideUp('fast');
			$('.TA_main_comment_edit_div'+id).slideUp('fast');
			// alert('mc flagging');
			 
			bool_show_hide( 
				'comment_post_area',
				'fs_folders/fs_lookdetails/look_comment_items/data/flag_checker.php?plcno='+id,
				'.flagged'+id, 
				'.notflagged'+id,
				'no loader yet'
				);
			
			// $('.notflagged'+id).css('display','none');
 

			// bool(view_result_id,
			// 	data,
			// 	hideTrue,
			// 	showTrue,
			// 	hideFalse,
			// 	showFalse,
			// 	loader
			// ) 




			 // $(".TA_main_comment_flag"+id).val('flagged comment = '+id);


			/*	
				if (value == "flag_send_from_box") {
					 var id=sessionStorage.plcno; 
					// alert('flag_send_from_box plcno = '+id);
					var flag_note = $(ntac).val();
		 			set_check_boxes();
		    		var cboxes = checkbox_1+'_'+checkbox_2+'_'+checkbox_3;
		    		 ajax_send_data('res','look_comment_items/data/flag_save.php?plcno='+id+'&cbox='+cboxes+'&flag_note='+flag_note);

					restore_check_box();
				}else { 
					// alert(' else store session plcno ='+id);
					sessionStorage.plcno=id;  
		 			document.getElementById('loader').innerHTML = "<img src='images/loading 2.gif' >";
					ajax_Send_on_flag_box('res','look_comment_items/data/flag_checker.php?plcno='+id,'loader');
				}
			*/
		}
	}
	else 
	{ 
		alert('Please Login First');
		// Go(logInpage);
		alert(isLog);
	}
} 
function comment_Reply_Attr_Clicked( value ) { 

	var isLog = $('#isLog').text();
	var logInpage = '../betatest/login.php';
 

 	if (isLog =='logIn') 
 	{
		var plcrno = value.substring(value.indexOf("_")+1,value.length);
		var reply_action_type = value.substring(0,value.indexOf("_"));
		// alert('replyId = '+plcrno+' reply_action_type =  '+reply_action_type);

		var rimg_like_id = '#rimg_like_'+plcrno;
		var rimg_dislike_id = '#rimg_dislike_'+plcrno;

		// alert(value+'reply action = '+reply_action_type+' plcrno = '+plcrno);
		if (reply_action_type == 'replyLike') 
		{
			// alert('you liked the comment');
	 		
	 		// alert( $(rimg_like_id).attr('class'));
	 		
	 		if ( $(rimg_dislike_id).attr('class') == 'rated') { 
				// alert('already rated');
			}else{  
				$(rimg_like_id).attr('src','fs_folders/fs_lookdetails/look_comment_items/img/like_green.jpg');
				$(rimg_like_id).attr('class','rated'); 
				ajax_send_data('res','fs_folders/fs_lookdetails/look_comment_items/data/reply.php?&status=replyLike&plcrno='+plcrno);
			}
		} 
		else if (reply_action_type == 'replyDisLike') 
		{
			// alert('you Dislike the comment');

			if ( $(rimg_like_id).attr('class') == 'rated') { 
				// alert('already rated');
			}else{  
				$(rimg_dislike_id).attr('src','fs_folders/fs_lookdetails/look_comment_items/img/unlike_green.jpg');
				$(rimg_dislike_id).attr('class','rated'); 
				ajax_send_data('res','fs_folders/fs_lookdetails/look_comment_items/data/reply.php?&status=replyDisLike&plcrno='+plcrno);

			}
		} 	
		else if (reply_action_type == 'replyFlag' || value == 'reply_flag_send_from_box') 
		{

			// alert('flag = '+plcrno)

			bool_show_hide( 
				'comment_post_area',
				'fs_folders/fs_lookdetails/look_comment_items/data/reply.php?plcrno='+plcrno+'&status=check_flag',
				'.flaggedReply'+plcrno, 
				'.notflaggedReply'+plcrno,
				'no loader yet'
			);


			$(".TA_main_comment_reply_div_reply"+plcrno).slideUp('fast');
			$(".TA_main_comment_edit_div_reply"+plcrno).slideUp('fast');
			$(".TA_main_comment_flag_div_reply"+plcrno).slideDown('fast');
			
			







			// TA_main_comment_reply_reply
			// TA_main_comment_reply_button_reply


			// TA_main_comment_edit_reply
			// TA_main_comment_edit_button_reply

			
			TA_main_comment_flag_reply
			TA_main_comment_flag_button_reply



			// alert('you flag the comment');

			// show_reply_not_yet_flagged_box();
			// ajax_send_data('res','look_comment_items/data/reply.php?&status=check_flag&plcrno='+plcrno);

			/*
			if (value == "reply_flag_send_from_box") {
				// alert('save reply flagged');
				// // alert('flag_send_from_box plcno = '+id);
				// plcrno = 1;
				plcrno = sessionStorage.plcrno;
				var flag_note = $(rntc).val();
	 			set_check_boxes();
	    		var cboxes = checkbox_1+'_'+checkbox_2+'_'+checkbox_3; 
	    		// alert('check boxes = '+cboxes+'note = '+flag_note);
	    		// ajax_send_data('res','look_comment_items/data/reply.php?&status=check_flag&plcrno='+plcrno);
	    		ajax_send_data('res','look_comment_items/data/reply.php?&status=replySaveFlag&plcrno='+plcrno+'&flag_note='+flag_note+'&cboxes='+cboxes);
	    	
	    		hide_reply_not_yet_flagged_box ( );
	    		restore_check_box();
				set_unchecked_checkbox();
	    		setEmpty();
			} 
			else { 
				sessionStorage.plcrno = plcrno;
				reply_flagged_ajax( 'res','look_comment_items/data/reply.php?&status=check_flag&plcrno='+plcrno, 'loader' );
				 

			}
			*/
		} 	
		else if (reply_action_type == 'replyEdit' || value == 'reply_edit_save') 
		{	
			// alert('sdsds');
			// alert(current_comment);
			var current_comment = $('#rcomment_span_'+plcrno).text()
			$(".TA_main_comment_edit_reply"+plcrno).val(current_comment);
			


			$(".TA_main_comment_reply_div_reply"+plcrno).slideUp('fast');
			$(".TA_main_comment_edit_div_reply"+plcrno).slideDown('fast');
			$(".TA_main_comment_flag_div_reply"+plcrno).slideUp('fast');






			
			// alert('you edit the comment');
			/*
			if (value == 'reply_edit_save' ) {

				plcrno = sessionStorage.plcrno;
				replace_edited_replied_text( plcrno )
				replyEdited=$('#rcomment_span_'+plcrno).text();

				ajax_send_data('res','look_comment_items/data/reply.php?&status=replyEdit&plcrno='+plcrno+'&replyEdited='+replyEdited);
				hide_overlay_container ( );

			}else { 
				show_reply_edit ( );
				get_comment_reply_edit ( plcrno );
				sessionStorage.plcrno = plcrno;
			}
			*/
		} 	
		else if (reply_action_type == 'replyReply') 
		{
		 	$(".TA_main_comment_reply_div_reply"+plcrno).slideDown('fast');
			$(".TA_main_comment_edit_div_reply"+plcrno).slideUp('fast');
			$(".TA_main_comment_flag_div_reply"+plcrno).slideUp('fast');	
		} 	
		else if (reply_action_type == 'replyDelete') 
		{
			// alert('you delete the comment');
			var rc = confirm('You really want to delete this replied comment ?');
			if ( rc ) {
				hide_reply_comment(plcrno);
				
				ajax_send_data('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/reply.php?&status=replyDelete&plcrno='+plcrno);

			}
			else { 
				// alert('comment cancelled to delete');
			}
		} 	
	}
	else 
	{ 
		alert('Please Login First');
		Go(logInpage);
	}
}
function hide_reply_comment( plcrno ) { 
	// alert(plcrno);
	$('#replied_comment_table_'+plcrno).fadeOut('normal');
	$('.rline_'+plcrno).fadeOut('normal');
}	 
function delete_comment( id ) { 
	// alert(' id = '+id+'c = '+c);
	var d = confirm('You really want to delete this comment ?')
	if(d) {  
		$('#comment_list_'+id).slideUp('normal');
		// alert('comment deleting');
		ajax_send_data('res','fs_folders/fs_lookdetails/look_comment_items/data/delete.php?plcno='+parseInt(id));

	}
}
function viewReplies( plcno ) {   
	// alert(plcno);
	var optionSelected = $('#sortings').val(); 
	// alert(optionSelected);	

	// alert($('.viewReplies_'+plcno).text());
	


	var text = $('.viewReplies_'+plcno).text();
 
	if (text == 'View replies') {
		
		$('#replyContainer_'+plcno).slideDown('normal');
		$('.viewReplies_'+plcno).text('Hide replies');

		// document.getElementById('reply_loader_'+plcno).innerHTML = "<img src='images/loading 2.gif' style='height: 20px;   width:100%; ' >";

		// ajax_send_data(
		// 'replyContainer_'+plcno,
		// 'look_comment_items/reply.php?plcno='+plcno+'&sort='+optionSelected+'&view=start',
		// 'reply_loader_'+plcno
		// );
 		// alert(plcno);
		ajax_send_data(
		'replyContainer_'+plcno,
		'fs_folders/fs_lookdetails/look_comment_items/test1.php?plcno='+plcno,
		'reply_loader_'+plcno
		);

	}else {  
		 
		$('#replyContainer_'+plcno).slideUp('normal');
		$('.viewReplies_'+plcno).text('View replies');  
		
	} 
  	// alert($('.viewReplies_'+plcno).attr("id"));

  	// if ( $('.viewReplies_'+plcno).attr("id") == 'comment_loaded' ) {
  	// 	// alert('no loading to the database!');
  	// }
  	// else {  
  		// alert('loading to the database!');
		// document.getElementById('reply_loader_'+plcno).innerHTML = "<img src='images/loading 2.gif' style='height: 20px;   width:100%; ' >";

		// ajax_insert_and_append_result(
		// 	'replyContainer_'+plcno,
		// 	'look_comment_items/reply.php?plcno='+plcno+'&sort='+optionSelected+'&view=start',
		// 	'reply_loader_'+plcno
		// );  

		// ajax_send_data(
		// 'replyContainer_'+plcno,
		// 'look_comment_items/reply.php?plcno='+plcno+'&sort='+optionSelected+'&view=start',
		// 'reply_loader_'+plcno
		// );
		// document.getElementById('reply_loader_'+plcno).innerHTML = "";

		
		// $('.viewReplies_'+plcno).attr("id","comment_loaded");

	// }
}
function set_check_boxes( ) { 
	

    if($(".check_box1").is(':checked')) 
	 	checkbox_1 = 1;
	if($(".check_box2").is(':checked')) 
		checkbox_2 = 1;
	if($(".check_box3").is(':checked'))
    	checkbox_3 = 1;
}
function restore_check_box( ) { 
	checkbox_1 = 0;
	checkbox_2 = 0;
	checkbox_3 = 0;
}
function show_reply_box( ) { 
	hide_reply_edit ( );
	hide_reply_comment_not_yet_flagged ( )
	$('.flag_main_container').fadeIn('fast');
	$('body').css({'overflow':'hidden'});
	$('.bgcolor').css({'display':'block'});
	$('.replybox').css({'display':'block'});
	$('.already_flagged_div').css({'display':'none'});
	$('.not_yet_flagged_table').css({'display':'none'});
	// $('.text_area_notes').val('');
	$('.replyTextArea').val('');
}
function send_data_to_Comment_box(id , replied_no ) { 


	if (  replied_no == 0 ) {
		// alert('main comment!');
		// from main comment
		// display main comment
		
	  	var cname = $('#full_name_'+id).text();
	  	var ccomment = $('#comment_'+id).text();

	    $('#commentor_name').text(cname+' : ');
	    $('#ccomment').text(ccomment);
	    $('.cid').text(id);
	    $('.replied_no').text(replied_no);		
	    
	}else { 
		// alert('replied comment!');
		// this is not from main comment
		// get reply comment info and display

	  	var rname = $('#rfull_name_'+replied_no).text();
	  	var rcomment = $('#rcomment_'+replied_no).text();

		$('#commentor_name').text(rname+' : ');
	    $('#ccomment').text(rcomment);
	    $('.cid').text(id);
	    $('.replied_no').text(replied_no);		
	    


	}
}
function mainCommentShowMore( id ) { 
	// alert('show more clicked! ');

	$('#viewmore_'+id).css({'display':'none'});
	document.getElementById('comment_loader').innerHTML = "<img src='images/loading 2.gif' >";
	ajax_insert_and_append_result(
		'comments_result',
		'look_comment_items/look-comments_display.php?post_comment=sort',
		'#comment_loader'
	);
	// alert('append now for view more !');
}
function replyCommentShoreMore ( plcno,c ) { 
  
	// alert('plcno = '+plcno+' c = '+c);

	$('.replyCommentShoreMore_'+c).css({'display':'none'});
	document.getElementById('reply_loader_'+plcno).innerHTML = "<img src='images/loading 2.gif' style='height: 20px;   width:100%; ' >";

	ajax_insert_and_append_result(
		'replyContainer_'+plcno,
		'look_comment_items/reply.php?view=viewMore&plcno='+plcno,
		'#reply_loader_'+plcno
	); 
}
function replied_name_hover( id , mcid ) { 
	// alert('replied name hover id = '+id+' mcid = '+mcid);
	if ( id == 0 ) { 
		$('#full_name_'+mcid).css({'color':'#FF0000','font-weight:':'bold' });
	}else {   
		$('#rfull_name_'+id).css({'color':'#FF0000','font-weight:':'bold' });
		$('#rrfull_name_'+id).css({'color':'#FF0000','font-weight:':'bold' });
	}
}
function replied_name_leaved ( id , mcid ) { 
	// alert(' replied name leaving = '+id+' mcid = '+mcid);
	if ( id == 0 ) { 
		$('#full_name_'+mcid).css({'color':'#2c5cab','font-weight:':'bold' });
	}else {  
		$('#rfull_name_'+id).css({'color':'#2c5cab','font-weight:':'bold' });
		$('#rrfull_name_'+id).css({'color':'#2c5cab','font-weight:':'bold' });
	}
}
function autopost_reply( plcrno ) { 
	// var plcno_res = '#autopost_'+plcrno;
	// alert('init = '+plcno_res)
	$('#autopost_'+plcrno).css('color','yellow');
}
function send_data ( data , hideEl , TA , id , activity , plcno  , isReplyIndented , page , table_id , table_name ) {
	// alert('isReplyIndented = '+isReplyIndented);
	var commentField = $(TA).val();
	$(hideEl).slideUp('fast');	 	 
	$('#res').text("data = "+data+" hide element = "+hideEl+'act='+activity+' plcno = '+plcno);



	// alert( 'asdasd' )
	if ( activity == 'reply' ) {
		// alert('reply save !');
		// alert('reply');
		
		// var rcomment = 'test';
		// ajax_send_data ('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/reply_save_comment.php?rcomment='+commentField+'&plcno='+id+'&commentType=mainReply');
		
		prepend ('replyContainer_'+id,'fs_folders/fs_lookdetails/look_comment_items/data/reply.php?rcomment='+commentField+'&plcno='+id+'&status=replySave');
	}	 
	else if( activity == 'reply of a reply' ) {
		// alert('activity == reply of  a reply  save replied comment = '+commentField +' id = '+ id)
		prepend ('autopost_'+id,'fs_folders/fs_lookdetails/look_comment_items/data/reply.php?rcomment='+commentField+'&replied_no='+id+'&plcno='+plcno+'&isReplyIndented='+isReplyIndented+'&status=replySave');
	}  
	else if ( activity == 'edit' ) {

		// alert('edit')
		if (commentField.length  > 0)
		{  
			$('#comment_span_'+id).text(commentField);
 
			if ( page == 'detail' ) {  
				var data = 'action=modal-comment-send&type=edite-save&comment='+commentField+'&table_id='+table_id+'&table_name='+table_name+'&page='+page;   
				ajax_send_data( 
					'fs-general-ajax-response' ,  
					'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
					'modal-comment-loader-test'+id,
					'modal-comment'
				);      
			}
			else{ 
				ajax_send_data ('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/edit_save.php?commentEdited='+commentField+'&plcno='+id+'&commentType=mainComment');
			}
		}
		else 
		{
			alert('Empty field is not allowed')
		}
	}
	else if ( activity == 'edit of a reply' ) { 

		// alert('edit of a reply id = '+id)
		// alert(commentField);
		if (commentField.length  > 0)
		{  
			$('#rcomment_span_'+id).text(commentField);
			ajax_send_data ('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/reply.php?replyEdited='+commentField+'&plcrno='+id+'&status=replyEdit');
		}
		else 
		{
			alert('Empty field is not allowed')
		}
	}
	else if ( activity == 'flag' ) {

		checkbox_1 = 0;
		checkbox_2 = 0;
		checkbox_3 = 0;
		
	 	if($(".check_box1"+id).is(':checked')) 
		 	checkbox_1 = 1;
		if($(".check_box2"+id).is(':checked')) 
			checkbox_2 = 1;
		if($(".check_box3"+id).is(':checked'))
			checkbox_3 = 1;

		
		var cboxes = checkbox_1+'_'+checkbox_2+'_'+checkbox_3;

		// alert(checkbox_1+'_'+checkbox_2+'_'+checkbox_3);
		// $('.check_box1').attr('checked', false);
		// $('.check_box2').attr('checked', false);
		// $('.check_box3').attr('checked', false);


		 	
	    ajax_send_data ('comment_sending_result','fs_folders/fs_lookdetails/look_comment_items/data/flag_save.php?plcno='+id+'&cbox='+cboxes+'&flag_note='+commentField);

		// alert('flag feedback = '+commentField);
	}
	else if ( activity == 'flag of a reply' ) { 
		checkbox_1 = 0;
		checkbox_2 = 0;
		checkbox_3 = 0;
		
	 	if($(".check_box1Reply"+id).is(':checked')) 
		 	checkbox_1 = 1;
		if($(".check_box2Reply"+id).is(':checked')) 
			checkbox_2 = 1;
		if($(".check_box3Reply"+id).is(':checked'))
			checkbox_3 = 1;


		var cboxes = checkbox_1+'_'+checkbox_2+'_'+checkbox_3; 
		ajax_send_data (
			'comment_sending_result',  
			'fs_folders/fs_lookdetails/look_comment_items/data/reply.php?plcrno='+id+'&cboxes='+cboxes+'&flag_note='+commentField+'&status=replySaveFlag'
		); 

		// alert('flag of a reply'+cboxes+' id = '+id+' commentField = '+commentField+' ' ); 
	} 
}