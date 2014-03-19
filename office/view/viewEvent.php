<? php 

	// TITLE: Office ViewEvents view 
	// FILE: office/model/viewEvent.php
	// AUTHOR: sbkedia

			//Title | Date | Type [may be hidden] | GuestList | Time | Address | Committee [may be hidden] | Sponsor
	?>

<h2>All Events</h2>

<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>
<br/><br/>

<table class="table table-striped table-hover " style="width:100%">
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Time</th>
		<th>Type</th>
		<th>Guest List</th> <!-- make this a button to pull up  a table showing the guest list -->
		<th>Address</th> 
		<!--<th>Committee</th>-->
		<th>Sponsor</th>
		
	</tr>
	<?php 
	$Event= readEvents();
	$Event_type= readEvent_Types();

	foreach ($Event as $EventItem) { ?>
	<tr> 
		<td><?php echo $EventItem->getTitle(); ?></td>
		<td><?php echo $EventItem->getDate(); ?></td>
		<td><?php echo $EventItem->getTime(); ?></td>
			
			<?php foreach ($Event_type as $EventTypeItem){ 					//Entering Event Type title from its ID
				if($EventItem->getType()==$EventTypeItem->getType_id()){ ?>
					<td><?php echo $EventTypeItem->getTitle(); ?></td> 
			<?php }//end if
			}// end foreach ?>

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

<!--Read Event
	Display
		Title | Type | Date | GuestList [Synopsis, Attending button, Goes to GuestList] | Time | Address | Committee [hidden if no Committee] | Sponsor--> 

		<!--GuestList
	Display
		Title [list only once at top] | Date [List only once at top] | FirstName | LastName-->
