<?php
	class BankAccount{
		  
		// ATTRIBUTES //

		private $balance;
		private $accno;
		private $type;
		private $routingno;
		private $bankid;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getBalance() {return $this->balance;}
		public function getAccno() {return $this->accno;}
		public function getType() {return $this->type;}
		public function getRoutingno() {return $this->routingno;}
		public function getBankid() {return $this->bankid;}

		public function setBalance($balance) {$this->balance = $balance;}
		public function setAccno($accno) {$this->accno = $accno;}
		public function setType($type) {$this->type = $type;}
		public function setRoutingno($routingno) {$this->routingno = $routingno;}
		public function setBankid($bankid) {$this->bankid = $bankid;}

	}// end class
?>			
		