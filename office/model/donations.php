<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN


	function search() {}
	function create() {
		$donor = $_GET['donor'];
		$donation = new Donation();
        $donation->setDate($_GET['date']);
        $donation->setTime($_GET['time']);
        $donation->setDetails($_GET['details']);
        $donation->setType($_GET['type']);
        $donation->setValue($_GET['value']);
        $donation->setEvent($_GET['event']);
		global $dbio;
	}
	function read() {
		global $dbio;
		$tableinfo = array();
		$donations = $dbio->readAllDonations();
		$donors = $dbio->getDonors();
		$tableinfo[] = $donations;
		$tableinfo[] = $donors;
		return $tableinfo;
	}
	function update() {}
	function edit() {
		global $dbio;
		$did = $_GET['did'];
		$donation = $dbio->getDonationById($did);
		$donor = $dbio->getDonorById($did);
		$donationtypes = $dbio->readDonationtype();
		$donationInfo[] = $donation;
		$donationInfo[] = $donor;
		$donationInfo[] = $donationtypes;
		return $donationInfo;
	}

	function getEvent() {
		global $dbio;
		$eventid = $_GET['eventid'];
		$event= $dbio->readEvent($eventid);
		return $event;
	}
	
	function getPerson() {
		global $dbio;
		$pid = $_GET['pid'];
		$person = $dbio->readPerson($pid);
		return $person;
	}

	function getOrg() {
		global $dbio;
		$oid = $_GET['oid'];
		$org = $dbio->getOrgById($oid);
		return $org;
	}

?>
