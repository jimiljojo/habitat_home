<?php

	// TITLE: donation Class
	// FILE: class/donation.php
	// AUTHOR: AUTOGEN


	class Donation {

		// ATTRIBUTES //

		private $donation_id;
		private $date;
		private $time;
		private $details;
		private $when_entered;
		private $value;
		private $event;
		private $Person_person;
		private $donationType;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getDonation_id() {return $this->donation_id;}
		public function getDate() {return $this->date;}
		public function getTime() {return $this->time;}
		public function getDetails() {return $this->details;}
		public function getType() {return $this->donationType;}
		
		public function getValue() {return $this->value;}
		public function getEvent() {return $this->event;}
		
		public function getPerson_person() {return $this->Person_person;}

		public function setDonation_id($donation_id) {$this->donation_id = $donation_id;}
		public function setDate($date) {$this->date = $date;}
		public function setTime($time) {$this->time = $time;}
		public function setDetails($details) {$this->details = $details;}
		public function setType($donationType) {$this->donationType = $donationType;}
		
		public function setValue($value) {$this->value = $value;}
		public function setEvent($event) {$this->event = $event;}
		
		public function setPerson_person($Person_person) {$this->Person_person = $Person_person;}

	}// end class

?>
