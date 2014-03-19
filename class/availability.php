<?php

	class Availability{
		
	
		//Attributes

		private $days;
		private $evenings;
		private $weekends;

		//private $submitButton;


		//constructor

		public function __construct() {}
		

		//Method

		public function getDay() {return $this->days;}
		public function getEve() {return $this->evenings;}
		public function getWend() {return $this->weekends;}

		public function setDay($days) {$this->days = $days;}
		public function setEve($evenings) {$this->evenings = $evenings;}
		public function setWend($weekends) {$this->weekends = $weekends;}

	}//end class

?>