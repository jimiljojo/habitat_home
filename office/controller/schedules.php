<?php

	// TITLE: Office Schedules Controller
	// FILE: office/controller/schedules.php
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
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?><?php

	// TITLE: Office Interests Controller
	// FILE: office/controller/interests.php
	// AUTHOR: AUTOGEN


	switch ($act) {

		case 'listSchedule':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listSchedule.php';
			break;
			
		case 'listScheduleSlot':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listSchedule.php';
			break;

		case 'createSchedule':
			include 'office/model/schedules.php';
			$page = $dir . '/view/createSchedule.php';
			break;
                
		case 'createScheduleSlot':
			include 'office/model/schedules.php';
			if(!isset($_GET['id']))
			{
				$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php'; echo "shit son";
			}
			else
			{
				$page = $dir . '/view/createSchedule.php';
			}
			//$page = $dir . '/view/createSchedule.php';
			break;
			
		case 'readScheduleByEvent':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listSchedule.php';
			break;
			
		case 'readScheduleByName':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listSchedule.php';
			break;

		case 'updateInterests':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listInterests.php';
			break;
          
		case 'updateInterestTypes':
			include 'office/model/schedules.php';
			$page = $dir . '/view/listInterests.php';
			break;
			
		case 'viewInterestType':
			include 'office/model/schedules.php';
			$page = $dir . '/view/viewInterests.php';
			break;
	
		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

	}// end switch

?>

