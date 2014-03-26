<? php 

	// TITLE: Office ViewEvents view 
	// FILE: office/view/viewEvent.php
	// AUTHOR: sbkedia

			//Title | Date | Type [may be hidden] | GuestList | Time | Address | Committee [may be hidden] | Sponsor
	?>
<style>
	table {border-collapse: collapse;}
	tr:nth-child(2n) {background-color: lavender;}
	tr:hover {background-color: gold;}
	td {padding: 0px 10px; width: auto;}
</style>

<script type="text/javascript">
	function retrieve(n) {
		var dir = "&dir=" + document.getElementById("dir").value;
		var sub = "&sub=" + document.getElementById("sub").value;
		var act = "&act=" + document.getElementById("act").value;
		var url = "index.php?id=" + n + dir + sub + act;
		alert(url);
		// window.location = url;
			}
</script>

<h2>All Events</h2>

<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>

	<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" id="act" type="hidden" value="viewEvent" >

<br/><br/>

<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Time</th>
		<th>Type</th>
		<th>Guest List</th> <!-- make this a button to pull up  a table showing the guest list -->
		<th>Address</th> 
		<th>Sponsor</th>
		
	</tr>
	<?php 
	$Event= readEvents();
	$Event_type= readEvent_Types();

	foreach ($Event as $EventItem) { ?>

	<tr onclick="retrieve(<?php echo $EventItem->getEvent_id(); ?>);"> 

		<td style="hover:background-color: gold;"><?php echo $EventItem->getTitle(); ?></td>
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

