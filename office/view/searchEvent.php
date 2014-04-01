<?php

	// TITLE: Office searchEvents view 
	// FILE: office/model/searchEvent.php
	// AUTHOR: sbkedia

			//Title | Date | Type [may be hidden] | GuestList | Time | Address | Committee [may be hidden] | Sponsor-->
?>

<style>
	table {border-collapse: collapse;}
	tr:nth-child(2n) {background-color: lavender;}
	tr:hover {background-color: gold;}
	th {padding: 0px 10px; text-align: center;}
	td {padding: 0px 10px; text-align: center;}
</style>

<script type="text/javascript">
	function retrieve(n) {
		//var dir = "&dir=" + document.getElementById("dir").value;
		//var sub = "&sub=" + document.getElementById("sub").value;
		//var act = "&act=" + document.getElementById("act").value;
		document.getElementById("eventId").value=n;
		//var url = "index.php?id=" + n + dir + sub + act;
		//alert(document.getElementById("Id").value);
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

<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Time</th>
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
