// JavaScript Document
$(document).ready(function(){

	function recountphotos() {
	
			var enter = 0;
			
			$( "#sortable li > input[type=text]" ).each(function( index ) {
			  enter++;
			  $( this ).val(enter);
			  
			  
			});
	
	
	};




    $( "#sortable" ).sortable({
			deactivate: function(){  
			recountphotos(); 
			},
			change: function(){  
			},
			over: function() {
			},
			remove: function() {
			},
			receive: function() {
			},
			sort: function() {
			}
			}
		);
    $( "#sortable" ).disableSelection();
	



	$('button#save_sortedphotos').on('click', function(){
	 
		var newno = 0;
	
		var did = $('input#thisdid').val();
		var vid = $('input#vehicle_id').val();

	 
	 
				$( "div#photogallery").find("input.sorting").each(function() {
				
					var order_number = $(this).val();
					var v_photoid  = $(this).attr('id');
					//console.log( "Photo ID: " + v_photoid );
					
					newno++;
					
					
						//$.post('script_vehicle_photos_reorder.php', {vid: vid, newno: newno, order_number: order_number});

					$.post('script_vehicle_photos_reorder.php?vid='+vid, {
						v_photoid: v_photoid, vid: vid, newno: newno, order_number: order_number
						},function(data) {
					 console.log( "Data Loaded: " + data );
					
				   });
					
					$(this).parent("li").removeClass('ui-state-default').addClass('saved');
					
					console.log('newno: ' + newno + ' order_number:' + order_number);
					
					
					
				
				});
				
					setTimeout(function() 
				    {
					  window.location.href = 'vphotos.php?vid='+vid; //2611
				    }, 12000);
		
		
					

		
	});



	$('button#delete_sortedphotos').on('click', function(){
		var newno = 0;
	
		var did = $('input#thisdid').val();
		var vid = $('input#vehicle_id').val();
	 	
	 
				$( "div#photogallery").find("input.delete_sortedvphotos:checked").each(function() {
				
					var order_number = $(this).val();
					//alert('order_number: '+order_number);

					//var n = $( "input:checked" ).length;
					var v_photoid  = $(this).attr('id');
					console.log( "Photo ID: " + v_photoid );
					
					newno++;
					
					//alert('#'+order_number+': Deleting Photo: '+v_photoid+' ');
					//return false;

					$.post('script_vehicle_photos_delete.php?vid='+vid, {
						
						v_photoid: v_photoid, vid: vid, newno: newno, order_number: order_number
						
						},function(data) {
						 console.log( "Data Loaded: " + data );
						
				   });
										
					$(this).parent("li").hide();
					recountphotos();
					//console.log('newno: ' + newno + ' order_number:' + order_number);
					
					//window.location.href = 'vphotos.php?vid='+vid;
				
				});
	});



 recountphotos();

});


