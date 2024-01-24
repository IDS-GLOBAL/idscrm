// JavaScript Document
// https://github.com/enyo/dropzone/wiki/Upload-all-files-with-a-button


//alert('Loaded');

//var myDropzone = new Dropzone("div#myId", {  url: "/uploads/upload.php", });


Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,

	addRemoveLinks: true,

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
    this.on("addedfile", function() {
      // Show submit button here and/or inform user to click it.
	console.log('Added A File');
    });

  }
};

// That's it!