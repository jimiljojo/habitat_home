<?php

	// TITLE: Office Donations Controller
	// FILE: office/controller/donations.php
	// AUTHOR: AUTOGEN
	$updated = false;

	switch ($act) {

		case 'search':
			// CODE HERE
			break;

		case 'create':
			include_once 'office/model/donations.php';
			$events = getEvents();
			$people = getPeople();
			$page = $dir . '/view/createDonation.php';
			break;

		case 'confirmCreate':
			include_once 'office/model/donations.php';
			$updated = create();
			$page = $dir . '/view/editDonations.php';
			break;

		case 'update':
			// CODE HERE
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
