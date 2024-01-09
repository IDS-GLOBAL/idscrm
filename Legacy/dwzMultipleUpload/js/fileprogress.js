/*
	A simple class for displaying file information and progress
	Note: This is a demonstration only and not part of SWFUpload.
	Note: Some have had problems adapting this class in IE7. It may not be suitable for your application.
*/

// Constructor
// file is a SWFUpload file object
// targetID is the HTML element id attribute that the FileProgress HTML structure will be added to.
// Instantiating a new FileProgress object with an existing file will reuse/update the existing DOM elements
function FileProgress(file, targetID) {
	this.fileProgressID = file.id;

	this.opacity = 100;
	this.height = 0;
	
	this.fileProgressWrapper = document.getElementById(this.fileProgressID);
	
	var instance = targetID.substring(targetID.lastIndexOf("_") + 1)
	var swf = dwzGetSwf(instance)
			
	if (!this.fileProgressWrapper) {
		
		this.fileProgressWrapper = document.createElement("div");
		this.fileProgressWrapper.id = this.fileProgressID;
		
		this.fileProgressElement = document.createElement("div");
		this.fileProgressElement.className = "fileQueue";
		this.fileProgressElement.title = file.name
		this.fileProgressElement.instance = instance

		var fileQueueName = document.createElement("div");
		fileQueueName.className = "fileQueueName"
		fileQueueName.appendChild(document.createTextNode(file.name))

		var fileQueueStatus = document.createElement("div");
		fileQueueStatus.className = "fileQueueStatus"
		var status = "Pending...";
		switch(file.filestatus){
			case -1:
				status = "Pending..."
				break;
			case -2:
				status = "In progress"
				break;
			case -3:
				status = "Error"
				break;
			case -4:
				status = "Completes"
				break;
			case -5:
				status = "Cancelled"
				break;
		}
		fileQueueStatus.appendChild(document.createTextNode(status))

		var fileQueueProgress = document.createElement("div");
		fileQueueProgress.className = "fileQueueProgress"

		var fileQueueProgressImage = document.createElement("img");
		fileQueueProgressImage.src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/142.png" 
		fileQueueProgressImage.width = "16"
		fileQueueProgressImage.height = "16"
		fileQueueProgress.appendChild(fileQueueProgressImage)
		
		var fileQueueProgressBar = document.createElement("div");
		fileQueueProgressBar.className = "fileQueueProgressBar"
		var width = swf.customSettings.maxProgressBarFilesWidth.toString()
		fileQueueProgressBar.style.width = width + "px"
		
		var fileQueueProgressBarImage = document.createElement("img");
		fileQueueProgressBarImage.src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ProgressBar.gif" 
		fileQueueProgressBarImage.width = "2"
		fileQueueProgressBarImage.height="13"
		fileQueueProgressBar.appendChild(fileQueueProgressBarImage)
		
		var fileQueueRemove = document.createElement("div");
		fileQueueRemove.className = "fileQueueRemove"

		var fileQueueRemoveImage = document.createElement("img");
		fileQueueRemoveImage.src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ClearButton.png" 
		fileQueueRemoveImage.width = "16"
		fileQueueRemoveImage.height = "16"
		fileQueueRemoveImage.alt = swf.customSettings.customMessage.RemoveFromQueue
		fileQueueRemoveImage.title = swf.customSettings.customMessage.RemoveFromQueue
		fileQueueRemoveImage.border = "0"
		var link = document.createElement("a");
		link.href = "javascript:dwzRemoveFromQueue('" + instance + "','" + this.fileProgressID + "')"
		link.appendChild(fileQueueRemoveImage)
		fileQueueRemove.appendChild(link)
								
		/*
		var fileQueueError = document.createElement("div");
		fileQueueError.className = "fileQueueError"

		var fileQueueErrorImage = document.createElement("img");
		fileQueueErrorImage.src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ErrorButton.jpg" 
		fileQueueErrorImage.width = "16"
		fileQueueErrorImage.height = "16"
		//fileQueueErrorImage.style.display = "none"
		fileQueueErrorImage.alt = swf.customSettings.customMessage.ShowErrorMessage
		fileQueueErrorImage.title = swf.customSettings.customMessage.ShowErrorMessage
		fileQueueErrorImage.border = "0"
		fileQueueErrorImage.click = "javascript:dwzOpenError('" + instance + "','" + this.fileProgressID + "', this)"
		fileQueueError.appendChild(fileQueueErrorImage)
		
		var link = document.createElement("a");
		link.href = "javascript:dwzOpenError('" + instance + "','" + this.fileProgressID + "')"
		link.style.display = "none"
		link.dwzError = "vuoto"
		link.appendChild(fileQueueErrorImage)
		fileQueueError.appendChild(link)
		*/

		this.fileProgressElement.appendChild(fileQueueName)
		this.fileProgressElement.appendChild(fileQueueStatus)
		this.fileProgressElement.appendChild(fileQueueProgress)
		this.fileProgressElement.appendChild(fileQueueProgressBar)
		this.fileProgressElement.appendChild(fileQueueRemove)
		//this.fileProgressElement.appendChild(fileQueueError)
		
		this.fileProgressWrapper.appendChild(this.fileProgressElement);
		
		//alert(this.fileProgressWrapper.innerHTML)
		
		/*
		this.fileProgressElement = document.createElement("div");
		this.fileProgressElement.className = "progressContainer";

		var progressCancel = document.createElement("a");
		progressCancel.className = "progressCancel";
		progressCancel.href = "#";
		progressCancel.appendChild(document.createTextNode("cancel"));

		var progressText = document.createElement("div");
		progressText.className = "progressName";
		progressText.appendChild(document.createTextNode(file.name));

		var progressBar = document.createElement("div");
		progressBar.className = "progressBarInProgress";

		var progressStatus = document.createElement("div");
		progressStatus.className = "progressBarStatus";
		progressStatus.innerHTML = "&nbsp;";

		
		this.fileProgressElement.appendChild(progressCancel);
		this.fileProgressElement.appendChild(progressText);
		this.fileProgressElement.appendChild(progressStatus);
		this.fileProgressElement.appendChild(progressBar);
		*/	
				
		document.getElementById(targetID).appendChild(this.fileProgressWrapper);
						
	} else {
		
		this.fileProgressElement = this.fileProgressWrapper.firstChild;		
		this.reset();
	}

	//prompt("", document.getElementById(targetID).innerHTML)
	
	this.height = this.fileProgressWrapper.offsetHeight;
	this.appear()
	this.setTimer(null);

}

