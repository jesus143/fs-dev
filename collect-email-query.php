<?php  
	require ("fs_folders/php_functions/connect.php"); 
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php");  
    $mc = new myclass();  
    $pa = new postarticle ( );
    $sc = new scrape();  
    $mc->auto_detect_path();     
    set_time_limit(0); 
    ignore_user_abort(true);
    ini_set('max_execution_time', 0); 
?>  
<!DOCTYPE html>
<html>
<head>
	<title> 
		None stop scraping	
	</title>
	<?php $mc->header_attribute( );   ?>	 
	<script type="text/javascript">  
        jQuery(window).load(function(){ 
            document.location='collect-email-query.php'
        });
	</script>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> 
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css"> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
</head>
<body>    
	<div id="hide">  
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style='display:none' > 
			<input type="text" placeholder='scrape at page start' name="page_start" >
			<input type="text" placeholder='scrape at page end'   name="page_end" >
			<input type="submit" value="SEARCH NOW" name="SCRAPE_NOW" />
		</form>   
		<button type="button" class="btn btn-lg btn-danger">Start</button> 
			<div class="container" style=" position: relative;  border: 1px solid red; height: 150px overflow: scroll; "> 
				<?php   	 
					echo " last src page = ".$sc->get_latest_src_page_number_from_fs();

					$sc->get_usernames_users( 
						array(
							'page_start'=>$sc->get_latest_src_page_number_from_fs(),//page start to search page number is returning the latest source retrieved from the database
							'page_end'=>38751//this is the total page of the lookbook user so the scraping stops when the page reaches
						),
						$mc 
					);  
				?>
			</div>  
		</div> 
	</body> 
</html>  

