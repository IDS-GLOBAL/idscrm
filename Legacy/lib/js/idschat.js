$(document).ready(function() {

var chatdid = document.getElementById('chatdid').value;

var filepage = document.getElementById('filepage').value;

var livechatpage = "chat-module.php";


//Set the chat name by Javascript on every page load.
var chatName = document.getElementById('chatName').value;
document.getElementById("mydealer_chatname").value=chatName;






if(filepage == livechatpage){ liveVisitors(); updates(); console.log(livechatpage+' Is Live Page');}else{	liveVisitors(); console.log(livechatpage+' Not Live Page'); }

$('input#chatdisplay_status_0').change(function switchDisplayChaton(){
		
		var chatdid = document.getElementById('chatdid').value;

		var thisDisplaystatus = 'On';
		
		//alert('You Turned On Your Chat Display');
		console.log( 'clicked on');
		
		
		
		$.post('ajaxEnviro/dealerchatstatus.php', {chatdid: chatdid, thisDisplaystatus: thisDisplaystatus }, 
										   
				   function(result) {
		
						$('#chatDisplayLight').html(result).show();
						
						//$('.green').html(result).show();
						clicksound.playclip()
				   });
		
				//$("#chat_ticker").toggle(1000);
					
				//$("#dock_horzchatbar").addClass("horzwidthmax").removeClass("horzwidthmin");
				

});


$('input#chatdisplay_status_1').change(function switchDisplayChatoff(){

		var chatdid = document.getElementById('chatdid').value;

		var thisDisplaystatus = 'Off';		
		
		//alert('You Turned Off Your Chat Display');
		console.log( 'clicked off');
		

		$.post('ajaxEnviro/dealerchatstatus.php', {chatdid: chatdid, thisDisplaystatus: thisDisplaystatus }, 
										   
				   function(result) {
		
						$('#chatDisplayLight').html(result).show();
						
						//$('.green').html(result).show();
						
				   });
		
				//$("#chat_ticker").toggle(1000);
					
				//$("#dock_horzchatbar").addClass("horzwidthmax").removeClass("horzwidthmin");
				
				clicksound.playclip();
				
});


$('input#ChatGroup1_0').click(function turnOnChat(){
		
		var chatdid = document.getElementById('chatdid').value;

		var thisstatus = 'On';
		
		$.post('ajaxEnviro/dealerchatstatus.php', {chatdid: chatdid, thisstatus: thisstatus }, 
										   
				   function(result) {
		
						$('#dealerChatLight').html(result).show();
						
						$('.green').html(result).show();
					
						
				   });
		
				$("#chat_ticker").toggle(1000);
					
				$("#dock_horzchatbar").removeClass("horzwidthmin").addClass("horzwidthmax");
				//$("#chat_ticker").removeClass("horzwidthsm");
				
				welcometolivechat.playclip()

});

$('input#ChatGroup1_1').click(function turnOffChat(){

		var chatdid = document.getElementById('chatdid').value;

		var thisstatus = 'Off';
		
		$.post('ajaxEnviro/dealerchatstatus.php', {chatdid: chatdid, thisstatus: thisstatus }, 
										   
				   function(result) {
					$('#dealerChatLight').html(result).show();
					
					$('.green').html(result).show();
					
					
				   });
		
					$("#chat_ticker").toggle(1000);
					
				$("#dock_horzchatbar").removeClaass("horzwidthmax").addClass("horzwidthmin");
				//$("#chat_ticker").addClass("horzwidthsm");
				carhonk.playclip()
});


$('button#inviteVisitorToConvesation').click(function dealercommandVisitor(){

	var chatddid = document.getElementById('chatdid').value;
	var chattingVisitorid = document.getElementById("chattingVisitorid").value;
	
	var dealerCommands = document.getElementById("dealerCommands");
	var attractVisitorCmd = dealerCommands.options[dealerCommands.selectedIndex].value;
	
	var mydealer_chatname = document.getElementById("mydealer_chatname").value;

	
	if(!attractVisitorCmd){return false;}
	
	//alert(visitor_id);

	$.post('ajaxEnviro/send-dealercommand.php', {chatddid: chatddid, chattingVisitorid: chattingVisitorid, attractVisitorCmd: attractVisitorCmd, mydealer_chatname: mydealer_chatname }, 
	   
	   
	   function(result) {
		$('#attractVisitorCmd').html(result).show();
		
	   });
		
		clearVisitorInfo()
		//document.getElementById("dealerCommands").selectedIndex = '';
});





				$('#sndMsg').click(function dlrSendMessage(){
														   
					//Check If Name Is Present Before Sending.
					promptName();

					var empty = '';

					var chatddid = document.getElementById('chatdid').value;
					
					var chattingVisitorid = document.getElementById("chattingVisitorid").value;
				
					var chattingVisitorToken = document.getElementById("chattingVisitorToken").value;
					
					var quedMsg = document.getElementById("quedMsg").value;
					
					var mydealer_chatname = document.getElementById("mydealer_chatname").value;
					//alert(mydealer_chatname);
					
				
				
					
						$.post('ajaxEnviro/send-visitorsession.php', {chatdid: chatddid, chattingVisitorid: chattingVisitorid, chattingVisitorToken: chattingVisitorToken, quedMsg: quedMsg, mydealer_chatname: mydealer_chatname }, 
							   
						   function(result) {
							$('#last-msg').html(result).show();
							
						   });
				
				document.getElementById('quedMsg').value=empty;
				
				$('#chatWindow_Container').animate({scrollTop: $('#chatWindow_Container')[0].scrollHeight});


				
				
				});








	$('.msgClose').click(function hideMsgWindow(){
		
		
		
		
		$(this).parents(".msgWindow").find("ul#chatWindow").toggle(1000);
		
		$(this).parents(".msgWindow").toggleClass("closed");
		
		//$(this).parents(".msgWindow").addClass("closed");
		
		//$('span').closest("ul#chatWindow").toggle();
		//$(this).parentsUntil('ul#chatWindow').toggle();
		//$("ul#chatWindow").toggle();
		//alert('clicked');
		//document.getElementsByTagName("msgWindow");
		//$(".msgWindow").addClass("closed");
		
		//$(".bottomDockWrapper").closest(".DockChatTab").addClass("closed"); //.css({"border":"2px solid red"});
		// $(".msgWindow ul").closest("msgWindow").addClass("closed");
		// $(".msgWindow ul").closest("ul#chatWindow").css("display", "none");
		//$("msgWindowBar").closest(".msgWindowBar").css("display", "none");
		// $(".msgWindow ul").closest("ul#chatWindow").css({"color":"red","border":"2px solid red", "height": "16px"});
		
		//closest(".msgWindow ul").style.display = 'none';
												   
	});

	//$('button#inviteVisitorToConvesation').click(function dealercommandVisitor(){

	$('button#showThisVehicle').click(function showVehicleToCustomer(){
			
			//debugger; 
			
			var empty = '';

			var chatddid = document.getElementById('chatdid').value;
			var visitor_id = document.getElementById("chattingVisitorid").value;

			
			var chattingVisitorid = document.getElementById("chattingVisitorid").value;
			var chattingVisitorToken = document.getElementById("chattingVisitorToken").value;

			var attractVisitorCmd = 'VEHICLE';

			var thisvehicleID = document.getElementById("thisvehicleID");
   			var cust_vehicle_id = thisvehicleID.options[thisvehicleID.selectedIndex].value;
			var vehicle_txt = thisvehicleID.options[thisvehicleID.selectedIndex].text;
			
			var mydealer_chatname = document.getElementById("mydealer_chatname").value;

			
			//$('#last-msg')
			$('#chatWindow_Container').animate({scrollTop: $('#chatWindow_Container')[0].scrollHeight});
			
			var vehicleMsg = 'Please Take A Look At This vehicle '+vehicle_txt;
			
			

			//document.getElementById("thisvehicleID").value=cust_vehicle_id;
			//document.getElementById("li#last-msg").innerHTML=cust_vehicle_id;
			document.getElementById("last-msg").innerHTML=vehicle_txt;
			//alert(cust_vehicle_id);

			$.post('ajaxEnviro/send-dealercommand.php', {chatddid: chatddid, chattingVisitorid: chattingVisitorid, attractVisitorCmd: attractVisitorCmd, cust_vehicle_id: cust_vehicle_id, vehicleMsg: vehicleMsg, mydealer_chatname: mydealer_chatname }, 
								   
		   function(result) {
			$('#last-msg').html(result).show();
			
		   });
			
			/*
			
			$.post('ajaxEnviro/send-visitorsession.php', {chatdid: chatddid, chattingVisitorid: chattingVisitorid, chattingVisitorToken: chattingVisitorToken, quedMsg: quedMsg, mydealer_chatname: mydealer_chatname }, 
							   
		   function(result) {
			$('#last-msg').html(result).show();
			
		   });
			
			*/
			
			
			


	});
	
	
	$('#thisvehicleID').change(function hideMsgWindow(){
		
		
		//#txtvPhotoHintt
			var thisvehicleID = document.getElementById("thisvehicleID");
   			var cust_vehicle_id = thisvehicleID.options[thisvehicleID.selectedIndex].value;

		//alert(cust_vehicle_id);
		$.get('ajaxEnviro/ajax_getvehicleleadphoto.php', {cust_vehicle_id: cust_vehicle_id }, 
							   
						   function(result) {
							$('#txtvPhotoHintt').html(result).show();
							
						   });

		
		
	});
	








	done();

}); //End Document Ready














