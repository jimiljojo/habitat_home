<?php

/* 
 * File: /controller/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author:
 */$updated = false;

	switch ($act) {
            
            
        case 'search':
            include_once 'office/model/volunteer.php';
            $tableinfo = search();
            $page = $dir . '/view/viewVolunteers.php';
            break;


		case 'create':
            include $dir . '/model/' . $sub . '.php';
            $page = $dir . '/view/create' . ucfirst($sub) . '.php';
			break;
                    
        case 'confirmCreate':
            include_once 'office/model/volunteer.php';
            
            $page = $dir . '/view/index' . ucfirst($sub) . '.php';
			break;
                    
       case 'getAvailability':
            If(!empty($_GET['interestVol'])){
            foreach(($_GET['interestVol']) as $username) {
            $items[] = $username;
            }
        }
            $_SESSION['interestVolunteer'] = ($items);
            $page = $dir . '/view/volunteerAvailability.php';
			break;
                
       case 'getConsent':
            $_SESSION['avail'] = array(isset($_GET['day']),isset($_GET['evening']),isset($_GET['weekend']));
            $page = $dir . '/view/volunteerConsent.php';
			break;
                    
       case 'getInterests':
            $_SESSION['personalinfo'] = array($_GET['title'],$_GET['fname'],$_GET['lname'],$_GET['dob'],$_GET['gender'],$_GET['phone'],$_GET['phone2'],$_GET['extension'],$_GET['email'],$_GET['street1'],$_GET['street2'],$_GET['city'],$_GET['state'],$_GET['zip']);
            $page = $dir . '/view/volunteerInterests.php';
			break;
                    

		case 'editVolunteer':
            include $dir . '/model/' . $sub . '.php';
            //$volunteers = editVolunteer();
            $page = $dir . '/view/edit' . ucfirst($sub) . '.php';
			break;

		case 'update':
            include_once 'office/model/volunteer.php';
            $updated = updateInfo();
            $page = $dir . '/view/edit' . ucfirst($sub) . '.php';
			break;

		case 'delete':
                    
			break;
                    
        case "retrieve":
            $page = $dir . '/view/edit' . ucfirst($sub) . '.php';

		case 'listVolunteer':         
            include $dir . '/model/' . $sub . '.php';
            $volunteers = listVolunteer();
            $page = $dir . '/view/list' . ucfirst($sub) . '.php';
			break;

        case 'index':
            default:
			$page = $dir . '/view/index' . ucfirst($sub) . '.php';
			break;


	}// end switch

?>
