look_loaded ( );
function deleteNow ( id , type  ) {
	// alert(id+" and "+type);  
	if ( type == "looks" )  { 
		var c = confirm("are you sure to delete this look?");
		if (c) {
			// alert("deleting!")
			// $("#ad_look_container_td"+id).css({'display':'none'});
			ajax_send_data("ad_res","fs_folders/admin/php_file/data/admin_delete.php?plno="+id,"");
		}
		else {  
			// alert("canceled");
		}
	};
	if ( type == "members" ) { } 
	if ( type == "article" ) { }
	if ( type == "media" ) { }   

}
function look_loaded ( )  {	
	// alert("look loaded!");
	appendNow("looks","fs_folders/admin/php_file/data/admin_retrieve_images.php","");
	// append(view_result_id,data,loader)
}
function more (type) { 
	if (type=='look') 
	{	
		appendNow("looks","fs_folders/admin/php_file/data/admin_retrieve_images.php","");
	}
	else 
	{ 
		alert("not look");
	} 
}
// brands  
	function update_brand( brand_name_id , category_name_id , genderid  , brand_id , tcat , action   ) { 
		// alert('saving brand');
		// update_brand( \"#brandid$bno\" , \"#categoryid$bno\" , \"#brandgenderid$bno\" , \"$bno\" ,  \"$tcat\" , \"save\"  )
	  	var categoryid = $(category_name_id).val();
		var brandname = $(brand_name_id).val(); 
		var	gender	= $(genderid).val(); 
		var catSelected = selectCheckBox(tcat,brand_id);   
		// alert(brandname+' cate selected = '+catSelected);    
		if ( action == 'delete-brand-categories' ||  action == 'delete-brand'  ) {
			var c = confirm("are you sure want to delete ths brand ?"); 
			if (c == true ) { 
				$("#brandcontainer"+brand_id).css({'display':'none'});
				$("#brandcontainer-categories"+brand_id).css({'display':'none'});		
				ajax_send_data('fs-general-ajax-response','fs_folders/modals/admin/admin_modals.php?categoryid='+categoryid+'&brandname='+brandname+'&brand_id='+brand_id+"&gender=none&catSelected="+catSelected+"&action="+action);
			}  
		}else{  
			ajax_send_data('fs-general-ajax-response','fs_folders/modals/admin/admin_modals.php?categoryid='+categoryid+'&brandname='+brandname+'&brand_id='+brand_id+"&gender="+gender+"&catSelected="+catSelected+"&action="+action);
	
		}  
	} 
	function selectCheckBox(tcat , bno ) { 
		// alert(tcat)
		var c =0; 
		var IsForwardable ;
		var catChecked = ''; 
		var catval = '';  
		var checkbox = 0; 


        for (var i = 0; i < tcat ; i++) {
        	c++;  
        	// alert('#categories_checked'+bno+c);

  		 	// checkbox = $('#categories_checked'+bno+c).attr('checked') ? 1 : 0 ;    


            checkbox = $('#categories_checked'+bno+c).prop('checked') ? 1 : 0;  
                  
              
  			catid = $('#categories_checked'+bno+c).val();    
  			// alert(' is checked = '+checkbox+' bcid = '+catid);

         	catChecked = catChecked.concat(catid+","+checkbox+",");
         	// alert(catChecked); 
        }     
        return catChecked;
    }
// brands



function viewNow(fileName,id) {

    console.log(fileName);
    if(fileName == 'clear') {
        $( "#"+id ).html( '' );
    } else {
        $.get( "fs_folders/admin/php_file/"+fileName+".php", function( data ) {
            $( "#"+id ).html( data );
            console.log( "Load was performed." );
        });
    }

}