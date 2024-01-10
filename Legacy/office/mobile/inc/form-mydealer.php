<form action="#" method="get">

			<h1>Company Name: <?php echo $row_myDealer['company']; ?> Dealer Information - #<?php echo $row_myDealer['id']; ?></h1>

			<h2>Address Location: &nbsp;&nbsp;<?php echo $row_myDealer['address']; ?> </h2>

			<h2>City/State/Zip: &nbsp;&nbsp;<?php echo $row_myDealer['city']; ?>, <?php echo $row_myDealer['state']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_myDealer['zip']; ?></h2>

			<h2>Phone: <?php echo $row_myDealer['phone']; ?> </h2>

			<h2>Fax: <?php echo $row_myDealer['fax']; ?> </h2>

	<h2>Email: <?php echo $row_myDealer['email']; ?> - Also Login Credential - <a href="../../recover-email.php?token=<?php echo $row_myDealer['token']; ?>" target="_blank">Send Password Reminder</a></h2>


<table width="100%">
	<tr>
    	<td title="Primary Contact">
	<h2>Point Of Contact: <?php echo $row_myDealer['contact']; ?></h2>
	<h2>Phone: <?php echo $row_myDealer['contact_phone']; ?> <?php echo $row_myDealer['contact_phone_type']; ?></h2>    
		</td>
        <td title="Secondary Contact">
	<h2>Secondary Point Of Contact: <?php echo $row_myDealer['dmcontact2']; ?></h2>
	<h2>Phone: <?php echo $row_myDealer['dmcontact2_phone']; ?> <?php echo $row_myDealer['dmcontact2_phone_type']; ?></h2>    
        </td>
        </tr>
</table>

	<h1>Website URL: 
    
    			<a href="http://www.<?php echo $row_myDealer['website']; ?>" target="_blank">
    				http://www.<?php echo $row_myDealer['website']; ?>
                </a>
    </h1>

			<table width="100%">
            	<tr>
                	<td>
                    

            
            
			<h2>Sales Name: <?php echo $row_myDealer['sales']; ?></h2>
            
			<h2>Finance Name: <?php echo $row_myDealer['finance']; ?></h2>
                    
                    </td>

                    <td>
                    
			<h2>Sales Phone: <?php echo $row_myDealer['sales_contact']; ?></h2>
            
			<h2>Finance Phone: <?php echo $row_myDealer['finance_contact']; ?></h2>
                    
                    
                    </td>
                </tr>
            </table>
            

<table width="100%" >
	<tr>
    	<td>
		<h1>All Time Count Of Live Inventory: <a href="%"><?php echo $totalRows_mydealerLeads; ?></a> &nbsp; <a href="mydealer-addinventory.php?token=<?php echo $did; ?>" target="_parent">Add Inventory</a></h1></td>
    	<td>
        	<h1>All Time Count Of Delivered Leads: <a href="%"><?php echo $totalRows_mydealerInventoryLive; ?></a>
        </h1></td>

    </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><h1><a href="mydealerinventory.php?id=<?php echo $did; ?>" target="_parent">View Inventory</a></h1></td>
    </tr>
</table>
            
			  <!-- <p>This page contains various progressive-enhancement driven form controls. Native elements are sometimes hidden from view, but their values are maintained so the form can be submitted normally. </p>

			<p>Browsers that don't support the custom controls will still deliver a usable experience, because all are based on native form elements.</p>
			-->
			<!-- 
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
-->

            
                  <div class="ui-body ui-body-b">
                        
                        <?php //include("inc/dudes-mobile-footer.php"); ?>
                        
                    </div>
            

   	</form>