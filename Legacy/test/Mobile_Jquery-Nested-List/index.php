<?php require_once('../../Connections/idsconnection.php'); ?>
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
$query_carmakes = "SELECT * FROM car_make";
$carmakes = mysqli_query($idsconnection_mysqli, $query_carmakes);
$row_carmakes = mysqli_fetch_assoc($carmakes);
$totalRows_carmakes = mysqli_num_rows($carmakes);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Nested List : &lt;default&gt;</title>
<link type='text/css' href='jquery.mobile-1.0/jquery.mobile-1.0.css' rel='stylesheet'/>
<link type='text/css' href='css/jqm-docs.css' rel='stylesheet'/>
<script type='text/javascript' src='jquery.mobile-1.0/jquery-1.6.4.min.js'></script>
<script type='text/javascript' src='jquery.mobile-1.0/jquery.mobile-1.0.min.js'></script>
</head>

<body>
<div data-role="page">
        <div id="jqm-homeheader">
				  <h1 id="jqm-logo"><img src="images/jquery-mobile-logo-small.png" alt="jQuery Mobile Framework" /></h1>
				  <p>A Touch-Optimized Web Framework for Smartphones &amp; Tablets</p>
			  </div>
				<div data-role="content" data-theme="c">
					<ul data-role="listview"  data-inset="true">
					  
			      <li data-theme="c">
				      <h3>Animals</h3>
				      <p>All your favorites from aarkvarks to zebras.</p>
			
				      <ul data-theme="c">

					      <li>Pets
						      <ul data-theme="c">
							      <li><a href="index.html">Canary</a></li>
							      <li><a href="index.html">Cat</a></li>
							      <li><a href="index.html">Dog</a></li>
							      <li><a href="index.html">Gerbil</a></li>
							      <li><a href="index.html">Iguana</a></li>

							      <li><a href="index.html">Mouse</a></li>
						      </ul>
					      </li>
					      <li>Farm animals
						      <ul data-theme="c">
							      <li><a href="index.html">Chicken</a></li>
							      <li><a href="index.html">Cow</a></li>
							      <li><a href="index.html">Duck</a></li>

							      <li><a href="index.html">Horse</a></li>
							      <li><a href="index.html">Pig</a></li>
							      <li><a href="index.html">Sheep</a></li>
						      </ul>
					      </li>
					      <li>Wild animals
						      <ul data-theme="c">
							      <li><a href="index.html">Aardvark</a></li>

							      <li><a href="index.html">Alligator</a></li>
							      <li><a href="index.html">Ant</a></li>
							      <li><a href="index.html">Bear</a></li>
							      <li><a href="index.html">Beaver</a></li>
							      <li><a href="index.html">Cougar</a></li>
							      <li><a href="index.html">Dingo</a></li>

							      <li><a href="index.html">Eagle</a></li>
							      <li><a href="index.html">Elephant</a></li>
							      <li><a href="index.html">Ferret</a></li>
							      <li><a href="index.html">Frog</a></li>
							      <li><a href="index.html">Giraffe</a></li>
							      <li><a href="index.html">Lion</a></li>

							      <li><a href="index.html">Monkey</a></li>
							      <li><a href="index.html">Panda bear</a></li>
							      <li><a href="index.html">Polar bear</a></li>
							      <li><a href="index.html">Tiger</a></li>
							      <li><a href="index.html">Zebra</a></li>
						      </ul>

					      </li>
				      </ul>
			      </li>
			      <li>

				      <h3>Colors</h3>
				      <p>Fresh colors from the magic rainbow.</p>
	
				      <ul data-theme="c">

					      <li><a href="index.html">Blue</a></li>
					      <li><a href="index.html">Green</a></li>
					      <li><a href="index.html">Orange</a></li>
					      <li><a href="index.html">Purple</a></li>
					      <li><a href="index.html">Red</a></li>
					      <li><a href="index.html">Yellow</a></li>

					      <li><a href="index.html">Violet</a></li>
				      </ul>
			      </li>
			      <li>
				      <h3>Vehicles</h3>
				      <p>Everything from cars to planes.</p>
				
				      <ul data-theme="c">

					      <li>Cars
						      <ul data-theme="c">
							      <li><a href="index.html">Acura</a></li>
							      <li><a href="index.html">Audi</a></li>
							      <li><a href="index.html">BMW</a></li>
							      <li><a href="index.html">Cadillac</a></li>
							      <li><a href="index.html">Chrysler</a></li>

							      <li><a href="index.html">Dodge</a></li>
							      <li><a href="index.html">Ferrari</a></li>
							      <li><a href="index.html">Ford</a></li>
							      <li><a href="index.html">GMC</a></li>
							      <li><a href="index.html">Honda</a></li>
							      <li><a href="index.html">Hyundai</a></li>

							      <li><a href="index.html">Infiniti</a></li>
							      <li><a href="index.html">Jeep</a></li>
							      <li><a href="index.html">Kia</a></li>
							      <li><a href="index.html">Lexus</a></li>
							      <li><a href="index.html">Mini</a></li>
							      <li><a href="index.html">Nissan</a></li>

							      <li><a href="index.html">Porsche</a></li>
							      <li><a href="index.html">Subaru</a></li>
							      <li><a href="index.html">Toyota</a></li>
							      <li><a href="index.html">Volkswagon</a></li>
							      <li><a href="index.html">Volvo</a></li>
						      </ul>

					      </li>
					      <li>Planes
						      <ul data-theme="c">
							      <li><a href="index.html">Boeing</a></li>
							      <li><a href="index.html">Cessna</a></li>
							      <li><a href="index.html">Derringer</a></li>
							      <li><a href="index.html">Embraer</a></li>

							      <li><a href="index.html">Gulfstream</a></li>
							      <li><a href="index.html">Piper Aircraft</a></li>
							      <li><a href="index.html">Raytheon</a></li>
						      </ul>
					      </li>
					      <li>Construction
						      <ul data-theme="c">
							      <li><a href="index.html">Caterpillar</a></li>

							      <li><a href="index.html">Ford</a></li>
							      <li><a href="index.html">John Deere</a></li>

						      </ul>
					      </li>				
				      </ul>
			      </li>
            
            
					</ul>
				</div>
			</div>
</body>
</html>
<?php
mysqli_free_result($carmakes);
?>