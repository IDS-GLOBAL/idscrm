// JavaScript Document
$(document).ready(function(){


            $('.footable').footable();
            $('.footable2').footable();



console.log('loaded: custom.ajax_dealer_prospect_results.js');

					


		$(document).on('click', 'a.ajaxtrigger', function(){
			
			
			
			
			var propspect_id = $(this).attr('id');
			
			console.log('prospect_link clicked: '+propspect_id);
			
			
			//$('#pick_aprospect_instate').hide();
			
			
			//$('work_dealer_prospect_section').load('prospect.dealer.php #dealer_box', {propspect_link: propspect_link}, function(data){
						
			//});

			var propspect_link = 'prospect.dealer.php?prospctdlrid='+propspect_id;

			console.log('showing: '+propspect_link);
			
			$("div#work_aprospect_instate").load('' + propspect_link + " #dealer_box", function() {
				$.getScript("js/custom/prospect.dealer.js");
				$.getScript("js/plugins/dropzone/dropzone.js");
				$.getScript("js/custom/page/dropzone.vehicleuploads.js");


				$('div#pick_aprospect_instate').hide();
				$('div#pick_aprospectdlr_towork').hide();
				$('div#work_aprospect_instate').show();
				$('div#sendtoregistered_que').show();
				$('button#bringup_finalactions').on('click', function(){
						$('div#work_aprospect_instate').hide();
						$('div#pick_aprospectdlr_towork').show();
						$('div#sendtoregistered_que').hide();
				});
			}).show();




			

			




			
			
		});








});