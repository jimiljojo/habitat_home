<?php


	class Event {

		// ATTRIBUTES //

		private $event_id;
		private $title;
		private $date;
		private $time;
		private $type;
		private $address;
		private $committee;
		private $sponsoredBy;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getEvent_id() {return $this->event_id;}
		public function getTitle() {return $this->title;}
		public function getDate() {return $this->date;}
		public function getTime() {return $this->time;}
		public function getType() {return $this->type;}
		public function getAddress() {return $this->address;}
		public function getCommittee() {return $this->committee;}
		public function getSponsoredBy() {return $this->sponsoredBy;}

		public function setEvent_id($event_id) {$this->event_id = $event_id;}
		public function setTitle($title) {$this->title = $title;}
		public function setDate($date) {$this->date = $date;}
		public function setTime($time) {$this->time = $time;}
		public function setType($type) {$this->type = $type;}
		public function setAddress($address) {$this->address = $address;}
		public function setCommittee($committee) {$this->committee = $committee;}
		public function setSponsoredBy($sponsoredBy) {$this->sponsoredBy = $sponsoredBy;}

	}// end class

?>
