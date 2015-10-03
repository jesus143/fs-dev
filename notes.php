<?php   



	/*
	*	1.) remaining task is to make the field as a dropdown the table already has been created 
	*	2.) table added fs_modal_attribute_cat , fs_modal_attribute
	*/
	   
	
   /* date created september: 19 2014
	* fs_modal_attribute_cat =>               , this is the table name
	* matcno                 =>     int( 25 ) , primary key 
	* name                   => varchar( 25 ) , name of the attribute
	* total                  =>     int( 25 ) , total of the items
	* date                   => dateTime(   ) , date created 
	*
	* // category values 
	*
	* [1] material 
	* [2] garment
	* [3] pattern
	* [4] brand
	* [5] color
	* [6] keyword
	* [7] season
	* [8] Occasion
	* [9] style   
	*/ 

	
   /*
	* fs_modal_attribute => 			   , this is the table name
	* matno              => int ( 25 )     , table id  
	* matcno             => int ( 25 )     , foriegn key
	* name               => varchar ( 25 ) , name of the attribute 
	* total              => int ( 25 )     , total people using this
	* mno                => int ( 25 )     , this is the person who added the attribute
	* status             => boolean ( )    , this is to know that this attribute is visible to the site if 0 = not visible , 1 = visible
	* date               => dateTime()     ,  date created
	*/







	#Created: may 2 , 2014
	#Author : Jesus Erwin Suarez
	


	#server version: 
		#Current PHP version: 5.4.7
		#Current Xampp version: 1.8.1

		

	#softwar
		# setup live reload sublime text 2: http://www.ishaanrawat.com/setting-up-livereload-for-sublime-text-2/ 

		  
	#fs_members: 

		/*
		*  table name : fs_members 
		*  action: Following , Followed  
		*/  
		#user equivalent percentage :  
			/* 
			* 1-28   => Terrible styling
			* 29-56  => Poor styling
			* 57-70  => Good styling
			* 71-85  => Verry Good styling
			* 86-100 => Excenlent styling
			*/


	#postedlooks:   
		/* 
		* 
		*
		*
		*
		*/

	#fs_postedarticles: 

		/*
		*
		*
		*
		*
		*/ 

	#fs_postedmedia: 

		/*
		*
		*
		* 
		*
		*
		*/

	#modals
		 /*
		 *  1.) kong mag add na ug advertisement kopyahon ang class nga hidden para mo work sya sa fadein. kai humana man ang member ug look modals
		 *  2.) open and close <li > </li>  change to <modals-item >
		 *  3.) all active 0 is needs to be deleted
		 */
    #search
		 /*  
		 * 	1.) to search a function in a file u need to open the main file if plugin check the plugin and soon u can find it.
		 *
		 */ 
	#error : 

		 /*	
		 	comment.
		 	when the owner member deleted the modal it needs to be back to the posted by
		  


   #login 
   		error
   		    1. ) uncaught when user is currently login using fb and visited to the login area.



































?>