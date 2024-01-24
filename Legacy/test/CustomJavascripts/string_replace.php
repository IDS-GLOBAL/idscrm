<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="string_replace.php.js"></script>
</head>

<body>
<p>Click the button to replace "Microsoft" with "W3Schools" in the paragraph below:</p>

<p id="demo">Visit Microsoft!</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction()
{
var str = document.getElementById("demo").innerHTML; 
var res = str.replace("Microsoft","W3Schools");
document.getElementById("demo").innerHTML=res;
}
</script>
</body>
</html>