<?php

	// TITLE: Volunteer Consent Model
	// FILE: volunteer/model/consent.php
	// AUTHOR: AUTOGEN



    function setVolunteerConsent($vid, $age, $photo, $agree, $video) {
    
   
        $dbio->setVolunteerConsent($vid, $age, $photo, $agree, $video);

    }
    function getVolunteerConsent($vid) {
        
        return $dbConsent = $dbio->getVolunteerConsentBy($vid);
     
    
    }
?>
