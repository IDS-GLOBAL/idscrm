
$(document).ready(function(){
	






			
				// Only Allows Numbers only
				function validate(evt) {
				  var theEvent = evt || window.event;
				  var key = theEvent.keyCode || theEvent.which;
				  key = String.fromCharCode( key );
				  var regex = /[0-9]|\./;
				  if( !regex.test(key) ) {
					theEvent.returnValue = false;
					if(theEvent.preventDefault) theEvent.preventDefault();
				  }
				}
	
	
	
	$('#dept_name').bind('keyup change', function makedepturl(){
						
						var empty = "";
						var underscore = "_";

						var enterlink =	document.getElementById("dept_name").value;
						var enteredlink = enterlink.toLowerCase();
						
						var fixedlink = enteredlink.replace(/\b \b/g, empty);
						
						//alert(fixedlink);
						
						document.getElementById('dept_link').value = fixedlink;
						
						//alert(enterlink);
						
		
	});






$('button#update_department').click(function(){

			var dept_id = $('input#dept_id').val();

			var dept_did = $('input#thisdid').val();
			
			var slct_dept_mgr_id = document.getElementById("dept_mgr_id");
			var slct_dept_mgr_txt = slct_dept_mgr_id.options[slct_dept_mgr_id.selectedIndex].text;
			var dept_mgr_id = slct_dept_mgr_id.options[slct_dept_mgr_id.selectedIndex].value;
			
			var slct_dept_status = document.getElementById("dept_status");
			var slct_dept_status_txt = slct_dept_status.options[slct_dept_status.selectedIndex].text;
			var dept_status = slct_dept_status.options[slct_dept_status.selectedIndex].value;
				
			var dept_link = $('input#dept_link').val();

			
			var dept_name = $('input#dept_name').val();
			var dept_phoneno = $('input#dept_phoneno').val();
			var dept_address = $('input#dept_address').val();


			//Vlidation
			
			var name_length = dept_name.length;
			
			
			if(dept_name == 0){
				alert('Sorry Your Department Name is not valid ');
				return false;	
			} else if(name_length < 3){
				alert('Please Insert More Than 3 Characters');
				return false;
			}else{}
			
			
			if(!dept_phoneno){
				alert('Phone Number Is Blank');
			}



			if(!dept_address){
				alert('Please Enter Address');
			}



			var slct_monday_open = document.getElementById("monday_open");
			var dlr_monday_open_txt = slct_monday_open.options[slct_monday_open.selectedIndex].text;
			var monday_open = slct_monday_open.options[slct_monday_open.selectedIndex].value;

			var slct_monday_closed = document.getElementById("monday_closed");
			var dlr_monday_closed_txt = slct_monday_closed.options[slct_monday_closed.selectedIndex].text;
			var monday_closed = slct_monday_closed.options[slct_monday_closed.selectedIndex].value;

			var slct_tuesday_closed = document.getElementById("tuesday_closed");
			var dlr_tuesday_closed_txt = slct_tuesday_closed.options[slct_tuesday_closed.selectedIndex].text;
			var tuesday_closed = slct_tuesday_closed.options[slct_tuesday_closed.selectedIndex].value;

			var slct_tuesday_open = document.getElementById("tuesday_open");
			var dlr_tuesday_open_txt = slct_tuesday_open.options[slct_tuesday_open.selectedIndex].text;
			var tuesday_open = slct_tuesday_open.options[slct_tuesday_open.selectedIndex].value;

			var slct_wednesday_open = document.getElementById("wednesday_open");
			var dlr_wednesday_open_txt = slct_wednesday_open.options[slct_wednesday_open.selectedIndex].text;
			var wednesday_open = slct_wednesday_open.options[slct_wednesday_open.selectedIndex].value;

			var slct_wednesday_closed = document.getElementById("wednesday_closed");
			var dlr_wednesday_closed_txt = slct_wednesday_closed.options[slct_wednesday_closed.selectedIndex].text;
			var wednesday_closed = slct_wednesday_closed.options[slct_wednesday_closed.selectedIndex].value;

			var slct_thursday_open = document.getElementById("thursday_open");
			var dlr_thursday_open_txt = slct_thursday_open.options[slct_thursday_open.selectedIndex].text;
			var thursday_open = slct_thursday_open.options[slct_thursday_open.selectedIndex].value;

			var slct_thursday_closed = document.getElementById("thursday_closed");
			var dlr_thursday_closed_txt = slct_thursday_closed.options[slct_thursday_closed.selectedIndex].text;
			var thursday_closed = slct_thursday_closed.options[slct_thursday_closed.selectedIndex].value;

			var slct_friday_open = document.getElementById("friday_open");
			var dlr_friday_open_txt = slct_friday_open.options[slct_friday_open.selectedIndex].text;
			var friday_open = slct_friday_open.options[slct_friday_open.selectedIndex].value;

			var slct_friday_closed = document.getElementById("friday_closed");
			var dlr_friday_closed_txt = slct_friday_closed.options[slct_friday_closed.selectedIndex].text;
			var friday_closed = slct_friday_closed.options[slct_friday_closed.selectedIndex].value;

			var slct_saturday_open = document.getElementById("saturday_open");
			var dlr_saturday_open_txt = slct_saturday_open.options[slct_saturday_open.selectedIndex].text;
			var saturday_open = slct_saturday_open.options[slct_saturday_open.selectedIndex].value;

			var slct_saturday_closed = document.getElementById("saturday_closed");
			var dlr_saturday_closed_txt = slct_saturday_closed.options[slct_saturday_closed.selectedIndex].text;
			var saturday_closed = slct_saturday_closed.options[slct_saturday_closed.selectedIndex].value;

			var slct_sunday_open = document.getElementById("sunday_open");
			var slct_sunday_open_txt = slct_sunday_open.options[slct_sunday_open.selectedIndex].text;
			var sunday_open = slct_sunday_open.options[slct_sunday_open.selectedIndex].value;

			var slct_sunday_closed = document.getElementById("sunday_closed");
			var slct_sunday_closed_txt = slct_sunday_closed.options[slct_sunday_closed.selectedIndex].text;
			var sunday_closed = slct_sunday_closed.options[slct_sunday_closed.selectedIndex].value;


		
	


var new_yearseve_comments = $('input#new_yearseve_comments').val();

var slct_new_yearseve_open = document.getElementById("new_yearseve_open");
var new_yearseve_open = slct_new_yearseve_open.options[slct_new_yearseve_open.selectedIndex].value;

var slct_new_yearseve_close = document.getElementById("new_yearseve_close");
var new_yearseve_close  = slct_new_yearseve_close.options[slct_new_yearseve_close.selectedIndex].value;


var new_yearsday_comments  = $('input#new_yearsday_comments').val();

var slct_new_yearsday_open = document.getElementById("new_yearsday_open");
var new_yearsday_open = slct_new_yearsday_open.options[slct_new_yearsday_open.selectedIndex].value;

var slct_new_yearsday_close = document.getElementById("new_yearsday_close");
var new_yearsday_close  = slct_new_yearsday_close.options[slct_new_yearsday_close.selectedIndex].value;


var independence_day_comments  = $('input#independence_day_comments').val();


var slct_independence_day_open  = document.getElementById("independence_day_open");
var independence_day_open  = slct_independence_day_open.options[slct_independence_day_open.selectedIndex].value


var slct_independence_day_close  = document.getElementById("independence_day_close");
var independence_day_close  = slct_independence_day_close.options[slct_independence_day_close.selectedIndex].value







var veterans_day_comments  = $('input#veterans_day_comments').val();

var slct_veterans_day_open  = document.getElementById("veterans_day_open");
var veterans_day_open  = slct_veterans_day_open.options[slct_veterans_day_open.selectedIndex].value

var slct_veterans_day_close  = document.getElementById("veterans_day_close");
var veterans_day_close  = slct_veterans_day_close.options[slct_veterans_day_close.selectedIndex].value


var blackfriday_comments  = $('input#blackfriday_comments').val();


var slct_blackfriday_open  = document.getElementById("blackfriday_open");
var blackfriday_open  = slct_blackfriday_open.options[slct_blackfriday_open.selectedIndex].value

var slct_blackfriday_close  = document.getElementById("blackfriday_close");
var blackfriday_close  = slct_blackfriday_close.options[slct_blackfriday_close.selectedIndex].value


var thanksgiving_comments  = $('input#thanksgiving_comments').val();

var slct_thanksgiving_open  = document.getElementById("thanksgiving_open");
var thanksgiving_open  = slct_thanksgiving_open.options[slct_thanksgiving_open.selectedIndex].value

var slct_thanksgiving_close  = document.getElementById("thanksgiving_close");
var thanksgiving_close  = slct_thanksgiving_close.options[slct_thanksgiving_close.selectedIndex].value


var christmas_eve_comments  = $('input#christmas_eve_comments').val();

var slct_christmas_eve_open  = document.getElementById("christmas_eve_open");
var christmas_eve_open  = slct_christmas_eve_open.options[slct_christmas_eve_open.selectedIndex].value;


var slct_christmas_eve_close  = document.getElementById("christmas_eve_close");
var christmas_eve_close  = slct_christmas_eve_close.options[slct_christmas_eve_close.selectedIndex].value;



var christmas_day_comments =  $('input#christmas_day_comments').val();

var slct_christmas_day_open  = document.getElementById("christmas_day_open");
var christmas_day_open  = slct_christmas_day_open.options[slct_christmas_day_open.selectedIndex].value;

var slct_christmas_day_close  = document.getElementById("christmas_day_close");
var christmas_day_close  = slct_christmas_day_close.options[slct_christmas_day_close.selectedIndex].value;



$.post('script_update_department.php',{dept_id: dept_id, dept_did: dept_did, dept_mgr_id: dept_mgr_id, dept_status: dept_status, dept_link: dept_link, dept_name: dept_name, dept_phoneno: dept_phoneno, dept_address: dept_address, monday_open: monday_open, monday_closed: monday_closed, tuesday_open: tuesday_open, tuesday_closed: tuesday_closed, wednesday_open: wednesday_open, wednesday_closed: wednesday_closed, thursday_open: thursday_open, thursday_closed: thursday_closed, friday_open: friday_open, friday_closed: friday_closed, saturday_open: saturday_open, saturday_closed: saturday_closed, sunday_open: sunday_open, sunday_closed: sunday_closed, new_yearseve_comments: new_yearseve_comments, new_yearseve_open: new_yearseve_open, new_yearseve_close: new_yearseve_close, new_yearsday_comments: new_yearsday_comments, new_yearsday_open: new_yearsday_open, new_yearsday_close: new_yearsday_close, independence_day_comments: independence_day_comments, independence_day_open: independence_day_open, independence_day_close: independence_day_close, veterans_day_comments: veterans_day_comments,  veterans_day_open: veterans_day_open, veterans_day_close: veterans_day_close, blackfriday_comments: blackfriday_comments, blackfriday_open: blackfriday_open, blackfriday_close: blackfriday_close, thanksgiving_comments: thanksgiving_comments, thanksgiving_open: thanksgiving_open, thanksgiving_close: thanksgiving_close, christmas_eve_comments: christmas_eve_comments, christmas_eve_open: christmas_eve_open, christmas_eve_close: christmas_eve_close, christmas_day_comments: christmas_day_comments, christmas_day_open: christmas_day_open, christmas_eve_close: christmas_eve_close, christmas_day_close: christmas_day_close}, function(data){


	console.log(data);


});

				window.location.replace('departments.php');

				



});







});