FileProgress.prototype.setTimer = function (timer) {
	this.fileProgressElement["FP_TIMER"] = timer;
};
FileProgress.prototype.getTimer = function (timer) {
	return this.fileProgressElement["FP_TIMER"] || null;
};

FileProgress.prototype.reset = function () {
		
	var instance = this.fileProgressElement.instance
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	
	
	/*
	this.fileProgressElement.className = "progressContainer";
	
	this.fileProgressElement.childNodes[2].innerHTML = "&nbsp;";
	this.fileProgressElement.childNodes[2].className = "progressBarStatus";
	
	this.fileProgressElement.childNodes[3].className = "progressBarInProgress";
	this.fileProgressElement.childNodes[3].style.width = "0%";
	*/
	
	this.appear();	
};

FileProgress.prototype.setProgress = function (percentage, file, bytesLoaded, bytesTotal) {
	
	var instance = this.fileProgressElement.instance
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	var progressWidth = "125"
	var progressImage = "142.png"

	if(percentage > 0){
		if(parseFloat(percentage) <= 6.5){
			progressImage = "143.png"
		}else if(parseFloat(percentage) <= 13.0){
			progressImage = "144.png"
		}else if(parseFloat(percentage) <= 19.5){
			progressImage = "145.png"
		}else if(parseFloat(percentage) <= 26.0){
			progressImage = "146.png"
		}else if(parseFloat(percentage) <= 32.5){
			progressImage = "147.png"
		}else if(parseFloat(percentage) <= 39.0){
			progressImage = "148.png"
		}else if(parseFloat(percentage) <= 45.5){
			progressImage = "149.png"
		}else if(parseFloat(percentage) <= 52.0){
			progressImage = "150.png"
		}else if(parseFloat(percentage) <= 58.5){
			progressImage = "151.png"
		}else if(parseFloat(percentage) <= 65.5){
			progressImage = "153.png"
		}else if(parseFloat(percentage) <= 71.5){
			progressImage = "154.png"
		}else if(parseFloat(percentage) <= 78.0){
			progressImage = "155.png"
		}else if(parseFloat(percentage) <= 84.5){
			progressImage = "156.png"
		}else if(parseFloat(percentage) <= 91.0){
			progressImage = "157.png"
		}else if(parseFloat(percentage) <= 100.0){
			progressImage = "158.png"
		}
	}
	
	var maxWidth = parseFloat(swf.customSettings.maxProgressBarFilesWidth)
	progressWidth = Math.floor(maxWidth / 100 * percentage).toString()
	
	if(swf.customSettings.graphicPath.toLowerCase() == "graphics/xp"){
		var numImages = Math.floor(maxWidth / 100 * percentage / 5)
		
		var imgHTML = ""
		for(var i=0; i<numImages; i++){
			imgHTML += "<img width='5' height='13' src='" + swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ProgressBar.gif' border='0' />"
		}
		this.fileProgressElement.childNodes[3].innerHTML = imgHTML
	}else{
		this.fileProgressElement.childNodes[3].childNodes[0].width = progressWidth
		if(percentage >= 100.0){
			this.fileProgressElement.childNodes[3].childNodes[0].src = this.fileProgressElement.childNodes[3].childNodes[0].src.replace(/ProgressBar\.gif/gi, "ProgressBarStopped.gif")
		}		
	}
	this.fileProgressElement.childNodes[2].childNodes[0].src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/" +  progressImage
	
	dwzUpdateStatus(instance)
	
	//this.fileProgressElement.className = "progressContainer green";
	//this.fileProgressElement.childNodes[3].className = "progressBarInProgress";
	//this.fileProgressElement.childNodes[3].style.width = percentage + "%";

	this.appear();	
};

