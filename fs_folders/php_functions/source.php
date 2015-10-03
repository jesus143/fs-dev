<?php 
	// looldetails , lookdetails_notlogin
	function detect_attempt_to_hacker(){

		$plnoid=$_GET[id];
		$numstr = array('0','1','2','3','4','5','6','7','8','9');
		$c=0;
		for ($i=0; $i < strlen($plnoid) ; $i++) { 
		 	for ($j=0; $j < count($numstr); $j++) { 
			 	if ($plnoid[$i] == $numstr[$j] ) {
			 		$c++;
			 		// echo " c = $c ".$plnoid[$i]." == $j<br>";
			 	}else{ 
			 		// $c++;
			 		// echo " c = $c ".$plnoid[$i]." != $j<br>";
			 	}
		 	}
		}  
		 if ($c==strlen($plnoid)) {
		 	// echo "input not hack  $c = ".strlen($plnoid)." ";
		}else{
		 	// echo "input attemp hack  $c != ".strlen($plnoid)." ";
		 	session_destroy();
		 	echo "<script type='text/javascript'> alert('You attemp to hack our site!') </script>";
		 	echo "<script type='text/javascript'> document.location='http://fashionsponge.com/fs/'; </script>";
		 
		}
	}
	function sure_int($id){
		$numstr = array('0','1','2','3','4','5','6','7','8','9');
		$c=0;
		for ($i=0; $i < strlen($id) ; $i++) { 
		 	for ($j=0; $j < count($numstr); $j++) { 
			 	if ($id[$i] == $numstr[$j] ) {
			 		$c++;
			 	}else{ 
			 	}
		 	}
		}  
		 if ($c==strlen($id)) {
		 	// echo "$c ".;
		 	return true;
		 	// echo "true int ";
		}else{
			// echo "not int";
			// return false;
		}
		// echo "$c==  ".strlen($id)."<br>";
	}
	// looldetails
	function check_if_look_posted(){
		if(select('postedlooks',5,array('plno', intval($_GET['id']) ) ) ){ 
			// echo "<script type='text/javascript'> alert('get is not string') </script>";
		}else{ 
			session_destroy();
			echo "<script type='text/javascript'> document.location='http://fashionsponge.com/fs/'; </script>";
		}
	}
	// lookdetails_notlogin
	 function set_redirect_to_lookdetails_if_not_login(){
		 if (empty($_SESSION['mno']) and !empty($_GET['id'])) { 
		 	$_SESSION['redirect']=$_SERVER['PHP_SELF']."?id=".$_GET['id'];
	 		// echo "Must redirect to = $_SESSION[redirect] <br>";
		 }else{
		 	return $_SESSION['redirect'];

		 }
	 }
	 // index
	function validate_redirecting() { 
		if (!empty($_SESSION['mno'])) {
			if ($rdrct=set_redirect_to_lookdetails_if_not_login()) {
			  	//echo "len = ".strlen($rdrct)."<br>";
			 	if (strlen($rdrct)!=17) {
			 		jumps($rdrct);
				  	unset($_SESSION['redirect']);
			 	}
			} 
		}	
	}

	function change_username() { 
		if( insert("fs_uname_change",array("mno","last_un","new_un","date_change"),array($_SESSION["mno"],get_my_username($_SESSION["mno"]),$_GET["newun"],date("Y-m-d")),"uncno") ) 
		{
			$res=update1("fs_member_accounts",'username',$_GET["newun"],array('mno', $_SESSION["mno"]) );
		}
	}
	function is_username_change(){
		 return select("fs_uname_change",1,array('mno',$_SESSION['mno']));

	}
	function get_username_chage_date(){
		 $date=select("fs_uname_change",5,array('mno',$_SESSION['mno']));
		 if (!empty($date)) {
		 	return  $date[0][4];
		 }else{
		 	return 0;
		 }
		 
	}
	function get_countries(){
		$country_list = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia","Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium","Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria","Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad","Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia","Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)","Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France","Gabon", "Gambia, The", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau","Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel","Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait","Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg","Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania","Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia","Nauru", "Nepa", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau","Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia","Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe","Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia","Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden","Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago","Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom","United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
		return $country_list;
	}

	#date
	function get_months($name=null,$class=null,$id=null){
		echo"<select class='$class' id='$id' name='$name' >";
		for ($i=1; $i <= 12; $i++) {
			if ($i > 9) {
		 		echo "<option>$i</option>"; 
		 	} 
		 	else { 
				echo "<option>0$i</option>"; 
			}
		}
		echo"</select>";
	}
	function get_days($name=null,$class=null,$id=null){
		echo"<select class='$class' id='$id' name='$name' >";
		for ($i=1; $i <= 31; $i++) {
			if ($i > 9) {
		 		echo "<option>$i</option>"; 
		 	} 
		 	else { 
				echo "<option>0$i</option>"; 
			}
		}	
		echo"</select>";
	}
	function get_years($name=null,$class=null,$id=null){
		echo"<select class='$class' id='$id' name='$name' >";
			for ($i=1920; $i <= 2005; $i++) {
				echo "<option value=".$i." >$i</option>"; 
			}		
		echo"</select>";
	}


	
