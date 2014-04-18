<?php

/* 
 * File: /controller/volunteer.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Roman Galysh
 */

	switch ($act) {

		case 'search':
                    
                    $parameter = $_GET['param'];
                    $value1 = $_GET['i1'];
                    $value2 = $_GET['i2'];
                  
                    
                    include $dir . '/model/' . $sub . '.php';
                    $volunteers = indexVolunteerBy($value1, $value2);
                    $page = $dir . '/view/list' . ucfirst($sub) . '.php';
 
			break;

		case 'create':
                                        
                    include $dir . '/model/' . $sub . '.php';
                    $volunteers = createPerson();
                    $page = $dir . '/view/create' . ucfirst($sub) . '.php';
              
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
