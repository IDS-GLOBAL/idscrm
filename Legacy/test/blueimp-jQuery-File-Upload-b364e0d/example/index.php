<?php require_once('../../../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_select_vehicle = "SELECT * FROM vehicles WHERE did = 23";
$select_vehicle = mysqli_query($idsconnection_mysqli, $query_select_vehicle);
$row_select_vehicle = mysqli_fetch_assoc($select_vehicle);
$totalRows_select_vehicle = mysqli_num_rows($select_vehicle);
$vid = $row_select_vehicle['vid'];
$did = $row_select_vehicle['did'];
?>
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin HTML Example 5.0.5
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>jQuery File Upload Example</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" id="theme">
<link rel="stylesheet" href="http://idscrm.com/dealer/js/blue-upload/jquery.fileupload-ui.css">
<link rel="stylesheet" href="bluimp-style.css">
</head>
<body>

<?php echo 'Did = '.$did; ?>
<br />
<?php echo 'Vid = '.$vid; ?>

<div id="fileupload">

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="fileupload-buttonbar">
            <label class="fileinput-button">
                <span>Add files...</span>
                <input type="file" name="files[]" multiple>
                <input name="did" type="hidden" value="<?php echo $did; ?>">
                <input name="vid" type="hidden" value="<?php echo $vid; ?>">                
            </label>
            <button type="submit" class="start">Start upload</button>
            <button type="reset" class="cancel">Cancel upload</button>
            <button type="button" class="delete">Delete files</button>
        </div>
    </form>
    
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
    
</div>


<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button>Start</button></td>
        {{/if}}
        <td class="cancel"><button>Cancel</button></td>
    </tr>
</script>
<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="delete">
            <button data-type="${delete_type}" data-url="${delete_url}">Delete</button>
        </td>
    </tr>
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script src="http://idscrm.com/dealer/js/blue-upload/jquery.iframe-transport.js"></script>
<script src="http://idscrm.com/dealer/js/blue-upload/jquery.fileupload.js"></script>
<script src="http://idscrm.com/dealer/js/blue-upload/jquery.fileupload-ui.js"></script>
<script src="application.js"></script>
</body> 
</html>
<?php
mysqli_free_result($select_vehicle);
?>
