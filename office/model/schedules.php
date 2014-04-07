<?php

	// TITLE: Office Interests Model
	// FILE: office/model/interests.php
	// AUTHOR: bmw5285d

	function listSchedule()
	{
		$dbio = new DBIO();
		$schedules = $dbio->listSchedule();
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Start Time</th><th>End Time</th><th>Event ID</th><th>Description</th><th>Interest Type</th></tr>';
		foreach ($schedules as &$schedule)
		{
			echo '<input id="dir" type="hidden" value="office">';
			echo '<input id="sub" type="hidden" value="schedules">';
			echo '<input id="act" type="hidden" value="viewSchedule">';
			echo '<tr onclick="retreive(' . $schedule->getEvent_event_id() . ');">';
			echo '<td>' . $schedule->getId() . '</td>';
			echo '<td>' . $schedule->gettimeStart() . '</td>';
			echo '<td>' . $schedule->gettimeEnd() . '</td>';
			echo '<td>' . $schedule->getEvent_event_id() . '</td>';
			echo '<td>' . $schedule->getDescription() . '</td>';
			echo '<td>' . $schedule->getInterest_interest_id() . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function listScheduleSlot()
	{
		$dbio = new DBIO();
		$scheduleSlots = $dbio->listScheduleSlot();
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Person ID</th><th>Schedule ID</th></tr>';
		foreach ($scheduleSlots as &$scheduleSlot)
		{
			echo '<input id="dir" type="hidden" value="office">';
			echo '<input id="sub" type="hidden" value="schedules">';
			echo '<input id="act" type="hidden" value="viewScheduleSlot">';
			echo '<tr onclick="retreive(' . $scheduleSlot->getScheduleId() . ');">';
			echo '<td>' . $scheduleSlot->getId() . '</td>';
			echo '<td>' . $scheduleSlot->getVolunteerPersonPersonId() . '</td>';
			echo '<td>' . $scheduleSlot->getScheduleId() . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	
	function createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId)
	{
		$dbio = new DBIO();
		global $con;
		$dbio->open();
		$tableName = "Schedule";
		$sql = "INSERT INTO {$tableName} (timeStart, timeEnd, Event_event_id, description, Interest_interest_id) VALUES ('{$timeStart}', '{$timeEnd}', '{$eventId}', '{$description}', '{$interestId}')";
		//$this->readInterestType();
		mysql_query($sql,$con);
		$dbio->close();
		echo "You have created a new {$tableName} its a part of the event {$eventId} it starts at {$timeStart} and ends at {$timeEnd} its description is:{$description} and is linked to the following interest:{$interestId}";
	}
	
	function createScheduleSlot($person, $schedule)
	{
		//require_once '/class/interest_type.php';
		$dbio = new DBIO();
		global $con;
		$dbio->open();
		$tableName = "Schedule_slot";
		$sql = "INSERT INTO {$tableName} (Volunteer_Person_person_id, Schedule_id) VALUES ('{$person}', '{$schedule}')";
		mysql_query($sql,$con);
		$dbio->close();
		echo "You have created a new {$tableName}";
	}
	
	function readScheduleByEvent()
	{
		include_once "/class/eventHasSchedule.php";
		$dbio = new DBIO();
		$eventId = $_GET['id'];
		echo $eventId;
		$schedules = $dbio->readSchedule($eventId);
		$event = $dbio->readEvent($eventId);
		echo "Event";
		echo '<table class="table table-striped table-hover"style="width:100%"><tr><th>Title</th><th>Date</th><th>Time</th></tr>';
			echo '<tr>';
				echo "<td>{$event[0]->getTitle()}</td>";
				echo "<td>{$event[0]->getDate()}</td>";
				echo "<td>{$event[0]->getTime()}</td>";
			echo '</tr>';
		foreach($schedules as &$schedule) //loop which goes through each interest and pulls data (Interest() class call)
			{
				echo '<input id="dir" type="hidden" value="office">';
				echo '<input id="sub" type="hidden" value="schedules">';
				echo '<input id="act" type="hidden" value="viewSchedule">';
				$eventId = $schedule->getEvent_id();
				$scheduleId = $schedule->getScheduleId(); //Interest() class call
				$title = $schedule->getTitle(); //Interest() class call
				$timeStart = $schedule->getTimeStart(); //Interest() class call
				$timeEnd = $schedule->getTimeEnd(); //Interest() class call
				$description = $schedule->getDescription();
				echo '<tr><th></th><th>Time Start</th><th>Time End</th><th>Description</th></tr>';
				echo '<tr onclick="retreive(' . $eventId . ');">';
					//echo "<td>{$title}</td>";
					//echo "<td>{$scheduleId}</td>";
					echo "<td></td>";
					echo "<td>{$timeStart}</td>";
					echo "<td>{$timeEnd}</td>";
					echo "<td>{$description}</td>";
				echo "</tr>";
				$persons = $dbio->readScheduleSlot($scheduleId);
				if(!empty($persons)){echo "<tr><th></th><th></th><th>Schedule Slots</th>";}
				foreach($persons as &$person)
				{
					echo "<tr>";
						echo "<td></td><td></td>";
						echo "<td>{$person->getTitle()} {$person->getFirst_name()} {$person->getLast_name()}</td>";
					echo "</tr>";
				}	
			}
			//echo '</tr>';
		echo '</table>';
	}
	
	function readScheduleByName()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$hold = $dbio->readScheduleByName($id);
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Name</th><th>Event</th><th>Scheduled</th></tr>';
		if (is_null($hold))
		{
			return null;
		}
		else
		{
			//$i=0;
			foreach($hold as $personSchedules) //loop which goes through each interest and pulls data (Interest() class call)
			{
				echo '<input id="dir" type="hidden" value="office">';
				echo '<input id="sub" type="hidden" value="schedules">';
				echo '<input id="act" type="hidden" value="viewSchedule">';
				//foreach($personSchedules as &$personSchedule)
				for($i=0;$i<3;$i++)
				{
					$title = $personSchedules[$i]->getTitle();
					$lastName = $personSchedules[$i]->getLast_name();
					$firstName = $personSchedules[$i]->getFirst_name();
					$i++;
					$eventId = $personSchedules[$i]->getEvent_id();
					$eventTitle = $personSchedules[$i]->getTitle();
					$eventDate = $personSchedules[$i]->getDate();
					$eventTime = $personSchedules[$i]->getTime();
					$i++;
					$scheduleId = $personSchedules[$i]->getId();
					$scheduleDescription = $personSchedules[$i]->getDescription();
					$scheduleTimeStart = $personSchedules[$i]->getTimeStart();
					$scheduleTimeEnd = $personSchedules[$i]->getTimeEnd();
					$i++;
					echo '<tr onclick="retreive(' . $eventId . ');">';
						echo "<td>{$title} {$firstName}, {$lastName}</td>";
						echo "<td>{$eventTitle} {$eventDate}, {$eventTime}</td>";
						echo "<td>{$scheduleDescription} {$scheduleTimeStart} - {$scheduleTimeEnd}</td>";
						//echo "<td>{$interest_title}</td>";
						//echo "<td>'{$description}'</td>";
					echo "</tr>";
				}
			}
		}
	}
	
	function viewSchedule()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$schedules = $dbio->readSchedule($id);
		//echo $schedules[0]->getInterestId();
		if (is_null($schedules))
		{
			return null;
		}
		else
		{
			echo "<table>";
				echo "<tr><th>Title</th><th>Time Start</th><th>Time End</th><th>Interest</tr>";
				foreach($schedules as &$schedule)
				{
					echo "<form name='viewSchedule' action='' method='post'";
					echo '<tr>';
					echo '<td><input name = "title" type="text" value="' . $schedule->getDescription() . '"></td>';
					echo "<td><input name = 'timeStart' type='text' value='{$schedule->getTimeStart()}'></td>";
					echo "<td><input name = 'timeEnd' type='text' value='{$schedule->getTimeEnd()}'></td>";
					echo "<input name = 'scheduleId' type='hidden' value='{$schedule->getScheduleId()}'>";
					echo "<td><select name='interestId'>";
						$ints = $dbio->readInterests($schedule->getInterestId());
						//echo "<option>Fuck this</option>";
						echo "<option value='{$ints[0]->getId()}'>{$ints[0]->getId()}, {$ints[0]->getInterest_title()}</option>";
						$ints = $dbio->listInterests();
						foreach ($ints as &$int)
						{
							$interest = $int->getTitle();
							$interestId = $int->getId();
							echo "<option value = '{$interestId}' name = '{$interest}'>{$interestId}, {$interest}</option>";
						}
					echo "</select></td>";
					echo "<td><input name='updateSchedule' value='update' type='submit' onclick='reload()'></td>";
					echo '</tr>';
					echo '</form>';
				}
			echo '</table>';
			//echo $ints[0]->getId();
			if(isset($_POST['updateSchedule']))
			{
				global $con;
				$dbio = new DBIO();
				$dbio->open();
				$sql = "UPDATE Schedule
						SET Schedule.description='{$_POST['title']}', Schedule.timeStart='{$_POST['timeStart']}', Schedule.timeEnd='{$_POST['timeEnd']}', Schedule.Interest_interest_id='{$_POST['interestId']}'
						WHERE id = '{$_POST['scheduleId']}'";
				$result = mysql_query($sql,$con);
				echo $_POST['scheduleId'], $_POST['title'], $_POST['timeStart'], $_POST['timeEnd'], $_POST['interestId'];
				
			}
		}
	}
	
	function viewScheduleSlot()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$scheduleSlots = $dbio->readScheduleSlot($id);
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>Schedule Slot</th><th>Name</th></tr>';
		if (is_null($scheduleSlots))
		{
			return null;
		}
		else
		{
			$i=1;
			foreach($scheduleSlots as $scheduleSlot)
			{
				echo "<form name='viewSchedule' action='' method='post'";
				echo '<tr>';
				echo "<td>{$i}</td>"; $i++;
				echo '<td><select name="person">';
				echo "<option value = '{$scheduleSlot->getPerson_id()}'>{$scheduleSlot->getFirst_name()}, {$scheduleSlot->getLast_name()}</option>";
				$persons = $dbio->listPersons();
				foreach($persons as &$person)
				{
					$personId = $person->getPerson_id();
					$hold = $dbio->readScheduleByName($personId);
					foreach($hold as $schedule)
					{
						for($i=0;$i<1;$i++)
						{
							$scheduleId = $schedule[2]->getId();
						}
					}
					$personFName = $person->getFirst_name();
					$peronsLName = $person->getLast_name();
					echo "<option value = '{$personId}' name = 'name'>{$personFName}, {$peronsLName}</option>";
				}
				echo '</select></td>';
				//echo '<td><input name = "title" type="text" value="' . $scheduleSlot->getTitle() . '"></td>';
				//echo '<td><input name = "fName" type="text" value="' . $scheduleSlot->getFirst_name() . '"></td>';
				//echo '<td><input name = "lName" type="text" value="' . $scheduleSlot->getLast_name() . '"></td>';
				echo "<td><input name='updateScheduleSlot' value='update' type='submit'></td>";
				echo '</tr>';
				echo "</form>";
			}
			echo '</table>';
			if(isset($_POST['updateScheduleSlot']))
			{
				echo $scheduleId;
				//global $con;
				//$dbio = new DBIO();
				//$dbio->open();
				//$sql = "UPDATE Schedule_slot
						//SET Schedule_slot.Volunteer_Person_person_id='{$_POST['name']}, Schedule_Slot.Schedule_id=''
						//WHERE id = '{$_POST['scheduleId']}'";
				//$result = mysql_query($sql,$con);
				//echo $_POST['scheduleId'], $_POST['title'], $_POST['timeStart'], $_POST['timeEnd'], $_POST['interestId'];
				
			}
		}
	}
?>
