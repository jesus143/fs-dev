			
			<?php
				/*
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
				*/
				require("connect.php");
				
				//echo "mno:".$_SESSION['mno'];
				$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=".$_GET['owner']." and pl.mno=fm.mno order by pl.plno desc limit ".$_GET['from'].",".$_GET['to'].""; //where  mno=".$_SESSION['mno'];
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
								color:#000
							}
						</style>
					";
						
					echo"
							<li >
								<div onmouseover=\"showRate($r[0],'block')\" onmouseout=\"showRate($r[0],'none')\" >
									<div style='position:absolute;display:none;' id='rate$r[0]'>
										<div style='position:absolute;'>
											<div style='position:relative;left:44px;top:-20px;'><img src='images/corner.png' /></div>
										</div>
										<div style='position:absolute;'>
											<div style=\"overflow:hidden;font:bold 12px 'arial';padding:10px;width:150px;position:relative;left:50px;top:15px;background:url('images/trans-back.png');color:white\">
												<b style=\"font:bold 15px 'arial'\">".$r["lookName"]."</b>
												<br><br>
												".$r["lookAbout"]."<br>
												Tags: Polka Dot; Brand; <br>
												Other<br>
												Price: $89<br>
												Where: Name of Store<br><br>

												Posted on ".$r["date_"]."<br>
												04:15 pm
											</div>
										</div>
										<div class='rate' style='background:white;WIDTH:35px;padding:1px;position:relative;left:5px;top:-20px;border:1px solid #6d6d6d' >
											<div style=\"padding:5px 2px 5px 2px;background:#02c7ea;font:bold 15px 'arial';color:#fff\">".@round(($rr[0]/($rrr[0]*5))*100)."%</div>
											<div style=\"padding:0px;background:white;font:bold 11px 'helvetica (TT)';color:#3b3b3b\">RATE</div>
											<div id='r5' onclick=\"ratethis($r[0],5)\">5</div>
											<div id='r4' onclick=\"ratethis($r[0],4)\" >4</div>
											<div id='r3' onclick=\"ratethis($r[0],3)\" >3</div>
											<div id='r2' onclick=\"ratethis($r[0],2)\" >2</div>
											<div id='r1' onclick=\"ratethis($r[0],1)\" >1</div>
													
											<div style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
											<div onclick=\"lovethis($r[0])\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
										</div>
									</div>
									<table border=0 width=100% >
										<td valign=top >
											<div>
												<img onclick=\"window.location='lookdetails.php?id=$r[0]'\" src='images/members/posted looks/$r[0].jpg' style='width:287px' />
											</div>
										</td>
									</table>
									<div style='padding:5px;'></div>
									<table width=100% class='stands'>
										<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>
										<td style='padding:5px;'>
											<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
											<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
											<table style='width:auto;color:#454545;font:11px helvetica'>
												<td><b>0</b></td><td><img src='images/drip.png' height=10 /></td>
												<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
												<td> | OVERALL RATING <b>".@round($rsqr[0]/($rsqc[0]*5)*100)."</b>%</td>
											</table>
										</td>
										<td valign=center ><br><img src='images/look-icon.png' /></td>
									</table>
								</div>
							</li>
						";
					$i++;
				}
			
			?> 
			
			
			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			