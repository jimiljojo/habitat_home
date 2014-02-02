<?php
	class Link{

		// ATTRIBUTES //

		private $title;
		private $href;


		// CONSTRUCTOR //

		public function __construct($title, $href) {
			if (isset($title)) $this->title = $title;
			if (isset($href)) $this->href = $href;
		}


		// METHOD //

		public function getTitle() {return $this->title;}
		public function getHref() {return $this->href;}

		public function setTitle($name) {$this->title = $title;}
		public function setHref($href) {$this->href = $href;}

	}// end class
?>