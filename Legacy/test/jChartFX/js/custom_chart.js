// JavaScript Document


$(document).ready(function($){
 

     var chart1;        
     function loadChart()
     {        
          chart1 = new cfx.Chart();
          chart1.setGallery(cfx.Gallery.Pie);
          var divHolder = document.getElementById('ChartDiv');
          chart1.create(divHolder);
     }
	 
});
