<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Tooltip - Track the mouse</title>
	 <!-- <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"> -->
	 <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js" ></script>
	 <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js" ></script>





	 <link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
	  <script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
	 <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js" ></script>






	<link rel="stylesheet" href="../demos.css">
	<style>
	label {
		display: inline-block;
		width: 5em;
	}
	</style>
	<script>
	$(function() {
		$( document ).tooltip({
			track: true,
			effect: "slideDown",
			delay: 250, 
			hide: {
				effect: "explode",
				delay: 250
			} 
		});
	});
	</script>
</head>
<body>

<p><a href="#" title="boody kaba this is tooluips">Tooltips</a> can be attached to any element. When you hover
the element with your mouse, the title attribute is displayed in a little box next to the element, just like a native tooltip.</p>
<p>But as it's not a native tooltip, it can be styled. Any themes built with
<a href="http://themeroller.com" title="ThemeRoller: jQuery UI's theme builder application">ThemeRoller</a>
will also style tooltips accordingly.</p>
<p>Tooltips are also useful for form elements, to show some additional information in the context of each field.</p>
<p><label for="age">Your age:</label><input id="age" title="We ask for your age only for statistical purposes."></p>
<p>Hover the field to see the tooltip.</p>

<div class="demo-description">
<p>Here the tooltips are positioned relative to the mouse, and follow the mouse while it moves above the element.</p>
</div>
</body>
</html>
