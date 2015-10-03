
	<?php 
		$_SESSION["mno"]=809;
	?>
		<table style="width:974px;" border=0 style="border-collapse:collapse;font-family:arial" id="tableContainer" >
			<td style="width:650px;" valign=top >
				<a name='look' ></a>

					<?php
					
						
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno and plno=".$_GET['id'].""; //where  mno=".$_SESSION['mno'];
						
						
						$ex = mysql_query($q) or die(mysql_error());
						$r = mysql_fetch_array($ex);
						$postedby=$r[1];
						
						$i=1;
						$mno1=$r[1];
						$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]") or die(mysql_error());
						$rr= mysql_fetch_array($xx);
								
						$xxx=mysql_query("select count(rating) from ratings where plno=$r[0]") or die(mysql_error());
						$rrr= mysql_fetch_array($xxx); 
						
						$xxxx=mysql_query("select count(*) from posted_looks_comments where plno=$r[0]") or die(mysql_error());
						$rrrr= mysql_fetch_array($xxxx); 
						
						$x5=mysql_query("select count(*) from pl_loves where plno=$r[0]") or die(mysql_error());
						$r5= mysql_fetch_array($x5);
						
						$hsN="style='display:none'";
									$hsP="style='display:none'";
									
									$next="";
									$prev="";
									$qq = mysql_query("select * from postedlooks where plno > ".$_GET['id']." order by plno asc") or die(mysql_error());
									if($rq=mysql_fetch_array($qq)){
										$next="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
										$hsN="style='display:block'";
									}
									else{
										$qq = mysql_query("select * from postedlooks where plno < ".$_GET['id']." order by plno asc") or die(mysql_error());
										if($rq=mysql_fetch_array($qq)){
											$next="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
											$hsN="style='display:block'";
										}
									}
									
									$qq = mysql_query("select * from postedlooks where plno < ".$_GET['id']." order by plno desc") or die(mysql_error());
									if($rq=mysql_fetch_array($qq)){
										$prev="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
										$hsP="style='display:block'";
									}
									else{
										$qq = mysql_query("select * from postedlooks where plno > ".$_GET['id']. " order by plno desc") or die(mysql_error());
										if($rq=mysql_fetch_array($qq)){
											$prev="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
											$hsP="style='display:block'";
										}
									}
									
									$nextA="";
									$prevA="";
									
									$qq = mysql_query("select * from postedlooks where mno=$postedby and plno > ".$_GET['id']." order by plno asc") or die(mysql_error());
									if($rq=mysql_fetch_array($qq)){
										$nextA="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
										$hsN="style='display:block'";
									}
									else{
										$qq = mysql_query("select * from postedlooks where mno=$postedby and plno < ".$_GET['id']." order by plno desc") or die(mysql_error());
										if($rq=mysql_fetch_array($qq)){
											$nextA="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
											$hsN="style='display:block'";
										}
									}
									
									
									$qq = mysql_query("select * from postedlooks where mno=$postedby and plno < ".$_GET['id']." order by plno desc") or die(mysql_error());
									if($rq=mysql_fetch_array($qq)){
										$prevA="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
										$hsP="style='display:block'";
									}
									else{
										$qq = mysql_query("select * from postedlooks where mno=$postedby and plno > ".$_GET['id']. " order by plno asc") or die(mysql_error());
										if($rq=mysql_fetch_array($qq)){
											$prevA="onclick=\"window.location='lookdetails.php?id=$rq[0]#look'\"";
											$hsP="style='display:block'";
										}
									}
									?>

									<!-- new image view  -->

									<?php



									
									
						echo "<div style=\"padding:0 5px 5px 5px;\">
							<table width=100% style=\"border-collapse:collapse;padding:5px;font:15px helveticaBold;border-top:1px solid black;border-bottom:1px solid #aaa;\">
								<td width=*% id='td_lookName' ><a type=button style=\" text-decoration: none;foreground:black;border:0;background:none;font:bold 13px arial;cursor:pointer;padding:0\" href='http://fashionsponge.com/fs/'><font color='000000'>back to looks</font></a></td>
								<td width=120 align=right valign=center style='padding:5px 0 5px 0' > &laquo; <input $prev type=button value='PREV' style=\"border:0;background:none;font:bold 13px arial;cursor:pointer;padding:0\" /> &nbsp;&nbsp;<input $next type=button value='NEXT' style=\"border:0;background:none;font:bold 13px arial;cursor:pointer;padding:0\" /> &raquo; </td>
							</table>
						</div>";
						
						echo"
						
							<table border=0 width=100%>
								<tr>
								<td>
								<div style='border:0;padding:3px;' id='divContainer' >
									<table width=100% border=0 style='border:collapse:collapse' >
										";
									
									
									
									echo"<td  valign=top width=80% style='cursor:pointer'>
											<br>
											
											<div style='position:absolute;z-index:1000;display:none;' id='div_rate'>
											<div style='position:absolute;'>
												<div style=\"overflow:hidden;font:bold 12px 'helvetica';padding:10px;width:250px;position:relative;left:75px;top:195px;background:url('images/trans-back.png');width:465px;color:white\">
													

													<b style=\"font:bold 15px 'helvetica'\">".$r["lookName"]."</b>
													<br><br>
													".$r["lookAbout"]."<br>
													<br><br>
													Posted on ".$r["date_"]."
												</div>
											</div>";
											?>

											<script type="text/javascript">
												$('#divContainer').mouseenter(function(){
													// alert('mouse move at div rate!');
													$('#div_rate').css('display','block');
												})
												$('#divContainer').mouseleave(function(){
													// alert('mouse move at div rate!');
													$('#div_rate').css('display','none');
												})



											</script>

											<?php 
												echo "<div class='rate' id='div_rate1' style='left:10px;top:-10px;position:relative;background:white;padding:5px;border:1px solid #848484; ' > 
													<div style='padding:15px 2px 15px 2px;background:#02c7ea;font:bold 18px arial'>".@round(($rr[0]/($rrr[0]*5))*100)."%</div><Br>
													<span style='padding:5px;background:none;font:bold 15px arial;color:#3b3b3b'>&nbsp;RATE</span>
													<input type=button value=5 id='r5' onclick=\"ratethis($r[0],5)\"  />
													<input type=button value=4 id='r4' onclick=\"ratethis($r[0],4)\"  />
													<input type=button value=3 id='r3' onclick=\"ratethis($r[0],3)\"  />
													<input type=button value=2 id='r2' onclick=\"ratethis($r[0],2)\"  />
													<input type=button value=1 id='r1' onclick=\"ratethis($r[0],1)\"  />
													<input type=button id='r0'  onclick=\"dripthis($r[0])\" value='&nbsp;' style=\"border:0;background:url('images/buttons/drip-big.png') center no-repeat; \" />
													<input type=button id='r01'  		onclick=\"lovethis($r[0])\" value='&nbsp;' style=\"border:0;background:url('images/buttons/love-big.png') center no-repeat; \" />
													<center>";

													// echo "<a href=\"javascript:window.open('http://fashionsponge.com/fs/images/members/posted looks/$r[0].jpg','_blank')\" >";
													echo "
														<input title='Zoom' type=image src='images/buttons/zoom.jpg' /></a><div style='padding:2px;' ></div>
														<input title='Email' type=image src='images/buttons/email.jpg' /><div style='padding:2px;' ></div>
														<input title='Embed' type=image src='images/buttons/embed.jpg' /><div style='padding:2px;' ></div>
														<input title='Flag' type=image src='images/buttons/flag.jpg' />
													</center>
												</div>
											</div>
											
											<div style='position:absolute;display:none;' id='div_corner' >
												<div style=\"left:10px;top:-10px;position:relative;width:75px;height:10px;background:url('images/corner.png') right no-repeat;\"></div>
											</div>
											
											
											<div $nextA >
												<style>
													.prev{
														position:relative;
														//left:-1px;
														background:url('images/prev.png') center no-repeat;
														width:34px; height:46px;
													}
													.prev:hover{
														//background:url('images/prev over.png');
													}
													.next{
														position:relative;
														//right:-1px;
														background:url('images/next.png') center no-repeat;
														width:34px; height:46px;
													}
													.next:hover{
														//background:url('images/next over.png');
														//right:-2px;
													}
												</style>
												<table id='pn' style='position:absolute;border-collapse:collapse;display:none' >
													<td valign=center > <div class='prev' $prevA $hsP title='Show older look' >&nbsp;</div> </td>
													<td valign=center align=right ><div class='next' $nextA $hsN title='Show newer look'  >&nbsp;</div></td>
												</table>
												<div id='divTag'>
													";
													$qq=mysql_query("select * from pltags where plno=$r[0]") or die(mysql_error());
													$i=1;
													while($rr=mysql_fetch_array($qq)){
																													
														echo"<div style='position:absolute;' >
														<span class='tagSpan'  onmousemove=\"fadeIn('sp$rr[0]');\" onmouseout=\"fadeOut('sp$rr[0]');\"
																style=\"
																	background:$rr[2];
																	left:".($rr[3])."px;
																	top:".($rr[4]+52)."px;
																\">$i
																<span id='sp$rr[0]' style='background:$rr[2];left:245px; top:355px; position:fixed' >";
																if($rr[5]!="" && $rr[5]!="Brand")
																	echo "Brand: <b>$rr[5]</b><br>";
																if($rr[6]!="" && $rr[6]!="Garment")
																	echo "Garment: <b>$rr[6]</b><br>";
																if($rr[7]!="" && $rr[7]!="Material")
																	echo "Material: <b>$rr[7]</b><br>";
																if($rr[8]!="" && $rr[8]!="Pattern")
																	echo "Pattern: <b>$rr[8]</b><br>";
																if($rr[9]!="" && $rr[9]!="Occasion")
																	echo "Occasion: <b>$rr[9]</b><br>";
																if($rr[10]!="" && $rr[10]!="Season")
																	echo "Season: <b>$rr[10]</b><br>";
																echo"
																</span>
															</span></div>";
														$i++;
													}
													echo"
												</div>";
												
												//==== orig ==== >echo"<img src='images/members/posted looks/$r[0].jpg' id='imgTag' title='".$r["lookName"]."' />";
												/*==TEMP==*/echo"<img src='images/members/posted looks/$r[0].jpg' width=560 id='imgTag' title='".$r["lookName"]."' />";
												
												
												echo"	
													<br>";
											
											$colors=split(" ",$r["lookColor"]);
											if(count($colors)<1)
												$colors=split("\|",$r["lookColor"]);
											
											echo"<div><table width=100%  style='height:20px;border-collapse:collapse' class='tdcolors' >";
												for($i=0;$i<count($colors);$i++){
													// echo "<td onclick=\"window.location='searchbycolor.php?color=".str_replace("#","",$colors[$i])."'\" width=*% height=30 style='background:".$colors[$i]."' title='$colors[$i]' >&nbsp;</td>";
													echo "<td onclick=\"\" width=*% height=30 style='background:".$colors[$i]."' title='$colors[$i]' >&nbsp;</td>";
												}												
											echo"
												</table></div>".
												//strtoupper($r["lastname"].", ".$r["firstname"])
												//." Says:</b><br>".$r["lookAbout"]
												"
											</div>
										</td>";?>
										

