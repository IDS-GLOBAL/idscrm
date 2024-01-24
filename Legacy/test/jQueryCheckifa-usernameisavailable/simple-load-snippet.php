<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-2.0.0.js"></script>

<script type="text/javascript">
$(document).ready(function() {

$('#feedback').load('check.php').show();
						   
});
</script>
</head>

<body>

	<form name="form">
    
    	Username: <br />
        <input type="text" id="username_input" name="username"> 
    
    
    </form>

<div id="feedback">In Here</div>

</body>
</html>