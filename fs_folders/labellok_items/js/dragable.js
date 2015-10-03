$(document).ready(function() {

	// $('#drag').draggable( { axis:'x'}); //only move for x axis
	// $('#drag').draggable( { containment:'document'});
	// $('#drag').draggable( { containment:'window'});
	// $('#drag').draggable( { containment:'parent'});
	// $('#drag').draggable( { containment:[0,0,200,100]});
	// $('#drag').draggable( { cursor:'pointer', opacity:0.60, grid:[20,20]});
	// $('#drag').draggable( { cursor:'pointer', opacity:0.60, revert:true, revertDuration:3000 });
	

	$('#drag,.name,.place').draggable( { cursor:'pointer', opacity:0.60, revert:true, 
		start:function (){
			$('#event').text('Start Dragging');
		} ,
		drag:function(){
			$('#event').text('Dragging');
		},
		stop:function(){
			$('#event').text('Stop Dragging');
		}
	});


/*
* tolerance:'fit'
* tolerance:'touch'
* tolerance:'pointer'
*/
	$('#drop').droppable( { hoverClass:'border', tolerance:'pointer',accept:'.name,#drag',
		

		over:function(){
			$('#drop').text('something hover');
		},
		out:function(){
			$('#drop').text('something has out');

		},
		drop:function() {
			alert('droped');
			$('#drop').text('something has been droped');
		}

	})


});