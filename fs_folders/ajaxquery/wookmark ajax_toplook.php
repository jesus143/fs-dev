<?php
				session_start();
			    require ("connect.php");
				require ("program.php");
				require ("../function.php");
				require ("../source.php");
				require ("../myclass.php");

			


				$page=$_GET["page"];
				$to=$page*20;
				$from=$to-20;
				$rows=20;


				toplook($from,$rows);


			
			?> 
 












			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
			
			
			
			
			
			
			
			
		
		<?php 
		// echo"
		// 								<td style='padding:5px;'> 
		// 									<a href='".$rsmemq["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$rsmemq["firstname"]." ".$rsmemq["lastname"]."</a><br>
		// 									<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
		// 									<table style='width:auto;color:#454545;font:11px helvetica'>
		// 										<td><b>0</b></td><td><img src='images/drip.png' height=10 /></td>
		// 										<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
		// 										<td> | OVERALL RATING <b>".@round($rsqr[0]/($rsqc[0]*5)*100)."</b>%</td>
		// 									</table>
		// 								</td>
		// 								<td valign=center ><br><img src='images/look-icon.png' /></td>
		// 							</table>
		// ?>
			
			
			
			
			
			