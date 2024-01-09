$(document).ready( function(){

$('button#reloadtask').click( function(){

		var empty ='';
		
		$( "div#dynamic_table_push" ).html(empty);
		
		$( "div#dynamic_table_push" ).load( "ajax/pull_tasks.php" );
		
		
});

});