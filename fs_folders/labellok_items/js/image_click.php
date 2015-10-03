
<!-- source : http://api.jquery.com/ -->
<!-- array  : http://www.w3schools.com/js/js_obj_array.asp -->
<!--  -->

<script type="text/javascript"> 
	$(document).ready(function(){  

			// dynamic upload of the image

				function readImage2(file) { 

					var reader = new FileReader();
					var image  = new Image(); 
					reader.readAsDataURL(file);  
					reader.onload = function(_file) {
					    image.src    = _file.target.result;              // url.createObjectURL(file);
					    image.onload = function() {
					    	// alert ( 'image attribute ready to be added to the site' );
					        var w = this.width,
					            h = this.height, 
					            t = file.type,                           // ext only: // file.type.split('/')[1],
					            n = file.name,
					            s = ~~(file.size/1024) +'KB';     
					       		if ( w >= 100 &&  h >= 100) 
					       		{  
					           		var imagestyle = get_image_style( h , w , 889 , 500 );    
					       			$('#modal-image').attr('src',this.src);
					       			$('#modal-image').attr('style',imagestyle);  
					       			$('#upload-image img').css({'display':'none'});   
					       		}   
					    };
					    image.onerror= function() 
					    {  
					        alert('Invalid file type: '+ file.type ); 
					    };      
					};  
				}
				$( "#modal-image-file" ).on( "change", function(e) {   
					if(this.disabled) return alert('File upload not supported!');
					var F = this.files;  
					if ( F.length > 0 ) { 
						if(F && F[0]){ 
							for(var i=0; i<F.length; i++){   
								readImage2( F[i] );
							}
						}
					}
					else{ 
					}
				});   
 
			// init data

				var dropdown =''; 
				var input ='';  
				var container = '#post-look-container'; 

			// for starts here  

				for (var i = 1; i <= 15; i++) 
				{    

					// initialized the tag fields dropdown and field 

						dropdown += '#autocomplete-dropdown-container-brand'+i+','+'#autocomplete-dropdown-container-garment'+i+','+'#autocomplete-dropdown-container-material'+i+','+'#autocomplete-dropdown-container-pattern'+i;    
						input 	 += '#brand'+i+',#garment'+i+',#material'+i+',#pattern'+i;  
					
					// last id must dont have a comma   

						if ( i < 15 ) 
						{
							dropdown+=',';
							input+=',';  
						} 

				}  

			// add keyword , occasion and season field and dropdown 
 
				input+='#occasion,#season,#keyword,.look_name,.look-article-field,.textarea'; 
				dropdown+=',#autocomplete-dropdown-container-occasion,#autocomplete-dropdown-container-season,#autocomplete-dropdown-container-keyword';   

			// hide dropdown when cursor focused on the  field 

				$(input).focus( function( ) {  
					$(dropdown).css('display','none');
				}); 

			// hide dropdown when the container clicked

				$(container).click(function() {
					$(dropdown).css('display','none');  
				})
 
 	// function for the click tag and so on. . .

		// display_none();
		img_mouse_move(); // not in use
		var id = ''; 
		var c = 0;
		var d = 0;
		var a = 0;
		var radius = 20;
		var img = '#left_side img';
		var img_container = '#left_side';
		img_clicked();

		tag_print_edit_look(); 
		block_square();
		image_hover();
		tag_hoverd(); 
 
		function tag_print_edit_look( ) { 









			var pltags_edit = $('.pl_tags_edit').text();
			var Ttags_edit = parseInt($('#Ttag_edit').text());
		 	myarr = str_convert_to_array_1d(pltags_edit,',');
		 	// alert(myarr);
		 	var c=1;
		 	var d=0;
		 	var a=0;
		 	for (var i = 0; i < myarr.length; i++) {

		 		if (Ttags_edit != 0 ) {  
		 			if (myarr[i] == '-') { 
			 	  		if (c>9) {
						radius=100; 
						padding = '5px 6px 5px 6px';
						}else { 
							padding = '4px 8px 4px 8px';
						}
			 	  		var x = parseInt(myarr[i-2]);
			 	  		var y = parseInt(myarr[i-1]);

			 	  		var x_a = x; 
			 	  		var y_a = y; 


			 	  		y_a+=80;
			 	  		// x_a+=100;

			 	  		// alert(x);
			 	  		$('#block_circle_tags').append("<div class='block_circle_tag' title='click to ( open / close ) tag' id=tag_"+c+" onclick=\"show_hide_dropdown( this.id )\" >"+c+"<br></div>");
						
						$('#tag_'+c).css({
							'margin-top':y_a,'margin-left':x_a,'position':'absolute','z-index':1,'background-color':'#b01e23','border-radius':'500px','color':'white',
							'padding':padding,'font-size':'10px','cursor':'pointer'
						});

						x_a-=75;
						y_a+=15;

						// $('#table_container_'+c).fadeIn('fast'); 
				 		$('#table_container_'+c).css({ 'border':'1px solid none', 'margin-top':y_a, 'margin-left':x_a,  });
				 		$('#tagged_list_'+c).css({'display':'block'}); 
						$('#pos_x_y'+c).val('x=,'+x+',y=,'+y); 
						x=0;
			 			y=0;
						c++;
			 	  	}else { 
				 	  		var j = 0;
				 	  		while (j<151)	{  
				 	  		 	if (i==j) {	
				 	  		 		var colorname;

				 	  		 		// var str_cn = myarr[j];
				 	  		 		// alert(str_cn.length);
				 	  		 		
					 	  			// alert(colorname_to_htmlcolorcode(myarr[j]));
					 	  			 
					 	  			 if (i==0) {
					 	  			 	var colorname=$('#fcolor').text();
					 	  			 	// alert(colorname.length);
					 	  			 }else { 
					 	  			 	colorname = myarr[j];
					 	  			 }

					 	  			 colorname=colorname.replace(' ','');
 
					 	  			 // alert(colorname+' len = '+colorname.length+' i = '+i+' j = '+j);
					 	  			
					 	  			$('#COLOR'+c).css('background-color','#'+colorname_to_htmlcolorcode(colorname))
					 	  			// $('#COLOR'+c).text(colorname);
					 	  			$("#hashtag_"+c+"_0").text(' #'+colorname.replace(' ',''));	

					 	  		}		 	  	 
							 	j+=10;
							}
				 	  		 var j = 1;
				 	  		 while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#brand'+c).val(myarr[j]);
					 	  			if (myarr[j] != 'brand') { 

						 	  			$('#brand'+c).css({'color':'#000'});

						 	  			$("#hashtag_"+c+"_1").text(' #'+myarr[j].replace(' ',''));
						 	  		}
					 	  		}		 	  	 
							 	j+=10;
							}
				 	  		var j = 2;
				 	  		while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#garment'+c).val(myarr[j]);
					 	  			if (myarr[j] != 'garment') { 
					 	  				$('#garment'+c).css({'color':'#000'});
					 	  				$("#hashtag_"+c+"_2").text(' #'+myarr[j].replace(' ',''));
					 	  			}
					 	  		}		 	  	 
							 	j+=10;
							}
				 	  		 
				 	  		// material

				 	  		 var j = 3;
				 	  		 while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#material'+c).val(myarr[j]);
					 	  			if (myarr[j] != 'material') { 
					 	  				$('#material'+c).css({'color':'#000'});
					 	  				$("#hashtag_"+c+"_3").text(' #'+myarr[j].replace(' ',''));
					 	  			}
					 	  			
					 	  		}		 	  	 
							 	j+=10;
							}
				 	  		 var j = 4;
				 	  		 while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#pattern'+c).val(myarr[j]);
					 	  			if (myarr[j] != 'pattern') { 
					 	  				$('#pattern'+c).css({'color':'#000'});
					 	  				$("#hashtag_"+c+"_4").text(' #'+myarr[j].replace(' ',''));
					 	  			}
					 	  		}		 	  	 
							 	j+=10;
							}
							// PRICE
				 	  		 var j = 5;
				 	  		 while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#PRICE'+c).text(myarr[j]);
					 	  			if (myarr[j] != 'PRICE') { 
					 	  				$('#PRICE'+c).css({'color':'#000'});
					 	  				$("#hashtag_"+c+"_5").text(' #'+myarr[j].replace(' ',''));
					 	  			}
					 	  		}		 	  	 
							 	j+=10;
							}
							// PURCHASED
				 	  		 var j = 6;
				 	  		 while (j<151)	{  
				 	  		 	if (i==j) {	
					 	  			$('#PURCHASED'+c).val(myarr[j]);
					 	  			if (myarr[j] != 'PURCHASED AT') { 
					 	  				$('#PURCHASED'+c).css({'color':'#000'});
					 	  				$("#hashtag_"+c+"_6").text(' #'+myarr[j].replace(' ',''));
					 	  			}
					 	  		}		 	  	 
							 	j+=10;
							}
						}
			 	   
		 	  	}
		 	  	else { 
		 	  		 // alert('total tagg is zero');
		 	  	}
		 	  	// tagg_clicked( );
		 	};



		 	tags_hovered();	
			delete_tag(); 
		} 

		function img_mouse_move(){

			$('#left_side').mousemove(function(e){ 

				// there is a bug in this line of code the session has a deley to retrieve the position of the x and y so its not been used but when the image clicked there it will auto get the pos x and y

				// alert('mousemove');
				// var relX = e.pageX;
				// var relY = e.pageY;
				// var pos = $(this).offset();
				// mohon=parseInt(pos.left);
				// relX=relX-mohon;   
				// $('#divCoord').text('mohon ='+mohon+' X = '+relX+'Y = '+relY+' AND '); 
				// sessionStorage.session_x=relX;
				// sessionStorage.session_y=relY;   
				// alert( 'this is the best' ) 
			}); 
			// return relX;
			// alert('hi');
		}





 
		function img_clicked(){  




			var imgId = '';

		 	$(img).click(function(e)
		 	{ 



		 		console.log(' image is being clicked ');


		 		// $('#hastag_box_list').css('display','block');
		 	// 	x = e.pageX;
				// y = e.pageY;
				// alert('img clicked');
					 
				// alert('this is the image clicked'); 
				// alert($(this).attr('id'));
 
				/**
				* this is to know if the image click is uploaded or its a default upload image 
				*/ 

				imgId= $(this).attr('id'); 

				if (imgId == 'modal-image') 
				{ 
					var x1 = 0; y1 = 0;  
					var x_a = 0  , y_a = 0;
					var relX = e.pageX;
					var relY = e.pageY;
					var pos = $(img_container).offset(); // this is to make the circle tags even in different resolution it shows the same.
					
					mohon=parseInt(pos.left);
					relX=relX-mohon;  
					x_a = relX-10;
					y_a = relY-20;

					c = $('.block_circle_tag').length;
					c++;
					a = c-1;

					if (c>9) 
					{
						radius=100; 
						padding = '1px 4px 1px 4px';
					}
					else 
					{ 
						padding = '1px 8px 1px 8px';
					}

					if (c < 16) {  

						$('#block_circle_tags').append("<div  title='click to ( open / close ) tag' class='block_circle_tag' id=tag_"+c+" onclick=\"show_hide_dropdown( this.id )\"  >"+c+"<br></div>");

						$('#tag_'+c).css({
							'margin-top':y_a,'margin-left':x_a,'position':'absolute','z-index':1,'background-color':'#b01e23','border-radius':'500px','color':'white',
							'padding':padding,'font-size':'10px','cursor':'pointer'
						});

						// hide dropdown that currently oppend followed by the new tag
							
							$('#table_container_'+a).fadeOut('slow');

						// show dropdown for the new tag oppend

							$('#table_container_'+c).fadeIn('fast');





						// alert ( $('#table_container_'+c).attr('style') );

						// draggable problem is that the position of the tags and dropdown
							/*
								$( "#tag_"+c).draggable( {

									// containment: img_container  , 
									 start: function( event, ui ) { $('#divCoord').text(' start dragging ');  } ,
									 drag: function( event, ui )  { 

									 	id = $(this).attr('id')
										relX = event.pageX;
										relY = event.pageY;
										// update dropdown position	 

										var pos = $(this).offset();
										mohon=parseInt(pos.left);
										relX=relX-mohon;  


										 
								 		x_a = relX;
										y_a = relY-20;

									 	$('#divCoord').text(' dragging '+relX+' relY ='+relY+' id = '+id);  


									 	

									 		$('#table_container_'+c).css({'margin-top':y_a, 'margin-left':x_a, 'position':'absolute' });

									 	// get number update the field location x and y
										 	var num=parseInt(id.replace("tag_",""));
										 	info_to_be_save_in_db(x,y,num); 

									} ,
									 stop: function( event, ui )  { $('#divCoord').text(' stop '); }
								});
							*/
		 	 
	 					// position for the dropdown

							// y1  = y - 700; 
							// x1  = x - 100; 


						// alert( 'y1 ='+y1+' x1 = '+x1);


						x_a = x_a-80;
						y_a = y_a+15;
	 

						$('#table_container_'+c).css({'margin-top':y_a, 'margin-left':x_a, 'position':'absolute' });
	 	 
						$('#new-postalook-tagcolor-td'+c).fadeIn('fast');
						 
						// radius of the footer color pallete
							$('#new-postalook-tagcolor-td'+c).css('border-radius','0px 0px 5px 0px');
							var c1 = c-1;   
							if (c1 == 1 ) {
								$('#new-postalook-tagcolor-td'+c1).css('border-radius','0px 0px 0px 5px');	
							} 
							else if ( c ==1 ) {
								$('#new-postalook-tagcolor-td'+c).css('border-radius','0px 0px 05px 5px');
							} 
							else if ( c == 2 )  {  
								$('#new-postalook-tagcolor-td'+c).css('border-radius','0px 0px 5px 0px');
							}
							else  { 
								$('#new-postalook-tagcolor-td'+c1).css('border-radius','0px 0px 0px 0px');
							}  
						info_to_be_save_in_db(relX,relY,c); 

						relX = 0 , relY = 0;
					}
					else{ 
						alert('only 15 items allowed');
					}


					tags_hovered();	
					delete_tag();
					// tagg_clicked( );
					display_tagged_view(c);
				} 
				else
				{
					// alert('not modal image, its upload image');
				}

		 	});
		 }
  
		function info_to_be_save_in_db(x,y,c){

		 	y-=118;
			x-=12;
		  	$('#pos_x_y'+c).val('x=,'+x+',y=,'+y);
		}

	 	function block_square(){  
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

 				// alert( 'num = '+num );

		 		// this is the background when mouse over
		 		// $('#table_container_'+num).css({'border':'1px solid none','background-color':'#f6f7f8'}); 


		 		$('#tag_'+num).css({'opacity':'0.5'});

		 		
		 		$('#tagged_num_'+num).css({'color':'#505050  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#505050')
		 		}; 
		 	});
			$('.item ' ).mouseout(function(){ 
			 	var id = $(this).attr('id');
		 		var num = '';
		 		num=get_number($(this).attr('id'),16);

		 		// after the mouse over background return 
		 		// $('#table_container_'+num).css({'border':'1px solid #fff','background-color':'#e9eaed'});
		 		$('#tag_'+num).css('opacity','1');
		 		 
		 		// alert(id);
		 		$('#tagged_num_'+num).css({'color':'#fff'});
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

				// alert( 'num = '+num );

				// $('#table_container_'+num).css({'display':'block'});
				//show_dropdown ( '#table_container_'+num , 'block' );

		 		$('#'+id).css({'opacity':'0.5'}); 
		 		// $('#table_container_'+num).css({'border':'1px solid #505050','background-color':'#505050'});



		 		$('.item1_'+num).css({'color':'white'});	
		 		
		 		$('#tagged_num_'+num).css({'color':'#505050  '});
		 		for (var i = 0; i < 6; i++) {
		 			$('#hashtag_'+num+"_"+i).css('color','#505050')
		 		};

		 		// $('#block_barrer').css({'top':y,'left':x,'display':'block'});
		 		$('#block_barrer').css({'top':y,'left':x,'display':'block'});
		 		
		 		
		 		$('#ins_del').css('display','block');
		 		// $('#ins_label').css('display','none');
		 	})	
		 	$('.block_circle_tag').mouseout(function(){ 

		 		var id = $(this).attr('id');
		 		// alert('hovered id = '+id);
		 		var num = '';
		 		num=get_number($(this).attr('id'),4);
		 		$('#'+id).css({'opacity':'1'});
		 		// $('#table_container_'+num).css({'border':'1px solid #fff','background-color':'#fff'});
		 		$('.item1_'+num).css({'color':'#000'}); 
		 		// $('#table_container_'+num).css({'display':'none'});
		 		//show_dropdown ( '#table_container_'+num , 'none' );
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

		function delete_tag(){ 

			// $('.block_circle_tag').dblclick(function(){ 

			// 	// alert('dobule clicked');
			// 	var totalTag=''; 
			// 	var c = $('.block_circle_tag').length;    
			// 	var num=parseInt($(this).attr('id').replace("tag_",""));  
			// 	// alert( 'tag doubled clicked '+num );
			// 	removed_clicked_and_change_numbers(num);  
		 // 	});



		 	

		 	$('.delete-tag').click(function(){ 

				// alert('dobule clicked');



				var totalTag=''; 
				var c = $('.block_circle_tag').length;    
				var num=parseInt($(this).attr('id').replace("delete-tag_",""));  
				// alert( ' num = '+num );
				removed_clicked_and_change_numbers( num );  
		 	});  
		}
 
		function tagg_clicked( ) {  

			// num is initialize already in the top
			
			$('.block_circle_tag').click(function(){   

				// alert( num ); 
				$('#divCoord').text('num = '+num)
				show_dropdown ( '#table_container_'+num , 'block' );   
				var display =  $('#table_container_'+num).css('display') ; 
				  

		 	});
		}

		function removed_clicked_and_change_numbers(num){

				// ang ga gamit ani kai ang move_footer_color_palete ( num ) para mawala e hide ang last nga td. 
			 


				// var array = []; 

				//  array[c]	= c;

				// alert(' c ='+c+' carray = '+array[c]);

				  
				 
			 	move_footer_color_palete(num)
				move_number_when_delete(num);  
		}

		function move_footer_color_palete ( num ) {   


			// hide the last td in footer pallete

		 		var c = $('.block_circle_tag').length;    
		 		c = c+1;   

				if ( c == 2 && num == 1 ) {

					// last 1 remaining circle tagged clicked
					c = 1;

				} 
				else if ( c == num+1  ) { 

					// last circle tag doubled clicked 
					c = num;

				}
				else{ 

				}  
				
				$('#new-postalook-tagcolor-td'+c).css({'display':'none'})     

 			// move the color backward

 				var forward_color = ''; 
 				var get_forward_color ='';

 				for (var i = num; i <= 15;  i++) { 

 					forward_color = i+1; 
 				 	get_forward_color = $('#new-postalook-tagcolor-td'+forward_color).css('background-color');  
 				 	$('#new-postalook-tagcolor-td'+i).css('background-color',get_forward_color);  

 				}; 

		}

		function move_number_when_delete(clt){ 

			var cl = 15;
			var new_id;	 


			// alert ( 'clt = '+clt); 

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
			// alert( ' hide number = '+n ); 
			$('#tag_'+n).removeClass('block_circle_tag').addClass('clicked_and_hide');
			$('.clicked_and_hide').attr('id','clicked_and_hide');     
		}

		function change_main_class(cl){ 
			for (var i = cl; i  > 0; i--) {
 				$('#tag_'+i).removeClass('block_circle_tag').addClass('block_circle_tag'+i);
			};
		}

		function change_id_base_on_class_changes(cl,clt){ 

			// issue 

				/*
					1.) this is the problem of the tagging. .  when the tag deleted it won't show the dropdown anymore in other ahead number of the tag and i think this is because of not propperly passing of the ids when the tag deleting.  
					2.) solution is to make the its to class 
				*/

			// init 

				var dropdown_id = 'table_container_';
				var dropdown_id_delete = 'delete-tag_';  


			// circle tag change id

				for (var i = cl; i  >=  clt; i--) {
					nid=i;
					nid-=1; 
	 				cur_id=$('.block_circle_tag'+i).attr('id');     // get tag id
	 				$('.block_circle_tag'+i).attr('id','tag_'+nid); // set new tag id 
	 				new_id = $('.block_circle_tag'+i).attr('id');   // get new tag id    
				} 

			// dropdown change id
   				
				// set the clicked dropdown to id 15 

					// the id dropdown container 

						$('#'+dropdown_id+clt).attr('id',dropdown_id+cl);  

					// the id x in the container 

						$('#'+dropdown_id_delete+clt).attr('id',dropdown_id_delete+cl);  
 
			  
				// loop from 14 to clicked tag moved  

					var c=0;  

					for (var i = cl-1; i > clt; i-- ) {  

						c = i - 1; 
 
						// dropdown container 

							// the id dropdown container 

								$( '#'+dropdown_id+i ).attr( ('id'),dropdown_id+c);   

							// the id x in the container 

								$( '#'+dropdown_id_delete+i ).attr( ('id'),dropdown_id_delete+c);    

					};	  
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
			var tl = $('.block_circle_tag').length; // get total tags

			// alert( tl );

		 	for (var i = clt;  i <= tl; i++) {
		 		c=i;
		 		c+=1;

		 		// background color
		 		var x =  $('#COLOR'+c).css('background-color') ;
   				// hexc(x);
   				// alert( color );

   				var color =x.replace('#'); 
   				// alert( color );
   				$('#COLOR'+i).css('background-color', color );

		 		$('#brand'+i).val($('#brand'+c).val());
		 		$('#garment'+i).val($('#garment'+c).val());
		 		$('#material'+i).val($('#material'+c).val());
		 		$('#pattern'+i).val($('#pattern'+c).val());
		 		$('#pos_x_y'+i).val($('#pos_x_y'+c).val());


		 		black_or_not('#brand'+i,'brand','input');
		 		black_or_not('#garment'+i,'brand','input');
		 		black_or_not('#material'+i,'brand','input');
		 		black_or_not('#pattern'+i,'brand','input');
		 		black_or_not('#pos_x_y'+i,'brand','input');


		 		hide_last_field(clt);
		 		

 
			 	// var div_inputs=["garment","material","pattern","PRICE"];
			 	// for (var j = 0; j < div_inputs.length; j++) {
			 		// alert(div_inputs[j]);
				 	// $('#'+div_inputs[j]+i).val($('#'+div_inputs[j]+c).val());
			 		// $('#'+div_inputs[j]+c).val(div_inputs[j]);

			 		// black_or_not('#'+div_inputs[j]+i,div_inputs[j],'div');
			 	// };
		 		// purchased at
		 		// $('#PURCHASED'+i).val($('#PURCHASED'+c).val());
		 		// black_or_not('#PURCHASED'+i,'PURCHASED AT','input');
				// $('#pos_x_y'+i).val($('#pos_x_y'+c).val());
				// position 
		 		// hide_last_field(tl);
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
			$('#hashtag_'+c+'_0').text(''); // empty color for edit
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

	function show_dropdown ( id , action ) {  
		// alert( id );
		// this is used for the dropdown 
		// alert( 'this is it id=' +id+' display:'+action  );
	    $(id).css({'display':action});
	} 

	function close_drodown( id ) {
		 	
		// alert( id );
		// id = id.replace('close_dropdown_'); 
		// id = '#table_container_'+id;
		// id = '#'+id;
		show_dropdown ( id , 'none' ); 
	} 

	function show_hide_dropdown( id ) {
 
		// initialized  

			var display = ''; 
			var value   = ''; 
 
		// get the tag number 
   				
			var num = id.replace( "tag_", "" );

		// get the dropdown display status

		 	display = $('#table_container_'+num).css('display'); 

		// condition to show the dropdown for display iether block or none and hide or show

			if ( display == 'none' ) {

				value = 'block'; 

			}
			else{  

				value == 'none';   

			} 

		// show or hide the dropdown

		 	$('#table_container_'+num).css('display',value); 
	} 

 
</script>

  