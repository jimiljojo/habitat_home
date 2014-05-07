<?php

	// TITLE: Volunteer Work History Controller
	// FILE: volunteer/controller/history.php
	// AUTHOR: dum5002


	switch ($act) {

		case 'viewHistory':
		
		break;
		
		default:
			include ($dir . '/model/history.php');
			 $page = $dir . '/view/history.php';
			 break;

	}// end switch

?>
