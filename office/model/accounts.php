<?php

	// TITLE: Office Accounts Model
	// FILE: office/model/accounts.php
	// AUTHOR: AUTOGEN
	
	

	function readAccounts(){
		global $dbio;
		$accounts = $dbio->readAccounts();
		return $accounts;
	}

	function search() {}
	function create() {}
	function update() {}
	function delete() {}

?>
