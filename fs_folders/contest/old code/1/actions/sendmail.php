<?php 
	if (isset($_POST['submit']) or isset($_POST['uwebsite'])) {
		$_POST[uname]=strtolower($_POST[uname]);
		$_POST[uemail]=strtolower($_POST[uemail]);
		$_POST[uwebsite]=strtolower($_POST[uwebsite]);

$message = "
Thank you for singning up for an invitation to simple ! We
appreciate your interest and we're working hard to get you 
a board as soon as possible.

Check your email for a welcome message , and make sure to look
over our FAQ for more in-depth information about what we offer.

Best regards, 
Maurico Mussolini Moore
";
		$dot=false;
		$at=false;

		$str=$_POST['uemail']; 
		for ($i=0; $i < strlen($_POST['uemail']); $i++) { 
			if ($str[$i]=='@') {
				$at=true;
			}
			if ($str[$i]=='.') {
				$dot=true;
			}
		}


		if ($dot==true and $at==true) {  
			if ($_POST['uemail']!='e-mail' and !empty($_POST['uemail']) ) {
				$stat=mail("$_POST[uemail]","Thank you for signing up for an invitaion.",$message,"Hi $_POST[uname], " );
				if ($stat) {
					echo " <script type='text/javascript'> $(window).ready(function(){alert('Information sent'); })</script>";
				}else{ 
					echo " <script type='text/javascript'> $(window).ready(function(){alert('Information falled to sent '); })</script>";
				}
			}else { 
				echo " <script type='text/javascript'> $(window).ready(function(){alert(' Email should not be empty. '); })</script>";	
			}
		}else{ 
			echo " <script type='text/javascript'> $(window).ready(function(){alert('Sorry we need a valid email.'); })</script>";	
		}
	}
?>

