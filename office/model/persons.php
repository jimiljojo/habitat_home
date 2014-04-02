<?php

	// TITLE: Office Donations Model
	// FILE: office/model/donations.php
	// AUTHOR: AUTOGEN


	function search() {}
	function create() {}
	function read() {
		global $dbio;
		$tableinfo = $dbio->readPersons();
		return $tableinfo;
	}
	function update() {}
	function delete() {}

?>