function done(){
			setTimeout( function() {
			updates();
			liveVisitors();
			dealerNewVisitor();
			done();
			}, 3500);
}


function updates() {


	var chatddid = document.getElementById('chatdid').value;

	var chattingVisitorid = document.getElementById("chattingVisitorid").value;
	
	//$('#chatWindow').empty();

		$.post( "ajaxEnviro/fetch-chatsession.php", {chatdid: chatddid, chattingVisitorid: chattingVisitorid }, 

	   function(result) {
		$("ul#chatWindow").html(result).show();
		
	   });


	visitiorCredentials();

}

function liveVisitors(){
	var chatddid = document.getElementById('chatdid').value;

	$.post('ajaxEnviro/fetch-visitorsession.php', {chatdid: chatddid }, 
	   
	   
	   function(result) {
		$('ul#openChats').html(result).show();
		
	   });

		

	
}

function dealersLastVisitor(){
					var chatddid = document.getElementById('chatdid').value;
					
					var chattingVisitorid = document.getElementById("chattingVisitorid").value;
				
					//var chattingVisitorToken = document.getElementById("chattingVisitorToken").value;
					
					$.post('ajaxEnviro/fetch-visitorsession.php', {chatdid: chatddid, chattingVisitorid: chattingVisitorid }, 
					   
					   
					   function(result) {
						//$('ul#openChats').html(result).show();
						
					   });
}

