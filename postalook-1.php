<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
 	// $_SESSION['mno'] = 934;
	// $_SESSION['mno'] = 133;
	// $_SESSION['mno'] = 134;  
	$mc = new myclass ( );
	$mc->auto_detect_path(); 
 	$mc->get_visitor_info( "" , "postalook" ); 
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 ); 
	echo " session ".$_SESSION['mno']."<br>";   
	$dateTime = $mc->date_time; 
	echo "date Time = $dateTime "; 
	 // echo " date time  = ".date("Y-m-d h:m:s").'<br>'; 
	 // echo " date  = ".date("Y-m-d").'<br>';    

	$mc->redirect_to_login_or_Signup_if_user_is_not_login( $_SESSION['mno'] , 'postalook' );




?>
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20317218-5']);
  _gaq.push(['_setDomainName', 'fashionsponge.com']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




<script src="fs_folders/labellok_items/js/plugin.js"></script> 

<?php
	
		if (empty($_SESSION['mno'])) {
			$mc->go('../betatest/login.php');
		}

		$err="";
		$errors=0;

		// if($_SERVER["REQUEST_METHOD"] == "POST")
		// {


		if ( isset($_POST['uploadNow']) ) { 
			// echo " posted";
		}
		else { 
			// echo " not posted ";
		}

		if ( isset($_POST['uploadNow']) ) { 

			$userfile_name = $_FILES['image']['name'];
			list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
			// echo "
			// 	image = $userfile_name<br> 
			// 	width = ".$width."px<br>
			// 	height = $height, <br>
			// 	type = $type, <br> 
			// 	attr = $attr <br>
			// 	file extention  = ".get_file_extension($userfile_name)."<br>

			// ";

			$fext = get_file_extension($userfile_name);
			if ($fext == 'jpg') { 
				if($width >= 140 && $height >= 140 ) { 
					if ( $_SESSION['post_a_look_is_look_upload_once_in_db'] == false )  { 
						$_SESSION['post_a_look_is_look_upload_once_in_db'] = true; 
						
						insert(
							'postedlooks',
							array(
								'mno',
								'date_'
							),
							array( 
								$_SESSION['mno'],
								$dateTime
							),
							'plno' 
							  
						);   
						$lplno = $mc->get_last_id( 'postedlooks' , 'plno' );  
						move_uploaded_file($_FILES["image"]["tmp_name"], "$mc->look_folder/$lplno.jpg");  
						// $img=$picno.".jpg";
						// $imgPath="images/members/posted looks/";
						// if( $width > 560 )
						// {
							// $resize = resizeImage($img, $imgPath, "", 560, 100);
						// }
						// resizeImage($img, $imgPath, "wookmark_", 300, 100);
						
						// copy("images/members/posted looks/$picno.jpg", "../fs-contest/images/members/posted looks/$picno.jpg");

					}

						// echo "$mc->look_folder/$lplno[plno].jpg";
				    if($_POST['t_edit']=="false")
				    {
						// jump("taglook");
						$mc->go("labellooks.php");
					}
					else
					{
						$mc->go("editimage");
					}
				}
				else 
				{ 
					// $err="<br>Look image size must be at least 480 x 480<br><br>";
					$err="<br>Look image size must be at least 140 x 140<br><br>";
				}
			}
			else 
			{ 
				$err="<br>(Image should be jpeg or jpg extention only )<br><br>";
			} 
		}





		function getExtension($str) 
		{
			 $i = strrpos($str,".");
			 if (!$i) { return ""; } 
			 $l = strlen($str) - $i;
			 $ext = substr($str,$i+1,$l);
			 return $ext;
		} 
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
	
	<?php
		// require("fb-sdk.php");
		//require_once("topMenu.php");



		// if ( !empty($_GET["id"])) 
		// {
		// 	$owner=$_GET["id"];
		// } 
		// if($owner<1)
		// { 
		// 	$owner=$_SESSION["mno"];
		// }
			
		// $page=0;
		// if($_GET['page']!="")
		// {
		// 	$page=$_GET["page"];
		// }
			
		// $ex=mysql_query("select * from fs_members where mno=$owner") or die(mysql_error());
		// $rs=mysql_fetch_array($ex);



	?>	
	
</head>

<body bgcolor="white">
	<div style="width:100%;top:0;left:0;position:absolute;text-align:center">		
	<br><br>
	<div onmousemove="getID('accMenu').style.display='none';" class="body" style="width:974px;margin:0 auto; border:1px solid #000;padding:10px;" >
		<?php //require("newHeader.php"); ?>
				
		<table id='load' width=100% height=100% style="position:absolute;top:0;left:0;background:black;opacity:.9;display:none;z-index:100">
			<td valign=center align=center>
				<img src="images/loading-1.gif" /><br>
			</td>
		</table>

	  <head>
		<title>POST a look</title>
	  </head>
							
	<table width=100% style="border-collapse:collapse;" >
		<td align=center>
			<table width=100% style="border-collapse:collapse;">
		
			<td valign=top  >
						<script>
							var i=0;
							function NewFile()
							{
								i++;
								var div_file = getID("div_files");
								var file = "<input type='file' id='file"+i+"' name='files[]' multiple value='Choose a photo' />";
								div_file.innerHTML = div_file.innerHTML+"<br>"+file;
							}
							
						</script>
					<!--<input type=image src="images/add-icon.png" id='addFile' value="Add more file" onclick="NewFile(); return false" /><br>-->
				<div style="padding:5px 35px 5px 35px;" >
					<center>
					<!-- <b style="font:bold 27px helvetica;//color:#45b1e2" >FashionSponge is looking for <b style="font:bold 30px helveticaBold;//color:#45b1e2" >"The World's Most Stylish"</b><br>will that be you? </b><br> -->
					</center>
					
					
				</div>


				<div style="padding:35px;border:1px solid #000;font:20px helvetica" >
					<!-- <b style="font:20px helveticaBold" >1. Submit 1 photo that clearly and fully shows your entire look.</b> -->


					<div style="padding:15px;">
						1. Submit 1 photo that clearly and fully shows your entire look.
					</div>
				 

					<div style="padding:15px;">
						2. Click the "Submit" button below follow the instructions and fill in the fields. 
						Leave only a short description of your look.
					</div>
					 <div style="padding:15px;">
						3. Read the posting a look rules.
					</div>
				 
					<b style="font:20px helveticaBold" >The Grand Prize</b>
					<br>

					<div style="padding:15px;">
						<li>$2000 in cash</li>
						<li>$575 credit to <a href="www.theschoolofstyle.com">www.theschoolofstyle.com</a></li>
						<li>FashionSponge merchandise</li>
						<li>Personalized Clear Acrylic Award</li>
						<li>Title of "World's Most Stylish"</li>
					</div>
					

					<br>
						<b style="font:19px helvetica;">
							FashionSponge and its team of moderators take pride in 
							the quality and fairness of this contest. Anyone who fails to adhere to 
							the rules entry will be disqualified from the contest.
							<b style="font:20px helveticaBold" >
								By submitting a photo to the site, you hereby agree to the rules above. 
							</b>
						</b>
					<br>					
					<br>




					<!--<div style="font:19px helvetica;padding:22px" >-->
				<form method=post enctype="multipart/form-data"  onsubmit="" _action="http://pixlr.com/express/?loc=en&referrer=FASHIONSPONGE.com&exit=http://fashionsponge.com/fs/labellooks.php&method=POST&target=http://fashionsponge.com/fs/labellooks.php&locktarget=true&locktitle=true&locktype=jpg&credentials=true"  >
				<!-- <form method=post enctype="multipart/form-data" action="labellooks/"  > -->
					


				   
						<div>	
							<div id="status" style="font:bold 19px helveticaBold">First, upload a photo:</div>
							<br>
							<div style="color:red;font:15px helveticaBold" id='errD' ><?php echo $err; ?></div>
								<input type=text name='t_edit' id="txt_edit" value="false" style="display:none;" /> 

								<?php 
									if($errors)
									{
										echo "<span style='font-family:helveticabold;color:red; font-size:12px'>";
									} 
									else
									{
										echo "<span style='font-family:helveticabold;color:#0099ff; font-size:12px'>";
									}
									echo "(Image should be jpeg or jpg extention only )</span><br>"; 

									?> 


								<input type="text" name="tUpID" id='tUpID' style="display:none" /> 
								<input type='file' onChange="getID('f-art').innerHTML=this.value;" id='file1' size=55 name='image' value='Choose a photo' style="cursor:pointer;padding:0px 0px 20px 0px;width:500px;font:bold 15px arial;"  /> 
								<!-- <div id="d_browse" onclick="onbrowse()" style="background:url('images/browse-back.png') no-repeat; padding:7px 40px 7px 7px;width:495px;font:bold 16px helveticaBold;cursor:pointer;"> -->
								
								<div id="d_browse" onclick="onbrowse()" style=" padding:0px; width:495px;font:bold 16px helveticaBold;cursor:pointer;"> 
 
 								<!-- <div id="f-art" style="width:400px;overflow:hidden;height:20px">No file chosen</div> -->
 
								</div>
								<div style="font:15px helvetica;">
									<input type="checkbox" id="chk_edit" onChange="getID('txt_edit').value=this.checked;" /> <label for="chk_edit" >I want to <b style="font:15px helveticaBold;">rotate</b> my photo first.</label>
								</div>
								<br>
								
								<span><input type='checkbox' id='c_agree' /> <label for='c_agree' >I agree to the</label> <b onClick="document.location='contestrules.php';" style='font-family:helveticabold;text-decoration:none;color:#0099ff;cursor:pointer' >posting looks rule</b><span><br><br>						
								<input style="border:0;cursor:pointer;background:#000;padding:5px 15px 5px 15px;color:white;font:bold 15px helveticaBold;" type="submit" name='uploadNow' id="postNow" value="SUBMIT" onclick="return agree();" /> 
								<input onClick="jump('home')" type=button value="Cancel" style="border:0;cursor:pointer;background:#fff;padding:5px;font:15px helveticaBold;color:#777" />
						<!--</div>-->
						</div>
						
						<style>
							#d_posted div{
								float:left;padding:2px;border:1px solid #aaa;
							}
						</style>
						<div id="d_posted">
				 
						</div>
				</div>
				
			</form>
	

					
		</td>
	</table>
		
  <?php //require("footer.php"); ?>
  </div>
  </div>

  
</body>
</html>


<?php



		if(!empty($_GET["ret"])=="error"){
			echo "
						<script>
							getID('errD').innerHTML='<br>You must select a file.<br><br>';
						</script>
					";
		}

?>






<script type="text/javascript">
	
	 
		 
	function agree()
	{	
		if($("#c_agree").is(':checked'))
		{
			// alert("posting now ")
			return true;
		}
		else
		{ 
			alert("You must agree to the Contest Rules to post your look.");
			return false;
		}
	}
	function onbrowse() 
	{
		document.getElementById('file1').click();
	}

	 </script>

















