<?php
	
	// FILE: Registration Info View

	// AUTHOR: des301

	global $dir;
	global $sub;
	global $act;
	global $msg;

	// personal info
	$name = $_GET['name'];
	$street = $_GET['street'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zip'];
	$phone = $_GET['phone'];
	$email = $_GET['email'];
	$employer = $_GET['employer'];
	$workPhone = $_GET['workPhone'];
	$title = $_GET['title'];
	$cellPhone = $_GET['cellPhone'];
	
	// interests
	$interests = $_GET['interest[]'];
	
	// other interests
	$other = $_GET['other'];
	
	// recieve phone calls
	$recieve = $_GET['recieve'];
	
	// when available for work
	$day = $_GET['day'];
	$eve = $_GET['eve'];
	$wend $_GET['weekend'];
	
	// consents
	$ofAge = $_GET['ofAge'];
	$okPhoto = $_GET['okPhoto'];
	
	// signature and date
	$signature = $_GET['signature'];
	$date = $_GET['date'];

	// STORE THE DATA
	$dbio->saveVolunteerApplication
	
	$msg = 'Your info has been saved and will be reviewed by an administrator. You will be notified by email upon approval.';
?>