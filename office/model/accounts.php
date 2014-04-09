<?php

	// TITLE: Office Accounts Model
	// FILE: office/model/accounts.php
	// AUTHOR: AUTOGEN
	
	

	function read(){
		global $dbio;
		$tableinfo = $dbio->readAccounts();
		return $tableinfo;
	}

	function search() {
		global $dbio;
		if($_GET['searchBy'] == 'name'){
				$fname = $_GET['input1'];
				$lname =  $_GET['input2'];
				$tableinfo = $dbio->searchAccountname($fname,$lname);	
			}
			elseif ($_GET['searchBy'] == 'organization') {
				$org = $_GET['input1'];
				$tableinfo = $dbio->searchAccountorg($org);
			}
		return $tableinfo;
	}
	function create() {}
	function edit() {
		global $dbio;
		$accid = $_GET['accid'];
		$pid = $dbio->getPersonid($accid);
		echo $pid;
		$account = new Account();
		$account= $dbio->readAccountInfo($pid);


		//read person from account
		$person = new Person();
		$person = $dbio->readPerson($account->getPerson());

		//read contact from person
		$contact = new Contact();
		$contact = $dbio->readContact($person->getContact());
		
		//read address from contact
		$address = new Address();
		$address = $dbio->readAddress($contact->getAddress());
		$tableinfo = array($account,$person,$contact,$address);
		return $tableinfo;
	}
	function update() {
		global $dbio;
		$person = new Person();
		$contact = new Contact();
		$address = new Address();


		$pid = $_GET['pid'];
		$person->setTitle($_GET['title']);
		$person->setFirst_name($_GET['fName']);
		$person->setLast_name($_GET['lName']);
		$person->setDob($_GET['dob']);

		$contact->setPhone($_GET['phone']);
		$contact->setEmail($_GET['email']);
		$contact->setPhone2($_GET['workPhone']);
		$contact->setExtension($_GET['workExt']);

		$address->setStreet1($_GET['street1']);
		$address->setStreet2($_GET['street2']);
		$address->setCity($_GET['city']);
		$address->setState($_GET['state']);
		$address->setZip($_GET['zip']);

		$updated = $dbio->updateInfo($pid,$person,$contact,$address);
		return $updated;
	}

?>
