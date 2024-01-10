$(document).ready(function(){


			$('#vecolor').change(function getColore(){
			
				var ecolor = document.getElementById("vecolor");
				var vecolor = ecolor.options[ecolor.selectedIndex].text;
				
				document.getElementById("vecolor_txt").value = vecolor;


			 });


			$('#vicolor').change(function getColori(){
												   
				var icolor = document.getElementById("vicolor");
				var vicolor = icolor.options[icolor.selectedIndex].text;
				
			    document.getElementById("vicolor_txt").value = vicolor;
			
			 });


});
