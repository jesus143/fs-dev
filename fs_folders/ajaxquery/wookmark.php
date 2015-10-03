<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="css/reset.css">
		<title>Welcome to Fashion Sponge</title>
		<link rel="stylesheet" href="css/style.css">
		<style>
			.menu3 input{
				width:19.7%;
				padding:8px;
				color:white;
				border:none;
				cursor:pointer;
				border:none;
				font:bold 12px arial;
			}
			.percent{
				position:absolute;padding:5px;background:#ff6600;color:white;font:bold 12px arial;
				-moz-border-bottom-right-radius: 5px;
				-webkit-border-bottom-right-radius: 5px;
				border-bottom-right-radius: 5px;
			}
			
			.rate div{
				cursor:pointer;
				font:bold 12px arial;
				color:white;
				border:none;
				text-align:center;
				padding:6px;
			}
			
		</style>
		
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
						if(xmlhttp.responseText=="1")
						{
							window.location="profile.php";
						}
						else
						{	
							//alert(xmlhttp.responseText);		
						}
					}
				}						
				xmlhttp.open("GET","ajaxquery/ratealook.php?id="+id+"&rate="+rate,true);
				xmlhttp.send();
			}
		</script>
		<div id="container" STYLE="width:974px;margin:0 auto;" >
		<div id="main" role="main" style="padding:0;position:relative" >
		<ul id="tiles">
			<?php
				//echo "mno:".$_SESSION['mno'];
				$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno order by plno desc"; //where  mno=".$_SESSION['mno'];
				$ex = mysql_query($q) or die(mysql_error());
				$i=0;
				while($r = mysql_fetch_array($ex))
				{
					$i++;
						$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]") or die(mysql_error());
						$rr= mysql_fetch_array($xx);
						
						$xxx=mysql_query("select count(rating) from ratings where plno=$r[0]") or die(mysql_error());
						$rrr= mysql_fetch_array($xxx);
						echo"
							<li onmousemove=\"getID('div$r[0]').style.display='block'\" onmouseout=\"getID('div$r[0]').style.display='none'\">
								<table border=0 width=100%>
									<tr><td> <div style='background:#148794;padding:5px 2px 5px 2px;font:bold 12px arial;color:white;text-align:center' >".@round(($rr[0]/($rrr[0]*5))*100)."%</div> </td>
									<td><div style='padding:5px 0 5px 0;font:bold 12px arial'><b>".strtoupper($r[6])."<br>by $r[2]</b><br></div></td></tr>
									<tr>
									<tr><td></td>
									<td>
										<table style='color:#3b3b3b;font:10px arial'>
											<td ><b>21</b> COMMENTS</td><td valign=center >| <b>50</b></td><td valign=center ><img src='images/drip.png' width=13 /></td><td>|&nbsp;&nbsp;</td><td valign=center width=1><b>110</b></td><td valign=center ><img src='images/love.png' width=13 /></td><td>|&nbsp;&nbsp;</td></td><td><b>2</b> DAYS AGO</td>        
										</table>
									</td>
									</tr>
									<td ><br><br>
										<div class='rate' style='WIDTH:27px;padding:0' >
											<div style='padding:2px;background:white;font:bold 9px arial;color:#3b3b3b'>RATE</div>
											<div style='background:#148794' onclick='ratethis($r[0],5)'>5</div>
											<div style='height:1px'></div>
											<div style='background:#209eac' onclick='ratethis($r[0],4)' >4</div>
											<div style='background:#30b2c1' onclick='ratethis($r[0],3)' >3</div>
											<div style='background:#49cfde' onclick='ratethis($r[0],2)' >2</div>
											<div style='background:#89e5ef' onclick='ratethis($r[0],1)' >1</div>
											
											<div style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
											<div style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
										</div>
									</td>
									<td valign=top>
										<div>
											<img onclick=\"window.location='lookdetails.php?id=$r[0]'\" width='100%' src='images/members/posted looks/wookmark_$r[0].png' />
										</div>
									</td>
								</tr>
							</table>
							</li>
						";
					$i++;
				}
			
			?>
			
		  </ul>
		 
		</div>
		<div style="padding:10px;text-align:center">
			<input type="button" value="VIEW MORE" style="width:313px;border:0;color:white;background:#107985; padding:10px; font:bold 20px arial;" />
		 </div>
	</div>
    <footer>
		
    </footer>
	
	<script src="js/jquery-1.7.1.min.js"></script>
  <script src="js/jquery.imagesloaded.js"></script>
  <script src="js/jquery.wookmark.js"></script>
  <script type="text/javascript">
    $('#tiles').imagesLoaded(function() {
      var options = {
        autoResize: true, // This will auto-update the layout when the browser window is resized.
        container: $('#main'), // Optional, used for some extra CSS styling
        offset: 15, // Optional, the distance between grid items
        itemWidth: 314.66 // Optional, the width of a grid item
      };
      var handler = $('#tiles li');
      handler.wookmark(options);
      
      handler.click(function(){
        var newHeight = $('img', this).height() + Math.round(Math.random()*300+30);
        $(this).css('height', newHeight+'px');
        handler.wookmark();
      });
    });
  </script>
  