<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
	$mc = new myclass();
	$am = new admin();
	$mc-> auto_detect_path();
	$am->initialize_when_reload(); 
	$adminpage  = ( !empty($_GET['p']) ) ? $_GET['p'] : '' ;   
	if (empty($_SESSION['adm_no'])) {
		$mc->go("adminlogin.php"); 
	}else{  

 

 



		switch ( $adminpage ) {
			case 'viewlooks':
				 	$nv1 = 'color:white;background-color: #284372;';
				break;
			case 'uploadbrands':
					$nv2 = 'color:white;background-color: #284372;';
				break; 
			case 'users':
					$nv3 = 'color:white;background-color: #284372;';
				break; 
			case 'gc-signup':
					$nv4 = 'color:white;background-color: #284372;';
				break;
			case 'modals':
					$nv5 = 'color:white;background-color: #284372;';
				break;
			case 'invited':
				 	
				break;
			case 'Cms':
				 	$nv7 = 'color:white;background-color: #284372;';
				break;
			default: 
					$nv1 = 'color:white;background-color: #284372;';
				break;
		}








?> 
		<html> 
			<head>  
				<link rel="stylesheet" type="text/css" href="fs_folders/admin/css/admindashboard.css"> 
				<script type="text/javascript" src="fs_folders/js/jQv1.8.2.js" ></script>
				<script type="text/javascript" src="fs_folders/js/function_js.js" ></script>
				<script type="text/javascript" src="fs_folders/admin/js/admin_js.js" ></script>
				<script type="text/javascript" src="fs_folders/admin/js/admin_query.js" ></script> 
				<?php  
		 			$mc->header_attribute( "Admin | Dashboard" );  
		 		?>    
			</head> 
			<body> 
				<div id="admin_dashboard_wrapper" > 
				 	<div id="admin_dashboard_header"> 
					 	<table border="0" id="ad_header_table" >  
					 		<tr>
					 			<td> 
								 	<span id="ad_welcome_message">
								 		
								 		[ fs-admin-dashboard  ] 
								 		Welcome back Master .. (Moore Mussolini!)

							 		</span>

							 		<a href="fs_folders/admin/php_file/logout.php">
							 			<input id="ad_logout" title="logout?" type="button" value="Log Out?"  /> 
							 		</a>
							 		<hr>
						 		</td>
						 	<tr>  
						 		<td> 
							 		<span onlcick = "" > 
							 			 look
							 		</span>	   
					 			</td>
					 	</table>
				 	</div>
				 	<div id="admin_dashboard_body">   
						<div id="admin-nav-container" style=" padding-left:50px"> 
						 	<ul>
						 		<a href='admindashboard?p=viewlooks'       ><li style="<?php echo "$nv1"; ?>" > View Looks</li></a>
						 		<a href='admindashboard?p=uploadbrands'    ><li style="<?php echo "$nv2"; ?>" > Upload Brands </li>  </a> 
						 		<a href='admindashboard?p=users'           ><li style="<?php echo "$nv3"; ?>" > View Users</li>  </a>
						 		<a href='admindashboard?p=gc-signup'       ><li style="<?php echo "$nv4"; ?>" > Sign Up Generated Code</li>  </a> 
						 		<a href='admindashboard?p=modals'     	   ><li style="<?php echo "$nv5"; ?>" > modals </li>  </a> 
						 		<a href='admindashboard?p=Cms'     	       ><li style="<?php echo "$nv7"; ?>" > CMS </li>  </a> 
						 	</ul>
					 	</div>  
					 	<table border="0" cellpadding="0" cellspacing="0" >
					 		<tr> 
						 		<td>  
							 		<?php     
//								 		if ($adminpage == 'uploadbrands' || $adminpage == 'users' ||  $adminpage == 'viewlooks' || $adminpage == 'gc-signup' || $adminpage == 'modals' ||
//								 			$adminpage == 'Cms') {
//								 			require("fs_folders/admin/php_file/$adminpage.php");
//								 		} else {
//								 			require("fs_folders/admin/php_file/viewlooks.php");
//								 		}
                        if(file_exists("fs_folders/admin/php_file/$adminpage.php")) {
                            require("fs_folders/admin/php_file/$adminpage.php");
                        } else {
                            require("fs_folders/admin/php_file/viewlooks.php");
                        }




                                    ?>
								</td>
							<tr> 
								<td> 
									<center>
										<div id = 'admin_more' onclick='more("look")' > 
											more
										</div>
									</center>
								</td>
						 	</div>
						</table>   
						 	<div id="member"></div>
						 	<div id="blogs"></div>
						 	<div id="article"></div>
					</div> 
				</div>
			</body>

      		<!-- JavaScript placed at the end of the document so the pages load faster -->
	      	<!-- Optional: Include the jQuery library -->
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	      	<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
	        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 




		<html> 
<?php } ?>



 