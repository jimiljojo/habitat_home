<?php

	// TITLE: Volunteer Schedule Model
	// FILE: volunteer/model/schedule.php
	// AUTHOR: AUTOGEN


	//function search() {}
	//function create() {}
	//function read() {}
	//function update() {}
	//function delete() {}
	//function list() {}

	function readPersonEvents($personId) {
		global $dbio;
		$personSchedules = $dbio->readScheduleByName($personId);
		return $personSchedules;
	}
	
	function readEventsByInterest($interestIds) {
		global $dbio;
		$events = $dbio->readEventByInterest($interestIds);
		return $events;
	}
	
	function readInterestByPerson($personId) {
		global $dbio;
		$interestIds = $dbio->readInterestByPerson($personId);
		foreach ($interestIds as $interestId) {
			$interest = $interestId->getInterest();
			$interests[] = $interest;
		}
		$interestIds = implode(',',$interests);
		return $interestIds;
	}
	
	function readEventAll() {
		global $dbio;
		$events = $dbio->readEventAll();
		return $events;
	}
	
?>
