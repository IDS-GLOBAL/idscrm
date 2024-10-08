<?php
//===========================================================================
//     This program may be modified or redistributed
//     under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
require_once("visitor_common.php");

if(!(isset($UNTRUSTED['cleartonow']))){ $UNTRUSTED['cleartonow'] = ""; } 
if(empty($UNTRUSTED['offset'])){ $UNTRUSTED['offset'] = ""; }
if(empty($UNTRUSTED['department'])){ $UNTRUSTED['department'] = ""; }
if(empty($UNTRUSTED['printit'])){ $UNTRUSTED['printit'] = ""; } 
if(empty($UNTRUSTED['timeof'])){ $UNTRUSTED['timeof'] = 0; } 
if(empty($UNTRUSTED['tab'])){ $UNTRUSTED['tab'] = "";  }

$query = "SELECT recno,topbackground,theme,colorscheme FROM livehelp_departments ";
if(!(empty($UNTRUSTED['department']))){ 
	$query .= " WHERE recno=". intval($UNTRUSTED['department']); 
}
$data_d = $mydatabase->query($query);  
$department_a = $data_d->fetchRow(DB_FETCHMODE_ASSOC);
$department = $department_a['recno'];
$topbackground = $department_a['topbackground']; 
$colorscheme = $department_a['colorscheme']; 
$theme = $department_a['theme']; 
 
include("themes/$theme/theme-options.php");

$query = "SELECT user_id,onchannel,isnamed,username FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";	
$people = $mydatabase->query($query);
$people = $people->fetchRow(DB_FETCHMODE_ASSOC);
$myid = $people['user_id'];
$channel = $people['onchannel'];
$isnamed = $people['isnamed'];
$username = $people['username'];
  
?>
<html> 
<HEAD>
<title>User Chat XMLHTTP</title> 
<link title="new" rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" type="text/css" href="themes/<?php echo $theme; ?>/chatframe-css.php?department=<?php echo intval($UNTRUSTED['department']); ?>"   />	
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $lang['charset']; ?>" >
</HEAD>
<SCRIPT src="javascript/xmlhttp.js" type="text/javascript"></script> 
<SCRIPT type="text/javascript">  
function openwindow(mypage,myname) {
thiswindow = window.open(mypage,myname,'toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes');
thiswindow.focus();
}
 

<?php if($UNTRUSTED['cleartonow']==1){ ?>
	HTMLtimeof = <?php print date("YmdHis"); ?>;
 LAYERtimeof = <?php print date("YmdHis"); ?>;
<?php } else { ?>	
var HTMLtimeof = 0;
var LAYERtimeof = 0;
<?php } ?>

var whatissaid  = new Array(100);
var skipfocus = 0;

/**
  * parse the deliminated string of messages from XMLHttpRequest.
  * This will be converted to XML in next version of CSLH.
  *
  *@param string text to parse.
  */
function ExecRes(textstring){

	var chatelement = document.getElementById('currentchat'); 
  
  var messages=new Array();
  
  // prevent Null textstrings:
  textstring = textstring + " ok =1; ";
  try { eval(textstring); } catch(error4){}
  
	for (var i=0;i<messages.length;i++){	
    res_timeof = messages[i][0];
	  res_jsrn = messages[i][1];
	  res_typeof = messages[i][2];	  
    res_message = messages[i][3];    
    res_javascript = messages[i][4];    


    // is it defined:
    if (typeof chatelement!='undefined') { 
 
  	if(res_typeof=="HTML"){  
	    if( res_timeof>HTMLtimeof ){    
         try { chatelement.innerHTML = chatelement.innerHTML + unescape(res_message); }
         catch(fucken_IE) { }
         HTMLtimeof = res_timeof;
         whatissaid[res_jsrn] = 'nullstring';	     
         if(res_javascript!="")
           eval(res_javascript);
         update_typing();
         up();
       }
    }    
	  if(res_typeof=="LAYER"){  
	    if(res_timeof>LAYERtimeof){ 
       whatissaid[res_jsrn] = unescape(res_message);	
       LAYERtimeof = res_timeof;       
       update_typing();
     }
    } 
    
   }
	  if(res_typeof=="EXIT"){  
	     window.parent.location.replace("wentaway.php?department=<?php echo $department; ?>");
    } 
   
  }
}


/**
  * loads a XMLHTTP response into ExecRes
  *
  *@param string url to request
  *@see ExecRes()
  */ 
function update_xmlhttp() { 
	setTimeout('update_xmlhttp()',2100);
     // account for cache..
	   randu=Math.round(Math.random()*9999);
     sURL = 'xmlhttp.php';
     sPostData = 'whattodo=messages&rand='+ randu + '&HTML=' + HTMLtimeof + '&LAYER=' + LAYERtimeof;
     fullurl = 'xmlhttp.php?' + sPostData;
 
     //PostForm(sURL, sPostData)
     GETForm(fullurl);
} 
setTimeout('update_xmlhttp()',2100);
skipfocus = 1;
setTimeout('skipfocus=0;',2999);
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript"  type="text/javascript" SRC="javascript/xLayer.js"></SCRIPT> 
<SCRIPT LANGUAGE="JavaScript"  type="text/javascript" SRC="javascript/xBrowser.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript"  type="text/javascript" SRC="javascript/staticMenu.js"></SCRIPT> 
<script language="JavaScript"  type="text/javascript" src="javascript/dynapi/js/dynlayer.js"></script>
<SCRIPT LANGUAGE="JavaScript"  type="text/javascript" > 
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
W3C = (document.getElementById) ? 1 : 0;


