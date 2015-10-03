<script type="text/javascript">
	function hexc(colorval) {
		    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		    delete(parts[0]);
		    for (var i = 1; i <= 3; ++i) {
		        parts[i] = parseInt(parts[i]).toString(16);
		        if (parts[i].length == 1) parts[i] = '0' + parts[i];
		    }
		    color = '#' + parts.join('');
	}


	function close_x() { 
		for (var i = 1; i < 15; i++) {
			document.getElementById('ajax_color'+i).style.display = "none";
			document.getElementById('ajax_BRAND'+i).style.display = "none";
			document.getElementById('ajax_GARMENT'+i).style.display = "none";
			document.getElementById('ajax_MATERIAL'+i).style.display = "none";
			document.getElementById('ajax_PATTERN'+i).style.display = "none";
			document.getElementById('ajax_PRICE'+i).style.display = "none";
			document.getElementById('ajax_PURCHASED'+i).style.display = "none";
		}
		document.getElementById('res_occasion').style.display = "none";
		document.getElementById('res_season').style.display = "none";
		document.getElementById('res_style').style.display = "none";
	}






	function get_clicked_color(atr){ 
		// alert(atr);


	 

		var bg = atr;
		var id=sessionStorage.colors;
	 
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'COLOR'+i) {
			 	$('#COLOR'+i).css('background-color',bg);
			 	$('#COLOR'+i).val('');
			  
			 	$('#hashtag_'+i+'_0').text('#'+bg);
			 	$('#hashtag_'+i+'_0').css('display','block');
			} 
		};
	}
	function get_clicked_brand(brand_selcted){ 
		var id=sessionStorage.brand;

		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'BRAND'+i) {
				$('#BRAND'+i).val(brand_selcted);
				$('#ajax_BRAND'+i).css('display','none');
				brand_selcted=brand_selcted.replace(" ","");
				$('#hashtag_'+i+'_1').text('#'+brand_selcted);
				$('#hashtag_'+i+'_1').css('display','block');
			}
		};
	}
	function get_clicked_garment(atr){ 
		var id=sessionStorage.garment;
		
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'GARMENT'+i) {
				static_div_hide_after_click('#GARMENT'+i,'#ajax_GARMENT'+i,atr);
				atr=atr.replace(" ","");
				$('#hashtag_'+i+'_2').text('#'+atr);
				$('#hashtag_'+i+'_2').css('display','block');
			}
		};	
	}
	function get_clicked_material(atr){ 
		var id=sessionStorage.material;
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'MATERIAL'+i) {
				static_div_hide_after_click('#MATERIAL'+i,'#ajax_MATERIAL'+i,atr);

				atr=atr.replace(" ","");
				$('#hashtag_'+i+'_3').text('#'+atr);
				$('#hashtag_'+i+'_3').css('display','block');
			}
		};	
	}
	function get_clicked_pattern(atr){ 
		var id=sessionStorage.pattern;
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'PATTERN'+i) {
				static_div_hide_after_click('#PATTERN'+i,'#ajax_PATTERN'+i,atr);
				atr=atr.replace(" ","");
				$('#hashtag_'+i+'_4').text('#'+atr);
				$('#hashtag_'+i+'_4').css('display','block');
			}
		};	
	}
	function get_clicked_PURCHASED(atr){ 
	var id=sessionStorage.purchased;
	atr=atr.replace(" ","");
		
		var c=0;
		for (var i = 0; i < 15; i++) {
			if (id == 'PURCHASED'+i) {
				$('#PURCHASED'+i).val(atr);
				$('#ajax_PURCHASED'+i).css('display','none');
			}
		};	
	}
	function get_clicked_price(atr){ 
		var id=sessionStorage.price;
		var c=0;
		for (var i = 0; i < 15; i++) {
				if (id == 'PRICE'+i) {
					static_div_hide_after_click('#PRICE'+i,'#ajax_PRICE'+i,atr);
					atr=atr.replace(" ","");
					$('#hashtag_'+i+'_5').text('#'+atr);
					$('#hashtag_'+i+'_5').css('display','block');
				}
		};	
	}


	function get_clicked_accation(atr){ 
		// alert('occasion');
		 
		
		$('.occasion').val(atr);





		$('.hashtag_occasion').text('#'+atr.replace(" ",""));
		$('#res_occasion').css({'display':'none'})
	}
	function get_clicked_session(atr){ 
		// alert('sesssion');
	 
		cval=$('.season').val();
	 	cval=cval.replace(','+atr,'');
	 	cval=cval.replace(atr+',','');
	 	cval=cval.replace(atr,'');

		if (cval=='') { 
			$('.season').val(atr);
		}
		else {  
			$('.season').val(cval+','+atr);
		}
		cval=$('.season').val(); 
	 
		$('.hashtag_season').text(provide_hash(cval));

		// $('#res_season').css({'display':'none'})
	}
	function get_clicked_style(atr){ 

		var cval=$('.style').val();
	 	cval=cval.replace(','+atr,'');
	 	cval=cval.replace(atr+',','');
	 	cval=cval.replace(atr,'');
		if (cval=='') { 
			$('.style').val(atr);
		}
		else {  
			$('.style').val(cval+','+atr);
		}
		cval=$('.style').val();

		$('.hashtag_style').text(provide_hash(cval));
	}

	function provide_hash(str){ 
		var strs;
		 myarr = str.split(",");
		for (var i = 0; i < myarr.length; i++) {
			 strs+=' #'+myarr[i];
		};
		return strs.replace('undefined','');
	}	
 



























