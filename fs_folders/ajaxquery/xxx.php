<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>jQuery Wookmark Plug-in Example</title>
  <meta name="description" content="An very basic example of how to use the Wookmark jQuery plug-in.">
  <meta name="author" content="Christoph Ono">

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div id="main" role="main" style="background:red;width:974px;margin:0 auto;">
      <ul id="tiles">
		
		<?php
			require("connect.php");
			session_start();
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
								<div style='padding:5px 0 5px 0;font:bold 11px arial'><b>".strtoupper($r[6])." - ".$r[5]." by $r[2]</b><br></div>
								<div>
									<div class='percent'>".@round(($rr[0]/($rrr[0]*5))*100)."%</div>
									<div style='position:absolute;display:none;z-index:10;' id='div$r[0]'>
										<div class='rate'
											style='position:relative;left:-18px;top:15px;WIDTH:27px;padding:10px 0 5px 0;' >
											<br>
											<div style='padding:2px;background:white;font:bold 9px arial;color:#3b3b3b'>RATE</div>
											<div style='background:#148794' onclick='ratethis($r[0],5)'>5</div>
											<div style='background:#209eac' onclick='ratethis($r[0],4)' >4</div>
											<div style='background:#30b2c1' onclick='ratethis($r[0],3)' >3</div>
											<div style='background:#49cfde' onclick='ratethis($r[0],2)' >2</div>
											<div style='background:#89e5ef' onclick='ratethis($r[0],1)' >1</div>
											<br>
											<div style=\"border-top:1px solid #ddd;border-right:1px solid #ddd;border-left:1px solid #ddd;background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
											<div style=\"border-bottom:1px solid #ddd;border-right:1px solid #ddd;border-left:1px solid #ddd;background:white url('images/love.png') center no-repeat\">&nbsp;</div>
										</div>
									</div>
									<img onclick=\"window.location='lookdetails.php?id=$r[0]'\" width='200' src='images/members/posted looks/$r[0].png' />
									<div style='background:white;padding:10px;'>
										<div style='height:1px;'></div>
										<table style='text-align:center;padding:20px;color:#3b3b3b;font:10px arial'>
											<td valign=center width=1>110</td><td valign=center ><img src='images/love.png' width=13 /></td><td>&nbsp;&nbsp;</td><td valign=center  width=1>50</td><td valign=center ><img src='images/drip.png' width=13 /></td><td>&nbsp;&nbsp;</td><td width=1 valign=center >20</td><td valign=center ><img src='images/comments.png' width=15 /></td>            
										</table>
									</div>
									<div style='font:11px arial;color:#524d4d;background:#f3f3f3;position:relative;left:-10px;padding:10px;width:203px;border-top:1px solid #d9d4d4'>
										<b style='font:bold 11px arial;'>".$r['firstname'].": </b>
										Hello this is a sample comment.
									</div>
									<div style='font:11px arial;color:#524d4d;background:#f3f3f3;position:relative;left:-10px;padding:10px;width:203px;border-top:1px solid #d9d4d4'>
										<b style='font:bold 11px arial;'>".$r['firstname'].": </b>
										Hello this is a sample comment.
									</div>
									<div style='font:11px arial;color:#524d4d;background:#f3f3f3;position:relative;left:-10px;padding:10px;width:203px;border-top:1px solid #d9d4d4'>
										<b style='font:bold 11px arial;'>".$r['firstname'].": </b>
										Hello this is a sample comment.
									</div>
								</div>
							</li>
						";
					$i++;
				}
			
			?>
		
      </ul>

    <footer>
		asdsdsad dasd
    </footer>
  </div>

  <script src="js/jquery-1.7.1.min.js"></script>
  <script src="js/jquery.imagesloaded.js"></script>
  <script src="js/jquery.wookmark.js"></script>
  <script type="text/javascript">
    $('#tiles').imagesLoaded(function() {
      var options = {
        autoResize: true, // This will auto-update the layout when the browser window is resized.
        container: $('#main'), // Optional, used for some extra CSS styling
        offset: 10, // Optional, the distance between grid items
        itemWidth: 236 // Optional, the width of a grid item
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
  
</body>
</html>
