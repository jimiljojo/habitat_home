<?php

	// TITLE: Office Accounts Controller
	// FILE: office/controller/accounts.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'search':
			include 'office/model/accounts.php';
			if($_GET['searchBy'] == 'name'){
				$fname = $_GET['input1'];
				$lname =  $_GET['input2'];	
			}
			elseif ($_GET['searchBy'] == 'organization') {
				$org = $_GET['input1'];
			}
			include 'office/view/searchAccount.php';
			break;

		case 'create':
			break;

		case 'read':
			include 'office/model/accounts.php';
			$page = $dir . '/view/viewAccounts.php';
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
