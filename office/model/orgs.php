<?php

	// TITLE: Office Organizations Model
	// FILE: office/model/orgs.php
	// AUTHOR: AUTOGEN


	function search() {
		$orgname = $_GET['orgname'];
		global $dbio;
		$tableinfo = $dbio->searchOrgsByName($orgname);
		return $tableinfo;
	}
	function create() {
		$organization = new Organization();
		$contact = new Contact();
		$address = new Address();
		$organization->setName($_GET['orgname']);
		$contact->setPhone($_GET['phone']);
		$contact->setEmail($_GET['email']);
		$contact->setPhone2($_GET['workPhone']);
		$contact->setExtension($_GET['workExt']);

		$address->setStreet1($_GET['street1']);
		$address->setStreet2($_GET['street2']);
		$address->setCity($_GET['city']);
		$address->setState($_GET['state']);
		$address->setZip($_GET['zip']);
		global $dbio;
		$updated = $dbio->createOrg($organization,$contact,$address);
		return $updated;
	}
	function read() {
		global $dbio;
		$tableinfo = $dbio->listOrgs();
		return $tableinfo;
	}
	function update() {
		$oid = $_GET['oid'];
		$organization = new Organization();
		$contact = new Contact();
		$address = new Address();
		$organization->setName($_GET['orgname']);
		$contact->setPhone($_GET['phone']);
		$contact->setEmail($_GET['email']);
		$contact->setPhone2($_GET['workPhone']);
		$contact->setExtension($_GET['workExt']);

		$address->setStreet1($_GET['street1']);
		$address->setStreet2($_GET['street2']);
		$address->setCity($_GET['city']);
		$address->setState($_GET['state']);
		$address->setZip($_GET['zip']);
		global $dbio;
		$updated = $dbio->updateOrg($oid,$organization,$contact,$address);
		return $updated;
	}
	function edit() {
		$oid = $_GET['oid'];
		global $dbio;
		$orginfo = $dbio->getOrgById($oid);
		return $orginfo;
	}
	

?>
