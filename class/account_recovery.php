<?php

	// TITLE: account_recovery Class
	// FILE: class/account_recovery.php
	// AUTHOR: AUTOGEN


	class Account_recovery {

		// ATTRIBUTES //

		private $account;
		private $code;
		private $date;
		private $time;
		private $status;
		private $id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getAccount() {return $this->account;}
		public function getCode() {return $this->code;}
		public function getDate() {return $this->date;}
		public function getTime() {return $this->time;}
		public function getStatus() {return $this->status;}
		public function getId() {return $this->id;}

		public function setAccount($account) {$this->account = $account;}
		public function setCode($code) {$this->code = $code;}
		public function setDate($date) {$this->date = $date;}
		public function setTime($time) {$this->time = $time;}
		public function setStatus($status) {$this->status = $status;}
		public function setId($id) {$this->id = $id;}

	}// end class

?>
