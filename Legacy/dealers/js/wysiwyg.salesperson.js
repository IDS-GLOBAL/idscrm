// JavaScript Document
$(document).ready(function(){
		var empty ='';

			$('#responses a.pull_news_response').click(function(){
				//alert('Clicked');
				var that = $(this);
				var dlr_news_id = that.attr('id');
				
				$( 'div#load_'+dlr_news_id ).html(empty);

				$('div#load_'+dlr_news_id).load('ajax/pull_newsresponses.php?news_id='+dlr_news_id);
				
				//alert('dlr_news_id: '+dlr_news_id);
			});
			
			
			$('button#post-news').click(function(){
					
					//debugger;
					var thisdid = $("input#thisdid").val().replace(/,/g, '');

					//var post_msg = $(this).parent().parent().find('textarea').val();
					var post_msg = $('#sales_person_post').code();
					
					//alert(post_msg);
					//$(this).parent().parent().find('textarea').val(empty);
					
					var salesperson_id = $('input#thissid').val();
					
					//var dlr_news_id = $(this).parent().parent().html();
					var post_msg_length = post_msg.length;
					
					if(post_msg_length < 2){alert(' Sorry Your Message Is not Long Enough: '); return false;}
					
					//alert(dlr_news_id);

					var thelastpostednews = $( 'div#load_lastposted_news').html();
					if(thelastpostednews != empty){var loadjs = 'false';}else{var loadjs = 'true'}
					
					
					$.post('script_create_newdealernews.salesperson.php?loadjs='+loadjs, {
						   thisdid: thisdid, 
						   post_msg: post_msg, 
						   salesperson_id: salesperson_id  
						   },
							function(data){								
									
									//console.log(data);

								
								//var posts = $(data).find('div#load_lastposted_news');
								//var posts = $(data).filter('div#load_lastposted_news');
								
								
				
								if(thelastpostednews != empty){ 
									
									//alert('Last News Not Empty Wrap');
				
									$('div#load_lastposted_news').prepend(data);
									  
									
										
									
									}else{
										
									//alert('Last News Empty Insert');
									
									$( 'div#load_lastposted_news').html(data);
									
									
								}


							//
									//window.location.replace('tasks.php');																																																	
								
							});
					
					
					$('#sales_person_post').code(empty);
					//$( 'div#load_lastposted_news').html(empty);
					
					//$( 'div#load_lastposted_news')
					//.load('ajax/pull_lastsalespersonnews.php?salesperson_id='+salesperson_id);


					

			});
			
			$('button#post-response').click(function(){

					//alert('Cliecked! Post Response');
					
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
					
					
					//$( 'div#load_'+dlr_news_id ).html(empty);
					$( 'div#load_'+dlr_news_id ).load('ajax/pull_newsresponses.php?news_id='+dlr_news_id);
					
					//alert('Loaded! New Responses');
			});
			
			
			$('.fancybox').fancybox({
                openEffect	: 'none',
                closeEffect	: 'none'
            });
			
			
            $('#sales_person_post').summernote({

				
				
				
				height: 300,
				disableLinkTarget: true,     // hide link Target Checkbox
				placeholder: true,           // enable placeholder text
      			prettifyHtml: true,           // enable prettifying html while toggling codeview
				onImageUpload: function(files, editor, welEditable) {
					sendFile(files[0], editor, welEditable);
				}







			});









       });
        var edit = function() {
            $('.click2edit').summernote({
				focus: true,
				onImageUpload: function(files, editor, welEditable) {
					sendFile(files[0], editor, welEditable);
				}

			});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
			
			
            $('.click2edit').destroy();
        };
			
	function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "uploads/index.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }
