// JavaScript Document
$(document).ready(function(){

$(".photo_file").click( function(){
	
	var photoclicked = $(this).attr('src');
	var photoid = $(this).attr('id');
	//alert(photoid);
	
	document.getElementById("delete_v_photoid").value=photoid;
	
	//var handler = $(this).find('.photo_file');
	//var newsrc  = handler.attr('src');
	
	//var thisphoto = $(this).attr('href');
	
	//alert(newsrc);
	//$('#largephoto img').attr('src', newsrc);
	
	
	
});



});