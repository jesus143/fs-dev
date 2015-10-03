<?php

	// echo " key typed = ".$_GET['key_typed']; 
	// $str = '1-asdasd-qweq-fg-dfg-dfg-dfgdfgdfg-dfg-werwe-fzsdfsa-fdas-df-asdf-asd-fas-dfa-sdf-sdfg-dfg-sdfadsfasdf-asdf-asdf-asd-fasd-fasdf-asdf-asdf-fgh-jfgjh-cvb-xdf-g';
	// $a = explode('-', $str);




	$a =array('Winter','Spring','Summer','Fall');
	$c=0;	
	echo "<span onclick='close_x()' class='x_out'  title='(close)' >x</span>";
 
	echo " <br> <center> <span>Session </span></center> <br>";
	 echo "<table border=0>" ;
 									 		 
								 		 
								 		 
	for ($i=0; $i < count($a) ; $i++) { 
		$c++;
		$b=$a[$i];

		echo "
		<td><p onclick='remove_Selected_taggs(\"$b\");hide_x_beore_session_name(\"$i\")'  id='remove_tags_session_$i' class='remove_tags_session' >x</p></td>
		<td onclick='get_clicked_session(\"$b\",\"$i\")' style=''   >   $b </td>
		 
		"; 

		if ($c%5==0) {
			echo "<tr>";
		}
	}
	echo "</table>";


?>
 

