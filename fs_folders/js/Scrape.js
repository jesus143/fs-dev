
house1=new Object();
house1.rooms=4;
house1.price=100000;
house1.garage=false;  
house1.message = 'This is a comment object';
 
function openNewWindow(url) {
    //'test.php?location=' + url
    var randomnumber = Math.floor((Math.random()*100)+1);
    window.open(url , "_blank",'PopUp'+randomnumber+',scrollbars=1,menubar=0,resizable=1,width=500,height=500');
}
function updateGender (id, gender) 
{ 
    alert(gender.value+ ' id = '+id );

    var data = 'action=invited-person&process=updateGender&gender='+gender.value+ '&invited_id='+id; 
    ajax_send_data( 
      'response-here', 
      "fs_folders/modals/general_modals/gen.modals.func.php?"+data,
      'invited-people-sort-loader'
    );  
}
function setTimeInviteTime(date, time, type, row, location, timezone)
{

	// alert(time.value)
	//alert(' date = ' + date);
	var dateTime = date + ' ' + time.value;  

	// alert(dateTime);
	// get all checked boxes
	//alert(house1.message + ' < --- that is a commasd asd asd asdent'); 
 	var inputs = document.getElementsByTagName("input"); //or document.forms[0].elements;
    var cbs = []; //will contain all checkboxes
    var checked = []; //will contain all checked checkboxes
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].type == "checkbox") {
        cbs.push(inputs[i]);
        if (inputs[i].checked) {
          checked.push(inputs[i].value); 
        }
      }
    }
    var nbCbs = cbs.length; //number of checkboxes
    var nbChecked = checked.length; //number of checked checkboxes 
    //alert('total checked = ' + nbChecked + ' total checkbox = ' + nbCbs + ' Checked = ' + checked);
   
    //validate information
    //if (nbChecked == 0) {
    //  alert('please select information through checking the checkboxes')
    //} else {
      ajax_send_data(
          'response-here' ,
          "fs_folders/modals/Server/Server_Scrape.php?invitedIds=" + checked + "&dateTime=" + dateTime + "&type=" + type+"&row=" + row + '&location=' + location + '&timezone=' +timezone,
          'invited-people-sort-loader',
          'scrape-changeTime'
      );
      //alert('information time send successfully updated to ' +dateTime)
    //}
    /*
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
	    	document.getElementById("response-here").innerHTML=xmlhttp.responseText;
	    }
  	}
	xmlhttp.open("GET","fs_folders/modals/Server/Server_Scrape.php?invitedIds=" + checked + "&dateTime="+dateTime , true);
	xmlhttp.send(); */
} 
function invited_person ( action , process , invited_id , status_id , container_id  ) 
{  
  var status_val      = getStatus(status_id); 
  var locationVal     = getLocation(status_id + '-location');
  var response = 'fs-general-ajax-response';
  var info     = '';
  // alert('location = ' + locationVal + 'status = ' + status_val);

  // alert(action)
  // alert( status_val );

  // assign new response output if change content


  if ( process == 'change-content' || process == 'view-more' ) {

    response = 'invited-container-response'; 



    
    // timeZone = setTimezone();   
    // totalEmailAvaialbe = setTotalEmailAvailable(); 

  }
  else if ( process == 'UpdateSendTime' ){ 
    DateTime = $(status_id).val();
    alert(status_id); 
    data = 'action='+action+'&process='+process+'&invited_id='+invited_id+'&DateTime='+DateTime;
     alert('ready to update the data = '+data);
    ajax_send_data(
      response, // response container 
      'fs_folders/modals/general_modals/gen.modals.func.php?'+data 
    );  
    return;
  } 
  else if( process == 'insert'  ) {

    // alert(' this is the insert ');

    var fullname    = $('#fullname').val(); 
    var email       = $('#email').val(); 
    var occupation  = $('#occupation').val(); 
    var style       = $('#style').val(); 
    var wob       = $('#wob').val(); 
    var tlook       = $('#tlook').val(); 
    var city      = $('#city').val(); 
    var state       = $('#state').val(); 
    var country     = $('#country').val(); 
    var description = $('#description').val(); 
    var status    = $('#status').val(); 

    wob = replace_all (wob , '.' , ' ' ); 
    // alert( wob );

    // alert( email )

    if ( !check_email ( email ) ) { 
      alert( 'correct email is required' );
      return false;
    }
      info ='fullname='+fullname+'&email='+email+'&occupation='+occupation+'&style='+style+'&wob='+wob+'&tlook='+tlook+'&city='+city+'&state='+state+'&country='+country+'&description='+description+'&status='+status;  
  }  
  else if ( process  == 'update' ) {  


    // alert(invited_id);
    response = 'invited-people-menu'+invited_id;
    var fullname    = $('#fullname').val(); 
    var email       = $('#email').val(); 
    var occupation  = $('#occupation').val(); 
    var style       = $('#style').val(); 
    var wob         = $('#wob').val(); 
    var tlook       = $('#tlook').val(); 
    var city        = $('#city').val(); 
    var state       = $('#state').val(); 
    var country     = $('#country').val(); 
    var description = $('#description').val(); 
    var status      = $('#status').val(); 
    var location    = $('#location').val(); 

    wob = replace_all (wob , '.' , '[dot]' ); 
    // alert( wob );

    info ='fullname='+fullname+'&email='+email+'&occupation='+occupation+'&style='+style+'&wob='+wob+'&tlook='+tlook+'&city='+city+'&state='+state+'&country='+country+'&description='+description+'&status='+status + '&location='  + location;   
  } 
  if ( status_val == 0 ) { 

    // person info pending 

      $(container_id).css('border','2px solid red');  
  }
  else if ( status_val == 1 ) {

    // person info is approved

      $(container_id).css('border','2px solid green');  
  }
  else if ( status_val == 2 ) { 

    // show popup for edit because edit is selected   
    // alert( 'show popup edit' );   
  }
  else{ 

    // hide the container because it is set as delete

      $(container_id).attr('style','display:none'); 
  }   
  // alert(locationVal);
  var data = 'action='+action+'&process='+process+'&invited_id='+invited_id+'&status_val='+status_val+'&location='+locationVal+'&'+info; 

  if ( process == 'view-more' ) { 

    // append content when view more  

      loader = '#view-more-invited-loader';
      response = 'invited-container-response';  // this is the view more of the modal
      appendNow( 
        response, 
        'fs_folders/modals/general_modals/gen.modals.func.php?'+data , 
        loader,
        'invited' 
      );  

  } 
  else if ( process == 'insert' ) { 

    // alert ( 'insert if' );

      loader = '#collect-email-add-edit-popup-loader';


      alert( loader ); 
    //  ajax_send_data(
      //  response, // response container 
      //  'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
      //  loader
      // );  

    prepend( 
      response , 
      'fs_folders/modals/general_modals/gen.modals.func.php?'+data, 
      loader, 
      'invited-people-insert' 
    );
  } 
  else if ( process  == 'update'  ) {  

    loader = 'collect-email-add-edit-popup-loader';
    // alert( loader ); 
    // alert( 'update' );    
    ajax_send_data(
      response, // response container 
      'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
      loader,
      'invited-people-update'
    );  

  }
  else{

    //replace content

      loader = 'invited-people-sort-loader';

      ajax_send_data(
        response, // response container 
        'fs_folders/modals/general_modals/gen.modals.func.php?'+data,
        loader,
        'invited-change-content'
      );  
  } 
}    
function getStatus (statusId) 
{
  // alert(statusId);
  return $(statusId).val(); 
}
function getLocation (locationId) 
{
  // alert(locationId);
  return $(locationId).val(); 
}
function fsInvitedChangeTime(time) {
    //alert('this is the value 1 ' + time.value + ' id ' + time.id);
    var fs_invited_location_time_row_name = time.id.split('-')[0];
    var fs_invited_location_id            = time.id.split('-')[1];
    var fs_invited_location_time_val      = time.value;
    //alert(" row = " + fs_invited_location_time_row_name + ' id = ' + fs_invited_location_id + ' time = ' +fs_invited_location_time_val);
    ajax_send_data(
        'response',
        '../fs_folders/modals/Server/invited_location_settings.server.php?fs_invited_location_time_row_name=' + fs_invited_location_time_row_name +
        //'http://localhost:63342/alphatest/fs_folders/modals/server/invited_location_settings.server.php?fs_invited_location_time_row_name=' + fs_invited_location_time_row_name +
            '&fs_invited_location_id=' + fs_invited_location_id +
            '&fs_invited_location_time_val=' + fs_invited_location_time_val,
        'fs_invited_location_send_tim1-'+fs_invited_location_id+'-loader', // fs_invited_location_send_tim1-idNum-loader
        'fs-invited-location-change-time'
    );
}
function fsInvitedChangeTimeZone(timeZone, loader, id) {

    //
    //$fs_invited_location_id            = $_GET['fs_invited_location_id'];
    //$fs_invited_location_time_row_name = $_GET['fs_invited_location_time_row_name'];
    //$fs_invited_location_time_val      = $_GET['fs_invited_location_time_val'];





    $(loader).css('visibility', 'visible');
    var fs_invited_location_time_val = $(timeZone).val();
    var fs_invited_location_time_row_name = 'fs_invited_location_timezone';



    $('#view-log-activity-popup-loader').css('visibility','visible');



    var jqxhr = $.get(
        '../fs_folders/modals/Server/invited_location_settings.server.php?fs_invited_location_time_row_name=' + fs_invited_location_time_row_name +
        '&fs_invited_location_id=' + id +
        '&fs_invited_location_time_val=' + fs_invited_location_time_val,  function(response) {

        //
        //// print the response
        //var viewMore = response.split("<showmore>");
        //var content = response.split("<content>");
        //
        //
        //$('#view-more-container').html(viewMore[1]);
        //
        //if(type == 'append') {
        //    $(result).append(content[1]);
        //} else {
        //    $(result).html(content[1]);
        //}
        // hide the loader
        //$('#view-log-activity-popup-loader').css('visibility','hidden');

            $(loader).css('visibility', 'hidden');
    })
}