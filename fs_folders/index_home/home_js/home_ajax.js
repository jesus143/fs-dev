// init (); 
	

function    init (fs_home_tab) {
    //alert(fs_home_tab);
    // alert("ready for auto collapse.");
	//auto collapse the modals after initialized 

    // sessionStorage.ccounter = 2;
	// append_home('home_res','fs_folders/modals/latest_modals/index.php?tres=2','');   


	// latest_load ();  
	// sessionStorage.mr = 1730 ;  with banner 
	//sessionStorage.mr = 1600;  //with no banner with padding button
	// sessionStorage.mr = 1600;	 
	// var counter = sessionStorage.ccounter; tansferred to function js. 
	// alert(" home page loaded counter = "+counter); 


 

 // alert( 'counter = '+sessionStorage.ccounter);

 
  


	if( fs_home_tab == "latest"  ) {

		// $("#clock").css({"display":"none"});		
		// alert("latest ") 
		link_colored_when_document_ready ('#bm1' , '#c51d20' , '#bmhr1_selected');

		// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=lates'  ,  '#more_loading img' ); 
	 	// ajax_send_data ( 'response' , 'fs_folders/modals/latest_modals/index.php?tres=2'  ,  '' );
	 	// ajax_send_data('home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=lates'  ,  '#more_loading img' )
 

	 	/*
		ajax_send_data(
			'fs-general-ajax-response',
			'fs_folders/modals/index_modals/latest_modals.php?tres='+2, 
			'more_loading img'
		);
		*/	   
		 	append_home(
			 	 "home_res",
			 	"fs_folders/modals/index_modals/latest_modals.php?tres=2", 
			 	"#more_loading img",
			 	'',
			 	'index'  // set this to load the second set of modals 24-45 i think
			);  
	 	// invisible_visible ( "visible" ,  more_loader ); 
	}
	if( fs_home_tab ==  "popularlooks"    )   
	{ 
		link_colored_when_document_ready ('#bm4' , '#c51d20' , '#bmhr4_selected');
	 	append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=plook'  ,   '#more_loading img' ); 
    }
    if( fs_home_tab ==  "popularmembers"  ) 
	{ 
		link_colored_when_document_ready ('#bm3' , '#c51d20' , '#bmhr3_selected');
	 	append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pmember' , '#more_loading img'); 
    }
   

	if( fs_home_tab ==  "populararticles" ) 
	{ 
		link_colored_when_document_ready ('#bm2' , '#c51d20' , '#bmhr2_selected');
	 	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=particle' , '#more_loading img') //#disabled temporarry 
	 	// alert("tab under construction ..");
	}
	if( fs_home_tab ==  "popularmedia") 
	{ 
		link_colored_when_document_ready ('#bm5' , '#c51d20' , '#bmhr5_selected');
	 	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pmedia'  , '#more_loading img' ); //#disabled temporarry 
		// alert("tab under construction ..");
	}
 }
function  latest_load () 
{
	// var counter = sessionStorage.ccounter;
	// document.getElementById('imgres').innerHTML =  1;
	// alert('latest loaded!');

	// var more_loader = '#more_loading img';
	// $(more_loader).css({'display':'none' });



	// append_home( 'home_res','fs_folders/modals/latest_modals/index.php?tres=1&home_tab=lates','#more_loading img');


	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=lates'   , '#home_tabs_change_loader img'   );
	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pblog'   , '#blog_tabs_change_loader img'   );
 	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pmember' , '#member_tabs_change_loader img' );
	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=plook'   , '#look_tabs_change_loader img'   );
	// append_home ( 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pphoto'  , '#photo_tabs_change_loader img'  );


	// alert('intialize');
}
function  top_blog_load () 
{
}
function  top_member_load () 
{
}
function  top_looks_load () 
{
}
function  top_photos_load () 
{
}  
function  img_mouseover( img_type , hide_el_id , show_el_id , Img_container_Hight , bg_color  ) 
{ 	
	var hover_bg_height = $(Img_container_Hight).height();
	var sum  = parseInt(hover_bg_height)+1;

	// alert(sum);

	$(bg_color).css({'height':sum})

	if ( img_type == 'look' ) 
	{
		$(hide_el_id).css('display','none');
		$(show_el_id).css({ 'display':'block','cursor':'pointer'});
		// $('#imgres').text('img type = '+img_type+' & hide = '+hide_el_id +' & show = '+show_el_id);
		// $('#imgres').text('mouse hover on look modals');
	} 
	else if ( img_type == 'user' ) 
	{ 
		$(hide_el_id).css('display','none');
		$(show_el_id).css({ 'display':'block','cursor':'pointer'});	
		// $('#imgres').text('img type = '+img_type+' & hide = '+hide_el_id +' & show = '+show_el_id);
		// $('#imgres').text('mouse hover on user modals');
	}
	else if ( img_type == 'particle' ) 
	{ 
	}
	else if ( img_type == 'pmedia' ) 
	{ 
	}
}
function img_mouseout(mouse_out_hide , mouse_out_show) 
{ 
	// alert('mouse out !');

	// var mouse_out_show = '#look_footer_bg_c';
	// var mouse_out_hide = '#look_mouserOver_bg , #look_mouserOver_c';

	$(mouse_out_show).css('display','block');	

	$(mouse_out_hide).css('display','none');	

	// $('#imgres').text('mouse leave');
}


 