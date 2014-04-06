<?php

	// TITLE: Office Schedules Controller
	// FILE: office/controller/schedules.php
	// AUTHOR: AUTOGEN

	//$_SESSION['userid'] = $_SESSION['userid'];

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

		case 'delete':
			// CODE HERE
			break;

		case 'list':
			// CODE HERE
			break;

		default:
			$_SESSION['userid'] = $_SESSION['userid'];
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
