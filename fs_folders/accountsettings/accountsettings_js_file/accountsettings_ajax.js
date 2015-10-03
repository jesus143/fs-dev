// alert("well done general !"); 

function init_account_settings( at ) {  
	// alert(at);  
	 /* 
	if ( at == 1 ) {
		$('#accountsetting-profile').css({'color':'#b32727'}); 
	}else if ( at == 2 ){ 
		$('#accountsetting-select_brands').css({'color':'#b32727'});
	}else if ( at == 3 ){ 
		$('#accountsetting-suggested_members').css({'color':'#b32727'});
	}else if ( at == 4 ){ 
		$('#accountsetting-invite_friends').css({'color':'#b32727'});
	}else if ( at == 5 ){ 
		$('#accountsetting-notification').css({'color':'#b32727'});
	}else if ( at == 6 ){ 
		$('#accountsetting-preferences').css({'color':'#b32727'});
	} 
	*/
} 

function accountsettings_profile (  ) { 
} 
function accountsettings_select_brand ( ) { 
}
function accountsettings_suggested_member ( ) { 
} 
function accountsettings_invite_friends ( ) { 
}
function accountsettings_notifications ( ) { 
} 
function accountsettings_preferences ( ) { 
} 
//  new profile
 	function account_profile_edit( id , action ) {
 		if (action == 'slideDown') {
 			$(id).slideDown("slow");
 		}else{
 			$(id).slideUp("fast");
 		} 
 	}  
 	function account_update_profile ( idfrom , idto , iderror , name , toolsid  , type , rowNames ) { 

 		// alert("update clicked ") 
 		var response = true;  
 		var newcontent = '';
 		var newcontent1 = '';
 		var errorMessage = '';
 		var newval = '';    
 		var rownames1 = '';
 		var rowNamesValues = ''; 




 		if ( response == true ) {  
 			
 			if ( type == 'profile-name-update' || type == 'profile-education-update' || type == 'profile-location-update' || type == 'profile-work-update' || type == 'profile-socialaccount-update' || type == 'profile-contact-update' ) { 
	 		 	 
	 			// multiple fields 
 				var idfrom1 = idfrom.split(" ");  
 				var rowNames = rowNames.split(" ");  

 				for (var i = 0; i < idfrom1.length; i++) {    
 					// initialize
 					rownames1 = rowNames[i]; 
 					newval = $(idfrom1[i]).val();   
 					
 					newval = profile_field_cleaner( newval );    
 					// alert(" id = "+idfrom1[i]+" val = "+newval+" rowName = "+rownames1);    
 					rowNamesValues = rowNamesValues.concat(newval+"_new_");	 


 					//alert( ' new val = '+newval );


 					if ( newval == '' ) {
 						//not required fields 
 					}else{
 						// required fields 
 						errorMessage = profile_fields_check( name , newval , errorMessage , idfrom1[i] );  
 						// alert(errorMessage);
 					}	 
 					if ( type == 'profile-location-update' ) { 
 						// locations 
 						newcontent = newcontent.concat(newval+"<br>");	  // technique3
 					}else if ( type == 'profile-socialaccount-update'  ) {  
 						// social accounts 
 						newcontent = newcontent.concat(newval+"<br>");	   // technique2
 					}else { 
 						// fullname , education 	 
 						newcontent = newcontent.concat(newval+" ");	 // technique1    
 					}
 				}  
 				newcontent = capitalizeEachWord(newcontent);   
 				// alert(newcontent);
 				//  alert(errorMessage);
 			}else{   
 				// all single fields  
 				// Username , about , Birthday Year , Gender , Preferred Style , Work , Skills , Email , Website/Blog , Occupation  
 				newval = $(idfrom).val();  
 				errorMessage = profile_fields_check( name , newval , errorMessage , idfrom ); 
 				newcontent = newval;    
 			    rowNamesValues =  newval;  

 			}  


 			//print now
			if ( type == 'profile-location-update' ||  type == 'profile-socialaccount-update' ) { 
				if ( errorMessage == '' ) { 
					// if no error found 
					// alert("no found error"+newcontent) 

					if ( newcontent == '<br><br><br><br>' ) {

						// if no social accounts were inputed 
						error_message ( iderror , 'social accounts needs to be filled' );
					}else{

						// alert("row name = "+rowNames+" row name values = "+rowNamesValues); 

						// last validation
						// check into database of the info exist if not then success 


						if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {   
								document.getElementById("profile_res").innerHTML = xmlhttp.responseText;
							}  
						}
						xmlhttp.open('GET','fs_folders/accountsettings/accountsettings_php_file/accountsettings_save.php?account_setting_tab=profile&profile_row_name='+rowNames+'&profile_row_name_val='+rowNamesValues,true);
						xmlhttp.send();


						$(idto).text('');
						$(idto).append(newcontent);	
						successfull_message ( iderror ,  name+' sucessfully updated' , toolsid ); 
						profile_text_transform_to_red ( idto ); 
					} 
				}else{
					// if error was found
					// alert("error was found ")
					error_message ( iderror , errorMessage );
				} 
			}else{
				// all fields exceept the location and social accounts
				if ( errorMessage == '' ) { 
					// if no error found 
					// alert("no found error") 

					// last validation
					// check into database of the info exist if not then success
					// alert("row name = "+rowNames+" row name values = "+rowNamesValues); 


					if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {   
							document.getElementById("profile_res").innerHTML = xmlhttp.responseText;
						}  
					}
					xmlhttp.open('GET','fs_folders/accountsettings/accountsettings_php_file/accountsettings_save.php?account_setting_tab=profile&profile_row_name='+rowNames+'&profile_row_name_val='+rowNamesValues,true);
					xmlhttp.send(); 

					$(idto).text(newcontent); // add new content updated to field 
					successfull_message ( iderror ,  name+' sucessfully updated' , toolsid );  
					profile_text_transform_to_red ( idto );
				}else{
					// if error was found
					// alert("error was found ")
					error_message ( iderror , errorMessage );
				} 
			}  
 		}else{ 
 			
			error_message ( iderror ,' failled to insert' );  	
 		}   
 		// hide message after 2 sec 
		setTimeout(function(){   
			$(iderror).css({'display':'block','border':'1px solid green','color':'green'});
			$(iderror).css('display','none');        
		},10000); 
 	}   
 	function profile_fields_check( name , newval , errorMessage , fieldId ) { 

 		var newvalLen = newval.length;
 		var fullnameLen = 20;  
 		var usernameMaxLen = 20; 
 		var aboutMaxLen = 200;
 		var workMaxLen = 50;
 		var occupationMaxLen = 20;
 		var educationtionMaxLen = 20;
 		var emailMaxLen = 30;
 		var websiteMaxLen = 30;
 		var locationMaxLen = 30;
 		var socialaccountsMaxLen = 50; 
 		var exceedMessageMaxLen =' is the maximum chracter of '; 

 	    if ( newval == 'Your Firstname' ||  newval == 'Your Lastname' || newval == 'username' ||  newval == 'tell something about you' ||  newval == 'Select Birth Year' ||  newval == 'Select Gender' ||      newval == 'your email'   	    	 ) { 
 	 		// required fields
 	 		errorMessage = errorMessage.concat(" (*) "+newval+" is required ");

 	 	}else if( newval == 'not required fields' ){ 
 	 		// not required fields
 	 		// alert(newval+" not required fields ") 
 	 	}else if( name == 'work' ||  name == 'occupation' ||  name == 'education'  ){ 
 			// detect special character v1 for field only
 	 		// errorMessage = detect_special_characters ( newval ); 
 	 		errorMessage = detect_special_characters ( newval , 2 );   
		    if( name == 'work' ){ 
		    	if ( newvalLen >  workMaxLen ) { 	
		    		errorMessage =  ' (*) '+workMaxLen+' is the maximum chracter of '+name;
				}
 	 		}else if( name == 'occupation' ){ 
 	 			if ( newvalLen >  occupationMaxLen ) { 	
		    		errorMessage =  ' (*) '+occupationMaxLen+' is the maximum chracter of '+name;
				}
 	 		}else if( name == 'education' ){ 
 	 			// alert(fieldId);
 	 			if ( fieldId == '#profile-graduationdate-select' ){ 
 	 				// alert("graduation date ")
 	 			}else if ( newvalLen >  educationtionMaxLen ) { 	
 	 				// alert("graduation fields")
		    		errorMessage =  ' (*) '+educationtionMaxLen+' is the maximum chracter in every fields of '+name; 
				}  
				// alert(errorMessage)
 	 		}
 	 	}else if( name == 'email' ||name == 'website' ||name == 'socialaccount' ) { 
 	 		// detect special character v2 for website/domains and email
 	 		errorMessage = detect_special_characters ( newval , 2 ); 	
 	 		if( name == 'email' ) {   
	 	 	 	if (  newvalLen > emailMaxLen )  { 
	 	 			errorMessage =  ' (*) '+emailMaxLen+' is the maximum chracter of '+name;
	 	 		}else if ( !check_email (newval) )  { 
	 	 			errorMessage =  errorMessage.concat(" (*) "+name+" is invalid ");  
	 	 		} 
	 	 	}else if( name == 'website' ){ 
	 	 		var n=newval.indexOf("."); 
	 	 		if (  newvalLen > websiteMaxLen )  { 
	 	 			errorMessage =  ' (*) '+websiteMaxLen+' is the maximum chracter of '+name;
	 	 		} else if (n < 0  ) {
	 	 			errorMessage =  errorMessage.concat(" (*) "+name+" is invalid "); 	
	 	 		}
	 	 	}else if( name == 'socialaccount' ){  
	 			if ( newvalLen  > socialaccountsMaxLen ) { 
	 	 			errorMessage =  ' (*) '+socialaccountsMaxLen+' is the maximum chracter in every fields of '+name;
	 	 		}  
 	 		} 
 	 	}else if( name == 'fullname' ){  
 	 		errorMessage = detect_special_characters ( newval , 3 ); 
	 		if ( newvalLen > fullnameLen ) { 
	 		 	errorMessage =  ' (*) '+fullnameLen+exceedMessageMaxLen+name;
	 		}   
 	 	}else if( name == 'username' ){  
 	 		errorMessage = detect_special_characters ( newval , 1 ); 
	 		if ( newvalLen  > usernameMaxLen ) { 
	 	 		errorMessage =  ' (*) '+usernameMaxLen+' is the maximum chracter of '+name;
	 	 	} 
 	 	}else if( name == 'about' ){  
 	 		errorMessage = detect_special_characters ( newval , 4 ); 	
 	 		if ( newvalLen  > aboutMaxLen )   { 
 	 			errorMessage = ' (*) '+aboutMaxLen+exceedMessageMaxLen+name
 	 		}   
		}else if( name == 'birthyear' ){  
 	 	}else if( name == 'gender' ){ 

 	 		switch ( newval ) { 
 	 			case 'Male':  
 	 					update_avatar_profile_pic( 'fs_folders/images/uploads/members/mem_original/male-default-avatar.png' );
 	 				break;
 	 			case 'Female':  
 	 					update_avatar_profile_pic( 'fs_folders/images/uploads/members/mem_original/female-default-avatar.png' );
 	 				break;
 	 			default:
 	 					alert('please select your gender');
 	 				break; 
 	 		} 
 	 	}else if( name == 'preferred style' ){ 
 	 	}else if( name == 'Skills' ){ 
 	 	}else if( name == 'location' ){ 
 	 		if ( newvalLen  > locationMaxLen ) { 
	 	 		errorMessage =  ' (*) '+locationMaxLen+' is the maximum chracter in every fields of '+name;
	 	 	}  
 	 	}
 	 	return errorMessage; 
 	}
 	function profile_field_cleaner ( newval ) { 
 		// clean the default value

 		 if ( newval == 'Facebook' || newval == 'Twitter'        || newval == 'Pinterest'      || newval == 'Instagram' || newval == 'Your Nickname / Alias' || newval == 'Your Website' ) {  //|| newval == 'Your Firstname' || newval == 'Your Nickname / Alias' || newval == 'Your Lastname' ) { 
 		  	return '';
 		 }else{
 		 	return newval;
 		 }
 	}
 	function error_message ( iderror , errorMessage ) {
 		$(iderror).css({'display':'block','border':'1px solid red','color':'#eb353e'}); //show warning message  
 		$(iderror).text(errorMessage); // warning message content 
 	} 
 	function successfull_message ( iderror , successMessage , toolsid ) {
 		$(iderror).css({'display':'block','border':'1px solid green','color':'green'}); // change text and border to green and show for the warning message
		$(iderror).text(successMessage);  // warning message
		$(toolsid).slideUp('fast'); // hide the tools options  
 	} 
 	function detect_special_characters ( newval , version ) { 
 		if ( version == 1 ) {
 			if(/^[a-zA-Z0-9-.]*$/.test(newval) == false) { 
 	 			return " (*) please don't include special chracters ";
			}else{
				return '';
			}
 		}else if ( version == 2 ) {
 			if(/^[a-zA-Z0-9-.,;/:@ ]*$/.test(newval) == false) { 
 	 			return " (*) please don't include special chracters ";
			}else{
				return '';
			}
 		}else if ( version == 3 ) { 
 			if(/^[a-zA-Z0-9-., ]*$/.test(newval) == false) { 
 	 			return " (*) please don't include special chracters ";
			}else{
				return '';
			}
		}else if ( version == 4 ) { 
 			if(/^[a-zA-Z0-9-.,? '"!$&@:();:/]*$/.test(newval) == false) { 
 	 			return " (*) please don't include special chracters ";
			}else{
				return '';
			}
 		}else{
 			if(/^[a-zA-Z0-9]*$/.test(newval) == false) { 
 	 			return " (*) please don't include special chracters ";
			}else{
				return '';
			}
 		} 	
 	}  
 	function profile_text_transform_to_red ( idto ) {  	

 		$(idto).css({"color":"#c51d20","font-weight":"bold"});  
 	} 
 	function update_avatar_profile_pic ( src ) {  

 		$(".profile-pic-default").attr('src', src );  
 	}

 		// show hide edit options 
 			function show_hide_profile_options ( id , stat ) { 
 				if ( stat == 'show') {
 					$(id).css({"visibility":"visible"});
 				}else{
 					$(id).css({"visibility":"hidden"});
 				}
 			}  
 		// show hide edit options   
//  end profile   

// new select brand
 	function select_brand ( id ) {   
 		var brandid = "#brand"+id; 
 		// save brand id  
 			var bf = $('#brandField').val();  
 			 // alert('valie '+id) 
 		// show hide brand
			var style = $(brandid).attr('style');  
			var bc = $(brandid).attr("class"); 
			if ( bc == 'brandDefault' ) { 
				// alert('1');
				var bf1 = bf.replace(','+id,''); 
	 			bf1 = bf1+id+',';   
				$('#brandField').val(bf1);  


				$(brandid).css({'filter':'alpha(opacity=20)','-moz-opacity':'0.2','-khtml-opacity':'0.2','opacity':'0.2' });    
				$(brandid).removeClass("brandDefault");
				$(brandid).addClass("brandSelected");
			}else{ 
				// alert('2'); 
				var bf1 = bf.replace(','+id,'');  
				var bf1 = bf.replace(id+',','');  
	 			$('#brandField').val(bf1);  
				$(brandid).css({ 'filter':'alpha(opacity=100)', '-moz-opacity':'10', '-khtml-opacity':'10', 'opacity':'10' }); 
				$(brandid).removeClass("brandSelected");
				$(brandid).addClass("brandDefault");
			}   
 	}
 	function next_prev ( pageNum , type ) {
 		// alert(pageNum);
 		// ajax_send_data( 'brandres' , 'fs_folders/modals/account_settings/account_settings_modals.php?select_brand_next_prev='+page , 'none' ); 
 			// $('#select_brand_loader').css("visibility","visible");
 			
 			// var type = 'account-select-brands';
 			if ( type == 'account-select-brands' ) {

	 			var loader1 = '#select_brand_loader1';
	 			var loader2 = '#select_brand_loader2';
	 			var res = 'brandres';
	 			var pageClass  = '.page'+pageNum; 
	 			var pageClass1 = '.page'; 
	 			var data = 'fs_folders/modals/account_settings/account_settings_modals.php?select_page_next_prev='+pageNum+"&account_seettings_tab=account-settings-brand"
	 			
 			}else if(  type == 'account-suggested-member' ) {
 				var loader1 = '#select_suggested_member_loader1';
 				var loader2 = '#select_suggested_member_loader2';
	 			var res = 'suggested-member-nexprev-container';
	 			var pageClass  = '.page'+pageNum; 
	 			var pageClass1 = '.page'; 
	 			var data = 'fs_folders/modals/account_settings/account_settings_modals.php?select_page_next_prev='+pageNum+"&account_seettings_tab=account-settings-suggested-member"
 			}else if (  type == 'account-invitefriends-fb-friends-on-fs' ) {
 				// alert(" get fb friends on fs ")
 				var loader1 = '#invitefriends-fb-friends-on-fs-loader1';
 				var loader2 = '#invitefriends-fb-friends-on-fs-loader2';
	 			var res = 'invitefreinds-fbfriends-on-fs-nexprev-container';
	 			var pageClass  = '.fb-freinds-on-fs-page'+pageNum; 
	 			var pageClass1 = '.fb-freinds-on-fs-page'; 
	 			var data = 'fs_folders/modals/account_settings/account_settings_modals.php?select_page_next_prev='+pageNum+"&account_seettings_tab="+type

 			}else if (  type == 'account-invitefriends-fb-friends-on-fb' ) {  
 				// alert(" get fb friends on fb ")
 				var loader1 = '#invitefriends-fb-friends-on-fb-loader1';
 				var loader2 = '#invitefriends-fb-friends-on-fb-loader2';
	 			var res = 'invitefreinds-fbfriends-on-fb-nexprev-container';
	 			var pageClass  = '.fb-freinds-on-fb-page'+pageNum; 
	 			var pageClass1 = '.fb-freinds-on-fb-page';  
	 			var data = 'fs_folders/modals/account_settings/account_settings_modals.php?select_page_next_prev='+pageNum+"&account_seettings_tab="+type
 			}




 			$(loader1).css("visibility","visible"); 
 			$(loader2).css("visibility","visible"); 
			if (window.XMLHttpRequest)  {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
					$("#"+res).text("");
					document.getElementById(res).innerHTML = xmlhttp.responseText; 
					for (var i = 1; i <= 100; i++) {
						$(pageClass1+i).css({"color":"#1a386a"});    
					};  
					$(pageClass).css({"color":"#b32727"});    

					// $('#select_brand_loader').css("visibility","hidden"); 
					$(loader1).css("visibility","hidden"); 
					$(loader2).css("visibility","hidden"); 
				}  
			}
			xmlhttp.open('GET',data,true);
			xmlhttp.send();  
 	} 
