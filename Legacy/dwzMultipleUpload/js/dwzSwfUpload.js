// JavaScript Document

var C_ATTRIBUTE = 0
var C_TEXT = 1
var C_DATA = 2


function dwzGetSwf(instance){
	return eval("swfupload_" + instance)	
}

function dwzRemoveFromQueue(instance, fileId){
	var swf = dwzGetSwf(instance)
	var file = swf.getFileByDwzone(fileId)
	if(!file){
		var lista = swf.getAllFiles()
		for(var x=0; x<lista.length; x++){
			if(lista[x].id == fileId){
				file = lista[x]
				break;
			}
		}
		if(!file){
			return	
		}
	}
			
	if(file.filestatus != SWFUpload.FILE_STATUS.QUEUED && 
	   file.filestatus != SWFUpload.FILE_STATUS.ERROR &&
	   file.filestatus != SWFUpload.FILE_STATUS.CANCELLED){
		alert(swf.customSettings.customMessage.cannotBeRemoved)
		return
	}
	
	var progress = new FileProgress(file, swf.customSettings.progressTarget);
	progress.setStatus("Removing file")
	progress.setCancelled();
	
}

function dwzStartUpload(instance, btn){
	if(btn.className == "btnUploadDisabled"){
		return;	
	}
	var swf = dwzGetSwf(instance)
	if(!swf){
		alert(swf.customSettings.customMessage.SwfUploadNotDefined)
		return
	}
	
	var stats = swf.getStats()
	
	if(stats.in_progress != 0){
		alert(swf.customSettings.customMessage.UploadInProgress)
		return
	}
	
	if(swf.customSettings.insertRecordParams.insert){
		if(!ValidateFormFields(instance)){
			return
		}
	}	
	
	if(swf.customSettings.maxTotalFileSize != 0){
		maxSize = parseInt(swf.customSettings.maxTotalFileSize) * 1000
		var filesSize = 0
		var files = swf.getAllFiles()	
		for(var x=0; x<files.length; x++){
			if(files[x].filestatus == SWFUpload.FILE_STATUS.QUEUED){
				filesSize += files[x].size
			}
		}
		if(filesSize > maxSize){
			alert(swf.customSettings.customMessage.FileSizeExceedLimit)
			return
		}
	}
	
	//var files = swf.getAllFiles()
	var needUpload = false
	var stats = swf.getStats();
	
	swf.customSettings.currentUploadTotalFiles = stats.files_queued
	swf.customSettings.isFirstFile = true
	
	if(stats.files_queued > 0){
		needUpload = true
	}
	
	if (!needUpload) {
		alert(swf.customSettings.customMessage.NoFileSelected)
		return
	}
	
	var btn_Stop = document.getElementById(swf.customSettings.stopButtonId)
	btn_Stop.className = "btnStop"
	
	swf.customSettings.stopUploadRequest = false
	
	dwzChangeButtonStatus(instance, true)
	swf.customSettings.startTime = (new Date()).getTime();
	
	swf.customSettings.currentFileCounter = 1
	dwzUploadFiles(instance)
}

function GetValue(fld){
	if(fld.type && (fld.type.toLowerCase() == "radio" || 
					fld.type.toLowerCase() == "checkbox")){
		if(fld.checked){
			if(fld.value && fld.value.length != 0){
				return fld.value
			}else if(fld.id && fld.id.length != 0){
				return fld.id	
			}else if(fld.name && fld.name.length != 0){
				return fld.name
			}else{
				return fld.type.toLowerCase()
			}
		}else{
			return ""
		}
	}else if(fld.tagName && fld.tagName.toLowerCase() == "select"){
		if(fld.selectedIndex != -1){
			if(fld.options[fld.selectedIndex].value.length != 0){
				return fld.options[fld.selectedIndex].value
			}else{
				return fld.options[fld.selectedIndex].text
			}
		}else{
			return ""
		}
	}
	return fld.value
}

function GetFieldValue(formName, fieldName){
	var f = dwz_findObj(formName)
	if(!f){return "form not find"}
	var el = dwz_findObj(fieldName, f)	
	var retVal = ""
	if(el && el.length){
		if(el.tagName && el.tagName.toLowerCase() == "select"){
			if(retVal != ""){
				retVal += ","
			}
			retVal += GetValue(el)
		}else for(var x=0; x<el.length; x++){
			if(el[x].type && el[x].type.toLowerCase() == "radio" && el[x].checked){
				retVal = GetValue(el[x])
				break;
			}else{
				if(retVal != ""){
					retVal += ","
				}
				retVal += GetValue(el[x])
			}
		}
	}else if(el){
		retVal = GetValue(el)
	}
	return retVal
}

