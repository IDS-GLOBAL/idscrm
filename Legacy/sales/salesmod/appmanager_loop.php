<?php
		$appsid = $row_credit_apps['credit_app_fullblown_id'];
		
		
		if(!$appsid){
			
			include('_appmanager_loop-no-display.php');
		
		}else{
			
			include('_appmanager_loop.php');
		}
?>