<?php

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

    div.show {display: block;}
	div.hide {display: none;}
	h4+div{border: 1px solid black;
	}
	

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

    function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

	function retrieve(n) {
		document.getElementById("personId").value=n;
		
		var deleteScheduleSlot=confirm("Are you sure you want to\ndelete this volunteer\nfrom this schedule");
		if (deleteScheduleSlot!=false)
			{
				document.getElementById("deleteScheduleSlot").submit();
			}
	}

</script>


<h2 class="bold">Edit Event</h2>
<hr>

<?php if($act=="updateInfo")
		echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>UPDATED</strong> You successfully updated the information.</div>'; ?>


<h4>Information
	<input type="button" id="button1" onclick="swap(1);" value="Show"> </h4>

	<div class="hide" id="div1">
	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="updateInfo" >
	 

		<?php 
		$event_id= isset($_SESSION['eventId']) ? $_SESSION['eventId'] : 'null';
		$Event= readEventByID($event_id);
		$Event_type= readEvent_Types();

		foreach ($Event as $EventItem) {
		}
		?>
		
		<input type="hidden" name="eventId" id="eventId" value=<?php echo $event_id ?> >
		<table cellspacing="10" class="intTable">
			<tr>
				<td>Title:<span class="mandatory">*</span></td>
				<td><input type="text" name="title" id="title" value="<?php echo $EventItem->getTitle(); ?>" ></td>
			<tr>
			
			<tr>	
				<td>Type: <span class="mandatory">*</span></td>
				<td><select name="type">
						<option value ="" selected="selected">Choose Type</option>
						<?php
						foreach ($Event_type as $EventTypeItem){ ?>
							<option value= <?php echo $EventTypeItem->getType_id(); echo " "; if($EventItem->getType()==$EventTypeItem->getType_id()) {echo "selected"; } ?> > <?php echo $EventTypeItem->getTitle() ?> </option>		
						<?php }// end foreach ?>

					</select>
				</td>

				<td>Committee: </td>
				<td><select name="committee">
						<option value ="">Choose Committee</option>
			 			<?php
						$committes= readCommittees(); 
						foreach ($committes as $committeItem){ ?>
							<option value= <?php echo $committeItem->getCommittee_id(); echo " "; if($EventItem->getCommittee()==$committeItem->getCommittee_id()) {echo "selected"; }?> > <?php echo $committeItem->getTitle() ?> </option>		
						<?php }// end foreach ?>
					</select>
				</td>
			</tr>

			
			<tr><td>Date: <span class="mandatory">*</span></td><td><input type="text" name="date" value="<?php echo $EventItem->getDate(); ?>"> <label>YYYY-MM-DD</label></td></tr>
			<tr><td>Start Time: <span class="mandatory">*</span></td><td><input type="text" name="time" value="<?php echo $EventItem->getTime(); ?>"> <label>HH:MM:SS</label></td></tr>
			<tr><td>End Time: <span class="mandatory">*</span></td><td><input type="text" name="endTime" value="<?php echo $EventItem->getEndTime(); ?>"> <label>HH:MM:SS</label></td></tr>

			<?php 
			$Address = readAddressByID($EventItem->getAddress()); ?>

			<input type="hidden" name="addressId" id="addressId" value=<?php echo $Address->getAddress_id(); ?> >

			<tr><td>Street 1: <span class="mandatory">*</span></td><td><input type="text" name="street1" id="street2" value="<?php echo $Address->getStreet1(); ?>"></td></tr>
			<tr><td>Street 2: </td><td><input type="text" name="street2" id="street2" value="<?php echo $Address->getStreet2(); ?>" ></td></tr>
			<tr><td>City: <span class="mandatory">*</span></td><td><input type="text" name="city" id="city" value="<?php echo $Address->getCity(); ?>"></td></tr>
			<tr><td>State: <span class="mandatory">*</span></td><td><input type="text" name="state" id="state" value="<?php echo $Address->getState(); ?>"></td></tr>
			<tr><td>Zip code: <span class="mandatory">*</span></td><td><input type="text" name="zipcode" id="zipcode" value="<?php echo $Address->getZip(); ?>"></td></tr>

			<tr><td>Sponsor: <span class="mandatory">*</span></td><td><input type="text" name="sponsor" id="sponsor" value="<?php echo $EventItem->getSponsoredBy(); ?>"></td></tr>

		</table> 

		<input type="submit" value="update"> </form>	
	</div>
	<hr>

<h4>Guest Information
	<input type="button" id="button2" onclick="swap(2);" value="Show"> </h4>

	<div class="hide" id="div2">
		<table class="table table-striped table-hover " style="width:100%">
			<tr>
				<th>Title </th>
				<th>First Name </th>
				<th>Last Name </th>
				<th>Gender </th>
				<th>Dob </th>
			</tr>
		
		<?php $Guests = readGuestsByEvent($event_id);
		foreach($Guests as $guests){
			?>
			<tr>
				<td><?php echo $guests->getTitle(); ?> </td>
				<td><?php echo $guests->getFirst_name(); ?> </td>
				<td><?php echo $guests->getLast_name(); ?> </td>
				<td><?php echo $guests->getGender(); ?> </td>
				<td><?php echo $guests->getDob(); ?> </td>

			</tr>
		<?php } ?>
		</table>
	</div>
<hr>

