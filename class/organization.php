<?php

	// TITLE: organization Class
	// FILE: class/organization.php
	// AUTHOR: AUTOGEN


	class Organization {

		// ATTRIBUTES //

		private $organization_id;
		private $name;
		private $contact;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getOrganization_id() {return $this->organization_id;}
		public function getName() {return $this->name;}
		public function getContact() {return $this->contact;}

		public function setOrganization_id($organization_id) {$this->organization_id = $organization_id;}
		public function setName($name) {$this->name = $name;}
		public function setContact($contact) {$this->contact = $contact;}

	}// end class

?>
