<?php

	// TITLE: Office Organizations Model
	// FILE: office/model/orgs.php
	// AUTHOR: AUTOGEN


	function search() {}
	function create() {}
	function read() {
		global $dbio;
		$tableinfo = $dbio->listOrgs();
		return $tableinfo;
	}
	function update() {}
	function delete() {}
	

?>
