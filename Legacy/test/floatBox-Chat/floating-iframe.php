<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script type="text/javascript">

/***********************************************
* Floating Iframe script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

//Specify iframe to display. Change src and other attributes except "position" and "left/top":
var iframetag='<iframe id="masterdiv" src="http://www.idscrm.com" width="150px" height="150px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="1" scrolling="no" style="position: absolute; left: -500px; top: -500px;"></iframe>'

//specify x coordinates of iframe ("right" for right corner, or a pixel number (ie: "20px")):
var masterdivleft="10px"

//specify y coordinates of iframe ("bottom" for bottom of page, or a pixel number (ie: "20px")):
var masterdivtop="bottom"

var ie=(document.all || window.opera) && document.getElementById
var iebody=(document.compatMode=="CSS1Compat")? document.documentElement : document.body

if (ie)
document.write(iframetag)

function positionit(){
masterdivobj=document.getElementById("masterdiv")
var window_width=ie && !window.opera? iebody.clientWidth : window.innerWidth-20
window_height=ie && !window.opera? iebody.clientHeight : window.innerHeight
var dsocleft=ie? iebody.scrollLeft : pageXOffset
var masterdivwidth=masterdivobj.width
masterdivheight=masterdivobj.height
masterdivobj.style.left=(masterdivleft=="right")? window_width-masterdivwidth-20 : masterdivleft
setInterval("repositionit()", 100)
}

function repositionit(){
if (ie){
dsoctop=ie? iebody.scrollTop : pageYOffset
masterdivobj.style.top=(masterdivtop=="bottom")? window_height-masterdivheight-14+dsoctop : parseInt(masterdivtop)+dsoctop
}
}

if (window.attachEvent)
window.attachEvent("onload", positionit)

</script>
<script>
function closeiframe(){
parent.document.getElementById("masterdiv").style.display="none"
}
</script>

</head>

<body>

<a href="javascript:closeiframe()">Close iframe</a>
</body>
</html>