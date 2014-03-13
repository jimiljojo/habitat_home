<?php

	// TITLE: account Class
	// FILE: class/account.php
	// AUTHOR: AUTOGEN


	class Account {

		// ATTRIBUTES //

		private $account_id;
		private $username;
		private $password;
		private $date;
		private $status;
		private $isOffice;
		private $isVolunteer;
		private $person;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getAccount_id() {return $this->account_id;}
		public function getUsername() {return $this->username;}
		public function getPassword() {return $this->password;}
		public function getDate() {return $this->date;}
		public function getStatus() {return $this->status;}
		public function getIsOffice() {return $this->isOffice;}
		public function getIsVolunteer() {return $this->isVolunteer;}
		public function getPerson() {return $this->person;}

		public function setAccount_id($account_id) {$this->account_id = $account_id;}
		public function setUsername($username) {$this->username = $username;}
		public function setPassword($password) {$this->password = $password;}
		public function setDate($date) {$this->date = $date;}
		public function setStatus($status) {$this->status = $status;}
		public function setIsOffice($isOffice) {$this->isOffice = $isOffice;}
		public function setIsVolunteer($isVolunteer) {$this->isVolunteer = $isVolunteer;}
		public function setPerson($person) {$this->person = $person;}

	}// end class

?>
