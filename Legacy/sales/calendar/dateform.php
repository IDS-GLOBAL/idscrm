<html>
<HEAD>

	<TITLE>JavaScript Toolbox - Calendar Popup To Select Date</TITLE>

	<SCRIPT LANGUAGE="JavaScript" SRC="mattkruse-date.php"></SCRIPT>

	<SCRIPT LANGUAGE="JavaScript">

	var cal = new CalendarPopup();

	</SCRIPT>

</HEAD>


<body>

<FORM NAME="example">

(View Source of this page to see the example code)<br>

<INPUT TYPE="text" NAME="date1" VALUE="" SIZE=25>

<A HREF="#"

   onClick="cal.select(document.forms['example'].date1,'anchor1','MM/dd/yyyy'); return false;"

   NAME="anchor1" ID="anchor1">select</A>

</FORM>

</body>
</html>