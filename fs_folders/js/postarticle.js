$(document).ready(function() {


    // alert('working');
    // $('body').onmousemove(function(){
    //     console.log('change content'); 
    // })

});


function suggest_article_topic(response, fileName, loader, container, textFieldId) {    

	/*
	console.log('searching ' + fileName);
	var data = "?search="+$('#'+textFieldId).val(); 
	console.log(data);
	$('#'+container).css({'display':'block'}); 	
	$( '#'+loader  ).css({'display':'block'});     // show loader after the process happend
	 $( '#'+response ).load( 'fs_folders/modals/postarticle/'+fileName+'.php'+data  , function(d) {      // send data 
        $( '#'+loader  ).css({'display':'none'});     // hide loader after the process happend
         console.log(d);
    });
	*/
}


$(document).ready(function(){
    $('.postarticle-title-and-link-td, #postarticle-text-editor-container').click(function(){
        console.log('table container clicked');
        $('#autocomplete-dropdown-container-occasion-1, #autocomplete-dropdown-container-season-1').css('display', 'none');
    });
});