// 	function resizeImage($img, $imgPath, $suffix, $by, $quality)
// 		{
// 			$original = imagecreatefromjpeg("$imgPath/$img") or die("Error Opening original (<em>$imgPath/$img</em>)");
// 			list($width, $height, $type, $attr) = getimagesize("$imgPath/$img");
			
// 			$newWidth = $by;
// 			$newHeight = $newWidth * $height / $width;
			
// 			$tempImg = imagecreatetruecolor($newWidth, $newHeight) or die("Cant create temp image");
// 			imagecopyresized($tempImg, $original, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height) or die("Cant resize copy");
		 
// 			imagejpeg($tempImg, "$imgPath/$suffix"."$img", $quality) or die("Cant save image");
// 			imagejpeg($tempImg, "$imgPath/$suffix"."$img", $quality) or die("Cant save image");
// 			imagedestroy($original);
// 			imagedestroy($tempImg);
// 			return true;
// 		}
// function reduceImage($img, $imgPath, $suffix, $quality)
// 		{
// 			$original = imagecreatefromjpeg("$imgPath/$img") or die("Error Opening original (<em>$imgPath/$img</em>)");
// 			list($width, $height, $type, $attr) = getimagesize("$imgPath/$img");
		 
// 			$tempImg = imagecreatetruecolor($width, $height) or die("Cant create temp image");
// 			imagecopyresized($tempImg, $original, 0, 0, 0, 0, $width, $height, $width, $height) or die("Cant resize copy");
		 
// 			$newNameE = explode(".", $img);
// 			$newName = ''. $newNameE[0] .''. $suffix .'.'. $newNameE[1] .'';
		 
// 			imagejpeg($tempImg, "$imgPath/$newName", $quality) or die("Cant save image");
		 
