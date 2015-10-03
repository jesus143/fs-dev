function signup_clicked  ( ) { 
	// alert(' the sign up clicked ! '); 
	// set_center( '#popup-wrapper-body');	 
	set_center( '#popUp-container-gen' , 'gen_popup' );	
	$("#gen-popup-wrapper").fadeIn("fast");  
}  
function close_popup ( ) {  
 	$("#gen-popup-wrapper").fadeOut("normal");  
}  
$(document).ready(function( ) { 
	field_focused_isEmpty_then_hide_text ( "#popup_invited_email" ,"EMAIL(*)", "#cCC" , "#c51d20" ,  "" );
	field_focused_isEmpty_then_hide_text ( "#popuop_website_or_blog" ,"WEBSITE OR BLOG", "#cCC" , "#c51d20" ,  "" ); 
})  

function gen_popup_check_invited_info( type ) {  
	var wb = $("#popuop_website_or_blog").val()
	var email = $("#popup_invited_email").val(); 
	var fn = 'contestant'; 
  	if (email == "E-MAIL(*)") { 
	 	alert("Your E-MAIL Required");
	}
	else if (email != "E-MAIL")  
	{ 
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");

		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		  	alert("Not a valid e-mail address");	
		  	return false;
		} else {   

			$("#gen-popup-wrapper").fadeOut("slow");   
			// document.location="invite?invite_from_otherpage=true&fn="+fn+"&email="+email;  
			// ajax_send_data 
			ajax_send_data( 'popup_res' , 'fs_folders/fs_popUp/popUp_php_file/save_popupinvite_info.php?fn='+fn+'&email='+email+'&wb='+wb+'&type='+type, '' ); 
				$("#popuop_website_or_blog").val("WEBSITE OR BLOG");
			 	$("#popup_invited_email").val("EMAIL(*)"); 
			 	$("#popup_invited_email , #popuop_website_or_blog ").css("color","#ccc"); 
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