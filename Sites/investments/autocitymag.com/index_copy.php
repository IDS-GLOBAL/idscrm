<?php require_once("db_public.php"); ?>
<?php

if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";


include 'classes/simpleUrl.php';



$url = new simpleUrl('/home');


//echo $_SERVER['REQUEST_URI'];
if( !$url->segment(1) )
	$page = 'home';
else
	$page = $url->segment(1);




switch ($page){
	
	case 'about-us' :
		$view_pagefile = 'views/about-us.php';
	break;
	case 'blog' :
		$view_pagefile = 'views/blog.php';
	break;
	case 'blogs' :
		$view_pagefile = 'views/blogs.php';
	break;
	case 'compare' :
		$view_pagefile = 'views/compare.php';
	break;
	case 'contact-us' :
		$view_pagefile = 'views/contact-us.php';
	break;
	case 'choose' :
		$view_pagefile = 'views/choose.php';
	break;
	case 'faqs' :
		$view_pagefile = 'views/faqs.php';
	break;	
	case 'home' :
		$view_pagefile = 'views/home.php';
	break;
	case 'private-seller' :
		$view_pagefile = 'views/private-seller.php';
	break;
	case 'search' :
		$view_pagefile = 'views/search.php';
	break;
	case 'soon' :
		$view_pagefile = 'views/soon.php';
	break;
	case 'vehicle' :
		$view_pagefile = 'views/vehicle.php';
	break;
	case 'vehicles' :
		$view_pagefile = 'views/vehicles.php';
	break;
	case 'logout' : 
		$view_pagefile = 'classes/script_logout.php';		
	break;	
	default : // 404 page
		$view_pagefile = 'views/home.php';
	break;
}





?>
<?php include("$view_pagefile"); ?>