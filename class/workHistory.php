<?php
	
	class WorkHistory {
		

		//Attributes

		private $event;
		private $dateW;
		private $Time;
		
		//private $authorized;


		//Constructor

		public function __construct() {}


		//Method
		public function getTime() {return $this->Time;}
		public function getDateW() {return $this->dateW;}
		public function getEvent() {return $this->event;}
		
		
		
		
		public function setTime($Time) {$this->Time = $Time;}
		public function setDateW($dateW) {$this->dateW = $dateW;}
		public function setEvent($event) {$this->event = $event;}
		
		
		
		

	}//end class

?>