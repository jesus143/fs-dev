init();

function init() 
{
	 
}
function occ_clicked(value) 
{
	// alert(" occu = "+value); 
	$('#os_input').val(value);  
	$('#os').text(value);
}
function style_clicked(value) 
{
	// alert(" style = "+value); 
	$('#ss_input').val(value);
	$('#ss').text(value);
}
function invited_info_check( ) 
{
 	// alert("working!");
 	return false; 
} 
function invited_info_check() 
{ 

	var fn = document.forms["form"]["fn"].value 
	var ln = document.forms["form"]["ln"].value 
	var email = document.forms["form"]["email"].value 
	var wob = document.forms["form"]["wob"].value 
	// var os_input = document.forms["form"]["os_input"].value 
	// var ss_input = document.forms["form"]["ss_input"].value 
	// var infTA = document.forms["form"]["infTA"].value 
	// alert(fn);
	// alert(email);
	if (fn == "FIRST NAME & LAST NAME") 
	{
		alert("Your First Name & Last Name Required");
	}
	else if (ln == "LAST NAME")  
	{ 
	 	alert("Your Last Name Required");
	}
	else if (email == "E-MAIL")  
	{ 
	 	alert("Your E-MAIL Required");
	}
	else if (email != "E-MAIL")  
	{ 
		var atpos=email.indexOf("@");
		var dotpos=email.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
		{
		  	alert("Not a valid e-mail address");	
		  	return false;
		}
		else 
		{ 
			return true;
			// alert("valid email");
			// if (os_input == "Occupation")  
			// { 
			//  	alert("Your Occupation Required");
			// }
			// else if (ss_input == "STYLE")  
			// { 
			//  	alert("Your Style Required");
			// }
			// else if (infTA == "WHAT WOULD YOU LIKE A FASHION SOCIAL NETWORK TO OFFER?")  
			// { 
			//  	alert("Your Offer Request Required");
			// }
			// else 
			// { 
			// 	return true;
			// }
		}
	}
	return false;
}
 
function closes(X) 
{
	$(X).slideUp('slow');
}	
function popUp( ) 
{
 	alert('Sorry , This link is Under Construction');
}

 