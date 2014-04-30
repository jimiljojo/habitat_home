<?php

	// TITLE: Admin Authrorization Model
	// FILE: admin/model/auth.php
	// AUTHOR: sbkedia


	function readHours(){
		global $dbio;
		$workAuthorization = $dbio->readPendingWorkAuthorization();
		return $workAuthorization;
	}

	function readPerson($personId){
		global $dbio;
		$personDetails = $dbio->readPerson($personId);
		return $personDetails;
	}

	function readEvent($eventId){
		global $dbio;
		$eventDetails = $dbio->readEvent($eventId);
		return $eventDetails;
	}

	function readDonations(){
		global $dbio;
		$donationInfo = $dbio->readPendingDonationAuthorizations();
		return $donationInfo;
	}

	function search() {}
	function create() {}
	function read() {}
	function update() {}
	function delete() {}
	//function list() {}

?>
