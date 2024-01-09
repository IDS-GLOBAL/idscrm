/* Demo Note:  This demo uses a FileProgress class that handles the UI for displaying the file name and percent complete.
The FileProgress class is not part of SWFUpload.
*/


/* **********************
   Event Handlers
   These are my custom event handlers to make my
   web application behave the way I went when SWFUpload
   completes different tasks.  These aren't part of the SWFUpload
   package.  They are part of my application.  Without these none
   of the actions SWFUpload makes will show up in my application.
   ********************** */

function swfUploadPreLoad() {
	var self = this;
	var loading = function () {
		//document.getElementById("divSWFUploadUI").style.display = "none";
		//document.getElementById("divLoadingContent").style.display = "";

		var longLoad = function () {
			//document.getElementById("divLoadingContent").style.display = "none";
			//document.getElementById("divLongLoading").style.display = "";
		};
		this.customSettings.loadingTimeout = setTimeout(function () {
				longLoad.call(self)
			},
			15 * 1000
		);
	};
	
	this.customSettings.loadingTimeout = setTimeout(function () {
			loading.call(self);
		},
		1*1000
	);
}
function swfUploadLoaded() {
	var self = this;
	clearTimeout(this.customSettings.loadingTimeout);
	//document.getElementById("divSWFUploadUI").style.visibility = "visible";
	//////document.getElementById("divSWFUploadUI").style.display = "block";
	//////document.getElementById("divLoadingContent").style.display = "none";
	//////document.getElementById("divLongLoading").style.display = "none";
	//////document.getElementById("divAlternateContent").style.display = "none";
	
	//document.getElementById("btnBrowse").onclick = function () { self.selectFiles(); };
	//////document.getElementById("btnCancel").onclick = function () { self.cancelQueue(); };
}
   
function swfUploadLoadFailed() {
	clearTimeout(this.customSettings.loadingTimeout);
	//document.getElementById("divSWFUploadUI").style.display = "none";
	//////document.getElementById("divLoadingContent").style.display = "none";
	//////document.getElementById("divLongLoading").style.display = "none";
	//////document.getElementById("divAlternateContent").style.display = "";
}
   
function fileQueued(file) {
	try {		
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setStatus("Pending...");
		progress.toggleCancel(true, this);
		
		//for(var name in file){alert(name)}
		
	} catch (ex) {
		this.debug(ex);
	}

}

