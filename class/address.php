<?php

	// TITLE: address Class
	// FILE: class/address.php
	// AUTHOR: AUTOGEN


	class Address {

		// ATTRIBUTES //

		private $address_id;
		private $street1;
		private $street2;
		private $city;
		private $state;
		private $zip;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getAddress_id() {return $this->address_id;}
		public function getStreet1() {return $this->street1;}
		public function getStreet2() {return $this->street2;}
		public function getCity() {return $this->city;}
		public function getState() {return $this->state;}
		public function getZip() {return $this->zip;}

		public function setAddress_id($address_id) {$this->address_id = $address_id;}
		public function setStreet1($street1) {$this->street1 = $street1;}
		public function setStreet2($street2) {$this->street2 = $street2;}
		public function setCity($city) {$this->city = $city;}
		public function setState($state) {$this->state = $state;}
		public function setZip($zip) {$this->zip = $zip;}

	}// end class

?>
