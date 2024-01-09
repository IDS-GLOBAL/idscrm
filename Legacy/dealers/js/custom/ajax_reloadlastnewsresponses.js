// JavaScript Document
//$(document).ready(function(){
$(document).ajaxComplete(function(){
								  
		var empty ='';




			$('#responses a.pull_lastnews_response').click(function(){
				//alert('Clicked Pulling New Responses From Last Post');
				var that = $(this);
				var dlr_news_id = that.attr('id');
				
				$( 'div#load_last_'+dlr_news_id ).html(empty);

				$('div#load_last_'+dlr_news_id).load('ajax/pull_newsresponses.php?news_id='+dlr_news_id);
				
				//alert('dlr_news_id: '+dlr_news_id);
			});




			$('button#post-last-response').click(function(){

					//alert('Cliecked! Respond to On Last News Article');
					debugger;
					
					var thisdid = $("input#thisdid").val().replace(/,/g, '');

					var post_msg = $(this).parent().parent().find('textarea').val();
					
					$(this).parent().parent().find('textarea').val(empty);
					
					var dlr_news_id = $(this).parent().parent().find('textarea').attr('id');
					//var dlr_news_id = $(this).parent().parent().html();
					var post_msg_length = post_msg.length;
					
					if(post_msg_length < 2){alert(' Sorry Your Message Is not Long Enough: '); return false;}
					
					//alert(dlr_news_id);
					
					$.post('script_create_newresponse.php', {thisdid: thisdid, post_msg: post_msg, dlr_news_id: dlr_news_id  },
					function(data){
								
									//$('#name-data').html(data);
									//console.log(data);
									
									//window.location.replace('tasks.php');																																																	
								
					});
					
					
					$( 'div#load_'+dlr_news_id ).html(empty);
					$( 'div#load_last_'+dlr_news_id ).load('ajax/pull_newsresponses.php?news_id='+dlr_news_id);
					//alert('New Response On Last Load Completed!');
					
					
			});








});