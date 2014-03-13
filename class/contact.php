<?php

	// TITLE: contact Class
	// FILE: class/contact.php
	// AUTHOR: AUTOGEN


	class Contact {

		// ATTRIBUTES //

		private $contact_id;
		private $address;
		private $phone;
		private $email;
		private $phone2;
		private $extension;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getContact_id() {return $this->contact_id;}
		public function getAddress() {return $this->address;}
		public function getPhone() {return $this->phone;}
		public function getEmail() {return $this->email;}
		public function getPhone2() {return $this->phone2;}
		public function getExtension() {return $this->extension;}

		public function setContact_id($contact_id) {$this->contact_id = $contact_id;}
		public function setAddress($address) {$this->address = $address;}
		public function setPhone($phone) {$this->phone = $phone;}
		public function setEmail($email) {$this->email = $email;}
		public function setPhone2($phone2) {$this->phone2 = $phone2;}
		public function setExtension($extension) {$this->extension = $extension;}

	}// end class

?>
