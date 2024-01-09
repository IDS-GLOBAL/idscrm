// JavaScript Document
$(document).ready(function(){


			$('a#findVehicle').on('click', function(){
				
				
				$('div#findVehiclesModal').modal({
				 	backdrop: 'static',
					keyboard: false
				});
				
				var vehicle_urlink = 'inventory.php?vstat=1';
				
				$("div#findVehiclesModal_body").load('' + vehicle_urlink + " #inventory_bar", function() {
					$.getScript("js/ids.inventory.js");
				});

			console.log('Finished Loading Inventory');

				
			});
			

			$('button#pull_vstockno').click(function(){
						//debugger;
						
						console.log('clicked: pull stock no');

				var enter_vstockno = $('input#enter_vstockno').val();
				var thisdid = $('input#thisdid').val();
				
				$.getJSON("script_json.salesdesk.pullstockvehicle.php?enter_vstockno="+enter_vstockno+"&thisdid="+thisdid, function(data){
						console.log('getting pull stock no');
						console.log(data.return_status.length);
							
						if (data.return_status.length == 0) {
							
								console.log("No DATA!")
								
								$('div#pull_vehicle_handle').removeClass('has-success').addClass('has-error');
								alert('No Stock Number Found! Please Try Again');
								return false;
								
								
						}else {
							
  

								console.log("We Have DATA!")

								$('div#pull_vehicle_handle').removeClass('has-error').addClass('has-success');
								
								$.each(data.return_status, function(obj){


							
									//console.log("return_status: "+this['return_status']);
									console.log("vid: "+this['vid']);
									
									$('input#vehicle_id').val(this['vid']);
									
									console.log("vtoken: "+this['vtoken']);
									console.log("did: "+this['did']);
									console.log("vlivestatus: "+this['vlivestatus']);
									console.log("vphoto_count: "+this['vphoto_count']);
									console.log("vthubmnail_file: "+this['vthubmnail_file']);
									console.log("vthubmnail_file_path: "+this['vthubmnail_file_path']);
									console.log("vDateInStock: "+this['vDateInStock']);
									console.log("vyear: "+this['vyear']);
									
									
									console.log("vmake: "+this['vmake']);
									console.log("vmodel: "+this['vmodel']);
									console.log("vtrim: "+this['vtrim']);

									if(this['vmake'] != null){
										
										var vmake = this['vmake'];
									}else{
										
										var vmake = '';
										
									}

									if(this['vmodel'] != null){
										
										var vmodel = this['vmodel'];
									}else{
										
										var vmodel = '';
										
									}

									if(this['vtrim'] != null){
										
										var vtrim = this['vtrim'];
									}else{
										
										var vtrim = '';
										
									}

									$('div#pullvehicle_stock_results').html('Found: '+this['vyear']+' '+vmake+' '+this['vmodel']+' '+vtrim);

									console.log("vvin: "+this['vvin']);
									console.log("vcondition: "+this['vcondition']);
									console.log("vcertified: "+this['vcertified']);
									console.log("vstockno: "+this['vstockno']);
									console.log("vmileage: "+this['vmileage']);
									console.log("vpurchasecost: "+this['vpurchasecost']);
									console.log("vdlrpack: "+this['vdlrpack']);
									console.log("vaddedcost: "+this['vaddedcost']);
									console.log("vrprice: "+this['vrprice']);
									if(this['vrprice'] != null){
										
									var vrprice = parseFloat(this['vrprice']).toFixed(2);

									$('input#priceVehicle').val(vrprice);
									updateMysum();

/*
														
										   if (confirm("Found Vehicle By Stock! Would You Like To Use Price Information?") == true) {
											   
												x = "You pressed OK!";
			
												 

													
													$('input#priceVehicle').val(vrprice);
													//console.log('Not NULL: '+vrprice);
			
												return true;
											} else {
												x = "You pressed Cancel!";
												
												$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-error');
												
												return false;
											}


*/
										
									}else{
										
										$('div#deal_info_block').find('input#priceVehicle').parent().parent().addClass('has-error');
										
										
										
									}
									
									//console.log("vdprice: "+this['vdprice']);
									//console.log("vspecialprice: "+this['vspecialprice']);
									//console.log("vecolor_txt: "+this['vecolor_txt']);
									//console.log("vicolor_txt: "+this['vicolor_txt']);
									//console.log("vbody: "+this['vbody']);
									//console.log("vdoors: "+this['vdoors']);
									//console.log("vehicleOptionsBulk: "+this['vehicleOptionsBulk']);
								});
				



						}


						   console.log(data.result);
						//console.log('OBJ: '+obj);
							
							

				
				
				
				});
				
/*				
				
				$.ajax({
					type: "GET",
					url:  "json/pullstockvehicle.php",
					data: "enter_vstockno="+enter_vstockno+"&thisdid="+thisdid,
					dataType: "json",
					success: function(msg,string,jqXHR){
						
						console.log(msg.vid);
						console.log(msg.vstockno);
						
						$("div#pullvehicle_stock_results").html(msg+string+jqXHR);
					}
				});
*/				
				
				
			
			
			});





});