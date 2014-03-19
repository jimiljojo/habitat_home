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

		public function getDays() {return $this->days;}
		public function getEvenings() {return $this->evenings;}
		public function getWeekends() {return $this->weekends;}

		public function setDays($days) {$this->days = $days;}
		public function setEvenings($evenings) {$this->evenings = $evenings;}
		public function setWeekends($weekends) {$this->weekends = $weekends;}

	}//end class

?>