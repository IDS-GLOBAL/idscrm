/*
 * beta version 0.0.2
 * Copyright (c) 2011  Eric Gerdes && Robert Campbell
 *  
 */
 //Setting some global variables
	var chatUser2 = "";
	var chatBoxID = "";
	var CSLHDept = "1";
	var GlobalJustify = "";
	var pingtimes = "12";  // we dont want to keep drawing data from people who open the page and then leave and go away for hours.
	var spanel_user = "old var";
  var tab_array = [];
  var tabsopen = 0;
  var maxtabs = 2;

	//Setup Socail Panel with bar and tabs
	document.write('<div id="socialpanel_bar" style="width: 140px;"></div>');
	//Write logo -- removed because it was drawing the visitors attention to it rather then clicking to chat.
	document.write('<div id="sp_logo"> </div>');
	goTab();
	onlineTab();
	ResizeBar();
 
setTimeout('getSession()', 2000 );

	


	if(spanel_user!="Anonymous" && spanel_user!="") {
		setTimeout('Fetchdata()', 5000 );
	}


	//maintain relative size
	window.onresize = function(){
		ResizeBar();
    }
	function ResizeBar() {
		var bar_width=document.getElementById("socialpanel_bar");
		bar_width.style.width = (document.body.clientWidth - 30) + "px" 
	}
	window.onscroll = function() {
		var bar_width=document.getElementById("socialpanel_bar");
		bar_width.style.width = (document.body.clientWidth - 30) + "px" 
		bar_width.style.bottom = "0px";
	}
	
	
	// Function that calls for the data over and over again:
function Fetchdata(){
 
	if (pingtimes>0){
		pingtimes = pingtimes -1; 
		getData(); 
	  setTimeout('Fetchdata()', 10000 );
	}
}

function opencontactform(contactid){
	  openLiveHelp(contactid);
}

	//Function for first tab "SocailBar" tab (like a start button or menu area)
	function goTab(){

		var divTag = document.createElement("span");
		    divTag.id = "goTab";             
        divTag.setAttribute("align","center");             
        divTag.style.margin = "0px auto";             
        divTag.className ="gotab";        
		var span_id = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
        divTag.innerHTML = "<span onClick='createPop(\"\", \"goTab\", \"\", \"Social Panel\", \"goTab\",\""+CSLHDept+"\");' style='width:100%;'> </span>";			           
        document.getElementById("socialpanel_bar").appendChild(divTag);
	}

	function tabIcon(html){

		var divTag = document.createElement("span");
		divTag.id = "tabIcons";
             
        divTag.setAttribute("align","center");
             
        divTag.style.margin = "0px auto";
             
        divTag.className ="tabicons";
        
		var span_id = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );

        divTag.innerHTML = html;
			           
        document.getElementById("socialpanel_bar").appendChild(divTag);
	}



	//Function to setup online/offline tab
	function onlineTab(){
		var divTag = document.createElement("span");
		divTag.id = "onlineTab";
             
        divTag.setAttribute("align","center");
             
        divTag.style.margin = "0px auto";
             
        divTag.className ="bartab";

		//phpbb code online
		//if(spanel_user!="Anonymous") {
	        divTag.innerHTML = "<span><center>Loading...</center></span>";
		//}else{
	  //      divTag.innerHTML = "<a href='ucp.php?mode=login'><center>Login</center></a>";
		//}	
		
        document.getElementById("socialpanel_bar").appendChild(divTag);
	}
 

function array_remove ( inputArr , removeme) {
  var newtab_array = [];
    for (i=0; i < inputArr.length; i++){
      if(inputArr[i]!= removeme){ array_push(newtab_array,inputArr[i]); }
    }
  return newtab_array;
}

function array_push ( inputArr ) {

    var i=0, pr = '', argv = arguments, argc = argv.length,            allDigits = /^\d$/, size = 0, highestIdx = 0, len = 0;
    if (inputArr.hasOwnProperty('length')) {
        for (i=1; i < argc; i++){
            inputArr[inputArr.length] = argv[i];
        }        return inputArr.length;
    }
    
    // Associative (object)
    for (pr in inputArr) {        if (inputArr.hasOwnProperty(pr)) {
            ++len;
            if (pr.search(allDigits) !== -1) {
                size = parseInt(pr, 10);
                highestIdx = size > highestIdx ? size : highestIdx;            }
        }
    }
    for (i=1; i < argc; i++){
        inputArr[++highestIdx] = argv[i];    }
    return len + i - 1;
}

