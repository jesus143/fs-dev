<?php 

/**
* Jan 9, 2015
*/

class ContentManagementDb
{
	

	private static $content  = '';
	private static $title    = ''; 
	public  static $database = '';

	function __construct()
	{ 
	}
 
	public static function setContent($title)
	{

		// query database using unique name 
		$response      = database::selectV1('cms', '*', "title = '$title' order by id desc limit 1" );   

		if (!empty($response)) 
		{
			self::$content = $response[0]['content']; 		
			self::$title   = $response[0]['title']; 	
			return TRUE;
		}
		else
		{

			self::$title = $title;  
			return FALSE;
		}
		
	}
	public static function getContent()
	{  

	 	return self::$content;
	} 
	public static function getTitle()
	{  

	 	return self::$title;
	} 
	public static function updateContent($title, $content)
	{     
		if (!empty($title) and !empty($content)) 
		{
			return self::$database->insert('Cms', array('title'=>$title, 'content'=>$content));  	 
		}
		else 
		{ 
			return FALSE;
		} 
	} 
	public static function getListOfBlogs()
	{ 
 		return database::selectV1('cms', 'title', "id>0 GROUP BY title" );    
	} 
}
