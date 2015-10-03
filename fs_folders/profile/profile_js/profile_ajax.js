
 profile = new Object();  
 function profile_init ( mno ) {  
    profile.pagenum = 1;
    profile.totalnextprev = 4;

	append_home(
	 	 "",
	 	"fs_folders/modals/profile/profile_modals.php?profile_tab=profile_activity&pagenum="+profile.pagenum+"&mno="+mno,
	 	"#profile-tab-loader-activity div img"	
	);  
	
 	$(".page"+profile.pagenum).css({"color":"#c51d20"});    // red the number one after loaded
 	sessionStorage.cpagenum = profile.pagenum;

 



 	
 }
function activity_next_page(pagenum , pt , mno ) {    
	sessionStorage.cpagenum = pagenum; 
	// profile.totalnextprev = pt; 
	profile.pagenum = pagenum;    
	// alert("next page.. "+pagenum)  
	for (var i = 1; i <= pt; i++) {
	$(".page"+i).css({"color":"#cccbc9"});    
	};  
	$(".page"+profile.pagenum).css({"color":"#c51d20"});     
	// sessionstorage.cpagenum = pagenum; 
 	document.getElementById('home_res1').innerHTML ='';
	document.getElementById('home_res2').innerHTML ='';
	document.getElementById('home_res3').innerHTML ='';  
	$("#loading img").css({"visibility":"visible"}); 
	append_home(
	 	 "",
	 	"fs_folders/modals/profile/profile_modals.php?profile_tab=profile_activity&pagenum="+profile.pagenum+"&mno="+mno,
	 	"#loading_img"	
	); 
}
function next_res_row ( action , mno ) {  
 	profile.cpagenum =  sessionStorage.cpagenum;  
 	// profile.cpagenum =  4; 
 	profile.cpagenum = parseInt(profile.cpagenum);  
 	if ( action == "next") {
 		if ( profile.cpagenum == profile.totalnextprev ) {
 			profile.cpagenum=1;
 		}else{
 			profile.cpagenum+=1;	
 		} 
 		// profile.cpagenum = profile.cpagenum+1;
 		// next
 		// profile.cpagenum = sessionStorage.cpagenum++;
 	}else if ( action == "prev" ) { 

 		if ( profile.cpagenum == 1 ) {
 			profile.cpagenum = profile.totalnextprev;
 		}else {
 			profile.cpagenum-=1;	
 		} 
 		// prev
 		// profile.cpagenum = sessionStorage.cpagenum--; 
 	} 
 	// profile.totalnextprev  
 	// alert(sessionStorage.cpagenum);
	// alert("next row "+action+" current page num = "+profile.cpagenum);  
	activity_next_page( profile.cpagenum , profile.totalnextprev , mno ); 
}


function sort_activity_wall_by_action () { 

	
	var action = $("#profile-action").val();
	var time = $("#profile-action-time").val(); 
	alert("action = "+action+" time = "+time ); 
} 


