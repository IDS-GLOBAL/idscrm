<?php
// Request selected language - by Ciprian

$hl = (isset($_POST["hl"])) ? $_POST["hl"] : false;
if(!defined("L_LANG") || L_LANG == "L_LANG")
{
	if($hl) define("L_LANG", $hl);

	// You need to tell the class which language do you use.
	// L_LANG should be defined as en_US format!!! Next line is an example, just uncomment it and put your own language from the provided list
	//define("L_LANG", "ja_JP");
	else define("L_LANG", "en_US");
}
// START OF: Needed for the manual Language selector - not needed if you pass the LANG from your own script
		$langs='calendar/lang/';
		$langfiles = opendir($langs); #open directory
			$i = 0;
			while (false !== ($langfile = readdir($langfiles)))
			{
				if (!stristr($langfile,"html") && !stristr($langfile,"localization") && !stristr($langfile,"xx_YY") && $langfile!=='.' && $langfile!=='..')
				{
					$hl=str_replace("calendar.","",$langfile);
					$hl=str_replace(".","",$hl);
					$hl=str_replace("php","",$hl);
					$langsfile[]=$hl;
			 		$i++;
				}
			}
			if ($langsfile)
			{
				array_push($langsfile, "en_US");
			  	natsort($langsfile);
			}
			closedir($langfiles);
// END OF: Needed for the manual Language selector - not needed if you pass the LANG from your own script
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>My Test</p>
<p>&nbsp;</p>
<p><input type="button" name="button3" id="button3" value="<?php echo(L_CHK_VAL); ?>" onClick="javascript:alert(this.form.date3.value);"></p>
</body>
</html>