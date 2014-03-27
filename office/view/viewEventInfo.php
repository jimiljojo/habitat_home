<? php

	// TITLE: Office ViewEvents view 
	// FILE: office/view/viewEventInfo.php
	// AUTHOR: sbkedia


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

<form action="index.php" method="GET">
	<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" id="act" type="hidden" value="update" >


<h3 class="bold">Create Event</h3>

<?php 
	$event_id= isset($_SESSION['Id']) ? $_SESSION['Id'] : 'null';
	$Event= readEventByID($event_id);
	$Event_type= readEvent_Types();

	foreach ($Event as $EventItem) {
	echo $EventItem->getTitle();
}
	?>
	<table cellspacing="10">
		<tr>
			<td>Title:<span class="mandatory">*</span></td>
			<td><input type="text" name="title" value="<?php echo $EventItem->getTitle(); ?>" ></td>
		<tr>
		
		<tr>	
			<td>Type: <span class="mandatory">*</span></td>
			<td><select name="type">
					<option value ="" selected="selected">Choose Type</option>
					 <?php
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

		
		<tr><td>Date: <span class="mandatory">*</span></td><td><input type="text" name="date" value="<?php echo $EventItem->getDate(); ?>"> <label>YYYY-MM-DD</label></td></tr>
		<tr><td>Time: <span class="mandatory">*</span></td><td><input type="text" name="time" value="<?php echo $EventItem->getTime(); ?>"> <label>24:59</label></td></tr>

		<?php 
		$Address = readAddressByID($EventItem->getAddress()); ?>
		<tr><td>Street 1: <span class="mandatory">*</span></td><td><input type="text" name="street1" id="street2" value="<?php echo $Address->getStreet1(); ?>"></td></tr>
		<tr><td>Street 2: </td><td><input type="text" name="street2" id="street2" value="<?php echo $Address->getStreet2(); ?>" ></td></tr>
		<tr><td>City: <span class="mandatory">*</span></td><td><input type="text" name="city" id="city" value="<?php echo $Address->getCity(); ?>"></td></tr>
		<tr><td>State: <span class="mandatory">*</span></td><td><input type="text" name="state" id="state" value="<?php echo $Address->getState(); ?>"></td></tr>
		<tr><td>Zip code: <span class="mandatory">*</span></td><td><input type="text" name="zipcode" id="zipcode" value="<?php echo $Address->getZip(); ?>"></td></tr>

		<tr><td>Sponsor: <span class="mandatory">*</span></td><td><input type="text" name="sponsor" id="sponsor" value="<?php echo $EventItem->getSponsoredBy(); ?>"></td></tr>

	</table>

	<input type="submit" value="Update">

</form>	