function fileQueueError(file, errorCode, message) {
	try {
		if (errorCode == SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED) {
			alert("You have attempted to queue too many files.\n" + (message == 0 ? "You have reached the upload limit." : "You may select " + (message > 1 ? "up to " + message + " files." : "one file.")));
			return;
		}
		
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setError();
		progress.toggleCancel(false);
		dwzUpdateStatus(this.customSettings.instance)
		
		switch (errorCode) {
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:		
			progress.setStatus("<font color='red'>File is too big.</font>");
			this.debug("Error Code: File too big, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			progress.setStatus("<font color='red'>Cannot upload Zero Byte files.</font>");
			this.debug("Error Code: Zero byte file, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
			progress.setStatus("<font color='red'>Invalid File Type.</font>");
			this.debug("Error Code: Invalid File Type, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		default:
			if (file !== null) {
				progress.setStatus("<font color='red'>Unhandled Error</font>");
			}
			this.debug("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		}			
	} catch (ex) {
        this.debug(ex);
    }
}

function fileDialogComplete(numFilesSelected, numFilesQueued) {
	try {
		if (numFilesSelected > 0) {
			//////document.getElementById(this.customSettings.cancelButtonId).disabled = false;
		}
		
		dwzUpdateStatus(this.customSettings.instance)
		dwzManageButtons(this.customSettings.instance)
		
		/* I want auto start the upload and I can do that here */
		//////this.startUpload();
	} catch (ex)  {
        this.debug(ex);
	}
}

function uploadStart(file) {
	try {
		/* I don't want to do any file validation or anything,  I'll just update the UI and
		return true to indicate that the upload should start.
		It's important to update the UI here because in Linux no uploadProgress events are called. The best
		we can do is say we are uploading.
		 */
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setStatus("Uploading...");
		progress.toggleCancel(true, this);
	}
	catch (ex) {}
	
	return true;
}

function uploadProgress(file, bytesLoaded, bytesTotal) {
	try {
		var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);

		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setProgress(percent, file, bytesLoaded, bytesTotal);
		progress.setStatus("Uploading...");
		
		dwzUpdateStatus(this.customSettings.instance)
		
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadSuccess(file, serverData) {
	try {
		var parser
		var xmlDoc
		if (window.DOMParser)
		{
			parser = new DOMParser();
			xmlDoc = parser.parseFromString(serverData,"text/xml");
		}
		else // Internet Explorer
		{
			xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
			xmlDoc.async = "false";
			xmlDoc.loadXML(serverData); 
		} 
		
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setComplete();
		
		if(dwzGetXmlValue(xmlDoc, "error", C_TEXT).toLowerCase() == "yes"){
			progress.setStatus("Error - " + dwzGetXmlValue(xmlDoc, "message", C_TEXT));
			progress.toggleCancel(false);
			
			var msg = "Error on uploading file: " + file.name + "\n\n" 
			msg += dwzGetXmlValue(xmlDoc, "message", C_TEXT).replace(/@_vbcrlf_@/gi, "\n") + "\n\n"
			if(dwzGetXmlValue(xmlDoc, "errorCode", C_TEXT).toLowerCase() == "003"){
				msg += "Upload aborted"
			}else{
				msg += "Upload continue for next files"
			}
			alert(msg)
			
			if(dwzGetXmlValue(xmlDoc, "errorCode", C_TEXT).toLowerCase() == "003"){
				return
			}
		}else{
			progress.setStatus("Complete");
			progress.toggleCancel(false);
		}
		
		//dwzone
		dwzUpdateStatus(this.customSettings.instance)
		if(!this.customSettings.stopUploadRequest){
			dwzUploadFiles(this.customSettings.instance)
		}
		//dwzone
		
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadError(file, errorCode, message) {
	try {
						
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setError();
		progress.toggleCancel(false);		
		dwzUpdateStatus(this.customSettings.instance)
		
		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.HTTP_ERROR:
			progress.setStatus("Upload Error: " + message);
			this.debug("Error Code: HTTP Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
			progress.setStatus("Upload Failed.");
			this.debug("Error Code: Upload Failed, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.IO_ERROR:
			progress.setStatus("Server (IO) Error");
			this.debug("Error Code: IO Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
			progress.setStatus("Security Error");
			this.debug("Error Code: Security Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			progress.setStatus("Upload limit exceeded.");
			this.debug("Error Code: Upload Limit Exceeded, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_VALIDATION_FAILED:
			progress.setStatus("Failed Validation.  Upload skipped.");
			this.debug("Error Code: File Validation Failed, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			// If there aren't any files left (they were all cancelled) disable the cancel button
			if (this.getStats().files_queued === 0) {
				//////document.getElementById(this.customSettings.cancelButtonId).disabled = true;
			}
			progress.setStatus("Cancelled");
			progress.setCancelled();
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			progress.setStatus("Stopped");
			break;
		default:
			progress.setStatus("Unhandled Error: " + errorCode);
			this.debug("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		}
	} catch (ex) {
        this.debug(ex);
    }
}

function uploadComplete(file) {
	if (this.getStats().files_queued === 0) {
		//////document.getElementById(this.customSettings.cancelButtonId).disabled = true;
	}
	dwzUpdateStatus(this.customSettings.instance)
	return false
}

// This event comes from the Queue Plugin
function queueComplete(numFilesUploaded) {
	//////var status = document.getElementById(this.customSettings.divStatus);
	//////status.innerHTML = numFilesUploaded + " file" + (numFilesUploaded === 1 ? "" : "s") + " uploaded.";
}



