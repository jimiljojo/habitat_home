<?php
	class Requirement {

		// ATTRIBUTES //

		private $description;
		private $title;
		private $status;
		private $id;
		private $completedt;
		private $intime;
		private $inby;
		private $authtime;
		private $authby;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getDescription() {return $this->description;}
		public function getTitle() {return $this->title;}
		public function getStatus() {return $this->status;}
		public function getId() {return $this->id;}
		public function getCompletedt() {return $this->completedt;}
		public function getIntime() {return $this->intime;}
		public function getInby() {return $this->inby;}
		public function getAuthtime() {return $this->authtime;}
		public function getAuthby() {return $this->authby;}

		public function setDescription($description) {$this->description = $description;}
		public function setTitle($title) {$this->title = $title;}
		public function setStatus($status) {$this->status = $status;}
		public function setId($id) {$this->id = $id;}
		public function setCompletedt($completedt) {$this->completedt = $completedt;}
		public function setIntime($intime) {$this->intime = $intime;}
		public function setInby($inby) {$this->inby = $inby;}
		public function setAuthtime($authtime) {$this->authtime = $authtime;}
		public function setAuthby($authby) {$this->authby = $authby;}

	}// end class
?>	    
	