<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Dropzone Intro</title>
<div id="mocha"></div>
<script src="dropzone-master/dist/dropzone.js"></script>

</head>

<body>.
<p>Test 4 - test-4.php
</p>
<p>This test requires you to click and upload and then click submit all files.</p>
<p><button id="submit-all">Submit all files</button></p>
<p>No form:</p>

<form id="my-dropzone" action="uploads/upload.php" class="dropzone" style="background:#666; height:100px; width:400px">
  <div class="fallback">
    <input name="file" type="file" multiple />
        <input id="submit"  type="submit" value="SUBMIT" />
  </div>
</form>

<p>&nbsp;</p>
<p>Clear Dropzone:</p>

<p><button id="clear-dropzone">Clear Dropzone</button></p>
<script type="text/javascript" src="customjs/test-4.js"></script>
</body>
</html>