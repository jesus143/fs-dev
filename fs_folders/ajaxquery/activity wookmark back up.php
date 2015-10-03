			<?php
				require("connect.php");
				$page=$_GET["page"];
				$to=$page*20;
				$from=$to-20;
				$rows=20;
				
				//$q = "SELECT * from activity act where act.action='posted' or act.action='joined' order by act.ano desc limit $from,$rows "; 
				//$q = "SELECT * from activity act where act.action='posted' order by act.ano desc limit $from,$rows ";
				
				$q = "SELECT * from activity act where act.action='posted' order by act.ano desc limit $from,$rows"; 
					$ex = mysql_query($q) or die(mysql_error());
					//echo"<li >page:$page from:$from to:$to - records:".mysql_num_rows($ex)."</li>";
					while($r=mysql_fetch_array($ex))
					{
						if($r["action"]=="Posted" || $r["action"]=="posted" ){
							$plq=mysql_query("select * from postedlooks where plno=".$r["_table_id"])or die(mysql_error());
							$rsplq= mysql_fetch_array($plq);
							
							$memq=mysql_query("select * from fs_members fs,fs_member_accounts fa  where fs.mno=fa.mno and fs.mno=".$r["mno"])or die(mysql_error());
							$rsmemq=mysql_fetch_array($memq);
							
							$xx=mysql_query("select sum(rating) from ratings where plno=".$r["_table_id"]) or die(mysql_error());
							$rr= mysql_fetch_array($xx);
								
							$xxx=mysql_query("select count(rating) from ratings where plno=".$r["_table_id"]) or die(mysql_error());
							$rrr= mysql_fetch_array($xxx);
							
							$xxxx=mysql_query("select count(*) from posted_looks_comments where plno=".$r["_table_id"]) or die(mysql_error());
								$rrrr= mysql_fetch_array($xxxx);
							
							$x5=mysql_query("select count(*) from pl_loves where plno=".$r["_table_id"]) or die(mysql_error());
							$r5= mysql_fetch_array($x5);
							
							
							
							
							$qr=mysql_query("select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=".$r["mno"]);
							$rsqr=mysql_fetch_array($qr);
							
							$qc=mysql_query("select count(*) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=".$r["mno"]);
							$rsqc=mysql_fetch_array($qc);
							
							$ql=mysql_query("select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=".$r["mno"]);
							$qd=mysql_query("select count(*) from pl_drips l, postedlooks pl where pl.plno=l.plno and pl.mno=".$r["mno"]);
							$rsql=mysql_fetch_array($ql);
							$rsqd=mysql_fetch_array($qd);
							
							$qf=mysql_query("select count(*) from friends f where mno2=".$r["mno"]);
							$rsqf=mysql_fetch_array($qf);
							
							$qff=mysql_query("select count(*) from friends f where mno1=".$r["mno"]);
							$rsqff=mysql_fetch_array($qff);
							echo "
								<style>
									.stands b{
										color:#000
									}
								</style>
							";
							
							echo"
								<li >
									<div onmouseover=\"showRate($rsplq[0],'block')\" onmouseout=\"showRate($rsplq[0],'none')\" >
										<div style='position:absolute;display:none;' id='rate$rsplq[0]'>
											<div style='position:absolute;'>
												<div style='position:relative;left:44px;top:-20px;'><img src='images/corner.png' /></div>
											</div>
											<div style='position:absolute;'>
												<div style=\"overflow:hidden;font:bold 12px 'helvetica';padding:10px;width:150px;position:relative;left:50px;top:15px;background:url('images/trans-back.png');color:white\">
													<b style=\"font:bold 15px 'helvetica'\">".$rsplq["lookName"]."</b>
													<br><br>
													".$rsplq["lookAbout"]."<br>
													<br><br>
													Posted on ".$rsplq["date_"]."
												</div>
											</div>
											<div class='rate' style='background:white;WIDTH:35px;padding:1px;position:relative;left:5px;top:-20px;border:1px solid #6d6d6d' >
												<div style=\"padding:5px 2px 5px 2px;background:#02c7ea;font:bold 15px 'helvetica';color:#fff\">".@round(($rr[0]/($rrr[0]*5))*100)."%</div>
												<div style=\"padding:0px;background:white;font:12px helveticaBold;color:#3b3b3b\">RATE</div>
												<div id='r5' onclick=\"ratethis($rsplq[0],5)\">5</div>
												<div id='r4' onclick=\"ratethis($rsplq[0],4)\" >4</div>
												<div id='r3' onclick=\"ratethis($rsplq[0],3)\" >3</div>
												<div id='r2' onclick=\"ratethis($rsplq[0],2)\" >2</div>
												<div id='r1' onclick=\"ratethis($rsplq[0],1)\" >1</div>
														
												<div onclick=\"dripthis($rsplq[0])\" style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
												<div onclick=\"lovethis($rsplq[0])\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
											</div>
										</div>
										<table border=0 width=100% >
											<td valign=top align=center >
												<div>";
												echo"<a href='lookdetails.php?id=$rsplq[0]'><img src='images/members/posted looks/$rsplq[0].jpg' style='width:287px' /></a></div>";
												
											echo"
											</td>
										</table>
										<div style='padding:5px;'></div>
										<table width=100% class='stands'>";
											if($rsmemq["ispicset"]==1)
												echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>";
												
											else
												echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/0.jpg' width=50 /></a></td>";
												
										echo"	
											<td style='padding:5px;'>
												<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
												<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
												<table style='width:auto;color:#454545;font:bold 10px helvetica'>
													<td><b>$rsqd[0]</b></td><td><img src='images/drip.png' height=10 /></td>
													<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
													<td> | OVERALL RATING <b>".@round($rsqr[0]/($rsqc[0]*5)*100)."</b>%</td>
												</table>
											</td>
											<td valign=center ><br><img src='images/look-icon.png' /></td>
										</table>
									</div>
								</li>						
							";
						}
						elseif($r["action"]=="Joined" || $r["action"]=="joined"){
					/*
						$plq=mysql_query("select * from postedlooks where plno=".$r["_table_id"])or die(mysql_error());
						$rsplq= mysql_fetch_array($plq);
						
						$memq=mysql_query("select * from fs_members fs,fs_member_accounts fa  where fs.mno=fa.mno and fs.mno=".$r["mno"])or die(mysql_error());
						$rsmemq=mysql_fetch_array($memq);
						
						$qr=mysql_query("select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=".$r["mno"]);
						$rsqr=mysql_fetch_array($qr);
						
						$qc=mysql_query("select count(*) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=".$r["mno"]);
						$rsqc=mysql_fetch_array($qc);
						
						$ql=mysql_query("select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=".$r["mno"]);
						$rsql=mysql_fetch_array($ql);
						
						$qf=mysql_query("select count(*) from friends f where mno2=".$r["mno"]);
						$rsqf=mysql_fetch_array($qf);
						
						$qff=mysql_query("select count(*) from friends f where mno1=".$r["mno"]);
						$rsqff=mysql_fetch_array($qff);
						echo "
							<style>
								.stands b{
									font-family:helveticaBold;
								}
							</style>
						";
					
						echo"
							<li >
								<div  >";
									if($rsmemq["ispicset"]==1)
										echo"<a href='".$rsmemq["username"]."'><img width=100% src='images/members/".$rsmemq["mno"].".jpg'  /></a><br>";
									else
										echo"<a href='".$rsmemq["username"]."'><img width=100% src='images/members/0.jpg'  /></a><br>";
									
									echo"		
									<div style='padding:5px;'></div>
									<table width=100% class='stands'>";
										if($rsmemq["ispicset"]==1)
											echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>";
										else
											echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/0.jpg' width=50 /></a></td>";
									echo"
										<td style='padding:5px;'>
											<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
											<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
											<table style='width:auto;color:#454545;font:bold 10px helvetica'>
												<td><b>0</b></td><td><img src='images/drip.png' height=10 /></td>
												<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
												<td> | OVERALL RATING <b>$rsqc[0]</b></td>
											</table>
										</td>
										<td valign=center ><br><img src='images/person.jpg' /></td>
									</table>
								</div>
							</li>						
						";
					*/
					}
			/*========= ADZ 		
					if($i%5==0 ){
						echo"
							<li >
								<table width=100% style='height:300px;' ><td height=100% style='vertical-align:middle' align=center > <span style='font:80px helvetica;'>AD</span>
									<br><span style='font:15px helvetica;'>This is a reserved section for ADZ</span>
								</td></table>
							</li>
						";
					}
			*/
			/*		
					if($i%8==0 ){
						echo"
							<li >
								<div >
								<center>
									<img width=100% src='images/bags.jpg'  /><br>
									<span style='font:15px helvetica;'>This is a reserved section for products.</span>
								</center>
									<div style='padding:5px;'></div>
									<table width=100%>
										<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>
										<td style='padding:5px;'>
											<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
											<span style='color:#454545;font:10px arial' >0 FOLLOWERS | FOLLOWING 0</span>
											<table style='width:auto;color:#454545;font:bold 10px arial'>
												<td>0</td><td><img src='images/drip.png' height=10 /></td>
												<td> | 0</td><td><img src='images/love.png' height=10 /></td>
												<td> | OVERALL RATING ".@round(($rr[0]/($rrr[0]*5))*100)."%</td>
											</table>
										</td>
										<td valign=center ><br><img src='images/products.jpg' /></td>
									</table>
								
								</div>	
								
							</li>	
						";
					}
			*/
					
					$i++;
				}
						
			?>
			
			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
							
	<?php
		/* NEW HOMEPAGE CANCELLED
				if($r["action"]=="Posted" || $r["action"]=="posted" ){
						$plq=mysql_query("select * from postedlooks where plno=".$r["_table_id"])or die(mysql_error());
						$rsplq= mysql_fetch_array($plq);
						
						$memq=mysql_query("select * from fs_members fs,fs_member_accounts fa  where fs.mno=fa.mno and fs.mno=".$r["mno"])or die(mysql_error());
						$rsmemq=mysql_fetch_array($memq);
						
						$xx=mysql_query("select sum(rating) from ratings where plno=".$r["_table_id"]) or die(mysql_error());
						$rr= mysql_fetch_array($xx);
							
						$xxx=mysql_query("select count(rating) from ratings where plno=".$r["_table_id"]) or die(mysql_error());
						$rrr= mysql_fetch_array($xxx);
						
						$xxxx=mysql_query("select count(*) from posted_looks_comments where plno=".$r["_table_id"]) or die(mysql_error());
							$rrrr= mysql_fetch_array($xxxx);
						
						$x5=mysql_query("select count(*) from pl_loves where plno=".$r["_table_id"]) or die(mysql_error());
						$r5= mysql_fetch_array($x5);
						
						echo"
							<li >
								<table border=0 width=100%>
									<tr><td> <div style='background:#148794;padding:5px 2px 5px 2px;font:bold 12px arial;color:white;text-align:center' >".@round(($rr[0]/($rrr[0]*5))*100)."%</div> </td>
									<td><div style='padding:5px 0 5px 0;font:bold 10px arial;color:#555'><b style='font:17px calibri;color:black'><a href='lookdetails.php?id=$rsplq[0]' style='text-decoration:none;'>".$rsplq["lookName"]."</a></b><br>BY <a href='".$rsmemq["username"]."' style='text-decoration:none;'>".strtoupper($rsmemq["lastname"].", ".$rsmemq["firstname"])."</a></b><br></div></td></tr>
									<tr>
									<tr><td></td>
									<td>
										<table style='color:#3b3b3b;font:12px arial'>
										
											<td ><b>$rrrr[0]</b> COMMENTS</td><td valign=center >| <b>0</b></td><td valign=center ><img src='images/drip.png' width=13 /></td><td>|&nbsp;&nbsp;</td><td valign=center width=1><b>$r5[0]</b></td><td valign=center ><img src='images/love.png' width=13 /></td><td>|&nbsp;&nbsp;</td>
											<td><b>";
											$date2=date("Y-m-d");
											$date1=$rsplq["date_"];
											$diff = abs(strtotime($date2) - strtotime($date1));
												
											$years = floor($diff / (365*60*60*24));
											$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
											$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
											if($days==1)
												$m="</b>YESTERDAY";
											elseif($days==0)
												$m="</b>TODAY";
											else
												$m="$days</b> DAYS AGO";
												
										echo" $m</b>
											</td> 
										</table>
									</td>
									</tr>
									<td valign=center >
										<div class='rate' style='WIDTH:27px;padding:5px' >
											<div style='padding:0px;background:white;font:bold 9px arial;color:#3b3b3b'>RATE</div>
											<div id='r5' onclick=\"ratethis($rsplq[0],5)\">5</div>
											<div id='r4' onclick=\"ratethis($rsplq[0],4)\" >4</div>
											<div id='r3' onclick=\"ratethis($rsplq[0],3)\" >3</div>
											<div id='r2' onclick=\"ratethis($rsplq[0],2)\" >2</div>
											<div id='r1' onclick=\"ratethis($rsplq[0],1)\" >1</div>
											
											<div style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
											<div onclick=\"lovethis($rsplq[0])\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
										</div>
									</td>
									<td valign=top>
										<div>
											<img class='look' onclick=\"window.location='lookdetails.php?id=$rsplq[0]'\" src='images/members/posted looks/$rsplq[0].jpg' />
										</div>
									</td>
								</tr>
							</table>
							</li>
						";	
					}
					elseif($r["action"]=="Joined" || $r["action"]=="joined"){
							if($_SESSION["mno"]!=""){
								if($r[1]!=$_SESSION["mno"]){
									$memq=mysql_query("select * from fs_members fs,fs_member_accounts fa  where fs.mno=fa.mno and fs.mno=".$r["mno"])or die(mysql_error());
									$rsmemq=mysql_fetch_array($memq);
									echo"
											<li >
												<table border=0 width=100%>
													<tr>
														<td><div style='padding:5px 0 5px 0;font:bold 12px arial'><b><a href='".$rsmemq["username"]."' style='text-decoration:none;'>".strtoupper($rsmemq["lastname"].", ".$rsmemq["firstname"])."</a></b><br></div></td></tr>
													<tr>
													<tr>
														<td>
															<table style='color:#3b3b3b;font:9px arial;border-collapse;'>
																<td style='border-right:1px solid #3b3b3b'>1434 FOLLOWERS</td>
																<td align=center style='border-right:1px solid #3b3b3b'>FOLLOWING 213 |</td>
																<td align=center > CONTACT MEMBER</td>
															</table>
														</td>
													</tr>
													<tr><td>
														<table style='color:#3b3b3b;font:10px arial'>
															<td valign=center ><b>50</b></td><td valign=center ><img src='images/drip.png' width=13 /></td><td>|&nbsp;&nbsp;</td><td valign=center width=1><b>$r5[0]</b></td><td valign=center ><img src='images/love.png' width=13 /></td><td>|&nbsp;&nbsp;</td></td><td>OVERALL RATING <b>87%</b></td>        
														</table>
													</td></tr>
												<tr>
													<td valign=top>
														<br>
													<form method=post>
														<div ><center>
															<a href='".$rsmemq["username"]."' ><img class='look' src='images/members/".$r["mno"].".jpg' /></a>
															<br>";
															$fr=mysql_query("select * from friends where (mno2=".$r[1]." and mno1=".$_SESSION['mno'].") or (mno1=".$r[1]." and mno2=".$_SESSION['mno'].")") or die(mysql_error());
															if($frRS=mysql_fetch_array($fr)){
																if($frRS[3]==0 && $frRS[2]==$_SESSION["mno"])
																	echo"<input class='follow' name='btnAp$r[0]' type='submit'  value='APPROVE'  />";
																else if($frRS[3]==0 && $frRS[1]==$_SESSION["mno"])
																	echo"<input class='follow' name='btnW$r[0]' type='button' disabled value='WAITING FOR APPROVAL'  />";
																else if($frRS[3]==1)
																	echo"<input class='follow' name='btnU$r[0]' type='submit' value='UNFOLLOW'  />";
															}
															else
																echo"<input class='follow' type='submit' name='btnF$r[0]' value='FOLLOW'  />";
														
															if(isset($_POST["btnU".$r[0]])){
																mysql_query("delete from friends where fno=$frRS[0]") or die(mysql_error());
																jump("index.php");
															}
															else if(isset($_POST["btnF".$r[0]])){
																mysql_query("insert into friends values(0,".$_SESSION['mno'].",".$r[1].",0)") or die(mysql_error());
																jump("index.php");
															}
															else if(isset($_POST["btnAp".$r[0]])){
																mysql_query("update friends set status=1 where fno=$frRS[0] ") or die(mysql_error());
																jump("index.php");
															}
														echo"
														</div>
													</form>
													</td>
												</tr>
											</table>
										</li>
									";	
								}
							}
					}
			
		*/
		
	?>
