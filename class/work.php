<?php

	// TITLE: work Class
	// FILE: class/work.php
	// AUTHOR: AUTOGEN


	class Work {

		// ATTRIBUTES //

		private $idWork;
		private $amount;
		private $Person_person;
		private $date;
		private $enteredById;
		private $adminId;
		private $event;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getIdWork() {return $this->idWork;}
		public function getAmount() {return $this->amount;}
		public function getPerson_person() {return $this->Person_person;}
		public function getDate() {return $this->date;}
		public function getEnteredById() {return $this->enteredById;}
		public function getAdminId() {return $this->adminId;}
		public function getEvent() {return $this->event;}

		public function setIdWork($idWork) {$this->idWork = $idWork;}
		public function setAmount($amount) {$this->amount = $amount;}
		public function setPerson_person($Person_person) {$this->Person_person = $Person_person;}
		public function setDate($date) {$this->date = $date;}
		public function setEnteredById($enteredById) {$this->enteredById = $enteredById;}
		public function setAdminId($adminId) {$this->adminId = $adminId;}
		public function setEvent($event) {$this->event = $event;}

	}// end class

?>
