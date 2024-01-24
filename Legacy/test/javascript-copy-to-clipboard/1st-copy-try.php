<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Copy and Paste</title>



<SCRIPT LANGUAGE="JavaScript">

function ClipBoard() 
{
holdtext.innerText = copytext.innerText;
Copied = holdtext.createTextRange();
Copied.execCommand("RemoveFormat");
Copied.execCommand("Copy");
}

</SCRIPT>
</head>

<body>


<SPAN ID="copytext" STYLE="height:150;width:162;background-color:pink">
This text will be copied onto the clipboard when you click the button below. Try it!
</SPAN>


<TEXTAREA ID="holdtext" STYLE="display:none;">
</TEXTAREA>

<BUTTON onClick="ClipBoard();">Copy to Clipboard</BUTTON>


</body>
</html>