<h4>Schedule
	
	<input type="button" id="button3" onclick="swap(3);" value="Show"> </h4>

	<div class="hide" id="div3">
		<table class="table table-striped table-hover " style="width:100%">
			<tr>
				<th>Description</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Interests</th>
				<th>Max Number Of People</th>
			</tr>

			<?php $EventSchedule= getEventSchedules($event_id);
			foreach ($EventSchedule as $EventScheduleItem){
			?>

			<tr>
				<td> <?php echo $EventScheduleItem->getDescription(); ?> </td>
				<td> <?php echo $EventScheduleItem->gettimeStart(); ?> </td>
				<td> <?php echo $EventScheduleItem->gettimeEnd(); ?> </td>
				<td> <?php echo $EventScheduleItem->getInterest_interest_id(); ?> </td>
				<td> <?php echo $EventScheduleItem->getMaxNumPeople(); ?> </td>
			</tr>
			
			<form id="deleteScheduleSlot" action="index.php" method="GET">
				<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
				<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
				<input name="act" id="act" type="hidden" value="deleteScheduleSlot" >
				<input name="scheduleId" id="scheduleSlot" type="hidden" value="<?php echo $EventScheduleItem->getId(); ?>">
				<input name="personId" type="hidden" id="personId" value="0">
				<?php $eventScheduleSlots = getEventScheduleSlots($EventScheduleItem->getId());
					$volSet=0;
					$i=0;
					foreach ($eventScheduleSlots as $eventScheduleSlot) {
					?>
					
						<tr onclick="retrieve(<?php echo $eventScheduleSlot->getPerson_id(); ?>);">
							<td></td>
								<?php if($volSet == 0){?> <td><b>volunteers</b></td> <?php $volSet = 1;}else{echo "<td></td>";}?>
									<td>
										<?php
											$personId = $eventScheduleSlot->getPerson_id();
											echo $eventScheduleSlot->getTitle(). " "; 
											echo $eventScheduleSlot->getFirst_name(). " "; 
											echo $eventScheduleSlot->getLast_name();
										?>
									</td>
							<td></td><td></td>
						</tr>
			</form>
						<?php $i++;
					} 
						if($i<$EventScheduleItem->getMaxNumPeople() || is_null($EventScheduleItem->getMaxNumPeople())) {
							?>
							<form name="input" action="index.php" method="get">
								<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
								<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
								<input name="act" type="hidden" value="createScheduleSlot" >
								<input name="eventId" type="hidden" value="<?php echo $event_id; ?>">
								<tr>
									<td></td><td></td><td>
										<select name="person">
											<option value="null">-Select Volunteer-</option>
											<?php 
												$volunteers = getVolunteers();
												foreach($volunteers as $volunteer) {
													?> <option value="<?php echo $volunteer->getPerson_id(); ?>" name="volunteer"><?php echo $volunteer->getFirst_name() . " " . $volunteer->getLast_name(); ?></option>
												<?php } ?>
										</select>
									</td>
										<td>
											<button type='submit' name='createScheduleSlot' value="<?php echo $EventScheduleItem->getId(); ?>" >add volunteer</button>
										</td><td></td>
								</tr>
							</form>
						<?php } ?>
				<?php }?>
					<form name="input" action="index.php" method="get">
						<input name="dir" type="hidden" value="<?php echo $dir; ?>" >
						<input name="sub" type="hidden" value="<?php echo $sub; ?>" >
						<input name="act" type="hidden" value="addSchedule" >
						<input name="eventId" type="hidden" value="<?php echo $event_id; ?>">
						<tr>
							<td>
								<button type='submit'>add schedule</button>
							</td><td></td><td></td><td></td><td></td>
						</tr>
						<!--<tr>
							<td> <input type='text' name='description'> </td>
							<td> <input type='text' name='timeStart'> </td>
							<td> <input type='text' name='timeEnd'> </td>
							<td> <select id="interest" name="interest">
								<option value="null">-Select Interest-</option>
								<?php $interests = getInterests();
								foreach ($interests as $interest) {
									?> <option value="<?php echo $interest->getId(); ?>" name="interest"><?php echo substr($interest->getTitle(), 0, 10). "..."; ?></option>
								<?php } ?> </td>
							<td> <input type="text" name="maxNumPeople"> </td>
						</tr>-->
				</form>
		</table>
	</div>
<hr>

<h4>Auction
	<input type="button" id="button4" onclick="swap(4);" value="Show"> </h4>

	<div class="hide" id="div4">
		<table class="table table-striped table-hover " style="width:100%">
		</table>
	</div>
<hr>

<h4>Process
	<input type="button" id="button5" onclick="swap(5);" value="Show"> </h4>
	<div class="hide" id="div5">

	<form action="index.php" method="GET">
		<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
		<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
		<input name="act" id="act" type="hidden" value="submitHours" >
		<input type="hidden" name="eventId" id="eventId" value=<?php echo $event_id ?> >
	
		<table class="table table-striped table-hover ">
			<tr>
				<th>Volunteer Name</th>
				<th>Enter Hours</th>
				
			</tr>

			<?php $VolunteerSchedule= getVolunteerSchedule($event_id);
			foreach ($VolunteerSchedule as $VolunteerScheduleItem){
				$VolunteerDetails = getVolunteerById($VolunteerScheduleItem->getVolunteerId());
			?>

			<tr>
				<td> <?php echo $VolunteerDetails->getTitle(). " " .$VolunteerDetails->getFirst_name(). " " .$VolunteerDetails->getLast_name();  ?> </td>
				<td> <input type='text' name ="hours<?php echo $VolunteerScheduleItem->getVolunteerId(); ?>" id="hours<?php echo $VolunteerScheduleItem->getVolunteerId(); ?>" maxlength=5 onkeypress='validate(event)' /> </td>
				
			</tr>


			<?php } 
			if($var){
				echo "Not null";
			}
			else{
				echo "Null"; 
			}?>
			<tr><td></td><td><input type="submit" value="Submit"></td></tr>
		</table>
	 	</form>
	</div>
<hr>
