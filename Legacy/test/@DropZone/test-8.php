<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dropzone Intro</title>
<link rel="stylesheet" href="dropzone-master/dist/dropzone.css" />
<link rel="stylesheet"  href="dropzone-master/dist/min/dropzone.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="dropzone-master/dist/dropzone.js"></script>

</head>

<body>.
<p>Test 8 - test-8.php
</p>
<p>This test requires you to click and upload and then click submit all files.</p>
<p> <a id="external_upload_salesperson_photos" class="btn btn-xs btn-primary" style="padding:3px;"> Click Here To Add Photos</a></p>
<p>Dropzone From Envyo/Dropzone At GitHub With Fall Back:</p>
<div id="my-dropzone" style="background:#666;">
<button id="submit-all">Submit all files</button>
<form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666;">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>
</div>
<p>&nbsp;</p>
<p>Clear Photos In DropZone:</p>

<p><a id="clear_outphotos" class="btn btn-xs btn-primary">Clear Photos</a></p>
<script type="text/javascript" src="customjs/test-8.js"></script>
</body>
</html>