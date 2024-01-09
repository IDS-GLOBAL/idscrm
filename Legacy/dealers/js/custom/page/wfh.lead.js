// JavaScript Document
$(document).ready(function(){



		

	var primary_state = $('input#dealer_primary_state').val();




        $(document).on('click', '.purchaselead', function () {
			
			var wfhuserperm_id = $(this).attr('id');
			var ldfee = $(this).attr('name');
			var fbid = $(this).attr('rel');
			
			var display_price = $(this).parent('.product-desc').find('span.product-price').html();
			
			var log_vid = $(this).attr('title');
			
			console.log('Display Price'+display_price);
			
            swal({
                        title: "Are you sure?",
                        text: "This will be added to your purchase history!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, Purchase it!",
                        cancelButtonText: "No, Cancel purchase!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Success!", "Your Purchase Is Complete.", "success");
							console.log('puchasing: '+ldfee);
							$.post('script_charge_dealerlead.php', {wfhuserperm_id: wfhuserperm_id, ldfee: ldfee, fbid: fbid, log_vid: log_vid, display_price: display_price}, function(e){console.log(e)});
						
						var hide_lead = 'a#'+wfhuserperm_id+'.purchaselead';
						
						$(hide_lead).hide(300);
						
                        } else {
                            swal("Cancel", "Canceled Purchase:( ", "error");
							
                        }
                    });
        });







});