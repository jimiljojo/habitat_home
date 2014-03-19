<?php

	// TITLE: Volunteer Availability Controller
	// FILE: volunteer/controller/availability.php
	// AUTHOR: rwg5215

        //$vid = $_GET['vid'];
        $personId= 20;
        
        include ($dir . '/model/availability.php');

	switch ($act) {

		case 'updateAvailability':
                            
                    // availability
                    $day = $_GET['day'];
                    $eve = $_GET['eve'];
                    $wend = $_GET['weekend'];
                                         
                       // setVolunteerAvailability($vid, $day, $eve, $wend);
                        break;

		case 'viewAvailability':
                   // $page = $dir . '/view/interests.php';
                default:
                    
                       // getVolunteerAvailability($vid);
                        break;

	}// end switch
        
        $page = $dir . '/view/' . $sub. '.php';

?>
