<?php 
				require ("design.php");
				require ("../library.php");	
				

			
// print_r($plinfo['rated_look_cmonth']);
// print_r($plinfo['not_rated_look_cmonth']);
// print_r($plinfo['all_look_cmonth']);
// print_r($plinfo['top_rated_look_cmonth']);
// print_r($plinfo['most_viewed_look']);
// print_r($plinfo['newest_look']);
// print_r($plinfo['oldest_look']);
// print_r($plinfo['most_discussed_look']);




				function look_views($access) 
				{ 

					$mc = new myclass();
					if ($access[0]=='home') 
					{
						$look =get_all_look_latest();
						 // $look = set_latest_look();
						// $look[4][0]='1.jpg';
						// echo "string";
						// $look = set_latest_look( );
					} 

					else if ($access[0]=='ratealook') 
					{ 

					 	if (($_SESSION['rate_Show_Me']==1 or empty($_SESSION['rate_Show_Me'])) and 
						 		($_SESSION['rate_That_I'] == 1  or empty($_SESSION['rate_That_I'])) and 
						 		($_SESSION['rate_Sort_By'] == 1  or empty($_SESSION['rate_Sort_By'])))
					 	{
						 		$look =all_look_i_have_rated('newest');
						 		// $_SESSION['sort_alihr']='newest';
						 	    $_SESSION['sort_alihr']='oldest';
							    echo "Show me (all looks) That i (have rated) sort by (newest)";
							    $location='all_looks';
							    // $stat='rated'
							    print_r($look);
						}
						else if (($_SESSION['rate_Show_Me']==1 or empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I'] == 1  or empty($_SESSION['rate_That_I'])) and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{
								 $look = all_look_i_have_rated('oldest');
								 // $_SESSION['sort_alihr']='oldest';
								 $_SESSION['sort_alihr']='newest';
								 echo "Show me (all looks) That i (have rated) sort by (oldest)";
								 $location='all_looks';
								 print_r($look);
								 // $stat='rated'
						}
						else if (($_SESSION['rate_Show_Me']==1 or empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I'] == 2  and !empty($_SESSION['rate_That_I'])) and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or empty($_SESSION['rate_Sort_By'])))
						{ 
								  # Show me (all looks) That i (have not rated) sort by (newest)
								  echo "Show me (all looks) That i (have not rated) sort by (newest)";
								  // $_SESSION['sort_alihnr']='newest';
								  $_SESSION['sort_alihnr']='oldest';
								  $look = all_look_i_have_not_rated($_SESSION['sort_alihnr']);
								  $location='all_looks';
								  print_r($look);
								  // $stat='not rated'
						}
						else if (($_SESSION['rate_Show_Me']==1 or empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I'] == 2  and !empty($_SESSION['rate_That_I'])) and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{ 
							      # Show me (all looks) That i (have not rated) sort by (oldest)
								  echo "Show me (all looks) That i (have not rated) sort by (oldest)";
								  // $_SESSION['sort_alihnr']='oldest';
								  $_SESSION['sort_alihnr']='newest';
								  $look = all_look_i_have_not_rated($_SESSION['sort_alihnr']);
								  $location='all_looks';
								  print_r($look);
								  // $stat='not rated'
						}				
						else if (($_SESSION['rate_Show_Me']==2 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I'] == 1 or empty($_SESSION['rate_That_I'])) and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or empty($_SESSION['rate_Sort_By'])))
						{ 
							      # Show me (all looks) That i (have not rated) sort by (newest)
								  echo "Show me (Top rated) That i (have rated) sort by (newest)";
								  // $_SESSION['trlihr']='newest';
								  $_SESSION['trlihr']='oldest';
								  $look = topratedlook_i_have_rated($_SESSION['trlihr']);
								  echo " count = ". count($look).'<br>';
								  $location='top_rated';
								  print_r($look);
								  // $stat='rated'
						}	
						else if (($_SESSION['rate_Show_Me'] == 2 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 1 or   empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By']))){ 
							      # Show me (all looks) That i (have not rated) sort by (oldest)
								  echo "Show me (Top rated) That i (have rated) sort by (oldest)";
								  // $_SESSION['trlihr']='oldest';
								   $_SESSION['trlihr']='newest';
								  $look = topratedlook_i_have_rated($_SESSION['trlihr']);
								  echo " count = ". count($look).'<br>';
								   $location='top_rated';
								   print_r($look);
								   // $stat='rated'
						}	
						else if (($_SESSION['rate_Show_Me'] == 2 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or   empty($_SESSION['rate_Sort_By'])))
						{ 
							      # Show me (all looks) That i (have not rated) sort by (oldest)
								  echo "Show me (Top rated) That i (have not rated) sort by (newest)";
								  // $_SESSION['trlihnr']='newest';
								  $_SESSION['trlihnr']='oldest';
								  $look = topratedlook_i_have_not_rated($_SESSION['trlihnr']);
								  echo " count = ". count($look).'<br>';
								   $location='top_rated';
								   print_r($look);
								   // $stat='not rated'
						}
						else if (($_SESSION['rate_Show_Me'] == 2 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{ 
							      # Show me (all looks) That i (have not rated) sort by (oldest)
								  echo "Show me (Top rated) That i (have not rated) sort by (oldest)";
								  // $_SESSION['trlihnr']='oldest';
								  $_SESSION['trlihnr']='newest';
								  $look = topratedlook_i_have_not_rated($_SESSION['trlihnr']);
								  echo " count = ". count($look).'<br>';
								   $location='top_rated';
								   print_r($look);
								   // $stat='not rated'
						}	
						else if (($_SESSION['rate_Show_Me'] == 3 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 1 or  empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or  empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Viewed) That i (have rated) sort by (newest)";
								  // $_SESSION['mvihr']='newest';
								   $_SESSION['mvihr']='oldest';
								  $look = most_viewed_i_have_rated($_SESSION['mvihr']);
								  echo " count = ". count($look).'<br>';
								   $location='most_viewed';
								   print_r($look);
								   // $stat='rated'
						}	
						else if (($_SESSION['rate_Show_Me'] == 3 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 1 or   empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Viewed) That i (have rated) sort by (oldest)";
								  // $_SESSION['mvihr']='oldest';
								  $_SESSION['mvihr']='newest';
								  $look = most_viewed_i_have_rated($_SESSION['mvihr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_viewed';
								  print_r($look);
								  // $stat='rated'
						}		
						else if (($_SESSION['rate_Show_Me'] == 3 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or   empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Viewed) That i (have not rated) sort by (newest)";
								  // $_SESSION['mvihnr']='newest';
								  $_SESSION['mvihnr']='oldest';
								  $look = most_viewed_i_have_not_rated($_SESSION['mvihnr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_viewed';
								  print_r($look);
								  // $stat='rated'
						}
						else if (($_SESSION['rate_Show_Me'] == 3 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))

						{ 
								  echo "Show me (Most Viewed) That i (have not rated) sort by (oldest)";
								  // $_SESSION['mvihnr']='oldest';
								  $_SESSION['mvihnr']='newest';	
								  $look = most_viewed_i_have_not_rated($_SESSION['mvihnr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_viewed';
								  print_r($look);
								  // $stat='rated'
						}		
						else if (($_SESSION['rate_Show_Me'] == 4 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 1 or  empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or  empty($_SESSION['rate_Sort_By'])))

						{ 
								  echo "Show me (Most Discussed) That i (have rated) sort by (newest)";
								  // $_SESSION['mdihr']='newest';
								  $_SESSION['mdihr']='oldest';
								  $look = most_discussed_i_have_rated($_SESSION['mdihr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_discussed';
								  print_r($look);
								  // $stat='rated'
						}
						else if (($_SESSION['rate_Show_Me'] == 4 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 1 or   empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Discussed) That i (have rated) sort by (oldest)";
								  // $_SESSION['mdihr']='oldest';
							      $_SESSION['mdihr']='newest';
								  $look = most_discussed_i_have_rated($_SESSION['mdihr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_discussed';
								  print_r($look);
								  // $stat='rated'
						}
						else if (($_SESSION['rate_Show_Me'] == 4 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 1 or   empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Discussed) That i (have not rated) sort by (newest)";
								  // $_SESSION['mdihnr']='newest';
								  $_SESSION['mdihnr']='oldest';
								  $look = most_discussed_i_have_not_rated($_SESSION['mdihnr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_discussed';
								  print_r($look);
								  // $stat='rated'
						}
						else if (($_SESSION['rate_Show_Me'] == 4 and !empty($_SESSION['rate_Show_Me'])) and 
					 		     ($_SESSION['rate_That_I']  == 2 and !empty($_SESSION['rate_That_I']))  and 
					 		     ($_SESSION['rate_Sort_By'] == 2 and !empty($_SESSION['rate_Sort_By'])))
						{ 
								  echo "Show me (Most Discussed) That i (have not rated) sort by (oldest)";
								  // $_SESSION['mdihnr']='oldest';
								  $_SESSION['mdihnr']='newest';
								  $look = most_discussed_i_have_not_rated($_SESSION['mdihnr']);
								  echo " count = ". count($look).'<br>'; 
								  $location='most_discussed';
								  print_r($look);
								  // $stat='rated'
						}
						 if ($_SESSION['rate_That_I'] == 2) {
				   	    $stat='not rated';
				   	    // echo "not rated";
				   		}else { 
					   	    $stat='rated';
					   	    // echo "rated";
					   }

				   }
				


				   if (empty($look[0]) or empty($look[0][0])) {
				   		// echo "looks are empty";
				   }else{  

						$look=insert_adds($look,get_all_ads_id());
						 for ($i=0; $i < count($look); $i++) { 
						 	echo "$i .) plno = ".$look[$i][0]." value = ".$look[$i][1].'<br>';
						 }					

				   		$mc = new myclass();
					    $tm=$mc->top_member();
					    $initpage = $access[1];	
					    $endpage = $access[1]+6;

					     // $_SESSION['Tuser'] = count($tm) ;
					     // $_SESSION['pageNum'] = $initpage;
					     if ($initpage < count($look) ) {
					     	# code...
							for ($i=$initpage; $i < $endpage; $i++) { 
								if( $i < count($look)) { 
									if ( $look[$i][1]=='ads') {							 
										 	
										ads($look[$i][0]);  
									}
									else {  

										// if (count($look[0])>1) {
										// if ($location == 'most_viewed') {
										// 	$plno = $look[$i][0];
										// 	$Trate = get_1look_percentage($plno,$stat);
										// }else {  
											$plno = $look[$i][0];
											// $Trate = get_1look_percentage($plno,$stat);
											$Trate = get_ownlook_total_ratings($plno);
										// }
											// $Trate = $look[$i][1];
											// echo " plno = $plno and Trate = $Trate<br>";
											// get_1look_percentage(940,'rated');
										// }else{  

										// 	$plno = $look[$i];
										// 	// echo "1d";
										// }

										$plinfo = $mc->posted_look_info($plno);
										$mno = $plinfo['mno'];
										$mem_info = $mc->user($mno);

										echo "
											<style>
												.stands b{
													color:#000
												}
											</style>
										";
										
										echo"
											<li >
												<div onmouseover=\"showRate($plno,'block')\" onmouseout=\"showRate($plno,'none')\" >
													<div style='position:absolute;display:none;' id='rate$plno'>
														<div style='position:absolute;'>
															<div style='position:relative;left:44px;top:-20px;'><img src='images/corner.png' /></div>
														</div>
														<div style='position:absolute;'>
															<div style=\"overflow:hidden;font:bold 12px 'helvetica';padding:10px;position:relative;left:50px;top:15px;background:url('images/trans-back.png');width:218px;color:white\">
																<b style=\"font:bold 15px 'helvetica'\">".$plinfo["lookName"]."</b>
																<br><br>
																".$plinfo["lookAbout"]."<br>
																<br><br>
																Posted on ".$plinfo["date_"]."
															</div>
														</div>


														<div class='rate' style='background:white;WIDTH:35px;padding:1px;position:relative;left:5px;top:-20px;border:1px solid #6d6d6d' >
															
															<div style=\"padding:5px 2px 5px 2px;background:#02c7ea;font:bold 11px 'helvetica';color:#fff\">$Trate%</div>
															
															<div style=\"padding:0px;background:white;font:12px helveticaBold;color:#3b3b3b\">RATE</div>
															

															<div id='r5' onclick=\"ratethis($plno,5)\">5</div>
															<div id='r4' onclick=\"ratethis($plno,4)\" >4</div>
															<div id='r3' onclick=\"ratethis($plno,3)\" >3</div>
															<div id='r2' onclick=\"ratethis($plno,2)\" >2</div>
															<div id='r1' onclick=\"ratethis($plno,1)\" >1</div>
																	
															<div onclick=\"dripthis($plno)\" style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
															<div onclick=\"lovethis($plno)\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
														</div>
													</div>
													<table border=0 width=100% >
														<td valign=top align=center >
															<div>";
															// look posted

															// echo"<a href='lookdetails.php?id=$plno'><img src='images/members/posted looks/$plno.jpg' style='width:287px;height:450px'  /></a>";

															echo"<a href='lookdetails.php?id=$plno'><img src='images/members/posted looks/home/$plno.jpg' style='width:287px;height:450px'  /></a>";



															echo "</div>";
															
														echo"
														</td>
													</table>
													<div style='padding:5px;'></div>
													<table width=100% class='stands' border=0>";
														if(file_exists("../images/members/$mno.jpg")){
															echo"<td width=1><a  ><img src='images/members/".$mno.".jpg' width=50px height=53px style='margin-top:6px;' /></a></td>";
														}else{
															 echo"<td width=1><a ><img src='images/members/0.jpg' width=50px height=53px style='margin-top:6px;' /></a></td>";
														}

													echo"	
														<td style='padding:5px;'> " ;
															// echo "<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>";
														echo "<a  style='color:#454545;font:12px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$mem_info["firstname"]." ".$mem_info["lastname"]." </a> <span style='font-size:11px'>posted a new look </span><br>
															
															<span style='color:#454545;font:11px helvetica; font-weight:bold;' >".$plinfo['tlrates']." Rates |  Ratings ".$Trate."%</span>
															
															<table style='width:auto;color:#454545;font:bold 11px helvetica' border=0>
																<td > <b>$plinfo[tldrips]</b></td><td><img  title='drip' src='images/drip.png' height=10 /></td>
																<td > | <b>$plinfo[tllove]</b></td><td><img title='love' src='images/love.png' height=10 /></td>
																<td> |  ".$plinfo['tlcomments']." Comments</b></td> 
																 
															</table>";
															// <span style='font-size:11px;font-weight:bold'> [$access[1] i=$i]".get_look_tview($plno)." total Views</span>
															echo "<span style='font-size:11px;font-weight:bold'> ".get_look_tview($plno)." total Views</span>";
															echo "
														</td>
														<td valign=center ><br><img src='images/look-icon.png' /></td>
													</table>
												</div>
											</li>						
										";
									}
								}
							}   
					   }
					}
				}		
				function home($access) { 

					$mc = new myclass();
					

					// if ( $i1%6==0 ) {							 
						 	
					// 		ads($i1); // and number 6 nga look gi ilisan ani nga ads to be fixed..
					// }			
					if ($access[0]=='home') {
								$q = "SELECT * from activity act where act.action='Posted' order by act._table_id desc limit $access[1],11"; 
						
					}

 						 // || $access[0]=='ratealook' 
 					// $_SESSION['rate_That_I']
 					// $_SESSION['rate_Sort_By']

 

					$ex = mysql_query($q) or die(mysql_error());
					//echo"<li >page:$page from:$from to:$to - records:".mysql_num_rows($ex)."</li>";
					while($r=mysql_fetch_array($ex))
					{

						if($r["action"]=="Posted" || $r["action"]=="posted" ){
							$j++;
							$plq=mysql_query("select * from postedlooks where plno=".$r["_table_id"])or die(mysql_error());
							$rsplq = mysql_fetch_array($plq);
							$plinfo=$mc->posted_look_info($rsplq[0]);

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
							
							// $rsplq[0] = 935;
							// $rsmemq[mno] = 133;
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
												<div style=\"overflow:hidden;font:bold 12px 'helvetica';padding:10px;position:relative;left:50px;top:15px;background:url('images/trans-back.png');width:218px;color:white\">
													<b style=\"font:bold 15px 'helvetica'\">".$rsplq["lookName"]."</b>
													<br><br>
													".$rsplq["lookAbout"]."<br>
													<br><br>
													Posted on ".$rsplq["date_"]."
												</div>
											</div>


											<div class='rate' style='background:white;WIDTH:35px;padding:1px;position:relative;left:5px;top:-20px;border:1px solid #6d6d6d' >
												
												<div style=\"padding:5px 2px 5px 2px;background:#02c7ea;font:bold 11px 'helvetica';color:#fff\">".@round(($rr[0]/($rrr[0]*5))*100)."%</div>
												
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
												// look posted

												echo"<a href='lookdetails.php?id=$rsplq[0]'><img src='images/members/posted looks/$rsplq[0].jpg' style='width:287px;height:450px'  /></a></div>";
												
											echo"
											</td>
										</table>
										<div style='padding:5px;'></div>
										<table width=100% class='stands' border=0>";
											if(file_exists("../images/members/$rsmemq[mno].jpg")){
												echo"<td width=1><a  ><img src='images/members/".$rsmemq["mno"].".jpg' width=50px height=53px style='margin-top:6px;' /></a></td>";
											}else{
												 echo"<td width=1><a ><img src='images/members/0.jpg' width=50px height=53px style='margin-top:6px;' /></a></td>";
											}

										echo"	
											<td style='padding:5px;'> " ;
												// echo "<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>";
											echo "<a  style='color:#454545;font:12px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]." </a> <span style='font-size:11px'>posted a new look </span><br>
												
												<span style='color:#454545;font:11px helvetica; font-weight:bold;' >".$plinfo['tlrates']." Rates |  Ratings ".$plinfo['tlrpercent']."%</span>
												
												<table style='width:auto;color:#454545;font:bold 11px helvetica' border=0>
													<td > <b>$plinfo[tldrips]</b></td><td><img  title='drip' src='images/drip.png' height=10 /></td>
													<td > | <b>$plinfo[tllove]</b></td><td><img title='love' src='images/love.png' height=10 /></td>
													<td> |  ".$plinfo['tlcomments']." Comments</b></td> 
													 
												</table>
												<span style='font-size:11px;font-weight:bold'>".get_look_tview($rsplq[0])."total Views</span>
											</td>
											<td valign=center ><br><img src='images/look-icon.png' /></td>
										</table>
									</div>
								</li>						
							";
						}
						elseif($r["action"]=="Joined" || $r["action"]=="joined"){
							$i++;
						}
					}
					if ( $j==11 ) {							 
						 	
							ads($j); // and number 6 nga look gi ilisan ani nga ads to be fixed..
					}	
				}		
				function topmember($page){ 

					$mc = new myclass();
				    $tm=$mc->top_member();
				    $initpage = $page;
				    $endpage = $page+6;

				     // $_SESSION['Tuser'] = count($tm) ;
				     // $_SESSION['pageNum'] = $initpage;
				     if ($initpage < count($tm) ) {
				     	# code...
						for ($i=$initpage; $i < $endpage; $i++) { 
							if( $i < count($tm)) {  
								$mno = intval($tm[$i][0]);
								$mem_info=$mc->user($mno);
								echo "
									<style>
										.stands b{
											color:#000
										}
									</style>
								";
								echo"
									<li >
										<div id='Tframe'>";	
											// echo"<div style='display:none' ><a href='".$mem_info['username']."'><img style='width:287px' src='images/members/$mno.jpg'  /></a></div>";
											if(file_exists("../images/members/$mno.jpg")){
												echo"
												<a href='".$mem_info['username']."' class='with_avatar_big' id='$mno' >
												<span id='about_with_profile'>

  													<span id='about_container';  class='a_$mno'; > 
  													</span> 
												
													<span id='accup_state';  class='a_$mno' >  
  														$mem_info[occupation] living in $mem_info[city], $mem_info[state_] 
  													</span>   					

  													<span id='about_contain';  class='a_$mno' >  
  													 	<b id='red' >About:</b>  $m$mem_info[about]  
  													</span> 

  													<span id='date_member'  class='a_$mno' > 
  														Member Since ".arrangedate($mem_info['datemember'])." 
  													</span>

												</span>												
												<img width=100% src='images/members/$mno.jpg' style='width:287px;height:300px' />
												</a>";
											}else{
												echo"
												<a href='".$mem_info['username']."' class='no_avatar_big'  id='$mno'>
												<span id='about_no_profile'>

	  												<span id='about_container';  class='a_$mno'; > 
	  												</span> 

													<span id='accup_state';  class='a_$mno' >  
	  													$mem_info[occupation] living in $mem_info[state_]  
	  												</span> 

	  												<span id='about_contain';  class='a_$mno' > 
	  													<b id='red' >About:</b>  $mem_info[about] 
	  												</span> 

	  												<span id='date_member'  class='a_$mno' >
	  													 Member Since ".arrangedate($mem_info['datemember'])." 
	  												</span>
												
												</span>
												<img width=100% src='images/members/0.jpg' style='width:287px;height:300px' />
												</a>";
											}
											echo"<div style='padding:5px;'></div>

											<table width=100% class='stands' border=0>";
												// echo"<div style='display:none' ><a href='".$mem_info["username"]."'><img width=100% src='images/members/.$mno.jpg'   /></a></div>";
												if(file_exists("../images/members/$mno.jpg")){
													echo"<td width=1><a href='$mem_info[username]'><img src='images/members/$mno.jpg'  width=50px height=50px style='margin-top:8px' /></a></td>";
												}else{ 
													echo"<td width=1><a href='$mem_info[username]'><img src='images/members/0.jpg'  width=50px height=50px style='margin-top:8px' /></a></td>";
												}
												echo"
												<td style='padding:5px;'>
													<a href='".$mem_info["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$mem_info["firstname"]." ".$mem_info["lastname"]."</a><br>
													
													<span style='color:#454545;font:10px helvetica' >
														<b>$mem_info[tfollowers]</b> Follower | Folowing <b>$mem_info[tfollowed]</b>
													</span><br>
													<span style='color:#454545;font:10px helvetica' >
														 <b>$mem_info[tplook]</b> Total Looks | Total Blog <b>0</b>
													</span> <br>
													<span style='color:#454545;font:10px helvetica' >
														<b> ".$tm[$i][3]."</b> Total Rating | OVERALL RATING <b>".$tm[$i][1]." % 
													</span> <br>";
													// <span style='color:#454545;font:10px helvetica' >
													// 	<b>".$tm[$i][2]." </b> Total Points | ".$tm[$i][3]." Total Rating
													// </span><br>
													// <table style='width:auto;color:#454545;font:bold 10px helvetica'>
													// 	<td>   <b>$mem_info[tdrip]</b></td><td><img src='images/drip.png' height=10 /></td>
													// 	<td> | <b>$mem_info[tlove]</b></td><td><img src='images/love.png' height=10 /></td>
													// 	<td> | OVERALL RATING <b>".$tm[$i][1]." %  $endpage < ".count($tm)." </b></td><tr>
													// </table>
												echo "
												</td>
												<td valign=center ><br><img src='images/person.jpg' /></td>
											</table>
											
										</div>
									</li>
								";
			 		 		}else{ 
			 		 			$i = $endpage;
			 		 		}
		 		 		}
					}
				}
				function toplook($from,$rows){ 

					$mc = new myclass();
					$date_dif=$mc->date_difference();
					

					if ($_SESSION['show']=='today') {
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno and date_ > '$date_dif[today]' order by 
							((select sum(r.rating) from ratings r where r.plno=pl.plno)+(select count(*) from pl_loves l where l.plno=pl.plno)) desc
						limit $from,$rows "; 
						
					}
					if ($_SESSION['show']=='week') {
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno and date_ > '$date_dif[last_week]' order by 
							((select sum(r.rating) from ratings r where r.plno=pl.plno)+(select count(*) from pl_loves l where l.plno=pl.plno)) desc
						limit $from,$rows "; 
						
					}
					if ($_SESSION['show']=='month') {
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno and date_ > '$date_dif[last_month]' order by 
							((select sum(r.rating) from ratings r where r.plno=pl.plno)+(select count(*) from pl_loves l where l.plno=pl.plno)) desc
						limit $from,$rows "; 
						
					}
					if ($_SESSION['show']=='year') {
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno and date_ > '$date_dif[last_year]' order by 
							((select sum(r.rating) from ratings r where r.plno=pl.plno)+(select count(*) from pl_loves l where l.plno=pl.plno)) desc
						limit $from,$rows "; 
						
					}
					if ($_SESSION['show']=='all') {
						$q = "SELECT * from postedlooks pl,fs_members fm where pl.mno=fm.mno order by 
							((select sum(r.rating) from ratings r where r.plno=pl.plno)+(select count(*) from pl_loves l where l.plno=pl.plno)) desc
						limit $from,$rows "; 
						
					}

					$ex = mysql_query($q) or die(mysql_error());
					$i=1;
					while($r = mysql_fetch_array($ex))
					{
						$plinfo=$mc->posted_look_info($r[0]);
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
												<div style=\"overflow:hidden;font:bold 12px 'arial';padding:10px;width:150px;position:relative;left:50px;top:15px;background:url('images/trans-back.png');width:218px;color:white\">
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
												<div style=\"padding:5px 2px 5px 2px;background:#02c7ea;font:bold 11px 'arial';color:#fff\">".@round(($rr[0]/($rrr[0]*5))*100)."%</div>
												<div style=\"padding:0px;background:white;font:bold 11px 'helvetica (TT)';color:#3b3b3b\">RATE</div>
												<div id='r5' onclick=\"ratethis($r[0],5)\">5</div>
												<div id='r4' onclick=\"ratethis($r[0],4)\" >4</div>
												<div id='r3' onclick=\"ratethis($r[0],3)\" >3</div>
												<div id='r2' onclick=\"ratethis($r[0],2)\" >2</div>
												<div id='r1' onclick=\"ratethis($r[0],1)\" >1</div>
														
												<div onclick=\"dripthis($r[0])\" style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
												<div onclick=\"lovethis($r[0])\"  style=\"background:white url('images/love.png') center no-repeat\">&nbsp;</div>
											</div>
										</div>
										<table border=0 width=100% >
											<td valign=top >
												<div>
													<img onclick=\"window.location='lookdetails.php?id=$r[0]'\" src='images/members/posted looks/$r[0].jpg' style='width:287px;height:450px' />
												</div>
											</td>
										</table>
										<div style='padding:5px;'></div>
										<table width=100% class='stands'>";
											if(file_exists("../images/members/$rsmemq[mno].jpg"))
												echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg'  width=50px height=53px style='margin-top:6px;' /></a></td>";
											else
												echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/0.jpg' width=50px height=53px style='margin-top:6px;' /></a></td>";
											

											echo"	
												<td style='padding:5px;'> " ;
													// echo "<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>";
												echo "<a  style='color:#454545;font:12px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]." </a> <span style='font-size:11px'>posted a new look </span><br>
													
													<span style='color:#454545;font:11px helvetica; font-weight:bold;' >".$plinfo['tlrates']." Rates |  Ratings ".$plinfo['tlrpercent']." %</span>
													
													<table style='width:auto;color:#454545;font:bold 11px helvetica' border=0>
														<td><b>$plinfo[tldrips]</b></td><td><img src='images/drip.png' height=10 /></td>
														<td> | <b>$plinfo[tllove]</b></td><td><img src='images/love.png' height=10 /></td>
														<td> |  ".$plinfo['tlcomments']." Comments</b></td> 
														 
													</table>
													<span style='font-size:11px;font-weight:bold'>".get_look_tview($r[0])." total Views</span>
												</td>
												<td valign=center ><br><img src='images/look-icon.png' /></td>
											</table>
										</div>
									</li>	
								";
						$i++;
					}
				}
				function search($q) { 
					$ex = mysql_query($q) or die(mysql_error());
					$i=1;
					while($r = mysql_fetch_array($ex))
					{
						$plq=mysql_query("select * from postedlooks where plno=".$r[0])or die(mysql_error());
								$rsplq= mysql_fetch_array($plq);
								
								$memq=mysql_query("select * from fs_members fs,fs_member_accounts fa  where fs.mno=fa.mno and fs.mno=".$r["mno"])or die(mysql_error());
								$rsmemq=mysql_fetch_array($memq);
								
								$xx=mysql_query("select sum(rating) from ratings where plno=".$r[0]) or die(mysql_error());
								$rr= mysql_fetch_array($xx);
									
								$xxx=mysql_query("select count(rating) from ratings where plno=".$r[0]) or die(mysql_error());
								$rrr= mysql_fetch_array($xxx);
								
								$xxxx=mysql_query("select count(*) from posted_looks_comments where plno=".$r[0]) or die(mysql_error());
									$rrrr= mysql_fetch_array($xxxx);
								
								$x5=mysql_query("select count(*) from pl_loves where plno=".$r[0]) or die(mysql_error());
								$r5= mysql_fetch_array($x5);
								
								
								
								
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
															
													<div style=\"background:white url('images/drip.png') center no-repeat\">&nbsp;</div>
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

												if(img_select('../images/membersr',$rsmemq["mno"])){
													// echo "profile pic found $rsmemq[mno] ";
												  	// echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>";
												  	echo"<td width=1><a  ><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>";
												}else{
													// echo "profile pic not found";
													// echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/0.jpg' width=50 /></a></td>";
													 echo"<td width=1><a ><img src='images/members/0.jpg' width=50 /></a></td>";
												}

												// if($rsmemq["ispicset"]==1)
												// 	echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/".$rsmemq["mno"].".jpg' width=50 /></a></td>";
													
												// else
												// 	echo"<td width=1><a href='".$rsmemq["username"]."'><img src='images/members/0.jpg' width=50 /></a></td>";

											echo"	
												<td style='padding:5px;'>
													<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
													<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
													<table style='width:auto;color:#454545;font:bold 10px helvetica'>
														<td><b>0</b></td><td><img src='images/drip.png' height=10 /></td>
														<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
														<td> | OVERALL RATING <b>".@round($rsqr[0]/($rsqc[0]*5)*100)."</b>%<\/td>
													</table>
												</td>
												<td valign=center ><br><img src='images/look-icon.png' /></td>
											</table>
										</div>
									</li>						
								";
								$i++;
					}
				}
?>











<?php 


	// <table width=100% class='stands'>";
	// 										if(file_exists("../images/members/$rsmemq[mno].jpg")){
	// 											echo"<td width=1><a  ><img src='images/members/".$rsmemq["mno"].".jpg' width=50px height=60px /></a></td>";
	// 										}else{
	// 											 echo"<td width=1><a ><img src='images/members/0.jpg' width=50px height=60px /></a></td>";
	// 										}

	// 									echo"	
	// 										<td style='padding:5px;'> " ;
	// 											// echo "<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>";
	// 										echo "<a  style='color:#454545;font:12px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]." </a> <span style='font-size:11px'>posted a new look </span><br>
	// 											<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
	// 											<table style='width:auto;color:#454545;font:bold 10px helvetica' border=0>
	// 												<td><b>$rsqd[0]</b></td><td><img src='images/drip.png' height=10 /></td>
	// 												<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
	// 												<td> | OVERALL RATING <b>".@round($rsqr[0]/($rsqc[0]*5)*100)."</b>%</td> 
													 
	// 											</table>
	// 											<span style='font-size:12px;font-weight:bold'>".get_look_tview($rsplq[0])." total Views</span>
	// 										</td>
	// 										<td valign=center ><br><img src='images/look-icon.png' /></td>
	// 									</table>
?>