function static_div_hide_after_click(id,view_result,atr){ 
	// alert('id = '+id+'attr = '+atr);
	$(id).css('color','#000');
	$(id).text(atr);
	$(view_result).css('display','none');
}


$(document).ready(function(){

		load_init();
		input_static_div_clicked();
		input_not_static_input_clicked();
		hide_ajax_div_result_click_other_div();
		// onblur();

		$('#ajax_color').click(function(){ 
			$(this).css('display','none');
		});
		$('#ajax_color2').click(function(){ 
			$(this).css('display','none');
		});
		$(document).click(function(){ 
			var c = 0;
			for (var i = 0; i<15; i++ ) {
				 
				  $('#ajax_color'+i).css('display','none');
				 
			};
		}); 

	 











		$('#test').click(function(){ 
			alert('wo');
		});














		function hide_ajax_div_result_click_other_div(){
			$('#body, #right_side , #post_on , #save , #COLOR ,#GARMENT , #MATERIAL ,#PATTERN , #PRICE , #PURCHASED' ).click(function() { 
				var brand_res_id=sessionStorage.brand_view_result;
				$('#'+brand_res_id).css('display','none');
			});
			$('#body, #right_side , #post_on , #save , #COLOR ,#BRAND , #MATERIAL ,#PATTERN , #PRICE , #PURCHASED' ).click(function() { 
				var garment_res_id=sessionStorage.garment_view_result;
				$('#'+garment_res_id).css('display','none');
			}); 
			$('#body, #right_side , #post_on , #save , #COLOR ,#BRAND , #PRICE ,#PATTERN , #GARMENT , #PURCHASED' ).click(function() { 
				var material_res_id=sessionStorage.material_view_result;
				$('#'+material_res_id).css('display','none');
			});
			$('#body, #right_side , #post_on , #save , #COLOR ,#BRAND , #PRICE ,#MATERIAL , #GARMENT , #PURCHASED' ).click(function() { 
				var pattern_res_id=sessionStorage.pattern_view_result;
				$('#'+pattern_res_id).css('display','none');
			});
			$('#body, #right_side , #post_on , #save , #COLOR ,#BRAND , #MATERIAL ,#PATTERN , #GARMENT , #PURCHASED ' ).click(function() { 
				var price_res_id=sessionStorage.price_view_result;
				$('#'+price_res_id).css('display','none');
			});
		}
		function input_not_static_input_clicked(){ 
			$('.not_static_input').click(function(){ 
				 // $('.static_div_input').css('border','1px solid #ccc');
			});
		}
		function input_static_div_clicked(){ 
			$('.static_div_input').click(function(){ 
				 // $(this).css('border','2px solid #f1ca7e');

			});
		}
		// remove_colored_border_static_dv_input('#PATTERN','#MATERIAL','#PRICE','#COLOR','#GARMENT');
		function static_div_inputs_clicked(){ 

			$('#PATTERN').click(function(){ 	 
				 remove_border_color_static_div('#MATERIAL','#PRICE','#COLOR','#GARMENT');
				 // add_color_as_clicked('#PATTERN');
			});
			$('#MATERIAL').click(function(){ 	 
				 remove_border_color_static_div('#PATTERN','#PRICE','#COLOR','#GARMENT');
				 // add_color_as_clicked('#MATERIAL');
			});
			$('#PRICE').click(function(){ 	 
				 remove_border_color_static_div('#MATERIAL','#PATTERN','#COLOR','#GARMENT');
				 // add_color_as_clicked('#PRICE');
			});
			$('#COLOR').click(function(){ 	 
				 remove_border_color_static_div('#MATERIAL','#PRICE','#PATTERN','#GARMENT');
				 // add_color_as_clicked('#COLOR');
			});
			$('#COLOR2').click(function(){ 	 
				 remove_border_color_static_div('#MATERIAL','#PRICE','#PATTERN','#GARMENT');
				 // add_color_as_clicked('#COLOR');
			});
			$('#GARMENT').click(function(){ 	 
				 remove_border_color_static_div('#MATERIAL','#PRICE','#PATTERN','#COLOR');
				 // add_color_as_clicked('#GARMENT');
			}); 
		}
		function remove_border_color_static_div(id2,id3,id4,id5){ 
			$(id2).css('border','2px solid #ccc');
			$(id3).css('border','2px solid #ccc');
			$(id4).css('border','2px solid #ccc');
			$(id5).css('border','2px solid #ccc');
		}
		function add_color_as_clicked(id){ 
			$(id).css('border','1px solid #f1ca7e');
		}
		function load_init(){ 
			c=0;
			for (var i = 0 ; i <15 ; i ++) {
				// if (c==0) {
				// 	$('#GARMENT').text('GARMENT');
				// 	$('#PRICE').text('PRICE');
				// 	$('#MATERIAL').text('MATERIAL');
				// 	$('#PATTERN').text('PATTERN');
				// 	c+=2;
				// }
				// else { 
					$('#GARMENT'+i).text('GARMENT');
					$('#PRICE'+i).text('PRICE');
					$('#MATERIAL'+i).text('MATERIAL');
					$('#PATTERN'+i).text('PATTERN');
					// c++;
				// }
				hide_init_text_clicked(c)
				
			};
			$('.textarea').val('');
			$('.onetwo').val('');
			
		}
		function remove_static_div_text(id,text){ 
				 if ($(id).text()==text) {
				 	// alert('text is garment');
				 	$(id).text('');
				 }
		}
		function other_div_click(id,text){ 
			if ($(id).text()=='') {
			 	// alert('text is garment');
				 $(id).text(text);
			 }
		}
		// show and hide distinc name
		$('#COLOR').click(function (){ 
			$(this).text('');
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PATTERN','PATTERN');
			other_div_click('#MATERIAL','MATERIAL');
		});
		$('#COLOR2').click(function (){ 
			$(this).text('');
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PATTERN','PATTERN');
			other_div_click('#MATERIAL','MATERIAL');
		});
		var c =0;
		var BRAND;
		for (var i = 0 ;  i < 15; i++) {
			// if ( c == 0 ) {
			// 	BRAND='#BRAND';
			// 	PURCHASED = '#PURCHASED';
			// 	c+=2;
			// }else { 
				BRAND='#BRAND'+i;
				PURCHASED = '#PURCHASED'+i;
				// c++;
			// }
			$(BRAND).click(function (){ 
				if($(this).val()=='BRAND') {
					$(this).val('');
					$(this).css("color","#000");
				}
				other_div_click('#GARMENT','GARMENT');
				other_div_click('#PRICE','PRICE');
				other_div_click('#PATTERN','PATTERN');
				other_div_click('#MATERIAL','MATERIAL');
			})
			$(BRAND).focusout(function (){ 
				if($(this).val()=='') {
			 		$(this).css("color","#ccc");
			 		$(this).val('BRAND');
				}		 
			})
		$(PURCHASED).click(function (){ 
			if($(this).val()=='PURCHASED AT') {
				$(this).val('');
				$(this).css("color","#000");
			}
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PRICE','PRICE');
			other_div_click('#PATTERN','PATTERN');
			other_div_click('#MATERIAL','MATERIAL');
		})
		$(PURCHASED).focusout(function (){ 
			if($(this).val()=='') {
	 			$(this).css("color","#ccc");
	 			$(this).val('PURCHASED AT');
			}		 
		})	
		};

		$('#GARMENT').click(function (){ 
			 remove_static_div_text('#GARMENT','GARMENT');
			 other_div_click('#PRICE','PRICE');
			 other_div_click('#PATTERN','PATTERN');
			 other_div_click('#MATERIAL','MATERIAL');
		})
		$('#MATERIAL').click(function (){ 
			if($(this).val()=='MATERIAL') {
				$(this).val('');
				$(this).css("color","#000");
			}
			remove_static_div_text('#MATERIAL','MATERIAL');		
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PRICE','PRICE');
			other_div_click('#PATTERN','PATTERN');

		})
		$('#PATTERN').click(function (){ 
			if($(this).val()=='PATTERN') {
				$(this).val('');
				$(this).css("color","#000");
			}
			remove_static_div_text('#PATTERN','PATTERN');
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PRICE','PRICE');
			other_div_click('#MATERIAL','MATERIAL');
		})
		$('#PRICE').click(function (){ 
			if($(this).val()=='PRICE') {
				$(this).val('');
				$(this).css("color","#000");
			}
			remove_static_div_text('#PRICE','PRICE');
			other_div_click('#GARMENT','GARMENT');
			other_div_click('#PATTERN','PATTERN');
			other_div_click('#MATERIAL','MATERIAL');
		})		
		function hide_init_text_clicked(c){  
			$('#GARMENT'+c).click(function(){ 
				$(this).text('');
			});
			$('#PRICE'+c).click(function(){ 
				$(this).text('');
			});
			$('#MATERIAL'+c).click(function(){ 
				$(this).text('');
			});
			$('#PATTERN'+c).click(function(){ 
				$(this).text('');
			});
		}
		 		



		function onblur(){ 
			$('.occasion').focusout(function(){ 
				$('#res_occasion').css({'display':'none'}); 
			})
		}	



 

















});
</script>