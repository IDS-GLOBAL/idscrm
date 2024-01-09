// https://github.com/enyo/dropzone/wiki/FAQ#how-can-i-limit-the-number-of-files
$(document).ready(function(){


$('a#load_up_team_message').click(function(){
										   

	//alert('Wants to send Message');


});


$('button#push_this_message').click(function(){
											 

});

function removeteam_file(file){
	//var file = file;
	if(!file) return false;
	
	//alert('File: '+file.name);
}

function load_gallery(){

	//alert('Gallery Starting');
	var team_id = $('input#team_id').val();
	var did = $('input#thisdid').val();
	
	$('div#load_team_gallery').load('ajax/pull_team_gallery.php?dlr_team_id='+team_id+'&did='+did);
	//alert('Gallery Loaded');
	

}

function load_teamphoto(){

	//alert('Team Photo Starting');
	var team_id = $('input#team_id').val();
	var did = $('input#thisdid').val();
	

			$.get("ajax/pull_team_profile_photo.php", {did: did, team_id: team_id  }, 
				
				function(data){
			
				$('img#dlr_team_photo_url').attr('src', data);
				console.log(data);
				});
	
	//$('img#dlr_team_photo_url').attr("src", $(this).load('ajax/pull_team_profile_photo.php?team_id='+team_id+'&did='+did));
	//alert('Team Loaded');
	

}



$('a#load_up_teamgallery').click(function(){

	//$('#upmyphotosModal').fadeIn(1000).modal('show');
	//$('#oldteamgalleryModal').modal('show');
	load_gallery();

	
})



	//Dropzone Mess


	Dropzone.autoDiscover = false;



var loadTeamphoto_zone = $("div#loadTeamphoto_zone").dropzone({ 
									 
									 
							init: function() {


								 // Using a closure.
								  var _this = this;
								  var changeprofile = 0;

									// Setup the observer for the button.
									document.querySelector("a#upload_singleteamphoto").addEventListener("click", function() {
										
									});

									// Setup the observer for the button.
									document.querySelector("button#clearall").addEventListener("click", function(e) {
										// Using "_this" here, because "this" doesn't point to the dropzone anymore
										
										_this.removeAllFiles(true);
										//this.removeAllFiles(true);
										// If you want to cancel uploads as well, you
										// could also call _this.removeAllFiles(true);
									});
									

									document.querySelector("button#savephotoonly").addEventListener("click", function(e) {

										var changeprofile = 0;
										
										$('input#change_profile_pic').val(changeprofile);

										console.log('clicked save photo only');
										_this.processQueue();
										//_this.removeAllFiles(true);
									});


									document.querySelector("button#savechangeprofile").addEventListener("click", function(e) {
										var changeprofile = 1;
										
										$('input#change_profile_pic').val(changeprofile);
										
										console.log('clicked saved and change profile photo changeprofile: '+changeprofile);
										_this.processQueue();										
										//_this.removeAllFiles(true);
										
										load_teamphoto();
										console.log('load_teamphoto() = Done');
										
										return changeprofile;
										
									});



	
									this.on("maxfilesexceeded", function(file){
										alert("Only One Photo Is Allowed");
										this.removeFile(file);
									});
								    this.on("addedfile", function(file) {

										//alert("Just Added File!");
										//this.removeAllFiles(true);
										console.log("Just Added File!");

									});

									this.on("maxfilesreached", function(file){
										//alert("maxfilesreached No more files please!");
										this.removeFile(file);
									});
									this.on("removedfile", function(file){
										console.log("Removed A Single File!");
										//this.removeFile(file);
										removeteam_file(file);
									});

									this.on("processing", function(file) {
											
											var change_profile_pic = $('input#change_profile_pic').val();
											
											
											
											var changeprofile_final = change_profile_pic;
											console.log('changeprofile: '+changeprofile_final);
											
											var team_id = $('input#team_id').val();
											var did = $('input#thisdid').val();

											var team_photo_albumcomments = $('input#team_photo_albumcomments').val();
											var team_photo_date_taken = $('input#team_photo_date_taken').val();

											console.log(team_id);
											console.log(did);
											this.options.url = "uploads/single_dropzone_oneteamphoto.php"
													+'?team_id='+team_id+
													'&did='+did+
													'&team_photo_albumcomments='+team_photo_albumcomments+
													'&team_photo_date_taken='+team_photo_date_taken+
													'&changeprofile_final='+changeprofile_final+''
		
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
							clickable: ["a#upload_singleteamphoto",".dropzone"],
							createImageThumbnails: true,
							addRemoveLinks: true,
							removedfile: function(file) { 
							
							
							
								var _ref;
								return (_ref = file.previewElement) != null ? 
									  _ref.parentNode.removeChild(file.previewElement) : void 0;
									  
								removeteam_file(file.name);
							
							},
							url: "uploads/single_dropzone_oneteamphoto.php",
						 	//clickable: 'a#upload_singleteamphoto',
							success: function (file, responseText) {
									console.log('Success:'+responseText);
			//var append_thumbnail = file.previewTemplate.appendChild(document.createTextNode(responseText));
									
									//console.log('Append_thumbnail:'+append_thumbnail);
									
									var change_profile_pic = $('input#change_profile_pic').val();

									if(change_profile_pic == 1){ load_teamphoto(); }
									
									
									this.removeAllFiles(true);
							},
							
							dictFileTooBig: "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",
							dictInvalidFileType: "You can't upload files of this type.",
							dictRemoveFile: "Remove This",
							dictMaxFilesExceeded: "You can not upload any more files."


	});












});




