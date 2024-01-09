// JavaScript Document
$(document).ready(function(){




	$('button#change_category_btn').on('click', function(){
														 
				console.log('Clicked');
				var sys_template_cat_id = $('input#sys_template_cat_id').val();
				var sys_template_cat_type_label = $('input#sys_template_cat_type_label').val();
				
				console.log('Value: '+sys_template_cat_type_label);				
				
				$.post('script_update_newetemplate_cateogory.php', {
					   sys_template_cat_type_label: sys_template_cat_type_label,
					   sys_template_cat_id: sys_template_cat_id
					   }, function(data){
		  
								console.log(data);
								
								//$('select#category_id').html(data);
					window.location.replace('emailtemplates.php');
				});
		
			
														 
														 
	});













});