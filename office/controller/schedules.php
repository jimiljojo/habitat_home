<?php
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
				$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
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
			
		case 'viewSchedule':
			include 'office/model/schedules.php';
			$page = $dir . '/view/viewSchedule.php';
			break;
			
		case 'viewScheduleSlot':
			include 'office/model/schedules.php';
			$page = $dir . '/view/viewSchedule.php';
			break;
	
		default:
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;

	}// end switch

?>

