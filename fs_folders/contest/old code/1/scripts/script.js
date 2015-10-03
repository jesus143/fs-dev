var s=1;
		var t;
		var state='play';
		var nos=7;
		var w=0;
		var interval=500;
		function navigate(state){
			if(state=="next"){
				
				if(w>783*(nos-1)*(-1)){
					getID("nav_span_"+s).style.background="red";
					getID("nav_text_"+s).style.color="red";
					s++;
					getID("nav_text_"+s).style.color="white";
					getID("nav_span_"+s).style.background="white";
					$("#tab_slide").animate({
						left:w+783/2
						},200,function (){
							w=w-783;
							$("#tab_slide").animate({
								left:w
								},interval
							);
						}
					);
				}
				else
				{
					w=0;
					$("#tab_slide").animate({
						left:w
						},2000
					);
					getID("nav_text_"+s).style.color="red";
					getID("nav_span_"+s).style.background="red";
					s=1;
					getID("nav_text_"+s).style.color="white";
					getID("nav_span_"+s).style.background="white";
				}
			}
			else{
				if(w<0){
					$("#tab_slide").animate({
						left:w-783/2
						},200,function (){
							w=w+783;
							$("#tab_slide").animate({
								left:w
								},interval
							);
						}
					);
				}
				else
				{
					w=783*(nos-1)*(-1);
					$("#tab_slide").animate({
						left:w
						},2000
					);
				}
			}
		}
		function PlayPause(){
			if(state=='play'){
				state='pause';
				clearInterval(t);
				getID("PlayPause").src="images/btn_play.png";
			}else{
				state='play';
				navigate("next");
				t=setInterval(function (){navigate("next")},6000);
				getID("PlayPause").src="images/btn_pause.png";
			}
		}
		
		function navigate_text(slide){
			state='pause';
			getID("nav_text_"+s).style.color="red";
			getID("nav_span_"+s).style.background="red";
			if(slide!=1){
				s=slide-1;
				w=783*(slide-2)*(-1);
			}else{
				s=0;
				w=783;
			}
			clearInterval(t);
			getID("PlayPause").src="images/btn_play.png";
			navigate("next");
		
		}
		
		function getID(id){
			return document.getElementById(id);
		}
		
		t=setInterval(function (){navigate("next")},6000);