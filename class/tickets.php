<?php

	// TITLE: tickets Class
	// FILE: class/tickets.php
	// AUTHOR: AUTOGEN


	class Tickets {

		// ATTRIBUTES //

		private $event;
		private $ticket_id;
		private $ticket_price;
		private $maxNum;
		private $currentNum;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getEvent() {return $this->event;}
		public function getTicket_id() {return $this->ticket_id;}
		public function getTicket_price() {return $this->ticket_price;}
		public function getMaxNum() {return $this->maxNum;}
		public function getCurrentNum() {return $this->currentNum;}

		public function setEvent($event) {$this->event = $event;}
		public function setTicket_id($ticket_id) {$this->ticket_id = $ticket_id;}
		public function setTicket_price($ticket_price) {$this->ticket_price = $ticket_price;}
		public function setMaxNum($maxNum) {$this->maxNum = $maxNum;}
		public function setCurrentNum($currentNum) {$this->currentNum = $currentNum;}

	}// end class

?>
