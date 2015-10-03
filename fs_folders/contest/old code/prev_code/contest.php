<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20317218-5']);
  _gaq.push(['_setDomainName', 'fashionsponge.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<html>
	<head>
		<style type="text/css">
		  /* Height & width for the container - The rest is done by the jQuery part. */
		  div[rel='scrollcontent1'] { width: 60%; height: 280px;}
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent1", style its scrollbar by referring to ".scrollcontent-content", ".scrollcontent-bar", etc. */
		  .scrollcontent1-content { /* background: #eee; */ } /* for vertical content, no explicit width is required for inner DIV */
		  .scrollcontent1-bar { width: 11px; background: #fffeda; border-radius: 4px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent1-drag { background: #ad5134; border-radius: 4px; cursor: pointer; }
		  
		  div[rel='scrollcontent2'] { width: 300px; height: 300px; }
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent2", style its scrollbar by referring to ".scrollcontent2-content", ".scrollcontent2-bar", etc. */
		  .scrollcontent2-content { width: 999px; } /* for horizontal content, width should be set to total width of all floated inner container elements */
		  .scrollcontent2-bar { height: 15px; background: #ccc; border-radius: 5px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent2-drag { background: #425a8a; border-radius: 5px; cursor: pointer; }
		  
		  /* Not needed elements */
		  #contentwrap { padding: 5px; border: 1px #444444 solid; display: block; width: 300px; border-radius: 10px; }
		  .scrollcontent1-content p, .scrollcontent2-content p {margin:0; padding:0}
			
		.style1 {
	font-family: 'helveticabold';
	font-size: 15px;
}
.style2 {
	font-family: 'helvetica';
	font-size: 15px;
}
</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.mousewheel.min.js"></script>
		<script src="slickcustomscroll.js"></script>
		<script type="text/javascript">
			$( document ).ready( function() {
				$( "div[rel='scrollcontent1']" ).customscroll( { direction: "vertical" } );
				$( "div[rel='scrollcontent2']" ).customscroll( { direction: "vertical" } );
			});
		</script>
	</head>
	<body>
		<style>
		a img{
			border:0px;
		}
		a{text-decoration:none}
		table{
			border-collapse:collapse;
		}
		#slide_container{
			background:white;height:350px;
			overflow:hidden;
			width:780px;
		}
		#tab_slide td{
			width:780px;background:white;text-align:center;vertical-align:top;
		}
		#tab_slide img{
			cursor:pointer;
		}
		.slide_img{
			width:780px;
		}
		.nav_square{
			padding:0 6px 0 6px;background:red;border-radius:5px;cursor:pointer;
		}
		.nav_text{
			color:red;//font:14px 'trebuchet ms';
			cursor:pointer;font:bold 12px 'helvetica'
		}
		
		
		@font-face {
			font-family: misoBold;
			src: url('fonts/misobold.eot');
			src: local(misoBold), url('fonts/miso-bold.otf') format('opentype');
		}
		@font-face {
			font-family: misolight;
			src: url('fonts/misolight.eot');
			src: local(misolight), url('fonts/miso-light.otf') format('opentype');
		}
		@font-face {
			font-family: miso;
			src: url('fonts/misoregular.eot');
			src: local(miso), url('fonts/miso-regular.otf') format('opentype');
		}
		@font-face {
			font-family: raleway_thin;
			src: url('fonts/raleway_thinwebfont.eot');
			src: local(raleway_thin), url('fonts/raleway_thin-webfont.ttf') format('opentype');
		}
		@font-face {
			font-family: helvetica;
			src: url('fonts/Helvetica.eot');
			src: local(helvetica), url('fonts/Helvetica.otf') format('opentype');
		}
		@font-face {
			font-family: helveticaBold;
			src: url('fonts/HelveticaBold.eot');
			src: local(helveticaBold), url('fonts/Helvetica-Bold.otf') format('opentype');
		}
		
		@font-face {
			font-family: helveticaNarrow;
			src: url('fonts/HelveticaCENarrow.eot');
			src: local(helveticaNarrow), url('fonts/HelveticaCE-Narrow.otf') format('opentype');
		}
	</style>
	
	<script type="text/javascript" src="scripts/script.js" ></script>
			
	<div style="position:absolute;top:0;left:0;width:100%;">
	
		<div style="background:#1f1f1f;text-align:center;padding:10px;color:white">
			<a href="http://www.fashionsponge.com"><image alt="FashionSponge" src="images/logo-small.png" /></a><br>
			<?php
				$b=$_SERVER['HTTP_USER_AGENT'];
				if($b=="Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; InfoPath.2; .NET CLR 1.1.4322; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; handyCafeCln/3.3.21)")
					$b="ie";
				else
					$b="ch";
			?>	
		</div>	
		<div style="background:#2d2d2d;padding:10px;text-align:center;">
			<div style="width:788px;margin:0 auto;padding:25px;text-align:left;">
				<img src="images/fs-looking.png" /><br><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.fashionsponge.com" target="_"><img src="images/learn.png" title="Learn About FashionSponge" /></a>
			</div>
		</div>
		<div style="background:#202020 url('images/back.png') center bottom no-repeat;text-align:center;">
			<center><img src="images/down-arr.png" /></center><br>
			<div style="width:980px;margin:0 auto;">
				<table width=100%>
					<td valign=center style="width:100px" >
						<input type=image src="images/left.png" onClick="clearInterval(t);getID('PlayPause').src='images/btn_play.png';state='pause';navigate('prev')" />
					</td>
					<td width=*% valign=top >
						<div id="slide_container">
							<table style="position:relative;" id="tab_slide">
								<td><img src="images/slides/1.jpg" class="slide_img" /></td>
								<td><img src="images/slides/2.jpg" class="slide_img" /></td>
								<td>
									<img src="images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
									<br><br>
									<span style="font:bold 25px 'helvetica'" >Guest Judges</span>
									<br><br>
									<table width=100% >
										<td>
											<a href="http://www.youtube.com/user/PassionJonesz" target="_blank" ><img src="images/judges/j1.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Vanjia Wilson</span><br>
											<span style="font:15px 'helvetica'">Beauty Expert</span><br>
											<a href="http://twitter.com/PassionJonesz" target="_blank" style="font:12px 'helvetica';color:red">@PassionJonesz</a>
										</td>
										<td>
											<a href="http://khatalogue.tumblr.com/" target="_blank"><img src="images/judges/j2.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Kathryn Hu</span><br>
											<span style="font:15px 'helvetica'">Blogger</span><br>
											<a href="http://twitter.com/Khatalogue" target="_blank" style="font:12px 'helvetica';color:red">@Khatalogue</a>
										</td>
										<td>
											<a href="http://twitter.com/LornaRaindrops" target="_blank"><img src="images/judges/j3.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Lorna Burford</span><br>
											<span style="font:15px 'helvetica'">Blogger</span><br>
											<a href="http://twitter.com/LornaRaindrops" target="_blank" style="font:12px 'helvetica';color:red">@LornaRaindrops</a>
										</td>
										<td>
											<a href="http://twitter.com/Lala1Land" target="_blank" ><img src="images/judges/j4.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Lala Gamez</span><br>
											<span style="font:15px 'helvetica'">Blogger</span><br>
											<a href="http://twitter.com/Lala1Land" target="_blank" style="font:12px 'helvetica';color:red">@Lala1Land</a>
										</td>
										<td>
											<a href="http://www.jacobcasem.blogspot.com/" target="_blank"><img src="images/judges/j5.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Jacob Casem</span><br>
											<span style="font:15px 'helvetica'">Fashion Stylist </span><br>
											<a href="http://twitter.com/Jacob_Casem" target="_blank" style="font:12px 'helvetica';color:red">@Jacob_Casem</a>
										</td>
									</table>
								</td>
								<td>
									<img src="images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
									<br><br>
									<span style="font:bold 25px 'helvetica'" >Guest Judges</span>
									<br><br>
									<table width=100% >
										<td>
											<a href="http://www.terrymcfly.com/" target="_blank" ><img src="images/judges/j6.jpg" /></a>
											<div style="padding:5px"></div>
											<span class="style1" style="font:15px 'helveticabold'">Terry McFly</span><br>
											<span class="style2">Socialite</span><br>
											<a href="http://twitter.com/Terry_McFly" target="_blank" style="font:12px 'helvetica';color:red">@Terry_McFly</a>										</td>
										<td>
											<a href="http://cherylol.blogspot.com/" target="_blank"><img src="images/judges/j7.jpg" /></a>
											<div style="padding:5px"></div>
											<span class="style1" style="font:15px 'helveticabold'">Cheryl Anne</span><br>
											<span class="style2" style="font:15px 'helvetica'">Fashion Student</span><br>
											<a href="http://twitter.com/CherylAnnec" target="_blank" style="font:12px 'helvetica';color:red">@CherylAnnec</a>										</td>
										<td>
											<a href="http://twitter.com/RiaMichelle" target="_blank" ><img src="images/judges/j8.jpg" /></a>
											<div style="padding:5px"></div>
											<span class="style1">Ria Michelle</span><br>
											<span style="font:15px 'helvetica'">Blogger</span><br>
											<a href="http://twitter.com/RiaMichelle" target="_blank" style="font:12px 'helvetica';color:red">@RiaMichelle</a>										</td>
										<td>
											<a href="http://twitter.com/SilviaCristescu" target="_blank" ><img src="images/judges/j9.jpg" /></a>
											<div style="padding:5px"></div>
											<span style="font:15px 'helveticabold'">Silvia Cristescu</span><br>
											<span class="style2" style="font:15px 'helvetica'">Fashion Stylist</span><br>
											<a href="http://twitter.com/SilviaCristescu" target="_blank" style="font:12px 'helvetica';color:red">@SilviaCristescu</a>										</td>
										<td>
											<a href="http://twitter.com/Victor_Go" target="_blank" ><img src="images/judges/j10.jpg" /></a>
											<div style="padding:5px"></div>
											<span class="style1" style="font:15px 'helveticabold'">Victor Go</span><br>
											<span class="style2" style="font:15px 'helvetica'">Blogger </span><br>
											<a href="http://twitter.com/Victor_Go" target="_blank" style="font:12px 'helvetica';color:red">@Victor_Go</a>										</td>
									</table>
								</td>
								<td style='display:none'><img src="images/slides/3.jpg"  class="slide_img" /></td>
								<td valign=top onClick="window.open('http://www.theschoolofstyle.com','_blank')">
									
									<img src="images/slides/4.jpg" class="slide_img" /><br>							
									<div style="position:relative;top:-120px">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/SchoolofStyle" target="_"><img src="images/fb-med.jpg" /></a>
										<a href="https://twitter.com/schoolofstyle" target="_"><img src="images/tw-small.jpg" /></a>
										<a href="http://www.youtube.com/user/SchoolofStyleLA" target="_"><img src="images/youtube.jpg" /></a>
									</div>
								</td>
								<td valign=top style="vertical-align:top"  >
									<img src="images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
									<table style="width:780px">
										<td style="width:560px;text-align:left;padding:20px 0 20px 20px;vertical-align:top" valign=top>
											<span style="font:30px raleway_thin">Rules</span><br><br>
											
											<div style="height:230px;width:560px;overflow:auto;font:12px 'helvetica'" rel="scrollcontent1">
												<p>
												<table style="width:100%">
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Entry must be received by 11:59:59PM (EST/ UTC-05) on January 2, 2013 and be submitted through the contest gallery on FashionSponge. 
														<br><br>
													</td></tr>	
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Contest is open only to individuals who have reached the age of
														majority in their jurisdiction of residence at the time of entry and
														who do NOT reside in, Rhode Island, The Province of Quebec, Cuba,
														Iran, Syria, North Korea, Sudan, Myanmar (Burma), or to other
														individuals restricted by U.S. export controls and sanctions, and is
														void in any other nation, state, or province where prohibited or
														restricted by U.S. or local law. 
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Entry must be submitted as a JPG or PNG file.
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Entries must be made for this contest and may not contain any 3rd party stock images.
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Entry may not include any watermarks, or distinguishing artist marks (such as prominent signatures)
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														You can only submit one entry.
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														You must sign up to Fashion Sponge to enter. Membership is free.
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Other requirements and restrictions apply, please read the Official Rules carefully.
														<br><br>
													</td></tr>
												</table>
											</p>
											</div>
                                                                                     
                                            
										</td>
										<td style="width:2px;padding:20px;" > <img src="images/divider.jpg" /> </td>
										<Td style="width:220px;text-align:left;padding:20px 20px 20px 0;text-align:left;font:12px 'helvetica'" valign=top >
		Submit 1 photo collaged with 3 different looks to showcase your styling ability. Photo must be 5 megabytes or smaller<br>and must be at least 480 x 480 pixels<br><br><br>
											<a href="http://fashionsponge.com/fs-contest/signup.php" target="_blank" ><img src="images/submit looks.jpg" /></a><br>
									    <br>
											<img src="images/or.jpg" /><br><br>
											<a href="http://fashionsponge.com/fs-contest/home" target="_blank" ><img src="images/browse entries.jpg" /></a>
										</td>
									</table>
								</td>
								<td valign=top style='vertical-align:top' >
									<img src="images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
									<table style="width:780px">
										<td style="width:560px;text-align:left;padding:20px 0 20px 20px" valign=top>
											<span style="font:30px raleway_thin">Judging</span><br><br>
											<div style="height:230px;width:560px;overflow:auto;font:12px 'helvetica (OT1)'" rel="scrollcontent2" >
												<table style="width:100%">
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														25 Semi-Finalists will be selected by full-time Fashion Sponge
														staff and guest judges.
														<br><br>
													</td></tr>	
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px helvetica">
														From the Semi-Finalists, Fashion Sponge staff and guest judges based on the community votes and critiques will select the final three winners! The prizes for the most viral photo will be based on the entrants who looks get shared on social networks the most.
														<br><br>
													</td></tr>
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														All entries will be judged on the following criteria:<br><br>
														<b>Photography:</b> Visual impact and clarity of photo.<br>
														<b>Wardrobe:</b> Success in communicating styling ability.<br>
														<b>Appearance:</b> The presence of the individual (Hair, Make-up, Grooming)<br>
														<b>Originality:</b> Making a style your own while still showcasing great styling.<br>
														<b>Consistency:</b> Showcasing great styling, photography, appearance.<br>
														<br><br>
													</td></tr>
												</table>
											</div>
										</td>
										<td style="width:2px;padding:20px;" > <img src="images/divider.jpg" /> </td>
										<Td style="width:220px;text-align:left;padding:20px 20px 20px 0;text-align:left;font:12px 'helvetica'" valign=top >
											Submit photo. Photo 5
megabytes or smaller, must
be JPEG or JPG format,
and must be atleast 1, 600
pixels wide if a horizontal
image and 1, 600 pixels tall
if a vertical image.<br><br><br>
											<a href="http://fashionsponge.com/fs-contest/signup.php" target="_blank" ><img src="images/submit looks.jpg" /></a><br><br>
											<input type=image src="images/or.jpg" /><br><br>
										                                        
                                            <a href="http://fashionsponge.com/fs-contest/home" target="_blank" ><img src="images/browse entries.jpg" /></a>
										</td>
									</table>
								</td>
								
							</table>
							<span style="position:relative;top:-90px;left:10px;">
								<input type=image alt="Play/Pause" src="images/btn_pause.png" title="Pause" id="PlayPause" onClick="PlayPause()" />
							</span>
						</div>
					</td>
					<td valign=center style="width:100px"  align=right >
						<input type=image src="images/right.png" onClick="clearInterval(t);getID('PlayPause').src='images/btn_play.png';state='pause';navigate('next')" />
					</td>
				</table>
			</div>
			<div style="width:780px;margin:0 auto;text-align:center;">
				<div style="padding:5px;"></div>
				<div style="margin:0 auto;">
					<div style="padding:10px;color:white;background:url('images/back-trans.png');text-align:left;">
						<span id="nav_span_0" style="display:none" ></span>
						<span class="nav_square" id="nav_span_1" onClick="navigate_text(1)"  title="Introduction" style="background:white">&nbsp;</span>
						<span class="nav_square" id="nav_span_2" onClick="navigate_text(2)"  title="Prizes">&nbsp;</span>
						<span class="nav_square" id="nav_span_3" onClick="navigate_text(3)"  title="Judges" >&nbsp;</span>
						<span style="//display:none" class="nav_square" id="nav_span_4" onClick="navigate_text(4)"  title="Judges" >&nbsp;</span>
						<span class="nav_square" id="nav_span_5" onClick="navigate_text(5)"  title="Sponsors" >&nbsp;</span>
						<span class="nav_square" id="nav_span_6" onClick="navigate_text(6)"  title="Rules" >&nbsp;</span>
						<span class="nav_square" id="nav_span_7" onClick="navigate_text(7);"  title="Judging & Criteria" >&nbsp;</span>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span id="nav_text_0" style="display:none" ></span>
						<span class="nav_text" 	 id="nav_text_1" onClick="navigate_text(1);" title="Introduction" style="color:white" >INTRODUCTION</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_2" onClick="navigate_text(2)" title="Prizes" >PRIZES</span> &nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_3" onClick="navigate_text(3)" title="Judges" >JUDGES</span>&nbsp;&nbsp;&nbsp;
						<span style="//display:none" class="nav_text" 	 id="nav_text_4" onClick="navigate_text(4)" title="Judges" >JUDGES</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text"   id="nav_text_5" onClick="navigate_text(5)" title="Sponsors" >SPONSORS</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_6" onClick="navigate_text(6);" title="Rules" >RULES</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_7" onClick="navigate_text(7);" title="Judging & Criteria" >JUDGING & CRITERIA</span>
					</div>
					<br><br><br>
					<table width=100% style="color:white" >
						<td valign=top >
							<?php
								if($b=="ch")
									echo '<b style="font-family:misoLight;font-size:36px;color:white">';
								else
									echo '<b style="font-family:raleway_thin;font-size:36px;color:white">';
							?>
								HOW<br>TO<br>ENTER<br></b>
							<b 
								<?php
									if($b=="ch")
										echo '<b style="font-family:misoLight;font-size:15px;color:white">';
									else
										echo '<b style="font-family:misoLight;font-size:15px;color:white">';
								?>
							(WORLDWIDE 16+)</b>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:misoLight;font-size:50px;color:white;padding:0 20px 0 0">1</td>
								<td valign=top style="font-family:helvetica;font-size:12px">30 sec registration using<br> facebook or twitter connect.
								<div style="padding:3px"></div>
									<a href="contestrules.php" target="_blank" style="color:#d20e0e;font-family:helveticabold">OFFICIAL RULES</a>
								</td>
							</table>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:misoLight;font-size:50px;color:white;padding:0 20px 0 0">2</td>
								<td valign=top style="font-family:helvetica;font-size:12px">
									Grab your favorite camera <br>(idevice, smartphone, Nikon,<br> Canon, etc.) and take a<br> quality distruction free
									photo<br> showcasing your overall<br> styling ability.
								</td>
							</table>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:misoLight;font-size:50px;color:white;padding:0 20px 0 0">3</td>
								<td valign=top style="font-family:helvetica;font-size:12px;">
									Submit 1 photo collaged <br>with 3 different looks to showcase <br>your styling ability. Photo must <br>be 5 megabytes or smaller and<br>must be at least 480 x 480 pixels
									<br><br><br>
									<a href="http://fashionsponge.com/fs-contest/signup.php" target="_blank" ><img src="images/submit looks.jpg" /></a>
								</td>
							</table>
							
						</td>
					</table>
					<br>
					<div style="padding:2px;border-bottom:1px solid #555"></div>
					<div style="padding:5px;"></div>
					<table width=100% style="" >
						<td valign=top style="padding:5px 25px 5px 0;//border-right:1px solid #555"><a style="text-decoration:none;" href='http://www.fashionsponge.com' target="_" ><img src="images/logo-small-x.png" width=80 /></a></td>
						<td valign=top style="padding:5px 25px 5px 25px;//border-right:1px solid #555"><a style="color:#d20e0e;font-family:helveticabold;font-size:12px" target="_" href='#'  >ABOUT</a></td>
						<td valign=top style="padding:5px 25px 5px 25px;//border-right:1px solid #555"><a style="color:#d20e0e;font-family:helveticabold;font-size:12px" target="_" href='http://www.djddw.com/'  >BLOG</a></td>
						<td valign=top style="padding:5px 25px 5px 25px;">
							<a href="https://www.facebook.com/FASHIONSPONGE " target="_"><img src="images/fb-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="https://twitter.com/FashionSponge " target="_"><img src="images/tw-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="http://fashionsponge.tumblr.com/ " target="_"><img src="images/th-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="http://pinterest.com/fashionsponge/" target="_"><img src="images/pin-small.png" /></a>&nbsp;&nbsp;&nbsp;
						</td>
						<td valign=top align=right> <a href="http://darionmccoy.com" target="_blank" style="color:#d20e0e;font-family:helveticabold;font-size:12px" >DESIGN BY DARIONMCCOY</a> </td>
					</table>
					<br><br><br>
				</div>	
				
			</div>
		</div>
	</div>
	</body>
</html>


