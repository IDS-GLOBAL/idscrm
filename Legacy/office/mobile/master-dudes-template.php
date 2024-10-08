<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Form Gallery Local : Sales Person Theme</title>
<link type='text/css' href='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min.css' rel='stylesheet'/>
<link type='text/css' href='../css/jqm-docs.css' rel='stylesheet'/>
<script type='text/javascript' src='../js/jquery-1.6.1.min.js'></script>
<script type='text/javascript' src='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min.js'></script>
</head>

<body>
<div data-role="page">

				<div id="jqm-homeheader" class="ui-mobile">
					<h1 id="jqm-logo"><img src="../images/jquery-mobile-logo.png" alt="jQuery Mobile Framework" width="235" height="61" /></h1>
					<p>A Touch-Optimized Web Framework for Smartphones &amp; Tablets</p>
				</div>
		
				<div data-role="content" data-theme="a">
					


		<form action="#" method="get">

			<h2>Form elements</h2>

			<!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
			<div data-role="fieldcontain">
	         <label for="name">Text Input:</label>
	         <input type="text" name="name" id="name" value=""  />
			</div>

			<div data-role="fieldcontain">
			<label for="textarea">Textarea:</label>
			<textarea cols="40" rows="8" name="textarea" id="textarea"></textarea>

			</div>

			<div data-role="fieldcontain">
	         <label for="search">Search Input:</label>
	         <input type="search" name="password" id="search" value=""  />
			</div>

			<div data-role="fieldcontain">
				<label for="slider2">Flip switch:</label>

				<select name="slider2" id="slider2" data-role="slider">
					<option value="off">Off</option>
					<option value="on">On</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="slider">Slider:</label>

			 	<input type="range" name="slider" id="slider" value="0" min="0" max="100"  />
			</div>

			<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<legend>Choose as many snacks as you'd like:</legend>
				<input type="checkbox" name="checkbox-1a" id="checkbox-1a" class="custom" />
				<label for="checkbox-1a">Cheetos</label>

				<input type="checkbox" name="checkbox-2a" id="checkbox-2a" class="custom" />
				<label for="checkbox-2a">Doritos</label>

				<input type="checkbox" name="checkbox-3a" id="checkbox-3a" class="custom" />
				<label for="checkbox-3a">Fritos</label>

				<input type="checkbox" name="checkbox-4a" id="checkbox-4a" class="custom" />
				<label for="checkbox-4a">Sun Chips</label>

		    </fieldset>
			</div>

			<div data-role="fieldcontain">
			<fieldset data-role="controlgroup" data-type="horizontal">
		    	<legend>Font styling:</legend>
		    	<input type="checkbox" name="checkbox-6" id="checkbox-6" class="custom" />
				<label for="checkbox-6">b</label>

				<input type="checkbox" name="checkbox-7" id="checkbox-7" class="custom" />
				<label for="checkbox-7"><em>i</em></label>

				<input type="checkbox" name="checkbox-8" id="checkbox-8" class="custom" />
				<label for="checkbox-8">u</label>
		    </fieldset>
			</div>

			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup">
			    	<legend>Choose a pet:</legend>
			         	<input type="radio" name="radio-choice-1" id="radio-choice-1" value="choice-1" checked="checked" />
			         	<label for="radio-choice-1">Cat</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-2" value="choice-2"  />
			         	<label for="radio-choice-2">Dog</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-3" value="choice-3"  />
			         	<label for="radio-choice-3">Hamster</label>

			         	<input type="radio" name="radio-choice-1" id="radio-choice-4" value="choice-4"  />
			         	<label for="radio-choice-4">Lizard</label>
			    </fieldset>
			</div>

			<div data-role="fieldcontain">
			    <fieldset data-role="controlgroup" data-type="horizontal">
			     	<legend>Layout view:</legend>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-c" value="on" checked="checked" />
			         	<label for="radio-choice-c">List</label>
			         	<input type="radio" name="radio-choice-b" id="radio-choice-d" value="off" />
			         	<label for="radio-choice-d">Grid</label>

			         	<input type="radio" name="radio-choice-b" id="radio-choice-e" value="other" />
			         	<label for="radio-choice-e">Gallery</label>
			    </fieldset>
			</div>

			<div data-role="fieldcontain">
				<label for="select-choice-1" class="select">Choose shipping method:</label>
				<select name="select-choice-1" id="select-choice-1">

					<option value="standard">Standard: 7 day</option>
					<option value="rush">Rush: 3 days</option>
					<option value="express">Express: next day</option>
					<option value="overnight">Overnight</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="select-choice-3" class="select">Your state:</label>
				<select name="select-choice-3" id="select-choice-3">
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>

					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>

					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>

					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>

					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>

					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>

					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>

					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>

					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="select-choice-a" class="select">Choose shipping method:</label>
				<select name="select-choice-a" id="select-choice-a" data-native-menu="false">
					<option>Custom menu example</option>
					<option value="standard">Standard: 7 day</option>
					<option value="rush">Rush: 3 days</option>
					<option value="express">Express: next day</option>

					<option value="overnight">Overnight</option>
				</select>
			</div>

		<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
				<div class="ui-block-a"><button type="submit" data-theme="d">Cancel</button></div>
				<div class="ui-block-b"><button type="submit" data-theme="a">Submit</button></div>

	    </fieldset>
		</div>
	</form>
								
				</div>
			</div>
</body>
</html>