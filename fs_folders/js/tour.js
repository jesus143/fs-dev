/**
 * Created by Jesus on 7/3/2015.
 */
/**
 * id1 is the current displayed and will fadeaway
 * id2 is the next view and will show
 * @param id1
 * @param id2
 */
function tour_next(id1, id2) {

    $(id1).css('display', 'none');
    $(id2).fadeIn('fast');

    //bullet points start in the beggining
    tour_bullet_points(1, 4);
}

function tour_done( ) {

    console.log ('tour closing..');
    // Assign handlers immediately after making the request,
   // and remember the jqxhr object for this request
    var jqxhr = $.get( "fs_folders/modals/welcome/tour.php", function(data) {
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


/**
 * id is the number of the id specifically clicked
 * total is the total elements
 * c is the content id
 * b is the bullet id
 *
 * @param id
 * @param total
 * @param c
 * @param b
 */
function tour_bullet_points(id, total, c, b) {

    //hide all first
    for(i=1; i<=total; i++) {
        $(b+i).css('color','grey');
        $(c+i).css('display','none');
    }

    //display selected
    $(b+id).css('color','black');
    $(c+id).css('display','block');
}


$(document).ready(function(){
   $('#tour-message-close').click(function(){
       tour_done( );
   })
});