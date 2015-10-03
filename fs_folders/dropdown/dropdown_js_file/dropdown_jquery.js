 
$(document).ready(function () 
{ 
	 
	// new info /contact us/ you are
	   	mouseIn_mouseOut_el_hide_el_show( ".DDcontainer_occupation1 " );
		click_occupation_style ( 
			".bridge_occu1 , .DDcontainer_occupation1" ,  // mouse over 
			".ocpstyle1, .DDcontainer_occupation1" ,  // mouse out
			".DDcontainer_occupation1"  // will show and hide
		);
	// end info /contact us/ you are 

 	// new info /contact us/ you are
	   	mouseIn_mouseOut_el_hide_el_show( ".DDcontainer_occupation2" );
		click_occupation_style ( 
			".bridge_occu2, .DDcontainer_occupation2" ,  // mouse over 
			".ocpstyle2, .DDcontainer_occupation2" ,  // mouse out
			".DDcontainer_occupation2"  // will show and hide
		);
	// end info /contact us/ you are 

	// new info /contact us/ select a topic  
	   	mouseIn_mouseOut_el_hide_el_show( ".DDcontainer_occupation3" );
		click_occupation_style ( 
			".bridge_occu3, .DDcontainer_occupation3" ,  // mouse over 
			".ocpstyle3, .DDcontainer_occupation3" ,  // mouse out
			".DDcontainer_occupation3"  // will show and hide
		);
	// end info /contact us/ select a topic  

	// new info /contact us/ select a topic  
	   	mouseIn_mouseOut_el_hide_el_show( ".DDcontainer_occupation4" );
		click_occupation_style ( 
			".bridge_occu4, .DDcontainer_occupation4" ,  // mouse over 
			".ocpstyle4, .DDcontainer_occupation4" ,  // mouse out
			".DDcontainer_occupation4"  // will show and hide
		);
	// end info /contact us/ select a topic  


	function mouseIn_mouseOut_el_hide_el_show(element) 
	{
		$(element).mouseover(function() {
			// alert("mouse enter");
			$(element).css({"overflow-y":"auto"});  
		} )
		$(element).mouseout(function() {
			// alert("mouse out");
			$(element).css({"overflow":"hidden"});
		} )
	} 
	function click_occupation_style ( mouseOver_el , mouseOut_el , show_hide_el ) 
    {	
    	$(mouseOver_el).mouseover(function ( ) {
    		$(show_hide_el).css("display","block");
    	})
    	$(mouseOut_el).mouseout(function ( ) {
    		$(show_hide_el).css("display","none");
    	})
    } 
});

// alert('ready')