<?php

	# Date: Jan, 25, 2009
	# Created by: Jesus Erwin Suarez 
	#
	function connect($db,$host,$user,$pass) {

		$con=mysql_connect($host,$user,$pass) or die(mysql_error());;
		if ($con) {
			// echo "connected<br>";
		} else { 
			// echo " not connected<br>";
		}
		mysql_select_db($db)or die (mysql_error()); 
	}
	function select($tableName,$tablen,$where) {
		$key=0;
		$res=array();
		if (!empty($where)) {
			$Q=@mysql_query("SELECT * FROM $tableName WHERE $where[0] = $where[1] ");
		}else{
			$Q=@mysql_query("SELECT * FROM $tableName");
		}
		while ($db=mysql_fetch_array($Q)) { 
			for ($i=0; $i < $tablen; $i++) { 
				$res[$key][$i]=$db[$i];
			}
			$key++;
		}
		if (!empty($res)) {
			return $res;	
		}else{
			return 0;
		} 
	}
	function select_w_2($tableName,$tablen,$where,$oparators){
		$key=0;
		$res=array();
			$Q=@mysql_query("SELECT * FROM $tableName WHERE $where[0] = '$where[1]' $oparators $where[2] = '$where[3]' ");
			while ($db=mysql_fetch_array($Q)) { 
				for ($i=0; $i < $tablen; $i++) { 
					$res[$key][$i]=$db[$i];
				}
				$key++;
			}
			if (!empty($res)) {
				return $res;	
			}else{
				return 0;
			} 
		}
		
 	function delete($table_name,$where) {
 		$q=@mysql_query("DELETE FROM $table_name WHERE $col_name = $value " );
 		return $q;
 	}

	function delete_w_2($table_name,$where_array,$oparators) {
 		$q=@mysql_query("DELETE FROM $table_name WHERE $where_array[0] = $where_array[1] $oparators $where_array[2] = $where_array[3] " );
 		return $q;
 	}
 	function updateArray($tableName,$rowNameArray,$valuesArray,$rowNameCompare,$rowValCompare) {
 		for ($i=0; $i <count($rowNameArray) ; $i++) { 
 			$value=$valuesArray[$i];
 			$rowName=$rowNameArray[$i]; 			
 			$res=mysql_query("UPDATE $tableName SET $rowName = '$value' WHERE $rowNameCompare = $rowValCompare");
 			if ($res) {
 				// echo "successfully updated";
 			}else{ 
 				// echo "failled to update";
 			}
 		}
 	}
 	function updateArray_w_2($tableName,$rowNameArray,$valuesArray,$whereArray) {
 		for ($i=0; $i <count($rowNameArray) ; $i++) { 
 			$value=$valuesArray[$i];
 			$rowName=$rowNameArray[$i]; 			
 			$res=mysql_query("UPDATE $tableName SET $rowName = '$value' WHERE $whereArray[0] = $whereArray[1] and $whereArray[2] = $whereArray[3]");
 			if ($res) {
 				// echo "successfully updated";
 			}else{ 
 				// echo "failled to update";
 			}
 		}
 	}
	function insert($table_name,$row_name_array,$values_array,$row_id_name){
		for ($i=0; $i < count($row_name_array) ; $i++) { 
			if ($i<1) {
				// echo "$i insert";
				$b0=mysql_query("INSERT INTO  $table_name ($row_name_array[$i]) value('$values_array[$i]') ");
				$last_id = mysql_insert_id(); 
			}else{
				$b1=mysql_query("UPDATE $table_name SET $row_name_array[$i] = '$values_array[$i]' WHERE $row_id_name = $last_id");
			}			
		}
		if (!empty($b0) && !empty($b1)  ) {
			return true;
		}else{
			return false;
		}
	}
 	function searchOne($tableName,$tablen,$keySearch,$rowName,$limit) {
		$key=0;
		$res=array();

		if (!empty($keySearch)) {
			$Q=mysql_query("SELECT * FROM $tableName WHERE $rowName  LIKE '%$keySearch%' LIMIT $limit");
			while ($db=mysql_fetch_array($Q)) { 
				for ($i=0; $i < $tablen; $i++) { 
					$res[$key][$i]=$db[$i];
				}
				$key++;
			}
		}
		return $res;	 		
	}

?>


<?php

	#
	# important
	#

	function get_file_extention($filename,$allowed_eXts){
		$c=0;
		for ($i=0; $i < strlen($filename) ; $i++) { 
			if($filename[$i] == '.'){
				$file_extention=substr($filename,$i+1,strlen($filename));
				$file_extention=strtolower($file_extention);
			}
		}
		for ($i=0; $i < count($allowed_eXts); $i++) { 
			if ($allowed_eXts[$i] == $file_extention){
				return true;
			} 
		}
	}

	function set_define($key,$value){
		$d=define($key,$value);
		return $d;
	}
?>


<?php 
	function cif($db,$array,$key){  # cif = check info exist
		$exist_count=0;
		for ($i=0; $i < count($db) ; $i++) { 

			for ($j=0; $j < 4; $j++) { 
			
				if ($db[$i][$j+2] == $array[$j] ) { 
					$exist_count++;
				}
			}
		}
		return $exist_count;
	}

	function temp_reg_insert($reg_info_array){

	 	$mi_first_name = $_POST[$reg_info_array[0]] ;
	 	$mi_last_name = $_POST[$reg_info_array[1]] ;
	 	$mi_username = $_POST[$reg_info_array[2]] ;
	 	$mi_password = $_POST[$reg_info_array[4]] ;
	 	$mi_email = $_POST[$reg_info_array[6]] ;
		$bool = mysql_query("INSERT INTO member_info(mi_username,mi_password,mi_email,mi_first_name,mi_last_name) VALUES ('$mi_username','$mi_password','$mi_email','$mi_first_name','$mi_last_name') ") or mysql_error();
		return $bool;
	}
	function temp_get_user_id($username,$password){ 
	}

?>

<?php 
	#important stuff

	function count_total_like($total_like) {
		if (empty($total_like)) { 						
			echo "0";
		}else{
			echo count($total_like);													
		}	
	}


?>