function ValidateFormFields(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return
	}
	
	var formName = swf.customSettings.insertRecordParams.form
	var f = dwz_findObj(formName)
	if(!f){
		alert("The form ''" + formName + "'' is missing\nVerify this form is in the page")
		return false
	}
	if(f.getAttribute("onsubmit")){
		return f.onsubmit()
	}
	return true
	
	/*
	var fieldsList = swf.customSettings.insertRecordParams.fieldsList
	var field
	
	var errorMessage = ""
	
	for(var x=0; x<fieldsList.length; x++){
		field = fieldsList[x]
		field.value = GetFieldValue(formName, field.Name)
		field.Valid = true
		
		if(field.value.length == 0 && field.Required == "Y"){
			errorMessage  += field.ErrMsg.replace(/@_apex_@/gi, "'") + "\n"
			field.Valid = false
		}else{
			if(field.Validation == "Not the first"){
				var el = dwz_findObj(f, field.Name)
				if(el && el.tagName.toLowerCase() == "select" && el.selectedIndex < 1){
					errorMessage  += field.ErrMsg.replace(/@_apex_@/gi, "'") + "\n"
					field.Valid = false
				}
			}else if(field.Validation == "One of them"){
				var el = dwz_findObj(f, field.Name)
				if(el && el.length){
					var i = 0
					for(var x=0; x<el.length; x++){
						if(el[x].checked){
							i = 1	
							break;
						}
					}
					if(i == 0){
						errorMessage  += field.ErrMsg.replace(/@_apex_@/gi, "'") + "\n"
						field.Valid = false
					}
				}else if(el && !el.checked){
					errorMessage  += field.ErrMsg.replace(/@_apex_@/gi, "'") + "\n"
					field.Valid = false
				}
			}else if(field.RegExp != ""){
				var regExp = new RegExp(field.RegExp.replace(/@_apex_@/gi, "'").replace(/@_2apex_@/gi, '"'));
				if(!regExp.test(field.value)){
					errorMessage  += field.ErrMsg.replace(/@_apex_@/gi, "'") + "\n"
					field.Valid = false
				}
			}			
			if(field.Valid){
			}
		}
	}
	if(errorMessage != ""){
		alert(errorMessage)
		return false
	}
	return true
	*/
}

function AddFormFieldToSendValue(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return
	}
	
	var par = swf.customSettings.fieldsToSend
	if(par.length == 0){
		return
	}
	var fields = par.split(",")
	for(var x=0; x<fields.length; x++){
		var tmp = fields[x].split("@__@")
		if(tmp.length >= 2){
			var formName = tmp[0]
			var fieldName = tmp[1]
			swf.removePostParam(fieldName.toLowerCase())
			var fieldValue = GetFieldValue(formName, fieldName)
			swf.addPostParam(fieldName.toLowerCase(), fieldValue)
		}
	}
}

function AddFormFieldValue(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return
	}
	
	var par = swf.customSettings.insertRecordParams
	if(!par || par == ""){
		return
	}
	var formName = par.form
	var fields = par.fieldsList	
	for(var x=0; x<fields.length; x++){
		swf.removePostParam(fields[x].Name.toLowerCase())
		var fieldValue = GetFieldValue(formName, fields[x].Name)
		swf.addPostParam(fields[x].Name.toLowerCase(), fieldValue)
	}
	/*
	par.insert
	par.form
	par.fieldsList
	*/
	
}


