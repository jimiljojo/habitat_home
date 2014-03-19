<?php

	// TITLE: volunteer Class
	// FILE: class/volunteer.php
	// AUTHOR: AUTOGEN


	class Volunteer {

		// ATTRIBUTES //

		private $consentAge;
		private $consentVideo;
		private $consentWaiver;
		private $consentPhoto;
		private $availDay;
		private $availEve;
		private $availWend;
		private $person;
		private $isBoardMember;
		private $consentMinor;
		private $consentSafety;
		private $emergencyName;
		private $emergencyPhone;
		private $churchAmbassador;
		private $affiliation;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getConsentAge() {return $this->consentAge;}
		public function getConsentVideo() {return $this->consentVideo;}
		public function getConsentWaiver() {return $this->consentWaiver;}
		public function getConsentPhoto() {return $this->consentPhoto;}
		public function getAvailDay() {return $this->availDay;}
		public function getAvailEve() {return $this->availEve;}
		public function getAvailWend() {return $this->availWend;}
		public function getPerson() {return $this->person;}
		public function getIsBoardMember() {return $this->isBoardMember;}
		public function getConsentMinor() {return $this->consentMinor;}
		public function getConsentSafety() {return $this->consentSafety;}
		public function getEmergencyName() {return $this->emergencyName;}
		public function getEmergencyPhone() {return $this->emergencyPhone;}
		public function getChurchAmbassador() {return $this->churchAmbassador;}
		public function getAffiliation() {return $this->affiliation;}

		public function setConsentAge($consentAge) {$this->consentAge = $consentAge;}
		public function setConsentVideo($consentVideo) {$this->consentVideo = $consentVideo;}
		public function setConsentWaiver($consentWaiver) {$this->consentWaiver = $consentWaiver;}
		public function setConsentPhoto($consentPhoto) {$this->consentPhoto = $consentPhoto;}
		public function setAvailDay($availDay) {$this->availDay = $availDay;}
		public function setAvailEve($availEve) {$this->availEve = $availEve;}
		public function setAvailWend($availWend) {$this->availWend = $availWend;}
		public function setPerson($person) {$this->person = $person;}
		public function setIsBoardMember($isBoardMember) {$this->isBoardMember = $isBoardMember;}
		public function setConsentMinor($consentMinor) {$this->consentMinor = $consentMinor;}
		public function setConsentSafety($consentSafety) {$this->consentSafety = $consentSafety;}
		public function setEmergencyName($emergencyName) {$this->emergencyName = $emergencyName;}
		public function setEmergencyPhone($emergencyPhone) {$this->emergencyPhone = $emergencyPhone;}
		public function setChurchAmbassador($churchAmbassador) {$this->churchAmbassador = $churchAmbassador;}
		public function setAffiliation($affiliation) {$this->affiliation = $affiliation;}

	}// end class

?>
