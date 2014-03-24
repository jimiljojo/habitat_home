<?php

	// TITLE: Office Accounts Model
	// FILE: office/model/accounts.php
	// AUTHOR: AUTOGEN
	
	

	function read(){
		global $dbio;
		$tableinfo = $dbio->readAccounts();
		return $tableinfo;
	}

	function search() {
		global $dbio;
		if($_GET['searchBy'] == 'name')
			$tableinfo = $dbio->searchAccountname($fname,$lname);

		elseif ($_GET['searchBy'] == 'organization') 
			$tableinfo = $dbio->searchAccountorg($org);
		return $tableinfo;
	}
	function create() {}
	function update() {}
	function delete() {}

?>
