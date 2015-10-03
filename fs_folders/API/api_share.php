											
											
											
											
											<script type="text/javascript" src="http://platform.tumblr.com/v1/share.js"></script>
											
											<table width=100% class="share">
												<td>
													<script>
														function shareAnywhere(){
															alert("This feature is under construction");
														}
													</script>
													<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
													
													<br><br>
													<?php
														
														$tweet_results = file_get_contents("http://urls.api.twitter.com/1/urls/count.json?url=http://fashionsponge.com/fs/lookdetails.php?id=".$r[0]);
														$tweet_array = json_decode($tweet_results, true);
														$tweet_count =  $tweet_array['count'];
														
														$url = urlencode($url);
														$twitterEndpoint = "http://urls.api.twitter.com/1/urls/count.json?url=http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
														$fileData = file_get_contents(sprintf($twitterEndpoint, $url));
														$json = json_decode($fileData, true);
														unset($fileData);
														
														
														$source_url = "http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
														$url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=".urlencode($source_url);
														$xml = file_get_contents($url);
														$xml = simplexml_load_string($xml);
														/*
															echo "Share --- ".$shares = $xml->link_stat->share_count;
															echo "<br/>";
															echo "Like --- ".$likes = $xml->link_stat->like_count;
															echo "<br/>";
															echo "Comments ---".$comments = $xml->link_stat->comment_count; 
															echo "<br/>";
															echo "Total --- ".$total = $xml->link_stat->total_count;
															echo "<br/>";
															echo $max = max($shares,$likes,$comments);
														*/
														
														$url = "http://fashionsponge.com/fs/lookdetails.php?id=".$r[0];
														$ch = curl_init();  
														curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
														curl_setopt($ch, CURLOPT_POST, 1);
														curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
														curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
														curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));	  
														$curl_results = curl_exec ($ch);
														curl_close ($ch);
														$parsed_results = json_decode($curl_results, true);	 
														//echo $parsed_results[0]['result']['metadata']['globalCounts']['count'];
														
														$t=array("'", "\"");
														$v=array("\'", "\\\"");
														
													?>
													<div>
														<span><div><p><?php echo $shares = $xml->link_stat->share_count; ?></p></div></span>
														<input type=image value='FB Share' src="images/buttons/fb-share.png" onclick="PopupCenter('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo str_replace($t,$v,$r["lookName"]); ?>&p[summary]=test&p[url]=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&p[images][0]=http://fashionsponge.com/fs-contest/images/members/posted looks/<?php echo $r[0]; ?>.jpg&p[via]=FashionSponge','',660,330);" />
													</div>
													<br><br><br>
													<div>
														<span ><div><p><?php echo $tweet_count; //$json["count"]; ?></p></div></span>
														<input onclick="PopupCenter('http://twitter.com/share?text=<?php echo str_replace($t,$v,$r["lookName"]); ?>\n','',660,330)" type=image value='Tweet' src="images/buttons/tweet.png" />
													</div>
													<br><br><br>
													<div>
														<span ><div><p>0</p></div></span>
														<input onclick="PopupCenter('http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ffashionsponge.com%2Ffs%2Flookdetails.php?id=<?php echo $r[0]; ?>&media=http%3A%2F%2Ffashionsponge.com%2Ffs%2Fimages%2Fmembers%2Fposted%20looks%2F<?php echo $r[0]; ?>.jpg&description=<?php echo str_replace($t,$v,$r["lookName"]); ?>','Pinit',660,330)" type=image value='Pinit' src="images/buttons/pinit.png" />
													</div>
													<br><br><br>
													
													<div>
														<span ><div><p>0</p></div></span>
														<div id="footer"></div>
													</div>
													
													<a href="http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $_GET["id"]; ?>" id="click_thru" target="_blank"></a>
													<script type="text/javascript">
														var tumblr_photo_source = document.getElementById("imgTag").src;
														var tumblr_photo_caption = document.getElementById("td_lookName").innerHTML;
														var tumblr_photo_click_thru = document.getElementById("click_thru").href;
														
														var tumblr_button = document.createElement("a");
														tumblr_button.setAttribute("href", "http://www.tumblr.com/share/photo?source=" + encodeURIComponent(tumblr_photo_source) + "&caption=" + encodeURIComponent(tumblr_photo_caption) + "&click_thru=" + encodeURIComponent(tumblr_photo_click_thru));
														tumblr_button.setAttribute("title", "Share on Tumblr");
														tumblr_button.setAttribute("style", "display:inline-block; text-indent:-9999px; overflow:hidden; width:65px; height:20px; background:url('images/buttons/thumbler.png') top left no-repeat transparent;");
														tumblr_button.innerHTML = "";
														document.getElementById("footer").appendChild(tumblr_button);
													</script>
													
													<br><br><br>
													<div>
														<span ><div><p><?php echo $parsed_results[0]['result']['metadata']['globalCounts']['count']; ?></p></div></span>
														<input onclick="PopupCenter('https://plus.google.com/share?&url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&title=<?php echo str_replace($t,$v,$r["lookAbout"]); ?>','Share to Google +',460,450)" type=image value='Google+' src="images/buttons/google+.png" />
														
													</div>
													<br><br><br>
													<div>
														<span ><div><p>0</p></div></span>
														<input onclick="PopupCenter('http://www.stumbleupon.com/submit?url=http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>&src=badge','Share to StumbleUpon +',800,540)" type=image value='Stumble' src="images/buttons/stumble.png" />
														
													</div>
													<br><br><br>
													<div>
														<span ><div><p>0</p></div></span>
														<input onclick="getID('t_subj').value='<?php echo str_replace($t,$v,$r["lookName"]); ?>';getID('t_msg').value='<?php echo str_replace($t,$v,$r["lookName"])." http://fashionsponge.com/fs/lookdetails.php?id=".$_GET["id"]; ?>';msgBox('visible')" type=image value='Email' src="images/buttons/email.png" />
													</div>
													
												</td>
											</table><br><br>
												<script>
													function shareFB(){
														FB.ui(
														  {
															method: 'feed',
															name: '<?php echo $r["lookName"]; ?>',
															link: 'http://fashionsponge.com/fs/lookdetails.php?id=<?php echo $r[0]; ?>',
															picture: 'http://fashionsponge.com/fs/images/members/posted looks/<?php echo $r[0]; ?>_large.jpg',
															caption: 'fashionsponge.com',
															description: '<?php echo $r["lookAbout"]; ?>'
														  },
														  function(response) {
															if (response && response.post_id) {
																//posted
															} else {
															  //not posted
															}
														  }
														);
													}
												</script>