<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="FashionSponge" content="" />
<meta name="FashionSponge" content="" />
<meta name="Salvador Mussolini" content="" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">

		//check empty field
		function validateForm()
		{
			var x=document.forms["myForm"]["name"].value;
			if (x==null || x=="" || x=='NAME')
			  {
			  alert("Name must be filled out");
			  return false;
			  }
			  
			var x=document.forms["myForm"]["website"].value;
			if (x==null || x=="" || x=='WEBSITE')
			  {
			  alert("Website must be filled out");
			  return false;
			  }
		  
		  var x=document.forms["myForm"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			  {
			  alert("Not a valid e-mail address");
			  return false;
			  } 
			  
		}

		//popup	
		$(document).ready(function(){
		//open popup
		$("#pop").click(function(){
		  $("#overlay_form").fadeIn(1000);
		  positionPopup();
		});
		
		//close popup
		$("#close").click(function(){
			$("#overlay_form").fadeOut(500);
		});
		});
		
		//position the popup at the center of the page
		function positionPopup(){
		  if(!$("#overlay_form").is(':visible')){
			return;
		  } 
		  $("#overlay_form").css({
			  left: ($(window).width() - $('#overlay_form').width()) / 2,
			  top: ($(window).width() - $('#overlay_form').width()) / 7,
			  position:'absolute'
		  });
		}
		
		//maintain the popup at center of the page when browser resized
		$(window).bind('resize',positionPopup);
		
</script>
    
    
    

<title>FashionSponge</title>

</head>

	<body>

		<div id="wrapper">
		
			<?php include('variables/variables.php'); ?>
            <div id="header">
                <h2><?php echo $heading; ?></h2>
            </div> <!-- end #header -->