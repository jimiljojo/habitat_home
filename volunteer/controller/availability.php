<?php

	// TITLE: Volunteer Availability Controller
	// FILE: volunteer/controller/availability.php
	// AUTHOR: AUTOGEN

        //$vid = $_GET['vid'];
        $personId= 7;
        
        include ($dir . '/model/availability.php');

	switch ($act) {

		case 'updateAvailability':
                            
                    // availability
                    $day = $_GET['day'];
                    $eve = $_GET['eve'];
                    $wend = $_GET['weekend'];
                                         
                        setVolunteerAvailability($vid, $day, $eve, $wend);
                        break;

		case 'viewAvailability':
                default:
                    
                        getVolunteerAvailability($vid);
                        break;

	}// end switch
        
        $page = $dir . '/view/' . $sub. '.php';

?>
