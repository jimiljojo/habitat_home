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
			// CODE HERE
			break;

		case 'read':
			// CODE HERE
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
