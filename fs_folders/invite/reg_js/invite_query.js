 
$(document).ready(function () 
{

	// alert("invite is ready");

	set_center( "#invite-popup-response-wrapper" );


	init_query ();
	set_empty( );

	field_focused_isEmpty_then_hide_text ( '#fn' , "FIRST NAME & LAST NAME" , "#ccc" , "#a11921" , false );
	field_focused_isEmpty_then_hide_text ( '#ln' , "LAST NAME " , "#ccc" , "#a11921" , false );
	field_focused_isEmpty_then_hide_text ( '#email' , "E-MAIL * " , "#ccc" , "#a11921" , 'please fill up your correct email.' );//'Make sure you enter your correct email address to ensure we get your request.' 
	field_focused_isEmpty_then_hide_text ( '#wob' , "WEBSITE OR BLOG" , "#ccc" , "#a11921" , 'website or blog is used to contact you!' );//'Leaving your website, blog or social network domain is another way for us to notify you that your invite has been sent.' 
	field_focused_isEmpty_then_hide_text ( '#infTA' , "WHAT WOULD YOU LIKE A FASHION COMMUNITY TO OFFER." , "#ccc" , "#a11921" , false );
  	
  
  	changeCss_when_moueOver( "#reg_prev img " , "#reg_prev img " , "#reg_prev img " ); 
  	changeCss_when_moueOver( "#reg_next img " , "#reg_next img " , "#reg_next img " ); 
   	
   	mouseIn_mouseOut_el_hide_el_show( 
		"#DDcontainer_occupation " , 
		"#DDcontainer_occupation " ,  
		"#DDcontainer_occupation " , 
		"#DDcontainer_occupation "  
	);
	mouseIn_mouseOut_el_hide_el_show( 
		"#DDcontainer_style ,  #style_res ,  #style_res li" , 
		"#DDcontainer_style" , 
		"#DDcontainer_style" , 
		"#DDcontainer_style" 
	); 
	click_occupation_style ( "#bridge_occu , #DDcontainer_occupation" , "#ocpstyle, #DDcontainer_occupation" , "#DDcontainer_occupation" );
	click_occupation_style ( "#bridge_style , #DDcontainer_style" , "#ocpstyle, #DDcontainer_style" , "#DDcontainer_style" );
  
	function init_query () { 

		// alert("initialize elements"); 
	}
	function invite_search(textF) {

	 	$(textF).focus(function() {

		    $(textF).css({"opacity":"0.7"});
		});
	 	$(textF).blur(function() {
			$(textF).css({"opacity":"0.2"}); 	
		});
	}
	function changeCss_when_moueOver( mouseOver_el ,  mouseOut_el , changeCss_el ) {
	 	$(mouseOver_el).mouseover(function ( ) {
	 		 // alert("mouse over");
	 		 $(changeCss_el).css({"opacity":"0.9"});
	 	} )
	 	$(mouseOut_el).mouseout(function ( ) {
	 		 // alert("mouse out ");
	 		 $(changeCss_el).css({"opacity":"0.5"});
	 	} )
	}
	function field_focused_isEmpty_then_hide_text ( textF , isEmptyVal , blurColor , focusColor , alertWhenFieldClick ) {
		$(textF).focus(function() {
		    if ( $(textF).val() == isEmptyVal ) 
			{ 
				if(alertWhenFieldClick)  
				{
					alert(alertWhenFieldClick); 
				}
				
				$(textF).val("");    			 	 
				$(textF).css({"color":focusColor})
			}

		});
	 	$(textF).blur(function() {
			if ( $(textF).val()=="") 
			{ 
			    $(textF).val(isEmptyVal);	
			    $(textF).css({"color":blurColor})		 	 
			} 		
		});
	}  
	function set_empty(  ) {
	    // var el_id = "#infTA";
	    // var suplyInitVal = ""
	    // $(el_id).val("");
	}
	function mouseIn_mouseOut_el_hide_el_show(element) {
		$(element).mouseover(function() {
			// alert("mouse enter");
			$(element).css({"overflow-y":"auto"});  
		} )
		$(element).mouseout(function() {
			// alert("mouse out");
			$(element).css({"overflow":"hidden"});
		} )
	} 
	function click_occupation_style ( mouseOver_el , mouseOut_el , show_hide_el ) {	
    	$(mouseOver_el).mouseover(function ( ) {
    		$(show_hide_el).css("display","block");
    	})
    	$(mouseOut_el).mouseout(function ( ) {
    		$(show_hide_el).css("display","none");
    	}) 
    } 
	// new sliderShow 
		$('#slideShowContainer').cycle({
		    fx:      'scrollHorz',
		    timeout:  5000,
		    prev:    '#reg_prev',
		    next:    '#reg_next',
		    pager:   '#nav',
		    pagerAnchorBuilder: pagerFactory
		});

		function pagerFactory(idx, slide) {
		    var s = idx > 2 ? ' style="display:none"' : '';
		    return '<li'+s+'><a href="#">'+(idx+1)+'</a></li>';
		};
    // end sliderShow 
    	
});

// alert('ready')