// 			imagedestroy($original);
// 			imagedestroy($tempImg);
// 			return true;
// 		}






   //  function get_men_brands_list_db(){
   //  	$tablen=2;
   //  	$key=0;
   //  	$res = array();
   //    	$bmen=mysql_query("SELECT * FROM fs_brands WHERE bno < 64 ");
   //    	while ($db = mysql_fetch_array($bmen)) {
			// for ($i=0; $i < $tablen; $i++) { 
			// 	$res[$key][$i]=$db[$i];
			// }
			// $key++;
   //    	}
   //    	return $res;
   //  }
   // function get_women_brands_list_db(){
   //  	$tablen=2;
   //  	$key=0;
   //  	$res = array();
   //    	$bmen=mysql_query("SELECT * FROM fs_brands WHERE bno > 63 ");
   //    	while ($db = mysql_fetch_array($bmen)) {
			// for ($i=0; $i < $tablen; $i++) { 
			// 	$res[$key][$i]=$db[$i];
			// }
			// $key++;
   //    	}
   //    	return $res;
   //  }
	function get_oldb_slcted(){
		return select('fs_member_brand_selected',4,array('mno',$_SESSION['mno']));
	}
	function add_brfnotexist($old_brand_slctd,$new_brand_slctd){
		$insert=true;
		// echo "all brand <br>";
		$all_brands=all_brands();
		// print_r($all_brands);
		// echo "old brand <br>";
		// print_r($old_brand_slctd);
		// echo "new brand <br>";
		// print_r($new_brand_slctd);
		// echo "<br>";
		for ($i=0; $i < count($new_brand_slctd) ; $i++) { 
			for ($j=0; $j < count($old_brand_slctd) ; $j++) { 
				 if(is_equal(brand_index($new_brand_slctd[$i]),$old_brand_slctd[$j][2] ) ){
				 	$insert=false;
				 	$j=count($old_brand_slctd);
				 }
			}
			if ($insert) {
				// echo "not exist and insert = ".$new_brand_slctd[$i]."<br>";
				insert('fs_member_brand_selected',array('mno','bn'),array($_SESSION['mno'],brand_index($new_brand_slctd[$i])),'fsmbs_no');
			}else{
				// echo "exist and not insert = ".$new_brand_slctd[$i]."<br>";
				$insert=true;
			}
		}
	}
	function del_brfunchecked($brands_list,$selected_brand) {
    	 $get_brand_names=get_brand_names($brands_list,$selected_brand); 
		 // $selected_brand=br_convert_array($selected_brand);
		 $get_oldb_slcted=get_oldb_slcted();
		 // print_r( $selected_brand);
		 // print_r($get_brand_names);
		// brand_index($bname)
		 $delete=true;
		 for ($i=0; $i < count($get_oldb_slcted) ; $i++) { 
		 	for ($j=0; $j < count($get_brand_names) ; $j++) { 
		 		if(is_equal($get_oldb_slcted[$i][2],brand_index($get_brand_names[$j]))){
		 			// echo $get_oldb_slcted[$i][2]." == ".$get_brand_names[$j]."<br>";
		 			$delete=false; 
		 		}
		 	}
		 	if ($delete) {
		 		// echo "unchecked and delete ".$get_oldb_slcted[$i][2]." from database <br>";
		 		delete_w_2('fs_member_brand_selected',array('mno',$_SESSION['mno'],'bn',$get_oldb_slcted[$i][2]) , 'and');
		 		// delete_w_2($table_name,$where_array,$oparators)
		 	}else{ 
		 		// echo "checked and not delete ".$get_oldb_slcted[$i][2]." from database <br>";
		 		$delete=true;
		 	}
		 }
	}
	function is_equal($first,$second){
		if ($first == $second) {
			// echo "$first == $second <br>";
			return true;
		}else{
			// echo "$first != $second <br>";
			return false;
		}
	}


    function brand_index($bname){
    	$all_brands=all_brands();
    	for ($i=0; $i < count($all_brands); $i++) { 
    		 if ($bname==$all_brands[$i]) {
    		 	// echo "$bname == ".$all_brands[$i]."<br>";
    		 	return $i;
    		 }
    	}
    }

	function all_brands(){
		$all_brands= array(
			'10 Deep','Abercrombie & Fitch' ,'Adidas','Aldo','American Eagle','A.P.C','Armani Exchange' ,
			'Balenciaga','Ben Sherman','Billionaire Boys Club','Brooks Brothers','Burberry','Calvin Klein',
			'Club Monaco','Complex','Coogi','Converse','Crooks & Castles','Diamond Supply Co.','Diesel',
			'Dolce & Gabbana','Dr. Martens','Esquire','Gap','Givenchy','Grant Rugger','Gucci','Guess',
			'GQ','H&M','HUF','Hugo Boss','J. Crew ','Jimmy Choo','Jordan','Lacoste','Levi\'s','Louis Vuitton',
			'LRG','Macy\'s','Marc Jacobs','New Balance','Nike','Nylon Guys','Obey','Parish Nation','Paul Smith',
			'Prada','Puma','Ralph Lauren','Ray Ban','Reebok','Rocawear','Sean John',
			'Steve Madden','Stussy','Supreme','The Hundreds','Topman','UNDFTD','Urban Outfitters',
			'Vans','Vman','YSL','Zara',
			'American Apparel','Ashley Stewart',
			'Asos Curve','BCBG','Chanel','Cheap Monday','Chloe',
			'Christian Dior','Elle',
			'Fashion To Figure','Forever 21+','Free People',
			'H&M','Hollister','J. Crew','Jeffery Campbell','Jordan','Joyrich','Lacoste','Levi\'s','Louis Vuitton',
			'Lucky','Mango','Married To The Mob','Michael Kors','Nasty Gal',
			'Nylon','Seventeen',
			'TOP SHOP','Torrid.com','Victoria Secrets','Vogue'
		);
		return $all_brands;
	}
	function brands_men_list(){
		$brands_men= array(
			'10 Deep','Abercrombie & Fitch','Adidas','Aldo','American Eagle','A.P.C','Armani Exchange' ,
			'Balenciaga','Ben Sherman','Billionaire Boys Club','Brooks Brothers','Burberry','Calvin Klein',
			'Club Monaco','Complex','Coogi','Converse','Crooks & Castles','Diamond Supply Co.','Diesel',
			'Dolce & Gabbana','Dr. Martens','Esquire','Gap','Givenchy','Grant Rugger','Gucci','Guess',
			'GQ','H&M','HUF','Hugo Boss','J. Crew','Jimmy Choo','Jordan','Lacoste','Levi\'s','Louis Vuitton',
			'LRG','Macy\'s','Marc Jacobs','New Balance','Nike','Nylon Guys','Obey','Parish Nation','Paul Smith',
			'Prada','Puma','Ralph Lauren','Ray Ban','Reebok','Rocawear','Sean John',
			'Steve Madden','Stussy','Supreme','The Hundreds','Topman','UNDFTD','Urban Outfitters',
			'Vans','Vman','YSL','Zara'
		);
		return $brands_men;
	}
	function brands_women_list(){  
		$brands_women= array(
			'Abercrombie & Fitch','Adidas','Aldo','American Apparel','American Eagle','Ashley Stewart',
			'Asos Curve','BCBG','Brooks Brothers','Burberry','Chanel','Calvin Klein','Cheap Monday','Chloe',
			'Christian Dior','Club Monaco','Converse','Crooks & Castles','Diesel','Dr. Martens','Elle',
			'Fashion To Figure','Forever 21+','Free People','Grant Rugger','Gap','Givenchy','Gucci','Guess',
			'H&M','Hollister','J. Crew','Jeffery Campbell','Jordan','Joyrich','Lacoste','Levi\'s','Louis Vuitton',
			'LRG','Lucky','Macy\'s','Mango','Marc Jacobs','Married To The Mob','Michael Kors','Nasty Gal','Nike',
			'Nylon','Obey','Prada','Puma','Ralph Lauren','Ray Ban','Reebok','Seventeen','Steve Madden','Stussy',
			'TOP SHOP','Torrid.com','Urban Outfitters', 'Vans','Victoria Secrets', 'Vogue','YSL','Zara'
		);
		return $brands_women;
	}
	function brands_men($brands_men,$bname=null,$id=null,$class=null){
		$c=0;
		echo "<tr>";
		title("Men Brands");
		for ($i=0; $i < count($brands_men) ; $i++) { 
			$c++;
			 if( checked_or_uncheked(brand_index($brands_men[$i]))){
			 	echo "<td widht='20%'><span id='$id$i' >".$brands_men[$i]."</span><input checked onclick='select_brand()' id='$i' class='$class$i'   style='float:left' type='checkbox' name='$bname' value=".$brands_men[$i]."></td>";
			 }else{  
			 	// echo "<td style='width: 10px;' ><span id='men_".$i."' >".$brands_men[$i]."</span><input id='men_".$i."' style='float:left' type='checkbox' name='vehicle' value=''></td>";
				 echo "<td widht='20%'><span id='$id$i' >".$brands_men[$i]."</span><input onclick='select_brand()' id='$i' class='$class$i'   style='float:left' type='checkbox' name='$bname' value=".$brands_men[$i]."></td>";
			 }
			 if ($c%6==0) {
			 	echo "<tr>";
			 }
		}
	}
	function brands_women($brands_women,$bname=null,$id=null,$class=null){
		$c=0;
		echo "<tr>";
		title("Women Brands");
		for ($i=0; $i < count($brands_women) ; $i++) { 
			$c++;
			if( checked_or_uncheked(brand_index($brands_women[$i]) ) ) {
			     echo "<td widht='20%'><span id='$id$i' >".$brands_women[$i]."</span><input checked onclick='select_brand()' id='$i' class='$class$i'   style='float:left' type='checkbox' name='$bname' value=".$brands_women[$i]."></td>";
			}else{
				 echo "<td widht='20%'><span id='$id$i' >".$brands_women[$i]."</span><input onclick='select_brand()' id='$i' class='$class$i'   style='float:left' type='checkbox' name='$bname' value=".$brands_women[$i]."></td>";
			}
			 if ($c%6==0) {
			 	echo "<tr>";
			 }
		} 
	}
	function checked_or_uncheked($b_index){
		$cheked=false;
		$get_oldb_slcted=get_oldb_slcted();
		if (!empty($get_oldb_slcted)) {
			for ($i=0; $i < count($get_oldb_slcted) ; $i++) { 
				 if(is_equal($get_oldb_slcted[$i][2],$b_index) ){
				 	$cheked=true;
				 	$i=count($get_oldb_slcted);
				 }
			}
		}
		if ($cheked) {
			return true;
		}else{
			return false;
		}
	}
	function title($title){
		echo "<tr><tr><td  class='ttle' ><span class='title'>$title</span></td>";
		$c=0;
		for ($i=0; $i <6 ; $i++) { 
			$c++;
			echo "<td></td>";
			if ($c%6==0) {
				echo "<tr>";
			}
			
		}
		 
	}
	function br_convert_array($selected_brand){
		return  $selected_brand=explode(',', $selected_brand);
	}
	function get_brand_names($brand_list,$selected_brand) { 
		$counter=0;
		if (strlen($selected_brand)>0) {		
			$selected_brand=explode(',', $selected_brand);
			if (count($selected_brand)>0){
				// print_r($brand_list);
				// print_r($selected_brand);
				for ($i=0; $i < count($selected_brand) ; $i++) { 
					// echo  $selected_brand[$i]."yeah<br>";
					for ($j=0; $j < count($brand_list) ; $j++) { 
						if($selected_brand[$i]==$j){
							
							// echo "$counter .) ".$brand_list[$j]."<br>"; 
							$brand_names[$counter]=$brand_list[$j];
							$counter++;
							$j=count($brand_list);
						}	 
					}
				}
				return $brand_names;
			}
		}
	}
	function male(){ 
		if ($_SESSION['gender']==1) {
			return true;
		}else{
			return false;
		}
	}
    function gender($gen){ 
    	if ($gen==1) {
    		return 'male';
    	}else{ 
    		return 'female';
    	}
    }
    function num_gender($gen){ 
    	if ($gen=='male') {
    		return 1;
    	}else{ 
    		return 2;
    	}
    }
    function set_year($year){ 
    	return $year."-00-00";
    }
    function get_year($complete_year){ 
    	return substr($complete_year,0,strpos($complete_year,'-'));
    }
    function occupation_list(){ 
    	$m="Accessory Designer-Actress-Blogger-Boutique-Business Professional-Fashion Designer-Graphic Designer-Hair Stylist-House Wife-Illustrator-Make Up Artist-Model-Musician-Photographer-Social Media Marketer-Student-Wardrobe Stylist-Other";
	    return $m=explode('-',$m);
    }
    function get_occupation_name($occ_selected){
    	$m=occupation_list();
    	return $m[$occ_selected];

    }
    function get_occupation_index($occ_selected){
    	$m=occupation_list();
    	for ($i=0; $i < count($m); $i++) { 
    		if( $m[$i] == $occ_selected ){ 
    			return $i;
    		}
    	}
    }
    function preffered_style_list(){
    	$preffered_style = array('Androgynous','Bohemian ','Business Casual' ,'Chic','Casual' ,'Electric' ,'Formal' ,'Glam' , 'Goth','Hip Hop' ,'Indie','Preppy' ,'Punk','Street','Urban' ,'Vintage');
    	return $preffered_style;
    }

   function get_preffered_style_name($preff_selected){
    	$preffered_style=preffered_style_list();
    	return $preffered_style[$preff_selected];

    }
    function get_preffered_style_index($preff_selected){
    	$preffered_style=preffered_style_list();
    	for ($i=0; $i < count($preffered_style); $i++) { 
    		if( $preffered_style[$i] == $preff_selected ){ 
    			return $i;
    		}
    	}
    }
    function get_data_from_fs_members(){ 
    	return select('fs_members',20,array('mno',$_SESSION['mno']));
    }
    function get_data_from_fs_member_accounts(){ 
    	return select('fs_member_accounts',5,array('mno',$_SESSION['mno']));
    }
    function remove_beginning_spaces($string){ 
    	$k=0;
    	for ($i=0; $i < strlen($string) ; $i++) { 
    	 	if ($i==$k) {
    	 		if ($string[$i]==" ") {
    	 			$string=substr($string,1,strlen($string));
    	 			$k++;
    	 		}else{ 
    	 			$i=strlen($string);
    	 		}
    	 	}else{ 
    	 		$i=strlen($string);

    	 	}
    	}
    	return $string;
    }
	function get_all_mno_has_thesamebrand($mybrand_indb){ 
		$c=0;
		for ($i=0; $i < count($mybrand_indb) ; $i++) { 
			// echo "string";
			$usrs = select('fs_member_brand_selected',4,array('bn',$mybrand_indb[$i][2]));
				// select_w_2($tableName,$tablen,$where,$oparators){
			// $tuser+=count($usrs);
			 // $mnos=arrange_usr($usrs,$tuser,$i);
			// print_r($usrs);


			for ($j=0; $j < count($usrs) ; $j++) { 
					// print_r($usrs);
					// echo "<br>";	
				if(!is_equal($usrs[$j][1],$_SESSION['mno']) ){
					$mnos[$c]=$usrs[$j][1];
					$c++;
				}
			}	
			// print_r($mnos);
		}
		// echo "<hr> before remove!<br>";
		// print_r($mnos);
		// $mnos_r=remove_duplicate($mnos);
		// echo "<hr> after remove!<br>";
		// print_r($mnos_r);
		// echo "string";
		// echo "<br>";
		// echo $usrs[0][0][0]; 
		return remove_duplicate($mnos);
	}
	function remove_duplicate($var){
		// echo "<hr>";
		$remove=false;
		$c=0;
		// print_r($var);
		for ($i=0; $i < count($var) ; $i++) { 
			for ($j=$i+1; $j < count($var); $j++) {
				// echo  $var[$i]."==".$var[$j]."<br>";
				if ($var[$i]==$var[$j]) {
					$remove=true;
					// echo "true";
				}
			}
			if (!$remove) {
				$var_r[$c]=$var[$i];
				$c++;
			}else{
				$remove=false;
			}
		}
		return $var_r;
	}
	function remove_emptyarry($arrray){
		$cleanarray=array();
		$c=0;
		for ($i=0; $i < count($arrray) ; $i++) { 
			if ($arrray[$i] != '') {
				$cleanarray[$c]=$arrray[$i];
				$c++;
			}
		}
		return $cleanarray;
	}


	function get_fullname($mno){
		$fullname=select('fs_members',5,array('mno',$mno));
		return $fullname[0][3]." ".$fullname[0][1];
	}
	function get_username(){
		$username=select('fs_member_accounts',5,array('mno',$_SESSION['mno']) );
		echo $username[0][3];
	}
	function get_firstname(){
		$firstname=select('fs_members',5,array('mno',$_SESSION['mno']) );
		echo $firstname[0][3];
	}
	function get_lastname(){
		$lastname=select('fs_members',5,array('mno',$_SESSION['mno']) );
		echo $lastname[0][1];
	}
	function firstname($mno){
		$firstname=select('fs_members',5,array('mno',$mno));
		return $firstname[0][3];
	}
	function get_mail($mno){
		$usr_mail=select('fs_member_accounts',5,array('mno',$mno) );
		return $usr_mail[0][2];
	}
	function remove_fexist($urarray_list,$db_list){
		// echo "local list<br><hr>";
		// print_r($urarray_list);
		// echo "<hr><br>db list<br>";
		// print_r($db_list);
		$c=0;
		$exist=false;
		$list=array();
		for ($i=0; $i < count($urarray_list) ; $i++) { 
			 for ($j=0; $j < count($db_list) ; $j++) { 
				if ($urarray_list[$i] == $db_list[$j][2]) {
					$exist=true;
				}
			 }
			 if (!$exist) {
			 	 $list[$c]=$urarray_list[$i];
			 	 $c++;
			 }else{
			 	 $exist=false;
			 }
		}
		// echo "final list <hr>";
		return $list;
		// return $list;
	}
	// insert($table_name,$row_name_array,$values_array,$row_id_name=null){
	function insert_my_followed($mnos){
		for ($i=0; $i < count($mnos) ; $i++) { 
			insert('friends',array('mno1','mno2'),array($_SESSION['mno'],$mnos[$i]),'fno');	
		}
	}
	function my_list_followed(){
		return select('friends',4,array('mno1',$_SESSION['mno']));
	}
	function my_list_follower(){
		return select('friends',4,array('mno2',$_SESSION['mno']));
	}
	function fs_members_gettlog($mno){
		$tlog=select('fs_members',20,array('mno',$mno));
		// fs_members_addtlog($_SESSION['mno'],fs_members_gettlog($_SESSION['mno']));
		return $tlog=$tlog[0][19];
	}
	function fs_members_addtlog($mno,$dbtlog){
		// select($tableName,$tablen,$where=null,$orderby=null,$limit=null)
		$dbtlog++;
		// echo "total log in = $dbtlog";
		// if ($dbtlog > 1) {
			update1('fs_members','tlog',$dbtlog,array('mno',$mno));
		// }
	}
	function slide(){
		$tlog=select('fs_members',20,array('mno',$_SESSION['mno']));
		 // echo $tlog[0][19];
		if ($tlog[0][19]==1) {
			return true;
		}else{
			return false;
		}
	}
	function has_passowrd(){
		$passwrd=select('fs_member_accounts',5,array('mno',$_SESSION['mno']) );
		// print_r($passwrd);
		if(!empty($passwrd[0][4])){
			// echo "password = ".$passwrd[0][4]."<br>";
			return true;
		}else{
			// echo "no pass = ".$passwrd[0][4]."<br>";
			return false;
		}
	}
	function delete_account($mno){
		delete('activity',array('mno',$mno));
		delete('cm_spam_report',array('mno1',$mno));
		delete('cm_spam_report',array('mno2',$mno));
		delete('fs_members',array('mno',$mno));
		delete('fs_member_accounts',array('mno',$mno));
		delete('fs_member_brand_selected',array('mno',$mno));
		delete('fs_uname_change',array('mno',$mno));
		delete('notifyme',array('mno',$mno));
		delete('plc_replies',array('mno',$mno));
		delete('pl_drips',array('mno',$mno));
		delete('pl_loves',array('mno',$mno));
		delete('postedlooks',array('mno',$mno));
		delete('posted_looks_comments',array('mno',$mno));
		delete('posted_looks_comments_like_dislike',array('mno',$mno));
		delete('ratings',array('mno',$mno));

	}
	function update_fs_members_4notifications($mno){ 
		// echo "$_POST[iral],$_POST[idal],$_POST[ifal],$_POST[ifam],$_POST[icoal],$_POST[icoab],$_POST[sf],$_POST[coml],$_POST[combp],$_POST[rtmc],$_POST[smnlpbpif]";
		updateArray(
			'fs_members',
			array('iral','idal','ifal','ifam','icoal','icoab','sf','coml','combp','rtmc','smnlpbpif'),
			array(
				$_POST['iral'],
				$_POST['idal'],
				$_POST['ifal'],
				$_POST['ifam'],
				$_POST['icoal'],
				$_POST['icoab'],
				$_POST['sf'],
				$_POST['coml'],
				$_POST['combp'],
				$_POST['rtmc'],
				$_POST['smnlpbpif']
				),
			'mno',
			$mno
		);
	}
	 function get_look_tview($plno){
		 $tview=select_spec1('postedlooks','tview',1,array('plno',$plno)); 
		 return $tview[0][0];
	 }
	 function add_look_tview($ltv,$plno){  
		 $ltv++;
		 update1('postedlooks','tview',$ltv,array('plno',$plno));
		 // print_r($ltv);
	}
	function redirect_profile(){
		if (!empty($_SESSION['user_name'])){
			jump($_SESSION['user_name']);
			unset($_SESSION['user_name']);
		}
	}
	function get_file_extension($file_name) {
			return strtolower(substr(strrchr($file_name,'.'),1));
		}
	function user_last_look_uploaded(){  
		$q = "SELECT max(plno) from postedlooks where mno=".$_SESSION['mno']; //where  mno=".$_SESSION['mno'];
		$ex = mysql_query($q) or die(mysql_error());
		$r = mysql_fetch_array($ex);
		return $r[0];
	}		
	function tobe_edite_look_id()
	{ 
		if (!empty($_GET['kooldi'])) 
		{
			return intval($_GET['kooldi']);
		}
		else { 
			return 0;
		}
	}
	function is_edit_look($pnlo) 
	{ 
		if (tobe_edite_look_id()!=0)  
		{ 
			return true;
		} else 
		{  
			return false;
		}
	}
	function delete_look($plno){  
		$cids=get_comment_ids(intval($plno));
		delete_comment_replies_and_comment_like($cids);
		delete('activity',array('_table_id',intval($plno)));
		delete('fs_pltag',array('plno',intval($plno)));
		delete('postedlooks',array('plno',intval($plno)));
		delete('ratings',array('plno',intval($plno)));
		delete('pl_drips',array('plno',intval($plno)));
		delete('pl_loves',array('plno',intval($plno)));
		delete('posted_looks_comments',array('plno',intval($plno))); 
		// unlink("../../images/members/posted looks/$plno.jpg");
	}	
	function delete_user(){ }


	function total_like($plcno){
		$total_like=select('posted_looks_comments_like_dislike',3,array('plcno',$plcno));
		return intval(count_total_like($total_like));
	}
	function you_like_this_comment($plcm,$mno){  

		// echo "comment id = $cid mno = $mno";
		 // $cid=1;
		 $res=select_w_2(
		 	'posted_looks_comments_like_dislike',
		 	5,
		 	array('plcno',$plcm,'mno',$mno),
		 	'and'
		 );
		 // print_r($res);
		 if (empty($res)) {
		 	// echo "false";
		 	return false;
		 }else { 
		 	// echo "true";
		 	return true;
		 }
	}
	function you_dislike_this_comment($plcm,$mno){ 

		// echo "comment id = $cid mno = $mno";
		 // $cid=1;
		 $res=select_w_2(
		 	'fs_plcm_dislike',
		 	5,
		 	array('plcno',$plcm,'mno',$mno),
		 	'and'
		 );
		 // print_r($res);
		 if (empty($res)) {
		 	// echo "false";
		 	return false;
		 }else { 
		 	// echo "true";
		 	return true;
		 }
	}

	function replyYouLikeThis($plcm,$mno){
		// echo "comment id = $cid mno = $mno";
		 // $cid=1;
		 $res=select_w_2(
		 	'fs_plcm_rlike',
		 	5,
		 	array('plcno',$plcm,'mno',$mno),
		 	'and'
		 );
		 print_r($res);
		 if (empty($res)) {
		 	// echo "false";
		 	return false;
		 }else { 
		 	// echo "true";
		 	return true;
		 }


	}
	function replyDislikeYouLikeThis(){}



	function total_like_store_session($plno){ 


		 $plcnos=get_comment_ids($plno);

		 // print_r($plcnos);
		 if ($plcnos[0]!='') {
			for ($i=0; $i < count($plcnos) ; $i++) { 
			 	$plcno=$plcnos[$i]; 
			 	$tlike=count_like($plcno);
			 	// echo "<br> cid = $plcno | tlike =  $tlike <br>";


			 	// $_SESSION["total_like_$plcno"] = total_like($plcno);
			 	// echo "session  total_like_$plcno  = ".$_SESSION["total_like_$plcno"].'<br>';




			 	$_SESSION["total_like_$plcno"]=$tlike;
			}
		}
		
	}
 	function I_liked_store_session($plcno,$mno){ 
 		 $i_liked=select_w_2(
		 	'posted_looks_comments_like_dislike',
		 	5,
		 	array('plcno',$plcno,'mno',$mno),
		 	'and'
		 );
		 if (!empty($i_liked)) {
		 	 $_SESSION["I_liked_$plcno"]='liked';
		 }else { 
		 	$_SESSION["I_liked_$plcno"]='not_liked';

		 }
 	}	
  
 	function my_trate_for_look($mno,$plno){ 
 		 $r=select_w_2(
		 	'ratings',
		 	5,
		 	array('plno',$plno,'mno',$mno),
		 	'and'
		 );

		 return  intval($r[0][3]);
 	}
	function get_total_len_comment($plno){ 
		$cinfo=select('posted_looks_comments',5,array('plno',intval($plno)),'ORDER BY plcno ASC ',array(0,1000));
		if (!empty($cinfo) and $cinfo != 0 ){ 
			$clen=count($cinfo);
			return intval($clen);
		}else { 
			return 0;
		}
	}   
	function get_new_comments( $plno , $mno , $tnewcomment ) {   
		// echo " $plno,$tnewcomment ";
		$ncomment=select('posted_looks_comments',5,array('plno',intval($plno)),'ORDER BY plcno DESC ',array(0,intval($tnewcomment)));
		
		//  $plno = intval($plno);
		//  $tnewcomment = intval($tnewcomment);
		//  $mno = intval($mno);

		// $key = 0;
		// $Q = @mysql_query("SELECT * FROM posted_looks_comments WHERE plno = $plno and mno != $mno ORDER BY plcno DESC limit  0,$tnewcomment  ");
		 
		// if (!empty($Q)) {
		// 	while ( $db=mysql_fetch_array($Q) ) { 
		// 		for ($i=0; $i < 5; $i++) { 
		// 			$ncomment[$key][$i]=$db[$i];
		// 		}
		// 		$key++;

		// 	}
		// 	if (!empty($ncomment)) {
		// 		return $ncomment;	
		// 	}else{
		// 		return 0;
		// 	} 
		// }
		 
 		return $ncomment;
	}	


	function countReplyLike ( $plcrno ) { 
		$Tlike=selectV1('*','fs_plcm_rlike',array('plcrno'=>$plcrno) );
		if (!empty($Tlike))
			return count($Tlike);
		else 
			return 0;
	}
	function countReplyDislike ( $plcrno ) { 
		$TDislike=selectV1('*','fs_plcm_rdislike',array('plcrno'=>$plcrno) );
		if (!empty($TDislike))
			return count($TDislike);
		else 
			return 0;
	}

	function check_if_user_liked ( $plcrno , $mno ) { 
		// echo "like $plcrno , $mno ";
		$ilike=selectV1('*','fs_plcm_rlike',array( 'plcrno'=>$plcrno , 'operand1'=>'and' , 'mno'=>$mno ) );
		// print_r($ilike);
		if (empty($ilike))
			return false;
		else 
			return true;
	}
	function check_if_user_disliked (  $plcrno , $mno  ) { 
		$iDislike=selectV1('*','fs_plcm_rdislike',array( 'plcrno'=>$plcrno , 'operand1'=>'and' , 'mno'=>$mno ) );
		// print_r($iDislike);
		if (empty($iDislike))
			return false;
		else 
			return true;

	}  
  
?>