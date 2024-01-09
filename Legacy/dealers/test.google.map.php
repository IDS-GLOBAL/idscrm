<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">

div#map_canvas {
	width:100%;
	height:500px;
	min-height: 500px !important;
	display:block;
}

.somecolor{
border: 1px #000 solid; min-height: 200px; background-color:#CCC;
}

</style>
</head>

<body onload="initialize()">

                        <div class="panel-body">
                            <form class="form-inline" action="" method="GET" id="form_map">

								<div class="form-group m-r-10">
                                	<label>Street Number:</label>
                           	    <span id="sprytextfield1">
                                <input id="street_number" name="street_number" type="text" class="form-control"  placeholder="Street Number" value="3368" />
                                
                                <!--span class="textfieldRequiredMsg">A value is required.</span -->
                                
                                <!-- span class="textfieldInvalidFormatMsg">Invalid format.</span -->
                                </span>
                                </div>

								<div class="form-group m-r-10">
                           	    <label>Street Name:</label>
									<input id="street_name" name="street_name" type="text" class="form-control"  placeholder="Street Name" value="Bolfair" />
								</div>

                                

								<div class="form-group m-r-10">
                                	<label>Street Type:</label>
                                        <select id="street_type" class="form-control">
                                            <option value="ALY">ALY</option>
                                            <option value="AVE">AVE</option>
                                            <option value="BLV">BLV</option>
                                            <option value="BLVD">BLVD</option>
                                            <option value="CIR">CIR</option>
                                            <option value="CON">CON</option>
                                            <option value="CRS">CRS</option>
                                            <option value="CT">CT</option>
                                            <option value="DR" selected>DR</option>
                                            <option value="HWY">HWY</option>
                                            <option value="LN">LN</option>
                                            <option value="PKWY">PKWY</option>
                                            <option value="PKY">PKY</option>
                                            <option value="PL">PL</option>
                                            <option value="NT">NT</option>
                                            <option value="PRK">PRK</option>
                                            <option value="RD">RD</option>
                                            <option value="RUN">RUN</option>
                                            <option value="ST">ST</option>
                                            <option value="TER">TER</option>
                                            <option value="TRC">TRC</option>
                                            <option value="TRL">TRL</option>
                                            <option value="VAR">VAR</option>
                                            <option value="WAY">WAY</option>
                                            <option value="WHS">WHS</option>
                                            <option value="WLK">WLK</option>
                                            <option value="Other">Other</option>
                                        </select>
								</div>

                                <div class="panel-body">

								<div class="form-group m-r-10">
                                	<label>City:</label>
									<input id="street_city" type="text" class="form-control"  placeholder="City" value="Atlanta" />
								</div>

<div class="form-group m-r-10">
<label>State:</label>
<select name="street_state" class="form-control" id="street_state">
<option value="Georgia" selected>GA</option>
</select>
								</div>


<div class="form-group m-r-10">
<label>Country:</label>
<select name="street_country" class="form-control" id="street_country">
  <option value="UNITED STATES" selected>UNITED STATES</option>
</select>
								</div>


                                
								</div>
                                
                                <div class="panel-body">

                                    <button type="submit" class="btn btn-sm btn-default">Pull Map</button>

                                    <div class="checkbox m-r-10">
                                        <label>
                                            <input type="checkbox" /> Confirm To List
                                        </label>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary m-r-5">Run</button>
                        
                        		</div>

                                
							</form>
                        </div>

			<h1>Map View</h1>
			<!-- begin row -->
			<div id="see_mapview" class="row somecolor" style="display: block;">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
                    <!-- begin panel -->
                        <div class="panel-body">
                        
                                
                                <div id="map_canvas">
                                        
                                </div>

						</div>

					<!-- end panel -->
			    </div>
			    <!-- end col-12 -->
		    </div>
			<!-- end row -->

<h1>Map Result</h1>
<div id="result" class="somecolor"></div>

<h1>Map Cordinates</h1>
<div id="see_mapcord" class="row somecolor" style="display: block;">
                <!-- begin col-12 -->
                <div class="col-12">
                    <!-- begin panel -->
                                            <div class="panel-body">
                        
                                <div id="property_owner_info">
                                
                                
                                </div>

                 
						</div>

                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>


	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom/google/custom.pullmap.js"></script>

</body>
</html>