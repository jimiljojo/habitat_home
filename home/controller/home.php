<?php

	// TITLE: Home Home Controller
	// FILE: home/controller/home.php
	// AUTHOR: AUTOGEN


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
			$_SESSION['userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : '';
	    	$_SESSION['password'] = (isset($_GET['password'])) ? $_GET['password'] : '';
			//include 'home/model/home.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
