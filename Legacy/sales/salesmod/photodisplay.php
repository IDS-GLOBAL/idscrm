<?php 

	$file = $row_salespersoninventory['vthubmnail_file'];

	if (!$file){ 
		include"_offdisplay.php"; 
		} else {
			 include'_ondisplay.php';
		} 

?>