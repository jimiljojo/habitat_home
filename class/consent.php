<?php>
	
	class Consent{

		//Attributes

		private $age;
		private $video;
		private $waiver;
		private $photo;

		private $firstName;
		private $lastName;
		private $phone

		//private $updateButton;
		

		//Constructor

		public function __construct() {}


		//Method

		public function getAge() {return $this->age;}
		public function getVideo() {return $this->video;}
		public function getWaiver() {return $this->waiver;}
		public function getPhoto() {return $this->photo;}
		public function getFirstName() {return $this->firstName;}
		public function getLastName() {return $this->lastName;}
		public function getPhone() {return $this->phone;}

		public function setAge($age) {$this->age = $age;}
		public function setVideo($video) {$this->video = $video;}
		public function setWaiver($waiver) {$this->waiver = $waiver;}
		public function setPhoto($photo) {$this->photo = $photo;}
		public function setFirstName($firstName) {$this->firstName = $firstName;}
		public function setLastName($lastName) ($this->lastName = $lastName;)
		public function setPhone($phone) ($this->phone - $phone;)

	}//end class
?>