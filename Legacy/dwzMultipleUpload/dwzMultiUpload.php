<?php
ob_start();

if ( session_id() == '' ) { // no session has been started yet, which is needed for validation
	session_start();
}

include('dwzResizeImage.php');
include('dwzDataBase.php');


class dwzMultiUpload
{
	
	var $logEnabled,
	$uploadedFiles,
	$formElements,
	$redirectUrl,
	$path,
	$tempPath,
	$overwriteMode,
	$allowedExtensions,
	$allowedExtensionsDescription,
	$sizes,
	$scriptTimeout,
	$instance,
	$dimensions,
	$texts,
	$messages,
	$rootPath,
	$buttonParameters,
	$showInfo,
	$insertParameters,
	$resizeParameters,
	$extraInfo,
	
	$host_name, 
	$database, 
	$user_name, 
	$password,
	$tableName,
	$insertRecord,
	$formName,
	$fieldsToSend,
	$dbFieldName,
	$formFieldName,
	$dbFieldType,
	$fieldValidation,
	$last_id,
	
	$insertMultiple,
	$masterTableKey,
	$filesTable,
	$parentTableKey,
	$filePathField,
	$thumbPathField,
	$thumb2PathField,
	$fileLength,
		
	$xmlEncoding,
	$uploadError,
	$uploadErrorMessage,
	$uploadErrorCode,
	$logPath,
	$congPattern,
	$uploadedYet;
	
	function SetInstance($param){
		$this->instance = $param;
	}
	
	function SetExtraInfo($param){
		$this->extraInfo = $param;
	}
	function SetRedirectUrl($param){
		$this->redirectUrl = $param;
	}
	function SetPath($param){
		$this->path = $param;
	}
	function SetConnPar($host, $db, $user, $pwd){
		$this->host_name = $host;
		$this->database = $db;
		$this->user_name = $user;
		$this->password = $pwd;
	}
	function SetTempPath($param){
		$this->tempPath = $param;
	}
	function SetRootPath($param){
		$this->rootPath = $param;
	}
	function SetTexts($param){
		$this->texts = $param;
	}
	function SetMessages($param){
		$this->messages = $param;
	}
	function SetButtonParameters($param){
		$this->buttonParameters = $param;
	}
	function SetOverwriteMode($param){
		$this->overwriteMode = $param;
	}
	function SetAllowedExtensions($param){
		$this->allowedExtensions = $param;
	}
	function SetAllowedExtensionsDescription($param){
		$this->allowedExtensionsDescription = $param;
	}
	function SetSizes($param){
		$this->sizes = $param;
	}
	function SetInsertParameters($param){
		$this->insertParameters = $param;
	}
	function SetResizeParameters($param){
		$this->resizeParameters = $param;
	}
	
	
	function Init(){
				
		$this->congPattern = "/\|_\|/";
		$this->xmlEncoding = "utf-8";
		$this->dbFieldName = array();
		$this->formFieldName = array();
		$this->dbFieldType = array();
		$this->fieldValidation = array();
		
		if($this->IsPostBack() && isset($_REQUEST["dwzMultipleUploadGetLastError"]) && $_REQUEST["dwzMultipleUploadGetLastError"] != ""){
			$this->GetLastError();
		}
						
		$tmp = preg_split($this->congPattern, $this->extraInfo);
		$this->scriptTimeout = intval($tmp[1]);
		$this->showInfo = $tmp[2];
		$this->dimensions = $tmp[3];
		$this->logEnabled = $tmp[4];
		$this->fieldsToSend = $tmp[5];
		
		if(strtolower($this->showInfo) == "block"){
			$this->showInfo = "";
		}						
		
		$this->insertRecord = false;
		$this->uploadError = false;
		$this->uploadedFiles = array();
		
		if($this->path == ""){
			$errMsg = "<br><br><B>System reported this error:</B><p>";
			$errMsg .= "<p>The Upload Folder is not setup<p>";
			$this->ShowError($errMsg);
		}
		
		if($this->IsPostBack()){
			$ct = "";
			if(isset($_SERVER['CONTENT_TYPE'])){
				$ct = $_SERVER['CONTENT_TYPE'];
			}else if (isset($_SERVER['HTTP_Content_Type'])){
				$ct = $_SERVER['HTTP_Content_Type'];
			}
			
			if(strtolower(substr($ct, 0, 19)) != "multipart/form-data"){
				$errMsg = "The CONTENT_TYPE is not setup in the right mode<br>";
				$errMsg .= "Actual value: " .substr($ct, 0, 19) ."<br>";
				$errMsg .= "Allowed value: multipart/form-data";
				$this->ShowError($errMsg);
			}
		}
					
	}
	
	function GetRealPath($path){		
		if($path == ""){
			return "";
		}
		if($path != "/" && is_dir($path) || is_file($path)){
			return $path;
		}
		$root = $_SERVER['DOCUMENT_ROOT'] ;						
		//$path = str_replace("\\", "/", $path);
		if(substr($path, 0, 1) == "/"){			
			if(strpos($root, "/") !== false){
				//	/folder/
				if(substr($root, -1) == "/"){
					$path = substr($path, 1);
				}
				return $root .$path;
			}else{
				//	c:\folder\
				if(substr($root, -1) == "\\"){
					$path = substr($path, 1);
				}
				return $root .str_replace("/", "\\", $path);
			}
		}else{
			$part = $this->GetFilePart($path);
			if($part['path'] != "" && !is_dir($part['path'])){
				$part['path'] = $this->CreateFoldersTree($part['path']);
			}
			return realpath($path);
		}                
	}
	
	function CreateFoldersTree($path){
		$path_separator = $this->GetPathSeparator();
		$folder = "";
		
		if($path_separator == "/"){
			$folder = "/";
			$tmp = preg_split("/\//", $path);
		}else{
			$tmp = preg_split("/\\\/", $path);
		}
						
		foreach($tmp as $part){
			if($folder != "" && $folder != $path_separator){
				$folder .= $path_separator;
			}
			if($part != ""){				
				$folder .= $part;
				//echo $folder ."<br>";
				if($part != ".." && !is_dir($folder)){
					//echo "Create<br>";
					$this->CreateFolder($folder);
				}
			}
		}
		return $folder;
	}
	
	function CreateFolder($folder){
		if(!is_dir($folder) && !is_file($folder)){
			mkdir($folder, 0755, true);
		}
	}
	
