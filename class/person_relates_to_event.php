<?php

	// TITLE: person_relates_to_event Class
	// FILE: class/person_relates_to_event.php
	// AUTHOR: AUTOGEN


	class Person_relates_to_event {

		// ATTRIBUTES //

		private $event;
		private $person;
		private $attended;
		private $onGuestList;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getEvent() {return $this->event;}
		public function getPerson() {return $this->person;}
		public function getAttended() {return $this->attended;}
		public function getOnGuestList() {return $this->onGuestList;}

		public function setEvent($event) {$this->event = $event;}
		public function setPerson($person) {$this->person = $person;}
		public function setAttended($attended) {$this->attended = $attended;}
		public function setOnGuestList($onGuestList) {$this->onGuestList = $onGuestList;}

	}// end class

?>
