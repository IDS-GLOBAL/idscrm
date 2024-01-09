// JavaScript Document
// https://github.com/enyo/dropzone/issues/253
// BS https://github.com/enyo/dropzone/wiki/Remove-all-files-with-one-button
// https://github.com/enyo/dropzone/wiki/Combine-normal-form-with-Dropzone

$(document).ready(function(){

//$('button#uploadPhotos').hide();

var did = $('input#thisdid').val();
var vid = $('input#vid').val(); //'2166'
var sid = $('input#thissid').val();

var token = $('input#token').val();
console.log(did);

console.log(sid);



// Creates An Error:  Uncaught Error: Dropzone already attached.    dropzone.js.558
Dropzone.autoDiscover = false;

/* */
var sales_person_photosDropzone = $("form#sales_person_photosDropzone").dropzone({ 
												
												acceptedFiles: 'image/jpeg, image/pjpeg',
												maxFiles: 20,
												method: 'POST',
												paramName: "salesPerson",
												addRemoveLinks: true,
												url: "upload.sales_person_photos.Dropzone.php"+'?vid='
													+vid+'&sid='
													+sid+'&did='+did
												,
											   	autoProcessQueue: true,
										
												uploadprogress: function(file, progress, bytesSent) {
												// Display the progress
													console.log('Upload Progress: File:'+file+' Progress: '+progress+' Bytes Sent'+bytesSent);
												},
												success: function (file, responseText, response) {
													console.log('Success:'+response);
													var args = Array.prototype.slice.call(arguments);
													console.log('Args:'+args);
													//var trial = file.previewTemplate.appendChild(document.createTextNode(responseText));
													//console.log('Trial: '+trial);
												},
init: function() {
													this.on("maxfilesexceeded", function(file){
														alert("No more files please!");
													});
													
													this.on("addedfile", function(file) {
													  // Show submit button here and/or inform user to click it.
													console.log('Added A File'+file);
													
													});

													this.on("success", function() {
													  // Show submit button here and/or inform user to click it.
													console.log('Success A File');
													});

								
}




  

});



/*
var myDropzone = new Dropzone("form#sales_person_photosDropzone", 
							  {
							  url: "upload.sales_person_photos.Dropzone.php",
							  autoProcessQueue:true
							  }
);
*/




$('a#external_upload_salesperson_photos').click(function(){

console.log('Button Clicked');
sales_person_photosDropzone.processQueue();





});














/*
	Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element



		autoProcessQueue: false,
		addRemoveLinks: true,
		parallelUploads: 100,
		maxFiles: 100,
		url: "upload.salesperson.photos.php" + '?did=' + did + '&sid=' + sid + '',



  init: function() {
    var submitButton = document.querySelector("#uploadPhotos");
        myDropzone = this; // closure

    submitButton.addEventListener("click", function(e) {
	  e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });
		console.log('Read Me 1:');

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	  // 
	  console.log('Added File');
		
	   $("button#uploadPhotos").show();
    });
	// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
	  $("button#uploadPhotos").hide();
    });
    this.on("successmultiple", function(files, response) {
      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
	  $("button#uploadPhotos").hide();
	  
	  pullvphotos();
	  
    });
    this.on("errormultiple", function(files, response) {
      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
    });

  }
};			
			
			
function pullvphotos(){
		
	setTimeout(function(){
		var vid = $('input#dropzonevid').val(); //'2166'

		$.post('script_pullvphotos.php', {vid: vid},
			   function(result) {
				   $('div#box_vehiclePhotos').html(result).show();
				   //console.log(result);
				});
		
	},6000);


}

*/
			
			
			

	
});
