<?php



// Make Dealer Folder
	if (file_exists($frazer_file)) {
		$log .= "Processing Frazer Dealer File $frazerid";

		require_once("import_frazerdealer.php");
			
	}else{

		 $log .= ':::::::::::::::::::::::::::::::::::::::::::::::::::::::'.'<br />';	
		 $log .= 'Sorry to say :( There Are No Files For This Frazer User In Our System'.'<br />';
		 $log .= 'We Are Exiting The Building!'.'<br />';
		//exit;
		
	}

	// Make Vehicle Folder
	if (file_exists($frazer_file)) {
		
		//mkdir("../vehicles/photos/$thisdid/$thisvid", 0777, true);
		 $log .=':::::::::::::::::::::::::::::::::::::::::::::::::::::::'.'<br />';
		 $log .= 'Happy to Say :) We Have Files For This Frazer User In Our System'.'<br />';
	
			require_once("import_frazervehicles.php");

	}else{

		 $log .= ':::::::::::::::::::::::::::::::::::::::::::::::::::::::';
		 $log .= 'No Vehicles Were Imported Into The System At This Time.';
		//exit;
	}



?>