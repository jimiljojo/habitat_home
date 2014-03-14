<?php

	// TITLE: recovery_log Class
	// FILE: class/recovery_log.php
	// AUTHOR: AUTOGEN


	class Recovery_log {

		// ATTRIBUTES //

		private $account;
		private $date;
		private $time;
		private $id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getAccount() {return $this->account;}
		public function getDate() {return $this->date;}
		public function getTime() {return $this->time;}
		public function getId() {return $this->id;}

		public function setAccount($account) {$this->account = $account;}
		public function setDate($date) {$this->date = $date;}
		public function setTime($time) {$this->time = $time;}
		public function setId($id) {$this->id = $id;}

	}// end class

?>
