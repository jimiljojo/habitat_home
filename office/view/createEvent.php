<?php
	
	// TITLE: Office Event View
	// FILE: office/view/events.php
	// AUTHOR: sbkedia

/*Create Event 
	Create Button
		Display
			Title | Type [drop down] | Date | GuestList [Not Needed here] | Time | Address | Committee [drop down] | Sponsor
				Sent to Update */
?>				

<style>

	.bold {font-weight: bold;}
	.note {font-size: 10pt; color: grey;}
	.mandatory {color: crimson;}


    td
    {
        padding-left: 10px;
        padding-bottom: 10px;
        
    }

</style>

<h3 class="bold">Create Event</h3>

<form name="create" action="index.php" method="get">
	<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" type="hidden" value="confirmCreate" >

	<table cellspacing="10">
		<tr>
			<td>Title:<span class="mandatory">*</span></td>
			<td><input type="text" name="title"></td>
		<tr>
		
		<tr>	
			<td>Type: <span class="mandatory">*</span></td>
			<td><select name="type">
					<option value ="" selected="selected">Choose Type</option>
					 <?php
					 $Event_type= readEvent_Types(); 
					 foreach ($Event_type as $EventTypeItem){ ?>
						<option value= <?php echo $EventTypeItem->getType_id(); ?> > <?php echo $EventTypeItem->getTitle() ?> </option>		
					<?php }// end foreach ?>

				</select></td>

			<td>Committee: </td>
			<td><select name="committee">
					<option value ="">Choose Committee</option>
		 			<?php
					 $committes= readCommittees(); 
					 foreach ($committes as $committeItem){ ?>
						<option value= <?php echo $committeItem->getCommittee_id(); ?> > <?php echo $committeItem->getTitle() ?> </option>		
					<?php }// end foreach ?>
				</select></td>
		</tr>

		<!--
		Date: <input type="text" name="date">
		Time: <input type="text" name="time"><br><br> -->

		<!-- Need to ask how to combine Address/city/state/zipcode -->
		
		<tr><td>Street 1: <span class="mandatory">*</span></td><td><input type="text" name="street1" id="street2"></td></tr>
		<tr><td>Street 2: </td><td><input type="text" name="street2" id="street2"></td></tr>
		<tr><td>City: <span class="mandatory">*</span></td><td><input type="text" name="city" id="city"></td></tr>
		<tr><td>State: <span class="mandatory">*</span></td><td><input type="text" name="state" id="state"></td></tr>
		<tr><td>Zip code: <span class="mandatory">*</span></td><td><input type="text" name="zipcode" id="zipcode"></td></tr>

		<tr><td>Sponsor: <span class="mandatory">*</span></td><td><input type="text" name="sponsor" id="sponsor"></td></tr>

	</table>

<input type="submit" value="Create">
</form>