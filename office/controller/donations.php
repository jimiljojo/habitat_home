<?php

	// TITLE: Office Donations Controller
	// FILE: office/controller/donations.php
	// AUTHOR: AUTOGEN
	$updated = false;

	switch ($act) {

		case 'selectEvent':
			include 'office/model/event.php';
			$page = $dir . '/view/selectEvent.php';
			break;


		case 'selectPerson':
			include_once 'office/model/persons.php';
			$tableinfo = read();
			$page = $dir . '/view/selectPerson.php';
			break;


		case 'selectOrg':
			include_once 'office/model/orgs.php';
			$tableinfo = read();
			$page = $dir . '/view/selectOrg.php';
			break;
			

		case 'create':
			include_once 'office/model/donations.php';
			$event = getEvent();
			$person = getPerson();
			$org = getOrg();
			$page = $dir . '/view/createDonation.php';
			break;

		case 'confirmCreate':
			include_once 'office/model/donations.php';
			$updated = create();
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

		case 'update':
			include_once 'office/model/donations.php';
			$updated = update();
			$donationInfo = edit();
			$page = $dir . '/view/editDonations.php';
			break;

		case 'editDonation':
			include_once 'office/model/donations.php';
			$donationInfo = edit();
			$page = $dir . '/view/editDonations.php';
			break;

		case 'list':
			include_once 'office/model/donations.php';
			$tableinfo = read();
			$page = $dir . '/view/viewDonations.php';
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
