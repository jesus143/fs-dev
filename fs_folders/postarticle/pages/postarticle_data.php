<?php 
	require("../../../fs_folders/php_functions/connect.php");
	require("../../../fs_folders/php_functions/function.php");
	require("../../../fs_folders/php_functions/myclass.php");
	require("../../../fs_folders/php_functions/library.php");
	require("../../../fs_folders/php_functions/source.php"); 


	$mc = new myclass();
	$pa = new postarticle();
	$ri = new resizeImage();
 


	$url = $_GET['article_url_inputed'];

	echo " url = $url <br> "; 

	// $imagesArray = array();

if ( true ) 
{
 
	// if ( !empty($_POST['articleLink']) ) 
	// 	{
	// 		$_SESSION['url'] = $_POST['articleLink'];
	// 	}
	// 	$url = $_SESSION['url']; 



		// if (empty($url)) 
		// {	
		//  	$url = 'http://altamiranyc.tumblr.com';
		//  	$imagesArray = $pa->retrieved_Images_and_display_in_page( $url, $mc , $ri );
		//  	echo "url is empty";
		// }
		// else 
		// { 
			$imagesArray = $pa->retrieved_Images_and_display_in_page( $url , $mc , $ri);
		// 	echo "url is not empty";
		// }


		// print_r($imagesArray);


		// echo "
		// 	<b> total article found </b>".count($imagesArray)." 
		// 	<table id='img_table' cellspacing='10' cellpadding='10' >";
		// 		$number = 0;
		// 		for ($i=0; $i < count($imagesArray) ; $i++) 
		// 		{ 
		// 			if ( $i < 5 ) 
		// 			{
					 
		// 				$number++;
		// 				$_SESSION['imagesArray'] = $imagesArray; # used for 3 stage
		// 				$image_name = $imagesArray[$i]['image_name'];
		// 				$image_whole_source = $imagesArray[$i]['image_whole_source']; 
		// 				$image_souce = $imagesArray[$i]['image_souce']; 

		// 				echo  " <tr> 
		// 							<td> 
		// 								<div id='img_div'>
		// 									 <center> <a href='postarticle?postarticle_page=selected_article&article_source=$i' > <img src='$image_souce' /> </center> 
		// 								</div> 
		// 							</td>"; 
		// 			}
		// 			else 
		// 			{ 
		// 				$i = count($imagesArray);
		// 			}
		// 		}	
		// echo "</table>";
}

?>


<?php 
	
	class postarticle  
	{
		
		public function retrieved_Images_and_display_in_page( $url , $mc , $ri )
		{


			// $is_online = $this->url_exists($url);
			// $imagesArray = array();

			// if( $is_online )  
			// { 
				echo "url is online and getting the content to it.";

			
					$content = file_get_contents($url);
					// echo "$content<br>";
					// echo "getting file successful.";
				if ( true ) 
				{
					$c=0;
					for ($i=0; $i < strlen($content) ; $i++) 
					{ 
						if ( $content[$i] == '<' and $content[$i+1] == 'i' and $content[$i+2] == 'm' and  $content[$i+3] == 'g' ) 
						{
							$glc = 0; #get line counter
					 		$code_line = substr($content,$i+1,400); # get the line as the image belongs
							$code_line = substr($content,$i+1,strpos($code_line,'/>')+2); #cut until image only
							$jpg_post = strpos($code_line, '.jpg');

							# new get img name 
								/*
								$c1=0;
								for ($k=$jpg_post; $k > 0 ; $k-- ) 
								{ 
								 	if ($code_line[$k] == "/") 
								 	{					 		
								 		$image_name = substr($code_line,$k+1,$c1-1);
								 		$k=0;
								 	}
								 	$c1++;
								}
								*/
								$image_name = 'image name disable';
							#end get img name 
							#new get image source

								$c2=0;
								for ($l=$jpg_post; $l > 0 ; $l-- ) 
								{ 
								 	if ( $code_line[$l] == 's' and $code_line[$l+1] == 'r' and $code_line[$l+2] == 'c' and  $code_line[$l+3] == '=' ) 
								 	{					 		
								 		$image_souce = substr($code_line,$l+5,$c2-1);
								 		echo " $i image source = $image_souce <br>";
								 		// echo "string";
								 		$l=0;
								 	}
								 	$c2++;
								}
								// echo "$image_souce<br>";
							#end get image source
							
							if ( $jpg_post ) #select jpg only.
							{ 
								#jpg extention

								echo "$image_souce <br>";
								if ( $this->url_exists($image_souce)  ) 
								{  
									$ri->load($image_souce);

									echo "<br> width = ".$ri->getWidth(); 
									echo "<br> height = ".$ri->getHeight().'<br>';

									if ($ri->getWidth() > 250 ) # width is greater than 250
									{
										$imagesArray[$c]['image_whole_source'] = '< '.$code_line;
										$imagesArray[$c]['image_name'] =  $image_name;
										$imagesArray[$c]['image_souce'] =  $image_souce;
										$c++;
									}
								}
								else 
								{ 
									echo "not exist ";
								}
							} 
							else 
							{ 
								#not jpg extention
							}
							
						}	
					}		 
					// print_r($imagesArray);
					//return $imagesArray;
				}
			}
			else 
			{ 
				echo " the url provided is not found ";
				echo "geting file failed";
				$_SESSION['warning_message'] = 'url failled to open';
				$mc->go('postarticle');
			}
		}
	 



	 	public function get_article_desciription_and_tite( $url , $img , $img_name )
	 	{

			// echo "  $url , $img  img name =  $img_name <br>";	 

			$content = file_get_contents( $url );
			$content = str_replace('<','-ldn-',$content);

			// echo $content;
			
			$imgpos = strpos( $content , $img_name );


			// echo "<br> pos = $imgpos img = ";
			$desc = substr($content,$imgpos,1000);


			$descStopPos = strpos( $desc , '-ldn-/p>' );
			$descStartPos = strpos( $desc , '-ldn-p' );

			

			 $c=0;
			 
			 for ($i=0; $i < $descStartPos; $i++) 
			 { 
			 	$c++;
			  	if ( $desc[$i] == '-' and $desc[$i+1] ==  'l' and $desc[$i+2] == 'd' and $desc[$i+3] =='n'  ) 
			  	{
			  		// -ldn-/p>
			  		// echo "found start p <br>"; -ldn-/p>
			  		$i=$descStartPos;	 
			  	}	
			 }

			 // echo "$c";


			 $desc = substr($desc, $descStartPos , $c+26);
			 // echo "$desc ";

			// 1.) 
			// -lessthan-p 
			// -lessthan-/p>
			// 2.) 
			// -lessthan-p>
			// .-lessthan-/p>
		}
		public function url_exists($url) 
		{

			// echo "url = $url <br>";
		    $mylinks=$url;
			$handlerr = curl_init($mylinks);
			curl_setopt($handlerr,  CURLOPT_RETURNTRANSFER, TRUE);
			$resp = curl_exec($handlerr);
			$ht = curl_getinfo($handlerr, CURLINFO_HTTP_CODE);

			// echo "$ht";

			if ($ht == '404' or empty($ht) )
			{ 
				// echo 'not online';
				return false;
			}
			else 
			{ 
				// echo 'online';
				return true;
			}
		}
	}
 ?>





