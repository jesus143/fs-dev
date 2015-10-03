 
function init()  
{	
	// alert("working");
 	sessionStorage.clickcount = '';
 	// $('#res_container img').hover( function(){
	//      $(this).css('border','5px solid #000');
	//  } 
}
function send_article_url( action ) 
{ 
	var url1 = $('#article_url_field').val(); 
	var last_url = sessionStorage.clickcount; 
	// alert('action = '+action+' new url = '+url1+' last url = '+last_url);
	if ( action == 'typing' ) 
	{ 
		 
		if ( url1 != '' ) 
		{
			if ( url1 == last_url ) 
			{
				// alert("current and last is equal!");
			}
			else 
			{   
				// alert('typing ')
				$('#article_total_result span').css({'visibility':'hidden'});
				document.getElementById('home_res1').innerHTML ='';
				document.getElementById('home_res2').innerHTML ='';
				document.getElementById('home_res3').innerHTML ='';

				$('#article_title').val('');
				$('#article_description').val('');
				url = replace_all (url1 , '.' , ' ' );

				if ( url.indexOf(" ") > 0  ) 
				{ 
					// alert('search typing');
					// ajax_send_data('article_res','fs_folders/postarticle/pages/postarticle_data.php?article_url_inputed='+article_url_inputed,'article_loader');
				 	 // ajax_send_data('article_res','fs_folders/postarticle/pages/test.php?url='+url,'article_loader');  //  for viewing and testing
					post_article_result('article_res','fs_folders/postarticle/pages/test.php?url='+url,'article_loader'); //  final output
				}
				sessionStorage.clickcount = url1
			}
		} 
		else 
		{ 
			sessionStorage.clickcount = '';
		}

	}
	else if ( action == 'search' )
	{ 
		// 'search'
		// alert('search clicked');
		$('#article_title').val('');
		$('#article_description').val('');

		$('#article_total_result span').css({'visibility':'hidden'});
		document.getElementById('home_res1').innerHTML ='';
		document.getElementById('home_res2').innerHTML ='';
		document.getElementById('home_res3').innerHTML ='';
		url = replace_all (url1 , '.' , ' ' );
		if ( url.indexOf(" ") > 0  ) 
		{ 
			// ajax_send_data('article_res','fs_folders/postarticle/pages/postarticle_data.php?article_url_inputed='+article_url_inputed,'article_loader');
		 	 // ajax_send_data('article_res','fs_folders/postarticle/pages/test.php?url='+url,'article_loader');  //  for viewing and testing
			post_article_result('article_res','fs_folders/postarticle/pages/test.php?url='+url,'article_loader'); //  final output
		}
		sessionStorage.clickcount = url1;
	} 
	 // alert("done")
}
function article_select( img_aticle , num , article_len ) 
{
	// alert("number = "+$('#img_aticle_source_num'+num).val());
	var iasn = $('#img_aticle_source_num'+num).val();
	$("#img_source_num").val(iasn);
	// alert("img article = "+img_aticle+" number = "+num+" article len = "+article_len);
		/*
	 		var lastClicked = sessionStorage.lastClicked;
			$(img_aticle+num).css({'border':'5px solid #425b80'});
			$(img_aticle+lastClicked).css({'border':'5px solid #000'});
			sessionStorage.lastClicked = num;
		*/
	// set 
	for (var i = 0; i < article_len; i++) 
	{
		if ( i == num ) 
		{
			// alert('green = '+i)
			$(img_aticle+i).css({'border':'5px solid #b11c22'});
		}
		else 
		{ 
			// alert("black = "+i)
			$(img_aticle+i).css({'border':'5px solid #000 '});
		}
	};
}
 



