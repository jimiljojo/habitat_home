<?php
    //SCW5137, bmw5285

  // $schedules = $dbio->getVolunteerEvents(2); //getAllEvents() //$personId hard set
	

    //Code has been tested using a database
	//include 'volunteer/model/schedule.php';
?>
<script>
	function dropDown() {
		var searchBy = document.getElementById("searchBy").value;
		if (searchBy === "all") {
			document.getElementById("all").style.display="inline";
			document.getElementById("interest").style.display="none";
		}
		if (searchBy === "interest") {
			document.getElementById("all").style.display="none";
			document.getElementById("interest").style.display="inline";
		}
	}
	
	function retrieveId(m) {
		document.getElementById("eventId").value=m;
		document.getElementById("viewSchedule").submit();
	}
</script>

<style>
    input.signedUp {
        background: #cc0000;
        color: white;
        margin-top: 4px;
				padding_bottom: 100px;
    }
    
    input.notSignedUp {
        background: #009900;
        color: black;
        margin-top: 4px;
        color: white;
    }
    
    td
    {
        text-align: center;
    }
    
    th
    {
        text-align: center;
		height: 25px;
		vertical-align:top;
    }
	
	h4.other
	{
	border-bottom-style: dotted;
	padding-bottom: 20px;
	border-width:1px;
	border-color:lightgrey;
	}
	
    table.VolSchedule{
        width: 55em;
    }
    
    table.VolSchedule tr:nth-child(2n+3) td {background-color: lavender;}
    

</style>
<h2>Volunteer Schedule</h2>
<hr>

<h4>Your Past Events</h4>
<table class="table table-striped table-hover " style="width:100%">
	<tr><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>
<?php
$personSchedules = $dbio->readScheduleByName($_SESSION['personid']);
	foreach($personSchedules as $personSchedule)
	{
		if($personSchedule[1]->getDate()<date('Y-m-d'))
		{
			$title = $personSchedule[0]->getTitle();
			$lastName = $personSchedule[0]->getLast_name();
			$firstName = $personSchedule[0]->getFirst_name();
			
			$eventId = $personSchedule[1]->getEvent_id();
			$eventTitle = $personSchedule[1]->getTitle();
			$eventDate = $personSchedule[1]->getDate();
			$eventTime = $personSchedule[1]->getTime();
			
			$scheduleId = $personSchedule[2]->getId();
			$scheduleDescription = $personSchedule[2]->getDescription();
			$scheduleTimeStart = $personSchedule[2]->getTimeStart();
			$scheduleTimeEnd = $personSchedule[2]->getTimeEnd();
			
			$addressStreet1 = $personSchedule[3]->getStreet1();
			$addressStreet2 = $personSchedule[3]->getStreet2();
			$addressCity = $personSchedule[3]->getCity();
			$addressState = $personSchedule[3]->getState();
			$addessZip = $personSchedule[3]->getZip();
			
			$eventType = $personSchedule[4]->getTitle();
			echo '<tr>';
				echo "<td>{$eventTitle}</td>";
				echo "<td>{$eventDate}</td>";
				echo "<td>{$eventTime}</td>";
				echo "<td>{$addressStreet1} {$addressStreet2} {$addressCity}, {$addressState}, {$addessZip}</td>";
				echo "<td>{$eventType}</td>";
				//echo "<td>{$interest_title}</td>";
				//echo "<td>'{$description}'</td>";
			echo "</tr>";
		}
	}

 ?>
</table>
<hr>

<h4>Your Upcoming Events<h4>
<table class="table table-striped table-hover " style="width:100%">
	<tr><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>
<?php
$i=0;
$j=0;
$personSchedules = $dbio->readScheduleByName($_SESSION['personid']);
	foreach($personSchedules as $personSchedule)
	{
		if($personSchedule[1]->getDate()>date('Y-m-d')) {$i++;}
		if($i>0)
		{
			if($eventId !== $personSchedule[1]->getEvent_id())
			{
				$title = $personSchedule[0]->getTitle();
				$lastName = $personSchedule[0]->getLast_name();
				$firstName = $personSchedule[0]->getFirst_name();
				
				$eventId = $personSchedule[1]->getEvent_id();
				$eventTitle = $personSchedule[1]->getTitle();
				$eventDate = $personSchedule[1]->getDate();
				$eventTime = $personSchedule[1]->getTime();
				
				$scheduleId = $personSchedule[2]->getId();
				$scheduleDescription = $personSchedule[2]->getDescription();
				$scheduleTimeStart = $personSchedule[2]->getTimeStart();
				$scheduleTimeEnd = $personSchedule[2]->getTimeEnd();
				
				$addressStreet1 = $personSchedule[3]->getStreet1();
				$addressStreet2 = $personSchedule[3]->getStreet2();
				$addressCity = $personSchedule[3]->getCity();
				$addressState = $personSchedule[3]->getState();
				$addessZip = $personSchedule[3]->getZip();
				
				$eventType = $personSchedule[4]->getTitle();
				echo '<tr>';
					echo "<td>{$eventTitle}</td>";
					echo "<td>{$eventDate}</td>";
					echo "<td>{$eventTime}</td>";
					echo "<td>{$addressStreet1} {$addressStreet2} {$addressCity}, {$addressState}, {$addessZip}</td>";
					echo "<td>{$eventType}</td>";
					//echo "<td>{$interest_title}</td>";
					//echo "<td>'{$description}'</td>";
				echo "</tr>";
			}
		}
		else
		{
			$j++;
			if($j==0)
			{
				echo '<td colspan="5">You have no upcoming events scheduled</td>';
			}
		}
	}

 ?>
