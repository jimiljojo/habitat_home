<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN


	function search() {}
	function create() {}
	function read() {
		global $dbio;
		$donations = $dbio->readAllDonations();
		return $donations;
	}
	function update() {}
	function delete() {}
	

?>
