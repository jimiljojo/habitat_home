<?php

	// TITLE: Office Interests Model
	// FILE: office/model/interests.php
	// AUTHOR: AUTOGEN
global $msg;
global $dbio;

$VolFName = $_GET['VolFName'];
$VolLName = $_GET['VolLname'];
$intName = $_GET['intName'];
$userInts = $_GET['int[]'];

$dbAllInterests = $dbio->getVolBy($intName); 

$intNames = array();
//Initialize interest name as an array 

foreach ($userInts as $UseInt)  //assigned interests and all interests 
{
    if (!in_array($dbAllInterests))
    { $intNames[] = $dbAllInterests;
    }

}//list all interests

$dbio->setVolunteerInterests($intNames);
//List all interests



foreach ($)

        function search() {}
	function create() {}
	function read() {}
	function update() {}
	function delete() {}
	function list() {}

?>
