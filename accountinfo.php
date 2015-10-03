<?php 

	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");




	$mc = new myclass();  



$accounts = $mc->selectV1('*', 'fs_member_accounts' );
$invites  = $mc->selectV1('*', 'fs_invited' );
 

echo " <table border='1' cellpsacing='0' cellpadding='0' id='table' > ";
$c=0;
echo "<td>   <h4> from old fs version people  </h4> </td> <tr> ";
for ($i=0; $i < count($accounts) ; $i++) { 

	if ( !empty($accounts[$i]['email'] ) and !empty( $accounts[$i]['mno'] ) ) {
			 
		$c++;
		$mail = $accounts[$i]['email']; 
		$name = $mc->get_full_name_by_id($accounts[$i]['mno']);
		echo " <td>  $c.) </td> <td width='20px' > $mail </td> <td  width='20px' > $name </td> <tr>";
	}
}  
echo " 
	<th> # </th>	 
	<th>  name </th>  
	<td>  email </th>
	<th>  website or blog </th>  
	<th>  occupation </th>  
	<th>  style </th>  
	<th>  offer </th>  
	 
	<th>  ip address </th>  
	<th>  date sign up </th>  
	<tr> ";

for ($i=0; $i < count($invites) ; $i++) {  
	$c++;
	$name = $invites[$i]['invited_fn']; 
	$invited_ln = $invites[$i]['invited_ln']; 
	$mail = $invites[$i]['invited_email'];  
	$invited_wob = $invites[$i]['invited_wob']; 
	$invited_occu = $invites[$i]['invited_occu']; 
	$invited_style = $invites[$i]['invited_style']; 
	$invited_offer = $invites[$i]['invited_offer']; 
	$invited_genCode = $invites[$i]['invited_genCode']; 
	$invited_ip = $invites[$i]['invited_ip'];  
	$invited_date = $invites[$i]['invited_date'];  

	echo " 
		<td>  $c.) </td> 
		<td> $name $invited_ln </td> 
		<td> $mail </td> 
		<td> $invited_wob </td> 
		<td> $invited_occu </td> 
		<td> $invited_style </td> 
		<td> $invited_offer </td> 
		 
		<td> $invited_ip </td> 
		<td style='width:200px' > $invited_date </td>   
	<tr>";	 
} 
echo "</table> ";

?>
