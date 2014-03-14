<?php

	// TITLE: volunteer_serves_on_committee Class
	// FILE: class/volunteer_serves_on_committee.php
	// AUTHOR: AUTOGEN


	class Volunteer_serves_on_committee {

		// ATTRIBUTES //

		private $Person_person;
		private $committee;
		private $is_chairman;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getPerson_person() {return $this->Person_person;}
		public function getCommittee() {return $this->committee;}
		public function getIs_chairman() {return $this->is_chairman;}

		public function setPerson_person($Person_person) {$this->Person_person = $Person_person;}
		public function setCommittee($committee) {$this->committee = $committee;}
		public function setIs_chairman($is_chairman) {$this->is_chairman = $is_chairman;}

	}// end class

?>
