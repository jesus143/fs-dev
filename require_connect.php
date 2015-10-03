<?php 



	 
	 
	class con
	{
		public function local_connect()  
		{  
			require ("fs_folders/php_functions/connect.php");
			require ("fs_folders/php_functions/function.php");
			require ("fs_folders/php_functions/library.php");
			require ("fs_folders/php_functions/source.php");
			require ("fs_folders/php_functions/myclass.php"); 
		}
		 public function variable_path_set() 
		 { 
		 	// echo $_SERVER['HTTP_HOST'].'<BR>';

		 	if ($_SERVER['HTTP_HOST'] == 'localhost') 
		 	{
		 		// echo "local server";	 
		 		$this->plook = '../../fs/fs/images/members/posted looks/lookdetails/';
			 	// $this->pmember = 
			 	// $this->pblog = 
			 	// $this->photo = 
		 	}
		 	else
		 	{ 
		 		// echo "online server";
		 		$this->plook = '../betatest/images/members/posted looks/lookdetails/';
			 	// $this->plook = 
			 	// $this->pmember = 
			 	// $this->pblog = 
			 	// $this->photo = 
		 	}
		
		 }
	}
		
	
?>