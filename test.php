<html>
	<head> 
		 
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>	
		<link rel="stylesheet" type="text/css" href="test.css"> 

		
		<script type="text/javascript">
		$(document).ready(function() {
			// $('#iframeDiv iframe').ready('http://memberservices.membee.com/feeds/events/event.aspx?cid=1091&wid=1201', function() {
			// 	alert('iframe is loaded');
			//     // $('#iframeDiv iframe').contents().find('body').html('<div> blah </div>');
			// });

				// $("#iframeDiv iframe").src("http://memberservices.membee.com/feeds/events/event.aspx?cid=1091&wid=1201",function(){
				//    alert('this iit');
				// });

			// $(document).ready(function() {
			//     $('#iframeDiv iframe').attr('src', 'http://memberservices.membee.com/feeds/events/event.aspx?cid=1091&wid=1201');
			// }); 

				$('#iframeDiv iframe').attr('src', 'http://memberservices.membee.com/feeds/events/event.aspx?cid=1091&wid=1201' ).load(function() {
				 
				  	 // $('#iframeDiv iframe').contents().find('head').html('<div> blah </div>');
				  	 	// var head = $('#iframeDiv iframe').contents().find("head");
				  	 	// var body = $('#iframeDiv iframe').contents().find('body'); 
						// var css = '<style type="text/css">' +'#banner{display:none}; ' + '</style>';
						// jQuery(head).append(css); 
						// alert(body);  

						     // var d = frames[0].document;

						     // alert(d); 

					      //   d.open();
					      //   d.write(
					      //       '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional //EN" "http://www.w3.org/TR/html4/loose.dtd">'+
					      //       '<html><head><style type="text/css">'+
					      //       'body { font-size: 200%; }'+
					      //       '<\/style><\/head><body><\/body><\/html>'
					      //   );
					      //   d.close();

					      //   d.body.innerHTML= '<em>Hello</em>'; 
					      // var statusText = top.frames["treeStatus"].document.getElementById('ucEvent_ucLayout_pnlFirst');
					      // alert(statusText);

				});






		});


	 

		 


	 

				
		</script>


	</head> 
	<body>  
		<div id="iframeDiv" >

			<iframe  id="treeContent" src=""  </iframe> 
		</div>

	</body>
</html>