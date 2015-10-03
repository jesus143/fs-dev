/**
 * Created by Jesus on 9/30/2015.
 */

$(document).ready(function(){
    console.log('rate_article.js is ready');
    $('#rate-look-style').change(function(){

        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
            var jqxhr = $.get( "fs_folders/modals/postarticle/topics.php?page=rate-article&category="+$('#rate-look-style').val(), function(data) {
                console.log( "success" );
                $('#rate-look-topic').html(data);
                console.log('topics are loaded..');
            })
            .done(function() {
                console.log( "second success" );
            })
            .fail(function() {
               console.log( "error" );
            })
            .always(function() {
               console.log( "finished" );
            });
        // Perform other work here ...
        // Set another completion function for the request above
            jqxhr.always(function() {
                console.log( "second finished" );
            });
    });




});