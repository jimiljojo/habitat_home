<?php

	// TITLE: Office Events Model
	// FILE: office/model/event.php
	// AUTHOR: sbkedia
	
	
	function readEvents() {
		global $dbio;
		$events = $dbio->readAllEvent();
		return $events;
	}

	function readEvent_Types(){
		global $dbio;
		$event_types = $dbio->readAllEvent_Type();
		return $event_types;
	}

	function countEventGuest($event_id){
		global $dbio;
		$eventNumberGuests = $dbio->countEventGuests($event_id);
		return $eventNumberGuests;	
	}

	function searchEvent($event_type_id) {
		global $dbio;
		$events = $dbio->searchEventByType($event_type_id);
		return $events;
	}
	
	function readCommittees(){
		global $dbio;
		$committees = $dbio->readAllCommittee();
		return $committees;
	}

	function readAddressByID($addressID){
		global $dbio;
		$address = $dbio->readAddress($addressID);
		return $address;
	}

	function readEventByID($event_id){
		global $dbio;
		$event= $dbio->readEvent($event_id);
		return $event;
	}

	function readGuestsByEvent($event_id){
		global $dbio;
		$guests= $dbio->readGuestsByEvent($event_id);
		return $guests;
	}

	function getEventSchedules($event_id){
		global $dbio;
		$eventSchedules= $dbio->readEventSchedule($event_id);
		return $eventSchedules;
	}

	function getVolunteerSchedule($event_id){
		global $dbio;
		$volunteerSchedules= $dbio->readVolunteerScheduleByEvent($event_id);
		return $volunteerSchedules;
	}

	function getVolunteerById($volId){
		global $dbio;
		$volunteerDetails = $dbio->readPerson($volId);
		return $volunteerDetails;
	}
	
	function getEventScheduleSlots($scheduleId) {
		global $dbio;
		$eventScheduleSlots= $dbio->readScheduleSlot($scheduleId);
		return $eventScheduleSlots;
	}
	
	function createScheduleSlot($personId,$scheduleId) {
		global $dbio;
		$dbio->createScheduleSlot($personId,$scheduleId);
	}
	
	function createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId, $maxNumPeople) {
		global $dbio;
		$dbio->createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId, $maxNumPeople);
	}
	
	function getVolunteers() {
		global $dbio;
		$volunteers = $dbio->listPersons();
		return $volunteers;
	}
	
	function getInterests() {
		global $dbio;
		$interests = $dbio->listInterests();
		return $interests;
	}
	
	function deleteScheduleSlot($scheduleId, $personId) {
		global $dbio;
		$dbio->deleteScheduleSlot($scheduleId, $personId);
	}
	
	function deleteSchedule($scheduleId) {
		global $dbio;
		$dbio->deleteSchedule($scheduleId);
	}
	
	function readScheduleByScheduleId($scheduleId) {
		global $dbio;
		$schedules = $dbio->readScheduleByScheduleId($scheduleId);
		return $schedules;
	}
	
	function readInterest($interestId) {
		global $dbio;
		$interest = $dbio->readInterests($interestId);
		return $interest;
	}
	
	function updateSchedule($scheduleId, $timeStart, $timeEnd, $description, $interestId, $maxNumPeople) {
		global $dbio;
		$dbio->updateSchedule($scheduleId, $timeStart, $timeEnd, $description, $interestId, $maxNumPeople);
	}

	function create() {}

	
	function update() {}
	function delete() {}
	//function list() {}

?>
