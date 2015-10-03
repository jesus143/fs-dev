<?php 
	require("../../php_functions/connect.php");
	require("../../php_functions/function.php");
	require("../../php_functions/myclass.php");
	require("../../php_functions/library.php");
	require("../../php_functions/source.php");
	$mc = new myclass(); 
	$it = new info_tabs();
	


	




	// if ( $tab == "advertise") 
	// {
		 $it->advertise( $mc );
	// }

 
		 // echo " asda s".$_GET["tab"];


/**
* created : tuesday nov 19, 2013 
*/


class info_tabs
{

	public function advertise( $mc )
	{  
		$mc->date_difference();


		// echo "dateTime = ".$mc->date_time."<br>";

	
		// echo "First Name is empty "; 

		echo " <hr><span style='color:green; font-size:20px;font-weight:bold;' id='ad_fail' > Please Fix The Following (<span style='color:red'> * </span> ) <br><br> </span>";
		
	
		$c=1;
		$sccs = true;

		if ( $_GET["tab"] == "advertise") 
		{
			echo "<span style='color:green; font-size:20px;font-weight:bold;' id='ad_succs' > 
					Thank you so much, your Advertisement Info was Successfully Saved and we will get back to you ASAP, from fs-team. <br>
			</span>";
		   	$adfn   = $_GET["adfn"];
			$adln   = $_GET["adln"];
			$adem   = $_GET["adem"];
			$adw    = $_GET["adw"];
			$adbn   = $_GET["adbn"];
			$adpn   = $_GET["adpn"];
			$adb    = $_GET["adb"];
			$pfad   = $_GET["pfad"];
			$ur     = $_GET["ur"];
			$atarea = $_GET["atarea"];
			

			$fields = array(
				'firstname' => $adfn, 
				'lastname' => $adln , 
				'email' => $adem , 
				// 'password' => null, 
				// 'cpassword' => null, 
				// 'address' => null, 
				'website' => $adw , 
				'business_name' => $adbn, 
				'phone_number' => $adpn , 
				'badget' => $adb, 
				'preferred_advertise' => $pfad, 
				'you_are' => $ur, 
				'message' => $atarea , 
			 
				);
			// $c=1;
			// $sccs = true; 
			if ( empty($fields["firstname"])  ) 
			{
				echo "$c.)  First Name is Empty<br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($fields["lastname"])  ) 
			{
				echo "$c.) Last Name is Empty<br>";
				$c++;
				$sccs = false; 
			} 
			if ( empty($fields["email"])  ) 
			{
				echo "$c.) Email is Empty<br>";
				$c++;
				$sccs = false; 
			}
			else if(!filter_var($fields["email"], FILTER_VALIDATE_EMAIL)){ 
			    echo "$c.) Email is Invalid<br>";
				$c++;
				$sccs = false; 
			}  
			if ( empty($fields["website"])  ) 
			{
				echo "$c.) Website Empty <br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($fields["business_name"])  ) 
			{
				echo "$c.) Business Name Empty <br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($fields["phone_number"])  ) 
			{
				echo "$c.) phone Number Empty <br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($fields["badget"])  ) 
			{
				echo "$c.) Badget is Empty <br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($fields["preferred_advertise"])  ) 
			{
				echo "$c.) Preferred Advertise is Empty <br>";
				$c++;
				$sccs = false; 
			} 
			 if ( empty($fields["message"])  ) 
			{
				echo "$c.) Your Message is Empty<br>";
				$sccs = false; 
			}
			//  if ( empty($fields["tab"])  ) 
			// {
			// 	echo "$c.) Email is Empty<br>";
			// } 



			echo " 
				<br>
				<hr>
				<table style='float:right' border='0' cellpadding='0' cellspacing='5' >
 					<tr> "; 
 						if ( $sccs == true ) 
 						{  
 							// echo " successs";
 							// echo "<td> <input id='b1' class='b1' type='button' value='close' onclick='close_clear_content( )' /> </td> ";
 					 		 
 					 		echo  "
 					 			<td> <input   type='button' value='close'  onclick='close_clear_content( )' /> </td>
 					 			<td> <input  id='b2' class='b2'   type='button' value='home'   onclick='b2()' />       /> </td> 
 					 		";
 					 	}
 					 	else 
 					 	{	 
 					 		// echo "not success";
 					 		echo "<td> <input id='b1' class='b1' type='button' value='close' onclick='hide_popUp( )' /> </td> ";
 					 		echo  "<td> <input id='b2' class='b2' type='button' value='home' onclick='b2()' />          </td>";
 					 	}
 					echo "  
 				</table> 
			";

			if ( $sccs == true ) 
			{
				// echo " success <br>";
				echo "<style> 
					#ad_fail { display: none; }  
					#b1 { display:none; }
				</style>";

			 
				// advertise_id
				// advertise_firstname
				// advertise_lastname
				// advertise_email
				// advertise_website
				// advertise_business_name
				// advertise_phone_number
				// advertise_budget
				// advertise_preferred
				// advertise_you_are
				// advertise_message
				// advertise_datetime


				insert(
						"fs_info_advertise", 
						array(  
							'advertise_firstname',
							'advertise_lastname',
							'advertise_email',
							'advertise_website',
							'advertise_business_name',
							'advertise_phone_number',
							'advertise_budget',
							'advertise_preferred',
							'advertise_you_are',
							'advertise_message',
							"advertise_datetime"
						), 
						array(
							"$adfn",
							"$adln",
							"$adem",
							"$adw",
							"$adbn",
							"$adpn",
							"$adb",
							"$pfad",
							"$ur",
							"$atarea",
							$mc->date_time
						),
						'advertise_id'
					);

					$subject = "Info - Advertise";

					// $fullName = $invited_fn." ".$invited_ln;
					// $ipi = $_SERVER["REMOTE_ADDR"];
				

					$body = "\n\nFull Name: ".$adfn."".$adln.
					"\nAdvertise Email: ".$adem.
					"\nAdvertise Website: ".$adw. 
					"\nAdvertise Business Name: ".$adbn.
					"\nAdvertise budget: ".$adb. 
					"\nadvertise preferred: ".$pfad.
					"\nadvertise you are: ".$ur.
					"\nmessage: ".$atarea.
					"\nDate Time: ".$mc->date_time; 
				    mail('mrjesuserwinsuarez@gmail.com', $subject, $body, "From: $adem");
				    mail('info@fashionsponge.com', $subject, $body, "From: $adem"); 
 
 
			}
			else 
			{ 
				// echo " failled <br>";
				echo "<style> #ad_succs { display: none; } </style>";

			}  
		}
		if ( $_GET["tab"] == "contact_us") 
		{ 
			echo "<span style='color:green; font-size:20px;font-weight:bold;' id='ad_succs' > 
					Thank you so much for contacting us, we will get back to you ASAP, from fs-team.  <br>
			</span>";
			$contact_us_email = $_GET["contact_us_email"];
			$contact_us_subject = $_GET["contact_us_subject"];
			$contact_us_message = $_GET["contact_us_message"]; 


			// echo " $contact_us_email <br>
			// $contact_us_subject <br>
			// $contact_us_message ";




			if ( empty($contact_us_email)  ) 
			{
				echo "$c.) Message is empty<br>";
				$c++;
				$sccs = false; 
			} 
			else if(!filter_var($contact_us_email, FILTER_VALIDATE_EMAIL)){ 
			    echo "$c.) Email is Invalid<br>";
				$c++;
				$sccs = false; 
			}   
			if ( empty($contact_us_subject)  ) 
			{
				echo "$c.) Subject is empty<br>";
				$c++;
				$sccs = false; 
			}
			if ( empty($contact_us_message)  ) 
			{
				echo "$c.)Message is empty<br>";
				$c++;
				$sccs = false; 
			} 

			echo " 
				<br>
				<hr>
				<table style='float:right' border='0' cellpadding='0' cellspacing='5' >
 					<tr> "; 
 						if ( $sccs == true ) 
 						{  
 							// echo " successs";
 							// echo "<td> <input id='b1' class='b1' type='button' value='close' onclick='close_clear_content( )' /> </td> ";
 					 		 
 					 		echo  "
 					 			<td> <input   type='button' value='close'  onclick='close_clear_content( )' /> </td>
 					 			<td> <input  id='b2' class='b2'   type='button' value='home'   onclick='b2()' />       /> </td> 
 					 		";
 					 	}
 					 	else 
 					 	{	 
 					 		// echo "not success";
 					 		echo "<td> <input id='b1' class='b1' type='button' value='close' onclick='hide_popUp( )' /> </td> ";
 					 		echo  "<td> <input id='b2' class='b2' type='button' value='home' onclick='b2()' />          </td>";
 					 	}
 					echo "  
 				</table> 
			";





			if ( $sccs == true ) 
			{
				// echo " success <br>";
				echo "<style> #ad_fail { display: none; }  </style>";

			 
  
 


				insert(
						"fs_info_contact_us", 
						array(  
							'contact_us_email',
							'contact_us_subject',
							'contact_us_message',
							'contact_us_datatime'
						), 
						array(
							"$contact_us_email",
							"$contact_us_subject", 
							"$contact_us_message",
							$mc->date_time
						),
						'contact_us_id'
					);

					$subject = "Info - Contact Us";

					// $fullName = $invited_fn." ".$invited_ln;
					// $ipi = $_SERVER["REMOTE_ADDR"];
				

					$body = "\n\nEmail: ".$contact_us_email.
					"\nSubject: ".$contact_us_subject.
					"\nMessage: ".$contact_us_message;

				    mail('mrjesuserwinsuarez@gmail.com', $subject, $body, "From: $contact_us_email"); 
				    mail('info@fashionsponge.com', $subject, $body, "From: $contact_us_email"); 

				    
			}
			else 
			{ 
				// echo " failled <br>";
				echo "<style> #ad_succs { display: none; } </style>";

			}  
		} 
	} 
}





 
?> 
