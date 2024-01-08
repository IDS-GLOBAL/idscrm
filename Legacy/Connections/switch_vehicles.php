<?php

$insert = "";

if( isset($_GET['thisStockno'])){
$thisStockno =  mysql_real_escape_string($_GET['thisStockno']);
}

if( isset($_GET['thiscondition'])){
$thiscondition =  mysql_real_escape_string($_GET['thiscondition']);
}

if( isset($_GET['thismake'])){
$thismake =  mysql_real_escape_string($_GET['thismake']);
}

if( isset($_GET['thismodel'])){
$thismodel =  mysql_real_escape_string($_GET['thismodel']);
}

if( isset($_GET['thisyear'])){
$thisyear =  mysql_real_escape_string($_GET['thisyear']);
}

if( isset($_GET['thisbody'])){
$thisbody =  mysql_real_escape_string($_GET['thisbody']);
}

if( isset($_GET['thisvid'])){
$thisvid =  mysql_real_escape_string($_GET['thisvid']);
}

if( isset($_GET['thisdid'])){
$thisdid =  mysql_real_escape_string($_GET['thisdid']);
}

if( isset($_GET['thispager'])){
$thispager =  mysql_real_escape_string($_GET['thispager']);
}

if( isset($_GET['sortprice'])){
$sortprice =  mysql_real_escape_string($_GET['sortprice']);
}


///This is only for The Top Search Bar To Use On Query Pull Of Content vehicles.php
if( isset($_GET['thecondition'], $_GET['themakes'], $_GET['themodels'])){
	$thecondition =  mysql_real_escape_string($_GET['thecondition']);
	$themakes =  mysql_real_escape_string($_GET['themakes']);
	$themodels =  mysql_real_escape_string($_GET['themodels']);
}

if( isset($_POST['thecondition'], $_POST['themakes'], $_POST['themodels'])){
	$thecondition =  mysql_real_escape_string($_POST['thecondition']);
	$themakes =  mysql_real_escape_string($_POST['themakes']);
	$themodels =  mysql_real_escape_string($_POST['themodels']);
}


if( isset($_GET['seecondition'], $_GET['seemakes'])){
	$seecondition =  mysql_real_escape_string($_GET['seecondition']);
	$seemakes =  mysql_real_escape_string($_GET['seemakes']);
}

if( isset($_GET['seecondition'], $_GET['seemakes'], $_GET['seemodels'])){
	$seecondition =  mysql_real_escape_string($_GET['seecondition']);
	$seemakes =  mysql_real_escape_string($_GET['seemakes']);
	$seemodels =  mysql_real_escape_string($_GET['seemodels']);
}


if( isset($_GET['domakes'])){
	$domakes =  mysql_real_escape_string($_GET['domakes']);
}
$homenet_dependent = "AND vehicles.homenetDo = '0' AND vehicles.importHomnetPhotos IS NOT NULL";



$dealer = "AND `vehicles`.vlivestatus = '1' AND `vehicles`.did = $thisdid AND `dealers`.id = $thisdid $homenet_dependent";
$dealerr = " `vehicles`.vlivestatus = '1' AND `vehicles`.did = $thisdid AND `dealers`.id = $thisdid";


if(isset($thisStockno)){
$insert = "`vehicles`.vstockno = '$thisStockno' $dealer";
$gett = "&thisStockno=$thisStockno";
}
if(isset($thiscondition)){
$insert = "`vehicles`.vcondition = '$thiscondition' $dealer";
$gett = "&thiscondition=$thiscondition";
}

if(isset($thecondition)){
$insert = "`vehicles`.vcondition = '$thecondition' AND `vehicles`.vmake = '$themakes' AND `vehicles`.vmodel = '$themodels' $dealer";
$gett = "&thecondition=$thecondition&themake=$themakes&themodel=$themodels";
}

if(isset($thisvcertified)){
$insert = "`vehicles`.vcertified = '$thisvcertified' $dealer";
$gett = "&thisvcertified=$thisvcertified";
}

if(isset($thismake)){
$insert = "`vehicles`.vmake = '$thismake' $dealer";
$gett = "&thismake=$thismake";
}

if(isset($thismodel)){
$insert = "`vehicles`.vmodel = '$thismodel' $dealer";
$gett = "&thismodel=$thismodel";
}

if(isset($thisyear)){
$insert = "`vehicles`.vyear = '$thisyear' $dealer";
$gett = "&thisyear=$thisyear";
}

if(isset($thisbody)){
$insert = "`vehicles`.vbody = '$thisbody' $dealer";
$gett = "&thisbody=$thisbody";
}

if(isset($thisvid)){
$insert = "`vehicles`.vid = '$thisvid' $dealer";
$gett = "&thisvid=$thisvid";
}

if( isset($_GET['seecondition'], $_GET['seemakes'])){
$insert = "`vehicles`.vcondition = '$seecondition' AND `vehicles`.vmake = '$seemakes' $dealer";
$gett = "&seecondition=$seecondition&seemakes=$seemakes";
	
}

if( isset($_GET['seecondition'], $_GET['seemakes'], $_GET['seemodels'])){
$insert = "`vehicles`.vcondition = '$seecondition' AND `vehicles`.vmake = '$seemakes' AND `vehicles`.vmodel = '$seemodels' $dealer";
$gett = "&seecondition=$seecondition&seemakes=$seemakes&seemodels=$seemodels";
	
}




if( isset($domakes)){
$insert = "`vehicles`.vmake = '$domakes' $dealer";
$gett = "&domakes=$domakes";
	
}


if(isset($thispager)){
$pager = $thispager;

}

//Preparing For Order Defining Variable For True Result.
$sortvrprice = '`vehicles`.vrprice ASC';

//Let's Check If SortPrice Is Exsist Before We Query.

if(isset($sortprice)){
		 
			if($sortprice == 'high'){
			$sortvrprice = '`vehicles`.vrprice DESC';
			$gett = $gett."&sortprice=$sortprice";
			}
			elseif($sortprice == 'low'){
			$sortvrprice = '`vehicles`.vrprice ASC';
			$gett = $gett."&sortprice=$sortprice";
			}

		 }

$ORDERBY = "ORDER BY  $sortvrprice, `vehicles`.created_at ASC";



if($insert == ""){$insert = " $dealerr";}
$insert = $insert.' '."$ORDERBY";

//$sql = "SELECT * FROM `vehicles`,`dealers` WHERE vehicles.did  = '$thisdid' AND `vehicles`.vlivestatus = '1' AND `vehicles`.did = $thisdid AND `dealers`.id = $thisdid ORDER BY `vehicles`.created_at ASC";

?>