<!-- end new image view  -->





<!-- new right content and footer-->


<td valign=top> 








											<br>
											<script>
												function showPN(){
													var imgL = getID("imgTag");
													var pn = getID("pn");
													pn.style.height = imgL.offsetHeight;							
													pn.style.width = imgL.offsetWidth;	
													pn.style.display="block";
												}
											</script>
											
											<style>
												.tagSpan{
													background:black;
													color:white;
													font:bold 10px arial;
													position:absolute;
													//position:relative;
													padding:2px;
													border-radius:15px;
													width:15px;
													height:15px;
													text-align:center;
													opacity:.7;
												}
												
												.share span{
													position:absolute;z-index:-100;
												}
												.share span div{
													position:relative;top:-55px;
													height:43px;width:66px;background:url('images/buttons/score.png');
													font:bold 12px arial;
													text-align:center;
												}
												.share span div p { line-height: 35px; }
												
												.hr{
													background:#cfcfcf;height:2px;
													//box-shadow: 		0px 0px 3px 0px #cfcfcf;
													//-moz-box-shadow:    0px 0px 3px 0px #cfcfcf;
													//-webkit-box-shadow: 0px 0px 3px 0px #cfcfcf;
												}
												
												
											</style>



				<!-- paste here -->
								<?php
									require("socialnet.php");
								?>
				<!-- until here -->
										<?php echo"											
										</td>
									</table>
								</div>
								</td>
								</tr>
								<tr>
									
								</tr>
								
								<!--<meta name='description' content='".$r["lookAbout"]."' />
								<title>".$r["lookName"]."</title>-->
							</table>
							<a name=view></a>
						</div>
						";
							
					?>
			<a name="view"></a>
			<br><br>
			
			<table style="border-collapse:collapse;border-bottom:1px solid #ccc;width:100%">
				<td style="border-bottom:1px solid #ccc;padding:0 0 0 40px;width:1%">&nbsp;</td>
				<td id='td_0' onclick="jump('lookdetails.php?id=<?php echo $_GET["id"]; ?>#view');" style="cursor:pointer;border:1px solid #ccc;width:20%;text-align:center;padding:5px;font:bold 12px helveticaBold;color:white;background:black">COMMENTS
				<?php 
				$ex=mysql_query("	select * from posted_looks_comments plc, fs_members m where 
												m.mno=plc.mno and plc.plno=".$_GET['id']." order by plc.plcno desc"
								)or die(mysql_error());
							$count=mysql_num_rows($ex);
							echo "(".$count.")"; ?>
				<td>
				<td style="border-bottom:1px solid #ccc;width:1%">&nbsp;</td>
				<td id='td_1' onclick="jump('lookdetails.php?page=1&id=<?php echo $_GET["id"]; ?>#view');" style="cursor:pointer;border:1px solid #ccc;border-bottom:1px solid #ccc;width:20%;text-align:center;padding:5px;font:bold 12px helveticaBold;color:white;background:black">LOVES
				<?php 
				$ex=mysql_query("	select * from pl_loves plc, fs_members m where 
												m.mno=plc.mno and plc.plno=".$_GET['id']." order by plc.pllno desc"
								)or die(mysql_error());
							$count=mysql_num_rows($ex);
							echo "(".$count.")"; ?>
							<td>
				<td  style="border-bottom:1px solid #ccc;width:1%">&nbsp;</td>
				<td id='td_2' onclick="jump('lookdetails.php?page=2&id=<?php echo $_GET["id"]; ?>#view');"style="cursor:pointer;border:1px solid #ccc;border-bottom:1px solid #ccc;width:20%;text-align:center;padding:5px;font:bold 12px helveticaBold;color:white;background:black">DRIPS
				<?php 
				$ex=mysql_query("	select * from pl_drips plc, fs_members m where 
												m.mno=plc.mno and plc.plno=".$_GET['id']." order by plc.pldno desc"
								)or die(mysql_error());
							$count=mysql_num_rows($ex);
							echo "(".$count.")"; ?>
				<td>
				<td width=50%>&nbsp;</td>
			</table>
			<br><br>
			
			<?php
				$page=$_GET["page"];
				if($page=="")
					$page=0;
					
				Echo"
					<script>
						getID('td_".$page."').style.background='white';
						getID('td_".$page."').style.color='black';
						getID('td_".$page."').style.borderBottom='1px solid white';
					</script>
				
				";
				
				
				$page=0;
				if($_GET["page"]!="")
					$page=$_GET["page"];
				
				switch($page){
					case 0:
						// require("look-comments.php");
						break;
					case 1:
						// require("look-loves.php");
						break;
					case 2:
						// require("look-drips.php");
						break;
				}
			?>
				

			</td>
			<td width=20 ></td>
			<style>
				.title{padding:5px;background:black;color:white;font:bold 12px arial;border:0}
			</style>
			<td valign=top style="">
				
				<div class="title">POSTED BY</div>
				<div style="padding:20px 0 0 0;">
					<table style="border-collapse:collapse;">
						<?php
							$f1=@mysql_fetch_array(@mysql_query("select count(*) from friends where mno2=$postedby and status=1"));
							$looks=mysql_fetch_array(mysql_query("select count(*) from postedlooks where mno=$postedby"));
								
							$q = "select * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno and fs.mno=$postedby ";
							$pb = mysql_query($q)or die(mysql_error());
							$pbr = mysql_fetch_array($pb);
						?>
						<tr><td valign=top>
							<?php 
								echo "<a href='#'>";
									if($pbr["ispicset"]!=0)
										echo"<img src='images/members/$postedby.jpg' width=80 />";
									else
										echo"<img src='images/members/0.jpg' width=80 />";
								echo"
								</a>";
							?></td>
						<td valign=top style="">
					<form method=post>
						<?php
								
								echo "<center><a href='#' style='color:black;font:15px helveticaBold;text-decoration:none'>".strtoupper($pbr["firstname"]." ".$pbr["lastname"])."</a> <br>
									<div style='padding:3px'></div>
									<span align='center' style='font:bold 10px helvetica;' > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $f1[0] FOLLOWERS | $looks[0] LOOKS | RATING </span>
									<br><br>
									";
									
								if($_SESSION["mno"]!=$postedby){
									echo"<center>";
										$gfq=mysql_query("select * from friends where mno1=".$_SESSION["mno"]." and mno2=".$postedby)or die(mysql_error());
										if(!mysql_fetch_array($gfq)){
											echo"
												<input type=submit name='b_follow' value='+FOLLOW' style=\"cursor:pointer;background:#000;border:0;padding:6px 3px 6px 3px;color:#fff;font:bold 12px helvetica;\" />
											";
										}else{
											echo"
												<input type=submit name='b_unfollow' value='-UNFOLLOW' style=\"cursor:pointer;background:#000;border:0;padding:6px 3px 6px 3px;color:#fff;font:bold 12px helvetica;\" />
											";
										}
										echo"<input onclick=\"msgBox('visible')\" type=button value='MESSAGE' style=\"cursor:pointer;background:#000;border:0;padding:6px 3px 6px 3px;color:#fff;font:bold 12px helvetica;\" />";
											
									echo"</center>";
								}
								
						
								$ws=str_replace("https://www.","",$pbr["website"]);
								$ws=str_replace("http://www.","",$ws);
								$ws=str_replace("https://","",$ws);
								$ws=str_replace("http://","",$ws);
								$ws=str_replace("www.","",$ws);
								
							$recepient=$postedby;
						 
							?>
							
							<?php
								require("messenger.php");
							?>
							










