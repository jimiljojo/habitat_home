<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN


	function search() {
		global $dbio;
		if($_GET['searchBy'] == 'name'){
				$fname = $_GET['input1'];
				$lname =  $_GET['input2'];
				$tableinfo = $dbio->searchPersonByName($fname,$lname);
			}
			elseif ($_GET['searchBy'] == 'organization') {
				$org = $_GET['input1'];
				$tableinfo = $dbio->searchPersonByOrg($org);
			}
		return $tableinfo;
	}
	function create() {}
	function read() {
		global $dbio;
		$tableinfo = $dbio->readPersons();
		return $tableinfo;
	}
	function update() {
		return true;
	}
	function edit() {
		$pid = $_GET['pid'];
		global $dbio;
		$person = new Person();
		$person = $dbio->readPerson($pid);

		$contact = new Contact();
		$contact = $dbio->readContact($person->getContact());

		$address = new Address();
		$address = $dbio->readAddress($contact->getAddress());

		$tableinfo = array($person,$contact,$address);
		return $tableinfo;
	}

?>
