<?php
	 
	$person = new Person();
	$contact = new Contact();
	$address = new Address();


	$accid = $_GET['accid'];
	$person->setTitle($_GET['title']);
	$person->setFirst_name($_GET['fName']);
	$person->setLast_name($_GET['lName']);

	$contact->setPhone($_GET['phone']);
	$contact->setEmail($_GET['email']);
	$contact->setPhone2($_GET['workPhone']);
	$contact->setExtension($_GET['workExt']);

	$address->setStreet1($_GET['street1']);
	$address->setStreet2($_GET['street2']);
	$address->setCity($_GET['city']);
	$address->setState($_GET['state']);
	$address->setZip($_GET['zip']);

	$dbio->updateInfo($accid,$person,$contact,$address);

?>