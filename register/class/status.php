<?php
	class Status {

		// ATTRIBUTES //

		private $description;
		private $title;
		private $code;
		private $id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getDescription() {return $this->description;}
		public function getTitle() {return $this->title;}
		public function getCode() {return $this->code;}
		public function getId() {return $this->id;}

		public function setDescription($description) {$this->description = $description;}
		public function setTitle($title) {$this->title = $title;}
		public function setCode($code) {$this->code = $code;}
		public function setId($id) {$this->id = $id;}

	}// end class
?>	    
	