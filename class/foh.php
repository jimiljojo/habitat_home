<?php

	// TITLE: foh Class
	// FILE: class/foh.php
	// AUTHOR: AUTOGEN


	class Foh {

		// ATTRIBUTES //

		private $personFName;
                private $personLName;
		private $event;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getPersonFName() {return $this->personFName;}
                public function getPersonLName() {return $this->personLName;}
		public function getEvent() {return $this->event;}

		public function setPersonFName($FName) {$this->personFName = $FName;}
                public function setPersonLName($LName) {$this->personFName = $LName;}
		public function setEvent($event) {$this->event = $event;}

	}// end class

?>s
