<?php

	// TITLE: Office Events Controller
	// FILE: office/controller/event.php
	// AUTHOR: sbkedia

	$_SESSION['userid'] = (isset($_GET['userid'])) ? $_GET['userid'] : '';
	$_SESSION['password'] = (isset($_GET['password'])) ? $_GET['password'] : '';

	switch ($act) {

		case 'search':
			$_SESSION['eventType'] = isset($_GET['eventType']) ? $_GET['eventType'] : '';
			include 'office/model/event.php';
			$page = $dir . '/view/searchEvent.php';
			break;

		case 'create':
			include 'office/model/event.php';
			$page = $dir . '/view/createEvent.php';
			break;

		case 'read':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEvents.php';
			break;

		case 'updateInfo':
		
		$_SESSION['eventId'] = isset($_GET['eventId']) ? $_GET['eventId'] : '';
		$addressObj = new Address();
			$addressObj->setAddress_id(isset($_GET['addressId']) ? $_GET['addressId'] : '');
			$addressObj->setStreet1(isset($_GET['street1']) ? $_GET['street1'] : '');
			$addressObj->setStreet2(isset($_GET['street2']) ? $_GET['street2'] : '');
			$addressObj->setCity(isset($_GET['city']) ? $_GET['city'] : '');
			$addressObj->setState(isset($_GET['state']) ? $_GET['state'] : '');
			$addressObj->setZip(isset($_GET['zipcode']) ? $_GET['zipcode'] : '');

			$eventObj = new Event();
			$eventObj->setEvent_id(isset($_GET['eventId']) ? $_GET['eventId'] : '');
			$eventObj->setTitle(isset($_GET['title']) ? $_GET['title'] : '');
			$eventObj->setDate(isset($_GET['date']) ? $_GET['date'] : '');
			$eventObj->setTime(isset($_GET['time']) ? $_GET['time'] : '');
			$eventObj->setType(isset($_GET['type']) ? $_GET['type'] : '');
			$eventObj->setCommittee(isset($_GET['committee']) ? $_GET['committee'] : '');
			$eventObj->setSponsoredBy(isset($_GET['sponsor']) ? $_GET['sponsor'] : '');
			$eventObj->setEndTime(isset($_GET['endTime']) ? $_GET['endTime'] : '');

			$dbio->updateEvent($eventObj,$addressObj);

			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			break;

		case 'submitHours':
		
			include 'office/model/event.php';
			$_SESSION['eventId'] = isset($_GET['eventId']) ? $_GET['eventId'] : '';

			$date=date('Y-m-d');
			$VolunteerSchedule= getVolunteerSchedule($_SESSION['eventId']);

			foreach ($VolunteerSchedule as $VolunteerScheduleItem){
			$hours= isset($_GET['hours'.$VolunteerScheduleItem->getVolunteerId()]) ? $_GET['hours'.$VolunteerScheduleItem->getVolunteerId()] : "";

			if($hours){
				
				$workObj = new Work();
		 		$workObj->setAmount($hours);
		 		var_dump($workObj->getAmount());
		 		$workObj->setPerson_person($VolunteerScheduleItem->getVolunteerId());
		 		var_dump($workObj->getPerson_person());
		 		$workObj->setDate($date);
		 		var_dump($workObj->getDate());
		 		$workObj->setEnteredById($_SESSION['personid']);
		 		var_dump($workObj->getEnteredById());
		 		$workObj->setAdminId(Null);
		 		var_dump($workObj->getAdminId());
		 		$workObj->setEvent($_GET['eventId']);
		 		var_dump($workObj->getEvent());

		 		$dbio->insertWorkForVolunteer($workObj);
		 		
			}
			
			}

			$page = $dir . '/view/viewEventInfo.php';
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'viewEvent':
			$_SESSION['eventId'] = isset($_GET['eventId']) ? $_GET['eventId'] : '';
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			break;

		case 'confirmCreate':

			$addressObj = new Address();
			$addressObj->setStreet1(isset($_GET['street1']) ? $_GET['street1'] : '');
			$addressObj->setStreet2(isset($_GET['street2']) ? $_GET['street2'] : '');
			$addressObj->setCity(isset($_GET['city']) ? $_GET['city'] : '');
			$addressObj->setState(isset($_GET['state']) ? $_GET['state'] : '');
			$addressObj->setZip(isset($_GET['zipcode']) ? $_GET['zipcode'] : '');

			$eventObj = new Event();
			$eventObj->setTitle(isset($_GET['title']) ? $_GET['title'] : '');
			$eventObj->setDate(isset($_GET['date']) ? $_GET['date'] : '');
			$eventObj->setTime(isset($_GET['time']) ? $_GET['time'] : '');
			$eventObj->setType(isset($_GET['type']) ? $_GET['type'] : '');
			$eventObj->setCommittee(isset($_GET['committee']) ? $_GET['committee'] : '');
			$eventObj->setSponsoredBy(isset($_GET['sponsor']) ? $_GET['sponsor'] : '');
			$eventObj->setEndTime(isset($_GET['endTime']) ? $_GET['endTime'] : '');

			$dbio->createEvent($addressObj, $eventObj);

			include 'office/model/event.php';
			$page = $dir . '/view/confirmCreateEvent.php';
			break;
			
			case 'createScheduleSlot':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			if( $_GET['person'] == "null" || $_GET['createScheduleSlot'] == null) {
				return null;
			} else {
				$personId = $_GET['person'];
				$scheduleId = $_GET['createScheduleSlot'];
					createScheduleSlot($personId,$scheduleId);
			}
			break;
			
		case 'addSchedule':
			include 'office/model/event.php';
			$page = $dir . '/view/createSchedule.php';
			break;
			
		case 'createSchedule':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			if( $_GET['description'] == null || $_GET['timeStart'] == null || $_GET['timeEnd'] == null || $_GET['interest'] == null || $_GET['maxNumPeople'] == null) {
				return null;
			} else {
				$description = $_GET['description'];
				$timeStart = $_GET['timeStart'];
				$timeEnd = $_GET['timeEnd'];
				$interestId = $_GET['interest'];
				$maxNumPeople = $_GET['maxNumPeople'];
				$eventId = $_GET['eventId'];
				createSchedule($timeStart, $timeEnd, $eventId, $description, $interestId, $maxNumPeople);
			}
			break;
			
		case 'deleteScheduleSlot':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			deleteScheduleSlot($_GET['scheduleId'], $_GET['personId']);
			break;
			
		case 'deleteSchedule':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			deleteSchedule($_GET['scheduleId']);
			break;
			
		case 'editSchedule':
			include 'office/model/event.php';
			$page = $dir . '/view/editSchedule.php';
			break;
			
		case 'updateSchedule':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEventInfo.php';
			if( $_GET['description'] == null || $_GET['timeStart'] == null || $_GET['timeEnd'] == null || $_GET['interest'] == null || $_GET['maxNumPeople'] == null) {
				return null;
			} else {
				$scheduleId = $_GET['scheduleId'];
				$description = $_GET['description'];
				$timeStart = $_GET['timeStart'];
				$timeEnd = $_GET['timeEnd'];
				$interestId = $_GET['interest'];
				$maxNumPeople = $_GET['maxNumPeople'];
				updateSchedule($scheduleId, $timeStart, $timeEnd, $description, $interestId, $maxNumPeople);
			}
			break;

		default:
			include 'office/model/event.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>
