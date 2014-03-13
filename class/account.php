<?php
	class Account {

		// ATTRIBUTES //

		private $fname;
		private $lname;
		private $title;
		private $street1;
		private $street2;
		private $city;
		private $state;
		private $zip;
		private $phone;
		private $email;
		private $ssn;
		private $workphone;
		//private $workext;
		private $jobtitle;
		private $cell;
		private $employer;
		private $avail;
		private $mailpref;
		private $emailpref;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getFname() {return $this->fname;}
		public function getLname() {return $this->lname;}
		public function getTitle() {return $this->title;}
		public function getStreet1() {return $this->street1;}
		public function getStreet2() {return $this->street2;}
		public function getCity() {return $this->city;}
		public function getState() {return $this->state;}
		public function getZip() {return $this->zip;}
		public function getPhone() {return $this->phone;}
		public function getEmail() {return $this->email;}
		public function getSsn() {return $this->ssn;}
		public function getWorkphone() {return $this->workphone;}
		//public function getWorkext() {return $this->workext;}
		public function getJobtitle() {return $this->jobtitle;}
		public function getCell() {return $this->cell;}
		public function getEmployer() {return $this->employer;}
		public function getAvail() {return $this->avail;}
		public function getMailpref() {return $this->mailpref;}
		public function getEmailpref() {return $this->emailpref;}

		public function setFname($fname) {$this->fname = $fname;}
		public function setLname($lname) {$this->lname = $lname;}
		public function setTitle($title) {$this->title = $title;}
		public function setStreet1($street1) {$this->street1 = $street1;}
		public function setStreet2($street2) {$this->street2 = $street2;}
		public function setCity($city) {$this->city = $city;}
		public function setState($state) {$this->state = $state;}
		public function setZip($zip) {$this->zip = $zip;}
		public function setPhone($phone) {$this->phone = $phone;}
		public function setEmail($email) {$this->email = $email;}
		public function setSsn($ssn) {$this->ssn = $ssn;}
		public function setWorkphone($workphone) {$this->workphone = $workphone;}
		//public function setWorkext($workext) {$this->workext = $workext;}
		public function setJobtitle($jobtitle) {$this->jobtitle = $jobtitle;}
		public function setCell($cell) {$this->cell = $cell;}
		public function setEmployer($employer) {$this->employer = $employer;}
		public function setAvail($avail) {$this->avail = $avail;}
		public function setMailpref($mailpref) {$this->mailpref = $mailpref;}
		public function setEmailpref($emailpref) {$this->emailpref = $emailpref;}

	}// end class
?>	    
	
