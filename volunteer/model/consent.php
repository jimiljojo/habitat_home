<?php

	// TITLE: Volunteer Consent Model
	// FILE: volunteer/model/consent.php
	// AUTHOR: rwg5215



    function setVolunteerConsent($vid, $age, $photo, $agree, $video) {
    
   
        $dbio->setVolunteerConsent($vid, $age, $photo, $agree, $video);

    }
    function getVolunteerConsent() {
        
        global $dbio;
        $ppid="20";
        $dbConsent = $dbio->getVolunteerConsent($ppid);
        
        return $dbConsent;
     
    
    }
?>
