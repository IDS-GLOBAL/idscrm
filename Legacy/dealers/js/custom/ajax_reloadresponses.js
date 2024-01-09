$(document).ready( function(){

$('button#reloadresponses').click( function(){

		var empty ='';
		var dlr_news_id = '1';
		
		$( 'div#load_'+dlr_news_id ).html(empty);
		$('div#load_'+dlr_news_id).load('ajax/pull_newsresponses.php?news_id='+dlr_news_id);
				
		
});

});