FileProgress.prototype.setComplete = function () {
	/*
	var instance = this.fileProgressElement.instance
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	*/
	//swf.customSettings.uploadedFiles.push(swf.getFile())
	
	//this.fileProgressElement.childNodes[3].childNodes[0].width = "2"
	//this.fileProgressElement.childNodes[2].childNodes[0].src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/142.png" 
	
	//dwzUpdateStatus(instance)
	
	/*
	this.fileProgressElement.className = "progressContainer blue";
	this.fileProgressElement.childNodes[3].className = "progressBarComplete";
	this.fileProgressElement.childNodes[3].style.width = "";
	*/
	
	/*
	var oSelf = this;
	this.setTimer(setTimeout(function () {
		oSelf.disappear();
	}, 10000));
	*/
};


/*
FileProgress.prototype.HideError = function(){
	var child = this.fileProgressElement.childNodes[5].childNodes[0]
	if(!child.dwzError || child.dwzError.length == 0){
		this.fileProgressElement.childNodes[5].childNodes[0].style.display = "none"
	}else{
		this.fileProgressElement.childNodes[5].childNodes[0].style.display = "block"
	}
}

FileProgress.prototype.HasErrors = function(){
	var child = this.fileProgressElement.childNodes[5].childNodes[0]
	return (child.dwzError && child.dwzError.length != 0)
}

FileProgress.prototype.GetErrorMessage = function(){
	return this.fileProgressElement.childNodes[5].childNodes[0].dwzError
}
*/