<!-- side content -->



					</form>
						</td></tr>
						<tr><td colspan=2>
							<?php
								
								
								if(isset($_POST["b_follow"])){
									mysql_query("insert into friends values(0,".$_SESSION["mno"].",".$postedby.",0)")or die(mysql_error());
									jump("lookdetails.php?id=".$_GET["id"]);
								}
								elseif(isset($_POST["b_unfollow"])){
									mysql_query("delete from friends where mno1=".$_SESSION["mno"]." and mno2=".$postedby)or die(mysql_error());
									jump("lookdetails.php?id=".$_GET["id"]);
								}
							?>
					
					<?php 
					


					 	$activity_posted_info=get_id_look_owner($_GET["id"]);
					 


			
 						$res = select('fs_members',18,array('mno',$activity_posted_info[0][1])); 




					//  echo "Get =  $_GET[id] <br>";
					 // print_r($res);
					//  $sharp=strpos($_GET,'#');
					//  $id=substr($_GET['id'],0,$sharp);
					// echo "final $id <br>";



					?>
					<!-- website and blog -->
					</td></tr><tr>
					<?php if(!empty($res[0][5])) {  ?>
						<td colspan=2><span class="link_site" >My Site: <?php  echo '<a target =  href="#">'.$res[0][5].'</a><br>'; ?> </span> </td></tr>				
					<?php }else{  ?>
						<td colspan=2><span class="link_site" >My Site: <?php  echo '<a target =  href="#">None</a><br>'; ?> </span> </td></tr>				
					<?php } ?>
					<?php if(!empty($res[0][12])) {  ?>
						<td colspan=2><span class="link_site" >My Blog: <?php  echo '<a target =  href="#">'.$res[0][12].'</a>';   ?> </span> </td></tr>
					<?php }else{ ?>
						<td colspan=2><span class="link_site" >My Blog: <?php  echo '<a target =  href="#">None</a><br>'; ?> </span> </td></tr>				
					<?php } ?>
					


					</table>
				</div>
				
				<style type="text/css">
					
					.adds{ }
					
					.adds td{ background-color: #dbdbdb; height: 125px; width: 125px; border: 1px solid #ccc;   }
					
					.adds td:hover{ cursor: pointer;

					} 
				</style>
				
				<table class="adds" border=0 width="100%" cellspacing=5 >
					<?php 






					// $asd_id=rand(5, 15);
					// select($tableName,$tablen,$where=null,$orderby=null,$limit=null)		
					// $ads=select('ads',7,array('ano',$asd_id));	
					// print_r($ads);
					$ads=select('ads',7);	
					// print_r($ads);
					for ($i=0; $i < 6 ; $i++) { 
						$a=$i+1;
						echo "<td> <a  title='".$ads[$i][4]."' href='".$ads[$i][4]."' target='_blank' /><img width=125 height=125 src='images/ads/".$ads[$i][0].".".$ads[$i][5]."' /></a></td> ";
						if ($a%2==0) {
							echo "<tr>";
						}
					}
					?>
				</table>






				<table width=100%>
					<td valign=top >
						<?php
							// $i=1;
							// $q=mysql_query("select * from ads order by ano desc")or die(mysql_error());
							// while($rs=mysql_fetch_array($q)){
							// 	if($i%2==1)
							// 		echo "<a href=' #' /><img width=125 src='images/ads/$rs[0].gif' /></a> <br> <br>";
							// 	$i++;
							// }
						?>
					</td>
					<td valign=top >
						<?php
							// $i=1;
							// $q=mysql_query("select * from ads order by ano desc")or die(mysql_error());
							// while($rs=mysql_fetch_array($q)){
							// 	if($i%2==0)
							// 		echo "<a href='#' /><img width=125 src='images/ads/$rs[0].gif' /></a> <br> <br>";
							// 	$i++;
							// }
						?>
					</td>
				</table>
				



				
				<style>
					.tombstone td{
						/*font:12px arial;*/
						/*width:20%;*/
						/*padding:5px;*/
						/*background-color: #dbdbdb;*/
					}
					
					.tombstone td:hover{
						cursor:pointer;
					}
					
					.tombstone td{
						background:white;
						text-align: center;
					}
					.tombstone img{
						vertical-align:middle;
						/*position:relative;*/
					}
					.tombstone{
						border-collapse:collapse;

					}

				</style>
				<div class="title">PREVIOUS LOOKS</div>
				<br>
				<table class="tombstone" style='' cellspacing=1 border=0 width=100% >
				<?php

				$count=0;

				for ($h=0; $h < 100 ; $h++) { 

					if ($count < 6) {						 
						//echo "mno:".$_SESSION['mno'];
						$q = "SELECT * from postedlooks where mno=$mno1 order by plno desc limit 0,6 ";
						$ex = mysql_query($q) or die(mysql_error());
						$i=0;
						$mno1-=1;
						
				 
						while($r = mysql_fetch_array($ex))
						{
							if (!empty($r[0])) {

								$i++;
								// echo"<tr>";
								$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]");
								$rr= mysql_fetch_array($xx);
								echo"
									<td valign=top align=left onclick=\"window.location='lookdetails.php?id=$r[0]'\" >
										<img title='$r[3]' src='images/members/posted looks/$r[0].jpg' style='width:137px' />
									</td> 
								";

							
								// $i++;
								// if($r=mysql_fetch_array($ex))
								// {
								// 	$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]");
								// 	$rr= mysql_fetch_array($xx);
								// 		echo"
								// 		<td valign=top align=right onclick=\"window.location='lookdetails.php?id=$r[0]'\" >
								// 			<img title='$r[3]' src='images/members/posted looks/$r[0].jpg' style='width:150px' />
											 
								// 		</td>
								// 	";
								// 	$i++;
									
								// }
								// else
								// {
								// 	echo "<td></td>";
								// }
								
								
								// echo"</tr>";
								// echo"<tr><td colspan=6 >&nbsp;</td></tr>";

								$count++;
								if ($count%2==0) {
									echo "<tr><td><br></td><td><br></td><tr>";
								} 
							}
						}	 
					} else $h=100;
				}

						echo"
						</table>	
						<br>
						<center>";
							$qq=mysql_query("select count(*) from postedlooks where mno=$mno1") or die(mysql_error());
							if(($rq=mysql_fetch_array($qq))){
								//if($rq[0]>6)
									//echo"<input type=button value='More Looks' style=\"background:#148794;color:white;padding:10px;font:bold 15px arial;border:0;cursor:pointer\" />";
							}
							echo"
							
							
							
						</center>
						
						";
			
					
				?>
				<br>
				<div class="title">PEOPLE WITH SIMILAR INTEREST</div>
				<br>

				<form method=post>
					<?php
						$plq="select * from fs_members fs where fs.mno<>".$_SESSION['mno']." ";
						$pl=mysql_query($plq)or die(mysql_error());
						while($plr=mysql_fetch_array($pl)){
							//both $gfq=mysql_query("select * from friends where (mno1=".$_SESSION["mno"]." and mno2=".$plr[0].") or (mno2=".$_SESSION["mno"]." and mno1=".$plr[0].")")or die(mysql_error());
							$gfq=mysql_query("select * from friends where (mno1=".$_SESSION["mno"]." and mno2=".$plr[0].")")or die(mysql_error());
							if(!mysql_fetch_array($gfq)){
								echo"<table><td valign=top>";
								if($plr["ispicset"]!=0)
									echo"<a href='profile.php?id=$plr[0]'> <img src='images/members/$plr[0].jpg' width=80 /></a>";
								else
									echo"<a href='profile.php?id=$plr[0]'> <img src='images/members/0.jpg' width=80 /> </a>";
								
								echo"</td><td valign=top>";
									
								$f1=mysql_fetch_array(mysql_query("select count(*) from friends where mno2=$plr[0] and status=1"));
								$looks=mysql_fetch_array(mysql_query("select count(*) from postedlooks where mno=$plr[0]"));
								
								echo "<a href='profile.php?id=$plr[0]' style='text-decoration:none;color:black;font:15px helveticaBold'>".strtoupper($plr["firstname"]." ".$plr["lastname"])."</a><br>
									<span style='font:bold 10px helvetica;' >$f1[0] FOLLOWERS | $looks[0] LOOKS | RATING</span>
									";
									
								echo"	<br><input type=submit name='b_follow$plr[0]' value='+FOLLOW' style=\"cursor:pointer;background:#000;border:0;padding:6px 10px 6px 10px;color:#fff;font:bold 12px helvetica;\" />
								</td></tr>
								";
								$ws=str_replace("https://www.","",$plr["website"]);
								$ws=str_replace("http://www.","",$ws);
								$ws=str_replace("https://","",$ws);
								$ws=str_replace("http://","",$ws);
								$ws=str_replace("www.","",$ws);
								
								if($ws)
									echo"<tr><td colspan=2><span style='font:bold 11px arial'>My Site:<a style='text-decoration:none;color:black' href='http://www.$ws' target='_'>$ws</a></span></td></tr>";
								echo"</table>
								<br>
								";
								$ctr++;
							}
							
								if(isset($_POST["b_follow$plr[0]"])){
									mysql_query("insert into friends values(0,".$_SESSION["mno"].",".$plr[0].",0)")or die(mysql_error());
									jump("lookdetails.php?id=".$_GET["id"]);
								}
							
							if($ctr>=5)
								break;
						}
						
					?>
					</form>	
				
				</td>
			<!-- end right content and footer-->

		</table>
 
		
<?php unset($_SESSION["mno"]); ?>