<?php

	// TITLE: Office Donations Controller
	// FILE: office/controller/donations.php
	// AUTHOR: AUTOGEN
	$updated = false;


	switch ($act) {

		case 'search':
			include_once 'office/model/persons.php';
			$tableinfo = search();
			$page = $dir . '/view/viewPersons.php';
			break;

		case 'create':
			include_once 'office/model/persons.php';
			$page = $dir . '/view/createPerson.php';
			break;

		case 'read':
			include_once 'office/model/persons.php';
			$tableinfo = edit();
			$page = $dir . '/view/editPerson.php';
			break;

		case 'update':
			include_once 'office/model/persons.php';
			$updated = update();
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

		case 'confirmCreate':
			include_once 'office/model/persons.php';
			$updated = create();
			$page = $dir . '/view/createPerson.php';
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
