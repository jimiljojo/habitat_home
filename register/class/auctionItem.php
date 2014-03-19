<?php
class AuctionItem {

		// ATTRIBUTES //

		private $id;
		private $auctionId;
		private $itemNum;
		private $title;
		private $description;
		private $price;
		private $buyerId;
		private $donationId;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHOD //

		public function getId() {return $this->id;}
		public function getAuctionId() {return $this->auctionId;}
		public function getItemNum() {return $this->itemNum;}
		public function getTitle() {return $this->title;}
		public function getDescription() {return $this->description;}
		public function getPrice() {return $this->price;}
		public function getBuyerId() {return $this->buyerId;}
		public function getDonationId() {return $this->donationId;}

		public function setId($id) {$this->id = $id;}
		public function setAuctionId($auctionId) {$this->auctionId = $auctionId;}
		public function setItemNum($itemNum) {$this->itemNum = $itemNum;}
		public function setTitle($title) {$this->title = $title;}
		public function setDescription($description) {$this->description = $description;}
		public function setPrice($price) {$this->price = $price;}
		public function setBuyerId($buyerId) {$this->buyerId = $buyerId;}
		public function setDonationId($donationId) {$this->donationId = $donationId;}

	}// end class
?>
