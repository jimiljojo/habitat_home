<?php

	// TITLE: Volunteer Availability Controller
	// FILE: volunteer/controller/availability.php
	// AUTHOR: rwg5215

        //$vid = $_GET['vid'];
        global $act;
        global $msg;
        global $dir;
         
        $act = (isset($_GET['act'])) ? $_GET['act'] : '';
        $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
        
        $personId= $_SESSION['personid'];
        
        //include ($dir . '/model/availability.php');

	switch ($act) {

		case 'updateAvailability':
                            
                    
                    $day = (isset($_GET['day'])) ? $_GET['day'] : '';
                    if($day=="0"){
                        $dayChecked="1";
                    }
                    else{
                        $dayChecked="0";
                    }

                    $eve = (isset($_GET['evening'])) ? $_GET['evening'] : '';
                    if($eve=="1"){
                        $eveChecked="1";
                    }
                    else{
                        $eveChecked="0";
                    }

                    $wend = (isset($_GET['weekend'])) ? $_GET['weekend'] : '';
                    if($wend=="2"){
                        $wendChecked="1";
                    }
                    else{
                        $wendChecked="0";
                    }

                    $updateVolunteerAvailability= $dbio->setVolunteerAvailability($personId,$dayChecked,$eveChecked,$wendChecked);
                    if($updateVolunteerAvailability==true){
                        include ($dir . '/model/availability.php');
                        $page = 'volunteer/view/availability.php';
                        print '<script type="text/javascript">'; 
                        print 'alert("You Account is updated with the changes")'; 
                        print '</script>';
                    }
                    


                                         
                       
                        break;

		//case 'viewAvailability':
                   // $page = $dir . '/view/interests.php';
                default:
                    include ($dir . '/model/availability.php');
                    $page = $dir . '/view/' . $sub. '.php';
                       // getVolunteerAvailability($vid);
                        break;

	}// end switch
        
        

?>
