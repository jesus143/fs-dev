/**
 * Created by Jesus on 9/24/2015.
 */


console.log('get started loaded');
function get_started_close() {
    console.log('closing the get started function');

    // Assign handlers immediately after making the request,
    // and remember the jqxhr object for this request
    var jqxhr = $.get( "fs_folders/modals/welcome/get_started.php", function(data) {
        console.log( "success = " + data );
    })
        .done(function() {

            location.reload();
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

    //send ajax to server and update member

}