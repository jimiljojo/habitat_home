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
		
			echo '<tr>';
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
			echo '<tr>';
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
		//$persons = $dbio->readScheduleSlot($scheduleId)
		echo "Event";
		echo '<table class="table table-striped table-hover"style="width:100%"><tr><th>Title</th><th>Date</th><th>Time</th></tr>';
			echo '<tr>';
				echo "<td>{$event[0]->getTitle()}</td>";
				echo "<td>{$event[0]->getDate()}</td>";
				echo "<td>{$event[0]->getTime()}</td>";
			echo '</tr>';
		//echo '<tr><th></th><th>Time Start</th><th>Time End</th><th>Description</th></tr>';
		foreach($schedules as &$schedule) //loop which goes through each interest and pulls data (Interest() class call)
			{
				$scheduleId = $schedule->getScheduleId(); //Interest() class call
				$title = $schedule->getTitle(); //Interest() class call
				$timeStart = $schedule->getTimeStart(); //Interest() class call
				$timeEnd = $schedule->getTimeEnd(); //Interest() class call
				$description = $schedule->getDescription();
				//if (!is_null($oldTitle)){$title = null;}
				echo '<tr><th></th><th>Time Start</th><th>Time End</th><th>Description</th></tr>';
				echo "<tr>";
					//echo "<td>{$title}</td>";
					//echo "<td>{$scheduleId}</td>";
					echo "<td></td>";
					echo "<td>{$timeStart}</td>";
					echo "<td>{$timeEnd}</td>";
					echo "<td>{$description}</td>";
				echo "</tr>";
				$persons = $dbio->readScheduleSlot($scheduleId);
				//if(!empty($persons)){echo "<tr><th></th><th></th><th>Title</th><th>First Name</th><th>Last Name</th></tr>";}
				if(!empty($persons)){echo "<tr><th></th><th></th><th>Schedule Slots</th>";}
				foreach($persons as &$person)
				{
					echo "<tr>";
						echo "<td></td><td></td>";
						echo "<td>{$person->getTitle()} {$person->getFirst_name()} {$person->getLast_name()}</td>";
						//echo "<td>{$person->getFirst_name()}</td>";
						//echo "<td>{$person->getLast_name()}</td>";
					echo "</tr>";
				}	
				//if(!is_null($title)){$oldTitle = $title;}
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
				//echo '<input id="dir" type="hidden" value="office">';
				//echo '<input id="sub" type="hidden" value="interests">';
				//echo '<input id="act" type="hidden" value="viewInterestType">';
				//foreach($personSchedules as &$personSchedule)
				for($i=0;$i<3;$i++)
				{
					$title = $personSchedules[$i]->getTitle();
					$lastName = $personSchedules[$i]->getLast_name();
					$firstName = $personSchedules[$i]->getFirst_name();
					$i++;
					$eventTitle = $personSchedules[$i]->getTitle();
					$eventDate = $personSchedules[$i]->getDate();
					$eventTime = $personSchedules[$i]->getTime();
					$i++;
					$scheduleDescription = $personSchedules[$i]->getDescription();
					$scheduleTimeStart = $personSchedules[$i]->getTimeStart();
					$scheduleTimeEnd = $personSchedules[$i]->getTimeEnd();
					$i++;
				echo '<tr onclick="retreive(' . $personId . ');">';
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
	
	function viewInterest()
	{
	
	}
	
	function viewInterestType()
	{
		$dbio = new DBIO();
		$id = $_GET['id'];
		$intTypes = $dbio->viewInterestType($id);
		echo '<table class="table table-striped table-hover " style="width:100%"><tr><th>ID</th><th>Interest Type</th><th>Description</th></tr>';
		if (is_null($intTypes))
		{
			return null;
		}
		else
		{
			foreach($intTypes as $intType)
			{
				echo '<tr>';
				echo '<td>' . $intType->getType_id() . '</td>';
				echo '<td>' . $intType->getTitle() . '</td>';
				echo '<td>' . $intType->getDescription() . '</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
	}
?>
