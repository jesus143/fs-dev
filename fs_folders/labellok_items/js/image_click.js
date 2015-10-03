
<!-- source : http://api.jquery.com/ -->
<!-- array  : http://www.w3schools.com/js/js_obj_array.asp -->
<!--  -->

<script type="text/javascript">

	$(document).ready(function(){ 

		var c = 0;
		var d = 0;
		var radius = 20;
		var img = '#left_side img';
		img_clicked();
		block_square();
		image_hover();
		tag_hoverd();

		function img_clicked()
		{  
		 	$(img).click(function(e){ 
		 		$('#hastag_box_list').css('display','block');
		 		x = e.pageX;
				y = e.pageY;
				y-=19;
				x-=17;


				c = $('.block_circle_tag').length;
				 c++;

				if (c>9) {
					radius=100; 
					padding = '5px 6px 5px 6px';
				}else { 
					padding = '4px 8px 4px 8px';
				}
				if (c < 16) { 
					$('#block_circle_tags').append("<div class='block_circle_tag' id=tag_"+c+"  >"+c+"<br></div>");

					$('#tag_'+c).css({
						'margin-top':y,'margin-left':x,'position':'absolute','z-index':1,'background-color':'#000','border-radius':'500px','color':'white',
						'padding':padding,'font-size':'10px','cursor':'pointer'
					});

					// $('#table_container_'+c).fadeIn('fast');
					$('#table_container_'+c).css('display','block');
					info_to_be_save_in_db(x,y,c);
				}
				else{ 
					alert('only 15 items allowed');
				}

				tags_hovered();	
				tagg_dbclick_and_removed();
				display_tagged_view(c);
		 	});
		 }
 

		function info_to_be_save_in_db(x,y,c)
		{
		  $('#pos_x_y'+c).val('x='+x+'y='+y);
		}
	 	function block_square()
	 	{  
			$(img).mousemove(function(e){ 
		 		x = e.pageX;
				y = e.pageY;
				x-=2;
				$('#block_barrer').css({'top':y,'left':x,'display':'block'});
				$(this).css('cursor','croshair');
				$('#ins_del').css('display','none');
				$('#ins_label').css('display','block');
		 	});
		 	$(img).mouseleave(function(){ 
				$('#block_barrer').css({'display':'none'});
		 	});	
	 	}

	 	function tags_hovered(){  
		 	$('.item').mousemove(function(){ 
		 		var id = $(this).attr('id');
		 		var num = '';


		 		$(id).css({'opacity':'0.5'});

		 		num=get_number($(this).attr('id'),16);







		 		$('#table_container_'+num).css({'border':'1px solid #505050','background-color':'#505050'});

		 		$('#tag_'+num).css({'opacity':'0.5'});

		 		$('#tagged_num_'+num).css({'color':'#505050  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#505050')
		 		};


		 	});

			$('.item').mouseout(function(){ 
			 	var id = $(this).attr('id');
		 		var num = '';
		 		num=get_number($(this).attr('id'),16);

		 		$('#table_container_'+num).css({'border':'1px solid #fff','background-color':'#fff'});
		 		$('#tag_'+num).css('opacity','1');
		 		 
		 		// alert(id);
		 		$('#tagged_num_'+num).css({'color':'#fff  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#fff')
		 		};

		 	});
			$('.block_circle_tag').mousemove(function(e){ 
				x = e.pageX;
				y = e.pageY;
				// y-=2;
		 		var id = $(this).attr('id');
		 		var num = '';
		 		num=get_number($(this).attr('id'),4);

				$('#ins_del').css('display','block');
				$('#ins_label').css('display','none');

		 		$('#'+id).css({'opacity':'0.5'});
		 		$('#table_container_'+num).css({'border':'1px solid #505050','background-color':'#505050'});
		 		$('.item1_'+num).css({'color':'white'});	
		 		
		 		$('#tagged_num_'+num).css({'color':'#505050  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#505050')
		 		};

		 		// $('#block_barrer').css({'top':y,'left':x,'display':'block'});
		 		$('#block_barrer').css({'top':y,'left':x,'display':'block'});
		 		
		 		
		 		// $('#ins_del').css('display','block');
		 		// $('#ins_label').css('display','none');
		 
		 	})	
		 	$('.block_circle_tag').mouseout(function(){ 

		 		var id = $(this).attr('id');
		 		// alert('hovered id = '+id);
		 		var num = '';
		 		num=get_number($(this).attr('id'),4);
		 		$('#'+id).css({'opacity':'1'});
		 		$('#table_container_'+num).css({'border':'1px solid #fff','background-color':'#fff'});
		 		$('.item1_'+num).css({'color':'#000'});

		 		$('#tagged_num_'+num).css({'color':'#fff '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#fff')
		 		};

		 	});



 			$('.tagged_list_').mousemove(function(){  
		 		var id=$(this).attr('id');
		 		var num=parseInt(id.replace("tagged_list_",""));
				
				$('#tagged_num_'+num).css({'color':'#505050  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#505050')
		 		};

		 		$('#tag_'+num).css({'opacity':'0.5'});
		 		$('#table_container_'+num).css({'border':'1px solid #505050','background-color':'#505050'});
		 	});

		 	$('.tagged_list_').mouseout(function(){  
		 		var id=$(this).attr('id');
		 		var num=parseInt(id.replace("tagged_list_",""));

		 		$('#tagged_num_'+num).css({'color':'#fff  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#fff')
		 		};

		 		$('#table_container_'+num).css({'border':'1px solid #fff','background-color':'#fff'});
		 		$('#tag_'+num).css('opacity','1');
		 	});
		}
 

		function tagg_dbclick_and_removed(){ 

			$('.block_circle_tag').dblclick(function(){ 
					var num=parseInt($(this).attr('id').replace("tag_",""));
					removed_clicked_and_change_numbers(num);
		 	});
		}
		function removed_clicked_and_change_numbers(num){

			 	// alert('num = '+num+' and '+is_int(num));
			 	// alert($('.block_circle_tag').length)
				move_number_when_delete(num);
			 
		}
		function move_number_when_delete(clt){ 
			var cl = 15;
			var new_id;			
			transfer_all_data(clt);
			hide_clicked_tagged(clt);
			change_main_class(cl);
			change_id_base_on_class_changes(cl,clt);
			change_number(cl,clt);
			return_main_class(cl);
		}

		function transfer_all_data(clt){ 	
			// var a=clt;
			
			
	  		data_from_fields(clt);
	  		data_from_block_box(clt);
	  		// is_int(clt)	
	  			
	  		hovered_tagged_bg_color(clt);
		 	 
			// a+=1;		
		}
		function hide_clicked_tagged(clt){ 
			n=clt;
			$('#tag_'+n).removeClass('block_circle_tag').addClass('clicked_and_hide');
			$('.clicked_and_hide').attr('id','clicked_and_hide');
		}
		function change_main_class(cl){ 
			for (var i = cl; i  > 0; i--) {
 				$('#tag_'+i).removeClass('block_circle_tag').addClass('block_circle_tag'+i);
			};
		}
		function change_id_base_on_class_changes(cl,clt){ 
			for (var i = cl; i  > clt; i--) {
				nid=i;
				nid-=1;
 				cur_id=$('.block_circle_tag'+i).attr('id');
 				$('.block_circle_tag'+i).attr('id','tag_'+nid);
 				new_id = $('.block_circle_tag'+i).attr('id');
			}
		}
		function change_number(cl,clt){ 
			for (var i = cl; i  > clt; i--) {
 				$('.block_circle_tag'+i).attr('id');
				$('.block_circle_tag'+i).text(i-1);
			};
		}
		function return_main_class(cl){ 
			for (var i = cl-1; i  > 0; i--) {
 				$('#tag_'+i).removeClass($('#tag_'+i).attr('class')).addClass('block_circle_tag');
			};
		}
		function black_or_not(id,text,type){ 
			if (type == 'input') { 
				if ($(id).val() == text) {
			 		 $(id).css({'color':'#ccc'});
			 	}
			 	else { 
			 		 $(id).css({'color':'#000'});
			 	}
		 	}
		 	else if (type == 'div'){ 
		 		if ($(id).text() == text) {
			 		 $(id).css({'color':'#ccc'});
			 	}
			 	else { 
			 		 $(id).css({'color':'#000'});
			 	}
		 	}

		 	
		}
		function hovered_tagged_bg_color(id) { 
			$('#table_container_'+id).css({'border':'1px solid #fff','background-color':'#fff'});
		}
		function hide_last_field(last_field){ 

			$('#table_container_'+last_field).fadeOut('normal');
			$('#tagged_list_'+last_field).fadeOut('normal');
			if (last_field == 1 ) {  
				$('#hastag_box_list').fadeOut('normal');
				// alert('only one remaining');
			}

			// alert('hide now num = '+last_field);
		}
		function data_from_fields(clt){ 
			// brand
			$('.item1_'+clt).css({'color':'#000'});
			var tl = $('.block_circle_tag').length;
		 	for (var i = clt;  i <= tl; i++) {
		 		c=i;
		 		c+=1;
		 		// background color
		 		var x =  $('#COLOR'+c).css('background-color') ;
   				hexc(x);
   				$('#COLOR'+i).css('background-color',color);

		 		$('#BRAND'+i).val($('#BRAND'+c).val());
		 		black_or_not('#BRAND'+i,'BRAND','input');

			 	var div_inputs=["GARMENT","MATERIAL","PATTERN","PRICE"];
			 	for (var j = 0; j < div_inputs.length; j++) {
			 		// alert(div_inputs[j]);
				 	$('#'+div_inputs[j]+i).text($('#'+div_inputs[j]+c).text());
			 		$('#'+div_inputs[j]+c).text(div_inputs[j]);
			 		black_or_not('#'+div_inputs[j]+i,div_inputs[j],'div');
			 	};
		 		// purchased at
		 		$('#PURCHASED'+i).val($('#PURCHASED'+c).val());
		 		black_or_not('#PURCHASED'+i,'PURCHASED AT','input');
				$('#pos_x_y'+i).val($('#pos_x_y'+c).val());
				// position 
		 		hide_last_field($('.block_circle_tag').length);
		 	}
		}
		function data_from_block_box(clt) { 
			var tl = $('.block_circle_tag').length;
		 	for (var i = clt;  i <= tl; i++) {
		 		c=i;
		 		c+=1;
		 		for (var j = 0; j < 6; j++) {
		 			$('#hashtag_'+i+'_'+j).text($('#hashtag_'+c+'_'+j).text());
		 		};
		 	}

		}

		














		function display_tagged_view(c){ 
			// alert('alert'+c);
			$('#tagged_list_'+c).css('display','block'); 

		}



		function fadeOut(num1){ 
			$('#tag_'+num1).fadeOut('normal');
	 		$('#table_container_'+num1).fadeOut('normal');
			var c = 0; 
			for (var i = 0; i < 6; i++) {
				$('#hashtag_'+num+'_'+i).fadeOut('normal');
			};							 
		}
	});







	function hexc(colorval) {
	    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	    delete(parts[0]);
	    for (var i = 1; i <= 3; ++i) {
	        parts[i] = parseInt(parts[i]).toString(16);
	        if (parts[i].length == 1) parts[i] = '0' + parts[i];
	    }
	    color = '#' + parts.join('');
	}

	function is_int(value){ 
	   for (i = 0 ; i < value.length ; i++) { 
	      if ((value.charAt(i) < '0') || (value.charAt(i) > '9')) {return false;}
	    } 
	   return true; 
	}
 	function get_number(id,min){ 
		if (id.length == min) {
		 	num='';
		 }else if(id.length == min+1){ 
		 	num=id.substring(id.length-1,id.length);
		 }else { 
		 	num=id.substring(id.length-2,id.length);
		 }
		 return num;
	}
	
</script>

  