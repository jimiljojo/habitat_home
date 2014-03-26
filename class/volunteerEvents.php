<?php


	class volunteerEvents {

		// ATTRIBUTES //

		
		private $title;
		private $date;
		


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		
		public function getTitle() {return $this->title;}
		public function getDate() {return $this->date;}
		
		
		public function setTitle($title) {$this->title = $title;}
		public function setDate($date) {$this->date = $date;}
		

	}// end class

?>