<?php
	/*
					$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]") or die(mysql_error());
					$rr= mysql_fetch_array($xx);
						
					$xxx=mysql_query("select count(rating) from ratings where plno=$r[0]") or die(mysql_error());
					$rrr= mysql_fetch_array($xxx);
					
					$xxxx=mysql_query("select count(*) from posted_looks_comments where plno=$r[0]") or die(mysql_error());
						$rrrr= mysql_fetch_array($xxxx);
					
					$x5=mysql_query("select count(*) from pl_loves where plno=$r[0]") or die(mysql_error());
					$r5= mysql_fetch_array($x5);
						
					echo"
							<li >
								<table border=0 width=100%>
									<tr><td> <div style='background:#148794;padding:5px 2px 5px 2px;font:bold 12px arial;color:white;text-align:center' >".@round(($rr[0]/($rrr[0]*5))*100)."%</div> </td>
									<td><div style='padding:5px 0 5px 0;font:bold 10px arial;color:#555'><b style='font:17px calibri;color:black'><a href='lookdetails.php?id=$r[0]' style='text-decoration:none;'>".$r["lookName"]."</a></b><br>BY <a href='profile.php?id=".$r["mno"]."' style='text-decoration:none;'>".strtoupper($r["lastname"].", ".$r["firstname"])."</a></b><br></div></td></tr>
									<tr>
									<tr><td></td>
									<td>
										<table style='color:#3b3b3b;font:12px arial'>
										
											<td ><b>$rrrr[0]</b> COMMENTS</td><td valign=center >| <b>0</b></td><td valign=center ><img src='images/drip.png' width=13 /></td><td>|&nbsp;&nbsp;</td><td valign=center width=1><b>$r5[0]</b></td><td valign=center ><img src='images/love.png' width=13 /></td><td>|&nbsp;&nbsp;</td>
											<td><b>";
											$date2=date("Y-m-d");
											$date1=$r["date_"];
											$diff = abs(strtotime($date2) - strtotime($date1));
												
											$years = floor($diff / (365*60*60*24));
											$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
											$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
											if($days==1)
												$m="1</b> DAY AGO";
											elseif($days==0)
												$m="</b>TODAY";
											else
												$m="$days</b> DAYS AGO";
												
										echo" $m</b>
											</td> 
										</table>
									</td>
									</tr>
									<td valign=center >
										<div class='rate' style='WIDTH:27px;padding:5px' >
											<div style='padding:0px;background:white;font:bold 9px arial;color:#3b3b3b'>RATE</div>
											<div id='r5' onclick=\"ratethis($r[0],5)\">5</div>
											<div id='r4' onclick=\"ratethis($r[0],4)\" >4</div>
											<div id='r3' onclick=\"ratethis($r[0],3)\" >3</div>
											<div id='r2' onclick=\"ratethis($r[0],2)\" >2</div>
											<div id='r1' onclick=\"ratethis($r[0],1)\" >1</div>
											
											<div style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
											<div onclick=\"lovethis($r[0])\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
										</div>
									</td>
									<td valign=top>
										<div>
											<img class='look' onclick=\"window.location='lookdetails.php?id=$r[0]'\" src='images/members/posted looks/$r[0].jpg' />
										</div>
									</td>
								</tr>
							</table>
							</li>
						";
					$i++;
					if($i%2==0)
					{
						if($r = mysql_fetch_array($ex))
						{
							if($_SESSION["mno"]!=""){
								if($r[1]!=$_SESSION["mno"]){
									$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]") or die(mysql_error());
									$rr= mysql_fetch_array($xx);
										
									$xxx=mysql_query("select count(rating) from ratings where plno=$r[0]") or die(mysql_error());
									$rrr= mysql_fetch_array($xxx);
									
									$x5=mysql_query("select count(*) from pl_loves where plno=$r[0]") or die(mysql_error());
									$r5= mysql_fetch_array($x5);
									
									echo"
											<li >
												<table border=0 width=100%>
													<tr>
														<td><div style='padding:5px 0 5px 0;font:bold 12px arial'><b><a href='profile.php?id=".$r["mno"]."' style='text-decoration:none;'>".strtoupper($r["lastname"].", ".$r["firstname"])."</a></b><br></div></td></tr>
													<tr>
													<tr>
														<td>
															<table style='color:#3b3b3b;font:9px arial;border-collapse;'>
																<td style='border-right:1px solid #3b3b3b'>1434 FOLLOWERS</td>
																<td align=center style='border-right:1px solid #3b3b3b'>FOLLOWING 213 |</td>
																<td align=center > CONTACT MEMBER</td>
															</table>
														</td>
													</tr>
													<tr><td>
														<table style='color:#3b3b3b;font:10px arial'>
															<td valign=center ><b>50</b></td><td valign=center ><img src='images/drip.png' width=13 /></td><td>|&nbsp;&nbsp;</td><td valign=center width=1><b>$r5[0]</b></td><td valign=center ><img src='images/love.png' width=13 /></td><td>|&nbsp;&nbsp;</td></td><td>OVERALL RATING <b>87%</b></td>        
														</table>
													</td></tr>
												<tr>
													<td valign=top>
														<br>
													<form method=post>
														<div ><center>
															<img class='look' src='images/members/".$r["mno"].".jpg' onclick=\"window.location='profile.php?id=".$r["mno"]."' \" />
															<br>";
															$fr=mysql_query("select * from friends where (mno2=".$r[1]." and mno1=".$_SESSION['mno'].") or (mno1=".$r[1]." and mno2=".$_SESSION['mno'].")") or die(mysql_error());
															if($frRS=mysql_fetch_array($fr)){
																if($frRS[3]==0 && $frRS[2]==$_SESSION["mno"])
																	echo"<input class='follow' name='btnAp$r[0]' type='submit'  value='APPROVE'  />";
																else if($frRS[3]==0 && $frRS[1]==$_SESSION["mno"])
																	echo"<input class='follow' name='btnW$r[0]' type='button' disabled value='WAITING FOR APPROVAL'  />";
																else if($frRS[3]==1)
																	echo"<input class='follow' name='btnU$r[0]' type='submit' value='UNFOLLOW'  />";
															}
															else
																echo"<input class='follow' type='submit' name='btnF$r[0]' value='FOLLOW'  />";
														
															if(isset($_POST["btnU".$r[0]])){
																mysql_query("delete from friends where fno=$frRS[0]") or die(mysql_error());
																jump("index.php");
															}
															else if(isset($_POST["btnF".$r[0]])){
																mysql_query("insert into friends values(0,".$_SESSION['mno'].",".$r[1].",0)") or die(mysql_error());
																jump("index.php");
															}
															else if(isset($_POST["btnAp".$r[0]])){
																mysql_query("update friends set status=1 where fno=$frRS[0] ") or die(mysql_error());
																jump("index.php");
															}
														echo"
														</div>
													</form>
													</td>
												</tr>
											</table>
										</li>
									";	
								}
							}
						}
						$i++;
					}
					if($i%3==0)
					{
						if($r = mysql_fetch_array($ex))
						{
							$xx=mysql_query("select sum(rating) from ratings where plno=$r[0]") or die(mysql_error());
							$rr= mysql_fetch_array($xx);
								
							$xxx=mysql_query("select count(rating) from ratings where plno=$r[0]") or die(mysql_error());
							$rrr= mysql_fetch_array($xxx);
							
							$x5=mysql_query("select count(*) from pl_loves where plno=$r[0]") or die(mysql_error());
							$r5= mysql_fetch_array($x5);
					
							echo"
									<li >
										<table border=0 width=100%>
											<tr>
												<td rowspan=3>
													<a href='profile.php?id=".$r['mno']."' ><img width=50 src='images/members/$r[1].jpg' /></a>
												</td>
												<td>
													<div style='font:bold 12px arial'><b><a href='profile.php?id=".$r['mno']."' >".strtoupper($r['lastname'].", ".$r['firstname'])."</a></b></div>
													<div style='font:bold 10px arial'> ADDED <b>";
														$date2=date("Y-m-d");
														$date1=$r["date_"];
														$diff = abs(strtotime($date2) - strtotime($date1));
															
														$years = floor($diff / (365*60*60*24));
														$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
														$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
														if($days==1)
															$m=" 1</b> DAY AGO";
														elseif($days==0)
															$m="</b>TODAY";
														else
															$m="$days</b> DAYS AGO";
															
														echo" $m</b>
													</div>
												</td>
											</tr>
											<tr>
											<tr>
												<td >
												<table style='color:#3b3b3b;font:10px arial'>
													<td valign=center ><b>50</b></td><td valign=center style='border-right:1px solid #848484'><img src='images/drip.png' width=13 /></td><td>&nbsp;&nbsp;</td><td valign=center width=1><b>$r5[0]</b></td><td valign=center style='border-right:1px solid #848484' ><img src='images/love.png' width=13 /></td><td>&nbsp;&nbsp;</td></td><td>TOTAL BLOGS <b>120</b></td>        
												</table>
											</td></tr>
										<tr>
											<td valign=top colspan=2>
												<br>
												<table>
													<tr><td>
														<img align=left onclick=\"window.location='lookdetails.php?id=$r[0]'\" width='120px' src='images/members/posted looks/$r[0].jpg' />
														<b style='font:bold 12px arial;color:#b054a8'>The Blog Title Here<br></b>
														<b style='font:bold 10px arial;color:#b054a8'>WWW.WEBSITE.COM</b><br>
														<b style='font:bold 11px arial;color:#5e5e5e'>This is a description about this blog
														<div style='' ></div>
													</td></tr>
													<tr><td>
														<br>
														<div><center>
															<input style='padding:2px 10px 2px 10px;border:1px solid #a9a9a9' type='image' value='DRIP' src='images/drip-b.png' />
															<input onclick=\"lovethis($r[0])\" style='padding:2px 10px 2px 10px;border:1px solid #a9a9a9' type='image' value='LOVE' src='images/love-b.png' />
														</div>
													</td></tr>
												</table>
											</td>
										</tr>
									</table>
									</li>
								";
						}
						$i++;
					}
	
	
	
	*/

?>