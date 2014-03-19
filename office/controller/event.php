<?php

	// TITLE: Office Events Controller
	// FILE: office/controller/event.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'search':
			// CODE HERE
			break;

		case 'create':
			// CODE HERE
			break;

		case 'read':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEvent.php';
			break;
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
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
