
			<?php
				require("connect.php");
				
				//echo "mno:".$_SESSION['mno'];
				$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno order by pl.plno desc limit ".$_GET['from'].",".$_GET['to'].""; //where  mno=".$_SESSION['mno'];
				$ex = mysql_query($q) or die(mysql_error());
				$i=1;
				while($r = mysql_fetch_array($ex))
				{
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
											<img class='look' onclick=\"window.location='lookdetails.php?id=$r[0]'\" src='images/members/posted looks/wookmark_$r[0].jpg' />
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
					
				}
			
			?>