function dealerNewVisitor(){

	//debugger;

	
	
	
	$('#openChats li.NEWVISITOR').each(function announceNewVisitor() {
	
	
	var NEWVISITOR = $(this).closest("li").attr('id');
	
	console.log('Searching for New Visitor..'+NEWVISITOR);
	
	
	var chatddid = document.getElementById('chatdid').value;
	
	if(NEWVISITOR){newvisitor.playclip();}
	
	//var chattingVisitorid = document.getElementById("chattingVisitorid").value;

		$.post( "ajaxEnviro/set-newvisitor.php", {chatdid: chatddid, NEWVISITOR: NEWVISITOR }, 

	   function(result) {
		//$("ul#chatWindow").html(result).show();
		
		
	   });
	
	
	
	
					
				});
	

}


function visitiorCredentials() {


	var chatddid = document.getElementById('chatdid').value;

	var chattingVisitorid = document.getElementById("chattingVisitorid").value;

		$.post( "ajaxEnviro/fetch-visitorcredentials.php", {chatdid: chatddid, chattingVisitorid: chattingVisitorid }, 

	   function(result) {
		$("#visitorCredentials").html(result).show();
		
	   });




}





function promptName()
{
var x;
var myname;
var empty = "";
//debugger;
//var myvisitor_name = document.getElementById("myvisitor_name").value;

//var mydealer_chatname = $('#mydealer_chatname').html();

var mydealer_chatname = document.getElementById("mydealer_chatname").value;

	if(mydealer_chatname == empty){

			var person = prompt("Please Enter The Name You Will Chat With","Internet Manager");
			
			if (person!=null)
			  {
			  x = "Hello " + person + "! How are you today?";
			  myname = "" + person + "";
			  
			  document.getElementById("mydealer_chatname").value=myname;
			  document.getElementById("x_name").innerHTML=x;
			  }
	}
}




function clearVisitorInfo(){
	
		
			//alert(Chatstatus);
		document.getElementById("dealerCommands").selectedIndex = '';
		//$("#attractVisitorCmd").empty(1000);
		


	
}



function turnonChat(){
			var Chatstatus = $('#dealerChatLight').html();
			//alert(Chatstatus);
		$("#chat_ticker").toggle(1000);
		


	
}



$('#lleft').live('click' , function(){
    $('.scrollable').scrollLeft(1000)

})

$('#rright').live('click' , function(){
    $('.scrollable').scrollLeft(-1000)

})







  window.onbeforeunload = confirmExit;
  
  function confirmExit()
  {

	//return "Are You Sure You Want To Leave Your Unsaved Work?";

	
  }







