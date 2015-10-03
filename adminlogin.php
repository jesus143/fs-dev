<?php  
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");

	$mc = new myclass();

	if (!empty($_SESSION['adm_no'])) 
	{
		$mc->go("admindashboard");
	}
	else 
	{  
		if ( isset($_POST['admin_submit_login']) )  
		{
			$admin_username = $mc->clean_input( $_POST['admin_username'] );
			$admin_password = $mc->clean_input( $_POST['admin_password'] );
			
			$logIn = $mc->set_Login_admin( $admin_username , $admin_password , array('tableName'=>'admin','userRow'=>'adm_user','passRow'=>'adm_pass') );
			if ( $logIn ) {
				// echo"login";
				$_SESSION['adm_no'] = 1;
				$mc->go("admindashboard");
			}
			else  {
				$_SESSION['admin'] = 0;
				// echo"Invalid info";
			}
		}
	}
 
?>

<html> 
	<head> 
		<link rel="stylesheet" type="text/css" href="fs_folders/admin/css/adminlogin.css">
		<title> admin | log in</title>
	</head>
	<body> 
		<div id="admin_wrapper" > 
			<div id="admin_header"> 
			</div>
			<div id="admin_body"  > 
				<form action="adminlogin" method="POST" >
					<table id="login_table" border="0" cellpadding="7"  > 
						<tr> 
							<td> Username:  </td>
							<td> <input type="text" name="admin_username"  id="" >  </td>
						<tr>  
							<td> Username:  </td>
							<td> <input type="password" name="admin_password" id="" >  </td>
						<tr> 
							<td></td>
							<td> <input type="submit" name="admin_submit_login" >  </td>			
					</table>
				</form>
			</div>
		</div>
	</body>
<html> 




 