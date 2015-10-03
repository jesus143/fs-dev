<?php 
	session_start();
	require("../connect.php");
	require ("../function.php");	
	require ("../source.php");
	$res=select('fs_members',20,array('mno',$_SESSION['mno']));
	// print_r($res);
	$selected_brands_women = array();
	$selected_brand=$_GET['selected_brands'];
	 // echo $selected_brand;
	// echo "<br>";
	// echo "hello here they go!";
	if (male()) {
		$c=0;
		// echo "male selected brands are : <br>";
		add_brfnotexist(get_oldb_slcted(),get_brand_names(brands_men_list(),$selected_brand));
		// echo "<br><br><br>";
		del_brfunchecked(brands_men_list(),$selected_brand);
		// if ( strlen($selected_brand) > 0 ) {  
		// 	$brandname=get_brand_names(brands_men_list(),$selected_brand);
		// 	for ($i=0; $i < count($brandname) ; $i++) {
		// 		$c+=1; 
		// 		echo " $c .)".$brandname[$i]."<br>";
		// 	}
		// } 
	}else{
		$c=0;
		// echo "female selected brands are : <br>";
		add_brfnotexist(get_oldb_slcted(),get_brand_names(brands_women_list(),$selected_brand));
		// echo "<hr>";
		del_brfunchecked(brands_women_list(),$selected_brand); 
		// if ( strlen($selected_brand) > 0 ) { 
		// 	$brandname=get_brand_names(brands_women_list(),$selected_brand);
		// 	for ($i=0; $i < count($brandname) ; $i++) { 
		// 		 $c+=1;
		// 		 echo " $c .)".$brandname[$i]."<br>";
		// 	}
		// } 
	}
?>

<?php 
	// echo "hello there!";
	$mybrand_indb=select('fs_member_brand_selected',
		4,
		array('mno',$_SESSION['mno'])
		);
	// print_r($mybrand_indb);
	// echo "found = ".count($mybrand_indb);
	// echo "<hr>";
	if (!empty($mybrand_indb)) {
		$users=get_all_mno_has_thesamebrand($mybrand_indb);

		$users=remove_fexist($users,my_list_followed());



	}
	// print_r($users);
		// $users = array(123,125,127,128,129,130,129,130);
		// $users = array(123,125,127,128,129,130,129);
		// $users = array(123,125,127,128,129,130);
		// $users = array(123,125,127,128,129);
		// $users = array(123,125,127,128);
		// $users = array(123,125,126);
		// $users = array(123,125);
		// $users = array(123);

?>


<?php 
	if (count($users)>5) {
		echo " 
		<div class='rateDiv' >
		";
	}else{
		echo " 
		<div class='rateDiv4' >
		";
	}



	echo " 
		<table border=0>
			<tr>";
		$c=0;
		for ($i=0; $i < count($users) ; $i++) { 
 		     echo "<td>";
				echo "<table style='width:145px;height:200px;' border=0>";
					// $rx[0]=682;
					echo "
					 <td style='padding-top:30px' id='innerdiv'>
						<div>";
						if(file_exists("../images/members/".$users[$i].".jpg"))
							echo"<img src='images/members/".$users[$i].".jpg'  />";
						else
							echo"<img src='images/members/0.jpg'  />";
					    echo"		
						</div>";
						echo "
						</td>
						<tr><td style='height:40px;vertical-align:middle' align=center><a href='profile.php?id=".$users[$i]."'>".get_fullname($users[$i])."</a></td></tr><tr>
						<td>
						<input type=text class='c_$i' id='fm_$i' name='follow' style='display:none;'/>
						 
						 <input type='button' id='follow_button' value='FOLLOW' onclick=\"
							
							if(this.value=='FOLLOW'){
								getID('fm_$i').value='".$users[$i]."';
								this.value='SELECTED';
								this.style.backgroundColor='green'
							}else
							{
								getID('fm_$i').value='';
								this.value='FOLLOW';
								this.style.backgroundColor='#02c7ea'
							}
							\"
							/></td>
						</tr>
					</table>
			";
			$c++;
			if($c%6==0){
				echo "<tr>";
			}
			echo "</td>";
		}
?>
			</td>
		</table>
	</div>
<br><br>

 