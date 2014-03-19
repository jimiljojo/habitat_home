<?php

	// TITLE: Office Events Model
	// FILE: office/model/event.php
	// AUTHOR: AUTOGEN

	$events = array();
	$events = $dbio->readAllEvent();
	$event_types= $dbio->readAllEvent_Type();
	
	function search() {}
	function create() {}
	function readEvents($events) {
	return $events;
	}

	function readEvent_Types($event_types){
		return $event_types;
	}
	function update() {}
	function delete() {}
	//function list() {}

?>
