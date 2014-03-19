<?php

	// TITLE: Office Events Controller
	// FILE: office/controller/event.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'search':
			$_SESSION['eventType'] = isset($_GET['eventType']) ? $_GET['eventType'] : '';
			include 'office/model/event.php';
			$page = $dir . '/view/searchEvent.php';
			break;

		case 'create':
			// CODE HERE
			break;

		case 'read':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEvent.php';
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
			include 'office/model/event.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
