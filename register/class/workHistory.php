<?php
	
	class WorkHistory {
		

		//Attributes

		private $event;
		private $dateW;
		private $sTime;
		private $eTime;
		private $authorized;


		//Constructor

		public function __construct() {}


		//Method

		public function getEvent() {return $this->event;}
		public function getDateW() {return $this->dateW;}
		public function getSTime() {return $this->sTime;}
		public function getETime() {return $this->eTime;}
		public function getAuthorized() {return $this->authorized;}

		public function setEvent($event) {$this->event = $event;}
		public function setDateW($dateW) {$this->dateW = $dateW;}
		public function setSTime($sTime) {$this->sTime = $sTime;}
		public function setETime($eTime) {$this->eTime = $eTime;}
		public function setAuthorized($authorized) {$this->$authorized;}

	}//end class

?>