	 
	hide_popUp ( );



//  new info tabs
	function info_start ( page ) 
	{ 
		hide_show( "show" , "#content_"+page );
		change_text_color ( "#tab_"+page  , "#c51d20");  
		invisible_visible ( "visible" , "#horizontal_line_"+page ) 
		change_text_color ( "#horizontal_line_"+page  , "#c51d20"); 

 
		$("body textarea").val("");
	} 
	function colored_info_tabs( info_tab_id , info_tab_content_id , url , title ) 
	{   
		change_url ( url , title );   
		show_tab_content ( info_tab_id , info_tab_content_id );   
	}
	function show_tab_content ( info_tab_id , info_tab_content_id ) 
	{   
		// alert("content show "+info_tab_content_id )
		var info_tabs_content = [ 
			"#content_about_us", 
			"#content_our_story",
			"#content_FAQ",
			"#content_careers", 
			"#content_advertise",
			"#content_contribute",
			"#content_contatact_us"
		];

		var info_tabs = [
			"#tab_about_us",
			"#tab_our_story",
			"#tab_FAQ",
			"#tab_careers",
			"#tab_advertise",
			"#tab_contribute",
			"#tab_contatact_us"
		];  

		var info_tab_horizontal_line = [
			"#horizontal_line_about_us",
			"#horizontal_line_our_story",
			"#horizontal_line_FAQ",
			"#horizontal_line_careers",
			"#horizontal_line_advertise",
			"#horizontal_line_contribute", 
			"#horizontal_line_contatact_us"

		];

		var content = "";
		var tab_id= "";
		var hr = ""; 

		for (var i = 0; i < info_tabs_content.length; i++) 
		{ 
			content_id = info_tabs_content[i];
			tab_id     = info_tabs[i];
			hr         = info_tab_horizontal_line[i];

			if ( info_tab_content_id == content_id ) 
			{
				hide_show( "show" , content_id );
				change_text_color ( tab_id , "#c51d20"); 
				invisible_visible ( "visible" , hr ) 
				change_text_color ( hr , "#c51d20");  
			}
			else 
			{
				hide_show_display( "hide" , content_id ); 
				change_text_color ( tab_id , "#cac7c5"); 
				invisible_visible ( "hidden" , hr )
				change_text_color ( hr , "#cac7c5"); 
			} 
		};  
	}
//  end info tabs 
//  new buttons 
 	function info_advertise() 
	{ 

		// window.scrollTo(0,0);
		
 
		var adfn   = $("#advertise-fname").val();
		var adln   = $("#advertise-lname").val();
		var adem   = $("#advertise-Email").val();
		var adw    = $("#advertise-website").val();
		var adbn   = $("#advertise-business-name").val();
		var adpn   = $("#advertise-phone-number").val();
		var adb    = $(".os_input4").val();
		var pfad   = $(".os_input1").val();
		var ur     = $(".os_input2").val();
		var ur     = $(".os_input2").val();
		var atarea = $("#advertise-textarea").val();
				 
 
		 
		var  advertiseData = "adfn="+adfn
					+"&adln="+adln
					+"&adem="+adem
					+"&adw="+adw
					+"&adbn="+adbn
					+"&adpn="+adpn
					+"&adb="+adb
					+"&pfad="+pfad
					+"&ur="+ur
					+"&atarea="+atarea
					+"&tab=advertise"
		// alert(advertisement); 

		// 

		show_popUp (  "popUp_body_result" , "fs_folders/info/info_php_file/info.php?"+advertiseData , "popUp-loading img" ); 
	}
	function info_contact_us()  
	{  
		var contact_us_email   = $("#contact_us_email").val();
		var contact_us_subject   = $("#contact_us_subject").val();
		var contact_us_message   = $("#contact_us_message").val(); 

		var  contactUsData = "contact_us_email="+contact_us_email
					+"&contact_us_subject="+contact_us_subject
					+"&contact_us_message="+ contact_us_message 
					+"&tab=contact_us";


		show_popUp (  "popUp_body_result" , "fs_folders/info/info_php_file/info.php?"+contactUsData , "popUp-loading img" ); 


	} 
//  end buttons




//  new info submitted 

		
		// #advertise-lname 


//  end info subbmitted




