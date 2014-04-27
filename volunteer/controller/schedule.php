<?php

	// TITLE: Volunteer Schedule Controller
	// FILE: volunteer/controller/schedule.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'viewSchedule':
			include 'office/model/event.php';
			include 'volunteer/model/schedule.php';
			$page = $dir . '/view/eventSchedule.php';
			break;
			
		case'personSchedule':
			include 'office/model/event.php';
			//include 'volunteer/model/schedule.php';
			foreach($_GET['check_list'] as $check) {
				createScheduleSlot($_SESSION['personid'], $check);
			}
			$page = $dir . '/view/schedule.php';
			break;

		default:
			include 'volunteer/model/schedule.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
