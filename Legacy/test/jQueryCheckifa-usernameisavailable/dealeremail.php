<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<!--script type="text/javascript" src="jquery-2.0.0.js"></script -->
<script type="text/javascript" src="jquery-1.3.2.js"></script>

<script type="text/javascript">
$(document).ready(function() {

$('#feedback').load('checkemail.php').show();

	$('#username_input').keyup(function() {
		
		$.post('check.php', {username: form.username.value }, 
			   
			   function(result) {
				$('#feedback').html(result).show();   
			   });								
	});
						   
});
</script>
</head>

<body>

	<form name="form">
    
    	Username: <br />
        <input type="text" id="username_input" name="username"> 
    
    
    </form>

<div id="feedback"></div>

</body>
</html>