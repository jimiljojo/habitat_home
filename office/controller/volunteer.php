<?php

/* 
 * File: /controller/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
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
