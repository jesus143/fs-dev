<?php		
		include("connect.php");
		session_start();
		$id=$_GET['id'];
		$ex=mysql_query("select * from fs_members fs,fs_member_accounts fa where fs.mno=fa.mno and fs.fbid=$id or fs.twid=$id")or die(mysql_error());
		if($rs=mysql_fetch_array($ex)){
			$_SESSION["mno"]=$rs[0];
			$_SESSION["fbid"]=$id;
			 

		}
		else{
			$type=$_GET['type'];
			
			$fn=$_GET['fn'];
			$ln=$_GET['ln'];
			$gen=$_GET['gen'];
			$bdate=split("/",$_GET['bd']);
			$bdate=$bdate[2]."-".$bdate[0]."-".$bdate[1];
			$email=$_GET['email'];
			$un=str_replace(".","",$_GET['un']);
			
			$ips=1;
			
			
			if($type=="twitter"){
				$qry="INSERT INTO fs_members(firstname,lastname,bdate,twid,ispicset,datejoined) values('$fn','$ln','$bdate','$id',$ips,'".date("Y-m-d")."')";
				//echo "=----".$qry."=-----<br>";
				mysql_query($qry) or die(mysql_error());
				$ex=mysql_query("select * from fs_members where twid=".$id) or die(mysql_error());
				$r=mysql_fetch_array($ex);
				$mno=$r[0];
				$_SESSION["mno"]=$mno;
				$_SESSION["fbid"]=$id;
			}
			else if($type=="facebook"){
				$qry="INSERT INTO fs_members(firstname,lastname,bdate,fbid,ispicset,datejoined)values('$fn','$ln','$bdate','$id',$ips,'".date("Y-m-d")."')";
				//echo "=----".$qry."=-----<br>";
				mysql_query($qry) or die(mysql_error());
				$ex=mysql_query("select * from fs_members where fbid=".$id) or die(mysql_error());
				$r=mysql_fetch_array($ex);
				$mno=$r[0];
				$_SESSION["mno"]=$mno;
				$_SESSION["fbid"]=$id;
			}
			
			@session_start();
			
			$_SESSION["mno"]=$mno;
			$_SESSION["fbid"]=$id;
			mysql_query("INSERT INTO fs_member_accounts values(0,$mno,'$email','$un','$pass')") or die(mysql_error());
			mysql_query("insert into activity values(0,$mno,'Joined','fs_members',$mno,'".date("Y-m-d H:m:i")."')") or die(mysql_error());
			$ex=mysql_query("select m.mno, m.bdate,m.firstname, m.lastname from fs_member_accounts ma, fs_members m where ma.email='$email' and ma.mno=m.mno");
			$r=mysql_fetch_array($ex);
			
			function RandNumber($e){ 
				for($i=0;$i<$e;$i++){
					$rand =  $rand .  rand(0, 9);  
				}
				return $rand;
			}
			$rnd=RandNumber(10);
	 
			mail($email,"Validate your email - from FashionSponge.com",
			"Dear $r[2],
			Your membership with FashionSponge.com requires you to validate your email address.
			Please click on the link below to validate your email address. 
			http://fashionsponge.com/fs/validateemail.php?val=$r[0]-$rnd ","");
			
			if($type=="twitter")
			{
				//copy($_GET['imgURL'],"images/members/".$mno."_small.jpg");
				//copy($_GET['imgURL'],"images/members/".$mno."_square.jpg");
				//copy($_GET['imgURL'],"images/members/".$mno."_large.jpg");
				copy("http://api.twitter.com/1/users/profile_image?user_id=".$id."&size=bigger","../images/members/".$mno.".jpg");
			}
			
			if($type=="facebook")
			{
				//copy("http://graph.facebook.com/$id/picture?type=small","../images/members/".$mno."_small.jpg");
				//copy("http://graph.facebook.com/$id/picture?type=square","../images/members/".$mno."_square.jpg");
				copy("http://graph.facebook.com/$id/picture?type=large","../images/members/".$mno.".jpg");
			}
			//jump("profile");
		}
?>