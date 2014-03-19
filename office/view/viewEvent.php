<!--List Event
	ClickEvents 
		Display
			Title | Date | Type [may be hidden] | GuestList | Time | Address | Committee [may be hidden] | Sponsor-->
<h2>Event</h2>

<table class="table table-striped table-hover " style="width:100%">
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Time</th>
		<th>Type</th>
		<th>Guest List</th> <!-- make this a button to pull up  a table showing the guest list -->
		<th>Address</th> 
		<th>Committee</th>
		<th>Sponsor</th>
	</tr>
	<?php 

	$Event= read($events);
	//$Event_type= 
	foreach ($Event as $EventItem) { ?>
	<tr> <!-- need to have Dan look at this -->
		<td><?php echo $EventItem->getTitle(); ?></td>
		<td><?php echo $EventItem->getDate(); ?></td>
		<td><?php echo $EventItem->getTime(); ?></td>
		<td><?php echo $EventItem->getType(); ?></td>
		<td></td>
		<!--<td><//[this one needs to be looked at]?php echo $EventItem->getGuestlist(); ?></td> it should pull a number of attending but able to be clicked to pull up a table of the guests-->
		<td><?php echo $EventItem->getAddress(); ?></td>
		<td><?php echo $EventItem->getCommittee(); ?></td>
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
