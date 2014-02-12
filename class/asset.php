<?php
	class Asset {

		// ATTRIBUTES //

		private $title;
		private $description;
		private $value;
		private $id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getTitle() {return $this->title;}
		public function getDescription() {return $this->description;}
		public function getValue() {return $this->value;}
		public function getId() {return $this->id;}

		public function setTitle($title) {$this->title = $title;}
		public function setDescription($description) {$this->description = $description;}
		public function setValue($value) {$this->value = $value;}
		public function setId($id) {$this->id = $id;}

	}// end class
?>	    
	