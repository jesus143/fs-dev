init (); 

lookdetails = new Object();
win = new Object();  

lookdetails.test = " mouse over in the tags.."; 
function init () {
	latest_load (); 
	// sessionStorage.mr = 1730 ;  with banner  
	//sessionStorage.mr = 1600;  //with no banner with padding button
	// sessionStorage.mr = 1600;
	sessionStorage.ccounter = 1;   
	// alert('start'); 									     
}
function  latest_load () {
	// var counter = sessionStorage.ccounter;
	// document.getElementById('imgres').innerHTML =  1;
	// alert('latest loaded!');  
	// var more_loader = '#more_loading img'; 
	// $(more_loader).css({'display':'none' }); 
	// append_home('home_res','home_data/modals/index.php?tres=1&home_tab=lates','#more_loading img');  #disable because modal is already loaded in init 
}
function  top_blog_load () {
} 
function  top_member_load () {
}   
function  top_looks_load () { 
} 
function  top_photos_load () { 
} 
function more_click ( ) {

	// alert(' more_click ( )'); 
	// var home_counter = 2;
	var more_loader = '#more_loading img'; 
	var counter = sessionStorage.ccounter;
	counter = parseInt(counter)+1;
	sessionStorage.ccounter = counter; 
	// alert(counter); 
    // document.getElementById('imgres').innerHTML =  counter; 
	/* 
	var mr = sessionStorage.mr; 
	mr = parseInt(mr)+989;
	sessionStorage.mr = mr; 
	// alert(mr);
	$('#main_wrapper').css({'background-color':'#fffff','height':mr})
	//
	*/  
	$(more_loader).css({'display':'block' });
	append_home('home_res','home_data/modals/index.php?tres='+counter,more_loader); 
	// setTimeout(function(){more_click ( ) },5000);
}
function  img_mouseover( img_type , hide_el_id , show_el_id ) { 
	if ( img_type == 'look' ) { 
		$(hide_el_id).css('display','none');
		$(show_el_id).css({ 'display':'block','cursor':'pointer'});	
		// $('#imgres').text('img type = '+img_type+' & hide = '+hide_el_id +' & show = '+show_el_id);
		// $('#imgres').text('mouse hover on look modals');
	} 
	else if ( img_type == 'blog' ) {  
	}
	else if ( img_type == 'photo' ) {  
	}
	else if ( img_type == 'user' ) { 
		$(hide_el_id).css('display','none');
		$(show_el_id).css({ 'display':'block','cursor':'pointer'});	
		// $('#imgres').text('img type = '+img_type+' & hide = '+hide_el_id +' & show = '+show_el_id);
		// $('#imgres').text('mouse hover on user modals');
	}
}
function img_mouseout( mouse_out_hide , mouse_out_show ) { 
	// alert('mouse out !'); 
	// var mouse_out_show = '#look_footer_bg_c';
	// var mouse_out_hide = '#look_mouserOver_bg , #look_mouserOver_c'; 
	$(mouse_out_show).css('display','block'); 
	$(mouse_out_hide).css('display','none');	 
	// $('#imgres').text('mouse leave');
} 
	// function circle_tag_mouseover( tg ,  ) {  
	//  	lookdetails.tagClass = tg; 
	// 	lookdetails.tagdivcontainer = tg+"-tag-div";
	//    	$(lookdetails.tagdivcontainer).css({"display":"block"});
	// } 
	// function circle_tag_mouseout( tg )  {
	//  	lookdetails.tagClass = tg;
	//  	lookdetails.tagdivcontainer = tg+"-tag-div"; 
	//  	$(lookdetails.tagdivcontainer).css({"display":"none"});
	// } 
