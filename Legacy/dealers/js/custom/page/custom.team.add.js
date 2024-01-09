$(document).ready(function(){
//	$.post('', {}, function(){ });
//  $.post('', {}, function(){ });



	
	
$('button#create_new_team').click(function(){

			var dlr_news_team_id = $('input#dlr_news_team_id').val();

			var dlr_team_name = $('input#dlr_team_name').val();

			var dlr_team_description = $('textarea#dlr_team_description').val();

			var slct_dlr_team_status = document.getElementById("dlr_team_status");
			var dlr_team_status_txt = slct_dlr_team_status.options[slct_dlr_team_status.selectedIndex].text;
			var dlr_team_status = slct_dlr_team_status.options[slct_dlr_team_status.selectedIndex].value;

			$.post('script_create_newteam.php',{

				   dlr_team_status: dlr_team_status,
				   dlr_team_name: dlr_team_name,
				   dlr_team_description: dlr_team_description



					}, function(data){

						console.log(data);

					});

			window.location.replace('teams.php');
});

			




});
