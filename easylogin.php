<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>EasyLogin v1.3</title>
	<!-- Demo CSS -->
	<link rel="stylesheet" href="easylogin/assets/css/demo.css">
	<!-- jQuery -->
	<script src="easylogin/assets/js/jquery-1.11.0.min.js"></script>
</head>
<body>
	<div id="container">
		<h1 class="demo-title">EasyLogin <small>v</small><span>1.3</span></h1> 
		<?php  
			// Path to load.php 
			require_once 'easylogin/includes/load.php';
			$EL = EasyLogin::getInstance(); 
			// Load templates for modals
			load_templates();  
		?>    
		<div style="text-align:center;">
			<?php if (is_user_logged_in()): ?>
				
				Howdy, <?php echo current_user('username'); ?> | 
				<a href="#" data-toggle="modal" data-target="#EL_account">My Account</a> | 
				<?php if (current_user('role') == 'admin'): ?>
					<a href="admin/">Admin</a> |
				<?php endif; ?>
				<a href="#" onclick="EasyLogin.signout();">Sign out</a>
				<br><br><img src="<?php echo current_user('avatar'); ?>" class="user-avatar" width="100" height="100"/>

			<?php else: ?> 
				<a href="#" data-toggle="modal" data-target="#EL_signin" >Sign in</a> |
				<a href="#" data-toggle="modal" data-target="#EL_signup">Sign up</a> 
			<?php endif; ?>
		</div>  
		<!-- <h2 class="getit"><a href="http://codecanyon.net/user/HazzardWeb/portfolio">Get it Now !</a></h2> -->
	</div>
</body>
</html>




 
