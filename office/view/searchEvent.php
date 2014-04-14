<?php

	// TITLE: Office searchEvents view 
	// FILE: office/model/searchEvent.php
	// AUTHOR: sbkedia

			//Title | Date | Type [may be hidden] | GuestList | Time | Address | Committee [may be hidden] | Sponsor-->
?>


<script type="text/javascript">
	function retrieve(n) {
		document.getElementById("eventId").value=n;
		document.getElementById("viewEventForm").submit();
			}
</script>

<h2>Events of Type:</h2>

<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
<br/><br/>

<form id="viewEventForm" action="Index.php" method="GET">
	<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" id="act" type="hidden" value="viewEvent" >

<br/><br/>

	<input type="hidden" name="eventId" id="eventId" value="0">

<table class="table table-striped table-hover " style="width:100%">
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Guest List</th> <!-- make this a button to pull up  a table showing the guest list -->
		<th>Address</th> 
		<!--<th>Committee</th>-->
		<th>Sponsor</th>
	</tr>
	<?php 
	$Event= searchEvent($_SESSION['eventType']);

	foreach ($Event as $EventItem) { ?>
	<tr onclick="retrieve(<?php echo $EventItem->getEvent_id(); ?>);"> 
		<td><?php echo $EventItem->getTitle(); ?></td>
		<td><?php echo $EventItem->getDate(); ?></td>
		<td><?php echo $EventItem->getTime(); ?></td>
		<td><?php echo $EventItem->getEndTime(); ?></td>
		
		<td>
			<?php 
			$EventNumberOfGuests = countEventGuest($EventItem->getEvent_id());	//Number of Guests attending the event
			echo $EventNumberOfGuests; ?> 
		</td>

		<td>
		<?php 
		$Address = readAddressByID($EventItem->getAddress());

		echo $Address->getStreet1() . " , " . $Address->getStreet2() . " , " . $Address->getCity() . " , " . $Address->getState() . " , " . $Address->getZip();
		?>
		</td>
		<!--<td><?php echo $EventItem->getCommittee(); ?></td> -->
		<td><?php echo $EventItem->getSponsoredBy(); ?></td>
	</tr>
	<?php }// end foreach ?>
</table> 

</form>

<!--Read Event
	Display
		Title | Type | Date | GuestList [Synopsis, Attending button, Goes to GuestList] | Time | Address | Committee [hidden if no Committee] | Sponsor--> 

		<!--GuestList
	Display
		Title [list only once at top] | Date [List only once at top] | FirstName | LastName-->
