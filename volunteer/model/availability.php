<?php

	// TITLE: Volunteer Availability Model
	// FILE: volunteer/model/availability.php
	// AUTHOR: dum5002
	global $msg;
    global $dbio;

    function setVolunteerAvailability($vid, $day, $eve, $wend) {
    
   
        $dbio->setVolunteerAvailability($vid, $day, $eve, $wend);

    }

    function getAvailability() {
    	global $dbio;
        $ppid="20";
        $dbAvailability = $dbio->getVolunteerAvailability($ppid);
        return $dbAvailability;


     
    
    }
?>
