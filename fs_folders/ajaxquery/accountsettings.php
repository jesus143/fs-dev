<?php
	session_start();
	// $_SESSION['mno']=134;
	// $_SESSION['mno']=682;
	// $_SESSION['mno']=676;
	// $_SESSION['mno']=136;



	require("connect.php");
	require("function.php");
	require ("source.php");
	require("unfnln_style_ajax.php");
	require("genstyle.php");
	require("country_state_city.php");
	require("gen_ajaxjquery.php");
	// unset($_SESSION['delete_profile_pic']);

	if($_SESSION['mno']=="")
		jump("login.php?errno=2");
		
	$owner=$_GET["mno"];
		if($owner<1)
			$owner=$_SESSION["mno"];
		
	if(isset($_POST["submit"])){
		$ps=mysql_query("select ispicset from fs_members where mno=$owner") or die(mysql_error());
		$rsps=mysql_fetch_array($ps);
		$ips=$rsps[0];
		if($ips=="")
			$ips=0;
			
		if($_FILES['file']['tmp_name']!=""){
			// list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
			// move_uploaded_file($_FILES["file"]["tmp_name"], "images/members/$owner.jpg");
			$ips=1;
			if($width>400){
				// $resize = resizeImage("$owner.jpg", "images/members", "", 2, 100);
			}
		}
		mysql_query("update fs_members set
			occupation='".$_POST["t_occ"]."',
			blogdom='".$_POST["t_blo"]."',
			website='".$_POST["t_web"]."',
			country='".$_POST["t_cou"]."',
			state_='".$_POST["t_sta"]."',
			city='".$_POST["t_cit"]."',
			zip='".$_POST["t_zip"]."',
			gender='".$_POST["t_gen"]."',
			bdate='".$_POST["t_y"]."-".$_POST["t_m"]."-".$_POST["t_d"]."-"."',
			aboutme='".$_POST["t_abo"]."',
			ispicset=$ips
			where mno=$owner
		")or die(mysql_error());
		
		for($i=0;$i<15;$i++){
			if($_POST["fm_$i"]!=""){
				mysql_query("insert into friends values(0,".$_SESSION["mno"].",".$_POST["fm_$i"].",0)")or die(mysql_error());
			}
		}
		jump("profile");
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
</head>
<body bgcolor="white">
<div style="text-align:center;width:100%;" >




	<?php

		require("fb-sdk.php");
		require_once("topMenu.php");
	    require("newHeader.php"); 
		

		$ex=mysql_query("select * from fs_members where mno=$owner") or die(mysql_error());
		$rs=mysql_fetch_array($ex);
	?>	
<div onmousemove="getID('accMenu').style.display='none';" class="body" style="text-align:left;width:974px;margin:0 auto; 
				border:1px solid #000;padding:10px;" >
		<br><br>
		<br>
		
		<!-- <table style="border-collapse:collapse;border-bottom:1px solid #ccc;width:100%"> -->
		<table> 
			<td style="border-bottom:1px solid #ccc;padding:0 0 0 5px;width:1px">&nbsp;</td>
			<td class="m" onclick="gotoSlide(0)" id="m_0"  >PROFILE<td>
			<td style="border-bottom:1px solid #ccc;width:1px">&nbsp;</td>
			<td class="m" onclick="gotoSlide(1)" id="m_1" >SELECT<td>
			<td style="border-bottom:1px solid #ccc;width:1px"></td>
			<td class="m" onclick="gotoSlide(2)" id="m_2" >FOLLOW<td>
			<td style="border-bottom:1px solid #ccc;width:1px"></td>
			<td class="m" onclick="gotoSlide(3)" id="m_3" >INVITE FRIENDS<td>
			<td style="border-bottom:1px solid #ccc;width:1px"></td>
			<td class="m" onclick="gotoSlide(4)" id="m_4" >SOCIAL CONNECT<td>
			<td style="border-bottom:1px solid #ccc;width:1px"></td>
			<td class="m" onclick="gotoSlide(5)" id="m_5" >ACCOUNT PREFERENCES<td>
			<td style="border-bottom:1px solid #ccc;width:1px"></td>
			<td class="m" onclick="gotoSlide(6)" id="m_6" >DELETE TABS<td>
			<td width=63%>&nbsp;</td>
		</table>
		<br>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script>
			var width=974;
			var left=0;
			var cS=0;
			getID("m_"+cS).style.background="white";
			getID("m_"+cS).style.color="black";
			function gotoSlide(n){
				getID("m_"+cS).style.backgroundColor="black";
				getID("m_"+cS).style.color="white";
				
				$("#slides").animate({
					left:left+500
					},200,function (){
						$("#slides").animate({
							left:width*n*-1
							},200,function(){
								left=width*n*-1;cS=n;
								getID("m_"+n).style.background="white";
								getID("m_"+n).style.color="black";
						});
				});
				lnfnhide();
			}
		</script>
		<form method=post enctype="multipart/form-data" >
			<div style="overflow:hidden;width:974px;">


				<table id=slides style="position:relative;">
					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 23px helveticaBold;color:#fd225a">CREATE YOUR PROFILE</span><BR>
						<!-- <span style="font:bold 13px helvetica">WELCOME TO FASHIONSPONGE...DON'T JUST DRESS. DRESS WELL.</span> -->
						<br><br>
						<div style="padding:0 0 0 30px;" id="profile">


	
								<table width=100% border=0 style="font:14px helvetica;">
									<td width=100%>
										<table id="profile" width=100px border=0 >
											<tr >
												<!-- onclick="getID('t_gender').value='Male';getID('d_gender').style.display='none';" -->
												<!-- <div id="new_un_res"> -->
													<!-- this is the results to be inserted! -->
												<!-- </div> -->

												<?php if(is_username_change()) { ?>
												<tr><td style="width:160px;">Username: <span id="usrn" >http://fashionsponge.com/fs/</span></td><td style="width:200px;"> <input disabled=disabled onclick="lnfnhide();usernamebold()" id="usrn" name="t_web" value="<?php get_username(); ?>"   type='text' /> </td>
													<td style="width:150px;"><span id='unctch' >you decided to change your username on <?php echo get_username_chage_date(); ?> and now don't have access to change your username again.</span>  </td></tr>
												<?php }else{   ?>
												<tr><td style="width:160px;">Username: <span id="usrn" >http://fashionsponge.com/fs/</span></td><td style="width:200px;"> <input onclick="uns();unclnfn_hide()" id="unch_in" name="t_web" value="<?php get_username(); ?>"   type='text' /> </td>
													<td style="width:150px;"> <span id="unch" >click ok to update your username <input  onclick="unok()" type="button"  value="ok" </input> </span></td></tr>
												<?php } ?>

												<tr><td style="width:150px;">First Name:</td>   <td style="width:200px;"> <input onclick="fnameshow_msg();unh()" id="fname"  name="t_web" value="<?php  get_firstname(); ?>" type='text' /> </td>
													<td style="width:150px;"> <span id="fnchge" >successfully change </span> <span id="fnmsg"> click ok to update your firts name  <input  onclick="fnok()" type="button" value="ok" </input> </span></td></tr>
												<tr><td style="width:150px;">Last Name:</td>    <td style="width:200px;"> <input onclick="lnameshow_msg();unh()" id="lname" name="t_web" value="<?php  get_lastname()?>"    type='text' /> </td>
													<td style="width:150px;"> <span id="lnchge" >successfully change </span> <span id="lnmsg" >click ok to update your last name <input  onclick="lnok()" type="button"  value="ok" </input> </span></td></tr>
												<td style="width:150px;" >Occupation:</td>	
												<td style="width:150px;"  >
													<?php 

														$m="Accessory Designer-Actress-Blogger-Boutique-Business Professional-Fashion Designer-Graphic Designer-Hair Stylist-House Wife-Illustrator-Make Up Artist-Model-Musician-Photographer-Social Media Marketer-Student-Wardrobe Stylist-Other";
														$m=explode('-',$m);
													?>
													<select class="preffered_style" id="occupation">
														<?php
															for ($i=0; $i < count($m) ; $i++) { 
																echo "<option value='$i' > ".$m[$i]."</option>";
															}
														 ?>
													</select>
												</td>
												
												<td rowspan=11 valign=top style="padding:5px 0 5px 30px; ">
													<div >
													<!-- <img style="border:1px solid #ccc" src="images/members/<?php echo $owner; ?>.jpg" width=220 /><br><br> -->
													<img style="border:1px solid #ccc" src="images/members/<?php echo $owner; ?>.jpg" /><br><br> 
													Upload and Crop your Profile Picture <?php //echo "profile pic id = " .$owner ?><br>
													<!-- <input type=file name=file value="BROWSE" style="width:220px;box-shadow:2px 2px 2px #aaa;padding:3px 15px 3px 15px;background:black;color:white;border:0;font:bold 13px arial;cursor:pointer" /> -->
													<input id="buttons" type="button" value="Upload Profile" onclick="document.location='upload_profile1/upload.php'"  >

													</div>
												</td>
												</tr>
												<td style="width:150px;" >Preffered Style:</td>	
												<td style="width:200px;"  > 
												 												

													<select class="preffered_style" id="prefferedstyle">
														<?php 
														$preffered_style=preffered_style_list();
														for ($i=0; $i < count($preffered_style) ; $i++) { 
															echo "<option value='$i' > ".$preffered_style[$i]." </option>";
														}
														?>		
													</select>
												</tr>
											<tr><td style="width:150px;">Blog Domain:</td>	<td style="width:200px;"> <input onclick="lnfnhide()" id="blog_domain"  name="t_blo" value="<?php echo $rs["blogdom"]; ?>" type='text' /> </td></tr>
											<tr><td style="width:150px;">Website:</td>		<td style="width:200px;"> <input onclick="lnfnhide()" id="website"  name="t_web" value="<?php echo $rs["website"]; ?>" type='text' /> </td></tr>
											<tr><td style="width:150px;">Country:</td>	
												<td style="width:400px;"> 
													<script type= "text/javascript" src = "countries.js"></script>
													<select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" class="country" ></select>
												</td>
											</tr>
											<tr><td style="width:150px;">State:</td>		<td style="width:200px;">

											 <!-- <input onclick="lnfnhide()"  name="t_sta" value="<?php echo $rs["state_"]; ?>" type='text' class="ddown" /> -->

											 	<select onclick="lnfnhide()"  name ="state" id ="state" class="state"></select>

																<script language="javascript">print_country("country");</script>  
											  </td></tr>
											<tr><td style="width:150px;">City:</td>			<td style="width:200px;"> <input onclick="lnfnhide()" id="city" name="t_cit" value="<?php echo $rs["city"]; ?>" type='text' /> </td></tr>
											<tr><td style="width:150px;">Zip Code:</td>		<td style="width:200px;"> <input onclick="lnfnhide()" id="zipcode" name="t_zip" value="<?php echo $rs["zip"]; ?>" type='text' /> </td></tr>
											

											<tr><td style="width:150px;">Gender:</td>		

												<td style="width:200px;">
													<select class="preffered_style" id="gender" value="Female"> 
														<option value="1" >Male</option>
														<option value="2" >Female</option>
													</select>
												</td>
											</tr>
											<tr>

												<td style="width:150px;">Birthday:</td>		<td style="width:200px;">
												<table width=100% border=0>
													<!-- <td>  -->
														<?php //get_months('bmonth','cmonth'); ?>
													<!-- </td> -->
													<!-- <td> -->
														<?php //get_days('bday','cday'); ?>
													<!-- </td> -->
													<td>
														<?php get_years('byear','cyear'); ?>
													</td>
												</table>
											</td></tr>
											<tr><td style="width:150px;" valign=top>Describe Yourself:</td><td style="width:200px;"> 
												<?php
													if (empty($rs["aboutme"])) {
													 	echo "<textarea onclick='lnfnhide();' id='describe_yourself' name='t_abo' style='resize:none;height:200px;' class='Describe_empty' > $rs[aboutme] </textarea>";
													 } else { 
													 	echo "<textarea onclick='lnfnhide();' id='describe_yourself' name='t_abo' style='resize:none;height:200px;' class='Describe_not_empty' > ".remove_beginning_spaces($rs['aboutme'])."</textarea>";
													 }
													 // echo remove_beginning_spaces($rs['aboutme']);
												?>
											</td></tr><td> </td><td><span style="font-size:12px;font-wieght:bold; color:#8a8a8a; padding:10px;" > Describe Yourself in 200 character or less </span> <span style="font-size:12px; color:green; padding:10px;margin-left:0px" class="total_count" >-20</span> </td>
											<tr><td colspan=2 align=right> <input id="save_profile"  type=button onclick="acc_profile_save();gotoSlide(1)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> </td></tr>
										</table>
									</td>
								</table>
						</div>
					</td>







					<!-- count word at descrition  -->
					<script type="text/javascript">

						$(window).ready(function(){
							var content = "<?php echo $rs['aboutme']  ?>";
							var clen=content.length;
							var valid_char=200;

							// alert(desclen);
							init_count_input(clen,valid_char);

						    $('.Describe_empty').click(function(){
							  	$(this).val("");
							 	// alert("you clicked me !");
							 	start_typing('Describe_empty');
							 	count_input('Describe_empty');
							});
						   	$('.Describe_not_empty').click(function(){
							 	start_typing('Describe_not_empty');
							 	count_input('Describe_not_empty');
							});
						   	function start_typing(classname){
						   		$('.'+classname).keyup(function(){
						   			var content = $("."+classname).val();
						   			content=text_stop_writing(valid_char,content);
						   			$("."+classname).val(content);
						   			content = $("."+classname).val();
						   			count_input(content);

						   		});
						   	}
						   	function count_input(content){
						   		// var content = $("."+classname).val();
						   		var clen = content.length;
						   		color(clen,valid_char);
						   		$(".total_count").text(clen);
						   	}
						   	function init_count_input(clen,valid_char){
						   		color(clen,valid_char);
						   		$(".total_count").text(clen);
						   	}
							function color(clen,valid_char){
							   	if (clen==valid_char)
							   		$(".total_count").css('color','red');
							   	else
							   		$(".total_count").css('color','green');		
						   	}				

						   	function text_stop_writing(valid_char,content){
						   		if (content.length > valid_char ){
						   			var content=content.substr(0,valid_char);
						   			return content;
						   		}else{
						   			return content;
						   		}
						   	}
						} );
					</script>






					<style type="text/css">
						.blist{
							/*width: 200px;*/
						}
						.blist span{
							font-size: 15px;
						}
		/*				.blist td{
							width: 10px;
						}*/
						#men_0{
							/*color:red;*/
						}
						#women_1{
							/*color:green;*/
						}
						.title{
							font-size: 50px;
							font-weight: bold;
							margin-left:3px;
						}
						.ttle{
							height: 50px;
						}
						#id_women_4{
							/*color: red;*/
						}
					</style>

		
					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">SELECT BRANDS</span><BR>
						<span style="font:bold 18px helvetica">WHAT BRANDS DO YOU WEAR AND LIKE?</span><br><br>
						<span style="font:14px helvetica">You can choose one or more tags.  Your selections will help us pair you with members who share your brand interest.</span>
					<!-- 	<table border=0 class="blist"  >
							<?php  //brands_men(brands_men_list()); ?>	
							<?php  brands_women(brands_women_list(),'brands_women','id_women_','cl_women_'); ?>
						</table>
						 -->
						<div id="res"> 
							<?php 
								 

								

							    if (num_gender($your_data[0][4]) == 1){
							    	$_SESSION['gender']=1;
							   		echo "<table border=0 class='blist'>";
										   // brands_men($brands_men,$bname=null,$id=null,$class=null)
										   brands_men(brands_men_list(),'brands_men','id_men_','cl_men_'); 
									echo "</table>";
									// echo "<input type='button' onclick='getCheckedBoxes();gotoSlide(2)' value='SAVE' > ";
									echo "
										<br><br><br>
								 		<center>
											<input type=button onclick='getCheckedBoxes_men();gotoSlide(2)' value='SAVE' class='m' style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; ' /> 
								 		</center>
									";
							    }else{
							    	$_SESSION['gender']=2;
							    	echo "<table border=0 class='blist'  >";
										   brands_women(brands_women_list(),'brands_women','id_women_','cl_women_'); 
									echo "</table>";
								 	// echo "<input type='button' onclick='getCheckedBoxes();gotoSlide(2)' value='SAVE'style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0;' > ";
									echo "
										<br><br><br>
								 		<center>
											<input type=button onclick='getCheckedBoxes_women();gotoSlide(2)' value='NEXT' class='m' style='width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; ' /> 
								 		</center>
									";
							    }		

							?>
						</div>
						<!-- <input type="button"  value="checked" id="checkeds" onclick=""/> -->
						<br><br>
					</td>
					<!-- follow -->
					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">FOLLOW PEOPLE</span><BR>
						<span style="font:bold 18px helvetica">WE RECOMMEND FOLLOWING THESE PEOPLE.</span>
						<div id="womens_brand_selected" >
						 
						<?php 
							// echo "hello there!";
							$mybrand_indb=select('fs_member_brand_selected',
								4,
								array('mno',$_SESSION['mno'])
								);
							// print_r($mybrand_indb);
							// echo "found = ".count($mybrand_indb);
							// echo "<hr>";
							if (!empty($mybrand_indb)) {
								$users=get_all_mno_has_thesamebrand($mybrand_indb);
								$users=remove_fexist($users,my_list_followed());
							}
							// print_r($users);
								// $users = array(123,125,127,128,129,130,129,130);
								// $users = array(123,125,127,128,129,130,129);
								// $users = array(123,125,127,128,129,130);
								// $users = array(123,125,127,128,129);
								// $users = array(123,125,127,128);
								// $users = array(123,125,126);
								// $users = array(123,125);
								// $users = array(123);
						?>

						<?php 
							if (count($users)>5) {
								echo " 
								<div class='rateDiv' >
								";
							}else{
								echo " 
								<div class='rateDiv4' >
								";
							}


							echo " 
								<table border=0>
									<tr>";
								$c=0;
								for ($i=0; $i < count($users) ; $i++) { 
						 		     echo "<td>";
										echo "<table style='width:145px;height:200px;' border=0>";
											// $rx[0]=682;
											echo "
											 <td style='padding-top:30px' id='innerdiv'>
												<div>";
												if(file_exists("images/members/".$users[$i].".jpg"))
													echo"<img src='images/members/".$users[$i].".jpg'  />";
												else
													echo"<img src='images/members/0.jpg'  />";
											    echo"		
												</div>";
												echo "
												</td>
												<tr><td style='height:40px;vertical-align:middle' align=center><a href='profile.php?id=".$users[$i]."'>".get_fullname($users[$i])."</a></td></tr><tr>
												<td>
												<input type=text class='c_$i' id='fm_$i' name='follow' style='display:none;'/>
												 
												 <input type='button' id='follow_button' value='FOLLOW' onclick=\"
													
													if(this.value=='FOLLOW'){
														getID('fm_$i').value='".$users[$i]."';
														this.value='SELECTED';
														this.style.backgroundColor='green'
													}else
													{
														getID('fm_$i').value='';
														this.value='FOLLOW';
														this.style.backgroundColor='#02c7ea'
													}
													\"
													/></td>
												</tr>
											</table>
									";
									$c++;
									if($c%6==0){
										echo "<tr>";
									}
									echo "</td>";
								}
						?>
									</td>
								</table>
							</div>
						<br><br>

						</div>
						<center>
							<!-- <input id=""  type=button onclick="save_followed_people()" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " />  -->
							
							<input id=""  type=button onclick="save_followed_people();gotoSlide(3)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> 
							<!-- <input type="submit" value="SAVE & EXIT" NAME="submit" class="m" style="width:250px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " />  -->
						</center>
					</td>



					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">SOCIAL NETWORKING SITE</span><BR>
						<!-- you follow this people: -->
						<!-- invite friends start -->

						<?php 
							require("invitefriends_account.php");
						?>
 						<!--  invite friends end  -->

						<div id="followed">

							<!-- jesus<br> -->
							<!-- erwin <br> -->

						</div>
					<!-- 	<span style="font:bold 18px helvetica">WHAT BRANDS DO YOU WEAR AND LIKE?</span><br><br>
						<span style="font:14px helvetica">You can choose one or more tags.  Your selections will help us pair you with members who share your brand interest.</span>
						<br><br><br><br> -->
						<center>
							<input type=button onclick="gotoSlide(4)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> 
						</center>
					</td>


					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">SOCIAL CONNECT</span><BR>
						<?php 
							require ("social_connect.php");
						?>
						<center>
							<input type=button onclick="gotoSlide(5)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> 
						</center>
					</td>
					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">ACCOUNT PREFERENCES</span><BR>
						<?php 
							require("account_refference.php");

						?>
						<center>
							<input type=button onclick="gotoSlide(6)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> 
						</center>
					</td>


					<td class="slide" valign=top >
						<img src="images/fixer.png" /><br>
						<span style="font:bold 25px helveticaBold;color:#fd225a">DELETE TABS</span><BR>
						
						<?php 
							require("delete_tabs.php");
						?>

						<center>
							<input type=button onclick="gotoSlide(0)" value="NEXT" class="m" style="width:200px;height:50px;font-size:20pt;box-shadow:2px 2px 2px #aaa;border:0; " /> 
						</center>
					</td>
				</table>
			</div>
		</form>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<!------- THIS IS THE OLD PROFILE PAGE --->