function in_array (needle, haystack, argStrict) {

    var key = '', strict = !!argStrict; 
    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {                return true;
            }
        }
    }
     return false;
}


	//Function to dynamically create other tabs
	function createTab(TabTitle, OpenPop) {
      var divTag = document.createElement("span");
		  var span_id = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
        divTag.id = span_id;
             
	//TODO: create function to check open tabTitles to avoid opening duplicates
   if (!(in_array(TabTitle, tab_array))){
       array_push(tab_array,TabTitle);

        divTag.setAttribute("align","center");
             
        divTag.style.margin = "0px auto";
             
        divTag.className ="bartab";
             			           
        document.getElementById("socialpanel_bar").appendChild(divTag);
		var new_span_id = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
		document.getElementById(span_id).innerHTML = "<span style='float:left;' onClick='createPop(\"New\", \""+span_id+"\", \""+new_span_id+"\", \""+ TabTitle +"\", \"dynamicPop\",\""+ CSLHDept +"\");'>" + TabTitle + "</span>  <a onClick=\"removeElement('"+span_id+"', '"+TabTitle+"');\" style='float:right; padding-right:5px;'>X</a>";
	
		if(OpenPop=="open") {
			createPop("New", span_id, new_span_id, TabTitle, "dynamicPop",CSLHDept)

		}

		//Make tab blink on open
		$(divTag).fadeIn(400).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150);

		//NEW: set session span_id TabTitle Open
		$.post(CSLHDir + "sp_receive.php", { func: "sessionSet", tabID: span_id, tabTitle: TabTitle});
		//alert(span_id + "-" + TabTitle);

    }
	}

	//function to create popups menus over tabs
	function createPop(popTitle, Opener, span_id, TabTitle, getFunc,CSLHDept) {
	
		var span_id = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
		var span_id2 = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
		var span_id3 = (String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))+String.fromCharCode(97 + Math.round(Math.random() * 25))   );
		
		//This is where we should close all other popups before opening others.
		removePops();

		if(document.getElementById(span_id)) {
			//Keep from opening a duplicate
		}else{
			var indexOfEl = getIndex("socialpanel_bar", Opener);
			var OpenerObj = document.getElementById("socialpanel_bar").childNodes[indexOfEl];
			var leftPop = ObjectLeft(OpenerObj);
			var rightPop = ObjectRight(OpenerObj);
		    var divTag = document.createElement("div");

			
			var tabHTML = document.getElementById(Opener).innerHTML;
			//alert(tabHTML);
			document.getElementById(Opener).innerHTML = "<center>Loading...</center>";
                //alert (getFunc);
			divTag.id = span_id;
			$.post(CSLHDir + "sp_receive.php", { func: getFunc, pop: span_id, tab: span_id2 , ChatBoxID: span_id3, leftTab: leftPop, rightTab: rightPop, spanel_user: spanel_user, tabTitle: TabTitle, cslhDept: CSLHDept},
			  function(data){
				 
				//create matching tab
				var divTag2 = document.createElement("div");
				divTag2.id = span_id2;
				
				divTag2.setAttribute("align","center");
					 
				divTag2.style.bottom = "0px";
				divTag2.style.border = "1px solid";
				divTag2.style.width = OpenerObj.style.width;

				if(data.justify == "right") {
					divTag2.style.right = (rightPop -132) + "px";
					if(isIE()) {
						divTag2.style.right = (rightPop -122) + "px";
					}
				}else{
					divTag2.style.left = (leftPop + 1) + "px";
				}
				
				divTag2.className ="bartabPop";
				
				if(getFunc != "goTab" && getFunc != "getBuddyList") {
				
					divTag2.innerHTML = "<span onClick='removePops();' style='cursor:pointer;'><span style='float:left;'><center>"+TabTitle+"</center></span><a onClick=\"removeElement('"+Opener+"', '"+TabTitle+"');\" style='float:right; padding-right:5px;'>X</a></span>";
				}else{
					divTag2.innerHTML = "<span onClick='removePops();' style='cursor:pointer;'>"+TabTitle+"</span>";
				}
				
				document.body.appendChild(divTag2);



				if(data.justify == "right") {
					divTag.style.right = data.rightPop + "px";
					if(isIE()){
						divTag.style.right = ((data.rightPop*1) + 10) + "px";
					}
				}else{
					divTag.style.left = data.leftPop + "px";
				}

		
				divTag.style.margin = "0px auto";
				divTag.style.bottom = "25px";
				divTag.style.border = "1px solid black";
				divTag.style.width = data.width + "px";
				//divTag.style.left = data.leftPop + "px";
				divTag.style.height = data.height;
				//divTag.style.position = "fixed";
				//divTag.style.overflow = "auto";
        
				divTag.className ="popupDiv";
				divTag.innerHTML = "<div class='popBar' onClick='removePops();' style='cursor:pointer;'><span>"+TabTitle+"</span><div class='popOut'><a href=javascript:popoutchat()><img src="+CSLHDir+"images/newwin.gif border=0 width=25 height=21></a></div><div class='popMin'></div></div>" + data.html
				$(divTag).fadeIn("fast");
				document.body.appendChild(divTag);
				if(getFunc == "dynamicPop") {
					//Loop refresh chat
					chatUser2 = TabTitle;
					chatBoxID = span_id3;
					var ChatLoop = setInterval("refreshChat(chatUser2, chatBoxID);", 5000);
				}
			document.getElementById(Opener).innerHTML = tabHTML;
			}, "json");
			//document.getElementById(span_id).scrollTop = document.getElementById(span_id).scrollHeight;

			
		}
	}

	
	function popoutchat(){
	  
	  openLiveHelp(CSLHDept);
	
}
	
	//Get index for childNode elements
	function removePops() {
		for(var index =0; index < document.body.childNodes.length; index++) {

			if(document.body.childNodes[index].className == "bartabPop") {
				//alert (document.body.childNodes[index].id);
				document.body.removeChild(document.body.childNodes[index]);
			}
			if(document.body.childNodes[index].className == "popupDiv") {
				//alert (document.body.childNodes[index].id);
				document.body.removeChild(document.body.childNodes[index]);
			}
		}
		$.post(CSLHDir + "sp_receive.php", { func: "removePopsSession"});
	}

	function getIndex(parent_id, child_id){
		var parent_obj = document.getElementById(parent_id);
		for ( var index = 0; index < parent_obj.childNodes.length; index++ ) {
			//alert(parent_obj.childNodes[index].id);
			if (parent_obj.childNodes[index].id == child_id)
			{
				return index;
			}
		}
		return -1;
	}
	//Get left position for popup placement relative to tabs
	function ObjectLeft(obj) {
		var curleft = 0;
	      if (obj.offsetParent) {
		        do {
			          curleft += obj.offsetLeft;
				} while (obj = obj.offsetParent);
		}
		return curleft;
	}
	function ObjectRight(obj) {
		var curright = 0;
	      if (obj.offsetParent) {
		        do {
			          curright += obj.offsetLeft;
				} while (obj = obj.offsetParent);
		}

		return (document.body.clientWidth - curright);
	}

	//Detect if browser is IE
	function isIE()
	{
	  return /msie/i.test(navigator.userAgent) && !/opera/i.test(navigator.userAgent);
	}


	//Function to remove elements such as dynamicly created tabs
	function removeElement(divNum, tabTitle) {
		$("#" + divNum).remove();
		//alert(divNum);
		array_remove ( tab_array , tabTitle);
		$.post(CSLHDir + "sp_receive.php", { func: "sessionKill", elementID:divNum, tabTitle:tabTitle});
	}
	
	function setStatus(status) {
		removePops();
		$.post(CSLHDir + "sp_receive.php", { func: "updateStatus", spanel_user: spanel_user, status: status.value},
			function(data){
				document.getElementById("onlineTab").innerHTML = "<span onClick='createPop(\"\", \"onlineTab\", \"\", \""+ status.value + "\", \"getBuddyList\",\""+CSLHDept+"\");',><center><img src=\"' + CSLHDir + 'images/lcff16.png\" />"+ status.value + "</center></span>";
		}, "json");
		Fetchdata();
	}

	function sendChat(e, text, user2, ChatBoxID) {
		var characterCode; //literal character code will be stored in this variable

		if(e && e.which){ //if which property of event object is supported (NN4)
			e = e
			characterCode = e.which //character code is contained in NN4's which property
		}else{
			e = event
			characterCode = e.keyCode //character code is contained in IE's keyCode property
		}
		
		//alert(e.shiftKey);
		if(characterCode == 13 && e.shiftKey == false){ //if generated character code is equal to ascii 13 (if enter key)
			$.post(CSLHDir + "sp_receive.php", { func: "sendChat", spanel_user: spanel_user, text: text.value, user2: user2});
			
			text.value="";
			refreshChat(user2, ChatBoxID);
		}
	}


	function clearChat(chatUser2,ChatBoxID) {
		//alert("Clear chat code to come");
		$.post(CSLHDir + "sp_receive.php", { func: "clearChat", spanel_user: spanel_user, user2: chatUser2});
		document.getElementById(ChatBoxID).innerHTML = "";
		refreshChat(user2, ChatBoxID);
	}

	function refreshChat(user2, ChatBoxID) {
		//spanel_user  ChatBoxID.id  user2
		if(document.getElementById(ChatBoxID) != null) {
			var OldChat = document.getElementById(ChatBoxID).innerHTML;
			$.post(CSLHDir + "sp_receive.php", { func: "getChat", spanel_user: spanel_user, user2: user2},
				function(data){
					if(data.newChat != "old") {
						//alert(data.newChat);
						//document.getElementById(ChatBoxID).innerHTML = "";
						//document.getElementById(ChatBoxID).scrollTop = 0;
						document.getElementById(ChatBoxID).innerHTML = data.html;
						//document.getElementById(ChatBoxID).scrollTop = document.getElementById(ChatBoxID).scrollHeight;
					}
					//document.getElementById(ChatBoxID).innerHTML = data.html;
					//alert(data.newChat);
			}, "json");

			//TODO: Setup so this is disabled when user is scrolling and react faster in IE
			//if (document.getElementById(ChatBoxID).scrollTop != document.getElementById(ChatBoxID).scrollHeight - 233)
			//{
			//	alert(document.getElementById(ChatBoxID).scrollTop +"--"+ document.getElementById(ChatBoxID).scrollHeight);
			//}
			//document.getElementById(ChatBoxID).scrollTop = document.getElementById(ChatBoxID).scrollHeight;
			$("#"+ChatBoxID).attr({ scrollTop: $("#"+ChatBoxID).attr("scrollHeight") });
		}
	}

	function getSession() {
		$.post(CSLHDir + "sp_receive.php", { func: "sessionGet"},
			  function(data){
			if(data.openPop == "goTab") {
				createPop("", "goTab", "", "Social Panel", "goTab",CSLHDept);
			}else if(data.openPop == "onlineTab") {
				createPop("", "onlineTab", "","Who's Online", "getBuddyList",CSLHDept);
			}

			var tabTitles = new Array();
			tabTitles= data.tab.split(",");
			for(var index =0; index < tabTitles.length; index++) {
				//alert(tabTitles[index]);
				if(tabTitles[index]!="" && tabTitles[index] != "undefined") {
					if(data.openPop == tabTitles[index]) {
						createTab(tabTitles[index], "open");
					}else{
						createTab(tabTitles[index], ""); 
					}
				}
			}
			//Show any openPop
			//alert(data.openPop);

		}, "json");
	}

	function getData() {
		$.post(CSLHDir + "sp_receive.php", { func: "updateBar", spanel_user: spanel_user},
			function(data){
				document.getElementById("onlineTab").innerHTML = "<span onClick='createPop(\"\", \"onlineTab\", \"\", \""+ data.status + "\", \"getBuddyList\",\""+CSLHDept+"\");'><center><img src=\"" + CSLHDir + "images/lcff16.png\" />"+ data.status + "</center></span>";
				
				if(data.tabsopen != tabsopen) { 
				   getSession();
				}
				
				//Checking for waiting				
				if(data.waiting != "") {
					createTab(data.waiting, "");
				}
				//alert(data.flashWho);
				if(data.flashWho != "") {
				//alert(data.flash);
					//Make tab blink on open
					$("#" + data.flash).fadeIn(400).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150).fadeOut(150).fadeIn(150);
					
					// Need to create tab if it doesn't exist.
					if (!(in_array(data.flashWho, tab_array))){
					  createTab(data.flashWho, "open");  
					}
				}
			}, "json");

		}
