	$(document).ready(function() {
	
	click_show_or_hide ( '#post_now' , '#post_option_div' );

	// mouseOver_hideMe_showOther_mouseOut_showMe_hideOther ('#invite_img1' , '#invite_img1' , '#invite_img2' , '#invite_img2' , '#invite_img1' , '#invite_img2' );
	// mouseOver_hideMe_showOther_mouseOut_showMe_hideOther ('#message_img1' , '#message_img1' , '#message_img2' , '#message_img2' , '#message_img1' , '#message_img2' );
	// mouseOver_hideMe_showOther_mouseOut_showMe_hideOther ('#notifcation_img1' , '#notifcation_img1' , '#notifcation_img2' , '#notifcation_img2' , '#notifcation_img1' , '#notifcation_img2' );
	// mouseOver_hideMe_showOther_mouseOut_showMe_hideOther ('#settings_img1' , '#settings_img1' , '#settings_img2' , '#settings_img2' , '#settings_img1' , '#settings_img2' );
	// click_show_or_hide ( '#message_img1 , #message_img2' , '#message_dropdown_container' , '#message_img1' , '#message_img2' );
	mouseIn_showOverFlow_mouseOut_shideOverFlow( '#message_result' );
	


	// new buble buttons clicked

		// new  invite icon
		 	click_hide_and_show_el ( 
				"#invite_img1" , 
				"#invite_img1" , 
				"#invite_img2" ,  
				'#message_img2 , #notifcation_img2 , #settings_img2' ,
				'#message_img1 , #notifcation_img1 , #settings_img1' , 
				'#message_dropdown_container, #settings_result , .notification-activity , .notification-message ', // hide drop downs
                '.notification-member-suggest' // show drop downs
		 	); 
		 	click_hide_and_show_el ( 
			 	"#invite_img2" ,
			 	"#invite_img2" , 
			 	"#invite_img1" , 
			  	'#message_img2 , #notifcation_img2 , #settings_img2' ,
				'#message_img1 , #notifcation_img1 , #settings_img1' , 
				'.notification-activity , .notification-message,  .notification-member-suggest', // hide drop downs
				 '' // show drop downs
		 	);
		// end invite icon
	 
		// new messages icon
		 	click_hide_and_show_el ( 
		 		"#message_img1" , 
		 	 	"#message_img1" , 
		 		"#message_img2" ,
		 	    '#invite_img2 , #notifcation_img2 , #settings_img2' , 
				'#invite_img1 , #notifcation_img1 , #settings_img1' ,
				'#settings_result , .notification-activity, .notification-member-suggest', // hide dropdowns
				'.notification-message' // show dropdowns
		 	);
		 	 click_hide_and_show_el ( 
		 	 	"#message_img2" , 
		 	 	"#message_img2" , 
		 	 	"#message_img1" ,
		 	 	'#invite_img2 , #notifcation_img2 , #settings_img2' ,
				'#invite_img1 , #notifcation_img1 , #settings_img1' ,
				'.notification-message', // hide drop downs 
				'' // show drop downs 
		 	 );
		// end messages icon 

		// new notifications icon 
		 	click_hide_and_show_el (
		 		"#notifcation_img1" , //grey
		 	 	"#notifcation_img1" ,  // hide grey 
		 		"#notifcation_img2" , // show red
		 		'#invite_img2 , #message_img2 , #settings_img2' , // red other hide element 
				'#invite_img1 , #message_img1 , #settings_img1' ,  // other show element 
				'#message_dropdown_container , #settings_result , .notification-activity-buble , .notification-message, .notification-member-suggest', // hide drop downs 
				'.notification-activity' // show drop downs 
		 	);
		 	 // ( clicked_el , hide_el , show_el , other_el_hide ,  other_el_show)  
		 	 click_hide_and_show_el ( 
		 	 	"#notifcation_img2" ,  // red click
		 	 	"#notifcation_img2" ,  // red hide 
		 	 	"#notifcation_img1" ,  // grey show
		 	 	'#invite_img2 , #message_img2 , #settings_img2' , // other elemebt hide  or hide other open red
				'#invite_img1 , #message_img1 , #settings_img1' , // other element show or show grey
				'#message_dropdown_container , .notification-activity , .notification-message', // hide drop downs 
				'' // show drop downs 
		 	 );
		// end notifications icon

		// new settings icon


			// clicked 
			 	click_hide_and_show_el (
			 		"#settings_img1" , //grey
			 	 	"#settings_img1" , // hide grey 
			 		"#settings_img2" , // show red
			 		'#invite_img2 , #message_img2 , #notifcation_img2' , // red other hide element 
					'#invite_img1 , #message_img1 , #notifcation_img1' , // other show element 
					'#message_dropdown_container , .notification-activity , .notification-message, .notification-member-suggest ', // hide drop downs 
					'#settings_result' // show drop downs 
			 	); 
			 	 click_hide_and_show_el ( 
			 	 	"#settings_img2" ,  // red click
			 	 	"#settings_img2" ,  // red hide 
			 	 	"#settings_img1" ,  // grey show
			 	 	'#invite_img2 , #message_img2 , #notifcation_img2' , // other elemebt hide  or hide other open red
					'#invite_img1 , #message_img1 , #notifcation_img1' , // other element show or show grey
					'#settings_result , .notification-activity , .notification-message ', // hide drop downs 
					'' // show drop downs 
			 	 );
			// mouseover  



		 	// click_hide_and_show_el ( clicked_el , hide_el , show_el , other_el_hide ,  other_el_show , hideDropDowns , openDropDowns )   
		// end settings icon 

  


	// new post button
		 click_show_or_hide ( '#post-button-modal' , '#settings_result-1' ); 
	// end post button



	// new menu dropdowns
		// mouseover_show_hide_menu( '#info        , #info_dd_container'           , '#info_dd_container'        , '#info_dd_container , #community_dd_container , #participate_dd_container' ); 
		// mouseover_show_hide_menu( '#comunity    , #community_dd_container'      , '#community_dd_container'   , '#info_dd_container , #community_dd_container , #participate_dd_container' ); 
		// mouseover_show_hide_menu( '#participate , #participate_dd_container'    , '#participate_dd_container' , '#info_dd_container , #community_dd_container , #participate_dd_container' ); 
    


		// info link
			mouseOver_elemShow_mouseOut_elemHide_v2( 
				'#info , #info_dd_container'  , 						  // mouseover elem
				'#info , #info_dd_container'   ,						  // mouseout elem
				'#info_dd_container ' , 							      // mouseover_show
				' #community_dd_container , #participate_dd_container , #search-response-container' ,  // mouseover_hide
				null ,   												  // mouseout_show
				'#info_dd_container '      								  // mouseout_hide
			);  
		// community
			mouseOver_elemShow_mouseOut_elemHide_v2( 
				'#comunity    , #community_dd_container'  ,  	          // mouseover elem
				'#comunity    , #community_dd_container'   ,	          // mouseout elem
				'#community_dd_container ' , 						      // mouseover_show
				' #info_dd_container , #participate_dd_container , #search-response-container ' ,       // mouseover_hide
				null ,  											      // mouseout_show
				'#community_dd_container '    					          // mouseout_hide
			);  
		// participate 
			mouseOver_elemShow_mouseOut_elemHide_v2( 
				 '#participate , #participate_dd_container'  ,            // mouseover elem
				 '#participate , #participate_dd_container'   ,           // mouseout elem
				'#participate_dd_container ' ,  			              // mouseover_show
				' #info_dd_container , #community_dd_container , #search-response-container ' ,         // mouseover_hide
				null ,   										          // mouseout_show
				'#participate_dd_container '               		          // mouseout_hide
			); 





		// mouseover_show_hide_menu( mouseOver_el , mouseOut_el , show_hide_el )
	// end menu dropdowns




});
