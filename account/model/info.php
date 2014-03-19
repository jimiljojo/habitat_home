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

	//read contact from person
	$contact = new Contact();
	$contact = $dbio->readContact($person->getContact());
	
	//read address from contact
	$address = new Address();
	$address = $dbio->readAddress($contact->getAddress());
	

	// function search() {}
	// function create() {}
	// function read() {}
	// function update() {}
	// function delete() {}
	// function list() {}

?>
