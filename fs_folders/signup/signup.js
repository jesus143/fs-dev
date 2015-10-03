   
	$(document).ready( function ( ) {

		field_focused_isEmpty_then_hide_text ( '#email1' , "E-MAIL" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	 
		field_focused_isEmpty_then_hide_text ( '#email2' , "E-MAIL" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	 
		field_focused_isEmpty_then_hide_text ( '#web_blog' , "WEBSITE / BLOG" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	  
		
		field_focused_isEmpty_then_hide_text ( '#email1_1' , "E-MAIL" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	 
		field_focused_isEmpty_then_hide_text ( '#email2_1' , "E-MAIL" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	 
		field_focused_isEmpty_then_hide_text ( '#web_blog_1' , "WEBSITE / BLOG" , "#ccc" , "#a11921" , false );//'Make sure you enter your correct email address to ensure we get your request.' 	  
 
 
		// new sliderShow  
			// $('#slideShowContainer').cycle({ 
			//     fx:      'scrollHorz',
			//     timeout:  3000,
			//     prev:    '#reg_prev',
			//     next:    '#reg_next',
			//     pager:   '#nav',
			//     pagerAnchorBuilder: pagerFactory
			// }); 
			// function pagerFactory(idx, slide) {
			//     var s = idx > 2 ? ' style="display:none"' : '';
			//     return '<li'+s+'><a href="#">'+(idx+1)+'</a></li>';
			// };
	    // end sliderShow   
	   // obj = new Object(); 
	   // obj.counter = 0; 
	  
	   	obj = new Object(); 
	   	obj.counter = 0;
	 
	  	obj.image1        = 'url(fs_folders/images/signup/menswear.png)';
		obj.image2        = 'url(fs_folders/images/signup/beauty.png)';
		obj.image3        = 'url(fs_folders/images/signup/lifestyle.png)';
        obj.image4        = 'url(fs_folders/images/signup/entertainment.png)';
        obj.image5        = 'url(fs_folders/images/signup/women.png)';
		obj.idElement     = '#signup-header-banners';
		obj.backgroundImg = '';
		obj.change        = 5000;

	    setInterval(function(){  

	    	obj.counter++; 
	    	if (obj.counter == 1) {   
	    		obj.backgroundImg = obj.image1; 
	    	} else if (obj.counter == 2) {  
	    		obj.backgroundImg = obj.image2; 
	    	} else if (obj.counter == 3) {  	
	    		obj.backgroundImg = obj.image3;
            } else if (obj.counter == 4) {
                obj.backgroundImg = obj.image4;
            } else if (obj.counter == 5) {
                obj.backgroundImg = obj.image5;
                obj.counter = 0;
            } else {

	    	}   

	    	$(obj.idElement).animate({opacity: 0.4}, 1000,
                function () { 
                	$(this).css('background-image', obj.backgroundImg);	
                    $(this).animate({opacity: 1}, 1000, 
                    	function () { 
                    	}
                    ); 
                }
            );  

	    }, obj.change); 
	})   
	function gen_popup_check_invited_info( email , weblog , name , action , e ) {    
  	


		var n1 = 0, n2 = 0, msg = '' , bool = false;
		
		 
		  
			 
		if ( e.keyCode == 13 || action == 'submit-yes' ) { 

			var weblog_id = weblog; 
			var email_id  = email; 
			var weblog = $(weblog).val() 
			var email = $(email).val();  


				// check blog if www and .com exist 

					n1 = weblog.indexOf("www"); 
					n2 = weblog.indexOf(".com"); 

					if ( n1 >= 0 ) {  

						bool = true;   
					} else if ( n2 >= 0 ) {  
						
						bool = true;  
					}  

					if ( bool == false ) {

						alert( 'make sure that the website / blog is correct.' ); 

					} else{ 
						// general validation
				
						 	if (email == "E-MAIL") { 
							 	// alert("Your E-MAIL Required"); 
							}
							else if ( weblog == "WEBSITE / BLOG" ) { 
								alert("Your website or blog Required"); 
							}
							else if (email != "E-MAIL")  
							{ 
								var atpos=email.indexOf("@");
								var dotpos=email.lastIndexOf(".");
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
								  	alert("Not a valid e-mail address");	
								  	return false;
								} else  {      
									// update color and change  
									if( confirm( "are you sure that your emails is: "+email+" and website : "+weblog ) ) {   
										$(weblog_id).val( "WEBSITE / BLOG" );
										$(email_id).val( "E-MAIL" ); 
										$(weblog_id).css('color','ccc');
										$(email_id).css('color','ccc'); 
										$("#gen-popup-wrapper").fadeOut("slow");   
 
										weblog = weblog.replace(/[.]/g,'[dot]'); 

										// alert('web or blog = '+weblog);
 
										ajax_send_data(  
											'popup_res',
											// 'fs_folders/fs_popUp/popUp_php_file/save_popupinvite_info.php?email='+email+'&wb='+weblog+'&type=signup', '' 
											//'fs_folders/modals/general_modals/gen.modals.func.php?action=invited-person&process=invitedSignup&email=' + email + '&websiteOrBlog=' + weblog ,
                                            'fs_folders/modals/Signup/SignUpManual.php?email=' + email + '&blog=' + weblog,
											'',
                                            'signup-status'
										);  

										
										setTimeout(function( ) {
											$('#fn').text(name);
											set_center( '#invite-popup-response-wrapper'  );	
											$('#invite_after_submit').fadeIn("slow");    
											$('#signup-container-responsive').css('display','none');  
											$('body').css('background-color','rgba(000,000,000,0.8)');
										},1000);   
										return true; 
									}
								}
							}
					}  
			return false;

		}
	}  


	// var counter;
	// setInterval(function() { 
 //    	// alert('time out')
 //    	// jQuery("#div").hide();  
 		// alert('change  background image')
   //  	var el = document.getElementById("signup-header-banners").style.backgroundImage;
   //  	 el.style.backgroundImage = "url(../../fs_folders/images/genImg/signup-header-slide-3-men.png)";  
 //    }, 3000); 
 // 

function detectmob(message) { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
    return true;
  }
 else { 
    return false;
  }
}