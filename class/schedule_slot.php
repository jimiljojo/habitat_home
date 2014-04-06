<?php

	// TITLE: schedule_slot Class
	// FILE: class/schedule_slot.php
	// AUTHOR: AUTOGEN


	class Schedule_slot {

		// ATTRIBUTES //

		private $id;
		private $volunteer_Person_person_id;
		private $schedule_id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getId() {return $this->id;}
		public function getVolunteerPersonPersonId() {return $this->Volunteer_Person_person_id;}
		public function getScheduleId() {return $this->schedule_id;}

		public function setId($id) {$this->id = $id;}
		public function setVolunteerPersonPersonId($Volunteer_Person_person_id) {$this->Volunteer_Person_person_id = $Volunteer_Person_person_id;}
		public function setScheduleId($schedule_id) {$this->schedule_id = $schedule_id;}

	}// end class

?>
