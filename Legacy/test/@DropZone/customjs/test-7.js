// JavaScript Document
// http://www.jqueryajaxphp.com/upload-resize-image-dropzone-php/
$(document).ready(function(){
Dropzone.autoDiscover = false; // keep this line if you have multiple dropzones in the same page
$(".uploadform").dropzone({
acceptedFiles: "image/jpeg",
url: 'uploads/upload.php',
maxFiles: 1, // Number of files at a time
maxFilesize: 1, //in MB
maxfilesexceeded: function(file)
{
alert('You have uploaded more than 1 Image. Only the first file will be uploaded!');
},
success: function (response) {
var x = JSON.parse(response.xhr.responseText);
//$('.icon').hide(); // Hide Cloud icon
//$('#uploader').modal('hide'); // On successful upload hide the modal window
$('.img').attr('src',x.img); // Set src for the image
$('.thumb').attr('src',x.thumb); // Set src for the thumbnail
$('img').addClass('imgdecoration');
this.removeAllFiles(); // This removes all files after upload to reset dropzone for next upload
console.log('Image -> '+x.img+', Thumb -> '+x.thumb); // Just to return the JSON to the console.
},
addRemoveLinks: true,
removedfile: function(file) {
var _ref; // Remove file on clicking the 'Remove file' button
return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
}
});
});