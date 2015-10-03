<?php 
		// if ( file_exists("../../../fs/fs/images/members/134.jpg")) 
		// {
		// 	echo " image exist ";
		// }
		// else 
		// { 
		// 	echo " image not exist ";
		// }


		$ads_counter = 2;
		$c = 0; 

		for ($h=1; $h < 0 ; $h++) 
		{ 


			$ads = 'ads don\'t print'; 

			if ($ads_counter == 2 ) 
	  		{	
	  			$c++; 

	  				// echo "string";
	  			 if ( $h ==  $ads_counter ) 
	  			 {   
		  			$ads_counter = $ads_counter + 10;
					$ads  = "print ads $c ";
					// echo " print ads ";
					$c=0;
	  			 }
	  		}
	  		else if  ( $ads_counter > 2) 
	  		{
	  			$c++; 
	  			if ( $h == $ads_counter ) 
	  			{ 
					$ads_counter = $ads_counter + 10;
					$ads  = "print ads $c ";
					$c = 0;
	  			}
	  		}




	  		




	  		echo " $h = ads =  $ads <br>";
	  		
		}

?>


<style type="text/css">
	#div_text 
	{ 
		white-space: normal;
		border: 1px solid #000;
		width: 200px;
		padding: 0;
		margin:0;
		word-spacing: 2;
		outline-width: 20px;
		text-transform: capitalize;
		line-height:90%;
	}


</style>
<div id='div_text'> 

jesus erwin suarez wewqe qwe qwe qkuy eug uwyefg uweywueruwgruwr uywrtwr twert wert we
</div>
