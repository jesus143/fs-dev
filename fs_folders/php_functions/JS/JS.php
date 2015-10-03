<?php 
/**
*  Jan 15, 2015
*/
class JS 
{
	
	function __construct()
	{ 
	}

	public static function redirect($link)
	{ 
		echo "<script type='text/javascript'>document.location='$link'</script>"; 
		exit;
	}
}

