// JavaScript Document
// http://eonasdan.github.io/bootstrap-datetimepicker/
// http://momentjs.com/docs/#/displaying/format/
$(document).ready(function(){


            var elem = document.querySelector('.js-chatstatus');
            var switchery = new Switchery(elem, { color: '#0F0' });

            var elem_2 = document.querySelector('.js-chatswitch');
            var switchery_2 = new Switchery(elem_2, { color: '#0F0' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#59C2F8' });

        

		
});

function validateEmail(email) {
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return re.test(email);
}