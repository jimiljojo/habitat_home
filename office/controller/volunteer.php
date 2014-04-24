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
                    include $dir . '/model/' . $sub . '.php';
                    $_SESSION['personalInfo']=array($_get['fname'],$_get['lname'],$_get['dob'],$_get['gender'],$_get['phone'],$_get['phone2'],$_get['extension'],$_get['email'],$_get['street1'],$_get['street2'],$_get['city'],$_get['state'],$_get['zip'], );
                    $updated = create();
                    $page = $dir . '/view/createVolunteerAvailability.php';
			break;
                    
               case 'confirmAvailability':
                   $_SESSION['volAvail']=array($_get['day'],$_get['evening'],$_get['weekend'],);
                    include $dir . '/model/' . $sub . '.php';
                    $updated = create();
                    $page = $dir . '/view/createVolunteerConsent.php';
			break;
                
               case 'confirmConsent':
                   $_SESSION['volConsent']=array($_get['less18'],$_get['greater18'],$_get['photo'],$_get['safetyGuidelines'],$_get['video'],$_get['liability'],);
                    include $dir . '/model/' . $sub . '.php';
                    $updated = create();
                    $page = $dir . '/view/createVolunteerInterests.php';
			break;
                    
               case 'confirmInterests':
                   $_SESSION['volInterests']=array($_get['']);
                    include $dir . '/model/' . $sub . '.php';
                    $updated = create();
                    $page = $dir . '/view/createVolunteer.php';
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
