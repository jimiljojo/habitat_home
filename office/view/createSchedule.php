<script>
	function reload()
	{
		document.getElementById("reload")
		window.location = window.location.href;
	}
</script>

<?php
//Author: bmw5285; copied from j*p*

echo '<center><input type="button"  class="btn btn-primary btn-sm" onclick="history.back();" value="Back"></center>';
echo "<br><br>";

if($_GET['act'] == "createSchedule")
{
	echo '<form action="" method="post">';
		echo '<select id="eventSchedule" name="event">';
			echo '<option value="" disabled selected>-Select Event-</option>';
				$events = $dbio->readAllEvent();
				foreach ($events as &$event)
				{
					$eventName = $event->getTitle();
					$eventId = $event->getEvent_id();
					echo "<option value = '{$eventId}' name = '{$eventName}'>{$eventName}</option>";
				}
		echo "</select>";
		echo "Time Start: <input type='text' name='timeStart'><br>";
		echo "Time End: <input type='text' name='TimeEnd'>";
		echo "Description: <input type='text' name='description'>";
		echo '<select id="interest" name="interest">';
			echo '<option value="" disabled selected>-Select Interest-</option>';
				$interests = $dbio->listInterests();
				foreach ($interests as &$interest)
				{
					$interestName = $interest->getTitle();
					$interestId = $interest->getId();
					echo "<option value = '{$interestId}' name = '{$interestName}'>{$interestName}</option>";
				}
		echo "</select>";
		echo "<input type='submit' name='weOnTheMoon' value='Submit'>";
	echo "</form>";
	if (isset($_POST['weOnTheMoon']))
	{
		$timeStart = $_POST['timeStart'];
		$timeEnd = $_POST['TimeEnd'];
		$description = $_POST['description'];
		$eventId = $_POST['event'];
		$interestId = $_POST['interest'];
		if (empty($eventId) || empty($timeStart) || empty($timeEnd) || empty($description) || empty($interestId))
			{
				echo "I am error";
				echo "<br>";
				echo $timeStart;
				echo "<br>";
				echo $timeEnd;
				echo "<br>";
				echo $description;
				echo "<br>";
				echo $eventId;
				echo "<br>";
				echo $interestId;
			}
			else
			{
				createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId);
			}
	}
}



if($_GET['act'] == "createScheduleSlot")
{
echo '<div id="node-id">';
	echo "<form action='' method='post'>";
		echo '<select id="searchby" name="schedule">';
			echo '<option disabled selected>-Select Schedule-</option>';
				
				$schedules = $dbio->readSchedule($_GET['id']);
				foreach ($schedules as &$schedule)
				{
					$scheduleName = $schedule->getDescription();
					$scheduleId = $schedule->getScheduleId();
					echo "<option value = '{$scheduleId}' name = '{$scheduleName}'>{$scheduleName}</option>";
				}
		echo "</select>";
		echo '<select id="searchby" name="person">';
			echo '<option disabled selected>-Select Person-</option>';
				$persons = $dbio->listPersons();
				foreach($persons as &$person)
				{
					$personId = $person->getPerson_id();
					$personFName = $person->getFirst_name();
					$peronsLName = $person->getLast_name();
					echo "<option value = '{$personId}' name = '{$personFName}, {$peronsLName}'>{$personFName}, {$peronsLName}</option>";
				}
		echo "<input type='submit' name='weOnTheMoon' value='Submit'>";
	echo "</form>";
echo '</div>';
	
	if (isset($_POST['weOnTheMoon']))
	{
		if (isset($_POST['schedule']) && isset($_POST['person']))
		{
			$schedule = $_POST['schedule'];
			$person = $_POST['person'];
			if (empty($schedule) || empty($person))
			{
				echo "I am error";
			}
			else
			{
				//echo "{$schedule}, {$person}";
				createScheduleSlot($person, $schedule);
			}
		}
	}
}
?>
