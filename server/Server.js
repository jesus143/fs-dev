




    function changeContent(action, showMore, result, type)
    {

        // loader show
        $('#view-log-activity-popup-loader').css('visibility','visible');

        var jqxhr = $.get( "../fs_folders/modals/Server/ServerLogActivityChangeContent.php?action=" + action + "&showMore=" + showMore , function(response) {


            // print the response
            var viewMore = response.split("<showmore>");
            var content = response.split("<content>");


            $('#view-more-container').html(viewMore[1]);

            if(type == 'append') {
                $(result).append(content[1]);
            } else {
                $(result).html(content[1]);
            }


            // hide the loader
            $('#view-log-activity-popup-loader').css('visibility','hidden');
        })
    }