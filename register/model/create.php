<?php
	
	// FILE: Registration Info View

	// AUTHOR: jhp5134

	global $dir;
	global $sub;
	global $act;
	global $msg;
	global $dbio;
	//Account class inculsion
	include ('../class/account->php');

	//instantaited account object
	Account $account = new Account();

	$account->fname = $_GET['fname'];
	$account->lname = $_GET['lname'];
	$account->street1 = $_GET['street1'];
	$account->street2 = $_GET['street2'];
	$account->city = $_GET['city'];
	$account->state = $_GET['state'];
	$account->zip = $_GET['zip'];
	$account->phone = $_GET['phone'];
	$account->email = $_GET['email'];
	$account->employer = $_GET['employer'];
	$account->workPhone = $_GET['workPhone'];
	$account->title = $_GET['title'];
	$account->cellPhone = $_GET['cellPhone'];

	$dbio->addAccount($account);

	?>

