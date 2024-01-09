// JavaScript Document


$(document).ready(function(){
	
	
	$('#deletePending a').click(function deleteDealerPending(){
	
	var delelink = $(this).attr('href');
	
	
	
	alert(delelink);
	
	
	
	$.get('ajaxEnviro/deletePendingdealer.php', {delelink: delelink},
									   
				 
								   function(result) {
									   
									   $('#deletedDlrResults').html(result).show();
									
									});
	
	alert('You Just Deleted' + delelink);
	return false;
	//var deletePending = document.getElementById('#deletePending').value;
	
	});
	
	//alert('Custom Alert Ready');
						
						
						
						
						
						
						
						
						   
});