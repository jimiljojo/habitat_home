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
		$pid = $_GET['pid'];
		$person = new Person();
		$contact = new Contact();
		$address = new Address();
		$event = new Event();
		$person->setTitle($_GET['title']);
		$person->setFirst_name($_GET['fName']);
		$person->setLast_name($_GET['lName']);

		$contact->setPhone($_GET['phone']);
		$contact->setEmail($_GET['email']);
		$contact->setPhone2($_GET['workPhone']);
		$contact->setExtension($_GET['workExt']);

		$address->setStreet1($_GET['street1']);
		$address->setStreet2($_GET['street2']);
		$address->setCity($_GET['city']);
		$address->setState($_GET['state']);
		$address->setZip($_GET['zip']);
		$event->setEvent_id(isset($_GET['eventName']) ? $_GET['eventName'] : null);
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

		$foh = new foh();
		
		if($dbio->searchFOHByPerson($pid))
			$foh = $dbio->searchFOHByPerson($pid);

		$event = new Event();
		$title = $foh->getEvent();
		$event->setTitle($title);

		$tableinfo = array($person,$contact,$address,$event);
		return $tableinfo;
	}

?>
