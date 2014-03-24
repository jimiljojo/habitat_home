<?php //bmw5285
	class VolunteerInterest{
		  
		// ATTRIBUTES //

		private $first_name;
		private $last_name;
		private $type_title;
		private $interest_title;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getFirst_name() {return $this->first_name;}
		public function getLast_name() {return $this->last_name;}
		public function getType_title() {return $this->type_title;}
		public function getInterest_title() {return $this->interest_title;}

		public function setFirst_name($first_name) {$this->first_name = $first_name;}
		public function setLast_name($last_name) {$this->last_name = $last_name;}
		public function setType_title($type_title) {$this->type_title = $type_title;}
		public function setInterest_title($interest_title) {$this->interest_title = $interest_title;}

	}// end class
?>	
