$(document).ready(function(){


	$('.summernote').summernote({
	height: 10000,
	onImageUpload: function(files, editor, welEditable) {
		sendFile(files[0], editor, welEditable);
	}

	});


function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "uploads/single_mediaphoto.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
					console.log('welEditable: '+welEditable);
					console.log('url: '+url);
                }
            });
        }




}); //End Document Ready








var edit = function() {
	$('.click2edit').summernote({focus: true});
};


var save = function() {
	
	var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
	
	var thisdid  = $('input#thisdid').val();
	
	
	 //console.log(aHTML);
	 
	 $.post('script_update_contactus_page.php', {thisdid: thisdid, aHTML: aHTML}, function(data){ console.log(data)});
	
	$('.click2edit').destroy();
};
