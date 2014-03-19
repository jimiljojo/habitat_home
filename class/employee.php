<?php

	// TITLE: employee Class
	// FILE: class/employee.php
	// AUTHOR: AUTOGEN


	class Employee {

		// ATTRIBUTES //

		private $start_date;
		private $end_date;
		private $person;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getStart_date() {return $this->start_date;}
		public function getEnd_date() {return $this->end_date;}
		public function getPerson() {return $this->person;}

		public function setStart_date($start_date) {$this->start_date = $start_date;}
		public function setEnd_date($end_date) {$this->end_date = $end_date;}
		public function setPerson($person) {$this->person = $person;}

	}// end class

?>
