// Creates An Error:  Uncaught Error: Dropzone already attached.    dropzone.js.558
// Dropzone.autoDiscover = false;
//var myDropzone = new Dropzone("#my-dropzone");
//$("div#my-dropzone").dropzone({ url: "/file/post" });

// JavaScript Document
$(document).ready(function(){
						   
//alert('loaded dropzone.systemdlrvehicleuploads.js');


$('a.ldexternal_vehicle_photo').on('click', function(){
		var this_vehicleid = jQuery(this).attr("id");
		console.log('this_vehicleid: '+this_vehicleid);
		$('input#this_vehicleid').val(this_vehicleid);
		var prospctdlrid = jQuery('input#prospctdlrid').val();
		$('input#this_prospctdlrid').val(prospctdlrid);

		$('div#vehicleUploadModal').modal({backdrop:'static',keyboard:false, show:true});



});




Dropzone.options.myDropzone = {



  init: function() {
	 
	//You can do this
    $('#clear_outphotos').on("click", function(e) {
      myDropzone.removeAllFiles(true);
    });
	
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function(e) {
	console.log('Happening');
	  e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
	console.log('Happened');
    });

    this.on("complete", function(file) {
		// Show submit button here and/or inform user to click it.
		// myDropzone.removeFile(file);
		//if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
			console.log('Doing Something GetUploading files '+file.name+' completed.');        
			//doSomething();
		//  }
		  
		console.log('Complete '+file.name+' completed.');
    });

	this.on("queuecomplete", function (file) {
          console.log("queuecomplete All files have uploaded ");
    });
    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("thumbnail", function(file) {
      // Show submit button here and/or inform user to click it.
	console.log('thumbnail File'+file.name);
    });
    this.on("addedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	console.log('Added A File'+file.name);
		$('div#vehicleUploadModal').modal('show');

    });
    this.on("removedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	console.log('Removed A File'+file.name);
    });
	this.on("sending", function(file, xhr, data) {
		var this_vehicleid = $('input#this_vehicleid').val();
	
		var this_prospctdlrid = $('input#this_prospctdlrid').val();

       data.append("vehicleid", this_vehicleid);
       data.append("prospctdlrid", this_prospctdlrid);
	   
    });
    this.on("error", function(file, response) {
      //handle errors here
	  console.log('Error File'+file.name+' Response: '+response);
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
	  	console.log('Error Multiple File'+files.names+' Response: '+response);
		myDropzone.removeFile(files);
    });


    this.on("sendingmultiple", function(files) {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
		console.log('Sending Multiple File'+files.name);

    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
	  	console.log('Success Multiple File'+files.name+' Response: '+response);

    });

    this.on("totaluploadprogress", function(file, files, bytesSent) {
      // Show submit button here and/or inform user to click it.
	console.log("totaluploadprogress Files"+file.name+' Bytes: '+bytesSent);
    });

  },


	

	// Prevents Dropzone from uploading dropped files immediately
	autoProcessQueue: false,
	maxFilesize: 2,
	maxFiles: 100,
	//parallelUploads: 100,
	//forceFallback: false,
	//previewsContainer: '#dropzonePreview',
	//previewTemplate: "#dropzonePreview",
	clickable: '.ldexternal_vehicle_photo',
	//clickable: '#dropzonePreview',
	dictFileTooBig: 'Sorry File Size Too big',
	dictInvalidFileType: "Sorry This File Type Is Not Allowed!",
	dictFallbackMessage: "Sorry your browser does not support thise file upload feature.",
	createImageThumbnails: true,
	uploadMultiple: true,
	enqueueForUpload: true,
	acceptedFiles: 'image/jpeg, image/pjpeg',
	//paramName: "myphotos",
	//url: "uploads/dudesVehiclephotos.Dropzone.php" + '?this_vehicleid=' + this_vehicleid + '&prospctdlrid=' + prospctdlrid + '&vehicle_id='+this_vehicleid,

	url: "uploads/dudesVehiclephotos.Dropzone.php",

	uploadprogress: function(file, progress, bytesSent) {
	// Display the progress
		console.log('Upload Progress: File:'+file.name+
					' Progress: '+progress+' Bytes Sent'+bytesSent
	)
	},
	success: function (file, responseText, response) {
		//console.log('Success: '+responseText);
		//var args = Array.prototype.slice.call(responseText);
		//console.log('Args: '+args+' Arguments: '+arguments);
		//var trial = file.previewTemplate.appendChild(document.createTextNode(responseText));
		//console.log('Trial: '+trial);
	},
	addRemoveLinks: true

 };
 
 
});
// That's it!