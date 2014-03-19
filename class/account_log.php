<?php

	// TITLE: account_log Class
	// FILE: class/account_log.php
	// AUTHOR: AUTOGEN


	class Account_log {

		// ATTRIBUTES //

		private $id;
		private $IP;
		private $isLogon;
		private $date;
		private $time;
		private $account;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getId() {return $this->id;}
		public function getIP() {return $this->IP;}
		public function getIsLogon() {return $this->isLogon;}
		public function getDate() {return $this->date;}
		public function getTime() {return $this->time;}
		public function getAccount() {return $this->account;}

		public function setId($id) {$this->id = $id;}
		public function setIP($IP) {$this->IP = $IP;}
		public function setIsLogon($isLogon) {$this->isLogon = $isLogon;}
		public function setDate($date) {$this->date = $date;}
		public function setTime($time) {$this->time = $time;}
		public function setAccount($account) {$this->account = $account;}

	}// end class

?>
