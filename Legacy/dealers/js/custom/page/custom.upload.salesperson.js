// JavaScript Document
$(document).ready(function(){
						   
						   
// JavaScript Document
// https://github.com/enyo/dropzone/wiki/Upload-all-files-with-a-button
// http://stackoverflow.com/questions/18622508/bootstrap-3-and-youtube-in-modal

//alert('Loaded');

//var myDropzone = new Dropzone("div#myId", {  url: "/uploads/upload.php", });

            var elem_3 = document.querySelector('.js-switch_photo_status');
            var switchery_3 = new Switchery(elem_3, { color: '#59C2F8' });





var did = $('input#thisdid').val();
var vid = $('input#vehicle_id').val(); //'2166'
var sid = $('input#thissid').val();


// console.log(did);

// console.log(sid);



// Creates An Error:  Uncaught Error: Dropzone already attached.    dropzone.js.558
// Dropzone.autoDiscover = false;
//var myDropzone = new Dropzone("#my-dropzone");
//$("div#my-dropzone").dropzone({ url: "/file/post" });


Dropzone.options.myDropzone = {

  init: function() {

	//You can do this
    $('a#clear_outphotos').on("click", function(file) {
      myDropzone.removeAllFiles(true);
	//console.log('Clearing Photos File'+file.name);
    });
	
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function(e) {
	// console.log('Happening');
	  e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
	// console.log('Happened');
    });

	this.on("processing", function(file) {

		//  https://github.com/enyo/dropzone/wiki/Set-URL-dynamically
		//  Pull the options before submit or while processing.

			if (document.getElementById('sid_photo_status').checked) {
				var sid_photo_status = 1;
			}
			else{
				var sid_photo_status = 0;
			}
		
		
		var vid = $('input#vehicle_id').val(); //'2166'
		
		var sid_photo_albumname = $('input#sid_photo_albumname').val();
		// console.log('sid_photo_albumname: '+sid_photo_albumcomments);
		var sid_photo_albumcomments = $('input#sid_photo_albumcomments').val();
		// console.log('sid_photo_albumcomments: '+sid_photo_albumcomments);
		var sid_photo_datetaken = $('input#sid_photo_datetaken').val();
		// console.log('sid_photo_datetaken: '+sid_photo_datetaken);
		
		var album_token = $('input#token').val();
		var sid_photo_geo_latitude = $('input#sid_photo_geo_latitude').val();
		var sid_photo_geo_longitude = $('input#sid_photo_geo_longitude').val();

      this.options.url = "upload.sales_person_photos.Dropzone.php"
		+'?vid='+vid+
		'&sid='+sid+'&did='+did+
		'&sid_photo_status='+sid_photo_status+
		'&sid_photo_albumname='+sid_photo_albumname+
		'&sid_photo_albumcomments='+sid_photo_albumcomments+
		'&sid_photo_datetaken='+sid_photo_datetaken+
		'&sid_photo_geo_latitude='+sid_photo_geo_latitude+
		'&sid_photo_geo_longitude='+sid_photo_geo_longitude;
    
	});
    this.on("complete", function(file) {
		// Show submit button here and/or inform user to click it.
		// myDropzone.removeFile(file);
		//if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
			// console.log('Doing Something GetUploading files '+file.name+' completed.');        
			//doSomething();
		  //}
		  
		// console.log('Complete '+file.name+' completed.');
    });

	this.on("queuecomplete", function (file) {
         // console.log("queuecomplete All files have uploaded ");
    });
    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("thumbnail", function(file) {
      // Show submit button here and/or inform user to click it.
	// console.log('thumbnail File'+file.name);
    });
    this.on("addedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	
// console.log('Added A File'+file.name);
      	// Show Modal On Added File
		$('#upmyphotosModal').fadeIn(1000).modal('show');
    
	
	});
    this.on("removedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	// console.log('Removed A File'+file.name);
    });
    this.on("error", function(file, response) {
      //handle errors here
	 //// console.log('Error File'+file.name+' Response: '+response);
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
	  	// console.log('Error Multiple File'+files.names+' Response: '+response);
		myDropzone.removeFile(files);
    });


    this.on("sendingmultiple", function(files) {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.



		// console.log('Sending Multiple File'+files.name);

    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
	  	// console.log('Success Multiple File'+files.name+' Response: '+response);

    });

    this.on("totaluploadprogress", function(file, files, bytesSent) {
      // Show submit button here and/or inform user to click it.
	// console.log("totaluploadprogress Files"+file.name+' Bytes: '+bytesSent);
    });





  },


	// Prevents Dropzone from uploading dropped files immediately
	autoProcessQueue: false,
	maxFilesize: 2,
	maxFiles: 20,
	//parallelUploads: 100,
	//forceFallback: false,
	//previewsContainer: '#dropzonePreview',
	//previewTemplate: "#dropzonePreview",
	clickable: 'a#external_upload_salesperson_photos',
	//clickable: '#dropzonePreview',
	dictFileTooBig: 'Sorry File Size Too big',
	dictInvalidFileType: "Sorry This File Type Is Not Allowed!",
	dictFallbackMessage: "Sorry your browser does not support thise file upload feature.",
	createImageThumbnails: true,
	uploadMultiple: true,
	enqueueForUpload: true,
	acceptedFiles: 'image/jpeg, image/pjpeg',
	//paramName: "myphotos",
	method: 'post',

	uploadprogress: function(file, progress, bytesSent) {
												// Display the progress
													console.log('Upload Progress: File:'+file.name+
																' Progress: '+progress+' Bytes Sent'+bytesSent
												)
												},
												success: function (file, responseText, response) {
													console.log('Success: '+responseText);
													//var args = Array.prototype.slice.call(responseText);
													//console.log('Args: '+args+' Arguments: '+arguments);
													//var trial = file.previewTemplate.appendChild(document.createTextNode(responseText));
													//console.log('Trial: '+trial);
												},
	addRemoveLinks: true

};

// That's it!

});