// end select brand 

// new select member
	function suggested_member_follow ( buttonid , mno1 ) { 
		var c = $(buttonid).attr('class');   
		if ( c == 'suggested-member-follow' ) {  
			// follow to make a general function
			// alert("follow")
				$(".suggested_member_follow_loading").css("visibility","hidden");
				$('#suggested_member_follow_loading'+mno1).css("visibility","visible");    
				$(buttonid).attr("class","suggested-member-unfollow");
				$(buttonid).attr('src','fs_folders/images/genImg/profile-unfollow.png');  
				if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
						document.getElementById('suggested-member-res').innerHTML = xmlhttp.responseText;  
						$('#suggested_member_follow_loading'+mno1).css("visibility","hidden");
					
						// alert("followed")
	 				}  
				}
				xmlhttp.open(
					'GET',
					'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=follow"  ,
					true
				); 
				xmlhttp.send();  
		}else{
			// alert("unfollow")
			// un follow to be make a general function
				$(".suggested_member_follow_loading").css("visibility","hidden");
				$('#suggested_member_follow_loading'+mno1).css("visibility","visible");   
				$(buttonid).attr("class","suggested-member-follow"); 
				$(buttonid).attr('src','fs_folders/images/genImg/profile-follow.png');	
				if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
						document.getElementById('suggested-member-res').innerHTML = xmlhttp.responseText;  
						$('#suggested_member_follow_loading'+mno1).css("visibility","hidden"); 
	 				}  
				}
				xmlhttp.open(
					'GET',
					'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=unfollow",
					true
				); 
				xmlhttp.send();  
		}  
	}
// end select member