	function GetPathSeparator(){
		$path = $_SERVER['DOCUMENT_ROOT'];
		if(strpos($path, "/") !== false){
			return "/";
		}else{
			return "\\";
		}
	}
	
	function AddLastCharToPath($path){
		if(strpos($path, "/") !== false){
			if(substr($path, -1) != "/"){
				return $path ."/";
			}
		}else{
			if(substr($path, -1) != "\\"){
				return $path ."\\";
			}
		}
		return $path;
	}
	
	function SetUploadFolder(){
		 //' value="1" Relative
         //' value="2" Absolute
         //' value="3" Dynamic
		
		$tmp = preg_split($this->congPattern, $this->path);
		$path = $tmp[0];
		
		if($tmp[1] == "1"){		//Relative
			$this->path = $this->GetRealPath($path);									
		}elseif($tmp[2] == "2"){	//Absolute
			$this->path = $path;
		}else{					//Dynamic
			$fn = "\$retval = " .preg_replace("/#_dollar_#/i", "\$", 
								  preg_replace("/#_apex2_#/i", '"', 
								  preg_replace("/#_start_#/i", '', 
								  preg_replace("/#_start_echo_#/i", '', 		   
								  preg_replace("/#_end_#/i", '', 
											   $path)))));
			if(substr(trim($fn), -1) != ";"){
				$fn .= ";";
			}
			@eval($fn);
			$this->path = $retval;
		}
						
		$this->path = $this->AddLastCharToPath($this->path);
		$this->CreateFoldersTree($this->path);
		
		$tmp = preg_split($this->congPattern, $this->tempPath);
		$path = $tmp[0];
		
		if($tmp[1] == "1"){		//Relative
			$this->tempPath = $this->GetRealPath($path);									
		}elseif($tmp[2] == "2"){	//Absolute
			$this->tempPath = $path;
		}else{					//Dynamic
			$fn = "\$retval = " .preg_replace("/#_dollar_#/i", "\$", 
								  preg_replace("/#_apex2_#/i", '"', 
								  preg_replace("/#_start_#/i", '', 
								  preg_replace("/#_start_echo_#/i", '', 
								  preg_replace("/#_end_#/i", '', 
											   $path)))));
			if(substr(trim($fn), -1) != ";"){
				$fn .= ";";
			}
			@eval($fn);
			$this->tempPath = $retval;
		}
		$this->tempPath = $this->AddLastCharToPath($this->tempPath);
		$this->CreateFoldersTree($this->tempPath);
				
		$this->logPath = $this->tempPath;
		$this->logPath .= "MultipleUploadLog.txt";
		
		$this->tempPath .= session_id();
		$this->tempPath = $this->AddLastCharToPath($this->tempPath);
		$this->CreateFoldersTree($this->tempPath);
		$this->CreateFoldersTree($this->tempPath . "Thumb");
	}
	
	function SetInsertValues(){
		$tmp = preg_split($this->congPattern, $this->insertParameters);
		$this->insertRecord = $tmp[0];
		$this->formName = $tmp[1];
		$this->tableName = $tmp[2];
		
		$this->insertMultiple = $tmp[4];
		$this->filesTable = $tmp[5];
		$this->masterTableKey = $tmp[6];
		$this->parentTableKey = $tmp[7];
		$this->filePathField = $tmp[8];
		$this->thumbPathField = $tmp[9];
		$this->thumb2PathField = $tmp[10];
		$this->fileLength = $tmp[11];
		
		if($tmp[3] != ""){
			$tmpFields = preg_split("/\|@\|/", $tmp[3]);
		
			for($i=0; $i<count($tmpFields); $i++){
				$tmp = preg_split("/@_@/", $tmpFields[$i]);
				
				$fieldName = $tmp[0];
				$dbName = $tmp[1];
				$dbFormat = $tmp[2];
				$validation = $tmp[3] ."@_@" .$tmp[4] ."@_@" .$tmp[5] ."@_@" 
							  .$tmp[6] ."@_@" .$tmp[7] ."@_@" .$tmp[8] ."@_@" .$tmp[9];
							
				$this->AddFormItem($fieldName, $dbName, $dbFormat, $validation);
			}
		}
	}
	
