<?php
/* Those that are comment out are those record sets changed to mysqli from mysql */
//mysqli_free_result($userDets);

mysqli_free_result($dealer_state_taft);

mysqli_free_result($last_deal_number);

mysqli_free_result($find_sales_person);

mysqli_free_result($dlrSlctBySsnDid);

mysqli_free_result($system_tasks);

mysqli_free_result($find_dealertask);

//mysqli_free_result($LiveVehicles);

mysqli_free_result($find_vehicle);

//mysqli_free_result($find_vehicle_photos);

mysqli_free_result($vehiclesOnHld);
mysqli_free_result($carYears);

mysqli_free_result($customer_leads);

mysqli_free_result($find_unreadleads);

mysqli_free_result($fb_users);

mysqli_free_result($true_salesperson);
mysqli_free_result($true_salesperson2);

//mysqli_free_result($managers);

mysqli_free_result($manager_nav);
mysqli_free_result($acct_rep_nav);
mysqli_free_result($repair_shops);


mysqli_close($idsconnection_mysqli);
mysqli_close($tracking_mysqli);
mysqli_close($idschatconnection_mysqli);

?>
