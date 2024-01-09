// JavaScript Document
$(document).ready(function(){


function load_salespersonphoto(){

	//alert('Team Photo Starting');
	var salesperson_id = $('input#salesperson_id').val();
	var did = $('input#thisdid').val();
	

			$.get("ajax/pull_salesperson_profile_photo.php", {did: did, salesperson_id: salesperson_id  }, 
				
				function(data){
			
				$('img#salesperson_photo_url').attr('src', data);
				console.log(data);
				});
	
	//$('img#dlr_team_photo_url').attr("src", $(this).load('ajax/pull_team_profile_photo.php?team_id='+team_id+'&did='+did));
	//alert('Team Loaded');
	

}





		//Dropzone Mess


	Dropzone.autoDiscover = false;



var loadTeamphoto_zone = $("div#sales_person_onedropbox").dropzone({ 
									 
									 
							init: function() {


								 // Using a closure.
								  var _this = this;
								  var changeprofile = 0;

									// Setup the observer for the button.
									document.querySelector("a#upload_singlesalespersonphoto").addEventListener("click", function() {
										
									});

									// Setup the observer for the button.
									document.querySelector("button#clearall_one").addEventListener("click", function(e) {
										// Using "_this" here, because "this" doesn't point to the dropzone anymore
										
										_this.removeAllFiles(true);
										//this.removeAllFiles(true);
										// If you want to cancel uploads as well, you
										// could also call _this.removeAllFiles(true);
									});
									

									document.querySelector("button#savephotoonly").addEventListener("click", function(e) {

										var changeprofile = 0;
										
										$('input#changesalespersonprofilephoto_final').val(changeprofile);

										console.log('clicked save photo only');
										_this.processQueue();
										//_this.removeAllFiles(true);
									});


									document.querySelector("button#savechangeprofile").addEventListener("click", function(e) {
										var changeprofile = 1;
										
										$('input#changesalespersonprofilephoto_final').val(changeprofile);
										
										console.log('clicked saved and change profile photo changeprofile: '+changeprofile);
										_this.processQueue();										
										//_this.removeAllFiles(true);
										
										load_salespersonphoto();
										console.log('load_salespersonphoto() = Done');
										
										return changeprofile;
										
									});



	
									this.on("maxfilesexceeded", function(file){
										alert("Only One Photo Is Allowed");
										this.removeFile(file);
									});
								    this.on("addedfile", function(file) {

										//alert("Just Added File!");
										//this.removeAllFiles(true);
										$('#salepersonUploadModal').modal({backdrop: 'static', show: true});


										//$('#upmyphotosModal').fadeIn(1000).modal('show');
										
										console.log("Just Added File!");

									});

									this.on("maxfilesreached", function(file){
										//alert("maxfilesreached No more files please!");
										this.removeFile(file);
									});
									this.on("removedfile", function(file){
										console.log("Removed A Single File!");
										//this.removeFile(file);
										
									});

									this.on("processing", function(file) {
											
								var changesalespersonprofilephoto_final= $('input#changesalespersonprofilephoto_final').val();
											
											
											
											//var changeprofile_final = changesalespersonprofilephoto_final;
											//console.log('changeprofile: '+changeprofile_final);
											
											var salesperson_id = $('input#salesperson_id').val();
											var did = $('input#thisdid').val();
											var sid_photo_team_id = $('input#team_id').val();

											var sid_photo_albumcomments = $('input#sid_photo_albumcomments').val();
											var sid_photo_datetaken = $('input#sid_photo_datetaken').val();

											console.log(salesperson_id);
											console.log(did);
											this.options.url = "uploads/single_dropzone_onesalespersonphoto.php"
													+'?salesperson_id='+salesperson_id+
													'&did='+did+
													'&sid_photo_team_id='+sid_photo_team_id+
													'&sid_photo_albumcomments='+sid_photo_albumcomments+
													'&sid_photo_datetaken='+sid_photo_datetaken+
													'&changeprofile_final='+changesalespersonprofilephoto_final+''
		
				 					});




				 			},
							acceptedFiles: "image/*",
							uploadMultiple: false,
							enqueueForUpload: true,						
							autoProcessQueue: false,
							enqueueForUpload: true,
							maxFilesize: 5,
							maxFiles: 1,
							parallelUploads: 1,
							clickable: ["a#upload_singlesalespersonphoto",".dropzone"],
							createImageThumbnails: true,
							addRemoveLinks: true,
							removedfile: function(file) { 
							
							
							
								var _ref;
								return (_ref = file.previewElement) != null ? 
									  _ref.parentNode.removeChild(file.previewElement) : void 0;
									  
								removeteam_file(file.name);
							
							},
							url: "uploads/single_dropzone_onesalespersonphoto.php",
						 	//clickable: 'a#upload_singlesalespersonphoto',
							success: function (file, responseText) {
									console.log('Success:'+responseText);
			//var append_thumbnail = file.previewTemplate.appendChild(document.createTextNode(responseText));
									
									//console.log('Append_thumbnail:'+append_thumbnail);
									
									var changesalespersonprofilephoto_final = $('input#changesalespersonprofilephoto_final').val();

									if(changesalespersonprofilephoto_final == 1){ load_salespersonphoto(); }
									
									
									this.removeAllFiles(true);
							},
							
							dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
							dictInvalidFileType: "You can't upload files of this type.",
							dictRemoveFile: "Remove This",
							dictMaxFilesExceeded: "You can not upload any more files."


	});






});