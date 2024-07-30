
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Farbtastic: jQuery color picker plug-in : &lt;default&gt;</title>
<script type='text/javascript' src='jquery.min.js'></script>
<script type='text/javascript' src='farbtastic.js'></script>
<link type='text/css' href='farbtastic.css' rel='stylesheet'/>
</head>

<body>
<script type="text/javascript">
$(document).ready(function() {

    		$('#demo').hide();

    		$('#picker').farbtastic('#color');

  		});
</script>
<h1>jQuery Color Picker: Farbtastic</h1>

		<div id="demo" style="color: red; font-size: 1.4em">jQuery.js is not present. You must install jQuery in this folder for the demo to work.</div>



		<form action="" style="width: 400px;">

  		<div class="form-item"><label for="color">Color:</label><input type="text" id="color" name="color" value="#123456" /></div>

			<div id="picker"></div>

		</form>

		<p>More info on <a href="http://www.acko.net/dev/farbtastic">Acko.net</a>.</p>

		<p>Created by <a href="http://www.acko.net/">Steven Wittens</a>.</p>
</body>
</html>