<?php
	class Volunteer_Has_Schedule {

		// ATTRIBUTES //

		private $id;
		private $volunteerId;
		private $schedule_id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function getVolunteerId() {return $this->volunteerId;}
		public function getScheduleId() {return $this->schedule_id;}
		

		public function setId($id) {$this->id = $id;}
		public function setVolunteerId($volunteerId) {$this->volunteerId = $volunteerId;}
		public function setScheduleId($schedule_id) {$this->schedule_id = $schedule_id;}
		
	}// end class
?>	    