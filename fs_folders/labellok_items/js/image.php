<script type="text/javascript">
	
	$(document).ready(function(){ 

		var c=0;
	 	$('#left_side img').click(function(e){ 
	 		// alert('image hovered');	 	
	 		x = e.pageX;
			y = e.pageY;
			y-=12;
			x-=13;
			// alert('X = '+x+' Y = '+y);
			c++;
			// alert(c);
			


			// alert(X)
			if (c < 5) { 
				$('#add').append("<div id=tag_"+c+">"+c+"<br></div>");
				$('#tag_'+c).css({
					'margin-top':y,'margin-left':x,'position':'absolute','z-index':1,'background-color':'#000','border-radius':'100%','color':'white',
					'padding':'4px 9px 4px 9px','font-size':'10px','cursor':'pointer'
				});
			}
			else{ 
				alert('only 4 items allowed');
			}

	 	});


		// $('#left_side img').mouseover(function(){ 
	 // 		// alert('image hovered');	 	
	 // 	// 	X = e.pageX;
		// 	// Y = e.pageY;



	 // 	});	 	
	})


</script>