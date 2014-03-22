<?php

	// TITLE: Volunteer Work History Model
	// FILE: volunteer/model/history.php
	// AUTHOR: rwg5215


    function getEventId(){
    	$event_id=$dbio->getEventId($person_id);
    	return $event_id;
    }

    function setVolunteerHistory($vid, $association, $date, $start, $end, $auth) {
    
   
        $dbio->setVolunteerHistory($vid, $association, $date, $start, $end, $auth);

    }
    function getVolunteerHistory($vid) {
        
        return $dbConsent = $dbio->getVolunteerHistory($vid);
     
    
    }
?>