function dwzUploadFiles(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return
	}
		
	var endUpload = true
	
	if(!swf.customSettings.stopUploadRequest){
		var stats = swf.getStats();
		if(stats.files_queued > 0) {
			endUpload = false
			
			swf.removePostParam("dwzCurrentUploadTotalFiles")
			swf.addPostParam("dwzCurrentUploadTotalFiles", swf.customSettings.currentUploadTotalFiles.toString())
			
			swf.removePostParam("dwzFirstFile")
			swf.addPostParam("dwzFirstFile", swf.customSettings.isFirstFile.toString())
			
			swf.removePostParam("currentFileCounter")
			swf.addPostParam("currentFileCounter", swf.customSettings.currentFileCounter.toString())
			
			if(stats.files_queued == 1){
				swf.removePostParam("dwzLastFile")
				swf.addPostParam("dwzLastFile", "true")
				
				AddFormFieldValue(instance)
				
			}else{
				swf.removePostParam("dwzLastFile")
				swf.addPostParam("dwzLastFile", "false")
			}
			
			AddFormFieldToSendValue(instance)
			
			swf.startUpload();
			
			swf.customSettings.currentFileCounter += 1
			swf.customSettings.isFirstFile = false
		}
	}
	
	if(endUpload){
		dwzUpdateStatus(instance)
		dwzManageButtons(instance)
		dwzChangeButtonStatus(instance, false)
		
		var btn_Stop = document.getElementById(swf.customSettings.stopButtonId)
		btn_Stop.className = "btnStopDisabled"
		
		var files = swf.getAllFiles()
		var errors = false;
		
		for(var x=0; x<files.length; x++){
			if(files[x].filestatus == SWFUpload.FILE_STATUS.ERROR){
				errors = true
				break
			}
		}
		
		if(!errors){
			alert(swf.customSettings.customMessage.UploadCompleted)
		}else{
			alert(swf.customSettings.customMessage.UploadCompletedWithError)
		}
		
		if(swf.customSettings.redirectUrl.length != 0){
			location.href = swf.customSettings.redirectUrl
		}
	}
}

function dwzClearAll(instance, btn){
	if(btn.className == "btnClearAllDisabled"){
		return;	
	}
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	/*
	var settings = swf.settings
	var instance = swf.customSettings.instance
	
	swf.destroy()
	
	document.getElementById("dwzFlashCell_1").innerHTML = '<span id="dwzBrowseButtonPlaceHolder_1"></span>'
	document.getElementById("dwzUploadContainer_1").innerHTML = '<div id="dwzUploadProgress_1" style="width:495px;" class="wrapperQueue wrapperInfoText" ></div>'
	
	swfupload_1 = new SWFUpload(settings);
	
	document.getElementById("dwzUploadProgress_1").innerHTML = ""
	*/
	
	
	var files = swf.getAllFiles()
	for(var x=0; x<files.length; x++){
		if(files[x].filestatus != SWFUpload.FILE_STATUS.CANCELLED){
						
			swf.cancelUpload(files[x].id);
			
			var progress = new FileProgress(files[x], swf.customSettings.progressTarget);
			progress.setStatus("Removing file")
			progress.setCancelled();			
			
		}
	}
	
	swf.cancelQueue()
	
	dwzManageButtons(instance)
	dwzChangeButtonStatus(instance, false)	
	
	dwzClearStatus(instance)
}

function getStringFromObject(obj){
	var retval = "{"
	var virgola = ""
	for(var name in obj){
		retval += virgola + name + ":'" + eval("obj." + name) + "'"
		virgola = ","
	}
	retval += "}"
	return retval
}


function dwzStop(instance, btn){
	
	if(btn.className == "btnStopDisabled"){
		return;	
	}
	
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	swf.customSettings.stopUploadRequest = true
		
	var stats = swf.getStats()	
	if(stats.in_progress != 0){		
		swf.stopUpload()
		dwzChangeButtonStatus(instance, false)
	}	
	
}

function dwzClearStatus(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	var div = document.getElementById(swf.customSettings.divTotalFileSize)
	div.innerHTML = "0 Mb"
	
	var div = document.getElementById(swf.customSettings.divUploadedSize)
	div.innerHTML = "0 Mb&nbsp;(0%)"
	
	var div = document.getElementById(swf.customSettings.divTotalProgress)			
	if(swf.customSettings.graphicPath.toLowerCase() == "graphics/xp"){
		var numImages = 1
		var imgHTML = ""
		for(var i=0; i<numImages; i++){
			imgHTML += "<img width='5' height='13' src='" + swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ProgressBar.gif' border='0' />"
		}
		div.innerHTML = imgHTML
					
	}else{
		width = 1
		div.childNodes[0].width = width		
	}
	
	var div = document.getElementById(swf.customSettings.divTimeElapsed)
	div.innerHTML = ""
	
	//Time remaining
	var div = document.getElementById(swf.customSettings.divTimeRemaining)
	div.innerHTML = ""
	
	//Current speed
	var div = document.getElementById(swf.customSettings.divCurrentSpeed)
	div.innerHTML = "0 Mbps"
	
	//Total speed
	var div = document.getElementById(swf.customSettings.divTotalSpeed)
	div.innerHTML = "0 Mbps"	
	
}



