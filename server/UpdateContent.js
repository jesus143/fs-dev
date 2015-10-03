$(document).ready(function(){

    var url1 = '../fs_folders/modals/Server/addingNewQue.php';
    var url2 = '../fs_folders/modals/Server/invited_activity_log.php';
    var url3 = '../fs_folders/modals/Server/sendingNewInviteFromQueue.php';
    var url4 = '../fs_folders/modals/Server/invited_location_settings.php';
    var url5 = '../fs_folders/modals/Server/LookBookScrapeHomePage.php';

    var counter = 0;
    run(counter, url1, url2, url3, url3);
    setInterval(function(){
        counter++;
        run(counter, url1, url2, url3, url3);
    },60000);

    function run(counter, url1, url2, url3, url3)
    {
        counter++;
        //queue query
        var jqxhr = $.get( url1 + "?counter="+counter, function(response) {
            // alert( "success" + response );
            $('#queue-window-add-content').html(response);
        })
        .fail(function() {
            $('#queue-window-add-content').html( "error: " + url1 );
        })

        //view log
        var jqxhr = $.get( url2 + "?counter="+counter, function(response) {
            // alert( "success" + response );
            $('#activity-log-window-view').html(response);
        })
        .fail(function() {
                $('#activity-log-window-view').html( "error: " + url2 );
            })

        //send query
        var jqxhr = $.get( url3 + "?counter="+counter, function(response) {
            // alert( "success" + response );
            $('#invited-window-send-email').html(response);
        })
        .fail(function() {
            $('#invited-window-send-email').html( "error: " + url2 );
        })

        //settings
        var jqxhr = $.get( url4 + "?counter="+counter, function(response) {
            // alert( "success" + response );
            $('#location-settings-view').html(response);
        })
        .fail(function() {
            $('#location-settings-view').html( "error: " + url2 );
        })

        //lookbook status
        var jqxhr = $.get( url5 + "?counter="+counter, function(response) {
            // alert( "success" + response );
            $('#lookbook-homepage-status-view').html(response);
        })
        .fail(function() {
            $('#lookbook-homepage-status-view').html( "error: " + url2 );
        })
    }
});