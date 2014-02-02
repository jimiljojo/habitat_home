<?php
    
    class Item {

	// ATTRIBUTES //

	private $id;
	private $title;


	// CONSTRUCTOR //

	public function __construct($id, $title) {
	    if (isset($id)) $this->id = $id;
	    if (isset($title)) $this->title = $title;
	}


	// METHODS //

	// $item = new Item()
	// $x = $item->getId()
	public function getId() {return $this->id;}
	public function getTitle() {return $this->title;}
	
	// $item = new Item()
	// $item->setId($x)
	public function setId($id) {$this->id = $id;}
	public function setTitle($title) {$this->title = $title;}

    }
?>