// JavaScript Document
// https://github.com/enyo/dropzone/issues/253
// BS https://github.com/enyo/dropzone/wiki/Remove-all-files-with-one-button
// https://github.com/enyo/dropzone/wiki/Combine-normal-form-with-Dropzone

$(document).ready(function(){


$('button#uploadPhotos').hide();

var did = $('input#dropzonedid').val();
var vid = $('input#dropzonevid').val(); //'2166'

console.log(did);

console.log(vid);

	Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

		autoProcessQueue: true,
		addRemoveLinks: true,
		parallelUploads: 1,
		maxFiles: 100,
		url: "uploadDropzone.php" + '?did=' + did + '&vid=' + vid + '',


  init: function() {
    var submitButton = document.querySelector("#uploadPhotos");
        myDropzone = this; // closure

    submitButton.addEventListener("click", function(e) {
	  e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function(file) {
      // Show submit button here and/or inform user to click it.
	  // 
	  console.log('Added File');
		
	   //$("button#uploadPhotos").show();
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

			
			
			
			

	
});
