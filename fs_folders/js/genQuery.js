 
$(document).ready(function() {  
 	// initialized data 
		var variable = ''; 
	// header sign in 
		$('#header-wrapper').attr( 'style' , 'visibility:visible');  
	// var input = ' this is the input id'; 
	// i dont know what is this  
		$( this ).mousemove(function( event ) {  
			$('#login-container').css('height',$(window).height()+200);  
		});   
	// new label a look   
		// when document clicked hide all the dropdown oppened
			$('#label-look-body').click(function ( ) {    
				for (var i = 0; i <= 15; i++) {  
					variable = variable+'#autocomplete-dropdown-container-garment'+i+' , '+'#autocomplete-dropdown-container-material'+i+' , '+'#autocomplete-dropdown-container-pattern'+i+' , ';  
					// input = input+'#brand'+i+', #garment'+i+',#material'+i+',#pattern'+i; 
				};  
				variable = variable+'#autocomplete-dropdown-container-occasion , #autocomplete-dropdown-container-season , #autocomplete-dropdown-container-keyword';  
				// alert( input );
				// $(input).focus(function( ) {
				// 	 alert( 'field focused' );
				// })
				$(variable).css('display','none');  
			})  
		// when the field fucosed hide all the dropdown shows  
		// upload and select image only works for not the popup but for the popup it is placed in the ajax.php in labellooks item  
			function readImage1(file) { 
		        var reader = new FileReader();
		        var image  = new Image(); 
		        reader.readAsDataURL(file);  
		        reader.onload = function(_file) {
		            image.src    = _file.target.result;              // url.createObjectURL(file);
		            image.onload = function() {
		            	console.log ( 'image attribute ready to be added to the site' );
		                var w = this.width,
		                    h = this.height,
		                    t = file.type,                           // ext only: // file.type.split('/')[1],
		                    n = file.name,
		                    s = ~~(file.size/1024) +'KB';     
		               		if ( w >= 100 &&  h >= 100) {  
			               		var imagestyle = get_image_style( h , w , 889 , 500 );    
		               			$('#modal-image').attr('src',this.src);
		               			$('#modal-image').attr('style',imagestyle); 
		               		}   
		            };
		            image.onerror= function() {
		                console.log('Invalid file type: '+ file.type );
		            };      
		        };  
		    }
		    $( "#modal-image-file" ).on( "change", function(e) { 
		    	console.log( 'new image selected' )
		        if(this.disabled) return alert('File upload not supported!');
		        var F = this.files;  
		        if ( F.length > 0 ) { 
		        	if(F && F[0]){ 
		        		for(var i=0; i<F.length; i++){   
		        			readImage1( F[i] );
		        		}
		        	}
		    	}
		    	else{  
		    	}
		    });     
 	// close the popup when the side overly clicked and we call this as bubbling.
			$('#popUp-background').on('click', function(e) {
			    // do your thing.
			    // alert('parent')
			    gen_popup( 'hide' );
			}).on('click', 'table', function(e) {
			    // clicked on descendant div
			    // alert('child');
			    e.stopPropagation();
			}); 
});
// FS WINDOWS SCROLLED OR CHANGE
	window.onscroll = scroll; 
	function scroll () {  
		// initialized 
			var wh = $(window).height()  // window height
			var ww = $(window).width()  // window width 
		 	var y  = window.pageYOffset;  // y axis] 
		 	var x  = window.pageXOffset;  // X axis] 
		 	var top;
		 	var lef; 
		// header  
		 	var doch   = $('#fs-arrow-up-container').height();
		 	var doch_t = $('#fs-arrow-up-container').position().top
		 	var ah = doch - doch_t-50; // arrow height 
		 	$( '#res-fixed' ).text(y+' window hight'+wh+' arrow margin-top  = '+ah+' doc height ='+doch+' doc height top = '+doch_t);  
		 	// sign in
		 		if ( y > 57 ) {
			 		$('#new-bottom-header-signin').css({ 'position':'fixed' , 'margin-top':'-2px' , 'display':'block' });   
			 	    $('#fs-arrow-up').css({'margin-top':ah+'px', 'margin-left': '-10px'});
			 	    $('#fs-arrow-up').fadeIn('slow');
			 	}
			 	else{  
			 	    $('#fs-arrow-up').css({'margin-top':'-1000px', 'display':'none' });
			 		$('#new-bottom-header-signin').css({'position':'absolute', 'margin-top':'45px' , 'display':'none' }); 
			 		$('#new-bottom-header-signin').fadeIn('fast'); 
			 	}  
		 	// sign out


			 	if ( y > 57 ) {
			 		$('#new-bottom-header').css({'position':'fixed' , 'margin-top':'-57px' });  
			 	}
			 	else{
                    // $('#body_wrapper').css({'margin-top': '0px'});
                     $('#body_wrapper').attr('style', 'margin-top:0 !important') 
			 		$('#new-bottom-header').css({'position':'relative', 'margin-top':'0px' , 'display':'none' }); 
			 		$('#new-bottom-header').fadeIn('fast'); 
			 	} 
 			// test1();  
 		// popup welcome popup

        //$('#main_container').mouseover(function(){
            //console.log('enter');
            //$('#header-dropdown-look').css({'display':'none'});
        //});

        $('#header-dropdown-look').mouseover(function(){
            //$(this).css('display','none');
            console.log('mouse over');
        });



        //This is the comme
        mouseOverWithComment();
	}



	/**
	* This is the details comment mouse over show edit and delete and flag
	*/
	function mouseOverWithComment() {  
		$('.details-comment').mouseenter(function() {
		   // console.log(this.id+'-edit' + ' = enter');  
		   $('.'+this.id+'-edit').css('visibility','visible');
		   $('.'+this.id+'-flag').css('visibility','visible');
		   $('.'+this.id+'-delete').css('visibility','visible');  
		});  

		$('.details-comment').mouseleave(function() {
		   // console.log(this.id+'-edit' + ' = leave');  
		   $('.'+this.id+'-edit').css('visibility','hidden');
		   $('.'+this.id+'-flag').css('visibility','hidden');
		   $('.'+this.id+'-delete').css('visibility','hidden');
		}); 
	}
