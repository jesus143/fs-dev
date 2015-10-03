	function b1 ( ) {   	
	 	 hide_popUp ( ) 	 
	}
	function b2 () { 
 	 	$("#popUp-container").css({"display":"block"});
 	 	Go("/")  
	} 
	function show_popUp ( res , data , loader ) { 
		$("#"+res).text(""); 
		ajax_send_data( res , data , loader ); 
		var cpos = $(window).scrollTop();
		cpos =  parseInt(cpos);
		cpos = cpos+115; 
		var docH = $(document).height(); 
		$("#popUp-container").fadeIn("fast");
 	 	$("body").css({"overflow":"hidden"});  
 	 	$("#popUp-container").css({"height":docH+"px"});
 	 	$("#popUp-padding-top").css({"padding-top":cpos+"px"});
	}
	function hide_popUp ( )  {  
	 	$("body").css({"overflow":"visible"}); 
	 	$("#popUp-container").fadeOut("fast"); 
	} 
	function close_clear_content ( ) {
		$("body").css({"overflow":"visible"}); 
	 	$("#popUp-container").fadeOut("fast");
	 	$("body input[type='text']").val("");
	 	$("body input[type='']").val("");
	 	$(".textarea").val(""); 
	 	$('#td_selected span').text("SELECT");
	}   
	function gen_popup_check_invited_info( type ) {  
		var fn = $("#popup_invited_fn_and_ln").val()
		var email = $("#popup_invited_email").val(); 
		// alert("name = "+fn+" email =  "+email);
		if (fn == "FIRST NAME & LAST NAME(*)") {
			alert("Your First Name & Last Name Required");
		} 
		else if (email == "E-MAIL(*)") { 
		 	alert("Your E-MAIL Required");
		}
		else if (email != "E-MAIL")  
		{ 
			var atpos=email.indexOf("@");
			var dotpos=email.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
			  	alert("Not a valid e-mail address");	
			  	return false;
			} else  {  


				$("#gen-popup-wrapper").fadeOut("slow");   
				// document.location="invite?invite_from_otherpage=true&fn="+fn+"&email="+email;  
				// ajax_send_data 
				ajax_send_data( 'popup_res' , 'fs_folders/fs_popUp/popUp_php_file/save_popupinvite_info.php?fn='+fn+'&email='+email+'&type='+type, '' ); 
				

				setTimeout(function( ) { 
					$('#fn').text(fn);
					set_center( '#invite-popup-response-wrapper');	
					$('#invite_after_submit').fadeIn("slow");  
				},1000) 
				// alert("show thank you popup!");
				sessionStorage.popupInviteUserRegistered = 'true'; 

				return true; 
			}
		}
		return false;
	} 