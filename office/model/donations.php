<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN


	function search() {}
	function create() {}
	function read() {
		global $dbio;
		$tableinfo = array();
		$donations = $dbio->readAllDonations();
		$donors = $dbio->getDonors();
		$tableinfo[] = $donations;
		$tableinfo[] = $donors;
		return $tableinfo;
	}
	function update() {}
	function edit() {
		global $dbio;
		$did = $_GET['did'];
	}
	

?>
