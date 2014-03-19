<?php
	class Mortgage {

		// ATTRIBUTES //

		private $amount;
		private $statusid;
		private $projectid;
		private $mortgageid;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getAmount() {return $this->amount;}
		public function getStatusid() {return $this->statusid;}
		public function getProjectid() {return $this->projectid;}
		public function getMortgageid() {return $this->mortgageid;}

		public function setAmount($amount) {$this->amount = $amount;}
		public function setStatusid($statusid) {$this->statusid = $statusid;}
		public function setProjectid($projectid) {$this->projectid = $projectid;}
		public function setMortgageid($mortgageid) {$this->mortgageid = $mortgageid;}

	}// end class
?>	    
	