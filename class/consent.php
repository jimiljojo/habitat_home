<?php
	
	class Consent{

		//Attributes
//consentMinor,consentAge,consentPhoto,consentSafety,consentVideo,consentWaiver,emergencyName,emergencyPhone
		
		private $consentMinor;
		private $consentMajor;
		private $consentPhoto;
		private $consentSafety;
		private $consentVideo;
		private $consentWaiver;

		private $emergencyName;
		
		private $emergencyPhone;

		//private $updateButton;
		

		//Constructor

		public function __construct() {}


		//Method

		public function getMinor() {return $this->consentMinor;}
		public function getMajor() {return $this->consentMajor;}
		public function getPhoto() {return $this->consentPhoto;}
		public function getSafety() {return $this->consentSafety;}
		public function getVideo() {return $this->consentVideo;}
		public function getWaiver() {return $this->consentWaiver;}
		public function getName() {return $this->emergencyName;}
		public function getPhone() {return $this->emergencyPhone;}

		public function setMinor($consentMinor) {$this->consentMinor = $consentMinor;}
		public function setMajor($consentMajor) {$this->consentMajor = $consentMajor;}
		public function setPhoto($consentPhoto) {$this->consentPhoto = $consentPhoto;}
		public function setSafety($consentSafety) {$this->consentSafety = $consentSafety;}
		public function setVideo($consentVideo) {$this->consentVideo = $consentVideo;}
		public function setWaiver($consentWaiver) {$this->consentWaiver = $consentWaiver;}
		public function setName($emergencyName) {$this->emergencyName = $emergencyName;}
		public function setPhone($emergencyPhone) {$this->emergencyPhone = $emergencyPhone;}

	}//end class
?>