<!--
		<?php //require("banner.php"); ?><br>
		<div style="padding:5px;" ></div>	
		<div class="border" ></div><br>
		<br>
		<table width=100% style="border-collapse:collapse;">
			<td width=1><img src="images/members/<?php //echo $owner; ?>_large.jpg" width=90% /></td>
			<td width=12%> <div class="divStats" >1631</div><div style="padding:3px;" ></div><div class="divStatsText" >RATING</div></td>
			<td width=12%> <div class="divStats" >75944</div><div style="padding:3px;" ></div><div class="divStatsText" >TOTAL LOOKS</div></td>
			<td width=12%> <div class="divStats" >170</div><div style="padding:3px;" ></div><div class="divStatsText" >FOLLOWERS</div></td>
			<td width=12%> <div class="divStats" >1857</div><div style="padding:3px;" ></div><div class="divStatsText" >FOLLOWINGS</div></td>
			<td width=12%> <div class="divStats" >2684</div><div style="padding:3px;" ></div><div class="divStatsText" >FAVORITES</div></td>
			<td width=12%> <div class="divStats" >852</div><div style="padding:3px;" ></div><div class="divStatsText" >BLOGS</div></td>
			<td width=12%> <div class="divStats" >9745</div><div style="padding:3px;" ></div><div class="divStatsText" >DRIPS</div></td>
		</table>
		<div style="padding:10px;" ></div>	
		<table width=100% id="opt">
			<td width=20%>NEVER VIEWED</td>
			<td style="padding:3px;background:white;"></td>
			<td width=20%>MOST VIEWED</td>
			<td style="padding:3px;background:white;"></td>
			<td width=20%>TOP LOOKS</td>
			<td style="padding:3px;background:white;"></td>
			<td width=20%>MOST DRIPPED</td>
			<td style="padding:3px;background:white;"></td>
			<td width=20%>TOP FAVORITES</td>
		<table>
		<div style="padding:15px;" ></div>	
		<?php
			//require("wookmark_rate.php");
		?>
