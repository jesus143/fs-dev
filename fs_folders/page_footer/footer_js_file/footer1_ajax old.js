	  
	function change_style( gender_id ) { 

        var gender_val = document.getElementById(gender_id).value;  
        if (gender_val == 'MALE') { 
	        // alert("male"); 
			$('#preferred_style_male').css("display","block");
			$('#preferred_style_female').css("display","none");

        }else if (gender_val == 'FEMALE') {
        	// alert("female");
	        $('#preferred_style_male').css("display","none");
			$('#preferred_style_female').css("display","block");
        }  
	} 
	function my_style( id ) {
		 var gender_val = document.getElementById(id).value;  
		 $("#my_style_input").val(gender_val); 
	}
	function save_news_letter(){  
		var pref_style = $("#my_style_input").val();
		var gender = $("#gender_style").val();
		var email = $("#bf_email").val(); 
		// alert(" pref_style , gender , email "+pref_style+" , "+gender+" , "+email);  
		if ( pref_style == 'STYLE' || pref_style == '' ) {
			alert('preferred style required')
		}else if (email ==''){
			alert('email  required');
		}else if (!check_email (email) ) {
			alert('email in invalid');
		}else{
			ajax_send_data ( 'footer_res' , 'fs_folders/modals/index_modals/index_modals.php?pref_style='+pref_style+'&gender='+gender+'&email='+email  ,  '' );	 
			setTimeout(function( ) {
				$('#fn').text(' FASHIONISTA ');
				set_center( '#invite-popup-response-wrapper1');	 
				$('#invite_after_submit1').fadeIn("slow");  
			},1000)  		
			$("#bf_email").val(''); 
			$("#gender_style").val('MALE'); 
			$("#preferred_style_male").val('Whats your style');
			$("#preferred_style_female").val('Whats your style'); 
		}   
	}