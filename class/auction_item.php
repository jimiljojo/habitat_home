<?php

	// TITLE: auction_item Class
	// FILE: class/auction_item.php
	// AUTHOR: AUTOGEN


	class Auction_item {

		// ATTRIBUTES //

		private $auction_item_id;
		private $auction;
		private $item_num;
		private $title;
		private $description;
		private $price;
		private $person;
		private $donation;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getAuction_item_id() {return $this->auction_item_id;}
		public function getAuction() {return $this->auction;}
		public function getItem_num() {return $this->item_num;}
		public function getTitle() {return $this->title;}
		public function getDescription() {return $this->description;}
		public function getPrice() {return $this->price;}
		public function getPerson() {return $this->person;}
		public function getDonation() {return $this->donation;}

		public function setAuction_item_id($auction_item_id) {$this->auction_item_id = $auction_item_id;}
		public function setAuction($auction) {$this->auction = $auction;}
		public function setItem_num($item_num) {$this->item_num = $item_num;}
		public function setTitle($title) {$this->title = $title;}
		public function setDescription($description) {$this->description = $description;}
		public function setPrice($price) {$this->price = $price;}
		public function setPerson($person) {$this->person = $person;}
		public function setDonation($donation) {$this->donation = $donation;}

	}// end class

?>
