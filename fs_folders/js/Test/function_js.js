
/*
 abort
 Stops the current request.
 getAllResponseHeaders()
 Returns the response headers as a string.
 getResponseHeader("headerLabel")
 Returns a single response header as a string.
 open("method", "URL"[, asyncFlag[, "userName"[, "password"]]])
 Initializes the request parameters.
 send(content) 
 Performs the HTTP request. 
 setRequestHeader ("label", "value") 
 Sets a HTTP request header.
 onreadystatechange 
 Used to set the callback function that handles request state changes. 
 readyState 
 Returns the status of the request: 
 0 = uninitialized  
 1 = loading  
 2 = loaded      
 3 = interactive         
 4 = completev  
 responseText   
 Returns the server response as a string. 
 responseXML
 Returns the server response as an XML document that can be manipulated using JavaScript's DOM functions.
 status
 Returns the status code of the request.  
 statusText   
 Returns the status message of the request.  
 */
/*
 blind
 bounce
 clip
 Drop
 explode 
 fold  
 Highlight
 Puff
 Pulsate
 Scale
 Shake
 Size
 Slide
 */
// src  for detect windows close or opened : http://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_win_closed
data = new Object();
var c = 0;
func_init ( );
function func_init ( ) {

    // initialized time interval and look details 

    sessionStorage.message_time_interval = 300;
    var rate_style  = '';
    var rate_looks  = '';
    var rate_status =  '';

    // set detect if log in or not login
    //  logout_interaction_response (  sessionStorage.mno );   => function used to detect if redirect sign up allow user to interact the site such as ratings , drip , favorites and so on. . .

    var mno = String( getCookie('mno') );
    var mno = mno.replace("undefined","136");
    sessionStorage.mno  = mno;



    // set session 

    // set_center( "#popup-container" );
    // alert("func init");
    // <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script> 

    // show general popup
    // sessionStorage.home = 1; 
    sessionStorage.ccounter = 1;   //
    sessionStorage.clickcount = ''; // post article counter
}
function test1() {

    alert('you are connected with function js ');


}
function Go(location)  {

    window.location = location;
}
function live_ajax_load() {

}
function lookdetails_loaded ( mno ) {

    // ajax_send_data('comments_result','look_comment_items/look-comments_display.php');
    // alert("mno = "+mno);
    lookdetails_thumbnail(
        "lookdetails_thumbnail" ,
        "fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_thumbnail&mno="+mno ,
        "load"
    );

    // ajax_send_data(
    //  "fs-general-ajax-response" ,
    //  "fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_thumbnail&mno="+mno ,
    //  "load" 
    // );




    look_show_hide_tags( );
}
function replace_all_space_with(subject, replace)
{
    return subject.replace(/\s/g,replace);
}
function replace_all (subject , find , replace ) {
    var url1=subject.split(find);
    //alert(url1);
    var new_str = '';
    for (var i = 0; i <= url1.length; i++)  {
        new_str += url1[i]+replace;
    };
    new_str = new_str.substring(0, subject.length);
    //alert(new_str);
    return new_str
}
function live_comment_initialize(){
    // alert('comment load');
    // document.getElementById('comment_loader').innerHTML = "<img src='images/loading 2.gif' >";
    ajax_send_data(
        'comments_result',
        'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=init&sort_comment=order by plcno desc',
        'comment_loader'
    );
    //print current comments..
    // ajax_send_data('comments_result','fs_foldsers/fs_lookdetails/look_comment_items/test1.php','comment_loader img'); //print current comments..
    // alert('comments are loaded'); 
    // setTimeout(function() {
    // alert('start auto load now '); 
    // live_comment_checker();
    // } ,7000);
}
function live_comment_checker(){

    // alert('check initial ');
    //  setTimeout(function(){
    //  live_check_new_comment();
    // },5000);
    // live_check_new_comment() 
}
function live_check_new_comment(){
    // alert('checking database if there is new comments'); 
    //  live_append_new_Comment();
    //  setTimeout(function(){ 
    //  live_comment_checker();
    // },60000);    
}
function live_append_new_Comment(){

    // ajax_insert_and_append_result('comments_result','look_comment_items/look-comments_display.php?post_comment=live_check_new_message','comment_loader'); 
}
function random_numers(num){

    rnum=Math.floor((Math.random()*num)+1);
    return rnum;
}
function ajax_send_data_html( response , data , loader , page ) {

    /*
     response => this is the result id or class
     data    => this is the data to be sent to the function 
     loader      => this is the loader before the result shows
     page    => this is the if else condition and to identify if what pages is the corrent code to be executed
     */

    $( loader  ).css({'visibility':'visible'});
    $( response ).load( data , function() {
        $( loader  ).css({'visibility':'hidden'});
    });
}
function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}
function ajax_send_data( view_result_id , data , loader , page , id , id_1 ) {

    //alert(loader);
    $('#'+loader).css('visibility','visible');
    // alert('append is working'+view_result_id+","+data+","+loader);
    // alert('working data = '+data+' view result as = '+view_result_id);
    // document.getElementById(view_result_id).innerHTML = "<img src='images/loading 2.gif' >";
    // getID(view_result_id).style.background="#000 url('images/loading 2.gif') center no-repeat";

    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var notification_stat = true;
            if(page == 'signup-status'){

                var response   = xmlhttp.responseText.split("<response>");


                if(response[1] != "success") {
                    alert(response[1]);
                }

            }
            else if (page == 'invited-change-content') {

                //split info
                var invitedMenu   = xmlhttp.responseText.split("<invited-menu>");
                var invitedMenuBool   = xmlhttp.responseText.split("<invited-menu-bool>");
                var invitedContent   = xmlhttp.responseText.split("<invited-content>");

                //change main content
                document.getElementById(view_result_id).innerHTML = invitedContent[1];

                //change menu  if the status dropdown change 
                if (invitedMenuBool[1] == 'change invited menu')
                {
                    document.getElementById('invite_menu').innerHTML = invitedMenu[1];
                    // alert(invitedMenu[1]);   
                }
                else{
                    // alert('undifined result invited menu no change');
                }

                // alert('1 = ' + invitedMenu[1] + '1 = ' +invitedMenu[2] ); 
                $('#'+view_result_id).css('display','none');
                // $('#'+view_result_id).show( "drop", 500 );  
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');

            }
            else if ( page == 'modal-comment-edit' ) {
            }
            else if ( page == 'invited-people-update' ) {

                // get the design data to be replace  

                var design   = xmlhttp.responseText.split("<design>");

                // clean first data

                document.getElementById(view_result_id).innerHTML = '';

                // replace the new data 

                document.getElementById(view_result_id).innerHTML = design[1];

                // alert success and close popup 

                alert( 'info successfully updated' );
                fs_popup( 'close' );

                // make the border color bolder 

                $('#'+view_result_id).css('border','2px solid green');
            }
            else if( page == 'modal-insert' ) {

                $('#'+loader).css('visibility','hidden');
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;

                if ( id == 'edit' ) {

                    location.reload();

                } else {

                    $('#upload-modal').submit();
                }
            }
            else if ( page == 'modal-attribute' ) {
                $(loader).css('display','none');
                alert( 'this is the modal attribue response'  );
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
            }
            else if ( page == 'insert-new-chat-message' ){

                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
            }
            else if ( page == 'view-messages-load' ){
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'print-new-chat-message' ) {
                // alert( 'checked' );
                var message =xmlhttp.responseText.split("<modal>");
                if ( message[1] != 'no new message' ) {
                    // alert( 'found new message audio start ' );
                    // document.getElementById("audio-alert").innerHTML = "<embed id='sample' src='fs_folders/images/audio/beeping-sound.mp3' type='application/x-mplayer2'></embed>";   
                    $("#chat-message-container").append( message[1] )
                    $('#'+view_result_id).css('display','none');
                    $('#'+view_result_id).fadeIn('slow');
                    $("#chat-message-container").animate({ scrollTop: $('#chat-message-container')[0].scrollHeight}, 1000);
                }
                start_live ( 'message-chat-box' );
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
            }
            else if ( page == 'rate-look' ) {
                notification_stat = false;
                // alert(nextprev2[1]); 
                var tres =xmlhttp.responseText.split("<tres>");
                if ( tres[1] == 0) {
                    alert('Result Found '+tres[1]);
                    // alert('page is rate-look '); 
                    var nextprev1 =xmlhttp.responseText.split("<nextprev1>");
                    // alert(nextprev1[1]);
                    var nextprev2 =xmlhttp.responseText.split("<nextprev2>");
                    document.getElementById('rate-next-prev-up').innerHTML   =  nextprev1[1];
                    document.getElementById('rate-next-prev-down').innerHTML =  nextprev2[1];
                }
                else{
                    // alert('page is rate-look '); 
                    var nextprev1 =xmlhttp.responseText.split("<nextprev1>");
                    // alert(nextprev1[1]);
                    var nextprev2 =xmlhttp.responseText.split("<nextprev2>");

                    document.getElementById('rate-next-prev-up').innerHTML   =  nextprev1[1];
                    document.getElementById('rate-next-prev-down').innerHTML =  nextprev2[1];

                    // show modals for ratings  
                    // alert if the retrieving of modals is empty or not 
                    // alert( 'modal ready to load' ); 
                    look_comment_number_clicked( 1 , null , 'rate-look' );

                }
            }
            else if ( page == 'look-details-delete-look') {

                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).show( "drop", 500 );
                $('#'+loader).css('visibility','hidden');
                if ( id == 'dont-redirect') {

                    $(id_1).css({'display':'none'});

                    // alert( 'dont redirect but hide  ');
                }
                else{
                    Go('?id='+id);
                }
            }
            else if ( page == 'login-form' ){

                var m =xmlhttp.responseText.split("<mno>");
                var mno = parseInt(m[1]);
                $('#'+loader).css('visibility','hidden');
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;

                if ( mno > 0 ) {
                    Go('login-authentication.php');
                }
                else{
                    shake( );
                }
            }
            else if ( page == 'signup-form' ) {

                // alert('sign up form ');
                var m =xmlhttp.responseText.split("<mno>");
                var mno = parseInt(m[1]);
                var fn =xmlhttp.responseText.split("<fname>");
                var e =xmlhttp.responseText.split("<email>");
                var p =xmlhttp.responseText.split("<pass>");
                var sc =xmlhttp.responseText.split("<signupcode>");
                var q =xmlhttp.responseText.split("<question>");

                var error = '';



                // alert(  sc[1]+ fn[1] );
                // alert(fn[1]);
                // alert(e[1]);
                // alert(p[1]);  
                // alert(q[1]);   
                // var f = $('#signup-fname').val();
                // var e = $('#signup-email').val();
                // var p = $('#signup-pass').val();   

                // alert( 'email = '+e[1]+' first name = '+fn[1]+' password = '+p[1]+' code = '+sc[1]+' question = '+q[1] ); 

                if ( fn[1] == 'fname-error' ) {
                    // alert('change red border fn'); 
                    $('#signup-fname').css('border','1px solid #b32727');
                    error = 1;
                }
                else{

                    $('#signup-fname').css('border','1px solid grey');
                }

                if ( e[1] == 'email-error' ) {
                    // alert('change red border email')
                    $('#signup-email').css('border','1px solid #b32727');
                    error = 1;
                }
                else{

                    $('#signup-email').css('border','1px solid grey');
                }

                if ( p[1] == 'pass-error' ) {
                    $('#signup-pass').css('border','1px solid #b32727');
                    error = 1;
                    // alert('change red border pass') 
                }
                else{

                    $('#signup-pass').css('border','1px solid grey');
                }

                if ( sc[1] == 'signupcode-error' ) {
                    $('#signup-code').css('border','1px solid #b32727');
                    error = 1;
                    // alert('change red border pass') 
                }
                else{

                    $('#signup-code').css('border','1px solid grey');
                }

                if ( q[1] == 'question-error' ) {
                    $('#signup-uanswer').css('border','1px solid #b32727');
                    error = 1;
                    // alert('question error') 
                }
                else{

                    $('#signup-uanswer').css('border','1px solid grey');
                }

                // shake form when error found

                if ( error == 1 ) {
                    shake( );
                }
                else{

                    // Go('login-authentication.php'); 
                }


                $('#'+loader).css('visibility','hidden');
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;

                if ( mno > 0 ) {
                    Go('login-authentication.php');
                }
            }
            else if ( page == 'rcpass-form' ) {
                var er =xmlhttp.responseText.split("<error>");
                if ( er[1] == 'error-found' ) {
                    shake( );
                }
                $('#'+loader).css('visibility','hidden');
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
            }
            else if ( page == 'signup-code' ){

                var s =xmlhttp.responseText.split("<status>");
                // alert( 'sign code process done ! status ='+s[1] );  

                // loader hide 
                $('#'+loader).css('visibility','hidden');

                // result 
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;

                // reload page 
                if ( s[1] == true ) {
                    location.reload();
                }
            }
            else if ( page == 'welcome-popup-about' ) {

                $('#'+loader).css('visibility','hidden');
                var er =xmlhttp.responseText.split("<error>");
                var fname =xmlhttp.responseText.split("<fname>");
                var lname =xmlhttp.responseText.split("<lname>");
                var gender =xmlhttp.responseText.split("<gender>");
                var byear =xmlhttp.responseText.split("<byear>");
                var country =xmlhttp.responseText.split("<country>");
                var province =xmlhttp.responseText.split("<province>");
                var city =xmlhttp.responseText.split("<city>");
                var zipcode =xmlhttp.responseText.split("<zipcode>");


                // alert(er[1]);
                // alert( gender[1]); 


                var fe = false;



                if ( fname[1] == 'first name required'  )   {
                    color ( '#fname-err' , '#fname' , 'error' );
                    fe = true;
                }
                else{
                    color ( '#fname-err' , '#fname' , 'success' );
                }

                if ( lname[1] == 'last name required' ) {
                    color ( '#lname-err' , '#lname' , 'error' );
                    fe = true;
                }
                else{
                    color ( '#lname-err' , '#lname' , 'success' );
                }
                if ( gender[1] == 'gender required') {
                    color ( '#gender-err' , '#gender' , 'error' );
                    fe = true;
                    // alert('gender '); 
                }
                else{
                    color ( '#gender-err' , '#gender' , 'success' );
                }
                if ( byear[1] == 'byear required' ) {
                    fe = true;
                    color ( '#byear-err' , '#byear' , 'error' );
                    // alert('byear '); 
                }
                else{
                    color ( '#byear-err' , '#byear' , 'success' );
                }
                if ( country[1] == 'country required' ){
                    fe = true;
                    // alert('county'); 
                    color ( '#country-err' , '#country' , 'error' );
                }
                else{
                    color ( '#country-err' , '#country' , 'success' );
                }
                if ( province[1] == 'province required' ) {
                    fe = true;
                    // alert('province'); 
                    color ( '#state-err' , '#state' , 'error' );
                }
                else{
                    color ( '#state-err' , '#state' , 'success' );
                }
                if ( city[1] == 'city required' ) {
                    fe = true;
                    // alert('city'); 
                    color ( '#city-err' , '#city' , 'error' );
                }
                else{
                    color ( '#city-err' , '#city' , 'success' );
                }

                if ( zipcode[1] ==  'zipcode required' ) {
                    fe = true;
                    // alert('zcode'); 
                    color ( '#zipcode-err' , '#zipcode' , 'error' );
                }
                else{
                    color ( '#zipcode-err' , '#zipcode' , 'success' );
                }
                if ( er[1] == 'username exist' ) {
                    fe = true;
                    // alert('username'); 
                    color ( '#uname-err' , '#uname' , 'error' );
                }
                else{
                    color ( '#uname-err' , '#uname' , 'success' );
                }


                if ( fe == false ) {
                    welcome_page_loaded_content ( true , '' , '#welcome-result-container' , 'fs_folders/login/pages/welcome/welcome-suggested-member.php'  , '#more_loading3 img' ,  '3'  );
                }
                else{
                    // alert('with error ');
                }

                // document.getElementById( 'res' ).innerHTML = xmlhttp.responseText; 
                document.getElementById( view_result_id ).innerHTML = xmlhttp.responseText;
            }
            else if ( page == 'success-popup' ) {

                // var pos = set_position_of_response_popup( 10 ); 
                // gen_popup( 'hide' );
                $('#popup-response').css( 'margin-top' , '200' );

                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                // $('#'+view_result_id).show( "drop", 500 );  
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
                // auto_hide_response_popup_container ( 5000 );  
            }
            else if ( page == 'profile-tabs'){

                // alert('response'+xmlhttp.responseText);
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'modal-comment' ) {

                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                // $('#'+view_result_id).show( "drop", 500 );  
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'notification' ) {
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                // $('#'+view_result_id).show( "drop", 500 );  
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'postarticle-next-prev' ) {
                notification_stat = false;
                var imagecounter   = xmlhttp.responseText.split("<counter-image>");
                var videocounter   = xmlhttp.responseText.split("<counter-video>");

                var ic = imagecounter[1];
                var vc = videocounter[1];

                // alert( 'image counter = '+ic+'video counte ='+vc ); 
                if ( ic != 'remain') {
                    document.getElementById('counter-image').innerHTML = ' &nbsp; '+ic+' of ';
                    // document.getElementById('counter-video').innerHTML = ' &nbsp; '+vc+' of ';       
                }
                if ( vc != 'remain') {
                    // document.getElementById('counter-video').innerHTML = ' &nbsp; '+start_video
                    document.getElementById('counter-video').innerHTML = ' &nbsp; '+vc+' of ';
                };
                // alert( xmlhttp.responseText );
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;

                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');

                // hide upload image 
                // if ( $('#article-upload-image').val() == 0 ) {
                //  $('#content-nofound-image').css('display','none');  
                // } 
                // else{
                //  $('#content-nofound-image').css('display','block');     
                // }      
            }
            else if ( page == 'postarticle-retrieved-data' ){
                // document.getElementById(view_result_id).innerHTML = xmlhttp.responseText 

                var imgdisplay   = xmlhttp.responseText.split("<imgdisplay>");
                var titledisplay = xmlhttp.responseText.split("<titledisplay>");
                var description  = xmlhttp.responseText.split("<description>");
                var videodisplay = xmlhttp.responseText.split("<videodisplay>");
                var keyword      = xmlhttp.responseText.split("<keyword>");
                var imagetres    = xmlhttp.responseText.split("<imagetres>");
                var videotres    = xmlhttp.responseText.split("<videotres>");
                var allowimage   = xmlhttp.responseText.split("<allowimage>");




                var t = titledisplay[1];
                var d = description[1];
                var k = keyword[1];

                // image 
                var i           = imgdisplay[1];
                var itr         = imagetres[1];
                var start_image = 0;
                //  show hide nofound and arrow left and right

                if ( itr == 1 ) {
                    var start_image = 1;
                    $('#content-nofound-image').css('display','none');
                    $('#postarticle-next-prev-image-div').css('display','none');
                    // alert( ' 1 ' )
                }
                else if ( itr > 1 ) {
                    var start_image = 1;
                    $('#content-nofound-image').css('display','none');
                    $('#postarticle-next-prev-image-div').css('display','block');
                }
                else{
                    // alert( ' zero result ' )
                    $('#content-nofound-image').css('display','block');
                    $('#postarticle-next-prev-image-div').css('display','none');
                }
                // video   
                var v = videodisplay[1];
                var vtr = videotres[1];
                var start_video = 0;
                //  show hide nofound and arrow left and right 
                if ( vtr == 1 ) {
                    var start_video = 1;
                    $('#content-nofound-video').css('display','none');
                    $('#postarticle-next-prev-video-div').css('display','none');
                    // alert( ' 1 ' )
                }
                else if ( vtr > 1 ) {
                    var start_video = 1;
                    $('#content-nofound-video').css('display','none');
                    $('#postarticle-next-prev-video-div').css('display','block');
                }
                else{
                    // alert( ' zero result ' )
                    $('#content-nofound-video').css('display','block');
                    $('#postarticle-next-prev-video-div').css('display','none');
                }






                // image
                if ( allowimage[1] == 1 ) {
                    document.getElementById('content-image').innerHTML = i;
                    document.getElementById('stat-image').innerHTML = itr+' IMAGES FOUND / ';
                    document.getElementById('counter-image').innerHTML = ' &nbsp;  '+start_image+' of ';
                    document.getElementById('stat-image-1').innerHTML = ' &nbsp; '+itr;
                }
                // video
                document.getElementById('content-video').innerHTML = v;
                document.getElementById('stat-video').innerHTML = vtr+' VIDEO FOUND / ';
                document.getElementById('counter-video').innerHTML = ' &nbsp; '+start_video+' of ';
                document.getElementById('stat-video-1').innerHTML = ' &nbsp; '+vtr;


                // attribute



                document.getElementById('postarticle-title').innerHTML = t;
                document.getElementById('postarticle-description').innerHTML = d;
                document.getElementById('postarticle-keyword').innerHTML = k;





                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');





                // hide upload image 
                // if ( $('#article-upload-image').val() == 1 ) {
                //  $('#content-nofound-image').css('display','none');  
                // } 
                // else{
                //  $('#content-nofound-image').css('display','block');     
                // }


                // alert( ' url loaded ' );
            }
            else if ( page == 'postarticle-suggested-keyword' ) {

                var keywprd   = xmlhttp.responseText.split("<keyords>");
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'postarticle-insert' ) {

                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');



                // alert( 'redirecting now image = '+id )
                if ( id_1 == 'edit') {
                    location.reload();
                }
                else if ( id == 'image' ) {
                    // Go( 'photo.resize.php?type=upload-article-and-resize' ); 
                    $('#upload-article').submit();
                }
                else{
                    // alert( 'video' ); 
                    Go( 'photo.resize.php?type=upload-article-and-resize' );
                }
            }
            else if ( page == 'search-field' ) {

                // alert( ' search here result ' );
                document.getElementById(view_result_id).innerHTML = '';
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'search-field-view-more' ) {
                document.getElementById(view_result_id).innerHTML = '';
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                $('#'+loader).css('visibility','hidden');
            }
            else if ( page == 'drip-modal') {

                notification_stat = false;
                $('#'+view_result_id).css('display','none');
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
            }
            else if ( page == 'scrape-changeTime') {
                $('#'+loader).css('visibility','hidden');
                var response = xmlhttp.responseText.split("<response>");
                var reason = xmlhttp.responseText.split("<reason>");
                if(response[1] == 1) {
                    alert('Update successfully');
                } else {
                    alert('Failed ' + ' because ' + reason[1]);
                }
            }
            else if ( page == 'fs-invited-location-change-time') {
                //alert('change time' + '#'+loader);
                //document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
                $('#'+loader).css('visibility','hidden');
                //$('#'+loader).css('visibility','visible');
                //$('#fs_invited_location_send_tim1-170-loader').css('visibility','hidden');


            }
            else{

                // alert('replace new content '+view_result_id);
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText

                $('#'+view_result_id).css('display','none');
                // $('#'+view_result_id).show( "drop", 500 );  
                $('#'+view_result_id).fadeIn('slow');
                $('#'+loader).css('visibility','hidden');
            }
            // notification disabled because in the rated page it didn't continue to display the modals
            // alert( 'notification as '+notification_stat );
            if ( notification_stat == true ) {
                // alert( 'with notification' );
                // notification( );   
            }
            else{
                // alert( 'no notification ' );
            }
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function color ( err_id , field_id , stat ) {

    if ( stat == 'error' ) {
        $(field_id).css({'border':'1px solid #b32727'});
        $(err_id).css('display','block');
    }
    else{
        $(field_id).css({'border':'1px solid white'});
        $(err_id).css('display','none');
    }
}
function shake( ) {
    $('#login-body-container').css('display','none');
    $('#login-body-container').show( "shake", 500 );
}
function checkEventIDClass( view_result_id , data , phpfile , loader ) {

    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: params,
        success: function(view_result_id) {
            callback(view_result_id);
        }
    });
}
function bool_show_hide( view_result_id , data , show , hide , loader ) {

    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;


            // alert('this is splited'+r[0]);
            // alert(xmlhttp.responseText.indexOf('true'));
            if (xmlhttp.responseText.indexOf('true') > 0 )
            {
                // alert('true');
                $(hide).css({'display':'none'})
                $(show).css({'display':'block'})
            }

            else if (xmlhttp.responseText.indexOf('false'))
            {
                // alert('false');
                $(show).css({'display':'none'})
                $(hide).css({'display':'block'})
            }

            $(loader).css('visibility','hidden');
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function prepend( view_result_id , data , loader , page , id ) {
    // alert('working data = '+data+' view result as = '+view_result_id);
    // document.getElementById(view_result_id).innerHTML = "<img src='images/loading 2.gif' >";
    // getID(view_result_id).style.background="#000 url('images/loading 2.gif') center no-repeat";

    // alert(' show loader '+loader);

    $(loader).css('visibility','visible');
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


            if ( page == 'modal-comment') {

                var comment = xmlhttp.responseText.split("<modal-comment>");
                $('#'+view_result_id).prepend(comment[1]);
                $('#modal-comment-field'+id).val('');

            } else if ( page == 'invited-people-insert' ) {



                var email = xmlhttp.responseText.split("<email>");
                var design = xmlhttp.responseText.split("<design>");



                // alert(  email[1]+design[1] )
                if ( email[1] == '0' ) {

                    alert( 'email exist' );
                }
                else{

                    // popup to inform data succesffuly added 

                    // alert( 'info successfully added' )

                    // clean all the text field

                    // alert( 'clean data' ); 

                    $('#fullname').val('');
                    $('#email').val('');
                    $('#occupation').val('');
                    $('#style').val('');
                    $('#wob').val('');
                    $('#tlook').val('');
                    $('#city').val('');
                    $('#state').val('');
                    $('#country').val('');
                    $('#description').val('');
                    $('#status').val('');

                    // append new added invited people info 

                    $('#invited-container-response').prepend(design[1]);

                }

            }
            else {

                ('#'+view_result_id).prepend(xmlhttp.responseText.split());

            }

            // alert(' hide loader '+loader);
            $(loader).css('visibility','hidden');
            notification ( );
        }

    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function appendNow( view_result_id , data , loader , page , id ) {
    $(loader).css('visibility','visible');

    // alert(view_result_id);
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


            if ( page == 'modal-comment') {
                // alert( 'comment ' );
                var comment = xmlhttp.responseText.split("<modal-comment>");
                $('#'+view_result_id).append(comment[1]);
                $('#modal-comment-field'+id).val('');
            }
            else if ( page == 'search-field-view-more' ) {
                // alert( ' view more response search-field-view-more ' );  
                $("#"+view_result_id).append(xmlhttp.responseText);
            }
            else  {

                // alert( ' else ' ); 
                // $("#"+view_result_id).append(xmlhttp.responseText);  
                // document.getElementById(view_result_id).innerHTML = xmlhttp.responseText 
                var div = document.getElementById(view_result_id);
                div.innerHTML = div.innerHTML + xmlhttp.responseText ;
            }

            $(loader).css('visibility','hidden');
            // var notires = xmlhttp.responseText.split("<notires>");    
            //  alert(notires[1]); 

            // alert( 'loaded done' );
            // notification ( );
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function ajax_insert_and_append_reply(view_result_id,data){
    // alert('reply append live');
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var r=xmlhttp.responseText.split("<li>");
            // alert('total result = '+r.length);
            // for (var i = 1; i < r.length; i++) {
            //  alert(r[i]);
            // } 
            // alert(r[1]);
            var cno =  $('.cid').text();
            // alert('cno = '+cno);
            var newRepliedComment = r[1];
            // document.getElementById(view_result_id+cno).innerHTML = "<li>"+newRepliedComment+"</li>";
            $('#'+view_result_id+cno).append("<li>"+newRepliedComment+"</li>");

            // if (r.length == 1 ) { 
            // }else {  
            //  document.getElementById(loader).innerHTML = "";
            //  $('#replyContainer').append(xmlhttp.responseText);
            // }    
            // $('#replyContainer').append(xmlhttp.responseText);   
            // document.getElementById(view_result_id).innerHTML = xmlhttp.responseText ;


            $('.replyViewMoreContainer_'+c).css({'display':'none'}); // reply view more container
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function profile_activities(view_result_id,data,loader) {

    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var r=xmlhttp.responseText.split("<li >");
            // alert('total result = '+r.length);
            document.getElementById('home_res1').innerHTML ='';
            document.getElementById('home_res2').innerHTML ='';
            document.getElementById('home_res3').innerHTML ='';
            // document.getElementById('imgres').innerHTML =  data+xmlhttp.responseText;
            // $('.look_container_div').css({"display":"none"});

            if (show_version == 1) {
                var c = 0;
                for(i=1;i<r.length;i++) {
                    c++;
                    // alert(r[i]);
                    // $('#look_t').fadeIn('slow');
                    $('#home_res'+c).append("<li id='wee' >"+r[i]);

                    if (c == 3 )
                    {
                        c=0;
                    }
                    if ( i == r.length-1 )
                    {
                        // alert('get position of the footer.');
                    }
                }
            } else {

                var cheight_li1 = 0;
                var cheight_li2 = 0;
                var cheight_li3 = 0;
                var minValue = 0;
                var min = 0;
                var modals_append_to_row = "";

                var i = 1;
                // var r = ["modal1","modal2"];
                reslength = r.length;

                function myLoop () {
                    setTimeout(function () {
                        // get height of row containers
                        cheight_li1 = $("#li_res1").height(); // get height of container li1
                        cheight_li2 = $("#li_res2").height(); // get height of container li2
                        cheight_li3 = $("#li_res3").height(); // get height of container li3
                        // container height placed in array

                        var numbers = [parseInt(cheight_li1),parseInt(cheight_li2),parseInt(cheight_li3)];
                        // get the smallest height of the container

                        min = minjs(numbers);
                        // remove undifiend the result modals is empty

                        var res = r[i].replace("undefined","this the undifined ");
                        // get modal class
                        var modalClass = res.split("<class>");
                        modalClass = modalClass[1].replace("</class>","");
                        // assign container modals where to placed
                        var isAd=modalClass.indexOf("ads_c");
                        if ( isAd > -1 ) {
                            modals_append_to_row = '#home_res'+2;
                        }
                        else
                        if ( cheight_li1 == min ) {

                            modals_append_to_row = '#home_res'+1;
                        } else if ( cheight_li2 == min ) {

                            modals_append_to_row = '#home_res'+2;
                        } else if ( cheight_li3 == min ) {

                            modals_append_to_row = '#home_res'+3;
                        }
                        // append modal to home

                        $(modals_append_to_row).append("<li >"+res);
                        // modal hide and show slowly.

                        $("."+modalClass).css({"display":"none"});
                        // waiting for the document ready so that no freezing when modals apear.
                        $("."+modalClass).ready(function( ) {

                            $("."+modalClass).fadeIn("fast");
                            $("."+modalClass+"_img").css({"display":"none"});
                            $("."+modalClass+"_img").ready(function( ) {
                                $("."+modalClass+"_img").fadeIn(3000);
                                if (i < reslength) {
                                    myLoop();
                                }
                            })
                            i++;

                        })

                    }, 500)
                }
                myLoop();
            }
            // $(loader).css({'display':'none'});
            invisible_visible ( "hidden" , loader );
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function share_mouser_over( plno ) {
    // alert("share mouse over..");
    $("#dropdown_share"+plno).css({"display":"block"});
    $("#new_look_stat_container"+plno).css({"display":"block"});


}
function share_mouser_out( plno ) {
    // alert("share mouse out..");
    $("#dropdown_share"+plno).css({"display":"none"});
}
function ajax_insert_and_append_result( view_result_id , data , loader ){

    // alert('data = '+data);

    // getID(view_result_id).style.background="#000 url('images/loading 2.gif') center no-repeat";

    $(loader).css('visibility','visible');
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            // alert(xmlhttp.responseText);

            // document.getElementById('comment_loader').innerHTML='';
            // document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;


            // split(xmlhttp.responseText)
            var r=xmlhttp.responseText.split("<li>");
            // var r=xmlhttp.responseText.split("<li >");
            // alert('len = '+r.length);


            // for(i=1;i<r.length;i++){
            //      $("#wook ul").append("<li >"+r[i]);
            // }
            // alert('append');

            if (r.length == 1 ) {
                // result is empty
            }else {
                // document.getElementById(loader).innerHTML = ""; 
                $(loader).css('visibility','hidden');
                // var div = document.getElementById(view_result_id);
                // div.innerHTML = div.innerHTML + xmlhttp.responseText;
                $('#'+view_result_id).append(xmlhttp.responseText);

            }
            // div.innerHTML = div.innerHTML +  "<hr>";     
            // c+=100;
            // move_view_more(c);  


            notification( );

        }

    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();

}
function ajax_Send_on_flag_box(view_result_id,data,loader){
    // open loading here
    if (window.XMLHttpRequest)  {xmlhttp = new XMLHttpRequest();} else {xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            // close loading here

            // alert('response = '+xmlhttp.responseText);
            document.getElementById(loader).innerHTML ='';
            var r=xmlhttp.responseText.split("<li>");
            // alert(r.length);
            if(r.length == 2){
                alert('not yet flagged');
                // show_not_yet_flagged_box();
                // flagTable1
            }
            else{
                alert('already flagged');
                // show_already_flagged_box()
                // flagged

            }



        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function reply_flagged_ajax( view_result_id , data , loader ) {

    // open loading here
    // alert('flagged ajax wrking');
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            // close loading here

            // alert('response = '+xmlhttp.responseText);
            var response = xmlhttp.responseText;
            // alert(response);
            document.getElementById(view_result_id).innerHTML = response;
            // document.getElementById(loader).innerHTML ='';
            // var r=xmlhttp.responseText.split("<li>");
            // alert(r.length);  


            if (response.indexOf("not yet flagged") != -1  ) {
                // alert('not yet flagged');
                show_reply_not_yet_flagged_box();
            }
            else if (response.indexOf("already flagged") != -1  ) {
                // alert('already flagged');
                show_already_flagged_box();
                // hide_reply_not_yet_flagged_box ( );
            }





        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function lookdetails_thumbnail( view_result_id,data , loader, home_counter ){
    var reslength = 0;
    var r ="";
    localStorage.page_modals_stat="page_loaded";
    var modals_stat = localStorage.page_modals_stat;
    var show_version = 2;  //  1 or 2

    // alert("lookdetails thumbnail loaded ")
    // alert(modals_stat);

    // alert('function append work')
    // if( loader == '') {
    //  alert('loader is empty ');
    // } 


    $('#'+loader).css('visibility','visible');
    var c=0;
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var r=xmlhttp.responseText.split("<li >");
            // document.getElementById('imgres').innerHTML =  data+xmlhttp.responseText;   
            // alert("asdasd");
            for(i=1;i<r.length;i++){
                c++;
                // alert(r[i]);
                $('#home_res'+c).append("<li >"+r[i]);
                if (c >  14  ) {
                    c=0;
                }
            }
            // live_comment_initialize(); 
            $('#'+loader).css('visibility','hidden');
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function print_new_look( view_result_id , data , loader , plno , page  , table_name , table_id ) {
    $('#'+loader).css('visibility','visible');
    if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var r=xmlhttp.responseText.split("<item>");
            var rc;
            var content;
            var pagetitle   =xmlhttp.responseText.split("<pagetitle>");
            var pageurl     =xmlhttp.responseText.split("<pageurl>");
            var pagemodal   =xmlhttp.responseText.split("<pagemodal>");
            var modalmoreby =xmlhttp.responseText.split("<modalmoreby>");
            // document.getElementById('lookdetails_wrapper').innerHTML =  xmlhttp.responseText ; 
            var url =pageurl[1]; // set new url when the page clicked next or prev
            var title=pagetitle[1];// set page title
            change_url (  url , title );//implement to the site
            if ( page == 'detail' ) {
                // alert( pagetitle[1]); 
                // alert( pageurl[1]);  
                change_url ( pageurl[1] , pagetitle[1] );
                // alert( pagemodal[1]);
                document.getElementById('banner_view_and_look_view').innerHTML =  pagemodal[1];
                // alert( modalmoreby[1]); 
                document.getElementById('about_and_more_by').innerHTML =  modalmoreby[1];
                //  hide loader
                $('#'+loader).css('visibility','hidden');
                // load comment  
                modal_detail( table_name , table_id , 1 , 'modal-detail' , 'load-comment-change-page-modal'  );
            }
            else {
                for(i=1;i<r.length;i++) {

                    var title =pagetitle[1];
                    rc = r[i];
                    rc = rc.replace("</item>","");
                    i++;
                    content = r[i];

                    // alert( 'url = '+pageurl[1]+' title ='+title );

                    // change_url( url, title );

                    if ( rc == 1 ) {
                        // change_url ( "" , content );  
                    }
                    else if ( rc == 2 ) {
                        document.getElementById(view_result_id).innerHTML =  content;
                    }
                    else if ( rc == 'look-posted-dateTime' ) {
                    }
                    else if ( rc == 'look-posted-about' ) {
                    }
                    else if ( rc == 'look-posted-position-number' ) {
                    }
                    else if ( rc == 'look-posted-comments' ) {
                    }
                    else {
                    }
                }
                // document.getElementById(view_result_id).innerHTML =  xmlhttp.responseText;   
                print_new_look_about_and_moreby ( "about_and_more_by" , data+'&ext1=about_moreby' , loader , plno );
            }
            look_show_hide_tags( );
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function print_new_look_about_and_moreby ( view_result_id , data , loader , plno ) {
    if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(view_result_id).innerHTML =  xmlhttp.responseText ;

            print_new_look_comments( 'lookdetails-comment-container' , 'fs_folders/modals/lookdetails/comment.php?plno='+plno , 'comment_post_loader1 img' );
            // alert('comment will load now! ');
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function print_new_look_comments( resultid , data , loader , plno ) {

    ajax_send_data(
        resultid,
        data,
        loader
    );
}
function procceed(page){
    document.location=page;
}
function empty_now(pointer,type){
    // alert(pointer);
    // if (type == 'text') {
    //  $(pointer).text('');
    // }
    // if (type == 'val') {
    //  $(pointer).val('');
    // }
    // c();
    // document.getElementById(pointer).text('');
    // document.getElementById(pointer).val('fsfsfgfg');

}
function show_reply_not_yet_flagged_box ( ) {
    // alert('function reply flagged');
    hide_reply_edit ( );
    show_overlay_container ( );
    hide_maincomment_not_yet_flgged ( );
    hide_maincomment_flgged ( );
    show_reply_comment_not_yet_flagged ( );
}
function hide_reply_not_yet_flagged_box ( ) {


    hide_overlay_container ( );
    hide_reply_comment_not_yet_flagged ( );


}
function show_reply_edit ( )  {

    show_overlay_container ( );
    show_reply_edit_box ( );
    hide_maincomment_not_yet_flgged ( );
    hide_maincomment_flgged ( );
    hide_reply_comment_not_yet_flagged ( );
    hide_comment_edit ( );
}
function hide_reply_edit ( )    {
    $('.reply_edit').css({'display':'none'});
}
function show_comment_edit (id)  {
    // alert(id);

    show_overlay_container ( );
    show_reply_edit_box ( );
    show_comment_edit_box ( );
    comment_suply_text_textarea( id );
    hide_maincomment_not_yet_flgged ( );
    hide_maincomment_flgged ( );
    hide_reply_comment_not_yet_flagged ( );
    hide_reply_edit ( );
}
function show_reply_edit_box ( )    {
    $('.reply_edit').css({'display':'block'});
}
function hide_comment_edit ( )  {
    $('.comment_edit').css({'display':'none'});
}
function show_comment_edit_box ( )  {
    $('.comment_edit').css({'display':'block'});
}
function show_not_yet_flagged_box ( ) {
    hide_reply_edit ( );
    hide_comment_edit ( );
    hide_reply_comment_not_yet_flagged ( );
    $('.flag_main_container').fadeIn('fast');
    $('body').css({'overflow':'hidden'});
    $('.bgcolor').css({'display':'block'});
    $('.already_flagged_div').css({'display':'none'});
    $('.replybox').css({'display':'none'});
    $('.not_yet_flagged_table').css({'display':'block'});
    $('.text_area_notes').val('');

    $('.check_box1').attr('checked', false);
    $('.check_box2').attr('checked', false);
    $('.check_box3').attr('checked', false);

}
function show_already_flagged_box ( ){
    hide_reply_edit ( );
    hide_comment_edit ( );
    hide_reply_comment_not_yet_flagged ( );
    $('.flag_main_container').fadeIn('fast');
    $('body').css({'overflow':'hidden'});
    $('.bgcolor').css({'display':'block'});
    $('.not_yet_flagged_table').css({'display':'none'});
    $('.replybox').css({'display':'none'});
    $('.already_flagged_div').css({'display':'block'});
}
function show_overlay_container() {
    $('.flag_main_container').fadeIn('fast');
    $('body').css({'overflow':'hidden'});
    $('.bgcolor').css({'display':'block'});
}
function hide_overlay_container() {
    $('.flag_main_container').fadeOut('fast');
    $('body').css({'overflow':'visible'});
    $('.bgcolor').css({'display':'none'});
}
function hide_maincomment_not_yet_flgged() {
    $('.not_yet_flagged_table').css({'display':'none'});
    $('.replybox').css({'display':'none'});
}
function hide_maincomment_flgged() {
    $('.already_flagged_div').css({'display':'none'});
    $('.replybox').css({'display':'none'});
}
function hide_reply_comment_not_yet_flagged ( ) {
    $('.reply_not_yet_flagged_table').css({'display':'none'});
    $('.reply_text_area_notes').css({'display':'none'});
}
function show_reply_comment_not_yet_flagged ( ) {
    hide_reply_edit ( );
    hide_comment_edit ( );
    $('.reply_not_yet_flagged_table').css({'display':'block'});
    $('.reply_text_area_notes').css({'display':'block'});
}
function setEmpty(){
    $('.text_area_notes').val('');
    $('#comment_box').val('');
    $('.replyTextArea').val('');
    $('.reply_text_area_notes').val('');
    $('.reply_edit_textarea').val('');
}
function set_unchecked_checkbox() {
    $('.check_box1').attr('checked', false);
    $('.check_box2').attr('checked', false);
    $('.check_box3').attr('checked', false);
}
function get_comment_reply_edit ( plcrno ) {
    var rcomment = $('#rcomment_span_'+plcrno).text();
    // rcomment=rcomment.substring(2,rcomment.length );
    $('.reply_edit_textarea').val(rcomment);
}
function replace_edited_replied_text( plcrno ) {

    $('#rcomment_span_'+plcrno).text($('.reply_edit_textarea').val());
}
function comment_suply_text_textarea( id ) {
    var ctext = $('#comment_span_'+id).text( ) ;
    $('.comment_edit_textarea').val(ctext);
}
function get_new_edit_comment( ) {
    return $('.comment_edit_textarea').val();
}
function set_new_edit_comment( commentEdited , id ) {
    $('#comment_span_'+id).text( commentEdited );
}
//  new home
function change_more_image_mouse_over( ) {
    // alert('over');
    $("#more").attr('src','fs_folders/images/body/red-mouse-over.png');
}
function change_more_image_mouse_out( ) {
    $("#more").attr('src','fs_folders/images/body/more-button.png');
    // alert('out');
}
function append_home( view_result_id , data , loader , showstyle , page , type ) {


    // alert( 'page = '+page );
    // alert(loader)
    var reslength = 0;
    var r ="";
    localStorage.page_modals_stat="page_loaded";
    var modals_stat = localStorage.page_modals_stat;
    var show_version = 2;  //  1 or 2

    invisible_visible ( "visible" ,  loader );

    // alert(modals_stat);

    // alert('function append work')
    if( loader == '') {
        alert('loader is empty ');
    }
    var c=0;
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var r ='';
            r =xmlhttp.responseText.split("<modals-item >");
            np =xmlhttp.responseText.split("<number-nextprev>");
            sm =xmlhttp.responseText.split("<showmore>");
            /*
             * print the entire result 
             */
            // document.getElementById('fs-general-ajax-response').innerHTML = xmlhttp.responseText;     
            // alert(np[1]); 
            if ( page == 'profile-tabs' ) {
                /*
                 * add numbers inside next prev 
                 * for both top and bottom 
                 */

                if ( np[1] != 'no-change') {
                    document.getElementById('profile-body-content-activities-table-nextprev-top').innerHTML =  np[1] ;
                    document.getElementById('profile-body-content-activities-table-nextprev-bottom').innerHTML =  np[1]+"<div style='height:10px;' > </div>"  ;
                }

                /* 
                 * clean the container of the modal 
                 * results the row1 row2 and row3 
                 */

                // $('#profile-body-content-activities-table-nextprev') 
                document.getElementById('home_res1').innerHTML =  '';
                document.getElementById('home_res2').innerHTML =  '';
                document.getElementById('home_res3').innerHTML =  '';

                /* 
                 * sub category append for the 
                 * ratings and percentage 
                 */

                if ( type == 'profile-tabs' ) {
                    var sub = xmlhttp.responseText.split("<profile-sub-categories>");
                    document.getElementById('profile-sub-left-row').innerHTML = sub[1];
                };

            }
            else if ( page == 'modal-comment') {
            }
            else if ( page == 'index' ){
                /* 
                 * append the new more button that contain the next value of the modals
                 */
                document.getElementById('moretd').innerHTML =  '';
                // alert('this is the button more '+sm[1]); 
                document.getElementById('moretd').innerHTML =  sm[1];
            }
            else{
            }
            // alert( 'starting to append of the modals' ) 
            if ( showstyle == 'replace' ) {
                // alert('replace')
                document.getElementById('home_res1').innerHTML =  '';
                document.getElementById('home_res2').innerHTML =  '';
                document.getElementById('home_res3').innerHTML =  '';
                // previous results will not fade aways
            }
            else{
                // alert('rate look append ');
                // previous results will not fade away
            }
            // document.getElementById('imgres').innerHTML =  data+xmlhttp.responseText;  
            invisible_visible ( "hidden" ,  loader );
            if ( show_version == 1 ) {
                // alert("old version of modal showing ");
                for(i=1;i<r.length;i++){
                    c++;
                    // alert(r[i]);
                    $('#home_res'+c).append("<li >"+r[i]+"</li>");
                    if (c == 3 )
                    {
                        c=0;
                    }
                    if ( i == r.length-1 )
                    {
                    }
                }
            } else {
                // for(i=1;i<r.length;i++){ 

                //      alert(r[i]);
                // }  
                // alert("else")


                // alert ( 'start append new content ' );

                var cheight_li1 = 0;
                var cheight_li2 = 0;
                var cheight_li3 = 0;
                var minValue = 0;
                var min = 0;
                var modals_append_to_row = "";
                var i = 1;
                // var r = ["modal1","modal2"];              
                reslength = r.length;

                // alert(reslength); 
                function myLoop () {
                    setTimeout(function () {

                        // alert(r[i]); 
                        // get height of row containers 
                        cheight_li1 = $("#li_res1").height(); // get height of container li1
                        cheight_li2 = $("#li_res2").height(); // get height of container li2
                        cheight_li3 = $("#li_res3").height(); // get height of container li3

                        // container height placed in array 
                        var numbers = [parseInt(cheight_li1),parseInt(cheight_li2),parseInt(cheight_li3)];
                        // get the smallest height of the container  
                        min = minjs(numbers);
                        // remove undifiend the result modals is empty 
                        var res = r[i].replace("undefined","this the undifined ");
                        // alert(r[i]);
                        // get modal class 

                        var modalClass = res.split("<class>");
                        modalClass = modalClass[1].replace("</class>","");

                        var isAd=modalClass.indexOf("ads_c");
                        var ismember=modalClass.indexOf("ember_t");
                        // assign container modals where to placed  
                        // alert(modalClass);   
                        if ( isAd > -1 ) {
                            modals_append_to_row = '#home_res'+2;
                        }
                        else if ( cheight_li1 == min ) {
                            modals_append_to_row = '#home_res'+1;
                        } else if ( cheight_li2 == min ) {
                            modals_append_to_row = '#home_res'+2;
                        } else if ( cheight_li3 == min ) {
                            modals_append_to_row = '#home_res'+3;
                        }
                        // alert('modals_append_to_row = '+modals_append_to_row);

                        /*
                         if ( ismember > 0 ) {
                         alert(" member class is "+modalClass);
                         };
                         */
                        // alert(" class = "+modalClass);
                        // alert(" isAd = "+ isAd);
                        // alert(" res = "+ res); 
                        // append modal to home   
                        $(modals_append_to_row).append("<li >"+res+"</li>");
                        // modal hide and show slowly.    

                        $("."+modalClass).css({"display":"none"});

                        // waiting for the document ready so that no freezing when modals apear.
                        // alert("."+modalClass);

                        $("."+modalClass).ready(function( ) {

                            // drop 
                            // scale 
                            $("."+modalClass).fadeIn('fast');

                            // $("."+modalClass).fadeIn("slow"); 

                            // alert("."+modalClass+"_img");
                            $("."+modalClass+"_img").css({"display":"none"});

                            $("."+modalClass+"_img").ready(function( ) {

                                $("."+modalClass+"_img").fadeIn(3000);
                                // alert(" img is ready ");
                                i++;
                                if (i < reslength) {
                                    myLoop();
                                    // alert(i+' < '+reslength)        
                                }
                            })
                        })
                    }, 30)
                }
                myLoop();
            }  //end else 


            notification ( );
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function append_home_tabs(view_result_id,data,loader,url) {
    var reslength = 0;
    var r ="";

    var show_version = 2;  //  1 or 2

    localStorage.page_modals_stat="page_tab";
    var modals_stat = localStorage.page_modals_stat;
    // alert(modals_stat);



    if ( url == "popularlatest") {};
    processAjaxData("response", url , "FashionSponge - Don't Just Dress. Dress Well. #DJDDW");
    var c=0;
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // $('#'+view_result_id).append(xmlhttp.responseText);
            var r=xmlhttp.responseText.split("<li >");
            // alert('total result = '+r.length);  
            document.getElementById('home_res1').innerHTML ='';
            document.getElementById('home_res2').innerHTML ='';
            document.getElementById('home_res3').innerHTML ='';
            // document.getElementById('imgres').innerHTML =  data+xmlhttp.responseText;  
            // $('.look_container_div').css({"display":"none"}); 

            if (show_version == 1) {
                var c = 0;
                for(i=1;i<r.length;i++) {
                    c++;
                    // alert(r[i]);
                    // $('#look_t').fadeIn('slow');
                    $('#home_res'+c).append("<li id='wee' >"+r[i]);

                    if (c == 3 )
                    {
                        c=0;
                    }
                    if ( i == r.length-1 )
                    {
                        // alert('get position of the footer.');
                    }
                }
            } else {
                var cheight_li1 = 0;
                var cheight_li2 = 0;
                var cheight_li3 = 0;
                var minValue = 0;
                var min = 0;
                var modals_append_to_row = "";

                var i = 1;
                // var r = ["modal1","modal2"];              
                reslength = r.length;

                function myLoop () {
                    setTimeout(function () {
                        // get height of row containers 
                        cheight_li1 = $("#li_res1").height(); // get height of container li1
                        cheight_li2 = $("#li_res2").height(); // get height of container li2
                        cheight_li3 = $("#li_res3").height(); // get height of container li3
                        // container height placed in array

                        var numbers = [parseInt(cheight_li1),parseInt(cheight_li2),parseInt(cheight_li3)];
                        // get the smallest height of the container 

                        min = minjs(numbers);
                        // remove undifiend the result modals is empty

                        var res = r[i].replace("undefined","this the undifined ");
                        // get modal class 
                        var modalClass = res.split("<class>");
                        modalClass = modalClass[1].replace("</class>","");
                        // assign container modals where to placed
                        var isAd=modalClass.indexOf("ads_c");
                        if ( isAd > -1 ) {
                            modals_append_to_row = '#home_res'+2;
                        }
                        else
                        if ( cheight_li1 == min ) {

                            modals_append_to_row = '#home_res'+1;
                        } else if ( cheight_li2 == min ) {

                            modals_append_to_row = '#home_res'+2;
                        } else if ( cheight_li3 == min ) {

                            modals_append_to_row = '#home_res'+3;
                        }
                        // append modal to home  

                        $(modals_append_to_row).append("<li >"+res);
                        // modal hide and show slowly. 

                        $("."+modalClass).css({"display":"none"});
                        // waiting for the document ready so that no freezing when modals apear.
                        $("."+modalClass).ready(function( ) {

                            $("."+modalClass).fadeIn("fast");
                            $("."+modalClass+"_img").css({"display":"none"});
                            $("."+modalClass+"_img").ready(function( ) {
                                $("."+modalClass+"_img").fadeIn(3000);
                                if (i < reslength) {
                                    myLoop();
                                }
                            })
                            i++;
                        })
                    }, 10)
                }
                myLoop();
            }
            // $(loader).css({'display':'none'});
            invisible_visible ( "hidden" , loader );
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
// end home
// new design functions 
function click_show_or_hide ( clickable_el , show_container_el )
{
    // click_show_out_hide
    $(clickable_el).click(function ()
    {
        // alert($(show_container_el).attr('class'));   
        if( $(show_container_el).attr('class') == 'open' )
        {
            $(show_container_el).removeClass('open');
            $(show_container_el).css({'display':'none'});
            $(show_container_el).addClass( "close" );
        }
        else
        {
            $(show_container_el).removeClass('close');
            $(show_container_el).css({'display':'block'});
            // $(show_container_el).slideDown('fast');
            $(show_container_el).addClass( "open" );
        }
    });
}
function mouseOver_elemShow_mouseOut_elemHide( mouseOver_el , mouseOut_el , show_hide_el )
{
    // alert(' mouseover at '+mouseOver_el);
    $(show_hide_el).css("display","block");

    /*
     $(mouseOver_el).mouseover(function ( ) { 
     $(show_hide_el).css("display","block"); 
     })
     */

    $(mouseOut_el).mouseout(function ( ) {
        // alert('mouse out ');
        $(show_hide_el).css("display","none");

    })
}
function mouseOver_elemShow_mouseOut_elemHide_v1( mouseOver_el , mouseOut_el , show_hide_el )
{
    // alert(' mouseover at '+mouseOver_el);


    $(mouseOver_el).mouseover(function ( ) {
        $(show_hide_el).css("display","block");
    })


    $(mouseOut_el).mouseout(function ( ) {
        // alert('mouse out ');
        $(show_hide_el).css("display","none");

    })
}
function mouseOver_elemShow_mouseOut_elemHide_v2( mouseOver_el , mouseOut_el , mouseover_show , mouseover_hide , mouseout_show , mouseout_hide )
{
    // alert(' mouseover at '+mouseOver_el);


    $(mouseOver_el).mouseover(function ( ) {
        $(mouseover_show).css("display","block");
        $(mouseover_hide).css("display","none");
    })


    $(mouseOut_el).mouseout(function ( ) {
        $(mouseout_show).css("display","block");
        $(mouseout_hide).css("display","none");
    })
}
function mouseOver_hideMe_showOther_mouseOut_showMe_hideOther (mouseOver_el , hide1 , show1 , mouseOut_el , hide2 , show2 )
{
    // mouseOver_hideMe_showOther_mouseOut_showMe_hideOther ('#invite_img1' , "#invite_img1" , "#invite_img2" , "#invite_img2" , "#invite_img1" , "#invite_img2" )            
    $(mouseOver_el).mousemove(function ( ) {
        // alert('enter');
        $(hide1).css("display","none");
        $(show1).css("display","block");
    })
    $(mouseOut_el).mouseout(function ( ) {
        $(hide2).css("display","block");
        $(show2).css("display","none");
    })
}
function mouseIn_showOverFlow_mouseOut_shideOverFlow( element ) {
    $(element).mouseover(function() {
        // alert("mouse enter");
        $(element).css({"overflow-y":"auto"});
    } )
    $(element).mouseout(function() {
        // alert("mouse out");
        $(element).css({"overflow-y":"hidden"});
    } )
}
function click_hide_and_show_el ( clicked_el , hide_el , show_el , other_el_hide ,  other_el_show , hideDropDowns , openDropDowns )
{
    // var clicked_el = "#invite_img1"; 
    // var hide_el = "#invite_img1"; 
    // var show_el = "#invite_img2";     
    // var current_class = 'grey';
    // var new_class = 'red'; 
    $(clicked_el).click(function( ) {
        $(show_el).css({'display':'block'});
        $(other_el_show).css({'display':'block'});
        $(hide_el).css({'display':'none'});
        $(other_el_hide).css({'display':'none'});
        $(hideDropDowns).css({'display':'none'});
        $(openDropDowns).css({'display':'block'});
    })
}
// new design functions  
// new warnings 
function warning_link_under_onstruction() {
    alert('Our programmer and designer are hard working to make this link live ASAP, thank you from FS team');
}
// end warning 
// new home or index  
function link_colored_when_document_ready (link_id , color , underline) {
    $(link_id).css({'color':color});
    $(underline).css({'border':'3px solid #b32727','display':'block'});
}
function more_click ( counter )
{
    var more_loader = '#more_loading img';
    /*
     var counter = sessionStorage.ccounter;
     counter = parseInt(counter)+1;
     sessionStorage.ccounter = counter;  
     invisible_visible ( "visible" ,  more_loader ); 
     */
    /*
     append_home( 
     "home_res",
     "fs_folders/modals/index_modals/latest_modals.php", 
     "#more_loading img" 
     ); 
     */
    /*
     alert( 'show more in homepage counter = '+counter ); 
     append_home(
     "home_res",
     "fs_folders/modals/index_modals/latest_modals.php?tres="+counter, 
     "#more_loading img",
     '',
     'index'  // set this to load the second set of modals 24-45 i think
     ); 
     */
    // alert( 'counter = '+counter);
    append_home(
        'home_res',
        'fs_folders/modals/index_modals/latest_modals.php?tres='+ parseInt(counter),
        more_loader,
        '',
        'index'
    );
    /*

     ajax_send_data(
     'fs-general-ajax-response',
     'fs_folders/modals/index_modals/latest_modals.php?tres='+counter, 
     'more_loading img'
     );
     */
}
// end home or index  
//  new post article
function post_article_result( view_result_id , data , loader )
{
    $('#'+loader).css('visibility','visible');

    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById('home_res1').innerHTML ='';
            document.getElementById('home_res2').innerHTML ='';
            document.getElementById('home_res3').innerHTML ='';
            document.getElementById("article_res").innerHTML = "";
            var result = xmlhttp.responseText;
            // get title
            // var str = "How are you doing today?";
            // alert(n[1]);
            // alert(title[1]);
            // alert(desc[1]);
            // var res_container = ""; 
            // new title and description
            var n = result.split("<h1>");
            var title = n[1].replace("</h1>","");
            var desc = n[2].replace("</h1>","");

            $('#article_description').val("");
            $('#article_title').val(title);
            $('#article_description').val(desc);


            var r=xmlhttp.responseText.split("<li>");
            var rlen = r.length;
            var rlen1 = rlen-1;
            // new title and description

            // new for the result
            var c = 0;
            $('#article_total_result span').css({'visibility':'visible'});

            var found_message = '';
            if (  rlen1 ==  0)
            {
                found_message = 'Sorry No Article Found';
            }
            else
            {
                found_message = rlen1+' Article Found';
            }
            $('#article_total_result span').text( found_message );
            // end for the result

            // new images display
            for(i=1;i<r.length;i++)
            {
                c++;
                // alert('res = '+r[i]);
                $('#home_res'+c).append("<li>"+r[i]);

                if ( c ==  3 )
                {
                    c=0;
                }
            }
            $('#'+loader).css('visibility','hidden');
            // end images display 
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
// end post article 
// new general function  
function hide_show( stat , idClass )
{
    if (stat == "show") {
        // $(id).css({"display":"block"});
        $(idClass).fadeIn("normal");
        // alert("show");
    }
    else if ( stat == "hide" ) {
        // $(id).css({"display":"none"});
        $(idClass).fadeOut("normal");
    }

}
function invisible_visible ( stat , idClass ) {
    if (stat == "visible") {
        $(idClass).css({"visibility":"visible"});

        // alert("visible");
    }
    else if ( stat == "hidden" )
    {
        $(idClass).css({"visibility":"hidden"});
        // $(idClass).fadeOut("normal");
        // alert("hidden")
    }
}
function hide_show_display( stat , idClass )
{
    if (stat == "show")
    {
        $(idClass).css({"display":"block"});
        // $(idClass).fadeIn("normal");
        // alert("show");
    }
    else if ( stat == "hide" )
    {
        $(idClass).css({"display":"none"});
        // $(idClass).fadeOut("normal");
    }
}
function change_url (url,title){
    // window.parent.location.href = url;   
    if (title!=null) {
        document.title = title;
    };
    window.parent.history.pushState({"html":'html',"pageTitle":title},"",url);
}
function change_text_color ( idClass , color )
{
    // alert("change color ");
    $(idClass).css({"color":color});
}
function processAjaxData(response, urlPath , title )
{

    document.title = title;
    window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
}
function minjs (points) {
    points.sort(function(a,b){return a-b});
    return points[0];
}
function maxjs (points) {
    points.sort(function(a,b){return b-a});
    return points[0];
}
function capitalize_first_letter(s) {

    return s[0].toUpperCase() + s.slice(1);
}
function toTitleCase(str) {
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
function capitalizeEachWord(str) {
    var words = str.split(" ");
    var arr = Array();
    for (i in words)
    {
        temp = words[i].toLowerCase();
        temp = temp.charAt(0).toUpperCase() + temp.substring(1);
        arr.push(temp);
    }
    return arr.join(" ");
}

// lookdetails but it could be used in general page 

function  look_show_hide_tags( ) {
    // alert("loaded tag and look view "); 
    // #load_look_picture_and_tags img # image hover show tags 



    // invisible_visible ( "hidden" , "#tag-circle" ); 
    // hide rectangle when enter to lookdetails look view 



    $("#look_view_img , #tag-circle-tag-div , #tag-circle").mouseenter(function ( ) {
        invisible_visible ( "hidden" , "#lf_div_container" );
        for (var i = 1; i <= 15; i++) {
            invisible_visible ( "visible" , ".tag-circle-"+i );
        };
    })
    // show rectangle when enter to lookdetails look view 
    $("#look_view_img ").mouseout(function ( ) {

        invisible_visible ( "visible" , "#lf_div_container" );
        for (var i = 1; i <= 15; i++) {
            invisible_visible ( "hidden" , ".tag-circle-"+i );
        };

    });
    // when mouse in the color pallete the red cirle hide and footer transparent show
    // when mouse in the container red circle hidden and footer transparent show
    $('#tag_colors , #look_view_img_td').mouseenter(function ( ) {
        for (var i = 1; i <= 15; i++) {
            invisible_visible ( "hidden" , ".tag-circle-"+i );
        };
        invisible_visible ( "visible" , "#lf_div_container" );
    })
    // when mouse in the image circle show transparent footer hide 
    $('#look_view_img').mousemove(function ( ) {
        for (var i = 1; i <= 15; i++) {
            invisible_visible ( "visible" , ".tag-circle-"+i );
        };
        invisible_visible ( "hidden" , "#lf_div_container" );
    })
    // tags hover show hide 
    show_if_mouse_over(
        '#lf_div_container,#tag-circle' ,  //show 
        '#tag-circle, #lf_div_container' ,  // hide
        '#rectangle-image-footer-hide,#tag-circle-tag-div,#tag-circle,#look_view_img,#lf_div_container,#tag_colors,#square_with_arrow_clicked_cotainer,#ld_square_with_arrow,#look_view_img_td' // mouse over
    );
    // social share 
    show_if_mouse_over(
        '#square_with_arrow_clicked_cotainer',
        '#square_with_arrow_clicked_cotainer' ,
        '#square_with_arrow_clicked_cotainer,#square_with_arrow_clicked_cotainer img, #ld_square_with_arrow'
    );

    // circle tags 
    var total_tag = 15;
    for (var i = 1; i <= total_tag; i++) {

        show_if_mouse_over( ".tag-circle-"+i+"-tag-div" ,  ".tag-circle-"+i+"-tag-div" , ".tag-circle-"+i+",.tag-circle-"+i+"-tag-div ");

    };
}
function show_if_mouse_over( show_el , hide_el , mouse_over_el) {

    // var mouse_over_el = '#look_view_img,#lf_div_container,#tag_colors,#square_with_arrow_clicked_cotainer,#ld_square_with_arrow';

    // var show_el = '#lf_div_container';
    // var hide_el = '#lf_div_container';

    // alert("show_if_mouse_over( "+show_el+"  , "+hide_el+" , "+mouse_over_el+")");



    $(mouse_over_el).mouseover(function()
    {

        $(show_el).css({'display':'block'});

        // alert('mouse over the image');
        // $('#res').text('mouse over');
    })
    $(mouse_over_el).mouseout(function()
    {

        // alert('mouse out the image');
        $(hide_el).css({'display':'none'});
        // $('#res').text('mouse out');
    })
}
function hover_body_menu_links( link , underline )  {
    $(link).mouseenter(function() {
        $('#res').text('link hovered');
        $(underline).css('visibility','visible');
    })
    $(link).mouseout (function() {
        $('#res').text('link out');
        $(underline).css('visibility','hidden');
    })
}
// end lookdetails function 


function check_email ( email ) {
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
    {
        // alert("Not a valid e-mail address"); 
        return false;
    }else{
        // alert('valid email address');
        return true;
    }
}
// end general function  
// dropdown  
// new api share  


function PopupCenter(pageURL, title,w,h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
//  end api share


// new invite 
function field_focused_isEmpty_then_hide_text ( textF , isEmptyVal , blurColor , focusColor , alertWhenFieldClick )  {

    $(textF).focus(function() {
        if ( $(textF).val() == isEmptyVal )
        {
            if(alertWhenFieldClick)
            {
                alert(alertWhenFieldClick);
            }

            $(textF).val("");
            $(textF).css({"color":focusColor})
        }

    });
    $(textF).blur(function() {
        if ( $(textF).val()=="")
        {
            $(textF).val(isEmptyVal);
            $(textF).css({"color":blurColor})
        }
    });
}
function share_fb_specifi_page ( link ) {

    window.open(
        'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(link),
        'facebook-share-dialog',
        'width=626,height=436',
        'name=facebookname',
        'caption=caption'
    );
}
function share_twitter_specifi_page ( link ) {

    PopupCenter('http://twitter.com/share?=\n','',660,330);
    // alert("share to twitter specifi page ")
}
function share_tumblr_specifi_page ( link ) {

    // alert("share to tumblr specifi page ")
}
function share_google_plus_specifi_page ( link ) {

    // alert("share to google plus specifi page ") 
}
function share_email_specifi_page ( link ) {

    // alert("share to email specifi page ")
}
function share_tumblr ( url ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    myRef = window.open('http://www.tumblr.com/share/link?url=https%3A%2F%2F'+url+'%2F&name=fashion sponge signup &description=Fashion Sponge is the easiest and fastest way to: Show your ootd, see the latest trends, discover fashionable people and blogs, get beauty and style tips and find fashion inspiration.','mywin',
        'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function share_gmail ( url ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    myRef = window.open('https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su=&body=https%3A%2F%2F'+url,'mywin',
        'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function share_tumblr_looks ( plno ) {
    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    myRef = window.open('http://www.tumblr.com/share/link?url=http%3A%2F%2Fwww.fashionsponge.com/lookdetails?id='+plno+'&name=fashion sponge invite &description=Fashion Sponge is the easiest and fastest way to: Show your ootd, see the latest trends, discover fashionable people and blogs, get beauty and style tips and find fashion inspiration.','mywin',
        'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function share_gmail_looks ( plno ) {
    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    myRef = window.open('https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su=&body=http%3A%2F%2Fwww.fashionsponge.com/lookdetails?id='+plno,'mywin',
        'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function twitter_look ( plno , lookname ) {



    var msg = encodeURIComponent(lookname);
    var url = encodeURIComponent('http://www.fashionsponge.com/lookdetails?id='+plno);
    // alert(url+msg+plno)
    var link = 'http://twitter.com/intent/tweet?text=' + msg + '&url=' + url;
    window.open(link,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function share_pinterest ( plno ) {
    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    var url = "https://www.pinterest.com/join/?next=/pin/create/button/%3Furl%3Dhttp%253A%252F%252Ffashionsponge.com/lookdetails?id="+plno+"%3Fid%3D111%26media%3Dhttp%253A%252F%252Ffashionsponge.com/fs_folders/images/uploads/posted%2520looks/home/111.jpg%26description%3D";
    window.open(url,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
}
function share( table_name , table_id ,  type , page , about , title , name , picture , link ) {


    var extention = '';


    // var method  = 'feed';
    var     method = 'feed';
    // alert( " table_name = "+table_name+" table_id = "+table_id+" type = "+type+" page = "+page+" about = "+about+" title =  "+title+" name = "+name+" picture = "+picture+" link = "+link+' method = '+method  ); 

    switch( table_name ) {

        case 'postedlooks':
            // alert('look = '+type);
            if ( type == 'tumblr' ) {
                link    = 'httpwww.'+extention+'fashionsponge.com/lookdetails?id='+table_id;
                picture = 'http%3A%2F%2Fwww.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20looks/lookdetails/'+table_id+'.jpg';
                method  = 'feed';
            }
            else if ( type == 'google_plus' ){
                link    = 'https://plus.google.com/share?url={http://'+extention+'fashionsponge.com/lookdetails?id='+table_id+'}';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20looks/lookdetails/'+table_id+'.jpg';
                method  = 'feed';
            }else if ( type == 'gmail' ){
                link    = 'https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su=&body=http%3A%2F%2Fwww.'+extention+'fashionsponge.com/lookdetails?id='+table_id;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';
            }else if ( type == 'twitter' ){
                link    = 'http://www.'+extention+'fashionsponge.com/lookdetails?id='+table_id ;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/lookdetails/'+table_id+'.jpg';
                method  = 'feed';
            }
            else{
                link    = 'http://www.'+extention+'fashionsponge.com/lookdetails?id='+table_id;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20looks/lookdetails/'+table_id+'.jpg';
                method  = 'feed';
            }
            break;
        case 'fs_postedarticles':
            // alert('article = '+type);
            if ( type == 'tumblr' ) {

                link    = 'http%3A%2F%2Fwww.'+extention+'fashionsponge.com/detail?id='+table_id;
                picture = 'http%3A%2F%2Fwww.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';

            }else if ( type == 'google_plus' ){
                link    = 'https://plus.google.com/share?url={http://'+extention+'fashionsponge.com/detail?id='+table_id+'}';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';
            }else if ( type == 'gmail' ){
                link    = 'https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su=&body=http%3A%2F%2Fwww.'+extention+'fashionsponge.com/detail?id='+table_id;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';
            }else if ( type == 'twitter' ){
                // link    = 'http://twitter.com/share?text=text goes here&url=http://url goes here&hashtags=hashtag1,hashtag2,hashtag3'; 
                link    = 'http://www.'+extention+'fashionsponge.com/detail?id='+table_id ;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';
            }
            else{
                link    = 'http://www.'+extention+'fashionsponge.com/detail?id='+table_id;
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/uploads/posted%20articles/detail/'+table_id+'.jpg';
                method  = 'feed';
            }
            break;

        case 'signup':

            title   = 'FINALLY, SOMETHING COOL FOR CONTENT LOVERS';
            name    = ''+extention+'fashionsponge.com/signup';
            about   = "Fashion Sponge is a social network where the best content creators in Fashion, Beauty, Lifestyle and Entertainment can showcase their content to people who's looking to discover the latest about people, places and things.";

            if ( type == 'tumblr' ) {

                link    = 'http%3A%2F%2Fwww.'+extention+'fashionsponge.com/signup';
                picture = 'http%3A%2F%2Fwww.'+extention+'fashionsponge.com/fs_folders/images/genImg/collage.jpg';
                method  = 'feed';

            }else if ( type == 'google_plus' ){

                link    = 'https://plus.google.com/share?url={http://'+extention+'fashionsponge.com/signup}';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/genImg/collage.jpg';
                method  = 'feed';

            }else if ( type == 'gmail' ){

                link    = 'https://mail.google.com/mail/?ui=2&view=cm&fs=1&tf=1&su=&body=http%3A%2F%2Fwww.'+extention+'fashionsponge.com/signup';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/genImg/collage.jpg';
                method  = 'feed';

            }else if ( type == 'twitter' ){

                // link    = 'http://twitter.com/share?text=text goes here&url=http://url goes here&hashtags=hashtag1,hashtag2,hashtag3'; 
                link    = 'http://www.'+extention+'fashionsponge.com/signup';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/genImg/collage.jpg';
                method  = 'feed';

            }
            else{

                link    = 'http://www.'+extention+'fashionsponge.com/signup';
                picture = 'http://www.'+extention+'fashionsponge.com/fs_folders/images/genImg/collage.jpg';
                method  = 'feed';

            }

            break;
        default:
            // this is not a modal but a page 

            break;
    }
    // alert('link = '+link);
    switch ( type ){
        case 'facebook':

            // alert('this is the facebook share');

            FB.init({
                appId:'528594163842974', cookie:true,
                status:true, xfbml:true
            });

            FB.ui( {
                    method: method,
                    name: title,
                    link: link,
                    picture: picture,
                    caption: name,
                    description: about
                },
                function(response) {
                    if (response && response.post_id) {
                        // alert('Look was successfully posted');
                    } else {
                        // alert('Look was not successfully posted');
                    }
                }
            );
            break;
        case 'twitter':
            link    = "http://twitter.com/share?text="+title+"&url="+link;
            window.open( link, 'mywin' , 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0' );
            break;
        case 'tumblr':
            myRef = window.open('http://www.tumblr.com/share/link?url='+link+'&name='+title+'&description='+about,'mywin',
                'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            break;
        case 'pinterest':

            // api documentation 
            // src: https://developers.pinterest.com/

            var url = "http://pinterest.com/pin/create/button/?url="+link+"&media="+picture+"&description="+about;
            myRef = window.open(url,'mywin',
                'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            break;
        case 'google_plus':
            // onclick=" google_plus( 'https://plus.google.com/share?url={http://fashionsponge.com/lookdetails?id=<?php echo $modal['table_id']; ?>'  )" /> 
            window.open(link,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;
            break;
        case 'gmail':

            myRef = window.open(link,'mywin',
                'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            break;
        default:
            break;
    }
}
function fbshare_invite ( ) {
    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    //var plno = $("#plno").text(); // from lookdetails header page
    // alert(plno);
    var lookname = $("#lookName").text(); // from lookdetails header page
    var WebDesc = $("#webDesc").text(); // description of the site.  
    // alert("plno = "+plno+" lookname = "+lookname+" WebDesc = "+WebDesc);
    FB.init({
        appId:'528594163842974', cookie:true,
        status:true, xfbml:true
    });
    FB.ui({ method: 'feed',
        message: 'Come and Join Fashion Sponge...',
        name: 'Fashionsponge Invitation ',
        link: 'http://fashionsponge.com/invite',
        picture: 'http://fashionsponge.com/fs_folders/images/uploads/posted looks/home/'+plno+'.jpg',
        caption: lookname,
        description: WebDesc
    });
}
function stuble_upon( table_id ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    //PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $modal['table_id']; ?>&src=badge','Share to StumbleUpon +',800,540)
    PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id='+table_id+'&src=badge','Share to StumbleUpon +',800,540);
}
function google_plus ( url ) {
    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // code 

    window.open(url,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;
}
function set_center( container_idClass , type , value ) {

    // extention 
    if ( isBlank(value) ) {
        value = 0;
    }
    // alert("wew")
    var dheight1 = $(window).height();
    // var dheight1;
    var dwidth1 = $(window).width();
    // alert(dwidth1);
    var dheight =0 ;
    // alert(type);
    if ( type == 'gen_popup') {
        // alert(" if ")
        if ( dwidth1 < 1024) {
            dheight = 27 + value;
        }
        else if ( dwidth1 < 1200) {
            dheight = 58 + value;
        }
        else if ( dwidth1 < 1300) {
            dheight = 75 + value;
        }
        else if ( dwidth1 < 1500) {
            dheight = 120 + value;
        }
        else if ( dwidth1 < 1700) {
            dheight = 150 + value;
        }
        else if ( dwidth1 < 1900) {
            dheight = 170 + value;
        }
        else if ( dwidth1 < 3000 ) {
            dheight = 350 + value;
        }
        else if ( dwidth1 < 4000 ) {
            dheight = 390 + value;
        }
        else if ( dwidth1 < 6000 ) {
            dheight = 400 + value;
        }
        else{
        }

    } else if ( type == 'restore-position' ) {
        dheight = 0;
        $('#popup-response').css( 'margin-top' , '0' );
    }
    else{  // popup is full screen 

        if ( dwidth1 < 1024) {
            dheight = 5 + value ;
        }
        else if ( dwidth1 < 1200) {
            dheight = 40 + value ;
        }
        else if ( dwidth1 < 1300) {
            dheight = 70 + value ;
        }
        else if ( dwidth1 < 1500) {
            dheight = 100 + value ;
        }
        else if ( dwidth1 < 1710) {
            dheight = 150 + value ;
        }
        else if ( dwidth1 < 1925) {
            dheight = 190 + value;
        }
        else if ( dwidth1 < 3000 ) {
            dheight = 350 + value ;
        }
        else if ( dwidth1 < 4000 ) {
            dheight = 390 + value ;
        }
        else if ( dwidth1 < 6000 ) {
            dheight = 400 + value ;
        }
        else{
        }
    }

    // alert("center now class and id = "+container_idClass+" divided height  = "+dheight+" window height = "+dheight1+" widow width "+dwidth1); 
    // alert(dheight);
    $(container_idClass).css({"margin-top":dheight+"px"});
    // $("#popUp-container").css({"margin-top":dheight+"px"});
}


// end invite 




// new  member modals 

function follow(  mno1 , mno2 , stat , id) {
    // alert(" followe = "+ mno1 +"following = "+ mno2 );



    if ( stat == 'follow') {
        $("#"+id).attr('src','fs_folders/images/body/Member/following-button.png');
    }else if ( stat == 'unfollow') {

    }




}

function get_login_stat ( ) {
    var mno = $('#print_login_stat_id').text();
    return mno;
}

function check_if_user_login_or_not ( ) {
    var logstatid = get_login_stat ( );
    switch( logstatid ) {
        case '136':
            // alert('user not login dont allow to follow');   
            return false
            break;
        default:
            // alert('user login allow to follow');
            return true;
            break;

    }
}
function follow_unfollow_fs_member ( buttonid , mno1 , page ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // following codes 

    var isLogin = check_if_user_login_or_not ( );
    if ( isLogin == true ) {
        var c = $(buttonid).attr('class');
        // alert('button id = '+buttonid+'page = '+page+' mno1 = '+mno1+' c = '+c);  
        if (page == 'profile'){
            // alert('profile'); 
            var button_following = 'fs_folders/images/genImg/profile-following.png';
            var button_follow = 'fs_folders/images/genImg/profile-follow.png';
        }
        else{
            var button_following = 'fs_folders/images/genImg/smaller-post-button-check.png';
            var button_follow = 'fs_folders/images/genImg/smaller-post-button.png';
        }
        if ( c == 'suggested-member-follow' ) {
            // alert('follow following button = '+button_following );  
            $(buttonid).attr('src',button_following);
            $(buttonid).attr("class","suggested-member-unfollow");
            // $(buttonid).attr('src','fs_folders/images/body/Member/following-button.png');   
            $(".suggested_member_follow_loading").css("visibility","hidden");
            $('#suggested_member_follow_loading'+mno1).css("visibility","visible");
            if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('fs-general-ajax-response').innerHTML = xmlhttp.responseText;



                var tfollowing=xmlhttp.responseText.split("<tfollowing>");
                var tfollower=xmlhttp.responseText.split("<tfollower>");
                var following = tfollowing[1];
                var follower  = tfollower[1];
                // alert(follower); 
                $('.mem_total_follower'+mno1).text(follower);
                notification( );

            }
            }
            xmlhttp.open(
                'GET',
                'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=follow"  ,
                true
            );
            xmlhttp.send();
        }
        else{
            // alert('un-follow')
            $(buttonid).attr("class","suggested-member-follow");
            // $(buttonid).attr('src','fs_folders/images/body/Member/follow-button.png');  
            $(buttonid).attr('src',button_follow);
            $(".suggested_member_follow_loading").css("visibility","hidden");
            $('#suggested_member_follow_loading'+mno1).css("visibility","visible");
            if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('footer_res').innerHTML = xmlhttp.responseText;
                var tfollowing=xmlhttp.responseText.split("<tfollowing>");
                var tfollower=xmlhttp.responseText.split("<tfollower>");
                var following = tfollowing[1];
                var follower  = tfollower[1];
                // alert(follower); 
                $('.mem_total_follower'+mno1).text(follower);
            }
            }
            xmlhttp.open(
                'GET',
                'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=unfollow",
                true
            );
            xmlhttp.send();
        }
    }
    else{
        document.location='login';
    }
}



/*

 function follow_unfollow_fs_member ( buttonid , mno1 , page ) {   

 var c = $(buttonid).attr('class');   
 // alert('page = '+page+'mno1 = '+mno1+' id '+buttonid);   
 if (page == 'profile'){   
 var button_following = 'fs_folders/images/genImg/profile-following.png'; 
 var button_follow = 'fs_folders/images/genImg/profile-follow.png'; 
 }
 else{  
 var button_following = 'fs_folders/images/body/Member/following-button.png'; 
 var button_follow = 'fs_folders/images/body/Member/follow-button.png'; 
 }   






 if ( c == 'suggested-member-follow' ) {   

 // alert('follow')



 $(buttonid).attr("class","suggested-member-unfollow");


 // $('.suggested-member-unfollow').attr('title', 'un-follow');
 // $('.suggested-member-unfollow').attr("title", "new title value") 
 // $('.suggested-member-unfollow').prop('title', '' );
 // $(buttonid).attr('src','fs_folders/images/body/Member/following-button.png');  
 $(buttonid).attr('src',button_following);  


 $(".suggested_member_follow_loading").css("visibility","hidden");
 $('#suggested_member_follow_loading'+mno1).css("visibility","visible");   
 if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 



 var tfollowing=xmlhttp.responseText.split("<tfollowing>"); 
 var tfollower=xmlhttp.responseText.split("<tfollower>");   
 var following = tfollowing[1];
 var follower  = tfollower[1];   
 $('.mem_total_follower').text(following); 
 //alert(' following = '+following); 
 //alert(' follower sdasdasd = '+follower);    



 document.getElementById('footer_res').innerHTML = xmlhttp.responseText;  
 }  
 }
 xmlhttp.open(
 'GET',
 'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=follow"  ,
 true
 ); 
 xmlhttp.send();   
 } 
 else{ 
 // alert('un-follow') 
 // $(buttonid).attr("class","suggested-member-follow");  
 // $('.suggested-member-follow').prof('title', 'follow'); 
 // $('.suggested-member-follow').prop('title', '' );
 // $(buttonid).attr('src','fs_folders/images/body/Member/follow-button.png');  

 $(buttonid).attr('src',button_follow);  
 $(".suggested_member_follow_loading").css("visibility","hidden");
 $('#suggested_member_follow_loading'+mno1).css("visibility","visible");   
 if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() { if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
 document.getElementById('footer_res').innerHTML = xmlhttp.responseText;     
 var tfollowing=xmlhttp.responseText.split("<tfollowing>"); 
 var tfollower=xmlhttp.responseText.split("<tfollower>");   
 var following = tfollowing[1];
 var follower  = tfollower[1];   
 $('.mem_total_follower').text(following); 




 }  
 }
 xmlhttp.open(
 'GET',
 'fs_folders/modals/account_settings/account_settings_modals.php?&account_seettings_tab=account-settings-suggested-member-follow&mno1='+mno1+"&action=unfollow",
 true
 ); 
 xmlhttp.send();  

 } 

 } 


 */
// end member modals  

// new ratings  for contest
function rating_change( rating ) {
    $("#rating_image0 , #rating_image1 , #rating_image2 , #rating_image3 , #rating_image4 , #rating_image5 ").css({'display':'none'});
    $("#rating_message1 , #rating_message2 , #rating_message3 , #rating_message4 , #rating_message5 ").css({'display':'none'});
    $("#rating_image"+rating).css({'display':'block'});
    $("#rating_message"+rating).css({'display':'block'});
    if ( rating == 0 ) {
        $("#ratings-star-comments-table").css({'display':'none'});
    }
    else {
        $("#ratings-star-comments-table").css({'display':'block'});
    }
}
function rating_vote_now ( rating , plno , mno ) {
    // alert('rating now');
    $('#rating-ul').css({'display':'none'});
    $('#rating_image'+rating).css({'display':'block'});
    ajax_send_data(
        'fs-general-ajax-response',
        "fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_save_rating&rating="+rating+"&plno="+plno+"&mno="+mno,
        null
    );
}
function rating_version2_vote_clicked( mno , plno ) {
    // alert(mno+" , "+plno);
    var lvoption1 = 0 , lvoption2 = 0 , lvoption3 = 0 , lvoption4 = 0 , lvoption5 = 0 , lvoption6 = 0 , lvoption7 = 0 , sum = 0;
    if($("#rating-options1").is(':checked')) {
        lvoption1 = $("#rating-options1") .val();
    }
    if($("#rating-options2").is(':checked')) {
        lvoption2 = $("#rating-options2") .val();
    }
    if($("#rating-options3").is(':checked')) {
        lvoption3 = $("#rating-options3") .val();
    }
    if($("#rating-options4").is(':checked')) {
        lvoption4 = $("#rating-options4") .val();
    }
    if($("#rating-options5").is(':checked')) {
        lvoption5 = $("#rating-options5") .val();
    }
    if($("#rating-options6").is(':checked')) {
        lvoption6 = $("#rating-options6") .val();
    }
    if($("#rating-options7").is(':checked')) {
        lvoption7 = $("#rating-options7") .val();
    }



    // alert( 'lvoption1 = '+lvoption1 +'lvoption2 = '+lvoption2 +'lvoption3 = '+lvoption3 +'lvoption4 = '+lvoption4 +'lvoption5 = '+lvoption5 +'lvoption6 = '+lvoption6); 
    sum = parseInt(lvoption1) + parseInt(lvoption2) + parseInt(lvoption3) + parseInt(lvoption4) + parseInt(lvoption5) + parseInt(lvoption6) + parseInt(lvoption7);
    // alert('total sum '+sum);   
    var view_result_id = 'fs-general-ajax-response';
    var data = "fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_save_votes&plno="+plno+"&mno="+mno+"&sum="+sum+"&lvoption1="+lvoption1+"&lvoption2="+lvoption2+"&lvoption3="+lvoption3+"&lvoption4="+lvoption4+"&lvoption5="+lvoption5+"&lvoption6="+lvoption6+"&lvoption7="+lvoption7;

    if ( sum > 0 ) {
        $('#vote-loader').css('display','block');
        if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
                var p=xmlhttp.responseText.split("<pltpercentage>");
                var v=xmlhttp.responseText.split("<pltvotes>");
                var pltpercentage = p[1];
                var pltvotes      = v[1];
                $('#pltvotes').text(pltvotes);
                $('#pltpercentage').text(pltpercentage);
                $('#pltpercentage').css('font-size','20px');
                $('#ratings-version2-blocker').css('display','block');
                $('#vote-loader').css('display','none');
            }
        }
        xmlhttp.open('GET',data,true);
        xmlhttp.send();
    }
    else{
        alert('please check atleast one in the choices to vote.');
    }
}
function show_look_rating_detail ( plno ) {

    // alert(plno);

    $('#rating-view-detail-loader').css('display','block');
    $('#popUp-background').css('display','block');
    set_center( '#popup-response' , null );



    var view_result_id = 'popup-response';
    var data = "fs_folders/modals/lookdetails/lookdetails_modals.php?load=load_look_view_more_rating&plno="+plno;
    if (window.XMLHttpRequest)  { xmlhttp = new XMLHttpRequest(); } else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP'); } xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(view_result_id).innerHTML = xmlhttp.responseText
            // $('#rating-view-detail-loader').css('display','none'); 

        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
function pop_Up_close ( id , cleanDiv ) {
    // alert('successfully');
    $(id).css('display','none');
    document.getElementById(cleanDiv).innerHTML = '';
}
// end ratings  for contest


// new rating for social site


function popup_rating ( action , process , table_id , table_name ) {

    // alert( ' action = '+action+' process = '+process+' table_id = '+table_id+' table_name = '+table_name  ); 
    var data = 'action='+action+'&process='+process+'&table_id='+table_id+'&table_name='+table_name;
    appendNow('rating-container-td','fs_folders/modals/general_modals/gen.modals.func.php?'+data,'#rating-view-more-loader');
}


function posted_modals_rate_Query ( rmno , mno , table_name , rate_type , table_id , rate_query , type , postedclass ,  thumbsName , validator , category , ano ) {

    // alert( category+'  category ');    

    // var postedclass = ''; 
    // var postedid = '';  
    // var rated = 'not rated';
    // var dripted = 'not dripted'; 
    // var favorite = 'not favorited';    

    logout_interaction_response (  sessionStorage.mno );







    var validate = $(validator).val( );

    if ( validate == 'look not rated' ) {


        // change thumbs color 

        $(postedclass).attr('src','fs_folders/images/genImg/'+thumbsName);

        // set validator to already rated 

        $(validator).val('look already rated');

        // set auto update the total ratings 

        auto_count( '#modal-tratings'+ano );

        // initialized data 

        var data = 'rmno='+rmno+'&table_name='+table_name+'&rate_type='+rate_type+'&table_id='+table_id+'&rate_query='+rate_query+'&category='+category+'&action=rate-posted-modals';

        // send code to php file 

        ajax_send_data(
            'fs-general-ajax-response',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data
        );

    }
    else if ( validate == 'modal owner'  ) {
        alert('Rate not allowed because you owned this modal.');
    }
    else{
        alert('already rated');
    }

}
// end rating for social site 
//NEW HOME 
// END HOME 
// NEW LOOKDETAILS 
function lookdetails_delete_look( table_id , plno1 , table_name , id ) {

    // alert( 'works' );
    alert( ' to be deleted = '+plno+' to be replace = '+plno1+' id = '+id );
    // table_id = plno


    if ( confirm('are you sure to delete this look yeah  ? ') ) {

        ajax_send_data(
            'fs-general-ajax-response',
            'fs_folders/modals/general_modals/gen.modals.func.php?action=delete-modal&table_id='+table_id+'&table_name='+table_name,
            'comment_post_loader1 img',
            'look-details-delete-look',
            plno1,
            id
        );
    }
    else{

    }

}
// END LOOKDETAILS  

//NEW ACTIVITY  
function show_more_friends_doing_the_same_action ( mno , _table_id , action ) {

    // alert(' plno = '+_table_id+' action ='+action);
    $('#popUp-background').css('display','block');
    set_center( '#popUp-background-container' , 'gen_popup' );

    $('#popup-more-doing-the-action-loader').css('display','block');

    var data = 'fs_folders/modals/popup/popup.php?plno='+_table_id+'&action='+action+'&type=Rated';
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('popup-response').innerHTML = xmlhttp.responseText;
            $('#popup-more-doing-the-action-loader').css('display','none');
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}
//END ACTIVITY  

//NEW FLAG 
function flag_rate ( gafalag , giflag , plno ) {
    if ( confirm( 'are you sure to flag this rate ? ') ){
        var data = 'fs_folders/modals/popup/popup.php?type=Rated-Flag&mno='+gafalag+'&mno1='+giflag+'&plno='+plno;
        if (window.XMLHttpRequest)  {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('popup-res-ni').innerHTML = xmlhttp.responseText;
                alert('successfully flagged the photo')
            }
        }
        xmlhttp.open('GET',data,true);
        xmlhttp.send();
    }
}
//END FLAG  

//NEW NEXT PREV 
function next_prev_number_restore_color ( total , color ) {
    for (var i = 0; i < total; i++) {
        $('.look_comment_next_prev_number'+i).css('color',color);
    }
}
//END NEXT PREV 


// NEW LOOK COMMENT 
function look_comment_thump_up_or_down ( plcno , action , id ,thumbsName , plno , trateid , crated ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );


    // alert input 

    // alert ( 'plcno = '+plcno+'action = '+action+ 'id = '+id+'thumbsName = '+thumbsName+ 'plno = '+plno+ 'trateid = '+trateid+ 'crated = '+crated );

    // code 

    if ( crated == 0 ) {
        var trate = parseInt( $(trateid).text() ) + 1;
        // alert( trate+' id = '+trateid   );  

        if ($(id).attr('class') != 'disabled_like') {
            $(trateid).text( trate );
            // alert( plcno+" , "+action+' thumbsName = '+thumbsName ); 
            // $(id).attr('src','fs_folders/images/icons/'+thumbsName);
            $(id).attr('src','fs_folders/images/genImg/'+thumbsName);
            // $(img_like_id).attr('src','fs_folders/images/icons/Thumbs-up.png'); 

            ajax_insert_and_append_result(
                'comment_sending_result',
                'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?type=thumbs-up-or-down&plcno='+plcno+'&thum_up_or_down='+action+'&plno='+plno,
                // '#comment_post_loader1 img'
                null
            );
            $('#img_like_'+plcno).attr('class','disabled_like');
            $('#img_dislike_'+plcno).attr('class','disabled_like');


        }
        else{
            alert('already thums action');
        }
    }
}
function auto_count( id ) {
    var trate = parseInt( $(id).text() ) + 1;
    // alert( trate );
    $(id).text( trate );
}
function sort_look_comment ( plno ) {

    var sort_comment = $('#sort_look_comment').val();

    ajax_send_data(
        'comments_result',
        'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=init&sort_comment='+sort_comment+'&plno='+plno,
        'comment_post_loader1 img'
    );

    next_prev_number_restore_color (  1000 , '#ccc' );
    $('.look_comment_next_prev_number1').css('color','#b32727');
}
function look_comment_number_clicked( number , table_id , type , mno , tab , table_name ,  action , process , page ) {

    // alert(number); 
    next_prev_number_restore_color (  1000 , 'grey' );
    $('.look_comment_next_prev_number'+number).css('color','#b32727');



    // initialized 

    // alert (  'number = '+number+'table_id = '+table_id+'type = '+type+'mno = '+mno+'tab='+tab+'table_name='+table_name+ 'action='+action+'process='+process+'page='+page)
    // $('#comment_post_loader1 img').css('display','block'); 
    // document.getElementById('comments_result').innerHTML = ""; 

    // ajax_send_data(
    //  'comments_result',
    //  'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=next_prev&nexprev='+number,
    //  '#comment_post_loader img'
    // ); 

    switch ( type ) {
        case 'rate-look':

            // alert('rate look');

            get_rate_look_sort ( );

            // alert(' style = '+rate_style+' || looks = '+rate_looks+'||  status ='+rate_status+' || number page = '+number); 
            /*
             var style = 'asdasd';
             var looks = 'asdasd'; 
             var status =  'asd';
             */

            // this is for testing visible 

            // ajax_send_data(
            //  'fs-general-ajax-response',
            //  'fs_folders/modals/rate-look/rate-look-modals.php?pagenum='+number+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25',
            //  'comment_post_loader1 img' 
            // ); 

            //  warning this will not show when the notification function is on.

            append_home(
                'rate-look-res',
                'fs_folders/modals/rate-look/rate-look-modals.php?pagenum='+number+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25',
                '#comment_post_loader1 img',
                'replace',
                'rate-look'
            );

            break;
        case 'profile-tabs':


            // #comment_post_loader1 img

            // alert( 'profile tabs mno = '+mno + 'page num = '+ number ); 

            var data = 'action=profile-tabs&pagenum='+number+'&tab='+tab+'&mno1=+'+mno+'&page='+page;
            append_home(
                'popup-response',
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                '#loading img',
                '',
                'profile-tabs'
            );
            break;
        case 'detail':
            // alert( action+process+table_name+table_id+number ); 
            // alert('wew');
            // alert( 'this is the comment detail' ); 
            var data = 'action='+action+'&process='+process+'&table_name='+table_name+'&table_id='+table_id+'&pagenum='+number;
            ajax_send_data(
                // 'fs-general-ajax-response',
                'comments_result',
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                'comment_post_loader1 img'
            );
            break;
        default:
            // alert('comment'); 
            ajax_send_data(
                'comments_result',
                'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=next_prev&nexprev='+number+'&plno='+table_id,
                'comment_post_loader1 img'
            );
            break;
    }
}
function comment_box_hit_enter_js( plno , e , type ) {
    if (e.keyCode == 13 || type == 'post-botton' ) {

        // detect if login or logout redirect 

        logout_interaction_response (  sessionStorage.mno );

        // code 

        // alert('enter') 
        // alert('plno ='+plno);
        // var code = (e.keyCode ? e.keyCode : e.which);
        // alert(object.keyCode );


        // mno
        // comment
        // table_id
        // table_name

        var comment = $('#comment_box').val( );
        comment = text_trim( comment );




        var data    = 'comment='+comment+'&table_name=postedlooks&plno='+plno;


        ajax_insert_and_append_result(
            'comments_result',
            'fs_folders/fs_lookdetails/look_comment_items/look-comments_display.php?post_comment=posted_a_comment&'+data,
            '#comment_post_loader1 img'
        );

        $('#comment_box').val('');
    }
}
function delete_look_comment( cno , table_id , table_name ) {

    // var d = confirm('You really want to delete this comment now ?'+cno+plno+table_name);
    var d = confirm('You really want to delete this comment now ?');

    if(d) {
        $('#comment_list_'+cno).fadeOut('fast');
        // alert( '#comment_list_'+cno );
        $('#comment_list_1'+cno).fadeOut('fast');
        // $('#comment_list_'+cno).css('display','none');
        // alert('comment deleting'); 
        // ajax_send_data('res','fs_folders/fs_lookdetails/look_comment_items/data/delete.php?cno='+parseInt(cno));  
        ajax_send_data(
            'fs-general-ajax-response',
            'fs_folders/modals/general_modals/gen.modals.func.php?mcid='+parseInt(cno)+'&table_id='+table_id+'&table_name='+table_name+'&action=delete-comment-modals'
        );


    }
}
// END LOOK COMMENT


// NEW LOOK IMAGE 


function new_look_image_mouse_hovered( ano ) {
    alert('mouse enter');
    // $('.new-look-mousover-desc-title-container'+ano).css({'display':'block'});
    $('.new-look-mousover-desc-title-container'+ano).fadeIn('normal');
}
function new_look_image_mouse_out( ano ) {
    alert('mouse out')
    $('.new-look-mousover-desc-title-container'+ano).fadeOut('normal');
}

// END LOOK IMAGE


//NEW POST A LOOK READ 
function new_postalook_page_show ( j ) {
    for (var i = 1; i <= 6 ; i++) {
        $('#new-postalook-tab'+i).css('color','#284372');
        $('#new-postalook-tab'+i+'-line').css('display','none');
        $('#new-postalook-content'+i).css('display','none');
    };
    $('#new-postalook-tab'+j).css('color','#b21d23');
    $('#new-postalook-tab'+j+'-line').css('display','block');
    $('#new-postalook-content'+j).css('display','block');
}
function post_look_read_contest_detail_tab( j ) {
    for (var i = 1; i <= 4 ; i++) {
        $('#new-postalook-content2-tab-'+i).css('color','grey');
        $('#new-postalook-content2-content-'+i).css('display','none');
    };
    $('#new-postalook-content2-tab-'+j).css('color','#b21d23');
    $('#new-postalook-content2-content-'+j).css('display','block');
}
// END POST A LOOK READ



$(document).ready(function(){

    // NEW POST A LOOK UPLOAD 



    function readImage(file) {

        var reader = new FileReader();
        var image  = new Image();

        reader.readAsDataURL(file);
        reader.onload = function(_file) {
            image.src    = _file.target.result;              // url.createObjectURL(file);
            image.onload = function() {
                var w = this.width,
                    h = this.height,
                    t = file.type,                           // ext only: // file.type.split('/')[1],
                    n = file.name,
                    s = ~~(file.size/1024) +'KB';

                // document.getElementById('new-postalook-upload-preview').innerHTML = '<img src="'+ this.src +' " style="width:285px";  > '+w+'x'+h+' '+s+' '+t+' '+n+'<br>';  
                // alert('height '+h+'width '+w); 

                if ( w >= 200 &&  h >= 200) {
                    document.getElementById('new-postalook-upload-preview').innerHTML = '<img src="'+ this.src +' " style="width:285px";  >';
                    $('#new-postalook-file-upload-stat-display').text(n);
                }
                else{
                    alert('Sorry We accept only size of 300 x 500 and above but you have '+w+' by '+h+' please try another look.' );
                }
            };
            image.onerror= function() {
                alert('Invalid file type: '+ file.type);
            };
        };
    }
    $("#f_image").change(function (e) {
        // alert( ' change ');
        if(this.disabled) return alert('File upload not supported!');
        var F = this.files;
        if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );
    });




    // END POST A LOOK UPLOAD   
})
// NEW POST A LOOK UPLOAD  
function post_look_upload_select_file( ) {

    $('#f_image').click( );
}
function new_postalook_upload_rotate_check_uncheck ( ) {
    // alert('rotate image');
    var c = $("#new-postalook-check-div-image-rotate").attr('class');
    var set_class = '';
    var set_img = '';
    var set_input_val = '';


    // alert( c ); 

    if (c == 'new-postalook-not-rotate') {
        // rotate true if true color red
        // change class to new-postalook-rotate
        // add value to input rotate
        // $("#new-postalook-check-div-image-rotate").attr('class','new-postalook-rotate'); 

        set_img = 'red';
        set_class = 'new-postalook-rotate';
        set_input_val = 'rotate';


    }
    else{
        // rotate false if false color grey
        // change class to new-postalook-not-rotate 
        // $("#new-postalook-check-div-image-rotate").attr('class','new-postalook-not-rotate'); 

        set_img = 'grey';
        set_class = 'new-postalook-not-rotate';
        set_input_val = 'not rotate';


    }

    $("#new-postalook-check-div-image-rotate").attr('class',set_class);
    $("#new-postalook-check-div-image-rotate img").attr('src','fs_folders/images/genImg/postalook-'+set_img+'-check.png');
    $("#new-postalook-check-div-image-rotate input").val(set_input_val);
}


function new_postalook_upload_rules_check_uncheck ( ) {

    var c = $("#new-postalook-check-div-rule-agree").attr('class');
    var set_class = '';
    var set_img = '';
    var set_input_val = '';

    if (c == 'new-postalook-not-agree') {
        set_img = 'red';
        set_class = 'new-postalook-agree';
        set_input_val = 'agree';
        show_postinglookg_rules ( );
    }
    else{
        set_img = 'grey';
        set_class = 'new-postalook-not-agree';
        set_input_val = 'not agree';
    }
    $("#new-postalook-check-div-rule-agree").attr('class',set_class);
    $("#new-postalook-check-div-rule-agree img").attr('src','fs_folders/images/genImg/postalook-'+set_img+'-check.png');
    $("#new-postalook-check-div-rule-agree input").val(set_input_val);
}


function  show_postinglookg_rules ( ) {

    $('#popUp-background').fadeIn('normal');
    $('#popup-more-doing-the-action-loader').css('display','none');
    set_center( "#popup-response" );
}
function close_posting_rules ( ) {

    // $('#popUp-background').css('display','none');
    // $('#popUp-background').fadeOut('normal');
    $('#popUp-background').fadeOut( 'slow' , function ( ){
        $('#popup-response').css( 'margin-top', '0' );
    } );
}
function new_postalook_submit_new_uploaded_looks( ) {

    var agree = $("#new-postalook-check-div-rule-agree input").val();
    var img = $("#f_image").val();



    // alert(img);
    // alert(img.indexOf('fakepath'));
    // 

    if ( img.indexOf('fakepath') < 1 ) {
        alert(' please select image first ');
        return false;
    }
    else if (agree == 'agree') {
        // alert('redirect ');
        return true;
    }
    else if ( agree == 'not agree' ) {
        alert('please agree first the posting rules');
        return false;
    }
    // return false;
}
// END POST A LOOK UPLOAD  

// NEW POST A LOOK LABEL

function new_postalook_label_share ( id ) {

    // alert('this is it! '+id);    
    var set_img = '';

    var input = $(id).val()
    switch (input) {
        case 'not share fb':
            $(id).val('share fb');
            set_img = 'red';
            break;
        case  'share fb':
            $(id).val('not share fb');
            set_img = 'grey';
            break;

        case 'not share tw':
            $(id).val('share tw');
            set_img = 'red';
            break;
        case  'share tw':
            $(id).val('not share tw');
            set_img = 'grey';
            break;

        case 'no feedback':
            $(id).val('with feedback');
            set_img = 'red';
            break;
        case 'with feedback':
            $(id).val('no feedback');
            set_img = 'grey';
            break;
        default:
            alert('default ')
            break;
    }
    $(id+'-check').attr('src','fs_folders/images/genImg/postalook-'+set_img+'-check.png');
}
// END POST A LOOK LABEL

// NEW HEADER SIGN-OUT
function header_login_button_mouseover( ) {
    $("#new-header-button-login").attr('src','fs_folders/images/genImg/log-in-mouse-over.png');
}
function header_login_button_mouseout( ) {
    $("#new-header-button-login").attr('src','fs_folders/images/genImg/login-button.png');
}
// END HEADER SIGN-OUT

// NEW HEADER SIGN-IN   

function header_post_popup_category_show ( ) {
    // alert('post popup show');  
    gen_popup( 'show' );
    // set_center('#popUp-background-container'); 
    var data = 'action=postalook&process=design';
    ajax_send_data(
        'popup-response',
        'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
        'popup-more-doing-the-action-loader img'
    );


}
function close_category_popup ( )  {

    // $('#popUp-background').css('display','none');
    $('#popUp-background').fadeOut('normal');
}
function mouseover_show_hide_menu( mouseOver_el , mouseOut_el , show_hide_el ) {


    $(mouseOver_el).mouseover(function ( ) {
        $(show_hide_el).css("display","block");
    })


    $(mouseOut_el).mouseout(function ( ) {
        // alert('mouse out ');
        $(show_hide_el).css("display","none");

    })
}
function fs_logout ( ) {
    var b = confirm('are you sure to logout ? ');
    if ( b ) {
        // alert('successfully logout');
        Go('logout');
    }
    else{


    }
}
function settings_dropdown_tab_clicked ( id , url ) {




    var tableid = '#header-settings-dropdown-';

    for (var i = 1; i <= 3; i++) {

        $(tableid+i).css('color','284372');
        $(tableid+i).css('background-color','white');
    };

    $(tableid+id).css('color','white');
    $(tableid+id).css('background-color','#284372');

    Go(url);
}
function header_dropdown ( textid , textcolor , undelineid , underline_css ) {

    $(textid).css({'color': textcolor });
    $(undelineid).css({'visibility': underline_css });





    // alert( 'this is the color text id = '+textid+' text color = '+textcolor );
}
function header( type , e , action , table_name , table_id , response , loader ) {

    // alert( 'it works ');

    var  header = { keySearch: "" , result: "fs-general-ajax-response" };
    var timer   = 0;
    header['result'] = 'search-response-display';
    clearTimeout(timer);


    switch( type ) {
        case 'search-field':

            timer = 200;

            setTimeout(function(){

                // get the keyword inputed
                header['keySearch'] = $( "#new-header-signout-search" ).val( );
                //  clean the previous result
                document.getElementById(header['result']).innerHTML = '';

                if ( header['keySearch'] == '' ) {
                    //  search field is empty
                    $( '#search-response-container' ).css('display','none');
                }
                else{
                    // searching an output based on the search field input 
                    $( '#search-response-container' ).css('display','block');
                    var data = 'action=header&type=search-field&keySearch='+header['keySearch'];
                    ajax_send_data(
                        header['result'],
                        'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                        'search-response-loader',
                        'search-field'
                    );
                }
            }, timer );

            break;
        case 'search-field-show':

            $( '#search-response-container' ).css('display','none');
            break;
        case 'search-field-hide':

            $( '#search-response-container' ).css('display','none');
            break;
        case 'view-more-search-result':

            // get the keyword inputed

            header['keySearch'] = $( "#new-header-signout-search" ).val( );


            // alert( header['keySearch'] );

            // alert( 'table name '+table_name );

            var data = 'action=header&type=search-field-view-more&table_name='+table_name+'&keySearch='+header['keySearch'];


            // ajax_send_data( 
            //  'fs-general-ajax-response', 
            //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
            //  loader, 
            //  'search-field-view-more'
            // );   



            appendNow(
                response,
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                loader,
                'search-field-view-more'
            );



            break;
        default:
            break;
    }
}


// END HEADER SIGN-IN

// NEW RATE LOOK 


function get_rate_look_sort ( ) {

    rate_style  = $( '#rate-look-style'  ).val();  // Streetwear , Menswear , Chic , Preppy
    rate_looks  = $( '#rate-look-looks'  ).val();  //top looks , all looks
    rate_status = $( '#rate-look-status' ).val();  // rated or un rated   
}
function rate_look_sort ( ) {
}
function rate_look_loaded ( ) {
    // alert('rate a look loaded ');
}

function rate_look_retrieve_nextprev_and_look_modals ( ) {
    // get sorting options   
    get_rate_look_sort ( );
    //  print next prev 
    // alert(rate_style); 
    if ( rate_style == 'All Style' ){
        url='look?category=alllooks';
    }else{
        url='look?category='+rate_style.toLowerCase();
    }
    change_url (url);
    ajax_send_data(
        '',
        'fs_folders/modals/rate-look/rate-look-modals.php?retrievedas=rate-next-prev'+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25',
        '' ,
        'rate-look'
    );
    // ajax show in the black container  
    // ajax_send_data(
    //  'fs-general-ajax-response', 
    //  'fs_folders/modals/rate-look/rate-look-modals.php?retrievedas=rate-next-prev'+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25&pagenum=1' 
    // );     
    // print look  
    // look_comment_number_clicked( 1 , null , 'rate-look' );     
    // alert( 'modal loaded' );
    // retrieved the numbers  
    // look_comment_number_clicked( 1 , null , 'rate-look' );     
    // alert( 'modal loaded' );
    // retrieved the numbers 
    // retrieved the look modals   
}
// END RATE LOOK 



    /** Rate article */ 
    function rate_article_retrieve_nextprev_and_article_modals ( ) 
    {  
         // get sorting options   
        get_rate_look_sort ( );
        //  print next prev 
        // alert(rate_style); 
        if ( rate_style == 'All Style' ){
            url='look?category=alllooks';
        }else{
            url='look?category='+rate_style.toLowerCase();
        }
        // change_url (url);
        ajax_send_data(
            '',
            'fs_folders/modals/rate-look/rate-look-modals.php?retrievedas=rate-next-prev'+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25',
            '' ,
            'rate-look'
        );
        // ajax show in the black container  
        // ajax_send_data(
        //  'fs-general-ajax-response', 
        //  'fs_folders/modals/rate-look/rate-look-modals.php?retrievedas=rate-next-prev'+'&rate_style='+rate_style+'&rate_looks='+rate_looks+'&rate_status='+rate_status+'&rate_limit=25&pagenum=1' 
        // );     
        // print look  
        // look_comment_number_clicked( 1 , null , 'rate-look' );     
        // alert( 'modal loaded' );
        // retrieved the numbers  
        // look_comment_number_clicked( 1 , null , 'rate-look' );     
        // alert( 'modal loaded' );
        // retrieved the numbers 
        // retrieved the look modals   
    }


// NEW GENERAL CODE
function change_image_src ( id , src ) {
    // alert('mous in id = '+id+' src '+src ); 
    $(id).attr('src',src);
}
function mousein_change_button ( id , src ) {
    // alert('mous in id = '+id+' src '+src ); 
    $(id).attr('src',src);
}
function mouseout_change_button (  id , src  ) {
    // alert('mous out id = '+id+' src '+src ); 
    $(id).attr('src',src);
}
function mousein_change_background_image (  id , src   ) {
    $(id).css('backgroundImage',src );
}
function mouseout_change_background_image (  id , src  ) {
    $(id).css('backgroundImage',src );
}
function clicked_change_image_src ( id , src ) {
    $(id).css('backgroundImage',src );
}
// END GENERAL CODE 

// NEW LOGIN AREA 
function toogle( hide , show ) {
    // $(hide).fadeOut('fast',function(){ 
    // alert('hide dom done'); 
    // } );  
    $(hide).css('display','none');
    $(show).fadeIn('slow');


    // alert( show );


    if ( show == '#signup-form' ) {
        set_center( '#login-body-container' , 'gen_popup' ,  -65 );
        // alert('sign up form');
    }
    else if ( show == '#login-form' ) {
        set_center( '#login-body-container' , 'gen_popup' ,  15 );
        // alert('login form');
    }
    else if ( show == '#forgot-password' ) {
        set_center( '#login-body-container' , 'gen_popup' ,  40 );
        // alert('forgot pass form');
    }
    else{

    }






}
function jquery_effects( id , type ){
    switch( type ) {
        case 'slide-up':
            $(id).slideUp('fast');
            break;
        case 'slide-down':
            $(id).slideDown('fast');
            break;
        default:
            break;
    }
}
function validate_login ( type , action , e ) {

    //   initialize the keyup

    var enter   = false;
    e = e || window.event;
    var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
    if (charCode && String.fromCharCode(charCode) == ":") {
    }

    // select page 

    if ( charCode == 13 ) {
        enter=true;
    }
    if ( action == 'login' || action == 'signup' || action == 'rcpass' || action == 'signup-code-submit' ) {
        enter=true;
    }

    // execute code

    if ( enter ) {
        switch ( type ) {
            case 'login':
                var e = $('#login-email').val();
                var p = $('#login-password').val();
                // alert('login: email = '+e+' password = '+p);   
                ajax_send_data(
                    'login-error-or-success',
                    'fs_folders/modals/login/validate-login.php?mail='+e+'&pass='+p+'&type=login',
                    'login-loader img',
                    'login-form'
                );
                break;
            case 'signup':
                // alert('sign up');    
                var c = $('#signup-code').val();
                var f = $('#signup-fname').val();
                var e = $('#signup-email').val();
                var p = $('#signup-pass').val();
                var ua = $('#signup-uanswer').val();
                var ra = $('#signup-ranswer').val();

                ajax_send_data(
                    'signup-error-or-success',
                    // 'fs-general-ajax-response', 
                    'fs_folders/modals/login/validate-login.php?fname='+f+'&mail='+e+'&pass='+p+'&uanswer='+ua+'&ranswer='+ra+'&type=signup&signup_code='+c,
                    'signup-loader img',
                    'signup-form'
                );

                break;
            case 'rcpass':

                var f = $('#rc-fname').val();
                var e = $('#rc-email').val();

                ajax_send_data(
                    'rcpass-error-or-success',
                    'fs_folders/modals/login/validate-login.php?fname='+f+'&mail='+e+'&type=rcpass',
                    'rcpass-loader img',
                    'rcpass-form'
                );

                break;
            case 'signup-code':
                var sc = $('#signup-code').val();
                // alert( 'sign up code'+sc );

                ajax_send_data(
                    'signup-code-error-or-success',
                    'fs_folders/modals/login/validate-login.php?sc='+sc+'&type='+type,
                    'signup-code-loader img',
                    'signup-code'
                );


                break;
            default:
                alert('default');
                break;
        }
    }

}
function show( id ) {

    $(id).css('display','block');
    set_center( "#login-body-container" );
}
function ajax_close( id ){
    // alert('asdasd');
    $(id).fadeOut('normal');
}
// END LOGIN AREA

// NEW LOGOUT AREA 

function logout_interaction_response ( mno ) {

    if (  mno  == "136"  ) {
        Go('signup');
        // alert( 'redirect to sign up' );  
        throw new FatalError("error");
    }
    else{
        // alert(  mno );
    }


}
//END LOGOUT AREA

// NEW WELCOME PAGE
function welcome_change_content ( container , page  , loader ,  clicked_tab  ) {

    var b = true;
    var msg = '';
    // brand pressed to continue


    if ( clicked_tab == 3) {


        var fname     = $('#fname').val( );
        var nname     = $('#nname').val( );
        var lname     = $('#lname').val( );
        var uname     = $('#uname').val( );
        var byear     = $('#byear').val( );
        var gender    = $('#gender').val( );
        var about     = $('#about').val( );
        var avatar    = $('#avatar').val( );
        var country   = $('#country').val( );
        var state     = $('#state').val( );
        var city      = $('#city').val( );
        var zipcode   = $('#zipcode').val( );


        var value = '&fname='+fname+'&nname='+nname+'&lname='+lname+'&uname='+uname+'&byear='+byear+'&gender='+gender+'&about='+about+'&country='+country+'&country='+country+'&state='+state+'&city='+city+'&zipcode='+zipcode;

        ajax_send_data(
            'fs-general-ajax-response' ,
            'fs_folders/modals/welcome/welcome_modals.php?tab=save-about'+value, 'more_loading3 img' ,
            'welcome-popup-about'
        );

        b = false;
        msg = '';
    }
    // else if ( clicked_tab == 3 ) { 
    //  var brands = $('#brandField').val();  
    //  var brand = brands.split(",");   
    //  var tbrand = brand.length-1;  
    //  if ( tbrand >= 5 ) { 
    //      page = page+'?brands='+brands;   
    //  }   
    //  else{
    //      b = false; 
    //      msg = 'please atleast 5  brands ';   
    //  } 
    // }



    welcome_page_loaded_content ( b , msg , container , page  , loader ,  clicked_tab  );



}
function welcome_page_loaded_content (  b , msg , container , page  , loader ,  clicked_tab  ) {
    if ( b == true ) {
        // alert('true');
        var tabs = '.wt';
        var underline = '.welcome-tab-underline'
        $(loader).css( 'visibility','visible' );
        $( container ).load(page, function() {
            $(loader).css( 'visibility','hidden' );
            // restore all the tabs to normal
            for (var i = 1; i <= 4; i++) {
                $(tabs+i).css({'color':'grey','font-weight':'normal'} );  // text
                $(underline+i).css({'background-color':'grey' , 'visibility':'hidden' });   // underline 
            };
            // clicked tab or current tab is opened
            $(tabs+clicked_tab).css({'color':'#b32727','font-weight':'bold'} );  // text
            $(underline+clicked_tab).css({'background-color':'#b32727' , 'visibility':'visible' });   // underline  
        });
    }
    else{
        if ( msg != '' ) {
            alert(msg);
        }
    }

}
function welcome_more( view_result_id , loader , tab ) {
    // alert('more');   
    var data = 'fs_folders/modals/welcome/welcome_modals.php?tab='+tab;
    appendNow(
        view_result_id,
        data,
        loader
    );
}
// END WELCOME PAGE  








// NEW DRIP  
function drip_popup_show( mno , table_name , table_id , title , modal_type , mno1 , imgid , imgsrc , ano , validator ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // initialized

    var value = $(validator).val();

    // conditions

    if ( value == 'modal owner' ){
        alert('Drip not allowed because you owned this modal');
    }
    else {

        $(imgid).attr('src',imgsrc);
        $('#drip-modal-wrapper').css('height','100px');
        var data = 'action=fs-drip-modals&steps=design&mno='+mno+'&table_name='+table_name+'&table_id='+table_id+'&mno1='+mno1+'&modal_type='+modal_type+'&title='+title+'&ano='+ano;
        ajax_send_data(
            'popup-response' ,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            'popup-more-doing-the-action-loader img',
            'drip-modal'

        );
        $('#popup-response').text('');
        // $('#popUp-background').fadeIn( 'normal' ); 
        gen_popup( 'show' );
    }

}
function drip_posting( mno , table_name , table_id , mno1 , counterid ) {

    // alert( counterid );
    auto_count( counterid );
    var comment = $('#dript-comment').val();
    var data = 'action=fs-drip-modals&steps=function&mno='+mno+'&table_name='+table_name+'&table_id='+table_id+'&comment='+comment+'&mno1='+mno1;
    ajax_send_data( 'popup-response' , 'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 'popup-more-doing-the-action-loader img' , 'success-popup' );
    // $('#popup-response').text('');   
    // 
    // alert( ' successfully dripted !' ); 
    // $('#popUp-background').css('display','none'); 


}
// END DRIP 

// NEW FAVORITE
function favorite_popup_show( mno , table_name , table_id , title , modal_type  , mno1 ) {   }

function favorite_posting( mno , table_name , table_id , headermssg , contentmssg , modal_type , mno1 , imgid , imgsrc , counterid , validator ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // initialized

    var value = $(validator).val();

    // conditions

    if ( value == 'modal owner' ){

        alert('Favorite not allowed because you owned this modal');

    }
    else {
        auto_count( counterid );
        $(imgid).attr('src',imgsrc);
        var data = 'action=fs-favorite-modals&steps=function&mno='+mno+'&table_name='+table_name+'&table_id='+table_id+'&headermssg='+headermssg+'&contentmssg='+contentmssg+'&modal_type='+modal_type+'&mno1='+mno1;
        ajax_send_data( 'popup-response' , 'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 'popup-more-doing-the-action-loader img' , 'success-popup' );

        $('#popup-response').text('');
        $('#popUp-background').fadeIn( 'normal' );
    }

}
// END FAVORITE

// NEW POPUP


function set_position_of_response_popup( dividend ) {

    var pos = $(window).height( )/dividend;
    $('#popup-response').css( 'margin-top',pos );
    return pos;
}
function auto_hide_response_popup_container ( time ) {

    setTimeout(function(){
        $('#popUp-background').fadeOut( 'slow' , function ( ){
            $('#popup-response').css( 'margin-top', '0' );
        } );
    }, time);
}
function fs_popup( page , action , process , method , table_id , table_name , type , title ) {
    // alert ( 'this is the popup' );
    // alert('post popup show'); 

    //alert ( 'page = '+page+' action = '+action+' process = '+process+' method = '+method+' table_id = '+table_id+' table_name = '+table_name );

    var title = 'The Best Fashion Inspiration By The Best Bloggers';

    gen_popup( 'show' );
    switch(  page ) {
        case 'welcome': 
        		$( '#popup-response' ).load( "welcome.php" );
            break;
        case 'postarticle':

             // center_popup('#popUp-background-container');
             // $('#popUp-background').css({'position':'relative',});
             set_center( '#popUp-background-container' , 'restore-position' );
             var data = 'action='+action+'&process='+process+'&method='+method+'&table_id='+table_id+'&table_name='+table_name+'&type='+type;

             // ajax_send_data(
             //  'popup-response',
             //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
             //  'popup-more-doing-the-action-loader img'
             // );
            
             // alert(data);
    

             $('#popup-response').css('margin-top','-10px');
             ajax_send_data_html(
                "#popup-response",
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                '#popup-more-doing-the-action-loader img'
             )

            // $( "#popup-response" ).load( 'postarticle.php' );
            break;
        case 'popup-small':
             // $('#popUp-background').css({'position':'relative',});
             set_center( '#popUp-background-container' , 'gen_popup' );
             var data = 'action='+action+'&process='+process+'&method='+method+'&table_id='+table_id+'&table_name='+table_name+'&type='+type;
             ajax_send_data_html(
                "#popup-response",
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                '#popup-more-doing-the-action-loader img'
             )
             break;
        case 'modal-details':
            // $('#popUp-background').css({'position':'relative',}); 
            set_center( '#popUp-background-container' , 'restore-position' );
            var data = 'action='+action+'&process='+process+'&method='+method+'&table_id='+table_id+'&table_name='+table_name+'&type='+type;
            // ajax_send_data(
            //  'popup-response', 
            //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
            //  'popup-more-doing-the-action-loader img'  
            // );   
            $('#popup-response').css('margin-top','-10px');
            ajax_send_data_html(
                "#popup-response",
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                '#popup-more-doing-the-action-loader img'
            )
            url = type;
            change_url ( url , title );
            // $( "#popup-response" ).load( 'postarticle.php' );
            break;
        case 'details-popup-continue-reading': 
                $( "#popup-response" ).load( "lookdetails-popup.php", function() { $('#popup-more-doing-the-action-loader').css('display', 'none'); });
            break;  

        case 'close-details-popup':
                gen_popup( 'hide' );
            break; 
        case 'close':


            // alert('close the popup')
            change_url ( '/' , title );
            
        default:
            set_center('#popUp-background-container');
            break;
    }
}
function gen_popup( action ) {

    switch( action ){
        case 'show':
            $('body').css({'overflow-y':'hidden'});
            $('#popUp-background').css('display','block');
            document.getElementById('popup-response').innerHTML = "";
            set_center( '#popUp-background-container' , 'restore-position' );
            break;
        case 'hide':
            $('body').css({'overflow-y':'visible'});
            $('#popUp-background').fadeOut('normal');
            break;
        default:
            break;
    }

}
// END POPUP 

// NEW PROFILE 

function profile_change_tab ( tab , textid , underlineid , loaderid , mno1 , page , e , sub_tab , type ) {

    // alert(tab+" , "+textid+" , "+underlineid+" , "+loaderid+' mno1 = '+mno1+' page =  '+page+' type = '+type );  
    // change tab color and add loader 


    // initialized variable

    var orderby    = '';
    var like       = '';
    var enter      = true;
    var sub        = '';
    var categories = '';

    // initialized keyCode  

    var enter   = true;
    e = e || window.event;
    var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
    if (charCode && String.fromCharCode(charCode) == ":") {
    }

    // set 

    $('.profile-texttab span').css({'color':'grey'});
    $('.profile-underline div' ).css({'visibility':'hidden'});
    $('.profile-loader div img' ).css({'visibility':'hidden'});
    $(textid).css('color','#b21426');
    $(underlineid).css({'visibility':'visible'});
    // $(loaderid).css('visibility','visible');  

    // validate keyCodes  

    if ( tab == 'member-subdiv-search'  ) {

        // check if enter key hit

        if ( e.keyCode == 13 ) {
            enter = true;
        }
        else{
            enter = false;
        }

    }

    // alert(enter);

    if ( enter == true ) {

        if ( tab == 'member-subdiv-dropdown' ) {

            // get the tab value of the dropdown   

            var orderby = $(textid).val();

            // assign back the member tab because the value of the subtab already retrieved 

            tab   = 'member';

            // sub design 

            sub = 'dropdown';
        }
        else if ( tab == 'member-subdiv-search'  ) {

            // get the tab value of the dropdown   

            var like = $(textid).val();

            // assign back the member tab because the value of the subtab already retrieved 

            tab   = 'member';

            // sub design 

            sub = 'search';
        }
        else{

            // if not subtab was clicked then the subtabs will change according to its tab
            //  show sub tabs  

            $('#profile-member-sub-tabs').css('display','none');
            $('#profile-comment-sub-tabs').css('display','none');
            $('#profile-blog-sub-tabs').css('display','none');
            $('#profile-look-sub-tabs').css('display','none');

            switch ( tab ) {
                case 'comments':
                    $('#profile-comment-sub-tabs').css('display','block');
                    break;
                case 'member':
                    $('#profile-member-sub-tabs').css('display','block');
                    break;
                case 'blogs':
                    $('#profile-blog-sub-tabs').css('display','block');
                    break;
                case 'looks':
                    $('#profile-look-sub-tabs').css('display','block');
                    break;
                default:
                    break;
            }
        }
 

        // Save data to sessionStorage
        sessionStorage.setItem('prev_color', 'rgb(178, 20, 38)');





        // get sub categories  

        category = $(sub_tab).val();
        // alert( category ); 

        // alert( 'tab = '+tab+' orderby = '+orderby ); 
        // generate the content  

        var data = 'action=profile-tabs&pagenum=1&pagenumgroup=1&pagenumgroup_limit=816&tab='+tab+'&mno1=+'+mno1+'&page='+page+'&orderby='+orderby+'&like='+like+'&category='+category;

        // ajax_send_data( 
        //  'fs-general-ajax-response' , 
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data 
        // );     

        append_home(
            'popup-response',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            '#'+loaderid,
            '',
            'profile-tabs',
            type
        );

        // action
        // tab 
        // grey all  
        // red id  
    }

}
function profile_change_content ( ) {
}
// END PROFILE 

// NEW COMMENT MODAL 



function modal_comment_send ( mno , table_id , table_name , id , e , page , response , loader ) {


    // alert( ' weee. . . ' );
    // alert("got a key = " + event.keyCode);


    // var response = 'fs-general-ajax-response';
    if (event.keyCode == 13 || page == 'detail' ) {

        // detect if login or logout redirect 

        logout_interaction_response (  sessionStorage.mno );


        var comment = $('#modal-comment-field'+id).val();
        $('#modal-comment-field'+id).val('');

        comment = text_trim( comment );

        // alert( 'thi is the comment '+comment );
        var data = 'action=modal-comment-send&mno='+mno+'&comment='+comment+'&table_id='+table_id+'&table_name='+table_name+'&page='+page;

        // alert(mno+table_id+table_name+id++page+comment); 

        // ajax_send_data( 
        //  'fs-general-ajax-response' ,  
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
        //  'modal-comment-loader-test'+id,
        //  'modal-comment'
        // );       

        /*
         append_home(
         comment-container+id,
         'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
         '',
         '',
         'modal-comment'
         );   
         */

        // prepend(
        //  'comment-container'+id,
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
        //  '#modal-comment-loader-test'+id,
        //  'modal-comment',
        //  id
        // );  

        appendNow(
            // 'comments_result',
            response,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            // '#modal-comment-loader-test1 , #modal-comment-loader-test2',
            loader,
            'modal-comment',
            id
        );














    }
    else{
        // alert('typing...');
    }
    // var followingInput = document.getElementById("2"); 
    // followingInput.focus();
    // } 
}
function modal_comment_like_dislike( mno , table_id , table_name , rate_type , thumbsName , thumbs_id , id , trateid ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // comment like and dislike  
    // send to php : mno , table_id , table_name and rate_type
    // thumbsName : use to auto change the image of the like or dislike color 
    // id is use for the call and check the specific data

    var trate = parseInt( $(trateid).text() ) + 1;
    var cstat_id = '#rate-comment-stat';
    var cstat = $(cstat_id+id).val();


    if ( cstat == 'not rated comment' ) {
        $(trateid).text(trate);
        $(cstat_id+id).val('rated comment');
        $(thumbs_id).attr('src','fs_folders/images/genImg/'+thumbsName);
        var data = 'action=modal-comment-like-dislike&mno='+mno+'&table_id='+table_id+'&table_name='+table_name+'&rate_type='+rate_type;
        ajax_send_data(
            'fs-general-ajax-response' ,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            '',
            'modal-comment'
        );
    }
    else{
        alert('comment already rated');
    }
}
// END COMMENT MODAL

// NEW NOTIFICATION 


function notification ( process , limit_start , limit_end , mno ) {

    var send_notification = true;

    if ( send_notification == true ) {

        var data1 = 'action=notification&process='+process+'&limit_start='+limit_start+'&limit_end='+limit_end+'&mno='+mno;
        var view_result_id = 'fs-general-ajax-response';
        var data = 'fs_folders/modals/general_modals/gen.modals.func.php?'+data1;
        var loader = '';

        switch ( process ) {
            case 'view-more-notification':

                // appendNow('notification-container-td',data,'#notification-view-more-loader');  

                loader = 'notification-view-more-loader';
                view_result_id = 'notification-container-td';
                $('#'+loader).css('visibility','visible');

                if (window.XMLHttpRequest)  {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        $("#"+view_result_id).append(xmlhttp.responseText);

                        $('#'+loader).css('visibility','hidden');

                        document.getElementById('fs-general-ajax-response').innerHTML = xmlhttp.responseText;

                    }
                }
                xmlhttp.open('GET',data,true);
                xmlhttp.send();

                break;
            case 'view-notification-load':

                // document.getElementById('notification-container-td').innerHTML = "";
                $( '#notification-container-buble' ).css('display','none');
                view_result_id = 'notification-container-td';
                loader = 'notification-view-init-loader';
                $('#'+loader).css('visibility','visible');
                if (window.XMLHttpRequest)  {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        // $("#"+view_result_id).append(xmlhttp.responseText); 
                        document.getElementById('notification-container-td').innerHTML = xmlhttp.responseText;
                        $('#'+loader).css('visibility','hidden');
                    }
                }
                xmlhttp.open('GET',data,true);
                xmlhttp.send();
                break;
            default:

                // alert( 'this is the default' );

                $('#'+loader).css('visibility','visible');
                if (window.XMLHttpRequest)  {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        $("#"+view_result_id).append(xmlhttp.responseText);
                        $('#'+loader).css('visibility','hidden');
                    }
                }
                xmlhttp.open('GET',data,true);
                xmlhttp.send();
                break;
        }
        // end switch
    } // end if 
}
// END NOTIFICATION 

// NEW FEED
function view_more ( action ) {
    // alert('type = '+action);
    var data = 'action='+action;
    append_home(
        "home_res",
        "fs_folders/modals/general_modals/gen.modals.func.php?"+data,
        "#more_loading img"
    );
}
// END FEED  


// NEW POST ARTICLE 
$(document).ready(function( ) {
    // mouse over to the video for next prev 
    mouseOver_elemShow_mouseOut_elemHide_v1( '#container-vid' , '#container-vid' , '#postarticle-next-prev-video' );
    mouseOver_elemShow_mouseOut_elemHide_v1( '#container-img' , '#container-img' , '#postarticle-next-prev-image' );
    // select image for article
    function readImage1(file) {
        var reader = new FileReader();
        var image  = new Image();
        reader.readAsDataURL(file);
        reader.onload = function(_file) {
            image.src    = _file.target.result;              // url.createObjectURL(file);
            image.onload = function() {
                var w = this.width,
                    h = this.height,
                    t = file.type,                           // ext only: // file.type.split('/')[1],
                    n = file.name,
                    s = ~~(file.size/1024) +'KB';
                // document.getElementById('new-postalook-upload-preview').innerHTML = '<img src="'+ this.src +' " style="width:285px";  > '+w+'x'+h+' '+s+' '+t+' '+n+'<br>';  
                // alert('height '+h+'width '+w);  
                if ( w >= 100 &&  h >= 100) {




                    var imagestyle = get_image_style( h , w , 300 , 250 );
                    // alert( imagestyle );





                    // var imagestyle = get_image_style( h , w , 50 , 50 );  
                    // alert( imagestyle );




                    document.getElementById('content-image').innerHTML = '<center><img src="'+ this.src +' " style="position:relative;cursor:pointer;'+imagestyle+';z-index:120; ";   onclick=\"$(\'#ariticle_image_file\').click( );\" title=\"click to change\" > </center>';
                    $('#new-postalook-file-upload-stat-display').text(n);
                    $('#article-upload-image').val(1);

                    $('#content-nofound-image').css('display','none');
                    article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , 'event' );

                    // $( '#content-image' ).css('height','auto');
                    // article_nex_prev ( type , stat , response , loader , e );







                }
                else{
                    document.getElementById('content-image').innerHTML = '';
                    $('#content-nofound-image').css('display','block');
                    alert('Sorry We accept only size of 100 x 100 and above but you have '+w+' by '+h+' please try another look.' );
                }
            };
            image.onerror= function() {
                alert('Invalid file type: '+ file.type );
            };
        };
    }
    $("#ariticle_image_file").change(function (e) {



        if(this.disabled) return alert('File upload not supported!');
        var F = this.files;


        // alert( F.length ); 


        if ( F.length > 0 ) {
            if(F && F[0]){
                for(var i=0; i<F.length; i++){
                    readImage1( F[i] );
                }
            }
        }
        else{
            document.getElementById('content-image').innerHTML = '';
            $('#content-nofound-image').css('display','block');
            $('#article-upload-image').val(0);
        }
    });
})
function article_nex_prev ( type , stat , response , loader , e , method , table_id ) {

    // alert( ' type = '+type+' stat = '+stat+' response = '+response+' loader = '+loader+' e = '+e+'method = '+method+' table_id = '+table_id );
    // var response = 'content';
    // var response = 'fs-general-ajax-response'; 

    // initialized data 
    var keyboard = '';
    var timer = 0;
    var upload = false;

    // keypress detector

    if (e.keyCode == 13) {

        keyboard = 'enter';
        timer = 0;

    }
    else{

        keyboard = 'enter';
        timer = 2000;
    }

    if ( type == 'image' || type  == 'video' )  {

        var data = 'action=postarticle&process=next-prev&type='+type+'&stat='+stat;
        ajax_send_data(
            response,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            loader,
            'postarticle-next-prev'
        );
    }
    else if ( type == 'submit' )  {


        var category   = $( '#postarticle-change-category' ).val( );
        var topic      = $( '#postarticle-topic').val( );
        var title      = $( '#article-title' ).val( ); //'this is the title'; 
        var desc       = $( '#postarticle-description' ).val( ); //'this is the desc'; 
        var url        = '';
        var keyword    = $( '#postarticle-keyword' ).text( ); //'this is the keyword';   
        var selected   = $('#article-upload-selected').val();
        var image      = $('#content-image img').size( );
        var upload     = false;
        var titlefield = '#article-title';  // article title  
        var titleval = $(titlefield).val(); // get title field value  

        // alert("this is the best");

        // alert ( 'selected'+selected );

        /*
         * get the url link in the field assign to fs_articles.source_url = url
         */
        /*
         url = $('#postarticle-url').val();
         var url = url.replace(":","[-double-dot-]");
         */

        /*
         if the title is empty then it should not redirect or save the video or image it says title required and return false.
         */

        if ( titleval == "" )
        {
            upload = false;
            alert('Title Required');
        }

        if ( method == 'edit') {

            upload  = true;
            keyword = $( '#postarticle-keyword' ).val( );
        }

        else if ( category == 'Select' ) {

            alert( ' please select category and topic ' ) ;
            upload = false;
        }
        else if ( image == 1 && selected == 'image' ) {

            // alert( ' successfully uploaded image article  ' ); 
            upload = true;
        }
        else{

            var video    = $( '#content-video iframe' ).attr('src');
            // alert(video);                 
            var video = video.length;
            // alert(video);    
            if ( video  > 5 && selected == 'video' ){
                // alert( ' usccessfully uploaded video ');
                upload = true;
            }
            else{
                alert( ' please uploaded image or video article  ' );
            }
        }



        // alert(upload);

        if ( upload == true ) {

            // alert( 'uplaoding the info now ! ' );

             var data = 'action=postarticle&process=insert&category='+category+'&topic='+topic+'&title='+title+'&desc='+desc+'&keyword='+keyword+'&type='+selected+'&method='+method+'&table_id='+table_id+'&url='+url;       
             ajax_send_data( 
                 'fs-general-ajax-response',  
                 'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
                 loader, 
                 'postarticle-insert',
                 selected,
                 method
             );


            var type = {};
            type['selected'] = selected;
            type['method'] = method;

            save_post_data(type);




        }
        else
        {
            alert("no allowed to upload");
        } 
    }
    else if ( type == 'select-article-modal' ) {
        // alert( ' article selected stat = '+stat );  
        // $('#article-upload-selected').val(stat); 
        if ( stat == 'image' ) { 
            // $('#content-image').css('border','2px solid rgb(33, 90, 157)');
            // $('#content-video').css('border','2px solid rgb(217, 218, 219)');
            $("#postarticle-image-select").prop("checked", true);
        }else if ( stat == 'video' ) { 
            // $('#content-video').css('border','2px solid rgb(33, 90, 157)'); 
              // $('#content-image').css('border','2px solid rgb(217, 218, 219)'); 
            $("#postarticle-video-select").prop("checked", true);
        }
        $('#article-upload-selected').val(stat);
    }
    else if ( type == 'video-mouseover' ) {
        // alert( 'mouse over ' ); 
        $( '.mouserover-video-play'+stat).css('background-color','rgba(000,0,0,0.7)');
        $( '.video-play'+stat ).css('display','block');

        // $('.mouserover-video-play'+stat).css('display','block');
    }
    else if ( type == 'video-mouseout' ) {

        $('.mouserover-video-play'+stat).css('background-color','rgba(0,0,0,0.0) ');
        $( '.video-play'+stat ).css('display','none');
    }
    else if ( type == 'url-field-clicked' ){

        // sessionStorage.article_url = $('#article_url_field').val( );  
    }
    else if ( type == 'update-keyword' ) {

        var keyword = $("#"+stat).text();

        if (e.keyCode == 188) {  // comma

            $('#postarticle-keyword-dropdown').css({'display':'none'});

            var keywords = keyword.split(",");

            document.getElementById(stat).innerHTML = '';

            for (var i = 0; i < keywords.length-1; i++) {

                document.getElementById(stat).innerHTML += "<span id='keyword-tag'>"+keywords[i]+"</span>,";

            };

            $("#"+stat).focus();

        } else {

            var keywords = keyword.split(",");

            var tlen = keywords.length-1;

            var lastkeyword = keywords[tlen];

            document.getElementById('fs-general-ajax-response').innerHTML = lastkeyword+' len = '+keywords.length;

            if ( !isBlank(lastkeyword) ) {

                $('#postarticle-keyword-dropdown').css('display','block');

                var data = 'action=postarticle&process=suggested-keyword&keySearch='+lastkeyword;

                ajax_send_data(
                    'postarticle-keyword-dropdown',
                    'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                    'postarticle-suggested-keyword-loader',
                    'postarticle-suggested-keyword'
                );

            }
            else{
                $('#postarticle-keyword-dropdown').css('display','none');
            }
        }
    }
    else if ( type == 'select-keyword-dropdown' ) {

        // get current tags selected and put again 

        var keyword = $("#"+stat).text();
        var keywords = keyword.split(",");
        document.getElementById(stat).innerHTML = '';
        for (var i = 0; i < keywords.length-1; i++) {
            document.getElementById(stat).innerHTML += "<span id='keyword-tag'>"+keywords[i]+"</span>,";
        };


        // add the dropdown keyword
        document.getElementById(stat).innerHTML += "<span id='keyword-tag'>"+response+"</span>,";
        $("#"+stat).focus();

        // hide dropdown 
        $( '#postarticle-keyword-dropdown').css('display','none');
    }
    else{
        if ( keyboard == 'enter' ) {
            setTimeout(function(){
                // var url = 'google.com';  
                var url =  $('#article_url_field').val( );
                // alert( url ); 
                url = url.replace(':','punctuation');
                var data = 'action=postarticle&process=retrieved-data&url='+url;
                ajax_send_data(
                    response,
                    'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                    loader,
                    'postarticle-retrieved-data'
                );
                // ajax_send_data( 
                //  'fs-general-ajax-response',  
                //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
                //  loader  
                // );      
                // auto select video and set value as video 
                stat = 'video';
                if ( stat == 'image' ) {
                    $('#content-video').css('border','none');
                    $('#content-image').css('border','2px solid rgb(33, 90, 157)');
                }else if ( stat == 'video' ) {
                    $('#content-video').css('border','2px solid rgb(33, 90, 157)');
                    $('#content-image').css('border','none');
                }
                $('#article-upload-selected').val(stat);
                // set radio button 
                $("#postarticle-video-select").prop("checked", true);
                // ajax_send_data( 
                //  'fs-general-ajax-response',  
                //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
                //  loader 
                // );     
            }, timer );
        }
    }
    // ajax_send_data( view_result_id , data , loader , page , id )  
}






function postarticle_select_category(   ) {
    var category = $('#postarticle-change-category').val( );
    switch( category ) {
        case 'Beauty':
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('Celebs & Influencers','Celebs & Influencers');
            option_str.selectedIndex = 0;
            var country_arr = new Array( "Fragrance" , "Fragrance" , "Nails" , "Nails" , "Skin Care" );
            for (var i=0;  i < country_arr.length; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        case 'Entertainment':
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('Art & Books','Art & Books');
            option_str.selectedIndex = 0;
            var country_arr = new Array( "Concerts & Festivals" , "Movies & TV" , "Music" );
            for (var i=0;  i < country_arr.length; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        case 'Fashion':
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('Celebs & Influencers','Celebs & Influencers');
            option_str.selectedIndex = 0;
            var country_arr = new Array( "Designer" , "Event" , "News" , "Photography" , "Mens Fashion" , "Mens Fashion" , "OOTD / Street Style" , "Shopping" , "Styling Tip" , "Trends" );
            for (var i=0;  i < country_arr.length; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        case 'Lifestyle':
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('Autos','Autos');
            option_str.selectedIndex = 0;
            var country_arr = new Array( "Blogging" , "Business" , "DIY & Crafts" , "Entertaining" , "Family & Friends" , "Food & Drinks" , "Health" , "Home" , "Money" , "Travel" , "Work" );
            for (var i=0;  i < country_arr.length; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        case 'Technology':
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('Audio','Audio');
            option_str.selectedIndex = 0;
            var country_arr = new Array( "Car Tech", "Laptops", "Mobile Phone", "Nintendo", "Playstation", "Tablets", "TV", "Xbox" );
            for (var i=0;  i < country_arr.length; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        case 'Other':
            alert( ' other ' );
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('None');
            option_str.selectedIndex = 0;
            for (var i=0;  i < 1; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
        default:
            var option_str = document.getElementById('postarticle-topic');
            option_str.length=0;
            option_str.options[0] = new Option('None');
            option_str.selectedIndex = 0;
            for (var i=0;  i < 1; i++) {
                option_str.options[option_str.length] = new Option(country_arr[i],country_arr[i]);
            }
            break;
    }

















}
function get_image_style( imgh , imgw , cw , ch ) {


    //imgh = image heigh
    //imgw = image width
    //cw   = container width
    //ch   = container height


    var imagestyle = '';
    var h1 = cw;  // height of the look container
    var w1 = cw;  // width of the look container
    var h2 = imgh //$ri->getHeight(); # height of the look 
    var w2 = imgw //$ri->getWidth(); # width of the look 
    var hf = '';  // final height of the look.
    var wf = '';  // final width of the look. 
    // echo " height = $h2 and  width = $w2 <br> ";

    if ( w2 > h2  ) {
        // echo " image width greater than height <br> ";
        //do w2 
        if ( w2 > w1 ) {
            wf = w1+"px";
            hf = 'auto';
        }else{
            wf = 'auto';
            hf = 'auto';
        }
    }else{
        //do h2 
        // echo " image width less than height <br> ";
        if ( h2 > h1 ) {
            hf = h1+"px";
            wf = "auto";
        }else{
            hf = 'auto';
            wf = "auto";
        }
    }





    // allow this code when the container is not auto height
    if ( imgh > ch ) {
        hf = ch+"px";
        // alert( imgh+'img heig > ch ' +ch); 
    }
    else{
        // alert( imgh+ 'img heig < ch '  +ch); 
    }
    // echo " height = $h2 and  width = $w2 <br> " ;
    imagestyle = "height:"+hf+";width:"+wf;
    return imagestyle;
}
// END POST ARTICLE

// NEW THUMBNAIL  
function modal_thumbnail ( table_name , table_id , size , loader , process , action ) {
    /*
     * table_name = fs table 
     * size       = size of the image show
     */


    // alert(table_name+size+loader);  
    // alert( ' loaded works ' ); 
    // var loader   = 'modal-thumbnail-loader'; 

    // alert( table_name + table_id + size + loader + process + action ); 
    look_show_hide_tags( );
    var response  = 'fs-general-ajax-response';
    var data      = 'action='+action+'&process='+process+'&table_name='+table_name+'&table_id='+table_id+'&size='+size;

    if ( process == 'load-thumbnail' ) {
        lookdetails_thumbnail(
            "lookdetails_thumbnail" ,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            loader
        );
    }
    else if ( process == 'generate-specific-modal-detail' ) {
        // ajax_send_data( 
        //  response,  
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
        //  loader 
        // );    

        print_new_look(
            'banner_view_and_look_view' ,
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            loader,
            table_id,
            'detail',
            table_name,
            table_id
        );
    }
}
// END THUMNAIL  

// NEW DETAIL

function modal_detail( table_name , table_id , pagenum , action , process , orderby )  {
    // alert ( table_name+table_id+pagenum+action+process );    
    if ( process == 'load-next-comment-page' ) {
        //  alert( ' processing the page comment ' ); 
        //  ajax_send_data( 
        //  response,  
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
        //  loader 
        // );       
    }
    else if ( process == 'load-comment-change-page-modal' ) {
        var orderby = $('#sortcomment').val( );
        var data = 'action='+action+'&process='+process+'&table_name='+table_name+'&table_id='+table_id+'&orderby='+orderby;
        ajax_send_data(
            'lbc_comments',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            'modal-comment-loader-test1 , modal-comment-loader-test2'
        );
    }
    else if ( process == 'load-comment-sorting-page-modal' ) {
        var orderby = $('#sortcomment').val( );
        var data = 'action='+action+'&process='+process+'&table_name='+table_name+'&table_id='+table_id+'&orderby='+orderby;
        ajax_send_data(
            'comment_content',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            'modal-comment-loader-test1 , modal-comment-loader-test2'
        );
    }

}
// END DETAIL 



// NEW FLAG
function flag ( action , table_name , table_id , imgid , imgsrc , type ) {

    // detect if login or logout redirect 

    logout_interaction_response (  sessionStorage.mno );

    // alert the inputs 

    // alert(  "action = "+action+"   table_name = "+table_name+"  table_id = "+table_id+"   imgid = "+imgid+"  , imgsrc = "+imgsrc+" type = "+type    ); 


    var door = '';


    if ( type == 'modal-flag-dropdown' ) {

        door = $('#flag-dropdown-container'+table_id).attr('name');

        if ( door == 'close') {

            // open the dropdown 
            $('#flag-dropdown-container'+table_id).attr('name','open');
            $('#flag-dropdown-container'+table_id).slideDown('fast');

        }
        else{

            $('#flag-dropdown-container'+table_id).attr('name','close');
            $('#flag-dropdown-container'+table_id).slideUp('fast');
            // close the dropdown 

        }
    } else {

        // ask question if continue or not 

        if ( confirm( 'are you sure to flag this modal ? ' ) ) {
            $( imgid ).attr('src', imgsrc );
            var comment = '';
            var data = 'action='+action+'&table_name='+table_name+'&table_id='+table_id+'&comment='+comment;
            ajax_send_data(
                'fs-general-ajax-response',
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data
            );
        }
    }





}
// END FLAG




var mno1 = 0;

// chat  

function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}
function isEmpty(str) {
    return (!str || 0 === str.length);
}
function chat ( action , type , mno1 , profilepic , method , e , name ) {
    // alert( profilepic ); 

    if ( type == 'insert-message' ) {

        if (e.keyCode == 13 || method == 'send' ) {
            var message = $('#chat-box-message').val();     // get value textarea 
            if ( !isBlank(message) ) {
                $('#chat-box-message').val('');   // clean textarea 
                $("#chat-message-container").animate({ scrollTop: $('#chat-message-container')[0].scrollHeight}, 1000);
                $("#chat-message-container").append("  <table border='0' cellpadding='5' cellspacing='0' id='chat-message-table' >  <tr>  <td id='chat-profilepic' >  <img src='"+profilepic+"' style='width:37px; height:35px;'   />  </td>  <td>  <div id='chat-message'  > <b>"+name+" : </b> "+message+"     <div id='chat-date' >  new  </div>   </td> </table>   ");
                var data = 'action='+action+'&type='+type+'&message='+message+'&mno1='+mno1;
                ajax_send_data(
                    'fs-general-ajax-response',
                    'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                    'insert-new-chat-message'
                );
                start_live ( 'message-chat-box' );
            }
            else{
                $('#chat-box-message').val('');    // clean textarea 
            }
        }
        else{
            /*
             var data = 'action='+action+'&type=message-typing'+'&mno1='+mno1;  
             ajax_send_data( 
             'fs-general-ajax-response',  
             'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
             'print-new-chat-message'
             );         
             */

        }
    }
    else if ( type == 'view-messages-load' ) {

        // hide notification bubble
        $(name).css('display','none');
        // empty the result messages 
        // document.getElementById('messaging-container-td').innerHTML = "";
        // initlaized data 
        var data = 'action='+action+'&type='+type;
        // search and ajax append of what ever is the result for the messages 

        // appendNow('messaging-container-td','fs_folders/modals/general_modals/gen.modals.func.php?'+data,'#messaging-view-init-loader');    

        ajax_send_data(
            'messaging-container-td',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            'messaging-view-init-loader',
            'view-messages-load'
        );
    }
    else if ( type == 'check-and-print-new-message' ) {




        // action = 'messaging';    
        // $("#chat-message-container").animate({ scrollTop: $('#chat-message-container')[0].scrollHeight}, 1000);  


        // mno is initialized when the chat page loaded

        sessionStorage.mno1 = mno1;

        // alert ( 'checing. . . '+sessionStorage.mno1 )

        // alert( 'new message found ' );  

        var data = 'action='+action+'&type='+type+'&mno1='+mno1;

        ajax_send_data(
            'fs-general-ajax-response',
            'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
            '',
            'print-new-chat-message'
        );
    }
    else if ( type == 'open-new-chat' ) {
        // alert( 'chat oppend' );
        var strWindowFeatures = 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=450,height=350' ;
        var URL = action;
        var win = window.open(URL, "mywindow", strWindowFeatures);
    }
    else if ( type == 'view-more-message' ) {
        var data = 'action='+action+'&type='+type;

        //  ajax_send_data( 
        //  'fs-general-ajax-response',  
        //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
        //  'messaging-view-more-loader'  
        // );     

        appendNow('messaging-container-td','fs_folders/modals/general_modals/gen.modals.func.php?'+data,'#messaging-view-more-loader');
    }
    else {
        // typing 
        // update sensor 

        // alert( 'typing' );
    }
}
// chat 

// live code refresh
function start_live ( page ) {

    // messaging   


    switch ( page ) {
        case 'message-chat-box' :
            setTimeout(function() {
                chat ( 'messaging' , 'check-and-print-new-message' , sessionStorage.mno1 );
            } , 100 );
            break;
        case 'home-feed':

            break;
        case 'member-feed':
            break;
        case 'lookdetails':
            break;
        case 'details':
            break;
        case 'profile':
            break;
        default:
            break;
    }


    // notifcation   

    // userinfo ranking 

    // feed 

    // memberfeed 

    // activity wall 

    // message notification  
}
// live code refresh
//  new fs
function fs( type ) {

    switch( type ){
        case 'arrow-up':
            // alert( 'arrow up clicked' );
            // jQuery(document).ready(function($) {
            // alert( 'document is ready' );
            // $('a[href=#topbar]').click(function(){
            $('html, body').animate({scrollTop:0}, 1000 );
            // return false;
            // });
            // });
            break;
        default:
            break;
    }

}

// end fs
// new admin 
function admin( type ) {
    switch ( type ) {
        case 'admin-modal':
            // alert( 'modal loaded' ); 
            var data = 'action=admin-modal&pagenum=1&modal_total_show=24';


            // ajax_send_data( 
            //  'fs-general-ajax-response' , 
            //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data 
            // );   



            append_home(
                'popup-response',
                'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
                '#more_loading img'
            );
            // append_home('home_res','fs_folders/modals/index_modals/latest_modals.php?tres='+counter,more_loader); 



            break;
        default:

            break;
    }

}
// end admin 

// new modal
function fs_modal_popup( action , process , type , table_name , table_id , title , page , loader , category ) {

    // main init 

    var status = true;


    // disable icon and text to be vieable 

    if ( type == 'views') {
        status = false;
    }


    // condition to do the action or not based on the status 

    if ( status == true ) {

        // warnign 

        // alert( ' action = '+action +' process = '+process +' table_name = '+table_name +' table_id = '+table_id +' title = '+title +' page = '+page ); 

        // init 


        var response = 'fs-general-ajax-response', data = '' , data1 = '';

        if ( process == 'view-more' ) {

            // alert('view more')

            // set response container 

            response = 'fs-modal-popup-content';

        }
        else{

            // show popup 

            gen_popup( 'show' );

            // set center 

            set_center( '#popUp-background-container' , 'restore-position' );

            // backward up 

            $('#popup-response').css('margin-top','-10px');

            // set response 

            response = 'popup-response';

            // set position from top 

            set_center(  '#popUp-background-container' , 'gen_popup' , 0 );

        }

        // set data 

        data = 'action='+action+'&process='+process+'&type='+type+'&table_name='+table_name+'&table_id='+table_id+'&title='+title+'&page='+page+'&category='+category;
        data1 = 'fs_folders/modals/general_modals/gen.modals.func.php?'+data;

        // send ajax replace 

        /* 
         ajax_send_data(
         response, 
         data1,
         loader
         );        
         */

        // send ajax append 

        appendNow(
            response,
            data1,
            loader
        );

    }

}
function modal ( action , process , type , loader , response , textfieldid , value , multivalue , method , table_id , table_name, agreementId)
{

    // alert('this is a test');

    // action       => action of the function used for case code of the gen.func
    // process      => after action its process what process to do in gen.func
    // type         => type of dropdown ex: garment , towel to identify the query table
    // loader       => loader image in
    // response     => where the result append
    // textfieldid  => text field who will accept the data when its been selected
    // value        => value of the data
    // multivalue   => this variable is to know if the field needs multi select values boolean  
    // alert ( "modal ( action = "+action+" , process = "+process+" , type = "+type+" , loader = "+loader+" , response = "+response+" , textfieldid = "+textfieldid+" , value = "+value+" , multivalue = "+multivalue+" , method = "+method+" , table_id = "+table_id+" , table_name = "+table_name+" ) ");



    // initialized data 

    var cval       = '';   // string 
    var cval1      = '';   // sub sting 
    var len        = 0 ;   // accept the total lenght 
    var keySearch1 = '';   // sub keysearch variable  
    var data       = '';   // main data storage
    var data1      = '';   // sub main data storage
    var test_c     = 'fs-general-ajax-response';   // test container 
    var title      = '', desc = '' , article = '' , color = '' ,  brand = '' ,  garment = '' , material = '' ,  pattern = '' ,  pos_x_y = '' , style = '' , occasion = '' , season = '' , keyword = '' ; // initialize look varialble attribute 
    var title_id   = '.look_name'  , desc_id = '.textarea' , article_id = '.look-article-field' , brand_id = '#brand' , garment_id = '#garment' , material_id='#material' , pattern_id = '#pattern', pos_x_y_id = '#pos_x_y', style_id = '#style' ,  occasion_id = '#occasion', season_id = '#season', keyword_id = '#keyword';  // initialize look attribute id
    var lookname   = ''; // look title 
    var bool       = true; // boolean true or false condition 
    var comment    = ''; // comment variable initialized 
    var isAgreed   = $(agreementId).is(':checked');
    // var response   = 'fs-general-ajax-response'; 


    // alert for all the data type comming in 

    // alert(' action = '+action+' process = '+process+' type = '+type+' loader = '+loader+' response = '+response+' textfieldid = '+textfieldid+' value = '+value+' multivalue = '+multivalue+' method = '+method+' table_id = '+table_id );

    if ( type == 'post-modal' )
    {
        // alert(isAgreed); 

        /**
         * validate if the agreenebt is being read.
         */

        if(isAgreed == true)
        {
            // this is set by the onclick function in the postmodal buttton 

            var titlefield = loader;  // this is the field id of the title field
            var message    = response; // this is the response message when the title is empty

            // ge the value of the title field 

            lookname = $(titlefield).val();

            // if the title is empty set the bool as false so that the data will send the http for the submit 

            if ( lookname == "" )
            {
                bool = false;
            }

            // sending data to ajax php to submit the info 

            if ( bool == true )
            {

                // get total tags 

                len  = $('.block_circle_tag').length;

                // initialize for look label data 

                for (var i = 1; i <= len; i++) {
                    // pass the values 
                    color     = color+$("#hashtag_"+i+"_0").text().replace('#','')+',';
                    brand     = brand+$(brand_id+i).val().replace('#','')+',';
                    garment   = garment+$(garment_id+i).val()+',';
                    material  = material+$(material_id+i).val()+',';
                    pattern   = pattern+$(pattern_id+i).val()+',';
                    pos_x_y   = pos_x_y+$(pos_x_y_id+i).val()+',';

                };
                style             = $(style_id).val();
                occasion          = $(occasion_id).val();
                season            = $(season_id).val();
                keyword           = $(keyword_id).val();
                title             = $(title_id).val();
                desc              = $(desc_id).val();
                article           = $(article_id).val();

                // replace article url dot with space to allow online to pass the ajax request

                article = replace_all ( article , '.' , ' ' );

                // alert test 

                // alert( 'title = '+title+' desc = '+ desc+' article = '+article+' color = '+color+' brand = '+brand+' garment = '+garment+' material = '+material+' pattern = '+pattern+' pos_x_y = '+pos_x_y+' style = '+style+' occasion = '+occasion+' season = '+season+' keyword = '+keyword );

                // initialize data

                data = 'action='+action+'&process='+process+'&type='+type+'&color='+color+'&brand='+brand+'&garment='+garment+'&material='+material+'&pattern='+pattern+'&pos_x_y='+pos_x_y+'&style='+style+'&occasion='+occasion+'&season='+season+'&keyword='+keyword+'&title='+title+'&desc='+desc+'&article='+article+'&method='+method+'&table_id='+table_id+'&isAgreed='+isAgreed;
                data1 = 'fs_folders/modals/general_modals/gen.modals.func.php?'+data;

                // send data 

                ajax_send_data(
                    test_c,         // response container 
                    data1,          // value
                    'post-modal',   // loader
                    'modal-insert',  // page 
                    method
                );

            }
            else
            {
                alert('Title Required');
            }
        }
        else
        {
            alert('Please read the agreement.');
        }
    }
    else{
        // alert('message = ' + message);
    }
    if ( action == 'modal-attribute' ) {

        // close all dropdown show  

        // result container show when starts to type

        $('#'+response).css('display','block');

        // remove space if first character found for multi select  

        if ( multivalue == true ) {

            // get the value typed for multi select 

            var keySearch = $('#'+textfieldid).val().split(',') // split string to array via comma
            len = keySearch.length;                             // get total len through comman array 
            keySearch = keySearch[len-1];                       // get last value typed in the field

            // get the lenght of the keysearched and typed

            len = keySearch.length;

            // if first character is space then remove 

            if ( keySearch[0] == ' ' ) {
                keySearch = keySearch.substring( 1 , len);
            }
        }
        else{

            // get the value typed for single select 

            var keySearch = $('#'+textfieldid).val()
        }

        // alert( 'key search = '+keySearch );  

        // initialize data

        data = 'action='+action+'&process='+process+'&type='+type+'&textfieldid='+textfieldid+'&response='+response+'&loader='+loader+'&keySearch='+keySearch+'&limit_start=0&limit_end=10';
        data1 = 'fs_folders/modals/general_modals/gen.modals.func.php?'+data;

        // send to data to gen.func file and this is to be updated to ajax because it response delay 



        // jquery 

        $( '#'+response+' table '  ).text('');            // clean the result to empty so that only the loader will show in everykeyup
        $( '.'+loader  ).css({'display':'block'});    // display loader 
        $( '#'+response ).load( data1 , function() {      // send data 
            $( '.'+loader  ).css({'display':'none'}); // hide loader after the process happend
        });

        // ajax 

        // if (window.XMLHttpRequest)  {
        // xmlhttp = new XMLHttpRequest();
        // } else {
        //  xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        // }
        // xmlhttp.onreadystatechange = function() {
        //  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
        //      document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;  
        //  }
        // }
        // xmlhttp.open('GET','fs_folders/ajaxquery/label/label_brand.php?bkeyword='+tibrand,true);
        // xmlhttp.send();    
    }
    else if ( action == 'get-value-selected' ) {

        if ( multivalue == true ) {

            // get current value field 

            cval = $(textfieldid).val();

            // remove last word in the field 

            var cval1 = cval.split(', ')   // split string to array via comma
            len = cval1.length;           // get total len through comman array  
            cval1[len-1] = '';            // clean the last value in the string 
            cval = cval1.join(', ');;      // used join to back to string type 

            // concat current val and new val 

            var cval = cval.replace( value , '' );

            // remove the current value of the new value selected is already existed or selected

            value = cval+value;

            // add value to the specific field 

            $(textfieldid).val(value);

            // back the focus to the field

            $(textfieldid).focus();

            // hide container the shows the entire dropdown

            $('#'+response).css('display','none');


        }
        else{

            // add value to the specific field 

            $(textfieldid).val(value);

            // hide container the shows the entire dropdown

            $('#'+response).css('display','none');

        }
    }
    else if ( action == 'modal-comment-edit' ) {



        // alert(  'edit comment ' )

        // set response container for comment auto replace after updated 

        response = 'comment_span_'+table_id;

        // get value of the edit     

        comment = $(textfieldid).val();

        // get value of the new comment updated    

        // alert ( 'comment = '+comment+' response '+response ); 

        // update the comment dynamically in the design 

        document.getElementById(response).innerHTML = comment;

        // initialized 

        data = 'action='+action+'&process='+process+'&table_id='+table_id+'&table_name='+table_name+'&comment='+comment;
        data1 = 'fs_folders/modals/general_modals/gen.modals.func.php?'+data;

        ajax_send_data(
            response,               // response container 
            data1,                  // value
            'post-modal',           // loader
            'modal-comment-edit'   // page  
        );

        // close popup  

        fs_popup('close');
    }
    else if ( action == 'mouse-enter-to-comment' ) {

        //alert( 'enter comment' ); 
        $(process).css('display','block');
    }
    else if ( action == 'mouse-out-to-comment' ) {

        $(process).css('display','none');
        //alert( 'out comment' );   

    }
    else{
        // close when there is no found for searching

        $('#'+response).css('display','none');
    }
}
// end modal  
// new url
function text_trim( text ) {

    // trim url as acceptable all the ajax in the site 

    text = text.replace(':','[-double-dot-]');

    // trim appenr sand 

    text = text.replace("&", "[ampersand]");

    // return text  

    return text;
}
// new dialog
function dialog ( action , id_present , id_next ) {



    switch ( action ) {

        case 'popover':
            $(id_present).fadeOut('fast');
            $(id_next).fadeIn('fast');
            break;
        default:
            break;
    }
}
function show_content( )
{
    alert ( $('#content').val() )  ;
    var c = $('#content').val();
    ajax_send_data('restest','fs_folders/modals/test/test.php?content='+c,'');
}
function scrape (page_start,page_end) {
    var  data = 'fs_folders/modals/general_modals/gen.modals.func.php?action=scrape&page_start='+page_start+'&page_end='+page_end
    if (window.XMLHttpRequest)  {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open('GET',data,true);
    xmlhttp.send();
}

/**
 * this is to make the container of the popup centered
 * #divContainer
 * @param divContainer
 */

function center_popup(divContainer)
{
    //alert('center the popup');
    var top = ($(window).height() - $(divContainer).outerHeight()) / 2;
    var left = ($(window).width() - $(divContainer).outerWidth()) / 2;
    //alert(top);
    $(divContainer).css({position:'absolute', margin:0, top: (top > 0 ? top : 0)+'px', left: (left > 0 ? left : 0)+'px'});
}

/**
 * ARTICLE SEO
 *
 */

function article_seo(type)
{

    // initialized  
    

    /**
     * perma link id
     */

    var perma_link = $("#perma-link");

    /**
     * perma link view seo id
     */

    var perma_link_view = $("#perma-link-view");

    /**
     * ratings message
     */

    var ratings = new Object();

    /**
     * initialized the max of every rating
     */

    ratings.normal = 300;
    ratings.ok = 750;
    ratings.good = 1500;

    /**
     * when no max character is reach then extebtion shoud be added
     */

    var extention_txt = '';

    /**
     * minimum value
     */

    var val_min = type.min;

    // alert(val_min);

    /**
     * max value
     */

    var val_max = type.max;

    /**
     * get typed field current id
     */

    var id      = $('#'+type.id);

    /**
     * get current value of the field typing.
     */

    var idc     = $('#'+type.id).val();// id.val();  

    /**
     * get total lenght of the value
     */

    var tlenght = $('#'+type.id).val().length;

    /**
     * get id of the seo preview
     */

    var idsv     = $('#'+type.id+'-view');

    /**
     * get seo preview content
     */

    var idc_seo = $('#'+type.id+'-view').text();

    /**
     * get counter id container
     */

    var counter = $('#'+type.id+'-counter counter');

    /**
     * get ratings id container
     */

    var rating = $('#'+type.id+'-counter rating');

    /**
     * validate total length
     */
 
    var d =  val_max - tlenght;


    /**
     * update counter
     */

    if(type.id == 'postarticle-description')
    {
        counter.text(tlenght);
    }
    else
    {
        counter.text(d);
    }

    /**
     * when typing the article title then the text will auto add to the title seo url and textfiel url
     */

    if(type.id == 'article-title')
    {

        perma_link_view.text(replace_all_space_with(idc, '-'));
        perma_link.val(replace_all_space_with(idc, '-'));
    }

    /**
     * if the total typed is exceed with the max then it should be
     */

    if(d < 0)
    {

        /**
         * url link convert ti dash when space
         *
         */

        if(type.id == 'perma-link')
        {
            // replace space in the field with dash 
            id.val(replace_all_space_with(idc, '-'));
            // replace the seo preview with dash
            idc_seo =  replace_all_space_with(idc_seo, '-');
        }
        // change counter color from green to red
        counter.css('color','red');
        // remove previouse ... and add new ... 
        idsv.text(idc_seo.replace("...", "") + '...');
    }
    else
    {
        /**
         * url link convert ti dash when space
         *
         */
        if(type.id == 'perma-link')
        {
            // replace the seo preview with dash
            idc =  replace_all_space_with(idc, '-');
            // replace space in the field with dash 
            id.val(idc);
        }
        //update counter color to green 
        counter.css('color','green');
        idsv.text(idc);
    }

    /**
     * updated rating
     *
     */

    if (type.id == "article-title" || type.id == "meta-description")
    {
        if(tlenght > val_max)
        {
            ratings.msg = "/ Too loong..";
            ratings.style = "color:red";
        }
        else
        {
            ratings.msg = "";
            ratings.style = "color:green";
        }
    }
    else if(type.id == "postarticle-description")
    {

        if(tlenght < ratings.normal)
        {
            ratings.msg = "Normal";
            ratings.style = "color:black";
        }
        else if(tlenght < ratings.ok)
        {
            ratings.msg = "Ok";
            ratings.style = "color:green";
        }
        else if(tlenght < ratings.good)
        {
            ratings.msg = "Good";
            ratings.style = "color:blue";
        }
        else
        {
            ratings.msg = "Great";
            ratings.style = "color:red";
        }
    }
    else
    {
        ratings.msg = "";
        ratings.style = "color:green";
    }

    rating.html("<b style='"+ratings.style+"'> "+ratings.msg+" </b>");

    /**
     * detect seo keyword and heighlight
     */

    detect_seo_exist_heighlight(type);
  
    /**
    * update data for the search term 
    */

    update_search_term(type); 
}


/**
* update search term when description is writing
*/


function update_search_term(type)
{   
    /**
     * get id search term total found
     */
 
    var found = $('#'+type.id+'-search-term found');

    var rating = $('#'+type.id+'-search-term rating');
 
    /**
    * title
    */

    var t  = $("#article-title");
 
    /**
     * description
     */

    var d  = $("#postarticle-description"); 

   /**
    * Search term 
    * when the description is typing
    */  

    var d_val = d.val().toLowerCase();  
    var t_val = t.val().toLowerCase();    
    var title_array = {};
    var title =  t_val;
    var sum = 0; 
    var total = 0; 
    var keyword = "";   

    /** calculate the total found  */
 
    text = string_remove_char_by_array_multiple(title, 'data the this of my in is are what where who why was were they there');   
    sum = string_count_total_word_accurance(d_val, text);  
    found.text(sum); 
    
    /** print the ratings */

    if(sum >= 12)
    {
         rating.html("<b style='color:green'>Great</b>"); 
    }
    else if(sum >= 6)
    {
        rating.html("<b style='color:blue'>Good</b>"); 
    }
    else
    {
        rating.html("<b style='color:red'>Not Good</b>"); 
    } 
} 

/**
 * heighlight the text and detect seo keyword existence
 */

function detect_seo_exist_heighlight(type)
{

    // seo_heighlight();

    // get the input id

    var keyword_id       = $("#postarticle-keyword");
    var article_title    = $("#article-title");
    var perma_link       = $("#perma-link");
    var meta_description = $("#meta-description");
    var image_title      = $("#image-title");
    var postarticle_desc = $("#postarticle-description");

    // get keyword id status

    var permalink_status  = $("#permalink-status status");
    var content_status    = $("#content-status status");
    var meta_desc_status  = $("#meta-desc-status status");
    var image_file_status = $("#image-file-status status");


    // get keyword id question mark

    var permalink_img  = $("#permalink-status img");
    var content_img    = $("#content-status img");
    var meta_desc_img  = $("#meta-desc-status img");
    var image_file_img = $("#image-file-status img");

    // replace comma from the keyword

    var keyword_val = keyword_id.text().replace(",","").toLowerCase();



    if (keyword_val != "")
    {
        // get index of the keyword from the field

        var permalink_status_exist  = replace_all(perma_link.val().toLowerCase(), "-", " ").indexOf(keyword_val);
        var content_status_exist    = postarticle_desc.val().toLowerCase().indexOf(keyword_val);
        var meta_desc_status_exist  = meta_description.val().toLowerCase().indexOf(keyword_val);
        var image_file_status_exist = image_title.val().toLowerCase().indexOf(keyword_val);


        // perma link check keyword seo

        if(permalink_status_exist >= 0)
        {
            permalink_img.attr("title","keyword '" + keyword_val + "'  found in Perma Link");
            permalink_status.text("Yes").css("color","green");
        }
        else
        {
            permalink_img.attr("title","keyword '" + keyword_val + "'  not found in Perma Link");
            permalink_status.text("No").css("color","red");
        }

        //content check keyword seo

        if(content_status_exist >= 0)
        {
            content_img.attr("title","keyword '" + keyword_val + "'  found in Content");
            content_status.text("Yes").css("color","green");
        }
        else
        {
            content_img.attr("title","keyword '" + keyword_val + "'  not found in Content");
            content_status.text("No").css("color","red");
        }

        //meta description checker 
        // alert(meta_desc_status_exist); 

        if(meta_desc_status_exist >= 0)
        {
            meta_desc_img.attr("title","keyword '" + keyword_val + "'  found in Meta Description");
            meta_desc_status.text("Yes").css("color","green");
        }
        else
        {
            meta_desc_img.attr("title","keyword '" + keyword_val + "'  not found in Meta Description");
            meta_desc_status.text("No").css("color","red");
        }

        //image file status check content keyword

        if(image_file_status_exist >= 0)
        {
            image_file_img.attr("title","keyword '" + keyword_val + "'  found in Image Title");
            image_file_status.html("Yes").css("color","green");
        }
        else
        {
            image_file_img.attr("title","keyword '" + keyword_val + "'  not found in Image Title");
            image_file_status.text("No").css("color","red");
        }
        // alert(postarticle_desc.val() + " total " + meta_desc_status_exist); 
    }
    else
    {

    }
}

/*
 * saving the post data 
 */
 
function save_post_data(type)
{

    /**
     * initialize ids
     */

    var t  = $("#article-title");
    var d  = $("#postarticle-description");
    var c  = $("#postarticle-change-category");
    var tp = $("#postarticle-topic");
    var k  = $("#postarticle-keyword");
    var pl = $("#perma-link");
    var md = $("#meta-description");
    var it = $("#image-title");
    var ct = $("#category-table");
    var fn = $("#file-name"); 
    var fu = $("#file-url");  
    var url = "http://localhost/fs/new_fs/alphatest/fs_folders/modals/Server/post.php";
    //var url = "http://fashionsponge.com/fs_folders/modals/Server/post.php";

    /*
     * set up json and get values
     */

    var data                  = {};
    var code                  = {};

    /**
     * image or video attribute
     */ 

    data['title']             = t.val();

    code['title']             = t.val();

    data['description']       = d.val();

    code['description']       = d.val();
  
    data['category']          = c.val();
 
    data['topic']             = tp.val();

    data['keyword']           = k.text(); 

    data['meta_description']  = md.val();

    data['alt']               = it.val();
      
    //data['file_name'] = 'id' + '-' + ct.text() + "-" + k.text().replace(",", "") + "-" + pl.val() + '-' + 'fileSize';

    //data['file_url'] =   replace_all_space_with(pl.val() + '-' + k.text().replace(",", ""), '-'); 
          
    /**
     * the id of the table posted ex: plno, artno , media_id auto generated when user is posting
     */

    data['table_id'] = 2;

    /**
     * the name of the table posted ex: postedlooks, fs_postedarticles  and fs_postedmedia
     * auto generated when user is posting
     */

     data['table_name'] = "fs_postedarticles";

    /**
     * path of the file image or video
     */

     data['file_path'] = "upload";

    /**
     * set this to new or edit
     * new = the data is new and its to be inserted
     * edit = the data is already inserted and the system will just update it
     */

    data['action'] = "new";
 
    //alert(data['file_name']); 
    //alert(data['file_url']);
 
    /**
    * add file name value to form
    */
    
    //$("#file-name").val(data['file_name']);

     
    // alert('file name value ' + $("#file-name").val());

    /**
    * add file url value to form
    */

    //$("#file-url").val(data['file_url']);
  
    /**
    * get slug from form input 
    */

    data['slug'] = pl.val();
 
    /**
    * get file name from form input
    */
    
    data['file_name'] = pl.val();
    
    /*
     * set loader visible
     */

    $("#postarticle-submit-loader").css("visibility","visible");

    /*
     * send json to server, save or update
     */
      
    
    $.post(url, {

            data:JSON.stringify(data)
        }, function(response) {

            alert(response);

            response = JSON.parse(response);

            //alert(response.status);

            //alert(response.message);

            alert("this is the save data");

            if(response.success == true)
            {
                // alert("continue");

                // alert( 'redirecting now image = '+id )
                if ( type.method == 'edit')
                {
                    alert('reload')
                    location.reload();
                }
                else if ( type.selected == 'image' )
                {
                    alert("image article and resize now");

                    // Go( 'photo.resize.php?type=upload-article-and-resize' );
                     $('#upload-article').submit();
                }
                else
                {
                    alert( 'video redirect now' );
                     Go( 'photo.resize.php?type=upload-article-and-resize' );
                } 
            }
            else
            {
                alert("stop");
            }

            /*
             * set loader hidden
             */
        
     
            $("#postarticle-submit-loader").css("visibility","hidden");

        }

       
    )  
}



function show_profile_about() {  
    // alert('This is the test'); 
    $('.profile-timeline-view-popup').css('display', 'block');
    $('.profile-timeline-view').css('display', 'none'); 
}
 
function hide_profile_about() {  
    // alert('This is the test'); 
    $('.profile-timeline-view-popup').css('display', 'none');
    $('.profile-timeline-view').css('display', 'block'); 
}
 

function look_like_click(id) {   
    $('#look-like-'+id).attr('src', 'clicked'); 
} 



function welcome_thumbnail_hover(idName, id) { 
    // console.log(' in ' + idName+id); 
    $(idName+id).fadeIn('fast');
}

function welcome_thumbnail_out(idName, id) { 
    // console.log(' out ' + idName+id );
    $(idName+id).css('display','none');

    for(i = 0; i<100; i++ ) {
        $(idName+i).css('display','none');
    }
}

/**
 * select the welcome boxes such us topic suggested brand
 * @param idName
 * @param id
 * @param new_id
 * @param btn_id
 */
function welcome_thumbnail_select(idName, id, new_id, btn_id) {

    //initialized the values
    var limit = 5;
    var totalSelected = 0;
    var updateTotalClickable = false;


    //check if the limit still not reached
    totalSelected = $('img[id^='+new_id+']').length;



    if('#'+$(idName + id).attr('id') ==  idName+id) {
        // if(totalSelected < limit) {
        console.log('equal');
        //update the id of the button
        $(idName + id).attr('id', new_id+'-'+id);
        console.log(' selected ' + idName + ' total selected = ' + $('img[id^=' + new_id + ']').length);
        // }
    } else {
        $('#'+new_id+'-'+id).attr('id',idName.replace("#","") + id);
        console.log('not equal');
    }

    console.log($(idName + id).attr('id') + ' = ' + idName+id );



    //disabled because its updated
    if(updateTotalClickable == true) {
        //count the button remaining to select
        totalSelected = $('img[id^=' + new_id + ']').length;
        limit = limit - totalSelected;
        $(btn_id).val(limit + " more.. ");

        //change baclground color of the button
        if (limit < 1) {
            $(btn_id).css('background-color', 'red');
        } else {
            $(btn_id).css('background-color', 'rgb(64, 184, 31)');
        }
    }

    //store total clicked in session
    // used to know if the user already clicked even 1 style or topic
    totalSelected = $('img[id^='+new_id+']').length;
    console.log(totalSelected);
    if(idName == '#img-thumbnail-hover-row1-') {
        sessionStorage.setItem('total_selected_style', totalSelected);
        //sessionStorage.getItem('prev_color')
        console.log('row 1 style');
    } else {
        sessionStorage.setItem('total_selected_topic', totalSelected);
        console.log('row 2 topic');
    }


}


function welcome_show_more(resultContainer, type) {
    //alert(type + resultContainer);
    //$(resultContainer).append( 'fs_folders/login/pages/welcome-v2/welcome-sample-category.php' )
    // $(resultContainer).load('fs_folders/login/pages/welcome-v2/welcome-sample-category.php');

     
    $.get( "fs_folders/login/pages/welcome-v2/welcome-sample-category.php", function( data ) {
      // $( ".result" ).html( data );
      //alert( "Load was performed." +data );
      $(resultContainer).append(data);
    }); 
}




function profile_tab_hovered(e, underline) {  

    var id = e.id;
        data.new_color = 'rgb(178, 20, 38)'; 

    var leave_color_text = 'grey';
    var leave_color_underline = 'grey'; 

    // Get the text and underline color when mouse over
    data.leave_color  = 'grey'; //= $('#'+id+' span').css('color'); 
     //= $('#'+underline+' div').css('background-color'); 

    
    // save to session
    sessionStorage.setItem('prev_color', $('#'+id+' span').css('color')); 

    // Change color when mouse over  
    $('#'+id+' span').css({'color':data.new_color}); 
    $('#'+underline+' div').css({'background-color':data.new_color});   
    $('#'+underline+' div').css({'visibility':'visible'});   



}


function profile_tab_out(e, underline) {   

    if (sessionStorage.getItem('prev_color') != 'rgb(178, 20, 38)') {
        var id = e.id;     
         // Change color when mouse over   
        $('#'+id+' span').css({'color':data.leave_color}); 
        $('#'+underline+' div').css({'background-color':data.leave_color});  
        $('#'+underline+' div').css({'visibility':'hidden'});   

        console.log('Change leave color to grey color ' + data.prev_color);

    }  else {
        console.log('No change color when leave color ' + data.prev_color);

    }

}



















/*******************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************** LIBRARY *************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************/

/** 
* return total of the existed found 
*/

function string_exist_count(subject, find) {  return subject.split(find).length -1; }

/**
* replace the found string
*
*/

function string_find_replace_multiple(subject, find, replace)
{ 
   var regex = new RegExp(find, 'g'); 
   var text1 = subject.replace(regex, replace); 
   return text1.replace( /\s\s+/g, ' ' );
}
 
/**
* string convert to array by the provided parameter
*
*/

function string_to_array(subject, split_by) {  return subject.split(split_by); }

/** 
* title: the bird is flying
* ex:   text = string_remove_char_by_array_multiple(title, 'data the this of my in is are what where who why was were they there'); 
* ouput is: bird flying
*/

function string_remove_char_by_array_multiple(subject, remove_char)
{  
    var remove_char = string_to_array(remove_char, ' ');    
    
    for(var i=0; i<remove_char.length; i++) 
    {   
        subject = string_find_replace_multiple(subject, remove_char[i], ' ');  
    }   
    return subject; 
}

/** 
* title: the bird is flying
* ex: total = string_count_total_word_accurance('this is the content of the field or any field of the page jesus ', 'jesus gwapo working');  
* ouput is:  jesus found and result is 1
* read ony for ' keyword ' ex: ' jesus ' -> with space and if no space program cant read.
*/ 

function string_count_total_word_accurance(content, keywords)
{
    var sum = 0; 
    var total = 0; 

    keywords = string_to_array(keywords, ' '); 
    for(var i=0; i<keywords.length; i++) 
    {    
        keyword = keywords[i];  
        total = string_exist_count(content, " "+keyword+" ");  
        sum += total;    
    }  

    return sum;
}




function collapse(idClass) {
    $(idClass).slideDown('normal');
}



//welcome popup

function welcome_about() {   

    // show hide next button
    if(validate_about()) { 
        $('.next-about').fadeIn('slow'); 
    }  else {
        $('.next-about').fadeOut('slow'); 
    }

}

function welcome_style() { 

}

function welcome_topic() { 


}

function validate_about() { 

        var fname        = $('#fname').val();
        var lname        = $('#lname').val();
        var uname        = $('#uname').val();
        var bname        = $('#bname').val();
        var burl         = $('#burl').val();
        var gender       = $('#gender').val();
        var plus_blogger = $('#plus-blogger').val();
        var status       = 0; 
 
        console.log(
            fname + " | " +
            lname + " | " +
            uname + " | " +
            bname + " | " +
            burl + " | "  +
            plus_blogger
        );  

        if (fname == '') {

            console.log('First name required.');
            status = 0;

        } else if (lname == '') { 

            console.log('Last name required.');
            status = 0;


        } else if (uname == '') { 

            console.log('User name required.');
            status = 0;


        } else if (bname == null) { 

            console.log('Blog name required.');
            status = 0;


        } else if (burl == '') { 

            console.log('Blog url required.');
            status = 0;


        } else if(gender == 'Gender') { 

            console.log('Gender required'); 
            status = 0;


        } else if (plus_blogger == 'Are you a plus size blogger?') { 

            console.log('Are you a plus size blogger required.'); 
            status = 0;


        }  else {  

           status = 1; 

        } 
 
        return status; 
}

function validate_style() { 
        
    return 0;

}

function validate_topic() { 
     return 0;
}