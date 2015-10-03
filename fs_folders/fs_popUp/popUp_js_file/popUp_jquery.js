   
 $(document).ready(function( ) { 
 	popup_info ( ); 
 	general_popup ( ); 
	
 	function  popup_info ( ) {
 	 
	 	$("#popUp_background , #popUp-padding-top").click(function(){ 
	 	 	// alert(" background hide") 
	 		$("#popUp-container").css({"display":"none"});
	 	 	$("body").css({"overflow":"visible"}); 
	 	}) 
	}
 	// new general popup 
 	function  general_popup ( ) {
	  
	 		var popupwrapper = "#gen-popup-wrapper";
		 	var popupcontainer = "#popUp-container-gen";
		 	var popupclose = "#popup-wrapper-body-close";

		 	field_focused_isEmpty_then_hide_text ( "#popup_invited_fn_and_ln" ,"FIRST NAME & LAST NAME(*)", "#cCC" , "#c51d20" ,  "" );
		 	field_focused_isEmpty_then_hide_text ( "#popup_invited_email" ,"E-MAIL(*)", "#cCC" , "#c51d20" ,  "" );
		 	$(popupclose).click(function ( ) {
		 	 	// alert("close me !");
		 	 	$(popupwrapper).fadeOut("normal");  
		 	 	sessionStorage.popupInviteCloseTimeInterval = 90000;  
		 	})  
		 	set_center( popupcontainer , 'gen_popup' ); //general popup set the position in the center of the windows. 

	 		var popupInviteCloseTimeInterval =  sessionStorage.popupInviteCloseTimeInterval; 
	 			popupInviteCloseTimeInterval = parseInt(popupInviteCloseTimeInterval);
	 		var popupInviteUserRegistered = sessionStorage.popupInviteUserRegistered; 
	 			// alert(" time interval after close = "+popupInviteCloseTimeInterval+" popup registered = "+popupInviteUserRegistered);
	 		if ( popupInviteUserRegistered == 'true') {
	 			// alert("user already registered! ");
	 		}else{ 
	 			if (  popupInviteCloseTimeInterval > 45000 ) {
	 				var popupshow =  90000;
	 				// var popupshow =  100;
	 				// alert("popup invite closed")
	 			}else{
	 				// alert("popup invite not closed yet! ")
	 				var popupshow =  45000;
	 				// var popupshow =  100;
	 			} 
		 		setTimeout(function() {
					// alert('start auto load now ');
					// $(popupwrapper).css({"display":"block"});
					$(popupwrapper).fadeIn("fast");
					 
				} ,popupshow); 
		 		// } , 1000); 
			}		 	

	}
 });  