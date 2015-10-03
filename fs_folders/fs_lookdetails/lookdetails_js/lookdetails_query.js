 	
$(document).ready( function(){  
	 
	initquey ( ) ;


	function initquey ( )  
	{


        //alert('page loaded');
		// alert(' lookdetails ready init js '); 
		// click_show_or_hide ( );
		show_if_mouse_over( );
		// hover_body_menu_links( '#comment_tabs span' , '#comment_tabs_hr1' );
		hover_body_menu_links( '#love_tabs span'    , '#love_tabs_hr1' );
		hover_body_menu_links( '#drip_tabs span'    , '#drip_tabs_hr1' ); 
		arrow_left_right_pressed_for_next_prev (  );

	}	 
	function click_show_or_hide ( ) 
	{	
		var clickable_el = '#ld_square_with_arrow img';
		var show_container_el = '#square_with_arrow_clicked_cotainer'; 
		$(clickable_el).click(function ()  {
			// alert($(show_container_el).attr('class'));	
			if( $(show_container_el).attr('class') == 'open' ) { 
				$(show_container_el).removeClass('open');
				$(show_container_el).css({'display':'none'});
				$(show_container_el).addClass( "close" );
			} 
			else { 
				$(show_container_el).removeClass('close');
				$(show_container_el).css({'display':'block'}); 
				$(show_container_el).addClass( "open" ); 
			} 
			// alert('square arrow clicked'); 
		});
	}   
	// jQuery( function($) {
        $('#body_content').bind('scroll', function() {
         // $("#body_content").scroll(function() { 
            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
             // $("#thumbnail_res").text("readched");
             // alert(" end readched please wait, reload new images.......");
               // $("#loading img ").css({"visibility":"visible"});
            }else{
            	// $("#thumbnail_res").text("not yet..");
            }
        }) 
    // }


	// tag show hide in the look.
  
	function arrow_left_right_pressed_for_next_prev (  ) {  
		// alert("working") 
		//  "#current_look_viewed" - will be updated by the lookdetails_ajax  every change of the look. 
	 	var plnos= $("#plnos").text();
	    // alert(plnos);
	    var a = plnos.split("-");
	    var tlook = a.length-1;  
	    var c = 0; 
	    // var c = 0;
	    // alert(c);
	    var plno = 0;
	    // for (var i = 0; i < tlook; i++) {
	        // alert(" c ="+i+" "+a[i]+"total look "+tlook);
	    // }; 




	    /*
	    sessionStorage.Tplnos = tlook; // used in general in lookdetails page.
	    sessionStorage.generated_plnos  = a; // used in general in lookdetails page.

	    $(window).keyup(function( ) { 
	          //current key of look  
	        if(event.keyCode == 39) { // down key  
	            c = $("#current_look_viewed").text();
	            // alert(" arrorw from index = "+c)
	            c++;    
	            if ( c >  tlook-1 ) {
	                c = 0;
	            } 
	            plno =  a[c];
	            load_look_picture_and_tags( plno ); 
	            $("#res").text(" arrow right 39 c = "+c+" tlook = "+tlook+" plno = "+a[c]); 
	            $("#current_look_viewed").text(c);
	        }else if ( event.keyCode == 37 ) {   
	            c = $("#current_look_viewed").text();
	            // alert("from index = "+c) 
	            c--; 
	            if ( c < 0 ) {
	                c = tlook-1;
	            } 
	            plno =  a[c];
	            load_look_picture_and_tags( plno ); 
	            $("#res").text("arrow left 37  c = "+c+" tlook = "+tlook+" plno = "+a[c]); 
	            $("#current_look_viewed").text(c);  
	        } 
	         // alert( "Handler for .keydown() called." );
	    });    



 		*/
	} 
});





