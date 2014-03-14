<?php

	// TITLE: event_type Class
	// FILE: class/event_type.php
	// AUTHOR: AUTOGEN


	class Event_type {

		// ATTRIBUTES //

		private $type_id;
		private $title;
		private $description;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getType_id() {return $this->type_id;}
		public function getTitle() {return $this->title;}
		public function getDescription() {return $this->description;}

		public function setType_id($type_id) {$this->type_id = $type_id;}
		public function setTitle($title) {$this->title = $title;}
		public function setDescription($description) {$this->description = $description;}

	}// end class

?>
