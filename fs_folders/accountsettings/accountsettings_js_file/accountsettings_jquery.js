$(document).ready(function( ) { 
	accountsettings_profile ( );
	function accountsettings_profile ( ) {
		// full name
			field_focused_isEmpty_then_hide_text ( "#profile-firstname-field" , "Your Firstname"    , "#ccc" , "#a11921" , "" );   
			field_focused_isEmpty_then_hide_text ( "#profile-nickname-field"  , "Your Nickname / Alias"     , "#ccc" , "#a11921" , "" );
			field_focused_isEmpty_then_hide_text ( "#profile-lastname-field"  , "Your Lastname"     , "#ccc" , "#a11921" , "" );    
		// username
			field_focused_isEmpty_then_hide_text ( "#profile-username-field" , "username"    , "#ccc" , "#a11921" , "" );  
		// about 
			field_focused_isEmpty_then_hide_text ( "#profile-about-field" , "tell something about you"    , "#ccc" , "#a11921" , "" );  
		//  work
			field_focused_isEmpty_then_hide_text ( "#profile-work-field"  , "Where do you work?"    , "#ccc" , "#a11921" , "" );  
		//  email 
			field_focused_isEmpty_then_hide_text ( "#profile-email-field"  , "your email"    , "#ccc" , "#a11921" , "" );  
		//  email 
			field_focused_isEmpty_then_hide_text ( "#profile-website-field"  , "Your Website"    , "#ccc" , "#a11921" , "" );  
		// location 
			field_focused_isEmpty_then_hide_text ( "#profile-location-country-field"        , "country"           , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-location-stateprovince-field"  , "state/province"    , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-location-city-field"           , "city"              , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-location-zip-field"            , "zipcode"           , "#ccc" , "#a11921" , "" );   
		// occupation     
			field_focused_isEmpty_then_hide_text ( "#profile-occupation-field"  , "Tell Us Your Occupation"       , "#ccc" , "#a11921" , "" );  
		//  study
		 	field_focused_isEmpty_then_hide_text ( "#profile-where_scholl_u_go-field" , "what high school / collage or university you attended?" , "#ccc" , "#a11921" , "" );
		 	field_focused_isEmpty_then_hide_text ( "#profile-what_did_you_study-field" , "what did you study?"    , "#ccc" , "#a11921" , "" );  
		// social accounts
			field_focused_isEmpty_then_hide_text ( "#profile-socialaccount-facebook-field"  , "Facebook"    , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-socialaccount-twitter-field"   , "Twitter"    , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-socialaccount-pinterest-field" , "Pinterest"    , "#ccc" , "#a11921" , "" );  
			field_focused_isEmpty_then_hide_text ( "#profile-socialaccount-instagram-field" , "Instagram"    , "#ccc" , "#a11921" , "" );  
	}  
	// temporary disabled for the dynamic change of content no loading.
	// function accountsettings_tabs (   ) {  
	// 	var CleanAllTab = "#accountsetting-profile ,  #accountsetting-select_brands ,  #accountsetting-suggested_members ,  #accountsetting-invite_friends , #accountsetting-notification , #accountsetting-preferences";
 // 		var hideContent = "#accountsetting-wrapper-container-table-body-right-select_brands , #accountsetting-wrapper-container-table-body-right-profile ,#accountsetting-wrapper-container-table-body-right-suggested_members , #accountsetting-wrapper-container-table-body-right-invite_friends ,#accountsetting-wrapper-container-table-body-right-notification , #accountsetting-wrapper-container-table-body-right-preferences" ;  
	// 	$("#accountsetting-profile").click(function( ) { 
	// 		// alert("profile"); 
	// 		change_color_text_cliked ( "#accountsetting-profile" , CleanAllTab , "#c51d20" , "#cccbc9"  );  
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-profile" , hideContent );
	// 	}) 
	// 	$("#accountsetting-select_brands").click(function( ) {
	// 		// alert("select_brand"); 
	// 		change_color_text_cliked ( "#accountsetting-select_brands" , CleanAllTab , "#c51d20" , "#cccbc9"  )  
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-select_brands" , hideContent );
	// 	})
	// 	$("#accountsetting-suggested_members").click(function( ) {
	// 		// alert("suggested_member"); 
	// 		change_color_text_cliked ( "#accountsetting-suggested_members" , CleanAllTab , "#c51d20" , "#cccbc9"  ) 
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-suggested_members" , hideContent );
			
	// 	})
	// 	$("#accountsetting-invite_friends").click(function( ) {
	// 		// alert("invite_friends"); 
	// 		change_color_text_cliked ( "#accountsetting-invite_friends" , CleanAllTab , "#c51d20" , "#cccbc9"  ) 
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-invite_friends" , hideContent );
	// 	})
	// 	$("#accountsetting-notification").click(function( ) {
	// 		// alert("notifications"); 
	// 		change_color_text_cliked ( "#accountsetting-notification" , CleanAllTab , "#c51d20" , "#cccbc9"  ) 
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-notification" , hideContent );
	// 	})
	// 	$("#accountsetting-preferences").click(function( ) {
	// 		// alert("preferences"); 
	// 		change_color_text_cliked ( "#accountsetting-preferences" , CleanAllTab , "#c51d20" , "#cccbc9"  )
	// 		show_specific_hide_not_used_content ( "#accountsetting-wrapper-container-table-body-right-preferences" , hideContent );
	// 	})  
	// }  
 	function show_specific_hide_not_used_content ( showContent , hideContent ) { 
 		$(hideContent).css({"display":"none"});
 		$(showContent).css({"display":"block"}); 
 	}
	function  change_color_text_cliked ( tabClickedIdClass , CleanAllTab , colorCliked , defualtColor  )  {  
		$(CleanAllTab).css({"color":defualtColor});
		$(tabClickedIdClass).css({"color":colorCliked}); 
	}   
	//  new profile pic avatar 
	
		/*
		    var img_prev = "#img_prev";
		    var uploadFile = "f_image"; 
		    $("#"+uploadFile).change(function () {
		        var fileObj = this,
		            file; 
		        if (fileObj.files) {
		            file = fileObj.files[0];
		            var fr = new FileReader;
		            fr.onloadend = changeimg;
		            fr.readAsDataURL(file)
		        } else {
		            file = fileObj.value;
		            changeimg(file);
		        } 
	 			
		    }); 

		

	    function changeimg(str) {
	    	 
	        if(typeof str === "object") {
	            str = str.target.result; // file reader
	        }
	        $(img_prev).attr("src",str); 

	        $('#upload-profile-pic').submit();
	    } 

		$("#avatar-right-delete").click(function ( ) { 
			$(img_prev).attr("src","fs_folders/images/uploads/members/default_avatar.png"); 
		}) 

		*/

	


	
	$(document).ready(function(){   


		/* 
			set profile minimum width allowed to the server
		*/ 
			var min_width_profile = 200;
		/*  
			set timeline minimum width allowed to the server  
		*/
			var min_width_timeline = 500;

		// NEW PROFILE
			function readImage2(file) {
                alert('clicked');
		        var reader = new FileReader();
		        var image  = new Image(); 
		        reader.readAsDataURL(file);  
		        reader.onload = function(_file) {
		            image.src    = _file.target.result;              // url.createObjectURL(file);
		            image.onload = function() {
		                var w = this.width,
		                    h = this.height,
		                    t = file.type,                           // ext only: // file.type.split('/')[1],
		                    n = file.name,
		                    s = ~~(file.size/1024) +'KB';   


		                    if ( w >= min_width_profile ) {
		               			$('#upload-profile-pic').submit();   
								$( "#avatar-right-uploadprofile" ).trigger( "click" );
		               		}
		               		else{
		               			alert(' sorry minimum required size is '+min_width_profile+' x below but you have only '+w+' x '+h+ ' please try onother');   
		               		}
		            };
		            image.onerror= function() {
		                alert('Invalid file type: '+ file.type);
		            };      
		        }; 
		    }
		    $("#f_image_profile_pic").change(function (e) {

		        if(this.disabled) return alert('File upload not supported!');
		        var F = this.files;
		        if(F && F[0]) for(var i=0; i<F.length; i++) readImage2( F[i] );
		    });  


			// $('#f_image_profile_pic').change(function() { 
			// 	$('#upload-profile-pic').submit();  
			// });

		// END PROFILE
 
 


		// NEW UPLOAD TIME LINE

			function readImage1(file) { 
		        var reader = new FileReader();
		        var image  = new Image(); 
		        reader.readAsDataURL(file);  
		        reader.onload = function(_file) {
		            image.src    = _file.target.result;              // url.createObjectURL(file);
		            image.onload = function() {
		                var w = this.width,
		                    h = this.height,
		                    t = file.type,                           // ext only: // file.type.split('/')[1],
		                    n = file.name,
		                    s = ~~(file.size/1024) +'KB';  
		               		
		               		 if ( w >= min_width_timeline ) {
		               			$('#upload-profile-pic-timeline').submit();  
		               			var timeline_id = document.getElementById('avatar-right-uploadprofile'); 
								timeline_id.click();
		               		}
		               		else{
		               			alert(' sorry minimum required size is '+min_width_timeline+' x below but you have only '+w+' x '+h+ ' please try onother');   
		               		}


		            };
		            image.onerror= function() {
		                alert('Invalid file type: '+ file.type);
		            };      
		        }; 
		    }
		    $("#f_image_timeline").change(function (e) { 
		        if(this.disabled) return alert('File upload not supported!');
		        var F = this.files;
		        if(F && F[0]) for(var i=0; i<F.length; i++) readImage1( F[i] );
		    });  
		// END UPLOAD TIME LINE 
		}) 
		// $('#f_image_timeline').change(function() { 
		// 	$('#upload-profile-pic-timeline').submit(); 
		// }); 







		
	//  profile pic avatar
});