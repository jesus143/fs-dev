<?php

	// echo " key typed = ".$_GET['key_typed']; 
	// $str = '3-asdasd-qweq-fg-dfg-dfg-dfgdfgdfg-dfg-werwe-fzsdfsa-fdas-df-asdf-asd-fas-dfa-sdf-sdfg-dfg-sdfadsfasdf-asdf-asdf-asd-fasd-fasdf-asdf-asdf-fgh-jfgjh-cvb-xdf-g';
	// $a = explode('-', $str);

 $a = array('50\'s','60\'s','70\'s','80\'s','90\'s','Androgynous','Bohemian','Business','Casual','Chic','Denim','Formal','Geek','Goth','Hippie','Leather','Menswear','Preppy','Punk','Trendy' ,'Urban','Vintage');









	$c=0;	
	echo "<span onclick='close_x()'  class='x_out' title='(close)' >x</span>";
	echo " <br> <center> <span>Style </span></center> <br>";
	

	 echo "<table >" ;
 									 		 
								 		 
								 		 
	for ($i=0; $i < count($a) ; $i++) { 
		$c++;
		$b=$a[$i];
		$b1=str_replace('\'','',$b);
		echo "<td onclick='get_clicked_style(\"$b1\")' style=''   >   $b </td>";
	
		if ($c%5==0) {
			
			echo "<tr>";
		}
	}

	echo "</table>";


?>
 
