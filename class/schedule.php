	    
	    
<?php
	class Schedule {

		// ATTRIBUTES //

		private $id;
		private $timeStart;
		private $timeEnd;
		private $eventId;
		private $description;
		private $interestId;
		private $maxNumPeople;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function gettimeStart() {return $this->timeStart;}
		public function gettimeEnd() {return $this->timeEnd;}
		public function getEvent_event_id() {return $this->eventId;}
		public function getDescription() {return $this->description;}
		public function getInterest_interest_id() {return $this->interestId;}
		public function getMaxNumPeople() {return $this->maxNumPeople;}

		public function setId($id) {$this->id = $id;}
		public function settimeStart($timeStart) {$this->timeStart = $timeStart;}
		public function settimeEnd($timeEnd) {$this->timeEnd = $timeEnd;}
		public function setEvent_event_id($eventId) {$this->eventId = $eventId;}
		public function setDescription($description) {$this->description = $description;}
		public function setInterest_interest_id($interestId) {$this->interestId = $interestId;}
		public function setMaxNumPeople($maxNumPeople) {$this->maxNumPeople = $maxNumPeople;}
	}// end class
?>	    
	
