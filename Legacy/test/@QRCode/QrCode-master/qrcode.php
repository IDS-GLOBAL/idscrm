<?php


header('Conent-Type: image/png');

require_once("src/Endroid/QrCode/QrCode.php");

if(isset($_GET['text'])){

	$size = isset($_GET['size']) ? $_GET['size'] : 200;
	$padding = isset($_GET['padding']) ? $_GET['padding'] : 10;
	
	
	$qr = new Endroid\QrCode\QrCode();
	
	
	
	$qr->setText($_GET['text']);
	$qr->setSize($size);
	$qr->setPadding($padding);
	
	$qr->render();

}
?>