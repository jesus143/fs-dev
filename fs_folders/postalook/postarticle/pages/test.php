<?php 
			require("../../../fs_folders/php_functions/connect.php");
			require("../../../fs_folders/php_functions/function.php");
			require("../../../fs_folders/php_functions/myclass.php");
			require("../../../fs_folders/php_functions/library.php");
			require("../../../fs_folders/php_functions/source.php"); 



			
			$mc = new myclass();
			$pa = new postarticle();
			$ri = new resizeImage();
			$url = $_GET['url'];
			$url = str_replace(' ','.',$url);
			
			if (empty($url)) 
			{
				$url = 'http://freelancersfashion.blogspot.com/';
			}		

			$bool = true; 
			
			if ( $bool ) 
			{ 
				if (  $pa->url_exists($url)  ) 
				{  
					if ($pa->with_http ( $url )) 
					{
						// echo "http"
						/*
						$content = file_get_contents($url);
						$imagesArray = $pa->retrieve_images_from_url( $content , $mc , $pa , $ri );
						*/
						echo " url1 = $url <br>";
				  		// $article_len =  count($article);
						echo "<hr>";
				  		if ( strpos($url, 'youtube.com') ) 
				  		{ 
				  			// $pa->test_get_images_from_url( $url );
				  			$video_array = $pa->video( $url );
				  			// echo "youtube";
							echo ' 	
								<h1> "'.$video_array[0]['vtitle'] .'"</h1> 
								<h2> "'.$video_array[0]['vdescription'] .'"</h2> 
								<li> 
									<iframe width="560" height="315" src="//www.youtube.com/embed/'.$video_array[0]["vid"].'" frameborder="0" allowfullscreen></iframe>
								</li>'
							;
				  		} 
				  		else  # not you tube or video 
				  		{ 
			 
					  		$title = $pa-> get_title_in_a_website( $url );
						    $desc = $pa->get_meta_data($url , 'description');
						    $desc_content = $pa->get_descriptions( $url );
						 	$desc = $pa->change_description_if_lessthan50(  $desc , $desc_content  , 20 , 1000 );
					  		$article = $pa->get_image_article( $url , $ri , 100 );
					  		$article = $pa->remove_duplicate( $article , $url );
					  		$article_len = count($article);
					  		$limit_display = 100;
	 

							if ( $article_len > 0  ) 
							{
								echo "<h1> $title  </h1> <h1> $desc.... </h1> <h1> </h1>";
								unset($_SESSION["article"]);
								$_SESSION["article"] = $article;
								
								for ($i=0; $i < $article_len ; $i++) 
								{ 
									if ( $i < $limit_display ) 
									{
										$article1 = $article[$i]['img_source'];
										if ( $i == 0 ) 
										{
											echo "
												<li>
													<img id='img_aticle$i' style='border:5px solid #b11c22'   src='$article1' onclick='article_select(\"#img_aticle\",\"$i\" , \"$article_len\")'  /> 
													<input id='img_aticle_source_num$i' type='text' name='' value='$i' style='display:none' /> <br><br>
												</li>
									 		";
										}
										else 
										{
											echo "
												<li>
													<img id='img_aticle$i' style='border:5px solid #000'   src='$article1' onclick='article_select(\"#img_aticle\",\"$i\" , \"$article_len\")'  />
													<input id='img_aticle_source_num$i' type='text' name='' value='$i' style='display:none' />  <br><br>
												</li>
									 		";
										}
									}
									else 
									{ 
										$i = $article_len;
									}
								}
							}
							else 
							{ 
								// echo "<h1> Sorry we didn't found blogs in the url. </h1>";
							}
						}
					}
					else 
					{ 
						echo "URL not found.";
					} 
				}
				else 
				{ 
					echo  "<br>URL not found.";
				}

 			}
 			else  
 			{ 		
 				echo " else";
 				$f1 = file_get_contents($url);
 				$f = file($f1);
 				print_r($f);

 			}
?>

 
