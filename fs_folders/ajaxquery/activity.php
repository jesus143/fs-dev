<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="css/reset.css">
		<title>Welcome to Fashion Sponge</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/wookmarkstyle.css">
		<script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
		<?php 
			require ("ajaxquery/design.php");
		?>
		
		<script>
			if (window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			function ratethis(id,rate)
			{
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						//alert(xmlhttp.responseText);	
						if(xmlhttp.responseText==1)
						{
							window.location="lookdetails.php?id="+id;
						}
						else if(xmlhttp.responseText==3)
						{	
							alert("You have already rated this post!");	
						}
						else if(xmlhttp.responseText==2)
						{	
							window.location="login.php?errno=2";	
						}
					}

					document.getElementById('res').innerHTML = xmlhttp.responseText;
				}						
				xmlhttp.open("GET","ajaxquery/ratealook.php?id="+id+"&rate="+rate,true);
				xmlhttp.send();
			}
			
			function lovethis(id)
			{
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						//alert(xmlhttp.responseText);	
						if(xmlhttp.responseText==1 || xmlhttp.responseText==3  )
						{
							window.location="lookdetails.php?id="+id;
						}
						else if(xmlhttp.responseText==2)
						{	
							window.location="login.php?errno=2";	
						}
					}
				}						
				xmlhttp.open("GET","ajaxquery/lovealook.php?id="+id,true);
				xmlhttp.send();
			}
			
			function dripthis(id)
			{
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						//alert(xmlhttp.responseText);	
						if(xmlhttp.responseText==1 || xmlhttp.responseText==3  )
						{
							window.location="lookdetails.php?id="+id;
						}
						else if(xmlhttp.responseText==2)
						{	
							window.location="login.php?errno=2";	
						}
					}
				}						
				xmlhttp.open("GET","ajaxquery/dripalook.php?id="+id,true);
				xmlhttp.send();
			}
			
			var page=0;
			function getWookMark()
			{
				getID("viewmore").style.background="#000 url('images/loading 2.gif') center no-repeat";
				getID("viewmore").style.border="1px solid #ddd";
				getID("viewmore").innerHTML="&nbsp;";
				getID("viewmore").disabled=true;
						
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{	
						var r=xmlhttp.responseText.split("<li >");
						for(i=1;i<r.length;i++){
							$("#wook ul").append("<li >"+r[i]);
						}
						$('#tiles').imagesLoaded(function() {
						  var options = {
							autoResize: true, // This will auto-update the layout when the browser window is resized.
							container: $('#main'), // Optional, used for some extra CSS styling
							offset: 15, // Optional, the distance between grid items
							itemWidth: 314.66 // Optional, the width of a grid item
							};
							var handler = $('#tiles li');
							handler.wookmark(options);

							getID("viewmore").style.background="#000";
							getID("viewmore").innerHTML="<span _onclick='getWookMark()' >VIEW MORE</span>";
							getID("viewmore").disabled=false;
							
						});
						
					}
				}						
				xmlhttp.open("GET","ajaxquery/activity wookmark.php?page="+page,true);
				xmlhttp.send();
				// alert(page);
				page=page+11;
			}
		</script>
		<div id="container" STYLE="width:974px;margin:0 auto;" >
		<div id="main" role="main" style="padding:0;position:relative" >
		<div id="wook" style="//position:relative;//left:-40px">
			<ul id="tiles">







			</ul>
		</div>	
		<!--<textarea id='dT' cols=140 rows=50></textarea>-->
		 <br><br>
		 
		</div>
		
		<div id='viewmore' onclick="getWookMark()" style="text-align:center;disabled:true;border:2px solid #ddd;cursor:pointer;margin:0 auto;border:0;color:#f8f8f8;background:#000 url('images/loading 2.gif') center no-repeat; padding:10px; font:23px helveticaBold;" >&nbsp;</div>
		<!-- <div id="res">result</div> -->
	</div>
	
	<script src="js/jquery-1.7.1.min.js"></script>
  <script src="js/jquery.imagesloaded.js"></script>
  <script src="js/jquery.wookmark.js"></script>
  <script type="text/javascript">
  getWookMark();

		function ready(){
			alert('ready');
			var t=setTimeout(function(){getWookMark()},3000);			
		}
  
  </script>
  