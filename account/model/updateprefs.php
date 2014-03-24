<?php

	$person = new Person();

	$person->setPerson_id($_GET['pid']);
	$person->setPrefEmail($_GET['email']);
	$person->setPrefMail($_GET['mail']);
	$person->setPrefPhone($_GET['calls']);

	$update = $dbio->updatePrefs($person);

?>