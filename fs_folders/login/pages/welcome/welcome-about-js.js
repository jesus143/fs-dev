/**
 * Created by jesus on 27/02/2015.
 */
$('body').ready(function(){ 
    console.log('welcome-about.js loaded...'); 

    $('#welcome-about-done').click(function()
    {
        alert('clicked');
        var url = 'http://localhost/fs/new_fs/alphatest/fs_folders/modals/Server/saveWelcomeAbout.php';
       // var url = 'http://fashionsponge.com/fs_folders/modals/Server/saveWelcomeAbout.php';



        alert(url);

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var uname = $('#uname').val();
        var checkbox = $('#checkbox').is(':checked');
        var gender = $('#gender').val();
        var profilePic = $('#f_image_profile_pic').val();
        var status = true;

        /*
        var variable = {
            "fname": fname,
            "lname": lname,
            "uname": uname,
            "checkbox": checkbox,
            "gender": gender
        };
        */

        var variable = 'fname='+fname+'&lname='+lname+'&uname='+uname+'&checkbox='+checkbox+'&gender='+gender;



        $('#welcome-about-loader').css({'display':'block'});
        //function
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {



                /**
                 * fname required
                 */
                var fname = xmlhttp.responseText.split('<fname>');
                if(fname[1] == 'empty')
                {
                    //alert('exist');
                    $('#fname').css({'border':'1px solid red'});
                    $('#fname-error').css({'display':'block'});
                    status = false;
                }
                else
                {
                    //alert('not exist');
                    $('#fname').css({'border':'1px solid grey'});
                    $('#fname-error').css({'display':'none'});
                }

                /**
                 * lname required
                 */
                var lname = xmlhttp.responseText.split('<lname>');
                if(lname[1] == 'empty')
                {
                    //alert('exist');
                    $('#lname').css({'border':'1px solid red'});
                    $('#lname-error').css({'display':'block'});
                    status = false;
                }
                else
                {
                    //alert('not exist');
                    $('#lname').css({'border':'1px solid grey'});
                    $('#lname-error').css({'display':'none'});

                }

                /**
                 * check username if exist and required
                 * return none
                 */
                var uname = xmlhttp.responseText.split('<username>');
                if(uname[1] == 'exist')
                {
                    //alert('exist');
                    $('#uname').css({'border':'1px solid red'});
                    $('#uname-error').css({'display':'block'});
                    status = false;
                }
                else
                {
                    //alert('not exist');
                    $('#uname').css({'border':'1px solid grey'});
                    $('#uname-error').css({'display':'none'});
                }

                /**
                 * display results
                 * @type {string}
                 */

                document.getElementById("popup-result").innerHTML=xmlhttp.responseText;


                /**
                 * validate image if upload or not and redirect resize save and crop
                 * return none
                 */

                // redirect to upload image | resize image
                //alert(' image [ ' + profilePic + ' ] index ' + profilePic.indexOf('mage'));


                if (status == true)
                {
                    if(profilePic == "")
                    {
                        alert('no image selected');
                        document.location = 'http://fashionsponge.com/';
                    }
                    else
                    {
                        alert('image selected');
                        $('#upload-profile-pic').submit();
                    }
                }
                else
                {
                    alert('failled to process the entire about info');
                }

                $('#welcome-about-loader').css({'display':'none'});
            }
        }
        xmlhttp.open("POST",url,true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(variable);

       // alert(variable.fname + variable.lname + variable.uname + ' checkbox ' +variable.checkbox + variable.gender);
        //send data
        /*
        var jqxhr = $.get( url+'?variable='+variable, function(response) {
            alert( "success" + response );
            $('#result').html(response);
        })*/
        /*
        $.ajax({
            url: url+'?variable='+variable,
            beforeSend: function( xhr ) {
                xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            }
        })
        .done(function( data ) {
            if ( console && console.log ) {
               // console.log( "Sample of data:", data.slice( 0, 100 ) );

                alert(data);
            }
        });
        */
        /*
        $.ajax({
            type: 'POST',
            url:  url,
            data: {json: JSON.stringify(variable)},
            dataType: 'json'
        })
        .done( function( data ) {
            alert('done');
            alert(data);
        })
        .fail( function( data ) {
            alert('fail');
            alert(data);
        });
        */
    });





    

    // new upload image

        /*
         set profile minimum width allowed to the server
         */
        var min_width_profile = 200;
        /*
         set timeline minimum width allowed to the server
         */
        var min_width_timeline = 500;

        // NEW PROFILE
        function readImage2(file) {
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
                        s = ~~(file.size/1024) +'KB',
                        src = this.src;


                    if ( w >= min_width_profile ) {
                       // $('#upload-profile-pic').submit();
                        //$( "#avatar-right-uploadprofile" ).trigger( "click" );
                        //alert("image validated src " + src);
                        $('#img_prev').attr('src',src);
                        $('#img_prev').css({'width':'100%'});
                    }
                    else{
                        alert(' sorry minimum required size is '+min_width_profile+' x below but you have only '+w+' x '+h+ ' please try onother');
                    }
                };
                image.onerror= function() {
                    alert('Invalid file type: '+ file.type);
                };
            };
        }
        $("#f_image_profile_pic1").change(function (e) {
            console.log('clicked');
            if(this.disabled) return alert('File upload not supported!');
            var F = this.files;
            if(F && F[0]) for(var i=0; i<F.length; i++) readImage2( F[i] );
        });

    // end upload image



})