<?php

	// TITLE: Account Preferences Controller
	// FILE: account/controller/prefs.php
	// AUTHOR: AUTOGEN
	$update = false;

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
			include 'account/model/updateprefs.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'list':
			// CODE HERE
			break;

		default:
			include 'account/model/info.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
