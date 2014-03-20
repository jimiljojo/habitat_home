<?php

	// TITLE: Volunteer Availability Controller
	// FILE: volunteer/controller/availability.php
	// AUTHOR: rwg5215

        //$vid = $_GET['vid'];
        global $act;
        global $msg;
        $act = (isset($_GET['act'])) ? $_GET['act'] : '';
        $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
        
        $personId= 20;
        
        include ($dir . '/model/availability.php');

	switch ($act) {

		case 'updateAvailability':
                            
                    
                    $day = $_GET['day'];
                    $eve = $_GET['evening'];
                    $wend = $_GET['weekend'];
                    var_dump($day);
                    var_dump($eve);
                    var_dump($wend);
                    $page = 'volunteer/view/availability.php';
                    var_dump($day);
                    var_dump($eve);
                    var_dump($wend);
                    $updateVolunteerAvailability= $dbio->setVolunteerAvailability($personId,$day,$eve,$wend);
                    var_dump($updateVolunteerAvailability);


                                         
                       
                        break;

		case 'viewAvailability':
                   // $page = $dir . '/view/interests.php';
                default:
                    $page = $dir . '/view/' . $sub. '.php';
                       // getVolunteerAvailability($vid);
                        break;

	}// end switch
        
        

?>
