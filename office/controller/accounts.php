<?php

	// TITLE: Office Accounts Controller
	// FILE: office/controller/accounts.php
	// AUTHOR: AUTOGEN

	$tableinfo = null;
	
	switch ($act) {

		case 'search':
			include_once 'office/model/accounts.php';
			$tableinfo = search();
			$page = $dir . '/view/viewAccounts.php';
			break;

		case 'create':
			break;

		case 'read':
			include_once 'office/model/accounts.php';
			$tableinfo = read();
			$page = $dir . '/view/viewAccounts.php';
			break;

		case 'viewAccount':
			include_once 'office/model/accounts.php';
			$tableinfo = update();
			$page = $dir . '/view/editAccount.php';
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
