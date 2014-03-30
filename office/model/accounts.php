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
		if($_GET['searchBy'] == 'name'){
				$fname = $_GET['input1'];
				$lname =  $_GET['input2'];
				$tableinfo = $dbio->searchAccountname($fname,$lname);	
			}
			elseif ($_GET['searchBy'] == 'organization') {
				$org = $_GET['input1'];
				$tableinfo = $dbio->searchAccountorg($org);
			}
		return $tableinfo;
	}
	function create() {}
	function update() {}
	function delete() {}

?>
