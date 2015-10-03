 	 	
$(document).ready( function(){ 
	  
 
	initquey ( ) ;
	  

 
	function initquey ( )  
	{ 

		auto_fit_wondows ( );

		hover_body_menu_links( '#bm1' , '#bmhr1' );
		hover_body_menu_links( '#bm1' , '#bmhr1' );
		hover_body_menu_links( '#bm2' , '#bmhr2' );
		hover_body_menu_links( '#bm3' , '#bmhr3' );
		hover_body_menu_links( '#bm4' , '#bmhr4' );
		hover_body_menu_links( '#bm5' , '#bmhr5' );

		clock_checks( '#bmcttd1_1 span' , '#bmcttd1_0 img');
		clock_checks( '#bmcttd2_1 span' , '#bmcttd2_0 img');
		clock_checks( '#bmcttd3_1 span' , '#bmcttd3_0 img');		
		clock_checks( '#bmcttd4_1 span' , '#bmcttd4_0 img'); 
		clock_checks( '#bmcttd5_1 span' , '#bmcttd5_0 img');

		click_show_out_hide( '#clockimg', '#clock_drop_td' , '#clock_sh' ); 

		height_background_colors ( ) ; 

		mouseIn_hide_mouseOut_show( 'weee', 'wee' ) ; 

		click_link_change_content_home_tabs ('.latest'  , 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=lates'      , '#home_tabs_change_loader img'   , '/' );
		click_link_change_content_home_tabs ('.plook'   , 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=plook'      , '#look_tabs_change_loader img'   , 'popularlooks' );
		click_link_change_content_home_tabs ('.pmember' , 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pmember'    , '#member_tabs_change_loader img' , 'popularmembers');
		// click_link_change_content_home_tabs ('.pblog'   , 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=particle'   , '#blog_tabs_change_loader img'   , 'populararticles' ); //#temporary disabled 
 		// click_link_change_content_home_tabs ('.pphoto'  , 'home_res' , 'fs_folders/modals/latest_modals/index.php?tres=1&home_tab=pmedia'     , '#photo_tabs_change_loader img'  , 'popularmedia');  //#temporary disabled 



 		// alert("show init modals");

 		// $(".look_container_div").fadeIn("normal");

 
 		  // $(".look_container_div").fadeIn( "slow", function() {
		    // Animation complete 
		    // alert("done")
			    // for (var i = 0; i < 26 i++) {
			    //  	$("#look_footer_bgc"+1).css({"display":"block"});
			    // };
		   
		  // });

	}	
	function hover_body_menu_links( link , underline ) 
	{
		$(link).mouseenter(function() {
		$(underline).css({'border':'3px solid #c51d20'});
		})
		$(link).mouseout (function() {
			$(underline).css('border','1px solid #cccbc9');
		})	 
	}
	function clock_checks( sort_link , check_img) 
	{ 
		$(sort_link).mouseenter(function() {
			 $(check_img).css('display','block');
		})
		$(sort_link).mouseout (function() {
			$(check_img).css('display','none');
		})	 
	}
	function click_show_out_hide( id , sh , msout ) 
	{  
		$(id).mouseenter( function ( ) { 
			$(sh).css({'display':'block'});
		})
		$(msout).mouseout(function() {
			$(sh).css({'display':'none'});
		})	 
	}
	function click_show_click_hide() 
	{ 

		// under construction
	}
	function mouseIn_hide_mouseOut_show( mouseInOut , hideShowData ) 
	{

		// under construction 
	}
	function height_background_colors ( ) 
	{
		// var p = $("#moretd");
		// var mr = s/essionStorage.mr; // from homeajax.js init
		// $('#main_wrapper').css({'background-color':'#fffff','height':mr})
	}
	// function link_colored_when_document_ready (link_id , color , underline) {
		
	// 	 $(link_id).css({'color':color});
	// 	 $(underline).css({'border':'3px solid #c51d20','display':'block'});
	// }
 	function  auto_fit_wondows ( ) {

  		// under construction
 	}
 	function click_link_change_content_home_tabs (clickable_link , res_display , data , loader , url)
 	{ 
 		var links_array = [".latest",".pblog",".pmember",".plook",".pphoto"];
 		var links_array_underline = ["#bmhr1_selected","#bmhr2_selected","#bmhr3_selected","#bmhr4_selected","#bmhr5_selected"];
  		var loading_img = [ "#home_tabs_change_loader img", "#look_tabs_change_loader img", "#member_tabs_change_loader img ", "#blog_tabs_change_loader img ", "#photo_tabs_change_loader img ", "more_loading img "];

  		 // $(loader).css({'display':'block'});

		$(clickable_link).click(function () {

			if ( clickable_link == ".latest")  { hide_show( "hide" , "#clock" ); }
	 		if ( clickable_link == ".pmember") { hide_show( "hide" , "#clock" ); }
	 		if ( clickable_link == ".plook")   { hide_show( "hide" , "#clock" ); }
	 		if ( clickable_link == ".pblog")   { hide_show( "hide" , "#clock" ); }
	 		if ( clickable_link == ".pphoto")  { hide_show( "hide" , "#clock" ); }


	 		// if ( clickable_link == ".latest")  { hide_show( "hide" , "#clock" ); }
	 		// if ( clickable_link == ".pmember") { hide_show( "show" , "#clock" ); }
	 		// if ( clickable_link == ".plook")   { hide_show( "show" , "#clock" ); }
	 		// if ( clickable_link == ".pblog")   { hide_show( "show" , "#clock" ); }
	 		// if ( clickable_link == ".pphoto")  { hide_show( "show" , "#clock" ); }



	 		var loader1 = "#home_tabs_change_loader img , #look_tabs_change_loader img , #member_tabs_change_loader img , #blog_tabs_change_loader img , #photo_tabs_change_loader img , #more_loading img ";
 	

 			// alert(clickable_link);
			sessionStorage.ccounter = 1;  
			for (var i = 0; i < links_array.length; i++) 
			{

				$(links_array[i]).css({'color':'#cccbc9'});
		     	$(links_array_underline[i]).css({'border':'3px solid #cccbc9','display':'none'});
		     	invisible_visible ( "hidden" ,  loader1 ); 

			};

 
			if ( clickable_link == '.latest' ) 
			{
				link_colored_when_document_ready ('#bm1' , '#c51d20' , '#bmhr1_selected');
				invisible_visible ( "visible" ,  loading_img[0] );

			} 
			else if ( clickable_link == '.plook' ) 
			{
				link_colored_when_document_ready ('#bm4' , '#c51d20' , '#bmhr4_selected');
				invisible_visible ( "visible" ,  loading_img[1] );
			}
			else if ( clickable_link == '.pmember' ) 
			{
				link_colored_when_document_ready ('#bm3' , '#c51d20' , '#bmhr3_selected');
				invisible_visible ( "visible" ,  loading_img[2] );
			}
			else if ( clickable_link == '.pblog' ) 
			{
				link_colored_when_document_ready ('#bm2' , '#c51d20' , '#bmhr2_selected');
				invisible_visible ( "visible" ,  loading_img[3] );
			} 
			else if ( clickable_link == '.pphoto' ) 
			{
				link_colored_when_document_ready ('#bm5' , '#c51d20' , '#bmhr5_selected');
				invisible_visible ( "visible" ,  loading_img[4] );
			}
		 
			invisible_visible ( "visible" , loader );
			append_home_tabs(res_display,data,loader,url);
			// ajax_send_data( res_display , data , loader , url );
			// alert("sadasd");
		})
 	}
});
 