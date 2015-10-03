<?php 

	$page = 'home';
	switch ( $page ) {
		case 'home':
				$home = 'color:#b01d23'; 	
			break; 
		case 'participate':
				$participate = 'color:#b01d23'; 	
			break; 
		case 'community':
				$community = 'color:#b01d23'; 	 
			break; 
		case 'info':
				$info = 'color:#b01d23'; 	
			break; 
		default: 
			break; 

	} 

		/*
		*   date replaced: novemeber 01 , 2013
		*	required to work header correctly. 
		*   fs_folders/page_header/css/header1.css
		*	fs_folders/page_header/js/header1_js.js
		*	fs_folders/page_header/js/header1_query.js
		*/  
		$userInfo = $this->get_user_full_fs_info( $mno ); 

		$fullName    = $userInfo['fullName'];
		$username    = $userInfo['username']; 
		$opercentage = $userInfo['opercentage']; 
		$tfollowers  = $userInfo['tfollowers']; 
		$tlikes      = $userInfo['tlikes']; 
		$tdrips      = $userInfo['tdrips']; 
		  
		// $fullname = 'Jesus Erwin Suarez Suaresdasdzasdas12';  

		$fnamelen = strlen($fullName); 
		if ( $fnamelen > 20 ) { 
			$fullName = substr($fullName,0,18); 
			$fullName.='..';
			// echo " if $fullName1";
		}   
		$username = $this->get_username_by_mno( $mno );   
		$header_settings_tab_profile_style = '';
		$header_settings_tab_account_style = '';

		switch ( $header_page ) {
			case 'profile':
				 	$header_settings_tab_profile_style = 'background-color:#284372;color:white';
				break;
			case 'account':
				 	$header_settings_tab_account_style = 'background-color:#284372;color:white';
				break;
			case 'home':
				 	$header_settings_tab_style = 'background-color:#284372;';
				break;
			case 'lookdetails':
				 	$header_settings_tab_style = 'background-color:#284372;';
				break; 
			default: 
				break;
		} 
		
		 
 
?>	  


 







<div id="new-header-signout-wrapper" > 
	<table border="1" cellpadding="0" cellspacing="0" style="<?php echo $style_main_table; ?>"  > 	
		<tr>
			<td  id="new-top-header" style="padding:0px; <?php echo $style_up; ?>"   > 
				<ul >  
					<li>   
						<div style="margin-left:59px; cursor:pointer" > 
							<a href="\">
								<img src="<?php echo "$this->genImgs/blue-logo.png"; ?>" >
							</a>
						</div>  
					</li>   
					<li> <div id='new-header-signout-link' style=" width:145px;  margin-top:12px;cursor:pointer;" > <a href='\'	       style="<?php echo "$home"; ?>">         HOME        </a>  </div> </li>
					<li> <div id='new-header-signout-link' style=" width:120px;  margin-top:12px;cursor:pointer;" > <a href='\'        style="<?php echo "$participate"; ?>" > PARTICIPATE </a>  </div> </li>
					<li> <div id='new-header-signout-link' style=" width:120px;  margin-top:12px;cursor:pointer;" > <a href='\'        style="<?php echo "$community"; ?>" >   COMMUNITY   </a>  </div> </li>
					<li> <div id='new-header-signout-link' style=" width:70px;   margin-top:12px;cursor:pointer;" > <a href='#' style="<?php echo "$info"; ?>" >        INFO        </a>  </div> </li>  
					<li>  
						<div style="<?php echo $header_signout_search_field_style; ?>" >
							<table border="0" id='header_search_field' > 
		 						<tr> 
		 							<td>
		 								<input id='new-header-signout-search' type='text'   >
		 							</td>
		 							<td>   
		 								<input id='new-header-signout-scope' type='image' src="fs_folders/images/genImg/header-search-icon.jpg" > 
		 							</td>
		 					</table>  
		 				</div> 
					</li>   
				</ul>   
				<center><div style="border:1px solid grey; height :1px; width:887px; margin-left:-1px; margin-top:40px;" ></div></center> 
			</td> 
		<tr>
			<td style="background-color:grey" >  
			</td>
	</table> 
</div>  
<div  id="res-fixed" style="position:fixed; margin-top:100px;color:#000; display:none" >  
	res here
</div>  


