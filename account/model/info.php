<?php

	// TITLE: Account Personal Info Model
	// FILE: account/model/info.php
	// AUTHOR: AUTOGEN
	
	$accountid = 5;
	$account = new Account();
	$account= $dbio->readAccount($accountid);


	//read person from account
	$person = new Person();
	$person = $dbio->readPerson($account->getPerson());

	// function search() {}
	// function create() {}
	// function read() {}
	// function update() {}
	// function delete() {}
	// function list() {}

?>
