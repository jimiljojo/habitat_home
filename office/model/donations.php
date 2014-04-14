<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN
	

	function search() {}
	function create() {
		$eventid = isset($_GET['eventid']) ? $_GET['eventid'] : '';
		$pid = isset($_GET['[pid]']) ? $_GET['pid'] : '';
		$oid = isset($_GET['oid']) ? $_GET['oid'] : '';

		$donation = new Donation();
        $donation->setDate($_GET['date']);
        $donation->setTime($_GET['time']);
        $donation->setDetails($_GET['details']);
        $donation->setType($_GET['type']);
        $donation->setValue($_GET['value']);
        $donation->setEvent($eventid);
        $personid =$_SESSION['personid'];
        $donation->setPerson_person($personid);
		global $dbio;
		$updated = $dbio->createDonation($donation);
		return $updated;
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
	function update() {
		$donation = new Donation();
		$donation->setDate($_GET['date']);
        $donation->setTime($_GET['time']);
        $donation->setDetails($_GET['details']);
        $donation->setType($_GET['types']);
        $donation->setValue($_GET['value']);
        $donation->setDonation_id($_GET['did']);
        global $dbio;
        $updated = $dbio->updateDonations($donation);
        return $updated;
	}
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
		if(isset($_GET['oid'])){
			$oid = $_GET['oid'];
			$org = $dbio->getOrgById($oid);
		}
			
		
		if(isset($org))
			return $org;
		else
			return '';
	}

?>