function hide_look_foooter_rectangle()  { 
	var element = "#lf_div_container"; 
	if ( $(element).css('visibility') == 'hidden') {  
		$(element).fadeIn("slow",function ( ) { 
			$(element).css('visibility','visible'); 
		});  
	}else {  
		$(element).fadeOut("slow", function ( ) { 
			$(element).css('visibility','hidden'); 
		}); 
	} 
} 
thumnail = new Object(); 
function thumbnail_clicked( plno, mno ) {


    console.log('plno = ' + plno + 'mno = ' + mno);
    //console.log('this is the log');
    //alert('working now');
	// alert("Thumbnail clicked "); 
	// alert(sessionStorage.Tplnos ) // from lookdetails query init. 
	// alert(sessionStorage.generated_plnos[2]);
	// for (var i = 0; i < 4; i++) {  
		// $("#thumbnail"+sessionStorage.plnos[i]).css({"border":"1px solid green"});
	// };

	//$("#plno").text(plno);
    // load_look_picture_and_tags( plno );
   // $("#thumbnail"+plno).css({"border":"1px solid red"});


    //$('#'+loader).css('visibility','visible');

    //alert('loader show');
    //$( "#details-container-"+plno ).load("lookdetails-dev.php?id="+plno, function(){
    //    alert('loaded and loader hide');
    //});

    //show loader
    $('#details-thumbnails-loader').css('visibility','visible');

    //start the loading of data
    $( "#details-container-"+mno ).load("lookdetails-dev-clicked.php?id="+plno, function() {


        $('#details-thumbnails-loader').css('visibility','hidden');
 
 		var timeout = setTimeout(function () {
     		console.log('hide all the loaded feed modal in details page '); 
	         console.log('load new modal according the style');
	         load_details_feed_modal();  
	         clearTimeout(timeout);
      	}, 1000) ;
    });


    /**
     * @group_id is the container of the first modal show in the details page and that is the look id
     * @plno is the posted look id
     */
    //$.get("lookdetails-dev-clicked.php?id="+plno, function( data ) {
        //$("#details-container-"+mno).html(data);
        //document.getElementById("details-container-"+mno).innerHTML = data;


    //});

    // change number of the thumbnails here..

}  
function load_look_nex_prev ( stat , plno ) { 

 	// alert("load nex prev"+plno);
 	// load_look_title ( plno );
 	// look_look_owner_info ( );
 	// load_look_picture_and_tags( );
 	// load_look_comments();  


 //  	thumnail.sc = ajax_send_data( 
 // 	  	"next_prev" , 
 // 	  	"fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_nex_prev&plno="+plno, 
 // 	  	null 
	// ); 
 // 	// alert(thumnail.sc);
 // 	if ( stat == "prev" ) {
 // 		alert("prev"+id);  
 // 	}else{
 // 		alert("next"+id);
 // 	}
 // alert(plno);  
}  
function load_look_title ( plno ) { 
 
	alert("load title"); 
}  
function look_look_owner_info ( plno ) {  

	alert("load look owner info");
} 
function load_look_picture_and_tags( plno ) {   
	// alert('load look modal')
	thumnail.sc = print_new_look( 
	  	"banner_view_and_look_view" , 
	  	"fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_picture_and_tags&plno="+plno, 
	  	null , 
	  	plno
	)   
	// change_url ( 'lookdetails?id='+plno , '' );  
	// change_url("?id="+plno  , '' );   
} 
function load_look_comments( plno ) {

	 alert("load look comments ");
}    
function load_look_view_footer_attribute ( ) {  
} 
function size_of_the_look ( ) {
	  // win.gitason  = $(window).height(); 

		 if (  win.gitason > 493 ) {
		 	$("#look_view_img").css({"height":"200px"});
		 }else{ 
		 	$("#look_view_img").css({"height":"600px"});

		 } 
	 	/*
	 		auto resize and detect height and widht of the look
			$(window).resize(function() { 
	            win.gitason  = $(window).height(); 
	            // win.gitason = win.gitason-50;
	            // win.gilapdon = $(window).width();
	            $("#look_view_img").css({"height":win.gitason});
	            // alert("height"+win.gitason);

	        }); 
	        // win.gitason = win.gitason-50;
	        $("#look_view_img").css({"height":win.gitason});
		*/	 
}
function look_details_look_view_over( ) { 

	 	alert("mouse over to look image ");
} 
 
