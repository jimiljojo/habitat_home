<?php
	class Debt {

		// ATTRIBUTES //

		private $debter;
		private $monthly;
		private $balance;
		private $id;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getDebter() {return $this->debter;}
		public function getMonthly() {return $this->monthly;}
		public function getBalance() {return $this->balance;}
		public function getId() {return $this->id;}

		public function setDebter($debter) {$this->debter = $debter;}
		public function setMonthly($monthly) {$this->monthly = $monthly;}
		public function setBalance($balance) {$this->balance = $balance;}
		public function setId($id) {$this->id = $id;}

	}// end class
?>	    
	