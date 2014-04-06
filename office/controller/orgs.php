<?php

	// TITLE: Office Organizations Controller
	// FILE: office/controller/orgs.php
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
			include_once 'office/model/orgs.php';
			$tableinfo = read();
			$page = $dir . '/view/viewOrgs.php';
			break;

		case 'update':
			include_once 'office/model/orgs.php';
			$updated = update();
			echo $updated;
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'edit':
			include_once 'office/model/orgs.php';
			$orginfo = edit();
			$page = $dir . '/view/editOrg.php';
			break;

		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
