<?php

	// TITLE: Volunteer Consent Controller
	// FILE: volunteer/controller/consent.php
	// AUTHOR: rwg5215


       // $vid = $_GET['vid'];
        

	switch ($act) {

		case 'updateConsent':
                    $personid=$_SESSION['personid'];
                    $minor= (isset($_GET['less18'])) ? $_GET['less18'] : '';
                    if($minor=="1"){
                        $consentMinor="1";
                    }
                    else{
                        $consentMinor="0";
                    }

                    $age= (isset($_GET['greater18'])) ? $_GET['greater18'] : '';
                    if($age=="1"){
                        $consentAge="1";
                    }
                    else{
                        $consentAge="0";
                    }

                    $photo= (isset($_GET['photo'])) ? $_GET['photo'] : '';
                    if($photo=="3"){
                        $consentPhoto="1";
                    }
                    else{
                        $consentPhoto="0";
                    }

                    $safety= (isset($_GET['safetyGuidelines'])) ? $_GET['safetyGuidelines'] : '';
                    if($safety=="4"){
                        $consentSafety="1";
                    }
                    else{
                        $consentSafety="0";
                    }

                    $video= (isset($_GET['video'])) ? $_GET['video'] : '';
                    if($video=="5"){
                        $consentVideo="1";
                    }
                    else{
                        $consentVideo="0";
                    }

                    $waiver= (isset($_GET['liability'])) ? $_GET['liability'] : '';
                    if($waiver=="6"){
                        $consentWaiver="1";
                    }
                    else{
                        $consentWaiver="0";
                    }

                    $emergencyName= (isset($_GET['emergencyName'])) ? $_GET['emergencyName'] : '';
                    $emergencyPhone= (isset($_GET['phone'])) ? $_GET['phone'] : '';
                    
                    
                    $updateVolunteerConsent=$dbio->setVolunteerConsent($personid,$consentMinor,$consentAge,$consentPhoto,$consentSafety,$consentVideo,$consentWaiver,$emergencyName,$emergencyPhone);
                    if($updateVolunteerConsent==true){
                        include ($dir . '/model/consent.php');
                        $page = $dir . '/view/' . $sub. '.php';
                        print '<script type="text/javascript">'; 
                        print 'alert("You Account is updated with the changes")'; 
                        print '</script>';
                    }                    
                        //setVolunteerConsent($vid, $age, $photo, $agree, $video);
                        break;

		
                default:
                    include ($dir . '/model/consent.php');
                    $page = $dir . '/view/' . $sub. '.php';
                       
                    break;

	}// end switch
        
        

?>
