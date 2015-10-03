<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 






 	$posted_articles = selectV1( "*", "fs_postedarticles" , "" , "order by article_Id desc" );


  	 echo "
  	  <table border=1 > <tr> 
  	 ";
  	 $c = 0;
  	for ($i=0; $i < count($posted_articles) ; $i++) 
  	{ 
  		$c++;
  	  $article_Id = $posted_articles[$i]["article_Id"];
  	  $article_title = $posted_articles[$i]["article_title"];
  	  $article_description = $posted_articles[$i]["article_description"];
  	  $article_tags = $posted_articles[$i]["article_tags"];

  	  $article_topic = $posted_articles[$i]["article_topic"];
  	  $article_source_url = $posted_articles[$i]["article_source_url"];
  	  $article_dateuploaded = $posted_articles[$i]["article_dateuploaded"];
 
  	  echo " 
  	 	<td> 
	  	 	<table border='1'> 

	  	 		<tr>
	  	 		 	<td> TITLE  </td>  <td> $article_title </td><tr>
			  	  	<td> Description </td><td> $article_description</td> <tr>
			  	  	<td> article tags </td><td> $article_tags </td><tr>
			  	  	<td> article topic </td><td> $article_topic </td> <tr>
			  	  	<td> article source_url </td><td> $article_source_url </td> <tr> 
			  	  	<td> article dateuploaded </td><td> $article_dateuploaded </td> <tr> 
			  	  	<td> <img src='fs_folders/images/posted articles/$article_Id.jpg' width='258' title='$article_Id' />  </td> <tr>
	  	 	</table> 
  	 	</td>


  	";
  	if ($c%2==0) 
  	{
  		echo "<tr>";
  	}

  	}
  	echo "  </table>  ";


	unset( $_SESSION["last_inserted_id"] );
	unset( $_SESSION["article"] );

?>