/*
function dwzOpenError(instance, fileId){
	var swf = dwzGetSwf(instance)
	var file = swf.getFileByDwzone(fileId)
	if(!file){
		var lista = swf.getAllFiles()
		for(var x=0; x<lista.length; x++){
			if(lista[x].id == fileId){
				file = lista[x]
				break;
			}
		}
		if(!file){
			return	
		}
	}
			
	if(file.filestatus != SWFUpload.FILE_STATUS.QUEUED && 
	   file.filestatus != SWFUpload.FILE_STATUS.ERROR &&
	   file.filestatus != SWFUpload.FILE_STATUS.CANCELLED){
		alert(swf.customSettings.customMessage.cannotBeRemoved)
		return
	}
	
	var progress = new FileProgress(file, swf.customSettings.progressTarget);
	if(progress.HasErrors()){
		var error = progress.GetErrorMessage()
		alert(error) //.replace(/\n/gi, "<br>"))
	}else{
		progress.HideError()
	}
}
*/

function dwzUpdateStatus(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
		
	var files = swf.getAllFiles()
	var stats = swf.getStats()
	var totalSize = 0.0
	var uploadedSize = 0.0
		
	//Total file size
	for(var x=0; x<files.length; x++){
		if(files[x].filestatus == SWFUpload.FILE_STATUS.QUEUED || 
		   files[x].filestatus == SWFUpload.FILE_STATUS.COMPLETE || 
		   files[x].filestatus == SWFUpload.FILE_STATUS.IN_PROGRESS){
			totalSize += files[x].size
		}
	}	
	var div = document.getElementById(swf.customSettings.divTotalFileSize)
	div.innerHTML = SWFUpload.speed.formatBytes(totalSize)
		
	//Uploaded size	
	for(var x=0; x<files.length; x++){
		if(files[x].filestatus == SWFUpload.FILE_STATUS.COMPLETE){
			uploadedSize += files[x].size
		}
		if(files[x].filestatus == SWFUpload.FILE_STATUS.IN_PROGRESS){			
			if(!isNaN(files[x].sizeUploaded)){
				uploadedSize += files[x].sizeUploaded
			}	
		}
	}
		
	var percentage = 0.0
	if(totalSize != 0 && uploadedSize != 0){
		percentage = parseFloat(uploadedSize) / parseFloat(totalSize) * 100.0
		if(percentage > 100.0){
			percentage = 100.0	
		}
	}
	var div = document.getElementById(swf.customSettings.divUploadedSize)
	div.innerHTML = SWFUpload.speed.formatBytes(uploadedSize) + "&nbsp;(" + SWFUpload.speed.formatPercent(percentage) + ")"
	
	if(percentage > 0){
		var div = document.getElementById(swf.customSettings.divTotalProgress)
			
		if(swf.customSettings.graphicPath.toLowerCase() == "graphics/xp"){
			var numImages = Math.floor(parseFloat(swf.customSettings.maxProgressBarWidth) / 100 * percentage / 5)
			var imgHTML = ""
			for(var i=0; i<numImages; i++){
				imgHTML += "<img width='5' height='13' align='absmiddle' src='" + swf.customSettings.rootPath + "dwzMultipleUpload/" + swf.customSettings.graphicPath + "/ProgressBar.gif' border='0' />"
			}
			div.innerHTML = imgHTML
						
		}else{
			width = Math.ceil(parseFloat(swf.customSettings.maxProgressBarWidth) / 100 * percentage).toString()
			div.childNodes[0].width = width
			if(percentage >= 100.0){
				div.childNodes[0].src = div.childNodes[0].src.replace(/ProgressBar\.gif/gi, "ProgressBarStopped.gif")
			}
		}
	}
	
	if(stats.in_progress != 0){
		
		var timeElapsed = ((new Date()).getTime() - swf.customSettings.startTime);
		var movingAverageSpeed = 0
		var timeRemaining = 0
		
		if(timeElapsed != 0){
			movingAverageSpeed = (uploadedSize * 8 ) / (timeElapsed / 1000);
		}
		if(movingAverageSpeed > 0){
			timeRemaining = (totalSize - uploadedSize) * 8 / movingAverageSpeed;
		}
		
		//Time elapsed
		var div = document.getElementById(swf.customSettings.divTimeElapsed)
		div.innerHTML = SWFUpload.speed.formatTime(timeElapsed / 1000)
		
		//Time remaining
		var div = document.getElementById(swf.customSettings.divTimeRemaining)
		if(percentage < 100.0){
			div.innerHTML = SWFUpload.speed.formatTime(timeRemaining)
		}else{
			div.innerHTML = SWFUpload.speed.formatTime(0.0)
		}
		
		//Current speed
		var speed = 0
		for(var x=0; x<files.length; x++){
			if(files[x].filestatus == SWFUpload.FILE_STATUS.IN_PROGRESS){
				//alert(files[x].currentSpeed)
				if(!isNaN(files[x].currentSpeed)){
					speed = files[x].currentSpeed	
					break;
				}
			}
		}
		if(speed == 0){
			speed = movingAverageSpeed
		}
		
		var div = document.getElementById(swf.customSettings.divCurrentSpeed)
		div.innerHTML = SWFUpload.speed.formatBPS(speed)
		
		//Total speed
		var div = document.getElementById(swf.customSettings.divTotalSpeed)
		div.innerHTML = SWFUpload.speed.formatBPS(movingAverageSpeed)
		
		
	}else{
		var div = document.getElementById(swf.customSettings.divTimeRemaining)
		div.innerHTML = SWFUpload.speed.formatTime(0.0)
	}
}

