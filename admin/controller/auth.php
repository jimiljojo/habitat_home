<?php

	// TITLE: Admin Authrorization Controller
	// FILE: admin/controller/auth.php
	// AUTHOR: AUTOGEN
	global $dbio;

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
		case 'authorize':	

			If(!empty($_GET['authorize'])){

			foreach(($_GET['authorize']) as $workId) {

 			$result=$dbio->authorizeByAdmin($_SESSION['personid'], $workId);
 			$isAuthorized=true;
 			}

 			include 'admin/model/auth.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			
		}
		$_SESSION['interestVolunteer'] = ($items);

			break;

		default:
			include 'admin/model/auth.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
