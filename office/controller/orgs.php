<?php

	// TITLE: Office Organizations Controller
	// FILE: office/controller/orgs.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'search':
			// CODE HERE
			break;

		case 'create':
			// CODE HERE
			break;

		case 'read':
			include_once 'office/model/orgs.php';
			$tableinfo = read();
			$page = $dir . '/view/viewOrgs.php';
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
