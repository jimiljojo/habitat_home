<?php

	// TITLE: Volunteer Work History Model
	// FILE: volunteer/model/history.php
	// AUTHOR: rwg5215


    function setVolunteerHistory($vid, $association, $date, $start, $end, $auth) {
    
   
        $dbio->setVolunteerHistory($vid, $association, $date, $start, $end, $auth);

    }
    function getVolunteerHistory($vid) {
        
        return $dbConsent = $dbio->getVolunteerHistory($vid);
     
    
    }
?>
