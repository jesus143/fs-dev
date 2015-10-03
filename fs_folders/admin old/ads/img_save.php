
<?php 

	function insert_ads_info($client_name,$company_name,$link,$file_ext) {  
		$q=insert('ads',array('admin_no','client_name','company_name','link','ext','date_uploaded'),
			// array(1,'jesus','website builder team','http://www.google.com',date("Y-m-d")),'ano');
		    array(1,$client_name,$company_name,$link,$file_ext,"2012-01-01"),'ano');
		if ($q) {
			return true;
		}else{
			return false;
		}

	}

?>