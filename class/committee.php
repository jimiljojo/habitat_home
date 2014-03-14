<?php

	// TITLE: committee Class
	// FILE: class/committee.php
	// AUTHOR: AUTOGEN


	class Committee {

		// ATTRIBUTES //

		private $committee_id;
		private $title;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getCommittee_id() {return $this->committee_id;}
		public function getTitle() {return $this->title;}

		public function setCommittee_id($committee_id) {$this->committee_id = $committee_id;}
		public function setTitle($title) {$this->title = $title;}

	}// end class

?>
