	    
	    
<?php
	class Schedule {

		// ATTRIBUTES //

		private $status;
		private $eventName;
		private $eventDate;
		private $eventTime;
		private $eventLocation;
		private $eventType;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getStatus() {return $this->status;}
		public function getEventName() {return $this->eventName;}
		public function getEventDate() {return $this->eventDate;}
		public function getEventTime() {return $this->eventTime;}
		public function getEventLocation() {return $this->eventLocation;}
		public function getEventType() {return $this->eventType;}

		public function setStatus($status) {$this->status = $status;}
		public function setEventName($eventName) {$this->eventName = $eventName;}
		public function setEventDate($eventDate) {$this->eventDate = $eventDate;}
		public function setEventTime($eventTime) {$this->eventTime = $eventTime;}
		public function setEventLocation($eventLocation) {$this->eventLocation = $eventLocation;}
		public function setEventType($eventType) {$this->eventType = $eventType;}

	}// end class
?>	    
	