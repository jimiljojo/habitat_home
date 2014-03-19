<?php
class Auction {

		// ATTRIBUTES //

		private $id;
		private $eventId;
		private $time;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function getEventId() {return $this->eventId;}
		public function getTime() {return $this->time;}

		public function setId($id) {$this->id = $id;}
		public function setEventId($eventId) {$this->eventId = $eventId;}
		public function setTime($time) {$this->time = $time;}

	}// end class
?>	
