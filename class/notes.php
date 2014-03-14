<?php

	// TITLE: notes Class
	// FILE: class/notes.php
	// AUTHOR: AUTOGEN


	class Notes {

		// ATTRIBUTES //

		private $note_id;
		private $note;
		private $author_date;
		private $account;


		// CONSTRUCTOR //

		public function __construct() {}


		// METHODS //

		public function getNote_id() {return $this->note_id;}
		public function getNote() {return $this->note;}
		public function getAuthor_date() {return $this->author_date;}
		public function getAccount() {return $this->account;}

		public function setNote_id($note_id) {$this->note_id = $note_id;}
		public function setNote($note) {$this->note = $note;}
		public function setAuthor_date($author_date) {$this->author_date = $author_date;}
		public function setAccount($account) {$this->account = $account;}

	}// end class

?>
