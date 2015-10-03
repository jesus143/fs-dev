	<?php
		if($_SESSION["mno"]==""){
			echo "
				<div style=\"width:974px;margin:0 auto; padding:10px;\">
					<table width=100% style='font:25px helvetica ' >
						<td width=80% align=center style='vertical-align:middle' >	
							<b style='font:25px helveticaBold '>FASHIONSPONGE IS LOOKING FOR \"THE WORLD'S MOST STYLISH\".</b>";
							// echo"<div style='padding:5px;' ></div>";
							
							echo "<span style='font-size:19px'>
								Sign in Now and start voting on who you think has the most style.
							</span>";

							 // echo"<b style='font:25px helveticaBold '>learning, discovering</b> and <b style='font:25px helveticaBold '>sharing</b>.";
							// echo "Sign in <b style='color:#d41246;font:25px helveticaBold '>NOW</b> and start voting on who you think has the most style.";

						echo "
						</td>
						<td width=*% valign=center style='vertical-align:middle' >
							<a href='#'><img src='images/learnmore.jpg' /></a>
						</td>
					</table>
				</div>
			";
		}
	?>

<div style="margin:0 auto; text-align:center;width:996px;background:black;z-index:100" id='topM1' >
		<!--<span id="login"></span>
		<script type="text/javascript">
		 /* twttr.anywhere(function (T) {
			T("#login").connectButton({size:"large"},{
			  authComplete: function(user) {
				window.location="tw-signup.php";
			  },
			  signOut: function() {
				// triggered when user logs out
			  }
			});	
		  });
		 */
		</script>!-->
		<style>
			#topbut{
				background-color:black;color:white;font:bold 13px 'arial';border:none;padding:0 10px 0 10px;cursor:pointer;
			}
			#topbut a{
				font:bold 13px arial;text-decoration:none;color:white;
			}
			.a{color:white;}
			#topbut:hover, #topbut a:hover{
				color:#aaa;
			}
			
		</style>
		<table align=center style="border-collapse:collapse;margin:0 auto;height:30px;" id='topM2'  >
		<?php
			if($_SESSION['mno']=="")
			{
				echo"
						<td style=\"padding:0;\"><input  id='signup' 		onclick=\"window.location='signup.php'\" type=image src=\"images/signup1.png\" value='SIGNUP' /></td>
						<td style=\"padding:0;\"><input  id=\"fblogin\" 	onclick=\"noEntry=1;FBLogin()\" type=image src=\"images/fb.png\" value='LOGIN WITH FACEBOOK' style=\"\" /></td>
						<td style=\"padding:0;\"><input  id=\"twlogin\" 	style='' type=image src=\"images/twitter.png\" value='LOGIN WITH TWITTER' /></td>
						<td style=\"padding:0;\"><input  id='login' 		onclick=\"window.location='login.php'\" type=image src=\"images/login1.png\" value='LOG IN' /></td>
					";
			}
			else
			{
					//<td><img style='position:absolute;' src='images/members/".$_SESSION['mno']."_small.jpg' height=29 /></td>
					//<td valign=center><span style='position:absolute;'><b>Arex Pantallano</b></span></td>
				echo"
					<td align=left style='width:750px;color:white;font:bold 13px arial;padding: 0 0 0 20px; vertical-align:middle' >DON'T JUST DRESS. DRESS WELL.</td>";
					// echo "<td style=\"padding:0;; vertical-align:middle\" align=right ><div id='topbut' ><a href='profile'>MY PROFILE</a> &nbsp;</div></td>";
					echo "<td style=\"padding:0;; vertical-align:middle\" align=right ><div id='topbut' ><a href='#'>MY PROFILE</a> &nbsp;</div></td>";

					echo "<td style=\"padding:0;; vertical-align:middle\" align=right ><div  onclick=\"getID('accMenu').style.display='block';\"  type=button value='ACCOUNT ' style=\"background:black url('images/down2.png') center right no-repeat;\" id='topbut' ><a href='account'>MY ACCOUNT</a> &nbsp;</div>
						<div style=\"display:none;\" id='accMenu' >
							<div style=\"position:absolute;\">
								<style>
									#accounts{
										font:12px arial;width:106px;display:block;padding:5px;background:black;color:white;
										text-align:left;
									}
									#accounts a {
										font:bold 12px arial;
										display:block;
										color:white;
										text-decoration:none;
										padding:2px;
									}
									#accounts a:hover{
										color:#ffba00;
									}
									.accounts a.visited{
										color:white;
									}
								</style>
								<div id='accounts' >
									<br>";
									  // echo "<a href='account'>SETTINGS</a><a href='favorites.php'>FAVORITES</a>";
									echo "
									<a href='#'>SETTINGS</a>
									<a href='#'>FAVORITES</a>
									<a href='findfriends.php'>FIND FRIENDS</a><br>
									<a href='logout.php'>LOGOUT</a>
								</div>
							</div>
						</div>
					</td>
				";
				//<td style=\"padding:0;\" id='tdlogout'><input  id=\"logout\" onclick=\"window.location='logout.php';\" type=image src=\"images/logout.png\" value='LOG OUT' /></td>
			}
		?>
		
		</table>
		<?php
			require("fbloginscript.php");
		?>
</div>