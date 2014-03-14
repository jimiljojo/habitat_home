<?php

	// TITLE: Volunteer Availability Model
	// FILE: volunteer/model/availability.php
	// AUTHOR: rwg5215


    function setVolunteerAvailability($vid, $day, $eve, $wend) {
    
   
        $dbio->setVolunteerAvailability($vid, $day, $eve, $wend);

    }
    function getVolunteerAvailability($vid) {
        
        return $dbAvailability = $dbio->getVolunteerAvailability($vid);
     
    
    }
?>