function dwzManageButtons(instance){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	//var btn_Stop = document.getElementById(swf.customSettings.stopButtonId)
	var btn_Remove = document.getElementById(swf.customSettings.removeAllButtonId)
	var btn_Upload = document.getElementById(swf.customSettings.uploadButton)
	
	var Files = swf.getAllFiles()
	var Queue = swf.getAllQueueFiles()
	
	if(Queue.length != 0){
		btn_Upload.className = "btnUpload"
	}else{
		btn_Upload.className = "btnUploadDisabled"
	}
	var nFiles = 0
	for(var x=0; x<Files.length; x++){
		if(Files[x].filestatus != SWFUpload.FILE_STATUS.CANCELLED){
			nFiles += 1
		}else{
			//alert(Files[x].filestatus)	
		}
	}
	if(nFiles != 0){
		btn_Remove.className = "btnClearAll"
	}else{
		btn_Remove.className = "btnClearAllDisabled"
	}
}

function dwzChangeButtonStatus(instance, disabled){
	var swf = dwzGetSwf(instance)
	if(!swf){
		return	
	}
	
	if(disabled){
		swf.customSettings.buttonDisabled = true
		swf.setButtonDisabled(true)
		swf.setButtonCursor(SWFUpload.CURSOR.ARROW)
		swf.setButtonTextStyle(swf.customSettings.ButtonDisabledTextStyle)
	}else{
		swf.customSettings.buttonDisabled = false
		swf.setButtonDisabled(false)
		swf.setButtonCursor(SWFUpload.CURSOR.HAND)
		swf.setButtonTextStyle(swf.customSettings.ButtonTextStyle)
	}
}

function dwzGetXmlValue(objXml, tagName, sType){
	var doc = objXml.getElementsByTagName(tagName)
	retStr = ""
	if( doc.length > 0 ) 
	{
		switch(sType){
		case C_TEXT:
			if(doc[0].text){
				retStr = doc[0].text
			}else if(doc[0].textContent){
				retStr = doc[0].textContent
			}			
			break
		case C_DATA:
			if(doc[0].hasChildNodes() && doc[0].childNodes[0]){
				if(doc[0].childNodes[0].text){
					retStr = doc[0].childNodes[0].text
				}else if(doc[0].textContent){
					retStr = doc[0].textContent
				}
			}
			break
		}
	}
	return retStr	
	
}

function dwz_findObj(n, d) {//v2.0
	var p,i,x;if(!d) d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){
	d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}
	if(!(x=d[n])&&d.all) x=d.all[n];for (i=0;!x&&d.forms&&i<d.forms.length;i++) x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=dwz_findObj(n,d.layers[i].document);
	if(!x && d.getElementById) x=d.getElementById(n);return x;
}

