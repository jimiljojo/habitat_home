<?php

	// TITLE: Account Personal Info Controller
	// FILE: account/controller/info.php
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
			include 'account/model/updateinfo.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

		case 'delete':
			// CODE HERE
			break;

		default:
			include 'account/model/info.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
