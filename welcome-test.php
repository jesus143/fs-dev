
<html>
	<head> 

		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<script>
			$("#next").click(function(){
			    var $next = $(".slide:visible").slideUp().next('.slide');
			    if($next.size() < 1) {
			        $next = $(".slide:first");
			    }
			    $next.slideDown();
			});

			$("#prev").click(function(){
			    var $prev = $(".slide:visible").slideUp().prev('.slide');
			    if($prev.size() < 1) {
			        $prev = $(".slide:last");
			    }
			    $prev.slideDown();
			});
		</script>


		<style>

			.slide {
				width: 300px;
				height: 300px;

			}
			#slider{
				width: 300px;
				height: 300px;
			}

		</style>
	</head>


	<body> 

		<div id="slider">
<div class="slide1 slide current" style="background: red"></div>
<div class="slide2 slide" style="background: green"></div>
<div class="slide3 slide" style="background: black"></div><br clear="all">
</div>
<button id="prev">Previous</button>
<button id="next">Next</button>​

 

	</body>
</html>




