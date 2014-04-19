<?php

	// TITLE: Volunteer Availability Model
	// FILE: volunteer/model/availability.php
	// AUTHOR: dum5002
	global $msg;
    global $dbio;
    $pid = $_SESSION['personid'];

    function setVolunteerAvailability($vid, $day, $eve, $wend) {
    
   
        $dbio->setVolunteerAvailability($vid, $day, $eve, $wend);

    }

    function getAvailability() {
    	global $dbio;
        $pid = $_SESSION['personid'];
        $ppid=$pid;
        $dbAvailability = $dbio->getVolunteerAvailability($ppid);
        return $dbAvailability;


     
    
    }
?>
