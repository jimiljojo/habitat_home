<?php

	// TITLE: donation_has_organization Class
	// FILE: class/donation_has_organization.php
	// AUTHOR: AUTOGEN


	class Donatedby {

		// ATTRIBUTES //

		private $donation_id;
		private $donatedby;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getDonation_id() {return $this->donation_id;}
		public function getDonatedby() {return $this->organization;}

		public function setDonation($donation) {$this->donation = $donation;}
		public function setDonatedby($donatedby) {$this->donatedby = $donatedby;}

	}// end class

?>
