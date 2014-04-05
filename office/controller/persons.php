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
			include_once 'office/model/persons.php';
			$tableinfo = edit();
			$page = $dir . '/view/editPerson.php';
			break;

		case 'update':
			include_once 'office/model/persons.php';
			$updated = update();
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'list':
			include_once 'office/model/persons.php';
			$tableinfo = read();
			$page = $dir . '/view/viewPersons.php';
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
