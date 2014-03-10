<?php
	class Interest{
		  
		// ATTRIBUTES //

		private $id;
		private $title;
		private $type;
		private $typeId;
		private $description;
		private $isInterest;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function getTitle() {return $this->title;}
		public function getType() {return $this->type;}
		public function getTypeId() {return $this->typeId;}
		public function getDescription() {return $this->description;}
		public function getIsInterest() {return $this->isInterest;}

		public function setId($id) {$this->id = $id;}
		public function setTitle($title) {$this->title = $title;}
		public function setType($type) {$this->type = $type;}
		public function setTypeId($typeId) {$this->typeId = $typeId;}
		public function setDescription($description) {$this->description = $description;}
		public function setIsInterest($isInterest) {$this->isInterest = $isInterest;}

	}// end class
?>			
		