FileProgress.prototype.setError = function () {
	var instance = this.fileProgressElement.instance
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	this.fileProgressElement.childNodes[3].childNodes[0].width = "2"
	this.fileProgressElement.childNodes[2].childNodes[0].src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/142.png" 
	
	//alert(this.fileProgressElement.childNodes[5].childNodes[0].innerHTML)
	
	var urlPage = swf.settings.upload_url
	
	var postData = "dwzMultipleUploadGetLastError=yes"
	//this.fileProgressElement.childNodes[5].childNodes[0].dwzError = ""
	//this.fileProgressElement.childNodes[5].childNodes[0].style.display = "none"
	
	//var buttonError = this.fileProgressElement.childNodes[5].childNodes[0]
	
	var objXml
	$.ajax({
		url: urlPage,
		dataType:"xml",
		data: postData,
		type: "POST",
		cache:false,
		complete:function(XMLHttpRequest, textStatus){
			if(XMLHttpRequest.status.toString() == "500" && textStatus.toLowerCase() == 'error'){
				alert(XMLHttpRequest.responseText)
			}else{
				objXml = XMLHttpRequest.responseXML
				if(objXml){
					var errMsg = dwzGetXmlValue(objXml, "message", C_DATA)
					//buttonError.dwzError = errMsg
					//buttonError.style.display = "block"
					alert(errMsg)
				}
			}
		},
		async: false
	});
	
	
};

FileProgress.prototype.setCancelled = function () {
	
	//this.fileProgressElement.className = "progressContainer";
	//this.fileProgressElement.childNodes[3].className = "progressBarError";
	//this.fileProgressElement.childNodes[3].style.width = "";
	
	var instance = this.fileProgressElement.instance
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	this.fileProgressElement.childNodes[3].childNodes[0].width = "2"
	this.fileProgressElement.childNodes[2].childNodes[0].src = swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/142.png" 
	
	swf.cancelUpload(this.fileProgressWrapper.id);
	
	var oSelf = this;
	this.setTimer(setTimeout(function () {
		oSelf.disappear();
	}, 2000));
	
};

FileProgress.prototype.setStatus = function (status) {
	this.fileProgressElement.childNodes[1].innerHTML = status;
	//this.fileProgressElement.childNodes[2].innerHTML = status;
};

// Show/Hide the cancel button
FileProgress.prototype.toggleCancel = function (show, swfUploadInstance) {	
	//this.fileProgressElement.childNodes[0].style.visibility = show ? "visible" : "hidden";
	if (swfUploadInstance) {
		/*
		this.fileProgressElement.childNodes[0].onclick = function () {
			swfUploadInstance.cancelUpload(fileID);
			return false;
		};
		*/
	}
};

FileProgress.prototype.appear = function () {
	if (this.getTimer() !== null) {
		clearTimeout(this.getTimer());
		this.setTimer(null);
	}
	
	if (this.fileProgressWrapper.filters) {
		try {
			this.fileProgressWrapper.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 100;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			this.fileProgressWrapper.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
		}
	} else {
		this.fileProgressWrapper.style.opacity = 1;
	}
		
	this.fileProgressWrapper.style.height = "";
	
	this.height = this.fileProgressWrapper.offsetHeight;
	this.opacity = 100;
	this.fileProgressWrapper.style.display = "";
	
};

// Fades out and clips away the FileProgress box.
FileProgress.prototype.disappear = function () {

	var reduceOpacityBy = 15;
	var reduceHeightBy = 4;
	var rate = 30;	// 15 fps

	if (this.opacity > 0) {
		this.opacity -= reduceOpacityBy;
		if (this.opacity < 0) {
			this.opacity = 0;
		}

		if (this.fileProgressWrapper.filters) {
			try {
				this.fileProgressWrapper.filters.item("DXImageTransform.Microsoft.Alpha").opacity = this.opacity;
			} catch (e) {
				// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
				this.fileProgressWrapper.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + this.opacity + ")";
			}
		} else {
			this.fileProgressWrapper.style.opacity = this.opacity / 100;
		}
	}

	if (this.height > 0) {
		this.height -= reduceHeightBy;
		if (this.height < 0) {
			this.height = 0;
		}

		this.fileProgressWrapper.style.height = this.height + "px";
	}

	if (this.height > 0 || this.opacity > 0) {
		var oSelf = this;
		this.setTimer(setTimeout(function () {
			oSelf.disappear();
		}, rate));
	} else {
		this.fileProgressWrapper.style.display = "none";
		this.setTimer(null);
	}
};