
$(document).ready(function(){
	

	var reservas = new Array();
	var userID = $('#userid').val();		

	$('.libre').click(function(e){		
		if($(this).hasClass( "select" )){return false;}
		var row = $(this).attr("row");
		var column = $(this).attr("column");
		$(this).addClass( "select" );		
		reservas.push({"row": row, "column": column});			
		console.log(reservas);		
	});

	$('#limpiar').click(function(e){		
		$( ".libre" ).each(function() {
	        $( this ).removeClass('select');
	    });		
	    reservas = new Array();
	});	 

	$('#btn-reserva').click(function(e){
		e.preventDefault();

		if(reservas.length == 0){ alert('Seleccione una(s) Butaca(s)'); return false; }

		if( ! confirm("¿Confirma esta reserva?") ){
			return false;
		}

		var url = "/reservar"; 
		$.ajax({
		 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		 type: "POST",
		 url: url,
		 data: {'reservas': JSON.stringify(reservas), 'userid': userID},        
		 success: function( data ) {      
		 	alert(data.message);
		 	location.reload();		 	
		 }  
		});
		
	});



	//$('[data-toggle="popover"]').popover();

	$('[data-toggle="popover"]').popover({
	  title: function(){
	    return $(this).data('title')+'<span class="close" style="margin-top: -5px">&times;</span>';
	  }
	}).on('shown.bs.popover', function(e){
	  var popover = $(this);
	  $(this).parent().find('div.popover .close').on('click', function(e){
	    popover.popover('hide');
	  });
	  $(this).parent().find('div.popover .btn-destroy').on('click', function(e){
	  	
	    if( ! confirm("Realmente desea eliminar esta reserva?") ){
	    	return false;
	    }

	    var url = "/reserva/destroy"; 
	    $.ajax({
	     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	     type: "POST",
	     url: url,
	     data: {'id': $(this).attr("rowid")},        
	     success: function( data ) {      
	     	alert(data.message);
	     	location.reload();		 	
	     }  
	    });

	  });
	});

});