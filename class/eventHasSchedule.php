<?php

	class EventHasSchedule {

		// ATTRIBUTES //

		private $event_id;
		private $scheduleId;
		private $title;
		private $timeStart;
		private $timeEnd;
		private $description;

		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getEvent_id() {return $this->event_id;}
		public function getScheduleId() {return $this->scheduleId;}
		public function getTitle() {return $this->title;}
		public function getTimeStart() {return $this->timeStart;}
		public function getTimeEnd() {return $this->timeEnd;}
		public function getDescription() {return $this->description;}

		public function setEvent_id($event_id) {$this->event_id = $event_id;}
		public function setScheduleId($scheduleId) {$this->scheduleId = $scheduleId;}
		public function setTitle($title) {$this->title = $title;}
		public function setTImeStart($timeStart) {$this->timeStart = $timeStart;}
		public function setTimeEnd($timeEnd) {$this->timeEnd = $timeEnd;}
		public function setDescription($description) {$this->description = $description;}

	}// end class

?>
