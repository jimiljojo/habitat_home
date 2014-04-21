<?php

	// TITLE: person Class
	// FILE: class/person.php
	// AUTHOR: AUTOGEN


	class Person {

		// ATTRIBUTES //

		private $person_id;
		private $title;
		private $first_name;
		private $last_name;
		private $gender;
		private $dob;
		private $marital_status;
		private $contact;
		private $isActive;
		private $lastActive;
		private $prefEmail;
		private $prefMail;
		private $prefPhone;
		private $employer;
		private $jobtitle;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getPerson_id() {return $this->person_id;}
		public function getTitle() {return $this->title;}
		public function getFirst_name() {return $this->first_name;}
		public function getLast_name() {return $this->last_name;}
		public function getGender() {return $this->gender;}
		public function getDob() {return $this->dob;}
		public function getMarital_status() {return $this->marital_status;}
		public function getContact() {return $this->contact;}
		public function getIsActive() {return $this->isActive;}
		public function getLastActive() {return $this->lastActive;}
		public function getPrefEmail() {return $this->prefEmail;}
		public function getPrefMail() {return $this->prefMail;}
		public function getPrefPhone() {return $this->prefPhone;}
		public function getEmployer() {return $this->employer;}
		public function getJobtitle() {return $this->jobtitle;}

		public function setPerson_id($person_id) {$this->person_id = $person_id;}
		public function setTitle($title) {$this->title = $title;}
		public function setFirst_name($first_name) {$this->first_name = $first_name;}
		public function setLast_name($last_name) {$this->last_name = $last_name;}
		public function setGender($gender) {$this->gender = $gender;}
		public function setDob($dob) {$this->dob = $dob;}
		public function setMarital_status($marital_status) {$this->marital_status = $marital_status;}
		public function setContact($contact) {$this->contact = $contact;}
		public function setIsActive($isActive) {$this->isActive = $isActive;}
		public function setLastActive($lastActive) {$this->lastActive = $lastActive;}
		public function setPrefEmail($prefEmail) {$this->prefEmail = $prefEmail;}
		public function setPrefMail($prefMail) {$this->prefMail = $prefMail;}
		public function setPrefPhone($prefPhone) {$this->prefPhone = $prefPhone;}
		public function setEmployer($employer) {$this->employer = $employer;}
		public function setJobtitle($jobtitle) {$this->jobtitle = $jobtitle;}

	}// end class

?>
