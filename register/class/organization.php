<?php
    
    class Organization {

	// ATTRIBUTES //

	private $orgName;
	


	// CONSTRUCTOR //

	public function __construct() {}


	// METHODS //

	// $item = new Item()
	// $x = $item->getId()
	public function getOrgName() {return $this->orgName;}
	
	
	// $item = new Item()
	// $item->setId($x)
	public function setOrgName($orgName) {$this->orgName = $orgName;}
	

    }
?>