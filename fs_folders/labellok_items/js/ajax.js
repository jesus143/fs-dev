	<script type="text/javascript">
	function retrieve_color(id){
		hide_all_open_dropdown(id,'COLOR','ajax_color');
		sessionStorage.colors=id;  
		var persistedval2=sessionStorage.colors; 
		var c = 0;
		if (window.XMLHttpRequest)  {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				for (var i = 0; i < 15; i++) {
					if (id == 'COLOR'+i) {
						$('#ajax_color'+i).css({'position':'absolute','display':'block','border':'1px solid #none','margin-top':'2px'});
						document.getElementById('ajax_color'+i).innerHTML = xmlhttp.responseText;	
					}
				}
			}
		}
		xmlhttp.open('GET','ajaxquery/label_color.php',true);
		xmlhttp.send();
	} 
	function retrieve_brands(id) { 
		hide_all_open_dropdown(id,'BRAND','ajax_BRAND');
		sessionStorage.brand=id;  
		var brand_id=sessionStorage.brand; 
		var tibrand =$('#'+id).val();
		var c=0;

		for (var i = 0; i < 15; i++) {
			if (id == 'BRAND'+i) {
				view_result_id = 'ajax_BRAND'+i;
				sessionStorage.brand_view_result=view_result_id;
				$('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-125px','width':'910px'});	 
			}
		}
		sent(view_result_id,'ajaxquery/label_brand.php?brands_type_in='+tibrand);
	}			
	function retrieve_garment(id) { 
		hide_all_open_dropdown(id,'GARMENT','ajax_GARMENT');
		sessionStorage.garment=id;  
		var persistedval2=sessionStorage.garment; 
		var c = 0;
			for (var i = 0; i < 15; i++) {
				if (id == 'GARMENT'+i) {
					view_result_id = 'ajax_GARMENT'+i;
					 sessionStorage.garment_view_result=view_result_id;
					 $('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-248px','width':'930px'});
				}	
			}
		sent(view_result_id,'ajaxquery/label_garment.php');
	}	
	function retrieve_material(id) { 
		hide_all_open_dropdown(id,'MATERIAL','ajax_MATERIAL');
		sessionStorage.material=id;  
			var c = 0;
			for (var i = 0; i < 15; i++) {
				if (id == 'MATERIAL'+i) {
					view_result_id = 'ajax_MATERIAL'+i;
					sessionStorage.material_view_result=view_result_id;
					$('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-373px','width':'930px'});
				}	
			}
		sent(view_result_id,'ajaxquery/label_material.php');
	}	
	function retrieve_pattern(id) { 
		hide_all_open_dropdown(id,'PATTERN','ajax_PATTERN');
		sessionStorage.pattern=id; 
		var c = 0;
		for (var i = 0; i < 15; i++) {
			if (id == 'PATTERN'+i) {
				view_result_id = 'ajax_PATTERN'+i;
				sessionStorage.pattern_view_result=view_result_id;
				$('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-498px','width':'930px'});
			}	
		}		
		sent(view_result_id,'ajaxquery/label_pattern.php');
	}	
	function retrieve_price(id) {
		hide_all_open_dropdown(id,'PRICE','ajax_PRICE');
		sessionStorage.price=id;   
		var c = 0;
		for (var i = 0; i < 15; i++) {
			if (id == 'PRICE'+i) {
				view_result_id='ajax_PRICE'+i;
				sessionStorage.price_view_result=view_result_id;
				$('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-623px','width':'930px'});	
			}
		}	
		sent(view_result_id,'ajaxquery/label_price.php');
	}	
	function retrieve_purchased_at(id) { 
		hide_all_open_dropdown(id,'PURCHASED','ajax_PURCHASED');
		sessionStorage.purchased=id;  
		var PURCHASED_AT_id=sessionStorage.purchased; 
		var tistore =$('#'+id).val();
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'PURCHASED'+i) {
				view_result_id = 'ajax_PURCHASED'+i;
				sessionStorage.PURCHASED_AT_view_result=view_result_id;
				$('#'+view_result_id).css({'position':'absolute','display':'block','margin-left':'-748px','width':'910px'});	 
			}
		}
		sent(view_result_id,'ajaxquery/label_purchased.php?purchased_at_type_in='+tistore);
	}
	function retrieve_occations_list() { 

		$('#res_occasion').css({'display':'block'})
		var v=$('.occasion').val();
		sent('res_occasion','ajaxquery/label_occasion.php?key_typed='+v);
		hide_all_open_dropdown('none','res_occasion','none');
	}
	function retrieve_season_list() { 

		$('#res_season').css({'display':'block'})
		var v=$('.season').val();
		sent('res_season','ajaxquery/label_season.php?key_typed='+v);
		hide_all_open_dropdown('none','res_season','none');
	}
	function retrieve_style_list() { 

		$('#res_style').css({'display':'block'})
		var v=$('.style').val();
		sent('res_style','ajaxquery/label_style.php?key_typed='+v);
		hide_all_open_dropdown('none','res_style','none');
	}

	function save_all_data_to_db(){ 

		var tl = $('.block_circle_tag').length;
		 // alert(tl);


	  
		 for (var i = 1;  i <= tl; i++) {  
		 	
		 	hexc($('#COLOR'+i).css('background-color'));
		 	color = color.replace('#','');
		 	brand = $('#BRAND'+i).val();
		 	garment = $('#GARMENT'+i).text();
		 	material = $('#MATERIAL'+i).text();
		 	pattern = $('#PATTERN'+i).text();
		 	price = $('#PRICE'+i).text();
		 	purchased_at = $('#PURCHASED'+i).val();
		 	pos_x_y = $('#pos_x_y'+i).val();

		 	$('#into_ready_to_be_saved_in_db').append(color+'-next-'+brand+'-next-'+garment+'-next-'+material+'-next-'+pattern+'-next-'+price+'-next-'+purchased_at+'-next-'+pos_x_y+'-next-');
		 }


		 alert($('.look-article-field').val());

		 $('#into_ready_to_be_saved_in_db').append($('.look_name').val()+'-next-'+$('.textarea').val()+'-next-'+$('.look-article-field').val()+'-next-'+$('.occasion').val()+'-next-'+$('.season').val()+'-next-'+$('.style').val());
	


		 data=$('#into_ready_to_be_saved_in_db').text();
 
// PATTERN
// PRICE
// PURCHASED
// pos_x_y
		 

		//  for (var i = 0; i < data.length; i++) {
		  	 
		// 	if (data[i]=='#') {
		// 		data[i]=='';
		// 	};
		// };
		// alert(data);	

		 sent('db_res','ajaxquery/label_save.php?data='+data);
	}



   









	function hide_all_open_dropdown(id,type,res_type){ 
	 	 
		 var res_dropdown=["ajax_color","ajax_BRAND","ajax_GARMENT","ajax_MATERIAL","ajax_PATTERN","ajax_PRICE","ajax_PURCHASED"];
		 var out_res_dropdown=["res_occasion","res_season","res_style"];
		 	for (var i = 0; i < out_res_dropdown.length; i++) {
		 		if (out_res_dropdown[i] == type ) {
		 		}else { 
					out_res_clicked=out_res_dropdown[i];
		 			document.getElementById(out_res_clicked).style.display = "none";
		 		}
		 	};
		for (var i = 1; i < 16; i++) {
		 	if (id == type+i) {		 
				res_clicked = res_type+i;
		 	};
		};
		for (var i = 1; i < 16; i++) {

			for (var j = 0; j < res_dropdown.length; j++) {
				if (res_dropdown[j]+i == res_clicked ) { 
				}
				else { 
					document.getElementById(res_dropdown[j]+i).style.display = "none";	
				}
			};
		}
	}
	function sent(view_result_id,data){ 
		if (window.XMLHttpRequest)  {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				 document.getElementById(view_result_id).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET',data,true);
		xmlhttp.send();
	}		


</script>
 