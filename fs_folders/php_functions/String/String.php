<?php
/**
* jan 1, 2015
*/ 

class String
{ 
	function __construct()
	{ 
	}
	public static function removeLeadingAndTrailingSpaces($string)
	{  
		$string = ltrim($string);
		$string = rtrim($string);  
		return $string; 
	}
	public static function isEmpty($string , $emptyVal)
	{  
		// if the string is empty then the emptyVal value will return 
		return  (!empty($string)) ? $string : $emptyVal ;  
	} 
	public static function onlyNumbersAllowed()
	{ 

	}
	public static function onlylettersAllowed()
	{ 

	}
	public static function clean($text)
	{ 
		$text = mysql_real_escape_string($text); 
		return $text;
	}
} 