	function IsPostBack(){
		if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST" && 
				isset($_GET["dwzInstance"]) && $_GET["dwzInstance"] == $this->instance){
			return true;
		}else{
			return false;
		}
	}
	
	function AddFormItem($fName, $dbName, $dbFormat, $validation){
		$this->formFieldName[] = $fName;
		$this->dbFieldName[] = $dbName;
		$this->dbFieldType[] = $dbFormat;
		$this->fieldValidation[] = $validation;
	}
	
	function JsIncludes(){
		$retVal = "";
		$retVal .= "<link href=\"" .$this->rootPath ."dwzMultipleUpload/" .$this->GetGraphicPath() ."/default.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/swfupload.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/fileprogress.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/swfupload.queue.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/swfupload.speed.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/handlers.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/dwzSwfUpload.js\"></script>\n";
		$retVal .= "<script type=\"text/javascript\" src=\"" .$this->rootPath ."dwzMultipleUpload/js/jquery-min.js\"></script>\n";
		echo $retVal;
	}
	
	function GetGraphicPath(){
		$tmp = preg_split($this->congPattern, $this->extraInfo);
		return "Graphics/" .$tmp[0];
	}
	
	function JsConstructor(){
		$template = $this->GetTemplate("Constructor.html");
		
		$tmp = preg_split("/,/", $this->dimensions);
		$maxProgressBarFilesWidth = intval($tmp[0]) - 345;	//'min. 155
		$maxProgressBarWidth = intval($tmp[0]) - 120;		//'min. 380
		
		$tmp = preg_split("/,/", $this->sizes);
		$MaxFileSize = $tmp[0];
		$MaxTotalFileSize = $tmp[1];
		$MaxFileQueue = $tmp[2];
		
		$template = preg_replace("/#instance#/i", $this->instance, $template);
		$template = preg_replace("/#rootPath#/i", $this->rootPath, $template);
		$template = preg_replace("/#file_types#/i", preg_replace($this->congPattern, ";", $this->allowedExtensions), $template);
		$template = preg_replace("/#file_types_description#/i", preg_replace($this->congPattern, ";", $this->allowedExtensionsDescription), $template);
		$template = preg_replace("/#file_size_limit#/i", $MaxFileSize, $template);
		$template = preg_replace("/#file_upload_limit#/i", "0", $template);
		$template = preg_replace("/#file_queue_limit#/i", $MaxFileQueue, $template);
		$template = preg_replace("/#uploadUrl#/i", $this->GetPageUrl(), $template);
		$template = preg_replace("/#maxProgressBarFilesWidth#/i", $maxProgressBarFilesWidth, $template);
		$template = preg_replace("/#maxProgressBarWidth#/i", $maxProgressBarWidth, $template);
		
		//'$this->buttonParameters
		$tmp = preg_split("/\|_\|/", $this->buttonParameters);
		$template = preg_replace("/#button_image_url#/i", $tmp[0], $template);
		$template = preg_replace("/#button_width#/i", $tmp[1], $template);
		$template = preg_replace("/#button_height#/i", $tmp[2], $template);
		$template = preg_replace("/#button_text#/i", $tmp[3], $template);
		$template = preg_replace("/#ButtonTextStyle#/i", $tmp[4], $template);
		$template = preg_replace("/#ButtonDisabledTextStyle#/i", $tmp[5], $template);
		$template = preg_replace("/#button_text_left_padding#/i", $tmp[6], $template);
		$template = preg_replace("/#button_text_top_padding#/i", $tmp[7], $template);
		
		//'Custom $this->messages
		$tmp = preg_split("/\|_\|/", $this->messages);
		$template = preg_replace("/#cannotBeRemoved#/i", $tmp[0], $template);
		$template = preg_replace("/#UploadInProgress#/i", $tmp[1], $template);
		$template = preg_replace("/#UploadCompleted#/i", $tmp[2], $template);
		$template = preg_replace("/#RemoveFromQueue#/i", $tmp[3], $template);
		$template = preg_replace("/#SwfUploadNotDefined#/i", $tmp[4], $template);
		$template = preg_replace("/#NoFileSelected#/i", $tmp[5], $template);
		$template = preg_replace("/#UploadCompletedWithError#/i", $tmp[6], $template);
		$template = preg_replace("/#FileSizeExceedLimit#/i", $tmp[7], $template);
		if(count($tmp) > 8){
			$template = preg_replace("/#ShowErrorMessage#/i", $tmp[8], $template);
		}else{
			$template = preg_replace("/#ShowErrorMessage#/i", "Show error message", $template);
		}
		
		//'Insert parameters
		//'insert
		//'form
		//'insertFieldsList
		
		$this->SetInsertValues();
		
		if($this->insertRecord == "1"){
			$template = preg_replace("/#insert#/i", "true", $template);
		}else{
			$template = preg_replace("/#insert#/i", "false", $template);
		}
		$template = preg_replace("/#form#/i", $this->formName, $template);
		$template = preg_replace("/#fieldsToSend#/i", $this->fieldsToSend, $template);
				
		$formFieldsList = "";
		for($i=0; $i<count($this->formFieldName); $i++){
			if($formFieldsList != ""){
				$formFieldsList .= ",";
			}
			$formFieldsList .= "\n{Name: '" .$this->formFieldName[$i] ."'";
		//'	tmp = split($this->fieldValidation(J), "@_@")
//		'   formFieldsList = formFieldsList & ", "
//		'	formFieldsList = formFieldsList & "Required: '" & tmp(0) & "', "
//		'	formFieldsList = formFieldsList & "MaxWidth: '" & tmp(1) & "', "
//		'	formFieldsList = formFieldsList & "MinValue: '" & tmp(2) & "', "
//		'	formFieldsList = formFieldsList & "MaxValue: '" & tmp(3) & "', "
//		'	formFieldsList = formFieldsList & "Validation: '" & tmp(4) & "', "
//		'	formFieldsList = formFieldsList & "ErrMsg: '" & tmp(5) & "', "
//		'	formFieldsList = formFieldsList & "RegExp: '" & tmp(6) & "'"
			
			$formFieldsList .= "}";			
		}
		$template = preg_replace("/#formFieldsList#/i", $formFieldsList, $template);						
		$template = preg_replace("/#redirectUrl#/i", $this->redirectUrl, $template);
		$template = preg_replace("/#GraphicPath#/i", $this->GetGraphicPath(), $template);
		$template = preg_replace("/#maxTotalFileSize#/i", $MaxTotalFileSize, $template);
		
		echo $template;
	}
	
	function DomConstructor(){
		$template = $this->GetTemplate("Template.html");
		$text = preg_split("/\|_\|/", $this->texts);
		$template = preg_replace("/#instance#/i", $this->instance, $template);
		$template = preg_replace("/#rootPath#/i", $this->rootPath, $template);
		$template = preg_replace("/#Title#/i", $text[0], $template);
		$template = preg_replace("/#btnUpload#/i", $text[1], $template);
		$template = preg_replace("/#btnUploadTitle#/i", $text[2], $template);
		$template = preg_replace("/#btnRemoveAll#/i", $text[3], $template);
		$template = preg_replace("/#btnRemoveTitle#/i", $text[4], $template);
		$template = preg_replace("/#btnStop#/i", $text[5], $template);
		$template = preg_replace("/#btnStopTitle#/i", $text[6], $template);
		$template = preg_replace("/#TotalProgress#/i", $text[7], $template);
		$template = preg_replace("/#TotalFileSize#/i", $text[8], $template);
		$template = preg_replace("/#UploadedSize#/i", $text[9], $template);
		$template = preg_replace("/#TimeElapsed#/i", $text[10], $template);
		$template = preg_replace("/#TimeRemaining#/i", $text[11], $template);
		$template = preg_replace("/#TotalSpeed#/i", $text[12], $template);
		$template = preg_replace("/#CurrentSpeed#/i", $text[13], $template);
		$template = preg_replace("/#GraphicPath#/i", $this->GetGraphicPath(), $template);
		
		$tmp = preg_split("/,/", $this->dimensions);
		$masterWidth = $tmp[0];
		$queueWidth = intval($tmp[0]) - 5;
		$queueHeight = intval($tmp[1]); //' * 28
		
		$template = preg_replace("/#showInfo#/i", $this->showInfo, $template);
		$template = preg_replace("/#masterWidth#/i", $masterWidth, $template);
		$template = preg_replace("/#queueWidth#/i", $queueWidth, $template);
		$template = preg_replace("/#queueHeight#/i", $queueHeight, $template);
						
		echo $template;
	}
	
	function GetPost($req_key){
		foreach($_POST as $key => $value){
			if(strtolower($key) == strtolower($req_key)){
				return $value;
			}
		}
		return "";
	}
	
	function Get($req_key){
		foreach($_GET as $key => $value){
			if(strtolower($key) == strtolower($req_key)){
				return $value;
			}
		}
		return "";
	}
	
	function IsFirstUpload(){
		if($this->GetPost("dwzfirstfile") == "true"){
			return true;
		}
		return false;
	}
	
	function IsLastUpload(){
		if($this->GetPost("dwzlastfile") == "true"){
			return true;
		}
	}
	
	function Save(){
		
		$this->SetUploadFolder();
		
		if($this->IsFirstUpload()){
			$this->WriteLog($this->GetMainInfoForLog());
			$this->CreateTempFolder();
		}
		
		/*
		[name] 
        [type] 
        [tmp_name] 
        [error] => UPLOAD_ERR_OK  (= 0)
        [size] 
		*/
		foreach($_FILES as $fileItem){
			$newFileName = $this->GetDynamicFileName($fileItem['name']);
			
			$this->WriteLog(var_export($fileItem, true));
			
			if($this->IsValidFile($fileItem)){
				
				if($this->overwriteMode == "2" && file_exists($this->tempPath .$fileItem['name'])){
					$skipped = true;
				}else{
					$skipped = false;
					$outLocalFileName = $this->GetFileName($this->tempPath, $newFileName);
					
					$this->WriteLog("outLocalFileName:" .$outLocalFileName);
					
					if(!move_uploaded_file($fileItem["tmp_name"], $this->tempPath .$outLocalFileName)){
						$errMsg = "Save\n" ."path: " .$this->tempPath ."\n";
						$errMsg .= "FileName: " .$fileItem['name'] ." - " .$this->GetPost("currentfilecounter") ."\n";
						$errMsg .= "Description: cannot move file";
						$this->uploadError = true;
						$this->uploadErrorMessage = $errMsg;
						$this->uploadErrorCode = "965";
						
						$this->WriteLog($errMsg);
					}
					$this->ResizeImageFile($this->tempPath .$outLocalFileName);
				}
			}else{
				$skipped = false;
			}
		}
						
		if($this->IsLastUpload()){
			if($this->uploadErrorCode != "003"){
			 	$this->FinalizeUpload();
				$this->DataBaseInsert();
			}else{
				$this->DeleteTempFolder($this->tempPath);
			}						
		}
		 
		if (function_exists('error_get_last')) {
			$last_error = error_get_last();
		   	if($last_error['type'] === E_ERROR || $last_error['type'] === E_USER_ERROR) {
		    	$this->uploadError = true;
				$this->uploadErrorMessage = var_export(error_get_last(), true);
				$this->uploadErrorCode = "985";
				$this->WriteLog($this->uploadErrorMessage);
		   	}
		}
		
		if($this->IsLastUpload()){
			$this->WriteLog("-- END LOG --");
		}
		
		$this->SendReport();
	}
		
	function GetDynamicFileName($fileItemName){
		if(function_exists("GetMultiUploadFileName")){
			return GetMultiUploadFileName($fileItemName);
		}else{
			return $fileItemName;
		}
	}
	
	function DataBaseInsert(){
				
		$this->SetInsertValues();
		
		if($this->insertRecord != "1"){
			return;
		}
				
		$db = new dwzDataBase();
		
		$db->SetConn($this->host_name,
						$this->database,
						$this->user_name,
						$this->password);
		
		$insert["table_name"] = $this->tableName;
		
		$insert["fields"] = array();
		$tmpInfo = array();
		
		for($i=0; $i<count($this->dbFieldName); $i++){
			
			$tmpInfo[] = "--------";
			$tmpInfo[] = "Field " .$i;
			
			$tmpInfo[] = "Name: " .$this->formFieldName[$i];
			$tmpInfo[] = "DbType: " .$this->dbFieldType[$i];
			
			$value = "";
			if(isset($_REQUEST[strtolower($this->formFieldName[$i])])){
				$value = $_REQUEST[strtolower($this->formFieldName[$i])];
				$tmpInfo[] = "Value from form: " .$value;
			}
			
			$tmpInfo[] = "Value: " .$value;
			
			$def_value = "";
			$not_def_value = "";
			
			switch($this->dbFieldType[$i]){
			case "Text":
			case "LongText":
				$type = "text";
				break;
			case "Integer":
				$type = "int";
				break;
			case "Float":
				$type = "double";
				break;
			case "Date":
				$type = "date";
				break;
			case "Boolean":
				$type = "defined";
				$def_value = "1";
				$not_def_value = "0";
				break;
			}			
			
			$insert["fields"][] = array("name" 			=> $this->dbFieldName[$i],
									"value" 		=> $value,
									"type" 			=> $type,
									"def_value" 	=> $def_value,
									"not_def_value"	=> $not_def_value
									);
		}
		
		$this->WriteLog("INSERT RECORD:");
		$this->WriteLog(var_export($insert, true));
		
		$result = $db->Insert($insert);
		
		$this->WriteLog(var_export($result, true));
		
		$this->WriteLog("Last id: " .$db->GetLast_id());
		
		$this->last_id = $db->GetLast_id();
		
		$tmpInfo[] = "================";
		$tmpInfo[] = $this->last_id;
		$tmpInfo[] = $db->GetSql();
		$tmpInfo[] = "=================";
		
		if($result !== true){
			$tmpInfo[] = $result;
		}
		
		$this->WriteLog(implode("\n", $tmpInfo));
		
		if($result !== true){
			$this->uploadError = true;
			$this->uploadErrorCode = "009";
			$this->uploadErrorMessage = "Error on Insert record@_vbcrlf_@Error number: @_vbcrlf_@Error description: " .$result;
			$this->WriteLog($this->uploadErrorMessage);
			return;
		}
		
		if($this->insertMultiple == "1"){
									
			foreach($this->uploadedFiles as $fileItem){
				//fileItem["path"]
				//fileItem["thumbPath"]
				//fileItem["thumb2Path"]
				//fileItem["length"]
				
				$tmpInfo = array();
				$insert = array();
				$def_value = "";
				$not_def_value = "";
				
				$insert["table_name"] = $this->filesTable;
		
				$insert["fields"] = array();
				$tmpInfo = array();
				
				$tmpInfo[] = "IdRecord: " .$this->last_id;
				
				
				$insert["fields"][] = array("name" 			=> $this->parentTableKey,
											"value" 		=> $this->last_id,
											"type" 			=> "double",
											"def_value" 	=> $def_value,
											"not_def_value"	=> $not_def_value
											);
				
				if($this->filePathField != ""){
					$insert["fields"][] = array("name" 			=> $this->filePathField,
												"value" 		=> $fileItem["path"],
												"type" 			=> "text",
												"def_value" 	=> $def_value,
												"not_def_value"	=> $not_def_value
												);
					$tmpInfo[] = $this->filePathField .": " .$fileItem["path"];
				}
				
				if($this->thumbPathField != ""){
					$insert["fields"][] = array("name" 			=> $this->thumbPathField,
												"value" 		=> $fileItem["thumbPath"],
												"type" 			=> "text",
												"def_value" 	=> $def_value,
												"not_def_value"	=> $not_def_value
												);
					$tmpInfo[] = $this->thumbPathField .": " .$fileItem["thumbPath"];
				}
				
				if($this->thumb2PathField != ""){
					$insert["fields"][] = array("name" 			=> $this->thumb2PathField,
												"value" 		=> $fileItem["thumb2Path"],
												"type" 			=> "text",
												"def_value" 	=> $def_value,
												"not_def_value"	=> $not_def_value
												);
					$tmpInfo[] = $this->thumb2PathField .": " .$fileItem["thumb2Path"];
				}
				
				if($this->fileLength != ""){
					$insert["fields"][] = array("name" 			=> $this->fileLength,
												"value" 		=> $fileItem["length"],
												"type" 			=> "double",
												"def_value" 	=> $def_value,
												"not_def_value"	=> $not_def_value
												);
					$tmpInfo[] = $this->fileLength .": " .$fileItem["length"];
				}
				
				$this->WriteLog("INSERT RECORD:");
				$this->WriteLog(var_export($insert, true));
				
				$result = $db->Insert($insert);
				
				$tmpInfo[] = "================";
				$tmpInfo[] = $this->last_id;
				$tmpInfo[] = $db->GetSql();
				$tmpInfo[] = "=================";
				
				if($result !== true){
					$tmpInfo[] = $result;
				}
				
				$this->WriteLog(implode("\n", $tmpInfo));
				
				if($result !== true){
					$this->uploadError = true;
					$this->uploadErrorCode = "009";
					$this->uploadErrorMessage = "Error on Insert record@_vbcrlf_@Error number: @_vbcrlf_@Error description: " .$result;
					$this->WriteLog($this->uploadErrorMessage);
					return;
				}
			}
		}
		
		$db->Close();
	}
	
		
	function SendReport(){
		$xmlContent = "<" ."?xml version=\"1.0\" encoding=\"" .$this->xmlEncoding ."\"?>\n";
		$xmlContent .= "<root>\n";
		if($this->uploadError){
			$xmlContent .= "<error>yes</error>\n";
			$xmlContent .= "<message>" .$this->uploadErrorMessage ."</message>\n";
		}else{
			$xmlContent .= "<error>no</error>\n";
			$xmlContent .= "<message>" .$this->uploadErrorMessage ."</message>\n";
		}
		$xmlContent .= "<errorCode>" .$this->uploadErrorCode ."</errorCode>\n";
		$xmlContent .= "</root>";
		
		ob_clean();
		header('Content-type: text/xml');
		header('Content-Length: ' .strlen($xmlContent));
		echo $xmlContent;
		exit();
		
	}
	
	function IsImage($filePath){
		if(substr(strtolower($filePath), -4) == ".gif" ||
		   substr(strtolower($filePath), -4) == ".png" ||
		   substr(strtolower($filePath), -4) == ".jpg" ||
		   substr(strtolower($filePath), -4) == ".bmp" ||
		   substr(strtolower($filePath), -5) == ".jpeg"){
			return true;
		}else{
			return false;
		}
	}
	
	function IsValidFile($fileItem){
		
		$tmp = preg_split("/,/", $this->sizes);

		if($this->allowedExtensions != ""){
			$ext = preg_split("/;/", $this->allowedExtensions);
			for($i=0; $i<count($ext); $i++){
				$pattern = $this->GetRegExpPattern($ext[$i]);
				if(!preg_match($pattern, $fileItem["name"])){				
					$this->uploadError = true;
					$this->uploadErrorCode = "001";
					$this->uploadErrorMessage = "File extension not allowed@_vbcrlf_@Current file name: " .$fileItem["name"];
					$this->WriteLog("File extension not allowed");
					return false;
				}
			}
		}
		
		$maxFileLength = intval($tmp[0]) * 1000;
		if($maxFileLength != 0 && $fileItem["length"] > $maxFileLength){
			$this->WriteLog("File exceed size");
			$this->uploadError = true;
			$this->uploadErrorCode = "002";
			$this->uploadErrorMessage = "File exceed size@_vbcrlf_@Max file size allowed: " 
											.$maxFileLength 
											."@_vbcrlf_@Current file size: " 
											.$fileItem["length"];
			return false;
		}
		
		$maxTotalFileLength = intval($tmp[1]) * 1000;
		if($maxTotalFileLength > 0){
			$totalUploadedFilesLength = $this->GetTotalUploadedFileLength();
			$totalUploadedFilesLength += $fileItem["length"];
			if($totalUploadedFilesLength > $maxTotalFileLength){
				$this->WriteLog("Total Uploaded Files exceed size");
				$this->uploadError = true;
				$this->uploadErrorCode = "003";
				$this->uploadErrorMessage = "Total uploaded files exceed size@_vbcrlf_@Max file size allowed: " 
											.$maxTotalFileLength 
											."@_vbcrlf_@Current total file size: " 
											.$totalUploadedFilesLength;
				return false;
			}
		}		
		return true;
	}
	
	function GetTotalUploadedFileLength(){		
		$retVal = 0;
		if ($handle = opendir($this->tempPath)) {
			while (false !== ($file = readdir($handle))) {
				if($file != "." && $file != ".."){
					$size = filesize($this->tempPath .$file);
					if($size !== false){
						$retVal += $size;
					}
				}
			}
			closedir($handle);
		}		
		return $retVal;
	}
	
	function GetRegExpPattern($str){
		$pattern = "/^" .$str ."$/i";		
		$pattern = preg_replace("/\./", "\.", $pattern);
		$pattern = preg_replace("/\*/", "(.*?)", $pattern);
		return $pattern;
	}
	
	
	function ResizeImageFile($fileFullPath){
		
		$tmp = preg_split($this->congPattern, $this->resizeParameters);
		
		$this->WriteLog("Resize: " .$fileFullPath);
		
		if(!$this->IsImage($fileFullPath)){
			$this->WriteLog("Resize: Not image");
			return;
		}
		
		$resizeImage 	= $tmp[1];
		if($resizeImage == "1"){
			$maxWidth 		= intval($tmp[2]);
			$maxHeight 		= intval($tmp[3]);
			$jpegQuality 	= $tmp[4];
			$keepAspect 	= ($tmp[5] == "1" ? "-1" : "0");
		}
		
		$makeThumb 			= $tmp[6];
		if($makeThumb == "1"){
			$thumbWidth 		= intval($tmp[7]);
			$thumbHeight 		= intval($tmp[8]);
			$jpegThumbQuality 	= $tmp[9];
			$thumbKeepAspect	= ($tmp[10] == "1" ? "-1" : "0");
			$suffix 			= $tmp[11];
			$suffixPosition		= $tmp[12];
		}
	
		$makeThumb2 			= $tmp[13];
		if($makeThumb2 == "1"){
			$thumb2Width 		= intval($tmp[14]);
			$thumb2Height 		= intval($tmp[15]);
			$jpegThumb2Quality	= $tmp[16];
			$thumb2KeepAspect	= ($tmp[17] == "1" ? "-1" : "0");
			$suffix2			= $tmp[18];
			$suffix2Position	= $tmp[19];
		}
		
		if($resizeImage == "1"){
			$this->WriteLog("Resize: main image");
			$image = new dwzResizeImage();
			if($image->load($fileFullPath)){
				$this->WriteLog("Resize: image loaded");
				$this->WriteLog("Resize: width -> " .$image->getWidth());
				$this->WriteLog("Resize: height -> " .$image->getHeight());
				if($image->getWidth() > $maxWidth || $image->getHeight() > $maxHeight){			
					$image->resizeToRectangle($maxWidth, $maxHeight, $keepAspect);		
					$image->save($fileFullPath, $image->GetImageType(), $jpegQuality);
				}
			}			
		}
		$file_part = $this->GetFilePart($fileFullPath);
		
		if($makeThumb == "1"){
			$this->WriteLog("Resize: make thumb");
			
			if($suffixPosition == "1"){
				$newFilePath = $file_part["path"] ."Thumb" .$this->GetPathSeparator() .$suffix .$file_part["name"] .$file_part["ext"];
			}else{
				$newFilePath = $file_part["path"] ."Thumb" .$this->GetPathSeparator() .$file_part["name"] .$suffix .$file_part["ext"];
			}
			$this->WriteLog("Resize: thumb path -> " .$newFilePath);
			
			$image = new dwzResizeImage();
			if($image->load($fileFullPath)){
				$this->WriteLog("Resize: thumb loaded");
				$this->WriteLog("Resize: thumb width -> " .$image->getWidth());
				$this->WriteLog("Resize: thumb height -> " .$image->getHeight());
				$image->resizeToRectangle($thumbWidth, $thumbHeight, $thumbKeepAspect);		
				$image->save($newFilePath, $image->GetImageType(), $jpegThumbQuality);
			}
		}
		
		if($makeThumb2 == "1"){
			$this->WriteLog("Resize: make thumb 2");
			if($suffix2Position == "1"){
				$newFilePath = $file_part["path"] ."Thumb" .$this->GetPathSeparator() .$suffix2 .$file_part["name"] .$file_part["ext"];
			}else{
				$newFilePath = $file_part["path"] ."Thumb" .$this->GetPathSeparator() .$file_part["name"] .$suffix2 .$file_part["ext"];
			}
			$this->WriteLog("Resize: thumb2 path -> " .$newFilePath);
			
			$image = new dwzResizeImage();
			if($image->load($fileFullPath)){		
				$this->WriteLog("Resize: thumb2 loaded");
				$this->WriteLog("Resize: thumb2 width -> " .$image->getWidth());
				$this->WriteLog("Resize: thumb2 height -> " .$image->getHeight());
				$image->resizeToRectangle($thumb2Width, $thumb2Height, $thumb2KeepAspect);		
				$image->save($newFilePath, $image->GetImageType(), $jpegThumb2Quality);
			}
		}
	}
	
	function GetFilePart($file_path){
		$separator = "\\";
		if(strpos($file_path, "/") !== false){
			$separator = "/";
		}
		$name = substr($file_path, 0, strripos($file_path, "."));
		if(strpos($file_path, $separator)  !== false){
			$path = substr($name, 0, strripos($name, $separator) + 1);
			$name = substr($name, strripos($name, $separator) + 1);
		}else{
			$path = "";
		}
		$ext = substr($file_path, strripos($file_path, "."));
		return array("name" => $name, "path" => $path, "ext" => $ext);
	}
	
	function DeleteTempFolder($directory){ 
		if(substr($directory,-1) == "/" || substr($directory,-1) == "\\") { 
			$directory = substr($directory,0,-1); 
		} 
		$empty = false;
		$folder_sep = $this->GetPathSeparator();
		
		if(!file_exists($directory) || !is_dir($directory)) { 
			$this->WriteLog("DeleteTempFolder - Not exist: " .$directory);
			return false; 
		} elseif(!is_readable($directory)) { 
			$this->WriteLog("DeleteTempFolder - Not readable: " .$directory);
			return false; 
		} else { 
			$directoryHandle = opendir($directory); 
			
			while ($contents = readdir($directoryHandle)) { 
				if($contents != '.' && $contents != '..') { 
					$path = $directory .$folder_sep .$contents; 
					
					if(is_dir($path)) { 
						$this->DeleteTempFolder($path); 
					}else{ 
						unlink($path); 
					}
				}
			}
			
			closedir($directoryHandle); 
	
			if($empty == false) { 
				if(!rmdir($directory)) { 
					$this->WriteLog("DeleteTempFolder - cannot remove: " .$directory);
					return false; 
				} 
			} 			
			return true; 
		} 
	} 


	
	function FinalizeUpload(){
		$this->WriteLog("FinalizeUpload");
		
		$this->uploadedFiles = array();
				
		//value="0" Overwrite
		//value="1" Use Unique Name
		//value="2" Skipping the file	
						
		$tmp = preg_split($this->congPattern, $this->resizeParameters);
		$createThumb1 = $tmp[6];
		$suffix1 = $tmp[11];
		$suffixPosition1 = $tmp[12];
		
		$createThumb2 = $tmp[13];
		$suffix2 = $tmp[18];
		$suffixPosition2 = $tmp[19];
		
		$directory = $this->tempPath;
		if(substr($directory, -1) == "/" || substr($directory, -1) == "\\") { 
			$directory = substr($directory, 0, -1); 
		} 
		$folder_sep = "/";
		if(strpos($directory, "/") === false){
			$folder_sep = "\\";
		}
		$directoryHandle = opendir($directory); 
		
		while ($contents = readdir($directoryHandle)) { 
			if($contents != '.' && $contents != '..' && !is_dir($directory .$folder_sep .$contents)) { 
												
				$path = $directory .$folder_sep .$contents; 
				$part = $this->GetFilePart($path);
				$uniqueName = "";											
				if($this->overwriteMode == "1"){
					$counter = 0;
					while(file_exists($this->path .$part["name"] .$uniqueName .$part["ext"])){
						$counter += 1;
						$uniqueName = " - Copy " .$counter;
					}
				}
				
				$oUploadFile = array();
				
				if($this->overwriteMode == "0" ||
					$this->overwriteMode = "1" ||
				   ($this->overwriteMode = "2" && !file_exists($this->path .$part["name"] .$uniqueName .$part["ext"]))){
				   
					$oUploadFile['skipped'] = false;
					$oUploadFile['path'] = $this->GetRelativePath($this->path .$part["name"] .$uniqueName .$part["ext"]);
					if(file_exists($this->path .$part["name"] .$uniqueName .$part["ext"])){
						@unlink($this->path .$part["name"] .$uniqueName .$part["ext"]);
					}
					
					$this->WriteLog("Copy file : Source " .$path);
					$this->WriteLog("Copy file : Dest " .$this->path .$part["name"] .$uniqueName .$part["ext"]);
					
					copy($path, $this->path .$part["name"] .$uniqueName .$part["ext"]);
					
					if($this->IsImage($path)){
						if($createThumb1 == "1"){
							if($suffixPosition1 == "1"){
								$thumbName = $suffix1 .$part["name"] .$part["ext"];
							}else{
								$thumbName = $part["name"] .$suffix1 .$part["ext"];		
							}							
							if(file_exists($this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName)){
								if($suffixPosition1 == "1"){
									$newThumbName = $suffix1 .$part["name"] .$uniqueName .$part["ext"];
								}else{
									$newThumbName = $part["name"] .$uniqueName .$suffix1 .$part["ext"];
								}
								
								$this->WriteLog("Copy thumb : Source " .$this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName);
								$this->WriteLog("Copy thumb : Dest " .$this->path .$newThumbName);
								
								$oUploadFile['thumbPath'] = $this->GetRelativePath($this->path .$newThumbName);
								copy($this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName, $this->path .$newThumbName);								
							}
						}
						
						if($createThumb2 == "1"){
							if($suffixPosition2 == "1"){
								$thumbName = $suffix2 .$part["name"] .$part["ext"];
							}else{
								$thumbName = $part["name"] .$suffix2 .$part["ext"];		
							}
							if(file_exists($this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName)){
								if($suffixPosition1 == "1"){
									$newThumbName = $suffix2 .$part["name"] .$uniqueName .$part["ext"];
								}else{
									$newThumbName = $part["name"] .$uniqueName .$suffix2 .$part["ext"];
								}
								
								$this->WriteLog("Copy thumb2 : Source " .$this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName);
								$this->WriteLog("Copy thumb2 : Dest " .$this->path .$newThumbName);
								
								$oUploadFile['thumb2Path'] = $this->GetRelativePath($this->path .$newThumbName);
								copy($this->tempPath ."Thumb" .$this->GetPathSeparator() .$thumbName, $this->path .$newThumbName);								
							}
						}
						
					}
					$oUploadFile['name'] = $part["name"] .$uniqueName .$part["ext"];
					$oUploadFile['length'] = filesize($path);
					$oUploadFile['part'] = $part;
					
					$this->uploadedFiles[] = $oUploadFile;
					
					$this->WriteLog("Copy file : oUploadFile " .var_export($oUploadFile, true));
				}
			}
		}
			
		closedir($directoryHandle); 
		
		$this->DeleteTempFolder($this->tempPath);
	}
	
	function GetFileName($strSaveToPath, $fileName){
	 	//value="0" Overwrite
		//value="1" Use Unique Name
		//value="2" Skipping the file		  
		if($this->overwriteMode == "0" || $this->overwriteMode == "2"){
			return $fileName;
		}
		
		$counter = 0;
		$part = $this->GetFilePart($strSaveToPath .$fileName);
		$newFullPath = $strSaveToPath .$fileName;
		
		while(file_exists($newFullPath)){
			$counter ++;
			$newFullPath = $strSaveToPath .$part['name'] ." - Copy " .$counter .$part['ext'];
		}
		$part = $this->GetFilePart($newFullPath);
		return $part['name'] .$part['ext'];		
	}
	
	
	function TestEnvironment(){
		return;
		
		//SetUploadFolder()
//		
//		Dim fso, fileName, testFile, streamTest
//		TestResult = ""
//		
//		Set fso = Server.CreateObject("Scripting.FileSystemObject")
//		if not fso.FolderExists($this->path) then
//			TestResult = "<B>Folder " & $this->path & " does not exist.</B><br>The value of your $this->path is incorrect. Open uploadTester.asp in an editor and change the value of $this->path to the pathname of a directory with write permissions."
//		end if
//						
//		if TestResult = "" then
//			fileName = $this->path & "\test.txt"
//			err.clear
//			on error resume next
//			Set testFile = fso.CreateTextFile(fileName, true)
//			If Err.Number<>0 then
//				TestResult = "<B>Folder " & $this->path & " does not have write permissions.</B><br>The value of your $this->path is incorrect. Open uploadTester.asp in an editor and change the value of $this->path to the pathname of a directory with write permissions."
//				exit function
//			end if
//			Err.Clear
//			testFile.Close
//			fso.DeleteFile(fileName)
//			If Err.Number<>0 then
//				TestResult = "<B>Folder " & $this->path & " does not have delete permissions</B>, although it does have write permissions.<br>Change the permissions for IUSR_<I>computername</I> on this folder."
//			end if
//			Err.Clear
//		end if
//			
		
		
		//'if not fso.FolderExists($this->tempPath) then
//		'	TestResult = "<B>Folder " & $this->tempPath & " does not exist.</B><br>The value of your $this->path is incorrect. Open uploadTester.asp in an editor and change the value of $this->path to the pathname of a directory with write permissions."
//		'end if
//		
//		'if TestResult = "" then
//		'	fileName = $this->tempPath & "\test.txt"
//		'	on error resume next
//		'	Set testFile = fso.CreateTextFile(fileName, true)
//		'	If Err.Number<>0 then
//		'		TestResult = "<B>Folder " & $this->tempPath & " does not have write permissions.</B><br>The value of your $this->path is incorrect. Open uploadTester.asp in an editor and change the value of $this->path to the pathname of a directory with write permissions."
//		'		exit function
//		'	end if
//		'	Err.Clear
//		'	testFile.Close
//		'	fso.DeleteFile(fileName)
//		'	If Err.Number<>0 then
//		'		TestResult = "<B>Folder " & $this->tempPath & " does not have delete permissions</B>, although it does have write permissions.<br>Change the permissions for IUSR_<I>computername</I> on this folder."
//		'	end if
//		'	Err.Clear
//		'end if
				
		
		//if TestResult <> "" then
//			Set streamTest = Server.CreateObject("ADODB.Stream")
//			If Err.Number<>0 then
//				TestResult = "<B>The ADODB object <I>Stream</I> is not available in your server.</B><br>Check the Requirements page for information about upgrading your ADODB libraries."
//			end if
//			Set streamTest = Nothing
//		end if
//		
//				
//		if TestResult <> "" then
//			WriteLog TestResult
//			ShowError TestResult
//		end if
	}

	function ShowError($errMsg){
		ob_clean();
		echo "Multiple File Upload<br>";
		echo "Error find<br>";
		echo $errMsg;
		exit();
	}
	
	function GetTemplate($fileName){
		$filePath = $this->rootPath ."dwzMultipleUpload/" .$this->GetGraphicPath() ."/" .$fileName;
		$filePath = $this->GetRealPath($filePath);
		$retVal = file_get_contents($filePath); 
		return $retVal;
	}
	
	function GetPageUrl(){
		$path_info = @$_SERVER['ORIG_PATH_INFO'];
		if (!$path_info) $path_info = @$_SERVER['PATH_INFO'];
		if (!$path_info) $path_info = @$PHP_SELF;
		if (!$path_info) $path_info = @$_SERVER['PHP_SELF'];
		return $path_info;
	}
	
	function GetMainInfoForLog(){
		$txt = array();
		$txt[] = "- START LOG --------";
		$txt[] = date("F j, Y, g:i a");
		
		$txt[] = "Path: " .$this->path;
		$txt[] = "Temp path: " .$this->tempPath;
		$txt[] = "Log path: " .$this->logPath;
		
		$txt[] = $_SERVER['REMOTE_ADDR'];
		$txt[] = "----------";
		$txt[] = "Request QueryString: ";
		foreach($_GET as $key => $val){
			$txt[] = $key ."=>" .$val;
		}
		$txt[] = "----------";
		$txt[] = "Form elements";
		foreach($_POST as $key => $val){
			$txt[] = $key ."=>" .$val;
		}
				
		$txt[] = "----------";
		$txt[] = "Uploaded files";
		if(count($this->uploadedFiles) != 0){
			foreach($this->uploadedFiles as $fileItem){
				$txt[] = var_export($fileItem, true);
				$txt[] = "--";
			}
		}
		$txt[] = " ";
		return implode("\n", $txt);
	}
	
	
	function WriteLog($errMsg){
		if(strtolower($this->logEnabled) != "true"){
			return;
		}
		
		if($this->logPath == ""){
			return;
		}
		$errMsg .= "\n";
		
		//if (is_writable($this->logPath)) {
			$fullPath = $this->logPath;
			if (!$handle = fopen($fullPath, 'a')) {
				exit();
			}
			if (fwrite($handle, $errMsg) === FALSE) {
				exit();
			}
			fclose($handle);		
		//}		
	}
			
	function CreateTempFolder(){				
		$this->DeleteTempFolder($this->tempPath);
		$this->CreateFoldersTree($this->tempPath);
		$this->CreateFoldersTree($this->tempPath ."Thumb");
	}
	
	function GetLastError(){
		
		$value = "";
		if(isset($_COOKIE["dwzMultipleUpload_LastError_" .$this->instance])){
			$value = $_COOKIE["dwzMultipleUpload_LastError_" .$this->instance];
		}
		$xmlContent = "<" ."?xml version=\"1.0\" encoding=\"" .$this->xmlEncoding ."\"?>\n";
		$xmlContent .= "<root>\n";
		$xmlContent .= "<message><![CDATA[" .$value ."]]></message>\n";
		$xmlContent .= "</root>";
		
		setcookie("dwzMultipleUpload_LastError_" .$this->instance, "");
		
		ob_clean();
		header('Content-type: text/xml');
		header('Content-Length: ' .strlen($xmlContent));
		echo $xmlContent;
		exit();

	}
	
	function GetRelativePath($fullPath){
		if($this->rootPath == ""){
			$root = $this->GetRealPath("/");
		}else{
			$root = $this->GetRealPath($this->rootPath);
		}				
		if(strtolower(substr($fullPath, 0, strlen($root))) == strtolower($root)){
			$relPath = substr($fullPath, strlen($root) - 1);
		}else{
			$relPath = $fullPath;
		}
		$relPath = preg_replace("/\\\/", "/", $relPath);
		return $relPath;
	}	
} 
?>