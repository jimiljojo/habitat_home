<?php

	// TITLE: marital_status Class
	// FILE: class/marital_status.php
	// AUTHOR: AUTOGEN


	class Marital_status {

		// ATTRIBUTES //

		private $marital_status_id;
		private $title;
		private $description;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getMarital_status_id() {return $this->marital_status_id;}
		public function getTitle() {return $this->title;}
		public function getDescription() {return $this->description;}

		public function setMarital_status_id($marital_status_id) {$this->marital_status_id = $marital_status_id;}
		public function setTitle($title) {$this->title = $title;}
		public function setDescription($description) {$this->description = $description;}

	}// end class

?>
