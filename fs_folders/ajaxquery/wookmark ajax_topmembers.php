<?php
	session_start();
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
				require ("program.php");
				require ("../function.php");
				require ("../source.php");
				require ("../myclass.php");
				
				$page=$_GET["page"];
				
				topmember($page);


				// a();

				 
				// function a() {  

				// // $mc = new myclass();
				// // $page=$_GET["page"];
				// // $to=$page*20;
				// // $from=$to-20;
				// // $rows=20;

				// 		$date_dif=$mc->date_difference();

				// 	if ($_SESSION['show']=='today') {

				// 		$q = "SELECT * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno and datejoined = '$date_dif[today]'  order by
				// 				((select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=fs.mno)+
				// 				 (select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=fs.mno )+
				// 				 (select count(*) from friends f where f.mno2=fs.mno )+
				// 				 (select count(*) from postedlooks pl where pl.mno=fs.mno )
				// 				)
				// 			desc limit $from,$rows ";
				// 	}
				// 	if ($_SESSION['show']=='week') {

				// 		$q = "SELECT * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno and datejoined > '$date_dif[last_week]' order by
				// 				((select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=fs.mno)+
				// 				 (select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=fs.mno )+
				// 				 (select count(*) from friends f where f.mno2=fs.mno )+
				// 				 (select count(*) from postedlooks pl where pl.mno=fs.mno )
				// 				)
				// 			desc limit $from,$rows "; 
				// 	}
				// 	if ($_SESSION['show']=='month') {
				// 		$q = "SELECT * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno and datejoined > '$date_dif[last_month]' order by
				// 				((select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=fs.mno)+
				// 				 (select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=fs.mno )+
				// 				 (select count(*) from friends f where f.mno2=fs.mno )+
				// 				 (select count(*) from postedlooks pl where pl.mno=fs.mno )
				// 				)
				// 			desc limit $from,$rows "; 
				// 	}
				// 	if ($_SESSION['show']=='year') {
				// 		$q = "SELECT * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno and datejoined > '$date_dif[last_year]' order by
				// 				((select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=fs.mno)+
				// 				 (select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=fs.mno )+
				// 				 (select count(*) from friends f where f.mno2=fs.mno )+
				// 				 (select count(*) from postedlooks pl where pl.mno=fs.mno )
				// 				)
				// 			desc limit $from,$rows "; 
				// 	}
				// 	if ($_SESSION['show']=='all') {
				// 		$q = "SELECT * from fs_members fs, fs_member_accounts fa where fs.mno=fa.mno order by
				// 				((select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=fs.mno)+
				// 				 (select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=fs.mno )+
				// 				 (select count(*) from friends f where f.mno2=fs.mno )+
				// 				 (select count(*) from postedlooks pl where pl.mno=fs.mno )
				// 				)
				// 			desc limit $from,$rows "; 
				// 	}



				// 	$ex = mysql_query($q) or die(mysql_error());
				// 	$i=1;
				// 	while($r = mysql_fetch_array($ex))
				// 	{
				// 		$qr=mysql_query("select sum(r.rating) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=$r[0]");
				// 		$rsqr=mysql_fetch_array($qr);
						
				// 		$qc=mysql_query("select count(*) from ratings r, postedlooks pl where r.plno=pl.plno and pl.mno=$r[0]");
				// 		$rsqc=mysql_fetch_array($qc);
						
				// 		$ql=mysql_query("select count(*) from pl_loves l, postedlooks pl where pl.plno=l.plno and pl.mno=$r[0]");
				// 		$rsql=mysql_fetch_array($ql);
						
				// 		$qf=mysql_query("select count(*) from friends f where mno2=$r[0]");
				// 		$rsqf=mysql_fetch_array($qf);
						
				// 		$qff=mysql_query("select count(*) from friends f where mno1=$r[0]");
				// 		$rsqff=mysql_fetch_array($qff);
						



				// 		echo "
				// 			<style>
				// 				.stands b{
				// 					color:#000
				// 				}
				// 			</style>
				// 		";
				// 		echo"
				// 				<li >
				// 					<div>";	
				// 						echo"<div style='display:none' ><a href='".$r["username"]."'><img style='width:287px' src='images/members/".$r[0].".jpg'  /></a></div>";
				// 						if($r["ispicset"]==1)
				// 							echo"<a href='".$r["username"]."'><img width=100% src='images/members/".$r[0].".jpg' style='width:287px;height:300px' /></a>";
				// 						else	
				// 							echo"<a href='".$r["username"]."'><img width=100% src='images/members/0.jpg' style='width:287px;height:300px' /></a>";
											
										
				// 						echo"<div style='padding:5px;'></div>
				// 						<table width=100% class='stands'>";
				// 							echo"<div style='display:none' ><a href='".$r["username"]."'><img width=100% src='images/members/".$r[0].".jpg'   /></a></div>";
											

				// 							if($r["ispicset"]==1) 
				// 								echo"<td width=1><a href='".$r["username"]."'><img src='images/members/".$r["mno"].".jpg'  width=50px height=50px /></a></td>";
				// 							else
				// 								echo"<td width=1><a href='".$r["username"]."'><img src='images/members/0.jpg'  width=50px height=50px  /></a></td>";
											 

				// 							$mc->user($r["mno"]);

				// 							echo"
				// 							<td style='padding:5px;'>
				// 								<a href='".$r["username"]."' style='color:#454545;font:15px helveticaBold;text-decoration:none;//text-transform:uppercase'>".$r["firstname"]." ".$r["lastname"]."</a><br>
				// 								<span style='color:#454545;font:10px helvetica' ><b>$rsqf[0]</b> FOLLOWERS | FOLLOWING <b>$rsqff[0]</b></span>
				// 								<table style='width:auto;color:#454545;font:bold 10px helvetica'>
				// 									<td><b>0</b></td><td><img src='images/drip.png' height=10 /></td>
				// 									<td> | <b>$rsql[0]</b></td><td><img src='images/love.png' height=10 /></td>
				// 									<td> | OVERALL RATING <b>".$mc->mem_info['oarating']."</b></td>
				// 								</table>
				// 							</td>
				// 							<td valign=center ><br><img src='images/person.jpg' /></td>
				// 						</table>
										
				// 					</div>
				// 				</li>
				// 			";
				// 		$i++;
				// 	}
				//  }




			?> 
			
			
			<script>
				function showRate(id,state){
					getID("rate"+id).style.display=state;
				}
			</script>	
			
			
			<script type="text/javascript">
				$(document).ready(function(){ 
					// alert("working");
				})
			</script>
			<style type="text/css">
				#Tframe a{ 
					text-decoration: none;
				}
				#about_container{
					/*border:1px solid red;*/
					position:absolute;
					color:white; 
					/*top:195px;*/
					top:170px;
					background-color:#000;
					width:287px;
					/*height:115px;*/
					height:140px;
					opacity:0.6;					 
				}
				#about_contain{
					position:absolute;
					color:white;   
					/*top:200px;*/
					top:190px;
					/*border: 1px solid green;*/
					width:280px;
					padding-left:3px;					
				} 
				#accup_state{ 
					position:absolute;
					color:white;   
					/*top:200px;*/
					top:175px;
					/*border: 1px solid green;*/
					width:280px;
					padding-left:3px;	
					font-weight: bold;
				}
				#date_member{

					position:absolute;
					color:white; 
					top:289px;
					left:133px;
					/*border: 1px solid yellow;*/
					padding-left:3px;				
				}
				#red{ 
					color: red;
				}
				#about_with_profile span{ 
					display: none;
				}
				#about_no_profile span{ 
					display: none;
				}				

			</style>
			
			
<script type="text/javascript">
	$(window).ready(function(){


		specific_showhide();
		function specific_showhide(){ 
			$('.no_avatar_big , .with_avatar_big').mouseenter(function(){ 
				var classes =$(this).attr('id');
				$('.a_'+classes).css('display','block');
			});
			$('.no_avatar_big , .with_avatar_big ').mouseleave(function(){ 
				var classes =$(this).attr('id');
				$('.a_'+classes).css('display','none');

			});
		}
	} );


</script>
			
			
			
			
			
			
			
			
			