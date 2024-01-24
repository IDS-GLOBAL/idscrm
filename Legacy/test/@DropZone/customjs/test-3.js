// JavaScript Document
// https://github.com/enyo/dropzone/wiki/Upload-all-files-with-a-button


//alert('Loaded');

//var myDropzone = new Dropzone("div#myId", {  url: "/uploads/upload.php", });


Dropzone.options.myDropzone = {

												// Prevents Dropzone from uploading dropped files immediately
												autoProcessQueue: false,
												acceptedFiles: 'image/jpeg',
												url: 'uploads/upload.php',
												method: 'POST',
												parallelUploads: '3', // How many file uploads to process in parallel 
																	  //(See the Enqueuing file uploads section for more info)
																	  
												uploadprogress: function(file, progress, bytesSent) 
												{
												// Display the progress
													console.log('Upload Progress: File:'+file+
																' Progress: '+progress+
																' Bytes Sent'+bytesSent)
												},
												success: function (file, responseText, response) {
													
													console.log('Success:'+response)
													
													var args = Array.prototype.slice.call(arguments)
													
													console.log('Args:'+args)
													
													var trial = file.previewTemplate
													.appendChild(document.createTextNode(responseText)
													);
													//console.log('Trial: '+trial);
												},
												uploadMultiple: true,
												addRemoveLinks: true,

									  init: function() {
										var submitButton = document.querySelector("#submit-all")
											myDropzone = this; // closure
									
										submitButton.addEventListener("click", function(e) {
										console.log('Happening');
											e.preventDefault();
											e.stopPropagation();
										  myDropzone.processQueue(); // Tell Dropzone to process all queued files.
										console.log('Happened');
										});

										// You might want to show the submit button only when 
										// files are dropped here:
										this.on("addedfile", function() {
										  // Show submit button here and/or inform user to click it.
										console.log('Added A File');
										});
										
										this.on("addedfile", function() {
										  // Show submit button here and/or inform user to click it.
										console.log('success A File');
										});

  }
};

// That's it!