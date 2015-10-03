<html>
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
	
		<div style="background:#1f1f1f;text-align:center;padding:10px;">
			<input type=image alt="FashionSponge" src="images/logo-small.png" />
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
						<input type=image src="images/left.png" onclick="clearInterval(t);getID('PlayPause').src='images/btn_play.png';state='pause';navigate('prev')" />
					</td>
					<td width=*% valign=top >
						<div id="slide_container">
							<table style="position:relative;" id="tab_slide">
								<td><img src="images/slides/1.jpg" class="slide_img" /></td>
								<td><img src="images/slides/2.jpg" class="slide_img" /></td>
								<td style='display:none'><img src="images/slides/3.jpg"  class="slide_img" /></td>
								<td valign=top>
									
									<img src="images/slides/4.jpg" class="slide_img" /><br>							
									<div style="position:relative;top:-120px">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/SchoolofStyle" target="_"><img src="images/fb-med.jpg" /></a>
										<a href="https://twitter.com/schoolofstyle" target="_"><img src="images/tw-small.jpg" /></a>
										<a href="http://www.youtube.com/user/SchoolofStyleLA" target="_"><img src="images/youtube.jpg" /></a>
									</div>
								</td>
								<td valign=top  >
									<img src="images/slides/60.jpg"  class="slide_img" /><br>
									<table style="width:780px">
										<td style="width:560px;text-align:left;padding:20px 0 20px 20px" valign=top>
											<span style="font:30px raleway_thin">Rules</span><br><br>
											
											<div style="height:230px;width:560px;overflow:auto;font:12px 'helvetica (OT1)'" <?php if(1==2){echo"class='content_2 content'";} ?> >
												<p>
												<table style="width:100%">
													<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
													<td style="text-align:left;font:12px 'helvetica'">
														Entry must be received by 11:59:59PM (EST/ UTC-05) on October 21, 2012 and be submitted through the contest gallery on FashionSponge. 
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
													<td style="text-align:left;font:11px 'helvetica'">
														Other requirements and restrictions apply, please read the Official Rules carefully.
														<br><br>
													</td></tr>
												</table>
											</p>
											</div>
										</td>
										<td style="width:2px;padding:20px;" > <img src="images/divider.jpg" /> </td>
										<Td style="width:220px;text-align:left;padding:20px 20px 20px 0;text-align:left;font:12px 'helvetica'" valign=top >
											Fraesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sam malesuada magna molles euismod.<br><br><br>
											<a href="http://fashionsponge.com/fs/postalook.php"><img src="images/submit looks.jpg" /></a><br><br>
											<img src="images/or.jpg" /><br><br>
											<a href="http://fashionsponge.com/fs/ratealook.php"><img src="images/browse entries.jpg" /></a>
										</td>
									</table>
								</td>
								<td valign=top  >
									<img src="images/slides/60.jpg"  class="slide_img" /><br>
									<table style="width:780px">
										<td style="width:560px;text-align:left;padding:20px 0 20px 20px" valign=top>
											<span style="font:30px raleway_thin">Judging</span><br><br>
											<div style="height:230px;width:560px;overflow:auto;font:12px 'helvetica (OT1)'" class="content_2 content" onclick="clearInterval(t);getID('PlayPause').src='images/btn_play.png';state='pause';">
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
											Fraesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sam malesuada magna molles euismod.<br><br><br>
											<input type=image src="images/submit looks.jpg" /><br><br>
											<input type=image src="images/or.jpg" /><br><br>
											<input type=image src="images/browse entries.jpg" />
										</td>
									</table>
								</td>
								
							</table>
							<span style="position:relative;top:-90px;left:10px;">
								<input type=image alt="Play/Pause" src="images/btn_pause.png" title="Pause" id="PlayPause" onclick="PlayPause()" />
							</span>
						</div>
					</td>
					<td valign=center style="width:100px"  align=right >
						<input type=image src="images/right.png" onclick="clearInterval(t);getID('PlayPause').src='images/btn_play.png';state='pause';navigate('next')" />
					</td>
				</table>
			</div>
			<div style="width:780px;margin:0 auto;text-align:center;">
				<div style="padding:5px;"></div>
				<div style="margin:0 auto;">
					<div style="padding:10px;color:white;background:url('images/back-trans.png');text-align:left;">
						<span id="nav_span_0" style="display:none" ></span>
						<span class="nav_square" id="nav_span_1" onclick="navigate_text(1)"  title="Introduction" style="background:white">&nbsp;</span>
						<span class="nav_square" id="nav_span_2" onclick="navigate_text(2)"  title="Prizes">&nbsp;</span>
						<!--<span class="nav_square" id="nav_span_3" onclick="navigate_text(3)"  title="Judges" >&nbsp;</span>-->
						<span class="nav_square" id="nav_span_3" onclick="navigate_text(3)"  title="Sponsors" >&nbsp;</span>
						<span class="nav_square" id="nav_span_4" onclick="navigate_text(4)"  title="Rules" >&nbsp;</span>
						<span class="nav_square" id="nav_span_5" onclick="navigate_text(5);"  title="Judging & Criteria" >&nbsp;</span>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span id="nav_text_0" style="display:none" ></span>
						<span class="nav_text" 	 id="nav_text_1" onclick="navigate_text(1);" title="Introduction" style="color:white" >INTRODUCTION</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_2" onclick="navigate_text(2)" title="Prizes" >PRIZES</span> &nbsp;&nbsp;&nbsp;
						<!--<span class="nav_text" 	 id="nav_text_3" onclick="navigate_text(3)" title="Judges" >JUDGES</span>&nbsp;&nbsp;&nbsp;-->
						<span class="nav_text"   id="nav_text_3" onclick="navigate_text(3)" title="Sponsors" >SPONSORS</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_4" onclick="navigate_text(4);" title="Rules" >RULES</span>&nbsp;&nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_5" onclick="navigate_text(5);" title="Judging & Criteria" >JUDGING & CRITERIA</span>
					</div>
					<br><br><br>
					<table width=100% style="color:white" >
						<td valign=top >
							<b style="font-family:raleway_thin;font-size:30px;color:white">
								HOW<br>TO<br>ENTER<br>
							<b style="font-family:raleway_thin;font-size:15px;color:white">(WORLDWIDE 16+)</b></b>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:raleway_thin;font-size:50px;color:white;padding:0 20px 0 0">1</td>
								<td valign=top style="font-family:helvetica;font-size:12px">30 sec registration using<br> facebook or twitter connect.
								<div style="padding:3px"></div>
									<a href="#" style="color:#d20e0e">OFFICIAL RULES</a>
								</td>
							</table>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:raleway_thin;font-size:50px;color:white;padding:0 20px 0 0">2</td>
								<td valign=top style="font-family:helvetica;font-size:12px">
									Grab your favorite camera <br>(idevice, smartphone, Nikon,<br> Canon, etc.) and take a<br> quality distruction free
									photo<br> showcasing your overall<br> styling ability.
								</td>
							</table>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:raleway_thin;font-size:50px;color:white;padding:0 20px 0 0">3</td>
								<td valign=top style="font-family:helvetica;font-size:12px">
									Submit photo. Photo 5<br> megabytes or smaller, must<br> be JPEG or JPG format,<br> and must be atleast 1, 600<br>
									pixels wide if a horizontal<br> image and 1, 600 pixels tall<br> if a vertical image.
									<br><br><br>
									<input type=button style="background:url('images/btn_lorem.jpg') top;border:none;padding:7px 30px 7px 30px;color:white;font:bold 12px arial;cursor:pointer" value="Submit Look" />
								</td>
							</table>
							
						</td>
					</table>
					<br>
					<div style="padding:2px;border-bottom:1px solid #555"></div>
					<div style="padding:5px;"></div>
					<table width=100%>
						<td style="padding:5px 25px 5px 0;border-right:1px solid #555"><a style="text-decoration:none;" href='http://www.fashionsponge.com' target="_" ><img src="images/logo-small-x.png" /></a></td>
						<td style="padding:5px 25px 5px 25px;border-right:1px solid #555"><a style="color:#d20e0e;font-family:helvetica;font-size:12px" target="_" href='#'  >ABOUT</a></td>
						<td style="padding:5px 25px 5px 25px;border-right:1px solid #555"><a style="color:#d20e0e;font-family:helvetica;font-size:12px" target="_" href='http://www.djddw.com/'  >BLOG</a></td>
						<td style="padding:5px 25px 5px 25px;">
							<a href="https://www.facebook.com/FASHIONSPONGE " target="_"><img src="images/fb-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="https://twitter.com/FashionSponge " target="_"><img src="images/tw-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="http://fashionsponge.tumblr.com/ " target="_"><img src="images/th-small.png" /></a>&nbsp;&nbsp;&nbsp;
							<a href="http://pinterest.com/fashionsponge/" target="_"><img src="images/pin-small.png" /></a>&nbsp;&nbsp;&nbsp;
						</td>
						<td align=right> <a href="http://darionmccoy.com" target="_blank" style="color:#d20e0e;font-family:helvetica;font-size:12px" >DESIGN BY DARIONMCCOY</a> </td>
					</table>
					<br><br><br>
				</div>	
				
			</div>
		</div>
	</div>
	
</body>
</html>












<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
											<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
											<script>!window.jQuery && document.write(unescape('%3Cscript src="jquery/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>
											<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
											<script>!window.jQuery.ui && document.write(unescape('%3Cscript src="jquery/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>
											<!-- mousewheel plugin -->
											<script src="jquery.mousewheel.min.js"></script>
											<!-- custom scrollbars plugin -->
											<script src="jquery.mCustomScrollbar.js"></script>
											<script>
												(function($){
													$(window).load(function(){
														$(".content_2").mCustomScrollbar({
														});
													});
												})(jQuery);
												
												$(".content_2").mCustomScrollbar({
												});
											</script>

