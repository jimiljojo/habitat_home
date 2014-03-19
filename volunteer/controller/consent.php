<?php

	// TITLE: Volunteer Consent Controller
	// FILE: volunteer/controller/consent.php
	// AUTHOR: rwg5215


        $vid = $_GET['vid'];
        include ($dir . '/model/consent.php');

	switch ($act) {

		case 'updateConsent':
                            
                    // availability
                    $age = $_GET['age'];
                    $photo = $_GET['photo'];
                    $agree = $_GET['agree'];
                    $video = $_GET['video'];
                                         
                        setVolunteerConsent($vid, $age, $photo, $agree, $video);
                        break;

		case 'viewConsent':
                default:
                    
                        getVolunteerConsent($vid);
                        break;

	}// end switch
        
        $page = $dir . '/view/' . $sub. '.php';

?>