</table>
<hr>


<h4>New Events</h4>
<select id="searchBy" onclick="dropDown()">
	<option value="all">all</option>
	<option value="interest">your interests</option>
</select>

<form id = "viewSchedule" action="index.php" method="GET">
	<input name="dir" id="dir" type="hidden" value="<?php echo $dir; ?>" >
	<input name="sub" id="sub" type="hidden" value="<?php echo $sub; ?>" >
	<input name="act" id="act" type="hidden" value="viewSchedule" >
	<input name="eventId" id="eventId" type="hidden" value="0" >
	
<div id="interest" style="display:none">
	<table class="table table-striped table-hover " style="width:100%">
		<tr><th>Details</th><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>
			<?php 
				$eventsByInterest = readEventsByInterest(readInterestByPerson($_SESSION['personid']));
				foreach ($eventsByInterest as $eventByInterest) {
					if($eventByInterest[0]->getDate()>date('Y-m-d'))
					{
						$eventId = $eventByInterest[0]->getEvent_id();
						$eventTitle = $eventByInterest[0]->getTitle();
						$eventDate = $eventByInterest[0]->getDate();
						$eventTime = $eventByInterest[0]->getTime();
						
						$addressStreet1 = $eventByInterest[1]->getStreet1();
						$addressStreet2 = $eventByInterest[1]->getStreet2();
						$addressCity = $eventByInterest[1]->getCity();
						$addressState = $eventByInterest[1]->getState();
						$addessZip = $eventByInterest[1]->getZip();
						
						$eventType = $eventByInterest[2]->getTitle();
						?><tr onclick="retrieveId(<?php echo $eventId; ?>)"><?php
							echo "<td><button>view</button></td>";
							echo "<td>{$eventTitle}</td>";
							echo "<td>{$eventDate}</td>";
							echo "<td>{$eventTime}</td>";
							echo "<td>{$addressStreet1} {$addressStreet2} {$addressCity}, {$addressState}, {$addessZip}</td>";
							echo "<td>{$eventType}</td>";
							//echo "<td>{$interest_title}</td>";
							//echo "<td>'{$description}'</td>";
						echo "</tr>";
					}
				}
			?>
	</table>
</div>
<div id="all" style="display:inline">
	<table class="table table-striped table-hover " style="width:100%">
		<tr><th>Details</th><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th><th>Event Type</th></tr>
			<?php
				$events = readEventAll();
				foreach ($events as $event) {
					if($event[0]->getDate()>date('Y-m-d'))
					{
						$eventId = $event[0]->getEvent_id();
						$eventTitle = $event[0]->getTitle();
						$eventDate = $event[0]->getDate();
						$eventTime = $event[0]->getTime();
						
						$addressStreet1 = $event[1]->getStreet1();
						$addressStreet2 = $event[1]->getStreet2();
						$addressCity = $event[1]->getCity();
						$addressState = $event[1]->getState();
						$addessZip = $event[1]->getZip();
						
						$eventType = $event[2]->getTitle();
						?><tr onclick="retrieveId(<?php echo $eventId; ?>)"><?php
							echo "<td><button>view</button></td>";
							echo "<td>{$eventTitle}</td>";
							echo "<td>{$eventDate}</td>";
							echo "<td>{$eventTime}</td>";
							echo "<td>{$addressStreet1} {$addressStreet2} {$addressCity}, {$addressState}, {$addessZip}</td>";
							echo "<td>{$eventType}</td>";
							//echo "<td>{$interest_title}</td>";
							//echo "<td>'{$description}'</td>";
						echo "</tr>";
					}
				}
			?>
	</table>	
</div>
</form>

<hr>
<span class="note">
    Here is the list of events you are signed up for <br>
    You can make changes to your schedule here as well
</span>

<?php
/*foreach($schedules as $schedule) {
    
    if($schedule->getEventStatus() == 0) {
	echo '<form action="index.php" method="GET">';
	echo '<input type="hidden" name="dir" value="' . $dir . '"/>';
	echo '<input type="hidden" name="sub" value="' . $sub . '"/>';
	echo '<input type="hidden" name="act" value="' . $act . '"/>';
	echo '<input type="hidden" name="changeStatus" class="Signedup" value="1"/>';
	echo '<input type="hidden" name="eventId" class="Signedup" value="' . $schedule->getEventId(). '"/>';
	echo '<tr>';
	echo '<td><input type="submit" name="update" class="signedUp" value="Drop Event" /></td>';
	echo '<td class="eventName"><a href="index.php?dir=' .$dir . '&sub=' . $sub . '&act=eventDescription&eventId=' . $schedule->getEventId(). '">' . $schedule->getEventTitle() . '</a></td>';
	echo '<td>' . $schedule->getEventDate() . '</td>';
	echo '<td style="width: 100px;">' . $schedule->getEventTime() . '</td>';
	echo '<td>' . $schedule->getEventLocation() . '</td>';
	echo '<td  style="width: 100px;">' . $dbio->getEventType($schedule->getEventType_Id()) . '</td>';
	echo '</tr>';
	echo '</form>';
    }// end if
 }// end foreach*/
//echo $_SESSION['id'];
//$personSchedules = $dbio->readScheduleByName($_SESSION['id']);
?>

