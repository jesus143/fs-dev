
function thumbnail_clicked( table_id, mno ) { 
    console.log('plno = ' + plno + 'mno = ' + mno); 
    $('#details-thumbnails-loader').css('visibility','visible'); 
    //start the loading of data
    $( "#details-container-"+mno ).load("articledetails-dev-clicked.php?id="+table_id, function() { 
        $('#details-thumbnails-loader').css('visibility','hidden');
 
 		var timeout = setTimeout(function () {
     		console.log('hide all the loaded feed modal in details page '); 
	         console.log('load new modal according the style');
	         load_details_feed_modal();  
	         clearTimeout(timeout);
      	}, 1000) ;
    });  
}  