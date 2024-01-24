// JavaScript Document
$(document).ready(function(){
						   
						   
// JavaScript Document
// https://github.com/enyo/dropzone/wiki/Upload-all-files-with-a-button


//alert('Loaded');

//var myDropzone = new Dropzone("div#myId", {  url: "/uploads/upload.php", });



var did = $('input#thisdid').val();
var vid = $('input#vid').val(); //'2166'
var sid = $('input#thissid').val();

var token = $('input#token').val();
console.log(did);

console.log(sid);



// Creates An Error:  Uncaught Error: Dropzone already attached.    dropzone.js.558
//Dropzone.autoDiscover = false;


Dropzone.options.myDropzone = {

  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
	console.log('Happening');
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
	console.log('Happened');
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	console.log('Added A File'+file);
    });


    this.on("removedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	console.log('Removed A File'+file);
    });

    this.on("complete", function(file) {
		// Show submit button here and/or inform user to click it.
		// myDropzone.removeFile(file);
	console.log('Removed '+file+' completed.');
    });

    this.on("sendingmultiple", function() {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
    });




  },

	// Prevents Dropzone from uploading dropped files immediately
	autoProcessQueue: false,
	maxFilesize: 10,
	maxFiles: 3,
	parallelUploads: 100,
	createImageThumbnails: true,
	uploadMultiple: true,
	enqueueForUpload: true,
	acceptedFiles: 'image/jpeg, image/pjpeg',
	paramName: 'myphotos',
	url: "upload.sales_person_photos.Dropzone.php"+'?vid='
		+vid+'&sid='
		+sid+'&did='+did
	,

	uploadprogress: function(file, progress, bytesSent) {
												// Display the progress
													console.log('Upload Progress: File:'+file+
																' Progress: '+progress+' Bytes Sent'+bytesSent
												)
												},
												success: function (file, responseText, response) {
													console.log('Success:'+response);
													var args = Array.prototype.slice.call(arguments);
													console.log('Args:'+args);
													//var trial = file.previewTemplate.appendChild(document.createTextNode(responseText));
													//console.log('Trial: '+trial);
												},
	addRemoveLinks: true

};

// That's it!

});
