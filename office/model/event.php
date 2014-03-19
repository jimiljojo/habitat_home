<?php

	// TITLE: Office Events Model
	// FILE: office/model/event.php
	// AUTHOR: AUTOGEN

	$events = array();
	$events = $dbio->readAllEvent();
	$event_types= $dbio->readAllEvent_Type();
	
	function search() {}
	function create() {}
	function read($events) {
	return $events;
	}
	function update() {}
	function delete() {}
	//function list() {}

?>