----->
		
  <?php require("footer.php"); ?>
  </div>

  
</body>
</html>






<?php
/*
	include("connect.php");
	session_start();
	if($_SESSION['mno']=="")
		jump("login.php");

	require_once("topMenu.php");
	require("fb-sdk.php");
*/	
?>	
<!--
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

	<div onmousemove="getID('accMenu').style.display='none';" class="body" style="box-shadow:0 0 10px #797979;width:974px;margin:0 auto; border-right:2px solid #ddd;border-left:2px solid #ddd;padding:10px;" >
		<br><br>
		<a href="index.php" style="text-decoration:none" ><img src="images/logo.png" width=100% /></a> <hr><br><br>
		<style>
			#accSett b,bH{
				font: bold 12px arial;
				cursor:pointer;
			}
			#accSett b{
				padding:2px 0 0 10px;
			}
			bH{
				font: bold 17px arial;
				color:#828282;
			}
			#accSett b:hover{
				text-decoration:underline
			}
			.table{
				font:12px arial;
			}
			.table td,th{
				padding: 0 0 0 10px;
			}
			input[type="radio"]{
				cursor:pointer;
			}
		</style>
		<div id="accSett" >
			<bH>ACCOUNT PREFERENCES</bH><br><br>
			<script>
				function togs(){
					$('#eCont').animate({
						width:965
					}, 500, 'linear',function() {
						$('#eProf').animate({
							height: 550,
							opacity:1
						}, 500, 'linear',function() {
							// Animation complete.
						});
					});
					
					
				}
				function cancelProf(){
					$('#eCont').animate({
						width:200
					}, 500, 'linear',function() {
						$('#eProf').animate({
							height: 0,
							opacity:0
						}, 500, 'linear',function() {
							// Animation complete.
						});
					});
					
					
				}
				
				function togs1(){
					$('#eSec').animate({
						width:965
					}, 500, 'linear',function() {
						$('#eSec1').animate({
							height: 345,
							opacity:1
						}, 500, 'linear',function() {
							// Animation complete.
						});
					});
				}
				function cancelAcc(){
					$('#eSec').animate({
						width:200
					}, 500, 'linear',function() {
						$('#eSec1').animate({
							height: 0,
							opacity:0
						}, 500, 'linear',function() {
							// Animation complete.
						});
					});
				}
				
				
			</script>
			<div style="background:black;padding:5px;width:200px;" id='eCont' >
				<b style="color:white;" onclick="togs()" >Edit my profile</b>
				<div id='eProf' style="opacity:0;height:0px;overflow:hidden;background:#f1f1f1;" >
					<br>
					<?php
						//require_once("editprofile.php");
					?>
				</div>
			</div>
			<div style="height:5px;" ></div>
			<div style="background:black;padding:5px;width:200px;" id='eSec' >
				<b style="color:white;" onclick="togs1()" >Edit my Security Account</b>
				<div id='eSec1' style="opacity:0;height:0px;overflow:hidden;background:#f1f1f1;" >
					<br>
					<form method=post>
						<table class='table'>
							<tr>
								<td width=120>User Name:</td>
								<td><input type='text' class='tt' value="<?php //echo $r["username"]; ?>" /></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><input type='text' class='tt' value="<?php //echo $r["email"]; ?>" /></td>
							</tr>
							<tr>
								<td>Confirm Email:</td>
								<td><input type='text' class='tt' value="<?php //echo $r["email"]; ?>" /></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input style="padding:2px 2px 2px 8px;font:bold 20px arial" type='password' class='tt' /></td>
							</tr>
							<tr>
								<td>Confirm Password:</td>
								<td><input style="padding:2px 2px 2px 8px;font:bold 20px arial" type='password' class='tt' /></td>
							</tr>
							<tr>
								<td colspan=2></td>
							</tr>
							<tr>
								<td>Current password:</td>
								<td><input style="padding:2px 2px 2px 8px;font:bold 20px arial" type='password' class='tt' /></td>
							</tr>
							<tr>
								<td align=center colspan=2 >
								<br>
								<input type=submit name='bSaveAcc' value="Save" class='b1' onclick="return valAcc();" />
								<input type='button' value="Cancel" onclick="cancelAcc()" 	class='b1' /></td>
							</tr>
							
						</table>
						<?php
							if(isset($_POST['bSaveAcc'])){
								
							}
						?>
					</form>
				</div>
			</div>
			<div style="height:5px;" ></div>
			<div style="background:black;padding:5px;width:200px;" >
				<b style="color:white;">Deactivate my account</b>
			</div>
			<form method=post >
				<br><br><bH>PRIVACY SETTINGS</bH><br><br>
				<table class="table">
					<tr><th width=370 align=left >Allow my followers to see Activity Feed Updates when: </th><th>Yes</th><th>No</th></tr>
					<tr><td>I love a look</td>		<td> <input type=radio checked 	name=opt1 /> </td><td> <input type=radio 	name=opt1 /> </td></tr>
					<tr><td>I love a comment</td>	<td> <input type=radio checked name=opt2 /> </td><td> <input type=radio 	name=opt2 /> </td></tr>
					<tr><td>I rate a look</td>		<td> <input type=radio checked 	name=opt3 /> </td><td> <input type=radio 	name=opt3 /> </td></tr>
					<tr><td>I drip a look</td>		<td> <input type=radio checked 	name=opt4 /> </td><td> <input type=radio 	name=opt4 /> </td></tr>
				</table>
				
				<br><br><bH>EMAIL SETTINGS</bH><br><br>
				<table class="table">
					<tr><th width=370 align=left >Send me a message when: </th><th>Yes</th><th>No</th></tr>
					<tr><td>Someone becomes my follower</td>			<td> <input type=radio checked 	name=opt5 /> </td><td> <input type=radio 	name=opt5 /> </td></tr>
					<tr><td>Someone comments to one of my looks</td>	<td> <input type=radio checked 	name=opt6 /> </td><td> <input type=radio 	name=opt6 /> </td></tr>
					<tr><td>Someone replies to one of my comments</td>	<td> <input type=radio checked 	name=opt7 /> </td><td> <input type=radio 	name=opt7 /> </td></tr>
					<tr><td>Someone comments to one of my blogs</td>	<td> <input type=radio checked 	name=opt8 /> </td><td> <input type=radio 	name=opt8 /> </td></tr>
				</table>
				<br><br>
				
				<input type=submit name='bSaveSettings' value="Save" class='b1'  />
				<input type='button' value="Cancel" onclick="window.location='index.php'" class='b1' /></td>
			</form>
		</div>
	</div>
	</div>
	<?php //require("footer.php"); ?>
-->






