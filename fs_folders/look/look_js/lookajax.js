// alert(" look ajax connected ");






function share_mouse_enter( class1 ) {
	alert("mouse entered ");
	 $(class1).css({'display':'block'});

}
function share_mouse_out( class1 ) {
	$(class1).css({'display':'none'}); 
}


show_if_mouse_over( '#share_dropdown_icons100' , '#share_dropdown_icons100' , '#share_look_modals100' );