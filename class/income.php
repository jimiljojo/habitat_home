<?php
	class Income{
		  
		// ATTRIBUTES //

		private $gross;
		private $overtime;
		private $commision;
		private $socialsec;
		private $childsupp;
		private $disability;
		private $pension;
		private $unemployment;

		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getGross() {return $this->gross;}
		public function getOvertime() {return $this->overtime;}
		public function getCommision() {return $this->commision;}
		public function getSocialsec() {return $this->socialsec;}
		public function getChildsupp() {return $this->childsupp;}
		public function getDisability() {return $this->disability;}
		public function getPension() {return $this->pension;}
		public function getUnemplyment() {return $this->unemployment;}

		public function setGross($gross) {$this->gross = $gross;}
		public function setOvertime($overtime) {$this->overtime = $overtime;}
		public function setCommision($commision) {$this->commision = $commision;}
		public function setSocialsec($socialsec) {$this->socialsec = $socialsec;}
		public function setChildsupp($childsupp) {$this->childsupp = $childsupp;}
		public function setDisability($disability) {$this->disability = $disability;}
		public function setPension($pension) {$this->pension = $pension;}
		public function setUnemployment($unemployment) {$this->unemployment = $unemployment;}

	}// end class
?>			
		