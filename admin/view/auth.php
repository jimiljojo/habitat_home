<?php

	// TITLE: Admin Authrorization View
	// FILE: admin/view/auth.php
	// AUTHOR: sbkedia & jhp


?>

<style>
	
	div.show {display: block;}
	div.hide {display: none;}
	h4+div{border: 1px solid black;}

</style>

<script>
function swap(divNo) {
    	e=document.getElementById("div"+divNo);
    	eButton=document.getElementById("button"+divNo);
    	
		if (e.className === "hide") {
	    	   e.className = "show";
	    	   eButton.value="Hide";
		} 
		else {
	       e.className = "hide";
	       eButton.value="Show";
		}// end if-else
    }// end function

</script>

<h2>Authorization</h2>
<hr>
<?php if($isAuthorized)
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong>Successfully authorized</div>'; ?>

<h4>Work Hours Authorization
	<input type="button" id="button1" onclick="swap(1);" value="Show"> </h4>

	<div class="hide" id="div1">
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="authorizework" >

		<table class="table table-striped table-hover " style="width:100%">
			<tr>
				<th>Volunteer Name</th>
				<th>Hours Entered By</th>
				<th>Entered On</th>
				<th>Event Name</th>
				<th>Hours</th>
				<th>Authorize</th>
			</tr>

			<?php $workAuthorizations = readHours();

				foreach ($workAuthorizations as $workAuthorization) {
				?>
			<tr>
				<td><?php $personDetails= readPerson($workAuthorization->getPerson_person()); echo $personDetails->getTitle() .' '. $personDetails->getFirst_name().' '.$personDetails->getLast_name(); ?></td>

				<td><?php $personDetails= readPerson($workAuthorization->getEnteredById()); echo $personDetails->getTitle() .' '. $personDetails->getFirst_name().' '.$personDetails->getLast_name(); ?></td>
				<td><?php echo $workAuthorization->getDate(); ?></td>
				<td><?php $eventDetails = readEvent($workAuthorization->getEvent()); echo $eventDetails[0]->getTitle();  ?></td>
				<td><?php echo $workAuthorization->getAmount(); ?> </td>
				<td><input type="checkbox" name="authorize[]" id="authorize[]" value="<?php echo $workAuthorization->getIdWork(); ?>" /> </td>
			</tr>		
			
			<?php } ?>
			<tr><td></td><td></td><td></td><td></td><td></td> <td><input type="submit" value="Authorize" /></td> </tr>
		</table>
		
	</form>	
	</div>

<br>

	<h4>Donations Authorization
	<input type="button" id="button2" onclick="swap(2);" value="Show"> </h4>

	<div class="hide" id="div2">
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="authorizedonation" >

		<table class="table table-striped table-hover " style="width:100%">
			<tr>
					<th>Type</th>
					<th>Details</th>
					<th>Value</th>
					<th>Date</th>
					<th>Time</th>
					<th>From</th>
					<th>Where</th>
					<th>Authorize</th>
			</tr>

			<?php $donationAuthorizations = readDonations();
				  $donors = $dbio->getDonors();

				foreach ($donationAuthorizations as $donationAuthorization) {
					foreach ($donors as $donor) {
						if($donationAuthorization->getDonation_id() == $donor->getDonation_id() )
							$donationAuthorization->setDonor($donor->getDonatedby());
		}
				?>
			<tr>
				<td><?php echo $donationAuthorization->getType(); ?></td>
				<td><?php echo $donationAuthorization->getDetails(); ?></td>
				<td><?php echo $donationAuthorization->getValue(); ?></td>
				<td><?php echo $donationAuthorization->getDate(); ?></td>
				<td><?php echo $donationAuthorization->getTime();  ?></td>

				<td><?php echo $donationAuthorization->getDonor(); ?> </td>
				<td><?php echo $donationAuthorization->getEvent(); ?> </td>
				<td><input type="checkbox" name="authorized[]" id="authorized[]" value="<?php echo $donationAuthorization->getDonation_id(); ?>" /> </td>
			</tr>		
			
			<?php } ?>
			<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td> <td><input type="submit" value="Authorize" /></td> </tr>
		</table>
		
	</form>	
	</div>