setTimeout('up();',1000); 
 
   	              
function up(){
  scroll(1,10000000);  
}

myBrowser = new xBrowser();
skipfocus = 1;     
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
W3C = (document.getElementById) ? 1 : 0;	
 
starttyping_layer_exists = false;
var whatissaid  = new Array(100);
for(i=0;i<100;i++){
  whatissaid[i] = 'nullstring';
}

// start up the is typing layer... 
//--------------------------------------------------------------          
function starttyping(){           
      if (IE4){
    	       docWidth = document.body.clientWidth;
 	    } else {
 	       docWidth = window.innerWidth;
	    }

	     myxvar2 = 0;

      istyping_Layer = new DynLayer('UserIsTypingDiv');                     
 	    CreateStaticMenu2("UserIsTypingDiv",  myxvar2, 5); 
      starttyping_layer_exists = true;
}

// update the istyping layer.
//---------------------------------------------------------------
function update_typing(){
  if(starttyping_layer_exists == true){     	              
    ouputtext = "";
    foundtext = 0;
    for(i=0;i<100;i++){
      if( (whatissaid[i]!='nullstring') && (whatissaid[i]!='nullstring ')){
         ouputtext = ouputtext + whatissaid[i];
         foundtext = 1;
      }
    }
    if(foundtext == 1){
    	fulloutput = '<TABLE BORDER=0 WIDTH=300><TR BGCOLOR=#000000><TD><TABLE BORDER=0 WIDTH=100% CELLPADDING=0 CELLSPACING=0 BORDER=0 background=images/<?php echo $colorscheme; ?>/botbg.gif><TR><TD width=7><img src=images/blank.gif width=7 height=90></TD><TD valign=top><table width=300 background=images/<?php echo $colorscheme; ?>/botbg.gif><tr><td width=95%> &nbsp; </td><td width=5% align=right><a href=javascript:istyping_Layer.hide();><img src=themes/<?php echo $theme; ?>/exit.gif border=0></a></td></tr></table><img src=images/blank.gif width=300 height=1><br>' + ouputtext + '</TD></TR></TABLE></TD></TR></TABLE>';
        istyping_Layer.show();
    	istyping_Layer.write(fulloutput);
    } else {
    	istyping_Layer.hide();
    }
  }	
}
 
 setTimeout('starttyping()',5000);	        
setTimeout('start()',1000);

function delay(gap){ /* gap is in millisecs */
 var then,now; then=new Date().getTime();
 now=then;
 while((now-then)<gap){  now=new Date().getTime();}
}
function start() 
{       	
	if (IE4){
	  docWidth = document.body.clientWidth;
	} else {
	  docWidth = window.innerWidth;
	}
	myxvar = docWidth - 300;
	//if (myxvar < 5){ 
	  myxvar = 0;
	//}
	CreateStaticMenu("MenuDiv",  myxvar, 1);  

} 

function moveto(myblock,x,y)
{  
	myblock.xpos = x
	myblock.ypos = y
	myblock.left = myblock.xpos
	myblock.top = myblock.ypos
}
 
function printit(){
   url = 'user_chat_xmlhttp.php?offset=2&printit=Y&department=<?php echo $department; ?>&tab=<?php echo $UNTRUSTED['tab']; ?>';
   window.open(url, 'chat54087', 'width=572,height=320,menubar=yes,scrollbars=1,resizable=1');	
}
</SCRIPT>
</HEAD>
 
<body marginheight=0 marginwidth=0 leftmargin=0 topmargin=0>
<div id="myChatWindow">
<DIV ID="UserIsTypingDiv" STYLE="position: absolute; z-index: 20; visibility: hidden; top: 0px; left: 0px;"></DIV>
 
<DIV id="MenuDiv" STYLE="position:absolute;left:0;top:10;width:95%;"> 
  <DIV STYLE="float:right;"> 
    
    <table><tr><td valign=top><a href=javascript:window.print()><img src=themes/<?php echo $theme; ?>/print.gif width=25 height=25 border=0  Alt="Print"></a>&nbsp;&nbsp;<a href=user_chat_xmlhttp.php?department=<?php echo $department; ?> ><img src=themes/<?php echo $theme; ?>/refresh.gif width=25 height=25 border=0  Alt="Refresh"></a>&nbsp;&nbsp;<a href=user_chat_xmlhttp.php?cleartonow=1&department=<?php echo $department; ?>><img src=themes/<?php echo $theme; ?>/clear.gif width=25 height=25 border=0  Alt="Clear"></a></td></tr></table>   
        
   </DIV>
</DIV>

<pre>


























</pre>
<span id="currentchat"> </span>
</div>
</body> 
</html> 