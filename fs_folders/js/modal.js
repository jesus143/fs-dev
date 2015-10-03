function article_like_click(id) {
	get_login_stat ( ); 
	$('#article-like-' + id).attr('src', 'fs_folders/images/modal/look/liked.png'); 
}

function look_like_click( mno , table_id , table_name , rate_type , thumbsName , thumbs_id , id , trateid, name) {  
    get_login_stat ( ); 
	 





 
    console.log('working rate name = '  + name);
    modal_comment_like_dislike( mno , table_id , table_name , rate_type , thumbsName , thumbs_id , id , trateid, name)
}


function send_flag( action , table_id , table_name , comment, fileName) {
	get_login_stat ( ); 
    //set up url
    var url = 'fs_folders/modals/save/'+fileName+'.php?action='+action+'&table_id='+table_id+'&table_name='+table_name+'&comment='+$('#flag-comment').val();

    //console.log(url);

    //get option if flagged
    if(action == 'flag post') {
        var option = '&option=';
        var c = 0;

        for (i=0; i < 9; i++) {
            if($('#option-'+i).is(":checked")) {
                console.log('#option-'+i+ ' <--> checked');
                option += '-'+i;
            } else {

            }
        }

        console.log(option);
        url += option;
    }

    //hide modal
    if(action == 'stop notification') {
        alert('stop notification');
        $('.'+table_name+'-'+table_id+'-notification').fadeOut('fast');
    } else {
        alert('feed');
        $('.'+table_name+'-'+table_id).fadeOut('fast');
    }


    //send to server
    if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('flag-modal-container').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET',url,true);
    xmlhttp.send();
}



