<?php //bmw5285
	include_once "/class/person.php";
	class VolunteerInterest{
		  
		// ATTRIBUTES //

		private $id;
		private $typeId;
		private $first_name;
		private $last_name;
		private $type_title;
		private $interest_title;
		private $description;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function getTypeId() {return $this->typeId;}
		public function getFirst_name() {return $this->first_name;}
		public function getLast_name() {return $this->last_name;}
		public function getType_title() {return $this->type_title;}
		public function getInterest_title() {return $this->interest_title;}
		public function getDescription() {return $this->description;}

		public function setId($id) {$this->id = $id;}
		public function setTypeId($typeId) {$this->typeId = $typeId;}
		public function setFirst_name($first_name) {$this->first_name = $first_name;}
		public function setLast_name($last_name) {$this->last_name = $last_name;}
		public function setType_title($type_title) {$this->type_title = $type_title;}
		public function setInterest_title($interest_title) {$this->interest_title = $interest_title;}
		public function setDescription($description) {$this->description = $description;}

	}// end class
?>	
